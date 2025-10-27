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
</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-user-md"></i><small> <?php echo $this->lang->line('pirven_annual_report'); ?></small></h3>
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
                        ?>"><a href="#tab_annual_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'report', 'pannreport')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('report/designation/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_annual"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?> 
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_annual"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>   


                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_annual_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){   ?>
                                                <th><?php echo $this->lang->line('school_name'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('running_year'); ?></th>
                                            <th><?php echo $this->lang->line('create'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($annualreportval) && !empty($annualreportval)) {
                                            ?>
                                            <?php foreach ($annualreportval as $obj) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>
                                                        <td><?php echo $obj->school_name;         ?></td>
                                                    <?php }  ?>
                                                    <td><?php echo ucfirst($obj->sch_year); ?></td>
                                                    <td><?php echo $obj->created_at; ?></td>
                                                    <td>
                                                        <?php // if (has_permission(EDIT, 'report', 'report')) { ?>
                                                            <a href="<?php echo site_url('report/report/pannualreportedit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php // } ?>
                                                        <?php // if (has_permission(DELETE, 'hrm', 'designation')) { ?>
                                                            <a href="<?php echo site_url('report/report/pannualreportdelete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                        <?php // } ?>
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
                        ?>" id="tab_add_annual">
                            <div class="x_content"> 
                                <?php echo form_open(site_url('report/pannualreportadd'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <ul  class="nav nav-tabs bordered">
                                    <li  class="active" ><a href="#tab_main"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('pirven_main'); ?></a> </li>

                                    <li><a href="#tab_first"   role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_sec'); ?></a> </li>                          

                                    <li><a href="#tab_sec"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('pirven_third'); ?></a> </li>                          

                                    <li ><a href="#tab_third"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('pirven_forth'); ?></a> </li>                          

                                    <li ><a href="#tab_four"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('pirven_five'); ?></a> </li>  

                                    <li ><a href="#tab_five"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('pirven_six'); ?></a> </li>    

                                    <li ><a href="#tab_six"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('pirven_seven'); ?></a> </li>    

                                    <li ><a href="#tab_seven"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('pirven_eight'); ?></a> </li>    

                                    <!--<li><a href="#tab_six"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('pirven_nine'); ?></a> </li>-->   

                                </ul>
                                <br>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab_main">
                                        
                                        <div class="row column-title">
                                           <div class="col-md-12">
											   <div class="col-sm-6" style="text-align:right;">
											       <h3><strong><?php echo $this->lang->line('p_a_r'); ?> - </strong></h3>
											   </div>
											   <div class="col-sm-6" style="text-align: left;">
											     <select  class="form-control col-md-7 col-xs-12" name="sch_year" id="sch_year" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                            <option value="2021">2021</option>                                           
                                            <option value="2022">2022</option>        
                                             <option value="2023">2023</option>                                           
                                            <option value="2024">2024</option>        
                                             <option value="2025">2025</option>                                           
                                            <option value="2026">2026</option>       
                                             <option value="2027">2027</option>                                           
                                            <option value="2028">2028</option>        
                                        </select>
                                        <div class="help-block"><?php echo form_error('is_applicable_discount'); ?></div>
										       </div>
                                           </div>
									   </div>
									   <br>
									          <div class="row">  
                                    
                                   <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="fdate"><?php echo $this->lang->line('relevant_time'); ?></label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="fdate"  id="add_fdate" value="<?php echo isset($post['fdate']) ? $post['fdate'] : ''; ?>" placeholder="<?php echo $this->lang->line('date1'); ?>"  type="text" autocomplete="off">                                                                              
                                        <div class="help-block"><?php echo form_error('fdate'); ?></div>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="tdate" style="text-align: center;"><?php echo $this->lang->line('from'); ?></label>
                                     <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" name="tdate"  id="add_tdate" value="<?php echo isset($post['tdate']) ? $post['tdate'] : ''; ?>" placeholder="<?php echo $this->lang->line('date1'); ?>"  type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('tdate'); ?></div>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="note"  style="text-align:left;"><?php echo $this->lang->line('to'); ?> </label>
                                     
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="gdtae"><?php echo $this->lang->line('re_get_date'); ?></label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" name="gdate"  id="add_gdate" value="<?php echo isset($post['gdate']) ? $post['gdate'] : ''; ?>" placeholder="<?php echo $this->lang->line('date1'); ?>"  type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('gdate'); ?></div>
                                     </div>
                       
                                
                                     </div>
                                     
                                      </div>

                                        <div class="row">
                                            
                                         <!--    <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sch_year"><?php echo $this->lang->line('year'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12" name="sch_year" id="sch_year" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                            <option value="2021">2021</option>                                           
                                            <option value="2022">2022</option>        
                                             <option value="2023">2023</option>                                           
                                            <option value="2024">2024</option>        
                                             <option value="2025">2025</option>                                           
                                            <option value="2026">2026</option>       
                                             <option value="2027">2027</option>                                           
                                            <option value="2028">2028</option>        
                                        </select>
                                        <div class="help-block"><?php echo form_error('is_applicable_discount'); ?></div>
                                    </div>
                                </div>-->

                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="sch_name"><?php echo $this->lang->line('name1'); ?><span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12" name="sch_name"  type="text" id="sch_name" value="<?php echo isset($schools->school_name) ? $schools->school_name : ''; ?>"  placeholder="<?php echo $this->lang->line('name1'); ?>" required 
                                                            type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="sch_address"><?php echo $this->lang->line('address3'); ?> </label>
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="sch_address"  id="sch_address" value="<?php echo isset($schools->address) ? $schools->address : ''; ?>" placeholder="<?php echo $this->lang->line('address3'); ?>">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">			  
                                                <div class="item form-group">
                                                    <label for="sch_province"><?php echo $this->lang->line('province'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12" type="text" name="sch_province" id="sch_province" value="<?php echo isset($schools->provincialname) ? $schools->provincialname : ''; ?>" placeholder="<?php echo $this->lang->line('province'); ?>" required />
                                                </div>	
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="sch_zone"><?php echo $this->lang->line('zone'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="sch_zone" id="sch_zone" placeholder="කලාප අධ්‍යාපන කාර්යාලය" value="<?php echo isset($schools->zonename) ? $schools->zonename : ''; ?>" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="sch_divition"><?php echo $this->lang->line('divi'); ?>  </label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="sch_divition"  id="sch_divition" value="" placeholder="<?php echo $this->lang->line('divi'); ?>" value="<?php echo isset($schools->address) ? $schools->address : ''; ?>" required="required" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="sch_office"><?php echo $this->lang->line('office1'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="sch_office" id="sch_office" placeholder="<?php echo $this->lang->line('office1'); ?> " value="<?php echo isset($schools->zoneblock) ? $schools->zoneblock : ''; ?>" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="sch_district"><?php echo $this->lang->line('district2'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="sch_district"  id="sch_district" value="" placeholder="<?php echo $this->lang->line('district2'); ?> " value="<?php echo isset($schools->districtname) ? $schools->districtname : ''; ?>" required="required" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>




                                             <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label>5.</label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>


                                                        </thead>
                                                        <tbody id="fn_mark">
                                                            <tr>

                                                                <th  colspan = "2"><?php echo $this->lang->line('k_person'); ?></th>  

                                                                <td  colspan = "2">
                                                                    <!--<input type="text" id="5i" value="" name="5i" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">-->
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="5i"  id="5i" value="<?php echo isset($post['5i']) ? $post['5i'] : ''; ?>" placeholder="<?php echo $this->lang->line('k_person'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th  colspan = "2"><?php echo $this->lang->line('k_person_add'); ?></th>  

                                                                <td  colspan = "2">
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="5ii"  id="5ii" value="<?php echo isset($post['5ii']) ? $post['5ii'] : ''; ?>" placeholder="<?php echo $this->lang->line('k_person_add'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('k_person_phone'); ?></th>  

                                                                <td>
                                                                   <input  class="form-control col-md-7 col-xs-12"  name="5iii"  id="5iii" value="<?php echo isset($post['5iii']) ? $post['5iii'] : ''; ?>" placeholder="<?php echo $this->lang->line('k_person_phone'); ?>"  type="text" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('k_person_mobile'); ?></th>  

                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="5iv"  id="5iv" value="<?php echo isset($post['5iv']) ? $post['5iv'] : ''; ?>" placeholder="<?php echo $this->lang->line('k_person_mobile'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('k_person_fax'); ?></th>  

                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="5v"  id="5v" value="<?php echo isset($post['5v']) ? $post['5v'] : ''; ?>" placeholder="<?php echo $this->lang->line('k_person_fax'); ?>"  type="text" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('k_person_email'); ?></th>  

                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="5vi"  id="5vi" value="<?php echo isset($post['5vi']) ? $post['5vi'] : ''; ?>" placeholder="<?php echo $this->lang->line('k_person_email'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>



                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label>6.</label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>


                                                        </thead>
                                                        <tbody id="fn_mark">
                                                            <tr>

                                                                <th  colspan = "2"><?php echo $this->lang->line('p_person'); ?></th>  

                                                                <td  colspan = "2">
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="6i"  id="6i" value="<?php echo isset($post['6i']) ? $post['6i'] : ''; ?>" placeholder="<?php echo $this->lang->line('p_person'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th  colspan = "2"><?php echo $this->lang->line('p_person_add'); ?> </th>  

                                                                <td  colspan = "2">
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="6ii"  id="6ii" value="<?php echo isset($post['6ii']) ? $post['6ii'] : ''; ?>" placeholder="<?php echo $this->lang->line('p_person_add'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('p_person_phone'); ?></th>  

                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="6iii"  id="6iii" value="<?php echo isset($post['6iii']) ? $post['6iii'] : ''; ?>" placeholder="<?php echo $this->lang->line('p_person_phone'); ?>"  type="text" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('p_person_mobile'); ?></th>  

                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="6iv"  id="6iv" value="<?php echo isset($post['6iv']) ? $post['6iv'] : ''; ?>" placeholder="<?php echo $this->lang->line('p_person_mobile'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('p_person_fax'); ?></th>  

                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="6v"  id="6v" value="<?php echo isset($post['6v']) ? $post['6v'] : ''; ?>" placeholder="<?php echo $this->lang->line('p_person_fax'); ?>"  type="text" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('p_person_email'); ?></th>  

                                                                <td>
                                                                    <input  class="form-control col-md-7 col-xs-12"  name="6vi"  id="6vi" value="<?php echo isset($post['6vi']) ? $post['6vi'] : ''; ?>" placeholder="<?php echo $this->lang->line('p_person_email'); ?>"  type="text" autocomplete="off">
                                                                </td>


                                                            </tr>



                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>



                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label>7.</label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    
                                                        <thead>
                                                        <tr>
    
                                                         <th><?php echo $this->lang->line('piriven_no1'); ?></th>
                                                          <th ><?php echo $this->lang->line('piriven_date'); ?></th>
                                                          <th ><?php echo $this->lang->line('piriven_update'); ?></th>
                                                          <th colspan="2"><?php echo $this->lang->line('piriven_open'); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="fn_mark">
                                                        <tr>
                                                          <td rowspan="2">
                                                               <input  class="form-control col-md-7 col-xs-12"  name="7i"  id="7i" value="<?php echo isset($post['7i']) ? $post['7i'] : ''; ?>" placeholder="<?php echo $this->lang->line('number'); ?>"  type="text" autocomplete="off">
                                                          </td>
                                                          <td rowspan="2">
                                                                <input  class="form-control col-md-7 col-xs-12"  name="7iidate"  id="add_7iidate" value="<?php echo isset($post['7iidate']) ? $post['7iidate'] : ''; ?>" placeholder="<?php echo $this->lang->line('date1'); ?>"  type="text" autocomplete="off">                                                                              
                                                                <div class="help-block"><?php echo form_error('piridate'); ?></div>
                                                          </td>
                                                          <td rowspan="2">
                                                               <input  class="form-control col-md-7 col-xs-12"  name="7iiidate"  id="add_7iiidate" value="<?php echo isset($post['7iiidate']) ? $post['7iiidate'] : ''; ?>" placeholder="<?php echo $this->lang->line('date1'); ?>"  type="text" autocomplete="off">                                                                              
                                                                <div class="help-block"><?php echo form_error('piridate'); ?></div>
                                                          </td>
                                                          <td><?php echo $this->lang->line('am'); ?></td>
                                                          <td><?php echo $this->lang->line('pm'); ?></td>
    
                                                        </tr>
                                                        <tr>
                                                          <td>
                                                            <input type="text" id="7iv" value="" name="7iv" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                          </td>
                                                          <td>
                                                              <input type="text" id="7iv" value="" name="7iv" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                          </td>
    
                                                        </tr>
                                                        </tbody>
                                                       
                                                    </table>

                                                </div>
                                            </div>



                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion">8. </label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td><label for="phone">01 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('sessioan_year_count'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">02 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('sessioan_count'); ?></label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">03 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('sessioan_year_date'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion">9. </label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <tr>
                                                            <th></th>
                                                            <th><label for="phone"><?php echo $this->lang->line('matter'); ?></label> </th>
                                                            <th><label for="phone"><?php echo $this->lang->line('monk'); ?></label> </th>
                                                            <th><label for="phone"><?php echo $this->lang->line('lay'); ?></label> </th>
                                                            <th><label for="phone"><?php echo $this->lang->line('count'); ?> </label> </th>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">01 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_pre_year'); ?></label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">02 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_year'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="stu_monk" id="stu_monk" placeholder=""  value="<?php echo isset($stumonk) ? $stumonk : ''; ?>"  type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="stu_lay" id="stu_lay" placeholder=""  value="<?php echo isset($lay) ? $lay : ''; ?>"  type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="<?php echo ($lay+$stumonk); ?>" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">03 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_year_count'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">04 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_year_leave'); ?></label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">05 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_endyear_count'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">06 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_year_present'); ?></label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion">10. </label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <tr>
                                                            <th></th>
                                                            <th><?php echo $this->lang->line('grade_year'); ?></th>
                                                            <th colspan="3"><?php echo $this->lang->line('stu_count'); ?></th>
                                                            <th colspan="3"><?php echo $this->lang->line('stu_present_count'); ?></th>
                                                            <th colspan="4"><?php echo $this->lang->line('endyear_test'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?php echo $this->lang->line('monk'); ?></td>
                                                            <td><?php echo $this->lang->line('lay'); ?></td>
                                                            <td><?php echo $this->lang->line('count'); ?> </td>
                                                            <td><?php echo $this->lang->line('monk'); ?></td>
                                                            <td><?php echo $this->lang->line('lay'); ?></td>
                                                            <td><?php echo $this->lang->line('count'); ?> </td>
                                                            <td><?php echo $this->lang->line('present'); ?> </td>
                                                            <td><?php echo $this->lang->line('pass'); ?> </td>
                                                            <td><?php echo $this->lang->line('fail'); ?> </td>
                                                            <td><?php echo $this->lang->line('presantage'); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><?php echo $this->lang->line('0_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('1_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('2_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('3_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('4_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('5_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('6_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('7_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>09</td>
                                                            <td><?php echo $this->lang->line('8_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td><?php echo $this->lang->line('9_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td><?php echo $this->lang->line('10_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td><?php echo $this->lang->line('11_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td><?php echo $this->lang->line('12_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td><?php echo $this->lang->line('13_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>15</td>
                                                            <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>17</td>
                                                            <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>18</td>
                                                            <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>19</td>
                                                            <td><?php echo $this->lang->line('degree'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>20</td>
                                                            <td><?php echo $this->lang->line('other1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $this->lang->line('count'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                    </table>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion"><?php echo $this->lang->line('student_analysis'); ?> </label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <tr>
                                                            <th colspan="4"><?php echo $this->lang->line('accordingto_monk'); ?> </th>
                                                            <th colspan="4"><?php echo $this->lang->line('accordingto_lay'); ?></th>
                                                            <th colspan="4"><?php echo $this->lang->line('accordingto_layreligions'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="religion"><?php echo $this->lang->line('siyam'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('amarapura'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('ramanna'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('other1'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('sinhala'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('tamil'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('muslim'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('other1'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('buddhist'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('hindu'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('christian'); ?></label></td>
                                                            <td><label for="religion"><?php echo $this->lang->line('muslim'); ?></label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                    </table>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion"><?php echo $this->lang->line('student_resident'); ?> </label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <tr>
                                                            <th><?php echo $this->lang->line('student_resident_no'); ?></th>
                                                            <th><?php echo $this->lang->line('monk'); ?></th>
                                                            <th><?php echo $this->lang->line('lay'); ?></th>
                                                            <th><?php echo $this->lang->line('count'); ?></th>

                                                            <th><?php echo $this->lang->line('student_nonresident'); ?></th>
                                                            <th><?php echo $this->lang->line('monk'); ?></th>
                                                            <th><?php echo $this->lang->line('lay'); ?></th>
                                                            <th><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <p>13.<?php echo $this->lang->line('text1'); ?> <br>
                                                    </p>
                                                </div>
                                                <div class="item form-group">
                                                    <p>14.<?php echo $this->lang->line('text2'); ?><br>
                                                    </p>
                                                </div>
                                                <div class="item form-group">
                                                    <p>15.<?php echo $this->lang->line('text3'); ?> <br>
                                                    </p>
                                                </div>
                                            </div>


                                            </br>
                                            <div class="col-md-12 col-sm-12 col-xs-12"><?php echo $this->lang->line('text4'); ?>
                                            </div>
                                            </br></br>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="date_submit"> <?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="date_submit" name="date_submit" value="<?php echo isset($date_submit) && $date_submit != '' ? date('d-m-Y', strtotime($date_submit)) : ''; ?>" placeholder=" <?php echo $this->lang->line('date1'); ?>"
                                                            type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="present_address"><?php echo $this->lang->line('principal_sig'); ?> </label>
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="principal"  id="principal" placeholder="<?php echo $this->lang->line('principal_sig'); ?>">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">			  
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('date1'); ?></label>
                                                    <input  class="form-control col-md-7 col-xs-12" type="text" id="date" name="date" placeholder="<?php echo $this->lang->line('date1'); ?>"/>
                                                </div>	
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="full_name"><?php echo $this->lang->line('deputy_director'); ?> </label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="d_director" id="d_director" placeholder="<?php echo $this->lang->line('deputy_director'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                        </div>




                                    </div>

                                    <div class="tab-pane fade in " id="tab_first">

                                        <div class="row">                  
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5  class="column-title" style="text-align: center;"><strong>2</strong></h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="national_id">16.<?php echo $this->lang->line('gov_exams'); ?></label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <th><?php echo $this->lang->line('serial_no'); ?></th>
                                                            <th><?php echo $this->lang->line('exams'); ?></th>
                                                            <th><?php echo $this->lang->line('year'); ?></th>
                                                            <th><?php echo $this->lang->line('class_study_no'); ?></th>
                                                            <th><?php echo $this->lang->line('exam_sit_no'); ?></th>
                                                            <th><?php echo $this->lang->line('pass_no'); ?></th>
                                                            <th><?php echo $this->lang->line('presentage1'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><?php echo $this->lang->line('0_grade_final_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('pracheena_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('pracheena_mid_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('pracheena_final__exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('o_l'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('a_l'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('uni_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('gegree1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td><?php echo $this->lang->line('degree2'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="national_id">17. <?php echo $this->lang->line('extra_activity'); ?></label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <th><?php echo $this->lang->line('society'); ?></th>
                                                            <th><?php echo $this->lang->line('functionality'); ?></th></th>
                                                            <th><?php echo $this->lang->line('evaluation'); ?></th></th>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $this->lang->line('student_society'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $this->lang->line('sabjectt_society'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $this->lang->line('language_society'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="national_id">18. <?php echo $this->lang->line('text5'); ?> </label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td></td>
                                                            <th><?php echo $this->lang->line('field'); ?></th>
                                                            <th><?php echo $this->lang->line('observation'); ?></th>
                                                            <th><?php echo $this->lang->line('evaluation'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><?php echo $this->lang->line('class1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('office2'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('hostal'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('piriven_area'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('dhamma_training'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('pirith_training'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('practice_training'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('extra_activity1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                </br>
                                                <div class="col-md-12 col-sm-12 col-xs-12"><?php echo $this->lang->line('text6'); ?></td>
                                                </div>
                                                </br></br>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"> <?php echo $this->lang->line('date1'); ?></td> <span class="required">*</span></label>
                                                        <input  class="form-control col-md-7 col-xs-12"   type="text" id="date" name="date" placeholder=" <?php echo $this->lang->line('date1'); ?></td>" required 
                                                                type="text" autocomplete="off">
                                                        <div class="help-block"></div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="full_name"><?php echo $this->lang->line('deputy_director'); ?></td><span class="required">*</span></label>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="d_director" id="d_director" placeholder="<?php echo $this->lang->line('deputy_director'); ?>" type="text" autocomplete="off">
                                                        <div class="help-block"></div> 
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-sm-6 col-xs-12">			  
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('date1'); ?><span class="required">*</span></label>
                                                        <input  class="form-control col-md-7 col-xs-12" type="text" id="date" name="date" placeholder="<?php echo $this->lang->line('date1'); ?>" required />
                                                    </div>	
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="present_address"><?php echo $this->lang->line('principal_sig'); ?> <span class="required">*</span></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="principal"  id="principal" placeholder="<?php echo $this->lang->line('principal_sig'); ?>">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>





                                            </div>  
                                        </div> 




                                    </div>


                                    <div class="tab-pane fade in" id="tab_sec">


                                        <div class="row">


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="national_id">19. <?php echo $this->lang->line('text7'); ?> </label>
                                                    <div class="help-block"></div>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <tr>
                                                            <th><?php echo $this->lang->line('a_a'); ?></th>
                                                            <th><?php echo $this->lang->line('doc_no'); ?></th>
                                                            <th><?php echo $this->lang->line('initials_name'); ?></th>
                                                            <th><?php echo $this->lang->line('designation1'); ?></th>
                                                            <th><?php echo $this->lang->line('appointment_date'); ?></th>
                                                            <th><?php echo $this->lang->line('leave_date'); ?></th>
                                                            <th><?php echo $this->lang->line('appointment_approval_adte'); ?></th>
                                                            <th><?php echo $this->lang->line('teaching_sub'); ?></th>
                                                            <th><?php echo $this->lang->line('teaching_hours'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>09</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>



                                    </div>


                                    <div class="tab-pane fade in" id="tab_third">

                                        <div class="row">                  
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5  class="column-title" style="text-align: center;"><strong>4</strong></h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">

                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <th><?php echo $this->lang->line('edu_quli'); ?></th>
                                                            <th><?php echo $this->lang->line('d_o_b'); ?></th>
                                                            <th><?php echo $this->lang->line('nic'); ?></th>
                                                            <th colspan="4"><?php echo $this->lang->line('leave_take'); ?></th>
                                                            <th><?php echo $this->lang->line('annual_salary'); ?></th>
                                                            <th><?php echo $this->lang->line('p_garde'); ?></th>
                                                            <th><?php echo $this->lang->line('salary_update'); ?></th>
                                                            <th><?php echo $this->lang->line('k_approval'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            </br>
                                            <div class="col-md-12 col-sm-12 col-xs-12"><?php echo $this->lang->line('text6'); ?>
                                            </div>
                                            </br></br>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('date1'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="date" name="date" placeholder=" <?php echo $this->lang->line('date1'); ?>" required 
                                                            type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="full_name"><?php echo $this->lang->line('k_approval1'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="k_person" id="k_person" placeholder="<?php echo $this->lang->line('k_approval1'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-sm-6 col-xs-12">			  
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('date1'); ?><span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12" type="text" id="date" name="adte" placeholder="<?php echo $this->lang->line('date1'); ?>" required />
                                                </div>	
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="present_address"><?php echo $this->lang->line('deputy_director'); ?> <span class="required">*</span></label>
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="d_director"  id="d_director" placeholder="<?php echo $this->lang->line('deputy_director'); ?>">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                        </div>




                                    </div>

                                    <div class="tab-pane fade in" id="tab_four">


                                        <div class="row">                  
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5  class="column-title" style="text-align: center;"><strong>5</strong></h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="national_id">20.<?php echo $this->lang->line('phy_resource_analysis'); ?></label>
                                                    <div class="help-block"></div>

                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <div class="item form-group">

                                                            <label for="name"> <?php echo $this->lang->line('land'); ?><?php echo $this->lang->line('acers'); ?> </label>
                                                            <input  class="form-control col-md-7 col-xs-12"   type="text" id="acers" name="acers" placeholder="<?php echo $this->lang->line('acers'); ?>" 
                                                                    type="text" autocomplete="off">
                                                            <div class="help-block"></div> 
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <div class="item form-group">
                                                            <label for="present_address"><?php echo $this->lang->line('rs'); ?> </label>
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="rs"  id="rs" placeholder="<?php echo $this->lang->line('rs'); ?>">
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-sm-2 col-xs-12">			  
                                                        <div class="item form-group">
                                                            <label for="name"><?php echo $this->lang->line('perches'); ?><span </label>
                                                            <input  class="form-control col-md-7 col-xs-12" type="text" id="perches" name="perches" placeholder="<?php echo $this->lang->line('perches'); ?>" />
                                                        </div>	
                                                    </div>

                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <th><?php echo $this->lang->line('description'); ?></th>
                                                            <th><?php echo $this->lang->line('office2'); ?></th>
                                                            <th><?php echo $this->lang->line('class_room'); ?></th>
                                                            <th><?php echo $this->lang->line('library1'); ?></th>
                                                            <th><?php echo $this->lang->line('hostal'); ?></th>
                                                            <th><?php echo $this->lang->line('teacher_room'); ?></th>
                                                            <th><?php echo $this->lang->line('maths_room'); ?></th>
                                                            <th><?php echo $this->lang->line('lab'); ?></th>
                                                            <th><?php echo $this->lang->line('lan_lab'); ?></th>
                                                            <th><?php echo $this->lang->line('com_room'); ?></th>
                                                            <th><?php echo $this->lang->line('toilets'); ?></th>
                                                            <th><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><?php echo $this->lang->line('space'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('library_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('library_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('reading_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('reading_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('office_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('teacher_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('teacher_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>09</td>
                                                            <td><?php echo $this->lang->line('student_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td><?php echo $this->lang->line('student_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td><?php echo $this->lang->line('com_teacher_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td><?php echo $this->lang->line('com_teacher_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td><?php echo $this->lang->line('com_student_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td><?php echo $this->lang->line('com_student_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>15</td>
                                                            <td><?php echo $this->lang->line('other_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td><?php echo $this->lang->line('other_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>17</td>
                                                            <td><?php echo $this->lang->line('doc_cupboards'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>18</td>
                                                            <td><?php echo $this->lang->line('steel_cupboards'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>19</td>
                                                            <td>අ<?php echo $this->lang->line('wood_cupboards'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>20</td>
                                                            <td><?php echo $this->lang->line('glass_cupboards'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>21</td>
                                                            <td><?php echo $this->lang->line('room_cupboards'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>22</td>
                                                            <td><?php echo $this->lang->line('book_racks'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>23</td>
                                                            <td><?php echo $this->lang->line('mag_racks'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>24</td>
                                                            <td><?php echo $this->lang->line('black_board'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>25</td>
                                                            <td><?php echo $this->lang->line('computers'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>26</td>
                                                            <td><?php echo $this->lang->line('ups'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>27</td>
                                                            <td><?php echo $this->lang->line('printers'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>28</td>
                                                            <td><?php echo $this->lang->line('fax_ma'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>29</td>
                                                            <td><?php echo $this->lang->line('pho_ma'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>30</td>
                                                            <td><?php echo $this->lang->line('tv'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>31</td>
                                                            <td><?php echo $this->lang->line('dvd'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>32</td>
                                                            <td><?php echo $this->lang->line('projectors'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>33</td>
                                                            <td><?php echo $this->lang->line('beds'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>34</td>
                                                            <td><?php echo $this->lang->line('clo_racks'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>35</td>
                                                            <td></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off" style="width: 50%;"></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>

                                        </div>  

                                    </div>
                                    <div class="tab-pane fade in" id="tab_five">


                                        <div class="row">
                                            <div class="item form-group">
                                                <label for="national_id">21.<?php echo $this->lang->line('text8'); ?> </label>
                                                <div class="help-block"></div>
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <tr>
                                                        <th></th>
                                                        <th><?php echo $this->lang->line('maintain_doc'); ?></th>
                                                        <th><?php echo $this->lang->line('good'); ?></th>
                                                        <th><?php echo $this->lang->line('not_good'); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>01</td>
                                                        <td><?php echo $this->lang->line('entering_docs'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('attendance_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('t_attendance_doc1'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>04</td>
                                                        <td><?php echo $this->lang->line('t_attendance_doc2'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>05</td>
                                                        <td><?php echo $this->lang->line('leave_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>06</td>
                                                        <td><?php echo $this->lang->line('log_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>07</td>
                                                        <td><?php echo $this->lang->line('goods_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>08</td>
                                                        <td><?php echo $this->lang->line('lost_goods_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>09</td>
                                                        <td><?php echo $this->lang->line('library_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td><?php echo $this->lang->line('sertificats'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>11</td>
                                                        <td><?php echo $this->lang->line('h_exam_marks'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td><?php echo $this->lang->line('t_test_marks'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>13</td>
                                                        <td><?php echo $this->lang->line('out_stu'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>14</td>
                                                        <td><?php echo $this->lang->line('teacher_p_report'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>15</td>
                                                        <td><?php echo $this->lang->line('subject_maintaine_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>16</td>
                                                        <td><?php echo $this->lang->line('class_maintaine_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>17</td>
                                                        <td><?php echo $this->lang->line('time_table'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>18</td>
                                                        <td><?php echo $this->lang->line('annual_plans'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>19</td>
                                                        <td><?php echo $this->lang->line('leave_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>20</td>
                                                        <td><?php echo $this->lang->line('results_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>21</td>
                                                        <td><?php echo $this->lang->line('tea_instructor_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>22</td>
                                                        <td><?php echo $this->lang->line('maintaince_report'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>23</td>
                                                        <td><?php echo $this->lang->line('development_report'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>24</td>
                                                        <td><?php echo $this->lang->line('development_money'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="item form-group">
                                                <label for="national_id">22.<?php echo $this->lang->line('library_org'); ?> </label>
                                                <div class="help-block"></div>
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td>01</td>
                                                        <td><?php echo $this->lang->line('pre_year_library'); ?> </td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('yearly_entered_books'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('yearly_ex_library'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>

                                                </table>


                                            </div>



                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;">23.<?php echo $this->lang->line('account_01'); ?><br> <?php echo $this->lang->line('k_accounts'); ?> </h3>
                                                <div class="help-block"></div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">01. <?php echo $this->lang->line('k_account_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name">02.<?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name">03. <?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('d30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('control_team'); ?></label><br>
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <label for="name">3.1 <?php echo $this->lang->line('chairman'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.2 <?php echo $this->lang->line('secretary'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.3  <?php echo $this->lang->line('treasurer'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('current_year_meetings'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('last_meeting_date'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>

                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <tr>
                                                        <th></th>
                                                        <th><?php echo $this->lang->line('income1'); ?></th>
                                                        <th><?php echo $this->lang->line('rs1'); ?></th>
                                                        <th><?php echo $this->lang->line('sen'); ?></th>
                                                        <th></th>
                                                        <th><?php echo $this->lang->line('spend1'); ?></th>
                                                        <th><?php echo $this->lang->line('rs1'); ?></th>
                                                        <th><?php echo $this->lang->line('sen'); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>01</td>
                                                        <td><?php echo $this->lang->line('income_amount'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>01</td>
                                                        <td><?php echo $this->lang->line('food_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('year_donations'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('anitary_costs'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('library_donation'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('goods_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>04</td>
                                                        <td><?php echo $this->lang->line('facilitative_fee'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>04</td>
                                                        <td><?php echo $this->lang->line('edu_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>05</td>
                                                        <td><?php echo $this->lang->line('other1'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>05</td>
                                                        <td><?php echo $this->lang->line('gass_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>

                                                    <tr>
                                                        <td>06</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>06</td>
                                                        <td><?php echo $this->lang->line('water_bill'); ?>)</td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>07</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>07</td>
                                                        <td><?php echo $this->lang->line('electricity_bill'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>08</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>08</td>
                                                        <td><?php echo $this->lang->line('medical_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>09</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>09</td>
                                                        <td><?php echo $this->lang->line('library_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $this->lang->line('count'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>

                                                        <td></td>
                                                        <td><?php echo $this->lang->line('count'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                </table>

                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('text9'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>
                                                <lu>
                                                    <li><?php echo $this->lang->line('text10'); ?></li>
                                                    <li><?php echo $this->lang->line('text11'); ?></li>
                                                </lu>
                                                <!--
                                                                                    <p>
                                                <?php echo $this->lang->line('text10'); ?><br>
                                                <?php echo $this->lang->line('text11'); ?><br>
                                                                                    </p>
                                                -->
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('date1'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('k_approval1'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="k_person" name="k_person" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('date1'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('deputy_director'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="d_director" name="d_director" placeholder="" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;"><?php echo $this->lang->line('account_02'); ?> <br> <?php echo $this->lang->line('tea_salary_account'); ?>  </h3>
                                                <div class="help-block"></div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">01. <?php echo $this->lang->line('account_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">02. <?php echo $this->lang->line('de30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">03. <?php echo $this->lang->line('salary_officers'); ?></label>
                                                        <div class="item form-group">
                                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <th></th>
                                                                    <th><?php echo $this->lang->line('place'); ?></th>
                                                                    <th><?php echo $this->lang->line('duty_post'); ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.1</td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.2</td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.3</td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <tr>
                                                                <th></th>
                                                                <th><?php echo $this->lang->line('income1'); ?></th>
                                                                <th><?php echo $this->lang->line('rs1'); ?></th>
                                                                <th><?php echo $this->lang->line('sen'); ?></th>
                                                                <th></th>
                                                                <th><?php echo $this->lang->line('spend1'); ?></th>
                                                                <th><?php echo $this->lang->line('rs1'); ?></th>
                                                                <th><?php echo $this->lang->line('sen'); ?></th>        
                                                            </tr>
                                                            <tr>
                                                                <td>01</td>
                                                                <td><?php echo $this->lang->line('basic_salary1'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>01</td>
                                                                <td><?php echo $this->lang->line('basic_salary1'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>02</td>
                                                                <td><?php echo $this->lang->line('pension'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>02</td>
                                                                <td><?php echo $this->lang->line('pension'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>03</td>
                                                                <td><?php echo $this->lang->line('not_pay_salary'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>03</td>
                                                                <td><?php echo $this->lang->line('not_pay_salary'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>04</td>
                                                                <td><?php echo $this->lang->line('living_allowances'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>04</td>
                                                                <td><?php echo $this->lang->line('living_allowances'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>05</td>
                                                                <td><?php echo $this->lang->line('special_offers'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>05</td>
                                                                <td><?php echo $this->lang->line('special_offers'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>06</td>
                                                                <td><?php echo $this->lang->line('interim_allowances'); ?> </td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>06</td>
                                                                <td><?php echo $this->lang->line('interim_allowances'); ?> </td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <p><?php echo $this->lang->line('text12'); ?></p>
                                                </div>
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('principal_sig'); ?></label>
                                                    <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="<?php echo $this->lang->line('principal_sig'); ?>" required /><br>
                                                    <label for="name"><?php echo $this->lang->line('budget_balance'); ?></label>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;">25. <?php echo $this->lang->line('account_03'); ?> <br> පිරිවෙන් සංවර්ධන අරමුදල </h3>
                                                <div class="help-block"></div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">01.<?php echo $this->lang->line('account_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">02. <?php echo $this->lang->line('de30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">03. <?php echo $this->lang->line('p_dev_fund_officers'); ?></label>
                                                        <div class="item form-group">
                                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <th></th>
                                                                    <th><?php echo $this->lang->line('place'); ?></th>
                                                                    <th><?php echo $this->lang->line('duty_post'); ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.1</td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                    <td><?php echo $this->lang->line('k_person'); ?><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.2</td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                    <td><?php echo $this->lang->line('p_person'); ?><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.3</td>
                                                                    <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                    <td><?php echo $this->lang->line('parevacharya'); ?><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">04. <?php echo $this->lang->line('pcurrent_year_meetimg'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">05. <?php echo $this->lang->line('last_meeting_date'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <tr>
                                                                <th></th>
                                                                <th><?php echo $this->lang->line('income1'); ?></th>
                                                                <th><?php echo $this->lang->line('rs1'); ?></th>
                                                                <th><?php echo $this->lang->line('sen'); ?></th>
                                                                <th></th>
                                                                <th><?php echo $this->lang->line('spend1'); ?></th>
                                                                <th><?php echo $this->lang->line('rs1'); ?></th>
                                                                <th><?php echo $this->lang->line('sen'); ?></th>
                                                            </tr>
                                                            <tr>
                                                                <td>01</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>01</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;">29.<?php echo $this->lang->line('count'); ?>account_04 <br> <?php echo $this->lang->line('Quality_input_account'); ?> </h3>
                                                <div class="help-block"></div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">01. <?php echo $this->lang->line('account_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        <label for="name"><?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">02. <?php echo $this->lang->line('de30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">03. <?php echo $this->lang->line('authorized_Officers'); ?></label>
                                                        <div class="item form-group">
                                                            <label for="name">3.1 </label>
                                                            <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        </div>
                                                        <div class="item form-group">
                                                            <label for="name">3.2 </label>
                                                            <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <tr>
                                                                <th></th>
                                                                <th><?php echo $this->lang->line('income1'); ?></th>
                                                                <th><?php echo $this->lang->line('rs1'); ?></th>
                                                                <th><?php echo $this->lang->line('sen'); ?></th>
                                                                <th></th>
                                                                <th><?php echo $this->lang->line('spend1'); ?></th>
                                                                <th><?php echo $this->lang->line('rs1'); ?></th>
                                                                <th><?php echo $this->lang->line('sen'); ?></th>
                                                            </tr>
                                                            <tr>
                                                                <td>01</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>01</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <p></p>
                                                </div>
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('text13'); ?></label>
                                                    <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade in " id="tab_six">

                                        <div class="row">
                                            <div class="item form-group">
                                                <label for="national_id">21. <?php echo $this->lang->line('text7'); ?></label>
                                                <div class="help-block"></div>

                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">27.<?php echo $this->lang->line('de_director'); ?>  :-</label>
                                                        <textarea class="form-control col-md-7 col-xs-12 textarea-4column" name="" id="" placeholder=""></textarea>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"> <?php echo $this->lang->line('de_director_approval'); ?> :-</label>
                                                        <textarea class="form-control col-md-7 col-xs-12 textarea-4column" name="" id="" placeholder=""></textarea>
                                                        <div class="help-block"></div>
                                                        <label for="name"><?php echo $this->lang->line('edu_admin'); ?></label>
                                                        <select class="form-control col-md-7 col-xs-12" name="" id="" required="required">
                                                            <option value="select"><?php echo $this->lang->line('good'); ?></option>
                                                            <option value="select"><?php echo $this->lang->line('not_good'); ?></option>
                                                            </option>
                                                        </select>
                                                        <label for="name"> <?php echo $this->lang->line('payment_recommendations'); ?></label>
                                                        <select class="form-control col-md-7 col-xs-12" name="" id="" required="required">
                                                            <option value="select"> <?php echo $this->lang->line('i_will'); ?></option>
                                                            <option value="select"> <?php echo $this->lang->line('i_do_not'); ?></option>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('de_director_seal'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /><br>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name">28.<?php echo $this->lang->line('de_director_approval'); ?> :- </label>
                                                        <textarea class="form-control col-md-7 col-xs-12 textarea-4column" name="" id="" placeholder=""></textarea>
                                                        <div class="help-block"></div>
                                                        <label for="name"><?php echo $this->lang->line('text15'); ?></label>
                                                        <select class="form-control col-md-7 col-xs-12" name="" id="" required="required">
                                                            <option value="select"><?php echo $this->lang->line('complete'); ?></option>
                                                            <option value="select"><?php echo $this->lang->line('not_complete'); ?></option>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for="name"> <?php echo $this->lang->line('edu_di_approval_seal'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label for="national_id">29.<?php echo $this->lang->line('edu_di_approval'); ?> </label>
                                                <div class="help-block"></div>
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('number'); ?><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="ED/../../../../.." required /></label><br>
                                                    <label for="name"><?php echo $this->lang->line('ccountant'); ?></label><br>
                                                    <label for="name"><?php echo $this->lang->line('ministry_edu'); ?></label><br>
                                                    <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /><br>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                <label for="national_id"> <?php echo $this->lang->line('text16'); ?></label>
                                            </div>
                                            <div class="item form-group">
                                                <input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required />
                                                <label for="name"><br><?php echo $this->lang->line('p_edu_directo'); ?> <br> <?php echo $this->lang->line('edu_sec'); ?> </label>
                                                <input class="form-control col-md-7 col-xs-12" type="date" id="" placeholder="" required />
                                                <label for="name"><?php echo $this->lang->line('text17'); ?></label>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="tab-pane fade in " id="tab_seven">

                                        <div class="row">                  
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h4  class="column-title"><i class="fa fa-users"></i><strong> <?php echo $this->lang->line('text18'); ?> </strong></h4>
                                            </div>
                                        </div>



                                        <div class="row">


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <th></th>
                                                            <th><?php echo $this->lang->line('title1'); ?></th>
                                                            <th><?php echo $this->lang->line('unit_no'); ?></th>
                                                            <th><?php echo $this->lang->line('unit_price'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <th><?php echo $this->lang->line('rs1'); ?></th>
                                                            <th><?php echo $this->lang->line('sen'); ?></th>

                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><?php echo $this->lang->line('monk_stu'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('lay_stu'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('library1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" id="" placeholder="" required /></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($schools) ? $schools->id : $id; ?>" name="school_id" id="school_id" />
                                        <a  href="<?php echo site_url('report/pannualreport'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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
</div> 

<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<!-- datatable with buttons -->
<script type="text/javascript">

          $('#add_fdate').datepicker({startView: 2});
          $('#add_tdate').datepicker({startView: 2}); 
          $('#add_gdate').datepicker({startView: 2});
          $('#add_7iidate').datepicker({startView: 2});
          
    $(document).ready(function () {
         $('#date_submit').datepicker();
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