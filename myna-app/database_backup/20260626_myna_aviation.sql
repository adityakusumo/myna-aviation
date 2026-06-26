/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.2.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: myna_aviation
-- ------------------------------------------------------
-- Server version	12.2.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `NIAS`
--

DROP TABLE IF EXISTS `NIAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `NIAS` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL COMMENT 'FK ke users.id — pelatih yang mendaftarkan',
  `NONIAS` varchar(20) DEFAULT NULL COMMENT 'Nomor Induk Anggota Selam',
  `NAMA` varchar(100) NOT NULL COMMENT 'Nama lengkap',
  `GENDER` varchar(1) NOT NULL DEFAULT 'L' COMMENT 'L=Laki-laki P=Perempuan',
  `TGLLAHIR` date NOT NULL COMMENT 'Tanggal lahir',
  `TEMPATLAHIR` varchar(100) DEFAULT NULL COMMENT 'Tempat lahir',
  `NIK` varchar(20) DEFAULT NULL COMMENT 'Nomor Induk Kependudukan',
  `EMAIL` varchar(100) DEFAULT NULL,
  `NAMACLUB` varchar(100) NOT NULL COMMENT 'Nama klub/perguruan',
  `KDCLUB` varchar(5) DEFAULT NULL COMMENT 'Kode klub',
  `KDJENIS` varchar(1) DEFAULT NULL COMMENT '0=Kota 1=Kab',
  `JENIS` varchar(10) DEFAULT NULL COMMENT 'KOTA or KAB',
  `KDKOTA` varchar(10) DEFAULT NULL COMMENT 'Kode kota/kab klub',
  `NAMAKOTA` varchar(100) DEFAULT NULL COMMENT 'Nama kota/kab klub',
  `KDJENISDOM` varchar(1) DEFAULT NULL COMMENT '0=Kota 1=Kab',
  `JENISDOM` varchar(10) DEFAULT NULL COMMENT 'KOTA or KAB',
  `KDPROPDOM` varchar(5) DEFAULT '05',
  `NAMAPROPDOM` varchar(50) DEFAULT 'JAWA TIMUR',
  `KDKOTADOM` varchar(10) DEFAULT NULL COMMENT 'Kode kota/kab domisili',
  `NAMAKOTADOM` varchar(100) DEFAULT NULL COMMENT 'Nama kota/kab domisili',
  `STATUS` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Aktif 0=Non-aktif',
  `is_update` tinyint(1) NOT NULL DEFAULT 0,
  `TGLDAFTAR_UPDATE` date DEFAULT NULL,
  `tipe_update` varchar(50) DEFAULT NULL,
  `mutasi_luar_jatim` varchar(5) DEFAULT NULL,
  `TGLDAFTAR` date NOT NULL COMMENT 'Tanggal pendaftaran',
  `EXPIRED` date NOT NULL COMMENT 'Auto = TGLDAFTAR + 2 tahun',
  `LASTMUTASI` varchar(10) DEFAULT NULL COMMENT 'YYYYMM terakhir update',
  `MUTASI` varchar(5) DEFAULT NULL,
  `file_kk` varchar(255) DEFAULT NULL COMMENT 'Upload file Kartu Keluarga',
  `file_foto` varchar(255) DEFAULT NULL COMMENT 'Upload file Foto',
  `file_akte` varchar(255) DEFAULT NULL COMMENT 'Upload file Akte Lahir',
  `file_ijazah` varchar(255) DEFAULT NULL COMMENT 'Upload file Ijazah',
  `file_sk_mutasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nias_nonias_unique` (`NONIAS`),
  KEY `nias_user_id_foreign` (`user_id`),
  CONSTRAINT `nias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NIAS`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `NIAS` WRITE;
/*!40000 ALTER TABLE `NIAS` DISABLE KEYS */;
/*!40000 ALTER TABLE `NIAS` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `NIAS_STRUCT`
--

DROP TABLE IF EXISTS `NIAS_STRUCT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `NIAS_STRUCT` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KDPROP` varchar(2) DEFAULT NULL,
  `NAMAPROP` varchar(50) DEFAULT NULL,
  `KDJENIS` varchar(1) DEFAULT NULL,
  `JENIS` varchar(4) DEFAULT NULL,
  `KDKOTA` varchar(5) DEFAULT NULL,
  `NAMAKOTA` varchar(50) DEFAULT NULL,
  `KDCLUB` varchar(2) DEFAULT NULL,
  `NAMACLUB` varchar(30) DEFAULT NULL,
  `GENDER` varchar(2) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `TEMPATLAHIR` varchar(100) DEFAULT NULL,
  `TGLLAHIR` date DEFAULT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT 2,
  `NONIAS` varchar(14) DEFAULT NULL,
  `LASTMUTASI` varchar(6) DEFAULT NULL,
  `MUTASI` varchar(1) DEFAULT NULL,
  `EXPIRED` date DEFAULT NULL,
  `KDJENISDOM` varchar(1) DEFAULT NULL,
  `JENISDOM` varchar(4) DEFAULT NULL,
  `KDKOTADOM` varchar(5) DEFAULT NULL,
  `NAMAKOTADOM` varchar(50) DEFAULT NULL,
  `KDPROPDOM` varchar(2) DEFAULT NULL,
  `NAMAPROPDOM` varchar(50) DEFAULT NULL,
  `NIK` varchar(16) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `NOKARTUNAS` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `TGLDAFTAR` date DEFAULT NULL,
  `TGLDAFTAR_UPDATE` date DEFAULT NULL,
  `is_update` tinyint(1) NOT NULL DEFAULT 0,
  `tipe_update` varchar(50) DEFAULT NULL,
  `mutasi_luar_jatim` varchar(5) DEFAULT NULL,
  `is_sent` tinyint(1) NOT NULL DEFAULT 0,
  `sent_at` timestamp NULL DEFAULT NULL,
  `file_kk` varchar(255) DEFAULT NULL,
  `file_foto` varchar(255) DEFAULT NULL,
  `file_akte` varchar(255) DEFAULT NULL,
  `file_ijazah` varchar(255) DEFAULT NULL,
  `file_sk_mutasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `nias_struct_user_id_foreign` (`user_id`),
  CONSTRAINT `nias_struct_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NIAS_STRUCT`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `NIAS_STRUCT` WRITE;
