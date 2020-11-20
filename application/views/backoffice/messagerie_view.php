<hr />
<div class="mail-env">

    <!-- Mail Body -->
    <div class="mail-body">
        <!-- message page body -->
        
        <?php include $message_inner_page_name.'.php'; ?>   
    </div>

    <div class="mail-sidebar" style="min-height: 800px;">  

        <!-- compose new email button -->
        <div class="mail-sidebar-row hidden-xs">
            <a href="<?php echo site_url('backoffice/messagerie/message_new'); ?>" class="btn btn-success btn-block">
                <i class="fa fa-pencil"></i>&nbsp;
                <?php echo get_phrase('new message'); ?>
            </a>
        </div>

        <!-- message user inbox list -->
        <ul class="mail-menu">
            <li> 
                <a href="#" style="padding:12px;">ouraga</a>
            </li>
            <li><a href="#" style="padding:12px;">luai</a></li>
            <li><a href="#" style="padding:12px;">aguisso</a></li>
        </ul>

    </div>
</div>