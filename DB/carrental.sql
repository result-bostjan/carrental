-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2025 at 07:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_car_id_foreign` (`car_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_price`, `created_at`, `updated_at`) VALUES
(10, 2, 5, '2025-09-24', '2025-09-25', '110.00', '2025-09-10 12:18:29', '2025-09-10 12:18:29'),
(9, 2, 1, '2025-09-17', '2025-09-30', '700.00', '2025-09-10 12:17:40', '2025-09-10 12:17:40'),
(3, 2, 2, '2025-09-11', '2025-09-12', '150.00', '2025-09-09 18:30:43', '2025-09-09 18:30:43'),
(4, 2, 2, '2025-09-10', '2025-09-13', '90.00', '2025-09-09 18:35:13', '2025-09-09 18:35:13'),
(5, 2, 4, '2025-09-10', '2025-09-16', '350.00', '2025-09-09 18:37:38', '2025-09-09 18:37:38'),
(6, 3, 1, '2025-09-17', '2025-09-19', '150.00', '2025-09-10 08:10:58', '2025-09-10 08:10:58'),
(7, 3, 4, '2025-09-17', '2025-09-26', '700.00', '2025-09-10 08:22:52', '2025-09-10 08:22:52'),
(8, 2, 9, '2025-09-11', '2025-09-17', '210.00', '2025-09-10 11:17:36', '2025-09-10 11:17:36'),
(11, 2, 9, '2025-09-11', '2025-09-24', '420.00', '2025-09-10 18:34:28', '2025-09-10 18:34:28'),
(14, 2, 5, '2025-09-11', '2025-09-12', '110.00', '2025-09-10 18:37:17', '2025-09-10 18:37:17'),
(13, 2, 9, '2025-09-12', '2025-09-12', '30.00', '2025-09-10 18:35:50', '2025-09-10 18:35:50'),
(18, 2, 4, '2025-09-10', '2025-09-11', '140.00', '2025-09-10 19:15:48', '2025-09-10 19:15:48'),
(17, 2, 4, '2025-09-24', '2025-09-30', '490.00', '2025-09-10 18:46:20', '2025-09-10 18:46:20'),
(19, 2, 5, '2025-09-18', '2025-09-24', '385.00', '2025-09-10 19:17:36', '2025-09-10 19:17:36'),
(20, 3, 4, '2025-09-25', '2025-09-30', '420.00', '2025-09-10 19:22:00', '2025-09-10 19:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `daily_price` decimal(8,2) DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `year`, `daily_price`, `available`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 'Corolla', 2020, '60.00', 1, '2025-09-09 17:54:54', '2025-09-10 19:06:23'),
(2, 'Honda', 'Civic', 2019, '45.00', 1, '2025-09-09 17:54:54', '2025-09-09 17:54:54'),
(3, 'BMW', '3 Series', 2021, '80.00', 1, '2025-09-09 17:54:54', '2025-09-09 17:54:54'),
(4, 'Audi', 'A4', 2018, '70.00', 1, '2025-09-09 17:54:54', '2025-09-09 17:54:54'),
(5, 'Ford', 'Focus', 2022, '55.00', 1, '2025-09-09 17:54:54', '2025-09-09 17:54:54'),
(8, 'Renault', 'Scenic III', 2024, '45.00', 0, '2025-09-10 11:16:30', '2025-09-10 11:51:53'),
(9, 'Škoda', 'Fabia Combi', 2023, '30.00', 1, '2025-09-10 11:16:58', '2025-09-10 11:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_09_105355_add_role_to_users_table', 1),
(5, '2025_09_09_111404_create_cars_table', 1),
(6, '2025_09_09_111447_create_bookings_table', 1),
(7, '2025_09_10_115048_add_is_admin_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('F4W2drx7hUDCMGvXFn9nNZe1hTjBMPJkGMZCIsoI', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjRYZEJrSGdCNXZPR0ttaVpvcXZ5MnEwaEdKSk1ZQ2hwSmtqM3pVQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4MC9ib29raW5ncyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1757539320),
('9T59Z0doMAApGJy5LkjbgSVql5SJpng8hebKJ43c', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRGJXeDVIdDBCbGtWcDB5Qzh2anUwcHFPZzN1czlLME1hZVFaMHh2biI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1757576068);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `is_admin`) VALUES
(1, 'Test User', 'test@example.com', '2025-09-09 17:54:54', '$2y$12$zPbtKquVGPFZqpWBAZG4.uygkfYeUMhB3hRXPt7m/1t29YBTo2Mz.', 'BbuKLspUA9', '2025-09-09 17:54:54', '2025-09-09 17:54:54', 'user', 0),
(2, 'Admin', 'admin@example.com', NULL, '$2y$12$zGHPsR9LlkKmS6zIzT.HT.FfqbIWwiXTqq5jhkQo3MFI41yU.uycy', 'Tq10Lm9rWf6BnYySgs017XGGZs3GwFffW5bUmE2UlfoYOMznJ4Ns5Zh8qsmC', '2025-09-09 18:10:42', '2025-09-09 18:10:42', 'admin', 1),
(3, 'Bostjan', 'bosty33@gmail.com', NULL, '$2y$12$RCYImUxOdK7EQCw5gHTY6.Y/LC3kXEzc2O7WL3/WLqnJS75XFjFge', NULL, '2025-09-10 08:06:18', '2025-09-10 08:06:18', 'user', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
