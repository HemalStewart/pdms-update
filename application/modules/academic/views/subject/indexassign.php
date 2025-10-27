<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-folder-open"></i><small> <?php echo $this->lang->line('sub_assign'); ?></small></h3>
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
                        ?>"><a href="#tab_subject_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'academic', 'subassign')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('academic/subject/subaddassign'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_subject"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?>                
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_subject"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>                              

                        <li class="li-class-list">

                            <?php if ($this->session->userdata('role_id') == ADMIN) { ?>
                                <?php echo form_open(site_url('academic/subject/indexassign/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_nid" name="class_nid"  style="width:auto;"   onchange="this.form.submit();">    
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                    <?php foreach ($classdata as $obj) { ?>
                                        <option value="<?php echo $obj->School_classesid; ?>" <?php
                                        if (isset($filter_class_id) && $filter_class_id == $obj->School_classesid) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->School_className; ?></option>
                                            <?php } ?> 

                                </select>
                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == GUARDIAN) {
                                ?>



                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == STUDENT) {
                                ?>



                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == TEACHER) {
                                ?>

                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == ACCOUNTANT) {
                                ?>


                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == LIBRARIN) {
                                ?>    


                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == SUBJECT) {
                                ?>    
                                <?php echo form_open(site_url('academic/subject/indexassign/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>

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
                                <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 



                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_zonal_id" name="zonal_id"  style="width:auto;"   onchange="get_edu_by_zonal(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_schooln_by_edu(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filtern_school_id" name="schooln_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                </select>

<!--                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_nid" name="class_nid"  style="width:auto;"   onchange="this.form.submit();">    

                                    <option value="select"><?php echo $this->lang->line('gradeselect') ?></option>


                                </select>-->


                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == PROVINCIAL) {
                                ?>    
                                <?php echo form_open(site_url('academic/subject/indexassign/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, '');this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 
                                    <?php foreach ($district as $obj) { ?>
                                        <option value="<?php echo $obj->id; ?>" <?php
                                        if (isset($filter_district_id) && $filter_district_id == $obj->id) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->districtname; ?></option>
                                            <?php } ?>   


                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_zonal_id" name="zonal_id"  style="width:auto;"   onchange="get_edu_by_zonal(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_schooln_by_edu(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filtern_school_id" name="schooln_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                </select>
<!--                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_nid" name="class_nid"  style="width:auto;"   onchange="this.form.submit();">    

                                    <option value="select"><?php echo $this->lang->line('gradeselect') ?></option>


                                </select>-->



                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == ZONAL) {
                                ?>    
                                <?php echo form_open(site_url('academic/subject/indexassign/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>




                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_schooln_by_edu(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 
                                    <?php foreach ($education as $obj) { ?>
                                        <option value="<?php echo $obj->zoneblockid; ?>" <?php
                                        if (isset($filter_edu_id) && $filter_edu_id == $obj->zoneblockid) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->zoneblock; ?></option>
                                            <?php } ?>   


                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filtern_school_id" name="schooln_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                </select>

<!--                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_nid" name="class_nid"  style="width:auto;"   onchange="this.form.submit();">    

                                    <option value="select"><?php echo $this->lang->line('gradeselect') ?></option>


                                </select>-->


                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == RECEPTIONIST) {
                                ?>   

                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == STAFF) {
                                ?>   



                                <?php
                                echo form_close();
                            } else {
                                ?> 

                                <?php echo form_open(site_url('academic/subject/indexassign/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
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
                                <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 



                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_zonal_id" name="zonal_id"  style="width:auto;"   onchange="get_edu_by_zonal(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_schooln_by_edu(this.value, ''); this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filtern_school_id" name="schooln_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                </select>

<!--                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_nid" name="class_nid"  style="width:auto;"   onchange="this.form.submit();">    

                                    <option value="select"><?php echo $this->lang->line('gradeselect') ?></option>


                                </select>-->

                            <?php }echo form_close(); ?>

                        </li>        
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_subject_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <?php if ($this->session->userdata('role_id') != ADMIN || $this->session->userdata('role_id') != GUARDIAN || $this->session->userdata('role_id') != STUDENT || $this->session->userdata('role_id') != TEACHER || $this->session->userdata('role_id') != ACCOUNTANT || $this->session->userdata('role_id') != LIBRARIN || $this->session->userdata('role_id') != RECEPTIONIST || $this->session->userdata('role_id') != STAFF || $this->session->userdata('role_id') != PROVINCIAL || $this->session->userdata('role_id') != ZONAL) { ?> 
                                                <th><?php echo $this->lang->line('school'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('subject_code'); ?></th>
                                            <th><?php echo $this->lang->line('class'); ?></th>
                                            <th><?php echo $this->lang->line('teacher'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($subjects) && !empty($subjects)) {
                                            ?>
                                            <?php foreach ($subjects as $obj) { ?>
                                                <?php
                                                if ($this->session->userdata('role_id') == GUARDIAN) {
                                                    if (!in_array($obj->class_id, $guardian_class_data)) {
                                                        continue;
                                                    }
                                                } elseif ($this->session->userdata('role_id') == STUDENT) {
                                                    if ($obj->class_id != $this->session->userdata('class_id')) {
                                                        continue;
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <?php if ($this->session->userdata('role_id') != ADMIN || $this->session->userdata('role_id') != GUARDIAN || $this->session->userdata('role_id') != STUDENT || $this->session->userdata('role_id') != TEACHER || $this->session->userdata('role_id') != ACCOUNTANT || $this->session->userdata('role_id') != LIBRARIN || $this->session->userdata('role_id') != RECEPTIONIST || $this->session->userdata('role_id') != STAFF || $this->session->userdata('role_id') != PROVINCIAL || $this->session->userdata('role_id') != ZONAL) { ?> 

                                                        <td><?php echo $obj->school_name; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $obj->name; ?></td>
                                                    <td><?php echo $obj->code; ?></td>
                                                    <td><?php echo $obj->class_name; ?></td>
                                                    <td><?php echo $obj->teacher; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'academic', 'subassign')) { ?>
                                                            <a href="<?php echo site_url('academic/subject/subeditassign/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'academic', 'subassign')) { ?>
                                                            <a  onclick="get_subject_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-subject-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'academic', 'subassign')) { ?>
                                                            <a href="<?php echo site_url('academic/subject/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                        ?>" id="tab_add_subject">
                            <div class="x_content"> 
                                <?php echo form_open(site_url('academic/subject/subaddassign'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php // $this->load->view('layout/school_list_form');    ?> 



                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="class_id"  id="add_class_id" required="required" onchange="get_subject(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 

                                            <?php foreach ($listclass as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value["School_classesid"] ?>" <?php echo set_select('class_id', $value['School_classesid'], set_value('class_id')); ?>><?php echo $value["School_className"] ?></option>
                                            <?php }
                                            ?> 
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>



                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="name" id="add_name" required="required" onchange="get_subjectcode(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>

                                        </select>

                                        <div class="help-block"><?php echo form_error('name'); ?></div> 
                                    </div>
                                </div>


                                <!--                                <div class="item form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('name'); ?><span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($post['name']) ? $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                                                    </div>
                                                                </div>-->
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code"><?php echo $this->lang->line('subject_code'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="code"  id="code" readonly="" placeholder="<?php echo $this->lang->line('subject_code'); ?>"  type="text" autocomplete="off">
                                        <!--<input  class="form-control col-md-7 col-xs-12"  name="name"  id="name"   required="required" type="hidden" autocomplete="off">-->
                                        <input  class="form-control col-md-7 col-xs-12"  name="Sublist_id"  id="add_Sublist_id"   type="hidden" autocomplete="off">
                                        <input  class="form-control col-md-7 col-xs-12"  name="Submainid"  id="add_Submainid"   type="hidden" autocomplete="off">

                                        <input  class="form-control col-md-7 col-xs-12"  name="author"  id="author" value="Admin" placeholder="<?php echo $this->lang->line('author'); ?>"  type="hidden" autocomplete="off">

                                        <div class="help-block"><?php echo form_error('code'); ?></div>
                                    </div>
                                </div>
                                <!--                                <div class="item form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author"><?php echo $this->lang->line('author'); ?></label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                          <div class="help-block"><?php echo form_error('author'); ?></div>
                                                                    </div>
                                                                </div>-->
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo $this->lang->line('type'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="type" id="type" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $types = get_subject_type(); ?>
                                            <?php foreach ($types as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>" <?php echo isset($post['type']) && $post['type'] == $key ? 'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('type'); ?></div>
                                    </div>
                                </div>



                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id"><?php echo $this->lang->line('teacher'); ?> <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="add_teacher_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach ($teachers as $obj) { ?>
                                                <option value="<?php echo $obj->id; ?>" <?php echo isset($post['teacher_id']) && $post['teacher_id'] == $obj->id ? 'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('teacher_id'); ?></div>
                                    </div>
                                </div>                                

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($post['note']) ? $post['note'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('academic/subject/indexassign'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_subject">
                                <div class="x_content"> 
                                    <?php echo form_open(site_url('academic/subject/subeditassign/' . $subject->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php // $this->load->view('layout/school_list_edit_form');    ?> 


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="class_id"  id="edit_class_id" required="required" onchange="get_subject(this.value, '');">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 

                                                <?php foreach ($listclass as $key => $value) { ?>
                                                    <option value="<?php echo $value["School_classesid"] ?>" <?php
                                                    if (isset($subject) && $subject->class_id == $value["School_classesid"]) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo ucfirst($value["School_className"]); ?></option>
                                                        <?php } ?>  
                                            </select>
                                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('subject'); ?> <?php echo $this->lang->line('name'); ?><span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="name"  id="edit_name" required="required" onchange="get_subjectcode(this.value, '');">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 

                                            </select>
                                            <div class="help-block"><?php echo form_error('name'); ?></div>
                                        </div>
                                    </div>


                                    <!--                                <div class="item form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namez"> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <input  class="form-control col-md-7 col-xs-12"  name="namez"  id="namez" value="<?php echo isset($subject->name) ? $subject->name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                                                            <div class="help-block"><?php echo form_error('namez'); ?></div>
                                                                        </div>
                                                                    </div>-->

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code"><?php echo $this->lang->line('subject_code'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="code"  id="edit_code" readonly=""value="<?php echo isset($subject->code) ? $subject->code : ''; ?>" placeholder="<?php echo $this->lang->line('subject'); ?> <?php echo $this->lang->line('code'); ?>" type="text" autocomplete="off">
                                            <input  class="form-control col-md-7 col-xs-12"  name="Sublist_id"  id="edit_Sublist_id" value="<?php echo isset($subject->name) ? $subject->name : ''; ?>" type="hidden" autocomplete="off">
                                            <input  class="form-control col-md-7 col-xs-12"  name="Submainid"  id="edit_Submainid"   value="<?php echo isset($subject->Submainid) ? $subject->Submainid : ''; ?>"  type="hidden" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('code'); ?></div>
                                            <!--<input  class="form-control col-md-7 col-xs-12"  name="edit_name"  id="edit_name" value="<?php echo isset($subject->name) ? $subject->name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="hidden" autocomplete="off">-->
                                        </div>
                                    </div>
                                    <!--                                <div class="item form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author"><?php echo $this->lang->line('author'); ?></label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <input  class="form-control col-md-7 col-xs-12"  name="author"  id="author" value="<?php echo isset($subject->author) ? $subject->author : ''; ?>" placeholder="<?php echo $this->lang->line('author'); ?>"  type="text" autocomplete="off">
                                                                            <div class="help-block"><?php echo form_error('author'); ?></div>
                                                                        </div>
                                                                    </div>-->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo $this->lang->line('type'); ?> </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="type" id="edit_type" >
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $types = get_subject_type(); ?>
                                                <?php foreach ($types as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if ($subject->type == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('type'); ?></div>
                                        </div>
                                    </div>



                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id"><?php echo $this->lang->line('teacher'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="edit_teacher_id" required="required" >
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                <?php foreach ($teachers as $obj) { ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php
                                                    if ($subject->teacher_id == $obj->id) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $obj->name; ?></option>
                                                        <?php } ?>                                            
                                            </select>
                                            <div class="help-block"><?php echo form_error('teacher_id'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="edit_note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($subject->note) ? $subject->note : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('note'); ?></div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($subject) ? $subject->id : $id; ?>" name="id" />
                                            <a href="<?php echo site_url('academic/subject/indexassign'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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


<div class="modal fade bs-subject-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_subject_data">            
            </div>       
        </div>
    </div>
</div>


<script type="text/javascript">

    function get_subject_modal(subject_id) {

        $('.fn_subject_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('academic/subject/get_single_subject'); ?>",
            data: {subject_id: subject_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_subject_data').html(response);
                }
            }
        });
    }
</script>


<!-- Super admin js START  -->
<script type="text/javascript">

    var edit = false;
<?php if (isset($school_id)) { ?>
        edit = true;
<?php } ?>

    $("document").ready(function () {
<?php if (isset($school_id) && !empty($school_id)) { ?>
            $("#edit_school_id").trigger('change');
<?php } ?>
    });

    $('.fn_school_id').on('change', function () {

        var school_id = $(this).val();
        var class_id = '';
        var teacher_id = '';

<?php if (isset($subject) && !empty($subject)) { ?>
            class_id = '<?php echo $subject->class_id; ?>';
            teacher_id = '<?php echo $subject->teacher_id; ?>';
<?php } ?>

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line('select_school'); ?>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data: {school_id: school_id, class_id: class_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    if (edit) {
                        $('#edit_class_id').html(response);
                    } else {
                        $('#add_class_id').html(response);
                    }

                    get_teacher_by_school(school_id, teacher_id);
                }
            }
        });
    });


    function get_teacher_by_school(school_id, teacher_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_teacher_by_school'); ?>",
            data: {school_id: school_id, teacher_id: teacher_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    if (edit) {
                        $('#edit_teacher_id').html(response);
                    } else {
                        $('#add_teacher_id').html(response);
                    }
                }
            }
        });
    }

</script>
<!-- Super admin js end -->

<!-- datatable with buttons -->
<script type="text/javascript">
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



<?php if (isset($filter_class_id)) { ?>
        get_class_by_school('<?php echo $filter_school_id; ?>', '<?php echo $filter_class_id; ?>');
<?php } ?>

    function get_class_by_school(school_id, class_id) {
       // alert(class_id);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data: {school_id: school_id, class_id: class_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filter_class_id').html(response);
                }
            }
        });
    }
    function get_subject_by_class(url) {

        if (url) {
            window.location.href = url;
        }
    }

    $("#add").validate();
    $("#edit").validate();
</script>


<script type="text/javascript">

<?php if (isset($edit)) { ?>
        get_subject('<?php echo $subject->class_id; ?>', '<?php echo $subject->sub_defineid; ?>');
<?php } elseif ($post && !empty($post)) { ?>
        get_subject('<?php echo $post['']; ?>', '<?php echo $post['name']; ?>');
<?php } ?>

    function get_subject(class_id, sub_id) {
        //alert(class_id);


        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/getsub_id'); ?>",
            data: {class_id: class_id, sub_id: sub_id},
            async: false,
            success: function (response) {
                $('#add_name').html(response);
                if (response)
                {
                    $('#add_name').html(response);
                    if (edit) {
                        $('#edit_name').html(response);
                    } else {
                        $('#add_name').html(response);
                    }
                }
            }
        });


    }

    function get_subjectcode(sub_id) {


        $.ajax({
            type: 'ajax',
            method: 'get',
            url: "<?php echo site_url('ajax/get_subjectcode'); ?>",
            data: {sub_id: sub_id},
            async: false,
            dataType: 'json',
            success: function (response) {


                $('input[name=code]').val(response.Subject_Code);
                $('input[name=Sublist_id]').val(response.Subject_Name);
                $('input[name=Submainid]').val(response.Sublist_id);

            }
        });


    }
</script>

<script type="text/javascript">



<?php if (isset($filter_class_nid)) { ?>
        get_subject_by_class('<?php echo $filter_piriventype_id; ?>', '<?php echo $filter_class_nid; ?>');
<?php } ?>

    function get_subject_by_class(subclass_id) {
        if (subclass_id) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_class_by_piriven'); ?>",
                data: {fclass_id: subclass_id},
                async: false,
                success: function (response) {
                    if (response)
                    {
                        $('#filter_class_nid').html(response);
                    }
                }
            });
        }
    }



</script>

<script type="text/javascript">



<?php if (isset($filter_district_id)) { ?>
        get_district_by_province('<?php echo $filter_prov_id; ?>', '<?php echo $filter_district_id; ?>');
<?php } ?>

    function get_district_by_province(provincial_id, district_id) {
        if (provincial_id) {
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
    }



</script>

<script type="text/javascript">



<?php if (isset($filter_zonal_id)) { ?>
        get_zonal_by_district('<?php echo $filter_district_id; ?>', '<?php echo $filter_zonal_id; ?>');
<?php } ?>

    function get_zonal_by_district(district_id, zonal_id) {
        if (district_id) {
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
    }



</script>


<script type="text/javascript">



<?php if (isset($filter_edu_id)) { ?>
        get_edu_by_zonal('<?php echo $filter_zonal_id; ?>', '<?php echo $filter_edu_id; ?>');
<?php } ?>

    function get_edu_by_zonal(zonal_id, edu_id) {
        if (zonal_id) {
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


    function get_classname(class_id) {

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: "<?php echo site_url('ajax/selectsubArea'); ?>",
            data: {class_id: class_id},
            async: false,
            dataType: 'json',
            success: function (response) {
                if (response)
                {
                    $('input[name=name]').val(response.School_className);
                    $('input[name=short_code]').val(response.short_code);
                }
            }
        });

    }
</script>