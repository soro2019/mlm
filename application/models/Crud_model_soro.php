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
      $this->db->where(array('id_categorie' => $categorie, 'status' => 1));
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
      $this->db->where(array('pseudo_propio' => trim($pseudo)));
      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result_array();
      }else return 0;
    }

    public function moncomptes($pseudo, $type)
    {
      $this->db->select('*');
      $this->db->from('comptes');
      $this->db->where('typecompte', trim($type));
      $this->db->where('pseudo_propio', trim($pseudo));
      $query = $this->db->get();
      if($query->num_rows() == 1){
          return $query->row_array();
      }else return 0;
    }


    public function moncompteById($id)
    {
      $this->db->select('*');
      $this->db->from('comptes');
      $this->db->where('id', $id);
      $query = $this->db->get();
      if($query->num_rows() == 1){
          return $query->row_array();
      }else return 0;
    }


    public function select_filleuls($parrain, $matrice)
    {
      $this->db->select('*');
      $this->db->from($matrice);
      $this->db->where(array('pseudo_user' => $parrain));
      $query = $this->db->get();
      return $query->row_array();           
    }
    public function select_parrain($filleul, $matrice)
    {
      $this->db->select('*');
      $this->db->from($matrice);
      $this->db->where('pseudo_filleulGauche',$filleul);
      $this->db->or_where('pseudo_filleulDroit',$filleul);
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


    public function selectAllTypeOp()
    {
        $this->db->select('*');
        $this->db->from('typeoperation');
        $this->db->order_by('lib', 'ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else return 0;
    }

    public function selectTypeOpById($id)
    {
        $this->db->select('*');
        $this->db->from('typeoperation');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->row_array();
        }else return 0;
    }

    public function selectAllOperationByPseudo($pseudo)
    {
        $this->db->select('*');
        $this->db->from('operations');
        $this->db->where('pseudodestinataire', $pseudo);
        $this->db->order_by('dateopration', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else return 0;
    }

    public function GetProductDataById($id)
    {
        $this->db->select('*');
        $this->db->from('produits');
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row_array();
        }else return 0;
    }


    public function update_where($table, $data, $condition, $where)
    {
      $this->db->where($where, $condition);
      $this->db->update($table, $data);
      return true;
    }

    public function insertion_($tablename, $data)
    {
      $this->db->insert($tablename, $data);
      return $this->db->insert_id();
    }

    public function nameExist($table, $field, $name)
    {
        $this->db->select('*'); 
        $this->db->from($table);
        $this->db->where(array($field => $name));
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }        
    }
    public function delete_row($table,$where)
    {
      $this->db->where($where);
      $this->db->delete($table);
      return true;
    }

    public function updateGen($key, $data, $table)
    {
      //key est de la forme array('nom colonne' => $valeur)
      //idem pour data
      foreach($data as $at => $val)
      {
          $this->db->set($at,$val) ;
      }
      foreach($key as $at => $val)
      {
          $this->db->where($at,$val);
      }
      $this->db->update($table);

      return true;
    }

    public function recup_reelPseudo($clone_pseudo, $matrice)
    {
        $this->db->select('reel_pseudo');
        $this->db->from('clones_'.$matrice);
        $this->db->where(array('clone_pseudo' => $clone_pseudo));
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['reel_pseudo'];
    }

    public function pseudo_clone($reel_pseudo, $matrice)
    {
        $this->db->select('*');
        $this->db->from('clones_'.$matrice);
        $this->db->where(array('reel_pseudo' => $reel_pseudo));
        $query = $this->db->get();
        $nb = $query->num_rows() +1;
        return 'clone'.$nb.'_'.$reel_pseudo;
    }



}