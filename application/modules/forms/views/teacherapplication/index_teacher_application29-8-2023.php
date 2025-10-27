<style>
    .form-horizontal .control-label {
        padding-top: 8px;
        font-size: 14px;
    }
    label {
        width: 100%;
        font-size: 14px;
    }
    th {
        text-align: left;
        font-size: 14px;
    }
    /*.form-horizontal .form-group {
margin-right: 0;
margin-left: 0;
overflow-x: scroll;
}*/
    p {
        margin: 0 0 10px;
        font-size: 13px;
    }
    table>tbody>tr>td {
        padding: 4px;
        font-size: 14px;
    }

	.btn-success2 {
    color: #fdfdfd;
    background-color: #418800;
    border-color: #418800;
}

.btn-success2:hover {
    background-color: #316606;
    border-color: #316606;
}


</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-exchange"></i><small> <?php echo $this->lang->line('teacher_application_form'); ?></small></h3>
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
                        ?>"><a href="#tab_teacherapplication_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'forms', 'teacherapplication')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('forms/formsapply/teacherapplicationformadd'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_teacherapplication"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?> 

                        <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_teacherapplication"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>   

                        <?php if (isset($detail)) { ?>
                            <li  class="active"><a href="#tab_view_teacherapplicationform"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('view'); ?></a> </li>                          
                        <?php } ?> 

                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_teacherapplication_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th><?php echo $this->lang->line('cur_status'); ?></th>
                                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                <th><?php echo $this->lang->line('school_name'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('applicant'); ?></th>
                                            <th><?php echo $this->lang->line('current_employer'); ?></th>
                                            <th><?php echo $this->lang->line('current_employer_address'); ?></th>

                                            <th><?php echo $this->lang->line('create'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($teacherapplicationformval) && !empty($teacherapplicationformval)) {
                                            ?>
                                            <?php
                                            foreach ($teacherapplicationformval as $obj) {
                                                $CurStatusID = $obj->cur_status;

                                                    if ($CurStatusID == 1) {
                                                    $Status1 = "Just Created";
                                                    $color = "bg-red";
                                                } elseif ($CurStatusID == 2) {
                                                    $Status1 = "Forwarded to Kruthyadhikari";
                                                    $color = "bg-orange";
												} elseif ($CurStatusID == 3) {
                                                    $Status1 = "Forwarded to Ministry";
                                                    $color = "bg-yellow";
												} elseif ($CurStatusID == 4) {
                                                    $Status1 = "confirm";
                                                    $color = "bg-green";
                                                } elseif ($CurStatusID == 5) {
                                                    $Status1 = "Approved";
                                                    $color = "bg-blue";
                                                } elseif ($CurStatusID == 6) {
                                                    $Status1 = "Rejected";
                                                    $color = "bg-black";
                                                } else {
                                                    $Status1 = "Please Contact Admin";
                                                    $color = "bg-blue";
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo '<span class="label ' . $color . '">' . $Status1 . '</span>'; ?></td>
                                                    <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                        <td><?php echo $obj->school_name; ?></td>
                                                    <?php } ?>

                                                    <td><?php echo $obj->type; ?>&nbsp;<?php echo $obj->initial_name_s; ?></td>
                                                    <td><?php echo $obj->piriven_name; ?></td>
                                                    <td><?php echo $obj->piriven_address; ?></td>

                                                    <td><?php echo $obj->created_at; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'forms', 'teacherapplication') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('forms/formsapply/teacherapplicationformedit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>

                                                        <?php if (has_permission(VIEW, 'forms', 'teacherapplication')) { ?>
                                                            <a  onclick="get_teacherapplicationform_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-teacherapplicationform-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>

                                                        <?php if (has_permission(DELETE, 'forms', 'teacherapplication') && $obj->confirmstatus != 2) { ?> 
                                                            <a href="<?php echo site_url('forms/formsapply/teacherapplicationformdelete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                        <?php } ?>

                                                        <?php if (has_permission(EDIT, 'forms', 'teacherapplication') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('forms/Formsapply/confirm/' . $obj->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('confirmkruthy'); ?> </a>
                                                        <?php } ?>

                                                        <?php if (has_permission(VIEW, 'forms', 'teacherapplication')) { ?>
                                                            <a href="<?php echo site_url('forms/formsapply/teacher_application_print/' . $obj->id); ?>" class="btn btn-success2 btn-xs" target="_blank"><i class="fa fa-print" style="color: #ffffff;"></i> <?php echo $this->lang->line('print'); ?> </a>

                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if (isset($add)) {
                                            echo 'active';
                                        } ?>" id="tab_add_teacherapplication">

                            <div class="x_content"> 
								
								
                           <?php echo form_open(site_url('forms/formsapply/teacherapplicationformadd'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'), ''); ?>

                                <ul  class="nav nav-tabs bordered">
                                    <li  class="active" ><a href="#tab_zero"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('pirven_fir'); ?></a> </li>

                                    <li><a href="#tab_first"   role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_sec'); ?></a> </li>                          

                                    <li><a href="#tab_sec"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_third'); ?></a> </li>                          

                                    <li ><a href="#tab_third"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_forth'); ?></a> </li>


                                </ul>
                                <br>


                                <div class="tab-content">
                                    <!--== tab_zero =============================================================================================================================-->

                                    <div class="tab-pane fade in active" id="tab_zero">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h4  class="column-title" style="text-align:center; font-size: 20px; text-decoration: underline"><strong><?php echo $this->lang->line('text200'); ?></strong></h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('part1'); ?></strong></h5>
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('text201'); ?></strong></h5>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -12px;">
                                                <div class="item form-group">
                                                    <div>01.&nbsp;<?php echo $this->lang->line('text202'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text202'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <select  class="form-control col-md-7 col-xs-12" name="type" id="type" required="required">
                                                        <option value="">--<?php echo $this->lang->line('select1'); ?>--</option>                                                                                    
                                                       <?php $types = get_type(); ?>
                                                <?php foreach ($types as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['type']) && $post['type'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="help-block"><?php echo form_error('person1'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="initial_name_s"  id="initial_name_s" value="<?php echo isset($post['initial_name_s']) ? $post['initial_name_s'] : ''; ?>" placeholder="" type="text" autocomplete="off" required="required">
                                                    <div class="help-block"><?php echo form_error('applicant_s_name_initial'); ?></div>
                                                </div>
                                            </div>




                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>02.&nbsp;<?php echo $this->lang->line('text203'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text203'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="full_name_s"  id="full_name_s" value="<?php echo isset($post['full_name_s']) ? $post['applicant_s_name'] : ''; ?>" placeholder="" type="text" autocomplete="off" required="required">
                                                    <div class="help-block"><?php echo form_error('applicant_s_name'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>03.&nbsp;<?php echo $this->lang->line('text204'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text204'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="initial_name_e"  id="initial_name_e" value="<?php echo isset($post['initial_name_e']) ? $post['initial_name_e'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('initial_name_e'); ?></div>
                                                </div>
                                            </div>

                                        </div>
									
									   <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>04.&nbsp;&nbsp;<?php echo $this->lang->line('birth_date'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('birth_date'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                      <!--  <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datei" name="datei" value="<?php echo isset($datei) && $datei != '' ? date('d-m-Y', strtotime($datei)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    -->
                                                    <input  class="form-control col-md-7 col-xs-12"  name="datei"  id="add_datei" value="<?php echo isset($post['datei']) ? $post['datei'] : ''; ?>" placeholder="<?php echo $this->lang->line('datei'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datei'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>05.&nbsp;<?php echo $this->lang->line('text205'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text205'); ?></div>
                                                </div>
                                            </div>

                                          	
										    <div class="col-md-3 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													<select  class="form-control col-md-7 col-xs-12" name="nationality" id="nationality" required="required">
														
														 <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                       <?php $nationalitys = get_nationality(); ?>
                                                <?php foreach ($nationalitys as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['nationality']) && $post['nationality'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
										
                                                       
                                                    </select>
                                                   
											</div>
										</div>
										  
										    <div class="col-md-3 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													        <select class="form-control col-md-7 col-xs-12" name="religion" style="display:none;">
																
																
																<option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                                    <?php $religions = get_religion(); ?>
                                                    <?php foreach ($religions as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                         if (isset($post['religion']) && $post['religion'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>
                                                 
                                                    </select>
											</div>
										</div>
											
											
											
											

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>06.&nbsp;<?php echo $this->lang->line('text206a'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text206a'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="nic_no"  id="nic_no" value="<?php echo isset($post['nic_no']) ? $post['nic_no'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('nic_no'); ?></div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>07.&nbsp;&nbsp;<?php echo $this->lang->line('text206'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text206'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="red_address"  id="red_address" value="<?php echo isset($post['red_address']) ? $post['red_address'] : ''; ?>" placeholder=""></textarea>
                                                    <div class="help-block"><?php echo form_error('red_address'); ?></div>
                                                </div>
                                            </div>
                                        </div>
									
								     	<div class="row" style="font-size: 16px;">
                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>08.&nbsp;&nbsp;<?php echo $this->lang->line('text207'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text207'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													<label class="col-md-4 col-sm-3 col-xs-12" for="phone">08.1&nbsp;&nbsp;<?php echo $this->lang->line('text207a'); ?>&nbsp;&nbsp;:-
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input  class="form-control col-md-7 col-xs-12"  name="mobile_no"  id="mobile_no" value="<?php echo isset($post['mobile_no']) ?  $post['mobile_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('mobile_no'); ?>" type="text" autocomplete="off">
                                                      <div class="help-block"><?php echo form_error('mobile_no'); ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <label class="col-md-5 col-sm-3 col-xs-12" for="phone">08.2&nbsp;&nbsp;<?php echo $this->lang->line('text207b'); ?>&nbsp;&nbsp;:-
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input  class="form-control col-md-7 col-xs-12"  name="whatsapp_no"  id="whatsapp_no" value="<?php echo isset($post['whatsapp_no']) ?  $post['whatsapp_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('whatsapp_no'); ?>" type="text" autocomplete="off">
                                                      <div class="help-block"><?php echo form_error('whatsapp_no'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                            
                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>09.&nbsp;<?php echo $this->lang->line('text208'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text208'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="e_mail"  id="e_mail" value="<?php echo isset($post['e_mail']) ? $post['e_mail'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('e_mail'); ?></div>
                                                </div>
                                            </div>

                                        </div>
                                      
                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>10.&nbsp;&nbsp;<?php echo $this->lang->line('text209'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text209'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													<label for="school_name"><?php echo $this->lang->line('school_name'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="piriven_name"  id="piriven_name" value="<?php echo isset($schools->piriname) ? $schools->piriname : ''; ?>" placeholder="<?php echo $this->lang->line('school_name'); ?>">
													
                                                    <div class="help-block"><?php echo form_error('piriven_name'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <!--<textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_address"  id="piriven_address" value="<?php echo isset($post['piriven_address']) ? $post['piriven_address'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_address'); ?>"></textarea>-->
													<label for="school_name"><?php echo $this->lang->line('school_name'); ?></label>
													<input  class="form-control col-md-7 col-xs-12"  name="piriven_address"  id="piriven_address" value="<?php echo isset($schools->address) ? $schools->address : ''; ?>" placeholder="<?php echo $this->lang->line('school_address'); ?>">
                                                    <div class="help-block"><?php echo form_error('piriven_address'); ?></div>
                                                </div>
                                            </div>
                            
                                        </div>

                                          <!--= 1=-->
                                       <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group dataTables_wrapper">
                                                    <div for="national_id">11. <?php echo $this->lang->line('text209a'); ?>&nbsp;:-</div>
                                                    <label for="national_id">11.1 <?php echo $this->lang->line('text210'); ?></label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_1container" cellspacing="0" width="100%">

                                                        <tr>

                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text211'); ?></th>
                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text212'); ?></th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                     <!--   <input  class="form-control col-md-7 col-xs-12"  name="year1"  id="year1" value="<?php echo isset($post['year1']) ? $post['year1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year1'); ?></div>-->
																		
																		<input type="text"  class="form-control col-md-7 col-xs-12"  name="year1"  id="add_year1" value="<?php echo isset($year1) ? $year1 : ''; ?>"  placeholder="<?php echo $this->lang->line('year1'); ?>"  autocomplete="off"/>
                                                                    </div>
                                                                </div>

                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="year2"  id="add_year2" value="<?php echo isset($year2) ? $year2 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_no1"  id="exam_no1" value="<?php echo isset($post['exam_no1']) ? $post['exam_no1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_no1'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_no2"  id="exam_no2" value="<?php echo isset($post['exam_no2']) ? $post['exam_no2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_no2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>

                                                        </tr>


                                                        <tr>
                                                            <td>01</td>
                                                            <td>
                                                              <!--  <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub1"  id="ex1_sub1" value="<?php echo isset($post['ex1_sub1']) ? $post['ex1_sub1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>-->
																
																<select  class="form-control col-md-7 col-xs-12" name="ex1_sub1"  id="ex1_sub1" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub1', $value['sub_name'], set_value('ex1_sub1')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>

                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub1_grade"  id="ex1_sub1_grade" value="<?php echo isset($post['ex1_sub1_grade']) ? $post['ex1_sub1_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub1_grade'); ?></div>
                                                            </td>

                                                            <td>01</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub1"  id="ex2_sub1">
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub1', $value['sub_name'], set_value('ex2_sub1')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub1_grade"  id="ex2_sub1_grade" value="<?php echo isset($post['ex2_sub1_grade']) ? $post['ex2_sub1_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub1_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>02</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub2"  id="ex1_sub2">
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub2', $value['sub_name'], set_value('ex1_sub2')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub2_grade"  id="ex1_sub2_grade" value="<?php echo isset($post['ex1_sub2_grade']) ? $post['ex1_sub2_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub2_grade'); ?></div>
                                                            </td>


                                                            <td>02</td>
                                                            <td>
                                                               <select  class="form-control col-md-7 col-xs-12" name="ex2_sub2"  id="ex2_sub2"  >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub2', $value['sub_name'], set_value('ex2_sub2')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub2_grade"  id="ex2_sub2_grade" value="<?php echo isset($post['ex2_sub2_grade']) ? $post['ex2_sub2_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub2_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>03</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub3"  id="ex1_sub3"  >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub3', $value['sub_name'], set_value('ex1_sub3')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub3_grade"  id="ex1_sub3_grade" value="<?php echo isset($post['ex1_sub3_grade']) ? $post['ex1_sub3_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub3_grade'); ?></div>
                                                            </td>

                                                            <td>03</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub3"  id="ex2_sub3" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub3', $value['sub_name'], set_value('ex2_sub3')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub3_grade"  id="ex2_sub3_grade" value="<?php echo isset($post['ex2_sub3_grade']) ? $post['ex2_sub3_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub3_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>04</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub4"  id="ex1_sub4" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub4', $value['sub_name'], set_value('ex1_sub4')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub4_grade"  id="ex1_sub4_grade" value="<?php echo isset($post['ex1_sub4_grade']) ? $post['ex1_sub4_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub4_grade'); ?></div>
                                                            </td>

                                                            <td>04</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub4"  id="ex2_sub4" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub4', $value['sub_name'], set_value('ex2_sub4')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub4_grade"  id="ex2_sub4_grade" value="<?php echo isset($post['ex2_sub4_grade']) ? $post['ex2_sub4_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub4_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>05</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub5"  id="ex1_sub5" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub5', $value['sub_name'], set_value('ex1_sub5')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub5'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub5_grade"  id="ex1_sub5_grade" value="<?php echo isset($post['ex1_sub5_grade']) ? $post['ex1_sub5_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub5_grade'); ?></div>
                                                            </td>

                                                            <td>05</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub5"  id="ex2_sub5" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub5', $value['sub_name'], set_value('ex2_sub5')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub5'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub5_grade"  id="ex2_sub5_grade" value="<?php echo isset($post['ex2_sub5_grade']) ? $post['ex2_sub5_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub5_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>06</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub6"  id="ex1_sub6" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub6', $value['sub_name'], set_value('ex1_sub6')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub6_grade"  id="ex1_sub6_grade" value="<?php echo isset($post['ex1_sub1_grade']) ? $post['ex1_sub6_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub6_grade'); ?></div>
                                                            </td>

                                                            <td>06</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub6"  id="ex2_sub6" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub6', $value['sub_name'], set_value('ex2_sub6')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub6_grade"  id="ex2_sub6_grade" value="<?php echo isset($post['ex2_sub1_grade']) ? $post['ex2_sub6_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub6_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>07</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub7"  id="ex1_sub7" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub7', $value['sub_name'], set_value('ex1_sub7')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub7_grade"  id="ex1_sub7_grade" value="<?php echo isset($post['ex1_sub7_grade']) ? $post['ex1_sub7_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub7_grade'); ?></div>
                                                            </td>

                                                            <td>07</td>
                                                            <td>
																<select  class="form-control col-md-7 col-xs-12" name="ex2_sub7"  id="ex2_sub7"  >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub7', $value['sub_name'], set_value('ex2_sub7')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>

                                                                <div class="help-block"><?php echo form_error('ex2_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub7_grade"  id="ex2_sub7_grade" value="<?php echo isset($post['ex2_sub7_grade']) ? $post['ex2_sub7_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub7_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>08</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub8"  id="ex1_sub8" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub8', $value['sub_name'], set_value('ex1_sub8')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub8_grade"  id="ex1_sub8_grade" value="<?php echo isset($post['ex1_sub8_grade']) ? $post['ex1_sub8_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub8_grade'); ?></div>
                                                            </td>

                                                            <td>08</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub8"  id="ex2_sub8" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub8', $value['sub_name'], set_value('ex2_sub8')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub8_grade"  id="ex2_sub8_grade" value="<?php echo isset($post['ex2_sub8_grade']) ? $post['ex2_sub8_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub8_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>09</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub9"  id="ex1_sub9"  >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub9', $value['sub_name'], set_value('ex1_sub9')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub9_grade"  id="ex1_sub9_grade" value="<?php echo isset($post['ex1_sub9_grade']) ? $post['ex1_sub9_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub9_grade'); ?></div>
                                                            </td>

                                                            <td>09</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub9"  id="ex2_sub9" >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub9', $value['sub_name'], set_value('ex2_sub9')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub9_grade"  id="ex2_sub9_grade" value="<?php echo isset($post['ex2_sub9_grade']) ? $post['ex2_sub9_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub9_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex1_sub10"  id="ex1_sub10"  >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex1_sub10', $value['sub_name'], set_value('ex1_sub10')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub10_grade"  id="ex1_sub10_grade" value="<?php echo isset($post['ex1_sub10_grade']) ? $post['ex1_sub10_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub10_grade'); ?></div>
                                                            </td>

                                                            <td>10</td>
                                                            <td>
                                                                <select  class="form-control col-md-7 col-xs-12" name="ex2_sub10"  id="ex2_sub10"  >
																	<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
																	<?php foreach ($listsubjects as $key => $value) {
																	?>
																	<option value="<?php echo $value["sub_name"] ?>" <?php echo set_select('ex2_sub10', $value['sub_name'], set_value('ex2_sub10')); ?>><?php echo $value["sub_name"] ?></option>
																	<?php }
																	?> 
																</select>
                                                                <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub10_grade"  id="ex2_sub10_grade" value="<?php echo isset($post['ex2_sub10_grade']) ? $post['ex2_sub10_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub10_grade'); ?></div>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <!--END OF =1=-->

                                        <!--= 2=-->
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group dataTables_wrapper">
                                                    <label for="national_id">11.2 <?php echo $this->lang->line('text217'); ?></label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_2container" cellspacing="0" width="100%">
                                                        <tr>

                                                            <th colspan="6">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text218'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                       <!--TEST CODE-->						
										
										                        <div class="col-md-4 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													<select  class="form-control col-md-7 col-xs-12" name="higher_exam_type" id="higher_exam_type" required="required">
														
														 <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                       <?php $higher_exam_types = get_exam(); ?>
                                                <?php foreach ($higher_exam_types as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['higher_exam_type']) && $post['higher_exam_type'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
										
                                                       
                                                    </select>
                                                   
											</div>
										</div>
										
										                        <div class="col-md-4 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													
													<input  class="form-control col-md-7 col-xs-12"  name="higher_exam"  id="higher_exam" value="<?php echo isset($post['higher_exam']) ? $post['higher_exam'] : ''; ?>" placeholder="" type="text" autocomplete="off" style="display:none;">
                                                                        <div class="help-block"><?php echo form_error('exam_name'); ?></div>
													
													        
											</div>
										</div>
											                    <!--TEST CODE-->

                                                            </th>

                                                        </tr>
                                          
														<tr>

                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text219'); ?></th>
                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text220'); ?></th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="year_h1"  id="add_year_h1" value="<?php echo isset($post['year_h1']) ? $post['year_h1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year_h1'); ?></div>
                                                                    </div>
                                                                </div>

                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="year_h2"  id="add_year_h2" value="<?php echo isset($post['year_h2']) ? $post['year_h2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year_h2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
														    <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_noh1"  id="exam_noh1" value="<?php echo isset($post['exam_noh1']) ? $post['exam_noh1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_noh1'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_noh2"  id="exam_noh2" value="<?php echo isset($post['exam_noh2']) ? $post['exam_noh2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_noh2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>

                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text221'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="datehi"  id="add_datehi" value="<?php echo isset($post['datehi']) ? $post['datehi'] : ''; ?>" placeholder="<?php echo $this->lang->line('datehi'); ?>" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo $this->lang->line('datehi'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text221'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="datehii"  id="add_datehii" value="<?php echo isset($post['datehii']) ? $post['datehii'] : ''; ?>" placeholder="<?php echo $this->lang->line('datehii'); ?>" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo $this->lang->line('datehii'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
														
														 <tr>

                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>

                                                        </tr>


                                                        <tr>
                                                            <td>01</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub1"  id="hex1_sub1" value="<?php echo isset($post['hex1_sub1']) ? $post['hex1_sub1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub1_grade"  id="hex1_sub1_grade" value="<?php echo isset($post['hex1_sub1_grade']) ? $post['hex1_sub1_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub1_grade'); ?></div>
                                                            </td>

                                                            <td>01</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub1"  id="hex2_sub1" value="<?php echo isset($post['hex2_sub1']) ? $post['hex2_sub1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub1_grade"  id="hex2_sub1_grade" value="<?php echo isset($post['hex2_sub1_grade']) ? $post['hex2_sub1_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub1_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>02</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub2"  id="hex1_sub2" value="<?php echo isset($post['hex1_sub2']) ? $post['hex1_sub2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub2_grade"  id="hex1_sub2_grade" value="<?php echo isset($post['hex1_sub2_grade']) ? $post['hex1_sub2_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub2_grade'); ?></div>
                                                            </td>


                                                            <td>02</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub2"  id="hex2_sub2" value="<?php echo isset($post['hex2_sub2']) ? $post['hex2_sub2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub2_grade"  id="hex2_sub2_grade" value="<?php echo isset($post['hex2_sub2_grade']) ? $post['hex2_sub2_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub2_grade'); ?></div>
                                                            </td>
                                                        </tr>
														
													    <tr>
                                                            <td>03</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub3"  id="hex1_sub3" value="<?php echo isset($post['hex1_sub3']) ? $post['hex1_sub3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub3_grade"  id="hex1_sub3_grade" value="<?php echo isset($post['hex1_sub3_grade']) ? $post['hex1_sub3_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub3_grade'); ?></div>
                                                            </td>

                                                            <td>03</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub3"  id="hex2_sub3" value="<?php echo isset($post['hex2_sub3']) ? $post['hex2_sub3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub3_grade"  id="hex2_sub3_grade" value="<?php echo isset($post['hex2_sub3_grade']) ? $post['hex2_sub3_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub3_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>04</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub4"  id="hex1_sub4" value="<?php echo isset($post['hex1_sub4']) ? $post['hex1_sub4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub4_grade"  id="hex1_sub4_grade" value="<?php echo isset($post['hex1_sub4_grade']) ? $post['hex1_sub4_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub4_grade'); ?></div>
                                                            </td>

                                                            <td>04</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub4"  id="hex2_sub4" value="<?php echo isset($post['hex2_sub4']) ? $post['hex2_sub4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub4_grade"  id="hex2_sub4_grade" value="<?php echo isset($post['hex2_sub4_grade']) ? $post['hex2_sub4_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub4_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>05</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub5"  id="hex1_sub5" value="<?php echo isset($post['hex1_sub5']) ? $post['hex1_sub5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub5'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub5_grade"  id="hex1_sub5_grade" value="<?php echo isset($post['hex1_sub5_grade']) ? $post['hex1_sub5_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub5_grade'); ?></div>
                                                            </td>

                                                            <td>05</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub5"  id="hex2_sub5" value="<?php echo isset($post['hex2_sub5']) ? $post['hex2_sub5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub5_grade"  id="hex2_sub5_grade" value="<?php echo isset($post['hex2_sub5_grade']) ? $post['hex2_sub5_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub5_grade'); ?></div>
                                                            </td>
                                                        </tr>
														
														<tr>
                                                            <td>06</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub6"  id="hex1_sub6" value="<?php echo isset($post['hex1_sub6']) ? $post['hex1_sub6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub6_grade"  id="hex1_sub6_grade" value="<?php echo isset($post['hex1_sub1_grade']) ? $post['hex1_sub6_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub6_grade'); ?></div>
                                                            </td>

                                                            <td>06</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub6"  id="hex2_sub6" value="<?php echo isset($post['hex2_sub6']) ? $post['hex2_sub6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub6_grade"  id="hex2_sub6_grade" value="<?php echo isset($post['hex2_sub1_grade']) ? $post['hex2_sub6_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub6_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>07</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub7"  id="hex1_sub7" value="<?php echo isset($post['hex1_sub7']) ? $post['hex1_sub7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub7_grade"  id="hex1_sub7_grade" value="<?php echo isset($post['hex1_sub7_grade']) ? $post['hex1_sub7_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub7_grade'); ?></div>
                                                            </td>

                                                            <td>07</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub7"  id="hex2_sub7" value="<?php echo isset($post['hex2_sub7']) ? $post['hex2_sub7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub7_grade"  id="hex2_sub7_grade" value="<?php echo isset($post['hex2_sub7_grade']) ? $post['hex2_sub7_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub7_grade'); ?></div>
                                                            </td>
                                                        </tr>
														
														
														<tr>
                                                            <td>08</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub8"  id="hex1_sub8" value="<?php echo isset($post['hex1_sub8']) ? $post['hex1_sub8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub8_grade"  id="hex1_sub8_grade" value="<?php echo isset($post['hex1_sub8_grade']) ? $post['hex1_sub8_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub8_grade'); ?></div>
                                                            </td>

                                                            <td>08</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub8"  id="hex2_sub8" value="<?php echo isset($post['hex2_sub8']) ? $post['hex2_sub8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub8_grade"  id="hex2_sub8_grade" value="<?php echo isset($post['hex2_sub8_grade']) ? $post['hex2_sub8_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub8_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>09</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub9"  id="hex1_sub9" value="<?php echo isset($post['hex1_sub9']) ? $post['hex1_sub9'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub9_grade"  id="hex1_sub9_grade" value="<?php echo isset($post['hex1_sub9_grade']) ? $post['hex1_sub9_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub9_grade'); ?></div>
                                                            </td>

                                                            <td>09</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub9"  id="hex2_sub9" value="<?php echo isset($post['hex2_sub9']) ? $post['hex2_sub9'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub9_grade"  id="hex2_sub9_grade" value="<?php echo isset($post['hex2_sub9_grade']) ? $post['hex2_sub9_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub9_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub10"  id="hex1_sub10" value="<?php echo isset($post['hex1_sub10']) ? $post['hex1_sub10'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub10_grade"  id="hex1_sub10_grade" value="<?php echo isset($post['hex1_sub10_grade']) ? $post['hex1_sub10_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub10_grade'); ?></div>
                                                            </td>

                                                            <td>10</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub10"  id="hex2_sub10" value="<?php echo isset($post['hex2_sub10']) ? $post['hex2_sub10'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub10_grade"  id="hex2_sub10_grade" value="<?php echo isset($post['hex2_sub10_grade']) ? $post['hex2_sub10_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub10_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
									
									    <div class="row" style="font-size: 16px;">
                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>12.&nbsp;&nbsp;<?php echo $this->lang->line('text222'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text222'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-5column"  name="other_qualifications"  id="other_qualifications" value="<?php echo isset($post['other_qualifications']) ? $post['other_qualifications'] : ''; ?>" placeholder=""></textarea>
                                                    <div class="help-block"><?php echo form_error('other_qualifications'); ?></div>
                                                </div>
                                            </div>
                                        </div>
									
									    <!--= 3=-->
                                          <div class="row" style="font-size: 16px;">

                                            

                                                    <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -85px;">
                                                        <div class="item form-group">
                                                            <div>13.1&nbsp;<?php echo $this->lang->line('text223'); ?>:-</div>
                                                            <div class="help-block"><?php echo form_error('text223'); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                        <div class="item form-group">
                                                            <select  class="form-control col-md-7 col-xs-12" name="yes_no" id="yes_no" style="font-size:17px;">
                                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                            <?php $yes_nos = get_yes_no(); ?>
																   <?php foreach ($yes_nos as $key => $value) { ?>
                                                                   <option value="<?php echo $key; ?>" <?php
                                                                      if (isset($post['yes_no']) && $post['yes_no'] == $key) 
																	     {
                                                                          echo 'selected="selected"';
                                                                         }
                                                                    ?>
															        ><?php echo $value; ?>
																    </option>
                                                                    <?php } ?>
                                                             </select>
                                                            <div class="help-block"><?php echo form_error('yes_no'); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -125px;">
                                                        <div class="item form-group">
                                                            <div><?php echo $this->lang->line('text224'); ?></div>
                                                            <div class="help-block"><?php echo form_error('text224'); ?></div>
                                                        </div>
                                                    </div>

                                                         <div id="showyes" class="yesOnly" style="display:none;">
                      
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_container" cellspacing="0" width="100%">
                                                 <tr>               
                                                            <th rowspan="2" style="text-align: center"><?php echo $this->lang->line('text225'); ?></th>
                                                            <th rowspan="2" style="text-align: center"><?php echo $this->lang->line('text226'); ?></th>
                                                            <th colspan="2" style="text-align: center"><?php echo $this->lang->line('text227'); ?></th>
                                                        </tr>

                                                        <tr>               
                                                            <th style="text-align: center"><?php echo $this->lang->line('work_from'); ?></th>
                                                            <th style="text-align: center"><?php echo $this->lang->line('work_to'); ?></th>
                                                        </tr>		
                                                <tr>               
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type="text" name="working_place[]" placeholder="<?php echo $this->lang->line('text225'); ?>" />
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_designation[]" value="" placeholder="<?php echo $this->lang->line('text226'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_from[]" value="" placeholder="<?php echo $this->lang->line('work_from'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_to[]" value="" placeholder="<?php echo $this->lang->line('work_to'); ?>"/>
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
								
								        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>13.2.&nbsp;&nbsp;<?php echo $this->lang->line('text228'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text228'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="leave_reson"  id="leave_reson" value="<?php echo isset($post['leave_reson']) ? $post['leave_reson'] : ''; ?>" placeholder=""></textarea>
                                                    <div class="help-block"><?php echo form_error('leave_reson'); ?></div>
                                                </div>
                                            </div>
                                        </div>
										
								        <div class="row" style="font-size: 16px;">


                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text229'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text229'); ?></div>
                                                </div>
                                            </div>
                                        </div>
								
								
								        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -65px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text229a'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text229a'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    
													 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  type="text" id="piriven_name1" value="<?php echo isset($schools->piriname) ? $schools->piriname : ''; ?>"  placeholder="<?php echo $this->lang->line('name1'); ?>" required 
                                                            type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
                                                </div>
                                            </div>


                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -95px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text229b'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text229b'); ?></div>
                                                </div>
                                            </div>
											
											<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateiv" name="dateiv" value="<?php echo isset($dateiv) && $dateiv != '' ? date('d-m-Y', strtotime($dateiv)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('dateiv'); ?></div>
                                                </div>
                                            </div>

                                        </div>
								
								        <div class="row" style="font-size: 16px;">

                                            

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text230'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text230'); ?></div>
                                                </div>
                                            </div>



                                        </div>
								
								        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datev" name="datev" value="<?php echo isset($datev) && $datev != '' ? date('d-m-Y', strtotime($datev)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datev'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text111'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1" type="file">
												</div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text111'); ?></div>

                                                </div>

                                            </div>
                                        </div>
								
								
								  <!-- upload docs-->

                                        <div class="row instructions" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div style="font-size: 18px;"><strong><?php echo $this->lang->line('text231'); ?></strong></div>
                                                    <div class="help-block"><?php echo form_error('text231'); ?></div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <ul style="list-style: decimal; font-weight: 900">

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -25px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text232'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text232'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t1_doc1"  id="t1_doc1" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('doc1'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text233'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text233'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t1_doc2"  id="t1_doc2" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('doc1'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>


                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text234'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text234'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-7 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t1_doc3"  id="t1_doc3" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('doc1'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-9 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text235'); ?>:-</div>
                                                                <div><?php echo $this->lang->line('text236'); ?></div>
                                                                <div class="help-block"><?php echo form_error('text235'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t1_doc4"  id="t1_doc4" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('doc1'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>



                                                </ul>
                                            </div>
                                        </div>


								
								 <div class="form-group">
                                    <div class="col-md-12 col-md-offset-3" style="color: red;font-size: 18px;font-weight: 700">
                                        <label for="date_submit"> <span class="required">***</span> <?php echo $this->lang->line('next'); ?></label>
                                    </div>
                                </div>


                                    </div>
							
							
							        <!--== tab_first =============================================================================================================================-->

                                    <div class="tab-pane fade in " id="tab_first">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('part2'); ?></strong></h5>
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('text237'); ?></strong></h5>
                                            </div>
                                        </div>
                                        </br>

                                           <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>01.&nbsp;<?php echo $this->lang->line('text238'); ?></div>
                                                    <div><?php echo $this->lang->line('text239'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th><?php echo $this->lang->line('tea_year'); ?></th>
                                                                <th ><?php echo $this->lang->line('month'); ?></th>
                                                                <th ><?php echo $this->lang->line('date'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_year1"  id="annual_year1" value="<?php echo isset($post['annual_year1']) ? $post['annual_year1'] : ''; ?>" placeholder="<?php echo $this->lang->line('tea_year'); ?>"  type="number" autocomplete="off">
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_month1"  id="annual_month1" value="<?php echo isset($post['annual_month1']) ? $post['annual_month1'] : ''; ?>" placeholder="<?php echo $this->lang->line('month'); ?>"  type="number" autocomplete="off">                                                                           
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_date1"  id="annual_date1" value="<?php echo isset($post['annual_date1']) ? $post['annual_date1'] : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>"  type="number" autocomplete="off">                                                                          
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-1 ol-sm-2 col-xs-12" style="text-align: center">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('work_to'); ?></div>
                                                </div>
                                            </div>
											
											 <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th><?php echo $this->lang->line('tea_year'); ?></th>
                                                                <th ><?php echo $this->lang->line('month'); ?></th>
                                                                <th ><?php echo $this->lang->line('date'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_year2"  id="annual_year2" value="<?php echo isset($post['annual_year2']) ? $post['annual_year2'] : ''; ?>" placeholder="<?php echo $this->lang->line('tea_year'); ?>"  type="number" autocomplete="off">
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_month2"  id="annual_month2" value="<?php echo isset($post['annual_month2']) ? $post['annual_month2'] : ''; ?>" placeholder="<?php echo $this->lang->line('month'); ?>"  type="number" autocomplete="off">                                                                           
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_date2"  id="annual_date2" value="<?php echo isset($post['annual_date2']) ? $post['annual_date2'] : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>"  type="number" autocomplete="off">                                                                          
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>


                                        </div>


                                          <div class="row" style="font-size: 16px;">

                                            <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>02.&nbsp;<?php echo $this->lang->line('text240'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th><?php echo $this->lang->line('text240a'); ?></th>
                                                                <th ><?php echo $this->lang->line('text240b'); ?></th>
                                                                <th ><?php echo $this->lang->line('text240c'); ?></th>
                                                            </tr>
                                                        </thead>
                                                           <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_monk"  id="annual_monk" value="<?php echo isset($post['annual_monk']) ? $post['annual_monk'] : ''; ?>" placeholder="<?php echo $this->lang->line('text240a'); ?>"  type="number" autocomplete="off" onblur="reAvgSum();">
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="annual_lay"  id="annual_lay" value="<?php echo isset($post['annual_lay']) ? $post['annual_lay'] : ''; ?>" placeholder="<?php echo $this->lang->line('text240b'); ?>"  type="number" autocomplete="off" onblur="reAvgSum();">                                                                           
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input readonly class="form-control col-md-7 col-xs-12"  name="annual_total"  id="annual_total" value="<?php echo isset($post['annual_total']) ? $post['annual_total'] : ''; ?>" placeholder="<?php echo $this->lang->line('text240c'); ?>"  type="number" autocomplete="off">                                                                          
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>03.&nbsp;<?php echo $this->lang->line('text241'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('text242'); ?></th>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="vacancy_extra"  id="vc_A" value="vacancy" placeholder=""  type="radio" checked="" autocomplete="off" required>
                                                                    <div class="help-block"><?php echo form_error('vacancy'); ?></div>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('text243'); ?></th>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="vacancy_extra"  id="vc_B" value="extra" placeholder=""  type="radio" autocomplete="off">
                                                                    <div class="help-block"><?php echo form_error('extra'); ?></div>
                                                                </td>
                                                            </tr>
                                                        </thead>

                                                    </table>
                                                </div>
												
											
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>04.&nbsp;<?php echo $this->lang->line('text242'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('tea_year'); ?></th>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="vacancy_year"  id="vacancy_year" value="<?php echo isset($post['vacancy_year']) ? $post['vacancy_year'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('month'); ?></th>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="vacancy_month"  id="vacancy_month" value="<?php echo isset($post['vacancy_month']) ? $post['vacancy_month'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('date'); ?></th>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="vacancy_date"  id="vacancy_date" value="<?php echo isset($post['vacancy_date']) ? $post['vacancy_date'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
                                                                    <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                                </td>
                                                            </tr>
                                                        </thead>

                                                    </table>
                                                </div>
                                            </div>

                                        </div>


                                         <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>05.&nbsp;<?php echo $this->lang->line('text245'); ?></div>
                                                </div>
                                            </div>

                                           <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group dataTables_wrapper">

                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <th rowspan="2"><?php echo $this->lang->line('text246'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('time'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('monday'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('tuesday'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('wednesday'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('thursday'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('friday'); ?></th>
                                                        </tr>
														
														<tr>
															<th style="background-color: #f9f9f9"><?php echo $this->lang->line('work_from'); ?></th>
															<th style="background-color: #f9f9f9"><?php echo $this->lang->line('work_to'); ?></th>
														</tr>
 

                                                        <tr>
                                                            <td>01</td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time1_from" id="add_time1_from" value="<?php echo isset($post['time1_from']) ? $post['time1_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															 <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time1_to" id="add_time1_to" value="<?php echo isset($post['time1_to']) ? $post['time1_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon1" id="mon1" value="<?php echo isset($post['mon1']) ? $post['mon1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues1" id="tues1" value="<?php echo isset($post['tues1']) ? $post['tues1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend1" id="wend1" value="<?php echo isset($post['wend1']) ? $post['wend1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur1" id="thur1" value="<?php echo isset($post['thur1']) ? $post['thur1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri1" id="fri1" value="<?php echo isset($post['fri1']) ? $post['fri1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time2_from" id="add_time2_from" value="<?php echo isset($post['time2_from']) ? $post['time2_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															<td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time2_to" id="add_time2_to" value="<?php echo isset($post['time2_to']) ? $post['time2_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon2" id="mon2" value="<?php echo isset($post['mon2']) ? $post['mon2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues2" id="tues2" value="<?php echo isset($post['tues2']) ? $post['tues2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend2" id="wend2" value="<?php echo isset($post['wend2']) ? $post['wend2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur2" id="thur2" value="<?php echo isset($post['thur2']) ? $post['thur2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri2" id="fri2" value="<?php echo isset($post['fri2']) ? $post['fri2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time3_from" id="add_time3_from" value="<?php echo isset($post['time3_from']) ? $post['time3_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															<td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time3_to" id="add_time3_to" value="<?php echo isset($post['time3_to']) ? $post['time3_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon3" id="mon3" value="<?php echo isset($post['mon3']) ? $post['mon3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues3" id="tues3" value="<?php echo isset($post['tues3']) ? $post['tues3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend3" id="wend3" value="<?php echo isset($post['wend3']) ? $post['wend3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur3" id="thur3" value="<?php echo isset($post['thur3']) ? $post['thur3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri3" id="fri3" value="<?php echo isset($post['fri3']) ? $post['fri3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time4_from" id="add_time4_from" value="<?php echo isset($post['time4_from']) ? $post['time4_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															<td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time4_to" id="add_time4_to" value="<?php echo isset($post['time4_to']) ? $post['time4_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon4" id="mon4" value="<?php echo isset($post['mon4']) ? $post['mon4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues4" id="tues4" value="<?php echo isset($post['tues4']) ? $post['tues4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend4" id="wend4" value="<?php echo isset($post['wend4']) ? $post['wend4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur4" id="thur4" value="<?php echo isset($post['thur4']) ? $post['thur4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri4" id="fri4" value="<?php echo isset($post['fri4']) ? $post['fri4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>05</td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time5_from" id="add_time5_from" value="<?php echo isset($post['time5_from']) ? $post['time5_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															<td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time5_to" id="add_time5_to" value="<?php echo isset($post['time5_to']) ? $post['time5_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon5" id="mon5" value="<?php echo isset($post['mon5']) ? $post['mon5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues5" id="tues5" value="<?php echo isset($post['tues5']) ? $post['tues5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend5" id="wend5" value="<?php echo isset($post['wend5']) ? $post['wend5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur5" id="thur5" value="<?php echo isset($post['thur5']) ? $post['thur5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri5" id="fri5" value="<?php echo isset($post['fri5']) ? $post['fri5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time6_from" id="add_time6_from" value="<?php echo isset($post['time6_from']) ? $post['time6_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															<td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time6_to" id="add_time6_to" value="<?php echo isset($post['time6_to']) ? $post['time6_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon6" id="mon6" value="<?php echo isset($post['mon6']) ? $post['mon6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues6" id="tues6" value="<?php echo isset($post['tues6']) ? $post['tues6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend6" id="wend6" value="<?php echo isset($post['wend6']) ? $post['wend6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur6" id="thur6" value="<?php echo isset($post['thur6']) ? $post['thur6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri6" id="fri6" value="<?php echo isset($post['fri6']) ? $post['fri6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time7_from" id="add_time7_from" value="<?php echo isset($post['time7_from']) ? $post['time7_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															<td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time7_to" id="add_time7_to" value="<?php echo isset($post['time7_to']) ? $post['time7_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon7" id="mon7" value="<?php echo isset($post['mon7']) ? $post['mon7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues7" id="tues7" value="<?php echo isset($post['tues7']) ? $post['tues7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend7" id="wend7" value="<?php echo isset($post['wend1']) ? $post['wend7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur7" id="thur7" value="<?php echo isset($post['thur7']) ? $post['thur7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri7" id="fri7" value="<?php echo isset($post['fri7']) ? $post['fri7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time8_from" id="add_time8_from" value="<?php echo isset($post['time8_from']) ? $post['time8_from'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
															<td>
                                                                <input class="form-control col-md-7 col-xs-12" name="time8_to" id="add_time8_to" value="<?php echo isset($post['time8_to']) ? $post['time8_to'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="mon8" id="mon8" value="<?php echo isset($post['mon8']) ? $post['mon8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="tues8" id="tues8" value="<?php echo isset($post['tues8']) ? $post['tues8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18i'); ?></div>
                                                            </td>

                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="wend8" id="wend8" value="<?php echo isset($post['wend8']) ? $post['wend8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="thur8" id="thur8" value="<?php echo isset($post['thur8']) ? $post['thur8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input class="form-control col-md-7 col-xs-12" name="fri8" id="fri8" value="<?php echo isset($post['fri8']) ? $post['fri8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('18ii'); ?></div>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
									
									<!--===========================================EG==============================
									
									
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
                                </div>-->
									<!--===========================================EG==============================-->
							
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>06.&nbsp;<?php echo $this->lang->line('text247'); ?></div>
                                                </div>
                                            </div>

                                    <div class="item form-group">

                                        <div class="col-md-12 col-sm-6 col-xs-12">
												<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_prcontainer" cellspacing="0" width="100%">
												<tbody>
                                                <tr>               
                                                    <td><?php echo $this->lang->line('text215'); ?></td>
                                                    <td><?php echo $this->lang->line('text216'); ?></td>
                                                    <td><?php echo $this->lang->line('text248'); ?></td>
                                                    <td><?php echo $this->lang->line('hours'); ?></td>
                                                    <td><?php echo $this->lang->line('seconds'); ?></td>
                                                </tr>
                                                <tr>               
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12"  type="text" name="subclass1[]" placeholder="<?php echo $this->lang->line('text215'); ?>" />
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12"  type='text' name="	subsubject1[]" value="" placeholder="<?php echo $this->lang->line('text216'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12"  type='text' name="subperiods1[]" value="" placeholder="<?php echo $this->lang->line('text248'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12"  type='text' name="subhours1[]" value="" placeholder="<?php echo $this->lang->line('hours'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12"  type='text' name="subminuts1[]" value="" placeholder="<?php echo $this->lang->line('seconds'); ?>"/>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>   
													</tbody>
													<tbody>
													<tr>
                                                            <th colspan="3"><?php echo $this->lang->line('text240c'); ?></th>
                                                            <td> 
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hours_total"  id="hours_total" value="<?php echo isset($post['hours_total']) ? $post['hours_total'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hours_total'); ?></div>
                                                            </td>
														
                                                            <td> 
                                                                <input  class="form-control col-md-7 col-xs-12"  name="minuts_total"  id="minuts_total" value="<?php echo isset($post['minuts_total']) ? $post['minuts_total'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('minuts_total'); ?></div>
                                                            </td>
                                                        </tr>
													
													</tbody>
                                            </table>
                                            <div class="help-block">
                                                <?php echo form_error('answer'); ?>
                                                <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_prmore('fn_add_stop_prcontainer');"><?php echo $this->lang->line('add_more'); ?></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>07.&nbsp;<?php echo $this->lang->line('text250'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th><?php echo $this->lang->line('text240a'); ?></th>
                                                                <th ><?php echo $this->lang->line('text240b'); ?></th>
                                                                <th ><?php echo $this->lang->line('text240c'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="proposed_monk"  id="proposed_monk" value="<?php echo isset($post['proposed_monk']) ? $post['proposed_monk'] : ''; ?>" placeholder="<?php echo $this->lang->line('text240a'); ?>"  type="number" autocomplete="off" onblur="reSum();">
                                                                    <div class="help-block"><?php echo form_error('text240a'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="proposed_lay"  id="proposed_lay" value="<?php echo isset($post['proposed_lay']) ? $post['proposed_lay'] : ''; ?>" placeholder="<?php echo $this->lang->line('text240b'); ?>"  type="number" autocomplete="off" onblur="reSum();">                                                                           
                                                                    <div class="help-block"><?php echo form_error('text240b'); ?></div>
                                                                </td>
                                                                <td>
                                                                    <input readonly class="form-control col-md-7 col-xs-12"  name="proposed_total"  id="proposed_total" value="<?php echo isset($post['proposed_total']) ? $post['proposed_total'] : ''; ?>" placeholder="<?php echo $this->lang->line('text240c'); ?>"  type="number" autocomplete="off">                                                                          
                                                                    <div class="help-block"><?php echo form_error('text240c'); ?></div>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>08.&nbsp;&nbsp;<?php echo $this->lang->line('text251'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="additional_appointment"  id="additional_appointment" value="<?php echo isset($post['additional_appointment']) ? $post['additional_appointment'] : ''; ?>" placeholder=""></textarea>
                                                    <div class="help-block"><?php echo form_error('additional_appointment'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>09.1&nbsp;<?php echo $this->lang->line('text252'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text252'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="piriven_teacher_name"  id="piriven_teacher_name" value="<?php echo isset($post['piriven_teacher_name']) ? $post['piriven_teacher_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('applicant_s_name'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>09.2&nbsp;<?php echo $this->lang->line('text253'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text253'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="jobtitle_subject"  id="jobtitle_subject" value="<?php echo isset($post['jobtitle_subject']) ? $post['jobtitle_subject'] : ''; ?>" placeholder="" type="text" autocomplete="off"></textarea>
                                                    <div class="help-block"><?php echo form_error('jobtitle_subject'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>09.3&nbsp;&nbsp;<?php echo $this->lang->line('text254'); ?>:-</div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column" name="highedu_subjects"  id="highedu_subjects" value="<?php echo isset($post['highedu_subjects']) ? $post['highedu_subjects'] : ''; ?>" placeholder="" type="text" autocomplete="off"></textarea>
                                                    <div class="help-block"><?php echo form_error('highedu_subjects'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>09.4&nbsp;<?php echo $this->lang->line('text255'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text255'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="teacher_rej_no"  id="teacher_rej_no" value="<?php echo isset($post['teacher_rej_no']) ? $post['teacher_rej_no'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('applicant_s_name'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>09.5&nbsp;<?php echo $this->lang->line('text256'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text256'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datevi" name="datevi" value="<?php echo isset($datevi) && $datevi != '' ? date('d-m-Y', strtotime($datevi)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datevi'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <!--=================================CHECKBOX===========================-->
                                    
                                         <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>09.6&nbsp;<?php echo $this->lang->line('text257'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text257'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%" data-toggle="buttons" style="background-color:transparent;border: none ">

                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(a)&nbsp;<?php echo $this->lang->line('text258'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
															
															 <input  class="form-control col-md-7 col-xs-12"  name="termination_service"  id="ts_A" value="Resign voluntarily" placeholder=""  type="radio" autocomplete="off"></td>
                                     
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(b)&nbsp;<?php echo $this->lang->line('text259'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
																<input class="form-control col-md-7 col-xs-12" name="termination_service" id="ts_B" value="Retirement" placeholder="" type="radio" autocomplete="off"></td>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(c)&nbsp;<?php echo $this->lang->line('text261'); ?></td>
                                                            <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="termination_service" id="ts_C" value="Receiving transfer" placeholder="" type="radio" autocomplete="off"></td>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(d)&nbsp;<?php echo $this->lang->line('text262'); ?></td>
                                                            <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="termination_service" id="ts_D" value=" Interdiction" placeholder="" type="radio" autocomplete="off"></td>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(e)&nbsp;<?php echo $this->lang->line('text263'); ?></td>
                                                            <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="termination_service" id="ts_E" value="Death" placeholder="" type="radio" autocomplete="off"></td>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(f)&nbsp;<?php echo $this->lang->line('text264'); ?></td>
                                                            <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="termination_service" id="ts_F" value="Disrobe" placeholder="" type="radio" autocomplete="off"></td>
                                                        </tr>



                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--=================================CHECKBOX===========================-->

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -125px;">
                                                <div class="item form-group">
                                                    <div>09.7&nbsp;<?php echo $this->lang->line('text265'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text265'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datevii" name="datevii" value="<?php echo isset($datevii) && $datevii != '' ? date('d-m-Y', strtotime($datevii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datevii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text267'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text267a'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- upload docs-->
                                        <div class="row instructions" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div style="font-size: 18px;"><strong><?php echo $this->lang->line('text231'); ?></strong></div>
                                                    <div class="help-block"><?php echo form_error('text231'); ?></div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <ul style="list-style: decimal; font-weight: 900">

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-9 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text268'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text268'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t2_doc1"  id="t2_doc1" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('t2_doc1'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -35px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text269'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text269'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 -sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t2_doc2"  id="t2_doc2" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('t2_doc2'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -35px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text270'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text270'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t2_doc3"  id="t2_doc3" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('t2_doc3'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -15px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text271'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text235'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t2_doc4"  id="t2_doc4" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('t2_doc4'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="col-md-12 col-sm-2 col-xs-12">
                                                        <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                            <div class="item form-group"> 
                                                                <div><?php echo $this->lang->line('text272'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text235'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-sm-2 col-xs-12">
                                                            <div class="item form-group">
                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="t2_doc5"  id="t2_doc5" type="file" >
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                                                <div class="help-block"><?php echo form_error('t2_doc5'); ?></div>
                                                            </div>
                                                        </div>
                                                    </li>



                                                </ul>
                                            </div>
                                        </div>


                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>&nbsp;<?php echo $this->lang->line('text273'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text273'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateviii" name="dateviii" value="<?php echo isset($dateviii) && $dateviii != '' ? date('d-m-Y', strtotime($dateviii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" required="required" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('dateviii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label ><?php echo $this->lang->line('text273a'); ?></label>                                         
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="t2_kruthy_sig1"  id="t2_kruthy_sig1"  type="file">
                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('k_approval1'); ?></div>

                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                   
                             
						
						            <!--== tab_sec ===============================================================================================================================-->

                                    <div class="tab-pane fade in" id="tab_sec">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('part3'); ?></strong></h5>
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('text274'); ?></strong></h5>
                                            </div>

                                        </div>
                                        <br>										
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text275'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text275'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12" name="kpiriven_name1"  id="kpiriven_name1" value="<?php echo isset($schools->piriname) ? $schools->piriname : ''; ?>" placeholder="<?php echo $this->lang->line('school_name'); ?>"  type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('kpiriven_name1'); ?></div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text276'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text276'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12" name="kcount"  id="kcount" value="<?php echo isset($post['kcount']) ? $post['kcount'] : ''; ?>" placeholder="<?php echo $this->lang->line('count1'); ?>"  type="number" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-10 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text277'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text277'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateix" name="dateix" value="<?php echo isset($dateix) && $dateix != '' ? date('d-m-Y', strtotime($dateix)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('dateix'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text278'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="officer_sig1"  id="officer_sig1"  type="file">
                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text278'); ?></div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text279'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="zonal_sig1"  id="zonal_sig1"  type="file">

                                                    </div>


                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('rubber_stamp'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="zonalstamp_sig2"  id="zonalstamp_sig2"  type="file">

                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text278'); ?></div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-1 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -15px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text279a'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text279a'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12" name="datex"  id="add_datex" value="<?php echo isset($post['datex']) ? $post['datex'] : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>"  type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('datex'); ?></div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -65px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text280'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text280'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12" name="zonal_office"  id="zonal_office" value="<?php echo isset($post['zonal_office']) ? $post['zonal_office'] : ''; ?>" placeholder=""  type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('zonal_office'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="ln_solid"></div>

										<!--////////////////province//////////////////////////////////////////////////-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('text281'); ?></strong></h5>
                                            </div>

                                        </div>
                                        <br>										
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text282'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text282'); ?></div>
                                                </div>
                                            </div>

                                               <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <select  class="form-control col-md-7 col-xs-12" name="asst_province_type" id="asst_province_type">
														<option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                        <?php $asst_provice_types = get_en_type(); ?>
                                                <?php foreach ($asst_provice_types as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['asst_provice_type']) && $post['asst_provice_type'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                    <div class="help-block"><?php echo form_error('person1'); ?></div>
                                                </div>
                                            </div>	

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12" name="asst_province_name"  id="asst_province_name" value="<?php echo isset($post['asst_province_name']) ? $post['asst_province_name'] : ''; ?>" placeholder=""  type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('asst_province_name'); ?></div>
                                                </div>
                                            </div>



                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text282a'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text282a'); ?></div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12" name="asst_province_pname"  id="asst_province_pname" value="<?php echo isset($schools->piriname) ? $schools->piriname : ''; ?>"  placeholder="<?php echo $this->lang->line('school_name'); ?>"  type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('asst_province_pname'); ?></div>
                                                </div>
                                            </div>

                                           

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -85px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text283'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text283'); ?></div>
                                                </div>
                                            </div>
											
											   <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <select  class="form-control col-md-7 col-xs-12" name="recommendation" id="recommendation">
                                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                
														
														 <?php $recommendations = get_recommendation(); ?>
                                                <?php foreach ($recommendations as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['recommendation']) && $post['recommendation'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                    <div class="help-block"><?php echo form_error('person1'); ?></div>
                                                </div>
                                            </div>

                                        </div>
                                   


                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexi" name="datexi" value="<?php echo isset($datexi) && $datexi != '' ? date('d-m-Y', strtotime($datexi)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexi'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text284'); ?> </label>                                           
                                                    <label for="photo"> <?php echo $this->lang->line('text284a'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="asst_province_sig1"  id="asst_province_sig1"  type="file">
                                                    </div>

                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('rubber_stamp'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="asst_provincestamp_sig2"  id="asst_provincestamp_sig2"  type="file">
                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text284'); ?></div>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
						
						
						             <!--== tab_third =============================================================================================================================-->

                                    <div class="tab-pane fade in" id="tab_third">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('part4'); ?></strong></h5>
                                                <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('text285'); ?></strong></h5>
                                            </div>

                                        </div>
                                        <br>										
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text286'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text286'); ?></div>
                                                </div>
                                            </div>	

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12" name="min_piriven_name"  id="min_piriven_name" value="<?php echo isset($schools->piriname) ? $schools->piriname : ''; ?>"  placeholder="<?php echo $this->lang->line('school_name'); ?>"  type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('min_piriven_name'); ?></div>
                                                </div>
                                            </div>

                                         <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <select  class="form-control col-md-7 col-xs-12" name="true_not" id="true_not">
                                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>    
											        <?php $true_nots = get_ture_not(); ?>
                                                    <?php foreach ($true_nots as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['true_not']) && $post['true_not'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                           
                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -95px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text287'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text287'); ?></div>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexii" name="datexii" value="<?php echo isset($datexii) && $datexii != '' ? date('d-m-Y', strtotime($datexii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text288'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="edu_clerk_sig1"  id="edu_clerk_sig1"  type="file">
                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text288'); ?></div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <div class="row" style="font-size: 16px;">

                                            <!--<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -115px;">
                                                    <div class="item form-group">
                                                            <div><?php echo $this->lang->line('text289'); ?></div>
                                                            <div class="help-block"><?php echo form_error('text289'); ?></div>
                                                    </div>
                                            </div>-->

                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <select  class="form-control col-md-7 col-xs-12" name="approved_not" id="approved_not">
                                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
														    <?php $approved_nots = get_approval(); ?>
                                                    <?php foreach ($approved_nots as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['approved_not']) && $post['approved_not'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="help-block"><?php echo form_error('approved_not'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexiii" name="datexiii" value="<?php echo isset($datexiii) && $datexiii != '' ? date('d-m-Y', strtotime($datexiii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexiii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text290'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="asdic_sig"  id="asdic_sig"  type="file">
                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text290'); ?></div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -95px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text291'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text291'); ?></div>
                                                </div>
                                            </div>


                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <select  class="form-control col-md-7 col-xs-12" name="submition" id="submition">
                                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
														<?php $submitions =get_submition(); ?>
                                                    <?php foreach ($submitions as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['submition']) && $post['submition'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -115px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text291a'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text291a'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexiv" name="datexiv" value="<?php echo isset($datexiv) && $datexiv != '' ? date('d-m-Y', strtotime($datexiv)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexiv'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text292'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="commitee_mem_sig"  id="commitee_mem_sig"  type="file">
                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text292'); ?></div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <div class="row" style="font-size: 16px;">



                                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <select  class="form-control col-md-7 col-xs-12" name="given_not" id="given_not">
                                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
														<?php $given_nots = get_given_not(); ?>
                                                    <?php foreach ($given_nots as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php
                                                    if (isset($post['given_not']) && $post['given_not'] == $key) {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $value; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                <div class="item form-group">
                                                    <div><?php echo $this->lang->line('text293'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text293'); ?></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-1 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div><?php echo $this->lang->line('text294'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text294'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="min_note"  id="min_note" value="<?php echo isset($post['min_note']) ? $post['min_note'] : ''; ?>" placeholder=""></textarea>
                                                    <div class="help-block"><?php echo form_error('min_note'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexv" name="datexv" value="<?php echo isset($datexv) && $datexv != '' ? date('d-m-Y', strtotime($datexv)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexv'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">

                                                    <label for="photo"> <?php echo $this->lang->line('text295'); ?> </label>                                           
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="min_director_sig"  id="min_director_sig"  type="file">
                                                    </div>
                                                    <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                    <div class="help-block"><?php echo form_error('text295'); ?></div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <div class="row" style="border: 2px solid #73879C; margin: 2px">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px; text-align: center;">
                                                    <div class="item form-group">
                                                        <div><h3 style="font-size: 20px;text-decoration: underline;"><strong><?php echo $this->lang->line('text296'); ?></strong></h3></div>
                                                        <div class="help-block"><?php echo form_error('text296'); ?></div>
                                                    </div>
                                                </div>	
                                            </div>

                                            <div class="row" style="font-size: 16px; margin: 0px 2px">

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">

                                                        <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
                                                            <div class="item form-group">
                                                                <div><?php echo $this->lang->line('text297'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text297'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                            <div class="item form-group">
                                                                <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_received_datexvi" name="received_datexvi" value="<?php echo isset($received_datexvi) && $received_datexvi != '' ? date('d-m-Y', strtotime($received_datexvi)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo $this->lang->line('received_datexv'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">

                                                        <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
                                                            <div class="item form-group">
                                                                <div><?php echo $this->lang->line('text298'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text298'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                            <div class="item form-group">
                                                                <input  class="form-control col-md-7 col-xs-12" name="sub_no"  id="sub_no" value="<?php echo isset($post['sub_no']) ? $post['sub_no'] : ''; ?>" placeholder=""  type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('sub_no'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row" style="font-size: 16px; margin: 0px 2px">

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">

                                                        <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                            <div class="item form-group">
                                                                <div><?php echo $this->lang->line('text299'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text299'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                            <div class="item form-group">


                                                                <div class="btn btn-default btn-file">
                                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="accepted_sig1"  id="accepted_sig1"  type="file">
                                                                </div>
                                                                <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                                <div class="help-block"><?php echo form_error('text297'); ?></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">

                                                        <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
                                                            <div class="item form-group">
                                                                <div><?php echo $this->lang->line('text300'); ?>:-</div>
                                                                <div class="help-block"><?php echo form_error('text300'); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                            <div class="item form-group">
                                                                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="reply"  id="reply" value="<?php echo isset($post['reply']) ? $post['reply'] : ''; ?>" placeholder=""></textarea>
                                                                <div class="help-block"><?php echo form_error('reply'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                    </div>
					
						


                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($schools) ? $schools->id : $id; ?>" name="school_id" id="school_id" />
                                        <a  href="<?php echo site_url('forms/formsapply/teacherapplicationform'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                             <?php echo form_close(); ?>
                            </div>

                        </div>


                             <?php if (isset($edit)) { ?>

                            <div class="tab-pane fade in active" id="tab_edit_teacherapplication">
                                <div class="x_content"> 


                            <?php echo form_open_multipart(site_url('forms/formsapply/teacherapplicationformedit/' . $forms->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <ul  class="nav nav-tabs bordered">
                                        <li  class="active" ><a href="#edit_tab_zero"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('pirven_fir'); ?></a> </li>

                                        <li><a href="#edit_tab_first"   role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_sec'); ?></a> </li>                          

                                        <li><a href="#edit_tab_sec"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_third'); ?></a> </li>                          

                                        <li ><a href="#edit_tab_third"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_forth'); ?></a> </li>

                                        <li ><a href="#edit_tab_forth"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_five'); ?></a> </li>

                                    </ul>
                                    <br>


                                    <div class="tab-content">
                                       <!--== tab_zero =============================================================================================================================-->

                                        <div class="tab-pane fade in active" id="edit_tab_zero">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h4  class="column-title" style="text-align:center; font-size: 20px; text-decoration: underline"><strong><?php echo $this->lang->line('text200'); ?></strong></h4>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('part1'); ?></strong></h5>
                                                    <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('text201'); ?></strong></h5>
                                                </div>

                                            </div>

                                            <div class="row" style="font-size: 16px;">

                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -12px;">
                                                    <div class="item form-group">
                                                        <div>01.&nbsp;<?php echo $this->lang->line('text202'); ?>:-</div>
                                                        <div class="help-block"><?php echo form_error('text202'); ?></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                    <div class="item form-group">
                                                        <select  class="form-control col-md-7 col-xs-12" name="type" id="type" style="font-size:17px;">
                                                                <!--<option value="" style="text-align: center; font-weight: 700"><?php echo $forms->type; ?></option>-->
                                                      <option value="">--<?php echo $this->lang->line('select1'); ?>--</option> 
                                                    <?php $type = get_type(); ?>
                                                    <?php foreach ($type as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>" <?php
                                                        if ($forms->type == $key) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>><?php echo $value; ?></option>
                                                            <?php } ?>

                                                        </select>
                                                        <div class="help-block"><?php echo form_error('type'); ?></div>
                                                    </div>
                                                </div>
									

                                                <div class="col-md-6 col-sm-2 col-xs-12">
                                                    <div class="item form-group">

                                                        <input  class="form-control col-md-7 col-xs-12"  name="initial_name_s"  id="initial_name_s" value="<?php echo isset($forms->initial_name_s) ? $forms->initial_name_s : ''; ?>" placeholder="<?php echo $this->lang->line('initial_name_s'); ?>"  type="text" autocomplete="off">
                                                        <div class="help-block"><?php echo form_error('initial_name_s'); ?></div>
                                                    </div>
                                                </div>




                                            </div>
											
											<div class="row" style="font-size: 16px;">

                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                                <div class="item form-group">
                                                    <div>02.&nbsp;<?php echo $this->lang->line('text203'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text203'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													 <input  class="form-control col-md-7 col-xs-12"  name="full_name_s"  id="full_name_s" value="<?php echo isset($forms->full_name_s) ? $forms->full_name_s : ''; ?>" placeholder="<?php echo $this->lang->line('full_name_s'); ?>"  type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('applicant_s_name'); ?></div>
                                                </div>
                                            </div>

                                        </div>
											
											 <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>03.&nbsp;<?php echo $this->lang->line('text204'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text204'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="initial_name_e"  id="initial_name_e" value="<?php echo isset($forms->initial_name_e) ? $forms->initial_name_e : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('initial_name_e'); ?></div>
                                                </div>
                                            </div>

                                        </div>
											
											 <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>04.&nbsp;&nbsp;<?php echo $this->lang->line('birth_date'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('birth_date'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    
                                                 <input  class="form-control col-md-7 col-xs-12"  name="datei"  id="edit_datei" value="<?php echo isset($forms->datei) ?  date('d-m-Y', strtotime($forms->datei)) : ''; ?>" placeholder="<?php echo $this->lang->line('datei'); ?>" type="text" autocomplete="off">
																			
												  <!-- <input  class="form-control col-md-7 col-xs-12"  name="datei"  id="edit_datei"
													value="<?php
												 if($forms->datei !='1970-01-01') {
													 echo date('d-m-Y', strtotime($forms->datei));
												 } 
												 else echo ''; ?>" 
												 placeholder="<?php echo $this->lang->line('birth_date'); ?>" type="text" autocomplete="off">-->	
                                                    <div class="help-block"><?php echo $this->lang->line('datei'); ?></div>
                                                </div>
                                            </div>

                                        </div>
											
											 <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>05.&nbsp;<?php echo $this->lang->line('text205'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text205'); ?></div>
                                                </div>
                                            </div>

                                           <!-- <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="nationality"  id="nationality" value="<?php echo isset($forms->nationality) ? $forms->nationality : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('nationality'); ?></div>
                                                </div>
                                            </div>-->

                                        </div>
											
											 <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>06.&nbsp;<?php echo $this->lang->line('text206a'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text206a'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="nic_no"  id="nic_no" value="<?php echo isset($forms->nic_no) ? $forms->nic_no : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('nic_no'); ?></div>
                                                </div>
                                            </div>

                                        </div>
											
											<div class="row" style="font-size: 16px;">
                                            <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>07.&nbsp;&nbsp;<?php echo $this->lang->line('text206'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text206'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="red_address"  id="red_address" placeholder="<?php echo $this->lang->line('text206'); ?>"><?php echo isset($forms->red_address) ? $forms->red_address : ''; ?></textarea>
                                                    <div class="help-block"><?php echo form_error('red_address'); ?></div>
                                                </div>
                                            </div>
                                        </div>
											
											<div class="row" style="font-size: 16px;">
                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>08.&nbsp;&nbsp;<?php echo $this->lang->line('text207'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text207'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
													<label class="col-md-4 col-sm-3 col-xs-12" for="phone">08.1&nbsp;&nbsp;<?php echo $this->lang->line('text207a'); ?>&nbsp;&nbsp;:-
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input  class="form-control col-md-7 col-xs-12"  name="mobile_no"  id="mobile_no" value="<?php echo isset($forms->mobile_no) ?  $forms->mobile_no : ''; ?>" placeholder="<?php echo $this->lang->line('mobile_no'); ?>" type="text" autocomplete="off">
                                                      <div class="help-block"><?php echo form_error('mobile_no'); ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <label class="col-md-5 col-sm-3 col-xs-12" for="phone">08.2&nbsp;&nbsp;<?php echo $this->lang->line('text207b'); ?>&nbsp;&nbsp;:-
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input  class="form-control col-md-7 col-xs-12"  name="whatsapp_no"  id="whatsapp_no" value="<?php echo isset($forms->whatsapp_no) ?  $forms->whatsapp_no: ''; ?>" placeholder="<?php echo $this->lang->line('whatsapp_no'); ?>" type="text" autocomplete="off">
                                                      <div class="help-block"><?php echo form_error('whatsapp_no'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                            
                                        </div>
											
											 <div class="row" style="font-size: 16px;">

                                            <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                <div class="item form-group">
                                                    <div>09.&nbsp;<?php echo $this->lang->line('text208'); ?>:-</div>
                                                    <div class="help-block"><?php echo form_error('text208'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="e_mail"  id="e_mail" value="<?php echo isset($forms->e_mail) ? $forms->e_mail : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('e-mail'); ?></div>
                                                </div>
                                            </div>

                                        </div>
                                      
                                        <div class="row" style="font-size: 16px;">
                                            <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                                <div class="item form-group"> 
                                                    <div>10.&nbsp;&nbsp;<?php echo $this->lang->line('text209'); ?> :-</div>
                                                    <div class="help-block"><?php echo form_error('text209'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                   
													 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_name"  id="piriven_name" placeholder="<?php echo $this->lang->line('text206'); ?>"><?php echo isset($forms->piriven_name) ? $forms->piriven_name : ''; ?></textarea>
                                                    <div class="help-block"><?php echo form_error('piriven_name'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_address"  id="piriven_address"  placeholder="<?php echo $this->lang->line('school_address'); ?>"><?php echo isset($forms->piriven_address) ? $forms->piriven_address : ''; ?></textarea>
                                                    <div class="help-block"><?php echo form_error('piriven_address'); ?></div>
                                                </div>
                                            </div>
                            
                                        </div>
											
											
											  <!--= 1=-->
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group dataTables_wrapper">
                                                    <div for="national_id">11. <?php echo $this->lang->line('text209a'); ?>&nbsp;:-</div>
                                                    <label for="national_id">11.1 <?php echo $this->lang->line('text210'); ?></label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_1container" cellspacing="0" width="100%">

                                                        <tr>

                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text211'); ?></th>
                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text212'); ?></th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="year1"  id="year1" value="<?php echo isset($forms->year1) ? $forms->year1 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year1'); ?></div>
                                                                    </div>
                                                                </div>

                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="year2"  id="year2" value="<?php echo isset($forms->year2) ? $forms->year2 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_no1"  id="exam_no1" value="<?php echo isset($forms->exam_no1) ? $forms->exam_no1 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_no1'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_no2"  id="exam_no2" value="<?php echo isset($forms->exam_no2) ? $forms->exam_no2 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_no2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>

                                                        </tr>


                                                        <tr>
                                                            <td>01</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub1"  id="ex1_sub1" value="<?php echo isset($forms->ex1_sub1) ? $forms->ex1_sub1 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub1_grade"  id="ex1_sub1_grade" value="<?php echo isset($forms->ex1_sub1_grade) ? $forms->ex1_sub1_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub1_grade'); ?></div>
                                                            </td>

                                                            <td>01</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub1"  id="ex2_sub1" value="<?php echo isset($forms->ex2_sub1) ? $forms->ex2_sub1 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub1_grade"  id="ex2_sub1_grade" value="<?php echo isset($forms->ex2_sub1_grade) ? $forms->ex2_sub1_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub1_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>02</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub2"  id="ex1_sub2"value="<?php echo isset($forms->ex1_sub2) ? $forms->ex1_sub2 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub2_grade"  id="ex1_sub2_grade" value="<?php echo isset($forms->ex1_sub2_grade) ? $forms->ex1_sub2_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub2_grade'); ?></div>
                                                            </td>


                                                            <td>02</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub2"  id="ex2_sub2" value="<?php echo isset($forms->ex2_sub2) ? $forms->ex2_sub2 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub2_grade"  id="ex2_sub2_grade" value="<?php echo isset($forms->ex2_sub2_grade) ? $forms->ex2_sub2_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub2_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>03</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub3"  id="ex1_sub3" value="<?php echo isset($forms->ex1_sub3) ? $forms->ex1_sub3 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub3_grade"  id="ex1_sub3_grade" value="<?php echo isset($forms->ex1_sub3_grade) ? $forms->ex1_sub3_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub3_grade'); ?></div>
                                                            </td>

                                                            <td>03</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub3"  id="ex2_sub3" value="<?php echo isset($forms->ex2_sub3) ? $forms->ex2_sub3 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub3_grade"  id="ex2_sub3_grade" value="<?php echo isset($forms->ex2_sub3_grade) ? $forms->ex2_sub3_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub3_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>04</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub4"  id="ex1_sub4" value="<?php echo isset($forms->ex1_sub4) ? $forms->ex1_sub4 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub4_grade"  id="ex1_sub4_grade" value="<?php echo isset($forms->ex1_sub4_grade) ? $forms->ex1_sub4_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub4_grade'); ?></div>
                                                            </td>

                                                            <td>04</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub4"  id="ex2_sub4" value="<?php echo isset($forms->ex2_sub4) ? $forms->ex2_sub4 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub4_grade"  id="ex2_sub4_grade" value="<?php echo isset($forms->ex2_sub4_grade) ? $forms->ex2_sub4_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub4_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>05</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub5"  id="ex1_sub5" value="<?php echo isset($forms->ex1_sub5) ? $forms->ex1_sub5 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub5'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub5_grade"  id="ex1_sub5_grade" value="<?php echo isset($forms->ex1_sub5_grade) ? $forms->ex1_sub5_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub5_grade'); ?></div>
                                                            </td>

                                                            <td>05</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub5"  id="ex2_sub5" value="<?php echo isset($forms->ex2_sub5) ? $forms->ex2_sub5 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub5_grade"  id="ex2_sub5_grade" value="<?php echo isset($forms->ex2_sub5_grade) ? $forms->ex2_sub5_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub5_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>06</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub6"  id="ex1_sub6" value="<?php echo isset($forms->ex1_sub6) ? $forms->ex1_sub6 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub6_grade"  id="ex1_sub6_grade" value="<?php echo isset($forms->ex1_sub6_grade) ? $forms->ex1_sub6_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub6_grade'); ?></div>
                                                            </td>

                                                            <td>06</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub6"  id="ex2_sub6" value="<?php echo isset($forms->ex2_sub6) ? $forms->ex2_sub6 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub6_grade"  id="ex2_sub6_grade" value="<?php echo isset($forms->ex2_sub6_grade) ? $forms->ex2_sub6_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub6_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>07</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub7"  id="ex1_sub7" value="<?php echo isset($forms->ex1_sub7) ? $forms->ex1_sub7 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub7_grade"  id="ex1_sub7_grade" value="<?php echo isset($forms->ex1_sub7_grade) ? $forms->ex1_sub7_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub7_grade'); ?></div>
                                                            </td>

                                                            <td>07</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub7"  id="ex2_sub7" value="<?php echo isset($forms->ex2_sub7) ? $forms->ex2_sub7 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub7_grade"  id="ex2_sub7_grade" value="<?php echo isset($forms->ex2_sub7_grade) ? $forms->ex2_sub7_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub7_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>08</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub8"  id="ex1_sub8" value="<?php echo isset($forms->ex1_sub8) ? $forms->ex1_sub8 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub8_grade"  id="ex1_sub8_grade" value="<?php echo isset($forms->ex1_sub8_grade) ? $forms->ex1_sub8_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub8_grade'); ?></div>
                                                            </td>

                                                            <td>08</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub8"  id="ex2_sub8" value="<?php echo isset($forms->ex2_sub8) ? $forms->ex2_sub8 : ''; ?>" placeholder="" type="text" autocomplete="off"
                                                                <div class="help-block"><?php echo form_error('ex2_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub8_grade"  id="ex2_sub8_grade" value="<?php echo isset($forms->ex2_sub8_grade) ? $forms->ex2_sub8_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub8_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>09</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub9"  id="ex1_sub9"value="<?php echo isset($forms->ex1_sub9) ? $forms->ex1_sub9 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub9_grade"  id="ex1_sub9_grade" value="<?php echo isset($forms->ex1_sub9_grade) ? $forms->ex1_sub9_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub9_grade'); ?></div>
                                                            </td>

                                                            <td>09</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub9"  id="ex2_sub9" value="<?php echo isset($forms->ex2_sub9) ? $forms->ex2_sub9 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub9_grade"  id="ex2_sub9_grade" value="<?php echo isset($forms->ex2_sub9_grade) ? $forms->ex2_sub9_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub9_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub10"  id="ex1_sub10" value="<?php echo isset($forms->ex1_sub10) ? $forms->ex1_sub10 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex1_sub10_grade"  id="ex1_sub10_grade" value="<?php echo isset($forms->ex1_sub10_grade) ? $forms->ex1_sub10_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex1_sub10_grade'); ?></div>
                                                            </td>

                                                            <td>10</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub10"  id="ex2_sub10" value="<?php echo isset($forms->ex2_sub10) ? $forms->ex2_sub10 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="ex2_sub10_grade"  id="ex2_sub10_grade" value="<?php echo isset($forms->ex2_sub10_grade) ? $forms->ex2_sub10_grade : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('ex2_sub10_grade'); ?></div>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        <!--END OF =1=-->
									
									<!--= 2=-->
                                        <div class="row" style="font-size: 16px;">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group dataTables_wrapper">
                                                    <label for="national_id">11.2 <?php echo $this->lang->line('text217'); ?></label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_2container" cellspacing="0" width="100%">
                                                        <tr>

                                                            <th colspan="6">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text218'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_name"  id="exam_name" value="<?php echo isset($forms->exam_name) ? $forms->exam_name : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_name'); ?></div>
                                                                    </div>
                                                                </div>

                                                            </th>

                                                        </tr>
                                          
														<tr>

                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text219'); ?></th>
                                                            <th colspan="3" style="text-align: center"><?php echo $this->lang->line('text220'); ?></th>

                                                        </tr>
                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="year_h1"  id="year_h1" value="<?php echo isset($forms->year_h1) ? $forms->year_h1 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year_h1'); ?></div>
                                                                    </div>
                                                                </div>

                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('tea_year'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="year_h2"  id="year_h2" value="<?php echo isset($forms->year_h2) ? $forms->year_h2 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('year_h2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
														    <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_noh1"  id="exam_noh1" value="<?php echo isset($forms->exam_noh1) ? $forms->exam_noh1 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_noh1'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text213'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="exam_noh2"  id="exam_noh2" value="<?php echo isset($forms->exam_noh2) ? $forms->exam_noh2 : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo form_error('exam_noh2'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>

                                                        <tr>

                                                            <th colspan="3">
                                                                <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text221'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="datehi"  id="edit_datehi" value="<?php echo isset($forms->datehi) ? $forms->datehi : ''; ?>" placeholder="<?php echo $this->lang->line('datehi'); ?>" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo $this->lang->line('datehi'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                                                    <div class="item form-group">
                                                                        <div><?php echo $this->lang->line('text221'); ?>:-</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8 col-sm-2 col-xs-12">
                                                                    <div class="item form-group">
                                                                        <input  class="form-control col-md-7 col-xs-12"  name="datehii"  id="add_datehii" value="<?php echo isset($forms->datehii) ? $forms->datehii : ''; ?>" placeholder="<?php echo $this->lang->line('datehii'); ?>" type="text" autocomplete="off">
                                                                        <div class="help-block"><?php echo $this->lang->line('datehii'); ?></div>
                                                                    </div>
                                                                </div>
                                                            </th>

                                                        </tr>
														
														 <tr>

                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>

                                                        </tr>


                                                        <tr>
                                                            <td>01</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub1"  id="hex1_sub1" value="<?php echo isset($post['hex1_sub1']) ? $post['hex1_sub1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub1_grade"  id="hex1_sub1_grade" value="<?php echo isset($post['hex1_sub1_grade']) ? $post['hex1_sub1_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub1_grade'); ?></div>
                                                            </td>

                                                            <td>01</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub1"  id="hex2_sub1" value="<?php echo isset($post['hex2_sub1']) ? $post['hex2_sub1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub1_grade"  id="hex2_sub1_grade" value="<?php echo isset($post['hex2_sub1_grade']) ? $post['hex2_sub1_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub1_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>02</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub2"  id="hex1_sub2" value="<?php echo isset($post['hex1_sub2']) ? $post['hex1_sub2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub2_grade"  id="hex1_sub2_grade" value="<?php echo isset($post['hex1_sub2_grade']) ? $post['hex1_sub2_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub2_grade'); ?></div>
                                                            </td>


                                                            <td>02</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub2"  id="hex2_sub2" value="<?php echo isset($post['hex2_sub2']) ? $post['hex2_sub2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub2'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub2_grade"  id="hex2_sub2_grade" value="<?php echo isset($post['hex2_sub2_grade']) ? $post['hex2_sub2_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub2_grade'); ?></div>
                                                            </td>
                                                        </tr>
														
													    <tr>
                                                            <td>03</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub3"  id="hex1_sub3" value="<?php echo isset($post['hex1_sub3']) ? $post['hex1_sub3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub3_grade"  id="hex1_sub3_grade" value="<?php echo isset($post['hex1_sub3_grade']) ? $post['hex1_sub3_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub3_grade'); ?></div>
                                                            </td>

                                                            <td>03</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub3"  id="hex2_sub3" value="<?php echo isset($post['hex2_sub3']) ? $post['hex2_sub3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub3'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub3_grade"  id="hex2_sub3_grade" value="<?php echo isset($post['hex2_sub3_grade']) ? $post['hex2_sub3_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub3_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>04</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub4"  id="hex1_sub4" value="<?php echo isset($post['hex1_sub4']) ? $post['hex1_sub4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub4_grade"  id="hex1_sub4_grade" value="<?php echo isset($post['hex1_sub4_grade']) ? $post['hex1_sub4_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub4_grade'); ?></div>
                                                            </td>

                                                            <td>04</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub4"  id="hex2_sub4" value="<?php echo isset($post['hex2_sub4']) ? $post['hex2_sub4'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub4_grade"  id="hex2_sub4_grade" value="<?php echo isset($post['hex2_sub4_grade']) ? $post['hex2_sub4_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub4_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>05</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub5"  id="hex1_sub5" value="<?php echo isset($post['hex1_sub5']) ? $post['hex1_sub5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub5'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub5_grade"  id="hex1_sub5_grade" value="<?php echo isset($post['hex1_sub5_grade']) ? $post['hex1_sub5_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub5_grade'); ?></div>
                                                            </td>

                                                            <td>05</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub5"  id="hex2_sub5" value="<?php echo isset($post['hex2_sub5']) ? $post['hex2_sub5'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub4'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub5_grade"  id="hex2_sub5_grade" value="<?php echo isset($post['hex2_sub5_grade']) ? $post['hex2_sub5_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub5_grade'); ?></div>
                                                            </td>
                                                        </tr>
														
														<tr>
                                                            <td>06</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub6"  id="hex1_sub6" value="<?php echo isset($post['hex1_sub6']) ? $post['hex1_sub6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub6_grade"  id="hex1_sub6_grade" value="<?php echo isset($post['hex1_sub1_grade']) ? $post['hex1_sub6_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub6_grade'); ?></div>
                                                            </td>

                                                            <td>06</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub6"  id="hex2_sub6" value="<?php echo isset($post['hex2_sub6']) ? $post['hex2_sub6'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub6'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub6_grade"  id="hex2_sub6_grade" value="<?php echo isset($post['hex2_sub1_grade']) ? $post['hex2_sub6_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub6_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>07</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub7"  id="hex1_sub7" value="<?php echo isset($post['hex1_sub7']) ? $post['hex1_sub7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub7_grade"  id="hex1_sub7_grade" value="<?php echo isset($post['hex1_sub7_grade']) ? $post['hex1_sub7_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub7_grade'); ?></div>
                                                            </td>

                                                            <td>07</td>
                                                            <td>

                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub7"  id="hex2_sub7" value="<?php echo isset($post['hex2_sub7']) ? $post['hex2_sub7'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub7'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub7_grade"  id="hex2_sub7_grade" value="<?php echo isset($post['hex2_sub7_grade']) ? $post['hex2_sub7_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub7_grade'); ?></div>
                                                            </td>
                                                        </tr>
														
														
														<tr>
                                                            <td>08</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub8"  id="hex1_sub8" value="<?php echo isset($post['hex1_sub8']) ? $post['hex1_sub8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub8_grade"  id="hex1_sub8_grade" value="<?php echo isset($post['hex1_sub8_grade']) ? $post['hex1_sub8_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub8_grade'); ?></div>
                                                            </td>

                                                            <td>08</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub8"  id="hex2_sub8" value="<?php echo isset($post['hex2_sub8']) ? $post['hex2_sub8'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub8'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub8_grade"  id="hex2_sub8_grade" value="<?php echo isset($post['hex2_sub8_grade']) ? $post['hex2_sub8_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub8_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>09</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub9"  id="hex1_sub9" value="<?php echo isset($post['hex1_sub9']) ? $post['hex1_sub9'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub9_grade"  id="hex1_sub9_grade" value="<?php echo isset($post['hex1_sub9_grade']) ? $post['hex1_sub9_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub9_grade'); ?></div>
                                                            </td>

                                                            <td>09</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub9"  id="hex2_sub9" value="<?php echo isset($post['hex2_sub9']) ? $post['hex2_sub9'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub9'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub9_grade"  id="hex2_sub9_grade" value="<?php echo isset($post['hex2_sub9_grade']) ? $post['hex2_sub9_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub9_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub10"  id="hex1_sub10" value="<?php echo isset($post['hex1_sub10']) ? $post['hex1_sub10'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex1_sub10_grade"  id="hex1_sub10_grade" value="<?php echo isset($post['hex1_sub10_grade']) ? $post['hex1_sub10_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex1_sub10_grade'); ?></div>
                                                            </td>

                                                            <td>10</td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub10"  id="hex2_sub10" value="<?php echo isset($post['hex2_sub10']) ? $post['hex2_sub10'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub1'); ?></div>
                                                            </td>
                                                            <td>
                                                                <input  class="form-control col-md-7 col-xs-12"  name="hex2_sub10_grade"  id="hex2_sub10_grade" value="<?php echo isset($post['hex2_sub10_grade']) ? $post['hex2_sub10_grade'] : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('hex2_sub10_grade'); ?></div>
                                                            </td>
                                                        </tr>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
									    <!--END OF =2=-->
									









                                        </div>
										</div>
										
										
										

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">

                                                            <!--<input type="hidden" name="school_id" id="school_id" value="<?php echo isset($schools) ? $schools->id : $id; ?>" />-->
                                                <input type="hidden" name="schlform_id" id="schlform_id" value="<?php echo $forms->id; ?>" />
                                                <a href="<?php echo site_url('forms/formsapply/teacherapplicationform'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                                <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                            </div>
                                        </div>
                                <?php echo form_close(); ?>
                                    </div>
                                </div>     </div>                      
                            <?php } ?>

                                    <?php if (isset($detail)) { ?>
                                <div class="tab-pane fade in active" id="tab_view_teacherapplicationform">
                                    <div class="x_content"> 
                                <?php $this->load->view('teacherapplication/get-single-teacher-application-form'); ?>
                                    </div>
                                </div>
<?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-teacherapplicationform-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_teacherapplicationform_data">

            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_teacherapplicationform_modal(teacherapplicationform_id) {

        $('.fn_teacherapplicationform_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('forms/formsapply/get_single_teacher_application_form'); ?>",
            data: {teacherapplicationform_id: teacherapplicationform_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_teacherapplicationform_data').html(response);
                }
            }
        });
    }
</script>

<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>

<link href="<?php echo VENDOR_URL; ?>timepicker/timepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>timepicker/timepicker.js"></script>
<!-- datatable with buttons -->
<script type="text/javascript">

	
	 $('#add_year1').datepicker({
      viewMode: 'years',
       startView: 2,
      format: 'yyyy'
  });
//  $('#edit_session_start').datepicker({
//      viewMode: 'years',
//       startView: 'year', 
//       minViewMode: 'months',
//      format: 'MM yyyy'
//  });
	
	$('#add_year2').datepicker({
      viewMode: 'years',
       startView: 2,
      format: 'yyyy'
  });
	
	 $('#add_year_h1').datepicker({
      viewMode: 'years',
       startView: 2,
      format: 'yyyy'
  });
	
	 $('#add_year_h2').datepicker({
      viewMode: 'years',
       startView: 2,
      format: 'yyyy'
  });


    $('#add_datei').datepicker({startView: 2});
    $('#add_dateii').datepicker({startView: 2});
    $('#add_dateiii').datepicker({startView: 2});
    $('#add_dateiv').datepicker({startView: 2});
    $('#add_datev').datepicker({startView: 2});
    $('#add_datevi').datepicker({startView: 2});
    $('#add_datevii').datepicker({startView: 2});
    $('#add_dateviii').datepicker({startView: 2});
    $('#add_dateix').datepicker({startView: 2});
    $('#add_datex').datepicker({startView: 2});
    $('#add_datexi').datepicker({startView: 2});
    $('#add_datexii').datepicker({startView: 2});
    $('#add_datexiii').datepicker({startView: 2});
    $('#add_datexiv').datepicker({startView: 2});
    $('#add_datexv').datepicker({startView: 2});
    $('#add_received_datexvi').datepicker({startView: 2});
    $('#add_datehi').datepicker({startView: 2});
    $('#add_datehii').datepicker({startView: 2});

    $('#edit_datei').datepicker({startView: 2});
    $('#edit_dateii').datepicker({startView: 2});
    $('#edit_dateiii').datepicker({startView: 2});
    $('#edit_dateiv').datepicker({startView: 2});
    $('#edit_datev').datepicker({startView: 2});
    $('#edit_datevi').datepicker({startView: 2});
    $('#edit_datevii').datepicker({startView: 2});
    $('#edit_dateviii').datepicker({startView: 2});
    $('#edit_dateix').datepicker({startView: 2});


    $('#add_time1_from').timepicker();
    $('#add_time1_to').timepicker();
    $('#add_time2_from').timepicker();
    $('#add_time2_to').timepicker();
    $('#add_time3_from').timepicker();
    $('#add_time3_to').timepicker();
    $('#add_time4_from').timepicker();
    $('#add_time4_to').timepicker();
    $('#add_time5_from').timepicker();
    $('#add_time5_to').timepicker();
    $('#add_time6_from').timepicker();
    $('#add_time6_to').timepicker();
    $('#add_time7_from').timepicker();
    $('#add_time7_to').timepicker();
    $('#add_time8_from').timepicker();
    $('#add_time8_to').timepicker();


    $(document).ready(function () {
        $('#date_submit').datepicker();
        $('#date_submiti').datepicker();
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


    function get_designation_by_school(url) {
        if (url) {
            window.location.href = url;
        }
    }

</script>

<!---************************************************--><!---************************************************-->    
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


<script type="text/javascript">
    function add_more(fn_stop_container) {
        var data = '<tr>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="working_place[]" class="answer" placeholder="<?php echo $this->lang->line('text225'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="working_designation[]" value="" placeholder="<?php echo $this->lang->line('text226'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="working_from[]" value="" placeholder="<?php echo $this->lang->line('work_from'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="working_to[]" value="" placeholder="<?php echo $this->lang->line('work_to'); ?>"/>'
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
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="text" name="subclass1[]" class="answer" placeholder="<?php echo $this->lang->line('text215'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="text" name="subsubject1[]" value="" placeholder="<?php echo $this->lang->line('text216'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="text" name="subperiods1[]" value="" placeholder="<?php echo $this->lang->line('text248'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="subhours1[]" value="" placeholder="<?php echo $this->lang->line('hours'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="text" name="subminuts1[]" value="" placeholder="<?php echo $this->lang->line('seconds'); ?>"/>'
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
                    url: "<?php echo site_url('forms/remove_prstop'); ?>",
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

<script>
    jQuery(document).ready(function () {
        var $nationality = jQuery('select[name="nationality"]');
        var $religion = jQuery('select[name="religion"]');

        $nationality.change(function () {
            if ($nationality.val() == 'Other') {
                $religion.show();
            } else {
                $religion.hide();
            }
        });
    });
</script>

<script>
    jQuery(document).ready(function () {
        var $higher_exam_type = jQuery('select[name="higher_exam_type"]');
        var $higher_exam = jQuery('input[name="higher_exam"]');

        $higher_exam_type.change(function () {
            if ($higher_exam_type.val() == 'Other') {
                $higher_exam.show();
            } else {
                $higher_exam.hide();
            }
        });
    });
</script>

<script>
$(document).ready(function(){
    $('#yes_no').on('change', function(){
    	var demovalue = $(this).val(); 
        $("div.yesOnly").hide();
        $("#show"+demovalue).show();
    });
});
	</script>

<script>

        function reSum()
        {
            var proposed_monk = parseInt(document.getElementById("proposed_monk").value);
            var proposed_lay = parseInt(document.getElementById("proposed_lay").value);
            document.getElementById("proposed_total").value = proposed_monk + proposed_lay;

        }

</script>

<script>

        function reAvgSum()
        {
            var annual_monk = parseInt(document.getElementById("annual_monk").value);
            var annual_lay = parseInt(document.getElementById("annual_lay").value);
            document.getElementById("annual_total").value = annual_monk + annual_lay;

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





