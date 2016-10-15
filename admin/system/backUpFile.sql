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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_pyhsical`
--

LOCK TABLES `address_pyhsical` WRITE;
/*!40000 ALTER TABLE `address_pyhsical` DISABLE KEYS */;
INSERT INTO `address_pyhsical` VALUES (1,'1135','Francis Baard','Hatfield','2823',3),(2,'1136','Francis Baard street','Hatfield','2823',3),(3,'1137','Francis Baard street','Hatfield','2823',3),(4,'1134','Francis Baard street','Hatfield','2823',3),(5,'1134','Francis Baard street','Hatfield','2823',3),(6,'1133','Francis Baard stree','Hatfield','2823',3),(7,'1234','Francis Baard street','Hatfield','2823',3),(8,'1234','Francis Baard street','Hatfield','2812',3),(9,'1234','Francis Baard street','Hatfield','2843',3),(10,'1234','Francis Baard street','Hatfield','2834',3),(11,'1234','Francis Baard street','Hatfield','2834',3),(12,'1234','Francis Baard street','Hatfield','2834',3),(13,'1234','Francis Baard street','Hatfield','2834',3),(14,'1234','Francis Baard street','Hatfield','2834',3),(15,'1234','Francis Baard street','Hatfield','2843',3),(16,'1234','Francis Baard street','Hatfield','2834',3),(17,'1234','Francis Baard street','Hatfield','2834',3),(18,'1234','Francis Baard street','Hatfield','2834',3),(19,'1234','Francis Baard street','Hatfield','2834',3),(20,'1234','Francis Baard street','Hatfield','2834',3),(21,'177','General De La Rey street','Bendor','6993',1),(22,'177','General De La Rey street','Bendor','6993',1),(23,'177','General De La Rey street','Bendor','6993',1),(24,'177','General De La Rey street','Bendor','6993',1),(25,'177','General De La Rey street','Bendor','6992',1),(26,'177','General De La Rey street','Bendor','699',1),(27,'177','General De La Rey street','Bendor','699',1),(28,'177','General De La Rey street','Bendor','699',1),(29,'177','General De La Rey street','Hatfield','699',1),(30,'177','General De La Rey street','Hatfield','699',1),(31,'1234','Arcadia street','Arcadia','25',3),(32,'123','Marshal street','Flora park','699',1),(33,'7556','Hilary drive','Arcadia','28',3),(34,'7556','Hilary drive','Arcadia','28',3),(35,'7556','Hilary drive','Arcadia','28',3),(36,'456','Pongola Drive','Birchleigh','1618',2),(37,'346','Pongola Drive','Birchleigh','1618',2),(38,'345','Close Lane','North Cliff','1618',2),(39,'935','Pongola River Drive','Birchleigh North','1618',4),(40,'395','Pongola River Drive ','Birchleigh North','1618',4),(49,'396','pc drive ','soweto','1618',4),(50,'935','Pongola River Drive','Birchleigh North','1618',1),(51,'123','Prospect','Hatfield','8332',3),(52,'1','Bosbok','Birchleigh','1618',4),(53,'1','Bosbok','Birchleigh','1618',4),(54,'123','Pongola River Drive','Birchleigh North','1618',4),(55,'1','Bosbok','Birchleigh','8323',3),(56,'935','Pongola River Drive','Birchleigh','8323',1),(57,'935','Bosbok','Birchleigh','8323',1),(58,'935','Bosbok','Birchleigh','1618',1),(59,'935','Bosbok','Birchleigh North','1618',1),(60,'935','Bosbok','Birchleigh North','1618',1),(61,'237','Burnett','Hatfield','1882',3),(62,'1','Bosbok','Birchleigh','1618',2),(63,'123','Burnett Street','Hatfield','1882',3),(64,'123','Pongola River Drive','soweto','1618',1),(65,'1','Bosbok','Birchleigh','1618',2),(66,'678','Burnett Street','Hatfield','8367',3),(67,'678','Burnett Street','Hatfield','83',3),(68,'1','Bosbok','Birchleigh','1618',2),(69,'123','Bosbok','Birchleigh','188',2),(70,'1','Bosbok','Birchleigh','1618',2),(71,'1','Bosbok','Birchleigh','1618',2),(72,'1','Bosbok','Birchleigh','1618',2),(73,'1','Bosbok','Birchleigh','1618',2),(74,'1','Bosbok','Birchleigh','1618',2),(75,'1','Bosbok','Birchleigh','1618',2),(76,'1','Bosbok','Birchleigh','1618',2),(77,'1','Bosbok','Birchleigh','1618',2),(78,'1','Bosbok','Birchleigh','1618',2),(79,'1','Bosbok','Birchleigh','1618',2),(80,'23','Lynwood Road','Lynwood','82',3),(81,'23','Lynwood Road','Lynwood','82',3),(82,'23','Lynwood Road','Lynwood','82',3),(83,'23','Lynwood Road','Lynwood','82',3),(84,'23','Lynwood Road','Lynwood','82',3),(85,'23','Lynwood Road','Lynwood','82',3),(86,'935','Lynwood Road','Hatfield','82',3),(87,'935','Pongola River Drive','Birchleigh','82',4),(88,'935','Pongola River Drive','Birchleigh','82',4),(89,'935','Pongola River Drive','Birchleigh','82',4),(90,'1','Bosbok','Birchleigh','1618',2),(91,'935','Bosbok','Birchleigh','1618',3),(92,'935','Bosbok','Birchleigh','1618',2),(93,'1','Bosbok','Birchleigh','1618',2);
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
INSERT INTO `city` VALUES (1,'Polokwane',1),(2,'Tzaneen',1),(3,'Pretoria',2),(4,'Johannesburg',2);
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
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `booking_typeID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultation`
--

LOCK TABLES `consultation` WRITE;
/*!40000 ALTER TABLE `consultation` DISABLE KEYS */;
INSERT INTO `consultation` VALUES (1,'','Pending',3,1,3,2,1,24,2),(2,'','Pending',3,1,4,2,2,25,2),(3,'','Pending',3,1,1,2,1,2006,2),(4,'','Pending',3,1,1,2,1,10,2),(5,'','Pending',3,2,7,2,1,9,2),(6,'','Pending',3,2,1,2,1,9,2),(7,'','Pending',3,2,1,2,2,8,2),(8,'','Pending',3,1,3,2,3,8,2),(9,'','Pending',3,2,8,2,3,9,2),(10,'','Pending',3,2,8,2,3,9,2),(11,'','Pending',3,2,10,2,3,6,2),(12,'','Pending',3,2,10,2,3,6,2),(13,'','Pending',3,2,10,2,3,6,2),(14,'','Pending',3,2,3,2,1,8,2),(15,'','Pending',3,1,4,1,5,8,2);
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
  `cellphone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `banking_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_postalID` int(11) NOT NULL,
  `address_physicalID` int(11) NOT NULL,
  `genderID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL DEFAULT '1',
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Malesela','Ramphele','2147483647234','bam1234','$2y$10$lCDonWcPwK7sd9e/59ueV.jQ3kq/nHOE03Cpt7Ubrx4B1MAq3/BH6','0761921351','0761921351','ramphele@yahoo.com','active','1234567890 ABSA Hatfield 123456',1,1,1,1,1,1,'new.png'),(9,'name','surname','2147483647','user','pass','1234567890','1234567890','email','active','banking',1,1,1,1,4,1,''),(10,'Solomon','Mahlatji','2147483647','Sol9903','$2y$10$WT/9uFuI9VLvNoI41fZ0hu2/W2foFVnkzAnan7Y9QICea1adfGU36','814568543','814568543','ar@yahoo.com','active','4078080733 ABSA',32,29,1,1,4,1,''),(11,'Malesela','Kekana','2147483647','Mal3921','$2y$10$uFA0Gvae/KhBR7PQV2iLY.FWoQJPCy9JbCRH7F/qRdiXjvZw6GbSi','829334302','829334302','ramphele@yahoo.com','active','4078080733 ABSA, Hatfield 123456',34,31,1,1,4,1,''),(12,'Bam','Chabalala','2147483647','Bam7251','$2y$10$.y.eWqdq.qV02tKW2z57W.YM7ZihAKKL//Zq6yPLUplLAG/s6UP6m','761921351','117893548','ramphele@yahoo.com','active','4078080733 ABSA, Hatfield 123456',35,32,1,1,4,1,''),(13,'Solomon','Manzini','2147483647','Sol9595','$2y$10$JU0aKoF0JdAAW5vLihMKnuzKUujYXDqnVq6VA./.r76RXvuC9/Xyy','814568543','117893548','esr@sdf.com','Active','12345665433 FNB, Hatfield 123456',39,36,1,1,4,1,''),(14,'Mike','Stevens','2147483647','Mik1156','$2y$10$VswLY9odXbYXm8W2XxjY4O41jZdG1UKxn6kClcQx7WtTQm9u9ndK6','829334302','117893548','ram@yahoo.com','Active','123456789012 Capitec, Hatfield 2345',41,38,1,1,4,1,''),(15,'Ntokozo','Sindane','2147483647','Nto6841','$2y$10$jdVHZe109ApyGs3fjPHOquQ56Td7Xs2LdMaO9lTmI45N.TqiQnA0m','789874567','119763462','ntokz@gmail.com','Active','Ntokz bank details',42,39,1,1,1,1,''),(16,'Repetition','Mabena','2147483647','Rep1385','$2y$10$WyFVQuys0iu7Iw3ELMACHeW4Ay./jmdl4J7slTQ5UsMRSnugH9vCi','789874567','112435689','153347766@tuks.co.za','Active','Testing 123',54,51,1,1,2,2,''),(17,'Nhlanhla','Sithole','9412091232091','Nhl7711','$2y$10$uSgNYMnwgWFthYRPKfJ/p.dUMjjQibox6ADo0WX7xBTeSIv2I5u5K','987654321','112435689','some@dm.com','Active','12345678 ABSA 12343',66,66,1,1,3,2,''),(18,'Repetition','Sindane','9412091232092','Rep6785','$2y$10$dR7Xsx2au/GqylB2yab4H.569EzYO8WJVeQ2.9U6oavYxEdvYm13a','789874567','112435689','some@dm.com','Active','Absa, 1234565, Hatfield, 4321',67,67,2,2,4,1,''),(19,'Ntokozo','Remane','5423456789079','Nto8990','$2y$10$1s5g1E6vaTDg/cqn7EUD5.L/IE2xS5dSiuVU2iTRJ1Rb9jv6zst..','789874567','119763462','ntokz@gmail.com','Active','Absa 23456765\r\nHatfield 5433',68,68,2,2,2,1,''),(20,'Shaquil','Remane','9302125567400','Sha7595','$2y$10$X4EVLdBk0J8A45XGWKeS4OwDP3W1489CM/tQmpqHTW8n56QegrkS6','789874567','119763462','ntokz@gmail.com','active','werdfgdsa',70,70,1,2,1,1,'werdfgdsa'),(21,'Shaquil','Remane','9302125567400','Sha9717','$2y$10$qqV.5hx8qD1NEQn5May0OucFXV8msFF5nl.feagkU9OEH5mB6ZF.y','789874567','119763462','ntokz@gmail.com','active','werdfgdsa',71,71,1,2,1,1,'werdfgdsa'),(22,'Shaquil','Remane','9302125567400','Sha1622','$2y$10$p193JkoHh6TCsOlUv6Lvoe3Lu3HV2jUsugDQkQx7F07jnMm8mfvUq','789874567','119763462','ntokz@gmail.com','active','werdfgdsa',72,72,1,2,1,1,'werdfgdsa'),(23,'Maringa','Remane','5423456789000','Mar6200','$2y$10$TEaF6VrvlGvQxgN7fo.syutHXhLs1bwRR.KArpy5uo/0NKXk6cF7e','789874567','112435689','ntokz@gmail.com','active','tyjhgfds',78,78,2,2,3,1,'new.png'),(24,'Maringa','Remane','5423456789000','Mar3053','$2y$10$OrgJ4tuyewnDGzZfgOOwpeH1ejZk7OYnsgSz1Rci/LT89FQ65YAQO','789874567','112435689','ntokz@gmail.com','active','tyjhgfds',79,79,2,2,3,1,'new.png'),(25,'Skhumba','Hlombe','4556677856475','Skh1227','$2y$10$oiX6ahgMuk7joFCHAD4K7eKmdWbOuhovL7ly3QYFds2eVLfT2JSfu','856455637','119763462','shakilremane@gmail.com','active','FNB, 4567890546\r\nHatfield, 78900',80,87,1,1,3,1,''),(26,'Skhumba','Hlombe','4556677856475','Skh4861','$2y$10$N6qCR/uPD9O5/f4mOWQ89eXlHEoUQAVO7xuekOnBuXLRQk2vVkoaq','856455637','119763462','shakilremane@gmail.com','active','FNB, 4567890546\r\nHatfield, 78900',81,88,1,1,3,1,''),(27,'Skhumba','Hlombe','4556677856475','Skh2496','$2y$10$2UkbNBX4PD68aK6.0gaBBOLKyHkgoeO695gCeyXE7TK5AiOMB4XnC','856455637','119763462','shakilremane@gmail.com','active','FNB, 4567890546\r\nHatfield, 78900',82,89,1,1,3,1,'');
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
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female'),(3,'Other');
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
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `patientID` int(11) NOT NULL,
  `consultationID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `line_invoice`
