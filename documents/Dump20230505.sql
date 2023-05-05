-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel_8_scaffold
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2y$10$RcT1lc2bPbVBH7WZTgg8duLv9aahieY7cuVFRq3tA5fIioxo1u3nG','2023-04-11 07:25:05','2023-04-11 07:25:05');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_tag`
--

DROP TABLE IF EXISTS `course_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_tag` (
  `course_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`course_id`,`tag_id`),
  KEY `course_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `course_tag_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `course_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_tag`
--

LOCK TABLES `course_tag` WRITE;
/*!40000 ALTER TABLE `course_tag` DISABLE KEYS */;
INSERT INTO `course_tag` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `course_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_teacher`
--

DROP TABLE IF EXISTS `course_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_teacher` (
  `user_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `course_teacher_course_id_foreign` (`course_id`),
  KEY `course_teacher_user_id_foreign` (`user_id`),
  CONSTRAINT `course_teacher_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `course_teacher_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_teacher`
--

LOCK TABLES `course_teacher` WRITE;
/*!40000 ALTER TABLE `course_teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_user`
--

DROP TABLE IF EXISTS `course_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_user` (
  `course_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`course_id`,`user_id`),
  KEY `course_user_user_id_foreign` (`user_id`),
  CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_user`
--

LOCK TABLES `course_user` WRITE;
/*!40000 ALTER TABLE `course_user` DISABLE KEYS */;
INSERT INTO `course_user` VALUES (1,1,'2023-03-17 07:31:40','2023-04-01 00:46:14',NULL),(1,3,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(1,8,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(1,10,'2023-03-31 19:54:46','2023-03-31 19:59:20',NULL),(1,11,'2023-04-08 02:35:06','2023-04-08 02:35:07','2023-04-08 02:35:07'),(1,12,'2023-04-08 02:50:07','2023-04-08 02:50:07',NULL),(1,13,'2023-04-11 07:03:42','2023-04-11 07:03:42',NULL),(2,1,'2023-03-17 07:32:02','2023-03-17 07:32:02',NULL),(2,3,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(2,6,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(2,7,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(2,8,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(2,9,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(2,10,'2023-03-31 20:01:57','2023-03-31 20:01:57',NULL),(2,12,'2023-04-14 22:36:09','2023-04-14 22:36:09',NULL),(4,1,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(4,5,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(5,6,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(5,7,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(5,10,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(6,12,'2023-05-05 09:33:47','2023-05-05 09:33:47',NULL);
/*!40000 ALTER TABLE `course_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Khóa học Javascript cho người mới bắt đầu','https://tenten.vn/tin-tuc/wp-content/uploads/2022/06/word-image-6.jpeg','Hỗ trợ các bạn bước đầu vào ngành lập trình một cách đơn giản và dễ hiểu nhất',41228,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(2,'Khóa học mạng máy tính từ cơ bản đến nâng cao','https://img.freepik.com/free-vector/flat-isometric-internet-network-concept_126523-1731.jpg?w=2000','Khóa học mạng máy tính',35645,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(3,'Khóa học Tiếng Nhật từ cơ bản đến nâng cao','https://preply.com/wp-content/uploads/2019/02/How-to-learn-Japanese-blog-2.png','Khóa học Tiếng Nhật từ cơ bản đến nâng cao',7458,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(4,'Khóa học photoshop thần thánh từ A tới Z cho học sinh','https://arena.fpt.edu.vn/wp-content/uploads/2020/03/phan-mem-thiet-ke-do-hoa-photoshop.jpg','Khóa học photoshop thần thánh từ A tới Z cho học sinh',41389,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(5,'Khóa học tiếng Anh cho người mới bắt đầu','https://yt3.googleusercontent.com/ytc/AGIKgqOYsoFvXc8r3B5KcJuDm_uhe6cvoeXIft4YgXTB=s900-c-k-c0x00ffffff-no-rj','Khóa học tiếng Anh cho người mới bắt đầu',14039,'2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(6,'Khóa học lập trình PHP cho người mới bắt đầu','https://www.php.net/images/meta-image.png','Khóa học lập trình PHP dành cho người mới bắt đầu',8,'2023-03-31 21:15:35','2023-03-31 21:15:35',NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_user`
--

