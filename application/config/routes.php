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
$route['default_controller'] = 'Website_home/index';

// admin pages
    $route['admin'] = "admin/Login/index";
    $route['admin/login'] = "admin/Login/login_fn";
    $route['admin/registration'] = "admin/Login/registration_fn";
    $route['admin/logout'] = "admin/Login/logout_fn";
    $route['admin/dashboard'] = "admin/Home/dashboard";
    $route['admin/gallery'] = "admin/Home/gallery";
    $route['admin/save_gallery'] = "admin/Home/save_galleryInfo";
    $route['admin/slider'] = "admin/Home/slider";
    $route['admin/save_slider'] = "admin/Home/save_sliderInfo";
    $route['admin/admin_users'] = "admin/Home/adminuserlist";
    $route['admin/update_adminusers'] = "admin/Home/update_adminuserInfo";
    $route['admin/save_adminusers'] = "admin/Home/save_adminuserInfo";
    $route['admin/users'] = "admin/Home/userlist";
    $route['admin/update_users'] = "admin/Home/update_userInfo";
    $route['admin/save_users'] = "admin/Home/save_userInfo";
    $route['admin/vehical_info'] = "admin/Home/vehical_entry";
    $route['admin/update_vehical'] = "admin/Home/update_vehicalInfo";
    $route['admin/save_vehical'] = "admin/Home/save_vehicalInfo";
    $route['admin/waste_schedule'] = "admin/Home/waste_collection_schedule";
    $route['admin/save_waste_schedule'] = "admin/Home/save_scheduleInfo";
    $route['admin/update_waste_schedule'] = "admin/Home/update_scheduleInfo";
    $route['admin/waste_detail'] = "admin/Home/waste_detail";
    $route['admin/save_waste_detail'] = "admin/Home/save_processingInfo";
    $route['admin/update_waste_detail'] = "admin/Home/update_processingInfo";
//  website pages 
    $route['Contact-us'] = "Website_home/contact_us";
    $route['Account-details'] = "Website_home/account_details";
    $route['Complain-save'] = "Website_home/complain_save";
    $route['Login'] = "Website_auth/index";
    $route['Registration'] = "Website_auth/registration";
    $route['Logout'] = "Website_auth/logout";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
