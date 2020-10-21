<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgenceModel extends CI_Model {
    
    
    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Table = 'agences';
    private $_startDate;
    private $_endDate;
    
    public function setStartDate($startDate) {
        $this->_startDate = $startDate;
    }
    public function setEndDate($endDate) {
        $this->_endDate = $endDate;
    }
    
    /* 
        CODE DES ELEMENTS DU TABLEAU DE BORD CONCERNANT L'UTILISATEUR 
    */
    
    public function gainsAgence($code_agence)
    {
            $this->db->select('id,gains');
            $this->db->from($this->Table);
            $this->db->where("code_agence",$code_agence);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->result();
			 return $result['gains'];
		 } else {
			 return 0;
		 }
    }
    
    public function getNom($code_agence)
    {
            $this->db->select('id,localisation');
            $this->db->from($this->Table);
            $this->db->where("code_agence",$code_agence);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->row_array();
			 return $result['localisation'];
		 } else {
			 return '';
		 }
    }
    
    public function getNomProduit($id)
    {
            $this->db->select('id,designation');
            $this->db->from('gie_produit');
            $this->db->where("id",$id);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->row_array();
			 return $result['designation'];
		 } else {
			 return '';
		 }
    }
    
    public function getNomFree($code_agence)
    {
            $this->db->select('id,nom_complet');
            $this->db->from('chef_agence');
            $this->db->where("code_freelance",$code_agence);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->row_array();
			 return $result['nom_complet'];
		 } else {
			 return '';
		 }
    }
    
    public function soldeAgence($code_agence)
    {
            $this->db->select('id,solde');
            $this->db->from($this->Table);
            $this->db->where("code_agence",$code_agence);
            $query = $this->db->get();

        if ($query->num_rows() == 1) {
             $result = $query->result();
			 return $result['gains'];
		 } else {
			 return 0;
		 }
    }
    
    
    public function AjouterGainsAgence($code_agence)
    {
            $this->db->select('id,gains,solde');
            $this->db->from('agences');
            $this->db->where('code_agence',$code_agence);
            $gains_e = $this->db->get();
            $gains_emast = $gains_e->row();
            $gains_emaster = $gains_emast->gains + 500;
            $solde_emaster = $gains_emast->solde - 12600;
            
            $gain_emastere = array(
                    'gains' => $gains_emaster,
                    'solde' => $solde_emaster
            );
            $this->db->where('code_agence', $code_agence);
            
             if ($this->db->update('agences', $gain_emastere)) {
             
    			 return true;
    		 } else {
    			 return false;
    		 }
    }
    
    
    public function AgenceExiste($code_agence){
         $this->db->select('code_agence'); 
		 $this->db->from($this->Table);
		 $this->db->where('code_agence',$code_agence);
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return true;
		 } else {
			 return false;
		 }
    }
    
    public function InscritAgence($code_agence){
        
    }
    
    
    // get Etat créances
    public function getEtatCreances() {        
        $this->db->select('code_agence');
        $this->db->from('agences');     
        
        $query = $this->db->get();
        $arr1 = $query->result_array();
        
        return $arr1;
    }
    
    public function getEtatCreancesFree() {        
        $this->db->select('code_freelance AS code_agence');
        $this->db->from('chef_agence');     
        
        $query = $this->db->get();
        $arr1 = $query->result_array();
        
        return $arr1;
    }
    
    public function getNbreInscrit($code,$startDate,$endDate) {        
        $this->db->select('pseudo', 'code_agence', 'created_on');
        $this->db->from('users');
        $this->db->where('code_agence',$code);
            
        $this->db->where("created_on BETWEEN $startDate AND $endDate");
             
        
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function getNbreInscritInit($code,$startDate,$endDate) {        
        $this->db->select('pseudo', 'code_agence', 'created_on');
        $this->db->from('users');
        $this->db->where('code_agence',$code);
            
        $this->db->where('created_on <', $startDate);      
        
        $query = $this->db->get();
        return $query->num_rows();
    } 
    
    public function getNbreProduitsVendus($code,$startDate,$endDate) {        
        $this->db->select('qte', 'code_agence', 'date');
        $this->db->from('agences_ventes');
        $this->db->where('code_agence',$code);
            
        $this->db->where("date BETWEEN $startDate AND $endDate");       
        
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function getNbreProduitsVendusInit($code,$startDate,$endDate) {        
        $this->db->select('qte', 'code_agence', 'date');
        $this->db->from('agences_ventes');
        $this->db->where('code_agence',$code);
            
        
            $this->db->where('date <', $startDate);
               
        
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function getMttProduitsVendus($code,$startDate,$endDate) {        
        $this->db->select_sum('montant');
        $this->db->from('agences_ventes');
        $this->db->where('code_agence',$code);
            
        $this->db->where("date BETWEEN $startDate AND $endDate");       
        
        $query = $this->db->get();
        $row = $query->row();
        return $row->montant;
    }
    
    public function getMttProduitsVendusInit($code,$startDate,$endDate) {        
        $this->db->select_sum('montant');
        $this->db->from('agences_ventes');
        $this->db->where('code_agence',$code);
            
        $this->db->where('date <', $startDate);     
        
        $query = $this->db->get();
        $row = $query->row();
        return $row->montant;
    }
    
    public function getMttVersements($code,$startDate,$endDate) {        
        $this->db->select_sum('montant');
        $this->db->from('agences_versements');
        $this->db->where('code_agence',$code);
            
        $this->db->where("date BETWEEN $startDate AND $endDate");       
        
        $query = $this->db->get();
        $row = $query->row();
        return $row->montant;
    }
    
    public function getMttVersementsInit($code,$startDate,$endDate) {        
        $this->db->select_sum('montant');
        $this->db->from('agences_versements');
        $this->db->where('code_agence',$code);
            
        $this->db->where('date <', $startDate);    
        
        $query = $this->db->get();
        $row = $query->row();
        return $row->montant;
    }
    
    public function getAgence() {        
        $this->db->select('localisation,code_agence');
        $this->db->from('agences');
        
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getAgenceFree() {        
        $this->db->select('nom_complet as localisation,code_freelance as code_agence');
        $this->db->from('chef_agence');
        
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getUser($startDate,$endDate) {        
        $this->db->select('pseudo,created_on,code_agence');
        $this->db->from('users');
        $this->db->where('code_agence !=','');   
        $this->db->where("created_on BETWEEN $startDate AND $endDate");
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getProduitsVendusAll($startDate,$endDate) {        
        $this->db->select('code_agence,qte,montant,id_produit,date');
        $this->db->from('agences_ventes'); 
        $this->db->where("date BETWEEN $startDate AND $endDate");
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getVersementsAll($startDate,$endDate) {        
        $this->db->select('code_agence,montant,reference,date');
        $this->db->from('agences_versements'); 
        $this->db->where("date BETWEEN $startDate AND $endDate");
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getUsers($agence,$startDate,$endDate) {        
        $this->db->select('pseudo,created_on,code_agence');
        $this->db->from('users');
        $this->db->where('code_agence',$agence);   
        $this->db->where("created_on BETWEEN $startDate AND $endDate");
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function getProduitsVendus($agence,$startDate,$endDate) {        
        $this->db->select('code_agence,qte,montant,id_produit,date');
        $this->db->from('agences_ventes');
        $this->db->where('code_agence',$agence);   
        $this->db->where("date BETWEEN $startDate AND $endDate");
        $query = $this->db->get();
        return $query->result_array();
        
    } 
    
    public function getVersements($agence,$startDate,$endDate) {        
        $this->db->select('code_agence,montant,reference,date');
        $this->db->from('agences_versements');
        $this->db->where('code_agence',$agence);   
        $this->db->where("date BETWEEN $startDate AND $endDate");
        $query = $this->db->get();
        return $query->result_array();
        
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