<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller routes.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/route is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/





/*
 * Backoffice Controllers Routes
*/

/*$route['inscription'] = 'backoffice/membre/inscription';
$route['inscription-offline'] = 'backoffice/membreoffline/inscription';
$route['inscription-agence'] = 'backoffice/membreoffline/inscription_agence';
$route['inscription/paiement-messenka'] = 'backoffice/membre/paiement_messenka';
$route['inscription-offline/paiement'] = 'backoffice/membreoffline/paiement';
$route['inscription-agence/paiement-agence'] = 'backoffice/membreoffline/paiement_agence';
$route['inscription-effective'] = 'backoffice/membre/inscription_effective';
$route['inscription-effective/:any'] = 'backoffice/membre/inscription_effective';
$route['inscription-effective-offline'] = 'backoffice/membreoffline/inscription_effective';
$route['inscription-effective-agence'] = 'backoffice/membreoffline/inscription_effective';*/
$route['inscription/:any'] = 'pages/inscription';
$route['confirmation'] = 'backoffice/membre/confirmation_inscription';
$route['confirmation-agence'] = 'backoffice/membreoffline/confirmation_inscription_agence';
$route['confirmation-offline'] = 'backoffice/membreoffline/confirmation_inscription';
$route['paiement-attente'] = 'backoffice/membre/paiement_attente';
$route['paiement/ipn'] = 'backoffice/membre/ipn';
$route['backoffice/commission'] = 'backoffice/dashboard/mes_commissions';
$route['backoffice/mon-reseau'] = 'backoffice/dashboard/mon_reseau';
$route['backoffice/mon-parrain'] = 'backoffice/dashboard/mon_parrain';
/*$route['backoffice/profil'] = 'backoffice/membre/profil';*/
$route['backoffice/modifier-profil'] = 'backoffice/membre/modifier_profil';
$route['backoffice/modifier-mot-de-passe'] = 'backoffice/membre/modifier_mdp';


/*
 * Frontoffice Controllers Routes
 */

$route['backoffice/buy-investment-package'] = 'backoffice/membre/buy_investment_package';
$route['backoffice/my-investment-package'] = 'backoffice/membre/my_investment_package';
$route['backoffice/internal-transactions'] = 'backoffice/membre/internal_transactions';
$route['backoffice/financial-transactions'] = 'backoffice/membre/financial_transactions';
$route['backoffice/new-partners-registration'] = 'backoffice/membre/new_partners_registration';
$route['backoffice/partners-list'] = 'backoffice/membre/partners_list';
$route['backoffice/your-level'] = 'backoffice/membre/your_level';
$route['backoffice/my-documents'] = 'backoffice/membre/my_documents';
$route['backoffice/profile-data'] = 'backoffice/membre/profile_data';
$route['backoffice/security'] = 'backoffice/membre/security';
$route['backoffice/my-documents'] = 'backoffice/membre/my_documents';
$route['backoffice/promotional-materials'] = 'backoffice/membre/promotional_materials';
$route['backoffice/signup-new-partner'] = 'backoffice/membre/signup_new_partner';



/*route page about_us ok*/
$route['about-us'] = 'pages/about_us';
	/*route page our_mission*/
$route['single-blog/(:num)'] = 'pages/single_blog/$1';

	/*fuction page our_history*/
$route['our-history'] = 'pages/our_history';
	/*route page our_white_paper*/
$route['our-white-paper'] = 'pages/our_white_paper';
$route['our-road-map'] = 'pages/our_road_map';
	/*route page our_white_paper*/
$route['our-services'] = 'pages/our_services';
$route['rentail-investment'] = 'pages/rentail_investment';
	/*route page business_to_customer_selling*/
$route['business-to-customer-selling'] = 'pages/business_to_customer_selling';
	/*route page retail_investment*/
$route['retail-investment'] = 'pages/retail_investment';
	/*route page investment_portfolio*/
$route['investment-portfolio'] = 'pages/investment_portfolio';
	/*route page wallet_exchange_platform*/
$route['wallet-exchange-platform'] = 'pages/wallet_exchange_platform';
	/*route page peer_to_peer_exchange_platform*/
$route['peer-to-peer-exchange-platform'] = 'pages/peer_to_peer_exchange_platform';
	/*route page for_business*/
$route['for-business'] = 'pages/for_business';
	/*route page for_mlm_companies*/
$route['for-mlm-companies'] = 'pages/for_mlm_companies';
	/*route page for_startups*/
