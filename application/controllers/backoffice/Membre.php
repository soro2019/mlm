<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Membre extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
        
      
    $this->load->library('ion_auth');
    $this->load->model('UserModel');
    $this->load->model('MesFilleulsModel');
    $this->load->model('MesBonsModel');
    $this->load->model('MessenkaModel');
    $this->load->model('AgenceModel');
      
    /*$this->data['pseudo'] = $this->session->userdata('identity');
    $noms_membre = $this->UserModel->GetUserDataByPseudo('admin');*/
    /*$this->data['nom_membre'] = $noms_membre['nom'];
    $this->data['prenom_membre'] = $noms_membre['prenoms'];
    $this->data['dateInscription'] = $noms_membre['creele'];
    $this->data['email_membre'] = $noms_membre['email'];
    $this->data['img_membre'] = $noms_membre['img_profil'];
  
      $this->data['membrereseauperso'] = $this->MesFilleulsModel->membresreseauperso($this->session->userdata('identity'));
      $this->data['mesbons'] = $this->MesBonsModel->mesbons($this->session->userdata('identity'));
      $this->data['monNiveau'] = $this->MesFilleulsModel->monNiveau($this->session->userdata('identity'));
      $this->data['inscritoday'] = $this->MesFilleulsModel->inscritoday($this->session->userdata('identity'));

      $this->data['articles'] = $this->FronteModel->selectArticles();*/
  }

  public function index()
  {
  }

  public function connexion()
  {
      $this->data['titre'] = 'Login / Sign Up';
      $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
      $this->data['page_title'] = 'LOGIN / SIGN UP';
      $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
      if($this->input->post())
      {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('identity', '', 'trim|required');
        $this->form_validation->set_rules('password', '', 'required');
        if($this->form_validation->run()===TRUE)
        {
          $souvenir = (bool) 1;
          if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $souvenir))
          {
              
              if($this->ion_auth->in_group('membres'))
                {
                  redirect('backoffice','refresh');
                }
              else {
                $this->session->unset_userdata(array('identity','password'));
                $this->session->set_flashdata('message','Vous n\'êtes pas sur le bon espace de connexion Monsieur l\'administrateur');}
          }
          else
          {
            $this->session->set_flashdata('message',$this->ion_auth->errors());
            redirect('login-signup','refresh');
          }
        }
      }
      
      if ($this->input->is_ajax_request()) {
            $ajax->alert("Server Says....\n\t\t".print_r($form_fields,1));
      }
      $this->load->helper('form');
      $this->render('public/login_signup_view','front_master');
  }
  
  
  public function deconnexion()
  {
      $this->ion_auth->logout();
      redirect('login-signup', 'refresh');
  }
    
    public function mdp_oublie()
  {
      $this->render('backoffice/mdp_oublie_view', null);
  }
  
  public function inscription()
  {
      $this->data['titre'] = 'registration';
      $this->data['meta_keywords'] = 'SHAPPINVEST, investment on rentals, source of happiness';
      $this->data['page_title'] = 'REGISTRATION';
      $this->data['meta_description'] = 'SHAPPINVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
      
        /*if ($this->uri->segment(2) !== null)
        {
            if ($this->UserModel->PseudoExiste($this->uri->segment(2))){
                $this->data['pseudo_parrain'] = $this->uri->segment(2);
                $noms_parrain =   $this->UserModel->GetUserDataByPseudo($this->uri->segment(2));
                $this->data['nom_parrain'] = $noms_parrain['nom'].'&nbsp;'.$noms_parrain['prenoms'];
                $this->load->helper('form');
                $this->render('backoffice/inscription_view',null);
            }
            else{
                $message_erreur = 'Désolé! Il n\'existe aucun membre ayant ce pseudo dans Global Industries Espoir. Toutefois vous pouvez vous inscrire sans renseigner le champ pseudo parrain. ';
                $this->session->set_flashdata('message_erreur',$message_erreur);
                $this->load->helper('form');
                $this->render('backoffice/inscription_view',null);
            }
        }*/
        /*if(isset($_POST['inscription'])) */
        
      $this->load->library('form_validation'); 
       if ($this->input->post()) {    

          $_SESSION['message_erreur']='';
          $this->form_validation->set_rules('parrain','Your sponsor','trim|required');
          $this->form_validation->set_rules('userfirstname','Your first name','trim|required');
          $this->form_validation->set_rules('userlastname','Your last name','trim|required');
          $this->form_validation->set_rules('userage','Your user age','trim|required');
          $this->form_validation->set_rules('username','Name user','trim|required|is_unique[users.pseudo]');
          $this->form_validation->set_rules('userpass','Your password','required');
          $this->form_validation->set_rules('usercontry','Your contry','trim|required');
          $this->form_validation->set_rules('usermail','Your Email','trim|required|valid_email|is_unique[users.email]');
          
          $age=date('Y')-$this->input->post('userage');
          $datenaiss='01/01/'.$age;
          if(!$this->UserModel->PseudoExiste($this->input->post('parrain'))){
            $_SESSION['message_erreur'] = 'Sorry! There is no member with this nickname in Global Industries Espoir. However, you can register without entering the pseudo sponsor field.';
            redirect('registration','refresh'); 
          }
          elseif($this->UserModel->PseudoExiste($this->input->post('username'))){
            $_SESSION['message_erreur'] = 'Sorry! This username is already taken.';
            redirect('registration','refresh'); 
          }
          elseif($this->UserModel->EmailExiste($this->input->post('usermail'))){
            $_SESSION['message_erreur'] = 'Sorry! This email is already in use.';
            redirect('registration','refresh'); 
          }
          elseif(!$this->input->post('userpass')===$this->input->post('userconfpass')){
            $_SESSION['message_erreur'] = 'Sorry! the two passwords do not match.';
            $this->load->helper('form');
            $this->render('public/inscription_view','front_master');
          }else{
            if($this->UserModel->NomExiste($this->input->post('userfirstname')) and $this->UserModel->PrenomsExiste($this->input->post('userlastname')) and $this->UserModel->DateNaissanceExiste($age)){
              $_SESSION['message_erreur'] = 'Sorry! You cannot register twice with SHAPPINVEST.';
              redirect('registration','refresh'); 
            }
          }
    
          if($this->form_validation->run() == FALSE)
          {
            $_SESSION['message_erreur'] = 'One of your information is not correct';
            redirect('registration','refresh'); 
          }
          else
          {
             $group_ids = [3];
              $groupe = 3;
              $creele = date("d/m/Y-h:i:s");

                $additional_data = array(
                    'pseudo_parrain' => $this->input->post('parrain'),
                    'nom' => $this->input->post('userfirstname'),
                    'prenoms' => $this->input->post('userlastname'),
                    'date_naissance' => $age,
                    'Lieu_naissance' => "",
                    'pays' => $this->input->post('usercontry'),
                    'telephone' => "",
                    'ville' => "",
                    'adresse' => "",
                    'side' => 'd',
                    'groupe' => $groupe,
                    'creele' => $creele
                );
              if($this->ion_auth->register($this->input->post('username'), $this->input->post('userpass'), $this->input->post('usermail'), $additional_data, $group_ids)){
                $souvenir = (bool) 1;
                if ($this->ion_auth->login($this->input->post('username'), $this->input->post('userpass'), $souvenir))
                {
                  if($this->ion_auth->in_group('membres'))
                    {
                      redirect('backoffice','refresh');
                    }
                }
              }
          }
          
       }
       else{
           $this->load->helper('form');
           $this->render('public/inscription_view','front_master'); 
       }
  }

  
    
  public function confirmation_inscription()
  {
      $this->data['page_title'] = 'Confirmation de l\'inscription';
      
      if($this->input->post('confirmation') === 'True')
      {
        $pseudo = $this->session->userdata('pseudo');
        $email = $this->session->userdata('email');
        $password = $this->session->userdata('password');
        if($this->UserModel->SiParrainAUnMembre($this->session->userdata('pseudo_parrain'))){
            $side = 'd';
        }
        else $side = 'g';
        
        //$reference = $this->session->userdata('reference');
        $group_ids = [3];
        $groupe = 3;
        $creele = date("d/m/Y-h:i:s");
          
          $data = array(
              'pseudo_parrain' => $this->session->userdata('pseudo_parrain'),
              'pseudo' => $this->session->userdata('pseudo'),
              'nom' => $this->session->userdata('nom'),
              'prenoms' => $this->session->userdata('prenoms'),
              'date_naissance' => $this->session->userdata('date'),
              'Lieu_naissance' => $this->session->userdata('lieu'),
              'pays' => $this->session->userdata('pays'),
              'telephone' => $this->session->userdata('telephone'),
              'ville' => $this->session->userdata('ville'),
              'adresse' => $this->session->userdata('adresse'),
              'side' => $side,
              'groupe' => $groupe,
              'creele' => $creele
          );
          
          
 
          $prix = 12700;
          $telephone_money = $this->session->userdata('num_money');
          $telephone_marchand = 56151518;
          $description = $pseudo;
          
          $reponseMessenka = $this->MessenkaModel->doMessenka($telephone_marchand,$prix,$description);
        
        if($reponseMessenka->erreur == ""){
            $this->session->set_userdata('codeM',$reponseMessenka->code);
            $this->session->set_userdata('logoM',$reponseMessenka->logo);
            $this->session->set_userdata('lienM',$reponseMessenka->lien);
            $this->session->set_userdata('idM',$reponseMessenka->id);
            if($this->UserModel->enregistrerMembreTemp($data)){
                redirect('inscription/paiement-messenka');
            }
            else{
                $message_erreur = 'Une erreur est survenue lors de la procédure de payement veuillez réessayer svp';
                $this->session->set_flashdata('message_erreur',$message_erreur);

                // $this->render('backoffice/inscription_messenka_view',null);
                redirect('inscription/paiement-messenka');
            }
            
        } 
        else{
            $message_erreur = 'Une erreur est survenue lors de la procédure de payement veuillez réessayer svp';
            $this->session->set_flashdata('message_erreur',$message_erreur);
            
            // $this->render('backoffice/inscription_messenka_view',null);
            redirect('inscription/paiement-messenka');
        }  
    } 
 
 else {
          $this->load->helper('form');
          $this->render('backoffice/confirmation_inscription_view',null);
      }
}

  
  public function paiement_messenka()
  {      
      $this->render('backoffice/inscription_messenka_view',null);
  }
    
