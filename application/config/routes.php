<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
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

$route['default_controller'] = 'pages/accueil';

/*
 * Backoffice Controllers Routes
*/

$route['backoffice'] = 'backoffice/dashboard';
$route['inscription'] = 'backoffice/membre/inscription';
$route['mot-de-passe-oublie'] = 'backoffice/membre/mdp_oublie';
//$route['cafo-vita'] = 'backoffice/membre/inscription';
$route['inscription-offline'] = 'backoffice/membreoffline/inscription';
$route['inscription-agence'] = 'backoffice/membreoffline/inscription_agence';
$route['inscription-freelance'] = 'backoffice/membreoffline/inscription_freelance';
$route['inscription/paiement-messenka'] = 'backoffice/membre/paiement_messenka';
$route['inscription-offline/paiement'] = 'backoffice/membreoffline/paiement';
$route['inscription-agence/paiement-agence'] = 'backoffice/membreoffline/paiement_agence';
$route['inscription-freelance/paiement-freelance'] = 'backoffice/membreoffline/paiement_freelance';
$route['inscription-effective'] = 'backoffice/membre/inscription_effective';
$route['inscription-effective/:any'] = 'backoffice/membre/inscription_effective';
$route['inscription-effective-offline'] = 'backoffice/membreoffline/inscription_effective';
$route['inscription-effective-agence'] = 'backoffice/membreoffline/inscription_effective';
$route['inscription-effective-freelance'] = 'backoffice/membreoffline/inscription_effective';
$route['inscription/:any'] = 'backoffice/membre/inscription';
$route['confirmation'] = 'backoffice/membre/confirmation_inscription';
$route['confirmation-agence'] = 'backoffice/membreoffline/confirmation_inscription_agence';
$route['confirmation-freelance'] = 'backoffice/membreoffline/confirmation_inscription_freelance';
$route['confirmation-offline'] = 'backoffice/membreoffline/confirmation_inscription';
$route['paiement-attente'] = 'backoffice/membre/paiement_attente';
$route['paiement/ipn'] = 'backoffice/membre/ipn';
$route['backoffice/commission'] = 'backoffice/dashboard/mes_commissions';
$route['backoffice/mon-reseau'] = 'backoffice/dashboard/mon_reseau';
$route['backoffice/mon-arbre'] = 'backoffice/dashboard/mon_arbre';
$route['backoffice/mon-parrain'] = 'backoffice/dashboard/mon_parrain';
$route['backoffice/profil'] = 'backoffice/membre/profil';
$route['backoffice/modifier-profil'] = 'backoffice/membre/modifier_profil';
$route['backoffice/modifier-mot-de-passe'] = 'backoffice/membre/modifier_mdp';


/*
 * Frontoffice Controllers Routes
 */

$route['accueil'] = 'pages/accueil';
$route['notre-histoire'] = 'pages/histoire';
/*$route['notre-feuille-de-route'] = 'pages/feuille_de_route';*/
$route['nos-marques'] = 'pages/marques';
$route['nos-partenaires'] = 'pages/partenaires';
$route['nos-services'] = 'pages/nos_service';
$route['foire-aux-questions'] = 'pages/faq';
$route['blog'] = 'pages/blog';
$route['temoignages'] = 'pages/Les_temoignages';
$route['plan-de-remuneration'] = 'pages/planDeRemuneration';
$route['nos-services'] = 'pages/service';
$route['contact'] = 'pages/contact';



/*
 * Admin Controllers Routes
*/

$route['administrator~gie2018'] = 'administrator~gie2018/principal';
$route['administrator~gie2018/connexion'] = 'administrator~gie2018/auth/connexion';
$route['administrator~gie2018/deconnexion'] = 'administrator~gie2018/auth/deconnexion';





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





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;