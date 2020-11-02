<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $page_description;?>">
    <meta name="author" content="?php echo $page_author;?>">
    <link rel="icon" href="<?php echo site_url('assets/member/images/favicon.png');?>">

    <title><?php echo $page_title;?></title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="<?php echo site_url('assets/member/vendor_components/bootstrap/dist/css/bootstrap.css');?>">
		
	<!-- daterange picker -->	
	<link rel="stylesheet" href="<?php echo site_url('assets/member/vendor_components/bootstrap-daterangepicker/daterangepicker.css');?>">
   
    <!-- toast CSS -->
    <link href="<?php echo site_url('assets/member/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css');?>" rel="stylesheet">

    <!-- Data Table-->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/member/vendor_components/datatable/datatables.min.css');?>"/>
	
	<!-- theme style -->
	<link rel="stylesheet" href="<?php echo site_url('assets/member/css/style.css');?>">
	
	<!-- VoiceX Admin skins -->
	<link rel="stylesheet" href="<?php echo site_url('assets/member/css/skin_color.css');?>">

    <style type="text/css">
    	.main-sidebar{
    		background-color: #ffffff!important;
    	}
    	.sidebar-menu > li:hover, .active{
    		
    	}
    	.sidebar-menu > li > a > i{
    		color:#ffffff!important;
    		border: 1px solid transparent!important;
    	}
    	.light-skin .sidebar-menu > li:hover > a, .light-skin .sidebar-menu > li:active > a, .light-skin .sidebar-menu > li.active > a , .sidebar-menu .treeview-menu > li > a:hover, .sidebar-menu > li >ul >.active > a{
    		background-color: #f45e23;
    		color: #ffffff;
    		border-left:2px solid #FFFFFF;
    	}

        .theme-purple a:hover, .theme-purple a:active, .theme-purple a:focus {
            color: white !important;
        }
            
    </style>
  </head>

<body class="light-skin sidebar-mini onlywave theme-purple" onload="createCaptcha();">
	
