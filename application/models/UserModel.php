<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

  	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	private $Table = 'users';
	
	public function DirectoryUrlPartners(){
		return '';
	}
	
    public function enregistrerMembre($data)
	{  
		$res = $this->db->insert($this->Table,$data);
		if($res == 1)
			return $this->db->insert_id();
		else
			return false;	
  	}
    
    public function enregistrerMembreTemp($data)
	{  
		$res = $this->db->insert('userstemp',$data);
		if($res == 1)
			return $this->db->insert_id();
		else
			return false;	
  	}
    
    
    public function PseudoExiste($pseudo){
         $this->db->select('pseudo'); 
		 $this->db->from($this->Table);
		 $this->db->where('pseudo', $pseudo);
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return true;
		 } else {
			 return false;
		 }
    }
    
    public function EmailExiste($email){
		 
		 $this->db->select('email'); 
		 $this->db->from($this->Table);
		 $this->db->where('email', $email);
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return true;
		 } else {
			 return false;
		 }
	}


    public function EmailExiste2($email, $id){
         
         $this->db->select('email'); 
         $this->db->from($this->Table);
         $this->db->where(array('email' => $email, 'id!=' => $id));
         $query = $this->db->get();
         if($query->num_rows() != 0){
              return true;
         }else{
             return false;
         }
    }

    public function PhoneExiste2($phone, $id){
         
         $this->db->select('phone'); 
         $this->db->from($this->Table);
         $this->db->where(array('phone' => $phone, 'id!=' => $id));
         $query = $this->db->get();
         if ($query->num_rows() != 0) {
              return true;
         } else {
             return false;
         }
    }
    
    public function PhoneExiste($phone){
         
         $this->db->select('phone'); 
         $this->db->from($this->Table);
         $this->db->where('phone', $phone);
         $query = $this->db->get();
         if ($query->num_rows() != 0) {
              return true;
         } else {
             return false;
         }
    }
	
	public function NomExiste($nom, $id){
		 
		 $this->db->select('first_name'); 
		 $this->db->from($this->Table);
         $this->db->where(array('first_name' => $nom, 'id!=' => $id));
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return true;
		 } else {
			 return false;
		 }
	}
    
    public function PrenomsExiste($prenoms, $id){
		 
		 $this->db->select('last_name'); 
		 $this->db->from($this->Table);
         $this->db->where(array('last_name' => $prenoms, 'id!=' => $id));
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return true;
		 } else {
			 return false;
		 }
	}
    
    public function DateNaissanceExiste($date, $id){
		 
		 $this->db->select('date_naissance'); 
		 $this->db->from($this->Table);
         $this->db->where(array('date_naissance' => $date, 'id!=' => $id));
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return true;
		 } else {
			 return false;
		 }
	}

    public function LieuNaissanceExiste($lieu, $id){
         
         $this->db->select('Lieu_naissance'); 
         $this->db->from($this->Table);
         $this->db->where(array('Lieu_naissance' => $lieu, 'id!=' => $id));
         $query = $this->db->get();
         if ($query->num_rows() != 0) {
              return true;
         } else {
             return false;
         }
    }
	

    public function GetUserDataByPseudo($pseudo)
	{  
 		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where("pseudo", $pseudo);
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}


    public function GetUserDataById($id)
    {  
        $this->db->select('*');
        $this->db->from($this->Table);
        $this->db->where("id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query) {
             return $query->row_array();
         } else {
             return false;
         }
    }

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

    public function selectMesFieulles($pseudo, $limit="")
    {

        if($limit!="")
        {
          $this->db->limit($limit);
        }
        $this->db->select('*');
        $this->db->from($this->Table);
        $this->db->where('pseudo_parrain', trim($pseudo));
        $this->db->order_by('created_on','DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
             return $query->result_array();
         } else {
             return 0;
         }
    }


    public function nbFilleulsAchat($pseudo)
    {
      $this->db->select('*');
      $this->db->from($this->Table);
      $this->db->where('pseudo_parrain', trim($pseudo));
      $this->db->where('achat_ini', 1);
      $query = $this->db->get();
      return $query->num_rows();
    }
    
    public function getdateInscription($pseudo)
	{  
 		$this->db->select('id,pseudo,created_on');
		$this->db->from($this->Table);
		$this->db->where("pseudo",$pseudo);
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 $man = $query->row_array();
             return $man['created_on'];
		 } else {
			 return false;
		 }
   	}
   	
   	public function GetUserDataTempByPseudo($pseudo)
	{  
 		$this->db->select('id,pseudo,password,email,prenoms,nom,date_naissance,Lieu_naissance,telephone,langue,img_profil,genre,apropos,pays,ville,adresse,pseudo_parrain,side,groupe,groupe1,groupe2,offline-i,creele,modifiele');
		$this->db->from("userstemp");
		$this->db->where("pseudo",$pseudo);
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}
    
    public function SiParrainOccupe($pseudo){
		 
		 $this->db->select('pseudo'); 
		 $this->db->from($this->Table);
		 $this->db->where('pseudo_parrain', $pseudo);
		 $query = $this->db->get();
		 if ($query->num_rows() == 2) {
			  return true;
		 } else {
			 return false;
		 }
	}
    
    public function SiParrainNonFini($pseudo){
		 
		 $this->db->select('pseudo'); 
		 $this->db->from($this->Table);
		 $this->db->where('pseudo_parrain', $pseudo);
		 $query = $this->db->get();
         $result = $query->row_array();
		 if ($result['fini'] == 1) {
			  return true;
		 } else {
			 return false;
		 }
	}
    
    public function SiParrainAUnMembre($pseudo){
		 
		 $this->db->select('pseudo'); 
		 $this->db->from($this->Table);
		 $this->db->where('pseudo_parrain', $pseudo);
		 $query = $this->db->get();
		 if ($query->num_rows() == 1) {
			  return true;
		 } else {
			 return false;
		 }
	}
    
    public function GetPseudoParrainLibre($pseudo)
	{  
 		$this->db->select('id,pseudo,side');
		$this->db->from($this->Table);
		$this->db->where("pseudo_parrain",$pseudo);
  		$query = $this->db->get();
 		if ($query->num_rows() == 2) {
             
            $result = $query->result();
            $row1 = $result[0];
            $row2 = $result[1];
            $pseudo1 = $row1->pseudo;
            $pseudo2 = $row2->pseudo;
                $this->db->select('pseudo'); 
                 $this->db->from($this->Table);
                 $this->db->where('pseudo_parrain', $pseudo1);
                 $SiParrainOccupe1 = $this->db->get();
                if($SiParrainOccupe1->num_rows() == 2){
                     $this->db->select('pseudo'); 
                     $this->db->from($this->Table);
                     $this->db->where('pseudo_parrain', $pseudo2);
                     $SiParrainOccupe2 = $this->db->get();
                    if($SiParrainOccupe2->num_rows() == 2){
                        $this->db->select('pseudo_utilisateur');
                        $this->db->from('mes_filleuls');
                        $this->db->where('pseudo_utilisateur',$pseudo1);
                        $query1 = $this->db->get();
                        if($query1){
                            $membre1 = $query1->num_rows();
                            
                            $this->db->select('pseudo_utilisateur');
                            $this->db->from('mes_filleuls');
                            $this->db->where('pseudo_utilisateur',$pseudo2);
                            $query2 = $this->db->get();
                            if($query2){
                                $membre2 = $query2->num_rows();
                                if($membre1 > $membre2){
                                    return $this->GetPseudoParrainLibre($pseudo2);
                                }
                                else return $this->GetPseudoParrainLibre($pseudo1);
                            }
                            
                        }
                        
                        
                        
                    }
                    else return $row2;
                }
                else return $row1;
            }    
            
          else {
            $obj=(object) ['pseudo' => $pseudo];
			 return $obj;
		 }
   	}
    
    
   
    
    
    public function MajMdp($data,$id)
	{  
 		$this->db->where('id', $id);
        
        if ($this->db->update('users', $data)) {
			  return true;
		 } else {
			 return false;
		 }
 		
   	}
    
    public function MajProfil($data,$id)
	{  
 		$this->db->where('id', $id);
        
        if ($this->db->update('users', $data)) {
			  return true;
		 } else {
			 return false;
		 }
 		
   	}
    
    public function GetNbrUserDeMemParrainDirect($pseudo_parrain)
	{  
 		$this->db->select('id,ip_address,pseudo,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code, created_on,last_login,active,prenoms,nom,date_naissance,telephone,langue,img_profil,genre, apropos, pays,ville,adresse,pseudo_parrain,side');
		$this->db->from($this->Table);
		$this->db->where("pseudo_parrain",$pseudo_parrain);
  		$query = $this->db->get();
        $num = $query->num_rows();
        return num;
 		
   	}
    
    
    public function GetArbre($pseudo)
	{  
        
        $this->db->select('id,pseudo,gauche,droite');
		$this->db->from('arbre');
		$this->db->where("pseudo",$pseudo);
  		$query = $this->db->get();
        $result = $query->result();
 		return $result;
   	}
    
    
    public function GetParrainLibre($pseudo)
	{  
        
        $nbre_filleuls = GetNbrUserDeMemParrain($pseudo);
        
        if($nbre_filleuls == 0){
            return $pseudo;
        }
        elseif($nbre_filleuls == 1){
            return $pseudo;
        }
        else {
            
        }
        
 		/*if ($result->gauche == 0 and $result->droite == 0) {
			 $pseudobon = $result->pseudo;
			 return $pseudobon;
		 } 
        elseif ($result->gauche == 1 and $result->droite == 0) {
			 $pseudobon = $result->pseudo;
			 return $pseudobon;
		 }
        elseif ($result->gauche == 0 and $result->droite == 1) {
			 $pseudobon = $result->pseudo;
			 return $pseudobon;
		 }
        else {
            if
		 }*/
   	}
    
    
    
     public function GetArbreByPseudo($pseudo)
	{  
 		$this->db->select('pseudo,email,created_on,prenoms,nom,telephone,img_profil,genre, pseudo_parrain,side,fini');
		$this->db->from($this->Table);
		$this->db->where("pseudo_parrain",$pseudo);
		$this->db->limit(2);
        $this->db->order_by("created_on","asc");
  		$query = $this->db->get();
        $result = $query->result_array();
        $num = $query->num_rows();
 		
        
        //var_dump($fil_g);
        $this->load->model('UserModel');
        $this->load->model('MesFilleulsModel');
        $dataParrain = $this->UserModel->GetUserDataByPseudo($pseudo);
        
        $nivo = $this->MesFilleulsModel->NiveauFilleulParPseudoParrain($this->session->userdata('identity'),$pseudo);
                if($nivo == 0){
                    $couleur = "bg-green";
                }
                elseif($nivo == 1){
                    $couleur = "bg-teal";
                }
                elseif($nivo == 2){
                    $couleur = "bg-orange";
                }
                elseif($nivo == 3){
                    $couleur = "bg-fuchsia";
                }
                elseif($nivo == 4){
                    $couleur = "bg-purple";
                }
                elseif($nivo == 5){
                    $couleur = "bg-maroon";
                }
                elseif($nivo == 6){
                    $couleur = "bg-aqua";
                }
                elseif($nivo == 7){
                    $couleur = "bg-navy";
                }
                elseif($nivo == 8){
                    $couleur = "bg-darken-4";
                }
                elseif($nivo == 9){
                    $couleur = "bg-lighten-4";
                }
                elseif($nivo == 10){
                    $couleur = "bg-green";
                }
        
        if($num == 0){
            
            echo'
                <div class="hv-item">                            

                                <div class="hv-item-parent">

                                    <div type="button" class="design" data-toggle="tooltip" data-placement="top" title=" '.$dataParrain["nom"].' '. $dataParrain["prenoms"].' ('.$dataParrain["telephone"].' / '.$dataParrain["email"].')">
                                        <div class="text-centered">
                                           
                                          <small class="label pull-center '.$couleur.'">
                                          
                            ';
                    if($pseudo == $this->session->userdata('identity')){
                        echo 0;
                    }
                    elseif($pseudo !== $this->session->userdata('identity')){
                        echo $nivo;
                    }
                                          
                echo'
                                          
                                          </small>
                                        
                                        </div>

                                        <div class="text-centered">
                                            <p><b>'.$dataParrain["pseudo"].'</b></p>
                                        </div>
                                    </div>


                                </div>
                            
                                <div class="hv-item-children">
                                    

                                        <div class="hv-item-child">
                                            <p> &nbsp; </p>
                                        </div>


                                        <div class="hv-item-child">
                                            <p> &nbsp; </p>
                                        </div>



                                </div>
                            
                        </div>
            ';
            
        }
        elseif($num == 1){
            $fil_g = $result[0];
            echo'
                <div class="hv-item">                            

                                <div class="hv-item-parent">

                                    <div type="button" class="design" data-toggle="tooltip" data-placement="top" title=" '.$dataParrain["nom"].' '. $dataParrain["prenoms"].' ('.$dataParrain["telephone"].' / '.$dataParrain["email"].')">
                                        <div class="text-centered">
                                           
                                          <small class="label pull-center '.$couleur.'">
                ';
                    if($pseudo == $this->session->userdata('identity')){
                        echo 0;
                    }
                    elseif($pseudo !== $this->session->userdata('identity')){
                        echo $nivo;
                    }
                                          
                echo'
                                          </small>
                                        
                                        </div>

                                        <div class="text-centered">
                                            <p><b>'.$dataParrain["pseudo"].'</b></p>
                                        </div>
                                    </div>


                                </div>
                                                        
                    ';
                    
            
                    echo'
                        <div class="hv-item-children">
                                        <div class="hv-item-child">
                        ';
                        $this->UserModel->GetArbreByPseudo($result[0]["pseudo"]);
            
                    echo'
                                        </div>


                                        <div class="hv-item-child">
                                            <p> &nbsp; </p>
                                        </div>



                                </div>
                            
                        </div>

                        ';
                                        
           
        }
        elseif($num == 2){
            $fil_g = $result[0];
 		    $fil_d = $result[1];
            
            
            echo'
                <div class="hv-item">                            

                                <div class="hv-item-parent">

                                    <div type="button" class="design" data-toggle="tooltip" data-placement="top" title=" '.$dataParrain["nom"].' '. $dataParrain["prenoms"].' ('.$dataParrain["telephone"].' / '.$dataParrain["email"].')">
                                        <div class="text-centered">
                                           
                                          <small class="label pull-center '.$couleur.'">
                ';
                    if($pseudo == $this->session->userdata('identity')){
                        echo 0;
                    }
                    elseif($pseudo !== $this->session->userdata('identity')){
                        echo $nivo;
                    }
                                          
                echo'
                                          </small>
                                        
                                        </div>

                                        <div class="text-centered">
                                            <p><b>'.$dataParrain["pseudo"].'</b></p>
                                        </div>
                                    </div>


                                </div>
                                                        
                    ';
                    
            
                    echo'
                        <div class="hv-item-children">
                                        <div class="hv-item-child">
                        ';
                        $this->UserModel->GetArbreByPseudo($fil_g["pseudo"]);
            
                    echo'
                                        </div>


                                        <div class="hv-item-child">
                        ';
                        
                        $this->UserModel->GetArbreByPseudo($fil_d["pseudo"]);
            
            
                       echo'                 </div>



                                </div>
                            
                        </div>

                        ';
        }
        
        
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
    
    
    
    
    
    
    
    
    public function CorrigerMesFilleuls()
	{  
        set_time_limit(300);
 		$this->db->select('id,pseudo,pseudo_parrain,side,creele,created_on');
		$this->db->from($this->Table);
		$this->db->where("id >=",13);
  		$query = $this->db->get();
        $users = $query->result_array();
        
       foreach($users as $user){
        $this->load->model('MesFilleulsModel');
        $this->load->model('MesBonsModel');
        $pseudo_parrain = $user['pseudo_parrain'];
        $pseudo_filleul = $user['pseudo'];
        $side = $user['side'];
        $created = $user['created_on'];
            $this->MesBonsModel->AjouterLigne($pseudo_filleul);
            $this->MesFilleulsModel->AjouterFilleulEtGainsPourCorrection($pseudo_parrain,$pseudo_filleul,$side,$created);

        if($user === end($users)){
            echo "C'EST ENFIN FINI";
        }
                    
       }
                 
   	}
    
    
   public function CorrigerDate()
	{  
        set_time_limit(300);
 		$this->db->select('pseudo,pseudo_parrain,created_on,creele');
		$this->db->from($this->Table);
		$this->db->where("pseudo_parrain !=","");
  		$query = $this->db->get();
        $users = $query->result_array();
        
       foreach($users as $user){
        $pseudo_parrain = $user['pseudo_parrain'];
        $created= strftime('%d/%m/%Y-%H:%M:%S',$user['created_on']);

        $this->db->set('creele', $created);
        $this->db->where('pseudo', $user['pseudo']);
        $this->db->update($this->Table);
        
        if($user === end($users)){
            echo "C'EST ENFIN FINI";
        }
                    
       }
                 
   	} 
    
    
    
    public function CorrigerDateMesFilleuls2()
	{  
        set_time_limit(300);
 		$this->db->select('id,pseudo_utilisateur,pseudo_filleul,created');
		$this->db->from('mes_filleuls');
        //$this->db->where("id >=",748);
  		$query = $this->db->get();
        $users = $query->result_array();
        
       foreach($users as $user){
        $data = date_parse_from_format("d/m/Y-H:i:s", $user['created']);
        $time = mktime($data['hour'],$data['minute'],$data['second'],$data['month'],$data['day'],$data['year']);

        $this->db->set('created', $time);
        $this->db->where('pseudo_filleul', $user['pseudo_filleul']);
        $this->db->update('mes_filleuls');
        
        if($user === end($users)){
            echo "C'EST ENFIN FINI";
        }
                    
       }
                 
   	} 
    
    public function CorrigerBon()
	{  
 		$this->db->select('pseudo_utilisateur,gains');
		$this->db->from('mes_bons');
		$this->db->where("gains !=",0);
  		$query = $this->db->get();
        $users = $query->result_array();
        
       foreach($users as $user){
        $gains = $user['gains'] - 50;
        

        $this->db->set('gains', $gains);
        $this->db->where('pseudo_utilisateur', $user['pseudo_utilisateur']);
        $this->db->update('mes_bons');
        
        if($user === end($users)){
            echo "C'EST ENFIN FINI";
        }
                    
       }
                 
   	} 
    
    
    public function CorrigerNiveau()
	{  
        set_time_limit(300);
 		$this->db->select('pseudo,pseudo_parrain,created_on,creele');
		$this->db->from($this->Table);
		$this->db->where("pseudo_parrain !=","");
  		$query = $this->db->get();
        $users = $query->result_array();
         
       foreach($users as $user){
            set_time_limit(300);
            $this->load->model('MesFilleulsModel'); 
            $pseudo = $user['pseudo'];
            $mon_niveau = $this->MesFilleulsModel->monNiveau($pseudo); 
            $date = $this->MesFilleulsModel->dateMonNiveau($pseudo);    
            
                 $query = $this->db->get_where('mon_niveau', array(//making selection
                    'pseudo_utilisateur' => $pseudo
                ));

                $count = $query->num_rows(); //counting result from query

                if ($count === 0) {
                    $data = array(
                    'pseudo_utilisateur' => $pseudo,
                    'mon_niveau' => $mon_niveau,
                    'date' => $date
                );
                    $this->db->insert('mon_niveau', $data);
                }


            if($user === end($users)){
                echo "C'EST ENFIN FINI";
            }
                    
       }
                 
   	}
    
    public function CorrigerDateNiveau()
	{  
 		$this->db->select('pseudo,pseudo_parrain,created_on,creele');
		$this->db->from($this->Table);
		$this->db->where("pseudo_parrain !=","");
  		$query = $this->db->get();
        $users = $query->result_array();
         
       foreach($users as $user){
            set_time_limit(300);
            $this->load->model('MesFilleulsModel'); 
            $pseudo = $user['pseudo'];
            $date = $this->MesFilleulsModel->dateMonNiveau($pseudo);   
            $data = array(
                'date' => $date
            );

            $this->db->where('pseudo_utilisateur', $pseudo);
            $this->db->update('mon_niveau', $data);


            if($user === end($users)){
                echo "C'EST ENFIN FINI";
            }
                    
       }
                 
   	}
    
    
    
  	//affichage de tout les membre
  	public function RecuperationDonneUtilisateur()
	{  
 		$this->db->select('id,ip_address,pseudo,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code, created_on,last_login,active,prenoms,nom,date_naissance,Lieu_naissance,telephone,langue,img_profil,genre, apropos, pays,ville,adresse,pseudo_parrain,side,groupe,groupe1,groupe2,offline-i,fini,creele,modifiele');
		$this->db->from($this->Table);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}
  	
 
 }
