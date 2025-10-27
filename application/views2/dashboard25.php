<style>
    .li-class-list{
         list-style: none;
    }
    
</style>


<?php if($this->session->userdata('role_id') != PROVINCIAL || ($this->session->userdata('role_id') != ZONAL) || ($this->session->userdata('role_id') != SUBJECT)){ ?>
<div class="row ">
    <div class="tile_count">
     <?php if(has_permission(VIEW, 'student', 'student')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-group"></i> <?php echo $this->lang->line('student'); ?></span>
            <div class="count"><?php echo $total_student ? $total_student : 0; ?></div>
        </div>
    </div>
     <?php } ?>
     <?php if(has_permission(VIEW, 'guardian', 'guardian')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-street-view"></i> <?php echo $this->lang->line('guardian'); ?></span>
            <div class="count"><?php echo $total_guardian ? $total_guardian : 0; ?></div>
        </div>
    </div>
     <?php } ?>
    <?php if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-users"></i> <?php echo $this->lang->line('teacher'); ?></span>
            <div class="count"><?php echo $total_teacher ? $total_teacher : 0; ?></div>
        </div>
    </div>
    <?php } ?>
    <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-user-md"></i> <?php echo $this->lang->line('employee'); ?></span>
            <div class="count"><?php echo $total_employee ? $total_employee :0; ?></div>
        </div>
    </div>
    <?php } ?>
    <!--<?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"> 
                    <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                     <?php echo $this->lang->line('income'); ?>
                </span>
                <div class="count green"><?php echo $total_income ? $total_income : '0.00'; ?></div>
            </div>
        </div>
     <?php } ?>
    <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top">
                <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                 <?php echo $this->lang->line('expenditure'); ?>
            </span>
            <div class="count red"><?php echo $total_expenditure? $total_expenditure : '0.00'; ?></div>
        </div>
    </div>
     <?php } ?> --> 
    </div>
</div>  
  <?php } ?>



<?php if($this->session->userdata('role_id') == PROVINCIAL){ ?>
<div class="row ">
    <div class="tile_count">
     <?php // if(has_permission(VIEW, 'student', 'student')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-group"></i> <?php echo $this->lang->line('student'); ?></span>
            <div class="count"><?php echo $total_prstudent ? $total_prstudent : 0; ?></div>
        </div>
    </div>
     <?php // } ?>
     <?php // if(has_permission(VIEW, 'guardian', 'guardian')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-street-view"></i> <?php echo $this->lang->line('guardian'); ?></span>
            <div class="count"><?php echo $total_prguardian ? $total_prguardian : 0; ?></div>
        </div>
    </div>
     <?php // } ?>
    <?php // if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-users"></i> <?php echo $this->lang->line('teacher'); ?></span>
            <div class="count"><?php echo $total_prteacher ? $total_prteacher : 0; ?></div>
        </div>
    </div>
    <?php // } ?>
    <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-user-md"></i> <?php echo $this->lang->line('employee'); ?></span>
            <div class="count"><?php echo $total_premployee ? $total_premployee :0; ?></div>
        </div>
    </div>
    <?php } ?>
    <!--<?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"> 
                    <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                     <?php echo $this->lang->line('income'); ?>
                </span>
                <div class="count green"><?php echo $total_income ? $total_income : '0.00'; ?></div>
            </div>
        </div>
     <?php } ?>
    <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top">
                <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                 <?php echo $this->lang->line('expenditure'); ?>
            </span>
            <div class="count red"><?php echo $total_expenditure? $total_expenditure : '0.00'; ?></div>
        </div>
    </div>
     <?php } ?> --> 
    </div>
</div>  


<div class="row">
           
    <div class="col-md-12 col-sm-12 col-xs-12">            
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h4 class="head-title"><?php echo $this->lang->line('school_statistics'); ?></h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <script type="text/javascript">

                    $(function () {
                       $('#prschool-stats').highcharts({
                                chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: '<?php  if($this->session->userdata('role_id') == PROVINCIAL){ ?>
                                                    <?php echo $this->lang->line('manage_provscl'); ?>
                                                <?php }else{ ?>
                                                     <?php echo $this->global_setting->brand_name ? $this->global_setting->brand_name : SMS; ?>
                                                <?php } ?>'
                                    },
                                    xAxis: {
//                                        categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>', '<strong><?php echo $this->lang->line('income'); ?></strong>', '<strong><?php echo $this->lang->line('expenditure'); ?></strong>']
                                    categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>']

                                  },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: '<?php echo $this->lang->line('statistics'); ?>'
                                        }
                                    },
                                    tooltip: {
                                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                                        shared: true
                                    },
                                    plotOptions: {
                                        column: {
                                            stacking: 'percent'
                                        }
                                    },
                                    series: [
                                    <?php if(isset($prschools) && !empty($prschools)){ ?>
                                        <?php foreach($prschools as $obj){ ?>
                                        {
                                            name: '<?php echo $obj->school_name; ?>',
                                            data: [<?php echo implode(',',$prstats[$obj->id]); ?>]
                                        }
                                        ,                                           
                                       <?php } ?> 
                                   <?php } ?> 
                                   ],
                                credits: {
                                    enabled: false
                                }
                                });
                        });
                        
               </script>

                    <div id="prschool-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                </div>
            </div>            
    </div>  
  <?php } ?>
    
    
   <!--Zonal-->

