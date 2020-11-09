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
                <?php if(empty($membre['first_name']) || empty($membre['last_name']) || empty($membre['genre']) || empty($membre['Lieu_naissance']) || empty($membre['date_naissance']) || empty($membre['pays']) || empty($membre['phone']) || empty($membre['ville']) || empty($membre['region']) || empty($membre['email'])){ ?>
                   <div class="col-xl-12 col-12">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                    <h4>
                                    <i class="icon fa fa-check"></i><?= ucfirst(get_phrase('information'))?>
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
                                <legend><?=  ucwords(get_phrase("information compte")) ?></legend>  
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-12 mb-lg">
                                            <label for="w3-parrain"><?=  ucwords(get_phrase("pseudo du parrain"))?></label>
                                            <input type="text" class="form-control" name="pseudo_parrain" required value="<?=$user['pseudo_parrain']?>" placeholder=<?=  ucfirst(get_phrase("parrain"))?> readonly>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-username"><?=  ucfirst(get_phrase("pseudo")) ?></label>
                                            <input type="text" required class="form-control" value="<?=$user['pseudo']?>" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-email"><?=  ucfirst(get_phrase("email")) ?></label>
                                            <input type="email" required class="form-control" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}else{ echo trim($user['email']); } ?>" placeholder="Email">
                                        </div>    
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset>
                                <legend><?=  ucfirst(get_phrase("information Membre")); ?></legend>
                                <div class="row">
                                    <div class="col-sm-6 mb-lg">
                                    <label for="w3-name1"><?= get_phrase("Nom"); ?></label>
                                    <input type="text" required class="form-control" name="nom" value="<?php if(isset($_POST['nom'])){ echo $_POST['nom'];}else{ echo trim($user['first_name']); } ?>" placeholder=<?= ucfirst(get_phrase("nom"))?>>
                                    </div>
                                    <div class="col-sm-6 mb-lg">
                                    <label for="w3-name1"><?=  ucfirst(get_phrase("prenom(s)")); ?></label>
                                    <input type="text" required class="form-control" name="prenoms" value="<?php if(isset($_POST['prenoms'])){ echo $_POST['prenoms'];}else{ echo trim($user['last_name']); } ?>" placeholder="<?=  ucfirst(get_phrase("prénoms"))?>">
                                    </div>
                                </div><br>
                                <div class="form-group mb-none">
                                    <div class="row">
                                         <div class="col-sm-12 mb-lg">
                                            <label for="w3-bithday"><?=  ucfirst(get_phrase("lieu de naissance")); ?></label>
                                            <input type="text" required class="form-control" name="lieu_naissance" value="<?php if(isset($_POST['lieu_naissance'])){ echo $_POST['lieu_naissance'];}else{ echo trim($user['Lieu_naissance']); } ?>" placeholder="<?=  ucfirst(get_phrase("lieu de naissance"))?>">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-bithday"><?=  ucfirst(get_phrase("date de naissance")); ?></label>
                                            <input type="date" required class="form-control" name="date" value="<?php if(isset($_POST['date'])){ echo $_POST['date'];}else{ echo trim($user['date_naissance']); } ?>" placeholder="<?=  ucfirst(get_phrase("date de naissance"))?>">
                                        </div>
                                         <div class="col-sm-6 mb-lg">
                                            <label for="w3-don"><?=  ucfirst(get_phrase("genre")); ?></label>
                                            <select required name="genre" class="form-control" id="w3-don" required="">
                                                <option value="H" <?= $user['genre'] == 'H' ? 'selected':'' ?> ><?=  ucfirst(get_phrase("homme")) ?></option>
                                                <option value="F" <?= $user['genre'] == 'F' ? 'selected':'' ?> ><?= ucfirst(get_phrase("femme")) ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-country" required=""><?=  ucfirst(get_phrase("pays actuel")); ?></label>
                                            <input name="pays" required type="text" list="pays" class="form-control" id="w3-pays"  value="<?php if(isset($_POST['pays'])){ echo $_POST['pays'];}else{ echo trim($this->Crud_model->selectPaysById($user['pays'])); } ?>">
                                                <datalist id="pays">
                                                   <?php foreach ($listepays as $elmt) {?>
                                                     <option value="<?=$elmt['name']?>"></option>
                                                   <?php } ?>
                                                </datalist>
                                            
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-c-city"><?= ucfirst(get_phrase("ville"))?></label>
                                            <input type="text" required class="form-control" name="ville" value="<?php if(isset($_POST['ville'])){ echo $_POST['ville'];}else{ echo trim($user['ville']); } ?>" placeholder="<?= ucfirst(get_phrase("ville"))?>">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-country" required=""><?= ucfirst(get_phrase("region"))?></label>
                                            <input type="text" required class="form-control" name="region" value="<?php if(isset($_POST['region'])){ echo $_POST['region'];}else{ echo trim($user['region']); } ?>" placeholder="<?= ucfirst(get_phrase("region"))?>">
                                            
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-c-city"><?=ucfirst(get_phrase("code Postal"))?></label>
                                            <input type="text" class="form-control" name="code_postal" value="<?php if(isset($_POST['code_postal'])){ echo $_POST['code_postal'];}else{ echo trim($user['code_postal']); } ?>" placeholder="<?= ucwords(get_phrase("code postal"))?>">
                                            
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group mb-none">
                                    <div class="row">
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= ucfirst(get_phrase("téléphone avec l'indicatif de votre pays")); ?></label>
                                            <input type="text" required class="form-control" name="telephone" value="<?php if(isset($_POST['telephone'])){ echo $_POST['telephone'];}else{ echo trim($user['phone']); } ?>" placeholder="<?= ucfirst(get_phrase("numéro de téléphone (exple: +22500000000)"))?>">
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= ucfirst(get_phrase("facebook")); ?></label>
                                            <input type="text" class="form-control" name="facebook" value="<?php if(isset($_POST['facebook'])){ echo $_POST['facebook'];}else{ echo trim($social_reseau->{'facebook'}); } ?>" placeholder="<?= ucfirst(get_phrase("facebook")); ?>">

                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-none">
                                    <div class="row">
                                    <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= ucfirst(get_phrase("twitter")); ?></label>
                                            <input type="text" class="form-control" name="twitter" value="<?php if(isset($_POST['twitter'])){ echo $_POST['twitter'];}else{ echo trim($social_reseau->{'twitter'}); } ?>" placeholder="<?= ucfirst(get_phrase("twitter")); ?>">
                                        </div>
                                        <div class="col-sm-6 mb-lg">
                                            <label for="w3-phone"><?= ucfirst(get_phrase("skype")); ?></label>
                                            <input type="text" class="form-control" name="skype" value="<?php if(isset($_POST['skype'])){ echo $_POST['skype'];}else{ echo trim($social_reseau->{'skype'}); } ?>" placeholder="<?= ucfirst(get_phrase("skype")); ?>">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                    <div class="row" style="margin-bottom: 10px; ">
                        <div class="col-sm-6"> 
                            <label for="w3-captcha"><?php echo  ucfirst(get_phrase("saisie dans captcha")); ?></label>
                            <div id="captcha">
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <label for="w3-captcha"><?php echo  ucfirst(get_phrase("securité")); ?></label>
                                <input type="text" required class="form-control" placeholder="Captcha" id="cpatchaTextBox"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <input type="submit" name="modifier-profil" value="<?=  ucfirst(get_phrase("je modifie")); ?>" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">
                        </div>
                    </div>
              </form>
            </div>
        </div>
    </div>
