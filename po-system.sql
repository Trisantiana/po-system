-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 08:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `po-system`
--

DELIMITER $$
--
-- Procedures
--

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jns_website`
--

CREATE TABLE `jns_website` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jns_website`
--

INSERT INTO `jns_website` (`id`, `jenis_website`) VALUES
(1, 'Web Sewa'),
(2, 'Web Portal dealermobil.info'),
(3, 'Web Portal infomobilbaru.id');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Admin'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `list_website`
--

CREATE TABLE `list_website` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `nama_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_aktif` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `periode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_website` int(10) UNSIGNED NOT NULL,
  `expired_at` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_website`
--

INSERT INTO `list_website` (`id`, `id_pelanggan`, `nama_website`, `url_website`, `merk`, `wilayah`, `tgl_aktif`, `tgl_selesai`, `periode`, `status`, `id_jenis_website`, `expired_at`, `created_at`, `updated_at`) VALUES
(2, 3, 'suzuki solo', 'suzukisolo.info', 'SUZUKI', 'SOLO', '2020-07-26', '2020-08-24', '1 bulan', 'sewa', 1, '3', '2020-07-27 13:46:23', '2020-08-19 10:37:55'),
(3, 1, 'dealer toyota malang', 'dealermobil.info/dealer-toyota-malang', 'toyota', 'malang', '2020-07-27', '2020-08-26', '1 bulan', 'sewa', 2, '5', '2020-07-28 01:16:16', '2020-08-05 23:44:03'),
(14, 3, 'wuling madiun', 'wulingmadiun.net', 'wuling', 'madiun', '2020-07-29', '2020-08-29', '1 bulan', 'sewa', 1, '8', '2020-07-29 12:54:33', '2020-08-05 23:44:03'),
(15, 3, 'mitsubishi solo', 'mitsubishisolo.id', 'mitsubishi', 'solo', '2020-07-29', '2020-08-29', '1 bulan', 'sewa', 1, '8', '2020-07-29 13:02:26', '2020-08-05 23:44:03'),
(16, 3, 'suzuki madiun', 'suzukimadiun.net', 'suzuki', 'madiun', '2020-07-28', '2020-08-29', '1 bulan', 'sewa', 1, '8', '2020-07-29 13:10:46', '2020-08-05 23:44:03'),
(17, 1, 'suzuki solo', 'suzukisolo.id', 'suzuki', 'solo', '2020-07-29', '2020-08-29', '1 bulan', 'sewa', 1, '8', '2020-07-29 13:11:31', '2020-08-05 23:44:03'),
(18, 1, 'daihatsu surabaya', 'daihatsusurabaya.net', 'daihatsu', 'surabaya', '2020-07-30', '2020-09-10', '2 bulan', 'sewa', 1, '89', '2020-07-30 06:41:30', '2020-08-05 23:44:03'),
(19, 3, 'suzukisolo', 'suzukisolo.net', 'suzuki', 'solo', '2020-07-30', '2020-09-30', '2 bulan', 'sewa', 1, '109', '2020-07-30 06:47:38', '2020-08-05 23:44:03'),
(20, 3, 'wuling solo', 'wulingsolo.com', 'wuling', 'solo', '2020-07-30', '2020-09-30', '2 bulan', 'sewa', 1, '109', '2020-07-30 07:02:10', '2020-08-19 10:41:39'),
(21, 3, 'suzuki medan', 'suzukimedan.id', 'suzuki', 'medan', '2020-08-03', '2020-08-24', '1 bulan', 'sewa', 1, '3', '2020-08-03 08:58:53', '2020-08-05 23:44:03');

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
(3, '2020_07_16_005857_create_jns_website_table', 1),
(4, '2020_07_16_042604_create_list_website_table', 1),
(5, '2020_07_27_200558_create_web_expired_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `bio`, `id_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$MCPRT72miCoIsQZKp02ECOKtCLsx7OBNj2QDa3MqZLmDMeF.zNJmm', 'admin 1', 1, NULL, NULL, '2020-07-27 13:43:58'),
(3, 'pelanggan1', 'pelanggan1@gmail.com', '123456', 'pelanggan', 3, NULL, '2020-07-28 07:51:07', '2020-07-28 07:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `web_expired`
--

CREATE TABLE `web_expired` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `id_website` int(10) UNSIGNED NOT NULL,
  `expired` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jns_website`
--
ALTER TABLE `jns_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_website`
--
ALTER TABLE `list_website`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_website_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `list_website_id_jenis_website_foreign` (`id_jenis_website`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- Indexes for table `web_expired`
--
ALTER TABLE `web_expired`
  ADD PRIMARY KEY (`id`),
  ADD KEY `web_expired_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `web_expired_id_website_foreign` (`id_website`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jns_website`
--
ALTER TABLE `jns_website`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_website`
--
ALTER TABLE `list_website`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_expired`
--
ALTER TABLE `web_expired`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_website`
--
ALTER TABLE `list_website`
  ADD CONSTRAINT `list_website_id_jenis_website_foreign` FOREIGN KEY (`id_jenis_website`) REFERENCES `jns_website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_website_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `web_expired`
--
ALTER TABLE `web_expired`
  ADD CONSTRAINT `web_expired_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `web_expired_id_website_foreign` FOREIGN KEY (`id_website`) REFERENCES `list_website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
