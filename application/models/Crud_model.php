<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

	public function __construct()
    {
     parent::__construct();
    }


    public function listePays($name="")
    {
    	if($name!="")
    	{
    	  $this->db->where('name', $name);
    	}
    	$query = $this->db->get('pays');
    	if($query->num_rows() > 1)
    	{
    	   return $query->result_array();
    	}elseif($query->num_rows() == 1)
    	{
    	  return $query->row_array();
    	}else
    	{
    	  return false;
    	}
    }

    public function selectPaysById($id)
    {
    	$this->db->select('name');
    	$this->db->from('pays');
    	$this->db->where('id', $id);
    	$query = $this->db->get();
    	if($query->num_rows() == 1)
    	{
    	  return $query->row_array()['name'];
    	}else
    	{
    	  return false;
    	}
    }

    public function selectArticle($categorie, $limit="")
    {
        if($limit!="")
        {
          $this->db->limit($limit);
        }
      $this->db->select('*');
      $this->db->from('articles');
      $this->db->where('id_categorie', $categorie);
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result_array();
      }else return 0;
    }

    public function mescomptes($pseudo)
    {
      $this->db->select('*');
      $this->db->from('comptes');
      $this->db->where(array('pseudo_propio' => $pseudo));
      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result_array();
      }else return 0;
    }

    public function moncomptes($pseudo, $type)
    {
      $this->db->select('*');
      $this->db->from('comptes');
      $this->db->where('typecompte', $type);
      $query = $this->db->get();
      if($query->num_rows() == 1){
          return $query->row_array();
      }else return 0;
    }


    public function select_filleuls($parrain, $matrice)
    {
        $this->db->select('*');
        $this->db->from('matrices');
        $this->db->where(array('pseudo_user' => $parrain, 'niveau' => $matrice));
        $query = $this->db->get();
        return $query->row_array();           
    }


    public function selectAllProduct()
    {
      $this->db->select('*');
        $this->db->from('produits');
        $this->db->where(array('status' => '1'));
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else return 0;
    }

}