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
                <?php echo form_open_multipart(site_url('report/studsub'), array('name' => 'plan', 'id' => 'plan', 'class' => 'form-horizontal form-label-left'), ''); ?>
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
                                            <th rowspan="2"><?php echo $this->lang->line('grade1'); ?></th>
                                            <th colspan="15"><?php echo $this->lang->line('stu_count'); ?></th>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('monk'); ?></th>
                                            <th><?php echo $this->lang->line('lay'); ?></th>
                                            <th><?php echo $this->lang->line('count'); ?> </th>
                                            <th><?php echo $this->lang->line('sinhala'); ?></th>
                                            <th><?php echo $this->lang->line('pali'); ?></th>
                                            <th><?php echo $this->lang->line('sanskrit'); ?></th>
                                            <th><?php echo $this->lang->line('thripitaka_damma'); ?></th>
                                            <th><?php echo $this->lang->line('english'); ?></th>
                                            <th><?php echo $this->lang->line('maths'); ?></th>
                                            <th><?php echo $this->lang->line('tamil1'); ?></th>
                                            <th><?php echo $this->lang->line('history'); ?></th>
                                            <th><?php echo $this->lang->line('geography'); ?></th>
                                            <th><?php echo $this->lang->line('social_s'); ?></th>
                                            <th><?php echo $this->lang->line('general_s'); ?></th>
                                            <th><?php echo $this->lang->line('health'); ?></th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
    $fields = array('monk', 'lay', 'total', 'sin', 'pali', 'san', 'thri', 'eng', 'math', 'tam', 'his', 'geo', 'soc', 'gen', 'heal');
    $count = 1;
    foreach ($grades as $grade_label => $data) {
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $this->lang->line($grade_label); ?></td>
            <?php foreach ($fields as $field) { ?>
                <td><?php echo number_format(isset($data->{$grade_label . $field}) ? $data->{$grade_label . $field} : 0); ?></td>
            <?php } ?>
        </tr>
        <?php
    }
    ?>
</tbody>


                                    
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
    var table = $('#datatable-responsive').DataTable({
        dom: 'Bfrtip',
        iDisplayLength: 15,
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible',
                    format: {
                        footer: function (row, data, start, end, display) {
                            // the footer data is included in the export
                            var totals = [];
                            $('#datatable-responsive tfoot tr').each(function() {
                                $(this).find('td').each(function(index) {
                                    totals.push($(this).text());
                                });
                            });

                            // return the data for each column to include totals
                            return totals;
                        }
                    }
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
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
    function printDataTable() {
        // Get all the data rows from the DataTable, not just the visible ones
        var tableContent = $('#datatable-responsive').DataTable().rows().data().toArray();

        // table HTML content
        var tableHTML = `
            <html>
                <head>
                    <title><?php echo $this->lang->line('student_sub_report'); ?></title>
                    <style>
                        /* Add styles for the print version */
                        body {
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
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2"><?php echo $this->lang->line('sl_no'); ?></th>
                                <th rowspan="2"><?php echo $this->lang->line('grade1'); ?></th>
                                <th colspan="15"><?php echo $this->lang->line('stu_count'); ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $this->lang->line('monk'); ?></th>
                                <th><?php echo $this->lang->line('lay'); ?></th>
                                <th><?php echo $this->lang->line('count'); ?></th>
                                <th><?php echo $this->lang->line('sinhala'); ?></th>
                                <th><?php echo $this->lang->line('pali'); ?></th>
                                <th><?php echo $this->lang->line('sanskrit'); ?></th>
                                <th><?php echo $this->lang->line('thripitaka_damma'); ?></th>
                                <th><?php echo $this->lang->line('english'); ?></th>
                                <th><?php echo $this->lang->line('maths'); ?></th>
                                <th><?php echo $this->lang->line('tamil1'); ?></th>
                                <th><?php echo $this->lang->line('history'); ?></th>
                                <th><?php echo $this->lang->line('geography'); ?></th>
                                <th><?php echo $this->lang->line('social_s'); ?></th>
                                <th><?php echo $this->lang->line('general_s'); ?></th>
                                <th><?php echo $this->lang->line('health'); ?></th>
                            </tr>
                        </thead>
                        <tbody>`;

        // Loop through the rows and add each row to the table HTML
        tableContent.forEach(function(row) {
            tableHTML += `<tr>`;
            row.forEach(function(cell) {
                tableHTML += `<td>${cell}</td>`;
            });
            tableHTML += `</tr>`;
        });

        // Close the table and other HTML tags
        tableHTML += `
                </tbody>
            </table>
        </body>
    </html>`;

        // Create a new window for printing
        var printWindow = window.open('', '_blank');
        
        // Write the content to the new window
        printWindow.document.write(tableHTML);

        // Trigger the print dialog
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
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

 

</script>


<script type="text/javascript">



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



</script>


<script type="text/javascript">



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



</script>
