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


    public function verifParserelCompte($pseudo)
    {
      $this->db->select('*');
      $this->db->from('comptes');
      $this->db->where(array('pseudo_propio' => trim($pseudo), 'codepin' => null));
      $query = $this->db->get();
      if($query){
          return $query->num_rows();
      }
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
      $this->db->from(trim($matrice));
      $this->db->where(array('pseudo_user' => trim($parrain)));
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


    public function GetCompteExterneByPseudo($pseudo)
    {
        $this->db->select('*');
        $this->db->from('comptes_externes');
        $this->db->where(array('pseudo_proprio' => trim($pseudo)));
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row_array();
        }else return false;
    }

    //$this->db->list_fields('table')

    public function getmodepaiement()
    {
        $this->db->select('*');
        $this->db->from('payment_methods');
        $this->db->where('status =', 1);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else return false;
    }

    public function getPaymentMethodById($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('payment_methods');
        $query = $this->db->get();
        return $query->row();
    }


    public function verifCodePinCompte($compte, $codepin)
    {
        $this->db->select('*');
        $this->db->from('comptes');
        $this->db->where(array('id' => trim($compte), 'codepin' => sha1($codepin)));
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return true;
        }else return false;
    }


    public function update_where($table, $data, $condition, $field)
    {
      $this->db->where($field, $condition);
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
    public function cloneExist($pseudo,$matrice)
    {
      //matrice est une chaine de characteres
        $this->db->select('*'); 
        $this->db->from('clones_'.$matrice);
        $this->db->where(array('reel_pseudo' => $pseudo));
        $this->db->order_by('clone_pseudo', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }        
    }

public function filter($datatofilte) {

  $this->db->where('mois_annee',$datatofilte['mois_annee']);
  $this->db->or_where('typeoperation',$datatofilte['typeoperation']);
  $this->db->or_where('pseudo_receveur', $datatofilte['pseudo_receveur']);
  $query = $this->db->get('operations');
  return $query->result();


}

public function selectNiveauMax(){
  $this->db->select_max('niveau');
  $this->db->from('users');
  $this->db->where('id!=', 1);
  /*$this->db->where('id!=', 2);*/
  $query = $this->db->get();
  return $query->row_array()['niveau'];

}

public function countReInvest($pseudo,$matrice){
  $this->db->select('count(clone_pseudo) as nb_reinv');
  $this->db->from('clones_'.$matrice);
  $this->db->where('reel_pseudo',$pseudo);
  $this->db->group_by('reel_pseudo');
  $query = $this->db->get();
  if($query->num_rows() == 0) return 0;
  return $query->row_array()['nb_reinv'];

}


////////private message//////
 public function send_new_private_message() {
        $message    = $this->input->post('message');
        $timestamp  = time();

        $reciever   = $this->input->post('reciever');
        $sender     = $this->session->userdata('identity');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();
        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender']              = $sender;
            $data_message_thread['reciever']            = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['date_sende']              = $timestamp;
        $this->db->insert('message', $data_message);

        return $message_thread_code;
 }

 public function send_reply_message($message_thread_code) {
        $message    = html_escape($this->input->post('message'));
        $timestamp  = time();
        $sender     = $this->session->userdata('identity');
        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['date_sende']              = $timestamp;
        $this->db->insert('message', $data_message);
    }

 public function mark_thread_messages_read($message_thread_code) {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('identity');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

  public function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('identity');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == 0)
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }


    public function getSettingsInfo()
    {
        $this->db->select('*');
        $this->db->from('configuration');
        $query = $this->db->get();
        if ($query->num_rows()) {
            foreach ($query->result_array() as $row) {
            // Your data is coming from multiple rows, so need to loop on it.
              $siteData[$row['type']] = $row['value'];
            }
          }
          return $siteData;
    }
    
   public function sendEmail($recipient, $subject, $content){
        //load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        //Email settings
        $companyInfo = $this->getSettingsInfo();
            //PhpMailer object
        $mail = $this->phpmailer_lib->load();

        //SMTP configuration
        if($companyInfo['SMTPProtocol'] == 'smtp'){
          $mail->isSMTP();
        } else if($companyInfo['SMTPProtocol'] == 'sendmail'){
          $mail->isSendmail();
        } else if($companyInfo['SMTPProtocol'] == 'mail'){
          $mail->isMail();
        }
            $mail->Host = $companyInfo['SMTPHost'];
            $mail->SMTPAuth = true;
            $mail->Username = $companyInfo['SMTPUser'];
            $mail->Password = $companyInfo['SMTPPass'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $companyInfo['SMTPPort'];
            
            $mail->setFrom($companyInfo['SMTPUser'], $companyInfo['system_name']);
            $mail->addReplyTo($companyInfo['SMTPUser'], 'Support');
            //Add Recipient
            $mail->addAddress($recipient);

            //Email subject
            $mail->Subject = $subject;

            //Set email format to HTML
            $mail->isHTML(true);

            //Email body content
            $mailContent = $content;

            $mail->Body = $mailContent;

            //Send email
            if(!$mail->send()){
                //echo 'Message Could not be sent.';
          //echo 'Mailer error: '. $mail->ErrorInfo;
          return FALSE;
            }else{
          //echo 'Message has been sent';
          return TRUE;
            }
   }

}