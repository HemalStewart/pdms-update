<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-home"></i><small> <?php echo $this->lang->line('manage_school'); ?></small></h3>
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
                        <?php if (has_permission(VIEW, 'administrator', 'school')) { ?>
                            <li class="<?php
                            if (isset($list)) {
                                echo 'active';
                            }
                            ?>"><a href="#tab_school_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php } ?>

                        <?php if (has_permission(ADD, 'administrator', 'school')) { ?> 
                            <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('administrator/school/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_school"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?>                       

                        <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_school"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 


                        <li class="li-class-list">


                            <?php if ($this->session->userdata('role_id') == PROVINCIAL) { ?>              



                                <?php echo form_open(site_url('administrator/school/provindex/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 
                                    <?php foreach ($district as $obj) { ?>
                                        <option value="<?php echo $obj->id; ?>" <?php
                                        if (isset($filter_district_id) && $filter_district_id == $obj->id) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->districtname; ?></option>
                                            <?php } ?>   


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
                        ?>" id="tab_school_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th><?php echo $this->lang->line('provincial'); ?></th>
                                            <th><?php echo $this->lang->line('district'); ?></th>
                                            <th><?php echo $this->lang->line('zonal'); ?></th>
                                            <th><?php echo $this->lang->line('educational'); ?></th>
                                            <th><?php echo $this->lang->line('school_name'); ?></th>
                                            <th><?php echo $this->lang->line('address'); ?></th>
                                            <th><?php echo $this->lang->line('phone'); ?></th>
                                            <th><?php echo $this->lang->line('email'); ?></th>
                                            <!--<th><?php echo $this->lang->line('currency_symbol'); ?></th>-->
                                            <th><?php echo $this->lang->line('admin_logo'); ?></th>
                                            <th><?php echo $this->lang->line('status'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($schools) && !empty($schools)) {
                                            ?>
                                            <?php foreach ($schools as $obj) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $obj->provincialname; ?></td>
                                                    <td><?php echo $obj->districtname; ?></td>
                                                    <td><?php echo $obj->zonename; ?></td>
                                                    <td><?php echo $obj->zoneblock; ?></td>
                                                    <td><?php echo $obj->school_name; ?></td>
                                                    <td><?php echo $obj->address; ?></td>
                                                    <td><?php echo $obj->phone; ?></td>
                                                    <td><?php echo $obj->email; ?></td>
                                                    <!--<td><?php echo $obj->currency; ?></td>-->
                                                    <td>
                                                        <?php if ($obj->logo) { ?>
                                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $obj->logo; ?>" alt="" width="80" /><br/><br/>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $obj->status ? $this->lang->line('active') : $this->lang->line('in_active'); ?></td>
                                                    <td>
                                                        <?php if (has_permission(VIEW, 'administrator', 'provschool')) { ?>
                                                            <a  onclick="get_school_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-school-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>    
                                                        <?php if (has_permission(EDIT, 'administrator', 'school')) { ?>
                                                            <a href="<?php echo site_url('administrator/school/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'administrator', 'school')) { ?>
                                                            <a href="<?php echo site_url('administrator/school/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                        ?>" id="tab_add_school">
                            <div class="x_content"> 
                                <?php echo form_open_multipart(site_url('administrator/school/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic_information'); ?>:</strong></h5>
                                    </div>
                                </div>

                                <div class="row">                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_code"><?php echo $this->lang->line('school_code'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_code"  id="school_code" value="<?php echo isset($post['school_code']) ? $post['school_code'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_code'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_code'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_name"><?php echo $this->lang->line('school_name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_name"  id="school_name" value="<?php echo isset($post['school_name']) ? $post['school_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_name'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_name'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($post['address']) ? $post['address'] : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('address'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($post['phone']) ? $post['phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="provincial"><?php echo $this->lang->line('provincial'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="provincial" id="provincial" required="required">
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
                                            <select id="district_id" name="district_id" placeholder="" type="text" class="form-control" >
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>
                                            </select> 
                                            <span class="text-danger"><?php echo form_error('district'); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="zonal_id"><?php echo $this->lang->line('zonal'); ?></label>
                                            <select id="zonal_id" name="zonal_id" placeholder="" type="text" class="form-control" >
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>

                                            </select> 
                                            <span class="text-danger"><?php echo form_error('zonal'); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="educational_id"><?php echo $this->lang->line('educational'); ?></label>
                                            <select id="educational_id" name="educational_id" placeholder="" type="text" class="form-control" >
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>

                                            </select> 
                                            <span class="text-danger"><?php echo form_error('educational'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="registration_date"><?php echo $this->lang->line('registration_date'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="registration_date"  id="add_registration_date" value="<?php echo isset($post['registration_date']) ? $post['registration_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('registration_date'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('registration_date'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($post['email']) ? $post['email'] : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?> " required="required" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div> 
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_fax"><?php echo $this->lang->line('school_fax'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_fax"  id="school_fax" value="<?php echo isset($post['school_fax']) ? $post['school_fax'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_fax'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_fax'); ?></div> 
                                        </div>
                                    </div>                                   

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="footer"><?php echo $this->lang->line('footer'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="footer"  id="footer" value="<?php echo isset($post['footer']) ? $post['footer'] : ''; ?>" placeholder="<?php echo $this->lang->line('footer'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('footer'); ?></div> 
                                        </div>
                                    </div>                                   


                                </div>                    


                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('setting_information'); ?>:</strong></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency"><?php echo $this->lang->line('currency'); ?></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency"  id="currency" value="<?php echo isset($post['currency']) ? $post['currency'] : ''; ?>" placeholder="<?php echo $this->lang->line('currency'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('currency'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="currency_symbol"><?php echo $this->lang->line('currency_symbol'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="currency_symbol"  id="currency_symbol" value="<?php echo isset($post['currency_symbol']) ? $post['currency_symbol'] : ''; ?>" placeholder="<?php echo $this->lang->line('currency_symbol'); ?> " required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('currency_symbol'); ?></div> 
                                        </div>
                                    </div> 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_frontend"><?php echo $this->lang->line('enable_frontend'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_frontend" required="required">
                                                <option value="1" <?php
                                                if (isset($post) && $post['enable_frontend'] == '1') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('yes'); ?></option>
                                                <option value="0" <?php
                                                if (isset($post) && $post['enable_frontend'] == '0') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('no'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('enable_frontend'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="final_result_type"><?php echo $this->lang->line('exam_final_result'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="final_result_type" required="required">
                                                <option value="0" <?php
                                                if (isset($post) && $post['final_result_type'] == '0') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('avg_of_all_exam'); ?> </option>
                                                <option value="1" <?php
                                                if (isset($post) && $post['final_result_type'] == '1') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('only_of_fianl_exam'); ?> </option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('final_result_type'); ?></div> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row">                                    

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_lat"><?php echo $this->lang->line('school_lat'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_lat"  id="school_lat" value="<?php echo isset($post['school_lat']) ? $post['school_lat'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_lat'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_lat'); ?></div> 
                                        </div>
                                    </div>      
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="school_lng"><?php echo $this->lang->line('school_lng'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="school_lng"  id="school_lng" value="<?php echo isset($post['school_lng']) ? $post['school_lng'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_lng'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('school_lng'); ?></div> 
                                        </div>
                                    </div>      
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="map_api_key">
                                                <?php echo $this->lang->line('api_key'); ?> 
                                                [ <a target="_blank" href="https://developers.google.com/maps/documentation/embed/get-api-key"><?php echo $this->lang->line('get_api_key'); ?></a>]
                                            </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="map_api_key"  id="map_api_key" value="<?php echo isset($post['map_api_key']) ? $post['map_api_key'] : ''; ?>" placeholder="<?php echo $this->lang->line('api_key'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('map_api_key'); ?></div> 
                                        </div>
                                    </div>  

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="language"><?php echo $this->lang->line('language'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="language" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach ($fields as $field) { ?>
                                                    <?php
                                                    if ($field == 'id' || $field == 'label') {
                                                        continue;
                                                    }
                                                    ?>
                                                    <option value="<?php echo $field; ?>" ><?php echo ucfirst($field); ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('language'); ?></div> 
                                        </div>
                                    </div>                                     
                                </div>   

                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="theme_name"><?php echo $this->lang->line('theme'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="theme_name" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach ($themes AS $obj) { ?>
                                                    <option style="color: #FFF;background-color: <?php echo $obj->color_code; ?>;" value="<?php echo $obj->slug; ?>" <?php
                                                    if (isset($post) && $post['theme_name'] == $obj->slug) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $obj->name; ?> </option>
                                                        <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('theme_name'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_online_admission"><?php echo $this->lang->line('online_admission'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_online_admission" id="enable_online_admission" required="required">
                                                <option value="" >--<?php echo $this->lang->line('select'); ?>--</option>
                                                <option value="0" <?php
                                                if (isset($post) && $post['enable_online_admission'] == 0) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('no'); ?></option>
                                                <option value="1" <?php
                                                if (isset($post) && $post['enable_online_admission'] == 1) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('yes'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('enable_online_admission'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="zoom_api_key"><?php echo $this->lang->line('zoom_api_key'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="zoom_api_key"  id="zoom_api_key" value="<?php echo isset($post['zoom_api_key']) ? $post['zoom_api_key'] : ''; ?>" placeholder="<?php echo $this->lang->line('zoom_api_key'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('zoom_api_key'); ?></div> 
                                        </div>
                                    </div>      
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="zoom_secret"><?php echo $this->lang->line('zoom_secret'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="zoom_secret"  id="zoom_secret" value="<?php echo isset($post['zoom_secret']) ? $post['zoom_secret'] : ''; ?>" placeholder="<?php echo $this->lang->line('zoom_secret'); ?> "  type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('zoom_secret'); ?></div> 
                                        </div>
                                    </div>                              
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="enable_rtl"><?php echo $this->lang->line('enable_rtl'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="enable_rtl" required="required">
                                                <option value="0" <?php
                                                if (isset($post) && $post['enable_rtl'] == 0) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('no'); ?></option>
                                                <option value="1" <?php
                                                if (isset($post) && $post['enable_rtl'] == 1) {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('yes'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('enable_rtl'); ?></div> 
                                        </div>
                                    </div>                              
                                </div>

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('social_information'); ?>:</strong></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($post['facebook_url']) ? $post['facebook_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('facebook_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($post['twitter_url']) ? $post['twitter_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('twitter_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($post['linkedin_url']) ? $post['linkedin_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('linkedin_url'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($post['google_plus_url']) ? $post['google_plus_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('google_plus_url'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($post['youtube_url']) ? $post['youtube_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('youtube_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($post['instagram_url']) ? $post['instagram_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('instagram_url'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($post['pinterest_url']) ? $post['pinterest_url'] : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?> " type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('pinterest_url'); ?></div> 
                                        </div>
                                    </div>

                                </div>

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('other_information'); ?>:</strong></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo"><?php echo $this->lang->line('frontend_logo'); ?> </label>
                                            <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="frontend_logo" id="frontend_logo"  type="file">
                                            </div>
                                            <div class="help-block"><?php echo form_error('frontend_logo'); ?></div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="logo"><?php echo $this->lang->line('admin_logo'); ?> </label>
                                            <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="logo" id="logo"  type="file">
                                            </div>
                                            <div class="help-block"><?php echo form_error('logo'); ?></div> 
                                        </div>
                                    </div>  

                                </div>   

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('administrator/school/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_school">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url('administrator/school/edit/' . $school->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>


                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('basic_information'); ?>:</strong></h5>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="school_code"><?php echo $this->lang->line('school_code'); ?></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="school_code"  id="school_code" value="<?php echo isset($school) ? $school->school_code : ''; ?>" placeholder="<?php echo $this->lang->line('school_code'); ?> "  type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('school_code'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="school_name"><?php echo $this->lang->line('school_name'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="school_name"  id="school_name" value="<?php echo isset($school) ? $school->school_name : ''; ?>" placeholder="<?php echo $this->lang->line('school_name'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('school_name'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($school) ? $school->address : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?> " required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('address'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($school) ? $school->phone : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="registration_date"><?php echo $this->lang->line('registration_date'); ?></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="registration_date"  id="edit_registration_date" value="<?php echo isset($school) ? $school->registration_date : ''; ?>" placeholder="<?php echo $this->lang->line('registration_date'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('registration_date'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($school) ? $school->email : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?> " required="required" type="email" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('email'); ?></div> 
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="school_fax"><?php echo $this->lang->line('school_fax'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="school_fax"  id="school_fax" value="<?php echo isset($school) ? $school->school_fax : ''; ?>" placeholder="<?php echo $this->lang->line('school_fax'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('school_fax'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="footer"><?php echo $this->lang->line('footer'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="footer"  id="footer" value="<?php echo isset($school) ? $school->footer : ''; ?>" placeholder="<?php echo $this->lang->line('footer'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('footer'); ?></div> 
                                            </div>
                                        </div>



                                    </div>   
                                    <div class="row">

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="editprovincial"><?php echo $this->lang->line('provincial'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="provincial" id="editprovincial" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>

                                                    <?php foreach ($listprovincial as $key => $value) {
                                                        ?>

                                                        <option value="<?php echo $value["provincialid"] ?>" <?php
                                                        if (isset($school) && $school->provincial == $value["provincialid"]) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo ucfirst($value["provincialname"]); ?></option>
                                                            <?php } ?>        

                                                </select>
                                                <div class="help-block"><?php echo form_error('provincial'); ?></div> 
                                            </div>
                                        </div>  

                                        <?php
                                        if ($school->provincial != '') {
                                            $display = "";
                                        } else {
                                            $display = "display:none";
                                        }
                                        ?>

                                        <div id="schooldataview" style="<?php echo $display; ?>">


                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="districtview"><?php echo $this->lang->line('district'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="districtview"  id="districtview" disabled="" value="<?php echo $schooldata['districtname'] ?>"   type="text" autocomplete="off">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="hiddenprovincial"  id="hiddenprovincial" value="<?php echo $schooldata['provincial'] ?>"   type="hidden" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('district'); ?></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="viewzonal_id"><?php echo $this->lang->line('zonal'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="viewzonal_id"  id="viewzonal_id" value="<?php echo $schooldata['zonename']; ?>" placeholder="<?php echo $this->lang->line('viewzonal_id'); ?> " disabled="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('zonal'); ?></div> 
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="vieweducational_id"><?php echo $this->lang->line('educational'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="vieweducational_id"  id="vieweducational_id" value="<?php echo isset($school) ? $schooldata['zoneblock'] : ''; ?>" placeholder="<?php echo $this->lang->line('educational'); ?> " disabled="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('educational'); ?></div> 
                                                </div>
                                            </div>





                                        </div>

                                        <div id="schooldataedit" style="display:none">

                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="editdistrict_id"><?php echo $this->lang->line('district'); ?></label>
                                                    <select id="editdistrict_id" name="district_id" placeholder="" type="text" class="form-control" >
                                                        <option value="select"><?php echo $this->lang->line('select') ?></option>
                                                    </select> 
                                                    <span class="text-danger"><?php echo form_error('district'); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="editzonal_id"><?php echo $this->lang->line('zonal'); ?></label>
                                                    <select id="editzonal_id" name="zonal_id" placeholder="" type="text" class="form-control" >
                                                        <option value="select"><?php echo $this->lang->line('select') ?></option>

                                                    </select> 
                                                    <span class="text-danger"><?php echo form_error('zonal'); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="editeducational_id"><?php echo $this->lang->line('educational'); ?></label>
                                                    <select id="editeducational_id" name="educational_id" placeholder="" type="text" class="form-control" >
                                                        <option value="select"><?php echo $this->lang->line('select') ?></option>

                                                    </select> 
                                                    <span class="text-danger"><?php echo form_error('educational'); ?></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('setting_information'); ?>:</strong></h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="currency"><?php echo $this->lang->line('currency'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="currency"  id="currency" value="<?php echo isset($school) ? $school->currency : ''; ?>" placeholder="<?php echo $this->lang->line('currency'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('currency'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="currency_symbol"><?php echo $this->lang->line('currency_symbol'); ?> <span class="required">*</span></label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="currency_symbol"  id="currency_symbol" value="<?php echo isset($school) ? $school->currency_symbol : ''; ?>" placeholder="<?php echo $this->lang->line('currency_symbol'); ?> " required="required" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('currency_symbol'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="enable_frontend"><?php echo $this->lang->line('enable_frontend'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="enable_frontend" required="required">
                                                    <option value="1" <?php
                                                    if (isset($school) && $school->enable_frontend == 1) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('yes'); ?></option>
                                                    <option value="0" <?php
                                                    if (isset($school) && $school->enable_frontend == 0) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('no'); ?></option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('enable_frontend'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="final_result_type"><?php echo $this->lang->line('exam_final_result'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="final_result_type" required="required">
                                                    <option value="0" <?php
                                                    if (isset($school) && $school->final_result_type == 0) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('avg_of_all_exam'); ?> </option>
                                                    <option value="1" <?php
                                                    if (isset($school) && $school->final_result_type == 1) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('only_of_fianl_exam'); ?> </option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('final_result_type'); ?></div> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="school_lat"><?php echo $this->lang->line('school_lat'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="school_lat"  id="school_lat" value="<?php echo isset($school) ? $school->school_lat : ''; ?>" placeholder="<?php echo $this->lang->line('school_lat'); ?> "  type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('school_lat'); ?></div> 
                                            </div>
                                        </div>    
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="school_lng"><?php echo $this->lang->line('school_lng'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="school_lng"  id="school_lng" value="<?php echo isset($school) ? $school->school_lng : ''; ?>" placeholder="<?php echo $this->lang->line('school_lng'); ?> "  type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('school_lng'); ?></div> 
                                            </div>
                                        </div>    
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="map_api_key">
                                                    <?php echo $this->lang->line('api_key'); ?> 
                                                    [ <a target="_blank" href="https://developers.google.com/maps/documentation/embed/get-api-key"><?php echo $this->lang->line('get_api_key'); ?> </a>]
                                                </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="map_api_key"  id="map_api_key" value="<?php echo isset($school) ? $school->map_api_key : ''; ?>" placeholder="<?php echo $this->lang->line('api_key'); ?> "  type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('map_api_key'); ?></div> 
                                            </div>
                                        </div>  

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="language"><?php echo $this->lang->line('language'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="language" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php foreach ($fields as $field) { ?>
                                                        <?php
                                                        if ($field == 'id' || $field == 'label') {
                                                            continue;
                                                        }
                                                        ?>
                                                        <option value="<?php echo $field; ?>" <?php
                                                        if (isset($school) && $school->language == $field) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo ucfirst($field); ?></option>
                                                            <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('language'); ?></div> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="theme_name"><?php echo $this->lang->line('theme'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="theme_name">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php foreach ($themes AS $obj) { ?>
                                                        <option style="color: #FFF;background-color: <?php echo $obj->color_code; ?>;" value="<?php echo $obj->slug; ?>" <?php
                                                        if (isset($school) && $school->theme_name == $obj->slug) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $obj->name; ?> </option>
                                                            <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('theme_name'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="enable_online_admission"><?php echo $this->lang->line('online_admission'); ?> <span class="required">*</span></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="enable_online_admission" id="enable_online_admission" required="required">
                                                    <option value="0" <?php
                                                    if (isset($school) && $school->enable_online_admission == 0) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('no'); ?></option>
                                                    <option value="1" <?php
                                                    if (isset($school) && $school->enable_online_admission == 1) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('yes'); ?></option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('enable_online_admission'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="zoom_api_key"><?php echo $this->lang->line('zoom_api_key'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="zoom_api_key"  id="zoom_api_key" value="<?php echo isset($school) ? $school->zoom_api_key : ''; ?>" placeholder="<?php echo $this->lang->line('zoom_api_key'); ?> "  type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('zoom_api_key'); ?></div> 
                                            </div>
                                        </div>    
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="zoom_secret"><?php echo $this->lang->line('zoom_secret'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="zoom_secret"  id="zoom_secret" value="<?php echo isset($school) ? $school->zoom_secret : ''; ?>" placeholder="<?php echo $this->lang->line('zoom_secret'); ?> "  type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('zoom_secret'); ?></div> 
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="enable_rtl"><?php echo $this->lang->line('enable_rtl'); ?> </label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="enable_rtl" required="required">
                                                    <option value="0" <?php
                                                    if (isset($school) && $school->enable_rtl == 0) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('no'); ?></option>
                                                    <option value="1" <?php
                                                    if (isset($school) && $school->enable_rtl == 1) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('yes'); ?></option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('enable_rtl'); ?></div> 
                                            </div>
                                        </div>                              
                                    </div>

                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('social_information'); ?>:</strong></h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="facebook_url"  id="facebook_url" value="<?php echo isset($school) ? $school->facebook_url : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('facebook_url'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="twitter_url"  id="twitter_url" value="<?php echo isset($school) ? $school->twitter_url : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('twitter_url'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="linkedin_url"  id="linkedin_url" value="<?php echo isset($school) ? $school->linkedin_url : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('linkedin_url'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="google_plus_url"><?php echo $this->lang->line('google_plus_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="google_plus_url"  id="google_plus_url" value="<?php echo isset($school) ? $school->google_plus_url : ''; ?>" placeholder="<?php echo $this->lang->line('google_plus_url'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('google_plus_url'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="youtube_url"  id="youtube_url" value="<?php echo isset($school) ? $school->youtube_url : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('youtube_url'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="instagram_url"  id="instagram_url" value="<?php echo isset($school) ? $school->instagram_url : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('instagram_url'); ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                                <input  class="form-control col-md-7 col-xs-12"  name="pinterest_url"  id="pinterest_url" value="<?php echo isset($school) ? $school->pinterest_url : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?> " type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('pinterest_url'); ?></div> 
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('other_information'); ?>:</strong></h5>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="logo"><?php echo $this->lang->line('frontend_logo'); ?></label>
                                                <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="frontend_logo" id="frontend_logo"  type="file">
                                                </div>
                                                <div class="help-block"><?php echo form_error('frontend_logo'); ?></div> 
                                                <?php if ($school->frontend_logo) { ?>
                                                    <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->frontend_logo; ?>" alt="" width="80" /><br/><br/>
                                                    <input name="frontend_logo_prev" value="<?php echo isset($school) ? $school->frontend_logo : ''; ?>"  type="hidden">
                                                <?php } ?>
                                            </div>                                       
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="logo"><?php echo $this->lang->line('admin_logo'); ?> </label>
                                                <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="logo" id="logo"  type="file">
                                                </div>
                                                <div class="help-block"><?php echo form_error('logo'); ?></div> 
                                                <?php if ($school->logo) { ?>
                                                    <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="80" /><br/><br/>
                                                    <input name="logo_prev" value="<?php echo isset($school) ? $school->logo : ''; ?>"  type="hidden">
                                                <?php } ?>
                                            </div>                                       
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group">
                                                <label for="status"><?php echo $this->lang->line('status'); ?></label>
                                                <select  class="form-control col-md-7 col-xs-12"  name="status" >
                                                    <option value="1" <?php
                                                    if (isset($school) && $school->status == 1) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('active'); ?></option>
                                                    <option value="0" <?php
                                                    if (isset($school) && $school->status == 0) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('in_active'); ?></option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('status'); ?></div> 
                                            </div>
                                        </div>


                                    </div>                                 

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($school) ? $school->id : '' ?>" name="id" />
                                            <a href="<?php echo site_url('administrator/school/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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


<div class="modal fade bs-school-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_school_data">            
            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_school_modal(school_id) {

        $('.fn_school_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loader.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('administrator/school/get_single_school'); ?>",
            data: {school_id: school_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_school_data').html(response);
                }
            }
        });
    }
</script>



<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script type="text/javascript">

    $('#add_registration_date').datepicker();
    $('#edit_registration_date').datepicker();

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
    var provincial = $('#provincial').val();
    var district = '<?php echo set_value('district_id') ?>';
    var section_id = '<?php echo set_value('section_id') ?>';
    // var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
    $(document).ready(function () {

        //$('#myTabs a:first').tab('show') // Select first tab
//        getSectionByClass(provincial, district);
//        getGroupByClassandSection(provincial, district);




        $(document).on('change', '#provincial', function (e) {
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

        $(document).on('change', '#district_id', function (e) {
            $('#divisonal_id').html("");
            var dist_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchds",
                url: "<?php echo site_url('ajax/getfetchds'); ?>",
                data: {'dist_id': dist_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.dsid + ">" + obj.dsname + "</option>";
                    });

                    $('#divisonal_id').append(div_data);
                }
            });
        });

        $(document).on('change', '#zonal_id', function (e) {
            $('#educational_id').html("");
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

                    $('#educational_id').append(div_data);
                }
            });
        });

        $(document).on('change', '#district_id', function (e) {
            $('#grama_id').html("");
            var dist_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchgn",
                url: "<?php echo site_url('ajax/getfetchgn'); ?>",
                data: {'dist_id': dist_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.gnid + ">" + obj.gnname + "</option>";
                    });

                    $('#grama_id').append(div_data);
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




</script>-->

<!--
<script type="text/javascript">



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




</script>-->

<script type="text/javascript">


//
//<?php if (isset($filter_district_id)) { ?>
//        get_district_by_province('<?php echo $filter_prov_id; ?>', '<?php echo $filter_district_id; ?>');
//<?php } ?>
//
//    function get_district_by_province(provincial_id, district_id) {
//
//        $.ajax({
//            type: "POST",
//            url: "<?php echo site_url('ajax/get_district_by_province'); ?>",
//            data: {provincial_id: provincial_id, district_id: district_id},
//            async: false,
//            success: function (response) {
//                if (response)
//                {
//                    $('#filter_district_id').html(response);
//                }
//            }
//        });
//    }
//
//
//
//</script>


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
        get_school_by_edu('<?php echo $filter_edu_id; ?>', '<?php echo $filter_school_id; ?>');
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