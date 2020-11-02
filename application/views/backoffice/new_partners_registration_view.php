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
	            <h4 class="box-title"><strong><?php echo ucfirst(get_phrase('informations du partenaire')); ?></strong></h4>
	        </div>
	        <div class="box-body">
	         
	          <?php

	              $attributes = array("class" => "",
	                                  "id" => "form_register",
	                                  "role" => "form",
	                                  "onsubmit" => "validateCaptcha();",
	                                  "name" => "");
	              echo form_open_multipart("", $attributes);
	          ?>
	          		<div class="row">
	          		  <div class="col-md-4"></div>
	          		  <div class="col-md-4"><label style="color: red;"><b><?=ucfirst(get_phrase('vous êtes le parrain ce partenaire'))?></b></label></div>
	          		</div><br>
	          		<div class="row">
	          			<div class="col-md-6">
	          				<label><b><?=ucfirst(get_phrase('pseudo'))?></b></label>
	          				<input type="text" id="user-name" class="form-control" placeholder="<?=ucfirst(get_phrase('pseudo du partenaire'))?>" required name="pseudo" value="<?=isset_value('pseudo')?>">
	          			</div>
	          			<div class="col-md-6">
	          				<label><b><?=ucfirst(get_phrase('email'))?></b></label>
	          				<input type="email" id="user-email" class="form-control" placeholder="<?=ucfirst(get_phrase('adresse email'))?>" required name="usermail" value="<?=isset_value('usermail')?>">
	          			</div>
	          		</div><br>
	          		<div class="row">
	          			<div class="col-md-6">
	          				<label><b><?=ucfirst(get_phrase('nom'))?></b></label>
	          				<input type="text" id="user-name" class="form-control" placeholder="<?=ucfirst(get_phrase('nom du partenaire'))?>" required autofocus=""  title="<?=ucfirst(get_phrase('nom du partenaire'))?>" name="nom" value="<?=isset_value('nom')?>">
	          			</div>
	          			<div class="col-md-6">
	          				<label><b><?=ucfirst(get_phrase('prénoms'))?></b></label>
	          				<input type="text" id="user-name" class="form-control" placeholder="<?=ucfirst(get_phrase('prénoms du partenaire'))?>" required autofocus=""  title="<?=ucfirst(get_phrase('prénoms du partenaire'))?>" name="prenoms" value="<?=isset_value('prenoms')?>">
	          			</div>
	          		</div><br>

	          		<div class="row">
	          			<div class="col-md-4">
	          				<label><b><?=ucfirst(get_phrase('téléphone'))?></b></label>
	          				<input type="text" id="user-first-name" class="form-control" placeholder="<?=ucfirst(get_phrase('ex: +22500000000'))?>" required="" name="phonenumber" value="<?=isset_value('phonenumber')?>">
	          			</div>
	          			<div class="col-md-4">
	          				<label><b><?=ucfirst(get_phrase('mot de passe'))?></b></label>
	          				<input type="password" name="userpass" id="new-password" class="form-control" placeholder="<?=ucfirst(get_phrase('mot de passe'))?>" required>
	          			</div>
	          			<div class="col-md-4">
	          				<label><b><?=ucfirst(get_phrase('confirmer le mot de passe'))?></b></label>
	          				<input type="password" id="user-conf-pass" class="form-control" placeholder="<?=ucfirst(get_phrase('confirmer votre mot de passe'))?>" required name="userconfpass">
	          			</div>
	          		</div><br>

	                <div class="row" style="margin-bottom: 10px; ">
                        <div class="col-sm-6"> 
                            <label for="w3-captcha"><?php echo get_phrase("Saisie dans captcha"); ?></label>
                            <div id="captcha">
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <label for="w3-captcha"><?php echo get_phrase("Securité"); ?></label>
                                <input type="text" class="form-control" placeholder="Captcha" id="cpatchaTextBox"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <input type="submit" name="add" value="<?= get_phrase("J'enregistre"); ?>" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">
                        </div>
                    </div>
              </form>
	        </div>
	    </div>
    </div>

</div>