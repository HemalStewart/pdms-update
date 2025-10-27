<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bullhorn"></i><small> <?php echo $this->lang->line('manage_news'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php $this->load->view('quick-link'); ?>                   
            </div>

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">

                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>"><a href="#tab_news_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                            <?php if (has_permission(ADD, 'student', 'news')) { ?>
                                <?php if (isset($edit)) { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="<?php echo site_url('student/news/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } else { ?>
                                <li  class="<?php
                                if (isset($add)) {
                                    echo 'active';
                                }
                                ?>"><a href="#tab_add_news"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                                 <?php } ?>
                             <?php } ?> 
                             <?php if (isset($edit)) { ?>
                            <li  class="active"><a href="#tab_edit_news"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 

                        <!--                        <li class="li-class-list">
                        <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>                                 
                                                                <select  class="form-control col-md-7 col-xs-12" onchange="get_news_by_school(this.value);">
                                                                        <option value="<?php echo site_url('announcement/news/index'); ?>">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                            <?php foreach ($schools as $obj) { ?>
                                                                                    <option value="<?php echo site_url('announcement/news/index/' . $obj->id); ?>" <?php
                                if (isset($filter_school_id) && $filter_school_id == $obj->id) {
                                    echo 'selected="selected"';
                                }
                                ?> > <?php echo $obj->school_name; ?></option>
                            <?php } ?>   
                                                                </select>
                        <?php } ?>  
                                                </li>        -->


                        <li class="li-class-list">


                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>              



                                <?php echo form_open(site_url('student/news/index/'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <select  class="form-control col-md-7 col-xs-12" style="width:auto;" id="filter_provincial_id" name="provincial_id"   onchange="get_district_by_province(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                    <?php foreach ($provincial as $obj) { ?>
                                        <option value="<?php echo $obj->provincialid; ?>" <?php
                                        if (isset($filter_prov_id) && $filter_prov_id == $obj->provincialid) {
                                            echo 'selected="selected"';
                                        }
                                        ?> > <?php echo $obj->provincialname; ?></option>
                                            <?php } ?>   
                                </select>
                                <select  class="form-control col-md-7 col-xs-12" id="filter_district_id" name="district_id"  style="width:auto;"   onchange="get_zonal_by_district(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option> 



                                </select>

                                <select  class="form-control col-md-7 col-xs-12" id="filter_zonal_id" name="zonal_id"  style="width:auto;"   onchange="get_edu_by_zonal(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_edu_id" name="edu_id"  style="width:auto;"   onchange="get_school_by_edu(this.value, '');">
                                    <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option> 



                                </select> 

                                <select  class="form-control col-md-7 col-xs-12" id="filter_school_id" name="school_id"  style="width:auto;" onchange="this.form.submit();">
                                    <option value="select"><?php echo $this->lang->line('select_school') ?></option>


                                </select>



                            <?php } echo form_close(); ?>

                        </li>
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php
                        if (isset($list)) {
                            echo 'active';
                        }
                        ?>" id="tab_news_list" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                <th><?php echo $this->lang->line('school'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('title'); ?></th>
                                            <th><?php echo $this->lang->line('create'); ?></th>
                                 
                                            <th><?php echo $this->lang->line('action'); ?></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        $count = 1;
                                        if (isset($news_list) && !empty($news_list)) {
                                            ?>
                                            <?php foreach ($news_list as $obj) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                        <td><?php echo $obj->school_name; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $obj->title; ?></td>
                                                    <td><?php echo $obj->created_at; ?></td>
                                                   
                                                   
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'student', 'news')) { ?>
                                                            <a href="<?php echo site_url('student/news/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(VIEW, 'student', 'news')) { ?>
                                                            <a  onclick="get_news_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-news-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'student', 'news')) { ?>
                                                            <a href="<?php echo site_url('student/news/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
                        ?>" id="tab_add_news">
                            <div class="x_content"> 
                                <?php echo form_open_multipart(site_url('student/news/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                <?php $this->load->view('layout/school_list_form'); ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($post['title']) ? $post['title'] : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>                                

                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('student_cal_details'); ?>:</strong></h5>
                                    </div>
                                </div>


                                <div class="row"> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group dataTables_wrapper">
                                            <label for="religion"></label>
                                            <table id="add-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                <tr>
                                                    <th></th>
                                                    <th><?php echo $this->lang->line('grade_year'); ?></th>
                                                    <th colspan="3"><?php echo $this->lang->line('stu_count'); ?></th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $this->lang->line('monk'); ?></td>
                                                    <td><?php echo $this->lang->line('lay'); ?></td>
                                                    <td><?php echo $this->lang->line('count'); ?> </td>
                                                    
                                                <tr>
                                                    <td>01</td>
                                                    <td><?php echo $this->lang->line('0_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10omonk" id="R10omonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10olay" id="R10olay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ototal" id="R10ototal" value="" placeholder="" type="text" autocomplete="off"readonly></td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td><?php echo $this->lang->line('1_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10imonk" id="R10imonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ilay" id="R10ilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10itotal" id="R10itotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td><?php echo $this->lang->line('2_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iimonk" id="R10iimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iilay" id="R10iilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iitotal" id="R10iitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>04</td>
                                                    <td><?php echo $this->lang->line('3_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiimonk" id="R10iiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiilay" id="R10iiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiitotal" id="R10iiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td><?php echo $this->lang->line('4_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivmonk" id="R10ivmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivlay" id="R10ivlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivtotal" id="R10ivtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>06</td>
                                                    <td><?php echo $this->lang->line('5_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vmonk" id="R10vmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vlay" id="R10vlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vtotal" id="R10vtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>07</td>
                                                    <td><?php echo $this->lang->line('6_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vimonk" id="R10vimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vilay" id="R10vilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vitotal" id="R10vitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>08</td>
                                                    <td><?php echo $this->lang->line('7_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viimonk" id="R10viimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viilay" id="R10viilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()calculateTotal('R10viimonk', 'R10viilay', 'R10viitotal')"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viitotal" id="R10viitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>09</td>
                                                    <td><?php echo $this->lang->line('8_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiimonk" id="R10viiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiilay" id="R10viiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiitotal" id="R10viiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>                                                       

                                                <tr>
                                                    <td>10</td>
                                                    <td><?php echo $this->lang->line('9_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixmonk" id="R10ixmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixlay" id="R10ixlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixtotal" id="R10ixtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td><?php echo $this->lang->line('10_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xmonk" id="R10xmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xlay" id="R10xlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xtotal" id="R10xtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td><?php echo $this->lang->line('11_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ximonk" id="R10ximonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xilay" id="R10xilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xitotal" id="R10xitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td><?php echo $this->lang->line('12_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiimonk" id="R10xiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiilay" id="R10xiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiitotal" id="R10xiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td><?php echo $this->lang->line('13_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiimonk" id="R10xiiimonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiilay" id="R10xiiilay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiitotal" id="R10xiiitotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSmonk" id="R10pSmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSlay" id="R10pSlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pStotal" id="R10pStotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMmonk" id="R10pMmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMlay" id="R10pMlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMtotal" id="R10pMtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>17</td>
                                                    <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEmonk" id="R10pEmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pElay" id="R10pElay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEtotal" id="R10pEtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>18</td>
                                                    <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestmonk" id="R10Vtestmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestlay" id="R10Vtestlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtesttotal" id="R10Vtesttotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td><?php echo $this->lang->line('degree'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degmonk" id="R10Degmonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Deglay" id="R10Deglay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degtotal" id="R10Degtotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>20</td>
                                                    <td><?php echo $this->lang->line('other1'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othermonk" id="R10Othermonk" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherlay" id="R10Otherlay" value="" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotals()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othertotal" id="R10Othertotal" value="" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>*</td>
                                                    <td><?php echo $this->lang->line('count'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalmonk" id="AddTotalmonk" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totallay" id="AddTotallay" value="" placeholder="" type="text" autocomplete="off" readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totaltotal" id="AddTotaltotal" value="" placeholder="" type="text" autocomplete="off" readonly></td>

                                                    
                                                </tr>
                                            </table>


                                            <div class="help-block"></div>
                                        </div>
                                    </div>        
                                </div>

                             

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('student/news/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_news">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url('student/news/edit/' . $news->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php $this->load->view('layout/school_list_edit_form'); ?>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($news->title) ? $news->title : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('title'); ?></div>
                                        </div>
                                    </div>

                                    <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('student_cal_details'); ?>:</strong></h5>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="item form-group dataTables_wrapper">
                                            <label for="religion"></label>
                                            <table id="edit-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                                <tr>
                                                    <th></th>
                                                    <th><?php echo $this->lang->line('grade_year'); ?></th>
                                                    <th colspan="3"><?php echo $this->lang->line('stu_count'); ?></th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $this->lang->line('monk'); ?></td>
                                                    <td><?php echo $this->lang->line('lay'); ?></td>
                                                    <td><?php echo $this->lang->line('count'); ?> </td>
                                                    
                                                <tr>
                                                    <td>01</td>
                                                    <td><?php echo $this->lang->line('0_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10omonk" id="R10omonk" value="<?php echo isset($news->R10omonk) ? $news->R10omonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10olay" id="R10olay" value="<?php echo isset($news->R10olay) ? $news->R10olay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ototal" id="R10ototal" value="<?php echo isset($news->R10ototal) ? $news->R10ototal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td><?php echo $this->lang->line('1_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10imonk" id="R10imonk" value="<?php echo isset($news->R10imonk) ? $news->R10imonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ilay" id="R10ilay" value="<?php echo isset($news->R10ilay) ? $news->R10ilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10itotal" id="R10itotal" value="<?php echo isset($news->R10itotal) ? $news->R10itotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                
                                                </tr>
                                               
                                                <tr>
                                                    <td>03</td>
                                                    <td><?php echo $this->lang->line('2_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iimonk" id="R10iimonk" value="<?php echo isset($news->R10iimonk) ? $news->R10iimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iilay" id="R10iilay" value="<?php echo isset($news->R10iilay) ? $news->R10iilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iitotal" id="R10iitotal" value="<?php echo isset($news->R10iitotal) ? $news->R10iitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>04</td>
                                                    <td><?php echo $this->lang->line('3_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiimonk" id="R10iiimonk" value="<?php echo isset($news->R10iiimonk) ? $news->R10iiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiilay" id="R10iiilay" value="<?php echo isset($news->R10iiilay) ? $news->R10iiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10iiitotal" id="R10iiitotal" value="<?php echo isset($news->R10iiitotal) ? $news->R10iiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td><?php echo $this->lang->line('4_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivmonk" id="R10ivmonk" value="<?php echo isset($news->R10ivmonk) ? $news->R10ivmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivlay" id="R10ivlay" value="<?php echo isset($news->R10ivlay) ? $news->R10ivlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ivtotal" id="R10ivtotal" value="<?php echo isset($news->R10ivtotal) ? $news->R10ivtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>06</td>
                                                    <td><?php echo $this->lang->line('5_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vmonk" id="R10vmonk" value="<?php echo isset($news->R10vmonk) ? $news->R10vmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vlay" id="R10vlay" value="<?php echo isset($news->R10vlay) ? $news->R10vlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vtotal" id="R10vtotal" value="<?php echo isset($news->R10vtotal) ? $news->R10vtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>07</td>
                                                    <td><?php echo $this->lang->line('6_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vimonk" id="R10vimonk" value="<?php echo isset($news->R10vimonk) ? $news->R10vimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vilay" id="R10vilay" value="<?php echo isset($news->R10vilay) ? $news->R10vilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10vitotal" id="R10vitotal" value="<?php echo isset($news->R10vitotal) ? $news->R10vitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>08</td>
                                                    <td><?php echo $this->lang->line('7_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viimonk" id="R10viimonk" value="<?php echo isset($news->R10viimonk) ? $news->R10viimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viilay" id="R10viilay" value="<?php echo isset($news->R10viilay) ? $news->R10viilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viitotal" id="R10viitotal" value="<?php echo isset($news->R10viitotal) ? $news->R10viitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>09</td>
                                                    <td><?php echo $this->lang->line('8_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiimonk" id="R10viiimonk" value="<?php echo isset($news->R10viiimonk) ? $news->R10viiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiilay" id="R10viiilay" value="<?php echo isset($news->R10viiilay) ? $news->R10viiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10viiitotal" id="R10viiitotal" value="<?php echo isset($news->R10viiitotal) ? $news->R10viiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>                                                       

                                                <tr>
                                                    <td>10</td>
                                                    <td><?php echo $this->lang->line('9_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixmonk" id="R10ixmonk" value="<?php echo isset($news->R10ixmonk) ? $news->R10ixmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixlay" id="R10ixlay" value="<?php echo isset($news->R10ixlay) ? $news->R10ixlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ixtotal" id="R10ixtotal" value="<?php echo isset($news->R10ixtotal) ? $news->R10ixtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td><?php echo $this->lang->line('10_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xmonk" id="R10xmonk" value="<?php echo isset($news->R10xmonk) ? $news->R10xmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xlay" id="R10xlay" value="<?php echo isset($news->R10xlay) ? $news->R10xlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xtotal" id="R10xtotal" value="<?php echo isset($news->R10xtotal) ? $news->R10xtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>


                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td><?php echo $this->lang->line('11_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10ximonk" id="R10ximonk" value="<?php echo isset($news->R10ximonk) ? $news->R10ximonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xilay" id="R10xilay" value="<?php echo isset($news->R10xilay) ? $news->R10xilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xitotal" id="R10xitotal" value="<?php echo isset($news->R10xitotal) ? $news->R10xitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td><?php echo $this->lang->line('12_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiimonk" id="R10xiimonk" value="<?php echo isset($news->R10xiimonk) ? $news->R10xiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiilay" id="R10xiilay" value="<?php echo isset($news->R10xiilay) ? $news->R10xiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiitotal" id="R10xiitotal" value="<?php echo isset($news->R10xiitotal) ? $news->R10xiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td><?php echo $this->lang->line('13_grade'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiimonk" id="R10xiiimonk" value="<?php echo isset($news->R10xiiimonk) ? $news->R10xiiimonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiilay" id="R10xiiilay" value="<?php echo isset($news->R10xiiilay) ? $news->R10xiiilay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10xiiitotal" id="R10xiiitotal" value="<?php echo isset($news->R10xiiitotal) ? $news->R10xiiitotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSmonk" id="R10pSmonk" value="<?php echo isset($news->R10pSmonk) ? $news->R10pSmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pSlay" id="R10pSlay" value="<?php echo isset($news->R10pSlay) ? $news->R10pSlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pStotal" id="R10pStotal" value="<?php echo isset($news->R10pStotal) ? $news->R10pStotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMmonk" id="R10Mpmonk" value="<?php echo isset($news->R10pMmonk) ? $news->R10pMmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMlay" id="R10pMlay" value="<?php echo isset($news->R10pMlay) ? $news->R10pMlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pMtotal" id="R10pMtotal" value="<?php echo isset($news->R10pMtotal) ? $news->R10pMtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>17</td>
                                                    <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEmonk" id="R10Epmonk" value="<?php echo isset($news->R10pEmonk) ? $news->R10pEmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pElay" id="R10pElay" value="<?php echo isset($news->R10pElay) ? $news->R10pElay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10pEtotal" id="R10pEtotal" value="<?php echo isset($news->R10pEtotal) ? $news->R10pEtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>18</td>
                                                    <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestmonk" id="R10Vtestpmonk" value="<?php echo isset($news->R10Vtestmonk) ? $news->R10Vtestmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtestlay" id="R10Vtestlay" value="<?php echo isset($news->R10Vtestlay) ? $news->R10Vtestlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Vtesttotal" id="R10Vtesttotal" value="<?php echo isset($news->R10Vtesttotal) ? $news->R10Vtesttotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td><?php echo $this->lang->line('degree'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degmonk" id="R10Degmonk" value="<?php echo isset($news->R10Degmonk) ? $news->R10Degmonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Deglay" id="R10Deglay" value="<?php echo isset($news->R10Deglay) ? $news->R10Deglay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Degtotal" id="R10Degtotal" value="<?php echo isset($news->R10Degtotal) ? $news->R10Degtotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>20</td>
                                                    <td><?php echo $this->lang->line('other1'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othermonk" id="R10Othermonk" value="<?php echo isset($news->R10Othermonk) ? $news->R10Othermonk : ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Otherlay" id="R10Otherlay" value="<?php echo isset($news->R10Otherlay) ? $news->R10Otherlay: ''; ?>" placeholder="" type="text" autocomplete="off" oninput="calculateRowAndColumnSumuTotalsedit()"></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Othertotal" id="R10Othertotal" value="<?php echo isset($news->R10Othertotal) ? $news->R10Othertotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>

                                                    
                                                </tr>
                                                <tr>
                                                    <td>*</td>
                                                    <td><?php echo $this->lang->line('count'); ?></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totalmonk" id="R10Totalmonk" value="<?php echo isset($news->R10Totalmonk) ? $news->R10Totalmonk : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totallay" id="R10Totallay" value="<?php echo isset($news->R10Totallay) ? $news->R10Totallay : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>
                                                    <td><input class="form-control col-md-7 col-xs-12" name="R10Totaltotal" id="R10Totaltotal" value="<?php echo isset($news->R10Totaltotal) ? $news->R10Totaltotal : ''; ?>" placeholder="" type="text" autocomplete="off"readonly></td>                                                    
                                                </tr>
                                            </table>


                                            <div class="help-block"></div>
                                        </div>
                                    </div>        
                                </div>
                                   

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($news) ? $news->id : $id; ?>" name="id" />
                                            <a  href="<?php echo site_url('student/news/index'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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


<div class="modal fade bs-news-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_news_data">            
            </div>       
        </div>
    </div>
</div>
<script type="text/javascript">

    function get_news_modal(news_id) {

        $('.fn_news_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('student/news/get_single_news'); ?>",
            data: {news_id: news_id},
            success: function (response) {
                if (response)
                {
                    $('.fn_news_data').html(response);
                }
            }
        });
    }
</script>

<link href="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo VENDOR_URL; ?>editor/jquery-te-1.4.0.min.js"></script>
<script type="text/javascript">
    $('#add_news').jqte();
    $('#edit_news').jqte();
</script>

<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script type="text/javascript">

    $('#add_date').datepicker();
    $('#edit_date').datepicker();

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

    function get_news_by_school(url) {
        if (url) {
            window.location.href = url;
        }
    }

</script> 


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
        get_school_by_edu( '<?php echo $filter_edu_id; ?>' ,'<?php echo $filter_school_id; ?>');
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

<!-- <script>
    function calculateRowAndColumnSumuTotals() {
        function parseInput(id) {
            const element = document.getElementById(id);
            return element ? parseFloat(element.value) || 0 : 0;
        }

        function updateField(id, value) {
            const element = document.getElementById(id);
            if (element) {
                element.value = value;
            }
        }
        const rows = [
            { id: "R10o", cols: ["monk", "lay", "total"] },
            { id: "R10i", cols: ["monk", "lay", "total"] },
            { id: "R10ii", cols: ["monk", "lay", "total"] },
            { id: "R10iii", cols: ["monk", "lay", "total"] },
            { id: "R10iv", cols: ["monk", "lay", "total"] },
            { id: "R10v", cols: ["monk", "lay", "total"] },
            { id: "R10vi", cols: ["monk", "lay", "total"] },
            { id: "R10vii", cols: ["monk", "lay", "total"] },
            { id: "R10viii", cols: ["monk", "lay", "total"] },
            { id: "R10ix", cols: ["monk", "lay", "total"] },
            { id: "R10x", cols: ["monk", "lay", "total"] },
            { id: "R10xi", cols: ["monk", "lay", "total"] },
            { id: "R10xii", cols: ["monk", "lay", "total"] },
            { id: "R10xiii", cols: ["monk", "lay", "total"] },
            { id: "R10pS", cols: ["monk", "lay", "total"] },
            { id: "R10pM", cols: ["monk", "lay", "total"] },
            { id: "R10pE", cols: ["monk", "lay", "total"] },
            { id: "R10Vtest", cols: ["monk", "lay", "total"] },
            { id: "R10Deg", cols: ["monk", "lay", "total"] },
            { id: "R10Other", cols: ["monk", "lay", "total"] },
        ];
        const totals = { monk: 0, lay: 0, total: 0 };
        rows.forEach(row => {
            const monkValue = parseInput(`${row.id}monk`);
            const layValue = parseInput(`${row.id}lay`);
            const rowTotal = monkValue + layValue;
            updateField(`${row.id}total`, rowTotal);
            totals.monk += monkValue;
            totals.lay += layValue;
            totals.total += rowTotal;
        });
        updateField("R10Totalmonk", totals.monk);
        updateField("R10Totallay", totals.lay);
        updateField("R10Totaltotal", totals.total);
    }
</script> -->

<!-- <script>
    function calculateRowAndColumnSumuTotalsedit() {
        const rows = document.querySelectorAll('tr');

        rows.forEach(row => {
            const monkField = row.querySelector('input[name$="monk"]');
            const layField = row.querySelector('input[name$="lay"]');
            const totalField = row.querySelector('input[name$="total"]');

            if (monkField && layField && totalField) {
                const monkValue = parseFloat(monkField.value) || 0;
                const layValue = parseFloat(layField.value) || 0;

                const total = monkValue + layValue;

               
                totalField.value = total;
            }
        });
    }
</script> -->
<!-- 
<script>
    function calculateRowAndColumnSumuTotalsedit() {
        // Get all rows of the table
        const rows = document.querySelectorAll('#datatable-responsive tr');
        
        let totalMonk = 0; // Accumulator for total monk count
        let totalLay = 0;  // Accumulator for total lay count
        let totalOverall = 0; // Accumulator for overall total count

        // Iterate through each row
        rows.forEach(row => {
            const monkField = row.querySelector('input[name$="monk"]');
            const layField = row.querySelector('input[name$="lay"]');
            const totalField = row.querySelector('input[name$="total"]');

            if (monkField && layField && totalField) {
                const monkValue = parseFloat(monkField.value) || 0; // Parse monk field value or default to 0
                const layValue = parseFloat(layField.value) || 0;  // Parse lay field value or default to 0
                
                // Calculate row total
                const total = monkValue + layValue;
                totalField.value = total.toFixed(2); // Update row total field

                // Accumulate column totals
                totalMonk += monkValue;
                totalLay += layValue;
                totalOverall += total;
            }
        });

        // Update footer totals
        const totalMonkField = document.getElementById('R10Totalmonk');
        const totalLayField = document.getElementById('R10Totallay');
        const totalOverallField = document.getElementById('R10Totaltotal');

        if (totalMonkField) totalMonkField.value = totalMonk.toFixed(2);
        if (totalLayField) totalLayField.value = totalLay.toFixed(2);
        if (totalOverallField) totalOverallField.value = totalOverall.toFixed(2);
    }

    // Attach the function to relevant input fields
    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('#datatable-responsive input[type="text"]');
        inputs.forEach(input => {
            input.addEventListener('input', calculateRowAndColumnSumuTotalsedit);
        });
    });
</script> -->



