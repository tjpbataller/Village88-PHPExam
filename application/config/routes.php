<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* my routes */
/* set default controller to tasks */
$route['default_controller'] = 'tasks';
/* route for filtering results */
$route['filter'] = 'tasks/filter';
/* set show url to tasks controller method show*/
$route['show'] = "tasks/show";
/* set assignment url to tasks controller method assignments */
$route['assignments'] = 'tasks/assignments';
/* set assignments/(:num) url to tasks controller method assignments which accepts 1 parameter */
$route['assignments/(:num)'] = 'tasks/assignments/$1';
/* default routes in CI */
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;