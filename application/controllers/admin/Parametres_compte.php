  <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class parametres_compte extends Admin_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
      
    $this->load->model('UserModel');
    //$this->load->model('UserEmployeeModel');
      
    $this->data['pseudo'] = $this->session->userdata('identity');
    $noms_membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    $this->data['nom_membre'] = $noms_membre['nom'];
    $this->data['prenom_membre'] = $noms_membre['prenoms'];
    $this->data['monType'] = $noms_membre['groupe'];
    $this->data['   dateInscription'] = date("d-m-Y à H:i:s", $noms_membre['created_on']);
    //type de groupe affilier
    $poste = $this->UserEmployeeModel->RecuperationGroupeUtilisateur($this->data['monType']);
    $this->data['monType'] = $poste['name'];  
    //controle pour affichage de la pages
    $this->data['niveau'] = $noms_membre['groupe']; 
  }

  public function index()
  {}

   public function profil()
  {
     
      $this->data['page_title'] = 'Mon profil';
      $this->data['titre'] = 'profil';
      $info_user = $this->UserEmployeeModel->RecuperationDonneUtilisateur($this->session->userdata('identity'));
      $this->data['info_user'] = $info_user;
      $this->data['page_title'] = 'Profil | Administration';
      $this->data['titre'] = 'Profil';
      $this->data['lien'] = 'Profil';
      $this->render('admin/profil_view','admin_master');
  }
    
    
  //Tout le fonction contenu de la page de modifier d'information sur l'utilisateur
  public function modifier_profil()
  {
    $this->data['page_title'] = 'Modifier mon profil';
    $this->data['titre'] = 'profil';
    $this->data['lien'] = 'Modifier mon profil';
    $user = $this->UserEmployeeModel->RecuperationDonneUtilisateur($this->session->userdata('identity'));
    $this->data['user'] = $user;
    if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('administrator~shappinvest/connexion');
      }
      elseif($this->ion_auth->in_group('admin'))
          {
            redirect('admin');

          }
      elseif($this->input->post('modifier-profil') !== null) 
      {
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
            redirect('administrator~shappinvest/parametres_compte/profil','refresh');
        }
        else{
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->load->helper('form');
            $this->render('admin/modifier_profil_view');
        }  
      }
      else{
         $this->load->helper('form');
         $this->render('admin/modifier_profil_view');
      }
  }
    
    
  //modification du password employee
  public function modifier_mdp()
  {
    $this->data['page_title'] = 'Modifier Mdp | Administration';
    $this->data['titre'] = 'Modifier votre Mot de Pass';
    $this->data['lien'] = 'modifier mdp';
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
      elseif($this->input->post('modifier-mdp') !== null)
     {
        $old = $this->input->post('ancien');
        $new = $this->input->post('nouveau');
        $confirme = $this->input->post('confirmer');
        
        if(!$this->ion_auth->hash_password_db($user['id'], $old))
        {
            $this->session->set_flashdata('message', 'Votre mot de passe actuel est incorrect');
            redirect('administrator~shappinvest/parametres_compte/modifier_mdp','refresh');
        }
        else{
            if($new == $confirme){
                $new_data = array('password' => $this->input->post('nouveau'));
                if($this->ion_auth->update($user['id'],$new_data))
                {
                  $this->session->set_flashdata('message-bon', 'Mot de passe mis à jour !');
                  redirect('administrator~shappinvest/parametres_compte/modifier_mdp','refresh');
                }
                else{
                  $this->session->set_flashdata('message', $this->ion_auth->messages());
                  $this->load->helper('form');
                  $this->render('admin/modifier_mdp_view','admin_master');
                }
            }
            else{
               $this->session->set_flashdata('message', 'Mots de passe différent');
               redirect('administrator~shappinvest/parametres_compte/modifier_mdp','refresh');
            }
        }
      }
      else{
       $this->load->helper('form');
       $this->render('admin/modifier_mdp_view','admin_master');
      }
      
  } 


}