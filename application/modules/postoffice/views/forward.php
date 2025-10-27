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



<!-- ============================Forward to departments ========================================================================= -->
<!-- department forwording -->
<i class="fa fa-share fa-fw" style="color:#9F9F9F">&nbsp</i><?php echo $this->lang->line('work_to'); ?> :<br/>

<div class="col-md-3 col-sm-3 col-xs-12">
  <div class="item form-group">
      <label for="department_id"><?php echo $this->lang->line('department'); ?> <span class="required">*</span></label>
      <select class="form-control col-md-7 col-xs-12" name="department_id" id="department_id" required="required" onchange="get_roles_by_department(this.value);">
          <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
          <?php foreach ($listdepartment as $department) { ?>
              <option value="<?php echo $department["id"]; ?>"><?php echo $department["department"]; ?></option>
          <?php } ?>
      </select>
      <div class="help-block"><?php echo form_error('department'); ?></div>
  </div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
  <div class="item form-group">
      <label for="role_id"><?php echo $this->lang->line('role'); ?> <span class="required">*</span></label>
      <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id" id="edit_role_id2" required="required" onchange="get_user_by_role_dep_dir();">
        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
          <?php foreach ($roles as $obj) { ?>

              <option value="<?php echo $obj->id; ?>"><?php echo $obj->name; ?></option>

          <?php } ?>
      </select>
      <div class="help-block"><?php echo form_error('role_id'); ?></div>
  </div>
</div>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id"><?php echo $this->lang->line('user'); ?> <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
    <select  class="form-control col-md-12 col-xs-12"  name="user_id"  id="edit_user_id" required="required" >
        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
    </select>
    <div class="help-block"><?php echo form_error('user_id'); ?></div>
</div>
</div>
<!-- ============================Forward to departments ========================================================================= -->


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
   <script>
     function get_user_by_role_dep_dir() {

       var get_id = document.getElementById('edit_role_id2').value;
       // console.log(get_id);
       $.ajax({
           type: "POST",
           url: "<?php echo site_url('ajax/get_user_department'); ?>",
           data: {role_id: get_id },
           // async: false,
           success: function (response) {

               if (response)
               {
                 $('#edit_user_id').html(response);
                 // console.log(response);
               }
           }
       });
     }
   </script>
