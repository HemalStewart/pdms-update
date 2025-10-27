<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-envelope-o"></i><small> <?php echo $this->lang->line('forward_letters'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <?php $this->load->view('message-nav'); ?>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $this->lang->line('forward'); ?></h3>
                            </div>
                            <div class="box box-primary">
                                <?php echo form_open_multipart(site_url('postoffice/forward'), array('name' => 'forward', 'id' => 'forward', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="box-body">

                                  <!-- =================== Message Information -->
                                  <div class="col-md-12">
                                    <div class="mailbox-read-info">
                                        <?php echo $this->lang->line('messageinfor');?><br/>
                                        <strong><?php echo $this->lang->line('school'); ?> : </strong> <?php echo $message->school_name; ?><br/>
                                        <strong><?php echo $this->lang->line('subject'); ?> : </strong><?php echo $message->subject; ?><br/>
                                        <?php if($message->receiver_id == $message->owner_id){ ?>
                                               <?php $user = get_user_by_id( $message->sender_id); ?>
                                               <strong><span><?php echo $this->lang->line('sender'); ?> : </strong> <?php echo $user->name; ?></span>
                                               <?php }else{ ?>
                                               <?php $user = get_user_by_id($message->receiver_id); ?>
                                               <strong><span><?php echo $this->lang->line('receiver'); ?> : </strong> <?php echo $user->name; ?></span>
                                               <?php } ?>
                                   </div>
                                   <div class="mailbox-read-message">
                                       <strong><?php echo $this->lang->line('note'); ?> : </strong><?php echo nl2br($message->body); ?><br/>
                                   </div>
                                      <strong><span class="mailbox-read-time"><?php echo $this->lang->line('date'); ?> : </strong><?php echo date($this->global_setting->date_format . "  " . "|" . ' H:i:s a', strtotime($message->created_at)); ?><br>

                                   <input style="background: #f1f1f1;" type="hidden" name="prev_attachment" id="prev_attachment" value="<?php echo $message->attachment; ?>" />
                                  <strong><?php echo $this->lang->line('attachment'); ?> : </strong>
                                   <?php if ($message->attachment): ?>
                                      <a style="background: #f1f1f1; padding: 5px 5px" target="_blank" href="<?php echo UPLOAD_PATH; ?>/post-office/<?php echo $message->attachment; ?>">
                                     <i class="fa fa-file" style="color: cornflowerblue"></i>&nbsp;&nbsp;<?php echo $message->attachment; ?>
                                     </a> <br/>
                                    <?php else: ?>
                                       No attachment
                                    <?php endif; ?>
                                  </div>
                                  <div class=" col-md-12 ln_solid"></div>
                                  <!-- =================== Message Information -->

                                  <!-- department forwording -->
                                 <i class="fa fa-share fa-fw" style="color:#9F9F9F">&nbsp</i><?php echo $this->lang->line('work_to'); ?> :<br/>


                                 <?php $teacher_access_data = get_teacher_access_data('student'); ?>
                                 <?php $guardian_access_data = get_guardian_access_data('class'); ?>
                                <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                <?php $schools = get_school_list(); ?>
                                <div class="col-md-4 col-md-12 item form-group">
  <select class="form-control col-md-7 col-xs-12" name="department_id" id="department_id" required="required" onchange="get_dep_and_roles(this.value, '');">
      <option value="">--<?php echo $this->lang->line('select_department'); ?>--</option>
      <?php foreach ($listdepartment as $key => $value) { ?>
          <option value="<?php echo $value["id"] ?>" <?php echo set_select('department', $value['id'], set_value('department')); ?>><?php echo $value["department"] ?></option>
      <?php } ?>
  </select>
  <div class="help-block"><?php echo form_error('department'); ?></div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
  <div class="item form-group">
      <label for="role_id"><?php echo $this->lang->line('role'); ?></label>
      <select name="role_id" id="edit_role_id" placeholder="" type="text" class="form-control">
          <option value="select"><?php echo $this->lang->line('select') ?></option>
      </select>
      <span class="text-danger"><?php echo form_error('role'); ?></span>
  </div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
  <div class="item form-group">
      <label for="name_id"><?php echo $this->lang->line('name'); ?></label>
      <select name="name_id" id="edit_name_id" placeholder="" type="text" class="form-control">
          <option value="select"><?php echo $this->lang->line('select') ?></option>
      </select>
      <span class="text-danger"><?php echo form_error('name'); ?></span>
  </div>
</div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="subdepartment_id"><?php echo $this->lang->line('subdepartment'); ?></label>
                                            <select  name="subdepartment_id" id="add_subdepartment_id" placeholder="" type="text" class="form-control">
                                                <option value="select"><?php echo $this->lang->line('select') ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('subdepartment'); ?></span>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="col-md-4 col-md-12 item form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="hidden" name="school_id" id="school_id" value="<?php echo $this->session->userdata('school_id'); ?>" />
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-md-4 col-md-12 item form-group">
                                    <select  class="form-control col-md-12 col-xs-12"  name="role_id"  id="role_id" required="required" onchange="get_roles_by_department(this.value, '');">
                                        <option value="">--<?php echo $this->lang->line('select_rol'); ?>--</option>
                                        <?php if(isset($roles) && !empty($roles)){ ?>
                                            <?php foreach($roles as $obj ){ ?>

                                                <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                     <?php if(in_array($obj->id, array(SUPER_ADMIN))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                <?php }elseif($this->session->userdata('role_id') == ADMIN){ ?>
                                                     <?php if(in_array($obj->id, array(ADMIN))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
<!--
                                                <?php }elseif($this->session->userdata('role_id') == TEACHER){ ?>
                                                     <?php if(!in_array($obj->id, array(ADMIN, GUARDIAN, STUDENT, TEACHER, ACCOUNTANT, LIBRARIN, RECEPTIONIST))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>

                                                <?php }elseif($this->session->userdata('role_id') == GUARDIAN){ ?>
                                                     <?php if(!in_array($obj->id, array(ADMIN, TEACHER, LIBRARIN, ACCOUNTANT, RECEPTIONIST))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>

                                                <?php }elseif($this->session->userdata('role_id') == STUDENT){ ?>
                                                     <?php if(!in_array($obj->id, array(ADMIN, TEACHER, STUDENT, LIBRARIN, ACCOUNTANT, RECEPTIONIST))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>

                                                <?php }elseif($this->session->userdata('role_id') == ACCOUNTANT){ ?>
                                                     <?php if(in_array($obj->id, array(SUPER_ADMIN))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>

                                                <?php }elseif($this->session->userdata('role_id') == LIBRARIN){ ?>
                                                     <?php if(!in_array($obj->id, array(ADMIN, GUARDIAN, STUDENT, TEACHER))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>

                                                <?php }elseif($this->session->userdata('role_id') == SUBJECT){ ?>
                                                     <?php if(!in_array($obj->id, array(SUPER_ADMIN,SUBJECT, ADMIN, TEACHER))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                               <?php }else{ ?>
                                                     <?php if(!in_array($obj->id, array(ADMIN, ACCOUNTANT))){ continue;} ?>
                                                     <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                <?php } ?> -->

                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                </div>

                                <!-- <div class="col-md-4  col-md-12 item form-group display">
                                    <select  class="form-control col-md-12 col-xs-12"  name="class_id"  id="class_id"  onchange="get_user('', this.value,'');">
                                        <option value="">--<?php echo $this->lang->line('class'); ?> *--</option>
                                        <?php if(isset($classes) && !empty($classes)){ ?>
                                            <?php foreach($classes as $obj ){ ?>
                                                   <?php
                                                    if($this->session->userdata('role_id') == TEACHER){
                                                       if (!in_array($obj->id, $teacher_access_data)) {continue; }
                                                    }elseif($this->session->userdata('role_id') == GUARDIAN){
                                                       if (!in_array($obj->id, $guardian_access_data)) {continue; }
                                                    }elseif($this->session->userdata('role_id') == STUDENT){
                                                       if ($obj->id != $this->session->userdata('class_id')){ continue; }
                                                    }
                                                    ?>
                                              <option value="<?php echo $obj->id; ?>" ><?php echo $obj->name; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                </div> -->

                                    <div class="col-md-4 col-md-12 item form-group">
                                        <select  class="form-control col-md-12 col-xs-12"  name="receiver_id"  id="receiver_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select_name'); ?> *--</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('receiver_id'); ?></div>
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <input  class="form-control col-md-7 col-xs-12"  name="subject"  id="subject" value="<?php if(isset($message)){ echo $message->subject;} ?>" placeholder="<?php echo $this->lang->line('subject'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('subject'); ?></div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <input type="hidden" name="prev_attachment" id="prev_attachment" value="<?php echo $message->attachment; ?>" />
                                        <?php if($message->attachment){ ?>
                                            <a target="_blank" href="<?php echo UPLOAD_PATH; ?>/post-office/<?php echo $message->attachment; ?>"><?php echo $message->attachment; ?></a> <br/><br/>
                                        <?php } ?>
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('uploadattachment'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="attachment"  id="attachment" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('select_valid_file_format'); ?></div>
                                        <div class="help-block"><?php echo form_error('attachment'); ?></div>

                                </div>




                                    <div class="col-md-12 form-group">
                                        <textarea  class="form-control" name="body" id="body" required="required" placeholder="<?php echo $this->lang->line('note'); ?> *"><?php if(isset($message)){ echo $message->body;} ?></textarea>
                                        <div class="help-block"><?php echo form_error('body'); ?></div>
                                    </div>
                                </div>

                                  <!-- //department forwording -->
                                <!-- /.box-body -->
                                 <!-- <div class=" col-md-12ln_solid"></div> -->
                                 <hr>
                                <div class=" col-md-12 box-footer">
                                    <div class="pull-right">
                                        <?php if(isset($message)){  ?>
                                            <input type="hidden" name="message_id" id="message_id" value="<?php echo $message->message_id; ?>" />
                                        <?php } ?>

                                        <button type="submit" name="forward_draft" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('draft'); ?></button>
                                        <button type="submit" name="forward" class="btn btn-default"><i class="fa fa-share"></i> <?php echo $this->lang->line('forward'); ?></button>
                                    </div>
                                    <a href="<?php echo site_url('postoffice/forward'); ?>" ><button type="reset" class="btn btn-default"><i class="fa fa-times"></i> <?php echo $this->lang->line('discard'); ?></button></a>
                                </div>
                                  <?php echo form_close(); ?>
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $('#school_id').on('change', function(){
        $('#class_id').prop('selectedIndex',0);
        $('#role_id').prop('selectedIndex',0);
        $('#receiver_id').prop('selectedIndex',0);

        var school_id = $(this).val();
        $.ajax({
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id},
            async  : false,
            success: function(response){
               if(response)
               {
                  $('#class_id').html(response);
               }
            }
        });

    });

  <?php if(isset($message)){ ?>
        get_user_by_role('<?php echo $message->role_id; ?>', '<?php echo $message->receiver_id; ?>');

    <?php } ?>

    function get_user_by_role(role_id, user_id){



       if(role_id == <?php echo STUDENT; ?>){
           $('.display').show();
           $('#class_id').attr("required");
           $('#receiver_id').html('<option value="">--<?php echo $this->lang->line('receiver'); ?>--</option>');
       }else{
           get_user(role_id, '', user_id);
           $('#class_id').removeAttr("required");
           $('.display').hide();
       }
   }

   function get_user(role_id, class_id, user_id){

       var school_id = $('#school_id').val();

       if(role_id == ''){
           role_id = $('#role_id').val();
       }

       $.ajax({
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_user_by_role'); ?>",
            data   : {school_id:school_id, role_id : role_id , class_id: class_id, user_id:user_id, message:true},
            async  : false,
            success: function(response){
               if(response)
               {
                   $('#receiver_id').html(response);
               }
            }
        });
   }
    $("#forward").validate();
</script>

 <script type="text/javascript">

<?php if (isset($edit)) { ?>
        get_subdep('<?php echo $superadmin->department_id; ?>', '<?php echo $superadmin->subdepartment_id; ?>');
<?php } elseif ($post && !empty($post)) { ?>
        get_subdep('<?php echo $post['']; ?>', '<?php echo $post['subdepartment_id']; ?>');
<?php } ?>

    function get_subdep(department_id, subdepartment_id) {
//      alert("S");


        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_subdep'); ?>",
            data: {department_id: department_id, subdepartment_id: subdepartment_id},
            async: false,
            success: function (response) {
                $('#add_subdepartment_id').html(response);
                if (response)
                {
                    if (edit) {
                        $('#edit_subdepartment_id').html(response);
                    } else {
                        $('#add_subdepartment_id').html(response);
                    }


                }
            }
        });


    }
</script>
<!-- <script>
    function get_roles_by_department(department_id, role_id) {
        // Call the function to get roles based on department
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajex/get_roles_by_department'); ?>",
            data: { department_id: department_id, role_id: role_id, user_id: <?php echo $user_id; ?> },
            success: function (response) {
                // Check if response contains valid data
                if (response.trim() !== '') {
                    $('#edit_role_id').html(response);
                    alert('Roles updated successfully!');
                } else {
                    // Handle case where response is empty or invalid
                    alert('Failed to update roles. Please try again.');
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Handle error here if needed
                alert('An error occurred while updating roles. Please try again later.');
            }
        });
    }
</script> -->
