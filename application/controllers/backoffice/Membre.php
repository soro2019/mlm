<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Membre extends Backoffice_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    $this->load->model(['UserModel', 'Crud_model']);
    $membre = $this->data['membre'];
    $this->data['nom_membre'] = $membre['first_name'];
    $this->data['prenom_membre'] = $membre['last_name'];
    $this->data['dateInscription'] = $membre['created_on'];
    $this->data['email_membre'] = $membre['email'];
    $this->data['img_membre'] = $membre['img_profil'];
    $this->data['achat_ini'] = $membre['achat_ini'];
    $this->data['niveau'] = $membre['niveau'];
    $this->data['membre'] = $membre;
  }

  public function index()
  {
  }

  
  public function deconnexion()
  {
      $this->ion_auth->logout();
      redirect('connexion', 'refresh');
  }
    
    public function mdp_oublie()
  {
      $this->render('backoffice/mdp_oublie_view', null);
  }

    
  public function profil($lang='')
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      defineLanguage($lang);
      $this->data['listepays'] = $this->Crud_model->listePays();
      $this->data['titre'] = get_phrase('my profile');
      $this->data['page_description'] = get_phrase('member information');
      $this->data['page_author'] = 'profil';
      $user = $this->data['user'] = $this->data['membre'];
      $compte_ex = $this->data['compte_ex'];

      if($this->input->post())
      {
        if($this->input->post('settings-payement') != null)
        {
          if($compte_ex)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('vous avez déjà configurer ses paramètres de paiement, pour les modifiés merci de cliquer sur le menu : Données personnelles => sécurité')));
          }else
          {
            $data = ['par_bitcoin' =>$this->input->post('bitcoin'), 'par_payeer' =>$this->input->post('payeer'), 'par_perfect_money' =>$this->input->post('perfect_money'), 'pseudo_proprio' =>trim($this->session->userdata('identity')), 'date_create' =>time()];
            $this->Crud_model->insertion_('comptes_externes', $data);
            $this->session->set_flashdata('message', ucfirst(get_phrase('paramètres de paiement configuré avec succès')));
              redirect(trim($_SESSION['language']).'/backoffice/my-profile','refresh');
          }
        }
        if($this->input->post('settings') != null)
        {
          $date_n = formtageDate22($this->input->post('date_naissance'));
          if(empty($this->input->post('first_name')) || empty($this->input->post('last_name')) || empty($this->input->post('genre')) || empty($this->input->post('Lieu_naissance')) || empty($this->input->post('date_naissance')) || empty($this->input->post('pays')) || empty($this->input->post('phone')) || empty($this->input->post('ville')) || empty($this->input->post('region')) || empty($this->input->post('email')))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('merci de remplir correctement le formulaire avec tous les informations demandées')));

          }elseif($this->UserModel->EmailExiste2($this->input->post('email'), $user['id']))
          {
             $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('désolé! Cet adresse email est déjà utilisée.')));
          }elseif($this->UserModel->PhoneExiste2($this->input->post('phone'), $user['id']))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('désolé! Cet numéro de téléphone est déjà utilisée.')));

          }elseif($this->UserModel->NomExiste($this->input->post('first_name'), $user['id']) && $this->UserModel->PrenomsExiste($this->input->post('last_name'), $user['id']) && $this->UserModel->DateNaissanceExiste($date_n, $user['id']) && $this->UserModel->LieuNaissanceExiste($this->input->post('Lieu_naissance'), $user['id']))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('les informations saisie sont déjà utilisée par un autre utilisateur')));
          }else
          {

             $pays = $this->Crud_model->listePays($this->input->post('pays'));
             $new_data = array(
                    'email' => test_inputValide($this->input->post('email')),
                    'first_name' => test_inputValide($this->input->post('first_name')),
                    'last_name' => test_inputValide($this->input->post('last_name')),
                    'genre' => test_inputValide($this->input->post('genre')),
                    'Lieu_naissance' => test_inputValide($this->input->post('Lieu_naissance')),
                    'date_naissance' => test_inputValide($date_n),
                    'pays' => test_inputValide($pays['id']),
                    'phone' => test_inputValide($this->input->post('phone')),
                    'ville' => test_inputValide($this->input->post('ville')),
                    'region' => test_inputValide($this->input->post('region')),
                    'code_postal' => test_inputValide($this->input->post('code_postal')),
              );
              if($this->UserModel->MajProfil($new_data, $user['id'])){
                  $this->session->set_flashdata('message', ucfirst(get_phrase('profil mis à jour')));
                  redirect(trim($_SESSION['language']).'/backoffice/my-profile','refresh');
              }else
              {
                $this->session->set_flashdata('message_erreur', $this->ion_auth->messages());
              } 
          }
        }

      }

      $this->render('backoffice/profil_view','backoffice_master');
  }
  
    
  public function modifier_profil($lang='')
  {
      defineLanguage($lang);
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = ucwords(get_phrase('modifier mon profil'));
      $this->data['titre'] =ucwords(get_phrase('mon profil'));
      $this->data['page_description'] = ucwords(get_phrase('modifier mon profil'));
      $this->data['page_author'] = 'modifier_profil';
      $user = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
      $this->data['user'] = $user;
      if ($user['social_reseau']==""){$user['social_reseau']='{"facebook": "" ,"skype": "" ,"twitter": ""}'; }
      $socials = json_decode($user['social_reseau']);
      $this->data['social_reseau'] = $socials;
      $this->data['listepays'] = $this->Crud_model->listePays();

      if($this->input->post('modifier-profil') !== null)
      {
        $socials = '{"facebook": "'.$this->input->post('facebook').'" ,';
        $socials.='"skype": "'.$this->input->post('skype').'" ,';
        $socials.='"twitter": "'.$this->input->post('twitter').'"}';
        $date_n = formtageDate22($this->input->post('date'));

        if(empty($this->input->post('nom')) || empty($this->input->post('prenoms')) || empty($this->input->post('genre')) || empty($this->input->post('lieu_naissance')) || empty($this->input->post('date')) || empty($this->input->post('pays')) || empty($this->input->post('telephone')) || empty($this->input->post('ville')) || empty($this->input->post('region')) || empty($this->input->post('email')) )
        {
          $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('merci de remplir correctement le formulaire avec tous les informations demandées')));

        }elseif($this->UserModel->EmailExiste2($this->input->post('email'), $user['id']))
        {
           $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('désolé! Cet adresse email est déjà utilisée.')));
        }elseif($this->UserModel->PhoneExiste2($this->input->post('telephone'), $user['id']))
        {
          $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('désolé! Cet numéro de téléphone est déjà utilisée.')));
        }elseif($this->UserModel->NomExiste($this->input->post('nom'), $user['id']) && $this->UserModel->PrenomsExiste($this->input->post('prenoms'), $user['id']) && $this->UserModel->DateNaissanceExiste($date_n, $user['id']) && $this->UserModel->LieuNaissanceExiste($this->input->post('lieu_naissance'), $user['id']))
        {
          $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('les informations saisie sont déjà utilisée par un autre utilisateur')));
        }else
        {

          $pays = $this->Crud_model->listePays($this->input->post('pays'));
          $new_data = array(
                    'social_reseau' => $socials,
                    'email' => test_inputValide($this->input->post('email')),
                    'first_name' => test_inputValide($this->input->post('nom')),
                    'last_name' => test_inputValide($this->input->post('prenoms')),
                    'genre' => test_inputValide($this->input->post('genre')),
                    'Lieu_naissance' => test_inputValide($this->input->post('lieu_naissance')),
                    'date_naissance' => test_inputValide($date_n),
                    'pays' => test_inputValide($pays['id']),
                    'phone' => test_inputValide($this->input->post('telephone')),
                    'ville' => test_inputValide($this->input->post('ville')),
                    'region' => test_inputValide($this->input->post('region')),
                    'code_postal' => test_inputValide($this->input->post('code_postal')),
              );
              if($this->UserModel->MajProfil($new_data, $user['id'])){
                  $this->session->set_flashdata('message', ucfirst(get_phrase('profil mis à jour')));
                  redirect(trim($_SESSION['language']).'/backoffice/my-profile','refresh');
              }else
              {
                $this->session->set_flashdata('message_erreur', $this->ion_auth->messages());
              } 
        }
  
      }


      $this->render('backoffice/modif_informations','backoffice_master');
  }
    
    
  public function modifier_mdp()
  {
       
      $this->data['page_title'] = 'Modifier mon mot de passe';
      $this->data['titre'] = 'modifier-mdp';
      $user = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
      $this->data['user'] = $user;
       
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
       elseif($this->ion_auth->in_group('admin'))
      {
        redirect('admin');

      }

      elseif($this->input->post('modifier-mdp') !== null) {
        $old = $this->input->post('ancien');
        $new = $this->input->post('nouveau');
        $confirme = $this->input->post('confirmer');
        
        if(!$this->ion_auth->hash_password_db($user['id'], $old)){
            $this->session->set_flashdata('message', 'Votre mot de passe actuel est incorrect');
            redirect('backoffice/modifier-mot-de-passe','refresh');
        }
        else{
          if($new == $confirme){
              $new_data = array(
                'password' => $this->input->post('nouveau')

              );

              if($this->ion_auth->update($user['id'],$new_data)){
                  $this->session->set_flashdata('message-bon', 'Mot de passe mis à jour !');
                  redirect('backoffice/modifier-mot-de-passe','refresh');
              }
              else{
                  $this->session->set_flashdata('message', $this->ion_auth->messages());
                  $this->load->helper('form');
                  $this->render('backoffice/changer_mdp_view','backoffice_master');
              }
          }
        
          else{
             $this->session->set_flashdata('message', 'Mots de passe différent');
             redirect('backoffice/modifier-mot-de-passe','refresh');

          }
              
        }
        
      
      }
      else{
         $this->load->helper('form');
         $this->render('backoffice/changer_mdp_view','backoffice_master');
      }
  } 

