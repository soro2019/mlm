<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FreelanceModel extends CI_Model {
    
    
    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Table = 'chef_agence';
    
    
    
    /* 
        CODE DES ELEMENTS DU TABLEAU DE BORD CONCERNANT L'UTILISATEUR 
    */
    
    public function gainsFreelance($code_freelance)
    {
            $this->db->select('id,gains');
            $this->db->from($this->Table);
            $this->db->where("code_freelance",$code_freelance);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->result();
			 return $result['gains'];
		 } else {
			 return 0;
		 }
    }
    
    public function soldeFreelance($code_freelance)
    {
            $this->db->select('id,solde');
            $this->db->from($this->Table);
            $this->db->where("code_freelance",$code_freelance);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->result();
			 return $result['gains'];
		 } else {
			 return 0;
		 }
    }
    
    
    public function AjouterGainsFreelance($code_freelance)
    {
        $this->db->select('id,gains,solde');
        $this->db->from($this->Table);
        $this->db->where("code_freelance",$code_freelance);
        $gains_e = $this->db->get();
        $gains_emast = $gains_e->row(1);
        $gains_emaster = $gains_emast->gains + 250;
        $solde_emaster = $gains_emast->solde - 12600;
        
        $gain_emastere = array(
                'gains' => $gains_emaster,
                'solde' => $solde_emaster
        );
        $this->db->where('code_freelance', $code_freelance);
        
         if ($this->db->update('chef_agence', $gain_emastere)) {
		 return true;
		 } else {
			 return false;
		 }
    }
    
    
    public function FreelanceExiste($code_freelance){
         $this->db->select('code_freelance'); 
		 $this->db->from($this->Table);
		 $this->db->where("code_freelance",$code_freelance);
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
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