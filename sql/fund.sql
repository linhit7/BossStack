
--
-- Thong tin khach hang
--
CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `gender` tinyint(1) DEFAULT NULL,
  `maritalstatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contactname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `contactphone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);

--
-- Thong tin nguon gioi thieu
--
CREATE TABLE `customer_introductions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `introduction` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `orther` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `insertpointoftime` (`insertpointoftime`)
);

--
-- Thong tin quan he gia dinh
--
CREATE TABLE `customer_familyrelationships` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `relation` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `address` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `work` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dependentperson` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `insertpointoftime` (`insertpointoftime`)
);

--
-- Thong tin tu van
--
CREATE TABLE `advisorys` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleadvisory` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `contentadvisory` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);

--
-- Thong tin tra loi tu van
--
CREATE TABLE `advisory_answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `advisory_id` int(11) NOT NULL,
  `answer_id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);