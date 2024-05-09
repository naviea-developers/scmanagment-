-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:57 AM
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
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(10) UNSIGNED NOT NULL,
  `classId` varchar(255) DEFAULT NULL,
  `teacherId` varchar(255) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `classId`, `teacherId`, `subject`, `image`, `details`, `created_at`, `updated_at`) VALUES
(1, 'class 1', 'English', '', '2023020106231c4a826df983aab8e451c649b320bbff (2).png', 'Page number 34(1,2)', NULL, NULL),
(2, 'class 2', 'English', '', '202302020806bangla.png', 'hfhdgbhdf', NULL, NULL),
(3, 'class 1', 'English', '', '202302020807bangla.png', 'jghjghj', NULL, NULL),
(4, 'class 2', NULL, '', '202303081452IMG-20230307-WA0013.jpg', 'Math', NULL, NULL),
(5, 'class.1', '38', 'Math', '/tmp/phpp48jW1', 'Page 10 , Page 12 , Page 15 Full ', '2023-03-12 08:19:34', '2023-03-12 08:19:34'),
(6, 'class.2', '38', 'Math', NULL, 'Chapter 1 , Page 40 , All', '2023-03-12 08:26:07', '2023-03-12 08:26:07'),
(7, 'class.1', '43', 'Bangla', NULL, 'qdfaw', '2023-03-13 02:40:52', '2023-03-13 02:40:52'),
(8, 'class.2', '43', 'English', '/tmp/php4hxCXv', 'new class', '2023-03-31 06:18:39', '2023-03-31 06:18:39'),
(9, 'class.1', '43', 'Bangla', NULL, 'Hello world', '2023-04-01 02:55:19', '2023-04-01 02:55:19'),
(10, 'class.1', '73', 'Math', '/tmp/phpk1FEVp', 'please ready your home work', '2024-01-11 12:12:49', '2024-01-11 12:12:49'),
(11, 'class.2', '73', 'Math', '/tmp/phpmms82I', 'today every one home work', '2024-01-11 15:47:19', '2024-01-11 15:47:19'),
(12, 'class 2', 'Math', NULL, '202405080513screencapture-pay-ebay-rxo-2024-05-06-16_55_36 (1).png', 'jkashdfjkasdjkljas', '2024-05-08 05:13:00', '2024-05-08 05:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