<div class="wrapper">
	
  <div class="art-bg">
	  <img src="<?php echo site_url('assets/member/images/art1.svg');?>" alt="" class="art-img light-img">
	  <img src="<?php echo site_url('assets/member/images/art2.svg');?>" alt="" class="art-img dark-img">
	  <img src="<?php echo site_url('assets/member/images/art-bg.svg');?>" alt="" class="wave-img light-img">
	  <img src="<?php echo site_url('assets/member/images/art-bg2.svg');?>" alt="" class="wave-img dark-img">
  </div>

  	<header class="main-header">
	    <!-- Logo -->
	    <a href="<?php echo site_url('backoffice');?>" class="logo">
	      <!-- mini logo -->
		  <div class="logo-mini">
			  <span class="light-logo"><img src="<?php echo site_url('assets/member/images/favicon.png');?>" alt="logo" style="width: 4em;height: 4em;"></span>
			  <span class="dark-logo"><img src="<?php echo site_url('assets/member/images/favicon.png');?>" alt="logo" style="width: 4em;height: 4em;"></span>
		  </div>
	      <!-- logo-->
	      <div class="logo-lg">
			  <span class="light-logo" style="font-size:1.3em;color: #ffffff;font-family: Nunito Sans;font-weight:700">SHAPPINVEST</span>
		  	  <span class="dark-logo" style="font-size:1.3em;color: #ffffff;font-family: Nunito Sans;font-weight:700">SHAPPINVEST</span>
		  </div>
	    </a>
	    <!-- Header Navbar -->
	    <nav class="navbar navbar-static-top">
			
		  <div class="app-menu">
			<ul class="header-megamenu nav">
				<li class="btn-group nav-item">
					<a href="#" class="nav-link rounded" data-toggle="push-menu" role="button">
						<i class="nav-link-icon mdi mdi-menu text-white"></i>
				    </a>
				</li>
				<li class="btn-group nav-item">
					<a href="#" data-provide="fullscreen" class="nav-link rounded" title="Full Screen">
						<i class="nav-link-icon mdi mdi-crop-free text-white"></i>
				    </a>
				</li>
				
			</ul> 
		  </div>
			
	      <div class="navbar-custom-menu r-side">
	        <ul class="nav navbar-nav">
			  
				<!-- User Account-->
				<li class="dropdown user user-menu">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User">
		              <img src="<?php echo site_url('assets/member/images/avatar/img_user_member.jpg'); ?>" alt="<?=$nom_membre;?>" class="user-image rounded-circle" alt="User Image">
		            </a>
		            <ul class="dropdown-menu animated flipInX">
		              <!-- User image -->
		              <li class="user-header bg-img" style="background-image: url(<?php echo site_url('assets/member/images/user-info.jpg');?>)" data-overlay="3">
						  <div class="flexbox align-self-center">					  
						  	<img src="<?php echo site_url('assets/member/images/avatar/img_user_member.jpg');?>" class="float-left rounded-circle" alt="User Image">					  
							<h4 class="user-name align-self-center">
							  <span><?php echo strtoupper($nom_membre); ?>&nbsp;<?php echo strtoupper($prenom_membre); ?></span>
							  <small><?php echo $email_membre; ?></small>
							</h4>
						  </div>
		              </li>
						<!-- Menu Body -->
						<li class="user-body">
						    <a class="dropdown-item" href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/my-profile');?>"><i class="ion ion-person"></i>
						    	<?=ucwords(get_phrase('my profile'))?>
						    </a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:void(0)">
								<i class="ion ion-settings"></i> 
								<?=ucwords(get_phrase('account setting'))?>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/logout');?>">
								<i class="ion-log-out"></i>
								<?=ucwords(get_phrase('logout'))?>
							</a>
							
		              </li>
		            </ul>
	     		</li>
	        </ul>
	      </div>
	    </nav>
  	</header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full clearfix position-relative">	
  
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar-->
			<section class="sidebar">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">

				<li class="header nav-small-cap"><?=strtoupper(get_phrase('menu principal'))?></li> 

					<li <?php if($page_author == 'dashboard') echo 'class="active"';?>>
						<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice');?>">
							<i class="fa fa-dashboard"></i>
							<span><?=get_phrase('dashboard')?></span>
						</a>
					</li> 

					<li class="treeview <?php if($page_author == 'mon_reseau') echo 'active';?>">
						<a href="#">
							<i class="ti-dashboard"></i>
							<span><?=ucfirst(get_phrase("mon réseau"))?></span>
							<span class="pull-right-container">
							<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li <?php if($page_author == 'mon_reseau') echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/my-network');?>">
									<i class="ti-more"></i>
									<?= ucfirst(get_phrase("mon reseau actuel"))?>
								</a>
							</li>
							<?php  
							 for($i=1; $i <= $niveau; $i++)
							 {
							?>
							<li <?php if($page_author == 'matrice') echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/matrice/'.$i);?>">
									<i class="ti-more"></i>
									<?=ucfirst(get_phrase("matrice"))?> <?=$i?> 
								</a>
							</li>
						  <?php } ?>
						</ul>
					</li> 

					<li class="treeview <?php if($page_author == 'subscription' or $page_author == 'operation_financiere' or $page_author == 'transferts_interne') echo 'active';?>">
						<a href="#">
							<i class="ti-dashboard"></i>
							<span><?=ucfirst(get_phrase("finance"))?></span>
							<span class="pull-right-container">
							<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li <?php if($page_author == 'operation_financiere') echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/my-operation');?>">
									<i class="ti-more"></i>
									<?= ucfirst(get_phrase("mes opérations financières"))?>
								</a>
							</li>
							<li <?php if($page_author == 'transferts_interne') echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/internal-transfer');?>">
									<i class="ti-more"></i>
									<?= ucfirst(get_phrase("transferts interne"))?>
								</a>
							</li>
							<?php if($achat_ini != 1){ ?>
							<li <?php if($page_author == 'subscription') echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/subscription');?>">
									<i class="ti-more"></i>
									<?= ucfirst(get_phrase("faire l'achat initial"))?>
								</a>
							</li>
						   <?php } ?>
							<li <?php if($page_author == get_phrase('notre boutique')) echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/boutique');?>">
									<i class="ti-more"></i>
									<?= ucfirst(get_phrase("notre boutique"))?>
								</a>
							</li>
							
						</ul>
					</li>  
					<li <?php if($page_author == 'messagerie') echo 'class="active"';?>>
						<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/messagerie');?>">
							<i class="ti-dashboard"></i>
							<span><?= ucfirst(get_phrase("messagerie"))?></span>
						</a>
					</li>

					<li class="treeview <?php if($page_author == 'modifier_profil' or $page_author == 'Security' or $page_author == 'profil') echo 'active';?>">
						<a href="#">
							<i class="ti-dashboard"></i>
							<span><?= ucfirst(get_phrase("données personnelles"))?></span>
							<span class="pull-right-container">
							<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li <?php if($page_author == 'modifier_profil' || $page_author == 'profil') echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/my-info');?>">
									<i class="ti-more"></i>
									<?= ucfirst(get_phrase("mon Profil"))?>
								</a>
							</li>
							<li <?php if($page_author == 'Security') echo 'class="active"';?>>
								<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/securite');?>">
									<i class="ti-more"></i>
									<?= ucfirst(get_phrase("sécurité"))?>
								</a>
							</li>
							
						</ul>
					</li> 

					<li <?php if($page_author == 'Promotional materials') echo 'class="active"';?>>
						<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/materiel_marketing');?>">
							<i class="ti-dashboard"></i>
							<span><?=ucfirst(get_phrase("matériels marketing"))?></span>
						</a>
					</li>

					<li <?php if($page_author == 'nouveau_partenaire') echo 'class="active"';?>>
						<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/new-partner');?>">
							<i class="ti-dashboard"></i>
							<span><?= ucfirst(get_phrase("ajouter un nouveau partenaire"))?></span>
						</a>
					</li> 
					<li class="treeview <?php if($page_author == 'webinaire') echo 'active';?>">
						<a href="#">
							<i class="ti-dashboard"></i>
							<span><?= ucfirst(get_phrase("extra"))?></span>
							<span class="pull-right-container">
							<i class="fa fa-angle-right pull-right"></i>
							</span>
							<ul class="treeview-menu">
								<li <?php if($page_author == 'webinaire') echo 'class="active"';?>>
									<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/webinar');?>" class="ti-more">
										<?=ucfirst(get_phrase("webinaire"))?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/conferences');?>" class="ti-more">
										<?= ucfirst(get_phrase("conférences"))?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/actualites');?>" class="ti-more">
										<?= ucfirst(get_phrase("actualités"))?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/support_technique');?>" class="ti-more">
										<?= ucfirst(get_phrase("support technique"))?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/faq');?>" class="ti-more">
										<?=strtoupper(get_phrase("faq"))?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/politique_confidentialite');?>" class="ti-more">
										<?= ucfirst(get_phrase("politique de confidentialité"))?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url(trim($_SESSION['language']).'/backoffice/mention_legale');?>" class="ti-more">
										<?= ucfirst(get_phrase("mention légales"))?>
									</a>
								</li>
							</ul>
						</a>
					</li>
			  </ul>
			</section>
		</aside>
		<!-- Main content -->
		<section class="content">