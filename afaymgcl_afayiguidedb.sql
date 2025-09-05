-- MySQL dump 10.13  Distrib 9.1.0, for macos14.7 (x86_64)
--
-- Host: localhost    Database: afaymgcl_afayiguide
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admission_applications`
--

DROP TABLE IF EXISTS `admission_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admission_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `school_id` bigint unsigned NOT NULL,
  `program_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_fee` decimal(10,2) NOT NULL,
  `application_fee` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','submitted','accepted','rejected','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `additional_requirements` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `deadline` date DEFAULT NULL,
  `submitted_at` date DEFAULT NULL,
  `response_date` date DEFAULT NULL,
  `response_notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admission_applications_user_id_foreign` (`user_id`),
  KEY `admission_applications_school_id_foreign` (`school_id`),
  CONSTRAINT `admission_applications_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  CONSTRAINT `admission_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admission_applications`
--

LOCK TABLES `admission_applications` WRITE;
/*!40000 ALTER TABLE `admission_applications` DISABLE KEYS */;
INSERT INTO `admission_applications` VALUES (1,3,23,'wretewtertw',50000.00,7500.00,57500.00,'pending','6777777788','WhatsApp: 6777777788',NULL,NULL,NULL,NULL,'2025-09-03 22:48:09','2025-09-03 22:48:09');
/*!40000 ALTER TABLE `admission_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentorship_bookings`
--

DROP TABLE IF EXISTS `mentorship_bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mentorship_bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_duration` enum('15min','30min','1hour') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `session_topic` text COLLATE utf8mb4_unicode_ci,
  `additional_notes` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','assigned','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `assigned_mentor_id` bigint unsigned DEFAULT NULL,
  `scheduled_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mentorship_bookings_user_id_foreign` (`user_id`),
  KEY `mentorship_bookings_assigned_mentor_id_foreign` (`assigned_mentor_id`),
  CONSTRAINT `mentorship_bookings_assigned_mentor_id_foreign` FOREIGN KEY (`assigned_mentor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `mentorship_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentorship_bookings`
--

