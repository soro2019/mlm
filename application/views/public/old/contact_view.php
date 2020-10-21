<!-- BANNER -->
    <style type="text/css">
        .section.overlap {
             margin-top: -150px!important;
        }
             .banner-page.about {
              background: linear-gradient(
             rgba(0, 0, 0, 0.45), 
             rgba(0, 0, 0, 0.45)
             ),url("<?php echo site_url('assets/front2/images/banner/contact-fr.jpg');?>") bottom center no-repeat;
        }
    </style>
    <div class="section banner-page about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="title-page">Contact</div>
                    <ol class="breadcrumb">
                        <li><a href="index-2.html">Accueil</a></li>
                        <li class="active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Contact -->
    <div class="section contact overlap">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-md-push-8">
                    <div class="widget download">
                        <a href="images/pdf/scanner fichier.pdf" class="btn btn-secondary btn-block btn-sidebar"><span class="fa  fa-file-pdf-o"></span>Brochure de l'entreprise</a>
                    </div>
                    <div class="widget contact-info-sidebar">
                        
                        <ul class="list-info">
                            <li>
                                <div class="info-icon">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="info-text"><b>Agence principale :</b></div>
                                <div class="info-text">Yopougon terminus 40, cabine bleue</div>
                                <div class="info-text">(Salle Gilles Vouzon)</div> </li>
                            <li>
                                <div class="info-icon">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="info-text" >(+225) 21 29 68 75 / (+225) 59 44 39 67</div>
                                <div class="info-text" >(+225) 09 52 48 98</div>
                            </li>
                            <li>
                                <div class="info-icon">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="info-text">contact@globalindustriespoir.com</div>
                            </li>
                            <li>
                                <div class="info-icon">
                                    <span class="fa fa-clock-o"></span>
                                </div>
                                <div class="info-text">Lundi - Vendredi => 09:30 - 18:30</div>
                                <div class="info-text">Samedi => 09:30 - 14:30</div>
                            </li>
                        </ul>
                    </div> 

                </div>
                <div class="col-sm-8 col-md-8 col-md-pull-4">
                    <div class="content" style="margin-top: -30px;">
                        <p class="section-heading-3">
                            
                        </p>
                        <div class="margin-bottom-30"></div>
                        <h3 class="section-heading-2">
                            <st class="help-block" <?php echo $this->session->flashdata('message');?></st>
                        </h3>
                        <form action="pages/save_contact" class="form-contact" id="contactForm" data-toggle="validator" novalidate="true" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="p_name" placeholder="Votre Nom" required="" name="nom">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="p_email" placeholder="Votre numéro de téléphone" name="telephone">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="p_email" placeholder="Votre email" name="email">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="p_subject" placeholder="Objet de votre message" name="objet">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                 <textarea id="p_message" class="form-control" rows="6" placeholder="Votre message" name="message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <div id="success"></div>
                                <input  type="submit" class="btn btn-secondary " style="pointer-events: all; cursor: pointer;" value="Cliquez ici pour nous faire parvenir votre message" name="submit" />
                            </div>
                        </form>
                        <div class="margin-bottom-50"></div>
                        <!-- <p><em>Note: Nous somme ouvrte à tout type demande</em></p> -->
                     </div>
                </div>

            </div>
            
        </div>
    </div> 
    
     <div class="section">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div>
                   <a href="https://www.djenoumarket.com" target="_blank"> <img src="<?php echo base_url();?>assets/front2/images/pub/banniere-djenoumarket-globalindustriespoir.com.png" alt="PUB DJENOUMARKET"> </a>
                </div>
            </div>
        </div>
    </div>
</div> 

    
   