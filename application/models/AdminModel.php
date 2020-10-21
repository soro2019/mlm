<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
    
    
    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Table = 'users';
    var $select_column = array("pseudo","nom","prenoms");
    var $order_column = array("pseudo","nom","prenoms");
    
        
    /* 
        CODE DES ELEMENTS DU TABLEAU DE BORD CONCERNANT L'UTILISATEUR 
    */
    
    public function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->Table);

         if (isset($_POST["search"]["value"])) {
             $this->db->like("pseudo", $_POST["search"]["value"]);
             $this->db->or_like("nom", $_POST["search"]["value"]);
             $this->db->or_like("prenoms", $_POST["search"]["value"]);
		 } 
         if(isset($_POST["order"])) {
			 $this->db->order_by($this->order_column[$_POST["order"]["0"]["column"]],$_POST["order"]["0"]["dir"]);
		 }
         else{
             $this->db->order_by("pseudo","ASC");
         }
    }
    
    public function make_datatables()
    {
        $this->make_query();
        if(isset($_POST["length"])) {
         if ($_POST["length"] != -1) {
             $this->db->limit($_POST["length"],$_POST["start"]);
		 }
        } 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->Table);
        return $this->db->count_all_results();
    }
    
}