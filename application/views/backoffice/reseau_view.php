<style type="text/css">
	 h6{font-size: 10px !important;}
   .btn-default:hover, .btn-default:active, .btn-default:focus, .btn-default.active {
    background-color: #cccccc !important; 
    border-color: #cccccc !important;
    color: #2f363c;
  }
</style>

<div class="content-header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-md-block d-none">
            <h3 class="page-title br-0"><?php echo ucwords($titre); ?></h3>
        </div>
    </div>
</div><br>
<div class="row">
    <!-- compte matrice -->
    <div class="col-lg-6 col-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center"><?=ucwords(get_phrase("lien de parrainage"))?></h3>
             <div class="input-group">
                <input id="to-copy" type="text" class="form-control" value="<?php echo site_url(trim($_SESSION['language']).'/registration/');?><?=trim($membre['pseudo'])?>" readonly="readonly">
                <span class="input-group-btn">
                    <button id="copy" class="btn btn-default" type="button">
                      <?php echo get_phrase('copier'); ?>  
                    </button>
                </span>
             </div>
            <br><br>
          </div>
        </div>
    </div>
    <!-- compte bonus -->
    <div class="col-lg-6 col-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center"><?=ucwords(get_phrase("mon parrain direct"))?></h3>
            <h3 class="card-title text-center">
             <?=ucfirst(get_phrase("pseudo"))?>	: <span style="color: orange;"><?=$membre['pseudo_parrain']?></span>
            </h3>
            <?php
              $parrain = $this->UserModel->GetUserDataByPseudo(strtolower($membre['pseudo_parrain']));

              //var_dump($parrain);die;
            ?>
            <a href="#" data-backdrop="static" data-toggle="modal" class="btn btn-primary" data-target="#userinfo" data-toggle="modal" onclick="infouser(<?=trim($parrain['id'])?>)">
             <?=ucfirst(get_phrase("détails"))?>
            </a>
            <br>
          </div>
        </div>
    </div>
