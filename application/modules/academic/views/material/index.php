<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('manage_study_material'); ?></small></h3>
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
                        ?>"><a href="#tab_material_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'academic', 'material')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('academic/material/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_material"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?>                
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_material"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 

                        <li class="li-class-list">
                            <?php $teacher_access_data = get_teacher_access_data('student'); ?>    
                            <?php $guardian_access_data = get_guardian_access_data('class'); ?>

                          
                            <?php if ($this->session->userdata('role_id') == ADMIN || $this->session->userdata('role_id') == GUARDIAN || $this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == TEACHER || $this->session->userdata('role_id') == ACCOUNTANT || $this->session->userdata('role_id') == LIBRARIN || $this->session->userdata('role_id') == RECEPTIONIST || $this->session->userdata('role_id') == STAFF) { ?> 
                           
                                <select  class="form-control col-md-7 col-xs-12" onchange="get_material_list_by_class(this.value);">
                                    <?php if ($this->session->userdata('role_id') != STUDENT) { ?>
                                        <option value="<?php echo site_url('academic/material/index'); ?>">--<?php echo $this->lang->line('select'); ?>--</option> 
                                    <?php } ?>        
                                    <?php foreach ($listclass as $obj) { ?>
                                        <?php if ($this->session->userdata('role_id') == STUDENT) { ?>
                                            <?php
                                            if ($obj->School_classesid != $this->session->userdata('class_id')) {
                                                continue;
                                            }
                                            ?>
                                            <option value="<?php echo site_url('academic/material/index/' . $obj->School_classesid); ?>" <?php
                                            if (isset($class_id) && $class_id == $obj->School_classesid) {
                                                echo 'selected="selected"';
                                            }
                                            ?> ><?php echo $obj->School_className; ?></option>
                                                <?php } elseif ($this->session->userdata('role_id') == GUARDIAN) { ?>
                                                    <?php
                                                    if (!in_array($obj->School_classesid, $guardian_access_data)) {
                                                        continue;
                                                    }
                                                    ?>
                                            <option value="<?php echo site_url('academic/material/index/' . $obj->School_classesid); ?>" <?php
                                            if (isset($class_id) && $class_id == $obj->School_classesid) {
                                                echo 'selected="selected"';
                                            }
                                            ?> ><?php echo $obj->School_className; ?></option>
                                                <?php } elseif ($this->session->userdata('role_id') == TEACHER) { ?>
                                                    <?php
                                                    if (!in_array($obj->School_classesid, $teacher_access_data)) {
                                                        continue;
                                                    }
                                                    ?>
                                            <option value="<?php echo site_url('academic/material/index/' . $obj->School_classesid); ?>" <?php
                                            if (isset($class_id) && $class_id == $obj->School_classesid) {
                                                echo 'selected="selected"';
                                            }
                                            ?> ><?php echo $obj->School_className; ?></option>
                                                <?php } else { ?>
                                            <option value="<?php echo site_url('academic/material/index/' . $obj->School_classesid); ?>" <?php
                                            if (isset($class_id) && $class_id == $obj->School_classesid) {
                                                echo 'selected="selected"';
                                            }
                                            ?> ><?php echo $obj->School_className; ?></option>
                                                <?php } ?>                                            
                                            <?php } ?>                                            
                                </select>                                    
                              <?php } elseif ($this->session->userdata('role_id') == PROVINCIAL) {
                                ?>    
                                 <?php echo form_open(site_url('academic/material/index'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                               
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

                               
                                    <select  class="form-control col-md-7 col-xs-12" id="filter_school_id" name="school_id"  style="width:auto;"  onchange="get_class_by_school(this.value, '');">
                                        <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                    </select>

                            
                            
                            
                            
                            
                            
<!--                            <select  class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id"  onchange="get_class_by_school(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                        <?php foreach($schools as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                        <?php } ?>   
                                    </select>-->
                                    <select  class="form-control col-md-7 col-xs-12" id="filtern_class_id" name="class_id"  style="width:auto;" onchange="this.form.submit();">
                                         <option value="">--<?php echo $this->lang->line('class'); ?>--</option> 
                                        
                                    </select>
<!--                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_nid" name="class_nid"  style="width:auto;"   onchange="this.form.submit();">    

                                    <option value="select"><?php echo $this->lang->line('gradeselect') ?></option>


                                </select>-->



                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == ZONAL) {
                                ?>    
                              <?php echo form_open(site_url('academic/material/index'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                 


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

                               
                                    <select  class="form-control col-md-7 col-xs-12" id="filter_school_id" name="school_id"  style="width:auto;"  onchange="get_class_by_school(this.value, '');">
                                        <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                    </select>

                            
                            
                            
                            
                            
                            
<!--                            <select  class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id"  onchange="get_class_by_school(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                        <?php foreach($schools as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                        <?php } ?>   
                                    </select>-->
                                    <select  class="form-control col-md-7 col-xs-12" id="filtern_class_id" name="class_id"  style="width:auto;" onchange="this.form.submit();">
                                         <option value="">--<?php echo $this->lang->line('class'); ?>--</option> 
                                       
                                    </select>

<!--                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_nid" name="class_nid"  style="width:auto;"   onchange="this.form.submit();">    

                                    <option value="select"><?php echo $this->lang->line('gradeselect') ?></option>


                                </select>-->


                                <?php
                                echo form_close();
                            } else{ ?> 
                          

                                <?php echo form_open(site_url('academic/material/index'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                
                              <select  class="form-control col-md-7 col-xs-12" style="width:auto;" id="filter_provincial_id" name="provincial_id"   onchange="get_district_by_province(this.value, '');">
                                        <option value="">--<?php echo $this->lang->line('select_provincial'); ?>--</option> 
                                        <?php foreach ($provincial as $obj) { ?>
                                            <option value="<?php echo $obj->provincialid; ?>" <?php
                                            if (isset($filter_prov_id) && $filter_prov_id == $obj->provincialid) {
                                                echo 'selected="selected"';
                                            }
                                            ?> > <?php echo $obj->provincialname; ?></option>
                                                <?php } ?>   
                                    </select>
                                    <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, ''); ">
                                        <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 



                                    </select>

                                    <select  class="form-control col-md-7 col-xs-12" id="filter_zonal_id" name="zonal_id"  style="width:auto;"   onchange="get_edu_by_zonal(this.value, '');" >
                                        <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option> 



                                    </select> 

                                    <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_schooln_by_edu(this.value, '');">
                                        <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 



                                    </select> 

                                    <select  class="form-control col-md-7 col-xs-12" id="filter_school_id" name="school_id"  style="width:auto;"  onchange="get_class_by_school(this.value, '');">
                                        <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                    </select>
                            
                             <select  class="form-control col-md-7 col-xs-12" id="filtern_class_id" name="class_id"  style="width:auto;" onchange="this.form.submit();">
                                         <option value="">--<?php echo $this->lang->line('class'); ?>--</option> 
                                       
                                    </select>
                            
<!--                            <select  class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id"  onchange="get_class_by_school(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                    <?php foreach ($schools as $obj) { ?>
                                        <option value="<?php echo $obj->id; ?>" <?php
                                        if (isset($filter_school_id) && $filter_school_id == $obj->id) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->school_name; ?></option>
                                            <?php } ?>   
                                </select>
                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_id" name="class_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('class'); ?>--</option> 
                                    <?php if (isset($listclass) && !empty($listclass)) { ?>
                                        <?php foreach ($listclass as $obj) { ?>
                                            <option value="<?php echo $obj->School_classesid; ?>"><?php echo $obj->School_className; ?></option> 
                                        <?php } ?>
                                    <?php } ?>
                                </select>-->
                                <?php echo form_close(); ?>                                

                            <?php } ?> 
                        </li>
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_material_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <?php if ($this->session->userdata('role_id') != ADMIN || $this->session->userdata('role_id') != GUARDIAN || $this->session->userdata('role_id') != STUDENT || $this->session->userdata('role_id') != TEACHER || $this->session->userdata('role_id') != ACCOUNTANT || $this->session->userdata('role_id') != LIBRARIN || $this->session->userdata('role_id') != RECEPTIONIST || $this->session->userdata('role_id') != STAFF || $this->session->userdata('role_id') != PROVINCIAL || $this->session->userdata('role_id') != ZONAL) { ?> 

                                                <th><?php echo $this->lang->line('school'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('title'); ?></th>
                                            <th><?php echo $this->lang->line('class'); ?></th>
                                            <th><?php echo $this->lang->line('subject'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>  

                                        <?php
                                        $count = 1;
                                        if (isset($materials) && !empty($materials)) {
                                            ?>
                                            <?php foreach ($materials as $obj) { ?>
                                                <?php
                                                if ($this->session->userdata('role_id') == GUARDIAN) {
                                                    if (!in_array($obj->class_id, $guardian_access_data)) {
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
                                                    <td><?php echo $obj->title; ?></td>
                                                    <td><?php echo $obj->class_name; ?></td>
                                                    <td><?php echo $obj->subject; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'academic', 'material')) { ?>
                                                            <a href="<?php echo site_url('academic/material/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'academic', 'material')) { ?>
                                                            <?php if ($obj->material) { ?>
                                                                <a  href="<?php echo UPLOAD_PATH; ?>material/<?php echo $obj->material; ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-download"></i> <?php echo $this->lang->line('download'); ?> </a>
                                                            <?php } ?>
                                                            <a  onclick="get_material_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-material-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'academic', 'material')) { ?>
                                                            <a href="<?php echo site_url('academic/material/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                        ?>" id="tab_add_material">
                            <div class="x_content"> 
                                <?php echo form_open_multipart(site_url('academic/material/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

<?php $this->load->view('layout/school_list_form'); ?> 

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($post['title']) ? $post['title'] : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>               

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="class_id"  id="add_class_id" required="required" onchange="get_subject_by_class(this.value, '');" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 

                                            <?php foreach ($listclass as $obj) { ?>
                                                <?php
                                                if ($this->session->userdata('role_id') == TEACHER) {
                                                    if (!in_array($obj->School_classesid, $teacher_access_data)) {
                                                        continue;
                                                    }
                                                }
                                                ?>
                                                <option value="<?php echo $obj->School_classesid; ?>" <?php echo isset($post['class_id']) && $post['class_id'] == $obj->School_classesid ? 'selected="selected"' : ''; ?>><?php echo $obj->School_className; ?></option>
<?php } ?>  
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12 data_subject"  name="subject_id"  id="add_subject_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                      
                                        </select>
                                        <div class="help-block"><?php echo form_error('subject_id'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('material'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="material"  id="material" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                        <div class="help-block"><?php echo form_error('material'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->lang->line('description'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="description"  id="add_description" placeholder="<?php echo $this->lang->line('description'); ?>"><?php echo isset($post['description']) ? $post['description'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('academic/material'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
<?php echo form_close(); ?>                                
                            </div>
                        </div>  


<?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_material">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url('academic/material/edit/' . $material->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

    <?php $this->load->view('layout/school_list_edit_form'); ?> 

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($material->title) ? $material->title : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('title'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="class_id"  id="edit_class_id" required="required" onchange="get_subject_by_class(this.value, '');">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                <?php foreach ($listclass as $obj) { ?>
                                                    <?php
                                                    if ($this->session->userdata('role_id') == TEACHER) {
                                                        if (!in_array($obj->School_classesid, $teacher_access_data)) {
                                                            continue;
                                                        }
                                                    }
                                                    ?> 
                                                    <option value="<?php echo $obj->School_classesid; ?>" <?php
                                                    if ($material->class_id == $obj->School_classesid) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $obj->School_className; ?></option>
    <?php } ?>                                            
                                            </select>
                                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span> </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12 data_subject"  name="subject_id"  id="edit_subject_id" required="required" >
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                      
                                            </select>
                                            <div class="help-block"><?php echo form_error('subject_id'); ?></div>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('material'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="hidden" name="prev_material" id="prev_material" value="<?php echo $material->material; ?>" />
                                            <?php if ($material->material) { ?>
                                                <a href="<?php echo UPLOAD_PATH; ?>/material/<?php echo $material->material; ?>"  class="btn btn-success btn-xs"> <i class="fa fa-download"></i> <?php echo $this->lang->line('download'); ?></a> <br/><br/>
    <?php } ?>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="material"  id="edit_material" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                            <div class="help-block"><?php echo form_error('material'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->lang->line('description'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea  class="form-control col-md-7 col-xs-12"  name="description"  id="edit_description" placeholder="<?php echo $this->lang->line('description'); ?>"><?php echo isset($material->description) ? $material->description : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('description'); ?></div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($material) ? $material->id : $id; ?>" name="id" />
                                            <a href="<?php echo site_url('academic/material/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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



<div class="modal fade bs-material-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_material_data">            
            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_material_modal(material_id) {

        $('.fn_material_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('academic/material/get_single_material'); ?>",
            data: {material_id: material_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_material_data').html(response);
                }
            }
        });
    }
</script>


<!-- Super admin js START  -->
<script type="text/javascript">

    $("document").ready(function () {
<?php if (isset($edit) && !empty($edit) && $this->session->userdata('role_id') != TEACHER) { ?>
            $("#add_school_id").trigger('change');
<?php } ?>
    });

    $('.fn_school_id').on('change', function () {

        var school_id = $(this).val();
        var class_id = '';

<?php if (isset($edit) && !empty($edit)) { ?>
            class_id = '<?php echo $material->class_id; ?>';
<?php } ?>

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line('select_school'); ?>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_schoolclassdata_by_class'); ?>",
            data: {school_id: school_id, class_id: class_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    if (class_id) {
                        $('#edit_class_id').html(response);
                    } else {
                        $('#add_class_id').html(response);
                    }
                }
            }
        });
    });

</script>
<!-- Super admin js end -->

<script type="text/javascript">

    var edit = false;
<?php if (isset($edit)) { ?>
        edit = true;
        get_subject_by_class('<?php echo $material->class_id; ?>', '<?php echo $material->subject_id; ?>');
<?php } ?>

    function get_subject_by_class(class_id, subject_id) {

        var school_id = '';

<?php if (isset($edit)) { ?>
            school_id = $('#edit_school_id').val();
<?php } else { ?>
            school_id = $('#add_school_id').val();
<?php } ?>

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line('select_school'); ?>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_subject_by_class'); ?>",
            data: {school_id: school_id, class_id: class_id, subject_id: subject_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    if (edit) {
                        $('#edit_subject_id').html(response);
                    } else {
                        $('#add_subject_id').html(response);
                    }

                }
            }
        });

    }

</script>

<link href="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.min.js"></script>
<script type="text/javascript">
    $('#add_note').jqte();
    $('#edit_note').jqte();

</script>

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


        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_schoolclass_by_class'); ?>",
            data: {school_id: school_id, class_id: class_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filtern_class_id').html(response);
                }
            }
        });
    }

    function get_material_list_by_class(url) {
        if (url) {
            window.location.href = url;
        }
    }

    $("#add").validate();
    $("#edit").validate();
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



<?php if (isset($filter_school_id)) { ?>
        get_schooln_by_edu('<?php echo $filter_edu_id; ?>', '<?php echo $filter_school_id; ?>');
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
                    $('#filter_school_id').html(response);
                }
            }
        });
    }




</script>
