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
 * Frontoffice Controllers Routes
 */

/*require_once( APPPATH .'helpers/myfonction_helper.php');
require BASEPATH.'core/Controller.php';

var_dump(getLanguage());die;*/

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



///ROUTES MLM ADMIN
$route['(fr|en)/admin/login'] = 'admin/auth/connexion/$1';
$route['admin/login'] = 'admin/auth/connexion/en';

$route['(fr|en)/admin'] = 'admin/principal/index/$1';
$route['admin'] = 'admin/principal/index/en';

$route['(fr|en)/admin/logout'] = 'admin/auth/deconnexion/$1';
$route['admin/logout'] = 'admin/auth/deconnexion/en';


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

$route["(fr|en)/backoffice/security"] = 'backoffice/dashboard/securite/$1';
$route["backoffice/security"] = 'backoffice/dashboard/securite/en';

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

$route["(fr|en)/backoffice/privacy-policy"] = 'backoffice/dashboard/politique_confidentialite/$1';
$route["backoffice/privacy-policy"] = 'backoffice/dashboard/politique_confidentialite/en';

$route["(fr|en)/backoffice/legal-notice"] = 'backoffice/dashboard/mention_legale/$1';
$route["backoffice/legal-notice"] = 'backoffice/dashboard/mention_legale/en';

$route['backoffice/filter']= 'backoffice/dashboard/filterTable/en';
$route['(fr|en)/backoffice/filter']= 'backoffice/dashboard/filterTable/$1';



$route['404_override'] = 'errors/error404';
$route['translate_uri_dashes'] = FALSE;

