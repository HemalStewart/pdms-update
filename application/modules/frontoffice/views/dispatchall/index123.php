<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-tty"></i><small> <?php echo $this->lang->line('manage_postal_dispatch'); ?></small></h3>
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
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_dispatch_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'frontoffice', 'dispatch')){ ?>
                             <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('frontoffice/dispatchall/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php }else{ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_dispatchall"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php } ?>
                        <?php } ?> 
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_dispatchall"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>
                            
                       <!-- <li class="li-class-list">
                           <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>                                 
                                <select  class="form-control col-md-7 col-xs-12" onchange="get_dispatch_by_school(this.value);">
                                        <option value="<?php echo site_url('frontoffice/dispatchall/index'); ?>">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                    <?php foreach($schools as $obj ){ ?>
                                        <option value="<?php echo site_url('frontoffice/dispatchall/index/'.$obj->id); ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                    <?php } ?>   
                                </select>
                            <?php } ?>  
                        </li>     -->
                        
                        <!---************************************************-->
 <li class="li-class-list">

                            
                              <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>              
                            
                            
                            
                              <?php echo form_open(site_url('frontoffice/dispatch/index'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
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
                            <!---************************************************-->
                        </li>
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_dispatch_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th><?php echo $this->lang->line('to_title'); ?></th>
                                        <th><?php echo $this->lang->line('reference'); ?></th>
                                        <th><?php echo $this->lang->line('from_title'); ?></th>
                                        <th><?php echo $this->lang->line('dispatch_date'); ?></th>
                                        <th><?php echo $this->lang->line('note'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php  $count = 1; if(isset($dispatches) && !empty($dispatches)){ ?>
                                        <?php foreach($dispatches as $obj){ ?>
                                        <tr>
                                           
                                            <td><?php echo $obj->to_title; ?></td>
                                            <td><?php echo $obj->reference; ?></td>
                                            <td><?php echo $obj->from_title; ?></td>
                                            <td><?php echo date($this->global_setting->date_format, strtotime($obj->dispatch_date)); ?></td>
                                            <td><?php echo $obj->note; ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'frontoffice', 'dispatchall')){ ?>
                                                    <a href="<?php echo site_url('frontoffice/dispatchall/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(VIEW, 'frontoffice', 'dispatchall')){ ?>
                                                    <a  onclick="get_dispatch_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-dispatch-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                       <?php if($obj->attachment){ ?>
                                                        <a href="<?php echo UPLOAD_PATH; ?>/postal/<?php echo $obj->attachment; ?>"  target="_blank" class="btn btn-success btn-xs"><i class="fa fa-download"></i> <?php echo $this->lang->line('download'); ?></a> <br/>
                                                        <?php } ?>
                                                <?php } ?> 
                                                    
                                                <?php if(has_permission(DELETE, 'frontoffice', 'dispatchall')){ ?>
                                                    <a href="<?php echo site_url('frontoffice/dispatchall/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_dispatch">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('frontoffice/dispatchall/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                               
                              
                                <input  class="form-control col-md-7 col-xs-12"  name="school_id"  id="school_id" value="1" required="required" type="hidden" autocomplete="off">
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_title"><?php echo $this->lang->line('to_title'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="to_title"  id="to_title" value="<?php echo isset($to_title) ?  $to_title : ''; ?>" placeholder="<?php echo $this->lang->line('to_title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('to_title'); ?></div>
                                    </div>
                                </div>                                  
                             
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reference"><?php echo $this->lang->line('reference'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="reference"  id="reference" value="<?php echo isset($reference) ?  $reference : ''; ?>" placeholder="<?php echo $this->lang->line('reference'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('reference'); ?></div>
                                    </div>
                                </div>  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($address) ?  $address : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('address'); ?></div>
                                    </div>
                                </div>  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_title"><?php echo $this->lang->line('from_title'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="from_title"  id="from_title" value="<?php echo isset($from_title) ?  $from_title : ''; ?>" placeholder="<?php echo $this->lang->line('from_title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('from_title'); ?></div>
                                    </div>
                                </div>                               
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dispatch_date"><?php echo $this->lang->line('dispatch_date'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="dispatch_date"  id="add_dispatch_date" value="<?php echo isset($dispatch_date) ?  date('d-m-Y', strtotime($dispatch_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('dispatch_date'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('dispatch_date'); ?></div>
                                    </div>
                                </div>  
                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"> <?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note"  placeholder="<?php echo $this->lang->line('note'); ?>"> <?php echo isset($note) ?  $note : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div> 
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('attachment'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="attachment"  id="attachment" type="file" >
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('select_valid_file_format'); ?></div>
                                        <div class="help-block"><?php echo form_error('attachment'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a  href="<?php echo site_url('frontoffice/dispatchall/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" purpose="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_dispatchall">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('frontoffice/dispatchall/edit/'.$dispatch->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                              <input  class="form-control col-md-7 col-xs-12"  name="school_id"  id="school_id" value="<?php echo isset($dispatch) ? $dispatch->school_id : ''; ?>" placeholder="<?php echo $this->lang->line('to_title'); ?>" required="required" type="hidden" autocomplete="off">
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_title"><?php echo $this->lang->line('to_title'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="to_title"  id="to_title" value="<?php echo isset($dispatch) ? $dispatch->to_title : ''; ?>" placeholder="<?php echo $this->lang->line('to_title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('to_title'); ?></div>
                                    </div>
                                </div>  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reference"><?php echo $this->lang->line('reference'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="reference"  id="reference" value="<?php echo isset($dispatch) ? $dispatch->reference : ''; ?>" placeholder="<?php echo $this->lang->line('reference'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('reference'); ?></div>
                                    </div>
                                </div>  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($dispatch) ? $dispatch->address : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('address'); ?></div>
                                    </div>
                                </div>  
                                
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_title"><?php echo $this->lang->line('from_title'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="from_title"  id="from_title" value="<?php echo isset($dispatch) ? $dispatch->from_title : ''; ?>" placeholder="<?php echo $this->lang->line('from_title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('from_title'); ?></div>
                                    </div>
                                </div>  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dispatch_date"><?php echo $this->lang->line('dispatch_date'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="dispatch_date"  id="edit_dispatch_date" value="<?php echo isset($dispatch) ?  date('d-m-Y', strtotime($dispatch->dispatch_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('dispatch_date'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('dispatch_date'); ?></div>
                                    </div>
                                </div>  
                                
                                                               
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"> <?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note"  placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($dispatch) ? $dispatch->note : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>      
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('attachment'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" name="prev_attachment" id="prev_attachment" value="<?php echo $dispatch->attachment; ?>" />
                                        <?php if($dispatch->attachment){ ?>
                                            <a target="_blank" href="<?php echo UPLOAD_PATH; ?>/postal/<?php echo $dispatch->attachment; ?>"><?php echo $dispatch->attachment; ?></a> <br/><br/>
                                        <?php } ?>
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="attachment"  id="attachment" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('select_valid_file_format'); ?></div>
                                        <div class="help-block"><?php echo form_error('attachment'); ?></div>
                                    </div>
                                </div>
                                
                                                            
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($dispatch) ? $dispatch->id : ''; ?>" name="id" />
                                        <a href="<?php echo site_url('frontoffice/dispatchall/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" purpose="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
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




<div class="modal fade bs-dispatch-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
        </div>
        <div class="modal-body fn_dispatch_data">            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_dispatch_modal(dispatch_id){
         
        $('.fn_dispatch_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('frontoffice/dispatchall/get_single_dispatch'); ?>",
          data   : {dispatch_id : dispatch_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_dispatch_data').html(response);
             }
          }
       });
    }
</script>



<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script type="text/javascript">
     
  $('#add_dispatch_date').datepicker();
  $('#edit_dispatch_date').datepicker();
  
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
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
    function get_dispatch_by_school(url){          
        if(url){
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