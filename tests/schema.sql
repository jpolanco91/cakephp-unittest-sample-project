-- Test database schema.
--
-- If you are not using CakePHP migrations you can put
-- your application's schema in this file and use it in tests.

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` INT PRIMARY KEY NOT NULL,
  `user_id` INT DEFAULT NULL,
  `location_id` INT DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `description` text,
  `url` varchar(255) DEFAULT '',
  `complete` TEXT CHECK( `complete` IN ('yes','no')) DEFAULT 'no',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` INT PRIMARY KEY NOT NULL,
  `user_id` INT DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `city` varchar(50) DEFAULT '',
  `state` varchar(2) DEFAULT '',
  `zip` INT DEFAULT NULL,
  `address1` varchar(255) DEFAULT '',
  `address2` varchar(255) DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT PRIMARY KEY NOT NULL,
  `email` varchar(50) DEFAULT '',
  `pass` varchar(50) DEFAULT '',
  `enabled` TEXT CHECK( `enabled` IN ('yes','no')) DEFAULT 'yes',
  `activated` TEXT CHECK( `activated` IN ('yes','no')) DEFAULT 'no',
  `ac_code` varchar(32) DEFAULT '',
  `role` TEXT CHECK( `role` IN ('admin','user')) DEFAULT 'user',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
);
