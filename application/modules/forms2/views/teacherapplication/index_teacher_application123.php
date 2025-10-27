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
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('teacher_appliaction_form'); ?></small></h3>
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
                        ?>"><a href="#tab_teacherappform_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                           <?php if (has_permission(ADD, 'forms', 'teacherapplication')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('forms/teacherappformadd'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_teacherappform"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                           <?php } 
?>  
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_teacherappform"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 

                       

                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_teacherappform_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
											<th><?php echo $this->lang->line('cur_status'); ?></th>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){   ?>
                                                <th><?php echo $this->lang->line('school_name'); ?></th>
                                            <?php } ?>
											<th><?php echo $this->lang->line('username'); ?></th>
											<th><?php echo $this->lang->line('role'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
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
                                                    <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                        <td><?php echo $obj->school_name;?></td>
                                                    <?php } ?>
                                                  <!--  <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>
                                                        <td><?php echo $obj->school_name;?></td>
                                                    <?php }  ?>
                                                    -->
													 <td><?php echo $obj->fullname; ?></td>
													 <td><?php echo $obj->role; ?></td>
                                                    <td><?php echo $obj->applicant_name; ?></td>
                                                    <td><?php echo $obj->created_at; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'forms', 'teacherapplication') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('forms/teacherapp/teacherappformedit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(EDIT, 'forms', 'teacherapplication') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('forms/teacherapp/teacherappformconfirm/' . $obj->id); ?>" class="btn btn-main btn-xs"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('confirm'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'forms', 'teacherapplication')) { ?>
                                                            <a href="javascript:void(0);" onclick="get_teacherappform_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-teacherappform-modal-lg" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'forms', 'teacherapplication') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('forms/teacherapp/teacherappformdelete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                        ?>" id="tab_add_teacherappform">
                            <div class="x_content"> 
                                <?php echo form_open(site_url('forms/teacherappformadd'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left','enctype' => 'multipart/form-data'), ''); ?>
								
							     <ul  class="nav nav-tabs bordered">
                                    <li  class="active" ><a href="#tab_zero"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('pirven_fir'); ?></a> </li>

                                    <li><a href="#tab_first"   role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_sec'); ?></a> </li>                          

                                    <li><a href="#tab_sec"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_third'); ?></a> </li>                          

                                    <li ><a href="#tab_third"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('pirven_forth'); ?></a> </li>                 

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
									
									<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -125px;">
										<div class="item form-group">
											<div>01.&nbsp;<?php echo $this->lang->line('text202'); ?>:-</div>
											<div class="help-block"><?php echo form_error('text202'); ?></div>
										</div>
									</div>
									
									<div class="col-md-5 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="applicant_s_name_initial"  id="applicant_s_name_initial" value="<?php echo isset($post['applicant_s_name_initial']) ?  $post['applicant_s_name_initial'] : ''; ?>" placeholder="" type="text" autocomplete="off" required="required">
											 <div class="help-block"><?php echo form_error('applicant_s_name_initial'); ?></div>
										 </div>
									</div>
									
									<div class="col-md-1 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person1" id="person1">
												<option value="හිමි">හිමි</option>                                           
                                                <option value="මයා">මයා</option>
                                                <option value="මිය">මිය</option>
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
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
									
									      <div class="col-md-5 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_s_name"  id="applicant_s_name" value="<?php echo isset($post['applicant_s_name']) ?  $post['applicant_s_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
									
									      <div class="col-md-5 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_e_name"  id="applicant_e_name" value="<?php echo isset($post['applicant_e_name']) ?  $post['applicant_e_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											       <div class="help-block"><?php echo form_error('applicant_e_name'); ?></div>
										       </div>
									      </div>
									
								       </div>
									   
									   <div class="row" style="font-size: 16px;">
									
									      <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
										      <div class="item form-group">
											      <div>04.&nbsp;<?php echo $this->lang->line('19d_o_b'); ?>:-</div>
											      <div class="help-block"><?php echo form_error('19d_o_b'); ?></div>
										      </div>
									      </div>
									
									      <div class="col-md-3 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datei" name="datei" value="<?php echo isset($datei) && $datei != '' ? date('d-m-Y', strtotime($datei)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
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
									
									      <div class="col-md-5 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_mationality"  id="applicant_mationality" value="<?php echo isset($post['applicant_mationality']) ?  $post['applicant_mationality'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											       <div class="help-block"><?php echo form_error('applicant_mationality'); ?></div>
										       </div>
									      </div>
									
								       </div>
									   
									   <div class="row" style="font-size: 16px;">
									
									      <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
										      <div class="item form-group">
											      <div>06.&nbsp;<?php echo $this->lang->line('19nic'); ?>:-</div>
											      <div class="help-block"><?php echo form_error('19nic'); ?></div>
										      </div>
									      </div>
									
									      <div class="col-md-5 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_nic"  id="applicant_nic" value="<?php echo isset($post['applicant_nic']) ?  $post['applicant_nic'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											       <div class="help-block"><?php echo form_error('applicant_nic'); ?></div>
										       </div>
									      </div>
									
								       </div>
									   
									   <div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>07.&nbsp;&nbsp;<?php echo $this->lang->line('text206'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text206'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-6 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="applicant_p_address"  id="applicant_p_address" value="<?php echo isset($post['applicant_p_address']) ?  $post['applicant_p_address'] : ''; ?>" placeholder=""></textarea>
											 <div class="help-block"><?php echo form_error('applicant_p_address'); ?></div>
										 </div>
									</div>
								</div>
									   
									   <div class="row" style="font-size: 16px;">
									
									      <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
										      <div class="item form-group">
											      <div>08.&nbsp;<?php echo $this->lang->line('text207'); ?>:-</div>
											      <div class="help-block"><?php echo form_error('text207'); ?></div>
										      </div>
									      </div>
									
									      <div class="col-md-5 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_tellno"  id="applicant_tellno" value="<?php echo isset($post['applicant_tellno']) ?  $post['applicant_tellno'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											       <div class="help-block"><?php echo form_error('applicant_tellno'); ?></div>
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
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_email"  id="applicant_email" value="<?php echo isset($post['applicant_email']) ?  $post['applicant_email'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											       <div class="help-block"><?php echo form_error('applicant_email'); ?></div>
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
									
									  <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_name"  id="piriven_name" value="<?php echo isset($post['piriven_name']) ?  $post['piriven_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name2'); ?>"></textarea>
											 <div class="help-block"><?php echo form_error('piriven_name'); ?></div>
										 </div>
									 </div>
											 
									<div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_address"  id="piriven_address" value="<?php echo isset($post['piriven_address']) ?  $post['piriven_address'] : ''; ?>" placeholder="<?php echo $this->lang->line('address3'); ?>"></textarea>
											 <div class="help-block"><?php echo form_error('piriven_address'); ?></div>
										 </div>
									</div>
									
									<div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_tellno"  id="piriven_tellno" value="<?php echo isset($post['piriven_tellno']) ?  $post['piriven_tellno'] : ''; ?>" placeholder="<?php echo $this->lang->line('text207'); ?>"></textarea>
											 <div class="help-block"><?php echo form_error('piriven_tellno'); ?></div>
										 </div>
									</div>
										   
								</div>
										
										 <!--= 1=-->
									   <div class="row" style="font-size: 16px;">
										  
										 <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group dataTables_wrapper">
                                                    <label for="national_id">11. <?php echo $this->lang->line('19edu_quli'); ?></label>
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
																		<div><?php echo $this->lang->line('year'); ?>:-</div>
																	</div>
																</div>
									
									                            <div class="col-md-8 col-sm-2 col-xs-12">
										                             <div class="item form-group">
											                             <input  class="form-control col-md-7 col-xs-12"  name="year1"  id="year1" value="<?php echo isset($post['year1']) ?  $post['year1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											                             <div class="help-block"><?php echo form_error('year1'); ?></div>
										                             </div>
									                            </div>
															
															</th>
															<th colspan="3">
																<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
																	<div class="item form-group">
																		<div><?php echo $this->lang->line('year'); ?>:-</div>
																	</div>
																</div>
									
									                            <div class="col-md-8 col-sm-2 col-xs-12">
										                             <div class="item form-group">
											                             <input  class="form-control col-md-7 col-xs-12"  name="year2"  id="year2" value="<?php echo isset($post['year2']) ?  $post['year2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
											                             <input  class="form-control col-md-7 col-xs-12"  name="exam_no1"  id="exam_no1" value="<?php echo isset($post['exam_no1']) ?  $post['exam_no1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
											                             <input  class="form-control col-md-7 col-xs-12"  name="exam_no2"  id="exam_no2" value="<?php echo isset($post['exam_no2']) ?  $post['exam_no2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
                                                            <td style="width:5%;">
																<input  class="form-control col-md-12 col-xs-12" type="number" name="exam_id1[]" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />
															</td>
															<td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subject1[]" placeholder="<?php echo $this->lang->line('text216'); ?>" />
															</td>
                                                            <td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_results1[]" placeholder="<?php echo $this->lang->line('text215'); ?>" />
															</td>
                                                            <td style="width:5%;">
																<input  class="form-control col-md-12 col-xs-12" type="number" name="exam_id2[]" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />
															</td>
															<td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subject2[]" placeholder="<?php echo $this->lang->line('text216'); ?>" />
															</td>
                                                            <td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_results2[]" placeholder="<?php echo $this->lang->line('text215'); ?>" />
															</td>
                                                        
														</tr>
                                                       
                                                    </table>
													
													<div class="help-block">
                                                        <?php echo form_error('answer'); ?>
                                                         <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_more1('fn_add_stop_1container');"><?php echo $this->lang->line('add_more'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
										
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
											                             <input  class="form-control col-md-7 col-xs-12"  name="exam_name"  id="exam_name" value="<?php echo isset($post['exam_name']) ?  $post['exam_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
																		<div><?php echo $this->lang->line('year'); ?>:-</div>
																	</div>
																</div>
									
									                            <div class="col-md-8 col-sm-2 col-xs-12">
										                             <div class="item form-group">
											                             <input  class="form-control col-md-7 col-xs-12"  name="year_h1"  id="year_h1" value="<?php echo isset($post['year_h1']) ?  $post['year_h1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											                             <div class="help-block"><?php echo form_error('year_h1'); ?></div>
										                             </div>
									                            </div>
															
															</th>
															<th colspan="3">
																<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
																	<div class="item form-group">
																		<div><?php echo $this->lang->line('year'); ?>:-</div>
																	</div>
																</div>
									
									                            <div class="col-md-8 col-sm-2 col-xs-12">
										                             <div class="item form-group">
											                             <input  class="form-control col-md-7 col-xs-12"  name="year_h2"  id="year_h2" value="<?php echo isset($post['year_h2']) ?  $post['year_h2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
											                             <input  class="form-control col-md-7 col-xs-12"  name="exam_noh1"  id="exam_noh1" value="<?php echo isset($post['exam_noh1']) ?  $post['exam_noh1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
											                             <input  class="form-control col-md-7 col-xs-12"  name="exam_noh2"  id="exam_noh2" value="<?php echo isset($post['exam_noh2']) ?  $post['exam_noh2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											                             <div class="help-block"><?php echo form_error('exam_noh2'); ?></div>
										                             </div>
									                            </div>
															</th>
                                                            
                                                        </tr>
														
														<tr>
															
                                                           <th colspan="3">
																<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
																	<div class="item form-group">
																		<div><?php echo $this->lang->line('text221'); ?>:-</div>
																	</div>
																</div>
									
									                            <div class="col-md-8 col-sm-2 col-xs-12">
										                             <div class="item form-group">
											                             <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datehii" name="datehii" value="<?php echo isset($datehii) && $datehii != '' ? date('d-m-Y', strtotime($datehii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                                         <div class="help-block"><?php echo $this->lang->line('datehii'); ?></div>
										                             </div>
									                            </div>
															</th>
															<th colspan="3">
																<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
																	<div class="item form-group">
																		<div><?php echo $this->lang->line('text221'); ?>:-</div>
																	</div>
																</div>
									
									                            <div class="col-md-8 col-sm-2 col-xs-12">
										                             <div class="item form-group">
											                             <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datehiii" name="datehiii" value="<?php echo isset($datehiii) && $datehiii != '' ? date('d-m-Y', strtotime($datehiii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                                         <div class="help-block"><?php echo $this->lang->line('datehiii'); ?></div>
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
                                                            <td style="width:5%;">
																<input  class="form-control col-md-12 col-xs-12" type="number" name="exam_idh1[]" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />
															</td>
															<td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subjecth1[]" placeholder="<?php echo $this->lang->line('text216'); ?>" />
															</td>
                                                            <td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_resultsh1[]" placeholder="<?php echo $this->lang->line('text215'); ?>" />
															</td>
                                                            <td style="width:5%;">
																<input  class="form-control col-md-12 col-xs-12" type="number" name="exam_idh2[]" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />
															</td>
															<td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subjecth2[]" placeholder="<?php echo $this->lang->line('text216'); ?>" />
															</td>
                                                            <td>
																<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_resultsh2[]" placeholder="<?php echo $this->lang->line('text215'); ?>" />
															</td>
                                                        
														</tr>
                                                       
                                                    </table>
													
													<div class="help-block">
                                                        <?php echo form_error('answer'); ?>
                                                         <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_more2('fn_add_stop_2container');"><?php echo $this->lang->line('add_more'); ?></a>
                                                    </div>
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
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-5column"  name="other_qualifications"  id="other_qualifications" value="<?php echo isset($post['other_qualifications']) ?  $post['other_qualifications'] : ''; ?>" placeholder=""></textarea>
											 <div class="help-block"><?php echo form_error('other_qualifications'); ?></div>
										 </div>
									</div>
								</div>
										
										 <!--= 3=-->
									   <div class="row" style="font-size: 16px;">
										   
										  <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group dataTables_wrapper"> 
													
										   <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
											   <div class="item form-group">
												   <div>13.1&nbsp;<?php echo $this->lang->line('text223'); ?>:-</div>
												   <div class="help-block"><?php echo form_error('text223'); ?></div>
											   </div>
										   </div>
										   
										   <div class="col-md-1 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										       <div class="item form-group">
											       <select  class="form-control col-md-7 col-xs-12" name="yes_no" id="yes_no" style="font-size:17px;">
												        <option value="ඇත">ඇත</option>                                           
                                                        <option value="නැත">නැත</option>
											       </select>
											       <div class="help-block"><?php echo form_error('person1'); ?></div>
										       </div>
									       </div>
													
										   <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -125px;">
											   <div class="item form-group">
												   <div><?php echo $this->lang->line('text224'); ?></div>
												   <div class="help-block"><?php echo form_error('text224'); ?></div>
											   </div>
										   </div>
										   
										 
													
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_3container" cellspacing="0" width="100%">
														
														
												<tr>               
                                                    <th rowspan="2" style="text-align: center"><?php echo $this->lang->line('text225'); ?></th>
                                                    <th rowspan="2" style="text-align: center"><?php echo $this->lang->line('text226'); ?></th>
                                                    <th colspan="2" style="text-align: center"><?php echo $this->lang->line('text227'); ?></th>
                                                </tr>
														
												<tr>               
                                                    <th style="text-align: center"><?php echo $this->lang->line('from'); ?></th>
                                                    <th style="text-align: center"><?php echo $this->lang->line('to'); ?></th>
                                                </tr>		
                                                <tr>               
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type="text" name="working_place[]" placeholder="<?php echo $this->lang->line('text225'); ?>" />
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_position[]" value="" placeholder="<?php echo $this->lang->line('text226'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_from[]" value="" placeholder="<?php echo $this->lang->line('from'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_to[]" value="" placeholder="<?php echo $this->lang->line('to'); ?>"/>
                                                    </td>
                                                </tr>             
                                                    </table>
													
													<div class="help-block">
                                                        <?php echo form_error('answer'); ?>
                                                         <a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="add_more3('fn_add_stop_3container');"><?php echo $this->lang->line('add_more'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
										
									   <div class="row" style="font-size: 16px;">
										   
                                           <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                              <div class="item form-group"> 
                                                  <div>12.2.&nbsp;&nbsp;<?php echo $this->lang->line('text228'); ?> :-</div>
                                                   <div class="help-block"><?php echo form_error('text228'); ?></div>
                                            </div>
                                           </div>
											 
									       <div class="col-md-8 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="leave_reson"  id="leave_reson" value="<?php echo isset($post['leave_reson']) ?  $post['leave_reson'] : ''; ?>" placeholder=""></textarea>
											       <div class="help-block"><?php echo form_error('leave_reson'); ?></div>
										       </div>
									      </div>
								      </div>
										
									   <div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder="<?php echo $this->lang->line('name2'); ?>"  type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												<option value="මූලික">මූලික</option>                                           
                                                <option value="මහා ">මහා</option>        
                                                <option value="විද්‍යායතන">විද්‍යායතන</option>
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text229'); ?></div>
											<div class="help-block"><?php echo form_error('text229'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateiv" name="dateiv" value="<?php echo isset($dateiv) && $dateiv != '' ? date('d-m-Y', strtotime($dateiv)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('dateiv'); ?></div>
										</div>
									</div>
									
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
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datev" name="datev" value="<?php echo isset($datev) && $datev != '' ? date('d-m-Y', strtotime($datev)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datev'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('text111'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
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
													   <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -95px;">
														   <div class="item form-group"> 
															   <div><?php echo $this->lang->line('text232'); ?>:-</div>
															   <div class="help-block"><?php echo form_error('text232'); ?></div>
														   </div>
													   </div>
											 
									                   <div class="col-md-6 col-sm-2 col-xs-12">
										                   <div class="item form-group">
											                   <div class="btn btn-default btn-file">
																   <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
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
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
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
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
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
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
															   </div>
															   <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
															   <div class="help-block"><?php echo form_error('doc1'); ?></div>
										                   </div>
									                   </div>
												   </li>
											   
									
												   
											   </ul>
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
									
									<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div>01.&nbsp;<?php echo $this->lang->line('text238'); ?></div>
											<div><?php echo $this->lang->line('text239'); ?></div>
										</div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    
                                                        <thead>
                                                        <tr>
    
                                                         <th><?php echo $this->lang->line('year'); ?></th>
                                                          <th ><?php echo $this->lang->line('month'); ?></th>
                                                          <th ><?php echo $this->lang->line('date1'); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                          <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('year'); ?>"  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                                <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('mont'); ?>"  type="number" autocomplete="off">                                                                           
                                                                <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('date1'); ?>"  type="number" autocomplete="off">                                                                          
                                                                <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
    
                                                        </tr>
                                                        </tbody>
                                                       
                                                    </table>
										</div>
									</div>
									
									<div class="col-md-2 ol-sm-2 col-xs-12" style="text-align: center">
										<div class="item form-group">
											<div><?php echo $this->lang->line('from'); ?></div>
										</div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
												<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    
                                                        <thead>
                                                        <tr>
    
                                                         <th><?php echo $this->lang->line('year'); ?></th>
                                                          <th ><?php echo $this->lang->line('month'); ?></th>
                                                          <th ><?php echo $this->lang->line('date1'); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                          <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('year'); ?>"  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                                <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('mont'); ?>"  type="number" autocomplete="off">                                                                           
                                                                <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('date1'); ?>"  type="number" autocomplete="off">                                                                          
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
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    
                                                        <thead>
                                                        <tr>
    
                                                         <th><?php echo $this->lang->line('monk'); ?></th>
                                                          <th ><?php echo $this->lang->line('lay'); ?></th>
                                                          <th ><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                           <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('monk'); ?>"  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                                <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('lay'); ?>"  type="number" autocomplete="off">                                                                           
                                                                <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('count'); ?>"  type="number" autocomplete="off">                                                                          
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
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <th style="vertical-align: super;"><?php echo $this->lang->line('text243'); ?></th>
														 <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
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
    
                                                         <th style="vertical-align: super;"><?php echo $this->lang->line('year'); ?></th>
                                                         <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <th style="vertical-align: super;"><?php echo $this->lang->line('month'); ?></th>
														 <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
															 <th style="vertical-align: super;"><?php echo $this->lang->line('date1'); ?></th>
														 <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder=""  type="number" autocomplete="off">
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
                                                            <th><?php echo $this->lang->line('text246'); ?></th>
                                                            <th><?php echo $this->lang->line('time'); ?></th>
                                                            <th><?php echo $this->lang->line('monday'); ?></th>
                                                            <th><?php echo $this->lang->line('tuesday'); ?></th>
															<th><?php echo $this->lang->line('wednesday'); ?></th>
                                                            <th><?php echo $this->lang->line('thursday'); ?></th>
                                                            <th><?php echo $this->lang->line('friday'); ?></th>
                                                        </tr>
														
                                                        <tr>
															<td>01</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
														<tr>
															<td>02</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
														<tr>
															<td>03</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
														<tr>
															<td>04</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
														
														
														<tr>
															<td>05</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
														<tr>
															<td>06</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
														<tr>
															<td>07</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
														<tr>
															<td>08</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
															
                                                             <td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
															<td>
																<input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" value="<?php echo isset($post['18ii']) ?  $post['18ii'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18ii'); ?></div>
															</td>
                                                        </tr>
													</table>
                                                      
                                                </div>
                                            </div>
                                      </div>
							
									
                                      <div class="row" style="font-size: 16px;">
											
											<div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										      <div class="item form-group">
											      <div>06.&nbsp;<?php echo $this->lang->line('text247'); ?></div>
										      </div>
									      </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            
                                                            <th rowspan="2"><?php echo $this->lang->line('class1'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('text216'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('text248'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('text249'); ?></th>
                                                        </tr>
                                                        <tr style="background-color: #f9f9f9;">
                                                            
                                                            <th><?php echo $this->lang->line('hours'); ?></th>
                                                            <th><?php echo $this->lang->line('seconds'); ?></th>

                                                        </tr>
                                                        <tr>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div></td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeii"  id="officeii" value="<?php echo isset($post['officeii']) ?  $post['officeii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeii'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeiii"  id="officeiii" value="<?php echo isset($post['officeiii']) ?  $post['officeiii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiii'); ?></div></td>
                                                            <td>
															    <input  class="form-control col-md-7 col-xs-12"  name="officeiv"  id="officeiv" value="<?php echo isset($post['officeiv']) ?  $post['officeiv'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiv'); ?></div>
															</td>
                                                        </tr>
														<tr>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div></td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeii"  id="officeii" value="<?php echo isset($post['officeii']) ?  $post['officeii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeii'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeiii"  id="officeiii" value="<?php echo isset($post['officeiii']) ?  $post['officeiii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiii'); ?></div></td>
                                                            <td>
															    <input  class="form-control col-md-7 col-xs-12"  name="officeiv"  id="officeiv" value="<?php echo isset($post['officeiv']) ?  $post['officeiv'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiv'); ?></div>
															</td>
                                                        </tr>
														<tr>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div></td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeii"  id="officeii" value="<?php echo isset($post['officeii']) ?  $post['officeii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeii'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeiii"  id="officeiii" value="<?php echo isset($post['officeiii']) ?  $post['officeiii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiii'); ?></div></td>
                                                            <td>
															    <input  class="form-control col-md-7 col-xs-12"  name="officeiv"  id="officeiv" value="<?php echo isset($post['officeiv']) ?  $post['officeiv'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiv'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div></td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeii"  id="officeii" value="<?php echo isset($post['officeii']) ?  $post['officeii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeii'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeiii"  id="officeiii" value="<?php echo isset($post['officeiii']) ?  $post['officeiii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiii'); ?></div></td>
                                                            <td>
															    <input  class="form-control col-md-7 col-xs-12"  name="officeiv"  id="officeiv" value="<?php echo isset($post['officeiv']) ?  $post['officeiv'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiv'); ?></div>
															</td>
                                                        </tr>
														<tr>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div></td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeii"  id="officeii" value="<?php echo isset($post['officeii']) ?  $post['officeii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeii'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeiii"  id="officeiii" value="<?php echo isset($post['officeiii']) ?  $post['officeiii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiii'); ?></div></td>
                                                            <td>
															    <input  class="form-control col-md-7 col-xs-12"  name="officeiv"  id="officeiv" value="<?php echo isset($post['officeiv']) ?  $post['officeiv'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiv'); ?></div>
															</td>
                                                        </tr>
														<tr>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div></td>
                                                            <td>
																<input class="form-control col-md-7 col-xs-12" name="18i" id="18i" value="<?php echo isset($post['18i']) ?  $post['18i'] : ''; ?>" placeholder="" type="text" autocomplete="off">
															    <div class="help-block"><?php echo form_error('18i'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeii"  id="officeii" value="<?php echo isset($post['officeii']) ?  $post['officeii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeii'); ?></div>
															</td>
                                                            <td>
																<input  class="form-control col-md-7 col-xs-12"  name="officeiii"  id="officeiii" value="<?php echo isset($post['officeiii']) ?  $post['officeiii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiii'); ?></div></td>
                                                            <td>
															    <input  class="form-control col-md-7 col-xs-12"  name="officeiv"  id="officeiv" value="<?php echo isset($post['officeiv']) ?  $post['officeiv'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officeiv'); ?></div>
															</td>
                                                        </tr>
														 <tr>
                                                            <th colspan="3"><?php echo $this->lang->line('count'); ?></th>
                                                             <td> 
																<input  class="form-control col-md-7 col-xs-12"  name="officexiii"  id="officexiii" value="<?php echo isset($post['officexiii']) ?  $post['officexiii'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officexiii'); ?></div>
															 </td>
                                                            <td> 
																<input  class="form-control col-md-7 col-xs-12"  name="officexiv"  id="officexiv" value="<?php echo isset($post['officexiv']) ?  $post['officexiv'] : ''; ?>" placeholder="" type="number" autocomplete="off">
                                                                <div class="help-block"><?php echo form_error('officexiv'); ?></div>
															 </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
									
									  <div class="row" style="font-size: 16px;">
									
									<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div>07.&nbsp;<?php echo $this->lang->line('text250'); ?></div>
										</div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    
                                                        <thead>
                                                        <tr>
    
                                                         <th><?php echo $this->lang->line('monk'); ?></th>
                                                          <th ><?php echo $this->lang->line('lay'); ?></th>
                                                          <th ><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                           <td>
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('monk'); ?>"  type="number" autocomplete="off">
															  <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                                <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('lay'); ?>"  type="number" autocomplete="off">                                                                           
                                                                <div class="help-block"><?php echo form_error('7iidate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                              <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('count'); ?>"  type="number" autocomplete="off">                                                                          
                                                                <div class="help-block"><?php echo form_error('7iidate'); ?></div>
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
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="other_qualifications"  id="other_qualifications" value="<?php echo isset($post['other_qualifications']) ?  $post['other_qualifications'] : ''; ?>" placeholder=""></textarea>
											 <div class="help-block"><?php echo form_error('other_qualifications'); ?></div>
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
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_s_name"  id="applicant_s_name" value="<?php echo isset($post['applicant_s_name']) ?  $post['applicant_s_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_s_name"  id="applicant_s_name" value="<?php echo isset($post['applicant_s_name']) ?  $post['applicant_s_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											       <div class="help-block"><?php echo form_error('applicant_s_name'); ?></div>
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
											<textarea class="form-control col-md-7 col-xs-12 textarea-4column" name="piriven_name" id="piriven_name" value="" placeholder="" data-lt-tmp-id="lt-57299" spellcheck="false" data-gramm="false"></textarea>
											 <div class="help-block"><?php echo form_error('other_qualifications'); ?></div>
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
											       <input  class="form-control col-md-7 col-xs-12"  name="applicant_s_name"  id="applicant_s_name" value="<?php echo isset($post['applicant_s_name']) ?  $post['applicant_s_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
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
											       <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datevi" name="datevi" value="<?php echo isset($datevi) && $datevi != '' ? date('d-m-Y', strtotime($datevi)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                   <div class="help-block"><?php echo $this->lang->line('datevi'); ?></div>
										       </div>
									      </div>
									
								       </div>
									
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
                                                        <td style="background-color:transparent;border: none ">(අ)&nbsp;<?php echo $this->lang->line('text258'); ?></td>
                                                        <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr style="background-color:transparent;border: none ">
                                                        <td style="background-color:transparent;border: none ">(ආ)&nbsp;<?php echo $this->lang->line('text259'); ?></td>
                                                        <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr style="background-color:transparent;border: none ">
                                                        <td style="background-color:transparent;border: none ">(ඇ)&nbsp;<?php echo $this->lang->line('text261'); ?></td>
                                                        <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
												     <tr style="background-color:transparent;border: none ">
                                                        <td style="background-color:transparent;border: none ">(ඈ)&nbsp;<?php echo $this->lang->line('text262'); ?></td>
                                                        <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr style="background-color:transparent;border: none ">
                                                        <td style="background-color:transparent;border: none ">(ඉ)&nbsp;<?php echo $this->lang->line('text263'); ?></td>
                                                        <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr style="background-color:transparent;border: none ">
                                                        <td style="background-color:transparent;border: none ">(ඊ)&nbsp;<?php echo $this->lang->line('text264'); ?></td>
                                                        <td style="background-color:transparent;border: none "><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                   
                                                   	
                                                  
                                                </table>
										</div>
									</div>
								      </div>
									
									  <div class="row" style="font-size: 16px;">
									
									      <div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										      <div class="item form-group">
											      <div>09.7&nbsp;<?php echo $this->lang->line('text265'); ?>:-</div>
											      <div class="help-block"><?php echo form_error('text265'); ?></div>
										      </div>
									      </div>
									
									      <div class="col-md-3 col-sm-2 col-xs-12">
										       <div class="item form-group">
											       <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datevii" name="datevii" value="<?php echo isset($datevii) && $datevii != '' ? date('d-m-Y', strtotime($datevii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                   <div class="help-block"><?php echo $this->lang->line('datevii'); ?></div>
										       </div>
									      </div>
										  
										  <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										      <div class="item form-group">
											      <div><?php echo $this->lang->line('text267'); ?></div>
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
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
															   </div>
															   <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
															   <div class="help-block"><?php echo form_error('doc1'); ?></div>
										                   </div>
									                   </div>
												   </li>
												   
												   <li class="col-md-12 col-sm-2 col-xs-12">
													   <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
														   <div class="item form-group"> 
															   <div><?php echo $this->lang->line('text269'); ?>:-</div>
															   <div class="help-block"><?php echo form_error('text269'); ?></div>
														   </div>
													   </div>
											 
									                   <div class="col-md-4 col-sm-2 col-xs-12">
										                   <div class="item form-group">
											                   <div class="btn btn-default btn-file">
																   <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
															   </div>
															   <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
															   <div class="help-block"><?php echo form_error('doc1'); ?></div>
										                   </div>
									                   </div>
												   </li>
												   
												   <li class="col-md-12 col-sm-2 col-xs-12">
													   <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
														   <div class="item form-group"> 
															   <div><?php echo $this->lang->line('text270'); ?>:-</div>
															   <div class="help-block"><?php echo form_error('text270'); ?></div>
														   </div>
													   </div>
											 
									                   <div class="col-md-7 col-sm-2 col-xs-12">
										                   <div class="item form-group">
											                   <div class="btn btn-default btn-file">
																   <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
															   </div>
															   <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
															   <div class="help-block"><?php echo form_error('doc1'); ?></div>
										                   </div>
									                   </div>
												   </li>
												   
												   <li class="col-md-12 col-sm-2 col-xs-12">
													   <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
														   <div class="item form-group"> 
															   <div><?php echo $this->lang->line('text271'); ?>:-</div>
															   <div class="help-block"><?php echo form_error('text235'); ?></div>
														   </div>
													   </div>
											 
									                   <div class="col-md-6 col-sm-2 col-xs-12">
										                   <div class="item form-group">
											                   <div class="btn btn-default btn-file">
																   <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
															   </div>
															   <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
															   <div class="help-block"><?php echo form_error('doc1'); ?></div>
										                   </div>
									                   </div>
												   </li>
												   
												   <li class="col-md-12 col-sm-2 col-xs-12">
													   <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
														   <div class="item form-group"> 
															   <div><?php echo $this->lang->line('text272'); ?>:-</div>
															   <div class="help-block"><?php echo form_error('text235'); ?></div>
														   </div>
													   </div>
											 
									                   <div class="col-md-6 col-sm-2 col-xs-12">
										                   <div class="item form-group">
											                   <div class="btn btn-default btn-file">
																   <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
																   <input  class="form-control col-md-7 col-xs-12"  name="doc1"  id="doc1" type="file" >
															   </div>
															   <div class="text-info" style="font-size: 14px"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
															   <div class="help-block"><?php echo form_error('doc1'); ?></div>
										                   </div>
									                   </div>
												   </li>
											   
									
												   
											   </ul>
										   </div>
								      </div>
									
									
									  <div class="row" style="font-size: 16px;">
									
									      <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										      <div class="item form-group">
											      <div>&nbsp;<?php echo $this->lang->line('text273'); ?></div>
											      <div class="help-block"><?php echo form_error('text273'); ?></div>
										      </div>
									      </div>
									
								       </div>
									
									  <div class="row" style="font-size: 16px;">
										   <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateviii" name="dateviii" value="<?php echo isset($dateviii) && $dateviii != '' ? date('d-m-Y', strtotime($dateviii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('dateviii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('k_approval1'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
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
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder="<?php echo $this->lang->line('name2'); ?>"  type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												<option value="මූලික">මූලික</option>                                           
                                                <option value="මහා ">මහා</option>        
                                                <option value="විද්‍යායතන">විද්‍යායතන</option>
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text275'); ?></div>
											<div class="help-block"><?php echo form_error('text275'); ?></div>
										</div>
									</div>
									
								</div>
										
										<div class="row" style="font-size: 16px;">
									
									<div class="col-md-10 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text276'); ?></div>
											<div class="help-block"><?php echo form_error('text276'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder=""  type="text" autocomplete="off">
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
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateix" name="dateix" value="<?php echo isset($dateix) && $dateix != '' ? date('d-m-Y', strtotime($dateix)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('dateix'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('text278'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
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
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
                                                </div>
                                                <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                <div class="help-block"><?php echo form_error('text278'); ?></div>
												
                                            </div>
											
                                            </div>
										</div>
										
										<div class="row" style="font-size: 16px;">
											
										<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <input  class="form-control col-md-7 col-xs-12" name="datex"  id="add_datex" value="<?php echo isset($post['datex']) ? $post['datex'] : ''; ?>" placeholder="<?php echo $this->lang->line('datex'); ?>"  type="text" autocomplete="off">
                                                 <div class="help-block"><?php echo form_error('datex'); ?></div>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12">
												<label for="name"><?php echo $this->lang->line('day'); ?></label>
												</div>
											</div>
										</div>
									   </div>
										
										<div class="row" style="font-size: 16px;">
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder=""  type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text280'); ?></div>
											<div class="help-block"><?php echo form_error('text280'); ?></div>
										</div>
									</div>

                                   </div>
										
										<div class="ln_solid"></div>
										
										<div class="row">
										   <div class="col-md-12 col-sm-12 col-xs-12">
											   <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('part3'); ?></strong></h5>
											   <h5 style="text-align:center; font-size: 18px;"><strong><?php echo $this->lang->line('text281'); ?></strong></h5>
										   </div>
										   
									   </div>
										<br>										
								        <div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder="<?php echo $this->lang->line('name2'); ?>"  type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												<option value="මූලික">මූලික</option>                                           
                                                <option value="මහා ">මහා</option>        
                                                <option value="විද්‍යායතන">විද්‍යායතන</option>
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text282'); ?></div>
											<div class="help-block"><?php echo form_error('text282'); ?></div>
										</div>
									</div>
									
								</div>
										
										<div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder=""  type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												<option value="හිමි">හිමි</option>         
                                                <option value="මහතාගේ">මහතාගේ</option> 
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
											
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -70px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text283'); ?></div>
											<div class="help-block"><?php echo form_error('text283'); ?></div>
										</div>
									</div>
											
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												<option value="කරමි.">කරමි.</option>         
                                                <option value="නොකරමි.">නොකරමි.</option> 
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									
								</div>
										
										<div class="row" style="font-size: 16px;">
										   <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexi" name="datexi" value="<?php echo isset($datexi) && $datexi != '' ? date('d-m-Y', strtotime($datexi)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexi'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('text284'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
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
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder="<?php echo $this->lang->line('name2'); ?>"  type="text" autocomplete="off">
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												<option value="මූලික">මූලික</option>                                           
                                                <option value="මහා ">මහා</option>        
                                                <option value="විද්‍යායතන">විද්‍යායතන</option>
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text286'); ?></div>
											<div class="help-block"><?php echo form_error('text286'); ?></div>
										</div>
									</div>
									
								</div>
										 
										<div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -95px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text287'); ?></div>
											<div class="help-block"><?php echo form_error('text287'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												<option value="නිවැරදිය.">නිවැරදිය.</option>                                           
                                                <option value="නිවැරදි නොවේ.">නිවැරදි නොවේ</option>  
											</select>
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
								</div>
										 
										<div class="row" style="font-size: 16px;">
											
										   <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexii" name="datexii" value="<?php echo isset($datexii) && $datexii != '' ? date('d-m-Y', strtotime($datexii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('text288'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
                                                </div>
                                                <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                <div class="help-block"><?php echo form_error('text288'); ?></div>
												
                                            </div>
                                            </div>
										</div>
									  
						                <div class="ln_solid"></div>
										 
										<div class="row" style="font-size: 16px;">
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -115px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text289'); ?></div>
											<div class="help-block"><?php echo form_error('text289'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												 <option value="කරමි."> කරමි.</option>
                                                 <option value="නොකරමි."> නොකරමි.</option> 
											</select>
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
								</div>
										 
										<div class="row" style="font-size: 16px;">
											
										   <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexiii" name="datexiii" value="<?php echo isset($datexiii) && $datexiii != '' ? date('d-m-Y', strtotime($datexiii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexiii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('text290'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
                                                </div>
                                                <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                <div class="help-block"><?php echo form_error('text290'); ?></div>
												
                                            </div>
                                            </div>
										</div>
										 
										<div class="ln_solid"></div>
										 
										<div class="row" style="font-size: 16px;">
									
									<div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -115px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text291'); ?></div>
											<div class="help-block"><?php echo form_error('text291'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												 <option value="කරමි."> කරමි.</option>
                                                 <option value="නොකරමි."> නොකරමි.</option> 
											</select>
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										</div>
									</div>
									
								</div>
										 
										<div class="row" style="font-size: 16px;">
											
										   <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexiii" name="datexiii" value="<?php echo isset($datexiii) && $datexiii != '' ? date('d-m-Y', strtotime($datexiii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexiii'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('text292'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
                                                </div>
                                                <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                <div class="help-block"><?php echo form_error('text292'); ?></div>
												
                                            </div>
                                            </div>
										</div>
										 
										<div class="ln_solid"></div>
										 
										<div class="row" style="font-size: 16px;">
									
									<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text293'); ?></div>
											<div class="help-block"><?php echo form_error('text293'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											 <select  class="form-control col-md-7 col-xs-12" name="piriven_type" id="piriven_type">
												 <option value="ඇත.">ඇත.</option>                                           
                                                 <option value="නැත.">නැත.</option>
											</select>
                                               <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
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
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="applicant_p_address"  id="applicant_p_address" value="<?php echo isset($post['applicant_p_address']) ?  $post['applicant_p_address'] : ''; ?>" placeholder=""></textarea>
											 <div class="help-block"><?php echo form_error('applicant_p_address'); ?></div>
										 </div>
									</div>
								</div>
										 
										<div class="row" style="font-size: 16px;">
											
										   <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexiv" name="datexiv" value="<?php echo isset($datexiv) && $datexiv != '' ? date('d-m-Y', strtotime($datexiv)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo $this->lang->line('datexiv'); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
										
                                                <label for="photo"> <?php echo $this->lang->line('p_edu_director'); ?> </label>                                           
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
                                                </div>
                                                <div class="text-info" style="font-size: 14px;"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                                <div class="help-block"><?php echo form_error('p_edu_director'); ?></div>
												
                                            </div>
                                            </div>
										</div>
										 
										<div class="ln_solid"></div>
										 
										 <div class="row" style="border: 2px solid #73879C; margin: 2px">
										 
										 <div class="row">
											 <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px; text-align: center;">
										         <div class="item form-group">
											         <div><h3 style="font-size: 20px;text-decoration: underline;"><strong><?php echo $this->lang->line('text18'); ?></strong></h3></div>
											         <div class="help-block"><?php echo form_error('text18'); ?></div>
										         </div>
									         </div>	
										 </div>
										 
										 <div class="row" style="font-size: 16px; margin: 0px 2px">
											
										   <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                   
													<div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
														<div class="item form-group">
															<div><?php echo $this->lang->line('text295'); ?>:-</div>
															<div class="help-block"><?php echo form_error('text295'); ?></div>
														</div>
													</div>
									
									                <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										                <div class="item form-group">
											                 <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datexv" name="datexv" value="<?php echo isset($datexv) && $datexv != '' ? date('d-m-Y', strtotime($datexiv)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>" type="text" autocomplete="off">
                                                            <div class="help-block"><?php echo $this->lang->line('datexv'); ?></div>
										                </div>
									                </div>
                                                </div>
                                            </div>

                                           <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                   
													<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
														<div class="item form-group">
															<div><?php echo $this->lang->line('text296'); ?>:-</div>
															<div class="help-block"><?php echo form_error('text296'); ?></div>
														</div>
													</div>
									
									                <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										                <div class="item form-group">
											                 <input  class="form-control col-md-7 col-xs-12" name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder=""  type="text" autocomplete="off">
                                                             <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
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
															<div><?php echo $this->lang->line('text297'); ?>:-</div>
															<div class="help-block"><?php echo form_error('text297'); ?></div>
														</div>
													</div>
									
									                <div class="col-md-6 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										                <div class="item form-group">
										
                                                                                         
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="applicant_sig1"  id="applicant_sig1"  type="file">
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
															<div><?php echo $this->lang->line('text298'); ?>:-</div>
															<div class="help-block"><?php echo form_error('text298'); ?></div>
														</div>
													</div>
									
									                <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										                <div class="item form-group">
											                <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="applicant_p_address"  id="applicant_p_address" value="<?php echo isset($post['applicant_p_address']) ?  $post['applicant_p_address'] : ''; ?>" placeholder=""></textarea>
											                <div class="help-block"><?php echo form_error('applicant_p_address'); ?></div>
										                </div>
									                </div>
                                                </div>
                                            </div>
											 
										</div>
										
										</div>
										

                                    </div>

								 <!--===============================================================================================================================-->
                                </div>
								
								<div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('forms/teacherapp'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- datatable with buttons -->
<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>

 <link href="<?php echo VENDOR_URL; ?>timepicker/timepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>timepicker/timepicker.js"></script>
<!-- datatable with buttons -->
<script type="text/javascript">


	      //$('#add_datei').datepicker({startView: 2});
	     $('#add_datei').datepicker({startView: 2});
	     $('#add_datehii').datepicker({startView: 2});
	     $('#add_datehiii').datepicker({startView: 2});
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

<script type="text/javascript">
    function add_more1(fn_stop_1container) {
        var data = '<tr>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="number" name="exam_id1[]" class="answer" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subject1[]" value="" placeholder="<?php echo $this->lang->line('text216'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_results1[]" value="" placeholder="<?php echo $this->lang->line('text215'); ?>"/>'
                + '</td>'
		        + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="number" name="exam_id2[]" class="answer" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subject2[]" value="" placeholder="<?php echo $this->lang->line('text216'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_results2[]" value="" placeholder="<?php echo $this->lang->line('text215'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                + '</td>'
                + '</tr>';
        $('.' + fn_stop_1container).append(data);
    }


    function remove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('forms/teacherapp/remove_stop1'); ?>",
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

	
	 $(document).ready(function(){
  
       $('#fn_ok').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.present').prop('checked', true);
           }else{
               $('.present').prop('checked', false);
           }           
       });
       
       
       $('#fn_notok').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.late').prop('checked', true);
           }else{
              $('.late').prop('checked', false); 
           }           
       });


		 
		  $('.fn_all_attendnce').click(function(){
           
          var status     = $(this).prop('checked') ? $(this).val() : '';         
          var school_id   = $('#school_id').val();

          var obj        = $(this);
          
          $.ajax({       
          
            success: function(response){ 
                if(response == 'ay'){
                    
                    toastr.error('<?php echo $this->lang->line('set_academic_year_for_school'); ?>'); 
                    $('.fn_single_attendnce').prop('checked', false);
                    $(obj).prop('checked', false);
                    
                }else if(response == 1){
                    toastr.success('<?php echo $this->lang->line('update_success'); ?>'); 
                }else{
                    toastr.error('<?php echo $this->lang->line('update_failed'); ?>'); 
                    $('.fn_single_attendnce').prop('checked', false);
                    $(obj).prop('checked', false);
                }           
            }
        }); 
                      
       });
  });


</script>

<script type="text/javascript">
    function add_more2(fn_stop_2container) {
        var data = '<tr>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="number" name="exam_idh1[]" class="answer" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subjecth1[]" value="" placeholder="<?php echo $this->lang->line('text216'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_resultsh1[]" value="" placeholder="<?php echo $this->lang->line('text215'); ?>"/>'
                + '</td>'
		        + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="number" name="exam_idh2[]" class="answer" placeholder="<?php echo $this->lang->line('19a_a'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_subjecth2[]" value="" placeholder="<?php echo $this->lang->line('text216'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="exam_resultsh2[]" value="" placeholder="<?php echo $this->lang->line('text215'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                + '</td>'
                + '</tr>';
        $('.' + fn_stop_2container).append(data);
    }


    function remove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('forms/teacherapp/remove_stop2'); ?>",
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

	
	 $(document).ready(function(){
  
       $('#fn_ok').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.present').prop('checked', true);
           }else{
               $('.present').prop('checked', false);
           }           
       });
       
       
       $('#fn_notok').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.late').prop('checked', true);
           }else{
              $('.late').prop('checked', false); 
           }           
       });


		 
		  $('.fn_all_attendnce').click(function(){
           
          var status     = $(this).prop('checked') ? $(this).val() : '';         
          var school_id   = $('#school_id').val();

          var obj        = $(this);
          
          $.ajax({       
          
            success: function(response){ 
                if(response == 'ay'){
                    
                    toastr.error('<?php echo $this->lang->line('set_academic_year_for_school'); ?>'); 
                    $('.fn_single_attendnce').prop('checked', false);
                    $(obj).prop('checked', false);
                    
                }else if(response == 1){
                    toastr.success('<?php echo $this->lang->line('update_success'); ?>'); 
                }else{
                    toastr.error('<?php echo $this->lang->line('update_failed'); ?>'); 
                    $('.fn_single_attendnce').prop('checked', false);
                    $(obj).prop('checked', false);
                }           
            }
        }); 
                      
       });
  });


</script>

<script type="text/javascript">
    function add_more3(fn_stop_3container) {
        var data = '<tr>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="text" name="working_place[]" class="answer" placeholder="<?php echo $this->lang->line('text225'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="working_position[]" value="" placeholder="<?php echo $this->lang->line('text226'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="working_from[]" value="" placeholder="<?php echo $this->lang->line('from'); ?>"/>'
                + '</td>'
		        + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12"  type="text" name="working_to[]" class="answer" placeholder="<?php echo $this->lang->line('to'); ?>" />'
                + '</td>'
                + '<td>'
                + '<a  class="btn btn-danger btn-md " onclick="remove(this);" style="margin-bottom: -0px;" > - </a>'
                + '</td>'
                + '</tr>';
        $('.' + fn_stop_3container).append(data);
    }


    function remove(obj, stop_id) {

        // remove stop from database
        if (stop_id)
        {
            if (confirm('<?php echo $this->lang->line('confirm_alert'); ?>')) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('forms/teacherapp/remove_stop3'); ?>",
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

	
	 $(document).ready(function(){
  
       $('#fn_ok').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.present').prop('checked', true);
           }else{
               $('.present').prop('checked', false);
           }           
       });
       
       
       $('#fn_notok').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.late').prop('checked', true);
           }else{
              $('.late').prop('checked', false); 
           }           
       });


		 
		  $('.fn_all_attendnce').click(function(){
           
          var status     = $(this).prop('checked') ? $(this).val() : '';         
          var school_id   = $('#school_id').val();

          var obj        = $(this);
          
          $.ajax({       
          
            success: function(response){ 
                if(response == 'ay'){
                    
                    toastr.error('<?php echo $this->lang->line('set_academic_year_for_school'); ?>'); 
                    $('.fn_single_attendnce').prop('checked', false);
                    $(obj).prop('checked', false);
                    
                }else if(response == 1){
                    toastr.success('<?php echo $this->lang->line('update_success'); ?>'); 
                }else{
                    toastr.error('<?php echo $this->lang->line('update_failed'); ?>'); 
                    $('.fn_single_attendnce').prop('checked', false);
                    $(obj).prop('checked', false);
                }           
            }
        }); 
                      
       });
  });


</script>




