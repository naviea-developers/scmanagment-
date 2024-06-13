-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 06:12 AM
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
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `absents`
--

CREATE TABLE `absents` (
  `id` int(255) NOT NULL,
  `first` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT current_timestamp(),
  `business_id` bigint(20) NOT NULL DEFAULT 0,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `absents`
--

INSERT INTO `absents` (`id`, `first`, `other`, `update_time`, `business_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '200', '100', '2023-11-09 13:25:37', 0, 0, 0, '2023-12-22 18:11:49', '2023-12-22 18:11:49'),
(3, '4444', '44', '2023-12-22 18:11:53', 4, 4, 4, '2023-12-22 12:11:53', '2023-12-22 12:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monthID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `day` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `monthID`, `startDate`, `endDate`, `day`, `description`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(3, 8, '2021-07-02', '2021-07-02', 1, 'friday nots ss', '2021-07-10 12:22:14', '2024-06-10 12:48:40', 0, 0, 0),
(5, 8, '2021-07-23', '2021-07-23', 1, 'friday', '2021-07-10 12:25:42', '2024-06-10 12:48:25', 0, 0, 0),
(6, 2, '2021-07-30', '2021-07-30', 1, 'friday', '2021-07-10 12:26:06', '2021-07-10 12:26:06', 0, 0, 0),
(9, 8, '2023-12-05', '2023-12-04', 1, 'sss', '2023-12-02 11:03:17', '2024-06-10 12:43:47', 0, 0, 0),
(12, 8, '2023-12-03', '2024-01-09', 10, 'dzsdas', '2024-01-03 14:29:26', '2024-01-05 17:32:25', 4, 4, 4),
(13, 8, '2024-06-11', '2024-06-11', 1, 'teet', '2024-06-10 12:49:05', '2024-06-10 12:49:05', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absents`
--
ALTER TABLE `absents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absents`
--
ALTER TABLE `absents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
