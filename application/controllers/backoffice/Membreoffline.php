<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membreoffline extends MY_Controller
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
    $this->load->model('FreelanceModel');
      
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

  
  public function inscription()
  {
      $this->data['page_title'] = 'Inscription';
      
        
      
   if(isset($_POST['inscription'])) {           
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
      elseif($this->input->post('num_money') !== '2250952489800020185589846300056151518000416684941111'){
        $message_erreur = 'Désolé! Vous n\'avez pas le droit d\'inscrire quelqu\'un.  ';
        $this->session->set_flashdata('message_erreur',$message_erreur);
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);
      }
      
      elseif($this->UserModel->NomExiste($this->input->post('nom')) and $this->UserModel->PrenomsExiste($this->input->post('prenoms')) and $this->UserModel->DateNaissanceExiste($this->input->post('date'))){
        $message_erreur = 'Désolé! Vous ne pouvez vous enregistrer deux fois chez Global Industries Espoir.';
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
         $parrain = $this->UserModel->GetPseudoParrainLibre($this->input->post('pseudo_parrain'));
         $parrain_libre = $parrain->pseudo;
          
         $row =  $this->UserModel->GetUserDataByPseudo($parrain_libre);
          $parrain_inscrit = $row['nom'].'&nbsp;'.$row['prenoms'];
          
          if($this->input->post('offline-i') == "espoir"){
              $offline = 2;
          }
          elseif($this->input->post('offline-i') == "jordy"){
              $offline = 3;
          }
          elseif($this->input->post('offline-i') == "cash"){
              $offline = 1;
          }
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
              'offline-i' => $offline,
              'parrain_inscrit' => $parrain_inscrit,
              'parrain_side' => $parrain->side
            );
          
        
        $this->session->set_userdata($inscription_data);
        $this->session->set_userdata('parrainn',$parrain_libre);
        redirect('/confirmation-offline');
      }
      
   }
   else{
       $this->load->helper('form');
                $this->render('backoffice/inscription_view',null);
   }
      
  }

  
  public function inscription_agence()
  {
      $this->data['page_title'] = 'Inscription des agences';
   
      
   if(isset($_POST['inscription'])) {           
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
      $this->form_validation->set_rules('code_agence','Votre code agence','trim|required');
      
      
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
      
      elseif(!$this->AgenceModel->AgenceExiste($this->input->post('code_agence'))){
        $message_erreur = 'Désolé! Ce code agence ne correspond a aucune agence. ';
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
     
      
      elseif($this->UserModel->NomExiste($this->input->post('nom')) and $this->UserModel->PrenomsExiste($this->input->post('prenoms')) and $this->UserModel->DateNaissanceExiste($this->input->post('date'))){
        $message_erreur = 'Désolé! Vous ne pouvez vous enregistrer deux fois chez Global Industries Espoir.';
        $this->session->set_flashdata('message_erreur',$message_erreur);
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);
      }

      if($this->form_validation->run() === FALSE)
      {
        $this->load->helper('form');
        $this->render('backoffice/inscription_view',null);
      }
      else
      {
         $parrain = $this->UserModel->GetPseudoParrainLibre($this->input->post('pseudo_parrain'));
         $parrain_libre = $parrain->pseudo;
          
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
              'code_agence' => $this->input->post('code_agence'),
              'offline-i' => $offline,
              'parrain_inscrit' => $parrain_inscrit,
              'parrain_side' => $parrain->side
            );
          
        
        $this->session->set_userdata($inscription_data);
        $this->session->set_userdata('parrainn',$parrain_libre);
            redirect('/confirmation-agence');
      }
      
   }
   else{
       $this->load->helper('form');
                $this->render('backoffice/inscription_view',null);
   }
      
  }
  
  
  public function inscription_freelance_old()
  {
      $this->data['page_title'] = 'Inscription des freelances';
      
      
   if(isset($_POST['inscription'])) {           
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
      $this->form_validation->set_rules('code_freelance','Votre code freelance','trim|required');
      
      
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
      
      elseif(!$this->FreelanceModel->FreelanceExiste($this->input->post('code_freelance'))){
        $message_erreur = 'Désolé! Ce code freelance ne correspond a aucun freelance. ';
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
     
      
      elseif($this->UserModel->NomExiste($this->input->post('nom')) and $this->UserModel->PrenomsExiste($this->input->post('prenoms')) and $this->UserModel->DateNaissanceExiste($this->input->post('date'))){
        $message_erreur = 'Désolé! Vous ne pouvez vous enregistrer deux fois chez Global Industries Espoir.';
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
         $parrain = $this->UserModel->GetPseudoParrainLibre($this->input->post('pseudo_parrain'));
         $parrain_libre = $parrain->pseudo;
          
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
              'code_freelance' => $this->input->post('code_freelance'),
              'offline-i' => $offline,
              'parrain_inscrit' => $parrain_inscrit,
              'parrain_side' => $parrain->side
            );
          
        
        $this->session->set_userdata($inscription_data);
        $this->session->set_userdata('parrainn',$parrain_libre);
            redirect('/confirmation-freelance');
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
        
            redirect('inscription-offline/paiement');
        
    } 
 
 else {
          $this->load->helper('form');
          $this->render('backoffice/confirmation_inscription_view',null);
      }
}

  public function confirmation_inscription_agence()
  {
      $this->data['page_title'] = 'Confirmation de l\'inscription par l\'agence';
      
      if($this->input->post('confirmation') === 'True')
      {
        
            redirect('inscription-agence/paiement-agence');
        
      } 
 
     else {
              $this->load->helper('form');
              $this->render('backoffice/confirmation_inscription_view',null);
          }
}

  
  public function confirmation_inscription_freelance_old()
  {
      $this->data['page_title'] = 'Confirmation de l\'inscription par le freelance';
      
      if($this->input->post('confirmation') === 'True')
      {
        
            redirect('inscription-freelance/paiement-freelance');
        
    } 
 
 else {
          $this->load->helper('form');
          $this->render('backoffice/confirmation_inscription_view',null);
      }
}
  
  public function paiement()
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
          
          $additional_data = array(
              'pseudo_parrain' => $this->session->userdata('pseudo_parrain'),
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
      if($this->ion_auth->register($pseudo, $password, $email, $additional_data, $group_ids)) {
        
                    $this->MesFilleulsModel->AjouterFilleulEtGains($this->session->userdata('pseudo_parrain'),$pseudo,$side);

                    $user = $this->UserModel->GetUserDataByPseudo($pseudo); 

                     if($this->MesBonsModel->AjouterLigne($pseudo)){
                         
                            $username = 'NdougaSA';
                            $password = '96192721';

                            $message = ", Bienvenue chez GIE. Connectez-vous à votre compte au lien: globalindustriespoir.com/connexion";
                            $nom=$user['nom'];
                            $tel=$user['telephone'];
                            
                         //$postUrl = "https://api.infobip.com/sms/1/text/single";


                            /*$ch = curl_init();
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

                            
                            curl_exec($ch);*/
                         
                            

                            //redirect('inscription-effective-offline');
                         redirect("https://api.infobip.com/sms/1/text/query?username=$username&password=$password&to=$tel&from=GIE&text=$nom $message");

                     }
                        

                 }
  }
    
  public function paiement_agence()
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
        $code_agence = $this->session->userdata('code_agence');
          
          $additional_data = array(
              'pseudo_parrain' => $this->session->userdata('pseudo_parrain'),
              'nom' => $this->session->userdata('nom'),
              'prenoms' => $this->session->userdata('prenoms'),
              'date_naissance' => $this->session->userdata('date'),
              'Lieu_naissance' => $this->session->userdata('lieu'),
              'pays' => $this->session->userdata('pays'),
              'telephone' => $this->session->userdata('telephone'),
              'ville' => $this->session->userdata('ville'),
              'adresse' => $this->session->userdata('adresse'),
              'code_agence' => $this->session->userdata('code_agence'),
              'side' => $side,
              'groupe' => $groupe,
              'creele' => $creele
          );
      if($this->ion_auth->register($pseudo, $password, $email, $additional_data, $group_ids)) {
          
        
                    $this->MesFilleulsModel->AjouterFilleulEtGains($this->session->userdata('pseudo_parrain'),$pseudo,$side);

                    $user = $this->UserModel->GetUserDataByPseudo($pseudo); 
                    //var_dump($user);
                     if($this->MesBonsModel->AjouterLigne($pseudo)){
                         
                         if($this->AgenceModel->AjouterGainsAgence($code_agence)){
                            $username = 'NdougaSA';
                            $password = '96192721';

                            $message = ", Bienvenue chez GIE. Connectez-vous à votre compte au lien: globalindustriespoir.com/connexion";
                            $nom=$user['nom'];
                            $tel=$user['telephone'];
                            
                        
                         redirect("https://api.infobip.com/sms/1/text/query?username=$username&password=$password&to=$tel&from=GIE&text=$nom $message");
                         }

                     }
                        

                 }
  }
  
  public function paiement_freelance_old()
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
        $code_freelance = $this->session->userdata('code_freelance');
          
          $additional_data = array(
              'pseudo_parrain' => $this->session->userdata('pseudo_parrain'),
              'nom' => $this->session->userdata('nom'),
              'prenoms' => $this->session->userdata('prenoms'),
              'date_naissance' => $this->session->userdata('date'),
              'Lieu_naissance' => $this->session->userdata('lieu'),
              'pays' => $this->session->userdata('pays'),
              'telephone' => $this->session->userdata('telephone'),
              'ville' => $this->session->userdata('ville'),
              'adresse' => $this->session->userdata('adresse'),
              'code_agence' => $this->session->userdata('code_freelance'),
              'side' => $side,
              'groupe' => $groupe,
              'creele' => $creele
          );
      if($this->ion_auth->register($pseudo, $password, $email, $additional_data, $group_ids)) {
          
        
                    $this->MesFilleulsModel->AjouterFilleulEtGains($this->session->userdata('pseudo_parrain'),$pseudo,$side);

                    $user = $this->UserModel->GetUserDataByPseudo($pseudo); 

                     if($this->MesBonsModel->AjouterLigne($pseudo)){
                         
                         if($this->FreelanceModel->AjouterGainsFreelance($code_freelance)){
                            $username = 'NdougaSA';
                            $password = '96192721';

                            $message = ", Bienvenue chez GIE. Connectez-vous à votre compte au lien: globalindustriespoir.com/connexion";
                            $nom=$user['nom'];
                            $tel=$user['telephone'];
                            
                        
                         redirect("https://api.infobip.com/sms/1/text/query?username=$username&password=$password&to=$tel&from=GIE&text=$nom $message");
                         }

                     }
                        

                 }
  }

    
  public function inscription_effective() 
  {
      
    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "https://api.infobip.com/sms/1/text/query?username=$username&password=$password&to=$tel&from=GIE&text=$prenomss $message");
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);
      
      
        
    $this->render('backoffice/inscription_effective_view',null); 
      
  }
     
    
    
    
}