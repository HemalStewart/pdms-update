<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-folder-open"></i><small> <?php echo $this->lang->line('manage_subject'); ?></small></h3>
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
                            <?php if (has_permission(ADD, 'academic', 'subdefine')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('academic/subject/addsub'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
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

                                            <th><?php echo $this->lang->line('pir_type'); ?></th>

                                            <th><?php echo $this->lang->line('class'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('subject_code'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($subjects) && !empty($subjects)) {
                                            ?>
                                            <?php foreach ($subjects as $obj) { ?>

                                                <tr>
                                                    <td><?php echo $count++; ?></td>

                                                    <td><?php echo $obj->SchoolType; ?></td>                                                   
                                                    <td><?php echo $obj->class_name; ?></td>                                                    
                                                    <td><?php echo $obj->Subject_Name; ?></td>
                                                    <td><?php echo $obj->Subject_Code; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'academic', 'subdefine')) { ?>
                                                            <a href="<?php echo site_url('academic/subject/editsub/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'academic', 'subdefine')) { ?>
                                                            <!--<a  onclick="get_subject_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-subject-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>-->
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'academic', 'subdefine')) { ?>
                                                            <a href="<?php echo site_url('academic/subject/deletesub/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                                <?php echo form_open(site_url('academic/subject/addsub'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php // $this->load->view('layout/school_list_form');  ?> 


                                <!--                                <div class="item form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pirtype"><?php echo $this->lang->line('pir_type'); ?> <span class="required">*</span></label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select  class="form-control col-md-7 col-xs-12"  name="pirtype" id="pirtype" required="required">
                                                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php foreach ($listpirtype as $key => $value) {
                                    ?>
                                                                                    <option value="<?php echo $value["School_TypeId"] ?>" <?php echo set_select('pirtype', $value['School_TypeId'], set_value('pirtype')); ?>><?php echo $value["School_Type"] ?></option>
                                <?php }
                                ?> 
                                                                        </select>
                                                                        <div class="help-block"><?php echo form_error('pirtype'); ?></div> 
                                                                    </div>
                                                                </div>-->



                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pirtype"><?php echo $this->lang->line('pir_type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="pirtype" id="pirtype">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>

                                            <?php foreach ($listpirtype as $key => $value) {
                                                ?>

                                                <option value="<?php echo $value["School_TypeId"] ?>" <?php
                                                if (isset($school) && $school->pirtype == $value["School_TypeId"]) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo ucfirst($value["School_Type"]); ?></option>
                                                    <?php } ?>  
                                        </select>
                                        <div class="help-block"><?php echo form_error('pir_type'); ?></div> 
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12 select2"  name="class_id"  id="class_id" required="required" >
                                            <option value="select"><?php echo $this->lang->line('select') ?></option>
                                        </select> 
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('name'); ?><span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($post['name']) ? $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code"><?php echo $this->lang->line('subject_code'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="code"  id="code" value="<?php echo isset($post['code']) ? $post['code'] : ''; ?>" placeholder="<?php echo $this->lang->line('subject_code'); ?>"  type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('code'); ?></div>
                                    </div>
                                </div>
                                <!--                                <div class="item form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author"><?php echo $this->lang->line('author'); ?></label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="author"  id="author" value="<?php echo isset($post['author']) ? $post['author'] : ''; ?>" placeholder="<?php echo $this->lang->line('author'); ?>"  type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('author'); ?></div>
                                                                    </div>
                                                                </div>
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
                                                                </div>-->

                                <!--                                <div class="item form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span> </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select  class="form-control col-md-7 col-xs-12"  name="class_id"  id="add_class_id" required="required" >
                                                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                <?php foreach ($classes as $obj) { ?>
                                                                                            <option value="<?php echo $obj->id; ?>" <?php echo (isset($post['class_id']) && $post['class_id'] == $obj->id) || isset($class_id) && $class_id == $obj->id ? 'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                <?php } ?>                                            
                                                                        </select>
                                                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                                                    </div>
                                                                </div>-->

                                <!--                                <div class="item form-group">
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
                                                                </div>                                -->

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
                                        <a href="<?php echo site_url('academic/subject/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_subject">
                                <div class="x_content"> 
                                    <?php echo form_open(site_url('academic/subject/editsub/' . $subject->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php // $this->load->view('layout/school_list_edit_form'); ?> 


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="editpirtype"><?php echo $this->lang->line('pir_type'); ?> <span class="required">*</span></label>
                                        <input  class="form-control col-md-7 col-xs-12"  name="hiddenpriclass"  id="hiddenpriclass" value="<?php echo $subjectdata['class_id'] ?>"   type="hidden" autocomplete="off">

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="editpirtype" id="editpirtype"> 
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>

                                                <?php foreach ($listpirtype as $key => $value) {
                                                    ?>

                                                    <option value="<?php echo $value["School_TypeId"] ?>" <?php
                                                    if (isset($subject) && $subject->pirtype == $value["School_TypeId"]) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo ucfirst($value["School_Type"]); ?></option>
                                                        <?php } ?>  
                                            </select>
                                            <div class="help-block"><?php echo form_error('pir_type'); ?></div> 
                                        </div>
                                    </div>

                                    <?php
                                    if ($subject->pirtype != '') {
                                        $display = "";
                                    } else {
                                        $display = "display:none";
                                    }
                                    ?>

                                    <div id="schooldataview" style="<?php echo $display; ?>">


                                        <div class="item form-group">
                                            <label  class="control-label col-md-3 col-sm-3 col-xs-12"  for="districtview"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="districtview"  id="districtview" disabled="" value="<?php echo $subjectdata['class_name'] ?>"   type="text" autocomplete="off">
                                                <input  class="form-control col-md-7 col-xs-12"  name="hiddenpritype"  id="hiddenpritype" value="<?php echo $subjectdata['School_TypeId'] ?>"   type="hidden" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('class'); ?></div> 
                                            </div>
                                        </div>





                                    </div>

                                    <div id="schooldataedit" style="display:none">


                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_class_id"><?php echo $this->lang->line('class'); ?></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12 select2"  name="edit_class_id"  id="edit_class_id" >
                                                    <option value="select"><?php echo $this->lang->line('select') ?></option>
                                                </select> 
                                                
                                                  
                                                <span class="text-danger"><?php echo form_error('edit_class_id'); ?></span>
                                            </div>
                                        </div>

                                    </div>




                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($subject->Subject_Name) ? $subject->Subject_Name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('name'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code"><?php echo $this->lang->line('subject_code'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="code"  id="code" value="<?php echo isset($subject->Subject_Code) ? $subject->Subject_Code : ''; ?>" placeholder="<?php echo $this->lang->line('subject'); ?> <?php echo $this->lang->line('code'); ?>" type="text" autocomplete="off">
                                            <input  class="form-control col-md-7 col-xs-12"  name="edit_priclass"  id="edit_priclass" value="<?php echo isset($subject->class_id) ? $subject->class_id : ''; ?>"  type="text" autocomplete="off">
                                            
                                            <div class="help-block"><?php echo form_error('code'); ?></div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="item form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author"><?php echo $this->lang->line('author'); ?></label>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <input  class="form-control col-md-7 col-xs-12"  name="author"  id="author" value="<?php echo isset($subject->author) ? $subject->author : ''; ?>" placeholder="<?php echo $this->lang->line('author'); ?>"  type="text" autocomplete="off">
                                                                                <div class="help-block"><?php echo form_error('author'); ?></div>
                                                                            </div>
                                                                        </div>-->
                                    <!--                                    <div class="item form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo $this->lang->line('type'); ?> </label>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <select  class="form-control col-md-7 col-xs-12" name="type" id="type" >
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
                                                                        </div>-->

                                    <!--                                    <div class="item form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span>
                                                                            </label>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <select  class="form-control col-md-7 col-xs-12"  name="class_id"  id="edit_class_id" required="required" >
                                                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                    <?php foreach ($classes as $obj) { ?>
                                                                                            <option value="<?php echo $obj->id; ?>" <?php
                                        if ($subject->class_id == $obj->id) {
                                            echo 'selected="selected"';
                                        }
                                        ?>><?php echo $obj->name; ?></option>
                                    <?php } ?>                                            
                                                                                </select>
                                                                                <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                                                            </div>
                                                                        </div>-->

                                    <!--                                    <div class="item form-group">
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
                                                                        </div>-->

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($subject->note) ? $subject->note : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('note'); ?></div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($subject) ? $subject->id : $id; ?>" name="id" />
                                            <a href="<?php echo site_url('academic/subject/indexdefine'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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
    $(document).on('focus', '.time', function () {
        var $this = $(this);
        $this.datetimepicker({
            format: 'LT'
        });
    });
    var tot_count = 0;
    var pirtype = $('#pirtype').val();
    $(document).ready(function () {


        $(document).on('change', '#pirtype', function (e) {
            $('#class_id').html("");
            var pirtype_id = $(this).val();

//            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/getfetchschoolclass'); ?>",
                data: {'class_id': pirtype_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.School_classesid + ">" + obj.School_className + "</option>";
                    });

                    $('#class_id').append(div_data);
                }
            });
        });





    });




</script>
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



    var tot_count = 0;
    var editpirtype = $('#editpirtype').val();
    $(document).ready(function () {


        $(document).on('change', '#editpirtype', function (e) {
            $("#schooldataedit").show();
            $("#schooldataview").hide();


            $('#edit_class_id').html("");
            var editpir_id = $(this).val();
//            alert(editprovincial_id);


            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/getfetchschoolclass'); ?>",
                data: {'class_id': editpir_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.School_classesid + ">" + obj.School_className + "</option>";
                    });

                    $('#edit_class_id').append(div_data);
                }
            });
        });





    });




</script>