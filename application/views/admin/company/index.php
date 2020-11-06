<?php

defined('BASEPATH') OR exit('No direct script access allowed');
  /*function get_phrase($e){
  return $e;
}*/
?>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('errors')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <?php 
              $attributes = array("class" => "",
                                  "role" => "form");
              echo form_open("administrator~shappinvest/change_the_theme/updates_lien_reseau", $attributes);
            ?>
              <div class="box-header">
                <h3 class="box-title"><?php echo ucfirst(get_phrase('reseau sociaux')); ?></h3>
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-insert"><?php echo ucfirst(get_phrase('clique pour inserer un nouveau')); ?></button>
              </div>

              <div class="box-body">

                <?php 
                  
                  foreach ($lienreseausociaux_Data as $h => $value) {
                    
                ?>
                  <div class="form-group">
                    <div class="input-group">
                      <span  class="input-group-addon"> 
                        <i class="<?=$value->faicon?>"></i> 
                      </span>
                      <input type="url" id="boite<?=$value->id?>" class="form-control" name="lien<?=$value->id?>" value="<?=$value->lien?>"  <?php if($value->viewicon==1){echo"disabled='disabled'";} ?>>
                      <span data-toggle="tooltip" data-original-title="activé pour l'afficher ou désactivé pour ne pas l'afficher" class="input-group-addon"> 
                        <input type="checkbox" id="poite<?=$value->id?>" onchange='vuech(<?=$value->id?>)' name="vuelien<?=$value->id?>" <?php if($value->viewicon==1){echo"checked='checked'";} ?> > 
                      </span>
                      <span data-toggle="tooltip" data-original-title="cliqu ici pour supprimer de la liste" class="input-group-addon"> 
                         <button type="button" data-toggle="modal" data-target="#modal-supp" onclick='suppl(<?=$value->id?>)'> <i class="fa fa-trash-o"></i></button>
                        
                      </span>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <input type="hidden" name="nbres" value="<?=$h+1;?>" name="trase">
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="position" class="btn btn-success text-center col-md-12 col-xs-12" value="<?php echo ucfirst(get_phrase('clique pour modifier')); ?>"/>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <div class="modal modal-default fade" id="modal-insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo ucfirst(get_phrase('nouveau reseau')); ?></h2>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-success">
              <?php 
              $attributes = array("class" => "",
                                  "role" => "form",
                                  "id" => "",
                                  "name" => "");
              echo form_open("administrator~shappinvest/change_the_theme/insertion_val", $attributes);
            ?>
                    <div class="box-body">
                        <div class="form-group">
                          <div class="input-group">
                            
                            <input type="text" id="icone" class="form-control" name="icone"/>
                            <span data-toggle="tooltip" data-original-title="cliquez ici pour choisir votre icon" class="input-group-addon"> 
                              <button type="button" data-toggle="modal" data-target="#modal-select"><i class="fa fa-search"></i></button>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span  class="input-group-addon"> 
                              <i id="y"></i> 
                            </span>
                            <input type="url" id="boite0" class="form-control" name="lien0">
                            <span data-toggle="tooltip" data-original-title="activé pour l'afficher ou désactivé pour ne pas l'afficher" class="input-group-addon"> 
                              <input type="checkbox" id="poite0" onchange='vuech(0)' name="vuelien0" > 
                            </span>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="reset" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider2" value="<?php echo ucfirst(get_phrase('enregistrer')); ?>" class="btn btn-success" name="envoi" />
              
                    </div>
                <?php echo form_close() ; ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  
</div>

<div class="modal modal-default fade" id="modal-select">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h3 class="box-title"><?php echo get_phrase("Cliquez sur l'icon de votre choix"); ?></h3>
                        
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-success">
                    <div class="box-body">
                        <div class="form-group col-md-12">
                             <div class="row fontawesome-icon-list">
                              <?php
                                $nameicon = array( 
                                  1=>'fa fa-adn',
                                  2=>'fa fa-android',
                                  3=>'fa fa-angellist',
                                  4=>'fa fa-apple',
                                  5=>'fa fa-behance',
                                  6=>'fa fa-behance-square',
                                  7=>'fa fa-bitbucket',
                                  8=>'fa fa-bitbucket-square',
                                  9=>'fa fa-bitcoin',
                                  10=>'fa fa-btc',
                                  11=>'fa fa-cc-amex',
                                  12=>'fa fa-cc-discover',
                                  13=>'fa fa-cc-mastercard',
                                  14=>'fa fa-cc-paypal',
                                  15=>'fa fa-cc-stripe',
                                  16=>'fa fa-cc-visa',
                                  17=>'fa fa-codepen',
                                  18=>'fa fa-css3',
                                  19=>'fa fa-delicious',
                                  20=>'fa fa-deviantart',
                                  21=>'fa fa-digg',
                                  22=>'fa fa-dribbble',
                                  23=>'fa fa-dropbox',
                                  24=>'fa fa-drupal',
                                  25=>'fa fa-empire',
                                  26=>'fa fa-facebook',
                                  27=>'fa fa-facebook-square',
                                  28=>'fa fa-flickr',
                                  29=>'fa fa-foursquare',
                                  30=>'fa fa-ge',
                                  31=>'fa fa-git',
                                  32=>'fa fa-git-square',
                                  33=>'fa fa-github',
                                  34=>'fa fa-github-alt',
                                  35=>'fa fa-github-square',
                                  36=>'fa fa-gittip',
                                  37=>'fa fa-google',
                                  38=>'fa fa-google-plus',
                                  39=>'fa fa-google-plus-square',
                                  40=>'fa fa-google-wallet',
                                  41=>'fa fa-hacker-news',
                                  42=>'fa fa-html5',
                                  43=>'fa fa-instagram',
                                  44=>'fa fa-ioxhost',
                                  45=>'fa fa-joomla',
                                  46=>'fa fa-jsfiddle',
                                  47=>'fa fa-lastfm',
                                  48=>'fa fa-lastfm-square',
                                  49=>'fa fa-linkedin',
                                  50=>'fa fa-linkedin-square',
                                  51=>'fa fa-linux',
                                  52=>'fa fa-maxcdn',
                                  53=>'fa fa-meanpath',
                                  54=>'fa fa-openid',
                                  55=>'fa fa-pagelines',
                                  56=>'fa fa-paypal',
                                  57=>'fa fa-pied-piper',
                                  58=>'fa fa-pied-piper-alt',
                                  59=>'fa fa-pinterest',
                                  60=>'fa fa-pinterest-square',
                                  61=>'fa fa-qq',
                                  62=>'fa fa-ra',
                                  63=>'fa fa-rebel',
                                  64=>'fa fa-reddit',
                                  65=>'fa fa-reddit-square',
                                  66=>'fa fa-renren',
                                  67=>'fa fa-share-alt',
                                  68=>'fa fa-share-alt-square',
                                  69=>'fa fa-skype',
                                  70=>'fa fa-slack',
                                  71=>'fa fa-slideshare',
                                  72=>'fa fa-soundcloud',
                                  73=>'fa fa-spotify',
                                  74=>'fa fa-stack-exchange',
                                  75=>'fa fa-stack-overflow',
                                  76=>'fa fa-steam',
                                  77=>'fa fa-steam-square',
                                  78=>'fa fa-stumbleupon',
                                  79=>'fa fa-stumbleupon-circle',
                                  80=>'fa fa-tencent-weibo',
                                  81=>'fa fa-trello',
                                  82=>'fa fa-tumblr',
                                  83=>'fa fa-tumblr-square',
                                  84=>'fa fa-twitch',
                                  85=>'fa fa-twitter',
                                  86=>'fa fa-twitter-square',
                                  87=>'fa fa-vimeo-square',
                                  88=>'fa fa-vine',
                                  89=>'fa fa-vk',
                                  90=>'fa fa-wechat',
                                  91=>'fa fa-weibo',
                                  92=>'fa fa-weixin',
                                  93=>'fa fa-windows',
                                  94=>'fa fa-wordpress',
                                  95=>'fa fa-xing',
                                  96=>'fa fa-xing-square',
                                  97=>'fa fa-yahoo',
                                  98=>'fa fa-yelp',
                                  99=>'fa fa-youtube',
                                  100=>'fa fa-youtube-play',
                                  101=>'fa fa-youtube-square'
                                  
                                );
                                for ($e=1; $e < 101; $e++) { 
                                  
                              ?>

                                <div  class="fa-hover col-md-3 col-sm-4" type="button" class="close" data-dismiss="modal" aria-label="Close"><i onclick="choixvue(<?=$e?>)" id="fafa<?=$e?>" class="<?=$nameicon[$e];?>" style="font-size: 2em"></i>
                                </div>
                              <?php } ?>
                    
                       

                        

                      </div>             
                        </div>
                    </div>
                    
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  
</div>
<div class="modal modal-default fade" id="modal-supp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo ucfirst(get_phrase('voulez-vous vraiment le supprimer?')); ?></h2>
                        <h4><?php echo ucfirst(get_phrase('si oui entrer le code de validation et cliquer sur supprimer')); ?></h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-danger">
                <?php 
                $attributes = array("class" => "contactForm",
                "role" => "form",
                "name" => "");
                echo form_open("administrator~shappinvest/change_the_theme/supp", $attributes);
                ?>
                    <div class="box-body">                        
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="verifcationcode" title="<?php echo ucfirst(get_phrase('pour la verification de votre identite')); ?>" placeholder="<?php echo ucfirst(get_phrase('entrer le code de validation')); ?>" required >
                        </div>
                        <input type="hidden" name="codeverifinconf" id="lieu">
                        <input type="hidden" name="verifcode" id="verifcode">
                    </div>
                    <div class="modal-footer box box-danger">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider3" value="<?php echo ucfirst(get_phrase('supprimer')); ?>" class="btn btn-danger" name="envoi" />

                    </div>
                <?php echo form_close() ; ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  
</div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function vuech(p){
      var prise=document.getElementById('poite'+p);
      var vues=document.getElementById('boite'+p);
      if (prise.checked==true) {
        vues.disabled=true;
      }else{
        vues.disabled=false;

      }
    }
    function choixvue(o){
      document.getElementById('icone').value=document.getElementById('fafa'+o).className;
      document.getElementById('y').className=document.getElementById('fafa'+o).className;;
    }
    function suppl(p){
       document.getElementById('lieu').value=p;
    }
  </script>



