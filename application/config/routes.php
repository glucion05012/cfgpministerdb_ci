<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'ministercontroller/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'ministercontroller/login';
$route['logout'] = 'ministercontroller/logout';
$route['home'] = 'ministercontroller/home';

$route['forms/ordination'] = 'ministercontroller/ordination';

$route['ordination/create'] = 'ministercontroller/ordination_create';