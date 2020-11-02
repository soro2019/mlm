<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box ttm-textcolor-white">
                    <div class="page-title-heading">
                        <h1 class="title"><?=$page_title;?></h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="<?php echo site_url();?>"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                        </span>
                        <span class="ttm-bread-sep">&nbsp; | &nbsp;</span>
                        <span><?=$page_title;?></span>
                    </div>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- page-title end-->
<!--site-main start-->
<div class="site-main pt-20">

    <!-- map-section -->
    <div class="ttm-row map-section clearfix">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    
                    <div id="logreg-forms" >

                        <?php 
                $attributes = array("class" => "form-signin",
                "role" => "form",
                "onsubmit" => "validateCaptcha()",
                "name" => "");
                echo form_open_multipart("", $attributes);
                ?>
                            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center; margin-bottom:15px;color:red;font-size: 1em">
                                <?php if($this->session->flashdata('message_erreur')) {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$this->session->flashdata('message_erreur').'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>';
                                } ?>
                            </h1>
                            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center; margin-bottom:15px;color:#02799c;"> <?=get_phrase('S\'inscrire')?></h1>
                            <?php
                                $parrain = explode('/', $_SERVER['REQUEST_URI']);
                                $pseudo = trim(end($parrain));
                                if($pseudo == "registration")
                                {
                                  $pseudo = trim("usermlm");
                                }
                            ?>
                             <?=get_phrase('votre parrain est')?> : <?=$pseudo?>
                            <input type="hidden" name="parrain" value="<?=$pseudo?>">
                            <input type="text" id="user-name" class="form-control" placeholder="<?=ucfirst(get_phrase('votre pseudo'))?>" required autofocus=""  title="<?=ucfirst(get_phrase('votre pseudo'))?>" name="pseudo" value="<?=isset_value('pseudo')?>">

                            <input type="email" id="user-email" class="form-control" placeholder="<?=ucfirst(get_phrase('votre adresse email'))?>" required autofocus=""  title="<?=ucfirst(get_phrase('votre adresse email'))?>" name="usermail" value="<?=isset_value('usermail')?>">

                            <input type="text" id="user-first-name" class="form-control" placeholder="<?=ucfirst(get_phrase('ex: +22500000000'))?>" required="" autofocus="" title="<?=ucfirst(get_phrase('votre numéro de téléphone avec indicateur'))?>" name="phonenumber" value="<?=isset_value('phonenumber')?>">
                           
                            <input type="password" name="userpass" id="new-password" class="form-control" placeholder="<?=ucfirst(get_phrase('votre mot de passe'))?>" required autofocus=""  title="<?=ucfirst(get_phrase('votre mot de passe'))?>">

                            <input type="password" id="user-conf-pass" class="form-control" placeholder="<?=ucfirst(get_phrase('confirmer votre mot de passe'))?>" required autofocus=""  title="<?=ucfirst(get_phrase('confirmer votre mot de passe'))?>" name="userconfpass">

                            <div class="row" style="margin-bottom: 10px; ">
                                <div class="col-sm-6"> 
                                    <label for="w3-captcha"><?=ucfirst(get_phrase('saisie dans captcha'))?></label>
                                    <div id="captcha">
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <label for="w3-captcha"><?=ucfirst(get_phrase('securité'))?></label>
                                     <input type="text" class="form-control" placeholder="Captcha" id="cpatchaTextBox"/>
                                </div>
                            </div>

                            <input class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-bgcolor-skincolor"  type="submit" title="" value="<?=strtoupper(get_phrase('s\'inscrire'))?>" name="register" onclick="actionform()">
                            <a href="<?=site_url(trim($_SESSION['language']).'/connexion')?>"  style="text-align: left; color:#0b0c26;"><i class="fa fa-angle-left"></i> <?=ucfirst(get_phrase('retour'))?></a>
                        <?php echo form_close() ; ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- map-section end -->
</div>

