  <style type="text/css">
  	.btn-default:hover, .btn-default:active, .btn-default:focus, .btn-default.active {
    background-color: #cccccc !important; 
    border-color: #cccccc !important;
    color: #2f363c;
  }
  </style>

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
                <!-- lien pour completer ses donnees -->
                <?php if(empty($membre['first_name']) || empty($membre['last_name']) || empty($membre['genre']) || empty($membre['Lieu_naissance']) || empty($membre['date_naissance']) || empty($membre['pays']) || empty($membre['phone']) || empty($membre['ville']) || empty($membre['region']) /*|| empty($membre['code_postal'])*/){ ?>
                    <div class="col-xl-12 col-12">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                    <h4>
                                    <i class="icon fa fa-check"></i><?=get_phrase('Information')?>
                                    </h4>
                                    <a href="<?=site_url(trim($_SESSION['language']).'/backoffice/my-info')?>" style="text-decoration: none;"><?=ucfirst(get_phrase('pour bénéficier entièrement des avantages du réseau merci de compléter vos informations'));?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-12 col-12">
                    <div class="box box-solid bg-primary">
                        <div class="box-header" style="background-color: #f25e24!important;border-color:#f25e24!important">
                            <h4 class="box-title"><strong><?php echo ucfirst(get_phrase('les membres de ma matrice')).' '.$nieme; ?></strong></h4>
                        </div>
                        <div class="box-body">

                        	<div class="col-12">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title"><?php echo ucfirst(get_phrase('matrice')).' '.$nieme; ?></h4>
				</div>
				<!-- /.box-header -->
				<?php //var_dump($r);die; ?>
				<div class="box-body no-padding">
					<div class="table-responsive">
					  <table class="table table-hover">
						<tr>
						  <th>N<sup>o</sup></th>
						  <th><?php echo ucfirst(get_phrase('pseudo')); ?></th>
						  <th><?php echo ucfirst(get_phrase('nom')); ?> <?php echo ucfirst(get_phrase('prénoms')); ?></th>
						  <th><?php echo ucfirst(get_phrase("achat initial")); ?></th>
						  <th><?php echo ucfirst(get_phrase("date d'entrer")); ?></th>
						  <th><?php echo ucfirst(get_phrase("actions")); ?></th>
						</tr>
						<?php if(!empty($r)){ for ($i=0; $i < count($r) ; $i++) {
							  $pseudo = $r[$i];
					          if(stristr($pseudo, 'clone')==TRUE)
					          {
					            $pseudo = trim(explode('_', $pseudo)[1]);
					          }
						 $user = $this->UserModel->GetUserDataByPseudo($pseudo);

						 $achat_ini = '<span class="badge badge-pill badge-danger">'.ucfirst(get_phrase('non')).'</span>';

						 if($user['achat_ini'] == 1)
						 {
						  $achat_ini = '<span class="badge badge-pill badge-success">'.ucfirst(get_phrase('oui')).'</span>';
						 }
						?>
						<tr>
						  <td><?=($i+1)?></td>
						  <td><?=$r[$i]?></td>
						  <td><?=ucwords($user['first_name'])?> <?=ucfirst($user['last_name'])?></td>
						  <td><?=$achat_ini?></td>
						  <td><span class="text-muted"><i class="fa fa-clock-o"></i> <?=date('M d, Y', $user['created_on'])?></span> </td>
						  <td>
						  	<div class="btn-group mb-5">
							  <button style="height: 30px; font-size: 10px;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?=ucfirst(get_phrase('actions'))?></button>
							  <div class="dropdown-menu">
							  	<a href="#" data-backdrop="static" data-toggle="modal" class="dropdown-item" data-target="#userinfo" data-toggle="modal" onclick="infouser(<?=trim($user['id'])?>)">
					             <?=ucfirst(get_phrase('information mon filleule'))?>
					            </a>
							  	<a href="#" data-backdrop="static" data-toggle="modal" class="dropdown-item" data-target="#reseauinfo" data-toggle="modal" onclick="reseauinfo(<?=trim($user['id'])?>, <?=trim($nieme)?>)">
					             <?=ucfirst(get_phrase('information sur son réseau'))?>
					            </a>
							  </div>
							</div>
						  </td>
						</tr>
					    <?php } }else{ ?>
					    	<tr>
					    		<td colspan="6">
					    			<?php echo ucfirst(get_phrase('vous n\'avez pas encore de filleule dans cette matrice')); ?>
					    		</td>
					    	</tr>
					    <?php } ?>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>

                        </div>
                    </div>
                </div>
            </div>