<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class change_the_theme extends Admin_Controller 
{
	public function __construct()
	{


    parent::__construct();
    $this->load->model('UserModel');
      
    $this->data['pseudo'] = $this->session->userdata('identity');
    $noms_membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    $this->data['nom_membre'] = $noms_membre['nom'];
    $this->data['prenom_membre'] = $noms_membre['prenoms'];
    $this->data['dateInscription'] = date("d-m-Y à H:i:s", $noms_membre['created_on']);
      
        if ($this->ion_auth->in_group(1))
    {
      $this->data['monType'] = "Administrateur";
    } 
        elseif ($this->ion_auth->in_group(7))
    {
      $this->data['monType'] = "Comptable";
    } 
        else $this->data['monType'] = "";
    
          

		$this->load->model('Model_company');
    $this->load->library('form_validation');
	}

    /* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
	public function index(){  
    if(!$this->ion_auth->logged_mlm_in()){
        redirect('connexion');
      }
      if ($this->input->post()) {}
      else {
        $this->data['titre'] ='parametre';
        $this->data['page_title'] = 'parametre';
        $this->data['lien'] = 'parametre';
        $this->data['lienreseausociaux_Data'] = $this->Model_company->getlienreseausociauxData();
        $this->render('admin/company/index');			
      }	
  }

  public function updates_lien_reseau(){
    $this->load->helper('form');
    if ($this->input->post()) {
      for ($i=1; $i <=$this->input->post('nbres') ; $i++) { 
        if ($this->input->post('vuelien'.$i)=='on') {
          $donnes = array(
            'viewicon' =>  1
          );
          

        } else {
          $donnes = array(
            'lien' => $this->input->post('lien'.$i),  
            'viewicon' =>  0
          );
          
        }
        $this->Model_company->update($i,$donnes);
        $donnes = array();
        
      }
      $this->session->set_flashdata('success','modification effectué avec succès');
      redirect('administrator~shappinvest/change_the_theme', 'refresh');
      
    } else {
      $this->session->set_flashdata('errors','Probleme de transmision');
      redirect('administrator~shappinvest/change_the_theme', 'refresh');
    }
    
  }

  public function insertion_val(){
    if ($this->input->post()) {
      
      if ($this->input->post('vuelien0')=='on') {
        $data = array(
          'lien' =>  '#',
          'faicon' =>  $this->input->post('icone'),
          'viewicon' => 1 
        );
      } else {
        $data = array(
          'lien' =>  $this->input->post('vuelien0'),
          'faicon' =>  $this->input->post('icone'),
          'viewicon' => 0
        );
      }
      if ($this->Model_company->create($data)==true) {
        $this->session->set_flashdata('success','enregistrement effectué avec succès');
        redirect('administrator~shappinvest/change_the_theme', 'refresh');
      } else {
        $this->session->set_flashdata('errors','Probleme de transmision');
        redirect('administrator~shappinvest/change_the_theme', 'refresh');
      
      }
      
    }
    else {
      $this->session->set_flashdata('errors','Probleme de transmision');
      redirect('administrator~shappinvest/change_the_theme', 'refresh');
    }
  }

  public function supp(){
    if ($this->input->post()) {
      if ($this->input->post('verifcationcode')==0000) {
        $data = array('id' => $this->input->post('codeverifinconf') );
        if ($this->Model_company->delete_lien($data)==true) {
          $this->session->set_flashdata('success','Suppression effectué avec succès');
          redirect('administrator~shappinvest/change_the_theme', 'refresh');
        } else {
          $this->session->set_flashdata('errors','Probleme de transmision');
          redirect('administrator~shappinvest/change_the_theme', 'refresh');
        
        }
      } else {
        $this->session->set_flashdata('errors','mot de passe incorrect');
        redirect('administrator~shappinvest/change_the_theme', 'refresh');
      }
    }else {
      $this->session->set_flashdata('errors','Probleme de transmision');
      redirect('administrator~shappinvest/change_the_theme', 'refresh');
    }
  }

}