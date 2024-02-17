-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: recipedb
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `recipe_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` decimal(4,2) DEFAULT NULL,
  `review` text,
  `date_time` datetime DEFAULT NULL,
  `user_f_name` varchar(45) DEFAULT NULL,
  `user_l_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_info` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,20,16,5.00,'dkfajdsfioe kdj faie',NULL,'Aung','KhantMaung'),(2,2,NULL,3.00,'Nice','2023-12-12 11:12:11',NULL,NULL),(4,1,16,4.00,'good','2023-12-12 12:16:30','Aung','KhantMaung'),(5,3,16,2.00,'Sweet','2023-12-12 12:20:39','Aung','KhantMaung'),(6,17,16,4.00,'aa','2023-12-12 12:25:01','Aung','KhantMaung'),(7,20,16,4.00,'good one','2023-12-12 13:23:39','Aung','KhantMaung'),(8,1,17,5.00,'good','2023-12-14 17:39:22','Wai','Yan'),(9,2,17,4.00,'Good','2023-12-14 17:39:55','Wai','Yan'),(10,3,17,5.00,'Great dessert','2023-12-14 17:40:16','Wai','Yan'),(11,4,17,3.00,'Not bad','2023-12-14 17:41:55','Wai','Yan'),(12,5,17,1.00,'I don\'t like Mushroom','2023-12-14 17:42:13','Wai','Yan'),(13,6,17,2.00,'weird but wanna try','2023-12-14 17:42:38','Wai','Yan'),(14,7,17,4.00,'Look delicious ','2023-12-14 17:42:52','Wai','Yan'),(15,8,17,1.00,'Don\'t like vegetables ','2023-12-14 17:43:45','Wai','Yan'),(16,9,17,5.00,'Like it','2023-12-14 17:43:57','Wai','Yan'),(17,10,17,5.00,'Must try','2023-12-14 17:44:17','Wai','Yan'),(18,11,17,0.00,'NO NO','2023-12-14 17:44:29','Wai','Yan'),(19,12,17,3.00,'I don\'t know','2023-12-14 17:46:28','Wai','Yan'),(20,13,17,3.00,'I don\'t know this one too!','2023-12-14 17:46:46','Wai','Yan'),(21,14,17,2.00,'beautiful, but don\'t like vegetables ','2023-12-14 17:47:17','Wai','Yan'),(22,15,21,5.00,'BEST!','2023-12-15 01:36:21','aa','aa'),(23,2,21,4.00,'good','2023-12-15 02:04:01','aa','aa'),(24,13,21,3.00,'ok','2023-12-15 02:13:59','aa','aa'),(25,8,16,5.00,'cgbcb','2023-12-15 15:48:11','Aung','KhantMaung');
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-15 17:13:13
