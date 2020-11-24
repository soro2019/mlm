           
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
                <?php if($mescomptes!=0){ ?>
                <?php //var_dump($compactmatrice);die; ?>
                <h2><?=ucwords(get_phrase("mes comptes"))?></h2><br>

                <div class="row">
                    <!-- compte matrice -->
                    <div class="col-lg-4 col-4">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title text-center"><?=ucwords(get_phrase("compte matrice"))?></h3>
                            <h3 class="card-title text-center"><?php echo number_format(floatval(trim($compactmatrice['montant'])), 0, ' ', ' ');?> $</h3>
                            <br><hr><br>
                            <div class="mb-30 text-center">
                                <?php if(trim($compactmatrice['montant']) == 0){

                                        $lien = "onclick='retrun false'";
                                        $title = ucfirst(get_phrase("votre crédit ne vous permet pas d'effectuer cette opération"));
                                }else
                                {
                                    $lien = "onclick='retrun true'";
                                    $title = ucfirst(get_phrase("cette opération vous permet de retirer un montant sur votre compte"));
                                } ?>
                                <a href="#" data-backdrop="static" data-toggle="modal" data-target="#retrait-cmatrice" data-toggle="modal"title='<?=$title?>'>
                                  <button type="button" class="btn btn-primary mb-5"><?=ucfirst(get_phrase("retirer"))?></button>
                                </a>
                                <a  href="#" data-backdrop="static" data-toggle="modal" data-target="#transfert-cmatrice" data-toggle="modal">
                                    <button type="button" class="btn btn-primary mb-5"><?=ucfirst(get_phrase("transferer"))?></button>
                                </a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- compte bonus -->
                    <div class="col-lg-4 col-4">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title text-center"><?=ucwords(get_phrase("compte bonus"))?></h3>
                            <h3 class="card-title text-center"><?php echo number_format(floatval(trim($compactbonus['montant'])), 0, ' ', ' ');?> $</h3>
                            <br><hr><br>
                            <div class="mb-30 text-center">
                                <a href="#">
                                    <button type="button" class="btn btn-primary mb-5"><?=ucfirst(get_phrase("retirer"))?></button>
                                </a>
                                <a  href="#" data-backdrop="static" data-toggle="modal" data-target="#transfert-cbonus" data-toggle="modal">
                                    <button type="button" class="btn btn-primary mb-5"><?=ucfirst(get_phrase("transferer"))?></button>
                                </a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- compte investissement -->
                    <div class="col-lg-4 col-4">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title text-center"><?=ucwords(get_phrase("compte operations"))?></h3>
                            <h3 class="card-title text-center"><?php echo number_format(floatval(trim($compactinvest['montant'])), 0, ' ', ' ');?> $</h3>
                            <br><hr><br>
                            <div class="mb-30 text-center">
                                <a href="#">
                                    <button type="button" class="btn btn-primary mb-5"><?=ucfirst(get_phrase("approvisionner"))?></button>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-primary mb-5"><?=ucfirst(get_phrase("retirer"))?></button>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-primary mb-5"><?=ucfirst(get_phrase("transferer"))?></button>
                                </a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div><br>

               <?php } ?>
                <!-- mon profil -->
                <div class="col-lg-4 col-md-6 col-12">
					<div class="card">
					  <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
					  <div class="card-body">
						<h3 class="card-title text-center"><?=ucwords(get_phrase("mon profil"))?></h3>

						<p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"><?=ucfirst(get_phrase("pseudo"))?>:</span> <span><?=trim($membre['pseudo'])?></span>
						</p>
						<p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"><?=ucfirst(get_phrase("nom"))?>:</span> <span><?=trim($membre['first_name'])?></span>
						</p>
						<p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"> <?=ucfirst(get_phrase("prenom"))?>:</span> <span><?=trim($membre['last_name'])?></span>
                        </p>
                        <p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"> <?=ucfirst(get_phrase("email"))?>:</span> <span><?=trim($membre['email'])?></span>
                        </p>
                        <p class="card-text d-flex justify-content-between">
                            <span class="font-weight-600 text-info"> <?=ucfirst(get_phrase("ville"))?>:</span> <span><?=trim(ucfirst($membre['ville']));?></span>
                        </p>
                        <p class="card-text d-flex justify-content-between">
                            <span class="font-weight-600 text-info"> <?=ucfirst(get_phrase("pays"))?>:</span> <span><?php echo trim($this->Crud_model->selectPaysById($membre['pays']));?></span>
                        </p>
                        <p class="card-text d-flex justify-content-between">
                            <span class="font-weight-600 text-info"> <?=ucfirst(get_phrase("ville"))?>:</span> <span><?=trim(ucfirst($membre['region']));?></span>
                        </p>
                        <!-- <hr> --><!-- <br>
						<div class="mb-30 text-center">
							<a class="link list-icons" href="#">
								<i class="ti-alarm-clock"></i> 1 Year
							</a>
							<a class="link list-icons ml-10 mr-10" href="#">
								<i class="fa fa-heart-o"></i> 50
							</a>
							<a class="link list-icons ml-10 mr-10" href="#">
								<i class="fa fa-usd"></i> 100
							</a>
						</div> -->
					  </div>
					</div>
                </div>
                <!-- mon niveau -->
                <div class="col-lg-4 col-md-6 col-12">
					<div class="card">
					  <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
						<div class="card-body">
							<h3 class="card-title text-center"><?=ucwords(get_phrase("mon niveau"))?></h3>
							
							<h3 class="card-title text-center"><?=ucfirst(get_phrase('matrice'))?> <?=trim(ucfirst($membre['niveau']));?></h3>
							<h3 class="card-title text-center"><?=$nbfilleulByMatrice?>/6</h3>
						</div>
					</div>
                </div>
                <!-- derniers partenaires -->
                <div class="col-lg-4 col-md-6 col-12">
					<div class="card">
					  <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
						<div class="card-body">
							<h3 class="card-title text-center"><?=ucfirst(get_phrase("derniers partenaires ajoutés"))?></h3>
							<hr><br>
                            <?php if(!is_bool($mesFieulles) && is_array($mesFieulles)){ ?>
                            <?php foreach ($mesFieulles as $elmt) { ?>
							<div class="row">
								<div class="col-lg-12"><?=ucfirst(get_phrase("pseudo"))?>: <?=trim($elmt['pseudo'])?></div>
								<div class="col-lg-12"><?=ucfirst(get_phrase("date d'ajout"))?>: <?=date('d/m/Y à H:i:s',trim($elmt['created_on']))?></div>
								<div class="col-lg-12">
                                 <a href="#" data-backdrop="static" data-toggle="modal" class="btn btn-primary" data-target="#userinfo" data-toggle="modal" onclick="infouser(<?=trim($elmt['id'])?>)">
                                   <?=get_phrase("voir")?>+
                                 </a>
                                </div>
							</div><hr>
                            <?php } ?>
							<?php } ?>
						</div>
					</div>
				</div><hr><br>         
                <?php if($actualites!=0){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2><?=ucfirst(get_phrase("actualités"))?></h2>
                    </div>
                </div><br>
                <div class="row">
                <?php foreach ($actualites as $actualite) { 

                    $lien_img = 'assets/member/images/card/img1.jpg';
                    if(!empty(trim($actualite['img_article'])))
                    {
                        $lien_img = 'assets/images/actualites/'.trim($actualite['img_article']);
                    }
                ?>
                   <div class="col-4">
                        <div class="news-slider">
                            <div class="box">
                                <img class="card-img-top img-responsive" src="<?=site_url($lien_img)?>" alt="<?=trim($actualite['titre_article'])?>">
                                <div class="box-body"> 
                                    <div class="text-center">
                                        <h4 class="box-title"><?=strtoupper(trim($actualite['titre_article']))?></h4>
                                        <p class="box-text"><?php if(strlen($actualite['description_article']) > 100){ echo substr($actualite['description_article'],0,  100).'...';}else{ echo $actualite['description_article'];} ?></p>
                                        <a href="<?php echo site_url(trim($this->session->userdata('language')).'/actu/'.$actualite['id']);?>" class="btn btn-primary btn-sm"><?php echo ucfirst(get_phrase('read more')); ?></a>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                   </div>
                <?php } ?>
                </div><br>
                <?php } ?>

                <?php if($webinaires!=0){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2><?=ucfirst(get_phrase("webinaires en ligne"))?></h2>
                    </div>
                </div><br>
                <div class="row">
                <?php foreach ($webinaires as $webinaire) { 

                    $lien_img = 'assets/member/images/card/img1.jpg';
                    if(!empty(trim($webinaire['img_article'])))
                    {
                        $lien_img = 'assets/images/webinaires/'.trim($webinaire['img_article']);
                    }
                ?>
                   <div class="col-4">
                        <div class="news-slider">
                            <div class="box">
                                <img class="card-img-top img-responsive" src="<?=site_url($lien_img)?>" alt="<?=trim($webinaire['titre_article'])?>">
                                <div class="box-body"> 
                                    <div class="text-center">
                                        <h4 class="box-title"><?=strtoupper(trim($webinaire['titre_article']))?></h4>
                                        <p class="box-text"><?php if(strlen($webinaire['description_article']) > 100){ echo substr($webinaire['description_article'],0,  100).'...';}else{ echo $webinaire['description_article'];} ?></p>
                                        <a href="<?php echo site_url(trim($this->session->userdata('language')).'/webin/'.$webinaire['id']);?>" class="btn btn-primary btn-sm"><?php echo ucfirst(get_phrase('read more')); ?></a>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                   </div>
                <?php } ?>
                </div><br>
                <?php } ?>
                
                <?php if($conferneces!=0){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2><?=ucfirst(get_phrase("conférence"))?></h2>
                    </div>
                </div><br>
                <div class="row">
                <?php foreach ($conferneces as $confernece) { 

                    $lien_img = 'assets/member/images/card/img1.jpg';
                    if(!empty(trim($confernece['img_article'])))
                    {
                        $lien_img = 'assets/images/conferneces/'.trim($confernece['img_article']);
                    }
                ?>
                   <div class="col-4">
                        <div class="news-slider">
                            <div class="box">
                                <img class="card-img-top img-responsive" src="<?=site_url($lien_img)?>" alt="<?=trim($confernece['titre_article'])?>">
                                <div class="box-body"> 
                                    <div class="text-center">
                                        <h4 class="box-title"><?=strtoupper(trim($confernece['titre_article']))?></h4>
                                        <p class="box-text"><?php if(strlen($confernece['description_article']) > 100){ echo substr($confernece['description_article'],0,  100).'...';}else{ echo $confernece['description_article'];} ?></p>
                                        <a href="<?php echo site_url(trim($this->session->userdata('language')).'/conf/'.$confernece['id']);?>" class="btn btn-primary btn-sm"><?php echo ucfirst(get_phrase('read more')); ?></a>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                   </div>
                <?php } ?>
                </div><br>
                <?php } ?>
                <div class="col-md-12 col-12">
                    <div class="box box-solid bg-primary">
                        <div class="box-header" style="background-color: #f25e24!important;border-color:#f25e24!important">
                            <h4 class="box-title"><strong><?php echo ucfirst(get_phrase('mon lien de parrainage')); ?></strong></h4>
                        </div>
                        <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="input-group">
                                            <input id="to-copy" type="text" class="form-control" value="<?php echo site_url(trim($_SESSION['language']).'/registration/');?><?php echo $membre['pseudo']; ?>" readonly="readonly">
                                            <span class="input-group-btn">
                                                <button id="copy" class="btn btn-default" type="button">
                                                  <?php echo get_phrase('copier'); ?>  
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        


        <div class="modal fade" id="transfert-cmatrice">
          <div class="modal-dialog" role="document">
            <form action="" method="POST">
               <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?=ucfirst(get_phrase('transfert du compte matrice vers le compte d\'opération'))?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
                    <div class="modal-body">
                           <div class="row">
                             <div class="col-md-12">
                                <label style="color: red;"><b><?=ucfirst(get_phrase('attention : cette action est irreversible !!!'))?></b></label>  
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                                <label><b><?=ucfirst(get_phrase('montant a transferé'))?></b></label>
                                <input type="number" min="1" step="0.1" required name="montant" class="form-control" placeholder="<?=ucfirst(get_phrase('montant a transferé'))?>" value="">
                                <input type="hidden" name="c-matrice" value="1">
                             </div>
                             <div class="col-md-6">
                                <label><b><?=ucfirst(get_phrase('code pin du compte'))?></b></label>
                                <input type="number" required name="codepin" class="form-control" placeholder="<?=ucfirst(get_phrase('votre code pin'))?>" value="">
                             </div>
                           </div><br>
                    </div>
                  <div class="modal-footer">
                    <button type="button" style="float: right;" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
                    <button type="submit" style="float: right; margin-right: 10px;" class="btn btn-primary"><?=ucfirst(get_phrase('faire le transfert'))?></button>
                  </div>
               </div>
            </form>
          </div>
        </div>


        <div class="modal fade" id="retrait-cmatrice">
          <div class="modal-dialog" role="document">
            <form action="" method="POST">
               <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?=ucfirst(get_phrase('demande de retrait sur le compte matrice'))?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
                    <div class="modal-body">
                           <div class="row">
                             <div class="col-md-12">
                                <label style="color: red;"><b><?=ucfirst(get_phrase('attention : cette action est soumise à validation (max : 24h) !!!'))?></b></label>  
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                                <label><b><?=ucfirst(get_phrase('montant a retiré'))?></b></label>
                                <input type="number" min="1" step="0.1" required name="montant" class="form-control" placeholder="<?=ucfirst(get_phrase('montant a retiré'))?>" value="">
                                <input type="hidden" name="c-matrice" value="1">
                             </div>
                             <div class="col-md-6">
                                <label><b><?=ucfirst(get_phrase('code pin du compte'))?></b></label>
                                <input type="number" required name="codepin" class="form-control" placeholder="<?=ucfirst(get_phrase('votre code pin'))?>" value="">
                             </div>
                           </div><br>
                    </div>
                  <div class="modal-footer">
                    <button type="button" style="float: right;" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
                    <button type="submit" style="float: right; margin-right: 10px;" class="btn btn-primary"><?=ucfirst(get_phrase('envoyer la demande'))?></button>
                  </div>
               </div>
            </form>
          </div>
        </div>

        <div class="modal fade" id="transfert-cbonus">
          <div class="modal-dialog">
            <form action="" method="POST">
               <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?=ucfirst(get_phrase('transfert du compte bonus vers le compte d\'opération'))?></h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                           <div class="row">
                             <div class="col-md-12">
                                <label style="color: red;"><b><?=ucfirst(get_phrase('attention : cette action est irreversible !!!'))?></b></label>  
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                                <label><b><?=ucfirst(get_phrase('montant a transferé'))?></b></label>
                                <input type="number" min="1" step="0.1" required name="montant" class="form-control" placeholder="<?=ucfirst(get_phrase('montant a transferé'))?>" value="">
                                <input type="hidden" name="c-bonus" value="1">
                             </div>
                             <div class="col-md-6">
                                <label><b><?=ucfirst(get_phrase('code pin du compte'))?></b></label>
                                <input type="number" required name="codepin" class="form-control" placeholder="<?=ucfirst(get_phrase('votre code pin'))?>" value="">
                             </div>
                           </div>
                    </div>
                  <div class="modal-footer modal-footer-uniform">
                    <button type="button" style="float: right;" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
                    <button type="submit" style="float: right; margin-right: 10px;" class="btn btn-primary"><?=ucfirst(get_phrase('faire le transfert'))?></button>
                  </div>
               </div>
            </form>
          </div>
        </div>


        <div class="modal fade" id="approvisionner-cop">
          <div class="modal-dialog">
            <form action="" method="POST">
               <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><?=ucfirst(get_phrase('transfert du compte bonus vers le compte d\'opération'))?></h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                           <div class="row">
                             <div class="col-md-12">
                                <label style="color: red;"><b><?=ucfirst(get_phrase('attention : cette action est irreversible !!!'))?></b></label>  
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                                <label><b><?=ucfirst(get_phrase('montant a transferé'))?></b></label>
                                <input type="number" min="1" step="0.1" required name="montant" class="form-control" value="">
                                <input type="hidden" name="c-bonus" value="1">
                             </div>
                           </div>
                    </div>
                  <div class="modal-footer modal-footer-uniform">
                    <button type="button" style="float: right;" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
                    <button type="submit" style="float: right; margin-right: 10px;" class="btn btn-primary"><?=ucfirst(get_phrase('faire le transfert'))?></button>
                  </div>
               </div>
            </form>
          </div>
        </div>                          
     
     
        
            