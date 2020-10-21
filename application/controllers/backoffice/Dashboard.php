<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backoffice_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');

    $this->data['pseudo'] = $this->session->userdata('identity');
    $membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));

    $this->data['nom_membre'] = $membre['first_name'];
    $this->data['prenom_membre'] = $membre['last_name'];
    $this->data['dateInscription'] = $membre['created_on'];
    $this->data['email_membre'] = $membre['email'];
    $this->data['membrereseauperso'] = $this->UserModel->membresreseauperso($this->session->userdata('identity'));
  }

  public function index($lang='')
  {
       defineLanguage($lang);
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      //$lang = $this->uri->segment(1);
      
      $this->data['titre'] = get_phrase('dashboard');

      $this->data['page_description'] = get_phrase('dashboard');
      $this->data['page_author'] = get_phrase('dashboard');
      
      //$this->data['membreNiveau1'] = $this->MesFilleulsModel->tousmembresniveau(1);
      
      $this->render('backoffice/dashboard_view');
  }
    
    
   public function mon_reseau()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Mon réseau';
      $this->data['titre'] = 'reseau';
        
      $users = $this->MesFilleulsModel->MesFilleuls($this->session->userdata('identity'));
      $this->data['users'] = $users;

      $this->render('backoffice/monreseau_view','backoffice_master');
      
  }
  
  public function mon_arbre()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Mon arbre généalogique';
      $this->data['titre'] = 'arbre';
        
      $users = $this->MesFilleulsModel->MesFilleuls($this->session->userdata('identity'));
      $this->data['users'] = $users;

      $this->render('backoffice/monarbre_view','backoffice_master');
      
  }
    
  public function mes_commissions()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Mes commissions';
      $this->data['titre'] = 'commissions';
        
      $mesbons = $this->MesBonsModel->mesbons($this->session->userdata('identity'));
      $this->data['mesbons'] = $mesbons;

      $this->render('backoffice/mescommissions_view','backoffice_master');
      
  }
    
  public function mon_parrain()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Mon parrain';
      $this->data['titre'] = 'parrain';
        
      $monparrain = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
      $pseudo_parrain = $monparrain['pseudo_parrain'];
      $infoparrain = $this->UserModel->GetUserDataByPseudo($pseudo_parrain);
      $this->data['monparain'] = $infoparrain;

      $this->render('backoffice/monparrain_view','backoffice_master');
      
  }


}