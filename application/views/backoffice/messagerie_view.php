  <!-- Content Header (Page header) -->     
  <div class="content-header">
      <div class="d-flex align-items-center justify-content-between">
          <div class="d-md-block d-none">
              <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
          </div>
          
      </div>
  </div>

   <?php
     if($this->session->flashdata('message_erreur') !== null){
         echo '<div class="alert alert-danger" role="alert">'.ucfirst(get_phrase('erreur:')).' '.$this->session->flashdata('message_erreur').'</div>';
     }elseif(validation_errors() !== ''){
         echo '<div class="alert alert-danger" role="alert">Erreur: ' .validation_errors().'</div>';
     }elseif($this->session->flashdata('message_success') !== null){
      echo '<div class="alert alert-success" role="alert">'.ucfirst(get_phrase('succes:')).' '.$this->session->flashdata('message_success').'</div>';
     }
   ?>

<div class="row">
  <div class="col-lg-3 col-12">
    <a href="<?php echo site_url('backoffice/messagerie/message_new'); ?>" class="btn btn-danger btn-block mb-30">
        <i class="fa fa-pencil"></i>&nbsp;
        <?php echo get_phrase('new message'); ?>
    </a>
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title"><?=ucfirst(get_phrase('mes contacts'))?></h4>
        <ul class="box-controls pull-right">
          <li><a class="box-btn-slide" href="#"></a></li> 
        </ul>
      </div>
      <div class="box-body no-padding mailbox-nav">
        <ul class="nav nav-pills flex-column">
          <?php 
            $current_user = $this->session->userdata('identity');
            $this->db->where('sender', $current_user);
            $this->db->or_where('reciever', $current_user);
            $message_threads = $this->db->get('message_thread')->result_array();
            foreach ($message_threads as $row):
              // defining the user to show
                if ($row['sender'] == $current_user)
                    $user_to_show_id = $row['reciever'];
                if ($row['reciever'] == $current_user)
                    $user_to_show_id = $row['sender'];
                $unread_message_number = $this->Crud_model->count_unread_message_of_thread($row['message_thread_code']);
          ?>
          <li class="nav-item"><a style="font-size: 18px; font-weight: bold;" class="nav-link <?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code']) echo 'active'; ?>" href="<?php echo site_url('backoffice/messagerie/message_read/'.$row['message_thread_code']); ?>"><i class="ion ion-ios-email-outline"></i> <?php echo $user_to_show_id;?>
            <?php if ($unread_message_number > 0): ?>
             <span class="label label-success pull-right"><?php echo $unread_message_number; ?></span><?php endif; ?>
            </a>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <!-- /.col -->
  <div class="col-lg-9 col-12">
    <div class="box">
      <?php include $message_inner_page_name.'.php'; ?>
    </div>
  </div>
</div>
       