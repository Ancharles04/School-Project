-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AUDIOBOOK`
--

DROP TABLE IF EXISTS `AUDIOBOOK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `AUDIOBOOK` (
  `ISBN` int NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` int NOT NULL,
  `TITLE` varchar(60) DEFAULT NULL,
  `AUTHOR_NAME` varchar(100) DEFAULT NULL,
  `PUBLISHER` varchar(50) DEFAULT NULL,
  `PUBLISH_DATE` date DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `MEDIA_TYPE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `FK_AUDIOBOOK_ITEM_idx` (`ITEM_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=81000127 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AUDIOBOOK`
--

LOCK TABLES `AUDIOBOOK` WRITE;
/*!40000 ALTER TABLE `AUDIOBOOK` DISABLE KEYS */;
INSERT INTO `AUDIOBOOK` VALUES (906,23,'edge of seventeen','','','2020-07-05','','music'),(549536,24,'PHP and MYSQL beginners','Henry','Amazon','2020-07-05','Education','audiobook'),(9845749,21,'PHP and MySQL','William','O Reilly','2020-02-02','Education','audio book'),(81000122,24,'PHP&R','Henry','Penguin','2020-11-29','Education','audiobook'),(81000126,30,'Learning R soon','William Wordsworth','Penguin','2020-11-29','Education','audiobook');
/*!40000 ALTER TABLE `AUDIOBOOK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BOOK`
--

DROP TABLE IF EXISTS `BOOK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `BOOK` (
  `BOOK_ID` int NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` int NOT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `AUTHOR_NAME` varchar(100) DEFAULT NULL,
  `PUBLISHER` varchar(50) DEFAULT NULL,
  `PUBLISH_DATE` date DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `MEDIA_TYPE` varchar(30) DEFAULT NULL,
  `book_desc` varchar(1000) NOT NULL,
  PRIMARY KEY (`BOOK_ID`),
  KEY `FK_BOOK_ITEM_idx` (`ITEM_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=1908606207 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BOOK`
--

LOCK TABLES `BOOK` WRITE;
/*!40000 ALTER TABLE `BOOK` DISABLE KEYS */;
INSERT INTO `BOOK` VALUES (454957,9,'How to code in R?','Thomas','Amazon','2020-11-29','Education','audiobook',''),(854983,21,'Learning PHP','Williams','Penguin','2012-08-06','Education','book','Learn PHP in a faster way!'),(5743535,34,'PHP&MYSQL','','2020-10-12','2012-08-06','','periodical',''),(81000122,21,'PHP&MYSQL','Henry','Amazon','2020-12-09','Education','book','Learn PHP in a faster way!'),(81000124,24,'Javasript and SQL','Thomas','Penguin','2020-11-29','Education','book','Learn Javascript in a faster way!'),(81000126,24,'SQL for Beginners','Henry','Penguin','2020-11-29','Education','book','Learn SQL in a faster way!'),(81000128,22,'PHP & MYSQL Easy','Henry','Amazon','2020-11-29','Education','book','Learn PHP in a faster way!'),(618260307,2,'The Hobbit                            ','J. R. R. Tolkien  ','Houghton Mifflin','2020-02-06','Fiction','book','Turn the pages of the most famous books of all time and marvel at the stories behind them. Over 75 of the world\'s most celebrated, controversial, rare, and seminal books are examined and explained in this stunning treasury.'),(908606273,3,'My cat likes to hide in boxes','Lynley Dodd       ',' Mallinson Rendel ','2020-03-12','Entertainment','book','Turn the pages of the most famous books of all time and marvel at the stories behind them. Over 75 of the world\'s most celebrated, controversial, rare, and seminal books are examined and explained in this stunning treasury.'),(908606664,4,'Slinky Malinki                            ','Lynley Dodd       ',' Mallinson Rendel ','2020-02-06','Entertainment','book','Lynley Dodd\'s poetry has always been marked by richness of language, devotion to the things and creatures of the world, and an effort to transform every understanding into the universality of art.'),(1908606206,5,'Hairy Maclary from Donaldson\'s Dairy  ','Lynley Dodd       ',' Mallinson Rendel ','2020-03-12','Entertainment','book','Lynley Dodd\'s poetry has always been marked by richness of language, devotion to the things and creatures of the world, and an effort to transform every understanding into the universality of art.');
/*!40000 ALTER TABLE `BOOK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CHECKOUT`
--

DROP TABLE IF EXISTS `CHECKOUT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CHECKOUT` (
  `CHECKOUT_ID` int NOT NULL AUTO_INCREMENT,
  `COPY_CODE` int NOT NULL,
  `EMPLOYEE_CODE` int DEFAULT NULL,
  `MEMBER_CODE` int NOT NULL,
  `CHECK_OUT_DATE` date DEFAULT NULL,
  `CHECK_DUE_DATE` date DEFAULT NULL,
  `CHECK_IN_DATE` date DEFAULT NULL,
  PRIMARY KEY (`CHECKOUT_ID`),
  KEY `FK_CHECKOUT_COPY_idx` (`COPY_CODE`),
  KEY `FK_CHECKOUT_MEMBER_idx` (`MEMBER_CODE`),
  KEY `FK_CHECKOUT_EMP_idx` (`EMPLOYEE_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CHECKOUT`
--

LOCK TABLES `CHECKOUT` WRITE;
/*!40000 ALTER TABLE `CHECKOUT` DISABLE KEYS */;
INSERT INTO `CHECKOUT` VALUES (1,21,NULL,1,'2020-12-06','2021-01-05',NULL),(2,9,NULL,1,'2020-12-06','2021-01-05',NULL),(3,9,NULL,1,'2020-12-06','2021-01-05',NULL);
/*!40000 ALTER TABLE `CHECKOUT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLASS`
--

DROP TABLE IF EXISTS `CLASS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CLASS` (
  `CLASS_ID` int NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `CLASS_DATE` date DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `AGE_GROUP` varchar(50) DEFAULT NULL,
  `DURATION` varchar(50) DEFAULT NULL,
  `CLASS_TIME` time DEFAULT NULL,
  `STATUS` tinyint DEFAULT '1',
  `CLASS_FEE` decimal(7,2) DEFAULT NULL,
  `IMAGE_URL` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`CLASS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLASS`
--

LOCK TABLES `CLASS` WRITE;
/*!40000 ALTER TABLE `CLASS` DISABLE KEYS */;
INSERT INTO `CLASS` VALUES (1,'Web Applications','Learn how to program with PHP!','2020-12-05','UofU','18-60','1 month','20:03:50',1,0.00,'https://hub.packtpub.com/wp-content/uploads/2018/05/programming.jpg'),(2,'Web Applications 2','Learn how to program with PHP!','2020-12-05','UofU','18-60','1 month','20:08:51',1,0.00,'https://tr4.cbsistatic.com/hub/i/r/2020/07/23/0b6c864e-e403-4f25-b91c-7c428e7a29b6/resize/1200x/0d327a53cd101cb2539681b1f273b9aa/istock-1173805290.jpg'),(5,'Python Class','Learn how to program with Python','2020-12-12','1234 S Main St.','18-60','2 months','20:30:00',1,0.00,'https://d1y2qj23ol72q6.cloudfront.net/2019/06/python-blog.jpg');
/*!40000 ALTER TABLE `CLASS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLASS_MEMBERS`
--

DROP TABLE IF EXISTS `CLASS_MEMBERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CLASS_MEMBERS` (
  `CLASS_MEMBERS_ID` int NOT NULL AUTO_INCREMENT,
  `MEMBER_CODE` int NOT NULL,
  `CLASS_CODE` int NOT NULL,
  PRIMARY KEY (`CLASS_MEMBERS_ID`),
  KEY `fk_MEMBER_has_CLASS_CLASS1_idx` (`CLASS_CODE`),
  KEY `fk_MEMBER_has_CLASS_MEMBER1_idx` (`MEMBER_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLASS_MEMBERS`
--

LOCK TABLES `CLASS_MEMBERS` WRITE;
/*!40000 ALTER TABLE `CLASS_MEMBERS` DISABLE KEYS */;
INSERT INTO `CLASS_MEMBERS` VALUES (4,1,3),(6,1,2),(7,1,1);
/*!40000 ALTER TABLE `CLASS_MEMBERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COPY`
--

DROP TABLE IF EXISTS `COPY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `COPY` (
  `COPY_ID` int NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` int NOT NULL,
  `COPY_CONDITION` varchar(20) DEFAULT NULL,
  `CHECKOUT_STATUS` char(1) DEFAULT NULL,
  PRIMARY KEY (`COPY_ID`),
  KEY `FK_COPY_ITEM_idx` (`ITEM_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COPY`
--

LOCK TABLES `COPY` WRITE;
/*!40000 ALTER TABLE `COPY` DISABLE KEYS */;
/*!40000 ALTER TABLE `COPY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DEPARTMENT`
--

DROP TABLE IF EXISTS `DEPARTMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `DEPARTMENT` (
  `DEPARTMENT_ID` int NOT NULL AUTO_INCREMENT,
  `DIVISION_CODE` int NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`DEPARTMENT_ID`),
  KEY `FK_DEP_DIV_idx` (`DIVISION_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DEPARTMENT`
--

LOCK TABLES `DEPARTMENT` WRITE;
/*!40000 ALTER TABLE `DEPARTMENT` DISABLE KEYS */;
/*!40000 ALTER TABLE `DEPARTMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DIVISION`
--

DROP TABLE IF EXISTS `DIVISION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `DIVISION` (
  `DIVISION_ID` int NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_CODE` int NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`DIVISION_ID`),
  KEY `FK_DIV_EMP_idx` (`EMPLOYEE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DIVISION`
--

LOCK TABLES `DIVISION` WRITE;
/*!40000 ALTER TABLE `DIVISION` DISABLE KEYS */;
/*!40000 ALTER TABLE `DIVISION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE`
--

DROP TABLE IF EXISTS `EMPLOYEE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EMPLOYEE` (
  `EMPLOYEE_ID` int NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_CODE` int NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` char(32) DEFAULT NULL,
  `IS_ADMIN` tinyint DEFAULT '0',
  PRIMARY KEY (`EMPLOYEE_ID`),
  KEY `FK_EMP_DEP_idx` (`DEPARTMENT_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE`
--

LOCK TABLES `EMPLOYEE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE` DISABLE KEYS */;
INSERT INTO `EMPLOYEE` VALUES (1,1,'Edu','Pessoa','admin@utah.edu','8018794913','eduardovpessoa','f6614adf8fe2c8537ba3e2a33048b416',1);
/*!40000 ALTER TABLE `EMPLOYEE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FEES`
--

DROP TABLE IF EXISTS `FEES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `FEES` (
  `FEES_ID` int NOT NULL AUTO_INCREMENT,
  `MEMBER_CODE` int NOT NULL,
  `CHECKOUT_CODE` int NOT NULL,
  `LATE_FEE` decimal(7,2) DEFAULT NULL,
  `DAMAGE_FEE` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`FEES_ID`),
  KEY `FK_FEES_MEMBER_idx` (`MEMBER_CODE`),
  KEY `FK_FEES_CHECKOUT_idx` (`CHECKOUT_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='IF MEMBER IS GOING TO RETURN THE BOOK 30 DAYS LATER, WE CREATE THE LATE FEE';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FEES`
--

LOCK TABLES `FEES` WRITE;
/*!40000 ALTER TABLE `FEES` DISABLE KEYS */;
/*!40000 ALTER TABLE `FEES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FILM`
--

DROP TABLE IF EXISTS `FILM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `FILM` (
  `FILM_ID` int NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` int NOT NULL,
  `TITLE` varchar(60) DEFAULT NULL,
  `DIRECTOR` varchar(50) DEFAULT NULL,
  `YEAR_RELEASED` char(4) DEFAULT NULL,
  `GENRE` varchar(30) DEFAULT NULL,
  `MEDIA_TYPE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`FILM_ID`),
  KEY `FK_FILM_ITEM_idx` (`ITEM_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=909 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FILM`
--

LOCK TABLES `FILM` WRITE;
/*!40000 ALTER TABLE `FILM` DISABLE KEYS */;
INSERT INTO `FILM` VALUES (901,6,'Titanic','Stewart   ','1990','Thriller','Film'),(902,10,'Vertigo','Thompson','1958','Romance','film'),(903,8,'The Innocents                               ','William Henry','1961','Thriller','film'),(904,10,'Lawrence Of Arabia','Andrew','1962','Thriller','Film'),(905,10,'The Knives Out','Richard','2020','Thriller','Film'),(906,11,'SpiderMan','Tobey Maguire','2002','Thriller','Film'),(907,23,'edge of seventeen','Thomas','2017','Romance','Film'),(908,25,'Batman','Ben Affleck','2015','Thriller','Film');
/*!40000 ALTER TABLE `FILM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `INVENTORY`
--

DROP TABLE IF EXISTS `INVENTORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `INVENTORY` (
  `INVENTORY_ID` int NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` int NOT NULL,
  `MEMBER_CODE` int NOT NULL,
  PRIMARY KEY (`INVENTORY_ID`),
  KEY `FK_INVENTORY_ITEM_idx` (`ITEM_CODE`),
  KEY `FK_INVENTORY_CHECKOUT_idx` (`MEMBER_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `INVENTORY`
--

LOCK TABLES `INVENTORY` WRITE;
/*!40000 ALTER TABLE `INVENTORY` DISABLE KEYS */;
INSERT INTO `INVENTORY` VALUES (7,9,1);
/*!40000 ALTER TABLE `INVENTORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ITEM`
--

DROP TABLE IF EXISTS `ITEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ITEM` (
  `ITEM_ID` int NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_CODE` int NOT NULL,
  `TYPE` char(1) DEFAULT NULL,
  `CONDITION` char(1) DEFAULT NULL,
  PRIMARY KEY (`ITEM_ID`),
  KEY `FK_ITEM_EMP_idx` (`EMPLOYEE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ITEM_TYPE\nA = AUDIOBOOK\nB = BOOK\nF = FILM\nM = MUSIC\nP = PERIODICAL';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ITEM`
--

LOCK TABLES `ITEM` WRITE;
/*!40000 ALTER TABLE `ITEM` DISABLE KEYS */;
/*!40000 ALTER TABLE `ITEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MEMBER`
--

DROP TABLE IF EXISTS `MEMBER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MEMBER` (
  `MEMBER_ID` int NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(60) DEFAULT NULL,
  `LAST_NAME` varchar(60) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `STREET` varchar(50) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `STATE` char(5) DEFAULT NULL,
  `ZIP` varchar(45) DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` char(100) DEFAULT NULL,
  PRIMARY KEY (`MEMBER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEMBER`
--

LOCK TABLES `MEMBER` WRITE;
/*!40000 ALTER TABLE `MEMBER` DISABLE KEYS */;
INSERT INTO `MEMBER` VALUES (2,'Eduardo','Viana Pessoa','8018794913','u1332769@utah.edu','4475 S Lochnivar CT','Millcreek','Utah','84107','2020-10-10','eduardovpessoa','f6614adf8fe2c8537ba3e2a33048b416'),(3,'Hochul','Shin','12345678','u1332720@utah.edu','4473 S Main St','South Salt Lake','Utah','84115','2020-10-10','jacob','f6614adf8fe2c8537ba3e2a33048b416'),(4,'Ramya','R.','123456','ramy@utah.edu','123 Main St','Salt Lake City','Utah','84107','2020-12-06','ramya','f6614adf8fe2c8537ba3e2a33048b416'),(5,'User','User','8018794913','user@utah.edu','123 Main St','Salt Lake City','Utah','84107','2020-12-06','user','f6614adf8fe2c8537ba3e2a33048b416');
/*!40000 ALTER TABLE `MEMBER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MUSIC`
--

DROP TABLE IF EXISTS `MUSIC`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MUSIC` (
  `MUSIC_ID` int NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` int NOT NULL,
  `ALBUM_TITLE` varchar(100) DEFAULT NULL,
  `ARTIST` varchar(100) DEFAULT NULL,
  `MEDIA_TYPE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`MUSIC_ID`),
  KEY `FK_MUSIC_ITEM_idx` (`ITEM_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MUSIC`
--

LOCK TABLES `MUSIC` WRITE;
/*!40000 ALTER TABLE `MUSIC` DISABLE KEYS */;
INSERT INTO `MUSIC` VALUES (101,12,'Closing Time','Tom waits another day','music'),(102,12,'Transmissions from the light heart','Flamingo','music'),(103,13,'Murmur','R.E.M','music'),(104,14,'Day Dream Nation','Sonic Youth','music'),(105,15,'After the gold rush','Neil Young','music'),(107,11,'Bad Boys','Ed-sheeran','music'),(108,11,'edge of seventeen','Ed-sheeran','music');
/*!40000 ALTER TABLE `MUSIC` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PERIODICAL`
--

DROP TABLE IF EXISTS `PERIODICAL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PERIODICAL` (
  `PERIODICAL_ID` int NOT NULL AUTO_INCREMENT,
  `ITEM_CODE` int NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `PUBLISH_DATE` date DEFAULT NULL,
  `ISSUE_NUMBER` varchar(20) DEFAULT NULL,
  `MEDIA_TYPE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`PERIODICAL_ID`),
  KEY `FK_PERIODICAL_ITEM_idx` (`ITEM_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=90123460 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PERIODICAL`
--

LOCK TABLES `PERIODICAL` WRITE;
/*!40000 ALTER TABLE `PERIODICAL` DISABLE KEYS */;
INSERT INTO `PERIODICAL` VALUES (701,20,'Editing the Day','2020-10-12','00001131','periodicals'),(702,21,'netflix','2020-10-12','2020-10-12','periodical'),(703,18,'Editing the monthly news','2020-10-12','00001133','periodicals'),(704,20,'\r\nCommunication Arts - Advertising Annual 42 - December 2001, Volume 43, Number 7','2020-07-05','00001134','periodicals'),(705,16,'\r\nThe Sir Roger de Coverley Papers from The Spectator (Eclectic English Classics)','2020-09-08','00001135','Peirodicals'),(706,17,'\r\nMass Media: Key ideas','2020-10-13','00001136','Periodicals'),(6131668,0,'','2020-10-12','8','perio'),(90123459,1,'SLC Tribune','2020-12-06','123456','Newspaper');
/*!40000 ALTER TABLE `PERIODICAL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'library'
--

--
-- Dumping routines for database 'library'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-06 23:28:31
