#
# TABLE STRUCTURE FOR: clinic_patients
#

DROP TABLE IF EXISTS `clinic_patients`;

CREATE TABLE `clinic_patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `temperature` int(11) NOT NULL,
  `blood_pressure` varchar(50) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `weight` int(11) NOT NULL,
  `pulse` varchar(50) NOT NULL,
  `respiration` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `clinic_patients` (`id`, `student_id`, `age`, `height`, `temperature`, `blood_pressure`, `sex`, `weight`, `pulse`, `respiration`) VALUES (1, 1, 10, 168, 34, '120/90', 'Female', 56, '34', '32');
INSERT INTO `clinic_patients` (`id`, `student_id`, `age`, `height`, `temperature`, `blood_pressure`, `sex`, `weight`, `pulse`, `respiration`) VALUES (2, 1, 48, 93, 77, 'Eum ut expedita quis', 'Male', 6, 'Molestiae voluptas a', 'Qui nemo non est a');


#
# TABLE STRUCTURE FOR: courses
#

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:active, 1:inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `courses` (`id`, `course`, `status`, `created_at`, `updated_at`) VALUES (1, 'Bachelor of science in information system', 0, '2025-09-18 11:37:07', '0000-00-00 00:00:00');
INSERT INTO `courses` (`id`, `course`, `status`, `created_at`, `updated_at`) VALUES (2, 'Bachelor of electro mechanical technology', 0, '2025-09-18 11:37:35', '0000-00-00 00:00:00');


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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COMMENT='Education background for scholarship applications';

INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (1, 1, 'Elementary', 'San Jose Elementary School', '1996', 'Valedictorian', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (2, 1, 'Junior High School', 'San Jose National High School', '2000', 'With Honors', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (3, 1, 'Senior High School', 'San Jose Senior High School', '2002', 'With High Honors', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (4, 2, 'Pre-School', 'Grady Newton', '1993', 'Consequatur reprehen', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (5, 2, 'Elementary', 'Zeph Decker', '2010', 'Assumenda suscipit m', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (6, 2, '', 'Sophia Hart', '1984', 'Aut dolore tempor co', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (7, 2, 'College', 'Sebastian Gentry', '2018', 'Sed obcaecati quo ma', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (8, 3, 'Pre-School', 'Reed Dixon', '2019', 'Voluptatum aliquid s', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (9, 3, 'Elementary', 'Barrett Boyd', '1972', 'Omnis qui pariatur ', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (10, 3, '', 'Ingrid Ellis', '1994', 'Quas provident occa', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (11, 3, 'College', 'Amelia Raymond', '1979', 'Iste minus ullamco i', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (12, 4, 'Pre-School', 'Ifeoma Clarke', '2016', 'Sed aut ipsam ut rep', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (13, 4, 'Elementary', 'Laurel Lewis', '1974', 'Perspiciatis saepe ', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (14, 4, '', 'Kyla Garcia', '2009', 'Voluptatem sed eos ', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (15, 4, 'College', 'Austin Lawrence', '2015', 'Ut aut nobis officia', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (16, 5, 'Pre-School', 'Ivana Kaufman', '1981', 'Magnam quis cupidita', '2025-09-18 10:26:38', '2025-09-18 10:26:38');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (17, 5, 'Elementary', 'Hiram Mcintosh', '1993', 'Molestiae sed corrup', '2025-09-18 10:26:38', '2025-09-18 10:26:38');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (18, 5, '', 'Lionel Ewing', '2008', 'Nemo quas aliquid as', '2025-09-18 10:26:38', '2025-09-18 10:26:38');
INSERT INTO `scholarship_edu_bg` (`id`, `scholarship_id`, `education_level`, `school_name`, `year_graduated`, `honors_received`, `created_at`, `updated_at`) VALUES (19, 5, 'College', 'Colt Clemons', '1990', 'Non eos soluta aliq', '2025-09-18 10:26:38', '2025-09-18 10:26:38');


#
# TABLE STRUCTURE FOR: scholarship_programs
#

DROP TABLE IF EXISTS `scholarship_programs`;

CREATE TABLE `scholarship_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scholarship_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `source` varchar(100) NOT NULL COMMENT 'Rview for the meantime',
  `type` int(11) NOT NULL COMMENT 'Rview for the meantime',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (3, 'Farmers Scholarship Program', 'Vero aut accusamus sit sed vel rem voluptas quo et molestiae dicta', 'Source 1', 1, '2025-09-18 13:37:16', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (4, 'Alumni Scholarship', 'Alumni Scholarship', 'Test', 6, '2025-09-18 13:37:27', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (5, 'President\'s List Scholarship Program', 'President\'s List Scholarship Program', 'Source 2', 2, '2025-09-18 13:37:42', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (6, 'Financial Assistance Scholarship', 'Financial Assistance Scholarship', 'Source 2', 6, '2025-09-18 13:37:55', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (7, 'Siblings\' Scholarship', 'Siblings\' Scholarship', 'Source 3', 4, '2025-09-18 13:38:05', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (8, 'Fisherfolks Scholarship Program', 'Fisherfolks Scholarship Program', 'Source 1', 6, '2025-09-18 13:47:21', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (9, 'Geographically Isolated and Disadvantaged Areas (G', 'Geographically Isolated and Disadvantaged Areas (GIDAs) Scholarship Program', 'Source 1', 6, '2025-09-18 13:47:31', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (10, 'Athletic Scholarship Program', 'Athletic Scholarship Program', 'Source 2', 3, '2025-09-18 13:47:43', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (11, 'Hon. Rodolfo M. Abat -- College President\'s Schola', 'Hon. Rodolfo M. Abat -- College President\'s Scholarship Program For Senior High School', 'Source 2', 5, '2025-09-18 13:47:54', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (12, 'Junior Police, Kabataan Para Sa Pamayanan Scholars', 'Junior Police, Kabataan Para Sa Pamayanan Scholarship Program', 'Test Source', 6, '2025-09-18 13:48:03', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (13, 'Board Members\' Scholarship Program', 'Board Members\' Scholarship Program', 'Source 1', 2, '2025-09-18 13:48:16', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (14, 'LUPPO Scholars', 'Scholarship Partnership of SJBCNL and La Union Police Provincial Office', 'Test', 5, '2025-09-18 13:48:32', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (15, 'BSFHMP', 'Bosconians\' Society of Future Hospitality Management Practitioners (BSFHMP) Scholarship Program', 'Source 2', 6, '2025-09-18 13:48:44', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (16, 'Indigenous Peoples Scholarship Program', 'Indigenous Peoples Scholarship Program', 'Test', 6, '2025-09-18 13:48:54', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (17, 'mployees Dependent Scholarship Program', 'mployees Dependent Scholarship Program', 'Test', 4, '2025-09-18 13:49:01', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (18, 'Scholarship Partnership of SJBCNL and Regional Rec', 'Scholarship Partnership of SJBCNL and Regional Rec', 'Scholarship Partnership of SJBCNL and Regional Recruitment and Selection Unit', 6, '2025-09-18 13:49:22', NULL);
INSERT INTO `scholarship_programs` (`id`, `scholarship_name`, `description`, `source`, `type`, `created_at`, `updated_at`) VALUES (19, 'Culture and Arts Scholarship', 'Culture and Arts Scholarship', 'Test Source', 5, '2025-09-18 13:49:31', NULL);


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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COMMENT='Siblings information for scholarship applications';

INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (1, 1, 'Maria Santos', 25, 'BSIT', 'SLUC', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (2, 1, 'Juan Diaz', 22, 'BSBA', 'SLUC', '2025-09-15 13:24:36', '2025-09-15 13:24:36');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (3, 2, 'Phyllis Lane', 100, 'Tempora sit quo sunt', 'Quia dolore at duis ', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (4, 2, 'Mollie Sellers', 84, 'Delectus saepe fuga', 'Pariatur Sed in ape', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (5, 2, 'Elton Gilliam', 12, 'Ipsum hic totam qui', 'Soluta distinctio D', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (6, 2, 'Hop Randolph', 27, 'Consequuntur non vol', 'Quis et dolor iusto ', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (7, 2, 'Abel Dillon', 39, 'Voluptatem sit dolo', 'Nihil lorem odit eiu', '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (8, 3, 'Cullen Coffey', 12, 'Ut qui placeat labo', 'Sint maiores impedit', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (9, 3, 'Willa Baxter', 38, 'Consequatur est rat', 'Doloribus veritatis ', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (10, 3, 'Charissa Good', 27, 'Sit amet veritatis ', 'Dolorem fuga Non li', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (11, 3, 'Aphrodite Harrell', 26, 'Doloribus tenetur do', 'Omnis voluptas elige', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (12, 3, 'Jerry Rios', 76, 'Fugiat voluptate exc', 'Natus tempora quo te', '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (13, 4, 'Wallace Haley', 76, 'Neque quasi obcaecat', 'Nesciunt iste nihil', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (14, 4, 'Jasper Case', 60, 'Magna illo similique', 'Tempore dolor tempo', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (15, 4, 'Carissa Pruitt', 3, 'Provident sint quia', 'Cumque aute veniam ', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (16, 4, 'Marah Pickett', 100, 'Possimus magnam des', 'Et reiciendis beatae', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (17, 4, 'Eagan Odonnell', 79, 'Eius deserunt qui ob', 'Est voluptatem atque', '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (18, 5, 'Petra Hansen', 3, 'Eum nisi ut pariatur', 'Rerum dolorum unde d', '2025-09-18 10:26:38', '2025-09-18 10:26:38');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (19, 5, 'Jeanette Daniel', 71, 'Non consectetur et ', 'Ea voluptas laborum', '2025-09-18 10:26:38', '2025-09-18 10:26:38');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (20, 5, 'Herrod Gomez', 88, 'Minim libero et null', 'Architecto cillum no', '2025-09-18 10:26:38', '2025-09-18 10:26:38');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (21, 5, 'Christian Hebert', 70, 'Laboriosam occaecat', 'Voluptate ut ex reru', '2025-09-18 10:26:38', '2025-09-18 10:26:38');
INSERT INTO `scholarship_siblings` (`id`, `scholarship_id`, `sibling_name`, `sibling_age`, `sibling_course`, `sibling_school`, `created_at`, `updated_at`) VALUES (22, 5, 'Carter Hoffman', 29, 'Sed voluptatum imped', 'A asperiores pariatu', '2025-09-18 10:26:38', '2025-09-18 10:26:38');


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='Scholarship applications table with comprehensive form data';

INSERT INTO `scholarships` (`id`, `student_id`, `scholarship_id`, `application_type`, `semester`, `contact_no`, `address`, `email`, `birth_date`, `gender`, `facebook`, `birth_place`, `religion`, `father_name`, `father_address`, `father_contact`, `father_occupation`, `father_employment`, `father_education`, `mother_name`, `mother_address`, `mother_contact`, `mother_occupation`, `mother_employment`, `mother_education`, `scholar_reason`, `application_status`, `approval_date`, `status`, `created_at`, `updated_at`) VALUES (2, 'Ea reiciendis vero e', 11, 'Renewal', 1, 0, 'Sint cum deleniti m', 'admin@gmail.com', '1984-02-05', 'Female', 'Proident non ab lab', 'Illum lorem molliti', 'dsadad', 'dasdsadas', 'Sit in ad est dolor', 'Non molestias eligen', 'dasdadasd', 'Consequatur sit erro', 'Porro itaque volupta', 'Talon Wolf', 'Nobis dolorum eius e', 'Officia totam quia p', 'Et ipsa aut veritat', 'Irure fugiat nostru', 'Dolorum ullamco duis', 68, 'Pending', NULL, 0, '2025-09-15 15:29:02', '2025-09-15 15:29:02');
INSERT INTO `scholarships` (`id`, `student_id`, `scholarship_id`, `application_type`, `semester`, `contact_no`, `address`, `email`, `birth_date`, `gender`, `facebook`, `birth_place`, `religion`, `father_name`, `father_address`, `father_contact`, `father_occupation`, `father_employment`, `father_education`, `mother_name`, `mother_address`, `mother_contact`, `mother_occupation`, `mother_employment`, `mother_education`, `scholar_reason`, `application_status`, `approval_date`, `status`, `created_at`, `updated_at`) VALUES (3, '21321313', 45, 'New', 1, 0, 'Diaz', 'admin@gmail.com', '1984-02-05', 'Female', 'Natus et non incidid', 'Officia aut quia vit', 'dsadad', 'Patience Oneal', 'Pariatur Eum volupt', 'Cupiditate est in ve', 'Id voluptatibus lib', 'Dolor autem beatae e', 'Dolor at in velit do', 'Talon Wolf', 'Aut sint fuga Dolo', 'Alias aut provident', 'Sit ex atque minim', 'Id omnis quia rerum ', 'Consequuntur lorem d', 83, 'Pending', NULL, 0, '2025-09-15 15:45:51', '2025-09-15 15:45:51');
INSERT INTO `scholarships` (`id`, `student_id`, `scholarship_id`, `application_type`, `semester`, `contact_no`, `address`, `email`, `birth_date`, `gender`, `facebook`, `birth_place`, `religion`, `father_name`, `father_address`, `father_contact`, `father_occupation`, `father_employment`, `father_education`, `mother_name`, `mother_address`, `mother_contact`, `mother_occupation`, `mother_employment`, `mother_education`, `scholar_reason`, `application_status`, `approval_date`, `status`, `created_at`, `updated_at`) VALUES (4, '0', 1, 'Renewal', 2, 0, 'Diaz', 'admin@gmail.com', '1984-02-05', 'Female', 'Quod in qui reprehen', 'Et adipisicing qui n', 'dsadad', 'dsadsad', 'Sit illo velit nemo', 'Aspernatur placeat', 'Id voluptatibus lib', 'Ipsum enim ea optio', 'Quam dolorem rerum e', 'Talon Wolf', 'Aute voluptas consec', 'Fuga Quia ad repreh', 'Sit ex atque minim', 'Quas aut veritatis q', 'Consequat Necessita', 55, 'Pending', NULL, 0, '2025-09-18 10:25:46', '2025-09-18 10:25:46');
INSERT INTO `scholarships` (`id`, `student_id`, `scholarship_id`, `application_type`, `semester`, `contact_no`, `address`, `email`, `birth_date`, `gender`, `facebook`, `birth_place`, `religion`, `father_name`, `father_address`, `father_contact`, `father_occupation`, `father_employment`, `father_education`, `mother_name`, `mother_address`, `mother_contact`, `mother_occupation`, `mother_employment`, `mother_education`, `scholar_reason`, `application_status`, `approval_date`, `status`, `created_at`, `updated_at`) VALUES (5, '0', 2, 'New', 1, 0, 'Diaz', 'admin@gmail.com', '1984-02-05', 'Female', 'Consequatur voluptas', 'Unde quasi enim ut a', 'dsadad', 'Alec Chase', 'Voluptas velit venia', 'Dignissimos ullamco', 'Quis ipsam aspernatu', 'Ratione assumenda ex', 'Pariatur Consequat', 'Talon Wolf', 'Consequatur sit nih', 'Vel labore eaque dol', 'dsdada', 'Saepe labore modi au', 'Eum nihil laboris pl', 20, 'Pending', NULL, 0, '2025-09-18 10:26:38', '2025-09-18 10:26:38');


#
# TABLE STRUCTURE FOR: students
#

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL COMMENT 'Also StudentId',
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `course_id` int(11) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `students` (`id`, `student_id`, `first_name`, `middle_name`, `last_name`, `address`, `contact`, `date_of_birth`, `gender`, `course_id`, `year_level`, `section`, `school_year`, `scholarship_type`, `office`, `guardian_name`, `guardian_contact`, `status`, `admission_date`, `created_at`, `updated_at`) VALUES (1, 0, 'Joshua', 'Veronica Haley', 'D', 'Diaz', '', '1984-02-05', 'Female', 2, '1st Year', 'Dolor non itaque vol', '2002', 2, 3, 'Joelle Foley', 'Voluptas nesciu', 0, '2007-05-30', '2025-09-14 15:15:49', '2025-09-17 13:23:42');


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
  `office` enum('admin','scholar','clinic','alumni','sbo','gad','time','marshall') NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:active, 1:inactive',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `office`, `status`, `created_at`, `updated_at`) VALUES (2, 'Joshua', 'Ledda', 'admin@gmail.com', '$2y$10$2oEc0ibUGFKqkRzN3gbzOu53ZXICFZgH3VtrvXYK4TCV3P9UlWtJm', 1, 'admin', 0, '2025-09-08 11:05:36', NULL);


