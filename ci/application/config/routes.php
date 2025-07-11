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
$route['login'] = 'Main/login';
$route['register'] = 'Main/register';
$route['reset-password'] = 'Main/reset_password';
$route['profile'] = 'Main/profile';
$route['about'] = 'Main/about';
$route['history'] = 'Main/history';
$route['account'] = 'Main/account';
$route['institution'] = 'Main/institution';
$route['report/(:any)'] = 'Main/report/$1';

/*
| -------------------------------------------------------------------------
| AUTH ROUTING
| -------------------------------------------------------------------------
|
*/

$route['logout'] = 'Auth/logout';
$route['process-login'] = 'Auth/login';