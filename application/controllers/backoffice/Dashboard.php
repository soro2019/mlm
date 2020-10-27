<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backoffice_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(['UserModel', 'Crud_model']);

    $this->data['pseudo'] = trim($this->session->userdata('identity'));
    $membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));

    $this->data['nom_membre'] = $membre['first_name'];
    $this->data['prenom_membre'] = $membre['last_name'];
    $this->data['dateInscription'] = $membre['created_on'];
    $this->data['email_membre'] = $membre['email'];
    $this->data['membrereseauperso'] = $this->UserModel->membresreseauperso($this->session->userdata('identity'));
    $this->data['niveau'] = $membre['niveau'];
    $this->data['achat_ini'] = $membre['achat_ini'];
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

  public function modaldProduit()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
         redirect(trim($_SESSION['language']).'/connexion');
      }
      $mescomptes = $this->Crud_model->mescomptes($this->session->userdata('identity'));
      $prod = $this->Crud_model->GetProductDataById($_POST['id']);
      $result = '<div class="modal-body">
                  <form method="POST" action="">
                   <input type="hidden" name="id_prod" value="'.$_POST['id'].'">
                   <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('name')).' : <b>'.ucfirst(trim($prod['name'])).' ('.number_format(trim($prod['prix_vente']), 0, ' ', ' ').' $)</b>                         
                       </div>
                       <div class="col-sm-7"><b>'.ucfirst(get_phrase("selectionnez le compte")).'</b>
                          <br><select name="modepaie" class="form-control" id="modepaie" required>
                              <option value="">'.ucfirst(get_phrase("selectionnez le compte")).'</option>
                             ';

                   foreach($mescomptes as $mescompte){
                    $name = $this->db->get_where('typecompte', ['id' => $mescompte['typecompte']])->row_array()['libelle']; 
                    $result .='<option value="'.$mescompte['id'].'"><b>'.ucfirst(get_phrase('compte')).' '.$name.'('.number_format(trim($mescompte['montant']), 0, ' ', ' ').' $)</b></option>';
                   }
                $result .= '</select> 
                       </div>
                    </div><br>
                    <div class="row">
                      <div class="col-sm-5">
                        <button class="btn btn-success" type="submit" name="btn">Acheter le produit</button>
                      </div>
                    <div><br>
                    </form>
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

  public function subscription($lang='')
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

    if($this->input->post())
    {
      if(empty($this->input->post('modepaie')))
      {
        $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('veuillez selectionnez un mode de paiement svp')));
      }else
      {
        $id_prod = test_inputValide($this->input->post('id_prod'));
        $mode = test_inputValide($this->input->post('modepaie'));
        $prod = $this->Crud_model->GetProductDataById($id_prod);
        $data = [];
          //utilisation d'un compte du système
          $idCompte = (int) $mode;
          $compte = $this->Crud_model->moncompteById($idCompte);
          $name = $this->db->get_where('typecompte', ['id' => $compte['typecompte']])->row_array()['libelle'];
          if((int)trim($prod['prix_vente']) > (int)trim($compte['montant']))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('votre compte est insuffisant pour effectuer cette opération')));
          }else
          {
            $modepaie = 'Avec le Compte '.$name;
            $data['comptdestinataire'] = $idCompte;
            $motif = ucfirst(get_phrase("achat ini du produit ".$prod['name']));
            $data['typeoperation'] = 13;
            $data['pseudodestinataire'] = $this->data['pseudo'];
            $data['dateopration'] = time();
            $data['motif_oprt'] = $motif;
            $data['modpaiement'] = $modepaie;

            if($this->Crud_model->insertion_('operations', $data))
            {
              if(isset($idCompte))
              {
                $newsolde = (int)trim($compte['montant']) - (int)trim($prod['prix_vente']);
                $this->Crud_model->update_where('comptes', ['montant' => $newsolde], $idCompte, 'id');
              }
              $this->Crud_model->update_where('users', ['achat_ini' => 1], trim($this->data['pseudo']), 'pseudo');
              $this->session->set_flashdata('message_success', ucfirst(get_phrase('achat initial effectué avec succès')));
              redirect(trim($_SESSION['language']).'/backoffice');
            }else
            {
              $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('erreur du système')));
            }
          }
      }
      //redirect(trim($_SESSION['language']).'/backoffice');
    }
    
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