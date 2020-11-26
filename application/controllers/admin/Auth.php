<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    
    $this->data['page_title'] = 'shappinvest - Tableau de bord';
    $this->load->model(['Crud_model', 'UserModel']);
    $this->load->helper('form');
  }

  public function index()
  {

  }


  public function connexion($lang='')
  {
      if($this->ion_auth->logged_mlm_in())
      {
        redirect(trim($_SESSION['language']).'/admin/principal');
      }
      defineLanguage($lang);
      $this->data['page_title'] = get_phrase('connexion | administration de shappinvest');
      if($this->input->post())
      {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('identity', '', 'required');
        $this->form_validation->set_rules('password', '', 'required');
        $this->form_validation->set_rules('souvenir', ucfirst(get_phrase('se souvenir de moi')),'integer');
        if($this->form_validation->run()===TRUE)
        {
          $souvenir = (bool) $this->input->post('souvenir');
          if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $souvenir))
          {
                if($this->ion_auth->in_group('admin'))
                {
                  redirect(trim($_SESSION['language']).'/admin','refresh');
                }else
                {
                   if($this->ion_auth->logout()){
                       $this->session->set_flashdata('message',ucfirst(get_phrase('cet espace est réservé aux administrateurs !')));
                   }
                }
          }
          else
          {
            $this->session->set_flashdata('message', ucfirst(get_phrase($this->ion_auth->errors())));
            redirect(trim($_SESSION['language']).'/admin/login', 'refresh');
          }
        }
      }
      $this->render('admin/connexion_view',null);
  }
  
  public function deconnexion()
  {
      if($this->ion_auth->logged_mlm_in())
      {
        $this->ion_auth->logout();
        redirect('admin/login', 'refresh');
      }
      else
      {
        redirect(trim($_SESSION['language']).'/admin/principal');  
      }
  }
  
  
    
    
    
}