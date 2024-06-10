-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 09:38 AM
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
-- Table structure for table `about_page_setups`
--

CREATE TABLE IF NOT EXISTS `about_page_setups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `about_text` varchar(255) DEFAULT NULL,
  `description1` longtext DEFAULT NULL,
  `video_thumbnail` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `about_text2` varchar(255) DEFAULT NULL,
  `description2` longtext DEFAULT NULL,
  `about_text3` varchar(255) DEFAULT NULL,
  `description3` longtext DEFAULT NULL,
  `about_text4` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_setups`
--

INSERT INTO `about_page_setups` (`id`, `about_text`, `description1`, `video_thumbnail`, `video_url`, `about_text2`, `description2`, `about_text3`, `description3`, `about_text4`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About LEAD Academy', 'LEAD ACADEMY is a One Stop Next-gen, Comprehensive Edu platform that offers the best learning technology with the most advanced education tools and unparalleled immersive experience within everyone’s reach. We are providing academic and skills amplifying courses and nano degrees online, ranging from K1-K12, professional certified nano degrees and in-demand skills based MOOC courses. We are the first & only Bangladeshi online learning platform with local & int. accredited certification from and the most renowned organizations like Pearson UK.', '1703386061_image.jpg', 'https://www.youtube.com/watch?v=O4BwvpVJ17k', 'Mission', 'Our mission is to create a global e-learning platform to democratize education, mitigate industry & academia skills gap with all-encompassing and accessible resources starting from our nation-building young coding programmes to inclusive education opportunities within everyone’s reach.', 'Why choose LEAD Academy', 'What makes us unparalleled to any other local online learning platform', 'OUR SERVICE', 1, '2023-12-21 03:02:16', '2023-12-27 04:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE IF NOT EXISTS `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020', 1, '2024-05-09 02:58:38', '2024-05-09 03:01:02'),
(3, '2021', 1, '2024-05-09 03:02:18', '2024-05-09 03:02:18'),
(4, '2022', 1, '2024-05-09 03:02:28', '2024-05-09 03:02:28'),
(5, '2023', 1, '2024-05-09 03:02:39', '2024-05-09 03:02:39'),
(6, '2024', 1, '2024-05-09 03:02:51', '2024-05-09 03:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE IF NOT EXISTS `admissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_id_number` varchar(255) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fee_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_nid` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_phone` varchar(255) DEFAULT NULL,
  `father_nid` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(255) DEFAULT NULL,
  `yearly_income` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `parmanent_address` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `present_continent_id` bigint(20) NOT NULL DEFAULT 0,
  `present_country_id` bigint(20) NOT NULL DEFAULT 0,
  `present_state_id` bigint(20) NOT NULL DEFAULT 0,
  `present_city_id` bigint(20) NOT NULL DEFAULT 0,
  `permanent_continent_id` bigint(20) NOT NULL DEFAULT 0,
  `permanent_country_id` bigint(20) NOT NULL DEFAULT 0,
  `permanent_state_id` bigint(20) NOT NULL DEFAULT 0,
  `permanent_city_id` bigint(20) NOT NULL DEFAULT 0,
  `pre_school` tinyint(4) NOT NULL DEFAULT 0,
  `pre_school_name` varchar(255) DEFAULT NULL,
  `pre_class_id` bigint(20) NOT NULL DEFAULT 0,
  `pre_roll_number` varchar(100) DEFAULT NULL,
  `pre_school_address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_new` tinyint(20) NOT NULL DEFAULT 0,
  `roll_number` int(255) NOT NULL DEFAULT 0,
  `is_current` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `user_id`, `student_id_number`, `class_id`, `fee_id`, `academic_year_id`, `session_id`, `section_id`, `group_id`, `student_name`, `dob`, `student_phone`, `student_email`, `student_nid`, `father_name`, `father_occupation`, `father_phone`, `father_nid`, `mother_name`, `mother_occupation`, `mother_phone`, `yearly_income`, `present_address`, `parmanent_address`, `image`, `present_continent_id`, `present_country_id`, `present_state_id`, `present_city_id`, `permanent_continent_id`, `permanent_country_id`, `permanent_state_id`, `permanent_city_id`, `pre_school`, `pre_school_name`, `pre_class_id`, `pre_roll_number`, `pre_school_address`, `status`, `created_at`, `updated_at`, `is_new`, `roll_number`, `is_current`) VALUES
(4, 1, '0', 12, 0, 0, 6, 0, 0, 'Abu Bakkar', '2024-05-01', '+1 (688) 691-8372', 'bakkar.test@ghmail.com', '56337647868', 'Riley Albert', 'job', '23434311111111', '342434324234', 'Maaa', 'house hold', '435435234234', '1222222', 'Dhaka', 'sirajgonj', '7779703061716002814_student_image.jpeg', 1, 1, 3, 0, 1, 1, 3, 3, 0, 'Claudia Heath', 1, '495', 'Hic commodi hic earu', 1, '2024-05-13 00:15:15', '2024-05-23 00:42:48', 0, 0, 0),
(5, 303, '20241003', 1, 1, 6, 6, 2, 0, 'fdsafsfafdasf', '2024-05-09', '+1 (688) 691-8372', 'naqqqqsog@mailinator.com', '56337647868', 'Baap', 'job', '23434311111111', 'Odit repellendus Qu', 'Maaa', 'house hold', '435435234234', '200000', 'Dhaka', NULL, '14240481921715581953_student_image.jpg', 3, 4, 1, 0, 1, 1, 3, 9, 1, 'sdfsdf', 6, '495', 'dsafawrw ewr esf dsf dsf saf', 1, '2024-05-13 00:32:33', '2024-05-27 02:40:34', 0, 3, 0),
(6, 6, '20241002', 1, 1, 6, 6, 1, 0, 'Nasma', '2024-05-13', '01858509214', 'shohag1234@gmail.com', '14324', 'kalam', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'israt', 'dfhdf', '01858509214', '90', 'dhaka', 'dhaka', '18219765821715596917_student_image.jpeg', 1, 1, 3, 0, 1, 1, 3, 3, 1, 'k-s-h', 4, '20', 'dhaka', 1, '2024-05-13 04:41:57', '2024-05-27 01:42:45', 0, 2, 0),
(7, 291, '20241001', 1, 1, 6, 6, 1, 1, 'sumi', '1998-07-03', '01858509214', 'shohagnew@gmail.com', '14324', 'Imran', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'Sarnale', 'dfhdf', '01858509214', '20000', 'dhaka', NULL, '18240033081716194838_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-20 02:47:18', '2024-05-30 03:25:05', 0, 1, 0),
(8, 293, '0', 12, 3, 6, 6, 7, 0, 'Alamin', '2024-05-21', '01858509214', 'shohag098@gmail.com', '14324', 'Niaz', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'Sadia', 'dfhdf', '01858509214', '200', 'dhaka', NULL, '2685148681716266359_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-20 22:39:19', '2024-05-27 01:19:27', 0, 1, 0),
(12, 2, '0', 10, 2, 6, 6, 3, 0, 'Hriday', '2024-05-24', '01858509214', 'hriday@gmail.com', '14324', 'Imran', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'Asma', 'dfhdf', '01858509214', '5000', 'dhaka', NULL, '3275118791716443292_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-22 23:34:15', '2024-05-23 01:15:17', 0, 0, 0),
(13, 3, '202412002', 12, 0, 6, 6, 0, 0, 'Eva', '2024-05-24', '01858509214', 'eva@gmail.com', '14324', 'Imran', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'Sarnaly', 'dfhdf', '01858509214', '70000', 'dhaka', NULL, '9877091391716443772_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-22 23:34:15', '2024-05-27 01:44:24', 0, 2, 0),
(15, 295, '202412003', 12, 0, 6, 6, 0, 0, 'Kalam', '2024-05-24', '01858509214', 'Kalam@gmail.com', '14324', 'Hannan', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'Asma', 'dfhdf', '01858509214', '2000', 'dhaka', NULL, '1421258811716442996_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-22 23:43:16', '2024-05-27 02:41:08', 0, 3, 0),
(36, 296, '20245001', 5, 0, 6, 6, 0, 0, 'ALtap', '2024-05-24', '01858509214', 'altap@gmail.com', '14324', 'Imran', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'israt', 'dfhdf', '01858509214', '50000', 'dhaka', NULL, '19854273861716447199_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-23 00:53:19', '2024-05-27 02:41:17', 0, 1, 0),
(57, 297, '2024100004', 1, 1, 6, 6, 1, 0, 'Hossen', '2024-05-25', '01858509214', 'hossen12@gmail.com', '14324', 'Imran', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'Asma', 'dfhdf', '01858509214', '4000', 'dhaka', NULL, '3577380261716627340_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-25 02:55:40', '2024-05-27 01:25:27', 0, 4, 0),
(58, 299, '0', 1, 0, 6, 6, 0, 0, 'shohag', '2024-05-27', '01858509214', 'shohagfhfdfg@gmail.com', '14324', 'shohag', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'shohag', 'dfhdf', '01858509214', '7000', 'dhaka', NULL, '8393393251716794016_student_image.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-27 01:13:36', '2024-05-27 01:51:08', 0, 3, 0),
(60, 302, '20241005', 1, 0, 6, 6, 0, 0, 'shohag', '2024-05-30', '01858509214', 'hridafgbjhgfhgfdnfjy@gmail.com', 'dfgsfdgs', 'kalam', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'shohag', 'dfhdf', '01858509214', '1000', 'dhaka', NULL, '17325590071716798315_student_image.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-27 02:25:15', '2024-05-27 02:25:15', 1, 5, 0),
(61, 303, '20241006', 1, 1, 6, 6, 1, 1, 'shohag_new', '2024-05-28', '01858509214', 'Kalgfhdam@gmail.com', '14324', 'shohag_father_name', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'Sarnale', 'dfhdf', '01858509214', '200', 'dhaka', NULL, '16978516341716798731_student_image.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-05-27 02:32:11', '2024-05-27 02:32:11', 0, 6, 0),
(62, 304, '20244001', 4, 2, 6, 6, 3, 0, 'Kalam two', '2024-06-14', '01858509214', 'kalam2@gmail.com', '14324', 'shohag', 'gfdhdgd', '01858509214', 'dfhdfh6554', 'israt', 'dfhdf', '01858509214', '200', 'dhaka', NULL, '16171265861717231391_student_image.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, 1, '2024-06-01 02:43:11', '2024-06-01 02:43:11', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admission_certificates`
--

CREATE TABLE IF NOT EXISTS `admission_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `admission_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `certificates_name` varchar(255) DEFAULT NULL,
  `certificates_file` text DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_certificates`
--

INSERT INTO `admission_certificates` (`id`, `user_id`, `admission_id`, `certificates_name`, `certificates_file`, `extension`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 6, 'gfhfg', 'gfhfg-shohag_certificat_file.jpeg', 'jpeg', 1, '2024-05-13 04:41:57', '2024-05-13 23:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `application_documents`
--

CREATE TABLE IF NOT EXISTS `application_documents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `document_type` varchar(255) DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `extensions` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_education`
--

CREATE TABLE IF NOT EXISTS `application_education` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `gpa_type` tinyint(4) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_education`
--

INSERT INTO `application_education` (`id`, `application_id`, `user_id`, `school`, `major`, `start_date`, `end_date`, `gpa_type`, `country`, `created_at`, `updated_at`) VALUES
(2, 4, 276, 'sdafdsa', 'sadf', '2024-03-13 00:00:00', '2024-03-05 00:00:00', 0, 'sdfas', '2024-03-09 21:26:37', '2024-03-09 21:26:37'),
(3, 4, 276, 'sdafasd', 'dsafsd', '2024-03-10 00:00:00', '2024-03-10 00:00:00', 0, 'sdfsda', '2024-03-09 21:26:37', '2024-03-09 21:26:37'),
(4, 4, 276, 'sdafdsa', 'sadf', '2024-03-13 00:00:00', '2024-03-05 00:00:00', 0, 'sdfas', '2024-03-09 21:26:49', '2024-03-09 21:26:49'),
(5, 4, 276, 'sdafasd', 'dsafsd', '2024-03-10 00:00:00', '2024-03-10 00:00:00', 0, 'sdfsda', '2024-03-09 21:26:49', '2024-03-09 21:26:49'),
(6, 5, 276, 'sdfgfds', 'dsfgdfs', '2024-03-20 00:00:00', '2024-03-27 00:00:00', 0, 'dsfgsd', '2024-03-09 22:24:42', '2024-03-09 22:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `application_works`
--

CREATE TABLE IF NOT EXISTS `application_works` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_works`
--

INSERT INTO `application_works` (`id`, `application_id`, `user_id`, `company`, `job_title`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 4, 276, 'sdaf', 'sadfsda', '2024-03-10 00:00:00', '2024-03-10 00:00:00', '2024-03-09 21:26:38', '2024-03-09 21:26:38'),
(3, 4, 276, 'sdaf', 'sadfsda', '2024-03-10 00:00:00', '2024-03-10 00:00:00', '2024-03-09 21:26:49', '2024-03-09 21:26:49'),
(4, 5, 276, 'dfs', 'dsfgds', '2024-03-11 00:00:00', '2024-03-21 00:00:00', '2024-03-09 22:24:42', '2024-03-09 22:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `ask_questions`
--

CREATE TABLE IF NOT EXISTS `ask_questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `university_id` bigint(20) UNSIGNED DEFAULT 0,
  `program_id` bigint(20) UNSIGNED DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ask_questions`
--

INSERT INTO `ask_questions` (`id`, `university_id`, `program_id`, `name`, `email`, `question`, `answer`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Niaz', 'addfdfdsfdsfmin@gmail.com', 'Maxime aut fugit co', 'sdg sfdgfd g111111111111111', 'university', '2024-03-04 05:38:06', '2024-03-04 21:17:19'),
(2, 1, 0, 'sdfsdf', 'navieasdfsfpc9@gmail.com', 'fdsf dsf dsf df s', 't', 'university', '2024-03-04 05:51:52', '2024-03-04 07:00:16'),
(3, 3, 0, 'Beginnersss', 'useassr@gmail.com', 'What is the name of course?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,', 'university', '2024-03-04 07:15:38', '2024-03-04 07:34:22'),
(4, 3, 0, 'Beginner', 'navisdfdeapc9@gmail.com', 'dsafdsafdsa fdf', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,.......', 'university', '2024-03-04 07:33:14', '2024-03-09 02:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `banner_position` varchar(50) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `discount_text` varchar(255) DEFAULT NULL,
  `background_color` varchar(100) DEFAULT NULL,
  `image_show_type` int(11) DEFAULT 0,
  `image_position` varchar(50) DEFAULT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `category_id`, `status`, `position`, `created_at`, `updated_at`, `type`, `banner_position`, `text`, `discount_text`, `background_color`, `image_show_type`, `image_position`, `btn_text`, `image2`, `background_image`, `details`) VALUES
(17, 'gd rrdfs gfd gf hs sreat ra gd rrdfs gfd gf hs sreat ra', '440840121706346710.png', NULL, 1, 99, '2024-01-27 03:01:20', '2024-01-27 03:11:50', 'event', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '<p>rag efgrea e gd rrdfs gfd gf hs sreat ragd rrdfs gfd gf hs sreat ragd rrdfs gfd gf hs sreat ragd rrdfs gfd gf hs sreat ra gd rrdfs gfd gf hs sreat ragd rrdfs gfd gf hs sreat ra</p>'),
(18, 'Blog', '14508271721706346348.png', NULL, 1, 99, '2024-01-27 03:05:48', '2024-01-27 03:05:48', 'blog', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '<p>eraft aefre efg&nbsp;</p>'),
(19, 'Contact', '5389411101706354525.png', NULL, 1, 99, '2024-01-27 05:22:05', '2024-01-27 05:22:05', 'contact', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(20, 'All E-Books', '5457628351706500577.jpg', NULL, 1, 99, '2024-01-28 21:56:17', '2024-01-28 21:56:17', 'ebook', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '<p>This is e-book description. Thank you...</p>'),
(21, 'All E-Audio Book', '1254832621707128496.png', NULL, 1, 99, '2024-02-05 15:21:36', '2024-02-05 15:21:36', 'e-audio', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</span><br></p>'),
(22, 'Daily Class Video', '7443841221707128582.png', NULL, 1, 99, '2024-02-05 15:23:02', '2024-06-08 02:11:12', 'daily_class', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here.</span><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `duration` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_days`
--

CREATE TABLE IF NOT EXISTS `batch_days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `day` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE IF NOT EXISTS `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_thumbnail` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `sort_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `sub_banner` int(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `author_image` text DEFAULT NULL,
  `views` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `topic_id` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `university_id`, `title`, `image`, `video_thumbnail`, `video_link`, `sort_description`, `description`, `sub_banner`, `slug`, `status`, `position`, `created_at`, `updated_at`, `author`, `author_image`, `views`, `topic_id`) VALUES
(23, 63, 0, 'A Healthy Work-Life Balance', '6833355951703407782.png', NULL, 'https://', NULL, '<p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Diversity, equity, and inclusion (DEI) in the workplace are important topics that have gained increasing attention in recent years. A diverse workforce has numerous benefits, including increased creativity and innovation, improved problem-solving abilities, and a broader range of perspectives. But simply having a diversified staff is insufficient. Companies must also ensure that they are creating an inclusive and equitable workplace where all employees feel valued and have the opportunity to succeed.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Defining Diversity, Equity, and Inclusion</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">The term \"diversity\" describes a broad range of individual differences, including but not limited to those based on racial or ethnic background, gender, sexual orientation, age, religion, physical prowess, and social level. Equity refers to fairness and the elimination of systemic barriers that prevent certain groups from achieving their full potential. Inclusion refers to the practice of actively including and valuing all individuals and their unique perspectives and experiences.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Why is DEI Important in the Workplace?</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">A diverse and inclusive workplace has many benefits, </span><a href=\"https://www.sciencedirect.com/science/article/pii/S2212567114001786\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><u>including improved productivity</u></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">, increased employee engagement, and better decision-making. Additionally, a diverse workforce can help companies better understand and meet the needs of their customers and clients.However, the benefits of DEI go beyond just the bottom line. Creating an inclusive and equitable workplace is a moral imperative. By promoting diversity and inclusion, companies can help reduce social inequality and promote a more just society.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">The Best Practices for Increasing DEI at Work</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">There are many ways that companies can promote diversity, equity, and inclusion in the workplace. Some best practices include:</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Diversity in Hiring</span> - Companies can ensure they are creating a diverse workforce by implementing practices that encourage diversity in hiring. This includes using diverse job postings, actively recruiting from diverse sources, and eliminating any unconscious bias in the hiring process.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Training and Education</span> - Companies can provide training and education to employees to help them understand the importance of DEI and how they can contribute to a more inclusive workplace.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><a href=\"https://hirefortalent.ca/toolkit/inclusive-workplaces/item/8-2-what-is-an-inclusive-workplace-policy#:~:text=An%20inclusive%20workplace%20policy%20is,the%20scope%20of%20your%20intentions.\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><span style=\"font-weight: bolder;\"><u>Inclusive Workplace Policies</u></span></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"> - Companies can implement policies that promote equity and inclusion, such as providing equal pay for equal work, flexible work arrangements, and accommodating employees with disabilities.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><a href=\"https://www.mckinsey.com/capabilities/people-and-organizational-performance/our-insights/effective-employee-resource-groups-are-key-to-inclusion-at-work-heres-how-to-get-them-right\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><span style=\"font-weight: bolder;\"><u>Employee Resource Groups</u></span></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"> - Employee resource groups (ERGs) can provide a safe space for employees who share a common identity or interest. ERGs can help employees feel more connected to their workplace and can provide a forum for discussing issues related to diversity and inclusion.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><a href=\"https://www.youtube.com/watch?v=0MkAu-6-byA&ab_channel=CherylCran\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><span style=\"font-weight: bolder;\"><u>Leadership Commitment</u></span></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"> - Leadership commitment is essential for creating a culture of DEI. Leaders can set the tone for the entire organization by modeling inclusive behavior and actively promoting diversity and inclusion.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Promoting diversity, equity, and inclusion in the workplace is not only good for business, but it is also a moral imperative. Companies that prioritize DEI can benefit from increased productivity, improved employee engagement, and better decision-making. Additionally, promoting DEI can help create a more just society and reduce social inequality. By implementing best practices such as diverse hiring, training and education, inclusive policies, ERGs, and leadership commitment, companies can create a more diverse, equitable, and inclusive workplace.</span></p>', 1, 'a-healthy-work-life-balance', 1, 99, '2023-12-24 02:49:42', '2024-02-23 17:16:32', 'Jon', '20621941351703559327_author_image.png', 190, NULL),
(24, 63, 0, 'Why is DEI (Diversity, Equity, and Inclusion) Important in the Workplace?', '14498116161703407870.png', NULL, 'https://', NULL, '<p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Diversity, equity, and inclusion (DEI) in the workplace are important topics that have gained increasing attention in recent years. A diverse workforce has numerous benefits, including increased creativity and innovation, improved problem-solving abilities, and a broader range of perspectives. But simply having a diversified staff is insufficient. Companies must also ensure that they are creating an inclusive and equitable workplace where all employees feel valued and have the opportunity to succeed.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Defining Diversity, Equity, and Inclusion</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">The term \"diversity\" describes a broad range of individual differences, including but not limited to those based on racial or ethnic background, gender, sexual orientation, age, religion, physical prowess, and social level. Equity refers to fairness and the elimination of systemic barriers that prevent certain groups from achieving their full potential. Inclusion refers to the practice of actively including and valuing all individuals and their unique perspectives and experiences.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Why is DEI Important in the Workplace?</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">A diverse and inclusive workplace has many benefits, </span><a href=\"https://www.sciencedirect.com/science/article/pii/S2212567114001786\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><u>including improved productivity</u></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">, increased employee engagement, and better decision-making. Additionally, a diverse workforce can help companies better understand and meet the needs of their customers and clients.However, the benefits of DEI go beyond just the bottom line. Creating an inclusive and equitable workplace is a moral imperative. By promoting diversity and inclusion, companies can help reduce social inequality and promote a more just society.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">The Best Practices for Increasing DEI at Work</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">There are many ways that companies can promote diversity, equity, and inclusion in the workplace. Some best practices include:</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Diversity in Hiring</span> - Companies can ensure they are creating a diverse workforce by implementing practices that encourage diversity in hiring. This includes using diverse job postings, actively recruiting from diverse sources, and eliminating any unconscious bias in the hiring process.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Training and Education</span> - Companies can provide training and education to employees to help them understand the importance of DEI and how they can contribute to a more inclusive workplace.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><a href=\"https://hirefortalent.ca/toolkit/inclusive-workplaces/item/8-2-what-is-an-inclusive-workplace-policy#:~:text=An%20inclusive%20workplace%20policy%20is,the%20scope%20of%20your%20intentions.\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><span style=\"font-weight: bolder;\"><u>Inclusive Workplace Policies</u></span></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"> - Companies can implement policies that promote equity and inclusion, such as providing equal pay for equal work, flexible work arrangements, and accommodating employees with disabilities.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><a href=\"https://www.mckinsey.com/capabilities/people-and-organizational-performance/our-insights/effective-employee-resource-groups-are-key-to-inclusion-at-work-heres-how-to-get-them-right\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><span style=\"font-weight: bolder;\"><u>Employee Resource Groups</u></span></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"> - Employee resource groups (ERGs) can provide a safe space for employees who share a common identity or interest. ERGs can help employees feel more connected to their workplace and can provide a forum for discussing issues related to diversity and inclusion.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><a href=\"https://www.youtube.com/watch?v=0MkAu-6-byA&ab_channel=CherylCran\" style=\"color: rgb(56, 165, 238);\"><span style=\"background-color: transparent; color: rgb(17, 85, 204);\"><span style=\"font-weight: bolder;\"><u>Leadership Commitment</u></span></span></a><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"> - Leadership commitment is essential for creating a culture of DEI. Leaders can set the tone for the entire organization by modeling inclusive behavior and actively promoting diversity and inclusion.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, \"Trebuchet MS\", \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\";\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Promoting diversity, equity, and inclusion in the workplace is not only good for business, but it is also a moral imperative. Companies that prioritize DEI can benefit from increased productivity, improved employee engagement, and better decision-making. Additionally, promoting DEI can help create a more just society and reduce social inequality. By implementing best practices such as diverse hiring, training and education, inclusive policies, ERGs, and leadership commitment, companies can create a more diverse, equitable, and inclusive workplace.</span></p>', NULL, 'why-is-dei-diversity-equity-and-inclusion-important-in-the-workplace-2', 1, 99, '2023-12-24 02:51:10', '2024-02-23 17:16:29', 'Lead Academy', '6252555201703764860_author_image.png', 182, NULL),
(27, 64, 0, 'This is Blog', '8325487251703763643.png', NULL, 'https://', NULL, '<p>This is blog description</p>', NULL, 'this-is-blog-2', 1, 99, '2023-12-28 05:40:43', '2024-02-23 17:16:23', 'Lead Academyyyyy', '21171260081703763643_author_image.png', 68, NULL),
(28, 64, 0, 'this is the test blog. thank you...', '1107264021703996475.png', NULL, 'https://', NULL, '<p>This is The description. Thank you</p>', NULL, 'this-is-the-test-blog-thank-you', 1, 99, '2023-12-30 22:21:15', '2024-02-23 17:16:20', 'Tonmoy Ahmed', '2843430831703996475_author_image.jpg', 176, NULL),
(29, 64, 0, 'Next Blog', '16553505831704165277.jpg', NULL, 'https://', NULL, '<p>This is Blog</p>', NULL, 'next-blog-2', 1, 99, '2024-01-01 21:14:37', '2024-02-23 17:16:16', 'Razu Ahmed', '4286753551704165277_author_image.png', 55, NULL),
(40, 64, 0, 'This is test blog tag', '4649806061704183764.png', NULL, 'https://', NULL, '<p>This is description. Thank you....</p>', NULL, 'this-is-test-blog-tag-2', 1, 99, '2024-01-02 02:22:44', '2024-06-10 00:09:18', 'Lead Academy', '11975232541704183764_author_image.jpg', 40, NULL),
(41, 64, 0, 'Bangladesh is a muslim country.', '16146822471704193077.jpg', NULL, 'https://', NULL, '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"><br></span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"><br></span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. </span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"><br></span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at </span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, </span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">\"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p><p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"><br></span><br></p>', NULL, 'bangladesh-is-a-muslim-country-2', 1, 99, '2024-01-02 04:53:03', '2024-06-09 23:59:30', 'Lead Academy', '18258505941704192953_author_image.png', 73, NULL),
(42, 62, 0, 'Personal Blog', '7998793501704338562.webp', NULL, 'https://', NULL, '<p>This is description, Thank you...</p>', NULL, 'personal-blog-2', 1, 99, '2024-01-03 21:22:42', '2024-06-10 00:12:25', 'Lead Academy', NULL, 33, 4),
(43, 64, 0, 'Blog Blog', '19754588921704689426.png', NULL, 'https://', NULL, '<p>This is description. Thank you...</p>', NULL, 'blog-blog', 1, 99, '2024-01-07 22:50:26', '2024-06-02 03:55:13', 'Lead Academy', '2954105151704689426_author_image.png', 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shelf_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `total_set` int(11) DEFAULT NULL,
  `stock_in` int(11) NOT NULL DEFAULT 0,
  `stock_out` int(11) NOT NULL DEFAULT 0,
  `book_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `shelf_id`, `class_id`, `group_id`, `name`, `total_set`, `stock_in`, `stock_out`, `book_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 0, 'Bangla', 100, 0, 0, '700001', 1, '2024-05-26 02:26:51', '2024-05-26 22:24:17'),
(2, 2, 4, 0, 'English', 200, 0, 0, '400002', 1, '2024-05-26 02:30:36', '2024-05-26 22:27:34'),
(4, 1, 6, 0, 'MAth', 100, 0, 0, '600004', 1, '2024-05-26 02:33:40', '2024-05-26 22:30:00'),
(5, 1, 4, 0, 'bangla', 30, 0, 0, '400005', 1, '2024-05-26 22:15:03', '2024-05-26 22:27:42'),
(6, 1, 7, 1, 'English', 40, 0, 0, '700006', 1, '2024-05-26 22:24:50', '2024-05-26 22:49:02'),
(7, 1, 1, 1, 'Physics', 58, 56, 0, '100007', 1, '2024-05-26 22:31:30', '2024-05-28 21:06:16'),
(8, 1, 9, 3, 'Islam', 60, 0, 0, '900008', 1, '2024-05-26 22:31:49', '2024-05-26 22:42:30'),
(9, 1, 1, 1, 'Bangla', 32, 32, 0, '100009', 1, '2024-05-26 22:32:12', '2024-05-28 21:06:16'),
(10, 1, 1, 1, 'English', 90, 88, 0, '100010', 1, '2024-05-26 22:32:32', '2024-05-28 21:03:00'),
(11, 1, 4, 1, 'Physics', 6, 0, 0, '400011', 1, '2024-05-26 22:32:48', '2024-05-26 22:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE IF NOT EXISTS `borrows` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `borrow_id_number` int(11) NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `from_date` varchar(255) DEFAULT NULL,
  `to_date` varchar(255) DEFAULT NULL,
  `is_return` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `student_id`, `borrow_id_number`, `class_id`, `user_id`, `from_date`, `to_date`, `is_return`, `created_at`, `updated_at`) VALUES
(1, 6, 2405281, 1, 0, '2024-05-19', '2024-05-22', 1, '2024-05-28 04:22:16', '2024-05-28 05:45:27'),
(2, 61, 2405282, 1, 0, '2024-05-26', '2024-05-27', 1, '2024-05-28 04:31:34', '2024-05-28 21:03:00'),
(3, 57, 2405283, 1, 0, '2024-05-26', '2024-05-28', 1, '2024-05-28 04:39:37', '2024-05-28 21:06:16'),
(4, 5, 2405284, 1, 0, '2024-05-28', '2024-05-31', 0, '2024-05-28 04:40:26', '2024-05-28 04:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_items`
--

CREATE TABLE IF NOT EXISTS `borrow_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `borrow_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `book_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_items`
--

INSERT INTO `borrow_items` (`id`, `borrow_id`, `book_id`, `created_at`, `updated_at`) VALUES
(42, 2, 7, '2024-05-28 05:12:02', '2024-05-28 05:12:02'),
(43, 2, 9, '2024-05-28 05:12:02', '2024-05-28 05:12:02'),
(44, 2, 10, '2024-05-28 05:12:02', '2024-05-28 05:12:02'),
(48, 3, 7, '2024-05-28 05:14:13', '2024-05-28 05:14:13'),
(49, 3, 9, '2024-05-28 05:14:13', '2024-05-28 05:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `buldings`
--

CREATE TABLE IF NOT EXISTS `buldings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buldings`
--

INSERT INTO `buldings` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bulding-1', 1, '2024-05-11 05:04:01', '2024-05-11 05:04:01'),
(2, 'Bulding-2', 1, '2024-05-11 05:04:13', '2024-05-11 05:04:13'),
(5, 'sdgtrestge45-3', 1, '2024-06-10 00:43:56', '2024-06-10 00:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `business_packages`
--

CREATE TABLE IF NOT EXISTS `business_packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `item` longtext DEFAULT NULL,
  `package_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_type` varchar(100) DEFAULT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_packages`
--

INSERT INTO `business_packages` (`id`, `name`, `text`, `price`, `item`, `package_status`, `created_at`, `updated_at`, `package_type`, `type_name`, `discount`) VALUES
(1, 'Express Package', 'Express Package', NULL, NULL, 1, '2023-12-19 21:59:04', '2023-12-29 00:57:26', NULL, 'enterprise', NULL),
(2, 'Monthly Subscription Package', 'Limited Time Only', '60000', NULL, 1, '2023-12-20 01:14:40', '2024-01-08 20:51:06', NULL, 'yearly', '50000'),
(3, 'Monthly Subscription Package', 'Limited Time Only', '500000', NULL, 1, '2023-12-20 04:07:47', '2024-01-28 04:44:46', NULL, 'monthly', NULL),
(4, 'Free', 'Free Trial', NULL, NULL, 1, '2023-12-20 04:08:05', '2023-12-29 21:53:25', NULL, 'free', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_packages_years`
--

CREATE TABLE IF NOT EXISTS `business_packages_years` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `item` longtext DEFAULT NULL,
  `package_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_packages_years`
--

INSERT INTO `business_packages_years` (`id`, `name`, `text`, `price`, `item`, `package_status`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'Free Trial', '0000', '<p>1 . ududhsdhd</p><p>2. uihdsf&nbsp; hfeifuef</p><p>3. uihsf a khsf&nbsp;</p><p>4. vuyerfh f</p>', 1, '2023-12-19 22:04:28', '2023-12-19 22:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(255) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ebook_id` bigint(20) UNSIGNED DEFAULT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `cart_type` varchar(255) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `discount` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `course_id`, `package_id`, `order_id`, `user_id`, `ebook_id`, `application_id`, `cart_type`, `amount`, `discount`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 258, 33, 0, 'ebook', 4900.00, 100, '2024-01-29 01:57:41', '2024-01-29 01:57:41'),
(2, NULL, NULL, 2, 258, 34, 0, 'ebook', 990.00, 10, '2024-01-29 02:00:08', '2024-01-29 02:00:08'),
(3, NULL, NULL, 3, 258, 33, 0, 'ebook', 4900.00, 100, '2024-01-29 02:02:00', '2024-01-29 02:02:00'),
(4, NULL, NULL, 4, 259, 33, 0, 'ebook', 4900.00, 100, '2024-01-29 02:03:07', '2024-01-29 02:03:07'),
(5, NULL, NULL, 5, 258, 35, 0, 'ebook', 3400.00, 100, '2024-01-29 02:51:58', '2024-01-29 02:51:58'),
(6, NULL, NULL, 6, 258, 32, 0, 'ebook', 990.00, 10, '2024-01-29 05:42:58', '2024-01-29 05:42:58'),
(7, NULL, NULL, 7, 262, 40, 0, 'ebook', 990.00, 10, '2024-01-29 23:36:02', '2024-01-29 23:36:02'),
(8, NULL, NULL, 8, 262, 41, 0, 'ebook', 900.00, 100, '2024-01-30 01:15:23', '2024-01-30 01:15:23'),
(9, NULL, NULL, 9, 262, 43, 0, 'ebook', 984.00, 16, '2024-01-30 01:39:35', '2024-01-30 01:39:35'),
(10, NULL, NULL, 10, 262, 44, 0, 'ebook', 1900.00, 50, '2024-01-30 01:41:06', '2024-01-30 01:41:06'),
(11, 9, NULL, 12, 178, NULL, 0, 'course', 3500.00, 500, '2024-01-30 12:49:08', '2024-01-30 12:49:08'),
(12, NULL, NULL, 13, 263, 42, 0, 'ebook', 985.00, 15, '2024-01-31 16:41:16', '2024-01-31 16:41:16'),
(13, NULL, NULL, 14, 266, 40, 0, 'ebook', 990.00, 10, '2024-02-03 11:03:15', '2024-02-03 11:03:15'),
(14, NULL, NULL, 15, 268, 47, 0, 'ebook', 990.00, 10, '2024-02-05 15:03:42', '2024-02-05 15:03:42'),
(15, NULL, NULL, 16, 277, 41, 0, 'ebook', 900.00, 100, '2024-02-06 14:55:40', '2024-02-06 14:55:40'),
(16, NULL, NULL, 16, 277, 47, 0, 'ebook', 990.00, 10, '2024-02-06 14:55:40', '2024-02-06 14:55:40'),
(17, 14, NULL, 17, 277, NULL, 0, 'course', 290.00, 10, '2024-02-06 14:57:15', '2024-02-06 14:57:15'),
(18, NULL, NULL, 17, 277, 42, 0, 'ebook', 985.00, 15, '2024-02-06 14:57:15', '2024-02-06 14:57:15'),
(19, 4, NULL, 18, 276, NULL, 0, 'course', 1800.00, 10, '2024-02-06 14:58:57', '2024-02-06 14:58:57'),
(20, NULL, NULL, 18, 276, 50, 0, 'ebook', 90.00, 10, '2024-02-06 14:58:57', '2024-02-06 14:58:57'),
(21, 14, NULL, 18, 276, NULL, 0, 'course', 290.00, 10, '2024-02-06 14:58:57', '2024-02-06 14:58:57'),
(22, NULL, NULL, 18, 276, 49, 0, 'ebook', 190.00, 10, '2024-02-06 14:58:57', '2024-02-06 14:58:57'),
(23, NULL, NULL, 18, 276, 48, 0, 'ebook', 2990.00, 10, '2024-02-06 14:58:57', '2024-02-06 14:58:57'),
(24, NULL, NULL, 19, 279, 47, 0, 'ebook', 990.00, 10, '2024-02-07 07:26:52', '2024-02-07 07:26:52'),
(25, 22, NULL, NULL, NULL, NULL, 10, NULL, 100.00, NULL, '2024-03-09 04:35:15', '2024-03-09 04:35:15'),
(26, 23, NULL, NULL, NULL, NULL, 10, NULL, 1000.00, NULL, '2024-03-09 04:44:20', '2024-03-09 04:44:20'),
(35, 22, NULL, NULL, NULL, NULL, 5, NULL, 100.00, NULL, '2024-03-09 22:23:54', '2024-03-09 22:23:54'),
(36, 3, NULL, 20, 276, NULL, 0, 'course', 1800.00, 10, '2024-03-30 22:53:28', '2024-03-30 22:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_sub` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `position` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color_code` varchar(200) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `name`, `slug`, `parent_id`, `is_sub`, `status`, `position`, `created_at`, `updated_at`, `icon`, `color_code`, `template`, `details`, `image`) VALUES
(48, 'home', 'IBA-MBA Admission Preparation', 'iba-mba-admission-preparation', 0, 0, 1, NULL, '2023-12-12 21:37:33', '2023-12-12 21:37:33', '11422968431702438653_home_category.jpg', NULL, NULL, '<p>good</p>', NULL),
(49, 'home', 'Fashion Design', 'fashion-design', 0, 0, 1, NULL, '2023-12-12 21:38:02', '2023-12-12 21:38:02', '10697132841702438682_home_category.webp', NULL, NULL, 'good', NULL),
(50, 'home', 'Gardening', 'gardening', 0, 0, 1, NULL, '2023-12-12 21:38:29', '2023-12-12 21:38:29', '4175755351702438709_home_category.webp', NULL, NULL, '<p>good</p>', NULL),
(51, 'home', 'Mathematics', 'mathematics', 48, 0, 1, NULL, '2023-12-12 21:39:11', '2023-12-12 21:39:11', '20794032111702438751_home_sub_category.webp', NULL, NULL, '<p>good sub</p>', NULL),
(52, 'home', 'English', 'english', 48, 0, 1, NULL, '2023-12-12 21:39:39', '2023-12-12 21:39:39', '3546400811702438779_home_sub_category.webp', NULL, NULL, '<p>good sub</p>', NULL),
(53, 'home', 'Combined Course for IBA-MBA Admission Preparation', 'combined-course-for-iba-mba-admission-preparation', 48, 0, 1, NULL, '2023-12-12 21:40:04', '2023-12-12 21:40:04', '3807377841702438804_home_sub_category.webp', NULL, NULL, '<p>good sub</p>', NULL),
(54, 'home', '3D Design', '3d-design', 49, 0, 1, NULL, '2023-12-12 21:40:44', '2023-12-12 21:40:44', '18734662931702438844_home_sub_category.webp', NULL, NULL, '<p>good sub</p>', NULL),
(55, 'home', 'Gardening', 'gardening-2', 49, 0, 1, NULL, '2023-12-12 21:41:22', '2023-12-12 21:41:22', '1231814121702438882_home_sub_category.jpg', NULL, NULL, '<p>good sub</p>', NULL),
(56, 'home', 'Speech and Language Therapy', 'speech-and-language-therapy', 50, 0, 1, NULL, '2023-12-12 21:41:44', '2023-12-12 21:41:44', '587161391702438904_home_sub_category.jpg', NULL, NULL, '<p>good sub</p>', NULL),
(57, 'home', 'Cyber Security', 'cyber-security', 50, 0, 1, NULL, '2023-12-12 21:42:21', '2023-12-12 21:43:48', '16485202851702438941_home_sub_category.jpg', NULL, NULL, 'good sub', NULL),
(58, 'event', 'Event Category', 'event-category', 0, 0, 1, 1, '2023-12-24 03:28:01', '2023-12-24 03:28:01', '2846234241703410081_blog_category.png', '000000', NULL, NULL, NULL),
(59, 'event', 'Sub Event', 'sub-event', 0, 0, 1, 2, '2023-12-24 03:32:25', '2023-12-24 03:32:25', '5414618781703410345_event_category.png', '000000', NULL, NULL, NULL),
(60, 'master_course', 'Trending', 'trending', 0, 0, 1, 1, '2023-12-27 04:55:49', '2023-12-27 04:55:49', '10009969951703674549_master_course_category.png', '000000', NULL, NULL, NULL),
(61, 'master_course', 'Branding & Marketing', 'branding-marketing', 0, 0, 1, 2, '2023-12-27 04:56:17', '2023-12-27 04:56:17', '7539494281703674577_master_course_category.png', '000000', NULL, NULL, NULL),
(62, 'blog', 'News', 'news', 0, 0, 1, NULL, '2023-12-28 05:31:23', '2023-12-28 05:31:23', NULL, NULL, NULL, NULL, NULL),
(63, 'home', 'Blog Sub Category', 'blog-sub-category', 62, 0, 1, NULL, '2023-12-28 05:34:07', '2023-12-28 05:34:07', NULL, NULL, NULL, NULL, NULL),
(64, 'blog', 'International', 'international', 0, 0, 1, NULL, '2023-12-29 22:08:42', '2023-12-29 22:08:42', NULL, NULL, NULL, NULL, NULL),
(65, 'ebook', 'Book', 'book', 0, 0, 1, NULL, '2024-01-24 23:26:22', '2024-01-24 23:26:22', NULL, NULL, NULL, NULL, NULL),
(66, 'home', 'Ebook Sub', 'ebook-sub', 65, 0, 1, NULL, '2024-01-24 23:26:43', '2024-01-24 23:26:43', NULL, NULL, NULL, NULL, NULL),
(67, 'home', 'Development', 'development', 0, 0, 1, NULL, '2024-02-19 12:25:46', '2024-02-19 12:25:46', NULL, NULL, NULL, '<p>This is development category. Thank you.</p>', '1635219781708327546.webp'),
(70, 'home', 'Anatomy', 'anatomy', 68, 0, 1, NULL, '2024-02-19 12:27:58', '2024-02-19 12:27:58', NULL, NULL, NULL, '<p>rfgfgfgfgfg</p>', '7463822151708327678.png'),
(71, 'home', 'Pathology', 'pathology', 68, 0, 1, NULL, '2024-02-19 12:28:31', '2024-02-19 12:28:31', NULL, NULL, NULL, '<p>dssdddd</p>', '11345766061708327711.png'),
(72, 'home', 'PART A', 'part-a', 68, 0, 1, NULL, '2024-02-26 15:27:30', '2024-02-26 15:27:30', NULL, NULL, NULL, '<p>DASDASDSA</p>', '16920525021708943250.jpg'),
(73, 'home', 'PART B OSCE', 'part-b-osce', 68, 0, 1, NULL, '2024-02-26 15:28:05', '2024-02-26 15:28:05', NULL, NULL, NULL, '<p>SDASD</p>', '21257215081708943285.jpg'),
(74, 'home', 'MRCS UK', 'mrcs-uk', 0, 0, 1, NULL, '2024-02-26 15:39:05', '2024-02-26 15:39:05', NULL, NULL, NULL, '<p>CATEGORY&nbsp;</p>', '3844044331708943945.jpg'),
(75, 'home', 'PART A', 'part-a-2', 74, 0, 1, NULL, '2024-02-26 15:54:50', '2024-02-26 15:54:50', NULL, NULL, NULL, '<p>PART A CONSISTS OF PAPER I &amp; PAPER II</p>', '10694330711708944890.png'),
(76, 'home', 'PART B OSCE', 'part-b-osce-2', 74, 0, 1, NULL, '2024-02-26 15:55:57', '2024-02-26 15:55:57', NULL, NULL, NULL, '<p>PART B CONISISTS OF KNOWLEDGE &amp; SKILL</p>', NULL),
(77, 'home', 'MRCP', 'mrcp', 0, 0, 1, NULL, '2024-02-26 16:06:06', '2024-02-26 16:06:06', NULL, NULL, NULL, '<h6 style=\"text-align: left;\">MRCP HOLO BLAH BLAH. </h6><h1 style=\"text-align: left;\"><span style=\"background-color: rgb(0, 255, 0);\">GOOD LUCK</span></h1>', '12602587021708945566.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE IF NOT EXISTS `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `certificates_name` varchar(255) DEFAULT NULL,
  `certificates_file` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `continent_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`, `continent_id`, `country_id`, `state_id`) VALUES
(3, 'Sirajganj', '12916412331709977808_city_image.jpg', 1, '2023-10-18 03:05:52', '2024-03-09 03:50:08', 1, 1, 3),
(4, 'Dhanmondi', '17674510931709977820_city_image.jpg', 1, '2023-10-18 03:41:24', '2024-03-09 03:50:20', 3, 4, 1),
(5, 'Nawabganj', '20556588361709977839_city_image.jpg', 1, '2023-10-22 00:28:32', '2024-03-09 03:50:39', 1, 1, 3),
(6, 'Natore', '18573339211709977867_city_image.jpg', 1, '2023-10-22 00:29:07', '2024-03-09 03:51:07', 1, 1, 3),
(7, 'Pabna', '2186238591709977878_city_image.jpg', 1, '2023-10-22 00:29:26', '2024-03-09 03:51:18', 1, 1, 3),
(8, 'Bogra', '8086517851709977889_city_image.jpg', 1, '2023-10-22 00:30:00', '2024-03-09 03:51:29', 1, 1, 3),
(9, 'Rajshahi', '5095350111709977899_city_image.jpg', 1, '2023-10-22 00:30:45', '2024-03-09 03:51:39', 1, 1, 3),
(10, 'Joypurhat', '12054071051709977909_city_image.jpg', 1, '2023-10-22 00:31:20', '2024-03-09 03:51:49', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `gargent_policy` longtext DEFAULT NULL,
  `daily_class_details` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_teacher_id`, `name`, `image`, `details`, `gargent_policy`, `daily_class_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 176, 'Class 1', '15525235741716454114.jpg', '<p><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 1, '2024-05-08 23:19:07', '2024-06-05 23:21:05'),
(4, 177, 'class-2', '1987095921716454126.jpg', NULL, NULL, NULL, 1, '2024-05-11 01:56:26', '2024-05-23 02:48:46'),
(5, 184, 'class-3', '1817080721716454136.jpg', NULL, NULL, NULL, 1, '2024-05-11 01:56:44', '2024-05-23 02:48:56'),
(6, 186, 'class-4', '18560990071716454146.jpg', NULL, NULL, NULL, 1, '2024-05-11 01:57:03', '2024-05-23 02:49:06'),
(7, 184, 'Class 5', '19051519531716454155.jpg', NULL, NULL, NULL, 1, '2024-05-16 01:42:13', '2024-05-23 02:49:15'),
(8, 191, 'Class 6', '18217281251716454169.jpg', NULL, NULL, NULL, 1, '2024-05-16 01:42:24', '2024-05-23 02:49:29'),
(9, 184, 'Class 7', '11501245371716454181.jpg', NULL, NULL, NULL, 1, '2024-05-16 01:42:36', '2024-05-23 02:49:41'),
(10, 184, 'Class 8', NULL, NULL, NULL, NULL, 1, '2024-05-16 01:42:49', '2024-05-16 01:42:49'),
(11, 182, 'Class 9', NULL, NULL, NULL, NULL, 1, '2024-05-16 01:43:03', '2024-05-16 01:43:03'),
(12, 191, 'Class 10', NULL, NULL, NULL, NULL, 1, '2024-05-16 01:43:17', '2024-05-16 01:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `class_durations`
--

CREATE TABLE IF NOT EXISTS `class_durations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_durations`
--

INSERT INTO `class_durations` (`id`, `name`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, '1st period', '09:00', '09:30', 1, '2024-05-14 02:13:31', '2024-05-14 02:22:45'),
(2, '2nd period', '09:30', '10:00', 1, '2024-05-14 02:15:30', '2024-05-14 02:23:08'),
(3, '3rd period', '10:00', '10:30', 1, '2024-05-14 02:17:49', '2024-05-14 03:02:54'),
(4, '4 th period', '10:30', '11:00', 1, '2024-05-14 02:25:01', '2024-05-14 03:03:02'),
(5, '5 th period', '11:00', '11:30', 1, '2024-05-14 03:03:27', '2024-05-14 03:03:56'),
(6, '6 th period', '11:30', '00:00', 1, '2024-05-14 03:04:18', '2024-05-14 03:04:18'),
(7, '7 th period', '00:00', '00:30', 1, '2024-05-14 03:04:50', '2024-05-14 03:04:50'),
(8, '8 th period', '00:30', '13:00', 1, '2024-05-14 03:05:30', '2024-05-14 03:05:47'),
(9, '9th period Brack', '13:00', '14:00', 1, '2024-05-16 00:52:30', '2024-06-08 05:20:57'),
(10, '10th period', '14:00', '14:30', 1, '2024-05-16 00:53:44', '2024-06-08 05:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `class_routines`
--

CREATE TABLE IF NOT EXISTS `class_routines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `room_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_duration_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `day_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_type` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_routines`
--

INSERT INTO `class_routines` (`id`, `class_id`, `session_id`, `section_id`, `subject_id`, `teacher_id`, `room_id`, `class_duration_id`, `day_id`, `class_type`, `status`, `created_at`, `updated_at`) VALUES
(10, 1, 6, 1, 1, 176, 2, 1, 1, 0, 1, '2024-05-16 03:26:47', '2024-05-25 22:14:33'),
(11, 1, 6, 1, 3, 177, 2, 2, 1, 0, 1, '2024-05-16 03:49:45', '2024-05-25 22:14:55'),
(12, 1, 6, 1, 4, 186, 1, 3, 1, 0, 1, '2024-05-16 03:56:49', '2024-05-25 21:06:40'),
(13, 1, 6, 1, 1, 176, 1, 1, 2, 0, 1, '2024-05-16 03:58:19', '2024-05-16 03:58:19'),
(14, 1, 6, 1, 3, 178, 1, 2, 2, 0, 1, '2024-05-16 03:58:56', '2024-05-16 03:58:56'),
(15, 1, 6, 1, 4, 186, 2, 3, 2, 0, 1, '2024-05-16 03:59:25', '2024-05-16 03:59:25'),
(16, 1, 6, 1, 1, 186, 1, 1, 3, 0, 1, '2024-05-16 03:59:53', '2024-05-25 21:07:33'),
(17, 1, 6, 1, 3, 182, 1, 2, 3, 0, 1, '2024-05-16 04:00:12', '2024-05-16 04:00:12'),
(18, 1, 6, 1, 4, 176, 1, 3, 3, 0, 1, '2024-05-16 04:00:37', '2024-05-16 04:00:37'),
(19, 1, 6, 1, 1, 178, 1, 1, 4, 0, 1, '2024-05-16 04:01:43', '2024-05-16 04:01:43'),
(20, 1, 6, 1, 3, 186, 1, 2, 4, 0, 1, '2024-05-16 04:02:05', '2024-05-25 21:08:32'),
(21, 1, 6, 1, 4, 284, 2, 3, 4, 0, 1, '2024-05-16 04:02:29', '2024-05-16 04:02:29'),
(22, 1, 6, 1, 1, 178, 2, 1, 5, 0, 1, '2024-05-16 04:06:59', '2024-05-16 04:06:59'),
(23, 1, 6, 1, 3, 191, 2, 2, 5, 0, 1, '2024-05-16 04:07:35', '2024-05-16 04:07:35'),
(27, 1, 7, 1, 3, 176, 2, 2, 2, 0, 1, '2024-05-18 04:42:00', '2024-05-18 04:42:00'),
(29, 1, 6, 1, 4, 186, 2, 3, 5, 0, 1, '2024-05-18 06:06:15', '2024-05-25 21:08:53'),
(30, 1, 6, 1, 1, 178, 1, 1, 7, 0, 1, '2024-05-20 05:24:26', '2024-05-20 05:24:26'),
(32, 1, 6, 1, 4, 175, 1, 4, 1, 0, 1, '2024-05-25 01:19:42', '2024-05-25 01:19:42'),
(33, 1, 6, 1, 12, 176, 1, 5, 1, 0, 1, '2024-05-25 01:26:11', '2024-05-25 01:26:11'),
(35, 1, 6, 1, 12, 176, 1, 4, 2, 0, 1, '2024-05-25 01:27:42', '2024-05-25 01:27:42'),
(36, 1, 6, 1, 4, 178, 3, 2, 7, 0, 1, '2024-05-25 01:29:16', '2024-05-25 01:29:16'),
(37, 1, 6, 1, 3, 175, 1, 3, 7, 0, 1, '2024-05-25 01:36:33', '2024-05-25 01:36:33'),
(38, 1, 6, 1, 4, 177, 3, 4, 4, 0, 1, '2024-05-25 01:37:36', '2024-05-25 01:37:36'),
(39, 12, 6, 7, 8, 175, 1, 1, 1, 0, 1, '2024-05-25 01:41:08', '2024-05-25 01:41:08'),
(40, 12, 6, 7, 9, 176, 2, 2, 1, 0, 1, '2024-05-25 01:41:30', '2024-05-25 01:41:30'),
(41, 1, 6, 1, 1, 175, 1, 5, 7, 0, 1, '2024-05-25 01:50:37', '2024-05-25 01:50:37'),
(42, 1, 6, 1, 3, 175, 3, 5, 6, 0, 1, '2024-05-25 01:53:42', '2024-05-25 01:53:42'),
(43, 1, 6, 1, 1, 176, 1, 5, 5, 0, 1, '2024-05-25 01:55:18', '2024-05-25 01:55:18'),
(44, 1, 6, 1, 3, 176, 2, 6, 2, 0, 1, '2024-05-25 02:44:24', '2024-05-25 02:44:24'),
(45, 1, 6, 2, 1, 178, 1, 1, 1, 0, 1, '2024-05-25 23:54:29', '2024-05-25 23:54:29'),
(46, 1, 6, 2, 3, 178, 2, 2, 1, 0, 1, '2024-05-26 00:10:31', '2024-05-26 00:10:31'),
(47, 1, 6, 6, 1, 178, 1, 1, 1, 0, 1, '2024-05-26 00:11:54', '2024-05-26 00:11:54'),
(48, 1, 6, 1, 3, 186, 2, 7, 1, 0, 1, '2024-05-26 06:19:45', '2024-05-26 06:19:45'),
(49, 1, 6, 1, 13, 175, 2, 8, 1, 0, 1, '2024-05-26 21:11:50', '2024-05-26 21:11:50'),
(50, 1, 6, 1, 3, 177, 3, 8, 7, 0, 1, '2024-05-28 21:17:45', '2024-05-28 21:17:45'),
(51, 1, 6, 1, 4, 182, 2, 8, 2, 0, 1, '2024-05-28 21:19:15', '2024-05-28 21:19:15'),
(53, 1, 6, 1, 0, 0, 0, 9, 1, 0, 1, '2024-05-28 21:33:58', '2024-05-28 21:33:58'),
(54, 12, 6, 7, 8, 186, 2, 1, 1, 0, 1, '2024-05-28 22:56:40', '2024-06-05 23:53:14'),
(55, 1, 6, 1, 3, 186, 2, 6, 1, 0, 1, '2024-06-08 04:53:19', '2024-06-08 04:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine_items`
--

CREATE TABLE IF NOT EXISTS `class_routine_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_routine_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `day_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `room_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `bulding_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `floor_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `class_duration_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_test`
--

CREATE TABLE IF NOT EXISTS `class_test` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classId` varchar(255) DEFAULT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_test`
--

INSERT INTO `class_test` (`id`, `classId`, `subjectName`, `image`, `details`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'class 1', 'English', '202302010746app820.png', NULL, '4hr', NULL, NULL),
(2, 'class 2', 'English', '202302020808bangla.png', 'hdfjskd', '45min', NULL, NULL),
(3, 'class 1', 'Math', '202401111552353030956_599704045696757_7804263813995999009_n - Copy.jpg', 'Math', '2 hours', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_test_exams`
--

CREATE TABLE IF NOT EXISTS `class_test_exams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `lession_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `page_number` varchar(255) DEFAULT NULL,
  `class_exampdf` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `class_test_duration` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_test_exams`
--

INSERT INTO `class_test_exams` (`id`, `name`, `teacher_id`, `class_id`, `subject_id`, `section_id`, `session_id`, `lession_id`, `page_number`, `class_exampdf`, `date`, `class_test_duration`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'shohag', 186, 1, 1, 1, 6, 1, '2,3', '12550525241717914216.pdf', '2024-06-10', '13:23', 'gfh', 1, '2024-06-09 00:23:36', '2024-06-09 00:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `link`, `description`, `image`, `category_id`, `status`, `position`, `created_at`, `updated_at`) VALUES
(10, 'Advance', 'https://facebook.com', NULL, '18244335301702897483.png', 0, 1, 99, '2023-12-18 05:04:43', '2023-12-18 05:04:43'),
(11, 'Advance', 'https://www.google.com/', NULL, '2316732621702897495.png', 0, 1, 99, '2023-12-18 05:04:55', '2023-12-18 05:04:55'),
(12, 'Niaz Ahmed Nayeem', 'https://www.google.com/', NULL, '9455432461702897510.png', 0, 1, 99, '2023-12-18 05:05:10', '2023-12-18 05:05:10'),
(13, 'Advance', 'https://facebook.com', NULL, '579730211702897816.png', 0, 1, 99, '2023-12-18 05:10:16', '2023-12-18 05:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_blog_id_foreign` (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `content`, `created_at`, `updated_at`) VALUES
(8, 174, 27, 'Wow, nice blog, I really Like this type of blog..sdfdsfdsafsf ss', '2023-12-29 21:32:08', '2024-01-15 23:39:09'),
(9, 174, 28, 'Hi', '2024-01-01 04:36:23', '2024-01-01 04:36:23'),
(10, 174, 28, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum,asdfdsfdsafffffffffffffffffffffffffff', '2024-01-01 04:40:55', '2024-01-15 01:43:27'),
(11, 174, 28, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', '2024-01-01 05:05:34', '2024-01-01 05:05:34'),
(12, 174, 28, 'sfdsfsdf', '2024-01-01 05:06:29', '2024-01-01 05:06:29'),
(13, 174, 28, 'fsdafsf', '2024-01-01 05:06:51', '2024-01-01 05:06:51'),
(14, 174, 29, 'Wow nice', '2024-01-01 21:21:01', '2024-01-01 21:21:01'),
(15, 174, 29, 'hi', '2024-01-01 21:21:37', '2024-01-01 21:21:37'),
(16, 174, 29, 'bal', '2024-01-01 21:26:55', '2024-01-01 21:26:55'),
(17, 174, 23, 'hi', '2024-01-01 21:44:08', '2024-01-01 21:44:08'),
(18, 174, 23, 'hello', '2024-01-01 21:46:52', '2024-01-01 21:46:52'),
(19, 220, 41, 'nice blog', '2024-01-22 00:03:39', '2024-01-22 00:03:39'),
(20, 258, 28, 'uifsdfdsf', '2024-01-28 22:55:54', '2024-01-28 22:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE IF NOT EXISTS `continents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asia', '18320074021709977500_continent_image.jpg', 1, '2023-10-17 23:04:02', '2024-03-09 03:45:00'),
(3, 'South America', '14021568241709977512_continent_image.jpg', 1, '2023-10-17 23:06:57', '2024-03-09 03:45:12'),
(4, 'Africa', '1576212641709977525_continent_image.jpg', 1, '2023-10-19 01:13:58', '2024-03-09 03:45:25'),
(5, 'Europe', '18539830271709977536_continent_image.jpg', 1, '2023-10-19 01:14:19', '2024-03-09 03:45:36'),
(6, 'Australia', '20641775661709977557_continent_image.jpg', 1, '2023-10-19 01:14:40', '2024-03-09 03:45:57'),
(7, 'North America', '11493833911709977568_continent_image.jpg', 1, '2023-10-19 01:14:58', '2024-03-09 03:46:08'),
(8, 'Antarctica', '9103924841709977585_continent_image.jpg', 1, '2023-10-19 01:15:28', '2024-03-09 03:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `continent_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`, `continent_id`) VALUES
(1, 'Bangladesh', '18855668941709977633_country_image.jpg', 1, '2023-10-17 22:06:03', '2024-03-09 03:47:13', 1),
(3, 'India', '12312843631709977641_country_image.jpg', 1, '2023-10-17 23:42:42', '2024-03-09 03:47:21', 1),
(4, 'BD', '12699130981709977650_country_image.jpg', 1, '2023-10-18 00:11:38', '2024-03-09 03:47:30', 3),
(5, 'China', '4362421951709977660_country_image.jpg', 1, '2023-10-22 00:23:27', '2024-03-09 03:47:40', 1),
(6, 'Indonesia', '11368974861709977672_country_image.jpg', 1, '2023-10-22 00:23:46', '2024-03-09 03:47:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '35420', 1, 12.00, 1, '2024-01-30 11:43:40', '2024-01-30 11:59:39'),
(2, '354222', 0, 10.00, 1, '2024-01-30 12:28:09', '2024-01-30 12:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(11) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(11) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(11) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `coursetype` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fee` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `discounttype` int(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `course_hours` varchar(255) DEFAULT NULL,
  `course_level` varchar(255) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `startdate` varchar(11) DEFAULT NULL,
  `enddate` varchar(255) DEFAULT NULL,
  `speaker` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `is_master` int(11) NOT NULL DEFAULT 0,
  `trailer_video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pro_child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tuition_fee` bigint(20) UNSIGNED DEFAULT NULL,
  `semester_fee` bigint(20) UNSIGNED DEFAULT NULL,
  `year_fee` bigint(20) UNSIGNED DEFAULT NULL,
  `course_duration` bigint(20) UNSIGNED DEFAULT NULL,
  `next_start_date` varchar(100) DEFAULT NULL,
  `application_deadline` varchar(100) DEFAULT NULL,
  `admission_process` longtext DEFAULT NULL,
  `accommodation` longtext DEFAULT NULL,
  `introduction` longtext DEFAULT NULL,
  `consultancy_fee` varchar(100) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `sub_category_id`, `teacher_id`, `language_id`, `type_id`, `coursetype`, `name`, `subject`, `image`, `fee`, `discount`, `discounttype`, `organization_name`, `course_hours`, `course_level`, `about`, `status`, `startdate`, `enddate`, `speaker`, `session`, `day`, `is_master`, `trailer_video_url`, `created_at`, `updated_at`, `type`, `child_category_id`, `pro_child_category_id`, `department_id`, `degree_id`, `university_id`, `section_id`, `tuition_fee`, `semester_fee`, `year_fee`, `course_duration`, `next_start_date`, `application_deadline`, `admission_process`, `accommodation`, `introduction`, `consultancy_fee`, `views`) VALUES
(1, 48, 51, 176, NULL, NULL, 1, 'Fast Track Spoken English & Fluency', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-03-09 21:42:00', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 48, 51, 177, NULL, NULL, 1, 'English for IBA-MBA Admission Preparation', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-07 23:10:19', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 49, 54, 178, NULL, NULL, 1, 'Technology in Leadership', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-07 23:10:07', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 48, 52, 186, NULL, NULL, 2, 'Digital Marketing Masterclass', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-07 23:09:56', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 50, 57, 184, NULL, NULL, 1, 'ToT for Innovative Teaching', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-04 22:19:44', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 50, 57, 184, NULL, NULL, 1, 'Proficiency in Effective Business Meetings', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-05-29 01:06:29', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 49, 55, 175, NULL, NULL, 1, 'Time Management for Best Productivity', '', NULL, 3000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-05-29 01:06:17', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 49, 54, 182, NULL, NULL, 1, 'Leadership for First Line Managers', '', NULL, 7000.00, 1000.00, 1, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-05-29 01:06:05', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 48, 53, 175, NULL, NULL, 1, 'Fast Track Spoken English & Fluency', 'Practical Accounting Learning for Finance & Non-Finance Professionals', NULL, 4000.00, 500.00, 1, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-03-09 22:08:20', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 48, 52, 184, NULL, NULL, 0, 'Stock Market Investment: How to Earn by Investing', '', NULL, 3000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-05 08:05:29', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, 60, 0, 184, NULL, NULL, 0, 'Teaches Strategic Branding & Visioning', NULL, NULL, 1000.00, 10.00, 0, 'Navieasoft', '12', 'level', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', 1, NULL, NULL, NULL, NULL, NULL, 1, 'https://www.youtube.com/watch?v=O4BwvpVJ17k', '2024-01-08 00:18:37', '2024-01-08 00:18:37', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, 61, 0, 177, NULL, NULL, 0, 'Teaches Strategic Financial Leadership', NULL, NULL, 5500.00, 10.00, 0, 'Navieasoft', '12', 'level', '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br></p>', 1, NULL, NULL, NULL, NULL, NULL, 1, 'https://www.youtube.com/watch?v=O4BwvpVJ17k', '2024-01-08 00:21:01', '2024-01-08 00:22:34', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, 48, 51, NULL, 64, NULL, 1, 'Computer science and engineering', NULL, NULL, NULL, 10.00, 0, 'Navieasoft', NULL, NULL, '<p>vds&nbsp; fvsdrf dsf&nbsp;</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, 'https://www.youtube.com/watch?v=O4BwvpVJ17k', '2024-03-09 03:15:03', '2024-03-09 04:20:41', 'university', 0, 0, 2, 5, 15, 2, 10000, 1000, 10000, 4, '2024-03-07', '2024-03-30', '', '', '<p>ds fcdsf s&nbsp;</p>', '100', 0),
(23, 48, 51, NULL, 64, NULL, 1, 'Bachelor’s in Chinese BLCC + USTB Scholarship Program (1+3)', NULL, NULL, NULL, 10.00, 0, 'navieasoft limited', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, 0, 'sadfa', '2024-03-09 04:21:47', '2024-03-09 04:21:47', 'university', 0, 0, 5, 4, 15, 4, 100, 1000, 2000, 5, '2024-03-19', '2024-03-30', '', '', '', '1000', 0),
(24, 49, 55, NULL, 63, NULL, 1, 'Bachelor’s in Chinese BLCC + USTB Scholarship Program (1+3)', NULL, NULL, NULL, 33.00, 0, 'navieasoft limited', NULL, NULL, '<p>werewr</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, 'https://www.youtube.com/watch?v=gDUzaANQ01A', '2024-03-09 05:24:55', '2024-03-09 05:24:55', 'university', 0, 0, 6, 7, 13, 4, 33333, 3333, 3333, 5, '2024-03-20', '2024-04-05', '', '', '<p>werewrwrwer</p>', '333', 0),
(25, 50, 56, NULL, 63, NULL, 1, 'Bachelor’s in Chinese BLCC + USTB Scholarshi-1p Program (1+3)', NULL, NULL, NULL, 56.00, 1, 'navieasoft limited', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-03-09 05:46:02', '2024-03-09 05:46:02', 'university', 0, 0, 2, 5, 15, 2, 667, 676, 6765, 5, '2024-03-11', '2024-03-23', '', '', '', '676', 0),
(26, 49, 54, NULL, 64, NULL, 1, 'Bachelor’s in Chinese BLCC -1', NULL, NULL, NULL, 10.00, 0, 'navieasoft limited', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-03-09 06:04:19', '2024-03-09 06:04:19', 'university', 0, 0, 2, 5, 15, 1, 100, 10, 200, 5, '2024-03-20', '2024-03-14', '', '', '', '1000', 0),
(27, 48, 51, NULL, 64, NULL, 1, 'Bachelor’s in Chinese', NULL, NULL, NULL, 10.00, 1, 'navieasoft limited', NULL, NULL, '<p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 0.5em; font-family: Lato, sans-serif; color: rgb(51, 51, 51); font-size: 16px;\">Beijing University of Technology (BJUT) is a prominent public research university located in Beijing, China. Established in 1960, BJUT has evolved into a comprehensive institution offering a wide range of undergraduate and postgraduate programs across various disciplines. As a key player in the Chinese higher education landscape, BJUT is known for its commitment to technological innovation and practical application of knowledge. The university places a strong emphasis on engineering, while also excelling in fields such as business, management, and the arts.</p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 0.5em; font-family: Lato, sans-serif; color: rgb(51, 51, 51); font-size: 16px;\">While specific rankings may vary, BJUT consistently earns recognition for its contributions to research and academic excellence both nationally and internationally. The university\'s dedication to fostering a dynamic learning environment, coupled with its cutting-edge research initiatives, has contributed to its standing as a respected institution within China and beyond.</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, 'https://www.youtube.com/watch?v=gDUzaANQ01A', '2024-03-09 23:46:18', '2024-03-10 00:36:47', 'university', 0, 0, 6, 7, 13, 1, 3000, 1000, 10000, 5, '2024-03-10', '2024-03-31', '', '', '<p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 0.5em; font-family: Lato, sans-serif; color: rgb(51, 51, 51); font-size: 16px;\">Beijing University of Technology (BJUT) is a prominent public research university located in Beijing, China. Established in 1960, BJUT has evolved into a comprehensive institution offering a wide range of undergraduate and postgraduate programs across various disciplines. As a key player in the Chinese higher education landscape, BJUT is known for its commitment to technological innovation and practical application of knowledge. The university places a strong emphasis on engineering, while also excelling in fields such as business, management, and the arts.</p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 0.5em; font-family: Lato, sans-serif; color: rgb(51, 51, 51); font-size: 16px;\">While specific rankings may vary, BJUT consistently earns recognition for its contributions to research and academic excellence both nationally and internationally. The university\'s dedication to fostering a dynamic learning environment, coupled with its cutting-edge research initiatives, has contributed to its standing as a respected institution within China and beyond.</p>', '1000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `coursezproject_files`
--

CREATE TABLE IF NOT EXISTS `coursezproject_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coursezproject_files`
--

INSERT INTO `coursezproject_files` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '17044261710projectfile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, '17044261711projectfile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 10, '17044265870projectfile.sql', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(4, 9, '17044277400projectfile.sql', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(5, 8, '17044279220projectfile.sql', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(6, 7, '17044280710projectfile.sql', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(7, 6, '17044282290projectfile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(8, 5, '17044283840projectfile.sql', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(9, 4, '17044285570projectfile.sql', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(10, 2, '17044290110projectfile.sql', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(11, 3, '17044291400projectfile.sql', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(12, 14, '17048809050projectfile.likes.sql', 1, '2024-01-10 04:01:45', '2024-01-10 04:01:45'),
(13, 15, '17079745520projectfile.pdf', 1, '2024-02-15 10:22:32', '2024-02-15 10:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_career_outcomes`
--

CREATE TABLE IF NOT EXISTS `course_career_outcomes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_career_outcomes`
--

INSERT INTO `course_career_outcomes` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Enhanced Job Prospects', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, 'Verbal Skills Trainer', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 1, 'GRE Communication Expert', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(4, 1, 'Strategic Interpreter', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(5, 10, 'Verbal Skills Trainer', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(7, 10, 'GRE Communication Expert', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(8, 10, 'Strategic Interpreter', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(10, 10, 'GRE Communication Expert', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(12, 10, 'Enhanced Job Prospects', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(13, 9, 'Enhanced Job Prospects', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(14, 9, 'Verbal Skills Trainer', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(15, 9, 'GRE Communication Expert', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(16, 9, 'Strategic Interpreter', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(17, 8, 'Verbal Skills Trainer', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(18, 8, 'Enhanced Job Prospects', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(19, 8, 'GRE Communication Expert', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(20, 8, 'Strategic Interpreter', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(21, 7, 'Enhanced Job Prospects', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(22, 7, 'Verbal Skills Trainer', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(23, 7, 'GRE Communication Expert', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(24, 7, 'Strategic Interpreter', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(25, 6, 'fgdhd', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(26, 6, 'Verbal Skills Trainer', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(27, 6, 'GRE Communication Expert', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(28, 6, 'Strategic Interpreter', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(29, 5, 'Enhanced Job Prospects', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(30, 5, 'GRE Communication Expert', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(31, 5, 'Strategic Interpreter', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(32, 4, 'GRE Communication Expert', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(33, 4, 'Enhanced Job Prospects', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(34, 4, 'Strategic Interpreter', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(35, 2, 'Verbal Skills Trainer', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(36, 2, 'Verbal Skills Trainer', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(37, 2, 'Strategic Interpreter', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(38, 3, 'Enhanced Job Prospects', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(39, 3, 'Verbal Skills Trainer', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(40, 3, 'Strategic Interpreter', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(41, 11, NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(42, 12, NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01'),
(52, 27, 'Verbal Skills Trainer', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(53, 27, 'Enhanced Job Prospects', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(54, 27, 'Strategic Interpreter', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `course_contens`
--

CREATE TABLE IF NOT EXISTS `course_contens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `conten_url` varchar(255) DEFAULT NULL,
  `conten_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_contens`
--

INSERT INTO `course_contens` (`id`, `course_id`, `name`, `conten_url`, `conten_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 10, NULL, NULL, NULL, 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(3, 9, NULL, NULL, NULL, 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(4, 8, NULL, NULL, NULL, 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(5, 7, NULL, NULL, NULL, 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(6, 6, NULL, NULL, NULL, 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(7, 5, NULL, NULL, NULL, 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(8, 4, NULL, NULL, NULL, 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(9, 2, NULL, NULL, NULL, 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(10, 3, NULL, NULL, NULL, 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(11, 11, 'lessons 2', 'https://www.youtube.com/watch?v=PYcWwIuLGN8', NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(12, 11, 'lessons 1', 'https://www.youtube.com/watch?v=O4BwvpVJ17k', NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(13, 12, 'lessons 1', 'https://www.youtube.com/watch?v=O4BwvpVJ17k', NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01'),
(14, 12, 'lessons 2', 'https://www.youtube.com/watch?v=PYcWwIuLGN8', NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_languages`
--

CREATE TABLE IF NOT EXISTS `course_languages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(11) UNSIGNED DEFAULT NULL,
  `languagetype` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_languages`
--

INSERT INTO `course_languages` (`id`, `name`, `status`, `created_at`, `updated_at`, `course_id`, `languagetype`, `type`) VALUES
(24, 'Bangla', 1, '2024-01-05 08:05:29', '2024-01-05 08:05:29', 10, NULL, 'course'),
(32, 'English', 1, '2024-01-05 08:08:04', '2024-01-05 08:08:04', 5, NULL, 'course'),
(33, 'Bangla', 1, '2024-01-05 08:08:04', '2024-01-05 08:08:04', 5, NULL, 'course'),
(38, 'Bangla', 1, '2024-01-07 23:09:56', '2024-01-07 23:09:56', 4, NULL, 'course'),
(39, 'English', 1, '2024-01-07 23:09:56', '2024-01-07 23:09:56', 4, NULL, 'course'),
(40, 'Bangla', 1, '2024-01-07 23:10:07', '2024-01-07 23:10:07', 3, NULL, 'course'),
(41, 'English', 1, '2024-01-07 23:10:07', '2024-01-07 23:10:07', 3, NULL, 'course'),
(42, 'Bangla', 1, '2024-01-07 23:10:19', '2024-01-07 23:10:19', 2, NULL, 'course'),
(43, 'English', 1, '2024-01-07 23:10:19', '2024-01-07 23:10:19', 2, NULL, 'course'),
(44, 'english', 1, '2024-01-08 00:18:37', '2024-01-08 00:18:37', 11, NULL, 'course'),
(51, 'bangla', 1, '2024-01-08 00:22:34', '2024-01-08 00:22:34', 12, NULL, 'course'),
(52, 'english', 1, '2024-01-08 00:22:34', '2024-01-08 00:22:34', 12, NULL, 'course'),
(63, 'Bangla', 1, '2024-03-09 04:19:58', '2024-03-09 04:19:58', NULL, NULL, 'university'),
(64, 'English', 1, '2024-03-09 04:20:09', '2024-03-09 04:20:09', NULL, NULL, 'university'),
(65, 'Bangla', 1, '2024-03-09 21:42:00', '2024-03-09 21:42:00', 1, NULL, 'course'),
(66, 'English', 1, '2024-03-09 21:42:00', '2024-03-09 21:42:00', 1, NULL, 'course'),
(67, 'Bangla', 1, '2024-03-09 22:08:20', '2024-03-09 22:08:20', 9, NULL, 'course'),
(68, 'English', 1, '2024-03-09 22:08:20', '2024-03-09 22:08:20', 9, NULL, 'course'),
(69, 'Bangla', 1, '2024-05-29 01:06:05', '2024-05-29 01:06:05', 8, NULL, 'course'),
(70, 'English', 1, '2024-05-29 01:06:05', '2024-05-29 01:06:05', 8, NULL, 'course'),
(71, 'Bangla', 1, '2024-05-29 01:06:17', '2024-05-29 01:06:17', 7, NULL, 'course'),
(72, 'Bangla', 1, '2024-05-29 01:06:29', '2024-05-29 01:06:29', 6, NULL, 'course'),
(73, 'English', 1, '2024-05-29 01:06:29', '2024-05-29 01:06:29', 6, NULL, 'course');

-- --------------------------------------------------------

--
-- Table structure for table `course_learns`
--

CREATE TABLE IF NOT EXISTS `course_learns` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(11) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_learns`
--

INSERT INTO `course_learns` (`id`, `course_id`, `event_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Effective Verbal Communication', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 1, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(4, 1, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(5, 1, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(6, 10, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:04:46', '2024-01-04 22:04:46'),
(7, 10, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:04:46', '2024-01-04 22:04:46'),
(8, 10, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:04:46', '2024-01-04 22:04:46'),
(9, 10, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:04:46', '2024-01-04 22:04:46'),
(10, 9, NULL, 'Effective Verbal Communication', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(11, 9, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(12, 9, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(13, 9, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(14, 8, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(15, 8, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(16, 8, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(17, 8, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(18, 7, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(19, 7, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(20, 7, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(21, 7, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(22, 6, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(23, 6, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(24, 6, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(25, 6, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(26, 5, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(27, 5, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(28, 5, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(29, 5, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(30, 4, NULL, 'Effective Verbal Communication', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(31, 4, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(32, 4, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(33, 4, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(34, 2, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(35, 2, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(36, 2, NULL, 'Effective Verbal Communication', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(37, 2, NULL, 'Strategic Test-Taking Proficiency', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(38, 3, NULL, 'Effective Verbal Communication', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(39, 3, NULL, 'Enhanced Confidence in GRE Skills', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(40, 3, NULL, 'Quantitative Precision in Math', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(41, 3, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(42, NULL, 1, 'Movie Landing Page using Bootstrap', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(43, NULL, 1, 'Blog Website using Bootstrap', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(44, NULL, 1, 'Bootstrap 5 Components', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(45, NULL, 1, 'Git, GitHub, and GitHub Hosting', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(46, NULL, 1, 'Portfolio Website Project', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(47, NULL, 1, 'CSS3', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(48, NULL, 1, 'HTML5', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(49, NULL, 1, 'Fundamentals of HTML', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(50, NULL, 2, 'dsfdsf', 1, '2024-01-07 23:06:23', '2024-01-07 23:06:23'),
(51, 11, NULL, NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(52, 12, NULL, NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01'),
(62, 27, NULL, 'Effective Verbal Communication', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(63, 27, NULL, 'Refined Vocabulary Mastery', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(64, 27, NULL, 'Quantitative Precision in Math', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `course_lessons`
--

CREATE TABLE IF NOT EXISTS `course_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `capter_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lessons`
--

INSERT INTO `course_lessons` (`id`, `course_id`, `capter_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pronunciation and Phonetics', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, 'Course Overview', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 10, 'Course Overview', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(4, 9, 'Course Overview', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(5, 8, 'Course Overview', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(6, 7, 'Course Overview', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(7, 6, 'Pronunciation and Phonetics', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(8, 5, 'Course Overview', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(9, 4, 'Course Overview', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(10, 2, 'Course Overview', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(11, 3, 'Course Overview', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(12, 11, NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(13, 12, NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_lesson_files`
--

CREATE TABLE IF NOT EXISTS `course_lesson_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lesson_files`
--

INSERT INTO `course_lesson_files` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '17044261710lessonfile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, '17044261711lessonfile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 10, '17044265870lessonfile.sql', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(4, 9, '17044277400lessonfile.sql', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(5, 8, '17044279220lessonfile.sql', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(6, 7, '17044280710lessonfile.sql', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(7, 6, '17044282290lessonfile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(8, 6, '17044282291lessonfile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(9, 6, '17044282292lessonfile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(10, 5, '17044283840lessonfile.sql', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(11, 4, '17044285570lessonfile.sql', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(12, 2, '17044290110lessonfile.sql', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(13, 3, '17044291400lessonfile.sql', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(14, 14, '17048809050lessonfile.blogs.sql', 1, '2024-01-10 04:01:45', '2024-01-10 04:01:45'),
(15, 15, '17079745520lessonfile.pdf', 1, '2024-02-15 10:22:32', '2024-02-15 10:22:32'),
(16, 17, '17089442000lessonfile.Quot.pdf', 1, '2024-02-26 15:43:20', '2024-02-26 15:43:20'),
(17, 17, '17089442001lessonfile.Friendship.pdf', 1, '2024-02-26 15:43:20', '2024-02-26 15:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `course_lesson_videos`
--

CREATE TABLE IF NOT EXISTS `course_lesson_videos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lesson_name` varchar(255) DEFAULT NULL,
  `lesson_video` varchar(255) DEFAULT NULL,
  `video_time` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lesson_videos`
--

INSERT INTO `course_lesson_videos` (`id`, `course_lesson_id`, `lesson_name`, `lesson_video`, `video_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Text Completion-1`', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '04:12:32', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 1, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:12:32', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(4, 2, 'Introduction to our Quantitative Section', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:06:23', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(5, 3, 'Text Completion', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:04:00', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(6, 3, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(7, 4, 'Text Completion: Part 2', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(8, 4, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:04:00', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(9, 4, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(10, 5, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:04:00', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(11, 5, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(12, 6, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(13, 6, 'Text Completion', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(14, 6, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(15, 7, 'Text Completion: Part 2', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(16, 7, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(17, 8, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:04:00', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(18, 8, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(19, 9, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:04:00', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(20, 9, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(21, 10, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:04:00', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(22, 10, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(23, 11, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:05:00', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(24, 11, 'Arithmetic, Divisibility and Prime Number', 'https://www.youtube.com/watch?v=On2S5vv6oUI', '00:04:00', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(25, 12, NULL, 'https://', NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(26, 13, NULL, 'https://', NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_participants`
--

CREATE TABLE IF NOT EXISTS `course_participants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_participants`
--

INSERT INTO `course_participants` (`id`, `course_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 10, 258, 1, '2024-01-28 22:52:20', '2024-01-28 22:52:20'),
(12, 7, 258, 1, '2024-01-29 01:36:45', '2024-01-29 01:36:45'),
(13, 9, 178, 1, '2024-01-30 12:49:16', '2024-01-30 12:49:16'),
(14, 14, 277, 1, '2024-02-06 14:57:18', '2024-02-06 14:57:18'),
(15, 4, 276, 1, '2024-02-06 14:59:00', '2024-02-06 14:59:00'),
(16, 14, 276, 1, '2024-02-06 14:59:00', '2024-02-06 14:59:00'),
(17, 3, 276, 1, '2024-03-30 22:53:32', '2024-03-30 22:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_quiz_files`
--

CREATE TABLE IF NOT EXISTS `course_quiz_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_quiz_files`
--

INSERT INTO `course_quiz_files` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '17044261710quizfile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, '17044261711quizfile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 10, '17044265870quizfile.sql', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(4, 9, '17044277400quizfile.sql', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(5, 8, '17044279220quizfile.sql', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(6, 7, '17044280710quizfile.sql', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(7, 6, '17044282290quizfile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(8, 5, '17044283840quizfile.sql', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(9, 4, '17044285570quizfile.sql', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(10, 2, '17044290110quizfile.sql', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(11, 3, '17044291400quizfile.sql', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(12, 14, '17048809050quizfile.lead_academy (1).sql', 1, '2024-01-10 04:01:45', '2024-01-10 04:01:45'),
(13, 15, '17079745520quizfile.pdf', 1, '2024-02-15 10:22:32', '2024-02-15 10:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_requisites`
--

CREATE TABLE IF NOT EXISTS `course_requisites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(11) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_requisites`
--

INSERT INTO `course_requisites` (`id`, `course_id`, `event_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Internet', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 1, NULL, 'A computer', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(4, 10, NULL, 'Internet', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(5, 10, NULL, 'A computer', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(6, 10, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(7, 9, NULL, 'Internet', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(8, 9, NULL, 'A computer', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(9, 9, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(10, 8, NULL, 'Internet', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(11, 8, NULL, 'A computer', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(12, 8, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(13, 7, NULL, 'Internet', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(14, 7, NULL, 'A computer', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(15, 7, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(16, 6, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(17, 6, NULL, 'A computer', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(18, 6, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(19, 5, NULL, 'Internet', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(20, 5, NULL, 'A computer', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(21, 5, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(22, 4, NULL, 'Internet', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(23, 4, NULL, 'A computer', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(24, 4, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(25, 2, NULL, 'A computer', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(26, 2, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(27, 3, NULL, 'Internet', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(28, 3, NULL, 'A computer', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(29, 3, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(30, NULL, 1, 'Basic Computer SkillTML5', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(31, NULL, 2, 'ffdsfdsf', 1, '2024-01-07 23:06:23', '2024-01-07 23:06:23'),
(32, 11, NULL, NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(33, 12, NULL, NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01'),
(44, 27, NULL, 'A computer', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(45, 27, NULL, 'Keep video resolution at 1080p', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `course_resource_files`
--

CREATE TABLE IF NOT EXISTS `course_resource_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_resource_files`
--

INSERT INTO `course_resource_files` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '17044261710resourcefile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, '17044261711resourcefile.sql', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 10, '17044265870resourcefile.sql', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(4, 9, '17044277400resourcefile.sql', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(5, 9, '17044277401resourcefile.sql', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(6, 8, '17044279220resourcefile.sql', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(7, 7, '17044280710resourcefile.sql', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(8, 6, '17044282290resourcefile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(9, 6, '17044282291resourcefile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(10, 6, '17044282292resourcefile.sql', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(11, 5, '17044283840resourcefile.sql', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(12, 4, '17044285570resourcefile.sql', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(13, 2, '17044290110resourcefile.sql', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(14, 3, '17044291400resourcefile.sql', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(15, 13, '17048768880resourcefile.sql', 1, '2024-01-10 02:54:48', '2024-01-10 02:54:48'),
(16, 13, '17048768881resourcefile.sql', 1, '2024-01-10 02:54:48', '2024-01-10 02:54:48'),
(17, 13, '17048768882resourcefile.sql', 1, '2024-01-10 02:54:48', '2024-01-10 02:54:48'),
(18, 14, '17048809050resourcefile.blogs.sql', 1, '2024-01-10 04:01:45', '2024-01-10 04:01:45'),
(19, 14, '17048809051resourcefile.likes.sql', 1, '2024-01-10 04:01:45', '2024-01-10 04:01:45'),
(20, 15, '17079745520resourcefile.pdf', 1, '2024-02-15 10:22:32', '2024-02-15 10:22:32'),
(21, 17, '17089442000resourcefile.weired microbiology.pdf', 1, '2024-02-26 15:43:20', '2024-02-26 15:43:20'),
(22, 27, '17100495780resourcefile.main_china.css', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `course_saves`
--

CREATE TABLE IF NOT EXISTS `course_saves` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_saves`
--

INSERT INTO `course_saves` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 4, 182, '2024-01-05 07:09:01', '2024-01-05 07:09:01'),
(4, 5, 215, '2024-01-09 02:24:35', '2024-01-09 02:24:35'),
(6, 3, 276, '2024-03-30 22:26:50', '2024-03-30 22:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `course_skills`
--

CREATE TABLE IF NOT EXISTS `course_skills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_skills`
--

INSERT INTO `course_skills` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Polished Language Use', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 1, 'Quantitative Profici', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(3, 1, 'Verbal Aptitude', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(4, 1, 'Time Management', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(5, 10, 'Verbal Aptitude', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(6, 10, 'Polished Language Use', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(7, 10, 'Quantitative Profici', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(8, 9, 'Polished Language Use', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(9, 9, 'Verbal Aptitude', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(10, 9, 'Time Management', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(11, 8, 'Quantitative Profici', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(12, 8, 'Polished Language Use', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(13, 8, 'Verbal Aptitude', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(14, 8, 'Time Management', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(15, 7, 'Quantitative Profici', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(16, 7, 'Polished Language Use', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(17, 7, 'Verbal Aptitude', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(18, 7, 'Time Management', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(19, 6, 'Polished Language Use', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(20, 6, 'Quantitative Profici', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(21, 6, 'Time Management', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(22, 5, 'Polished Language Use', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(23, 5, 'Verbal Aptitude', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(24, 5, 'Time Management', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(25, 4, 'Quantitative Profici', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(26, 4, 'Polished Language Use', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(27, 4, 'Time Management', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(28, 2, 'Time Management', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(29, 2, 'Quantitative Profici', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(30, 2, 'Verbal Aptitude', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(31, 3, 'Quantitative Profici', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(32, 3, 'Polished Language Use', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(33, 3, 'Time Management', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(34, 11, NULL, 1, '2024-01-08 00:18:38', '2024-01-08 00:18:38'),
(35, 12, NULL, 1, '2024-01-08 00:21:01', '2024-01-08 00:21:01'),
(44, 27, 'Polished Language Use', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(45, 27, 'Verbal Aptitude', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(46, 27, 'Quantitative Profici', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(47, 27, 'Time Management', 1, '2024-03-09 23:46:18', '2024-03-09 23:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(255) DEFAULT NULL,
  `currency_icon` varchar(255) DEFAULT NULL,
  `currency_position` varchar(255) DEFAULT NULL,
  `thousands_separator` varchar(255) DEFAULT NULL,
  `decimal_separator` varchar(255) DEFAULT NULL,
  `decimal_digit` varchar(255) DEFAULT NULL,
  `exchange_rate` double(8,2) DEFAULT NULL,
  `is_default` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_icon`, `currency_position`, `thousands_separator`, `decimal_separator`, `decimal_digit`, `exchange_rate`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'left', 'comma', 'point', '1', 1.00, '1', '2024-01-24 02:57:44', '2024-01-24 04:36:09'),
(4, 'BDT', 'Tk', 'right', 'comma', 'comma', '2', 109.70, '0', '2024-01-24 04:34:25', '2024-01-24 04:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `daily_classes`
--

CREATE TABLE IF NOT EXISTS `daily_classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `lession_id` bigint(20) UNSIGNED DEFAULT 0,
  `page_number` varchar(255) DEFAULT NULL,
  `sub_banner` int(11) NOT NULL DEFAULT 1,
  `video` varchar(255) DEFAULT NULL,
  `video_thumbnail` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_classes`
--

INSERT INTO `daily_classes` (`id`, `name`, `teacher_id`, `class_id`, `subject_id`, `session_id`, `section_id`, `group_id`, `lession_id`, `page_number`, `sub_banner`, `video`, `video_thumbnail`, `video_url`, `details`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Daily teacher', 184, 1, 3, 6, 1, 1, 0, '2,3', 1, '5694298401717565959.mp4', '2221155281717565931.mp4', 'https://www.youtube.com/watch?v=Kcfk41W-asU&t=1s', 'dsfgsdfg resdgesr', 1, '2024-06-03 02:40:11', '2024-06-05 02:34:11'),
(4, 'Daily class', 186, 1, 1, 6, 1, 0, 1, '2,3,43425,34256674234246245', 2, '2797470441717409801.jpg', NULL, 'https://www.youtube.com/watch?v=Kcfk41W-asU&t=1s', 'fdhfsdh dsfgsdg dsfdafasdf shohag', 1, '2024-06-02 04:16:41', '2024-06-06 04:40:22'),
(5, 'gfhd', 284, 4, 11, 6, 3, 3, 0, '2,3', 2, NULL, NULL, 'https://fhfd', '<p>fghfd</p>', 1, '2024-06-05 23:35:26', '2024-06-04 23:35:26'),
(6, 'fghdjj', 175, 1, 4, 6, 1, 1, 0, '12313', 1, '5920291421717576669.mp4', NULL, 'https://', '<p>dfhdfhd</p>', 1, '2024-05-01 02:37:49', '2024-06-05 02:37:49'),
(7, 'Daily Doctor Home visit package', 184, 1, 1, 6, 1, 6, 1, '546576', 1, '19107276241717578405.mp4', NULL, 'https://', '<p>gfdhfd</p>', 1, '2024-06-05 03:06:45', '2024-06-05 03:06:45'),
(8, 'shohagsdafdsafsad', 186, 1, 1, 6, 1, 1, 1, '2,3', 1, '21022635981717582538.mp4', NULL, 'https://', 'sdfsdaf', 1, '2024-06-05 04:15:38', '2024-06-08 00:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Day - 1', 1, '2023-12-24 05:31:57', '2023-12-24 05:31:57'),
(2, 'day-3', 1, '2023-12-24 05:32:44', '2023-12-24 05:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE IF NOT EXISTS `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `department_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'MBA', 1, '2024-02-28 04:25:57', '2024-02-28 04:31:09'),
(2, 3, 'MSC_ss', 1, '2024-02-28 04:26:37', '2024-02-28 04:34:32'),
(4, 5, 'CSE', 1, '2024-02-28 07:12:29', '2024-02-28 07:12:29'),
(6, 3, 'BSc', 1, '2024-03-03 04:22:03', '2024-03-03 04:22:03'),
(7, 6, 'BBA', 1, '2024-03-04 23:54:54', '2024-03-04 23:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'CSS', 1, '2024-02-28 04:19:35', '2024-02-28 04:19:35'),
(3, 'EEE', 1, '2024-02-28 04:19:46', '2024-03-05 03:49:27'),
(5, 'Eng', 1, '2024-02-28 07:12:06', '2024-02-28 07:12:06'),
(6, 'Accounting', 1, '2024-03-04 23:54:23', '2024-03-04 23:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Headmaster', 1, 1, '2024-05-21 21:55:25', '2024-05-22 05:53:08'),
(2, 'Assistant Headmaster', 2, 1, '2024-05-21 21:55:38', '2024-05-22 05:30:32'),
(3, 'Senior Teacher', 3, 1, '2024-05-21 21:56:00', '2024-05-22 05:30:42'),
(4, 'Junior teacher', 4, 1, '2024-05-21 21:56:16', '2024-05-22 05:30:49'),
(5, 'Guest Teacher', 5, 0, '2024-05-21 21:59:03', '2024-05-22 05:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE IF NOT EXISTS `directions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'North (N)', 1, '2024-05-26 01:16:31', '2024-05-26 01:17:49'),
(2, 'East (E)', 1, '2024-05-26 01:16:49', '2024-05-26 01:17:40'),
(3, 'South (S)', 1, '2024-05-26 01:17:00', '2024-05-26 01:17:32'),
(4, 'West (W)', 1, '2024-05-26 01:17:21', '2024-05-26 01:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE IF NOT EXISTS `ebooks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `lesson` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `short_desctiption` longtext DEFAULT NULL,
  `long_desctiption` longtext DEFAULT NULL,
  `content_audio` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `title`, `headline`, `lesson`, `user_id`, `category_id`, `sub_category_id`, `fee`, `discount`, `type`, `discount_type`, `short_desctiption`, `long_desctiption`, `content_audio`, `image`, `status`, `created_at`, `updated_at`) VALUES
(40, 'The End', 'All Of everything', 'Lesson - 1', 260, 65, 66, 1000, 10, 'ebook', '0', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"data:image/jpeg;base64,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\" data-filename=\"download (1).jpg\" style=\"width: 261px;\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTExMWFhUXFRUVFxgYGBcWFRcXFRcXFxUYFxgYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGzUlICUtLS0tLS0uLS0tLy0tLS0tLS0tLS8tLS0tLS0tLS0tLS0tLy0tLS0tLS0tLS0tLS0tLf/AABEIAOYA2wMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAAAwQFBgcCAQj/xABGEAABAwICBAoGBwcEAgMAAAABAAIDBBEFEgYhMVEHEzJBYXGBkaGxFCJCktHwI1JTYnKCwRUzQ6Ky0uEkg8LxNGMWc+L/xAAbAQACAwEBAQAAAAAAAAAAAAAAAgEDBAUGB//EADcRAAEDAQMJBwMEAgMAAAAAAAEAAgMRBCExBRJBUXGRobHREzJhgcHh8BQVIiNCUpLx8gYzQ//aAAwDAQACEQMRAD8A3FCEIQhCEIQhCEIQhCEIQhCEIQhCEjPUNYLuPxPUhSBW4JUlRNfitrhnvfBMa7EXP1bG7vjvUe56tbHrW6Gy0vfuS3HVsJ4xhE8Z9Yx7JG325ST63n0FS+D6QQz6gcrxqLHanA7rHn6F3R8hvUPJNMUwSKf1nAteNkjPVeO32h0G4SVBxWcva40ePMY7sDz8VYEKpMrqqk1Sj0iEfxGAl7R99ms9ouOpWDDsTinbmieHDxHWFFNSR0RAzheNY9dXmnqEIUKtCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCFw94AuTYKGr8UJ1M1Dfzn4KQKqyOJzzQJ5XYi1moa3eA61Q9JdKzFIGiKWd5GZzYhmLG3AuQOkhOsaxMQsLjtOpo3n4KlaL6RRRV7n1Dw0Pjc3O7YHZmkAm2oGx6NQ6FL3BlAMV0GxCJhLRU0UnT8IFI85XOdE8ai2RpaQdxteycz6UQhuYSNI6CCrhPRUlWz12Qzt5iQyQdh12VXxPgrw+S5iEkBvf6N5LfdkzC3QCFIkckbbB+4KR0Y03p5bRudldsBOw7tauTHgi4Nwe1YlX8F9VEfoKqKTnDZLxPPVbMD4LqgxbF8P/AH1NK6MbSBxrLfiZe3akqNNypc2KQ1a6h4ey21RFfgLHO4yJxhl252bHH77djuvUelV7R/hMo6izXPET9hD9Qv1nYrnFO1wDmkOB2EG4PUQhUlskRrhy91ER49LTnLWM9XYJ2a4+jPzsPX4qyQTte0OY4Oaeca00NiLHWPCyh34EYnZ6N/Eu549sDujL7H5dXQpqCirH43Hww8xo8tytKFX6PSCzhHUsMMh1An90/wDA/Z2bepTwN9YQRRI5hbj7LpCEKEqEIQhCEIQhCEIQhCEIQhCEIQhCE2q6tsY17eYc6a4hiGW7W7ec7v8AKg5ZiTclO1lcVphs5de7BL1la5517OYcwUdVVAY0ucbAa15PUBouTYKkaU47m1A+qPFO9wY1dFrA0UCitKsdzEuJsByRuCzisqTI4k9idYpWulfYXOvUBrJ6hzqXwTQuWWzpLsbuHK7TsCphhfK64VKw2u1sYLzdzUJhUs4ePR3SB5+zcWntIOpbBonW1zGH0mpdISNTSGnL+e2YlJ4Po7HCLNaB1bT1nnU0yMN2BdaCwMZe+88PdcC05Skk/Flw4+ye0+DNqg4SPka5uXK9ji1wcb3O53bdekYhR6z/AKuEc7R9MB0t2u/KT1J/ozJrePwnzViCz2iVzZS03i644YDzHkrbLE10QcLjfeMcTv8AOqqMbsNxEWkiie/YRI0CQHnAdqIPaCmruDiGM5qOpqaQ7bMkL479LX7feVixjRynqDmey0nNIw5ZB+YcodBuFCVMGI0o+jf6TGNnqgytHSy4zj8LgehZiyJ97TQ6j6O671qbJLHcbxrHq3pXwCQ4jG6bkyU1awczwYZj1EepfpLl0NPzDqrqGqpt7w3joR/uM/S6jhwmPiuZ6Uua3lPhcczd+eKQBzO026VMYXwlYbNqFQIyeaUGPx5PiqnsLDR121aGuDxUCuz2w2UqpXD9I6CtbkZPDKHDkEgOP5H2d4KfwyhbCzI0uIuXesS61+YX2AKs1mjWHVoLnQQS39uOwd78ZB8UyZoZLB/4WI1MA5mPIqIR1Nk2d6gVRVtKAkfN/BaAhV7RJ1eY3+ncTcOIjMYIc5gJGd4uQM2ogDYDr1qwqUhFDRCEIQoQhCEIQhCEIQhCEIQhCEIVQqpfWJO8qu47pJFTj1nXdzNGslKactrIg4xQu4u5+lFnADbctbrHWQAs1oMFnqnZmglpPrSv5PTb63Z4LQDW5oqV1nTRsZnEims4fPBPZcclqXlzzljbrDRsJ5sx57be5cf/ABypqzr+ii53O5Tvws29pt2q44PgMVO0as7hrzEc/wB0c3mpFzloisGcc6U+XVcO2ZZqM2HefQddygsF0Tp6Yeq3M7ne7W4/DqU1YDYuJZgNqgsW0jji9rXuG1dIANbdcFwiXyOqbypuSYBQuJ6Qxx7Xa9w2qnYjpJLKbN9UHdtKbUuDTym+Ui/O74bVjtGUIYRUkefppO5XssxN7lYaLTuWKXOxotsIN9Y6Vomjun1PUWa68b+cEEjvA8ws4oNEhteSfAfFWnD6BkQs0ADcBZectmXYj3W5x14da7lrY4x3Mw1aFo9LWskvkcDbbvHYnCqI0YZKxk0MjoJy2/GM1hx/9jNjh4rkaST0hDK+Kzb2bPH+6duzfUPQbdqsZM4NDpBiK1GGGkYjbePFbQ80q5TeNaPU9TrkZ642SNOWRvU4a7dBuOhZRpZwZuBLo/W6WgNk/M3U1/WMp6FsVFiEcovG8O1X1HX3JaeIOFitjZXNGbiNRvHzxG9Tmtcc4Y6xj88Dd4L5Vmo6mlcXMc9pbtcwua5v4hqc3tU1hXCZiUNv9RxjRzStEl/zH1vFbjimi8U37wXPMRqcOpw1jyVewzQz0Ko9Jip4qm3M4BsrfvM9gu6bAozI3905p8cN/XerBM8XPGcOO7p5BWrQPF66phz1lK2AWGQguDn9JidcsHWbndbWrWozBcYZUNcWh7XNOV7XtLXNduN1JpS0tNCozw68IQhChCEIQhCEIQhCEIQhCEjPO1gu4gDz6hzpZUXFawvkcSecgdQOpX2eDtXU1LPaJ+ybXWpPEcfJuI/VG/2v8KvPfdJyzAbSmb6lzv3bC7p2N946l1aRWdlXENGsmnFch8j5TU3pzJKAoTFtIY4trtfMBtS0uGSyfvJcg+rHt7XuHkE1koqeH93GM3O8+s8/mdrWBuWI5pOyswzzpODQNes+F1+hM2D+Sip6yaUN9gyOa1jdd/WNg5wGvn2L2u4OK692mCTtdG7yt4rmesDZYnu2NkY46yNQcCdY1ha/QVMcjQ5jmuadhbye9WWqV7c35f8A4ot9miYa3LGIsLrqXlYfcDnYOMv2xuJ7wlW6XsZ6ssL4juIse51itt1fNwuJqdjxZzQ4biGuHiuTLZrPLe+MV1gkcjTeCrnWZp0rJYdJYHbHgdepKv0gjbtdq8Fd67QbD5b5qWIE7SwGI98dlB1fBPSO1xSzxdAe17e54LvFZHZJspwLhuPRIbMdB+cVN6G6T080bYxI3OLjKSASLm1t6s0jWuBa4AgixBFwRuIO0dHgsiqeCqpYc0NVE8jWOMjdEfebm8lI0s+O0oDTTsqWDc9rjboJc13gVvihLGhocDQbD04hXNLmihCnMU0KynjKF/FOvfiiTxJP3SNcR6rjoUTFppVUr+KqonOP1XWEpA52OHqzDq19C7HCS+LVVUFRDvOU2/maB4lOzpvhVYzi5XtLT7MjCLHfmFwD0g9qcQyM/wCseWLdwwJ1tIOuqRzWVqDmndvBxU9gmldLVfu5QHc7Heq4HdY86nmhYzjuh8b7y0M7ZgPZEjTMy31X3+kHQ+x+8mOEabV1G7I8mRjTYtkBu3oN/WafnWpGa64/i7UcDsOPkRXyUiR7e8K+I+UPluX0HDyQu1XdENIvTIs3ESxWA1vaQx1/qOPKViSuaWmhVrXBwqEIQhQmQhCEIQhCEIQhCEIScjw0Ek2AFyVn1U27jZ2q5tvIv0q5aRutTv8Ay/1BUCeqa3aVzLblOeyuzITSorWlTiRdW7gsdqAcQCleKaOa53nX/hDpFX8Q0nhj2vBO4aykKbFnSjNYtbzA7SOncuXHZrVbZAXEnxdo+agqKUGFFLVtdqsFW8QrgBclc4tiYYCSVRsSxJ0p3NXs7NZ4rHEGM8zpJ1n5cLkzGFxuTjFcVLzZqZQV8rDdsjmneDY94TdcFyfPdWtVrEDQKEKz0WnVfFyahx/Ec39V1O0fC1Vt5bWP622Pe0hUGGB7+S09ewKWo9FZZQSw5i21wLDbfeRfYVPZlzakCmsgc6LQ2xyOaXtqBrJoOJpuWjUXDCz+JT26WPPkR+qnqPhPoX8p7mH7zQ4fyklYnWaOzx8oO/M0tHvG48VHyU0g2tPWNY8EhhaRXN3H/ZQbPaGitKjXQHi3qvpek0sopOTUxdRdkPc6yloZmvF2kOG8EOHeF8mtnI5yE5gxGVhu2RwPQbHwVPZMOB9eipz3eB3jqvqw/PyVG12j1JN+9poX9JjaT3jWsBo9PK+Lk1L7bi4uHcbhT1Hwt1jbZwyT8TAD/IQo7E6COPSnFN2mscuq0Cs4MsPfrax8R3xyOFux9wouq4MJAQ6Guku3k8awSEdTmkW7kxouGRv8WmI6WPPkR+qn6PhRoH8ovjP3mAjvYSpzZaUxGq48L0n6Rx5EegSkM+OwWF6WqaN5LJD35RfpJKcM0+q4v/KwqobvdFaYfy7O9SNHpdRSciqi18xdlPc9S8MzXa2uDhvaQf6SkcSO83hTlROAD3Txr1UJRcJ+HPOV0roXDaJWOaR1kXA7VcWPBAINwQCDzEHYVGx0EUj2ukjY9zNbC5ocWE7S241HpUslJacAmAIxQhCEqlCEIQhCEIQhN6umbIxzHclwsbaj1g71n2kPBi6QEwVTr/Ul5J/OwXHulaSqnpbpDxYMUZs7Y526/MPil+nbK4VF+tVyZoFXLGDotLFK4S5PUNrtcHNJHPfabJbEMQbC219YXWkONhgNjrVHe+Wd1wCfLvXRjY2IZjBeqI4XzOu917iFc6V13HVzBMy/mGvx8lO0Wi73a39w1fzFT1HgLWbh5rQyxyOvdcu7Z8kSkfl+I3n5x8FUafC5H7RlHipijwRo5sxVmjomt5kqGgLdHZI2eK7MGToYr6VOs3+yi4cP6LK76DUbcsg57t8iq26QDaU+0Z0pgp3uEjxldY3BvYgnf1nuUW1mdA4Dw5prfGXWdzW43edCFepsLBUJX6Lwv1uiaTvAse8WKmaPSWkkHqzM/Mbf1AeakGSNeLtIcN4IPiLrzbmujN4ofG5eXcHxm8EHcs1r9BYnbC4ddnj+YX8VWq3g+eOQWn8xae43HitqliBTKakCs7d+k123pzM93ev2gHnUrBKrRapj2td3au9lwot9LINrO7X5L6DlolH1WDRycuNrutoJ8daYTt0jd71S/pnFtNh615rBuMTmkftF1rdZoRC/2COo38HXTOk4KnSP+icwW1kvuMo5rWvc9GpOHxnTvB9KpHQsp+Lt4pyzuNFnrYieZP8ADKOdzw2HjC/dHmLu5utbXgvBVSRWMznzu3H1I/dab95V2oKCKFuSGNkbdzGho7bbVHbZvdWfs64rLtF9Gcb1F1W6nZukImdb8Gsd7gtTpI3NY1r353BoDnWDcxG02GoX3JwhVOeXYp2sDcEIQhImQhCEIQhCEIQsW4QZZWVUkYY673XaSDlIedVjbXttq6VoOkWmDKWTiuLL3WBOvKBfYNh5lWsR4QnPY5ghaA5pbcuJIuLXGoJG2yOJ1CfDSqXlhIDjpVGbovBmzyl0juk2b2AfqnzYo26mgDqXEmIX5vEfBNHzk8/gPgur96scfcB8h1NV6FmVrFC3NjaaeA909dKE2krGt2lM5BfaSmz6Vh2taexVu/5DF+1h86DlVQ7L0f7WHgOqUqtIYm+1c9GtQ9VpO48htul3wT80UY9hvck3UrPqhZH5ekdg2nn7FZX5dkdg2igJ6+R+0uPgE2Gb6pVmbRA6mtJ7L+Sdt0ekylxaGNGsl5DQsMmUzWruJVLbVaJj+La7zxwVRj4wbAR22UhR19W03bIb9Jv4lS0eGk8kB34Xsd5Fdmhe3bG/rym3fZKMrPbc1wGw+6DaLawUzSBscE4oNJsRbYGUEbnZn/1AqeptMan22Ru7SD4G3gqr6Y0aiQEp6Y3eEklsnfjT+reiwvtUj7jTc3nRXA6XTczIx15neRC4/wDlNR9wdTD+riqia9n1guTibPrKntZTpKqL361qGi2NtqA5jtUrOULWuDra4DcrrgTbOd1DzWSw4IaqgjqoHXljD25W6nOY1zrsv9a1nN6+kq28H2Czuijqf2jI9jreo1myx9Zjs5dYgix1BdOEAtFTf8+G5bIw0t/J1DsPNaOhCE6RCEIQhCEIQhCEIQhCEIQhY1wouMdY5zg4Nc1ha6xymzQ0i+y9xsVHfijRv7ivpp7ARYgEHaDrCp2kWiuFvJ42BrXnXeK8bu3IQD2rDLZ2Cr3OptSNgDnab1iLsYb0pF2NDcVZce0HiEn+nkkEfPxhaXX3AtaBbvSFJoewbRm6zdYXTQN012fAtjMmOd4bfZV4Yzc2a0k7gLnwUpRUNXLyYso3vOXw1nwVvw/BmM2NaPnqUpEwNWOS26GN33rZHkmId812XKs0miTzrlmA6GN/U/BS9Po9Ts9kk/eN/BSTpAuHTrM6eR2lbI7JBH3WjnzXUcTW6mtA6gE6oWgytB6T4W/VRj6sDnXlFjEbJWkuAGsHtH/SezfjMxztYVszS6NwGo8laJ8Fp5OXBE78TGk95F0zk0PpDsiLD9x8jPBpsnUGOwO2SjtDh5iycsxGI7JGH8zV6iscg0Hceq4H6sesbwq/VaGRnZNKOhxZI3ue2/iq/iHBwDexiP8AtmM98breC0YSg7Dfq1+RXDz8/wDYSfSxC8Npsu5UTfVSm4urtv51WMVfB5KNlux/6PaPNRk2hFSNjH+6Hf0E+S3MxA/P+V1HTjd89ynstRPPnVLng4tHLkQsi0MlqsPmu4fQvsJGuzM6nNztAzDxWoaOVETKpz6eeHiJwXSxl4BbKBqfGN7tjh2qXYwfP/aQqMLgk5cMbutjT+iBG8YGu0eo6KP0/wCJGw9RXirTHIDrBBHQbrtU+l0dps7crCzX7D5I/Bjh5K1wxhrQ0XsBYXJce0kkntVrS6t4G89PVI4NGB+bz6JVCEJ0iEIQhCEIQhCEITPEp8kZI26gO35KrlkETC92ABO5S0EkAJ4qHjk300l/rEd2oKROIvPtnxTWQgm5AJO0nWT2rzNtyvHO0Na0ihrfTVTWulZozE4k3qs1VQ2+shMziDBz9yt3Ft+q3uC61bguYbV4cfZbu2poVKfi+5jz1McfIJF+Lynk005/25B5hXvOvC9R9UdXzgjtjqWbT4rVHZTyDrBCYS1Fa7+G4d3xWqSAFNZIG7grmW6n7Bx6pTK4rLH0tW7aHd4SX7HqD7I7T/hag+lbuCTdSN3BXDKLtACjOJ0rN48FqBsIHUT8FIU+FVh2TEdpKuwpW7kvHCAq5La54vaNyA9wwJ3qvUGjtSdbqm3VGD4kqapcHmbtqpOwAeSk2OsuxIs4tcw7rqbAB6V4qHOLsb9t6SbTStabTSONtTfUJJ5gM2q/Woqox+aM2sGu2ZJ2cVf8LwCx3erBTSXc3rUq6MEWIBG61x3f4XcyU2WeJzjI6oNMa6Bo/wALFM8McPxG4LP5dPpoiBLTOF9h5j1OD7HsTiDhHh9qNze0fBTOJ6NQG+RnF325Dlaetmth7WpXAaeopwBHxUjBsa9uR46ntB7rALphloafydUeAHI37iSkMkJHc4kepXWE6VxPc0hktrjWI3uH8oV0ppw9ocA4A/Wa5ju1rgCF3ESQCRY21i97HdfnSi2MDqXngsr3NOAp5oQhCdIhCEIQhCEIQhRGkrrRD8Y8nKQqqhkbS97g1o2k7FWccx+lliLG1DWuBBByvIuN9hssSsttbnwPYMSLtC02aKR7w5rSQDoBPJRhlXnGqt4nizY+TPG/qbMP+BUQ/SaT2QHdrh5tXlPts+kDeOq67YJTgw/1PRXvjV4ZlQ/29Un+Gwdcn+F4cXqzzRD8zv7Uv0EqtFin/iVejOuTUDeqIcSqd8fe74Lg4hUfXZ4/FT9vk8EwsE/8VfTUJN1SN6oprJ/tG9x+K8NVN9o33T/cp+3P8EwyfN/Hl1V4NQN6TNSN4VJ9Il+0Huf/AKQZ5ftf5f8AKb7e/Wn+3T6uI6q7elN3heelt3qk8c/7Q9y5dM4a87vBT9vdrTfbJtXEK8emN3rttWN6zR2Mb53D8o/uXn7XH2591v8Acm+2P+VVP0b9Y/s3qtTo6wZ26+dvmFZy75/7CwZmMEG4qiPyN/uUrS6YyMFuPiPTxQaf5JAunYGvsrXNIrU1u9+qyz5MmkILaf2b1WvyOuvYDZZbFp28bZIz2v8A+TnKSpNP2jlFvY8f2Loi1A4tI3dVmOSbUMG12EdVs6FRaThOoy0Zy4O57ZXDvuPJPGcIlAf4rh1t+BV4mjOlZzk21j/yduVuQq5FptQuIAnAJNtYcNvYrGna5rsCs8sEsVO0aW11gjmhCEJlUhCEIQqJwoV5ayKIHlFzz2eqP6j3LNXSq9cKX76Poi/5O+Cz1z1zZ75CvZ5Ko2ysA28UoSgEDYkTIueMVK6QKcF65L0jxiM6E+clsy5zJHOjOoopzkrmRmSOdeZkKc5LZl5mSWZe5kKc5KZk4w5meaNvMZGd2a58kzzJ9o+7/VRfiKlo/IbQqrQ8iF5GhruS0qKAfNz5rv0cbvALmN/T4pQOC6q+d0XHorfqj3QvPQmfUb7oSmcfIK9zj5CFKROHR/Zs91q8/ZcX2TPcal84+QF7nHzZCE2/ZMH2MfuMQMHp/sIvcZ8E5Eg3+SOM6fnuQhPcCwuESXEUfJPst3joVoVdwOT6T8p/RWJMEpQhCFKhCEJKVyELPOFdlnRO5ixze1pv/wAlmEkutbZpNRtmZke0OF76xex2XG4qh1ehMRJyl7epxPmsksWcarv2G3iKIMcDdqoqbxiOMU/NoS4cmV3a0HyTKXRGoGx7T13Cp7ErotynFpqPI+ijOMXnGJzLo9VD2GnqPxCayYbUt2wv7LFKYnK4ZQgP7l7nRnTd7JByo3j8rkkZd+rrKXMdqVzbVE7Bw3p5mXmZNRMN66zpaFXCQJznXmdIZ0ZlFE+eEvnT3ApbVER++3xNv1UZmS9FNlkY7c8HuIJUi4gpJfyjc3WCN4IWtRv1f9LvMoZ2NQM5U0Y63sv3XSD9JqcbH3/Ax7v6WldMuAxXhGRPf3Wk7ASp/N83Rm+dZVal0qjGyOV3U1jf6y1NZtLTzRe/I1v9OZKZmDStDcn2p2EZ3U50VtzfNl5n+dSo8umDv/U335P0amp0slOx4/JCf+TnJe3bov8AJWHJc471Btc3qtC43p8V5xvzrWdjFqt+wTnsaweDQV0Iqx+1h/NLI7wzWU9rXBpQbE1velb5EnkFqeAz2mZ03HeCrhnWH4Tg9RmBe/L/APU0B3vOutYwX1YY23e6zQLvN3m3O4707HE4iiyzxRspmPzvIgceimgV6kInJdWLMhJSBKrwhCFE1UFymjqLoU46JecSlIVofQKBdQdCSdh3QrFxCOIRmpu1KrTsLG5JOwgblafR0ejqM0Ke2KqTsEG5NpNHGHa0HsV19GCPRgjNR2vgs+l0NhO2NvcmkugMB9i3USFpfow3I9FG5GYgTUwWTy8HbOYuHamsnB072ZHdoC2H0Ubkeijcl7MalYLXIMHHeVir+D+oGxwPZZIP0Fq+ZrT2281uPogXnog3KOxbqVoyjOMHLGItDKwjWcvVbzCXZoHOeVM7sWw+iDcj0QbkCBg0KHZTtTsZDvWTR8Hjfac89tk7h0BgHsX6yStP9FG5Ho3QnDGrO60yOxcTtKz+DQ6JuyJo7An0ejrRzBXP0ZHo/QpzQqu0KqbMDbu8E4ZhDRzKyejjcveI6FNFGeVB01AARq5wplsSUECVDUUS1XLGpVeAL1ShCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhCEIQhf/2Q==\" data-filename=\"download (2).jpg\" style=\"width: 219px;\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', NULL, '17430076861706592792_ebook_image.jpg', 1, '2024-01-29 23:33:12', '2024-01-30 04:17:24');
INSERT INTO `ebooks` (`id`, `title`, `headline`, `lesson`, `user_id`, `category_id`, `sub_category_id`, `fee`, `discount`, `type`, `discount_type`, `short_desctiption`, `long_desctiption`, `content_audio`, `image`, `status`, `created_at`, `updated_at`) VALUES
(41, 'Bangladesh', 'Bangladeshi Educational Video', 'Lesson - 1', 258, 65, 66, 1000, 100, 'ebook', '0', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</span></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"data:image/jpeg;base64,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\" data-filename=\"download (3).jpg\" style=\"width: 275px;\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</span></p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1914 translation by H. Rackham</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"data:image/png;base64,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\" data-filename=\"bd25ca7c6a7a8be2446cb82db149b226.png\" style=\"width: 50%;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.<br></p><p><br></p>', NULL, '10567709891706598468_ebook_image.jpg', 1, '2024-01-30 01:07:48', '2024-01-30 01:14:23');
INSERT INTO `ebooks` (`id`, `title`, `headline`, `lesson`, `user_id`, `category_id`, `sub_category_id`, `fee`, `discount`, `type`, `discount_type`, `short_desctiption`, `long_desctiption`, `content_audio`, `image`, `status`, `created_at`, `updated_at`) VALUES
(42, 'dasfdsaf', 'This is headline2', '2', 258, 65, 66, 1000, 15, 'ebook', NULL, '<p>dfds ds&nbsp;</p>', '<p>sdf dsf</p>', NULL, '9131117811706599364_ebook_image.jpg', 1, '2024-01-30 01:22:44', '2024-01-30 01:22:44'),
(43, 'sdfsfdsf', 'This is headline', '1', 260, 65, 66, 1000, 16, 'ebook', NULL, '<p>rgfraftgaf</p>', '<p>asdrgfrad gfd&nbsp;</p>', NULL, '21389284501706599656_ebook_image.jpg', 1, '2024-01-30 01:27:36', '2024-01-30 01:27:36'),
(44, 'The Traveler--------1', 'TRAVEL ALL OF THE WORLD.', 'Lesson - 1', 248, 65, 66, 1950, 50, 'ebook', '0', '<p>sdfg fdsgv dg</p>', '<p>df gfdgdfg fdg</p>', NULL, '8758293831706600307_ebook_image.png', 1, '2024-01-30 01:38:27', '2024-01-30 02:02:28'),
(45, 'Razakar', 'This is headline', 'Lesson - 1', 260, 65, 66, 1000, 10, 'ebook', '0', '<p>aefa sdsf&nbsp;</p>', '<ol><li>sa fdsa fdsf&nbsp;</li></ol>', NULL, '19815197341706602540_ebook_image.png', 1, '2024-01-30 02:15:40', '2024-01-30 02:19:25'),
(46, 'Math', 'Math', '1', 248, 65, 66, 100, 10, 'ebookaudio', '0', '<h2 style=\"color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Google Sans Text&quot;, Roboto, sans-serif; font-size: 1.5rem; letter-spacing: 0rem; line-height: 2rem; margin-top: 2rem; margin-right: 0px; margin-left: 0px;\">Which types of work are subject to copyright?</h2><p style=\"margin: 0.25rem 0px 0.75rem; color: rgb(31, 31, 31); font-family: &quot;Google Sans Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, sans-serif, &quot;Noto Color Emoji&quot;; font-size: 16px; letter-spacing: 0.08px;\">Copyright ownership gives the owner the exclusive right to use the work, with some exceptions. When a person creates an original work, fixed in a tangible medium, he or she automatically owns copyright to the work.</p><p style=\"margin: 0.25rem 0px 0.75rem; color: rgb(31, 31, 31); font-family: &quot;Google Sans Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, sans-serif, &quot;Noto Color Emoji&quot;; font-size: 16px; letter-spacing: 0.08px;\">Many types of works are eligible for copyright protection, for example:</p><ul style=\"margin: 0.25rem 0px 0.75rem; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(31, 31, 31); font-family: &quot;Google Sans Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, sans-serif, &quot;Noto Color Emoji&quot;; font-size: 16px; letter-spacing: 0.08px;\"><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Audiovisual works, such as TV shows, movies, and online videos</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Sound recordings and musical compositions</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Written works, such as lectures, articles, books, and musical compositions</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Visual works, such as paintings, posters, and advertisements</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Video games and computer software</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Dramatic works, such as plays and musicals</li></ul>', '<h2 style=\"color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, &quot;Google Sans Text&quot;, Roboto, sans-serif; font-size: 1.5rem; letter-spacing: 0rem; line-height: 2rem; margin-top: 2rem; margin-right: 0px; margin-left: 0px;\">Which types of work are subject to copyright?</h2><p style=\"margin: 0.25rem 0px 0.75rem; color: rgb(31, 31, 31); font-family: &quot;Google Sans Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, sans-serif, &quot;Noto Color Emoji&quot;; font-size: 16px; letter-spacing: 0.08px;\">Copyright ownership gives the owner the exclusive right to use the work, with some exceptions. When a person creates an original work, fixed in a tangible medium, he or she automatically owns copyright to the work.</p><p style=\"margin: 0.25rem 0px 0.75rem; color: rgb(31, 31, 31); font-family: &quot;Google Sans Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, sans-serif, &quot;Noto Color Emoji&quot;; font-size: 16px; letter-spacing: 0.08px;\">Many types of works are eligible for copyright protection, for example:</p><ul style=\"margin: 0.25rem 0px 0.75rem; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(31, 31, 31); font-family: &quot;Google Sans Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, sans-serif, &quot;Noto Color Emoji&quot;; font-size: 16px; letter-spacing: 0.08px;\"><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Audiovisual works, such as TV shows, movies, and online videos</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Sound recordings and musical compositions</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Written works, such as lectures, articles, books, and musical compositions</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Visual works, such as paintings, posters, and advertisements</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Video games and computer software</li><li style=\"margin: 0.25rem 0px; list-style-type: none; padding-left: 1rem;\">Dramatic works, such as plays and musicals</li></ul>', '19561042251707128072_ebook_audio.mp3', '5916469111707126897_ebook_image.jpg', 1, '2024-02-05 14:54:57', '2024-02-05 15:14:32'),
(47, 'Amader Bangladesh', 'All Of everything', 'Lesson - 1', 267, 65, 66, 1000, 10, 'ebook', '0', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"data:image/jpeg;base64,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\" data-filename=\"download (3).jpg\" style=\"width: 275px;\">&nbsp; &nbsp; &nbsp;<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '20092269031707127152_ebook_audio.mp3', '2699937841707127152_ebook_image.jpg', 1, '2024-02-05 14:59:12', '2024-02-05 14:59:12'),
(48, 'After 17th', 'This Is Life History.', 'Lesson - 2', 239, 65, 66, 3000, 10, 'ebookvideo', NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '3641262321707128439_ebook_audio.mp3', '16618795051707128439_ebook_image.jpg', 1, '2024-02-05 15:20:39', '2024-02-05 15:20:39'),
(49, 'শিক্ষক নিবন্ধন Analysis (পেপারব্যাক)', 'সবার ইংরেজির Basic ঠিক করতে এবং ইংরেজির ফাউন্ডেশন মজবুত করতে', '1', 273, 65, 66, 200, 10, 'ebookaudio', '0', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br></p>', NULL, '18528131401707198591_ebook_image.jpg', 1, '2024-02-06 10:49:51', '2024-02-06 10:49:51'),
(50, 'ঘুরে দাঁড়াও আরেকবার (হার্ডকভার)', 'আত্ম উন্নয়ন ও মোটিভেশন', '2', 273, 65, NULL, 100, 10, 'ebookvideo', '1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', NULL, '8313388181707198737_ebook_image.jpg', 1, '2024-02-06 10:52:17', '2024-02-06 10:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `ebook_audio_contents`
--

CREATE TABLE IF NOT EXISTS `ebook_audio_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ebook_id` bigint(20) UNSIGNED DEFAULT NULL,
  `audio_name` varchar(255) DEFAULT NULL,
  `audio_file` text DEFAULT NULL,
  `is_free` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebook_audio_contents`
--

INSERT INTO `ebook_audio_contents` (`id`, `ebook_id`, `audio_name`, `audio_file`, `is_free`, `status`, `created_at`, `updated_at`) VALUES
(31, 40, 'MP3-1', '17065927920_ebook_audio_file.mp3', 1, 1, '2024-01-29 23:33:12', '2024-01-29 23:33:12'),
(32, 40, 'MP3-2', '17065927921_ebook_audio_file.mp3', 0, 1, '2024-01-29 23:33:12', '2024-01-29 23:33:12'),
(33, 41, 'Contrary to popular belief', '17065984680_ebook_audio_file.mp3', 1, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(34, 41, 'Classical Latin literature', '17065984681_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(35, 41, 'From a Lorem Ipsum', '17065984682_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(36, 41, 'Very popular during', '17065984683_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(37, 41, 'There are many variations', '17065984684_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(38, 41, 'Lorem Ipsum is therefore always', '17065984685_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(39, 42, 'MP3-1', 'MP3-10_ebook_audio_file.mp3', 1, 1, '2024-01-30 01:22:44', '2024-01-30 01:22:44'),
(40, 42, 'MP3-2', 'MP3-21_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:22:44', '2024-01-30 01:22:44'),
(41, 43, 'MP3-1', 'MP3-1-sdfsfdsf_ebook_audio_file.mp3', 1, 1, '2024-01-30 01:27:36', '2024-01-30 01:27:36'),
(42, 43, 'MP3-2', 'MP3-2-sdfsfdsf_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:27:36', '2024-01-30 01:27:36'),
(43, 43, 'MP3-3', 'MP3-3-sdfsfdsf_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:27:36', '2024-01-30 01:27:36'),
(44, 44, 'On the other', 'On the other-The Traveler_ebook_audio_file.mp3', 1, 1, '2024-01-30 01:38:27', '2024-01-30 01:38:27'),
(46, 44, 'indignation and dislike', 'indignation and dislike-The Traveler_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:38:27', '2024-01-30 01:38:27'),
(47, 44, 'trouble that are bound', 'trouble that are bound-The Traveler_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:38:27', '2024-01-30 01:38:27'),
(48, 44, 'saying through shrinkinggfud', 'saying through shrinking-The Traveler_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:38:27', '2024-01-30 02:02:28'),
(49, 44, 'MP3-------------1011111111111111111111', 'MP3-------------1011111111111111111111-The Traveler--------1_ebook_audio_file.mp3', 0, 1, '2024-01-30 01:44:55', '2024-01-30 02:04:57'),
(50, 45, 'Bangladesh', 'Bangladesh-Razakar_ebook_audio_file.mp3', 1, 1, '2024-01-30 02:15:40', '2024-01-30 02:19:25'),
(51, 45, 'India', 'India-Razakar_ebook_audio_file.mp3', 0, 1, '2024-01-30 02:15:40', '2024-01-30 02:19:25'),
(53, 40, 'MP3-3', 'MP3-3-The End_ebook_audio_file.mp3', 0, 1, '2024-01-30 04:53:09', '2024-01-30 04:53:09'),
(54, 47, 'MP3-1', 'MP3-1-Amader Bangladesh_ebook_audio_file.mp3', 0, 1, '2024-02-05 14:59:12', '2024-02-05 14:59:12'),
(55, 46, 'MP3-1', 'MP3-1-Math_ebook_audio_file.mp3', 0, 1, '2024-02-05 15:14:32', '2024-02-05 15:14:32'),
(56, 46, 'MP3-2', 'MP3-2-Math_ebook_audio_file.mp3', 0, 1, '2024-02-05 15:14:32', '2024-02-05 15:14:32'),
(57, 48, 'MP3-1', 'MP3-1-After 17th_ebook_audio_file.mp3', 1, 1, '2024-02-05 15:20:39', '2024-02-05 15:20:39'),
(58, 48, 'MP3-2', 'MP3-2-After 17th_ebook_audio_file.mp3', 0, 1, '2024-02-05 15:20:39', '2024-02-05 15:20:39'),
(59, 48, 'MP3-3', 'MP3-3-After 17th_ebook_audio_file.mp3', 0, 1, '2024-02-05 15:20:39', '2024-02-05 15:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `ebook_participants`
--

CREATE TABLE IF NOT EXISTS `ebook_participants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ebook_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebook_participants`
--

INSERT INTO `ebook_participants` (`id`, `ebook_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 40, 262, 1, '2024-01-29 23:36:02', '2024-01-29 23:36:02'),
(8, 41, 262, 1, '2024-01-30 01:15:23', '2024-01-30 01:15:23'),
(9, 43, 262, 1, '2024-01-30 01:39:35', '2024-01-30 01:39:35'),
(10, 44, 262, 1, '2024-01-30 01:41:06', '2024-01-30 01:41:06'),
(11, 42, 263, 1, '2024-01-31 16:41:19', '2024-01-31 16:41:19'),
(12, 40, 266, 1, '2024-02-03 11:03:18', '2024-02-03 11:03:18'),
(13, 41, 277, 1, '2024-02-06 14:55:43', '2024-02-06 14:55:43'),
(14, 47, 277, 1, '2024-02-06 14:55:43', '2024-02-06 14:55:43'),
(15, 42, 277, 1, '2024-02-06 14:57:18', '2024-02-06 14:57:18'),
(16, 50, 276, 1, '2024-02-06 14:59:00', '2024-02-06 14:59:00'),
(17, 49, 276, 1, '2024-02-06 14:59:00', '2024-02-06 14:59:00'),
(18, 48, 276, 1, '2024-02-06 14:59:00', '2024-02-06 14:59:00'),
(19, 47, 279, 1, '2024-02-07 07:26:55', '2024-02-07 07:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `ebook_video_contents`
--

CREATE TABLE IF NOT EXISTS `ebook_video_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ebook_id` bigint(20) UNSIGNED DEFAULT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `video_file` text DEFAULT NULL,
  `is_free` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebook_video_contents`
--

INSERT INTO `ebook_video_contents` (`id`, `ebook_id`, `video_name`, `video_file`, `is_free`, `status`, `created_at`, `updated_at`) VALUES
(17, 40, 'MP4-1', '17065927920_ebook_video_file.mp4', 1, 1, '2024-01-29 23:33:12', '2024-01-29 23:33:12'),
(18, 40, 'MP4-2', '17065927921_ebook_video_file.mp4', 0, 1, '2024-01-29 23:33:12', '2024-01-29 23:33:12'),
(19, 41, 'It is a long established', '17065984680_ebook_video_file.mp4', 1, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(20, 41, 'Fact that a reader', '17065984681_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(21, 41, 'Will be distracted', '17065984682_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(22, 41, 'Lorem Ipsum is that it has', '17065984683_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(23, 41, 'Look like readable', '17065984684_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(24, 41, 'Various versions have evolved', '17065984685_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(25, 41, 'Sometimes on purpose', '17065984686_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(26, 41, 'Where can I get some?', '17065984687_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(27, 41, 'There are many variations', '17065984688_ebook_video_file.mp4', 0, 1, '2024-01-30 01:07:48', '2024-01-30 01:07:48'),
(28, 44, 'But in certain circumstances', 'But in certain circumstances-The Traveler_ebook_video_file.mp4', 1, 1, '2024-01-30 01:38:27', '2024-01-30 01:38:27'),
(29, 44, 'secure other greater', 'secure other greater-The Traveler_ebook_video_file.mp4', 0, 1, '2024-01-30 01:38:27', '2024-01-30 01:38:27'),
(30, 44, 'pains to avoid worse pains', 'pains to avoid worse pains-The Traveler_ebook_video_file.mp4', 0, 1, '2024-01-30 01:38:27', '2024-01-30 01:38:27'),
(31, 45, 'But in certain circumstances', 'But in certain circumstances-Razakar_ebook_video_file.17065927921_ebook_video_file.mp4', 0, 1, '2024-01-30 02:15:40', '2024-01-30 02:15:40'),
(32, 45, 'It is a long established', 'It is a long established-Razakar_ebook_video_file.The Power of Education.mp4', 0, 1, '2024-01-30 02:15:40', '2024-01-30 02:15:40'),
(34, 40, 'MP4-3', 'MP4-3-The End_ebook_video_file.mp4', 0, 1, '2024-01-30 04:49:45', '2024-01-30 04:49:45'),
(35, 47, 'MP4-1', 'MP4-1-Amader Bangladesh_ebook_video_file.mp4', 0, 1, '2024-02-05 14:59:12', '2024-02-05 14:59:12'),
(36, 46, 'MP4-1', 'MP4-1-Math_ebook_video_file.mp4', 0, 1, '2024-02-05 15:14:32', '2024-02-05 15:14:32'),
(37, 48, 'MP4-1', 'MP4-1-After 17th_ebook_video_file.mp4', 1, 1, '2024-02-05 15:20:39', '2024-02-05 15:20:39'),
(38, 48, 'MP4-2', 'MP4-2-After 17th_ebook_video_file.mp4', 0, 1, '2024-02-05 15:20:39', '2024-02-05 15:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_image` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `gander` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `nid_number` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `shift_name` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_department_id_foreign` (`department_id`),
  KEY `employees_designation_id_foreign` (`designation_id`),
  KEY `employees_shift_name_foreign` (`shift_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `host_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `release_id` bigint(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `UserIP` varchar(255) DEFAULT NULL,
  `startdate` varchar(255) DEFAULT NULL,
  `enddate` varchar(255) DEFAULT NULL,
  `eventstarttime` varchar(255) DEFAULT NULL,
  `speaker` int(11) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `recording` int(11) DEFAULT 0,
  `fee` double(8,2) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `category_id`, `host_id`, `language_id`, `release_id`, `name`, `UserIP`, `startdate`, `enddate`, `eventstarttime`, `speaker`, `organization_name`, `location`, `session`, `day`, `recording`, `fee`, `about`, `status`, `created_at`, `updated_at`) VALUES
(1, 58, 180, 0, 0, 'Web Development with MERN Stack', '::1', '2024-01-29T10:58', '2024-01-24T10:58', '2027-02-06T11:26', NULL, 'navieasoft limited', NULL, NULL, NULL, 0, 3000.00, '<p><span style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif;\">Welcome to the Full Stack Web Development in MERN Stack Live Batch, instructed by the expert web developer, Eftykhar Rahman! Are you ready to embark on an exciting journey into Full Stack Web Development using the MERN Stack? This immersive course serves as a gateway to mastering the art of building dynamic and scalable web applications from start to finish. Why Is This Course Important to Learn? In the rapidly evolving tech landscape, this course empowers individuals from diverse backgrounds to harness the power of MERN (MongoDB, Express.js, React.js, Node.js) Stack, providing a comprehensive skill set for creating modern web applications. Whether you\'re a beginner or an experienced developer, this course is designed to elevate your capabilities to new heights. Who Is This Course For? This course caters to: Beginners venturing into the world of web development. Developers seeking to expand their skills in MERN Stack. Individuals aspiring to create dynamic and responsive web applications. Tech enthusiasts who are eager to explore the intricacies of Full Stack Development. What Will You Learn? Throughout this course, you\'ll: Explore the foundations of web development, from HTML and CSS to modern JavaScript (ES6). Master front-end development with React.js, including hooks, props, and components. Dive into back-end development with Node.js and Express.js, backed by MongoDB for database management. Deploy full-stack applications and understand the end-to-end development process. Perks of Joining This Course: Live Batch: Interact with the instructor in real-time and engage with fellow learners. This is a 3-month-long live batch, comprising 40 classes.. Support Classes: Supplement your learning with additional support sessions. One-to-One Mentorship: Receive personalised guidance tailored to your learning needs. Recorded Classes: Access recorded sessions for convenient review. Quiz and Assignments: Reinforce your understanding through quizzes and assignments. Mock Interviews: Prepare for real-world scenarios with mock interviews. Enrol in the Full Stack Web Development in MERN Stack Live batch today and unlock the path to becoming a proficient Full Stack Web Developer. Your journey to mastering MERN Stack development begins here! Your future in web development is just a click away!</span><br></p>', 1, '2024-01-04 23:01:53', '2024-01-05 07:16:54'),
(2, 58, 190, 0, 1, 'Beginnersss', '::1', '2024-01-12T10:53', '2024-02-01T10:53', '2024-01-24T10:54', NULL, 'Navieasoft', NULL, NULL, NULL, 0, 1000.00, '<p>asfdsfdsa dsaf sf</p>', 1, '2024-01-07 23:06:23', '2024-01-07 23:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `event_banners`
--

CREATE TABLE IF NOT EXISTS `event_banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_carts`
--

CREATE TABLE IF NOT EXISTS `event_carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_carts`
--

INSERT INTO `event_carts` (`id`, `event_id`, `order_id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 215, 3000.00, '2024-01-08 21:16:49', '2024-01-08 21:16:49'),
(2, 1, 2, 215, 3000.00, '2024-01-09 03:23:55', '2024-01-09 03:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE IF NOT EXISTS `event_participants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `sub_total` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_participants_order_number_unique` (`order_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_schedules`
--

CREATE TABLE IF NOT EXISTS `event_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day_id` bigint(20) UNSIGNED DEFAULT NULL,
  `instrutor_id` int(11) DEFAULT NULL,
  `schedulename` varchar(255) DEFAULT NULL,
  `scheduledate` varchar(255) DEFAULT NULL,
  `schedulestart_time` time DEFAULT NULL,
  `scheduleend_time` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_schedules`
--

INSERT INTO `event_schedules` (`id`, `event_id`, `day_id`, `instrutor_id`, `schedulename`, `scheduledate`, `schedulestart_time`, `scheduleend_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 178, 'Introduction to HTML', '2024-01-08', '02:01:00', '02:01:00', 1, '2024-01-04 23:01:53', '2024-01-04 23:01:53'),
(2, 1, 1, 189, 'Course Outline & Introduction to Full Stack Web Development', '2024-01-15', '03:00:00', '02:00:00', 1, '2024-01-04 23:01:53', '2024-01-05 07:18:29'),
(3, 2, 17, 180, 'dfsafadsfaf', '2024-02-01', '02:54:00', '02:54:00', 1, '2024-01-07 23:06:23', '2024-01-07 23:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE IF NOT EXISTS `examinations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `exam_priority` varchar(255) DEFAULT NULL,
  `academin_year_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `name`, `exam_priority`, `academin_year_id`, `session_id`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Weekly Examination', 'main', 4, 6, '2024-05-16', '2024-05-31', 1, '2024-05-10 22:33:22', '2024-06-04 03:57:18'),
(3, 'Monthly Examination', 'main', 6, 6, '2024-05-23', '2024-06-07', 1, '2024-05-10 22:36:51', '2024-06-04 03:57:34'),
(4, 'Yearly Examination', 'main', 6, 6, '2024-06-30', '2024-06-27', 1, '2024-05-11 05:20:49', '2024-06-08 03:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `exam_classes`
--

CREATE TABLE IF NOT EXISTS `exam_classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_classes`
--

INSERT INTO `exam_classes` (`id`, `examination_id`, `class_id`, `group_id`, `subject_id`, `examtype_id`, `marke`, `pass_marke`, `date`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(13, 4, 1, 0, 1, 3, 400, 40, '2024-05-31', '16:21', '17:21', 1, '2024-05-25 04:21:43', '2024-06-02 00:34:01'),
(14, 4, 4, 3, 11, 4, 100, 40, '2024-06-08', '16:23', '18:23', 1, '2024-05-25 04:23:31', '2024-05-25 05:08:12'),
(15, 4, 12, 0, 7, 4, 100, 40, '2024-06-08', '16:23', '18:23', 1, '2024-05-25 04:24:00', '2024-05-25 04:24:00'),
(16, 4, 1, 0, 3, 4, 80, 40, '2024-06-05', '16:43', '18:43', 1, '2024-05-25 04:43:14', '2024-06-02 00:22:27'),
(17, 4, 1, 0, 12, 4, 90, 40, '2024-05-28', '12:49', '14:49', 1, '2024-05-30 00:50:02', '2024-06-02 00:22:38'),
(18, 4, 1, 0, 4, 4, 100, 50, '2024-06-06', '15:20', '17:20', 1, '2024-05-30 03:20:09', '2024-06-02 00:22:51'),
(19, 3, 1, 0, 1, 4, 100, 50, '2024-06-02', '12:47', '13:48', 1, '2024-06-01 00:48:04', '2024-06-01 00:48:04'),
(20, 1, 4, 0, 17, 4, 300, 100, '2024-06-03', '14:37', '15:37', 1, '2024-06-01 02:37:50', '2024-06-01 02:37:50'),
(21, 1, 12, 0, 5, 4, 100, 40, '2024-06-08', '17:22', '18:22', 1, '2024-06-01 04:22:27', '2024-06-01 04:22:27'),
(22, 3, 11, 0, 20, 3, 400, 100, '2024-06-02', '16:30', '18:30', 1, '2024-06-01 04:30:27', '2024-06-01 04:30:27'),
(23, 4, 4, 0, 17, 4, 300, 300, '2024-06-07', '17:58', '18:58', 1, '2024-06-01 05:58:20', '2024-06-01 05:58:20'),
(24, 4, 1, 0, 1, 4, 400, 80, '2024-06-03', '12:30', '14:30', 1, '2024-06-02 00:30:34', '2024-06-02 00:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE IF NOT EXISTS `exam_results` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `examination_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `exam_class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `roll_number` int(11) NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(255) UNSIGNED NOT NULL DEFAULT 0,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `marke` int(11) NOT NULL DEFAULT 0,
  `pass_marke` int(11) NOT NULL DEFAULT 0,
  `obtained_marke` int(11) NOT NULL DEFAULT 0,
  `is_publis` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `examination_id`, `exam_class_id`, `teacher_id`, `student_id`, `roll_number`, `class_id`, `session_id`, `section_id`, `subject_id`, `academic_year_id`, `marke`, `pass_marke`, `obtained_marke`, `is_publis`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 13, 186, 6, 2, 1, 6, 1, 1, 6, 400, 40, 40, 1, 1, '2024-06-08 04:20:22', '2024-06-08 04:27:02'),
(2, 4, 13, 186, 7, 1, 1, 6, 1, 1, 6, 400, 40, 40, 1, 1, '2024-06-08 04:20:22', '2024-06-08 04:27:02'),
(3, 4, 13, 186, 57, 4, 1, 6, 1, 1, 6, 400, 40, 40, 1, 1, '2024-06-08 04:20:22', '2024-06-08 04:20:22'),
(4, 4, 13, 186, 61, 6, 1, 6, 1, 1, 6, 400, 40, 50, 1, 1, '2024-06-08 04:20:22', '2024-06-08 04:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE IF NOT EXISTS `exam_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED DEFAULT 0,
  `examination_id` bigint(20) UNSIGNED DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `bulding_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `floor_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `room_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(20) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_schedules`
--

INSERT INTO `exam_schedules` (`id`, `class_id`, `examination_id`, `session_id`, `created_at`, `updated_at`, `exam_class_id`, `section_id`, `bulding_id`, `floor_id`, `room_id`, `status`) VALUES
(17, 4, 4, 0, '2024-05-25 04:24:47', '2024-05-25 04:24:47', 14, 3, 1, 1, 2, 1),
(18, 12, 4, 0, '2024-05-25 04:30:37', '2024-05-25 04:30:37', 15, 7, 1, 1, 2, 1),
(20, 1, 4, 0, '2024-05-25 04:43:36', '2024-05-25 04:43:36', 16, 1, 1, 1, 2, 1),
(21, 1, 4, 0, '2024-05-30 00:50:25', '2024-05-30 00:50:25', 17, 1, 1, 1, 2, 1),
(22, 1, 4, 0, '2024-05-30 03:20:30', '2024-05-30 03:20:30', 18, 1, 1, 1, 3, 1),
(24, 4, 1, 0, '2024-06-01 02:38:23', '2024-06-01 02:38:23', 20, 3, 1, 1, 1, 1),
(25, 12, 1, 0, '2024-06-01 04:22:50', '2024-06-01 04:22:50', 21, 7, 1, 1, 3, 1),
(26, 11, 3, 0, '2024-06-01 04:30:48', '2024-06-01 04:30:48', 22, 8, 1, 1, 2, 1),
(27, 4, 4, 0, '2024-06-01 05:58:46', '2024-06-01 05:58:46', 23, 4, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule_items`
--

CREATE TABLE IF NOT EXISTS `exam_schedule_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `examschedule_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date` varchar(255) DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `bulding_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `floor_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `pass_marke` varchar(255) DEFAULT NULL,
  `fail_marke` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_schedule_items`
--

INSERT INTO `exam_schedule_items` (`id`, `examschedule_id`, `subject_id`, `date`, `room_id`, `bulding_id`, `floor_id`, `pass_marke`, `fail_marke`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 3, '2024-05-11', 1, 2, 2, '33', '32', '16:20', '17:20', 1, '2024-05-11 04:20:38', '2024-05-11 05:41:43'),
(5, 2, 4, '2024-05-11', 1, 1, 2, '33', '32', '16:20', '17:20', 1, '2024-05-11 04:20:38', '2024-05-11 05:41:43'),
(6, 2, 1, '2024-05-11', 1, 2, 2, '33', '32', '17:46', '18:46', 1, '2024-05-11 05:46:20', '2024-05-11 05:46:20'),
(7, 3, 3, '2024-05-11', 1, 1, 2, '300', '200', '17:52', '18:53', 1, '2024-05-11 05:53:03', '2024-05-11 05:53:03'),
(8, 3, 3, '2024-05-15', 1, 2, 2, '200', '300', '17:52', '18:52', 1, '2024-05-11 05:53:03', '2024-05-11 05:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE IF NOT EXISTS `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quizzes', 1, '2024-05-15 04:13:07', '2024-05-15 04:13:07'),
(2, 'Open-book tests.', 1, '2024-05-15 04:13:20', '2024-05-15 04:13:20'),
(3, 'Multiple choice.', 1, '2024-05-15 04:14:00', '2024-05-15 04:14:00'),
(4, 'Mathematical questions', 1, '2024-05-15 04:14:28', '2024-05-22 21:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `description1` longtext DEFAULT NULL,
  `title1` varchar(100) DEFAULT NULL,
  `title2` varchar(100) DEFAULT NULL,
  `description2` longtext DEFAULT NULL,
  `banner_image` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `type`, `question`, `answer`, `created_at`, `updated_at`, `image`, `url`, `description1`, `title1`, `title2`, `description2`, `banner_image`, `description`) VALUES
(7, 'homepage', 'All COURSES', 'http://www.porai.org/all/courses-show', '2023-12-17 21:31:39', '2024-02-01 01:50:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'homepage', 'PARTNERSHIP WITH PORAI.ORG', 'http://www.porai.org/contact', '2023-12-18 01:43:40', '2024-02-01 01:50:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'aboutpage', NULL, NULL, '2023-12-23 23:53:23', '2023-12-26 20:53:18', '17033972030_about_image.png', 'https://www.google.com/', 'Democratize Education through Technology', NULL, NULL, NULL, NULL, 'Democratize Education through Technology'),
(19, 'aboutpage', NULL, NULL, '2023-12-23 23:53:54', '2023-12-26 20:53:18', '17033972340_about_image.png', 'https://www.google.com/', 'Be the Catalyst in narrowing the education and skills gap in Bangladesh', NULL, NULL, NULL, NULL, 'Be the Catalyst in narrowing the education and skills gap in Bangladesh'),
(20, 'aboutpage', NULL, NULL, '2023-12-23 23:54:33', '2023-12-26 20:53:18', '17033972730_about_image.png', 'https://www.google.com/', 'Rapidly Equip the Workforce with In- demand Skills for the market', NULL, NULL, NULL, NULL, 'Rapidly Equip the Workforce with In- demand Skills for the market'),
(21, 'aboutpage', NULL, NULL, '2023-12-23 23:55:02', '2023-12-26 20:53:18', '17033973020_about_image.png', 'https://www.google.com/', 'Coding for Preparing the future generation for digitalization, 4IR &amp; Vision 2041', NULL, NULL, NULL, NULL, 'Coding for Preparing the future generation for digitalization, 4IR &amp; Vision 2041'),
(22, 'aboutpage', NULL, NULL, '2023-12-24 00:07:19', '2023-12-26 20:53:18', '17033980390_about_image.png', 'https://www.google.com/', 'Develop &amp; Curate Nano Degrees with the Industry', NULL, NULL, NULL, NULL, 'Develop &amp; Curate Nano Degrees with the Industry'),
(23, 'aboutpage', NULL, NULL, '2023-12-24 00:07:19', '2023-12-26 20:53:18', '17033980391_about_image.png', 'https://www.google.com/', 'Provide Professional Diplomas in partnership with academic institutions', NULL, NULL, NULL, NULL, 'Provide Professional Diplomas in partnership with academic institutions'),
(25, 'maestroclass', 'Trending', 'www.youtube.com', '2023-12-25 05:04:23', '2023-12-25 05:17:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'maestroclass', 'Branding & Marketing', NULL, '2023-12-25 05:17:32', '2023-12-25 05:17:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'maestroclass', 'Leadership', NULL, '2023-12-25 05:17:32', '2023-12-25 05:17:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'faq_content', NULL, NULL, '2023-12-25 21:48:36', '2023-12-25 22:40:26', NULL, NULL, 'Get answers to frequently asked questions', 'HOW CAN WE HELP?', 'Frequently Asked Questions', 'Did not find the answer to your question? Send it to us now and we will get back to you: support@lead.academy', '1703563997_banner-image.png', NULL),
(29, 'faq', 'What are the accreditations of LEAD Academy?', 'LEAD Academy provides state of the art- digital learning on a global platform. We offer hundreds of interesting and interactive special skills courses and video content in collaboration with Pearson- world’s largest education company, and in partnership with a2i, Cabinet Division, ICT Division and UNDP.', '2023-12-25 22:04:50', '2023-12-25 22:37:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'faq', 'What are the benefits of subscription?', 'Subscription to LEAD Academy will give you access to all our courses, unlimited watch time, Certification on completion of Course. You can also connect with our instructors  and fellow learners across the world, participate in Forum Activities and showcase and share your profile and projects.', '2023-12-25 22:05:20', '2023-12-25 22:40:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'faq', 'What do LEAD Academy courses include?', 'Each LEAD Academy course is created and managed by the instructor(s). The foundation of each LEAD Academy course are its lectures, which can include videos, slides, and text. In addition, instructors can add resources and various types of practice activities and quiz as a way to enhance the learning experience of students. Additional information on LEAD Academy’s platforms and features can be reviewed here.  For tips on how to find courses you may be interested in taking, please click here.', '2023-12-25 22:05:20', '2023-12-25 22:40:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'faq', 'How long is the subscription valid for?', 'Our monthly subscriptions are valid for one month from the date of subscription. Our yearly subscriptions are valid for one year from the date of subscription. To know more about our subscription packages, click here.', '2023-12-25 22:05:20', '2023-12-25 22:40:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'faq', 'How do I take a LEAD Academy course?', 'LEAD Academy courses are on-demand. You can explore and choose your desired courses from our diverse range of categories available. You can begin the course whenever you like. LEAD Academy courses can be accessed from several different devices and platforms, including a desktop, laptop, and mobile phones.', '2023-12-25 22:40:26', '2023-12-25 22:40:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'homepage', 'Kazi Arman', 'http://www.porai.org/contact', '2024-02-07 16:57:51', '2024-02-07 16:57:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `particular_name` varchar(255) DEFAULT NULL,
  `particular_duration` varchar(255) DEFAULT NULL,
  `is_dynamic` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `particular_name`, `particular_duration`, `is_dynamic`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Exam Fee', NULL, 0, 1, '2024-05-13 01:24:13', '2024-05-13 01:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `fee_management`
--

CREATE TABLE IF NOT EXISTS `fee_management` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fee_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fee_amount` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_management`
--

INSERT INTO `fee_management` (`id`, `class_id`, `fee_id`, `session_id`, `fee_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, '200', 1, '2024-05-13 01:26:00', '2024-05-13 01:26:00'),
(2, 4, 1, 6, '300', 1, '2024-05-13 23:35:28', '2024-05-13 23:35:28'),
(3, 12, 1, 6, '200', 1, '2024-05-20 22:45:51', '2024-05-20 22:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE IF NOT EXISTS `floors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bulding_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `bulding_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bulding-1_Flooor_1', 1, '2024-05-11 05:04:38', '2024-05-11 05:04:38'),
(2, 1, 'Bulding-2_floor-2', 1, '2024-05-11 05:05:08', '2024-05-11 05:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `founder_co_funderes`
--

CREATE TABLE IF NOT EXISTS `founder_co_funderes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `founder_co_funderes`
--

INSERT INTO `founder_co_funderes` (`id`, `name`, `designation`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `linkedin`, `about`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kazi Arman', 'Founder & CEO', '0185888888', 'navieapc9@gmail.com', 'https://www.facebook.com/navieasoftusbd', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fnavieasoft', 'https://www.facebook.com/navieasoftusbd', 'https://www.facebook.com/navieasoftusbd', '<p>f ds dsfdsf df</p>', '18527675241705900137_founder_co_funder.jpg', 1, '2024-01-21 23:05:42', '2024-01-22 00:50:51'),
(3, 'MD ASLAM ANSARI', 'Laravel Developer', NULL, NULL, NULL, NULL, NULL, NULL, '<p>asdasd</p>', '5306065651716620084_founder_co_funder.jpg', 1, '2024-01-21 23:16:18', '2024-05-25 00:54:44'),
(4, 'Nusrath Jahan Rim', 'Founder', NULL, NULL, NULL, NULL, NULL, NULL, '', '19486702221716620145_founder_co_funder.jpg', 1, '2024-01-22 05:51:28', '2024-05-25 00:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `media_type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `media_type`, `image`, `video`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(2, 'shohag', 'image', '18604585691716360390.jpg', NULL, NULL, 1, '2024-05-22 00:34:09', '2024-05-22 00:46:30'),
(3, NULL, 'image', '19024088241716360471.jpg', NULL, NULL, 1, '2024-05-22 00:47:51', '2024-05-22 00:54:27'),
(4, NULL, 'image', '18769262511716360821.jpg', NULL, NULL, 1, '2024-05-22 00:48:02', '2024-05-22 00:53:41'),
(5, NULL, 'image', '17856414491716360811.jpg', NULL, NULL, 1, '2024-05-22 00:48:13', '2024-05-22 00:53:31'),
(6, NULL, 'image', '11370986991716360801.jpg', NULL, NULL, 1, '2024-05-22 00:48:25', '2024-05-22 00:53:21'),
(7, NULL, 'image', '8762451801716360792.jpg', NULL, NULL, 1, '2024-05-22 00:48:36', '2024-05-22 00:53:12'),
(8, 'fdgfdgsdg', 'image', '18405985051716360782.jpg', NULL, NULL, 1, '2024-05-22 00:48:48', '2024-06-09 00:49:28'),
(9, 'shohag', 'image', '6626202971716360762.jpg', NULL, NULL, 1, '2024-05-22 00:48:59', '2024-06-09 00:45:41'),
(10, 'adfsdf', 'image', '20910873501717914564.jpg', NULL, NULL, 1, '2024-05-24 22:48:05', '2024-06-09 00:45:52'),
(11, 'shohag', 'video', NULL, '12336213811717569241.mp4', '20422349141717569241.jpeg', 1, '2024-06-05 00:34:01', '2024-06-05 00:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` int(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `class_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Science', 1, '2024-05-09 02:33:26', '2024-05-26 01:08:37'),
(3, 4, 'Arts', 1, '2024-05-09 02:34:26', '2024-05-13 23:34:29'),
(6, 1, 'Commerce', 1, '2024-05-26 01:09:07', '2024-05-26 01:09:07'),
(7, 1, 'arth', 1, '2024-05-26 04:59:42', '2024-05-26 04:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `home_content_class_lists`
--

CREATE TABLE IF NOT EXISTS `home_content_class_lists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_content_class_lists`
--

INSERT INTO `home_content_class_lists` (`id`, `class_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2024-05-23 02:14:56', '2024-05-23 02:14:56'),
(3, 5, 1, '2024-05-23 02:14:56', '2024-05-23 02:14:56'),
(4, 9, 1, '2024-05-23 02:55:28', '2024-05-23 02:55:28'),
(5, 8, 1, '2024-05-23 02:55:28', '2024-05-23 02:55:28'),
(6, 7, 1, '2024-05-23 02:55:28', '2024-05-23 02:55:28'),
(7, 6, 1, '2024-05-23 02:55:28', '2024-05-23 02:55:28'),
(9, 1, 1, '2024-05-23 02:56:02', '2024-05-23 02:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `home_content_items`
--

CREATE TABLE IF NOT EXISTS `home_content_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_content_items`
--

INSERT INTO `home_content_items` (`id`, `type`, `title`, `url`, `description`, `created_at`, `updated_at`) VALUES
(5, 'homepage', 'FREE courses', 'https://www.navieasoft.com/', 'Social & National interest courses aligned with Vision 2041', '2023-12-19 01:18:47', '2024-01-31 15:01:58'),
(6, 'homepage', 'MuktoPaath', 'https://www.navieasoft.com/', 'MuktoPaath is a government e-Learning platform .', '2023-12-19 01:18:47', '2024-05-22 21:09:24'),
(7, 'homepage', 'Affiliate Program', 'https://www.navieasoft.com/', 'Become a Porai Affiliate & earn commission from each sale', '2023-12-19 03:55:53', '2024-01-31 15:01:58'),
(8, 'homepage', 'Porai Talk', 'https://www.navieasoft.com/', 'Ideas that can change your life', '2023-12-19 03:55:53', '2024-02-01 01:50:39'),
(9, 'homepage', 'MuktoPaath', 'https://www.navieasoft.com/', 'Become a Porai Affiliate', '2024-05-22 21:07:48', '2024-05-22 21:08:35'),
(10, 'homepage', 'FREE courses', 'https://www.navieasoft.com/', 'Ideas that can change your life', '2024-05-22 21:07:48', '2024-05-22 21:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `home_content_locations`
--

CREATE TABLE IF NOT EXISTS `home_content_locations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_loction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_content_locations`
--

INSERT INTO `home_content_locations` (`id`, `type_loction_id`, `location_id`, `created_at`, `updated_at`) VALUES
(16, 2, 6, '2024-03-02 03:52:04', '2024-03-02 06:21:54'),
(17, 4, 7, '2024-03-02 03:55:31', '2024-03-02 03:55:31'),
(18, 4, 8, '2024-03-02 03:55:31', '2024-03-02 06:21:34'),
(19, 4, 6, '2024-03-02 03:55:31', '2024-03-02 03:55:31'),
(20, 1, 1, '2024-03-02 03:55:31', '2024-03-02 03:55:31'),
(21, 4, 5, '2024-03-02 03:55:31', '2024-03-02 03:55:31'),
(22, 4, 9, '2024-03-02 03:55:31', '2024-03-02 06:22:58'),
(23, 1, 1, '2024-03-09 03:28:27', '2024-03-09 03:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `home_content_setups`
--

CREATE TABLE IF NOT EXISTS `home_content_setups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sub_banner_title` varchar(255) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `partner_title` varchar(255) DEFAULT NULL,
  `client_title` varchar(255) DEFAULT NULL,
  `counting_title` varchar(255) DEFAULT NULL,
  `review_title1` longtext DEFAULT NULL,
  `review_title2` varchar(255) DEFAULT NULL,
  `package_title` varchar(255) DEFAULT NULL,
  `question_title` varchar(255) DEFAULT NULL,
  `ques_short_des` varchar(255) DEFAULT NULL,
  `question_button_text` varchar(255) DEFAULT NULL,
  `question_button_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_image` varchar(255) DEFAULT NULL,
  `sub_banner_thumbnail` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `sub_banner_image` varchar(255) DEFAULT NULL,
  `banner_text` longtext DEFAULT NULL,
  `banner_video` varchar(255) DEFAULT NULL,
  `sub_banner_video` varchar(255) DEFAULT NULL,
  `learn_image` text DEFAULT NULL,
  `learn_title` longtext DEFAULT NULL,
  `count_num_1` varchar(100) DEFAULT NULL,
  `count_num_2` varchar(100) DEFAULT NULL,
  `count_num_3` varchar(100) DEFAULT NULL,
  `count_num_4` varchar(100) DEFAULT NULL,
  `count_text_1` varchar(100) DEFAULT NULL,
  `count_text_2` varchar(100) DEFAULT NULL,
  `count_text_3` varchar(100) DEFAULT NULL,
  `count_text_4` varchar(100) DEFAULT NULL,
  `package_text` varchar(255) DEFAULT NULL,
  `package_btn` varchar(100) DEFAULT NULL,
  `package_btn_url` varchar(100) DEFAULT NULL,
  `register_image` text DEFAULT NULL,
  `register_title` varchar(255) DEFAULT NULL,
  `register_des` varchar(255) DEFAULT NULL,
  `university_location_title` varchar(255) DEFAULT NULL,
  `university_title` varchar(255) DEFAULT NULL,
  `university_image` varchar(255) DEFAULT NULL,
  `founder_title` varchar(255) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `teacher_title` varchar(255) DEFAULT NULL,
  `topper_title` varchar(255) DEFAULT NULL,
  `class_list_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_content_setups`
--

INSERT INTO `home_content_setups` (`id`, `sub_banner_title`, `course_title`, `partner_title`, `client_title`, `counting_title`, `review_title1`, `review_title2`, `package_title`, `question_title`, `ques_short_des`, `question_button_text`, `question_button_url`, `created_at`, `updated_at`, `question_image`, `sub_banner_thumbnail`, `banner_image`, `sub_banner_image`, `banner_text`, `banner_video`, `sub_banner_video`, `learn_image`, `learn_title`, `count_num_1`, `count_num_2`, `count_num_3`, `count_num_4`, `count_text_1`, `count_text_2`, `count_text_3`, `count_text_4`, `package_text`, `package_btn`, `package_btn_url`, `register_image`, `register_title`, `register_des`, `university_location_title`, `university_title`, `university_image`, `founder_title`, `blog_title`, `teacher_title`, `topper_title`, `class_list_title`) VALUES
(2, 'Unlimited Access to World Class Online Learning', 'EXPLORE COURSES', 'We collaborate with', 'Featured In', 'STRENGTH IN NUMBERS', 'Testimonials', 'What Our Learners Are Saying', 'Ready To Start?', 'Any Questions', 'Leave your name, e-mail & phone number, we will get back to you soon..', 'Need a consultation', 'https://www.navieasoft.com/', '2023-12-12 04:28:32', '2024-06-09 01:39:56', '1706704559_question_image.png', '1706729101_sub_banner_thumbnail-logo.png', '1706732984_banner-image.png', '1706733636_sub_banner_image.png', 'your Brain expert we are always provide Best Courses For You&nbsp;', '1706730318_banner_video.mp4', 'https://www.youtube.com/watch?v=SaQ37662wl0', '1706731188_learn_image.jpg', 'LEARN ANYTHING, ANYWHERE AND ACCELERATE <span style=\"color: rgb(0, 0, 255);\">YOUR FUTURE</span>', '10000', '101', '6', '9800', 'Registrants', 'Total courses', 'Languages', 'Successful students', 'Save 20% with our Annual Plan. Any Question', 'Contact Us', 'https://www.navieasoft.com/', '1706734042_banner-image.png', 'Join Porai live class', 'Get Unlimited Access To World Class Online Learning and We provide lady teacher for girls.', 'Class List', 'Discover China\'s World Class Universities', '1709976652_university_image.jpg', 'Founder And CEO', 'Blog', 'OUR TEACHERS', 'Topper Student', 'CLASS LIST');

-- --------------------------------------------------------

--
-- Table structure for table `home_icon_contents`
--

CREATE TABLE IF NOT EXISTS `home_icon_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_icon_contents`
--

INSERT INTO `home_icon_contents` (`id`, `type`, `icon`, `text`, `created_at`, `updated_at`, `image`) VALUES
(17, 'appointment', '', NULL, '2023-12-17 21:31:39', '2023-12-17 21:31:39', NULL),
(18, 'call_doctor', '', NULL, '2023-12-17 21:31:39', '2023-12-17 21:31:39', NULL),
(19, 'ambulance', '', NULL, '2023-12-17 21:31:39', '2023-12-17 21:31:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_works`
--

CREATE TABLE IF NOT EXISTS `home_works` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `lession_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `page_number` varchar(255) DEFAULT NULL,
  `home_workpdf` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_works`
--

INSERT INTO `home_works` (`id`, `name`, `teacher_id`, `class_id`, `session_id`, `subject_id`, `section_id`, `lession_id`, `page_number`, `home_workpdf`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'shohag', 186, 1, 6, 1, 1, 1, '2,3', '14537195681717826491.pdf', 'fsgfdsgsdfg', 1, '2024-06-08 00:01:31', '2024-06-08 00:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `hrbankbranches`
--

CREATE TABLE IF NOT EXISTS `hrbankbranches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hrbank_id` bigint(20) UNSIGNED NOT NULL,
  `branch` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hrbankbranches_hrbank_id_foreign` (`hrbank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrbanks`
--

CREATE TABLE IF NOT EXISTS `hrbanks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  `bank_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrleaves`
--

CREATE TABLE IF NOT EXISTS `hrleaves` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hrleaves_employee_id_foreign` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrranks`
--

CREATE TABLE IF NOT EXISTS `hrranks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hrrank_title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrshifts`
--

CREATE TABLE IF NOT EXISTS `hrshifts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_page_contents`
--

CREATE TABLE IF NOT EXISTS `instructor_page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content_name` varchar(255) DEFAULT NULL,
  `contentimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_page_contents`
--

INSERT INTO `instructor_page_contents` (`id`, `instructor_id`, `content_name`, `contentimage`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sign in as an instructor & create your dynamic profile', '17033971450.png', '2023-12-23 23:52:25', '2023-12-24 01:22:22'),
(2, 1, 'Share your projects, participate in live discussion forums & blogs', '17033972650.png', '2023-12-23 23:54:25', '2023-12-23 23:54:25'),
(4, 1, 'Also record courses individually at your own pace & time or schedule live classes', '17033972652.png', '2023-12-23 23:54:25', '2023-12-23 23:54:25'),
(5, 1, 'Use our professional multimedia studio or smart classroom to record your course', '17033972653.png', '2023-12-23 23:54:25', '2023-12-23 23:54:25'),
(8, 1, 'Add adaptive quizzes & resources, interact with your students & track progress', '17033973101.png', '2023-12-23 23:55:10', '2023-12-23 23:55:10'),
(13, 1, 'Develop courses with us or share your own courses', '17034001930.png', '2023-12-24 00:43:13', '2023-12-24 00:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_page_setups`
--

CREATE TABLE IF NOT EXISTS `instructor_page_setups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `top_title` varchar(255) DEFAULT NULL,
  `description1` longtext DEFAULT NULL,
  `button1` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `videolink1` varchar(255) DEFAULT NULL,
  `text1` longtext DEFAULT NULL,
  `text2` longtext DEFAULT NULL,
  `text3` longtext DEFAULT NULL,
  `ptext1` longtext DEFAULT NULL,
  `ptext2` longtext DEFAULT NULL,
  `ptext3` longtext DEFAULT NULL,
  `ptext4` longtext DEFAULT NULL,
  `text4` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `button2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_page_setups`
--

INSERT INTO `instructor_page_setups` (`id`, `top_title`, `description1`, `button1`, `image1`, `videolink1`, `text1`, `text2`, `text3`, `ptext1`, `ptext2`, `ptext3`, `ptext4`, `text4`, `email`, `button2`, `created_at`, `updated_at`) VALUES
(1, 'Join Our Dynamic Learning Platform', 'Create Online Courses With Us Become A Lead Academy Certified Instructor', 'Get Started', '1703392934_image.png', 'https://www.youtube.com/watch?v=RsZ0WGHIipw', 'Get The Finest Impression Of Teaching In Our World-Class Platform And Receive The Premium Advantages By Sharing Your Knowledge', 'Become Our Instructor', 'Meet Our Instructors', 'HIGHER Pay Per Minute', 'HIGHER Revenue Share', 'WIDER Audience Exposure', 'FLEXIBLE Payout Options', 'To know more contact us', 'partnership@lead.academy', 'Get Started', '2023-12-23 22:40:09', '2023-12-24 00:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=437 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learner_page_contents`
--

CREATE TABLE IF NOT EXISTS `learner_page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `learner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contentimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learner_page_setups`
--

CREATE TABLE IF NOT EXISTS `learner_page_setups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `top_title` varchar(255) DEFAULT NULL,
  `description1` varchar(255) DEFAULT NULL,
  `button1` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `tleftcontent` longtext DEFAULT NULL,
  `tmiddlecontent` longtext DEFAULT NULL,
  `trightcontent` longtext DEFAULT NULL,
  `bleftcontent` longtext DEFAULT NULL,
  `bmiddlecontent` longtext DEFAULT NULL,
  `brightcontent` longtext DEFAULT NULL,
  `tlefttext` longtext DEFAULT NULL,
  `trighttext` longtext DEFAULT NULL,
  `middletext` longtext DEFAULT NULL,
  `blefttext` longtext DEFAULT NULL,
  `brighttext` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learner_page_setups`
--

INSERT INTO `learner_page_setups` (`id`, `top_title`, `description1`, `button1`, `image1`, `tleftcontent`, `tmiddlecontent`, `trightcontent`, `bleftcontent`, `bmiddlecontent`, `brightcontent`, `tlefttext`, `trighttext`, `middletext`, `blefttext`, `brighttext`, `created_at`, `updated_at`) VALUES
(1, 'Get an Overall Immersive Experience With Us!', 'Join LEAD Academy Today To Access Our Diverse Range Of Courses With The Most Advanced Features & Accelerate Your Learning At Your Pace', 'Get Started', '1703333261_image.png', 'State of the art, user-friendly platform with most advanced learning tools like- ask your teacher, take notes, whiteboard', 'Courses & programs created by industry experts & renowned academic institutions, via our rigorous quality assurance system', 'Diverse course categories based on skills gap, matched to industry demand & requirement', 'Your dynamic profile with skills mapping for future job market & recruitment', 'Find Social & National interests courses in partnership with Govt & NGOs & be part of vision 2041', 'Subscription based model with one flat fee to access all courses & individual course purchase option', 'Sign in as a learner & create your dynamic profile', 'Subscribe & get access to unlimited watch time & other exciting features', 'Become Our Learner', 'Interact with your instructors, take notes, enjoy interactive content and advanced features like active white board technology', 'share your projects, join in live discussions, webinars, participate in blogs & forums', '2023-12-23 04:00:28', '2023-12-23 06:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `lessions`
--

CREATE TABLE IF NOT EXISTS `lessions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessions`
--

INSERT INTO `lessions` (`id`, `class_id`, `subject_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lession 1', 1, '2024-06-02 23:09:15', '2024-06-03 02:00:47'),
(2, 1, 1, 'Lession 2', 1, '2024-06-02 23:10:52', '2024-06-03 02:01:00'),
(3, 1, 1, 'Lession 3', 1, '2024-06-02 23:11:06', '2024-06-03 02:01:15'),
(5, 1, 1, 'Lession 4', 1, '2024-06-03 01:18:08', '2024-06-03 02:01:25'),
(6, 1, 1, 'Lession 5', 1, '2024-06-03 01:18:26', '2024-06-03 02:01:35'),
(7, 1, 3, 'Lession 1', 1, '2024-06-03 01:18:52', '2024-06-03 02:01:49'),
(8, 1, 3, 'Lession 2', 1, '2024-06-03 01:19:08', '2024-06-03 02:02:06'),
(9, 1, 3, 'Lession 3', 1, '2024-06-03 01:19:28', '2024-06-03 02:02:24'),
(10, 1, 3, 'Lession 4', 1, '2024-06-03 01:19:42', '2024-06-03 02:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE IF NOT EXISTS `libraries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` longtext DEFAULT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `timer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `description`, `title1`, `title2`, `image`, `timer`, `created_at`, `updated_at`) VALUES
(1, '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Our website is under construction. We\'ll be here soon with our new awesome site, subscribe to be notified</span><br></p>', 'WE\'RE COMING SOON', 'Notify me when it\'s ready', '1703396273_image.png', '2028-05-23T19:39', '2023-12-23 23:25:37', '2024-01-04 23:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `likes_user_id_blog_id_unique` (`user_id`,`blog_id`),
  KEY `likes_blog_id_foreign` (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `blog_id`, `created_at`, `updated_at`) VALUES
(25, 174, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maestro_class_setups`
--

CREATE TABLE IF NOT EXISTS `maestro_class_setups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `banner_image` text DEFAULT NULL,
  `banner_video` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maestro_class_setups`
--

INSERT INTO `maestro_class_setups` (`id`, `banner_title`, `title2`, `title3`, `banner_image`, `banner_video`, `created_at`, `updated_at`) VALUES
(1, 'MaestroClass', 'Start your journey today.', 'Full Free learning from the maestros.', '1703652803_banner-image.svg', '1703502953_banner_video.mp4', '2023-12-25 05:04:23', '2023-12-26 22:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `column_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `position`, `url`, `type`, `status`, `created_at`, `updated_at`, `column_num`) VALUES
(1, 'About', '1', 'about', 'header_menu', 1, '2024-01-09 22:40:35', '2024-01-10 01:25:56', NULL),
(2, 'Student', '9', 'learner', 'header_menu', 1, '2024-01-09 22:41:05', '2024-06-08 01:57:31', NULL),
(4, 'Teacher', '2', 'instructor', 'header_menu', 1, '2024-01-09 23:36:06', '2024-05-24 23:47:14', NULL),
(5, 'Contact', '7', 'contact', 'header_menu', 1, '2024-01-09 23:36:34', '2024-05-24 23:58:03', NULL),
(6, 'Library', '9', 'library', 'header_menu', 1, '2024-01-09 23:36:54', '2024-05-24 23:56:53', NULL),
(7, 'Event', '6', 'event-list', 'header_menu', 1, '2024-01-09 23:37:18', '2024-01-09 23:37:18', NULL),
(8, 'Blog', '5', 'blogs', 'header_menu', 1, '2024-01-09 23:37:38', '2024-05-24 23:57:05', NULL),
(13, 'About US', '1', 'about', 'footer_menu', 1, '2024-01-10 01:07:59', '2024-01-10 01:07:59', 1),
(14, 'Become an instructor', '2', 'instructor', 'footer_menu', 1, '2024-01-10 01:08:26', '2024-01-10 01:08:26', 1),
(15, 'Become an instructor', '3', 'library', 'footer_menu', 1, '2024-01-10 01:09:36', '2024-01-10 01:09:36', 1),
(16, 'Contact Us', '1', 'contact', 'footer_menu', 1, '2024-01-10 01:10:13', '2024-01-10 01:10:13', 2),
(17, 'FAQ', '2', 'faqs', 'footer_menu', 1, '2024-01-10 01:11:02', '2024-01-10 01:11:02', 2),
(18, 'Terms & Conditions', '1', 'terms-conditions', 'footer_menu', 1, '2024-01-10 01:11:26', '2024-01-10 01:11:26', 3),
(19, 'Refund and Return Policy', '2', 'refund-policy', 'footer_menu', 1, '2024-01-10 01:11:49', '2024-01-10 01:11:49', 3),
(20, 'Privacy Policy', '3', 'privacy-policy', 'footer_menu', 1, '2024-01-10 01:12:14', '2024-01-10 01:26:09', 3),
(25, 'E-Book', '9', 'e-book-list', 'header_menu', 1, '2024-01-25 05:21:42', '2024-01-25 05:21:42', NULL),
(26, 'E-Book', '4', 'e-book-list', 'footer_menu', 1, '2024-01-30 05:32:03', '2024-01-30 05:32:03', 2),
(28, 'Daily Class Video', '9', 'daily-class-video-page', 'header_menu', 1, '2024-02-05 14:56:00', '2024-06-09 00:10:09', NULL),
(29, 'Gallery', '3', 'gallery-list', 'header_menu', 1, '2024-05-22 01:07:31', '2024-05-24 23:56:03', NULL),
(30, 'Notice', '4', 'notice-list', 'header_menu', 1, '2024-05-24 21:34:17', '2024-05-24 23:56:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2013_10_11_063710_create_pay_withs_table', 1),
(8, '2011_09_11_084154_create_courses_table', 2),
(9, '2011_10_11_085126_create_course_languages_table', 2),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(11, '2022_12_17_031357_create_course_requisites_table', 3),
(12, '2023_12_17_031821_create_course_learns_table', 3),
(13, '2023_12_17_032316_create_course_career_outcomes_table', 3),
(14, '2023_12_17_032618_create_course_skills_table', 3),
(15, '2023_12_17_034611_create_course_contens_table', 3),
(16, '2023_12_17_093704_create_course_lessons_table', 4),
(17, '2023_12_17_093757_create_course_lesson_videos_table', 4),
(18, '2023_12_19_054406_create_home_content_items_table', 4),
(19, '2023_12_21_084040_create_about_page_setups_table', 5),
(20, '2023_11_23_053758_create_user_contacts_table', 6),
(21, '2023_11_23_091253_create_learner_page_setups_table', 6),
(22, '2023_11_23_100320_create_learner_page_contents_table', 6),
(23, '2023_11_24_034842_create_instructor_page_setups_table', 6),
(24, '2023_12_24_052107_create_libraries_table', 6),
(25, '2023_11_22_052520_create_instructor_page_contents_table', 7),
(26, '2023_11_24_111037_create_days_table', 7),
(27, '2023_12_25_034910_create_comments_table', 7),
(28, '2023_12_25_042621_create_likes_table', 8),
(29, '2023_11_25_032448_create_event_schedules_table', 9),
(30, '2023_11_25_053649_create_events_table', 9),
(31, '2023_12_25_104531_create_maestro_class_setups_table', 9),
(32, '2023_11_27_051740_create_countries_table', 10),
(33, '2023_11_27_063548_create_orders_table', 11),
(34, '2023_11_27_064451_create_carts_table', 12),
(35, '2023_11_29_085312_create_course_resource_files_table', 12),
(36, '2023_11_29_090607_create_course_lesson_files_table', 12),
(37, '2023_11_29_095648_create_course_quiz_files_table', 12),
(38, '2023_11_29_101501_create_coursezproject_files_table', 12),
(39, '2023_12_30_091546_create_testimonials_table', 12),
(40, '2023_11_01_105752_create_event_participants_table', 13),
(41, '2023_11_02_032636_create_notifications_table', 14),
(42, '2023_11_30_083041_create_reviews_table', 15),
(43, '2024_01_02_062424_create_billing_addresses_table', 15),
(44, '2024_01_02_064540_create_tags_table', 15),
(45, '2023_11_02_103224_create_event_carts_table', 16),
(46, '2024_01_04_024548_create_topics_table', 16),
(47, '2023_01_04_031810_create_course_saves_table', 17),
(48, '2023_01_04_130719_create_course_participants_table', 18),
(49, '2023_01_04_142246_create_use_subscriptions_table', 18),
(50, '2023_01_08_071502_create_coupons_table', 18),
(51, '2023_01_08_111429_create_related_courses_table', 19),
(52, '2024_01_10_040007_create_menus_table', 19),
(53, '2024_01_20_055427_create_tp_options_table', 20),
(54, '2024_01_22_041811_create_founder_co_funderes_table', 20),
(55, '2024_01_23_110416_create_currencies_table', 21),
(56, '2024_01_25_043902_create_ebooks_table', 22),
(57, '2024_01_25_043903_create_ebooks_table', 23),
(58, '2023_01_25_111704_create_event_banners_table', 24),
(59, '2024_01_27_060553_create_ebook_contents_table', 24),
(60, '2024_01_28_041008_create_ebook_video_contents_table', 25),
(61, '2024_01_28_041553_create_ebook_audio_contents_table', 25),
(62, '2023_01_28_092759_create_ebook_participants_table', 26),
(63, '2023_02_03_030047_create_related_ebooks_table', 26),
(64, '2023_02_03_120958_create_useraccesses_table', 26),
(65, '2024_02_04_071742_create_withdrawals_table', 26),
(66, '2024_02_05_024309_create_revenues_table', 26),
(67, '2024_02_15_063057_create_certificates_table', 26),
(68, '2024_05_09_045735_create_classes_table', 27),
(69, '2024_05_09_052920_create_subjects_table', 28),
(70, '2024_05_09_071547_create_academic_years_table', 29),
(71, '2024_05_09_071901_create_groups_table', 30),
(72, '2024_05_09_100622_create_sessions_table', 30),
(73, '2024_08_19_000000_create_failed_jobs_table', 30),
(74, '2024_05_09_094037_create_buldings_table', 31),
(75, '2024_05_09_094624_create_floors_table', 31),
(76, '2024_05_09_101523_create_rooms_table', 31),
(77, '2024_05_11_041331_create_exams_table', 31),
(78, '2024_05_11_042132_create_exam_schedules_table', 32),
(79, '2024_05_09_105234_create_school_sections_table', 33),
(80, '2024_05_11_042144_create_examinations_table', 33),
(81, '2024_05_11_073949_create_exam_schedule_items_table', 34),
(82, '2024_05_11_044256_create_notices_table', 35),
(83, '2024_05_11_073241_create_batches_table', 35),
(84, '2024_05_11_075518_create_batch_days_table', 35),
(85, '2024_05_12_033316_create_class_routines_table', 35),
(86, '2024_05_12_033324_create_class_routine_items_table', 35),
(87, '2024_05_12_030906_create_admissions_table', 36),
(88, '2024_05_12_054416_create_fees_table', 36),
(89, '2024_05_12_063018_create_fee_management_table', 36),
(91, '2024_05_13_045041_create_home_works_table', 37),
(92, '2024_05_13_062128_create_admission_certificates_table', 38),
(93, '2024_05_13_072812_create_students_table', 38),
(95, '2024_05_14_072514_create_class_durations_table', 39),
(97, '2024_05_15_074846_create_class_test_exams_table', 40),
(98, '2024_05_15_094827_create_exam_types_table', 41),
(99, '2024_05_15_111630_create_exam_classes_table', 42),
(100, '2024_05_16_050522_create_subject_teacher_assents_table', 43),
(101, '2024_05_21_052056_create_exam_results_table', 44),
(102, '2024_05_21_033439_create_designations_table', 45),
(103, '2024_05_22_055733_create_galleries_table', 46),
(104, '2024_05_23_073802_create_home_content_class_lists_table', 47),
(105, '2024_05_26_062739_create_directions_table', 48),
(106, '2024_05_26_062757_create_shelves_table', 48),
(107, '2024_05_26_075445_create_books_table', 48),
(108, '2024_05_27_084921_create_borrows_table', 48),
(109, '2024_05_27_084938_create_borrow_items_table', 48),
(110, '2024_06_02_114228_create_daily_classes_table', 49),
(111, '2024_06_04_030702_create_notice_types_table', 50);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `noticetype_id` bigint(20) UNSIGNED DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `notice_file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `noticetype_id`, `name`, `description`, `notice_file`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Rocket-এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি', 'Day long celebrations on the occasion of the 35th Anniversary of Sunshine Education will be held on 14th January. Location: Hall 24 Convention Center.', 'Rocket-এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি1717476899.pdf', 1, '2024-05-24 22:12:43', '2024-06-03 22:54:59'),
(3, 3, 'হোস্টেল আসন বরাদ্দপ্রাপ্ত ছাত্রীদের প্রয়োজনীয় উপকরণসমূহ', 'Sunshine Open Day for Academic Session 2019-20 will be held on 7th July. Time: 09.30 am – 3.00 pm.\r\nFind WordPress from this list. If you have installed the WordPress Importing Plugin, then you will see the option named Run Importer. In case you don’t have it installed, simply click on Install Now.\r\n\r\nOnce it’s installed, you’ll be able to see the Run Importer option so click on that. Then, click on Choose File to upload the XML file you previously downloaded. Lastly, click on Upload File and Import to continue.', 'হোস্টেল আসন বরাদ্দপ্রাপ্ত ছাত্রীদের প্রয়োজনীয় উপকরণসমূহ1717476699.pdf', 1, '2024-05-24 22:23:26', '2024-06-03 22:51:39'),
(5, 5, '২০২৩-২৪ শিক্ষাবর্ষে মেডিকেল ভর্তি পরীক্ষায় সফল শিক্ষার্থীদের তালিকা।', 'fdgfdsgsdfg', '২০২৩-২৪ শিক্ষাবর্ষে মেডিকেল ভর্তি পরীক্ষায় সফল শিক্ষার্থীদের তালিকা।1717476837.pdf', 1, '2024-05-26 04:38:04', '2024-06-03 22:53:57'),
(6, 6, 'একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি', 'dsgdfhfgdh', 'একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি1717476796.pdf', 1, '2024-06-03 22:11:48', '2024-06-03 22:53:16'),
(7, 6, 'TAP -এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি', 'dfsdg', 'TAP -এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি1717477020.pdf', 1, '2024-06-03 22:57:00', '2024-06-04 05:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `notice_types`
--

CREATE TABLE IF NOT EXISTS `notice_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_types`
--

INSERT INTO `notice_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Office Notice', 1, '2024-06-03 21:19:20', '2024-06-03 21:19:20'),
(2, 'Academic Notice', 1, '2024-06-03 21:19:40', '2024-06-03 21:19:40'),
(3, 'Daily Notice', 1, '2024-06-03 21:38:35', '2024-06-03 21:39:14'),
(4, 'Monthly Notice', 1, '2024-06-03 21:39:00', '2024-06-03 21:39:00'),
(5, 'Yearly Notice', 1, '2024-06-03 21:39:33', '2024-06-03 21:39:33'),
(6, 'Instant Notice', 1, '2024-06-03 21:39:53', '2024-06-03 21:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `relation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `is_read` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `relation_id`, `user_id`, `text`, `type`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Program Application Approved', 'university', '0', '2024-03-10 04:21:53', '2024-03-10 04:21:53'),
(2, 5, 288, 'Program Application Approved', 'university', '0', '2024-03-10 04:21:53', '2024-03-10 04:21:53'),
(3, 5, 276, 'Your Application Approved', 'university', '0', '2024-03-10 04:21:53', '2024-03-10 04:21:53'),
(4, 36, 1, 'Course Order', 'course', '0', '2024-03-30 22:53:32', '2024-03-30 22:53:32'),
(5, 36, 276, 'Course Order successfully', 'course', '0', '2024-03-30 22:53:32', '2024-03-30 22:53:32'),
(6, 36, 178, 'Course Order', 'course', '0', '2024-03-30 22:53:32', '2024-03-30 22:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `agree` int(11) DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `sub_total` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `payment_method` enum('cod','paypal','stripe') NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `order_note` varchar(255) DEFAULT NULL,
  `seller_amount` float NOT NULL DEFAULT 0,
  `admin_amount` float NOT NULL DEFAULT 0,
  `status` enum('new','processing','delivered','cancel') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `country_id`, `name`, `email`, `address`, `mobile`, `city`, `state`, `agree`, `order_type`, `postcode`, `sub_total`, `total_amount`, `coupon`, `payment_method`, `payment_status`, `order_note`, `seller_amount`, `admin_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ORD-IULRZDRUTX', 258, 6, 'Beginner', 'ssss1@gmail.com', 'Dhaka', '0185888888', 'cumilla', 'Dhaka', 0, 'courseorder', '78', 4900.00, 4900.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-29 01:57:41', '2024-01-29 01:57:41'),
(2, 'ORD-AQOSWC23TF', 258, 16, 'Beginner', 'ssss1@gmail.com', 'Dhaka, Bangladesh', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '89', 990.00, 990.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-29 02:00:08', '2024-01-29 02:00:08'),
(3, 'ORD-CQJ85V1XOG', 258, 15, 'Beginner', 'ssss1@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '78', 4900.00, 4900.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-29 02:02:00', '2024-01-29 02:02:00'),
(4, 'ORD-O5PYM3MKBJ', 259, 19, 'student', 'sstudent@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '23424', 4900.00, 4900.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-29 02:03:07', '2024-01-29 02:03:07'),
(5, 'ORD-ODK4YRZSXT', 258, 2, 'Beginner', 'ssss1@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '23424', 3400.00, 3400.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-29 02:51:58', '2024-01-29 02:51:58'),
(6, 'ORD-40OE8T2AT1', 258, 18, 'Beginner', 'ssss1@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '11111', 990.00, 990.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-29 05:42:58', '2024-01-29 05:42:58'),
(7, 'ORD-WFDYE01CB5', 262, 19, 'gdfgdfg', 'nusdfdsfrse@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '23423', 990.00, 990.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-29 23:36:02', '2024-01-29 23:36:02'),
(8, 'ORD-7NOBRWUMWY', 262, 19, 'gdfgdfg', 'nusdfdsfrse@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '1212', 900.00, 900.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-30 01:15:23', '2024-01-30 01:15:23'),
(9, 'ORD-XV9FUCNBLH', 262, 2, 'gdfgdfg', 'nusdfdsfrse@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '2323', 984.00, 984.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-30 01:39:35', '2024-01-30 01:39:35'),
(10, 'ORD-CVVQPPY09E', 262, 19, 'gdfgdfg', 'nusdfdsfrse@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '324324', 1900.00, 1900.00, NULL, 'cod', 'paid', NULL, 0, 0, 'new', '2024-01-30 01:41:06', '2024-01-30 01:41:06'),
(12, 'ORD-U4QH30PKWR', 178, 15, 'Kamal Ahmed', 'nurse@gmail.com', 'Dhaka', '0191111112', 'Dhaka', 'Dhaka', 0, 'courseorder', '13141', 3500.00, 3850.00, NULL, 'stripe', 'unpaid', NULL, 0, 0, 'new', '2024-01-30 12:49:08', '2024-01-30 12:49:08'),
(13, 'ORD-BCYZ9PLS6P', 263, 19, 'Apple', 'apple@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '3223', 985.00, 985.00, NULL, 'stripe', 'unpaid', 'thank you', 0, 0, 'new', '2024-01-31 16:41:16', '2024-01-31 16:41:16'),
(14, 'ORD-ROB4WHD8BM', 266, 19, 'Beginner', 'nanaa@gmail.com', 'Dhaka, Bangladesh', '0196665767', 'Dhaka', 'Dhaka', 0, 'courseorder', '121212', 990.00, 990.00, NULL, 'stripe', 'unpaid', 'this is note', 0, 0, 'new', '2024-02-03 11:03:15', '2024-02-03 11:03:15'),
(15, 'ORD-MVBYTSRKFJ', 268, 18, 'Beginner', 'student.111@gmail.com', 'Dhaka', '01966509310', 'Dhaka', 'Dhaka', 0, 'courseorder', '121212', 990.00, 990.00, NULL, 'stripe', 'unpaid', 'dsgfd gfdg fdg', 196, 794, 'delivered', '2024-02-05 15:03:42', '2024-02-05 15:08:24'),
(16, 'ORD-3JHLY0JOLJ', 277, 19, 'ewrfewf', 'niaz111@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'Dhaka', 0, 'courseorder', '23232', 1890.00, 1890.00, NULL, 'stripe', 'unpaid', 'sdfgfdsgsdf', 0, 0, 'processing', '2024-02-06 14:55:40', '2024-02-06 14:55:40'),
(17, 'ORD-SIUQBN0RXR', 277, 16, 'ewrfewf', 'niaz111@gmail.com', 'Dhaka', '0185888888', 'Dhaka', 'cumilla', 0, 'courseorder', '2323', 1275.00, 1275.00, NULL, 'stripe', 'unpaid', 'dfgsd', 0, 0, 'processing', '2024-02-06 14:57:15', '2024-02-06 14:57:15'),
(18, 'ORD-YKQ1NTIIEL', 276, 19, 'shohag', 'shohag@gmail.com', 'dhaka', '01858509214', 'dhaka', 'ashila', 0, 'courseorder', '435', 5360.00, 5360.00, NULL, 'stripe', 'unpaid', 'fdgfds', 0, 0, 'processing', '2024-02-06 14:58:57', '2024-02-06 14:58:57'),
(19, 'ORD-HAAO1WYHSO', 279, 19, 'Niaz', 'niazahmed.net@gmail.com', 'Dhaka', '01966509310', 'Dhaka', 'Dhaka', 0, 'courseorder', '1234', 990.00, 990.00, NULL, 'stripe', 'unpaid', NULL, 0, 0, 'processing', '2024-02-07 07:26:52', '2024-02-07 07:26:52'),
(20, 'ORD-7VNQTJR82Z', 276, 19, 'shohag', 'shohag@gmail.com', 'dhaka', '01858509214', 'dhaka', 'ashila', 0, 'courseorder', '435', 1800.00, 1800.00, NULL, 'stripe', 'unpaid', 'gfhdg', 179, 1621, 'delivered', '2024-03-30 22:53:28', '2024-04-21 00:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `pack_type` varchar(255) DEFAULT NULL,
  `special` int(255) DEFAULT 0,
  `quantity` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `continent_id` bigint(20) NOT NULL DEFAULT 0,
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `discount` varchar(255) DEFAULT NULL,
  `shortdetail` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE IF NOT EXISTS `package_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `packagetagline_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`id`, `package_id`, `text`, `created_at`, `updated_at`, `packagetagline_id`) VALUES
(46, NULL, 'Subscription based packages', '2023-12-24 00:13:21', '2024-01-02 21:25:09', 14),
(47, NULL, 'Nation- building with the biggest online live classes taking Coding to last mile people', '2023-12-24 00:15:05', '2023-12-24 00:15:05', 15),
(48, NULL, 'Govt. endorsed Co-Curricular course on Coding for K1-K12', '2023-12-24 00:15:05', '2023-12-24 00:15:05', 15),
(49, NULL, 'STEM education', '2023-12-24 00:15:05', '2023-12-24 00:15:05', 15),
(50, NULL, 'Social & national interest courses for mass people', '2023-12-24 00:15:54', '2023-12-24 00:15:54', 16),
(51, NULL, 'First Bangladeshi platform to have courses for students with disability', '2023-12-24 00:15:54', '2023-12-24 00:15:54', 16),
(52, NULL, 'Diplomas/ Specialist Programs', '2023-12-24 00:16:59', '2023-12-24 00:16:59', 17),
(53, NULL, 'Professional degrees & programs', '2023-12-24 00:16:59', '2023-12-24 00:16:59', 17),
(54, NULL, 'Co-create nano degrees with Industry experts & Academic Partners', '2023-12-24 00:17:45', '2023-12-24 00:17:45', 18),
(55, NULL, 'Offer their own courses/programs (White labeling)', '2023-12-24 00:17:45', '2023-12-24 00:17:45', 18),
(57, NULL, 'Individual Course purchase', '2024-01-02 21:24:01', '2024-01-02 21:25:09', 14);

-- --------------------------------------------------------

--
-- Table structure for table `package_options`
--

CREATE TABLE IF NOT EXISTS `package_options` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_options_package_id_foreign` (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_options`
--

INSERT INTO `package_options` (`id`, `package_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(115, 4, 'Free Sign up/ Registration!', 1, '2023-12-29 00:57:14', '2023-12-29 00:57:14'),
(116, 4, 'Access to Free courses', 1, '2023-12-29 00:57:14', '2023-12-29 00:57:14'),
(117, 4, 'No certification on courses', 1, '2023-12-29 00:57:14', '2023-12-29 00:57:14'),
(118, 4, 'Get a trial experience with us!', 1, '2023-12-29 00:57:14', '2023-12-29 00:57:14'),
(119, 1, 'Free Sign up/ Registration!', 1, '2023-12-29 00:57:26', '2023-12-29 00:57:26'),
(120, 1, 'Access to Free courses', 1, '2023-12-29 00:57:26', '2023-12-29 00:57:26'),
(121, 1, 'No certification on courses', 1, '2023-12-29 00:57:26', '2023-12-29 00:57:26'),
(122, 1, 'Get a trial experience with us!', 1, '2023-12-29 00:57:26', '2023-12-29 00:57:26'),
(129, 2, 'COMING SOON', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(130, 2, 'Access to all courses', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(131, 2, 'Unlimited watch time', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(132, 2, 'Access to Certification', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(133, 2, 'Connect with our instructors and fellow learners across the world', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(134, 2, 'Participate in Forum Activities', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(135, 2, 'Showcase and share your profile and projects', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(136, 3, 'COMING SOON', 1, '2024-01-28 04:44:46', '2024-01-28 04:44:46'),
(137, 3, 'Access to all courses', 1, '2024-01-28 04:44:47', '2024-01-28 04:44:47'),
(138, 3, 'Unlimited watch time', 1, '2024-01-28 04:44:47', '2024-01-28 04:44:47'),
(139, 3, 'Connect with our instructors and fellow learners across the world', 1, '2024-01-28 04:44:47', '2024-01-28 04:44:47'),
(140, 3, 'Participate in Forum Activities', 1, '2024-01-28 04:44:47', '2024-01-28 04:44:47'),
(141, 3, 'Showcase and share your profile and projects', 1, '2024-01-28 04:44:47', '2024-01-28 04:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `package_tag_lines`
--

CREATE TABLE IF NOT EXISTS `package_tag_lines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_tag_lines`
--

INSERT INTO `package_tag_lines` (`id`, `package_id`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(14, 1, 'MOOCs', '17033983370.png', '2023-12-24 00:12:17', '2023-12-24 00:12:17'),
(15, 1, 'K1- K12', '17033984620.png', '2023-12-24 00:14:22', '2023-12-24 00:14:22'),
(16, 1, 'Free Course with Govt & NGOs', '17033985250.png', '2023-12-24 00:15:25', '2023-12-24 00:15:25'),
(17, 1, 'Certified', '17033985890.png', '2023-12-24 00:16:29', '2023-12-24 00:16:29'),
(18, 1, 'Enterprise', '17033986400.png', '2023-12-24 00:17:20', '2023-12-24 00:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `category_id`, `status`, `created_at`, `updated_at`, `slug`, `template`) VALUES
(11, 'TERMS AND CONDITIONS', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">These Terms of Use (\"Terms\") were last updated on January 2022</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">LEAD ACADEMY brings you an exceptional learning experience and 21-st century skillset to excel in your educational-professional spectrum. We enable anyone (instructors) anywhere to create and share their content and to access that valuable content to learn. We consider our marketplace model the best way to offer valuable educational content to our users. We need rules to keep our platform and services safe for you, us, and our learners and instructor community. These Terms apply to all your activities on the LEAD ACADEMY website, our mobile applications, our TV applications, our APIs, and other related services (“Services”). If you publish a course on the LEAD ACADEMY platform, you must also agree to the Instructor Terms. We also provide details regarding our processing of the personal data of our learners and instructors in our&nbsp;<span style=\"font-weight: bolder;\"><a href=\"https://lead.academy/admin/privacy-policy/\" style=\"color: rgb(13, 110, 253);\">Privacy Policy</a></span>. If you are using LEAD ACADEMY as our partner using Enterprise Packages, you can consult our Enterprise Privacy Statement.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">1. Accounts:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">You need an account for most activities on LEAD ACADEMY, like to purchase and access content or to submit content for publication. Keep your password somewhere safe, because you’re responsible for all activity associated with your account. When setting up and maintaining your account, you must provide and continue to provide accurate and complete information, including a valid email address. You have complete responsibility for your account and everything that happens on your account, including for any harm or damage (to us or anyone else) caused by someone using your account without your permission. If you suspect someone else is using your account, let us know by contacting our Support Team. If you contact us to request access to an account, we will not grant you such access unless you can provide us with the information that we need to prove you are the owner of that account. In the event of the death of a user, the account of that user will be closed.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">2. Content Enrollment and Lifetime Access:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">Under our Instructor Terms, when instructors publish content on LEAD ACADEMY, they grant LEAD ACADEMY, a license to offer the content according to the Agreement.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">As a Learner, when you enroll in a course or other content, whether it’s free or paid content, you are getting a license from LEAD ACADEMY to view the content via the LEAD ACADEMY platform and Services,&nbsp;and LEAD ACADEMY is the licensor of record. Content is licensed, and not sold, to learners. This license does not give anyone, any right to resell the content in any manner (including by sharing account information with a purchaser or illegally downloading the content and sharing it on torrent sites). Instructors may not grant licenses to their content to learners directly, and any such direct license shall be null and void and a violation of these Terms.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">For individual purchased courses, you will have access to the purchased course as long as the account of the learner is valid. For courses enrolled under subscription package, you will have access to all the courses you have enrolled into till the validity of your subscription package. If not renewed within the validity period, the progress of only subscribed courses will be nullified. The rest of account activity can be continued as per usual.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">3. Payment:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">You agree to pay the fees for content that you purchase or for the Subscription package you choose and you authorize us to charge your debit or credit card or process other means of payment for those fees. LEAD ACADEMY works with payment service providers (SSL commerz) to offer you the most convenient payment methods and to keep your payment information secure.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">4. Price:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">The prices of content on LEAD ACADEMY are determined based on the terms of the Instructor Terms and our Promotions Policy. We occasionally run promotions and sales for our content, during which certain content is available at discounted prices for a set period. The price applicable to the content will be the price at the time you complete your purchase of the content or Subscription Package (at checkout). Any price offered for particular content may also be different when you are logged into your account from the price available to users who aren’t registered or logged in because some of our promotions are available only to new users.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">5. Our Rights on your Content:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">The content you post as a learner or instructor (including courses) remains yours. By posting courses and other content, you allow LEAD ACADEMY to reuse and share it but you do not lose any ownership rights you may have over your content. If you are an instructor, be sure to understand the content licensing terms that are detailed in the Instructor Terms.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">6. Using LEAD ACADEMY at Your Own Risk:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">When you interact directly with a student or an instructor, you must be careful about the types of personal information that you share. While we restrict the types of information instructors may request from students, we do not control what students and instructors do with the information they obtain from other users on the platform. You should not share your email or other personal information about you for your safety. When you use our Services, you will find links to other websites that we don’t own or control. We are not responsible for the content or any other aspect of these third-party sites, including their collection of information about you. You should also read their terms and conditions and Privacy Policy.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">7. Updating These Terms:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">From time to time, we may update these Terms to clarify our practices or to reflect new or different practices (such as when we add new features), and LEAD ACADEMY reserves the right in its sole discretion to modify and/or make changes to these Terms at any time. If we make any material change, we will notify you using prominent means, such as by email notice sent to the email address specified in your account or by posting a notice through our Services. Modifications will become effective on the day they are posted unless stated otherwise. Your continued use of our Services after changes become effective shall mean that you accept those changes. Any revised Terms shall supersede all previous Terms.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">8. How to Delete user account:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">All LEAD ACADEMY users have the right to request the deletion of their account.&nbsp;&nbsp;<span xss=\"removed\">Account deletion requests must be performed by login to user account &gt; setting &gt; delete this account.</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">9. How to Contact Us:</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">The best way to get in touch with us is to contact our&nbsp;<a href=\"https://lead.academy/admin/contact/\" style=\"color: rgb(13, 110, 253);\"><span style=\"font-weight: bolder;\">Support Team</span></a>. We’d love to hear your questions, concerns, and feedback about our Services. Thanks for teaching and learning with us!</p>', 0, 1, '2023-12-25 05:30:26', '2024-01-10 02:44:41', 'terms-and-conditions', 'terms-conditions'),
(12, 'THE LEAD ACADEMY REFUND POLICY NOTICE', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">LEAD ACADEMY does not provide any refund option for our Subscription Plan or Purchase Plan.</span><br style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">However, if the content you previously purchased individually is disabled for legal or policy reasons, you</span><br style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">are entitled to a refund beyond this within the 30-day limit. LEAD ACADEMY also reserves the right to</span><br style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">refund students in cases of suspected or confirmed account fraud.</span><br style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">If we ban your account or disable your access to the content due to your violation of these&nbsp;</span><a href=\"https://lead.academy/admin/terms-condition/\" style=\"color: rgb(13, 110, 253); font-family: &quot;Open Sans&quot;, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"font-weight: bolder;\">Terms or<br>our Guidelines</span></a><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">, you will not be eligible to receive a refund.</span><br></p>', 0, 1, '2023-12-25 05:46:01', '2023-12-25 05:46:01', 'the-lead-academy-refund-policy-notice', 'refund-policy'),
(13, 'THE LEAD ACADEMY PRIVACY NOTICE', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">Lead Academy brings you an exceptional learning experience and 21-st century skillset to excel in your educational-professional spectrum. This page informs you of our policies regarding the collection, use, and disclosure of Personal Information we receive from users of the Site. The Privacy Notice is prepared to explain how your personal information is used as part of the EdTech Program and explain your legal rights.&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">We use your Personal Information only for providing and improving the Site. By using the Site, you agree to the collection and use of information following this policy.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Information Collection and Use</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">While using our Site, we may ask you to provide us with certain personally identifiable information that we may use to contact or identify you. The identifiable information may include but is not limited to your name (\"Personal Information, \"Address, \"Email ID\").<span style=\"font-weight: bolder;\">&nbsp;</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Cookies&nbsp;</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">Cookies are files with a small amount of data, which may include an anonymous and unique identifier. Like many sites, we use \"cookies\" to collect information. These are sent to your browser from our website and stored on your computer\'s hard drive. You can instruct your browser to refuse all cookies or to notify when a cookie is permitted. However, if you do not accept cookies, you may not access some portions of our Site.&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Communication&nbsp;</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">We may use your Personal Information to contact you with newsletters, marketing or promotional materials, and other information that promotes and are related to our business.&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Log Data&nbsp;</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">Like many site operators, we collect information that your browser sends whenever you visit our Site. This Log Data may include information such as the computer\'s Internet Protocol or IP address, browser type, and browser version. Including the pages of our Site you visit, the time and date of your visit, the time spent on those pages, and other statistics. In addition, we may use third-party services such as Google Analytics that collect, monitor, and analyze this data.&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Collection of Information by Third Party Sites</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">We may provide links to sites operated by organizations other than Lead Academy that we believe may be of interest to you. We do not disclose your Personal Data to these Third-Party Sites unless we have a lawful basis on which to do so. We do not endorse and are not responsible for the privacy practices of these Third-Party Sites. If you choose to click on a link to one of these Third-Party Sites, you should review the privacy policy posted on the other site to understand how that Third Party Site collects and uses your Personal Data.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Security</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">The security of your Personal Information is important to us. It is important to note that no method of transmission over the Internet or method of electronic storage can guarantee absolute security. While we strive to use the best commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Children Information Security</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">For child-directed products, parental consent is required before the collection or use of any information. For example, a service that teaches STEM activity practices would be a child-directed product.&nbsp;&nbsp;&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Changes to the Privacy Policy</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">This Privacy Policy is effective as of (date) and will remain effective except concerning any changes in its provisions in the future. Those will be in effect immediately after being posted on this page. We reserve the right to update or change our Privacy Policy at any time, and to learn about the changes, please check the Privacy Policy periodically. Your continuing use of the Service after we post any modifications to the Privacy Policy on this page will constitute your acknowledgment of the modifications and your consent to abide by the modified Privacy Policy. If we make any material changes to this Privacy Policy, we will notify you through your email address. Or we will place a prominent notice on our website.&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">&nbsp;</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-weight: bolder;\">Contact Us</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif;\">If you have any questions or suggestions about this Privacy Policy, please&nbsp;<a href=\"https://lead.academy/admin/contact/\" style=\"color: rgb(13, 110, 253);\"><span style=\"font-weight: bolder;\">contact us</span></a>.</p>', 0, 1, '2023-12-25 05:46:25', '2023-12-25 05:46:25', 'the-lead-academy-privacy-notice', 'privacy-policy');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `link`, `description`, `image`, `category_id`, `status`, `position`, `created_at`, `updated_at`) VALUES
(11, 'Bata', 'https://www.google.com/', NULL, '21215086081702895528.png', 0, 1, 99, '2023-12-18 04:32:08', '2023-12-18 04:32:08'),
(12, 'php', 'https://facebook.com', NULL, '11516722631702895549.png', 0, 1, 99, '2023-12-18 04:32:29', '2023-12-18 04:32:29'),
(13, 'Advance', 'https://www.google.com/', NULL, '6656136221702895568.png', 0, 1, 99, '2023-12-18 04:32:48', '2023-12-18 04:32:48'),
(14, 'Niaz', 'https://www.google.com/', NULL, '14284077111702897399.jpg', 0, 1, 99, '2023-12-18 05:03:19', '2023-12-18 05:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `pay_withs`
--

CREATE TABLE IF NOT EXISTS `pay_withs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sitesetting_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tp_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pay_name` varchar(255) DEFAULT NULL,
  `pay_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_withs`
--

INSERT INTO `pay_withs` (`id`, `sitesetting_id`, `tp_option_id`, `pay_name`, `pay_image`, `status`, `created_at`, `updated_at`) VALUES
(28, NULL, 5, 'name', '17058287060.png', 1, '2024-01-21 03:18:26', '2024-01-21 03:18:26'),
(29, NULL, 5, 'Upay', '17058287061.png', 1, '2024-01-21 03:18:26', '2024-01-21 03:18:26'),
(30, NULL, 5, 'name', '17058287062.png', 1, '2024-01-21 03:18:26', '2024-01-21 03:18:26'),
(31, NULL, 6, 'ghfhf', '17058289340.webp', 1, '2024-01-21 03:22:14', '2024-01-21 03:22:14'),
(79, NULL, 7, NULL, '17067344360.png', 1, '2024-02-01 01:53:56', '2024-02-01 01:53:56'),
(80, NULL, 7, NULL, '17067344361.png', 1, '2024-02-01 01:53:56', '2024-02-01 01:53:56'),
(81, NULL, 7, NULL, '17067344362.jpg', 1, '2024-02-01 01:53:56', '2024-02-01 01:53:56'),
(82, NULL, 7, NULL, '17067344363.png', 1, '2024-02-01 01:53:56', '2024-02-01 01:53:56'),
(83, NULL, 7, NULL, '17067344364.png', 1, '2024-02-01 01:53:56', '2024-02-01 01:53:56'),
(84, NULL, 7, NULL, '17067344365.jpg', 1, '2024-02-01 01:53:56', '2024-02-01 01:53:56'),
(85, NULL, 7, NULL, '17067344366.png', 1, '2024-02-01 01:53:56', '2024-02-01 01:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` longtext DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `is_group` int(11) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_sub` tinyint(4) NOT NULL DEFAULT 0,
  `is_item` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `created_at`, `updated_at`, `route`, `menu_name`, `is_group`, `parent_id`, `order`, `is_sub`, `is_item`) VALUES
(1, NULL, NULL, NULL, 'Home', 1, 0, 1, 0, 0),
(2, NULL, NULL, NULL, 'Category', 0, 1, 1, 0, 0),
(3, NULL, NULL, NULL, 'Sub Category', 0, 1, 2, 0, 0),
(5, NULL, NULL, NULL, 'Banner', 0, 1, 4, 0, 0),
(6, NULL, NULL, NULL, 'Slider', 0, 1, 5, 0, 0),
(7, NULL, NULL, NULL, 'Our Partner', 0, 1, 6, 0, 0),
(8, NULL, NULL, NULL, 'Our Client', 0, 1, 7, 0, 0),
(10, NULL, NULL, 'backend.home_content', 'Content Setup', 0, 1, 9, 0, 0),
(11, NULL, NULL, 'home-category.create', 'Add New Category', 0, 2, 1, 0, 0),
(12, NULL, NULL, 'home-category.index', 'Manage Category', 0, 2, 2, 0, 1),
(13, NULL, NULL, 'home-category.edit', 'Edit Category', 0, 2, 3, 1, 0),
(14, NULL, NULL, 'home-category.delete', 'Delete Category', 0, 2, 4, 1, 0),
(15, NULL, NULL, 'home-category.status_toggle', 'Category Status', 0, 2, 5, 1, 0),
(16, NULL, NULL, 'home-sub-category.create', 'Add New Sub Category', 0, 3, 1, 0, 0),
(17, NULL, NULL, 'home-sub-category.index', 'Manage Sub Category', 0, 3, 2, 0, 1),
(18, NULL, NULL, 'home-sub-category.edit', 'Edit Sub Category', 0, 3, 3, 1, 0),
(19, NULL, NULL, 'home-sub-category.delete', 'Delete Sub Category', 0, 3, 4, 1, 0),
(20, NULL, NULL, 'home-sub-category.status_toggle', 'Sub Category Status', 0, 3, 5, 1, 0),
(26, NULL, NULL, 'home-banner.create', 'Add New Banner', 0, 5, 1, 0, 0),
(27, NULL, NULL, 'home-banner.index', 'Manage Banner', 0, 5, 2, 0, 1),
(28, NULL, NULL, 'home-banner.edit', 'Edit Banner', 0, 5, 3, 1, 0),
(29, NULL, NULL, 'home-banner.delete', 'Delete Banner', 0, 5, 4, 1, 0),
(30, NULL, NULL, 'home-banner.status_toggle', 'Banner Status', 0, 5, 5, 1, 0),
(31, NULL, NULL, 'home-slider.create', 'Add New Slider', 0, 6, 1, 0, 0),
(32, NULL, NULL, 'home-slider.index', 'Manage Slider', 0, 6, 2, 0, 1),
(33, NULL, NULL, 'home-slider.edit', 'Edit Slider', 0, 6, 3, 1, 0),
(34, NULL, NULL, 'home-slider.delete', 'Delete Slider', 0, 6, 4, 1, 0),
(35, NULL, NULL, 'home-slider.status_toggle', 'Slider Status', 0, 6, 5, 1, 0),
(36, NULL, NULL, 'home-partner.create', 'Add New Partner', 0, 7, 1, 0, 0),
(37, NULL, NULL, 'home-partner.index', 'Manage Partner', 0, 7, 2, 0, 1),
(38, NULL, NULL, 'home-partner.edit', 'Edit Partner', 0, 7, 3, 1, 0),
(39, NULL, NULL, 'home-partner.delete', 'Delete Partner', 0, 7, 4, 1, 0),
(40, NULL, NULL, 'home-partner.status_toggle', 'Partner Status', 0, 7, 5, 1, 0),
(41, NULL, NULL, 'home-client.create', 'Add New Client', 0, 8, 1, 0, 0),
(42, NULL, NULL, 'home-client.index', 'Manage Client', 0, 8, 2, 0, 1),
(43, NULL, NULL, 'home-client.edit', 'Edit Client', 0, 8, 3, 1, 0),
(44, NULL, NULL, 'home-client.delete', 'Delete Client', 0, 8, 4, 1, 0),
(45, NULL, NULL, 'home-client.status_toggle', 'Client Status', 0, 8, 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission_menus`
--

CREATE TABLE IF NOT EXISTS `permission_menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_menu_items`
--

CREATE TABLE IF NOT EXISTS `permission_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_courses`
--

CREATE TABLE IF NOT EXISTS `related_courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `relatedcourse_id` bigint(255) UNSIGNED DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `related_courses`
--

INSERT INTO `related_courses` (`id`, `course_id`, `relatedcourse_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 14, 10, 1, '2024-02-01 02:05:09', '2024-02-01 02:05:09'),
(6, 14, 9, 1, '2024-02-01 02:05:09', '2024-02-01 02:05:09'),
(11, 24, 23, 1, '2024-03-09 05:24:55', '2024-03-09 05:24:55'),
(13, 27, 26, 1, '2024-03-09 23:47:03', '2024-03-09 23:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `related_ebooks`
--

CREATE TABLE IF NOT EXISTS `related_ebooks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ebook_id` bigint(20) UNSIGNED DEFAULT NULL,
  `relatedebook_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `related_ebooks`
--

INSERT INTO `related_ebooks` (`id`, `ebook_id`, `relatedebook_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 32, 32, 1, '2024-02-02 22:23:58', '2024-02-02 22:23:58'),
(2, 32, 30, 1, '2024-02-02 22:23:58', '2024-02-02 22:23:58'),
(3, 32, 29, 1, '2024-02-02 22:23:58', '2024-02-02 22:23:58'),
(4, 45, 44, 1, '2024-02-03 14:50:27', '2024-02-03 14:50:27'),
(5, 45, 41, 1, '2024-02-03 14:50:27', '2024-02-03 14:50:27'),
(6, 45, 40, 1, '2024-02-03 14:50:27', '2024-02-03 14:50:27'),
(7, 44, 45, 1, '2024-02-03 14:51:11', '2024-02-03 14:51:11'),
(8, 44, 41, 1, '2024-02-03 14:51:11', '2024-02-03 14:51:11'),
(9, 41, 44, 1, '2024-02-03 14:52:03', '2024-02-03 14:52:03'),
(10, 40, 45, 1, '2024-02-03 14:52:45', '2024-02-03 14:52:45'),
(11, 47, 45, 1, '2024-02-05 14:59:12', '2024-02-05 14:59:12'),
(12, 47, 41, 1, '2024-02-05 14:59:12', '2024-02-05 14:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE IF NOT EXISTS `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `seller_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `admin_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenues`
--

INSERT INTO `revenues` (`id`, `user_id`, `cart_id`, `seller_amount`, `admin_amount`, `created_at`, `updated_at`) VALUES
(16, 267, 14, 196.00, 784.00, '2024-02-05 15:08:24', '2024-02-05 15:08:24'),
(17, 178, 36, 179.00, 1611.00, '2024-04-21 00:54:32', '2024-04-21 00:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ebook_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `ratting` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `course_id`, `ebook_id`, `university_id`, `comment`, `type`, `ratting`, `status`, `created_at`, `updated_at`) VALUES
(2, 262, 0, 41, 0, 'Wow Nice E-Books, I really Like This E-Book. Thank You.', 'ebook', 5, NULL, '2024-01-30 03:37:26', '2024-01-30 03:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 99,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 99, 1, '2023-11-14 03:17:16', '2023-11-14 03:17:37'),
(2, 'Sub Admin', 99, 1, '2023-11-14 05:08:28', '2023-11-14 05:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-01-25 07:16:14', '2024-01-25 07:16:14'),
(2, 1, 2, '2024-01-25 07:16:14', '2024-01-25 07:16:14'),
(3, 1, 11, '2024-01-25 07:16:14', '2024-01-25 07:16:14'),
(4, 1, 12, '2024-01-25 07:16:14', '2024-01-25 07:16:14'),
(5, 1, 13, '2024-01-25 07:16:14', '2024-01-25 07:16:14'),
(6, 1, 14, '2024-01-25 07:16:14', '2024-01-25 07:16:14'),
(7, 1, 15, '2024-01-25 07:16:14', '2024-01-25 07:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `bulding_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `floor_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `bulding_id`, `floor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '101', 1, 1, 1, '2024-05-11 05:09:19', '2024-05-15 00:08:57'),
(2, '102', 1, 1, 1, '2024-05-15 00:09:48', '2024-05-15 00:09:48'),
(3, '103', 1, 1, 1, '2024-05-15 00:10:03', '2024-05-22 21:12:55'),
(4, '7000', 1, 1, 1, '2024-06-10 00:42:36', '2024-06-10 00:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `school_sections`
--

CREATE TABLE IF NOT EXISTS `school_sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_sections`
--

INSERT INTO `school_sections` (`id`, `class_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 1, '2024-05-12 00:46:06', '2024-05-13 23:14:01'),
(2, 1, 'B', 1, '2024-05-13 23:14:19', '2024-05-13 23:14:19'),
(3, 4, 'A', 1, '2024-05-13 23:14:31', '2024-05-13 23:14:31'),
(4, 4, 'B', 1, '2024-05-13 23:14:42', '2024-05-13 23:14:42'),
(5, 4, 'C', 1, '2024-05-13 23:19:50', '2024-05-13 23:19:50'),
(6, 1, 'C', 1, '2024-05-13 23:20:01', '2024-05-26 05:08:56'),
(7, 12, 'A', 1, '2024-05-19 21:31:51', '2024-05-19 23:13:47'),
(8, 11, 'A', 1, '2024-06-01 04:29:38', '2024-06-01 04:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Spring 2024', 1, '2024-03-04 03:44:24', '2024-03-04 03:44:24'),
(2, 'Summer 2024', 1, '2024-03-04 03:45:05', '2024-03-04 03:45:14'),
(3, 'Autumn 2024', 1, '2024-03-04 03:45:21', '2024-03-04 03:45:21'),
(4, 'Winter 2024', 1, '2024-03-04 03:56:40', '2024-03-04 03:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semester_name` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `course_id`, `semester_name`, `duration`, `created_at`, `updated_at`) VALUES
(1, 26, 'sadfdsa', 'sdfsad', '2024-02-28 05:43:57', '2024-02-28 05:43:57'),
(5, 28, 'dsfgdfs', 'dfgfds', '2024-02-28 07:00:51', '2024-02-28 07:00:51'),
(6, 28, 'dsfgsdfg', 'sdfgdsfg', '2024-02-28 07:01:19', '2024-02-28 07:01:19'),
(7, 29, 'dsfgfsdg', 'dfgfds', '2024-02-28 07:04:54', '2024-02-28 07:04:54'),
(8, 29, 'gdsfg-2', 'fgasdfg', '2024-02-28 20:45:35', '2024-02-28 20:45:35'),
(11, 31, 'Spring 2024', '4 months', '2024-03-03 04:27:10', '2024-03-03 04:27:10'),
(13, 33, NULL, NULL, '2024-03-03 23:24:05', '2024-03-03 23:24:05'),
(19, 44, 'summ', '4 months', '2024-03-04 22:50:15', '2024-03-04 22:50:15'),
(20, 45, NULL, NULL, '2024-03-04 22:51:12', '2024-03-04 22:51:12'),
(21, 49, NULL, NULL, '2024-03-04 22:56:05', '2024-03-04 22:56:05'),
(22, 50, NULL, NULL, '2024-03-04 22:58:26', '2024-03-04 22:58:26'),
(23, 53, 'Spring 2024', '4 months', '2024-03-04 23:05:43', '2024-03-04 23:05:43'),
(27, 32, 'Spring 2024', '4 months', '2024-03-05 04:15:57', '2024-03-05 04:15:57'),
(28, 23, 'sdfadsa', 'sadfsad', '2024-03-09 04:21:47', '2024-03-09 04:21:47'),
(29, 24, 'dfsgdf-1', 'dxfcdsa-1', '2024-03-09 05:24:55', '2024-03-09 05:24:55'),
(30, 27, 'fall', '4', '2024-03-09 23:46:18', '2024-03-09 23:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `semester_details`
--

CREATE TABLE IF NOT EXISTS `semester_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester_details`
--

INSERT INTO `semester_details` (`id`, `semester_id`, `subject_name`, `credit`, `created_at`, `updated_at`) VALUES
(1, 1, 'safdas', 'sadf', '2024-02-28 05:43:57', '2024-02-28 05:43:57'),
(7, 5, 'dfsgfds', 'dfgdfs', '2024-02-28 07:00:51', '2024-02-28 07:00:51'),
(8, 6, 'sdfgsdfg', 'dfsgdfsg', '2024-02-28 07:01:19', '2024-02-28 07:01:19'),
(9, 5, 'dfgsdg', 'dsfgdsfg', '2024-02-28 07:01:19', '2024-02-28 07:01:19'),
(11, 8, 'fhdfd-2', 'fadsfasd', '2024-02-28 20:45:35', '2024-02-28 20:45:35'),
(12, 8, 'sdfgsdfg-2', 'sfdgsdg', '2024-02-28 20:45:35', '2024-02-28 20:45:35'),
(13, 7, 'sfdfgsd-1', NULL, '2024-02-28 20:45:35', '2024-02-28 20:45:35'),
(14, 7, 'sfsad-1', 'sdfasd', '2024-02-28 20:45:35', '2024-02-28 20:45:35'),
(23, 11, 'Bangla', '2', '2024-03-03 04:27:10', '2024-03-03 04:27:10'),
(24, 11, 'English', '2', '2024-03-03 04:27:10', '2024-03-03 04:27:10'),
(25, 11, 'Math', '2', '2024-03-03 04:27:10', '2024-03-03 04:27:10'),
(26, 11, 'Physic', '3', '2024-03-03 04:27:10', '2024-03-03 04:27:10'),
(27, 12, NULL, NULL, '2024-03-03 23:10:24', '2024-03-03 23:10:24'),
(28, 13, NULL, NULL, '2024-03-03 23:24:05', '2024-03-03 23:24:05'),
(34, 19, 'dfg', 'gfdgg', '2024-03-04 22:50:15', '2024-03-04 22:50:15'),
(35, 20, NULL, NULL, '2024-03-04 22:51:12', '2024-03-04 22:51:12'),
(36, 21, NULL, NULL, '2024-03-04 22:56:05', '2024-03-04 22:56:05'),
(37, 22, NULL, NULL, '2024-03-04 22:58:26', '2024-03-04 22:58:26'),
(38, 23, 'Bangla', '2', '2024-03-04 23:05:43', '2024-03-04 23:05:43'),
(43, 27, 'Java', '2', '2024-03-05 04:15:57', '2024-03-05 04:15:57'),
(44, 27, 'C++', '3', '2024-03-05 04:15:57', '2024-03-05 04:15:57'),
(45, 27, 'Python', '3', '2024-03-05 04:15:57', '2024-03-05 04:15:57'),
(46, 27, 'HTML', '3', '2024-03-05 04:15:57', '2024-03-05 04:15:57'),
(47, 28, 'asdfas', 'sdafsa', '2024-03-09 04:21:47', '2024-03-09 04:21:47'),
(48, 29, 'fsadf-1', 'sadf', '2024-03-09 05:24:55', '2024-03-09 05:24:55'),
(49, 30, 'math', '3', '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(50, 30, 'english', '2', '2024-03-09 23:46:18', '2024-03-09 23:46:18'),
(51, 30, 'bangla', '3', '2024-03-09 23:46:18', '2024-03-09 23:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_current` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `start_month` tinyint(4) DEFAULT NULL,
  `start_year` int(11) DEFAULT NULL,
  `end_month` tinyint(4) DEFAULT NULL,
  `end_year` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `is_current`, `start_month`, `start_year`, `end_month`, `end_year`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 2024, 12, 2025, 1, '2024-05-11 01:22:34', '2024-06-08 01:04:18'),
(7, 0, 1, 2023, 12, 2024, 1, '2024-05-11 01:23:02', '2024-06-08 01:04:18'),
(8, 0, 1, 2022, 12, 2023, 1, '2024-05-11 01:23:26', '2024-06-08 01:04:18'),
(9, 0, 1, 2021, 11, 2022, 1, '2024-05-11 01:23:51', '2024-06-08 01:04:18'),
(10, 0, 2, 2020, 11, 2021, 1, '2024-05-12 03:02:35', '2024-06-08 01:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `shelves`
--

CREATE TABLE IF NOT EXISTS `shelves` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `direction_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelves`
--

INSERT INTO `shelves` (`id`, `direction_id`, `name`, `number`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Main Shelf', 1, 1, '2024-05-26 01:23:01', '2024-05-26 01:24:03'),
(2, 3, 'Sub Shelf', 3, 1, '2024-05-26 01:23:57', '2024-05-26 01:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `company_slogan` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `footer_image` varchar(255) DEFAULT NULL,
  `address_title1` varchar(255) DEFAULT NULL,
  `address_title2` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `license_no` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `right_text` varchar(255) DEFAULT NULL,
  `design_by_text` varchar(255) DEFAULT NULL,
  `design_link_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_title` varchar(255) DEFAULT NULL,
  `payment_image` varchar(255) DEFAULT NULL,
  `web_title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `company_name`, `company_slogan`, `favicon`, `header_image`, `footer_image`, `address_title1`, `address_title2`, `address1`, `address2`, `email1`, `email2`, `phone1`, `phone2`, `license_no`, `facebook`, `twitter`, `instagram`, `youtube`, `right_text`, `design_by_text`, `design_link_text`, `created_at`, `updated_at`, `payment_title`, `payment_image`, `web_title`) VALUES
(4, 'Navieasoft Limited', NULL, '1704786033_favicon.jfif', '1702440395_header-logo.png', '1702442449_footer-logo.PNG', 'Address', 'Address', 'Mohakhali DOHS, Dhaka', 'Mohakhali DOHS, Dhaka', 'navieasoft@gmail.com', 'navieasoft@gmail.com', '01636312933', '01636312933', '283870', 'https://www.facebook.com/navieasoftusbd', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fnavieasoft', 'https://www.instagram.com/', 'https://www.youtube.com/@navieasoft', 'fghfdh', NULL, NULL, '2023-12-12 04:15:57', '2024-01-10 01:54:18', 'fdgfdh', '1702376157_payment_image.webp', 'alquranliveclass');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `continent_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`, `continent_id`, `country_id`) VALUES
(1, 'Dhaka', '8124454961709977703_state_image.jpg', 1, '2023-10-17 23:40:26', '2024-03-09 03:48:23', 3, 4),
(3, 'Rajshahi', '9188507531709977712_state_image.jpg', 1, '2023-10-18 01:07:24', '2024-03-09 03:48:32', 1, 1),
(4, 'Kolkata', '4228938221709977728_state_image.jpg', 1, '2023-10-18 03:04:34', '2024-03-09 03:48:48', 1, 3),
(5, 'Rongpur', '11774255581709977764_state_image.jpg', 1, '2023-10-22 00:25:00', '2024-03-09 03:49:24', 1, 1),
(6, 'Barishal', '19198782771709977740_state_image.jpg', 1, '2023-10-22 00:25:38', '2024-03-09 03:49:00', 1, 1),
(7, 'Chattogram', '4313295971709977785_state_image.jpg', 1, '2023-10-22 00:25:57', '2024-03-09 03:49:45', 1, 1),
(8, 'Khulna', '18393868891709977937_state_image.jpg', 1, '2023-10-22 00:26:22', '2024-03-09 03:52:17', 1, 1),
(9, 'Mymensingh', '16556639251709977951_state_image.jpg', 1, '2023-10-22 00:26:40', '2024-03-09 03:52:31', 1, 1),
(10, 'Sylhet', '10408974231709977975_state_image.jpg', 1, '2023-10-22 00:27:02', '2024-03-09 03:52:55', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fee_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_nid` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_phone` varchar(255) DEFAULT NULL,
  `father_nid` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(255) DEFAULT NULL,
  `yearly_income` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `parmanent_address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `present_continent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `present_country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `present_state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `present_city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `permanent_continent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `permanent_country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `permanent_state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `permanent_city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `pre_school` varchar(255) DEFAULT NULL,
  `pre_school_name` varchar(255) DEFAULT NULL,
  `pre_class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `pre_roll_number` varchar(255) DEFAULT NULL,
  `pre_school_address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE IF NOT EXISTS `student_applications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `chinese_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_exipre_date` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `maritial_status` varchar(255) DEFAULT NULL,
  `in_chaina` tinyint(4) DEFAULT NULL,
  `in_alcoholic` tinyint(4) DEFAULT NULL,
  `hobby` text DEFAULT NULL,
  `native_language` varchar(255) DEFAULT NULL,
  `english_level` tinyint(4) DEFAULT NULL,
  `chinese_level` tinyint(4) DEFAULT NULL,
  `home_country` varchar(255) DEFAULT NULL,
  `home_city` varchar(255) DEFAULT NULL,
  `home_district` varchar(255) DEFAULT NULL,
  `home_street` varchar(255) DEFAULT NULL,
  `home_zipcode` varchar(255) DEFAULT NULL,
  `home_contact_name` varchar(255) DEFAULT NULL,
  `home_contact_phone` varchar(255) DEFAULT NULL,
  `current_country` varchar(255) DEFAULT NULL,
  `current_city` varchar(255) DEFAULT NULL,
  `current_district` varchar(255) DEFAULT NULL,
  `current_street` varchar(255) DEFAULT NULL,
  `current_zipcode` varchar(255) DEFAULT NULL,
  `current_contact_name` varchar(255) DEFAULT NULL,
  `current_contact_phone` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_nationlity` varchar(255) DEFAULT NULL,
  `father_phone` varchar(255) DEFAULT NULL,
  `father_email` varchar(255) DEFAULT NULL,
  `father_workplace` varchar(255) DEFAULT NULL,
  `father_position` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_nationlity` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(255) DEFAULT NULL,
  `mother_email` varchar(255) DEFAULT NULL,
  `mother_workplace` varchar(255) DEFAULT NULL,
  `mother_position` varchar(255) DEFAULT NULL,
  `guarantor_relationship` varchar(255) DEFAULT NULL,
  `guarantor_inter_relation` varchar(255) DEFAULT NULL,
  `guarantor_name` varchar(255) DEFAULT NULL,
  `guarantor_address` varchar(255) DEFAULT NULL,
  `guarantor_phone` varchar(255) DEFAULT NULL,
  `guarantor_email` varchar(255) DEFAULT NULL,
  `guarantor_workplace` varchar(255) DEFAULT NULL,
  `guarantor_work_address` varchar(255) DEFAULT NULL,
  `study_fund` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_phone` varchar(255) DEFAULT NULL,
  `emergency_contact_email` varchar(255) DEFAULT NULL,
  `emergency_contact_address` varchar(255) DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_fee` double(8,2) NOT NULL,
  `optional_fee` double(8,2) DEFAULT NULL,
  `application_fee` double(8,2) NOT NULL,
  `discount_fee` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `scholarship` varchar(255) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_applications`
--

INSERT INTO `student_applications` (`id`, `application_code`, `first_name`, `middle_name`, `last_name`, `chinese_name`, `phone`, `email`, `dob`, `birth_place`, `passport_number`, `passport_exipre_date`, `nationality`, `religion`, `gender`, `maritial_status`, `in_chaina`, `in_alcoholic`, `hobby`, `native_language`, `english_level`, `chinese_level`, `home_country`, `home_city`, `home_district`, `home_street`, `home_zipcode`, `home_contact_name`, `home_contact_phone`, `current_country`, `current_city`, `current_district`, `current_street`, `current_zipcode`, `current_contact_name`, `current_contact_phone`, `father_name`, `father_nationlity`, `father_phone`, `father_email`, `father_workplace`, `father_position`, `mother_name`, `mother_nationlity`, `mother_phone`, `mother_email`, `mother_workplace`, `mother_position`, `guarantor_relationship`, `guarantor_inter_relation`, `guarantor_name`, `guarantor_address`, `guarantor_phone`, `guarantor_email`, `guarantor_workplace`, `guarantor_work_address`, `study_fund`, `emergency_contact_name`, `emergency_contact_phone`, `emergency_contact_email`, `emergency_contact_address`, `service_id`, `user_id`, `application_id`, `total_fee`, `optional_fee`, `application_fee`, `discount_fee`, `status`, `scholarship`, `payment_method`, `created_at`, `updated_at`) VALUES
(4, 'cRHAT4weol', 'shohag', 'dfgsdfg', 'shohag', 'sdgds', '01858509214', 'shohag@gmail.com', '2024-03-12', NULL, '4354654', '2024-03-13', '1', 'islam', 'Male', 'Single', 1, 1, 'asfsad', 'dsfgsdf', 0, 0, 'Bangladesh', 'dhaka', 'sdafdsa', 'dhaka', '435', 'shohag', '01858509214', 'Bangladesh', 'dhaka', 'asdfads', 'dhaka', '435', 'shohag', '01858509214', 'shohag', 'Bangladesh', '01858509214', 'father@gmail.com', 'Bangladesh', '1', 'shohag', 'Bangladesh', '01858509214', 'mother@gmail.com', 'Bangladesh', '1', 'Father', 'father', 'shohag', 'dhaka', '01858509214', 'father@gmail.com', 'Bangladesh', 'dhaka', 'Self finance', 'shohag', '01858509214', 'fgsdgsdfg@gmail.com', 'dhaka', NULL, 276, NULL, 0.00, NULL, 0.00, NULL, 1, NULL, 'cush', '2024-03-09 21:25:30', '2024-03-09 21:28:10'),
(5, 'vc0K2NVyE4', 'shohag', 'dfgsdfg', 'shohag', 'sdgds', '01858509214', 'shohag@gmail.com', '2024-03-20', NULL, '4354654', '2024-03-19', '1', 'islam', 'Male', 'Single', 1, 1, 'sdfggs', 'dsfgsdf', 0, 0, 'Bangladesh', 'dhaka', 'sdfgsdf', 'dhaka', '435', 'shohag', '01858509214', 'Bangladesh', 'dhaka', 'dsfsfsfsfsfsfsfg', 'dhaka', '435', 'shohag', '01858509214', 'father', 'Bangladesh', '01858509214', 'father@gmail.com', 'Bangladesh', '1', 'Mother', 'Bangladesh', '01858509214', 'mother@gmail.com', 'dfgsdf', '1', 'Father', 'father', 'father', 'dhaka', '01858509214', 'father@gmail.com', 'Bangladesh', 'dfsgsd', 'Self finance', 'sdf', '01858509214', 'fgsdgsdfg@gmail.com', 'dhaka', NULL, 276, NULL, 100.00, NULL, 100.00, NULL, 2, NULL, 'cush', '2024-03-09 22:23:54', '2024-03-10 04:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_info_updates`
--

CREATE TABLE IF NOT EXISTS `student_info_updates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_id_number` varchar(100) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_nid` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_phone` varchar(255) DEFAULT NULL,
  `father_nid` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(255) DEFAULT NULL,
  `yearly_income` varchar(255) DEFAULT NULL,
  `present_continent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `present_country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `present_state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `present_city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_continent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `permanent_country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `permanent_state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `permanent_city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `parmanent_address` varchar(255) DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `class_id`, `name`, `group_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bangla', 0, '5357905461716459777_subject_image.jpeg', 1, '2024-05-09 00:21:53', '2024-05-26 00:55:06'),
(3, 1, 'English', 0, '10868008781716459786_subject_image.jpeg', 1, '2024-05-11 01:59:11', '2024-05-26 00:54:43'),
(4, 1, 'math', 0, '11297940031716459796_subject_image.jpeg', 1, '2024-05-11 02:00:28', '2024-05-26 00:54:52'),
(5, 12, 'German Language', 0, '14853127941715843211_subject_image.jpeg', 1, '2024-05-16 01:06:51', '2024-05-16 01:44:02'),
(6, 12, 'Science', 0, '19308659251715843247_subject_image.jpeg', 1, '2024-05-16 01:07:27', '2024-05-16 01:43:48'),
(7, 12, 'Physics', 0, NULL, 1, '2024-05-16 01:08:05', '2024-05-26 01:06:55'),
(8, 12, 'Bangla', 0, '8549343071715845474_subject_image.jpeg', 1, '2024-05-16 01:44:34', '2024-05-16 01:44:34'),
(9, 12, 'Math', 0, '8536368111715845492_subject_image.jpeg', 1, '2024-05-16 01:44:52', '2024-05-16 01:44:52'),
(10, 12, 'English', 0, '1488767651715845510_subject_image.jpeg', 1, '2024-05-16 01:45:10', '2024-05-16 01:45:10'),
(11, 4, 'Bangla', 0, '8705885361716186354_subject_image.jpeg', 1, '2024-05-20 00:25:54', '2024-05-20 00:25:54'),
(12, 1, 'Islam', 0, '211305491716459811_subject_image.jpeg', 1, '2024-05-20 05:25:42', '2024-05-23 04:23:31'),
(13, 1, 'Physics', 1, '8558934201716706543_subject_image.jpeg', 1, '2024-05-26 00:55:43', '2024-05-26 00:55:43'),
(14, 1, 'cam', 1, '5412891661716706584_subject_image.jpeg', 1, '2024-05-26 00:56:24', '2024-05-26 00:56:24'),
(15, 1, 'bilo', 1, '4937790141716706610_subject_image.jpeg', 1, '2024-05-26 00:56:50', '2024-05-26 00:56:50'),
(16, 1, 'math_commerce', 6, '3792929051716707399_subject_image.jpeg', 1, '2024-05-26 01:09:59', '2024-05-26 01:09:59'),
(17, 4, 'class-2 Bangla', 3, '16862871891716720783_subject_image.jpeg', 1, '2024-05-26 04:53:03', '2024-05-26 04:53:03'),
(18, 4, 'class-math', 0, '14825786101716720825_subject_image.jpeg', 1, '2024-05-26 04:53:45', '2024-05-26 04:53:45'),
(19, 1, 'arth_bangla', 7, '16265725831716721227_subject_image.jpeg', 1, '2024-05-26 05:00:27', '2024-05-26 05:00:49'),
(20, 11, 'class_9_bangla', 0, '2731826061717237734_subject_image.png', 1, '2024-06-01 04:28:54', '2024-06-01 04:28:54'),
(21, 1, 'History', 0, '12002273161717498894_subject_image.jpeg', 1, '2024-06-04 05:01:34', '2024-06-04 05:09:05'),
(22, 1, 'English-2nd', 0, '18511917961717498924_subject_image.jpeg', 1, '2024-06-04 05:02:04', '2024-06-04 05:07:36'),
(23, 1, 'Bangla-2nd', 0, '6652236981717498952_subject_image.jpeg', 1, '2024-06-04 05:02:32', '2024-06-04 05:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher_assents`
--

CREATE TABLE IF NOT EXISTS `subject_teacher_assents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `teacher_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_teacher_assents`
--

INSERT INTO `subject_teacher_assents` (`id`, `class_id`, `teacher_id`, `subject_id`, `session_id`, `section_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 186, 1, 6, 1, 1, '2024-05-19 23:12:20', '2024-05-19 23:12:20'),
(3, 12, 186, 7, 6, 7, 1, '2024-05-19 23:13:34', '2024-06-06 00:26:22'),
(4, 4, 186, 11, 6, 3, 1, '2024-05-20 00:26:49', '2024-05-20 00:26:49'),
(5, 1, 186, 3, 6, 1, 1, '2024-05-25 04:42:43', '2024-06-01 00:26:20'),
(6, 1, 186, 4, 6, 1, 1, '2024-06-01 00:27:44', '2024-06-01 00:27:44'),
(7, 4, 186, 17, 6, 3, 1, '2024-06-01 02:38:50', '2024-06-01 02:38:50'),
(8, 12, 178, 5, 6, 7, 1, '2024-06-01 04:23:48', '2024-06-01 04:23:48'),
(9, 11, 284, 20, 6, 8, 1, '2024-06-01 04:29:55', '2024-06-01 04:29:55'),
(10, 4, 191, 17, 6, 4, 1, '2024-06-01 05:59:47', '2024-06-06 03:27:16'),
(11, 1, 186, 1, 6, 2, 1, '2024-06-02 00:29:53', '2024-06-02 00:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(29, 'niaz@gmail.com', 1, '2024-01-07 23:30:26', '2024-01-07 23:30:26'),
(30, 'tristanwaller3586@yahoo.com', 1, '2024-01-31 17:30:50', '2024-01-31 17:30:50'),
(31, '29.01hk6q2g7zzfjyabjkvhz69737@mail4u.run', 1, '2024-02-02 04:52:20', '2024-02-02 04:52:20'),
(32, 'kJEcrp.qqdbbtb@sabletree.foundation', 1, '2024-02-05 18:54:06', '2024-02-05 18:54:06'),
(33, 'gary@artexposed.net', 1, '2024-02-05 18:54:13', '2024-02-05 18:54:13'),
(34, 'wlNIOu.qqdbbww@sabletree.foundation', 1, '2024-02-05 18:54:23', '2024-02-05 18:54:23'),
(35, 'michael.ventura@inetalliance.net', 1, '2024-02-05 18:54:29', '2024-02-05 18:54:29'),
(36, 'clindelli@comcast.net', 1, '2024-02-05 21:30:09', '2024-02-05 21:30:09'),
(37, 'danderson1960@verizon.net', 1, '2024-02-05 21:33:18', '2024-02-05 21:33:18'),
(38, 'rpurkey93@gmail.com', 1, '2024-02-05 23:01:31', '2024-02-05 23:01:31'),
(39, 'dj.bdis32@gmail.com', 1, '2024-02-05 23:01:38', '2024-02-05 23:01:38'),
(40, 'bogartwalker@yahoo.com', 1, '2024-02-06 01:00:52', '2024-02-06 01:00:52'),
(41, 'kanupatel01@gmail.com', 1, '2024-02-06 01:00:59', '2024-02-06 01:00:59'),
(42, 'akrown@bayousbestburgers.com', 1, '2024-02-06 03:03:59', '2024-02-06 03:03:59'),
(43, 'jmiranda@premieresinc.net', 1, '2024-02-06 04:18:37', '2024-02-06 04:18:37'),
(44, 'kionabogard@gmail.com', 1, '2024-02-06 04:18:44', '2024-02-06 04:18:44'),
(45, 'geraldine.fort@gmail.com', 1, '2024-02-06 05:42:51', '2024-02-06 05:42:51'),
(46, 'perla@allcleandallas.com', 1, '2024-02-06 05:42:54', '2024-02-06 05:42:54'),
(47, 'ronab110@aol.com', 1, '2024-02-06 07:24:20', '2024-02-06 07:24:20'),
(48, 'paz30566@icloud.com', 1, '2024-02-06 16:18:52', '2024-02-06 16:18:52'),
(49, 'allee26@verizon.net', 1, '2024-02-06 16:24:17', '2024-02-06 16:24:17'),
(50, 'strawflower_electronics@hotmail.com', 1, '2024-02-07 00:33:41', '2024-02-07 00:33:41'),
(51, 'angelomarrali@howardhanna.com', 1, '2024-02-07 00:34:02', '2024-02-07 00:34:02'),
(52, 'stephanie.bragglee@verizon.net', 1, '2024-02-07 22:13:22', '2024-02-07 22:13:22'),
(53, 'ghouff94@gmail.com', 1, '2024-02-07 22:13:27', '2024-02-07 22:13:27'),
(54, 'jd@nwocleaningservices.com', 1, '2024-02-07 23:42:39', '2024-02-07 23:42:39'),
(55, 'mark@acclaimaccident.com.au', 1, '2024-02-07 23:42:46', '2024-02-07 23:42:46'),
(56, 'georgiatelecominstallation@yahoo.com', 1, '2024-02-08 00:42:48', '2024-02-08 00:42:48'),
(57, 'nazreenayien@gmail.com', 1, '2024-02-08 01:38:58', '2024-02-08 01:38:58'),
(58, 'kathy@kapmfg.com', 1, '2024-02-08 03:07:51', '2024-02-08 03:07:51'),
(59, 'jim.segers@thinkgreenlawnservice.com', 1, '2024-02-08 03:07:52', '2024-02-08 03:07:52'),
(60, 'controller@gildevco.com', 1, '2024-02-08 04:03:51', '2024-02-08 04:03:51'),
(61, 'abbypigao07@gmail.com', 1, '2024-02-08 04:52:40', '2024-02-08 04:52:40'),
(62, 'hannaha.cowart@yahoo.com', 1, '2024-02-08 04:52:50', '2024-02-08 04:52:50'),
(63, 'tom.jordy@gmail.com', 1, '2024-02-08 06:48:16', '2024-02-08 06:48:16'),
(64, 'tharper001@aol.com', 1, '2024-02-08 06:48:16', '2024-02-08 06:48:16'),
(65, 'indramungal@oacc.cc', 1, '2024-02-08 08:07:42', '2024-02-08 08:07:42'),
(66, 'christiantinney@comcast.net', 1, '2024-02-08 09:26:06', '2024-02-08 09:26:06'),
(67, 'norahboyle80@gmail.com', 1, '2024-02-08 22:41:19', '2024-02-08 22:41:19'),
(68, 'ecmhd1@yahoo.ca', 1, '2024-02-08 22:41:19', '2024-02-08 22:41:19'),
(69, 'Tysonm@microsoft.com', 1, '2024-02-08 22:50:11', '2024-02-08 22:50:11'),
(70, 'dajuana99henry@yahoo.com', 1, '2024-02-08 22:57:36', '2024-02-08 22:57:36'),
(71, 'shiaron@eti.mx', 1, '2024-02-08 23:11:17', '2024-02-08 23:11:17'),
(72, 'acissam@yahoo.com', 1, '2024-02-08 23:24:52', '2024-02-08 23:24:52'),
(73, 'lema2023@live.com', 1, '2024-02-08 23:30:17', '2024-02-08 23:30:17'),
(74, 'Jcmurphy63@hotmail.com', 1, '2024-02-08 23:36:30', '2024-02-08 23:36:30'),
(75, 'bigzeroda@gmail.com', 1, '2024-02-08 23:44:40', '2024-02-08 23:44:40'),
(76, 'mdawson010270@gmail.com', 1, '2024-02-08 23:55:11', '2024-02-08 23:55:11'),
(77, 'kc.maslowska@gmail.com', 1, '2024-02-09 00:06:29', '2024-02-09 00:06:29'),
(78, 'azerty221@live.fr', 1, '2024-02-09 00:06:29', '2024-02-09 00:06:29'),
(79, 't.sanchez2012@yahoo.com', 1, '2024-02-09 00:17:56', '2024-02-09 00:17:56'),
(80, 'Corey.reith95@gmail.com', 1, '2024-02-09 00:28:17', '2024-02-09 00:28:17'),
(81, 'Kathyraker1@gmail.com', 1, '2024-02-09 00:28:17', '2024-02-09 00:28:17'),
(82, 'jmlucci2@gmail.com', 1, '2024-02-09 00:48:10', '2024-02-09 00:48:10'),
(83, 'hubernick15@yahoo.com', 1, '2024-02-09 00:48:10', '2024-02-09 00:48:10'),
(84, 'brookepuccii@gmail.com', 1, '2024-02-09 00:58:30', '2024-02-09 00:58:30'),
(85, 'sknowlesjr@gmail.com', 1, '2024-02-09 00:58:30', '2024-02-09 00:58:30'),
(86, 'fatbuttsitflyer@gmail.com', 1, '2024-02-09 01:09:00', '2024-02-09 01:09:00'),
(87, 'jim.kenan@altec.com', 1, '2024-02-09 01:34:51', '2024-02-09 01:34:51'),
(88, 'EmailPeterBak@gmail.com', 1, '2024-02-09 01:50:20', '2024-02-09 01:50:20'),
(89, 'carolannod1@verizon.net', 1, '2024-02-09 02:19:32', '2024-02-09 02:19:32'),
(90, 'rudy.perez@rocketmail.com', 1, '2024-02-09 02:19:34', '2024-02-09 02:19:34'),
(91, 'Lucyferrari@rogers.com', 1, '2024-02-09 02:43:54', '2024-02-09 02:43:54'),
(92, 'barbvila@gmail.com', 1, '2024-02-09 03:00:26', '2024-02-09 03:00:26'),
(93, 'stevenrumfelt@gmail.com', 1, '2024-02-09 03:00:27', '2024-02-09 03:00:27'),
(94, 'courtneylahn@gmail.com', 1, '2024-02-09 03:16:57', '2024-02-09 03:16:57'),
(95, 'kaylahovey002@gmail.com', 1, '2024-02-09 03:35:29', '2024-02-09 03:35:29'),
(96, 'pichicokis@gmail.com', 1, '2024-02-09 03:35:34', '2024-02-09 03:35:34'),
(97, 'blaine@wvacc.org', 1, '2024-02-09 03:54:58', '2024-02-09 03:54:58'),
(98, 'jwswindell49@gmail.com', 1, '2024-02-09 04:15:29', '2024-02-09 04:15:29'),
(99, 'holmes-a@outlook.com', 1, '2024-02-09 04:15:31', '2024-02-09 04:15:31'),
(100, 'bobmo40@yahoo.com', 1, '2024-02-09 04:38:03', '2024-02-09 04:38:03'),
(101, 'marton19@aol.com', 1, '2024-02-09 05:01:34', '2024-02-09 05:01:34'),
(102, 'Jimimotta@yahoo.com', 1, '2024-02-09 05:01:34', '2024-02-09 05:01:34'),
(103, 'wowbigcoll@gmail.com', 1, '2024-02-09 05:25:13', '2024-02-09 05:25:13'),
(104, 'liz96hans@gmail.com', 1, '2024-02-09 05:25:13', '2024-02-09 05:25:13'),
(105, 'jmwoods3@gmail.com', 1, '2024-02-09 05:42:17', '2024-02-09 05:42:17'),
(106, 'j_m_t_anderson@hotmail.com', 1, '2024-02-09 05:42:17', '2024-02-09 05:42:17'),
(107, 'rdenn@comcast.net', 1, '2024-02-09 05:58:51', '2024-02-09 05:58:51'),
(108, 'arden.dierkerviik@mail.mcgill.ca', 1, '2024-02-09 05:58:51', '2024-02-09 05:58:51'),
(109, 'JohnHennig@gmail.com', 1, '2024-02-09 06:14:20', '2024-02-09 06:14:20'),
(110, 'dafframatoulaye@live.com', 1, '2024-02-09 06:14:27', '2024-02-09 06:14:27'),
(111, 'melissanieporte@gmail.com', 1, '2024-02-09 06:36:02', '2024-02-09 06:36:02'),
(112, 'deebisel4@gmail.com', 1, '2024-02-09 07:03:34', '2024-02-09 07:03:34'),
(113, '19515864208@txt.att.net', 1, '2024-02-09 07:33:44', '2024-02-09 07:33:44'),
(114, 'low030680@aol.com', 1, '2024-02-09 07:33:44', '2024-02-09 07:33:44'),
(115, 'hoosInrmm@comcast.net', 1, '2024-02-09 08:08:56', '2024-02-09 08:08:56'),
(116, 'a.smith@levitan.com', 1, '2024-02-09 08:08:57', '2024-02-09 08:08:57'),
(117, '15044738692@tmomail.net', 1, '2024-02-09 08:54:56', '2024-02-09 08:54:56'),
(118, 'kaptanmark22@gmail.com', 1, '2024-02-09 08:54:56', '2024-02-09 08:54:56'),
(119, 'betsylindholm10@gmail.com', 1, '2024-02-09 09:35:47', '2024-02-09 09:35:47'),
(120, 'hastingsalison1@gmail.com', 1, '2024-02-09 10:13:34', '2024-02-09 10:13:34'),
(121, 'mryaster@gmail.com', 1, '2024-02-09 10:13:34', '2024-02-09 10:13:34'),
(122, 'tzahalbenavraham@verizon.net', 1, '2024-02-09 10:29:38', '2024-02-09 10:29:38'),
(123, 'jonah.ho@verizon.net', 1, '2024-02-09 10:29:43', '2024-02-09 10:29:43'),
(124, 'Bethanygchristian@gmail.com', 1, '2024-02-09 11:01:36', '2024-02-09 11:01:36'),
(125, 'ps1lehman@gmail.com', 1, '2024-02-09 11:01:36', '2024-02-09 11:01:36'),
(126, 'necubbage18@gmail.com', 1, '2024-02-09 11:42:23', '2024-02-09 11:42:23'),
(127, 'mkaurgill717@gmail.com', 1, '2024-02-09 11:42:24', '2024-02-09 11:42:24'),
(128, 'bjensen083@gmail.com', 1, '2024-02-09 12:31:24', '2024-02-09 12:31:24'),
(129, 'Elitepw1215@gmail.com', 1, '2024-02-09 12:31:25', '2024-02-09 12:31:25'),
(130, 'andrebrisbon@icloud.com', 1, '2024-02-09 13:09:15', '2024-02-09 13:09:15'),
(131, 'dnwa123@yahoo.ca', 1, '2024-02-09 13:09:15', '2024-02-09 13:09:15'),
(132, 'Philheins@yahoo.com', 1, '2024-02-09 13:49:03', '2024-02-09 13:49:03'),
(133, 'clydegoldbach@outlook.com', 1, '2024-02-09 14:30:57', '2024-02-09 14:30:57'),
(134, 'charcyj.13@gmail.com', 1, '2024-02-09 14:58:29', '2024-02-09 14:58:29'),
(135, 'Tommy.sevier@gmail.com', 1, '2024-02-09 15:24:04', '2024-02-09 15:24:04'),
(136, 'chards1960@gmail.com', 1, '2024-02-09 15:24:04', '2024-02-09 15:24:04'),
(137, 'cookiemdeb@comcast.net', 1, '2024-02-09 15:53:42', '2024-02-09 15:53:42'),
(138, 'tomryan19@live.com.au', 1, '2024-02-09 16:29:29', '2024-02-09 16:29:29'),
(139, 'jsponsler@valley-neuroscience.com', 1, '2024-02-09 17:09:21', '2024-02-09 17:09:21'),
(140, 'shirishbhatnagar@gmail.com', 1, '2024-02-09 17:57:17', '2024-02-09 17:57:17'),
(141, 'trina@hotmail.com', 1, '2024-02-09 18:38:19', '2024-02-09 18:38:19'),
(142, 'ColtenRybuck@hotmail.ca', 1, '2024-02-09 18:38:19', '2024-02-09 18:38:19'),
(143, 'armyaviator1@gmail.com', 1, '2024-02-09 19:10:04', '2024-02-09 19:10:04'),
(144, 'qbmonarks@icloud.com', 1, '2024-02-09 19:35:39', '2024-02-09 19:35:39'),
(145, 'colefreidly@gmail.com', 1, '2024-02-09 19:58:15', '2024-02-09 19:58:15'),
(146, 'arthur.hernandez@pumpco.cc', 1, '2024-02-09 19:58:17', '2024-02-09 19:58:17'),
(147, 'rmichmchenry208@yahoo.com', 1, '2024-02-09 20:19:49', '2024-02-09 20:19:49'),
(148, 'mmhayyeri@yahoo.com', 1, '2024-02-09 20:19:52', '2024-02-09 20:19:52'),
(149, 'paigeelizabethdesigns@hotmail.com', 1, '2024-02-09 20:39:22', '2024-02-09 20:39:22'),
(150, 'jenibrahim17@yahoo.com', 1, '2024-02-09 20:56:54', '2024-02-09 20:56:54'),
(151, 'psheridan1317@me.com', 1, '2024-02-09 20:56:54', '2024-02-09 20:56:54'),
(152, 'info@fortacorp.com', 1, '2024-02-09 21:15:28', '2024-02-09 21:15:28'),
(153, 'rosshawks@hotmail.com', 1, '2024-02-09 21:38:01', '2024-02-09 21:38:01'),
(154, 'axbeserra@gmail.com', 1, '2024-02-09 21:38:01', '2024-02-09 21:38:01'),
(155, 'arashgeranmayeh1999@gmail.com', 1, '2024-02-09 22:01:37', '2024-02-09 22:01:37'),
(156, 'jassetto@verizon.net', 1, '2024-02-09 22:19:34', '2024-02-09 22:19:34'),
(157, 'kathy.kc@verizon.net', 1, '2024-02-09 22:19:35', '2024-02-09 22:19:35'),
(158, 'tamerawilson96@gmail.com', 1, '2024-02-09 22:27:16', '2024-02-09 22:27:16'),
(159, 'MHAMMON0@GMAIL.COM', 1, '2024-02-09 22:51:58', '2024-02-09 22:51:58'),
(160, 'aprilbriggs1972@gmail.com', 1, '2024-02-09 23:19:13', '2024-02-09 23:19:13'),
(161, 'jhubb96@gmail.com', 1, '2024-02-09 23:44:51', '2024-02-09 23:44:51'),
(162, 'CLIFF@MYMMFG.COM', 1, '2024-02-10 00:09:25', '2024-02-10 00:09:25'),
(163, 'schaerlilian@gmail.com', 1, '2024-02-10 00:09:25', '2024-02-10 00:09:25'),
(164, 'tfiskatoris@gmail.com', 1, '2024-02-10 00:33:02', '2024-02-10 00:33:02'),
(165, 'Candrade4833@gmail.com', 1, '2024-02-10 00:33:02', '2024-02-10 00:33:02'),
(166, 'BUSYBEES106@GMAIL.COM', 1, '2024-02-10 00:54:36', '2024-02-10 00:54:36'),
(167, 'Gorozco68@hotmail.com', 1, '2024-02-10 01:14:12', '2024-02-10 01:14:12'),
(168, 'sivan.grossman@gmail.com', 1, '2024-02-10 01:14:13', '2024-02-10 01:14:13'),
(169, 'jjwhite72@yahoo.com', 1, '2024-02-10 01:18:49', '2024-02-10 01:18:49'),
(170, 'Frances.mossgrove@yahoo.com', 1, '2024-02-10 01:31:45', '2024-02-10 01:31:45'),
(171, 'turnerinsulation@gmail.com', 1, '2024-02-10 01:51:16', '2024-02-10 01:51:16'),
(172, 'JAMESLOVE76@YAHOO.COM', 1, '2024-02-10 01:51:16', '2024-02-10 01:51:16'),
(173, 'MORGAN.MCFADYEN@GMAIL.COM', 1, '2024-02-10 02:09:58', '2024-02-10 02:09:58'),
(174, 'Terisha.m.ray@gmail.com', 1, '2024-02-10 02:30:30', '2024-02-10 02:30:30'),
(175, '8019281157@vtext.com', 1, '2024-02-10 02:30:32', '2024-02-10 02:30:32'),
(176, 'whalenr68@gmail.com', 1, '2024-02-10 02:53:09', '2024-02-10 02:53:09'),
(177, 'robertbaric@verizon.net', 1, '2024-02-10 03:03:56', '2024-02-10 03:03:56'),
(178, 'mmmrjs37@gmail.com', 1, '2024-02-10 03:03:59', '2024-02-10 03:03:59'),
(179, 'lksawick@gmail.com', 1, '2024-02-10 03:15:40', '2024-02-10 03:15:40'),
(180, 'pouncyproductions@gmail.com', 1, '2024-02-10 03:15:40', '2024-02-10 03:15:40'),
(181, 'ctkroetsch@hotmail.com', 1, '2024-02-10 03:38:12', '2024-02-10 03:38:12'),
(182, 'wendystuhl@verizon.net', 1, '2024-02-10 04:26:46', '2024-02-10 04:26:46'),
(183, 'timsinabrothers@gmail.com', 1, '2024-02-10 04:41:31', '2024-02-10 04:41:31'),
(184, 'stevenjaywood1@gmail.com', 1, '2024-02-10 04:41:31', '2024-02-10 04:41:31'),
(185, 'mbelaineh@vera.org', 1, '2024-02-10 05:17:24', '2024-02-10 05:17:24'),
(186, 'pmrios@sbcglobal.net', 1, '2024-02-10 05:17:25', '2024-02-10 05:17:25'),
(187, 'Tyrell.wagner@comcast.net', 1, '2024-02-10 05:38:23', '2024-02-10 05:38:23'),
(188, 'heatherwalker2004@yahoo.ca', 1, '2024-02-10 05:38:23', '2024-02-10 05:38:23'),
(189, 'lilliamely60@sbcglobal.net', 1, '2024-02-10 06:00:00', '2024-02-10 06:00:00'),
(190, '4164178024@txt.freedommobile.ca', 1, '2024-02-10 06:23:38', '2024-02-10 06:23:38'),
(191, 'mollysummers19@yahoo.com', 1, '2024-02-10 06:52:15', '2024-02-10 06:52:15'),
(192, 'matt.s.hinton@bgelectric.us', 1, '2024-02-10 06:52:15', '2024-02-10 06:52:15'),
(193, 'scott@radovich.com', 1, '2024-02-10 07:31:22', '2024-02-10 07:31:22'),
(194, 'alexis1745048@outlook.com', 1, '2024-02-10 07:31:23', '2024-02-10 07:31:23'),
(195, 'lderouin107@verizon.net', 1, '2024-02-10 07:48:05', '2024-02-10 07:48:05'),
(196, 'Abbas.laraib@gmail.com', 1, '2024-02-10 08:15:41', '2024-02-10 08:15:41'),
(197, 'breinschreiber@gmail.com', 1, '2024-02-10 08:15:41', '2024-02-10 08:15:41'),
(198, 'fusters007@yahoo.com', 1, '2024-02-10 08:54:02', '2024-02-10 08:54:02'),
(199, '19294135142@vtext.com', 1, '2024-02-10 08:54:02', '2024-02-10 08:54:02'),
(200, 'decoder98@gmail.com', 1, '2024-02-10 09:45:16', '2024-02-10 09:45:16'),
(201, 'darcymoore@msn.com', 1, '2024-02-10 09:45:16', '2024-02-10 09:45:16'),
(202, 'briannalknight26@yahoo.com', 1, '2024-02-10 10:35:18', '2024-02-10 10:35:18'),
(203, 'pafinfan@gmail.com', 1, '2024-02-10 12:38:44', '2024-02-10 12:38:44'),
(204, 'john@pintsandpiespub.com', 1, '2024-02-10 13:36:53', '2024-02-10 13:36:53'),
(205, 'Chinogo220@gmail.com', 1, '2024-02-10 13:36:53', '2024-02-10 13:36:53'),
(206, 'Seth10grove@gmail.com', 1, '2024-02-10 15:01:37', '2024-02-10 15:01:37'),
(207, 'jhfantasy06@yahoo.com', 1, '2024-02-10 15:51:36', '2024-02-10 15:51:36'),
(208, 'jzg.kherndon@mail.com', 1, '2024-02-10 16:28:06', '2024-02-10 16:28:06'),
(209, '12253716539@vtext.com', 1, '2024-02-10 16:57:28', '2024-02-10 16:57:28'),
(210, 'wendy@coloradoluxeliving.com', 1, '2024-02-10 19:01:31', '2024-02-10 19:01:31'),
(211, 'phil.mcdermott@cht.com', 1, '2024-02-10 19:46:24', '2024-02-10 19:46:24'),
(212, 'joeritz45@gmail.com', 1, '2024-02-10 20:25:58', '2024-02-10 20:25:58'),
(213, 'CAGATAY.UNAL@EXSTO.ORG', 1, '2024-02-10 21:16:42', '2024-02-10 21:16:42'),
(214, '18472088054@vtext.com', 1, '2024-02-10 21:47:04', '2024-02-10 21:47:04'),
(215, 'simpson.leslie67@gmail.com', 1, '2024-02-10 22:14:13', '2024-02-10 22:14:13'),
(216, '19202685487@tmomail.net', 1, '2024-02-10 23:11:58', '2024-02-10 23:11:58'),
(217, 'soniapaap595@gmail.com', 1, '2024-02-10 23:34:19', '2024-02-10 23:34:19'),
(218, 'Ccfd8@hotmail.com', 1, '2024-02-10 23:59:38', '2024-02-10 23:59:38'),
(219, 'TANNIAEW@hotmail.com', 1, '2024-02-11 00:29:00', '2024-02-11 00:29:00'),
(220, 'jan.kim789@gmail.com', 1, '2024-02-11 00:52:15', '2024-02-11 00:52:15'),
(221, 'robert_cranfield@yahoo.ca', 1, '2024-02-11 01:14:26', '2024-02-11 01:14:26'),
(222, 'adam.mn100@yahoo.com', 1, '2024-02-11 01:57:38', '2024-02-11 01:57:38'),
(223, 'HRTBRCR68@YAHOO.COM', 1, '2024-02-11 02:19:49', '2024-02-11 02:19:49'),
(224, 'kraviraju@gmail.com', 1, '2024-02-11 03:15:31', '2024-02-11 03:15:31'),
(225, 'heather.belcastro@hotmail.com', 1, '2024-02-11 04:02:07', '2024-02-11 04:02:07'),
(226, 'wildatoo@rogers.com', 1, '2024-02-11 04:49:53', '2024-02-11 04:49:53'),
(227, 'ken.elliott@ntlworld.com', 1, '2024-02-11 05:52:11', '2024-02-11 05:52:11'),
(228, 'jsilver@sandiego.edu', 1, '2024-02-11 07:15:44', '2024-02-11 07:15:44'),
(229, 'verville1947@gmail.com', 1, '2024-02-11 07:42:17', '2024-02-11 07:42:17'),
(230, 'edenshachar97@gmail.com', 1, '2024-02-11 09:07:04', '2024-02-11 09:07:04'),
(231, 'David.martin90@outlook.com', 1, '2024-02-11 11:13:41', '2024-02-11 11:13:41'),
(232, 'sandilurey@aol.com', 1, '2024-02-11 13:03:45', '2024-02-11 13:03:45'),
(233, 'puigvicky@yahoo.com.ar', 1, '2024-02-11 14:11:56', '2024-02-11 14:11:56'),
(234, 'hans.konecnik@icloud.com', 1, '2024-02-11 16:31:14', '2024-02-11 16:31:14'),
(235, 'd.kohler.che@gmail.com', 1, '2024-02-11 18:00:58', '2024-02-11 18:00:58'),
(236, 'tigger42783@msn.com', 1, '2024-02-11 18:53:40', '2024-02-11 18:53:40'),
(237, 'JEH0123@AOL.COM', 1, '2024-02-11 19:58:45', '2024-02-11 19:58:45'),
(238, 'scarlettlingwood@hotmail.co.uk', 1, '2024-02-11 21:01:22', '2024-02-11 21:01:22'),
(239, 'brunnmeiermaris@gmail.com', 1, '2024-02-11 21:28:57', '2024-02-11 21:28:57'),
(240, 'sararosiedoh@hotmail.com', 1, '2024-02-11 21:52:11', '2024-02-11 21:52:11'),
(241, 'tshealy1@yahoo.com', 1, '2024-02-11 22:12:22', '2024-02-11 22:12:22'),
(242, 'mperrycpa@aol.com', 1, '2024-02-11 22:33:34', '2024-02-11 22:33:34'),
(243, 'JANESEITZ@GMAIL.COM', 1, '2024-02-11 23:27:11', '2024-02-11 23:27:11'),
(244, '13308531977@vtext.com', 1, '2024-02-12 00:01:42', '2024-02-12 00:01:42'),
(245, 'maphi23@icloud.com', 1, '2024-02-12 00:52:17', '2024-02-12 00:52:17'),
(246, 'jdooley7152@yahoo.com', 1, '2024-02-12 01:33:57', '2024-02-12 01:33:57'),
(247, 'j.truong92@gmail.com', 1, '2024-02-12 02:02:32', '2024-02-12 02:02:32'),
(248, 'leslie_sereix@att.net', 1, '2024-02-12 02:27:41', '2024-02-12 02:27:41'),
(249, 'jmem75@gmail.com', 1, '2024-02-12 02:52:23', '2024-02-12 02:52:23'),
(250, 'molvera0912@yahoo.com', 1, '2024-02-12 03:28:21', '2024-02-12 03:28:21'),
(251, 'vblackmoore@gmail.com', 1, '2024-02-12 04:02:47', '2024-02-12 04:02:47'),
(252, 'sylviakf@me.com', 1, '2024-02-12 04:49:47', '2024-02-12 04:49:47'),
(253, 'harry@nytempering.com', 1, '2024-02-12 05:13:09', '2024-02-12 05:13:09'),
(254, 'coxd_11@yahoo.com', 1, '2024-02-12 05:41:39', '2024-02-12 05:41:39'),
(255, 'seth.moul@gmail.com', 1, '2024-02-12 06:24:22', '2024-02-12 06:24:22'),
(256, 'glalli@tru.ca', 1, '2024-02-12 06:53:52', '2024-02-12 06:53:52'),
(257, 'thorstenhofe@gmail.com', 1, '2024-02-12 07:29:51', '2024-02-12 07:29:51'),
(258, 'bobbittjohnm@yahoo.com', 1, '2024-02-12 08:16:45', '2024-02-12 08:16:45'),
(259, 'dfolger@addusa.com', 1, '2024-02-12 09:02:04', '2024-02-12 09:02:04'),
(260, 'mahadevi1008@gmail.com', 1, '2024-02-12 13:47:34', '2024-02-12 13:47:34'),
(261, 'byant3@gmail.com', 1, '2024-02-12 14:49:55', '2024-02-12 14:49:55'),
(262, 'T.Gabryniewski@kinext.pl', 1, '2024-02-12 15:25:10', '2024-02-12 15:25:10'),
(263, 'dee@plumbingsystems.net', 1, '2024-02-12 16:32:21', '2024-02-12 16:32:21'),
(264, '15596602582@vtext.com', 1, '2024-02-12 16:48:09', '2024-02-12 16:48:09'),
(265, '12817553223@vtext.com', 1, '2024-02-12 17:03:12', '2024-02-12 17:03:12'),
(266, 'connorsmcc@gmail.com', 1, '2024-02-12 17:17:45', '2024-02-12 17:17:45'),
(267, 'mirsada.zak@gmail.com', 1, '2024-02-12 17:48:35', '2024-02-12 17:48:35'),
(268, 'ado@pga.com', 1, '2024-02-12 18:08:06', '2024-02-12 18:08:06'),
(269, 'debbiedirksing@gmail.com', 1, '2024-02-12 18:55:19', '2024-02-12 18:55:19'),
(270, 'smendonca@sbcglobal.net', 1, '2024-02-12 19:23:39', '2024-02-12 19:23:39'),
(271, 'marydiaz1@gmail.com', 1, '2024-02-12 20:06:36', '2024-02-12 20:06:36'),
(272, 'ericwierenga1@gmail.com', 1, '2024-02-12 20:25:19', '2024-02-12 20:25:19'),
(273, 'christytsi@gmail.com', 1, '2024-02-12 20:43:34', '2024-02-12 20:43:34'),
(274, 'davissmary@gmail.com', 1, '2024-02-12 20:59:39', '2024-02-12 20:59:39'),
(275, 'mark_wholesaledesignwarehouse@yahoo.com', 1, '2024-02-12 21:13:45', '2024-02-12 21:13:45'),
(276, 'trezegoal2@hotmail.com', 1, '2024-02-12 21:51:46', '2024-02-12 21:51:46'),
(277, 'kyoung.jr@hotmail.com', 1, '2024-02-12 22:04:19', '2024-02-12 22:04:19'),
(278, 'pattyson@comcast.net', 1, '2024-02-12 22:18:21', '2024-02-12 22:18:21'),
(279, '17276410042@vtext.com', 1, '2024-02-12 22:36:05', '2024-02-12 22:36:05'),
(280, 'NICHICHUA@YAHOO.COM', 1, '2024-02-12 23:11:23', '2024-02-12 23:11:23'),
(281, 'schwarzandreas@yahoo.de', 1, '2024-02-12 23:25:56', '2024-02-12 23:25:56'),
(282, 'bikelaw@att.net', 1, '2024-02-13 00:02:05', '2024-02-13 00:02:05'),
(283, 'steinhaeuser.f@t-online.de', 1, '2024-02-13 00:12:43', '2024-02-13 00:12:43'),
(284, 'rachnaahlawat@yahoo.com', 1, '2024-02-13 00:32:40', '2024-02-13 00:32:40'),
(285, 'lYNITH306@YAHOO.COM', 1, '2024-02-13 00:52:37', '2024-02-13 00:52:37'),
(286, 'lily.yates@sky.com', 1, '2024-02-13 01:03:13', '2024-02-13 01:03:13'),
(287, 'chris.eastwood4@gmail.com', 1, '2024-02-13 01:14:36', '2024-02-13 01:14:36'),
(288, 'm.theworld@yahoo.com', 1, '2024-02-13 01:49:41', '2024-02-13 01:49:41'),
(289, 'zulmawall4@gmail.com', 1, '2024-02-13 02:00:44', '2024-02-13 02:00:44'),
(290, 'invest@angellist.com', 1, '2024-02-13 02:12:48', '2024-02-13 02:12:48'),
(291, 'halbertsusan@yahoo.com', 1, '2024-02-13 02:56:38', '2024-02-13 02:56:38'),
(292, 'JOY2RWORLD@ME.COM', 1, '2024-02-13 03:12:43', '2024-02-13 03:12:43'),
(293, 'Lindsey.heberling@yahoo.com', 1, '2024-02-13 03:28:49', '2024-02-13 03:28:49'),
(294, 'jbevans123@aol.com', 1, '2024-02-13 04:34:14', '2024-02-13 04:34:14'),
(295, 'mbanuelos@subire.mx', 1, '2024-02-13 04:47:18', '2024-02-13 04:47:18'),
(296, 'joshd1donley@hotmail.com', 1, '2024-02-13 05:01:32', '2024-02-13 05:01:32'),
(297, 'kymmiehowie@gmail.com', 1, '2024-02-13 05:15:34', '2024-02-13 05:15:34'),
(298, 'sbSchafer@gmail.com', 1, '2024-02-13 05:28:41', '2024-02-13 05:28:41'),
(299, 'Glennjones@usa.com', 1, '2024-02-13 05:54:47', '2024-02-13 05:54:47'),
(300, 'jdwoernley@aol.com', 1, '2024-02-13 06:08:15', '2024-02-13 06:08:15'),
(301, 'kerrimazz@gmail.com', 1, '2024-02-13 06:20:21', '2024-02-13 06:20:21'),
(302, 'mgadayr@gmail.com', 1, '2024-02-13 07:06:42', '2024-02-13 07:06:42'),
(303, 'parvatim@mac.com', 1, '2024-02-13 07:32:02', '2024-02-13 07:32:02'),
(304, 'alfredo.olivera@gmail.com', 1, '2024-02-13 07:48:16', '2024-02-13 07:48:16'),
(305, 'pablotortoriello@gmail.com', 1, '2024-02-13 09:30:51', '2024-02-13 09:30:51'),
(306, 'kennoakes1@gmail.com', 1, '2024-02-13 09:54:30', '2024-02-13 09:54:30'),
(307, 'davismxiong@gmail.com', 1, '2024-02-13 10:32:56', '2024-02-13 10:32:56'),
(308, 'michou08@live.ca', 1, '2024-02-13 10:55:28', '2024-02-13 10:55:28'),
(309, 'oneneedler@yahoo.com', 1, '2024-02-13 11:24:31', '2024-02-13 11:24:31'),
(310, 'farrenmusc@gmail.com', 1, '2024-02-13 11:52:11', '2024-02-13 11:52:11'),
(311, 'nataliauribegallego@gmail.com', 1, '2024-02-13 12:19:34', '2024-02-13 12:19:34'),
(312, 'wljohnson182@hotmail.com', 1, '2024-02-13 12:46:33', '2024-02-13 12:46:33'),
(313, 'kbkna@centurytel.net', 1, '2024-02-13 13:37:12', '2024-02-13 13:37:12'),
(314, 'rlr@execulink.com', 1, '2024-02-13 13:59:27', '2024-02-13 13:59:27'),
(315, 'marcmorelli@yahoo.com', 1, '2024-02-13 14:20:58', '2024-02-13 14:20:58'),
(316, 'Johnaingle@yahoo.com', 1, '2024-02-13 15:36:34', '2024-02-13 15:36:34'),
(317, 'evie.shoenthal@gmail.com', 1, '2024-02-13 16:17:15', '2024-02-13 16:17:15'),
(318, 'daltonbaird777@gmail.com', 1, '2024-02-13 16:39:09', '2024-02-13 16:39:09'),
(319, 'SLOWREY12@GMAIL.COM', 1, '2024-02-13 17:05:45', '2024-02-13 17:05:45'),
(320, '17259107949@vtext.com', 1, '2024-02-13 17:46:05', '2024-02-13 17:46:05'),
(321, '13102705885@txt.att.net', 1, '2024-02-13 18:24:06', '2024-02-13 18:24:06'),
(322, '19084062750@txt.att.net', 1, '2024-02-13 19:08:59', '2024-02-13 19:08:59'),
(323, 'amy.murray11@gmail.com', 1, '2024-02-13 19:25:47', '2024-02-13 19:25:47'),
(324, 'aldarmaki_@hotmail.com', 1, '2024-02-13 19:40:07', '2024-02-13 19:40:07'),
(325, '12672292570@vtext.com', 1, '2024-02-13 20:22:59', '2024-02-13 20:22:59'),
(326, 'brycegoldsmith@yahoo.ca', 1, '2024-02-13 20:36:45', '2024-02-13 20:36:45'),
(327, 'bcooley261@cox.net', 1, '2024-02-13 21:05:11', '2024-02-13 21:05:11'),
(328, 'anggie13fradilla@yahoo.co.id', 1, '2024-02-13 21:18:52', '2024-02-13 21:18:52'),
(329, 'mcoyle.mlc@gmail.com', 1, '2024-02-13 21:33:10', '2024-02-13 21:33:10'),
(330, 'titisurfgirl@hotmail.com', 1, '2024-02-13 21:44:11', '2024-02-13 21:44:11'),
(331, 'MRS-PST@pacbell.net', 1, '2024-02-13 22:14:14', '2024-02-13 22:14:14'),
(332, 'nickistauffacher@gmail.com', 1, '2024-02-13 22:24:48', '2024-02-13 22:24:48'),
(333, 'melissaashour@yahoo.com', 1, '2024-02-13 22:44:42', '2024-02-13 22:44:42'),
(334, 'cedarhillhomestead@gmail.com', 1, '2024-02-13 22:54:37', '2024-02-13 22:54:37'),
(335, 'sanata1407@outlook.com', 1, '2024-02-13 23:03:42', '2024-02-13 23:03:42'),
(336, 'xuhuanjie918@gmail.com', 1, '2024-02-13 23:13:39', '2024-02-13 23:13:39'),
(337, '12672311763@vtext.com', 1, '2024-02-13 23:24:34', '2024-02-13 23:24:34'),
(338, 'anita.hofcapelle@gmx.de', 1, '2024-02-13 23:35:41', '2024-02-13 23:35:41'),
(339, 'melodydoyle76@gmail.com', 1, '2024-02-13 23:47:27', '2024-02-13 23:47:27'),
(340, 'condo560mds@gmail.com', 1, '2024-02-14 00:00:27', '2024-02-14 00:00:27'),
(341, 'verenaburt@gmail.com', 1, '2024-02-14 00:14:31', '2024-02-14 00:14:31'),
(342, 'danload@aol.com', 1, '2024-02-14 00:26:36', '2024-02-14 00:26:36'),
(343, 'maria.hernandez@mail.udp.cl', 1, '2024-02-14 00:37:46', '2024-02-14 00:37:46'),
(344, 'rpvoy@yahoo.com', 1, '2024-02-14 00:48:50', '2024-02-14 00:48:50'),
(345, '19046980088@tmomail.net', 1, '2024-02-14 00:58:43', '2024-02-14 00:58:43'),
(346, 'Whtomlin@aol.com', 1, '2024-02-14 01:08:23', '2024-02-14 01:08:23'),
(347, 'bethedney@rogers.com', 1, '2024-02-14 01:30:31', '2024-02-14 01:30:31'),
(348, 'charles-baillargeon@hotmail.com', 1, '2024-02-14 01:42:14', '2024-02-14 01:42:14'),
(349, 'jackdailey0808@gmail.com', 1, '2024-02-14 01:54:45', '2024-02-14 01:54:45'),
(350, 'lisahousson@me.com', 1, '2024-02-14 02:07:04', '2024-02-14 02:07:04'),
(351, 'sfpomeroy@gmail.com', 1, '2024-02-14 02:18:52', '2024-02-14 02:18:52'),
(352, 'sonia.smith.ext@gmail.com', 1, '2024-02-14 02:30:34', '2024-02-14 02:30:34'),
(353, 'imurray26@gmail.com', 1, '2024-02-14 02:53:56', '2024-02-14 02:53:56'),
(354, 'haoquach2001@yahoo.com', 1, '2024-02-14 03:05:53', '2024-02-14 03:05:53'),
(355, 'terrellrrussell@gmail.com', 1, '2024-02-14 03:17:01', '2024-02-14 03:17:01'),
(356, 'DOMENII@RACOM-NET.COM', 1, '2024-02-14 03:30:10', '2024-02-14 03:30:10'),
(357, 'roemva73@gmail.com', 1, '2024-02-14 03:53:11', '2024-02-14 03:53:11'),
(358, 'racomnet@yahoo.com', 1, '2024-02-14 04:11:08', '2024-02-14 04:11:08'),
(359, 'cjwhitman36@yahoo.com', 1, '2024-02-14 04:38:50', '2024-02-14 04:38:50'),
(360, 'manuel97.godoy@gmail.com', 1, '2024-02-14 04:58:41', '2024-02-14 04:58:41'),
(361, 'gmo99@aol.com', 1, '2024-02-14 05:18:35', '2024-02-14 05:18:35'),
(362, 'isaacgvillalobos@icloud.com', 1, '2024-02-14 05:28:37', '2024-02-14 05:28:37'),
(363, 'vmesserly@hotmail.com', 1, '2024-02-14 05:38:29', '2024-02-14 05:38:29'),
(364, 'carlosrid75@gmail.com', 1, '2024-02-14 05:49:16', '2024-02-14 05:49:16'),
(365, 'longislandweightlifting@gmail.com', 1, '2024-02-14 05:58:03', '2024-02-14 05:58:03'),
(366, 'lisa.rockefeller@gmail.com', 1, '2024-02-14 06:06:56', '2024-02-14 06:06:56'),
(367, 'ben@shelston.com', 1, '2024-02-14 06:16:02', '2024-02-14 06:16:02'),
(368, 'glendahowze@bresnan.net', 1, '2024-02-14 06:27:07', '2024-02-14 06:27:07'),
(369, 'lilib910@gmail.com', 1, '2024-02-14 06:38:02', '2024-02-14 06:38:02'),
(370, 'ng.online@web.de', 1, '2024-02-14 06:49:03', '2024-02-14 06:49:03'),
(371, 'lisanne_coleman@yahoo.com', 1, '2024-02-14 07:00:23', '2024-02-14 07:00:23'),
(372, 'letycruz23@yahoo.com', 1, '2024-02-14 07:17:43', '2024-02-14 07:17:43'),
(373, 'shel.mintz@utoronto.ca', 1, '2024-02-14 07:35:29', '2024-02-14 07:35:29'),
(374, 'amy.galicia@att.net', 1, '2024-02-14 08:22:52', '2024-02-14 08:22:52'),
(375, 'cstack316@gmail.com', 1, '2024-02-14 09:23:10', '2024-02-14 09:23:10'),
(376, 'lauren.marcley@aol.com', 1, '2024-02-14 09:47:33', '2024-02-14 09:47:33'),
(377, 'bgriswold157@gmail.com', 1, '2024-02-14 10:14:45', '2024-02-14 10:14:45'),
(378, 'phanlon@kdsi.net', 1, '2024-02-14 10:52:19', '2024-02-14 10:52:19'),
(379, 'heidi@centex.net', 1, '2024-02-14 11:26:49', '2024-02-14 11:26:49'),
(380, '19097573565@vtext.com', 1, '2024-02-14 12:04:33', '2024-02-14 12:04:33'),
(381, 'Joe.schoenbeck@gmail.com', 1, '2024-02-14 13:36:54', '2024-02-14 13:36:54'),
(382, 'irishtiger47@icloud.com', 1, '2024-02-14 15:30:34', '2024-02-14 15:30:34'),
(383, 'GEOFFSTRIDSBERG@YAHOO.COM', 1, '2024-02-14 16:39:44', '2024-02-14 16:39:44'),
(384, 'nfcbp35@iquest.net', 1, '2024-02-14 17:08:22', '2024-02-14 17:08:22'),
(385, 'stephanie@nvccf.org', 1, '2024-02-14 17:33:32', '2024-02-14 17:33:32'),
(386, 'lini0101@yahoo.com.sg', 1, '2024-02-14 17:56:46', '2024-02-14 17:56:46'),
(387, 'giuseppie19@gmail.com', 1, '2024-02-14 18:45:32', '2024-02-14 18:45:32'),
(388, '19046136495@txt.att.net', 1, '2024-02-14 19:07:37', '2024-02-14 19:07:37'),
(389, 'lee_jones@next.co.uk', 1, '2024-02-14 20:28:11', '2024-02-14 20:28:11'),
(390, 'woodsong2@charter.net', 1, '2024-02-14 20:43:17', '2024-02-14 20:43:17'),
(391, 'Mtnbiker2377@yahoo.com', 1, '2024-02-14 20:57:26', '2024-02-14 20:57:26'),
(392, 'pbayrachny@ica.net', 1, '2024-02-14 21:12:20', '2024-02-14 21:12:20'),
(393, 'matthew.kahn@gmail.com', 1, '2024-02-14 21:24:42', '2024-02-14 21:24:42'),
(394, 'ambarkaro31360@gmail.com', 1, '2024-02-14 21:37:51', '2024-02-14 21:37:51'),
(395, 'jm2218@comcast.net', 1, '2024-02-14 22:05:49', '2024-02-14 22:05:49'),
(396, 'enewman@northmontschools.com', 1, '2024-02-14 22:30:02', '2024-02-14 22:30:02'),
(397, 'donald.caley@gmail.com', 1, '2024-02-14 22:39:12', '2024-02-14 22:39:12'),
(398, 'HENRYKFRIESEN@GMAIL.COM', 1, '2024-02-14 22:49:20', '2024-02-14 22:49:20'),
(399, 'myth040786@gmail.com', 1, '2024-02-14 23:07:21', '2024-02-14 23:07:21'),
(400, 'joseyal369@gmail.com', 1, '2024-02-14 23:28:28', '2024-02-14 23:28:28'),
(401, 'gerri.nobile@comcast.net', 1, '2024-02-14 23:41:39', '2024-02-14 23:41:39'),
(402, 'whitney.t.paul@gmail.com', 1, '2024-02-14 23:54:21', '2024-02-14 23:54:21'),
(403, 'tbonitati@gmail.com', 1, '2024-02-15 00:06:26', '2024-02-15 00:06:26'),
(404, 'kerrymartyr@gmail.com', 1, '2024-02-15 00:19:00', '2024-02-15 00:19:00'),
(405, 'denisevcornell@gmail.com', 1, '2024-02-15 00:30:06', '2024-02-15 00:30:06'),
(406, 'maslocoruso365@gmail.com', 1, '2024-02-15 00:51:33', '2024-02-15 00:51:33'),
(407, 'floyd.conrad@sap.com', 1, '2024-02-15 01:02:55', '2024-02-15 01:02:55'),
(408, 'widline199@gmail.com', 1, '2024-02-15 01:14:05', '2024-02-15 01:14:05'),
(409, 'SCOUTMASTER1012@YAHOO.COM', 1, '2024-02-15 01:23:17', '2024-02-15 01:23:17'),
(410, 'ericamcgil@aol.com', 1, '2024-02-15 01:43:09', '2024-02-15 01:43:09'),
(411, 'mikehuh@aol.com', 1, '2024-02-15 01:53:08', '2024-02-15 01:53:08'),
(412, 'romiflaca@hotmail.com', 1, '2024-02-15 02:16:47', '2024-02-15 02:16:47'),
(413, 'jaseacuna@gmail.com', 1, '2024-02-15 02:44:58', '2024-02-15 02:44:58'),
(414, 'rbrutvan85@yahoo.com', 1, '2024-02-15 03:12:23', '2024-02-15 03:12:23'),
(415, 'uNJKPC.bdjmjhb@chilgoza.buzz', 1, '2024-02-15 03:28:35', '2024-02-15 03:28:35'),
(416, 'rgarver@midwestlabs.com', 1, '2024-02-15 03:28:46', '2024-02-15 03:28:46'),
(417, 'iEJBBr.bdjmjpj@chilgoza.buzz', 1, '2024-02-15 03:28:50', '2024-02-15 03:28:50'),
(418, 'tyson.brice@maryland.gov', 1, '2024-02-15 03:51:40', '2024-02-15 03:51:40'),
(419, 'clemence@ahhcflorida.com', 1, '2024-02-15 03:51:50', '2024-02-15 03:51:50'),
(420, 'Wendlingk@hotmail.com', 1, '2024-02-15 04:03:37', '2024-02-15 04:03:37'),
(421, 'anjireddyfico@gmail.com', 1, '2024-02-15 04:23:56', '2024-02-15 04:23:56'),
(422, 'shellym@jjconstructioninc.com', 1, '2024-02-15 04:24:54', '2024-02-15 04:24:54'),
(423, 'jcarter@axiommarketinggroup.net', 1, '2024-02-15 04:25:15', '2024-02-15 04:25:15'),
(424, 'keith@epiclifechurch.org', 1, '2024-02-15 04:45:08', '2024-02-15 04:45:08'),
(425, 'joel@vistatvdenver.com', 1, '2024-02-15 05:09:13', '2024-02-15 05:09:13'),
(426, 'cschiller@powerhrg.com', 1, '2024-02-15 05:30:36', '2024-02-15 05:30:36'),
(427, 'hyqmet.mece@mass.gov', 1, '2024-02-15 05:45:25', '2024-02-15 05:45:25'),
(428, 'hsshoker@ymail.com', 1, '2024-02-15 05:51:36', '2024-02-15 05:51:36'),
(429, 'ykzide79@aol.com', 1, '2024-02-15 06:10:38', '2024-02-15 06:10:38'),
(430, 'FLAVIOGIANNINI0153@GMAIL.COM', 1, '2024-02-15 06:48:32', '2024-02-15 06:48:32'),
(431, 'rd758@verizon.net', 1, '2024-02-15 07:10:40', '2024-02-15 07:10:40'),
(432, 'b.c.zur@sasktel.net', 1, '2024-02-15 07:14:08', '2024-02-15 07:14:08'),
(433, 'kimgagnon79@gmail.com', 1, '2024-02-15 08:34:09', '2024-02-15 08:34:09'),
(434, 'nicoledherman@gmail.com', 1, '2024-02-15 08:46:18', '2024-02-15 08:46:18'),
(435, 'easternbuildingsolutions@gmail.com', 1, '2024-02-15 09:03:32', '2024-02-15 09:03:32'),
(436, 'kathryn.maiolo@gmail.com', 1, '2024-02-15 10:01:10', '2024-02-15 10:01:10'),
(437, 'jclark@pattersonharbor.com', 1, '2024-02-15 11:06:58', '2024-02-15 11:06:58'),
(438, 'rddesign@rdds.ca', 1, '2024-02-15 11:18:20', '2024-02-15 11:18:20'),
(439, '18709970090@vtext.com', 1, '2024-02-15 12:00:10', '2024-02-15 12:00:10'),
(440, 'rachelhiggins808@gmail.com', 1, '2024-02-15 12:44:51', '2024-02-15 12:44:51'),
(441, 'smoeller@grand-rapids.mi.us', 1, '2024-02-15 13:01:01', '2024-02-15 13:01:01'),
(442, 'kcherezov@gentell.com', 1, '2024-02-15 13:01:46', '2024-02-15 13:01:46'),
(443, 'hardcorps75_98@yahoo.com', 1, '2024-02-15 13:25:29', '2024-02-15 13:25:29'),
(444, 'tjackson9868@sbcglobal.net', 1, '2024-02-15 15:28:22', '2024-02-15 15:28:22'),
(445, 'mhdoucet@gmail.com', 1, '2024-02-15 17:44:19', '2024-02-15 17:44:19'),
(446, 'Victoriacarr2013@gmail.com', 1, '2024-02-15 18:40:59', '2024-02-15 18:40:59'),
(447, 'larry.carley@hmshost.com', 1, '2024-02-15 19:23:23', '2024-02-15 19:23:23'),
(448, 'sarahvystrcil@hotmail.com', 1, '2024-02-15 19:47:46', '2024-02-15 19:47:46'),
(449, 'finance@fly-sxmairways.com', 1, '2024-02-15 20:06:03', '2024-02-15 20:06:03'),
(450, 'edwards_e1024@yahoo.com', 1, '2024-02-15 20:22:06', '2024-02-15 20:22:06'),
(451, 'slattina@yahoo.com', 1, '2024-02-15 20:37:07', '2024-02-15 20:37:07'),
(452, 'kcoady@washburndoughty.com', 1, '2024-02-15 20:52:11', '2024-02-15 20:52:11'),
(453, 'scottrichter979@yahoo.com', 1, '2024-02-15 21:08:04', '2024-02-15 21:08:04'),
(454, '190922@gmail.com', 1, '2024-02-15 21:24:13', '2024-02-15 21:24:13'),
(455, '19043250511@vtext.com', 1, '2024-02-15 22:10:48', '2024-02-15 22:10:48'),
(456, '12817876575@txt.att.net', 1, '2024-02-15 22:26:37', '2024-02-15 22:26:37'),
(457, 'rmlovd@aol.com', 1, '2024-02-15 22:44:04', '2024-02-15 22:44:04'),
(458, 'mgspencer59@gmail.com', 1, '2024-02-15 22:44:12', '2024-02-15 22:44:12'),
(459, 'sharfudeen@citydesignbuild.co.uk', 1, '2024-02-15 22:51:49', '2024-02-15 22:51:49'),
(460, 'aoveson@yahoo.com', 1, '2024-02-15 23:03:56', '2024-02-15 23:03:56'),
(461, 'debbieconnolly.contact@gmail.com', 1, '2024-02-15 23:16:50', '2024-02-15 23:16:50'),
(462, 'erik@andersen-construction.com', 1, '2024-02-15 23:20:03', '2024-02-15 23:20:03'),
(463, 'nickrespicio@gmail.com', 1, '2024-02-15 23:20:25', '2024-02-15 23:20:25'),
(464, 'Nzagorov@eco-chek.com', 1, '2024-02-15 23:49:53', '2024-02-15 23:49:53'),
(465, 'salvadorij_gravleyva@outlook.com', 1, '2024-02-16 00:04:39', '2024-02-16 00:04:39'),
(466, 'amixon@tamu.edu', 1, '2024-02-16 00:06:16', '2024-02-16 00:06:16'),
(467, 'krschwarz36@gmail.com', 1, '2024-02-16 00:32:17', '2024-02-16 00:32:17'),
(468, 'charlottewoodwiseman@yahoo.com', 1, '2024-02-16 00:43:11', '2024-02-16 00:43:11'),
(469, 'baymalayali@gmail.com', 1, '2024-02-16 00:44:10', '2024-02-16 00:44:10'),
(470, 'georgetorresiii@gmail.com', 1, '2024-02-16 00:45:57', '2024-02-16 00:45:57'),
(471, 'chan_chan1477@hotmail.com', 1, '2024-02-16 00:55:15', '2024-02-16 00:55:15'),
(472, 'sherrimacdermid@gmail.com', 1, '2024-02-16 01:07:17', '2024-02-16 01:07:17'),
(473, 'RWEHVNFUNYT@YAHOO.COM', 1, '2024-02-16 01:37:23', '2024-02-16 01:37:23'),
(474, 'cuteyiyun@hotmail.com', 1, '2024-02-16 01:56:17', '2024-02-16 01:56:17'),
(475, 'vzconstruction@yahoo.com', 1, '2024-02-16 02:22:47', '2024-02-16 02:22:47'),
(476, 'puri.kapil@gmail.com', 1, '2024-02-16 02:25:36', '2024-02-16 02:25:36'),
(477, '18573222252@tmomail.net', 1, '2024-02-16 02:32:33', '2024-02-16 02:32:33'),
(478, 'twdoucet@gmail.com', 1, '2024-02-16 02:50:22', '2024-02-16 02:50:22'),
(479, 'mbrandonjoiner@gmail.com', 1, '2024-02-16 03:54:21', '2024-02-16 03:54:21'),
(480, 'fam.papke@t-online.de', 1, '2024-02-16 04:38:17', '2024-02-16 04:38:17'),
(481, 'mary.manderscheid@steelmanpartners.com', 1, '2024-02-16 05:13:30', '2024-02-16 05:13:30'),
(482, 'amy_woodham@yahoo.com', 1, '2024-02-16 08:02:52', '2024-02-16 08:02:52'),
(483, 'j.farrell@scaec.com', 1, '2024-02-16 08:05:47', '2024-02-16 08:05:47'),
(484, 'ashraf@fiveboromg.com', 1, '2024-02-16 09:07:15', '2024-02-16 09:07:15'),
(485, 'Saea8@sbcglobal.net', 1, '2024-02-16 10:13:32', '2024-02-16 10:13:32'),
(486, 'shalley@thearcnepa.org', 1, '2024-02-16 11:02:08', '2024-02-16 11:02:08'),
(487, 'katherinemjones2@gmail.com', 1, '2024-02-16 11:58:20', '2024-02-16 11:58:20'),
(488, 'galenmuse@gmail.com', 1, '2024-02-16 13:40:34', '2024-02-16 13:40:34'),
(489, 'kumi0206@hotmail.com', 1, '2024-02-16 14:11:57', '2024-02-16 14:11:57'),
(490, 'jgorga@icloud.com', 1, '2024-02-16 15:44:33', '2024-02-16 15:44:33'),
(491, 'raymoore@bell.net', 1, '2024-02-16 16:06:54', '2024-02-16 16:06:54'),
(492, 'pastorpetermorey@gmail.com', 1, '2024-02-16 17:41:00', '2024-02-16 17:41:00'),
(493, 'kentrina@booneritterinsurance.com', 1, '2024-02-16 17:45:55', '2024-02-16 17:45:55'),
(494, 'mor256lar@gmail.com', 1, '2024-02-16 18:20:21', '2024-02-16 18:20:21'),
(495, 'teresamann1991@gmail.com', 1, '2024-02-16 19:09:49', '2024-02-16 19:09:49'),
(496, 'scote899@gmail.com', 1, '2024-02-16 19:33:50', '2024-02-16 19:33:50'),
(497, 'cmontgomery@sprigelectric.com', 1, '2024-02-16 20:08:21', '2024-02-16 20:08:21'),
(498, 'peytonthompson5763@gmail.com', 1, '2024-02-16 20:52:38', '2024-02-16 20:52:38'),
(499, 'nkanagala@gmail.com', 1, '2024-02-16 21:05:20', '2024-02-16 21:05:20'),
(500, 'Amanda.cowan4038@gmail.com', 1, '2024-02-16 21:18:43', '2024-02-16 21:18:43'),
(501, 'linden.whoo@gmail.com', 1, '2024-02-16 21:31:44', '2024-02-16 21:31:44'),
(502, 'alannamotherwell@gmail.com', 1, '2024-02-16 22:43:15', '2024-02-16 22:43:15'),
(503, 'ethanthompson1991@gmail.com', 1, '2024-02-16 23:00:46', '2024-02-16 23:00:46'),
(504, 'martinwhjr@me.com', 1, '2024-02-16 23:14:54', '2024-02-16 23:14:54'),
(505, 'jason@williams-properties.com', 1, '2024-02-16 23:20:25', '2024-02-16 23:20:25'),
(506, 'starramillo@gmail.com', 1, '2024-02-16 23:29:30', '2024-02-16 23:29:30'),
(507, 'lewisdejoseph@gmail.com', 1, '2024-02-16 23:59:07', '2024-02-16 23:59:07'),
(508, 'daisie_reyes@hotmail.com', 1, '2024-02-17 00:14:10', '2024-02-17 00:14:10'),
(509, 'carolyn@samnichols.com', 1, '2024-02-17 00:31:42', '2024-02-17 00:31:42'),
(510, 'tundesebestyen13@gmail.com', 1, '2024-02-17 00:41:52', '2024-02-17 00:41:52'),
(511, 'aatiqa786@hotmail.com', 1, '2024-02-17 01:15:03', '2024-02-17 01:15:03'),
(512, 'MrRAHenderson@outlook.com', 1, '2024-02-17 01:38:19', '2024-02-17 01:38:19'),
(513, 'ewei@pivotalsys.com', 1, '2024-02-17 02:18:07', '2024-02-17 02:18:07'),
(514, 'BSOMUAH@AOL.COM', 1, '2024-02-17 02:32:27', '2024-02-17 02:32:27'),
(515, 'lauraminotti@hotmail.com', 1, '2024-02-17 02:42:22', '2024-02-17 02:42:22'),
(516, 'alexandra.lefter@gmail.com', 1, '2024-02-17 03:12:34', '2024-02-17 03:12:34'),
(517, 'JINDAMOUA@GMAIL.COM', 1, '2024-02-17 03:23:59', '2024-02-17 03:23:59'),
(518, 'RYLES831@HOTMAIL.COM', 1, '2024-02-17 03:38:34', '2024-02-17 03:38:34'),
(519, 'Erin.mellema@gmail.com', 1, '2024-02-17 03:55:54', '2024-02-17 03:55:54'),
(520, 'ethanhogg4416@icloud.com', 1, '2024-02-17 04:14:00', '2024-02-17 04:14:00'),
(521, 'meghanspiess@gmail.com', 1, '2024-02-17 04:47:06', '2024-02-17 04:47:06'),
(522, 'rlsmithphd@gmail.com', 1, '2024-02-17 05:00:48', '2024-02-17 05:00:48'),
(523, 'floorya2@hotmail.com', 1, '2024-02-17 05:37:26', '2024-02-17 05:37:26'),
(524, 'dcmaughan@gmail.com', 1, '2024-02-17 05:54:34', '2024-02-17 05:54:34'),
(525, 'nicolelebersole@hotmail.com', 1, '2024-02-17 06:12:16', '2024-02-17 06:12:16'),
(526, 'delvin.stewart@yahoo.com', 1, '2024-02-17 06:34:12', '2024-02-17 06:34:12'),
(527, 'mattmitch14@yahoo.com', 1, '2024-02-17 07:27:00', '2024-02-17 07:27:00'),
(528, 'ceylon.cinnamon@yahoo.com', 1, '2024-02-17 07:27:32', '2024-02-17 07:27:32'),
(529, 'raymooretherealtor@gmail.com', 1, '2024-02-17 07:53:52', '2024-02-17 07:53:52'),
(530, 'anthonygrazian@gmail.com', 1, '2024-02-17 08:21:40', '2024-02-17 08:21:40'),
(531, 'mafahir.fairoze@gmail.com', 1, '2024-02-17 08:52:40', '2024-02-17 08:52:40'),
(532, 'josephsagat@gmail.com', 1, '2024-02-17 08:53:09', '2024-02-17 08:53:09'),
(533, 'roycrago@gmail.com', 1, '2024-02-17 08:57:31', '2024-02-17 08:57:31'),
(534, 'goldnhan@icloud.com', 1, '2024-02-17 09:34:15', '2024-02-17 09:34:15'),
(535, 'montour@gmail.com', 1, '2024-02-17 10:55:18', '2024-02-17 10:55:18'),
(536, 'STONE2122@GMAIL.COM', 1, '2024-02-17 11:21:49', '2024-02-17 11:21:49'),
(537, 'amandansterling@gmail.com', 1, '2024-02-17 11:45:52', '2024-02-17 11:45:52'),
(538, 'muratborlu@erciyes.edu.tr', 1, '2024-02-17 12:20:03', '2024-02-17 12:20:03'),
(539, 'TUCKERNB@GMAIL.COM', 1, '2024-02-17 13:15:27', '2024-02-17 13:15:27'),
(540, 'jaime4883@gmail.com', 1, '2024-02-17 13:34:46', '2024-02-17 13:34:46'),
(541, 'CNICHOLS1999@YAHOO.COM', 1, '2024-02-17 14:55:46', '2024-02-17 14:55:46'),
(542, 'tbeynon@crbhs.org', 1, '2024-02-17 15:30:15', '2024-02-17 15:30:15'),
(543, 'suely_mendanha@hotmail.com', 1, '2024-02-17 16:50:13', '2024-02-17 16:50:13'),
(544, 'juliannamascia@gmail.com', 1, '2024-02-17 18:16:19', '2024-02-17 18:16:19'),
(545, 'mustapha.rabbaj@gmail.com', 1, '2024-02-17 18:31:57', '2024-02-17 18:31:57'),
(546, 'babynsweet@hotmail.com', 1, '2024-02-17 18:32:57', '2024-02-17 18:32:57'),
(547, 'mcarthurmediation@gmail.com', 1, '2024-02-17 18:39:29', '2024-02-17 18:39:29'),
(548, 'stepitup52@yahoo.com', 1, '2024-02-17 19:01:49', '2024-02-17 19:01:49'),
(549, 'caleb.barnes11@yahoo.com', 1, '2024-02-17 19:56:15', '2024-02-17 19:56:15'),
(550, 'bashar0daboul@gmail.com', 1, '2024-02-17 20:20:27', '2024-02-17 20:20:27'),
(551, 'ahuddleston1@yahoo.com', 1, '2024-02-17 20:21:15', '2024-02-17 20:21:15'),
(552, 'lejump@comcast.net', 1, '2024-02-17 21:41:29', '2024-02-17 21:41:29'),
(553, 'adam@danielgroup.com', 1, '2024-02-17 21:57:48', '2024-02-17 21:57:48'),
(554, '16785499777@vtext.com', 1, '2024-02-17 22:26:52', '2024-02-17 22:26:52'),
(555, 'renbon@hotmail.com', 1, '2024-02-17 22:54:38', '2024-02-17 22:54:38'),
(556, 'rollman43@comcast.net', 1, '2024-02-17 23:10:28', '2024-02-17 23:10:28'),
(557, 'newladonna@yandex.com', 1, '2024-02-17 23:28:44', '2024-02-17 23:28:44'),
(558, 'jjgrib@aol.com', 1, '2024-02-17 23:47:52', '2024-02-17 23:47:52'),
(559, 'donangelie@gmail.com', 1, '2024-02-18 00:22:14', '2024-02-18 00:22:14'),
(560, 'flatbrokenow@comcast.net', 1, '2024-02-18 00:47:18', '2024-02-18 00:47:18'),
(561, 'taaaajohnson@aol.com', 1, '2024-02-18 01:12:51', '2024-02-18 01:12:51'),
(562, 'jon.elmer23@gmail.com', 1, '2024-02-18 01:41:14', '2024-02-18 01:41:14'),
(563, 'vangioni@iap.fr', 1, '2024-02-18 02:14:24', '2024-02-18 02:14:24'),
(564, 'denniswood.m@gmail.com', 1, '2024-02-18 02:46:06', '2024-02-18 02:46:06'),
(565, 'hallielafon@yahoo.com', 1, '2024-02-18 03:15:29', '2024-02-18 03:15:29'),
(566, 'ngokevin190@gmail.com', 1, '2024-02-18 03:17:24', '2024-02-18 03:17:24'),
(567, 'tshook06@gmail.com', 1, '2024-02-18 03:18:36', '2024-02-18 03:18:36'),
(568, 'dfleedy@gmail.com', 1, '2024-02-18 04:21:50', '2024-02-18 04:21:50'),
(569, 'lwilson1031@icloud.com', 1, '2024-02-18 04:39:04', '2024-02-18 04:39:04'),
(570, 'Naephillips@yahoo.com', 1, '2024-02-18 05:00:31', '2024-02-18 05:00:31'),
(571, 'dozen692107@hotmail.com', 1, '2024-02-18 06:32:31', '2024-02-18 06:32:31'),
(572, 'John.smith23362336@gmail.com', 1, '2024-02-18 07:21:09', '2024-02-18 07:21:09'),
(573, 'mishanya2017@list.ru', 1, '2024-02-18 07:46:59', '2024-02-18 07:46:59'),
(574, 'mahion002@gmail.com', 1, '2024-02-18 08:12:31', '2024-02-18 08:12:31'),
(575, 'michaeldufour1@gmail.com', 1, '2024-02-18 08:44:05', '2024-02-18 08:44:05'),
(576, 'lstackhouse@ibm.net', 1, '2024-02-18 09:16:36', '2024-02-18 09:16:36'),
(577, 'srcooperlaw@gmail.com', 1, '2024-02-18 09:46:50', '2024-02-18 09:46:50'),
(578, 'asia.wiley@wbd.com', 1, '2024-02-18 11:19:45', '2024-02-18 11:19:45'),
(579, 'kimklein4759@gmail.com', 1, '2024-02-18 14:24:47', '2024-02-18 14:24:47'),
(580, 'canilpedro01@gmail.com', 1, '2024-02-18 14:57:34', '2024-02-18 14:57:34'),
(581, 'Rogerb314@gmail.com', 1, '2024-02-18 15:30:40', '2024-02-18 15:30:40'),
(582, 'ebuka2010igwe@gmail.com', 1, '2024-02-18 16:16:46', '2024-02-18 16:16:46'),
(583, 'OLNEY_TIGGER@HOTMAIL.COM', 1, '2024-02-18 18:47:04', '2024-02-18 18:47:04'),
(584, 'oliviamango@gmail.com', 1, '2024-02-18 19:09:41', '2024-02-18 19:09:41'),
(585, 'dentalartsolution@gmail.com', 1, '2024-02-18 19:30:53', '2024-02-18 19:30:53'),
(586, 'jamie@strategicwebsites.com', 1, '2024-02-18 19:56:08', '2024-02-18 19:56:08'),
(587, 'rharris2488@gmail.com', 1, '2024-02-18 20:22:28', '2024-02-18 20:22:28'),
(588, 'macbichngoc80@yahoo.com', 1, '2024-02-18 20:41:46', '2024-02-18 20:41:46'),
(589, 'kgreene28@cox.net', 1, '2024-02-18 20:58:22', '2024-02-18 20:58:22'),
(590, 'evelynglantz92@gmail.com', 1, '2024-02-18 21:14:29', '2024-02-18 21:14:29'),
(591, 'thormic@bellsouth.net', 1, '2024-02-18 21:31:53', '2024-02-18 21:31:53'),
(592, 'blazesportsperformance@gmail.com', 1, '2024-02-18 22:07:10', '2024-02-18 22:07:10'),
(593, 'aayomi.s06@gmail.com', 1, '2024-02-18 22:25:14', '2024-02-18 22:25:14'),
(594, 'ashley.luna@trafficmanagement.com', 1, '2024-02-18 22:41:19', '2024-02-18 22:41:19'),
(595, 'phillipfrank1123@outlook.com', 1, '2024-02-18 22:59:25', '2024-02-18 22:59:25'),
(596, '15158901052@vtext.com', 1, '2024-02-18 23:17:14', '2024-02-18 23:17:14'),
(597, 'finch1120@gmail.com', 1, '2024-02-18 23:39:25', '2024-02-18 23:39:25'),
(598, 'adewusitoluwalase2005@gmail.com', 1, '2024-02-19 00:31:02', '2024-02-19 00:31:02'),
(599, 'DWSMITH9524@YAHOO.COM', 1, '2024-02-19 01:01:53', '2024-02-19 01:01:53'),
(600, 'adkinsstan@yahoo.com', 1, '2024-02-19 01:39:13', '2024-02-19 01:39:13'),
(601, 'rickdelgado39@yahoo.com', 1, '2024-02-19 02:30:54', '2024-02-19 02:30:54'),
(602, 'susanmanley.sm@gmail.com', 1, '2024-02-19 02:56:29', '2024-02-19 02:56:29'),
(603, 'marcia.hickey@rogers.com', 1, '2024-02-19 03:29:05', '2024-02-19 03:29:05'),
(604, '13862054759@vtext.com', 1, '2024-02-19 03:55:36', '2024-02-19 03:55:36'),
(605, 'james.diadamo@hotmail.com', 1, '2024-02-19 04:34:35', '2024-02-19 04:34:35'),
(606, '14842561595@tmomail.net', 1, '2024-02-19 04:55:00', '2024-02-19 04:55:00'),
(607, 'JCWSATURN1@GMAIL.COM', 1, '2024-02-19 05:18:22', '2024-02-19 05:18:22'),
(608, 'Pricejg@yahoo.com', 1, '2024-02-19 05:46:39', '2024-02-19 05:46:39'),
(609, '7579477799@txt.att.net', 1, '2024-02-19 06:42:34', '2024-02-19 06:42:34'),
(610, '7575328089@tmomail.net', 1, '2024-02-19 07:05:30', '2024-02-19 07:05:30'),
(611, 'shredderules@hotmail.com', 1, '2024-02-19 07:51:00', '2024-02-19 07:51:00'),
(612, 'ludor@freenet.de', 1, '2024-02-19 08:16:32', '2024-02-19 08:16:32'),
(613, 'staceys@goalbookapp.com', 1, '2024-02-19 10:21:36', '2024-02-19 10:21:36'),
(614, 'daniela_rached@hotmail.com', 1, '2024-02-19 11:03:34', '2024-02-19 11:03:34'),
(615, 'les2squared@gmail.com', 1, '2024-02-19 11:35:39', '2024-02-19 11:35:39'),
(616, '9785189969@vtext.com', 1, '2024-02-19 12:02:04', '2024-02-19 12:02:04'),
(617, 'meenamahida@yahoo.com', 1, '2024-02-19 13:01:15', '2024-02-19 13:01:15'),
(618, 'MATTHEW.Y.KANE@GMAIL.COM', 1, '2024-02-19 13:51:34', '2024-02-19 13:51:34'),
(619, 'CESSNADOG@AOL.COM', 1, '2024-02-19 14:11:59', '2024-02-19 14:11:59'),
(620, 'laura.mize@aol.com', 1, '2024-02-19 14:33:28', '2024-02-19 14:33:28'),
(621, 'firmassociates@outlook.com', 1, '2024-02-19 14:51:39', '2024-02-19 14:51:39'),
(622, 'srdelarama@gmail.com', 1, '2024-02-19 15:10:09', '2024-02-19 15:10:09'),
(623, 'WDIGGES@GMAIL.COM', 1, '2024-02-19 16:12:50', '2024-02-19 16:12:50'),
(624, 'tediz68@yahoo.it', 1, '2024-02-19 16:29:05', '2024-02-19 16:29:05'),
(625, 'DOOFYDOBIE@MAIL.COM', 1, '2024-02-19 16:42:59', '2024-02-19 16:42:59'),
(626, 'daveyawright1349@gmail.com', 1, '2024-02-19 16:56:33', '2024-02-19 16:56:33'),
(627, 'a_team@frontiernet.net', 1, '2024-02-19 17:10:11', '2024-02-19 17:10:11'),
(628, 'Bsiripanyo@gmail.com', 1, '2024-02-19 17:26:11', '2024-02-19 17:26:11'),
(629, 'akashpatel@sunplastics.co.bw', 1, '2024-02-19 17:45:06', '2024-02-19 17:45:06'),
(630, 'dcromartie@ec.rr.com', 1, '2024-02-19 18:04:13', '2024-02-19 18:04:13'),
(631, 'sofiarubio027@gmail.com', 1, '2024-02-19 18:23:20', '2024-02-19 18:23:20'),
(632, 'jsewick@yahoo.com', 1, '2024-02-19 18:55:27', '2024-02-19 18:55:27'),
(633, 'gerti1977@web.de', 1, '2024-02-19 19:08:29', '2024-02-19 19:08:29'),
(634, 'dhanushkumarpb@gmail.com', 1, '2024-02-19 19:36:30', '2024-02-19 19:36:30'),
(635, 'sheeplesslol@gmail.com', 1, '2024-02-19 19:49:49', '2024-02-19 19:49:49'),
(636, 'gibbs0206@gmail.com', 1, '2024-02-19 20:15:27', '2024-02-19 20:15:27'),
(637, 'wandasrich@outlook.com', 1, '2024-02-19 21:01:14', '2024-02-19 21:01:14'),
(638, 'gclarksmith@gmail.com', 1, '2024-02-19 21:12:31', '2024-02-19 21:12:31'),
(639, 'snguyem72@gmail.com', 1, '2024-02-19 21:38:08', '2024-02-19 21:38:08'),
(640, 'cbolton@expediagroup.com', 1, '2024-02-19 21:52:08', '2024-02-19 21:52:08'),
(641, 'jaredstav@gmail.com', 1, '2024-02-19 22:10:13', '2024-02-19 22:10:13'),
(642, 'brawn_arianna@yahoo.com', 1, '2024-02-19 22:27:20', '2024-02-19 22:27:20'),
(643, 'fagarci7@hotmail.com', 1, '2024-02-19 23:14:34', '2024-02-19 23:14:34'),
(644, 'RCROSBORN@AOL.COM', 1, '2024-02-19 23:46:54', '2024-02-19 23:46:54'),
(645, 'sharaiamwalker@gmail.com', 1, '2024-02-19 23:57:47', '2024-02-19 23:57:47'),
(646, 'jjh851015@gmail.com', 1, '2024-02-20 00:07:44', '2024-02-20 00:07:44'),
(647, 'patu@hvc.rr.com', 1, '2024-02-20 00:18:16', '2024-02-20 00:18:16'),
(648, 'Michael.malone631@gmail.com', 1, '2024-02-20 00:29:32', '2024-02-20 00:29:32'),
(649, 'mousy820@aol.com', 1, '2024-02-20 03:16:01', '2024-02-20 03:16:01'),
(650, 'denisjen.ds@googlemail.com', 1, '2024-02-20 03:32:00', '2024-02-20 03:32:00'),
(651, 'ORSONWAYMAN@GMAIL.COM', 1, '2024-02-20 03:49:29', '2024-02-20 03:49:29'),
(652, 'rhpierce@sonic.net', 1, '2024-02-20 04:08:14', '2024-02-20 04:08:14'),
(653, 'naruda26@gmail.com', 1, '2024-02-20 04:52:00', '2024-02-20 04:52:00');
INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(654, 'psckevin@hotmail.com', 1, '2024-02-20 05:12:12', '2024-02-20 05:12:12'),
(655, 'jwkcg@yahoo.com', 1, '2024-02-20 05:26:12', '2024-02-20 05:26:12'),
(656, 'wrighthelen792@gmail.com', 1, '2024-02-20 05:53:15', '2024-02-20 05:53:15'),
(657, 'skahnowitz@thecolonygroup.com', 1, '2024-02-20 06:08:52', '2024-02-20 06:08:52'),
(658, 'wright.helen792@gmail.com', 1, '2024-02-20 06:42:23', '2024-02-20 06:42:23'),
(659, 'stevenrodrig@msn.com', 1, '2024-02-20 07:01:08', '2024-02-20 07:01:08'),
(660, 'IBRAHIMASER253@GMAIL.COM', 1, '2024-02-20 07:20:19', '2024-02-20 07:20:19'),
(661, 'colin.j.maclean@gmail.com', 1, '2024-02-20 08:42:43', '2024-02-20 08:42:43'),
(662, 'dtmcdaniel@gmail.com', 1, '2024-02-20 08:56:42', '2024-02-20 08:56:42'),
(663, 'ndavis22@live.com', 1, '2024-02-20 09:11:42', '2024-02-20 09:11:42'),
(664, 'gordonklake@icloud.com', 1, '2024-02-20 09:25:42', '2024-02-20 09:25:42'),
(665, 'alexiscllr@gmail.com', 1, '2024-02-20 09:40:05', '2024-02-20 09:40:05'),
(666, 'JCJARA1970@AOL.COM', 1, '2024-02-20 10:12:29', '2024-02-20 10:12:29'),
(667, 'carol.clemons@gmail.com', 1, '2024-02-20 10:48:37', '2024-02-20 10:48:37'),
(668, 'SPIRITOFTYLER@HOTMAIL.COM', 1, '2024-02-20 11:18:57', '2024-02-20 11:18:57'),
(669, 'rbelljr2009@gmail.com', 1, '2024-02-20 11:47:19', '2024-02-20 11:47:19'),
(670, 'ROBERTWULUSKI@GMAIL.COM', 1, '2024-02-20 12:19:41', '2024-02-20 12:19:41'),
(671, '1DSCHELLER@COMCAST.NET', 1, '2024-02-20 12:54:29', '2024-02-20 12:54:29'),
(672, 'liltike333.ksl@gmail.com', 1, '2024-02-20 13:24:30', '2024-02-20 13:24:30'),
(673, 'vbona_vernon@yahoo.com', 1, '2024-02-20 13:48:46', '2024-02-20 13:48:46'),
(674, 'jimromeo@gmail.com', 1, '2024-02-20 14:14:59', '2024-02-20 14:14:59'),
(675, 'bburne@comcast.net', 1, '2024-02-20 15:01:25', '2024-02-20 15:01:25'),
(676, 'StaceyLGoodall@gmail.com', 1, '2024-02-20 15:15:23', '2024-02-20 15:15:23'),
(677, '17707149101@tmomail.net', 1, '2024-02-20 15:45:45', '2024-02-20 15:45:45'),
(678, 'srabak@bbc.net', 1, '2024-02-20 16:34:56', '2024-02-20 16:34:56'),
(679, 'gambhir.vivek@yahoo.ca', 1, '2024-02-20 16:50:36', '2024-02-20 16:50:36'),
(680, 'brase.jp@pg.com', 1, '2024-02-20 17:10:48', '2024-02-20 17:10:48'),
(681, 'shcinc1@centurylink.net', 1, '2024-02-20 17:53:07', '2024-02-20 17:53:07'),
(682, 'franciskrebs1@gmail.com', 1, '2024-02-20 18:14:17', '2024-02-20 18:14:17'),
(683, 'Iflaster@yahoo.com', 1, '2024-02-20 18:47:40', '2024-02-20 18:47:40'),
(684, 'KLopez@ortc.com', 1, '2024-02-20 19:03:24', '2024-02-20 19:03:24'),
(685, 'dalip@specificonerealty.com', 1, '2024-02-20 19:16:23', '2024-02-20 19:16:23'),
(686, 'hardylashawn1975@gmail.com', 1, '2024-02-20 19:28:38', '2024-02-20 19:28:38'),
(687, 'jim.schafer@msn.com', 1, '2024-02-20 19:53:17', '2024-02-20 19:53:17'),
(688, 'salazarwoods388vbn@gmail.com', 1, '2024-02-20 20:16:09', '2024-02-20 20:16:09'),
(689, 'jmegin@optonline.net', 1, '2024-02-20 20:27:17', '2024-02-20 20:27:17'),
(690, 'pawzza@yahoo.com', 1, '2024-02-20 20:38:18', '2024-02-20 20:38:18'),
(691, 'klisty@aol.com', 1, '2024-02-20 20:48:10', '2024-02-20 20:48:10'),
(692, 'simran@specificonerealty.com', 1, '2024-02-20 20:58:03', '2024-02-20 20:58:03'),
(693, 'Mjb9800@gmail.com', 1, '2024-02-20 21:07:59', '2024-02-20 21:07:59'),
(694, 'rkdishong81@gmail.com', 1, '2024-02-20 21:17:54', '2024-02-20 21:17:54'),
(695, 'aurelie.gotthardt@chloride.com', 1, '2024-02-20 21:37:38', '2024-02-20 21:37:38'),
(696, 'sue@theflyingfishstudio.com', 1, '2024-02-20 21:47:10', '2024-02-20 21:47:10'),
(697, 'themabel@comcast.net', 1, '2024-02-20 21:56:26', '2024-02-20 21:56:26'),
(698, '13kwp@gmx.de', 1, '2024-02-20 22:05:22', '2024-02-20 22:05:22'),
(699, 'jasonheiges73@iclould.com', 1, '2024-02-20 22:14:06', '2024-02-20 22:14:06'),
(700, 'delphine.delair@chloride.com', 1, '2024-02-20 22:23:01', '2024-02-20 22:23:01'),
(701, 'duraebak@gmail.com', 1, '2024-02-20 22:31:56', '2024-02-20 22:31:56'),
(702, '14254227721@vtext.com', 1, '2024-02-20 22:41:46', '2024-02-20 22:41:46'),
(703, 'gcgoodger.hill@gmail.com', 1, '2024-02-20 22:51:16', '2024-02-20 22:51:16'),
(704, 'theskinners4@bellsouth.net', 1, '2024-02-20 23:11:26', '2024-02-20 23:11:26'),
(705, 'john@g3tax.com', 1, '2024-02-20 23:20:56', '2024-02-20 23:20:56'),
(706, '18326382434@tmomail.net', 1, '2024-02-20 23:30:11', '2024-02-20 23:30:11'),
(707, 'Don6026@gmail.com', 1, '2024-02-20 23:39:37', '2024-02-20 23:39:37'),
(708, 'makuchmatthew@gmail.com', 1, '2024-02-20 23:49:32', '2024-02-20 23:49:32'),
(709, 'dawnpelino@cox.net', 1, '2024-02-20 23:59:23', '2024-02-20 23:59:23'),
(710, 'alligator72@yahoo.com', 1, '2024-02-21 00:19:38', '2024-02-21 00:19:38'),
(711, 'Pwhalen50@outlook.com', 1, '2024-02-21 00:30:09', '2024-02-21 00:30:09'),
(712, 'K.ISCH@HOTMAIL.COM', 1, '2024-02-21 00:41:04', '2024-02-21 00:41:04'),
(713, 'moore0527@sbcglobal.net', 1, '2024-02-21 01:02:53', '2024-02-21 01:02:53'),
(714, 'amagleby1013@gmail.com', 1, '2024-02-21 01:13:47', '2024-02-21 01:13:47'),
(715, 'laggie10@yahoo.com', 1, '2024-02-21 01:24:08', '2024-02-21 01:24:08'),
(716, 'downtownorlandogm@thenowmassage.com', 1, '2024-02-21 01:34:58', '2024-02-21 01:34:58'),
(717, 'lkerstin260@usd.com', 1, '2024-02-21 01:44:53', '2024-02-21 01:44:53'),
(718, '2074006659@txt.att.net', 1, '2024-02-21 01:54:27', '2024-02-21 01:54:27'),
(719, 'n.guest@rogers.com', 1, '2024-02-21 02:03:40', '2024-02-21 02:03:40'),
(720, 'jadelavoie@outlook.com', 1, '2024-02-21 02:13:14', '2024-02-21 02:13:14'),
(721, 'larisakapustin@yahoo.com', 1, '2024-02-21 02:23:05', '2024-02-21 02:23:05'),
(722, 'latinoc2@gmail.com', 1, '2024-02-21 02:32:57', '2024-02-21 02:32:57'),
(723, 'isabellelalumiere@gmail.com', 1, '2024-02-21 02:42:50', '2024-02-21 02:42:50'),
(724, 'Julie@oldcolonycabinetsinc.com', 1, '2024-02-21 02:52:44', '2024-02-21 02:52:44'),
(725, 'mify58@gmail.com', 1, '2024-02-21 03:14:32', '2024-02-21 03:14:32'),
(726, 'jirbypv@gmail.com', 1, '2024-02-21 03:25:52', '2024-02-21 03:25:52'),
(727, 'richter_5906@yahoo.com', 1, '2024-02-21 03:36:49', '2024-02-21 03:36:49'),
(728, 'contact.sarlabous@gmail.com', 1, '2024-02-21 03:48:21', '2024-02-21 03:48:21'),
(729, 'petersonsi@earthlink.net', 1, '2024-02-21 04:21:02', '2024-02-21 04:21:02'),
(730, 'volvofam5@gmail.com', 1, '2024-02-21 04:32:22', '2024-02-21 04:32:22'),
(731, 'marinaavanessians@GMAIL.COM', 1, '2024-02-21 04:44:18', '2024-02-21 04:44:18'),
(732, 'sandydawn0627@gmail.com', 1, '2024-02-21 05:09:48', '2024-02-21 05:09:48'),
(733, 'dustyritchie@icloud.com', 1, '2024-02-21 05:23:46', '2024-02-21 05:23:46'),
(734, 'daves1door@aol.com', 1, '2024-02-21 05:37:46', '2024-02-21 05:37:46'),
(735, 'drvett82@cox.net', 1, '2024-02-21 06:25:26', '2024-02-21 06:25:26'),
(736, 'PHAMDUCQUANG1010@GMAIL.COM', 1, '2024-02-21 06:50:09', '2024-02-21 06:50:09'),
(737, 'silentrain3233@gmail.com', 1, '2024-02-21 08:48:59', '2024-02-21 08:48:59'),
(738, 'echolili@hotmail.com', 1, '2024-02-21 09:16:16', '2024-02-21 09:16:16'),
(739, 'karencmendez32@gmail.com', 1, '2024-02-21 09:50:42', '2024-02-21 09:50:42'),
(740, '15165870836@tmomail.net', 1, '2024-02-21 10:22:05', '2024-02-21 10:22:05'),
(741, 'llye@aol.com', 1, '2024-02-21 10:57:31', '2024-02-21 10:57:31'),
(742, 'tuyoikaze@gmail.com', 1, '2024-02-21 11:32:56', '2024-02-21 11:32:56'),
(743, 'dfwtx@earthlink.net', 1, '2024-02-21 12:01:18', '2024-02-21 12:01:18'),
(744, 'colemannicole4@gmail.com', 1, '2024-02-21 12:22:50', '2024-02-21 12:22:50'),
(745, 'cosmoshar@yahoo.com', 1, '2024-02-21 12:55:33', '2024-02-21 12:55:33'),
(746, 'ron@ronandmarian1.com', 1, '2024-02-21 13:10:52', '2024-02-21 13:10:52'),
(747, 'csturner@gmail.com', 1, '2024-02-21 13:25:30', '2024-02-21 13:25:30'),
(748, 'ianrennick24@gmail.com', 1, '2024-02-21 14:09:55', '2024-02-21 14:09:55'),
(749, 'linoginay@gmail.com', 1, '2024-02-21 14:56:16', '2024-02-21 14:56:16'),
(750, 'cesardelarosa@hotmail.com', 1, '2024-02-21 15:22:32', '2024-02-21 15:22:32'),
(751, '16507842403@txt.att.net', 1, '2024-02-21 16:14:00', '2024-02-21 16:14:00'),
(752, 'ny356@aol.com', 1, '2024-02-21 17:32:45', '2024-02-21 17:32:45'),
(753, 'g_frazzier35@yahoo.com', 1, '2024-02-21 17:52:23', '2024-02-21 17:52:23'),
(754, 'missverayu@126.com', 1, '2024-02-21 18:11:30', '2024-02-21 18:11:30'),
(755, 'tyriqb3@gmail.com', 1, '2024-02-21 18:30:36', '2024-02-21 18:30:36'),
(756, 'ggbassetrescue@hotmail.com', 1, '2024-02-21 18:50:07', '2024-02-21 18:50:07'),
(757, 'UXSlJd.htcqbdd@synaxarion.asia', 1, '2024-02-21 19:01:04', '2024-02-21 19:01:04'),
(758, 'clbossi@gmail.com', 1, '2024-02-21 19:01:18', '2024-02-21 19:01:18'),
(759, 'OfBRJP.htcqchc@synaxarion.asia', 1, '2024-02-21 19:01:23', '2024-02-21 19:01:23'),
(760, 'tylerlaske12@gmail.com', 1, '2024-02-21 19:05:43', '2024-02-21 19:05:43'),
(761, 'lucie045@sympatico.ca', 1, '2024-02-21 19:33:41', '2024-02-21 19:33:41'),
(762, 'lorenzo.lazaro@gmail.com', 1, '2024-02-21 19:49:31', '2024-02-21 19:49:31'),
(763, 'jrhyne10@hotmail.com', 1, '2024-02-21 19:58:32', '2024-02-21 19:58:32'),
(764, 'xuhsmith2911@gmail.com', 1, '2024-02-21 20:20:51', '2024-02-21 20:20:51'),
(765, 'freddy.werth@arcor.decharly001', 1, '2024-02-21 20:32:12', '2024-02-21 20:32:12'),
(766, 'bhsab@aol.com', 1, '2024-02-21 20:44:10', '2024-02-21 20:44:10'),
(767, 'adamroo11@gmail.com', 1, '2024-02-21 20:56:09', '2024-02-21 20:56:09'),
(768, 'maggiemao1941@hotmail.com', 1, '2024-02-21 21:08:05', '2024-02-21 21:08:05'),
(769, 'edskalisky@gmail.com', 1, '2024-02-21 21:30:33', '2024-02-21 21:30:33'),
(770, 'chrisky_russ@yahoo.com.sg', 1, '2024-02-21 21:30:34', '2024-02-21 21:30:34'),
(771, 'darlene15@live.ca', 1, '2024-02-21 21:30:40', '2024-02-21 21:30:40'),
(772, 'purchasing@liquidtrucking.com', 1, '2024-02-21 21:51:39', '2024-02-21 21:51:39'),
(773, 'info@midwestelastomers.com', 1, '2024-02-21 22:02:08', '2024-02-21 22:02:08'),
(774, 'chunglk@nv.ccsd.net', 1, '2024-02-21 22:11:25', '2024-02-21 22:11:25'),
(775, 'nicolebog20@comcast.net', 1, '2024-02-21 22:21:16', '2024-02-21 22:21:16'),
(776, 'TEAMSJA@AOL.COM', 1, '2024-02-21 22:32:06', '2024-02-21 22:32:06'),
(777, 'slhubbard@eastlink.ca', 1, '2024-02-21 22:35:57', '2024-02-21 22:35:57'),
(778, '18646347975@txt.att.net', 1, '2024-02-21 22:51:52', '2024-02-21 22:51:52'),
(779, 'Dandkdunmore@charter.net', 1, '2024-02-21 23:00:43', '2024-02-21 23:00:43'),
(780, 'purrysnyder@hotmail.com', 1, '2024-02-21 23:10:13', '2024-02-21 23:10:13'),
(781, 'bailey.hendrix@xrgtechnologies.com', 1, '2024-02-21 23:18:18', '2024-02-21 23:18:18'),
(782, 'tablively@earthlink.net', 1, '2024-02-21 23:35:01', '2024-02-21 23:35:01'),
(783, 'aymen.elabed@gmail.com', 1, '2024-02-21 23:43:33', '2024-02-21 23:43:33'),
(784, 'purchasing@coastlinecabinetry.com', 1, '2024-02-21 23:48:08', '2024-02-21 23:48:08'),
(785, 'heartmomlu@gmail.com', 1, '2024-02-21 23:51:24', '2024-02-21 23:51:24'),
(786, 'RONMILCH@GMAIL.COM', 1, '2024-02-22 00:08:05', '2024-02-22 00:08:05'),
(787, 'info@amacbs.com', 1, '2024-02-22 00:17:06', '2024-02-22 00:17:06'),
(788, '9179417689@tmomail.net', 1, '2024-02-22 00:25:47', '2024-02-22 00:25:47'),
(789, 'solaresx@yahoo.com', 1, '2024-02-22 00:34:35', '2024-02-22 00:34:35'),
(790, 'saxswing@gmail.com', 1, '2024-02-22 00:42:43', '2024-02-22 00:42:43'),
(791, 'heemstra.emma@gmail.com', 1, '2024-02-22 01:01:08', '2024-02-22 01:01:08'),
(792, 'staff@olympicglassinc.com', 1, '2024-02-22 01:01:44', '2024-02-22 01:01:44'),
(793, 'wendywhowhat@hotmail.com', 1, '2024-02-22 01:10:12', '2024-02-22 01:10:12'),
(794, 'erica.kelly@gmail.com', 1, '2024-02-22 01:20:04', '2024-02-22 01:20:04'),
(795, 'Muneca75@hotmail.com', 1, '2024-02-22 01:29:59', '2024-02-22 01:29:59'),
(796, 'Teejaypops@gmail.com', 1, '2024-02-22 01:40:33', '2024-02-22 01:40:33'),
(797, 'brittaniskyelar@gmail.com', 1, '2024-02-22 02:16:38', '2024-02-22 02:16:38'),
(798, 'stevenxtaylor@gmail.com', 1, '2024-02-22 02:19:49', '2024-02-22 02:19:49'),
(799, 'lizlizliz805@gmail.com', 1, '2024-02-22 02:19:53', '2024-02-22 02:19:53'),
(800, 'dsteiner95@aol.com', 1, '2024-02-22 02:27:13', '2024-02-22 02:27:13'),
(801, '17172545780@vtext.com', 1, '2024-02-22 02:38:06', '2024-02-22 02:38:06'),
(802, 'JEWITTTIFFANIE@GMAIL.COM', 1, '2024-02-22 02:49:23', '2024-02-22 02:49:23'),
(803, 'anna.wolf@blackplanet.com', 1, '2024-02-22 03:00:57', '2024-02-22 03:00:57'),
(804, '14048212363@vtext.com', 1, '2024-02-22 03:12:09', '2024-02-22 03:12:09'),
(805, 'tom.t.yang@gmail.com', 1, '2024-02-22 03:16:08', '2024-02-22 03:16:08'),
(806, 'sarah.andersson@aol.com', 1, '2024-02-22 03:36:40', '2024-02-22 03:36:40'),
(807, 'dr_m.elsebey@yahoo.com', 1, '2024-02-22 04:01:54', '2024-02-22 04:01:54'),
(808, 'galaxyjetbill@hotmail.com', 1, '2024-02-22 04:14:31', '2024-02-22 04:14:31'),
(809, 'Nathan.alexander.griffin@gmail.com', 1, '2024-02-22 04:27:48', '2024-02-22 04:27:48'),
(810, '5143789202@pcs.rogers.com', 1, '2024-02-22 04:41:23', '2024-02-22 04:41:23'),
(811, 'clarkj@pattersonharbor.com', 1, '2024-02-22 04:46:12', '2024-02-22 04:46:12'),
(812, 'jan@kruppbrothersestates.com', 1, '2024-02-22 05:10:48', '2024-02-22 05:10:48'),
(813, 'ogreene81@hotmail.com', 1, '2024-02-22 05:29:10', '2024-02-22 05:29:10'),
(814, '5144652922@msg.telus.com', 1, '2024-02-22 05:35:35', '2024-02-22 05:35:35'),
(815, 'lukygreeneyz@hotmail.com', 1, '2024-02-22 05:47:04', '2024-02-22 05:47:04'),
(816, '2817819105@txt.att.net', 1, '2024-02-22 05:57:58', '2024-02-22 05:57:58'),
(817, 'joefredfrank@gmail.com', 1, '2024-02-22 06:08:52', '2024-02-22 06:08:52'),
(818, 'heffler.jordan@gmail.com', 1, '2024-02-22 06:19:48', '2024-02-22 06:19:48'),
(819, 'gaby.paulus@web.de', 1, '2024-02-22 06:31:42', '2024-02-22 06:31:42'),
(820, 'lightyear616@gmail.com', 1, '2024-02-22 07:00:07', '2024-02-22 07:00:07'),
(821, 'sammcr@roadrunner.com', 1, '2024-02-22 07:19:12', '2024-02-22 07:19:12'),
(822, 'pat@dpatersoncope.com', 1, '2024-02-22 07:33:46', '2024-02-22 07:33:46'),
(823, 'jddl76@aol.com', 1, '2024-02-22 07:37:04', '2024-02-22 07:37:04'),
(824, 'sundeep.karwasra@un.org', 1, '2024-02-22 08:01:37', '2024-02-22 08:01:37'),
(825, 'davidauer17@gmail.com', 1, '2024-02-22 08:30:46', '2024-02-22 08:30:46'),
(826, 'leandertd@gmail.com', 1, '2024-02-22 09:58:44', '2024-02-22 09:58:44'),
(827, '15035487201@vtext.com', 1, '2024-02-22 10:40:39', '2024-02-22 10:40:39'),
(828, 'jennifer@environmentamerica.org', 1, '2024-02-22 11:40:59', '2024-02-22 11:40:59'),
(829, 'kmascall3248@gmail.com', 1, '2024-02-22 12:03:29', '2024-02-22 12:03:29'),
(830, 'cadapult@gmail.com', 1, '2024-02-22 12:28:20', '2024-02-22 12:28:20'),
(831, 'jbeltis@yahoo.com', 1, '2024-02-22 12:56:58', '2024-02-22 12:56:58'),
(832, 'uhing.michaela@gmail.com', 1, '2024-02-22 13:19:06', '2024-02-22 13:19:06'),
(833, 'skaushik@sfr.fr', 1, '2024-02-22 13:41:16', '2024-02-22 13:41:16'),
(834, 'nadiyahserrano117@gmail.com', 1, '2024-02-22 14:18:46', '2024-02-22 14:18:46'),
(835, 'suchitiru@yahoo.com', 1, '2024-02-22 15:28:17', '2024-02-22 15:28:17'),
(836, 'dorothy.carrigan@hotmail.com', 1, '2024-02-22 15:38:57', '2024-02-22 15:38:57'),
(837, 'dillardtasha2015@gmail.com', 1, '2024-02-22 16:04:44', '2024-02-22 16:04:44'),
(838, '12532928198@tmomail.net', 1, '2024-02-22 16:41:34', '2024-02-22 16:41:34'),
(839, 'TCJEWITT1125@GMAIL.COM', 1, '2024-02-22 17:08:48', '2024-02-22 17:08:48'),
(840, 'weymouthb@wit.edu', 1, '2024-02-22 17:23:39', '2024-02-22 17:23:39'),
(841, 'marie_laten@hotmail.com', 1, '2024-02-22 17:33:43', '2024-02-22 17:33:43'),
(842, 'hanna.simpson14@yahoo.com', 1, '2024-02-22 17:57:53', '2024-02-22 17:57:53'),
(843, 'ragachandrika261@gmail.com', 1, '2024-02-22 19:04:41', '2024-02-22 19:04:41'),
(844, 'rachel.pierini@gmail.com', 1, '2024-02-22 19:25:15', '2024-02-22 19:25:15'),
(845, '17049743846@vtext.com', 1, '2024-02-22 19:33:40', '2024-02-22 19:33:40'),
(846, 'evrector@deloitte.com', 1, '2024-02-22 19:48:16', '2024-02-22 19:48:16'),
(847, 'ajpeters22@aol.com', 1, '2024-02-22 20:01:14', '2024-02-22 20:01:14'),
(848, 'nca.dispatch@trafficmanagement.com', 1, '2024-02-22 20:17:14', '2024-02-22 20:17:14'),
(849, 'murevig@hotmail.com', 1, '2024-02-22 20:21:52', '2024-02-22 20:21:52'),
(850, 'rzitsman@gmail.com', 1, '2024-02-22 20:22:00', '2024-02-22 20:22:00'),
(851, 'Thomasriley436@yahoo.com', 1, '2024-02-22 20:33:14', '2024-02-22 20:33:14'),
(852, 'robertabchagas@gmail.com', 1, '2024-02-22 20:44:31', '2024-02-22 20:44:31'),
(853, 'semalapin81@mail.ru', 1, '2024-02-22 20:55:21', '2024-02-22 20:55:21'),
(854, 'eyarham@gmail.com', 1, '2024-02-22 21:05:16', '2024-02-22 21:05:16'),
(855, '17042772847@txt.att.net', 1, '2024-02-22 21:15:50', '2024-02-22 21:15:50'),
(856, 'tm@birdand.be', 1, '2024-02-22 21:39:59', '2024-02-22 21:39:59'),
(857, 'rrven@protonmail.com', 1, '2024-02-22 21:49:29', '2024-02-22 21:49:29'),
(858, 'lams98@comcast.net', 1, '2024-02-22 21:49:33', '2024-02-22 21:49:33'),
(859, 'angelsantangelo101@gmail.com', 1, '2024-02-22 22:07:36', '2024-02-22 22:07:36'),
(860, 'shnilo@sbcglobal.net', 1, '2024-02-22 22:18:46', '2024-02-22 22:18:46'),
(861, 'adurkin24@hotmail.com', 1, '2024-02-22 22:24:39', '2024-02-22 22:24:39'),
(862, 'amo1115@hotmail.com', 1, '2024-02-22 22:24:42', '2024-02-22 22:24:42'),
(863, 'kevcoelho18@icloud.com', 1, '2024-02-22 22:29:40', '2024-02-22 22:29:40'),
(864, 'jdyerden@gmail.com', 1, '2024-02-22 22:40:36', '2024-02-22 22:40:36'),
(865, 'bmlogsdon@cfl.rr.com', 1, '2024-02-22 22:51:06', '2024-02-22 22:51:06'),
(866, 'maxmougan@gmail.com', 1, '2024-02-22 23:01:03', '2024-02-22 23:01:03'),
(867, 'breezylouisey@yahoo.com', 1, '2024-02-22 23:02:07', '2024-02-22 23:02:07'),
(868, 'momkunze@gmail.com', 1, '2024-02-22 23:02:07', '2024-02-22 23:02:07'),
(869, 'guyelectric1@gmail.com', 1, '2024-02-22 23:22:48', '2024-02-22 23:22:48'),
(870, 'awsomebroishere@gmail.com', 1, '2024-02-22 23:29:04', '2024-02-22 23:29:04'),
(871, 'sgrassel15@gmail.com', 1, '2024-02-22 23:29:08', '2024-02-22 23:29:08'),
(872, 'Aeandy7209@gmail.com', 1, '2024-02-22 23:34:42', '2024-02-22 23:34:42'),
(873, 'm.dascallos@yahoo.com', 1, '2024-02-22 23:48:05', '2024-02-22 23:48:05'),
(874, 'lingolfly@gmail.com', 1, '2024-02-22 23:51:31', '2024-02-22 23:51:31'),
(875, 'claymcgurk@gmail.com', 1, '2024-02-22 23:51:34', '2024-02-22 23:51:34'),
(876, 'Fsciame@sciame.com', 1, '2024-02-23 00:03:40', '2024-02-23 00:03:40'),
(877, 'jermaineholmes4545@icloud.com', 1, '2024-02-23 00:20:25', '2024-02-23 00:20:25'),
(878, 'aceetter@gmail.com', 1, '2024-02-23 00:34:39', '2024-02-23 00:34:39'),
(879, 'jensonkurien88@gmail.com', 1, '2024-02-23 00:52:11', '2024-02-23 00:52:11'),
(880, 'mayovinc@hotmail.com', 1, '2024-02-23 00:52:16', '2024-02-23 00:52:16'),
(881, 'juliej@iecustom.com', 1, '2024-02-23 01:21:39', '2024-02-23 01:21:39'),
(882, 'Nicolegodsgift17@gmail.com', 1, '2024-02-23 01:36:40', '2024-02-23 01:36:40'),
(883, 'ptmanion@gmail.com', 1, '2024-02-23 01:45:20', '2024-02-23 01:45:20'),
(884, 'judy_heisner@hotmail.com', 1, '2024-02-23 01:45:25', '2024-02-23 01:45:25'),
(885, 'michael.grondin@rbc.com', 1, '2024-02-23 01:52:00', '2024-02-23 01:52:00'),
(886, 'lzhj_lmm@hotmail.com', 1, '2024-02-23 02:07:40', '2024-02-23 02:07:40'),
(887, 'mohammadali15@hotmail.com', 1, '2024-02-23 02:15:50', '2024-02-23 02:15:50'),
(888, 'resa1313@aol.com', 1, '2024-02-23 02:23:04', '2024-02-23 02:23:04'),
(889, 'spjaggers@gmail.com', 1, '2024-02-23 02:54:41', '2024-02-23 02:54:41'),
(890, 'drdavidc@me.com', 1, '2024-02-23 03:30:48', '2024-02-23 03:30:48'),
(891, 'bigrobnd66@aim.com', 1, '2024-02-23 03:33:12', '2024-02-23 03:33:12'),
(892, 'randyroth1@gmail.com', 1, '2024-02-23 03:45:47', '2024-02-23 03:45:47'),
(893, 'exulboutique@gmail.com', 1, '2024-02-23 03:56:35', '2024-02-23 03:56:35'),
(894, 'Aparmen672@aol.com', 1, '2024-02-23 03:58:07', '2024-02-23 03:58:07'),
(895, '6507997237@txt.att.net', 1, '2024-02-23 04:10:01', '2024-02-23 04:10:01'),
(896, 'NICKBIX@COMCAST.NET', 1, '2024-02-23 04:21:33', '2024-02-23 04:21:33'),
(897, 'gabriellesingher@outlook.com', 1, '2024-02-23 04:33:24', '2024-02-23 04:33:24'),
(898, '14012616678@vtext.com', 1, '2024-02-23 04:45:45', '2024-02-23 04:45:45'),
(899, 'parthag76@gmail.com', 1, '2024-02-23 04:49:16', '2024-02-23 04:49:16'),
(900, 'djgorham99@gmail.com', 1, '2024-02-23 04:57:40', '2024-02-23 04:57:40'),
(901, 'JoshuaClark@gmail.com', 1, '2024-02-23 05:09:12', '2024-02-23 05:09:12'),
(902, '17174399956@txt.att.net', 1, '2024-02-23 05:35:09', '2024-02-23 05:35:09'),
(903, 'kjmahoney@mahoney-law.net', 1, '2024-02-23 06:33:22', '2024-02-23 06:33:22'),
(904, 'rondakillam@gmail.com', 1, '2024-02-23 06:52:50', '2024-02-23 06:52:50'),
(905, 'pcorley777@gmail.com', 1, '2024-02-23 07:26:17', '2024-02-23 07:26:17'),
(906, 'PAT5595@VERIZON.NET', 1, '2024-02-23 07:44:56', '2024-02-23 07:44:56'),
(907, 'cherryblossomling@gmail.com', 1, '2024-02-23 08:43:01', '2024-02-23 08:43:01'),
(908, 'jason.c.clarke@ehi.com', 1, '2024-02-23 09:38:03', '2024-02-23 09:38:03'),
(909, '18322747617@tmomail.net', 1, '2024-02-23 10:04:02', '2024-02-23 10:04:02'),
(910, 'navengler@mac.com', 1, '2024-02-23 10:35:03', '2024-02-23 10:35:03'),
(911, '15105868036@tmomail.net', 1, '2024-02-23 11:19:02', '2024-02-23 11:19:02'),
(912, 'katena92@yahoo.com', 1, '2024-02-23 12:17:06', '2024-02-23 12:17:06'),
(913, 'support@trafficmanagement.com', 1, '2024-02-23 12:47:18', '2024-02-23 12:47:18'),
(914, 'nicolediaz@msn.com', 1, '2024-02-23 13:15:50', '2024-02-23 13:15:50'),
(915, 'arturhachaturyan1@gmail.com', 1, '2024-02-23 13:19:46', '2024-02-23 13:19:46'),
(916, 'troygwin@motophotos.com', 1, '2024-02-23 13:43:07', '2024-02-23 13:43:07'),
(917, 'info@siegers-it.de', 1, '2024-02-23 14:15:16', '2024-02-23 14:15:16'),
(918, '19175306564@vtext.com', 1, '2024-02-23 15:24:07', '2024-02-23 15:24:07'),
(919, '19738734341@tmomail.net', 1, '2024-02-23 17:25:28', '2024-02-23 17:25:28'),
(920, 'rh.sarah@hotmail.com', 1, '2024-02-23 18:26:27', '2024-02-23 18:26:27'),
(921, 'ali.asfand@live.com', 1, '2024-02-23 18:46:32', '2024-02-23 18:46:32'),
(922, 'safiabarain@gmail.com', 1, '2024-02-23 19:03:43', '2024-02-23 19:03:43'),
(923, 'jdw14401@gmail.com', 1, '2024-02-23 19:04:20', '2024-02-23 19:04:20'),
(924, 'lansil63@gmail.com', 1, '2024-02-23 19:21:43', '2024-02-23 19:21:43'),
(925, 'ronaldtaloko2002@gmail.com', 1, '2024-02-23 19:53:45', '2024-02-23 19:53:45'),
(926, 'amanda.davis@me.com', 1, '2024-02-23 20:28:33', '2024-02-23 20:28:33'),
(927, 'gneisen1962@outlook.com', 1, '2024-02-23 20:48:00', '2024-02-23 20:48:00'),
(928, 'trevettecochran@gmail.com', 1, '2024-02-23 20:54:29', '2024-02-23 20:54:29'),
(929, 'sandyranier@gmail.com', 1, '2024-02-23 20:54:30', '2024-02-23 20:54:30'),
(930, 'kmonroe077@gmail.com', 1, '2024-02-23 21:02:40', '2024-02-23 21:02:40'),
(931, '16822486981@tmomail.net', 1, '2024-02-23 21:16:56', '2024-02-23 21:16:56'),
(932, 'mattg@utexas.edu', 1, '2024-02-23 21:29:57', '2024-02-23 21:29:57'),
(933, 'lblinson@gmail.com', 1, '2024-02-23 21:52:24', '2024-02-23 21:52:24'),
(934, 'Office@hausmeisterservicemeyer.de', 1, '2024-02-23 22:03:40', '2024-02-23 22:03:40'),
(935, 'contact@lksconstruction.com', 1, '2024-02-23 22:06:44', '2024-02-23 22:06:44'),
(936, '7135606421@txt.att.net', 1, '2024-02-23 22:28:11', '2024-02-23 22:28:11'),
(937, 'kbug3698@gmail.com', 1, '2024-02-23 22:42:29', '2024-02-23 22:42:29'),
(938, 'delos1114.sb@gmail.com', 1, '2024-02-23 22:53:18', '2024-02-23 22:53:18'),
(939, 'whiteweezy1@gmail.com', 1, '2024-02-23 22:57:08', '2024-02-23 22:57:08'),
(940, 'bfessler@nuscalepower.com', 1, '2024-02-23 23:12:29', '2024-02-23 23:12:29'),
(941, 'cristifotu73@aol.com', 1, '2024-02-23 23:26:26', '2024-02-23 23:26:26'),
(942, 'billtran28@yahoo.com', 1, '2024-02-23 23:31:06', '2024-02-23 23:31:06'),
(943, 'Nandii1@aol.com', 1, '2024-02-23 23:39:03', '2024-02-23 23:39:03'),
(944, 'mgalvez@elginbutler.com', 1, '2024-02-23 23:50:58', '2024-02-23 23:50:58'),
(945, 'giveallifneeded242@yahoo.com', 1, '2024-02-24 00:02:49', '2024-02-24 00:02:49'),
(946, '7132533741@vtext.com', 1, '2024-02-24 00:13:47', '2024-02-24 00:13:47'),
(947, 'foster_ross@yahoo.com', 1, '2024-02-24 00:25:38', '2024-02-24 00:25:38'),
(948, 'lwald@comcast.net', 1, '2024-02-24 00:50:34', '2024-02-24 00:50:34'),
(949, 'jaboticabas@aol.com', 1, '2024-02-24 01:03:07', '2024-02-24 01:03:07'),
(950, 'amandabaird260@gmail.com', 1, '2024-02-24 01:03:25', '2024-02-24 01:03:25'),
(951, 'sommerdenkin@yahoo.com', 1, '2024-02-24 01:16:26', '2024-02-24 01:16:26'),
(952, 'paulzark@gmail.com', 1, '2024-02-24 01:29:24', '2024-02-24 01:29:24'),
(953, 'chiefdanbooker@yahoo.com', 1, '2024-02-24 01:56:31', '2024-02-24 01:56:31'),
(954, 'a_nable@yahoo.com', 1, '2024-02-24 01:58:18', '2024-02-24 01:58:18'),
(955, 'mgtinohio@gmail.com', 1, '2024-02-24 02:11:40', '2024-02-24 02:11:40'),
(956, 'kristinb@kennethhiller.com', 1, '2024-02-24 02:24:38', '2024-02-24 02:24:38'),
(957, 'jddavis16370@gmail.com', 1, '2024-02-24 02:37:34', '2024-02-24 02:37:34'),
(958, 'rusty.ward@comcast.net', 1, '2024-02-24 03:02:03', '2024-02-24 03:02:03'),
(959, 'sahagunmaricela5@gmail.com', 1, '2024-02-24 03:14:22', '2024-02-24 03:14:22'),
(960, 'davidorlik@gmail.com', 1, '2024-02-24 03:26:54', '2024-02-24 03:26:54'),
(961, 'fsgdtsfdh@gmail.com', 1, '2024-02-24 03:54:48', '2024-02-24 03:54:48'),
(962, 'tylerm213@gmail.com', 1, '2024-02-24 04:08:49', '2024-02-24 04:08:49'),
(963, 'lauren.j.cupp@gmail.com', 1, '2024-02-24 04:24:14', '2024-02-24 04:24:14'),
(964, '8322471204@tmomail.net', 1, '2024-02-24 04:39:13', '2024-02-24 04:39:13'),
(965, 'frnkrpor@sympatico.ca', 1, '2024-02-24 04:53:46', '2024-02-24 04:53:46'),
(966, 'bcevatt@san.rr.com', 1, '2024-02-24 05:42:15', '2024-02-24 05:42:15'),
(967, 'deborahmbrown72@gmail.com', 1, '2024-02-24 06:25:07', '2024-02-24 06:25:07'),
(968, 'craig@redsidepartners.com', 1, '2024-02-24 07:04:18', '2024-02-24 07:04:18'),
(969, 'jvsvi@hotmail.com', 1, '2024-02-24 07:21:26', '2024-02-24 07:21:26'),
(970, 'dr.tamoor.2010@hotmail.com', 1, '2024-02-24 07:59:15', '2024-02-24 07:59:15'),
(971, 'kmplas22@gmail.com', 1, '2024-02-24 08:23:14', '2024-02-24 08:23:14'),
(972, 'debanjana01@yahoo.com', 1, '2024-02-24 08:46:59', '2024-02-24 08:46:59'),
(973, 'dsynstad@gmail.com', 1, '2024-02-24 09:09:35', '2024-02-24 09:09:35'),
(974, 'jwadas@crowncorr.com', 1, '2024-02-24 10:01:44', '2024-02-24 10:01:44'),
(975, 'rezabeittoei@hotmail.com', 1, '2024-02-24 10:24:53', '2024-02-24 10:24:53'),
(976, 'john_romano23@yahoo.com', 1, '2024-02-24 10:48:26', '2024-02-24 10:48:26'),
(977, 'akadjn@gmail.com', 1, '2024-02-24 11:11:37', '2024-02-24 11:11:37'),
(978, 'bevingo@gmail.com', 1, '2024-02-24 11:34:46', '2024-02-24 11:34:46'),
(979, 'nickbrewster616@gmail.com', 1, '2024-02-24 13:10:55', '2024-02-24 13:10:55'),
(980, 'tgalida@gmail.com', 1, '2024-02-24 14:42:14', '2024-02-24 14:42:14'),
(981, 'elattinville@gmail.com', 1, '2024-02-24 15:30:56', '2024-02-24 15:30:56'),
(982, 'bryansr21@gmail.com', 1, '2024-02-24 16:01:15', '2024-02-24 16:01:15'),
(983, '14147796347@txt.att.net', 1, '2024-02-24 16:30:14', '2024-02-24 16:30:14'),
(984, 'LARRY.YATES.1986@GMAIL.COM', 1, '2024-02-24 16:58:31', '2024-02-24 16:58:31'),
(985, 'alyssa.regan@yahoo.com', 1, '2024-02-24 17:17:54', '2024-02-24 17:17:54'),
(986, 'justin.newton@yahoo.com', 1, '2024-02-24 17:37:00', '2024-02-24 17:37:00'),
(987, 'avshah215@gmail.com', 1, '2024-02-24 17:54:04', '2024-02-24 17:54:04'),
(988, 'nikejunkie316@icloud.com', 1, '2024-02-24 18:15:12', '2024-02-24 18:15:12'),
(989, 'hyhildalee@hotmail.com', 1, '2024-02-24 19:44:09', '2024-02-24 19:44:09'),
(990, 'shaiane.abreu@gmail.com', 1, '2024-02-24 20:13:07', '2024-02-24 20:13:07'),
(991, 'wziga@yahoo.com', 1, '2024-02-24 20:40:44', '2024-02-24 20:40:44'),
(992, 'woocares@hotmail.com', 1, '2024-02-24 21:29:49', '2024-02-24 21:29:49'),
(993, 'suemommy@live.com', 1, '2024-02-24 22:16:31', '2024-02-24 22:16:31'),
(994, 'kacieburns20@gmail.com', 1, '2024-02-24 22:54:16', '2024-02-24 22:54:16'),
(995, 'swooshball3@gmail.com', 1, '2024-02-24 23:26:42', '2024-02-24 23:26:42'),
(996, 'sima_ray5@yahoo.com', 1, '2024-02-24 23:57:00', '2024-02-24 23:57:00'),
(997, 'talexander7796@yahoo.com', 1, '2024-02-25 00:04:51', '2024-02-25 00:04:51'),
(998, 'audreylane12084@yahoo.com', 1, '2024-02-25 00:27:01', '2024-02-25 00:27:01'),
(999, 'rosahdelgado05@yahoo.com', 1, '2024-02-25 00:48:49', '2024-02-25 00:48:49'),
(1000, 'rosta_z@hotmail.com', 1, '2024-02-25 00:52:49', '2024-02-25 00:52:49'),
(1001, 'info@tinapoe.com', 1, '2024-02-25 00:52:50', '2024-02-25 00:52:50'),
(1002, 'esme.castillo927@gmail.com', 1, '2024-02-25 01:10:20', '2024-02-25 01:10:20'),
(1003, 'marg890@gmail.com', 1, '2024-02-25 01:34:09', '2024-02-25 01:34:09'),
(1004, 'sofistoj@gmail.com', 1, '2024-02-25 02:04:47', '2024-02-25 02:04:47'),
(1005, 'dward42@triad.rt.com', 1, '2024-02-25 02:16:24', '2024-02-25 02:16:24'),
(1006, 'recordce@gmail.com', 1, '2024-02-25 02:34:25', '2024-02-25 02:34:25'),
(1007, 'camarena.armando@gmail.com', 1, '2024-02-25 02:52:56', '2024-02-25 02:52:56'),
(1008, 'keevere@icloud.com', 1, '2024-02-25 03:13:52', '2024-02-25 03:13:52'),
(1009, 'mrsdlara@icloud.com', 1, '2024-02-25 03:14:03', '2024-02-25 03:14:03'),
(1010, 'Kristinferengul@gmail.com', 1, '2024-02-25 03:35:13', '2024-02-25 03:35:13'),
(1011, 'jrthurgood@hotmail.com', 1, '2024-02-25 03:55:18', '2024-02-25 03:55:18'),
(1012, 'davidewilkowski@gmail.com', 1, '2024-02-25 04:19:08', '2024-02-25 04:19:08'),
(1013, 'amandah24@comcast.net', 1, '2024-02-25 04:48:47', '2024-02-25 04:48:47'),
(1014, 'wjgall@hotmail.com', 1, '2024-02-25 05:36:56', '2024-02-25 05:36:56'),
(1015, 'james04011@outlook.com', 1, '2024-02-25 05:37:04', '2024-02-25 05:37:04'),
(1016, 'bmkembree@gmail.com', 1, '2024-02-25 05:38:11', '2024-02-25 05:38:11'),
(1017, 'vassi64@t-online.de', 1, '2024-02-25 06:19:05', '2024-02-25 06:19:05'),
(1018, 'ginnygirl68@aol.com', 1, '2024-02-25 06:43:15', '2024-02-25 06:43:15'),
(1019, 'ahmadoayyoub@gmail.com', 1, '2024-02-25 07:11:33', '2024-02-25 07:11:33'),
(1020, 'jasonrjohnson23@yahoo.com', 1, '2024-02-25 07:50:50', '2024-02-25 07:50:50'),
(1021, 'oscarlugo69@att.net', 1, '2024-02-25 09:22:18', '2024-02-25 09:22:18'),
(1022, 'aarongrgurich@gmail.com', 1, '2024-02-25 10:01:24', '2024-02-25 10:01:24'),
(1023, 'peterthompson39@gmail.com', 1, '2024-02-25 10:01:29', '2024-02-25 10:01:29'),
(1024, 'miguelpeniche457@gmail.com', 1, '2024-02-25 10:25:19', '2024-02-25 10:25:19'),
(1025, 'abombino@maintenx.com', 1, '2024-02-25 11:26:16', '2024-02-25 11:26:16'),
(1026, 'abslater58@gmail.com', 1, '2024-02-25 11:59:41', '2024-02-25 11:59:41'),
(1027, 'lisamarino22@yahoo.com', 1, '2024-02-25 13:28:11', '2024-02-25 13:28:11'),
(1028, 'beaudaciousbods@yahoo.com', 1, '2024-02-25 13:52:20', '2024-02-25 13:52:20'),
(1029, 'aelserafy77@gmail.com', 1, '2024-02-25 17:47:21', '2024-02-25 17:47:21'),
(1030, 'sergio.batidas@gmail.com', 1, '2024-02-25 18:34:03', '2024-02-25 18:34:03'),
(1031, 'jlass1617@yahoo.com', 1, '2024-02-25 20:08:06', '2024-02-25 20:08:06'),
(1032, 'shiran_fatal@walla.com', 1, '2024-02-25 20:32:38', '2024-02-25 20:32:38'),
(1033, 'jeanm6009@hotmail.com', 1, '2024-02-25 20:52:23', '2024-02-25 20:52:23'),
(1034, '19173045969@vtext.com', 1, '2024-02-25 21:09:47', '2024-02-25 21:09:47'),
(1035, 'hankmcnally@live.com', 1, '2024-02-25 21:30:34', '2024-02-25 21:30:34'),
(1036, 'karlkani2012@gmx.de', 1, '2024-02-25 21:58:11', '2024-02-25 21:58:11'),
(1037, 'dan2676@yahoo.com', 1, '2024-02-25 22:23:24', '2024-02-25 22:23:24'),
(1038, 'joddie.mendez@aol.com', 1, '2024-02-25 22:45:13', '2024-02-25 22:45:13'),
(1039, 'info@todaynic.com', 1, '2024-02-25 23:04:37', '2024-02-25 23:04:37'),
(1040, 'vinheart@msn.com', 1, '2024-02-25 23:23:41', '2024-02-25 23:23:41'),
(1041, 'sanhaji.bdiri@gmail.com', 1, '2024-02-25 23:57:25', '2024-02-25 23:57:25'),
(1042, 'mountainair55@hotmail.com', 1, '2024-02-26 00:10:44', '2024-02-26 00:10:44'),
(1043, 'franz.hitzler@adac.de', 1, '2024-02-26 00:24:40', '2024-02-26 00:24:40'),
(1044, 'gunslingingwlf@msn.com', 1, '2024-02-26 00:40:23', '2024-02-26 00:40:23'),
(1045, 'cellisoncamp@gmail.com', 1, '2024-02-26 01:01:27', '2024-02-26 01:01:27'),
(1046, 'rachel.schloss@gmail.com', 1, '2024-02-26 01:22:59', '2024-02-26 01:22:59'),
(1047, 'Gaac@live.com', 1, '2024-02-26 02:34:32', '2024-02-26 02:34:32'),
(1048, 'jimmyc014@gmail.com', 1, '2024-02-26 02:59:45', '2024-02-26 02:59:45'),
(1049, 'kimsloan35@aol.com', 1, '2024-02-26 03:25:04', '2024-02-26 03:25:04'),
(1050, 'Tennysia78@gmail.com', 1, '2024-02-26 03:50:33', '2024-02-26 03:50:33'),
(1051, 'pking759@gmail.com', 1, '2024-02-26 04:47:18', '2024-02-26 04:47:18'),
(1052, 'kristen.roeter@gmail.com', 1, '2024-02-26 05:05:26', '2024-02-26 05:05:26'),
(1053, 'atuncel@aatmakina.com', 1, '2024-02-26 05:24:12', '2024-02-26 05:24:12'),
(1054, 'gribi.med@gmail.com', 1, '2024-02-26 05:39:56', '2024-02-26 05:39:56'),
(1055, 'leebennett2010@yahoo.com', 1, '2024-02-26 06:41:07', '2024-02-26 06:41:07'),
(1056, 'garyparker0069@yahoo.com', 1, '2024-02-26 07:04:27', '2024-02-26 07:04:27'),
(1057, 'jenniferschwartzkopfpayne@gmail.com', 1, '2024-02-26 07:32:33', '2024-02-26 07:32:33'),
(1058, '14233040286@txt.att.net', 1, '2024-02-26 08:03:26', '2024-02-26 08:03:26'),
(1059, '16263775223@vtext.com', 1, '2024-02-26 08:33:40', '2024-02-26 08:33:40'),
(1060, 'jbalenton@gmail.com', 1, '2024-02-26 09:04:22', '2024-02-26 09:04:22'),
(1061, 'papahoney@hawaiiantel.net', 1, '2024-02-26 09:33:50', '2024-02-26 09:33:50'),
(1062, 'rainey26@icloud.com', 1, '2024-02-26 10:02:54', '2024-02-26 10:02:54'),
(1063, 'valdez1213@gmail.com', 1, '2024-02-26 10:31:17', '2024-02-26 10:31:17'),
(1064, 'lgdphil@gmail.com', 1, '2024-02-26 11:15:22', '2024-02-26 11:15:22'),
(1065, 'marangellux@gmail.com', 1, '2024-02-26 12:07:19', '2024-02-26 12:07:19'),
(1066, '7164104663@txt.att.net', 1, '2024-02-26 12:59:16', '2024-02-26 12:59:16'),
(1067, 'eunicekohmz@yahoo.com.sg', 1, '2024-02-26 13:37:50', '2024-02-26 13:37:50'),
(1068, 'Silvio_ribeiro@live.com', 1, '2024-02-26 14:47:36', '2024-02-26 14:47:36'),
(1069, 'DTHOMA03@YAHOO.COM', 1, '2024-02-26 15:45:23', '2024-02-26 15:45:23'),
(1070, 'miltonmillones@hotmail.com', 1, '2024-02-26 16:19:57', '2024-02-26 16:19:57'),
(1071, 'ljcod@verizon.net', 1, '2024-02-26 17:01:56', '2024-02-26 17:01:56'),
(1072, 'sjv95@outlook.es', 1, '2024-02-26 18:12:45', '2024-02-26 18:12:45'),
(1073, 'LAYNELASHLEY@LIVE.COM', 1, '2024-02-26 18:46:17', '2024-02-26 18:46:17'),
(1074, 'jennlai1106@gmail.com', 1, '2024-02-26 19:05:45', '2024-02-26 19:05:45'),
(1075, '13179192049@vtext.com', 1, '2024-02-26 19:20:53', '2024-02-26 19:20:53'),
(1076, 'mauricelbrown@fuse.net', 1, '2024-02-26 19:34:36', '2024-02-26 19:34:36'),
(1077, 'jimpeter33@gmail.com', 1, '2024-02-26 19:46:38', '2024-02-26 19:46:38'),
(1078, 'vistaracolumbia26@gmail.com', 1, '2024-02-26 20:00:39', '2024-02-26 20:00:39'),
(1079, 'francis.c.erb@gmail.com', 1, '2024-02-26 20:13:05', '2024-02-26 20:13:05'),
(1080, 'atlasozyurt@gmail.com', 1, '2024-02-26 20:25:40', '2024-02-26 20:25:40'),
(1081, 'b.shows@gmail.com', 1, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(1082, '5755712522@tmomail.net', 1, '2024-02-26 20:49:42', '2024-02-26 20:49:42'),
(1083, '17042087773@txt.att.net', 1, '2024-02-26 21:02:12', '2024-02-26 21:02:12'),
(1084, '1heartsnhomes@gmail.com', 1, '2024-02-26 21:14:47', '2024-02-26 21:14:47'),
(1085, 'christian.carbonne@neuf.fr', 1, '2024-02-26 21:26:16', '2024-02-26 21:26:16'),
(1086, 'batangthonthon@yahoo.com', 1, '2024-02-26 21:48:46', '2024-02-26 21:48:46'),
(1087, 'alexis.reid@airxcs.com', 1, '2024-02-26 21:59:14', '2024-02-26 21:59:14'),
(1088, 'lisawynn689@yahoo.com', 1, '2024-02-26 22:10:49', '2024-02-26 22:10:49'),
(1089, 'dcherema999@gmail.com', 1, '2024-02-26 22:22:50', '2024-02-26 22:22:50'),
(1090, 'tobyc7779@gmail.com', 1, '2024-02-26 22:47:13', '2024-02-26 22:47:13'),
(1091, 'bradyh2012@yahoo.com', 1, '2024-02-26 22:55:48', '2024-02-26 22:55:48'),
(1092, '15626882731@txt.att.net', 1, '2024-02-26 23:01:59', '2024-02-26 23:01:59'),
(1093, 'BradyJHowell@yahoo.com', 1, '2024-02-26 23:08:32', '2024-02-26 23:08:32'),
(1094, 'annstage@comcast.net', 1, '2024-02-26 23:13:47', '2024-02-26 23:13:47'),
(1095, 'roselady@rosesofroyce.com', 1, '2024-02-26 23:19:31', '2024-02-26 23:19:31'),
(1096, 'nicie161@hotmail.com', 1, '2024-02-26 23:25:21', '2024-02-26 23:25:21'),
(1097, 'kattg29@gmail.com', 1, '2024-02-26 23:31:14', '2024-02-26 23:31:14'),
(1098, 'money4eagles@outlook.com', 1, '2024-02-26 23:37:02', '2024-02-26 23:37:02'),
(1099, 'dmwc0215fla@gmail.com', 1, '2024-02-26 23:42:44', '2024-02-26 23:42:44'),
(1100, 'usnschommer@aol.com', 1, '2024-02-26 23:48:35', '2024-02-26 23:48:35'),
(1101, 'deancase@me.com', 1, '2024-02-26 23:55:46', '2024-02-26 23:55:46'),
(1102, 'alain.chagnon@hotmail.com', 1, '2024-02-27 00:03:39', '2024-02-27 00:03:39'),
(1103, 'it@trafficmanagement.com', 1, '2024-02-27 00:12:16', '2024-02-27 00:12:16'),
(1104, 'Margaret.isberg@gmail.com', 1, '2024-02-27 00:20:28', '2024-02-27 00:20:28'),
(1105, 'ncooper@l3hg.com', 1, '2024-02-27 00:28:24', '2024-02-27 00:28:24'),
(1106, 'fredsoucy80@hotmail.com', 1, '2024-02-27 01:17:55', '2024-02-27 01:17:55'),
(1107, 'ianmduff@yahoo.com', 1, '2024-02-27 01:27:51', '2024-02-27 01:27:51'),
(1108, 'zxweboy@live.com', 1, '2024-02-27 01:37:28', '2024-02-27 01:37:28'),
(1109, 'clarence.ford@gmail.com', 1, '2024-02-27 01:46:21', '2024-02-27 01:46:21'),
(1110, 'cyrusauto78@gmail.com', 1, '2024-02-27 01:55:17', '2024-02-27 01:55:17'),
(1111, 'johnwill37@gmail.com', 1, '2024-02-27 02:04:40', '2024-02-27 02:04:40'),
(1112, 'liangliang0522@qq.com', 1, '2024-02-27 02:31:59', '2024-02-27 02:31:59'),
(1113, 'aurianabyrd9@gmail.com', 1, '2024-02-27 02:58:47', '2024-02-27 02:58:47'),
(1114, 'JMKRAMPITZ@GMAIL.COM', 1, '2024-02-27 03:07:07', '2024-02-27 03:07:07'),
(1115, 'sergiomarte1174@gmail.com', 1, '2024-02-27 03:16:00', '2024-02-27 03:16:00'),
(1116, 'mtish18@gmail.com', 1, '2024-02-27 03:24:57', '2024-02-27 03:24:57'),
(1117, 'charlescordle@gmail.com', 1, '2024-02-27 03:33:54', '2024-02-27 03:33:54'),
(1118, 'pete_irwin@hotmail.com', 1, '2024-02-27 03:43:24', '2024-02-27 03:43:24'),
(1119, '19168049119@vtext.com', 1, '2024-02-27 04:13:20', '2024-02-27 04:13:20'),
(1120, 'KATWOMANJ@YAHOO.COM', 1, '2024-02-27 04:23:37', '2024-02-27 04:23:37'),
(1121, 'johnvaldez2011@gmail.com', 1, '2024-02-27 04:34:11', '2024-02-27 04:34:11'),
(1122, 'RUNINGH2OS@GMAIL.COM', 1, '2024-02-27 04:44:33', '2024-02-27 04:44:33'),
(1123, 'RMF1988@GMAIL.COM', 1, '2024-02-27 05:10:39', '2024-02-27 05:10:39'),
(1124, 'smpedroz@gmail.com', 1, '2024-02-27 05:30:29', '2024-02-27 05:30:29'),
(1125, 'zmola2@yahoo.com', 1, '2024-02-27 05:41:06', '2024-02-27 05:41:06'),
(1126, 'rlarrymcgill@aol.com', 1, '2024-02-27 05:52:05', '2024-02-27 05:52:05'),
(1127, 'sleighfriedman@gmail.com', 1, '2024-02-27 06:02:07', '2024-02-27 06:02:07'),
(1128, 'cpyles08@yahoo.com', 1, '2024-02-27 06:15:25', '2024-02-27 06:15:25'),
(1129, 'jerryc2844@gmail.com', 1, '2024-02-27 06:33:35', '2024-02-27 06:33:35'),
(1130, 'BJOHNSON@JAKESCRANE.COM', 1, '2024-02-27 06:52:25', '2024-02-27 06:52:25'),
(1131, 'kim_degeer@hotmail.com', 1, '2024-02-27 07:08:34', '2024-02-27 07:08:34'),
(1132, 'BENJAMINGJOHNSON@GMAIL.COM', 1, '2024-02-27 07:40:40', '2024-02-27 07:40:40'),
(1133, 'g.desouza86@gmail.com', 1, '2024-02-27 07:58:33', '2024-02-27 07:58:33'),
(1134, 'zipsham@yahoo.com', 1, '2024-02-27 08:20:22', '2024-02-27 08:20:22'),
(1135, 'fred.oiseomaye@gmail.com', 1, '2024-02-27 09:00:07', '2024-02-27 09:00:07'),
(1136, 'caladan67@hotmail.com', 1, '2024-02-27 09:21:17', '2024-02-27 09:21:17'),
(1137, 'dgriswold@coastalgourmetct.com', 1, '2024-02-27 09:38:42', '2024-02-27 09:38:42'),
(1138, 'mindy62202@gmail.com', 1, '2024-02-27 09:56:46', '2024-02-27 09:56:46'),
(1139, 'jaun@atlantishealthmgmt.com', 1, '2024-02-27 10:14:41', '2024-02-27 10:14:41'),
(1140, 'tvsmartfarid27@gmail.com', 1, '2024-02-27 10:32:00', '2024-02-27 10:32:00'),
(1141, 'tinosangil@gmail.com', 1, '2024-02-27 10:50:04', '2024-02-27 10:50:04'),
(1142, 'littonpamela@gmail.com', 1, '2024-02-27 11:06:08', '2024-02-27 11:06:08'),
(1143, 'chrisa@cobblestonefruit.com', 1, '2024-02-27 11:21:09', '2024-02-27 11:21:09'),
(1144, 'pio.ebay@poczta.fm', 1, '2024-02-27 11:38:17', '2024-02-27 11:38:17'),
(1145, '183river@gmail.com', 1, '2024-02-27 11:58:18', '2024-02-27 11:58:18'),
(1146, 'patherton@cox.net', 1, '2024-02-27 12:47:58', '2024-02-27 12:47:58'),
(1147, 'ladybuggy4purple@yahoo.com', 1, '2024-02-27 13:36:21', '2024-02-27 13:36:21'),
(1148, 'andreilet@yahoo.com', 1, '2024-02-27 14:26:11', '2024-02-27 14:26:11'),
(1149, 'dan.hackett@baileycavalieri.com', 1, '2024-02-27 15:23:09', '2024-02-27 15:23:09'),
(1150, 'E.ANGLEMYER@YAHOO.COM', 1, '2024-02-27 15:47:25', '2024-02-27 15:47:25'),
(1151, 'molter33@msn.com', 1, '2024-02-27 16:07:48', '2024-02-27 16:07:48'),
(1152, 'nomathembamathema9@gmail.com', 1, '2024-02-27 16:28:56', '2024-02-27 16:28:56'),
(1153, 'Morrismoses@gmail.com', 1, '2024-02-27 16:47:06', '2024-02-27 16:47:06'),
(1154, '16147959865@tmomail.net', 1, '2024-02-27 17:19:16', '2024-02-27 17:19:16'),
(1155, 'brig106s@aol.com', 1, '2024-02-27 17:35:21', '2024-02-27 17:35:21'),
(1156, 'michelalibaker@gmail.com', 1, '2024-02-27 17:49:23', '2024-02-27 17:49:23'),
(1157, 'kamihaeri75@gmail.com', 1, '2024-02-27 18:02:14', '2024-02-27 18:02:14'),
(1158, 'limamichele@rocketmail.com', 1, '2024-02-27 18:14:21', '2024-02-27 18:14:21'),
(1159, 'wtky_59@yahoo.com.sg', 1, '2024-02-27 18:26:12', '2024-02-27 18:26:12'),
(1160, 'serene5089@gmail.com', 1, '2024-02-27 18:37:18', '2024-02-27 18:37:18'),
(1161, 'daniel.hackett@baileycavalieri.com', 1, '2024-02-27 18:49:04', '2024-02-27 18:49:04'),
(1162, 'stern.yeh@gmail.com', 1, '2024-02-27 19:13:13', '2024-02-27 19:13:13'),
(1163, 'leodoyle@britzvr.co.za', 1, '2024-02-27 19:24:55', '2024-02-27 19:24:55'),
(1164, 'oye.olatoye@carnegiemgmt.com', 1, '2024-02-27 19:35:56', '2024-02-27 19:35:56'),
(1165, '9162067028@vtext.com', 1, '2024-02-27 19:58:00', '2024-02-27 19:58:00'),
(1166, 'mmschroer@gmx.de', 1, '2024-02-27 20:24:00', '2024-02-27 20:24:00'),
(1167, 'JEZEKIELB@GMAIL.COM', 1, '2024-02-27 20:39:03', '2024-02-27 20:39:03'),
(1168, 'aelbaz3642@gmail.com', 1, '2024-02-27 20:53:59', '2024-02-27 20:53:59'),
(1169, 'berniedar@gmail.com', 1, '2024-02-27 21:24:58', '2024-02-27 21:24:58'),
(1170, 'billygas28@gmail.com', 1, '2024-02-27 21:44:39', '2024-02-27 21:44:39'),
(1171, 'Johnfb@bellsouth.net', 1, '2024-02-27 22:04:31', '2024-02-27 22:04:31'),
(1172, 'josh_taylor0531@hotmail.com', 1, '2024-02-27 22:14:40', '2024-02-27 22:14:40'),
(1173, 'jeff_scott@msn.com', 1, '2024-02-27 22:25:31', '2024-02-27 22:25:31'),
(1174, 'cchristine818@gmail.com', 1, '2024-02-27 22:36:20', '2024-02-27 22:36:20'),
(1175, 'steve.gurney@comcast.net', 1, '2024-02-27 22:46:28', '2024-02-27 22:46:28'),
(1176, 'tphelps05@att.net', 1, '2024-02-27 22:58:11', '2024-02-27 22:58:11'),
(1177, 'trbby71@yahoo.com', 1, '2024-02-27 23:10:11', '2024-02-27 23:10:11'),
(1178, 'elizabeth.s@electricma.com', 1, '2024-02-27 23:22:23', '2024-02-27 23:22:23'),
(1179, 'bkaiser@lightningmaster.com', 1, '2024-02-27 23:34:03', '2024-02-27 23:34:03'),
(1180, 'braden@accessgaragedoor.com', 1, '2024-02-27 23:44:21', '2024-02-27 23:44:21'),
(1181, 'pazcardoso@hotmail.com', 1, '2024-02-27 23:54:57', '2024-02-27 23:54:57'),
(1182, 'anne@emeraldhavenrealty.com', 1, '2024-02-28 00:04:55', '2024-02-28 00:04:55'),
(1183, 'Kurt@grimmsgarden.com', 1, '2024-02-28 00:14:50', '2024-02-28 00:14:50'),
(1184, 'oterocuriel0812@gmail.com', 1, '2024-02-28 00:23:59', '2024-02-28 00:23:59'),
(1185, 'asiacombs19@gmail.com', 1, '2024-02-28 00:33:40', '2024-02-28 00:33:40'),
(1186, 'britt@sanditen.com', 1, '2024-02-28 00:43:32', '2024-02-28 00:43:32'),
(1187, 'eric@secondstepdev.com', 1, '2024-02-28 00:53:49', '2024-02-28 00:53:49'),
(1188, 'agiese24@gmail.com', 1, '2024-02-28 01:04:47', '2024-02-28 01:04:47'),
(1189, '9724675304@txt.att.net', 1, '2024-02-28 01:15:44', '2024-02-28 01:15:44'),
(1190, 'Karenmotiejunas@gmail.com', 1, '2024-02-28 01:26:45', '2024-02-28 01:26:45'),
(1191, 'carlone4711@yahoo.com', 1, '2024-02-28 01:38:38', '2024-02-28 01:38:38'),
(1192, 'filhodorelampago@gmail.com', 1, '2024-02-28 02:15:11', '2024-02-28 02:15:11'),
(1193, 'bluegirl635@gmail.com', 1, '2024-02-28 02:28:12', '2024-02-28 02:28:12'),
(1194, 'nathalieq4@icloud.com', 1, '2024-02-28 02:40:32', '2024-02-28 02:40:32'),
(1195, 'jcsteyn@ruggeda.co.za', 1, '2024-02-28 03:04:25', '2024-02-28 03:04:25'),
(1196, 'rarbour73@gmail.com', 1, '2024-02-28 03:36:53', '2024-02-28 03:36:53'),
(1197, 'SAAD@ELECTRONSHOP1.COM', 1, '2024-02-28 03:48:11', '2024-02-28 03:48:11'),
(1198, 'muratcelik@siralikebap.com', 1, '2024-02-28 04:24:42', '2024-02-28 04:24:42'),
(1199, 'guris83465@outlook.com', 1, '2024-02-28 04:35:40', '2024-02-28 04:35:40'),
(1200, 'shreyassk2008@gmail.com', 1, '2024-02-28 04:45:53', '2024-02-28 04:45:53'),
(1201, 'jessica.cozzens@gmail.com', 1, '2024-02-28 04:56:26', '2024-02-28 04:56:26'),
(1202, '7574697718@tmomail.net', 1, '2024-02-28 05:07:22', '2024-02-28 05:07:22'),
(1203, 'ybruneau.1211@outlook.com', 1, '2024-02-28 05:17:21', '2024-02-28 05:17:21'),
(1204, 'christina.moragon@thecavaliersf.com', 1, '2024-02-28 05:57:18', '2024-02-28 05:57:18'),
(1205, 'clermontsuzanne@hotmail.com', 1, '2024-02-28 06:08:14', '2024-02-28 06:08:14'),
(1206, 'matt@zuckersholdings.com', 1, '2024-02-28 06:34:54', '2024-02-28 06:34:54'),
(1207, 'mazur.david@gmx.de', 1, '2024-02-28 06:50:54', '2024-02-28 06:50:54'),
(1208, 'debbiebuonaiuto@gmail.com', 1, '2024-02-28 07:05:16', '2024-02-28 07:05:16'),
(1209, 'wnbaugusta2801@gmail.com', 1, '2024-02-28 07:18:56', '2024-02-28 07:18:56'),
(1210, 'kimsanchez105800@gmail.com', 1, '2024-02-28 07:31:29', '2024-02-28 07:31:29'),
(1211, 'nruss99@yahoo.com', 1, '2024-02-28 07:44:12', '2024-02-28 07:44:12'),
(1212, 'kaelicookpottery@gmail.com', 1, '2024-02-28 07:58:14', '2024-02-28 07:58:14'),
(1213, 'teraatwood1317@gmail.com', 1, '2024-02-28 08:12:33', '2024-02-28 08:12:33'),
(1214, 'cirom@vera.com.uy', 1, '2024-02-28 08:30:47', '2024-02-28 08:30:47'),
(1215, 'kmfariss@yahoo.com', 1, '2024-02-28 08:52:20', '2024-02-28 08:52:20'),
(1216, 'speedy6873@yahoo.com', 1, '2024-02-28 09:12:30', '2024-02-28 09:12:30'),
(1217, 'monclairgayeau420@yahoo.com', 1, '2024-02-28 09:36:44', '2024-02-28 09:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE IF NOT EXISTS `syllabi` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `lession_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `examination_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `lession_item` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `class_id`, `subject_id`, `lession_id`, `examination_id`, `lession_item`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4, 'page: 1 to 200', 1, '2024-06-03 00:23:41', '2024-06-08 23:27:09'),
(2, 1, 3, 8, 3, '<p>page: 200-300</p>', 1, '2024-06-03 01:12:41', '2024-06-08 23:27:26'),
(3, 7, 3, 3, 7, '<p>page: 300-400</p>', 1, '2024-06-03 01:13:09', '2024-06-03 01:13:09'),
(5, 7, 3, 5, 8, '<p>page: 400-500</p>', 1, '2024-06-03 01:20:09', '2024-06-03 01:20:09'),
(6, 7, 3, 6, 8, '<p>page:500-600</p>', 1, '2024-06-03 01:20:36', '2024-06-03 01:20:36'),
(7, 7, 3, 7, 8, '<p>page:600-700</p>', 1, '2024-06-03 01:21:07', '2024-06-03 01:21:07'),
(8, 7, 3, 8, 9, '<p>page:700-800</p>', 1, '2024-06-03 01:21:42', '2024-06-03 01:21:42'),
(9, 7, 3, 9, 9, '<p>Page:800-900</p>', 1, '2024-06-03 01:22:15', '2024-06-03 01:22:34'),
(10, 7, 3, 10, 9, '<p>page:900-1000</p>', 1, '2024-06-03 01:22:56', '2024-06-03 01:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `blog_id` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`, `created_at`, `updated_at`, `type`, `blog_id`) VALUES
(62, 'Ahmed', 1, '2024-01-02 04:27:40', '2024-01-02 04:27:40', 'blog', 40),
(63, 'Hi', 1, '2024-01-02 04:27:40', '2024-01-02 04:27:40', 'blog', 40),
(78, 'blog', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(79, 'ceo', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(80, 'seo', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(81, 'mmc', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(82, 'bbc', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(83, 'tv', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(84, 'vp', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(85, 'haha', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(86, 'hi', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(87, 'hihi', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(88, 'huhu', 1, '2024-01-02 04:51:14', '2024-01-02 04:51:14', 'blog', 29),
(143, 'dfsgfds', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(144, 'dfgfdg', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(145, 'dsfgfdsg', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(146, 'sdrwr', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(147, 'eware', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(148, 'ertret', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(149, 'dzsfdzsf', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(150, 'vzxdfv', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(151, 'reere', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(152, 'erer', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(153, 'nbghyg', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(154, 'frt', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(155, 'sdasd', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(156, 'sdfe', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(157, 'fvbfvb', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(158, 'gfdgrt', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(159, 'ghyh', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(160, 'erere', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(161, 'dfgdrt', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(162, 'hyht', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(163, 'jyhtyh', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(164, 'tree', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(165, 'dgfret', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(166, 'dgrrg', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(167, 'dghdtrhg', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(168, 'hfth', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(169, 'hythhhhhhhhhhhs', 1, '2024-01-02 04:57:58', '2024-01-02 04:57:58', 'blog', 41),
(171, 'blog', 1, '2024-01-03 21:27:38', '2024-01-03 21:27:38', 'blog', 42),
(172, 'gfdf', 1, '2024-01-07 22:50:26', '2024-01-07 22:50:26', 'blog', 43),
(173, 'hgfdsf', 1, '2024-01-07 22:50:26', '2024-01-07 22:50:26', 'blog', 43),
(174, 'hfdsf', 1, '2024-01-07 22:50:26', '2024-01-07 22:50:26', 'blog', 43);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE IF NOT EXISTS `teacher_info` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `edu_deg` varchar(255) DEFAULT NULL,
  `edu_cirti` varchar(255) DEFAULT NULL,
  `exp` varchar(255) DEFAULT NULL,
  `sub` varchar(255) DEFAULT NULL,
  `nid` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`id`, `userid`, `edu_deg`, `edu_cirti`, `exp`, `sub`, `nid`, `created_at`, `updated_at`) VALUES
(1, '15', 'Master\'s in Human Psychology', '202301260729Facebook post - 1.png', '4 years', 'Math', NULL, NULL, NULL),
(2, '17', 'Master\'s in English', '202302010544Capture1.PNG', '3 years', 'English', NULL, NULL, NULL),
(3, '5', 'Master\'s in Human Psychology', '202302020408app820.png', '4 years', 'Math', NULL, NULL, NULL),
(4, '18', 'Master\'s in English', '202302020633Facebook post - 1.png', '4 years', 'English', NULL, NULL, NULL),
(5, '19', 'Master\'s in Human Psychology', '2023020206356e19fee6b47b36ca613f.png', '5 years', 'Bangla', NULL, NULL, NULL),
(6, '20', 'Master\'s in Math', '202302020636MERN-Cover.jpg', '3 years', 'Math', NULL, NULL, NULL),
(7, '21', 'Master\'s in Sociology', '202302020639er entity.PNG', '6 years', 'Bangla', NULL, NULL, NULL),
(8, '23', 'yhdskfv', NULL, '2 years', NULL, NULL, NULL, NULL),
(9, '24', 'Honurs', NULL, '2 years', NULL, NULL, NULL, NULL),
(10, '25', 'Graduate in English', NULL, '2 years', NULL, NULL, NULL, NULL),
(11, '25', 'Graduate in English', NULL, '2 years', NULL, NULL, NULL, NULL),
(12, '30', 'Bsc CSC', NULL, '7 years', NULL, NULL, NULL, NULL),
(13, '30', 'Bsc CSC', NULL, '7 years', NULL, NULL, NULL, NULL),
(14, '34', 'dcggds', NULL, 'dshsdhsdh', NULL, NULL, NULL, NULL),
(15, '36', 'dcggds', NULL, '1 year', NULL, NULL, NULL, NULL),
(16, '38', 'BBA', NULL, 'teacher987@gmail.com', 'Math', '1324235765', NULL, NULL),
(17, '39', NULL, NULL, NULL, NULL, NULL, '2023-03-12 12:46:45', '2023-03-12 12:46:45'),
(18, '40', 'bsc', NULL, '3', NULL, NULL, '2023-03-12 13:09:00', '2023-03-12 13:09:00'),
(19, '41', 'MBA', NULL, '18', NULL, NULL, '2023-03-12 13:47:05', '2023-03-12 13:47:05'),
(20, '42', '564564', NULL, '564564654', NULL, NULL, '2023-03-12 17:08:19', '2023-03-12 17:08:19'),
(21, '43', 'MBACA', NULL, '4 year', 'Bangla', '1556876550', '2023-03-13 02:37:43', '2023-03-13 02:37:43'),
(22, '46', 'BBA', NULL, '1 year', 'Math', '1234667532', '2023-03-14 04:41:24', '2023-03-14 04:41:24'),
(23, '47', 'BBA', NULL, 'No', NULL, NULL, '2023-03-29 08:21:57', '2023-03-29 08:21:57'),
(24, '48', 'BSC CSC', NULL, '4 years', 'English', '1234567893', '2023-03-31 05:49:01', '2023-03-31 05:49:01'),
(25, '49', 'Class Ten', NULL, '4', NULL, NULL, '2023-03-31 05:55:24', '2023-03-31 05:55:24'),
(26, '51', 'MBA', NULL, '3 Year', NULL, NULL, '2023-04-06 04:28:08', '2023-04-06 04:28:08'),
(27, '55', 'Bsc CSC', NULL, '7 years', 'Math', '7845345345', '2023-05-19 08:58:29', '2023-05-19 08:58:29'),
(28, '56', 'BSC', NULL, '5', NULL, NULL, '2023-08-09 10:25:55', '2023-08-09 10:25:55'),
(29, '59', 'BSC', NULL, '5', NULL, NULL, '2023-08-09 10:26:39', '2023-08-09 10:26:39'),
(30, '56', 'BSC', NULL, '5', NULL, NULL, '2023-08-10 04:39:58', '2023-08-10 04:39:58'),
(31, '61', 'BSC', NULL, '5', NULL, NULL, '2023-08-10 04:40:25', '2023-08-10 04:40:25'),
(32, '63', 'sss', NULL, '12', NULL, NULL, '2023-08-12 08:50:48', '2023-08-12 08:50:48'),
(33, '63', 'sss', NULL, '12', NULL, NULL, '2023-08-12 08:51:03', '2023-08-12 08:51:03'),
(34, '73', 'Bsc CSC', NULL, '7 years', 'Math', '1234667532', '2024-01-11 11:33:51', '2024-01-11 11:33:51'),
(35, '76', 'Bsc CSC', NULL, '7 years', NULL, NULL, '2024-01-11 11:41:33', '2024-01-11 11:41:33'),
(36, '73', 'Bsc CSC', NULL, NULL, NULL, NULL, '2024-01-11 11:47:44', '2024-01-11 11:47:44'),
(37, '73', 'BSC', NULL, '7 years', NULL, NULL, '2024-01-11 15:45:48', '2024-01-11 15:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `star` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `comment`, `star`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Kazi Arman', 'CEO', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,</span><br></p>', '4', '1716620168_testimonial_image.jpg', 1, '2023-12-30 03:29:43', '2024-05-25 00:58:14'),
(3, 'DR. Sharmin Shila', 'Co- Founder', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</span><br></p>', '3', '1716620191_testimonial_image.jpg', 1, '2023-12-30 03:31:03', '2024-05-25 00:58:30'),
(4, 'MD ASLAM ANSARI', 'Co- Founder & Director', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,</span><br></p>', '4', '1716620216_testimonial_image.jpg', 1, '2023-12-30 03:31:55', '2024-05-25 00:58:55'),
(5, 'DR. Sharmin Shila', 'Co- Founder', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span><br></p>', '5', '1716620235_testimonial_image.jpg', 1, '2023-12-30 03:33:00', '2024-05-25 00:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE IF NOT EXISTS `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `continent_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `continent_id`, `country_id`, `state_id`, `city_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 3, 'Shahzadpur', '6061889781697625041_thana_image.png', 1, '2023-10-18 04:30:41', '2023-10-18 04:30:56'),
(2, 3, 4, 1, 4, 'jigatola', '20204847981697625112_thana_image.png', 1, '2023-10-18 04:31:52', '2023-10-18 06:24:14'),
(3, 1, 1, 3, 3, 'Ullapara', '21216309791697956338_thana_image.jpg', 1, '2023-10-22 00:32:18', '2023-10-22 00:32:18'),
(4, 1, 1, 3, 3, 'Belkuchi', '17979225401697956445_thana_image.png', 1, '2023-10-22 00:34:05', '2023-10-22 00:34:05'),
(5, 1, 1, 3, 3, 'Tarash', '21089865191697956513_thana_image.jpg', 1, '2023-10-22 00:35:13', '2023-10-22 00:35:13'),
(6, 1, 1, 3, 3, 'Raiganj', '362438481697956551_thana_image.png', 1, '2023-10-22 00:35:51', '2023-10-22 00:35:51'),
(7, 1, 1, 3, 3, 'Kazipur', '11323707961697956582_thana_image.png', 1, '2023-10-22 00:36:22', '2023-10-22 00:36:22'),
(8, 1, 1, 3, 3, 'Kamarkhanda', '5659021121697956615_thana_image.png', 1, '2023-10-22 00:36:55', '2023-10-22 00:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'International Blog', 'blog', 1, '2024-01-03 21:11:38', '2024-01-03 21:11:38'),
(3, 'Personal Blog', 'blog', 1, '2024-01-03 21:14:35', '2024-01-03 21:14:35'),
(4, 'Internet', 'blog', 1, '2024-01-03 21:15:17', '2024-01-03 21:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `topper_students`
--

CREATE TABLE IF NOT EXISTS `topper_students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `examination_id` bigint(20) NOT NULL DEFAULT 0,
  `result` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topper_students`
--

INSERT INTO `topper_students` (`id`, `student_id`, `academic_year_id`, `session_id`, `class_id`, `section_id`, `group_id`, `examination_id`, `result`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 23, 6, 0, 7, 4, 1, 9, '5.00', 'great result', 1, '2024-06-08 01:34:05', '2024-06-08 03:05:24'),
(3, 9, 6, 0, 1, 0, 0, 9, '5.00', 'Best wishes for you.', 1, '2024-06-08 01:58:09', '2024-06-08 02:32:07'),
(4, 43, 6, 0, 7, 0, 3, 9, '5.00', 'Best wishes you you.', 1, '2024-06-08 01:59:01', '2024-06-08 02:28:39'),
(5, 22, 6, 0, 7, 4, 1, 9, '5.00', 'Best wishes for you. thank you.', 1, '2024-06-08 02:00:52', '2024-06-08 02:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `tp_options`
--

CREATE TABLE IF NOT EXISTS `tp_options` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) DEFAULT NULL,
  `option_value` text DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `footer_image` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `license_no` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `seller_commission` float NOT NULL DEFAULT 0,
  `teacher_commission` float NOT NULL DEFAULT 0,
  `withdrawal_fee` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tp_options`
--

INSERT INTO `tp_options` (`id`, `option_name`, `option_value`, `header_image`, `footer_image`, `favicon`, `company_name`, `address1`, `address2`, `email1`, `email2`, `license_no`, `phone1`, `phone2`, `copyright`, `seller_commission`, `teacher_commission`, `withdrawal_fee`, `created_at`, `updated_at`) VALUES
(1, 'theme_options_seo', '{\"og_title\":[\"porai\"],\"og_keywords\":[\"porai\",\"book\",\"student\",\"teacher\",\"course\"],\"og_description\":\"this is description, thank you\",\"og_image\":\"18556538591707298994.jfif\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-02-07 09:45:13'),
(2, 'theme_logo', NULL, '1715226430_header-logo.jpeg', '1715226430_footer-logo.jpeg', '1715226430_favicon.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-05-09 03:47:10'),
(4, 'theme_social_media', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/navieasoftusbd\",\"twitter\":\"https:\\/\\/twitter.com\\/i\\/flow\\/login?redirect_after_login=%2Fnavieasoft\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"youtube\":\"https:\\/\\/www.youtube.com\\/@navieasoft\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-01-30 15:56:23'),
(7, 'theme_option_footer', NULL, NULL, NULL, NULL, NULL, 'Mohakhali DOHS, Dhaka', 'Mohakhali DOHS, Dhaka', 'poraiorg@gmail.com', 'navieasoft@gmail.com', '20-543274', '01636312933', '+8801311805398', 'copyright  Powerd by NavieaSoft', 0, 0, 0, NULL, '2024-06-10 06:59:29'),
(8, 'theme_option_header', NULL, NULL, NULL, NULL, 'school_management', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-05-09 03:45:34'),
(10, 'theme_custom_js', '{\"custom_head_js\":\"var tes;\",\"custom_body_js\":\"var tes;\",\"custom_footer_js\":\"var tes;\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-01-30 17:42:54'),
(11, 'theme_custom_css', '{\"custom_headre_css\":\".head_1{\\r\\ncolor:red;\\r\\n}\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-01-27 12:25:34'),
(14, 'social_login', '{\"google_client_id\":\"162291736494-0jetbvjt7rigffp7n5m9kotop81fsrfs.apps.googleusercontent.com\",\"google_secret_id\":\"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\",\"fb_client_id\":\"242403095592477\",\"fb_secret_id\":\"da301a118463611fe26f76daefb7a7ea\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-02-14 08:25:00'),
(15, 'theme_color', '{\"header_color\":\"#2264ce\",\"header_text_color\":\"#f9f0f0\",\"menu_color\":\"#698ad8\",\"category_color\":\"#d01b72\",\"text_color\":\"#1f1f1e\",\"product_text_color\":\"#fafafa\",\"button1_color\":\"#1bbc9d\",\"button1_hover_color\":\"#0a1eb8\",\"button2_color\":\"#313532\",\"button2_hover_color\":\"#5c87c7\",\"button2_text_color\":\"#eaebeb\",\"button2_border_color\":\"#07477d\",\"theme_color\":\"#26502c\",\"theme_text_color\":\"#fcfcfc\",\"theme_hover_color\":\"#1564cb\",\"package1_color\":\"#a8b5e1\",\"package2_color\":\"#533d8f\",\"footer_color\":\"#141a71\",\"footer_text_color\":\"#ffffff\",\"footer_news_color\":\"#25171c\",\"currency_background_color\":\"#27109e\",\"currency_frontend_color\":\"#587893\",\"seller_background_color\":\"#b5cfb9\",\"seller_frontend_color\":\"#a98fe6\",\"seller_text_color\":\"#292dae\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-06-10 07:17:10'),
(16, 'google_maps_address', '{\"g_location\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d7302.106495011715!2d90.39012999501969!3d23.78111813250214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c76a25b04c17%3A0xc32fd7eaacd36446!2sMohakhali%20DOHS%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1706695478993!5m2!1sen!2sbd\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>\",\"status\":\"1\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-01-31 10:05:00'),
(17, 'theme_custom_html', '{\"custom_headre_html\":\"<html>\\r\\n<\\/html>\",\"custom_body_html\":\"<html>\\r\\n<\\/html>\",\"custom_footer_html\":\"<html>\\r\\n<\\/html>\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-01-27 12:22:28'),
(18, 'payment_gateway', '{\"stripe_publice_key\":\"pk_test_51NywwbGC0MqY8SyQxWc6N78yUS69yZSujr0EAO2MrhMPkC0XINjbB3sicAgLkNSxU5YQr4X9h8J96DA2hlKOKSLq00NO7V3hsS\",\"stripe_secret_key\":\"sk_test_51NywwbGC0MqY8SyQnf0tCZASLGOaOfzRxSDzfrmvzjJIHnwQztDWnkdYf4pmz0L8ntQG1Vz8vIV7qBNGehEGqhhm00ygl4g8fJ\",\"stripe_currency\":\"usd\",\"stripe_icon\":\"9729983201706701360.png\",\"stripe_status\":\"1\",\"paypal_client_id\":\"\",\"paypal_secret_key\":\"\",\"paypal_currency\":\"\",\"paypal_icon\":\"\",\"sand_box_mode\":\"0\",\"paypal_status\":\"0\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-01-30 16:08:54', '2024-02-06 09:34:49'),
(19, 'commission', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 10, 3, NULL, '2024-02-05 10:00:09'),
(20, 'theme_option_school_info', '{\"school_name\":\"DHAKA INTERNATIONAL SCHOOL\",\"phone1\":\"01858509214\",\"phone2\":\"01858509214\",\"email\":\"schoolgamil@gmail.com\",\"website\":\"https:\\/\\/www.futurelearn.com\\/\",\"address\":\"dhaka\",\"eiin_number\":\"1234354\",\"school_logo\":\"10616615391717051677.png\",\"principal_signature\":\"\",\"national_father\":\"1772368951717923541.png\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2024-06-09 08:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE IF NOT EXISTS `unions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `continent_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `thana_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `continent_id`, `country_id`, `state_id`, `city_id`, `thana_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 3, 1, 'Habibullah Union', '10907814451697628070_union_image.webp', 1, '2023-10-18 05:21:10', '2023-10-18 05:21:10'),
(3, 3, 4, 1, 4, 2, 'Tenanir More', '20038281161697631076_union_image.webp', 1, '2023-10-18 06:11:16', '2023-10-18 06:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `continent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner_image` text DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `admissions_process` longtext DEFAULT NULL,
  `accommodation` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `continent_id`, `country_id`, `state_id`, `city_id`, `address`, `image`, `status`, `created_at`, `updated_at`, `banner_image`, `about`, `admissions_process`, `accommodation`) VALUES
(1, 'State University of BanglaDesh', 1, 1, 3, 3, 'Dhaka, Bangladesh', '10609648151709383836university_logo.jpg', 1, '2024-02-28 03:39:40', '2024-03-02 07:02:35', '5990666811709383138university_banner_image.jpg', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify; font-size: 0.875rem;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></h2>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><span style=\"color: rgb(255, 0, 0);\">Choose a programs</span></h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><span style=\"color: rgb(255, 0, 0);\">Online Apply</span></h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><span style=\"color: rgb(255, 0, 0);\">Enroll Bangladesh</span></h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '<p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 0.5em; font-family: Lato, sans-serif; color: rgb(51, 51, 51); font-size: 16px;\">You will need to book the accommodation after you have been accepted.</p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 0.5em; font-family: Lato, sans-serif; color: rgb(51, 51, 51); font-size: 16px;\">You can choose to live on campus or off campus in private accommodation.</p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 0.5em; font-family: Lato, sans-serif; color: rgb(51, 51, 51); font-size: 16px;\">How to book:</p><ul style=\"-webkit-font-smoothing: antialiased; list-style: none; padding: 0px; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;\"><li style=\"-webkit-font-smoothing: antialiased;\">Make a booking online after you have been accepted (in this case please let us know your choice when you apply).</li><li style=\"-webkit-font-smoothing: antialiased;\">Register when you arrive - its not possible to reserve a room before arriving. You can arrive a few days before and book it</li></ul>'),
(3, 'Eastern University Bangladesh', 1, 1, 3, 3, 'cumilla,Bangladesh', '1936817111709546089university_logo.png', 1, '2024-02-28 05:36:46', '2024-03-04 03:54:49', '21094257401709383092university_banner_image.jpg', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>'),
(4, 'BRAC University', 1, 5, 11, 11, 'chaia nannn', '21428216331709545986university_logo.png', 1, '2024-02-28 07:08:59', '2024-03-04 03:53:06', '12259368961709383065university_banner_image.png', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>'),
(5, 'Khulna University', 1, 1, 3, 6, 'Dhaka Bangladesh', '16448097921709546021university_logo.png', 1, '2024-02-28 23:55:44', '2024-03-04 03:53:41', '5438486881709383175university_banner_image.png', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>'),
(6, 'American International University', 3, 4, 1, 4, 'Dhaka', '5321589431709546476university_logo.jpg', 1, '2024-02-28 23:56:07', '2024-03-04 04:01:16', NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', NULL, NULL),
(7, 'Bangabandhu Sheikh Mujibur University', 1, 1, 3, 10, 'aesfefasef', '6000063731709546446university_logo.png', 1, '2024-02-28 23:56:28', '2024-03-04 04:00:46', NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', NULL, NULL),
(8, 'Bangladesh Agricultural University (BAU)', 1, 1, 3, 6, 'Bangladesh', '9559335441709546399university_logo.png', 1, '2024-02-28 23:57:01', '2024-03-04 03:59:59', NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', NULL, NULL),
(9, 'National University, Bangladesh', 1, 1, 3, 3, 'Dhaka', '20786104741709546367university_logo.svg', 1, '2024-02-28 23:57:23', '2024-03-04 03:59:27', NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', NULL, NULL),
(10, 'Daffodil University', 1, 1, 3, 6, 'Dhaka Bangladesh', '14427879511709546541university_logo.jpg', 1, '2024-02-28 23:57:47', '2024-03-04 04:02:21', NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', NULL, NULL),
(11, 'Bangladesh University of Textiles', 1, 1, 3, 3, 'chittagong', '11677544041709546306university_logo.png', 1, '2024-02-28 23:58:22', '2024-03-04 03:58:26', NULL, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', NULL, NULL),
(12, 'Bangabandhu Sheikh Mujib Medical University', 3, 4, 1, 4, 'Dhaka', '11245836801709546272university_logo.png', 1, '2024-02-28 23:58:45', '2024-03-04 03:57:52', NULL, '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify; font-size: 0.875rem;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br></h2>', NULL, NULL),
(13, 'Bangladesh University', 1, 1, 3, 8, 'Bangladesh', '1280354621709546709university_logo.jpg', 1, '2024-02-28 23:59:10', '2024-03-04 04:05:10', '16423423051709380687university_banner_image.jpg', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL),
(14, 'Jahangirnagar University', 3, 4, 1, 4, 'Dhaka', '9231893581709546196university_logo.jpg', 1, '2024-02-28 23:59:34', '2024-03-04 03:56:36', '16705050841709380635university_banner_image.png', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div>', NULL),
(15, 'Dhaka University', 1, 1, 3, 3, 'Dhaka, Bangladesh', '9606431709546184university_logo.png', 1, '2024-03-02 02:27:57', '2024-03-09 04:23:44', '6397083681709372135university_banner_image.webp', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><span style=\"color: rgb(255, 0, 0);\">Choose a Program</span></h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><span style=\"color: rgb(255, 0, 0);\">Apply Online</span></h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><span style=\"color: rgb(255, 0, 0);\">Enroll China</span></h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley</p>', '<p>sdfdf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `useraccesses`
--

CREATE TABLE IF NOT EXISTS `useraccesses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT 0,
  `browser_address` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useraccesses`
--

INSERT INTO `useraccesses` (`id`, `ip_address`, `user_id`, `browser_address`, `date`, `created_at`, `updated_at`) VALUES
(7, '103.199.168.122', 267, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-06 04:50:32', NULL, '2024-02-06 09:50:32'),
(8, '103.199.168.122', 268, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-05 10:04:40am', NULL, NULL),
(9, '103.199.168.122', 265, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-05 15:08:55', NULL, '2024-02-05 20:08:55'),
(10, '138.201.195.214', 272, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Herring/95.1.8810.11', '2024-02-05 04:33:33pm', NULL, NULL),
(11, '103.199.168.122', 273, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-06 05:31:04am', NULL, NULL),
(12, '103.199.168.122', 174, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-06 09:26:04am', NULL, NULL),
(13, '103.199.168.122', 275, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-06 09:30:07am', NULL, NULL),
(15, '103.199.168.122', 277, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-06 09:54:52am', NULL, NULL),
(16, '103.199.168.122', 278, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-06 04:37:05pm', NULL, NULL),
(17, '103.199.168.122', 279, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-14 09:39:57', NULL, '2024-02-14 14:39:57'),
(18, '103.199.168.122', 260, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-10 07:49:47', NULL, '2024-02-10 12:49:47'),
(19, '103.199.168.122', 280, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-14 04:15:32am', NULL, NULL),
(20, '103.199.168.122', 283, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-15 05:03:37am', NULL, NULL),
(21, '103.199.168.122', 284, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-15 05:10:40am', NULL, NULL),
(22, '103.199.168.122', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-19 03:11:01am', NULL, NULL),
(23, '194.85.210.76', 285, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '2024-02-19 10:02:34am', NULL, NULL),
(25, '::1', 288, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '2024-03-10 10:21:34', NULL, '2024-03-10 04:21:34'),
(26, '::1', 276, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-31 04:26:18am', NULL, NULL),
(27, '::1', 276, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 Edg/123.0.0.0', '2024-04-03 03:38:13am', NULL, NULL),
(28, '::1', 276, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-07 03:32:05am', NULL, NULL),
(29, '::1', 186, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-25 09:17:04', NULL, '2024-05-25 03:17:04'),
(31, '::1', 296, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-25 08:45:57am', NULL, NULL),
(32, '::1', 290, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-25 08:46:51am', NULL, NULL),
(33, '::1', 297, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-25 08:56:11am', NULL, NULL),
(34, '::1', 186, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '2024-06-09 06:19:17', NULL, '2024-06-09 00:19:17'),
(35, '::1', 291, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '2024-06-09 05:19:37', NULL, '2024-06-08 23:19:37'),
(36, '::1', 304, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '2024-06-01 08:45:47am', NULL, NULL),
(37, '127.0.0.1', 291, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123.0', '2024-06-08 05:02:28am', NULL, NULL),
(38, '::1', 186, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', '2024-06-08 08:23:21am', NULL, NULL),
(39, '::1', 291, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', '2024-06-08 08:24:08am', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `bmdc_number` varchar(255) DEFAULT NULL,
  `nurse_licence_number` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `trade_licence_number` varchar(255) DEFAULT NULL,
  `driving_licence_number` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `change_token` varchar(100) DEFAULT NULL,
  `change_date` datetime DEFAULT NULL,
  `forget_token` varchar(100) DEFAULT NULL,
  `forget_date` datetime DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT 0,
  `google_id` varchar(200) DEFAULT NULL,
  `facebook_id` varchar(200) DEFAULT NULL,
  `twitter_id` varchar(255) DEFAULT NULL,
  `instagram_id` varchar(255) DEFAULT NULL,
  `is_super` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_code_ifsc` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_ac_holder_name` varchar(255) DEFAULT NULL,
  `paypal_id_num` varchar(255) DEFAULT NULL,
  `commission` float DEFAULT NULL,
  `current_balance` float DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `continent` varchar(100) DEFAULT NULL,
  `continent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_mother_nid` varchar(255) DEFAULT NULL,
  `previous_school` varchar(255) DEFAULT NULL,
  `per_address` varchar(255) DEFAULT NULL,
  `is_admission` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `designation_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `teacher_type` varchar(255) DEFAULT NULL,
  `is_alumni` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `type`, `status`, `password`, `mobile`, `address`, `remember_token`, `created_at`, `updated_at`, `shop_name`, `about`, `nid`, `hospital_name`, `speciality`, `experience`, `department`, `bmdc_number`, `nurse_licence_number`, `shop_address`, `trade_licence_number`, `driving_licence_number`, `manufacturer`, `user_code`, `image`, `change_token`, `change_date`, `forget_token`, `forget_date`, `dob`, `gender`, `age`, `google_id`, `facebook_id`, `twitter_id`, `instagram_id`, `is_super`, `name`, `institution`, `designation`, `description`, `qualification`, `language`, `country`, `bank_name`, `bank_code_ifsc`, `bank_account_number`, `bank_ac_holder_name`, `paypal_id_num`, `commission`, `current_balance`, `role_id`, `continent`, `continent_id`, `father_name`, `mother_name`, `father_mother_nid`, `previous_school`, `per_address`, `is_admission`, `designation_id`, `teacher_type`, `is_alumni`) VALUES
(1, 'Admin', '1', 'admin@gmail.com', NULL, 0, 1, '$2y$12$fJjCJW19gdir/ygosOOmU./4FjN71tTzcTEUdoXy42CGtab7BlZhG', '01311805398', 'Dhaka', 'o4V7EDwrlJBVuhrWbCRM6gR33z3nkWoAy1Yt3TpNTsf343ASqwomrenDEtpI', '2023-10-10 21:55:32', '2024-02-14 13:17:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2149314441707129718_admin.jpeg', NULL, NULL, 'C2gEDmOs9w', '2024-02-14 08:17:44', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'kazi Arman', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(173, NULL, NULL, 'test.1234@gmail.com', NULL, 1, 1, '$2y$12$KsiXCF2anYkDTIOli0l.lORN0rPyzhfPSom/pHHKpWu/Z1kaNfd6u', '01966509310', NULL, NULL, '2023-12-16 22:08:53', '2023-12-16 22:09:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'djF7za', '2023-12-17 04:09:37', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Niaz', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(174, NULL, NULL, 'navieapc99@gmail.com', NULL, 1, 1, '$2y$12$uNDUPHCPq3AqvsHZ.tzqWuLXB.frU961yUWkAtyDyI/FW6encHdku', '01966509310', 'Dhaka, Bangladesh', 'x8L3lqVdvanK19IwChRb5gcfmi5KLFH4GrnN5YkSzCI6i58Yws3hOcww3xIE', '2023-12-16 22:11:45', '2024-02-06 14:24:39', NULL, '<p>This is my about. Thank You.</p>', '57858278572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1704264258_user_image.jpg', NULL, NULL, 'Yf4iph9bXr', '2023-12-17 04:12:19', NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'razu Ahmed', '', '', '<p>this is description</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(175, 'Thomas Bird', NULL, 'niaz@gmail.com', NULL, 2, 1, '$2y$12$QXuviUI6Y.ws4c2nfgsI8unAgISzblwp8myGDrRTz1eNHr8hMg1Ma', '01966509310', 'Molestiae omnis volu', NULL, '2023-12-21 03:47:19', '2024-05-25 00:50:28', NULL, NULL, '112222333333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9899893481716619404_caruser.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, 'https://www.navieasoft.com/', 'https://www.navieasoft.com/', 'https://www.navieasoft.com/', 'https://www.navieasoft.com/', 0, 'Kazi Arman', 'Lead Academy', '', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Our website is under construction. We\'ll be here soon with our new awesome site, subscribe to be notified&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We\'ll be here soon with our new awesome site</span></p><p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><br></span><br></p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 'permanent', 0),
(176, NULL, NULL, 'kazi@gmail.com', NULL, 2, 1, '$2y$12$xqhaA51RQJ.ydcvVwfxeB.vABxzMzs3/6V6C27RTNbqM7hL9PavdO', '0185888888', 'Dhaka Bangladesh.', NULL, '2023-12-24 05:04:01', '2024-05-25 00:50:49', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16972276971716619414_caruser.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'MD ASLAM ANSARI', 'Navieasoft LTD.', '', '<p><span style=\"font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; text-align: justify;\">LEAD Academy has successfully secured a coveted spot in the distinguished Stanford Seed Transformation Program, Class of 2024, as the only ed-tech platform in this region.</span><br></p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 'permanent', 0),
(177, NULL, NULL, 'jilekha@gmail.com', NULL, 2, 1, '$2y$12$dYi6Tzfm8OuA6E5a/LXWqOwMVjVGiO0TlZ8BAmTZjnW8PvauQjapO', '0191111112', 'Dhaka, Bangladesh', NULL, '2023-12-24 05:05:13', '2024-05-25 00:43:59', NULL, NULL, '57858278572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17054171971716619439_caruser.jpg', NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, 0, 'Nusrath Jahan Rim', 'Lead Academy', '', '<p><span style=\"font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; text-align: justify;\">The Stanford Seed Transformation Program, renowned for its world-class curriculum and innovative insights from the Stanford Graduate School of Business, is tailored for CEOs and founders of established businesses</span><br></p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 'permanent', 0),
(178, NULL, NULL, 'nurse@gmail.com', NULL, 2, 1, '$2y$12$KY4x1CECcbX.81Kh3bg2eeBY2VzsSI7cQ2rIsFWITSEqg1m02LaMS', '0191111112', 'Dhaka', 't342Y1PuU1lptDaBx5TqFDyhAsF94mHEKpfdzhXsXvhQo1liP6KdajnwWhb4', '2023-12-24 05:08:24', '2024-05-25 00:44:35', NULL, NULL, '256985698854', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '676107091716619475_caruser.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'DR. Sharmin Shila', 'Lead Academy', '', '<p><span style=\"font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; text-align: justify;\">What distinguishes LEAD Academy in its field is being the first and only Bangladeshi online learning platform offering both local and internationally accredited certifications,</span><br></p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 'permanent', 0),
(179, NULL, NULL, 'shanu@gmail.com', NULL, 1, 1, '$2y$12$cpteHEp3y7a4u85vjDhpiOpHSbISpHfAa19r3LJc0vQ0cfixDCb5.', '0185888888', NULL, NULL, '2023-12-24 22:14:20', '2023-12-24 22:14:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Shanu Afrin', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(180, NULL, NULL, 'jamrul@gmail.com', NULL, 3, 1, '$2y$12$05MWNEZQRpjkWSFsdO6PleBMqgSoZuBJGCFE9lbZsLFbZjldLAJYW', '0185888888', '', NULL, '2023-12-25 21:08:13', '2024-01-01 03:32:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1703658496_user_image.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'jamrul Ahmed', '', '', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</span><br></p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(182, NULL, NULL, 'ins@gmail.com', NULL, 2, 1, '$2y$12$8LLDphm1Eiea2n7e.Y6qz.tZ/s4FBbcErwlE46h6NBn8YoEXluNhS', '0191111112', 'Mohakhali DOHS, Dhaka Bangladesh.', NULL, '2023-12-27 00:38:10', '2024-05-25 00:49:38', NULL, NULL, '57858278572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14833589121716619778_caruser.jpeg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'hossain khondokar', 'Navieasoft LTD.', '', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 'permanent', 0),
(183, NULL, NULL, 'reza@gmail.com', NULL, 1, 1, '$2y$12$btN6/HhLzGk5/4zRPwQy5eVncwR4IH1G3e.SMMhYzAq/dfZtOCH5y', '0185888888', NULL, NULL, '2023-12-27 05:08:29', '2023-12-27 05:09:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1703675340_user_image.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Reza', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(184, NULL, NULL, 'Instructor@gmail.com', NULL, 2, 1, '$2y$12$vrQJO.1IU8M83mTr1389Ou5oCi6sUXJSIIbfNJY0f5T7rIPWHR41e', '0191111112', 'Dhaka Bangladesh', 'i0kgwz4j9ps2ro6unSvJLL17r3fWqNQHJujB0vHu2fSUfr4UyiNWLYBj6Apw', '2023-12-31 02:49:49', '2024-05-25 01:05:19', NULL, NULL, '57858278572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6003291861716620719_caruser.jpeg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Md Shohag Hossen', 'Navieasoft LTD.', '', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</span><br></p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, 'permanent', 0),
(185, NULL, NULL, 'student@gmail.com', NULL, 1, 1, '$2y$12$74/gzlibjkl6Vm.fL3cHSOGAc2EHNIDzkKA.ovgISb2Hc0mUUmrPe', '01966509310', 'Dhaka, Bangladesh', NULL, '2023-12-31 04:17:15', '2023-12-31 04:28:06', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1704018486_user_image.webp', NULL, NULL, NULL, NULL, '2002-12-21 00:00:00', '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginnersss', '', '', '<p>This is description</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(186, NULL, NULL, 'teacher1@gmail.com', NULL, 2, 1, '$2y$12$fWl5KwIxxg6XTHtBoOXDpOTlk6L/UT/fmvD1t3cPG79xLhWWfjpxS', '0185888888', 'Dhaka', 'tmDM8FuijrYOhyMXFmuXr0ePg9pcIhXwGg9craGE6DBQ7wO7e1hU0nXxMV5Z', '2024-01-01 03:23:54', '2024-05-26 03:18:03', NULL, NULL, '563546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17798205111716715083_caruser.jpeg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Md_shohag', '', '', '<p>ad safs fdsf g</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 'permanent', 0),
(187, NULL, NULL, 'niaz.navieasoft@gmail.com', NULL, 1, 1, '$2y$12$gFy1i0hyXNtYD9yS42Ivf.Bt5JknTzISdeCDDyxzWzOxmAFKBP2He', '01966509310', NULL, NULL, '2024-01-03 01:19:31', '2024-01-03 01:28:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1704266899_user_image.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Hi', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(190, NULL, NULL, 'bijoy@gmail.com', NULL, 4, 1, '$2y$12$bgy1LcMnQ/7Es5DFGQBi4OfhejDM8nfPXWVuTSsUPvNx6QiwcNNf.', '0185888888', 'Dhaka', NULL, '2024-01-04 01:31:38', '2024-01-04 01:31:38', NULL, NULL, '256985698854', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15411405361704353498_image.png', NULL, NULL, NULL, NULL, '2024-01-24 00:00:00', '0', 0, NULL, NULL, NULL, NULL, 0, 'Bijoy', 'Navieasoft LTD.', 'Student', '<p>efesfsef</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(191, NULL, NULL, 'ins.babu@gmail.com', NULL, 2, 1, '$2y$12$fngNXWm8WQ9bGT7iuIV7hufeIGO.C4JOOV7yF7i0htxJynx5rTBzq', '0185888888', 'Dhaka Bangladesh', '9YQCMZx3q38OtLUNUidtfnpvjhx5fucyBis3VhVYeq3HxQyL0PtEbUlVzF3w', '2024-01-04 04:19:29', '2024-05-25 01:06:30', NULL, NULL, '57858278572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14356296671716620790_caruser.jpeg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Kazi Arman', 'Lead Academy', '', '<p>This is my description. Thank you....</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 'permanent', 0),
(192, NULL, NULL, 'insssss@gmail.com', NULL, 3, 1, '$2y$12$ymUKd9qf/ufzzVwuD6y2zOJm5eSmey5qhAsr3EptlpL.HoU3JG332', '0185888888', 'Dhaka Bangladesh', NULL, '2024-01-07 22:38:59', '2024-01-07 22:38:59', NULL, NULL, '563546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8302121791704688739_image.jpg', NULL, NULL, NULL, NULL, '2024-02-01 00:00:00', '1', 0, NULL, NULL, NULL, NULL, 0, 'Beginner Ins', 'Navieasoft LTD.', 'Laravel Developerrrrr', '<p>sdcscsc</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(193, NULL, NULL, 'hostss@gmail.com', NULL, 4, 1, '$2y$12$aLI0dkADal4OU4YKdPp8gOO8mHwNu0BGDJC2QQN3gPtdc1NUp3u92', '0185888888', 'Dhaka', NULL, '2024-01-07 23:15:04', '2024-01-25 04:18:04', NULL, NULL, '563546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5505390291704690904_image.png', NULL, NULL, NULL, NULL, '2024-01-24 00:00:00', '0', 0, NULL, NULL, NULL, NULL, 0, 'Host Name', 'Navieasoft LTD.', 'Java Developer', '<p>this is host description....thank you...</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(194, NULL, NULL, 'test.user@gmail.com', NULL, 1, 1, '$2y$12$dRH5/P8yqdAkLhiwhzq7TeeWNQ5ae5swA89d.UaMvD9eN4s8F3WbO', '0185888888', NULL, 'Na9QTiIxdhU5Xvu8UdVEDWraWlCGHBBfbIr83DknbOZKnwPmSK38V0WSlt2T', '2024-01-07 23:16:09', '2024-01-07 23:16:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'text user', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(199, NULL, NULL, 'ewr@gmail.com', NULL, 1, 1, '$2y$12$lKX25eFZObgB0gBFuk7MpenH5liCmCnzR24d44JMU/DLBtKqEy04C', '0185888888', NULL, NULL, '2024-01-08 01:36:40', '2024-01-08 01:36:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'wefewf', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(217, NULL, NULL, 'qqq@gmail.com', NULL, 1, 1, '$2y$12$FihnZpEsCX5qWE.85QAHKeefX6uKsmD5rc484yTJun0tmAgZ3Fnri', '0185888888', 'Dhaka, Bangladesh', 'Rj8Z6L2REPsPSVb5PwpQty0Bg4oFRAxJ5rySrIm7va4Y92ulbppJ8KeEM1e1', '2024-01-09 23:24:22', '2024-01-15 00:11:50', NULL, NULL, '256985698854', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13398416601705295815_student.png', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginnersss', NULL, NULL, '<p>ewrewrewr</p>', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(220, NULL, NULL, 'haha@gmail.com', NULL, 1, 1, '$2y$12$NuQ567yH.cx.WHzIpG9UAOlmJK0m6ss783wdIdskU5PRfsU/kmQs.', '0185888888', 'chittagong', 'mELRVeWd7DyKK7V8wkQ9ijtmGHY6ozrQt417mnq0UJLaPWRyKai7qpWtZZsa', '2024-01-15 22:30:56', '2024-01-15 23:41:31', NULL, NULL, '2020202020', NULL, NULL, '10 years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '998386981705383608_student.png', NULL, NULL, NULL, NULL, '2024-01-18 00:00:00', '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginnersss', NULL, NULL, '<p>cfbcdf</p>', 'good', '1', '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(235, NULL, NULL, 'aaaaaaaa@gmail.com', NULL, 1, 1, '$2y$12$cKK6lL.RxbAOp2H3Yzunue37ovC5hUaJd6zu2nzh8fuX8T/vrrhte', '01966509310', NULL, 'A5HritCO2ftMTiLbFvFRe1j6Y9JGB3KnCLuhfSx4ojylYjs9tt76mA08SXCE', '2024-01-22 22:57:25', '2024-01-25 04:11:50', NULL, NULL, NULL, NULL, NULL, '10+ years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginnersss', NULL, NULL, NULL, 'good', '1', '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(238, NULL, NULL, 'ins.user@gmail.com', NULL, 3, 1, '$2y$12$Iony.vMl6rCRuh.sZrnh3uP47TxZXvex0JDgNVLdtymoAjH1awwNS', '0191111112', NULL, NULL, '2024-01-24 21:25:33', '2024-01-25 04:21:10', NULL, NULL, NULL, NULL, NULL, '3+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Instructor', NULL, NULL, NULL, 'good', '2', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(239, NULL, NULL, 'seller@gmail.com', NULL, 5, 1, '$2y$12$c7sEOY4dQGOTfBax8MN1.eAbEG1bzZntRWb3x.YM8pe/t956ZKxq2', '0185888888', 'Dhaka', NULL, '2024-01-24 22:16:27', '2024-01-25 04:16:01', NULL, NULL, '256985698854', NULL, NULL, '2+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1706166360_user_image.jpg', NULL, NULL, NULL, NULL, '2024-01-16 00:00:00', '0', 0, NULL, NULL, NULL, NULL, 0, 'seller', '', '', '<p>asd cs s fsa</p>', 'good', '2', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(254, NULL, NULL, 'navdddieapc9@gmail.com', NULL, 6, 1, '$2y$12$oXU9Zn9HU3RNBth7Yy5v/u6jZA/516cBezVgrkTclBlqv1fh899Ci', '0185888888', 'Dhaka, Bangladeshhhhh', NULL, '2024-01-27 03:38:35', '2024-01-27 03:40:50', NULL, NULL, '57858278572ss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12254413021706348359_affiliate.png', NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, 0, 'Beginnesdssss', '', '', '<p>sdf sfsdfa dsf fcsdaf s eef</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(255, NULL, NULL, 'nuewrewrerrse@gmail.com', NULL, 6, 1, '$2y$12$KPyOzpDCXcaBMsmWSwPzou6OdXLLz1RGMSuZLbAkvM6uqw32mQxwK', '01966509310', 'Dhaka', NULL, '2024-01-27 03:42:09', '2024-01-27 03:42:33', NULL, NULL, '57858278572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-03 00:00:00', '0', 0, NULL, NULL, NULL, NULL, 0, 'ref re', '', '', '<p>sretgre g</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(256, NULL, NULL, 'ssssssss@gmail.com', NULL, 1, 1, '$2y$12$u0ng7JMvY4Y6g//RU.rls.KUS1k4Q1noqVcFcthIMGMIJzWUf6nUy', '0185888888', NULL, 'NasgfJV2k4i6HTs6X8lesigTEJdr1u4NhPTSJfHUluGpsFaLpI2DQvcwXTXi', '2024-01-28 05:09:35', '2024-01-28 05:09:35', NULL, NULL, NULL, NULL, NULL, '10 years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginner ssssss', NULL, NULL, NULL, 'good', '1', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(257, NULL, NULL, 'asa@gmail.com', NULL, 5, 1, '$2y$12$d5fjqWVztwoMDbq8uuTNH.9ez4lSK9K3119VSwshlM4ppFLUtXxs2', '0185888888', NULL, NULL, '2024-01-28 05:48:34', '2024-01-28 05:48:34', NULL, NULL, NULL, NULL, NULL, '1+ years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'asas', NULL, NULL, NULL, 'good', '3', '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(258, NULL, NULL, 'ssss1@gmail.com', NULL, 5, 1, '$2y$12$0w7XHvk83IZ.opaxGFz1WOzV8dkO1G0h7Ef0NlgZQP7Q./OKNrJHW', '0185888888', NULL, 'NXdcBqMEcNoy3l89PHXzThKW0N4dvxwFahJtcE5kMuwqf882LxFby5rYu3XI', '2024-01-28 05:49:33', '2024-01-28 05:49:33', NULL, NULL, NULL, NULL, NULL, '10+ years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginner', NULL, NULL, NULL, 'good', '2', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(259, NULL, NULL, 'sstudent@gmail.com', NULL, 1, 1, '$2y$12$ZLBjvHQLt9UvHCZWwtPRx.bQcL4Oi.yNWFQt73nfnnFWqdZUjQO8S', '0185888888', NULL, '9jRYPzJKGFxoFM6eyK1UjeYLx8KaDe4xil16b8nQWDPHJe1xfJH2Wsgp1BEG', '2024-01-28 21:51:31', '2024-01-28 21:51:31', NULL, NULL, NULL, NULL, NULL, '3+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'student', NULL, NULL, NULL, 'good', '2', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(260, NULL, NULL, 'selller@gmail.com', NULL, 5, 1, '$2y$12$.pkMT3Y9X093QIqxDV6B3O9dHhaNSqAXVR28jQVbpo.1nNT/brelm', '0185888888', NULL, 'mQgOF3Z2X4n7Xxwx4kA0obdEnOM5OlcZNm9FweXjN3h9Ydi0P1gm1C1d7h4K', '2024-01-29 22:45:54', '2024-02-10 12:49:57', NULL, NULL, NULL, NULL, NULL, '3+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1707551397_user_image.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'seller', NULL, NULL, NULL, 'good', '2', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(261, NULL, NULL, 'affiliats@gmail.com', NULL, 6, 1, '$2y$12$SZJMJksAneLB4LRDCX0dlOf8tYcG72JV2eMBCJMsQ.Z1uyWU/n9Yu', '0185888888', NULL, '14GnSBZJSLcPAr2qL0G116bMtipz4s3j4c4oyKSUHdR2aL6yOXHhjkYa1gkr', '2024-01-29 22:49:54', '2024-01-29 22:49:54', NULL, NULL, NULL, NULL, NULL, '1+ years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginner', NULL, NULL, NULL, 'good', '2', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(262, NULL, NULL, 'nusdfdsfrse@gmail.com', NULL, 1, 1, '$2y$12$QBKc4/5QosDgEdh3wv5V9ujRkSZkXZHUGRsQ5pj/mBEoV.qLd.0Jy', '0185888888', NULL, 'kNrtV0fRqjvcJZ1I2PFCI3ARST3y5KOmJqab6FcH0pbsNfzJfb1MlaulA9gQ', '2024-01-29 23:35:14', '2024-01-29 23:35:14', NULL, NULL, NULL, NULL, NULL, '10 years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, 0, 'gdfgdfg', NULL, NULL, NULL, 'good', '3', '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(263, NULL, NULL, 'apple@gmail.com', NULL, 1, 1, '$2y$12$nO1lAZ/w/3H2Npm/QbvZmeh4qp9sz6/jTMbnqYZ6/qthGBrYaIVI.', '0185888888', 'Dhaka', NULL, '2024-01-31 16:41:16', '2024-01-31 16:41:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Apple', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(264, NULL, NULL, 'tristanwaller3586@yahoo.com', NULL, 1, 1, '$2y$12$r/7nGBbVx0TG7/Hs./oGqOFb5xvp37qoWJTkVM8ZOW/ze2BDKttu2', '3263353185', NULL, NULL, '2024-01-31 17:31:01', '2024-01-31 17:33:36', NULL, NULL, NULL, NULL, NULL, 'AbywainRQNs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1IWVET86Qf', '2024-01-31 12:33:36', NULL, '1', 0, NULL, NULL, NULL, NULL, 0, 'zePrWJKwSdYtLGC', NULL, NULL, NULL, 'ehcnqxEAiI', '4', '250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(266, NULL, NULL, 'nanaa@gmail.com', NULL, 1, 1, '$2y$12$tmlEZLUt9D3Pd.LrtIwLO.sjmP.W47q2rfsicIhkDegqk/AJu8K7u', '0196665767', 'Dhaka, Bangladesh', NULL, '2024-02-03 11:03:15', '2024-02-03 11:03:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Beginner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(267, NULL, NULL, 'seller.111@gmail.com', NULL, 5, 1, '$2y$12$Plrm4ow/C40Mn0lQwgJn6uvW5oyDs7TMZn5E/cm545JYgCoYrapY.', '0185888888', NULL, 'amuTgP3dH5KZaoHEbpiY1OuwGUmoZKJ9BF9sfgEhY4vE1auXqCZ7yxI5Ycb3', '2024-02-05 14:52:59', '2024-02-05 15:47:06', NULL, NULL, NULL, NULL, NULL, '2+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1707130026_user_image.png', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'seller', '', '', '<p>This is description. Thank you...</p>', 'good', '2', '19', 'Sonali Bank', '12345', '1234567890', 'Seller Ahmed', 'seller@gmail.com', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(268, NULL, NULL, 'student.111@gmail.com', NULL, 1, 1, '$2y$12$CmpHcVMJKbx3E78w5.Sase6PiZIwNbPhZ7QeN1VkhK/F3Kw0MTsg2', '01966509310', 'Dhaka', 'k7aPWgFMLhOEOge8RVERgwfYzwdpTXct6k3QoK8Vz6zRmpu2DClWgBGUaQr3', '2024-02-05 15:03:42', '2024-02-05 15:03:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Beginner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(270, NULL, NULL, 'cmLJjI.qqdbbbt@sabletree.foundation', NULL, 1, 1, '$2y$12$JNUfsz/d5/Hvv/f.4U1WfOQTxPcePO4N5fylGeWi6TVARAm3LnYOW', '1', NULL, NULL, '2024-02-05 18:54:15', '2024-02-05 18:54:15', NULL, NULL, NULL, NULL, NULL, 'Amirah Mcpherson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Isabelle', NULL, NULL, NULL, 'Amirah Mcpherson', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(271, NULL, NULL, 'QxQsod.qqdbbmd@sabletree.foundation', NULL, 1, 1, '$2y$12$UPv5m1ZysdyHq7UOkKr1YedycC//Z/SAzbmDMseWi4DRk9BjFB7qu', '1', NULL, NULL, '2024-02-05 18:54:27', '2024-02-05 18:54:27', NULL, NULL, NULL, NULL, NULL, 'Haley Padilla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Amanda', NULL, NULL, NULL, 'Haley Padilla', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(272, NULL, NULL, 'michaeladams1270868@gmail.com', NULL, 1, 1, '$2y$12$aBLKyErSKQJXkt7yiQYznu.t/QSWLJJ4qNNWSnTQCEKrVd710pT/a', '88384269198', NULL, 'JGM8O9dkEJjhp8QUhRfFTEWudhWI3Wq0Hxln9wbEBraHsVEguuoMdqJJUc2y', '2024-02-05 21:33:30', '2024-02-05 21:33:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, 0, 'Ernestskeds', NULL, NULL, NULL, NULL, '2', '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(275, NULL, NULL, 'niaz1111@gmail.com', NULL, 1, 1, '$2y$12$1elb3wiD1jRhx7ltnzRW0uGzGDLmfpA2i5Zs21yJUpaSWsebHaOjG', '0185888888', NULL, 'QBJ8PcjbNCVK1L5p3NA3jLiWzCSslROgwHBieZcc36rgqL1iB0HlrSG627Gp', '2024-02-06 14:30:00', '2024-02-06 14:30:00', NULL, NULL, NULL, NULL, NULL, '2+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Beginner', NULL, NULL, NULL, 'good', '1', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(276, NULL, NULL, 'shohag@gmail.com', NULL, 1, 1, '$2y$12$/Hk.mYhpsDCn1f2b/S5I8u9VPjX4cMCXL1Lf/M1zfr1Jnxr60Gid6', '01858509214', 'dhaka', 'i9Z3KYxjkKQt5VYFZ6wzxalIEuF5F4yGh87hbrosaRVH7QhqEdbLSKbsBhkw', '2024-02-06 14:33:18', '2024-05-09 03:13:28', NULL, NULL, '4574', NULL, NULL, 'good', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1707551272_user_image.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'shohag', '', '', '<p>fdsgdsfgd</p>', 'good', '1', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'shohag', 'shohag', '4546457', 'hgfdhfdgdh', 'dhaka', 0, 0, NULL, 0),
(277, NULL, NULL, 'niaz111@gmail.com', NULL, 1, 1, '$2y$12$ANbR5IsGesNb972Z.nFY/uUdTj/EXxr86ROX4nJ0CsxP/nohBfP/6', '0185888888', NULL, 'R2ab5UoD6KqlEJGiZYPUrjIhGIqg7dFzQyG7K5UnSgtAoAFSDcwesKby1wKa', '2024-02-06 14:54:43', '2024-02-06 14:54:43', NULL, NULL, NULL, NULL, NULL, '2+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'ewrfewf', NULL, NULL, NULL, 'good', '2', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(278, NULL, NULL, 'navieaui@gmail.com', NULL, 5, 1, '$2y$12$c3g6.Eb/BMalakS0QGeQQ.63lCuKOegPvtzfPeOZPohbILKE/7g3e', '01311805398', NULL, 'gioeuztXliPfBpUPEaHPHKEKsc4jXsD1dUoTd1vGdsXAmfabOfsvk024TU2z', '2024-02-06 21:36:48', '2024-02-06 21:37:24', NULL, NULL, NULL, NULL, NULL, '14 Years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1707237444_user_image.png', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'kazi', NULL, NULL, NULL, 'bsc', '2', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(279, NULL, NULL, 'niazahmed.net@gmail.com', NULL, 1, 1, '$2y$12$OkaT9tSVPaDCwSzs./8sNO98MQ8m2wF7g9/hEimMHYxSyiPjAdpXG', '01966509310', 'Dhaka', 'BjQwouZlCnXeMWjc32a27qoH1yUd116P5OeOKKrUWgKtFsOc5jhBTbYLxW4o', '2024-02-07 07:26:52', '2024-02-14 15:33:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iVRWtx', '2024-02-14 10:33:36', 'BObH5PC9Jd', '2024-02-14 09:32:59', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Niaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(280, NULL, NULL, 'poraaaaa@gmail.com', NULL, 1, 1, '$2y$12$2vbelub5ur59HQ/ENH6dGOIJrFa.KC4ytF8ttkWetRVktbynH0fkq', '01963434', NULL, 'gxopDaNbVAJeup8R6c2uHUoMMhDBtK1pUsjgCkTmLZYjLLBWDnFewJfD60Qq', '2024-02-14 09:15:24', '2024-02-14 09:18:25', NULL, NULL, NULL, NULL, NULL, '1+ years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1707884305_user_image.png', NULL, NULL, NULL, NULL, '2024-02-16 00:00:00', '1', 0, NULL, NULL, NULL, NULL, 0, 'ewrewr', '', '', NULL, 'good', '3', '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(281, NULL, NULL, 'VapQpw.bdjmjdj@chilgoza.buzz', NULL, 1, 1, '$2y$12$ZJxvPI9ziK/I/J7eqFzHWOVRx6HCPyC6Ub2MfNJ9i/lsIYYqNESBO', '1', NULL, NULL, '2024-02-15 03:28:39', '2024-02-15 03:28:39', NULL, NULL, NULL, NULL, NULL, 'Florence Kirk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Lyla', NULL, NULL, NULL, 'Florence Kirk', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(282, NULL, NULL, 'hjUIpS.bdjmjwh@chilgoza.buzz', NULL, 1, 1, '$2y$12$E/jn3VW7iBMH2eAgG2R9Q.hcCrUKcpui1y5.lTLbseWcw9SOHdsWu', '1', NULL, NULL, '2024-02-15 03:28:54', '2024-02-15 03:28:54', NULL, NULL, NULL, NULL, NULL, 'Leandro Holloway', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Kiaan', NULL, NULL, NULL, 'Leandro Holloway', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(283, NULL, NULL, 'teacher.niaz@gmail.com', NULL, 1, 1, '$2y$12$CDA7fR1kzFY.1IzErcIusOulgC3PCxPSnxarTtqh9y0WZAp8OrzDe', '01966509310', 'Dhaka, Bangladesh', 'QI6qKiuSBkgpcALmX8QxfY1KpUDjSYDNHuSR1YLCLnQ2TPL941WxAgVyseRp', '2024-02-15 10:03:29', '2024-02-15 10:04:45', NULL, NULL, '57858278572', NULL, NULL, '1+ years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1707973431_user_image.jpg', NULL, NULL, NULL, NULL, '2000-01-01 00:00:00', '0', 0, NULL, NULL, NULL, NULL, 0, 'Niaz Ahmed Nayeem', '', '', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'good', '1', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(284, NULL, NULL, 'niaz.teacher@gmail.com', NULL, 2, 1, '$2y$12$aU1j00pOgQwBi6iV0d4hRumrhsWuU8MvGnWtrz3.xvSF9RsvxZBGW', '01966509310', 'Dhaka, Bangladesh', 'fBK6uhcRaW7FU566tgRB09JaVpmmEjUA9XM2DlztxU5ian4ApFEiNuhh8yUc', '2024-02-15 10:10:33', '2024-05-21 22:14:12', NULL, NULL, '57858278572', NULL, NULL, '3+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1707973852_user_image.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Niaz Ahmed Nayeem', '', '', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'good', '1', '19', 'Sonali Bank', '12345', '1234567890', 'Niaz Ahmed Nayeem', 'niaz.teacher@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, 'permanent', 0),
(285, NULL, NULL, 'medikao@1winstyle.ru', NULL, 1, 1, '$2y$12$qGaFvslpxw8TWpk3wrKmD.RXTf3kUJSlUVlcc4HHOw0.6ImNoR0LS', '86728171378', NULL, '06Q8ua3OO5st2C6N9TDeb9wFlt28uBlgXMaY8cO4W3tkq4NDg4TNYkcBzCYr', '2024-02-19 15:02:31', '2024-02-19 15:02:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, 0, 'medikalon', NULL, NULL, NULL, NULL, '4', '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(286, NULL, NULL, 'yzIQpo.htcqbwt@synaxarion.asia', NULL, 1, 1, '$2y$12$7u8srsVBFsIL8cOfD1xAf.Bl7wHceUimFcLiIpgDWdljU5APOO4Sy', '1', NULL, NULL, '2024-02-21 19:01:15', '2024-02-21 19:01:15', NULL, NULL, NULL, NULL, NULL, 'Nash Wiley', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Aliyah', NULL, NULL, NULL, 'Nash Wiley', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(287, NULL, NULL, 'typDaX.htcqctm@synaxarion.asia', NULL, 1, 1, '$2y$12$Z/IfwKYO3p3a76yoecmB.OsmqIH3nLUrmlfA5stbdIcHhz2AoI8QW', '1', NULL, NULL, '2024-02-21 19:01:27', '2024-02-21 19:01:27', NULL, NULL, NULL, NULL, NULL, 'Salvatore Poole', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Dior', NULL, NULL, NULL, 'Salvatore Poole', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(288, NULL, NULL, 'niaz@navieasoft.com', NULL, 7, 1, '$2y$12$ERET1bfRz3oQoMgSMqOZv.8g1HTz9KpHeYGSiqNSozT.ekK3qFtQW', '01966509310', 'Dhaka, Bangladesh', 'CJ1jGrElhmZO7LUmY0Pcox36AY0r8lNtrqnJMHqZRnIEyu5mo5ed7x9BTnwq', '2024-03-09 01:45:51', '2024-03-10 00:58:47', NULL, NULL, '57858278572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17796305271709970351_consultant_image.jpg', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, NULL, 0, 'Niaz Ahmed Nayeem', '', '', '<p>This is description. Thank you.</p>', NULL, NULL, '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0),
(290, NULL, NULL, 'shohag1234@gmail.com', NULL, 1, 1, '$2y$12$F0PQIJcZIceek83Sj4u/D.z0Nhh2tokQWJ0D1vu3ucoWV2VUs70AO', '01858509214', NULL, 'mj7u201KSWo2MY6y5k0I4MabM47lxXfTZs9f6KFjxIu3oG5qJ6Y2IQMhCkEq', '2024-05-13 04:41:57', '2024-05-13 04:41:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'shohag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(291, NULL, NULL, 'shohagnew@gmail.com', NULL, 1, 1, '$2y$12$f0C1l09zE8Wx9LOJFi3H.ej8QV0G4iwLmKuCHLE6rInr1GN3WfBLa', '01858509214', NULL, 'PSSEbELp1AJ8rAZtGC7E5JiAI0ivf3JONXvlQAOJOODEURXVBMi5Wr5uQSiS', '2024-05-20 02:47:18', '2024-05-30 04:51:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1717066285_user_image.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'shohag_new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(293, NULL, NULL, 'shohag098@gmail.com', NULL, 1, 1, '$2y$12$XViu6Cw2tDdKq4nFKvvhcOVRETxlNjrTSnnbI3LasZJK75C/3Oft.', '01858509214', NULL, NULL, '2024-05-20 22:39:19', '2024-05-20 22:39:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'shohag_ten', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(295, NULL, NULL, 'Kalam@gmail.com', NULL, 1, 1, '$2y$12$SN8umY1xI1PPTDdq6fhJyuNS./Zci9wGfeqVx6tNhi2fl8hTh6rge', '01858509214', NULL, NULL, '2024-05-22 23:43:16', '2024-05-22 23:43:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Kalam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(296, NULL, NULL, 'altap@gmail.com', NULL, 1, 1, '$2y$12$LMTx4lBBWG3lJqHWFwye6.b/VNaHDNVTYkbBrJCLkTnufc74nk6na', '01858509214', NULL, 'b35ybdIWZnJH9QI95coyY9v2NPViMK9rmKN5z6yiQf5BGSS3Gm6IV7vgL8Pv', '2024-05-23 00:53:19', '2024-05-23 00:53:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'ALtap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(297, NULL, NULL, 'hossen12@gmail.com', NULL, 1, 1, '$2y$12$eGhkszO7/wiZofvnzDLMLOIKgAD2vhH4M8cbKqAiY4wOTrw2/zP1C', '01858509214', NULL, '19GWJWu1TLQhxuKQX7Z6M777yZKuL9iPyzHlBVUnC3cxajumHZnk4gA8vOFa', '2024-05-25 02:55:40', '2024-05-25 02:55:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Hossen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(299, NULL, NULL, 'shohagfhfdfg@gmail.com', NULL, 1, 1, '$2y$12$re/E4ZLygRvkBCr499P2Hu0vEgojoA4aXQYIA2j/IiqdEFhCiuxnW', '01858509214', NULL, NULL, '2024-05-27 01:13:36', '2024-05-27 01:13:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'shohag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(300, NULL, NULL, 'hridafgbjhnfjy@gmail.com', NULL, 1, 1, '$2y$12$rGgkm75gRJ8t3dnJKukodO1ifwZdvCUf5m5kBUbO7sSHp5wPh57vy', '01858509214', NULL, NULL, '2024-05-27 02:21:41', '2024-05-27 02:21:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'shohag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(302, NULL, NULL, 'hridafgbjhgfhgfdnfjy@gmail.com', NULL, 1, 1, '$2y$12$jJOXVtmBs62GpI7BBvOXjed4hpN9XpH6ZDyYGTv24M7PGLEhohJKy', '01858509214', NULL, NULL, '2024-05-27 02:25:15', '2024-05-27 02:25:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'shohag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(303, NULL, NULL, 'Kalgfhdam@gmail.com', NULL, 1, 1, '$2y$12$nDQqP1l33lnYL1L8uUbcduSJTa.hkLnlVlzBiuT1lITVOYbludg4i', '01858509214', NULL, NULL, '2024-05-27 02:32:11', '2024-05-27 02:32:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'shohag_new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0),
(304, NULL, NULL, 'kalam2@gmail.com', NULL, 1, 1, '$2y$12$mGgE6Q0KM7AFGc4tw/hwluZFvoAy3Co9u/rWper6vg.zvwkmUBxmK', '01858509214', NULL, 'C3kZTFTVnpdOpGCvFbPAZ4B6KebLBHb4dNUIj3oaLlTQvsLsLHalqf1Oi0S4', '2024-06-01 02:43:11', '2024-06-01 02:43:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 'Kalam two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE IF NOT EXISTS `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_type` varchar(100) DEFAULT NULL,
  `user_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `event_id` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `name`, `mobile`, `email`, `type`, `organization`, `date`, `details`, `created_at`, `updated_at`, `contact_type`, `user_id`, `event_id`) VALUES
(1, 'Razib Ahmed', '01876509310', 'razib@gmail.com', 'student', 'Creative IT', '2023-12-20T01:33', 'This is the message....Thank you.', '2023-12-29 21:34:16', '2023-12-29 21:34:16', 'contact', NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'Nice event, I like it, Thanks for this event.', '2023-12-29 21:37:14', '2023-12-29 21:37:14', 'event', 174, 2),
(3, 'shohag', '01858509214', 'shohag@gmail.com', 'student', 'dfsgd', '2024-05-07T09:33', 'good', '2024-05-06 21:34:36', '2024-05-06 21:34:36', 'contact', NULL, NULL),
(4, 'shohag', '01858509214', 'shohag@gmail.com', 'instructor', 'dfsgd', '2024-05-14T09:35', 'good', '2024-05-06 21:35:29', '2024-05-06 21:35:29', 'contact', NULL, NULL),
(5, 'shohag', '01858509214', 'navieapc@gmail.com', 'instructor', 'dfsgd', '2024-05-15T09:38', 'good', '2024-05-06 21:38:15', '2024-05-06 21:38:15', 'contact', NULL, NULL),
(6, 'shohag', '01858509214', 'navieapc@gmail.com', 'instructor', 'dfsgd', '2024-05-15T09:38', 'good', '2024-05-06 21:41:12', '2024-05-06 21:41:12', 'contact', NULL, NULL),
(7, 'shohag', '01858509214', 'navieapc@gmail.com', 'instructor', 'dsfgs', '2024-05-07T09:47', 'good', '2024-05-06 21:47:53', '2024-05-06 21:47:53', 'contact', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `use_subscriptions`
--

CREATE TABLE IF NOT EXISTS `use_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `sub_total` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `use_subscriptions_order_number_unique` (`order_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_models`
--

CREATE TABLE IF NOT EXISTS `visitor_models` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `visit_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=685 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_models`
--

INSERT INTO `visitor_models` (`id`, `ip_address`, `visit_time`, `created_at`, `updated_at`) VALUES
(1, '::1', '2024-03-19 09:32:19am', '2024-03-19 03:32:19', '2024-03-19 03:32:19'),
(2, '::1', '2024-03-25 06:38:42am', '2024-03-25 00:38:42', '2024-03-25 00:38:42'),
(3, '::1', '2024-03-25 06:39:06am', '2024-03-25 00:39:06', '2024-03-25 00:39:06'),
(4, '::1', '2024-03-25 06:39:24am', '2024-03-25 00:39:24', '2024-03-25 00:39:24'),
(5, '::1', '2024-03-31 04:26:00am', '2024-03-30 22:26:00', '2024-03-30 22:26:00'),
(6, '::1', '2024-03-31 04:26:26am', '2024-03-30 22:26:26', '2024-03-30 22:26:26'),
(7, '::1', '2024-03-31 04:54:05am', '2024-03-30 22:54:05', '2024-03-30 22:54:05'),
(8, '::1', '2024-04-01 06:52:14am', '2024-04-01 00:52:14', '2024-04-01 00:52:14'),
(9, '::1', '2024-04-03 02:53:17am', '2024-04-02 20:53:17', '2024-04-02 20:53:17'),
(10, '::1', '2024-04-03 02:55:59am', '2024-04-02 20:55:59', '2024-04-02 20:55:59'),
(11, '::1', '2024-04-03 02:56:43am', '2024-04-02 20:56:43', '2024-04-02 20:56:43'),
(12, '::1', '2024-04-03 02:56:45am', '2024-04-02 20:56:45', '2024-04-02 20:56:45'),
(13, '::1', '2024-04-03 02:57:13am', '2024-04-02 20:57:13', '2024-04-02 20:57:13'),
(14, '::1', '2024-04-03 03:02:38am', '2024-04-02 21:02:38', '2024-04-02 21:02:38'),
(15, '::1', '2024-04-03 03:14:28am', '2024-04-02 21:14:28', '2024-04-02 21:14:28'),
(16, '::1', '2024-04-03 03:19:32am', '2024-04-02 21:19:32', '2024-04-02 21:19:32'),
(17, '::1', '2024-04-03 03:19:36am', '2024-04-02 21:19:36', '2024-04-02 21:19:36'),
(18, '::1', '2024-04-03 03:30:59am', '2024-04-02 21:30:59', '2024-04-02 21:30:59'),
(19, '::1', '2024-04-03 03:31:03am', '2024-04-02 21:31:03', '2024-04-02 21:31:03'),
(20, '::1', '2024-04-03 03:36:55am', '2024-04-02 21:36:55', '2024-04-02 21:36:55'),
(21, '::1', '2024-04-03 03:38:19am', '2024-04-02 21:38:19', '2024-04-02 21:38:19'),
(22, '::1', '2024-04-03 05:59:04am', '2024-04-02 23:59:05', '2024-04-02 23:59:05'),
(23, '::1', '2024-04-05 04:48:14am', '2024-04-04 22:48:14', '2024-04-04 22:48:14'),
(24, '::1', '2024-04-22 07:08:18am', '2024-04-22 01:08:18', '2024-04-22 01:08:18'),
(25, '::1', '2024-04-22 07:11:12am', '2024-04-22 01:11:12', '2024-04-22 01:11:12'),
(26, '::1', '2024-04-22 07:12:15am', '2024-04-22 01:12:15', '2024-04-22 01:12:15'),
(27, '::1', '2024-04-22 07:15:34am', '2024-04-22 01:15:34', '2024-04-22 01:15:34'),
(28, '::1', '2024-04-22 07:41:02am', '2024-04-22 01:41:02', '2024-04-22 01:41:02'),
(29, '::1', '2024-04-22 07:41:40am', '2024-04-22 01:41:40', '2024-04-22 01:41:40'),
(30, '::1', '2024-04-22 07:42:00am', '2024-04-22 01:42:00', '2024-04-22 01:42:00'),
(31, '::1', '2024-04-22 07:47:52am', '2024-04-22 01:47:52', '2024-04-22 01:47:52'),
(32, '::1', '2024-05-07 02:49:12am', '2024-05-06 20:49:12', '2024-05-06 20:49:12'),
(33, '::1', '2024-05-07 03:30:28am', '2024-05-06 21:30:28', '2024-05-06 21:30:28'),
(34, '::1', '2024-05-07 03:33:20am', '2024-05-06 21:33:20', '2024-05-06 21:33:20'),
(35, '::1', '2024-05-07 03:37:56am', '2024-05-06 21:37:56', '2024-05-06 21:37:56'),
(36, '::1', '2024-05-09 03:11:21am', '2024-05-08 21:11:21', '2024-05-08 21:11:21'),
(37, '::1', '2024-05-09 03:21:24am', '2024-05-08 21:21:24', '2024-05-08 21:21:24'),
(38, '::1', '2024-05-09 03:21:35am', '2024-05-08 21:21:35', '2024-05-08 21:21:35'),
(39, '::1', '2024-05-09 03:44:03am', '2024-05-08 21:44:03', '2024-05-08 21:44:03'),
(40, '::1', '2024-05-09 03:47:18am', '2024-05-08 21:47:18', '2024-05-08 21:47:18'),
(41, '::1', '2024-05-13 03:33:36am', '2024-05-12 21:33:36', '2024-05-12 21:33:36'),
(42, '::1', '2024-05-13 03:33:47am', '2024-05-12 21:33:47', '2024-05-12 21:33:47'),
(43, '::1', '2024-05-13 07:20:59am', '2024-05-13 01:20:59', '2024-05-13 01:20:59'),
(44, '::1', '2024-05-13 09:44:06am', '2024-05-13 03:44:06', '2024-05-13 03:44:06'),
(45, '::1', '2024-05-15 06:49:21am', '2024-05-15 00:49:22', '2024-05-15 00:49:22'),
(46, '::1', '2024-05-19 04:43:26am', '2024-05-18 22:43:26', '2024-05-18 22:43:26'),
(47, '::1', '2024-05-20 04:49:56am', '2024-05-19 22:49:56', '2024-05-19 22:49:56'),
(48, '::1', '2024-05-20 08:05:39am', '2024-05-20 02:05:39', '2024-05-20 02:05:39'),
(49, '::1', '2024-05-20 08:13:51am', '2024-05-20 02:13:51', '2024-05-20 02:13:51'),
(50, '::1', '2024-05-20 08:45:25am', '2024-05-20 02:45:25', '2024-05-20 02:45:25'),
(51, '::1', '2024-05-20 08:45:35am', '2024-05-20 02:45:35', '2024-05-20 02:45:35'),
(52, '::1', '2024-05-21 02:45:38am', '2024-05-20 20:45:38', '2024-05-20 20:45:38'),
(53, '::1', '2024-05-21 10:01:35am', '2024-05-21 04:01:35', '2024-05-21 04:01:35'),
(54, '::1', '2024-05-21 10:01:41am', '2024-05-21 04:01:41', '2024-05-21 04:01:41'),
(55, '::1', '2024-05-21 11:14:00am', '2024-05-21 05:14:00', '2024-05-21 05:14:00'),
(56, '::1', '2024-05-22 02:53:29am', '2024-05-21 20:53:29', '2024-05-21 20:53:29'),
(57, '::1', '2024-05-22 02:53:34am', '2024-05-21 20:53:34', '2024-05-21 20:53:34'),
(58, '::1', '2024-05-22 05:35:30am', '2024-05-21 23:35:30', '2024-05-21 23:35:30'),
(59, '::1', '2024-05-22 05:36:11am', '2024-05-21 23:36:11', '2024-05-21 23:36:11'),
(60, '::1', '2024-05-22 05:36:30am', '2024-05-21 23:36:30', '2024-05-21 23:36:30'),
(61, '::1', '2024-05-22 05:37:57am', '2024-05-21 23:37:57', '2024-05-21 23:37:57'),
(62, '::1', '2024-05-22 05:38:34am', '2024-05-21 23:38:34', '2024-05-21 23:38:34'),
(63, '::1', '2024-05-22 05:40:19am', '2024-05-21 23:40:19', '2024-05-21 23:40:19'),
(64, '::1', '2024-05-22 06:49:04am', '2024-05-22 00:49:04', '2024-05-22 00:49:04'),
(65, '::1', '2024-05-22 06:49:39am', '2024-05-22 00:49:39', '2024-05-22 00:49:39'),
(66, '::1', '2024-05-22 06:54:09am', '2024-05-22 00:54:09', '2024-05-22 00:54:09'),
(67, '::1', '2024-05-22 06:54:37am', '2024-05-22 00:54:37', '2024-05-22 00:54:37'),
(68, '::1', '2024-05-22 07:07:35am', '2024-05-22 01:07:35', '2024-05-22 01:07:35'),
(69, '::1', '2024-05-22 07:31:19am', '2024-05-22 01:31:19', '2024-05-22 01:31:19'),
(70, '::1', '2024-05-22 09:26:21am', '2024-05-22 03:26:21', '2024-05-22 03:26:21'),
(71, '::1', '2024-05-22 09:51:03am', '2024-05-22 03:51:03', '2024-05-22 03:51:03'),
(72, '::1', '2024-05-22 10:42:35am', '2024-05-22 04:42:35', '2024-05-22 04:42:35'),
(73, '::1', '2024-05-23 02:55:33am', '2024-05-22 20:55:33', '2024-05-22 20:55:33'),
(74, '::1', '2024-05-23 02:55:36am', '2024-05-22 20:55:36', '2024-05-22 20:55:36'),
(75, '::1', '2024-05-23 02:58:15am', '2024-05-22 20:58:15', '2024-05-22 20:58:15'),
(76, '::1', '2024-05-23 03:03:55am', '2024-05-22 21:03:55', '2024-05-22 21:03:55'),
(77, '::1', '2024-05-23 03:07:53am', '2024-05-22 21:07:53', '2024-05-22 21:07:53'),
(78, '::1', '2024-05-23 03:08:43am', '2024-05-22 21:08:43', '2024-05-22 21:08:43'),
(79, '::1', '2024-05-23 03:09:28am', '2024-05-22 21:09:28', '2024-05-22 21:09:28'),
(80, '::1', '2024-05-23 03:10:05am', '2024-05-22 21:10:05', '2024-05-22 21:10:05'),
(81, '::1', '2024-05-23 06:34:15am', '2024-05-23 00:34:15', '2024-05-23 00:34:15'),
(82, '::1', '2024-05-23 06:34:39am', '2024-05-23 00:34:39', '2024-05-23 00:34:39'),
(83, '::1', '2024-05-23 08:36:46am', '2024-05-23 02:36:46', '2024-05-23 02:36:46'),
(84, '::1', '2024-05-23 08:53:32am', '2024-05-23 02:53:32', '2024-05-23 02:53:32'),
(85, '::1', '2024-05-23 08:54:22am', '2024-05-23 02:54:22', '2024-05-23 02:54:22'),
(86, '::1', '2024-05-23 08:55:31am', '2024-05-23 02:55:31', '2024-05-23 02:55:31'),
(87, '::1', '2024-05-23 08:56:05am', '2024-05-23 02:56:05', '2024-05-23 02:56:05'),
(88, '::1', '2024-05-23 08:56:36am', '2024-05-23 02:56:36', '2024-05-23 02:56:36'),
(89, '::1', '2024-05-23 08:57:47am', '2024-05-23 02:57:47', '2024-05-23 02:57:47'),
(90, '::1', '2024-05-23 08:58:19am', '2024-05-23 02:58:19', '2024-05-23 02:58:19'),
(91, '::1', '2024-05-23 08:58:38am', '2024-05-23 02:58:38', '2024-05-23 02:58:38'),
(92, '::1', '2024-05-23 08:58:51am', '2024-05-23 02:58:51', '2024-05-23 02:58:51'),
(93, '::1', '2024-05-23 08:59:10am', '2024-05-23 02:59:10', '2024-05-23 02:59:10'),
(94, '::1', '2024-05-23 08:59:25am', '2024-05-23 02:59:25', '2024-05-23 02:59:25'),
(95, '::1', '2024-05-23 08:59:41am', '2024-05-23 02:59:41', '2024-05-23 02:59:41'),
(96, '::1', '2024-05-23 08:59:53am', '2024-05-23 02:59:53', '2024-05-23 02:59:53'),
(97, '::1', '2024-05-23 09:00:20am', '2024-05-23 03:00:20', '2024-05-23 03:00:20'),
(98, '::1', '2024-05-23 09:06:49am', '2024-05-23 03:06:49', '2024-05-23 03:06:49'),
(99, '::1', '2024-05-23 09:08:17am', '2024-05-23 03:08:17', '2024-05-23 03:08:17'),
(100, '::1', '2024-05-23 09:12:12am', '2024-05-23 03:12:12', '2024-05-23 03:12:12'),
(101, '::1', '2024-05-23 09:23:52am', '2024-05-23 03:23:52', '2024-05-23 03:23:52'),
(102, '::1', '2024-05-23 09:31:05am', '2024-05-23 03:31:05', '2024-05-23 03:31:05'),
(103, '::1', '2024-05-23 09:38:02am', '2024-05-23 03:38:02', '2024-05-23 03:38:02'),
(104, '::1', '2024-05-23 10:40:59am', '2024-05-23 04:40:59', '2024-05-23 04:40:59'),
(105, '::1', '2024-05-23 10:43:12am', '2024-05-23 04:43:12', '2024-05-23 04:43:12'),
(106, '::1', '2024-05-23 10:48:32am', '2024-05-23 04:48:32', '2024-05-23 04:48:32'),
(107, '::1', '2024-05-23 10:50:49am', '2024-05-23 04:50:49', '2024-05-23 04:50:49'),
(108, '::1', '2024-05-23 11:25:29am', '2024-05-23 05:25:29', '2024-05-23 05:25:29'),
(109, '::1', '2024-05-23 11:32:07am', '2024-05-23 05:32:07', '2024-05-23 05:32:07'),
(110, '::1', '2024-05-23 11:32:28am', '2024-05-23 05:32:28', '2024-05-23 05:32:28'),
(111, '::1', '2024-05-23 11:35:06am', '2024-05-23 05:35:06', '2024-05-23 05:35:06'),
(112, '::1', '2024-05-23 11:35:47am', '2024-05-23 05:35:47', '2024-05-23 05:35:47'),
(113, '::1', '2024-05-23 11:44:21am', '2024-05-23 05:44:21', '2024-05-23 05:44:21'),
(114, '::1', '2024-05-23 11:45:37am', '2024-05-23 05:45:37', '2024-05-23 05:45:37'),
(115, '::1', '2024-05-23 11:55:25am', '2024-05-23 05:55:25', '2024-05-23 05:55:25'),
(116, '::1', '2024-05-23 11:55:41am', '2024-05-23 05:55:41', '2024-05-23 05:55:41'),
(117, '::1', '2024-05-25 02:45:06am', '2024-05-24 20:45:06', '2024-05-24 20:45:06'),
(118, '::1', '2024-05-25 02:54:12am', '2024-05-24 20:54:12', '2024-05-24 20:54:12'),
(119, '::1', '2024-05-25 02:59:14am', '2024-05-24 20:59:14', '2024-05-24 20:59:14'),
(120, '::1', '2024-05-25 04:47:28am', '2024-05-24 22:47:28', '2024-05-24 22:47:28'),
(121, '::1', '2024-05-25 04:53:52am', '2024-05-24 22:53:52', '2024-05-24 22:53:52'),
(122, '::1', '2024-05-25 04:54:58am', '2024-05-24 22:54:58', '2024-05-24 22:54:58'),
(123, '::1', '2024-05-25 04:56:23am', '2024-05-24 22:56:23', '2024-05-24 22:56:23'),
(124, '::1', '2024-05-25 05:00:39am', '2024-05-24 23:00:39', '2024-05-24 23:00:39'),
(125, '::1', '2024-05-25 05:01:52am', '2024-05-24 23:01:52', '2024-05-24 23:01:52'),
(126, '::1', '2024-05-25 05:02:30am', '2024-05-24 23:02:30', '2024-05-24 23:02:30'),
(127, '::1', '2024-05-25 05:03:52am', '2024-05-24 23:03:52', '2024-05-24 23:03:52'),
(128, '::1', '2024-05-25 05:14:39am', '2024-05-24 23:14:39', '2024-05-24 23:14:39'),
(129, '::1', '2024-05-25 05:23:01am', '2024-05-24 23:23:01', '2024-05-24 23:23:01'),
(130, '::1', '2024-05-25 05:24:59am', '2024-05-24 23:24:59', '2024-05-24 23:24:59'),
(131, '::1', '2024-05-25 05:50:17am', '2024-05-24 23:50:17', '2024-05-24 23:50:17'),
(132, '::1', '2024-05-25 05:50:34am', '2024-05-24 23:50:34', '2024-05-24 23:50:34'),
(133, '::1', '2024-05-25 05:52:19am', '2024-05-24 23:52:19', '2024-05-24 23:52:19'),
(134, '::1', '2024-05-25 05:55:39am', '2024-05-24 23:55:39', '2024-05-24 23:55:39'),
(135, '::1', '2024-05-25 05:56:15am', '2024-05-24 23:56:15', '2024-05-24 23:56:15'),
(136, '::1', '2024-05-25 05:57:20am', '2024-05-24 23:57:20', '2024-05-24 23:57:20'),
(137, '::1', '2024-05-25 05:58:13am', '2024-05-24 23:58:13', '2024-05-24 23:58:13'),
(138, '::1', '2024-05-25 06:14:42am', '2024-05-25 00:14:42', '2024-05-25 00:14:42'),
(139, '::1', '2024-05-25 06:17:18am', '2024-05-25 00:17:18', '2024-05-25 00:17:18'),
(140, '::1', '2024-05-25 06:17:34am', '2024-05-25 00:17:34', '2024-05-25 00:17:34'),
(141, '::1', '2024-05-25 06:19:55am', '2024-05-25 00:19:55', '2024-05-25 00:19:55'),
(142, '::1', '2024-05-25 06:25:20am', '2024-05-25 00:25:20', '2024-05-25 00:25:20'),
(143, '::1', '2024-05-25 06:26:58am', '2024-05-25 00:26:58', '2024-05-25 00:26:58'),
(144, '::1', '2024-05-25 06:30:34am', '2024-05-25 00:30:34', '2024-05-25 00:30:34'),
(145, '::1', '2024-05-25 06:36:27am', '2024-05-25 00:36:27', '2024-05-25 00:36:27'),
(146, '::1', '2024-05-25 06:36:33am', '2024-05-25 00:36:33', '2024-05-25 00:36:33'),
(147, '::1', '2024-05-25 06:37:19am', '2024-05-25 00:37:19', '2024-05-25 00:37:19'),
(148, '::1', '2024-05-25 06:49:54am', '2024-05-25 00:49:54', '2024-05-25 00:49:54'),
(149, '::1', '2024-05-25 06:54:48am', '2024-05-25 00:54:48', '2024-05-25 00:54:48'),
(150, '::1', '2024-05-25 06:57:18am', '2024-05-25 00:57:18', '2024-05-25 00:57:18'),
(151, '::1', '2024-05-25 06:58:58am', '2024-05-25 00:58:58', '2024-05-25 00:58:58'),
(152, '::1', '2024-05-25 07:00:24am', '2024-05-25 01:00:24', '2024-05-25 01:00:24'),
(153, '::1', '2024-05-25 07:03:04am', '2024-05-25 01:03:04', '2024-05-25 01:03:04'),
(154, '::1', '2024-05-25 07:06:57am', '2024-05-25 01:06:57', '2024-05-25 01:06:57'),
(155, '::1', '2024-05-25 07:14:04am', '2024-05-25 01:14:04', '2024-05-25 01:14:04'),
(156, '::1', '2024-05-25 07:16:34am', '2024-05-25 01:16:34', '2024-05-25 01:16:34'),
(157, '::1', '2024-05-25 08:45:45am', '2024-05-25 02:45:45', '2024-05-25 02:45:45'),
(158, '::1', '2024-05-25 08:46:39am', '2024-05-25 02:46:39', '2024-05-25 02:46:39'),
(159, '::1', '2024-05-25 08:56:00am', '2024-05-25 02:56:00', '2024-05-25 02:56:00'),
(160, '::1', '2024-05-25 09:16:50am', '2024-05-25 03:16:50', '2024-05-25 03:16:50'),
(161, '::1', '2024-05-26 02:49:47am', '2024-05-25 20:49:47', '2024-05-25 20:49:47'),
(162, '::1', '2024-05-26 02:58:57am', '2024-05-25 20:58:57', '2024-05-25 20:58:57'),
(163, '::1', '2024-05-26 03:01:05am', '2024-05-25 21:01:05', '2024-05-25 21:01:05'),
(164, '::1', '2024-05-26 03:01:16am', '2024-05-25 21:01:16', '2024-05-25 21:01:16'),
(165, '::1', '2024-05-26 03:01:35am', '2024-05-25 21:01:35', '2024-05-25 21:01:35'),
(166, '::1', '2024-05-26 03:25:30am', '2024-05-25 21:25:30', '2024-05-25 21:25:30'),
(167, '::1', '2024-05-26 03:25:38am', '2024-05-25 21:25:38', '2024-05-25 21:25:38'),
(168, '::1', '2024-05-26 03:29:58am', '2024-05-25 21:29:58', '2024-05-25 21:29:58'),
(169, '::1', '2024-05-26 04:26:28am', '2024-05-25 22:26:28', '2024-05-25 22:26:28'),
(170, '::1', '2024-05-26 04:42:06am', '2024-05-25 22:42:06', '2024-05-25 22:42:06'),
(171, '::1', '2024-05-26 05:06:46am', '2024-05-25 23:06:46', '2024-05-25 23:06:46'),
(172, '::1', '2024-05-26 05:08:47am', '2024-05-25 23:08:47', '2024-05-25 23:08:47'),
(173, '::1', '2024-05-26 05:13:55am', '2024-05-25 23:13:55', '2024-05-25 23:13:55'),
(174, '::1', '2024-05-26 05:57:29am', '2024-05-25 23:57:29', '2024-05-25 23:57:29'),
(175, '::1', '2024-05-26 06:20:56am', '2024-05-26 00:20:56', '2024-05-26 00:20:56'),
(176, '::1', '2024-05-26 06:22:05am', '2024-05-26 00:22:05', '2024-05-26 00:22:05'),
(177, '::1', '2024-05-26 06:25:06am', '2024-05-26 00:25:06', '2024-05-26 00:25:06'),
(178, '::1', '2024-05-26 06:26:41am', '2024-05-26 00:26:41', '2024-05-26 00:26:41'),
(179, '::1', '2024-05-26 06:27:14am', '2024-05-26 00:27:14', '2024-05-26 00:27:14'),
(180, '::1', '2024-05-26 06:30:27am', '2024-05-26 00:30:27', '2024-05-26 00:30:27'),
(181, '::1', '2024-05-26 06:35:06am', '2024-05-26 00:35:06', '2024-05-26 00:35:06'),
(182, '::1', '2024-05-26 07:06:39am', '2024-05-26 01:06:39', '2024-05-26 01:06:39'),
(183, '::1', '2024-05-26 07:06:59am', '2024-05-26 01:06:59', '2024-05-26 01:06:59'),
(184, '::1', '2024-05-26 07:48:30am', '2024-05-26 01:48:30', '2024-05-26 01:48:30'),
(185, '::1', '2024-05-26 08:11:43am', '2024-05-26 02:11:43', '2024-05-26 02:11:43'),
(186, '::1', '2024-05-26 08:27:27am', '2024-05-26 02:27:27', '2024-05-26 02:27:27'),
(187, '::1', '2024-05-26 09:09:44am', '2024-05-26 03:09:44', '2024-05-26 03:09:44'),
(188, '::1', '2024-05-26 09:23:36am', '2024-05-26 03:23:36', '2024-05-26 03:23:36'),
(189, '::1', '2024-05-26 09:25:45am', '2024-05-26 03:25:45', '2024-05-26 03:25:45'),
(190, '::1', '2024-05-26 10:09:14am', '2024-05-26 04:09:14', '2024-05-26 04:09:14'),
(191, '::1', '2024-05-26 10:13:34am', '2024-05-26 04:13:34', '2024-05-26 04:13:34'),
(192, '::1', '2024-05-26 10:18:02am', '2024-05-26 04:18:02', '2024-05-26 04:18:02'),
(193, '::1', '2024-05-26 10:22:11am', '2024-05-26 04:22:11', '2024-05-26 04:22:11'),
(194, '::1', '2024-05-26 10:22:56am', '2024-05-26 04:22:56', '2024-05-26 04:22:56'),
(195, '::1', '2024-05-26 10:27:00am', '2024-05-26 04:27:00', '2024-05-26 04:27:00'),
(196, '::1', '2024-05-26 10:27:28am', '2024-05-26 04:27:28', '2024-05-26 04:27:28'),
(197, '::1', '2024-05-26 10:28:16am', '2024-05-26 04:28:16', '2024-05-26 04:28:16'),
(198, '::1', '2024-05-26 10:28:19am', '2024-05-26 04:28:19', '2024-05-26 04:28:19'),
(199, '::1', '2024-05-26 10:37:08am', '2024-05-26 04:37:08', '2024-05-26 04:37:08'),
(200, '::1', '2024-05-26 10:37:14am', '2024-05-26 04:37:14', '2024-05-26 04:37:14'),
(201, '::1', '2024-05-26 10:38:14am', '2024-05-26 04:38:14', '2024-05-26 04:38:14'),
(202, '::1', '2024-05-26 10:38:29am', '2024-05-26 04:38:29', '2024-05-26 04:38:29'),
(203, '::1', '2024-05-26 10:41:36am', '2024-05-26 04:41:36', '2024-05-26 04:41:36'),
(204, '::1', '2024-05-26 10:44:03am', '2024-05-26 04:44:03', '2024-05-26 04:44:03'),
(205, '::1', '2024-05-26 10:46:49am', '2024-05-26 04:46:49', '2024-05-26 04:46:49'),
(206, '::1', '2024-05-26 10:50:27am', '2024-05-26 04:50:27', '2024-05-26 04:50:27'),
(207, '::1', '2024-05-26 10:50:44am', '2024-05-26 04:50:44', '2024-05-26 04:50:44'),
(208, '::1', '2024-05-26 10:54:48am', '2024-05-26 04:54:48', '2024-05-26 04:54:48'),
(209, '::1', '2024-05-26 11:12:33am', '2024-05-26 05:12:33', '2024-05-26 05:12:33'),
(210, '::1', '2024-05-26 11:13:14am', '2024-05-26 05:13:14', '2024-05-26 05:13:14'),
(211, '::1', '2024-05-26 12:01:33pm', '2024-05-26 06:01:33', '2024-05-26 06:01:33'),
(212, '::1', '2024-05-26 12:02:16pm', '2024-05-26 06:02:16', '2024-05-26 06:02:16'),
(213, '::1', '2024-05-26 12:08:17pm', '2024-05-26 06:08:17', '2024-05-26 06:08:17'),
(214, '::1', '2024-05-26 12:08:57pm', '2024-05-26 06:08:57', '2024-05-26 06:08:57'),
(215, '::1', '2024-05-26 12:09:13pm', '2024-05-26 06:09:13', '2024-05-26 06:09:13'),
(216, '::1', '2024-05-26 12:13:19pm', '2024-05-26 06:13:19', '2024-05-26 06:13:19'),
(217, '::1', '2024-05-26 12:14:03pm', '2024-05-26 06:14:03', '2024-05-26 06:14:03'),
(218, '::1', '2024-05-26 12:15:15pm', '2024-05-26 06:15:15', '2024-05-26 06:15:15'),
(219, '::1', '2024-05-26 12:20:52pm', '2024-05-26 06:20:52', '2024-05-26 06:20:52'),
(220, '::1', '2024-05-27 03:08:03am', '2024-05-26 21:08:03', '2024-05-26 21:08:03'),
(221, '::1', '2024-05-27 07:12:18am', '2024-05-27 01:12:18', '2024-05-27 01:12:18'),
(222, '::1', '2024-05-27 07:46:55am', '2024-05-27 01:46:55', '2024-05-27 01:46:55'),
(223, '::1', '2024-05-27 09:40:28am', '2024-05-27 03:40:28', '2024-05-27 03:40:28'),
(224, '::1', '2024-05-28 02:56:28am', '2024-05-27 20:56:28', '2024-05-27 20:56:28'),
(225, '::1', '2024-05-28 02:56:33am', '2024-05-27 20:56:33', '2024-05-27 20:56:33'),
(226, '::1', '2024-05-29 02:48:21am', '2024-05-28 20:48:21', '2024-05-28 20:48:21'),
(227, '::1', '2024-05-29 03:47:25am', '2024-05-28 21:47:25', '2024-05-28 21:47:25'),
(228, '::1', '2024-05-29 04:42:29am', '2024-05-28 22:42:29', '2024-05-28 22:42:29'),
(229, '::1', '2024-05-29 04:46:33am', '2024-05-28 22:46:33', '2024-05-28 22:46:33'),
(230, '::1', '2024-05-29 04:49:36am', '2024-05-28 22:49:36', '2024-05-28 22:49:36'),
(231, '::1', '2024-05-29 05:14:52am', '2024-05-28 23:14:52', '2024-05-28 23:14:52'),
(232, '::1', '2024-05-29 05:14:56am', '2024-05-28 23:14:56', '2024-05-28 23:14:56'),
(233, '::1', '2024-05-29 05:17:26am', '2024-05-28 23:17:26', '2024-05-28 23:17:26'),
(234, '::1', '2024-05-29 05:26:24am', '2024-05-28 23:26:24', '2024-05-28 23:26:24'),
(235, '::1', '2024-05-29 05:27:00am', '2024-05-28 23:27:00', '2024-05-28 23:27:00'),
(236, '::1', '2024-05-29 05:27:38am', '2024-05-28 23:27:38', '2024-05-28 23:27:38'),
(237, '::1', '2024-05-29 05:30:01am', '2024-05-28 23:30:01', '2024-05-28 23:30:01'),
(238, '::1', '2024-05-29 05:30:32am', '2024-05-28 23:30:32', '2024-05-28 23:30:32'),
(239, '::1', '2024-05-29 05:30:44am', '2024-05-28 23:30:44', '2024-05-28 23:30:44'),
(240, '::1', '2024-05-29 05:31:22am', '2024-05-28 23:31:22', '2024-05-28 23:31:22'),
(241, '::1', '2024-05-29 05:31:38am', '2024-05-28 23:31:38', '2024-05-28 23:31:38'),
(242, '::1', '2024-05-29 05:31:51am', '2024-05-28 23:31:51', '2024-05-28 23:31:51'),
(243, '::1', '2024-05-29 05:32:02am', '2024-05-28 23:32:02', '2024-05-28 23:32:02'),
(244, '::1', '2024-05-29 05:32:12am', '2024-05-28 23:32:12', '2024-05-28 23:32:12'),
(245, '::1', '2024-05-29 05:32:35am', '2024-05-28 23:32:35', '2024-05-28 23:32:35'),
(246, '::1', '2024-05-29 05:36:42am', '2024-05-28 23:36:42', '2024-05-28 23:36:42'),
(247, '::1', '2024-05-29 05:44:58am', '2024-05-28 23:44:58', '2024-05-28 23:44:58'),
(248, '::1', '2024-05-29 05:51:26am', '2024-05-28 23:51:26', '2024-05-28 23:51:26'),
(249, '::1', '2024-05-29 05:58:20am', '2024-05-28 23:58:20', '2024-05-28 23:58:20'),
(250, '::1', '2024-05-29 05:58:38am', '2024-05-28 23:58:38', '2024-05-28 23:58:38'),
(251, '::1', '2024-05-29 05:59:42am', '2024-05-28 23:59:42', '2024-05-28 23:59:42'),
(252, '::1', '2024-05-29 06:07:56am', '2024-05-29 00:07:56', '2024-05-29 00:07:56'),
(253, '::1', '2024-05-29 06:08:39am', '2024-05-29 00:08:39', '2024-05-29 00:08:39'),
(254, '::1', '2024-05-29 06:10:14am', '2024-05-29 00:10:14', '2024-05-29 00:10:14'),
(255, '::1', '2024-05-29 06:14:41am', '2024-05-29 00:14:41', '2024-05-29 00:14:41'),
(256, '::1', '2024-05-29 06:16:12am', '2024-05-29 00:16:12', '2024-05-29 00:16:12'),
(257, '::1', '2024-05-29 06:16:41am', '2024-05-29 00:16:41', '2024-05-29 00:16:41'),
(258, '::1', '2024-05-29 06:17:56am', '2024-05-29 00:17:56', '2024-05-29 00:17:56'),
(259, '::1', '2024-05-29 06:18:45am', '2024-05-29 00:18:45', '2024-05-29 00:18:45'),
(260, '::1', '2024-05-29 06:20:23am', '2024-05-29 00:20:23', '2024-05-29 00:20:23'),
(261, '::1', '2024-05-29 06:21:05am', '2024-05-29 00:21:05', '2024-05-29 00:21:05'),
(262, '::1', '2024-05-29 06:21:33am', '2024-05-29 00:21:33', '2024-05-29 00:21:33'),
(263, '::1', '2024-05-29 06:21:56am', '2024-05-29 00:21:56', '2024-05-29 00:21:56'),
(264, '::1', '2024-05-29 06:22:40am', '2024-05-29 00:22:40', '2024-05-29 00:22:40'),
(265, '::1', '2024-05-29 06:22:47am', '2024-05-29 00:22:47', '2024-05-29 00:22:47'),
(266, '::1', '2024-05-29 06:23:16am', '2024-05-29 00:23:16', '2024-05-29 00:23:16'),
(267, '::1', '2024-05-29 06:24:27am', '2024-05-29 00:24:27', '2024-05-29 00:24:27'),
(268, '::1', '2024-05-29 06:25:23am', '2024-05-29 00:25:23', '2024-05-29 00:25:23'),
(269, '::1', '2024-05-29 06:26:04am', '2024-05-29 00:26:04', '2024-05-29 00:26:04'),
(270, '::1', '2024-05-29 06:27:06am', '2024-05-29 00:27:06', '2024-05-29 00:27:06'),
(271, '::1', '2024-05-29 06:28:51am', '2024-05-29 00:28:51', '2024-05-29 00:28:51'),
(272, '::1', '2024-05-29 06:29:47am', '2024-05-29 00:29:47', '2024-05-29 00:29:47'),
(273, '::1', '2024-05-29 06:30:13am', '2024-05-29 00:30:13', '2024-05-29 00:30:13'),
(274, '::1', '2024-05-29 06:30:40am', '2024-05-29 00:30:40', '2024-05-29 00:30:40'),
(275, '::1', '2024-05-29 06:30:59am', '2024-05-29 00:30:59', '2024-05-29 00:30:59'),
(276, '::1', '2024-05-29 06:31:14am', '2024-05-29 00:31:14', '2024-05-29 00:31:14'),
(277, '::1', '2024-05-29 06:31:29am', '2024-05-29 00:31:29', '2024-05-29 00:31:29'),
(278, '::1', '2024-05-29 06:31:43am', '2024-05-29 00:31:43', '2024-05-29 00:31:43'),
(279, '::1', '2024-05-29 06:32:33am', '2024-05-29 00:32:33', '2024-05-29 00:32:33'),
(280, '::1', '2024-05-29 06:33:18am', '2024-05-29 00:33:18', '2024-05-29 00:33:18'),
(281, '::1', '2024-05-29 06:33:41am', '2024-05-29 00:33:41', '2024-05-29 00:33:41'),
(282, '::1', '2024-05-29 06:35:46am', '2024-05-29 00:35:46', '2024-05-29 00:35:46'),
(283, '::1', '2024-05-29 06:36:51am', '2024-05-29 00:36:51', '2024-05-29 00:36:51'),
(284, '::1', '2024-05-29 06:37:06am', '2024-05-29 00:37:06', '2024-05-29 00:37:06'),
(285, '::1', '2024-05-29 06:37:41am', '2024-05-29 00:37:41', '2024-05-29 00:37:41'),
(286, '::1', '2024-05-29 06:38:20am', '2024-05-29 00:38:20', '2024-05-29 00:38:20'),
(287, '::1', '2024-05-29 06:39:23am', '2024-05-29 00:39:23', '2024-05-29 00:39:23'),
(288, '::1', '2024-05-29 06:39:47am', '2024-05-29 00:39:47', '2024-05-29 00:39:47'),
(289, '::1', '2024-05-29 06:40:22am', '2024-05-29 00:40:22', '2024-05-29 00:40:22'),
(290, '::1', '2024-05-29 06:40:47am', '2024-05-29 00:40:47', '2024-05-29 00:40:47'),
(291, '::1', '2024-05-29 06:41:11am', '2024-05-29 00:41:11', '2024-05-29 00:41:11'),
(292, '::1', '2024-05-29 06:41:29am', '2024-05-29 00:41:29', '2024-05-29 00:41:29'),
(293, '::1', '2024-05-29 06:41:39am', '2024-05-29 00:41:39', '2024-05-29 00:41:39'),
(294, '::1', '2024-05-29 06:42:15am', '2024-05-29 00:42:15', '2024-05-29 00:42:15'),
(295, '::1', '2024-05-29 06:47:42am', '2024-05-29 00:47:42', '2024-05-29 00:47:42'),
(296, '::1', '2024-05-29 06:48:26am', '2024-05-29 00:48:26', '2024-05-29 00:48:26'),
(297, '::1', '2024-05-29 06:51:09am', '2024-05-29 00:51:09', '2024-05-29 00:51:09'),
(298, '::1', '2024-05-29 06:52:00am', '2024-05-29 00:52:00', '2024-05-29 00:52:00'),
(299, '::1', '2024-05-29 06:53:16am', '2024-05-29 00:53:16', '2024-05-29 00:53:16'),
(300, '::1', '2024-05-29 06:54:46am', '2024-05-29 00:54:46', '2024-05-29 00:54:46'),
(301, '::1', '2024-05-29 07:03:01am', '2024-05-29 01:03:01', '2024-05-29 01:03:01'),
(302, '::1', '2024-05-29 07:03:10am', '2024-05-29 01:03:10', '2024-05-29 01:03:10'),
(303, '::1', '2024-05-29 07:03:18am', '2024-05-29 01:03:18', '2024-05-29 01:03:18'),
(304, '::1', '2024-05-29 07:04:44am', '2024-05-29 01:04:44', '2024-05-29 01:04:44'),
(305, '::1', '2024-05-29 07:06:31am', '2024-05-29 01:06:31', '2024-05-29 01:06:31'),
(306, '::1', '2024-05-29 07:13:38am', '2024-05-29 01:13:38', '2024-05-29 01:13:38'),
(307, '::1', '2024-05-29 07:15:35am', '2024-05-29 01:15:35', '2024-05-29 01:15:35'),
(308, '::1', '2024-05-29 07:16:30am', '2024-05-29 01:16:30', '2024-05-29 01:16:30'),
(309, '::1', '2024-05-29 07:18:17am', '2024-05-29 01:18:17', '2024-05-29 01:18:17'),
(310, '::1', '2024-05-29 07:18:51am', '2024-05-29 01:18:51', '2024-05-29 01:18:51'),
(311, '::1', '2024-05-29 07:20:06am', '2024-05-29 01:20:06', '2024-05-29 01:20:06'),
(312, '::1', '2024-05-29 07:21:42am', '2024-05-29 01:21:42', '2024-05-29 01:21:42'),
(313, '::1', '2024-05-29 07:28:52am', '2024-05-29 01:28:52', '2024-05-29 01:28:52'),
(314, '::1', '2024-05-29 07:31:12am', '2024-05-29 01:31:12', '2024-05-29 01:31:12'),
(315, '::1', '2024-05-29 07:37:39am', '2024-05-29 01:37:39', '2024-05-29 01:37:39'),
(316, '::1', '2024-05-29 08:04:26am', '2024-05-29 02:04:26', '2024-05-29 02:04:26'),
(317, '::1', '2024-05-29 08:42:01am', '2024-05-29 02:42:01', '2024-05-29 02:42:01'),
(318, '::1', '2024-05-29 11:54:04am', '2024-05-29 05:54:04', '2024-05-29 05:54:04'),
(319, '::1', '2024-05-29 11:59:42am', '2024-05-29 05:59:42', '2024-05-29 05:59:42'),
(320, '::1', '2024-05-30 02:55:23am', '2024-05-29 20:55:23', '2024-05-29 20:55:23'),
(321, '::1', '2024-05-30 02:55:26am', '2024-05-29 20:55:26', '2024-05-29 20:55:26'),
(322, '::1', '2024-05-30 07:24:55am', '2024-05-30 01:24:55', '2024-05-30 01:24:55'),
(323, '::1', '2024-05-30 09:58:49am', '2024-05-30 03:58:49', '2024-05-30 03:58:49'),
(324, '::1', '2024-05-30 09:59:28am', '2024-05-30 03:59:28', '2024-05-30 03:59:28'),
(325, '::1', '2024-05-30 11:29:07am', '2024-05-30 05:29:07', '2024-05-30 05:29:07'),
(326, '::1', '2024-06-01 02:49:23am', '2024-05-31 20:49:23', '2024-05-31 20:49:23'),
(327, '::1', '2024-06-01 06:24:30am', '2024-06-01 00:24:30', '2024-06-01 00:24:30'),
(328, '::1', '2024-06-01 06:24:38am', '2024-06-01 00:24:38', '2024-06-01 00:24:38'),
(329, '::1', '2024-06-01 06:31:38am', '2024-06-01 00:31:38', '2024-06-01 00:31:38'),
(330, '::1', '2024-06-01 06:32:07am', '2024-06-01 00:32:07', '2024-06-01 00:32:07'),
(331, '::1', '2024-06-01 06:32:12am', '2024-06-01 00:32:12', '2024-06-01 00:32:12'),
(332, '::1', '2024-06-01 06:35:10am', '2024-06-01 00:35:10', '2024-06-01 00:35:10'),
(333, '::1', '2024-06-01 06:35:28am', '2024-06-01 00:35:28', '2024-06-01 00:35:28'),
(334, '::1', '2024-06-01 06:37:45am', '2024-06-01 00:37:45', '2024-06-01 00:37:45'),
(335, '::1', '2024-06-01 06:37:49am', '2024-06-01 00:37:49', '2024-06-01 00:37:49'),
(336, '::1', '2024-06-01 06:42:40am', '2024-06-01 00:42:40', '2024-06-01 00:42:40'),
(337, '::1', '2024-06-01 06:45:11am', '2024-06-01 00:45:11', '2024-06-01 00:45:11'),
(338, '::1', '2024-06-01 06:48:58am', '2024-06-01 00:48:58', '2024-06-01 00:48:58'),
(339, '::1', '2024-06-01 06:50:57am', '2024-06-01 00:50:57', '2024-06-01 00:50:57'),
(340, '::1', '2024-06-01 08:39:35am', '2024-06-01 02:39:35', '2024-06-01 02:39:35'),
(341, '::1', '2024-06-01 08:43:59am', '2024-06-01 02:43:59', '2024-06-01 02:43:59'),
(342, '::1', '2024-06-01 08:45:34am', '2024-06-01 02:45:34', '2024-06-01 02:45:34'),
(343, '::1', '2024-06-01 08:46:48am', '2024-06-01 02:46:48', '2024-06-01 02:46:48'),
(344, '::1', '2024-06-01 08:49:49am', '2024-06-01 02:49:49', '2024-06-01 02:49:49'),
(345, '::1', '2024-06-01 11:01:44am', '2024-06-01 05:01:44', '2024-06-01 05:01:44'),
(346, '::1', '2024-06-01 11:14:38am', '2024-06-01 05:14:38', '2024-06-01 05:14:38'),
(347, '::1', '2024-06-01 11:16:10am', '2024-06-01 05:16:10', '2024-06-01 05:16:10'),
(348, '::1', '2024-06-01 11:16:38am', '2024-06-01 05:16:38', '2024-06-01 05:16:38'),
(349, '::1', '2024-06-01 11:35:19am', '2024-06-01 05:35:19', '2024-06-01 05:35:19'),
(350, '::1', '2024-06-01 12:53:02pm', '2024-06-01 06:53:02', '2024-06-01 06:53:02'),
(351, '::1', '2024-06-02 03:06:25am', '2024-06-01 21:06:25', '2024-06-01 21:06:25'),
(352, '::1', '2024-06-02 06:57:33am', '2024-06-02 00:57:33', '2024-06-02 00:57:33'),
(353, '::1', '2024-06-02 09:00:37am', '2024-06-02 03:00:37', '2024-06-02 03:00:37'),
(354, '::1', '2024-06-02 09:01:05am', '2024-06-02 03:01:05', '2024-06-02 03:01:05'),
(355, '::1', '2024-06-02 09:25:34am', '2024-06-02 03:25:34', '2024-06-02 03:25:34'),
(356, '::1', '2024-06-02 09:26:16am', '2024-06-02 03:26:16', '2024-06-02 03:26:16'),
(357, '::1', '2024-06-02 09:27:04am', '2024-06-02 03:27:04', '2024-06-02 03:27:04'),
(358, '::1', '2024-06-02 09:31:03am', '2024-06-02 03:31:03', '2024-06-02 03:31:03'),
(359, '::1', '2024-06-02 09:33:16am', '2024-06-02 03:33:16', '2024-06-02 03:33:16'),
(360, '::1', '2024-06-02 09:35:03am', '2024-06-02 03:35:03', '2024-06-02 03:35:03'),
(361, '::1', '2024-06-02 09:44:15am', '2024-06-02 03:44:15', '2024-06-02 03:44:15'),
(362, '::1', '2024-06-02 09:47:19am', '2024-06-02 03:47:19', '2024-06-02 03:47:19'),
(363, '::1', '2024-06-02 09:47:41am', '2024-06-02 03:47:41', '2024-06-02 03:47:41'),
(364, '::1', '2024-06-02 09:49:04am', '2024-06-02 03:49:04', '2024-06-02 03:49:04'),
(365, '::1', '2024-06-02 09:50:37am', '2024-06-02 03:50:37', '2024-06-02 03:50:37'),
(366, '::1', '2024-06-02 09:54:36am', '2024-06-02 03:54:36', '2024-06-02 03:54:36'),
(367, '::1', '2024-06-02 09:55:02am', '2024-06-02 03:55:02', '2024-06-02 03:55:02'),
(368, '::1', '2024-06-02 09:55:21am', '2024-06-02 03:55:21', '2024-06-02 03:55:21'),
(369, '::1', '2024-06-02 09:56:33am', '2024-06-02 03:56:33', '2024-06-02 03:56:33'),
(370, '::1', '2024-06-02 10:02:23am', '2024-06-02 04:02:23', '2024-06-02 04:02:23'),
(371, '::1', '2024-06-02 10:03:07am', '2024-06-02 04:03:07', '2024-06-02 04:03:07'),
(372, '::1', '2024-06-02 10:04:07am', '2024-06-02 04:04:07', '2024-06-02 04:04:07'),
(373, '::1', '2024-06-02 10:07:34am', '2024-06-02 04:07:34', '2024-06-02 04:07:34'),
(374, '::1', '2024-06-02 10:08:15am', '2024-06-02 04:08:15', '2024-06-02 04:08:15'),
(375, '::1', '2024-06-02 10:09:05am', '2024-06-02 04:09:05', '2024-06-02 04:09:05'),
(376, '::1', '2024-06-02 10:10:01am', '2024-06-02 04:10:01', '2024-06-02 04:10:01'),
(377, '::1', '2024-06-02 10:10:24am', '2024-06-02 04:10:24', '2024-06-02 04:10:24'),
(378, '::1', '2024-06-02 10:11:51am', '2024-06-02 04:11:51', '2024-06-02 04:11:51'),
(379, '::1', '2024-06-02 10:12:24am', '2024-06-02 04:12:24', '2024-06-02 04:12:24'),
(380, '::1', '2024-06-02 10:13:00am', '2024-06-02 04:13:00', '2024-06-02 04:13:00'),
(381, '::1', '2024-06-02 10:13:52am', '2024-06-02 04:13:52', '2024-06-02 04:13:52'),
(382, '::1', '2024-06-02 10:14:36am', '2024-06-02 04:14:36', '2024-06-02 04:14:36'),
(383, '::1', '2024-06-02 10:15:05am', '2024-06-02 04:15:05', '2024-06-02 04:15:05'),
(384, '::1', '2024-06-02 10:15:39am', '2024-06-02 04:15:39', '2024-06-02 04:15:39'),
(385, '::1', '2024-06-02 10:16:03am', '2024-06-02 04:16:03', '2024-06-02 04:16:03'),
(386, '::1', '2024-06-02 10:16:55am', '2024-06-02 04:16:55', '2024-06-02 04:16:55'),
(387, '::1', '2024-06-02 10:18:03am', '2024-06-02 04:18:03', '2024-06-02 04:18:03'),
(388, '::1', '2024-06-02 10:19:11am', '2024-06-02 04:19:11', '2024-06-02 04:19:11'),
(389, '::1', '2024-06-02 10:21:23am', '2024-06-02 04:21:23', '2024-06-02 04:21:23'),
(390, '::1', '2024-06-02 10:23:16am', '2024-06-02 04:23:16', '2024-06-02 04:23:16'),
(391, '::1', '2024-06-02 10:24:32am', '2024-06-02 04:24:32', '2024-06-02 04:24:32'),
(392, '::1', '2024-06-02 10:24:46am', '2024-06-02 04:24:46', '2024-06-02 04:24:46'),
(393, '::1', '2024-06-02 10:25:08am', '2024-06-02 04:25:08', '2024-06-02 04:25:08'),
(394, '::1', '2024-06-02 10:25:26am', '2024-06-02 04:25:26', '2024-06-02 04:25:26'),
(395, '::1', '2024-06-02 10:27:34am', '2024-06-02 04:27:34', '2024-06-02 04:27:34'),
(396, '::1', '2024-06-02 10:29:08am', '2024-06-02 04:29:08', '2024-06-02 04:29:08'),
(397, '::1', '2024-06-02 10:30:42am', '2024-06-02 04:30:42', '2024-06-02 04:30:42'),
(398, '::1', '2024-06-02 10:32:51am', '2024-06-02 04:32:51', '2024-06-02 04:32:51'),
(399, '::1', '2024-06-02 10:33:41am', '2024-06-02 04:33:41', '2024-06-02 04:33:41'),
(400, '::1', '2024-06-02 10:36:12am', '2024-06-02 04:36:12', '2024-06-02 04:36:12'),
(401, '::1', '2024-06-02 12:21:03pm', '2024-06-02 06:21:03', '2024-06-02 06:21:03'),
(402, '::1', '2024-06-03 02:53:16am', '2024-06-02 20:53:16', '2024-06-02 20:53:16'),
(403, '::1', '2024-06-03 07:16:08am', '2024-06-03 01:16:08', '2024-06-03 01:16:08'),
(404, '::1', '2024-06-03 07:16:20am', '2024-06-03 01:16:20', '2024-06-03 01:16:20'),
(405, '::1', '2024-06-03 07:16:46am', '2024-06-03 01:16:46', '2024-06-03 01:16:46'),
(406, '::1', '2024-06-03 07:17:21am', '2024-06-03 01:17:21', '2024-06-03 01:17:21'),
(407, '::1', '2024-06-03 07:17:30am', '2024-06-03 01:17:30', '2024-06-03 01:17:30'),
(408, '::1', '2024-06-03 07:19:27am', '2024-06-03 01:19:27', '2024-06-03 01:19:27'),
(409, '::1', '2024-06-03 11:11:08am', '2024-06-03 05:11:08', '2024-06-03 05:11:08'),
(410, '::1', '2024-06-03 12:00:18pm', '2024-06-03 06:00:18', '2024-06-03 06:00:18'),
(411, '::1', '2024-06-03 12:00:38pm', '2024-06-03 06:00:38', '2024-06-03 06:00:38'),
(412, '::1', '2024-06-04 02:50:39am', '2024-06-03 20:50:39', '2024-06-03 20:50:39'),
(413, '::1', '2024-06-04 04:16:53am', '2024-06-03 22:16:53', '2024-06-03 22:16:53'),
(414, '::1', '2024-06-04 05:26:20am', '2024-06-03 23:26:20', '2024-06-03 23:26:20'),
(415, '::1', '2024-06-04 05:37:48am', '2024-06-03 23:37:48', '2024-06-03 23:37:48'),
(416, '::1', '2024-06-04 06:44:55am', '2024-06-04 00:44:55', '2024-06-04 00:44:55'),
(417, '::1', '2024-06-04 08:22:48am', '2024-06-04 02:22:48', '2024-06-04 02:22:48'),
(418, '::1', '2024-06-04 08:22:49am', '2024-06-04 02:22:49', '2024-06-04 02:22:49'),
(419, '::1', '2024-06-04 09:08:17am', '2024-06-04 03:08:17', '2024-06-04 03:08:17'),
(420, '::1', '2024-06-04 09:19:01am', '2024-06-04 03:19:01', '2024-06-04 03:19:01'),
(421, '::1', '2024-06-04 09:28:13am', '2024-06-04 03:28:13', '2024-06-04 03:28:13'),
(422, '::1', '2024-06-04 09:40:40am', '2024-06-04 03:40:40', '2024-06-04 03:40:40'),
(423, '::1', '2024-06-04 09:50:27am', '2024-06-04 03:50:27', '2024-06-04 03:50:27'),
(424, '::1', '2024-06-04 09:51:13am', '2024-06-04 03:51:13', '2024-06-04 03:51:13'),
(425, '::1', '2024-06-04 09:51:22am', '2024-06-04 03:51:22', '2024-06-04 03:51:22'),
(426, '::1', '2024-06-04 09:55:44am', '2024-06-04 03:55:44', '2024-06-04 03:55:44'),
(427, '::1', '2024-06-04 09:59:41am', '2024-06-04 03:59:41', '2024-06-04 03:59:41'),
(428, '::1', '2024-06-04 10:03:29am', '2024-06-04 04:03:29', '2024-06-04 04:03:29'),
(429, '::1', '2024-06-04 10:26:19am', '2024-06-04 04:26:19', '2024-06-04 04:26:19'),
(430, '::1', '2024-06-04 10:56:49am', '2024-06-04 04:56:49', '2024-06-04 04:56:49'),
(431, '::1', '2024-06-04 11:00:55am', '2024-06-04 05:00:55', '2024-06-04 05:00:55'),
(432, '::1', '2024-06-05 02:50:31am', '2024-06-04 20:50:31', '2024-06-04 20:50:31'),
(433, '::1', '2024-06-05 03:05:23am', '2024-06-04 21:05:23', '2024-06-04 21:05:23'),
(434, '::1', '2024-06-05 03:54:58am', '2024-06-04 21:54:58', '2024-06-04 21:54:58'),
(435, '::1', '2024-06-05 04:01:11am', '2024-06-04 22:01:11', '2024-06-04 22:01:11'),
(436, '::1', '2024-06-05 04:01:54am', '2024-06-04 22:01:54', '2024-06-04 22:01:54'),
(437, '::1', '2024-06-05 04:35:33am', '2024-06-04 22:35:33', '2024-06-04 22:35:33'),
(438, '::1', '2024-06-05 05:41:34am', '2024-06-04 23:41:34', '2024-06-04 23:41:34'),
(439, '::1', '2024-06-05 05:46:35am', '2024-06-04 23:46:35', '2024-06-04 23:46:35'),
(440, '::1', '2024-06-05 05:47:50am', '2024-06-04 23:47:50', '2024-06-04 23:47:50'),
(441, '::1', '2024-06-05 06:06:10am', '2024-06-05 00:06:10', '2024-06-05 00:06:10'),
(442, '::1', '2024-06-05 10:28:28am', '2024-06-05 04:28:28', '2024-06-05 04:28:28'),
(443, '::1', '2024-06-05 10:39:28am', '2024-06-05 04:39:28', '2024-06-05 04:39:28'),
(444, '::1', '2024-06-06 02:54:14am', '2024-06-05 20:54:14', '2024-06-05 20:54:14'),
(445, '::1', '2024-06-06 06:29:22am', '2024-06-06 00:29:22', '2024-06-06 00:29:22'),
(446, '::1', '2024-06-06 07:01:01am', '2024-06-06 01:01:01', '2024-06-06 01:01:01'),
(447, '::1', '2024-06-06 10:41:04am', '2024-06-06 04:41:04', '2024-06-06 04:41:04'),
(448, '::1', '2024-06-06 10:48:01am', '2024-06-06 04:48:01', '2024-06-06 04:48:01'),
(449, '::1', '2024-06-06 11:06:48am', '2024-06-06 05:06:48', '2024-06-06 05:06:48'),
(450, '::1', '2024-06-06 11:29:23am', '2024-06-06 05:29:23', '2024-06-06 05:29:23'),
(451, '::1', '2024-06-06 11:30:36am', '2024-06-06 05:30:36', '2024-06-06 05:30:36'),
(452, '::1', '2024-06-06 11:40:02am', '2024-06-06 05:40:02', '2024-06-06 05:40:02'),
(453, '::1', '2024-06-06 11:48:34am', '2024-06-06 05:48:34', '2024-06-06 05:48:34'),
(454, '::1', '2024-06-06 12:01:46pm', '2024-06-06 06:01:46', '2024-06-06 06:01:46'),
(455, '::1', '2024-06-08 02:49:49am', '2024-06-07 20:49:49', '2024-06-07 20:49:49'),
(456, '::1', '2024-06-08 04:51:40am', '2024-06-07 22:51:40', '2024-06-07 22:51:40'),
(457, '::1', '2024-06-08 04:54:50am', '2024-06-07 22:54:50', '2024-06-07 22:54:50'),
(458, '127.0.0.1', '2024-06-08 05:02:02am', '2024-06-07 23:02:02', '2024-06-07 23:02:02'),
(459, '127.0.0.1', '2024-06-08 05:02:09am', '2024-06-07 23:02:09', '2024-06-07 23:02:09'),
(460, '::1', '2024-06-08 07:13:04am', '2024-06-08 01:13:04', '2024-06-08 01:13:04'),
(461, '::1', '2024-06-08 07:20:06am', '2024-06-08 01:20:06', '2024-06-08 01:20:06'),
(462, '::1', '2024-06-08 08:18:14am', '2024-06-08 02:18:14', '2024-06-08 02:18:14'),
(463, '::1', '2024-06-08 08:18:54am', '2024-06-08 02:18:54', '2024-06-08 02:18:54'),
(464, '::1', '2024-06-08 08:22:16am', '2024-06-08 02:22:16', '2024-06-08 02:22:16'),
(465, '::1', '2024-06-08 08:22:38am', '2024-06-08 02:22:38', '2024-06-08 02:22:38'),
(466, '::1', '2024-06-08 08:23:30am', '2024-06-08 02:23:30', '2024-06-08 02:23:30'),
(467, '::1', '2024-06-08 10:13:03am', '2024-06-08 04:13:03', '2024-06-08 04:13:03'),
(468, '::1', '2024-06-08 11:44:47am', '2024-06-08 05:44:47', '2024-06-08 05:44:47'),
(469, '::1', '2024-06-08 11:44:57am', '2024-06-08 05:44:57', '2024-06-08 05:44:57'),
(470, '::1', '2024-06-08 11:52:46am', '2024-06-08 05:52:46', '2024-06-08 05:52:46'),
(471, '::1', '2024-06-09 03:11:34am', '2024-06-08 21:11:34', '2024-06-08 21:11:34'),
(472, '::1', '2024-06-09 03:15:01am', '2024-06-08 21:15:01', '2024-06-08 21:15:01'),
(473, '::1', '2024-06-09 03:17:44am', '2024-06-08 21:17:44', '2024-06-08 21:17:44'),
(474, '::1', '2024-06-09 03:21:29am', '2024-06-08 21:21:29', '2024-06-08 21:21:29'),
(475, '::1', '2024-06-09 03:22:19am', '2024-06-08 21:22:19', '2024-06-08 21:22:19'),
(476, '::1', '2024-06-09 03:23:04am', '2024-06-08 21:23:04', '2024-06-08 21:23:04'),
(477, '::1', '2024-06-09 03:25:42am', '2024-06-08 21:25:42', '2024-06-08 21:25:42'),
(478, '::1', '2024-06-09 03:25:51am', '2024-06-08 21:25:51', '2024-06-08 21:25:51'),
(479, '::1', '2024-06-09 03:26:15am', '2024-06-08 21:26:15', '2024-06-08 21:26:15'),
(480, '::1', '2024-06-09 03:26:31am', '2024-06-08 21:26:31', '2024-06-08 21:26:31'),
(481, '::1', '2024-06-09 03:27:17am', '2024-06-08 21:27:17', '2024-06-08 21:27:17'),
(482, '::1', '2024-06-09 03:29:00am', '2024-06-08 21:29:00', '2024-06-08 21:29:00'),
(483, '::1', '2024-06-09 03:29:04am', '2024-06-08 21:29:04', '2024-06-08 21:29:04'),
(484, '::1', '2024-06-09 03:29:45am', '2024-06-08 21:29:45', '2024-06-08 21:29:45'),
(485, '::1', '2024-06-09 03:30:32am', '2024-06-08 21:30:32', '2024-06-08 21:30:32'),
(486, '::1', '2024-06-09 03:32:03am', '2024-06-08 21:32:03', '2024-06-08 21:32:03'),
(487, '::1', '2024-06-09 03:32:23am', '2024-06-08 21:32:23', '2024-06-08 21:32:23'),
(488, '::1', '2024-06-09 03:47:44am', '2024-06-08 21:47:44', '2024-06-08 21:47:44'),
(489, '::1', '2024-06-09 03:48:36am', '2024-06-08 21:48:36', '2024-06-08 21:48:36'),
(490, '::1', '2024-06-09 03:49:26am', '2024-06-08 21:49:26', '2024-06-08 21:49:26'),
(491, '::1', '2024-06-09 03:50:49am', '2024-06-08 21:50:49', '2024-06-08 21:50:49'),
(492, '::1', '2024-06-09 03:51:45am', '2024-06-08 21:51:45', '2024-06-08 21:51:45'),
(493, '::1', '2024-06-09 03:52:31am', '2024-06-08 21:52:31', '2024-06-08 21:52:31'),
(494, '::1', '2024-06-09 03:53:06am', '2024-06-08 21:53:06', '2024-06-08 21:53:06'),
(495, '::1', '2024-06-09 03:53:23am', '2024-06-08 21:53:23', '2024-06-08 21:53:23'),
(496, '::1', '2024-06-09 03:55:02am', '2024-06-08 21:55:02', '2024-06-08 21:55:02'),
(497, '::1', '2024-06-09 03:56:08am', '2024-06-08 21:56:08', '2024-06-08 21:56:08'),
(498, '::1', '2024-06-09 03:56:37am', '2024-06-08 21:56:37', '2024-06-08 21:56:37'),
(499, '::1', '2024-06-09 03:56:55am', '2024-06-08 21:56:55', '2024-06-08 21:56:55'),
(500, '::1', '2024-06-09 03:57:15am', '2024-06-08 21:57:15', '2024-06-08 21:57:15'),
(501, '::1', '2024-06-09 03:57:40am', '2024-06-08 21:57:40', '2024-06-08 21:57:40'),
(502, '::1', '2024-06-09 04:00:23am', '2024-06-08 22:00:23', '2024-06-08 22:00:23'),
(503, '::1', '2024-06-09 04:02:30am', '2024-06-08 22:02:30', '2024-06-08 22:02:30'),
(504, '::1', '2024-06-09 04:03:05am', '2024-06-08 22:03:05', '2024-06-08 22:03:05'),
(505, '::1', '2024-06-09 04:10:40am', '2024-06-08 22:10:40', '2024-06-08 22:10:40'),
(506, '::1', '2024-06-09 04:11:06am', '2024-06-08 22:11:06', '2024-06-08 22:11:06'),
(507, '::1', '2024-06-09 04:15:49am', '2024-06-08 22:15:49', '2024-06-08 22:15:49'),
(508, '::1', '2024-06-09 04:16:23am', '2024-06-08 22:16:23', '2024-06-08 22:16:23'),
(509, '::1', '2024-06-09 04:20:03am', '2024-06-08 22:20:03', '2024-06-08 22:20:03'),
(510, '::1', '2024-06-09 04:23:05am', '2024-06-08 22:23:05', '2024-06-08 22:23:05'),
(511, '::1', '2024-06-09 04:23:52am', '2024-06-08 22:23:52', '2024-06-08 22:23:52'),
(512, '::1', '2024-06-09 04:25:23am', '2024-06-08 22:25:23', '2024-06-08 22:25:23'),
(513, '::1', '2024-06-09 04:28:20am', '2024-06-08 22:28:20', '2024-06-08 22:28:20'),
(514, '::1', '2024-06-09 04:31:58am', '2024-06-08 22:31:58', '2024-06-08 22:31:58'),
(515, '::1', '2024-06-09 04:35:51am', '2024-06-08 22:35:51', '2024-06-08 22:35:51'),
(516, '::1', '2024-06-09 04:39:00am', '2024-06-08 22:39:00', '2024-06-08 22:39:00'),
(517, '::1', '2024-06-09 04:39:17am', '2024-06-08 22:39:17', '2024-06-08 22:39:17'),
(518, '::1', '2024-06-09 04:40:04am', '2024-06-08 22:40:04', '2024-06-08 22:40:04'),
(519, '::1', '2024-06-09 04:40:27am', '2024-06-08 22:40:27', '2024-06-08 22:40:27'),
(520, '::1', '2024-06-09 04:41:07am', '2024-06-08 22:41:07', '2024-06-08 22:41:07'),
(521, '::1', '2024-06-09 04:41:32am', '2024-06-08 22:41:32', '2024-06-08 22:41:32'),
(522, '::1', '2024-06-09 04:44:42am', '2024-06-08 22:44:42', '2024-06-08 22:44:42'),
(523, '::1', '2024-06-09 04:45:22am', '2024-06-08 22:45:22', '2024-06-08 22:45:22'),
(524, '::1', '2024-06-09 04:46:14am', '2024-06-08 22:46:14', '2024-06-08 22:46:14'),
(525, '::1', '2024-06-09 04:48:10am', '2024-06-08 22:48:10', '2024-06-08 22:48:10'),
(526, '::1', '2024-06-09 04:51:44am', '2024-06-08 22:51:44', '2024-06-08 22:51:44'),
(527, '::1', '2024-06-09 04:53:26am', '2024-06-08 22:53:26', '2024-06-08 22:53:26'),
(528, '::1', '2024-06-09 04:55:12am', '2024-06-08 22:55:12', '2024-06-08 22:55:12'),
(529, '::1', '2024-06-09 04:55:51am', '2024-06-08 22:55:51', '2024-06-08 22:55:51'),
(530, '::1', '2024-06-09 04:56:51am', '2024-06-08 22:56:51', '2024-06-08 22:56:51'),
(531, '::1', '2024-06-09 04:57:12am', '2024-06-08 22:57:12', '2024-06-08 22:57:12'),
(532, '::1', '2024-06-09 04:57:32am', '2024-06-08 22:57:32', '2024-06-08 22:57:32'),
(533, '::1', '2024-06-09 04:57:50am', '2024-06-08 22:57:50', '2024-06-08 22:57:50'),
(534, '::1', '2024-06-09 04:59:47am', '2024-06-08 22:59:47', '2024-06-08 22:59:47'),
(535, '::1', '2024-06-09 05:01:42am', '2024-06-08 23:01:42', '2024-06-08 23:01:42'),
(536, '::1', '2024-06-09 05:03:14am', '2024-06-08 23:03:14', '2024-06-08 23:03:14'),
(537, '::1', '2024-06-09 05:04:48am', '2024-06-08 23:04:48', '2024-06-08 23:04:48'),
(538, '::1', '2024-06-09 05:07:10am', '2024-06-08 23:07:10', '2024-06-08 23:07:10'),
(539, '::1', '2024-06-09 05:07:30am', '2024-06-08 23:07:30', '2024-06-08 23:07:30'),
(540, '::1', '2024-06-09 05:08:11am', '2024-06-08 23:08:11', '2024-06-08 23:08:11'),
(541, '::1', '2024-06-09 05:11:58am', '2024-06-08 23:11:58', '2024-06-08 23:11:58'),
(542, '::1', '2024-06-09 05:19:18am', '2024-06-08 23:19:18', '2024-06-08 23:19:18'),
(543, '::1', '2024-06-09 05:59:56am', '2024-06-08 23:59:56', '2024-06-08 23:59:56'),
(544, '::1', '2024-06-09 06:01:25am', '2024-06-09 00:01:25', '2024-06-09 00:01:25'),
(545, '::1', '2024-06-09 06:19:04am', '2024-06-09 00:19:04', '2024-06-09 00:19:04'),
(546, '::1', '2024-06-09 06:27:34am', '2024-06-09 00:27:34', '2024-06-09 00:27:34'),
(547, '::1', '2024-06-09 07:01:24am', '2024-06-09 01:01:24', '2024-06-09 01:01:24'),
(548, '::1', '2024-06-09 07:13:07am', '2024-06-09 01:13:07', '2024-06-09 01:13:07'),
(549, '::1', '2024-06-09 07:21:48am', '2024-06-09 01:21:48', '2024-06-09 01:21:48'),
(550, '::1', '2024-06-09 07:24:23am', '2024-06-09 01:24:23', '2024-06-09 01:24:23'),
(551, '::1', '2024-06-09 07:25:29am', '2024-06-09 01:25:29', '2024-06-09 01:25:29'),
(552, '::1', '2024-06-09 07:26:13am', '2024-06-09 01:26:13', '2024-06-09 01:26:13'),
(553, '::1', '2024-06-09 07:26:25am', '2024-06-09 01:26:25', '2024-06-09 01:26:25'),
(554, '::1', '2024-06-09 07:26:48am', '2024-06-09 01:26:48', '2024-06-09 01:26:48'),
(555, '::1', '2024-06-09 07:26:59am', '2024-06-09 01:26:59', '2024-06-09 01:26:59'),
(556, '::1', '2024-06-09 07:27:11am', '2024-06-09 01:27:11', '2024-06-09 01:27:11'),
(557, '::1', '2024-06-09 07:28:57am', '2024-06-09 01:28:57', '2024-06-09 01:28:57'),
(558, '::1', '2024-06-09 07:31:13am', '2024-06-09 01:31:13', '2024-06-09 01:31:13'),
(559, '::1', '2024-06-09 07:33:10am', '2024-06-09 01:33:10', '2024-06-09 01:33:10'),
(560, '::1', '2024-06-09 07:36:50am', '2024-06-09 01:36:50', '2024-06-09 01:36:50'),
(561, '::1', '2024-06-09 07:40:40am', '2024-06-09 01:40:40', '2024-06-09 01:40:40'),
(562, '::1', '2024-06-09 08:01:15am', '2024-06-09 02:01:15', '2024-06-09 02:01:15'),
(563, '::1', '2024-06-09 08:02:07am', '2024-06-09 02:02:07', '2024-06-09 02:02:07'),
(564, '::1', '2024-06-09 08:06:43am', '2024-06-09 02:06:43', '2024-06-09 02:06:43'),
(565, '::1', '2024-06-09 08:09:26am', '2024-06-09 02:09:26', '2024-06-09 02:09:26'),
(566, '::1', '2024-06-09 08:09:52am', '2024-06-09 02:09:52', '2024-06-09 02:09:52'),
(567, '::1', '2024-06-09 08:11:42am', '2024-06-09 02:11:42', '2024-06-09 02:11:42'),
(568, '::1', '2024-06-09 08:11:58am', '2024-06-09 02:11:58', '2024-06-09 02:11:58'),
(569, '::1', '2024-06-09 08:18:21am', '2024-06-09 02:18:21', '2024-06-09 02:18:21'),
(570, '::1', '2024-06-09 08:56:20am', '2024-06-09 02:56:20', '2024-06-09 02:56:20'),
(571, '::1', '2024-06-09 08:57:01am', '2024-06-09 02:57:01', '2024-06-09 02:57:01'),
(572, '::1', '2024-06-09 08:59:07am', '2024-06-09 02:59:07', '2024-06-09 02:59:07'),
(573, '::1', '2024-06-09 09:01:47am', '2024-06-09 03:01:47', '2024-06-09 03:01:47'),
(574, '::1', '2024-06-09 09:02:45am', '2024-06-09 03:02:45', '2024-06-09 03:02:45'),
(575, '::1', '2024-06-09 09:05:36am', '2024-06-09 03:05:36', '2024-06-09 03:05:36'),
(576, '::1', '2024-06-09 09:07:25am', '2024-06-09 03:07:25', '2024-06-09 03:07:25'),
(577, '::1', '2024-06-09 09:07:34am', '2024-06-09 03:07:34', '2024-06-09 03:07:34'),
(578, '::1', '2024-06-09 09:08:46am', '2024-06-09 03:08:46', '2024-06-09 03:08:46'),
(579, '::1', '2024-06-09 09:09:24am', '2024-06-09 03:09:24', '2024-06-09 03:09:24'),
(580, '::1', '2024-06-09 09:09:46am', '2024-06-09 03:09:46', '2024-06-09 03:09:46'),
(581, '::1', '2024-06-09 09:10:00am', '2024-06-09 03:10:00', '2024-06-09 03:10:00'),
(582, '::1', '2024-06-09 09:10:17am', '2024-06-09 03:10:17', '2024-06-09 03:10:17'),
(583, '::1', '2024-06-09 09:11:17am', '2024-06-09 03:11:17', '2024-06-09 03:11:17'),
(584, '::1', '2024-06-09 09:12:11am', '2024-06-09 03:12:11', '2024-06-09 03:12:11'),
(585, '::1', '2024-06-09 09:12:55am', '2024-06-09 03:12:55', '2024-06-09 03:12:55'),
(586, '::1', '2024-06-09 09:14:26am', '2024-06-09 03:14:26', '2024-06-09 03:14:26'),
(587, '::1', '2024-06-09 09:14:43am', '2024-06-09 03:14:43', '2024-06-09 03:14:43'),
(588, '::1', '2024-06-09 09:14:55am', '2024-06-09 03:14:55', '2024-06-09 03:14:55'),
(589, '::1', '2024-06-09 09:15:03am', '2024-06-09 03:15:03', '2024-06-09 03:15:03'),
(590, '::1', '2024-06-09 09:15:30am', '2024-06-09 03:15:30', '2024-06-09 03:15:30'),
(591, '::1', '2024-06-09 09:15:54am', '2024-06-09 03:15:54', '2024-06-09 03:15:54'),
(592, '::1', '2024-06-09 09:17:04am', '2024-06-09 03:17:04', '2024-06-09 03:17:04'),
(593, '::1', '2024-06-09 09:17:45am', '2024-06-09 03:17:45', '2024-06-09 03:17:45'),
(594, '::1', '2024-06-10 03:00:56am', '2024-06-09 21:00:56', '2024-06-09 21:00:56'),
(595, '::1', '2024-06-10 03:04:41am', '2024-06-09 21:04:41', '2024-06-09 21:04:41'),
(596, '::1', '2024-06-10 03:04:57am', '2024-06-09 21:04:57', '2024-06-09 21:04:57'),
(597, '::1', '2024-06-10 03:05:17am', '2024-06-09 21:05:17', '2024-06-09 21:05:17'),
(598, '::1', '2024-06-10 03:05:45am', '2024-06-09 21:05:45', '2024-06-09 21:05:45'),
(599, '::1', '2024-06-10 03:06:01am', '2024-06-09 21:06:01', '2024-06-09 21:06:01'),
(600, '::1', '2024-06-10 03:07:26am', '2024-06-09 21:07:26', '2024-06-09 21:07:26'),
(601, '::1', '2024-06-10 03:13:40am', '2024-06-09 21:13:40', '2024-06-09 21:13:40'),
(602, '::1', '2024-06-10 03:16:37am', '2024-06-09 21:16:37', '2024-06-09 21:16:37');
INSERT INTO `visitor_models` (`id`, `ip_address`, `visit_time`, `created_at`, `updated_at`) VALUES
(603, '::1', '2024-06-10 03:16:55am', '2024-06-09 21:16:55', '2024-06-09 21:16:55'),
(604, '::1', '2024-06-10 03:19:23am', '2024-06-09 21:19:23', '2024-06-09 21:19:23'),
(605, '::1', '2024-06-10 03:21:03am', '2024-06-09 21:21:03', '2024-06-09 21:21:03'),
(606, '::1', '2024-06-10 03:22:43am', '2024-06-09 21:22:43', '2024-06-09 21:22:43'),
(607, '::1', '2024-06-10 03:22:48am', '2024-06-09 21:22:48', '2024-06-09 21:22:48'),
(608, '::1', '2024-06-10 03:24:08am', '2024-06-09 21:24:08', '2024-06-09 21:24:08'),
(609, '::1', '2024-06-10 03:25:53am', '2024-06-09 21:25:53', '2024-06-09 21:25:53'),
(610, '::1', '2024-06-10 03:26:18am', '2024-06-09 21:26:18', '2024-06-09 21:26:18'),
(611, '::1', '2024-06-10 03:29:22am', '2024-06-09 21:29:22', '2024-06-09 21:29:22'),
(612, '::1', '2024-06-10 03:30:22am', '2024-06-09 21:30:22', '2024-06-09 21:30:22'),
(613, '::1', '2024-06-10 03:31:02am', '2024-06-09 21:31:02', '2024-06-09 21:31:02'),
(614, '::1', '2024-06-10 03:31:27am', '2024-06-09 21:31:27', '2024-06-09 21:31:27'),
(615, '::1', '2024-06-10 03:32:09am', '2024-06-09 21:32:09', '2024-06-09 21:32:09'),
(616, '::1', '2024-06-10 03:32:59am', '2024-06-09 21:32:59', '2024-06-09 21:32:59'),
(617, '::1', '2024-06-10 03:39:17am', '2024-06-09 21:39:17', '2024-06-09 21:39:17'),
(618, '::1', '2024-06-10 03:45:35am', '2024-06-09 21:45:35', '2024-06-09 21:45:35'),
(619, '::1', '2024-06-10 03:55:03am', '2024-06-09 21:55:03', '2024-06-09 21:55:03'),
(620, '::1', '2024-06-10 03:59:34am', '2024-06-09 21:59:34', '2024-06-09 21:59:34'),
(621, '::1', '2024-06-10 04:30:48am', '2024-06-09 22:30:48', '2024-06-09 22:30:48'),
(622, '::1', '2024-06-10 04:31:03am', '2024-06-09 22:31:03', '2024-06-09 22:31:03'),
(623, '::1', '2024-06-10 04:32:23am', '2024-06-09 22:32:23', '2024-06-09 22:32:23'),
(624, '::1', '2024-06-10 04:33:29am', '2024-06-09 22:33:29', '2024-06-09 22:33:29'),
(625, '::1', '2024-06-10 05:20:04am', '2024-06-09 23:20:04', '2024-06-09 23:20:04'),
(626, '::1', '2024-06-10 05:22:18am', '2024-06-09 23:22:18', '2024-06-09 23:22:18'),
(627, '::1', '2024-06-10 05:22:54am', '2024-06-09 23:22:54', '2024-06-09 23:22:54'),
(628, '::1', '2024-06-10 05:37:48am', '2024-06-09 23:37:48', '2024-06-09 23:37:48'),
(629, '::1', '2024-06-10 05:53:53am', '2024-06-09 23:53:53', '2024-06-09 23:53:53'),
(630, '::1', '2024-06-10 05:54:22am', '2024-06-09 23:54:22', '2024-06-09 23:54:22'),
(631, '::1', '2024-06-10 05:55:39am', '2024-06-09 23:55:39', '2024-06-09 23:55:39'),
(632, '::1', '2024-06-10 05:56:32am', '2024-06-09 23:56:32', '2024-06-09 23:56:32'),
(633, '::1', '2024-06-10 05:56:41am', '2024-06-09 23:56:41', '2024-06-09 23:56:41'),
(634, '::1', '2024-06-10 05:58:10am', '2024-06-09 23:58:10', '2024-06-09 23:58:10'),
(635, '::1', '2024-06-10 05:59:33am', '2024-06-09 23:59:33', '2024-06-09 23:59:33'),
(636, '::1', '2024-06-10 06:02:18am', '2024-06-10 00:02:18', '2024-06-10 00:02:18'),
(637, '::1', '2024-06-10 06:03:03am', '2024-06-10 00:03:03', '2024-06-10 00:03:03'),
(638, '::1', '2024-06-10 06:03:07am', '2024-06-10 00:03:07', '2024-06-10 00:03:07'),
(639, '::1', '2024-06-10 06:03:35am', '2024-06-10 00:03:35', '2024-06-10 00:03:35'),
(640, '::1', '2024-06-10 06:05:06am', '2024-06-10 00:05:06', '2024-06-10 00:05:06'),
(641, '::1', '2024-06-10 06:05:37am', '2024-06-10 00:05:37', '2024-06-10 00:05:37'),
(642, '::1', '2024-06-10 06:05:43am', '2024-06-10 00:05:43', '2024-06-10 00:05:43'),
(643, '::1', '2024-06-10 06:06:05am', '2024-06-10 00:06:05', '2024-06-10 00:06:05'),
(644, '::1', '2024-06-10 06:06:10am', '2024-06-10 00:06:10', '2024-06-10 00:06:10'),
(645, '::1', '2024-06-10 06:06:47am', '2024-06-10 00:06:47', '2024-06-10 00:06:47'),
(646, '::1', '2024-06-10 06:09:10am', '2024-06-10 00:09:10', '2024-06-10 00:09:10'),
(647, '::1', '2024-06-10 06:10:33am', '2024-06-10 00:10:33', '2024-06-10 00:10:33'),
(648, '::1', '2024-06-10 06:11:12am', '2024-06-10 00:11:12', '2024-06-10 00:11:12'),
(649, '::1', '2024-06-10 06:11:34am', '2024-06-10 00:11:34', '2024-06-10 00:11:34'),
(650, '::1', '2024-06-10 06:12:08am', '2024-06-10 00:12:08', '2024-06-10 00:12:08'),
(651, '::1', '2024-06-10 06:13:54am', '2024-06-10 00:13:54', '2024-06-10 00:13:54'),
(652, '::1', '2024-06-10 06:20:49am', '2024-06-10 00:20:49', '2024-06-10 00:20:49'),
(653, '::1', '2024-06-10 06:22:44am', '2024-06-10 00:22:44', '2024-06-10 00:22:44'),
(654, '::1', '2024-06-10 06:25:08am', '2024-06-10 00:25:08', '2024-06-10 00:25:08'),
(655, '::1', '2024-06-10 06:25:25am', '2024-06-10 00:25:25', '2024-06-10 00:25:25'),
(656, '::1', '2024-06-10 06:25:38am', '2024-06-10 00:25:38', '2024-06-10 00:25:38'),
(657, '::1', '2024-06-10 06:26:06am', '2024-06-10 00:26:06', '2024-06-10 00:26:06'),
(658, '::1', '2024-06-10 06:27:05am', '2024-06-10 00:27:05', '2024-06-10 00:27:05'),
(659, '::1', '2024-06-10 06:29:30am', '2024-06-10 00:29:30', '2024-06-10 00:29:30'),
(660, '::1', '2024-06-10 06:29:47am', '2024-06-10 00:29:47', '2024-06-10 00:29:47'),
(661, '::1', '2024-06-10 06:30:17am', '2024-06-10 00:30:17', '2024-06-10 00:30:17'),
(662, '::1', '2024-06-10 06:30:55am', '2024-06-10 00:30:55', '2024-06-10 00:30:55'),
(663, '::1', '2024-06-10 06:32:36am', '2024-06-10 00:32:36', '2024-06-10 00:32:36'),
(664, '::1', '2024-06-10 06:33:42am', '2024-06-10 00:33:42', '2024-06-10 00:33:42'),
(665, '::1', '2024-06-10 06:33:55am', '2024-06-10 00:33:55', '2024-06-10 00:33:55'),
(666, '::1', '2024-06-10 06:35:18am', '2024-06-10 00:35:18', '2024-06-10 00:35:18'),
(667, '::1', '2024-06-10 06:35:31am', '2024-06-10 00:35:31', '2024-06-10 00:35:31'),
(668, '::1', '2024-06-10 06:35:45am', '2024-06-10 00:35:45', '2024-06-10 00:35:45'),
(669, '::1', '2024-06-10 06:36:16am', '2024-06-10 00:36:16', '2024-06-10 00:36:16'),
(670, '::1', '2024-06-10 06:36:38am', '2024-06-10 00:36:38', '2024-06-10 00:36:38'),
(671, '::1', '2024-06-10 06:37:37am', '2024-06-10 00:37:37', '2024-06-10 00:37:37'),
(672, '::1', '2024-06-10 06:37:46am', '2024-06-10 00:37:46', '2024-06-10 00:37:46'),
(673, '::1', '2024-06-10 06:48:57am', '2024-06-10 00:48:57', '2024-06-10 00:48:57'),
(674, '::1', '2024-06-10 06:49:45am', '2024-06-10 00:49:45', '2024-06-10 00:49:45'),
(675, '::1', '2024-06-10 06:50:20am', '2024-06-10 00:50:20', '2024-06-10 00:50:20'),
(676, '::1', '2024-06-10 06:51:21am', '2024-06-10 00:51:21', '2024-06-10 00:51:21'),
(677, '::1', '2024-06-10 06:51:34am', '2024-06-10 00:51:34', '2024-06-10 00:51:34'),
(678, '::1', '2024-06-10 06:51:43am', '2024-06-10 00:51:43', '2024-06-10 00:51:43'),
(679, '::1', '2024-06-10 06:52:56am', '2024-06-10 00:52:56', '2024-06-10 00:52:56'),
(680, '::1', '2024-06-10 06:55:12am', '2024-06-10 00:55:12', '2024-06-10 00:55:12'),
(681, '::1', '2024-06-10 06:56:15am', '2024-06-10 00:56:15', '2024-06-10 00:56:15'),
(682, '::1', '2024-06-10 06:59:32am', '2024-06-10 00:59:32', '2024-06-10 00:59:32'),
(683, '::1', '2024-06-10 07:05:31am', '2024-06-10 01:05:31', '2024-06-10 01:05:31'),
(684, '::1', '2024-06-10 07:15:55am', '2024-06-10 01:15:55', '2024-06-10 01:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `amount`, `fee`, `payment_method`, `transaction_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
(6, 267, '93', '3', '0', 'REg8969876000', 'Please pay fast. Thank you.', 1, '2024-02-05 15:09:19', '2024-02-05 15:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `continent_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `thana_id` bigint(20) NOT NULL,
  `union_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `continent_id`, `country_id`, `state_id`, `city_id`, `thana_id`, `union_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 3, 1, 1, 'Badolbari', '16729790511697630567_word_image.jpg', 1, '2023-10-18 06:02:47', '2023-10-18 06:04:55'),
(3, 3, 4, 1, 4, 2, 3, 'kisu ekta', '18910739101697631099_word_image.png', 1, '2023-10-18 06:11:39', '2023-10-18 06:18:05');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_options`
--
ALTER TABLE `package_options`
  ADD CONSTRAINT `package_options_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `business_packages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
