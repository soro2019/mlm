<?php
    //$student_list = $this->user_model->get_user()->result_array();
?>
<div class="mail-header" style="padding-bottom: 27px ;">
    <!-- title -->
    <h4 class="mail-title">
        <?php echo get_phrase('write new message'); ?>
    </h4>
</div>

<div class="mail-compose">

    <?php echo form_open(site_url('backoffice/messagerie/#'), array(
            'class' => 'form-groups form-horizontal', 'enctype' => 'multipart/form-data')); ?>


    <div class="form-group">
        <label for="subject"><?php echo get_phrase('recipient'); ?>:</label>
        <br><br>
        <select class="form-control select2" name="reciever" required>

            <option value=""><?php echo get_phrase('select a user'); ?></option>
            <option value="#">ouraga</option>
            <option value="#">luai</option>
            <option value="#">aguisso</option>
        </select>
    </div>


    <div class="compose-message-editor">
        <textarea rows="5" class="form-control wysihtml5" data-stylesheet-url="<?php echo base_url('assets/member/css/wysihtml5-color.css');?>"
            name="message" placeholder="<?php echo get_phrase('write your message'); ?>"
            id="sample_wysiwyg" required></textarea>
    </div>

    <hr>

    <button type="submit" class="btn btn-success pull-right">
        <i class="fa fa-share"></i> &nbsp;<?php echo get_phrase('send message'); ?>
    </button>
</form>

</div>
