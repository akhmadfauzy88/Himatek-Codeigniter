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

$route['default_controller'] = 'staticpagecontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Public
$route['about'] = 'staticpagecontroller/about';
$route['blog/(:any)'] = 'staticpagecontroller/blog/$1';

$route['login'] = 'encryptcontroller';
$route['regist'] = 'encryptcontroller/regist';
$route['login/user'] = 'encryptcontroller/user_regist';
$route['login/check'] = 'encryptcontroller/check';
$route['logout'] = 'encryptcontroller/logout';

$route['comment/store'] = 'commentcontroller/store';

//Auth

$route['posts'] = 'postscontroller';
$route['posts/view/(:any)'] = 'postscontroller/view/$1';
$route['posts/create'] = 'postscontroller/create';
$route['posts/store'] = 'postscontroller/upload';
$route['posts/delete/(:any)'] = 'postscontroller/destroy/$1';
$route['posts/edit/(:any)'] = 'postscontroller/edit/$1';
$route['posts/edit'] = 'postscontroller/update';

$route['categories'] = 'categorycontroller';
$route['categories/store'] = 'categorycontroller/store';
$route['categories/update'] = 'categorycontroller/update';
$route['categories/delete/(:any)'] = 'categorycontroller/delete/$1';