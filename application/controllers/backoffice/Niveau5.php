<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Niveau5 extends MY_Controller
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
      $this->data['AfficheNiveau'] = 5;
  }

  public function index()
  {
  }

  public function mon_arbre(){
    if(!$this->ion_auth->logged_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Mon arbre généalogique';
      $this->data['titre'] = 'Mon arbre généalogique';
      $this->render('backoffice/niveau4/Mon_arbre_genealogique_view','backoffice_master');
  } 
  public function reseau(){
    if(!$this->ion_auth->logged_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Mon Réseau';
      $this->data['titre'] = 'Mon Réseau';
      $this->render('backoffice/niveau4/reseau_view','backoffice_master');
  } 
  public function gain(){
    if(!$this->ion_auth->logged_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Mon Gain';
      $this->data['titre'] = 'Mon Gain';
      $this->render('backoffice/niveau4/gain_view','backoffice_master');
  } 
  public function demande_retrat(){
    if(!$this->ion_auth->logged_in())
      {
        redirect('connexion');
      }
      $this->data['page_title'] = 'Demande de retrait';
      $this->data['titre'] = 'Demande de retrait';
      $this->render('backoffice/niveau4/demande_retrait_view','backoffice_master');
  }   
    
}