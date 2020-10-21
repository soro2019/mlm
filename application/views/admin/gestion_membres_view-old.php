<?php
if($output != null){
            $pseudo = $this->session->userdata('identity');
            $noms_membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
            $nom_membre = $noms_membre['nom'];
            $prenom_membre = $noms_membre['prenoms'];
            $dateInscription = $noms_membre['creele'];
        $titre = 'Gestion des membres du réseau MLM';
        $page_title = 'Gestion membres | Administration';
        $lien = 'Gestion des membres';
        
     }?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('administrator~gie2018');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active"><?= $lien; ?></li>
        </ol>
    </section>
    <br>
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="matrice_membre">
              <?php echo $output; ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<!-- /.content-wrapper -->
