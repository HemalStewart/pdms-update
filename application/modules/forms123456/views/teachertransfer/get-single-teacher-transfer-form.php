<div class="" data-example-id="togglable-tabs">

    

     <div class="tab-content">

        <div  class="tab-pane fade in active dataTables_wrapper"> 

            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <tbody>
					
					 <tr>                    

                        <th width="20%" colspan="4" style="text-align: center;"><?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text100')."</span>"; ?> </th>

                     </tr>

                     				
					 <tr>
                        <th width="20%" colspan="4">
						 
							<ul style="list-style: decimal-leading-zero;">
								
								<li><?php echo $this->lang->line('text101'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->applicant_name."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text102'); ?> :-<br>
									<?php echo $this->lang->line('name2'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_name."</span>";?><br>
									<?php echo $this->lang->line('address3'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->piriven_address."</span>";?>
							  </li>
								
								<li><?php echo $this->lang->line('district2'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->district."</span>";?> 
								
							  <li><?php echo $this->lang->line('text103'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$report->datei."</span>";?> 
								
							  <li><?php echo $this->lang->line('text104'); ?> :- <br>
								  <?php echo $this->lang->line('number2'); ?> - 
								  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->approval_no."</span>";?> <br> 
								  <?php echo $this->lang->line('date1'); ?> -  
								  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->dateii."</span>";?>
							  </li>
								
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


