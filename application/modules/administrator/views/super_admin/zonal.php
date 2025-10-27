<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-user-md"></i><small> <?php echo $this->lang->line('manage_zonaluser'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <!--            <div class="x_content quick-link">
            <?php $this->load->view('quick-link'); ?>
                        </div>-->

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">

                    <ul  class="nav nav-tabs bordered">

                        <li class="<?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>"><a href="#tab_super_admin_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>

                        <?php if (has_permission(ADD, 'hrm', 'employee')) { ?>
                            <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('administrator/superadmin/addzonal'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_super_admin"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>                         
                             <?php } ?>  

                        <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_super_admin"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>                            

                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_super_admin_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>                                        
                                            <th><?php echo $this->lang->line('photo'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('phone'); ?></th>
                                            <th><?php echo $this->lang->line('email'); ?></th>
                                            <th><?php echo $this->lang->line('provincial'); ?></th>       
                                              <!--<th><?php echo $this->lang->line('zonal'); ?></th>-->             
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($provinceadmins) && !empty($provinceadmins)) {
                                            ?>
                                            <?php foreach ($provinceadmins as $obj) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>                                            
                                                    <td>
                                                        <?php if ($obj->photo != '') { ?>
                                                            <img src="<?php echo UPLOAD_PATH; ?>/zonal-photo/<?php echo $obj->photo; ?>" alt="" width="70" /> 
                                                        <?php } else { ?>
                                                            <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="70" /> 
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo ucfirst($obj->name); ?></td>
                                                    <td><?php echo $obj->phone; ?></td>
                                                    <td><?php echo $obj->email; ?></td>
                                                     <td><?php echo $obj->provincialname; ?></td>
                                               <!--<td><?php echo $obj->provincialname; ?></td>-->
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'administrator', 'zonaladmin')) { ?> 
                                                            <a href="<?php echo site_url('administrator/superadmin/editzonal/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a><br/>
                                                        <?php } ?> 
                                                        <?php if (has_permission(VIEW, 'administrator', 'zonaladmin')) { ?>
                                                            <a  onclick="get_super_admin_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-super_admin-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'administrator', 'zonaladmin')) { ?> 
                                                            <?php if (!$obj->is_default) { ?> 
                                                                <a href="<?php echo site_url('administrator/superadmin/deletezonal/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                            <?php } ?>
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
                        ?>" id="tab_add_super_admin">
                            <div class="x_content"> 
                                <?php echo form_open_multipart(site_url('administrator/superadmin/addzonal'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

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
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_id"  id="school_id" value="6"   type="hidden" autocomplete="off">
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
                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
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
                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('blood_group'); ?></div> 
                                        </div>
                                    </div>

                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="religion"><?php echo $this->lang->line('religion'); ?> </label>
                                            
                                            <select  class="form-control col-md-7 col-xs-12" name="religion" id="religion">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                <?php $religion = get_religion(); ?>
                                                <?php foreach ($religion as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['religion']) && $post['religion'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                            </select>
                                            
                                            <div class="help-block"><?php echo form_error('religion'); ?></div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="add_dob" value="<?php echo isset($post['dob']) ? $post['dob'] : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('dob'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="provincial_id"><?php echo $this->lang->line('provincial'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="provincial_id" id="add_provincial_id" required="required" onchange="get_district_by_province(this.value, '');">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach ($listprovincial as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $value["provincialid"] ?>" <?php echo set_select('provincial', $value['provincialid'], set_value('provincial')); ?>><?php echo $value["provincialname"] ?></option>
                                                <?php }
                                                ?> 
                                            </select>
                                            <div class="help-block"><?php echo form_error('provincial'); ?></div> 
                                        </div>
                                    </div>  



                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="district_id"><?php echo $this->lang->line('district'); ?></label>
                                            <select  name="district_id" id="add_district_id" placeholder="" type="text" class="form-control" onchange="get_zonal_by_district(this.value, '');">
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>
                                            </select> 
                                            <span class="text-danger"><?php echo form_error('district_id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="zonal_id"><?php echo $this->lang->line('zonal'); ?></label>
                                            <select id="add_zonal_id" name="zonal_id[]" placeholder="" type="text" class="form-control" multiple="">
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>

                                            </select> 
                                            <span class="text-danger"><?php echo form_error('zonal'); ?></span>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="present_address"><?php echo $this->lang->line('present_address'); ?> </label>
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
                                            <label for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id" id="role_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach ($roles as $obj) { ?>
                                                    <?php if (in_array($obj->id, array(ZONAL))) { ?>
                                                        <option value="<?php echo $obj->id; ?>"><?php echo $obj->name; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('role_id'); ?></div>
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
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('other_information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">                                   
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
                                                <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" value="" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            <div class="help-block"><?php echo form_error('photo'); ?></div>
                                        </div>
                                    </div>

                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('adadministrator/superadmin/addzonal'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>                             
                            </div>
                        </div>  
<!--//////////////////////EDIT//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                        <?php if (isset($edit)) { ?>

                            <div class="tab-pane fade in active" id="tab_edit_super_admin">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url('administrator/superadmin/editzonal/' . $superadmin->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('basic_information'); ?>:</strong></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($superadmin->name) ? $superadmin->name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('name'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="national_id"><?php echo $this->lang->line('national_id'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="national_id"  id="national_id" value="<?php echo isset($superadmin->national_id) ? $superadmin->national_id : ''; ?>" placeholder="<?php echo $this->lang->line('national_id'); ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('national_id'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($superadmin->phone) ? $superadmin->phone : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
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
                                                        if ($superadmin->gender == $key) {
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
                                                        if ($superadmin->blood_group == $key) {
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
                                                        if ($superadmin->religion == $key) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('religion'); ?></div>
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="<?php echo isset($superadmin->dob) ? date('d-m-Y', strtotime($superadmin->dob)) : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('dob'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="provincial_id"><?php echo $this->lang->line('provincial'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="provincial_id" id="edit_provincial_id" required="required" onchange="get_district_by_province(this.value, '');">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>

                                                    <?php foreach ($listprovincial as $key => $value) {
                                                        ?>

                                                        <option value="<?php echo $value["provincialid"] ?>" <?php
                                                        if (isset($superadmin) && $superadmin->provincial_id == $value["provincialid"]) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo ucfirst($value["provincialname"]); ?></option>
                                                            <?php } ?>        

                                                </select>
                                                <div class="help-block"><?php echo form_error('provincial'); ?></div> 
                                            </div>
                                        </div>  

                                        <?php
                                        if ($superadmin->provincial_id != '') {
                                            $display = "";
                                        } else {
                                            $display = "display:none";
                                        }
                                        ?>

                                        <div id="schooldataedit" style="<?php echo $display; ?>">

                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="district_id"><?php echo $this->lang->line('district'); ?></label>
                                                    <select id="edit_district_id" name="district_id" placeholder="" type="text" class="form-control" onchange="get_zonal_by_district(this.value, '');">
                                                        <option value="select"><?php echo $this->lang->line('select') ?></option>
                                                    </select> 
                                                    <span class="text-danger"><?php echo form_error('district_id'); ?></span>
                                                </div>
                                            </div>

                                          <!--<div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="edit_zonal_id"><?php echo $this->lang->line('zonal'); ?></label>
                                                    <select id="edit_zonal_id" name="zonal_id[]" placeholder="" type="text" class="form-control" multiple="">
                                                        <option value="select"><?php echo $this->lang->line('select') ?></option>

                                                    </select> 
                                                    <span class="text-danger"><?php echo form_error('zonal'); ?></span>
                                                </div>-->
                                                
                                           <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="edit_zonal_id"><?php echo $this->lang->line('zonal'); ?></label>
                                                    <select id="edit_zonal_id" name="zonal_id[]" placeholder="" type="text" class="form-control" multiple="">
                                                        <option value="select"><?php echo $this->lang->line('select') ?></option>

                                                    </select> 
                                                    <span class="text-danger"><?php echo form_error('zonal'); ?></span>
                                                </div>
                                            </div>




                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="present_address"><?php echo $this->lang->line('present_address'); ?> </label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="<?php echo $this->lang->line('present_address'); ?>"><?php echo isset($superadmin->present_address) ? $superadmin->present_address : ''; ?></textarea>
                                                <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="permanent_address"><?php echo $this->lang->line('permanent_address'); ?></label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="permanent_address"  id="permanent_address"  placeholder="<?php echo $this->lang->line('permanent_address'); ?>"><?php echo isset($superadmin->permanent_address) ? $superadmin->permanent_address : ''; ?></textarea>
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
                                                <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($superadmin->email) ? $superadmin->email : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" type="email" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('email'); ?></div>
                                            </div>
                                        </div>                                    
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="username"><?php echo $this->lang->line('username'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="username"  id="username" readonly="readonly" value="<?php echo isset($superadmin->username) ? $superadmin->username : ''; ?>" placeholder="<?php echo $this->lang->line('username'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('username'); ?></div>
                                            </div>
                                        </div>                          
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id" id="role_id" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php foreach ($roles as $obj) { ?>
                                                        <?php if (in_array($obj->id, array(ZONAL))) { ?>
                                                            <option value="<?php echo $obj->id; ?>" <?php
                                                            if ($superadmin->role_id == $obj->id) {
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
                                                <label for="resume"><?php echo $this->lang->line('resume'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="resume"  id="resume" type="file">
                                                </div>
                                                <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                <div class="help-block"><?php echo form_error('resume'); ?></div>
                                                <input type="hidden" name="prev_resume" id="prev_resume" value="<?php echo $superadmin->resume; ?>" />
                                                <?php if ($superadmin->resume) { ?>
                                                    <a target="_blank" href="<?php echo UPLOAD_PATH; ?>/employee-resume/<?php echo $superadmin->resume; ?>"><?php echo $superadmin->resume; ?></a> <br/>
                                                <?php } ?> 
                                            </div>
                                        </div>                                       
                                    </div>

                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('other_information'); ?>:</strong></h5>
                                        </div>
                                    </div>
                                    <div class="row">                                   
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                                <label for="other_info"><?php echo $this->lang->line('other_info'); ?> </label>
                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="other_info"  id="other_info" placeholder="<?php echo $this->lang->line('other_info'); ?>"><?php echo isset($superadmin->other_info) ? $superadmin->other_info : ''; ?></textarea>
                                                <div class="help-block"><?php echo form_error('other_info'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="photo"><?php echo $this->lang->line('photo'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" value="" placeholder="" type="file">
                                                </div>
                                                <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                <div class="help-block"><?php echo form_error('photo'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $superadmin->photo; ?>" />
                                                <?php if ($superadmin->photo) { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/employee-photo/<?php echo $superadmin->photo; ?>" alt="" width="70" /><br/><br/>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>                 

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" name="id" id="edit_id" value="<?php echo $superadmin->id; ?>" />
                                            <a href="<?php echo site_url('administrator/superadmin/addzonal'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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


<div class="modal fade bs-super_admin-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_super_admin_data">            
            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_super_admin_modal(super_admin_id) {

        $('.fn_employee_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('administrator/superadmin/get_single_zonal_admin'); ?>",
            data: {super_admin_id: super_admin_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_super_admin_data').html(response);
                }
            }
        });
    }
</script>




<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>


<!-- datatable with buttons -->
<script type="text/javascript">

    $('#add_dob').datepicker();
    $('#edit_dob').datepicker();

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
</script>
<!--
<script type="text/javascript">
    $(document).on('focus', '.time', function () {
        var $this = $(this);
        $this.datetimepicker({
            format: 'LT'
        });
    });
    var tot_count = 0;
    var provincial = $('#provincial_id').val();
    var district = '<?php echo set_value('district_id') ?>';
    var section_id = '<?php echo set_value('section_id') ?>';
    // var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
    $(document).ready(function () {

        //$('#myTabs a:first').tab('show') // Select first tab
//        getSectionByClass(provincial, district);
//        getGroupByClassandSection(provincial, district);




        $(document).on('change', '#provincial_id', function (e) {
            $('#district_id').html("");
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

                    $('#district_id').append(div_data);
                }
            });
        });


        $(document).on('change', '#district_id', function (e) {
            $('#zonal_id').html("");
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

                    $('#zonal_id').append(div_data);
                }
            });
        });
    });




</script>-->

<!--<script type="text/javascript">



    var tot_count = 0;
    var editprovincial = $('#editprovincial').val();
    var editdistrict_id = '<?php echo set_value('editdistrict_id') ?>';
    var section_id = '<?php echo set_value('section_id') ?>';
    // var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
    $(document).ready(function () {

        //$('#myTabs a:first').tab('show') // Select first tab
//        getSectionByClass(provincial, district);
//        getGroupByClassandSection(provincial, district);




        $(document).on('change', '#editprovincial', function (e) {
            $("#schooldataedit").show();
            $("#schooldataview").hide();


            $('#editdistrict_id').html("");
            var editprovincial_id = $(this).val();
//            alert(editprovincial_id);


            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/getfetchprovincial'); ?>",
                data: {'class_id': editprovincial_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.districtname + "</option>";
                    });

                    $('#editdistrict_id').append(div_data);
                }
            });
        });


        $(document).on('change', '#editdistrict_id', function (e) {
            $('#editzonal_id').html("");
            var editdist_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzonal",
                url: "<?php echo site_url('ajax/getfetchzonal'); ?>",
                data: {'dist_id': editdist_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.zoneid + ">" + obj.zonename + "</option>";
                    });

                    $('#editzonal_id').append(div_data);
                }
            });
        });



        $(document).on('change', '#editzonal_id', function (e) {
            $('#editeducational_id').html("");
            var editzonal_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzoneblock",
                url: "<?php echo site_url('ajax/getfetchzoneblock'); ?>",
                data: {'zonal_id': editzonal_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.zoneblockid + ">" + obj.zoneblock + "</option>";
                    });

                    $('#editeducational_id').append(div_data);
                }
            });
        });

    });




</script>-->


<script type="text/javascript">

<?php if (isset($edit)) { ?>
        get_district_by_province('<?php echo $superadmin->provincial_id; ?>', '<?php echo $superadmin->district_id; ?>');
<?php } elseif ($post && !empty($post)) { ?>
        get_district_by_province('<?php echo $post['provincial_id']; ?>', '<?php echo $post['district_id']; ?>');
<?php } ?>

    function get_district_by_province(provincial_id, district_id) {
       //alert(provincial_id, district_id);
//        var school_id = '';
//<?php if (isset($edit)) { ?>
            //            school_id = $('#edit_school_id').val();
            //<?php } else { ?>
            //            school_id = $('#add_school_id').val();
            //<?php } ?>


//        if (!school_id) {
//            toastr.error('<?php echo $this->lang->line('select_school'); ?>');
//            return false;
//        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_district_by_province'); ?>",
            data: {provincial_id: provincial_id, district_id: district_id},
            async: false,
            success: function (response) {
                $('#add_district_id').html(response);
                if (response)
                {
                    if (edit) {
                        $('#edit_district_id').html(response);
                    } else {
                        $('#add_district_id').html(response);
                    }


                }
            }
        });


    }
</script>

<script type="text/javascript">

<?php if (isset($edit)) { ?>
        get_zonal_by_district('<?php echo $superadmin->district_id; ?>', '<?php echo $superadmin->zonal_id; ?>');
<?php } elseif ($post && !empty($post)) { ?>
        get_zonal_by_district('<?php echo $post['district_id']; ?>', '<?php echo $post['zonal_id']; ?>');
<?php } ?>

    function get_zonal_by_district(district_id, zonal_id) {
       // alert(district_id, zonal_id);


        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_multiplezonal_by_district'); ?>",
            data: {district_id: district_id, zonal_id: zonal_id},
            async: false,
            success: function (response) {
                $('#add_zonal_id').html(response);
                if (response)
                {
                    $('#add_zonal_id').html(response);
                    if (edit) {
                        $('#edit_zonal_id').html(response);
                    } else {
                        $('#add_zonal_id').html(response);
                    }
                }
            }
        });


    }
</script>
