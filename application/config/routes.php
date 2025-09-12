<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Homepage
$route['about'] = 'Welcome/about';

// Admin
//Students
$route['admin/students'] = 'Student';
$route['admin/student/create'] = 'Student/create';
$route['admin/student/edit'] = 'Student/edit';
$route['admin/student/view'] = 'Student/view';

// Scholarship
$route['admin/scholarships'] = 'Scholarship';
$route['admin/scholar/create'] = 'Scholarship/create';
$route['admin/scholar/view'] = 'Files/view';

// Guidance
$route['admin/Guidance'] = 'Guidances';
$route['admin/Guidance/create'] = 'Guidances/create';
$route['admin/scholar/view'] = 'Files/view';

























//Activity Log
$route['admin/activitylog'] = 'ActivityLog';


// Users: Head and Employees
// Dashboard
$route['user/dashboard'] = 'UserDashboard';

//Departments
$route['user/departments'] = 'UserDepartment';
$route['user/department/create'] = 'UserDepartment/create';
$route['user/department/edit'] = 'UserDepartment/edit';
$route['user/department/view'] = 'UserDepartment/view';

// Files
$route['user/files'] = 'UserFiles';
$route['user/files/create'] = 'UserFiles/create';
$route['user/files/edit'] = 'UserFiles/edit';
$route['user/files/view'] = 'UserFiles/view';

// UserProfile
$route['user/profile'] = 'UserProfile';

//UserFiles
$route['user/myfile'] = 'MyFilesUser';






// Authentication
$route['login'] = 'Login';
$route['register'] = 'Register';

// Researchers Dashboard
$route['Dashboard'] = 'Dashboard';
