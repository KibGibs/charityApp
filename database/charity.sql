-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 02:56 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Activity 1', 0, '2015-03-30 19:39:21', '2015-03-30 19:39:21'),
(2, 'Activity 2', 0, '2015-03-30 19:39:25', '2015-03-30 19:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `activity_detail`
--

CREATE TABLE IF NOT EXISTS `activity_detail` (
`id` int(10) unsigned NOT NULL,
  `activity_id` int(10) unsigned DEFAULT NULL,
  `sub_activity_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_detail`
--

INSERT INTO `activity_detail` (`id`, `activity_id`, `sub_activity_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-03-30 19:40:36', '2015-03-30 19:40:36'),
(2, 1, 2, '2015-03-30 19:40:41', '2015-03-30 19:40:41'),
(3, 2, 1, '2015-03-30 19:40:48', '2015-03-30 19:40:48'),
(4, 2, 2, '2015-03-30 19:40:51', '2015-03-30 19:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE IF NOT EXISTS `barangay` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Barangay 1', 0, '2015-03-30 19:39:10', '2015-03-30 19:39:10'),
(2, 'Barangay 2', 0, '2015-03-30 19:39:14', '2015-03-30 19:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `donation_date` date NOT NULL,
  `donated_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `paypal_transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `donation_date`, `donated_amount`, `remarks`, `created_at`, `updated_at`, `status`, `paypal_transaction_id`) VALUES
(1, 1, '2015-03-31', '100', 'water', '2015-03-30 19:39:50', '2015-03-30 19:39:51', 1, NULL),
(2, 1, '2015-03-31', '200', 'water', '2015-03-30 19:39:56', '2015-03-30 19:39:58', 1, NULL),
(3, 2, '2015-03-31', '100', 'water', '2015-03-30 19:52:02', '2015-03-30 19:52:10', 1, NULL),
(4, 1, '2015-03-31', '0', '', '2015-03-31 15:42:58', '2015-03-31 15:42:58', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation_detail`
--

CREATE TABLE IF NOT EXISTS `donation_detail` (
`id` int(10) unsigned NOT NULL,
  `donation_id` int(10) unsigned DEFAULT NULL,
  `activity_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donation_detail`
--

INSERT INTO `donation_detail` (`id`, `donation_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-03-31 16:08:17', '2015-03-31 16:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_03_22_134432_create_users_table', 1),
('2015_03_22_135208_create_user_activity_log', 1),
('2015_03_22_141530_add_username_on_users', 1),
('2015_03_22_143025_add_remember_token', 1),
('2015_03_23_115141_add_email_to_user_table', 1),
('2015_03_23_122212_create_program_table', 1),
('2015_03_23_122413_create_program_detail_table', 1),
('2015_03_23_133203_create_barangay_table', 1),
('2015_03_24_123610_create_activity_table', 1),
('2015_03_24_123759_create_sub_activity_table', 1),
('2015_03_24_170406_create_posting_table', 1),
('2015_03_25_133453_create_activity_detail', 1),
('2015_03_29_033131_add_activity_detail', 1),
('2015_03_29_085340_create_donation_table', 1),
('2015_03_29_093526_create_donation_detail', 1),
('2015_03_30_040055_add_status_on_donation', 1),
('2015_03_30_043515_Add_paypal_transaction_id_on_donatons', 1),
('2015_03_30_170838_add_barangay_id_to_program_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE IF NOT EXISTS `posting` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `posting_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `posting_data` date NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Program 1', 0, '2015-03-30 19:38:24', '2015-03-30 19:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `program_detail`
--

CREATE TABLE IF NOT EXISTS `program_detail` (
`id` int(10) unsigned NOT NULL,
  `program_id` int(10) unsigned DEFAULT NULL,
  `cost` decimal(16,4) NOT NULL,
  `qty` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activity_detail_id` int(10) unsigned NOT NULL,
  `barangay_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_detail`
--

INSERT INTO `program_detail` (`id`, `program_id`, `cost`, `qty`, `start_date`, `end_date`, `created_at`, `updated_at`, `activity_detail_id`, `barangay_id`) VALUES
(1, 1, '100.0000', 1, '2015-02-27', '2015-03-31', '2015-03-30 19:41:06', '2015-03-30 19:41:06', 4, 1),
(2, 1, '100.0000', 1, '2015-03-31', '2015-03-31', '2015-03-30 19:41:10', '2015-03-30 19:41:10', 4, 2),
(3, 1, '1.0000', 1, '2015-04-01', '2015-04-01', '2015-03-31 16:01:05', '2015-03-31 16:01:05', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_activity`
--

CREATE TABLE IF NOT EXISTS `sub_activity` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_activity`
--

INSERT INTO `sub_activity` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Snacks', 0, '2015-03-30 19:39:33', '2015-03-30 19:39:33'),
(2, 'Something2x', 0, '2015-03-30 19:39:43', '2015-03-30 19:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_type` enum('staff','admin','donor') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `first_name`, `last_name`, `status`, `user_type`, `created_at`, `updated_at`, `username`, `remember_token`, `email`) VALUES
(1, '$2y$10$1j1NPh22lSNojA1VS8KO4OiV.fDYZcwZubQTjx7G.uBidjzb3b9bW', 'admin', 'admin', 0, 'admin', '2015-03-30 19:37:07', '2015-03-30 19:51:46', 'admin', 'jMyFPHEwUsiYKESiS9kR5WFxjDSj6AAzV9EBWmcOEFp5XO8EqowjQTnUlb6G', ''),
(2, '$2y$10$npQpSWTjPhDgW9Pd1swwtOVDIYfLUsJ.kwWpWW19rcesOWVMUdrcC', 'donor', 'donor', 0, 'donor', '2015-03-30 19:37:55', '2015-03-30 19:52:05', 'donor', 'w4PiScspC3p1p3M2pSB6QTLiL0qlKKnWbhUqgbdDf6Iguqw67fN45uJZaJev', 'donor@gmail.com'),
(3, '$2y$10$sdTjVDt8ADwvfyttv1.RUOgYSwkQFPEMJ5kby5QF3kFnLKTzIpfSK', 'staff', 'staff', 0, 'staff', '2015-03-30 19:38:07', '2015-03-30 19:38:07', 'staff', NULL, 'staff@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_log`
--

CREATE TABLE IF NOT EXISTS `user_activity_log` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `activity` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activity_log`
--

INSERT INTO `user_activity_log` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Added user username: donor', '2015-03-30 19:37:55', '2015-03-30 19:37:55'),
(2, 1, 'Added user username: staff', '2015-03-30 19:38:08', '2015-03-30 19:38:08'),
(3, 1, 'Added program name: Program 1', '2015-03-30 19:38:25', '2015-03-30 19:38:25'),
(4, 1, 'Added barangay name: Barangay 1', '2015-03-30 19:39:10', '2015-03-30 19:39:10'),
(5, 1, 'Added barangay name: Barangay 2', '2015-03-30 19:39:14', '2015-03-30 19:39:14'),
(6, 1, 'Added activity name: Activity 1', '2015-03-30 19:39:21', '2015-03-30 19:39:21'),
(7, 1, 'Added activity name: Activity 2', '2015-03-30 19:39:25', '2015-03-30 19:39:25'),
(8, 1, 'Added sub activity name: Snacks', '2015-03-30 19:39:33', '2015-03-30 19:39:33'),
(9, 1, 'Added sub activity name: Something2x', '2015-03-30 19:39:43', '2015-03-30 19:39:43'),
(10, 1, 'Added sub activity name: Snacks on activity name: Activity 1', '2015-03-30 19:40:36', '2015-03-30 19:40:36'),
(11, 1, 'Added sub activity name: Something2x on activity name: Activity 1', '2015-03-30 19:40:41', '2015-03-30 19:40:41'),
(12, 1, 'Added sub activity name: Snacks on activity name: Activity 2', '2015-03-30 19:40:48', '2015-03-30 19:40:48'),
(13, 1, 'Added sub activity name: Something2x on activity name: Activity 2', '2015-03-30 19:40:51', '2015-03-30 19:40:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_detail`
--
ALTER TABLE `activity_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `activity_detail_activity_id_foreign` (`activity_id`), ADD KEY `activity_detail_sub_activity_id_foreign` (`sub_activity_id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
 ADD PRIMARY KEY (`id`), ADD KEY `donations_user_id_foreign` (`user_id`);

--
-- Indexes for table `donation_detail`
--
ALTER TABLE `donation_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `donation_detail_donation_id_foreign` (`donation_id`), ADD KEY `donation_detail_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_detail`
--
ALTER TABLE `program_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `program_detail_program_id_foreign` (`program_id`), ADD KEY `program_detail_activity_detail_id_foreign` (`activity_detail_id`);

--
-- Indexes for table `sub_activity`
--
ALTER TABLE `sub_activity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
 ADD PRIMARY KEY (`id`), ADD KEY `user_activity_log_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `activity_detail`
--
ALTER TABLE `activity_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `donation_detail`
--
ALTER TABLE `donation_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program_detail`
--
ALTER TABLE `program_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_activity`
--
ALTER TABLE `sub_activity`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_detail`
--
ALTER TABLE `activity_detail`
ADD CONSTRAINT `activity_detail_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `activity_detail_sub_activity_id_foreign` FOREIGN KEY (`sub_activity_id`) REFERENCES `sub_activity` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donation_detail`
--
ALTER TABLE `donation_detail`
ADD CONSTRAINT `donation_detail_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `donation_detail_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_detail`
--
ALTER TABLE `program_detail`
ADD CONSTRAINT `program_detail_activity_detail_id_foreign` FOREIGN KEY (`activity_detail_id`) REFERENCES `activity_detail` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `program_detail_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
ADD CONSTRAINT `user_activity_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
