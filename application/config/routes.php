<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'ministercontroller/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'ministercontroller/login';
$route['logout'] = 'ministercontroller/logout';
$route['settings'] = 'ministercontroller/settings';
$route['home'] = 'ministercontroller/home';

$route['forms/ordination'] = 'ministercontroller/ordination';

$route['forms/ordination/recommendation/(:num)'] = 'ministercontroller/recommendation/$1';

$route['ordination/create'] = 'ministercontroller/ordination_create';
$route['ordination/update'] = 'ministercontroller/ordination_update';