-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 04:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_names`
--

CREATE TABLE `company_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(20) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `pan_number` varchar(12) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(30) DEFAULT NULL,
  `ifsc_code` varchar(15) DEFAULT NULL,
  `gstin_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_names`
--

INSERT INTO `company_names` (`id`, `name`, `address`, `email`, `website`, `phone_number`, `pan_number`, `bank_name`, `account_number`, `ifsc_code`, `gstin_number`, `created_at`, `updated_at`) VALUES
(1, 'GoBolky', 'Sarvodiya basti near by texi stant, bikaner (raj.),334004', 'gobulky.com', 'www.gobulky.com', '+919694145570', 'GUIMP3021E', 'HDFC', '615452553077', 'HDFC0023', '08BFAPA5321J1ZV', NULL, '2023-10-12 05:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `gstbills`
--

CREATE TABLE `gstbills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clint_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_number` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `item_name` varchar(255) DEFAULT NULL,
  `item_amount` decimal(15,2) DEFAULT NULL,
  `cgst` decimal(15,2) DEFAULT NULL,
  `sgst` decimal(15,2) DEFAULT NULL,
  `igst` decimal(15,2) DEFAULT NULL,
  `cgst_pre` decimal(15,2) DEFAULT NULL,
  `sgst_pre` decimal(15,2) DEFAULT NULL,
  `igst_pre` decimal(15,2) DEFAULT NULL,
  `tax` decimal(15,2) DEFAULT NULL,
  `net_amount` decimal(15,2) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gstbills`
--

INSERT INTO `gstbills` (`id`, `clint_id`, `invoice_date`, `invoice_number`, `item_name`, `item_amount`, `cgst`, `sgst`, `igst`, `cgst_pre`, `sgst_pre`, `igst_pre`, `tax`, `net_amount`, `info`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-30', 1, 'tech web', 1500.00, 0.50, 0.50, 0.10, 7.50, 7.50, 1.50, 16.50, 1516.50, 'hey !!', '2023-10-09 05:40:35', NULL),
(2, 2, '2023-10-20', 2, 'tech web', 5240.00, 0.50, 0.50, 0.10, 26.20, 26.20, 5.24, 57.64, 5297.64, 'hey !!', '2023-10-11 00:41:48', NULL),
(3, 6, NULL, 3, 'test', 1222.00, 0.50, 2.00, 0.10, 6.11, 24.44, 1.22, 31.77, 1253.77, 'hey !!', '2023-10-13 08:52:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2023_10_06_142435_billing-software', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(15, '2023_09_05_102759_create_users_table', 2),
(16, '2023_09_05_103059_create_usertypes_table', 2),
(17, '2023_09_05_103109_create_gstbills_table', 2),
(18, '2023_09_14_101441_create_vendor_invoices_table', 2),
(19, '2023_10_09_074210_create_company_names_table', 2),
(20, '2014_10_12_100000_create_password_resets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('email@email.com', '$2y$10$VVIrO3MlCnvBRsIwoSCWouQKOu3WTHUjLhM2X5ttNl43gns5z2tR2', '2023-10-13 00:50:39'),
('mujahid@gmail.com', '$2y$10$N0LU8z6PgOHLlMn3RvsWjeH89MJRIvtdijdXd0Kkp0PiVjpABXTpO', '2023-10-13 00:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(30) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `phone_number`, `address`, `email`, `password`, `account_holder_name`, `account_number`, `bank_name`, `ifsc_code`, `zip_code`, `state`, `branch_address`, `created_at`, `updated_at`) VALUES
(1, 2, 'Shakeel Ahamed', '9856325896', 'sarvodiya basti', NULL, NULL, 'Shakeel Ahamed', '615782304812', 'Punjab national bank', 'PNB113033', '334004', 'Rajasthan', 'jay narayan vyash colony', '2023-10-09 05:39:14', '2023-10-09 05:39:31'),
(2, 3, 'Ahamed Khan', '1235204895', 'Mukta Parshad', NULL, NULL, 'Ahamed Khan', '615452553077', 'HDFC', 'HDFC0023', '334001', 'Goa', 'K.E.M. Road', '2023-10-11 00:39:33', NULL),
(3, NULL, 'mujahid', NULL, NULL, 'email@email.com', '$2y$10$zECXfaRs65lPgbTki/U1zuWPBpHpZOsD21lOgPxt43c4BLDuuMqye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-12 01:51:59', '2023-10-12 01:51:59'),
(6, 3, 'raam kumar', '9586202580', 'RammPura basti', NULL, NULL, 'Raam kumar', '615230148951', 'ICICI', 'ICICIN0032', '334021', 'Goa', 'Rampura basti 5 no gali', '2023-10-13 01:25:30', NULL),
(7, 4, 'Sumit banna', '9651203578', 'Mukta Parshad', NULL, NULL, 'Sumitt banna', '624015898798', 'State bank of india', 'SBIN32342', '452001', 'Bihar', 'lalghar station road bikaner', '2023-10-13 08:49:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Client', NULL, NULL),
(3, 'Vendor', NULL, NULL),
(4, 'Employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_invoices`
--

CREATE TABLE `vendor_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_number` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `account_holder_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(30) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `total_amount` double(30,2) DEFAULT NULL,
  `net_amount` double(30,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_invoices`
--

INSERT INTO `vendor_invoices` (`id`, `user_id`, `invoice_date`, `invoice_number`, `account_holder_name`, `account_number`, `bank_name`, `ifsc_code`, `branch_address`, `item_description`, `total_amount`, `net_amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08-23', 1, 'Shakeel Ahamed', '615782304812', 'Punjab national bank', 'PNB113033', 'jay narayan vyash colony', 'tech web', 4520.00, 4520.00, '2023-10-09 05:39:56', NULL),
(2, 2, '2023-10-04', 1, 'Ahamed Khan', '615452553077', 'HDFC', 'HDFC0023', 'K.E.M. Road', 'web tech', 5620.00, 5620.00, '2023-10-11 00:40:03', NULL),
(3, 6, '2023-10-03', 1, 'Raam kumar', '615230148951', 'ICICI', 'ICICIN0032', 'Rampura basti 5 no gali', 'testing', 1500.00, 1500.00, '2023-10-13 01:26:18', NULL),
(4, 7, '2023-10-19', 1, 'Sumitt banna', '624015898798', 'State bank of india', 'SBIN32342', 'lalghar station road bikaner', 'testing', 2323.00, 2323.00, '2023-10-13 08:50:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_names`
--
ALTER TABLE `company_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gstbills`
--
ALTER TABLE `gstbills`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_account_number_unique` (`account_number`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_invoices`
--
ALTER TABLE `vendor_invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_names`
--
ALTER TABLE `company_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gstbills`
--
ALTER TABLE `gstbills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_invoices`
--
ALTER TABLE `vendor_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
