<div class="" data-example-id="togglable-tabs">

    

     <div class="tab-content">

        <div  class="tab-pane fade in active dataTables_wrapper"> 

            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <tbody>
					
					 <tr>                    

                        <th width="20%" colspan="4" style="text-align: center;"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text200')."</span>"; ?> </th>

                     </tr>

                     				
					 <tr>
                        <th width="20%" colspan="4">
						 
								<ul style="list-style: decimal-leading-zero;">
								
								<li><?php echo $this->lang->line('text202'); ?> :- 
									
									  <?php $type = $forms->type; ?> 
									      <?php if ($type ===  'පූජ්‍ය.'): ?>
												 
                                       <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->type."&nbsp;".$forms->initial_name_s."</span>"; ?>
                                          <?php elseif ($type === 'සීලමාතා.'||'මයා.'||'මිය.'||'මෙනෙවිය.'): ?>
                                             <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->initial_name_s."&nbsp;".$forms->type."</span>";?>
                                          <?php else: ?>
									          <span style='color:black; text-decoration: underline;text-decoration-style: dashed'> - </span>
									<?php endif; ?>
									
									
								</li>
								<li><?php echo $this->lang->line('text203'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->full_name_s."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text204'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->type_e."&nbsp;".$forms->initial_name_e."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('birth_date'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datei."</span>"; ?></li>
								
									
							<li><?php echo $this->lang->line('text205'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nationality."</span>"; ?></li>
									
									
							<!--	<li><?php echo $this->lang->line('text205'); ?> :- 
									  <?php $nationality = $forms->nationality; ?>
									      <?php if ($nationality === 'Sri Lankan'): ?>
                                             <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nationality."</span>"; ?>
                                          <?php elseif ($nationality === 'Other'): ?>
                                             <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->religion. "</span>";?>
                                          <?php else: ?>
									          <span style='color:black; text-decoration: underline;text-decoration-style: dashed'> - </span>
									<?php endif; ?>
								</li>
									-->
								
								<li><?php echo $this->lang->line('text206a'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nic_no."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text206'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->red_address."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text207'); ?> :-<br>
									08.1&nbsp;<?php echo $this->lang->line('text207a'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->mobile_no."</span>";?><br>
									08.2&nbsp;<?php echo $this->lang->line('text207b'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->whatsapp_no."</span>";?>
							   </li>
								
								<li><?php echo $this->lang->line('text208'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->e_mail."</span>"; ?></li>

								<li><?php echo $this->lang->line('text209'); ?> :-<br>
									<?php echo $this->lang->line('school_name'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_name."</span>";?><br>
									<?php echo $this->lang->line('school_address'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->piriven_address."</span>";?>
							   </li>
								
								<li><?php echo $this->lang->line('text209a'); ?> <br>
									11.1&nbsp;<?php echo $this->lang->line('text210'); ?> 
									
									 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_1container" cellspacing="0" width="100%" style="padding: 4px;">
									
										 <tr>
											 <th colspan="3" style="text-align: left"><?php echo $this->lang->line('text211'); ?></th>
											 <th colspan="3" style="text-align: left"><?php echo $this->lang->line('text212'); ?></th>
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
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->year1."</span>";?>
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
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->year2."</span>";?>
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
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->exam_no1."</span>";?>
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
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->exam_no2."</span>";?>
														  <div class="help-block"><?php echo form_error('year2'); ?></div>
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
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1_grade'); ?></div>
															</td>
															
															<td>01</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>02</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2_grade'); ?></div>
															</td>
                                                            
															
															<td>02</td>
															<td>
                                                              <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub2_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>03</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3_grade'); ?></div>
															</td>
															
															<td>03</td>
															<td>
                                                        <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub3'); ?></div>
															</td>
                                                             <td>
														<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub3_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>04</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4_grade'); ?></div>
															</td>
															
															<td>04</td>
                                                           <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>05</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5_grade'); ?></div>
															</td>
															
															<td>05</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub5_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>06</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6_grade'); ?></div>
															</td>
															
															<td>06</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub6'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub6_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>07</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7_grade'); ?></div>
															</td>
															
															<td>07</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub7_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>08</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8'); ?></div>
															</td>
                                                             <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8_grade'); ?></div>
															</td>
															
															<td>08</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub8'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub8_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>09</td>
                                                            <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9_grade'); ?></div>
															</td>
															
															<td>09</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub9'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub9_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>10</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub10_grade'); ?></div>
															</td>
															
															<td>10</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
															</td>
                                                             <td>
														     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex2_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub10_grade'); ?></div>
															</td>
                                                        </tr>
														
															
									
									</table>
							
								
								
												
								11.2&nbsp;<?php echo $this->lang->line('text217'); ?> 
									
									 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_1container" cellspacing="0" width="100%" style="padding: 4px;">
									 <tr>
										 <th colspan="6">
											 
											  <div class="col-md-4 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
                                                  <div class="item form-group">
                                                     <div><?php echo $this->lang->line('text218'); ?>:-</div>
                                                   </div>
                                               </div>

												
									  <?php $higher_exam_type = $forms1->higher_exam_type; ?>
									      <?php if ($higher_exam_type ===  'G.C.E Advanced Level'||'Prachina Panditha Intermediate Examination'|| 
													                        'Prachina Panditha Final Examination'||'Vidyodaya Final Examination'|| 
													                        'Vidyalankara Final Examination'||'University First Examination'||'Venamulla'): ?>
												 
                                       <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->higher_exam_type."</span>"; ?>
                                          <?php elseif ($higher_exam_type === 'Other'): ?>
                                             <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->higher_exam."</span>";?>
                                          <?php else: ?>
									          <span style='color:black; text-decoration: underline;text-decoration-style: dashed'> - </span>
									<?php endif; ?>
											 
										 </th>
							
											
										 </tr>
										 <tr>
											 <th colspan="3" style="text-align: left"><?php echo $this->lang->line('text219'); ?></th>
											 <th colspan="3" style="text-align: left"><?php echo $this->lang->line('text220'); ?></th>
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
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->year_h1."</span>";?>
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
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->year_h2."</span>";?>
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
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->	exam_noh1."</span>";?>
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
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->exam_noh2."</span>";?>
														  <div class="help-block"><?php echo form_error('year2'); ?></div>
										              </div>
									               </div>
											</th>
										 </tr>
										 
										  <tr>
											 <th colspan="3">
											     <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
												     <div class="item form-group">
													     <div><?php echo $this->lang->line('text221'); ?>:-</div>
												     </div>
											     </div>
									
									             <div class="col-md-4 col-sm-2 col-xs-12">
										              <div class="item form-group">
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->	datehi."</span>";?>
										              </div>
									             </div>
															
										     </th>
											 <th colspan="3">
												 <div class="col-md-8 col-sm-2 col-xs-12" style="margin-left: 0px; margin-right: -40px;">
													 <div class="item form-group">
														 <div><?php echo $this->lang->line('text221'); ?>:-</div>
													 </div>
												 </div>
									
									             <div class="col-md-4 col-sm-2 col-xs-12">
										              <div class="item form-group">
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->datehii."</span>";?>
														  <div class="help-block"><?php echo form_error('year2'); ?></div>
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
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->	hex1_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1_grade'); ?></div>
															</td>
															
															<td>01</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>02</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2_grade'); ?></div>
															</td>
                                                            
															
															<td>02</td>
															<td>
                                                              <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub2_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>03</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3_grade'); ?></div>
															</td>
															
															<td>03</td>
															<td>
                                                        <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub3'); ?></div>
															</td>
                                                             <td>
														<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub3_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>04</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4_grade'); ?></div>
															</td>
															
															<td>04</td>
                                                           <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>05</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5_grade'); ?></div>
															</td>
															
															<td>05</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub5_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>06</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6_grade'); ?></div>
															</td>
															
															<td>06</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub6'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub6_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>07</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7_grade'); ?></div>
															</td>
															
															<td>07</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub7_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>08</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8'); ?></div>
															</td>
                                                             <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8_grade'); ?></div>
															</td>
															
															<td>08</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub8'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub8_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>09</td>
                                                            <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9_grade'); ?></div>
															</td>
															
															<td>09</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub9'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub9_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>10</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub10_grade'); ?></div>
															</td>
															
															<td>10</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
															</td>
                                                             <td>
														     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub10_grade'); ?></div>
															</td>
                                                        </tr>
														
															
									
									</table>
								</li>
								
								
								
								
								<li><?php echo $this->lang->line('text222'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->other_qualifications."</span>";?> 
									
								<li>1&nbsp;<?php echo $this->lang->line('text223'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms1->yes_no."</span>";?>
									<?php echo $this->lang->line('text224'); ?> 
									
									<!--not_adjust-->
									
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
										 
										   <?php foreach ($new_teacher_app_01_working as $obj) { ?> 

                        <tr style="color:#000000">  

                            <td><?php echo $obj->working_place; ?></td>

                            <td><?php echo $obj->working_designation; ?></td>

                            <td><?php echo $obj->working_from; ?></td>

                            <td><?php echo $obj->working_to; ?></td>

                        </tr>

                    <?php } ?>           
                              </table>
									
									13.2&nbsp;<?php echo $this->lang->line('text228'); ?> :-
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms1->leave_reson."</span>";?>
									 
								
								</li>	
			
							</ul>
							
								<br>
			
							<ul style="list-style: none">
								
								<li><?php echo $this->lang->line('text229'); ?> &nbsp;<?php echo $this->lang->line('text229a'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms1->piriven_name1."</span>";?>
									<?php echo $this->lang->line('text229b'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->dateiv."</span>";?>
									<?php echo $this->lang->line('text230'); ?>
								</li>
							</ul>
						 
					   </th>
                    </tr>
    
		 	         <tr>                    

                        <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                        <td width="30%"><?php echo $forms1->datev; ?></td> 
						 
					    <th width="20%"><?php echo $this->lang->line('text111'); ?></th>

                        <td>
						  <?php if ($forms1->applicant_sig1) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms1->applicant_sig1 ?>" alt="" width="100" />

                            <?php }  else { ?>
                              <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                             <?php } ?>
							
						 </td>
						  
                    </tr>
		 
		             <tr class="instructions">                    

                        <th width="20%" colspan="4"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text231')."</span>"; ?> 
						 
						
						 
							<ul style="list-style: decimal">
								
								<li><?php echo $this->lang->line('text232'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->t1_doc1."</span>";?></li>
								<li><?php echo $this->lang->line('text233'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->t1_doc2."</span>";?></li>
								<li><?php echo $this->lang->line('text234'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->t1_doc3."</span>";?></li>
								<li><?php echo $this->lang->line('text235'); ?><br>
									<?php echo $this->lang->line('text236'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->t1_doc4."</span>";?></li>
								</li>
							</ul>
					
                     </th>

                     </tr>
		 
		          <tr> 
					  <th  width="20%" colspan="4" style="text-align: center;">
					   <?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text237')."</span>"; ?> 
					  </th>
		 
		         </tr>
		 
	<!--=========================================Second tab=======================================================================-->	  
		         <tr> 
					  <th  width="20%" colspan="4">
					  
						  <ul style="list-style: decimal-leading-zero;">

							  <li class="col-md-12">
								
									<?php echo "<span class='col-md-3 ol-sm-2 col-xs-12'>". $this->lang->line('text238'); ?>
									<?php echo $this->lang->line('text239')."</span>"; ?> 
									
									
									 <div class="col-md-4 ol-sm-2 col-xs-12" style="text-align: center">
									
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
                                                                    <?php echo "<span style='color:black;'>" .  $forms2->annual_year1."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black;'>" .  $forms2->annual_month1."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black;'>" .  $forms2->annual_date1."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
									
									</div>
									
                                        
                                      <?php echo "<span class='col-md-1 ol-sm-2 col-xs-12'>" .$this->lang->line('work_to')."</span>"; ?>
									
									 <div class="col-md-4 ol-sm-2 col-xs-12" style="text-align: center">
									
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
                                                                    <?php echo "<span style='color:black;'>" .  $forms2->annual_year2."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black;'>" .  $forms2->annual_month2."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black;'>" .  $forms2->annual_date2."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
									
									</div>

									
							  </li>
							  
							  <li class="col-md-12">
								
									<?php echo "<span class='col-md-8 ol-sm-2 col-xs-12'>". $this->lang->line('text240')."</span>"; ?> 
									
									
									 <div class="col-md-4 ol-sm-2 col-xs-12" style="text-align: center">
									
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
                                                                    <?php echo "<span style='color:black;'>" .  $forms2->annual_monk."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black;'>" .  $forms2->annual_lay."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black;'>" .  $forms2->annual_total."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
									
									</div>
									
									
							  </li>
							  
							  <li class="col-md-12">
								
									<?php echo "<span class='col-md-5 ol-sm-2 col-xs-12'>". $this->lang->line('text241')."</span>"; ?> 
									
									
									 <div class="col-md-4 ol-sm-2 col-xs-12" style="text-align: center">
									
									  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('text242'); ?></th>
                                                                <td>
                                                           
																	<!--<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->vacancy_extra."</span>";?>-->
																	
																	<input type="radio" name="vacancy_extra" id="vc_A" value="vacancy"  <?php if(isset($forms2) && $forms2->vacancy_extra == 'vacancy'){ echo 'checked="checked"'; } ?>/> 
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('text243'); ?></th>
                                                                <td>
                                                                 <!--  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->vacancy_extra."</span>";?>-->
																	
																	<input  type="radio" name="vacancy_extra" id="vc_B" value="extra"  <?php if(isset($forms2) && $forms2->vacancy_extra == 'extra'){ echo 'checked="checked"'; } ?>/> 
                                                                </td>
                                                            </tr>
                                                        </thead>

                                                    </table>
									
									</div>
									
									
							  </li>
						
							  
							  
							  
							  <li class="col-md-12">
								
									<?php echo "<span class='col-md-4 ol-sm-2 col-xs-12'>". $this->lang->line('text244')."</span>"; ?> 
									
									
									 <div class="col-md-4 ol-sm-2 col-xs-12" style="text-align: center">
									
									    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <thead>
                                                            <tr>

                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('tea_year'); ?></th>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->vacancy_year."</span>";?>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('month'); ?></th>
                                                                <td>
                                                                     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->vacancy_month."</span>";?>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('date'); ?></th>
                                                                <td>
                                                                     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->vacancy_date."</span>";?>
                                                                </td>
                                                            </tr>
                                                        </thead>

                                                    </table>
									
									</div>
									
									
							  </li>
							  
							   <li class="col-md-12">
								
									<?php echo $this->lang->line('text245'); ?> 
								
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
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time1_from."</span>";?>
                                                            </td>
															
														    <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time1_to."</span>";?>
                                                            </td>
															
															
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon1."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues1."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend1."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur1."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri1."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time2_from."</span>";?>
                                                            </td>
															<td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time2_to."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon2."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues2."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend2."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur2."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri2."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time3_from."</span>";?>
                                                            </td>
															   <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time3_to."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon3."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues3."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend3."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur3."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri3."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>

                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time4_from."</span>";?>
                                                            </td>
															 <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time4_to."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon4."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues4."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend4."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur4."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri4."</span>";?>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>05</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time5_from."</span>";?>
                                                            </td>
															<td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time5_to."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon5."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues5."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend5."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur5."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri5."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time6_from."</span>";?>
                                                            </td>
															<td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time6_to."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon6."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues6."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend6."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur6."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri6."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                           <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time7_from."</span>";?>
                                                            </td>
															 <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time7_to."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon7."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues7."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend7."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur7."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri7."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                           <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time8_from."</span>";?>
                                                            </td>
															 <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->time8_to."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->mon8."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->tues8."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->wend8."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->thur8."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->fri8."</span>";?>
                                                            </td>
                                                        </tr>
                                                    </table>

									
							  </li>
								
								
							  <li><?php echo $this->lang->line('text247'); ?>
									
										 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_container" cellspacing="0" width="100%">
											 
											 <tbody>
														
														
												<tr>               
                                                   <td><?php echo $this->lang->line('class1'); ?></td>
                                                    <td><?php echo $this->lang->line('text216'); ?></td>
                                                    <td><?php echo $this->lang->line('text248'); ?></td>
                                                    <td><?php echo $this->lang->line('hours'); ?></td>
                                                    <td><?php echo $this->lang->line('seconds'); ?></td>
                                                </tr>
											
										 
										   <?php foreach ($new_teacher_app_02_class_sub as $obj) { ?> 

                        <tr style="color:#000000">  

                            <td><?php echo $obj->subclass1; ?></td>

                            <td><?php echo $obj->subsubject1; ?></td>

                            <td><?php echo $obj->subperiods1; ?></td>

                            <td><?php echo $obj->subhours1; ?></td>
							
                            <td><?php echo $obj->subminuts; ?></td>

                        </tr>

                    <?php } ?> 
												 </tbody>
											 
											 <tbody>
												 <tr>
                                                            <th colspan="3"><?php echo $this->lang->line('text240c'); ?></th>
                                                            <td> 
																<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->hours_total."</span>";?>
                                                            </td>
														
                                                            <td> 
																<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->	minuts_total."</span>";?>
                                                            </td>
                                                        </tr>
											 
											 </tbody>
                              </table>

							  </li>
							  
						           <li class="col-md-12">
								
									<?php echo "<span class='col-md-6 ol-sm-2 col-xs-12'>". $this->lang->line('text250')."</span>"; ?> 
									
									
									 <div class="col-md-6 ol-sm-2 col-xs-12" style="text-align: center">
									
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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2                                            ->proposed_monk."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->proposed_lay."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->proposed_total."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
									
									</div>
									
									
							  </li>
							  
							  
							  
							  
								<li><?php echo $this->lang->line('text251'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->additional_appointment."</span>"; ?></li>
								
							  <li>
								09.1 &nbsp;<?php echo $this->lang->line('text252'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->piriven_teacher_name."</span>"; ?><br>
								
								09.2 &nbsp;<?php echo $this->lang->line('text253'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->jobtitle_subject."</span>"; ?><br>
								
								09.3 &nbsp;<?php echo $this->lang->line('text254'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->highedu_subjects."</span>"; ?><br>
								
								09.4 &nbsp;<?php echo $this->lang->line('text255'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->teacher_rej_no."</span>"; ?><br>
								
								09.5 &nbsp;<?php echo $this->lang->line('text256'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->datevi."</span>"; ?><br>
								
								09.6 &nbsp;<?php echo $this->lang->line('text257'); ?> :- 
									
									<!--<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->datatable-responsive."</span>"; ?>-->
									
									<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" data-toggle="buttons" style="background-color:transparent;border: none; width: 25%;">
										                <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(a)&nbsp;<?php echo $this->lang->line('text258'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
																<input  type="radio" name="termination_service"  id="ts_A"   value="Resign voluntarily" <?php if(isset($forms2) && $forms2->termination_service == 'Resign voluntarily'){ echo 'checked="checked"'; } ?>>
															</td>
										                </tr>
	                                                    <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(b)&nbsp;<?php echo $this->lang->line('text259'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
																<input  type="radio" name="termination_service"  id="ts_B"   value="Retirement" <?php if(isset($forms2) && $forms2->termination_service == 'Retirement'){ echo 'checked="checked"'; } ?>>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(c)&nbsp;<?php echo $this->lang->line('text261'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
																<input  type="radio" name="termination_service"  id="ts_C"   value="Receiving transfer" <?php if(isset($forms2) && $forms2->termination_service == 'Receiving transfer'){ echo 'checked="checked"'; } ?>>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(d)&nbsp;<?php echo $this->lang->line('text262'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
																<input  type="radio" name="termination_service"  id="ts_D"   value="Interdiction" <?php if(isset($forms2) && $forms2->termination_service == 'Interdiction'){ echo 'checked="checked"'; } ?>>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(e)&nbsp;<?php echo $this->lang->line('text263'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
																<input  type="radio" name="termination_service"  id="ts_E"   value="Death" <?php if(isset($forms2) && $forms2->termination_service == 'Death'){ echo 'checked="checked"'; } ?>>
															</td>
                                                        </tr>
                                                        <tr style="background-color:transparent;border: none ">
                                                            <td style="background-color:transparent;border: none ">(f)&nbsp;<?php echo $this->lang->line('text264'); ?></td>
                                                            <td style="background-color:transparent;border: none ">
																<input  type="radio" name="termination_service"  id="ts_F"   value="Disrobe" <?php if(isset($forms2) && $forms2->termination_service == 'Disrobe'){ echo 'checked="checked"'; } ?>>
                                                        </tr>
                                                    </table>
									
								09.7 &nbsp;<?php echo $this->lang->line('text265'); ?> 
								<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->datevii."</span>"; ?>
								<?php echo $this->lang->line('text266'); ?>
								<?php echo $this->lang->line('text267'); ?>
								<?php echo $this->lang->line('text267a'); ?>
								
							  </li>
						  
					  </th>
		         </tr>
		 
		         <tr class="instructions">                    

                </tr>


                  <tr class="instructions">                    

                        <th width="20%" colspan="4"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text231')."</span>"; ?> 
						 
						
						 
							<ul style="list-style: decimal">
								
								<li><?php echo $this->lang->line('text268'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->t2_doc1."</span>";?></li>
								<li><?php echo $this->lang->line('text269'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms2->t2_doc2."</span>";?></li>
								<li><?php echo $this->lang->line('text270'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->t2_doc3."</span>";?></li>
								<li><?php echo $this->lang->line('text271'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->t2_doc4."</span>";?></li>
								<li><?php echo $this->lang->line('text272'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->t2_doc5."</span>";?></li>
								</li>
							</ul>
					
                     </th>

                     </tr>

                 <tr> 
					 <th width="20%" colspan="4"><?php echo $this->lang->line('text273'); ?></th>
                 </tr>

                   <tr> 
					
                         <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms2->dateviii; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text273a'); ?></th>

                    <td>
					  <?php if ($forms2->t2_kruthy_sig1) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms2->t2_kruthy_sig1; ?>" alt="" width="100" />

                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
						  
                    </tr>

<!--=========================================Third tab=======================================================================-->	  

                <tr> 
					  <th  width="20%" colspan="4" style="text-align: center;">
					   <?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text274')."</span>"; ?> 
					  </th>
		 
		        </tr>
		        
		        <tr>
		            <th width="20%" colspan="4">
		            <ul style="list-style: none">
		                
		                <li>
		                    <?php echo $this->lang->line('text275'); ?> 
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->kpiriven_name1."</span>";?>
		                    <?php echo $this->lang->line('text276'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->kcount."</span>";?>
		                    <?php echo $this->lang->line('text277'); ?>
		                </li>
		            </ul>
		            </th>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms3->dateix; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text278'); ?></th>

                    <td>
					  <?php if ($forms3->officer_sig1) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->officer_sig1; ?>" alt="" width="100" />

                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
					<th width="20%"><?php echo $this->lang->line('text279'); ?></th>

                    <td>
					  <?php if ($forms3->zonal_sig1) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->zonal_sig1; ?>" alt="" width="100" />
                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->zonalstamp_sig2; ?>" alt="" width="100" />

                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
		            <th width="20%" colspan="4">
		            <ul style="list-style: none">
		                
		                <li>
		                    <?php echo $this->lang->line('text279a'); ?> 
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->datex."</span>";?>
		                </li>
		                <li><?php echo $this->lang->line('text280'); ?> 
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->zonal_office."</span>";?>
		                </li>
		            </ul>
		            </th>
		        </tr>


   <!--////////////////province//////////////////////////////////////////////////-->
		        <tr> 
					  <th  width="20%" colspan="4" style="text-align: center;">
					   <?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text281')."</span>"; ?> 
					  </th>
		 
		        </tr>
		        <tr>
		            <th width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                   <?php echo $this->lang->line('text282'); ?> 
		                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->asst_province_type."</span>";?>&nbsp; 
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->asst_province_name."</span>";?>
		                   <?php echo $this->lang->line('text282a'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->asst_province_pname."</span>";?>
		                   <?php echo $this->lang->line('text283'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->kpiriven_type."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->recommendation."</span>";?>
		                </li>
		            </ul>
		            </th>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms3->datexi; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text284'); ?>
					<?php echo $this->lang->line('text284a'); ?></th>

                    <td>
					  <?php if ($forms3->asst_province_sig1) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->asst_province_sig1; ?>" alt="" width="100" />
                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->asst_provincestamp_sig2; ?>" alt="" width="100" />

                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        

        
<!--=========================================Forth tab=======================================================================-->	

		        <tr> 
					  <th  width="20%" colspan="4" style="text-align: center;">
					   <?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text285')."</span>"; ?> 
					  </th>
		 
		        </tr>
		        <tr>
		            <th width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                   <?php echo $this->lang->line('text286'); ?> 
		                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->min_piriven_name."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->min_piriven_type."</span>";?>
		                   <?php echo $this->lang->line('text286a'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->true_not."</span>";?>
		                   <?php echo $this->lang->line('text287'); ?>
		                </li>
		            </ul>
		            </th>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms3->datexii; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text288'); ?>
					</th>

                    <td>
					  <?php if ($forms3->edu_clerk_sig1) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->edu_clerk_sig1; ?>" alt="" width="100" />
                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
		            <td width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->approved_not."</span>";?>
		                </li>
		            </ul>
		            </td>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms3->datexiii; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text290'); ?>
					</th>

                    <td>
					  <?php if ($forms3->asdic_sig) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->asdic_sig; ?>" alt="" width="100" />
                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
		            <td width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                   <?php echo $this->lang->line('text291'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->submition."</span>";?>
		                   <?php echo $this->lang->line('text291a'); ?>
		                </li>
		            </ul>
		            </td>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms3->datexiv; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text292'); ?>
					</th>

                    <td>
					  <?php if ($forms3->commitee_mem_sig) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->commitee_mem_sig; ?>" alt="" width="100" />
                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
		            <td width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->given_not."</span>";?>
		                   <?php echo $this->lang->line('text293'); ?><br>
		                   <?php echo $this->lang->line('text294'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->min_note."</span>";?>
		                </li>
		            </ul>
		            </td>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms3->datexv; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text295'); ?>
					</th>

                    <td>
					  <?php if ($forms3->min_director_sig) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->min_director_sig; ?>" alt="" width="100" />
                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
		            <th width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                   <h3 style="font-size: 20px;text-decoration: underline;text-align: center;"><strong><?php echo $this->lang->line('text296'); ?></strong></h3>
		                   <?php echo $this->lang->line('text297'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->received_datexvi."</span>";?><br>
		                   <?php echo $this->lang->line('text298'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->sub_no."</span>";?><br>
		                   <?php echo $this->lang->line('text299'); ?> :- 
		                    <?php if ($forms3->accepted_sig1) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->accepted_sig1; ?>" alt="" width="100" />
                            <?php }  else { ?>
                                <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                            <?php } ?><br>
		                   <?php echo $this->lang->line('text300'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->reply."</span>";?>
		                </li>
		            </ul>
		            </th>
		        </tr>
		     
		        
	

                </tbody>

            </table>

        </div>


    </div>
	

</div>