$route['for-startups'] = 'pages/for_startups';
	/*route page for_exchange_services*/
$route['for-exchange-services'] = 'pages/for_exchange_services';
	
	/*route page marketing_and_direct_sales_professionals*/
$route['for-network-marketing-and-direct-sales-professionals'] = 'pages/for_network_marketing_and_direct_sales_professionals';
	/*route page become_a_partner*/
$route['become-a-partner'] = 'pages/become_a_partner';
	
	/*route page consultation_center*/
$route['open-our-own-consultation-center'] = 'pages/open_our_own_consultation_center';

$route['logout'] = 'pages/deconnexion';
	/*route page company_news*/
$route['company-news'] = 'pages/company_news';
$route['company-news/(:num)'] = 'pages/company_news';
	/*route page events*/
$route['events'] = 'pages/events';
$route['events/(:num)'] = 'pages/events';
$route['webinars'] = 'pages/webinars';
$route['webinars/(:num)'] = 'pages/webinars';






/*
 * Backoffice Controllers Routes
 */
/*$route['backoffice/login'] = "backoffice/auth/login";
$route['(\w{2})/backoffice/login'] = "backoffice/auth/login";
$route['backoffice/register'] = "backoffice/auth/register";
$route['(\w{2})/backoffice/register'] = "backoffice/auth/register";
$route['backoffice/forgotten-password'] = "backoffice/auth/forgotten";
$route['(\w{2})/backoffice/forgotten-password'] = "backoffice/auth/forgotten";
$route['backoffice/me'] = "backoffice/backofficeProfile";
$route['(\w{2})/backoffice/me'] = "backoffice/backofficeProfile";
$route['backoffice/logout'] = "backoffice/backofficeProfile/logout";
$route['(\w{2})/backoffice/logout'] = "backoffice/backofficeProfile/logout";
$route['backoffice/products'] = "backoffice/Products";
$route['(\w{2})/backoffice/products'] = "backoffice/Products";
$route['backoffice/products/(:num)'] = "backoffice/Products/index/$1";
$route['(\w{2})/backoffice/products/(:num)'] = "backoffice/Products/index/$2";
$route['backoffice/add/product'] = "backoffice/AddProduct";
$route['(\w{2})/backoffice/add/product'] = "backoffice/AddProduct";
$route['backoffice/edit/product/(:num)'] = "backoffice/AddProduct/index/$1";
$route['(\w{2})/backoffice/edit/product/(:num)'] = "backoffice/AddProduct/index/$1";
$route['backoffice/orders'] = "backoffice/Orders";
$route['(\w{2})/backoffice/orders'] = "backoffice/Orders";
$route['backoffice/uploadOthersImages'] = "backoffice/AddProduct/do_upload_others_images";
$route['backoffice/loadOthersImages'] = "backoffice/AddProduct/loadOthersImages";
$route['backoffice/removeSecondaryImage'] = "backoffice/AddProduct/removeSecondaryImage";
$route['backoffice/delete/product/(:num)'] = "backoffice/products/deleteProduct/$1";
$route['(\w{2})/backoffice/delete/product/(:num)'] = "backoffice/products/deleteProduct/$1";
$route['backoffice/view/(:any)'] = "backoffice/index/0/$1";
$route['(\w{2})/backoffice/view/(:any)'] = "backoffice/index/0/$2";
$route['backoffice/view/(:any)/(:num)'] = "backoffice/index/$2/$1";
$route['(\w{2})/backoffice/view/(:any)/(:num)'] = "backoffice/index/$3/$2";
$route['(:any)/(:any)_(:num)'] = "backoffice/viewProduct/$1/$3";
$route['(\w{2})/(:any)/(:any)_(:num)'] = "backoffice/viewProduct/$2/$4";
$route['backoffice/changeOrderStatus'] = "backoffice/orders/changeOrdersOrderStatus";*/


$route['administrator~shappinvest/connexion'] = 'administrator~shappinvest/Auth/connexion';
$route['administrator~shappinvest'] = 'administrator~shappinvest/Principal/index';
$route['administrator~shappinvest/deconnexion'] = 'administrator~shappinvest/Auth/deconnexion';

///ROUTES MLM
$route['default_controller'] = 'pages/home';
$route["(fr|en)"] = "{$route['default_controller']}/$1";

///FRONTE ROUTE
$route['(fr|en)/registration/(:any)'] = 'pages/inscription/$1';
$route['registration/(:any)'] = 'pages/inscription/en';

