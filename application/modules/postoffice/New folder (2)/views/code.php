<?php
$composeAttributes = array('name' => 'compose', 'id' => 'compose', 'class'=>'form-horizontal form-label-left');
$formAction = !$message->is_trash || !$message->is_draft ? 'reply' : 'forward';
?>

<?php echo form_open_multipart(site_url('postoffice/'.$formAction.'/'.$message->message_id), $composeAttributes); ?>

    <?php if($formAction == 'reply'): ?>


     <?php else: ($formAction == 'forward'): ?>

      <?php elseif: ?>

      <button type="submit" class="btn btn-default" onclick="handleForm('reply')">
           <i class="fa fa-reply"></i> <?php echo $this->lang->line('reply'); ?>
       </button>

       <button type="button" class="btn btn-default" onclick="handleForm('forward')">
            <i class="fa fa-reply"></i> <?php echo $this->lang->line('forward'); ?>
        </button>

      <?php echo form_close(); ?>

      <!-- ========================================= -->
      <?php
// Assuming you have a variable $message_type to determine the action type (reply or forward)

// Determine the action URL based on the $message_type
if ($message_type == 'reply') {
    $action_url = site_url('postoffice/reply/'.$message->message_id);
} elseif ($message_type == 'forward') {
    $action_url = site_url('postoffice/forward/'.$message->message_id);
} else {
    // Handle other cases or set a default action URL
    $action_url = site_url('default/action');
}

// Output the form with the determined action URL
echo form_open_multipart($action_url, array('name' => 'compose', 'id' => 'compose', 'class' => 'form-horizontal form-label-left'), '');
?>

<!-- Your form elements go here -->

<!-- Add a hidden input field to store the message type -->
<input type="hidden" name="message_type" value="<?php echo $message_type; ?>">

<!-- Your form submit buttons -->
<button type="submit" name="submit_action" value="reply">Reply</button>
<button type="submit" name="submit_action" value="forward">Forward</button>

<?php echo form_close(); ?>

<!-- ============================================================================ -->
<?php
$composeAttributes = array('name' => 'compose', 'id' => 'compose', 'class'=>'form-horizontal form-label-left');
$formAction = !$message->is_trash || !$message->is_draft ? 'reply' : 'forward';
?>

<?php echo form_open_multipart(site_url('postoffice/'.$formAction.'/'.$message->message_id), $composeAttributes); ?>

    <?php if($formAction == 'reply'): ?>
        <button type="button" class="btn btn-default" onclick="handleForm('reply')">
            <i class="fa fa-reply"></i> <?php echo $this->lang->line('reply'); ?>
        </button>
    <?php else: ?>
        <button type="button" class="btn btn-default" onclick="handleForm('forward')">
            <i class="fa fa-share"></i> <?php echo $this->lang->line('forward'); ?>
        </button>
    <?php endif; ?>

<?php echo form_close(); ?>

<script>
function handleForm(action) {
    let textareaId = (action === 'reply') ? 'body' : 'body2';
    let textarea = document.getElementById(textareaId);
    textarea.style.display = "block";
}
</script>
