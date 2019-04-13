<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/update'] = 'posts/update';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';

// (2)
$route['categories'] = 'categories/index';
// (1) when we hit this route, it'll go to (C) Categories/create (Action)
$route['categories/create'] = 'categories/create';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
