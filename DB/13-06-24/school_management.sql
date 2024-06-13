-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 06:04 AM
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
-- Table structure for table `account_heads`
--

CREATE TABLE `account_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ac_type` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `opening_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(50) DEFAULT NULL,
  `sys` tinyint(4) NOT NULL DEFAULT 1,
  `expense_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_heads`
--

INSERT INTO `account_heads` (`id`, `title`, `parent`, `status`, `deleted_at`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`, `ac_type`, `note`, `opening_id`, `code`, `sys`, `expense_id`) VALUES
(1, 'Cash', 0, 1, NULL, '2024-06-12 07:18:35', '2024-06-12 07:18:35', 0, 0, 0, 1, NULL, 0, NULL, 1, 0),
(2, 'Bank', 0, 1, NULL, '2024-06-12 07:18:45', '2024-06-12 07:18:45', 0, 0, 0, 1, NULL, 0, NULL, 1, 0),
(3, 'Student Fee', 0, 1, NULL, '2024-06-12 07:22:33', '2024-06-12 07:22:33', 0, 0, 0, 4, '', 0, '4000', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `type` varchar(255) DEFAULT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `relation_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `relation_with` varchar(100) DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `amount` float NOT NULL DEFAULT 0,
  `payment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `trans_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_trans2` tinyint(4) NOT NULL DEFAULT 0,
  `trans2_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `trans3_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_transactions`
--

INSERT INTO `account_transactions` (`id`, `created_at`, `updated_at`, `account_id`, `type`, `sub_type`, `reason`, `date`, `relation_id`, `relation_with`, `business_id`, `created_by`, `updated_by`, `amount`, `payment_id`, `trans_id`, `is_trans2`, `trans2_id`, `trans3_id`, `student_id`) VALUES
(5, '2024-06-12 21:40:43', '2024-06-12 21:40:43', 3, 'credit', 'Student Fee', 'ex-20240613-034043 from Student Fee Payment', '2024-06-13 00:00:00', 6, 'Student Fee', 0, 0, 0, 200, 0, 6, 0, 0, 0, 39),
(6, '2024-06-12 21:40:43', '2024-06-12 21:40:43', 1, 'debit', 'Student Fee', 'ex-20240613-034043 from Student Fee Payment', '2024-06-13 00:00:00', 6, 'Student Fee', 0, 0, 0, 200, 3, 5, 0, 0, 0, 39);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empID` varchar(255) NOT NULL,
  `shiftID` int(11) NOT NULL,
  `dutyDate` date NOT NULL,
  `inTime` timestamp NULL DEFAULT NULL,
  `outTime` timestamp NULL DEFAULT NULL,
  `workingMiniute` int(11) NOT NULL DEFAULT 0,
  `lateMiniute` int(11) NOT NULL DEFAULT 0,
  `overtimeMiniute` int(11) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL DEFAULT 'ok',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `empID`, `shiftID`, `dutyDate`, `inTime`, `outTime`, `workingMiniute`, `lateMiniute`, `overtimeMiniute`, `status`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(3, '1', 26, '2024-01-01', '2024-01-01 02:30:00', '2024-01-01 14:00:00', 690, 0, 210, 'Ok', '2024-01-03 08:37:49', '2024-01-03 08:38:59', 4, 4, 4),
(4, '182', 26, '2024-06-11', '2024-06-11 03:10:00', '2024-06-11 12:00:00', 530, 40, 0, 'Late', '2024-06-11 08:10:45', '2024-06-11 08:11:27', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `balance_accounts`
--

CREATE TABLE `balance_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `branch_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `routing_number` varchar(191) DEFAULT NULL,
  `balance` double(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `account_head_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balance_accounts`
--

INSERT INTO `balance_accounts` (`id`, `method_id`, `account_name`, `bank_name`, `branch_name`, `account_number`, `routing_number`, `balance`, `status`, `deleted_at`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`, `account_head_id`) VALUES
(1, 1, 'Cash In Hand', NULL, NULL, '323', NULL, 0.00, 1, NULL, '2024-01-05 03:21:58', '2024-06-12 07:19:07', 4, 4, 4, 1),
(2, 2, 'hossain', NULL, NULL, '000123456789', '110000000', 0.00, 1, NULL, '2024-06-11 03:47:46', '2024-06-12 07:19:20', 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_pays`
--

CREATE TABLE `bonus_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desigID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `paidDate` date NOT NULL,
  `occation` text DEFAULT NULL,
  `basicSalary` double(8,2) NOT NULL,
  `bonusPercent` double(8,2) NOT NULL,
  `bonusAmount` double(8,2) NOT NULL,
  `paidMethod` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `balance_account_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `reference_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_pays`
--

INSERT INTO `bonus_pays` (`id`, `desigID`, `empID`, `paidDate`, `occation`, `basicSalary`, `bonusPercent`, `bonusAmount`, `paidMethod`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`, `balance_account_id`, `reference_no`) VALUES
(2, 3, 182, '2024-06-12', 'EID UL AZHA BONUS', 0.00, 0.00, 100000.00, '1', '2024-06-11 22:39:16', '2024-06-11 22:39:16', 0, 0, 0, 1, 'bns-20240612-043916');

-- --------------------------------------------------------

--
-- Table structure for table `emp_loans`
--

CREATE TABLE `emp_loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empID` int(11) NOT NULL,
  `deptID` int(11) NOT NULL,
  `desigID` int(11) NOT NULL,
  `type` varchar(191) NOT NULL COMMENT 'loan,advanced,salary,return',
  `method_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `amount` float NOT NULL DEFAULT 0,
  `balance_account_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `reference_no` varchar(255) DEFAULT NULL,
  `loan_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `transaction_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `reason` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `amount` double(8,2) NOT NULL DEFAULT 1.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `method_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `balance_account_id` bigint(20) UNSIGNED DEFAULT 0,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_collections`
--

CREATE TABLE `fee_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fee_unique` varchar(255) DEFAULT NULL,
  `slip_no` varchar(255) DEFAULT NULL,
  `receive_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `total_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `due_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `fee_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `fine_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `pay_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `account_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_collections`
--

INSERT INTO `fee_collections` (`id`, `student_id`, `academic_year_id`, `session_id`, `class_id`, `section_id`, `group_id`, `fee_unique`, `slip_no`, `receive_amount`, `total_amount`, `due_amount`, `fee_amount`, `discount_amount`, `fine_amount`, `pay_date`, `status`, `created_at`, `updated_at`, `method_id`, `account_id`) VALUES
(6, 39, 0, 6, 1, 1, 0, NULL, 'ex-20240613-034043', 200.00, 200.00, 0.00, 0.00, 0.00, 0.00, '2024-06-13 00:00:00', 0, '2024-06-12 21:40:43', '2024-06-12 21:40:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_collection_items`
--

CREATE TABLE `fee_collection_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collection_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `session_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `section_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fee_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `pay_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fee_setup_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fee_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_collection_items`
--

INSERT INTO `fee_collection_items` (`id`, `collection_id`, `student_id`, `academic_year_id`, `session_id`, `class_id`, `section_id`, `group_id`, `fee_amount`, `discount_amount`, `pay_date`, `status`, `created_at`, `updated_at`, `fee_setup_id`, `fee_id`) VALUES
(6, 6, 39, 0, 6, 1, 0, 0, 200.00, 0.00, '2024-06-13 00:00:00', 0, '2024-06-12 21:40:43', '2024-06-12 21:40:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `late_rolls`
--

CREATE TABLE `late_rolls` (
  `id` int(11) NOT NULL,
  `late` varchar(255) DEFAULT NULL,
  `absent` varchar(255) DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `late_rolls`
--

INSERT INTO `late_rolls` (`id`, `late`, `absent`, `business_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4', '1', 0, 0, 0, '2023-12-22 18:14:35', '2023-12-22 18:14:35'),
(2, '3', '12', 4, 4, 4, '2023-12-22 12:14:38', '2023-12-22 12:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empDesigID` varchar(191) NOT NULL,
  `empID` int(11) NOT NULL,
  `leaveTypeID` varchar(191) NOT NULL,
  `leavePartID` varchar(191) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `purpose` text NOT NULL,
  `address` varchar(191) NOT NULL,
  `dcEmpDeptID` varchar(191) NOT NULL,
  `dcEmpDesigID` varchar(191) NOT NULL,
  `dcEmpID` int(11) NOT NULL,
  `leaveDay` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:pendinf;1:accept;-1:reject',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `empDesigID`, `empID`, `leaveTypeID`, `leavePartID`, `fromDate`, `toDate`, `purpose`, `address`, `dcEmpDeptID`, `dcEmpDesigID`, `dcEmpID`, `leaveDay`, `status`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(1, 'Ass Programmer', 7, 'Casual Leave', 'First Half', '2023-11-27', '2023-12-04', 'tet', 'test', 'teset', 'Ass Programmer', 7, 4, 1, '2023-12-02 08:27:40', '2023-12-02 09:55:17', 0, 0, 0),
(2, 'Ass Programmer', 8, 'ddd', 'Second Half 1', '2023-12-11', '2023-12-13', 'dfsd', 'sdfsd', 'teset', 'Ass Programmer', 8, 1.5, 0, '2023-12-18 14:56:30', '2023-12-18 14:56:30', 0, 0, 0),
(3, 'Developer', 1, 'sdfsd', 'dd', '2023-12-19', '2023-12-20', 'sdfs', 'dfsd', 'tes', 'Developer', 1, 1, 1, '2023-12-22 12:45:27', '2023-12-22 06:45:47', 4, 4, 4),
(4, 'Developer', 1, 'sdfsd', 'dd', '2024-01-02', '2024-01-05', 'sdfsdf', 'sdfsdf', 'tes', 'Developer', 1, 2, 0, '2024-01-05 17:40:19', '2024-01-05 17:40:19', 4, 4, 4),
(5, 'Developer', 1, 'sdfsd', 'dd', '2024-01-02', '2024-01-05', 'sd', 'sdfsd', 'tes', 'Developer', 1, 2, 1, '2024-01-05 17:41:13', '2024-06-11 07:44:39', 4, 4, 4),
(6, 'Developer', 1, 'sdfsd', 'dd', '2024-01-02', '2024-01-02', 'dfsd', 'sdfds', 'tes', 'Developer', 1, 0.5, 1, '2024-01-05 17:44:18', '2024-01-05 11:53:01', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `leave_parts`
--

CREATE TABLE `leave_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `levaePartName` varchar(191) NOT NULL,
  `day` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_parts`
--

INSERT INTO `leave_parts` (`id`, `levaePartName`, `day`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(2, 'First Half', 0.50, '2021-06-30 02:59:59', '2021-06-30 02:59:59', 0, 0, 0),
(3, 'Second Half 1', 0.50, '2021-06-30 03:00:18', '2023-12-18 14:54:18', 0, 0, 0),
(5, 'dd', 0.50, '2023-12-22 11:43:09', '2023-12-22 11:43:09', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `leave_taglines`
--

CREATE TABLE `leave_taglines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leaveTypeID` int(11) NOT NULL,
  `leavePartID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_taglines`
--

INSERT INTO `leave_taglines` (`id`, `leaveTypeID`, `leavePartID`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(2, 5, 3, '2023-12-18 14:55:36', '2023-12-18 14:55:36', 0, 0, 0),
(5, 7, 5, '2023-12-22 11:58:49', '2024-06-11 04:26:20', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leaveCode` varchar(30) NOT NULL,
  `description` varchar(191) NOT NULL,
  `day` tinyint(4) DEFAULT NULL,
  `hour` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leaveCode`, `description`, `day`, `hour`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(1, 'ML', 'Medical Leave', NULL, NULL, '2021-06-30 02:34:42', '2021-06-30 02:34:42', 0, 0, 0),
(2, 'AL', 'Annul leave', NULL, NULL, '2021-06-30 02:36:26', '2021-06-30 02:36:26', 0, 0, 0),
(3, 'CL', 'Casual Leave', NULL, NULL, '2021-06-30 02:36:42', '2021-06-30 02:36:42', 0, 0, 0),
(5, 'ddd', 'ddd', 12, 10, '2023-12-02 07:13:52', '2023-12-18 14:52:28', 0, 0, 0),
(7, 'sdf', 'sdfsd 2', 1, 1, '2023-12-22 11:36:31', '2024-06-10 13:41:33', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `month_manages`
--

CREATE TABLE `month_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monthDate` varchar(10) NOT NULL,
  `monthTotalDay` tinyint(4) NOT NULL,
  `workingDay` tinyint(4) NOT NULL,
  `holiday` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `month_manages`
--

INSERT INTO `month_manages` (`id`, `monthDate`, `monthTotalDay`, `workingDay`, `holiday`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(2, '2021-07', 31, 25, 6, '2021-07-06 05:36:32', '2023-12-18 15:08:00', 0, 0, 0),
(6, '2023-12', 31, 25, 6, '2023-12-18 15:07:42', '2023-12-18 15:07:42', 0, 0, 0),
(8, '2024-05', 31, 22, 9, '2023-12-22 12:37:48', '2024-01-05 17:26:20', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hour` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtimes`
--

INSERT INTO `overtimes` (`id`, `hour`, `amount`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(1, 1, 500, '2023-11-05 22:36:12', '2023-11-05 22:36:12', 0, 0, 0),
(11, 1, 400, '2023-12-22 06:16:57', '2023-12-22 06:16:57', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relation_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `relation_type` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `business_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `bank_account_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_fst` tinyint(4) NOT NULL DEFAULT 0,
  `transaction_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `relation_id`, `relation_type`, `date`, `note`, `amount`, `status`, `business_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `payment_method`, `bank_account_id`, `is_fst`, `transaction_id`, `student_id`) VALUES
(3, 6, 'ex-20240613-034043 from Student Fee Payment', '2024-06-13 00:00:00', '--', 200.00, 1, 0, 0, 0, '2024-06-12 21:40:43', '2024-06-12 21:40:43', 1, 1, 0, 6, 39);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `account_id`, `name`, `heading`, `image`, `status`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(1, 0, 'Cash', NULL, NULL, 1, '2024-01-05 03:20:49', '2024-01-05 03:20:49', 4, 4, 4),
(2, 0, 'Bank', NULL, NULL, 1, '2024-01-05 03:20:57', '2024-01-05 03:20:57', 4, 4, 4),
(5, 0, 'sdfsd', NULL, NULL, 1, '2024-06-11 03:05:02', '2024-06-11 03:05:02', 0, 0, 0),
(6, 0, 'sdfds', NULL, NULL, 1, '2024-06-11 03:06:11', '2024-06-11 03:06:11', 0, 0, 0),
(7, 0, 'sdfsddfsdfsdfsdfsdf', NULL, NULL, 1, '2024-06-11 03:06:39', '2024-06-11 03:06:39', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_ranges`
--

CREATE TABLE `payment_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `maximum_amount` double(8,2) NOT NULL,
  `minimum_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_ranges`
--

INSERT INTO `payment_ranges` (`id`, `department_id`, `designation_id`, `maximum_amount`, `minimum_amount`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(6, 29, 4, 1000.00, 100.00, NULL, NULL, 0, 0, 0),
(8, 1, 4, 20000.00, 11000.00, '2024-01-03 07:04:59', '2024-01-03 07:04:59', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `house_rent` double(8,2) NOT NULL,
  `medical_cost` double(8,2) NOT NULL,
  `transport_cost` double(8,2) NOT NULL,
  `tax` double(8,2) NOT NULL,
  `provident_fund` double(8,2) NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `house_rent`, `medical_cost`, `transport_cost`, `tax`, `provident_fund`, `business_id`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(5, 20.00, 12.00, 5.00, 10.00, 8.00, 0, 0, 0, '2023-12-22 18:06:23', '2023-12-22 18:06:23'),
(6, 144.00, 44.00, 44.00, 4.00, 4.00, 4, 4, 4, '2023-12-22 12:06:27', '2023-12-22 12:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheets`
--

CREATE TABLE `salary_sheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(10) NOT NULL,
  `deptID` int(11) NOT NULL DEFAULT 0,
  `desigID` int(11) NOT NULL DEFAULT 0,
  `empID` int(11) NOT NULL,
  `basicSalary` double(8,2) NOT NULL DEFAULT 0.00,
  `houseRent` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `medicalCost` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `transportCost` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `tax` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `providentFound` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `overtime` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `overtimeMiniute` int(11) NOT NULL DEFAULT 0,
  `absentDay` tinyint(4) NOT NULL DEFAULT 0,
  `absentDeductFirstDay` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `absentDeductOtherDay` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `absentDeduct` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'total',
  `advanced` double(8,2) NOT NULL DEFAULT 0.00,
  `netSalary` double(8,2) NOT NULL DEFAULT 0.00,
  `paidSalary` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `due_amount` float NOT NULL DEFAULT 0,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shiftName` text DEFAULT NULL,
  `startTime` text DEFAULT NULL,
  `endTime` text DEFAULT NULL,
  `status` enum('active','deactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `business_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `shiftName`, `startTime`, `endTime`, `status`, `created_at`, `updated_at`, `business_id`, `created_by`, `updated_by`) VALUES
(14, 'Night', '18:09', '13:00', 'active', '2023-03-21 06:13:49', '2023-03-21 06:13:49', 0, 0, 0),
(16, 'Barry Pacheco', '15:16', '07:29', 'active', '2023-04-07 05:55:30', '2023-04-07 05:55:30', 0, 0, 0),
(26, 'Day', '08:30', '19:30', 'active', '2023-12-23 04:26:03', '2024-06-11 04:34:52', 4, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_heads`
--
ALTER TABLE `account_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance_accounts`
--
ALTER TABLE `balance_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_pays`
--
ALTER TABLE `bonus_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_loans`
--
ALTER TABLE `emp_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `fee_collections`
--
ALTER TABLE `fee_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_collection_items`
--
ALTER TABLE `fee_collection_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `late_rolls`
--
ALTER TABLE `late_rolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_parts`
--
ALTER TABLE `leave_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_taglines`
--
ALTER TABLE `leave_taglines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_manages`
--
ALTER TABLE `month_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_method` (`payment_method`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_ranges`
--
ALTER TABLE `payment_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_sheets`
--
ALTER TABLE `salary_sheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_heads`
--
ALTER TABLE `account_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `balance_accounts`
--
ALTER TABLE `balance_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bonus_pays`
--
ALTER TABLE `bonus_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_loans`
--
ALTER TABLE `emp_loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_collections`
--
ALTER TABLE `fee_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fee_collection_items`
--
ALTER TABLE `fee_collection_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `late_rolls`
--
ALTER TABLE `late_rolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_parts`
--
ALTER TABLE `leave_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_taglines`
--
ALTER TABLE `leave_taglines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `month_manages`
--
ALTER TABLE `month_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_ranges`
--
ALTER TABLE `payment_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary_sheets`
--
ALTER TABLE `salary_sheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD CONSTRAINT `account_transactions_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_heads` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `expense_categories` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
