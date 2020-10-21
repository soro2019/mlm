<?php 

defined('BASEPATH') OR exit('No direct script access allowed');?>


<!--
author: JEMDESIGN
author URL: http://jemdesign.tk
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
    <html lang="fr">
<head>
    <title><?php echo $page_title;?></title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Global Industries Espoir, GIE, marketing de réseau, MLM, Marketplace, site de vente en ligne, boutique en ligne, vente en ligne, vente, commerce, e-commerce, membre" />
    <meta name="description" content="<?php echo $meta_description;?>" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //custom-theme -->
    <link href="<?php echo site_url('assets/front/css/bootstrap.css');?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo site_url('assets/front/css/style.css');?>" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/mainStyles.css');?>" type="text/css" media='all' />
    <link rel='stylesheet' href='<?php echo site_url('assets/front/css/dscountdown.css');?>' type='text/css' media='all' />

    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/flexslider.css');?>" type="text/css" media="screen" property="" />
    <!-- gallery -->
    <link href="<?php echo site_url('assets/front/css/lsb.css');?>" rel="stylesheet" type="text/css">
    <!-- //gallery -->
    <!-- font-awesome-icons -->
    <link href="<?php echo site_url('assets/front/css/font-awesome.css');?>" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">




    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/vendor/animate/animate.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/vendor/select2/select2.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/vendor/perfect-scrollbar/perfect-scrollbar.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/vendor/css/util.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/vendor/css/main.css');?>">
    <!--===============================================================================================-->


</head>


<body>
    <!-- banner -->
    <div class="header">

        <div class="w3layouts_header_right">
            <div class="agileits-social top_content">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="w3layouts_header_left">
            <ul>
                <!--<li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-user" aria-hidden="true"></i> Connexion</a></li>
                <li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inscription</a></li>--><li><a href="<?php echo site_url('connexion');?>"><i class="fa fa-user" aria-hidden="true"></i> Connexion</a></li>
                <li><a href="<?php echo site_url('inscription');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inscription</a></li>
            </ul>

        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="header_mid">
        <div class="w3layouts_header_mid">
            <ul>
                <li>
                    <div class="header_contact_details_agile"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <div class="w3l_header_contact_details_agile">
                            <div class="header-contact-detail-title">Envoyez-nous un message</div>
                            <a href="mailto:info@example.com">info@globalindustriespoir.com</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="header_contact_details_agile"><i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="w3l_header_contact_details_agile">
                            <div class="header-contact-detail-title">Ou appelez-nous</div>
                            <a class="w3l_header_contact_details_agile-info_inner"> +225 46 67 30 99 / 59 44 39 67 </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="header_contact_details_agile"><i class="fa fa-clock-o" aria-hidden="true"></i>
                        <div class="w3l_header_contact_details_agile">
                            <div class="header-contact-detail-title">Nous sommes ouvert</div>
                            <a class="w3l_header_contact_details_agile-info_inner">Lun - Sam: 7:00 - 18:00</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="header_contact_details_agile"><i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="w3l_header_contact_details_agile">
                            <div class="header-contact-detail-title">Angré Chateau</div>
                            <a class="w3l_header_contact_details_agile-info_inner">Abidjan, Côte d'Ivoire </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="banner">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <h1>
                    <a class="navbar-brand" href="<?php echo site_url('/');?>"><img src="<?php echo site_url('assets/front/images/Logo-GIE-petit.png');?>" height="70" alt="GIE"></a>
                </h1>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav class="link-effect-2" id="link-effect-2">
                    <ul class="nav navbar-nav">
                        <li <?php if($titre == 'accueil') echo 'class="active"';?>><a href="<?php echo site_url('/');?>"><span data-hover="Accueil">Accueil</span></a></li>
                        <li <?php if($titre == 'qui-sommes-nous') echo 'class="active"';?>><a href="<?php echo site_url('qui-sommes-nous');?>"><span data-hover="Qui sommes-nous ?">Qui sommes-nous ?</span></a></li>
                        <li <?php if($titre == 'plan-de-remuneration') echo 'class="active"';?>><a href="<?php echo site_url('plan-de-remuneration');?>"><span data-hover="Notre plan de rémunération">Notre plan de rémunération</span></a></li>
<!--                        <li><a href="about.html"><span data-hover="ACTUALITES">ACTUALITES</span></a></li>-->
                        <li <?php if($titre == 'faq') echo 'class="active"';?>><a href="<?php echo site_url('faq');?>"><span data-hover="FAQ">FAQ</span></a></li>
                        
                        <li <?php if($titre == 'contact') echo 'class="active"';?>><a href="<?php echo site_url('contact');?>"><span data-hover="Contact">Contact</span></a></li>
                        <!--<li><a href="http://boutique.globalindustriespoir.com"><span data-hover="NOTRE BOUTIQUE">NOTRE BOUTIQUE</span></a></li>-->
                    </ul>
                </nav>

            </div>

        </nav>
    </div>

    <!-- //banner -->
    
   <div style="color: #fff; height:40px; background-color:blue;">
        <marquee style="padding-top:10px;">Vous pouvez désormais vous inscrire. Si vous n'avez pas de parrain, veuillez laisser le champ "pseudo parrain" vide. Nous vous remercions pour votre compréhension et RDV au sommet !</marquee>
    </div> 