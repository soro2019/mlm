<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion_interne_gie extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('grocery_CRUD');
    $this->load->model('admin/FournisseurModel');
    $this->load->model('UserModel');
  }


  public function fournisseur_liste()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
          
    $crud = new grocery_CRUD();

    $crud->set_table('fournisseur');
    $crud->display_as('id_localisation', 'siege');//change le nom des champs de la table
    $crud->display_as('tel', 'Téléphon');
    //le champ id_localisation provien de la table st_fournisseur
    $crud->set_subject('Fournisseur');
    //set_relation('nom champ dans la table fille', 'nom de la table pere', 'nom champ dans la table pere a afficher')
    $crud->set_relation('id_localisation', 'localisation', 'localisation');//mettre la table st_fournisseur en relation avec la table localisation
    //verication de la validité du formulaire
    //|matches[password] verifie si A correspon a password
    $crud->set_rules('nom_entreprise', 'Nom entreprise' , 'trim|required');
    $crud->set_rules('adresse_postal', 'Adresse postal' , 'trim|required');
    $crud->set_rules('tel', 'Téléphon' , 'trim|required|is_unique[fournisseur.tel]|min_length[8]|integer');
    $crud->set_rules('email', 'Email' , 'trim|required|valid_email|is_unique[fournisseur.email]');//is_unique[nomTable.champ] pour eviter les doublons de email
    $crud->set_rules('type_entreprise', 'Type entreprise' , 'trim|required');
    $crud->set_rules('numero_rccm', 'Numéro RCCM' , 'trim|required|is_unique[fournisseur.numero_rccm]');
    $crud->set_rules('numero_cc', 'Noumero CC' , 'trim|required|is_unique[fournisseur.numero_cc]');
    //$crud->required_fields('lastName');
    $crud->field_type('statut', 'dropdown',array('0'=>'Désactiver','1'=>'Activer'));//cree un champ de selection avec les element du array
    //$row->statut pour recuperer la valeur du champ 'statut'

    $crud->callback_column('statut', array($this,'_actifsOupas'));//

    $crud->columns('nom_entreprise','adresse_postal', 'tel', 'email', 'id_localisation', 'type_entreprise', 'numero_rccm', 'statut');
    $crud->add_action('Désactiver ce fournisseur', '', 'administratro~gie2018/Gestion_interne_gie/des_fr', 'btn btn-danger');
    $crud->add_action('Activer ce fournisseur', '', 'administratro~gie2018/Gestion_interne_gie/act_fr', 'btn btn-success');
    $crud->unset_delete();
    $output = $crud->render();
          
    $this->load->view('admin/gestion_fournisseur_view.php',(array)$output);
  }


   function des_fr()
  {
    $primary_key=$this->uri->segment(4);
    $this->FournisseurModel->des($primary_key);
    redirect('administratro~gie2018/Gestion_interne_gie/fournisseur_liste/', 'refresh');

  }
  
   function act_fr()
  {
    $primary_key=$this->uri->segment(4);
    $this->FournisseurModel->act($primary_key);
    redirect('administratro~gie2018/Gestion_interne_gie/fournisseur_liste/', 'refresh');
  }

  public function livreur_liste()
  {
     if(!$this->ion_auth->logged_mlm_in())
      {
        redirect('connexion');
      }
      $crud = new grocery_CRUD();
      //$crud->set_theme('datatables');
      $crud->set_table('livreur');//appel de la table
      $crud->display_as('prenoms','Prénom');
      $crud->display_as('tel','Téléphone');

      $crud->set_subject('Livreur');//appel de l'objet
      $crud->display_as('id_residence','Résidence');

      $crud->set_relation('id_residence','localisation','localisation');
      $this->form_validation->set_rules('nom','Nom','trim|required');
      $this->form_validation->set_rules('prenoms','Prénom','trim|required');
      $this->form_validation->set_rules('tel','Tel','trim|required');
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[livreur.email]');
      $this->form_validation->set_rules('id_residence','Lieu de residence','trim|required');
      $this->form_validation->set_rules('affiliation','Affiliation','trim|required');
      $crud->columns('nom', 'prenoms', 'tel', 'email', 'id_residence', 'affiliation', 'statut');
      $crud->field_type('statut', 'dropdown',array('0'=>'Désactiver','1'=>'Activer'));//cree un champ de selection avec les element du array
      $crud->callback_column('statut', array($this,'_actifsOupas'));//
      
        $crud->add_action('Activer ce livreur', '', 'administratro~gie2018/Gestion_interne_gie/act_livreur', 'btn btn-success');
      
        $crud->add_action('Désactiver ce livreur', '', 'administratro~gie2018/Gestion_interne_gie/des_livreur', 'btn btn-danger');
      
      $crud->unset_delete();
      $output = $crud->render();
      $this->load->view('admin/gestion_livreur_view.php',(array)$output);
  }
   

  function des_livreur()
  {
    $primary_key=$this->uri->segment(4);
    $this->FournisseurModel->des_liv($primary_key);
    redirect('administratro~gie2018/Gestion_interne_gie/livreur_liste/', 'refresh');
    
  }
  
  function act_livreur()
  {
    $primary_key=$this->uri->segment(4);
    $this->FournisseurModel->act_liv($primary_key);
    redirect('administratro~gie2018/Gestion_interne_gie/livreur_liste/', 'refresh');
  }


   public function _actifsOupas($value, $row)
   {
     if($row->statut == 0) return "Désactiver";
     else return "Activer";
   }

   /****PARTIE ACTIFS****/
    public function activer_fr()
    {
        if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
            
       $crud = new grocery_CRUD();

      $crud->set_table('fournisseur');
      $crud->display_as('id_localisation', 'siege');//change le nom des champs de la table
      $crud->display_as('tel', 'Téléphon');
      //le champ id_localisation provien de la table st_fournisseur
      $crud->set_subject('Fournisseur');
      //set_relation('nom champ dans la table fille', 'nom de la table pere', 'nom champ dans la table pere a afficher')
      $crud->set_relation('id_localisation', 'localisation', 'localisation');//mettre la table st_fournisseur en relation avec la table localisation
      //verication de la validité du formulaire
      //|matches[password] verifie si A correspon a password
      $crud->where('statut','1');
      $crud->columns('nom_entreprise','adresse_postal', 'tel', 'email', 'id_localisation', 'type_entreprise', 'numero_rccm');
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_read();
      $output = $crud->render();
            
      $this->load->view('admin/gestion_fournisseur_view.php',(array)$output);
  
    }

   public function active_liv()
    {
         if(!$this->ion_auth->logged_mlm_in())
          {
            redirect('connexion');
          }
      $crud = new grocery_CRUD();

      //$crud->set_theme('datatables');
      $crud->set_table('livreur');//appel de la table
      $crud->display_as('prenoms','Prénom');
      $crud->display_as('tel','Téléphone');
      $crud->set_subject('Livreur');//appel de l'objet
      $crud->display_as('id_residence','Résidence');
      $crud->set_relation('id_residence','localisation','localisation');
      $crud->where('statut','1');
      $crud->columns('nom', 'prenoms', 'tel', 'email', 'id_residence', 'affiliation');
      $crud->unset_delete();
      $crud->unset_add();
      $crud->unset_edit();
      $crud->unset_read();
      $output = $crud->render();
      $this->load->view('admin/gestion_livreur_view.php',(array)$output);
    }
   /**********/

   /****PARTIE DESACTIVER****/
    public function desactiver_fr()
    {
        if(!$this->ion_auth->logged_mlm_in())
        {
          redirect('connexion');
        }
            
       $crud = new grocery_CRUD();

      $crud->set_table('fournisseur');
      $crud->display_as('id_localisation', 'siege');//change le nom des champs de la table
      $crud->display_as('tel', 'Téléphon');
      //le champ id_localisation provien de la table st_fournisseur
      $crud->set_subject('Fournisseur');
      //set_relation('nom champ dans la table fille', 'nom de la table pere', 'nom champ dans la table pere a afficher')
      $crud->set_relation('id_localisation', 'localisation', 'localisation');//mettre la table st_fournisseur en relation avec la table localisation
      //verication de la validité du formulaire
      //|matches[password] verifie si A correspon a password
      $crud->where('statut','0');
      $crud->columns('nom_entreprise','adresse_postal', 'tel', 'email', 'id_localisation', 'type_entreprise', 'numero_rccm');
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_read();
       $output = $crud->render();
      $this->load->view('admin/gestion_fournisseur_view.php',(array)$output);
  
    }

    public function desactiver_liv()
    {
         if(!$this->ion_auth->logged_mlm_in())
          {
            redirect('connexion');
          }
      $crud = new grocery_CRUD();

      //$crud->set_theme('datatables');
      $crud->set_table('livreur');//appel de la table
      $crud->display_as('prenoms','Prénom');
      $crud->display_as('tel','Téléphone');
      $crud->set_subject('Livreur');//appel de l'objet
      $crud->display_as('id_residence','Résidence');
      $crud->set_relation('id_residence','localisation','localisation');
      $crud->where('statut','0');
      $crud->columns('nom', 'prenoms', 'tel', 'email', 'id_residence', 'affiliation');
      $crud->unset_delete();
      $crud->unset_add();
      $crud->unset_edit();
      $crud->unset_read();
      $output = $crud->render();
      $this->load->view('admin/gestion_livreur_view.php',(array)$output);
    }
   /**********/
}