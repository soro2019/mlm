<style type="text/css">
	 h6{font-size: 10px !important;}
</style>

<div class="content-header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-md-block d-none">
            <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
        </div>
        
    </div>
</div><br>
<div class="row">
    <!-- compte matrice -->
    <div class="col-lg-6 col-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center"><?=ucwords(get_phrase("lien de parrainage"))?></h3>
             <div class="input-group">
                <input id="to-copy" type="text" class="form-control" value="<?php echo site_url(trim($_SESSION['language']).'/registration/');?><?php echo $pseudo; ?>" readonly="readonly">
                <span class="input-group-btn">
                    <button id="copy" class="btn btn-default" type="button">
                      <?php echo get_phrase('copier'); ?>  
                    </button>
                </span>
             </div>
            <br><br>
          </div>
        </div>
    </div>
    <!-- compte bonus -->
    <div class="col-lg-6 col-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center"><?=ucwords(get_phrase("mon parrain direct"))?></h3>
            <h3 class="card-title text-center">
             <?=ucfirst(get_phrase("pseudo"))?>	: <span style="color: orange;"><?=$membre['pseudo_parrain']?></span>
            </h3>
            <a href="#" data-backdrop="static" data-toggle="modal" class="btn btn-primary" data-target="#userinfo" data-toggle="modal">
             <?=ucfirst(get_phrase("détails"))?>
            </a>
            <br>
          </div>
        </div>
    </div>
