CREATE DATABASE  IF NOT EXISTS `Blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Blog`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: Blog
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `text` text,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_1_idx` (`userId`),
  CONSTRAINT `fk_articles_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (11,3,'First Article','First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article First article vFirst article First article','First article text First article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article textFirst article text','article_5460a72ecfd85.jpg'),(12,3,'Second Article Monkey','Descpription TExt Second Article Descpription TExt Second ArticleDescpription TExt Second ArticleDescpription TExt Second ArticleDescpription TExt Second ArticleDescpription TExt Second ArticleDescpription TExt Second ArticleDescpription TExt Second ArticleDescpription TExt Second Article...','&nbsp;TExt Second Article&nbsp; TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article TExt Second Article...<br>','article_5460bc90b9eb6.jpg'),(13,3,'Third Artle Dogs','Teaser Teaser Teaser vvTeaser Teaser Teaser Teaser Teaser Teaser Third Artle DogsThird Artle DogsThird Artle DogsThird Artle DogsThird Artle DogsThird Artle DogsThird Artle DogsThird Artle DogsThird Artle DogsThird Artle DogsThird Artle  Third Artle Dogs','&nbsp;Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text Third Artle Dogs Text','article_5460bcf7cd4a0.jpg'),(14,7,'Article 4 Monkey','Article 4 Monkey DEscription Article 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscriptionArticle 4 Monkey DEscription','Article 4 Monkey Text Article 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey TextArticle 4 Monkey Text','article_5460beb37ea22.jpg');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Profesor Vuchkov','','vuchkov@dasdasdas.com'),(2,'Profesor Vuchkov','7c4a8d09ca3762af61e59520943dc26494f8941b','vuchko13212312v@dasdasdas.com'),(3,'Georgi Ivanov','7c4a8d09ca3762af61e59520943dc26494f8941b','gopa@abv.bg'),(4,'Georgi Ivanov','7c4a8d09ca3762af61e59520943dc26494f8941b','fae@asb.com'),(5,'Biggie Smalls','7c4a8d09ca3762af61e59520943dc26494f8941b','Big@abv.bg'),(6,'Johnie Mormony','7c4a8d09ca3762af61e59520943dc26494f8941b','jewg@abv.bg'),(7,'Joan Grigorov','7c4a8d09ca3762af61e59520943dc26494f8941b','joan.grigorov@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-10 15:51:49