// created the page for bakoffice
  public function buy_investment_package(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Buy investment package';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        $this->render('backoffice/buy_investment_package_view','backoffice_master');
  }

  public function my_investment_package(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'My investment package';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        $this->render('backoffice/my_investment_package_view','backoffice_master');
  }
  public function internal_transactions(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Internal transactions';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        

        
        //$this->data['membreNiveau1'] = $this->MesFilleulsModel->tousmembresniveau(1);
        
        $this->render('backoffice/internal_transactions_view','backoffice_master');
  }
  public function financial_transactions(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Financial transactions';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        

        
        //$this->data['membreNiveau1'] = $this->MesFilleulsModel->tousmembresniveau(1);
        
        $this->render('backoffice/internal_transactions_view','backoffice_master');
  }
  public function new_partners_registration(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'New partners registration';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        $this->render('backoffice/financial_transactions_view','backoffice_master');
  }
  public function partners_list(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Partners list';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        $this->render('backoffice/partners_list_view','backoffice_master');
  } 

  public function profile_data(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Profile data';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        $this->render('backoffice/profile_data_view','backoffice_master');
  }

  public function your_level(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Your level';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        

        
        //$this->data['membreNiveau1'] = $this->MesFilleulsModel->tousmembresniveau(1);
        
        $this->render('backoffice/buy_investment_package_view','backoffice_master');
  }

  public function my_documents(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'My documents';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        

        
        //$this->data['membreNiveau1'] = $this->MesFilleulsModel->tousmembresniveau(1);
        
        $this->render('backoffice/buy_investment_package_view','backoffice_master');
  }

  public function security(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Security';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        

        
        //$this->data['membreNiveau1'] = $this->MesFilleulsModel->tousmembresniveau(1);
        
        $this->render('backoffice/buy_investment_package_view','backoffice_master');
  }

  public function promotional_materials(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Promotional materials';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        $this->render('backoffice/buy_investment_package_view','backoffice_master');
  }

  public function signup_new_partner(){
    if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
        
        $this->data['titre'] = 'Signup new partner';
        $this->data['page_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
        $this->data['page_author'] = 'SHAPPINVEST';
        $this->render('backoffice/buy_investment_package_view','backoffice_master');
  }

  
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
  /* CODE CONCU POUR MTN MONEY SEUL */

  /*  public function inscription()
  {
      $this->data['page_title'] = 'Inscription';
      
        if ($this->uri->segment(2) !== FALSE)
        {
            $this->data['pseudo_parrain'] = $this->uri->segment(2);
            $noms_parrain =   $this->UserModel->GetUserDataByPseudo($this->uri->segment(2));
            $this->data['nom_parrain'] = $noms_parrain['nom'].'&nbsp;'.$noms_parrain['prenoms'];
        }
              
      $this->load->library('form_validation');
      $this->form_validation->set_rules('pseudo_parrain','Pseudo du parrain','trim|required');
      $this->form_validation->set_rules('nom','Nom','trim|required');
      $this->form_validation->set_rules('prenoms','Prénoms','trim|required');
      $this->form_validation->set_rules('date','Date de naissance','trim|required');
      $this->form_validation->set_rules('lieu','Lieu de naissance','trim|required');
      $this->form_validation->set_rules('pseudo','Pseudo','trim|required|is_unique[users.pseudo]');
      $this->form_validation->set_rules('password','Mot de passe','required');
      $this->form_validation->set_rules('pays','Votre Pays','trim|required');
      $this->form_validation->set_rules('telephone','Téléphone','trim|required|is_unique[users.telephone]');
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('ville','Ville','trim|required');
      $this->form_validation->set_rules('adresse','Adresse','trim|required');
      $this->form_validation->set_rules('num_mtn_money','Votre numéro mtn money','trim|required');
      
      $this->form_validation->set_rules('first_name','','trim');
      $this->form_validation->set_rules('last_name','','trim');
      $this->form_validation->set_rules('company','','trim');
      $this->form_validation->set_rules('phone','','trim');
      $this->form_validation->set_rules('username','','trim|required|is_unique[users.username]');
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password','Password','required');
      $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
      $this->form_validation->set_rules('groups[]','Groups','required|integer');

      if($this->form_validation->run() == FALSE)
      {
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);
      }
      else
      {
        
          
         $row =   $this->UserModel->GetUserDataByPseudo($this->input->post('pseudo_parrain'));
          $parrain_inscrit = $row['nom'].'&nbsp;'.$row['prenoms'];
            $inscription_data = array(
              'pseudo' => $this->input->post('pseudo'),
              'email' => $this->input->post('email'),
              'password' => $this->input->post('password'),
              'pseudo_parrain' => $this->input->post('pseudo_parrain'),
              'nom' => $this->input->post('nom'),
              'prenoms' => $this->input->post('prenoms'),
              'date' => $this->input->post('date'),
              'lieu' => $this->input->post('lieu'),
              'pays' => $this->input->post('pays'),
              'telephone' => $this->input->post('telephone'),
              'ville' => $this->input->post('ville'),
              'adresse' => $this->input->post('adresse'),
              'num_mtn_money' => $this->input->post('num_mtn_money'),
              'parrain_inscrit' => $parrain_inscrit
            );
          
        
        $this->session->set_userdata($inscription_data);
        redirect('/confirmation');
      }
      
      
      
      
  }*/
    
  /* public function confirmation_inscription()
  {
      $this->data['page_title'] = 'Confirmation de l\'inscription';
      
      if($this->input->post('confirmation') === 'True')
      {
                
        $pseudo = $this->session->userdata('pseudo');
              
        
        $this->load->model('MTNMoney');
          
          $prix = 12600;
          $telephone_mtn = $this->session->userdata('num_mtn_money');
          $reference = date('dmy');
        
        if($this->MTNMoney->DoMTNTransaction1($prix,$telephone_mtn,$reference,$pseudo)){
            if ($this->session->userdata('reponse_retout_attente')->ResponseCode == 1000){
                $message = 'La transaction est en attente';
                $this->session->set_flashdata('message',$message);
                $this->session->set_userdata('reference',$reference);
                redirect('/paiement-attente','refresh');
            }
            elseif($this->session->userdata('reponse_retout_attente')->ResponseCode == 529) {
                $message_erreur = 'Nous n\'avez pas assez de fonds dans votre compte MTN Money.';
                $this->session->set_flashdata('message_erreur',$message_erreur);
                $this->load->helper('form');
                $this->render('backoffice/confirmation_inscription_view',null);
            }
            else {
                $message_erreur = 'Une erreur est survenue sur la plateforme MTN MONEY. Veuillez réessayer plutard.';
                $this->session->set_flashdata('message_erreur',$message_erreur);
                $this->load->helper('form');
                $this->render('backoffice/confirmation_inscription_view',null);
            }
        } 
        else{
            $message_erreur = 'Une erreur est survenue lors de la procédure de payement veuillez réessayer svp';
            $this->session->set_flashdata('message_erreur',$message_erreur);
            $this->load->helper('form');
            $this->render('backoffice/confirmation_inscription_view',null);
        }
          
      }
      else {
          $this->load->helper('form');
          $this->render('backoffice/confirmation_inscription_view',null);
      }
      
      
  } */
    
    
  /*public function paiement_attente_mtn()
  {
            
      $this->render('backoffice/paiement_attente_view',null);
  }*/
    
  public function ipn_mtn()
  {
     /* if ($this->input->post('Reference') !== null) {
          if($this->input->post('ResponseCode') == '01'){
              if($this->session->set_userdata('BillMapTransactionId') == $this->input->post('BillMapTransactionId')){
                  if($this->session->set_userdata('EWPTransactionId') == $this->input->post('EWPTransactionId')){
                        $message = 'L\'achat a été effectué avec succès';
                        $this->session->set_flashdata('message',$message);
                        redirect('/inscription-effective','refresh');
                  }
              }
          }
      }*/
      /*$post = file_get_contents('php://input'); 
      $data = json_decode($post); 
      $reference=$data->reference; //This is your order id, mark this as paid<br ?--> $reason=$data->reason; //reason you stated 
     $txid=$data->transactionId; //Easypay transction Id 
     $amount=$data->amount; //amount deposited 
     $phone=$data->phone;*/
      
      if ($this->input->post('Reference') !== null) {
          if($this->input->post('ResponseCode') == '01'){
              if($this->session->set_userdata('BillMapTransactionId') == $this->input->post('BillMapTransactionId')){
                  if($this->session->set_userdata('EWPTransactionId') == $this->input->post('EWPTransactionId')){
                        $message = 'L\'achat a été effectué avec succès';
                        $this->session->set_flashdata('message',$message);
                        redirect('/inscription-effective','refresh');
                  }
              }
          }
      }
      
  }
    
  /*public function inscription_effective() 
  {
      
        $pseudo = $this->session->userdata('pseudo');
        $email = $this->session->userdata('email');
        $password = $this->session->userdata('password');
        $reference = $this->session->userdata('reference');
        $group_ids = 3;
          
          $additional_data = array(
          'pseudo_parrain' => $this->UserModel->GetParrainLibre($this->session->userdata('pseudo_parrain')),
          'nom' => $this->session->userdata('nom'),
          'prenoms' => $this->session->userdata('prenoms'),
          'date' => $this->session->userdata('date'),
          'lieu' => $this->session->userdata('lieu'),
          'pays' => $this->session->userdata('pays'),
          'telephone' => $this->session->userdata('telephone'),
          'ville' => $this->session->userdata('ville'),
          'adresse' => $this->session->userdata('adresse')  
          );
      $this->ion_auth->register($pseudo, $password, $email, $additional_data, $group_ids);
      $this->session->set_flashdata('message',$this->ion_auth->messages());
      
      $this->load->helper('form');
      $this->render('backoffice/inscription_effective_view',null); 
      
  } 
    */
    

    
    
    public function correction()
  {
      $this->data['page_title'] = 'Correction';
      if($this->input->post())
      {
        $this->UserModel->CorrigerMesFilleuls();        
      }
      $this->load->helper('form');
      $this->render('backoffice/correction_view',null);
  }
    
   public function correction_date()
  {
      $this->data['page_title'] = 'Correction Date';
      if($this->input->post())
      {
        $this->UserModel->CorrigerDate();        
      }
      $this->load->helper('form');
      $this->render('backoffice/correction_view',null);
  } 
    public function correction_date_niveau()
  {
      $this->data['page_title'] = 'Correction Date Niveau';
      if($this->input->post())
      {
        $this->UserModel->CorrigerDateNiveau();        
      }
      $this->load->helper('form');
      $this->render('backoffice/correction_view',null);
  }
    
    
   public function correction_bon()
  {
      $this->data['page_title'] = 'Correction Bon';
      if($this->input->post())
      {
        $this->UserModel->CorrigerBon();        
      }
      $this->load->helper('form');
      $this->render('backoffice/correction_view',null);
  } 
    
   public function correction_niveau()
  {
      $this->data['page_title'] = 'Correction niveau';
      if($this->input->post())
      {
        $this->UserModel->CorrigerNiveau();        
      }
      $this->load->helper('form');
      $this->render('backoffice/correction_view',null);
  } 
    
  public function correction_date_filleuls()
  {
      $this->data['page_title'] = 'Correction Date filleul';
      if($this->input->post())
      {
        $this->UserModel->CorrigerDateMesFilleuls();        
      }
      $this->load->helper('form');
      $this->render('backoffice/correction_view',null);
  }   
    
    
}












