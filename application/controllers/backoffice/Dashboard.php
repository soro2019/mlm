<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backoffice_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(['UserModel', 'Crud_model']);

    $this->data['pseudo'] = $this->session->userdata('identity');
    $membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));

    $this->data['nom_membre'] = $membre['first_name'];
    $this->data['prenom_membre'] = $membre['last_name'];
    $this->data['dateInscription'] = $membre['created_on'];
    $this->data['email_membre'] = $membre['email'];
    $this->data['membrereseauperso'] = $this->UserModel->membresreseauperso($this->session->userdata('identity'));
    $this->data['niveau'] = $membre['niveau'];
  }

  public function index($lang='')
  {
       defineLanguage($lang);
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect(trim($_SESSION['language']).'/connexion');
      }
      $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));

      $matrice = $this->data['membre']['niveau'];
      
      $this->data['titre'] = get_phrase('dashboard');

      $this->data['page_description'] = get_phrase('dashboard');
      $this->data['page_author'] = get_phrase('dashboard');
      
      $this->data['mesFieulles'] = $this->UserModel->selectMesFieulles($this->session->userdata('identity'), 3);

      $this->data['actualites'] = $this->Crud_model->selectArticle(1, 3);
      $this->data['conferneces'] = $this->Crud_model->selectArticle(2, 3);
      $this->data['webinaires'] = $this->Crud_model->selectArticle(3, 3);

      $this->data['mescomptes'] = $this->Crud_model->mescomptes($this->session->userdata('identity'));

      $this->data['compactmatrice'] = $this->Crud_model->moncomptes($this->session->userdata('identity'), 1);

      $this->data['compactbonus'] = $this->Crud_model->moncomptes($this->session->userdata('identity'), 2);

      $this->data['compactinvest'] = $this->Crud_model->moncomptes($this->session->userdata('identity'), 3);
      $this->data['nbfilleulByMatrice'] = countFilleulByMatrice($this->session->userdata('identity'), $matrice);
      $this->render('backoffice/dashboard_view');
  }

  public function modaldInfoFieulle()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
         redirect('connexion');
      }
      $user = $this->UserModel->GetUserDataById($_POST['id']);
      //var_dump($user);die;
      $genre = $user['genre'] == 'H' ? 'Homme' : ($user['genre'] == 'F') ? 'Femme' : '';
      /*if($user['genre']=='F')
      {
        $genre = "Femme";
      }*/
      $result = '<div class="modal-body">
                   <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('pseudo')).' : <b>'.trim($user['pseudo']).'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("date d'ajout")).' : <b>'.date('d/m/Y à H:i:s',trim($user['created_on'])).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('email')).' : <b>'.trim($user['email']).'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("phone")).' : <b>'.trim($user['phone']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('nom')).' : <b>'.trim($user['first_name']).'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("prenoms")).' : <b>'.trim($user['last_name']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-6">'.ucfirst(get_phrase('date naissance')).' : <b>'.trim(formtageDate22($user['date_naissance'])).'</b>                         
                       </div>
                       <div class="col-sm-6">'.ucfirst(get_phrase("lieu naissance")).' : <b>'.trim($user['Lieu_naissance']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('genre')).' : <b>'.$genre.'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("ville")).' : <b>'.trim($user['ville']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-6">'.ucfirst(get_phrase('region')).' : <b>'.trim(ucfirst($user['region'])).'</b>                        
                       </div>
                       <div class="col-sm-6">'.ucfirst(get_phrase('code postal')).' : <b>'.trim($user['code_postal']).'</b>                        
                       </div>
                    </div><br>

                    <div class="row">
                       <div class="col-sm-12">'.ucfirst(get_phrase('pays')).' : <b>'.trim($this->Crud_model->selectPaysById($user['pays'])).'</b>                        
                       </div>
                    </div><br>
                  </div>
                  ';

                  
        echo json_encode($result);
  }

  public function mon_reseau($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect('connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('mon réseau');

    $this->data['page_description'] = get_phrase('mon réseau');
    $this->data['page_author'] = get_phrase('mon réseau');
    
    $this->render('backoffice/reseau_view');
  }

  public function souscription($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    $this->data['membre'] = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    
    $this->data['titre'] = get_phrase('faire l\'achat initial');

    $this->data['page_description'] = get_phrase('achat initial');
    $this->data['page_author'] = get_phrase('achat initial');

    $this->data['products'] = $this->Crud_model->selectAllProduct();
    
    $this->render('backoffice/souscription_view');
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