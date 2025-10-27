<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bar-chart"></i><small> <?php echo $this->lang->line('student_cal_report'); ?></small></h3>                
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>

            <?php $this->load->view('quick_report'); ?>   

            <div class="x_content filter-box no-print"> 
                <?php echo form_open_multipart(site_url('report/studsubject'), array('name' => 'plan', 'id' => 'plan', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">                    
                    <div class="col-md-10 col-sm-10 col-xs-12">

                        <?php $this->load->view('layout/school_list_filter_stucal'); ?>


                    </div>

                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">


                    <ul  class="nav nav-tabs bordered no-print">
                        <li class="active"><a href="#tab_tabular" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('report'); ?></a> </li>
                         
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div  class="tab-pane fade in active" id="tab_tabular" >
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th rowspan="2"><?php echo $this->lang->line('school'); ?></th>
                                            <th rowspan="2"><?php echo $this->lang->line('cencus_number'); ?></th>
                                            <th rowspan="2"><?php echo $this->lang->line('grade1'); ?></th>
                                            <th colspan="15"><?php echo $this->lang->line('stu_count'); ?></th>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('monk'); ?></th>
                                            <th><?php echo $this->lang->line('lay'); ?></th>
                                            <th><?php echo $this->lang->line('count'); ?> </th>
                                            <th><?php echo $this->lang->line('sinhala'); ?></th>
                                            <th><?php echo $this->lang->line('pali'); ?></th>
                                            <th><?php echo $this->lang->line('sanskrit'); ?></th>
                                            <th><?php echo $this->lang->line('thripitaka_damma'); ?></th>
                                            <th><?php echo $this->lang->line('english'); ?></th>
                                            <th><?php echo $this->lang->line('maths'); ?></th>
                                            <th><?php echo $this->lang->line('tamil1'); ?></th>
                                            <th><?php echo $this->lang->line('history'); ?></th>
                                            <th><?php echo $this->lang->line('geography'); ?></th>
                                            <th><?php echo $this->lang->line('social_s'); ?></th>
                                            <th><?php echo $this->lang->line('general_s'); ?></th>
                                            <th><?php echo $this->lang->line('health'); ?></th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>   

                                    <?php
                                        $count = 1;
                                        if (isset($studsubject) && !empty($studsubject)) {
                                            ?>
                                            <?php foreach ($studsubject as $obj) { ?>
                                            <?php foreach ($studsubject as $obj) { ?>
                                        
                                              <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->school_name;?></td>
                                            <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('0_grade'); ?></td>
                                            <td><?php echo $obj->R10omonk; ?></td>
                                            <td><?php echo $obj->R10olay; ?></td>
                                            <td><?php echo $obj->R10ototal; ?></td>
                                            <td><?php echo $obj->R10osin; ?></td>
                                            <td><?php echo $obj->R10opali; ?></td>
                                            <td><?php echo $obj->R10osan; ?></td>
                                            <td><?php echo $obj->R10othri; ?></td>
                                            <td><?php echo $obj->R10oeng; ?></td>
                                            <td><?php echo $obj->R10omath; ?></td>
                                            <td><?php echo $obj->R10otam; ?></td>
                                            <td><?php echo $obj->R10ohis; ?></td>
                                            <td><?php echo $obj->R10ogeo; ?></td>
                                            <td><?php echo $obj->R10osoc; ?></td>
                                            <td><?php echo $obj->R10ogen; ?></td>
                                            <td><?php echo $obj->R10oheal; ?></td>
                                        
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('1_grade'); ?></td>
                                            <td><?php echo $obj->R10imonk; ?></td>
                                            <td><?php echo $obj->R10ilay; ?></td>
                                            <td><?php echo $obj->R10itotal; ?></td>
                                            <td><?php echo $obj->R10isin; ?></td>
                                            <td><?php echo $obj->R10ipali; ?></td>
                                            <td><?php echo $obj->R10isan; ?></td>
                                            <td><?php echo $obj->R10ithri; ?></td>
                                            <td><?php echo $obj->R10ieng; ?></td>
                                            <td><?php echo $obj->R10imath; ?></td>
                                            <td><?php echo $obj->R10itam; ?></td>
                                            <td><?php echo $obj->R10ihis; ?></td>
                                            <td><?php echo $obj->R10igeo; ?></td>
                                            <td><?php echo $obj->R10isoc; ?></td>
                                            <td><?php echo $obj->R10igen; ?></td>
                                            <td><?php echo $obj->R10iheal; ?></td>
                                       
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('2_grade'); ?></td>
                                            <td><?php echo $obj->R10iimonk; ?></td>
                                            <td><?php echo $obj->R10iilay; ?></td>
                                            <td><?php echo $obj->R10iitotal; ?></td>
                                            <td><?php echo $obj->R10iisin; ?></td>
                                            <td><?php echo $obj->R10iipali; ?></td>
                                            <td><?php echo $obj->R10iisan; ?></td>
                                            <td><?php echo $obj->R10iithri; ?></td>
                                            <td><?php echo $obj->R10iieng; ?></td>
                                            <td><?php echo $obj->R10iimath; ?></td>
                                            <td><?php echo $obj->R10iitam; ?></td>
                                            <td><?php echo $obj->R10iihis; ?></td>
                                            <td><?php echo $obj->R10iigeo; ?></td>
                                            <td><?php echo $obj->R10iisoc; ?></td>
                                            <td><?php echo $obj->R10iigen; ?></td>
                                            <td><?php echo $obj->R10iiheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('3_grade'); ?></td>
                                            <td><?php echo $obj->R10iiimonk; ?></td>
                                            <td><?php echo $obj->R10iiilay; ?></td>
                                            <td><?php echo $obj->R10iiitotal; ?></td>
                                            <td><?php echo $obj->R10iiisin; ?></td>
                                            <td><?php echo $obj->R10iiipali; ?></td>
                                            <td><?php echo $obj->R10iiisan; ?></td>
                                            <td><?php echo $obj->R10iiithri; ?></td>
                                            <td><?php echo $obj->R10iiieng; ?></td>
                                            <td><?php echo $obj->R10iiimath; ?></td>
                                            <td><?php echo $obj->R10iiitam; ?></td>
                                            <td><?php echo $obj->R10iiihis; ?></td>
                                            <td><?php echo $obj->R10iiigeo; ?></td>
                                            <td><?php echo $obj->R10iiisoc; ?></td>
                                            <td><?php echo $obj->R10iiigen; ?></td>
                                            <td><?php echo $obj->R10iiiheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('4_grade'); ?></td>
                                            <td><?php echo $obj->R10ivmonk; ?></td>
                                            <td><?php echo $obj->R10ivlay; ?></td>
                                            <td><?php echo $obj->R10ivtotal; ?></td>
                                            <td><?php echo $obj->R10ivsin; ?></td>
                                            <td><?php echo $obj->R10ivpali; ?></td>
                                            <td><?php echo $obj->R10ivsan; ?></td>
                                            <td><?php echo $obj->R10ivthri; ?></td>
                                            <td><?php echo $obj->R10iveng; ?></td>
                                            <td><?php echo $obj->R10ivmath; ?></td>
                                            <td><?php echo $obj->R10ivtam; ?></td>
                                            <td><?php echo $obj->R10ivhis; ?></td>
                                            <td><?php echo $obj->R10ivgeo; ?></td>
                                            <td><?php echo $obj->R10ivsoc; ?></td>
                                            <td><?php echo $obj->R10ivgen; ?></td>
                                            <td><?php echo $obj->R10ivheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('5_grade'); ?></td>
                                            <td><?php echo $obj->R10vmonk; ?></td>
                                            <td><?php echo $obj->R10vlay; ?></td>
                                            <td><?php echo $obj->R10vtotal; ?></td>
                                            <td><?php echo $obj->R10vsin; ?></td>
                                            <td><?php echo $obj->R10vpali; ?></td>
                                            <td><?php echo $obj->R10vsan; ?></td>
                                            <td><?php echo $obj->R10vthri; ?></td>
                                            <td><?php echo $obj->R10veng; ?></td>
                                            <td><?php echo $obj->R10vmath; ?></td>
                                            <td><?php echo $obj->R10vtam; ?></td>
                                            <td><?php echo $obj->R10vhis; ?></td>
                                            <td><?php echo $obj->R10vgeo; ?></td>
                                            <td><?php echo $obj->R10vsoc; ?></td>
                                            <td><?php echo $obj->R10vgen; ?></td>
                                            <td><?php echo $obj->R10vheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('6_grade'); ?></td>
                                            <td><?php echo $obj->R10vimonk; ?></td>
                                            <td><?php echo $obj->R10vilay; ?></td>
                                            <td><?php echo $obj->R10vitotal; ?></td>
                                            <td><?php echo $obj->R10visin; ?></td>
                                            <td><?php echo $obj->R10vipali; ?></td>
                                            <td><?php echo $obj->R10visan; ?></td>
                                            <td><?php echo $obj->R10vithri; ?></td>
                                            <td><?php echo $obj->R10vieng; ?></td>
                                            <td><?php echo $obj->R10vimath; ?></td>
                                            <td><?php echo $obj->R10vitam; ?></td>
                                            <td><?php echo $obj->R10vihis; ?></td>
                                            <td><?php echo $obj->R10vigeo; ?></td>
                                            <td><?php echo $obj->R10visoc; ?></td>
                                            <td><?php echo $obj->R10vigen; ?></td>
                                            <td><?php echo $obj->R10viheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('7_grade'); ?></td>
                                            <td><?php echo $obj->R10viimonk; ?></td>
                                            <td><?php echo $obj->R10viilay; ?></td>
                                            <td><?php echo $obj->R10viitotal; ?></td>
                                            <td><?php echo $obj->R10viisin; ?></td>
                                            <td><?php echo $obj->R10viipali; ?></td>
                                            <td><?php echo $obj->R10viisan; ?></td>
                                            <td><?php echo $obj->R10viithri; ?></td>
                                            <td><?php echo $obj->R10viieng; ?></td>
                                            <td><?php echo $obj->R10viimath; ?></td>
                                            <td><?php echo $obj->R10viitam; ?></td>
                                            <td><?php echo $obj->R10viihis; ?></td>
                                            <td><?php echo $obj->R10viigeo; ?></td>
                                            <td><?php echo $obj->R10viisoc; ?></td>
                                            <td><?php echo $obj->R10viigen; ?></td>
                                            <td><?php echo $obj->R10viiheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('8_grade'); ?></td>
                                            <td><?php echo $obj->R10viiimonk; ?></td>
                                            <td><?php echo $obj->R10viiilay; ?></td>
                                            <td><?php echo $obj->R10viiitotal; ?></td>
                                            <td><?php echo $obj->R10viiisin; ?></td>
                                            <td><?php echo $obj->R10viiipali; ?></td>
                                            <td><?php echo $obj->R10viiisan; ?></td>
                                            <td><?php echo $obj->R10viiithri; ?></td>
                                            <td><?php echo $obj->R10viiieng; ?></td>
                                            <td><?php echo $obj->R10viiimath; ?></td>
                                            <td><?php echo $obj->R10viiitam; ?></td>
                                            <td><?php echo $obj->R10viiihis; ?></td>
                                            <td><?php echo $obj->R10viiigeo; ?></td>
                                            <td><?php echo $obj->R10viiisoc; ?></td>
                                            <td><?php echo $obj->R10viiigen; ?></td>
                                            <td><?php echo $obj->R10viiiheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('9_grade'); ?></td>
                                            <td><?php echo $obj->R10ixmonk; ?></td>
                                            <td><?php echo $obj->R10ixlay; ?></td>
                                            <td><?php echo $obj->R10ixtotal; ?></td>
                                            <td><?php echo $obj->R10ixsin; ?></td>
                                            <td><?php echo $obj->R10ixpali; ?></td>
                                            <td><?php echo $obj->R10ixsan; ?></td>
                                            <td><?php echo $obj->R10ixthri; ?></td>
                                            <td><?php echo $obj->R10ixeng; ?></td>
                                            <td><?php echo $obj->R10ixmath; ?></td>
                                            <td><?php echo $obj->R10ixtam; ?></td>
                                            <td><?php echo $obj->R10ixhis; ?></td>
                                            <td><?php echo $obj->R10ixgeo; ?></td>
                                            <td><?php echo $obj->R10ixsoc; ?></td>
                                            <td><?php echo $obj->R10ixgen; ?></td>
                                            <td><?php echo $obj->R10ixheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('10_grade'); ?></td>
                                            <td><?php echo $obj->R10xmonk; ?></td>
                                            <td><?php echo $obj->R10xlay; ?></td>
                                            <td><?php echo $obj->R10xtotal; ?></td>
                                            <td><?php echo $obj->R10xsin; ?></td>
                                            <td><?php echo $obj->R10xpali; ?></td>
                                            <td><?php echo $obj->R10xsan; ?></td>
                                            <td><?php echo $obj->R10xthri; ?></td>
                                            <td><?php echo $obj->R10xeng; ?></td>
                                            <td><?php echo $obj->R10xmath; ?></td>
                                            <td><?php echo $obj->R10xtam; ?></td>
                                            <td><?php echo $obj->R10xhis; ?></td>
                                            <td><?php echo $obj->R10xgeo; ?></td>
                                            <td><?php echo $obj->R10xsoc; ?></td>
                                            <td><?php echo $obj->R10xgen; ?></td>
                                            <td><?php echo $obj->R10xheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('11_grade'); ?></td>
                                            <td><?php echo $obj->R10ximonk; ?></td>
                                            <td><?php echo $obj->R10xilay; ?></td>
                                            <td><?php echo $obj->R10xitotal; ?></td>
                                            <td><?php echo $obj->R10xisin; ?></td>
                                            <td><?php echo $obj->R10xipali; ?></td>
                                            <td><?php echo $obj->R10xisan; ?></td>
                                            <td><?php echo $obj->R10xithri; ?></td>
                                            <td><?php echo $obj->R10xieng; ?></td>
                                            <td><?php echo $obj->R10ximath; ?></td>
                                            <td><?php echo $obj->R10xitam; ?></td>
                                            <td><?php echo $obj->R10xihis; ?></td>
                                            <td><?php echo $obj->R10xigeo; ?></td>
                                            <td><?php echo $obj->R10xisoc; ?></td>
                                            <td><?php echo $obj->R10xigen; ?></td>
                                            <td><?php echo $obj->R10xiheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('12_grade'); ?></td>
                                            <td><?php echo $obj->R10xiimonk; ?></td>
                                            <td><?php echo $obj->R10xiilay; ?></td>
                                            <td><?php echo $obj->R10xiitotal; ?></td>
                                            <td><?php echo $obj->R10xiisin; ?></td>
                                            <td><?php echo $obj->R10xiipali; ?></td>
                                            <td><?php echo $obj->R10xiisan; ?></td>
                                            <td><?php echo $obj->R10xiithri; ?></td>
                                            <td><?php echo $obj->R10xiieng; ?></td>
                                            <td><?php echo $obj->R10xiimath; ?></td>
                                            <td><?php echo $obj->R10xiitam; ?></td>
                                            <td><?php echo $obj->R10xiihis; ?></td>
                                            <td><?php echo $obj->R10xiigeo; ?></td>
                                            <td><?php echo $obj->R10xiisoc; ?></td>
                                            <td><?php echo $obj->R10xiigen; ?></td>
                                            <td><?php echo $obj->R10xiiheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('13_grade'); ?></td>
                                            <td><?php echo $obj->R10xiiimonk; ?></td>
                                            <td><?php echo $obj->R10xiiilay; ?></td>
                                            <td><?php echo $obj->R10xiiitotal; ?></td>
                                            <td><?php echo $obj->R10xiiisin; ?></td>
                                            <td><?php echo $obj->R10xiiipali; ?></td>
                                            <td><?php echo $obj->R10xiiisan; ?></td>
                                            <td><?php echo $obj->R10xiiithri; ?></td>
                                            <td><?php echo $obj->R10xiiieng; ?></td>
                                            <td><?php echo $obj->R10xiiimath; ?></td>
                                            <td><?php echo $obj->R10xiiitam; ?></td>
                                            <td><?php echo $obj->R10xiiihis; ?></td>
                                            <td><?php echo $obj->R10xiiigeo; ?></td>
                                            <td><?php echo $obj->R10xiiisoc; ?></td>
                                            <td><?php echo $obj->R10xiiigen; ?></td>
                                            <td><?php echo $obj->R10xiiiheal; ?></td>
                                        </tr>


                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('pracheena_start'); ?></td>
                                            <td><?php echo $obj->R10pSmonk; ?></td>
                                            <td><?php echo $obj->R10pSlay; ?></td>
                                            <td><?php echo $obj->R10pStotal; ?></td>
                                            <td><?php echo $obj->R10pSsin; ?></td>
                                            <td><?php echo $obj->R10pSpali; ?></td>
                                            <td><?php echo $obj->R10pSsan; ?></td>
                                            <td><?php echo $obj->R10pSthri; ?></td>
                                            <td><?php echo $obj->R10pSeng; ?></td>
                                            <td><?php echo $obj->R10pSmath; ?></td>
                                            <td><?php echo $obj->R10pStam; ?></td>
                                            <td><?php echo $obj->R10pShis; ?></td>
                                            <td><?php echo $obj->R10pSgeo; ?></td>
                                            <td><?php echo $obj->R10pSsoc; ?></td>
                                            <td><?php echo $obj->R10pSgen; ?></td>
                                            <td><?php echo $obj->R10pSheal; ?></td>
                                        </tr>


                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('pracheena_mid'); ?></td>
                                            <td><?php echo $obj->R10pMmonk; ?></td>
                                            <td><?php echo $obj->R10pMlay; ?></td>
                                            <td><?php echo $obj->R10pMtotal; ?></td>
                                            <td><?php echo $obj->R10pMsin; ?></td>
                                            <td><?php echo $obj->R10pMpali; ?></td>
                                            <td><?php echo $obj->R10pMsan; ?></td>
                                            <td><?php echo $obj->R10pMthri; ?></td>
                                            <td><?php echo $obj->R10pMeng; ?></td>
                                            <td><?php echo $obj->R10pMmath; ?></td>
                                            <td><?php echo $obj->R10pMtam; ?></td>
                                            <td><?php echo $obj->R10pMhis; ?></td>
                                            <td><?php echo $obj->R10pMgeo; ?></td>
                                            <td><?php echo $obj->R10pMsoc; ?></td>
                                            <td><?php echo $obj->R10pMgen; ?></td>
                                            <td><?php echo $obj->R10pMheal; ?></td>
                                        </tr>


                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('pracheena_end'); ?></td>
                                            <td><?php echo $obj->R10pEmonk; ?></td>
                                            <td><?php echo $obj->R10pElay; ?></td>
                                            <td><?php echo $obj->R10pEtotal; ?></td>
                                            <td><?php echo $obj->R10pEsin; ?></td>
                                            <td><?php echo $obj->R10pEpali; ?></td>
                                            <td><?php echo $obj->R10pEsan; ?></td>
                                            <td><?php echo $obj->R10pEthri; ?></td>
                                            <td><?php echo $obj->R10pEeng; ?></td>
                                            <td><?php echo $obj->R10pEmath; ?></td>
                                            <td><?php echo $obj->R10pEtam; ?></td>
                                            <td><?php echo $obj->R10pEhis; ?></td>
                                            <td><?php echo $obj->R10pEgeo; ?></td>
                                            <td><?php echo $obj->R10pEsoc; ?></td>
                                            <td><?php echo $obj->R10pEgen; ?></td>
                                            <td><?php echo $obj->R10pEheal; ?></td>
                                        </tr>


                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('v_v_test'); ?></td>
                                            <td><?php echo $obj->R10Vtestmonk; ?></td>
                                            <td><?php echo $obj->R10Vtestlay; ?></td>
                                            <td><?php echo $obj->R10Vtesttotal; ?></td>
                                            <td><?php echo $obj->R10Vtestsin; ?></td>
                                            <td><?php echo $obj->R10Vtestpali; ?></td>
                                            <td><?php echo $obj->R10Vtestsan; ?></td>
                                            <td><?php echo $obj->R10Vtestthri; ?></td>
                                            <td><?php echo $obj->R10Vtesteng; ?></td>
                                            <td><?php echo $obj->R10Vtestmath; ?></td>
                                            <td><?php echo $obj->R10Vtesttam; ?></td>
                                            <td><?php echo $obj->R10Vtesthis; ?></td>
                                            <td><?php echo $obj->R10Vtestgeo; ?></td>
                                            <td><?php echo $obj->R10Vtestsoc; ?></td>
                                            <td><?php echo $obj->R10Vtestgen; ?></td>
                                            <td><?php echo $obj->R10Vtestheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('degree'); ?></td>
                                            <td><?php echo $obj->R10Degmonk; ?></td>
                                            <td><?php echo $obj->R10Deglay; ?></td>
                                            <td><?php echo $obj->R10Degtotal; ?></td>
                                            <td><?php echo $obj->R10Degsin; ?></td>
                                            <td><?php echo $obj->R10Degpali; ?></td>
                                            <td><?php echo $obj->R10Degsan; ?></td>
                                            <td><?php echo $obj->R10Degthri; ?></td>
                                            <td><?php echo $obj->R10Degeng; ?></td>
                                            <td><?php echo $obj->R10Degmath; ?></td>
                                            <td><?php echo $obj->R10Degtam; ?></td>
                                            <td><?php echo $obj->R10Deghis; ?></td>
                                            <td><?php echo $obj->R10Deggeo; ?></td>
                                            <td><?php echo $obj->R10Degsoc; ?></td>
                                            <td><?php echo $obj->R10Deggen; ?></td>
                                            <td><?php echo $obj->R10Degheal; ?></td>
                                        </tr>

                                        <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $obj->school_name;?></td>
                                        <td><?php echo $obj->cencus_number; ?></td>
                                            <td><?php echo $this->lang->line('other1'); ?></td>
                                            <td><?php echo $obj->R10Othermonk; ?></td>
                                            <td><?php echo $obj->R10Otherlay; ?></td>
                                            <td><?php echo $obj->R10Othertotal; ?></td>
                                            <td><?php echo $obj->R10Othersin; ?></td>
                                            <td><?php echo $obj->R10Otherpali; ?></td>
                                            <td><?php echo $obj->R10Othersan; ?></td>
                                            <td><?php echo $obj->R10Otherthri; ?></td>
                                            <td><?php echo $obj->R10Othereng; ?></td>
                                            <td><?php echo $obj->R10Othermath; ?></td>
                                            <td><?php echo $obj->R10Othertam; ?></td>
                                            <td><?php echo $obj->R10Otherhis; ?></td>
                                            <td><?php echo $obj->R10Othergeo; ?></td>
                                            <td><?php echo $obj->R10Othersoc; ?></td>
                                            <td><?php echo $obj->R10Othergen; ?></td>
                                            <td><?php echo $obj->R10Otherheal; ?></td>
                                        </tr>

                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
									
                                        <tr style="background-color: #e7e6e6;font-weight: 700;">
                                            <td><?php echo $this->lang->line('count'); ?></td>
                                            <td>*</td>
                                            <td>*</td>
                                            <td>*</td>
                                            <td><?php echo number_format($totalMonk); ?></td>
                                            <td><?php echo number_format($totalLay); ?></td>
                                            <td><?php echo number_format($totalCount); ?></td>
                                            <td><?php echo number_format($totalSin); ?></td>
                                            <td><?php echo number_format($totalPali); ?></td>
                                            <td><?php echo number_format($totalSan); ?></td>
                                            <td><?php echo number_format($totalThri); ?></td>
                                            <td><?php echo number_format($totalEng); ?></td>
                                            <td><?php echo number_format($totalMath); ?></td>
                                            <td><?php echo number_format($totalTam); ?></td>
                                            <td><?php echo number_format($totalHis); ?></td>
                                            <td><?php echo number_format($totalGeo); ?></td>
                                            <td><?php echo number_format($totalSoc); ?></td>
                                            <td><?php echo number_format($totalGen); ?></td>
                                            <td><?php echo number_format($totalHeal); ?></td>
                                        </tr>
									</tfoot>

                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row no-print">
                <div class="col-xs-12 text-right" style="margin-top: 10px;">
                    
                    <button class="btn btn-default" onclick="printDataTable();">
                     <i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>

<!-- datatable with buttons -->
<script type="text/javascript">
    $(document).ready(function() {
    var table = $('#datatable-responsive').DataTable({
        dom: 'Bfrtip',
        iDisplayLength: 15,
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible',
                    format: {
                        footer: function (row, data, start, end, display) {
                            // the footer data is included in the export
                            var totals = [];
                            $('#datatable-responsive tfoot tr').each(function() {
                                $(this).find('td').each(function(index) {
                                    totals.push($(this).text());
                                });
                            });

                            // return the data for each column to include totals
                            return totals;
                        }
                    }
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'pageLength'
        ],
        search: true,
        responsive: true
    });
});
    $("#add").validate();
    $("#edit").validate();
    function get_designation_by_school(url){
    if (url){
    window.location.href = url;
    }
    }

</script>


<script type="text/javascript">
    function printDataTable() {
        // Get all the data rows from the DataTable, not just the visible ones
        var tableContent = $('#datatable-responsive').DataTable().rows().data().toArray();

        // Initialize the totals
        var totalMonk = 0;
        var totalLay = 0;
        var totalCount = 0;
        var totalSin = 0;
        var totalPali = 0;
        var totalSan = 0;
        var totalThri = 0;
        var totalEng = 0;
        var totalMath = 0;
        var totalTam = 0;
        var totalHis = 0;
        var totalGeo = 0;
        var totalSoc = 0;
        var totalGen = 0;
        var totalHeal = 0;

        // table HTML content
        var tableHTML = `
            <html>
                <head>
                    <title><?php echo $this->lang->line('student_cal_report'); ?></title>
                    <style>
                        /* Add styles for the print version */
                        body {
                            margin: 20px;
                        }
                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }
                        table th, table td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                        table th {
                            background-color: #f2f2f2 !important;
                            -webkit-print-color-adjust: exact;
                            color-adjust: exact;
                        }
                    </style>
                </head>
                <body>
                    <table>
                        <thead>
                            <tr>
                                <tr>
                                    <th rowspan="2"><?php echo $this->lang->line('sl_no'); ?></th>
                                    <th rowspan="2"><?php echo $this->lang->line('school'); ?></th>
                                    <th rowspan="2"><?php echo $this->lang->line('cencus_number'); ?></th>
                                    <th rowspan="2"><?php echo $this->lang->line('grade1'); ?></th>
                                    <th colspan="15"><?php echo $this->lang->line('stu_count'); ?></th>
                                </tr>
                                <tr>
                                    <th><?php echo $this->lang->line('monk'); ?></th>
                                    <th><?php echo $this->lang->line('lay'); ?></th>
                                    <th><?php echo $this->lang->line('count'); ?> </th>
                                    <th><?php echo $this->lang->line('sinhala'); ?></th>
                                    <th><?php echo $this->lang->line('pali'); ?></th>
                                    <th><?php echo $this->lang->line('sanskrit'); ?></th>
                                    <th><?php echo $this->lang->line('thripitaka_damma'); ?></th>
                                    <th><?php echo $this->lang->line('english'); ?></th>
                                    <th><?php echo $this->lang->line('maths'); ?></th>
                                    <th><?php echo $this->lang->line('tamil1'); ?></th>
                                    <th><?php echo $this->lang->line('history'); ?></th>
                                    <th><?php echo $this->lang->line('geography'); ?></th>
                                    <th><?php echo $this->lang->line('social_s'); ?></th>
                                    <th><?php echo $this->lang->line('general_s'); ?></th>
                                    <th><?php echo $this->lang->line('health'); ?></th>
                                </tr>
                        </thead>
                        <tbody>`;

        // Iterate each row and add to the table HTML
        tableContent.forEach(function(rowData, index) {
            tableHTML += '<tr>';
            rowData.forEach(function(cellData, cellIndex) {
                // Add the totals based on the columns
                if (cellIndex === 4) totalMonk += parseFloat(cellData) || 0;  // Monk column
                if (cellIndex === 5) totalLay += parseFloat(cellData) || 0;    // Lay column
                if (cellIndex === 6) totalCount += parseFloat(cellData) || 0;  // Count column
                if (cellIndex === 7) totalSin += parseFloat(cellData) || 0;    // Sinhala column
                if (cellIndex === 8) totalPali += parseFloat(cellData) || 0;   // Pali column
                if (cellIndex === 9) totalSan += parseFloat(cellData) || 0;  // San column
                if (cellIndex === 10) totalThri += parseFloat(cellData) || 0;    // Thri column
                if (cellIndex === 11) totalEng += parseFloat(cellData) || 0;  // English column
                if (cellIndex === 12) totalMath += parseFloat(cellData) || 0;    // Maths column
                if (cellIndex === 13) totalTam += parseFloat(cellData) || 0;   // Tamil column
                if (cellIndex === 14) totalHis += parseFloat(cellData) || 0;   // His column
                if (cellIndex === 15) totalGeo += parseFloat(cellData) || 0;  // Geo column
                if (cellIndex === 16) totalSoc += parseFloat(cellData) || 0;    // Soc column
                if (cellIndex === 17) totalGen += parseFloat(cellData) || 0;  // Eng column
                if (cellIndex === 18) totalHeal += parseFloat(cellData) || 0;    // Heal column
                tableHTML += `<td>${cellData}</td>`;
            });
            tableHTML += '</tr>';
        });

        // Add the footer row with totals
        tableHTML += `
                        <tfoot>
                            <tr>
                                <td colspan="4"><?php echo $this->lang->line('count'); ?></td>
                                <td>${totalMonk.toFixed(0)}</td>
                                <td>${totalLay.toFixed(0)}</td>
                                <td>${totalCount.toFixed(0)}</td>
                                <td>${totalSin.toFixed(0)}</td>
                                <td>${totalPali.toFixed(0)}</td>
                                <td>${totalSan.toFixed(0)}</td>
                                <td>${totalThri.toFixed(0)}</td>
                                <td>${totalEng.toFixed(0)}</td>
                                <td>${totalMath.toFixed(0)}</td>
                                <td>${totalTam.toFixed(0)}</td>
                                <td>${totalHis.toFixed(0)}</td>
                                <td>${totalGeo.toFixed(0)}</td>
                                <td>${totalSoc.toFixed(0)}</td>
                                <td>${totalGen.toFixed(0)}</td>
                                <td>${totalHeal.toFixed(0)}</td>
                            </tr>
                        </tfoot>`;

        // Close the table and other HTML tags
        tableHTML += `
                    </tbody>
                </table>
            </body>
        </html>`;

        // Create a new window for printing
        var printWindow = window.open('', '_blank');
        
        // Write the content to the new window
        printWindow.document.write(tableHTML);

        // Trigger the print dialog
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
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
        get_schooln_by_edu( '<?php echo $filter_edu_id; ?>' ,'<?php echo $filter_school_id; ?>');
<?php } ?>
    
  


    function get_schooln_by_edu(edu_id, schooln_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_school_by_edu'); ?>",
            data: {school_id: schooln_id, edu_id: edu_id},
            async: false,
            success: function (response) {
                if (response)
                {
                    $('#filtern_school_id').html(response);
                }
            }
        });
    }



</script>