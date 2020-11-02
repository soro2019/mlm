<?php
 
class MY_Controller extends CI_Controller
{
  protected $data = array();
  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = 'SHAPP INVEST - Source of Happiness Investment';
    $this->data['before_head'] = '';
    $this->data['before_body'] ='';
    $this->load->library('ion_auth');
  }
 
  protected function render($the_view = NULL, $template = 'master')
  {
    if($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    elseif(is_null($template))
      {
        $this->load->view($the_view,$this->data);
      }
    else
    {
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);;
      $this->load->view('templates/'.$template.'_view', $this->data);
    }
  }
}
 
class Admin_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
      
    $this->data['pseudo'] = $this->session->userdata('identity');
    $noms_membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    $this->data['nom_membre'] = $noms_membre['nom'];
    $this->data['prenom_membre'] = $noms_membre['prenoms'];
    $this->data['dateInscription'] = $noms_membre['creele'];
      
    if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('administrator~shappinvest/connexion');
      }
      else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('Vous devez être administrateur pour voir cette page.');
        }
  }
    
  protected function render($the_view = NULL, $template = 'admin_master')
  {
    parent::render($the_view, $template);
  }
}

class Backoffice_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    
    $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_mlm_in())
    {
      //redirect them to the login page
      redirect('en/connexion', 'refresh');
    }
      
    $this->data['page_title'] = 'Social-Coop - Backoffice';
  }
    
  protected function render($the_view = NULL, $template = 'backoffice_master')
  {
    parent::render($the_view, $template);
  }
}
 
class Public_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = 'SHAPP INVEST - Source of Happiness Investment';
  }
    
  protected function render($the_view = NULL, $template = 'front_master')
  {
    parent::render($the_view, $template);
  }
}