<?php if($this->session->userdata('role_id') == ZONAL){ ?>
<div class="row ">
    <div class="tile_count">
     <?php // if(has_permission(VIEW, 'student', 'student')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-group"></i> <?php echo $this->lang->line('student'); ?></span>
            <div class="count"><?php echo $total_zonalstudent ? $total_zonalstudent : 0; ?></div>
        </div>
    </div>
     <?php // } ?>
     <?php // if(has_permission(VIEW, 'guardian', 'guardian')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-street-view"></i> <?php echo $this->lang->line('guardian'); ?></span>
            <div class="count"><?php echo $total_zonalguardian ? $total_zonalguardian : 0; ?></div>
        </div>
    </div>
     <?php // } ?>
    <?php // if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-users"></i> <?php echo $this->lang->line('teacher'); ?></span>
            <div class="count"><?php echo $total_zonalteacher ? $total_zonalteacher : 0; ?></div>
        </div>
    </div>
    <?php // } ?>
    <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-user-md"></i> <?php echo $this->lang->line('employee'); ?></span>
            <div class="count"><?php echo $total_zonalemployee ? $total_zonalemployee :0; ?></div>
        </div>
    </div>
    <?php } ?>
    <!--<?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"> 
                    <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                     <?php echo $this->lang->line('income'); ?>
                </span>
                <div class="count green"><?php echo $total_income ? $total_income : '0.00'; ?></div>
            </div>
        </div>
     <?php } ?>
    <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top">
                <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                 <?php echo $this->lang->line('expenditure'); ?>
            </span>
            <div class="count red"><?php echo $total_expenditure? $total_expenditure : '0.00'; ?></div>
        </div>
    </div>
     <?php } ?> --> 
    </div>
</div>  


<div class="row">
           
    <div class="col-md-12 col-sm-12 col-xs-12">            
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h4 class="head-title"><?php echo $this->lang->line('school_statistics'); ?></h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <script type="text/javascript">

                    $(function () {
                       $('#prschool-stats').highcharts({
                                chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: '<?php  if($this->session->userdata('role_id') == ZONAL){ ?>
                                                    <?php echo $this->lang->line('manage_zonalscl'); ?>
                                                <?php }else{ ?>
                                                     <?php echo $this->global_setting->brand_name ? $this->global_setting->brand_name : SMS; ?>
                                                <?php } ?>'
                                    },
                                    xAxis: {
//                                        categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>', '<strong><?php echo $this->lang->line('income'); ?></strong>', '<strong><?php echo $this->lang->line('expenditure'); ?></strong>']
                                    categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>']

                                  },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: '<?php echo $this->lang->line('statistics'); ?>'
                                        }
                                    },
                                    tooltip: {
                                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                                        shared: true
                                    },
                                    plotOptions: {
                                        column: {
                                            stacking: 'percent'
                                        }
                                    },
                                    series: [
                                    <?php if(isset($zonalschools) && !empty($prschools)){ ?>
                                        <?php foreach($zonalschools as $obj){ ?>
                                        {
                                            name: '<?php echo $obj->school_name; ?>',
                                            data: [<?php echo implode(',',$prstats[$obj->id]); ?>]
                                        }
                                        ,                                           
                                       <?php } ?> 
                                   <?php } ?> 
                                   ],
                                credits: {
                                    enabled: false
                                }
                                });
                        });
                        
               </script>

                    <div id="prschool-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                </div>
            </div>            
    </div>  
  <?php } ?>


<!-- /top tiles -->
<?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>

