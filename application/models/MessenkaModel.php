<?php

class MessenkaModel extends CI_Model {

        public $code;
        public $logo;
        public $lien;
        public $id;
        public $erreur;
        public $state;
        public $datadb;
        public $pseudo;
    
    private $Table = 'messenka';
    
        public function __construct(){
            parent::__construct();
        }      

        
         /**
        * MTN Mobile Money Transaction
        * @return (Object) $this->getData()
        */
    
    /*
    
        $curl = curl_init();
                      curl_setopt_array($curl, array(
                          CURLOPT_URL => "https://billmap.mtn.ci:8443/WebServices/BillPayment.asmx/ProcessOnlinePayment_V1.4",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 360,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,                        
                          CURLOPT_SSL_VERIFYPEER => 0,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => "Code=GIE&Password=Hemeraude_19801984&MSISDN=".$telephone."&Reference=".$reference."&Amount=".$prix."&MetaData=".$pseudo."",
                          CURLOPT_HTTPHEADER => array(
                            "cache-control: no-cache",
                            "content-type: application/x-www-form-urlencoded"
                          ),
                      ));
                    set_time_limit(360);
                    
                      // execute!
                      $response = simplexml_load_string(curl_exec($curl));
            

                        $err = curl_error($curl);
                        curl_close($curl);
    
    
   */ 
    

        public function doMessenka($telephone_marchand,$prix,$description){
            
           

                      $this->pseudo = $description;
                     
                              
                            
                          
                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                              CURLOPT_URL => "https://secure.messenka.net/merchant_WEB/FR/getpaid.awp?",
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => "",
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 360,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,                        
                              CURLOPT_SSL_VERIFYPEER => 0,
                              CURLOPT_CUSTOMREQUEST => "POST",
                              CURLOPT_POSTFIELDS => "mobile=".$telephone_marchand."&montant=".$prix."&description=".$description."",
                          CURLOPT_HTTPHEADER => array(
                            "cache-control: no-cache",
                            "content-type: application/x-www-form-urlencoded"
                          ),
                      ));
                    set_time_limit(360);

                            $response = curl_exec($curl);
                            $responsejson = json_decode($response, true);
                            $err = curl_error($curl);

                            curl_close($curl);
                          
                           if ($err) {
                                
                                return $this->getData();
                            } 
                            else {

                             //Get Response Data
                              $this->getResponse($responsejson);
                               //return data;
                              return $this->getData();
                            }   
                         
        }
    
    

        /**
        * Save Transaction to Database
        * @return void
        */

        private function save(){       
            
            $datadb = array(
                'code' => $this->code,
                'logo' => $this->logo,
                'lien' => $this->lien,
                'identifiant' => $this->id,
                'created' => date("d-m-Y H:i:s"),
                'pseudo' => $this->pseudo
            );
       
                            
                $this->db->insert('messenka', $datadb);
           
        }

    
        /**
        * Save Transaction to Database
        * @return void
        */

        private function savelast($idM,$Code,$Reference,$Client,$Telephone,$Montant,$Solde,$Date){       
            
            $data = array(
                'reference' => $this->code,
                'Client' => $this->Client,
                'Telephone' => $this->Telephone,
                'Montant' => $this->Montant,
                'solde_marchand' => $this->Solde
            );
       
                            
                $this->db->where('Code', $Code);
                if($this->db->update('messenka', $data)){
                    return true;
                }
                else{
                    return false;
                }
        
           
        }
    
    
    public function GetUserPseudoByCode($code){
        
        $this->db->select('pseudo');
		$this->db->from("messenka");
		$this->db->where("code",$code);
		$this->db->limit(1);
  		$query = $this->db->get();
  		
 		if ($query) {
			 $row=$query->row_array();
             return $row['pseudo'];
		 } else {
			 return false;
		 }
        
    }
    
    
    
    
    /**
	* Get Instances of the response
	* @param $response
	* @return void
	*/
	private function getResponse($response){
		$this->code 	 	  = $response['code'];
		$this->logo 		  = $response['logo'];
		$this->lien 		  = $response['lien'];
		$this->id 		  = $response['id'];
		if($response['erreur'] == ""){
			$this->erreur = $response['erreur'];			
			$this->etat 		  = true;
			$this->save();
		}
		else {
		    $this->state 		  = false;		    
		}
	}
    
	/**
	* @param Exception e
	* @return void
	*/
	private function getException($e){
		$this->message 	= $e->message;
		$this->state  	= false;
	}
    
	/**
	* @return Object $data
	*/
	private function getData(){
        
        $data=(object) [
            'code' => $this->code,
            'logo' => $this->logo,
            'lien' => $this->lien,
            'id' => $this->id,
            'erreur' => $this->erreur
        ];
        return $data;
	}


    
    
    
}
