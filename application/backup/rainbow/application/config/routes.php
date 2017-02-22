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
$route['default_controller'] = 'index/view';

$route['firm_reg'] = 'index/firm_reg';

$route['firm_login'] = 'index/firm_login';

$route['login'] = 'index/login';

$route['logout'] = 'index/logout';

$route['firm_list'] = 'index/firm_list';

$route['service_managment'] = 'index/service_managment';

$route['service'] = 'index/service';

$route['reg'] = 'index/reg';

$route['service_list'] = 'index/service_list';

$route['reservate'] = 'index/reservate';

$route['firm_info'] = 'index/firm_info';

$route['member_info'] = 'index/member_info';

$route['reservatelist'] = 'index/reservatelist';

$route['reservation'] = 'index/reservation';

$route['reservatelist_firm'] = 'index/reservatelist_firm';

$route['reservation_firm'] = 'index/reservation_firm';

$route['score'] = 'index/score';

$route['score_firm'] = 'index/score_firm';

$route['score_list'] = 'index/score_list';

$route['ask'] = 'index/ask';

$route['ask_list'] = 'index/ask_list';

$route['fav'] = 'index/fav';

$route['to_pay'] = 'index/to_pay';

$route['firm_about'] = 'index/firm_about';

$route['firm_photo'] = 'index/firm_photo';

$route['phone_check'] = 'index/phone_check';

$route['about'] = 'index/about';

$route['wallet'] = 'index/wallet';

$route['myshare'] = 'index/myshare';

$route['forget'] = 'index/forget';

$route['firm_forget'] = 'index/firm_forget';

$route['provision'] = 'index/provision';

$route['about_photo'] = 'index/about_photo';

$route['firm_service_time'] = 'index/firm_service_time';

$route['service_search'] = 'index/service_search';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
