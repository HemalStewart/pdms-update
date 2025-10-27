<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-folder-open"></i><small> <?php echo $this->lang->line('sub_define'); ?></small></h3>
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

                        <li class="li-class-list">

                            <?php if ($this->session->userdata('role_id') == ADMIN) { ?>

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
                                   <?php echo form_open(site_url('academic/subject/indexdefine/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <select  class="form-control col-md-7 col-xs-12" id="filter_piriventype_id" name="piriventype_id"  style="width:auto;"   onchange="get_subject_by_piriven(this.value, '');this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('pirtype'); ?>--</option> 
                                    <?php foreach ($privtype as $obj) { ?>
                                        <option value="<?php echo $obj->School_TypeId; ?>" <?php
                                        if (isset($filter_piriventype_id) && $filter_piriventype_id == $obj->School_TypeId) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->School_Type; ?></option>
                                            <?php } ?> 

                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_subclass_id" name="subclass_id"  style="width:auto;"   onchange="this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 



                                </select>



                                <?php
                                echo form_close();
                            } elseif ($this->session->userdata('role_id') == ZONAL) {
                                ?>    
                                   <?php echo form_open(site_url('academic/subject/indexdefine/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <select  class="form-control col-md-7 col-xs-12" id="filter_piriventype_id" name="piriventype_id"  style="width:auto;"   onchange="get_subject_by_piriven(this.value, '');this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('pirtype'); ?>--</option> 
                                    <?php foreach ($privtype as $obj) { ?>
                                        <option value="<?php echo $obj->School_TypeId; ?>" <?php
                                        if (isset($filter_piriventype_id) && $filter_piriventype_id == $obj->School_TypeId) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->School_Type; ?></option>
                                            <?php } ?> 

                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_subclass_id" name="subclass_id"  style="width:auto;"   onchange="this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 



                                </select>




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

                                <?php echo form_open(site_url('academic/subject/indexdefine/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <select  class="form-control col-md-7 col-xs-12" id="filter_piriventype_id" name="piriventype_id"  style="width:auto;"   onchange="get_subject_by_piriven(this.value, '');this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('pirtype'); ?>--</option> 
                                    <?php foreach ($privtype as $obj) { ?>
                                        <option value="<?php echo $obj->School_TypeId; ?>" <?php
                                        if (isset($filter_piriventype_id) && $filter_piriventype_id == $obj->School_TypeId) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->School_Type; ?></option>
                                            <?php } ?> 

                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_subclass_id" name="subclass_id"  style="width:auto;"   onchange="this.form.submit();">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 



                                </select>


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
                                        <select  class="form-control col-md-7 col-xs-12"  name="pirtype" id="pirtype" onchange="get_pirtype(this.value, '');">
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
                                        <select  class="form-control col-md-7 col-xs-12 select2"  name="class_id"  id="add_class_id" required="required" onchange="get_class(this.value, '');">
                                            <option value="select"><?php echo $this->lang->line('select') ?></option>
                                        </select> 
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="name" id="add_name" required="required" onchange="get_subject(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach ($listsubject as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('name', $value['sub_name'], set_value('name')); ?>><?php echo $value["sub_name"] ?></option>
                                            <?php }
                                            ?> 
                                        </select>

                                        <div class="help-block"><?php echo form_error('name'); ?></div> 
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code"><?php echo $this->lang->line('subject_code'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="code"  id="code" value="<?php echo isset($post['code']) ? $post['code'] : ''; ?>" placeholder="<?php echo $this->lang->line('subject_code'); ?>"  type="text" autocomplete="off">
                                        <input  class="form-control col-md-7 col-xs-12"  name="Sublist_id"  id="add_Sublist_id"   type="hidden" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('code'); ?></div>
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
                                        <a href="<?php echo site_url('academic/subject/indexdefine'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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
                                            <select  class="form-control col-md-7 col-xs-12"  name="pirtype" id="edit_pirtype" onchange="get_pirtype(this.value, '');"> 
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
//                                    if ($subject->pirtype != '') {
//                                        $display = "";
//                                    } else {
//                                        $display = "display:none";
//                                    }
                                    ?>

    <!--                                    <div id="schooldataview" style="<?php echo $display; ?>">


                                            <div class="item form-group">
                                                <label  class="control-label col-md-3 col-sm-3 col-xs-12"  for="districtview"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="districtview"  id="districtview" disabled="" value="<?php echo $subjectdata['class_name'] ?>"   type="text" autocomplete="off">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="hiddenpritype"  id="hiddenpritype" value="<?php echo $subjectdata['School_TypeId'] ?>"   type="hidden" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('class'); ?></div> 
                                                </div>
                                            </div>





                                        </div>-->




                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_class_id"><?php echo $this->lang->line('class'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12 select2"  name="class_id"  id="edit_class_id" onchange="get_class(this.value, '');">
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>
                                            </select> 


                                            <span class="text-danger"><?php echo form_error('edit_class_id'); ?></span>
                                        </div>
                                    </div>






                                    <!--                                    <div class="item form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                                                            </label>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($subject->Subject_Name) ? $subject->Subject_Name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                                                                <div class="help-block"><?php echo form_error('name'); ?></div>
                                                                            </div>
                                                                        </div>-->



                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="name" id="edit_name" required="required" onchange="get_subject(this.value, '');">>
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>


                                                <?php foreach ($listsubject as $key => $value) {
                                                    ?>

                                                    <option value="<?php echo $value["sub_name"] ?>" <?php
                                                    if (isset($subject) && $subject->Subject_Name == $value["sub_name"]) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo ucfirst($value["sub_name"]); ?></option>
                                                        <?php } ?>  
                                            </select>
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code"><?php echo $this->lang->line('subject_code'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="code"  id="code" value="<?php echo isset($subject->Subject_Code) ? $subject->Subject_Code : ''; ?>" placeholder="<?php echo $this->lang->line('subject'); ?> <?php echo $this->lang->line('code'); ?>" type="text" autocomplete="off">
                                            <input  class="form-control col-md-7 col-xs-12"  name="Sublist_id"  id="edit_Sublist_id" value="<?php echo isset($subject->Sublist_id) ? $subject->Sublist_id : ''; ?>" type="hidden" autocomplete="off">
                                            <input  class="form-control col-md-7 col-xs-12"  name="edit_priclass"  id="edit_priclass" value="<?php echo isset($subject->class_id) ? $subject->class_id : ''; ?>"  type="hidden" autocomplete="off">

                                            <div class="help-block"><?php echo form_error('code'); ?></div>
                                        </div>
                                    </div>


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

<?php if (isset($edit)) { ?>
        get_pirtype('<?php echo $subject->pirtype; ?>', '<?php echo $subject->class_id; ?>');
<?php } elseif ($post && !empty($post)) { ?>
        get_pirtype('<?php echo $post['']; ?>', '<?php echo $post['class_id']; ?>');
<?php } ?>

    function get_pirtype(pirtype, class_id) {
        //  alert(pirtype, class_id);


        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/getclass_id'); ?>",
            data: {pirtype: pirtype, class_id: class_id},
            async: false,
            success: function (response) {
                $('#add_class_id').html(response);
                if (response)
                {
                    $('#add_class_id').html(response);
                    if (edit) {
                        $('#edit_class_id').html(response);
                    } else {
                        $('#add_class_id').html(response);
                    }
                }
            }
        });


    }
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
    var PreSecAppDetails;
    var subcode;



    function get_class(class_id) {

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: "<?php echo site_url('ajax/get_class_id'); ?>",
            data: {class_id: class_id},
            async: false,
            dataType: 'json',
            success: function (response) {
                PreSecAppDetails = response.short_code;
                $('input[name=code]').val("");

                //  $('input[name=code]').val(response.sub_code);

            }
        });


    }


    function get_subject(sub_id) {


        $.ajax({
            type: 'ajax',
            method: 'get',
            url: "<?php echo site_url('ajax/get_subject'); ?>",
            data: {sub_id: sub_id},
            async: false,
            dataType: 'json',
            success: function (response) {
                //   alert(response.id);
                subcode = response.sub_code;

                $('input[name=code]').val(subcode + PreSecAppDetails);
                $('input[name=Sublist_id]').val(response.id);

            }
        });


    }


</script>

<script type="text/javascript">



<?php if (isset($filter_subclass_id)) { ?>
        get_subject_by_piriven('<?php echo $filter_piriventype_id; ?>', '<?php echo $filter_subclass_id; ?>');
<?php } ?>

    function get_subject_by_piriven(piriventype_id, subclass_id) {
        if (piriventype_id) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_class_by_piriven'); ?>",
                data: {piriven_id: piriventype_id, fclass_id: subclass_id},
                async: false,
                success: function (response) {
                    if (response)
                    {
                        $('#filter_subclass_id').html(response);
                    }
                }
            });
        }
    }



</script>

