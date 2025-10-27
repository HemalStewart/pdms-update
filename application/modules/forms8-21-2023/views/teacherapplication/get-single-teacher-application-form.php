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
								
								<li><?php echo $this->lang->line('text202'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->person1."&nbsp;".$forms->initial_name_s."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text203'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->full_name_s."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text204'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->initial_name_e."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('birth_date'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datei."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text205'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nationality."</span>"; ?></li>
								
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
											 <th colspan="6" style="text-align: left"><?php echo $this->lang->line('text218'); ?>
											  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->exam_name."</span>";?></th>
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
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->year_h1."</span>";?>
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
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->year_h2."</span>";?>
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
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->	exam_noh1."</span>";?>
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
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->exam_noh2."</span>";?>
														  <div class="help-block"><?php echo form_error('year2'); ?></div>
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
											            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->	datehi."</span>";?>
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
												           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->datehii."</span>";?>
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
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->	hex1_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1_grade'); ?></div>
															</td>
															
															<td>01</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>02</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2_grade'); ?></div>
															</td>
                                                            
															
															<td>02</td>
															<td>
                                                              <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub2_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>03</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3_grade'); ?></div>
															</td>
															
															<td>03</td>
															<td>
                                                        <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub3'); ?></div>
															</td>
                                                             <td>
														<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub3_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>04</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4_grade'); ?></div>
															</td>
															
															<td>04</td>
                                                           <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>05</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5_grade'); ?></div>
															</td>
															
															<td>05</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub4'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub5_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>06</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6_grade'); ?></div>
															</td>
															
															<td>06</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub6'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub6_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>07</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7_grade'); ?></div>
															</td>
															
															<td>07</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub7_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>08</td>
                                                            <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8'); ?></div>
															</td>
                                                             <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8_grade'); ?></div>
															</td>
															
															<td>08</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub8'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub8_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>09</td>
                                                            <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9_grade'); ?></div>
															</td>
															
															<td>09</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub9'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub9_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>10</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex1_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub10_grade'); ?></div>
															</td>
															
															<td>10</td>
                                                            <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
															</td>
                                                             <td>
														     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->hex2_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub10_grade'); ?></div>
															</td>
                                                        </tr>
														
															
									
									</table>
								</li>
								
								
								
								
								<li><?php echo $this->lang->line('text222'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->other_qualifications."</span>";?> 
									
								<li>1&nbsp;<?php echo $this->lang->line('text223'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->yes_no."</span>";?>
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
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->leave_reson."</span>";?>
									 
								
								</li>	
			
							</ul>
							<br>
			
							<ul style="list-style: none">
								
								<li><?php echo $this->lang->line('text229'); ?> &nbsp;<?php echo $this->lang->line('text229a'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->piriven_name1."</span>";?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->piriven_type."</span>";?>
									<?php echo $this->lang->line('text229b'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->dateiv."</span>";?>
									<?php echo $this->lang->line('text230'); ?>
								</li>
							</ul>
						 
					   </th>
                    </tr>
		          
		 	         <tr>                    

                        <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                        <td width="30%"><?php echo $forms->datev; ?></td> 
						 
					    <th width="20%"><?php echo $this->lang->line('text111'); ?></th>

                        <td>
						  <?php if ($forms->sig1_photo) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->applicant_sig1; ?>" alt="" width="100" />

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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_year1."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_month1."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_date1."</span>";?>
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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_year2."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_month2."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_date2."</span>";?>
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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_monk."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_lay."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->annual_total."</span>";?>
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
                                                           
																	<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->vacancy_extra."</span>";?>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('text243'); ?></th>
                                                                <td>
                                                                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->vacancy_extra."</span>";?>
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
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->vacancy_year."</span>";?>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('month'); ?></th>
                                                                <td>
                                                                     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->vacancy_month."</span>";?>
                                                                </td>
                                                                <th style="vertical-align: super;"><?php echo $this->lang->line('date'); ?></th>
                                                                <td>
                                                                     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->vacancy_date."</span>";?>
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
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time1."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon1."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues1."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend1."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur1."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri1."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time2."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon2."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues2."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend2."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur2."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri2."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time3."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon3."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues3."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend3."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur3."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri3."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>

                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time4."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon4."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues4."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend4."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur4."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri4."</span>";?>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>05</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time5."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon5."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues5."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend5."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur5."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri5."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time6."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon6."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues6."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend6."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur6."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri6."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                           <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time7."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon7."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues7."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend7."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur7."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri7."</span>";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                           <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->time8."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->mon8."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->tues8."</span>";?>
                                                            </td>

                                                            <td>
                                                               <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->wend8."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur8."</span>";?>
                                                            </td>
                                                            <td>
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->fri8."</span>";?>
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
																<?php echo $obj->hours_total; ?>
                                                            </td>
														
                                                            <td> 
																<?php echo $obj->inuts_total; ?>
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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->proposed_monk."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->proposed_lay."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->proposed_total."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    </table>
									
									</div>
									
									
							  </li>
							  
							  
							  
							  
								<li><?php echo $this->lang->line('text251'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->additional_appointment."</span>"; ?></li>
								
								<li>09.1 &nbsp;<?php echo $this->lang->line('text252'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_teacher_name."</span>"; ?><br>
								
								09.2 &nbsp;<?php echo $this->lang->line('text253'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->jobtitle_subject."</span>"; ?><br>
								
								09.3 &nbsp;<?php echo $this->lang->line('text254'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->highedu_subjects."</span>"; ?><br>
								
								09.4 &nbsp;<?php echo $this->lang->line('text255'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->teacher_rej_no."</span>"; ?><br>
								
								09.5 &nbsp;<?php echo $this->lang->line('text256'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datevi."</span>"; ?><br>
								
								09.6 &nbsp;<?php echo $this->lang->line('text257'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datatable-responsive."</span>"; ?><br>
								
								09.7 &nbsp;<?php echo $this->lang->line('text265'); ?> 
								<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datevii."</span>"; ?>
								<?php echo $this->lang->line('text266'); ?>
								<?php echo $this->lang->line('text267'); ?>
								<?php echo $this->lang->line('text267a'); ?>
								</li>
						        
						  
					  </th>
		         </tr>
		         <tr class="instructions">                    

                        <th width="20%" colspan="4"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text231')."</span>"; ?> 
						 
						 
							<ul style="list-style: decimal">
								
								<li><?php echo $this->lang->line('text268'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->t2_doc1."</span>";?></li>
								<li><?php echo $this->lang->line('text269'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->t2_doc2."</span>";?></li>
								<li><?php echo $this->lang->line('text270'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->t2_doc3."</span>";?></li>
								<li><?php echo $this->lang->line('text271'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->t2_doc4."</span>";?></li>
								<li><?php echo $this->lang->line('text272'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->t2_doc5."</span>";?></li>
								</li>
							</ul>
					
                         </th>

                </tr>
		        <tr>
		            <?php echo $this->lang->line('text273'); ?><br><br>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms->dateviii; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text273a'); ?></th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->t2_kruthy_sig1; ?>" alt="" width="100" />

                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
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
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->kpiriven_name1."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->kpiriven_type."</span>";?>
		                    <?php echo $this->lang->line('text276'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->kcount."</span>";?>
		                    <?php echo $this->lang->line('text277'); ?>
		                </li>
		            </ul>
		            </th>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms->dateix; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text278'); ?></th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->officer_sig1; ?>" alt="" width="100" />

                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
					<th width="20%"><?php echo $this->lang->line('text279'); ?></th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->zonal_sig1; ?>" alt="" width="100" />
                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->zonalstamp_sig2; ?>" alt="" width="100" />

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
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->datex."</span>";?>
		                </li>
		                <li><?php echo $this->lang->line('text280'); ?> 
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->zonal_office."</span>";?>
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
		                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->asst_province_type."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->asst_province_name."</span>";?>
		                   <?php echo $this->lang->line('text282a'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->asst_province_name."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->asst_province_type."</span>";?>
		                   <?php echo $this->lang->line('text283'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->kpiriven_type."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->recommentaion."</span>";?>
		                </li>
		            </ul>
		            </th>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms->datexi; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text284'); ?>
					<?php echo $this->lang->line('text284a'); ?></th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->asst_province_sig1; ?>" alt="" width="100" />
                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->asst_provincestamp_sig2; ?>" alt="" width="100" />

                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        
		        <!--== tab_third =============================================================================================================================-->

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
		                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->min_piriven_name."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->min_piriven_type."</span>";?>
		                   <?php echo $this->lang->line('text286a'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->true_not."</span>";?>
		                   <?php echo $this->lang->line('text287'); ?>
		                </li>
		            </ul>
		            </th>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms->datexii; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text288'); ?>
					</th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->edu_clerk_sig1; ?>" alt="" width="100" />
                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
		            <td width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->approved_not."</span>";?>
		                </li>
		            </ul>
		            </td>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms->datexiii; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text290'); ?>
					</th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->asdic_sig; ?>" alt="" width="100" />
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
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->submition."</span>";?>
		                   <?php echo $this->lang->line('text291a'); ?>
		                </li>
		            </ul>
		            </td>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms->datexiv; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text292'); ?>
					</th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->commitee_mem_sig; ?>" alt="" width="100" />
                        <?php }  else { ?>
                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                        <?php } ?>
							
					</td>
		        </tr>
		        <tr>
		            <td width="20%" colspan="4">
		            <ul style="list-style: none">
		                <li>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->given_not."</span>";?>
		                   <?php echo $this->lang->line('text293'); ?><br>
		                   <?php echo $this->lang->line('text294'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->min_note."</span>";?>
		                </li>
		            </ul>
		            </td>
		        </tr>
		        <tr>
		            <th width="20%"><?php echo $this->lang->line('date'); ?></th>

                    <td width="30%"><?php echo $forms->datexv; ?></td> 
						 
					<th width="20%"><?php echo $this->lang->line('text295'); ?>
					</th>

                    <td>
					  <?php if ($forms->sig1_photo) { ?>

                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->min_director_sig; ?>" alt="" width="100" />
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
		                   <?php echo $this->lang->line('text297'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->received_datexvi."</span>";?><br>
		                   <?php echo $this->lang->line('text298'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->sub_no."</span>";?><br>
		                   <?php echo $this->lang->line('text299'); ?> :- 
		                    <?php if ($forms->sig1_photo) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->accepted_sig1; ?>" alt="" width="100" />
                            <?php }  else { ?>
                                <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                            <?php } ?><br>
		                   <?php echo $this->lang->line('text300'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->reply."</span>";?>
		                </li>
		            </ul>
		            </th>
		        </tr>
                </tbody>

            </table>

        </div>


    </div>
	

</div>


