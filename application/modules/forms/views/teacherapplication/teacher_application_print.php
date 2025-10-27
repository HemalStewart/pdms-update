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
								
								<li><?php echo $this->lang->line('text202'); ?> 
									<?php $type = $forms->type; ?> 
									      <?php if ($type ===  'පූජ්‍ය.'): ?>
												 
                                       <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->type."&nbsp;".$forms->initial_name_s."</span>"; ?>
                                          <?php elseif ($type === 'සීලමාතා.'||'මයා.'||'මිය.'||'මෙනෙවිය.'): ?>
                                             <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->initial_name_s."&nbsp;".$forms->type."</span>";?>
                                          <?php else: ?>
									          <span style='color:black; text-decoration: underline;text-decoration-style: dashed'> - </span>
									<?php endif; ?>
									
									
									</li> 
								
								<li><?php echo $this->lang->line('text203'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed;'>" .$forms->full_name_s."</span>"; ?></li>
									
								<li><?php echo $this->lang->line('text204'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->type_e."&nbsp;".$forms->initial_name_e."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('birth_date'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->datei."</span>"; ?></li>
									
								<li><?php echo $this->lang->line('text205'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nationality."</span>"; ?>
								</li>
								
								<li><?php echo $this->lang->line('text206a'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->nic_no."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text206'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->red_address."</span>"; ?></li>
								
								<li>1.<?php echo $this->lang->line('text207'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->mobile_no."</span>"; ?><br>
								
								    2.<?php echo $this->lang->line('text207b'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->whatsapp_no."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text208'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->e_mail."</span>"; ?></li>
								
								<li><?php echo $this->lang->line('text209'); ?> :-
									<br>
									<?php echo $this->lang->line('school_name'); ?> - 
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_name."</span>"; ?>
									<br>
								    <?php echo $this->lang->line('school_address'); ?> -
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms->piriven_address."</span>"; ?></li>
									
								<li><?php echo $this->lang->line('text209a'); ?> <br>
									11.1&nbsp;<?php echo $this->lang->line('text210'); ?> 
									<br>
									
									 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_1container dataTables_wrapper" cellspacing="0" width="100%" style="padding: 4px;position:relative">
									
										 <tr>
											 <th colspan="3" style="text-align: center;width: 50%"><?php echo $this->lang->line('text211'); ?></th>
											 <th colspan="3" style="text-align: center;width: 50%"><?php echo $this->lang->line('text212'); ?></th>
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
														
															
									
									</table><br><br>
									11.2&nbsp;<?php echo $this->lang->line('text217'); ?> 
									<br>
									
									 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_1container dataTables_wrapper" cellspacing="0" width="100%" style="padding: 4px;position:relative">
									    <tr>
									        <th colspan="6" style="text-align: left;width: 100%"><?php echo $this->lang->line('text218'); ?> :- 
									  <?php $higher_exam_type = $forms1->higher_exam_type; ?>
									      <?php if ($higher_exam_type ==='G.C.E Advanced Level'||'Prachina Panditha Intermediate Examination'|| 
													                        'Prachina Panditha Final Examination'|| 'Vidyodaya Final Examination'|| 
													                        'Vidyalankara Final Examination'||'University First Examination'|| 'Venamulla'): ?>
                                             <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->higher_exam_type."</span>"; ?>
                                          <?php elseif ($higher_exam_type === 'Other'): ?>
                                             <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->higher_exam. "</span>";?>
                                          <?php else: ?>
									          <span style='color:black; text-decoration: underline;text-decoration-style: dashed'> - </span>
									<?php endif; ?>
												
											
											</th>
									    </tr>
										 <tr>
											 <th colspan="3" style="text-align: center;width: 50%"><?php echo $this->lang->line('text219'); ?></th>
											 <th colspan="3" style="text-align: center;width: 50%"><?php echo $this->lang->line('text220'); ?></th>
										 </tr>
										 <tr>
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('tea_year'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->year_h1."</span>"; ?>
															
										     </th>
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('tea_year'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->year_h2."</span>"; ?>
															
										     </th>
										 </tr>
										 
										 
										 <tr>
											 
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('text213'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->exam_noh1."</span>"; ?>
															
										     </th>
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('text213'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->exam_noh2."</span>"; ?>
															
										     </th>
											 
										 </tr>
										 <tr>
											 
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('text221'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->datehi."</span>"; ?>
															
										     </th>
											 <th colspan="3" style="width: 50%">
							
												 <?php echo $this->lang->line('text221'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->datehii."</span>"; ?>
															
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
															<?php echo "<span style='color:black;'>" .  $forms1->hex1_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black;'>" .  $forms1->hex1_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub1_grade'); ?></div>
															</td>
															
															<td>01</td>
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black;'>" .  $forms1->hex2_sub1."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; '>" .  $forms1->hex2_sub1_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub1_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>02</td>
                                                            <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub2_grade'); ?></div>
															</td>
                                                            
															
															<td>02</td>
															<td style="width: 50%">
                                                              <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub2."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub2'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub2_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub2_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>03</td>
                                                             <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub3'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub3_grade'); ?></div>
															</td>
															
															<td>03</td>
															<td style="width: 50%">
                                                        <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub3."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub3'); ?></div>
															</td>
                                                             <td>
														<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub3_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub3_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>04</td>
                                                             <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub4_grade'); ?></div>
															</td>
															
															<td>04</td>
                                                           <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub4."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub4'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub4_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub4_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>05</td>
                                                             <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub5'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub5_grade'); ?></div>
															</td>
															
															<td>05</td>
                                                            <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub5."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub4'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub5_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub5_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>06</td>
                                                            <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub6'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub6_grade'); ?></div>
															</td>
															
															<td>06</td>
                                                             <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub6."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub6'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub6_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub6_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>07</td>
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub7_grade'); ?></div>
															</td>
															
															<td>07</td>
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub7."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub7'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub7_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub7_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>08</td>
                                                            <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub8'); ?></div>
															</td>
                                                             <td>
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub8_grade'); ?></div>
															</td>
															
															<td>08</td>
                                                            <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub8."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub8'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub8_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub8_grade'); ?></div>
															</td>
                                                        </tr>
														
														<tr>
                                                            <td>09</td>
                                                            <td style="width: 50%">
														    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub9'); ?></div>
															</td>
                                                             <td>
													         <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub9_grade'); ?></div>
															</td>
															
															<td>09</td>
                                                             <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub9."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub9'); ?></div>
															</td>
                                                             <td>
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub9_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub9_grade'); ?></div>
															</td>
                                                        </tr>
                                                       
														<tr>
                                                            <td>10</td>
                                                             <td style="width: 50%">
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub1'); ?></div>
															</td>
                                                             <td>
															<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex1_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex1_sub10_grade'); ?></div>
															</td>
															
															<td>10</td>
                                                            <td style="width: 50%">
															 <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub10."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub1'); ?></div>
															</td>
                                                             <td>
														     <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms1->hex2_sub10_grade."</span>";?>
											                  <div class="help-block"><?php echo form_error('hex2_sub10_grade'); ?></div>
															</td>
                                                        </tr>
														
															
									</table>
									</li>
								
							
								
								<li>
								    <?php echo $this->lang->line('text222'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->other_qualifications."</span>";?>
							    </li>
									
								
								<li>
								    <?php echo $this->lang->line('text223'); ?> :-<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms1->yes_no."</span>";?>
<br>
								    <?php echo $this->lang->line('text224'); ?><br>
								    13.1&nbsp;<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap fn_add_stop_container" cellspacing="0" width="100%">
														
														
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
                                    13.2&nbsp;<?php echo $this->lang->line('text228'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->leave_reson."</span>";?>
									<br>
									<br>
									
								    <?php echo $this->lang->line('text229'); ?>
								    <?php echo $this->lang->line('text229a'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->piriven_name1."</span>";?>
								    <?php echo $this->lang->line('text229b'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->dateiv."</span>";?>
								    <?php echo $this->lang->line('text230'); ?>
									<br>
									<br>
									<br>
									
									
								
								
									<!-- <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
									
								    <?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->datev."</span>";?>
												</div>
									<br>
									<br>
									<br>
									<br>
										   <div class="col-md-6 col-sm-6 col-xs-12">
								    <?php echo $this->lang->line('text111'); ?>
								    <?php if ($forms1->sig1_photo) { ?>

                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms1->applicant_sig1; ?>" alt="" width="100" />

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?>
										 </div></div>-->
									
									<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms1->datev."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text111'); ?>
								    <?php if ($forms1->applicant_sig1) { ?>

                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms1->applicant_sig1; ?>" alt="" width="100" />

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?></td>
										</tr>
										
									</table>

							    </li>
							   <!-- <div class="row instructions">
							        <?php echo "<span style='text-decoration: underline;'>" .$this->lang->line('text231')."</span>"; ?> 
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
								</div>-->
								</ul>
								<!-------- page 2--------->
								
								<div class="certificate-top">
                                                       
                                    <div class="row">
									    <div class="col-12" style="text-align:center;">
										    <strong><h4 style="font-size:17px;font-weight: 800;"><?php echo $this->lang->line('part2'); ?></h4></strong>
										    <strong><h4 style="font-size:15px;font-weight: 800; font-style: italic;"><?php echo $this->lang->line('text237'); ?></h4></strong>
								        </div>
                                    </div>                            
                                </div>
                                
                                <ul style="list-style: decimal-leading-zero;">
                                   
									<li class="col-md-12">
									<?php echo "<span class='col-md-3 ol-sm-2 col-xs-12'>". $this->lang->line('text238'); ?><br>
                                        <?php echo $this->lang->line('text239')."</span>";?>
										
                                        <div class="col-md-9 ol-sm-2 col-xs-12" style="text-align: center">
                                       <table  id="datatable-responsive" class="table dt-responsive nowrap " cellspacing="0" width="100%">
                                         <tr>
                                            
                                            <td style="width:35%">
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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_year1."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_month1."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_date1."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                        </table>
											 </td> 
                                            <td style="width:10%">
												 <?php echo "<span class='col-md-1 col-sm-2 col-xs-12'>" .$this->lang->line('work_to')."</span>"; ?>
											 </td>
                                            <td style="width:35%">
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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_year2."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_month2."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_date2."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                </table>
											 </td>
                                         </tr>
 

                                    </table>
                                        </div>
									</li>
										
								      <li class="col-md-12">
								
									    <?php echo "<span class='col-md-7 col-sm-2 col-xs-12'>". $this->lang->line('text240')."</span>"; ?> 
									
									        <div class="col-md-5 col-sm-2 col-xs-12" style="text-align: center">
									
									            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="50%">

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
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_monk."</span>";?>
                                                                </td>
                                                                <td>
                                                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_lay."</span>";?>
                                                                </td>
                                                                <td>
                                                                  <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->annual_total."</span>";?>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                </table>
									
									        </div>
                                        
                                    </li>
									
									   <li class="col-md-12">
								
									    <?php echo "<span class='col-md-6 ol-sm-2 col-xs-12'>". $this->lang->line('text241')."</span>"; ?> 
									
									        <div class="col-md-6 col-sm-2 col-xs-12" style="text-align: center">
									
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
								
									    <?php echo "<span class='col-md-6 ol-sm-2 col-xs-12'>". $this->lang->line('text244')."</span>"; ?> 
									
									        <div class="col-md-6 ol-sm-2 col-xs-12" style="text-align: center">
									
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
                                                                <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" . $forms->thur7."</span>";?>
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
									
									 <li class="col-md-12">
										 <?php echo $this->lang->line('text247'); ?>
									
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
                                                            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms2->proposed_monk."</span>";?>
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
							        <li class="col-md-12">
							            <?php echo $this->lang->line('text251'); ?> :- 
							            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->additional_appointment."</span>"; ?>
							        </li>
									
								  <li class="col-md-12">
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
									<li class="col-md-12" style="list-style: none">
										<table id="datatable-responsive" class=" col-md-12 table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <br><br>
										   <?php echo $this->lang->line('text273'); ?>
										   <br>
									<br><br>
								<br>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms2->dateviii."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text111'); ?>
								    <?php if ($forms2->t2_kruthy_sig1) { ?>

                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms2->t2_kruthy_sig1; ?>" alt="" width="100" />

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?></td>
										</tr>
										
									</table>

									</li>
								
                                </ul>
                                
                                <!------- 3 page -------->
                                
                                <div class="certificate-top">
                                                       
                                    <div class=" col-md-12 row">
									    <div class="col-md-12" style="text-align:center;">
										    <strong><h4 style="font-size:17px;font-weight: 800;"><?php echo $this->lang->line('part3'); ?></h4></strong>
										    <strong><h4 style="font-size:15px;font-weight: 800; font-style: italic;"><?php echo $this->lang->line('text274'); ?></h4></strong>
								        </div>
                                    </div>                            
                                </div>
                                
									 <ul style="list-style:none;">
										 <li class="col-md-12">
										 
                                <div>
                                    <?php echo $this->lang->line('text275'); ?> 
		                            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->kpiriven_name1."</span>";?>
		                            <?php echo $this->lang->line('text276'); ?>
		                            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms->kcount."</span>";?>
		                            <?php echo $this->lang->line('text277'); ?>
											 </div></li>
                                <div>
									
									<br>
									<br>
										<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms3->dateix."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text278'); ?>
								    <?php if ($forms3->officer_sig1) { ?>

                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->officer_sig1; ?>" alt="" width="100" />

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?>
										   
											</br></br></br></br>
										   <?php echo $this->lang->line('text279'); ?>
                                    <?php if ($forms3->sig1_photo) { ?>

                                        <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->zonal_sig1; ?>" alt="" width="100" />
                                        <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->zonalstamp_sig2; ?>" alt="" width="100" />

                                        <?php }  else { ?>
                                        <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?></td>
										</tr>
										
									</table>
									
                          
                                </div><br><br>
                                <div>
                                    <?php echo $this->lang->line('text279a'); ?> 
		                            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->datex."</span>";?><br>
		                            <?php echo $this->lang->line('text280'); ?> 
		                            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->zonal_office."</span>";?>
                                </div>
                                
                                <br><br>
                                <div class="certificate-top">
                                                       
                                    <div class="row">
									    <div class="col-12" style="text-align:center;">
										    <strong><h4 style="font-size:15px;font-weight: 800; font-style: italic;"><?php echo $this->lang->line('text281'); ?></h4></strong>
								        </div>
                                    </div>                            
                                </div>
                                <div>
                                    <?php echo $this->lang->line('text282'); ?> 
		                   <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->asst_province_type."</span>";?>&nbsp; 
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->asst_province_name."</span>";?>
		                   <?php echo $this->lang->line('text282a'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->asst_province_pname."</span>";?>
		                   <?php echo $this->lang->line('text283'); ?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->kpiriven_type."</span>";?>
		                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->recommendation."</span>";?>
                                </div><br><br><br>
                                <div>
									
									<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms3->datexi."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text278'); ?>
								    <?php if ($forms3->sig1_photo) { ?>

                                         <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->asst_province_sig1; ?>" alt="" width="100" />
                                        <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms->asst_provincestamp_sig2; ?>" alt="" width="100" />

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?>
										</td>
										</tr>
										
									</table>
                                  
                                </div>
                                
									</ul>
                                <!-------- 4 page ------->
                                
                                <div class="certificate-top">
                                                       
                                    <div class="row">
									    <div class="col-12" style="text-align:center;">
									        <strong><h4 style="font-size:17px;font-weight: 800;"><?php echo $this->lang->line('part4'); ?></h4></strong>
										    <strong><h4 style="font-size:15px;font-weight: 800; font-style: italic;"><?php echo $this->lang->line('text285'); ?></h4></strong>
								        </div>
                                    </div>                            
                                </div>
                                <div>
                                   <?php echo $this->lang->line('text286'); ?> 
		                           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->min_piriven_name."</span>";?>
		                           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->min_piriven_type."</span>";?>
		                           <?php echo $this->lang->line('text286a'); ?>
		                           <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->true_not."</span>";?>
		                           <?php echo $this->lang->line('text287'); ?>
                                </div><br><br><br>
                                <div>
									
									<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms3->datexii."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text278'); ?>
								    <?php if ($forms3->edu_clerk_sig1) { ?>

                                         <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->edu_clerk_sig1; ?>" alt="" width="100" />
                                       

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?>
										</td>
										</tr>
										
									</table>
									
									
                              
                                </div>
			                      <div class="ln_solid"></div>
			                    <br>
                                <div>
									<?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->approved_not."</span>";?>
		               <br><br><br>
									<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms3->datexiii."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text278'); ?>
								    <?php if ($forms3->sig1_photo) { ?>

                                         <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->asdic_sig; ?>" alt="" width="100" />
                                       

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?>
										</td>
										</tr>
										
									</table>
									
									
                                   
                                </div>
                                <div class="ln_solid"></div>
                                <div>
                                    <?php echo $this->lang->line('text291'); ?>
		                            <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->submition."</span>";?>
		                            <?php echo $this->lang->line('text291a'); ?>
                                </div><br><br>
                                <div>
									
									<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms3->datexiv."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text278'); ?>
								    <?php if ($forms3->commitee_mem_sig) { ?>

                                         <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->commitee_mem_sig; ?>" alt="" width="100" />
                                       

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?>
										</td>
										</tr>
										
									</table>
                                   
                                </div>
                                <div class="ln_solid"></div>
                                <div>
                                    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->given_not."</span>";?>
		                            <?php echo $this->lang->line('text293'); ?><br>
		                            <?php echo $this->lang->line('text294'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->min_note."</span>";?>
                                </div><br><br>
                                <div>
									
									<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%">
  
                                       <tr>
										   <td ><?php echo $this->lang->line('date'); ?>
								    <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .$forms3->datexiv."</span>";?>
										   </td>
										   <td style="text-align: right"><?php echo $this->lang->line('text278'); ?>
								    <?php if ($forms3->min_director_sig) { ?>

                                         <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->min_director_sig; ?>" alt="" width="100" />
                                       

                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?>
										</td>
										</tr>
										
									</table>
                                
                                </div>
                                <div class="ln_solid"></div>
                                <div class="row" style="border: 2px solid #73879C; margin: 2px">
									  <h3 style="font-size: 20px;text-decoration: underline;text-align: center;"><strong><?php echo $this->lang->line('text296'); ?></strong></h3>
									<table id="datatable-responsive" class="table  dt-responsive nowrap" cellspacing="0" width="100%"
										<tr>
											<td><?php echo $this->lang->line('text297'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->received_datexvi."</span>";?></td>
											<td><?php echo $this->lang->line('text298'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->sub_no."</span>";?></td>
										</tr>
										
										<tr>
											<td><?php echo $this->lang->line('text299'); ?> :- 
		                            <?php if ($forms->sig1_photo) { ?>
                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/form/<?php echo $forms3->accepted_sig1; ?>" alt="" width="100" />
                                        <?php }  else { ?>
                                            <img src="<?php echo IMG_URL; ?>/signature.png" alt="" width="60" /> 
                                    <?php } ?></td>
											<td><?php echo $this->lang->line('text300'); ?> :- <?php echo "<span style='color:black; text-decoration: underline;text-decoration-style: dashed'>" .  $forms3->reply."</span>";?></td>
										</tr>
									
									</table>

                                   
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