<div class="row">
           
    <div class="col-md-12 col-sm-12 col-xs-12">            
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h4 class="head-title"><?php echo $this->lang->line('school_statistics'); ?></h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <script type="text/javascript">

                    $(function () {
                       $('#school-stats').highcharts({
                                chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: '<?php  if($this->session->userdata('role_id') != SUPER_ADMIN){ ?>
                                                    <?php echo $this->session->userdata('school_name'); ?>
                                                <?php }else{ ?>
                                                     <?php echo $this->global_setting->brand_name ? $this->global_setting->brand_name : SMS; ?>
                                                <?php } ?>'
                                    },
                                    xAxis: {
//                                        categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>', '<strong><?php echo $this->lang->line('income'); ?></strong>', '<strong><?php echo $this->lang->line('expenditure'); ?></strong>']
                                    categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>']

                                  },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: '<?php echo $this->lang->line('statistics'); ?>'
                                        }
                                    },
                                    tooltip: {
                                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                                        shared: true
                                    },
                                    plotOptions: {
                                        column: {
                                            stacking: 'percent'
                                        }
                                    },
                                    series: [
                                    <?php if(isset($schools) && !empty($schools)){ ?>
                                        <?php foreach($schools as $obj){ ?>
                                        {
                                            name: '<?php echo $obj->school_name; ?>',
                                            data: [<?php echo implode(',',$stats[$obj->id]); ?>]
                                        }
                                        ,                                           
                                       <?php } ?> 
                                   <?php } ?> 
                                   ],
                                credits: {
                                    enabled: false
                                }
                                });
                        });
                        
               </script>

                    <div id="school-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                    
                     <li class="li-class-list">
                       

                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?> 

                                <?php echo form_open(site_url('dashboard/index/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <select  class="form-control col-md-7 col-xs-12" style="width:auto;" id="filter_provincial_id" name="provincial_id"   onchange="get_district_by_province(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                    <?php foreach ($provincial as $obj) { ?>
                                        <option value="<?php echo $obj->provincialid; ?>" <?php
                                        if (isset($filter_prov_id) && $filter_prov_id == $obj->provincialid) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->provincialname; ?></option>
                                            <?php } ?>   
                                </select>
                               
                               
                                <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 



                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_zonal_id" name="zonal_id"  style="width:auto;"   onchange="get_edu_by_zonal(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 



                                </select> 

<!--                                <select  class="form-control col-md-7 col-xs-12" id="filter_school_id" name="school_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>
                                    
                                    <?php if(isset($school_list) && !empty($school_list)){ ?>
                                            <?php foreach($school_list as $obj ){ ?>
                                                <option value="<?php echo $obj->id; ?>"><?php echo $obj->school_name; ?></option> 
                                            <?php } ?>
                                        <?php } ?>
                                </select>-->


                            <?php } echo form_close(); ?>
                        </li> 
                    </div>
            </div>            
    </div>  
   
</div>
 
<?php } ?> 

<!-- /top tiles -->
<?php if($this->session->userdata('role_id') == SUBJECT){ ?>
<div class="row ">
    <div class="tile_count">
     <?php // if(has_permission(VIEW, 'student', 'student')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-group"></i> <?php echo $this->lang->line('student'); ?></span>
            <div class="count"><?php echo $total_prstudent ? $total_prstudent : 0; ?></div>
        </div>
    </div>
     <?php // } ?>
     <?php // if(has_permission(VIEW, 'guardian', 'guardian')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-paw"></i> <?php echo $this->lang->line('guardian'); ?></span>
            <div class="count"><?php echo $total_prguardian ? $total_prguardian : 0; ?></div>
        </div>
    </div>
     <?php // } ?>
    <?php // if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-users"></i> <?php echo $this->lang->line('teacher'); ?></span>
            <div class="count"><?php echo $total_prteacher ? $total_prteacher : 0; ?></div>
        </div>
    </div>
    <?php // } ?>
    <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><i class="fa fa-user-md"></i> <?php echo $this->lang->line('employee'); ?></span>
            <div class="count"><?php echo $total_premployee ? $total_premployee :0; ?></div>
        </div>
    </div>
    <?php } ?>
    <!--<?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"> 
                    <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                     <?php echo $this->lang->line('income'); ?>
                </span>
                <div class="count green"><?php echo $total_income ? $total_income : '0.00'; ?></div>
            </div>
        </div>
     <?php } ?>
    <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top">
                <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                 <?php echo $this->lang->line('expenditure'); ?>
            </span>
            <div class="count red"><?php echo $total_expenditure? $total_expenditure : '0.00'; ?></div>
        </div>
    </div>
     <?php } ?> --> 
    </div>
</div>  

