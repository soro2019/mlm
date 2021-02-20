  <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends Admin_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->model('admin/MatriceModel','MatriceModel');
    $this->load->model('admin/MembresModel','MembresModel');
     $this->load->model('admin/DemandeModel','DemandeModel');
    $this->load->library('ion_auth');  
    $this->load->model('FronteModel', 'fm');
  }

  public function index($lang='')
  {
      if(!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
      {
        // redirect them to the home page because they must be an administrator to view this
        return show_error('Vous devez être administrateur pour voir cette page.');
      }
      defineLanguage($lang);
      $this->data['titre'] = ucfirst(get_phrase('administration'));
      $this->data['page_title'] = ucfirst(get_phrase('tableau de bord | administration'));
      $this->data['lien'] = ucfirst(get_phrase('tableau de bord'));
      $this->data['TousLesMembres'] = 0;
      $this->data['MontantRecolte'] = 0;
      $this->data['MargeBeneficiaire'] = 0;
      $this->data['MontantCoutSms'] = 0;
      $this->data['MontantDuFondMlm'] = 0;
      $this->data['NombreDeMembresDuJour'] = 0;
      $this->data['NombreDeMembresDeLaSemaine'] = 0;
      $this->data['NombreDeMembresDeCeMois'] = 0;
      $this->data['StockActuel'] = 0;
      /*$this->data['TousLesMembres'] = $this->UserModel->NombreDeMembres();
      $this->data['MontantRecolte'] = $this->UserModel->MontantTotalRecolte();
      $this->data['MargeBeneficiaire'] = $this->MesFilleulsModel->MontantBeneficiaire();
      $this->data['MontantCoutSms'] = $this->MesFilleulsModel->MontantDepenceSms();
      $this->data['MontantDuFondMlm'] = $this->MesFilleulsModel->MontantDuRoulementMlm();
      $this->data['NombreDeMembresDuJour'] = $this->UserModel->MembreInscritAuJourdHui();
      $this->data['NombreDeMembresDeLaSemaine'] = $this->UserModel->MembreInscritCetteSemaine();
      $this->data['NombreDeMembresDeCeMois'] = $this->UserModel->MembreInscritDeCeMois();
      $this->data['StockActuel'] = $this->UserModel->MembreInscritDeCeMois();*/
      $this->render('admin/dashboard_view');
  }
    
  //Tout le fonction contenu de la page de gestion des membres
  public function gestion_membres($niveau="")
  {
      
      $this->data['titre'] = 'Gestion des membres du réseau MLM';
      $this->data['page_title'] = 'Gestion membres | Administration';
      $this->data['lien'] = 'Gestion des membres';
      $this->data['niveau'] = $niveau;
      
      if($niveau=="")
      {
        $this->render('admin/gestion_membres_view');
      }
      else{
        $this->data['titre'] .=' | Matrice '.$niveau;
        $this->render('admin/gestion_membres_by_niveau_view');
      }    
  }

  public function gestion_membres_matrice_data($niveau)
  {
    $data = array();

    $usersData = $this->MatriceModel->getRows($niveau);
    
    $i = isset($_POST['start'])?$_POST['start']:0;

    foreach($usersData as $users){
        $i++; 
        $pseudo = $users['pseudo'];   
        $nom = $users['first_name'];
        $prenoms = $users['last_name'];
        $contact = $users['phone'];    
        $email = $users['email'];
        $migration = $users['date_migration'];
        $filleulGauche = $users['pseudo_filleulGauche'];
        $filleulDroit = $users['pseudo_filleulDroit'];
        $parrainMatrice = $this->Crud_model->select_parrain($pseudo,'matrice'.$niveau);
        $parrainMatrice = $parrainMatrice['clone'] == 1 ? $parrainMatrice['pseudo_user'] : $this->Crud_model->recup_reelPseudo($parrainMatrice['pseudo_user'], 'matrice'.$niveau);
        $reinvestissement = $this->Crud_model->countReInvest($pseudo,'matrice'.$niveau);
        $parrain = $users['pseudo_parrain'];   
        $action = '<span class="dropdown"><a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true"> <i class="la la-ellipsis-h"></i>  </a> <div class="dropdown-menu dropdown-menu-right">';


        $data[] = array($i,$pseudo,$nom,$prenoms,$contact,$email,$migration,$filleulGauche,$filleulDroit,$parrainMatrice,$reinvestissement,$parrain,$action);

    }


    
    $output = array(
        "draw" => isset($_POST['draw'])?$_POST['draw']:10,
        "recordsTotal" => $this->MatriceModel->countAll($niveau),
        "recordsFiltered" => $this->MatriceModel->countFiltered($niveau,$_POST),
        "data" => $data
    );
    
    // Output to JSON format
    echo json_encode($output);
  }


  public function gestion_demandes()
  {
    $this->data['titre'] = 'Gestion des demandes de rétrait';
    $this->data['page_title'] = 'Gestion des demandes | Administration';
    $this->data['lien'] = 'Gestion des demandes';
    $this->render('admin/gestion_demandes_view');
  }

  public function gestion_demandes_data()
  {
   
    $data = array();

    $demandesData = $this->DemandeModel->getRows();
    
    $i = isset($_POST['start'])?$_POST['start']:0;

    //var_dump($demandesData);die;

    foreach($demandesData as $demande){
        $i++; 
        $pseudo = $demande['pseudodestinataire']; 
        $montant_retrait = (int) $demande['montant'];  
        $montant_sur_compte = (int) $demande['montant_sur_compte'] + $montant_retrait;
        $date_demande = $demande['date_demande'];
        if($demande['typecompte']==1)
        {
          $compte = "Compte Matrice";
        }elseif($demande['typecompte']==2)
        {
          $compte = "Compte Bonus";
        }else
        {
          $compte = "Compte opération";
        }

        if($demande['status'] == 0)
        {

          $action = '<a class="btn btn-success btn-xs" href="javascript:validerM('.$demande['id'].');" title="Valider">Valider</a>
          <a href="#" class="btn btn-danger btn-xs" data-backdrop="static" data-toggle="modal" data-target="#rejete" onclick="viewinventory('.$demande['id'].')">Rejeter</a>';
        }elseif($demande['status'] == 1)
        {
          $action = '<span class="label label-success">Déjà validée</span>';
        }else
        {
          $action = '<span class="label label-danger">Rejettée</span>';
        }

        

        $data[] = array($i,$pseudo,$compte,$montant_sur_compte,$montant_retrait,$date_demande,$action);
    }

    //var_dump($data);die;
    
    $output = array(
        "draw" => isset($_POST['draw'])?$_POST['draw']:10,
        "recordsTotal" => $this->DemandeModel->countAll(),
        "recordsFiltered" => $this->DemandeModel->countFiltered($_POST),
        "data" => $data
    );
    
    // Output to JSON format
    echo json_encode($output);
  }


  public function modalrejete()
  {
     $result = '<form class="form-horizontal" action="'.site_url('admin/principal/changesatus/'.$_POST['id']).'" method="POST">
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                <label for="Title">Motif du rejet</label>
                 <textarea class="form-control" name="motif" id="inputDescription" rows="10" placeholder="Motif"></textarea>
              </div>
          </div><br>
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-success">Envoyer</button>
        </div>
      </form>';
        echo json_encode($result);
  }
  
    
  public function gestion_membres_data()
  {
    $data = array();

    $usersData = $this->MembresModel->getRows();
    
    $i = isset($_POST['start'])?$_POST['start']:0;

    foreach($usersData as $users){
        $i++; 
        $pseudo = $users['pseudo'];   
        $nom = $users['first_name'];
        $prenoms = $users['last_name'];
        $parrain = $users['pseudo_parrain'];   
        $contact = $users['phone'];   
        $genre = $users['genre']; 
        $email = $users['email'];  
        $ville = $users['ville'];   
        $niveau = $users['niveau'];  
        $created_on = date('d/m/Y', $users['created_on']);

        $action = '<span class="dropdown"><a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true"> <i class="la la-ellipsis-h"></i>  </a> <div class="dropdown-menu dropdown-menu-right">';

        $action .= '<a class="dropdown-item" href="'.site_url("/main/pdf/").$users['id'].'" target="_blank"><i class="la la-print"></i> Imprimé fiche</a>

                  <a class="dropdown-item" href="'.site_url("/main/voir/").$users['id'].'"><i class="la la-leaf"></i> Voir détail</a> 

                  <a class="dropdown-item" href="'.site_url("/main/modifier/").$users['id'].'"><i class=" la la-edit"></i> Modifier</a>  </div>  </span>';

        $data[] = array($i,$pseudo,$nom,$prenoms,$contact,$email,$niveau,$parrain,$created_on,$action);
    }

    //var_dump($data);die;
    
    $output = array(
        "draw" => isset($_POST['draw'])?$_POST['draw']:10,
        "recordsTotal" => $this->MembresModel->countAll(),
        "recordsFiltered" => $this->MembresModel->countFiltered($_POST),
        "data" => $data
    );
    
    // Output to JSON format
    echo json_encode($output);
  }   
     
    
  function generateSerialNo() {
        if($this->session->userdata('lastSerial') == '') {
            $this->session->set_userdata('lastSerial', 0);
            $this->session->set_userdata('lastPage', 1);
            $lastSerial = 0;
        } else {
            $lastSerial = $this->session->userdata('lastSerial');
        }
        $lastSerial++;
        $page = $this->input->post('page');
        if($page != '') {
            $this->session->set_userdata('lastPage', $page);
        } else {
            $this->session->set_userdata('lastPage', 1);
        }
        $this->session->set_userdata('lastSerial', $lastSerial);

        return $lastSerial;
    }
    
  function mon_bon_achat($value, $row){
      return $this->MesBonsModel->mesbons($row->pseudo);
  }
  function mon_niveau($value, $row){
      return $this->MesFilleulsModel->monNiveau($row->pseudo);
  }
    
    
    
    
  //Tout le fonction contenu de la page de gestion des SMS
 /* public function gestion_sms()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('administrator~shappinvest/connexion');
      }
      
      $crud = new grocery_CRUD();

        //$crud->set_theme('datatables');
        $crud->set_table('paiements_sms');
        $crud->set_subject('Paiement SMS');

        //$crud->required_fields('lastName');

        $output = $crud->render();

        $this->load->view('admin/gestion_sms_view.php',(array)$output);
  } */
    
    
    

  //Tout le fonction contenu de la page de gestion des retraits
  public function gestion_retraits()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('administrator~shappinvest/connexion');
      }
      
      $crud = new grocery_CRUD();

        //$crud->set_theme('datatables');
        $crud->set_table('users22');
        $crud->set_subject('Retraits');

        //$crud->required_fields('lastName');

        $output = $crud->render();

        $this->load->view('admin/gestion_retraits_view.php',(array)$output);
  } 
    
    
  //Tout le fonction contenu de la page de gestion des retraits
  public function statistiques()
  {
      
      $this->data['titre'] = 'Statistiques';
      $this->data['page_title'] = 'Statistiques | Administration';
      $this->data['lien'] = 'Statistiques';
      $this->render('admin/statistiques_view','admin_master');
      
      
      
  } 
    

  //Tout le fonction contenu de la page du bilan
  public function bilan()
  {
      
      $this->data['titre'] = 'Bilan';
      $this->data['page_title'] = 'Bilan | Administration';
      $this->data['lien'] = 'Affichage des bilan';
      $this->render('admin/bilan_view','admin_master');
  }
 
  //Tout le fonction contenu de la page de gestion fauture
  public function gestion_facture()
  {
      
      $this->data['titre'] = 'Gestion Facture';
      $this->data['page_title'] = 'Gestion Facture | Administration';
      $this->data['lien'] = 'Menu facture';
      $this->render('admin/gestion_facture_view','admin_master');
  } 

  //Tout le fonction contenu de la page de gestion des facture des client
  public function gestion_facture_client()
  {
      
      $this->data['titre'] = 'Gestion Facture Client';
      $this->data['page_title'] = 'Gestion facture client | Administration';
      $this->data['lien'] = 'Gestion de la facture client';
      $this->render('admin/gestion_facture_client_view','admin_master');
  } 

  //Tout le fonction contenu de la page entrée en stock
  public function gestion_facture_entree_stock()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['titre'] = 'Gestion facture Entrée en Stock';
      $this->data['page_title'] = 'Gestion facture Entrée en Stock | Administration';
      $this->data['lien'] = 'Gestion de la facture entrée en stock';
      $this->render('admin/gestion_facture_entree_stock_view','admin_master');
  }

  //Tout le fonction contenu de la page facture sortie de stock 
  public function gestion_facture_sortie_stock()
  {
      
      $this->data['titre'] = 'Gestion facture Sortie de Stock';
      $this->data['page_title'] = 'Gestion facture sortie de Stock | Administration';
      $this->data['lien'] = 'Gestion de la facture sortie de stock';
      $this->render('admin/gestion_facture_sortie_stock_view','admin_master');
  } 

  //Tout le fonction contenu de la page du journal caisse
  public function gestion_journal_casse()
  {
      
      $this->data['titre'] = 'Le Journal Compte Caisse';
      $this->data['page_title'] = 'Journal Caisse | Administration';
      $this->data['lien'] = 'Le Journal Compte Caisse';
      $this->render('admin/journal_caisse_view','admin_master');
      
  } 

  //Tout le fonction contenu de la page du journal caisse
  public function gestion_journal_vente()
  {
      
      $this->data['titre'] = 'Le Journal compte Vente';
      $this->data['page_title'] = 'Journal Vente | Administration';
      $this->data['lien'] = 'Le Journal Compte vente';
      $this->render('admin/journal_vente_view','admin_master');
  }  

  //Tout le fonction contenu de la page du journal caisse
  public function gestion_journal_achat()
  {
      
      $this->data['titre'] = 'Le Journal Compte Achat';
      $this->data['page_title'] = 'Journal Achat | Administration';
      $this->data['lien'] = 'Le Journal Compte Achat';
      $this->render('admin/journal_achat_view','admin_master');
  } 

  //Tout le fonction contenu de la page du journal caisse
  public function gestion_journal_banque()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['titre'] = 'Le Journal compte Banque';
      $this->data['page_title'] = 'Journal Banque | Administration';
      $this->data['lien'] = 'Le Journal Compte Banque';
      $this->render('admin/journal_banque_view','admin_master');
  }  
   
  //Tout le fonction contenu de la page de balance
  public function balance()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Balance | Administration';
      $this->data['titre'] = 'Balance';
      $this->data['lien'] = 'Affichage de la Balance';
      $this->render('admin/balance_view','admin_master');
  } 

  //Tout le fonction contenu de la page de gestion compte resultat
  public function gestion_compte_de_resultat()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Compte De Resultat | Administration';
      $this->data['titre'] = 'Compte De Resultat';
      $this->data['lien'] = 'Gestion du Compte de Resultat';
      $this->render('admin/gestion_compte_de_resultat_view','admin_master');
  } 
  //Tout le fonction contenu de la page de gestion compte resultat
  public function gestion_stock()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Gestion de Stock | Administration';
      $this->data['titre'] = 'Gestion de Stock';
      $this->data['lien'] = 'Gestion du compte resultat';
      $this->render('admin/gestion_stock_view','admin_master');
  }

  //Tout le fonction contenu de la page de gestion compte resultat
  public function facture_enrgister()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Gestion de Stock | Administration';
      $this->data['titre'] = 'Gestion de Stock';
      $this->data['lien'] = 'Gestion du compte resultat';
      $this->render('admin/gestion_stock_view','admin_master');
  }

  //Tout le fonction contenu de la page des archive
  public function gestion_archive()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Archive | Administration';
      $this->data['titre'] = 'Archive';
      $this->data['lien'] = 'Gestion des archives de facture';
      $this->render('admin/gestion_archive_view','admin_master');
  }

  //Tout le fonction contenu de la page de gestion de la comptabilité
  public function gestion_comptabilite()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'comptabilite | Administration';
      $this->data['titre'] = 'Comptabilité';
      $this->data['lien'] = 'Gestion de la comptabilite';
      $this->render('admin/gestion_comptabilite_view','admin_master');
  }

  //Tout le fonction contenu de la page gestion des pages CMS
  public function gestion_pages()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Gestion Pages | Administration';
      $this->data['titre'] = 'Gestion des Pages CMS';
      $this->data['lien'] = 'Gestion des Pages CMS';
      $this->render('admin/gestion_pages_view','admin_master');
  }

  //Tout le fonction contenu de la page gestion des pages blog
  public function blog()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Gestion blog | Administration';
      $this->data['titre'] = 'Gestion du blog CMS';
      $this->data['lien'] = 'Gestion du blog CMS';
      $this->render('admin/gestion_page_blog_view','admin_master');
  }

  //Tout le fonction contenu de la page gestion employes
  public function gestion_employes()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Gestion Des Employes | Administration';
      $this->data['titre'] = 'Gestion Des Employes';
      $this->data['lien'] = 'Gestion Des Employes';
      $this->render('admin/gestion_employes_view','admin_master');
  }
  //Tout le fonction contenu de la page role employes
  public function role_employes()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Role Des Employes | Administration';
      $this->data['titre'] = 'Role Des Employes';
      $this->data['lien'] = 'Role Des Employes';
      $this->render('admin/role_employes_view','admin_master');
  }
  //Tout le fonction contenu de la page d'affichage d'information sur l'utilisateur
  public function profil()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Profil | Administration';
      $this->data['titre'] = 'Profil';
      $this->data['lien'] = 'Profil';
      $this->render('admin/profil_view','admin_master');
  }

  //Tout le fonction contenu de la page de gestion du mot de pass de utilisateur
  public function modifier_mdp()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Modifier Mdp | Administration';
      $this->data['titre'] = 'Modifier votre Mot de Pass';
      $this->data['lien'] = 'modifier mdp';
      $this->render('admin/modifier_mdp_view','admin_master');
  }
  /* public function mon_reseau()
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
      
  }*/

    public function gestion_langues()
      {
          if(!$this->ion_auth->logged_mlm_in())
          {
            redirect('connexion');
          }
          
          /*$this->data['page_title'] = 'Gestion des langues du site | Administration';
          $this->data['titre'] = 'Gestion des langues du site';
          $this->data['lien'] = 'Gestion des langues';*/
          /*$this->data['before_head'] = '<?php foreach($output["css_files"] as $file): ?>
                                            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                                        <?php endforeach; ?>';*/
         /* $this->data['before_body'] = '<?php foreach($output["js_files"] as $file): ?>
                                            <script src="<?php echo $file; ?>"></script>
                                        <?php endforeach; ?>';*/

            $crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table("users22");
			$crud->set_subject('Membre');

			//$crud->required_fields('lastName');

			$output = $crud->render();
            
			$this->load->view('admin/gestion_langues_view.php',(array)$output);
      }
    
    public function gestion_langues_bon()
      {
          if(!$this->ion_auth->logged_mlm_in())
          {
            redirect('connexion');
          }
          
          /*$this->data['page_title'] = 'Gestion des langues du site | Administration';
          $this->data['titre'] = 'Gestion des langues du site';
          $this->data['lien'] = 'Gestion des langues';*/
          /*$this->data['before_head'] = '<?php foreach($output["css_files"] as $file): ?>
                                            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                                        <?php endforeach; ?>';*/
         /* $this->data['before_body'] = '<?php foreach($output["js_files"] as $file): ?>
                                            <script src="<?php echo $file; ?>"></script>
                                        <?php endforeach; ?>';*/

            $crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('langues');
			$crud->set_subject('Langue');

			//$crud->required_fields('lastName');

			$output = $crud->render();
            
			$this->load->view('admin/gestion_langues_view.php',(array)$output);
      }





      public function gestion_newletter()
      {
          if(!$this->ion_auth->logged_mlm_in())
          {
            redirect('connexion');
          }
            $crud = new grocery_CRUD();

          //$crud->set_theme('datatables');
          $crud->set_table('newletters');
          $crud->set_subject('Email des visiteurs');
          $crud->unset_add();
          $crud->unset_edit();
          $crud->display_as('email','Adresse email');
          $crud->display_as('date_create',"Date d'Ajout");
          $crud->callback_read_field('date_create', function ($value, $primary_key) {
            return date("d/m/Y H:i", $value);
          });
          $crud->callback_column('date_create',array($this,'_callback_format_date'));
          $output = $crud->render();
          $this->load->view('admin/newletters_visiteur_view.php',(array)$output);
      }

      public function gestion_contacts()
      {
          if(!$this->ion_auth->logged_mlm_in())
          {
            redirect('connexion');
          }
            $crud = new grocery_CRUD();

          //$crud->set_theme('datatables');
          $crud->set_table('contact_visiteurs');
          $crud->set_subject('Contacts des visiteurs');
          $crud->unset_add();
          $crud->unset_edit();
          $crud->display_as('email','Adresse email');
          $crud->display_as('date_create',"Date d'Ajout");
          $crud->callback_read_field('date_create', function ($value, $primary_key) {
            return date("d/m/Y H:i", $value);
          });
          $crud->callback_column('date_create',array($this,'_callback_format_date'));
          $output = $crud->render();
          $this->load->view('admin/contact_visiteur_view.php',(array)$output);
      }

      public function gestion_blogs()
      {
          if(!$this->ion_auth->logged_mlm_in())
          {
            redirect('connexion');
          }
            $crud = new grocery_CRUD();

          $crud->set_table('article_blog');
          $crud->set_subject('Articles du blog');

          $crud->display_as("date_create", "Dernière modification");
          $crud->display_as("titre_article", "Titre de l'article");
          $crud->display_as("description_article", "Description de l'article");
          $crud->display_as("img_article", "Image de l'article");
          $crud->display_as("id_categorie", "Catégories");
          $crud->field_type('date_create','hidden', time());
          $crud->field_type('poster_par','hidden', $this->session->userdata('identity'));

          //Formatage des affichages
          $crud->callback_column('date_create',array($this,'_callback_format_date'));
          $crud->callback_column('description_article',array($this,'_callback_format_des'));
          $crud->callback_read_field('id_categorie', function($value, $primary_key){
            $value = explode(',', $value);
            $cate = '[';
            foreach ($value as $values){
               $namecate = $this->fm->lescategoriesArticle($values);
               $cate .= $namecate->lib_cate.' , ';
            }

            $cate .= ']';

            return $cate;
          });

          //GESTION IMAGES
          $this->load->config('grocery_crud');
          $this->config->set_item('grocery_crud_file_upload_allow_file_types','jpeg|jpg|png');
          $crud->set_field_upload('img_article','assets/uploads/files/article_blogs/');

          $crud->required_fields('img_article', 'titre_article', 'description_article');

          $crud->callback_read_field('img_article', function ($value, $primary_key){
            if (!empty($value)) {
              return '<img src="'.site_url('assets/uploads/files/article_blogs/').$value.'" width="100" height="70" />';
            }else
              return "Pas d'image";
          });

          //LES CATEGORIES 
          $results = $this->fm->selectAllCategories();
          $multiselect = array();

          foreach ($results as $result) {
              $multiselect[$result->id] = $result->lib_cate;
          }

          $crud->set_relation('type_blog','type_blog','lib_type');           

          $crud->callback_before_delete(array($this,'delete_before_'));

          $crud->field_type('id_categorie', 'multiselect', $multiselect);

          //$crud->callback_before_insert(array($this,'encrypt_password_callback'));
          //SUPPRIMER DES ACTIONS
          $crud->unset_clone();

          $output = $crud->render();
          $this->load->view('admin/gestion_blog_view.php',(array)$output);
      }

      function _callback_format_date($value, $row)
      {
        return strftime("%d/%m/%Y",$row->date_create);
      }


      function _callback_format_des($value, $row)
      {
        if(strlen($row->description_article) > 30) {
          return substr($row->description_article, 0, 30).'...';
        }else
           return $row->description_article;
         
      }

      public function delete_before_($primary_key)
      {
         $article = $this->db->where('id_article',$primary_key)->get('article_blog')->row();
         $url = 'assets/uploads/files/article_blogs/'.$article->img_article;
         unlink($url);
         //var_dump($article);die;
         return true;
      }



}