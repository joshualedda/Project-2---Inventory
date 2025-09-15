#
# TABLE STRUCTURE FOR: scholarship_edu_bg
#

DROP TABLE IF EXISTS `scholarship_edu_bg`;

CREATE TABLE `scholarship_edu_bg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scholarship_id` int(11) NOT NULL COMMENT 'Reference to scholarships table',
  `education_level` enum('Pre-School','Elementary','Junior High School','Senior High School','College') NOT NULL COMMENT 'Level of education',
  `school_name` varchar(200) NOT NULL COMMENT 'Name of the school attended',
  `year_graduated` varchar(10) DEFAULT NULL COMMENT 'Year of graduation',
  `honors_received` varchar(200) DEFAULT NULL COMMENT 'Honors or awards received',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `scholarship_id` (`scholarship_id`),
  KEY `education_level` (`education_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='Education background for scholarship applications';

INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (1, 1, 'Elementary', 'San Jose Elementary School', '1996', 'Valedictorian', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (2, 1, 'Junior High School', 'San Jose National High School', '2000', 'With Honors', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (3, 1, 'Senior High School', 'San Jose Senior High School', '2002', 'With High Honors', '2025-09-15 13:24:36', '2025-09-15 13:24:36');


#
# TABLE STRUCTURE FOR: scholarship_siblings
#

DROP TABLE IF EXISTS `scholarship_siblings`;

CREATE TABLE `scholarship_siblings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scholarship_id` int(11) NOT NULL COMMENT 'Reference to scholarships table',
  `sibling_name` varchar(150) NOT NULL COMMENT 'Name of the sibling',
  `sibling_age` int(3) DEFAULT NULL COMMENT 'Age of the sibling',
  `sibling_course` varchar(100) DEFAULT NULL COMMENT 'Course or year level of the sibling',
  `sibling_school` varchar(200) DEFAULT NULL COMMENT 'School where sibling is enrolled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `scholarship_id` (`scholarship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='Siblings information for scholarship applications';

INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (1, 1, 'Maria Santos', 25, 'BSIT', 'SLUC', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (2, 1, 'Juan Diaz', 22, 'BSBA', 'SLUC', '2025-09-15 13:24:36', '2025-09-15 13:24:36');


#
# TABLE STRUCTURE FOR: scholarships
#

DROP TABLE IF EXISTS `scholarships`;

CREATE TABLE `scholarships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL COMMENT 'Student ID from students table',
  `scholarship_id` mediumint(9) DEFAULT NULL COMMENT 'Data from the scholars table',
  `application_type` enum('New','Renewal') NOT NULL DEFAULT 'New' COMMENT 'Type of application - New or Renewal',
  `semester` int(11) NOT NULL COMMENT '1: first sem, 2: sec sem',
  `contact_no` int(11) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL COMMENT 'Male and Female',
  `facebook` varchar(50) NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `father_address` varchar(50) NOT NULL,
  `father_contact` varchar(50) NOT NULL,
  `father_occupation` varchar(50) NOT NULL,
  `father_employment` varchar(50) NOT NULL,
  `father_education` varchar(50) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `mother_address` varchar(50) NOT NULL,
  `mother_contact` varchar(50) NOT NULL,
  `mother_occupation` varchar(50) NOT NULL,
  `mother_employment` varchar(50) NOT NULL,
  `mother_education` varchar(50) NOT NULL,
  `scholar_reason` int(11) NOT NULL,
  `application_status` enum('Pending','Under Review','Approved','Rejected','On Hold') DEFAULT 'Pending',
  `approval_date` date DEFAULT NULL COMMENT 'Date when application was approved',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `application_status` (`application_status`),
  KEY `application_type` (`application_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='Scholarship applications table with comprehensive form data';

INSERT INTO `scholarships` (`id`, `student_id`, `scholarship_id`, `application_type`, `semester`, `contact_no`, `address`, `email`, `birth_date`, `gender`, `facebook`, `birth_place`, `religion`, `father_name`, `father_address`, `father_contact`, `father_occupation`, `father_employment`, `father_education`, `mother_name`, `mother_address`, `mother_contact`, `mother_occupation`, `mother_employment`, `mother_education`, `scholar_reason`, `application_status`, `approval_date`, `status`, `created_at`, `updated_at`) VALUES (1, 'Ea reiciendis vero e', 0, 'New', 0, NULL, '', '', '', 'Male', '', '', '', 'Pedro Diaz', '', '', '', '', '', 'Maria Diaz', '', '', '', '', '', 0, 'Pending', NULL, 0, '2025-09-15 13:24:36', '2025-09-15 13:24:36');


#
# TABLE STRUCTURE FOR: students
#

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `course` int(11) NOT NULL,
  `year_level` enum('1st Year','2nd Year','3rd Year','4th Year') NOT NULL,
  `section` varchar(20) DEFAULT NULL,
  `school_year` varchar(20) NOT NULL,
  `scholarship_type` int(11) NOT NULL,
  `office` int(11) NOT NULL,
  `guardian_name` varchar(150) DEFAULT NULL,
  `guardian_contact` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `admission_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_number` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `students` (`id`, `student_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender`, `course`, `year_level`, `section`, `school_year`, `scholarship_type`, `office`, `guardian_name`, `guardian_contact`, `status`, `admission_date`, `created_at`, `updated_at`) VALUES (1, 'Ea reiciendis vero e', 'Joshua', 'Veronica Haley', 'Diaz', '1984-02-05', 'Female', 2, '1st Year', 'Dolor non itaque vol', '2002', 2, 3, 'Joelle Foley', 'Voluptas nesciu', 0, '2007-05-30', '2025-09-14 15:15:49', '2025-09-15 11:08:50');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '0:user, 1:admin',
  `status` int(11) NOT NULL COMMENT '0:active, 1:inactive',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `status`, `created_at`, `updated_at`) VALUES (2, 'Joshua', 'Ledda', 'admin@gmail.com', '$2y$10$2oEc0ibUGFKqkRzN3gbzOu53ZXICFZgH3VtrvXYK4TCV3P9UlWtJm', 1, 0, '2025-09-08 11:05:36', NULL);


