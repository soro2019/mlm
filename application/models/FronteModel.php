<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FronteModel extends CI_Model {
    
    
    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function save_operation($tablename, $data)
    {
      $this->db->insert($tablename, $data);
      return $this->db->insert_id();
    }

    public function emailExiste($tablename, $email)
    {
      $query = $this->db->get_where($tablename, array('email' => $email));
      if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function selectAllCategories()
    {
      $this->db->select('*');
      $this->db->from('categories_blog');
      $this->db->order_by('lib_cate', 'ASC');
      $query = $this->db->get();
       if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function countArticleByCategory($idcate)
    {
      $lesarticles = $this->selectArticles();
      $tableCte = [];
      if(is_array($lesarticles))
      {
       foreach ($lesarticles as $lesarticle){
          $blocCate = $lesarticle->id_categorie;
          $array = explode(',', $blocCate);
          foreach ($array as $value) {
            array_push($tableCte, $value);
          }
       }
        return $tableCte;
      }
    }


    public function lescategoriesArticle($idcate)
    {
      $this->db->select('lib_cate');
      $this->db->from('categories_blog');
      $this->db->where('id ', $idcate);
      $query = $this->db->get();
      if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function latestNews()
    {
      $this->db->select('*');
      $this->db->from('article_blog');
      $this->db->order_by('date_create', 'DESC');
       $this->db->limit(3);
      $query = $this->db->get();
      if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function selectArticles($id="")
    {
      if($id!="" or !empty($id)){
        $this->db->where('id_article ', $id);
      }
      $this->db->select('*');
      $this->db->from('article_blog');
      $query = $this->db->get();
      if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function selectArticlesByType($type)
    {
      $this->db->where('type_blog ', $type);
      $this->db->select('*');
      $this->db->from('article_blog');
      $query = $this->db->get();
      if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }


    public function selectArticlesByType1($type, $limit, $start)
    {
      $this->db->limit($limit, $start);
      $this->db->where('type_blog ', $type);
      $this->db->select('*');
      $this->db->from('article_blog');
      $query = $this->db->get();
      if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }


    public function get_count($type)
    {
      $this->db->where('type_blog ', $type);
      $this->db->select('*');
      $this->db->from('article_blog');
      $query = $this->db->get();
      return $query->num_rows();
    }


    

    public function selectAvisByArticle($idarticle)
    {
      $this->db->select('*');
      $this->db->from('avis_sur_article');
      $this->db->where('id_article ', $idarticle);
      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result();
        }else{
            return false;
        }
    }
	
	
}