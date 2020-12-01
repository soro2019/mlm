<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backoffice_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(['DatatableModel']);
  }

  public function index($lang='')
  {
      defineLanguage($lang);
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect(trim($_SESSION['language']).'/connexion');
      }

      $this->data['titre'] = get_phrase('dashboard');

      $this->data['page_description'] = get_phrase('dashboard');
      $this->data['page_author'] = 'dashboard';
      $this->data['actualites'] = $this->Crud_model->selectArticle(1, 3);
      $this->data['conferneces'] = $this->Crud_model->selectArticle(2, 3);
      $this->data['webinaires'] = $this->Crud_model->selectArticle(3, 3);
      $this->data['modepaiements'] = $this->Crud_model->getmodepaiement();

      if($this->input->post())
      {
        $cMatrice = $this->data['compactmatrice'];
        $cBonus = $this->data['compactbonus'];
        $cOperation = $this->data['compactinvest'];
        if($this->input->post('c-matrice')!=NULL)
        {
          $montant = (int) $this->input->post('montant');
          if(empty($montant) || $montant == 0)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("le montant saisi n'est pas valable")));
          }elseif(empty($this->input->post('codepin')) || $cMatrice['codepin'] != sha1($this->input->post('codepin')))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("code pin invalide")));
          }elseif((int)$cMatrice["montant"] <= $montant)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("votre compte est insuffisant pour effectuer cette opération")));
          }else
          {
            $reste = (int)$cMatrice["montant"] - $montant;
            if($this->Crud_model->update_where('comptes', ['montant' => $reste], $cMatrice["id"], 'id'))
            {
              $newSolde = (int)$cOperation["montant"] + $montant;
              $this->Crud_model->update_where('comptes', ['montant' => $newSolde], $cOperation["id"], 'id');
              $modepaie = 'Avec le Compte Matrice';
              $data['comptdestinataire'] = $cMatrice["id"];
              $motif = ucfirst(get_phrase("transfert interne"));
              $data['typeoperation'] = 5;
              $data['pseudodestinataire'] = $this->session->userdata('identity');
              $data['dateopration'] = time();
              $data['motif_oprt'] = ucfirst(get_phrase("approvisionnement interne du compte d'opération avec le compte matrice"));
              $data['modpaiement'] = $modepaie;
              $data['montant'] = $montant;
              $leMois = lesMois(date('m'));
              $data['mois_annee'] = $leMois.' '.date('Y');
              $data['pseudo_receveur'] = $this->session->userdata('identity');
              $data['comptereceveur'] = $cOperation["id"];
              $this->Crud_model->insertion_('operations', $data);
              $this->session->set_flashdata('message_success', ucfirst(get_phrase("transfert effectué avec succès")));
              redirect(trim($_SESSION['language']).'/backoffice');
            }
          }
        }
        
        if($this->input->post('rc-matrice')!=NULL)
        {
          $montant = (int) $this->input->post('montant');
          if(empty($montant) || $montant == 0)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("le montant saisi n'est pas valable")));
          }elseif(empty($this->input->post('codepin')) || $cMatrice['codepin'] != sha1($this->input->post('codepin')))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("code pin invalide")));
          }elseif((int)$cMatrice["montant"] <= $montant)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("votre compte est insuffisant pour effectuer cette opération")));
          }else
          {
            $reste = (int)$cMatrice["montant"] - $montant;
            if($this->Crud_model->update_where('comptes', ['montant' => $reste], $cMatrice["id"], 'id'))
            {
              /*$newSolde = (int)$cOperation["montant"] + $montant;
              $this->Crud_model->update_where('comptes', ['montant' => $newSolde], $cOperation["id"], 'id');*/
              $modepaie = 'Demande de retrait sur le Compte Matrice';
              $data['comptdestinataire'] = $cMatrice["id"];
              $motif = ucfirst(get_phrase("Demande de retrait"));
              $data['typeoperation'] = 1;
              $data['pseudodestinataire'] = $this->session->userdata('identity');
              $data['dateopration'] = time();
              $data['date_demande'] = date("d/m/Y");
              $data['motif_oprt'] = $motif;
              $data['modpaiement'] = $modepaie;
              $data['montant'] = $montant;
              $leMois = lesMois(date('m'));
              $data['mois_annee'] = $leMois.' '.date('Y');
              $data['pseudo_receveur'] = $this->session->userdata('identity');
              $data['status'] = $data['comptereceveur'] = 0;
              $this->Crud_model->insertion_('operations', $data);
              $this->session->set_flashdata('message_success', ucfirst(get_phrase("demande de retrait effectué avec succès")));
              redirect(trim($_SESSION['language']).'/backoffice');
            }
          }
        }

        if($this->input->post('c-bonus')!=NULL)
        {
          $montant = (int) $this->input->post('montant');
          if(empty($montant) || $montant == 0)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("le montant saisi n'est pas valable")));
          }elseif(empty($this->input->post('codepin')) || $cBonus['codepin'] != sha1($this->input->post('codepin')))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("code pin invalide")));
          }elseif((int)$cBonus["montant"] <= $montant)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("votre compte est insuffisant pour effectuer cette opération")));
          }else
          {
            $reste = (int)$cBonus["montant"] - $montant;
            if($this->Crud_model->update_where('comptes', ['montant' => $reste], $cBonus["id"], 'id'))
            {
              $newSolde = (int)$cOperation["montant"] + $montant;
              $this->Crud_model->update_where('comptes', ['montant' => $newSolde], $cOperation["id"], 'id');

              $modepaie = 'Avec le Compte Bonus';
              $data['comptdestinataire'] = $cBonus["id"];
              $motif = ucfirst(get_phrase("transfert interne"));
              $data['typeoperation'] = 5;
              $data['pseudodestinataire'] = $this->session->userdata('identity');
              $data['dateopration'] = time();
              $data['motif_oprt'] = ucfirst(get_phrase("approvisionnement interne du compte d'opération avec le compte bonus"));
              $data['modpaiement'] = $modepaie;
              $data['montant'] = $montant;
              $leMois = lesMois(date('m'));
              $data['mois_annee'] = $leMois.' '.date('Y');
              $data['pseudo_receveur'] = $this->session->userdata('identity');
              $data['comptereceveur'] = $cOperation["id"];
              $this->Crud_model->insertion_('operations', $data);
              $this->session->set_flashdata('message_success', ucfirst(get_phrase("transfert effectué avec succès")));
              redirect(trim($_SESSION['language']).'/backoffice');
            }
          }
        }

        if($this->input->post('rc-bonus')!=NULL)
        {
          $montant = (int) $this->input->post('montant');
          if(empty($montant) || $montant == 0)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("le montant saisi n'est pas valable")));
          }elseif(empty($this->input->post('codepin')) || $cBonus['codepin'] != sha1($this->input->post('codepin')))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("code pin invalide")));
          }elseif((int)$cBonus["montant"] <= $montant)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("votre compte est insuffisant pour effectuer cette opération")));
          }else
          {
            $reste = (int)$cBonus["montant"] - $montant;
            if($this->Crud_model->update_where('comptes', ['montant' => $reste], $cBonus["id"], 'id'))
            {
              /*$newSolde = (int)$cOperation["montant"] + $montant;
              $this->Crud_model->update_where('comptes', ['montant' => $newSolde], $cOperation["id"], 'id');*/
              $modepaie = 'Demande de retrait sur le Compte Bonus';
              $data['comptdestinataire'] = $cBonus["id"];
              $motif = ucfirst(get_phrase("Demande de retrait"));
              $data['typeoperation'] = 1;
              $data['pseudodestinataire'] = $this->session->userdata('identity');
              $data['dateopration'] = time();
              $data['date_demande'] = date("d/m/Y");
              $data['motif_oprt'] = $motif;
              $data['modpaiement'] = $modepaie;
              $data['montant'] = $montant;
              $leMois = lesMois(date('m'));
              $data['mois_annee'] = $leMois.' '.date('Y');
              $data['pseudo_receveur'] = $this->session->userdata('identity');
              $data['status'] = $data['comptereceveur'] = 0;
              $this->Crud_model->insertion_('operations', $data);
              $this->session->set_flashdata('message_success', ucfirst(get_phrase("demande de retrait effectué avec succès")));
              redirect(trim($_SESSION['language']).'/backoffice');
            }
          }
        }

        if($this->input->post('rc-operation')!=NULL)
        {
          $montant = (int) $this->input->post('montant');
          if(empty($montant) || $montant == 0)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("le montant saisi n'est pas valable")));
          }elseif(empty($this->input->post('codepin')) || $cOperation['codepin'] != sha1($this->input->post('codepin')))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("code pin invalide")));
          }elseif((int)$cOperation["montant"] <= $montant)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("votre compte est insuffisant pour effectuer cette opération")));
          }else
          {
            $reste = (int)$cOperation["montant"] - $montant;
            if($this->Crud_model->update_where('comptes', ['montant' => $reste], $cOperation["id"], 'id'))
            {
              /*$newSolde = (int)$cOperation["montant"] + $montant;
              $this->Crud_model->update_where('comptes', ['montant' => $newSolde], $cOperation["id"], 'id');*/
              $modepaie = 'Demande de retrait sur le Compte d\'opération';
              $data['comptdestinataire'] = $cOperation["id"];
              $motif = ucfirst(get_phrase("Demande de retrait"));
              $data['typeoperation'] = 1;
              $data['pseudodestinataire'] = $this->session->userdata('identity');
              $data['dateopration'] = time();
              $data['date_demande'] = date("d/m/Y");
              $data['motif_oprt'] = $motif;
              $data['modpaiement'] = $modepaie;
              $data['montant'] = $montant;
              $leMois = lesMois(date('m'));
              $data['mois_annee'] = $leMois.' '.date('Y');
              $data['pseudo_receveur'] = $this->session->userdata('identity');
              $data['status'] = $data['comptereceveur'] = 0;
              $this->Crud_model->insertion_('operations', $data);
              $this->session->set_flashdata('message_success', ucfirst(get_phrase("demande de retrait effectué avec succès")));
              redirect(trim($_SESSION['language']).'/backoffice');
            }
          }
        }

        if($this->input->post('appro')!=NULL)
        {
          $montant = (int) $this->input->post('montant');
          if(empty($montant) || $montant == 0)
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("le montant saisi n'est pas valable")));
          }else
          {
            $newsolde = (int)$cOperation["montant"] + $montant;
            $method = $this->input->post('compte');
            $code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $method_data = $this->Crud_model->getPaymentMethodById($method);
            $API = $method_data->api;
            /*var_dump($API);die;*/
            if($API == 'Payeer')
            {
              $this->load->library('Payeer');
              $config = array(
                          'm_shop'    => $method_data->merchantID,
                          'm_orderid' => $code,
                          'm_amount'  => $montant,
                          'm_curr'    => 'USD',
                          'm_desc'    => 'Supply operation',
                          'm_key'     => $method_data->secret_key,
                      );
                $payeer = new Payeer($config);
                $hash = $payeer->digital_signature();
                $payAnswer = false;
                if(isset($_GET['action']) && $_GET['action'] == 'payed'){
                $payAnswer = $payeer->payment_handler();  // Check if the payment has passed
                if($payAnswer == 'success')
                  $this->Crud_model->update_where('comptes', ['montant' => $newsolde], $cOperation["id"], 'id');
                  $modepaie = 'Payeer';
                  $data['comptdestinataire'] = $cOperation["id"];
                  $motif = ucfirst(get_phrase("Approvisionnement"));
                  $data['typeoperation'] = 3;
                  $data['pseudo_receveur'] = $data['pseudodestinataire'] = $this->session->userdata('identity');
                  $data['dateopration'] = time();
                  $data['date_demande'] = date("d/m/Y");
                  $data['motif_oprt'] = $motif;
                  $data['modpaiement'] = $modepaie;
                  $data['montant'] = $montant;
                  $leMois = lesMois(date('m'));
                  $data['mois_annee'] = $leMois.' '.date('Y');
                  $data['status'] = $data['comptereceveur'] = 0;
                  $this->Crud_model->insertion_('operations', $data);
                  $this->session->set_flashdata('message_success', ucfirst(get_phrase("payment was succesful!")));
                  redirect(trim($_SESSION['language']).'/backoffice');
                }
                if($payAnswer != 'success'){
                    $payeer->submitForm(); 
                }
            }

            if($API == 'CashMall')
            {
             
            }
          }
        }
      }

      $this->render('backoffice/dashboard_view');
  }

  public function modaldInfoFieulle()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
         redirect(trim($_SESSION['language']).'/connexion');
      }
      $user = $this->UserModel->GetUserDataById($_POST['id']);
      //var_dump($user);die;
      if(trim($user['genre']) == 'F')
      {
        $genre = "Femme";
      }elseif(trim($user['genre']) == 'H')
      {
        $genre = "Homme";
      }else
      {
        $genre = "";
      }
      $result = '<div class="modal-body">
                   <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('pseudo')).' : <b>'.trim($user['pseudo']).'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("date d'ajout")).' : <b>'.date('d/m/Y à H:i:s',trim($user['created_on'])).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('email')).' : <b>'.trim($user['email']).'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("phone")).' : <b>'.trim($user['phone']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('nom')).' : <b>'.trim($user['first_name']).'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("prenoms")).' : <b>'.trim($user['last_name']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-6">'.ucfirst(get_phrase('date naissance')).' : <b>'.trim(formtageDate22($user['date_naissance'])).'</b>                         
                       </div>
                       <div class="col-sm-6">'.ucfirst(get_phrase("lieu naissance")).' : <b>'.trim($user['Lieu_naissance']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('genre')).' : <b>'.$genre.'</b>                         
                       </div>
                       <div class="col-sm-7">'.ucfirst(get_phrase("ville")).' : <b>'.trim($user['ville']).'</b>                       
                       </div>
                    </div><br>
                    <div class="row">
                       <div class="col-sm-6">'.ucfirst(get_phrase('region')).' : <b>'.trim(ucfirst($user['region'])).'</b>                        
                       </div>
                       <div class="col-sm-6">'.ucfirst(get_phrase('code postal')).' : <b>'.trim($user['code_postal']).'</b>                        
                       </div>
                    </div><br>

                    <div class="row">
                       <div class="col-sm-12">'.ucfirst(get_phrase('pays')).' : <b>'.trim($this->Crud_model->selectPaysById($user['pays'])).'</b>                        
                       </div>
                    </div><br>
                  </div>
                  ';
        echo json_encode($result);
  }

  public function modalinforeseau()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
         redirect(trim($_SESSION['language']).'/connexion');
      }
      $user = $this->UserModel->GetUserDataById($_POST['id']);
      $matrice = 'matrice'.$_POST['niveau'];
      $reseau = selectFilleulByMatrice($user['pseudo'], $matrice);
      $result = '<div class="modal-body">
                  <div class="box-body no-padding">
                   <div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                        <th>N<sup>o</sup></th>
                        <th>'.ucfirst(get_phrase('pseudo')).'</th>
                        <th>'.ucfirst(get_phrase('nom')).' '.ucfirst(get_phrase('prénoms')).'</th>
                        <th>'.ucfirst(get_phrase("achat initial")).'</th>
                        <th>'.ucfirst(get_phrase("date d'entrer")).'</th>
                      </tr>';
      if(!empty($reseau))
      {
        for ($i=0; $i < count($reseau) ; $i++){
          $pseudo = $reseau[$i];
          if(stristr($pseudo, 'clone') == TRUE)
          {
            $pseudo = trim(explode('_', $pseudo)[1]);
          }
          $filleul = $this->UserModel->GetUserDataByPseudo($pseudo);
          $achat_ini = '<span class="badge badge-pill badge-danger">'.ucfirst(get_phrase('non')).'</span>';
          if($filleul['achat_ini'] == 1)
          {
           $achat_ini = '<span class="badge badge-pill badge-success">'.ucfirst(get_phrase('oui')).'</span>';
          }

          $result .= '<tr>
                        <td>'.($i+1).'</td>
                        <td>'.$reseau[$i].'</td>
                        <td>'.ucwords($filleul['first_name']).' '.ucfirst($filleul['last_name']).'</td>
                        <td>'.$achat_ini.'</td>
                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> '.date('M d, Y', $filleul['created_on']).'</span> </td>
                      </tr>';
        }
        
      }else
      {
        $result .='<tr>
                  <td colspan="6">'.ucfirst(get_phrase('ce membre n\'a pas encore de filleule dans cette matrice')).'</td>
                </tr>';
      }
      $result .= '</table></div></div></div>';
      echo json_encode($result);
  }

  public function modaldProduit()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
         redirect(trim($_SESSION['language']).'/connexion');
      }
      $mescomptes = $this->Crud_model->mescomptes($this->session->userdata('identity'));
      $prod = $this->Crud_model->GetProductDataById($_POST['id']);
      $result = '<div class="modal-body">
                  <form method="POST" action="">
                   <input type="hidden" name="id_prod" value="'.$_POST['id'].'">
                   <div class="row">
                       <div class="col-sm-5">'.ucfirst(get_phrase('name')).' : <b>'.ucfirst(trim($prod['name'])).' ('.number_format(trim($prod['prix_vente']), 0, ' ', ' ').' $)</b>                         
                       </div>
                       <div class="col-sm-7"><b>'.ucfirst(get_phrase("selectionnez le compte")).'</b>
                          <br><select name="modepaie" class="form-control" id="modepaie" required>
                              <option value="">'.ucfirst(get_phrase("selectionnez le compte")).'</option>
                             ';

                   foreach($mescomptes as $mescompte){
                    $name = $this->db->get_where('typecompte', ['id' => $mescompte['typecompte']])->row_array()['libelle']; 
                    $result .='<option value="'.$mescompte['id'].'"><b>'.ucfirst(get_phrase('compte')).' '.$name.'('.number_format(trim($mescompte['montant']), 0, ' ', ' ').' $)</b></option>';
                   }
                $result .= '</select> 
                       </div>
                    </div><br>
                    <div class="row">
                      <div class="col-sm-5">
                        <button class="btn btn-success" type="submit" name="btn">Acheter le produit</button>
                      </div>
                    <div><br>
                    </form>
                  </div>
                  ';

        echo json_encode($result);
  }

  public function mon_reseau($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('mon réseau');

    $this->data['page_description'] = get_phrase('mon réseau');
    $this->data['page_author'] = 'mon_reseau';
    
    $this->render('backoffice/reseau_view');
  }
  

  public function subscription($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('faire l\'achat initial');

    $this->data['page_description'] = get_phrase('achat initial');
    $this->data['page_author'] = 'subscription';
    $this->data['products'] = $this->Crud_model->selectAllProduct();

    if($this->input->post())
    {
      if(empty($this->input->post('modepaie')))
      {
        $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('veuillez selectionnez un mode de paiement svp')));
      }else
      {
        $id_prod = test_inputValide($this->input->post('id_prod'));
        $mode = test_inputValide($this->input->post('modepaie'));
        $prod = $this->Crud_model->GetProductDataById($id_prod);
        $data = [];
          //utilisation d'un compte du système
          $idCompte = (int) $mode;
          $compte = $this->Crud_model->moncompteById($idCompte);
          $name = $this->db->get_where('typecompte', ['id' => $compte['typecompte']])->row_array()['libelle'];
          if((int)trim($prod['prix_vente']) > (int)trim($compte['montant']))
          {
            $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('votre compte est insuffisant pour effectuer cette opération')));
          }else
          {
            $modepaie = 'Avec le Compte '.$name;
            $data['comptdestinataire'] = $idCompte;
            $motif = ucfirst(get_phrase("achat ini du produit ".$prod['name']));
            $data['typeoperation'] = 13;
            $data['pseudodestinataire'] = $this->data['pseudo'];
            $data['dateopration'] = time();
            $data['motif_oprt'] = $motif;
            $data['modpaiement'] = $modepaie;
            $data['montant'] = $prod['prix_vente'];
            $leMois = lesMois(date('m'));
            $data['mois_annee'] = $leMois.' '.date('Y');

            if($this->Crud_model->insertion_('operations', $data))
            {
              if(isset($idCompte))
              {
                $newsolde = (int)trim($compte['montant']) - (int)trim($prod['prix_vente']);
                $this->Crud_model->update_where('comptes', ['montant' => $newsolde], $idCompte, 'id');
              }
              $this->Crud_model->update_where('users', ['achat_ini' => 1], trim($this->data['pseudo']), 'pseudo');
              $this->session->set_flashdata('message_success', ucfirst(get_phrase('achat initial effectué avec succès')));
              redirect(trim($_SESSION['language']).'/backoffice');
            }else
            {
              $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('erreur du système')));
            }
          }
      }
      //redirect(trim($_SESSION['language']).'/backoffice');
    }
    
    $this->render('backoffice/souscription_view');
  }
    
  public function matrice($lang='', $nieme)
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('matrice');
    $this->data['nieme'] = (int) $nieme;
    $this->data['page_description'] = get_phrase('matrice');
    $this->data['page_author'] = 'matrice'.$this->data['nieme'];
    $this->data['page_author2'] = 'matrice';
    //var_dump($this->data['nieme']);die;
    if($nieme > $this->data['niveau'])
    {
     $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('votre plus grand niveau de matrice est '.$this->data['niveau'].' et non '.$nieme)));
      redirect(trim($_SESSION['language']).'/backoffice');
    }
    $this->data['r'] = selectFilleulByMatrice($this->session->userdata('identity'), $this->data['page_author']);

    $this->render('backoffice/matrice_view');
  }


  public function operation_financiere($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = ucwords(get_phrase('mes opérations finacières'));

    $this->data['page_description'] = ucfirst(get_phrase('mes opérations finacières'));
    $this->data['page_author'] = "operation_financiere";

    $this->data['typeOp'] = $this->Crud_model->selectAllTypeOp();

    $this->data['mesoperations'] = $this->Crud_model->selectAllOperationByPseudo($this->session->userdata('identity'));
    
    $this->render('backoffice/operation_financiere_view');
  }

  public function dataOperations()
  {

    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }

    $data = array();
        
    $op = $this->DatatableModel->getRows();

    var_dump($op);die;
    
    $i = isset($_POST['start'])?$_POST['start']:0;

    foreach($op as $op){

        //$champs = $this->Crud_model->selectChampProduct();
        
        $i++; 
        $identifiant = $op['identifiant_genered'];   
        $nom_prenoms =$op['nom_prenoms'];   
        $date_naissance = formtageDate22($op['date_naissance']);   
        $contact = $op['contact'];   
        $quartier = $op['quartier'];   
        $ayant_droit = $op['ayant_droit'];   
        $message_envoyer = $op['message_envoyer'];  
        $date_envoie = $op['date_envoie'];
        $date_ = "";
        if($date_envoie != 0 && $message_envoyer != 0){
          $date_ = formtageDate22($date_envoie);
        }
        $status = "Identifiant reçu";
        $action = '<span class="dropdown"><a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true"> <i class="la la-ellipsis-h"></i>  </a> <div class="dropdown-menu dropdown-menu-right">';

               if($op['message_envoyer']==0)
                {
                    $action .= '<a class="dropdown-item" href="'.site_url("/main/envoieid/").$op['identifiant_genered'].'"><i class="la la-leaf"></i> Envoyer son identifiant</a>';
                    $status = "Pas encore reçu";
                }

               $action .= '<a class="dropdown-item" href="'.site_url("/main/pdf/").$op['id'].'" target="_blank"><i class="la la-print"></i> Imprimé fiche</a>

                  <a class="dropdown-item" href="'.site_url("/main/voir/").$op['id'].'"><i class="la la-leaf"></i> Voir détail</a> 

                  <a class="dropdown-item" href="'.site_url("/main/modifier/").$op['id'].'"><i class=" la la-edit"></i> Modifier</a>  </div>  </span>';

        $data[] = array($i,$identifiant,$nom_prenoms,$date_naissance,$contact,$quartier,$ayant_droit,$status,$date_,$action);
                              
    }

    //var_dump($data);die;
    
    $output = array(
        "draw" => isset($_POST['draw'])?$_POST['draw']:10,
        "recordsTotal" => $this->DatatableModel->countAll(),
        "recordsFiltered" => $this->DatatableModel->countFiltered($_POST),
        "data" => $data
    );
    
    // Output to JSON format
    echo json_encode($output);
  }
  
  public function transferts_interne($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('internal transfer');

    $this->data['page_description'] = get_phrase('internal transfer');
    $this->data['page_author'] = 'transferts_interne';

    if($this->input->post())
    {

      if(empty($this->input->post('pseudo_partenaire')) || empty($this->input->post('montant')) || empty($this->input->post('compte')))
      {
        $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('veuillez remplir correctement le formulaire')));
      }elseif($this->input->post('montant')==0)
      {
        $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('le montant saisi n\'est pas valable')));
      }elseif(!$this->UserModel->PseudoExiste($this->input->post('pseudo_partenaire')))
      {
        $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('le pseudo de votre partenaire n\'existe pas dans notre base')));

      }elseif($this->session->userdata('identity')==$this->input->post('pseudo_partenaire'))
      {
        $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("impossible d'effectuer cette opération via cet interface")));
      }else
      {
        $compteSelect = $this->Crud_model->moncompteById((int)$this->input->post('compte'));
        if($compteSelect['montant'] <= (int)$this->input->post('montant'))
        {
         $this->session->set_flashdata('message_erreur', ucfirst(get_phrase("votre compte est insuffisant pour effectuer cette opération")));
        }else
        { 
            $montant = (int)$this->input->post('montant');
            $reste = (int)$compteSelect["montant"] - $montant;

            if($this->Crud_model->update_where('comptes', ['montant' => $reste], $compteSelect["id"], 'id'))
            {
              $cOpPart = $this->Crud_model->moncomptes($this->input->post('pseudo_partenaire'),3);
              $newSolde = (int)$cOpPart["montant"] + $montant;
              $this->Crud_model->update_where('comptes', ['montant' => $newSolde], $cOpPart["id"], 'id');
              $name = $this->db->get_where('typecompte', ['id' => $compteSelect['typecompte']])->row_array()['libelle'];
              $modepaie = 'Avec le Compte '.$name;
              $data['comptdestinataire'] = $compteSelect["id"];
              $motif = ucfirst(get_phrase("transfert interne vers le partenaire")).' '.$this->input->post('pseudo_partenaire');
              $data['typeoperation'] = 4;
              $data['pseudodestinataire'] = $this->session->userdata('identity');
              $data['dateopration'] = time();
              $data['motif_oprt'] = $motif;
              $data['modpaiement'] = $modepaie;
              $data['montant'] = $montant;
              $data['message_au_receveur'] = test_inputValide($this->input->post('message'));
              $data['comptereceveur'] = $cOpPart["id"];
              $data['pseudo_receveur'] = $this->input->post('pseudo_partenaire');
              $leMois = lesMois(date('m'));
              $data['mois_annee'] = $leMois.' '.date('Y');
              $this->Crud_model->insertion_('operations', $data);
              $this->session->set_flashdata('message_success', ucfirst(get_phrase("transfert effectué avec succès")));
              redirect(trim($_SESSION['language']).'/backoffice/internal-transfer');
            }
        }
      }
    }
    
    $this->render('backoffice/transferts_interne_view');
  }
  

  
  public function messagerie($lang='', $innerPage="message_home", $param2 = "")
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }

    if($innerPage == 'send_new')
    {
      $message_thread_code = $this->Crud_model->send_new_private_message();
      $this->session->set_flashdata('message_success', get_phrase('message_sent!'));
      redirect(site_url('backoffice/messagerie/message_read/' . $message_thread_code), 'refresh');
    }

    if($innerPage == 'message_read'){
            $this->data['current_message_thread_code'] = $param2; // $param2 = message_thread_code
            $this->Crud_model->mark_thread_messages_read($param2);
    }

    if ($innerPage == 'send_reply'){
            $this->Crud_model->send_reply_message($param2); //$param2 = message_thread_code
            $this->session->set_flashdata('message_success', get_phrase('message_sent!'));
            redirect(site_url('backoffice/messagerie/message_read/' . $param2), 'refresh');
    }

    $mesFieulles = $this->UserModel->selectMesFieulles($this->session->userdata('identity'));
    $this->data['mescontacts']  = $mesFieulles;
    $this->data['message_inner_page_name'] = $innerPage;
    $this->data['titre'] = get_phrase('messagerie');
    $this->data['page_description'] = get_phrase('messagerie');
    $this->data['page_author'] = get_phrase('messagerie');
    $this->render('backoffice/messagerie_view');  
  }
  
  public function securite($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/securite_view');
      
  }

  public function materiel_marketing($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/materiel_marketing_view');
      
  }
  
  public function nouveau_partenaire($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('ajouter un nouveau partenaire');

    $this->data['page_description'] = ucfirst(get_phrase('ajouter un nouveau partenaire'));
    $this->data['page_author'] = 'nouveau_partenaire';

     if($this->input->post())
     {
        $codepays = substr($this->input->post('phonenumber'),0,2);
        if(empty($this->input->post('pseudo')) || empty($this->input->post('usermail')) || empty($this->input->post('phonenumber')) || empty($this->input->post('userpass')) || empty($this->input->post('userconfpass')))
        {
          $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('aucun champs ne doit être vide')));
        }elseif($this->UserModel->PseudoExiste($this->input->post('pseudo')))
        {
          $this->session->set_flashdata('message_erreur',ucfirst(get_phrase('désolé! Ce pseudo est déjà pris.')));
        }elseif($this->UserModel->EmailExiste($this->input->post('usermail')))
        {
          $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('désolé! Cet adresse email est déjà utilisée.')));
        }elseif($this->UserModel->PhoneExiste($this->input->post('phonenumber')))
        {
          $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('désolé! Cet numéro de téléphone est déjà utilisée.')));
        }elseif($this->UserModel->NomExiste2($this->input->post('nom')) && $this->UserModel->PrenomsExiste2($this->input->post('prenoms')))
        {
          $this->session->set_flashdata('message_erreur', get_phrase('Le nom et prénoms saisie sont déjà utilisée par un autre utilisateur'));

        }elseif(stripos($codepays, '+') || stripos($codepays, "00"))
        {
         $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('veuillez ajouter l\'indicateur de votre pays à votre contact en utilisant "+"')));
        }
        elseif(!$this->input->post('userpass')===$this->input->post('userconfpass'))
        {
          $this->session->set_flashdata('message_erreur', ucfirst(get_phrase('désolé! Les deux mots de passe ne correspondent pas.')));
        }else
        {
            $group_ids = [2];
            $pseudo = test_inputValide($this->input->post('pseudo'));
            $password = test_inputValide($this->input->post('userpass'));
            $mail = test_inputValide(strtolower($this->input->post('usermail')));

            $parrain = test_inputValide($this->session->userdata('identity'));
            $additional_data = array(
                    'pseudo_parrain' => $parrain,
                    'phone' => test_inputValide($this->input->post('phonenumber')),
                    'company' => "MEMBRE",
                    'created_on' => time(),
                    'niveau' => 1,
                );

            if($this->ion_auth->register($pseudo, $password, $mail, $additional_data, $group_ids))
            {
                $matrice = 'matrice1';
                $data_filleul = array(
                    'pseudo_user' => trim($pseudo),
                    'date_migration' => time());
                $this->db->insert($matrice, $data_filleul);
                definir_parrain_de_matrice($pseudo, $parrain, $matrice);
                for($i=1; $i <=3 ; $i++){ 
                   $this->db->insert('comptes', ['pseudo_propio'=> $pseudo, 'typecompte'=> $i,  'montant' => 0]);
                }
                $this->session->set_flashdata('message_success', ucfirst(get_phrase('partenaire ajouté avec succès.')));
                redirect(trim($_SESSION['language']).'/backoffice/new-partner','refresh');
            }
        }
     }
    
    $this->render('backoffice/new_partners_registration_view');
  }

  public function webinaire($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    $this->data['titre'] = get_phrase('webinaires en ligne');

    $this->data['page_description'] = get_phrase('webinaire');
    $this->data['page_author'] = 'webinaire';
    $this->data['webinaires'] = $this->Crud_model->selectArticle(3);
    
    $this->render('backoffice/webinaire');
  }

  public function conferences($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('nos conférences');

    $this->data['page_description'] = get_phrase('conférences');
    $this->data['page_author'] = 'conferences';
    $this->data['conferneces'] = $this->Crud_model->selectArticle(2);
    
    $this->render('backoffice/conferences');    
  }

  public function actualites($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('nos actualités');

    $this->data['page_description'] = get_phrase('nos actualités');
    $this->data['page_author'] = 'actualites';
    $this->data['actualites'] = $this->Crud_model->selectArticle(1);
    
    $this->render('backoffice/actualites');   
  }

  public function support_technique($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/support_technique');      
  }

  public function faq($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('faq');

    $this->data['page_description'] = get_phrase('faq');
    $this->data['page_author'] = 'faq';
    
    $this->render('backoffice/faq');     
  }

  public function politique_confidentialite($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/politique_confidentialite');    
  }

  public function mention_legale($lang='')
  {
    defineLanguage($lang);
    if(!$this->ion_auth->logged_mlm_in())
    {
      redirect(trim($_SESSION['language']).'/connexion');
    }
    
    $this->data['titre'] = get_phrase('dashboard');

    $this->data['page_description'] = get_phrase('dashboard');
    $this->data['page_author'] = get_phrase('dashboard');
    
    $this->render('backoffice/mention_legale');   
  }

  //  public function mon_reseau()
  // {
  //     if(!$this->ion_auth->logged_mlm_in())
  //     {
  //       redirect(trim($_SESSION['language']).'/connexion');
  //     }
  //     $this->data['page_title'] = 'Mon réseau';
  //     $this->data['titre'] = 'reseau';
        
  //     $users = $this->MesFilleulsModel->MesFilleuls($this->session->userdata('identity'));
  //     $this->data['users'] = $users;

  //     $this->render('backoffice/monreseau_view','backoffice_master');
      
  // }
  
  public function mon_arbre()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect(trim($_SESSION['language']).'/connexion');
      }
      $this->data['page_title'] = 'Mon arbre généalogique';
      $this->data['titre'] = 'arbre';
        
      $users = $this->MesFilleulsModel->MesFilleuls($this->session->userdata('identity'));
      $this->data['users'] = $users;

      $this->render('backoffice/monarbre_view','backoffice_master');
      
  }
    
  public function mes_commissions()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect(trim($_SESSION['language']).'/connexion');
      }
      $this->data['page_title'] = 'Mes commissions';
      $this->data['titre'] = 'commissions';
        
      $mesbons = $this->MesBonsModel->mesbons($this->session->userdata('identity'));
      $this->data['mesbons'] = $mesbons;

      $this->render('backoffice/mescommissions_view','backoffice_master');
      
  }
    
  public function mon_parrain()
  {
      if(!$this->ion_auth->logged_mlm_in())
      {
        redirect(trim($_SESSION['language']).'/connexion');
      }
      $this->data['page_title'] = 'Mon parrain';
      $this->data['titre'] = 'parrain';
        
      $monparrain = $this->UserModel->GetUserDataByPseudo($this->session->userdata('identity'));
      $pseudo_parrain = $monparrain['pseudo_parrain'];
      $infoparrain = $this->UserModel->GetUserDataByPseudo($pseudo_parrain);
      $this->data['monparain'] = $infoparrain;

      $this->render('backoffice/monparrain_view','backoffice_master');
      
  }


}