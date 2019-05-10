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
$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';
$route['register'] = 'AuthController/register';

$route['ujian'] = 'UjianController';
$route['ujian/create'] = 'UjianController/create';
$route['ujian/view/(:any)'] = 'UjianController/view/$1';
$route['ujian/edit/(:any)'] = 'UjianController/edit/$1';
$route['ujian/ikut'] = 'UjianController/ikut';
$route['ujian/mulai/(:any)'] = 'UjianController/mulai/$1';
$route['hasil'] = 'UjianController/hasil';
$route['hasil/lihat/(:any)'] = 'UjianController/lihatHasil/$1';

$route['ajaxKode/(:any)'] = 'UjianController/ajaxKode/$1';

$route['soal'] = 'SoalController';
$route['soal/create/(:any)'] = 'SoalController/create/$1';
$route['soal/view/(:any)'] = 'SoalController/view/$1';
$route['soal/edit/(:any)'] = 'SoalController/edit/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
