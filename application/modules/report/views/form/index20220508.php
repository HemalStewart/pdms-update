	<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
	  font-size: 15px;
}
label {
    width: 100%;
    font-size: 15px;
		}
p{
font-size: 15px;
}
.form-horizontal .control-label {
    padding-top: 8px;
    font-size: 15px;
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
                                            <?php // if($this->session->userdata('role_id') == SUPER_ADMIN){   ?>
                                                <!--<th><?php echo $this->lang->line('school_name'); ?></th>-->
                                            <?php // } ?>
                                            <th><?php echo $this->lang->line('running_year'); ?></th>
                                            <th><?php echo $this->lang->line('note'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($designations) && !empty($designations)) {
                                            ?>
                                            <?php foreach ($designations as $obj) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <?php // if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>
        <!--                                                <td><?php // echo $obj->school_name;      ?></td>-->
                                                    <?php // }  ?>
                                                    <td><?php echo ucfirst($obj->name); ?></td>
                                                    <td><?php echo $obj->note; ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'hrm', 'designation')) { ?>
                                                            <a href="<?php echo site_url('hrm/designation/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'hrm', 'designation')) { ?>
                                                            <a href="<?php echo site_url('hrm/designation/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                        ?>" id="tab_add_annual">
                            <div class="x_content"> 
                                <?php echo form_open(site_url('hrm/designation/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

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
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab_main">
                                        
                                        <div class="row">                  
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h3  class="column-title" style="text-align: center;"><strong><?php echo $this->lang->line('p_a_r'); ?></strong></h3>
                                            </div>
                                        </div>
                                 <br>
                               
                                    
                                   <div class="row">  
                                    
                                   <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="note"><?php echo $this->lang->line('relevant_time'); ?></label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" name="fdate"  id="fdate" value="" placeholder="<?php echo $this->lang->line('from'); ?>" required="required" type="date" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('form'); ?></div>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="note" style="text-align: center;"><?php echo $this->lang->line('from'); ?></label>
                                     <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" name="tdate"  id="tdate" value="" placeholder="<?php echo $this->lang->line('from'); ?>" required="required" type="date" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('form'); ?></div>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="note"  style="text-align:left;"><?php echo $this->lang->line('to'); ?> </label>
                                     
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="note"><?php echo $this->lang->line('re_get_date'); ?></label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" name="gdate"  id="gdate" value="" placeholder="<?php echo $this->lang->line('from'); ?>" required="required" type="date" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('form'); ?></div>
                                     </div>
                       
                                
                                     </div>
                                     
                                      </div>
                                     <div class="row">

                                    
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="name">1. <?php echo $this->lang->line('name1'); ?><span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12" name="name"  type="text" id="name" placeholder="<?php echo $this->lang->line('name1'); ?>" required 
                                                            type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="present_address">2. <?php echo $this->lang->line('address3'); ?> <span class="required">*</span></label>
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="address"  id="address" placeholder="<?php echo $this->lang->line('address3'); ?>">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">			  
                                                <div class="item form-group">
                                                    <label for="name">3. <?php echo $this->lang->line('province'); ?><span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12" type="text" name="province" id="province" placeholder="<?php echo $this->lang->line('province'); ?>" required />
                                                </div>	
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="full_name"><?php echo $this->lang->line('zone'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="zone" id="zone" placeholder="කලාප අධ්‍යාපන කාර්යාලය" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="dob">4. <?php echo $this->lang->line('divi'); ?>  <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="divition"  id="divition" value="" placeholder="<?php echo $this->lang->line('divi'); ?>  " required="required" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="national"><?php echo $this->lang->line('office1'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="office" id="office" placeholder="<?php echo $this->lang->line('office1'); ?> " type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="nic"><?php echo $this->lang->line('district2'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="district"  id="district" value="" placeholder="<?php echo $this->lang->line('district2'); ?> " required="required" type="text" autocomplete="off">
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
                                                                    <input type="text" id="5i" value="" name="5i" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th  colspan = "2"><?php echo $this->lang->line('k_person_add'); ?></th>  

                                                                <td  colspan = "2">
                                                                    <input type="text" id="5ii" value="" name="5ii" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('k_person_phone'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="5iii" value="" name="5iii" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('k_person_mobile'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="5iv" value="" name="5iv" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('k_person_fax'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="5v" value="" name="5v" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('k_person_email'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="5vi" value="" name="5vi" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
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
                                                                    <input type="text" id="6i" value="" name="6i" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th  colspan = "2"><?php echo $this->lang->line('p_person_add'); ?> </th>  

                                                                <td  colspan = "2">
                                                                    <input type="text" id="6ii" value="" name="6ii" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('p_person_phone'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="6iii" value="" name="6iii" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('p_person_mobile'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="6iv" value="" name="6iv" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>


                                                            </tr>
                                                            <tr>

                                                                <th ><?php echo $this->lang->line('p_person_fax'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="6v" value="" name="6v" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                                </td>

                                                                <th ><?php echo $this->lang->line('p_person_email'); ?></th>  

                                                                <td>
                                                                    <input type="text" id="6vi" value="" name="6vi" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
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
                                                               <input type="text" id="7i" value="" name="7i" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                          </td>
                                                          <td rowspan="2">
                                                               <input type="text" id="7ii" value="" name="7ii" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
                                                          </td>
                                                          <td rowspan="2">
                                                               <input type="text" id="7iii" value="" name="7iii" class="form-control form-mark col-md-7 col-xs-12" autocomplete="off">
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
                                                            <td><input class="form-control col-md-7 col-xs-12" name="8i" id="8i" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">02 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('sessioan_count'); ?></label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="8ii" id="8ii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">03 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('sessioan_date'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="8iii" id="8iii" value="" placeholder="" type="text" autocomplete="off"></td>
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
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9i" id="9i" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9ii" id="9ii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9iii" id="9iii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">02 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_year'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9iv" id="9iv" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9v" id="9v" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9vi" id="9vi" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">03 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_year_count'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9vii" id="9vi" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9viii" id="9vii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9ix" id="9ix" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">04 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_year_leave'); ?></label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9ix" id="9ix" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xi" id="9xi" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xii" id="9xii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">05 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_current_endyear_count'); ?> </label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xiii" id="9xiii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xiv" id="9xiv" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xv" id="9xv" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="phone">06 </label></td>
                                                            <td><label for="phone"><?php echo $this->lang->line('student_year_present'); ?></label></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xvi" id="9xvi" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xvii" id="9xvii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="9xviii" id="9xviii" value="" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion">10. <?php echo $this->lang->line('stu_test_analysis'); ?></label>
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
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10i" id="10i" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ii" id="10ii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10iii" id="10iii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10iv" id="10iv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10v" id="10v" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10vi" id="10vi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10vii" id="10vii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10viii" id="10viii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ix" id="10ix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10x" id="10x" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('1_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xi" id="10xi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xii" id="10xii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xiii" id="10xiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xiv" id="10xiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xv" id="10xv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xvi" id="10xvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xvii" id="10xvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xviii" id="10xviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xix" id="10xix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xx" id="10xx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('2_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxi" id="10xxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxii" id="10xxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxiii" id="10xxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxiv" id="10xxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxv" id="10xxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxvi" id="10xxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxvii" id="10xxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxviii" id="10xxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxix" id="10xxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxx" id="10xxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('3_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxi" id="10xxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxii" id="10xxxii" value="" placexholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxxiii" id="10xxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxxiv" id="10xxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxv" id="10xxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxvi" id="10xxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxvii" id="10xxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxviii" id="10xxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xxxix" id="10xxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xl" id="10xl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>

                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('4_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xli" id="10xli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xlii" id="10xlii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xliii" id="10xliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xliv" id="10xliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xlv" id="10xlv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xlvi" id="10xlvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xlvii" id="10xlvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xlviii" id="10xlviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xlix" id="10xlix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10l" id="10l" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('5_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10li" id="10li" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lii" id="10lii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10liii" id="10liii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10liv" id="10liv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lv" id="10lv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lvi" id="10lvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lvii" id="10lvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lviii" id="10lviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lix" id="10lix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lx" id="10lx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('6_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxi" id="10lxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxii" id="10lxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxiii" id="10lxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxiv" id="10lxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxv" id="10lxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxvi" id="10lxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxvii" id="10lxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxviii" id="10lxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxix" id="10lxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxx" id="10lxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('7_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxi" id="10lxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxii" id="10lxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxiii" id="10lxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxiv" id="10lxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxv" id="10lxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxvi" id="10lxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxvii" id="10lxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxviii" id="10lxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxix" id="10lxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxx" id="10lxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>09</td>
                                                            <td><?php echo $this->lang->line('8_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxi" id="10lxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxii" id="10lxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxiii" id="10lxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxiv" id="10lxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxv" id="10lxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxvi" id="10lxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxvii" id="10lxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxviii" id="10lxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10lxxxix" id="10lxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xc" id="10xc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td><?php echo $this->lang->line('9_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xci" id="10xci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xcii" id="10xcii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xciii" id="10xciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xciv" id="10xciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xcv" id="10xcv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xcvi" id="10xcvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xcvii" id="10xcvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xcviii" id="10xcviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10xcix" id="10xcix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10c" id="10c" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td><?php echo $this->lang->line('10_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ci" id="10ci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cii" id="10cii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ciii" id="10ciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10civ" id="10civ" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cv" id="10cv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cvi" id="10cvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cvii" id="10cvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cviii" id="10cviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cix" id="10cix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cx" id="10cx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td><?php echo $this->lang->line('11_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxi" id="10c"xi value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxii" id="10cxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxiii" id="10cxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxiv" id="10cxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxv" id="10cxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxvi" id="10cxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxvii" id="10cxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxviii" id="10cxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxix" id="10cxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxx" id="10cxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td><?php echo $this->lang->line('12_grade'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxi" id="10cxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxii" id="10cxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxiii" id="10cxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxiv" id="10cxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxv" id="10cxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxvi" id="10cxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxvii" id="10cxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxviii" id="10cxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxix" id="10cxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxx" id="10cxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td><?php echo $this->lang->line('13_grade'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="10cxxxi" id="10cxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxii" id="10cxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxiii" id="10cxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxiv" id="10cxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxv" id="10cxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxvi" id="10cxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxvii" id="10cxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxviii" id="10cxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxxxix" id="10cxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxl" id="10cxl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>15</td>
                                                            <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxli" id="10cxli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxlii" id="10cxlii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxliii" id="10cxliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxliv" id="10cxliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxlv" id="10cxlv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxlvi" id="10cxlvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxlvii" id="10cxlvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxlviii" id="10cxlviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxlix" id="10cxlix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cl" id="10cl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cli" id="10cli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clii" id="10clii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cliii" id="10cliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cliv" id="10cliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clv" id="10clv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clvi" id="10clvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clvii" id="10clvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clviii" id="10clviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clix" id="10clix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clx" id="10clx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>17</td>
                                                            <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxi" id="10clxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxii" id="10clxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxiii" id="10clxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxiv" id="10clxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxv" id="10clxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxvi" id="10clxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxvii" id="10clxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxviii" id="10clxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxix" id="10clxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxx" id="10clxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>18</td>
                                                            <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxi" id="10clxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxii" id="10clxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxiii" id="10clxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxiv" id="10clxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxv" id="10clxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxvi" id="10clxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxvii" id="10clxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxviii" id="10clxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxix" id="10clxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxx" id="10clxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>19</td>
                                                            <td><?php echo $this->lang->line('degree'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxi" id="10clxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxii" id="10clxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxiii" id="10clxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxiv" id="10clxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxv" id="10clxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxvi" id="10clxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxvii" id="10clxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxviii" id="10clxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10clxxxix" id="10clxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxc" id="10cxc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>20</td>
                                                            <td><?php echo $this->lang->line('other1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxci" id="10cxci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxcii" id="10cxcii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxciii" id="10cxciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxciv" id="10cxciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxcv" id="10cxcv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxcvi" id="10cxcvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxcvii" id="10cxcvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxcviii" id="10cxcviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cxcix" id="10cxcix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cc" id="10cc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $this->lang->line('count'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cci" id="10cci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ccii" id="10ccii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cciii" id="10cciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10cciv" id="10cciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ccv" id="10ccv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ccvi" id="10ccvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ccvii" id="10ccvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ccviii" id="10ccviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ccix" id="10ccix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="10ccx" id="10ccx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                    </table>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion">11. <?php echo $this->lang->line('student_analysis'); ?> </label>
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
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11i" id="11i" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11ii" id="11ii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11iii" id="11iii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11iv" id="11iv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11v" id="11v" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11vi" id="11vi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11vii" id="11vii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11viii" id="11viii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11ix" id="11ix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11x" id="11x" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11xi" id="11xi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="11xii" id="11xii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                    </table>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="religion">13. <?php echo $this->lang->line('student_resident'); ?> </label>
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                        <tr>
                                                            <th rowspan="2"><?php echo $this->lang->line('student_resident_no'); ?></th>
                                                            <th><?php echo $this->lang->line('monk'); ?></th>
                                                            <th><?php echo $this->lang->line('lay'); ?></th>
                                                            <th><?php echo $this->lang->line('count'); ?></th>

                                                            <th rowspan="2"><?php echo $this->lang->line('student_nonresident'); ?></th>
                                                            <th><?php echo $this->lang->line('monk'); ?></th>
                                                            <th><?php echo $this->lang->line('lay'); ?></th>
                                                            <th><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td><input class="form-control col-md-7 col-xs-12" name="12i" id="12i" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="12ii" id="12ii" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="12iii" id="12iii" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            
                                                            <td><input class="form-control col-md-7 col-xs-12" name="12vi" id="12vi" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="12v" id="12v" value="" placeholder="" type="text" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="12vi" id="12vi" value="" placeholder="" type="text" style="width: 50px;"></td>
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
                                                    <label for="name"> <?php echo $this->lang->line('date1'); ?><span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"   type="text" id="date" name="date" placeholder=" <?php echo $this->lang->line('date1'); ?>" required 
                                                            type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="present_address"><?php echo $this->lang->line('principal_sig'); ?> <span class="required">*</span></label>
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="principal"  id="principal" placeholder="<?php echo $this->lang->line('principal_sig'); ?>">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">			  
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('date1'); ?><span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12" type="text" id="date1" name="date1" placeholder="<?php echo $this->lang->line('date1'); ?>" required />
                                                </div>	
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="full_name"><?php echo $this->lang->line('deputy_director'); ?> <span class="required">*</span></label>
                                                    <input  class="form-control col-md-7 col-xs-12"  name="d_director" id="d_director" placeholder="<?php echo $this->lang->line('deputy_director'); ?>" type="text" autocomplete="off">
                                                    <div class="help-block"></div> 
                                                </div>
                                            </div>

                                        </div>




                                    </div>
<!--================================================================================================================================================================-->
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
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16i" id="16i" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16ii" id="16ii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16iii" id="16iii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16iv" id="16iv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16v" id="16v" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('pracheena_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16vi" id="16vi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16vii" id="16vii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16viii" id="16viii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16ix" id="16ix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16x" id="16x" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('pracheena_mid_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xi" id="16xi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xii" id="16xii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xiii" id="16xiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xiv" id="16xiv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xv" id="16xv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('pracheena_final_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xvi" id="16xvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xvii" id="16xvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xviii" id="16xviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xix" id="16xix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xx" id="16xx" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('o_l'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxi" id="16xxi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxii" id="16xxii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxiii" id="16xxiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxiv" id="16xxiv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxv" id="16xxv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('a_l'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxvi" id="16xxvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxvii" id="16xxvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxviii" id="16xxviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxix" id="16xxix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxx" id="16xxx" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('uni_exam'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxi" id="16xxxi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxii" id="16xxxii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxiii" id="16xxxiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxiv" id="16xxxiv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxv" id="16xxxv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('degree1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxvi" id="16xxxvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxvii" id="16xxxvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxviii" id="16xxxviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xxxix" id="16xxxix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xl" id="16xl" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>09</td>
                                                            <td><?php echo $this->lang->line('degree2'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xli" id="16xli" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xlii" id="16xlii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xliii" id="16xliii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xliv" id="16xliv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16lv" id="16lv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xlvi" id="16xlvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xlvii" id="16xlvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xlviii" id="16xlviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16xlix" id="16xlix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="16l" id="16l" placeholder="" type="text" autocomplete="off"></td>
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
                                                            <td><input class="form-control col-md-7 col-xs-12" name="17i" id="17i" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="17ii" id="17ii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $this->lang->line('subject_society'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="17iii" id="17iii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="17iv" id="17iv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $this->lang->line('language_society'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="17v" id="17v" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="17vi" id="17vi" placeholder="" type="text" autocomplete="off"></td>
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
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18i" id="18i" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18ii" id="18ii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('office2'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18iii" id="18iii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18iv" id="18iv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('hostal'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18v" id="18v" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18vi" id="18vi" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('piriven_area'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18vii" id="18vii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18viii" id="18viii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('dhamma_training'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18ix" id="18ix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18x" id="18x" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('pirith_training'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18xi" id="18xi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18xii" id="18xii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('practice_training'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18xiii" id="18xiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18xiv" id="18xiv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('extra_activity1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18xv" id="18xv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="18xvi" id="18xvi" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                </br>
                                                <div class="col-md-12 col-sm-12 col-xs-12"><?php echo $this->lang->line('text6'); ?></td>
                                                </div>
                                                </br></br>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"> <?php echo $this->lang->line('date1'); ?> <span class="required">*</span></label>
                                                        <input  class="form-control col-md-7 col-xs-12"   type="text" id="date" name="date" placeholder=" <?php echo $this->lang->line('date1'); ?>" required 
                                                                type="text" autocomplete="off">
                                                        <div class="help-block"></div> 
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="present_address"><?php echo $this->lang->line('principal_sig'); ?> <span class="required">*</span></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="principal"  id="principal" placeholder="<?php echo $this->lang->line('principal_sig'); ?>">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6 col-sm-6 col-xs-12">			  
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('date1'); ?><span class="required">*</span></label>
                                                        <input  class="form-control col-md-7 col-xs-12" type="text" id="date1" name="date1" placeholder="<?php echo $this->lang->line('date1'); ?>" required />
                                                    </div>	
                                                </div>

                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="full_name"><?php echo $this->lang->line('deputy_director'); ?></td><span class="required">*</span></label>
                                                        <input  class="form-control col-md-7 col-xs-12"  name="d_director" id="d_director" placeholder="<?php echo $this->lang->line('deputy_director'); ?>" type="text" autocomplete="off">
                                                        <div class="help-block"></div> 
                                                    </div>
                                                </div>

                                            </div>  
                                        </div> 




                                    </div>

<!--================================================================================================================================================================-->
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
                                                            <th><?php echo $this->lang->line('appointment_approval_date'); ?></th>
                                                            <th><?php echo $this->lang->line('teaching_sub'); ?></th>
                                                            <th><?php echo $this->lang->line('teaching_hours'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19i" id="19i" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19ii" id="19ii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19iii" id="19iii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19iv" id="19iv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19v" id="19v" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19vi" id="19vi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19vii" id="19vii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19viii" id="19viii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19ix" id="19ix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19x" id="19x" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xi" id="19xi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xii" id="19xii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xiii" id="19xiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xiv" id="19xiv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xv" id="19xv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xvi" id="19xvi" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xvii" id="19xvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xviii" id="19xviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xix" id="19xix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xx" id="19xx" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxi" id="19xxi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxii" id="19xxii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxiii" id="19xxiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxiv" id="19xxiv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxv" id="19xxv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxvi" id="19xxvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxvii" id="19xxvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxviii" id="19xxviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxix" id="19xxix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxx" id="19xxx" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxi" id="19xxxi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxii" id="19xxxii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxiii" id="19xxxiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxiv" id="19xxxiv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxv" id="19xxxv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxvi" id="19xxxvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxvii" id="19xxxvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxviii" id="19xxxviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xxxix" id="19xxxix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xl" id="19xl" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xli" id="19xli" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xlii" id="19xlii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xliii" id="19xliii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xliv" id="19xliv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xlv" id="19xlv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xlvi" id="19xlvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xlvii" id="19xlvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xlviii" id="19xlviii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xlix" id="19xlix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19l" id="19l" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19li" id="19li" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lii" id="19lii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19liii" id="19liii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19liv" id="19liv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lv" id="19lv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lvi" id="19lvi" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lvii" id="19lvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lviii" id="19lviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lix" id="19lix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lx" id="19lx" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxi" id="19lxi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxii" id="19lxii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxiii" id="19lxiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxiv" id="19lxiv" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>09</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxv" id="19lxv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxvi" id="19lxvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxvii" id="19lxvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxviii" id="19lxviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxix" id="19lxix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxx" id="19lxx" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxi" id="19lxxi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxii" id="19lxxii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxiii" id="19lxxiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxiv" id="19lxxiv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxv" id="19lxxv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxvi" id="19lxxvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxvii" id="19lxxvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxviii" id="19lxxviii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxix" id="19lxxix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxx" id="19lxxx" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxi" id="19lxxxi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxii" id="19lxxxii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxiii" id="19lxxxiii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxiv" id="19lxxxiv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxv" id="19lxxxv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxvi" id="19lxxxvi" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxvii" id="19lxxxvii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxviii" id="19lxxxviii" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19lxxxix" id="19lxxxix" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xc" id="19xc" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xci" id="19xci" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xcii" id="19xcii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xciii" id="19xciii" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xciv" id="19xciv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xcv" id="19xcv" placeholder="" type="text" autocomplete="off"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xcvi" id="19xcvi" placeholder="" type="text" autocomplete="off"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>



                                    </div>

<!--================================================================================================================================================================-->
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
                                                            <th rowspan="2"><?php echo $this->lang->line('edu_quli'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('d_o_b'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('nic'); ?></th>
                                                            <th colspan="4"><?php echo $this->lang->line('leave_take'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('annual_salary'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('p_grade'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('salary_update'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('k_approval'); ?></th>
                                                        </tr>
                                                        <tr>
                                                           
                                                            <th><?php echo $this->lang->line('casual'); ?></th>
                                                            <th><?php echo $this->lang->line('rest'); ?></th>
                                                            <th><?php echo $this->lang->line('count'); ?></th>
                                                            <th><?php echo $this->lang->line('free'); ?></th>
                                                          
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xcvii" id="19xcvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xcviii" id="19xcviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19xcix" id="19xcix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19c" id="19c" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19ci" id="19ci" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cii" id="19cii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19ciii" id="19ciii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19civ" id="19civ" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cv" id="19cv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cvi" id="19cvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cvii" id="19cvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cviii" id="19cviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cix" id="19cix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cx" id="19cx" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxi" id="19cxi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxii" id="19cxii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxiii" id="19cxiii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxiv" id="19cxiv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxv" id="19cxv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxvi" id="19cxvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxvii" id="19cxvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxviii" id="19cxviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxix" id="19cxix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxx" id="19cxx" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxi" id="19cxxi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxii" id="19cxxii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxiii" id="19cxxiii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxiv" id="19cxxiv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxv" id="19cxxv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxvi" id="19cxxvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxvii" id="19cxxvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxviii" id="19cxxviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxix" id="19cxxix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxx" id="19cxxx" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxi" id="19cxxxi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxii" id="19cxxxii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxiii" id="19cxxxiii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxiv" id="19cxxxiv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxv" id="19cxxxv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxvi" id="19cxxxvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxvii" id="19cxxxvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxviii" id="19cxxxviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxxxix" id="19cxxxix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxl" id=19cxl"" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxli" id="19cxli" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxlii" id="19cxlii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxliii" id="19cxliii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxliv" id="19cxliv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxlv" id="19cxlv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxlvi" id="19cxlvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxlvii" id="19cxlvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxlviii" id="19cxlviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cxlix" id="19cxlix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cl" id="19cl" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cli" id="19cli" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clii" id="19clii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cliii" id="19cliii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19cliv" id="19cliv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clv" id="19clv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clvi" id="19clvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clvii" id="19clvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clviii" id="19clviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clix" id="19clix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clx" id="19clx" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxi" id="19clxi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxii" id="19clxii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxiii" id="19clxiii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxiv" id="19clxiv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxv" id="19clxv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxvi" id="19clxvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxvii" id="19clxvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxviii" id="19clxviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxix" id="19clxix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxx" id="19clxx" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxi" id="19clxxi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxii" id="19clxxii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxiii" id="19clxxiii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxiv" id="19clxxiv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxv" id="19clxxv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxvi" id="19clxxvi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxvii" id="19clxxvii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxviii" id="19clxxviii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxix" id="19clxxix" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxx" id="19clxxx" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxxi" id="19clxxxi" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxxii" id="19clxxxii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxxiii" id="19clxxxiii" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="19clxxxiv" id="19clxxxiv" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
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
                                                    <input  class="form-control col-md-7 col-xs-12" type="text" id="date1" name="adte1" placeholder="<?php echo $this->lang->line('date1'); ?>" required />
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
<!--================================================================================================================================================================-->
                                    <div class="tab-pane fade in" id="tab_four">


                                        <div class="row">                  
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5  class="column-title" style="text-align: center;"><strong>5</strong></h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="national_id">20. <?php echo $this->lang->line('phy_resource_analysis'); ?></label>
                                                    <div class="help-block"></div>

                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <div class="item form-group">

                                                            <label for="name"> <?php echo $this->lang->line('land'); ?>  <?php echo $this->lang->line('acers'); ?> </label>
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

                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="overflow-x: scroll;">
                                                        <tr>
                                                            <th><?php echo $this->lang->line('#'); ?></th>
                                                            <th><?php echo $this->lang->line('description1'); ?></th>
                                                            <th><?php echo $this->lang->line('office2'); ?></th>
                                                            <th><?php echo $this->lang->line('class_room'); ?></th>
                                                            <th><?php echo $this->lang->line('library1'); ?></th>
                                                            <th><?php echo $this->lang->line('hostal'); ?></th>
                                                            <th><?php echo $this->lang->line('teachers_room'); ?></th>
                                                            <th><?php echo $this->lang->line('maths_lab'); ?></th>
                                                            <th><?php echo $this->lang->line('lab'); ?></th>
                                                            <th><?php echo $this->lang->line('lan_lab'); ?></th>
                                                            <th><?php echo $this->lang->line('com_room'); ?></th>
                                                            <th><?php echo $this->lang->line('toilets'); ?></th>
                                                            <th><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><?php echo $this->lang->line('space'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" name="20i" id="20i" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ii" id="20ii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20iii" id="20iii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20iv" id="20iv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20v" id="20v" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20vi" id="20vi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20vii" id="20vii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20viii" id="20viii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ix" id="20ix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20x" id="20x" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20x" id="20x1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('library_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xi" id="20xi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xii" id="20xii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xiii" id="20xiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xiv" id="20xiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xv" id="20xv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xvi" id="20xvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xvii" id="20xvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xviii" id="20xviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xix" id="20xix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xx" id="20xx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xx1" id="20xx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('library_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxi" id="20xxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxii" id="20xxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxiii" id="20xxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxiv" id="20xxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxv" id="20xxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxvi" id="20xxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxvii" id="20xxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxviii" id="20xxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxix" id="20xxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxx" id="20xxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxx1" id="20xxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>04</td>
                                                            <td><?php echo $this->lang->line('reading_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxi" id="20xxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxii" id="20xxxii" value="" placexholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxxiii" id="20xxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxxiv" id="20xxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxv" id="20xxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxvi" id="20xxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxvii" id="20xxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxviii" id="20xxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xxxix" id="20xxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xl" id="20xl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xl1" id="20xl1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>05</td>
                                                            <td><?php echo $this->lang->line('reading_chair'); ?></td>
                                                         <td><input class="form-control col-md-7 col-xs-12" name="20xli" id="20xli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xlii" id="20xlii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xliii" id="20xliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xliv" id="20xliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xlv" id="20xlv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xlvi" id="20xlvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xlvii" id="20xlvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xlviii" id="20xlviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xlix" id="20xlix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20l" id="20l" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20l1" id="20l1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>06</td>
                                                            <td><?php echo $this->lang->line('office_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20li" id="20li" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lii" id="20lii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20liii" id="20liii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20liv" id="20liv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lv" id="20lv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lvi" id="20lvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lvii" id="20lvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lviii" id="20lviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lix" id="20lix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lx" id="20lx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lx1" id="20lx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>07</td>
                                                            <td><?php echo $this->lang->line('teacher_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxi" id="20lxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxii" id="20lxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxiii" id="20lxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxiv" id="20lxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxv" id="20lxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxvi" id="20lxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxvii" id="20lxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxviii" id="20lxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxix" id="20lxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxx" id="20lxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20lxx1" id="20lxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>08</td>
                                                            <td><?php echo $this->lang->line('teacher_chair'); ?></td>
                                                              <td><input class="form-control col-md-7 col-xs-12" name="20lxxi" id="20lxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxii" id="20lxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxiii" id="20lxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxiv" id="20lxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxv" id="20lxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxvi" id="20lxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxvii" id="20lxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxviii" id="20lxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxix" id="20lxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxx" id="20lxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxx1" id="20lxxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>09</td>
                                                            <td><?php echo $this->lang->line('student_tables'); ?></td>
                                                           <td><input class="form-control col-md-7 col-xs-12" name="20lxxxi" id="20lxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxii" id="20lxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxiii" id="20lxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxiv" id="20lxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxv" id="20lxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxvi" id="20lxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxvii" id="20lxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxviii" id="20lxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20lxxxix" id="20lxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xc" id="20xc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xc1" id="20xc1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td><?php echo $this->lang->line('student_chair'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20xci" id="20xci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xcii" id="20xcii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xciii" id="20xciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xciv" id="20xciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xcv" id="20xcv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xcvi" id="20xcvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xcvii" id="20xcvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xcviii" id="20xcviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20xcix" id="20xcix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20c" id="20c" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20c1" id="20c1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td><?php echo $this->lang->line('com_teacher_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ci" id="20ci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cii" id="20cii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ciii" id="20ciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20civ" id="20civ" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cv" id="20cv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cvi" id="20cvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cvii" id="20cvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cviii" id="20cviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cix" id="20cix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cx" id="20cx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20cx1" id="20cx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td><?php echo $this->lang->line('com_teacher_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxi" id="20cxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxii" id="20cxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxiii" id="20cxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxiv" id="20cxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxv" id="20cxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxvi" id="20cxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxvii" id="20cxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxviii" id="20cxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxix" id="20cxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxx" id="20cxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxx1" id="20cxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td><?php echo $this->lang->line('com_student_tables'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20cxxi" id="20cxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxii" id="20cxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxiii" id="20cxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxiv" id="20cxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxv" id="20cxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxvi" id="20cxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxvii" id="20cxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxviii" id="20cxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="210cxxix" id="20cxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxx" id="20cxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxx1" id="20cxxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td><?php echo $this->lang->line('com_student_chair'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20cxxxi" id="20cxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxii" id="20cxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxiii" id="20cxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxiv" id="20cxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxv" id="20cxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxvi" id="20cxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxvii" id="20cxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxviii" id="20cxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxxxix" id="20cxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxl" id="20cxl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxl1" id="20cxl1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>15</td>
                                                            <td><?php echo $this->lang->line('other_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxli" id="20cxli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxlii" id="20cxlii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxliii" id="20cxliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxliv" id="20cxliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxlv" id="20cxlv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxlvi" id="20cxlvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxlvii" id="20cxlvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxlviii" id="20cxlviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxlix" id="20cxlix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cl" id="20cl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cl1" id="20cl1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td><?php echo $this->lang->line('other_chair'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cli" id="20cli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clii" id="20clii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cliii" id="20cliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cliv" id="20cliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clv" id="20clv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clvi" id="20clvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clvii" id="20clvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clviii" id="20clviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clix" id="20clix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clx" id="20clx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clx1" id="20clx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>17</td>
                                                            <td><?php echo $this->lang->line('doc_cupboards'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20clxi" id="20clxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxii" id="20clxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxiii" id="20clxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxiv" id="20clxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxv" id="20clxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxvi" id="20clxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxvii" id="20clxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxviii" id="20clxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxix" id="20clxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxx" id="20clxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxx1" id="20clxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>18</td>
                                                            <td><?php echo $this->lang->line('steel_cupboard'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxi" id="20clxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxii" id="20clxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxiii" id="20clxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxiv" id="20clxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxv" id="20clxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxvi" id="20clxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxvii" id="20clxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxviii" id="20clxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxix" id="20clxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxx" id="20clxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxx1" id="20clxxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>19</td>
                                                            <td><?php echo $this->lang->line('wood_cupboard'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxi" id="20clxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxii" id="20clxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxiii" id="20clxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxiv" id="20clxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxv" id="20clxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxvi" id="20clxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxvii" id="20clxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxviii" id="20clxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxix" id="20clxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxc" id="20cxc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20cxc1" id="20cxc1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>20</td>
                                                            <td><?php echo $this->lang->line('glass_cupboard'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxci" id="20cxci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxcii" id="20cxcii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxciii" id="20cxciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxciv" id="20cxciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxcv" id="20cxcv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxcvi" id="20cxcvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxcvii" id="20cxcvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxcviii" id="20cxcviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cxcix" id="20cxcix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cc" id="20cc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cc1" id="20cc1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>21</td>
                                                            <td><?php echo $this->lang->line('room_cupboard'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20cci" id="20cci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccii" id="20ccii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cciii" id="20cciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cciv" id="20cciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccv" id="20ccv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccvi" id="20ccvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccvii" id="20ccvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccviii" id="20ccviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccix" id="20ccix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccx" id="20ccx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccx1" id="20ccx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>22</td>
                                                            <td><?php echo $this->lang->line('book_racks'); ?></td>
                                                           <td><input class="form-control col-md-7 col-xs-12" name="20ccxi" id="20ccxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxii" id="20ccxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxiii" id="20ccxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxiv" id="20ccxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxv" id="20ccxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxvi" id="20ccxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxvii" id="20ccxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxviii" id="20ccxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxix" id="20ccxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxx" id="20ccxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxx1" id="20ccxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>23</td>
                                                            <td><?php echo $this->lang->line('mag_racks'); ?></td>
                                                               <td><input class="form-control col-md-7 col-xs-12" name="20ccxxi" id="20ccxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxii" id="20ccxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxiii" id="20ccxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxiv" id="20ccxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxv" id="20ccxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxvi" id="20ccxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxvii" id="20ccxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxviii" id="20ccxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxix" id="20ccxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxx" id="20ccxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxx1" id="20ccxxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>24</td>
                                                            <td><?php echo $this->lang->line('black_board'); ?></td>
                                                               <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxi" id="20ccxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxii" id="20ccxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxiii" id="20ccxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxiv" id="20ccxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxv" id="20ccxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxvi" id="20ccxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxvii" id="20ccxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxviii" id="20ccxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxxxix" id="20ccxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxl" id="20ccxl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxl1" id="20ccxl1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>25</td>
                                                           <td><?php echo $this->lang->line('other_tables'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxli" id="20ccxli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxlii" id="20ccxlii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxliii" id="20ccxliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxliv" id="20ccxliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxlv" id="20ccxlv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxlvi" id="20ccxlvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxlvii" id="20ccxlvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxlviii" id="20ccxlviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxlix" id="20ccxlix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccl" id="20ccl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccl1" id="20ccl1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>26</td>
                                                            <td><?php echo $this->lang->line('ups'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccli" id="20ccli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclii" id="20cclii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccliii" id="20ccliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccliv" id="20ccliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclv" id="20cclv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclvi" id="20cclvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclvii" id="20cclvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclviii" id="20cclviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclix" id="20cclix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclx" id="20cclx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclx1" id="20cclx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>27</td>
                                                            <td><?php echo $this->lang->line('printers'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxi" id="20cclxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxii" id="20cclxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxiii" id="20cclxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxiv" id="20cclxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxv" id="20cclxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxvi" id="20cclxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxvii" id="20cclxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxviii" id="20cclxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxix" id="20cclxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxx" id="20cclxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxx1" id="20cclxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>28</td>
                                                            <td><?php echo $this->lang->line('fax_ma'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxi" id="20cclxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxii" id="20cclxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxiii" id="20cclxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxiv" id="20cclxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxv" id="20cclxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxvi" id="20cclxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxvii" id="20cclxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxviii" id="20cclxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxix" id="20cclxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxx" id="20cclxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxx1" id="20cclxxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>29</td>
                                                            <td><?php echo $this->lang->line('pho_ma'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20clxxxi" id="20clxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxii" id="20cclxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxiii" id="20cclxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxiv" id="20cclxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxv" id="20cclxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxvi" id="20cclxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxvii" id="20cclxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxviii" id="20cclxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cclxxxix" id="20cclxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxc" id="20ccxc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxc1" id="20ccxc1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>30</td>
                                                            <td><?php echo $this->lang->line('tv'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20ccxci" id="20ccxci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxcii" id="20ccxcii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxciii" id="20ccxciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxciv" id="20ccxciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxcv" id="20ccxcv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxcvi" id="20ccxcvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxcvii" id="20ccxcvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxcviii" id="20ccxcviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccxcix" id="20ccxcix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccc" id="20ccc" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccc1" id="20ccc1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>31</td>
                                                            <td><?php echo $this->lang->line('dvd'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccci" id="20ccci" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccii" id="20cccii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccciii" id="20ccciii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20ccciv" id="20ccciv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccv" id="20cccv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccvi" id="20cccvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccvii" id="20cccvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccviii" id="20cccviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccix" id="20cccix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccx" id="20cccx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccx1" id="20cccx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>32</td>
                                                            <td><?php echo $this->lang->line('projectors'); ?></td>
                                                           <td><input class="form-control col-md-7 col-xs-12" name="20cccxi" id="20cccxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxii" id="20cccxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxiii" id="20cccxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxiv" id="20cccxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxv" id="20cccxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxvi" id="20cccxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxvii" id="20cccxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxviii" id="20cccxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxix" id="20cccxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxx" id="20cccxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxx1" id="20cccxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>33</td>
                                                            <td><?php echo $this->lang->line('beds'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxi" id="20cccxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxii" id="20cccxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxiii" id="20cccxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxiv" id="20cccxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxv" id="20cccxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxvi" id="20cccxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxvii" id="20cccxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxviii" id="20cccxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxix" id="20cccxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxx" id="20cccxxx" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxx1" id="20cccxxx1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>34</td>
                                                            <td><?php echo $this->lang->line('clo_racks'); ?></td>
                                                               <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxi" id="20cccxxxi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxii" id="20cccxxxii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxiii" id="20cccxxxiii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxiv" id="20cccxxxiv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxv" id="20cccxxxv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxvi" id="20cccxxxvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxvii" id="20cccxxxvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxviii" id="20cccxxxviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxxxix" id="20cccxxxix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxl" id="20cccxl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20cccxl1" id="20cccxl1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>35</td>
                                                            <td><?php echo $this->lang->line('b&t'); ?></td>
                                                             <td><input class="form-control col-md-7 col-xs-12" name="20cccxli" id="20cccxli" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxlii" id="20cccxlii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxliii" id="20cccxliii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxliv" id="20cccxliv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxlv" id="20cccxlv" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxlvi" id="20cccxlvi" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxlvii" id="20cccxlvii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxlviii" id="20cccxlviii" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccxlix" id="20cccxlix" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccl" id="20cccl" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" name="20cccl1" id="20cccl1" value="" placeholder="" type="text" autocomplete="off" style="width: 50px;"></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>

                                        </div>  

                                    </div>
                                    
 <!--================================================================================================================================================================-->                                   
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
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21i" id="21i" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21ii" id="21ii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('attendance_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21iii" id="21iii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21iv" id="21iv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('t_attendance_doc1'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21v" id="21v" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21vi" id="21vi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>04</td>
                                                        <td><?php echo $this->lang->line('t_attendance_doc2'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21vii" id=21vii"" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21viii" id="21viii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>05</td>
                                                        <td><?php echo $this->lang->line('leave_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21ix" id="21ix" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21x" id="21x" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>06</td>
                                                        <td><?php echo $this->lang->line('log_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xi" id="21xi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xii" id="21xii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>07</td>
                                                        <td><?php echo $this->lang->line('goods_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xiii" id="21xiii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xiv" id="21xiv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>08</td>
                                                        <td><?php echo $this->lang->line('lost_goods_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xv" id="21xv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xvi" id="21xvi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>09</td>
                                                        <td><?php echo $this->lang->line('library_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xvii" id="21xvii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xviii" id="21xviii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td><?php echo $this->lang->line('certificates'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xix" id="21xix" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xx" id="21xx" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>11</td>
                                                        <td><?php echo $this->lang->line('h_exam_marks'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxi" id="21xxi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxii" id="21xxii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td><?php echo $this->lang->line('t_test_marks'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxiii" id="21xxiii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxiv" id="21xxiv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>13</td>
                                                        <td><?php echo $this->lang->line('out_stu'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxv" id="21xxv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxvi" id="21xxvi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>14</td>
                                                        <td><?php echo $this->lang->line('teacher_p_report'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxvii" id="21xxvii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxviii" id="21xxviii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>15</td>
                                                        <td><?php echo $this->lang->line('subject_maintaine_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxix" id="21xxix" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxx" id="21xxx" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>16</td>
                                                        <td><?php echo $this->lang->line('class_maintaine_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxi" id="21xxxi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxii" id="21xxxii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>17</td>
                                                        <td><?php echo $this->lang->line('time_table'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxiii" id="21xxxiii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxiv" id="21xxxiv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>18</td>
                                                        <td><?php echo $this->lang->line('annual_plans'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxv" id="21xxxv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxvi" id="21xxxvi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>19</td>
                                                        <td><?php echo $this->lang->line('leave_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxvii" id="21xxxvii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxviii" id="21xxxviii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>20</td>
                                                        <td><?php echo $this->lang->line('results_doc'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xxxix" id=21xxxix"" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xl" id="21xl" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>21</td>
                                                        <td><?php echo $this->lang->line('tea_instructor_book'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xli" id="21xli" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xlii" id="21xlii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>22</td>
                                                        <td><?php echo $this->lang->line('maintaince_report'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xliii" id="21xliii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xliv" id="21xliv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>23</td>
                                                        <td><?php echo $this->lang->line('development_report'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xlv" id="21xlv" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xlvi" id="21xlvi" placeholder="" type="checkbox" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>24</td>
                                                        <td><?php echo $this->lang->line('development_money'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xlvii" id="21xlvii" placeholder="" type="checkbox" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="21xlviii" id="21xlviii" placeholder="" type="checkbox" autocomplete="off"></td>
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
                                                        <td><input class="form-control col-md-7 col-xs-12" name="library1" id="library1" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('yearly_entered_books'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="library2" id="library2" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('yearly_ex_library'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="library3" id="library3" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>

                                                </table>


                                            </div>



                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;">23.<?php echo $this->lang->line('account_01'); ?><br> <?php echo $this->lang->line('k_accounts'); ?> </h3>
                                                <div class="help-block"></div>
                                                
                                               <div class="row">   

                                              <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">1. <?php echo $this->lang->line('k_accounts_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name ="acc1" id="acc1" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="bank1" id="bank1" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="branch1" id="branch1" placeholder="" required />
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">2. <?php echo $this->lang->line('de30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="de30i" id="de30i" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.<?php echo $this->lang->line('control_team'); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.1 <?php echo $this->lang->line('chairman'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="chairman1" id="chairman1" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp1" id="wp1" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.2 <?php echo $this->lang->line('secretary'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="sec1" id="sec1" placeholder="" required />
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp2" id="wp2" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.3  <?php echo $this->lang->line('treasurer'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="tre1" id="tre1" placeholder="" required />
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <div class="item form-group">
                                                       <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp3" id="wp3" placeholder="" required />
                                                    </div>
                                                </div>
                                                </div>
                                                
                                               <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('current_year_meetings'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="meeting1" id="meeting1" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('last_meeting_date'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="meeting2" id="meeting2" placeholder="" required />
                                                    </div>
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
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23i" id="23i" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23ii" id="23ii" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>01</td>
                                                        <td><?php echo $this->lang->line('food_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23iii" id="23iii" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23iv" id="23iv" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('year_donations'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23v" id="23v" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23vi" id="23vi" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>02</td>
                                                        <td><?php echo $this->lang->line('sanitary_costs'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23vii" id="23vii" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23viii" id="23viii" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('library_donations'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23ix" id="23ix" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23x" id="23x" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>03</td>
                                                        <td><?php echo $this->lang->line('goods_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xi" id="23xi" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xii" id="23xii" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>04</td>
                                                        <td><?php echo $this->lang->line('facilitative_fee'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xiii" id="23xiii" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xiv" id="23xiv" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>04</td>
                                                        <td><?php echo $this->lang->line('edu_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xv" id="23xv" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xvi" id="23xvi" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>05</td>
                                                        <td><?php echo $this->lang->line('other1'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xvii" id="23xvii" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xviii" id="23xviii" placeholder="" type="text" autocomplete="off"></td>

                                                        <td>05</td>
                                                        <td><?php echo $this->lang->line('gass_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xix" id="23xix" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xx" id="23xx" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>

                                                    <tr>
                                                        <td>06</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>06</td>
                                                        <td><?php echo $this->lang->line('water_bill'); ?>)</td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxi" id="23xxi" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxii" id="23xxii" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>07</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>07</td>
                                                        <td><?php echo $this->lang->line('electricity_bill'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxiii" id="23xxiii" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxiv" id="23xxiv" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>08</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>08</td>
                                                        <td><?php echo $this->lang->line('medical_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxv" id="23xxv" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxvi" id="23xxvi" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>09</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td>09</td>
                                                        <td><?php echo $this->lang->line('library_expenses'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxvii" id="23xxvii" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="" id="23xxviii" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $this->lang->line('count'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxix" id="23xxix" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxx" id="23xxx" placeholder="" type="text" autocomplete="off"></td>

                                                        <td></td>
                                                        <td><?php echo $this->lang->line('count'); ?></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxxi" id="23xxxi" placeholder="" type="text" autocomplete="off"></td>
                                                        <td><input class="form-control col-md-7 col-xs-12" name="23xxxii" id="23xxxii" placeholder="" type="text" autocomplete="off"></td>
                                                    </tr>
                                                </table>
                                                
                                                 <div class="item form-group">
                                                     <div class="row">
                                                        <div class="col-sm-4">
                                                            <input  class="form-control"  name="year1"  id="year1" value="" placeholder="<?php echo $this->lang->line('year'); ?>" required="required" type="text" autocomplete="off">
                                                         <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-sm-8"><label class="col-md-6 col-sm-3 col-xs-12 col-md-7 col-xs-12" for="name"><?php echo $this->lang->line('text9'); ?>
                                                     </label></div>
                                                      </div>
                                                    
                                                 </div>                 
                                                
                                                <lu>
                                                    <li><?php echo $this->lang->line('text10'); ?></li>
                                                    <li><?php echo $this->lang->line('text11'); ?></li>
                                                </lu>
                                                <br>
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
                                                    <input  class="form-control col-md-7 col-xs-12" type="text" id="date1" name="date1" placeholder="<?php echo $this->lang->line('date1'); ?>" required />
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
                                            
                                            

                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;">24. <?php echo $this->lang->line('account_02'); ?> <br> <?php echo $this->lang->line('tea_salary_account'); ?>  </h3>
                                                <div class="help-block"></div>

                                          <div class="row">   

                                              <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">1. <?php echo $this->lang->line('account_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="acc2" id="acc2" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="bank2" id="bank2" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="branch2" id="branch2" placeholder="" required />
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">2. <?php echo $this->lang->line('de30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="de30ii" id="de30ii" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.<?php echo $this->lang->line('salary_officers'); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.1 <?php echo $this->lang->line('chairman'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="chairman2" id="chairman2" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp4" id="wp4" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.2 <?php echo $this->lang->line('secretary'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="sec2" id="sec2" placeholder="" required />
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp5" id="wp5" placeholder="" required />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.3  <?php echo $this->lang->line('treasurer'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="tre2" id="tre2" placeholder="" required />
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <div class="item form-group">
                                                       <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp6" id="wp6" placeholder="" required />
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
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24i" id="24i" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24ii" id="24ii" placeholder="" required /></td>
                                                                <td>01</td>
                                                                <td><?php echo $this->lang->line('basic_salary1'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24iii" id="24iii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24iv" id="24iv" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>02</td>
                                                                <td><?php echo $this->lang->line('pension'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24v" id="24v" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24vi" id="24vi" placeholder="" required /></td>
                                                                <td>02</td>
                                                                <td><?php echo $this->lang->line('pension'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24vii" id="24vii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24viii" id="24viii" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>03</td>
                                                                <td><?php echo $this->lang->line('not_pay_salary'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24ix" id="24ix" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24x" id="24x" placeholder="" required /></td>
                                                                <td>03</td>
                                                                <td><?php echo $this->lang->line('not_pay_salary'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xi" id="24xi" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xii" id="24xii" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>04</td>
                                                                <td><?php echo $this->lang->line('living_allowances'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xiii" id="24xiii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xiv" id="24xiv" placeholder="" required /></td>
                                                                <td>04</td>
                                                                <td><?php echo $this->lang->line('living_allowances'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xv" id="24xv" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xvi" id="24xvi" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>05</td>
                                                                <td><?php echo $this->lang->line('special_offers'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xvii" id="24xvii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xviii" id="24xviii" placeholder="" required /></td>
                                                                <td>05</td>
                                                                <td><?php echo $this->lang->line('special_offers'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xix" id="24xix" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xx" id="24xx" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>06</td>
                                                                <td><?php echo $this->lang->line('interim_allowances'); ?> </td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxi" id="24xxi" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxii" id="24xxii" placeholder="" required /></td>
                                                                <td>06</td>
                                                                <td><?php echo $this->lang->line('interim_allowances'); ?> </td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxiii" id="24xxiii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxiv" id="24xxiv" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxv" id="24xxv" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxvi" id="24xxvi" placeholder="" required /></td>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxvii" id="24xxvii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="24xxviii" id="24xxviii" placeholder="" required /></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                  <div class="item form-group">
                                                     <div class="row">
                                                        <div class="col-sm-4">
                                                            <input  class="form-control"  name="year2"  id="year2" value="" placeholder="<?php echo $this->lang->line('year'); ?>" required="required" type="text" autocomplete="off">
                                                         <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-sm-8"><label class="col-md-6 col-sm-3 col-xs-12 col-md-7 col-xs-12" for="name"><?php echo $this->lang->line('text12'); ?>
                                                     </label></div>
                                                      </div>
                                                    
                                                 </div> 
                                                 
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <ul>
                                                            <li>
                                                                <label for="name"><?php echo $this->lang->line('budget_balance'); ?></label> 
                                                            </li>
                                                        </ul>
                                                       
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <div class="item form-group">
                                                       <label for="name"><?php echo $this->lang->line('principal_sig'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="prin1" id="prin1" placeholder="<?php echo $this->lang->line('principal_sig'); ?>" required /><br>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;">25. <?php echo $this->lang->line('account_03'); ?> <br> පිරිවෙන් සංවර්ධන අරමුදල </h3>
                                                <div class="help-block"></div>

                                                      <div class="row">   

                                              <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">1.<?php echo $this->lang->line('p_development_fund'); ?> <?php echo $this->lang->line('account_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="acc3" id="acc3" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="bank3" id="bank3" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="branch3" id="branch3" placeholder="" required />
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">2. <?php echo $this->lang->line('de30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="de30iii" id="de30iii" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.<?php echo $this->lang->line('p_dev_fund_officers'); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.1 <?php echo $this->lang->line('chairman'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="chairman3" id="chairman3" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp7" id="wp7" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.2 <?php echo $this->lang->line('secretary'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="sec3" id="sec3" placeholder="" required />
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp8" id="wp8" placeholder="" required />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.3  <?php echo $this->lang->line('treasurer'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="tre3" id="tre3" placeholder="" required />
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <div class="item form-group">
                                                       <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp9" id="wp9" placeholder="" required />
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('current_year_meetings1'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="meeting3" id="meeting3" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('last_meeting_date1'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="meeting4" id="meeting4" placeholder="" required />
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
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25i" id="25i" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25ii" id="25ii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25iii" id="25iii" placeholder="" required /></td>
                                                                <td>01</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25iv" id="25iv" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25v" id="25v" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25vi" id="25vi" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25vii" id="25vii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25ix" id="25ix" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25x" id="25x" placeholder="" required /></td>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25xi" id="25xi" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25xii" id="25xii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25xiii" id="25xiii" placeholder="" required /></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25xiv" id="25xiv" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25xv" id="25xv" placeholder="" required /></td>
                                                                <td></td>
                                                                <td><?php echo $this->lang->line('count'); ?></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25xvi" id="25xvi" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="25xvii" id="25xvii" placeholder="" required /></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="item form-group">
                                                <h3 for="national_id" style="text-align: center;">26.<?php echo $this->lang->line('account_04'); ?><br> <?php echo $this->lang->line('quality_input_account'); ?> </h3>
                                                <div class="help-block"></div>

                                                      <div class="row">   

                                              <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">1. <?php echo $this->lang->line('quality_input_account'); ?><?php echo $this->lang->line('account_no'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="acc4" id="acc4" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('bank'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="bank4" id="bank4" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('branch'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="branch4" id="branch4" placeholder="" required />
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">2. <?php echo $this->lang->line('de30_amount'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="de30iv" id="de30iv" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.<?php echo $this->lang->line('authorized_Officers'); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.1 <?php echo $this->lang->line('chairman'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="chairman4" id="chairman4" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp10" id="wp10" placeholder="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.2 <?php echo $this->lang->line('secretary'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="sec4" id="sec4" placeholder="" required />
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp11" id="wp11" placeholder="" required />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">3.3  <?php echo $this->lang->line('treasurer'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="tre4" id="tre4" placeholder="" required />
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <div class="item form-group">
                                                       <label for="name"><?php echo $this->lang->line('work_place'); ?></label><br>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="wp12" id="wp12" placeholder="" required />
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
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26i" id="26i" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26ii" id="26ii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26iii" id="26iii" placeholder="" required /></td>
                                                                <td>01</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26iv" id="26iv" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26v" id="26v" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26vi" id="26vi" placeholder="" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26vii" id="26vii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26viii" id="26viii" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26ix" id="26ix" placeholder="" required /></td>
                                                                <td>02</td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26x" id="26x" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26xi" id="26xi" placeholder="" required /></td>
                                                                <td><input class="form-control col-md-7 col-xs-12" type="" name="26xii" id="26xii" placeholder="" required /></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                  <div class="item form-group">
                                                     <div class="row">
                                                        <div class="col-sm-4">
                                                            <input  class="form-control"  name="year3"  id="year3" value="" placeholder="<?php echo $this->lang->line('year'); ?>" required="required" type="text" autocomplete="off">
                                                         <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-sm-8"><label class="col-md-6 col-sm-3 col-xs-12 col-md-7 col-xs-12" for="name"><?php echo $this->lang->line('text13'); ?>
                                                     </label></div>
                                                      </div>
                                                    
                                                 </div> 
                                                 
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                    <div class="item form-group">
                                                       <label for="name"><?php echo $this->lang->line('principal_sig'); ?></label>
                                                        <input class="form-control col-md-7 col-xs-12" type="" name="prin2" id="prin2" placeholder="<?php echo $this->lang->line('principal_sig'); ?>" required /><br>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

<!--================================================================================================================================================================-->
                                    <div class="tab-pane fade in " id="tab_six">

                                        <div class="row">
                                            <div class="item form-group">
                                               

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name">27.<?php echo $this->lang->line('de_director'); ?>  :-</label>
                                                        <textarea class="form-control col-md-7 col-xs-12 textarea-4column" name="de_director" id="de_director" placeholder=""></textarea>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                
                                                     <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                         <label for="name"><?php echo $this->lang->line('edu_admin'); ?></label>
                                                        <select class="form-control col-md-7 col-xs-12" name="edu_admin" id="edu_admin" required="required">
                                                            <option value="select"><?php echo $this->lang->line('good'); ?></option>
                                                            <option value="select"><?php echo $this->lang->line('not_good'); ?></option>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                         <label for="name"> <?php echo $this->lang->line('payment_recommendations'); ?></label>
                                                        <select class="form-control col-md-7 col-xs-12" name="pay_re" id="pay_re" required="required">
                                                            <option value="select"> <?php echo $this->lang->line('i_will'); ?></option>
                                                            <option value="select"> <?php echo $this->lang->line('i_do_not'); ?></option>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="present_address"><?php echo $this->lang->line('de_director_seal'); ?> <span class="required">*</span></label>
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="d_seal"  id="d_seal" placeholder="<?php echo $this->lang->line('de_director_seal'); ?>">
                                                    <div class="help-block"></div>
                                                </div>
                                                
                                                </div>
                                            </div>
                                            
                                              <div class="item form-group">
                                               
                                                    
                                               <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="name"> <label for="name">28. <?php echo $this->lang->line('edu_director_approval'); ?> :-</label></label>
                                                    </div>
                                             </div>
                                                
                                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                         <label for="name"><?php echo $this->lang->line('edu_admin'); ?></label>
                                                        <select class="form-control col-md-7 col-xs-12" name="edu_admin2" id="edu_admin2" required="required">
                                                            <option value="select"><?php echo $this->lang->line('good'); ?></option>
                                                            <option value="select"><?php echo $this->lang->line('not_good'); ?></option>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="item form-group">
                                                         <label for="name"> <?php echo $this->lang->line('payment_recommendations'); ?></label>
                                                        <select class="form-control col-md-7 col-xs-12" name="pay_re2" id="pay_re2" required="required">
                                                            <option value="select"> <?php echo $this->lang->line('i_will'); ?></option>
                                                            <option value="select"> <?php echo $this->lang->line('i_do_not'); ?></option>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="present_address"><?php echo $this->lang->line('edu_director_seal'); ?> <span class="required">*</span></label>
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="edu_seal"  id="edu_seal" placeholder="<?php echo $this->lang->line('edu_director_seal'); ?>">
                                                    <div class="help-block"></div>
                                                </div>
                                                
                                                </div>
                                            </div>
                                            
                                            <div class="item form-group">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label for="national_id">29.<?php echo $this->lang->line('edu_di_approval'); ?> </label>
                                                <div class="help-block"></div>
                                                </div>
                                                
                                                <div class="col-md-12 col-sm-12 col-xs-12"> 
                                                <div class="item form-group">
                                                    <label for="name"><?php echo $this->lang->line('number'); ?><input class="form-control col-md-7 col-xs-12" type="" name="number" id="number" placeholder="ED/../../../../.." required /></label><br>
                                                    <label for="name"><?php echo $this->lang->line('accountant'); ?></label><br>
                                                    <label for="name"><?php echo $this->lang->line('ministry_edu'); ?></label><br>
                                                    <input class="form-control col-md-7 col-xs-12" type="" name="min_edu" id="min_edu" placeholder="" required /><br>
                                                </div>
                                                </div>
                                            </div>
                                            
                                               
                                             <div class="item form-group">
                                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                                     <div class="row">
                                                        <div class="col-sm-4">
                                                            <input  class="form-control"  name="year1"  id="year1" value="" placeholder="<?php echo $this->lang->line('year'); ?>" required="required" type="text" autocomplete="off">
                                                         <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-sm-8"><label class="col-md-6 col-sm-3 col-xs-12 col-md-7 col-xs-12" for="name"><?php echo $this->lang->line('text16'); ?>
                                                     </label></div>
                                                      </div>
                                                   </div> 
                                                 </div>
                                                 
                                            <div class="item form-group">
                                                <input class="form-control col-md-7 col-xs-12" type="" name="edu_director" id="edu_director" placeholder="" required />
                                                <label for="name"><br><?php echo $this->lang->line('p_edu_directo'); ?> <br> <?php echo $this->lang->line('edu_sec'); ?> </label>
                                                
                                            </div>
                                            
                                            <div class="item form-group">
                                                     <div class="row">
                                                        <div class="col-sm-4">
                                                            <input class="form-control col-md-7 col-xs-12" type="date" name="date" id="date" placeholder="" required />
                                                         <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-sm-8"><label for="name"><?php echo $this->lang->line('text17'); ?>
                                                     </label></div>
                                                      </div>
                                                     
                                                 </div>
                                        </div>



                                    </div>
<!--================================================================================================================================================================-->
                                    <div class="tab-pane fade in " id="tab_seven">
                                        
                                         <div class="row">                  
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h4  class="column-title" style="text-align: center;"><strong> <?php echo $this->lang->line('text18'); ?> </strong></h4>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="item form-group">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <tr>
                                                            <th rowspan="2"></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('title1'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('unit_no'); ?></th>
                                                            <th rowspan="2"><?php echo $this->lang->line('unit_price'); ?></th>
                                                            <th colspan="2"><?php echo $this->lang->line('count'); ?></th>
                                                        </tr>
                                                        <tr>
                                                           
                                                            <th><?php echo $this->lang->line('rs1'); ?></th>
                                                            <th><?php echo $this->lang->line('sen'); ?></th>

                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td><?php echo $this->lang->line('monk_stu'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officei" id="officei" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officeii" id="officeii" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officeiii" id="officeiii" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officeiv" id="officeiv" placeholder="" required /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td><?php echo $this->lang->line('lay_stu'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officev" id="officev" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officevi" id="officevi" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officevii" id="officevii" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officeviii" id="officeviii" placeholder="" required /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td><?php echo $this->lang->line('library1'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officeix" id="officeix" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officex" id="officex" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officexi" id="officexi" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officexii" id="officexii" placeholder="" required /></td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td colspan="4"><?php echo $this->lang->line('count'); ?></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officexiii" id="officexiii" placeholder="" required /></td>
                                                            <td><input class="form-control col-md-7 col-xs-12" type="" name="officexiv" id="officexiv" placeholder="" required /></td>
                                                          
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>  

                    <?php if (isset($edit)) { ?>
                        <div class="tab-pane fade in active" id="tab_edit_designation">
                            <div class="x_content"> 
                                <?php echo form_open(site_url('hrm/designation/edit/' . $designation->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php // $this->load->view('layout/school_list_edit_form');    ?> 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('designation'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <input  class="form-control col-md-7 col-xs-12"  name="name" value="<?php echo isset($designation) ? $designation->name : ''; ?>"  placeholder="<?php echo $this->lang->line('designation'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($designation) ? $designation->note : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($designation) ? $designation->id : ''; ?>" name="id" />
                                        <a href="<?php echo site_url('hrm/designation/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div> 

<!-- datatable with buttons -->
<script type="text/javascript">
    $(document).ready(function () {
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