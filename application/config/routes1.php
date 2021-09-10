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
$route['default_controller'] 				= 'web';

// Admin Routes //
$route['admin/login'] 						= 'login/index';
$route['admin/masters/area']				= 'masters/area';
$route['admin/masters/bloodgroup']			= 'masters/bloodgroup';
$route['admin/masters/business-category']	= 'masters/business_category';
$route['admin/masters/dharmik-knowledge'] 	= 'masters/dharmikknowledge';
$route['admin/masters/donation-category']	= 'masters/donationcategory';
$route['admin/masters/education']			= 'masters/education';
$route['admin/masters/marital-status'] 		= 'masters/maritalstatus';
$route['admin/masters/occupation']			= 'masters/occupation';
$route['admin/masters/relation']			= 'masters/relation';
$route['admin/masters/surname']		  		= 'masters/surname';
$route['admin/masters/sports'] 				= 'masters/sports';
$route['admin/masters/village']				= 'masters/village';

$route['Api/business/category']				= 'Api/business/category';
$route['Api/business/category/(:num)']		= 'Api/business/category/$1';

$route['admin/donor/new']					= 'masters/donor_new';
$route['admin/donor/new/(:any)']			= 'masters/donor_new/$1';
$route['admin/donor/list']					= 'masters/donor_list';

$route['admin/bulkemail/new']				= 'masters/bulkemail_new';
$route['admin/bulkemail/list']				= 'masters/bulkemail_list';

$route['admin/marannondh/add']					= 'masters/maran_nondh_new';
$route['admin/marannondh/new/(:any)']			= 'masters/maran_nondh_new/$1';
$route['admin/marannondh/list']					= 'masters/maran_nondh_list';

$route['admin/blog/new']					= 'masters/blog_new';
$route['admin/blog/new/(:any)']				= 'masters/blog_new/$1';
$route['admin/blog/list']					= 'masters/blog_list';
$route['admin/blog/list/(:any)']			= 'masters/blog_list/$1';

$route['admin/gallery/new']					= 'masters/gallery_new';
$route['admin/gallery/new/(:any)']			= 'masters/gallery_new/$1';
$route['admin/gallery/list']				= 'masters/gallery_list';

$route['admin/latest/new']					= 'masters/latest_new';
$route['admin/latest/list']					= 'masters/latest_list';

$route['admin/family/list']					= 'family/viewlist';
$route['admin/family/member']				= 'family/list';

$route['admin/latest/new']					= 'masters/latest_new';
$route['admin/latest/new/(:any)']			= 'masters/latest_new/$1';
$route['admin/latest/list']					= 'masters/latest_list/$1';

$route['admin/job/list/(:any)']				= 'job/listing/$1';
$route['admin/job/add']						= 'job/edit';
$route['admin/job/edit/(:num)']				= 'job/edit/$1';

// $route['admin/b2b']							= 'b2b/listing';
$route['admin/b2b/list/(:any)']				= 'b2b/listing/$1';
$route['admin/b2b/edit/(:num)']				= 'b2b/edit/$1';
$route['admin/b2b/add']						= 'b2b/edit/$1';

$route['admin/family/new']					= 'family/new';
$route['admin/family/edit/(:num)']			= 'family/edit/$1';
$route['admin/family/head-list']			= 'admin/headlist';

$route['admin/family/new-member']			= 'family/newmember';
$route['admin/family/edit-member/(:num)']	= 'family/editmember/$1';
$route['admin/family/member-list']			= 'admin/memberList';
// Front Routes //

$route['history']							= 'web/history';
$route['president-message']					= 'web/president_message';
$route['committee']							= 'web/committee';
$route['depa-map']							= 'web/deepamap';
$route['family-tree']						= 'web/familytree';
$route['jovar']								= 'web/jovar';
$route['places-to-visit']					= 'web/placestovisit';
$route['sports-cricket']					= 'web/sportscricket';
$route['sports-vollyball']					= 'web/sportsvollyball';
$route['sports-basketball']					= 'web/sportsbasketball';
$route['sports-carrom']						= 'web/sportscarrom';
$route['sports-table-tennis']				= 'web/sportstabletennis';
$route['sports-chess']						= 'web/sportschess';
$route['general']							= 'web/general';
$route['education']							= 'web/education';
$route['sports']							= 'web/sports';
$route['medical']							= 'web/medical';
$route['religions']							= 'web/religions';
$route['regional']							= 'web/regional';
$route['aathkotisangh']						= 'web/aathkotisangh';
$route['seniorcitizen']						= 'web/seniorcitizen';
$route['depayuvak']							= 'web/depayuvak';
$route['gunjanmandal']						= 'web/gunjanmandal';
$route['donate']							= 'web/donate';
$route['ongoing']							= 'web/ongoing';
$route['others']							= 'web/others';
$route['blog']								= 'web/blog';
$route['blog/add']							= 'web/newblog';
$route['blog/detail/(:any)']				= 'web/blogdetail/$1';
$route['b2b']								= 'web/b2b';
$route['b2b/detail/(:num)']					= 'web/b2bdetail/$1';
$route['business/add']						= 'web/newbusiness';

$route['jobs']								= 'web/job';
$route['job/add']							= 'web/newjob';
$route['job/detail/(:any)']					= 'web/jobdetail/$1';

$route['news-and-event']					= 'web/newsandevent';
$route['newsevents/detail/(:any)']			= 'web/newseventsdetail/$1';

$route['gallery']							= 'web/gallery';
$route['gallery/detail/(:any)']				= 'web/gallerydetail/$1';
$route['contact-us']						= 'web/contactus';
$route['register']							= 'web/register';
$route['forgot-password']					= 'web/forgotpassword';
$route['alternative-login']					= 'web/alternativelogin';

$route['ads']								= 'web/ads';
$route['family/(:any)']						= 'web/family/$1';
$route['family/(:any)/(:any)']				= 'web/family/$1/$2';
$route['business/(:any)']					= 'web/business/$1';
$route['business/add/(:any)']				= 'business/add/$1';
$route['business/edit/(:any)']				= 'business/edit/$1';

$route['blood-donation-camp']				= 'web/blood_donation_camp';
$route['matrimonial']						= 'web/matrimonial';
$route['matrimonial/detail/(:any)']			= 'web/matrimonialdetail/$1';
$route['directory']							= 'web/directory';
$route['directory_1']						= 'web/directory_1';
$route['search']							= 'web/search';

$route['donations/(:any)']					= 'web/donations/$1';
$route['admin/change-password']				= 'web/changepassword';
$route['admin/export-data']					= 'admin/exportdata';

//$route['admin/maran-nondh']					= 'admin/marannondh';


$route['404_override'] 						= '';
$route['translate_uri_dashes'] 				= FALSE;