<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DemandeModel extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'operations';
        // Set orderable column fields
        $this->column_order = array(null,'op.pseudodestinataire','op.montant','op.date_demande','com.montant','com.typecompte');
        // Set searchable column fields
        $this->column_search = array('op.pseudodestinataire', 'op.date_demande');
        // Set default order
        $this->order = array('op.date_demande' => 'DESC');
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
        $this->db->where('motif_oprt =', "Demande de retrait");
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

        $this->db->select('op.id, op.pseudodestinataire,
                            op.montant,
                            op.status,
                            op.date_demande,
                            com.montant AS montant_sur_compte,
                            com.typecompte');
        $this->db->from($this->table." AS op");
        $this->db->join('comptes com',"op.comptdestinataire = com.id");
        $this->db->where('op.motif_oprt =', "Demande de retrait");

        // Custom search filter 
         
        if(isset($postData['pseudo']) && $postData['pseudo'] != ''){
          $this->db->like('op.pseudodestinataire', $postData['pseudo']);
        }

        /*if(isset($postData['parrain']) && $postData['parrain'] != ''){
            $this->db->like('operations.pseudo_parrain', $postData['parrain']);
        }

        if(isset($postData['nom']) && $postData['nom'] != ''){
            $this->db->like('operations.first_name', $postData['nom_prenoms']);
            $this->db->or_like('operations.last_name', $postData['nom']);
        }

        if(isset($postData['niveau']) && $postData['niveau'] != ''){
            $this->db->like('operations.niveau', $postData['niveau']);
        }*/

        /*if((isset($postData['order_start_date']) && $postData['order_start_date'] != '') && isset($postData['order_end_date']) && $postData['order_end_date'] != '')
        {
            $this->db->where('operations.created_on2 >=', $postData['order_start_date']);
            $this->db->where('operations.created_on2 <=', $postData['order_end_date']);
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