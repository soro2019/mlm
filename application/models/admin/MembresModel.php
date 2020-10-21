<?php
/*
 * Ce script est libre de droit.
 */
 
/**
 * Modèle construit pour interagir avec Datatable
 *
 * @author JemDesign Team
 *
 * @email  jmedesign7@gmail.com
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class MembresModel extends CI_Model {
 
    private $_order_id;
    private $_pseudo;
    private $_nom;
    private $_prenoms;
    private $_mes_bons;
    private $_mon_niveau;
    private $_startDate;
    private $_endDate;
 
    public function setOrderID($order_id) {
        $this->_order_id = $order_id;
    }
    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    } 
    public function setNom($nom) {
        $this->_nom = $nom;
    } 
    public function setPrenoms($prenoms) {
        $this->_prenoms = $prenoms;
    } 
    public function setMesBons($mes_bons) {
        $this->_mes_bons = $mes_bons;
    } 
    public function setMonNiveau($mon_niveau) {
        $this->_mon_niveau = $mon_niveau;
    }    
    public function setStartDate($startDate) {
        $this->_startDate = $startDate;
    }
    public function setEndDate($endDate) {
        $this->_endDate = $endDate;
    }
    
    // get Users List
    public function getUsers() {        
        $this->db->select(array('o.pseudo', 'o.nom', 'o.prenoms', 'o.telephone', 'o.created_on','b.gains', 'n.mon_niveau'));
        $this->db->from('users o');
        $this->db->where('pseudo !=','administrateur2018');
        $this->db->where('pseudo !=','xxxemaster');
        if(empty($this->_mes_bons)){
            $this->db->join('mes_bons b', 'b.pseudo_utilisateur = o.pseudo', 'left');
        } 
        if(empty($this->_mon_niveau)){
            $this->db->join('mon_niveau n', 'n.pseudo_utilisateur = o.pseudo', 'left');
        }    
        if(!empty($this->_startDate) && !empty($this->_endDate)) {
            $this->db->where("created_on BETWEEN $this->_startDate AND $this->_endDate");
        }        
        if(!empty($this->_order_id)){
            $this->db->where('o.order_id', $this->_order_id);
        }        
        if(!empty($this->_pseudo)){            
            $this->db->like('o.pseudo', $this->_pseudo, 'both');
        }
        if(!empty($this->_nom)){            
            $this->db->like('o.nom', $this->_nom, 'both');
        }
        if(!empty($this->_prenoms)){            
            $this->db->like('o.prenoms', $this->_prenoms, 'both');
        }
        if(!empty($this->_mes_bons)){   
            $this->db->join('mes_bons b', 'b.pseudo_utilisateur = o.pseudo', 'left');      
            $this->db->like('b.gains', $this->_mes_bons, 'both');
        }
        if(!empty($this->_mon_niveau)){            
            $this->db->join('mon_niveau n', 'n.pseudo_utilisateur = o.pseudo', 'left');      
            $this->db->like('n.mon_niveau', $this->_mon_niveau, 'both');
        }       
        $this->db->order_by('o.created_on', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    /*
        ADMINISTRATION GIE
    */
    
    //
 	public function NombreDeMembres() 
	{   		
		return $this->db->count_all_results('users') - 2;
  	}
    
  	public function MontantTotalRecolte() 
	{  	 	 
		$compte = ($this->db->count_all_results('users') - 2) * 12600;
		$valeur_recolte = number_format($compte, 0, ',', ' ');
        return $valeur_recolte;
  	}
    
  	//Recherche des utilisateur inscrite ce jour
  	public function MembreInscritAuJourdHui() 
	{  	 	 
		$DateDujour = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$this->db->select('created_on'); 
		$this->db->from('users');
		$this->db->where('created_on',$DateDujour);
		$query = $this->db->get();
		$Compt = $query->num_rows();
		return $Compt;

  	}
    
  	//Recherche des utilisateur inscrite cette semaine
  	public function MembreInscritCetteSemaine() 
	{  	 	 
		$DateDuJour = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$DateDuJour_7 = mktime(0,0,0,date("m"),date("d")-7,date("Y"));
		$this->db->select('created_on'); 
		$this->db->from('users');
		$this->db->where('created_on <=',$DateDuJour);
		$this->db->where('created_on >=',$DateDuJour_7);
		$query = $this->db->get();
		$Compt = $query->num_rows();
		return $Compt;

  	}
    
  	//Recherche des utilisateur inscrite ce mois
  	public function MembreInscritDeCeMois() 
	{  	 	 
		$DateDuJour = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$DateDuJour_Mois_1 = mktime(0,0,0,date("m")-1,date("d"),date("Y"));
		$this->db->select('created_on'); 
		$this->db->from('users');
		$this->db->where('created_on <=',$DateDuJour);
		$this->db->where('created_on >=',$DateDuJour_Mois_1);
		$query = $this->db->get();
		$Compt = $query->num_rows();
		return $Compt;

  	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 
}
?>