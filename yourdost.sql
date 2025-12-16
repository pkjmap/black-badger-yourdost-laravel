-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table yourdost.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.cache: ~0 rows (approximately)
DELETE FROM `cache`;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1765855967),
	('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1765855967;', 1765855967);

-- Dumping structure for table yourdost.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table yourdost.contact_requests
DROP TABLE IF EXISTS `contact_requests`;
CREATE TABLE IF NOT EXISTS `contact_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `inquiry_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_message` text COLLATE utf8mb4_unicode_ci,
  `heard_from` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.contact_requests: ~0 rows (approximately)
DELETE FROM `contact_requests`;
INSERT INTO `contact_requests` (`id`, `inquiry_type`, `first_name`, `last_name`, `phone_number`, `email`, `organization`, `role`, `help_message`, `heard_from`, `created_at`, `updated_at`) VALUES
	(1, 'partner', 'aaa', 'aa', 'aaaa', 'aa@ww.com', 'aa', 'aa', 'aaa', '["word_of_mouth", "conference", "linkedin"]', '2025-12-16 02:16:31', '2025-12-16 02:16:31'),
	(2, 'partner', 'aaa', 'aa', 'aaaa', 'aa@ww.com', 'aa', 'aa', 'aaa', '["word_of_mouth", "conference", "linkedin"]', '2025-12-16 02:17:05', '2025-12-16 02:17:05'),
	(3, 'other', 'aa', 'aa', 'aaaa', 'aa@ww.com', 'aa', 'aa', 'zdf dsf', '["social_ad"]', '2025-12-16 02:42:01', '2025-12-16 02:42:01');

-- Dumping structure for table yourdost.experts
DROP TABLE IF EXISTS `experts`;
CREATE TABLE IF NOT EXISTS `experts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  `rating` decimal(2,1) NOT NULL DEFAULT '0.0',
  `conversations` int unsigned NOT NULL DEFAULT '0',
  `next_available_date` date DEFAULT NULL,
  `chat_schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.experts: ~1 rows (approximately)
DELETE FROM `experts`;
INSERT INTO `experts` (`id`, `name`, `role`, `profile_image`, `is_online`, `rating`, `conversations`, `next_available_date`, `chat_schedule`, `created_at`, `updated_at`) VALUES
	(1, 'Sheena', 'Phsycartrist', NULL, 0, 2.5, 1023, '2025-12-16', '2025-12-16 05:50:10', '2025-12-16 09:45:34', '2025-12-16 09:45:35');

-- Dumping structure for table yourdost.expert_leaves
DROP TABLE IF EXISTS `expert_leaves`;
CREATE TABLE IF NOT EXISTS `expert_leaves` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `expert_id` bigint unsigned NOT NULL,
  `leave_start` datetime NOT NULL,
  `leave_end` datetime NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expert_leaves_expert_id_foreign` (`expert_id`),
  CONSTRAINT `expert_leaves_expert_id_foreign` FOREIGN KEY (`expert_id`) REFERENCES `experts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.expert_leaves: ~1 rows (approximately)
DELETE FROM `expert_leaves`;
INSERT INTO `expert_leaves` (`id`, `expert_id`, `leave_start`, `leave_end`, `reason`, `created_at`, `updated_at`) VALUES
	(1, 1, '2025-12-16 17:14:10', '2025-12-16 17:14:12', 'Meeiting', '2025-12-16 11:44:22', '2025-12-16 11:44:23');

-- Dumping structure for table yourdost.expert_schedules
DROP TABLE IF EXISTS `expert_schedules`;
CREATE TABLE IF NOT EXISTS `expert_schedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `expert_id` bigint unsigned NOT NULL,
  `day` enum('mon','tue','wed','thu','fri','sat','sun') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `expert_schedules_expert_id_day_unique` (`expert_id`,`day`),
  CONSTRAINT `expert_schedules_expert_id_foreign` FOREIGN KEY (`expert_id`) REFERENCES `experts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.expert_schedules: ~5 rows (approximately)
DELETE FROM `expert_schedules`;
INSERT INTO `expert_schedules` (`id`, `expert_id`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
	(1, 1, 'mon', '17:11:09', '17:11:11', '2025-12-16 11:41:15', '2025-12-16 11:41:16'),
	(2, 1, 'tue', '17:11:32', '17:11:35', '2025-12-16 11:41:36', '2025-12-16 11:41:37'),
	(3, 1, 'wed', '17:11:47', '17:11:48', '2025-12-16 11:41:49', '2025-12-16 11:41:50'),
	(4, 1, 'thu', '17:12:02', '17:12:03', '2025-12-16 11:42:04', '2025-12-16 11:42:04'),
	(5, 1, 'fri', '17:12:16', '17:12:17', '2025-12-16 11:42:18', '2025-12-16 11:42:19');

-- Dumping structure for table yourdost.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table yourdost.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table yourdost.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
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

-- Dumping data for table yourdost.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table yourdost.job_batches
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
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

-- Dumping data for table yourdost.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table yourdost.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.migrations: ~1 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_12_16_070756_create_contact_requests_table', 2),
	(5, '2025_12_16_092712_create_experts_table', 3),
	(6, '2025_12_16_093225_create_expert_schedules_table', 3),
	(7, '2025_12_16_093328_create_expert_leaves_table', 3);

-- Dumping structure for table yourdost.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table yourdost.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
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

-- Dumping data for table yourdost.sessions: ~0 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('6udpDbRR8LyY3PbJbdm6ligFjXM5pjgnK4i6VgVC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaTVDeFVtUXJhWjVnMmlhakZnTW9TNHh5c3JhRHRYa0RHOW5VOWc5QyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWxrLWl0LW91dCI7czo1OiJyb3V0ZSI7czoxMToidGFsay5pdC5vdXQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1765885510);

-- Dumping structure for table yourdost.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agree_terms` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table yourdost.users: ~0 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `agree_terms`) VALUES
	(1, 'Black Badger', 'admin', 'admin@admin.com', NULL, '$2y$12$rChqH2gS5WTJzJdO6mejAuRwoNh8ylUgA3sGYdoJVPzWLJ.lZoiA2', '7PdEd3B9W4MSk49zCjRnCFk9U6bsAknlV9lwDdHJTDgKE1HCK9koliMmdDfa', '2025-12-15 21:56:42', '2025-12-15 21:56:42', NULL),
	(2, NULL, 'pkj', 'pkj@lal.com', NULL, '$2y$12$y09HM4hV2oU3FzhejWjXGehsRhgi57cmbHnw2gdLUqvnoAerbBElK', NULL, '2025-12-15 23:34:28', '2025-12-15 23:34:28', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