</div><br>
<div class="row">
	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-info pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("ceux qui ont accédé au lien de parrainage"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?=$membre['nbperson_accede_lien']?></span>
			<span class="font-size-30 text-info mdi mdi-city"></span>
		  </div>
		</div>
	</div>				
	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-primary pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("total inscrits"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?=$membre['nbperson_inscrit_via_lien']?></span>
			<span class="font-size-30 text-primary mdi mdi-seal"></span>
		  </div>
		</div><br>
	</div>				
	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-danger pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("ceux ayant acheté"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?=$this->UserModel->nbFilleulsAchat($membre['pseudo'])?></span>
			<span class="font-size-30 text-danger mdi mdi-city"></span>
		  </div>
		</div><br>
	</div>

	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-warning pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("ceux n'ayant pas acheté"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?php echo ($membre['nbperson_inscrit_via_lien'] - $this->UserModel->nbFilleulsAchat($membre['pseudo'])); ?></span>
			<span class="font-size-30 text-warning mdi mdi-home"></span>
		  </div>
		</div>
	</div>
</div>
<br>
<div class="col-xl-12 col-12">
  <div class="box">
	<div class="box-header with-border">
	  <h4 class="box-title"><?php echo ucfirst(get_phrase('mon réreau')); ?></h4>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			
			<li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab" aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>

			<li class="nav-item"> <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Profile</span></a></li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="hidden-sm-up"><i class="ion-email"></i></span> <span class="hidden-xs-down">Dropdown</span>
				</a>
				<div class="dropdown-menu"> <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" role="tab" data-toggle="tab" aria-controls="dropdown1">@fat</a> <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2">@mdo</a> </div>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content tabcontent-border p-15" id="myTabContent">
			<div role="tabpanel" class="tab-pane fade show active" id="home5" aria-labelledby="home-tab">
				<p> <div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Property Overview</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table product-overview">
									<thead>
										<tr>
											<th>Customer</th>
											<th>Order ID</th>
											<th>Property</th>
											<th>Type</th>
											<th>Date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Minol Jov</td>
											<td>#8457125</td>
											<td>Shop</td>
											<td>Sold</td>
											<td>10-7-2019</td>
											<td> <span class="label label-success">Paid</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
										<tr>
											<td>Adem Kalp</td>
											<td>#96523154</td>
											<td>Shop</td>
											<td>On Rent</td>
											<td>09-7-2019</td>
											<td> <span class="label label-warning">Pending</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
										<tr>
											<td>Mical Don</td>
											<td>#95487512</td>
											<td>Dupelx</td>
											<td>On Rent</td>
											<td>08-7-2019</td>
											<td> <span class="label label-success">Paid</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
										<tr>
											<td>Johen Doe</td>
											<td>#75485426</td>
											<td>Shop</td>
											<td>Sold</td>
											<td>02-7-2019</td>
											<td> <span class="label label-danger">Failed</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
										<tr>
											<td>Minol Jov</td>
											<td>#8457125</td>
											<td>Shop</td>
											<td>Sold</td>
											<td>10-7-2019</td>
											<td> <span class="label label-success">Paid</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
										<tr>
											<td>Adem Kalp</td>
											<td>#96523154</td>
											<td>Shop</td>
											<td>On Rent</td>
											<td>09-7-2019</td>
											<td> <span class="label label-warning">Pending</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
										<tr>
											<td>Mical Don</td>
											<td>#95487512</td>
											<td>Dupelx</td>
											<td>On Rent</td>
											<td>08-7-2019</td>
											<td> <span class="label label-success">Paid</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
										<tr>
											<td>Johen Doe</td>
											<td>#75485426</td>
											<td>Shop</td>
											<td>Sold</td>
											<td>02-7-2019</td>
											<td> <span class="label label-danger">Failed</span> </td>
											<td><a href="javascript:void(0)" class="text-dark pr-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-dark" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div></p>
			</div>
			<div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab">
				<p>Fusce porta eros a nisl varius, non molestie metus mollis. Pellentesque tincidunt ante sit amet ornare lacinia. Duis vitae feugiat purus. Nulla facilisi. Ut vitae euismod lorem. Donec sed pellentesque mi. Nullam quam urna, tincidunt eu metus sed, pretium luctus tellus. Integer viverra turpis urna, ut facilisis nulla luctus vitae. Maecenas blandit turpis pretium sollicitudin facilisis. Nam vitae aliquet massa, vel posuere tortor.</p>
			</div>
			<div class="tab-pane fade" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab">
				<p>Donec vitae laoreet neque, id convallis ante. Phasellus a tellus molestie, varius massa in, suscipit diam. Nulla vulputate, nisi eget porttitor semper, quam justo volutpat lacus, in pretium augue tortor at leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl fringilla, malesuada quam eu, eleifend odio. Nulla nunc orci, aliquam quis ligula vel, porttitor tempus nibh. Praesent semper fermentum massa. Proin id maximus metus, vitae ultricies ante. Duis tempus, arcu a vulputate congue, purus ex rutrum elit, at imperdiet nisi nibh at purus. Nunc in fringilla erat.</p>
			</div>
			<div class="tab-pane fade" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab">
				<p>Morbi ac mi vel tellus condimentum semper. In nec finibus erat. Sed ultrices ligula mi, a euismod metus egestas in. Nulla imperdiet neque at massa fringilla dignissim a id orci. Nam faucibus, ipsum interdum bibendum rutrum, libero odio vestibulum purus, non sollicitudin risus nunc et odio. Vestibulum volutpat, ante sit amet dignissim imperdiet, diam diam sodales orci, in gravida lorem erat eu diam. Nulla lorem nunc, ultrices ac dignissim et, dignissim nec lacus. Praesent euismod lorem eget justo lacinia rutrum sed at mi. Fusce commodo eros a vulputate accumsan.</p>
			</div>
		</div>
	</div>
	<!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>			  <!-- /.box -->
<br><br>

 <div class="modal center-modal fade" id="userinfo" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?=ucfirst(get_phrase('information sur mon parrain'))?></h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
               <div class="col-sm-5"><?=ucfirst(get_phrase('pseudo'))?> : <b><?=trim($membre['pseudo'])?></b>                         
               </div>
               <div class="col-sm-7"><?=ucfirst(get_phrase("date d'ajout"))?> : <b><?=date('d/m/Y à H:i:s',trim($membre['created_on']))?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-7"><?=ucfirst(get_phrase('email'))?> : <b><?=trim($membre['email'])?></b>                         
               </div>
               <div class="col-sm-5"><?=ucfirst(get_phrase("phone"))?> : <b><?=trim($membre['phone'])?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-5"><?=ucfirst(get_phrase('nom'))?> : <b><?=trim($membre['first_name'])?></b>                         
               </div>
               <div class="col-sm-7"><?=ucfirst(get_phrase("prenoms"))?> : <b><?=trim($membre['last_name'])?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-6"><?=ucfirst(get_phrase('date naissance'))?> : <b><?=trim(formtageDate22($membre['date_naissance']))?></b>                         
               </div>
               <div class="col-sm-6"><?=ucfirst(get_phrase("lieu naissance"))?> : <b><?=trim($membre['Lieu_naissance'])?></b>                       
               </div>
            </div><br>
            <div class="row">
            	<?php if($membre['genre'] == 'H'){
            		   $genre = 'Homme';
            	  }elseif($membre['genre'] == 'F'){ $genre = 'Femme'; }else{$genre = "";}?>
               <div class="col-sm-5"><?=ucfirst(get_phrase('genre'))?> : <b><?=$genre?></b>                         
               </div>
               <div class="col-sm-7"><?=ucfirst(get_phrase("ville"))?> : <b><?=trim($membre['ville'])?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-6"><?=ucfirst(get_phrase('region'))?> : <b><?=trim(ucfirst($membre['region']))?></b>                        
               </div>
               <div class="col-sm-6"><?=ucfirst(get_phrase('code postal'))?> : <b><?=trim($membre['code_postal'])?></b>                        
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-12"><?=ucfirst(get_phrase('pays'))?> : <b><?=trim($this->Crud_model->selectPaysById($membre['pays']))?></b>                        
               </div>
            </div><br>
          </div>
          <div class="modal-footer modal-footer-uniform">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
          </div>
        </div>
      </div>
</div>   