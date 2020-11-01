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
                            <h4 class="box-title"><strong><?php echo ucfirst(get_phrase('transfert de fonds à un autre partenaire')); ?></strong></h4>
                        </div>
                        <div class="box-body">
                         <form action="" method="POST" onsubmit = "validateCaptcha();">
	                        <div class="row">
	                          <div class="col-md-5">
	                          	<label><?php echo ucfirst(get_phrase('pseudo du partenaire')); ?></label>
	                            <input id="" required type="text" name="pseudo_partenaire" class="form-control" placeholder="<?php echo ucfirst(get_phrase('pseudo du partenaire')); ?>" value="<?=isset_value('partenaire')?>">
	                          </div>
	                          <div class="col-md-7">
	                          	<label><?php echo ucfirst(get_phrase('message au partenaire')); ?></label>
	                          	<textarea class="form-control" rows="10" name="message" placeholder="<?php echo ucfirst(get_phrase('message au partenaire')); ?>"><?=isset_value('message')?></textarea>
	                          </div>
	                        </div><br>
	                        <div class="row">
	                          <div class="col-md-5" style="margin-top: -200px;">
	                          	<label><?php echo ucfirst(get_phrase('spècifiez le montant')); ?></label>
	                            <input id="" required  min="1" step="0.1" name="montant" type="number" class="form-control" value="">
	                          </div>
	                        </div><br>
	                        <div class="row">
	                          <div class="col-md-5" style="margin-top: -142px;">
	                          	<label><?php echo ucfirst(get_phrase('selectionner un compte')); ?></label>
	                            <select name="compte" class="form-control" required>
	                             <option value=""><?=ucfirst(get_phrase('selectionner un compte'))?></option>
	                            <?php foreach($mescomptes as $mescompte){
			                    $name = $this->db->get_where('typecompte', ['id' => $mescompte['typecompte']])->row_array()['libelle']; 
			                     echo '<option value="'.$mescompte['id'].'"><b>'.ucfirst(get_phrase('compte')).' '.$name.'('.number_format(trim($mescompte['montant']), 0, ' ', ' ').' $)</b></option>';
			                   }?>
	                            </select>
	                          </div>
	                        </div><br>
	                        <div class="row">
	                          <div class="col-md-5" style="margin-top: -80px;">
	                          	<label style="color: red;"><?php echo ucfirst(get_phrase('attention : cette action est irréversible')); ?></label>
	                          </div>
	                        </div><br>
	                        <div class="row" style="margin-top: -60px;">
				                <div class="col-sm-3"> 
				                    <label for="w3-captcha"><?php echo get_phrase("Saisie dans captcha"); ?></label>
				                    <div id="captcha">
				                    </div>
				                </div>
				                <div class="col-sm-4">
				                    <label for="w3-captcha"><?php echo get_phrase("Securité"); ?></label>
				                        <input type="text" class="form-control" placeholder="Captcha" id="cpatchaTextBox"/>
				                </div>
				            </div><br>
	                        <div class="row">
	                        	<div class="col-md-3">
	                        		<button type="submit" style="float: right; margin-right: 10px;" class="btn btn-primary"><?=ucfirst(get_phrase('faire le transfert'))?></button>
	                        	</div>
	                        </div>
	                      </form>
	                    </div>
                </div>
            </div>
