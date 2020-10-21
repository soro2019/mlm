<?php 

defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo $titre; ?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php 
    if(isset($css_files)){
    foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; } ?>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/bower_components/Ionicons/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/dist/css/skins/_all-skins.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/perso/css/cssperso.css');?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/bower_components/morris.js/morris.css');?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/bower_components/jvectormap/jquery-jvectormap.css');?>">
    <!-- utilisation de tableau -->
    <?php 
    if(!isset($css_files)){ ?>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <?php } ?>
    <!-- /utilisation de tableau>
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/perso/css/hierarchy.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/membre/perso/css/cssperso.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php 
    if(isset($before_head)) echo $before_head;?>
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo site_url('administrator~gie2018');?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>GIE</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>GIE</b>ADMINISTRATION</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mes commissions MLM <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Mes bons d'achat</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Générer un code d'achat</a></li>

                            </ul>
                        </li>-->
                        <li><a href="<?php echo site_url('administrator~gie2018/gestion-membres');?>" class="dropdown-toggle" data-toggle="dropdown">Gestion des membres <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Comptabilité<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Bilan</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Balance</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Compte de résultats</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Gestion du stock</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Archive facture</a></li>

                            </ul>
                        </li>

                        <li><a href="<?php echo site_url('administrator~gie2018/cms');?>">CMS <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo site_url('administrator~gie2018/employes');?>">Employés <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo site_url('administrator~gie2018/parametres');?>">Paramètres <span class="sr-only">(current)</span></a></li>

                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Des outils de marketing <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Présentation de l'opportunité</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Des conférences</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Videos de presentation</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Des conseils de réussite en MLM</a></li>
                            </ul>
                        </li>-->
                        <li><a href="https://djenoumarket.com" target="_blank">Allez sur la marketplace <span class="sr-only">(current)</span></a></li>
                    </ul>

                </div>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- Notifications: style can be found in dropdown.less -->
                        <!--<li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Vous avez 10 notifications</li>
                                <li>
                                     inner menu: contains the actual data 
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 nouveaux membres ont rejoins votre réseau aujourd'hui
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 nouveaux membres ont rejoins votre réseau aujourd'hui
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 nouveaux membres ont rejoins votre réseau aujourd'hui
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Tout voir</a></li>
                            </ul>
                        </li>-->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo site_url('assets/membre/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    <?php echo strtoupper($nom_membre); ?>&nbsp;
                                    <?php echo strtoupper($prenom_membre); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo site_url('assets/membre/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo strtoupper($nom_membre); ?>&nbsp;
                                        <?php echo strtoupper($prenom_membre); ?> -
                                        <?php echo $monType; ?>
                                        <small>Membre depuis
                                            <?php echo $dateInscription; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('administrator~gie2018/profil');?>" class="btn btn-default btn-flat">Mon profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('administrator~gie2018/deconnexion');?>" class="btn btn-default btn-flat">Déconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo site_url('assets/membre/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php echo $nom_membre; ?>&nbsp;
                            <?php echo $prenom_membre; ?>
                        </p>
                        <a><i class="fa fa-circle text-success"></i>
                            <?php echo $monType; ?></a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU PRINCIPAL</li>
                    <li <?php if($page_title=='Bashboard | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/');?>">
                            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Gestion membres | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion_membres');?>">
                            <i class="fa fa-users"></i> <span>Gestion des membres</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Gestion sms email | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion_sms');?>">
                            <i class="fa fa-envelope-o"></i> <span>Gestion des SMS</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Gestion retraits | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion_retraits');?>">
                            <i class="fa fa-anchor"></i> <span>Gestion des retraits</span>

                        </a>

                    </li>
                    
                    <li <?php if($page_title=='Statistiques | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/statistiques');?>">
                            <i class="fa fa-anchor"></i> <span>Statistiques</span>

                        </a>

                    </li>


                    <?php //if(($monType == "Comptable") or ($monType == "Administrateur")){?>
                    <li class="header">MENU COMPTABILITE</li>
                    <li <?php if($page_title=='Bilan | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/bilan');?>">
                            <i class="fa fa-area-chart"></i> <span>Bilan</span>

                        </a>

                    </li>

                    <li class="treeview ">
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion_journal');?>">
                            <i class="fa fa-ruble"></i>
                            <span>Facture</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">3</span>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if($titre == 'Gestion Facture Client')echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/principal/facture_client');?>">
                                    <i class="fa fa-circle-o"></i>
                                    Facture client
                            </li>
                            <li class="<?php if($titre == 'Gestion facture Entrée en Stock')echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/principal/gestion_facture_entree_stock');?>">
                                    <i class="fa fa-circle-o"></i>
                                    Facture de entrée en Stock
                            </li>
                            <li class="<?php if($titre == 'Gestion facture Sortie de Stock') echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/principal/gestion_facture_sortie_stock');?>">
                                    <i class="fa fa-circle-o"></i>
                                    Facture de sortie de Stock
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview ">
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion-journal');?>">
                            <i class="fa fa-book"></i>
                            <span>Le Journal</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">4</span>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if($titre == 'Le Journal Compte Caisse')echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/principal/gestion-journal-caisse');?>">
                                    <i class="fa fa-circle-o"></i>
                                    Le Journal Compte Caisse
                                </a>
                            </li>
                            <li class="<?php if($titre == 'Le Journal compte Vente') echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/principal/gestion-journal-vente');?>">
                                    <i class="fa fa-circle-o"></i>
                                    Le Journal compte Vente
                                </a>
                            </li>
                            <li class="<?php if($titre == 'Le Journal Compte Achat') echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/principal/gestion-journal-achat');?>">
                                    <i class="fa fa-circle-o"></i>
                                    Le Journal Compte Achat
                                </a>
                            </li>
                            <li class="<?php if($titre == 'Le Journal compte Banque') echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/principal/gestion-journal-banque');?>">
                                    <i class="fa fa-circle-o"></i>
                                    Le Journal compte Banque
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li <?php if($page_title=='Balance' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/balance');?>">
                            <i class="fa fa-balance-scale"></i> <span>Balance</span>
                        </a>

                    </li>

                    <li <?php if($page_title=='Compte De Resultat | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion-compte-de-resultat');?>">
                            <i class="fa fa-signal"></i> <span>Compte de résultats</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Gestion de Stock | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion-stock');?>">
                            <i class="fa fa-opencart"></i> <span>Gestion du stock</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Archive | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/archive');?>">
                            <i class="fa fa-archive"></i> <span>Archive facture</span>

                        </a>

                    </li>
                    <?php //}?>

                    <li class="header">MENU CMS</li>
                    <li class="treeview ">
                        <a href="<?php echo site_url('administrator~gie2018/gestion-pages');?>">
                            <i class="fa fa-th"></i>
                            <span>Gestion des pages</span>
                            <span class="pull-right-container">
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <!--li class="<?php //if($titre == 'Le Journal Compte Caisse')echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/gestion-journal-caisse');?>">
                                    <i class="fa fa-circle-o"></i> 
                                    Le Journal Compte Caisse
                                </a>
                            </li>
                            <li class="<?php //if($titre == 'Le Journal compte Vente') echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/gestion-journal-vente');?>">
                                    <i class="fa fa-circle-o"></i> 
                                    Le Journal compte Vente
                                </a>
                            </li>
                            <li class="<?php //if($titre == 'Le Journal Compte Achat') echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/gestion-journal-achat');?>">
                                    <i class="fa fa-circle-o"></i> 
                                    Le Journal Compte Achat
                                </a>
                            </li>
                            <li class="<?php //if($titre == 'Le Journal compte Banque') echo 'active';?>">
                                <a href="<?php echo site_url('administrator~gie2018/gestion-journal-banque');?>">
                                    <i class="fa fa-circle-o"></i> 
                                    Le Journal compte Banque 
                                </a>
                            </li-->
                            <li <?php if($page_title=='blog' ) echo 'class="active"' ;?>>
                                <a href="<?php echo site_url('administrator~gie2018/blog');?>">
                                    <i class="fa fa-comments-o"></i> <span>BLOG</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if($page_title=='Gestion des langues du site | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion-langues');?>">
                            <i class="fa fa-archive"></i> <span>Gestion des langues</span>

                        </a>

                    </li>



                    <li class="header">MENU EMPLOYES</li>
                    <li <?php if($page_title=='Gestion Des Employes | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/gestion-employes');?>">
                            <i class="fa fa-empire"></i> <span>Gestion des employés</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Role Des Employes | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/role-employes');?>">
                            <i class="fa fa-rocket"></i> <span>Rôles des employés</span>
                        </a>

                    </li>


                    <li class="header">PARAMETRES</li>
                    <li <?php if($page_title=='Profil | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/profil');?>">
                            <i class="fa fa-user"></i> <span>Profil</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Modifier Mdp | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('administrator~gie2018/principal/modifier-mdp');?>">
                            <i class="fa fa-wrench"></i> <span>Modifier son mot de passe</span>
                        </a>

                    </li>



                    <br>
                    <li class="header">LA MARKETPLACE GIE</li>
                    <li>
                        <a href="https://djenoumarket.com" target="_blank">
                            <i class="fa fa-shopping-bag"></i> <span>Accéder à la boutique</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('administrator~gie2018/auth/deconnexion');?>">
                            <i class="fa fa-sign-out"></i> <span>Déconnexion</span>
                        </a>
                    </li>



                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $titre; ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('administrator~gie2018/principal/');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
                    <li class="active">
                        <?= $lien; ?>
                    </li>
                </ol>
            </section>
            <br>
