<!-- Content Header (Page header) -->     
<div class="content-header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-md-block d-none">
            <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
        </div>
        
    </div>
</div>
<div class="row">
	<div class="col-md-12">
	  <a href="" class="btn btn-success"><?=ucfirst(get_phrase('nouveau message'))?></a>
	</div>
</div><br>
<div class="row">
	<div class="col-lg-3 col-md-3">
		<div class="box">
			<br>
			<div class="box-body p-0">
			  <div id="chat-contact" class="media-list media-list-hover media-list-divided ">
				<div class="media media-single">
				  <a href="#" class="avatar avatar-lg status-success">
					<img src="<?=site_url('assets/member/')?>images/avatar/4.jpg" alt="...">
				  </a>

				  <div class="media-body">
					<h6><a href="#">Frank Camly</a></h6>
					<small class="text-danger">Busy</small>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
	<div class="col-lg-9 col-md-9">
		<div class="box direct-chat">
			<div class="box-header with-border">
			  <h4 class="box-title"><?=ucwords(get_phrase('chat message'))?></h4>
			</div><br>
			<img style="height: 122px; width: 122px; margin-left: 250px; " src="<?=site_url('assets/member/images/inbox.png')?>"><br>
			 <span style="margin-left: 240px; "><?=ucwords(get_phrase('select message to read'))?></span><br><br>
		</div>
	</div>				
</div>