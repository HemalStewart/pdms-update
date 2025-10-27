<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-envelope-o"></i><small> <?php echo $this->lang->line('post_letters'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3 no-print">
                            <?php $this->load->view('message-nav'); ?>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $this->lang->line('read_letters'); ?></h3>
                                </div>
                           <div class="box box-primary">
                            <?php echo form_open_multipart(site_url('postoffice/reply/'.$message->message_id), array('name' => 'compose', 'id' => 'compose', 'class'=>'form-horizontal form-label-left'), ''); ?>


                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                  <div class="mailbox-read-info">

                                    <h4><?php echo $this->lang->line('school'); ?>: <?php echo $message->school_name; ?></h4>
                                    <div class="ln_solid"></div>

                                    <h4 style=" background: #f1f1f1;padding: 10px 0px; font-weight: 600"><?php echo $this->lang->line('subject'); ?>: <?php echo $message->subject; ?></h4>
                                    <h5>
                                        <?php if($message->receiver_id == $message->owner_id){ ?>
                                            <?php $user = get_user_by_id( $message->sender_id); ?>
                                            <span><?php echo $this->lang->line('sender'); ?>: <?php echo $user->name; ?></span>
                                        <?php }else{ ?>
                                            <?php $user = get_user_by_id($message->receiver_id); ?>
                                            <span><?php echo $this->lang->line('receiver'); ?>: <?php echo $user->name; ?></span>
                                        <?php } ?>

                                    </h5>
                                  </div>
                                  <div class="ln_solid"></div>
                                  <div class="mailbox-read-message">
                                    <?php echo $this->lang->line('note'); ?>: <?php echo nl2br($message->body); ?>
                                     <br/>
                                  </div>
                                      <br/>

                                           <input style="background: #f1f1f1;" type="hidden" name="prev_attachment" id="prev_attachment" value="<?php echo $message->attachment; ?>" />
                                        <?php if($message->attachment){ ?>
                                            <a style="background: #f1f1f1; padding: 5px 5px"target="_blank" href="<?php echo UPLOAD_PATH; ?>/post-office/<?php echo $message->attachment; ?>"><i class="fa fa-file" style="color: cornflowerblue"></i>&nbsp;&nbsp;<?php echo $message->attachment; ?></a> <br/><br/>
                                        <?php } ?>

                                     <h5><span class="mailbox-read-time pull-right"><?php echo date($this->global_setting->date_format . ' H:i:s a', strtotime($message->created_at)); ?></span></h5>
                                  <br/>
                                  <?php
// Merge replies and forwards into a single array
$rfmessages = array_merge($replies, $forwards);

// Sort the merged array by the created_at timestamp
usort($rfmessages, function($a, $b) {
    return strtotime($a->created_at) - strtotime($b->created_at);
});
?>