$route['(fr|en)/registration'] = 'pages/inscription/$1';
$route['registration'] = 'pages/inscription/en';

$route['(fr|en)/connexion'] = 'pages/connexion/$1';
$route['connexion'] = 'pages/connexion/en';



///BACKOFFICE ROUTE
 
$route['(fr|en)/backoffice'] = 'backoffice/dashboard/index/$1';
$route['backoffice'] = 'backoffice/dashboard/index/en';

$route['(fr|en)/backoffice/logout'] = 'backoffice/membre/deconnexion/$1';
$route['backoffice/logout'] = 'backoffice/membre/deconnexion/en';

$route['(fr|en)/backoffice/my-info'] = 'backoffice/membre/modifier_profil/$1';
$route['backoffice/my-info'] = 'backoffice/membre/modifier_profil/en';

$route['(fr|en)/backoffice/my-profile'] = 'backoffice/membre/profil/$1';
$route['backoffice/my-profile'] = 'backoffice/membre/profil/en';

$route["(fr|en)/backoffice/my-network"] = 'backoffice/dashboard/mon_reseau/$1';
$route["backoffice/my-network"] = 'backoffice/dashboard/mon_reseau/en';

$route["(fr|en)/backoffice/matrix/(:num)"] = 'backoffice/dashboard/matrice/$1/$2';
$route["backoffice/matrix/(:num)"] = 'backoffice/dashboard/matrice/en/$1';

$route["(fr|en)/backoffice/my-operation"] = 'backoffice/dashboard/operation_financiere/$1';
$route["backoffice/my-operation"] = 'backoffice/dashboard/operation_financiere/en';

$route["(fr|en)/backoffice/dataOperations"] = 'backoffice/dashboard/dataOperations/$1';



$route["(fr|en)/backoffice/internal-transfer"] = 'backoffice/dashboard/transferts_interne/$1';
$route["backoffice/internal-transfer"] = 'backoffice/dashboard/transferts_interne/en';

$route["(fr|en)/backoffice/subscription"] = 'backoffice/dashboard/subscription/$1';
$route["backoffice/subscription"] = 'backoffice/dashboard/subscription';

$route["(fr|en)/backoffice/messagerie"] = 'backoffice/dashboard/messagerie/$1';
$route["backoffice/messagerie"] = 'backoffice/dashboard/messagerie';

$route["(fr|en)/backoffice/securite"] = 'backoffice/dashboard/securite/$1';
$route["backoffice/securite"] = 'backoffice/dashboard/securite';

$route["(fr|en)/backoffice/materiel_marketing"] = 'backoffice/dashboard/materiel_marketing/$1';
$route["backoffice/materiel_marketing"] = 'backoffice/dashboard/materiel_marketing';

$route["(fr|en)/backoffice/new-partner"] = 'backoffice/dashboard/nouveau_partenaire/$1';
$route["backoffice/new-partner"] = 'backoffice/dashboard/nouveau_partenaire/en';

$route["(fr|en)/backoffice/webinar"] = 'backoffice/dashboard/webinaire/$1';
$route["backoffice/webinar"] = 'backoffice/dashboard/webinaire/en';

$route["(fr|en)/backoffice/conferences"] = 'backoffice/dashboard/conferences/$1';
$route["backoffice/conferences"] = 'backoffice/dashboard/conferences/en';

$route["(fr|en)/backoffice/news"] = 'backoffice/dashboard/actualites/$1';
$route["backoffice/news"] = 'backoffice/dashboard/actualites/en';

$route["(fr|en)/backoffice/support_technique"] = 'backoffice/dashboard/support_technique/$1';
$route["backoffice/support_technique"] = 'backoffice/dashboard/support_technique';

$route["(fr|en)/backoffice/faq"] = 'backoffice/dashboard/faq/$1';
$route["backoffice/faq"] = 'backoffice/dashboard/faq/en';

$route["(fr|en)/backoffice/politique_confidentialite"] = 'backoffice/dashboard/politique_confidentialite/$1';
$route["backoffice/politique_confidentialite"] = 'backoffice/dashboard/politique_confidentialite';

$route["(fr|en)/backoffice/mention_legale"] = 'backoffice/dashboard/mention_legale/$1';
$route["backoffice/mention_legale"] = 'backoffice/dashboard/mention_legale';




///ADMIN ROUTE







$route['404_override'] = 'errors/error404';
$route['translate_uri_dashes'] = FALSE;

