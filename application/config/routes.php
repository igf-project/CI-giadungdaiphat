<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] 						= 'admin/Home';
$route['admin/users'] 					= 'admin/Users';
$route['admin/users/(:num)'] 			= 'admin/Users/view/$1';
$route['admin/logout'] 					= 'admin/Users/logout';
$route['admin/slider'] 					= 'admin/Slider';


$route['trang-chu'] 				= 'Home';
$route['tim-kiem?(:any)'] 			= 'Search';
$route['gio-hang'] 					= 'Order';
$route['thanh-toan'] 				= 'Order/check_out';

$route['lien-he'] 					= 'Contact';
$route['lien-he/submit_contact'] 	= 'Contact/submit_contact';

$route['tin-tuc/(:any).html'] 		= 'Post/detail/$1';
$route['tin-tuc/(:any)'] 			= 'Post/blog/$1';
$route['tin-tuc/(:any)/(:num)'] 	= 'Post/blog/$1';

$route['san-pham/(:any)/(:num)'] 	= 'Product/blog/$1';
$route['san-pham/(:any)'] 			= 'Product/blog/$1';
$route['san-pham/(:any)/(:any)'] 	= 'Product/detail/$2';

