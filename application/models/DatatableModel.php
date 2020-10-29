<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DatatableModel extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'operations';
        // Set orderable column fields
        $this->column_order = array(null,'*');
        // Set searchable column fields
        $this->column_search = array('typeoperation.lib', 'operations.mois_annee','comptes.pseudo_propio');
        // Set default order
        $this->order = array('operations.dateopration' => 'DESC');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows(){
        $postData = $this->input->post();
        $this->_get_datatables_query($postData);
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
    private function _get_datatables_query($postData){

        $this->db->select('*');

        $this->db->from($this->table);

        $this->db->join('typeoperation', 'typeoperation.id = operations.typeoperation');
        //$this->db->join('comptes', 'comptes.id = operations.comptereceveur', 'left');

        // Custom search filter 
         
        if(isset($postData['typeoperation']) && $postData['typeoperation'] != ''){
            $this->db->like('operations.typeoperation', $postData['typeoperation']);
        }

        if(isset($postData['mois_annee']) && $postData['mois_annee'] != ''){
            $this->db->like('operations.mois_annee', $postData['mois_annee']);
        }

        /*if(isset($postData['speudo_r']) && $postData['speudo_r'] != ''){
            $this->db->like('comptes.pseudo_propio', $postData['speudo_r']);
        }*/

        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if(isset($postData['search']['value'])){
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
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}