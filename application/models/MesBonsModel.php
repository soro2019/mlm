<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesBonsModel extends CI_Model {
    
    
    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Table = 'mes_bons';
    
    
    
    /* 
        CODE DES ELEMENTS DU TABLEAU DE BORD CONCERNANT L'UTILISATEUR 
    */
    
    public function mesbons($pseudo)
    {
            $this->db->select('id,gains');
            $this->db->from($this->Table);
            $this->db->where("pseudo_utilisateur",$pseudo);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->row_array();
			 return $result['gains'];
		 } else {
			 return 0;
		 }
    }
    
    public function AjouterLigne($pseudo)
    {
            $data = array(
                'pseudo_utilisateur' => $pseudo,
                'gains' => 0
            );
         if ($this->db->insert('mes_bons', $data)) {   
			 return true;
		 } else {
			 return false;
		 }
    }
    
    
    
    
    
    
    
    
    
    
   /* 
    
    
    
    $this->db->trans_begin();

    $this->db->query('AN SQL QUERY...');
    $this->db->query('ANOTHER QUERY...');
    $this->db->query('AND YET ANOTHER QUERY...');

    if ($this->db->trans_status() === FALSE)
    {
            $this->db->trans_rollback();
    }
    else
    {
            $this->db->trans_commit();
    }*/
    
}