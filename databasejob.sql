-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 07:16 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasejob`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, '634GhuoOqeU49ECqFRSjlrTONNn1M6XE', 1, '2018-03-21 03:53:17', '2018-03-21 03:53:17', '2018-03-21 03:53:17'),
(2, 2, 'RchmxsPdTqZe9IVPBVZt9bNzlqwyGKy0', 1, '2018-03-21 03:55:58', '2018-03-21 03:55:58', '2018-03-21 03:55:58'),
(3, 3, 'cMYwyXt2PEFX7EJOPhaHIiHkCDxhHnYH', 1, '2018-03-21 03:57:41', '2018-03-21 03:57:41', '2018-03-21 03:57:41'),
(4, 4, '2cjwqHvVJLQAlrxHoqtAiHYUDSRmq5bw', 1, '2018-03-21 04:06:07', '2018-03-21 04:06:07', '2018-03-21 04:06:07'),
(5, 5, 'zPMZIwTvhONuXfPAracOccc9lnpUG6JG', 1, '2018-03-21 04:27:11', '2018-03-21 04:27:11', '2018-03-21 04:27:11'),
(6, 6, 'PGfknKpslj98ks5pyjDFSffceUo6IA7l', 1, '2018-03-21 05:15:16', '2018-03-21 05:15:16', '2018-03-21 05:15:16'),
(7, 7, 'rJ8ShiZdC6WxMynmTrI2ijrTS3WZa0jJ', 1, '2018-03-21 05:15:17', '2018-03-21 05:15:17', '2018-03-21 05:15:17'),
(8, 8, 'gnUnoH3Y1r8FgBIBUqNhASPsaFnqIQE9', 1, '2018-03-21 05:18:23', '2018-03-21 05:18:23', '2018-03-21 05:18:23'),
(9, 9, 'zC5Gil7PhXCUL1o9fpVD21qN7Nuq2EMG', 1, '2018-03-21 05:18:24', '2018-03-21 05:18:23', '2018-03-21 05:18:24'),
(10, 10, 'yj9w5iZd3SuZKJqaweTGyR3KXaI062yx', 1, '2018-03-21 08:11:56', '2018-03-21 08:11:56', '2018-03-21 08:11:56'),
(11, 11, 'h7bfVKY3YHE9wwh1HMtXf1w4DLkl295X', 1, '2018-03-21 23:10:40', '2018-03-21 23:10:40', '2018-03-21 23:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `nama`, `detail`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
(2, '1701293011-OS-IndividualAssignment2.docx', 'C:\\xampp\\htdocs\\projectjob\\public\\docs\\1701293011-OS-IndividualAssignment2.docx', 'Rejected', 11, '2018-03-21 23:14:05', '2018-03-21 23:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_20_083151_tambahdatacv', 1),
(4, '2014_07_02_230147_migration_cartalyst_sentinel', 2),
(5, '2018_03_20_090558_tambahdatausers', 3),
(6, '2018_03_20_151316_tambahtangal', 4),
(7, '2018_03_20_152047_tambahtangalan', 5),
(8, '2018_03_21_134713_tambahalamat', 6);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 5, 'ZBQ6DYq2Xy9uYbo8nOITFBwaUflf0DcJ', 1, '2018-03-21 05:03:25', '2018-03-21 05:02:29', '2018-03-21 05:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'Admin', '{\"home\":true,\"cvuser\":true,\"ubahuser\":true,\"detailuser\":true}', '2018-03-21 05:18:23', '2018-03-21 05:18:23'),
(4, 'user', 'User', '{\"home\":true,\"cvuser\":true,\"detailuser\":true}', '2018-03-21 05:18:23', '2018-03-21 05:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(8, 3, '2018-03-21 05:18:23', '2018-03-21 05:18:23'),
(9, 4, '2018-03-21 05:18:24', '2018-03-21 05:18:24'),
(10, 4, '2018-03-21 08:11:56', '2018-03-21 08:11:56'),
(11, 4, '2018-03-21 23:10:40', '2018-03-21 23:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pendidikan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_telpon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`, `jenis_kelamin`, `Pendidikan`, `no_ktp`, `no_telpon`, `tanggal_lahir`, `alamat`) VALUES
(8, 'madmin@mail.com', '$2y$10$5wD8LWZPBPzC9aSl9juQF.hnmhA0Cj.ydyGWslbHgpoGNGbaceJdu', NULL, '2018-03-21 23:14:21', 'M', 'Admin', '2018-03-21 05:18:23', '2018-03-21 23:14:21', NULL, NULL, NULL, NULL, NULL, ''),
(10, 'mich@gmail.com', '$2y$10$olxCrsbuGzBWmF2Ig7h5SuAKX9YwcO08.TwmBnWAT3.O2XFcTEpu2', NULL, '2018-03-21 08:12:09', 'michael', 'jack', '2018-03-21 08:11:56', '2018-03-21 08:12:31', 'Laki-laki', 'S2', '12345678', '554121313', '1995-03-21', 'Bojong permai'),
(11, 'dg@gmail.com', '$2y$10$zxW7262SM/uE4iwyN9AaCel/PQwVjgKe2gWJwJkBTuowOVaq8QXgy', NULL, '2018-03-21 23:15:16', 'Drangan', 'Trakioiot', '2018-03-21 23:10:40', '2018-03-21 23:15:16', 'Laki-laki', 'S2', '124311313', '02155410455', '1995-03-22', 'Internet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
