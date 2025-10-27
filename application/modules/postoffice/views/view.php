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

                <section class="content">
                    <div class="row">
                        <div class="col-md-3 no-print">
                            <?php $this->load->view('message-nav'); ?>
                        </div>
                        <div class="col-md-9">
                            <div class="box-header">
                                <div style="display: flex; align-items: center;">
                                    <h3 class="box-title" style="flex-grow: 1;">
                                        <?php echo htmlspecialchars($message->subject); ?>
                                        
                                        <?php if (!isset($message->is_memo) || $message->is_memo != 1): ?>
                                            <span style="margin-left: 10px; font-weight: normal;">
                                                (<?php echo $this->lang->line('cencus_no'); ?>: <?php echo htmlspecialchars($message->cencus_no); ?>)
                                            </span>
                                        <?php endif; ?>
                                    </h3>
                                    
                                    <?php if (isset($message->is_memo) && $message->is_memo == 1): ?>
                                        <span class="badge" style="font-size: 14px; padding: 8px 12px; background-color: #f39c12; color: white; margin-left: 10px;">
                                            <i class="fa fa-sticky-note-o"> </i>  Memo
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <div class="mailbox-read-info">
                                        <?php if ($message->status == 0): ?>
                                            <div class="alert alert-success" style="margin: 15px;">
                                                <strong><i class="fa fa-check-circle"></i> Job Complete!</strong>
                                                <?php
                                                // Assuming completion_note is a property of the message object
                                                if (!empty($message->completion_note)) {
                                                    echo ' Reason: "' . htmlspecialchars(strip_tags($message->completion_note)) . '"';
                                                } else {
                                                    echo ' This letter has been closed and can no longer be forwarded.';
                                                }
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($message->status == 2): // New condition for Hold status ?>
                                            <div class="alert alert-warning" style="margin: 15px;">
                                                <strong><i class="fa fa-pause"></i> Letter on Hold!</strong>
                                                <?php
                                                // Assuming hold_note is a property of the message object
                                                if (!empty($message->hold_note)) {
                                                    echo ' Reason: "' . htmlspecialchars(strip_tags($message->hold_note)) . '"';
                                                } else {
                                                    echo ' This letter has been temporarily put on hold.';
                                                }
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if (!isset($message->is_memo) || $message->is_memo != 1): ?>
                                            <h4><?php echo $this->lang->line('school'); ?>: <?php echo htmlspecialchars($message->school_name); ?></h4>
                                            <div class="ln_solid"></div>
                                        <?php endif; ?>

                                        <h5>
                                            <span>
                                                <?php echo $this->lang->line('sender'); ?>:
                                                <?php
                                                if ($message->letter_from_piriven == 1) {
                                                    $sender = get_user_name_by_id($message->sender_id);
                                                    echo htmlspecialchars($message->sender_role . ' - ' . ($sender ? $sender->name : 'N/A'));
                                                } else {
                                                    echo htmlspecialchars($message->sender_name);
                                                }
                                                ?>
                                            </span>
                                        </h5>
                                        <?php $receiver = get_user_name_by_id($message->receiver_id); ?>
                                        <h5>
                                            <span><?php echo $this->lang->line('receiver'); ?>: <?php echo htmlspecialchars($message->receiver_role . ' - ' . ($receiver ? $receiver->name : 'N/A')); ?></span>
                                        </h5>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="mailbox-read-message">
                                        <?php echo strip_tags($message->body, '<br><hr>'); ?>
                                    </div>
                                    <br>
                                    <h5><span class="mailbox-read-time pull-right"><?php echo date($this->global_setting->date_format . ' H:i:s a', strtotime($message->created_at)); ?></span></h5>
                                    <br>
                                </div>
                                <div id="unholdLetterPanel" style="display:none; padding: 10px;">
                                    <?php echo form_open(site_url('postoffice/unhold_letter/' . $message->message_id), ['name'=>'unholdForm','id'=>'unholdForm']); ?>
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Un-Hold This Letter</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="unhold_note">Reason for Un-Hold</label>
                                                    <textarea class="form-control" name="unhold_note" id="unhold_note" placeholder="Enter reason for un-holding the letter..."></textarea>
                                                </div>
                                            </div>
                                            <div class="box-footer text-right">
                                                <button type="button" class="btn btn-default" id="cancelUnholdBtn">Cancel</button>
                                                <button type="submit" name="unhold" class="btn btn-primary"><i class="fa fa-play"></i> Resume Letter</button>
                                            </div>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                                <div id="holdLetterPanel" style="display:none; padding: 10px;">
                                    <?php echo form_open(site_url('postoffice/hold_letter/' . $message->message_id), ['name'=>'holdForm','id'=>'holdForm']); ?>
                                        <div class="box box-warning">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Hold This Letter</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="hold_note">Reason for Hold</label>
                                                    <textarea class="form-control" name="hold_note" id="hold_note" placeholder="Enter reason for holding the letter..."></textarea>
                                                </div>
                                            </div>
                                            <div class="box-footer text-right">
                                                <button type="button" class="btn btn-default" id="cancelHoldBtn">Cancel</button>
                                                <button type="submit" name="hold" class="btn btn-default"><i class="fa fa-pause"></i> Put on Hold</button>
                                            </div>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                                
                                <div id="completeJobPanel" style="display:none; padding: 10px;">
                                    <?php echo form_open(site_url('postoffice/complete_job/' . $message->message_id), ['name'=>'completeForm','id'=>'completeForm']); ?>
                                        <div class="box box-success">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Complete This Job</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="completion_note">Completion Note</label>
                                                    <textarea class="form-control" name="completion_note" id="completion_note" placeholder="Add a completion note..."></textarea>
                                                </div>
                                            </div>
                                            <div class="box-footer text-right">
                                                <button type="button" class="btn btn-default" id="cancelCompleteBtn">Cancel</button>
                                                <button type="submit" name="complete" class="btn btn-default"><i class="fa fa-check-circle"></i> Confirm Completion</button>
                                            </div>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                                <div id="body2" style="display:none; padding: 10px;">
                                    <?php echo form_open_multipart(site_url('postoffice/forward/' . $message->message_id), ['name'=>'compose','id'=>'compose']); ?>
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Forward this Letter</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="role_id2"><?php echo $this->lang->line('section'); ?> <span class="required">*</span></label>
                                                            <select class="form-control" name="role_id2" id="role_id2" required>
                                                                <option value="">-- Select Role --</option>
                                                                <?php foreach ($roles as $role) { ?>
                                                                    <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="user_id2"><?php echo $this->lang->line('person'); ?> <span class="required">*</span></label>
                                                            <select class="form-control" name="user_id2" id="user_id2" required>
                                                                <option value="">-- Select Role First --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="body1"><?php echo $this->lang->line('note'); ?></label>
                                                    <textarea class="form-control" name="body1" id="body1" placeholder="Add an optional note..."></textarea>
                                                </div>
                                            </div>
                                            <div class="box-footer text-right">
                                                <button type="button" class="btn btn-default" id="cancelForwardBtn">Cancel</button>
                                                <button type="submit" name="forwards" class="btn btn-primary"><i class="fa fa-share"></i> Send Forward</button>
                                            </div>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>

                                <?php if (isset($history) && !empty($history)): ?>
                                    <div class="ln_solid"></div>
                                    <div class="message-history">
                                        <h4><i class="fa fa-history"></i> Letter History</h4>
                                        <ol class="list-group">
                                            <?php foreach ($history as $item): ?>
                                                <li class="list-group-item">
                                                    <small class="text-muted pull-right">
                                                        <i class="fa fa-clock-o"></i>
                                                        <?php echo date($this->global_setting->date_format . ' h:i A', strtotime($item->created_at)); ?>
                                                    </small>

                                                    <?php
                                                        $sender = get_user_name_by_id($item->sender_id);
                                                        $receiver = get_user_name_by_id($item->receiver_id);
                                                    ?>

                                                    <?php if ($item->sender_id == $message->created_at): ?>
                                                        <i class="fa fa-plus-circle text-success"></i>
                                                        <strong>Created & Sent</strong> by
                                                        <em><?php echo htmlspecialchars($sender ? $sender->name : 'N/A'); ?></em>
                                                        <br>
                                                        <span style="margin-left: 20px;">
                                                            &rarr; to
                                                            <em><?php echo htmlspecialchars($receiver ? $receiver->name : 'N/A'); ?></em>
                                                        </span>
                                                        <?php if(!empty($message->body)){ ?>
                                                            <br><small class="text-muted" style="margin-left: 20px;"><strong>Note:</strong> "<?php echo htmlspecialchars(strip_tags($message->body)); ?>"</small>
                                                        <?php } ?>
                                                    <?php else: ?>
                                                        <i class="fa fa-share text-primary"></i>
                                                        <strong>Forwarded</strong> by
                                                        <em><?php echo htmlspecialchars($sender ? $sender->name : 'N/A'); ?></em>
                                                        <br>
                                                        <span style="margin-left: 20px;">
                                                            &rarr; to
                                                            <em><?php echo htmlspecialchars($receiver ? $receiver->name : 'N/A'); ?></em>
                                                        </span>

                                                        <?php if(!empty($item->note)){ ?>
                                                            <br><small class="text-muted" style="margin-left: 20px;"><strong>Note:</strong> "<?php echo htmlspecialchars(strip_tags($item->note)); ?>"</small>
                                                        <?php } ?>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </div>
                                <?php endif; ?>
                                <div class="ln_solid no-print"></div>
                                <div class="box-footer no-print">
                                    <div class="pull-left">
                                        <button type="button" class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
                                    </div>
                                    <div class="pull-right" id="actionButtons">
                                        <?php if ($message->status == 1 && $message->receiver_id == logged_in_user_id() && !$message->is_trash && !$message->is_draft): ?>
                                            <button type="button" class="btn btn-default" onclick="showForwardForm()"><i class="fa fa-share"></i> Forward</button>
                                            <button type="button" class="btn btn-default" onclick="showHoldForm()"><i class="fa fa-pause"></i> Hold Letter</button>
                                            <button type="button" class="btn btn-default" onclick="showCompleteForm()"><i class="fa fa-check-circle"></i> Job Complete</button>
                                        <?php endif; ?>
                                        <?php if ($message->status == 2 && $message->receiver_id == logged_in_user_id() && !$message->is_trash && !$message->is_draft): ?>
                                            <button type="button" class="btn btn-primary" onclick="showUnholdForm()"><i class="fa fa-play"></i> Un-Hold Letter</button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script>
    function showCompleteForm() {
        $('#body2').slideUp(); 
        $('#holdLetterPanel').slideUp();
        $('#unholdLetterPanel').slideUp();
        $('#completeJobPanel').slideDown();
        $('#actionButtons').fadeOut();
    }

    function showForwardForm() {
        $('#completeJobPanel').slideUp();
        $('#holdLetterPanel').slideUp();
        $('#unholdLetterPanel').slideUp();
        $('#body2').slideDown();
        $('#actionButtons').fadeOut();
    }
    
    function showHoldForm() {
        $('#body2').slideUp();
        $('#completeJobPanel').slideUp();
        $('#unholdLetterPanel').slideUp();
        $('#holdLetterPanel').slideDown();
        $('#actionButtons').fadeOut();
    }

    // New function for Un-Hold action
    function showUnholdForm() {
        $('#body2').slideUp();
        $('#completeJobPanel').slideUp();
        $('#holdLetterPanel').slideUp();
        $('#unholdLetterPanel').slideDown();
        $('#actionButtons').fadeOut();
    }

    $(document).ready(function() {
        $("#compose").validate();
        $("#completeForm").validate();
        $("#holdForm").validate();
        $("#unholdForm").validate(); // New validation rule

        $('#cancelForwardBtn').on('click', function(){
            $('#body2').slideUp();
            $('#actionButtons').fadeIn();
        });

        $('#cancelCompleteBtn').on('click', function(){
            $('#completeJobPanel').slideUp();
            $('#actionButtons').fadeIn();
        });
        
        $('#cancelHoldBtn').on('click', function(){
            $('#holdLetterPanel').slideUp();
            $('#actionButtons').fadeIn();
        });

        // New cancel event for Un-Hold
        $('#cancelUnholdBtn').on('click', function(){
            $('#unholdLetterPanel').slideUp();
            $('#actionButtons').fadeIn();
        });

        $('#role_id2').on('change', function() {
            var role_id = $(this).val();
            if (role_id) {
                $.ajax({
                    url: "<?php echo site_url('ajax/get_user_by_role'); ?>",
                    type: "POST",
                    data: { role_id: role_id },
                    success: function(response){
                       if(response) {
                           $('#user_id2').html(response);
                       } else {
                           $('#user_id2').html('<option value="">-- No Users Found --</option>');
                       }
                    }
                });
            } else {
                $('#user_id2').html('<option value="">-- Select Role First --</option>');
            }
        });
    });
</script>