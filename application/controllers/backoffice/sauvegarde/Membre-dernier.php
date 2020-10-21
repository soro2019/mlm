<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'PHP/PHP_Compat-1.6.0a3/Compat/Function/file_get_contents.php';

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
      
    $this->data['pseudo'] = $this->session->userdata('identity');
    $noms_membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    $this->data['nom_membre'] = $noms_membre['nom'];
    $this->data['prenom_membre'] = $noms_membre['prenoms'];
    $this->data['dateInscription'] = $noms_membre['creele'];
    
      $this->data['membrereseauperso'] = $this->MesFilleulsModel->membresreseauperso($this->session->userdata('identity'));
      $this->data['mesbons'] = $this->MesBonsModel->mesbons($this->session->userdata('identity'));
      $this->data['monNiveau'] = $this->MesFilleulsModel->monNiveau($this->session->userdata('identity'));
      $this->data['inscritoday'] = $this->MesFilleulsModel->inscritoday($this->session->userdata('identity'));
  }

  public function index()
  {
  }

  public function connexion()
  {
      $this->data['page_title'] = 'Connexion';
      if($this->input->post())
      {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('identity', '', 'required');
        $this->form_validation->set_rules('password', '', 'required');
        $this->form_validation->set_rules('souvenir','Se souvenir de moi','integer');
        if($this->form_validation->run()===TRUE)
        {
          $souvenir = (bool) $this->input->post('souvenir');
          if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $souvenir))
          {
              
              if($this->ion_auth->in_group('membres'))
                {
                  redirect('backoffice','refresh');
                }
              else $this->session->set_flashdata('message','Vous n\'êtes pas sur le bon espace de connexion Monsieur l\'administrateur');
          }
          else
          {
            $this->session->set_flashdata('message',$this->ion_auth->errors());
            redirect('backoffice/membre/connexion', 'refresh');
          }
        }
      }
      $this->load->helper('form');
      $this->render('backoffice/connexion_view',null);
  }
  public function deconnexion()
  {
      $this->ion_auth->logout();
      redirect('backoffice/membre/connexion', 'refresh');
  }
  
  public function inscription()
  {
      $this->data['page_title'] = 'Inscription';
      
        if ($this->uri->segment(2) !== null)
        {
            if ($this->UserModel->PseudoExiste($this->uri->segment(2))){
                $this->data['pseudo_parrain'] = $this->uri->segment(2);
                $noms_parrain =   $this->UserModel->GetUserDataByPseudo($this->uri->segment(2));
                $this->data['nom_parrain'] = $noms_parrain['nom'].'&nbsp;'.$noms_parrain['prenoms'];
            }
            else{
                $message_erreur = 'Désolé! Il n\'existe aucun membre ayant ce pseudo dans Global Industries Espoir. Toutefois vous pouvez vous inscrire sans renseigner le champ pseudo parrain. ';
                $this->session->set_flashdata('message_erreur',$message_erreur);
                $this->load->helper('form');
                $this->render('backoffice/inscription_view',null);
            }
        }
      
   if($this->input->post('inscription') !== null) {           
      $this->load->library('form_validation');
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
      $this->form_validation->set_rules('num_money','Votre numéro money','trim|required');
      
      
      if(!$this->UserModel->PseudoExiste($this->input->post('pseudo_parrain'))){
        $message_erreur = 'Désolé! Il n\'existe aucun membre ayant ce pseudo dans Global Industries Espoir. Toutefois vous pouvez vous inscrire sans renseigner le champ pseudo parrain. ';
        $this->session->set_flashdata('message_erreur',$message_erreur);
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);  
      }
      elseif($this->UserModel->PseudoExiste($this->input->post('pseudo'))){
        $message_erreur = 'Désolé! Ce pseudo est déjà pris. ';
        $this->session->set_flashdata('message_erreur',$message_erreur);
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);  
      }
      elseif($this->UserModel->EmailExiste($this->input->post('email'))){
        $message_erreur = 'Désolé! Ce mail est déjà utilisé. ';
        $this->session->set_flashdata('message_erreur',$message_erreur);
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);
      }
      elseif($this->UserModel->TelephoneExiste($this->input->post('telephone'))){
        $message_erreur = 'Désolé! Ce numéro de téléphone est déjà utilisé. ';
        $this->session->set_flashdata('message_erreur',$message_erreur);
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);
      }

      if($this->form_validation->run() == FALSE)
      {
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);
      }
      else
      {
          if($this->input->post('pseudo_parrain') == ""){
              $parrain = $this->UserModel->GetPseudoParrainLibre("GLOBALMEMBRE2");
              $parrain_libre = $parrain->pseudo;
          }
          else{
              $parrain = $this->UserModel->GetPseudoParrainLibre($this->input->post('pseudo_parrain'));
              $parrain_libre = $parrain->pseudo;
          }
         
          
         $row =  $this->UserModel->GetUserDataByPseudo($parrain_libre);
          $parrain_inscrit = $row['nom'].'&nbsp;'.$row['prenoms'];
            $inscription_data = array(
              'pseudo' => $this->input->post('pseudo'),
              'email' => $this->input->post('email'),
              'password' => $this->input->post('password'),
              'pseudo_parrain' => $parrain_libre,
              'nom' => $this->input->post('nom'),
              'prenoms' => $this->input->post('prenoms'),
              'date' => $this->input->post('date'),
              'lieu' => $this->input->post('lieu'),
              'pays' => $this->input->post('pays'),
              'telephone' => $this->input->post('telephone'),
              'ville' => $this->input->post('ville'),
              'adresse' => $this->input->post('adresse'),
              'num_money' => $this->input->post('num_money'),
              'parrain_inscrit' => $parrain_inscrit,
              'parrain_side' => $parrain->side
            );
          
        
        $this->session->set_userdata($inscription_data);
        $this->session->set_userdata('parrainn',$parrain_libre);
        redirect('/confirmation');
      }
      
   }
   else{
       $this->load->helper('form');
                $this->render('backoffice/inscription_view',null);
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
              'password' => $this->session->userdata('password'),
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
          
          
 
          $prix = 300;
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
                  
                  
                  //$reference = $this->session->userdata('reference');
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
                      
                //    $postUrl = "https://api.infobip.com/sms/1/text/single";
                    
                    redirect("https://api.infobip.com/sms/1/text/query?username=$username&password=$password&to=$tel&from=GIE&text=$prenomss $message");
                    
                    http_response_code(200);
                      
                  /*  $ch = curl_init();
                    $header = array("Content-Type:application/json", "Accept:application/json");
                    curl_setopt($ch, CURLOPT_URL, $postUrl);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_ENCODING, "");
                    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"from\":\"GIE\", \"to\":\"".$user['telephone']."\", \"text\":\"".$user['prenoms'].", Bienvenue chez GIE. Connectez-vous à votre compte au lien: globalindustriespoir.com/connexion\" }");
                      
                    // response of the POST request
                    $response = curl_exec($ch);
                    $err = curl_error($curl);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    $responseBody = json_decode($response);
                    curl_close($ch);
                    
                    if ($err) {
                      $err;
                    } else {
                      $response;
                    }
                      
                    */  
                    //redirect('https://api.infobip.com/sms/1/text/query?username=myUsername&password=myPassword&to=41793026727&text=Message text'); 1
                      
                    /*$curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "{ \"from\":\"GIE\", \"to\":\"$user['telephone']\", \"text\":\"Bienvenue chez GIE\" }",
                      CURLOPT_HTTPHEADER => array(
                        "accept: application/json",
                        "authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==",
                        "content-type: application/json"
                      ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {
                      echo $response;
                    }
*/
                   

                 }
              }
          
      
      
  }
    
  public function inscription_effective() 
  {
      
        
      $this->render('backoffice/inscription_effective_view',null); 
      
  }
    
  public function profil()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Profil de membre';
      $this->data['titre'] = 'profil';
      $user = $this->ion_auth->user()->row();
      $this->data['user'] = $user;
      $this->data['current_user_menu'] = '';

          if($this->ion_auth->in_group('admin'))
          {
            redirect('admin');

          }


      $this->load->library('form_validation');
      $this->form_validation->set_rules('first_name','First name','trim');
      $this->form_validation->set_rules('last_name','Last name','trim');
      $this->form_validation->set_rules('company','Company','trim');
      $this->form_validation->set_rules('phone','Phone','trim');

      if($this->form_validation->run()===FALSE)
      {
        $this->render('backoffice/profil_view','backoffice_master');
      }
      else
      {
        $new_data = array(
          'first_name' => $this->input->post('first_name'),
          'last_name' => $this->input->post('last_name'),
          'company' => $this->input->post('company'),
          'phone' => $this->input->post('phone')
        );
        if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');
        $this->ion_auth->update($user->id, $new_data);

        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('admin/user/profile','refresh');
      }
      
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
    
    
    
    
}