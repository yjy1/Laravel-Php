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
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL,
  `cate_title` varchar(255) DEFAULT NULL,
  `cate_keywords` varchar(255) DEFAULT NULL,
  `cate_desc` varchar(255) DEFAULT NULL,
  `cate_view` int(10) DEFAULT NULL,
  `cate_order` tinyint(4) DEFAULT NULL,
  `cate_pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='//文章分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_category`
--

LOCK TABLES `blog_category` WRITE;
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
INSERT INTO `blog_category` VALUES (1,'PHP','奇幻之旅','旅','旅行',1000,2,0),(2,'Python','冒险','猫','Maori',2000,3,0),(3,'.NET','翼装','飞行','飞机',3000,4,0),(4,'phpsession——change to python','一般利用session来在页面之间传值 - PHP Sessions--  change to python','change to python','cate_desc  cate_desccsafsfsdfs',NULL,2,2),(5,'.netframework4.0   11111','1111Download Microsoft .NET Framework 4 (Web Installer) from ...','111115555','111',NULL,11,13),(6,'.netcore','\r\ndotnet.github.io\r\nWelcome to .NET Core!',NULL,NULL,NULL,NULL,3),(7,'python爬虫','\r\nwww.cnblogs.com\r\nPython爬虫原理 - Python开发之路 - 博客园',NULL,NULL,NULL,NULL,2),(8,'python基础教程','Python 基础教程 | 菜鸟教程','',NULL,NULL,NULL,2),(9,'php开发工具','\r\nwww.php.cn\r\n2017年最好用的9个php开发工具推荐-PHP头条-PHP中文网',NULL,NULL,NULL,NULL,1),(22,NULL,NULL,NULL,NULL,NULL,NULL,1),(23,NULL,NULL,NULL,NULL,NULL,NULL,1),(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'cesfaa111','111','1122','222',NULL,33,2),(18,'laravel','读音','读音','如何读',NULL,2,1),(26,'ceaaa','aae','34',NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-16 19:16:13
