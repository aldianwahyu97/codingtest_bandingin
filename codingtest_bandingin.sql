-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table codingtest_bandingin.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codingtest_bandingin.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table codingtest_bandingin.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codingtest_bandingin.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table codingtest_bandingin.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codingtest_bandingin.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table codingtest_bandingin.tb_book
CREATE TABLE IF NOT EXISTS `tb_book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL DEFAULT '0',
  `id_lib` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table codingtest_bandingin.tb_book: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_book` DISABLE KEYS */;
INSERT INTO `tb_book` (`id_book`, `book_name`, `id_lib`) VALUES
	(2, 'Book C', '2'),
	(13, 'New Book Edit', '4'),
	(14, 'Book 1234', '4'),
	(19, 'Test Book', '2'),
	(22, 'Book C', '1'),
	(24, 'Test Book', '1'),
	(26, 'Book G', '3'),
	(27, 'Test Book', '3'),
	(28, 'Book G', '3'),
	(30, 'Lates Book 2', '7'),
	(31, 'Lates Book 3', '7'),
	(32, 'Lates Book 4', '7'),
	(33, 'Lates Book 5', '7'),
	(34, 'Lates Book 6', '7'),
	(35, 'Lates Book 7', '7');
/*!40000 ALTER TABLE `tb_book` ENABLE KEYS */;

-- Dumping structure for table codingtest_bandingin.tb_library
CREATE TABLE IF NOT EXISTS `tb_library` (
  `id_lib` int(11) NOT NULL AUTO_INCREMENT,
  `library_name` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_lib`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table codingtest_bandingin.tb_library: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_library` DISABLE KEYS */;
INSERT INTO `tb_library` (`id_lib`, `library_name`) VALUES
	(1, 'Library 123'),
	(2, 'Library EFG'),
	(3, 'Library HIJ'),
	(4, 'Library G'),
	(5, 'New Library'),
	(6, 'New Library 2 II'),
	(7, 'Latest Library');
/*!40000 ALTER TABLE `tb_library` ENABLE KEYS */;

-- Dumping structure for table codingtest_bandingin.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table codingtest_bandingin.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Aldian Wahyu Septiadi', 'aldianwahyu78@gmail.com', NULL, '$2y$10$HsQ1LmDI2xc9b3EwYQXBBundQTWwWv4qt8eblelkAZad4LMp2HxYm', 'djMvdnBxsGBVwXNxAK0BUa8cspOqDJFqyq6KW1FYaSOAJebBGMbOOOUFFcKB', '2020-07-23 12:16:37', '2020-07-23 12:16:37'),
	(2, 'Andhika Wahyu', 'andhikawahyu@gmail.com', NULL, '$2y$10$Q1qg2y.Hu.ExuCe9EoJlHOBvVU3J4bK4j/2EAd7BUsYgFY0SA/A8m', NULL, '2020-07-23 13:50:51', '2020-07-23 13:50:51'),
	(4, 'Afrina Rifckiyah', 'afrina@gmail.co.id', NULL, '$2y$10$Y2O/ye/FkfQt/5iI4wo7euVby2yU3AIjq6Hx.LZuBE8mVW7I5Jc56', NULL, '2020-07-24 00:46:22', '2020-07-24 00:46:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
