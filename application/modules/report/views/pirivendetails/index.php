<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('piriven_details_report'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('sl_no'); ?></th>
                                <th><?php echo $this->lang->line('school_name'); ?></th>
                                <th><?php echo $this->lang->line('school_code'); ?></th>
                                <th><?php echo $this->lang->line('cencus_number'); ?></th>
                                <th><?php echo $this->lang->line('address'); ?></th>
                                <th><?php echo $this->lang->line('phone'); ?></th>
                                <th>Fax</th>
                                <th><?php echo $this->lang->line('email'); ?></th>
                                <th><?php echo $this->lang->line('provincial'); ?></th>
                                <th><?php echo $this->lang->line('district'); ?></th>
                                <th><?php echo $this->lang->line('zonal'); ?></th>
                                <th><?php echo $this->lang->line('educational'); ?></th>
                                <th>Piriven Dev Fund Account Name</th>
                                <th>Piriven Dev Fund Account Number</th>
                                <th>Piriven Dev Fund Bank</th>
                                <th>Piriven Dev Fund Branch</th>
                                <th>Kruthydhikari Account Name</th>
                                <th>Kruthydhikari Account Number</th>
                                <th>Kruthydhikari Bank</th>
                                <th>Kruthydhikari Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; if(isset($piriven_details) && !empty($piriven_details)){ ?>
                                <?php foreach($piriven_details as $obj){ ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name; ?></td>
                                        <td><?php echo $obj->school_code; ?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                        <td><?php echo $obj->address; ?></td>
                                        <td><?php echo $obj->phone; ?></td>
                                        <td><?php echo $obj->school_fax; ?></td>
                                        <td><?php echo $obj->email; ?></td>
                                        <td><?php echo $obj->provincialname; ?></td>
                                        <td><?php echo $obj->districtname; ?></td>
                                        <td><?php echo $obj->zonename; ?></td>
                                        <td><?php echo $obj->zoneblock; ?></td>
                                        <td><?php echo $obj->piriven_dev_fund_account_name; ?></td>
                                        <td><?php echo $obj->piriven_dev_fund_account_number; ?></td>
                                        <td><?php echo $obj->piriven_dev_fund_bank; ?></td>
                                        <td><?php echo $obj->piriven_dev_fund_branch; ?></td>
                                        <td><?php echo $obj->kruthydhikari_account_name; ?></td>
                                        <td><?php echo $obj->kruthydhikari_account_number; ?></td>
                                        <td><?php echo $obj->kruthydhikari_bank; ?></td>
                                        <td><?php echo $obj->kruthydhikari_branch; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr><td class="text-center" colspan="20"><?php echo $this->lang->line('no_data_found'); ?></td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row no-print">
                <div class="col-xs-12 text-right">
                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<link href="<?php echo VENDOR_URL; ?>datatables/buttons.dataTables.min.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/jszip.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/pdfmake.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/vfs_fonts.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/buttons.html5.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/buttons.print.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/buttons.colVis.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize DataTable with export buttons
        $('#datatable-responsive').DataTable({
            dom: 'Bfrtip',
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'pageLength'],
            responsive: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>