<div class="row">
           
    <div class="col-md-12 col-sm-12 col-xs-12">            
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h4 class="head-title"><?php echo $this->lang->line('school_statistics'); ?></h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <script type="text/javascript">

                    $(function () {
                       $('#school-stats').highcharts({
                                chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: '<?php  if($this->session->userdata('role_id') != SUBJECT){ ?>
                                                    <?php echo $this->session->userdata('school_name'); ?>
                                                <?php }else{ ?>
                                                     <?php echo $this->global_setting->brand_name ? $this->global_setting->brand_name : SMS; ?>
                                                <?php } ?>'
                                    },
                                    xAxis: {
//                                        categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>', '<strong><?php echo $this->lang->line('income'); ?></strong>', '<strong><?php echo $this->lang->line('expenditure'); ?></strong>']
                                    categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>']

                                  },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: '<?php echo $this->lang->line('statistics'); ?>'
                                        }
                                    },
                                    tooltip: {
                                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                                        shared: true
                                    },
                                    plotOptions: {
                                        column: {
                                            stacking: 'percent'
                                        }
                                    },
                                    series: [
                                    <?php if(isset($schools) && !empty($schools)){ ?>
                                        <?php foreach($schools as $obj){ ?>
                                        {
                                            name: '<?php echo $obj->school_name; ?>',
                                            data: [<?php echo implode(',',$stats[$obj->id]); ?>]
                                        }
                                        ,                                           
                                       <?php } ?> 
                                   <?php } ?> 
                                   ],
                                credits: {
                                    enabled: false
                                }
                                });
                        });
                        
               </script>

                    <div id="school-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                </div>
            </div>            
    </div>  
   
</div>
 
<?php } ?>


