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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['about'] = 'home/about';
$route['contact'] = 'home/contact';
$route['blog'] = 'blog/index';
$route['blog/category/(:num)/(:any)'] = 'blog/category/$1/$2';
$route['blog/detail/(:num)'] = 'blog/detail/$1';
$route['blog/fetch'] = 'blog/fetchBlogs';
$route['register'] = 'login/register';
$route['product'] = 'product';
$route['product/detail/(:num)'] = 'product/detail/$1';
$route['checkout/(:num)'] = 'product/checkout/$1';
$route['account'] = 'home/account';
$route['history'] = 'home/history';
$route['profile'] = 'home/profile';
$route['admin/service/delete_service'] = 'admin/service/delete_service';
$route['admin/service/get_services_ajax'] = 'admin/service/get_services_ajax';
$route['edit_service/(:num)'] = 'admin/service/edit_service/$1';
$route['update_service'] = 'admin/service/update_service';
$route['service'] = 'home/service';
$route['service/(:num)/(:any)'] = 'home/service/$1/$2';
$route['service/(:num)'] = 'home/service/$1';
$route['service_details/(:num)'] = 'home/details/$1';

















$route['admin'] = 'admin/login';
$route['dashboard'] = 'admin/dashboard';
$route['customer'] = 'admin/customer';
$route['order'] = 'admin/customer/order';

$route['post'] = 'admin/post';
$route['add_post'] = 'admin/post/add_post';
$route['blogs'] = 'admin/post/blog';
$route['add_blog'] = 'admin/post/add_blog';
$route['blog_category'] = 'admin/post/blog_category';
$route['service_category'] = 'admin/service';
$route['add_service'] = 'admin/service/add_service';
$route['all_service'] = 'admin/service/list_services';




$route['logout'] = 'admin/login/logout';








// $route['update_subcategory/(:num)'] = 'admin/category/update_subcategory/$1';






$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
