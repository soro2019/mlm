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
    <?php if(empty($membre['first_name']) || empty($membre['last_name']) || empty($membre['genre']) || empty($membre['Lieu_naissance']) || empty($membre['date_naissance']) || empty($membre['pays']) || empty($membre['phone']) || empty($membre['ville']) || empty($membre['region']) /*|| empty($membre['code_postal'])*/){ ?>
        <div class="col-xl-12 col-12">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="alert alert-danger alert-dismissible">
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                        <h4>
                        <i class="icon fa fa-check"></i><?=get_phrase('Information')?>
                        </h4>
                        <a href="<?=site_url(trim($_SESSION['language']).'/backoffice/my-info')?>" style="text-decoration: none;"><?=ucfirst(get_phrase('pour bénéficier entièrement des avantages du réseau merci de compléter vos informations'));?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="col-md-12 col-12">
    <div class="box box-solid bg-primary">
        <div class="box-header" style="background-color: #f25e24!important;border-color:#f25e24!important">
            <h4 class="box-title"><strong><?php echo ucfirst(get_phrase('metion légale')); ?></strong></h4>
        </div>
        <div class="box-body">
            <div class="row">
              <div class="col-12">
                <div class="box">
                  <div class="box-body">
                    <h4 class="box-title"><?php echo ucfirst(get_phrase('metion légale')); ?></h4>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>