LOCK TABLES `mentorship_bookings` WRITE;
/*!40000 ALTER TABLE `mentorship_bookings` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentorship_bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentorship_sessions`
--

DROP TABLE IF EXISTS `mentorship_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mentorship_sessions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `mentor_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_at` datetime NOT NULL,
  `duration_minutes` int NOT NULL DEFAULT '60',
  `status` enum('pending','confirmed','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `session_type` enum('video_call','voice_call','chat','in_person') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'video_call',
  `meeting_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `rating` int DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'XAF',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mentorship_sessions_student_id_foreign` (`student_id`),
  KEY `mentorship_sessions_mentor_id_foreign` (`mentor_id`),
  CONSTRAINT `mentorship_sessions_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mentorship_sessions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentorship_sessions`
--

LOCK TABLES `mentorship_sessions` WRITE;
/*!40000 ALTER TABLE `mentorship_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentorship_sessions` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_08_01_131618_add_role_to_users_table',1),(5,'2025_08_01_131635_create_programs_table',1),(6,'2025_08_01_131656_create_mentorship_sessions_table',1),(7,'2025_08_01_131721_create_opportunities_table',1),(8,'2025_08_01_131742_create_pathfinder_responses_table',1),(9,'2025_08_03_070548_create_personal_access_tokens_table',1),(10,'2025_08_04_104609_remove_programs_table',1),(11,'2025_08_05_151643_create_mentorship_bookings_table',1),(12,'2025_08_05_153742_add_whatsapp_number_to_users_table',1),(13,'2025_08_07_141725_create_schools_table',1),(14,'2025_08_07_141726_create_admission_applications_table',1),(15,'2025_08_10_134335_add_missing_fields_to_users_table',1),(16,'2025_08_10_134854_remove_avatar_from_users_table',1),(17,'2025_08_10_203310_make_whatsapp_number_nullable_in_mentorship_bookings_table',1),(18,'2025_08_11_153805_update_schools_table_json_columns',1),(19,'2025_09_03_105046_add_rating_to_mentorship_sessions_table',1),(20,'2025_09_03_111656_create_password_reset_requests_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opportunities`
--

DROP TABLE IF EXISTS `opportunities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opportunities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('scholarship','internship','job','admission','workshop','conference') COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'XAF',
  `deadline` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `requirements` json DEFAULT NULL,
  `benefits` json DEFAULT NULL,
  `application_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `posted_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opportunities_posted_by_foreign` (`posted_by`),
  CONSTRAINT `opportunities_posted_by_foreign` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opportunities`
--

LOCK TABLES `opportunities` WRITE;
/*!40000 ALTER TABLE `opportunities` DISABLE KEYS */;
INSERT INTO `opportunities` VALUES (1,'Computer Science Scholarship','Full scholarship for outstanding students pursuing computer science degrees.','scholarship','Cameroon Digital Foundation','Yaoundé',500000.00,'XAF','2024-09-30','2024-10-01','2025-09-30','[\"GCE A-Level\", \"Mathematics\", \"Programming Experience\"]','[\"Full Tuition Coverage\", \"Monthly Stipend\", \"Laptop Provided\"]','https://www.cameroon-digital.org/scholarship','scholarship@cameroon-digital.org','+237 222 123 456',NULL,1,1,1,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(2,'Engineering Internship Program','Paid internship opportunity for engineering students at leading construction companies.','internship','Cameroon Engineering Consortium','Douala',150000.00,'XAF','2024-08-15','2024-09-01','2024-12-31','[\"Engineering Student\", \"GPA 3.0+\", \"Team Player\"]','[\"Hands-on Experience\", \"Mentorship\", \"Potential Job Offer\"]','https://www.cameroon-engineering.org/internship','internship@cameroon-engineering.org','+237 233 234 567',NULL,1,1,1,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(3,'Business Plan Competition','Annual competition for young entrepreneurs with cash prizes and mentorship.','workshop','Cameroon Entrepreneurship Network','Yaoundé',1000000.00,'XAF','2024-10-15','2024-11-01','2024-12-15','[\"Age 18-35\", \"Innovative Business Idea\", \"Cameroonian Citizen\"]','[\"Cash Prize\", \"Business Mentorship\", \"Networking Opportunities\"]','https://www.cameroon-entrepreneurship.org/competition','competition@cameroon-entrepreneurship.org','+237 222 345 678',NULL,1,1,1,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(4,'Medical Research Grant','Research grant for medical students and professionals working on public health projects.','scholarship','Cameroon Health Research Institute','Buea',750000.00,'XAF','2024-09-01','2024-10-01','2025-09-30','[\"Medical Background\", \"Research Proposal\", \"Academic References\"]','[\"Research Funding\", \"Publication Support\", \"Conference Attendance\"]','https://www.cameroon-health.org/grant','grant@cameroon-health.org','+237 233 456 789',NULL,0,1,1,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(5,'Legal Advocacy Fellowship','One-year fellowship for law graduates interested in human rights and legal advocacy.','job','Cameroon Human Rights Center','Yaoundé',300000.00,'XAF','2024-08-30','2024-10-01','2025-09-30','[\"Law Degree\", \"Human Rights Interest\", \"English/French\"]','[\"Monthly Stipend\", \"Legal Training\", \"Networking\"]','https://www.cameroon-humanrights.org/fellowship','fellowship@cameroon-humanrights.org','+237 222 567 890',NULL,1,1,1,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(6,'Tech Startup Accelerator','6-month accelerator program for tech startups with funding and mentorship.','workshop','Cameroon Innovation Hub','Douala',2000000.00,'XAF','2024-09-15','2024-10-01','2025-03-31','[\"Tech Startup\", \"MVP Ready\", \"Team of 2+\"]','[\"Seed Funding\", \"Mentorship\", \"Office Space\", \"Investor Network\"]','https://www.cameroon-innovation.org/accelerator','accelerator@cameroon-innovation.org','+237 233 678 901',NULL,1,1,1,'2025-09-03 22:47:13','2025-09-03 22:47:13');
/*!40000 ALTER TABLE `opportunities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_requests`
--

DROP TABLE IF EXISTS `password_reset_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','processing','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `processed_by` bigint unsigned DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_reset_requests_processed_by_foreign` (`processed_by`),
  CONSTRAINT `password_reset_requests_processed_by_foreign` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_requests`
--

LOCK TABLES `password_reset_requests` WRITE;
/*!40000 ALTER TABLE `password_reset_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pathfinder_responses`
--

DROP TABLE IF EXISTS `pathfinder_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pathfinder_responses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `academic_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_of_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_goals` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspirations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` json DEFAULT NULL,
  `interests` json DEFAULT NULL,
  `preferred_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget_range_min` decimal(10,2) DEFAULT NULL,
  `budget_range_max` decimal(10,2) DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'XAF',
  `preferences` json DEFAULT NULL,
  `additional_notes` text COLLATE utf8mb4_unicode_ci,
  `recommended_programs` json DEFAULT NULL,
  `recommended_opportunities` json DEFAULT NULL,
  `pathway_report` text COLLATE utf8mb4_unicode_ci,
  `report_file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pathfinder_responses_user_id_foreign` (`user_id`),
  CONSTRAINT `pathfinder_responses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pathfinder_responses`
--

LOCK TABLES `pathfinder_responses` WRITE;
/*!40000 ALTER TABLE `pathfinder_responses` DISABLE KEYS */;
/*!40000 ALTER TABLE `pathfinder_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schools` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_requirements` json DEFAULT NULL,
  `application_steps` json DEFAULT NULL,
  `required_documents` json DEFAULT NULL,
  `application_fee` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'XAF',
  `application_deadline` date DEFAULT NULL,
  `academic_year_start` date DEFAULT NULL,
  `programs_offered` json DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `tuition_fee_min` decimal(10,2) DEFAULT NULL,
  `tuition_fee_max` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (1,'University of Yaoundé I','The University of Yaoundé I is a public university located in Yaoundé, Cameroon. It is one of the oldest and most prestigious universities in the country.','university','Yaoundé','https://www.uy1.uninet.cm','info@uy1.uninet.cm','+237 222 22 22 22','P.O. Box 337, Yaoundé, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit online application\", \"Pay application fee\", \"Submit required documents\", \"Attend interview (if required)\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',25000.00,'XAF',NULL,NULL,'[\"Computer Science\", \"Business Administration\", \"Law\", \"Medicine\", \"Engineering\"]',NULL,0,1,50000.00,75000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(2,'University of Buea','The University of Buea is a public university located in Buea, Southwest Region of Cameroon. It is known for its strong programs in agriculture and environmental sciences and technology.','university','Buea','https://www.ubuea.cm','info@ubuea.cm','237 2 33 32 27 60','P.O. Box 63, Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Fill the Application Form\", \"Submit The Form\", \"Review of Application\", \"Get Student Letter\", \"Submit Documents\", \"Get Access To Your Portal\", \"Go for Medicals\", \"Register Courses\"]','[\"GCE O/L with passes in four approved subjects prior to sitting the GCE A/L\", \"GCE A/L with two passes at the same sitting OR BAC in appropriate series\", \"Birth certificate\", \"Academic transcripts\", \"Academic Certificate\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\", \"English Language test results (if applicable)\", \"Special Intensive English Language Course certificate (if applicable)\"]',20000.00,'XAF',NULL,NULL,'[\"Advanced School of Translators and Interpreters (ASTI)\", \"College of Technology (COT)\", \"Faculty of Agriculture and Veterinary Medicine (FAVM)\", \"Faculty of Arts (FA)\", \"Faculty of Education (FED)\", \"Faculty of Engineering and Technology (FET)\", \"Faculty of Health Sciences (FHS)\", \"Faculty of Laws and Political Science (FLPS)\", \"Faculty of Science (FS)\", \"Faculty of Social and Management Sciences (FSMS)\", \"Higher Teachers Training College (HTTC)\", \"Higher Technical Teachers Training College (HTTTC)\"]',NULL,0,1,50000.00,75000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(3,'University of Douala','The University of Douala is a public university located in Douala, the economic capital of Cameroon. It offers a wide range of programs in various fields.','university','Douala','https://www.univ-douala.com','info@univ-douala.com','+237 233 42 22 22','P.O. Box 24157, Douala, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"French proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit online application\", \"Pay application fee\", \"Submit required documents\", \"Attend interview (if required)\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',30000.00,'XAF',NULL,NULL,'[\"Economics\", \"Management\", \"Law\", \"Medicine\", \"Engineering\"]',NULL,0,1,50000.00,75000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(4,'Landmark Metropolitan University Institute','Landmark Metropolitan University Institute is a private university located in Buea, Cameroon. Known as \"The Pride of Africa\" and focused on training productive leaders.','university','Buea','https://www.study.landmark.cm','info@study.landmark.cm','+237 672 339 570','Campus A: Opposite UNICS BANK PLC UB JUNCTION, MOLYKO - BUEA | Campus B: TARRED MALINGO STRETCH TOWARDS MILE 18 JUNCTION, BUEA','[\"At least a PASS in any Two (2) GCE Advanced Level Papers (excluding Religion) or its equivalence\", \"GCE Ordinary Level Certificate or its equivalence\", \"BAC or its equivalence\", \"Application form\", \"Academic transcripts\"]','[\"Submit application with required documents\", \"Pay registration fee\", \"Receive student ID card and materials\", \"Complete medical examination\", \"Begin academic program\"]','[\"Photocopy of Birth Certificate\", \"Photocopy of Ordinary Level Slip / Certificate or its equivalence\", \"Photocopy of Advanced Level Slip / Certificate\", \"Photocopy of BAC or its equivalence\", \"Photocopy of National Identification Card or Passport (if applicable)\", \"Four (4) Passport Size Photographs\", \"Photocopy of HND Results Slip (For Top-Up Students)\", \"Photocopy of BTech or BSc (For Masters Students)\"]',30000.00,'XAF',NULL,NULL,'[\"Software Engineering\", \"Hardware Engineering\", \"Database Development & Administration\", \"Computer Graphics & Webdesign\", \"Telecommunication Engineering\", \"Networking & Security\", \"Cyber Security\", \"Information Technology Security\", \"CISCO Network Package\", \"Electrical Power System\", \"Robotic Engineering\", \"Electronics Engineering\", \"Civil Engineering\", \"Public Works Engineering\", \"Mechanical Engineering\", \"Devops Engineering\"]',NULL,0,1,350000.00,650000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(5,'ICT University','The ICT University is a specialized institution focused on Information and Communication Technology education. It provides competence-based technical education and training, research and consultancy in ICT for socio-economic development.','university','Yaoundé','https://ictuniversity.org','admin@ictuniversity.edu.cm','+237 651 060 049','P.O. Box 526, 1 Avenue Dispensaire Messassi, Zoatoupsi, Yaounde, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit online application\", \"Pay application fee\", \"Submit required documents\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',25000.00,'XAF',NULL,NULL,'[\"BSc in Information Systems and Networking (ISN)\", \"BSc in Cyber Security\", \"BSc in Computer Science (CS)\", \"BSc in Renewable Energy (RE)\", \"BSc in Software Engineering (SE)\", \"BSc in Information and Communication Technology (ICT)\", \"MSc in Information Systems and Networking (ISN)\", \"MSc in Information Technology (IT)\", \"MSc in Information Systems Security (ISS)\"]',NULL,0,1,500000.00,800000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(6,'HIMS BUEA Higher Institute of Management Studies','HIMS BUEA is a higher institute of management studies located in Buea, Cameroon. The institution focuses on providing quality education in business, management, tourism, logistics, engineering, and medical sciences with the motto \"Together Let\'s Shape Your Future.\"','institute','Buea','www.himsbuea.org','info@himsbuea.org','+(237)671 854 464 / 652 203 039 / 657 080 102 / 683 522 606','Mayor Street, Molyko-Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit application form\", \"Pay application fee\", \"Submit required documents\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',25000.00,'XAF',NULL,NULL,'[\"School of Business and Management (HND/B.TECH): Accountancy, Banking and Finance, Insurance, Marketing, Human Resource Management, Administrative Assistance/Executive Secretarial Studies\", \"Bachelor of Business Administration (BBA): Management, Supply Chain Management\", \"Master of Business Administration (MBA): Accountancy, Banking and Finance, Marketing, Human Resource Management, Project Management, Management, Insurance and Risk Management, Managerial Economics, Logistics Management\", \"School of Tourism, Logistics and Transport Management (HND/B.TECH): Logistics and Transport Management, Port and Shipping Management, Custom and Transit, Hotel Management and Catering, Tourism and Travel Agency Management\", \"School of Engineering and Technology (HND/B.TECH): Software Engineering, Hardware Maintenance, Networks and Security, Computer Science Networks, Computer Graphic Design, E-Commerce and Digital Marketing\", \"School of Medical and Biomedical Sciences (HND/B.TECH): Nursing, Medical Laboratory Sciences, Mid-wifery, Healthcare Management\"]',NULL,0,1,300000.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(7,'Catholic University Institute of Buea (CUIB)','The Catholic University Institute of Buea (CUIB) is a private Catholic university located in Buea, Cameroon. It focuses on providing quality education with emphasis on entrepreneurship and vocational competence. The university offers programs across multiple schools including business, engineering, agriculture, health sciences, and information technology.','university','Buea','www.cuib-cameroon.org','info@cuib-cameroon.net','(+237) 656062976 / 677001470','P.O.Box 563, Buea, SW Region, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Vocational competence and passion for chosen field\", \"One page essay justifying passion for chosen field\", \"Two references\", \"Application form\", \"Academic transcripts\"]','[\"Visit CUIB website and complete online application\", \"Upload required documents\", \"Submit application form online\", \"Pay application fee\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts (O level, A level, Baccalaureate, Probatoire)\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\", \"One page essay on vocational competence\", \"Two reference contacts\", \"Detailed academic transcript (for transfer students)\", \"Hand-written application explaining transfer circumstances (for transfer students)\"]',45000.00,'XAF',NULL,NULL,'[\"School of Business: HND (Accountancy, Human Resource Management, Logistics & Transport Management), BTECH (Accountancy, Human Resource Management and Employment Relations), BSc (Accountancy, Banking & Finance, Management, Human Resource Management and Employment Relations, Marketing, Insurance and Risk Management), Masters (Accountancy, Finance, Human Resource Management and Employment Relations)\", \"School of Agriculture and Natural Resources: HND (Food Technology, Agro-Pastoral Advisers), BTECH (Food Technology), BSc (Integrated Agriculture), MSc (Nutrition and Food Quality, Organic Crop Production, Organic Livestock Husbandry & Breeding, Sustainable Agriculture & Development)\", \"School of Engineering: HND (Civil Engineering Technology, Building Science and Technology, Industrial Computing and Automation, Electrical Engineering Power Systems), BTECH (Civil Engineering Technology, Electrical Power Systems), BSc (Chemical Engineering, Civil & Environmental Engineering, Electrical & Computer Engineering, Mechanical Engineering)\", \"School of Information Technology: Certification (Huawei Certified ICT Associate, Oracle Certified Associate OCA, CompTIA Security+), HND (Network & Security, Computer Science & Network, Computer Graphics & Web Design, E-Commerce & Digital Marketing), BTECH (Network & Security, Computer Graphics & Web Design), BSc (Cyber Security, Software Engineering), MSc (Cyber Security, Software Engineering)\", \"School of Health Sciences: Top-Up BSc (Health Sanitary Inspection, Nursing, Medical Laboratory Science, Midwifery, Healthcare Management Technology), HND (Nursing, Medical Laboratory Science, Midwifery, Pharmacy Technology), BSc (Healthcare Management, Nursing, Medical Laboratory Science, Midwifery, Pharmacy Technology)\", \"School of Arts and Education: Bachelor of Education (Educational Administration & Leadership, Curriculum Innovation & Development Education, Psychology)\", \"School of Journalism & Communication: BSc (Journalism & Communication)\", \"School of Law: Bachelor of Law (Law)\"]',NULL,0,1,400000.00,1000000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(8,'Biaka University Institute of Buea (BUIB)','Biaka University Institute of Buea (BUIB) is a private university located in Buea, Cameroon. The institution focuses on providing transparent and affordable quality education with emphasis on learning and development, professionalism, and international student support. BUIB offers flexible application options including online and on-campus application processes.','university','Buea','https://biakahc.org/','infocm@biakahc.org','+237 671 710 796 / +237 675-800-610','Bokoko, Biaka St, Buea, South West Region, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Visit apply.buibsystems.org\", \"Create applicant account with personal details\", \"Fill out online application form accurately\", \"Upload required documents\", \"Review information before submitting\", \"Track application status through portal\", \"Pay application fee\", \"Receive admission letter\"]','[\"Certified copies of Ordinary level certificates\", \"Certified copies of Advanced level certificates\", \"Birth certificate\", \"Application fee receipt\", \"HND result slip (for Top-up programs)\", \"BSc attestation/certificate (for Post Graduate programs)\", \"Academic transcripts\", \"ID card\", \"Passport photo\"]',15500.00,'XAF',NULL,NULL,'[\"School of Health Sciences (SHS): HND Programs (Tuition: 400,000 XAF, Registration: 40,000 XAF), BSc Programs (Tuition: 400,000 XAF, Registration: 90,000 XAF), Top-Up BSc Programs (Tuition: 450,000 XAF, Registration: 120,000 XAF), MSc Programs (Tuition: 500,000 XAF, Registration: 137,000 XAF)\", \"School of Management Sciences (SMS): HND Programs (Tuition: 300,000 XAF, Registration: 25,000 XAF), BSc Programs (Tuition: 350,000 XAF, Registration: 75,000 XAF), MSc Programs (Tuition: 500,000 XAF, Registration: 125,000 XAF)\", \"School of Engineering and Technology (SET): BSc Programs (Tuition: 400,000 XAF, Registration: 75,000 XAF)\", \"School of Education (SED): BEd Programs (Tuition: 200,000 XAF, Registration: 75,000 XAF), MEd Programs (Tuition: 300,000 XAF, Registration: 125,000 XAF)\", \"School of Agricultural Sciences (SAS): HND Programs (Tuition: 300,000 XAF, Registration: 25,000 XAF), BSc Programs (Tuition: 350,000 XAF, Registration: 75,000 XAF), MSc Programs (Tuition: 500,000 XAF, Registration: 125,000 XAF)\"]',NULL,0,1,200000.00,637000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(9,'Chartered Higher Institute of Technology and Management (CHITECHMA)','CHITECHMA University is a higher institute of technology and management authorized by the Ministry of Higher Education in Buea, Cameroon. The institution focuses on promoting capacity building, professionalism, and integrity with a mission to ensure graduates integrate seamlessly into society. CHITECHMA offers both national and international programs with innovative teaching methods including 80% online and 20% on-site delivery for master\'s programs.','institute','Buea','https://chitechma.com','info@chitechma.com','+237 233 323 893 / 650 675 076 / 675 254 348','Opposite Presbyterian Church – Molyko, Buea, Cameroon. P.O Box 218 Buea, Cameroon','[\"At least 2 Advanced level papers (excluding religion studies)\", \"At least 4 Ordinary level papers (excluding religion studies)\", \"Equivalents of the above mentioned qualifications\", \"Application form\", \"Registration fee payment\"]','[\"Click on APPLY NOW button\", \"Create an account\", \"Start the application process\", \"Submit required documents\", \"Pay registration fee\", \"Receive admission letter\"]','[\"Photocopy of academic credentials\", \"Photocopy of Birth Certificate\", \"Photocopy of national ID card or resident permit for foreigners\", \"Passport size photographs (2-4 depending on program)\", \"Filled admission form\", \"Registration fee receipt\", \"Certified copy of Degree (for Masters/MBA/M-TECH)\", \"Certified copy of Transcript (for Masters/MBA/M-TECH)\", \"Medical Certificate (for Masters/MBA/M-TECH)\", \"HND result slip (for B-TECH and BSc TOP-UP)\"]',10000.00,'XAF',NULL,NULL,'[\"School of Engineering and Technology: Computer Software Engineering, Computer Hardware Maintenance, Digital Marketing and E-commerce, Network and Security, Electrical and Electronic Engineering, M-TECH in Software Engineering, M-TECH in Network and Security\", \"School of Business, Finance and Management: Logistics and Transport Management, Human Resource Management, Project Management, Accountancy, Banking and Finance, Marketing & Trade Sales, Insurance, Assistant Manager, MBA in Project Management, MBA in Entrepreneurship and Business Management, MBA in Accounting and Audit, MBA in Digital Marketing And Branding, M.Sc in Logistics and Transport Management, M.Sc in Human Resource Management, M.Sc in Project Management, M.Sc in Accounting and Financial Management, M.Sc in Supply Chain Management and Procurement\", \"School of Home Economics, Tourism and Hotel Management: Bakery And Food Processing, Fashion Design, Clothing And Textile, Tourism And Travel Agency Management, Hotel Management And Catering, Hospitality Management, M.Sc in Food Processing & Technology, M.Sc in Nutrition and Dietetics\", \"School of Biomedical Sciences: Nursing, Midwifery, Medical Laboratory Science programs\", \"Short Diploma Programs: Web Development, Industrial Safety (QHSE), Computerized Accounting, Project Management, Human Resource Management, Bakery And Pastry, Interior And Exterior Decoration, ICT Basics, Computer Maintenance, Secretariat Studies, Graphic Design\", \"International Programs: Project Management Professional, ABMA, Diploma Programs for International Students\"]',NULL,0,1,250000.00,450000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(10,'Redemption Higher Institute of Biomedical Sciences (RHIBMS)','RHIBMS  is a premier institution dedicated to excellence in healthcare education, research, and innovation. The institute focuses on offering cutting-edge programs in medicine, nursing, laboratory sciences, and public health, equipping students with hands-on training and leadership skills to address Africa\'s unique health challenges. RHIBMS is accredited and industry-aligned, fostering future-ready healthcare professionals committed to transforming communities.','institute','Buea','https://rhibms.org','info@rhibms.org','(+237) 677 172 022 / 681 019 578 / 671 507 814 / 233 324 850','Molyko Buea CMR, Opposite Pres Hostel, Tarred Malingo, Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Fill online application form\", \"Submit required documents\", \"Pay application fee\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',25000.00,'XAF',NULL,NULL,'[\"School of Health Sciences: Various healthcare and biomedical programs\", \"School of Engineering and Technology: Engineering and technology programs\", \"School of Agriculture: HND Food Technology (2 years, 250,000 XAF), HND Agro Pastoral Entrepreneurship (2 years, 250,000 XAF), HND Agro Pastoral Adviser (2 years, 250,000 XAF), Crop Production Technology (2 years, 250,000 XAF)\", \"School of Management Sciences: Business and management programs\", \"School of Home Economics: HND Fashion Clothing and Textile (2 years, 250,000 XAF), HND Bakery and Food Processing (2 years, 250,000 XAF)\"]',NULL,0,1,250000.00,500000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(11,'Higher Institute of Business and Engineering Sciences (HIBES)','HIBES is a private Higher Education Institution authorized by the Ministry of Higher Education (MINESUP), Cameroon with License N: 21-03652/L/MINESUP/SG/DDES/ESUP/SDA/ and 23-00487/L/MINESUP/SG/DDES/ESUP/SDA/MF. Located in Buea metropolitan city at the feet of mount Fako in the quiet suburb of Molyko, HIBES focuses on innovation and entrepreneurship, transforming minds and attitudes to adapt to current global challenges in education. The institution offers a two-year compulsory entrepreneurial training for all students irrespective of their program.','institute','Buea','https://hibesb.com','infos@hibesb.com','+237 682462403 / +237 651948117 / +237 676619572','Molyko, Buea, Cameroon','[\"A pass in at least two Advance level subjects (excluding Religion)\", \"Ordinary level slip/certificate (Anglophone) OR Probatoire results (Francophone)\", \"Advanced level slip/certificate (Anglophone) OR Baccalaureate (Francophone)\", \"Application form\", \"Application fee payment\"]','[\"Submit application with required documents\", \"Pay application fee of 25,000 XAF\", \"Submit photocopies of academic credentials\", \"Provide passport size photographs\", \"Receive admission letter\"]','[\"Photocopy of Ordinary level slip/certificate OR Probatoire results\", \"Photocopy of Advanced level slip/certificate OR Baccalaureate\", \"Birth certificate\", \"Valid Identity Card\", \"Two passport size photographs\", \"Application fee receipt (25,000 XAF)\"]',25000.00,'XAF',NULL,NULL,'[\"School of Business Management: HND programs (Registration: 25,000 XAF, Tuition: 235,000 XAF with 22% scholarship)\", \"School of Legal Studies: HND programs (Registration: 25,000 XAF, Tuition: 235,000 XAF with 22% scholarship)\", \"School of Engineering: Civil & Structural Engineering (Registration: 25,000 XAF, Tuition: 290,000 XAF with 17% scholarship), Electrical & Electronic (Registration: 25,000 XAF, Tuition: 265,000 XAF with 24% scholarship), Computer Science (Registration: 25,000 XAF, Tuition: 245,000 XAF with 30% scholarship)\", \"School of Health & Biomedical Sciences: HND programs (Registration: 25,000 XAF, Tuition: 300,000 XAF with 21% scholarship)\", \"School of Home Economics, Tourism & Hotel Management: HND programs (Registration: 25,000 XAF, Tuition: 260,000 XAF with 32% scholarship)\", \"School of Agriculture: HND programs\", \"International Programs: SSBM GENEVA - MBA/DBA, SSBR ZURICH - BBA/MBA/MSc/DBA/PhD, Chartered Economist (ACCE), IIC University Cambodia - PhD & DBA, AZTECA University Mexico - PhD & DBA\"]',NULL,0,1,235000.00,7500000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(12,'FOMIC Polytechnic University','FOMIC Polytechnic University, founded in 2011, is a Private Higher Institute accredited by the Ministry of Higher Education of Cameroon and mentored by the University of BUEA and the University of Bamenda. The institution is part of FOMIC GROUP, representing a group of academic institutions that provide world class training in a wide range of academic disciplines. FOMIC Polytechnic has campuses in Buea and Douala, with over 3,000 students and 70 staff members.','university','Buea','https://fomicgroup.cm','info@fomicgroup.cm','233391452 / +237 675551924 / +237 677505889','Buea Campus, Tarred Malingo Street, Molyko Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit application with required documents\", \"Pay application fee\", \"Submit academic credentials\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',25000.00,'XAF',NULL,NULL,'[\"School of Business: Various business and management programs\", \"School of Engineering and Technology: Engineering and technology programs\", \"School of Medical & Biomedical Sciences: Healthcare and medical programs\", \"School of Agriculture: Agricultural sciences and related programs\", \"Faculty of Law & International Relations: Legal studies and international relations programs\", \"Language Institute: IELTS, TOEFL & GRE preparation programs for language proficiency and international examinations\"]',NULL,0,1,300000.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(13,'HIBMAT University Institute of Buea (HUIB)','HUIB is a private professional University Institute specialized in delivering contemporary careers in Business Management, Engineering, and Health Sciences relevant to the needs of a rapidly changing and growing economy like Cameroon. The institution focuses on providing practical, career-oriented education with emphasis on real-world applications and industry relevance.','institute','Buea','https://hibmat.com','info@hibmat.com','+237 678556058','Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit application with required documents\", \"Pay registration fee\", \"Submit academic credentials\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',25000.00,'XAF',NULL,NULL,'[\"Business Management: Contemporary business and management programs\", \"Engineering: Engineering programs with practical focus\", \"Health Sciences: Healthcare and medical sciences programs\"]',NULL,0,1,250000.00,500000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(14,'JSF Polytechnic Buea','JSF Polytechnic Buea, established in 2014, is licensed by the Ministry of Higher Education in Cameroon with the motto \"Setting the pace in Entrepreneurial Management.\" The institution is dedicated to providing 21st Century entrepreneurship skills for students, empowering Cameroonians through certificates and skills acquisition throughout professional programs, alongside seminars and workshops. JSF Polytechnic is under the mentorship of the University of Buea for Top-UP Degree programs, Direct BSc, MBA, MTech and MSc programs.','polytechnic','Buea','https://jsfplytechnic.com','info@jsfplytechnic.com','(+237) 676 240 064 / 677 205 243','Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit application with required documents\", \"Pay registration fee\", \"Submit academic credentials\", \"Receive admission letter\"]','[\"Photocopy of GCE A/level/Bac or equivalent\", \"Photocopy of GCE O/level/Probatoire or equivalent\", \"Photocopy of Birth Certificate\", \"Photocopy of ID Card\", \"Equivalence of any foreign certificate/Diploma\", \"A folder with your name and department\", \"Digital passport size photo (taken by JSF Polytechnic upon registration)\"]',25000.00,'XAF',NULL,NULL,'[\"School of Business, Finance And Management: HND (Insurance, Accounting, Assistant Manager, Project Management, Banking & Finance, Marketing Trade Sales, Transport & Logistics, Human Resource Management), TOP UP BSC (Insurance, Marketing, Accounting, Management, Banking & Finance, Human Resource Management), DIRECT BSC (Accounting, Management, Banking & Finance, Marketing), MBA (Marketing, Accounting & Finance, Banking & Finance, Human Resource Management, Management & Entrepreneurship, Tourism and Hospitality Management, Tourism and Travel Agency Management)\", \"School of Engineering and Technology: HND (Computer Engineering, Software Engineering, Computer Science And Network, Electrical And Electronic Engineering, Electrical Power System, Computer Graphics And Web Design)\", \"School of Health And Biomedical Sciences: HND, DIRECT BSC And TOP-UP BSC (Nursing, Pharmacy, Midwifery, Medical Laboratory Sciences)\", \"School of Home Economics, Tourism and Hospitality Management: HND And TOP-UP BSC (Bakery And Food Processing, Fashion Clothing And Textiles, Hospitality Management, Tourism And Travel Agency Management), Professional Masters (M-Tech in Food Technology, M-Tech in Fashion Clothing And Textiles)\", \"School of Communication: HND, TOP-UP BSC and DIRECT BSC (Journalism And Corporate Communication), Master of Science (Journalism And Mass Communication)\"]',NULL,0,1,250000.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(15,'Saint Monica University Higher Institute (SMUHI)','SMUHI is a private higher institute of management and technology established with the motto \"Civitas Dei - The City of God.\" The institution is fully accredited by the Ministry of Higher Education, Cameroon, and mentored by the University of Douala. SMUHI focuses on providing 21st Century entrepreneurship skills, offering professional and career-focused degrees taught by qualified staff with emphasis on employability, mobility, and flexibility.','institute','Buea','www.smuedu.org','admissions@smuedu.org','(+237) 671 472 558 / (+237) 660 111 989 / (+237) 660 111 982','PO Box 132, Buea, SWR, Cameroon. Bulu, Buea, SW, Cameroon. Accessible from Malingo street or Mile 16 Bocom. Temporary Campus A: 1st floor NJIEFORBI BAKERY, UB Junction Molyko','[\"GCE A-Level (at least two papers in relevant subjects) or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency (fluent speaking and writing)\", \"Computer and internet access (laptop recommended)\", \"Application form\", \"Academic transcripts\"]','[\"Submit application with required documents\", \"Pay application fee\", \"Submit academic credentials\", \"Take English proficiency test (if required)\", \"Receive admission letter\"]','[\"Photocopy of GCE A/level/Bac or equivalent\", \"Photocopy of GCE O/level/Probatoire or equivalent\", \"Photocopy of Birth Certificate\", \"Photocopy of ID Card\", \"Equivalence of any foreign certificate/Diploma\", \"A folder with your name and department\", \"Digital passport size photo (taken by SMUHI upon registration)\", \"Application fee receipt\"]',5000.00,'XAF',NULL,NULL,'[\"School of Business & Public Policy: HND (Accountancy, Banking & Finance, Human Resources Management, Insurance, Quality Management, Project Management, Logistics & Transport, Non-Governmental Organization), Bachelor\'s (Accounting, Banking and Finance, Management, Human Resource Management, Petroleum Management, Logistics and Supply Chain Management, Marketing, Ports and Maritime Management, Insurance & Risk Management), Master\'s (MBA in Accounting & Finance, Insurance, MPA in Public Administration, International Relations, Conflict Resolution and Peace Studies, Human Rights, Local Government Administration)\", \"School of Science, Engineering & Technology: HND (Mechanical Engineering - Automotive Mechanics and Maintenance, Civil Engineering - Civil Engineering Design and Building Science and Technology, Computer Engineering - Software Engineering and Computing, Electrical and Electronics Engineering - Electrical Power Systems), Bachelor\'s and Master\'s (Civil and Architectural Engineering, Computer and Electrical Engineering, Industrial Engineering, Mechanical Engineering, Software Engineering, Computer Network and Telecommunication System Engineering, Agriculture)\", \"School of Arts, Education & Humanities: HND (Journalism - Print Journalism), Bachelor\'s (B.Ed, B.Sc. in Communication, Educational Psychology, Educational Administration) and Master\'s (M.Ed., M.Sc. in Philosophy of Education and Curriculum Studies and Instruction, Philosophy)\", \"School of Health & Human Services: Bachelor\'s (B.SN, B.SPH, B.SMLS, B.SMMP, B.PharmTech in Nursing, Medical Science, Medical Laboratory Science, Public Health, Medical Microbiology and Parasitology, Clinical Psychology, Physician Assistant) and Master\'s (M.SCP, M.SPA, M.SMMP, MPH)\", \"Agricultural & Food Sciences: HND (Agricultural Engineering, Food technology, Animal production technology, Crop production technology, Agro-pastoral adviser, Agricultural business techniques)\"]',NULL,0,1,250000.00,650000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(16,'Saint Francis Higher Institute of Nursing and Midwifery','Saint Francis Higher Institute of Nursing and Midwifery is a private higher education institution founded in 2007, specializing in healthcare education. The institution is accredited as an Institution Privée d\'Enseignement Supérieur (IPES) préparant aux diplômes nationaux et étrangers, autorisée à fonctionner par le Ministère de l\'Enseignement Supérieur du Cameroun. The institute focuses on providing high-quality education in nursing, midwifery, and related health sciences with emphasis on participation in educational conferences and scientific research.','institute','Buea','https://stfrancisnursing.cm','info@stfrancisnursing.cm','+237','Buea, South West, Cameroun','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Online Application form\", \"Proof of fee payment\", \"Application fee\", \"Photographs\", \"Medical Certificate\", \"Letters of recommendation (for MA, PhD)\", \"Motivation Letter\", \"Student visa (for international students)\"]',25000.00,'XAF',NULL,NULL,'[\"Biology: Bachelor of Biological (Full-time, English instruction)\", \"Biomedicine: Biomedical sciences programs\", \"Food and Nutrition: Nutrition and dietetics programs\", \"Health: General health sciences programs\", \"Management: Healthcare management programs\", \"Medicine: Medical sciences programs\", \"Nursing: Nursing and midwifery programs\"]',NULL,0,1,180277.00,680277.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(17,'Taniform Higher Institute of Learning (THIL) - Taniform University','Taniform University Institute of Bamenda, founded in 2015, is a typical Anglo-Saxon University located in the Educational Capital of Cameroon, specifically in the North West Region with capital in Bamenda. The institution offers a rich portfolio of degree programs at Bachelor\'s, Master\'s and PhD levels, designed to comply with the Cameroonian LMD-System and European Bologna BMP-System. Taniform University prides itself on its international character, welcoming students from all cultures and nationalities without discrimination.','university','Bamenda','www.taniform.org','info@taniform.org','+237','1Km from Mile 4, Menteh Road, Bamenda, North West Region, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Passport\", \"Application fee\", \"Letters of recommendation (for MA, PhD)\", \"Online Application form\", \"Motivation Letter\", \"Proof of fee payment\", \"Photographs\", \"Medical Certificate\"]',25000.00,'XAF',NULL,NULL,'[\"School of Business & Management Sciences (SBMS): HND (Accounting, Banking & Finance, Insurance, Management, Marketing, Executive Secretary Studies), Bachelor\'s (Accounting, Management, Insurance), Master\'s (MBA in Accounting, Banking and Finance, Marketing, Human Resource Management), Doctorate (Doctor of Accounting, Finance, Marketing, Human Resource Management, Project Management)\", \"School of Engineering Sciences and Technology (SEST): Engineering programs at various levels\", \"School of Health and Biomedical Sciences (SHBS): Health and medical sciences programs\", \"School of Arts and Social Sciences (SASS): HND (Didactics, Educational Planning & Curriculum Development, Print Journalism), Bachelor\'s (International Law, Arts in Leadership, Land & Survey, Journalism & Mass Communication, Arts in Education), Master\'s and Doctorate programs\", \"School of Agriculture and Food Sciences (SAFS): Bachelor of Agriculture, Agricultural Engineering programs\", \"School of Information Technology (SIT): Information technology and web technology programs\", \"Certificate Programs: Law, Mass Communication and Journalism, Education, Web Technology, Marketing, Banking and Finance, Office Assistant, Financial Services, Entrepreneurship\", \"Diploma Programs: Law, French, Mass Communication and Journalism, Nursing, Information Technology, Engineering Management Technology, Electronic Physics, Marketing\", \"Distance Learning/E-Learning: Online programs available for global students\"]',NULL,0,1,377455.00,800000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(18,'Trustech University - Trustech Higher Institute of Technology and Professional Management','Trustech University was established in 2001 for the public benefit and is recognized as Trustech Higher Institute of Technology and Professional Management. The institution was founded with the aim of producing well trained and certified IT and business professionals ready to fit into the job market. Trustech runs two campuses, one in Cameroon with Ministerial Authorization: No. 11/051/MINESUP/SG/DDES and another in USA. The institution focuses on \"Learn to Earn\" with specialized courses designed to help students get jobs.','university','Buea','https://trustechuniversity.com','info@trustechuniversity.com','+1(651) 3350302','Buea Campus - 200M Below UB Junction, Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Submit online application\", \"Pay application fee\", \"Submit required documents\", \"Complete admissions tasks\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\", \"Letters of recommendation (for MA, PhD)\", \"Motivation Letter\", \"Student visa (for international students)\"]',25000.00,'XAF',NULL,NULL,'[\"School of Business Administration: Marketing & Management Studies, Human Resource Management, Accounting, Banking & Finance\", \"School of Engineering: Software Engineering, Computer Science & Networks, Computer Graphics & Web Design, Hardware Maintenance, Database Management, Network Security\", \"Vocational Training Programs: Web Master, Graphics Design, Computer Maintenance, Network Maintenance, Computerized Accounting, Office Automation and Secretarialship\", \"Professional Training Programs: HND certificate, Bachelor\'s degree\", \"Short Courses: Microsoft Office Suite, Computerized Accounting, CCNA Cisco Networking, CompTIA A+, Graphics Design, Web Design, AWS, Database Management\"]',NULL,0,1,300000.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(19,'Fotabe Universal Higher Institute of Cameroon (FUNIC)','Fotabe Universal Higher Institute of Cameroon (FUNIC) was founded in 2003 by renowned Cameroonian entrepreneur and business leader Fotabe Elmine. FUNIC was created to make a difference in both the way education is provided and the manner in which business is done. The institution welcomes students from all over the country and around the world, including young graduates, entrepreneurs, business tycoons, housewives, and domestic workers. FUNIC believes that success comes first, then money comes next, and that the best results can only be achieved by partnering with other organizations and clients.','institute','Buea','https://funic.co','info@funic.co','679-735-200 / 674-108-702','Malingo Street, Molyko Buea P.O.BOX. 462, Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency \", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Application fee\", \"Letters of recommendation (for MA, PhD)\", \"Photographs\", \"Motivation Letter\", \"Passport\", \"Medical Certificate\", \"Proof of fee payment\", \"Online Application form\"]',25000.00,'XAF',NULL,NULL,'[\"Accounting: Bachelor of Accounting\", \"Administration: Business administration programs\", \"Business: Business management programs\", \"Economics: Economics programs\", \"Finance and Banking: Banking and finance programs\", \"Logistics: Logistics and supply chain programs\", \"Management: Business management programs\", \"Marketing: Marketing programs\", \"Transportation: Transportation management programs\"]',NULL,0,1,281683.00,581683.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(20,'Saint Louis Higher Institute of Health and Biomedical Services (SLUI)','Saint Louis Higher Institute of Health and Biomedical Services, founded in 2002, started as a nursing school with 12 students and has grown into St. Louis University Institute of Health and Biomedical Sciences with about 880 students. The institution operates across five campuses in four cities: Douala, Yaounde, Bamenda, and Ndu. SLUI focuses on \"Character and Excellence\" with three faculties offering diverse opportunities in Biomedical and health sciences, Engineering and technology, and Agriculture and natural sciences. The institution is mentored by the University of Buea and emphasizes hands-on learning through the CORE Principle.','institute','Bamenda','https://slui.org','info@slui.org','(+237) 678-425-922 / 671-710-928','Mile 3 Nkwena, Bamenda, Cameroon. Additional campuses: Douala I - Rond Point Maetur, Bonamousadi; Douala II - Opposite Nestle, Bonaberi; Yaounde - Despot De Bois, Simbock; Ndu Campus','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Proof of fee payment\", \"Passport\", \"Letters of recommendation (for MA, PhD)\", \"Photographs\", \"Application fee\", \"Motivation Letter\", \"Medical Certificate\", \"Online Application form\"]',25000.00,'XAF',NULL,NULL,'[\"Faculty of Health and Biomedical Sciences: Nursing, Physiotherapy, Dental Therapy, Radiology, Medical Lab Sciences, Pharmacy Technology, Health, Hospitality, Medicine, Occupational Health\", \"Faculty of Engineering & Technology: Engineering and technology programs\", \"Faculty of Agriculture and Natural Sciences: Agriculture and natural sciences programs\", \"IT Certification Programs: Amazon Cloud Certifications, Microsoft Data Analytics Certification, Full Stack Web Development, Graphics Design & 3D Animation\", \"Short Courses: International Medical Foundation Programme\", \"Higher National Diploma (HND): Health, agriculture, engineering and technology programs\", \"Bachelors: Health, Agriculture, Engineering and Technology programs\", \"Masters: Health and Biomedical Sciences (online, on-site, and hybrid modes)\"]',NULL,0,1,390976.00,800000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(21,'Douala Higher Institute of Technology (DIT)','Douala Higher Institute of Technology (DIT), founded in 1997, is located in the Makèpè district (Rhône-Poulenc) in Douala, Cameroon, about 300 meters on the right after the company CINPHARM, on the road to LOGPOM. The campus offers a very quiet environment for studies and is easily accessible. DIT focuses on cutting-edge technologies like Electrical Engineering, Telecommunications, and Information Technology, playing a crucial role in solving basic economic problems, structural transformations, and the establishment of information enterprise globalization. The institution prepares technicians and engineers with specialized, interdisciplinary, and current knowledge for various professional domains in industry, commerce, and public administration.','institute','Douala','https://douala-it.com','info@douala-it.com / douala_it@yahoo.fr','+(237) 233 475 975','Campus DIT à Douala-Maképé à 300 mètres du carrefour Rhôme-Poulenc, derrière la société CINPHARM, PO Box: 1623 Douala-Cameroun','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Proof of fee payment\", \"Passport\", \"Photographs\", \"Letters of recommendation (for MA, PhD)\", \"Medical Certificate\", \"Online Application form\", \"Application fee\", \"Motivation Letter\"]',25000.00,'XAF',NULL,NULL,'[\"Accounting: Bachelor of Accounting\", \"Biomedicine: Biomedical sciences programs\", \"Business: Business management programs\", \"Computer Science: Computer science and technology programs\", \"Engineering: Engineering programs including Electrical Engineering, Telecommunications\", \"Environmental Studies: Environmental science and studies programs\", \"Finance and Banking: Banking and finance programs\", \"IT: Information technology programs\", \"Logistics: Logistics and supply chain management programs\", \"Management: Business and management programs\", \"Marketing: Marketing and sales programs\", \"Transportation: Transportation and logistics programs\", \"Bachelors of Engineering / Licence Professionnelle: Energy and related specializations\"]',NULL,0,1,329569.00,500000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(22,'National Polytechnic Bambui (NPB)','National Polytechnic Bamenda (NPB), formerly named National Polytechnic Bambui until September 2012, is one of the reputable and prestigious private higher education institutions in Cameroon noted for its excellent, moral and professional education. Founded in 1996 with about 16 students, NPB gained full authorization from the Cameroon Ministry of Higher Education on August 13, 2002 with Authorization No 002/0074/MINESUP. Located at Mile 7, Nkwen, Bamenda, North West Region, Cameroon, NPB offers innovative and quality education geared toward jobs and wealth creation. As a technical university, 60% of studies are dedicated to hands-on training, focusing on training the head, heart, and hands.','polytechnic','Bamenda','https://npbedu.org','info@npbedu.org','(+237) 677 94 81 18','Mile 7, Nkwen, Bamenda, North West Region, Cameroon. PO Box 1136 Bamenda, North West Region, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Proof of fee payment\", \"Passport\", \"Letters of recommendation (for MA, PhD)\", \"Medical Certificate\", \"Motivation Letter\", \"Application fee\", \"Photographs\", \"Online Application form\"]',25000.00,'XAF',NULL,NULL,'[\"Agriculture: Bachelor of Agriculture\", \"Biology: Bachelor of Biological\", \"Biomedicine: Bachelor of Biomedicine\", \"Education and Teaching: Bachelor of Education\", \"Engineering: Bachelor of Engineering\", \"Journalism: Bachelor of Journalism\", \"Law and Jurisprudence: Bachelor of Law & Jurisprudence\", \"Management: Bachelor of Management\", \"Media Communications: Bachelor of Media\", \"Technology: Bachelor of Technology\", \"Tourism: Bachelor of Tourism\", \"Food Technology: Practical laboratory studies\", \"Medical Laboratory Science: Well-equipped laboratory facilities\", \"Agricultural Technology: Hands-on training for Senior Agricultural Technicians\", \"Computer Studies: Well-equipped computer hall facilities\"]',NULL,0,1,200558.00,700000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(23,'Bamenda University of Science and Technology (BUST)','Bamenda University of Science and Technology (BUST) was fashioned on the Anglo-Saxon University system, founded in 1995 and went operational in 1998. This lay private institution of higher learning is the brainchild of the Industrial and Educational Development Company (INDECO Ltd.), incorporated on 12th October 1995, with headquarters in Bamenda, North West Region of Cameroon. BUST was founded by late Rt. Hon. Dr. John Ngu Foncha, former Premier of Southern Cameroons, first Prime Minister of West Cameroon and first Vice President of the Federal Republic of Cameroon. The university focuses on professional and industrial education as the key for development, training students professionally in small and medium size industries and enterprises for self-employment and entrepreneurship. BUST has attracted students from all over Africa including The Gambia, Benin, Nigeria, Equatorial Guinea and Germany, with strong international affiliations and networking with universities and organizations worldwide.','university','Bamenda','https://bust.edu.cm','info@bust.edu.cm','6 76 22 36 71','Bamenda-Nkwen mile 6, Bamenda City Postcode 277 Nkwen-Bamenda, VXVR+7F9, Bali, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Application fee\", \"Medical Certificate\", \"Proof of fee payment\", \"Passport\", \"Online Application form\", \"Motivation Letter\", \"Letters of recommendation (for MA, PhD)\", \"Photographs\"]',25000.00,'XAF',NULL,NULL,'[\"Accounting: Bachelor of Accounting\", \"Administration: Business administration programs\", \"Agriculture: Agricultural sciences programs\", \"Biology: Biological sciences programs\", \"Business: Business management programs\", \"Chemistry: Chemistry and chemical sciences programs\", \"Education and Teaching: Education and teaching programs\", \"Engineering: Engineering programs\", \"Food and Nutrition: Food science and nutrition programs\", \"Health: Health sciences programs\", \"Management: Business and management programs\", \"Mathematics: Mathematics and mathematical sciences programs\", \"Medicine: Medical sciences programs\", \"Natural Sciences: Natural sciences programs\", \"Nursing: Nursing and healthcare programs\", \"Philology: Language and philology programs\", \"Philosophy: Philosophy and humanities programs\", \"Physics: Physics and physical sciences programs\", \"Psychology: Psychology and behavioral sciences programs\"]',NULL,0,1,321118.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(24,'International University, Bamenda (IUB)','International University Bamenda (IUB) is one of the first private universities in Cameroon, founded in 1990 by Dr. Patrick Chefu Fusi with registration number 000056. The university is accredited by the Ministry of Higher Education and linked to many international universities for work and studies. IUB collaborates with University of Bamenda (UBa) for HND programs and University of Douala for Degree programs and masters. The university has sustained itself financially and academically for over 30 years, graduating 16 batches including doctoral graduates who serve as Teachers, Head of Departments, Vice Principals, Principals, Engineers, Agriculturists, Lawyers, Bankers, Business Managers, Inspectors of Education, Chiefs of Services, Delegates of Education, and University lecturers. IUB operates with the motto \"Service to mankind for the glory of God\" and focuses on providing quality education through teaching and research in an environment conducive to such pursuits.','university','Bamenda','https://iubda.org','info@iubda.org','(+237) 677 234 331 / 675 860 100 / 675 084 463','Commercial Avenue, P.O. Box 444, Bamenda, Cameroon. Main Campus: Mile 7 Mankon, 2nd Campus: T-junction. Administrative offices: Newlife Building, Lecture halls: Saint Bernard Building, 4th Floor, Commercial Avenue','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Photocopy of Birth Certificate\", \"Photocopy of GCE A/L or equivalent certificate\", \"Photocopy of National Identity Card\", \"Two recent passport size photos\", \"Non-refundable registration fee of 25,000 FCFA\", \"HND Attestation or equivalent certificate for degree students\", \"Proof of fee payment\", \"Medical Certificate\", \"Motivation Letter\", \"Online Application form\"]',25000.00,'XAF',NULL,NULL,'[\"Faculty of Education (FED): Didactics, Curriculum Development and Teaching, Educational Management and Administration, Measurement and Evaluation, Educational Administration and Planning, Curriculum Studies, Guidance and Counselling, Special Education and Distance and Continuous Education, Mental Deficiency in Children, Public Health Education, Social works Education, Mathematics/statistics\", \"Faculty of Social and Management Sciences (FSMS): Accountancy, Banking and Finance, Marketing, Insurance, International Trade, Micro finance, Financial Management, Management, Project Management, Human Resource Management, Secretariat Administration, Logistics and Transport Management, Management of NGOs, Operation of Air Transport, Ports and Shipping Management, Management Information Systems, Total Quality Management, Local Government Management, Local Government Finance, Local Government Taxation, Local Government Administration, Events Management, Supply chain management, Public Administration\", \"Faculty of Engineering and Technology (FET): Engineering and technology programs\", \"Faculty of Health Sciences (FHS): Medicine, Nursing, Pharmacy, Biomedicine, Biochemistry, Microbiology, Public Health Education\", \"Agriculture: Agricultural sciences programs\", \"Architecture: Architecture and design programs\", \"Economics: Economics and economic sciences programs\", \"Food and Nutrition: Food science and nutrition programs\", \"Journalism: Journalism and media communications programs\", \"Tourism and Hotel Management: Tourism Management programs\", \"Gender Studies: Gender and social studies programs\", \"Translation/Interpretation: Language and translation programs\"]',NULL,0,1,250000.00,700000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(25,'Buea Institute of Technology (BIT)','Founded in 2014, Buea Institute of Technology (BIT) is a vocational training institute based in Buea, Cameroon. BIT is a professional school offering Short Courses, National Diploma Programs, Higher National Diploma and Certificate Programmes in Basic Computing, Graphic Design, Web Design, Web Applications Development, Software Development, Computer Maintenance and Networking, Digital Photography, Videography, Software Engineering, Journalism, Digital Marketing and more. At BIT, training programmes are focused exclusively on Media Studies and Information Technology, making it one of the most specialty-focused training centres in Cameroon. The institute emphasizes practical learning, work placements, industry projects, and real-world case studies, making graduates attractive to employers seeking candidates with hands-on experience and industry-specific expertise.','institute','Buea','https://bit.edu.cm','ask@bit.edu.cm','+237 653299033 / +237 674878693','P.O. Box 1530 Molyko, Buea, South West Region, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Proof of fee payment\", \"Passport\", \"Letters of recommendation (for MA, PhD)\", \"Photographs\", \"Application fee\", \"Motivation Letter\", \"Medical Certificate\", \"Online Application form\"]',10000.00,'XAF',NULL,NULL,'[\"Certificate Programmes (4 Months): Certificate in Basic Computing, Certificate in Web Design, Certificate in Graphic Design, Certificate in Digital Marketing, Certificate Video Production\", \"National Diploma Programmes (10 Months): ND Office Automation Secretaryship, ND Webmaster, ND Production of Graphic Design, ND Web Applications Development, ND Computer Maintenance, ND Computer Networking\", \"Higher National Diploma Programmes: HND Software Engineering, HND Computer Graphics & Web Design, HND Graphic Design, HND E-Commerce & Digital Marketing, HND Journalism, HND Corporate Communication, HND Cinematography\", \"Short Courses: On-demand courses including particular software programmes or packages designed to cater for particular student needs\", \"Department of Motion Pictures and Animation: Cinematography, Video Production, 3D Animation & Visual Effects\", \"Department of Web and Software Development: Software Engineering, Web Applications Development, Computer Maintenance, Computer Networking\", \"Department of Media and Communication: Journalism, Corporate Communication, Digital Marketing, Digital Photography\"]',NULL,0,1,200000.00,350000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(26,'Higher Institute of Transport and Logistics (HITL)','Higher Institute of Transport and Logistics (HITL) is one of the schools under the University of Bamenda, established with a vision to shape the next generation of transportation and logistics professionals. HITL strives to provide top-notch education and practical training to students, equipping them with the knowledge, skills, and expertise necessary to excel in the fast-paced transport and logistics industry. The institution offers a wealth of resources, courses, and information with 75% of instructors being professionals mainly from industries. HITL emphasizes practical training with yearly field trips and internships for up to 5 months, preparing students for rewarding careers in transport and logistics.','institute','Bamenda','https://hitlbamenda.cm','info@hitlbamenda.cm','(+237) 676 735 154','P.O Box: 39, Bambili, NW Region, Cameroon','[\"Minimum 4 GCE O/L papers including English and Mathematics or Economics\", \"Minimum 2 GCE A/L papers excluding Religious Knowledge\", \"Baccalauréat B, C, D, E, STT and industry series\", \"Competitive entrance examination for BSc programs\", \"Study of files for HND and BTech programs\"]','[\"Online registration on website (www.hitlbamenda.cm)\", \"Pay online registration fee of 1,000 FCFA\", \"Pay examination fee of 20,000 FCFA into HITL Bank account\", \"Fill and download registration form\", \"Attach all relevant documents\", \"Deposit at examination centres (Bamenda, Bafoussam, Buea, Douala, Ngaoundere, Yaounde)\"]','[\"GCE O/L certificates including English and Mathematics\", \"GCE A/L certificates excluding Religious Knowledge\", \"Baccalauréat or equivalent certificates\", \"Registration fee receipt (1,000 FCFA)\", \"Examination fee receipt (20,000 FCFA)\", \"Completed registration form\", \"Passport photographs\", \"Birth certificate\"]',1000.00,'XAF',NULL,NULL,'[\"Higher National Diploma (HND) Programs (2 years): HND Logistics and Transport Management, HND Ports and Shipping Management\", \"Bachelor of Science (BSc) Programs (3 years): BSc Customs, BSc Land Transport, BSc Maritime Transport, BSc Transit and Logistics, BSc Tourism & Hospitality Management\", \"Bachelor of Technology (BTech) Programs HND + (1 year): BTech Shipping Management, BTech Logistics and Transport Management\", \"Master of Science (MSc) Programs (2 years): MSc Tourism & Cultural Heritage Development, MSc Tourism & Sustainable Environmental Management, MSc Transportation, MSc Shipping Management, MSc Logistics and Supply Chain Management\", \"Departments: Air Transport (AT), Customs (Cu), Land Transport (LT), Maritime Transport (MT), Tourism and Hospitality Management (THM), Transit and Logistics (TL)\"]',NULL,0,1,300000.00,800000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(27,'Higher Institute of Petroleum & Logistics (HIPAL)','Higher Institute of Petroleum and Logistics (HIPAL) is a private university in Cameroon founded in 2014, authorized by the Ministry of Higher Education and affiliated with the University of Bamenda. HIPAL offers undergraduate and postgraduate programs in engineering, business, and maritime studies, making it a great option for students who want to pursue careers in petroleum, logistics, or engineering industries. The institution is committed to improving performance not only through quality courses and programs but also by creating an appropriate academic and social environment within the context of modern technology to produce highly skilled graduates. HIPAL believes in innovation, taking risks, failing fast, and learning from mistakes, creating a safe and supportive environment where students can experiment without fear of failure.','institute','Bamenda','https://hipal.edu.cm','info@hipal.edu.cm','+237 670191902 / +237 672140376','Bamenda Campus: Mile 4 Beside the full Gospel Mission, Bamenda. Limbe Campus: Mile 2 Opposite GHS, Limbe, Cameroon','[\"Undergraduate: Minimum 2 papers in Advanced Level (GCE A/L) or equivalent\", \"Postgraduate: Bachelor degree from state University or equivalent recognized by Ministry of Higher Education\", \"Good academic record\", \"English proficiency\", \"Application form\"]','[\"Choose a program\", \"Complete online application\", \"Submit required documents\", \"Pay application fee\", \"Receive admission decision\"]','[\"Photocopy of Birth Certificate\", \"Photocopy of Ordinary Level certificate or result slip\", \"Photocopy of Advanced Level certificate or result slip\", \"For postgraduate: Authenticated bachelor degree\", \"Online applicants: Scan copies to info@hipaledu.cm\", \"Application fee receipt\", \"Passport photographs\"]',25000.00,'XAF',NULL,NULL,'[\"School of Engineering & Technology: B.Sc. in Computer Science, Civil Engineering, Chemical Engineering\", \"School of Business, Finance & Management (HND/Bachelor): Logistics & Transport Management, Banking & Finance, Accountancy, Marketing, Project Management, Human Resource Management\", \"School of Petroleum & Mining Engineering: Petroleum Engineering, Petroleum Logistics, Mining Engineering, Quarries Operations, Applied Geology\", \"School of Maritime Studies: B.Sc. in Nautical Science, Shipping & Ports Management\", \"Undergraduate Programs: Various degree programs in engineering, business, and maritime studies\", \"Postgraduate Programs: Advanced degree programs for career advancement\"]',NULL,0,1,400000.00,900000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(28,'Higher Institute of Science Technology Business & Agriculture (HISTBA)','Higher Institute of Science Technology Business & Agriculture (HISTBA) is the leading Professional School in Cameroon, established in 2015. HISTBA offers professional university training with job-ready skills through flexible schedules including full-time, part-time, and online programs taught by industry experts. The institution is trusted by 6+ institutions and provides 98% job placement rate with over 2,500 graduates. HISTBA offers scholarships and is accredited, providing career support and no hidden fees. The institution focuses on career development and capacity building for job-ready skills, with flexible schedules for full-time, part-time, and online students from Monday to Saturday, including weekends and evenings.','institute','Bamenda','https://histba.org','mail@histba.org','+237 654456341','Meta Quarters, 123 Education St, Springfield, ST 12345, Bamenda, Northwest Region, Cameroon','[\"First Year: GCE/TVEE A/L or BACC holders\", \"Top-up Bachelor: HND/BTS or recognized diploma\", \"Masters: Bachelor degree certified by competent academic authority\", \"Good academic record\", \"English proficiency\"]','[\"Download admission form\", \"Complete application form\", \"Pay registration fee (75,000 FCFA)\", \"Pay student union fees (10,000 FCFA)\", \"Submit required documents\", \"Receive admission decision\"]','[\"Photocopy of GCE Ordinary Level or TVEE Intermediary Level, or CAP\", \"Photocopy of GCE/TVEE Advanced Level or BACC\", \"Photocopy of Birth Certificate\", \"Photocopy of National ID Card or international passport for foreign students\", \"Two 4x4 passport size photographs\", \"Photocopy of receipt of payment of registration fee\", \"For Top-up: Certified copy of HND Slip or Diploma, or BTS, or recognized diploma\", \"For Masters: Bachelor degree/Attestation certified by competent academic authority, Academic transcripts, Two sealed letters of recommendation\"]',75000.00,'XAF',NULL,NULL,'[\"School of Business, Finance & Management: HND (3 years, 400,000 FCFA), BSC (1 year, 600,000 FCFA), MASTERS (2 years, 600,000 FCFA)\", \"School of Education: HND (3 years, 450,000 FCFA), BSC (1 year, 500,000 FCFA), MASTERS (2 years, 550,000 FCFA)\", \"School of Engineering: HND (3 years, 450,000 FCFA), BSC (1 year, 550,000 FCFA), MASTERS (2 years, 550,000 FCFA)\", \"School of Home Economic and Social Works: HND (2 years, 450,000 FCFA), MASTERS (2 years, 550,000 FCFA)\", \"School of Medical and Biomedical Science: HND (3 years, 450,000 FCFA), BSC (2 years, 400,000 FCFA), MASTERS (2 years, 550,000 FCFA)\", \"School of Agriculture and Food Science: HND (3 years, 350,000 FCFA), BSC (3 years, 450,000 FCFA), MASTERS (2 years, 300,000 FCFA)\"]',NULL,0,1,300000.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(29,'ISEC Higher Institute of Health & Human Services','ISEC Higher Institute of Health & Human Services offers academic excellence at students\' doorstep with programs in nursing, public health, medical laboratory science, and healthcare management. The institute provides HND, Bachelor, and Masters level programs designed to prepare students for careers in the healthcare sector with emphasis on practical training and professional development. ISEC focuses on delivering quality healthcare education and human services training to meet the growing demands of the healthcare industry.','institute','Limbe','https://isecintl.org','admin@isecintl.org','+237 650 969 187','New Road Mokindi Limbe, Southwest, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\", \"Program-specific requirements\"]','[\"Complete application form\", \"Submit required documents\", \"Pay application fee\", \"Receive admission decision\"]','[\"Completed Application Form\", \"Certified copy of Birth Certificate\", \"Certified copy of Photo ID\", \"Passport size photo\", \"Academic transcripts\", \"Application fee receipt\"]',25000.00,'XAF',NULL,NULL,'[\"Nursing: HND, Bachelor, Masters programs - Comprehensive nursing education with clinical practice\", \"Public Health: HND, Bachelor, Masters programs - Population health and community health sciences\", \"Medical Laboratory Science: HND, Bachelor programs - Clinical laboratory testing and diagnostics\", \"Healthcare Management: HND programs - Healthcare administration and management skills\", \"Health & Human Services: Various healthcare and human services programs for community health\"]',NULL,0,1,350000.00,750000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(30,'HOPE Higher Institute of Healthcare Professions (HHIHP)','HOPE Higher Institute of Healthcare Professions (HHIHP) believes in the 2030 Agenda for Sustainable Development Goals set forth by the United Nations in 2015, specifically goal #4 Quality Education. Per the United Nations \"Education enables upward socioeconomic mobility and is a key to escaping poverty.\" HHIHP hereby joins the Ministry of Higher Education (MINESUP) to meet its quoted objective to \"provide the nation with the skills that it needs to achieve her emergence by 2035.\" The institute was established by MINESUP signed order N0. 1800866 of 02 Nov 2018 establishing the system of training, assessment, and syllabi for obtaining a Higher National Diploma (HND) in the Republic of Cameroon.','institute','Limbe','https://hopehigherinstitute.com','info@hopehigherinstitute.com','23 33 33 222 / 67 68 77 777','First Floor of Limbe Pharmacy Building, Mile One, SouthWest Region, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Visit school website\", \"Fill online application form\", \"Submit required documents\", \"Pay application fee\", \"Receive admission decision\"]','[\"Completed application form\", \"Birth certificate\", \"Academic transcripts\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\"]',25000.00,'XAF',NULL,NULL,'[\"Nursing Sciences: Workforce certification programs preparing nurses for evolving healthcare roles\", \"Medical Laboratory Sciences: Programs preparing graduates to perform essential laboratory testing\", \"Medical Imaging Technology: Radiologic technologist programs with x-ray and radiography skills\", \"Pharmacy Technology: Programs for pharmacy technicians with evolving responsibilities\", \"Midwifery: Programs encompassing care of women during pregnancy, labour, and postpartum\", \"Healthcare Management: Business professionals who comprehend healthcare system needs\", \"Physiotherapy: Physical therapy programs with evidence-based exercise and treatment skills\", \"Ultrasonography: Sonography programs for non-invasive diagnostic procedures\", \"Workforce Certification Programs: Additional certification courses adding value to academic programs\"]',NULL,0,1,300000.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(31,'Veracity Higher Institute of Business & Technology (VHIT)','Veracity Higher Institute of Business & Technology (VHIT) is an institute of the University System created to assist adults in the job market. With over 7 years of dedication to educating youth, VHIT provides a highly streamlined and straightforward application process, making it easy and efficient for individuals to apply. The goal of VERACITY is to make higher education accessible to all with low in-state tuition rates for Cameroon residents, reduced tuition for services to everyone, and $0 in textbook costs for almost every course. VHIT offers 35+ qualified professional HND programs to choose from, with instructors having an average of 15+ years of teaching experience. The institution aspires to be the first in Entrepreneurship by 2026 and provides comprehensive student services including lifetime career services, chat, phone, and email advice.','institute','Buea','https://veracityhigherinstitute.com','info@Veracityhigherinstitute.com','+237 670 846 328','Molyko Campus, UB Street, Buea, SW Cameroon','[\"High school certificate or GCE A Levels\", \"Graduation from college for undergraduate admission\", \"Bachelor\'s degree from regionally accredited institution for graduate admission\", \"Good academic record\", \"English proficiency\"]','[\"Contact admission office for details\", \"Submit application online\", \"Provide required documents\", \"Pay application fee (waived for new applicants)\", \"Receive admission decision\"]','[\"High school certificate or GCE A Levels\", \"College or university transcripts\", \"Bachelor\'s degree certificate (for graduate programs)\", \"Application form\", \"Passport photos\", \"Application fee receipt\"]',10000.00,'XAF',NULL,NULL,'[\"Cybersecurity: Bachelor of Science in Cybersecurity with network design and security focus\", \"Business & Finance Marketing: Bachelor of Arts in Business and Finance Marketing\", \"Agriculture and Food Science: Bachelor Degree in Agriculture and Food Science\", \"Communication: Bachelor of Science in Communication\", \"Education: Bachelor of Science in Education\", \"Legal Studies: HND and Degree programs in Legal Studies\", \"Medical & Biomedical Sciences: Higher National Diploma in Medical and Biomedical Sciences\", \"Computer Engineering: Bachelor degree in Computer Engineering\", \"Nursing: Nursing programs\", \"Pharmacy Technology: Pharmacy technology programs\", \"Networks and Telecommunication: Network and telecommunication programs\", \"Electrical and Electronics Engineering: Electrical and electronics engineering programs\", \"Higher National Diploma (HND): 35+ professional HND programs available\", \"Bachelor\'s Degrees: Various bachelor degree programs\", \"Undergraduate Certificate: Certificate programs\", \"Graduate Certificate: Advanced certificate programs\", \"Bachelor\'s Degrees Top-up: Top-up degree programs\"]',NULL,0,1,250000.00,500000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(32,'Higher Institute of Professional Studies (HIPS)','Higher Institute of Professional Studies (HIPS) offers a diverse range of 23+ undergraduate courses and 14 graduate programs, providing students with comprehensive education and specialized training in various fields. HIPS offers flexible, personalized, collaborative platforms and immersive faculty-led course instruction, making it easy to access online curriculum from anywhere in the world. The institution provides a vibrant social life with events like the HIPS Talent Show, Mr. and Miss HIPS competition, and the lively HIPS Games Festival. HIPS offers prestigious scholarships including an 8,000,000 FRS scholarship for studies in Britain, 2,000,000 FRS Entrepreneurship Scholarship, and Director\'s Scholarship for deserving students. The registration process is easy with tuition fees payable in up to 10 instalments, and students get lots of free things when they register. HIPS DON\'T LIE.','institute','Buea','https://hips.edu.cm','info@hips.edu.cm','+237 670 538 333 / +237 679 647 761','Infinity Building - Sosliso Molyko Buea SouthWest Region, Cameroon','[\"High school certificate or GCE A Levels\", \"Bachelor\'s degree for graduate programs\", \"Good academic record\", \"English proficiency\", \"Application form\"]','[\"Complete online application (takes 10 minutes)\", \"Submit application form\", \"Connect with admissions representative\", \"Complete the process with counselor guidance\", \"Create your schedule\"]','[\"Completed application form\", \"Academic transcripts\", \"Birth certificate\", \"Passport photos\", \"Application fee receipt\", \"Registration fee receipt\"]',20000.00,'XAF',NULL,NULL,'[\"Business Programs: Accounting, Banking & Finance, Entrepreneurship & Innovation, Digital Marketing, Financial Management, Human Resource Management, Logistics & Transport Management, Maritime Management, Project Management, Management, Marketing, Secretarial Studies\", \"Law Programs: Legal studies and law programs\", \"Medical Sciences: Nursing, Medical Lab Technician, Pharmacy Assistant, Dental Therapy, Midwifery, Nursing Assistant, Medical Imaging Technology\", \"Technology Programs: Software Technology, Hardware Management, Cyber Security, Database Management, Web Development\", \"Graduate Programs: 14 nationally ranked graduate programs including Business Administration, Information Technology, Nursing, Psychology\", \"Business & Administration Graduate: Accounting, Financial Management, Corporate Banking and Finance, Entrepreneurship and Innovation, Accounting and Finance, Management, Human Resource Management, Project Management, Law, Economics, Logistics and Transport Management, Marketing, Financial Economics Concentration\", \"Undergraduate Programs: 23+ undergraduate courses including Business Administration, Computer Science, Nursing, Psychology\", \"Higher National Diploma (HND): 23+ HND courses with practical skills and specialized knowledge\", \"Short Courses: Various short course programs\", \"Bachelors of Science Top Up: Top-up degree programs\"]',NULL,0,1,250000.00,600000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(33,'Covenant University Institute (CUINS)','Covenant University Institute (CUINS) is a top-class university found in Buea-Cameroon, known for excellent results and well-sorted out teaching techniques. CUINS offers hundreds of registered students with vast majority of courses, providing learning for everyone and earning opportunities. The institution focuses on building skills with courses, gaining recognizable certificates, and expanding educational potential. CUINS has a global reach with learners worldwide and provides expert-level training in various fields including computer engineering, legal career, medical sciences, electrical engineering, and agriculture.','institute','Buea','https://cuins.edu.cm','cuinscam@gmail.com','+237 6 77 24 21 63 / +237 6 52 39 31 71','Behind Checkpoint Cathedral, St Luke Street, SW Buea, Cameroon','[\"High school certificate or GCE A Levels\", \"Good academic record\", \"English proficiency\", \"Application form\", \"Academic transcripts\"]','[\"Choose a course category\", \"Complete enrollment form\", \"Submit required documents\", \"Pay enrollment fee\", \"Start learning\"]','[\"Completed enrollment form\", \"Academic transcripts\", \"Birth certificate\", \"Passport photos\", \"Enrollment fee receipt\"]',15000.00,'XAF',NULL,NULL,'[\"Computer Engineering: Industrial Computing and Automation, Computer Graphics and Web Design, Hardware Maintenance, Software Engineering\", \"Legal Career: Custom and Transit, Land Law, Stock Market Exchange, Legal Assistants, Tax Management, Business Law\", \"Medical Sciences: Medical and Biomedical Sciences programs\", \"Electrical Engineering: Electrical engineering programs\", \"Agriculture: Agricultural sciences and farming programs\", \"Management Sciences: Business and management programs\", \"Business and Finance: Banking and Finance, Microfinance, Insurance\", \"Mechanical Engineering: Mechanical engineering programs\", \"Course Categories: All Courses, Agriculture, Computer Engineering, Legal Career, Medical Sciences, Electrical Engineering, Management Sciences, Business and Finance, Mechanical Engineering\", \"Expert Programs: Expert-level training in various specialized fields\", \"Certificate Programs: Recognizable certificates for skill building\", \"Skill Development: Courses focused on building practical skills\"]',NULL,0,1,200000.00,450000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(34,'Royal Academy Institute of Health Sciences (RAHIHS)','Royal Academy Institute of Health Sciences (RAHIHS) is committed to raising students that will impact the world of Science and research through innovative ideas and application of evidence-based scientific and research knowledge. Built on the vision that education serves as a keystone in improving society and building better futures for all, RAHIHS seeks to create new knowledge and understanding, and foster creativity and innovation, for the benefit of our communities, society, and the environment. The institution offers HND (3 years) and First Degree (1 year) programs in various health sciences disciplines.','institute','Buea','https://royalacademyinstitute.com','info@royalacademyinstitute.com','(+237) 652039101 / (+237) 659824046','Wokoko (Beside Full Gospel entrance Sosoliso), Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\", \"Medical certificate\"]','[\"Submit online application form\", \"Pay application fee\", \"Submit required documents\", \"Complete registration process\", \"Receive admission letter\"]','[\"Birth certificate\", \"Academic transcripts (O level, A level, Baccalaureate)\", \"Passport photos\", \"Application fee receipt\", \"Medical certificate\", \"Registration fee receipt\"]',25000.00,'XAF',NULL,NULL,'[\"Nursing: Anatomy, Physiology, Pharmacology - HND (3 years), First Degree (1 year)\", \"Health Care Management: Health Care Systems, Healthcare Laws, Operations Management - HND (3 years), First Degree (1 year)\", \"Nutrition and Dietetics: Nutrition Science, Macronutrients, Nutrition Research - HND (3 years), First Degree (1 year)\", \"Pharmacy Technology: Pharmacy Practice, Pharmacology, Pharmacy Inventory - HND (3 years), First Degree (1 year)\", \"Midwifery: Antenatal Care, Postpartum Care, Clinical Practicum - HND (3 years), First Degree (1 year)\", \"Medical Laboratory Sciences: Clinical Chemistry, Hematology, Molecular Diagnostics - HND (3 years), First Degree (1 year)\", \"Health Sanitary Inspector: Environmental Health, Waste Management, Health Inspection and Compliance - HND (3 years), First Degree (1 year)\", \"Dental Technology: Dental Anatomy, Orthodontic Appliance, Prosthodontics and Restorative Dentistry - HND (3 years), First Degree (1 year)\"]',NULL,0,1,350000.00,380000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(35,'STEM University (STEM-HIHTS)','STEM University (STEM-HIHTS) is committed to making higher education affordable and accessible. We help students gain the skills and knowledge needed for successful careers in healthcare, management, business, and technology. Our programs prepare students to get good jobs, help others, and make a difference in their community. STEM offers practical classes with field internships, real job skills training, affordable fees with 3-installment payment plans, modern campuses in Bonaberi and Bepanda, and language training in English and German with exam preparation (IELTS, TOEFL). The institution provides free tools including BP machines, laptops, lab coats, and dictionaries to support student learning.','university','Douala','https://stemuedu.com','infos@stemuedu.com','+237 671 17 75 52 / 698 05 44 17','Campus A: Adjacent Petrolex Ndobo, Bonaberi Douala. Campus B: Beside Omnisports Stadium Bepanda, Douala','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\", \"Ordinary Level Slip\", \"Advance Level Slip\", \"Birth Certificate\", \"4 Passport Size Photographs\"]','[\"Choose your program (Health, Business, Engineering, Education, or Vocational Training)\", \"Apply online or send WhatsApp message to 671 17 75 52\", \"Pay registration fee\", \"Submit required documents\", \"Receive admission letter and welcome pack\"]','[\"Ordinary Level Slip\", \"Advance Level Slip\", \"Birth Certificate\", \"4 Passport Size Photographs\", \"Registration fee receipt\", \"Application form\"]',35000.00,'XAF',NULL,NULL,'[\"Health & Biomedical Sciences: Nursing, Midwifery, Lab Tech, Physiotherapy, Dental Therapy, Pharmacy Tech\", \"Business & Management: Accounting, Banking & Finance, Project Management, Human Resource Management, Marketing & Trade, Logistics & Transport\", \"Vocational Training (1 Year): Nursing Assistant, Pharmacy Salesperson, Dental Prosthetics, Medical Office Assistant, Biology & Chemistry Lab Assistant, Office Secretary\", \"Education & Languages: Special Education, Educational Management, Curriculum & Didactics, Adult Education (Andragogy), German, English, IELTS, TOEFL, GRE\", \"Engineering: Computer Engineering, Electrical Engineering, Software Applications, Networking & Systems Management, Web Development\", \"Agriculture: Crop Production, Animal Health & Husbandry, Food Processing (Bakery & Pastry), Modern Farming Techniques, Agribusiness & Farm Management\", \"Professional Training Program (1 year): Various vocational and professional training programs\", \"TOP-UP BSc: Advanced degree programs for existing diploma holders\"]',NULL,0,1,140000.00,500000.00,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(36,'Maflekumen Higher Institute of Health Sciences Buea','Maflekumen Higher Institute of Health Sciences Buea, founded in 1996, is a specialized health sciences institution under the Ministry of Higher Education and the Ministry of Public Health. The institute offers international exchange programs, highly paid professions, and attractive tuition fees. Maflekumen focuses on providing quality education in health sciences with programs designed to prepare students for successful careers in the healthcare sector. The institution emphasizes practical training and professional development in various health disciplines.','institute','Buea','https://maflekumen.edu.cm','info@maflekumen.edu.cm','+237','Long street Tiko Bp 262, Buea, Cameroon','[\"GCE A-Level or equivalent\", \"Baccalauréat or equivalent\", \"English proficiency\", \"Application form\", \"Academic transcripts\", \"Medical certificate\"]','[\"Choose a program\", \"Press \\\"Apply now\\\" button\", \"Send an application form\", \"Complete admissions tasks\", \"Go to study\"]','[\"Online Application form\", \"Birth certificate\", \"Academic transcripts\", \"Medical certificate\", \"Application fee receipt\", \"Proof of fee payment\", \"Passport size photographs\", \"Motivation letter\"]',25000.00,'XAF',NULL,NULL,'[\"Biology: Bachelor of Biological - Full-time study mode, English instruction\", \"Biomedicine: Biomedical sciences programs with practical laboratory training\", \"Health: General health sciences programs focusing on community health\", \"Medicine: Medical sciences programs preparing students for healthcare careers\", \"Occupational Health: Occupational health and safety programs for workplace health management\"]',NULL,0,1,424980.00,424980.00,'2025-09-03 22:47:13','2025-09-03 22:47:13');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('uNoEAkfxHpZsCEq46YY9Q5Kgb6kpooFWJZ3fUMm6',3,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUThwZFhORnFUMk1FaG5VWXJWaGQzNjd1NHpWUmd0akgybFBOczlJQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==',1756943290);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('student','mentor','admin','partner') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_level` enum('advanced_level','hnd','degree','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interests` text COLLATE utf8mb4_unicode_ci,
  `expertise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_years` int DEFAULT NULL,
  `hourly_rate` decimal(8,2) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferences` json DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User',NULL,'test@example.com','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'$2y$12$WpVyAZDxhASY1ECLydpoDuzGfQGKbsbnnOmuEqbaPj3fccVKemmgC',NULL,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(2,'Admin User',NULL,'admin@example.com','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'$2y$12$OcsVGKzHZv2RQ4SA107Tc.VYSeMSCIFuFQDx72h45YcSBQyjXb/UC',NULL,'2025-09-03 22:47:13','2025-09-03 22:47:13'),(3,'Student User',NULL,'student@example.com','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'$2y$12$YksXablA9GgCUnDr2kIiI.Vr6ZOAWh/9qHGRlj/bMUiPZHn/zOyp.',NULL,'2025-09-03 22:47:13','2025-09-03 22:47:13');
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

-- Dump completed on 2025-09-04  0:48:52
