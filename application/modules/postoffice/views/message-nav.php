<style>
    .nav-pills .label {
        font-size: 10px;
        padding: 3px 7px;
        border-radius: 10px;
        margin-top: 2px;
    }
</style>

<?php
// This is the "working stuff": It calls the helper to get all counts efficiently.
$message_counts = get_user_message_counts();
?>

<?php if ($this->session->userdata('role_id') == SUPER_ADMIN || logged_in_user_role() == 'postman') : ?>
    <a href="<?php echo site_url('postoffice/compose'); ?>" class="btn btn-default btn-block margin-bottom text-left compose-msg">
        <i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('compose'); ?>
    </a>
<?php endif; ?>

<div class="mail-menu-box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $this->lang->line('folder'); ?></h3>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            
            <li class="<?php if (isset($inbox)) { echo 'nav-active'; } ?>">
    <a href="<?php echo site_url('postoffice/inbox'); ?>">
        <i class="fa fa-inbox"></i> <?php echo $this->lang->line('inbox'); ?>
        <?php if ($message_counts['inbox'] > 0): ?>
            <span class="label label-primary pull-right">
                <?php echo $message_counts['inbox']; ?>
            </span>
        <?php endif; ?>
        <?php if ($message_counts['new'] > 0): ?>
            <span class="label label-danger pull-right" style="margin-right: 5px;">
                <?php echo $message_counts['new']; ?>
            </span>
        <?php endif; ?>
    </a>
</li>

            <li class="<?php if (isset($sent)) { echo 'nav-active'; } ?>">
                <a href="<?php echo site_url('postoffice/sent'); ?>">
                    <i class="fa fa-envelope-o"></i> <?php echo $this->lang->line('post'); ?>
                    <?php if ($message_counts['sent'] > 0): ?>
                        <span class="label label-success pull-right"><?php echo $message_counts['sent']; ?></span>
                    <?php endif; ?>
                </a>
            </li>

            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN || logged_in_user_role() == 'postman') : ?>
                <li class="<?php if (isset($draft)) { echo 'nav-active'; } ?>">
                    <a href="<?php echo site_url('postoffice/draft'); ?>">
                        <i class="fa fa-file-text-o"></i> <?php echo $this->lang->line('draft'); ?>
                        <?php if ($message_counts['draft'] > 0): ?>
                             <span class="label label-info pull-right"><?php echo $message_counts['draft']; ?></span>
                        <?php endif; ?>
                    </a>
                </li>

                <li class="<?php if (isset($trash)) { echo 'nav-active'; } ?>">
                    <a href="<?php echo site_url('postoffice/trash'); ?>">
                        <i class="fa fa-trash-o"></i> <?php echo $this->lang->line('trash'); ?>
                        <?php if ($message_counts['trash'] > 0): ?>
                            <span class="label label-danger pull-right"><?php echo $message_counts['trash']; ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endif; ?>
            

            <?php 
// List the role IDs that should have access to the report link
$report_access_roles = [SUPER_ADMIN, 31, 30];

// Check if the user's role ID is in the allowed list
if (in_array($this->session->userdata('role_id'), $report_access_roles)): ?>
    <li class="<?php if (isset($report)) { echo 'nav-active'; } ?>">
        <a href="<?php echo site_url('postoffice/report'); ?>">
            <i class="fa fa-bar-chart"></i> Detailed Report
        </a>
    </li>
<?php endif; ?>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function(e) {
            e.preventDefault();
            //detect type
            var $this = $(this).find("a > i");
            var message_id = $(this).find("a").attr('id');
            var fa = $this.hasClass("fa");
            var star = $this.hasClass("fa-star-o");
            //Switch states
            if (fa) {
                $this.toggleClass("fa-star");
                $this.toggleClass("fa-star-o");
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('postoffice/set_fvourite_status'); ?>",
                    data: {
                        star: star,
                        message_id: message_id
                    },
                    async: false,
                    success: function(response) {
                        if (response) {
                            toastr.success('<?php echo $this->lang->line('update_success'); ?>');
                        }
                    }
                });
            }
        });

        //Enable check and uncheck all functionality
        $(".fn_checkbox_toggle").click(function() {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").prop('checked', false);
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").prop('checked', true);
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        // refresh
        $('#fn_refresh').click(function() {
            location.reload();
        });

        // Move to trash
        $('#fn_trash').click(function() {
            var message_id = "";
            var message_ids = [];
            $('input:checkbox.fn_checkbox').each(function() {
                if (this.checked) {
                    message_id = $(this).attr('id');
                    message_ids.push(message_id);
                }
            });
            if (message_ids.lenth != 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('postoffice/set_trash_status'); ?>",
                    data: {
                        message_ids: message_ids
                    },
                    async: false,
                    success: function(response) {
                        if (response) {
                            toastr.success('<?php echo $this->lang->line('update_success'); ?>');
                            location.reload();
                        }
                    }
                });
            } else {
                toastr.error('<?php echo $this->lang->line('update_failed'); ?>');
            }
        });

        // Trash to delete
        $('#fn_delete').click(function() {
            var message_id = "";
            var message_ids = [];
            $('input:checkbox.fn_checkbox').each(function() {
                if (this.checked) {
                    message_id = $(this).attr('id');
                    message_ids.push(message_id);
                }
            });
            if (message_ids.lenth != 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('postoffice/set_delete_status'); ?>",
                    data: {
                        message_ids: message_ids
                    },
                    async: false,
                    success: function(response) {
                        if (response) {
                            toastr.success('<?php echo $this->lang->line('delete_success'); ?>');
                            location.reload();
                        }
                    }
                });
            } else {
                toastr.error('<?php echo $this->lang->line('delete_failed'); ?>');
            }
        });



    });
</script>