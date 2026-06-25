/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dbnias
-- ------------------------------------------------------
-- Server version	10.11.14-MariaDB-0ubuntu0.24.04.1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL COMMENT 'Nama lengkap pelatih/official',
  `gender` varchar(1) NOT NULL DEFAULT 'L' COMMENT 'L or P',
  `namaclub` varchar(100) NOT NULL COMMENT 'Klub yang diwakili',
  `role` varchar(10) NOT NULL DEFAULT 'regular' COMMENT 'admin or regular',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` VALUES
(1,'SYAIFUL HIDAYAT','L','BARRACUDA AQUATIC','regular','syaifulhidayat@mail.com',NULL,'$2y$12$vqXzm2EY7k9TWd6sRPT4yuVeub9Dned1tAXWhh.TN39Njd4kQaDPC',NULL,'2026-04-06 15:01:50','2026-04-06 15:01:50'),
(4,'Admin_it','L','-','admin','it.possijatim@gmail.com',NULL,'$2y$12$GAKjRcIqWsKumw1vOO0kL.WgfLjotYMndTTLbyA4bX4XsB.lg.vsi',NULL,'2026-04-09 01:43:39','2026-04-09 01:43:39'),
(5,'OFFICIAL GALAXY AQUATIC','L','GALAXY AQUATIC DC','regular','galaxyaquaticdc@mail.com',NULL,'$2y$12$M1ImGiiP8d4kxDu7Mn/Zde3T/2ofD9QhtONiN4Xc53e35nHKw2iKC','5XZ0S1Z3A0dldvoYO8ZCKyw2DfwgqaEG6atJcESNVvBkk2hl2BSJMWNDRp11','2026-04-11 01:22:17','2026-04-11 01:22:17'),
(6,'TES','L','PAS SC','regular','fauzikusumo@gmail.com',NULL,'$2y$12$EMKZ7gZuCCh3kYqbQXvUTOn.mVB1w/ClCuq/15c2UWPEDJNg7GUmW',NULL,'2026-04-11 07:24:27','2026-04-11 07:24:27'),
(7,'MARSONO','L','AMARTA','regular','aquatic.amarta@gmail.com',NULL,'$2y$12$0OIIBSn2WBX8m5Zz8XrEN.nreNbVGJ42PRSRbmsA7Zv97.zNBzbgW',NULL,'2026-04-15 05:49:44','2026-04-15 05:49:44'),
(8,'SALVA ALMAYDA PUTRI','P','LOTUS AQUATIC CLUB','regular','salvaalmaydaputri20@gmail.com',NULL,'$2y$12$2qr.abI5hiBXCznemUe.j.scYc7ZQeKKDK1CcpI170HQQ1GKfDtHu',NULL,'2026-04-15 19:27:31','2026-04-15 19:27:31'),
(9,'SHINTA KUSUMANING ASTUTI','P','STAR LANE INDONESIA','regular','shintakusumaning1987@gmail.com',NULL,'$2y$12$aoINVPRHtsh9iswtd394Eu5FTUX5W1FWTLVT/kH3Ff.E78TbedwvO',NULL,'2026-04-16 20:45:06','2026-04-16 20:45:06'),
(10,'NOVI SUKMANINGSIH','P','GARUDA DC','regular','novisukmaningsih16@gmail.com',NULL,'$2y$12$pI7HQLPiiPdIpRMiy4zSOO/OkiN5WPVv8wg8GT5c.mJJkNxnPzIlS',NULL,'2026-04-17 08:12:04','2026-04-17 08:12:04'),
(11,'REGITA AMADEA ARDAFA PUTRI','P','SDC','regular','amadeaputri13@gmail.com',NULL,'$2y$12$yf1h9fm0F0n0L.CX5a4Cm.Nyu53UAeFubedU8hlArTPBxsVileLem',NULL,'2026-04-26 04:03:12','2026-04-26 04:03:12');
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

-- Dump completed on 2026-04-29 10:13:03
