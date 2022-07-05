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
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['index'] = 'user/index';
$route['partner'] = 'user/partner';
$route['driver'] = 'user/driver';
$route['faq'] = 'user/faq';
$route['terms_of_use'] = 'user/terms_of_use';
$route['privacy_policy'] = 'user/privacy_policy';
$route['corporate'] = 'user/corporate';
$route['shipper'] = 'user/shipper';

//admin and user login pages
$route['register'] = 'user/register';
$route['verify'] = 'user/verify';
$route['login'] = 'user/login';
$route['dashboard'] = 'user/dashboard';
$route['booking'] = 'user/booking';
$route['add_booking'] = 'user/add_booking';
$route['profile'] = 'user/profile';
$route['admin'] = 'admin/admin';
$route['create'] = 'admin/create';
$route['all_users'] = 'admin/all_users';
$route['add_location'] = 'admin/location';
$route['all_booking'] = 'admin/all_booking';
$route['create_invoice'] = 'admin/create_invoice';
$route['invoice'] = 'admin/invoice';
$route['paid'] = 'admin/paid';
$route['all_transactions'] = 'admin/all_transactions';
$route['transactions'] = 'user/transactions';


$route['edit_user'] = 'admin/edit_user';
$route['forgot_password'] = 'user/forgot_password';
$route['reset_password'] = 'user/reset_password';
$route['change_password'] = 'user/change_password';
$route['reset_user'] = 'admin/reset_user';






