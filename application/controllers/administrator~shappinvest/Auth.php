<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    
    $this->data['page_title'] = 'shappinvest - Tableau de bord';
  }

  public function index()
  {

  }

  public function connexion()
  {
      if($this->ion_auth->logged_mlm_in())
      {
        redirect('administrator~shappinvest/principal/');
      }
     
      $this->data['page_title'] = 'Connexion | Administration de shappinvest';
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
              if($this->ion_auth->in_group('admin'))
                {
                  redirect('administrator~shappinvest','refresh');
                }
              else {
                   if($this->ion_auth->logout()){
                       $this->session->set_flashdata('message','Cet espace est réservé aux Administrateurs !');
                   }
              }
          }
          else
          {
            $this->session->set_flashdata('message',$this->ion_auth->errors());
            redirect('administrator~shappinvest/connexion', 'refresh');
          }
        }
      }
      $this->load->helper('form');
      $this->render('admin/connexion_view',null);
  }
  
  public function deconnexion()
  {
      if($this->ion_auth->logged_mlm_in())
      {
        $this->ion_auth->logout();
        redirect('administrator~shappinvest/connexion', 'refresh');
      }
      else
      {
        redirect('administrator~shappinvest/principal/');  
      }
      
  }
  
  
    
    
    
}