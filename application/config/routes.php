<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Homepage
$route['about'] = 'Welcome/about';

// Admin
// Dashboard
$route['admin/dashboard'] = 'Dashboard';

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
$route['admin/scholarship/delete/(:num)'] = 'Scholarship/delete/$1';
$route['admin/scholarship/get_student_details'] = 'Scholarship/get_student_details';

// Scholarship Programs
$route['admin/scholarshipprogram'] = 'ScholarshipProgram';
$route['admin/scholarshipprogram/create'] = 'ScholarshipProgram/create';
$route['admin/scholarshipprogram/store'] = 'ScholarshipProgram/store';
$route['admin/scholarshipprogram/edit/(:num)'] = 'ScholarshipProgram/edit/$1';
$route['admin/scholarshipprogram/update/(:num)'] = 'ScholarshipProgram/update/$1';
$route['admin/scholarshipprogram/view/(:num)'] = 'ScholarshipProgram/view/$1';
$route['admin/scholarshipprogram/delete/(:num)'] = 'ScholarshipProgram/delete/$1';

// Scholarship Programs
$route['admin/scholarships/programs'] = 'ScholarshipPrograms';

// Guidance
$route['admin/Guidance'] = 'Guidances';
$route['admin/Guidance/create'] = 'Guidances/create';
$route['admin/scholar/view'] = 'Files/view';

// Courses
$route['admin/courses'] = 'Course';
$route['admin/course/create'] = 'Course/create';
$route['admin/course/store'] = 'Course/store';
$route['admin/course/edit/(:num)'] = 'Course/edit/$1';
$route['admin/course/update/(:num)'] = 'Course/update/$1';
$route['admin/course/view/(:num)'] = 'Course/view/$1';
$route['admin/course/delete/(:num)'] = 'Course/delete/$1';

// Users (Admin)
$route['admin/users'] = 'Users';
$route['admin/users/create'] = 'Users/create';
$route['admin/users/store'] = 'Users/createUser';
$route['admin/users/edit/(:num)'] = 'Users/edit/$1';
$route['admin/users/update/(:num)'] = 'Users/update/$1';
$route['admin/users/view/(:num)'] = 'Users/view/$1';
$route['admin/users/delete/(:num)'] = 'Users/delete/$1';

// Alumni (Admin)
$route['admin/alumni'] = 'Alumni';
$route['admin/alumni/create'] = 'Alumni/create';
$route['admin/alumni/store'] = 'Alumni/store';
$route['admin/alumni/edit/(:num)'] = 'Alumni/edit/$1';
$route['admin/alumni/update/(:num)'] = 'Alumni/update/$1';
$route['admin/alumni/view/(:num)'] = 'Alumni/view/$1';
$route['admin/alumni/delete/(:num)'] = 'Alumni/delete/$1';

// Clinic Patients
$route['admin/clinic-patients'] = 'ClinicPatients';
$route['admin/clinic-patients/create'] = 'ClinicPatients/create';
$route['admin/clinic-patients/store'] = 'ClinicPatients/store';
$route['admin/clinic-patients/edit/(:num)'] = 'ClinicPatients/edit/$1';
$route['admin/clinic-patients/update/(:num)'] = 'ClinicPatients/update/$1';
$route['admin/clinic-patients/view/(:num)'] = 'ClinicPatients/view/$1';
$route['admin/clinic-patients/delete/(:num)'] = 'ClinicPatients/delete/$1';
// -------------------------------------------------------------
// End Admin


// Scholar Office
$route['scholar/dashboard'] = 'ScholarDashboard';
$route['scholar/scholarships'] = 'Scholarship';
$route['scholar/scholarship/create'] = 'Scholarship/create';
$route['scholar/scholarship/store'] = 'Scholarship/store';
$route['scholar/scholarship/edit/(:num)'] = 'Scholarship/edit/$1';
$route['scholar/scholarship/update/(:num)'] = 'Scholarship/update/$1';
$route['scholar/scholarship/view/(:num)'] = 'Scholarship/view/$1';
$route['scholar/scholarship/get_student_details'] = 'Scholarship/get_student_details';

// Scholar Profile
$route['scholar/profile'] = 'Profile';
$route['clinic/profile'] = 'Profile';
$route['scholar/scholarshipprogram'] = 'ScholarshipProgram';
$route['scholar/scholarshipprogram/create'] = 'ScholarshipProgram/create';
$route['scholar/scholarshipprogram/store'] = 'ScholarshipProgram/store';
$route['scholar/scholarshipprogram/edit/(:num)'] = 'ScholarshipProgram/edit/$1';
$route['scholar/scholarshipprogram/update/(:num)'] = 'ScholarshipProgram/update/$1';
$route['scholar/scholarshipprogram/view/(:num)'] = 'ScholarshipProgram/view/$1';
$route['scholar/scholarshipprogram/delete/(:num)'] = 'ScholarshipProgram/delete/$1';



$route['clinic/dashboard'] = 'ClinicDashboard';
$route['clinic/clinic-patients'] = 'ClinicPatients';
$route['clinic/clinic-patients/create'] = 'ClinicPatients/create';
$route['clinic/clinic-patients/store'] = 'ClinicPatients/store';
$route['clinic/clinic-patients/edit/(:num)'] = 'ClinicPatients/edit/$1';
$route['clinic/clinic-patients/update/(:num)'] = 'ClinicPatients/update/$1';
$route['clinic/clinic-patients/view/(:num)'] = 'ClinicPatients/view/$1';
$route['clinic/clinic-patients/delete/(:num)'] = 'ClinicPatients/delete/$1';
















// UserProfile
$route['user/profile'] = 'UserProfile';
// Admin/Generic Profile
$route['profile'] = 'Profile';

// Authentication
$route['login'] = 'Login';
$route['register'] = 'Register';

