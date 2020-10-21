<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FournisseurModel extends CI_Model {

  	    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }


        public function des($id)
        {
        	$data = array('statut' => 0);
        	$this->db->where('id', $id);
        	$this->db->update('fournisseur', $data);

        }

        public function act($id)
        {
        	$data = array('statut' => 1);
        	$this->db->where('id', $id);
        	$this->db->update('fournisseur', $data);

        }


        public function des_liv($id)
        {
        	$data = array('statut' => 0);
        	$this->db->where('id', $id);
        	$this->db->update('livreur', $data);

        }

        public function act_liv($id)
        {
        	$data = array('statut' => 1);
        	$this->db->where('id', $id);
        	$this->db->update('livreur', $data);

        }


}