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
      $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
      
      $this->data['titre'] = get_phrase('dashboard');

      $this->data['page_description'] = get_phrase('dashboard');
      $this->data['page_author'] = get_phrase('dashboard');
      
      //$this->data['membreNiveau1'] = $this->MesFilleulsModel->tousmembresniveau(1);
      
      $this->render('backoffice/dashboard_view');
  }
    
  public function mon_reseau($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/reseau_view');
      
  }

  public function matrice($lang='',$nieme)
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/matrice_view');
      
  }

  public function operation_financiere($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/operation_financiere_view');
      
  }
  
  public function transferts_interne($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/transferts_interne_view');
      
  }
  
  public function souscription($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/souscription_view');
      
  }
  
  public function messagerie($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/messagerie_view');
      
  }
  
  public function securite($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/securite_view');
      
  }

  public function materiel_marketing($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/materiel_marketing_view');
      
  }
  
  public function nouveau_partenaire($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/nouveau_partenaire_view');
      
  }

  public function webinaire($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/webinaire');
      
  }

  public function conferences($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/conferences');
      
  }

  public function actualites($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/actualites');
      
  }

  public function support_technique($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/support_technique');
      
  }

  public function faq($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/faq');
      
  }

  public function politique_confidentialite($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/politique_confidentialite');
      
  }

  public function mention_legale($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/mention_legale');
      
  }

  //  public function mon_reseau()
  // {
  //     if(!$this->ion_auth->logged_mlm_in())
  //     {
  //       redirect('connexion');
  //     }
  //     $this->data['page_title'] = 'Mon réseau';
  //     $this->data['titre'] = 'reseau';
        
  //     $users = $this->MesFilleulsModel->MesFilleuls($this->session->userdata('identity'));
  //     $this->data['users'] = $users;

  //     $this->render('backoffice/monreseau_view','backoffice_master');
      
  // }
  
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