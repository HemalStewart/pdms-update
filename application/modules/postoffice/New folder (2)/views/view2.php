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
<!--===============================================DISPLY INFORMATION===============================================-->
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
                                  <?php if(isset($replies) && !empty($replies)){ ?>
                                    <?php foreach($replies as $obj){ ?>
                                    <div class="ln_solid"></div>
                                    <h5>
                                        <?php $user = get_user_by_id( $obj->sender_id); ?>
                                        <span> <?php echo $this->lang->line('reply'); ?>: <?php echo $user->name; ?></span>

                                    </h5>
                                      <div class="mailbox-read-message">
                                        <?php echo nl2br($obj->body); ?>
                                          <br/>
                                      </div>

                                    <h5> <span class="mailbox-read-time pull-right"><?php echo date($this->global_setting->date_format . ' H:i:s a', strtotime($obj->created_at)); ?></span></h5>
                                    <br/>

                                    <?php } ?>
                                  <?php } ?> <!-- Reply End -->
<!--==============================================DISPLY INFORMATION==============================================-->
                                <!-- /.box-header -->
      <!-- ==============================================REPLY================================================================================================ -->
                                <div class="box-body no-padding">
                                    <?php echo form_open_multipart(site_url('postoffice/forward/'.$message->message_id), array('name' => 'compose', 'id' => 'compose', 'class'=>'form-horizontal form-label-left'), ''); ?>

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


                                   <?php } ?>

                                </div>
    <!-- ==============================================REPLY================================================================================================ -->
  <!-- ==============================================FORWAR================================================================================================ -->
  <div class="box-body no-padding">
      <?php echo form_open_multipart(site_url('postoffice/forward/'.$message->message_id), array('name' => 'compose', 'id' => 'compose', 'class'=>'form-horizontal form-label-left'), ''); ?>

     <?php if(!$message->is_trash || !$message->is_draft){ ?>
     <div class="form-group"></div>
      <div class="form-group" style="display: none;" id="body2">

                                         <table id="datatable-responsive" class=" table dt-responsive nowrap fn_add_stop_container" cellspacing="0" width="100%" style="border: 1px solid #e1e3e1; border-radius: 25px;">
                                             <tr>
                                                 <td> <i class="fa fa-share fa-fw" style="color:#9F9F9F">&nbsp</i><?php echo $this->lang->line('work_to'); ?> :<br/>
                                                  drop downs <br/>
                                                 </td>
                                                 <td>
                                                  <div class="pull-right">
                                                 <a href="<?php echo site_url('postoffice/view/'.$message->message_id); ?>"><button type="button" class="close"><i class="fa fa-times fa-2xs" style="color: #494949; font-size: medium"></i>

                                                 </div>
                                                     </td>
                                             </tr>

                                                   <tr>
                                               <td colspan="2">
                                                    <div class="mailbox-read-info">
                                                        <?php echo $this->lang->line('messageinfor');?><br/>
                                                        <?php echo $this->lang->line('school'); ?>: <?php echo $message->school_name; ?><br/>
                                                        <?php echo $this->lang->line('subject'); ?>: <?php echo $message->subject; ?><br/>
                                                        <?php if($message->receiver_id == $message->owner_id){ ?>
                                                               <?php $user = get_user_by_id( $message->sender_id); ?>
                                                               <span><?php echo $this->lang->line('sender'); ?>: <?php echo $user->name; ?></span>
                                                               <?php }else{ ?>
                                                               <?php $user = get_user_by_id($message->receiver_id); ?>
                                                               <span><?php echo $this->lang->line('receiver'); ?>: <?php echo $user->name; ?></span>
                                                               <?php } ?>
                                                   </div>
                                                   <div class="mailbox-read-message">
                                                       <?php echo $this->lang->line('note'); ?>: <?php echo nl2br($message->body); ?><br/>
                                                   </div>

                                                   <span class="mailbox-read-time"><?php echo $this->lang->line('date'); ?>:<?php echo date($this->global_setting->date_format ."|".' H:i:s a', strtotime($obj->created_at)); ?></span><br/>
                                                   <input style="background: #f1f1f1;" type="hidden" name="prev_attachment" id="prev_attachment" value="<?php echo $message->attachment; ?>" />
                                                  <?php if($message->attachment){ ?>
                                                        <a style="background: #f1f1f1; padding: 5px 5px"target="_blank" href="<?php echo UPLOAD_PATH; ?>/post-office/<?php echo $message->attachment; ?>"><i class="fa fa-file" style="color: cornflowerblue"></i>&nbsp;&nbsp;<?php echo $message->attachment; ?></a> <br/>
                                                  <?php } ?>

                                                    <textarea  class="form-control" name="note" id="note" required="required" placeholder="<?php echo $this->lang->line('forward'); ?> *"></textarea>
                                             </td>
                                                        </tr>

                                           <tr>
                                             <td colspan="3" style="padding: 10px 5px;">


                                               </td>

                                             </tr>




                                         </table>



     <?php } ?>

  </div>
  <!-- ==============================================FORWAR================================================================================================ -->


                                <!-- /.box-footer -->
                                <div class="ln_solid no-print"></div>
                                <div class="box-footer no-print">
                                  <div class="pull-right">
                                    <?php if(!$message->is_trash || !$message->is_draft){ ?>
                                        <button type="submit" class="btn btn-default" onclick="myFunction()"><i class="fa fa-reply"></i> <?php echo $this->lang->line('reply'); ?></button>
                                        <!--<button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>-->
                                    <?php } ?>

                                      <?php if(!$message->is_trash || !$message->is_draft){ ?>
                                        <button type="submit2" class="btn btn-default" onclick="myFunction2()"><i class="fa fa-share"></i> <?php echo $this->lang->line('forward'); ?></button>
                                          <!--  <a href="<?php echo site_url('postoffice/forward/'.$message->message_id); ?>" onclick="myFunction2()">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-share"></i> <?php echo $this->lang->line('forward'); ?></button></a>
                                      <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>-->
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

<!-- <script>
function myFunction2() {
  let textarea = document.getElementById("body2");
  textarea.style.display = "block";
}
</script> -->
<script>
function myFunction2() {
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
