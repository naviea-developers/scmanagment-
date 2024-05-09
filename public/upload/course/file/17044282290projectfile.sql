-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 10:19 AM
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
-- Database: `leadacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_quiz_files`
--

CREATE TABLE `course_quiz_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_quiz_files`
--

INSERT INTO `course_quiz_files` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 7, 'D:\\xampp\\tmp\\php23CF.tmp', 1, '2023-12-29 21:00:13', '2023-12-29 21:00:13'),
(25, 10, '17039179790quizfile.sql', 1, '2023-12-30 00:32:59', '2023-12-30 00:32:59'),
(26, 10, '17039179791quizfile.sql', 1, '2023-12-30 00:32:59', '2023-12-30 00:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_quiz_files`
--
ALTER TABLE `course_quiz_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_quiz_files`
--
ALTER TABLE `course_quiz_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
