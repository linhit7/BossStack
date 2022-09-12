-- MySQL dump 10.17  Distrib 10.3.15-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: fund
-- ------------------------------------------------------
-- Server version	10.3.15-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advisory_answers`
--

DROP TABLE IF EXISTS `advisory_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisory_answers`
--

LOCK TABLES `advisory_answers` WRITE;
/*!40000 ALTER TABLE `advisory_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `advisory_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advisorys`
--

DROP TABLE IF EXISTS `advisorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisorys`
--

LOCK TABLES `advisorys` WRITE;
/*!40000 ALTER TABLE `advisorys` DISABLE KEYS */;
/*!40000 ALTER TABLE `advisorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cash_accounts`
--

DROP TABLE IF EXISTS `cash_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cash_accounts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) NOT NULL,
  `accountno` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `accountdate` date NOT NULL DEFAULT '0000-00-00',
  `accountstatustype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(20) NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finish` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finishdate` date DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cash_accounts`
--

LOCK TABLES `cash_accounts` WRITE;
/*!40000 ALTER TABLE `cash_accounts` DISABLE KEYS */;
INSERT INTO `cash_accounts` VALUES (1,21,'Ví A','2020-03-10','0','VND',10000000,NULL,NULL,NULL,'13','2020-03-10 06:45:44','13','2020-03-10 06:45:44',NULL,'2020-03-10 06:45:44'),(2,1,'A000001','2020-03-13','0','VND',20000000,NULL,NULL,NULL,'2','2020-03-13 09:07:56','2','2020-03-13 09:07:56',NULL,'2020-03-13 09:07:56'),(3,1,'aaaa','2020-03-17','0','VND',44444,NULL,NULL,NULL,'2','2020-03-17 02:42:24','2','2020-03-17 02:42:24',NULL,'2020-03-17 02:42:24');
/*!40000 ALTER TABLE `cash_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cash_incomes`
--

DROP TABLE IF EXISTS `cash_incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cash_incomes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) NOT NULL,
  `incomename` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `incometype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incomedate` date NOT NULL DEFAULT '0000-00-00',
  `incomestatustype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(20) NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cash_incomes`
--

LOCK TABLES `cash_incomes` WRITE;
/*!40000 ALTER TABLE `cash_incomes` DISABLE KEYS */;
INSERT INTO `cash_incomes` VALUES (1,1,'Luong thang 1','0','2020-03-13','0','VND',50000000,NULL,'2','2020-03-13 09:12:03','2','2020-03-13 09:12:03',NULL,'2020-03-13 09:12:03'),(2,1,'Tien dien thang 1','1','2020-03-13','1','VND',200000,NULL,'2','2020-03-13 09:14:03','2','2020-03-13 09:14:03',NULL,'2020-03-13 09:14:03'),(3,1,'Tra no ngan hang thang 1','8','2020-03-13','2','VND',500000,NULL,'2','2020-03-13 09:14:22','2','2020-03-13 09:14:22',NULL,'2020-03-13 09:14:22');
/*!40000 ALTER TABLE `cash_incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cash_plans`
--

DROP TABLE IF EXISTS `cash_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cash_plans` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) NOT NULL,
  `planname` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plandate` date NOT NULL DEFAULT '0000-00-00',
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currentage` int(20) NOT NULL,
  `planage` int(20) NOT NULL,
  `planamount` double NOT NULL,
  `planamountunittype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `accountno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currentamount` double NOT NULL,
  `currentamountunittype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `requireamount` double NOT NULL,
  `requireamountunittype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `totalcurrentamount` double NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cash_plans`
--

LOCK TABLES `cash_plans` WRITE;
/*!40000 ALTER TABLE `cash_plans` DISABLE KEYS */;
INSERT INTO `cash_plans` VALUES (33,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',76,'1000000',46000000,'','2','2020-03-17 09:57:07','2','2020-03-17 09:57:07',NULL,'2020-03-17 09:57:07'),(34,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',76,'1000000',46000000,'','2','2020-03-17 09:58:08','2','2020-03-17 09:58:08',NULL,'2020-03-17 09:58:08'),(35,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',85,'1000000',46000000,'','2','2020-03-17 09:58:51','2','2020-03-17 09:58:51',NULL,'2020-03-17 09:58:51'),(36,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',85,'1000000',46000000,'','2','2020-03-17 10:00:23','2','2020-03-17 10:00:23',NULL,'2020-03-17 10:00:23'),(37,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',85,'1000000',46000000,'','2','2020-03-17 10:00:34','2','2020-03-17 10:00:34',NULL,'2020-03-17 10:00:34'),(38,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',85,'1000000',46000000,'','2','2020-03-17 10:00:56','2','2020-03-17 10:00:56',NULL,'2020-03-17 10:00:56'),(39,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',85,'1000000',46000000,'','2','2020-03-17 10:25:41','2','2020-03-17 10:25:41',NULL,'2020-03-17 10:25:41'),(40,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',85,'1000000',46000000,'','2','2020-03-17 10:27:15','2','2020-03-17 10:27:15',NULL,'2020-03-17 10:27:15'),(41,1,'aaaa','2020-03-17','VND',21,50,0,'','2',26,'1000000',85,'1000000',46000000,'','2','2020-03-17 10:27:57','2','2020-03-17 10:27:57',NULL,'2020-03-17 10:27:57');
/*!40000 ALTER TABLE `cash_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contracts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) NOT NULL,
  `contractno` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contractdate` date NOT NULL DEFAULT '0000-00-00',
  `contractstatustype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `term` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `termtype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastcontractdate` date NOT NULL DEFAULT '0000-00-00',
  `personalcashflow` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invest` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saving` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finish` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finishdate` date DEFAULT NULL,
  `officer_user_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_user_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_at` date DEFAULT NULL,
  `approvestatustype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contracts`
--

LOCK TABLES `contracts` WRITE;
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` VALUES (1,1,'HD-001-02032020','2020-03-03','2','VND','1','Y','2021-03-05','1','0','0',NULL,NULL,NULL,'6',NULL,'2','2020-03-05','A','1','2020-03-02 01:16:41','1','2020-03-05 01:16:41',NULL,'2020-03-05 01:16:41'),(2,2,'HD-002-03032020','2020-03-04','2','VND','2','Y','2022-03-05','1','0','1',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-01 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(3,3,'HD-003-04032020','2020-03-05','2','VND','2','Y','2022-03-05','1','1','1',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-02 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(4,4,'HD-004-05032020','2020-03-06','2','VND','2','Y','2022-03-05','1','0','1',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-03 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(5,5,'HD-005-07032020','2020-03-03','2','VND','2','Y','2022-03-05','0','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-04 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(6,6,'HD-006-03032020','2020-03-02','2','VND','2','Y','2022-03-05','1','0','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-04 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(7,7,'HD-007-08032020','2020-03-03','2','VND','2','Y','2022-03-05','1','1','1',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-02 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(8,8,'HD-008-07032020','2020-03-04','2','VND','2','Y','2022-03-05','0','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-05 01:19:45','1','2020-03-10 07:10:20',NULL,'2020-03-05 01:19:45'),(9,9,'HD-009-06032020','2020-03-05','2','VND','2','Y','2022-03-05','1','0','1',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-05 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(10,10,'HD-010-05032020','2020-03-06','2','VND','2','Y','2022-03-05','1','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-05 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(11,11,'HD-011-04032020','2020-03-07','2','VND','2','Y','2022-03-05','1','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-06 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(12,12,'HD-012-03032020','2020-03-08','2','VND','2','Y','2022-03-05','0','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-06 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(13,13,'HD-013-02032020','2020-03-05','2','VND','2','Y','2022-03-05','1','0','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-05 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(14,14,'HD-014-09032020','2020-03-06','2','VND','2','Y','2022-03-05','1','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-07 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(15,15,'HD-015-08032020','2020-03-07','2','VND','2','Y','2022-03-05','1','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-05 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(16,16,'HD-016-07032020','2020-03-08','2','VND','2','Y','2022-03-05','1','0','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-08 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(17,17,'HD-017-06032020','2020-03-09','2','VND','2','Y','2022-03-05','1','0','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-04 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(18,18,'HD-018-05032020','2020-03-05','2','VND','2','Y','2022-03-05','0','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-09 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(19,19,'HD-019-04032020','2020-03-06','2','VND','2','Y','2022-03-05','1','1','0',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-03 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(20,20,'HD-020-02032020','2020-03-04','2','VND','2','Y','2022-03-05','1','0','1',NULL,NULL,NULL,'7',NULL,'2','2020-03-05','A','1','2020-03-02 01:19:45','1','2020-03-05 01:19:58',NULL,'2020-03-05 01:19:45'),(21,21,'HD-001-10032020','2020-03-10','2','VND','1','Y','2021-06-16','1','0','1',NULL,NULL,NULL,'6',NULL,'2','2020-03-11','A','6','2020-03-10 06:43:22','1','2020-03-10 06:51:40',NULL,'2020-03-10 06:43:22');
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_familyrelationships`
--

DROP TABLE IF EXISTS `customer_familyrelationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_familyrelationships`
--

LOCK TABLES `customer_familyrelationships` WRITE;
/*!40000 ALTER TABLE `customer_familyrelationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_familyrelationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_introductions`
--

DROP TABLE IF EXISTS `customer_introductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_introductions`
--

LOCK TABLES `customer_introductions` WRITE;
/*!40000 ALTER TABLE `customer_introductions` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_introductions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `customercode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT '0000-00-00',
  `gender` tinyint(1) DEFAULT NULL,
  `maritalstatus` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `address` varchar(400) COLLATE utf8_unicode_ci DEFAULT '',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contactname` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactphone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction_facebook` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction_user` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction_orther` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fathername` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fatherbirthday` date DEFAULT NULL,
  `fatherwork` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fatherdependentperson` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mothername` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motherbirthday` date DEFAULT NULL,
  `motherwork` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motherdependentperson` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `familyname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `familybirthday` date DEFAULT NULL,
  `familywork` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `childrenname` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customertype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personalcashflow` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invest` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saving` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customerstatustype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `officer_user_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_user_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_at` date DEFAULT NULL,
  `approvestatustype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,2,'00000001','Khách hàng tên A','1979-03-04',0,'','34 Kỳ Đồng P9 Q3 TPHCM','0908393144','a@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','1','1','0','2','6',NULL,'2','2020-03-05','A','','2020-03-02 01:12:28','1','2020-03-05 01:15:24',NULL,'2020-03-05 01:12:28'),(2,3,'00000002','Khách hàng tên B','1988-03-09',0,'','45 Kỳ Đồng P9 Q3 TPHCM','0908356456','b@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','0','1','2','7',NULL,'2','2020-03-03','A','','2020-03-03 01:13:05','1','2020-03-05 01:18:50',NULL,'2020-03-05 01:13:05'),(3,4,'00000003','Khách hàng tên C','1996-02-10',1,'','455 Lý Thái Tổ P9 Q10 TPHCM','0245878965','c@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','1','0','0','2','6',NULL,'2','2020-03-03','A','','2020-03-04 01:13:48','1','2020-03-05 01:59:11',NULL,'2020-03-05 01:13:48'),(4,5,'00000004','Khách hàng tên D','1991-03-02',1,'','55 Nguyển Văn Cừ P9 Q10 TPHCM','0878965412','d@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','1','0','2','7',NULL,'2','2020-03-03','A','','2020-03-05 01:55:03','1','2020-03-05 01:59:49',NULL,'2020-03-05 01:55:03'),(5,9,'00000005','Khách hàng tên E','1995-11-11',0,'','5644 Trần Văn Đang Q 3','0874562314','e@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','1','1','0','2','',NULL,'2','2020-03-04','A','','2020-03-05 01:55:50','1','2020-03-05 02:00:40',NULL,'2020-03-05 01:55:50'),(6,10,'00000006','Khách hàng tên F','1995-02-06',1,'','23/12 Tân Thới Nhất P3 Q12','086542123','f@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','1','0','2','8',NULL,'2','2020-03-06','A','','2020-03-06 01:56:41','1','2020-03-05 02:01:11',NULL,'2020-03-05 01:56:41'),(7,NULL,'00000007','Khách hàng tên L','1981-10-15',0,'','57 Lý Chiêu Hoàng Q 6','08456589623','l@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','1','0','0','2','6',NULL,'2','2020-03-05','A','','2020-03-07 01:57:37','1','2020-03-09 01:21:48',NULL,'2020-03-05 01:57:37'),(8,NULL,'00000008','Khách hàng tên G','1947-03-10',0,'','43 Hoàng Văn Thụ Q 10','07845852365','g@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','1','0','2','8',NULL,'2','2020-03-06','A','','2019-03-06 01:58:18','1','2020-03-09 01:22:07',NULL,'2020-03-05 01:58:18'),(9,NULL,'00000009','Khách hàng tên A9','1979-03-04',0,'','34 Kỳ Đồng P9 Q3 TPHCM','0908393144','a9@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'2','1','1','0','2','6',NULL,'2','2020-03-05','A','','2020-03-03 18:12:28','1','2020-03-04 18:15:24',NULL,'2020-03-04 18:12:28'),(10,NULL,'00000010','Khách hàng tên B10','1988-03-09',0,'','45 Kỳ Đồng P9 Q3 TPHCM','0908356456','b10@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'9','1','0','1','2','7',NULL,'2','2020-03-03','A','','2020-03-04 18:13:05','1','2020-03-04 18:18:50',NULL,'2020-03-04 18:13:05'),(11,NULL,'00000011','Khách hàng tên C11','1996-02-10',1,'','455 Lý Thái Tổ P9 Q10 TPHCM','0245878965','c11@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'2','1','0','0','2','6',NULL,'2','2020-03-03','A','','2020-03-05 18:13:48','1','2020-03-04 18:59:11',NULL,'2020-03-04 18:13:48'),(12,NULL,'00000012','Khách hàng tên D12','1991-03-02',1,'','55 Nguyển Văn Cừ P9 Q10 TPHCM','0878965412','d12@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'2','1','1','0','2','7',NULL,'2','2020-03-03','A','','2020-03-04 18:55:03','1','2020-03-04 18:59:49',NULL,'2020-03-04 18:55:03'),(13,NULL,'00000013','Khách hàng tên E13','1995-11-11',0,'','5644 Trần Văn Đang Q 3','0874562314','e13@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'2','1','1','0','2','',NULL,'2','2020-03-04','A','','2020-03-07 18:55:50','1','2020-03-04 19:00:40',NULL,'2020-03-04 18:55:50'),(14,NULL,'00000014','Khách hàng tên F14','1995-02-06',1,'','23/12 Tân Thới Nhất P3 Q12','086542123','f14@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'2','1','1','0','2','8',NULL,'2','2020-03-06','A','','2020-03-06 18:56:41','1','2020-03-04 19:01:11',NULL,'2020-03-04 18:56:41'),(15,NULL,'00000015','Khách hàng tên L15','1981-10-15',0,'','57 Lý Chiêu Hoàng Q 6','08456589623','l15@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'9','1','0','0','2','6',NULL,'2','2020-03-05','A','','2020-03-06 18:57:37','1','2020-03-08 18:21:48',NULL,'2020-03-04 18:57:37'),(16,NULL,'00000016','Khách hàng tên G16','1947-03-10',0,'','43 Hoàng Văn Thụ Q 10','07845852365','g16@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'9','1','1','0','2','8',NULL,'2','2020-03-06','A','','2019-03-07 18:58:18','1','2020-03-08 18:22:07',NULL,'2020-03-04 18:58:18'),(17,NULL,'00000017','Khách hàng tên G17','1947-03-10',0,'','43 Hoàng Văn Thụ Q 10','07845852365','g17@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'9','1','1','0','2','8',NULL,'2','2020-03-06','A','','2019-03-02 18:58:18','1','2020-03-08 18:22:07',NULL,'2020-03-04 18:58:18'),(18,NULL,'00000018','Khách hàng tên G18','1947-03-10',0,'','43 Hoàng Văn Thụ Q 10','07845852365','g18@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','1','0','2','8',NULL,'2','2020-03-06','A','','2019-03-03 18:58:18','1','2020-03-08 18:22:07',NULL,'2020-03-04 18:58:18'),(19,13,'00000019','Khách hàng tên G19','1947-03-10',0,'','43 Hoàng Văn Thụ Q 10','07845852365','g19@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','1','0','2','8',NULL,'2','2020-03-06','A','','2019-03-04 18:58:18','1','2020-03-10 07:07:29',NULL,'2020-03-04 18:58:18'),(20,NULL,'00000020','Khách hàng tên G20','1947-03-10',0,'','43 Hoàng Văn Thụ Q 10','07845852365','g20@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','1','1','0','2','8',NULL,'2','2020-03-06','A','','2019-03-05 18:58:18','1','2020-03-08 18:22:07',NULL,'2020-03-04 18:58:18'),(21,13,'00000021','Nguyễn Thị Trúc Quyên','1992-03-01',1,'','59/4A phan đăng lưu','0356565656','it5@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','0','1','2','6',NULL,'2','2020-03-10','A','','2020-03-10 06:33:05','1','2020-03-10 06:50:10',NULL,'2020-03-10 06:33:05'),(22,14,'00000022','Phan Công','1995-04-15',0,'','720A Điện Biên Phủ','0374570287','it4@lamians.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'1','1','0','1','1',NULL,NULL,NULL,NULL,NULL,'','2020-03-10 08:52:21','14','2020-03-10 09:58:12',NULL,'2020-03-10 08:52:21');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mn_applicationfunctiongroups`
--

DROP TABLE IF EXISTS `mn_applicationfunctiongroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mn_applicationfunctiongroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicationmoduleid` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `displayorder` int(3) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `applicationresourceid` int(11) unsigned DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `insertpointoftime` (`insertpointoftime`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mn_applicationfunctiongroups`
--

LOCK TABLES `mn_applicationfunctiongroups` WRITE;
/*!40000 ALTER TABLE `mn_applicationfunctiongroups` DISABLE KEYS */;
INSERT INTO `mn_applicationfunctiongroups` VALUES (1,1,'Tổng quan',1,'fa fa-pie-chart',25,'1','2020-02-03 07:02:27','1','2020-03-11 07:07:41',NULL,'2020-02-03 07:02:27'),(2,1,'Quản lý dòng tiền cá nhân',2,'fas fa-calculator',12,'1','2020-02-03 07:02:51','1','2020-02-25 07:27:38',NULL,'2020-02-03 07:02:51'),(3,1,'Dự báo chỉ số',3,'fa fa-search',0,'1','2020-02-03 07:07:25','1','2020-02-03 07:07:25',NULL,'2020-02-03 07:07:25'),(4,1,'Tiết kiệm',4,'fas fa-piggy-bank',13,'1','2020-02-03 07:07:39','1','2020-02-25 07:27:50',NULL,'2020-02-03 07:07:39'),(5,1,'Đầu tư',5,'fas fa-exchange-alt',14,'1','2020-02-03 07:07:52','1','2020-02-25 07:28:00',NULL,'2020-02-03 07:07:52'),(6,1,'Dịch vụ tư vấn',6,'fa fa-volume-control-phone',0,'1','2020-02-03 07:08:03','1','2020-02-03 07:08:03',NULL,'2020-02-03 07:08:03'),(7,2,'Thông tin cá nhân',1,'fas fa-user',19,'1','2020-02-03 07:08:41','1','2020-03-04 07:41:05',NULL,'2020-02-03 07:08:41'),(8,2,'Hợp đồng',2,'fas fa-star',20,'1','2020-02-03 07:08:48','1','2020-03-04 08:29:30',NULL,'2020-02-03 07:08:48'),(10,4,'Theo đối tượng khách hàng',1,'fas fa-user',10,'1','2020-02-06 07:33:50','1','2020-02-24 08:35:28',NULL,'2020-02-06 07:33:50'),(11,4,'Theo sản phẩm',2,'fas fa-star',11,'1','2020-02-06 07:34:08','1','2020-02-24 08:35:37',NULL,'2020-02-06 07:34:08'),(19,3,'Hỗ trợ',3,'fas fa-piggy-bank',NULL,'1','2020-02-11 03:34:15','1','2020-02-14 03:18:36',NULL,'2020-02-11 03:34:15'),(22,6,'Danh sách User khách hàng',1,'fa fa-bars',18,'1','2020-02-11 08:18:10','1','2020-03-09 08:17:40',NULL,'2020-02-11 08:18:10'),(23,6,'Danh sách User quản trị',2,'fa fa-bars',7,'1','2020-02-11 08:18:32','1','2020-03-09 08:18:07',NULL,'2020-02-11 08:18:32'),(25,7,'Quản lý menu',1,'fa fa-bars',NULL,'1','2020-02-11 09:22:37','1','2020-03-09 08:18:39',NULL,'2020-02-11 09:22:37'),(26,8,'Tổng quan',1,'fa fa-pie-chart',26,'1','2020-02-14 03:31:32','1','2020-03-11 07:07:59',NULL,'2020-02-14 03:31:32'),(27,8,'Quản lý dòng tiền cá nhân',2,'fas fa-calculator',15,'1','2020-02-14 03:32:25','1','2020-02-25 07:27:02',NULL,'2020-02-14 03:32:25'),(28,8,'Dự báo chỉ số',3,'fa fa-search',NULL,'1','2020-02-14 03:32:47','1','2020-02-14 03:32:47',NULL,'2020-02-14 03:32:47'),(29,8,'Tiết kiệm',4,'fas fa-piggy-bank',16,'1','2020-02-14 03:33:05','1','2020-02-25 07:27:10',NULL,'2020-02-14 03:33:05'),(30,8,'Đầu tư',5,'fas fa-exchange-alt',17,'1','2020-02-14 03:33:24','1','2020-02-25 07:27:19',NULL,'2020-02-14 03:33:24'),(31,8,'Dịch vụ tư vấn',6,'fa fa-volume-control-phone',22,'1','2020-02-14 03:33:40','1','2020-02-14 03:33:40',NULL,'2020-02-14 03:33:40'),(32,8,'Thông tin tài khoản KH',7,'fas fa-address-card',NULL,'1','2020-02-14 03:35:33','1','2020-02-14 03:52:04',NULL,'2020-02-14 03:35:33'),(33,8,'Hỗ trợ tư vấn khách hàng',8,'fas fa-users',NULL,'1','2020-02-14 03:35:57','1','2020-02-14 03:37:48',NULL,'2020-02-14 03:35:57'),(35,5,'Doanh thu',1,'fa fa-usd',NULL,'1','2020-03-09 12:36:16','1','2020-03-09 12:36:16',NULL,'2020-03-09 12:36:16'),(36,5,'Chi phí',2,'fas fa-hand-holding-usd',NULL,'1','2020-03-10 03:29:11','1','2020-03-10 03:29:11',NULL,'2020-03-10 03:29:11'),(37,5,'Lợi nhuận',3,'fas fa-piggy-bank',NULL,'1','2020-03-10 03:29:37','1','2020-03-10 03:29:37',NULL,'2020-03-10 03:29:37');
/*!40000 ALTER TABLE `mn_applicationfunctiongroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mn_applicationmodules`
--

DROP TABLE IF EXISTS `mn_applicationmodules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mn_applicationmodules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `applicationmodulename` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `displayorder` int(3) NOT NULL,
  `sys` int(1) NOT NULL DEFAULT 0,
  `hidden` int(3) unsigned NOT NULL DEFAULT 0,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `insertpointoftime` (`insertpointoftime`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mn_applicationmodules`
--

LOCK TABLES `mn_applicationmodules` WRITE;
/*!40000 ALTER TABLE `mn_applicationmodules` DISABLE KEYS */;
INSERT INTO `mn_applicationmodules` VALUES (1,'HETHONGQUANLY-KH','HỆ THỐNG QUẢN LÝ',1,0,0,NULL,'','2019-11-14 03:29:14','1','2020-02-14 03:27:59',NULL,'2019-11-14 03:29:14'),(2,'THONGTINTAIKHOAN','THÔNG TIN TÀI KHOẢN',2,0,0,NULL,'','2019-11-14 03:29:14','1','2020-02-14 03:10:09',NULL,'2019-11-14 03:29:14'),(3,'DICHVUKHACHHANG247','DỊCH VỤ KHÁCH HÀNG 24/7',3,0,0,NULL,'130','2019-11-25 08:22:59','1','2020-03-10 03:12:44',NULL,'2019-11-25 08:22:59'),(4,'QUANLYTHONGKE','QUẢN LÝ THỐNG KÊ',4,0,0,NULL,'1','2020-02-06 07:24:18','1','2020-02-14 03:11:42',NULL,'2020-02-06 07:24:18'),(5,'TAICHINH','TÀI CHÍNH',5,0,0,NULL,'1','2020-02-06 07:26:11','1','2020-03-09 12:34:43',NULL,'2020-02-06 07:26:11'),(6,'QUANLYUSER','QUẢN LÝ USER',6,0,0,NULL,'1','2020-02-11 03:52:53','1','2020-02-14 03:13:34',NULL,'2020-02-11 03:52:53'),(7,'QUANTRIHETHONG','QUẢN TRỊ HỆ THỐNG',7,0,0,NULL,'1','2020-02-11 09:20:24','1','2020-02-11 09:20:24',NULL,'2020-02-11 09:20:24'),(8,'HETHONGQUANLY-QL','QUẢN LÝ HỆ THỐNG QUẢN LÝ',1,0,0,NULL,'1','2020-02-14 03:30:14','1','2020-02-14 03:39:48',NULL,'2020-02-14 03:30:14');
/*!40000 ALTER TABLE `mn_applicationmodules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mn_applicationresources`
--

DROP TABLE IF EXISTS `mn_applicationresources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mn_applicationresources` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pagesecurity` tinyint(3) unsigned DEFAULT 0,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `insertpointoftime` (`insertpointoftime`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mn_applicationresources`
--

LOCK TABLES `mn_applicationresources` WRITE;
/*!40000 ALTER TABLE `mn_applicationresources` DISABLE KEYS */;
INSERT INTO `mn_applicationresources` VALUES (1,'0001','Chỉ số danh mục cấp 1','dashboard',0,'fa fa-bars','1','2020-02-03 07:10:44','1','2020-02-11 01:38:44',NULL,'2020-02-03 07:10:44'),(2,'0002','Chỉ số danh mục cấp 2','dashboard',0,'fa fa-bars','1','2020-02-03 07:10:55','1','2020-02-11 01:39:09',NULL,'2020-02-03 07:10:55'),(3,'0003','Chỉ số danh mục cấp 3','dashboard',0,'fa fa-bars','1','2020-02-03 07:11:03','1','2020-02-11 01:39:35',NULL,'2020-02-03 07:11:03'),(4,'0004','Role','applicationroles-index',0,'fa fa-bars','1','2020-02-06 08:01:19','1','2020-02-06 09:06:50',NULL,'2020-02-06 08:01:19'),(5,'0005','Module','applicationmodules-index',0,'fa fa-bars','1','2020-02-06 08:01:52','1','2020-02-06 09:07:11',NULL,'2020-02-06 08:01:52'),(6,'0006','Page (route) truy cập','applicationresources-index',0,'fa fa-bars','1','2020-02-06 08:02:07','1','2020-02-06 09:07:56',NULL,'2020-02-06 08:02:07'),(7,'0007','Quản lý user truy cập','users-index',0,'fa fa-bars','1','2020-02-06 08:02:45','1','2020-02-06 09:03:03',NULL,'2020-02-06 08:02:45'),(8,'0008','Cá nhân','customers-index',0,'fa fa-bars','1','2020-02-11 02:04:29','1','2020-02-14 06:35:11',NULL,'2020-02-11 02:04:29'),(9,'0009','Hợp đồng','contracts-index',0,'fa fa-bars','1','2020-02-11 02:04:59','1','2020-02-19 09:34:27',NULL,'2020-02-11 02:04:59'),(10,'0010','Thống kê theo đối tượng khách hàng','statistic-customer',0,NULL,'1','2020-02-24 08:34:19','1','2020-02-24 08:34:19',NULL,'2020-02-24 08:34:19'),(11,'0011','Thống kê theo sản phẩm','statistic-product',0,NULL,'1','2020-02-24 08:34:37','1','2020-02-24 08:34:37',NULL,'2020-02-24 08:34:37'),(12,'0012','Quản lý dòng tiền cá nhân','cash-index',0,NULL,'1','2020-02-25 06:53:16','1','2020-02-25 06:53:16',NULL,'2020-02-25 06:53:16'),(13,'0013','Tiết kiệm','saving-index',0,NULL,'1','2020-02-25 06:53:29','1','2020-02-25 06:53:29',NULL,'2020-02-25 06:53:29'),(14,'0014','Đầu tư','invest-index',0,NULL,'1','2020-02-25 06:53:41','1','2020-02-25 06:53:41',NULL,'2020-02-25 06:53:41'),(15,'0015','Quản lý dòng tiền cá nhân QL','cash-manage',0,NULL,'1','2020-02-25 07:25:27','1','2020-02-25 07:25:27',NULL,'2020-02-25 07:25:27'),(16,'0016','Tiết kiệm  QL','saving-manage',0,NULL,'1','2020-02-25 07:25:44','1','2020-02-25 07:26:22',NULL,'2020-02-25 07:25:44'),(17,'0017','Đầu tư QL','invest-manage',0,NULL,'1','2020-02-25 07:26:09','1','2020-02-25 07:26:09',NULL,'2020-02-25 07:26:09'),(18,'0018','Danh sách user khách hàng','usercustomers-index',0,NULL,'1','2020-02-26 09:18:24','1','2020-02-26 09:18:24',NULL,'2020-02-26 09:18:24'),(19,'0019','Thông tin cá nhân KH','customers-editCustomer',0,NULL,'1','2020-03-04 07:40:42','1','2020-03-04 07:44:41',NULL,'2020-03-04 07:40:42'),(20,'0020','Danh sách hợp đồng KH','contracts-listContract',0,NULL,'1','2020-03-04 08:29:10','1','2020-03-04 08:29:10',NULL,'2020-03-04 08:29:10'),(21,'0021','Doanh thu tổng','revenues-index',0,'fa fa-usd','1','2020-03-09 12:37:07','1','2020-03-09 12:37:07',NULL,'2020-03-09 12:37:07'),(22,'0022','Dịch vụ tư vấn','advisorys-index',0,'fa fa-volume-control-phone','1','2020-03-10 02:18:21','1','2020-03-10 02:18:21',NULL,'2020-03-10 02:18:21'),(23,'0023','Chi phí tổng','costs-index',0,'fas fa-hand-holding-usd','1','2020-03-10 03:30:25','1','2020-03-10 03:31:20',NULL,'2020-03-10 03:30:25'),(24,'0024','Lợi nhuận tổng','profits-index',0,'fas fa-piggy-bank','1','2020-03-10 03:30:57','1','2020-03-10 03:31:36',NULL,'2020-03-10 03:30:57'),(25,'0025','Tổng quan','dashboard-customer',0,'fa fa-pie-chart','1','2020-03-11 07:03:47','1','2020-03-11 07:03:47',NULL,'2020-03-11 07:03:47'),(26,'0026','Tổng quan QL','dashboard-manage',0,'fa fa-pie-chart','1','2020-03-11 07:04:18','1','2020-03-11 07:04:18',NULL,'2020-03-11 07:04:18');
/*!40000 ALTER TABLE `mn_applicationresources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mn_applicationroles`
--

DROP TABLE IF EXISTS `mn_applicationroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mn_applicationroles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `modulesallowed` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code_cp` varchar(20) COLLATE utf8_unicode_ci DEFAULT ' ',
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `insertpointoftime` (`insertpointoftime`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mn_applicationroles`
--

LOCK TABLES `mn_applicationroles` WRITE;
/*!40000 ALTER TABLE `mn_applicationroles` DISABLE KEYS */;
INSERT INTO `mn_applicationroles` VALUES (1,'HT','Hệ thống','Quản trị','4,5,6,7,8',NULL,'','2019-11-20 04:06:47','1','2020-03-09 08:19:43',NULL,'2019-11-20 04:06:47'),(2,'KH','Khách hàng',NULL,'1,2,3',NULL,'','2019-11-20 04:06:47','1','2020-02-14 03:21:20',NULL,'2019-11-20 04:06:47'),(3,'GD','Giám đốc',NULL,'1,2,3,4,5,6',NULL,'','2019-11-20 04:06:47','1','2020-02-14 03:21:55',NULL,'2019-11-20 04:06:47'),(4,'BH','Bán hàng',NULL,'4,5,6,8',NULL,'130','2019-11-20 09:21:29','1','2020-03-10 06:38:56',NULL,'2019-11-20 09:21:29');
/*!40000 ALTER TABLE `mn_applicationroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mn_functionassignment`
--

DROP TABLE IF EXISTS `mn_functionassignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mn_functionassignment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `applicationfunctiongroupid` int(11) unsigned NOT NULL,
  `applicationresourceid` int(11) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `insertpointoftime` (`insertpointoftime`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mn_functionassignment`
--

LOCK TABLES `mn_functionassignment` WRITE;
/*!40000 ALTER TABLE `mn_functionassignment` DISABLE KEYS */;
INSERT INTO `mn_functionassignment` VALUES (1,5,1,1,'1','2020-02-03 07:11:24','1','2020-02-03 07:11:24',NULL,'2020-02-03 07:11:24'),(2,5,2,2,'1','2020-02-03 07:11:28','1','2020-02-03 07:11:28',NULL,'2020-02-03 07:11:28'),(3,5,3,3,'1','2020-02-03 07:11:33','1','2020-02-03 07:11:33',NULL,'2020-02-03 07:11:33'),(4,13,4,1,'1','2020-02-06 09:00:27','1','2020-02-06 09:00:27',NULL,'2020-02-06 09:00:27'),(5,13,5,2,'1','2020-02-06 09:00:33','1','2020-02-06 09:00:33',NULL,'2020-02-06 09:00:33'),(6,13,6,3,'1','2020-02-06 09:00:38','1','2020-02-06 09:00:38',NULL,'2020-02-06 09:00:38'),(7,16,8,1,'1','2020-02-11 02:05:32','1','2020-02-11 02:05:32',NULL,'2020-02-11 02:05:32'),(8,16,9,2,'1','2020-02-11 02:05:45','1','2020-02-11 02:05:45',NULL,'2020-02-11 02:05:45'),(9,21,4,1,'1','2020-02-11 07:59:16','1','2020-02-11 07:59:16',NULL,'2020-02-11 07:59:16'),(10,21,5,2,'1','2020-02-11 07:59:26','1','2020-02-11 07:59:26',NULL,'2020-02-11 07:59:26'),(11,21,6,3,'1','2020-02-11 07:59:35','1','2020-02-11 07:59:35',NULL,'2020-02-11 07:59:35'),(12,25,4,1,'1','2020-02-11 09:25:24','1','2020-02-11 09:25:24',NULL,'2020-02-11 09:25:24'),(13,25,5,2,'1','2020-02-11 09:25:34','1','2020-02-11 09:25:34',NULL,'2020-02-11 09:25:34'),(14,25,6,3,'1','2020-02-11 09:25:42','1','2020-02-11 09:25:42',NULL,'2020-02-11 09:25:42'),(15,30,1,1,'1','2020-02-14 03:34:17','1','2020-02-14 03:34:17',NULL,'2020-02-14 03:34:17'),(16,30,2,2,'1','2020-02-14 03:34:22','1','2020-02-14 03:34:22',NULL,'2020-02-14 03:34:22'),(17,30,3,3,'1','2020-02-14 03:34:30','1','2020-02-14 03:34:30',NULL,'2020-02-14 03:34:30'),(18,32,8,1,'1','2020-02-14 04:06:17','1','2020-02-14 04:06:17',NULL,'2020-02-14 04:06:17'),(19,32,9,2,'1','2020-02-14 04:06:22','1','2020-02-14 04:06:22',NULL,'2020-02-14 04:06:22'),(20,35,21,1,'1','2020-03-09 12:37:43','1','2020-03-10 01:51:54',NULL,'2020-03-09 12:37:43'),(22,36,23,1,'1','2020-03-10 03:32:10','1','2020-03-10 03:32:10',NULL,'2020-03-10 03:32:10');
/*!40000 ALTER TABLE `mn_functionassignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mn_securityresources`
--

DROP TABLE IF EXISTS `mn_securityresources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mn_securityresources` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolecode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `resourcecode` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cview` varchar(5) COLLATE utf8_unicode_ci DEFAULT '0',
  `cadd` varchar(5) COLLATE utf8_unicode_ci DEFAULT '0',
  `cdelete` varchar(5) COLLATE utf8_unicode_ci DEFAULT '0',
  `cupdate` varchar(5) COLLATE utf8_unicode_ci DEFAULT '0',
  `capprove` varchar(5) COLLATE utf8_unicode_ci DEFAULT '0',
  `cuserview` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `created_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `insertpointoftime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `insertpointoftime` (`insertpointoftime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mn_securityresources`
--

LOCK TABLES `mn_securityresources` WRITE;
/*!40000 ALTER TABLE `mn_securityresources` DISABLE KEYS */;
/*!40000 ALTER TABLE `mn_securityresources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('linhdh@gmail.com','$2y$10$7fsB05dtYVESJvnvlyZquuaxGqq8F6dVwWOp6Fn750q3f0l3Rzixm','2020-02-12 10:59:43');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,2),(2,2),(3,2),(4,2),(5,2),(6,0),(6,4),(7,4),(8,4),(9,4);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (0,'customer','customer','khách hàng',NULL,NULL),(1,'owner','owner','sếp',NULL,NULL),(2,'admin','admin','nhân viên - quản trị viên',NULL,NULL),(3,'admin_hr','admin_hr','Nhân sự',NULL,NULL),(4,'nv','nv','nhân viên',NULL,NULL),(5,'account','account','Nhân viên kế toán',NULL,NULL),(6,'sales','sales','Nhân viên bán hàng',NULL,NULL),(7,'data','data','Nhân viên data',NULL,NULL),(8,'marketing','makerting','Nhân viên marketing',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_costs`
--

DROP TABLE IF EXISTS `tc_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_costs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `costcode` varchar(255) NOT NULL,
  `costdate` date NOT NULL,
  `costprices` int(11) NOT NULL,
  `methodpayment` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `cashierid` int(11) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_costs`
--

LOCK TABLES `tc_costs` WRITE;
/*!40000 ALTER TABLE `tc_costs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_costs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_revenues`
--

DROP TABLE IF EXISTS `tc_revenues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_revenues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `revenuesourcesid` int(11) NOT NULL,
  `revenuecode` varchar(255) NOT NULL,
  `revenuedate` varchar(255) NOT NULL,
  `methodpayment` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `cashier` int(11) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_revenues`
--

LOCK TABLES `tc_revenues` WRITE;
/*!40000 ALTER TABLE `tc_revenues` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_revenues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `updated_user_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_updated_user_id_foreign` (`updated_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@rbooks.vn','$2y$10$Rl/jbWF.bLWjO60Bx3I0GuhIV5UEQzs4ttLulXmJk57MhBHlITnky','fJCSUNjEjiA6faoUUKdTENtkEWGWL8nrbED50mjfHv9BqKPaQi5rI2CznLHY','HT',NULL,NULL,NULL,NULL,'2019-11-26 12:08:29'),(2,'Khách hàng A','a@lamians.com','$2y$10$xa/.fNqSqMHtd0LCsqMYluX58o.M8f9Wn.QHPW30mQ.MReEMj5RDi','lkGIRy075KoiGuTcRmZYssbdZFPEY2YYVrG9CXhk0qOmD6JXIZFVZACHkm44','KH',3,NULL,NULL,'2019-09-12 05:06:41','2020-03-04 07:25:41'),(3,'Khách hàng B','b@lamians.com','$2y$10$xa/.fNqSqMHtd0LCsqMYluX58o.M8f9Wn.QHPW30mQ.MReEMj5RDi','189deJV3GRJoW5MKy8nhbHEFzQrmiylAK7IiJFMB9s5pVnLyCEFLgbETJQKx','KH',NULL,NULL,NULL,'2019-10-18 11:36:21','2020-02-13 20:23:07'),(4,'Khách hàng C','c@lamians.com','$2y$10$xa/.fNqSqMHtd0LCsqMYluX58o.M8f9Wn.QHPW30mQ.MReEMj5RDi','jOTOz17iqLAX8J7rr7CqbIvs4RGyhLR6y3aFnThQqw6Fq9d0Kvx8gejPBE2o','KH',NULL,NULL,NULL,'2019-10-19 10:45:02','2020-02-11 04:10:12'),(5,'Khách hàng D','d@lamians.com','$2y$10$xa/.fNqSqMHtd0LCsqMYluX58o.M8f9Wn.QHPW30mQ.MReEMj5RDi',NULL,'KH',NULL,NULL,NULL,'2019-11-26 07:02:52','2020-02-11 04:10:57'),(9,'Khách hàng E','e@lamians.com','$2y$10$LVHybm4v4nidLCxy01LWZuY8OVHLJLA9nW6I/iiC/v13YLUV3tTvK','xyEClvzjed4mvRldq1aWSFQbcYFPjc8AyjTHfhGR0QYOFpmqjtjQN67F6X7a','KH',NULL,NULL,NULL,'2020-02-26 10:35:41','2020-02-26 10:35:41'),(10,'Khách hàng F','f@lamians.com','$2y$10$2GcOqtDwvoFetT.5Q38XOujpZDkcIsYcDVSXyOUwck0zY5IDj2/S6',NULL,'KH',NULL,NULL,NULL,'2020-02-26 10:37:51','2020-02-26 10:37:51'),(11,'Khách hàng L','l@lamians.com','$2y$10$.wOHAWP3erRZljPPvum3cORTjJVnoMnk3NubpNXII4brgOBhbIyrO',NULL,'KH',4,NULL,NULL,'2020-03-04 07:12:00','2020-03-04 07:23:04'),(12,'Khách hàng G','g@lamians.com','$2y$10$xpRw2IZex1sdbNR/yDaKmOpV.zks6jDdZtB4jmVUD4v140xr2E.7i','4F4CF9OtesGjn2hxlY8S1QPjE1FQOU74Fb000YOrYNDKVAyfWk2vtZwO9bqT','KH',6,NULL,NULL,'2020-03-04 07:27:26','2020-03-04 07:30:33'),(13,'Truc Quyen','it5@lamians.com','$2y$10$3pfCbv9S444.BtkrqHUJH.yENVc9O4n.6qFTligpqgkTxk5gEW9Wu','tLRYmXUH78wO6NMhIpWl3aORVnHCuIw3uUBlw8uQkZsV7gEeCvguq6uRZ1YG','KH',21,NULL,NULL,'2020-03-10 06:40:54','2020-03-10 06:40:54'),(14,'Phan Công','it4@lamians.com','$2y$10$yNHX8Xbsqt3ft4oghIniRuih54wFqDmCTw/zWZxnwQNZb1OIEdXx6','gDPRZibo4Ee11q0zw2jM8QjzLGYz1JCKaXodY6ihqBvEJPEjgFHb2xw6J98V','KH',22,NULL,NULL,'2020-03-10 08:54:59','2020-03-10 09:58:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_admin`
--

DROP TABLE IF EXISTS `users_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(20) NOT NULL,
  `updated_user_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_admin`
--

LOCK TABLES `users_admin` WRITE;
/*!40000 ALTER TABLE `users_admin` DISABLE KEYS */;
INSERT INTO `users_admin` VALUES (1,'admin','admin@rbooks.vn','$2y$10$Rl/jbWF.bLWjO60Bx3I0GuhIV5UEQzs4ttLulXmJk57MhBHlITnky','cfhtPlYrfRJEeDS01rpf7cup3B2F7bC99JZ3euPjanbWv1fQoBziWj8zCUYO','HT',0,NULL,NULL,NULL,'2019-11-26 19:08:29'),(2,'Phạm Thị Ngọc Châu','chaupham@lamians.com','$2y$10$PCBU0CGF6AxxDG4aMmgZyecZunRIRlAJsPJ7kbJ4AXoGUIAFnSW7G',NULL,'GD',0,NULL,NULL,'2019-09-12 12:06:41','2020-02-03 08:10:44'),(3,'Diệp Hoàng Linh','it7@lamians.com','$2y$10$6MvS9jyXug9RJMHgTV3I7Or2pYxbwsCqoTtHPxHoQYOAiJZEi4ehu','OvRCQqXPwDhikPk6wpxVXjDOIiLqcFWOLxtMyfZvNj4co7sRQvBZnp0UQ7hD','KH',0,NULL,NULL,'2019-10-18 18:36:21','2020-02-14 03:23:07'),(4,'Phan Văn Công','it6@lamians.com','$2y$10$4irBc/KZV7PYGY8RA.GtkO6aYG8RIHt20iCz7iYoRxyT3X7FpdBxa','Vpejh3VHbU5fzfhxjb2Gr1diMHqChAxctKT7ftOuC7elsGD4XvjepG4bQ0vW','HT',0,NULL,NULL,'2019-10-19 17:45:02','2020-02-11 11:10:12'),(5,'Đỗ Trùng Dương','it3@lamians.com','$2y$10$JxwcDcr7yb0HKhjIIQHX3.PXAusrQR4VjLOo0bQsz4ecnb3qsEx/u',NULL,'BH',0,NULL,NULL,'2019-11-26 14:02:52','2020-02-11 11:10:57'),(6,'Nguyễn Thị Trúc Quyên - Quản trị','it5@lamians.com','$2y$10$09MirihuFR40HYIBZ/SYz.oYub9Zh8J6sjz22d6H7dzmBFJUueDc.','LO7ce2rklsLfZe3XUmKaAeIga4FY0gQSQxQJrIoJD3ZQxEWT50oZkZMMOKWw','BH',0,NULL,NULL,'2020-02-26 08:42:36','2020-03-10 06:37:22'),(7,'Bán hàng 2','it10@lamians.com','$2y$10$PzFfZqboJnWgnqJOIEm7UuNKXp2nLfFeQnFzBwf213tzYnkptfB4y',NULL,'BH',0,NULL,NULL,'2020-02-26 10:12:44','2020-02-26 10:12:44'),(8,'Bán hàng 3','it11@lamians.com','$2y$10$qA6T4NSiGx.pYEjoH0PO0.dYkVib9dNc2To/yf2XtQITjWAAEyQy6',NULL,'BH',0,NULL,NULL,'2020-02-26 10:15:59','2020-02-26 10:15:59'),(9,'Bán hàng 4','it12@lamians.com','$2y$10$8SSjwKTSvnBOX9o98/23SuHgBLsb/yR26tDX2g.0eJTaB9.bxqNhq',NULL,'BH',0,NULL,NULL,'2020-02-26 10:27:19','2020-02-26 10:30:35');
/*!40000 ALTER TABLE `users_admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-17 17:29:11
