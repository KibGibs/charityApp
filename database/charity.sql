-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2015 at 03:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `charity_app`
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
(1, 'Fingerling Dispersal', 0, '2015-03-30 09:35:12', '2015-03-30 09:35:12'),
(2, 'Information Education Campaign', 0, '2015-03-30 15:46:59', '2015-03-30 15:46:59');

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
(1, 1, 1, '2015-03-30 09:35:46', '2015-03-30 09:35:46'),
(2, 1, 2, '2015-03-30 09:35:48', '2015-03-30 09:35:48'),
(3, 2, 3, '2015-03-30 15:47:48', '2015-03-30 15:47:48'),
(4, 2, 4, '2015-03-30 15:47:51', '2015-03-30 15:47:51');

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
(1, 'Barangay 1', 0, '2015-03-30 09:36:18', '2015-03-30 09:36:18'),
(2, 'Barangay 2', 0, '2015-03-30 09:36:22', '2015-03-30 09:36:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `donation_date`, `donated_amount`, `remarks`, `created_at`, `updated_at`, `status`, `paypal_transaction_id`) VALUES
(3, 1, '2015-03-30', '100', 'wat', '2015-03-30 09:53:36', '2015-03-30 09:55:53', 1, NULL),
(4, 1, '2015-03-30', '100', 'water', '2015-03-30 09:54:03', '2015-03-30 09:55:55', 1, NULL),
(5, 2, '2015-03-30', '100', 'wat\r\n', '2015-03-30 10:14:45', '2015-03-30 10:15:02', 1, NULL),
(6, 2, '2015-03-30', '100', 'same\r\n', '2015-03-30 10:14:52', '2015-03-30 10:15:03', 1, NULL),
(7, 3, '2015-03-30', '200', 'water\r\n', '2015-03-30 10:22:23', '2015-03-30 10:22:38', 1, NULL),
(8, 3, '2015-03-30', '500', '123123', '2015-03-30 10:22:56', '2015-03-30 10:22:57', 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donation_detail`
--

INSERT INTO `donation_detail` (`id`, `donation_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(4, 3, 1, '2015-03-30 16:44:31', '2015-03-30 16:44:31'),
(5, 3, 2, '2015-03-30 16:44:33', '2015-03-30 16:44:33'),
(6, 4, 2, '2015-03-30 16:52:17', '2015-03-30 16:52:17'),
(7, 4, 1, '2015-03-30 16:52:23', '2015-03-30 16:52:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `user_id`, `posting_title`, `posting_data`, `post`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'water', '0000-00-00', 'water', 1, '2015-03-30 09:36:03', '2015-03-30 09:36:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aquaculture', 0, '2015-03-30 09:35:00', '2015-03-30 09:35:00'),
(2, 'Community Development ', 0, '2015-03-30 15:46:49', '2015-03-30 15:46:49');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_detail`
--

INSERT INTO `program_detail` (`id`, `program_id`, `cost`, `qty`, `start_date`, `end_date`, `created_at`, `updated_at`, `activity_detail_id`, `barangay_id`) VALUES
(1, 1, '100.0000', 15, '2015-03-31', '2015-03-31', '2015-03-30 09:37:18', '2015-03-30 09:37:18', 1, 1),
(2, 1, '100.0000', 12, '2015-03-31', '2015-03-31', '2015-03-30 15:46:02', '2015-03-30 15:46:02', 2, 1),
(3, 2, '100.0000', 10, '2015-03-31', '2015-03-31', '2015-03-30 15:48:29', '2015-03-30 15:48:29', 3, 1),
(4, 2, '100.0000', 12, '2015-03-31', '2015-03-31', '2015-03-30 15:48:43', '2015-03-30 15:48:43', 4, 2),
(5, 2, '100.0000', 12, '2015-03-31', '2015-03-31', '2015-03-30 15:49:17', '2015-03-30 15:49:17', 4, 1),
(6, 1, '300.0000', 19, '2015-03-31', '2015-03-31', '2015-03-30 16:18:38', '2015-03-30 16:18:38', 1, 2),
(7, 1, '100.0000', 20, '2015-03-31', '2015-03-31', '2015-03-30 16:35:07', '2015-03-30 16:35:07', 3, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_activity`
--

INSERT INTO `sub_activity` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fisherman orientation ', 0, '2015-03-30 09:35:32', '2015-03-30 09:35:32'),
(2, 'Snacks', 0, '2015-03-30 09:35:40', '2015-03-30 09:35:55'),
(3, 'Education Blah Blah', 0, '2015-03-30 15:47:30', '2015-03-30 15:47:30'),
(4, 'Something2x', 0, '2015-03-30 15:47:42', '2015-03-30 15:47:42');

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
(1, '$2y$10$1WWVGEnPcMuByRDk8vseOOuagMVFTb4sZz0y5ss1TQ1HABdfZ8JgG', 'admin', 'admin', 0, 'admin', '2015-03-30 09:33:57', '2015-03-30 10:22:44', 'admin', 'leptMbX4qgeI6tlyZzyc61R8Bva2vJltch032o5aNrP6yddXt4g4kGYc4aat', ''),
(2, '$2y$10$g5mfRBPwSOtqgSmMVgKSs.u771mPU1LUWpUIRu5t6//vDS8AbZ.G2', 'donor', 'donor', 0, 'donor', '2015-03-30 09:34:34', '2015-03-30 10:14:55', 'donor', 'ftmmGkHFHVuTeS8ANjat5jekd0laj5AGoIax3OhwYlDHZPR9OTgjPXPVmR59', 'donor1@gmail.com'),
(3, '$2y$10$ad2Ly1rHvclmcKfYjZTv/Oli4OwSBKWPIaM6Lr/FB1pCjB54.A2Ry', 'staff', 'staff', 0, 'staff', '2015-03-30 09:34:45', '2015-03-30 10:22:59', 'staff', 'oPX00oNp21m7ck0rNR8JFg9dS6b8YGz8B2S084q1aGZdnIVA9UK79FSGDuHS', 'staff@email.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activity_log`
--

INSERT INTO `user_activity_log` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Added user username: donor', '2015-03-30 09:34:34', '2015-03-30 09:34:34'),
(2, 1, 'Added user username: staff', '2015-03-30 09:34:45', '2015-03-30 09:34:45'),
(3, 1, 'Added program name: Aquaculture', '2015-03-30 09:35:00', '2015-03-30 09:35:00'),
(4, 1, 'Added activity name: Fingerling Dispersal', '2015-03-30 09:35:12', '2015-03-30 09:35:12'),
(5, 1, 'Added sub activity name: Fisherman orientation ', '2015-03-30 09:35:32', '2015-03-30 09:35:32'),
(6, 1, 'Added sub activity name: SnacksS', '2015-03-30 09:35:40', '2015-03-30 09:35:40'),
(7, 1, 'Added sub activity name: Fisherman orientation  on activity name: Fingerling Dispersal', '2015-03-30 09:35:46', '2015-03-30 09:35:46'),
(8, 1, 'Added sub activity name: SnacksS on activity name: Fingerling Dispersal', '2015-03-30 09:35:48', '2015-03-30 09:35:48'),
(9, 1, 'Edited sub activity name: Snacks', '2015-03-30 09:35:55', '2015-03-30 09:35:55'),
(10, 1, 'Added post title: water', '2015-03-30 09:36:03', '2015-03-30 09:36:03'),
(11, 1, 'Added barangay name: Barangay 1', '2015-03-30 09:36:18', '2015-03-30 09:36:18'),
(12, 1, 'Added barangay name: Barangay 2', '2015-03-30 09:36:22', '2015-03-30 09:36:22'),
(13, 1, 'Added program name: Community Development ', '2015-03-30 15:46:49', '2015-03-30 15:46:49'),
(14, 1, 'Added activity name: Information Education Campaign', '2015-03-30 15:46:59', '2015-03-30 15:46:59'),
(15, 1, 'Added sub activity name: Education Blah Blah', '2015-03-30 15:47:30', '2015-03-30 15:47:30'),
(16, 1, 'Added sub activity name: Something2x', '2015-03-30 15:47:42', '2015-03-30 15:47:42'),
(17, 1, 'Added sub activity name: Education Blah Blah on activity name: Information Education Campaign', '2015-03-30 15:47:48', '2015-03-30 15:47:48'),
(18, 1, 'Added sub activity name: Something2x on activity name: Information Education Campaign', '2015-03-30 15:47:51', '2015-03-30 15:47:51');

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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `donation_detail`
--
ALTER TABLE `donation_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program_detail`
--
ALTER TABLE `program_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sub_activity`
--
ALTER TABLE `sub_activity`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
