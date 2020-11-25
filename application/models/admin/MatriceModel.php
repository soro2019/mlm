<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MatriceModel extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'matrice';
        // Set orderable column fields
        $this->column_order = array(null,'users.pseudo','users.first_name','users.last_name','users.pseudo_parrain','users.phone', 'users.genre' , 'users.ville', 'users.niveau', 'users.created_on');
        // Set searchable column fields
        $this->column_search = array('users.pseudo', 'users.pseudo_parrain','users.niveau','users.created_on','users.first_name');
        // Set default order
        $this->order = array('matrice.date_migration' => 'DESC');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($niveau){
        $postData = $this->input->post();
        $this->_get_datatables_query($niveau,$postData);
        if(isset($postData['length']) && $postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Count all records
     */
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($niveau,$postData){

        $this->db->select('u.pseudo,
                            u.first_name,
                            u.last_name,
                            u.phone,
                            u.email,
                            matrice.date_migration,
                            matrice.pseudo_filleulGauche,
                            matrice.pseudo_filleulDroit,
                            u.pseudo_parrain');

        $this->db->from(''.$this->table.$niveau.' AS matrice');
        $this->db->join('users u',"u.pseudo = matrice.pseudo_user AND matrice.pseudo_user <> 'usermlm'");

        // Custom search filter 
         
        /*if(isset($postData['pseudo']) && $postData['pseudo'] != ''){
            $this->db->like('users.pseudo', $postData['pseudo']);
        }

        if(isset($postData['parrain']) && $postData['parrain'] != ''){
            $this->db->like('users.pseudo_parrain', $postData['parrain']);
        }

        if(isset($postData['nom']) && $postData['nom'] != ''){
            $this->db->like('users.first_name', $postData['nom_prenoms']);
            $this->db->or_like('users.last_name', $postData['nom']);
        }

        if(isset($postData['niveau']) && $postData['niveau'] != ''){
            $this->db->like('users.niveau', $postData['niveau']);
        }*/

        /*if((isset($postData['order_start_date']) && $postData['order_start_date'] != '') && isset($postData['order_end_date']) && $postData['order_end_date'] != '')
        {
            $this->db->where('users.created_on2 >=', $postData['order_start_date']);
            $this->db->where('users.created_on2 <=', $postData['order_end_date']);
        }*/

        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            /*if(isset($postData['search']['value'])){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;*/
        }
         
        /*if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }*/
    }
}