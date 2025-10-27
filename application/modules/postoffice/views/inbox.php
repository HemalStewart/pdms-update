<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-inbox"></i><small> <?php echo $this->lang->line('inbox'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <?php $this->load->view('message-nav'); ?>
                        </div>
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <div class="x_content">
                                        <table id="datatable-responsive" class="table table-striped dt-responsive nowrap jambo_table bulk_action" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('sl_no'); ?></th>
                                                    <th><?php echo $this->lang->line('cencus_no'); ?></th>
                                                    <th><?php echo $this->lang->line('datetime'); ?></th>
                                                    <th><?php echo $this->lang->line('work_from'); ?></th>
                                                    <th><?php echo $this->lang->line('subject'); ?></th>
                                                    <th><?php echo $this->lang->line('letter_code'); ?></th>
                                                    <th><?php echo $this->lang->line('action'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; if (isset($inboxs) && !empty($inboxs)) { ?>
                                                    <?php foreach ($inboxs as $obj) { ?>
                                                        <tr class="<?php if($obj->is_read == 0){ echo 'unread-message';} ?>">
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $obj->cencus_no; ?></td>
                                                            <td><?php echo date('Y-m-d h:i A', strtotime($obj->created_at)); ?></td>
                                                            <td><?php echo htmlspecialchars($obj->sender_name); ?></td>
                                                            <td><b>
                                                                <a href="<?php echo site_url('postoffice/view/' . $obj->id); ?>">
                                                                    <?php echo $obj->subject; ?>
                                                                </a>
                                                            </b></td>
                                                            <td><?php echo $obj->letter_code; ?></td>
                                                            <td>
                                                                <?php 
                                                                    // Conditional button color: yellow for unread, blue for read
                                                                    $button_class = ($obj->is_read == 0) ? 'btn-warning' : 'btn-info';
                                                                ?>
                                                                <a href="<?php echo site_url('postoffice/view/' . $obj->id); ?>" class="btn <?php echo $button_class; ?> btn-xs"><i class="fa fa-eye"></i> View </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr><td colspan="7" class="text-center"><?php echo $this->lang->line('no_data_found'); ?></td></tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<style>
    .unread-message {
        font-weight: bold;
        background-color: #f7f7f7;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable-responsive').DataTable({
            dom: 'Bfrtip',
            iDisplayLength: 15,
            buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'pageLength' ],
            responsive: true,
            order: [[2, 'desc']] // Set default sorting to the "datetime" column in descending order
        });
    });
</script>