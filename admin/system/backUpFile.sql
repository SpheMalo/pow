-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: dental
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_level`
--

DROP TABLE IF EXISTS `access_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_level`
--

LOCK TABLES `access_level` WRITE;
/*!40000 ALTER TABLE `access_level` DISABLE KEYS */;
INSERT INTO `access_level` VALUES (1,'A'),(2,'B'),(3,'C'),(4,'D');
/*!40000 ALTER TABLE `access_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address_postal`
--

DROP TABLE IF EXISTS `address_postal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address_postal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suburb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `cityID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_postal`
--

LOCK TABLES `address_postal` WRITE;
/*!40000 ALTER TABLE `address_postal` DISABLE KEYS */;
INSERT INTO `address_postal` VALUES (1,'1135','Francis Baard','Hatfield','2843',3),(2,'1135','Francis Baard street','Hatfield','3432',28),(3,'1136','Francis Baard street','Hatfield','3432',28),(4,'1136','Francis Baard street','Hatfield','2834',3),(5,'1136','Francis Baard street','Hatfield','2843',3),(6,'1137','Francis Baard street','Hatfield','2834',3),(7,'1134','Francis Baard street','Hatfield','2834',3),(8,'1134','Francis Baard street','Hatfield','2834',3),(9,'1133','Francis Baard stree','Hatfield','2834',3),(10,'1234','Francis Baard street','Hatfield','2834',3),(11,'1234','Francis Baard street','Hatfield','3434',3),(12,'1234','Francis Baard street','Hatfield','3434',3),(13,'1234','Francis Baard street','Hatfield','2823',3),(14,'1234','Francis Baard street','Hatfield','28',3),(15,'1234','Francis Baard street','Hatfield','28',3),(16,'1234','Francis Baard street','Hatfield','28',3),(17,'1234','Francis Baard street','Hatfield','28',3),(18,'1234','Francis Baard street','Hatfield','28',3),(19,'1234','Francis Baard street','Hatfield','28',3),(20,'1234','Francis Baard street','Hatfield','28',3),(21,'1234','Francis Baard street','Hatfield','28',3),(22,'1234','Francis Baard street','Hatfield','28',3),(23,'1234','Francis Baard street','Hatfield','28',3),(24,'177','General De La Rey street','Bendor','699',1),(25,'177','General De La Rey street','Bendor','699',1),(26,'177','General De La Rey street','Bendor','699',1),(27,'177','General De La Rey street','Bendor','699',1),(28,'177','General De La Rey street','Bendor','699',1),(29,'177','General De La Rey street','Bendor','699',1),(30,'177','General De La Rey street','Bendor','699',1),(31,'177','General De La Rey street','Bendor','699',1),(32,'177','General De La Rey street','Hatfield','699',1),(33,'177','General De La Rey street','Hatfield','699',1),(34,'1234','Arcadia street','Arcadia','25',3),(35,'123','Marshal street','Flora park','699',1),(36,'7556','Hilary drive','Arcadia','28',3),(37,'7556','Hilary drive','Arcadia','28',3),(38,'7556','Hilary drive','Arcadia','28',3),(39,'456','Pongola Drive','Birchleigh','1618',2),(40,'346','Pongola Drive','Birchleigh','1618',2),(41,'345','Close Lane','North Cliff','1618',2),(42,'935','Pongola River Drive','Birchleigh North','1618',4),(43,'395','Pongola River Drive ','Birchleigh North','1618',4),(44,'935','Pongola River Drive','Birchleigh North','1618',4),(45,'935','Pongola River Drive','Birchleigh North','1618',4),(46,'935','Pongola River Drive','Birchleigh North','1618',4),(47,'935','Pongola River Drive','Birchleigh North','1618',4),(48,'935','Pongola River Drive','Birchleigh North','1618',4),(49,'935','Pongola River Drive','Birchleigh North','1618',4),(50,'935','Pongola River Drive','Birchleigh North','1618',2),(51,'935','Pongola River Drive','Birchleigh North','1618',2),(52,'396','pc drive ','soweto','1618',4),(53,'935','Pongola River Drive','Birchleigh North','1618',1),(54,'123','Prospect','Hatfield','83',3),(55,'123','Pongola River Drive','Birchleigh North','1618',4),(56,'935','Pongola River Drive','Birchleigh','83',1),(57,'935','Bosbok','Birchleigh','83',1),(58,'935','Bosbok','Birchleigh','1618',1),(59,'935','Bosbok','Birchleigh North','1618',1),(60,'935','Bosbok','Birchleigh North','1618',1),(61,'237','Burnett','Hatfield','188',3),(62,'935','Pongola River Drive','Birchleigh North','1618',2),(63,'123','Burnett Street','Hatfield','188',3),(64,'123','Pongola River Drive','soweto','1618',1),(65,'1','Bosbok','Birchleigh','1618',2),(66,'678','Burnett Street','Hatfield','8320',3),(67,'678','Burnett Street','Hatfield','83',3),(68,'1','Bosbok','Birchleigh','1618',2),(69,'123','Bosbok','Birchleigh','188',2),(70,'1','Bosbok','Birchleigh','1618',2),(71,'1','Bosbok','Birchleigh','1618',2),(72,'1','Bosbok','Birchleigh','1618',2),(73,'1','Bosbok','Birchleigh','1618',2),(74,'1','Bosbok','Birchleigh','1618',2),(75,'1','Bosbok','Birchleigh','1618',2),(76,'1','Bosbok','Birchleigh','1618',2),(77,'1','Bosbok','Birchleigh','1618',2),(78,'1','Bosbok','Birchleigh','1618',2),(79,'1','Bosbok','Birchleigh','1618',2),(80,'935','Pongola River Drive','Birchleigh','82',4),(81,'935','Pongola River Drive','Birchleigh','82',4),(82,'935','Pongola River Drive','Birchleigh','82',4),(83,'1','Bosbok','Birchleigh','1618',2);
/*!40000 ALTER TABLE `address_postal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address_pyhsical`
--

DROP TABLE IF EXISTS `address_pyhsical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address_pyhsical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `suburb` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `cityID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
=======
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
>>>>>>> 3d79ce79a65d7181bd7f8075fac22105d5a6f79b
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_pyhsical`
--

LOCK TABLES `address_pyhsical` WRITE;
/*!40000 ALTER TABLE `address_pyhsical` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `address_pyhsical` VALUES (1,'1135','Francis Baard','Hatfield','2823',3),(2,'1136','Francis Baard street','Hatfield','2823',3),(3,'1137','Francis Baard street','Hatfield','2823',3),(4,'1134','Francis Baard street','Hatfield','2823',3),(5,'1134','Francis Baard street','Hatfield','2823',3),(6,'1133','Francis Baard stree','Hatfield','2823',3),(7,'1234','Francis Baard street','Hatfield','2823',3),(8,'1234','Francis Baard street','Hatfield','2812',3),(9,'1234','Francis Baard street','Hatfield','2843',3),(10,'1234','Francis Baard street','Hatfield','2834',3),(11,'1234','Francis Baard street','Hatfield','2834',3),(12,'1234','Francis Baard street','Hatfield','2834',3),(13,'1234','Francis Baard street','Hatfield','2834',3),(14,'1234','Francis Baard street','Hatfield','2834',3),(15,'1234','Francis Baard street','Hatfield','2843',3),(16,'1234','Francis Baard street','Hatfield','2834',3),(17,'1234','Francis Baard street','Hatfield','2834',3),(18,'1234','Francis Baard street','Hatfield','2834',3),(19,'1234','Francis Baard street','Hatfield','2834',3),(20,'1234','Francis Baard street','Hatfield','2834',3),(21,'177','General De La Rey street','Bendor','6993',1),(22,'177','General De La Rey street','Bendor','6993',1),(23,'177','General De La Rey street','Bendor','6993',1),(24,'177','General De La Rey street','Bendor','6993',1),(25,'177','General De La Rey street','Bendor','6992',1),(26,'177','General De La Rey street','Bendor','699',1),(27,'177','General De La Rey street','Bendor','699',1),(28,'177','General De La Rey street','Bendor','699',1),(29,'177','General De La Rey street','Hatfield','699',1),(30,'177','General De La Rey street','Hatfield','699',1),(31,'1234','Arcadia street','Arcadia','25',3),(32,'123','Marshal street','Flora park','699',1),(33,'7556','Hilary drive','Arcadia','28',3),(34,'7556','Hilary drive','Arcadia','28',3),(35,'7556','Hilary drive','Arcadia','28',3),(36,'456','Pongola Drive','Birchleigh','1618',2),(37,'346','Pongola Drive','Birchleigh','1618',2),(38,'345','Close Lane','North Cliff','1618',2),(39,'935','Pongola River Drive','Birchleigh North','1618',4),(40,'395','Pongola River Drive ','Birchleigh North','1618',4),(49,'396','pc drive ','soweto','1618',4),(50,'935','Pongola River Drive','Birchleigh North','1618',1),(51,'123','Prospect','Hatfield','8332',3),(52,'1','Bosbok','Birchleigh','1618',4),(53,'1','Bosbok','Birchleigh','1618',4),(54,'123','Pongola River Drive','Birchleigh North','1618',4),(55,'1','Bosbok','Birchleigh','8323',3),(56,'935','Pongola River Drive','Birchleigh','8323',1),(57,'935','Bosbok','Birchleigh','8323',1),(58,'935','Bosbok','Birchleigh','1618',1),(59,'935','Bosbok','Birchleigh North','1618',1),(60,'935','Bosbok','Birchleigh North','1618',1),(61,'237','Burnett','Hatfield','1882',3),(62,'1','Bosbok','Birchleigh','1618',2),(63,'123','Burnett Street','Hatfield','1882',3),(64,'123','Pongola River Drive','soweto','1618',1),(65,'1','Bosbok','Birchleigh','1618',2),(66,'678','Burnett Street','Hatfield','8367',3),(67,'678','Burnett Street','Hatfield','83',3),(68,'1','Bosbok','Birchleigh','1618',2),(69,'123','Bosbok','Birchleigh','188',2),(70,'1','Bosbok','Birchleigh','1618',2),(71,'1','Bosbok','Birchleigh','1618',2),(72,'1','Bosbok','Birchleigh','1618',2),(73,'1','Bosbok','Birchleigh','1618',2),(74,'1','Bosbok','Birchleigh','1618',2),(75,'1','Bosbok','Birchleigh','1618',2),(76,'1','Bosbok','Birchleigh','1618',2),(77,'1','Bosbok','Birchleigh','1618',2),(78,'1','Bosbok','Birchleigh','1618',2),(79,'1','Bosbok','Birchleigh','1618',2),(80,'23','Lynwood Road','Lynwood','82',3),(81,'23','Lynwood Road','Lynwood','82',3),(82,'23','Lynwood Road','Lynwood','82',3),(83,'23','Lynwood Road','Lynwood','82',3),(84,'23','Lynwood Road','Lynwood','82',3),(85,'23','Lynwood Road','Lynwood','82',3),(86,'935','Lynwood Road','Hatfield','82',3),(87,'935','Pongola River Drive','Birchleigh','82',4),(88,'935','Pongola River Drive','Birchleigh','82',4),(89,'935','Pongola River Drive','Birchleigh','82',4),(90,'1','Bosbok','Birchleigh','1618',2),(91,'935','Bosbok','Birchleigh','1618',3),(92,'935','Bosbok','Birchleigh','1618',2),(93,'1','Bosbok','Birchleigh','1618',2);
=======
INSERT INTO `address_pyhsical` VALUES (1,'1135','Francis Baard','Hatfield','2823',3),(2,'1136','Francis Baard street','Hatfield','2823',3),(3,'1137','Francis Baard street','Hatfield','2823',3),(4,'1134','Francis Baard street','Hatfield','2823',3),(5,'1134','Francis Baard street','Hatfield','2823',3),(6,'1133','Francis Baard stree','Hatfield','2823',3),(7,'1234','Francis Baard street','Hatfield','2823',3),(8,'1234','Francis Baard street','Hatfield','2812',3),(9,'1234','Francis Baard street','Hatfield','2843',3),(10,'1234','Francis Baard street','Hatfield','2834',3),(11,'1234','Francis Baard street','Hatfield','2834',3),(12,'1234','Francis Baard street','Hatfield','2834',3),(13,'1234','Francis Baard street','Hatfield','2834',3),(14,'1234','Francis Baard street','Hatfield','2834',3),(15,'1234','Francis Baard street','Hatfield','2843',3),(16,'1234','Francis Baard street','Hatfield','2834',3),(17,'1234','Francis Baard street','Hatfield','2834',3),(18,'1234','Francis Baard street','Hatfield','2834',3),(19,'1234','Francis Baard street','Hatfield','2834',3),(20,'1234','Francis Baard street','Hatfield','2834',3),(21,'177','General De La Rey street','Bendor','6993',1),(22,'177','General De La Rey street','Bendor','6993',1),(23,'177','General De La Rey street','Bendor','6993',1),(24,'177','General De La Rey street','Bendor','6993',1),(25,'177','General De La Rey street','Bendor','6992',1),(26,'177','General De La Rey street','Bendor','699',1),(27,'177','General De La Rey street','Bendor','699',1),(28,'177','General De La Rey street','Bendor','699',1),(29,'177','General De La Rey street','Hatfield','699',1),(30,'177','General De La Rey street','Hatfield','699',1),(31,'1234','Arcadia street','Arcadia','25',3),(32,'123','Marshal street','Flora park','699',1),(33,'7556','Hilary drive','Arcadia','28',3),(34,'7556','Hilary drive','Arcadia','28',3),(35,'7556','Hilary drive','Arcadia','28',3),(36,'456','Pongola Drive','Birchleigh','1618',2),(37,'346','Pongola Drive','Birchleigh','1618',2),(38,'345','Close Lane','North Cliff','1618',2),(39,'935','Pongola River Drive','Birchleigh North','1618',4),(40,'395','Pongola River Drive ','Birchleigh North','1618',4),(49,'396','pc drive ','soweto','1618',4),(50,'935','Pongola River Drive','Birchleigh North','1618',1),(51,'123','Prospect','Hatfield','8332',3),(52,'1','Bosbok','Birchleigh','1618',4),(53,'1','Bosbok','Birchleigh','1618',4),(54,'123','Pongola River Drive','Birchleigh North','1618',4),(55,'1','Bosbok','Birchleigh','8323',3),(56,'935','Pongola River Drive','Birchleigh','8323',1),(57,'935','Bosbok','Birchleigh','8323',1),(58,'935','Bosbok','Birchleigh','1618',1),(59,'935','Bosbok','Birchleigh North','1618',1),(60,'935','Bosbok','Birchleigh North','1618',1),(61,'237','Burnett','Hatfield','1882',3),(62,'1','Bosbok','Birchleigh','1618',2),(63,'123','Burnett Street','Hatfield','1882',3),(64,'123','Pongola River Drive','soweto','1618',1),(65,'1','Bosbok','Birchleigh','1618',2),(66,'678','Burnett Street','Hatfield','8367',3),(67,'678','Burnett Street','Hatfield','83',3),(68,'1','Bosbok','Birchleigh','1618',2),(69,'123','Bosbok','Birchleigh','188',2),(70,'1','Bosbok','Birchleigh','1618',2),(71,'1','Bosbok','Birchleigh','1618',2),(72,'1','Bosbok','Birchleigh','1618',2),(73,'1','Bosbok','Birchleigh','1618',2),(74,'1','Bosbok','Birchleigh','1618',2),(75,'1','Bosbok','Birchleigh','1618',2),(76,'1','Bosbok','Birchleigh','1618',2),(77,'1','Bosbok','Birchleigh','1618',2),(78,'1','Bosbok','Birchleigh','1618',2),(79,'1','Bosbok','Birchleigh','1618',2),(80,'23','Lynwood Road','Lynwood','82',3),(81,'23','Lynwood Road','Lynwood','82',3),(82,'23','Lynwood Road','Lynwood','82',3),(83,'23','Lynwood Road','Lynwood','82',3),(84,'23','Lynwood Road','Lynwood','82',3),(85,'23','Lynwood Road','Lynwood','82',3),(86,'935','Lynwood Road','Hatfield','82',3),(87,'935','Pongola River Drive','Birchleigh','82',4),(88,'935','Pongola River Drive','Birchleigh','82',4),(89,'935','Pongola River Drive','Birchleigh','82',4),(90,'1','Bosbok','Birchleigh','1618',2),(91,'935','Bosbok','Birchleigh','1618',3),(92,'935','Bosbok','Birchleigh','1618',2),(93,'1','Bosbok','Birchleigh','1618',2),(94,'1','Bosbok','Birchleigh','1618',1),(95,'1','Bosbok','Birchleigh','1618',1);
>>>>>>> 3d79ce79a65d7181bd7f8075fac22105d5a6f79b
/*!40000 ALTER TABLE `address_pyhsical` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_log`
--

DROP TABLE IF EXISTS `audit_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `process` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `v_old` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_new` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employeeID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_log`
--

LOCK TABLES `audit_log` WRITE;
/*!40000 ALTER TABLE `audit_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `provinceID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'polokwane',1),(2,'tzaneen',1),(3,'pretoria',2),(4,'johannesburg',2);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `booking_typeID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `timeslotID` int(11) DEFAULT NULL,
  `practice_locationID` int(11) DEFAULT NULL,
  `patientID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `employee_typeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultation`
--

LOCK TABLES `consultation` WRITE;
/*!40000 ALTER TABLE `consultation` DISABLE KEYS */;
INSERT INTO `consultation` VALUES (1,'','Pending',3,1,3,2,1,34,2),(2,'','Pending',3,1,4,2,2,25,2),(3,'','Pending',3,1,1,2,1,29,2),(4,NULL,'pending',3,1,1,1,3,27,2),(5,NULL,'pending',1,1,3,1,5,36,1),(6,NULL,'pending',2,1,4,1,6,37,1),(7,NULL,'pending',3,2,1,NULL,5,955,NULL),(8,NULL,'pending',3,2,1,NULL,7,935,NULL),(9,NULL,'pending',1,2,1,NULL,8,925,NULL);
/*!40000 ALTER TABLE `consultation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'South Africa');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `banking_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_postalID` int(11) NOT NULL,
  `address_physicalID` int(11) NOT NULL,
  `genderID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `employee` VALUES (1,'Malesela','Ramphele','2147483647','bam1234','$2y$10$lCDonWcPwK7sd9e/59ueV.jQ3kq/nHOE03Cpt7Ubrx4B1MAq3/BH6','761921351','0','ramphele@yahoo.com','active','',1,1,1,1,1,1,'new.png'),(2,'Malesela','Ramphele','2147483647','bam4321','$2y$10$lCDonWcPwK7sd9e/59ueV.jQ3kq/nHOE03Cpt7Ubrx4B1MAq3/BH6','823307218','0','mt.ramphele@gmail.com','active','',1,1,1,1,2,1,'new.png'),(3,'Given','Manzini','2147483647','giv2754','$2y$10$L1PAGQ1CZV.w7yebPWEDYehjYRty5uEm51qPG9DtY3bPHifkVlGUm','816547832','0','gm@gmail.com','','1234567890 ABSA Hatfield 123456',1,1,1,1,2,1,'new.png'),(4,'Sarah','Mahlatji','2147483647','Sar8414','$2y$10$plWB2Y7/qe5S9GFUjDRAAOFVwwGpYTZXqF/7pJUSt.dmKXGPI7PLy','87136781','0','r@yahoo.com','','564218973 FNB Hatfield 123988',0,0,2,2,4,1,'new.png'),(5,'dxfbcnv ','cgnvhmbj','98765445','dxf5290','$2y$10$Q4tBwNro9yEYHuxPHb9Zful7SivcWVlzMJWxz2nfn5kj.s44I0n/e','98765765','0','r@yahoo.com','','enter employees banking details',0,0,1,1,3,1,'new.png'),(6,'Frikkie','Shabalala','2147483647','Fri3632','$2y$10$zduhmCG17eHV/ueMdrb/K.b1H9bNPGlI2peB0b.7hdpLr5N9UGVaa','814568543','0','ramphele@yahoo.com','','enter employees banking details',0,0,1,1,2,1,'new.png'),(7,'Malesela','Ramphele','2147483647','Mal6725','$2y$10$Gi4FhQXwlrHDXncROLUXRu8YoI.lYKwz8y434LJiBVrU5qVedaVVy','98765765','0','r@yahoo.com','','enter employees banking details',0,0,1,1,4,1,'new.png'),(8,'Simon','Kekana','2147483647','sim1234','$2y$10$QJDutZ1nY2k6nMc4OIp0ze/h6OZAPHfNmbR73WUYTbXBhi2KhCkaq','111231234','111231234','sds@gmail.com','active','some banking details',1,1,1,1,3,1,'new.png'),(9,'name','surname','2147483647','user','pass','1234567890','1234567890','email','active','banking',1,1,1,1,4,1,'new.png'),(10,'Solomon','Mahlatji','2147483647','Sol9903','$2y$10$WT/9uFuI9VLvNoI41fZ0hu2/W2foFVnkzAnan7Y9QICea1adfGU36','814568543','814568543','ar@yahoo.com','active','4078080733 ABSA',32,29,1,1,4,1,'new.png'),(11,'Malesela','Kekana','2147483647','Mal3921','$2y$10$uFA0Gvae/KhBR7PQV2iLY.FWoQJPCy9JbCRH7F/qRdiXjvZw6GbSi','829334302','829334302','ramphele@yahoo.com','active','4078080733 ABSA, Hatfield 123456',34,31,1,1,4,1,'new.png'),(12,'Bam','Chabalala','2147483647','Bam7251','$2y$10$.y.eWqdq.qV02tKW2z57W.YM7ZihAKKL//Zq6yPLUplLAG/s6UP6m','761921351','117893548','ramphele@yahoo.com','active','4078080733 ABSA, Hatfield 123456',35,32,1,1,4,1,'new.png'),(13,'Solomon','Manzini','2147483647','Sol9595','$2y$10$JU0aKoF0JdAAW5vLihMKnuzKUujYXDqnVq6VA./.r76RXvuC9/Xyy','814568543','117893548','esr@sdf.com','active','12345665433 FNB, Hatfield 123456',39,36,1,1,4,1,'new.png'),(14,'Mike','Stevens','2147483647','Mik1156','$2y$10$VswLY9odXbYXm8W2XxjY4O41jZdG1UKxn6kClcQx7WtTQm9u9ndK6','829334302','117893548','ram@yahoo.com','active','123456789012 Capitec, Hatfield 2345',41,38,1,1,4,1,'new.png'),(15,'Malesela','Kekana','2147483647','Mal9668','$2y$10$LwrPasMEPbZwZvzPZ6MJUeBeTy1eg8Vq5DrfckcC1csnDzh3BB3ra','814568543','117893548','ar@yahoo.com','active','asdfg',42,39,1,1,1,1,'new.png'),(16,'Hendrick','Faber','2147483647','Hen5382','$2y$10$4TQqjcBoMht5TsgyrdSbFuYzbp8gimHrj/k2CkA8XPO6a6sj8M0H6','829334302','152988038','rasds@gmail.com','active','12345678876544 Nedbank, Hatfield 123445',43,40,1,1,4,1,'new.png'),(17,'Katlego','Marapjane','2147483647','Kat5751','$2y$10$JSiFWNp62Of3yvLTRrpY/e8.SiJMXWQGIhvIj.8ieml6brj5VOHgK','840202702','888888887','katli@maraps.com','active','FNB',76,76,1,1,4,2,'new.png');
=======
INSERT INTO `employee` VALUES (1,'Malesela','Ramphele','2147483647','bam1234','$2y$10$lCDonWcPwK7sd9e/59ueV.jQ3kq/nHOE03Cpt7Ubrx4B1MAq3/BH6','761921351','0','ramphele@yahoo.com','active','',1,1,1,1,1,1,'new.png'),(2,'Malesela','Ramphele','2147483647','bam4321','$2y$10$lCDonWcPwK7sd9e/59ueV.jQ3kq/nHOE03Cpt7Ubrx4B1MAq3/BH6','823307218','0','mt.ramphele@gmail.com','active','',1,1,1,1,2,1,'new.png'),(4,'Sarah','Mahlatji','2147483647','Sar8414','$2y$10$plWB2Y7/qe5S9GFUjDRAAOFVwwGpYTZXqF/7pJUSt.dmKXGPI7PLy','87136781','0','r@yahoo.com','','564218973 FNB Hatfield 123988',0,0,2,2,4,1,'new.png'),(5,'dxfbcnv ','cgnvhmbj','98765445','dxf5290','$2y$10$Q4tBwNro9yEYHuxPHb9Zful7SivcWVlzMJWxz2nfn5kj.s44I0n/e','98765765','0','r@yahoo.com','','enter employees banking details',0,0,1,1,3,1,'new.png'),(6,'Frikkie','Shabalala','2147483647','Fri3632','$2y$10$zduhmCG17eHV/ueMdrb/K.b1H9bNPGlI2peB0b.7hdpLr5N9UGVaa','814568543','0','ramphele@yahoo.com','','enter employees banking details',0,0,1,1,2,1,'new.png'),(7,'Malesela','Ramphele','2147483647','Mal6725','$2y$10$Gi4FhQXwlrHDXncROLUXRu8YoI.lYKwz8y434LJiBVrU5qVedaVVy','98765765','0','r@yahoo.com','','enter employees banking details',0,0,1,1,4,1,'new.png'),(8,'Simon','Kekana','2147483647','sim1234','$2y$10$QJDutZ1nY2k6nMc4OIp0ze/h6OZAPHfNmbR73WUYTbXBhi2KhCkaq','111231234','111231234','sds@gmail.com','active','some banking details',1,1,1,1,3,1,'new.png'),(9,'name','surname','2147483647','user','pass','1234567890','1234567890','email','active','banking',1,1,1,1,4,1,'new.png'),(10,'Solomon','Mahlatji','2147483647','Sol9903','$2y$10$WT/9uFuI9VLvNoI41fZ0hu2/W2foFVnkzAnan7Y9QICea1adfGU36','814568543','814568543','ar@yahoo.com','active','4078080733 ABSA',32,29,1,1,4,1,'new.png'),(11,'Malesela','Kekana','2147483647','Mal3921','$2y$10$uFA0Gvae/KhBR7PQV2iLY.FWoQJPCy9JbCRH7F/qRdiXjvZw6GbSi','829334302','829334302','ramphele@yahoo.com','active','4078080733 ABSA, Hatfield 123456',34,31,1,1,4,1,'new.png'),(12,'Bam','Chabalala','2147483647','Bam7251','$2y$10$.y.eWqdq.qV02tKW2z57W.YM7ZihAKKL//Zq6yPLUplLAG/s6UP6m','761921351','117893548','ramphele@yahoo.com','active','4078080733 ABSA, Hatfield 123456',35,32,1,1,4,1,'new.png'),(13,'Solomon','Manzini','2147483647','Sol9595','$2y$10$JU0aKoF0JdAAW5vLihMKnuzKUujYXDqnVq6VA./.r76RXvuC9/Xyy','814568543','117893548','esr@sdf.com','active','12345665433 FNB, Hatfield 123456',39,36,1,1,4,1,'new.png'),(14,'Mike','Stevens','2147483647','Mik1156','$2y$10$VswLY9odXbYXm8W2XxjY4O41jZdG1UKxn6kClcQx7WtTQm9u9ndK6','829334302','117893548','ram@yahoo.com','active','123456789012 Capitec, Hatfield 2345',41,38,1,1,4,1,'new.png'),(15,'Malesela','Kekana','2147483647','Mal9668','$2y$10$LwrPasMEPbZwZvzPZ6MJUeBeTy1eg8Vq5DrfckcC1csnDzh3BB3ra','814568543','117893548','ar@yahoo.com','active','asdfg',42,39,1,1,1,1,'new.png'),(16,'Hendrick','Faber','2147483647','Hen5382','$2y$10$4TQqjcBoMht5TsgyrdSbFuYzbp8gimHrj/k2CkA8XPO6a6sj8M0H6','829334302','152988038','rasds@gmail.com','active','12345678876544 Nedbank, Hatfield 123445',43,40,1,1,4,1,'new.png'),(17,'Katlego','Marapjane','2147483647','Kat5751','$2y$10$JSiFWNp62Of3yvLTRrpY/e8.SiJMXWQGIhvIj.8ieml6brj5VOHgK','840202702','888888887','katli@maraps.com','active','FNB',76,76,1,1,4,2,'new.png');
>>>>>>> 3d79ce79a65d7181bd7f8075fac22105d5a6f79b
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_access`
--

DROP TABLE IF EXISTS `employee_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_access` (
  `access_levelID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_access`
--

LOCK TABLES `employee_access` WRITE;
/*!40000 ALTER TABLE `employee_access` DISABLE KEYS */;
INSERT INTO `employee_access` VALUES (1,1);
/*!40000 ALTER TABLE `employee_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female'),(3,'Undisclose');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `illness_history`
--

DROP TABLE IF EXISTS `illness_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `illness_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `illness_history`
--

LOCK TABLES `illness_history` WRITE;
/*!40000 ALTER TABLE `illness_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `illness_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `invoice_date` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patientID` int(11) NOT NULL,
  `consultationID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,'I-123456789',356.64,'2016-10-14','paid',1,1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `line_invoice`
--

DROP TABLE IF EXISTS `line_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line_invoice` (
  `product_quantity` int(11) DEFAULT NULL,
  `procedure_quantity` int(11) DEFAULT NULL,
  `invoiceID` int(11) NOT NULL,
  `patientID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `procedureID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line_invoice`
--

LOCK TABLES `line_invoice` WRITE;
/*!40000 ALTER TABLE `line_invoice` DISABLE KEYS */;
INSERT INTO `line_invoice` VALUES (6,NULL,1,NULL,1,NULL),(20,NULL,1,NULL,2,NULL),(NULL,2,1,NULL,NULL,2);
/*!40000 ALTER TABLE `line_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `line_prescription`
--

DROP TABLE IF EXISTS `line_prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line_prescription` (
  `dosage` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `restrictions` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `chronic` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `patientID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `prescriptionID` int(11) NOT NULL,
  `consultationID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `booking_typeID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line_prescription`
--

LOCK TABLES `line_prescription` WRITE;
/*!40000 ALTER TABLE `line_prescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `line_prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_aid`
--

DROP TABLE IF EXISTS `medical_aid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medical_aid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `address_postalID` int(11) NOT NULL,
  `address_physicalID` int(255) NOT NULL,
  `telephone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_aid`
--

LOCK TABLES `medical_aid` WRITE;
/*!40000 ALTER TABLE `medical_aid` DISABLE KEYS */;
INSERT INTO `medical_aid` VALUES (1,'Bonitas',1,1,'0123456789','0123456789','something@bonitas.co.za'),(2,'GEMS',1,1,'0123456789','0123456789','something@gems.co.za'),(3,'Discovery',1,1,'123456789','0123456789','something@discovery.co.za'),(4,'Palmed',1,1,'123456789','0123456789','something@palmed.co.za'),(5,'Medshield',1,1,'123456789','0123456789','something@medshield.co.za'),(6,'CAMAF',43,40,'112345567','0112345567','info@camaf.co.za'),(7,'CAMAF',53,50,'112345567','0112345567','info@camaf.co.za');
/*!40000 ALTER TABLE `medical_aid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `supplierID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'O-1001','2016-10-12 08:12:00','Pending',1),(2,'O-1085','2016-10-05 10:34:00','Received',2);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `telephone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `medical_aidID` int(11) DEFAULT NULL,
  `titleID` int(11) NOT NULL,
  `genderID` int(11) NOT NULL,
  `address_postalID` int(11) NOT NULL,
  `address_physicalID` int(11) NOT NULL,
  `medical_aid_typeID` int(11) DEFAULT NULL,
  `member_typeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1,'Malesela','Ramphele','9302125567464','1992-11-30','1234567890','1234567890','r@gmail.com','new.png','f-00170',NULL,1,1,1,1,NULL,NULL),(2,'Vincent','Sibanda','5423456789078','1986-12-10','121564897','0761564897','s@sfs.com','new.png','f-10020',NULL,1,1,1,1,NULL,NULL),(3,'Mike','Sebokwe','9211285265088','1992-11-30','','0811107654','sebo@gmail.com','new.png','f-54321',NULL,1,1,1,1,NULL,NULL),(4,'Mike','Sebokwe','9211305265088','1992-11-30','','0814568543','sebokwe.m@gmail.com','new.png','f-47825',NULL,1,1,10,7,NULL,NULL),(5,'Mike','Sebokwe','9211295265088','1992-11-30','','0814568543','sebokwe.m@gmail.com','new.png','f-27696',NULL,1,1,71,68,NULL,NULL),(6,'Harvey','Dent','9202166543215','1992-02-21','','0879685761','harvey.d@yahoo.com','new.png','f-15114',NULL,1,1,73,70,4,2),(7,'Straydom','Dent','9811305265089','1998-11-30','','0879683576','dent.s@vodamail.co.za','new.png','f-73311',NULL,1,1,75,72,4,3),(8,'Makgotso','Thobejane','9409240265088','1994-09-24','','0820000000','kgotsothobejan@yahoo.com','new.png','f-34027',NULL,2,2,77,77,NULL,NULL);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_illness_history`
--

DROP TABLE IF EXISTS `patient_illness_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_illness_history` (
  `illness_historyID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_illness_history`
--

LOCK TABLES `patient_illness_history` WRITE;
/*!40000 ALTER TABLE `patient_illness_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_illness_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `comment` int(11) DEFAULT NULL,
  `invoiceID` int(11) NOT NULL,
  `patientID` int(11) DEFAULT NULL,
  `payment_typeID` int(11) NOT NULL,
  `write_off_typeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,356.64,'2016-10-14',NULL,1,NULL,1,NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practice_location`
--

DROP TABLE IF EXISTS `practice_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practice_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practice_location`
--

LOCK TABLES `practice_location` WRITE;
/*!40000 ALTER TABLE `practice_location` DISABLE KEYS */;
INSERT INTO `practice_location` VALUES (1,'Tembisa'),(2,'Birch Acres');
/*!40000 ALTER TABLE `practice_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dosage` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `validity` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `patientID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `booking_typeID` int(11) NOT NULL,
  `consultationID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_procedure`
--

DROP TABLE IF EXISTS `price_procedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_procedure` (
  `procedureID` int(11) NOT NULL,
  `medical_aidID` int(11) NOT NULL,
  `medical_aid_typeID` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_procedure`
--

LOCK TABLES `price_procedure` WRITE;
/*!40000 ALTER TABLE `price_procedure` DISABLE KEYS */;
/*!40000 ALTER TABLE `price_procedure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_product`
--

DROP TABLE IF EXISTS `price_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_product` (
  `productID` int(11) NOT NULL,
  `medical_aidID` int(11) NOT NULL,
  `medical_aid_typeID` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_product`
--

LOCK TABLES `price_product` WRITE;
/*!40000 ALTER TABLE `price_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `price_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedure`
--

DROP TABLE IF EXISTS `procedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `favorite` int(1) NOT NULL DEFAULT '0',
  `procedure_typeID` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedure`
--

LOCK TABLES `procedure` WRITE;
/*!40000 ALTER TABLE `procedure` DISABLE KEYS */;
INSERT INTO `procedure` VALUES (1,' Abrasion of teeth','K03.10',156,1,4,1),(2,'Dental root caries','K02.70',345,0,3,1);
/*!40000 ALTER TABLE `procedure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `critical_value` int(11) NOT NULL,
  `favorite` tinyint(4) NOT NULL,
  `product_typeID` int(11) NOT NULL,
  `unit_vol` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'P-7503','Aderol','For hard pain relief',200,50,20,15,0,1,0,0),(2,'P-9290','Dolorol Forte','For serious pain relief',265,100,30,10,0,1,30,1),(3,'P-3882','Myprodol','Anti-Inflammatory',85,20,18,6,0,1,0,1),(4,'P-3592','Gen Payne','For Unbearable pain relief',200,125,30,5,1,2,0,1),(5,'P-6988','Bio Stratch','Natural nutritional supplement - supports immune system',76,23,60,5,0,3,0,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `countryID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Limpopo',1),(2,'Gauteng',1),(3,'KwaZulu Natal',1),(4,'Freestate',1),(5,'Mpumalanga',1),(6,'North West',1),(7,'Northern Cape',1),(8,'Eastern Cape',1),(9,'Western Cape',1);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `available_date` datetime NOT NULL,
  `available` tinyint(1) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=985 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'2016-08-25 00:00:00',1,1,2,1),(2,'2016-08-25 00:00:00',1,2,2,1),(3,'2016-08-25 00:00:00',1,3,2,1),(4,'2016-08-25 00:00:00',1,4,2,1),(5,'2016-08-25 00:00:00',1,5,2,1),(6,'2016-08-25 00:00:00',1,6,2,1),(7,'2016-08-25 00:00:00',1,7,2,1),(8,'2016-08-25 00:00:00',1,8,2,1),(9,'2016-08-26 00:00:00',0,2,2,1),(10,'2016-08-26 00:00:00',1,3,2,1),(11,'2016-08-26 00:00:00',1,4,2,1),(12,'2016-08-26 00:00:00',1,5,2,1),(13,'2016-08-26 00:00:00',1,6,2,1),(14,'2016-08-26 00:00:00',1,7,2,1),(15,'2016-08-26 00:00:00',1,8,2,1),(16,'2016-08-27 00:00:00',0,2,2,1),(17,'2016-08-27 00:00:00',0,3,2,1),(18,'2016-08-27 00:00:00',1,4,2,1),(19,'2016-08-27 00:00:00',1,5,2,1),(20,'2016-08-27 00:00:00',1,6,2,1),(21,'2016-08-27 00:00:00',1,7,2,1),(22,'2016-08-27 00:00:00',1,8,2,1),(23,'2016-09-03 00:00:00',1,2,1,1),(24,'2016-09-03 00:00:00',1,3,1,1),(25,'2016-09-03 00:00:00',1,4,1,1),(26,'2016-09-03 00:00:00',1,5,1,1),(27,'2016-09-04 00:00:00',0,1,1,1),(28,'2016-09-04 00:00:00',1,2,1,1),(29,'2016-09-04 00:00:00',0,3,1,1),(30,'2016-09-04 00:00:00',0,4,1,1),(31,'2016-09-04 00:00:00',1,5,1,1),(32,'2016-09-04 00:00:00',1,6,1,1),(33,'2016-09-04 00:00:00',1,7,1,1),(34,'2016-09-05 00:00:00',0,1,1,1),(35,'2016-09-05 00:00:00',1,2,1,1),(36,'2016-09-05 00:00:00',0,3,1,1),(37,'2016-09-05 00:00:00',0,4,1,1),(38,'2016-09-05 00:00:00',1,5,1,1),(39,'2016-09-05 00:00:00',1,6,1,1),(40,'2016-09-05 00:00:00',1,7,1,1),(131,'2016-09-17 00:00:00',1,1,1,1),(132,'2016-09-17 00:00:00',1,2,1,1),(133,'2016-09-17 00:00:00',1,3,1,1),(134,'2016-09-17 00:00:00',1,4,1,1),(135,'2016-09-17 00:00:00',1,5,1,1),(136,'2016-09-17 00:00:00',1,6,1,1),(137,'2016-09-17 00:00:00',1,7,1,1),(138,'2016-09-17 00:00:00',1,8,1,1),(139,'2016-09-17 00:00:00',1,9,1,1),(140,'2016-09-17 00:00:00',1,10,1,1),(181,'2016-09-02 00:00:00',1,1,1,1),(182,'2016-09-02 00:00:00',1,2,1,1),(183,'2016-09-02 00:00:00',1,3,1,1),(184,'2016-09-02 00:00:00',1,4,1,1),(185,'2016-09-02 00:00:00',1,5,1,1),(186,'2016-09-02 00:00:00',1,6,1,1),(187,'2016-09-02 00:00:00',1,7,1,1),(188,'2016-09-02 00:00:00',1,8,1,1),(189,'2016-09-02 00:00:00',1,9,1,1),(190,'2016-09-02 00:00:00',1,10,1,1),(201,'2016-09-16 00:00:00',1,1,1,1),(202,'2016-09-16 00:00:00',1,2,1,1),(203,'2016-09-16 00:00:00',1,3,1,1),(204,'2016-09-16 00:00:00',1,4,1,1),(205,'2016-09-16 00:00:00',1,5,1,1),(206,'2016-09-16 00:00:00',1,6,1,1),(207,'2016-09-16 00:00:00',1,7,1,1),(208,'2016-09-16 00:00:00',1,8,1,1),(209,'2016-09-16 00:00:00',1,9,1,1),(210,'2016-09-16 00:00:00',1,10,1,1),(211,'2016-09-14 00:00:00',1,1,1,1),(212,'2016-09-14 00:00:00',1,2,1,1),(213,'2016-09-14 00:00:00',1,3,1,1),(214,'2016-09-14 00:00:00',1,4,1,1),(215,'2016-09-14 00:00:00',1,5,1,1),(216,'2016-09-14 00:00:00',1,6,1,1),(217,'2016-09-14 00:00:00',1,7,1,1),(218,'2016-09-14 00:00:00',1,8,1,1),(219,'2016-09-14 00:00:00',1,9,1,1),(220,'2016-09-14 00:00:00',1,10,1,1),(281,'2016-09-25 00:00:00',1,1,1,1),(282,'2016-09-25 00:00:00',1,2,1,1),(283,'2016-09-25 00:00:00',1,3,1,1),(284,'2016-09-25 00:00:00',1,4,1,1),(285,'2016-09-25 00:00:00',1,5,1,1),(286,'2016-09-25 00:00:00',1,6,1,1),(287,'2016-09-25 00:00:00',1,7,1,1),(288,'2016-09-25 00:00:00',1,8,1,1),(289,'2016-09-25 00:00:00',1,9,1,1),(290,'2016-09-25 00:00:00',1,10,1,1),(311,'2016-09-24 00:00:00',1,1,1,1),(312,'2016-09-24 00:00:00',1,2,1,1),(313,'2016-09-24 00:00:00',1,3,1,1),(314,'2016-09-24 00:00:00',1,4,1,1),(315,'2016-09-24 00:00:00',1,5,1,1),(316,'2016-09-24 00:00:00',1,6,1,1),(317,'2016-09-24 00:00:00',1,7,1,1),(318,'2016-09-24 00:00:00',1,8,1,1),(319,'2016-09-24 00:00:00',1,9,1,1),(320,'2016-09-24 00:00:00',1,10,1,1),(381,'2016-09-23 00:00:00',1,1,1,1),(382,'2016-09-23 00:00:00',1,2,1,1),(383,'2016-09-23 00:00:00',1,3,1,1),(384,'2016-09-23 00:00:00',1,4,1,1),(385,'2016-09-23 00:00:00',1,5,1,1),(386,'2016-09-23 00:00:00',1,6,1,1),(387,'2016-09-23 00:00:00',1,7,1,1),(388,'2016-09-23 00:00:00',1,8,1,1),(389,'2016-09-23 00:00:00',1,9,1,1),(390,'2016-09-23 00:00:00',1,10,1,1),(391,'2016-09-19 00:00:00',1,1,1,1),(392,'2016-09-19 00:00:00',1,2,1,1),(393,'2016-09-19 00:00:00',1,3,1,1),(394,'2016-09-19 00:00:00',1,4,1,1),(395,'2016-09-19 00:00:00',1,5,1,1),(396,'2016-09-19 00:00:00',1,6,1,1),(397,'2016-09-19 00:00:00',1,7,1,1),(398,'2016-09-19 00:00:00',1,8,1,1),(399,'2016-09-19 00:00:00',1,9,1,1),(400,'2016-09-19 00:00:00',1,10,1,1),(411,'2016-09-20 00:00:00',1,1,1,1),(412,'2016-09-20 00:00:00',1,2,1,1),(413,'2016-09-20 00:00:00',1,3,1,1),(414,'2016-09-20 00:00:00',1,4,1,1),(415,'2016-09-20 00:00:00',1,5,1,1),(416,'2016-09-20 00:00:00',1,6,1,1),(417,'2016-09-20 00:00:00',1,7,1,1),(418,'2016-09-20 00:00:00',1,8,1,1),(419,'2016-09-20 00:00:00',1,9,1,1),(420,'2016-09-20 00:00:00',1,10,1,1),(421,'2016-09-07 00:00:00',1,1,1,1),(422,'2016-09-07 00:00:00',1,2,1,1),(423,'2016-09-07 00:00:00',1,3,1,1),(424,'2016-09-07 00:00:00',1,4,1,1),(425,'2016-09-07 00:00:00',1,5,1,1),(426,'2016-09-07 00:00:00',1,6,1,1),(427,'2016-09-07 00:00:00',1,7,1,1),(428,'2016-09-07 00:00:00',1,8,1,1),(429,'2016-09-07 00:00:00',1,9,1,1),(430,'2016-09-07 00:00:00',1,10,1,1),(431,'2016-09-30 00:00:00',1,1,1,1),(432,'2016-09-30 00:00:00',1,2,1,1),(433,'2016-09-30 00:00:00',1,3,1,1),(434,'2016-09-30 00:00:00',1,4,1,1),(435,'2016-09-30 00:00:00',1,5,1,1),(436,'2016-09-30 00:00:00',1,6,1,1),(437,'2016-09-30 00:00:00',1,7,1,1),(438,'2016-09-30 00:00:00',1,8,1,1),(439,'2016-09-30 00:00:00',1,9,1,1),(440,'2016-09-30 00:00:00',1,10,1,1),(441,'2016-10-03 00:00:00',1,1,1,1),(442,'2016-10-03 00:00:00',1,2,1,1),(443,'2016-10-03 00:00:00',1,3,1,1),(444,'2016-10-03 00:00:00',1,4,1,1),(445,'2016-10-03 00:00:00',1,5,1,1),(446,'2016-10-03 00:00:00',1,6,1,1),(448,'2016-10-03 00:00:00',1,8,1,1),(449,'2016-10-03 00:00:00',1,9,1,1),(450,'2016-10-03 00:00:00',1,10,1,1),(511,'2016-10-04 00:00:00',1,1,1,1),(512,'2016-10-04 00:00:00',1,2,1,1),(513,'2016-10-04 00:00:00',1,3,1,1),(515,'2016-10-04 00:00:00',1,5,1,1),(516,'2016-10-04 00:00:00',1,6,1,1),(517,'2016-10-04 00:00:00',1,7,1,1),(518,'2016-10-04 00:00:00',1,8,1,1),(519,'2016-10-04 00:00:00',1,9,1,1),(520,'2016-10-04 00:00:00',1,10,1,1),(531,'2016-10-27 00:00:00',1,1,1,1),(532,'2016-10-27 00:00:00',1,2,1,1),(533,'2016-10-27 00:00:00',1,3,1,1),(534,'2016-10-27 00:00:00',1,4,1,1),(535,'2016-10-27 00:00:00',1,5,1,1),(536,'2016-10-27 00:00:00',1,6,1,1),(537,'2016-10-27 00:00:00',1,7,1,1),(538,'2016-10-27 00:00:00',1,8,1,1),(539,'2016-10-27 00:00:00',1,9,1,1),(540,'2016-10-27 00:00:00',1,10,1,1),(614,'2016-09-28 00:00:00',1,1,1,1),(738,'2016-10-04 00:00:00',1,4,1,1),(785,'2016-10-08 00:00:00',1,1,1,1),(786,'2016-10-08 00:00:00',1,2,1,1),(787,'2016-10-08 00:00:00',1,3,1,1),(788,'2016-10-08 00:00:00',1,4,1,1),(789,'2016-10-08 00:00:00',1,5,1,1),(790,'2016-10-08 00:00:00',1,6,1,1),(791,'2016-10-08 00:00:00',1,7,1,1),(792,'2016-10-08 00:00:00',1,8,1,1),(793,'2016-10-08 00:00:00',1,9,1,1),(794,'2016-10-08 00:00:00',1,10,1,1),(795,'2016-10-07 00:00:00',1,1,1,1),(796,'2016-10-07 00:00:00',1,2,1,1),(797,'2016-10-07 00:00:00',1,3,1,1),(798,'2016-10-07 00:00:00',1,4,1,1),(799,'2016-10-07 00:00:00',1,5,1,1),(800,'2016-10-07 00:00:00',1,6,1,1),(801,'2016-10-07 00:00:00',1,7,1,1),(802,'2016-10-07 00:00:00',1,8,1,1),(803,'2016-10-07 00:00:00',1,9,1,1),(804,'2016-10-07 00:00:00',1,10,1,1),(805,'2016-10-06 00:00:00',1,1,1,1),(806,'2016-10-06 00:00:00',1,2,1,1),(807,'2016-10-06 00:00:00',1,3,1,1),(808,'2016-10-06 00:00:00',1,4,1,1),(809,'2016-10-06 00:00:00',1,5,1,1),(810,'2016-10-06 00:00:00',1,6,1,1),(811,'2016-10-06 00:00:00',1,7,1,1),(812,'2016-10-06 00:00:00',1,8,1,1),(813,'2016-10-06 00:00:00',1,9,1,1),(814,'2016-10-06 00:00:00',1,10,1,1),(835,'2016-10-15 00:00:00',1,1,1,1),(836,'2016-10-15 00:00:00',1,2,1,1),(837,'2016-10-15 00:00:00',1,3,1,1),(838,'2016-10-15 00:00:00',1,4,1,1),(839,'2016-10-15 00:00:00',1,5,1,1),(840,'2016-10-15 00:00:00',1,6,1,1),(841,'2016-10-15 00:00:00',1,7,1,1),(842,'2016-10-15 00:00:00',1,8,1,1),(843,'2016-10-15 00:00:00',1,9,1,1),(844,'2016-10-15 00:00:00',1,10,1,1),(846,'2016-10-11 00:00:00',1,2,1,1),(847,'2016-10-11 00:00:00',1,3,1,1),(848,'2016-10-11 00:00:00',1,4,1,1),(857,'2016-10-12 00:00:00',1,3,1,1),(858,'2016-10-12 00:00:00',1,4,1,1),(859,'2016-10-12 00:00:00',1,5,1,1),(860,'2016-10-12 00:00:00',1,6,1,1),(861,'2016-10-12 00:00:00',1,7,1,1),(862,'2016-10-12 00:00:00',1,8,1,1),(863,'2016-10-12 00:00:00',1,9,1,1),(864,'2016-10-12 00:00:00',1,10,1,1),(865,'2016-10-13 00:00:00',1,1,1,1),(866,'2016-10-13 00:00:00',1,2,1,1),(867,'2016-10-13 00:00:00',1,3,1,1),(868,'2016-10-13 00:00:00',1,4,1,1),(869,'2016-10-13 00:00:00',1,5,1,1),(870,'2016-10-13 00:00:00',1,6,1,1),(871,'2016-10-13 00:00:00',1,7,1,1),(872,'2016-10-13 00:00:00',1,8,1,1),(873,'2016-10-13 00:00:00',1,9,1,1),(874,'2016-10-13 00:00:00',1,10,1,1),(875,'2016-10-14 00:00:00',1,1,1,1),(876,'2016-10-14 00:00:00',1,2,1,1),(877,'2016-10-14 00:00:00',1,3,1,1),(878,'2016-10-14 00:00:00',1,4,1,1),(879,'2016-10-14 00:00:00',1,5,1,1),(880,'2016-10-14 00:00:00',1,6,1,1),(881,'2016-10-14 00:00:00',1,7,1,1),(882,'2016-10-14 00:00:00',1,8,1,1),(883,'2016-10-14 00:00:00',1,9,1,1),(884,'2016-10-14 00:00:00',1,10,1,1),(885,'2016-10-14 00:00:00',1,1,2,1),(886,'2016-10-14 00:00:00',1,2,2,1),(887,'2016-10-14 00:00:00',1,3,2,1),(888,'2016-10-14 00:00:00',1,4,2,1),(889,'2016-10-14 00:00:00',1,5,2,1),(890,'2016-10-14 00:00:00',1,6,2,1),(891,'2016-10-14 00:00:00',1,7,2,1),(892,'2016-10-14 00:00:00',1,8,2,1),(893,'2016-10-14 00:00:00',1,9,2,1),(894,'2016-10-14 00:00:00',1,10,2,1),(895,'2016-10-17 00:00:00',1,1,1,1),(896,'2016-10-17 00:00:00',1,2,1,1),(897,'2016-10-17 00:00:00',1,3,1,1),(898,'2016-10-17 00:00:00',1,4,1,1),(899,'2016-10-17 00:00:00',1,5,1,1),(900,'2016-10-17 00:00:00',1,6,1,1),(901,'2016-10-17 00:00:00',1,7,1,1),(902,'2016-10-17 00:00:00',1,8,1,1),(903,'2016-10-17 00:00:00',1,9,1,1),(904,'2016-10-17 00:00:00',1,10,1,1),(905,'2016-10-18 00:00:00',1,1,1,1),(906,'2016-10-18 00:00:00',1,2,1,1),(907,'2016-10-18 00:00:00',1,3,1,1),(908,'2016-10-18 00:00:00',1,4,1,1),(909,'2016-10-18 00:00:00',1,5,1,1),(910,'2016-10-18 00:00:00',1,6,1,1),(911,'2016-10-18 00:00:00',1,7,1,1),(912,'2016-10-18 00:00:00',1,8,1,1),(913,'2016-10-18 00:00:00',1,9,1,1),(914,'2016-10-18 00:00:00',1,10,1,1),(915,'2016-10-19 00:00:00',1,1,1,1),(916,'2016-10-19 00:00:00',1,2,1,1),(917,'2016-10-19 00:00:00',1,3,1,1),(918,'2016-10-19 00:00:00',1,4,1,1),(919,'2016-10-19 00:00:00',1,5,1,1),(920,'2016-10-19 00:00:00',1,6,1,1),(921,'2016-10-19 00:00:00',1,7,1,1),(922,'2016-10-19 00:00:00',1,8,1,1),(923,'2016-10-19 00:00:00',1,9,1,1),(924,'2016-10-19 00:00:00',1,10,1,1),(925,'2016-10-17 00:00:00',1,1,2,1),(926,'2016-10-17 00:00:00',1,2,2,1),(927,'2016-10-17 00:00:00',1,3,2,1),(928,'2016-10-17 00:00:00',1,4,2,1),(929,'2016-10-17 00:00:00',1,5,2,1),(930,'2016-10-17 00:00:00',1,6,2,1),(931,'2016-10-17 00:00:00',1,7,2,1),(932,'2016-10-17 00:00:00',1,8,2,1),(933,'2016-10-17 00:00:00',1,9,2,1),(934,'2016-10-17 00:00:00',1,10,2,1),(935,'2016-10-18 00:00:00',1,1,2,1),(936,'2016-10-18 00:00:00',1,2,2,1),(937,'2016-10-18 00:00:00',1,3,2,1),(938,'2016-10-18 00:00:00',1,4,2,1),(939,'2016-10-18 00:00:00',1,5,2,1),(940,'2016-10-18 00:00:00',1,6,2,1),(941,'2016-10-18 00:00:00',1,7,2,1),(942,'2016-10-18 00:00:00',1,8,2,1),(943,'2016-10-18 00:00:00',1,9,2,1),(944,'2016-10-18 00:00:00',1,10,2,1),(945,'2016-10-19 00:00:00',1,1,2,1),(946,'2016-10-19 00:00:00',1,2,2,1),(947,'2016-10-19 00:00:00',1,3,2,1),(948,'2016-10-19 00:00:00',1,4,2,1),(949,'2016-10-19 00:00:00',1,5,2,1),(950,'2016-10-19 00:00:00',1,6,2,1),(951,'2016-10-19 00:00:00',1,7,2,1),(952,'2016-10-19 00:00:00',1,8,2,1),(953,'2016-10-19 00:00:00',1,9,2,1),(954,'2016-10-19 00:00:00',1,10,2,1),(955,'2016-10-20 00:00:00',1,1,2,1),(956,'2016-10-20 00:00:00',1,2,2,1),(957,'2016-10-20 00:00:00',1,3,2,1),(958,'2016-10-20 00:00:00',1,4,2,1),(959,'2016-10-20 00:00:00',1,5,2,1),(960,'2016-10-20 00:00:00',1,6,2,1),(961,'2016-10-20 00:00:00',1,7,2,1),(962,'2016-10-20 00:00:00',1,8,2,1),(963,'2016-10-20 00:00:00',1,9,2,1),(964,'2016-10-20 00:00:00',1,10,2,1),(975,'2016-10-22 00:00:00',1,1,2,1),(976,'2016-10-22 00:00:00',1,2,2,1),(977,'2016-10-22 00:00:00',1,3,2,1),(978,'2016-10-22 00:00:00',1,4,2,1),(979,'2016-10-22 00:00:00',1,5,2,1),(980,'2016-10-22 00:00:00',1,6,2,1),(981,'2016-10-22 00:00:00',1,7,2,1),(982,'2016-10-22 00:00:00',1,8,2,1),(983,'2016-10-22 00:00:00',1,9,2,1),(984,'2016-10-22 00:00:00',1,10,2,1);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordered` int(11) NOT NULL,
  `recieved` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,12,12,3,1),(2,234,230,4,2);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_order`
--

DROP TABLE IF EXISTS `stock_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_order` (
  `orderID` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_order`
--

LOCK TABLES `stock_order` WRITE;
/*!40000 ALTER TABLE `stock_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_writeoff`
--

DROP TABLE IF EXISTS `stock_writeoff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_writeoff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writeoff_date` date NOT NULL,
  `reason` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_writeoff`
--

LOCK TABLES `stock_writeoff` WRITE;
/*!40000 ALTER TABLE `stock_writeoff` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_writeoff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address_physical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `branch_number` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `bank_reference` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Aspen','Vuyani Mati','vuyani.mati@aspen.com','0119724075','0119262001','53','Active','ABSA','Brooklyn','246000','4025570844','Dlu0001'),(2,'ABC Supplies','Oliver Rantseli','Oliver@abc.co.za','0119724075','0119262001','55','Active','ABSA','Isando','265001','4025570844','Dlu0001'),(3,'Ish Supplies','Azhar Mu','azhar.m.ish@gmail.com','118563788','118563788','80','Active','FNB','Menlyn','98763','234567890','Ish001'),(4,'keaobee Supplies','Keaobaka Moletsane','keaobee@gmail.com','118563788','119262001','91','Active','ABSA','Brooklyn','246000','4025570844','Dlu0001'),(5,'Aspen3333','Azhar Mu','vuyani.mati@aspen.com','119724075','118563788','94','Active','Absa','Brooklyn','246000','234567890','Ish001'),(6,'Aspen3333','Azhar Mu','vuyani.mati@aspen.com','119724075','118563788','95','Active','Absa','Brooklyn','246000','234567890','Ish001');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timeslot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timeslot`
--

LOCK TABLES `timeslot` WRITE;
/*!40000 ALTER TABLE `timeslot` DISABLE KEYS */;
INSERT INTO `timeslot` VALUES (1,'08h00'),(2,'09h00'),(3,'10h00'),(4,'11h00'),(5,'12h00'),(6,'13h00'),(7,'14h00'),(8,'15h00'),(9,'16h00'),(10,'17h00');
/*!40000 ALTER TABLE `timeslot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` VALUES (1,'Mr'),(2,'Ms'),(3,'Mrs'),(4,'Dr'),(5,'Prof');
/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_booking`
--

DROP TABLE IF EXISTS `type_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_booking`
--

LOCK TABLES `type_booking` WRITE;
/*!40000 ALTER TABLE `type_booking` DISABLE KEYS */;
INSERT INTO `type_booking` VALUES (1,'Phone-in'),(2,'Walk-in'),(3,'Online');
/*!40000 ALTER TABLE `type_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_employee`
--

DROP TABLE IF EXISTS `type_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `duties` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_level` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_employee`
--

LOCK TABLES `type_employee` WRITE;
/*!40000 ALTER TABLE `type_employee` DISABLE KEYS */;
INSERT INTO `type_employee` VALUES (1,'Manager','to be added later','A'),(2,'Dentist','to be added later','B'),(3,'Dentist_assistant','to be added later','C'),(4,'Secretary','to be added later','D');
/*!40000 ALTER TABLE `type_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_medical_aid`
--

DROP TABLE IF EXISTS `type_medical_aid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_medical_aid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medical_aidID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_medical_aid`
--

LOCK TABLES `type_medical_aid` WRITE;
/*!40000 ALTER TABLE `type_medical_aid` DISABLE KEYS */;
INSERT INTO `type_medical_aid` VALUES (1,'Bonitas_type_1',1),(2,'Bonitas_type_2',1),(3,'Bonitas_type_3',1),(4,'GEMS_type_1',2),(5,'GEMS_type_2',2),(6,'GEMS_type_3',2),(7,'Discovery_Classic_Comprehensive',3),(8,'Discovery_Comprehensive',3),(9,'Discovery_Network',3),(10,'Palmed_type_1',4),(11,'Palmed_type_2',4),(12,'Palmed_type_3',4),(13,'Medshield_type_1',5),(14,'Medshield_type_2',5),(15,'Medshield_type_3',5),(16,'MedHealth_Network_Plus',6),(17,'CAMAF_Network_Plus',7);
/*!40000 ALTER TABLE `type_medical_aid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_member`
--

DROP TABLE IF EXISTS `type_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `patient_typeID` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_member`
--

LOCK TABLES `type_member` WRITE;
/*!40000 ALTER TABLE `type_member` DISABLE KEYS */;
INSERT INTO `type_member` VALUES (1,'60012',1),(2,'30409',1),(3,'30409',2);
/*!40000 ALTER TABLE `type_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_patient`
--

DROP TABLE IF EXISTS `type_patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_patient`
--

LOCK TABLES `type_patient` WRITE;
/*!40000 ALTER TABLE `type_patient` DISABLE KEYS */;
INSERT INTO `type_patient` VALUES (1,'Main'),(2,'Dependant');
/*!40000 ALTER TABLE `type_patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_payment`
--

DROP TABLE IF EXISTS `type_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_payment`
--

LOCK TABLES `type_payment` WRITE;
/*!40000 ALTER TABLE `type_payment` DISABLE KEYS */;
INSERT INTO `type_payment` VALUES (1,'Cash'),(2,'Medical Aid');
/*!40000 ALTER TABLE `type_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_procedure`
--

DROP TABLE IF EXISTS `type_procedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_procedure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_procedure`
--

LOCK TABLES `type_procedure` WRITE;
/*!40000 ALTER TABLE `type_procedure` DISABLE KEYS */;
INSERT INTO `type_procedure` VALUES (1,'Z01','Dental examination'),(2,'K02','Caries of dentine'),(3,'K01','Impacted teeth'),(4,'K03','Dental and oral diseases with mcc');
/*!40000 ALTER TABLE `type_procedure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_product`
--

DROP TABLE IF EXISTS `type_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_product`
--

LOCK TABLES `type_product` WRITE;
/*!40000 ALTER TABLE `type_product` DISABLE KEYS */;
INSERT INTO `type_product` VALUES (1,'Pain killer','For pain relief'),(2,'Antibiotics','For treatment of infections'),(3,'Nutritional Supplement','Daily vitality and well being ');
/*!40000 ALTER TABLE `type_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_write_off`
--

DROP TABLE IF EXISTS `type_write_off`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_write_off` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_write_off`
--

LOCK TABLES `type_write_off` WRITE;
/*!40000 ALTER TABLE `type_write_off` DISABLE KEYS */;
INSERT INTO `type_write_off` VALUES (1,'Costs too small to recover'),(2,'Patient is unable to pay');
/*!40000 ALTER TABLE `type_write_off` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< HEAD
-- Dump completed on 2016-10-17  0:54:31
=======
-- Dump completed on 2016-10-17  2:26:49
>>>>>>> 3d79ce79a65d7181bd7f8075fac22105d5a6f79b
