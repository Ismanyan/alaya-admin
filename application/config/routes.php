<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    DEFAULT URL
*/ 
$route['default_controller'] = 'Controller';
$route['statistic'] = 'Controller/statistic';
$route['assets/(:any)'] = 'assets/$1';
$route['404_override'] = 'controller/page_not_found';
$route['translate_uri_dashes'] = TRUE;

/*
    CUTOM URL
    =========================================
    (:num) is used to determine the relevant segment in the form of numbers
    (:any) is used to determine the relevant segments in all characters
*/ 
// AUTH CONTROLLER
$route['login'] = 'AuthController/login';
$route['login/check'] = 'AuthController/check_login';
$route['pin'] = 'AuthController/pin';
$route['pin/check/(:any)'] = 'AuthController/pin_check/$1';
$route['logout'] = 'Controller/logout';

// PROFILE CONTROLLER
$route['profile'] = 'ProfileController/index';
$route['profile/get/(:num)'] = 'ProfileController/getProfile/$1';

// TREATMENT CONTROLLER
$route['treatment'] = 'TreatmentController/index';
$route['treatment/get/all/(:num)'] = 'TreatmentController/getTreatmentAll/$1';
$route['treatment/history/detail/(:num)'] = 'TreatmentController/treatmentHistoryDetail/$1';
$route['treatment/get/history/detail/(:num)'] = 'TreatmentController/getTreatmentHistoryDetail/$1';

// ABSENT CONTROLLER
$route['absent'] = 'AbsentController/index';
$route['absent/get/all/(:num)'] = 'AbsentController/getAbsentAll/$1';
$route['absent/history/detail/(:num)'] = 'AbsentController/AbsentHistoryDetail/$1';
$route['absent/get/history/detail/(:num)'] = 'AbsentController/getAbsentHistoryDetail/$1';