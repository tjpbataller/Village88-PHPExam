<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* my routes */
$route['default_controller'] = 'tasks';
$route['tasks/show'] = "tasks/show";
$route['assignments'] = 'tasks/assignments';
$route['assignments/(:num)'] = 'tasks/assignments/$1';
/* default routes in CI */
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;