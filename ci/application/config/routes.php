<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| MAIN ROUTING
| -------------------------------------------------------------------------
|
*/

$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| PAGE ROUTING
| -------------------------------------------------------------------------
|
*/

$route['welcome'] = 'Main/welcome';
$route['about'] = 'Main/about';


/*
| -------------------------------------------------------------------------
| AUTH ROUTING
| -------------------------------------------------------------------------
|
*/

$route['login'] = 'Auth/login';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['process-login'] = 'Auth/process_login';
$route['account'] = 'Auth/account';
$route['reset-password'] = 'Auth/reset_password';
$route['profile'] = 'Auth/profile';

/*
| -------------------------------------------------------------------------
| REPORT ROUTING
| -------------------------------------------------------------------------
|
*/

$route['institution'] = 'Report/institution';
$route['report/(:any)'] = 'Report/index/$1';
$route['report-detail/(:any)'] = 'Report/detail/$1';
$route['process-report'] = 'Report/process';
$route['history'] = 'Report/history';