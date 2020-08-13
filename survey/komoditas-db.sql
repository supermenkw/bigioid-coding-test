-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 09:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komoditas-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_categories`
--

CREATE TABLE `cat_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cat_categories`
--

INSERT INTO `cat_categories` (`id`, `name`, `photo`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Agriculture', 'assets/category/GgZGXG84Utj9fCM9gIdAC7fhS5KOM34AzcWvBp9R.svg', 'agriculture', NULL, '2020-08-12 21:29:46', '2020-08-12 21:39:52'),
(2, 'Energy', 'assets/category/iS7wtnXtHqJBrtc0gR62VMWwdwmLl3qqW8DyFj0r.svg', 'energy', NULL, '2020-08-12 21:40:18', '2020-08-12 21:40:18'),
(3, 'Precious Metals', 'assets/category/Ey7JdKvBufw5nYufWHFRTwgQbJzswud9XRPLNwDg.svg', 'precious-metals', NULL, '2020-08-12 21:40:50', '2020-08-12 21:40:50'),
(4, 'Industrial Metals', 'assets/category/YqHZE9kH5ue3mkB1OjBC24vNVkj1PGtjHsAOMwiV.svg', 'industrial-metals', NULL, '2020-08-12 21:41:13', '2020-08-12 21:41:13'),
(5, 'Farm', 'assets/category/qiACggpZFa5fg8vYxlgJUmFXch3iQVgMzC8L7jqu.svg', 'farm', NULL, '2020-08-12 21:42:31', '2020-08-12 21:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `com_commodities`
--

CREATE TABLE `com_commodities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNAPPROVED',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `units` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `com_commodities`
--

INSERT INTO `com_commodities` (`id`, `name`, `users_id`, `categories_id`, `price`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`, `approved_by`, `units`) VALUES
(1, 'Gold', 1, 3, 28794974, 'APPROVED', 'gold', NULL, '2020-08-12 22:12:16', '2020-08-12 23:25:30', NULL, 'Gol D. Roger'),
(2, 'Copper', 3, 1, 94974070, 'UNAPPROVED', 'copper', NULL, '2020-08-12 22:14:25', '2020-08-12 23:34:32', NULL, 'Copper');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_09_041800_create_cat_categories_table', 1),
(5, '2020_08_09_042115_create_com_commodity_table', 1),
(7, '2020_08_09_071334_add_approved_by_to_com_commodities_table', 2),
(8, '2020_08_11_024122_add_units_to_com_commodities_table', 3),
(9, '2020_08_11_110658_add_photo_to_usr_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usr_users`
--

CREATE TABLE `usr_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SURVEYOR',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usr_users`
--

INSERT INTO `usr_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'admin-chan', 'saya@admin.com', NULL, '$2y$10$JXCOq5yrEX21xk3IK3A1gOC3XBsLQxH6YcDcKGS/n2.1oF6rrgBsW', 'ADMIN', NULL, NULL, '2020-08-09 06:42:06', '2020-08-12 22:31:13', 'assets/account/MAKX625q1rwFIFNEwkndbgfVLUDkV6TsQ9vNSzzZ.jpeg'),
(2, 'surveyor', 'saya@surveyor.com', NULL, '$2y$10$SqMxQrq.5mXpigLsZagj5epejbx8ejMWbqNkmWfIU8cbsGzuJTa0G', 'SURVEYOR', NULL, NULL, '2020-08-09 06:43:47', '2020-08-12 21:59:37', 'assets/account/dS1OcGpLvwsUgoNXhrBkX5MJ3x3wlvNA6vylTr3S.jpeg'),
(3, 'Acong hihi', 'saya@surveyorketiga.com', NULL, '$2y$10$0y0FZYgLa1v/UPsB/4s2k.dfjMryQ/QukpvqftBIImSsW.VnXZFZS', 'SURVEYOR', NULL, NULL, '2020-08-09 11:53:48', '2020-08-12 22:15:58', 'assets/account/mbx26VlLTycRCPx23ULWyqfEOyJqSTTmtVP4Zaw4.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_categories`
--
ALTER TABLE `cat_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `com_commodities`
--
ALTER TABLE `com_commodities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `usr_users`
--
ALTER TABLE `usr_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usr_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_categories`
--
ALTER TABLE `cat_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `com_commodities`
--
ALTER TABLE `com_commodities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usr_users`
--
ALTER TABLE `usr_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
