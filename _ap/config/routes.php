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

$route['page']							= 'site/pg_home';
//$route['page/berita']					= 'site/pg_berita/news/';

/* .::ROUTE PAGE BERITA::. */
$route['page/berita/(:num)']			= 'site/pg_berita/news/';
$route['page/berita']					= 'site/pg_berita/news/';

/* .::ROUTE DETAIL BERITA::. */
$route['page/detail/([a-z]+)/(:any)']	= 'site/pg_berita/view_berita/$1/$2';

/* .::KATEGORI BERITA::. */
$route['page/kategori/([a-z]+)']		= 'site/pg_berita/view_kategori_berita/';
$route['page/kategori/([a-z]+)/(:any)']	= 'site/pg_berita/view_kategori_berita/$1/$2';

/* .::route LOGIN::. */
$route['l0g1n']							= '4dmr00t/Pg_login';
$route['l0g1n/out']						= '4dmr00t/Pg_login/logout';

/* .::ADMIN PANEL::. */
$route['keuda/admin']					= '4dmr00t/Pg_admin/index';
$route['keuda/admin/artikel']					= '4dmr00t/Pg_admin/artikel';


$route['404_override'] 					= '404/not_found';

$route['default_controller'] 			= 'site/pg_home';
$route['translate_uri_dashes'] 			= FALSE;
