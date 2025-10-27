<style>
    .scrollit {
        overflow:scroll;

    }

    td, th {
        padding: 10px;
        border: 1px solid #e0e0e0;
        /*background-color: #ffffff;*/
        color: #001f67;

    }

    tr{
        background-color: #f5f5f5;
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('sub_dirpro'); ?></small></h3>
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
                            <?php
                            if (date("d") < "18") {
                                if (has_permission(ADD, 'prozo', 'subprogress')) {
                                    ?>
                                    <?php if (isset($edit)) { ?>
                                    <li  class="<?php
                                    if (isset($add)) {
                                        echo 'active';
                                    }
                                    ?>"><a href="<?php echo site_url('subprozo/progress/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                     <?php } else { ?>
                                    <li  class="<?php
                                    if (isset($add)) {
                                        echo 'active';
                                    }
                                    ?>"><a href="#tab_add_route"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                     <?php } ?>
                                     <?php
                                 }
                             } else {
                                 echo " " . 'කණගාටුයි! 
මාසික ප්‍රගතිය පිළිබඳ තොරතුරු ඇතුළත් කිරීමට ලබා දී තිබූ කාලය අවසන්.';
                                 ;
                             }
                             ?>  
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_route"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 


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

                                            <th><?php echo $this->lang->line('month'); ?></th>                                                
                                            <th><?php echo $this->lang->line('username'); ?></th>
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


                                                if ($CurStatusID == 1) {
                                                    $Status1 = "Just Created";
                                                    $color = "bg-red";
                                                } elseif ($CurStatusID == 2) {
                                                    $Status1 = "Forwarded to Ministry";
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

                                                    <td><?php echo $obj->monthname; ?></td>
                                                    <td><?php echo $obj->fullname; ?></td>
                                                    <td><?php echo $obj->name; ?></td>
                                                    <td><?php echo $obj->created_at; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'prozo', 'subprogress') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('subprozo/progress/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(EDIT, 'prozo', 'subprogress') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('subprozo/progress/confirm/' . $obj->id); ?>" class="btn btn-main btn-xs"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('confirm'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'prozo', 'subprogress')) { ?>
                                                            <a href="javascript:void(0);" onclick="get_route_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-route-modal-lg" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'prozo', 'subprogress') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('subprozo/progress/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                                <?php echo form_open(site_url('subprozo/progress/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php /* $this->load->view('layout/school_list_form'); */ ?> 

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
                                        <div class="help-block"><?php echo form_error('month'); ?></div> 
                                    </div>
                                </div>






                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('subprozoprogress'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="scrollit">
                                                <table style="width:100%;" class="fn_add_stop_container responsive" id="product_info_table"> 
                                                    <tr style="background-color: #a7c0df;  font-weight: bolder;">                
                                                        <td><?php echo $this->lang->line('proposed_date'); ?></td>
                                                        <td><?php echo $this->lang->line('prozon_start_time1'); ?></td>
                                                        <td><?php echo $this->lang->line('prozon_end_time1'); ?></td>
                                                        <td><?php echo $this->lang->line('subname'); ?></td>
                                                        <td><?php echo $this->lang->line('program_type'); ?></td>
                                                        <td><?php echo $this->lang->line('program'); ?></td>
                                                        <td><?php echo $this->lang->line('reason1'); ?></td>
                                                        <td><?php echo $this->lang->line('address2'); ?></td>
                                                        <td><?php echo $this->lang->line('expected_beneficiaries1'); ?></td>
                                                        <td><?php echo $this->lang->line('expected_cost'); ?></td>
                                                        <td><?php echo $this->lang->line('cost_institution'); ?></td>
                                                    </tr>
                                                    <tr>               
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="date" name="proposed_date[]" id="addproposed_date" placeholder="<?php echo $this->lang->line('proposed_date'); ?>" />
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_start_time[]"  id="addprozon_start_time" value="" placeholder="<?php echo $this->lang->line('prozon_start_time1'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_end_time[]" id="add_prozon_end_time" value="" placeholder="<?php echo $this->lang->line('prozon_end_time1'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <select class="form-control col-md-12 col-xs-12"  id="add_subject_1" data-row-id="row_1" name="subject[]" style="width:200px;" onchange="get_subject(1);" required>
                                                                <option value="">--<?php echo $this->lang->line('select1'); ?>--</option>
                                                                <?php foreach ($sublist as $k => $v): ?>
                                                                    <option value="<?php echo $v['sub_name'] ?>"><?php echo $v['sub_name'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                                        <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program_type[]" id="program_type" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>-->
                                                        </td>
                                                        <td>
                                                            <select class="form-control col-md-12 col-xs-12"  id="add_program_type_1" data-row-id="row_1" name="program_type[]" style="width:200px;" onchange="get_program_type(1);" required>
                                                                <option value="">--<?php echo $this->lang->line('select1'); ?>--</option>
                                                                <?php foreach ($pr_type as $k => $v): ?>
                                                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['program_type'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                                        <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program_type[]" id="program_type" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>-->
                                                        </td>
                                                        <td>
                                                            <select class="form-control col-md-12 col-xs-12"  id="add_program_1" data-row-id="row_1" name="program[]" style="width:200px;" required>
                                                                <option value="">--<?php echo $this->lang->line('select1'); ?>--</option>

                                                            </select>
                                                            <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program[]" id="program" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>-->
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="reason[]" id="reason" placeholder="<?php echo $this->lang->line('reason1'); ?>" />
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="address[]" id="address" value="" placeholder="<?php echo $this->lang->line('address2'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_beneficiaries[]" id="expected_beneficiaries" value="" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_cost[]" id="expected_cost" value="" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>
                                                        </td>
                                                        <td>
                                                            <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="cost_institution[]" id="cost_institution" value="" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>
                                                        </td>
                                                        <td>
                                                        </td>

                                                    </tr>                                           
                                                </table>
                                            </div>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                                <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_more('fn_add_stop_container');"><?php echo $this->lang->line('add_more'); ?></a>
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
                                        <a href="<?php echo site_url('subprozo/progress'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_route">
                                <div class="x_content"> 
                                    <?php echo form_open(site_url('subprozo/progress/edit/' . $route->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php // $this->load->view('layout/school_list_edit_form');    ?>


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



                                    <div class="row">                  
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h5  class="column-title"><strong><?php echo $this->lang->line('depprozoprogress'); ?>:</strong></h5>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <!--<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('route_stop_fare'); ?></label>-->
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="scrollit">
                                                <table style="width:100%;" class="fn_edit_stop_container responsive" id="product_editinfo_table"> 

                                                    <thead>
                                                        <tr style="background-color: #a7c0df;">                 
                                                            <td><?php echo $this->lang->line('proposed_date'); ?></td>
                                                            <td><?php echo $this->lang->line('prozon_start_time1'); ?></td>
                                                            <td><?php echo $this->lang->line('prozon_end_time1'); ?></td>
                                                            <td><?php echo $this->lang->line('subname'); ?></td>
                                                            <td><?php echo $this->lang->line('program_type'); ?></td>
                                                            <td><?php echo $this->lang->line('program'); ?></td>
                                                            <td><?php echo $this->lang->line('reason1'); ?></td>
                                                            <td><?php echo $this->lang->line('address2'); ?></td>
                                                            <td><?php echo $this->lang->line('expected_beneficiaries1'); ?></td>
                                                            <td><?php echo $this->lang->line('expected_cost'); ?></td>
                                                            <td><?php echo $this->lang->line('cost_institution'); ?></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (isset($route_stops)): ?>

                                                            <?php foreach ($route_stops as $obj): ?>
                                                                <?php //print_r($v); ?>
                                                                <?php $couter = $obj->id; ?>
                                                                <tr id="row_<?php echo $couter; ?>">



                                                                    <td>
                                                                        <input type="hidden" name="stop_id[]"  name="stop_id_<?php echo $obj->id; ?>" value="<?php echo $couter; ?>" />
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="date" name="proposed_date[]" id="editproposed_date_<?php echo $obj->id; ?>" value="<?php echo $obj->proposed_date; ?>" placeholder="<?php echo $this->lang->line('proposed_date'); ?>" />
                                                                    </td>
                                                                    <td>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_start_time[]"  id="editprozon_start_time_<?php echo $obj->id; ?>" value="<?php echo $obj->prozon_start_time; ?>" placeholder="<?php echo $this->lang->line('prozon_start_time1'); ?>"/>
                                                                    </td>
                                                                    <td>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='time' name="prozon_end_time[]" id="edit_prozon_end_time_<?php echo $obj->id; ?>" value="<?php echo $obj->prozon_end_time; ?>" placeholder="<?php echo $this->lang->line('prozon_end_time1'); ?>"/>
                                                                    </td>

                                                                    <td>
                                                                        <select class="form-control col-md-12 col-xs-12"  id="edit_subject_<?php echo $couter; ?>" name="subject[]" style="width:200px;" required onchange="get_editsubject(<?php echo $obj->id; ?>);">
                                                                            <option value=""></option>
                                                                            <?php foreach ($sublist as $k => $v): ?>
                                                                                <option value="<?php echo $v['sub_name'] ?>"<?php
                                                                                if (isset($obj) && $obj->subject == $v["sub_name"]) {
                                                                                    echo 'selected="selected"';
                                                                                }
                                                                                ?>><?php echo $v['sub_name'] ?></option>
                                                                                    <?php endforeach ?>


                                                                        </select>
                                                                                    <!--<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program_type[]" id="program_type" value="" placeholder="<?php echo $this->lang->line('tea_year'); ?>"/>-->
                                                                    </td>
                                                                    <td>
                                                                        <select class="form-control col-md-12 col-xs-12"  id="edit_program_type_<?php echo $couter; ?>" name="program_type[]" style="width:200px;" required onchange="get_editprogram_type(<?php echo $obj->id; ?>);">
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
                                                                    
                                                                     <td>
                                                                        <select class="form-control col-md-12 col-xs-12"  id="edit_program_<?php echo $obj->id; ?>" name="program[]" style="width:200px;" required onchange="get_editprogram_type(<?php echo $obj->id; ?>);">
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
<!--                                                                    <td>
                                                                        <select class="form-control col-md-12 col-xs-12"  id="edit_program_<?php echo $obj->id; ?>" name="program[]" style="width:200px" required>

                                                                        </select>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="program[]" id="program" value="" placeholder="<?php echo $this->lang->line('tea_class'); ?>"/>
                                                                    </td>-->
                                                                    <td>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="reason[]" id="edit_reason_<?php echo $obj->id; ?>" value="<?php echo $obj->reason; ?>" placeholder="<?php echo $this->lang->line('reason1'); ?>" />
                                                                    </td>
                                                                    <td>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="address[]" id="edit_address_<?php echo $obj->id; ?>" value="<?php echo $obj->address; ?>" placeholder="<?php echo $this->lang->line('address2'); ?>"/>
                                                                    </td>
                                                                    <td>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_beneficiaries[]" id="edit_expected_beneficiaries_<?php echo $obj->id; ?>" value="<?php echo $obj->expected_beneficiaries; ?>" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>
                                                                    </td>
                                                                    <td>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="expected_cost[]" id="edit_expected_cost_<?php echo $obj->id; ?>" value="<?php echo $obj->expected_cost; ?>" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>
                                                                    </td>
                                                                    <td>
                                                                        <input  class="form-control col-md-12 col-xs-12" style="width:auto;" type='text' name="cost_institution[]" id="edit_cost_institution_<?php echo $obj->id; ?>" value="<?php echo $obj->cost_institution; ?>" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>
                                                                    </td>


                                                                    <td>
                                                                        <?php if ($couter > 1) { ?>
                                                                            <a  class="btn btn-danger btn-md " onclick="remove(this, <?php echo $obj->id; ?>);" style="margin-bottom: -0px;" > - </a>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr> 

                                                            </tbody>
                                                            <?php $couter++; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                </table>
                                            </div>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                              <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="edit_more('fn_edit_stop_container');"><?php echo $this->lang->line('add_more'); ?></a>
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
                                            <a  href="<?php echo site_url('subprozo/progress'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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
    function add_more(fn_stop_container) {

        var table = $("#product_info_table");
        var count_table_tbody_tr = $("#product_info_table tbody tr").length;
        var row_id = count_table_tbody_tr + 1;
       

        var select_id = [];
        $(".select_group.product").each(function () {
            select_id.push($(this).val());
        });

        $.ajax({
            url: "<?php echo site_url('subprozo/progress/getTableSubjectRow'); ?>",

            type: 'post',
            dataType: 'json',
            success: function (response) {

                $.ajax({
                    url: "<?php echo site_url('subprozo/progress/getTableProgrammeType'); ?>",

                    type: 'post',
                    dataType: 'json',
                    success: function (responsetype) {
                        var data = '<tr id="row_' + row_id + '">'
                                + '<td style="width:50%;">'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="date" name="proposed_date[]" id="addproposed_date_' + row_id + '" class="answer" placeholder="<?php echo $this->lang->line('addproposed_date'); ?>" />'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_start_time[]"  id="addprozon_start_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('addprozon_start_time'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_end_time[]" id="add_prozon_end_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('add_prozon_end_time'); ?>"/>'
                                + '</td>'
                                + '<td>' +
                                '<select class="form-control col-md-12 col-xs-12"   data-row-id="' + row_id + '" id="add_subject_' + row_id + '" name="subject[]" style="width:100%;"  onchange="get_subject(' + row_id + ')">' +
                                '<option value=""></option>';
                        $.each(response, function (index, value) {
                            data += '<option value="' + value.sub_name + '">' + value.sub_name + '</option>';
                        });

                        data += '</select>' +
                                '</td>' +
                                '<td>' +
                                '<select class="form-control col-md-12 col-xs-12"   data-row-id="' + row_id + '" id="add_program_type_' + row_id + '" name="program_type[]" style="width:100%;"  onchange="get_program_type(' + row_id + ')">' +
                                '<option value=""></option>';
                        $.each(responsetype, function (index, value) {
                            data += '<option value="' + value.id + '">' + value.program_type + '</option>';
                        });

                        data += '</select>' +
                                '</td>' +
                                '<td>' +
                                '  <select class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" id="add_program_' + row_id + '" name="program[]" style="width:100%;" required>' +
                                '<option value=""></option>';


//                        $.each(response, function (index, value) {
//
//                            data += '<option value="' + value.id + '">' + value.program_name + '</option>';
//
//                        });

                        data += '</select>' +
                                '</td>' +
                                '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="reason[]" id="reason_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('reason1'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="address[]" id="address_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('address2'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="expected_beneficiaries[]" id="expected_beneficiaries_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="expected_cost[]" id="expected_cost_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="cost_institution[]" id="cost_institution_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                                + '</td>'
                                + '</tr>';

                        if (count_table_tbody_tr >= 1) {
                            $("#product_info_table tbody tr:last").after(data);
                        } else {
                            $("#product_info_table tbody").html(data);
                        }

                        //  $('.' + fn_stop_container).append(data);

                    }
                });

            }
        });
    }




   function edit_more(fn_stop_container) {

        var table = $("#product_editinfo_table");
        var count_table_tbody_tr = $("#product_editinfo_table tbody tr").length;
      
        var row_id = count_table_tbody_tr + 1;
        alert(row_id);


        $.ajax({
            url: "<?php echo site_url('subprozo/progress/getTableSubjectRow'); ?>",

            type: 'post',
            dataType: 'json',
            success: function (response) {

                $.ajax({
                    url: "<?php echo site_url('subprozo/progress/getTableProgrammeType'); ?>",

                    type: 'post',
                    dataType: 'json',
                    success: function (responsetype) {
                        var data = '<tr id="row_' + row_id + '">'
                                + '<td style="width:50%;">'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="date" name="proposed_date[]" id="editproposed_date_' + row_id + '" class="answer" placeholder="<?php echo $this->lang->line('addproposed_date'); ?>" />'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_start_time[]"  id="editprozon_start_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('addprozon_start_time'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="time" name="prozon_end_time[]" id="edit_prozon_end_time_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('add_prozon_end_time'); ?>"/>'
                                + '</td>'
                                + '<td>' +
                                '<select class="form-control col-md-12 col-xs-12"   data-row-id="' + row_id + '" id="edit_subject_' + row_id + '" name="subject[]" style="width:100%;"  onchange="get_subject(' + row_id + ')">' +
                                '<option value=""></option>';
                        $.each(response, function (index, value) {
                            data += '<option value="' + value.sub_name + '">' + value.sub_name + '</option>';
                        });

                        data += '</select>' +
                                '</td>' +
                                '<td>' +
                                '<select class="form-control col-md-12 col-xs-12"   data-row-id="' + row_id + '" id="edit_program_type_' + row_id + '" name="program_type[]" style="width:100%;"  onchange="get_editprogram_type(' + row_id + ')">' +
                                '<option value=""></option>';
                        $.each(responsetype, function (index, value) {
                            data += '<option value="' + value.id + '">' + value.program_type + '</option>';
                        });

                        data += '</select>' +
                                '</td>' +
                                '<td>' +
                                '  <select class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" id="edit_program_' + row_id + '" name="program[]" style="width:100%;" required>' +
                                '<option value=""></option>';


//                        $.each(response, function (index, value) {
//
//                            data += '<option value="' + value.id + '">' + value.program_name + '</option>';
//
//                        });

                        data += '</select>' +
                                '</td>' +
                                '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="reason[]" id="editreason_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('reason1'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="address[]" id="editaddress_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('address2'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="expected_beneficiaries[]" id="editexpected_beneficiaries_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_beneficiaries1'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="expected_cost[]" id="editexpected_cost_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('expected_cost'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<input  class="form-control col-md-12 col-xs-12"  data-row-id="' + row_id + '" style="width:auto;" type="text" name="cost_institution[]" id="editcost_institution_' + row_id + '" value="" placeholder="<?php echo $this->lang->line('cost_institution'); ?>"/>'
                                + '</td>'
                                + '<td>'
                                + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                                + '</td>'
                                + '</tr>';

                        if (count_table_tbody_tr >= 1) {
                            $("#product_editinfo_table tbody tr:last").after(data);
                        } else {
                            $("#product_editinfo_table tbody").html(data);
                        }

                        //  $('.' + fn_stop_container).append(data);

                    }
                });

            }
        });
     }

    function remove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('subprozo/progress/remove_event'); ?>",
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
            url: "<?php echo site_url('subprozo/progress/get_single_route'); ?>",
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

<?php if (isset($edit)) { ?>
    <?php
    //$couter = 1;
    foreach ($route_stops as $obj) {
        ?>
            get_editval('<?php echo $obj->program_type; ?>', '<?php echo $obj->program; ?>', '<?php echo $obj->id; ?>');
    <?php } ?>
<?php } elseif ($post && !empty($post)) { ?>
        get_editprogram_type('<?php echo $post['edit_program_type_']; ?>', '<?php echo $post['edit_program_']; ?>');
<?php } ?>

//    function get_program_type(program_type,program) {
//        
//
////        var program_type = $("#program_type_" + row).val();
////        var program = $("#program_" + row).val();
//        alert(program_type);
//        $.ajax({
//            type: "POST",
//            url: "<?php echo site_url('ajax/get_program_type'); ?>",
//            data: {program_type: program_type, program: program},
//            async: false,
//            success: function (response) {
//
//              
//                if(response)
//               {
//                   if(edit){
//                       $('#edit_program').html(response);
//                   }else{
//                       $('#add_program').html(response);
//                   }
//               }
//            }
//        });
//
//
//    }

//    function get_subject(row = null) {
//
//        var subject = $("#add_subject_" + row).val();
//      
//        // alert(program_type);
//        $.ajax({
//            type: "POST",
//            url: "<?php echo site_url('ajax/get_subject'); ?>",
//            data: {subject: subject},
//            async: false,
//            success: function (response) {
//
//                $('#add_program_' + row).html(response);
//                if (response)
//                {
//                    if (edit) {
//                        $('#add_program_' + row).html(response);
//                    } else {
//                        $('#add_program_' + row).html(response);
//                    }
//
//
//                }
//            }
//        });
//
//
//    }


    function get_program_type(row = null) {

        var program_type = $("#add_program_type_" + row).val();
        var program = $("#add_program_" + row).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_program_type'); ?>",
            data: {program_type: program_type, program: program},
            async: false,
            success: function (response) {

                $('#add_program_' + row).html(response);
                if (response)
                {
                    if (edit) {
                        $('#add_program_' + row).html(response);
                    } else {
                        $('#add_program_' + row).html(response);
                    }


                }
            }
        });


    }


    function get_editprogram_type(row = null) {
// alert(row);
        var program_type = $("#edit_program_type_" + row).val();
        var program = $("#edit_program_" + row).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_editprogram_type'); ?>",
            data: {program_type: program_type, program: program},
            async: false,
            success: function (response) {

                $('#edit_program_' + row).html(response);
                if (response)
                {
                    if (edit) {
                        $('#edit_program_' + row).html(response);
                    } else {
                        $('#edi_program_' + row).html(response);
                    }


                }
            }
        });


    }


    function get_editval1(program_type, program, row) {


//        alert(row);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_editprogram_type'); ?>",
            data: {program_type: program_type, program: program},
            async: false,
            success: function (response) {

                $('#edit_program_' + row).html(response);
                if (response)
                {
                    if (edit) {
                        $('#edit_program_' + row).html(response);
                    } else {
                        $('#edit_program_' + row).html(response);
                    }


                }
            }
        });


    }
</script>