<?php if(($this->session->userdata('role_id') != PROVINCIAL) || ($this->session->userdata('role_id') != ZONAL) || ($this->session->userdata('role_id') != SUBJECT)){ ?>
<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">   
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h3 class="head-title"><?php echo $this->lang->line('calendar'); ?></h3>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="calendar"></div>
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/lib/cupertino/jquery-ui.min.css' />
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.css' />
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/jquery-ui.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/moment.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.min.js'></script> 
                    <script type="text/javascript">
                        $(function () {
                            $('#calendar').fullCalendar({
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay'
                                },
                                buttonText: {
                                    today: 'today',
                                    month: 'month',
                                    week: 'week',
                                    day: 'day'
                                },

                                //events and holidays
                                events: [
                                    <?php if(isset($events) && !empty($events)){ ?>
                                        <?php foreach($events as $obj){ ?>
                                        {
                                            title: "<?php echo $obj->title; ?>",
                                            start: '<?php echo date('Y-m-d', strtotime($obj->event_from)); ?>T<?php echo date('H:i:s', strtotime($obj->event_from)); ?>',
                                            end: '<?php echo date('Y-m-d', strtotime($obj->event_to)); ?>T<?php echo date('H:i:s', strtotime($obj->event_to)); ?>',
                                            backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                            url: '<?php echo site_url('event/index/0/'.$obj->id); ?>', //red
                                            color: '#ffffff' //red
                                        },
                                        <?php } ?> 
                                    <?php } ?> 
                                    <?php if(isset($holidays) && !empty($holidays)){ ?>
                                        <?php foreach($holidays as $obj){ ?>
                                        {
                                            title: "<?php echo $obj->title; ?>",
                                            start: '<?php echo date('Y-m-d', strtotime($obj->date_from)); ?>T<?php echo date('H:i:s', strtotime($obj->date_from)); ?>',
                                            end: '<?php echo date('Y-m-d', strtotime($obj->date_to)); ?>T<?php echo date('H:i:s', strtotime($obj->date_to)); ?>',
                                            backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                            url: '<?php echo site_url('announcement/holiday/index/0/'.$obj->id); ?>', //red
                                            color: '#ffffff' //red
                                        },
                                        <?php } ?> 
                                    <?php } ?>                                     
                                ]
                            });
                        });
                    </script>

                </div>                
            </div>          
        </div>          

        <?php if(isset($news) && !empty($news)){ ?>
            <div class="col-md-6 col-sm-4 col-xs-12">
                <div class="x_panel tile overflow_hidden">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('latest_news'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul  class="list-unstyled msg_list">                        
                                <?php foreach($news as $obj ){ ?>
                                <li>
                                    <a href="<?php echo site_url('announcement/news/view/'.$obj->id); ?>">
                                        <span class="image">
                                        <?php  if($obj->image != ''){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/news/<?php echo $obj->image; ?>" alt="" width="70" /> 
                                                <?php }else{ ?>
                                                <img src="<?php echo IMG_URL; ?>default-user.png" alt="Profile Image" />
                                        <?php } ?>
                                        </span>
                                        <span>
                                            <span><?php echo $obj->title; ?></span>
                                            <span class="message"></span>
                                            <span class="time"><?php echo get_nice_time($obj->created_at); ?></span>
                                        </span>                                        
                                    </a>
                                </li>
                                <?php } ?>                       
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?> 
        <?php if(isset($notices) && !empty($notices)){ ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel tile overflow_hidden">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('latest_notice'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul  class="list-unstyled msg_list">

                                <?php foreach($notices as $obj ){ ?>
                                <li>
                                    <a href="<?php echo site_url('announcement/notice/viewindex/'.$obj->id); ?>">                                       
                                        <span>
                                            <span><?php echo $obj->title; ?></span>
                                            <span>&nbsp;</span>
                                            <span class="time"><?php echo get_nice_time($obj->created_at); ?></span>
                                        </span>                                        
                                    </a>
                                </li>
                                <?php } ?>                       
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        
        <?php if($this->session->userdata('role_id') != SUPER_ADMIN){ ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('student_statistics'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">

                            $(function () {
                                $('#student-stats').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45,
                                            beta: 0
                                        }
                                    },
                                    title: {
                                        text: '<?php echo $this->lang->line('student_statistics'); ?>'
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            depth: 35,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.name}'
                                            }
                                        }
                                    },
                                    series: [{
                                            type: 'pie',
                                            name: '<?php echo $this->lang->line('student'); ?>',
                                            data: [
                                                <?php if(isset($students) && !empty($students)){ ?>
                                                    <?php foreach($students as $obj){ ?>
                                                    ['<?php echo $this->lang->line('class'); ?> <?php echo $obj->class_name; ?>', <?php echo $obj->total_student; ?>],
                                                    <?php } ?>
                                                <?php } ?>                                                
                                            ]
                                        }],
                                    credits: {
                                        enabled: false
                                    }
                                });
                            });
                        </script>
                        <div id="student-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?> 
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('message'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">
                            $(function () {
                                $('#private-message').highcharts({
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: ''
                                    },
                                    xAxis: {
                                        type: 'category'
                                    },
                                    yAxis: {
                                        title: {
                                            text: '<?php echo $this->lang->line('private_messaging'); ?>'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    plotOptions: {
                                        series: {
                                            borderWidth: 0,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                                    },
                                    series: [{
                                            name: '<?php echo $this->lang->line('message'); ?>',
                                            colorByPoint: true,
                                            data: [{
                                                    name: '<?php echo $this->lang->line('new'); ?>',
                                                    y: <?php echo count($new); ?>,
                                                    drilldown: null
                                                },{
                                                    name: '<?php echo $this->lang->line('inbox'); ?>',
                                                    y: <?php echo count($inboxs); ?>,
                                                    drilldown: null
                                                },{
                                                    name: '<?php echo $this->lang->line('send'); ?>',
                                                    y: <?php echo count($sents); ?>,
                                                    drilldown: null
                                                }, {
                                                    name: '<?php echo $this->lang->line('draft'); ?>',
                                                    y: <?php echo count($drafts); ?>,
                                                    drilldown: null
                                                }, {
                                                    name: '<?php echo $this->lang->line('trash'); ?>',
                                                    y: <?php echo count($trashs); ?>,
                                                    drilldown: null
                                                }]
                                        }],
                                    credits: {
                                        enabled: false
                                    }
                                });
                            });
                        </script>
                        <div id="private-message" style=" width: 99%; vertical-align: top;height: 260px;"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('user_type'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">

                            $(function () {
                                $('#system-users').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45
                                        }
                                    },
                                    title: {
                                        text: ''
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            innerSize: 100,
                                            depth: 30,
                                            dataLabels: {
                                                format: '<b>{point.name}</b>'
                                            }
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    series: [{
                                            name: '<?php echo $this->lang->line('user'); ?>',
                                            data: [
                                                <?php if(isset($users) && !empty($users)){ ?>
                                                    <?php foreach($users as $obj){ ?>
                                                    ['<?php echo $obj->name; ?>', <?php echo $obj->total_user; ?>],
                                                    <?php } ?>
                                                <?php } ?>
                                            ]
                                        }]
                                });
                            });

                        </script>
                        <div id="system-users" style=" width: 100%; vertical-align: top; height:260px; "></div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

 <?php } ?>

<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts-3d.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/modules/exporting.js"></script>

<style type="text/css">
    .fc-time{display: none;}
</style>


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
        get_school_by_edu( '<?php echo $filter_edu_id; ?>' ,'<?php echo $filter_school_id; ?>');
<?php } ?>
    
  


    function get_school_by_edu(edu_id, school_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_school_by_edu'); ?>",
            data: {school_id: school_id, edu_id: edu_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filter_school_id').html(response);
                }
            }
        });
    }



</script>