--

DROP TABLE IF EXISTS `line_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line_invoice` (
  `product_quantity` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `procedureID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line_invoice`
--

LOCK TABLES `line_invoice` WRITE;
/*!40000 ALTER TABLE `line_invoice` DISABLE KEYS */;
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
INSERT INTO `medical_aid` VALUES (1,'Bonitas',1,1,'0123456789','0123456789','something@bonitas.co.za'),(2,'GEMS',1,1,'0123456789','0123456789','something@gems.co.za'),(3,'Discovery',1,1,'123456789','0123456789','something@discovery.co.za'),(4,'Palmed',1,1,'123456789','123456789','something@palmed.co.za'),(5,'Medshield',1,1,'123456789','123456789','something@medshield.co.za'),(6,'CAMAF',43,40,'112345567','112345567','info@camaf.co.za'),(7,'CAMAF',53,50,'112345567','112345567','info@camaf.co.za');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (3,'Ntokozo','Ramphele','9302125567464','1993-02-12','0119763462','0789874567','ntokz@gmail.com','new.png','f-43134',NULL,1,2,60,60,1,3),(4,'Repetition','Remane','5423456789078','1987-03-02','0119763462','0789874567','ntokz@gmail.com','new.png','f-15880',NULL,5,1,62,62,2,5),(5,'Shaquil','Remane','9302125567465','1995-11-08','','0799101630','shakilremane@gmail.com','new.png','f-93416',NULL,1,1,63,63,5,6),(6,'Sphe','Malo','4356789045321','1993-05-06','','0987654321','ssmalo@gmail.com','new.png','f-21788',NULL,4,2,64,64,17,7),(7,'Shaquil','Remane','3245678934563','3433-03-03','0112435689','0789874567','ntokz@gmail.com','new.png','f-64385',NULL,2,1,65,65,17,8),(8,'Ntokozo','Mabeni','7423456789078','4321-04-04','0119763462','0987654321','ntokz@gmail.com','new.png','f-20953',NULL,2,2,69,69,15,9),(9,'Keaobaka','Moletsane','9412091232111','1992-03-02','0987654321','0987654321','shakilremane@gmail.com','new.png','f-75401',NULL,1,1,83,93,11,10);
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
  `invoiceID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `payment_typeID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
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
INSERT INTO `practice_location` VALUES (1,'Tembisa'),(2,'Birch_Acres');
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
  `favorite` int(11) NOT NULL DEFAULT '0',
  `procedure_typeID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedure`
--

LOCK TABLES `procedure` WRITE;
/*!40000 ALTER TABLE `procedure` DISABLE KEYS */;
INSERT INTO `procedure` VALUES (1,' Abrasion of teeth','K03.10',156,1,33),(2,'Dental root caries','K02.70',345,0,28);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (9,'P-3882','Myprodol','Anti-Inflammatory',85,20,18,6,0,3,0),(11,'P-3592','Gen Payne','For Unbearable pain relief',200,125,30,5,1,8,0),(12,'P-6988','Bio Stratch','Natural nutritional supplement - supports immune system',76,23,60,5,0,10,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,'2016-08-25 00:00:00',0,1,2,1),(2,'2016-08-25 00:00:00',0,2,2,1),(3,'2016-08-25 00:00:00',0,3,2,1),(4,'2016-08-25 00:00:00',0,4,2,1),(5,'2016-08-25 00:00:00',0,5,2,1),(6,'2016-08-25 00:00:00',0,6,2,1),(7,'2016-08-25 00:00:00',0,7,2,1),(8,'2016-08-25 00:00:00',0,8,2,1),(9,'2016-08-26 00:00:00',0,2,2,1),(10,'2016-08-26 00:00:00',1,3,2,1),(11,'2016-08-26 00:00:00',1,4,2,1),(12,'2016-08-26 00:00:00',1,5,2,1),(13,'2016-08-26 00:00:00',1,6,2,1),(14,'2016-08-26 00:00:00',1,7,2,1),(15,'2016-08-26 00:00:00',1,8,2,1),(16,'2016-08-27 00:00:00',0,2,2,1),(17,'2016-08-27 00:00:00',0,3,2,1),(18,'2016-08-27 00:00:00',1,4,2,1),(19,'2016-08-27 00:00:00',1,5,2,1),(20,'2016-08-27 00:00:00',1,6,2,1),(21,'2016-08-27 00:00:00',1,7,2,1),(22,'2016-08-27 00:00:00',1,8,2,1),(23,'2016-09-03 00:00:00',1,2,1,1),(24,'2016-09-03 00:00:00',1,3,1,1),(25,'2016-09-03 00:00:00',1,4,1,1),(26,'2016-09-03 00:00:00',1,5,1,1),(27,'2016-09-04 00:00:00',0,1,1,1),(28,'2016-09-04 00:00:00',1,2,1,1),(29,'2016-09-04 00:00:00',0,3,1,1),(30,'2016-09-04 00:00:00',0,4,1,1),(31,'2016-09-04 00:00:00',1,5,1,1),(32,'2016-09-04 00:00:00',1,6,1,1),(33,'2016-09-04 00:00:00',1,7,1,1),(34,'2016-09-05 00:00:00',0,1,1,1),(35,'2016-09-05 00:00:00',1,2,1,1),(36,'2016-09-05 00:00:00',0,3,1,1),(37,'2016-09-05 00:00:00',0,4,1,1),(38,'2016-09-05 00:00:00',1,5,1,1),(39,'2016-09-05 00:00:00',1,6,1,1),(40,'2016-09-05 00:00:00',1,7,1,1),(41,'2016-09-01 00:00:00',1,1,1,1),(42,'2016-09-01 00:00:00',1,2,1,1),(43,'2016-09-01 00:00:00',1,3,1,1),(44,'2016-09-01 00:00:00',1,4,1,1),(45,'2016-09-01 00:00:00',1,5,1,1),(46,'2016-09-01 00:00:00',1,6,1,1),(47,'2016-09-01 00:00:00',1,7,1,1),(48,'2016-09-01 00:00:00',1,8,1,1),(49,'2016-09-01 00:00:00',1,9,1,1),(50,'2016-09-01 00:00:00',1,10,1,1),(51,'2016-09-02 00:00:00',1,1,1,1),(52,'2016-09-02 00:00:00',1,2,1,1),(53,'2016-09-02 00:00:00',1,3,1,1),(54,'2016-09-02 00:00:00',1,4,1,1),(55,'2016-09-02 00:00:00',1,5,1,1),(56,'2016-09-02 00:00:00',1,6,1,1),(57,'2016-09-02 00:00:00',1,7,1,1),(58,'2016-09-02 00:00:00',1,8,1,1),(59,'2016-09-02 00:00:00',1,9,1,1),(60,'2016-09-02 00:00:00',1,10,1,1),(71,'2016-09-29 00:00:00',1,1,1,1),(72,'2016-09-29 00:00:00',1,2,1,1),(73,'2016-09-29 00:00:00',1,3,1,1),(74,'2016-09-29 00:00:00',1,4,1,1),(75,'2016-09-29 00:00:00',1,5,1,1),(76,'2016-09-29 00:00:00',1,6,1,1),(77,'2016-09-29 00:00:00',1,7,1,1),(78,'2016-09-29 00:00:00',1,8,1,1),(79,'2016-09-29 00:00:00',1,9,1,1),(80,'2016-09-29 00:00:00',1,10,1,1),(81,'2016-09-28 00:00:00',1,1,1,1),(82,'2016-09-28 00:00:00',1,2,1,1),(83,'2016-09-28 00:00:00',1,3,1,1),(84,'2016-09-28 00:00:00',1,4,1,1),(85,'2016-09-28 00:00:00',1,5,1,1),(86,'2016-09-28 00:00:00',1,6,1,1),(87,'2016-09-28 00:00:00',1,7,1,1),(88,'2016-09-28 00:00:00',1,8,1,1),(89,'2016-09-28 00:00:00',1,9,1,1),(90,'2016-09-28 00:00:00',1,10,1,1),(91,'2016-09-27 00:00:00',1,1,1,1),(92,'2016-09-27 00:00:00',1,2,1,1),(93,'2016-09-27 00:00:00',1,3,1,1),(94,'2016-09-27 00:00:00',1,4,1,1),(95,'2016-09-27 00:00:00',1,5,1,1),(96,'2016-09-27 00:00:00',1,6,1,1),(97,'2016-09-27 00:00:00',1,7,1,1),(98,'2016-09-27 00:00:00',1,8,1,1),(99,'2016-09-27 00:00:00',1,9,1,1),(100,'2016-09-27 00:00:00',1,10,1,1),(111,'2016-10-03 00:00:00',1,1,1,1),(112,'2016-10-03 00:00:00',1,2,1,1),(113,'2016-10-03 00:00:00',1,3,1,1),(114,'2016-10-03 00:00:00',1,4,1,1),(115,'2016-10-03 00:00:00',1,5,1,1),(116,'2016-10-03 00:00:00',1,6,1,1),(117,'2016-10-03 00:00:00',1,7,1,1),(118,'2016-10-03 00:00:00',1,8,1,1),(119,'2016-10-03 00:00:00',1,9,1,1),(120,'2016-10-03 00:00:00',1,10,1,1),(121,'2016-10-04 00:00:00',1,1,1,1),(122,'2016-10-04 00:00:00',1,2,1,1),(123,'2016-10-04 00:00:00',1,3,1,1),(124,'2016-10-04 00:00:00',1,4,1,1),(125,'2016-10-04 00:00:00',1,5,1,1),(126,'2016-10-04 00:00:00',1,6,1,1),(127,'2016-10-04 00:00:00',1,7,1,1),(128,'2016-10-04 00:00:00',1,8,1,1),(129,'2016-10-04 00:00:00',1,9,1,1),(130,'2016-10-04 00:00:00',1,10,1,1),(131,'2016-12-01 00:00:00',1,1,1,1),(132,'2016-12-01 00:00:00',1,2,1,1),(133,'2016-12-01 00:00:00',1,3,1,1),(134,'2016-12-01 00:00:00',1,4,1,1),(135,'2016-12-01 00:00:00',1,5,1,1),(136,'2016-12-01 00:00:00',1,6,1,1),(137,'2016-12-01 00:00:00',1,7,1,1),(138,'2016-12-01 00:00:00',1,8,1,1),(139,'2016-12-01 00:00:00',1,9,1,1),(140,'2016-12-01 00:00:00',1,10,1,1),(141,'2016-10-06 00:00:00',1,1,1,1),(142,'2016-10-06 00:00:00',1,2,1,1),(143,'2016-10-06 00:00:00',1,3,1,1),(144,'2016-10-06 00:00:00',1,4,1,1),(145,'2016-10-06 00:00:00',1,5,1,1),(146,'2016-10-06 00:00:00',1,6,1,1),(147,'2016-10-06 00:00:00',1,7,1,1),(148,'2016-10-06 00:00:00',1,8,1,1),(149,'2016-10-06 00:00:00',1,9,1,1),(150,'2016-10-06 00:00:00',1,10,1,1),(181,'2016-11-23 00:00:00',1,1,1,1),(182,'2016-11-23 00:00:00',1,2,1,1),(183,'2016-11-23 00:00:00',1,3,1,1),(184,'2016-11-23 00:00:00',1,4,1,1),(185,'2016-11-23 00:00:00',1,5,1,1),(186,'2016-11-23 00:00:00',1,6,1,1),(187,'2016-11-23 00:00:00',1,7,1,1),(188,'2016-11-23 00:00:00',1,8,1,1),(189,'2016-11-23 00:00:00',1,9,1,1),(190,'2016-11-23 00:00:00',1,10,1,1),(191,'2017-03-04 00:00:00',1,1,1,1),(192,'2017-03-04 00:00:00',1,2,1,1),(193,'2017-03-04 00:00:00',1,3,1,1),(194,'2017-03-04 00:00:00',1,4,1,1),(195,'2017-03-04 00:00:00',1,5,1,1),(196,'2017-03-04 00:00:00',1,6,1,1),(197,'2017-03-04 00:00:00',1,7,1,1),(198,'2017-03-04 00:00:00',1,8,1,1),(199,'2017-03-04 00:00:00',1,9,1,1),(200,'2017-03-04 00:00:00',1,10,1,1),(201,'2017-03-04 00:00:00',1,1,1,1),(202,'2017-03-04 00:00:00',1,2,1,1),(203,'2017-03-04 00:00:00',1,3,1,1),(204,'2017-03-04 00:00:00',1,4,1,1),(205,'2017-03-04 00:00:00',1,5,1,1),(206,'2017-03-04 00:00:00',1,6,1,1),(207,'2017-03-04 00:00:00',1,7,1,1),(208,'2017-03-04 00:00:00',1,8,1,1),(209,'2017-03-04 00:00:00',1,9,1,1),(210,'2017-03-04 00:00:00',1,10,1,1),(222,'2016-10-10 00:00:00',1,1,1,1),(223,'2016-10-10 00:00:00',1,3,1,1),(224,'2016-10-10 00:00:00',1,5,1,1),(225,'2016-10-17 00:00:00',1,1,1,1),(226,'2016-10-17 00:00:00',1,2,1,1),(227,'2016-10-17 00:00:00',1,3,1,1),(228,'2016-10-17 00:00:00',1,6,1,1),(229,'2016-10-14 00:00:00',1,1,1,1),(230,'2016-10-14 00:00:00',1,2,1,1);
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
INSERT INTO `stock` VALUES (1,12,12,9,1),(2,234,230,11,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Aspen','Vuyani Mati','vuyani.mati@aspen.com','0119724075','0119262001','53','Active','ABSA','Brooklyn','246000','4025570844','Dlu0001'),(2,'ABC Supplies','Oliver Rantseli','Oliver@abc.co.za','0119724075','0119262001','55','Active','ABSA','Isando','265001','4025570844','Dlu0001'),(3,'Ish Supplies','Azhar Mu','azhar.m.ish@gmail.com','118563788','118563788','80','Active','FNB','Menlyn','98763','234567890','Ish001'),(11,'keaobee Supplies','Keaobaka Moletsane','keaobee@gmail.com','118563788','119262001','91','Active','ABSA','Brooklyn','246000','4025570844','Dlu0001'),(12,'keaobee Supplies','Keaobaka Moletsane','keaobee@gmail.com','118563788','119262001','92','Active','ABSA','Brooklyn','246000','4025570844','Dlu0001');
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
INSERT INTO `type_booking` VALUES (1,'phone-in'),(2,'walk-in'),(3,'online');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_employee`
--

LOCK TABLES `type_employee` WRITE;
/*!40000 ALTER TABLE `type_employee` DISABLE KEYS */;
INSERT INTO `type_employee` VALUES (1,'Manager','to be added later'),(2,'Dentist','to be added later'),(3,'Dentist_assistant','to be added later'),(4,'Secretary','to be added later');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_member`
--

LOCK TABLES `type_member` WRITE;
/*!40000 ALTER TABLE `type_member` DISABLE KEYS */;
INSERT INTO `type_member` VALUES (3,'10596',1),(4,'67799',1),(5,'25342',1),(6,'75830',1),(7,'10596',2),(8,'52973',1),(9,'84698',1),(10,'12057',1);
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
INSERT INTO `type_patient` VALUES (1,'main'),(2,'dependant');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_payment`
--

LOCK TABLES `type_payment` WRITE;
/*!40000 ALTER TABLE `type_payment` DISABLE KEYS */;
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
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_procedure`
--

LOCK TABLES `type_procedure` WRITE;
/*!40000 ALTER TABLE `type_procedure` DISABLE KEYS */;
INSERT INTO `type_procedure` VALUES (1,'Dental examination','Z01'),(2,'Caries of dentine','K02'),(28,'Impacted teeth','K01'),(33,'Dental and oral diseases with mcc','K03');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_product`
--

LOCK TABLES `type_product` WRITE;
/*!40000 ALTER TABLE `type_product` DISABLE KEYS */;
INSERT INTO `type_product` VALUES (3,'Antibiotics','For treatment of infections'),(8,'Painkiller','For pain relief'),(10,'Nutritional Supplement','Daily vitality and well being ');
/*!40000 ALTER TABLE `type_product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-15 13:38:41
