<style>
    .scrollit {
        overflow:scroll;

    }

    td, th {
        padding: 10px;
        border: 1px solid #e0e0e0;
        background-color: #ffffff;
    }

    tr{
        background-color: #f5f5f5;
    }
</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('mainprogress'); ?></small></h3>
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
                        ?>"><a href="#tab_route_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'prozo', 'prozoprogress')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('prozo/progress/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_route"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?>  
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_route"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 



                        <li class="li-class-list">
                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>                                 
                                <select  class="form-control col-md-7 col-xs-12" onchange="get_route_by_school(this.value);">
                                    <option value="<?php echo site_url('transport/route/index'); ?>">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                    <?php foreach ($schools as $obj) { ?>
                                        <option value="<?php echo site_url('transport/route/index/' . $obj->id); ?>" <?php
                                        if (isset($filter_school_id) && $filter_school_id == $obj->id) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->school_name; ?></option>
                                            <?php } ?>   
                                </select>
                            <?php } ?>  
                        </li>     


                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_route_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('id'); ?></th>
                                            <th><?php echo $this->lang->line('cur_status'); ?></th>
                                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                <th><?php echo $this->lang->line('type'); ?></th>
                                                <th><?php echo $this->lang->line('provincial'); ?></th>
                                                <th><?php echo $this->lang->line('zonal'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('month'); ?></th>                                                
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('create_date'); ?></th>

                                            <th><?php echo $this->lang->line('action'); ?></th>                              
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($routes) && !empty($routes)) {
                                            ?>
                                            <?php
                                            foreach ($routes as $obj) {
                                                $CurStatusID = $obj->cur_status;

                                                $role_id = $obj->role_id;
                                                if ($role_id == 18) {

                                                    $roalecho = "Provincial";
                                                }
                                                if ($role_id == 19) {

                                                    $roalecho = "Zonal";
                                                } else {
                                                    $roalecho = "Please Contact Admin";
                                                }

                                                if ($CurStatusID == 1) {
                                                    $Status1 = "Just Creating";
                                                    $color = "bg-red";
                                                } elseif ($CurStatusID == 2) {
                                                    $Status1 = "Forward to Ministry";
                                                    $color = "bg-red";
                                                } elseif ($CurStatusID == 3) {
                                                    $Status1 = "Approved";
                                                    $color = "bg-blue";
                                                } elseif ($CurStatusID == 4) {
                                                    $Status1 = "Rejected";
                                                    $color = "bg-green";
                                                } else {
                                                    $Status1 = "Please Contact Admin";
                                                    $color = "bg-blue";
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo '<span class="label ' . $color . '">' . $Status1 . '</span>'; ?></td>
                                                    <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                        <td><?php echo $roalecho; ?></td>
                                                        <td><?php echo $obj->provincial_name; ?></td>
                                                        <td><?php echo $roalecho; ?></td>
                                                        <td><?php
                                                            if ($obj->role_id == 19) {
                                                                echo $obj->zonal_id;
                                                            }
                                                            ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $obj->monthname; ?></td>
                                                    <td><?php echo $obj->fullname; ?></td>
                                                    <td><?php echo $obj->created_at; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'prozo', 'prozoprogress') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('prozo/progress/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(EDIT, 'prozo', 'prozoprogress') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('prozo/progress/confirm/' . $obj->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('confirm'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'prozo', 'prozoprogress')) { ?>
                                                            <a href="javascript:void(0);" onclick="get_route_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-route-modal-lg" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'prozo', 'prozoprogress') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('prozo/progress/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                        ?>" id="tab_add_route">
                            <div class="x_content"> 
                                <?php echo form_open(site_url('prozo/progress/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php $this->load->view('layout/school_list_form'); ?> 

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="month"><?php echo $this->lang->line('month'); ?> <span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="month" id="add_month" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach ($monthlist as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value["id"] ?>" <?php echo set_select('month', $value['id'], set_value('month')); ?>><?php echo $value["monthname"] ?></option>
                                            <?php }
                                            ?> 
                                        </select>
                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='hidden' name="provincial" id="add_provincial" value="<?php echo $listprov->provincialname; ?>" />
                                        <div class="help-block"><?php echo form_error('month'); ?></div> 
                                    </div>
                                </div>

                                <?php if ($this->session->userdata('role_id') == ZONAL) { ?>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district"><?php echo $this->lang->line('district'); ?> <span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="district_id" id="add_district_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach ($district as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $value["id"] ?>" <?php echo set_select('district', $value['id'], set_value('district')); ?>><?php echo $value["districtname"] ?></option>
                                                <?php }
                                                ?> 
                                            </select>
                                            <div class="help-block"><?php echo form_error('district'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zonal_id"><?php echo $this->lang->line('zonal'); ?> <span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  id="add_zonal_id" name="zonal_id[]" required="required" multiple="">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>

                                            </select>
                                            <div class="help-block"><?php echo form_error('zonal'); ?></div> 
                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='hidden' name="provincial" id="add_provincial" value="<?php echo $listprov->provincialname; ?>" />
                                        </div>
                                    </div>

                                <?php } ?>


                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('mainprogress'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="scrollit">
                                                <table style="width:100%;" class="fn_add_stop_container responsive" id="product_info_table"> 
                                                    <tr>               
                                                        <td><?php echo $this->lang->line('proposed_date'); ?></td>
                                                        <td><?php echo $this->lang->line('prozon_start_time1'); ?></td>
                                                        <td><?php echo $this->lang->line('prozon_end_time1'); ?></td>
                                                        <td><?php echo $this->lang->line('program_type'); ?></td>
                                                        <td><?php echo $this->lang->line('program'); ?></td>
                                                        <td><?php echo $this->lang->line('reason1'); ?></td>
                                                        <td><?php echo $this->lang->line('address2'); ?></td>
                                                        <td><?php echo $this->lang->line('expected_beneficiaries1'); ?></td>
                                                        <td><?php echo $this->lang->line('expected_cost'); ?></td>
                                                        <td><?php echo $this->lang->line('cost_institution'); ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>               
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="date" name="proposed_date[]" id="addproposed_date_1" placeholder="<?php echo $this->lang->line('proposed_date'); ?>" />
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_start_time[]"  id="addprozon_start_time_1" value="" placeholder="<?php echo $this->lang->line('prozon_start_time1'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_end_time[]" id="add_prozon_end_time_1" value="" placeholder="<?php echo $this->lang->line('prozon_end_time1'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <select class="form-control col-md-12 col-xs-12"  id="program_type_1" name="program_type[]" data-row-id="row_1" style="width:100%;" required onchange="get_program_type(1)">
                                                                <option value=""></option>
                                                                <?php foreach ($pr_type as $k => $v): ?>
                                                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['program_type'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                                        <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program_type[]" id="program_type" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>-->
                                                        </td>
                                                        <td>
                                                            <select class="form-control col-md-12 col-xs-12"  id="program_1" name="program[]" style="width:100%;" required>
                                                                <option value=""></option>
                                                                <?php foreach ($pr_data as $k => $v): ?>
                                                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['program_name'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program[]" id="program" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>-->
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="reason[]" id="reason_1" placeholder="<?php echo $this->lang->line('reason1'); ?>" />
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="address[]" id="address_1" value="" placeholder="<?php echo $this->lang->line('address2'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_beneficiaries[]" id="expected_beneficiaries_1" value="" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_cost[]" id="expected_cost_1" value="" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="cost_institution[]" id="cost_institution_1" value="" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>
                                                        </td>
                                                        <td>
                                                        </td>

                                                    </tr>                                           
                                                </table>
                                            </div>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                                <!--<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_more('fn_add_stop_container');"><?php echo $this->lang->line('add_more'); ?></a>-->
                                                <button type="button" id="add_row" class="btn btn-success btn-xs"><?php echo $this->lang->line('add_more'); ?></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>                     
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks"><?php echo $this->lang->line('remarks'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="remarks"  id="add_remarks"  placeholder="<?php echo $this->lang->line('remarks'); ?>"><?php echo isset($post['remarks']) ? $post['remarks'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('remarks'); ?></div>
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('prozo/progress'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_route">
                                <div class="x_content"> 
                                    <?php echo form_open(site_url('prozo/progress/edit/' . $route->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php $this->load->view('layout/school_list_edit_form'); ?>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="month"><?php echo $this->lang->line('month'); ?> <span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12"  name="month" id="add_month" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>


                                                <?php foreach ($monthlist as $key => $value) {
                                                    ?>

                                                    <option value="<?php echo $value["id"] ?>" <?php
                                                    if (isset($route) && $route->month == $value["id"]) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo ucfirst($value["monthname"]); ?></option>
                                                        <?php } ?>  
                                            </select>
                                            <div class="help-block"><?php echo form_error('month'); ?></div> 
                                        </div>
                                    </div>

                                    <?php if ($this->session->userdata('role_id') == ZONAL) { ?>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district_id"><?php echo $this->lang->line('district'); ?></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <select  id="edit_district_id" name="district_id" placeholder="" type="text" class="form-control" onchange="get_zonal_by_district(this.value, '');">
                                                    <option value="select"><?php echo $this->lang->line('select') ?></option>

                                                    <?php foreach ($district as $key => $value) {
                                                        ?>

                                                        <option value="<?php echo $value["id"] ?>" <?php
                                                        if (isset($route) && $route->district_id == $value["id"]) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo ucfirst($value["districtname"]); ?></option>
                                                            <?php } ?>   
                                                </select> 
                                                <span class="text-danger"><?php echo form_error('district_id'); ?></span>
                                            </div>


                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district_id"><?php echo $this->lang->line('cur_zonallist'); ?></label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="cencus_number"><?php echo $this->lang->line('cur_zonal'); ?></label>
                                                <input readonly="" class="form-control col-md-7 col-xs-12"  name="current_zonal"  id="current_zonal" value="<?php echo $route->zonal_id; ?>" type="text" autocomplete="off">
                                                <div class="help-block"><?php echo form_error('cur_zonallist'); ?></div> 
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zonal_id"><?php echo $this->lang->line('zonal'); ?></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">


                                                <select id="edit_zonal_id" name="zonal_id[]" placeholder="" type="text" class="form-control" multiple="">
                                                    <option value="select"><?php echo $this->lang->line('select') ?></option>

                                                </select> 
                                                <span class="text-danger"><?php echo form_error('zonal'); ?></span>

                                            </div>
                                        </div>

                                    <?php } ?>

                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('mainprogress'); ?>:</strong></h5>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <!--<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="scrollit">
                                                <table style="width:100%;" class="fn_edit_stop_container responsive" id="productedit_info_table"> 
                                                    <tr>               
                                                        <td><?php echo $this->lang->line('proposed_date'); ?></td>
                                                        <td><?php echo $this->lang->line('prozon_start_time1'); ?></td>
                                                        <td><?php echo $this->lang->line('prozon_end_time1'); ?></td>
                                                        <td><?php echo $this->lang->line('program_type'); ?></td>
                                                        <td><?php echo $this->lang->line('program'); ?></td>
                                                        <td><?php echo $this->lang->line('reason1'); ?></td>
                                                        <td><?php echo $this->lang->line('address2'); ?></td>
                                                        <td><?php echo $this->lang->line('expected_beneficiaries1'); ?></td>
                                                        <td><?php echo $this->lang->line('expected_cost'); ?></td>
                                                        <td><?php echo $this->lang->line('cost_institution'); ?></td>
                                                    </tr>
                                                    <?php
//                                                    $couter = 1;
//                                                    foreach ($route_stops as $obj) {
//                                                        
                                                    ?> 
                                                        <!--<tr>-->               
                                                    <?php if (isset($progress_data['progress_item'])): ?>
                                                        <?php $x = 1; ?>
                                                        <?php foreach ($progress_data['progress_item'] as $key => $obj): ?>
                                                            <?php //print_r($v);  ?>
                                                            <tr id="row_<?php echo $x; ?>">

                                                                <td>
                                                                    <input type="hidden" name="stop_id[]" value="<?php echo $obj->id; ?>" />
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="date" name="proposed_date[]" id="proposed_date_<?php echo $x; ?>" value="<?php echo $obj->proposed_date; ?>" placeholder="<?php echo $this->lang->line('proposed_date'); ?>" />
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_start_time[]"  id="prozon_start_time_<?php echo $x; ?>" value="<?php echo $obj->prozon_start_time; ?>" placeholder="<?php echo $this->lang->line('prozon_start_time1'); ?>"/>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_end_time[]" id="prozon_end_time_<?php echo $x; ?>" value="<?php echo $obj->prozon_end_time; ?>" placeholder="<?php echo $this->lang->line('prozon_end_time1'); ?>"/>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control col-md-12 col-xs-12"  data-row-id="row_<?php echo $x; ?>" id="program_type_<?php echo $x; ?>" name="program_type[]" style="width:100%;" required  onchange="get_program_type(<?php echo $x; ?>);" >
                                                                        <option value=""></option>
                                                                        <?php foreach ($pr_type as $k => $v): ?>
                                                                            <option value="<?php echo $v['id'] ?>"<?php
                                                                            if (isset($obj) && $obj->program_type == $v["id"]) {
                                                                                echo 'selected="selected"';
                                                                            }
                                                                            ?>><?php echo $v['program_type'] ?></option>
                                                                                <?php endforeach ?>


                                                                    </select>
                                                                                <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program_type[]" id="program_type" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>-->
                                                                </td>

                                    <!--                                                            <select class="form-control col-md-12 col-xs-12"  data-row-id="row_<?php echo $x; ?>" id="program_<?php echo $x; ?>" name="program[]" style="width:100%;" required>
                                        <option value=""></option>
                                                                <?php foreach ($pr_data as $k => $v): ?>
                                                        <option value="<?php echo $v['id'] ?>"><?php echo $v['program_name'] ?></option>
                                                                <?php endforeach ?>
                                    </select>-->

                                                                <td>
                                                                    <select class="form-control col-md-12 col-xs-12"  data-row-id="row_<?php echo $x; ?>" id="program_<?php echo $x; ?>" name="program[]" style="width:100%;" required>
                                                                        <?php foreach ($pr_data as $k => $v): ?>
                                                                            <option value="<?php echo $v['id'] ?>"<?php
                                                                            if (isset($obj) && $obj->program == $v["id"]) {
                                                                                echo 'selected="selected"';
                                                                            }
                                                                            ?>><?php echo $v['program_name'] ?></option>
                                                                                <?php endforeach ?>

                                                                    </select>
                                                                    <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program[]" id="program" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>-->
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="reason[]" id="reason_<?php echo $x; ?>" value="<?php echo $obj->reason; ?>" placeholder="<?php echo $this->lang->line('reason1'); ?>" />
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="address[]" id="address_<?php echo $x; ?>" value="<?php echo $obj->address; ?>" placeholder="<?php echo $this->lang->line('address2'); ?>"/>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_beneficiaries[]" id="expected_beneficiaries_<?php echo $x; ?>" value="<?php echo $obj->expected_beneficiaries; ?>" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_cost[]" id="expected_cost_<?php echo $x; ?>" value="<?php echo $obj->expected_cost; ?>" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="cost_institution[]" id="cost_institution_<?php echo $x; ?>" value="<?php echo $obj->cost_institution; ?>" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>
                                                                </td>


                                                                <td>
                                                                    <?php if ($x > 1) { ?>
                                                                        <a  class="btn btn-danger btn-md " onclick="remove(this, <?php echo $obj->id; ?>);" style="margin-bottom: -0px;" > - </a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr> 

                                                            <?php $x++; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    <?php
//                                                        $couter++;
//                                                    }
                                                    ?>

                                                </table>
                                            </div>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                                <button type="button" id="addedit_row" class="btn btn-success btn-xs"><?php echo $this->lang->line('add_more'); ?></button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks"><?php echo $this->lang->line('note'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea  class="form-control col-md-7 col-xs-12"  name="remarks"  id="edit_remarks" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($route->note) ? $route->note : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('note'); ?></div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($route) ? $route->id : $id; ?>" name="id" />
                                            <a  href="<?php echo site_url('prozo/progress'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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




<script type="text/javascript">


    $(document).ready(function () {

        // Add new row in the table 
        $("#add_row").unbind('click').bind('click', function () {
            var table = $("#product_info_table");
            var count_table_tbody_tr = $("#product_info_table tbody tr").length;
            var row_id = count_table_tbody_tr + 1;

            var select_id = [];
            $(".select_group.product").each(function () {
                select_id.push($(this).val());
            });

            $.ajax({
                url: "<?php echo site_url('prozo/progress/getTableProductRow'); ?>",

                type: 'post',
                dataType: 'json',
                success: function (responsedata) {
                    $.ajax({
                        url: "<?php echo site_url('prozo/progress/getTableProgrammeType'); ?>",

                        type: 'post',
                        dataType: 'json',
                        success: function (responsetype) {
                            // console.log(reponse.x);
                            var html = '<tr id="row_' + row_id + '">'

                                    + '<td style="width:50%;">'
                                    + '<input  class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '" style="width:auto;" type="date" name="proposed_date[]" id="addproposed_date_' + row_id + '" class="answer" placeholder="<?php echo $this->lang->line('addproposed_date'); ?>" />'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_start_time[]"  id="addprozon_start_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('addprozon_start_time'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_end_time[]" id="add_prozon_end_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('add_prozon_end_time'); ?>"/>'
                                    + '</td>'


                                    + '<td>'
                                    + '<select class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '"  id="program_type_' + row_id + '" name="program_type[]" style="width:100%;" onchange="get_program_type(' + row_id + ')">' +
                                    '<option value=""></option>';
                            $.each(responsetype, function (index, value) {
                                html += '<option value="' + value.id + '">' + value.program_type + '</option>';
                            });

                            html += '</select>' +
                                    '</td>' +
                                    '<td>' +
                                    '<select class="form-control select_group brands" data-row-id="' + row_id + '"  id="program_' + row_id + '" name="program[]" style="width:100%;" >' +
                                    '<option value=""></option>';


//                        $.each(response, function (index, value) {
//
//                            data += '<option value="' + value.id + '">' + value.program_name + '</option>';
//
//                        });

                            html += '</select>' +
                                    '</td>' +
                                    +'<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="program[]" id="program_' + row_id + '"  value="" placeholder="<?php echo $this->lang->line('program'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="reason[]" id="reason_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('reason1'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="address[]" id="address_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('address2'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="expected_beneficiaries[]" id="expected_beneficiaries_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="expected_cost[]" id="expected_cost_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="cost_institution[]" id="cost_institution_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                                    + '</td>'
                                    + '</tr>';

                            if (count_table_tbody_tr >= 1) {
                                $("#product_info_table tbody tr:last").after(html);
                            } else {
                                $("#product_info_table tbody").html(html);
                            }

                            $(".product").select2();



                        }
                    });
                }
            });

            return false;
        });




     // Add new row in the table 
        $("#addedit_row").unbind('click').bind('click', function () {
            var table = $("#productedit_info_table");
            var count_table_tbody_tr = $("#productedit_info_table tbody tr").length;
            var row_id = count_table_tbody_tr + 1;

            var select_id = [];
            $(".select_group.product").each(function () {
                select_id.push($(this).val());
            });

            $.ajax({
                url: "<?php echo site_url('prozo/progress/getTableProductRow'); ?>",

                type: 'post',
                dataType: 'json',
                success: function (responsedata) {
                    $.ajax({
                        url: "<?php echo site_url('prozo/progress/getTableProgrammeType'); ?>",

                        type: 'post',
                        dataType: 'json',
                        success: function (responsetype) {
                            // console.log(reponse.x);
                            var html = '<tr id="row_' + row_id + '">'

                                    + '<td style="width:50%;">'
                                    + '<input  class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '" style="width:auto;" type="date" name="proposed_date[]" id="addproposed_date_' + row_id + '" class="answer" placeholder="<?php echo $this->lang->line('addproposed_date'); ?>" />'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_start_time[]"  id="addprozon_start_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('addprozon_start_time'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_end_time[]" id="add_prozon_end_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('add_prozon_end_time'); ?>"/>'
                                    + '</td>'


                                    + '<td>'
                                    + '<select class="form-control col-md-12 col-xs-12" data-row-id="' + row_id + '"  id="program_type_' + row_id + '" name="program_type[]" style="width:100%;" onchange="get_program_type(' + row_id + ')">' +
                                    '<option value=""></option>';
                            $.each(responsetype, function (index, value) {
                                html += '<option value="' + value.id + '">' + value.program_type + '</option>';
                            });

                            html += '</select>' +
                                    '</td>' +
                                    '<td>' +
                                    '<select class="form-control select_group brands" data-row-id="' + row_id + '"  id="program_' + row_id + '" name="program[]" style="width:100%;" >' +
                                    '<option value=""></option>';


//                        $.each(response, function (index, value) {
//
//                            data += '<option value="' + value.id + '">' + value.program_name + '</option>';
//
//                        });

                            html += '</select>' +
                                    '</td>' +
                                    +'<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="program[]" id="program_' + row_id + '"  value="" placeholder="<?php echo $this->lang->line('program'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="reason[]" id="reason_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('reason1'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="address[]" id="address_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('address2'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="expected_beneficiaries[]" id="expected_beneficiaries_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="expected_cost[]" id="expected_cost_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" data-row-id="' + row_id + '" name="cost_institution[]" id="cost_institution_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>'
                                    + '</td>'
                                    + '<td>'
                                    + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                                    + '</td>'
                                    + '</tr>';

                            if (count_table_tbody_tr >= 1) {
                                $("#productedit_info_table tbody tr:last").after(html);
                            } else {
                                $("#productedit_info_table tbody").html(html);
                            }

                            $(".product").select2();



                        }
                    });
                }
            });

            return false;
        });

    });



    function remove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('prozo/progress/remove_stop'); ?>",
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


<div class="modal fade bs-route-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_route_data">            
            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_route_modal(route_id) {

        $('.fn_route_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('prozo/progress/get_single_route'); ?>",
            data: {route_id: route_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_route_data').html(response);
                }
            }
        });
    }
</script>




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

    $("#add").validate();
    $("#edit").validate();

    function get_route_by_school(url) {
        if (url) {
            window.location.href = url;
        }
    }

</script>



<script type="text/javascript">



    function get_program_type(row = null) {

        var program_type = $("#program_type_" + row).val();
        var program = $("#program_" + row).val();
        alert(program_type);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_program_type'); ?>",
            data: {program_type: program_type, program: program},
            async: false,
            success: function (response) {

                $('#program_' + row).html(response);
                if (response)
                {
                    if (edit) {
                        $('#program_' + row).html(response);
                    } else {
                        $('#program_' + row).html(response);
                    }


                }
            }
        });


    }
</script>

