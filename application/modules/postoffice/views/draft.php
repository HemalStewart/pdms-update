<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-envelope-o"></i><small> <?php echo $this->lang->line('manage_message'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <?php $this->load->view('message-nav'); ?>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $this->lang->line('draft'); ?></h3>
                            </div>
                            <div class="box box-primary">
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <div class="btn-group">
                                            <button type="checkbox" class="btn btn-default btn-sm fn_checkbox_toggle"><i class="fa fa-square-o"></i></button>
                                            <button type="button" class="btn btn-default btn-sm" id="fn_trash"><i class="fa fa-trash-o"></i></button>
                                            <button type="button" class="btn btn-default btn-sm" id="fn_refresh"><i class="fa fa-refresh"></i></button>
                                        </div>
                                        <!-- /.btn-group -->
                                        <div class="pull-right">
                                        </div>
                                        <!-- /.pull-right -->
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-responsive" class="table table-striped  dt-responsive nowrap jambo_table bulk_action" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><?php echo $this->lang->line('sl_no'); ?></th>
                                                    <th><?php echo $this->lang->line('cencus_no'); ?></th>
                                                    <th><?php echo $this->lang->line('datetime'); ?></th>
                                                    <th><?php echo $this->lang->line('work_from'); ?></th>
                                                    <th><?php echo $this->lang->line('subject'); ?></th>
                                                    <!-- <th><?php echo $this->lang->line('send_date'); ?></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($drafts) && !empty($drafts)) { ?>
                                                    <?php foreach ($drafts as $obj) { ?>
                                                        <tr>
                                                            <td class="mailbox-messages"><input class="fn_checkbox" type="checkbox" id="<?php echo $obj->message_id; ?>" value="<?php echo $obj->message_id; ?>" /></td>
                                                            <td><a href="<?php echo site_url('postoffice/compose/' . $obj->id); ?>"><?php echo $obj->id; ?></a></td>
                                                            <td><?php echo $obj->cencus_no; ?></td>
                                                            <td><?php echo date('Y-m-d h:i A', strtotime($obj->modified_date)); ?></td>
                                                            <td><?php echo $obj->letter_from_piriven == 1 ? $obj->sender : $obj->sender_name; ?></td>
                                                            <td class="mailbox-subject">
                                                                <b><a href="<?php echo site_url('postoffice/compose/' . $obj->id); ?>"><?php echo $obj->subject; ?></a></b>
                                                            </td>
                                                            <!-- <td class="mailbox-date"><?php echo get_nice_time($obj->created_at); ?></td> -->
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                </div>
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>

<!-- datatable with buttons -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable-responsive').DataTable({
            dom: 'Bfrtip',
            iDisplayLength: 15,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'pageLength'
            ],
            search: true,
            responsive: true
        });
    });
</script>