-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 10:20 AM
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
-- Table structure for table `course_lesson_videos`
--

CREATE TABLE `course_lesson_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lesson_name` varchar(255) DEFAULT NULL,
  `lesson_video` varchar(255) DEFAULT NULL,
  `video_time` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lesson_videos`
--

INSERT INTO `course_lesson_videos` (`id`, `course_lesson_id`, `lesson_name`, `lesson_video`, `video_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Arithmetic, Divisibility and Prime Number: Part 1', '1703569406100.mp4', NULL, 1, '2023-12-25 23:43:26', '2023-12-25 23:43:26'),
(2, 1, 'Course Overview', '1703569406101.mp4', NULL, 1, '2023-12-25 23:43:26', '2023-12-25 23:43:26'),
(3, 2, 'Introduction to our Quantitative Section', '1703569406210.mp4', NULL, 1, '2023-12-25 23:43:26', '2023-12-25 23:43:26'),
(4, 3, 'Text Completion: Part 1', '1703587127300.png', NULL, 1, '2023-12-26 04:38:47', '2023-12-26 04:38:47'),
(5, 4, 'Introduction to Photoshop', '1703673159400.mp4', NULL, 1, '2023-12-27 04:32:39', '2023-12-27 04:32:39'),
(6, 5, 'Start Editing with Adobe Premiere Pro', '1703673327500.mp4', NULL, 1, '2023-12-27 04:35:27', '2023-12-27 04:35:27'),
(7, 5, 'Course Overview', '1703673327501.mp4', NULL, 1, '2023-12-27 04:35:27', '2023-12-27 04:35:27'),
(8, 6, 'Arithmetic, Divisibility and Prime Number', '1703736444668.png', NULL, 1, '2023-12-27 04:37:31', '2023-12-27 22:07:24'),
(10, 8, 'gfdhfdh ss', '17037365358810.png', NULL, 1, '2023-12-27 22:08:39', '2023-12-27 22:08:55'),
(11, 9, 'Text Completion: Part 1', 'https://fgdf', NULL, 1, '2023-12-27 22:25:45', '2023-12-29 23:42:31'),
(14, 11, 'dyhdf', 'https://dfghfdfd', NULL, 1, '2023-12-29 02:28:07', '2023-12-30 00:03:31'),
(15, 11, 'Arithmetic, Divisibility and Prime Number', 'https://fgdf', NULL, 1, '2023-12-29 02:28:07', '2023-12-30 00:03:31'),
(16, 11, 'dfgh', 'https://gfdhgfhd', NULL, 1, '2023-12-29 02:32:56', '2023-12-30 00:03:31'),
(17, 12, 'fdhdfh', 'https://fdhdff', NULL, 1, '2023-12-29 02:33:10', '2023-12-30 00:03:31'),
(18, 12, 'gfhdb rtttt y', 'https://dfgsdfg', NULL, 1, '2023-12-29 02:42:46', '2023-12-30 00:03:31'),
(25, 17, 'Basics  56', 'https://www.youtube.com/embed/uivmhI0qqoc?si=eJ4kco_mcecO5Rz0', '2', 1, '2023-12-29 05:06:34', '2023-12-30 00:34:21'),
(36, 17, 'Finding out the smallest possible value', 'https://www.youtube.com/embed/uivmhI0qqoc?si=eJ4kco_mcecO5Rz0', '6', 1, '2023-12-30 00:34:06', '2023-12-30 00:34:06'),
(37, 17, 'Addition of positive integers', 'https://www.youtube.com/embed/uivmhI0qqoc?si=eJ4kco_mcecO5Rz0', '7', 1, '2023-12-30 00:34:06', '2023-12-30 00:34:06'),
(38, 28, 'Practice Math 1: Divisibility (Prime factors, Divisibility Check)', 'https://www.youtube.com/embed/uivmhI0qqoc?si=eJ4kco_mcecO5Rz0', '4', 1, '2023-12-30 00:41:09', '2023-12-30 00:41:09'),
(39, 28, 'Basics of Divisibility', 'https://www.youtube.com/embed/uivmhI0qqoc?si=eJ4kco_mcecO5Rz0', '8', 1, '2023-12-30 00:41:09', '2023-12-30 00:41:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_lesson_videos`
--
ALTER TABLE `course_lesson_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_lesson_videos`
--
ALTER TABLE `course_lesson_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
