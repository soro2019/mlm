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
                            <h4 class="box-title"><strong><?php echo ucfirst(get_phrase('mes informations personnelle')); ?></strong></h4>
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

                          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <fieldset>
                                <legend><?= get_phrase("Information Compte") ?></legend>  
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-12 mb-lg">
                                            <label for="w3-parrain"><?= get_phrase("Pseudo du Parrain") ?></label>
                                            <input type="text" class="form-control" name="pseudo_parrain" value="<?=$user['pseudo_parrain']?>" placeholder=<?= get_phrase("Parrain")?> readonly>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-username"><?= get_phrase("Pseudo") ?></label>
                                            <input type="text" class="form-control" value="<?=$user['pseudo']?>" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-email"><?= get_phrase("Email") ?></label>
                                            <input type="email" class="form-control" name="email" value="<?=$user['email']?>" placeholder="Email">
                                        </div>    
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset>
                                <legend><?= get_phrase("Information Membre"); ?></legend>
                                <div class="row">
                                    <div class="col-sm-6 mb-lg">
                                    <label for="w3-name1"><?= get_phrase("Nom"); ?></label>
                                    <input type="text" class="form-control" name="nom" value="<?=$user['first_name']?>" placeholder=<?= get_phrase("Nom")?>>
                                    </div>
                                    <div class="col-sm-6 mb-lg">
                                    <label for="w3-name1"><?= get_phrase("Prenom(s)"); ?></label>
                                    <input type="text" class="form-control" name="prenoms" value="<?=$user['last_name']?>" placeholder="<?= get_phrase("Prénoms")?>">
                                    </div>
                                </div><br>
                                <div class="form-group mb-none">
                                    <div class="row">
                                         <div class="col-sm-12 mb-lg">
                                            <label for="w3-bithday"><?= get_phrase("Lieu de naissance"); ?></label>
                                            <input type="text" class="form-control" name="lieu_naissance" value="<?=$user['Lieu_naissance']?>" placeholder="<?= get_phrase("Lieu de naissance")?>">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-bithday"><?= get_phrase("Date de naissance"); ?></label>
                                            <input type="date" class="form-control" name="date" value="<?=$user['date_naissance']?>" placeholder="<?= get_phrase("Date de naissance")?>">
                                        </div>
                                         <div class="col-sm-6 mb-lg">
                                            <label for="w3-don"><?= get_phrase("Genre"); ?></label>
                                            <select name="genre" class="form-control" id="w3-don" required="">
                                                <option value="H" <?= $user['genre'] == 'H' ? 'selected':'' ?> ><?= get_phrase("Homme") ?></option>
                                                <option value="F" <?= $user['genre'] == 'F' ? 'selected':'' ?> ><?=get_phrase("Femme") ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-country" required=""><?= get_phrase("Pays actuel"); ?></label>
                                            <input name="pays" type="text" list="pays" class="form-control" id="w3-pays"  value="<?php if(isset($_POST['pays'])){ echo $_POST['pays'];}else{ echo trim($this->Crud_model->selectPaysById($user['pays'])); } ?>">
                                                <datalist id="pays">
                                                   <?php foreach ($listepays as $elmt) {?>
                                                     <option value="<?=$elmt['name']?>"></option>
                                                   <?php } ?>
                                                </datalist>
                                            
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-c-city"><?= get_phrase("Ville")?></label>
                                            <input type="text" class="form-control" name="ville" value="<?=$user['ville']?>" placeholder="<?= get_phrase("Ville")?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-country" required=""><?= get_phrase("Region")?></label>
                                            <input type="text" class="form-control" name="region" value="<?=$user['region']?>" placeholder="<?= get_phrase("Region")?>">
                                            
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-c-city"><?=get_phrase("Code Postal")?></label>
                                            <input type="text" class="form-control" name="code_postal" value="<?=trim($user['code_postal'])?>" placeholder="<?= get_phrase("Code Postal")?>">
                                            
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= get_phrase("Telephone avec l'indicatif de votre pays"); ?></label>
                                            <input type="text" class="form-control" name="telephone" value="<?=$user['phone']?>" placeholder="<?= get_phrase("Numéro de téléphone (exple: +22500000000)")?>">
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= get_phrase("Facebook"); ?></label>
                                            <input type="text" class="form-control" name="facebook" value="<?=$social_reseau->{'facebook'}?>" placeholder="Facebook">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                    <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= get_phrase("Twitter"); ?></label>
                                            <input type="text" class="form-control" name="twitter" value="<?=$social_reseau->{'twitter'}?>" placeholder="Twitter">
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= get_phrase("Skype"); ?></label>
                                            <input type="text" class="form-control" name="skype" value="<?=$social_reseau->{'skype'}?>" placeholder="Skype">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
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
                            <input type="submit" name="modifier-profil" value="<?= get_phrase("Je modifie"); ?>" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">
                        </div>
                    </div>
              </form>
            </div>
        </div>
    </div>
