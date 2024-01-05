-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 10:21 AM
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
-- Database: `mydms`
--

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `nodiv` bigint(20) UNSIGNED NOT NULL,
  `div_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`nodiv`, `div_name`, `description`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'General', 'FOR PUBLIC / GENERAL DOCUMENTs', 0, 1, 0, '2023-12-28 08:26:22', '2023-12-29 12:05:20', '2023-12-28 08:26:22'),
(2, 'IT', 'IT Division / Departement', 1, 0, 0, '2023-12-29 10:41:49', '2023-12-29 10:41:49', '0000-00-00 00:00:00'),
(3, 'Finance', 'Finance Division / Department', 1, 0, 0, '2023-12-28 14:40:18', '2023-12-28 14:40:18', '0000-00-00 00:00:00'),
(4, 'Sales', 'Sales Division / Department', 1, 0, 0, '2023-12-28 14:41:11', '2023-12-28 14:41:11', '0000-00-00 00:00:00'),
(5, 'Operation', 'Operation Division / Department', 1, 0, 0, '2023-12-28 14:41:28', '2023-12-28 14:41:28', '0000-00-00 00:00:00'),
(6, 'Document', 'Document Division / Department', 1, 0, 0, '2023-12-28 14:41:49', '2023-12-28 14:41:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `nodoc` bigint(20) UNSIGNED NOT NULL,
  `noyear` bigint(20) NOT NULL DEFAULT 0,
  `nodiv` bigint(20) NOT NULL DEFAULT 0,
  `nosubdiv` bigint(20) NOT NULL DEFAULT 0,
  `nodoctype` bigint(20) NOT NULL DEFAULT 0,
  `doc_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `xdoc1_name` varchar(255) NOT NULL,
  `xdoc1` varchar(128) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctype`
--

CREATE TABLE `doctype` (
  `nodoctype` bigint(20) NOT NULL,
  `doctype_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctype`
--

INSERT INTO `doctype` (`nodoctype`, `doctype_name`, `description`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rekening Koran', 'Description Rekening Koran', 0, 1, 0, '2023-12-29 08:47:23', '2023-12-29 14:57:26', '2023-12-29 08:47:23'),
(2, 'BKM', 'Bukti Kas Masuk', 1, 0, 0, '2023-12-29 15:02:43', '2023-12-29 15:02:43', '0000-00-00 00:00:00'),
(3, 'IT License', 'IT License - General', 1, 0, 0, '2024-01-03 09:09:50', '2024-01-03 09:09:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-11-28-055030', 'App\\Database\\Migrations\\Roles', 'default', 'App', 1702452202, 1),
(2, '2023-11-28-060137', 'App\\Database\\Migrations\\Users', 'default', 'App', 1702452202, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `sub_division`
--

CREATE TABLE `sub_division` (
  `nosubdiv` bigint(20) NOT NULL,
  `nodiv` bigint(20) NOT NULL DEFAULT 0,
  `subdiv_name` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_division`
--

INSERT INTO `sub_division` (`nosubdiv`, `nodiv`, `subdiv_name`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'License Windows - Surabaya Branch 2023', 0, 1, 0, '2023-12-29 05:37:07', '2023-12-29 12:21:33', '2023-12-29 05:37:07'),
(2, 3, 'SPT PPH Badan. Periode 2023', 1, 1, 0, '2023-12-29 12:23:41', '2023-12-29 12:24:24', '0000-00-00 00:00:00'),
(3, 3, 'SPT PPN. Periode 2023', 1, 1, 0, '2023-12-29 12:23:54', '2023-12-29 12:24:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'user.png',
  `role_id` int(11) UNSIGNED NOT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL,
  `cid` int(11) UNSIGNED DEFAULT NULL,
  `uid` int(11) UNSIGNED DEFAULT NULL,
  `did` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `last_login`, `is_active`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '$2y$10$l8CpUeQwE3v2wpLMKzh.s.vncx/J3jeN8b0GBLtFHqzv372.EwTSy', '7db7400e0245a5cb0281aeb0e4a97ef353e00d70.png', 1, '2023-12-13 14:27:50', 1, NULL, 1, NULL, NULL, '2023-12-15 10:13:54', NULL),
(2, 'Robby Budiawan', 'Budiawan', 'robby.budiawan@sub.pilship.com', '$2y$10$.ymcTvYcovk189dHaceKb.jE6qCSEPznB67Oci4SaKbrmgZbYs3wi', 'c80eb094a38ac9b3d8165e03ce74d23ba02bb776.png', 2, '2023-12-13 14:41:06', 1, NULL, 1, NULL, '2023-12-13 14:41:06', '2023-12-28 10:44:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `noyear` bigint(20) NOT NULL,
  `year_name` varchar(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`noyear`, `year_name`, `description`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022', 'Year of 2022', 1, 0, 0, '2024-01-03 11:50:52', '2024-01-03 11:50:52', '0000-00-00 00:00:00'),
(2, '2023', 'Year of 2023', 1, 0, 0, '2024-01-03 11:49:46', '2024-01-03 11:49:46', '0000-00-00 00:00:00'),
(3, '2024', 'Year of 2024', 1, 0, 0, '2024-01-03 11:49:30', '2024-01-03 11:49:30', '0000-00-00 00:00:00');



--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`nodiv`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`nodoc`);

--
-- Indexes for table `doctype`
--
ALTER TABLE `doctype`
  ADD PRIMARY KEY (`nodoctype`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_division`
--
ALTER TABLE `sub_division`
  ADD PRIMARY KEY (`nosubdiv`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`noyear`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `nodiv` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `nodoc` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `doctype`
--
ALTER TABLE `doctype`
  MODIFY `nodoctype` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_division`
--
ALTER TABLE `sub_division`
  MODIFY `nosubdiv` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `noyear` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
