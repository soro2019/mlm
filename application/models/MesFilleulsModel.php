<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MesFilleulsModel extends CI_Model {
    
    
    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Table = 'mes_filleuls';
    
    public function filleulsNiveau1g($pseudo)
    {
            $this->db->select('id,pseudo_utilisateur,pseudo_filleul,niveau_filleul,side,created');
            $this->db->from($this->Table);
            $array = array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => 1, 'side' => 'g');
            $this->db->where($array);
            //$this->db->where("pseudo_utilisateur",$pseudo);
            $this->db->limit(1);
            $query = $this->db->get();

        if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
    }
    
    
    public function filleulsNiveau1d($pseudo)
    {
            $this->db->select('id,pseudo_utilisateur,pseudo_filleul,niveau_filleul,side,created');
            $this->db->from($this->Table);
            $array = array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => 1, 'side' => 'd');
            $this->db->where($array);
            //$this->db->where("pseudo_utilisateur",$pseudo);
            $this->db->limit(1);
            $query = $this->db->get();

        if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
    }
    
    public function filleulsNiveau2g($pseudo)
    {
            $this->db->select('id,pseudo_utilisateur,pseudo_filleul,niveau_filleul,side,created');
            $this->db->from($this->Table);
            $array = array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => 1, 'side' => 'd');
            $this->db->where($array);
            //$this->db->where("pseudo_utilisateur",$pseudo);
            $query = $this->db->get();

        if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
    }
    
    
    /* 
        CODE DES ELEMENTS DU TABLEAU DE BORD CONCERNANT L'UTILISATEUR 
    */
    
    public function membresreseauperso($pseudo)
    {
            $this->db->select('pseudo_parrain');
            $this->db->from($this->Table);
            $this->db->where('pseudo_parrain',$pseudo);
            $query = $this->db->get();
        if ($query) {
            $num = $query->num_rows();
			 return $num;
		 } else {
			 return 0;
		 }
    }
    
    public function sifilleulexiste($pseudo)
    {
        $this->db->select('pseudo_utilisateur'); 
		 $this->db->from($this->Table);
		 $this->db->where("pseudo_utilisateur",$pseudo);
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return true;
		 } else {
			 return false;
		 }
    }
    
    
    public function inscritoday($pseudo)
    {
            $this->db->select('pseudo_utilisateur');
            $this->db->from($this->Table);
            $this->db->where("pseudo_utilisateur",$pseudo);
            $this->db->where("created",date('d/m/Y'));
            $query = $this->db->get();
       // $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'created' => date(d/m/Y)), $limit, $offset);

        if ($query) {
            $num = $query->num_rows();
			 return $num;
		 } else {
			 return 0;
		 }
    }
    
    public function monNiveau($pseudo)
    {
        set_time_limit(300);
        $this->db->select_max('niveau_filleul');
        $query10 = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo));
        
            $resultat = $query10->result();
        
            $result = $resultat[0]->niveau_filleul;
            
            
            $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result));
            $niveauMax = $query->num_rows();
            
            
            $query0 = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => 1));
            
            $nbreniv1 = $query0->num_rows();
            
            $this->load->model('MesFilleulsModel');
            
            if($this->MesFilleulsModel->membresreseauperso($pseudo) === 0){
                    return 0;
            }
            elseif($nbreniv1 == 1){
                    return 0;
            }
            elseif($niveauMax == pow(2, $result)) {
                return $result;
            }
            
            else{
                $result1 = $result-1;
                $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result1));
                $niveauMax = $query->num_rows();
                
                if($niveauMax == pow(2, $result1)) {
                    return $result1;
                }
                else{
                    $result2 = $result1-1;
                    $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result2));
                    $niveauMax = $query->num_rows();
                    if($niveauMax == pow(2, $result2)) {
                        return $result2;
                    }
                    else{
                        $result3 = $result2-1;
                        $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result3));
                        $niveauMax = $query->num_rows();
                        if($niveauMax == pow(2, $result3)) {
                            return $result3;
                        }
                        else{
                            $result4 = $result3-1;
                            $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result4));
                            $niveauMax = $query->num_rows();
                            if($niveauMax == pow(2, $result4)) {
                                return $result4;
                            }
                            else{
                                $result5 = $result4-1;
                                $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result5));
                                $niveauMax = $query->num_rows();
                                if($niveauMax == pow(2, $result5)) {
                                    return $result5;
                                }
                                else{
                                    $result6 = $result5-1;
                                    $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result6));
                                    $niveauMax = $query->num_rows();
                                    if($niveauMax == pow(2, $result6)) {
                                        return $result6;
                                    }
                                    else{
                                        $result7 = $result6-1;
                                        $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result7));
                                        $niveauMax = $query->num_rows();
                                        if($niveauMax == pow(2, $result7)) {
                                            return $result7;
                                        }
                                        else{
                                            $result8 = $result7-1;
                                            $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result8));
                                            $niveauMax = $query->num_rows();
                                            if($niveauMax == pow(2, $result8)) {
                                                return $result8;
                                            }
                                            else{
                                                $result9 = $result8-1;
                                                $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result9));
                                                $niveauMax = $query->num_rows();
                                                if($niveauMax == pow(2, $result9)) {
                                                    return $result9;
                                                }
                                                else{
                                                    $result10 = $result9-1;
                                                    $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result10));
                                                    $niveauMax = $query->num_rows();
                                                    if($niveauMax == pow(2, $result10)) {
                                                        return $result10;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }   
                        }
                    }
                }
            }

    }
    
    public function dateFilleulMaxParNiveau($pseudo_parrain, $niveau_filleul){
        $this->db->select_max('created');
        $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo_parrain, 'niveau_filleul' => $niveau_filleul));
        $resultat = $query->result();
        $result = $resultat[0]->created;
        
        $this->db->select('pseudo_filleul');
		$this->db->from($this->Table);
		$this->db->where("created",$result);
  		$query = $this->db->get();
        $users = $query->row_array();
        $filleul = $users['pseudo_filleul'];
        
        $this->db->select('created_on');
		$this->db->from('users');
		$this->db->where("pseudo",$filleul);
  		$query = $this->db->get();
        $crees = $query->row_array();
        $okdate = $crees['created_on'];
        return $okdate;
    }
    
    public function dateFilleulMax($pseudo_parrain){
        
        $niveau_filleul = $this->monNiveau($pseudo_parrain);
        
        $this->db->select_max('created');
        $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo_parrain, 'niveau_filleul' => $niveau_filleul));
        $resultat = $query->result();
        $result = $resultat[0]->created;
        
        $this->db->select('pseudo_filleul');
		$this->db->from($this->Table);
		$this->db->where("created",$result);
  		$query = $this->db->get();
        $users = $query->row_array();
        $filleul = $users['pseudo_filleul'];
        
        $this->db->select('created_on');
		$this->db->from('users');
		$this->db->where("pseudo",$filleul);
  		$query = $this->db->get();
        $crees = $query->row_array();
        $okdate = $crees['created_on'];
        return $okdate;
    }
    
    public function dateMonNiveau($pseudo)
    {
        
        $this->db->select_max('niveau_filleul');
        $query10 = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo));
        
            $resultat = $query10->result();
        
            $result = $resultat[0]->niveau_filleul;
            
            
            $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result));
            $niveauMax = $query->num_rows();
            
            
            $query0 = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => 1));
            
            $nbreniv1 = $query0->num_rows();
            
            $this->load->model('MesFilleulsModel');
            $this->load->model('UserModel');
            
            if($this->MesFilleulsModel->membresreseauperso($pseudo) === 0){
                    $date = $this->UserModel->getdateInscription($pseudo);
                    return $date;
            }
            elseif($nbreniv1 === 1){
                    $date = $this->UserModel->getdateInscription($pseudo);
                    return $date;
            }
            elseif($niveauMax === pow(2, $result)) {
                $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result);
                return $date;
            }
            
            else{
                $result1 = $result-1;
                $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result1));
                $niveauMax = $query->num_rows();
                
                if($niveauMax == pow(2, $result1)) {
                    $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result1);
                    return $date;
                }
                else{
                    $result2 = $result1-1;
                    $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result2));
                    $niveauMax = $query->num_rows();
                    if($niveauMax == pow(2, $result2)) {
                        $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result2);
                        return $date;
                    }
                    else{
                        $result3 = $result2-1;
                        $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result3));
                        $niveauMax = $query->num_rows();
                        if($niveauMax == pow(2, $result3)) {
                            $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result3);
                            return $date;
                        }
                        else{
                            $result4 = $result3-1;
                            $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result4));
                            $niveauMax = $query->num_rows();
                            if($niveauMax == pow(2, $result4)) {
                                $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result4);
                                return $date;
                            }
                            else{
                                $result5 = $result4-1;
                                $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result5));
                                $niveauMax = $query->num_rows();
                                if($niveauMax == pow(2, $result5)) {
                                    $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result5);
                                    return $date;
                                }
                                else{
                                    $result6 = $result5-1;
                                    $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result6));
                                    $niveauMax = $query->num_rows();
                                    if($niveauMax == pow(2, $result6)) {
                                        $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result6);
                                        return $date;
                                    }
                                    else{
                                        $result7 = $result6-1;
                                        $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result7));
                                        $niveauMax = $query->num_rows();
                                        if($niveauMax == pow(2, $result7)) {
                                            $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result7);
                                            return $date;
                                        }
                                        else{
                                            $result8 = $result7-1;
                                            $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result8));
                                            $niveauMax = $query->num_rows();
                                            if($niveauMax == pow(2, $result8)) {
                                                $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result8);
                                                return $date;
                                            }
                                            else{
                                                $result9 = $result8-1;
                                                $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result9));
                                                $niveauMax = $query->num_rows();
                                                if($niveauMax == pow(2, $result9)) {
                                                    $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result9);
                                                    return $date;
                                                }
                                                else{
                                                    $result10 = $result9-1;
                                                    $query = $this->db->get_where($this->Table, array('pseudo_utilisateur' => $pseudo, 'niveau_filleul' => $result10));
                                                    $niveauMax = $query->num_rows();
                                                    if($niveauMax == pow(2, $result10)) {
                                                        $date = $this->MesFilleulsModel->dateFilleulMaxParNiveau($pseudo, $result10);
                                                        return $date;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }   
                        }
                    }
                }
            }

    }
    
    
    
    /* 
        CODE POUR TROUVER TOUS LES MEMBRES DU SYSTEME 
    */
    
   public function tousmembresniveau($niveau){
        $sql = "SELECT * FROM $this->Table WHERE niveau_filleul = ? AND ";
        $query = $this->db->query($sql, array($niveau));
        $num = $query->num_rows();
        
        if($num == pow(2, $niveau)){
            $sql = "SELECT * FROM $this->Table WHERE niveau_filleul = ? AND ";
            $query = $this->db->query($sql, array($niveau+1));
            $num2 = $query->num_rows();
            if($num2 !== pow(2, $niveau+1)){
                
            }
        }
        
        return $num; 

   }
    
   /* 
        MES FILLEULS
    */ 
    
    
    public function MesFilleuls($pseudo)
    {
            $this->db->select('id,pseudo_utilisateur,pseudo_filleul,niveau_filleul,side,created');
            $this->db->from($this->Table);
            $this->db->where('pseudo_utilisateur',$pseudo);
            $this->db->order_by('niveau_filleul', 'ASC');
            $query = $this->db->get();

        if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
    }
    
    public function MesFilleulsParNiveau($pseudo,$niveau){
        $sql = "SELECT * FROM $this->Table WHERE niveau_filleul = ? AND pseudo_utilisateur = ?";
        $query = $this->db->query($sql, array($niveau,$pseudo));
        $num = $query->num_rows();
                
        return $num; 

   }
    
   public function NiveauFilleulParPseudoParrain($pseudo_parrain,$pseudo_filleul){
        $sql = "SELECT * FROM $this->Table WHERE pseudo_filleul = ? AND pseudo_utilisateur = ?";
        $query = $this->db->query($sql, array($pseudo_filleul,$pseudo_parrain));
        $row = $query->row_array();
                
        return $row['niveau_filleul'] ; 

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
    
    
    
    /* 
        CODE AJOUTER UN MEMBRE 
    */
    
    
   
   public function AjouterFilleulEtGains($pseudo_parrain,$pseudo_filleul,$side){
        set_time_limit(300);
        $created= time();
        
        $data = array(
                'pseudo_utilisateur' => $pseudo_parrain,
                'pseudo_filleul' => $pseudo_filleul,
                'niveau_filleul' => 1,
                'side' => $side,
                'created' => $created
                
        );
        
        if($this->db->insert('mes_filleuls', $data)){
            
            if($this->membresreseauperso($pseudo_parrain) === 0){
                $gains_parrain = 450;
                $this->db->select('somme');
                $this->db->from('depenses_sms');
                $this->db->where('id',1);
                $gains_s = $this->db->get();
                $gains_sm = $gains_s->row_array();
                $gains_sms = $gains_sm['somme'] + 50;
                
                $gain_smse = array(
                    'somme' => $gains_sms
                );
                
                $this->db->where('id', 1);
                $this->db->update('depenses_sms', $gain_smse);
            }
            else{
                $gains_parrain = 500;
            } 
            
            $gain_data = array(
                    'gains' => $gains_parrain
            );
            $this->db->where('pseudo_utilisateur', $pseudo_parrain);
            $this->db->update('mes_bons', $gain_data);
            
            $this->db->select('pseudo_utilisateur,gains');
            $this->db->from('mes_bons');
            $this->db->where('pseudo_utilisateur','xxxemaster');
            $gains_e = $this->db->get();
            $gains_emast = $gains_e->row_array();
            $gains_emaster = $gains_emast['gains'] + 200;
            
            $gain_emastere = array(
                    'gains' => $gains_emaster
            );
            $this->db->where('pseudo_utilisateur', 'xxxemaster');
            $this->db->update('mes_bons', $gain_emastere);
            
            
            
            $this->db->select('marge_beneficiaire');
            $this->db->from('gains_gie');
            $this->db->where('id',1);
            $gains_gi = $this->db->get();
            $gains_giee = $gains_gi->row_array();
            $gains_gie = $gains_giee['marge_beneficiaire'] + 1094;
            
            $gain_giee = array(
                    'marge_beneficiaire' => $gains_gie
            );
            $this->db->where('id',1);
            $this->db->update('gains_gie', $gain_giee);
            
            
            $this->db->select('roulement');
            $this->db->from('gains_gie');
            $this->db->where('id',1);
            $gains_rou = $this->db->get();
            $gains_roull = $gains_rou->row_array();
            $gains_roul = $gains_roull['roulement'] + 10806;
            
            $gain_roulement = array(
                    'roulement' => $gains_roul
            );
            $this->db->where('id',1);
            $this->db->update('gains_gie', $gain_roulement);
            
            
            $this->db->select('id,pseudo_utilisateur,niveau_filleul,side');
            $this->db->from($this->Table);
            $this->db->where("pseudo_filleul",$pseudo_parrain);
            $query = $this->db->get();
            
            foreach($query->result_array() as $row){
                $niveau = $row['niveau_filleul'];
                $niveauActu = $niveau + 1;
                
                if($niveau == 3){
                                       
                        $side = $row['side'];
                        $parrain = $row['pseudo_utilisateur'];
                        $data = array(
                                'pseudo_utilisateur' => $parrain,
                                'pseudo_filleul' => $pseudo_filleul,
                                'niveau_filleul' => $niveauActu,
                                'side' => $side,
                                'created' => $created
                        );
                        $this->db->insert('mes_filleuls', $data);
                    

                        $this->db->select('pseudo_utilisateur,gains');
                        $this->db->from('mes_bons');
                        $this->db->where("pseudo_utilisateur",$parrain);
                        $gains_act = $this->db->get();

                        $gains_actu = $gains_act->row_array();
                        $gains_parrainhaut = $gains_actu['gains'] + 500;
                        
                        $gain_parrain = array(
                                'gains' => $gains_parrainhaut
                        );
                        $this->db->where('pseudo_utilisateur',$parrain);
                        $this->db->update('mes_bons', $gain_parrain);
                        

                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 500;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);    
                        
                        $this->db->select('pseudo_utilisateur');
                        $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                        $nbre_filleuls = $query->num_rows();
                        
                        if($nbre_filleuls === 16){
                            $this->db->select('roulement');
                            $this->db->from('gains_gie');
                            $this->db->where('id',1);
                            $roul = $this->db->get();
                            $roulo = $roul->row_array();
                            $roul_actu = $roulo['roulement'] - 20000;
                            
                            $roulement_actu = array(
                                    'roulement' => $roul_actu
                            );
                            $this->db->where('id',1);
                            $this->db->update('gains_gie', $roulement_actu);
                            
                            /*if(!$this->ifpseudonivo4existe($pseudo_parrain)){
                                $pseudo_parrain_nivo4 = $this->getparrain_nivo4();
                                $creele = time();
                                $data4 = array(
                                        'pseudo' => $parrain,
                                        'solde' => 0,
                                        'pseudo_parrain' => $pseudo_parrain_nivo4,
                                        'created' => $creele
                                );

                                $this->db->insert('user_niveau_4', $data4);
                            }
                            $this->db->select('pseudo_utilisateur,gains');
                            $this->db->from('mes_bons');
                            $this->db->where("pseudo_utilisateur",$parrain);
                            $gains_act = $this->db->get();

                            $gains_actu = $gains_act->row_array();
                            $gains_parrainhaut = $gains_actu['gains'] + 500;

                            $gain_parrain = array(
                                    'gains' => $gains_parrainhaut
                            );
                            $this->db->where('pseudo_utilisateur',$parrain);
                            $this->db->update('mes_bons', $gain_parrain);*/
                        }
                    
                    
                }
                
                elseif($niveau == 4){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 32){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 30000;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 5){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 64){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 500;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 6){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 128){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 150000;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 7){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 256){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 250000;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 9){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 1024){
                        
                        $data = array(
                                'fini' => 1
                        );
                        $this->db->where('pseudo', $parrain);
        
                        $this->db->update('users', $data); 
                    }
                    
                }
                
                                
                
                
                elseif($niveau >= 10){
                    
                }
                
                else {
                    $niveauActu = $niveau + 1;
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);

                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);
                    
                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);
                    
                }
                
            }           
            
        }
        else return false;
   }
    
   public function AjouterFilleulEtGainsPourCorrection($pseudo_parrain,$pseudo_filleul,$side,$created){
        $created= $created;
        
        $data = array(
                'pseudo_utilisateur' => $pseudo_parrain,
                'pseudo_filleul' => $pseudo_filleul,
                'niveau_filleul' => 1,
                'side' => $side,
                'created' => $created
                
        );
        
        if($this->db->insert('mes_filleuls', $data)){
            
            if($this->membresreseauperso($pseudo_parrain) === 0){
                $gains_parrain = 450;
            }
            else{
                $gains_parrain = 500;
            } 

                $this->db->select('somme');
                $this->db->from('depenses_sms');
                $this->db->where('id',1);
                $gains_s = $this->db->get();
                $gains_sm = $gains_s->row_array();
                $gains_sms = $gains_sm['somme'] + 50;
                
                $gain_smse = array(
                    'somme' => $gains_sms
                );
                
                $this->db->where('id', 1);
                $this->db->update('depenses_sms', $gain_smse);

            $gain_data = array(
                    'gains' => $gains_parrain
            );
            $this->db->where('pseudo_utilisateur', $pseudo_parrain);
            $this->db->update('mes_bons', $gain_data);
            
            $this->db->select('pseudo_utilisateur,gains');
            $this->db->from('mes_bons');
            $this->db->where('pseudo_utilisateur','xxxemaster');
            $gains_e = $this->db->get();
            $gains_emast = $gains_e->row_array();
            $gains_emaster = $gains_emast['gains'] + 200;
            
            $gain_emastere = array(
                    'gains' => $gains_emaster
            );
            $this->db->where('pseudo_utilisateur', 'xxxemaster');
            $this->db->update('mes_bons', $gain_emastere);
            
            
            
            $this->db->select('marge_beneficiaire');
            $this->db->from('gains_gie');
            $this->db->where('id',1);
            $gains_gi = $this->db->get();
            $gains_giee = $gains_gi->row_array();
            $gains_gie = $gains_giee['marge_beneficiaire'] + 1094;
            
            $gain_giee = array(
                    'marge_beneficiaire' => $gains_gie
            );
            $this->db->where('id',1);
            $this->db->update('gains_gie', $gain_giee);
            
            
            $this->db->select('roulement');
            $this->db->from('gains_gie');
            $this->db->where('id',1);
            $gains_rou = $this->db->get();
            $gains_roull = $gains_rou->row_array();
            $gains_roul = $gains_roull['roulement'] + 10806;
            
            $gain_roulement = array(
                    'roulement' => $gains_roul
            );
            $this->db->where('id',1);
            $this->db->update('gains_gie', $gain_roulement);
            
            
            $this->db->select('id,pseudo_utilisateur,niveau_filleul,side');
            $this->db->from($this->Table);
            $this->db->where("pseudo_filleul",$pseudo_parrain);
            $query = $this->db->get();
            
            foreach($query->result_array() as $row){
                $niveau = $row['niveau_filleul'];
                $niveauActu = $niveau + 1;
                
                if($niveau == 3){
                                       
                        $side = $row['side'];
                        $parrain = $row['pseudo_utilisateur'];
                        $data = array(
                                'pseudo_utilisateur' => $parrain,
                                'pseudo_filleul' => $pseudo_filleul,
                                'niveau_filleul' => $niveauActu,
                                'side' => $side,
                                'created' => $created
                        );
                        $this->db->insert('mes_filleuls', $data);
                    

                        $this->db->select('pseudo_utilisateur,gains');
                        $this->db->from('mes_bons');
                        $this->db->where("pseudo_utilisateur",$parrain);
                        $gains_act = $this->db->get();

                        $gains_actu = $gains_act->row_array();
                        $gains_parrainhaut = $gains_actu['gains'] + 500;
                        
                        $gain_parrain = array(
                                'gains' => $gains_parrainhaut
                        );
                        $this->db->where('pseudo_utilisateur',$parrain);
                        $this->db->update('mes_bons', $gain_parrain);
                        

                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 500;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);    
                        
                        $this->db->select('pseudo_utilisateur');
                        $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                        $nbre_filleuls = $query->num_rows();
                        
                        if($nbre_filleuls === 16){
                            $this->db->select('roulement');
                            $this->db->from('gains_gie');
                            $this->db->where('id',1);
                            $roul = $this->db->get();
                            $roulo = $roul->row_array();
                            $roul_actu = $roulo['roulement'] - 20000;
                            
                            $roulement_actu = array(
                                    'roulement' => $roul_actu
                            );
                            $this->db->where('id',1);
                            $this->db->update('gains_gie', $roulement_actu);
                            
                            /*if(!$this->ifpseudonivo4existe($pseudo_parrain)){
                                $pseudo_parrain_nivo4 = $this->getparrain_nivo4();
                                $creele = time();
                                $data4 = array(
                                        'pseudo' => $parrain,
                                        'solde' => 0,
                                        'pseudo_parrain' => $pseudo_parrain_nivo4,
                                        'created' => $creele
                                );

                                $this->db->insert('user_niveau_4', $data4);
                            }
                            $this->db->select('pseudo_utilisateur,gains');
                            $this->db->from('mes_bons');
                            $this->db->where("pseudo_utilisateur",$parrain);
                            $gains_act = $this->db->get();

                            $gains_actu = $gains_act->row_array();
                            $gains_parrainhaut = $gains_actu['gains'] + 500;

                            $gain_parrain = array(
                                    'gains' => $gains_parrainhaut
                            );
                            $this->db->where('pseudo_utilisateur',$parrain);
                            $this->db->update('mes_bons', $gain_parrain);*/
                        }
                    
                    
                }
                
                elseif($niveau == 4){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 32){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 30000;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 5){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 64){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 500;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 6){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 128){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 150000;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 7){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 256){
                        $this->db->select('roulement');
                        $this->db->from('gains_gie');
                        $this->db->where('id',1);
                        $roul = $this->db->get();
                        $roulo = $roul->row_array();
                        $roul_actu = $roulo['roulement'] - 250000;
                        $roulement_actu = array(
                                'roulement' => $roul_actu
                        );
                        $this->db->where('id',1);
                        $this->db->update('gains_gie', $roulement_actu);
                    }
                    
                }
                
                elseif($niveau == 9){
                    
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);


                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);

                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);

                    $this->db->select('pseudo_utilisateur');
                    $query = $this->db->get_where('mes_filleuls', array('pseudo_utilisateur' => $parrain,'niveau_filleul' => $niveauActu));
                    $nbre_filleuls = $query->num_rows();

                    if($nbre_filleuls == 1024){
                        
                        $data = array(
                                'fini' => 1
                        );
                        $this->db->where('pseudo', $parrain);
        
                        $this->db->update('users', $data); 
                    }
                    
                }
                
                                
                
                
                elseif($niveau >= 10){
                    
                }
                
                else {
                    $niveauActu = $niveau + 1;
                    $side = $row['side'];
                    $parrain = $row['pseudo_utilisateur'];
                    $data = array(
                            'pseudo_utilisateur' => $parrain,
                            'pseudo_filleul' => $pseudo_filleul,
                            'niveau_filleul' => $niveauActu,
                            'side' => $side,
                            'created' => $created
                    );
                    $this->db->insert('mes_filleuls', $data);

                    $this->db->select('pseudo_utilisateur,gains');
                    $this->db->from('mes_bons');
                    $this->db->where("pseudo_utilisateur",$parrain);
                    $gains_act = $this->db->get();

                    $gains_actu = $gains_act->row_array();
                    $gains_parrainhaut = $gains_actu['gains'] + 500;
                    $gain_parrain = array(
                            'gains' => $gains_parrainhaut
                    );
                    $this->db->where('pseudo_utilisateur',$parrain);
                    $this->db->update('mes_bons', $gain_parrain);
                    
                    $this->db->select('roulement');
                    $this->db->from('gains_gie');
                    $this->db->where('id',1);
                    $roul = $this->db->get();
                    $roulo = $roul->row_array();
                    $roul_actu = $roulo['roulement'] - 500;
                    
                    $roulement_actu = array(
                            'roulement' => $roul_actu
                    );
                    $this->db->where('id',1);
                    $this->db->update('gains_gie', $roulement_actu);
                    
                }
                
            }           
            
        }
        else return false;
   }
    
    /*
        ADMINISTRATION GIE
    */
    
    //selectionner le montant de la marge bénéficiaire
    public function MontantBeneficiaire() 
    {        
        $this->db->select('marge_beneficiaire');
        $this->db->from('gains_gie');
        $this->db->where('id',1);
        $query = $this->db->get();
        $rouldep = $query->row_array();
        $valeur_dep =number_format( $rouldep['marge_beneficiaire'], 0, ',', ' ');
        return $valeur_dep;

    }
    
     //selectionner le montant de la dépence de sms
     public function MontantDepenceSms() 
    {        
        $this->db->select('somme');
        $this->db->from('depenses_sms');
        $this->db->where('id',1);
        $query = $this->db->get();
        $gains_sm = $query->row_array();
        $valeur_gain =number_format($gains_sm['somme'], 0, ',', ' ');
        return $valeur_gain;
    }
    
    //selectionner le montant du fond de roulement MLM
    public function MontantDuRoulementMlm() 
    {        
        $this->db->select('roulement');
        $this->db->from('gains_gie');
        $this->db->where('id',1);
        $query = $this->db->get();
        $roulmlm = $query->row_array();
        $valeurfond = number_format($roulmlm['roulement'], 0, ',', ' ');
        return $valeurfond ;

    }
    
    
    
    
}
