<!-- Content Wrapper. Contains page content -->
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

    if ($this->ion_auth->in_group(1))
{
  $data['monType'] = "Administrateur";
} 
    elseif ($this->ion_auth->in_group(7))
{
 $data['monType'] = "Comptable";
} 
    else $data['monType'] = "";


$data['pseudo'] = $this->session->userdata('identity');
$noms_membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
$data['nom_membre'] = $noms_membre['nom'];
$data['prenom_membre'] = $noms_membre['prenoms'];
$data['dateInscription'] = $noms_membre['creele'];


$data['page_title'] = 'Gestion des Livreur | Administration';
$data['titre'] = 'Gestion des livreur';
$data['lien'] = 'Gestion des Livreur';

$this->load->view('templates/_parts/admin_master_header_view',$data); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $data['titre']; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('administrator~gie2018');?>"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active"><?= $data['lien']; ?></li>
        </ol>
        <div style="padding:30px 10px">
        <?php  echo $output; ?>
        
        </div>
    </section>
</div>


<?php $this->load->view('templates/_parts/membre_master_footer_view');?>