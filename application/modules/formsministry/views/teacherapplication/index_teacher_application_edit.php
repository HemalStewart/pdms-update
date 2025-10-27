<style>
    .scrollit {
        overflow:scroll;

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
                      
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_teacherapplication"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('confirm'); ?></a> </li>                          
                        <?php } ?> 

                         

                    </ul>
                    <br/>

                    <div class="tab-content">
                       


                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_route">
                                <div class="x_content"> 
                                    <?php echo form_open(site_url('formsministry/formsapply/teacherapplicationformedit' . $route->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>


                                    <ul  class="nav nav-tabs bordered">
                                        <li  class="active" ><a href="#edit_tab_zero"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('pirven_fir'); ?></a> </li>

                                        <li><a href="#edit_tab_first"   role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_sec'); ?></a> </li>                          

                                        <li><a href="#edit_tab_sec"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_third'); ?></a> </li>                          

                                        <li ><a href="#edit_tab_third"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_forth'); ?></a> </li>

                                        

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

                                            <div class="col-md-5 col-sm-2 col-xs-12">
                                                <div class="item form-group">
                                                    <input  class="form-control col-md-7 col-xs-12"  name="nationality"  id="nationality" value="<?php echo isset($forms->nationality) ? $forms->nationality : ''; ?>" placeholder="" type="text" autocomplete="off">
                                                    <div class="help-block"><?php echo form_error('nationality'); ?></div>
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
                                                <input type="hidden" name="id" id="id" value="<?php echo $forms->id; ?>" />
                                                <a href="<?php echo site_url('formsministry/formsapply/teacherapplicationform'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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


    $('#add_time1').timepicker();
    $('#add_time2').timepicker();
    $('#add_time3').timepicker();
    $('#add_time4').timepicker();
    $('#add_time5').timepicker();
    $('#add_time6').timepicker();
    $('#add_time7').timepicker();
    $('#add_time8').timepicker();


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
                + '<input  class="form-control col-md-12 col-xs-12" type="text" name="working_designation[]" value="" placeholder="<?php echo $this->lang->line('text228'); ?>"/>'
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
                + '<td style="width:50%;">'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="subclass1[]" class="answer" placeholder="<?php echo $this->lang->line('class1'); ?>" />'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="subsubject1[]" value="" placeholder="<?php echo $this->lang->line('text216'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="subperiods1[]" value="" placeholder="<?php echo $this->lang->line('text248'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="subhours1[]" value="" placeholder="<?php echo $this->lang->line('hours'); ?>"/>'
                + '</td>'
                + '<td>'
                + '<input  class="form-control col-md-12 col-xs-12" style="width:auto;" type="text" name="subminuts1[]" value="" placeholder="<?php echo $this->lang->line('seconds'); ?>"/>'
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
