<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-clock-o"></i><small> <?php echo $this->lang->line('manage_routine'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered  no-print">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_routine_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'academic', 'routine')){ ?>
                             <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('academic/routine/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php }else{ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_routine"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php } ?>
                        <?php } ?>
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_routine"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>
                            
                            
                        <li class="li-class-list">
                            <?php if ($this->session->userdata('role_id') == ADMIN || $this->session->userdata('role_id') == GUARDIAN || $this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == TEACHER || $this->session->userdata('role_id') == ACCOUNTANT || $this->session->userdata('role_id') == LIBRARIN || $this->session->userdata('role_id') == RECEPTIONIST || $this->session->userdata('role_id') == STAFF) { ?> 
                                          
                                <select  class="form-control col-md-7 col-xs-12" id="filter_class_id" name="class_id" onchange="get_subject_by_class(this.value);">
                                    <?php if($this->session->userdata('role_id') != STUDENT){ ?>
                                        <option value="<?php echo site_url('academic/routine/index'); ?>">--<?php echo $this->lang->line('select'); ?>--</option> 
                                    <?php } ?>
                                        
                                    <?php $guardian_class_data = get_guardian_access_data('class'); ?>      
                                    <?php foreach($listclass as $obj ){ ?>
                                        <?php if($this->session->userdata('role_id') == STUDENT){ ?>
                                            <?php if ($obj->School_classesid != $this->session->userdata('class_id')){ continue; } ?> 
                                            <option value="<?php echo site_url('academic/routine/index/'.$obj->School_classesid); ?>" <?php if(isset($class_id) && $class_id == $obj->School_classesid){ echo 'selected="selected"';} ?> ><?php echo $obj->School_className; ?></option>
                                        <?php }elseif($this->session->userdata('role_id') == GUARDIAN){ ?>
                                              <?php if (!in_array($obj->School_classesid, $guardian_class_data)) { continue; } ?>
                                             <option value="<?php echo site_url('academic/routine/index/'.$obj->School_classesid); ?>" <?php if(isset($class_id) && $class_id == $obj->School_classesid){ echo 'selected="selected"';} ?> ><?php echo $obj->School_className; ?></option>
                                        <?php }else{ ?>
                                             <option value="<?php echo site_url('academic/routine/index/'.$obj->School_classesid); ?>" <?php if(isset($class_id) && $class_id == $obj->School_classesid){ echo 'selected="selected"';} ?> ><?php echo $obj->School_className; ?></option>
                                        <?php } ?>                                            
                                    <?php } ?>                                            
                                </select>
                            <?php } elseif ($this->session->userdata('role_id') == PROVINCIAL) {
                                ?>    
                                <?php echo form_open(site_url('academic/routine/index'), array('name' => 'filter', 'id' => 'filter', 'class'=>'form-horizontal form-label-left'), ''); ?>
                              
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
                               <?php echo form_open(site_url('academic/routine/index'), array('name' => 'filter', 'id' => 'filter', 'class'=>'form-horizontal form-label-left'), ''); ?>
                              


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
                            
                              <?php echo form_open(site_url('academic/routine/index'), array('name' => 'filter', 'id' => 'filter', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                  
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

                            
                            
                            
                            
                            
                            
<!--                            <select  class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id"  onchange="get_class_by_school(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                        <?php foreach($schools as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                        <?php } ?>   
                                    </select>-->
                                    <select  class="form-control col-md-7 col-xs-12" id="filtern_class_id" name="class_id"  style="width:auto;" onchange="this.form.submit();">
                                         <option value="">--<?php echo $this->lang->line('class'); ?>--</option> 
                                        <?php if(isset($listclass) && !empty($listclass)){ ?>
                                            <?php foreach($listclass as $obj ){ ?>
                                                <option value="<?php echo $obj->School_classesid; ?>"><?php echo $obj->School_className; ?></option> 
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                <?php echo form_close(); ?>
                            
                            <?php } ?> 
                        </li>
                    </ul>
                    <br/>
                   
                    <?php if(isset($sections) && !empty($sections)){ ?>  
                        <div class="x_content">             
                           <div class="row">
                               <div class="col-sm-6 col-xs-6  col-sm-offset-3 col-xs-offset-3 layout-box">
                                   <p>
                                   <div><img  class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="70" /></div>
                                       <h4><?php echo $school->school_name; ?></h4>
                                       <p><?php echo $school->address; ?></p>
                                       <h4><?php echo $this->lang->line('class_routine'); ?></h4>
                                       <?php echo $this->lang->line('class'); ?> - <?php echo $single_class->School_className; ?>                                
                                   </p>
                               </div>
                           </div>            
                        </div>       
                    <?php } ?> 
                    
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_routine_list" >                            
                            <div class="x_content">
                                <div class="" data-example-id="togglable-tabs">
                                    <?php $guardian_section_data = get_guardian_access_data('section'); ?> 
                                    <?php if(isset($sections) && !empty($sections)){ ?>  
                                        <ul  class="nav nav-tabs bordered sub-tabs">
                                            <?php foreach($sections as $key=>$obj){ ?>
                                                <?php                                               
                                                    if($this->session->userdata('role_id') == GUARDIAN){
                                                        if (!in_array($obj->id, $guardian_section_data)) { continue; }
                                                    }elseif($this->session->userdata('role_id') == STUDENT){
                                                        if ($obj->id != $this->session->userdata('section_id')){ continue; }
                                                    }
                                                ?>
                                                <li class="<?php if($key == 0){ echo 'active'; } ?>"><a href="#tab_section_<?php echo $obj->id; ?>"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"> </i> <?php echo $this->lang->line('section'); ?> : <?php echo $obj->name; ?></a> </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                     
                                    <div class="tab-content">
                                        
                                     <?php if(isset($sections) && !empty($sections)){ ?>   
                                        <?php $active = ''; $other = false; $count = 0; foreach($sections as $key=>$obj){ ?>   
                                            <?php 
                                                if($this->session->userdata('role_id') == GUARDIAN){
                                                    if (!in_array($obj->id, $guardian_section_data)) { continue; }
                                                    $active = 'active';
                                                }elseif($this->session->userdata('role_id') == STUDENT){
                                                    if ($obj->id != $this->session->userdata('section_id')){ continue; }
                                                    $active = 'active';
                                                }else{
                                                   $other = true; 
                                                }                                                
                                               
                                            ?>
                                           <div  class="tab-pane fade in <?php if($other && $key == 0){ echo 'active'; }else{ echo $active; } ?>" id="tab_section_<?php echo $obj->id; ?>" >
                                               <div class="x_content">
                                                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                       <tbody>
                                                           <?php $days = get_week_days(); ?>
                                                           <?php foreach($days as $daykey=>$day){ ?>
                                                               <tr>
                                                                   <td width="100"><?php echo $day; ?></td>
                                                                   <td>
                                                                     <?php $routines = get_routines_by_day($daykey, $obj->class_id, $obj->id); ?>  
                                                                       <?php foreach($routines as $ro){ ?>
                                                                       <div class="btn-group">
                                                                           <button class="btn btn-default dropdown-toggle routine-text" data-toggle="dropdown">
                                                                               <?php echo $ro->start_time . ' - ' .$ro->end_time; ?><br/>
                                                                               <?php echo $ro->subject; ?><br/>
                                                                               <?php echo $ro->teacher; ?><br/>
                                                                               <?php echo $this->lang->line('room_no'); ?> : <?php echo $ro->room_no; ?>
                                                                               <span class="caret"></span>
                                                                           </button>
                                                                           <?php if(has_permission(EDIT, 'academic', 'routine') || has_permission(DELETE, 'academic', 'routine')){ ?>
                                                                                <ul class="dropdown-menu">
                                                                                    <?php if(has_permission(EDIT, 'academic', 'routine')){ ?>
                                                                                         <li>
                                                                                             <a href="<?php echo site_url('academic/routine/edit/'.$ro->id); ?>" >
                                                                                                 <i class="fa fa-edit"></i> <?php echo $this->lang->line('edit'); ?>
                                                                                             </a>
                                                                                         </li>
                                                                                    <?php } ?>
                                                                                    <?php if(has_permission(DELETE, 'academic', 'routine')){ ?>
                                                                                         <li>
                                                                                             <a href="<?php echo site_url('academic/routine/delete/'.$ro->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');">
                                                                                                 <i class="fa fa-trash"></i> <?php echo $this->lang->line('delete'); ?>
                                                                                             </a>
                                                                                         </li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                           <?php } ?>
                                                                       </div>
                                                                       <?php } ?>
                                                                   </td>
                                                               </tr>
                                                           <?php } ?>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                         <?php } ?>  
                                      <?php }else{ ?>  
                                        <div class="text-center"><?php echo $this->lang->line('no_data_found'); ?></div>
                                      <?php } ?>  
                                    </div>
                                </div>                            
                            </div>
                            
                            <div class="row no-print">
                                <div class="col-xs-12 text-right">
                                    <button class="btn btn-default " onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
                                </div>
                            </div>
                            
                        </div> <!-- End first tab -->
                        
                        

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_routine">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('academic/routine/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_form'); ?> 
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="class_id" id="add_class_id" required="required" onchange="get_section_subject_by_class(this.value, '','');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($listclass as $obj ){ ?>
                                            <option value="<?php echo $obj->School_classesid; ?>" <?php echo isset($post['class_id']) && $post['class_id'] == $obj->School_classesid ?  'selected="selected"' : ''; ?>><?php echo $obj->School_className; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_id"><?php echo $this->lang->line('section'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="section_id" id="add_section_id"  required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                         
                                        </select>
                                        <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="subject_id" id="add_subject_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                         
                                        </select>
                                        <div class="help-block"><?php echo form_error('subject_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="day"><?php echo $this->lang->line('day'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="day" id="day" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $types = get_week_days(); ?>
                                            <?php foreach($types as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php echo isset($post['class_id']) && $post['class_id'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('day'); ?></div>
                                    </div>
                                </div>
                                 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id"><?php echo $this->lang->line('teacher'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="add_teacher_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($teachers as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php echo isset($post['teacher_id']) && $post['teacher_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('teacher_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('start_time'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="start_time"  id="add_start_time" value="<?php echo isset($post['start_time']) ?  $post['start_time'] : ''; ?>" placeholder="<?php echo $this->lang->line('start_time'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('start_time'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('end_time'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="end_time"  id="add_end_time" value="<?php echo isset($post['end_time']) ?  $post['end_time'] : ''; ?>" placeholder="<?php echo $this->lang->line('end_time'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('end_time'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_no"><?php echo $this->lang->line('room_no'); ?> 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="room_no"  id="room_no" value="<?php echo isset($post['room_no']) ?  $post['room_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('room_no'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('room_no'); ?></div>
                                    </div>
                                </div>                                
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('academic/routine/index/'.$class_id); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('add_routine_instruction'); ?></div>
                                </div>                                
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_routine">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('academic/routine/edit/'.$routine->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                              
                                <?php $this->load->view('layout/school_list_edit_form'); ?> 
                                
                               <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="class_id" id="edit_class_id" required="required" onchange="get_section_subject_by_class(this.value, '','');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                          
                                               <?php foreach($listclass as $obj ){ ?>
                                            <option value="<?php echo $obj->School_classesid; ?>" <?php if($obj->School_classesid == $routine->class_id){ echo 'selected="selected"'; } ?>><?php echo $obj->School_className; ?></option>
                                            <?php } ?>  
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_id"><?php echo $this->lang->line('section'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="section_id" id="edit_section_id"  required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                         
                                        </select>
                                        <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="subject_id" id="edit_subject_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                         
                                        </select>
                                        <div class="help-block"><?php echo form_error('subject_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="day"><?php echo $this->lang->line('day'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="day" id="day" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $types = get_week_days(); ?>
                                            <?php foreach($types as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>"  <?php if($key == $routine->day){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('day'); ?></div>
                                    </div>
                                </div>
                                 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id"><?php echo $this->lang->line('teacher'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="edit_teacher_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($teachers as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>"  <?php if($obj->id == $routine->teacher_id){ echo 'selected="selected"'; } ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('teacher_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('start_time'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="start_time"  id="edit_start_time" value="<?php echo isset($routine->start_time) ?  $routine->start_time : ''; ?>" placeholder="<?php echo $this->lang->line('start_time'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('start_time'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('end_time'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="end_time"  id="edit_end_time" value="<?php echo isset($routine->end_time) ?  $routine->end_time : ''; ?>" placeholder="<?php echo $this->lang->line('end_time'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('end_time'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_no"><?php echo $this->lang->line('room_no'); ?></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="room_no"  id="room_no" value="<?php echo isset($routine->room_no) ?  $routine->room_no : ''; ?>" placeholder="<?php echo $this->lang->line('room_no'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('room_no'); ?></div>
                                    </div>
                                </div>
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($routine) ? $routine->id : $id; ?>" name="id" />
                                        <a  href="<?php echo site_url('academic/routine/index/'.$class_id); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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

<style type="text/css">
    .btn-group .btn {
        padding: 2px 6px;
    }
</style>
  <!-- bootstrap-datetimepicker -->
 <link href="<?php echo VENDOR_URL; ?>timepicker/timepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>timepicker/timepicker.js"></script>
 
 
<!-- Super admin js START  -->
 <script type="text/javascript">
     
    var edit = false;
    <?php if(isset($edit)){ ?>
        edit = true;
    <?php } ?>
         
    $("document").ready(function() {
         <?php if(isset($routine) && !empty($routine)){ ?>
            $("#add_school_id").trigger('change');
         <?php } ?>
    });
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();        
        var class_id = '';
        var teacher_id = '';
        
        <?php if(isset($routine) && !empty($routine)){ ?>
            class_id =  '<?php echo $routine->class_id; ?>';
            teacher_id =  '<?php echo $routine->teacher_id; ?>';
         <?php } ?> 
        
        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select_school'); ?>');
           return false;
        }
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_schoolclassdata_by_class'); ?>",
            data   : { school_id:school_id, class_id:class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   if(edit){
                       $('#edit_class_id').html(response);   
                   }else{
                       $('#add_class_id').html(response);   
                   }
                                    
                   get_teacher_by_school(school_id, teacher_id);
               }
            }
        });
    }); 
    
    
    function get_teacher_by_school(school_id, teacher_id){
    
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_teacher_by_school'); ?>",
            data   : { school_id:school_id, teacher_id: teacher_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(edit){
                       $('#edit_teacher_id').html(response);
                   }else{
                       $('#add_teacher_id').html(response); 
                   }
               }
            }
        });
    }
    
  </script>
<!-- Super admin js end -->

 
 
 <script type="text/javascript">
     
  $('#add_start_time').timepicker();
  $('#add_end_time').timepicker();
  $('#edit_start_time').timepicker();
  $('#edit_end_time').timepicker();
  
         
    <?php if(isset($edit)){ ?>
        get_section_subject_by_class('<?php echo $routine->class_id; ?>', '<?php echo $routine->section_id; ?>', '<?php echo $routine->subject_id; ?>');
    <?php } ?>
    
    
    function get_section_subject_by_class(class_id, section_id, subject_id){       
       
        if(edit){
            var school_id = $('#edit_school_id').val();
        }else{
            var school_id = $('#add_school_id').val();
        }
       if(!school_id){
           toastr.error('<?php echo $this->lang->line('select_school'); ?>');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_section_by_class'); ?>",
            data   : { school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                  if(edit){
                       $('#edit_section_id').html(response);
                   }else{
                       $('#add_section_id').html(response);
                   }
               }
            }
        });  
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_subject_by_class'); ?>",
            data   : { school_id:school_id, class_id : class_id,  subject_id : subject_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                  if(edit){
                       $('#edit_subject_id').html(response);
                   }else{
                       $('#add_subject_id').html(response);
                   }
               }
            }
        });                  
        
   }
   
    function get_subject_by_class(url){          
        if(url){
            window.location.href = url; 
        }
    }
    $("#add").validate();     
    $("#edit").validate();   
    
    
     <?php if(isset($filter_class_id)){ ?>
            get_class_by_school('<?php echo $filter_school_id; ?>', '<?php echo $filter_class_id; ?>');
     <?php } ?>
    
    function get_class_by_school(school_id, class_id){
        
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_schoolclass_by_class'); ?>",
            data   : { school_id : school_id, class_id : class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                    $('#filtern_class_id').html(response);                     
               }
            }
        });
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
