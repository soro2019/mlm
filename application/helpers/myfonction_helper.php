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

function lesMois()
{
  return ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'decembre'];
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
  // $data = mysqli_real_escape_string($data);
   return $data;
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

//$matrice doit etre une chaine de characteres
function matriceSuivante($matrice)
{
  $niveau = intval(substr($matrice, -1))+1;
  return $niveau==11 ? null : 'matrice'.$niveau; 
}
 
      