            <style type="text/css">
                .theme-purple a:hover, .theme-purple a:active, .theme-purple a:focus {
                    color: white !important;
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
            
            <div class="row">
                <!-- lien pour completer ses donnees -->
                <?php if(empty($membre['first_name']) || empty($membre['last_name']) || empty($membre['genre']) || empty($membre['Lieu_naissance']) || empty($membre['date_naissance']) || empty($membre['pays']) || empty($membre['phone']) || empty($membre['ville']) || empty($membre['region']) || empty($membre['code_postal'])){ ?>
                   <div class="col-xl-12 col-12">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>
                                    <i class="icon fa fa-check"></i><?=get_phrase('Information')?>
                                    </h4>
                                    <a href="<?=site_url(trim($_SESSION['language']).'/backoffice/my-info')?>" style="text-decoration: none;"><?=get_phrase('Pour bénéficier entièrement des avantages du réseau merci de compléter vos informations');?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                
                <!-- mes comptes -->
                <h2><?=get_phrase("Mes Comptes")?></h2>

                <!-- compte matrice -->
                <div class="col-lg-4 col-12">
					<div class="card">
					  <div class="card-body">
                        <h3 class="card-title text-center"><?=get_phrase("Compte Matrice")?></h3>
                        <h3 class="card-title text-center">10 000 $</h3>
                        <br><hr><br>
						<div class="mb-30 text-center">
							<a href="#">
                                <button type="button" class="btn btn-primary mb-5"><?=get_phrase("Retirer")?></button>
							</a>
							<a href="#">
                                <button type="button" class="btn btn-primary mb-5"><?=get_phrase("Transferer")?></button>
							</a>
						</div>
					  </div>
					</div>
                </div>
                <!-- compte bonus -->
                <div class="col-lg-4 col-12">
					<div class="card">
					  <div class="card-body">
                        <h3 class="card-title text-center"><?=get_phrase("Compte Bonus")?></h3>
                        <h3 class="card-title text-center">100 $</h3>
                        <br><hr><br>
						<div class="mb-30 text-center">
							<a href="#">
                                <button type="button" class="btn btn-primary mb-5"><?=get_phrase("Retirer")?></button>
							</a>
							<a href="#">
                                <button type="button" class="btn btn-primary mb-5"><?=get_phrase("Transferer")?></button>
							</a>
						</div>
					  </div>
					</div>
                </div>
                <!-- compte investissement -->
                <div class="col-lg-4 col-12">
					<div class="card">
					  <div class="card-body">
                        <h3 class="card-title text-center"><?=get_phrase("Compte Investissement")?></h3>
                        <h3 class="card-title text-center">1 000 $</h3>
                        <br><hr><br>
						<div class="mb-30 text-center">
                            <a href="#">
                                <button type="button" class="btn btn-primary mb-5"><?=get_phrase("Approvisionner")?></button>
							</a>
							<a href="#">
                                <button type="button" class="btn btn-primary mb-5"><?=get_phrase("Retirer")?></button>
							</a>
							<a href="#">
                                <button type="button" class="btn btn-primary mb-5"><?=get_phrase("Transferer")?></button>
							</a>
						</div>
					  </div>
					</div>
                </div>
                <!-- mon profil -->
                <div class="col-lg-4 col-md-6 col-12">
					<div class="card">
					  <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
					  <div class="card-body">
						<h3 class="card-title text-center"><?=get_phrase("Mon Profil")?></h3>

						<p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"><?=get_phrase("Pseudo")?>:</span> <span><?=$user['pseudo']?></span>
						</p>
						<p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"><?=get_phrase("Nom")?>:</span> <span><?=$user['nom']?></span>
						</p>
						<p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"> <?=get_phrase("Prenom")?>:</span> <span><?=$user['prenoms']?></span>
                        </p>
                        <p class="card-text d-flex justify-content-between">
							<span class="font-weight-600 text-info"> <?=get_phrase("Email")?>:</span> <span><?=$user['email']?></span>
                        </p>
                        <hr><br>
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
						</div>
					  </div>
					</div>
                </div>
                <!-- mon niveau -->
                <div class="col-lg-4 col-md-6 col-12">
					<div class="card">
					  <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
						<div class="card-body">
							<h3 class="card-title text-center"><?=get_phrase("Mon Niveau")?></h3>
							
							<h3 class="card-title text-center">Matrice 4</h3>
							<h3 class="card-title text-center">2/4</h3>

						</div>
					</div>
                </div>
                <!-- derniers partenaires -->
                <div class="col-lg-4 col-md-6 col-12">
					<div class="card">
					  <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
						<div class="card-body">
							<h3 class="card-title text-center"><?=get_phrase("Derniers partenaires ajoutés")?></h3>
							<hr><br>
							<div class="row">
								<div class="col-lg-12"><?=get_phrase("Pseudo")?>:Luai</div>
								<div class="col-lg-12"><?=get_phrase("Date d'ajout")?>:23/10/20200</div>
								<div class="col-lg-12"><a href="#"><?=get_phrase("Voir +")?></a></div>
							</div><hr>
							<div class="row">
								<div class="col-lg-12"><?=get_phrase("Pseudo")?>:Soro</div>
								<div class="col-lg-12"><?=get_phrase("Date d'ajout")?>:23/11/20200</div>
								<div class="col-lg-12"><a href="#"><?=get_phrase("Voir +")?></a></div>
							</div><hr>
							<div class="row">
								<div class="col-lg-12"><?=get_phrase("Pseudo")?>:Jordy</div>
								<div class="col-lg-12"><?=get_phrase("Date d'ajout")?>:23/12/20200</div>
								<div class="col-lg-12"><a href="#"><?=get_phrase("Voir +")?></a></div>
							</div>
						</div>
					</div>
				</div><hr><br>          
                
                <!-- actualite -->
                <h2><?=get_phrase("Actualité")?></h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date d'ajout")?>: 16/06/2001</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date d'ajout")?>: 16/06/2002</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date d'ajout")?>: 16/06/2003</h4>
                            </div>
                        </div>
                    </div>
                    
                </div><hr><br>
                
                <!-- webinaire -->
                <h2><?=get_phrase("Webinaire à venir")?></h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date du webinaire")?>: 15/03/2007</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date du webinaire")?>: 15/03/2008</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date du webinaire")?>: 15/03/2009</h4>
                            </div>
                        </div>
                    </div>
                    
                </div><hr><br>
                
                <!-- conference a venir -->
                <h2><?=get_phrase("Conférence à venir")?></h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date de la conférence")?>: 15/07/03</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date de la conférence")?>: 15/07/05</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                        <!-- <img class="card-img-top" src="../images/avatar/375x200/1.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h3 class="card-title text-center"><?=get_phrase("Titre")?>: Bonjour 2020</h3>
                                <h4 class="card-title text-center"><?=get_phrase("Date de la conférence")?>: 15/07/08</h4>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12 col-12">
                    <div class="box box-solid bg-primary">
                        <div class="box-header" style="background-color: #f25e24!important;border-color:#f25e24!important">
                            <h4 class="box-title"><strong><?php echo get_phrase('My link for sponsoring'); ?></strong></h4>
                        </div>
                        <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="input-group">
                                            <input id="to-copy" type="text" class="form-control" value="<?php echo site_url('registration/');?><?php echo $pseudo; ?>" readonly="readonly">
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
                                
            <script type="text/javascript">
                function copy() {
                  var copyText = document.querySelector("#to-copy");
                  copyText.select();
                  document.execCommand("copy");
                }

                document.querySelector("#copy").addEventListener("click", copy);
            </script>       
       
        
            