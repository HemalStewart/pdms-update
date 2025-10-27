<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-calculator"></i><small> <?php echo $this->lang->line('manage_income_head'); ?></small></h3>
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
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_incomehead_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'accounting', 'incomehead')){ ?>
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('accounting/incomehead/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php }else{ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_incomehead"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php } ?>
                        <?php } ?>
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_incomehead"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?> 
                            
                       <li class="li-class-list">
                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>                                 
                             <select  class="form-control col-md-7 col-xs-12" onchange="get_head_by_school(this.value);">
                                     <option value="<?php echo site_url('accounting/incomehead/index'); ?>">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                 <?php foreach($schools as $obj ){ ?>
                                     <option value="<?php echo site_url('accounting/incomehead/index/'.$obj->id); ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                 <?php } ?>   
                             </select>
                         <?php } ?>  
                         </li>      
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_incomehead_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                            <th><?php echo $this->lang->line('school'); ?></th>
                                        <?php } ?>
                                        <th><?php echo $this->lang->line('income_head'); ?></th>
                                        <th><?php echo $this->lang->line('account_type'); ?></th>
                                        <th><?php echo $this->lang->line('account_number'); ?></th>
										<th><?php echo $this->lang->line('bank_name'); ?></th>
										<th><?php echo $this->lang->line('branch1'); ?></th>
										<th><?php echo $this->lang->line('branch_code'); ?></th>
                                        <th><?php echo $this->lang->line('note'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($incomeheads) && !empty($incomeheads)){ ?>
                                        <?php foreach($incomeheads as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                <td><?php echo $obj->school_name; ?></td>
                                            <?php } ?>
                                           
                                            <td><?php echo $obj->title; ?></td>
                                            
                                             <td><?php echo $obj->account_type; ?></td>
                                            
                                            <td><?php echo $obj->account_number; ?></td>
											
											<td><?php echo $obj->bank_name; ?></td>
											
											<td><?php echo $obj->branch; ?></td>
											
											<td><?php echo $obj->branch_code; ?></td>
                                             
                                            <td><?php echo $obj->note; ?></td>
                                            <td>                                                
                                                <?php if(has_permission(EDIT, 'accounting', 'incomehead')){ ?>
                                                    <a href="<?php echo site_url('accounting/incomehead/edit/'.$obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'accounting', 'incomehead')){ ?>
                                                    <a href="<?php echo site_url('accounting/incomehead/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>                                                
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_incomehead">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('accounting/incomehead/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_form'); ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('income_head'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($post['title']) ?  $post['title'] : ''; ?>" placeholder="<?php echo $this->lang->line('income_head'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>                                
                                
                                
                                  <!--my work-->
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_type"><?php echo $this->lang->line('account_type'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="account_type"  id="account_type" value="<?php echo isset($post['account_type']) ?  $post['account_type'] : ''; ?>" placeholder="<?php echo $this->lang->line('account_type'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('account_type'); ?></div>
                                    </div>
                                </div> 
                                
								<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_number"><?php echo $this->lang->line('account_number'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="account_number"  id="account_number" value="<?php echo isset($post['account_number']) ?  $post['account_number'] : ''; ?>" placeholder="<?php echo $this->lang->line('account_number'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('account_number'); ?></div>
                                    </div>
                                </div> 
								
								<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_name"><?php echo $this->lang->line('bank_name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="bank_name"  id="bank_name" value="<?php echo isset($post['bank_name']) ?  $post['bank_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('bank_name'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('bank_name'); ?></div>
                                    </div>
                                </div> 
								
								<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="branch"><?php echo $this->lang->line('branch1'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="branch"  id="branch" value="<?php echo isset($post['branch']) ?  $post['branch'] : ''; ?>" placeholder="<?php echo $this->lang->line('branch1'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('branch'); ?></div>
                                    </div>
                                </div> 
								
								<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="branch_code"><?php echo $this->lang->line('branch_code'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="branch_code"  id="branch_code" value="<?php echo isset($post['branch_code']) ?  $post['branch_code'] : ''; ?>" placeholder="<?php echo $this->lang->line('branch_code'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('branch_code'); ?></div>
                                    </div>
                                </div> 
								
								<!--end-->                        
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($post['note']) ?  $post['note'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('accounting/incomehead/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_incomehead">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('accounting/incomehead/edit/'.$incomehead->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_edit_form'); ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('income_head'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($incomehead->title) ?  $incomehead->title : ''; ?>" placeholder="<?php echo $this->lang->line('income_head'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>
                               
                                <!-- my work-->
                                
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('account_type'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="account_type"  id="account_type" value="<?php echo isset($incomehead->account_type) ?  $incomehead->account_type : ''; ?>" placeholder="<?php echo $this->lang->line('account_type'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('account_type'); ?></div>
                                    </div>
                                </div>
						
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('account_number'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="account_number"  id="account_number" value="<?php echo isset($incomehead->account_number) ?  $incomehead->account_number : ''; ?>" placeholder="<?php echo $this->lang->line('account_number'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('account_number'); ?></div>
                                    </div>
                                </div>
								
								<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('bank_name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="bank_name"  id="bank_name" value="<?php echo isset($incomehead->bank_name) ?  $incomehead->bank_name : ''; ?>" placeholder="<?php echo $this->lang->line('bank_name'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('bank_name'); ?></div>
                                    </div>
                                </div>
								
								<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('branch'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="branch"  id="branch" value="<?php echo isset($incomehead->branch) ?  $incomehead->branch : ''; ?>" placeholder="<?php echo $this->lang->line('branch'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('branch'); ?></div>
                                    </div>
                                </div>
								
								<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('branch_code'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="branch_code"  id="branch_code" value="<?php echo isset($incomehead->branch_code) ?  $incomehead->branch_code : ''; ?>" placeholder="<?php echo $this->lang->line('branch_code'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('branch_code'); ?></div>
                                    </div>
                                </div>
								
								<!--end-->
                                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($incomehead->note) ?  $incomehead->note : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($incomehead) ? $incomehead->id : $id; ?>" name="id" />
                                        <a href="<?php echo site_url('accounting/incomehead/index'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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
    
    function get_head_by_school(url){          
        if(url){
            window.location.href = url; 
        }
    }  
    
</script>