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
            <h4 class="box-title"><strong><?php echo ucfirst(get_phrase('sécurité de vos comptes')); ?></strong></h4>
        </div>
        <div class="box-body">
            <div class="row">
            <div class="col-12">
              <div class="box">
                <div class="box-body">
                  <h4 class="box-title"><?php echo ucfirst(get_phrase('sécurité du systèmes')); ?></h4>
                  <div class="row">
                    <div class="col-md-3">
                      <button style="height: 64px !important;" type="button" data-backdrop="static" class="btn btn-danger" data-toggle="modal" data-target="#change-password">
                        <?php echo ucfirst(get_phrase('changer votre mot de passe')); ?>
                      </button>
                    </div>
                    <?php if(!is_array($compte_ex)){?>
                    <div class="col-md-4">
                      <button type="button" style="height: 64px !important;" data-backdrop="static" class="btn btn-info" data-toggle="modal" data-target="#add-paiement">
                        <?php echo ucfirst(get_phrase('ajouter les paramètres de paiement')); ?>
                      </button>
                    </div>
                   <?php }else{?>
                    <div class="col-md-4">
                      <button type="button" style="height: 64px !important;" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target="#modifier-paiement">
                        <?php echo ucfirst(get_phrase('modifier les paramètres de paiement')); ?>
                      </button>
                    </div>
                  <?php } ?>
                  <?php if($this->Crud_model->verifParserelCompte($this->session->userdata('identity')) != 0){?>
                    <div class="col-md-4">
                      <button type="button" style="height: 64px !important;" data-backdrop="static" class="btn btn-success" data-toggle="modal" data-target="#code-pin">
                        <?php echo ucfirst(get_phrase('ajouter des codes pins à vos comptes')); ?>
                      </button>
                    </div>
                    <?php }else{?>
                    <div class="col-md-4">
                      <button type="button" style="height: 64px !important;" data-backdrop="static" class="btn btn-warning" data-toggle="modal" data-target="#modifier-code-pin">
                        <?php echo ucfirst(get_phrase('modifier les codes pins de vos comptes')); ?>
                      </button>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	</div>
</div><br><br><br><br><br><br><br><br><br><br><br>

<div class="modal fade" id="change-password">
  <div class="modal-dialog" role="document">
    <form action="" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo ucfirst(get_phrase('changement de mot de passe')); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            
               <div class="row">
                  <div class="col-md-6">
                    <label><b><?=ucfirst(get_phrase('votre ancien mot de passe'))?></b></label>
                  </div>
                  <div class="col-md-6">
                    <input type="password" required name="old_pass" placeholder="<?=ucfirst(get_phrase('votre ancien mot de passe'))?>" class="form-control">
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-6">
                    <label><b><?=ucfirst(get_phrase('votre nouveau mot de passe'))?></b></label>
                  </div>
                  <div class="col-md-6">
                    <input type="password" required name="new_pass" placeholder="<?=ucfirst(get_phrase('votre nouveau mot de passe'))?>" class="form-control">
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-6">
                    <label><b><?=ucfirst(get_phrase('confirmé le mot de passe'))?></b></label>
                  </div>
                  <div class="col-md-6">
                    <input type="password" required name="confirm_pass" placeholder="<?=ucfirst(get_phrase('confirmé le mot de passe'))?>" class="form-control">
                  </div>
               </div><br> 
          </div>
          <div class="modal-footer">
            <button style="float: right; margin-left: 10px;" type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('close'))?></button>
            <input type="submit" name="change-password" class="btn btn-success float-right" value="<?=ucfirst(get_phrase('save changes'))?>">
          </div>
        </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modifier-paiement">
  <div class="modal-dialog" role="document">
    <form action="" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo ucfirst(get_phrase('payment settings')); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            
               <div class="row">
                  <div class="col-md-4">
                    <label><b><?=ucfirst(get_phrase('bitcoin'))?></b></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="bitcoin" class="form-control" value="<?php if(is_array($compte_ex)){ echo $compte_ex['par_bitcoin'];}?>">
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-4">
                    <label><b><?=ucfirst(get_phrase('payeer'))?></b></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="payeer" value="<?php if(is_array($compte_ex)){ echo $compte_ex['par_payeer'];}?>" class="form-control">
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-4">
                    <label><b><?=ucwords(get_phrase('perfect money'))?></b></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" value="<?php if(is_array($compte_ex)){ echo $compte_ex['par_perfect_money'];}?>" name="perfect_money" class="form-control">
                  </div>
               </div><br> 
          </div>
          <div class="modal-footer">
            <button style="float: right; margin-left: 10px;" type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('close'))?></button>
            <input type="submit" name="modifier-paiement" class="btn btn-success float-right" value="<?=ucfirst(get_phrase('save changes'))?>">
          </div>
        </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="code-pin">
  <div class="modal-dialog" role="document">
    <form action="" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo ucfirst(get_phrase('ajouter des codes pins à vos comptes')); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <?php foreach($mescomptes as $mescompte){
                $name = $this->db->get_where('typecompte', ['id' => $mescompte['typecompte']])->row_array()['libelle']; 
             echo '<div class="row">
                    <div class="col-sm-4">
                      <b>'.ucfirst(get_phrase('compte')).' '.$name.'</b>
                    </div>
                    <div class="col-sm-8">
                      <input type="number" required min="0000" class="form-control" placeholder="'.ucfirst(get_phrase('code pin de ce compte')).'" name="compte_'.$mescompte['id'].'">
                    </div>
                  </div><br>';
            }?>
          </div>
          <div class="modal-footer">
            <button style="float: right; margin-left: 10px;" type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('close'))?></button>
            <input type="submit" name="code-pin" class="btn btn-success float-right" value="<?=ucfirst(get_phrase('save changes'))?>">
          </div>
        </div>
     </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modifier-code-pin">
  <div class="modal-dialog" role="document">
     <form action="" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo ucfirst(get_phrase('modifier vos codes pins')); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <select name="compte" class="form-control">
                    <option value=""><?=ucfirst(get_phrase('selectionner un compte'))?></option>
                    <?php foreach($mescomptes as $mescompte){
                      $name = $this->db->get_where('typecompte', ['id' => $mescompte['typecompte']])->row_array()['libelle']; 
                     echo '<option value="'.$mescompte['id'].'">'.ucfirst(get_phrase('compte')).' '.$name.'</option>';
                    }?>
                </select>
              </div>
            </div><br>
            <div class="row">
              <div class="col-sm-6">
                <input type="number" class="form-control" required name="old_pin" placeholder="<?=ucfirst(get_phrase('ancien code pin du compte'))?>">
              </div>
              <div class="col-sm-6">
                <input type="number" class="form-control" required name="new_pin" placeholder="<?=ucfirst(get_phrase('nouveau code pin du compte'))?>">
              </div>
            </div><br>

            <div class="row">
              <div class="col-sm-12">
                <b style="color: red; font-size: 11px;"><?=ucfirst(get_phrase('attention : les codes pins sont composés de 4 chiffres et sont utilisés pour toutes vos transactions dans le système'))?>.</b>
              </div>
            </div><br>
          </div>
          <div class="modal-footer">
            <button style="float: right; margin-left: 10px;" type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('close'))?></button>
            <input type="submit" name="modifier-code-pin" class="btn btn-success float-right" value="<?=ucfirst(get_phrase('save changes'))?>">
          </div>
        </div>
     </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="add-paiement">
  <div class="modal-dialog" role="document">
     <form action="" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo ucfirst(get_phrase('payment settings')); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            
               <div class="row">
                  <div class="col-md-4">
                    <label><b><?=ucfirst(get_phrase('bitcoin'))?></b></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="<?=ucfirst(get_phrase('passerelles'))?>"  name="bitcoin" class="form-control" >
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-4">
                    <label><b><?=ucfirst(get_phrase('payeer'))?></b></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text"  placeholder="<?=ucfirst(get_phrase('passerelles'))?>" name="payeer" class="form-control">
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-4">
                    <label><b><?=ucwords(get_phrase('perfect money'))?></b></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" placeholder="<?=ucfirst(get_phrase('passerelles'))?>"  name="perfect_money" class="form-control">
                  </div>
               </div><br> 
          </div>
          <div class="modal-footer">
            <button style="float: right; margin-left: 10px;" type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('close'))?></button>
            <input type="submit" name="add-paiement" class="btn btn-success float-right" value="<?=ucfirst(get_phrase('save changes'))?>">
          </div>
        </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>






