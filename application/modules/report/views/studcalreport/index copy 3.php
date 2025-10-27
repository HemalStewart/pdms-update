<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bar-chart"></i><small> <?php echo $this->lang->line('student_cal_report'); ?></small></h3>                
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>

            <?php $this->load->view('quick_report'); ?>   

            <div class="x_content filter-box no-print"> 
                <?php echo form_open_multipart(site_url('report/studcal'), array('name' => 'plan', 'id' => 'plan', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">                    
                    <div class="col-md-10 col-sm-10 col-xs-12">

                        <?php $this->load->view('layout/school_list_filter_stucal'); ?>


                    </div>

                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">


                    <ul  class="nav nav-tabs bordered no-print">
                        <li class="active"><a href="#tab_tabular" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('report'); ?></a> </li>
                         
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in active" id="tab_tabular" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th rowspan="2"><?php echo $this->lang->line('school'); ?></th>
                                            <th rowspan="2"><?php echo $this->lang->line('cencus_number'); ?></th>
                                            <th rowspan="2"><?php echo $this->lang->line('grade1'); ?></th>
                                            <th colspan="5"><?php echo $this->lang->line('stu_count'); ?></th>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('monk'); ?></th>
                                            <th><?php echo $this->lang->line('lay'); ?></th>
                                            <th><?php echo $this->lang->line('count'); ?> </th>
                                            <th><?php echo $this->lang->line('sinhala'); ?></th>
                                            <th><?php echo $this->lang->line('pali'); ?></th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>   

                                    <?php
                                        $count = 1;
                                        if (isset($studcal) && !empty($studcal)) {
                                            ?>
                                            <?php foreach ($studcal as $obj) { ?>
                                        
                                              <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->school_name;?></td>
                                            <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('0_grade'); ?></td>
                                            <td><?php echo $obj->R10omonk; ?></td>
                                            <td><?php echo $obj->R10olay; ?></td>
                                            <td><?php echo $obj->R10ototal; ?></td>
                                            <td><?php echo $obj->R10osin; ?></td>
                                            <td><?php echo $obj->R10opali; ?></td>
                                        
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('1_grade'); ?></td>
                                            <td><?php echo $obj->R10imonk; ?></td>
                                            <td><?php echo $obj->R10ilay; ?></td>
                                            <td><?php echo $obj->R10itotal; ?></td>
                                            <td><?php echo $obj->R10isin; ?></td>
                                            <td><?php echo $obj->R10ipali; ?></td>
                                       
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('2_grade'); ?></td>
                                            <td><?php echo $obj->R10iimonk; ?></td>
                                            <td><?php echo $obj->R10iilay; ?></td>
                                            <td><?php echo $obj->R10iitotal; ?></td>
                                            <td><?php echo $obj->R10iisin; ?></td>
                                            <td><?php echo $obj->R10iipali; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('3_grade'); ?></td>
                                            <td><?php echo $obj->R10iiimonk; ?></td>
                                            <td><?php echo $obj->R10iiilay; ?></td>
                                            <td><?php echo $obj->R10iiitotal; ?></td>
                                            <td><?php echo $obj->R10iiisin; ?></td>
                                            <td><?php echo $obj->R10iiipali; ?></td>
                                        </tr>
                                        
                                
                                          
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
									
<tr>
<td><?php echo $this->lang->line('count'); ?></td>
                                        <td>*</td>
                                        <td>*</td>
                                            <td>*</td>
                                            <td><? echo number_format($totalMonk);?></td>
                                            <td><? echo number_format($totalLay);?></td>
                                            <td><? echo number_format($totalCount);?></td>
                                            <td><? echo number_format($totalSin);?></td>
                                            <td><? echo number_format($totalPali);?></td>
                                            </tr>
									</tfoot>

                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row no-print">
                <div class="col-xs-12 text-right" style="margin-top: 10px;">
                    
                    <button class="btn btn-default" onclick="printDataTable();">
                     <i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>

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
    $("#add").validate();
    $("#edit").validate();
    function get_designation_by_school(url){
    if (url){
    window.location.href = url;
    }
    }

</script>


<script type="text/javascript">

<?php if (isset($filter_district_id)) { ?>
        get_district_by_province('<?php echo $filter_prov_id; ?>', '<?php echo $filter_district_id; ?>');
<?php } ?>

    function get_district_by_province(provincial_id, district_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_district_by_province'); ?>",
            data: {provincial_id: provincial_id, district_id: district_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filter_district_id').html(response);
                }
            }
        });
    }

<?php if (isset($filter_zonal_id)) { ?>
        get_zonal_by_district('<?php echo $filter_district_id; ?>', '<?php echo $filter_zonal_id; ?>');
<?php } ?>

    function get_zonal_by_district(district_id, zonal_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_zonal_by_district'); ?>",
            data: {zonal_id: zonal_id, district_id: district_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filter_zonal_id').html(response);
                }
            }
        });
    }

<?php if (isset($filter_edu_id)) { ?>
        get_edu_by_zonal('<?php echo $filter_zonal_id; ?>', '<?php echo $filter_edu_id; ?>');
<?php } ?>

    function get_edu_by_zonal(zonal_id, edu_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_edu_by_zonal'); ?>",
            data: {zonal_id: zonal_id, edu_id: edu_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filter_edu_id').html(response);
                }
            }
        });
    }
</script>

<script type="text/javascript">

<?php if (isset($filter_school_id)) { ?>
        get_schooln_by_edu( '<?php echo $filter_edu_id; ?>' ,'<?php echo $filter_school_id; ?>');
<?php } ?>
    
    function get_schooln_by_edu(edu_id, schooln_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_school_by_edu'); ?>",
            data: {school_id: schooln_id, edu_id: edu_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filtern_school_id').html(response);
                }
            }
        });
    }

    function printDataTable() {
    // Get the data table HTML
    var tableContent = document.getElementById("datatable-responsive").outerHTML;

    // Create a new window for printing
    var printWindow = window.open('', '_blank');

    // Write the content to the new window
    printWindow.document.write(`
        <html>
            <head>
                <title><?php echo $this->lang->line('student_cal_report'); ?></title>
                <style>
                    /* Add styles for the print version */
                    body {
                        // font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    table th, table td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    table th {
                        background-color: #f2f2f2 !important;
                        -webkit-print-color-adjust: exact;
                        color-adjust: exact;
                    }
                </style>
            </head>
            <body>
                ${tableContent}
            </body>
        </html>
    `);

    // Trigger the print dialog
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
}
</script>