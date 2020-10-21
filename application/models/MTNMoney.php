<?php

class MTNMoney extends CI_Model {

        public $telephone;
        public $prix;
        public $reference;
        public $pseudo;
        public $ResponseCode;
        public $ResponseMessage;
        public $EWPTransactionId;
        public $BillMapTransactionId;
    
    private $Table = 'transaction_mtn';
    
        public function __construct(){
            parent::__construct();
        }      

        
         /**
        * MTN Mobile Money Transaction
        * @return (Object) $this->getData()
        */

        public function doMTNTransaction1($prix,$telephone,$reference,$pseudo){

                      
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
            
            
            
                        if ($err) {
                          return false;
                        } 
                        elseif ($response->ResponseCode == 1000){
                           // $this->Save($response,$telephone,$reference,$prix,$pseudo);
                            
                            $this->session->set_userdata('reponse_retout_attente',$response);
                            
                            return true;
                            
                        }
                        else {
                          
                         //return data;
                         //return false;
                            $this->session->set_userdata('reponse_retout_attente',$response);
                            
                            return true;

                        
                        }
                         
        }
    
    

        /**
        * Save Transaction to Database
        * @return void
        */

        private function Save($response,$telephone,$reference,$prix,$pseudo){

            $this->ResponseCode 	 	  = $response->ResponseCode;
            $this->ResponseMessage 	 	  = $response->ResponseMessage;
            $this->EWPTransactionId 	 	  = $response->EWPTransactionId;
            $this->BillMapTransactionId 		  = $response->BillMapTransactionId;
            

            if($response->ResponseCode == 1000){
                
                $this->data['telephone'] 	= $telephone;
                $this->data['pseudo']			= $pseudo;
                $this->data['EWPTransactionId']			= $this->EWPTransactionId;
                $this->data['BillMapTransactionId']			= $this->BillMapTransactionId;
                $this->data['created']			= date('d-m-Y H:i:s');
                
                $this->db->insert('transaction_mtn', $data);
            }

            else {
                $this->state 		  = false;		    
            }

        }



    
    
    
}