<!-- Display the merged and sorted messages -->
<?php if (!empty($rfmessages)) { ?>
    <?php foreach ($rfmessages as $obj) { ?>
        <div class="ln_solid"></div>
        <h5>
            <?php if (isset($obj->body1)) { ?>
                <!-- Display forward message information -->
                <span><b><?php echo $this->lang->line('forward'); ?>:</b></span>
                <!-- Display sender information -->
                <?php $user = get_user_by_id($obj->sender_id); ?><span><b><?php echo $user->name; ?></b></span>

                <table>
                    <tbody>
                        <tr>
                            <td><?php echo $this->lang->line('work_from'); ?></span></td>
                            <td> : &nbsp;<span><?php echo $user->name; ?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('work_to'); ?></span></td>
                            <td> : &nbsp;<?php echo $obj->department; ?> -> <?php echo $obj->rolename; ?> -> <?php echo $obj->dirname; ?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('date'); ?></span></td>
                            <td> : &nbsp;<span><?php echo $obj->date_time; ?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('subject'); ?></span></td>
                            <td> : &nbsp;<span><?php echo $obj->subject; ?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('message'); ?></span></td>
                            <td style="overflow-wrap: anywhere;"> : &nbsp;<span><?php echo $obj->body1; ?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('attachment'); ?></span></td>
                            <td> :&nbsp;

                                <?php if ($obj->submission) { ?>
                                    <a style="background: #f1f1f1; padding: 5px 5px" target="_blank" href="<?php echo UPLOAD_PATH; ?>/post-office/<?php echo $obj->submission; ?>"><i class="fa fa-file" style="color: cornflowerblue"></i>&nbsp;&nbsp;<?php echo $obj->submission; ?></a> <br/><br/>
                                <?php } else { ?>
                                    <p>:- no attachment -</p>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

            <?php } else { ?>
                <!-- Display reply message information -->
                <span><b><?php echo $this->lang->line('reply'); ?>:</b></span>
                <!-- Display sender information -->
                <?php $user = get_user_by_id($obj->sender_id); ?>
                <span><b><?php echo $user->name; ?></b></span>
                <!-- Display reply message body -->
                <div class="mailbox-read-message">
                    <?php echo nl2br($obj->body); ?>
                    <br/>
                </div>
            <?php } ?>
        </h5>
        <!-- Display message timestamp -->
        <h5> <span class="mailbox-read-time pull-right"><?php echo date($this->global_setting->date_format . ' H:i:s a', strtotime($obj->created_at)); ?></span></h5>
        <br/>
    <?php } ?>
<?php } ?>

                                  <!-- REPLY & FORWARD DISPLAY -->
                                   <?php if(!$message->is_trash || !$message->is_draft){ ?>
                                   <div class="form-group"></div>
                                    <div class="form-group">


                                        <textarea  style="display: none;" class="form-control" name="body" id="body" required="required" placeholder="<?php echo $this->lang->line('reply'); ?> *"></textarea>


                                        <div class="help-block"><?php echo form_error('body'); ?></div>
                                        <input type="hidden" name="message_id" id="message_id" value="<?php echo $message->message_id; ?>" />

                                        <?php if($message->receiver_id == $message->owner_id){ ?>
                                            <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo $message->sender_id; ?>" />
                                        <?php }else{ ?>
                                            <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo $message->receiver_id; ?>" />
                                         <?php } ?>
                                    </div>



                                    <div class="form-group" style="display: none;" id="body2">
                                         <!--<table id="datatable-responsive" class=" dt-responsive nowrap fn_add_stop_container" cellspacing="0" width="100%" style="box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302), 0 2px 6px 2px rgba(60,64,67,0.149);border: 1px solid transparent;">-->

                                        <table id="datatable-responsive" class=" table dt-responsive nowrap fn_add_stop_container" cellspacing="0" width="100%" style="border: 1px solid #e1e3e1; border-radius: 25px;">
                                            <tr>
                                                <td> <i class="fa fa-share fa-fw" style="color:#9F9F9F">&nbsp</i><?php echo $this->lang->line('work_to'); ?> :<br/>

                                                 <input type="hidden" name="message_id" id="message_id" value="<?php echo $message->message_id; ?>" />
                                                 <?php if($message->receiver_id == $message->owner_id){ ?>
                                                     <input type="hidden" name="receiver_id" id="receiver_id2" value="<?php echo $message->sender_id; ?>" />
                                                 <?php }else{ ?>
                                                     <input type="hidden" name="receiver_id" id="receiver_id2" value="<?php echo $message->receiver_id; ?>" />
                                                  <?php } ?>
                                                 <!-- ================================================dropdowns====================================== -->
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
                                                       <select  class="form-control col-md-7 col-xs-12 quick-field" name="role_id2" id="add_role_id2" required="required" onchange="get_user_by_role_dep_dir();">
                                                         <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                           <?php if(isset($roles) && !empty($roles)){ ?>
                                                           <?php foreach ($roles as $obj) { ?>
                                                             <option value="<?php echo $obj->id; ?>" <?php if(isset($message) && $message->role_id == $obj->id ){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                               <!-- <option value="<?php echo $obj->id; ?>"><?php echo $obj->name; ?></option> -->

                                                           <?php } ?>
                                                            <?php } ?>
                                                       </select>
                                                       <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                                   </div>
                                                 </div>

                                                 <div class="col-md-6 col-sm-3 col-xs-12">
                                                   <div class="item form-group">
                                                       <label for="user_id"><?php echo $this->lang->line('user'); ?> <span class="required">*</span></label>
                                                       <select  class="form-control col-md-7 col-xs-12 quick-field"name="user_id2"  id="add_user_id" required="required">
                                                         <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                       </select>
                                                       <div class="help-block"><?php echo form_error('user_id'); ?></div>
                                                   </div>
                                                 </div>
                                                 <!-- ================================================dropdowns====================================== -->

                                                  <br/>
                                                </td>
                                                <td>
                                                <div class="pull-right">
                                               <a href="<?php echo site_url('postoffice/view/'.$message->message_id); ?>"><button type="button" id="myButton" class="close"><i class="fa fa-times fa-2xs" style="color: #494949; font-size: medium"></i>

                                               </div>
                                             </td>
                                            </tr>


                                                  <tr>
                                                    <td colspan="2">
                                                      <div class="mailbox-read-info">
                                                          <?php echo $this->lang->line('messageinfor');?><br/>
                                                          <input type="text" name="school" id="school" value="<?php echo $message->school_name; ?>" />
                                                          <?php echo $this->lang->line('school'); ?>: <?php echo $message->school_name; ?><br/>
                                                          <input type="text" name="subject" id="subject" value="<?php echo $message->subject; ?>" />
                                                          <?php echo $this->lang->line('subject'); ?>: <?php echo $message->subject; ?><br/>
                                                          <?php if($message->receiver_id == $message->owner_id){ ?>
                                                                 <?php $user = get_user_by_id( $message->sender_id); ?>
                                                                  <input type="text" name="s_r_name" id="s_r_name" value="<?php echo $user->name; ?>" />
                                                                 <span><?php echo $this->lang->line('sender'); ?>: <?php echo $user->name; ?></span>
                                                                 <?php }else{ ?>
                                                                 <?php $user = get_user_by_id($message->receiver_id); ?>
                                                                 <input type="text" name="s_r_name" id="s_r_name" value="<?php echo $user->name; ?>" />
                                                                 <span><?php echo $this->lang->line('receiver'); ?>: <?php echo $user->name; ?></span>
                                                                 <?php } ?>
                                                     </div>
                                                     <div class="mailbox-read-message">
                                                         <input type="text" name="note" id="note" value="<?php echo $message->body; ?>" />
                                                         <?php echo $this->lang->line('note'); ?>: <?php echo nl2br($message->body); ?><br/>
                                                     </div>
                                                     <input type="text" name="date_time" id="date_time" value="<?php echo date($this->global_setting->date_format ."|".' H:i:s a', strtotime($obj->created_at)); ?>" />
                                                     <span class="mailbox-read-time"><?php echo $this->lang->line('date'); ?>:<?php echo date($this->global_setting->date_format ."|".' H:i:s a', strtotime($obj->created_at)); ?></span><br/><br/>
                                                     <input style="background: #f1f1f1;" type="hidden" name="prev_attachment" id="prev_attachment" value="<?php echo $message->attachment; ?>" />
                                                    <?php if($message->attachment){ ?>
                                                          <a style="background: #f1f1f1; padding: 5px 5px"target="_blank" href="<?php echo UPLOAD_PATH; ?>/post-office/<?php echo $message->attachment; ?>"><i class="fa fa-file" style="color: cornflowerblue"></i>&nbsp;&nbsp;<?php echo $message->attachment; ?></a> <br/>
                                                    <?php } ?>
                                                         <textarea class="form-control" name="body1" id="body1" placeholder="<?php echo $this->lang->line('forward'); ?> *" style="margin-top: 10px;"></textarea>
                                                    </td>
                                                       </tr>

                                                       <tr>
                                                         <td>
                                                           <div class="item form-group">
                                                                   <div class="btn btn-default btn-file">
                                                                       <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                                       <input  class="form-control col-md-7 col-xs-12"  name="submission"  id="add_submission" type="file" >
                                                                   </div>
                                                                   <div class="text-info"><?php echo $this->lang->line('valid_file_format_submission'); ?></div>
                                                                   <div class="help-block"><?php echo form_error('submission'); ?></div>
                                                           </div>

                                                         </td>
                                                       </tr>


                                        </table>
                                    </div>



                                   <?php } ?>

                                </div>

                                <!-- /.box-footer -->
                                <div class="ln_solid no-print"></div>
                                <div class="box-footer no-print">
                                  <div class="pull-right">
                                    <?php if(!$message->is_trash || !$message->is_draft){ ?>
                                          <button type="submit" name="reply" class="btn btn-default" onclick="myFunction()"><i class="fa fa-reply"></i> <?php echo $this->lang->line('reply'); ?></button>
                                          <button type="submit" name="forwards" class="btn btn-default" onclick="myFunction2()"><i class="fa fa-share"></i> forward</button>
                                    <?php } ?>


                                  </div>

                                    <a href="<?php echo site_url('postoffice/delete/'.$message->message_id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');"><button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?></button></a>
                                  <button type="button" class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
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

<!-- datatable with buttons -->
 <script type="text/javascript">

    $("#compose").validate();
</script>

<script>
function myFunction() {
  let textarea = document.getElementById("body");
  textarea.style.display = "block";
}
</script>

<!--<script>
function myFunction2() {
  let textarea = document.getElementById("body2");
  textarea.style.display = "block";
}
</script>-->
<script>
function  myFunction2() {
   document.getElementById('body2').style.display = "block";
}
</script>
<!--<script>
function saveMsg(e){
  e.preventDefault();
   document.getElementById('body2').style.display  = "none";
  document.getElementById("body2").style.display = "block";
}
    </script>-->

    <script>
      function get_user_by_role_dep_dir() {

        var get_id = document.getElementById('add_role_id2').value;
        // console.log(get_id);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_user_department'); ?>",
            data: {role_id: get_id },
            // async: false,
            success: function (response) {

                if (response)
                {
                  $('#add_user_id').html(response);
                  // console.log(response);
                }
            }
        });
      }
    </script>

<script>
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

</script>
