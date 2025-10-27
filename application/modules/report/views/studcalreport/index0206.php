<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bar-chart"></i><small> <?php echo $this->lang->line('planproc_report'); ?></small></h3>                
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>

            <?php $this->load->view('quick_report'); ?>   

            <div class="x_content filter-box no-print"> 
                <?php echo form_open_multipart(site_url('report/planproc'), array('name' => 'plan', 'id' => 'plan', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">                    
                    <div class="col-md-10 col-sm-10 col-xs-12">

                        <?php // $this->load->view('layout/school_list_filter'); ?>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="month"><?php echo $this->lang->line('month'); ?> <span class="required">*</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  class="form-control col-md-7 col-xs-12"  name="month" id="add_month" required="required">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php foreach ($monthlist as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value["id"] ?>" <?php echo set_select('month', $value['id'], set_value('month')); ?>><?php echo $value["monthname"] ?></option>
                                    <?php }
                                    ?> 
                                </select>
                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='hidden' name="provincial" id="add_provincial" value="<?php echo $listprov->provincialname; ?>" />
                                <div class="help-block"><?php echo form_error('month'); ?></div> 
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><?php echo $this->lang->line('daterange'); ?> <span class="required">*</span></label>

                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <div class="item form-group"> 
                                    <?php echo $this->lang->line('from_date'); ?>
                                    <input  class="form-control col-md-7 col-xs-12"  name="date_from"  id="date_from" value="<?php echo isset($date_from) && $date_from != '' ? date('d-m-Y', strtotime($date_from)) : ''; ?>" placeholder="<?php echo $this->lang->line('from_date'); ?>" type="text">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <div class="item form-group"> 
                                    <?php echo $this->lang->line('to_date'); ?>
                                    <input  class="form-control col-md-7 col-xs-12"  name="date_to"  id="date_to" value="<?php echo isset($date_to) && $date_to != '' ? date('d-m-Y', strtotime($date_to)) : ''; ?>" placeholder="<?php echo $this->lang->line('to_date'); ?>" type="text">
                                </div>
                            </div>
                        </div>



                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apprstatus"><?php echo $this->lang->line('appstatus'); ?> <span class="required">*</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  class="form-control col-md-7 col-xs-12" name="apprstatus" id="apprstatus" required="required">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <option value="1"><?php echo $this->lang->line('appnot'); ?></option>
                                    <option value="2"><?php echo $this->lang->line('appok'); ?></option>
                                </select>

                            </div>
                        </div>

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

                    <?php if (isset($school) && !empty($school)) { ?>
                        <div class="x_content">             
                            <div class="row">
                                <div class="col-sm-3  col-xs-3">&nbsp;</div>
                                <div class="col-sm-6  col-xs-6 layout-box">
                                    <div>
                                        <?php if ($school->logo) { ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="150" height="150" /> 
                                        <?php } else if ($school->frontend_logo) { ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->frontend_logo; ?>" alt="" width="150" height="150" /> 
                                        <?php } else { ?>                                                        
                                            <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->brand_logo; ?>" alt=""  width="150" height="150"/>
                                        <?php } ?>
                                        <h4><?php echo $school->school_name; ?></h4>
                                        <p><?php echo $school->address; ?></p>
                                        <h3 class="head-title ptint-title" style="width: 100%;"><i class="fa fa-bar-chart"></i><small> <?php echo $this->lang->line('library_report'); ?></small></h3>                
                                        <div class="clearfix">&nbsp;</div>
                                    </div>
                                </div>
                                <div class="col-sm-3  col-xs-3">&nbsp;</div>
                            </div>            
                        </div>
                    <?php } ?>

                    <ul  class="nav nav-tabs bordered no-print">
                        <li class="active"><a href="#tab_tabular"   role="tab" data-toggle="tab"   aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('p&z_plan_report'); ?></a> </li>
                         <!--<li class="active"><a href="#tab_depplan"   role="tab" data-toggle="tab"   aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('dep_plan_report'); ?></a> </li>-->
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in active" id="tab_tabular" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th><?php echo $this->lang->line('month'); ?></th>
                                            <td><?php echo $this->lang->line('proposed_date'); ?></td>
                                            <th><?php echo $this->lang->line('pins_type'); ?></th>
                                            <th><?php echo $this->lang->line('provincial'); ?></th>
                                            <th><?php echo $this->lang->line('district'); ?></th>
                                            <th><?php echo $this->lang->line('zonal'); ?></th>
                                            <!--<td><?php echo $this->lang->line('proposed_date'); ?></td>-->

<!--<td><?php echo $this->lang->line('username'); ?></td>-->
                                            <td><?php echo $this->lang->line('name'); ?></td>

                                            <td><?php echo $this->lang->line('prozon_start_time1'); ?></td>
                                            <td><?php echo $this->lang->line('prozon_end_time1'); ?></td>
                                            <td><?php echo $this->lang->line('program_type'); ?></td>
                                            <td><?php echo $this->lang->line('program'); ?></td>
                                            <td><?php echo $this->lang->line('reason1'); ?></td>
                                            <td><?php echo $this->lang->line('address2'); ?></td>
                                            <td><?php echo $this->lang->line('expected_beneficiaries1'); ?></td>
                                            <td><?php echo $this->lang->line('expected_cost'); ?></td>
                                            <td><?php echo $this->lang->line('cost_institution'); ?></td>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $total_issue = 0;
                                        $total_returned = 0;
                                        $remain_total = 0;

                                        $issue_arr = array();
                                        $return_arr = array();
                                        $remain_arr = array();

                                        $count = 1;
                                        if (isset($planproc) && !empty($planproc)) {
                                            ?>
                                            <?php
                                            foreach ($planproc as $obj) {

                                                $instype = $obj->role_id;

                                                if ($instype == 18) {

                                                    $instypeval = "Provincial";
                                                } elseif ($instype == 19) {
                                                    $instypeval = "Zonal";
                                                } else {
                                                    $instypeval = "";
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>                                            
                                                    <td><?php echo $obj->monthname; ?></td>
                                                    <td><?php echo $obj->proposed_date; ?></td>
                                                    <td><?php echo $instypeval; ?></td>
                                                    <td><?php echo $obj->provincial_name; ?></td>    
                                                    <td><?php echo $obj->districtname; ?></td>    
                                                    <td><?php echo $obj->zonal_id; ?></td>    

                                                                    <!--<td><?php echo $obj->proposed_date; ?></td>-->
                                                                     <!--<td><?php echo $obj->username; ?></td>-->
                                                    <td><?php echo $obj->name; ?></td>
                                                    <td><?php echo $obj->prozon_start_time; ?></td>    
                                                    <td><?php echo $obj->prozon_end_time; ?></td>    
                                                    <td><?php echo $obj->program_type; ?></td>    
                                                    <td><?php echo $obj->program_name; ?></td>    
                                                    <td><?php echo $obj->reason; ?></td>    
                                                    <td><?php echo $obj->address; ?></td>  
                                                    <td><?php echo $obj->expected_beneficiaries; ?></td>    
                                                    <td><?php echo $obj->expected_cost; ?></td>    
                                                    <td><?php echo $obj->cost_institution; ?></td>      


                                                </tr>
                                            <?php } ?>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div  class="tab-pane fade in active" id="tab_graphical" >
                            <div class="x_content">
                                <?php if (isset($library) && !empty($library)) { ?>
                                    <script type="text/javascript">

                                        $(function () {
                                        $('#library-report').highcharts({
                                        chart: {
                                        type: 'bar'
                                        },
                                                title: {
                                                text: '<?php echo $this->lang->line('library_report'); ?>'
                                                },
                                                xAxis: {
                                                categories: [
    <?php foreach ($library as $obj) { ?>
                                                    '<?php echo $obj->group_by_field; ?>',
    <?php } ?>
                                                ]
                                                },
                                                yAxis: {
                                                min: 0,
                                                        title: {
                                                        text: ''
                                                        }
                                                },
                                                legend: {
                                                reversed: true
                                                },
                                                plotOptions: {
                                                series: {
                                                stacking: 'normal'
                                                }
                                                },
                                                series: [

                                                {
                                                name: '<?php echo $this->lang->line('remain'); ?>',
                                                        data: [<?php echo implode(',', $remain_arr); ?>]
                                                }
                                                , {
                                                name: '<?php echo $this->lang->line('return'); ?>',
                                                        data: [<?php echo implode(',', $return_arr); ?>]
                                                }, {
                                                name: '<?php echo $this->lang->line('issue'); ?>',
                                                        data: [<?php echo implode(',', $issue_arr); ?>]
                                                }

                                                ],
                                                credits: {
                                                enabled: false
                                                }
                                        });
                                        });
                                    </script>
                                    <div id="library-report" style="width: 99%; height: 500px; margin: 0 auto"></div>
                                <?php } else { ?>
                                    <!--<p class="text-center"><?php echo $this->lang->line('no_data_found'); ?></p>-->
                                <?php } ?>
                            </div>
                        </div>
                    </div> in active
                </div>
            </div>


            <!--            <div class="row no-print">
                   <div class="col-xs-12 text-right">
                       <button class="btn btn-default " onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
                   </div>
               </div>-->

        </div>
    </div>
</div>
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script type="text/javascript">

                                        $('#date_from').datepicker();
                                        $('#date_to').datepicker();
                                        $("#library").validate();
                                        $("document").ready(function() {
<?php if (isset($school_id) && !empty($school_id)) { ?>
                                            $(".fn_school_id").trigger('change');
<?php } ?>
                                        });
                                        $('.fn_school_id').on('change', function(){

                                        var school_id = $(this).val();
                                        var academic_year_id = '';
<?php if (isset($school_id) && !empty($school_id)) { ?>
                                            academic_year_id = '<?php echo $academic_year_id; ?>';
<?php } ?>

                                        if (!school_id){
                                        toastr.error('<?php echo $this->lang->line('select_school'); ?>');
                                        return false;
                                        }

                                        get_academic_year_by_school(school_id, academic_year_id);
                                        });
                                        function get_academic_year_by_school(school_id, academic_year_id){

                                        $.ajax({
                                        type   : "POST",
                                                url    : "<?php echo site_url('ajax/get_academic_year_by_school'); ?>",
                                                data   : { school_id:school_id, academic_year_id :academic_year_id},
                                                async  : false,
                                                success: function(response){
                                                if (response)
                                                {
                                                $('#academic_year_id').html(response);
                                                }
                                                }
                                        });
                                        }

</script>
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