/*


public function AjouterFilleulEtGains_old($pseudo_parrain,$pseudo_filleul,$side){
        $created= strftime('%d-%m-%Y %H:%M:%S');
        $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$pseudo_parrain','$pseudo_filleul','1','$side','$created') ";
        
        
        if($this->db->query($sql)){
            $this->load->model('MesFilleulsModel');
            
            if($this->MesFilleulsModel->membresreseauperso($pseudo_parrain) == 0){
                $gains_parrain = 450;
            }
            elseif($this->MesFilleulsModel->membresreseauperso($pseudo_parrain) == null){
                $gains_parrain = 450;
            }
            else{
                $gains_parrain = 500;
            } 
            
            $gain = "UPDATE mes_bons SET gains = '$gains_parrain' WHERE pseudo_utilisateur = '$pseudo_parrain' ";
            $this->db->query($gain);
            
            $this->db->select('pseudo_utilisateur,gains');
            $this->db->from('mes_bons');
            $this->db->where('pseudo_utilisateur','xxxemaster');
            $gains_e = $this->db->get();
            $gains_emast = $gains_e->row();
            $gains_emaster = $gains_emast->gains + 200;
            
            $gain_emastere = "UPDATE mes_bons SET gains = '$gains_emaster' WHERE pseudo_utilisateur = 'xxxemaster' ";
            $this->db->query($gain_emastere);
            
            
            
            $this->db->select('marge_beneficiaire');
            $this->db->from('gains_gie');
            $this->db->where('id',1);
            $gains_gi = $this->db->get();
            $gains_giee = $gains_gi->row();
            $gains_gie = $gains_giee->marge_beneficiaire + 1094;
            
            $gain_giee = "UPDATE gains_gie SET marge_beneficiaire = '$gains_gie' WHERE id = 1 ";
            $this->db->query($gain_giee);
            
            
            $this->db->select('roulement');
            $this->db->from('gains_gie');
            $this->db->where('id',1);
            $gains_rou = $this->db->get();
            $gains_roull = $gains_rou->row();
            $gains_roul = $gains_roull->roulement + 10806;
            
            $gain_roulement = "UPDATE gains_gie SET roulement = '$gains_roul' WHERE id = 1 ";
            $this->db->query($gain_roulement);
            
            
            $this->db->select('id,pseudo_utilisateur,niveau_filleul,side');
            $this->db->from($this->Table);
            $this->db->where("pseudo_filleul",$pseudo_parrain);
            $query = $this->db->get();
            
            foreach($query->result_array() as $row){
                $niveau = $row['niveau_filleul'];
                $niveauActu = $niveau + 1;
                
                if($niveau == 3){
                                       
                        $side = $row['side'];
                        $parrain = $row['pseudo_utilisateur'];
                        $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$parrain','$pseudo_filleul','$niveauActu','$side','$created') ";
                        $this->db->query($sql);
                    

                        $this->db->select('pseudo_utilisateur,gains');
                        $this->db->from('mes_bons');
                        $this->db->where("pseudo_utilisateur",$parrain);
                        $gains_act = $this->db->get();

                        $gains_actu = $gains_act->row();
                        $gains_parrainhaut = $gains_actu->gains + 500;
                        $gain_parrain = "UPDATE mes_bons SET gains = '$gains_parrainhaut' WHERE pseudo_utilisateur = '$parrain'";
                        $this->db->query($gain_parrain);

                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roul_actu = $roul - 500;
                        $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                        $this->db->query($roulement_actu);
                    
                        $sql = "SELECT pseudo_utilisateur FROM mes_filleuls WHERE pseudo_utilisateur = '$parrain' AND niveau_filleul='$niveauActu'";
                        $query = $this->db->query($sql);
                        $nbre_filleuls = $query->num_rows();
                        
                        if($nbre_filleuls == 16){
                            $this->db->select('roulement');
                            $this->db->from('gains_gie');
                            $this->db->where('id',1);
                            $roul = $this->db->get();
                            $roul_actu = $roul - 20000;
                            $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                            $this->db->query($roulement_actu);
                        }
                    
                    
                }
                
                elseif($niveau == 4){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$parrain','$pseudo_filleul','$niveauActu','$side','$created') ";
                    $this->db->query($sql);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row();
                    $gains_parrainhaut = $gains_actu->gains + 500;
                    $gain_parrain = "UPDATE mes_bons SET gains = '$gains_parrainhaut' WHERE pseudo_utilisateur = '$parrain'";
                    $this->db->query($gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roul_actu = $roul - 500;
                    $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                    $this->db->query($roulement_actu);

                    $sql = "SELECT pseudo_utilisateur FROM mes_filleuls WHERE pseudo_utilisateur = '$parrain' AND niveau_filleul='$niveauActu'";
                    $query = $this->db->query($sql);
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 32){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roul_actu = $roul - 30000;
                        $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                        $this->db->query($roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 5){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$parrain','$pseudo_filleul','$niveauActu','$side','$created') ";
                    $this->db->query($sql);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row();
                    $gains_parrainhaut = $gains_actu->gains + 500;
                    $gain_parrain = "UPDATE mes_bons SET gains = '$gains_parrainhaut' WHERE pseudo_utilisateur = '$parrain'";
                    $this->db->query($gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roul_actu = $roul - 500;
                    $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                    $this->db->query($roulement_actu);

                    $sql = "SELECT pseudo_utilisateur FROM mes_filleuls WHERE pseudo_utilisateur = '$parrain' AND niveau_filleul='$niveauActu'";
                    $query = $this->db->query($sql);
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 64){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roul_actu = $roul - 50000;
                        $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                        $this->db->query($roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 6){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$parrain','$pseudo_filleul','$niveauActu','$side','$created') ";
                    $this->db->query($sql);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row();
                    $gains_parrainhaut = $gains_actu->gains + 500;
                    $gain_parrain = "UPDATE mes_bons SET gains = '$gains_parrainhaut' WHERE pseudo_utilisateur = '$parrain'";
                    $this->db->query($gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roul_actu = $roul - 500;
                    $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                    $this->db->query($roulement_actu);

                    $sql = "SELECT pseudo_utilisateur FROM mes_filleuls WHERE pseudo_utilisateur = '$parrain' AND niveau_filleul='$niveauActu'";
                    $query = $this->db->query($sql);
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 128){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roul_actu = $roul - 150000;
                        $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                        $this->db->query($roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 7){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$parrain','$pseudo_filleul','$niveauActu','$side','$created') ";
                    $this->db->query($sql);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row();
                    $gains_parrainhaut = $gains_actu->gains + 500;
                    $gain_parrain = "UPDATE mes_bons SET gains = '$gains_parrainhaut' WHERE pseudo_utilisateur = '$parrain'";
                    $this->db->query($gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roul_actu = $roul - 500;
                    $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                    $this->db->query($roulement_actu);

                    $sql = "SELECT pseudo_utilisateur FROM mes_filleuls WHERE pseudo_utilisateur = '$parrain' AND niveau_filleul='$niveauActu'";
                    $query = $this->db->query($sql);
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 256){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roul_actu = $roul - 250000;
                        $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                        $this->db->query($roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 9){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$parrain','$pseudo_filleul','$niveauActu','$side','$created') ";
                    $this->db->query($sql);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row();
                    $gains_parrainhaut = $gains_actu->gains + 500;
                    $gain_parrain = "UPDATE mes_bons SET gains = '$gains_parrainhaut' WHERE pseudo_utilisateur = '$parrain'";
                    $this->db->query($gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roul_actu = $roul - 500;
                    $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                    $this->db->query($roulement_actu);

                    $sql = "SELECT pseudo_utilisateur FROM mes_filleuls WHERE pseudo_utilisateur = '$parrain' AND niveau_filleul='$niveauActu'";
                    $query = $this->db->query($sql);
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 1024){
                        
                        $data = array(
                                'fini' => 1
                        );
                        $this->db->where('pseudo', $parrain);
        
                        $this->db->update('users', $data); 
                    }
                    
                }
                
                                
                
                
                elseif($niveau >= 10){
                    
                }
                
                else {
                    $niveauActu = $niveau + 1;
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $sql = "INSERT INTO mes_filleuls (pseudo_utilisateur, pseudo_filleul, niveau_filleul, side, created) VALUES ('$parrain','$pseudo_filleul','$niveauActu','$side','$created') ";
                    $this->db->query($sql);

                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row();
                    $gains_parrainhaut = $gains_actu->gains + 500;
                    $gain_parrain = "UPDATE mes_bons SET gains = '$gains_parrainhaut' WHERE pseudo_utilisateur = '$parrain' ";
                    $this->db->query($gain_parrain);
                    
                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roul_actu = $roul - 500;
                    $roulement_actu = "UPDATE gains_gie SET roulement = '$roul_actu' WHERE id = 1 ";
                    $this->db->query($roulement_actu);
                    
                    
                }
                
            }           
            
        }
        else return false;
   }

*/