</div><br>
<div class="row">
	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-info pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("ceux qui ont accédé au lien de parrainage"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?=$membre['nbperson_accede_lien']?></span>
			<span class="font-size-30 text-info mdi mdi-city"></span>
		  </div>
		</div>
	</div>				
	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-primary pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("total inscrits"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?=$membre['nbperson_inscrit_via_lien']?></span>
			<span class="font-size-30 text-primary mdi mdi-seal"></span>
		  </div>
		</div><br>
	</div>				
	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-danger pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("ceux ayant acheté"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?=$this->UserModel->nbFilleulsAchat($membre['pseudo'])?></span>
			<span class="font-size-30 text-danger mdi mdi-city"></span>
		  </div>
		</div><br>
	</div>

	<div class="col-xl-3 col-12">
		<div class="box box-body pb-10 bl-4 border-warning pull-up" style="height: 108px;">
		  <h6 class="text-uppercase"><?=ucfirst(get_phrase("ceux n'ayant pas acheté"))?></h6>
		  <div class="d-flex justify-content-between">
			<span class=" font-size-30"><?php echo ($membre['nbperson_inscrit_via_lien'] - $this->UserModel->nbFilleulsAchat($membre['pseudo'])); ?></span>
			<span class="font-size-30 text-warning mdi mdi-home"></span>
		  </div>
		</div>
	</div>
</div>
<br>
<div class="col-xl-12 col-12">
  <div class="box">
	<div class="box-header with-border">
	  <h4 class="box-title"><?=ucwords(get_phrase('mon réseau'))?></h4>
	</div>
	<!-- /.box-header -->
	<?php //var_dump(selectFilleulByMatrice('usermlm', 'matrice1'));die; ?>
  <div class="box-body">
    <!-- Nav tabs -->
    <div class="vtabs">
      <ul class="nav nav-tabs tabs-vertical" role="tablist">
        <?php for($i=1; $i <= $niveau ; $i++){ $active=""; if($i==$niveau){ $active = "active";} ?>
         <li class="nav-item"> <a class="nav-link <?=$active?>" data-toggle="tab" href="#matrice<?=$i?>" role="tab"><span><i class="ion-person mr-15"></i><?=ucfirst(get_phrase('matrice')).$i?></span></a> </li>
        <?php } ?>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <?php for($j=1; $j<=$niveau; $j++){ $active =""; if($j==$niveau){$active = "active";}
         $matrice = 'matrice'.$j;
         $data = selectFilleulByMatrice($this->session->userdata('identity'), $matrice);
       ?>
        <div class="tab-pane <?=$active?>" id="matrice<?=$j?>" role="tabpanel">
          <div class="p-15">
            <h3><?=ucfirst(get_phrase('information sur la matrice')).' '.$j?></h3>
            <p>
             <div class="table-responsive">
                <table id="operation-table" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                  <tr>
                    <th>N<sup>o</sup></th>
                    <th><?=ucwords(get_phrase('pseudo'))?></th>
                    <th><?=ucwords(get_phrase('nom & prénoms'))?></th>
                    <th><?php echo ucfirst(get_phrase("achat initial")); ?></th>
                    <th><?=ucwords(get_phrase('date inscription'))?></th>
                    <th><?=ucwords(get_phrase('actions'))?></th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)){ for ($i=0; $i < count($data) ; $i++) {
                  $pseudo = $data[$i];
                    if(stristr($pseudo, 'clone')==TRUE)
                    {
                      $pseudo = trim(explode('_', $pseudo)[1]);
                    }
                  $user = $this->UserModel->GetUserDataByPseudo($pseudo);

                  $achat_ini = '<span class="badge badge-pill badge-danger">'.ucfirst(get_phrase('non')).'</span>';

                  if($user['achat_ini'] == 1)
                  {
                    $achat_ini = '<span class="badge badge-pill badge-success">'.ucfirst(get_phrase('oui')).'</span>';
                  }
                ?>
            <tr>
              <td><?=($i+1)?></td>
              <td><?=$pseudo?></td>
              <td><?=ucwords($user['first_name'])?> <?=ucfirst($user['last_name'])?></td>
              <td><?=$achat_ini?></td>
              <td><span class="text-muted"><i class="fa fa-clock-o"></i> <?=date('M d, Y', $user['created_on'])?></span> </td>
              <td>
                <div class="btn-group mb-5">
                <button style="height: 30px; font-size: 10px;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?=ucfirst(get_phrase('actions'))?></button>
                <div class="dropdown-menu">
                  <a href="#" data-backdrop="static" data-toggle="modal" class="dropdown-item" data-target="#userinfo" data-toggle="modal" onclick="infouser(<?=trim($user['id'])?>)">
                       <?=ucfirst(get_phrase('information mon filleule'))?>
                      </a>
                  <a href="#" data-backdrop="static" data-toggle="modal" class="dropdown-item" data-target="#reseauinfo" data-toggle="modal" onclick="reseauinfo(<?=trim($user['id'])?>, <?=trim($j)?>)">
                       <?=ucfirst(get_phrase('information sur son réseau'))?>
                      </a>
                </div>
              </div>
              </td>
            </tr>
              <?php } }else{ ?>
                <tr>
                  <td colspan="6">
                    <?php echo ucfirst(get_phrase('vous n\'avez pas encore de filleule dans cette matrice')); ?>
                  </td>
                </tr>
              <?php } ?>
                </tbody>          
              </table>
              </div>
            </p>
          </div>
        </div>
       <?php } ?>
      </div>
    </div>
  </div>
	<!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<br><br>
<div class="modal fade" id="userinfoyyy">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?=ucfirst(get_phrase('information sur mon parrain'))?></h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
               <div class="col-sm-5"><?=ucfirst(get_phrase('pseudo'))?> : <b><?=trim($membre['pseudo'])?></b>                         
               </div>
               <div class="col-sm-7"><?=ucfirst(get_phrase("date d'ajout"))?> : <b><?=date('d/m/Y à H:i:s',trim($membre['created_on']))?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-7"><?=ucfirst(get_phrase('email'))?> : <b><?=trim($membre['email'])?></b>                         
               </div>
               <div class="col-sm-5"><?=ucfirst(get_phrase("phone"))?> : <b><?=trim($membre['phone'])?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-5"><?=ucfirst(get_phrase('nom'))?> : <b><?=trim($membre['first_name'])?></b>                         
               </div>
               <div class="col-sm-7"><?=ucfirst(get_phrase("prenoms"))?> : <b><?=trim($membre['last_name'])?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-6"><?=ucfirst(get_phrase('date naissance'))?> : <b><?=trim(formtageDate22($membre['date_naissance']))?></b>                         
               </div>
               <div class="col-sm-6"><?=ucfirst(get_phrase("lieu naissance"))?> : <b><?=trim($membre['Lieu_naissance'])?></b>                       
               </div>
            </div><br>
            <div class="row">
            	<?php if($membre['genre'] == 'H'){
            		   $genre = 'Homme';
            	  }elseif($membre['genre'] == 'F'){ $genre = 'Femme'; }else{$genre = "";}?>
               <div class="col-sm-5"><?=ucfirst(get_phrase('genre'))?> : <b><?=$genre?></b>                         
               </div>
               <div class="col-sm-7"><?=ucfirst(get_phrase("ville"))?> : <b><?=trim($membre['ville'])?></b>                       
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-6"><?=ucfirst(get_phrase('region'))?> : <b><?=trim(ucfirst($membre['region']))?></b>                        
               </div>
               <div class="col-sm-6"><?=ucfirst(get_phrase('code postal'))?> : <b><?=trim($membre['code_postal'])?></b>                        
               </div>
            </div><br>
            <div class="row">
               <div class="col-sm-12"><?=ucfirst(get_phrase('pays'))?> : <b><?=trim($this->Crud_model->selectPaysById($membre['pays']))?></b>                        
               </div>
            </div><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?=ucfirst(get_phrase('fermer'))?></button>
          </div>
        </div>
      </div>
</div>   