-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.6.24-log

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
-- Table structure for table `blog_member`
--

DROP TABLE IF EXISTS `blog_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(45) DEFAULT NULL,
  `member_nickname` varchar(10) DEFAULT NULL,
  `member_pass` varchar(255) DEFAULT NULL,
  `member_pic` varchar(45) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='//用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_member`
--

LOCK TABLES `blog_member` WRITE;
/*!40000 ALTER TABLE `blog_member` DISABLE KEYS */;
INSERT INTO `blog_member` VALUES (22,'e','Eason','eyJpdiI6IjVcL3RsNWVvUnhQeWhzVElsTHh3UHBRPT0iLCJ2YWx1ZSI6IlJEUWcwY1hheTJvN1ZXS2ZCbXFSOVE9PSIsIm1hYyI6IjIyMDRjMDU1NTVkNDk0NzU5OGFjMjQ0M2FmODM4NGQyMTRiOTUyYjFmOTc3MjQ2ZjBiYjNkMGRlY2YzMzZiNmEifQ==',NULL,NULL),(23,'c','c','eyJpdiI6IjFWRVJ1eDRVa1MzWHB6TGNZNGg1MFE9PSIsInZhbHVlIjoiS0JNWXhrZzBcL0Fia0R0UWFWcjA4Wmc9PSIsIm1hYyI6ImZkYTk0MGUwOGVhOWRjMDdlMTg2MDQyYTFiMzZhNThiZDVkZjQ1NjRjNDdjZjA0ZDlmZTRhMWQ3YmQ0M2FjZGQifQ==',NULL,NULL),(24,'q','企鹅','eyJpdiI6InFXOGtxN01mY0xLclpsZDdpVUo4blE9PSIsInZhbHVlIjoiOGt1dGJwSlE0WWpoSTJXTkhNenoxUT09IiwibWFjIjoiODczYWNkYTc4NTg1NDZiZjMzNzEyODJiMGI4ZDU0YWQyZTJhZWJiYjE3MzQxNzkyYTcwMDQzYTVmNTIxNDJlNCJ9',NULL,1555384533);
/*!40000 ALTER TABLE `blog_member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-16 19:16:12
