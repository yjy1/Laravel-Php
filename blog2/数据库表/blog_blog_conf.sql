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
-- Table structure for table `blog_conf`
--

DROP TABLE IF EXISTS `blog_conf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_conf` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_name` varchar(50) DEFAULT NULL,
  `conf_title` varchar(50) DEFAULT NULL,
  `conf_content` text,
  `conf_order` int(11) DEFAULT NULL,
  `conf_tips` varchar(255) DEFAULT NULL,
  `field_type` varchar(255) DEFAULT NULL,
  `field_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`conf_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_conf`
--

LOCK TABLES `blog_conf` WRITE;
/*!40000 ALTER TABLE `blog_conf` DISABLE KEYS */;
INSERT INTO `blog_conf` VALUES (1,'200000000','122222','3',3,'3','input',' 我是单行文本'),(6,'web_title','b','Laravel 博客',4,'b','input','1|开启,0|关闭'),(8,'r',NULL,'0',NULL,NULL,'radio','0|男,1|女'),(9,'d',NULL,'sfw的纷纷为二维',NULL,NULL,'input',NULL),(11,'416',NULL,'1',NULL,NULL,'radio','1|开启,0|关闭'),(12,'417',NULL,'4177777',NULL,NULL,'input',NULL),(13,'418',NULL,'41888888阿范德萨',NULL,NULL,'textarea',NULL),(16,'seo_title','辅助标题','使用Laravel框架开发',2,NULL,'input',NULL),(17,'keywords','关键词','Laravel-简洁、优雅的PHP开发框架(PHP Web Framework',NULL,NULL,'input',NULL),(18,'desc','描述','aravel 的上一个 LTS(长期支持)版本是 Laravel 5.1,发布于 2015 年 6 月,按照对 LTS 版本的约定,两年的 bug 修复支持到今年中旬就结束了',NULL,NULL,'input',NULL),(19,'copyright','版权信息','©2019 Design by Yang',NULL,NULL,'input',NULL);
/*!40000 ALTER TABLE `blog_conf` ENABLE KEYS */;
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
