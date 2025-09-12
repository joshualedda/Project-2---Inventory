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


