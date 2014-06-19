<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "welcome";
//$route['404_override'] = '';
$route['localite/(district|region|fivondronana|firaisana|fokotany)/save'] = 'localite/localite/save/$1';
$route['localite/(district|region|fivondronana|firaisana|fokotany)/add'] = 'localite/localite/add/$1';
$route['localite/(district|region|fivondronana|firaisana|fokotany)/list'] = 'localite/localite/listlocal/$1';
$route['fokotany/add/(karapokotany|andraikitra|birao)'] = 'fokotany/fokotany/add/$1';
$route['fokotany/add/olona'] = 'fokotany/fokotany/addFokonolona';
$route['fokotany/list/(karapokotany|andraikitra|birao|olona)'] = 'fokotany/fokotany/liste/$1';
$route['fokotany/edit/(karapokotany|andraikitra|olona|birao)/(:num)'] = 'fokotany/fokotany/edit/$1/$2';
$route['fokotany/delete/(karapokotany|andraikitra|olona|birao)/(:num)'] = 'fokotany/fokotany/delete/$1/$2';
$route['fokotany/ajax'] = 'fokotany/fokotany/listAjax';
$route['fokotany/birao/ajax'] = 'fokotany/fokotany/listBiraoAjax';
$route['fokotany/karapokotany/ajax/(:num)'] = 'fokotany/fokotany/listKarapokotanyByBiraoId/$1';

$route['admin/user/add'] = 'user/user/register/admin';
$route['user/load/login'] = 'user/user/loadLoginForm';
$route['user/(.+)$'] = 'user/user/$1';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['not_authorized'] = 'pages/not_authorized';

$route['admin'] = 'admin/admin/index';


/* End of file routes.php */
/* Location: ./application/config/routes.php */