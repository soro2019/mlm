<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="<?=$meta_keywords;?>" />
        <meta name="description" content="<?=$meta_description;?>" />
        <meta name="author" content="Invest Manage Grow Ltd" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title><?=$page_title;?></title>
        <link rel="shortcut icon" href="<?php echo site_url('assets/front/images/favicons.png');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/bootstrap.min.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/animate.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/owl.carousel.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/font-awesome.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/themify-icons.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/flaticon.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/revolution/css/layers.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/revolution/css/settings.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/prettyPhoto.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/shortcodes.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/main.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/responsive.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/front/css/uifiles/css/ps.css');?>" />
    </head>
    <body onload="createCaptcha();">
        <!--page start-->
        <div class="page">
            <div id="preloader">
                <div id="status">&nbsp;</div>
            </div>
            <!--header start-->
            <header id="masthead" class="header ttm-header-style-classic">
                <div class="ttm-topbar-wrapper ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
                    <div class="container">
                        <div class="ttm-topbar-content">
                            <ul class="top-contact ttm-highlight-left text-left">
                                <li><i class="fa fa-clock-o"></i><strong>Open Hours:</strong> Mon - Sat 9.00 - 18.00</li>
                            </ul>
                            <div class="topbar-right text-right">
                                <ul class="top-contact">
                                    <li><i class="fa fa-envelope-o"></i><a href="mailto:info@example.com.com">info@shappinvest.org</a></li>
                                    <!--<li><i class="fa fa-phone"></i>+44 (0)1295 752 900</li>-->
                                </ul>
                                <div class="ttm-social-links-wrapper list-inline">
                                    <ul class="social-icons">
                                    
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="ttm-header-wrap">
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner ttm-stickable-header">
                            <div class="container">
                                <div class="site-branding">
                                    <a class="home-link" href="<?php echo site_url();?>" title="Shappinvest" rel="home">
                                        <img id="logo-img" class="img-center" src="<?php echo site_url('assets/front/images/Logo-shapp-invest.png');?>" alt="logo-img">
                                    </a>
                                </div>
                                <!--site-navigation -->
                                <div id="site-navigation" class="site-navigation">
                                    <?php if (!$this->session->userdata('identity')) {?>
                                    <div class="header-btn">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border" href="<?php echo site_url(trim($_SESSION['language']).'/connexion');?>"><?=ucwords(get_phrase('log in'))?></a>
                                    </div>
                                    <div class="header-btn">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border" href="<?php echo site_url(trim($_SESSION['language']).'/registration');?>"><?=ucwords(get_phrase('sign up'))?> </a>
                                    </div>
                                    <?php } else {
                                    if ($this->ion_auth->in_group('admin')) {?>
                                    <div class="header-btn">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border" href="<?php echo site_url('administrator~shappinvest/principal/');?>">DASBOR</a>
                                    </div>
                                    <div class="header-btn">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border" href="<?php echo site_url('logout');?>"><?=get_phrase('Logout')?></a>
                                    </div>
                                    <?php }
                                    if ($this->ion_auth->in_group('membres')) {?>
                                    <div class="header-btn">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border" href="<?php echo site_url('backoffice');?>">DASBOR</a>
                                    </div>
                                    <div class="header-btn">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border" href="<?php echo site_url('logout');?>"><?=get_phrase('Logout')?></a>
                                    </div>
                                    <?php } } ?>
                                    <div class="ttm-menu-toggle">
                                        <input type="checkbox" id="menu-toggle-form" />
                                        <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                            <span class="toggle-block toggle-blocks-1"></span>
                                            <span class="toggle-block toggle-blocks-2"></span>
                                            <span class="toggle-block toggle-blocks-3"></span>
                                        </label>
                                    </div>
                                    <nav id="menu" class="menu">
                                        <ul class="dropdown">
                                            <li <?php if ($titre=='home') {?>class="active"<?php }?>><a href="<?php echo site_url($_SESSION['language']);?>"><?=ucfirst(get_phrase('home'))?></a></li>
                                            <li <?php if ($titre=='About Us' or $titre=='Our Mission' or $titre=='Our History' or $titre=='Our White Paper') {?>class="active"<?php }?>><a href="#">Company</a>
                                            <ul>
                                                <li ><a href="<?php echo site_url('about-us');?>">About Us</a></li>
                                                <li><a href="<?php echo site_url('our-road-map');?>">Our Road Map</a></li>
                                                <li><a href="<?php echo site_url('static/white-paper-shappinvest.pdf');?>" target="_blank">Our White Paper</a></li>
                                            </ul>
                                        </li>
                                        <li <?php if ($titre=='Our Services' or $titre=='Business To Customer Selling' or $titre=='Retail Investment' or $titre=='Investment Portfolio' or $titre=='Wallet Exchange Platform (On Comming)' or $titre=='Peer to Peer Exchange Platform (On Comming)') {?>class="active"<?php }?>><a href="<?php echo site_url('our-services');?>">Investment</a>
                                        <ul>
                                            <li <?php if ($titre=='Investment Portfolio') {?>class="active"<?php }?>><a href="<?php echo site_url('investment-portfolio');?>">Investment Portfolio</a></li>
                                            <li <?php if ($titre=='Business To Customer Selling') {?>class="active"<?php }?>><a href="<?php echo site_url('business-to-customer-selling');?>">Business To Customer Selling</a></li>
                                        </ul>
                                    </li>
                                    <li <?php if ($titre=='For Business' or $titre=='For MLM Companies' or $titre=='For StartUps' or $titre=='For Exchange Services' or $titre=='For Network Marketing And Direct Sales Professionals' or $titre=='Become a Partner' or $titre=='Open Our Own Consultation Center') {?>class="active"<?php }?>><a href="#">Partnership</a>
                                    <ul>
                                        <li <?php if ($titre=='Become a Partner') {?>class="active"<?php }?>><a href="<?php echo site_url('become-a-partner');?>">Become a Partner</a></li>
                                        <li <?php if ($titre=='Open Our Own Consultation Center') {?>class="active"<?php }?>><a href="<?php echo site_url('open-our-own-consultation-center');?>">Open our Own Consultation Center</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">News</a>
                                <ul>
                                    <li><a href="<?php echo site_url('company-news');?>">Company News</a></li>
                                    <li><a href="<?php echo site_url('events');?>">Events</a></li>
                                    <li><a href="<?php echo site_url('webinars');?>">Webinars</a></li>
                                </ul>
                            </li>
                            <li <?php if ($titre=='Contact') {?>class="active"<?php }?>><a href="<?php echo site_url('contact');?>">Contact</a></li>
                        </ul>
                    </nav>
                    </div><!-- site-navigation end-->
                </div>
            </div>
        </div>
        </div><!-- ttm-stickable-header-w end-->
    </div>
    <!--ttm-header-wrap end -->
</header>
<!--header end-->