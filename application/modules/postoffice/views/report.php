<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bar-chart"></i><small> Detailed Letter Report</small></h3>
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
                                <div class="box-header with-border">
                                    <h3 class="box-title">Select Date Range</h3>
                                </div>
                                <?php echo form_open(site_url('postoffice/report'), array('name' => 'report', 'id' => 'report', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="form-group">
                                                    <label for="start_date">Start Date</label>
                                                    <input class="form-control" name="start_date" id="start_date" value="<?php echo isset($start_date) ? $start_date : ''; ?>" placeholder="Start Date" type="text" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="form-group">
                                                    <label for="end_date">End Date</label>
                                                    <input class="form-control" name="end_date" id="end_date" value="<?php echo isset($end_date) ? $end_date : ''; ?>" placeholder="End Date" type="text" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <div class="form-group">
                                                    <label style="visibility: hidden;">Action</label><br>
                                                    <button type="submit" class="btn btn-success">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>

                            <?php if (isset($report_data)): ?>
                                <div class="box box-info" style="margin-top: 20px;">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Report Results</h3>
                                    </div>
                                    <div class="box-body" style="margin-top: 10px;">
                                        <table id="datatable-responsive" class="table table-striped dt-responsive nowrap jambo_table bulk_action" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Letter Code</th>
                                                    <th>Subject</th>
                                                    <th>Date Created</th>
                                                    <th>Created By</th>
                                                    <th>Current Status</th>
                                                    <th>Type</th>
                                                    <th>Currently With</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($report_data)): ?>
                                                    <?php foreach ($report_data as $item): ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($item->letter_code); ?></td>
                                                            <td><?php echo htmlspecialchars($item->subject); ?></td>
                                                            <td><?php echo date('Y-m-d h:i A', strtotime($item->created_at)); ?></td>
                                                            <td>
                                                                <?php $creator = get_user_name_by_id($item->created_by); ?>
                                                                <?php echo htmlspecialchars($creator ? $creator->name : 'N/A'); ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($item->status == 1): ?>
                                                                    <span class="label label-warning">In Progress</span>
                                                                <?php elseif ($item->status == 2): ?>
                                                                    <span class="label label-info">On Hold</span>
                                                                <?php else: ?>
                                                                    <span class="label label-success">Completed</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if (isset($item->is_memo) && $item->is_memo == 1): ?>
                                                                    <span class="label label-primary">Memo</span>
                                                                <?php else: ?>
                                                                    <span class="label label-default">Letter</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($item->status == 1 || $item->status == 2): ?>
                                                                    <?php $holder = get_user_name_by_id($item->receiver_id); ?>
                                                                    <?php $role = get_user_role($item->receiver_role_id); ?>
                                                                    <?php echo htmlspecialchars($holder ? $holder->name . ' (' . $role->name . ')' : 'N/A'); ?>
                                                                <?php else: ?>
                                                                    -
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('postoffice/view/' . $item->id); ?>" class="btn btn-info btn-xs" target="_blank">View History</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr><td colspan="8" class="text-center">No letters found in the selected date range.</td></tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script type="text/javascript">
    $('#start_date').datepicker();
    $('#end_date').datepicker();

    $(document).ready(function () {
        $('#datatable-responsive').DataTable({
            dom: 'Bfrtip',
            iDisplayLength: 15,
            buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'pageLength' ],
            responsive: true
        });
    });
</script>