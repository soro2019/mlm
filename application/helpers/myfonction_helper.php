<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * Clean query strings and protocols from urls
 * Returns only hostname
 */
function countElement($value, $table)
{
  $nb = 0;
  foreach ($table as $tvalue) {
    if($value==$tvalue)
    {
      $nb++;
    }
  }
  return $nb;
}

function lesMois($numMois="")
{
  $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'decembre'];
  if($numMois !="")
  {
    return $mois[(int)$numMois-1];
  }else
  {
    return $mois;
  }
}

function formtageDate22($data)
{
  if(stripos($data, '-') && strlen($data) == 10)
  {
    $date = explode('-', $data);
    $data = $date[2].'/'.$date[1].'/'.$date[0];
  }
  return $data;
}

function isset_value($name)
{
  if(isset($_POST[$name]))
  {
    echo $_POST[$name];
  }
}

function test_inputValide($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


function nbAccessLienParrain()
{
  $CI =& get_instance();
  $page = $CI->uri->segment(2)!=NULL ? $CI->uri->segment(2) : $CI->uri->segment(1);

  $parrain = explode('/', $_SERVER['REQUEST_URI']);

  if($page=="registration")
  {
    $pseudo = trim(end($parrain));
    if($pseudo == "registration")
    {
      $pseudo = trim("usermlm");
    }
  }else
  {
    return false;
  }
  $data_user = $CI->UserModel->GetUserDataByPseudo($pseudo);
  //var_dump($data_user);die;
  if(!is_bool($data_user) && is_array($data_user))
  {
    $nb = $data_user['nbperson_accede_lien'] + 1;
    $CI->Crud_model->update_where('users', ['nbperson_accede_lien' => $nb], $pseudo, 'pseudo');
    return true;
  }else
  {
    return 0;
  }
}

function inscritViaLienParrain()
{
  
  $CI =& get_instance();
  $page = $CI->uri->segment(2)!=NULL ? $CI->uri->segment(2) : $CI->uri->segment(1);

  $parrain = explode('/', $_SERVER['REQUEST_URI']);

  if($page=="registration")
  {
    $pseudo = trim(end($parrain));
    if($pseudo == "registration")
    {
      $pseudo = trim("usermlm");
    }
  }else
  {
    return false;
  }
  $data_user = $CI->UserModel->GetUserDataByPseudo($pseudo);
  //var_dump($data_user);die;
  if(!is_bool($data_user) && is_array($data_user))
  {
    $nb = $data_user['nbperson_inscrit_via_lien'] + 1;
    $CI->Crud_model->update_where('users', ['nbperson_inscrit_via_lien' => $nb], $pseudo, 'pseudo');
    return true;
  }else
  {
    return 0;
  }
}

if ( !function_exists('defineLanguage'))
{
  function defineLanguage($lang)
  {
    $CI =&  get_instance();
    if ($lang == '') { 
      $CI->session->set_userdata('language' , 'en');
    }else{
      $CI->session->set_userdata('language' , $lang);
    }

    return trim($CI->session->userdata('language'));
  }
}
if(!function_exists('get_phrase'))
{
  function get_phrase($phrase = '')
  {
    $phrase = trim($phrase);
    $CI  =&  get_instance();
    $CI->load->database();
    $CI->load->library('session');
    if(empty($CI->session->userdata('language')))
    {
       $language  = 'en';
       $current_language  = 'english';
    }else
    {
      $language = $CI->session->userdata('language');
      $query  = $CI->db->get_where('language_list' , array('form' => $language));
      if($query->num_rows() > 0)
      {
        $language = $query->row()->form;
        $current_language = $query->row()->name;
      }else
      {
        $language  = 'en';
        $current_language  = 'english';
      }
    }

    $CI->session->set_userdata('current_language' , $current_language);
    $CI->session->set_userdata('language' , $language);
    /** insert blank phrases initially and populating the language db ***/
    $check_phrase = $CI->db->get_where('language' , array('phrase' => $phrase))->num_rows();
    if($check_phrase == 0){
      $CI->db->insert('language' , array('phrase' => $phrase));
    }
    // query for finding the phrase from `language` table
    $query  = $CI->db->get_where('language' , array('phrase' => $phrase));
    $row    = $query->row_array();


    $current_language = trim($current_language);

    //var_dump($row[$current_language], $current_language);die;
    // return the current sessioned language field of according phrase, else return uppercase spaced word
    if(isset($row[$current_language]) && $row[$current_language] !="")
      return trim(str_replace('`',"'",$row[$current_language]));
    else
      return trim(str_replace('_',' ',$phrase));
  }
}

function countFilleulByMatrice($pseudo, $matrice)
{
  $CI  =&  get_instance();
  $CI->load->database();
  $filleuls = [];
  $i = 0;
    do
    {
      $query = $CI->Crud_model->select_filleuls(trim($pseudo), trim($matrice));
      if($query["pseudo_filleulGauche"] !=null) 
      {
        $i++;
        array_push($filleuls, trim($query["pseudo_filleulGauche"]));
      }
      if($query["pseudo_filleulDroit"] !=null)
      {
        $i++;
        array_push($filleuls, trim($query["pseudo_filleulDroit"]));
      }

      $pseudo = array_shift($filleuls);
    }while(count($filleuls) != 0);

    return $i;
}


////POUR l'inscription
function compte_filleuls($parrain, $matrice)
{
    $CI  =&  get_instance();
    $CI->load->database();
    $filleuls = $CI->Crud_model->select_filleuls($parrain, $matrice);
    if($filleuls['pseudo_filleulGauche'] == null) return 0;
    if($filleuls['pseudo_filleulDroit'] == null) return 1;
    return 2;
}

function compte_descendants($parrain, $matrice)
{
    $CI  =&  get_instance();
    $CI->load->database();

    $nb = compte_filleuls($parrain, $matrice);
    $parrains_a_compter = array();
    do{
        $filleuls = $CI->Crud_model->select_filleuls($parrain, $matrice);
        if($filleuls['pseudo_filleulGauche'] != null)
        {
            array_push($parrains_a_compter, $filleuls['pseudo_filleulGauche']);
        }
        if($filleuls['pseudo_filleulDroit'] != null)
        {
            array_push($parrains_a_compter, $filleuls['pseudo_filleulDroit']);
        }
        $parrain = array_shift($parrains_a_compter);
        $nb+=compte_filleuls($parrain, $matrice);                
    }while(count($parrains_a_compter) != 0);
    return $nb;
}

function choix_filleul($fg, $fd, $matrice)
{
  return compte_descendants($fg, $matrice) <= compte_descendants($fd, $matrice) ? $fg : $fd;
}

function fin_matrice($pseudo_ParrainNvFilleul, $matrice)
{
    $CI  =&  get_instance();
    $CI->load->database();
    $flag=6;
    $ancetre = $CI->Crud_model->select_parrain($pseudo_ParrainNvFilleul, $matrice);

    if(!empty($ancetre))
    {
        $nb_filleuls = compte_filleuls($ancetre['pseudo_user'], $matrice);
        if( $nb_filleuls < 2) return false;
        $flag-=$nb_filleuls;
        $flag-= $ancetre['pseudo_filleulGauche'] == null ? 0 : compte_filleuls($ancetre['pseudo_filleulGauche'], $matrice);
        $flag-= $ancetre['pseudo_filleulDroit'] == null ? 0 : compte_filleuls($ancetre['pseudo_filleulDroit'], $matrice);
        return $flag == 0 ? $ancetre['pseudo_user'] : false;
    }
}

function definir_parrain_de_matrice($pseudo_user, $parrain, $matrice)
{
    $CI  =&  get_instance();
    $CI->load->database();
    $filleuls = $CI->Crud_model->select_filleuls($parrain,$matrice);
    if($filleuls['pseudo_filleulGauche'] == null)
    {
        ////mettre comme filleulGauche
        $CI->Crud_model->updateGen(
            array('pseudo_user' => $parrain),
            array('pseudo_filleulGauche' => trim($pseudo_user)),
            $matrice
        );
    }
    elseif($filleuls['pseudo_filleulDroit'] == null)
    {
        ////insertion comme filleulDroit
        $CI->Crud_model->updateGen(
            array('pseudo_user' => $parrain),
            array('pseudo_filleulDroit' => trim($pseudo_user)),
            $matrice
        );
        if($ancetre = fin_matrice($parrain, $matrice))
        {
            $CI->db->select('pseudo_user,clone');
            $CI->db->from($matrice);
            $CI->db->where(array('pseudo_user' => $ancetre));
            $query = $CI->db->get();
            $row_ancetre = $query->row_array();  
            migration($row_ancetre, $matrice);
        }
    }
    else{
        ////prendre celui qui a le moins de descandants
        $filleulChoisis = choix_filleul($filleuls['pseudo_filleulGauche'],$filleuls['pseudo_filleulDroit'], $matrice);
        definir_parrain_de_matrice($pseudo_user, $filleulChoisis, $matrice);   
    }
}

function ajout_clone($row_user, $matrice)
{
    $CI  =&  get_instance();
    $CI->load->database();
    $reel_pseudo = $row_user['clone'] == null ? $row_user['pseudo_user'] : $CI->Crud_model->recup_reelPseudo($row_user['pseudo_user'], $matrice) ;
    $clone_pseudo = $CI->Crud_model->pseudo_clone($reel_pseudo, $matrice);//pseudoDuClone

    $data = array(
        'pseudo_user' => $clone_pseudo,
        'clone' => 1,
        'date_migration' => time());
    $CI->db->insert($matrice, $data);

    definir_parrain_de_matrice($clone_pseudo,$row_user['pseudo_user'],$matrice);

    $data = array(
        'clone_pseudo' => $clone_pseudo,
        'reel_pseudo' => $reel_pseudo,
        'create_date' => time()
    );
    $CI->db->insert('clones_'.$matrice, $data);
}

function migration($row_user, $matrice)
{
    $CI  =&  get_instance();
    $CI->load->database();
    $matrice_suivante = matriceSuivante($matrice);
    if($matrice_suivante != null || $row_user['clone'] != 1)
    {
        $pseudo_user = trim($row_user['pseudo_user']);
        $data = array(
            'pseudo_user' => $pseudo_user,
            'date_migration' => time());
        $CI->db->insert($matrice_suivante, $data);
        $CI->Crud_model->updateGen(
            array('pseudo' => $pseudo_user),
            array('niveau' => intval(substr($matrice_suivante,-1) )),
            'users');

        //chercher son parrain
        $parrain = $CI->Crud_model->select_parrain($pseudo_user,$matrice);
        if($CI->Crud_model->nameExist($matrice_suivante,'pseudo_user',$parrain['pseudo_user']))
        {
            definir_parrain_de_matrice($row_user['pseudo_user'],$parrain['pseudo_user'],$matrice_suivante);
        }

        //chercher ses filleuls
        $filleuls = $CI->Crud_model->select_filleuls($pseudo_user,$matrice);
        if($CI->Crud_model->nameExist($matrice_suivante,'pseudo_user',$filleuls['pseudo_filleulGauche']))
        {
            definir_parrain_de_matrice($filleuls['pseudo_filleulGauche'],$row_user['pseudo_user'],$matrice_suivante);
        }
        if($CI->Crud_model->nameExist($matrice_suivante,'pseudo_user',$filleuls['pseudo_filleulDroit']))
        {
            $CI->definir_parrain_de_matrice($filleuls['pseudo_filleulDroit'],$row_user['pseudo_user'],$matrice_suivante);
        }
    }

    //ajout d'un clone
    ajout_clone($row_user, $matrice);
}

function selectFilleulByMatrice($pseudo, $matrice)
{
  $CI  =&  get_instance();
  $CI->load->database();
  $filleuls = [];
  $data = '';
  $i = 0;
   while($i < 6)
   {
     $query = $CI->Crud_model->select_filleuls(trim($pseudo), trim($matrice));
     if($query["pseudo_filleulGauche"] != null) 
      {
        $i++;
        array_push($filleuls, trim($query["pseudo_filleulGauche"]));
        $data = $data.'|'.$query["pseudo_filleulGauche"];
      }
      if($query["pseudo_filleulDroit"] != null)
      {
        $i++;
        array_push($filleuls, trim($query["pseudo_filleulDroit"]));
        $data = $data.'|'.$query["pseudo_filleulDroit"];
      }
      
      $pseudo = array_shift($filleuls);
   }

    return $data;
}


//$matrice doit etre une chaine de characteres
function matriceSuivante($matrice)
{
  $niveau = intval(substr($matrice, -1))+1;
  return $niveau==11 ? null : 'matrice'.$niveau; 
}
 
      