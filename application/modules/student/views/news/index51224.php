<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bullhorn"></i><small> <?php echo $this->lang->line('student_cal_details'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php $this->load->view('quick-link'); ?>                   
            </div>

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">

                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>"><a href="#tab_news_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'student', 'news')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('student/news/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_news"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?> 
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_news"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 


                        <li class="li-class-list">

                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>              

                                <?php echo form_open(site_url('student/news/index/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
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

                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_school_by_edu(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 
                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_school_id" name="school_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>
                                </select>                    



                            <?php } echo form_close(); ?>

                        </li>
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_news_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                <th><?php echo $this->lang->line('school'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('cencus_number'); ?></th>
                                            <th><?php echo $this->lang->line('create'); ?></th>
                                 
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($news_list) && !empty($news_list)) {
                                            ?>
                                            <?php foreach ($news_list as $obj) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                        <td><?php echo $obj->school_name; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $obj->cencus_number; ?></td>
                                                    <td><?php echo $obj->created_at; ?></td>
                                                   
                                                   
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'student', 'news')) { ?>
                                                            <a href="<?php echo site_url('student/news/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'student', 'news')) { ?>
                                                            <a  href="javascript:void(0);" onclick="get_news_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-news-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                            <!-- <a href="javascript:void(0);" onclick="get_student_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-student-modal-lg" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a> -->
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'student', 'news')) { ?>
                                                            <a href="<?php echo site_url('student/news/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php
                        if (isset($add)) {
                            echo 'active';
                        }
                        ?>" id="tab_add_news">
                            <div class="x_content"> 
                                <?php echo form_open_multipart(site_url('student/news/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php $this->load->view('layout/school_list_form'); ?>

                           
                                <input  class="form-control col-md-7 col-xs-12"  name="census_number" id="census_number" value="" required="required" type="hidden" autocomplete="off">
                                                          

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('student_cal_details'); ?>:</strong></h5>
                                    </div>
                                </div>


                                <div class="row"> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group dataTables_wrapper">
                                            <label for="religion"></label>
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                <tr>
                                                    <th></th>
                                                    <th><?php echo $this->lang->line('grade_year'); ?></th>
                                                    <th colspan="15"><?php echo $this->lang->line('stu_count'); ?></th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $this->lang->line('monk'); ?></td>
                                                    <td><?php echo $this->lang->line('lay'); ?></td>
                                                    <td><?php echo $this->lang->line('count'); ?> </td>
                                                    <td><?php echo $this->lang->line('sinhala'); ?></td>
                                                    <td><?php echo $this->lang->line('pali'); ?></td>
                                                    <td><?php echo $this->lang->line('sanskrit'); ?></td>
                                                    <td><?php echo $this->lang->line('thripitaka_damma'); ?></td>
                                                    <td><?php echo $this->lang->line('english'); ?></td>
                                                    <td><?php echo $this->lang->line('maths'); ?></td>
                                                    <td><?php echo $this->lang->line('tamil1'); ?></td>
                                                    <td><?php echo $this->lang->line('history'); ?></td>
                                                    <td><?php echo $this->lang->line('geography'); ?></td>
                                                    <td><?php echo $this->lang->line('social_s'); ?></td>
                                                    <td><?php echo $this->lang->line('general_s'); ?></td>
                                                    <td><?php echo $this->lang->line('health'); ?></td>
                                                    
                                                <tr>
                                                    <td>01</td>
                                                    <td><?php echo $this->lang->line('0_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10omonk" id="R10omonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10olay" id="R10olay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ototal" id="R10ototal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10osin" id="R10osin" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10opali" id="R10opali" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10osan" id="R10osan" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10othri" id="R10othri" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10oeng" id="R10oeng" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10omath" id="R10omath" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10otam" id="R10otam" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ohis" id="R10ohis" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ogeo" id="R10ogeo" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10osoc" id="R10osoc" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ogen" id="R10ogen" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10oheal" id="R10oheal" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td><?php echo $this->lang->line('1_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10imonk" id="R10imonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ilay" id="R10ilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10itotal" id="R10itotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10isin" id="R10isin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ipali" id="R10ipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10isan" id="R10isan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ithri" id="R10ithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ieng" id="R10ieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10imath" id="R10imath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10itam" id="R10itam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ihis" id="R10ihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10igeo" id="R10igeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10isoc" id="R10isoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10igen" id="R10igen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iheal" id="R10iheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td><?php echo $this->lang->line('2_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iimonk" id="R10iimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iilay" id="R10iilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iitotal" id="R10iitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iisin" id="R10iisin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iipali" id="R10iipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iisan" id="R10iisan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iithri" id="R10iithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iieng" id="R10iieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iimath" id="R10iimath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iitam" id="R10iitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iihis" id="R10iihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iigeo" id="R10iigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iisoc" id="R10iisoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iigen" id="R10iigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiheal" id="R10iiheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>04</td>
                                                    <td><?php echo $this->lang->line('3_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiimonk" id="R10iiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiilay" id="R10iiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiitotal" id="R10iiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiisin" id="R10iiisin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiipali" id="R10iiipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiisan" id="R10iiisan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiithri" id="R10iiithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiieng" id="R10iiieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiimath" id="R10iiimath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiitam" id="R10iiitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiihis" id="R10iiihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiigeo" id="R10iiigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiisoc" id="R10iiisoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiigen" id="R10iiigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiiheal" id="R10iiiheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td><?php echo $this->lang->line('4_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivmonk" id="R10ivmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivlay" id="R10ivlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivtotal" id="R10ivtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivsin" id="R10ivsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivpali" id="R10ivpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivsan" id="R10ivsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivthri" id="R10ivthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iveng" id="R10iveng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivmath" id="R10ivmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivtam" id="R10ivtam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivhis" id="R10ivhis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivgeo" id="R10ivgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivsoc" id="R10ivsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivgen" id="R10ivgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivheal" id="R10ivheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>06</td>
                                                    <td><?php echo $this->lang->line('5_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vmonk" id="R10vmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vlay" id="R10vlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vtotal" id="R10vtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vsin" id="R10vsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vpali" id="R10vpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vsan" id="R10vsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vthri" id="R10vthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10veng" id="R10veng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vmath" id="R10vmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vtam" id="R10vtam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vhis" id="R10vhis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vgeo" id="R10vgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vsoc" id="R10vsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vgen" id="R10vgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vheal" id="R10vheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>07</td>
                                                    <td><?php echo $this->lang->line('6_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vimonk" id="R10vimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vilay" id="R10vilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vitotal" id="R10vitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10visin" id="R10visin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vipali" id="R10vipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10visan" id="R10visan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vithri" id="R10vithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vieng" id="R10vieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vimath" id="R10vimath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vitam" id="R10vitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vihis" id="R10vihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vigeo" id="R10vigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10visoc" id="R10visoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vigen" id="R10vigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viheal" id="R10viheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>08</td>
                                                    <td><?php echo $this->lang->line('7_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viimonk" id="R10viimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viilay" id="R10viilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()calculateTotal('R10viimonk', 'R10viilay', 'R10viitotal')"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viitotal" id="R10viitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viisin" id="R10viisin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viipali" id="R10viipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viisan" id="R10viisan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viithri" id="R10viithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viieng" id="R10viieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viimath" id="R10viimath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viitam" id="R10viitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viihis" id="R10viihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viigeo" id="R10viigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viisoc" id="R10viisoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viigen" id="R10viigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiheal" id="R10viiheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>09</td>
                                                    <td><?php echo $this->lang->line('8_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiimonk" id="R10viiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiilay" id="R10viiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiitotal" id="R10viiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiisin" id="R10viiisin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiipali" id="R10viiipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiisan" id="R10viiisan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiithri" id="R10viiithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiieng" id="R10viiieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiimath" id="R10viiimath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiitam" id="R10viiitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiihis" id="R10viiihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiigeo" id="R10viiigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiisoc" id="R10viiisoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiigen" id="R10viiigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiiheal" id="R10viiiheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                </tr>                                                       

                                                <tr>
                                                    <td>10</td>
                                                    <td><?php echo $this->lang->line('9_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixmonk" id="R10ixmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixlay" id="R10ixlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixtotal" id="R10ixtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixsin" id="R10ixsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixpali" id="R10ixpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixsan" id="R10ixsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixthri" id="R10ixthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixeng" id="R10ixeng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixmath" id="R10ixmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixtam" id="R10ixtam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixhis" id="R10ixhis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixgeo" id="R10ixgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixsoc" id="R10ixsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixgen" id="R10ixgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixheal" id="R10ixheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td><?php echo $this->lang->line('10_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xmonk" id="R10xmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xlay" id="R10xlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xtotal" id="R10xtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xsin" id="R10xsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xpali" id="R10xpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xsan" id="R10xsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xthri" id="R10xthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xeng" id="R10xeng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xmath" id="R10xmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xtam" id="R10xtam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xhis" id="R10xhis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xgeo" id="R10xgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xsoc" id="R10xsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xgen" id="R10xgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xheal" id="R10xheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td><?php echo $this->lang->line('11_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ximonk" id="R10ximonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xilay" id="R10xilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xitotal" id="R10xitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xisin" id="R10xisin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xipali" id="R10xipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xisan" id="R10xisan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xithri" id="R10xithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xieng" id="R10xieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ximath" id="R10ximath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xitam" id="R10xitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xihis" id="R10xihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xigeo" id="R10xigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xisoc" id="R10xisoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xigen" id="R10xigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiheal" id="R10xiheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td><?php echo $this->lang->line('12_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiimonk" id="R10xiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiilay" id="R10xiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiitotal" id="R10xiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiisin" id="R10xiisin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiipali" id="R10xiipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiisan" id="R10xiisan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiithri" id="R10xiithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiieng" id="R10xiieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiimath" id="R10xiimath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiitam" id="R10xiitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiihis" id="R10xiihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiigeo" id="R10xiigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiisoc" id="R10xiisoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiigen" id="R10xiigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiheal" id="R10xiiheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td><?php echo $this->lang->line('13_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiimonk" id="R10xiiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiilay" id="R10xiiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiitotal" id="R10xiiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiisin" id="R10xiiisin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiipali" id="R10xiiipali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiisan" id="R10xiiisan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiithri" id="R10xiiithri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiieng" id="R10xiiieng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiimath" id="R10xiiimath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiitam" id="R10xiiitam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiihis" id="R10xiiihis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiigeo" id="R10xiiigeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiisoc" id="R10xiiisoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiigen" id="R10xiiigen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiiheal" id="R10xiiiheal" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    


                                                    
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSmonk" id="R10pSmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSlay" id="R10pSlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pStotal" id="R10pStotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSsin" id="R10pSsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSpali" id="R10pSpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSsan" id="R10pSsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSthri" id="R10pSthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSeng" id="R10pSeng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSmath" id="R10pSmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pStam" id="R10pStam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pShis" id="R10pShis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSgeo" id="R10pSgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSsoc" id="R10pSsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSgen" id="R10pSgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSheal" id="R10pSheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMmonk" id="R10pMmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMlay" id="R10pMlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMtotal" id="R10pMtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMsin" id="R10pMsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMpali" id="R10pMpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMsan" id="R10pMsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMthri" id="R10pMthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMeng" id="R10pMeng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMmath" id="R10pMmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMtam" id="R10pMtam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMhis" id="R10pMhis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMgeo" id="R10pMgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMsoc" id="R10pMsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMgen" id="R10pMgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMheal" id="R10pMheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>17</td>
                                                    <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEmonk" id="R10pEmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pElay" id="R10pElay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEtotal" id="R10pEtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEsin" id="R10pEsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEpali" id="R10pEpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEsan" id="R10pEsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEthri" id="R10pEthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEeng" id="R10pEeng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEmath" id="R10pEmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEtam" id="R10pEtam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEhis" id="R10pEhis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEgeo" id="R10pEgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEsoc" id="R10pEsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEgen" id="R10pEgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEheal" id="R10pEheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>18</td>
                                                    <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestmonk" id="R10Vtestmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestlay" id="R10Vtestlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtesttotal" id="R10Vtesttotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestsin" id="R10Vtestsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestpali" id="R10Vtestpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestsan" id="R10Vtestsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestthri" id="R10Vtestthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtesteng" id="R10Vtesteng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestmath" id="R10Vtestmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtesttam" id="R10Vtesttam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtesthis" id="R10Vtesthis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestgeo" id="R10Vtestgeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestsoc" id="R10Vtestsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestgen" id="R10Vtestgen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestheal" id="R10Vtestheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td><?php echo $this->lang->line('degree'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degmonk" id="R10Degmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Deglay" id="R10Deglay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degtotal" id="R10Degtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degsin" id="R10Degsin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degpali" id="R10Degpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degsan" id="R10Degsan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degthri" id="R10Degthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degeng" id="R10Degeng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degmath" id="R10Degmath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degtam" id="R10Degtam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Deghis" id="R10Deghis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Deggeo" id="R10Deggeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degsoc" id="R10Degsoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Deggen" id="R10Deggen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degheal" id="R10Degheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>20</td>
                                                    <td><?php echo $this->lang->line('other1'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othermonk" id="R10Othermonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherlay" id="R10Otherlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othertotal" id="R10Othertotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othersin" id="R10Othersin" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherpali" id="R10Otherpali" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othersan" id="R10Othersan" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherthri" id="R10Otherthri" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othereng" id="R10Othereng" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othermath" id="R10Othermath" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othertam" id="R10Othertam" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherhis" id="R10Otherhis" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othergeo" id="R10Othergeo" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othersoc" id="R10Othersoc" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othergen" id="R10Othergen" value="" placeholder="" type="text" autocomplete="off"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherheal" id="R10Otherheal" value="" placeholder="" type="text" autocomplete="off"></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>*</td>
                                                    <td><?php echo $this->lang->line('count'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalmonk" id="R10Totalmonk" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totallay" id="R10Totallay" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totaltotal" id="R10Totaltotal" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalsin" id="R10Totalsin" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalpali" id="R10Totalpali" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalsan" id="R10Totalsan" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalthri" id="R10Totalthri" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totaleng" id="R10Totaleng" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalmath" id="R10Totalmath" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totaltam" id="R10Totaltam" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalhis" id="R10Totalhis" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalgeo" id="R10Totalgeo" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalsoc" id="R10Totalsoc" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalgen" id="R10Totalgen" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalheal" id="R10Totalheal" value="" placeholder="" type="text" autocomplete="off" readonly></td>

                                                    
                                                </tr>

                                            </table>


                                            <div class="help-block"></div>
                                        </div>
                                    </div>        
                                </div>

                             

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('student/news/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_news">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url('student/news/edit/' . $news->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php $this->load->view('layout/school_list_edit_form'); ?>
                                    
                                    <input  class="form-control col-md-7 col-xs-12"  name="census_number" id="census_number" value="" required="required" type="hidden" autocomplete="off">

                                    <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('student_cal_details'); ?>:</strong></h5>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group dataTables_wrapper">
                                            <label for="religion"></label>
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                <tr>
                                                    <th></th>
                                                    <th><?php echo $this->lang->line('grade_year'); ?></th>
                                                    <th colspan="3"><?php echo $this->lang->line('stu_count'); ?></th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $this->lang->line('monk'); ?></td>
                                                    <td><?php echo $this->lang->line('lay'); ?></td>
                                                    <td><?php echo $this->lang->line('count'); ?> </td>
                                                    <td><?php echo $this->lang->line('sinhala'); ?></td>
                                                    <td><?php echo $this->lang->line('pali'); ?></td>
                                                    <td><?php echo $this->lang->line('sanskrit'); ?></td>
                                                    <td><?php echo $this->lang->line('thripitaka_damma'); ?></td>
                                                    <td><?php echo $this->lang->line('english'); ?></td>
                                                    <td><?php echo $this->lang->line('maths'); ?></td>
                                                    <td><?php echo $this->lang->line('tamil1'); ?></td>
                                                    <td><?php echo $this->lang->line('history'); ?></td>
                                                    <td><?php echo $this->lang->line('geography'); ?></td>
                                                    <td><?php echo $this->lang->line('social_s'); ?></td>
                                                    <td><?php echo $this->lang->line('general_s'); ?></td>
                                                    <td><?php echo $this->lang->line('health'); ?></td>
                                                    
                                                <tr>
                                                    <td>01</td>
                                                    <td><?php echo $this->lang->line('0_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10omonk" id="R10omonk" value="<?php echo isset($news->R10omonk) ? $news->R10omonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10olay" id="R10olay" value="<?php echo isset($news->R10olay) ? $news->R10olay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ototal" id="R10ototal" value="<?php echo isset($news->R10ototal) ? $news->R10ototal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10osin" id="R10osin" value="<?php echo isset($news->R10osin) ? $news->R10osin : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10opali" id="R10opali" value="<?php echo isset($news->R10opali) ? $news->R10opali : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10osan" id="R10osan" value="<?php echo isset($news->R10osan) ? $news->R10osan : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10othri" id="R10othri" value="<?php echo isset($news->R10othri) ? $news->R10othri : ''; ?>" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10oeng" id="R10oeng" value="<?php echo isset($news->R10oeng) ? $news->R10oeng : ''; ?>" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10omath" id="R10omath" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10otam" id="R10otam" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ohis" id="R10ohis" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ogeo" id="R10ogeo" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10osoc" id="R10osoc" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ogen" id="R10ogen" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10oheal" id="R10oheal" value="" placeholder="" type="text" autocomplete="off"oninput="calculateRowAndColumnSumuTotals()"></td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td><?php echo $this->lang->line('1_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10imonk" id="R10imonk" value="<?php echo isset($news->R10imonk) ? $news->R10imonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ilay" id="R10ilay" value="<?php echo isset($news->R10ilay) ? $news->R10ilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10itotal" id="R10itotal" value="<?php echo isset($news->R10itotal) ? $news->R10itotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                
                                                </tr>
                                               
                                                <tr>
                                                    <td>03</td>
                                                    <td><?php echo $this->lang->line('2_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iimonk" id="R10iimonk" value="<?php echo isset($news->R10iimonk) ? $news->R10iimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iilay" id="R10iilay" value="<?php echo isset($news->R10iilay) ? $news->R10iilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iitotal" id="R10iitotal" value="<?php echo isset($news->R10iitotal) ? $news->R10iitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>04</td>
                                                    <td><?php echo $this->lang->line('3_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiimonk" id="R10iiimonk" value="<?php echo isset($news->R10iiimonk) ? $news->R10iiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiilay" id="R10iiilay" value="<?php echo isset($news->R10iiilay) ? $news->R10iiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiitotal" id="R10iiitotal" value="<?php echo isset($news->R10iiitotal) ? $news->R10iiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td><?php echo $this->lang->line('4_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivmonk" id="R10ivmonk" value="<?php echo isset($news->R10ivmonk) ? $news->R10ivmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivlay" id="R10ivlay" value="<?php echo isset($news->R10ivlay) ? $news->R10ivlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivtotal" id="R10ivtotal" value="<?php echo isset($news->R10ivtotal) ? $news->R10ivtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>06</td>
                                                    <td><?php echo $this->lang->line('5_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vmonk" id="R10vmonk" value="<?php echo isset($news->R10vmonk) ? $news->R10vmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vlay" id="R10vlay" value="<?php echo isset($news->R10vlay) ? $news->R10vlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vtotal" id="R10vtotal" value="<?php echo isset($news->R10vtotal) ? $news->R10vtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>07</td>
                                                    <td><?php echo $this->lang->line('6_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vimonk" id="R10vimonk" value="<?php echo isset($news->R10vimonk) ? $news->R10vimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vilay" id="R10vilay" value="<?php echo isset($news->R10vilay) ? $news->R10vilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vitotal" id="R10vitotal" value="<?php echo isset($news->R10vitotal) ? $news->R10vitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>08</td>
                                                    <td><?php echo $this->lang->line('7_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viimonk" id="R10viimonk" value="<?php echo isset($news->R10viimonk) ? $news->R10viimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viilay" id="R10viilay" value="<?php echo isset($news->R10viilay) ? $news->R10viilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viitotal" id="R10viitotal" value="<?php echo isset($news->R10viitotal) ? $news->R10viitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>09</td>
                                                    <td><?php echo $this->lang->line('8_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiimonk" id="R10viiimonk" value="<?php echo isset($news->R10viiimonk) ? $news->R10viiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiilay" id="R10viiilay" value="<?php echo isset($news->R10viiilay) ? $news->R10viiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiitotal" id="R10viiitotal" value="<?php echo isset($news->R10viiitotal) ? $news->R10viiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>                                                       

                                                <tr>
                                                    <td>10</td>
                                                    <td><?php echo $this->lang->line('9_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixmonk" id="R10ixmonk" value="<?php echo isset($news->R10ixmonk) ? $news->R10ixmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixlay" id="R10ixlay" value="<?php echo isset($news->R10ixlay) ? $news->R10ixlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixtotal" id="R10ixtotal" value="<?php echo isset($news->R10ixtotal) ? $news->R10ixtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td><?php echo $this->lang->line('10_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xmonk" id="R10xmonk" value="<?php echo isset($news->R10xmonk) ? $news->R10xmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xlay" id="R10xlay" value="<?php echo isset($news->R10xlay) ? $news->R10xlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xtotal" id="R10xtotal" value="<?php echo isset($news->R10xtotal) ? $news->R10xtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>


                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td><?php echo $this->lang->line('11_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ximonk" id="R10ximonk" value="<?php echo isset($news->R10ximonk) ? $news->R10ximonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xilay" id="R10xilay" value="<?php echo isset($news->R10xilay) ? $news->R10xilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xitotal" id="R10xitotal" value="<?php echo isset($news->R10xitotal) ? $news->R10xitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td><?php echo $this->lang->line('12_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiimonk" id="R10xiimonk" value="<?php echo isset($news->R10xiimonk) ? $news->R10xiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiilay" id="R10xiilay" value="<?php echo isset($news->R10xiilay) ? $news->R10xiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiitotal" id="R10xiitotal" value="<?php echo isset($news->R10xiitotal) ? $news->R10xiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td><?php echo $this->lang->line('13_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiimonk" id="R10xiiimonk" value="<?php echo isset($news->R10xiiimonk) ? $news->R10xiiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiilay" id="R10xiiilay" value="<?php echo isset($news->R10xiiilay) ? $news->R10xiiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiitotal" id="R10xiiitotal" value="<?php echo isset($news->R10xiiitotal) ? $news->R10xiiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSmonk" id="R10pSmonk" value="<?php echo isset($news->R10pSmonk) ? $news->R10pSmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSlay" id="R10pSlay" value="<?php echo isset($news->R10pSlay) ? $news->R10pSlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pStotal" id="R10pStotal" value="<?php echo isset($news->R10pStotal) ? $news->R10pStotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMmonk" id="R10Mpmonk" value="<?php echo isset($news->R10pMmonk) ? $news->R10pMmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMlay" id="R10pMlay" value="<?php echo isset($news->R10pMlay) ? $news->R10pMlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMtotal" id="R10pMtotal" value="<?php echo isset($news->R10pMtotal) ? $news->R10pMtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>17</td>
                                                    <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEmonk" id="R10Epmonk" value="<?php echo isset($news->R10pEmonk) ? $news->R10pEmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pElay" id="R10pElay" value="<?php echo isset($news->R10pElay) ? $news->R10pElay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEtotal" id="R10pEtotal" value="<?php echo isset($news->R10pEtotal) ? $news->R10pEtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>18</td>
                                                    <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestmonk" id="R10Vtestpmonk" value="<?php echo isset($news->R10Vtestmonk) ? $news->R10Vtestmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestlay" id="R10Vtestlay" value="<?php echo isset($news->R10Vtestlay) ? $news->R10Vtestlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtesttotal" id="R10Vtesttotal" value="<?php echo isset($news->R10Vtesttotal) ? $news->R10Vtesttotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td><?php echo $this->lang->line('degree'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degmonk" id="R10Degmonk" value="<?php echo isset($news->R10Degmonk) ? $news->R10Degmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Deglay" id="R10Deglay" value="<?php echo isset($news->R10Deglay) ? $news->R10Deglay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degtotal" id="R10Degtotal" value="<?php echo isset($news->R10Degtotal) ? $news->R10Degtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>20</td>
                                                    <td><?php echo $this->lang->line('other1'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othermonk" id="R10Othermonk" value="<?php echo isset($news->R10Othermonk) ? $news->R10Othermonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherlay" id="R10Otherlay" value="<?php echo isset($news->R10Otherlay) ? $news->R10Otherlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othertotal" id="R10Othertotal" value="<?php echo isset($news->R10Othertotal) ? $news->R10Othertotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>*</td>
                                                    <td><?php echo $this->lang->line('count'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalmonk" id="R10Totalmonk" value="<?php echo isset($news->R10Totalmonk) ? $news->R10Totalmonk : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totallay" id="R10Totallay" value="<?php echo isset($news->R10Totallay) ? $news->R10Totallay : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totaltotal" id="R10Totaltotal" value="<?php echo isset($news->R10Totaltotal) ? $news->R10Totaltotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>                                                    
                                                </tr>
                                            </table>


                                            <div class="help-block"></div>
                                        </div>
                                    </div>        
                                </div>
                                   

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($news) ? $news->id : $id; ?>" name="id" />
                                            <a  href="<?php echo site_url('student/news/index'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                        </div>
                                    </div>
    <?php echo form_close(); ?>
                                </div>
                            </div>  
<?php } ?>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-news-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_news_data">            
            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_news_modal(news_id) {

        $('.fn_news_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('student/news/get_single_news'); ?>",
            data: {news_id: news_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_news_data').html(response);
                }
            }
        });
    }
</script>

<link href="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.min.js"></script>
<script type="text/javascript">
    $('#add_news').jqte();
    $('#edit_news').jqte();
</script>

<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script type="text/javascript">

    $('#add_date').datepicker();
    $('#edit_date').datepicker();

    $(document).ready(function () {
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

    function get_news_by_school(url) {
        if (url) {
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
<script>
    function calculateRowAndColumnSumuTotals() {
        function parseInput(id) {
            const element = document.getElementById(id);
            return element ? parseFloat(element.value) || 0 : 0;
        }

        function updateField(id, value) {
            const element = document.getElementById(id);
            if (element) {
                element.value = value;
            }
        }

       
        const rows = [
            "R10o",
            "R10i",
            "R10ii",
            "R10iii",
            "R10iv",
            "R10v",
            "R10vi",
            "R10vii",
            "R10viii",
            "R10ix",
            "R10x",
            "R10xi",
            "R10xii",
            "R10xiii",
            "R10pS",
            "R10pM",
            "R10pE",
            "R10Vtest",
            "R10Deg",
            "R10Other",
            
        ];

        const columns = [
            "monk",
            "lay",
            "sin",
            "pali",
            "san",
            "thri",
            "eng",
            "math",
            "tam",
            "his",
            "geo",
            "soc",
            "gen",
            "heal",
        ];

        // column totals
        const columnTotals = {};
        columns.forEach(col => columnTotals[col] = 0);

        // Calculate row totals and accumulate column totals
        rows.forEach(row => {
            const monkValue = parseInput(`${row}monk`);
            const layValue = parseInput(`${row}lay`);
            const rowTotal = monkValue + layValue; // Only sum monk and lay for row total

            // Update row total
            updateField(`${row}total`, rowTotal);

            // Accumulate column totals
            columns.forEach(col => {
                const colValue = parseInput(`${row}${col}`);
                columnTotals[col] += colValue;
            });
        });

        // Update all column totals
        columns.forEach(col => {
            updateField(`R10Total${col}`, columnTotals[col]);
        });

        // Update the grand total for monk + lay
        const grandTotal = columnTotals["monk"] + columnTotals["lay"];
        updateField("R10Totaltotal", grandTotal);
    }
</script>

<!-- <script>

    function calculateRowAndColumnSumuTotalsedit() {
       
        const rows = document.querySelectorAll('tr');

        rows.forEach(row => {
            // Find the input fields for monk, lay, and total
            const monkField = row.querySelector('input[name$="monk"]');
            const layField = row.querySelector('input[name$="lay"]');
            const totalField = row.querySelector('input[name$="total"]');

         
            if (monkField && layField && totalField) {
                const monkValue = parseFloat(monkField.value) || 0;
                const layValue = parseFloat(layField.value) || 0;

              
                const total = monkValue + layValue;

              
                totalField.value = total; // Display with two decimal places
            }
        });
    }
</script> -->

<script>
    function calculateRowAndColumnSumuTotalsedit() {
        const rows = document.querySelectorAll('tr');
        let monkColumnTotal = 0;
        let layColumnTotal = 0;
        let overallTotal = 0;

        rows.forEach(row => {
     
            const monkField = row.querySelector('input[name$="monk"]');
            const layField = row.querySelector('input[name$="lay"]');
            const totalField = row.querySelector('input[name$="total"]');

            if (monkField && layField && totalField) {
                const monkValue = parseFloat(monkField.value) || 0;
                const layValue = parseFloat(layField.value) || 0;

        
                const rowTotal = monkValue + layValue;

          
                totalField.value = rowTotal;

                
                monkColumnTotal += monkValue;
                layColumnTotal += layValue;
                overallTotal += rowTotal;
            }
        });

        const monkTotalField = document.getElementById('R10Totalmonk');
        const layTotalField = document.getElementById('R10Totallay');
        const overallTotalField = document.getElementById('R10Totaltotal');

        if (monkTotalField) monkTotalField.value = monkColumnTotal;
        if (layTotalField) layTotalField.value = layColumnTotal;
        if (overallTotalField) overallTotalField.value = overallTotal;
    }


    // document.addEventListener("DOMContentLoaded", function () {

    //     document.querySelectorAll('#edit-table input').forEach(input => {
    //         input.addEventListener('input', calculateRowAndColumnSumuTotalsedit);
    //     });
    // });
</script>

