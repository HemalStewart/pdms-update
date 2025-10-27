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
	

</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-exchange"></i><small> <?php echo $this->lang->line('teacher_transfer_form'); ?></small></h3>
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
                        ?>"><a href="#tab_teachertransfer_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'forms', 'teachertransfer')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('forms/teachertransferformadd'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_teachertransfer"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?> 
						
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_teachertransfer"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>   
						
                        <?php if (isset($detail)) { ?>
                            <li  class="active"><a href="#tab_view_teachertransferform"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('view'); ?></a> </li>                          
                        <?php } ?> 

                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_teachertransfer_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th><?php echo $this->lang->line('cur_status'); ?></th>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){   ?>
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
                                        if (isset($teachertransferformval) && !empty($teachertransferformval)) {
                                            ?>
                                           <?php
                                            foreach ($teachertransferformval as $obj) {
                                                $CurStatusID = $obj->cur_status;

                                                if ($CurStatusID == 1) {
                                                    $Status1 = "Just Created";
                                                    $color = "bg-red";
                                                } elseif ($CurStatusID == 2) {
                                                    $Status1 = "Forwarded to Provincial Director";
                                                    $color = "bg-orange";
												} elseif ($CurStatusID == 3) {
                                                    $Status1 = "Forwarded to Ministry";
                                                    $color = "bg-red";
                                                } elseif ($CurStatusID == 4) {
                                                    $Status1 = "Approved";
                                                    $color = "bg-blue";
                                                } elseif ($CurStatusID == 5) {
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
                                                    <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>
                                                        <td><?php echo $obj->school_name;?></td>
                                                    <?php }  ?>
                                                    
                                                    <td><?php echo $obj->applicant_name; ?></td>
                                                    <td><?php echo $obj->piriven_name; ?></td>
                                                    <td><?php echo $obj->piriven_address; ?></td>
                                    
                                                    <td><?php echo $obj->created_at; ?></td>
                                                    <td>
                                                         <?php if (has_permission(EDIT, 'forms', 'teachertransfer')) { ?>
                                                            <a href="<?php echo site_url('forms/teachertransferformedit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php  } ?>
														
														<?php if (has_permission(VIEW, 'forms', 'teachertransfer')) { ?>
                                                            <a  onclick="get_teachertransferform_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-teachertransferform-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>
													
														 <?php if (has_permission(DELETE, 'forms', 'teachertransfer')) { ?> 
                                                                <a href="<?php echo site_url('forms/teachertransferformdelete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                        <?php } ?>
														
														<?php if (has_permission(EDIT, 'forms', 'teachertransfer') && $obj->confirmstatus != 2) { ?>
                                                            <a href="<?php echo site_url('forms/teachertransferformconfirm/' . $obj->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('confirm'); ?> </a>
                                                        <?php } ?>
														
														<?php if(has_permission(VIEW, 'forms', 'teachertransfer')){ ?>
														  <a href="<?php echo site_url('forms/teacher_transfer_print/' . $obj->id); ?>" class="btn btn-success2 btn-xs" target="_blank"><i class="fa fa-print" style="color: #ffffff;"></i> <?php echo $this->lang->line('print'); ?> </a>
														
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if (isset($add)) { echo 'active'; } ?>" id="tab_add_teachertransfer">
							
                            <div class="x_content"> 
                                <?php echo form_open(site_url('forms/teachertransferformadd'),array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left','enctype' => 'multipart/form-data'), ''); ?>
								
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="text-align:center; font-size: 20px; text-decoration: underline"><strong><?php echo $this->lang->line('text100'); ?></strong></h4>
                                    </div>
                                </div>
								
								<br><br>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>01.&nbsp;<?php echo $this->lang->line('text101'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text101'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-8 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="applicant_name"  id="applicant_name" value="<?php echo isset($post['applicant_name']) ?  $post['applicant_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('applicant_name'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>02.&nbsp;&nbsp;<?php echo $this->lang->line('text102'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text102'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_name"  id="piriven_name" value="<?php echo isset($post['piriven_name']) ?  $post['piriven_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_name'); ?>"></textarea>
											 <div class="help-block"><?php echo form_error('piriven_name'); ?></div>
										 </div>
									</div>
									
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_address"  id="piriven_address" value="<?php echo isset($post['piriven_address']) ?  $post['piriven_address'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_address'); ?>"></textarea>
											 <div class="help-block"><?php echo form_error('piriven_address'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>03.&nbsp;&nbsp;<?php echo $this->lang->line('district'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('district'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="district"  id="district" value="<?php echo isset($post['district']) ?  $post['district'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('district'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>04.&nbsp;&nbsp;<?php echo $this->lang->line('text103'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text103'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datei" name="datei" value="<?php echo isset($datei) && $datei != '' ? date('d-m-Y', strtotime($datei)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('datei'); ?></div>
										 </div>
									</div>
								</div>
								
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>05.&nbsp;&nbsp;<?php echo $this->lang->line('text104'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text104'); ?></div>
                                      </div>
                                     </div>
									
									 <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                             <input  class="form-control col-md-7 col-xs-12"  name="approval_no"  id="approval_no" value="<?php echo isset($post['approval_no']) ?  $post['approval_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('number2'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo form_error('approval_no'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateii" name="dateii" value="<?php echo isset($dateii) && $dateii != '' ? date('d-m-Y', strtotime($dateii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('dateii'); ?></div>
										 </div>
									</div>
								</div>
								
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>06.&nbsp;&nbsp;<?php echo $this->lang->line('birth_date'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('birth_date'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateiii" name="dateiii" value="<?php echo isset($dateiii) && $dateiii != '' ? date('d-m-Y', strtotime($dateiii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('dateiii'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>07.&nbsp;&nbsp;<?php echo $this->lang->line('text105'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text105'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-6 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="qualifications"  id="qualifications" value="<?php echo isset($post['qualifications']) ?  $post['qualifications'] : ''; ?>" placeholder=""></textarea>
											 <div class="help-block"><?php echo form_error('qualifications'); ?></div>
										 </div>
									</div>
								</div>
								
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>08.&nbsp;&nbsp;<?php echo $this->lang->line('text106'); ?> :-</div>
											<div>&nbsp;&nbsp;(<?php echo $this->lang->line('text107'); ?>)</div>
                                             <div class="help-block"><?php echo form_error('text106'); ?></div>
                                      </div>
                                     </div>
									
									 <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                             <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="grade_subject"  id="grade_subject" value="<?php echo isset($post['grade_subject']) ?  $post['grade_subject'] : ''; ?>" placeholder=""></textarea>
											 <div class="help-block"><?php echo form_error('grade_subject'); ?></div>
                                        </div>
                                     </div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>09.&nbsp;&nbsp;<?php echo $this->lang->line('text108'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text108'); ?></div>
                                      </div>
                                     </div>
									
									 <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                             <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="salary_info"  id="salary_info" value="<?php echo isset($post['salary_info']) ?  $post['salary_info'] : ''; ?>" placeholder=""></textarea>
											 <div class="help-block"><?php echo form_error('salary_info'); ?></div>
                                        </div>
                                     </div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>10.&nbsp;&nbsp;<?php echo $this->lang->line('text109'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text109'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="transfer_piriven_name"  id="transfer_piriven_name" value="<?php echo isset($post['transfer_piriven_name']) ?  $post['transfer_piriven_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_name'); ?>"></textarea>
											 <div class="help-block"><?php echo form_error('transfer_piriven_name'); ?></div>
										 </div>
									</div>
									
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="transfer_piriven_address"  id="transfer_piriven_address" value="<?php echo isset($post['transfer_piriven_address']) ?  $post['transfer_piriven_address'] : ''; ?>" placeholder="<?php echo $this->lang->line('school_address'); ?>"></textarea>
											 <div class="help-block"><?php echo form_error('transfer_piriven_address'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>11.&nbsp;&nbsp;<?php echo $this->lang->line('district'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('district'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="transfer_district"  id="transfer_district" value="<?php echo isset($post['transfer_district']) ?  $post['transfer_district'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('transfer_district'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>12.&nbsp;&nbsp;<?php echo $this->lang->line('text110'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text110'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateiv" name="dateiv" value="<?php echo isset($dateiv) && $dateiv != '' ? date('d-m-Y', strtotime($dateiv)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('dateiv'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datev" name="datev" value="<?php echo isset($datev) && $datev != '' ? date('d-m-Y', strtotime($datev)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('datev'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text111'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig1_photo"  id="sig1_photo" type="file">
												</div>
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig1_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
							   <!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text112'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -100px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text113'); ?></div>
											<div class="help-block"><?php echo form_error('text113'); ?></div>
										</div>
									</div>
									
							<!--		<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person1" id="person1" style="font-size:17px;">
												<option value="Reverend">Reverend</option>                                           
                                                <option value="Mr.">Mr.</option>
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									-->
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person1" id="person1" style="font-size:17px;">
												 <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="reverend" <?php
                                                if (isset($post['person1']) && $post['person1'] == 'reverend') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('reverend'); ?></option>
												<option value="mr" <?php
                                                if (isset($post['person1']) && $post['person1'] == 'mr') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('mr'); ?></option> 
                                               
											</select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text114'); ?></div>
											<div class="help-block"><?php echo form_error('text114'); ?></div>
										</div>
									</div>
									
							<!--		<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person2" id="person2" style="font-size:17px;">
												<option value="පරිවේණාධිපති">පරිවේණාධිපති</option>                                           
                                                <option value="පරිවෙණාචාර්යවරයෙකු">පරිවෙණාචාර්යවරයෙකු</option>
											</select>
											<div class="help-block"><?php echo form_error('person2'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text115'); ?></div>
											<div class="help-block"><?php echo form_error('text115'); ?></div>
										</div>
									</div>-->
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="yes_no" id="yes_no" style="font-size:17px;">
												<option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="withoutincomer" <?php
                                                if (isset($post['yes_no']) && $post['yes_no'] == 'withoutincomer') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('withoutincomer'); ?></option>
												<option value="withincomer" <?php
                                                if (isset($post['yes_no']) && $post['yes_no'] == "withincomer") {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('withincomer'); ?></option> 
												
											</select>
											<div class="help-block"><?php echo form_error('yes_no'); ?></div>
										</div>
									</div>
									
								</div>
								
								<!--<div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text116'); ?></div>
											<div class="help-block"><?php echo form_error('text116'); ?></div>
										</div>
									</div>
									
								</div>
								-->
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datevi" name="datevi" value="<?php echo isset($datevi) && $datevi != '' ? date('d-m-Y', strtotime($datevi)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('datev'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text117'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig2_photo"  id="sig2_photo" type="file">
												</div>
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig2_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
							
							   <!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text118'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text119'); ?></div>
											<div class="help-block"><?php echo form_error('text119'); ?></div>
										</div>
									</div>
									
								</div>
							
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"   type="text" id="add_datevii" name="datevii" value="<?php echo isset($datevii) && $datevii != '' ? date('d-m-Y', strtotime($datevii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('datev'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('datevii'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text120'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig3_photo"  id="sig3_photo" type="file">
												</div>
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig3_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
								
								<!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text121'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                        <div class="item form-group"> 
                                            <div>01.&nbsp;&nbsp;<?php echo $this->lang->line('text122'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text122'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="count1"  id="count1" value="<?php echo isset($post['count1']) ?  $post['count1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('count1'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                        <div class="item form-group"> 
                                            <div>02.&nbsp;&nbsp;<?php echo $this->lang->line('text123'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text123'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-2 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="count2"  id="count2" value="<?php echo isset($post['count2']) ?  $post['count2'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('count2'); ?></div>
										 </div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -50px;">
                                        <div class="item form-group"> 
                                            <div>&nbsp;&nbsp;<?php echo $this->lang->line('text123a'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text123a'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-2 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="monk"  id="monk" value="<?php echo isset($post['monk']) ?  $post['monk'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('monk'); ?></div>
										 </div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -105px;">
                                        <div class="item form-group"> 
                                            <div>&nbsp;&nbsp;<?php echo $this->lang->line('text123b'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text123b'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-2 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="lay"  id="lay" value="<?php echo isset($post['lay']) ?  $post['lay'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('lay'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px; text-align: center">
                                     <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                        <div class="item form-group"> 
                                            <div>(&nbsp;&nbsp;<?php echo $this->lang->line('text124'); ?>)</div>
                                             <div class="help-block"><?php echo form_error('text124'); ?></div>
                                      </div>
                                     </div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                        <div class="item form-group"> 
                                            <div>03.&nbsp;&nbsp;<?php echo $this->lang->line('text125'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text125'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="count3"  id="count3" value="<?php echo isset($post['count3']) ?  $post['count3'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('count3'); ?></div>
										 </div>
									</div>
								</div>
								
								<br><br>
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -30px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text126'); ?></div>
											<div class="help-block"><?php echo form_error('text126'); ?></div>
										</div>
									</div>
									
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person3" id="person3" style="font-size:17px;">
												 <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="venerable" <?php
                                                if (isset($post['person3']) && $post['person3'] == 'venerable') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('venerable'); ?></option>
												<option value="mr" <?php
                                                if (isset($post['person3']) && $post['person3'] == 'mr') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('mr'); ?></option> 
											</select>
											<div class="help-block"><?php echo form_error('person3'); ?></div>
										</div>
									</div>
									
									<div class="col-md-5 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="person_name"  id="person_name" value="<?php echo isset($post['person_name']) ?  $post['person_name'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('person_name'); ?></div>
										 </div>
									</div>
							
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -75px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text127'); ?></div>
											<div class="help-block"><?php echo form_error('text127'); ?></div>
										</div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person4" id="person4" style="font-size:17px;">
												 <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
												<option value="parivenadhipati" <?php
                                                if (isset($post['person4']) && $post['person4'] == 'parivenadhipati') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('parivenadhipati'); ?></option>
												<option value="parivenacharya" <?php
                                                if (isset($post['person4']) && $post['person4'] == 'parivenacharya') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>><?php echo $this->lang->line('parivenacharya'); ?></option> 
											</select>
											<div class="help-block"><?php echo form_error('person4'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -85px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text128'); ?></div>
											<div class="help-block"><?php echo form_error('text128'); ?></div>
										</div>
									</div>
									<!--
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person5" id="person5" style="font-size:17px;">
												<option value="උන්වහන්සේට">උන්වහන්සේට</option>                                           
                                                <option value="ඔහුට">ඔහුට</option>
											</select>
											<div class="help-block"><?php echo form_error('person5'); ?></div>
										</div>
									</div>-->
									
									<div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -25px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text129'); ?></div>
											<div class="help-block"><?php echo form_error('text129'); ?></div>
										</div>
									</div>
									
									<div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -25px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text130'); ?></div>
											<div class="help-block"><?php echo form_error('text130'); ?></div>
										</div>
									</div>
								</div>
								
								<br><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateviii" name="dateviii" value="<?php echo isset($dateviii) && $dateviii != '' ? date('d-m-Y', strtotime($dateviii)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('dateviii'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text117'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig4_photo"  id="sig4_photo" type="file">
												</div>
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig4_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
								
								<br>
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                        <div class="item form-group"> 
                                            <div>&nbsp;&nbsp;<?php echo $this->lang->line('text131'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text131'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-7 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="piriven_name1"  id="piriven_name1" value="<?php echo isset($post['piriven_name1']) ?  $post['piriven_name1'] : ''; ?>" placeholder="" type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										 </div>
									</div>
								</div>
								
								
								<!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text132'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text133'); ?></div>
											<div class="help-block"><?php echo form_error('text133'); ?></div>
										</div>
									</div>
									
								</div>
							
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"   type="text" id="add_dateix" name="dateix" value="<?php echo isset($dateix) && $dateix != '' ? date('d-m-Y', strtotime($dateix)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('dateix'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text120'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig5_photo"  id="sig5_photo" type="file">
												</div>
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig5_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>							

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($schools) ? $schools->id : $id; ?>" name="school_id" id="school_id" />
                                        <a  href="<?php echo site_url('forms/teachertransferform'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>

                        </div>
						
						
						 <?php if (isset($edit)) { ?>

                            <div class="tab-pane fade in active" id="tab_edit_teachertransfer">
                                <div class="x_content"> 
                                   
	                              <!-- <?php echo form_open(site_url('forms/teachertransferformedit/' . $forms->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left','enctype' => 'multipart/form-data'), ''); ?>-->
									
									<?php echo form_open_multipart(site_url('forms/teachertransferformedit/'. $forms->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
									
									
								<div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="text-align:center; font-size: 20px; text-decoration: underline"><strong><?php echo $this->lang->line('text100'); ?></strong></h4>
                                    </div>
                                </div>
								
								<br><br>
									
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>01.&nbsp;<?php echo $this->lang->line('text101'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text101'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-8 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 
											 <input  class="form-control col-md-7 col-xs-12"  name="applicant_name"  id="applicant_name" value="<?php echo isset($forms->applicant_name) ? $forms->applicant_name : ''; ?>" placeholder="<?php echo $this->lang->line('applicant_name'); ?>"  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('applicant_name'); ?></div>
											 
										 </div>
									</div>
								</div> 
									
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>02.&nbsp;&nbsp;<?php echo $this->lang->line('text102'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text102'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											<textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_name"  id="piriven_name"  placeholder="<?php echo $this->lang->line('piriven_name'); ?>"><?php echo isset($forms->piriven_name) ? $forms->piriven_name : ''; ?></textarea>
											 <div class="help-block"><?php echo form_error('piriven_name'); ?></div>
										 </div>
									</div>
									
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="piriven_address"  id="piriven_address"  placeholder="<?php echo $this->lang->line('piriven_address'); ?>"><?php echo isset($forms->piriven_address) ? $forms->piriven_address : ''; ?></textarea>
											 <div class="help-block"><?php echo form_error('piriven_address'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>03.&nbsp;&nbsp;<?php echo $this->lang->line('district'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('district'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="district"  id="district" value="<?php echo isset($forms->district) ? $forms->district : ''; ?>" placeholder="<?php echo $this->lang->line('district'); ?>"  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('district'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>04.&nbsp;&nbsp;<?php echo $this->lang->line('text103'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text103'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											
											 <input  class="form-control col-md-7 col-xs-12"  name="datei"  id="edit_datei" value="<?php echo isset($forms->datei) ? date('d-m-Y', strtotime($forms->datei)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('datei'); ?></div>
										 </div>
									</div>
								</div>
									
									
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>05.&nbsp;&nbsp;<?php echo $this->lang->line('text104'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text104'); ?></div>
                                      </div>
                                     </div>
									
									 <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <input  class="form-control col-md-7 col-xs-12"  name="approval_no"  id="approval_no" value="<?php echo isset($forms->approval_no) ? $forms->approval_no : ''; ?>" placeholder="<?php echo $this->lang->line('number2'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo form_error('approval_no'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											  <input  class="form-control col-md-7 col-xs-12"  name="dateii"  id="edit_dateii" value="<?php echo isset($forms->dateii) ? date('d-m-Y', strtotime($forms->dateii)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('dateii'); ?></div>
										 </div>
									</div>
								</div>
									
									
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>06.&nbsp;&nbsp;<?php echo $this->lang->line('birth_date'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('birth_date'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="dateiii"  id="edit_dateiii" value="<?php echo isset($forms->dateiii) ? date('d-m-Y', strtotime($forms->dateiii)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('dateiii'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>07.&nbsp;&nbsp;<?php echo $this->lang->line('text105'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text105'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-6 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="qualifications"  id="qualifications"  placeholder="<?php echo $this->lang->line('qualifications'); ?>"><?php echo isset($forms->qualifications) ? $forms->qualifications : ''; ?></textarea>
											 <div class="help-block"><?php echo form_error('qualifications'); ?></div>
										 </div>
									</div>
								</div>
									
									
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>08.&nbsp;&nbsp;<?php echo $this->lang->line('text106'); ?> :-</div>
											<div>&nbsp;&nbsp;(<?php echo $this->lang->line('text107'); ?>)</div>
                                             <div class="help-block"><?php echo form_error('text106'); ?></div>
                                      </div>
                                     </div>
									
									 <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                              <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="grade_subject"  id="grade_subject"  placeholder=""><?php echo isset($forms->grade_subject) ? $forms->grade_subject : ''; ?></textarea>
											 <div class="help-block"><?php echo form_error('grade_subject'); ?></div>
                                        </div>
                                     </div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>09.&nbsp;&nbsp;<?php echo $this->lang->line('text108'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text108'); ?></div>
                                      </div>
                                     </div>
									
									 <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                              <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="salary_info"  id="salary_info"  placeholder=""><?php echo isset($forms->salary_info) ? $forms->salary_info : ''; ?></textarea>
											 <div class="help-block"><?php echo form_error('salary_info'); ?></div>
                                        </div>
                                     </div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>10.&nbsp;&nbsp;<?php echo $this->lang->line('text109'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text109'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="transfer_piriven_name"  id="transfer_piriven_name"  placeholder="<?php echo $this->lang->line('school_name'); ?>"><?php echo isset($forms->transfer_piriven_name) ? $forms->transfer_piriven_name : ''; ?></textarea>
											 <div class="help-block"><?php echo form_error('transfer_piriven_name'); ?></div>
										 </div>
									</div>
									
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											  <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="transfer_piriven_address"  id="transfer_piriven_address"  placeholder="<?php echo $this->lang->line('school_address'); ?>"><?php echo isset($forms->transfer_piriven_address) ? $forms->transfer_piriven_address : ''; ?></textarea>
											 <div class="help-block"><?php echo form_error('transfer_piriven_address'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>11.&nbsp;&nbsp;<?php echo $this->lang->line('district'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('district'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="transfer_district"  id="transfer_district" value="<?php echo isset($forms->transfer_district) ? $forms->transfer_district : ''; ?>" placeholder="<?php echo $this->lang->line('district'); ?>"  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('transfer_district'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -5px;">
                                        <div class="item form-group"> 
                                            <div>12.&nbsp;&nbsp;<?php echo $this->lang->line('text110'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text110'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="dateiv"  id="edit_dateiv" value="<?php echo isset($forms->dateiv) ? date('d-m-Y', strtotime($forms->dateiv)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>"  type="text" autocomplete="off">
                                             <div class="help-block"><?php echo $this->lang->line('dateiv'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"  name="datev"  id="edit_datev" value="<?php echo isset($forms->datev) ? date('d-m-Y', strtotime($forms->datev)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>"  type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('datev'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text111'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig1_photo"  id="sig1_photo" type="file">
												</div>
												
												<input type="hidden" name="prev_sig1_photo" id="prev_sig1_photo" value="<?php echo $forms->sig1_photo; ?>" />
                                                <?php if ($forms->sig1_photo) { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig1_photo; ?>" alt="" width="70" /><br/><br/>
                                                <?php } ?>
												
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig1_photo'); ?></div>
											</div>
										
										</div>
									</div>
								</div>
									
								<!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text112'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text113'); ?></div>
											<div class="help-block"><?php echo form_error('text113'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person1" id="edit_person1" style="font-size:17px;">
												<!--<option value="" style="text-align: center; font-weight: 700"><?php echo $forms->person1; ?></option>-->
												<option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                    <option value="reverend" <?php
                                                    if ($forms->person1 == 'reverend') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('reverend'); ?></option>
													<option value="mr" <?php
                                                    if ($forms->person1 == 'mr') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('mr'); ?></option>
                                                                                         
                                                </select>
											<div class="help-block"><?php echo form_error('person1'); ?></div>
										</div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -55px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text114'); ?></div>
											<div class="help-block"><?php echo form_error('text114'); ?></div>
										</div>
									</div>
									
									<!--<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person2" id="person2" style="font-size:17px;">
												<option value="" style="text-align: center; font-weight: 700"><?php echo $forms->person2; ?></option>
												<option value="පරිවේණාධිපති">පරිවේණාධිපති</option>                                           
                                                <option value="පරිවෙණාචාර්යවරයෙකු">පරිවෙණාචාර්යවරයෙකු</option>
											</select>
											<div class="help-block"><?php echo form_error('person2'); ?></div>
										</div>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text115'); ?></div>
											<div class="help-block"><?php echo form_error('text115'); ?></div>
										</div>
									</div>-->
									
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="yes_no" id="edit_yes_no" style="font-size:17px;">
												<!--<option value="" style="text-align: center; font-weight: 700"><?php echo $forms->yes_no; ?></option>-->
												<option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                    <option value="withoutincomer" <?php
                                                    if ($forms->yes_no == 'withoutincomer') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('withoutincomer'); ?></option>
													<option value="withincomer" <?php
                                                    if ($forms->yes_no == 'withincomer') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('withincomer'); ?></option>
											</select>
											<div class="help-block"><?php echo form_error('yes_no'); ?></div>
										</div>
									</div>
									
								</div>
								
								<!--<div class="row" style="font-size: 16px;">
									
									<div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text116'); ?></div>
											<div class="help-block"><?php echo form_error('text116'); ?></div>
										</div>
									</div>
									
								</div>-->
								
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"  name="datevi"  id="edit_datevi" value="<?php echo isset($forms->datevi) ? date('d-m-Y', strtotime($forms->datevi)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('datevi'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text117'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig2_photo"  id="sig2_photo" type="file">
												</div>
												
												<input type="hidden" name="prev_sig2_photo" id="prev_sig2_photo" value="<?php echo $forms->sig2_photo; ?>" />
                                                <?php if ($forms->sig2_photo) { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig2_photo; ?>" alt="" width="70" /><br/><br/>
                                                <?php } ?>
												
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig2_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
									
							    <!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text118'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text119'); ?></div>
											<div class="help-block"><?php echo form_error('text119'); ?></div>
										</div>
									</div>
									
								</div>
							
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"  name="datevii"  id="edit_datevii" value="<?php echo isset($forms->datevii) ? date('d-m-Y', strtotime($forms->datevii)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>"  type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('datevii'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text120'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig3_photo"  id="sig3_photo" type="file">
												</div>
												
												<input type="hidden" name="prev_sig3_photo" id="prev_sig3_photo" value="<?php echo $forms->sig3_photo; ?>" />
                                                <?php if ($forms->sig3_photo) { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig3_photo; ?>" alt="" width="70" /><br/><br/>
                                                <?php } ?>
												
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig3_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
									
								<!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text121'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -80px;">
                                        <div class="item form-group"> 
                                            <div>01.&nbsp;&nbsp;<?php echo $this->lang->line('text122'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text122'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-3 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="count1"  id="count1" value="<?php echo isset($forms->count1) ? $forms->count1 : ''; ?>" placeholder=""  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('count1'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                        <div class="item form-group"> 
                                            <div>02.&nbsp;&nbsp;<?php echo $this->lang->line('text123'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text123'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-2 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="count2"  id="count2" value="<?php echo isset($forms->count2) ? $forms->count2 : ''; ?>" placeholder=""  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('count2'); ?></div>
										 </div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -105px;">
                                        <div class="item form-group"> 
                                            <div>&nbsp;&nbsp;<?php echo $this->lang->line('text123a'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text123a'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-2 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="monk"  id="monk" value="<?php echo isset($forms->monk) ? $forms->monk : ''; ?>" placeholder=""  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('monk'); ?></div>
										 </div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -105px;">
                                        <div class="item form-group"> 
                                            <div>&nbsp;&nbsp;<?php echo $this->lang->line('text123b'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text123b'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-2 col-sm-2 col-xs-12">
										 <div class="item form-group">
											<input  class="form-control col-md-7 col-xs-12"  name="lay"  id="lay" value="<?php echo isset($forms->lay) ? $forms->lay : ''; ?>" placeholder=""  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('lay'); ?></div>
										 </div>
									</div>
								</div>
								
								<div class="row" style="font-size: 16px; text-align: center">
                                     <div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                        <div class="item form-group"> 
                                            <div>(&nbsp;&nbsp;<?php echo $this->lang->line('text124'); ?>)</div>
                                             <div class="help-block"><?php echo form_error('text124'); ?></div>
                                      </div>
                                     </div>
								</div>
								
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-5 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
                                        <div class="item form-group"> 
                                            <div>03.&nbsp;&nbsp;<?php echo $this->lang->line('text125'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text125'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-4 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="count3"  id="count3" value="<?php echo isset($forms->count3) ? $forms->count3 : ''; ?>" placeholder=""  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('count3'); ?></div>
										 </div>
									</div>
								</div>
								
								<br><br>
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -30px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text126'); ?></div>
											<div class="help-block"><?php echo form_error('text126'); ?></div>
										</div>
									</div>
									
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person3" id="edit_person3" style="font-size:17px;">
												<!--<option value="" style="text-align: center; font-weight: 700"><?php echo $forms->person3; ?></option>-->
												<option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                    <option value="venerable" <?php
                                                    if ($forms->person3 == 'venerable') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('venerable'); ?></option>
													<option value="mr" <?php
                                                    if ($forms->person3 == 'mr') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('mr'); ?></option>
											</select>
											<div class="help-block"><?php echo form_error('person3'); ?></div>
										</div>
									</div>
									
									<div class="col-md-5 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="person_name"  id="edit_person_name" value="<?php echo isset($forms->person_name) ? $forms->person_name : ''; ?>" placeholder=""  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('person_name'); ?></div>
										 </div>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -75px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text127'); ?></div>
											<div class="help-block"><?php echo form_error('text127'); ?></div>
										</div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person4" id="person4" style="font-size:17px;">
												<option value="">--<?php echo $this->lang->line('select'); ?>--</option>          
												      <option value="parivenadhipati" <?php
                                                    if ($forms->person4 == 'parivenadhipati') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('parivenadhipati'); ?></option>
													<option value="parivenacharya" <?php
                                                    if ($forms->person4 == 'parivenacharya') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>><?php echo $this->lang->line('parivenacharya'); ?></option>
											</select>
											<div class="help-block"><?php echo form_error('person4'); ?></div>
										</div>
									</div>
									
									<div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -155px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text128'); ?></div>
											<div class="help-block"><?php echo form_error('text128'); ?></div>
										</div>
									</div>
									
									<!--<div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: 0px;">
										<div class="item form-group">
											<select  class="form-control col-md-7 col-xs-12" name="person5" id="person5" style="font-size:17px;">
												<option value="" style="text-align: center; font-weight: 700"><?php echo $forms->person5; ?></option>
												<option value="උන්වහන්සේට">උන්වහන්සේට</option>                                           
                                                <option value="ඔහුට">ඔහුට</option>
											</select>
											<div class="help-block"><?php echo form_error('person5'); ?></div>
										</div>
									</div>-->
									
									<div class="col-md-7 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -25px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text129'); ?></div>
											<div class="help-block"><?php echo form_error('text129'); ?></div>
										</div>
									</div>
									
									<div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -25px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text130'); ?></div>
											<div class="help-block"><?php echo form_error('text130'); ?></div>
										</div>
									</div>
								</div>
								
								<br><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"  name="dateviii"  id="edit_dateviii" value="<?php echo isset($forms->dateviii) ? date('d-m-Y', strtotime($forms->dateviii)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('dateviii'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text117'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig4_photo"  id="sig4_photo" type="file">
												</div>
												
												<input type="hidden" name="prev_sig4_photo" id="prev_sig4_photo" value="<?php echo $forms->sig4_photo; ?>" />
                                                <?php if ($forms->sig4_photo) { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig4_photo; ?>" alt="" width="70" /><br/><br/>
                                                <?php } ?>
												
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig4_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
								
								<br>
								<div class="row" style="font-size: 16px;">
                                     <div class="col-md-3 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
                                        <div class="item form-group"> 
                                            <div>&nbsp;&nbsp;<?php echo $this->lang->line('text131'); ?> :-</div>
                                             <div class="help-block"><?php echo form_error('text131'); ?></div>
                                      </div>
                                     </div>
											 
									 <div class="col-md-7 col-sm-2 col-xs-12">
										 <div class="item form-group">
											 <input  class="form-control col-md-7 col-xs-12"  name="piriven_name1"  id="piriven_name1" value="<?php echo isset($forms->piriven_name1) ? $forms->piriven_name1 : ''; ?>" placeholder="<?php echo $this->lang->line('name1'); ?>"  type="text" autocomplete="off">
											 <div class="help-block"><?php echo form_error('piriven_name1'); ?></div>
										 </div>
									</div>
								</div>
									
												
								<!--***********************************************************************************************************-->
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h4  class="column-title" style="font-size: 18px; text-decoration: underline"><strong><?php echo $this->lang->line('text132'); ?> :-</strong></h4>
                                    </div>
                                </div>
								
								<div class="row" style="font-size: 16px;">
									
									<div class="col-md-12 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -45px;">
										<div class="item form-group">
											<div><?php echo $this->lang->line('text133'); ?></div>
											<div class="help-block"><?php echo form_error('text133'); ?></div>
										</div>
									</div>
									
								</div>
							
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label for="name"><?php echo $this->lang->line('date'); ?> :-</label>
												<input  class="form-control col-md-7 col-xs-12"  name="dateix"  id="edit_dateix" value="<?php echo isset($forms->dateix) ? date('d-m-Y', strtotime($forms->dateix)) : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
												<div class="help-block"><?php echo $this->lang->line('dateix'); ?></div>
											</div>
										</div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
											<div class="item form-group">
												<label ><?php echo $this->lang->line('text120'); ?></label>
												<label ><?php echo $this->lang->line('text117a'); ?></label>
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
													<input  class="form-control col-md-7 col-xs-12"  name="sig5_photo"  id="sig5_photo" type="file">
												</div>
												
												<input type="hidden" name="prev_sig5_photo" id="prev_sig5_photo" value="<?php echo $forms->sig5_photo; ?>" />
                                                <?php if ($forms->sig5_photo) { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig5_photo; ?>" alt="" width="70" /><br/><br/>
                                                <?php } ?>
												
												<div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
												<div class="help-block"><?php echo form_error('sig5_photo'); ?></div>
											</div>
										</div>
									</div>
								</div>
									
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                
											<input type="hidden" name="school_id" id="school_id" value="<?php echo isset($schools) ? $schools->id : $id; ?>" />
											<input type="hidden" name="schlformid" id="schlformid" value="<?php echo $forms->id; ?>" />
                                            <a href="<?php echo site_url('forms/teachertransferform'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
											
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>                          
                        <?php } ?>

						 <?php if (isset($detail)) { ?>
                            <div class="tab-pane fade in active" id="tab_view_teachertransferform">
                                <div class="x_content"> 
                                    <?php $this->load->view('get-single-teacher-transfer-form'); ?>
                                </div>
                            </div>
                        <?php } ?>
                       
                    </div>  


                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade bs-teachertransferform-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_teachertransferform_data">

            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

function get_teachertransferform_modal(teachertransferform_id) {

        $('.fn_teachertransferform_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('forms/get_single_teacher_transfer_form'); ?>",
            data: {teachertransferform_id: teachertransferform_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_teachertransferform_data').html(response);
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


	      $('#add_datei').datepicker({startView: 2});
	      $('#add_dateii').datepicker({startView: 2});
	      $('#add_dateiii').datepicker({startView: 2});
	      $('#add_dateiv').datepicker({startView: 2});
	      $('#add_datev').datepicker({startView: 2});
	      $('#add_datevi').datepicker({startView: 2});
	      $('#add_datevii').datepicker({startView: 2});
	      $('#add_dateviii').datepicker({startView: 2});
	      $('#add_dateix').datepicker({startView: 2});
	
	      $('#edit_datei').datepicker({startView: 2});
	      $('#edit_dateii').datepicker({startView: 2});
	      $('#edit_dateiii').datepicker({startView: 2});
	      $('#edit_dateiv').datepicker({startView: 2});
	      $('#edit_datev').datepicker({startView: 2});
	      $('#edit_datevi').datepicker({startView: 2});
	      $('#edit_datevii').datepicker({startView: 2});
	      $('#edit_dateviii').datepicker({startView: 2});
	      $('#edit_dateix').datepicker({startView: 2});
	
	
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
