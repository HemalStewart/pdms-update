<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title">
                    <i class="fa fa-envelope-o"></i>
                    <small> <?php echo $this->lang->line('post_letters'); ?></small>
                </h3>
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
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $this->lang->line('post'); ?></h3>
                            </div>

                            <div class="well" style="margin-top: 15px; padding: 15px;">
                                <form method="GET" action="<?php echo site_url('postoffice/sent'); ?>" id="filter">
                                    <div class="row" style="display: flex; align-items: center;">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input 
                                                type="text" 
                                                name="search_letter_code" 
                                                class="form-control" 
                                                placeholder="Search by Letter Code..." 
                                                value="<?php echo isset($_GET['search_letter_code']) ? htmlspecialchars($_GET['search_letter_code']) : ''; ?>"
                                            >
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input 
                                                type="text" 
                                                name="search_cencus_no" 
                                                class="form-control" 
                                                placeholder="Search by Census No..." 
                                                value="<?php echo isset($_GET['search_cencus_no']) ? htmlspecialchars($_GET['search_cencus_no']) : ''; ?>"
                                            >
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <button type="submit" class="btn btn-info btn-xs">Search</button>
                                            <a href="<?php echo site_url('postoffice/sent'); ?>" class="btn btn-default btn-xs">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
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
                                                    <th>Letter Code</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; if (isset($sents) && !empty($sents)) { ?>
                                                    <?php foreach ($sents as $obj) { ?>
                                                        <tr id="rmsg_<?php echo $obj->id; ?>">
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo htmlspecialchars($obj->cencus_no); ?></td>
                                                            <td><?php echo date('Y-m-d h:i A', strtotime($obj->created_at)); ?></td>
                                                            <td><?php echo htmlspecialchars($obj->sender_name); ?></td>
                                                            <td class="mailbox-subject">
                                                                <b>
                                                                    <a href="<?php echo site_url('postoffice/view/' . $obj->id); ?>">
                                                                        <?php echo htmlspecialchars($obj->subject); ?>
                                                                    </a>
                                                                </b>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($obj->letter_code); ?></td>
                                                            <td id="clsbtn_<?php echo $obj->id; ?>" class="mailbox-date">
                                                                <?php 
                                                                $role_id = $this->session->userdata('role_id');
                                                                if ($role_id == SUPER_ADMIN || $role_id == 31): 
                                                                ?>
                                                                    <a href="<?php echo site_url('postoffice/move_to_trash/'.$obj->id); ?>" onclick="return confirm('Are you sure you want to move this message to trash?');" class="btn btn-danger btn-xs">
                                                                        Trash
                                                                    </a>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr><td colspan="7" class="text-center">No messages found.</td></tr>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable-responsive').DataTable({
            dom: 'Bfrtip',
            iDisplayLength: 15,
            buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'pageLength' ],
            responsive: true
        });
    });

    function show_msg(msg_id) {
        toastr.success("Closing Message of message ID " + msg_id + " will come very soon");
        document.getElementById("rmsg_" + msg_id).style.display = "none";
    }
</script>