/*
  public function ipn()
  {
     
    $post = php_compat_file_get_contents('php://input');
      
      $data = json_decode($post); 
      $idM=$data->id;
      $Code=$data->Code;
      $Reference=$data->Reference;
      $Client=$data->Client;
      $Telephone=$data->Telephone;
      $Montant=$data->Montant;
      $Solde=$data->Solde;
      $Date=$data->Date;
      
      
      
         
              
              $sauvegarder = $this->MessenkaModel->savelast($idM,$Code,$Reference,$Client,$Telephone,$Montant,$Solde,$Date);
              if($sauvegarder){
                  $pseudo=$this->MessenkaModel->GetUserPseudoByCode($Code);
                  $user = $this->UserModel->GetUserDataByPseudo($pseudo);
                  
                  
                  
                    $group_ids = [3];
                    $groupe = 3;
                    $creele = date("d/m/Y-h:i:s");

                      $additional_data = array(
                          'pseudo_parrain' => $user['pseudo_parrain'],
                          'nom' => $user['nom'],
                          'prenoms' => $user['prenoms'],
                          'date' => $user['date'],
                          'lieu' => $user['lieu'],
                          'pays' => $user['pays'],
                          'telephone' => $user['telephone'],
                          'ville' => $user['ville'],
                          'adresse' => $user['adresse'],
                          'side' => $side,
                          'groupe' => $groupe,
                          'creele' => $creele
                      );
                  
                  
                  if($this->ion_auth->register($pseudo, $password, $email, $additional_data, $group_ids)) {
        
                    $this->MesFilleulsModel->AjouterFilleulEtGains($this->session->userdata('pseudo_parrain'),$pseudo,$side);

                     
                    $this->MesBonsModel->AjouterLigne($pseudo);
                      
                      
                    $username = 'NdougaSA';
                    $password = '96192721';
                    
                    $message = ", Bienvenue chez GIE. Connectez-vous à votre compte au lien: globalindustriespoir.com/connexion";
                    $prenomss=$user['prenoms'];
                    $tel=$user['telephone'];
                      
                
                    
                    redirect("https://api.infobip.com/sms/1/text/query?username=$username&password=$password&to=$tel&from=GIE&text=$prenomss $message");
                    
                    http_response_code(200);
                      
                  
                   

                 }
              }
          
      
      
  }
  

    
    public function inscription_effective() 
    {
          //put some vars back into $_GET.
          parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
          
          // grab values as you would from an ordinary $_GET superglobal array associative index.
          $Code = $_GET['code']; 
        
          if  ( $Code  ==  0 ) 
          { 
                  $this->render('backoffice/inscription_effective_view',null);
          } 
          else 
          { 
                  $Code = $_GET['code']; 
                  $Numero_marchand = 56151518;

                $pseudo=$this->MessenkaModel->GetUserPseudoByCode($Code);

                
                $user = $this->UserModel->GetUserDataTempByPseudo($pseudo);
    
                
                $password=$user['password'];
                $email=$user['email'];
                
                  $group_ids = [3];
                  $groupe = 3;
                  $creele = date("d/m/Y-h:i:s");

                    $additional_data = array(
                        'pseudo_parrain' => $user['pseudo_parrain'],
                        'nom' => $user['nom'],
                        'prenoms' => $user['prenoms'],
                        'date_naissance' => $user['date_naissance'],
                        'Lieu_naissance' => $user['Lieu_naissance'],
                        'pays' => $user['pays'],
                        'telephone' => $user['telephone'],
                        'ville' => $user['ville'],
                        'adresse' => $user['adresse'],
                        'side' => $user['side'],
                        'groupe' => $groupe,
                        'creele' => $creele
                    );
                
                
                if($this->ion_auth->register($pseudo, $password, $email, $additional_data, $group_ids))
                {
      
                  $this->MesFilleulsModel->AjouterFilleulEtGains($user['pseudo_parrain'],$pseudo,$side);

                  $this->MesBonsModel->AjouterLigne($pseudo);
                    
                    
                  $username = 'NdougaSA';
                  $password = '96192721';
                  
                  $message = ", Bienvenue chez GIE. Connectez-vous à votre compte au lien: globalindustriespoir.com/connexion";
                  $prenomss=$user['prenoms'];
                  $tel=$user['telephone'];
                   */ 
         
              /*
              $url='https://api.infobip.com/sms/1/text/query?username='.$username.'&password='.$password.'&to='.$tel.'&from=GIE&text='.$prenomss.''.$message.'';
              
              
              
              $this->render('backoffice/inscription_effective_view',null);*/
              
            /*  var_dump(redirect('https://api.infobip.com/sms/1/text/query?username='.$username.'&password='.$password.'&to='.$tel.'&from=GIE&text='.$prenomss.''.$message.'')); 
              }
                    
                    
          }
          
         
  }*/


    
  public function profil()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'My profile';
      $this->data['page_description'] = 'information in member';
      $this->data['titre'] = 'My profile';
      $user = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
      $this->data['user'] = $user;

      $this->render('backoffice/profil_view','backoffice_master');
      
  }
  
    
   public function modifier_profil()
  {
       
      $this->data['page_title'] = 'Modifier mon profil';
      $this->data['titre'] = 'profil';
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
      elseif($this->input->post('modifier-profil') !== null) {
        $new_data = array(
                  'email' => $this->input->post('email'),
                  'nom' => $this->input->post('nom'),
                  'prenoms' => $this->input->post('prenoms'),
                  'date_naissance' => $this->input->post('date'),
                  'Lieu_naissance' => $this->input->post('lieu'),
                  'pays' => $this->input->post('pays'),
                  'telephone' => $this->input->post('telephone'),
                  'ville' => $this->input->post('ville'),
                  'adresse' => $this->input->post('adresse'),
                  'apropos' => $this->input->post('apropos')
        );
        
        if($this->UserModel->MajProfil($new_data,$user['id'])){
            $this->session->set_flashdata('message', 'Profil mis à jour');
            redirect('backoffice/profil','refresh');
        }
        else{
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->load->helper('form');
            $this->render('backoffice/modifier_profil_view','backoffice_master');
        }  
      
      }
      else{
         $this->load->helper('form');
         $this->render('backoffice/modifier_profil_view','backoffice_master');
      }
      
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