<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion_agences extends Admin_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->model('admin/MembresModel','MembresModel');
      
    $this->data['pseudo'] = $this->session->userdata('identity');
    $noms_membre = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
    $this->data['nom_membre'] = $noms_membre['nom'];
    $this->data['prenom_membre'] = $noms_membre['prenoms'];
    $this->data['dateInscription'] = date("d-m-Y à H:i:s", $noms_membre['created_on']);
      
        if ($this->ion_auth->in_group(1))
    {
      $this->data['monType'] = "Administrateur";
    } 
        elseif ($this->ion_auth->in_group(7))
    {
      $this->data['monType'] = "Comptable";
    } 
        else $this->data['monType'] = "";
    
          
  }

  public function index()
  {
    redirect('administrator~shappinvest/gestion_agences/etat_creances','refresh');  

  }
    
  public function etat_creances(){
      
      $this->data['titre'] = 'Etat des créances des agences';
      $this->data['page_title'] = 'Etat des créances | Administration';
      $this->data['lien'] = 'Etat des creances';
      //var_dump($this->AgenceModel->getEtatCreances());
      $this->render('admin/gestion_agences/etat_creances_view');  
      
  }
  
  public function etat_data()
  {
        $startDat = $this->input->post('start_date');
        $endDat = $this->input->post('end_date'); 
        $startDate = strtotime($startDat);
        $endDate = strtotime($endDat);
                       
        if(empty($startDat) && empty($endDat)) {
            $date_init = "08-07-2018";
            $startDate = strtotime($date_init);
            $endDate = time();
        }
        
        if(!empty($startDat) && !empty($endDat)) {
            $this->AgenceModel->setStartDate(strtotime($startDat));
            $this->AgenceModel->setEndDate(strtotime($endDat));
        }        
        $getAgenceInfo = $this->AgenceModel->getEtatCreances();
        $dataArray = array();
        foreach ($getAgenceInfo as $element) { 
            $nom_agence = $this->AgenceModel->getNom($element['code_agence'],$startDate,$endDate);
            $nbre_inscrit = $this->AgenceModel->getNbreInscrit($element['code_agence'],$startDate,$endDate);
            $nbre_inscrit_init = $this->AgenceModel->getNbreInscritInit($element['code_agence'],$startDate,$endDate);
            $mtt_inscrit = $nbre_inscrit * 12600;
            $mtt_inscrit_init = $nbre_inscrit_init * 12600;
            $nbre_produits = $this->AgenceModel->getNbreProduitsVendus($element['code_agence'],$startDate,$endDate);
            $nbre_produits_init = $this->AgenceModel->getNbreProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_produits = $this->AgenceModel->getMttProduitsVendus($element['code_agence'],$startDate,$endDate);
            $mtt_produits_init = $this->AgenceModel->getMttProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_versement = $this->AgenceModel->getMttVersements($element['code_agence'],$startDate,$endDate);
            $mtt_versement_init = $this->AgenceModel->getMttVersementsInit($element['code_agence'],$startDate,$endDate);
            $solde_init = $mtt_inscrit_init + $mtt_produits_init - $mtt_versement_init;
            $solde = $solde_init + $mtt_inscrit + $mtt_produits - $mtt_versement;
            
            $dataArray[] = array(
                $nom_agence,
                $solde_init,
                $nbre_inscrit,
                $mtt_inscrit,
                $nbre_produits,
                $mtt_produits,
                $mtt_versement,
                $solde
                
            );
        }

        $getFreelanceInfo = $this->AgenceModel->getEtatCreancesFree();
        
        foreach ($getFreelanceInfo as $element) { 
            $nom_agence = $this->AgenceModel->getNomFree($element['code_agence'],$startDate,$endDate);
            $nbre_inscrit = $this->AgenceModel->getNbreInscrit($element['code_agence'],$startDate,$endDate);
            $nbre_inscrit_init = $this->AgenceModel->getNbreInscritInit($element['code_agence'],$startDate,$endDate);
            $mtt_inscrit = $nbre_inscrit * 12600;
            $mtt_inscrit_init = $nbre_inscrit_init * 12600;
            $nbre_produits = $this->AgenceModel->getNbreProduitsVendus($element['code_agence'],$startDate,$endDate);
            $nbre_produits_init = $this->AgenceModel->getNbreProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_produits = $this->AgenceModel->getMttProduitsVendus($element['code_agence'],$startDate,$endDate);
            $mtt_produits_init = $this->AgenceModel->getMttProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_versement = $this->AgenceModel->getMttVersements($element['code_agence'],$startDate,$endDate);
            $mtt_versement_init = $this->AgenceModel->getMttVersementsInit($element['code_agence'],$startDate,$endDate);
            $solde_init = $mtt_inscrit_init + $mtt_produits_init - $mtt_versement_init;
            $solde = $solde_init + $mtt_inscrit + $mtt_produits - $mtt_versement;
            
            $dataArray[] = array(
                $nom_agence,
                $solde_init,
                $nbre_inscrit,
                $mtt_inscrit,
                $nbre_produits,
                $mtt_produits,
                $mtt_versement,
                $solde
                
            );
        }
        echo json_encode(array("data" => $dataArray));

  }

  
    
  public function compte_agences(){
      
      $this->data['titre'] = 'Compte des agences';
      $this->data['page_title'] = 'Compte des agences | Administration';
      $this->data['lien'] = 'Compte des agences';
      
      $agenc = $getUserInfo = $this->AgenceModel->getAgence();
      $agencF = $getUserInfo = $this->AgenceModel->getAgenceFree();
      
      $dataArra = array();
      
      foreach ($agenc as $el) {
        $dataArra[] = array(
                'localisation' => $el['localisation'],                
                'code_agence' => $el['code_agence']                
            );  
      }
      
      foreach ($agencF as $el) {
        $dataArra[] = array(
                'localisation' => $el['localisation'],                
                'code_agence' => $el['code_agence']                
            );  
      }
      
      $this->data['agence'] = $dataArra;
      //$this->data['agence'] = $getUserInfo = $this->AgenceModel->getUsers('78451563KO30RE156');;
      
      $this->render('admin/gestion_agences/compte_agences_view');  
      
  }
    
  public function compte_agence_data()
  {
        $agence = $this->input->post('agence'); 
       
      
        $startDat = $this->input->post('start_date');
        $endDat = $this->input->post('end_date'); 
        $startDate = strtotime($startDat);
        $endDate = strtotime($endDat);
                       
        if(empty($startDat) && empty($endDat)) {
            $date_init = "08-07-2018";
            $startDate = strtotime($date_init);
            $endDate = time();
        }
      
        if(empty($agence)) {
            $getUserInfo = $this->AgenceModel->getUser($startDate,$endDate);
            $getProduitsVendusInfo = $this->AgenceModel->getProduitsVendusAll($startDate,$endDate);
            $getVersementInfo = $this->AgenceModel->getVersementsAll($startDate,$endDate);
        }
        
        if(!empty($agence)) {
            $getUserInfo = $this->AgenceModel->getUsers($agence,$startDate,$endDate);
            $getProduitsVendusInfo = $this->AgenceModel->getProduitsVendus($agence,$startDate,$endDate);
            $getVersementInfo = $this->AgenceModel->getVersements($agence,$startDate,$endDate);
            
            
        }        
      
        /*
            $getUserInfo = $this->AgenceModel->getUsers('78451563KO30RE156');
            $getProduitsVendusInfo = $this->AgenceModel->getProduitsVendus('78451563KO30RE156');
            $getProduitsVendusInfo = $this->AgenceModel->getVersements('78451563KO30RE156');     
        */
      
      
        $dataArray = array();
      
        foreach ($getUserInfo as $element) {
            
            $startDate = $element['created_on'];
            $startDatd = date("d", $element['created_on']);
            $startDatm = date("m", $element['created_on']);
            $startDatY = date("Y", $element['created_on']);
            $endDatdd = $startDatd + 1;
            $endDate = mktime(0,0,0,$startDatm,$startDatd,$startDatY);
            
            if($this->AgenceModel->AgenceExiste($element['code_agence'])){
                $nom_agence = $this->AgenceModel->getNom($element['code_agence']);
            }
            else {
                $nom_agence = $this->AgenceModel->getNomFree($element['code_agence']);
            }
            
            
            $nbre_inscrit = 1;
            $nbre_inscrit_init = $this->AgenceModel->getNbreInscritInit($element['code_agence'],$startDate,$endDate);
            $mtt_inscrit = $nbre_inscrit * 12600;
            $mtt_inscrit_init = $nbre_inscrit_init * 12600;
            
            $nbre_produits = $this->AgenceModel->getNbreProduitsVendus($element['code_agence'],$startDate,$endDate);
            $nbre_produits_init = $this->AgenceModel->getNbreProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_produits = $this->AgenceModel->getMttProduitsVendus($element['code_agence'],$startDate,$endDate);
            $mtt_produits_init = $this->AgenceModel->getMttProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_versement = $this->AgenceModel->getMttVersements($element['code_agence'],$startDate,$endDate);
            $mtt_versement_init = $this->AgenceModel->getMttVersementsInit($element['code_agence'],$startDate,$endDate);
            
            $solde_init = $mtt_inscrit_init + $mtt_produits_init - $mtt_versement_init;
            $solde = $solde_init + $mtt_inscrit + $mtt_produits - $mtt_versement;
            $reference = '';
            
            $dataArray[] = array(
                $element['created_on'],
                date("d-m-Y à H:i:s", $element['created_on']),
                $nom_agence,
                $element['pseudo'],
                $solde_init,
                $nbre_inscrit,
                $mtt_inscrit,
                '',
                '',
                '',
                '',
                '',
                $solde
                
            );
        }
      
        
      
        foreach ($getProduitsVendusInfo as $element) {
            
            $startDate = $element['date']-10;
            $startDatd = date("d", $startDate);
            $startDatm = date("m", $startDate);
            $startDatY = date("Y", $startDate);
            $endDatdd = $startDatd + 1;
            $endDate = mktime(0,0,0,$startDatm,$startDatd,$startDatY);
            
            if($this->AgenceModel->AgenceExiste($element['code_agence'])){
                $nom_agence = $this->AgenceModel->getNom($element['code_agence'],$startDate,$endDate);
            }
            else {
                $nom_agence = $this->AgenceModel->getNomFree($element['code_agence'],$startDate,$endDate);
            }
            
            $nbre_inscrit = $this->AgenceModel->getNbreInscrit($element['code_agence'],$startDate,$endDate);
            $nbre_inscrit_init = $this->AgenceModel->getNbreInscritInit($element['code_agence'],$startDate,$endDate);
            $mtt_inscrit = $nbre_inscrit * 12600;
            $mtt_inscrit_init = $nbre_inscrit_init * 12600;
            $nbre_produits = $this->AgenceModel->getNbreProduitsVendus($element['code_agence'],$startDate,$endDate);
            $nbre_produits_init = $this->AgenceModel->getNbreProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_produits = $this->AgenceModel->getMttProduitsVendus($element['code_agence'],$startDate,$endDate);
            $mtt_produits_init = $this->AgenceModel->getMttProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_versement = $this->AgenceModel->getMttVersements($element['code_agence'],$startDate,$endDate);
            $mtt_versement_init = $this->AgenceModel->getMttVersementsInit($element['code_agence'],$startDate,$endDate);
            $solde_init = $mtt_inscrit_init + $mtt_produits_init - $mtt_versement_init;
            $solde = $solde_init + $mtt_inscrit + $mtt_produits - $mtt_versement;
            $reference = '';
            $nombre_produits = $element['qte'];
            $montant_produits = $element['montant'];
            $nom_produit = $this->AgenceModel->getNomProduit($element['id_produit']);
            
            
            $dataArray[] = array(
                $element['created_on'],
                date("d-m-Y à H:i:s", $element['date']),
                $nom_agence,
                '',
                $solde_init,
                '',
                '',
                $nom_produit,
                $nombre_produits,
                $montant_produits,
                '',
                '',
                $solde
                
            );
        }
      
        foreach ($getVersementInfo as $element) {
            
            $startDate = $element['date']-10;
            $startDatd = date("d", $startDate);
            $startDatm = date("m", $startDate);
            $startDatY = date("Y", $startDate);
            $endDatdd = $startDatd + 1;
            $endDate = mktime(0,0,0,$startDatm,$startDatd,$startDatY);
            
            if($this->AgenceModel->AgenceExiste($element['code_agence'])){
                $nom_agence = $this->AgenceModel->getNom($element['code_agence']);
            }
            else {
                $nom_agence = $this->AgenceModel->getNomFree($element['code_agence']);
            }
            
            
            $nbre_inscrit = $this->AgenceModel->getNbreInscrit($element['code_agence'],$element['created_on']);
            $nbre_inscrit_init = $this->AgenceModel->getNbreInscritInit($element['code_agence'],$startDate,$endDate);
            $mtt_inscrit = $nbre_inscrit * 12600;
            $mtt_inscrit_init = $nbre_inscrit_init * 12600;
            
            $nbre_produits = $this->AgenceModel->getNbreProduitsVendus($element['code_agence'],$startDate,$endDate);
            $nbre_produits_init = $this->AgenceModel->getNbreProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_produits = $this->AgenceModel->getMttProduitsVendus($element['code_agence'],$startDate,$endDate);
            $mtt_produits_init = $this->AgenceModel->getMttProduitsVendusInit($element['code_agence'],$startDate,$endDate);
            $mtt_versement = $this->AgenceModel->getMttVersements($element['code_agence'],$startDate,$endDate);
            $mtt_versement_init = $this->AgenceModel->getMttVersementsInit($element['code_agence'],$startDate,$endDate);
            
            $solde_init = $mtt_inscrit_init + $mtt_produits_init - $mtt_versement_init;
            $solde = $solde_init + $mtt_inscrit + $mtt_produits - $mtt_versement;
            $montant_versement = $element['montant'];
            $reference = $element['reference'];
            
            $dataArray[] = array(
                $element['created_on'],
                date("d-m-Y à H:i:s", $element['date']),
                $nom_agence,
                '',
                $solde_init,
                '',
                '',
                '',
                '',
                '',
                $montant_versement,
                $reference,
                $solde
                
            );
        }

        echo json_encode(array("data" => $dataArray));

  }
    
    
    
}