DROP TABLE IF EXISTS `lesson_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_user` (
  `lesson_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lesson_id`,`user_id`),
  KEY `lesson_user_user_id_foreign` (`user_id`),
  CONSTRAINT `lesson_user_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`),
  CONSTRAINT `lesson_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_user`
--

LOCK TABLES `lesson_user` WRITE;
/*!40000 ALTER TABLE `lesson_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `lesson_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lessons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lessons_course_id_foreign` (`course_id`),
  CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=806 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (801,1,'Lập trình Javascript cơ bản','https://tenten.vn/tin-tuc/wp-content/uploads/2022/06/word-image-6.jpeg','Lập trình cơ bản','Nothing',360,'2023-05-05 09:33:21','2023-05-05 09:33:21',NULL),(802,1,'Lập trình Javascript nâng cao','https://tenten.vn/tin-tuc/wp-content/uploads/2022/06/word-image-6.jpeg','Lập trình nâng cao','Nothing',360,'2023-05-05 09:33:21','2023-05-05 09:33:21',NULL),(803,2,'Lập trình mạng máy tính','https://img.freepik.com/free-vector/flat-isometric-internet-network-concept_126523-1731.jpg?w=2000','Mạng máy tính','Nothing',360,'2023-05-05 09:33:21','2023-05-05 09:33:21',NULL),(804,6,'Lập trình PHP cơ bản','https://www.php.net/images/meta-image.png','Lập trình PHP cơ bản','Không có yêu cầu',360,'2023-05-05 09:33:21','2023-05-05 09:33:21',NULL),(805,6,'Lập trình PHP ứng dụng','https://www.php.net/images/meta-image.png','Lập trình PHP ứng dụng','Hoàn thành lập trình php cơ bản',360,'2023-05-05 09:33:21','2023-05-05 09:33:21',NULL);
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_07_08_092117_create_courses_table',1),(5,'2022_07_08_100112_create_lessons_table',1),(6,'2022_07_10_143206_create_programs_table',1),(7,'2022_07_10_145547_create_tags_table',1),(8,'2022_07_10_145756_create_reviews_table',1),(9,'2022_07_10_150553_create_course_tag_table',1),(10,'2022_07_10_151501_create_course_user_table',1),(11,'2022_07_10_151821_create_lesson_user_table',1),(12,'2022_07_10_152108_create_program_user_table',1),(13,'2022_07_11_025853_create_course_teacher_table',1),(14,'2022_07_12_093255_alter_users_table',1),(15,'2022_07_19_043351_alter_name_and_username_in_users_table',1),(16,'2022_07_20_082529_alter_reviews_table',1),(17,'2022_07_20_090834_alter_lessons_table',1),(18,'2022_07_20_094509_update_soft_delete_in_lessons_table',1),(19,'2022_07_26_063639_update_add_field_lessons_table',1),(20,'2022_08_11_042114_alter_course_user_table',1),(21,'2022_08_19_022746_update_lessons_table',1),(23,'2023_04_11_142126_create_admin_table',2),(26,'2023_04_15_080920_add_foreign_key_table',3),(27,'2023_04_24_221810_modify_program',3),(28,'2023_05_05_145957_xxx',3),(29,'2023_05_05_150315_xxx1',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('duynt2201@gmail.com','$2y$10$o7agGnqUp4r.lDqZB7e1ZOdg3WS55fgooZwha1JnXcGN.ltJ50TaC','2023-04-23 20:34:53');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_user`
--

DROP TABLE IF EXISTS `program_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_user` (
  `program_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`program_id`,`user_id`),
  KEY `program_user_user_id_foreign` (`user_id`),
  KEY `program_user_course_id_foreign` (`course_id`),
  CONSTRAINT `program_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `program_user_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  CONSTRAINT `program_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_user`
--

LOCK TABLES `program_user` WRITE;
/*!40000 ALTER TABLE `program_user` DISABLE KEYS */;
INSERT INTO `program_user` VALUES (205,12,'2023-05-05 09:33:53','2023-05-05 09:33:53',804,NULL),(213,12,'2023-05-05 09:50:27','2023-05-05 09:50:27',802,NULL);
/*!40000 ALTER TABLE `program_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lesson_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs_lesson_id_foreign` (`lesson_id`),
  CONSTRAINT `programs_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (205,804,'Bài 1 - Giới thiệu về PHP','https://drive.google.com/file/d/1K38oab88UHBhKGmJ14J5dCZZaT1ldPJj/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(206,804,'Bài 2 - Cài đặt PHP trên Windows','https://drive.google.com/file/d/18UXharaXVDIg5Az1DPC1uOj9tdhRd86Z/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(207,804,'Bài 3 - Syntax trong PHP','https://drive.google.com/file/d/1jBgnDTHNmxFr5_K-pZ5jwAUSVpNR-kkg/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(208,804,'Bài 4 - Phương thức $GET và $POST','https://drive.google.com/file/d/1fxCrtfl7UoRl7Ya3t6zGhGKTR4lXkCSW/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(209,804,'Bài 5 - Upload File lên Server','https://drive.google.com/file/d/1fxCrtfl7UoRl7Ya3t6zGhGKTR4lXkCSW/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(210,804,'Bài 6 - Giới thiệu Session và Cookie','https://drive.google.com/file/d/1M7kjIHWM-VRrxqF5S-WKx-mIRqhxFQBs/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(211,804,'Bài 7 - Ví dụ về Cookie','https://drive.google.com/file/d/14nYpDbBvbIN6ZvfaZhGyaH06p1qL6rtR/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(212,804,'Bài 8 - Ví dụ về Session','https://drive.google.com/file/d/14nYpDbBvbIN6ZvfaZhGyaH06p1qL6rtR/preview','video','2023-05-05 09:33:39','2023-05-05 09:33:39',NULL),(213,802,'Bài 1 - Giới thiệu về biến','https://www.youtube.com/watch?v=ia3IZHoylJM&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=4&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(214,802,'Bài 2 - Các kiểu dữ liệu','https://www.youtube.com/watch?v=sxhvoCclpe8&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=5&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(215,802,'Bài 3 - Object','https://www.youtube.com/watch?v=cPMGl6tWe70&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=6&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(216,802,'Bài 4 - Mảng','https://www.youtube.com/watch?v=yPArMduGD3I&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=7&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(217,802,'Bài 5 - Function trong javascript','https://www.youtube.com/watch?v=_44v_9YaIeU&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=11&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(218,802,'Bài 6 - Vòng lặp trong javascript','https://www.youtube.com/watch?v=21shYi4dd0s&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=14&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(219,802,'Bài 7 - Prototype trong javascript','https://www.youtube.com/watch?v=5Jy8XeMWiuA&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=28&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(220,802,'Bài 8 - Cài đặt NodeJS','https://www.youtube.com/watch?v=XNBA8dXllJc&list=PLkY6Xj8Sg8-uPZnTdScfuH0xD-O6Kb-V-&index=29&ab_channel=CodersX','video','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL),(221,802,'Bài 9 - Tổng hợp','https://websitesetup.org/wp-content/uploads/2020/09/Javascript-Cheat-Sheet.pdf','file','2023-05-05 09:50:11','2023-05-05 09:50:11',NULL);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int unsigned DEFAULT NULL,
  `parent_id` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_course_id_foreign` (`course_id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,1,'Very nice',5,0,'2023-03-17 07:32:07','2023-03-17 07:32:07',NULL),(2,4,1,'Very good',4,0,'2023-04-01 00:45:29','2023-04-01 00:45:29',NULL),(3,1,1,'very good',5,0,'2023-04-01 00:47:05','2023-04-01 00:47:05',NULL),(4,1,12,'rat tot',4,0,'2023-04-08 02:51:58','2023-04-08 02:51:58',NULL);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Lập trình',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Abigail Schamberger','quinn46','willms.earlene@example.org','2023-03-17 07:25:02','$2y$10$W3DFGeBrpIVXumH0HO7q9OBPJCOD96x62788RsH6ccuBY7sqDhwVi','https://via.placeholder.com/100x100.png/0044ee?text=consequatur','1996-03-02','3630 Corwin Harbor','+17077568885','Alice the moment they saw the Mock Turtle replied, counting off the top of it. She felt very lonely and low-spirited. In a little way out of its voice. \'Back to land again, and said, \'So you think.','1','cnAWohSOvn','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(2,'Ms. Gilda Will','adams.vito','judy.jacobson@example.net','2023-03-17 07:25:02','$2y$10$UHbVEdLvRHyhT/UeD7/2QuS/q4clAv9j7NoQh057MZWBMUzFHAGSG','https://via.placeholder.com/100x100.png/001166?text=vel','1991-07-22','13315 Jacynthe Station','+12608304652','Queen will hear you! You see, she came in with the time,\' she said, by way of expressing yourself.\' The baby grunted again, and all sorts of things, and she, oh! she knows such a simple question,\'.','0','49OaSNW6JL','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(3,'Madilyn Thompson','andreane.pollich','qjones@example.com','2023-03-17 07:25:02','$2y$10$ZZ8CfGu9SOxtgfzAogy1JeuPrMFSqBMJSm9H1ndusdI/YatL5tAre','https://via.placeholder.com/100x100.png/0011ff?text=voluptas','1978-10-09','454 Kreiger Ridge','+12125992081','She took down a jar from one end of every line: \'Speak roughly to your little boy, And beat him when he sneezes: He only does it matter to me whether you\'re a little scream of laughter. \'Oh, hush!\'.','0','svkwkVBE0L','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(4,'Leland Emmerich','mckenzie.arnoldo','padberg.declan@example.org','2023-03-17 07:25:02','$2y$10$JNCWLxAZHU.jNuS9uq1cr.0GTnGwHw3sMxcedlsjRZw1mcYuPZhki','https://via.placeholder.com/100x100.png/0055bb?text=enim','1979-07-08','5248 Grayce Canyon Suite 061','+14755208879','Hatter, who turned pale and fidgeted. \'Give your evidence,\' said the Mouse heard this, it turned round and look up in a very poor speaker,\' said the Duchess; \'and the moral of that is--\"Be what you.','1','ALUQPJxR8P','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(5,'Percy Kassulke','tglover','kirstin.white@example.org','2023-03-17 07:25:02','$2y$10$/qEied7yFDZR9UjbYBZdMuuf/G/akzZ2ZUXxwod8s2x405a9AxgX6','https://via.placeholder.com/100x100.png/0077ff?text=illum','1994-01-02','8224 Mervin Extensions','+17815391306','Footman remarked, \'till tomorrow--\' At this moment Five, who had spoken first. \'That\'s none of them were animals, and some \'unimportant.\' Alice could speak again. The Mock Turtle went on. \'Or would.','0','kzDAJTbI5S','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(6,'Quentin O\'Kon','ullrich.amy','ilene84@example.org','2023-03-17 07:25:03','$2y$10$AegvurM9VesLtFhSCMLYhOmcJW6VqgiYK5QDpWVjM2Qk92.kqJ19i','https://via.placeholder.com/100x100.png/00ccdd?text=et','2012-06-21','423 Carissa Dale Suite 462','+18588797636','Jack-in-the-box, and up the little door, so she began again. \'I wonder what they WILL do next! If they had to pinch it to make out that one of the jurymen. \'No, they\'re not,\' said the March Hare.','1','bMx8GTzGYF','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(7,'Ben Douglas','vdickens','vmoore@example.net','2023-03-17 07:25:03','$2y$10$Aw.BAv9FFK8PDSNieSjJ.ubB5weEPBT4FFk0/PAwbiSBzeKxBr2cS','https://via.placeholder.com/100x100.png/0066ff?text=et','1976-09-28','9543 Bradtke Orchard Suite 114','+18286686307','So Bill\'s got the other--Bill! fetch it here, lad!--Here, put \'em up at the top of it. Presently the Rabbit noticed Alice, as the March Hare. \'Exactly so,\' said the Hatter. \'Does YOUR watch tell you.','0','va0YIH5BkV','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(8,'Prof. Megane Stroman','ignacio77','yessenia39@example.net','2023-03-17 07:25:03','$2y$10$H8b4QncF4YpxuY58MJubmeDS9m2cxTJrOv.h36UJEuuCuwpK7mRT6','https://via.placeholder.com/100x100.png/00cc66?text=minus','1981-11-02','97138 Keeling Point Suite 097','+13377045966','Drawling, Stretching, and Fainting in Coils.\' \'What was that?\' inquired Alice. \'Reeling and Writhing, of course, Alice could think of nothing better to say \'I once tasted--\' but checked herself.','1','qmGTkjNKGH','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(9,'Reagan Blanda','simonis.nicholaus','macy.beahan@example.org','2023-03-17 07:25:03','$2y$10$SNG5WhqEFKiINAQoTwtnrOlAkA2/9Q1p.hYfu5wPw13ovU2l99vpa','https://via.placeholder.com/100x100.png/007777?text=harum','2008-12-25','5669 Barton Mountains','+19522098814','Writhing, of course, to begin with; and being ordered about in all my life!\' She had quite forgotten the Duchess said after a pause: \'the reason is, that there\'s any one of them hit her in a deep.','1','iuvw8CmlBv','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(10,'Olin Lang','wolf.dillon','caleigh.reichel@example.net','2023-03-17 07:25:03','$2y$10$UfoaHGNHOFWng.1p2StNKOw3nWx595iyXXFWe9PqYsQQQQBYQD3NW','https://via.placeholder.com/100x100.png/002200?text=asperiores','1970-01-20','2731 Americo Loaf','+13305591817','Alice got up and bawled out, \"He\'s murdering the time! Off with his tea spoon at the house, \"Let us both go to on the table. \'Have some wine,\' the March Hare interrupted in a very curious thing, and.','0','RdeeAHcUtrDc3R9ZLqjD1ckxZGyxlg1OONXcZ9q82XQi4kxQrW1ciKyUtWL1','2023-03-17 07:25:03','2023-03-17 07:25:03',NULL),(11,NULL,'duynt2201','duynt2201@gmail.com',NULL,'$2y$10$YP.rcLxThbXeS2DdpA3P5.0UkHVEinOgAZ14oq5SEWPYPYwelZ03u',NULL,NULL,NULL,NULL,NULL,'0',NULL,'2023-04-08 02:34:54','2023-04-08 02:34:54',NULL),(12,'Nguyễn Duy','duynt22012000','duynt22011@gmail.com',NULL,'$2y$10$ZY9x6LL3YIzMCuf6CXm8geBl2xIehQKjAjp6hJPR7SUgWsRMV5uOa','storage/profile/mue5lLjhNzEYy8SzKuYRo2aqbUjBlekDq7E6dEV1.png','2023-04-05','ĐH Công nghiệp Hà Nội','0385675496',NULL,'0',NULL,'2023-04-08 02:48:54','2023-05-04 21:08:04',NULL),(13,NULL,'duynt2201@gmail.com','duynt220111@gmail.com',NULL,'$2y$10$G7yWbJok.fmZL./40WOzr.ugHjYF9dsyo3r0LXsGExZN4Ox4Lwsm6',NULL,NULL,NULL,NULL,NULL,'0',NULL,'2023-04-11 07:03:32','2023-04-11 07:03:32',NULL),(14,'Nguyễn Duy','nguyenduy13','duynt21111201@gmail.com',NULL,'$2y$10$znpm2raTLuEBkQsZk0qrfun1BYboA2EZTSf/AUNnPky2SLG2ctyYa',NULL,NULL,NULL,'0385675496',NULL,'0',NULL,'2023-04-25 16:33:27','2023-04-25 16:33:27',NULL),(15,'Nguyễn Duy','nguyenduy14','duynt212222221212121212201@gmail.com',NULL,'$2y$10$W1qbmUX7/uw7hPfBrGH.z.T9yb16tPKnAx0UhlFRqLAb3JgsfhNIW',NULL,NULL,NULL,'0385675496',NULL,'0',NULL,'2023-04-25 16:45:12','2023-04-25 16:45:12',NULL),(22,'Nguyễn Duy','nguyenduy15','duynt211111111111201@gmail.com',NULL,'$2y$10$kOWJpm8Gd7wpRhN7H6R1bOWteN6h4kTMeHumJQcjBNKMVTx5ql/3a',NULL,NULL,NULL,'0385675496',NULL,'0',NULL,'2023-04-25 16:50:22','2023-04-25 16:50:22',NULL),(24,'Nguyễn Duy12121','nguyenduy1212122','duynt2201@gmail.com11',NULL,'$2y$10$EUbhgag7CEpIeaYIu6B7Ku0VL/swht5RGEnbfUmNc2CIalCCQk5Oy',NULL,NULL,NULL,'0385675496',NULL,'0',NULL,'2023-05-04 20:35:02','2023-05-04 20:35:02',NULL);
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

-- Dump completed on 2023-05-05 23:55:23
