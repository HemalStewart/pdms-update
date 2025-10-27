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
                        <div class="col-md-3">
                            <?php $this->load->view('message-nav'); ?>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $this->lang->line('compose'); ?></h3>
                            </div>
                            

                            <div class="box box-primary">
                                <?php echo form_open_multipart(site_url('postoffice/compose'), array('name' => 'compose', 'id' => 'compose', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <div class="box-body">

                                    <div class="item form-group">
                                        <label><input type="checkbox" id="cb_letter_from_piriven" name="letter_from_piriven" onclick="get_letter_from_piriven(this.checked)" value="1" <?php if (isset($message)) {
                                                                                                                                                                                            if ($message->letter_from_piriven == 1) echo 'checked';
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                        } ?>> Letter from Pirivena</label>
                                    </div>
                                    <div id="letter_not_from_piriven" style="display: none;">
                                        <input class="form-control col-md-7 col-xs-12" name="sender_name" id="sender_name" value="<?php if (isset($message)) {
                                                                                                                                        echo $message->sender_name;
                                                                                                                                    } ?>" placeholder="<?php echo $this->lang->line('name_of_sender'); ?> *" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('sender_name'); ?></div>
                                    </div>

                                <div id="pirivena_fields_container">                                                                                                    
                                    <div class="item form-group">
                                    <label for="cencus_number">Census Number</label>
                                    <input
                                        type="text"
                                        id="cencus_number"
                                        name="cencus_no"
                                        class="form-control col-md-7 col-xs-12"
                                        placeholder="Enter Census Number"
                                        autocomplete="off"
                                        value="<?php echo isset($message) ? $message->cencus_no : ''; ?>"
                                    />
                                    <div class="help-block"><?php echo form_error('cencus_no'); ?></div>
                                    </div>
                                                                                                                                   
                                    <div class="item form-group">
                                    <label for="pirivena_name">Pirivena Name</label>
                                    <input
                                        type="text"
                                        id="pirivena_name"
                                        name="school_name"
                                        class="form-control col-md-7 col-xs-12"
                                        placeholder="Enter Pirivena Name"
                                        autocomplete="off"
                                        value="<?php echo isset($message) ? $message->school_name : ''; ?>"
                                    />
                                    <div class="help-block"><?php echo form_error('school_name'); ?></div>
                                    </div>

                                    <!-- Hidden school_id field to submit the selected school -->
                                    <input type="hidden" id="school_id" name="school_id" value="<?php echo isset($message) ? $message->school_id : ''; ?>" />

                                    <!-- <div class="item form-group">
                                        <input class="form-control col-md-7 col-xs-12" name="cencus_no" id="cencus_no" onkeyup="get_school_by_cencus_number(this.value);" value="<?php if (isset($message)) {
                                                                                                                                                                                        echo $message->cencus_no;
                                                                                                                                                                                    } ?>" placeholder="<?php echo $this->lang->line('cencus_no'); ?> *" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('cencus_no'); ?></div>
                                    </div>
                                    <div class="item form-group">
                                        <select class="form-control col-md-12 col-xs-12" name="school_id" id="school_id" onchange="get_school_id(this.value);">
                                            <option value="">--<?php echo $this->lang->line('name_of_pirivena'); ?> *--</option>
                                            <?php if (isset($schools) && !empty($schools)) { ?>
                                                <?php foreach ($schools as $obj) { ?>

                                                    <option value="<?php echo $obj->id; ?>" <?php if (isset($message) && $message->school_id == $obj->id) {
                                                                                                echo 'selected="selected"';
                                                                                            } ?>><?php echo $obj->school_name; ?></option>

                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('school_id'); ?></div>
                                    </div> -->
                                    
                                    <div id="letter_from_piriven">

                                        <div class="item form-group">
                                            <select class="form-control col-md-12 col-xs-12" name="sender_role_id" id="sender_role_id" onchange="get_user_by_role(this.value, '','from');">
                                                <option value="">--<?php echo $this->lang->line('from_title'); ?> *--</option>
                                                <?php if (isset($roles) && !empty($roles)) { ?>
                                                    <?php foreach ($roles as $obj) { ?>

                                                        <?php if (!in_array($obj->slug, [
                                                            'super-admin',
                                                            'student',
                                                            'postman'
                                                        ])) : ?>
                                                            <option value="<?php echo $obj->id; ?>" <?php if (isset($message) && $message->sender_role_id == $obj->id) {
                                                                                                        echo 'selected="selected"';
                                                                                                    } ?>><?php echo $obj->name; ?></option>
                                                        <?php endif; ?>

                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('sender_role_id'); ?></div>
                                        </div>


                                        <div class="item form-group">
                                            <select class="form-control col-md-12 col-xs-12" name="sender_id" id="sender_id">
                                                <option value="">--<?php echo $this->lang->line('name_of_sender'); ?> *--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('sender_id'); ?></div>
                                        </div>
                                    </div>


                                                                      
                                    </div>                                                                    

                                                                                                        
                                    <div class="item form-group">
                                        <select class="form-control col-md-12 col-xs-12" name="receiver_role_id" id="receiver_role_id" required="required" onchange="get_user_by_role(this.value, '','to');">
                                            <option value="">--<?php echo $this->lang->line('section'); ?> *--</option>
                                            <?php if (isset($roles) && !empty($roles)) { ?>
                                                <?php foreach ($roles as $obj) { ?>

                                                    <?php if (!in_array($obj->slug, [
                                                        'super-admin',
                                                        'student',
                                                        'postman'
                                                    ])) : ?>
                                                        <option value="<?php echo $obj->id; ?>" <?php if (isset($message) && $message->receiver_role_id == $obj->id) {
                                                                                                    echo 'selected="selected"';
                                                                                                } ?>><?php echo $obj->name; ?></option>
                                                    <?php endif; ?>

                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('receiver_role_id'); ?></div>
                                    </div>
                                                                                                       

                                    <div class="item form-group">
                                        <select class="form-control col-md-12 col-xs-12" name="receiver_id" id="receiver_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('person'); ?> *--</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('receiver_id'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control col-md-7 col-xs-12" name="subject" id="subject" value="<?php if (isset($message)) {
                                                                                                                                echo $message->subject;
                                                                                                                            } ?>" placeholder="<?php echo $this->lang->line('heading'); ?> *" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('subject'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" id="body" required="required" placeholder="<?php echo $this->lang->line('note'); ?> *"><?php if (isset($message)) {
                                                                                                                                                                                echo $message->body;
                                                                                                                                                                            } ?></textarea>
                                        <div class="help-block"><?php echo form_error('body'); ?></div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="ln_solid"></div>
                                <div class="box-footer">
                                    <div class="pull-right">


                                        <button type="submit" name="draft" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('draft'); ?></button>
                                        <button type="submit" name="send" class="btn btn-primary"><i class="fa fa-envelope-o"></i> <?php echo $this->lang->line('post'); ?></button>
                                    </div>
                                    <?php if (isset($message)) {  ?>
                                        <input type="hidden" name="message_id" id="message_id" value="<?php echo $message->message_id; ?>" />
                                        <a class="btn btn-default" href="<?php echo site_url('postoffice/delete/' . $message->message_id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('discard'); ?></a>
                                    <?php } ?>
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
    get_school_id('');
    <?php if (isset($message)) { ?>
        <?php if ($message->letter_from_piriven == 1) { ?>
            get_user_by_role('<?php echo $message->receiver_role_id; ?>', '<?php echo $message->sender_id; ?>', 'from');
        <?php } ?>

        get_user_by_role('<?php echo $message->receiver_role_id; ?>', '<?php echo $message->receiver_id; ?>', 'to');
        //get_school_id('<?php echo $message->school_id; ?>')
        get_school_by_cencus_number('<?php echo $message->cencus_no; ?>');
        get_letter_from_piriven('<?php echo (bool)$message->letter_from_piriven; ?>')
    <?php } ?>

    /* REPLACE your existing get_letter_from_piriven() function with this */

function get_letter_from_piriven(cb) {
    if (cb) { 
        // --- If CHECKBOX is CHECKED (Letter is from Pirivena) ---
        
        $('#letter_not_from_piriven').hide();
        $('#sender_name').prop('required', false);

        $('#pirivena_fields_container').show();
        
    } else { 
        // --- If CHECKBOX is UNCHECKED (Letter is from a person) ---
        
        $('#letter_not_from_piriven').show();
        $('#sender_name').prop('required', true);

        $('#pirivena_fields_container').hide();

        // --- ADD THESE LINES TO CLEAR THE HIDDEN VALUES ---
        $('#cencus_number').val('');
        $('#pirivena_name').val('');
        $('#school_id').val('');
    }
}

    function get_school_id(school_id) {
        if (school_id == '') {
            $('#from_role_id').prop("disabled", true);
            //$('#receiver_role_id').prop("disabled", true);
        } else {
            $('#from_role_id').prop("disabled", false);
            //$('#receiver_role_id').prop("disabled", false);
        }
        get_user_by_role($('#sender_role_id').val(), '', 'from');
    }

    function get_user_by_role(role_id, user_id, type) {
        get_user(role_id, user_id, type);
    }

    /* REPLACE your existing get_user() function with this */

function get_user(role_id, user_id, type) {
    
    var school_id = ''; // Start with an empty school_id

    // IMPORTANT: Only use the selected school_id if we are getting the 'FROM' list.
    if (type == 'from') {
        school_id = $('#school_id').val();
    }
    
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('ajax/get_user_by_role'); ?>",
        data: {
            school_id: school_id, // This will be blank for the 'To' list, removing the filter
            role_id: role_id,
            class_id: '',
            user_id: user_id,
            message: true
        },
        async: false,
        success: function(response) {
            if (response) {
                if (type == 'from') {
                    $('#sender_id').html(response);
                }
                if (type == 'to') {
                    $('#receiver_id').html(response);
                }
            }
        }
    });
}

    function get_school_by_cencus_number(cencus_number) {
        var school_id = $('#school_id').val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_school_by_cencus_number'); ?>",
            data: {
                school_id: school_id,
                cencus_number: cencus_number
            },
            async: false,
            success: function(response) {
                if (response) {
                    $('#school_id').html(response);
                    get_user_by_role($('#sender_role_id').val(), '', 'from');
                    get_school_id($('#school_id').val());
                }
            }
        });
    }

    $("#compose").validate();
</script>

<!-- Hemal -->
<script>
  let typingTimer;
  const doneTypingInterval = 4000;

  function fetchPirivenaData(value) {
    if (!value) {
      // Clear all fields if input cleared
      $('#pirivena_name').val('');
      $('#cencus_number').val('');
      $('#school_id').val('');
      return;
    }

    $.ajax({
      url: '<?= base_url("postoffice/fetch_pirivena_data") ?>',
      type: 'POST',
      data: { value: value },
      dataType: 'json',
      success: function(res) {
        if (res) {
          $('#cencus_number').val(res.cencus_number);
          $('#pirivena_name').val(res.school_name);
          $('#school_id').val(res.id);
        } else {
          // Clear if no match
          $('#school_id').val('');
        }
      },
      error: function() {
        $('#school_id').val('');
      }
    });
  }

  function startTypingTimer(element) {
    clearTimeout(typingTimer);
    let val = $(element).val().trim();
    if (val.length >= 2) {
      typingTimer = setTimeout(() => fetchPirivenaData(val), doneTypingInterval);
    }
  }

  $('#cencus_number').on('keyup', function() {
    startTypingTimer(this);
  });

  $('#pirivena_name').on('keyup', function() {
    startTypingTimer(this);
  });

  // Optional: On page load, you can call fetchPirivenaData with existing value to sync fields
  $(document).ready(function() {
    const cencusVal = $('#cencus_number').val().trim();
    const pirivenaVal = $('#pirivena_name').val().trim();
    if (cencusVal.length >= 2) {
      fetchPirivenaData(cencusVal);
    } else if (pirivenaVal.length >= 2) {
      fetchPirivenaData(pirivenaVal);
    }
  });
</script>

<?php if ($this->session->flashdata('success')): ?>
<script>
  $(document).ready(function() {
    toastr.success("<?= addslashes($this->session->flashdata('success')) ?>");
  });
</script>
<?php endif; ?>
