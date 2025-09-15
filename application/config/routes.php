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
$route['admin/student/store'] = 'Student/store';
$route['admin/student/edit/(:num)'] = 'Student/edit/$1';
$route['admin/student/update/(:num)'] = 'Student/update/$1';
$route['admin/student/view/(:num)'] = 'Student/view/$1';

// Scholarship
$route['admin/scholarships'] = 'Scholarship';
$route['admin/scholarship/create'] = 'Scholarship/create';
$route['admin/scholarship/store'] = 'Scholarship/store';
$route['admin/scholarship/edit/(:num)'] = 'Scholarship/edit/$1';
$route['admin/scholarship/update/(:num)'] = 'Scholarship/update/$1';
$route['admin/scholarship/view/(:num)'] = 'Scholarship/view/$1';
$route['admin/scholarship/get_student_details'] = 'Scholarship/get_student_details';

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
