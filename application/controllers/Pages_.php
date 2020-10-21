<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pages extends Public_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('FronteModel');
          //  $this->load->library('session');
            $this->data['articles'] = $this->FronteModel->selectArticles();
        }
        /*fuction page home*/
        public function home(){
            $this->data['titre'] = 'home';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'SHAPP INVEST - Source of Happiness Investment';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->data['articles'] = $this->FronteModel->selectArticles();
            //var_dump($this->data['articles']);die;
             if(isset($_POST['btn']))
             {
                $email = trim($_POST['email']);
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                  //echo("$email is a valid email address");
                    if($this->FronteModel->emailExiste('newletters',$email)==true)
                    {
                       $this->session->set_flashdata('message','Cet adresse email existe dèjà chez nous');
                       echo json_encode("Cet adresse email existe dèjà chez nous");
                    }else
                    {
                        $data = array('email'=>$email, 'date_create'=>time());
                        if($this->FronteModel->save_operation('newletters', $data)){

                           $this->session->set_flashdata('success','Inscription effectuée avec succès à notre newsletters');
                            echo json_encode("Inscription effectuée avec succès à notre newsletters");
                        }else
                        {
                            $this->session->set_flashdata('message','Erreur du système adresser vous au concepeteur');
                             echo json_encode("Erreur du système adresser vous au concepeteur");
                        }
                    }

                }else{
                    $this->session->set_flashdata('message','is not a valid email address');
                     echo json_encode("is not a valid email address");
                }
             }

            $this->render('public/home_view');
        }


      
















        
        public function connexion() {
              $this->data['page_title'] = 'Login / Sign Up';
              if($this->input->post())
              {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('identity', '', 'required');
                $this->form_validation->set_rules('password', '', 'required');
                $this->form_validation->set_rules('souvenir','Se souvenir de moi','integer');
                if($this->form_validation->run()===TRUE)
                {
                  $souvenir = (bool) $this->input->post('souvenir');
                  if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $souvenir))
                  {

                      if($this->ion_auth->in_group('membres'))
                        {
                          redirect('backoffice','refresh');
                        }
                      else {
                        
                        $this->session->set_flashdata('message','Vous n\'êtes pas sur le bon espace de connexion Monsieur l\'administrateur');}
                  }
                  else
                  {
                    $this->session->set_flashdata('message',$this->ion_auth->errors());
                    redirect('backoffice/membre/connexion', 'refresh');
                  }
                }
              }

              if ($this->input->is_ajax_request()) {
                    $ajax->alert("Server Says....\n\t\t".print_r($form_fields,1));
              }
              $this->load->helper('form');
            $this->data['titre'] = 'Login / Sign Up';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['meta_description'] = 'SHAPP INVEST - Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
              $this->render('public/login_signup_view');
          }

        /*function page about_us OK*/
        public function about_us(){
            $this->data['titre'] = 'About Us';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'About Us';
            $this->data['meta_description'] = 'SHAPP INVEST - Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/about_us_view');
        }

        /*function page our_investment_portfolio */
        public function our_investment_portfolio(){
            $this->data['titre'] = 'Our Investment Portfolio';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Our Investment Portfolio';
            $this->data['meta_description'] = 'SHAPP INVEST - Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/our_investment_portfolio_view');
        }

        
        /*function page our_mission*/
        public function our_mission(){
            $this->data['titre'] = 'our Mission';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Our Mission';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/our_mission_view');
        }
        /*fuction page our_history*/
        public function our_history(){
            $this->data['titre'] = 'Our History';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Our History';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/our_history_view');
        }
        /*function page our_white_paper*/
        public function our_white_paper(){
            $this->data['titre'] = 'Our White Paper';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Our White Paper';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/our_white_paper_view');
        }
        
        /*function page our_road_map*/
        public function our_road_map(){
            $this->data['titre'] = 'Our Road Map';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Our Road Map';
            $this->data['meta_description'] = 'SHAPP INVEST - Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/our_road_map_view');
        }

        /*function page our_services*/
        public function our_services(){
            $this->data['titre'] = 'Our Services';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Our Services';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/our_services_view');
        }

        /*function page single_blog*/
        public function single_blog($id_article){
            $this->data['titre'] = 'Single Blog';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Single Blog';
            $this->data['categories'] = $this->FronteModel->selectAllCategories();
            $this->data['latestNews'] = $this->FronteModel->latestNews();
            $this->data['articles'] = $this->FronteModel->selectArticles($id_article);
            $this->data['avisForArticle'] = $this->FronteModel->selectAvisByArticle($id_article);
            $idDesCates = $this->data['articles'][0]->id_categorie;
            $array = explode(',', $idDesCates);
            //var_dump($array);die;
            $this->data['lescategoriesArticle'] = $array;
            if(isset($_POST['submit']))
            {
               if(empty($_POST['email']) or empty($_POST['comment']) or empty($_POST['author']))
               {
                 $this->session->set_flashdata('erros', 'Veillez Renseignez tous les champs svp');
               }else
               {
                   $email = trim($_POST['email']);
                   if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                      $data = array('email_visiteur'=>$email, 'date_poste'=>time(), 'message_visiteur'=>$_POST['comment'], 'nom_visiteur'=>$_POST['author'], 'id_article'=>$_POST['idarticle']);
                        if($this->FronteModel->save_operation('avis_sur_article', $data)){

                           $this->session->set_flashdata('success','Votre message a été envoyé avec succès');
                        }else
                        {
                          $this->session->set_flashdata('message','Erreur du système adresser vous au concepeteur');
                        }
                   }else{
                       $this->session->set_flashdata('message','is not a valid email address');
                   }
               }
            }
           // $this->data['lescategoriesArticle'] = $this->FronteModel->lescategoriesArticle($id_article);
            //$this->data['nbBuniss'] = $this->FronteModel->countArticleById();
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/single_blog_view');
        }

        /*function page rentail_investment*/
        public function rentail_investment(){
            $this->data['titre'] = 'rentail_investment';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Rentail Investment';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/rentail_investment_view');
        }

        /*function page business_to_customer_selling*/
        public function business_to_customer_selling(){
            $this->data['titre'] = 'Business To Customer Selling';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Business To Customer Selling';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/business_to_customer_selling_view');
        }
        /*function page retail_investment*/
        public function retail_investment(){
            $this->data['titre'] = 'Retail Investment';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Retail Investment';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/retail_investment_view');
        }
        /*function page investment_portfolio*/
        public function investment_portfolio(){
            $this->data['titre'] = 'Investment Portfolio';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Investment Portfolio';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/investment_portfolio_view');
        }
        /*function page wallet_exchange_platform*/
        public function wallet_exchange_platform(){
            $this->data['titre'] = 'Wallet Exchange Platform (On Comming)';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Wallet Exchange Platform (On Comming)';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/wallet_exchange_platform_view');
        }
        /*function page peer_to_peer_exchange_platform*/
        public function peer_to_peer_exchange_platform(){
            $this->data['titre'] = 'Peer to Peer Exchange Platform (On Comming)';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Peer to Peer Exchange Platform (On Comming)';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/peer_to_peer_exchange_platform_view');
        }
        /*function page for_business*/
        public function for_business(){
            $this->data['titre'] = 'For Business';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'For Business';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/for_business_view');
        }
        /*function page for_mlm_companies*/
        public function for_mlm_companies(){
            $this->data['titre'] = 'For MLM Companies';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'For MLM Companies';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/for_mlm_companies_view');
        }
        /*function page for_startups*/
        public function for_startups(){
            $this->data['titre'] = 'For StartUps';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'For StartUps';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/for_startups_view');
        }
        /*function page for_exchange_services*/
        public function for_exchange_services(){
            $this->data['titre'] = 'For Exchange Services';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'For Exchange Services';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/for_exchange_services_view');
        }
        /*function page for_network*/
        public function for_network(){
            $this->data['titre'] = 'For Network Marketing And Direct Sales Professionals';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'For Network Marketing And Direct Sales Professionals';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/for_network_view');
        }
        /*function page marketing_and_direct_sales_professionals*/
        public function for_network_marketing_and_direct_sales_professionals(){
            $this->data['titre'] = 'For Network Marketing And Direct Sales Professionals';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'For Network Marketing And Direct Sales Professionals';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/marketing_and_direct_sales_professionals_view');
        }
        /*function page become_a_partner*/
        public function become_a_partner(){
            $this->data['titre'] = 'Become a Partner';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Become a Partner';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/become_a_partner_view');
        }
        
        /*function page open_our_own_consultation_center*/
        public function open_our_own_consultation_center(){
            $this->data['titre'] = 'Open Our Own Consultation Center';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Open Our Own Consultation Center';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            $this->render('public/open_our_own_consultation_center_view');
        }
        /*function page company_news*/
        public function company_news(){
            $this->load->library("pagination");
            $config = array();
            $config["base_url"] = site_url('company-news');
            $config["total_rows"] = $this->FronteModel->get_count(1);
            $config["per_page"] = 4;
            $config["uri_segment"] = 2;
            $this->data['categories'] = $this->FronteModel->selectAllCategories();
            $this->data['latestNews'] = $this->FronteModel->latestNews();
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $this->data["links"] = $this->pagination->create_links();
            $this->data['articles'] = $this->FronteModel->selectArticlesByType1(1, $config["per_page"], $page);

            $this->data['titre'] = 'Company News';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Company News';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            
            $this->render('public/company_news_view');
        }
        /*function page events*/
        public function events(){
            $this->data['titre'] = 'Events';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Events';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            /*$this->data['articles'] = $this->FronteModel->selectArticlesByType(2);
            $this->data['categories'] = $this->FronteModel->selectAllCategories();
            $this->data['latestNews'] = $this->FronteModel->latestNews();*/
            $this->load->library("pagination");
            $config = array();
            $config["base_url"] = site_url('events');
            $config["total_rows"] = $this->FronteModel->get_count(2);
            $config["per_page"] = 4;
            $config["uri_segment"] = 2;
            $this->data['categories'] = $this->FronteModel->selectAllCategories();
            $this->data['latestNews'] = $this->FronteModel->latestNews();
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $this->data["links"] = $this->pagination->create_links();
            $this->data['articles'] = $this->FronteModel->selectArticlesByType1(2, $config["per_page"], $page);

            $this->render('public/events_view');
        }
        /*function page webinars*/
        public function webinars(){
            $this->data['titre'] = 'Webinars';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Webinars';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';
            /*$this->data['articles'] = $this->FronteModel->selectArticlesByType(3);
            $this->data['categories'] = $this->FronteModel->selectAllCategories();
            $this->data['latestNews'] = $this->FronteModel->latestNews();*/
            $this->load->library("pagination");
            $config = array();
            $config["base_url"] = site_url('webinars');
            $config["total_rows"] = $this->FronteModel->get_count(3);
            $config["per_page"] = 4;
            $config["uri_segment"] = 2;
            $this->data['categories'] = $this->FronteModel->selectAllCategories();
            $this->data['latestNews'] = $this->FronteModel->latestNews();
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $this->data["links"] = $this->pagination->create_links();
            $this->data['articles'] = $this->FronteModel->selectArticlesByType1(3, $config["per_page"], $page);

            $this->render('public/webinars_view');
        }
        /*function page contact*/
        /*function page contact*/
        public function contact(){
            $this->data['titre'] = 'Contact';
            $this->data['meta_keywords'] = 'SHAPP INVEST, investment on rentals, source of happiness';
            $this->data['page_title'] = 'Contact';
            $this->data['meta_description'] = 'SHAPP INVEST _ Source of Happiness Investment is the investment funds specialize in microrentals investment management for particulars in the world.';

             if(isset($_POST['submit']))
             {
                // var_dump($_POST);die;

                 if (empty($_POST['your-name']) || empty($_POST['email']) ||
                     empty($_POST['your-phone']) || empty($_POST['subject']) ||
                     empty($_POST['message'])
                    )
                 {
                    $this->session->set_flashdata('message','Renseignez tous les champs svp');
                 }else
                 {
                    $email = trim($_POST['email']);
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                        $data = array(
                                        'email'=>$email,
                                        'full_name'=>trim($_POST['your-name']),
                                        'phone_contact'=>trim($_POST['your-phone']),
                                        'subject'=>trim($_POST['subject']),
                                        'message'=>trim($_POST['message']),
                                        'date_create'=>time()
                                     );
                        if($this->FronteModel->save_operation('contact_visiteurs', $data)){

                           $this->session->set_flashdata('success','Message envoyé avec succès');
                        }else
                        {
                             $this->session->set_flashdata('message','Erreur du système adresser vous au concepeteur');
                        }

                    }else
                    {
                       $this->session->set_flashdata('message','is not a valid email address');  
                    }
                 }
             }
            $this->render('public/contact_view');
        }
        public function deconnexion()
  {
      $this->ion_auth->logout();
      redirect(site_url(), 'refresh');
  }
}