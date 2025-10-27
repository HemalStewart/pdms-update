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
								
								<li><?php echo $this->lang->line('text206'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->red_address."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('birth_date'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datei."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text205'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nationality."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text206a'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nic_no."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text209'); ?> :-<br>
									<?php echo $this->lang->line('school_name'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_name."</span>";?><br>
									<?php echo $this->lang->line('school_address'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->piriven_address."</span>";?>
							   </li>
								
								<li><?php echo $this->lang->line('text209a'); ?> <br>
									09.1&nbsp;<?php echo $this->lang->line('text210'); ?> 
									
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
							
								
								
												
								09.2&nbsp;<?php echo $this->lang->line('text217'); ?> 
									
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
                                                <tr>               
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type="text" name="working_place[]" placeholder="<?php echo $this->lang->line('text225'); ?>" />
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_designstion[]" value="" placeholder="<?php echo $this->lang->line('text226'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_from[]" value="" placeholder="<?php echo $this->lang->line('work_from'); ?>"/>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control col-md-12 col-xs-12" type='text' name="working_to[]" value="" placeholder="<?php echo $this->lang->line('work_to'); ?>"/>
                                                    </td>
                                                </tr>             
                                                    </table>
								
								</li>	
								
								
								
									
								
							11.2&nbsp;<?php echo $this->lang->line('text228'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->leave_reson."</span>";?> </br>
								
							<?php echo $this->lang->line('text229'); ?>
							<?php echo $this->lang->line('text229a'); ?> 
								  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_name1."</span>";?> 
								  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_type."</span>";?>
							<?php echo $this->lang->line('text229b'); ?>
							      <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->dateiv."</span>";?>
							<?php echo $this->lang->line('text230'); ?>  <br>
							<?php echo $this->lang->line('date'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datev."</span>";?>
								<li>
									<?php echo $this->lang->line('19d_o_b'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->dateiii."</span>"; ?>
								</li>
								
								<li><?php echo $this->lang->line('19edu_quli'); ?> :- 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->qualifications."</span>";?></li>
								
								<li><?php echo $this->lang->line('text106'); ?> :-  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->grade_subject."</span>";?> </li>
								
								<li><?php echo $this->lang->line('text108'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->salary_info."</span>";?></li>
								
								<li><?php echo $this->lang->line('text109'); ?> :-<br>
									<?php echo $this->lang->line('name2'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->transfer_piriven_name."</span>";?><br>
									<?php echo $this->lang->line('address3'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->transfer_piriven_address."</span>";?>
							    </li>
								
								<li><?php echo $this->lang->line('district2'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->transfer_district."</span>";?> 
							    </li>
							
							    <li>
									<?php echo $this->lang->line('text110'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->dateiv."</span>";?>
								</li>
							</ul>
						 
					   </th>
                    </tr>
		 
		 	         <tr>                    

                        <th width="20%"><?php echo $this->lang->line('date1'); ?></th>

                        <td width="30%"><?php echo $forms->datev; ?></td> 
						 
					    <th width="20%"><?php echo $this->lang->line('text111'); ?></th>

                        <td>
						  <?php if ($forms->sig1_photo) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig1_photo; ?>" alt="" width="100" />

                            <?php }  else { ?>
                              <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                             <?php } ?>
							
						 </td>
						  
                    </tr>
		 
		             <tr>                    

                        <th width="20%" colspan="4"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text112')."</span>"; ?> :- </th>

                     </tr>
		  
		 		     <tr>
                        <th width="20%" colspan="4">
						 
							<ul style="list-style: none">
								
								<li><?php echo $this->lang->line('text113'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->person1."</span>";?>
									<?php echo $this->lang->line('text114'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->person2."</span>";?>
									<?php echo $this->lang->line('text115'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->yes_no."</span>";?>
									<?php echo $this->lang->line('text116'); ?>
								</li>
							</ul>
						 
					   </th>
                    </tr>
					
					 <tr>                    

                        <th width="20%"><?php echo $this->lang->line('date1'); ?></th>

                        <td width="30%"><?php echo $forms->datevi; ?></td> 
						 
					    <th width="20%"><?php echo $this->lang->line('text117'); ?></th>

                        <td>
							 <?php if ($forms->sig2_photo) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig2_photo; ?>" alt="" width="100" />

                            <?php }  else { ?>
                              <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                             <?php } ?>
						 
						 </td>  
                    </tr>
					
					 <tr>                    

                        <th width="20%" colspan="4"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text118')."</span>"; ?> :- </th>

                     </tr>
					
					 <tr>
                        <th width="20%" colspan="4">
						 
							<ul style="list-style: none">
								
								<li>
									<?php echo $this->lang->line('text119'); ?>
								</li>	
							</ul>
						 
					   </th>
                    </tr>
					
					 <tr>                    

                        <th width="20%"><?php echo $this->lang->line('date1'); ?></th>

                        <td width="30%"><?php echo $forms->datevii; ?></td> 
						 
					    <th width="20%"><?php echo $this->lang->line('text120'); ?></th>

                        <td>
							 <?php if ($forms->sig3_photo) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig3_photo; ?>" alt="" width="100" />

                            <?php }  else { ?>
                              <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                             <?php } ?>
						 
						</td>  
                    </tr>
					
					 <tr>                    

                         <th width="20%" colspan="4"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text121')."</span>"; ?> :- </th>

                     </tr>
					
					 <tr>
                        <th width="20%" colspan="4">
						 
							<ul style="list-style:decimal-leading-zero;">
								
								<li>
									<?php echo $this->lang->line('text122'); ?> :- 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->count1."</span>";?>
								</li>
								<li>
									<?php echo $this->lang->line('text123'); ?> :- 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->count2."</span>";?> &nbsp;&nbsp;
									<?php echo $this->lang->line('monk'); ?> -
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->monk."</span>";?>&nbsp;&nbsp;
									<?php echo $this->lang->line('lay'); ?> -
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->lay."</span>";?>
								</li>
								<li>
									<?php echo $this->lang->line('text125'); ?> :- 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->count3."</span>";?>
								</li>
							</ul>
							
							<ul style="list-style: none;">
							
								<li>
									<?php echo $this->lang->line('text126'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->person_name."</span>";?> &nbsp;
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->person3."</span>";?>&nbsp;&nbsp;
									<?php echo $this->lang->line('text127'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->person4."</span>";?>
									<?php echo $this->lang->line('text128'); ?>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->person5."</span>";?>
									<?php echo $this->lang->line('text129'); ?>
									<?php echo $this->lang->line('text130'); ?>
								</li>
								
							</ul>
						 
					   </th>
                    </tr>
					
					<tr>                    

                        <th width="20%"><?php echo $this->lang->line('date1'); ?></th>

                        <td width="30%"><?php echo $forms->dateviii; ?></td> 
						 
					    <th width="20%"><?php echo $this->lang->line('text117'); ?></th>

                        <td>
							 <?php if ($forms->sig4_photo) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig4_photo; ?>" alt="" width="100" />

                            <?php }  else { ?>
                              <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                             <?php } ?>
						 
						</td>  
                    </tr>
					
					 <tr>                    

                         <th width="20%" colspan="4">
							 <?php echo $this->lang->line('name2'); ?> :- 
							 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->piriven_name1."</span>";?>
						 </th>

                     </tr>
					
					<tr>                    

                         <th width="20%" colspan="4"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text131')."</span>"; ?> :- </th>

                     </tr>
					
					<tr>
                        <th width="20%" colspan="4">
						 
							<ul style="list-style: none">
								
								<li>
									<?php echo $this->lang->line('text132'); ?>
								</li>	
							</ul>
						 
					   </th>
                    </tr>
					
					 <tr>                    

                        <th width="20%"><?php echo $this->lang->line('date1'); ?></th>

                        <td width="30%"><?php echo $forms->dateix; ?></td> 
						 
					    <th width="20%"><?php echo $this->lang->line('text120'); ?></th>

                        <td>
							 <?php if ($forms->sig5_photo) { ?>

                                <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig5_photo; ?>" alt="" width="100" />

                            <?php }  else { ?>
                              <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                             <?php } ?>
						 
						</td>  
                    </tr>
					
	

                </tbody>

            </table>

        </div>


    </div>
	

</div>


