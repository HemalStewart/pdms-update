<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bullhorn"></i><small> <?php echo $this->lang->line('manage_news'); ?></small></h3>
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

                        <!--                        <li class="li-class-list">
                        <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>                                 
                                                                <select  class="form-control col-md-7 col-xs-12" onchange="get_news_by_school(this.value);">
                                                                        <option value="<?php echo site_url('announcement/news/index'); ?>">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                            <?php foreach ($schools as $obj) { ?>
                                                                                    <option value="<?php echo site_url('announcement/news/index/' . $obj->id); ?>" <?php
                                if (isset($filter_school_id) && $filter_school_id == $obj->id) {
                                    echo 'selected="selected"';
                                }
                                ?> > <?php echo $obj->school_name; ?></option>
                            <?php } ?>   
                                                                </select>
                        <?php } ?>  
                                                </li>        -->


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
                                            <th><?php echo $this->lang->line('title'); ?></th>
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
                                                    <td><?php echo $obj->title; ?></td>
                                                    <td><?php echo $obj->created_at; ?></td>
                                                   
                                                   
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'student', 'news')) { ?>
                                                            <a href="<?php echo site_url('student/news/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'student', 'news')) { ?>
                                                            <a  onclick="get_news_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-news-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
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
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($post['title']) ? $post['title'] : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>                                

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('student_cal_details'); ?>:</strong></h5>
                                    </div>
                                </div>


                                <div class="row"> 

                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group dataTables_wrapper">
                                                        <label for="religion">10. </label>
                                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                            <tr>
                                                                <th></th>
                                                                <th><?php echo $this->lang->line('grade_year'); ?></th>
                                                                <th colspan="3"><?php echo $this->lang->line('stu_count'); ?></th>
                                                                <!-- <th colspan="3"><?php echo $this->lang->line('stu_present_count'); ?></th>
                                                                <th colspan="4"><?php echo $this->lang->line('endyear_test'); ?></th> -->
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('monk'); ?></td>
                                                                <td><?php echo $this->lang->line('lay'); ?></td>
                                                                <td><?php echo $this->lang->line('count'); ?> </td>
                                                                <!-- <td><?php echo $this->lang->line('monk'); ?></td>
                                                                <td><?php echo $this->lang->line('lay'); ?></td>
                                                                <td><?php echo $this->lang->line('count'); ?> </td>
                                                                <td><?php echo $this->lang->line('present'); ?> </td>
                                                                <td><?php echo $this->lang->line('pass'); ?> </td>
                                                                <td><?php echo $this->lang->line('fail'); ?> </td>
                                                                <td><?php echo $this->lang->line('presantage'); ?> </td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>01</td>
                                                                <td><?php echo $this->lang->line('0_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10omonkR" id="10omonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10olayR" id="10olayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ototalR" id="10ototalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                                
                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>02</td>
                                                                <td><?php echo $this->lang->line('1_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10imonkR" id="10imonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ilayR" id="10ilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10itotalR" id="10itotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>03</td>
                                                                <td><?php echo $this->lang->line('2_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10iimonkR" id="10iimonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10iilayR" id="10iilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10iitotalR" id="10iitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>04</td>
                                                                <td><?php echo $this->lang->line('3_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10iiimonkR" id="10iiimonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10iiilayR" id="10iiilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10iiitotalR" id="10iiitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>05</td>
                                                                <td><?php echo $this->lang->line('4_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ivmonkR" id="10ivmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ivlayR" id="10ivlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ivtotalR" id="10ivtotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>06</td>
                                                                <td><?php echo $this->lang->line('5_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10vmonkR" id="10vmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10vlayR" id="10vlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10vtotalR" id="10vtotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>07</td>
                                                                <td><?php echo $this->lang->line('6_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10vimonkR" id="10vimonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10vilayR" id="10vilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10vitotalR" id="10vitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>08</td>
                                                                <td><?php echo $this->lang->line('7_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10viimonkR" id="10viimonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10viilayR" id="10viilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()calculateTotal('10viimonkR', '10viilayR', '10viitotalR')"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10viitotalR" id="10viitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>09</td>
                                                                <td><?php echo $this->lang->line('8_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10viiimonkR" id="10viiimonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10viiilayR" id="10viiilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10viiitotalR" id="10viiitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>   -->
                                                            </tr>                                                       
        
                                                            <tr>
                                                                <td>10</td>
                                                                <td><?php echo $this->lang->line('9_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ixmonkR" id="10ixmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ixlayR" id="10ixlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ixtotalR" id="10ixtotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>11</td>
                                                                <td><?php echo $this->lang->line('10_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xmonkR" id="10xmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xlayR" id="10xlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xtotalR" id="10xtotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>12</td>
                                                                <td><?php echo $this->lang->line('11_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10ximonkR" id="10ximonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xilayR" id="10xilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xitotalR" id="10xitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>13</td>
                                                                <td><?php echo $this->lang->line('12_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xiimonkR" id="10xiimonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xiilayR" id="10xiilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xiitotalR" id="10xiitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>14</td>
                                                                <td><?php echo $this->lang->line('13_grade'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xiiimonkR" id="10xiiimonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xiiilayR" id="10xiiilayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10xiiitotalR" id="10xiiitotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>15</td>
                                                                <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pSmonkR" id="10pSmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pSlayR" id="10pSlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pStotalR" id="10pStotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>16</td>
                                                                <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pMmonkR" id="10pMmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pMlayR" id="10pMlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pMtotalR" id="10pMtotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>17</td>
                                                                <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pEmonkR" id="10pEmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pElayR" id="10pElayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10pEtotalR" id="10pEtotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>18</td>
                                                                <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10VtestmonkR" id="10VtestmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10VtestlayR" id="10VtestlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10VtesttotalR" id="10VtesttotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>19</td>
                                                                <td><?php echo $this->lang->line('degree'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10DegmonkR" id="10DegmonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10DeglayR" id="10DeglayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10DegtotalR" id="10DegtotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>20</td>
                                                                <td><?php echo $this->lang->line('other1'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10OthermonkR" id="10OthermonkR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10OtherlayR" id="10OtherlayR" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10OthertotalR" id="10OthertotalR" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> 
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>-->
                                                            </tr>
                                                            <tr>
                                                                <td>*</td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10TotalmonkR" id="10TotalmonkR" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10TotallayR" id="10TotallayR" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="10TotaltotalR" id="10TotaltotalR" value="" placeholder="" type="text" autocomplete="off" readonly></td>

                                                                <!-- <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" readonly></td> -->
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
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($news->title) ? $news->title : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('title'); ?></div>
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
        // Utility function to safely parse numbers from input fields
        function parseInput(id) {
            const element = document.getElementById(id);
            return element ? parseFloat(element.value) || 0 : 0;
        }

        // Utility function to update a field
        function updateField(id, value) {
            const element = document.getElementById(id);
            if (element) {
                element.value = value;
            }
        }

        // Define rows and columns
        const rows = [
            { id: "10o", cols: ["monkR", "layR", "totalR"] },
            { id: "10i", cols: ["monkR", "layR", "totalR"] },
            { id: "10ii", cols: ["monkR", "layR", "totalR"] },
            { id: "10iii", cols: ["monkR", "layR", "totalR"] },
            { id: "10iv", cols: ["monkR", "layR", "totalR"] },
            { id: "10v", cols: ["monkR", "layR", "totalR"] },
            { id: "10vi", cols: ["monkR", "layR", "totalR"] },
            { id: "10vii", cols: ["monkR", "layR", "totalR"] },
            { id: "10viii", cols: ["monkR", "layR", "totalR"] },
            { id: "10ix", cols: ["monkR", "layR", "totalR"] },
            { id: "10x", cols: ["monkR", "layR", "totalR"] },
            { id: "10xi", cols: ["monkR", "layR", "totalR"] },
            { id: "10xii", cols: ["monkR", "layR", "totalR"] },
            { id: "10xiii", cols: ["monkR", "layR", "totalR"] },
            { id: "10pS", cols: ["monkR", "layR", "totalR"] },
            { id: "10pM", cols: ["monkR", "layR", "totalR"] },
            { id: "10pE", cols: ["monkR", "layR", "totalR"] },
            { id: "10Vtest", cols: ["monkR", "layR", "totalR"] },
            { id: "10Deg", cols: ["monkR", "layR", "totalR"] },
            { id: "10Other", cols: ["monkR", "layR", "totalR"] },
        ];
        const totals = { monkR: 0, layR: 0, totalR: 0 };

        // Horizontal calculations for each row
        rows.forEach(row => {
            const monkValue = parseInput(`${row.id}monkR`);
            const layValue = parseInput(`${row.id}layR`);
            const rowTotal = monkValue + layValue;

            // Update row total
            updateField(`${row.id}totalR`, rowTotal);

            // Add to column totals
            totals.monkR += monkValue;
            totals.layR += layValue;
            totals.totalR += rowTotal;
        });

        // Update vertical totals
        updateField("10TotalmonkR", totals.monkR);
        updateField("10TotallayR", totals.layR);
        updateField("10TotaltotalR", totals.totalR);
    }
</script>