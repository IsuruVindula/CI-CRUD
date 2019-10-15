<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['user/edit/(:any)'] = 'user/edit/$1';
$route['user/update/(:any)'] = 'user/update/$1';
$route['user'] = 'user/index';
$route['default_controller'] = 'user';
$route['(:any)'] = 'user/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
