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
-- Table structure for table `users_info`
--

DROP TABLE IF EXISTS `users_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_info` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `user_photo` longblob,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_info`
--

LOCK TABLES `users_info` WRITE;
/*!40000 ALTER TABLE `users_info` DISABLE KEYS */;
INSERT INTO `users_info` VALUES (1,'','Tun','waiyan@gmail.com','0',NULL,NULL),(6,'Wai Yan','Tun','waiyantun@gmail.com','waiyan1234',NULL,NULL),(7,'Wai ','Yan','waiytun1921@gmail.com','12345678',NULL,NULL),(8,'John','Wick','John@gmail.com','Johnwick',NULL,NULL),(9,'James','Bond','James@gmail.com','Jamesbond','customer',NULL),(10,'','','','','',NULL),(11,'asdf','dsfae','wifnasd@gmail.com','12345678','chef',NULL),(12,'','fwad','fwgv@gmail.com','12345678','customer',NULL),(13,'','fwad','weins@gmail.com','12345678','customer',NULL),(14,'dfga','','gahr@gmail.com','12345678','',NULL),(15,'Aung','Khant','AungKhant@gmail.com','12345678','customer',NULL),(16,'Aung','KhantMaung','AungKhantMaung@gmail.com','12345678','customer',NULL),(17,'Wai','Yan','wai172@gmail.com','12345678','chef',NULL),(18,'James','Bond','jb@gmail.com','123456789','customer',NULL),(19,'aa','bb','ab@gmail.com','12345','customer',NULL),(20,'yo','yo','yoyo@gmail.com','Waiyan172','customer',NULL),(21,'aa','aa','aaaaa','W@iyan172','customer',NULL),(22,'Wai ','Yan','waiyantun123@gmail.com','W@iy@n172202','chef',NULL),(23,'aa','bb','aabb@gmail.com','A@b123456','customer',NULL);
/*!40000 ALTER TABLE `users_info` ENABLE KEYS */;
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
