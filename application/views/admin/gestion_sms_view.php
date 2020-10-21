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


$data['page_title'] = 'Gestion sms | Administration';
$data['titre'] = 'Gestion SMS';
$data['lien'] = 'Gestion des SMS';


$this->load->view('templates/_parts/admin_master_header_view',$data); ?>


<!-- Main content -->
<section class="content">
    <div style="padding:30px 10px">
        <?php  echo $output; ?>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/_parts/membre_master_footer_view');?>