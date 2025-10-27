<!DOCTYPE html>
<html>
<head>      

        <title><?php echo $this->lang->line('teacher_application_form'); ?></title>
        
        <?php if($this->global_setting->favicon_icon){ ?>
            <link rel="icon" href="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->favicon_icon; ?>" type="image/x-icon" />             
        <?php }else{ ?>
            <link rel="icon" href="<?php echo IMG_URL; ?>favicon.ico" type="image/x-icon" />
        <?php } ?>    
        <!--
         <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet">
	
	      <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Sinhala:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!--<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">-->
        <!-- Bootstrap -->
        <link href="<?php echo VENDOR_URL; ?>bootstrap/bootstrap.min.css" rel="stylesheet">       
        <!-- Custom Theme Style -->
        <link href="<?php echo CSS_URL; ?>custom.css" rel="stylesheet">

        
        <style type="text/css">

           body {background: #fff;font-family: "Noto Serif Sinhala", serif}
			 /* body {background: #fff;font-family: "Noto Sans Sinhala", sans-serif}*/
			
            @page { margin: 0; }   
            @media print {
                .certificate {                   
                    background: url("<?php echo UPLOAD_PATH; ?>certificate/<?php echo $certificate->background; ?>") no-repeat !important;    
                    min-height: 550px;
                    padding: 10%;
                    width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                    background-size: 100% 100% !important;
                   -webkit-print-color-adjust: exact !important; 
                    color-adjust: exact !important; 
                   /* text-align: center;*/
					font-family: Constantia, "Lucida Bright", "DejaVu Serif", Georgia, "serif";
					font-family: "Noto Serif Sinhala", "serif";
					font-family:
                }
                .name-text {               
                    text-align: center !important;                   
                }  
            } 
   
            .certificate {
                min-height: 550px;
                margin-left: auto;
                margin-right: auto;
                padding: 40px 70px;
                background: url("<?php echo UPLOAD_PATH; ?>certificate/<?php echo $certificate->background; ?>") no-repeat;    
                background-size: 100% 100%;
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                /*text-align: center;*/
            }
            
            .top-heading-title {
               margin-bottom: 15px;
            }
            
            .name-section {
             margin-top: 50px;
            }
            
            .main-text {
               line-height: 28px;
            }
            
            .footer-section {
               margin-top: 100px;
            }
			.table tbody tr th,
			.table tbody tr td{
				    border-top: 1px solid #ddd0;
			}
			.sig-identifier {
             /* background: #eaeaea; */
             /* border: 0.5px solid #dadada; */
             padding: 5px;
            }
			li{
				padding-bottom: 8px;
			}

    </style>
    </head>

    <body>
        <div class="x_content">
             <div class="row">
                 <div class="col-sm-12">                 
                    <div class="certificate">

                        <div class="certificate-top">
                                                       
                           <div class="row">
									<div class="col-12" style="text-align:center;">
										<strong><h4 style="font-size:17px;font-weight: 800; text-decoration: underline"><?php echo $this->lang->line('text200'); ?></h4></strong>
										<strong><h4 style="font-size:17px;font-weight: 800;"><?php echo $this->lang->line('part1'); ?></h4></strong>
										<strong><h4 style="font-size:15px;font-weight: 800; font-style: italic;"><?php echo $this->lang->line('text201'); ?></h4></strong>
								    </div>
                           </div>                            
                        </div>
																	
						 <div class="row" style="padding-left: 25px;padding-top: 10px"> 
							 
							    <div class="col-12" style="font-size:13px;">
								    
							   	<ul style="list-style: decimal-leading-zero;">
								
								<li><?php echo $this->lang->line('text202'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>".$forms->person1."&nbsp;".$forms->initial_name_s."</span>"; ?></li> 
								
								<li><?php echo $this->lang->line('text203'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed;'>" .$forms->full_name_s."</span>"; ?></li>
									
								<li><?php echo $this->lang->line('text204'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->initial_name_e."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text206'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->red_address."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('birth_date'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datei."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text205'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nationality."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text206a'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nic_no."</span>"; ?></li>
									
									
								<li><?php echo $this->lang->line('text209a'); ?> <br>
									09.1&nbsp;<?php echo $this->lang->line('text210'); ?> 
									<br>
									
									 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_1container dataTables_wrapper" cellspacing="0" width="100%" style="padding: 4px;position:relative">
									
										 <tr>
											 <th colspan="3" style="text-align: left;width: 50%"><?php echo $this->lang->line('text211'); ?></th>
											 <th colspan="3" style="text-align: left;width: 50%"><?php echo $this->lang->line('text212'); ?></th>
										 </tr>
										 <tr>
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('tea_year'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->year1."</span>"; ?>
															
										     </th>
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('tea_year'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->year2."</span>"; ?>
															
										     </th>
										 </tr>
										 
										 
										 <tr>
											 
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('text213'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->exam_no1."</span>"; ?>
															
										     </th>
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('text213'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->exam_no2."</span>"; ?>
															
										     </th>
											 
										 </tr>
										 
								<tr>
                                                         
                                                            <th colspan="2" style="width: 50%" ><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>
                                                            <th colspan="2" style="width: 50%"><?php echo $this->lang->line('text214'); ?></th>
                                                            <th  style="width:5%;"><?php echo $this->lang->line('text215'); ?></th>

                                                        </tr>
										 
										 
										 
										 
										  <tr>
                                                            <td>01</td>
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black;'>" .  $forms->ex1_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black;'>" .  $forms->ex1_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1_grade'); ?></div>
															</td>
															
															<td>01</td>
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black;'>" .  $forms->ex2_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; '>" .  $forms->ex2_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex2_sub1_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>02</td>
                                                            <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub2_grade'); ?></div>
															</td>
                                                            
															
															<td>02</td>
															<td style="width: 50%">
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
                                                             <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub3_grade'); ?></div>
															</td>
															
															<td>03</td>
															<td style="width: 50%">
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
                                                             <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub4_grade'); ?></div>
															</td>
															
															<td>04</td>
                                                           <td style="width: 50%">
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
                                                             <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub5_grade'); ?></div>
															</td>
															
															<td>05</td>
                                                            <td style="width: 50%">
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
                                                            <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub6_grade'); ?></div>
															</td>
															
															<td>06</td>
                                                             <td style="width: 50%">
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
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub7_grade'); ?></div>
															</td>
															
															<td>07</td>
                                                            <td style="width: 50%">
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
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8'); ?></div>
															</td>
                                                             <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub8_grade'); ?></div>
															</td>
															
															<td>08</td>
                                                            <td style="width: 50%">
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
                                                            <td style="width: 50%">
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub9_grade'); ?></div>
															</td>
															
															<td>09</td>
                                                             <td style="width: 50%">
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
                                                             <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->ex1_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('ex1_sub10_grade'); ?></div>
															</td>
															
															<td>10</td>
                                                            <td style="width: 50%">
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
							
								
								<li><?php echo $this->lang->line('text209'); ?> :-<br>
									<?php echo $this->lang->line('school_name'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_name."</span>";?><br>
									<?php echo $this->lang->line('school_address'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->piriven_address."</span>";?>
							   </li>
									
								
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
								  <?php echo $this->lang->line('date'); ?> -  
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
						 
								</div>
							 
							    <div class="row" style="font-size:13px;">                  
                                   <div class="col-md-12 col-sm-12 col-xs-12">
							 
							            <table class=" table dt-responsive nowrap" cellspacing="0" width="100%">
											<tbody>
												<tr>
													<th width="20%"><?php echo $this->lang->line('date1'); ?> : <?php echo "<span style='text-decoration: underline;text-decoration-style: dashed'>" . $forms->datei."</span>"; ?></th>

                                                    <td width="30%"> 
												     
													  <?php if ($forms->sig1_photo) { ?>
														<img class="sig-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig1_photo; ?>" alt="" width="100" />
														<?php }  else { ?>
                                                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                                         <?php } ?>
								                        <label for="photo"><?php echo $this->lang->line('text111'); ?> </label> 
														
													</td>
												</tr>
											</tbody>
									   </table>
									</div>
							    </div>
						</div>
						
						
						 <div class="row"  style="padding-left: 30px;"> 
							 
							    <div class="col-12">
								    <h2 style="font-size:15px;font-weight: 800; text-decoration: underline"><strong><?php echo $this->lang->line('text112'); ?> </strong></h2>
								</div>
							   <br>
							   
							 
							    <div class="col-12" style="font-size:13px;">
								    
							     <ul style="list-style: none">
								
								<li>
									<?php echo $this->lang->line('text113'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->person1."</span>";?>
									<?php echo $this->lang->line('text114'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->person2."</span>";?>
									<?php echo $this->lang->line('text115'); ?> 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->yes_no."</span>";?>
									<?php echo $this->lang->line('text116'); ?>
							     </li>
							    </ul>
						 
								</div>
							    <div class="row" style="font-size:13px;">                  
                                   <div class="col-md-12 col-sm-12 col-xs-12">
							 
							            <table class=" table dt-responsive nowrap" cellspacing="0" width="100%">
											<tbody>
												<tr>
													<th width="20%"><?php echo $this->lang->line('date1'); ?> : <?php echo "<span style='text-decoration: underline;text-decoration-style: dashed'>" . $forms->datevi."</span>"; ?></th>

                                                    <td width="30%"> 
												     
													  <?php if ($forms->sig2_photo) { ?>
														<img class="sig-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig2_photo; ?>" alt="" width="100" />
														<?php }  else { ?>
                                                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                                         <?php } ?>
								                        <label for="photo"><?php echo $this->lang->line('text117'); ?> </label>
												</tr>
											</tbody>
									   </table>
									</div>
							    </div>
						</div>
						
						
						 <div class="row"  style="padding-left: 30px;"> 
							 
							    <div class="col-12">
								    <h2 style="font-size:15px;font-weight: 800; text-decoration: underline"><strong><?php echo $this->lang->line('text118'); ?> </strong></h2>
								</div>
							   <br>
							   
							 
							    <div class="col-12" style="font-size:13px;">
								    
							     <ul style="list-style: none">
								
								<li>
									<?php echo $this->lang->line('text119'); ?> 
									
							     </li>
							    </ul>
						 
								</div>
							    <div class="row" style="font-size:13px;">                  
                                   <div class="col-md-12 col-sm-12 col-xs-12">
							 
							            <table class=" table dt-responsive nowrap" cellspacing="0" width="100%">
											<tbody>
												<tr>
													<th width="20%"><?php echo $this->lang->line('date1'); ?> : <?php echo "<span style='text-decoration: underline;text-decoration-style: dashed'>" . $forms->datevii."</span>"; ?></th>

                                                    <td width="30%"> 
												     
													  <?php if ($forms->sig3_photo) { ?>
														<img class="sig-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig3_photo; ?>" alt="" width="100" />
														<?php }  else { ?>
                                                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                                         <?php } ?>
								                        <label for="photo"><?php echo $this->lang->line('text120'); ?> </label>
												</tr>
											</tbody>
									   </table>
									</div>
							    </div>
						</div>
						<br><br><br><br><br><br>
						
						
						 <div class="row"  style="padding-left: 30px;"> 
							 
							    <div class="col-12">
								    <h2 style="font-size:15px;font-weight: 800; text-decoration: underline"><strong><?php echo $this->lang->line('text121'); ?> </strong></h2>
								</div>
							   <br>
							   
							 
							    <div class="col-12" style="font-size:13px;">
								    
							     <ul style="list-style:decimal-leading-zero">
								
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
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->lay."</span>";?><br>
									(<?php echo $this->lang->line('text124'); ?> )
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
						 
								</div>
							    <div class="row" style="font-size:13px;">                  
                                   <div class="col-md-12 col-sm-12 col-xs-12">
							 
							            <table class=" table dt-responsive nowrap" cellspacing="0" width="100%">
											<tbody>
												<tr>
													<th width="20%"><?php echo $this->lang->line('date1'); ?> : <?php echo "<span style='text-decoration: underline;text-decoration-style: dashed'>" . $forms->dateviii."</span>"; ?></th>

                                                    <td width="30%"> 
												     
													  <?php if ($forms->sig4_photo) { ?>
														<img class="sig-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig4_photo; ?>" alt="" width="100" />
														<?php }  else { ?>
                                                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                                         <?php } ?>
								                        <label for="photo"><?php echo $this->lang->line('text117'); ?> </label>
												</tr>
												
											</tbody>
									   </table>
									</div>
							    </div>
							  <div class="row" style="font-size:13px;">                  
                                   <div class="col-md-12 col-sm-12 col-xs-12">
							  <?php echo $this->lang->line('name2'); ?> :- 
							  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->piriven_name1."</span>";?>
							 </div>
							    </div>
							 
						     </div>
						<br>
						
						
						 <div class="row"  style="padding-left: 30px;"> 
							 
							    <div class="col-12">
								    <h2 style="font-size:15px;font-weight: 800; text-decoration: underline"><strong><?php echo $this->lang->line('text131'); ?> </strong></h2>
								</div>
							   <br>
							   
							 
							    <div class="col-12" style="font-size:13px;">
								    
							     <ul style="list-style: none">
								
								<li>
									<?php echo $this->lang->line('text132'); ?> 
									
							     </li>
							    </ul>
						 
								</div>
							    <div class="row" style="font-size:13px;">                  
                                   <div class="col-md-12 col-sm-12 col-xs-12">
							 
							            <table class=" table dt-responsive nowrap" cellspacing="0" width="100%">
											<tbody>
												<tr>
													<th width="20%"><?php echo $this->lang->line('date1'); ?> : <?php echo "<span style='text-decoration: underline;text-decoration-style: dashed'>" . $forms->dateix."</span>"; ?></th>

                                                    <td width="30%"> 
												     
													  <?php if ($forms->sig5_photo) { ?>
														<img class="sig-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->sig5_photo; ?>" alt="" width="100"  />
														<?php }  else { ?>
                                                          <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                                         <?php } ?>
								                        <label for="photo"><?php echo $this->lang->line('text120'); ?> </label>
												</tr>
											</tbody>
									   </table>
									</div>
							    </div>
						</div>
						
				
                    </div>                 
                 </div>
             </div>

            <!-- this row will not appear when printing -->
			
            <center class="row no-print">
				<div class="ln_solid no-print"></div>
                <div class="col-xs-12">
					<button class="btn btn-info" style="font-size: 18px;font-family: sans-serif;font-weight: 600;" onclick="window.print();"><i class="fa fa-print"></i><?php echo $this->lang->line('print'); ?></button>
				
														
                </div>
            </center>
			
			
        </div>
    </body>
</html>