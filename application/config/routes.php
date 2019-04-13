<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/update'] = 'posts/update';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';


$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
// when click a category link on ciblog/categories, it takes you to e.g categories/posts/2
// i.e it takes you to categories/posts/$id (where $id is the `post`.`id`
// here's the fix for this issue:
$route['categories/posts/(:any)'] = 'categories/posts/$1'; // $1 is basically a placeholder

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
