#
# TABLE STRUCTURE FOR: students
#

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_number` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` enum('1st Year','2nd Year','3rd Year','4th Year') NOT NULL,
  `section` varchar(20) DEFAULT NULL,
  `school_year` varchar(20) NOT NULL,
  `scholarship_type` enum('None','Academic','Athletic','Financial Aid') DEFAULT 'None',
  `office` enum('Registrar','Guidance','Library') DEFAULT NULL,
  `guardian_name` varchar(150) DEFAULT NULL,
  `guardian_contact` varchar(15) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `admission_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_number` (`student_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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