/*!40000 ALTER TABLE `NIAS_STRUCT` DISABLE KEYS */;
/*!40000 ALTER TABLE `NIAS_STRUCT` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `app_settings`
--

DROP TABLE IF EXISTS `app_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_settings`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `app_settings` WRITE;
/*!40000 ALTER TABLE `app_settings` DISABLE KEYS */;
INSERT INTO `app_settings` VALUES
(1,'nias_open_date',NULL,'2026-05-26 01:07:04','2026-05-26 01:07:04'),
(2,'nias_close_date',NULL,'2026-05-26 01:07:04','2026-05-26 01:07:04'),
(3,'nias_max_accounts_per_club','{}','2026-05-26 01:07:04','2026-05-26 01:07:04');
/*!40000 ALTER TABLE `app_settings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `kontingens`
--

DROP TABLE IF EXISTS `kontingens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontingens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `lomba_user_id` bigint(20) unsigned DEFAULT NULL,
  `jns_kompetisi` varchar(1) NOT NULL,
  `nama_kontingen` varchar(255) NOT NULL,
  `jenis_wilayah` varchar(255) DEFAULT NULL,
  `nama_wilayah` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) NOT NULL DEFAULT 'JAWA TIMUR',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kontingens_user_id_foreign` (`user_id`),
  KEY `kontingens_lomba_user_id_foreign` (`lomba_user_id`),
  CONSTRAINT `kontingens_lomba_user_id_foreign` FOREIGN KEY (`lomba_user_id`) REFERENCES `lomba_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kontingens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontingens`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `kontingens` WRITE;
/*!40000 ALTER TABLE `kontingens` DISABLE KEYS */;
/*!40000 ALTER TABLE `kontingens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `lomba_tokens`
--

DROP TABLE IF EXISTS `lomba_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `lomba_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` timestamp NOT NULL,
  `used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lomba_tokens_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lomba_tokens`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `lomba_tokens` WRITE;
/*!40000 ALTER TABLE `lomba_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `lomba_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `lomba_users`
--

DROP TABLE IF EXISTS `lomba_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `lomba_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_wa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lomba_users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lomba_users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `lomba_users` WRITE;
/*!40000 ALTER TABLE `lomba_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `lomba_users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2024_01_01_000000_create_users_table',1),
(5,'2024_01_01_000001_create_nias_table',1),
(6,'2024_01_01_000002_add_is_update_to_nias_table',1),
(7,'2024_01_01_000003_add_user_id_to_nias_table',1),
(8,'2024_01_01_000004_add_role_and_files',1),
(9,'2026_04_08_073116_add_update_fields_to_nias_table',1),
(10,'2026_04_08_add_mutasi_luar_jatim_to_nias_table',1),
(11,'2026_04_13_080823_create_kontingens_table',2),
(12,'2026_04_14_000001_create_app_settings_table',2),
(13,'2026_04_15_000001_recreate_nias_struct_table',2),
(14,'2026_04_16_000001_add_is_sent_to_nias_struct_table',2),
(15,'2026_05_08_000001_create_lomba_users_table',2),
(16,'2026_05_08_000002_create_lomba_tokens_table',2),
(17,'2026_05_08_000003_add_lomba_user_id_to_kontingens_table',2),
(18,'2026_05_26_082248_modify_users_table_for_aviation',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('7wuWIw1bcvaqp0SY6av5ssUlaZQS9FSyWsOsEdzf',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:149.0) Gecko/20100101 Firefox/149.0','eyJfdG9rZW4iOiJScTdaVkRVR24wc2c0MlVYMENDR05PbUhSeUVZYkJZS2Q1UEpxdkpmIiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDAiLCJyb3V0ZSI6ImhvbWUifX0=',1782277718),
('EDdl7maF85iJJ3vn6fwp91hmyZ1ZCuyPXJsi8Z9I',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:149.0) Gecko/20100101 Firefox/149.0','eyJfdG9rZW4iOiJSRkJYNWd6aFB1ZXJIMDFKZ1dNWlpRVTJMTUxUTlhBNWo0ZWlqVzl6IiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2xvZ2luIiwicm91dGUiOiJhdXRoLmxvZ2luLnNob3cifX0=',1779789191);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

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
  `nationality` varchar(100) NOT NULL COMMENT 'Klub yang diwakili',
  `phone` varchar(30) DEFAULT NULL COMMENT 'Contact phone number',
  `employee_id` varchar(50) DEFAULT NULL COMMENT 'Employee / Staff ID number',
  `position` varchar(100) DEFAULT NULL COMMENT 'Job title / Position in company',
  `role` varchar(10) NOT NULL DEFAULT 'regular' COMMENT 'admin or regular',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Aditya Kusumo','L','-',NULL,NULL,NULL,'admin','aadityakusumo@gmail.com',NULL,'$2y$12$6YV0Yz2P13Cl57CS4HfwQ.gwYrBG58RMAWNaWNO3yNxV5GsZ0r81K',NULL,'2026-05-26 01:17:52','2026-05-26 01:17:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-06-26  9:46:54
