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
                            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center; margin-bottom:15px;color:#02799c;"> S'inscrire</h1>
                            <?php if($pseudo = $this->uri->segment(2)){}else{ $pseudo = "usermlm";} ?>
                             Votre parrain est : <?=$pseudo?>
                            <input type="hidden" name="parrain" value="<?=$pseudo?>">
                            <input type="text" id="user-name" class="form-control" placeholder="Votre pseudo" required autofocus=""  title="Votre pseudo" name="pseudo" value="<?=isset_value('pseudo')?>">

                            <input type="email" id="user-email" class="form-control" placeholder="Votre addresse email" required autofocus=""  title="Votre addresse email" name="usermail" value="<?=isset_value('usermail')?>">

                            <input type="text" id="user-first-name" class="form-control" placeholder="Ex: +22579815420" required="" autofocus="" title="Votre numéro de téléphone avec indicateur" name="phonenumber" value="<?=isset_value('phonenumber')?>">
                           
                            <input type="password" name="userpass" id="new-password" class="form-control" placeholder="Votre mot de passe" required autofocus=""  title="Votre mot de passe">

                            <input type="password" id="user-conf-pass" class="form-control" placeholder="Confirmer votre mot de passe" required autofocus=""  title="Confirmer votre mot de passe" name="userconfpass">

                            <div class="row" style="margin-bottom: 10px; ">
                                <div class="col-sm-6"> 
                                    <label for="w3-captcha">Saisie dans captcha</label>
                                    <div id="captcha">
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <label for="w3-captcha">Securité</label>
                                     <input type="text" class="form-control" placeholder="Captcha" id="cpatchaTextBox"/>
                                </div>
                            </div>

                            <input class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-right ttm-btn-bgcolor-skincolor"  type="submit" title="" value="S'INSCRIRE" name="register" onclick="actionform()">
                            <a href="login-signup"  style="text-align: left; color:#0b0c26;"><i class="fa fa-angle-left"></i> Retour</a>
                        <?php echo form_close() ; ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- map-section end -->
</div>

<script type="text/javascript">
        var code;
        function createCaptcha() {
          //clear the contents of captcha div first 
          document.getElementById('captcha').innerHTML = "";
          var charsArray ="0123456789";
          var lengthOtp = 6;
          var captcha = [];
          for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
              captcha.push(charsArray[index]);
            else i--;
          }
          var canv = document.createElement("canvas");
          canv.id = "captcha";
          canv.width = 100;
          canv.height = 40;
          var ctx = canv.getContext("2d");
          ctx.font = "25px Georgia";
          ctx.strokeText(captcha.join(""), 0, 30);
          //storing captcha so that can validate you can save it somewhere else according to your specific requirements
          code = captcha.join("");
          document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
        }
        function validateCaptcha() {
         
          debugger
          if(document.getElementById("cpatchaTextBox").value != code) {
              event.preventDefault();
              alert("<?php echo 'Le Captcha est invalide'; ?>");
              return false;
          }else
          {
            return true;
          }
        }

    </script>