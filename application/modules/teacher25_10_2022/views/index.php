<style>

    td, th {
        padding: 5px;
    }
</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-users"></i><small> <?php echo $this->lang->line('manage_teacher'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>      

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">

                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>"><a href="#tab_teacher_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>

                        <?php if (has_permission(ADD, 'teacher', 'teacher')) { ?>

                            <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('teacher/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class=""><a href="#tab_add_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                            <?php } ?>

                        <?php } ?>  

                        <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 

                        <?php if (isset($detail)) { ?>
                            <li  class="active"><a href="#tab_view_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('view'); ?></a> </li>                          
                        <?php } ?> 

                        <li class="li-class-list">


                            <?php if ($this->session->userdata('role_id') != ADMIN || $this->session->userdata('role_id') != GUARDIAN || $this->session->userdata('role_id') != STUDENT || $this->session->userdata('role_id') != TEACHER || $this->session->userdata('role_id') != ACCOUNTANT || $this->session->userdata('role_id') != LIBRARIN || $this->session->userdata('role_id') != RECEPTIONIST || $this->session->userdata('role_id') != STAFF || $this->session->userdata('role_id') != PROVINCIAL || $this->session->userdata('role_id') != ZONAL) { ?> 

                                <?php echo form_open(site_url('teacher/index/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <select  class="form-control col-md-7 col-xs-12" style="width:auto;" id="filter_provincial_id" name="provincial_id"   onchange="get_district_by_province(this.value, ''); this.form.submit();" >
                                    <option value="">--<?php echo $this->lang->line('select_provincial'); ?>--</option> 
                                    <?php foreach ($provincial as $obj) { ?>
                                        <option value="<?php echo $obj->provincialid; ?>" <?php
                                        if (isset($filter_prov_id) && $filter_prov_id == $obj->provincialid) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->provincialname; ?></option>
                                            <?php } ?>   
                                </select>
                                <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, ''); this.form.submit();"">
                                    <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 



                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_zonal_id" name="zonal_id"  style="width:auto;"   onchange="get_edu_by_zonal(this.value, ''); this.form.submit();"">
                                    <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_schooln_by_edu(this.value, ''); this.form.submit();"">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filtern_school_id" name="schooln_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                </select>

                            <?php } else { ?>
                                <!--<END>-->

                                <select  class="form-control col-md-7 col-xs-12" id="filter_school_id" name="school_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>

                                    <?php if (isset($school_list) && !empty($school_list)) { ?>
                                        <?php foreach ($school_list as $obj) { ?>
                                            <option value="<?php echo $obj->id; ?>"><?php echo $obj->school_name; ?></option> 
                                        <?php } ?>
                                    <?php } ?>
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
                        ?>" id="tab_teacher_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th><?php echo $this->lang->line('provincial'); ?></th>
                                            <th><?php echo $this->lang->line('district'); ?></th>
                                            <th><?php echo $this->lang->line('zonal'); ?></th>
                                            <th><?php echo $this->lang->line('educational'); ?></th>
                                            <th><?php echo $this->lang->line('cencus_number'); ?></th>
                                            <?php if ($this->session->userdata('role_id') != ADMIN || $this->session->userdata('role_id') != GUARDIAN || $this->session->userdata('role_id') != STUDENT || $this->session->userdata('role_id') != TEACHER || $this->session->userdata('role_id') != ACCOUNTANT || $this->session->userdata('role_id') != LIBRARIN || $this->session->userdata('role_id') != RECEPTIONIST || $this->session->userdata('role_id') != STAFF || $this->session->userdata('role_id') != PROVINCIAL || $this->session->userdata('role_id') != ZONAL) { ?>
                                                <th><?php echo $this->lang->line('school'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('photo'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('responsibility'); ?></th>
                                            <th><?php echo $this->lang->line('salary_type');?></th>
                                            <th><?php echo $this->lang->line('national_id'); ?>
                                            <th><?php echo $this->lang->line('phone'); ?></th>
                                            <th><?php echo $this->lang->line('email'); ?></th>
                                            <th><?php echo $this->lang->line('join_date'); ?></th>
                                            <!--<th><?php echo $this->lang->line('is_view_on_web'); ?></th>-->
                                            <th><?php echo $this->lang->line('display_order'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($teachers) && !empty($teachers)) {
                                            ?>
                                            <?php foreach ($teachers as $obj) { 
                                            
                                                $CurStatusID = $obj->salary_type;

                                                if ($CurStatusID == 'permanent') {
                                                    $Status1 = "Permanent";
                                                    $color = "bg-blue";
                                                }elseif ($CurStatusID == 'not_approved') {
                                                    $Status1 = "Not Approved";
                                                    $color = "bg-red";
												} elseif ($CurStatusID == 'temporary') {
                                                    $Status1 = "Temporary";
                                                    $color = "bg-orange";
												} 
												else{
													 $Status1 = " ";
                                                    $color = " ";
													
												}
                                            ?>
                                            
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $obj->provincialname; ?></td>
                                                    <td><?php echo $obj->districtname; ?></td>
                                                    <td><?php echo $obj->zonename; ?></td>
                                                    <td><?php echo $obj->zoneblock; ?></td>
                                                    <td><?php echo $obj->cencus_number; ?></td>
                                                    <?php if ($this->session->userdata('role_id') != ADMIN || $this->session->userdata('role_id') != GUARDIAN || $this->session->userdata('role_id') != STUDENT || $this->session->userdata('role_id') != TEACHER || $this->session->userdata('role_id') != ACCOUNTANT || $this->session->userdata('role_id') != LIBRARIN || $this->session->userdata('role_id') != RECEPTIONIST || $this->session->userdata('role_id') != STAFF || $this->session->userdata('role_id') != PROVINCIAL || $this->session->userdata('role_id') != ZONAL) { ?>
                                                        <td><?php echo $obj->school_name; ?></td>
                                                    <?php } ?>
                                                    <td>
                                                        <?php if ($obj->photo != '') { ?>
                                                            <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $obj->photo; ?>" alt="" width="60" /> 
                                                        <?php } else { ?>
                                                            <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="60" /> 
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo ucfirst($obj->name); ?></td>
                                                    <td><?php echo $obj->responsibility; ?></td>
                                                    <!--<td><?php echo $obj->salary_type; ?></td>-->
                                                     <td><?php echo '<span class="label ' . $color . '">' . $Status1 . '</span>'; ?></td>
                                                    <td><?php echo $obj->national_id; ?></td>
                                                    <td><?php echo $obj->phone; ?></td>
                                                    <td><?php echo $obj->email; ?></td>
                                                    <td><?php echo $obj->joining_date; ?></td>
                                                   <!-- <td><?php echo $obj->is_view_on_web ? $this->lang->line('yes') : $this->lang->line('no'); ?></td>-->
                                                    <td>
                                                        <input  class="col-md-7 col-xs-12" itemid="<?php echo $obj->id; ?>"  name="display_order[]"  value="<?php echo $obj->display_order; ?>"  type="text" autocomplete="off" />
                                                    </td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'teacher', 'teacher')) { ?>
                                                            <a href="<?php echo site_url('teacher/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a><br/>
                                                        <?php } ?> 
                                                        <?php if (has_permission(VIEW, 'teacher', 'teacher')) { ?>
                                                            <a  onclick="get_teacher_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-teacher-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'teacher', 'teacher')) { ?>
                                                            <a href="<?php echo site_url('teacher/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if (has_permission(EDIT, 'teacher', 'teacher')) { ?> 
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 text-right">
                                            <button type="button" id="fn_display_order" class="btn btn-success"><?php echo $this->lang->line('update_order'); ?></button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php
                        if (isset($add)) {
                            echo 'active';
                        }
                        ?>" id="tab_add_teacher">
                            <div class="x_content"> 
                                <?php echo form_open_multipart(site_url('teacher/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php $this->load->view('layout/school_list_form'); ?>


                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic_information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($post['name']) ? $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="national_id"><?php echo $this->lang->line('national_id'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="<?php echo isset($post['national_id']) ? $post['national_id'] : ''; ?>" placeholder="<?php echo $this->lang->line('national_id'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('national_id'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="responsibility"><?php echo $this->lang->line('responsibility'); ?> <span class="required">*</span></label>
                                            <!--<input  class="form-control col-md-7 col-xs-12"  name="responsibility"  id="responsibility" value="<?php echo isset($post['responsibility']) ? $post['responsibility'] : ''; ?>" placeholder="<?php echo $this->lang->line('responsibility'); ?>" required="required" type="text" autocomplete="off">-->
                                                 <select  class="form-control col-md-7 col-xs-12" name="responsibility"  id="responsibility"  required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                               
                                                 <?php foreach ($listsubjects as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('responsibility', $value['sub_name'], set_value('responsibility')); ?>><?php echo $value["sub_name"] ?></option>
                                            <?php }
                                            ?> 
                                            </select>
                                            
                                            <div class="help-block"><?php echo form_error('responsibility'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($post['phone']) ? $post['phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="gender"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $genders = get_genders(); ?>
                                                <?php foreach ($genders as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['gender']) && $post['gender'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('gender'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="blood_group"><?php echo $this->lang->line('blood_group'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                <?php $bloods = get_blood_group(); ?>
                                                <?php foreach ($bloods as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['blood_group']) && $post['blood_group'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('blood_group'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="religion"><?php echo $this->lang->line('religion'); ?> </label>
                                            <!--<input  class="form-control col-md-7 col-xs-12"  name="religion"  id="religion" value="<?php echo isset($post['religion']) ? $post['religion'] : ''; ?>" placeholder="<?php echo $this->lang->line('religion'); ?>" type="text" autocomplete="off">-->
                                            
                                            <select  class="form-control col-md-7 col-xs-12" name="religion" id="religion">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                    <?php $religion = get_religion(); ?>
                                                    <?php foreach ($religion as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ($superadmin->religion == $key) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>
                                                </select>
                                            
                                            <div class="help-block"><?php echo form_error('religion'); ?></div>
                                        </div>
                                    </div>

                                    <!---my work-->

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="nationality"><?php echo $this->lang->line('nationality'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="nationality"  id="nationality" value="<?php echo isset($post['nationality']) ? $post['nationality'] : ''; ?>" placeholder="<?php echo $this->lang->line('nationality'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('nationality'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="citizenship"><?php echo $this->lang->line('citizenship'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="citizenship"  id="citizenship" value="<?php echo isset($post['citizenship']) ? $post['citizenship'] : ''; ?>" placeholder="<?php echo $this->lang->line('citizenship'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('citizenship'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="language"><?php echo $this->lang->line('language'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="language"  id="language" value="<?php echo isset($post['language']) ? $post['language'] : ''; ?>" placeholder="<?php echo $this->lang->line('language'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('language'); ?></div> 
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="teacher_type"><?php echo $this->lang->line('teacher_type'); ?></label>
                                            <select id="teacher_type" name="teacher_type" placeholder="" type="text" class="form-control" >
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>
                                                  <?php foreach ($teachertype as $obj) { ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php
                                                    if (isset($post['teacher_type']) && $post['teacher_type'] == $obj->id) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $obj->type; ?></option>
                                                        <?php } ?>
                                            </select>
                                            
                                            
                                            <span class="text-danger"><?php echo form_error('teacher_type'); ?></span>
                                        </div>
                                    </div>
<!--
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="ordination_date"><?php echo $this->lang->line('ordination_date'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="ordination_date"  id="add_ordination_date" value="<?php echo isset($post['ordination_date']) ? $post['ordination_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('ordination_date'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('ordination_date'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="higher_ordination_date"><?php echo $this->lang->line('higher_ordination_date'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="higher_ordination_date"  id="add_higher_ordination_date" value="<?php echo isset($post['higher_ordination_date']) ? $post['higher_ordination_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('higher_ordination_date'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('higher_ordination_date'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="ordination_chapter"><?php echo $this->lang->line('ordination_chapter'); ?></label>
                                            <!--<input  class="form-control col-md-7 col-xs-12"  name="ordination_chapter"  id="ordination_chapter" value="<?php echo isset($post['ordination_chapter']) ? $post['ordination_chapter'] : ''; ?>" placeholder="<?php echo $this->lang->line('ordination_chapter'); ?>"  type="text" autocomplete="off">-->
                                            
                                            <select  class="form-control col-md-7 col-xs-12" name="ordination_chapter" id="ordination_chapter">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                <?php $ordination_chapter = get_ordination_chapter(); ?>
                                                <?php foreach ($ordination_chapter as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['ordination_chapter']) && $post['ordination_chapter'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                            </select>
                                            
                                            <div class="help-block"><?php echo form_error('ordination_chapter'); ?></div> 
                                        </div>
                                    </div>
                                    <!---my work end-->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="add_dob" value="<?php echo isset($post['dob']) ? $post['dob'] : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off" onchange="get_pensiondate(this.value, '');">
                                            <div class="help-block"><?php echo form_error('dob'); ?></div>
                                        </div>
                                    </div>

                                    <!---my work-->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="citizenship"><?php echo $this->lang->line('passport_number'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="passport_number"  id="passport_number" value="<?php echo isset($post['passport_number']) ? $post['passport_number'] : ''; ?>" placeholder="<?php echo $this->lang->line('passport_number'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('passport_number'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="teacher_number"><?php echo $this->lang->line('teacher_number'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="teacher_number"  id="teacher_number" value="<?php echo isset($post['teacher_number']) ? $post['teacher_number'] : ''; ?>" placeholder="<?php echo $this->lang->line('teacher_number'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('teacher_number'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pension_number"><?php echo $this->lang->line('pension_number'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="pension_number"  id="pension_number" value="<?php echo isset($post['pension_number']) ? $post['pension_number'] : ''; ?>" placeholder="<?php echo $this->lang->line('pension_number'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('pension_number'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="edcs_number"><?php echo $this->lang->line('edcs_number'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="edcs_number"  id="edcs_number" value="<?php echo isset($post['edcs_number']) ? $post['edcs_number'] : ''; ?>" placeholder="<?php echo $this->lang->line('edcs_number'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('edcs_number'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pension_age"><?php echo $this->lang->line('pension_age'); ?> </label>
                                            <!--<input  class="form-control col-md-7 col-xs-12"  name="pension_age"  id="pension_age" value="<?php echo isset($post['pension_age']) ? $post['pension_age'] : ''; ?>" placeholder="<?php echo $this->lang->line('pension_age'); ?>" type="text" autocomplete="off">-->

                                            <select  class="form-control col-md-7 col-xs-12"  name="pension_age"  id="pension_age" >
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="55" <?php
                                                if (isset($post['pension_age']) && $post['pension_age'] == '55') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>>55</option>                                           
                                                <option value="60" <?php
                                                if (isset($post['pension_age']) && $post['pension_age'] == '60') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>>60</option>
                                                <option value="65" <?php
                                                if (isset($post['pension_age']) && $post['pension_age'] == '65') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>>65</option> 
                                                
                                            </select>

                                            <div class="help-block"><?php echo form_error('pension_age'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pension_date"><?php echo $this->lang->line('pension_date'); ?></label>
                                            <input  readonly=""class="form-control col-md-7 col-xs-12"  name="pension_date"  id="add_pension_date" value="<?php echo isset($post['pension_date']) ? $post['pension_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('pension_date'); ?>"  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('pension_date'); ?></div>
                                        </div>
                                    </div>



                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="present_address"><?php echo $this->lang->line('present_address'); ?></label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="<?php echo $this->lang->line('present_address'); ?>"><?php echo isset($post['present_address']) ? $post['present_address'] : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="permanent_address"><?php echo $this->lang->line('permanent_address'); ?></label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="permanent_address"  placeholder="<?php echo $this->lang->line('permanent_address'); ?>"><?php echo isset($post['permanent_address']) ? $post['permanent_address'] : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('permanent_address'); ?></div>
                                        </div>
                                    </div>

                                </div>                                                      

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('academic_information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($post['email']) ? $post['email'] : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="username"><?php echo $this->lang->line('username'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="username"  id="username" value="<?php echo isset($post['username']) ? $post['username'] : ''; ?>" placeholder="<?php echo $this->lang->line('username'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('username'); ?></div>
                                        </div>
                                    </div> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="password"><?php echo $this->lang->line('password'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="password"  id="password" value="" placeholder="<?php echo $this->lang->line('password'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('password'); ?></div>
                                        </div>
                                    </div>  
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="salary_grade_id"><?php echo $this->lang->line('salary_grade'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="salary_grade_id" id="add_salary_grade_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <?php foreach ($grades as $obj) { ?>                                           
                                                    <option value="<?php echo $obj->id; ?>" <?php
                                                    if (isset($post['salary_grade_id']) && $post['salary_grade_id'] == $obj->id) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $obj->grade_name; ?></option>
                                                        <?php } ?>           
                                            </select>
                                            <div class="help-block"><?php echo form_error('salary_grade_id'); ?></div>
                                        </div>
                                    </div>  
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="salary_type"><?php echo $this->lang->line('salary_type'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12" name="salary_type" id="salary_type" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="permanent" <?php
                                                if (isset($post['salary_type']) && $post['salary_type'] == 'permanent') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('permanent'); ?></option>
												<option value="not_approved" <?php
                                                if (isset($post['salary_type']) && $post['salary_type'] == 'not_approved') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('not_approved'); ?></option> 
                                                <option value="temporary" <?php
                                                if (isset($post['salary_type']) && $post['salary_type'] == 'temporary') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('temporary'); ?></option>                                
                                            </select>
                                            <div class="help-block"><?php echo form_error('salary_type'); ?></div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id" id="role_id" required="required">                                                
                                                <?php foreach ($roles as $obj) { ?>
                                                    <?php if (in_array($obj->id, array(TEACHER))) { ?>
                                                        <option value="<?php echo $obj->id; ?>" <?php
                                                        if (isset($post['role_id']) && $post['role_id'] == $obj->id) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $obj->name; ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="joining_date"><?php echo $this->lang->line('appointment_date2'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="joining_date"  id="add_joining_date" value="<?php echo isset($post['joining_date']) ? $post['joining_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('appointment_date2'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('appointment_date2'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="resume"><?php echo $this->lang->line('resume'); ?> </label>                                           
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="resume"  id="resume" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                            <div class="help-block"><?php echo form_error('resume'); ?></div>
                                        </div>
                                    </div>  
                                </div>

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('education_qulification'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item form-group">
<!--                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <table style="width:100%;" class="fn_add_stop_container responsive"> 
                                                <tr>               
                                                    <td><?php echo $this->lang->line('tea_qutype'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_head'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_univinstitute'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_year'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_class'); ?></td>
                                                </tr>
                                                <tr>               
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_qutype[]" placeholder="<?php echo $this->lang->line('tea_qutype'); ?>" />
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_head[]" value="" placeholder="<?php echo $this->lang->line('tea_head'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_univinstitute[]" value="" placeholder="<?php echo $this->lang->line('tea_univinstitute'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_year[]" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_class[]" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>                                           
                                            </table>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                                <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_more('fn_add_stop_container');"><?php echo $this->lang->line('add_more'); ?></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!--Professional Qual-->

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('profesional_qulification'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item form-group">
<!--                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <table style="width:100%;" class="fn_add_stop_prcontainer responsive"> 
                                                <tr>               
                                                    <td><?php echo $this->lang->line('tea_qutype'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_head'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_univinstitute'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_year'); ?></td>
                                                    <td><?php echo $this->lang->line('tea_class'); ?></td>
                                                </tr>
                                                <tr>               
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_prtype[]" placeholder="<?php echo $this->lang->line('tea_qutype'); ?>" />
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_prhead[]" value="" placeholder="<?php echo $this->lang->line('tea_head'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_prunivinstitute[]" value="" placeholder="<?php echo $this->lang->line('tea_univinstitute'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_pryear[]" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_prclass[]" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>                                           
                                            </table>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                                <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_prmore('fn_add_stop_prcontainer');"><?php echo $this->lang->line('add_more'); ?></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!--Working Qual-->

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('working_history'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item form-group">
<!--                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <table style="width:100%;" class="fn_add_stop_workcontainer responsive"> 
                                                <tr>               
                                                    <td><?php echo $this->lang->line('work_pirivena'); ?></td>
                                                    <td><?php echo $this->lang->line('work_address'); ?></td>
                                                    <td><?php echo $this->lang->line('work_from'); ?></td>
                                                    <td><?php echo $this->lang->line('work_to'); ?></td>
                                                    <td><?php echo $this->lang->line('work_tranfer'); ?></td>
                                                </tr>
                                                <tr>               
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="working_pirivena[]" placeholder="<?php echo $this->lang->line('work_pirivena'); ?>" />
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_address[]" value="" placeholder="<?php echo $this->lang->line('work_address'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_from[]" value="" placeholder="<?php echo $this->lang->line('work_from'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_to[]" value="" placeholder="<?php echo $this->lang->line('work_to'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_tranfer[]" value="" placeholder="<?php echo $this->lang->line('work_tranfer'); ?>"/>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>                                           
                                            </table>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                                <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_workmore('fn_add_stop_workcontainer');"><?php echo $this->lang->line('add_more'); ?></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('other_information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--<div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="is_view_on_web"><?php echo $this->lang->line('is_view_on_web'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="is_view_on_web" id="is_view_on_web">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="1" <?php
                                                if (isset($post['is_view_on_web']) && $post['is_view_on_web'] == '1') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('yes'); ?></option>                                           
                                                <option value="0" <?php
                                                if (isset($post['is_view_on_web']) && $post['is_view_on_web'] == '0') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('no'); ?></option>                                           
                                            </select>
                                            <div class="help-block"><?php echo form_error('is_view_on_web'); ?></div>
                                        </div>
                                    </div>-->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($post['facebook_url']) ? $post['facebook_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('facebook_url'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($post['linkedin_url']) ? $post['linkedin_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('linkedin_url'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($post['twitter_url']) ? $post['twitter_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('twitter_url'); ?></div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($post['google_plus_url']) ? $post['google_plus_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?>" type="text" autocomplete="">
                                            <div class="help-block"><?php echo form_error('google_plus_url'); ?></div>
                                        </div>
                                    </div>
                                    -->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($post['instagram_url']) ? $post['instagram_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('instagram_url'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($post['youtube_url']) ? $post['youtube_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('youtube_url'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($post['pinterest_url']) ? $post['pinterest_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('pinterest_url'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="other_info"><?php echo $this->lang->line('other_info'); ?> </label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="other_info"  id="other_info" placeholder="<?php echo $this->lang->line('other_info'); ?>"><?php echo isset($post['other_info']) ? $post['other_info'] : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('other_info'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="photo"><?php echo $this->lang->line('photo'); ?> </label>                                           
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            <div class="help-block"><?php echo form_error('photo'); ?></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('teacher/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>

                            <!---======EDIT ===============--->
                            <div class="tab-pane fade in active" id="tab_edit_teacher">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url('teacher/edit/' . $teacher->id), array('name' => 'editteacher', 'id' => 'editteacher', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php $this->load->view('layout/school_list_edit_form'); ?>

                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('basic_information'); ?>:</strong></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($teacher->name) ? $teacher->name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('name'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="national_id"><?php echo $this->lang->line('national_id'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="<?php echo isset($teacher->national_id) ? $teacher->national_id : ''; ?>" placeholder="<?php echo $this->lang->line('national_id'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('national_id'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="responsibility"><?php echo $this->lang->line('responsibility'); ?> <span class="required">*</span></label>
                                                <!--<input  class="form-control col-md-7 col-xs-12"  name="responsibility"  id="responsibility" value="<?php echo isset($teacher->responsibility) ? $teacher->responsibility : ''; ?>" placeholder="<?php echo $this->lang->line('responsibility'); ?>" required="required" type="text" autocomplete="off">-->
                                                   <select  class="form-control col-md-7 col-xs-12"  name="responsibility"  id="responsibility" required="required">
                                             
                                                    <?php foreach ($listsubjects as $key => $value) { ?>
                                                        <option value="<?php echo $value["sub_name"] ?>" <?php
                                                        if ($teacher->responsibility == $value["sub_name"]) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value["sub_name"] ?></option>
                                                            <?php } ?>
                                                        
                                                 
                                                   </select>
                                                <div class="help-block"><?php echo form_error('responsibility'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($teacher->phone) ? $teacher->phone : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                            </div>
                                        </div>                                    

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="gender"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php $genders = get_genders(); ?>
                                                    <?php foreach ($genders as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ($teacher->gender == $key) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('gender'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="blood_group"><?php echo $this->lang->line('blood_group'); ?> </label>
                                                <select  class="form-control col-md-7 col-xs-12" name="blood_group" id="blood_group">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                    <?php $bloods = get_blood_group(); ?>
                                                    <?php foreach ($bloods as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ($teacher->blood_group == $key) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('blood_group'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="religion"><?php echo $this->lang->line('religion'); ?> </label>
                                                <!--<input  class="form-control col-md-7 col-xs-12"  name="religion"  id="religion" value="<?php echo isset($teacher->religion) ? $teacher->religion : ''; ?>" placeholder="<?php echo $this->lang->line('religion'); ?>" type="text" autocomplete="off">-->
                                               
                                                <select  class="form-control col-md-7 col-xs-12" name="religion" id="religion">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                    <?php $religion = get_religion(); ?>
                                                    <?php foreach ($religion as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ($teacher->religion == $key) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('religion'); ?></div>
                                            </div>
                                        </div>

                                        <!------------->

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="nationality"><?php echo $this->lang->line('nationality'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="nationality"  id="nationality" value="<?php echo isset($teacher->nationality) ? $teacher->nationality : ''; ?>" placeholder="<?php echo $this->lang->line('nationality'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('nationality'); ?></div>
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="citizenship"><?php echo $this->lang->line('citizenship'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="citizenship"  id="citizenship" value="<?php echo isset($teacher->citizenship) ? $teacher->citizenship : ''; ?>" placeholder="<?php echo $this->lang->line('citizenship'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('citizenship'); ?></div>
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="language"><?php echo $this->lang->line('language'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="language"  id="language" value="<?php echo isset($teacher->language) ? $teacher->language : ''; ?>" placeholder="<?php echo $this->lang->line('language'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('language'); ?></div>
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="teacher_type"><?php echo $this->lang->line('teacher_type'); ?></label>
                                                <select id="teacher_type" name="teacher_type" placeholder="" type="text" class="form-control" >
                                                    <option value="select"><?php echo $this->lang->line('select') ?></option>
                                                       <?php foreach ($teachertype as $obj) { ?>
                                                        <option value="<?php echo $obj->id; ?>" <?php
                                                        if ($teacher->type_id == $obj->id) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $obj->type; ?></option>
                                                            <?php } ?>
                                                </select> 
                                                <span class="text-danger"><?php echo form_error('teacher_type'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="ordination_date"><?php echo $this->lang->line('ordination_date'); ?></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="ordination_date"  id="edit_ordination_date" 
											    value="<?php
												 if($teacher->ordination_date !='1970-01-01') {
													 echo date('d-m-Y', strtotime($teacher->ordination_date));
												 } 
												 else echo ''; ?>" 
												 placeholder="<?php echo $this->lang->line('ordination_date'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('ordination_date'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="higher_ordination_date"><?php echo $this->lang->line('higher_ordination_date'); ?></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="higher_ordination_date"  id="edit_higher_ordination_date" 
											    value="<?php
												 if($teacher->higher_ordination_date !='1970-01-01'){
													  echo date('d-m-Y', strtotime($teacher->higher_ordination_date));
												 }
												 else echo ''; ?>"
												 placeholder="<?php echo $this->lang->line('higher_ordination_date'); ?>"type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('higher_ordination_date'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="ordination_chapter"><?php echo $this->lang->line('ordination_chapter'); ?> </label>
                                               <!-- <input  class="form-control col-md-7 col-xs-12"  name="ordination_chapter"  id="ordination_chapter" value="<?php echo isset($teacher->ordination_chapter) ? $teacher->ordination_chapter : ''; ?>" placeholder="<?php echo $this->lang->line('ordination_chapter'); ?>" type="text" autocomplete="off">-->
                                               
                                               
                                               <select  class="form-control col-md-7 col-xs-12" name="ordination_chapter" id="ordination_chapter">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                    <?php $ordination_chapter = get_ordination_chapter(); ?>
                                                    <?php foreach ($ordination_chapter as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ($teacher->ordination_chapter == $key) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>
                                                </select>
                                               
                                                <div class="help-block"><?php echo form_error('ordination_chapter'); ?></div>
                                            </div>
                                        </div>
                                        <!------------->

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="<?php echo isset($teacher->dob) ? date('d-m-Y', strtotime($teacher->dob)) : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('dob'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="passport_number"><?php echo $this->lang->line('passport_number'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="passport_number"  id="passport_number" value="<?php echo isset($teacher->passport_number) ? $teacher->passport_number : ''; ?>" placeholder="<?php echo $this->lang->line('passport_number'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('passport_number'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="teacher_number"><?php echo $this->lang->line('teacher_number'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="teacher_number"  id="teacher_number" value="<?php echo isset($teacher->teacher_number) ? $teacher->teacher_number : ''; ?>" placeholder="<?php echo $this->lang->line('teacher_number'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('teacher_number'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="pension_number"><?php echo $this->lang->line('pension_number'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="pension_number"  id="pension_number" value="<?php echo isset($teacher->pension_number) ? $teacher->ordination_chapter : ''; ?>" placeholder="<?php echo $this->lang->line('pension_number'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('pension_number'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="edcs_number"><?php echo $this->lang->line('edcs_number'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="edcs_number"  id="edcs_number" value="<?php echo isset($teacher->edcs_number) ? $teacher->edcs_number : ''; ?>" placeholder="<?php echo $this->lang->line('edcs_number'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('edcs_number'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="pension_age"><?php echo $this->lang->line('pension_age'); ?> </label>
                                                <!--<input  class="form-control col-md-7 col-xs-12"  name="pension_age"  id="pension_age" value="<?php echo isset($teacher->pension_age) ? $teacher->pension_age : ''; ?>" placeholder="<?php echo $this->lang->line('pension_age'); ?>" type="text" autocomplete="off">-->
                                               
                                                   <select  class="form-control col-md-7 col-xs-12" name="pension_age" id="edit_pension_age">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                    <option value="55" <?php
                                                    if ($teacher->pension_age == 55) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>>55</option>                                           
                                                    <option value="60" <?php
                                                    if ($teacher->pension_age == 60) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>>60</option>
                                                     <option value="65" <?php
                                                    if ($teacher->pension_age == 65) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>>65</option>   
                                                </select>
                                                <div class="help-block"><?php echo form_error('pension_age'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="pension_date"><?php echo $this->lang->line('pension_date'); ?></lable>
                                                <input readonly="" class="form-control col-md-7 col-xs-12"  name="pension_date"  id="edit_pension_date" value="<?php echo isset($teacher->pension_date) ? date('d-m-Y', strtotime($teacher->pension_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('pension_date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('pension_date'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="present_address"><?php echo $this->lang->line('present_address'); ?> </label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="<?php echo $this->lang->line('present_address'); ?>"><?php echo isset($teacher->present_address) ? $teacher->present_address : ''; ?></textarea>
                                                <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="permanent_address"><?php echo $this->lang->line('permanent_address'); ?></label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="permanent_address"  placeholder="<?php echo $this->lang->line('permanent_address'); ?>"><?php echo isset($teacher->permanent_address) ? $teacher->permanent_address : ''; ?></textarea>
                                                <div class="help-block"><?php echo form_error('permanent_address'); ?></div>
                                            </div>
                                        </div>

                                    </div>                                                      

                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('academic_information'); ?>:</strong></h5>
                                        </div>
                                    </div>
                                    <div class="row"> 

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="email"><?php echo $this->lang->line('email'); ?></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($teacher->email) ? $teacher->email : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" type="email" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('email'); ?></div>
                                            </div>
                                        </div> 


                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="username"><?php echo $this->lang->line('username'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="username"  readonly="readonly"  id="username" value="<?php echo isset($teacher->username) ? $teacher->username : ''; ?>" placeholder="<?php echo $this->lang->line('username'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('username'); ?></div>
                                            </div>
                                        </div>                                    

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="salary_grade_id"><?php echo $this->lang->line('salary_grade'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12 quick-field" name="salary_grade_id" id="edit_salary_grade_id" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                    <?php foreach ($grades as $obj) { ?>                                           
                                                        <option value="<?php echo $obj->id; ?>" <?php
                                                        if ($teacher->salary_grade_id == $obj->id) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $obj->grade_name; ?></option>
                                                            <?php } ?>           
                                                </select>
                                                <div class="help-block"><?php echo form_error('salary_grade_id'); ?></div>
                                            </div>
                                        </div>  
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="salary_type"><?php echo $this->lang->line('salary_type'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12" name="salary_type" id="edit_salary_type" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                     <option value="permanent" <?php
                                                    if ($teacher->salary_type == 'permanent') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('permanent'); ?></option>
													<option value="not_approved" <?php
                                                    if ($teacher->salary_type == 'not_approved') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('not_approved'); ?></option>
                                                    <option value="temporary" <?php
                                                    if ($teacher->salary_type == 'temporary') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('temporary'); ?></option>                                    
                                                </select>
                                                <div class="help-block"><?php echo form_error('salary_type'); ?></div>
                                            </div>
                                        </div>                                    

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id" id="role_id" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php foreach ($roles as $obj) { ?>
                                                        <?php if (in_array($obj->id, array(TEACHER))) { ?>
                                                            <option value="<?php echo $obj->id; ?>" <?php
                                                            if ($teacher->role_id == $obj->id) {
                                                                echo 'selected="selected"';
                                                            }
                                                            ?>><?php echo $obj->name; ?></option>
                                                                <?php } ?>
                                                            <?php } ?>                                              
                                                </select>
                                                <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="joining_date"><?php echo $this->lang->line('appointment_date2'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="joining_date"  id="edit_joining_date" value="<?php echo isset($teacher->joining_date) ? date('d-m-Y', strtotime($teacher->joining_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('appointment_date2'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('appointment_date2'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="resume"><?php echo $this->lang->line('resume'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="resume"  id="resume" type="file">
                                                </div>
                                                <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>                                            <div class="help-block"><?php echo form_error('resume'); ?></div>

                                            </div>
                                        </div> 
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="resume">&nbsp;</label>   
                                                <input type="hidden" name="prev_resume" id="prev_resume" value="<?php echo $teacher->resume; ?>" />
                                                <?php if ($teacher->resume) { ?>
                                                    <a target="_blank" href="<?php echo UPLOAD_PATH; ?>/teacher-resume/<?php echo $teacher->resume; ?>"><?php echo $teacher->resume; ?></a> <br/>
                                                <?php } ?>  
                                            </div>
                                        </div> 
                                    </div>


                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('education_qulification'); ?>:</strong></h5>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="item form-group">
                                         <!--<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <table style="width:100%;" id="edu" class="fn_edit_stop_container responsive"> 
                                                    <tr>               
                                                        <td><?php echo $this->lang->line('tea_qutype'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_head'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_univinstitute'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_year'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_class'); ?></td>
                                                    </tr>
                                                    <?php
                                                    $couter = 1;
                                                    foreach ($teacher_edu as $obj) {
                                                        ?> 
                                                        <tr>               
                                                            <td>                                                  
                                                                <input type="hidden" name="teaedu_id[]" value="<?php echo $obj->id; ?>" />
                                                                <input class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_qutype[]" value="<?php echo $obj->teach_qutype; ?>" placeholder="<?php echo $this->lang->line('tea_qutype'); ?>" />
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_head[]" value="<?php echo $obj->teach_head; ?>" placeholder="<?php echo $this->lang->line('tea_head'); ?>"/>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_univinstitute[]" value="<?php echo $obj->teach_univinstitute; ?>" placeholder="<?php echo $this->lang->line('tea_univinstitute'); ?>"/>
                                                            </td>

                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_year[]" value="<?php echo $obj->teach_year; ?>" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>
                                                            </td>

                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_class[]" value="<?php echo $obj->teach_class; ?>" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>
                                                            </td>
                                                            <td>
                                                                <?php if ($couter > 1) { ?>
                                                                    <a  class="btn btn-danger btn-md " onclick="remove(this, <?php echo $obj->id; ?>);" style="margin-bottom: -0px;" > - </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr> 
                                                        <?php
                                                        $couter++;
                                                    }
                                                    ?>

                                                </table>
                                                <div class="help-block">
                                                    <?php echo form_error('answer'); ?>
                                                    <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_more('fn_edit_stop_container');"><?php echo $this->lang->line('add_more'); ?></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('profesional_qulification'); ?>:</strong></h5>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="item form-group">
                                         <!--<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <table style="width:100%;" id="pru" class="fn_edit_stop_prcontainer responsive"> 
                                                    <tr>               
                                                        <td><?php echo $this->lang->line('tea_qutype'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_head'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_univinstitute'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_year'); ?></td>
                                                        <td><?php echo $this->lang->line('tea_class'); ?></td>
                                                    </tr>
                                                    <?php
                                                    $couterpr = 1;
                                                    foreach ($teacher_pru as $obj) {
                                                        ?> 
                                                        <tr>               
                                                            <td>                                                  
                                                                <input type="hidden" name="teapru_id[]" value="<?php echo $obj->id; ?>" />
                                                                <input class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_prtype[]" value="<?php echo $obj->teach_qutype; ?>" placeholder="<?php echo $this->lang->line('tea_qutype'); ?>" />
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_prhead[]" value="<?php echo $obj->teach_head; ?>" placeholder="<?php echo $this->lang->line('tea_head'); ?>"/>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_prunivinstitute[]" value="<?php echo $obj->teach_univinstitute; ?>" placeholder="<?php echo $this->lang->line('tea_univinstitute'); ?>"/>
                                                            </td>

                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_pryear[]" value="<?php echo $obj->teach_year; ?>" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>
                                                            </td>

                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="teach_prclass[]" value="<?php echo $obj->teach_class; ?>" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>
                                                            </td>
                                                            <td>
                                                                <?php if ($couterpr > 1) { ?>
                                                                    <a  class="btn btn-danger btn-md " onclick="prremove(this, <?php echo $obj->id; ?>);" style="margin-bottom: -0px;" > - </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr> 
                                                        <?php
                                                        $couterpr++;
                                                    }
                                                    ?>

                                                </table>
                                                <div class="help-block">
                                                    <?php echo form_error('answer'); ?>
                                                    <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_prmore('fn_edit_stop_prcontainer');"><?php echo $this->lang->line('add_more'); ?></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('working_history'); ?>:</strong></h5>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="item form-group">
                                         <!--<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <table style="width:100%;" id="work" class="fn_edit_stop_workcontainer responsive"> 
                                                    <tr>               
                                                        <td><?php echo $this->lang->line('work_pirivena'); ?></td>
                                                        <td><?php echo $this->lang->line('work_address'); ?></td>
                                                        <td><?php echo $this->lang->line('work_from'); ?></td>
                                                        <td><?php echo $this->lang->line('work_to'); ?></td>
                                                        <td><?php echo $this->lang->line('work_tranfer'); ?></td>
                                                    </tr>
                                                    <?php
                                                    $couterwork = 1;
                                                    foreach ($teacher_work as $obj) {
                                                        ?> 
                                                        <tr>               
                                                            <td>                                                  
                                                                <input type="hidden" name="teawork_id[]" value="<?php echo $obj->id; ?>" />
                                                                <input class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="working_pirivena[]" value="<?php echo $obj->working_pirivena; ?>" placeholder="<?php echo $this->lang->line('work_pirivena'); ?>" />
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_address[]" value="<?php echo $obj->working_address; ?>" placeholder="<?php echo $this->lang->line('work_address'); ?>"/>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_from[]" value="<?php echo $obj->working_from; ?>" placeholder="<?php echo $this->lang->line('work_from'); ?>"/>
                                                            </td>

                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_to[]" value="<?php echo $obj->working_to; ?>" placeholder="<?php echo $this->lang->line('work_to'); ?>"/>
                                                            </td>

                                                            <td>
                                                                <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="working_tranfer[]" value="<?php echo $obj->working_tranfer; ?>" placeholder="<?php echo $this->lang->line('work_tranfer'); ?>"/>
                                                            </td>
                                                            <td>
                                                                <?php if ($couterwork > 1) { ?>
                                                                    <a  class="btn btn-danger btn-md " onclick="workremove(this, <?php echo $obj->id; ?>);" style="margin-bottom: -0px;" > - </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr> 
                                                        <?php
                                                        $couterwork++;
                                                    }
                                                    ?>

                                                </table>
                                                <div class="help-block">
                                                    <?php echo form_error('answer'); ?>
                                                    <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_workmore('fn_edit_stop_workcontainer');"><?php echo $this->lang->line('add_more'); ?></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('other_information'); ?>:</strong></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <!-- <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="is_view_on_web"><?php echo $this->lang->line('is_view_on_web'); ?> </label>
                                                <select  class="form-control col-md-7 col-xs-12" name="is_view_on_web" id="is_view_on_web">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                    <option value="1" <?php
                                                    if ($teacher->is_view_on_web == 1) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('yes'); ?></option>                                           
                                                    <option value="0" <?php
                                                    if ($teacher->is_view_on_web == 0) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('no'); ?></option>                                           
                                                </select>
                                                <div class="help-block"><?php echo form_error('is_view_on_web'); ?></div>
                                            </div>
                                        </div>-->
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($teacher->facebook_url) ? $teacher->facebook_url : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('facebook_url'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($teacher->linkedin_url) ? $teacher->linkedin_url : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('linkedin_url'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($teacher->twitter_url) ? $teacher->twitter_url : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('twitter_url'); ?></div>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($teacher->google_plus_url) ? $teacher->google_plus_url : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('google_plus_url'); ?></div>
                                            </div>
                                        </div>-->
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($teacher->instagram_url) ? $teacher->instagram_url : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('instagram_url'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($teacher->youtube_url) ? $teacher->youtube_url : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('youtube_url'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($teacher->pinterest_url) ? $teacher->pinterest_url : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('pinterest_url'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="other_info"><?php echo $this->lang->line('other_info'); ?> </label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="other_info"  id="other_info" placeholder="<?php echo $this->lang->line('other_info'); ?>"><?php echo isset($teacher->other_info) ? $teacher->other_info : ''; ?></textarea>
                                                <div class="help-block"><?php echo form_error('other_info'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="photo"> <?php echo $this->lang->line('photo'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo"  type="file">
                                                </div>
                                                <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                <div class="help-block"><?php echo form_error('photo'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $teacher->photo; ?>" />
                                                <?php if ($teacher->photo) { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $teacher->photo; ?>" alt="" width="70" /><br/><br/>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" name="id" id="id" value="<?php echo $teacher->id; ?>" />
                                            <a href="<?php echo site_url('teacher/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>  
                        <?php } ?>


                        <?php if (isset($detail)) { ?>
                            <div class="tab-pane fade in active" id="tab_view_teacher">
                                <div class="x_content"> 
                                    <?php $this->load->view('get-single-teacher'); ?>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-teacher-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_teacher_data">

            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_teacher_modal(teacher_id) {

        $('.fn_teacher_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('teacher/get_single_teacher'); ?>",
            data: {teacher_id: teacher_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_teacher_data').html(response);
                }
            }
        });
    }
</script>


<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>




<!-- Super admin js START  -->
<script type="text/javascript">
    var pension_age = 55;
    $("document").ready(function () {
<?php if (isset($edit) && !empty($edit)) { ?>
            $(".fn_school_id").trigger('change');
<?php } ?>

//    
//        $("#dob").on("keyup change", function () {
//            pension_age = this.value;
//
//        });
    });

    $('.fn_school_id').on('change', function () {

        var school_id = $(this).val();
        var salary_grade_id = '';
<?php if (isset($edit) && !empty($edit)) { ?>
            salary_grade_id = '<?php echo $teacher->salary_grade_id; ?>';
<?php } ?>

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line('select_school'); ?>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_salary_grade_by_school'); ?>",
            data: {school_id: school_id, salary_grade_id: salary_grade_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    if (salary_grade_id) {
                        $('#edit_salary_grade_id').html(response);
                    } else {
                        $('#add_salary_grade_id').html(response);
                    }
                }
            }
        });


    });


    $('#fn_display_order').on('click', function () {

        var school_id = $('#filter_school_id').val();

<?php if ($this->session->userdata('role_id') != SUPER_ADMIN) { ?>
            school_id = '<?php echo $this->session->userdata('role_id'); ?>';
<?php } ?>

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line('select_school'); ?>');
            return false;
        }
        var ids = '';
        var orders = '';
        $("input[name^='display_order']").each(function () {
            orders += $(this).val() + ',';
            ids += $(this).attr('itemid') + ',';
        });


        $.ajax({
            type: "POST",
            url: "<?php echo site_url('teacher/update_display_order'); ?>",
            data: {school_id: school_id, ids: ids, orders: orders},
            async: false,
            success: function (response) {
                if (response)
                {
                    toastr.success('<?php echo $this->lang->line('update_success'); ?>');
                    location.reload();
                } else {
                    toastr.error('<?php echo $this->lang->line('update_failed'); ?>');
                    return false;
                }
            }
        });


    });


    $('#pension_age').on('change', function () {
        pension_age = $(this).val();

        var dob = $('#add_dob').val();

        var birthdate = dob;
        var arr1 = birthdate.split('-');

//const currentDate = new Date(x);

        var currentDayOfMonth = arr1[0];
        var currentMonth = arr1[1]; // Be careful! January is 0, not 1
        var currentYear = arr1[2];



        var curyear = parseInt(currentYear) + parseInt(pension_age);

        var dateString = currentDayOfMonth + "-" + currentMonth + "-" + curyear;


        $('input[name=pension_date]').val(dateString);

    });
    
    
        $('#edit_pension_age').on('change', function () {
        pension_age = $(this).val();
        

        var dob = $('#edit_dob').val();
       

        var birthdate = dob;
        var arr1 = birthdate.split('-');

//const currentDate = new Date(x);

        var currentDayOfMonth = arr1[0];
        var currentMonth = arr1[1]; // Be careful! January is 0, not 1
        var currentYear = arr1[2];



        var curyear = parseInt(currentYear) + parseInt(pension_age);

        var dateString = currentDayOfMonth + "-" + currentMonth + "-" + curyear;

 //alert(dateString);

        $('input[name=pension_date]').val(dateString);

    });



    function get_pensiondate(birthYear = null) {

// alert(birthYear);
// alert(pension_age);

        var birthdate = birthYear;
        var arr1 = birthdate.split('-');

//const currentDate = new Date(x);

        var currentDayOfMonth = arr1[0];
        var currentMonth = arr1[1]; // Be careful! January is 0, not 1
        var currentYear = arr1[2];



        var curyear = parseInt(currentYear) + parseInt(pension_age);

        var dateString = currentDayOfMonth + "-" + currentMonth + "-" + curyear;

//        const currentDate = new Date(birthYear);
//        const currentYear = currentDate.getFullYear();
//        const currentmonth = currentDate.getMonth();
//        const currentdate = currentDate.getDate();
//        
//        

        //  const  today = currentdate + "-"+(currentmonth + 1)+"-"+curyear;

        //      const today = new Date(curyear, currentmonth, currentdate);

        //alert(age);
        //  var currentage = new Date(age);
        $('input[name=pension_date]').val(dateString);


    }

    function get_section_by_class(class_id, section_id) {

        var school_id = $('#school_id').val();

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line('select_school'); ?>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_section_by_class'); ?>",
            data: {school_id: school_id, class_id: class_id, section_id: section_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#section_id').html(response);
                }
            }
        });
    }

</script>
<!-- Super admin js end -->


<!-- datatable with buttons -->
<script type="text/javascript">

    $('#add_dob').datepicker({startView: 2});
    $('#add_joining_date').datepicker();
//    $('#add_pension_date').datepicker({startView: 2});
    $('#add_ordination_date').datepicker({startView: 2});
    $('#add_higher_ordination_date').datepicker({startView: 2});
    $('#edit_dob').datepicker({startView: 2});
    $('#edit_joining_date').datepicker();
//    $('#edit_pension_date').datepicker({startView: 2});
    $('#edit_ordination_date').datepicker({startView: 2});
    $('#edit_higher_ordination_date').datepicker({startView: 2});
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


    function get_teacher_by_school(url) {
        if (url) {
            window.location.href = url;
        }
        return false;
    }

</script>


<script type="text/javascript">
    $(document).on('focus', '.time', function () {
        var $this = $(this);
        $this.datetimepicker({
            format: 'LT'
        });
    });
    var tot_count = 0;
    var provincial = $('#provincial').val();


    // var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
    $(document).ready(function () {



//        $('.fn_school_id').on('change', function () {
//            $('#teacher_type').html("");
//            var school_id = $(this).val();
//            var base_url = '<?php echo base_url() ?>';
//            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
//
//            //alert(school_id);
//            $.ajax({
//                type: "POST",
//                url: "<?php echo site_url('ajax/getfetchteachertype'); ?>",
//                data: {'school_id': school_id},
//                dataType: "json",
//                success: function (data) {
//                    $.each(data, function (i, obj)
//                    {
//                        div_data += "<option value=" + obj.id + ">" + obj.type + "</option>";
//                    });
//
//                    $('#teacher_type').append(div_data);
//                }
//            });
//        });





    });






</script>



<script type="text/javascript">
    function add_more(fn_stop_container) {
        var data = '<tr>'
                + '<td style="width:50%;">'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_qutype[]" class="answer" placeholder="<?php echo $this->lang->line('tea_qutype'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_head[]" value="" placeholder="<?php echo $this->lang->line('tea_head'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_univinstitute[]" value="" placeholder="<?php echo $this->lang->line('tea_univinstitute'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_year[]" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_class[]" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                + '</td>'
                + '</tr>';
        $('.' + fn_stop_container).append(data);
    }


    function remove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('teacher/remove_stop'); ?>",
                    data: {stop_id: stop_id},
                    async: false,
                    success: function (response) {
                        if (response)
                        {
                            $(obj).parent().parent('tr').remove();
                        }
                    }
                });
            }
        } else {

            $(obj).parent().parent('tr').remove();
        }
    }



</script>



<script type="text/javascript">
    function add_prmore(fn_stop_prcontainer) {
        var data = '<tr>'
                + '<td style="width:50%;">'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_prtype[]" class="answer" placeholder="<?php echo $this->lang->line('tea_qutype'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_prhead[]" value="" placeholder="<?php echo $this->lang->line('tea_head'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_prunivinstitute[]" value="" placeholder="<?php echo $this->lang->line('tea_univinstitute'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_pryear[]" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="teach_prclass[]" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<a  class="btn btn-danger btn-md " onclick="prremove(this);" style="margin-bottom: -0px;" > - </a>'
                + '</td>'
                + '</tr>';
        $('.' + fn_stop_prcontainer).append(data);
    }


    function prremove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('teacher/remove_prstop'); ?>",
                    data: {stop_id: stop_id},
                    async: false,
                    success: function (response) {
                        if (response)
                        {
                            $(obj).parent().parent('tr').remove();
                        }
                    }
                });
            }
        } else {

            $(obj).parent().parent('tr').remove();
        }
    }



</script>



<script type="text/javascript">
    function add_workmore(fn_stop_workcontainer) {
        var data = '<tr>'
                + '<td style="width:50%;">'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="working_pirivena[]" class="answer" placeholder="<?php echo $this->lang->line('work_pirivena'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="working_address[]" value="" placeholder="<?php echo $this->lang->line('work_address'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="working_from[]" value="" placeholder="<?php echo $this->lang->line('work_from'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="working_to[]" value="" placeholder="<?php echo $this->lang->line('work_to'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="working_tranfer[]" value="" placeholder="<?php echo $this->lang->line('work_tranfer'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<a  class="btn btn-danger btn-md " onclick="workremove(this);" style="margin-bottom: -0px;" > - </a>'
                + '</td>'
                + '</tr>';
        $('.' + fn_stop_workcontainer).append(data);
    }


    function workremove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('teacher/remove_workstop'); ?>",
                    data: {stop_id: stop_id},
                    async: false,
                    success: function (response) {
                        if (response)
                        {
                            $(obj).parent().parent('tr').remove();
                        }
                    }
                });
            }
        } else {

            $(obj).parent().parent('tr').remove();
        }
    }



</script>


<script type="text/javascript">
    $(document).on('focus', '.time', function () {
        var $this = $(this);
        $this.datetimepicker({
            format: 'LT'
        });
    });
    var tot_count = 0;
    var provincial = $('#provincial').val();
    var district = '<?php echo set_value('district_id') ?>';
    var section_id = '<?php echo set_value('section_id') ?>';
    // var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
    $(document).ready(function () {

        //$('#myTabs a:first').tab('show') // Select first tab
//        getSectionByClass(provincial, district);
//        getGroupByClassandSection(provincial, district);




        $(document).on('change', '#add_provincial', function (e) {
            $('#add_district_id').html("");
            var provincial_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/getfetchprovincial'); ?>",
                data: {'class_id': provincial_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.districtname + "</option>";
                    });

                    $('#add_district_id').append(div_data);
                }
            });
        });


        $(document).on('change', '#add_district_id', function (e) {
            $('#add_zonal_id').html("");
            var dist_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzonal",
                url: "<?php echo site_url('ajax/getfetchzonal'); ?>",
                data: {'dist_id': dist_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.zoneid + ">" + obj.zonename + "</option>";
                    });

                    $('#add_zonal_id').append(div_data);
                }
            });
        });

        $(document).on('change', '#add_zonal_id', function (e) {
            $('#add_educational_id').html("");
            var zonal_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzoneblock",
                url: "<?php echo site_url('ajax/getfetchzoneblock'); ?>",
                data: {'zonal_id': zonal_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.zoneblockid + ">" + obj.zoneblock + "</option>";
                    });

                    $('#add_educational_id').append(div_data);
                }
            });
        });


        $(document).on('change', '#add_educational_id', function (e) {
            $('#add_school_id').html("");
            var educational_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzoneblock",
                url: "<?php echo site_url('ajax/getfetchschool'); ?>",
                data: {'educational_id': educational_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.school_name + "</option>";
                    });

                    $('#add_school_id').append(div_data);
                }
            });
        });


//        $(document).on('change', '#section_id', function (e) {
//            $('#subject_group_id').html("");
//            var section_id = $(this).val();
//            var class_id = $('#class_id').val();
//            var base_url = '<?php echo base_url() ?>';
//            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
//            $.ajax({
//                type: "POST",
//                url: base_url + "admin/subjectgroup/getGroupByClassandSection",
//                data: {'class_id': class_id, 'section_id': section_id},
//                dataType: "json",
//                success: function (data) {
//                    $.each(data, function (i, obj)
//                    {
//                        div_data += "<option value=" + obj.subject_group_id + ">" + obj.name + "</option>";
//                    });
//
//                    $('#subject_group_id').append(div_data);
//                }
//            });
//        });
    });




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



<?php if (isset($filtern_school_id)) { ?>
        get_schooln_by_edu('<?php echo $filter_edu_id; ?>', '<?php echo $filtern_school_id; ?>');
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