<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo ucwords($titre); ?></title>
  <link rel="icon" href="<?php echo site_url('assets/member/images/favicon.png');?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/dist/css/skins/_all-skins.min.css')?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/bower_components/morris.js/morris.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=site_url('assets/membre/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?php
  if(isset($css_files)){
  foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; }?>

  <?php 
    if(isset($before_head)) echo $before_head;?>
</head>
<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo site_url('admin');?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><img src="<?php echo site_url('assets/member/images/favicon.png');?>" style="width: 3em;"> </b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SOCIAL-COOP</b>ADMIN</span>
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
                        <li><a href="<?php echo site_url('admin/principal/gestion_membres');?>" class="dropdown-toggle" data-toggle="dropdown">Gestion des membres <span class="sr-only">(current)</span></a></li>
                        
                        <li><a href="<?php echo site_url('admin/parametres_compte/profil');?>">Paramètres <span class="sr-only">(current)</span></a></li>

                        
                        <li><a href="https://shappinvest.com" target="_blank">Allez sur la marketplace <span class="sr-only">(current)</span></a></li>
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
                                        <a href="<?php echo site_url('admin/parametres_compte/profil');?>" class="btn btn-default btn-flat">Mon profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url(trim($_SESSION['language']).'/admin/logout');?>" class="btn btn-default btn-flat">Déconnexion</a>
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
                    <li <?php if($page_title=='Dashboard | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('admin/principal');?>">
                            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>

                        </a>

                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>    
                            <span>
                                Gestion des membres
                            </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo site_url('admin/principal/gestion_membres');?>"><i class="fa fa-list"></i> Liste de tous les membres</a></li>
                            <li><a href=""><i class="fa fa-list"></i> Niveau 2</a></li>
                            <li><a href="#"><i class="fa fa-list"></i> Niveau 3</a></li>
                        </ul>

                    </li>


                    <li <?php if($page_title=='Gestion membres | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('admin/principal/gestion_investissement');?>">
                            <i class="fa fa-users"></i> <span>Gestion des investissements</span>

                        </a>
                    </li>
                    
                    <li class="header">MENU GESTION</li>
                    <li class="treeview">
                      <a href="#">
                        <i class="fa fa-building-o"></i>
                        <span>Gestion des agences</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?php echo site_url('admin/gestion_agences/etat_creances');?>"><i class="fa fa-list"></i> Etat des créances</a></li>
                        <li><a href="<?php echo site_url('admin/gestion_agences/compte_agences');?>"><i class="fa fa-list"></i> Compte agences</a></li>
                        <li><a href="<?php echo site_url('admin/gestion_agences/gestion_versements');?>"><i class="fa fa-list"></i> Versements</a></li>
                        <li><a href="<?php echo site_url('admin/gestion_agences/ajouter_agence');?>"><i class="fa fa-list"></i> Ajouter une agence</a></li>
                        <li><a href="<?php echo site_url('admin/gestion_agences/ajouter_proprietaire_agence');?>"><i class="fa fa-list"></i> Propriétaire agence</a></li>
                        <li><a href="<?php echo site_url('admin/gestion_agences/crediter_agence');?>"><i class="fa fa-list"></i> Créditer agence</a></li>
                      </ul>
                    </li>

                    <li <?php if($page_title=='Gestion membres | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('admin/principal/gestion_newletter');?>">
                            <i class="ion ion-email"></i> <span>News Letters</span>

                        </a>
                    </li>
                    <li <?php if($page_title=='Gestion membres | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('admin/principal/gestion_contacts');?>">
                            <i class="fa fa-users"></i> <span>Contacts</span>

                        </a>
                    </li>

                    <li <?php if($page_title=='Gestion membres | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('admin/principal/gestion_blogs');?>">
                            <i class="fa fa-users"></i> <span>Gestion des blogs</span>

                        </a>
                    </li>


                    <li class="header">PARAMETRES</li>
                    <li <?php if($page_title=='Profil | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('admin/parametres_compte/profil');?>">
                            <i class="fa fa-user"></i> <span>Profil</span>

                        </a>

                    </li>

                    <li <?php if($page_title=='Modifier Mdp | Administration' ) echo 'class="active"' ;?>>
                        <a href="<?php echo site_url('admin/parametres_compte/modifier_mdp');?>">
                            <i class="fa fa-wrench"></i> <span>Modifier son mot de passe</span>
                        </a>

                    </li>
                    <?php
                        if ($this->ion_auth->in_group(1)){?>
                            <br>
                            <li class="header">paramètre thème</li>
                            <li>
                                <a href="<?php echo site_url('admin/change_the_theme');?>" target="_blank">
                                   <i class="fa fa-share-alt"></i> 
                                   <span>lien Reseau sociaux</span>
                                </a>
                            </li>
                    <?php } ?> 



                    <br>
                    <li class="header">LA MARKETPLACE SHAPPMARKET</li>
                    <li>
                        <a href="https://shappmarket.com" target="_blank">
                            <i class="fa fa-shopping-bag"></i> <span>Accéder à la boutique</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('admin/auth/deconnexion');?>">
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
                    <li><a href="<?php echo site_url('admin/principal/');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
                    <li class="active">
                        <?= $lien; ?>
                    </li>
                </ol>
            </section>
            <br>