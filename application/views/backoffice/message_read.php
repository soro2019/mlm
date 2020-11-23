<div class="box-header with-border">
  <h4 class="box-title"><?=ucfirst(get_phrase('read message'))?></h4>
</div>
<?php
              $this->db->order_by('date_sende', 'ASC');
  $messages = $this->db->get_where('message', array('message_thread_code' => $current_message_thread_code))->result_array();
  /*foreach ($messages as $row):
        $sender_pseudo = $row['sender'];*/
?>
<div class="box direct-chat">
 <div class="box-body">
  <!-- Conversations are loaded here -->
  <div id="chat-app" class="direct-chat-messages chat-app">
	<!-- Message. Default to the left -->
	<?php foreach ($messages as $row):
        $sender_pseudo = $row['sender'];  ?>
	<div class="direct-chat-msg mb-30">
	  <div class="clearfix mb-15">
		<span class="direct-chat-name" style="color: blue; font-size: 18px; font-weight: bold;"><?=$row['sender'];?></span>
		<span class="direct-chat-timestamp pull-right"><?=date('d/m/Y', $row['date_sende']);?></span>
	  </div>
	  <!-- /.direct-chat-info -->
	  <img class="direct-chat-img avatar" src="<?=site_url('assets/member/images/user1-128x128.jpg')?>" alt="message user image">
	  <!-- /.direct-chat-img -->
	  <div class="direct-chat-text">
		<?php echo $row['message']; ?>
		<p class="direct-chat-timestamp"><time datetime="2018"><?=date('H:i', $row['date_sende']);?></time></p>
	  </div>
	  <!-- /.direct-chat-text -->
	</div>
	<?php endforeach; ?>
  </div>
  <!--/.direct-chat-messages-->
 </div>
 <div class="box-footer">
	  <form action="<?=site_url('backoffice/messagerie/send_reply/'. $current_message_thread_code)?>" enctype = 'multipart/form-data' method="POST" >
		<div class="input-group">
		  <input type="text" required name="message" placeholder="<?=ucfirst(get_phrase('write your message'))?>" class="form-control">
			  <div class="input-group-addon">
				<div class="align-self-end gap-items">
				  <span class="publisher-btn file-group">
					<i class="fa fa-paperclip file-browser"></i>
					<input type="file" name="file">
				  </span>
				  <button type="submit" class="publisher-btn"><i class="fa fa-paper-plane"></i></button>
				</div>
			  </div>
		</div>
	  </form>
 </div>

</div>