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


$data['page_title'] = 'Gestion des articles du blog | Administration';
$data['titre'] = 'Gestion des articles du blog';
$data['lien'] = 'Gestion des articles du blog';
$titre = 'Gestion des articles du blog';
$lien = 'Gestion des langues';


$this->load->view('templates/_parts/admin_master_header_view',$data); ?>


    <!-- Main content -->
    <section class="content">

        <div style='height:20px;'></div>  
        <div style="padding: 10px">
            <?php echo $output; ?>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php $this->load->view('templates/_parts/admin_master_footer_view');?>
