-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 12:25 PM
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
-- Table structure for table `exam_classes`
--

CREATE TABLE `exam_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `examination_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `examtype_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `marke` int(11) NOT NULL DEFAULT 0,
  `pass_marke` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_classes`
--

INSERT INTO `exam_classes` (`id`, `examination_id`, `class_id`, `group_id`, `subject_id`, `examtype_id`, `marke`, `pass_marke`, `date`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 0, 4, 4, 100, 33, '2024-05-15', '17:27', '18:28', 1, '2024-05-15 05:28:03', '2024-05-15 22:40:01'),
(3, 4, 4, 0, 3, 4, 100, 33, '2024-05-17', '11:37', '00:37', 1, '2024-05-15 22:37:39', '2024-05-15 22:39:54'),
(4, 4, 4, 0, 1, 4, 100, 33, '2024-05-18', '10:38', '00:38', 1, '2024-05-15 22:38:13', '2024-05-15 22:39:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_classes`
--
ALTER TABLE `exam_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
