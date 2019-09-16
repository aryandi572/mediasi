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
$route['default_controller'] = 'MedController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//-------------------------------------------------------------route user view
$route['beranda'] = 'MedController/beranda';
$route['beranda/(:any)'] = 'MedController/beranda/$1';
$route['kategori/(:any)'] = 'MedController/kategori/$1';
$route['cari'] = 'MedController/cari';
$route['tentang'] = 'MedController/tentang';
$route['kontak'] = 'MedController/kontak';
$route['artikel/(:any)'] = 'MedController/artikel/$1';
$route['tag/(:any)'] = 'MedController/tag/$1';
//---------------------------------------------------------------route administrator
$route['login'] = 'MedController/login';
$route['page/signout'] = 'MedController/page/signout';
$route['page/profile/(:any)'] = 'MedController/page/profile/$1';
$route['page/pengaturan/(:any)/(:any)'] = 'MedController/page/pengaturan/$1/$2';
$route['page/artikel/(:any)/(:any)'] = 'MedController/page/artikel/$1/$2';
$route['page/artikel/(:any)/(:any)/(:any)'] = 'MedController/page/artikel/$1/$2/$3';
$route['page/utama/(:any)'] = 'MedController/page/utama/$1';
$route['update_post/(:any)/(:any)/(:any)'] = 'MedController/update_post/$1/$2/$3';
$route['del_post/(:any)/(:any)/(:any)'] = 'MedController/del_post/$1/$2/$3';

//------form open
$route['register'] = 'MedController/register';
$route['proses_login'] = 'MedController/proses_login';
$route['set_password/(:any)'] = 'MedController/set_password/$1';
$route['save_post/(:any)'] = 'MedController/save_post/$1';
$route['search_post/(:any)/(:any)'] = 'MedController/search_post/$1/$2';

$route['sitemap\.xml'] = "MedController/sitemap";
