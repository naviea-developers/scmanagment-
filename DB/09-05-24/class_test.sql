-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:58 AM
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
-- Database: `techknowsity_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_test`
--

CREATE TABLE `class_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `classId` varchar(255) DEFAULT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_test`
--

INSERT INTO `class_test` (`id`, `classId`, `subjectName`, `image`, `details`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'class 1', 'English', '202302010746app820.png', NULL, '4hr', NULL, NULL),
(2, 'class 2', 'English', '202302020808bangla.png', 'hdfjskd', '45min', NULL, NULL),
(3, 'class 1', 'Math', '202401111552353030956_599704045696757_7804263813995999009_n - Copy.jpg', 'Math', '2 hours', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_test`
--
ALTER TABLE `class_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_test`
--
ALTER TABLE `class_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
