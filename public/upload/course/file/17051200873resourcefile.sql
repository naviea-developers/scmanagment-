-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 05:27 AM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `topic_id` bigint(255) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `topic_id`, `category_id`, `title`, `image`, `video_thumbnail`, `video_link`, `sort_description`, `description`, `sub_banner`, `slug`, `status`, `position`, `created_at`, `updated_at`, `author`, `author_image`, `views`) VALUES
(28, 4, 60, 'LEAD Academy Featured In BBC Article', '1314362481704795793.png', NULL, 'https://', NULL, '<p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">LEAD Academy, an acclaimed Ed-tech startup in Bangladesh, has been prominently featured in a recent article by BBC as one of the Ed-tech startups changing the education landscape in the country. This highlights the company\'s influential role in reshaping the educational narrative in Bangladesh.</p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">The British Broadcasting Corporation (BBC) is a renowned global news organization, providing in-depth coverage and standing as a global icon in the realm of journalism, renowned for its commitment to accuracy, integrity, and impartiality.</p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Securing a remarkable breakthrough, LEAD Academy emerged as a prominent Bangladeshi online platform and set an unparalleled standard by uniquely providing both local and international certifications. The platform prepares the next generation learners future ready by upskilling them with MOOCs (Massive Open Online Course) and STEM education, while fostering public-private partnerships with esteemed entities such as a2i, pioneering a transformative approach at the forefront of online education.</p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">In a compelling exploration of the evolving education sector, BBC recognized LEAD Academy as a pivotal force among Ed-tech startups driving change in Bangladesh. The feature highlights the platform\'s unique approach to inclusivity, offering courses in collaboration with a2i\'s disability innovation lab. It further emphasizes LEAD Academy\'s commitment to tech-based innovation and accessibility, particularly through private-public collaborations.</p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Sharif Ahmed, Co-founder, LEAD Academy expressed his excitement regarding the feature, “We are thrilled to have been featured by such an esteemed platform as BBC, it is a momentous achievement for us. It serves as an incredible testament to our vision and plans for a substantially skilled future generation.”</p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Titled “Mobilising Bangladesh’s demographic dividend”, the BBC article emphasizes the favourable demographic window of opportunity in Bangladesh, comprehensively focusing on mobilising Bangladesh’s demographic dividend and the shift from traditional to digital teaching methods. Underscoring Bangladesh\'s commitment to modernity, it mentions Bangladesh\'s proactive approach to upskilling the demography, portraying Bangladesh as a model for socio-economic progress, supported by an empowered youth and a wave of foreign investment.</p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">LEAD Academy\'s feature on BBC reflects not only the company\'s commitment to excellence but also its impact on the broader educational landscape. The platform\'s commitment to innovation, inclusivity, and global competitiveness positions it as a key player in driving the nation\'s educational renaissance. As the feature gains traction, LEAD Academy looks forward to continuing its mission of providing accessible, quality education to learners in Bangladesh and beyond.</p>', NULL, 'lead-academy-featured-in-bbc-article', 1, 99, '2024-01-09 04:23:13', '2024-01-09 04:23:13', 'Naviea soft', '6798234051704795793_author_image.png', 0),
(29, 3, 61, 'How To Stand Out In A Competitive Job', '5753769281704795865.png', NULL, 'https://', NULL, '<p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">First things first, you don\'t need to be a genius to understand that the current market for jobs is highly competitive for most new graduates. with tech giants laying off more than a hundred, if not thousands, of employees in 2022. The job market is more populated than ever with a wave of talent from these giant companies. And with the rate of emerging graduates increasing, a large number of applicants are hustling for the same job.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">1. You have to be patient</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">The first thing you have to remember when looking for a job in such a competitive market is that patience is important. So set your expectations accordingly and don\'t get burned out while searching for a job.&nbsp;</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">2. Clean up your profile</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Your social media profile represents you.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Remove any inappropriate photos or posts that you have made, regardless of how funny they were or how many reactions they got. It\'s a necessary sacrifice. Make sure to double-check that you haven\'t liked or commented on any posts you wouldn\'t want them to see.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">3. Write a perfect CV or resume</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">People often overlook how important the CV part of the resume is. It is a complete profile of your achievements in your career. Include every vital piece of information about your skills, career, research, and work experience.&nbsp;</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">4. Polish your presentation</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Dress to impress. It\'s important to look polished and wear attire that\'s simple and distraction-free. Make sure when you write an email that there are no typos. That is an immediate deal breaker, no matter how qualified you are. Make sure your body language is tip top.</span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">5. Network</span></span></p><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Networking can play a big role in helping you find the right opportunity. Virtual networking is key in current times. Use every resource at your disposal to connect with more people.</span></p>', NULL, 'how-to-stand-out-in-a-competitive-job', 1, 99, '2024-01-09 04:24:25', '2024-01-09 04:25:30', 'Naviea soft', '6394580381704795865_author_image.png', 2),
(30, 2, 62, 'Building A Strong Personal Brand', '3366755431704795919.png', NULL, 'https://', NULL, '<p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><span style=\"color: rgb(32, 32, 32);\">In today\'s highly competitive world, building a strong personal brand is essential for achieving professional success. Your personal brand is the unique identity that sets you apart from others in your field and helps you establish your expertise, credibility, and reputation. The following are some essential tactics for creating a powerful personal brand:</span></p><ol style=\"padding-left: 2rem; color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px;\"><li><span style=\"color: rgb(32, 32, 32);\"><span style=\"font-weight: bolder;\">Identify Your Unique Value Proposition (UVP):</span>&nbsp;Your UVP makes you stand out from others in your field. It could be your skills, experience, or personality. Identify your UVP and use it as the foundation of your personal brand.</span></li><li><span style=\"color: rgb(32, 32, 32);\">W<span style=\"font-weight: bolder;\">ho do you want your personal brand to reach? Identify Your Target Audience:</span>&nbsp;Define your target audience based on demographics, interests, and professional goals. This will help you tailor your messaging and content to resonate with your ideal audience.</span></li><li><span style=\"color: rgb(32, 32, 32);\"><span style=\"font-weight: bolder;\">Create a Consistent Brand Voice and Visuals:</span>&nbsp;Your personal brand should have a consistent voice and visual identity across all channels, including social media, website, and marketing materials. Choose a color scheme, font, and tone of voice that reflect your personal brand and stick to it.</span></li><li><span style=\"color: rgb(32, 32, 32);\"><span style=\"font-weight: bolder;\">Establish Yourself as an Expert in Your Field:</span>&nbsp;Building credibility is essential for building a strong personal brand. Establish yourself as an expert in your field by creating valuable content, speaking at conferences, or writing for industry publications. This will help you gain visibility and position yourself as a thought leader.</span></li><li><span style=\"color: rgb(32, 32, 32);\"><span style=\"font-weight: bolder;\">Establish a Strong Internet Presence:</span>&nbsp;In the modern digital world, developing a personal brand requires having a solid online presence. Use social media platforms, such as LinkedIn and Twitter, to share your content and engage with your audience. Build a professional website that showcases your expertise and experience.</span></li><li><span style=\"color: rgb(32, 32, 32);\"><span style=\"font-weight: bolder;\">Engage with Your Audience:</span>&nbsp;Building a personal brand is not just about promoting yourself but also about building relationships with your audience. Engage with your followers by responding to comments, answering questions, and participating in industry discussions.</span></li><li><span style=\"color: rgb(32, 32, 32);\"><span style=\"font-weight: bolder;\">Seek Opportunities to Collaborate and Network:</span>&nbsp;Collaborating with other professionals in your field is an excellent way to build your personal brand and expand your reach. Seek opportunities to collaborate with other experts or speak at industry events. Attend networking events to expand your social network.</span></li></ol><p style=\"color: rgb(45, 58, 74); font-family: sans-serif, Arial, Verdana, &quot;Trebuchet MS&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br><span style=\"color: rgb(32, 32, 32);\">Developing a great personal brand takes commitment, perseverance, and time. By following these key strategies, you can create a personal brand that reflects your unique identity, sets you apart from others, and helps you achieve professional success.</span></p><div><span style=\"color: rgb(32, 32, 32);\"><br></span></div>', NULL, 'building-a-strong-personal-brand', 1, 99, '2024-01-09 04:25:19', '2024-01-09 04:25:19', 'Naviea soft', '14806869091704795919_author_image.png', 0);

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
(1, 'Express Package', 'Express Package', '3000', NULL, 1, '2023-12-19 21:59:04', '2024-01-05 03:02:16', NULL, 'enterprise', '1000'),
(2, 'Monthly Subscription Package', 'Limited Time Only', '6000', NULL, 1, '2023-12-20 01:14:40', '2024-01-05 04:45:22', NULL, 'yearly', '3000'),
(3, 'Monthly Subscription Package', 'Limited Time Only', '7000', NULL, 1, '2023-12-20 04:07:47', '2024-01-05 03:07:11', NULL, 'monthly', '1000'),
(4, 'Free', 'Free Trial', '1000', NULL, 1, '2023-12-20 04:08:05', '2024-01-05 03:03:39', NULL, 'free', '100');

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
  `cart_type` varchar(255) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `discount` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `course_id`, `package_id`, `order_id`, `user_id`, `cart_type`, `amount`, `discount`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 1, 182, 'coursecart', 2700.00, 10, '2024-01-10 00:41:26', '2024-01-10 00:41:26');

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
  `detail` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `name`, `slug`, `parent_id`, `is_sub`, `status`, `position`, `created_at`, `updated_at`, `icon`, `color_code`, `template`, `detail`) VALUES
(48, 'home', 'IBA-MBA Admission Preparation', 'iba-mba-admission-preparation', 0, 0, 1, NULL, '2023-12-12 21:37:33', '2023-12-12 21:37:33', '11422968431702438653_home_category.jpg', NULL, NULL, '<p>good</p>'),
(49, 'home', 'Fashion Design', 'fashion-design', 0, 0, 1, NULL, '2023-12-12 21:38:02', '2023-12-12 21:38:02', '10697132841702438682_home_category.webp', NULL, NULL, 'good'),
(50, 'home', 'Gardening', 'gardening', 0, 0, 1, NULL, '2023-12-12 21:38:29', '2023-12-12 21:38:29', '4175755351702438709_home_category.webp', NULL, NULL, '<p>good</p>'),
(51, 'home', 'Mathematics', 'mathematics', 48, 0, 1, NULL, '2023-12-12 21:39:11', '2023-12-12 21:39:11', '20794032111702438751_home_sub_category.webp', NULL, NULL, '<p>good sub</p>'),
(52, 'home', 'English', 'english', 48, 0, 1, NULL, '2023-12-12 21:39:39', '2023-12-12 21:39:39', '3546400811702438779_home_sub_category.webp', NULL, NULL, '<p>good sub</p>'),
(53, 'home', 'Combined Course for IBA-MBA Admission Preparation', 'combined-course-for-iba-mba-admission-preparation', 48, 0, 1, NULL, '2023-12-12 21:40:04', '2023-12-12 21:40:04', '3807377841702438804_home_sub_category.webp', NULL, NULL, '<p>good sub</p>'),
(54, 'home', '3D Design', '3d-design', 49, 0, 1, NULL, '2023-12-12 21:40:44', '2023-12-12 21:40:44', '18734662931702438844_home_sub_category.webp', NULL, NULL, '<p>good sub</p>'),
(55, 'home', 'Gardening', 'gardening-2', 49, 0, 1, NULL, '2023-12-12 21:41:22', '2023-12-12 21:41:22', '1231814121702438882_home_sub_category.jpg', NULL, NULL, '<p>good sub</p>'),
(56, 'home', 'Speech and Language Therapy', 'speech-and-language-therapy', 50, 0, 1, NULL, '2023-12-12 21:41:44', '2023-12-12 21:41:44', '587161391702438904_home_sub_category.jpg', NULL, NULL, '<p>good sub</p>'),
(57, 'home', 'Cyber Security', 'cyber-security', 50, 0, 1, NULL, '2023-12-12 21:42:21', '2023-12-12 21:43:48', '16485202851702438941_home_sub_category.jpg', NULL, NULL, 'good sub'),
(58, 'event', 'Event Category', 'event-category', 0, 0, 1, 1, '2023-12-24 03:28:01', '2023-12-24 03:28:01', '2846234241703410081_blog_category.png', '000000', NULL, NULL),
(59, 'event', 'Sub Event', 'sub-event', 0, 0, 1, 2, '2023-12-24 03:32:25', '2023-12-24 03:32:25', '5414618781703410345_event_category.png', '000000', NULL, NULL),
(60, 'blog', 'Education', 'education', 0, 0, 1, NULL, '2024-01-08 03:29:45', '2024-01-08 03:29:45', NULL, NULL, NULL, NULL),
(61, 'blog', 'News', 'news', 0, 0, 1, NULL, '2024-01-08 03:30:02', '2024-01-08 03:30:02', NULL, NULL, NULL, NULL),
(62, 'blog', 'Career Development', 'career-development', 0, 0, 1, NULL, '2024-01-08 03:30:16', '2024-01-08 03:30:16', NULL, NULL, NULL, NULL),
(63, 'master_course', 'Trending', 'trending', 0, 0, 1, NULL, '2024-01-09 04:26:57', '2024-01-09 04:26:57', NULL, NULL, NULL, NULL),
(64, 'master_course', 'Branding & Marketing', 'branding-marketing', 0, 0, 1, NULL, '2024-01-09 04:27:14', '2024-01-09 04:27:14', NULL, NULL, NULL, NULL),
(65, 'master_course', 'Leadership', 'leadership', 0, 0, 1, NULL, '2024-01-09 04:27:27', '2024-01-09 04:27:27', NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'swfers12', 0, 1.00, 1, '2024-01-08 03:14:34', '2024-01-08 03:14:34');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `sub_category_id`, `teacher_id`, `language_id`, `type_id`, `coursetype`, `name`, `subject`, `image`, `fee`, `discount`, `discounttype`, `organization_name`, `course_hours`, `course_level`, `about`, `status`, `startdate`, `enddate`, `speaker`, `session`, `day`, `is_master`, `trailer_video_url`, `created_at`, `updated_at`) VALUES
(1, 48, 51, 176, NULL, NULL, 1, 'Fast Track Spoken English & Fluency', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course is perfect for you if you are someone who&nbsp;<span style=\"font-weight: bolder;\">wants to start investing in the stock market.&nbsp;</span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">The course includes&nbsp;<span style=\"font-weight: bolder;\">understanding the stock market&nbsp;</span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions&nbsp;about<span style=\"font-weight: bolder;\">&nbsp;buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-04 21:42:51'),
(2, 48, 51, 185, NULL, NULL, 1, 'English for IBA-MBA Admission Preparation', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-04 22:30:11'),
(3, 49, 54, 188, NULL, NULL, 1, 'Technology in Leadership', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-04 22:38:39'),
(4, 48, 52, 187, NULL, NULL, 2, 'Digital Marketing Masterclass', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-05 08:06:22'),
(5, 50, 57, 184, NULL, NULL, 1, 'ToT for Innovative Teaching', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-04 22:19:44'),
(6, 50, 57, 183, NULL, NULL, 0, 'Proficiency in Effective Business Meetings', '', NULL, 2000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-05 08:06:07'),
(7, 49, 55, 175, NULL, NULL, 2, 'Time Management for Best Productivity', '', NULL, 3000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-05 08:05:54'),
(8, 48, 0, 174, NULL, NULL, 2, 'Leadership for First Line Managers', '', NULL, 7000.00, 1000.00, 1, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-09 05:25:53'),
(9, 48, 53, 175, NULL, NULL, 1, 'Fast Track Spoken English & Fluency', 'Practical Accounting Learning for Finance & Non-Finance Professionals', NULL, 4000.00, 500.00, 1, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-04 22:09:27'),
(10, 48, 51, 184, NULL, NULL, 0, 'Stock Market Investment: How to Earn by Investing', '', NULL, 3000.00, 10.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">This course is perfect for you if you are someone who <span style=\"font-weight: bolder;\">wants to start investing in the stock market. </span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">The course includes <span style=\"font-weight: bolder;\">understanding the stock market </span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio. </p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions about<span style=\"font-weight: bolder;\"> buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '2024-01-04 21:42:51', '2024-01-08 06:53:08'),
(23, 64, 0, 191, NULL, NULL, 1, 'Teaches Strategic Financial Leadership', NULL, NULL, 300.00, 400.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p><span style=\"\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', 1, NULL, NULL, NULL, NULL, NULL, 1, 'https://www.youtube.com/watch?v=H-P7E9R_49Y&list=PLwgFb6VsUj_l3XGLgZTf5lXq9rPAQ9COu&index=3', '2024-01-09 04:36:05', '2024-01-09 04:56:15'),
(24, 63, 0, 190, NULL, NULL, 0, 'Teaches Strategic Financial Leadership', NULL, NULL, 3333.00, 56.00, 0, 'navieasoft limited', '04:12:32', 'beginner', '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', 1, NULL, NULL, NULL, NULL, NULL, 1, 'https://www.youtube.com/watch?v=RhSmRapmPfQ&list=PLwgFb6VsUj_l3XGLgZTf5lXq9rPAQ9COu&index=4', '2024-01-09 05:00:21', '2024-01-09 05:03:14');

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
(12, 20, '17047808500projectfile.sql', 1, '2024-01-09 00:14:10', '2024-01-09 00:14:10'),
(13, 21, '17047823330projectfile.sql', 1, '2024-01-09 00:38:53', '2024-01-09 00:38:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_career_outcomes`
--

INSERT INTO `course_career_outcomes` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
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
(73, 10, NULL, 1, '2024-01-09 03:36:51', '2024-01-09 03:36:51'),
(75, 23, NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(77, 24, NULL, 1, '2024-01-09 05:00:21', '2024-01-09 05:00:21'),
(78, 8, NULL, 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_contens`
--

INSERT INTO `course_contens` (`id`, `course_id`, `name`, `conten_url`, `conten_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, NULL, NULL, 1, '2024-01-04 21:42:51', '2024-01-08 06:53:09'),
(2, 10, NULL, NULL, NULL, 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(3, 9, NULL, NULL, NULL, 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(4, 8, NULL, NULL, NULL, 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(5, 7, NULL, NULL, NULL, 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(6, 6, NULL, NULL, NULL, 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(7, 5, NULL, NULL, NULL, 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(8, 4, NULL, NULL, NULL, 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(9, 2, NULL, NULL, NULL, 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(10, 3, NULL, NULL, NULL, 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(14, 10, NULL, NULL, NULL, 1, '2024-01-08 06:54:07', '2024-01-08 06:54:07'),
(15, 10, NULL, NULL, NULL, 1, '2024-01-08 20:56:27', '2024-01-08 20:56:27'),
(16, 10, NULL, NULL, NULL, 1, '2024-01-08 20:57:50', '2024-01-08 20:57:50'),
(26, 10, NULL, NULL, NULL, 1, '2024-01-09 00:09:07', '2024-01-09 00:09:07'),
(27, 10, NULL, NULL, NULL, 1, '2024-01-09 00:09:37', '2024-01-09 00:09:37'),
(36, 10, NULL, NULL, NULL, 1, '2024-01-09 03:34:39', '2024-01-09 03:34:39'),
(37, 10, NULL, NULL, NULL, 1, '2024-01-09 03:35:17', '2024-01-09 03:35:17'),
(38, 10, NULL, NULL, NULL, 1, '2024-01-09 03:35:34', '2024-01-09 03:35:34'),
(39, 10, NULL, NULL, NULL, 1, '2024-01-09 03:35:49', '2024-01-09 03:35:49'),
(40, 10, NULL, NULL, NULL, 1, '2024-01-09 03:36:05', '2024-01-09 03:36:05'),
(41, 10, NULL, NULL, NULL, 1, '2024-01-09 03:36:16', '2024-01-09 03:36:16'),
(42, 10, NULL, NULL, NULL, 1, '2024-01-09 03:36:38', '2024-01-09 03:36:38'),
(43, 10, NULL, NULL, NULL, 1, '2024-01-09 03:36:51', '2024-01-09 03:36:51'),
(47, 23, 'Lesson-1', 'https://www.youtube.com/watch?v=H-P7E9R_49Y&list=PLwgFb6VsUj_l3XGLgZTf5lXq9rPAQ9COu&index=3', NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:53:49'),
(48, 23, 'Lesson-2', 'https://www.youtube.com/watch?v=tHrERc0-z_g', NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(49, 23, 'Lesson-3', 'https://www.youtube.com/watch?v=sXSrhannl9w&list=PLwgFb6VsUj_l3XGLgZTf5lXq9rPAQ9COu', NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(51, 24, 'Lesson-1', 'https://www.youtube.com/watch?v=b9eMGE7QtTk', NULL, 1, '2024-01-09 05:00:21', '2024-01-09 05:03:14'),
(52, 24, 'Lesson-2', 'https://www.youtube.com/watch?v=RhSmRapmPfQ&list=PLwgFb6VsUj_l3XGLgZTf5lXq9rPAQ9COu&index=4', NULL, 1, '2024-01-09 05:01:54', '2024-01-09 05:03:14'),
(53, 8, NULL, NULL, NULL, 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_languages`
--

INSERT INTO `course_languages` (`id`, `name`, `status`, `created_at`, `updated_at`, `course_id`, `languagetype`, `type`) VALUES
(1, 'Bangla', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51', 1, NULL, 'course'),
(2, 'English', 1, '2024-01-04 21:42:51', '2024-01-04 21:42:51', 1, NULL, 'course'),
(16, 'Bangla', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11', 2, NULL, 'course'),
(17, 'English', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11', 2, NULL, 'course'),
(22, 'Bangla', 1, '2024-01-04 22:38:39', '2024-01-04 22:38:39', 3, NULL, 'course'),
(23, 'English', 1, '2024-01-04 22:38:39', '2024-01-04 22:38:39', 3, NULL, 'course'),
(27, 'Bangla', 1, '2024-01-05 08:05:54', '2024-01-05 08:05:54', 7, NULL, 'course'),
(28, 'Bangla', 1, '2024-01-05 08:06:07', '2024-01-05 08:06:07', 6, NULL, 'course'),
(29, 'English', 1, '2024-01-05 08:06:07', '2024-01-05 08:06:07', 6, NULL, 'course'),
(30, 'Bangla', 1, '2024-01-05 08:06:22', '2024-01-05 08:06:22', 4, NULL, 'course'),
(31, 'English', 1, '2024-01-05 08:06:22', '2024-01-05 08:06:22', 4, NULL, 'course'),
(32, 'English', 1, '2024-01-05 08:08:04', '2024-01-05 08:08:04', 5, NULL, 'course'),
(33, 'Bangla', 1, '2024-01-05 08:08:04', '2024-01-05 08:08:04', 5, NULL, 'course'),
(133, 'Bangla', 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53', 8, NULL, 'course'),
(134, 'English', 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53', 8, NULL, 'course'),
(141, 'Bangla', 1, '2024-01-09 23:22:29', '2024-01-09 23:22:29', 10, NULL, 'course'),
(142, 'English', 1, '2024-01-09 23:22:29', '2024-01-09 23:22:29', 10, NULL, 'course'),
(145, 'Bangla', 1, '2024-01-09 23:56:05', '2024-01-09 23:56:05', 9, NULL, 'course'),
(146, 'English', 1, '2024-01-09 23:56:05', '2024-01-09 23:56:05', 9, NULL, 'course');

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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_learns`
--

INSERT INTO `course_learns` (`id`, `course_id`, `event_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 'Effective Verbal Communication', 1, '2024-01-04 21:42:51', '2024-01-08 06:53:09'),
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
(66, 10, NULL, 'Refined Vocabulary Mastery', 1, '2024-01-09 00:09:37', '2024-01-09 00:22:39'),
(69, 10, NULL, 'Effective Verbal Communication', 1, '2024-01-09 00:22:39', '2024-01-09 00:22:39'),
(83, 10, NULL, NULL, 1, '2024-01-09 03:36:51', '2024-01-09 03:36:51'),
(85, 23, NULL, NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(87, 24, NULL, NULL, 1, '2024-01-09 05:00:21', '2024-01-09 05:00:21'),
(88, 8, NULL, NULL, 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lessons`
--

INSERT INTO `course_lessons` (`id`, `course_id`, `capter_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Pronunciation and Phonetics', 1, '2024-01-04 21:42:51', '2024-01-08 06:53:09'),
(2, 10, 'Course Overview', 1, '2024-01-04 21:42:51', '2024-01-08 06:53:09'),
(3, 10, 'Course Overview', 1, '2024-01-04 21:49:47', '2024-01-04 21:49:47'),
(4, 9, 'Course Overview', 1, '2024-01-04 22:09:00', '2024-01-04 22:09:00'),
(5, 8, 'Course Overview', 1, '2024-01-04 22:12:02', '2024-01-04 22:12:02'),
(6, 7, 'Course Overview', 1, '2024-01-04 22:14:31', '2024-01-04 22:14:31'),
(7, 6, 'Pronunciation and Phonetics', 1, '2024-01-04 22:17:09', '2024-01-04 22:17:09'),
(8, 5, 'Course Overview', 1, '2024-01-04 22:19:44', '2024-01-04 22:19:44'),
(9, 4, 'Course Overview', 1, '2024-01-04 22:22:37', '2024-01-04 22:22:37'),
(10, 2, 'Course Overview', 1, '2024-01-04 22:30:11', '2024-01-04 22:30:11'),
(11, 3, 'Course Overview', 1, '2024-01-04 22:32:20', '2024-01-04 22:32:20'),
(44, 10, NULL, 1, '2024-01-09 03:36:51', '2024-01-09 03:36:51'),
(46, 23, NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(48, 24, NULL, 1, '2024-01-09 05:00:21', '2024-01-09 05:00:21'),
(49, 8, NULL, 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, 20, '17047808500lessonfile.sql', 1, '2024-01-09 00:14:10', '2024-01-09 00:14:10'),
(15, 21, '17047823330lessonfile.sql', 1, '2024-01-09 00:38:53', '2024-01-09 00:38:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lesson_videos`
--

INSERT INTO `course_lesson_videos` (`id`, `course_lesson_id`, `lesson_name`, `lesson_video`, `video_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Text Completion-1`', 'https://www.youtube.com/watch?v=RhSmRapmPfQ&list=PLwgFb6VsUj_l3XGLgZTf5lXq9rPAQ9COu&index=4', '00:05:00', 1, '2024-01-04 21:42:51', '2024-01-09 05:06:20'),
(2, 1, 'Text Completion: Part 1', 'https://www.youtube.com/watch?v=15Hr89uDiC0&list=PLwgFb6VsUj_l3XGLgZTf5lXq9rPAQ9COu&index=5', '04:12:32', 1, '2024-01-04 21:42:51', '2024-01-09 05:06:20'),
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
(57, 44, NULL, 'https://', NULL, 1, '2024-01-09 03:36:51', '2024-01-09 03:36:51'),
(59, 46, NULL, 'https://', NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(61, 48, NULL, 'https://', NULL, 1, '2024-01-09 05:00:21', '2024-01-09 05:00:21'),
(62, 49, NULL, 'https://', NULL, 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_participants`
--

INSERT INTO `course_participants` (`id`, `course_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 182, 1, '2024-01-07 21:33:58', '2024-01-07 21:33:58'),
(2, 5, 182, 1, '2024-01-07 21:51:40', '2024-01-07 21:51:40'),
(3, 9, 182, 1, '2024-01-07 23:43:28', '2024-01-07 23:43:28'),
(4, 9, 182, 1, '2024-01-08 04:03:01', '2024-01-08 04:03:01'),
(5, 8, 182, 1, '2024-01-08 04:55:18', '2024-01-08 04:55:18'),
(6, 8, 182, 1, '2024-01-08 04:56:52', '2024-01-08 04:56:52'),
(7, 9, 182, 1, '2024-01-09 01:10:42', '2024-01-09 01:10:42'),
(8, 10, 182, 1, '2024-01-10 00:41:26', '2024-01-10 00:41:26');

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
(12, 20, '17047808500quizfile.sql', 1, '2024-01-09 00:14:10', '2024-01-09 00:14:10'),
(13, 21, '17047823330quizfile.sql', 1, '2024-01-09 00:38:53', '2024-01-09 00:38:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_requisites`
--

INSERT INTO `course_requisites` (`id`, `course_id`, `event_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, NULL, 'Keep video resolution at 1080p', 1, '2024-01-04 21:42:51', '2024-01-08 06:53:09'),
(3, 10, NULL, 'A computer', 1, '2024-01-04 21:42:51', '2024-01-08 06:53:09'),
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
(48, 10, NULL, 'Keep video resolution at 1080p', 1, '2024-01-09 00:09:37', '2024-01-09 00:09:37'),
(64, 10, NULL, NULL, 1, '2024-01-09 03:36:51', '2024-01-09 03:36:51'),
(66, 23, NULL, NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(68, 24, NULL, NULL, 1, '2024-01-09 05:00:21', '2024-01-09 05:00:21'),
(69, 8, NULL, NULL, 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, 20, '17047808500resourcefile.sql', 1, '2024-01-09 00:14:10', '2024-01-09 00:14:10'),
(16, 21, '17047823330resourcefile.sql', 1, '2024-01-09 00:38:53', '2024-01-09 00:38:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_saves`
--

INSERT INTO `course_saves` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 4, 182, '2024-01-05 07:09:01', '2024-01-05 07:09:01'),
(4, 18, 182, '2024-01-08 23:24:04', '2024-01-08 23:24:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_skills`
--

INSERT INTO `course_skills` (`id`, `course_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
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
(37, 10, 'Quantitative Profici', 1, '2024-01-08 06:54:07', '2024-01-09 00:22:39'),
(50, 10, 'Effective Verbal Communication', 1, '2024-01-09 00:09:37', '2024-01-09 00:22:39'),
(67, 10, NULL, 1, '2024-01-09 03:36:51', '2024-01-09 03:36:51'),
(69, 23, NULL, 1, '2024-01-09 04:36:05', '2024-01-09 04:36:05'),
(71, 24, NULL, 1, '2024-01-09 05:00:21', '2024-01-09 05:00:21'),
(72, 8, NULL, 1, '2024-01-09 05:25:53', '2024-01-09 05:25:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `category_id`, `host_id`, `language_id`, `release_id`, `name`, `startdate`, `enddate`, `eventstarttime`, `speaker`, `organization_name`, `location`, `session`, `day`, `recording`, `fee`, `about`, `status`, `created_at`, `updated_at`) VALUES
(1, 58, 180, 0, 0, 'Web Development with MERN Stack', '2024-01-29T10:58', '2024-01-24T10:58', '2027-02-06T11:26', NULL, 'navieasoft limited', 'Asia/Dhaka', NULL, NULL, 0, 3000.00, '<p><span style=\"color: rgb(33, 37, 41); font-family: \"Open Sans\", sans-serif;\">Welcome to the Full Stack Web Development in MERN Stack Live Batch, instructed by the expert web developer, Eftykhar Rahman! Are you ready to embark on an exciting journey into Full Stack Web Development using the MERN Stack? This immersive course serves as a gateway to mastering the art of building dynamic and scalable web applications from start to finish. Why Is This Course Important to Learn? In the rapidly evolving tech landscape, this course empowers individuals from diverse backgrounds to harness the power of MERN (MongoDB, Express.js, React.js, Node.js) Stack, providing a comprehensive skill set for creating modern web applications. Whether you\'re a beginner or an experienced developer, this course is designed to elevate your capabilities to new heights. Who Is This Course For? This course caters to: Beginners venturing into the world of web development. Developers seeking to expand their skills in MERN Stack. Individuals aspiring to create dynamic and responsive web applications. Tech enthusiasts who are eager to explore the intricacies of Full Stack Development. What Will You Learn? Throughout this course, you\'ll: Explore the foundations of web development, from HTML and CSS to modern JavaScript (ES6). Master front-end development with React.js, including hooks, props, and components. Dive into back-end development with Node.js and Express.js, backed by MongoDB for database management. Deploy full-stack applications and understand the end-to-end development process. Perks of Joining This Course: Live Batch: Interact with the instructor in real-time and engage with fellow learners. This is a 3-month-long live batch, comprising 40 classes.. Support Classes: Supplement your learning with additional support sessions. One-to-One Mentorship: Receive personalised guidance tailored to your learning needs. Recorded Classes: Access recorded sessions for convenient review. Quiz and Assignments: Reinforce your understanding through quizzes and assignments. Mock Interviews: Prepare for real-world scenarios with mock interviews. Enrol in the Full Stack Web Development in MERN Stack Live batch today and unlock the path to becoming a proficient Full Stack Web Developer. Your journey to mastering MERN Stack development begins here! Your future in web development is just a click away!</span><br></p>', 1, '2024-01-04 23:01:53', '2024-01-09 03:13:16');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 1, 3, 189, 'sdfas', '2024-01-08', '14:50:00', '15:50:00', 1, '2024-01-09 01:50:22', '2024-01-09 01:50:22');

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
(7, 'homepage', 'All COURSES', 'http://localhost/Leadacademy/all/courses-show', '2023-12-17 21:31:39', '2023-12-29 00:31:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'homepage', 'PARTNERSHIP WITH LEAD ACADEMY', 'http://localhost/Leadacademy/contact', '2023-12-18 01:43:40', '2024-01-02 21:15:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(34, 'aboutpage', NULL, NULL, '2024-01-10 04:51:41', '2024-01-10 04:52:17', '17048839010_about_image.jpg', 'dfgds ss', NULL, NULL, NULL, NULL, NULL, 'dfgsdfgss ss');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_content_items`
--

INSERT INTO `home_content_items` (`id`, `type`, `title`, `url`, `description`, `created_at`, `updated_at`) VALUES
(5, 'homepage', 'FREE courses', 'https://www.google.com/', 'Social & National interest courses aligned with Vision 2041', '2023-12-19 01:18:47', '2023-12-19 03:57:22'),
(6, 'homepage', 'MuktoPaath', 'https://www.google.com/', 'MuktoPaath is a government e-Learning platform in Bangla for development over multiple sectors.', '2023-12-19 01:18:47', '2023-12-19 03:57:22'),
(7, 'homepage', 'Affiliate Program', 'https://www.google.com/', 'Become a LEAD Academy Affiliate & earn commission from each sale', '2023-12-19 03:55:53', '2023-12-19 03:57:22'),
(8, 'homepage', 'LEAD talks', 'https://www.google.com/', 'Ideas that can change your life', '2023-12-19 03:55:53', '2023-12-19 03:57:22');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_content_setups`
--

INSERT INTO `home_content_setups` (`id`, `sub_banner_title`, `course_title`, `partner_title`, `client_title`, `counting_title`, `review_title1`, `review_title2`, `package_title`, `question_title`, `ques_short_des`, `question_button_text`, `question_button_url`, `created_at`, `updated_at`, `question_image`, `sub_banner_thumbnail`, `banner_image`, `sub_banner_image`, `banner_text`, `banner_video`, `sub_banner_video`, `learn_image`, `learn_title`, `count_num_1`, `count_num_2`, `count_num_3`, `count_num_4`, `count_text_1`, `count_text_2`, `count_text_3`, `count_text_4`, `package_text`, `package_btn`, `package_btn_url`) VALUES
(2, 'Unlimited Access to World Class Online Learning', 'EXPLORE COURSES', 'We collaborate with', 'Featured In', 'STRENGTH IN NUMBERS', 'Testimonials', 'What Our Learners Are Saying', 'Ready To Start?', 'Any Questions', 'Leave your name, e-mail & phone number, we will get back to you soon..', 'Need a consultation', 'https://lead.academy/home', '2023-12-12 04:28:32', '2023-12-29 00:37:20', '1702888905_question_image.png', '1702896932_sub_banner_thumbnail-logo.png', '1703587034_banner-image.png', '1703502372_sub_banner_image.webp', 'BUILDING A SMART NATION, SHAPING THE FUTURE OF WORK', '1703507014_banner_video.mp4', 'https://www.youtube.com/watch?v=NCBUakJbrw0', '1702955011_learn_image.png', 'LEARN ANYTHING, ANYWHERE AND ACCELERATE <span style=\"color: rgb(0, 0, 255);\">YOUR FUTURE</span>', '13573', '65', '3', '7849', 'Registrants', 'Total courses', 'Languages', 'Successful students', 'Save 20% with our Annual Plan. Any Question', 'Contact Us', 'https://www.google.com/');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Our website is under construction. We\'ll be here soon with our new awesome site, subscribe to be notified</span><br></p>', 'WE\'RE COMING SOON', 'Notify me when it\'s ready', '1703396273_image.png', '2026-10-26T19:39', '2023-12-23 23:25:37', '2024-01-04 23:16:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `position`, `url`, `type`, `status`, `created_at`, `updated_at`, `column_num`) VALUES
(1, 'About', '1', 'about', 'header_menu', 1, '2024-01-09 22:40:35', '2024-01-10 01:25:56', NULL),
(2, 'Learner', '2', 'learner', 'header_menu', 1, '2024-01-09 22:41:05', '2024-01-09 23:39:08', NULL),
(4, 'Instructor', '3', 'instructor', 'header_menu', 1, '2024-01-09 23:36:06', '2024-01-09 23:36:06', NULL),
(5, 'Contact', '4', 'contact', 'header_menu', 1, '2024-01-09 23:36:34', '2024-01-09 23:36:34', NULL),
(6, 'Library', '5', 'library', 'header_menu', 1, '2024-01-09 23:36:54', '2024-01-09 23:36:54', NULL),
(7, 'Event', '6', 'event-list', 'header_menu', 1, '2024-01-09 23:37:18', '2024-01-09 23:37:18', NULL),
(8, 'Blog', '7', 'blogs', 'header_menu', 1, '2024-01-09 23:37:38', '2024-01-09 23:37:38', NULL),
(9, 'Maestroclass', '8', 'maestro-class', 'header_menu', 1, '2024-01-09 23:37:59', '2024-01-09 23:39:26', NULL),
(13, 'About US', '1', 'about', 'footer_menu', 1, '2024-01-10 01:07:59', '2024-01-10 01:07:59', 1),
(14, 'Become an instructor', '2', 'instructor', 'footer_menu', 1, '2024-01-10 01:08:26', '2024-01-10 01:08:26', 1),
(15, 'Become an instructor', '3', 'library', 'footer_menu', 1, '2024-01-10 01:09:36', '2024-01-10 01:09:36', 1),
(16, 'Contact Us', '1', 'contact', 'footer_menu', 1, '2024-01-10 01:10:13', '2024-01-10 01:10:13', 2),
(17, 'FAQ', '2', 'faqs', 'footer_menu', 1, '2024-01-10 01:11:02', '2024-01-10 01:11:02', 2),
(18, 'Terms & Conditions', '1', 'terms-conditions', 'footer_menu', 1, '2024-01-10 01:11:26', '2024-01-10 01:11:26', 3),
(19, 'Refund and Return Policy', '2', 'refund-policy', 'footer_menu', 1, '2024-01-10 01:11:49', '2024-01-10 01:11:49', 3),
(20, 'Privacy Policy', '3', 'privacy-policy', 'footer_menu', 1, '2024-01-10 01:12:14', '2024-01-10 01:26:09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, '2023_12_19_054406_create_home_content_items_table', 5),
(19, '2023_11_23_053758_create_user_contacts_table', 6),
(21, '2023_11_23_091253_create_learner_page_setups_table', 7),
(22, '2023_11_23_100320_create_learner_page_contents_table', 8),
(24, '2023_11_24_034842_create_instructor_page_setups_table', 9),
(25, '2023_11_24_052510_create_instructor_page_contents_table', 10),
(26, '2023_11_24_111037_create_days_table', 11),
(27, '2023_11_25_032448_create_event_schedules_table', 12),
(28, '2023_11_25_053649_create_events_table', 13),
(29, '2023_11_22_052520_create_instructor_page_contents_table', 14),
(30, '2023_11_27_051740_create_countries_table', 14),
(31, '2023_11_27_063548_create_orders_table', 15),
(32, '2023_11_27_064451_create_carts_table', 15),
(33, '2023_11_29_085312_create_course_resource_files_table', 16),
(34, '2023_11_29_090607_create_course_lesson_files_table', 17),
(35, '2023_11_29_095648_create_course_quiz_files_table', 18),
(36, '2023_11_29_101501_create_coursezproject_files_table', 19),
(40, '2023_11_01_105752_create_event_participants_table', 20),
(42, '2023_11_02_103224_create_event_carts_table', 21),
(43, '2023_11_30_083041_create_reviews_table', 22),
(44, '2023_01_02_064540_create_tags_table', 23),
(45, '2023_01_04_031810_create_course_saves_table', 24),
(46, '2023_01_04_130719_create_course_participants_table', 25),
(47, '2023_01_04_142246_create_use_subscriptions_table', 26),
(48, '2023_01_08_071502_create_coupons_table', 27),
(50, '2023_01_08_111429_create_related_courses_table', 28);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `relation_id`, `user_id`, `text`, `type`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Course Order', 'course', '0', '2024-01-10 00:41:26', '2024-01-10 00:41:26'),
(2, 1, 182, 'Course Order successfully', 'course', '0', '2024-01-10 00:41:26', '2024-01-10 00:41:26'),
(3, 1, 184, 'Course Order', 'course', '0', '2024-01-10 00:41:26', '2024-01-10 00:41:26');

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
  `payment_method` enum('cod','paypal') NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `status` enum('new','process','delivered','cancel') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `country_id`, `name`, `email`, `address`, `mobile`, `city`, `state`, `agree`, `order_type`, `postcode`, `sub_total`, `total_amount`, `coupon`, `payment_method`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ORD-X0DYFVNCCY', 182, 19, 'shohag', 'student@gmail.com', 'dhaka', '01858509214', 'dhaka', 'ashila', 0, 'courseorder', '435', 2700.00, 2700.00, NULL, 'cod', 'paid', 'new', '2024-01-10 00:41:26', '2024-01-10 00:41:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(57, NULL, 'Individual Course purchase', '2024-01-02 21:24:01', '2024-01-02 21:25:09', 14),
(64, NULL, NULL, '2024-01-10 05:20:36', '2024-01-10 05:20:36', 22),
(65, NULL, NULL, '2024-01-10 05:21:17', '2024-01-10 05:21:17', 22);

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
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(123, 3, 'COMING SOON', 1, '2024-01-08 20:50:53', '2024-01-08 20:50:53'),
(124, 3, 'Access to all courses', 1, '2024-01-08 20:50:53', '2024-01-08 20:50:53'),
(125, 3, 'Unlimited watch time', 1, '2024-01-08 20:50:53', '2024-01-08 20:50:53'),
(126, 3, 'Connect with our instructors and fellow learners across the world', 1, '2024-01-08 20:50:53', '2024-01-08 20:50:53'),
(127, 3, 'Participate in Forum Activities', 1, '2024-01-08 20:50:53', '2024-01-08 20:50:53'),
(128, 3, 'Showcase and share your profile and projects', 1, '2024-01-08 20:50:53', '2024-01-08 20:50:53'),
(129, 2, 'COMING SOON', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(130, 2, 'Access to all courses', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(131, 2, 'Unlimited watch time', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(132, 2, 'Access to Certification', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(133, 2, 'Connect with our instructors and fellow learners across the world', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(134, 2, 'Participate in Forum Activities', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06'),
(135, 2, 'Showcase and share your profile and projects', 1, '2024-01-08 20:51:06', '2024-01-08 20:51:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_tag_lines`
--

INSERT INTO `package_tag_lines` (`id`, `package_id`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(14, 1, 'MOOCs', '17033983370.png', '2023-12-24 00:12:17', '2023-12-24 00:12:17'),
(15, 1, 'K1- K12', '17033984620.png', '2023-12-24 00:14:22', '2023-12-24 00:14:22'),
(16, 1, 'Free Course with Govt & NGOs', '17033985250.png', '2023-12-24 00:15:25', '2023-12-24 00:15:25'),
(17, 1, 'Certified', '17033985890.png', '2023-12-24 00:16:29', '2023-12-24 00:16:29'),
(18, 1, 'Enterprise', '17033986400.png', '2023-12-24 00:17:20', '2023-12-24 00:17:20'),
(22, 1, 'tag2', '17048845630.jpg', '2024-01-10 05:02:43', '2024-01-10 05:02:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `category_id`, `status`, `created_at`, `updated_at`, `slug`, `template`) VALUES
(10, 'sahohag title', '<p>sdfsdfg&nbsp;</p>', 47, 1, '2023-12-12 04:16:40', '2023-12-12 04:16:40', 'sahohag-title', 'privacy-policy');

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
  `pay_name` varchar(255) DEFAULT NULL,
  `pay_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_withs`
--

INSERT INTO `pay_withs` (`id`, `sitesetting_id`, `pay_name`, `pay_image`, `status`, `created_at`, `updated_at`) VALUES
(6, 4, NULL, '17034924940.png', 1, '2023-12-25 02:21:34', '2023-12-25 02:21:34'),
(7, 4, NULL, '17034926110.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(8, 4, NULL, '17034926111.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(9, 4, NULL, '17034926112.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(10, 4, NULL, '17034926113.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(11, 4, NULL, '17034926114.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(12, 4, NULL, '17034926115.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(13, 4, NULL, '17034926116.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(14, 4, NULL, '17034926117.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(15, 4, NULL, '17034926118.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(16, 4, NULL, '17034926119.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(17, 4, NULL, '170349261110.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(18, 4, NULL, '170349261111.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(19, 4, NULL, '170349261112.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(20, 4, NULL, '170349261113.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31'),
(21, 4, NULL, '170349261114.png', 1, '2023-12-25 02:23:31', '2023-12-25 02:23:31');

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
(4, NULL, NULL, NULL, 'Child Category', 0, 1, 3, 0, 0),
(5, NULL, NULL, NULL, 'Banner', 0, 1, 4, 0, 0),
(6, NULL, NULL, NULL, 'Slider', 0, 1, 5, 0, 0),
(7, NULL, NULL, NULL, 'Our Partner', 0, 1, 6, 0, 0),
(8, NULL, NULL, NULL, 'Our Client', 0, 1, 7, 0, 0),
(9, NULL, NULL, NULL, 'Service Tab', 0, 1, 8, 0, 0),
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
(21, NULL, NULL, 'home-child-category.create', 'Add New Child Category', 0, 4, 1, 0, 0),
(22, NULL, NULL, 'home-child-category.index', 'Manage Child Category', 0, 4, 2, 0, 1),
(23, NULL, NULL, 'home-child-category.edit', 'Edit Child Category', 0, 4, 3, 1, 0),
(24, NULL, NULL, 'home-child-category.delete', 'Delete Child Category', 0, 4, 4, 1, 0),
(25, NULL, NULL, 'home-child-category.status_toggle', 'Child Category Status', 0, 4, 5, 1, 0),
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
(45, NULL, NULL, 'home-client.status_toggle', 'Client Status', 0, 8, 5, 1, 0),
(46, NULL, NULL, 'home-servicetab.create', 'Add Service Tab', 0, 9, 1, 0, 0),
(47, NULL, NULL, 'home-servicetab.index', 'Manage Service Tab', 0, 9, 2, 0, 1),
(48, NULL, NULL, 'home-servicetab.edit', 'Edit Service Tab', 0, 9, 3, 1, 0),
(49, NULL, NULL, 'home-servicetab.delete', 'Delete Service Tab', 0, 9, 4, 1, 0),
(50, NULL, NULL, 'home-servicetab.status_toggle', 'Service Tab Status', 0, 9, 5, 1, 0),
(51, NULL, NULL, NULL, 'Services', 1, 0, 2, 0, 0),
(52, NULL, NULL, NULL, 'Doctor Visit', 0, 51, 1, 0, 0),
(53, NULL, NULL, NULL, 'Burn Service', 0, 51, 2, 0, 0),
(54, NULL, NULL, NULL, 'Therapists', 0, 51, 3, 0, 0),
(55, NULL, NULL, NULL, 'Therapists Service', 0, 51, 4, 0, 0),
(56, NULL, NULL, NULL, 'Diagnostic', 0, 51, 5, 0, 0),
(57, NULL, NULL, NULL, 'Nurse', 0, 51, 6, 0, 0),
(58, NULL, NULL, NULL, 'Nany', 0, 51, 7, 0, 0),
(59, NULL, NULL, NULL, 'Care Giver', 0, 51, 8, 0, 0),
(60, NULL, NULL, NULL, 'Hospital', 0, 51, 9, 0, 0),
(61, NULL, NULL, NULL, 'E-Clinic', 0, 51, 10, 0, 0),
(62, NULL, NULL, 'admin.doctor_service.create', 'Add New Service', 0, 52, 1, 0, 0),
(63, NULL, NULL, 'admin.doctor_service.index', 'Manage Service', 0, 52, 2, 0, 1),
(64, NULL, NULL, 'admin.doctor_service.edit', 'Edit Service', 0, 52, 3, 1, 0),
(67, NULL, NULL, 'admin.burn_service.create', 'Add New Service', 0, 53, 1, 0, 0),
(68, NULL, NULL, 'admin.burn_service.index', 'Manage Service', 0, 53, 2, 0, 1),
(69, NULL, NULL, 'admin.burn_service.edit', 'Edit Service', 0, 53, 3, 1, 0),
(70, NULL, NULL, 'admin.therapist_package.create', 'Add New Package', 0, 54, 1, 0, 0),
(71, NULL, NULL, 'admin.therapist_package.index', 'Manage Package', 0, 54, 2, 0, 1),
(72, NULL, NULL, 'admin.therapist_package.edit', 'Edit Package', 0, 54, 3, 1, 0),
(73, NULL, NULL, 'admin.therapy_service.create', 'Add New Service', 0, 55, 1, 0, 0),
(74, NULL, NULL, 'admin.therapy_service.index', 'Manage Service', 0, 55, 2, 0, 1),
(75, NULL, NULL, 'admin.therapy_service.edit', 'Edit Service', 0, 55, 3, 1, 0),
(76, NULL, NULL, 'admin.therapy_service.delete', 'Delete Service', 0, 55, 4, 1, 0),
(77, NULL, NULL, 'admin.diagnostic_service.create', 'Add New Service', 0, 56, 1, 0, 0),
(78, NULL, NULL, 'admin.diagnostic_service.index', 'Manage Service', 0, 56, 2, 0, 1),
(79, NULL, NULL, 'admin.diagnostic_service.edit', 'Edit Service', 0, 56, 3, 1, 0),
(80, NULL, NULL, 'admin.nurse_service.create', 'Add New Service', 0, 57, 1, 0, 0),
(81, NULL, NULL, 'admin.nurse_service.index', 'Manage Service', 0, 57, 2, 0, 1),
(82, NULL, NULL, 'admin.nurse_service.edit', 'Edit Service', 0, 57, 3, 1, 0),
(83, NULL, NULL, 'admin.nurse_service.delete', 'Delete Service', 0, 57, 4, 1, 0),
(84, NULL, NULL, 'admin.nany_service.create', 'Add New Service', 0, 58, 1, 0, 0),
(85, NULL, NULL, 'admin.nany_service.index', 'Manage Service', 0, 58, 2, 0, 1),
(86, NULL, NULL, 'admin.nany_service.edit', 'Edit Service', 0, 58, 3, 1, 0),
(87, NULL, NULL, 'admin.care_giver_service.create', 'Add New Service', 0, 59, 1, 0, 0),
(88, NULL, NULL, 'admin.care_giver_service.index', 'Manage Service', 0, 59, 2, 0, 1),
(89, NULL, NULL, 'admin.care_giver_service.edit', 'Edit Service', 0, 59, 3, 1, 0),
(90, NULL, NULL, 'admin.hospital.service.create', 'Add New Service', 0, 60, 1, 0, 0),
(91, NULL, NULL, 'admin.hospital.service.index', 'Manage Service', 0, 60, 2, 0, 1),
(92, NULL, NULL, 'admin.hospital.service.edit', 'Edit Service', 0, 60, 3, 1, 0),
(93, NULL, NULL, 'admin.hospital.service.delete', 'Delete Service', 0, 60, 4, 1, 0),
(94, NULL, NULL, 'admin.e_clinic_service.create', 'Add New Service', 0, 61, 1, 0, 0),
(95, NULL, NULL, 'admin.e_clinic_service.index', 'Manage Service', 0, 61, 2, 0, 1),
(96, NULL, NULL, 'admin.e_clinic_service.edit', 'Edit Service', 0, 61, 3, 1, 0),
(97, NULL, NULL, NULL, 'Telemedicine', 1, 0, 3, 0, 0),
(99, NULL, NULL, 'department.create', 'Add New Department', 0, 97, 1, 0, 0),
(100, NULL, NULL, 'department.index', 'Manage Department', 0, 97, 2, 0, 1),
(101, NULL, NULL, 'department.edit', 'Edit Department', 0, 97, 3, 1, 0),
(102, NULL, NULL, 'department.delete', 'Delete Department', 0, 97, 4, 1, 0),
(103, NULL, NULL, 'department.status_toggle', 'Department Status', 0, 97, 5, 1, 0),
(104, NULL, NULL, NULL, 'Medical Tourism', 1, 0, 4, 0, 0),
(105, NULL, NULL, NULL, 'Continent', 0, 104, 1, 0, 0),
(106, NULL, NULL, '', 'Country', 0, 104, 2, 0, 0),
(107, NULL, NULL, NULL, 'State', 0, 104, 3, 0, 0),
(108, NULL, NULL, NULL, 'City', 0, 104, 4, 0, 0),
(109, NULL, NULL, NULL, 'Post', 0, 104, 5, 0, 0),
(110, NULL, NULL, NULL, 'Union', 0, 104, 6, 0, 0),
(111, NULL, NULL, NULL, 'Word', 0, 104, 7, 0, 0),
(112, NULL, NULL, NULL, 'Popular Location', 0, 104, 8, 0, 0),
(113, NULL, NULL, NULL, 'Package', 0, 104, 9, 0, 0),
(114, NULL, NULL, NULL, 'Hotel', 0, 104, 10, 0, 0),
(115, NULL, NULL, 'continent.create', 'Add New Continent', 0, 105, 1, 0, 0),
(116, NULL, NULL, 'continent.index', 'Manage Continent', 0, 105, 2, 0, 1),
(117, NULL, NULL, 'continent.edit', 'Edit Continent', 0, 105, 3, 1, 0),
(118, NULL, NULL, 'admin.medical_tourism.continent.delete', 'Delete Continent', 0, 105, 4, 1, 0),
(119, NULL, NULL, 'admin.medical_tourism.continent.status', 'Continent Status', 0, 105, 5, 1, 0),
(120, NULL, NULL, 'country.create', 'Add New Country', 0, 106, 1, 0, 0),
(121, NULL, NULL, 'country.index', 'Manage Country', 0, 106, 2, 0, 1),
(122, NULL, NULL, 'country.edit', 'Edit Country', 0, 106, 3, 1, 0),
(123, NULL, NULL, 'admin.medical_tourism.country.delete', 'Delete Country', 0, 106, 4, 1, 0),
(124, NULL, NULL, 'admin.medical_tourism.country.status', 'Country Status', 0, 106, 5, 1, 0),
(125, NULL, NULL, 'state.create', 'Add New State', 0, 107, 1, 0, 0),
(126, NULL, NULL, 'state.index', 'Manage State', 0, 107, 2, 0, 1),
(127, NULL, NULL, 'state.edit', 'Edit State', 0, 107, 3, 1, 0),
(128, NULL, NULL, 'admin.medical_tourism.state.delete', 'Delete State', 0, 107, 4, 1, 0),
(129, NULL, NULL, 'admin.medical_tourism.state.status', 'State Status', 0, 107, 5, 1, 0),
(130, NULL, NULL, 'city.create', 'Add New City', 0, 108, 1, 0, 0),
(131, NULL, NULL, 'city.index', 'Manage City', 0, 108, 2, 0, 1),
(132, NULL, NULL, 'city.edit', 'Edit City', 0, 108, 3, 1, 0),
(133, NULL, NULL, 'admin.medical_tourism.city.delete', 'Delete City', 0, 108, 4, 1, 0),
(134, NULL, NULL, 'admin.medical_tourism.city.status', 'City Status', 0, 108, 5, 1, 0),
(135, NULL, NULL, 'thana.create', 'Add New Post', 0, 109, 1, 0, 0),
(136, NULL, NULL, 'thana.index', 'Manage Post', 0, 109, 2, 0, 1),
(137, NULL, NULL, 'thana.edit', 'Edit Post', 0, 109, 3, 1, 0),
(138, NULL, NULL, 'admin.medical_tourism.thana.delete', 'Delete Post', 0, 109, 4, 1, 0),
(139, NULL, NULL, 'admin.medical_tourism.thana.status', 'Post Status', 0, 109, 5, 1, 0),
(140, NULL, NULL, 'union.create', 'Add New Union', 0, 110, 1, 0, 0),
(141, NULL, NULL, 'union.index', 'Manage Union', 0, 110, 2, 0, 1),
(142, NULL, NULL, 'union.edit', 'Edit Union', 0, 110, 3, 1, 0),
(143, NULL, NULL, 'admin.medical_tourism.union.delete', 'Delete Union', 0, 110, 4, 1, 0),
(144, NULL, NULL, 'admin.medical_tourism.union.status', 'Union Status', 0, 110, 5, 1, 0),
(145, NULL, NULL, 'word.create', 'Add New Word', 0, 111, 1, 0, 0),
(146, NULL, NULL, 'word.index', 'Manage Word', 0, 111, 2, 0, 1),
(147, NULL, NULL, 'word.edit', 'Edit Word', 0, 111, 3, 1, 0),
(148, NULL, NULL, 'admin.medical_tourism.word.delete', 'Delete Word', 0, 111, 4, 1, 0),
(149, NULL, NULL, 'admin.medical_tourism.word.status', 'Word Status', 0, 111, 5, 1, 0),
(150, NULL, NULL, 'admin.popular_location.create', 'Add New Popular Location', 0, 112, 1, 0, 0),
(151, NULL, NULL, 'admin.popular_location.index', 'Manage Popular Location', 0, 112, 2, 0, 1),
(152, NULL, NULL, 'admin.popular_location.edit', 'Edit Popular Location', 0, 112, 3, 1, 0),
(153, NULL, NULL, 'tourism-package.create', 'Add New Package', 0, 113, 1, 0, 0),
(154, NULL, NULL, 'tourism-package.index', 'Manage Package', 0, 113, 2, 0, 1),
(155, NULL, NULL, 'tourism-package.edit', 'Edit Package', 0, 113, 3, 1, 0),
(156, NULL, NULL, 'admin.medical_tourism.package.delete', 'Delete Package', 0, 113, 4, 1, 0),
(157, NULL, NULL, 'admin.medical_tourism.package.status', 'Package Status', 0, 113, 5, 1, 0),
(158, NULL, NULL, 'tourism-hotel-package.create', 'Add New Hotel', 0, 114, 1, 0, 0),
(159, NULL, NULL, 'tourism-hotel-package.index', 'Manage Hotel', 0, 114, 2, 0, 1),
(160, NULL, NULL, 'tourism-hotel-package.edit', 'Edit Hotel', 0, 114, 3, 1, 0),
(161, NULL, NULL, 'admin.medical_tourism.hotel_package.delete', 'Delete Hotel', 0, 114, 4, 1, 0),
(162, NULL, NULL, 'admin.medical_tourism.hotel_package.status', 'Hotel Status', 0, 114, 5, 1, 0),
(163, NULL, NULL, NULL, 'News & Blog', 1, 0, 5, 0, 0),
(164, NULL, NULL, 'blog.create', 'Add New Blog', 0, 163, 1, 0, 0),
(165, NULL, NULL, 'blog.index', 'Manage Blog', 0, 163, 2, 0, 1),
(166, NULL, NULL, 'blog.edit', 'Edit Blog', 0, 163, 3, 1, 0),
(167, NULL, NULL, 'blog.delete', 'Delete Blog', 0, 163, 4, 1, 0),
(168, NULL, NULL, 'blog.status_toggle', 'Blog Status', 0, 163, 5, 1, 0),
(169, NULL, NULL, NULL, 'Package', 1, 0, 6, 0, 0),
(170, NULL, NULL, 'package.create', 'Add New Package', 0, 169, 1, 0, 0),
(171, NULL, NULL, 'package.index', 'Manage Package', 0, 169, 2, 0, 1),
(172, NULL, NULL, 'package.edit', 'Edit Package', 0, 169, 3, 1, 0),
(173, NULL, NULL, 'package.delete', 'Delete Package', 0, 169, 4, 1, 0),
(174, NULL, NULL, 'package.status_toggle', 'Package Status', 0, 169, 5, 1, 0),
(175, NULL, NULL, NULL, 'Pharmacy', 1, 0, 7, 0, 0),
(176, NULL, NULL, NULL, 'Category', 0, 175, 1, 0, 0),
(177, NULL, NULL, NULL, 'Sub Category', 0, 175, 2, 0, 0),
(178, NULL, NULL, NULL, 'Child Category', 0, 175, 3, 0, 0),
(179, NULL, NULL, NULL, 'Product', 0, 175, 4, 0, 0),
(180, NULL, NULL, NULL, 'Brand', 0, 175, 5, 0, 0),
(181, NULL, NULL, NULL, 'Generic', 0, 175, 6, 0, 0),
(182, NULL, NULL, NULL, 'Type', 0, 175, 7, 0, 0),
(183, NULL, NULL, NULL, 'Banner', 0, 175, 8, 0, 0),
(184, NULL, NULL, NULL, 'Slider', 0, 175, 9, 0, 0),
(185, NULL, NULL, 'backend.pharmacy_content_setup', 'Content Setup', 0, 175, 10, 0, 0),
(186, NULL, NULL, 'phar-category.create', 'Add New Category', 0, 176, 1, 0, 0),
(187, NULL, NULL, 'phar-category.index', 'Manage Category', 0, 176, 2, 0, 1),
(188, NULL, NULL, 'phar-category.edit', 'Edit Category', 0, 176, 3, 1, 0),
(189, NULL, NULL, 'phar-category.delete', 'Delete Category', 0, 176, 4, 1, 0),
(190, NULL, NULL, 'home-category.status_toggle', 'Category Status', 0, 176, 5, 1, 0),
(191, NULL, NULL, 'phar-sub-category.create', 'Add New Sub Category', 0, 177, 1, 0, 0),
(192, NULL, NULL, 'phar-sub-category.index', 'Manage Sub Category', 0, 177, 2, 0, 1),
(193, NULL, NULL, 'phar-sub-category.edit', 'Edit Sub Category', 0, 177, 3, 1, 0),
(194, NULL, NULL, 'phar-sub-category.delete', 'Delete Sub Category', 0, 177, 4, 1, 0),
(195, NULL, NULL, 'phar-child-category.create', 'Add New Child Category', 0, 178, 1, 0, 0),
(196, NULL, NULL, 'phar-child-category.index', 'Manage Child Category', 0, 178, 2, 0, 1),
(197, NULL, NULL, 'phar-child-category.edit', 'Edit Child Category', 0, 178, 3, 1, 0),
(198, NULL, NULL, 'phar-child-category.delete', 'Delete Child Category', 0, 178, 4, 1, 0),
(199, NULL, NULL, 'phar-child-category.status_toggle', 'Child Category Status', 0, 178, 5, 1, 0),
(200, NULL, NULL, 'phar-product.create', 'Add New Product', 0, 179, 1, 0, 0),
(201, NULL, NULL, 'phar-product.index', 'Manage Product', 0, 179, 2, 0, 1),
(202, NULL, NULL, 'phar-product.edit', 'Edit Product', 0, 179, 3, 1, 0),
(203, NULL, NULL, 'phar-product.delete', 'Delete Product', 0, 179, 4, 1, 0),
(204, NULL, NULL, 'phar-product.status_toggle', 'Product Status', 0, 179, 5, 1, 0),
(205, NULL, NULL, 'phar-brand.create', 'Add New Brand', 0, 180, 1, 0, 0),
(206, NULL, NULL, 'phar-brand.index', 'Manage Brand', 0, 180, 2, 0, 1),
(207, NULL, NULL, 'phar-brand.edit', 'Edit Brand', 0, 180, 3, 1, 0),
(208, NULL, NULL, 'phar-brand.delete', 'Delete Brand', 0, 180, 4, 1, 0),
(209, NULL, NULL, 'phar-brand.status_toggle', 'Brand Status', 0, 180, 5, 1, 0),
(210, NULL, NULL, 'phar-generic.create', 'Add New Generic', 0, 181, 1, 0, 0),
(211, NULL, NULL, 'phar-generic.index', 'Manage Generic', 0, 181, 2, 0, 1),
(212, NULL, NULL, 'phar-generic.edit', 'Edit Generic', 0, 181, 3, 1, 0),
(213, NULL, NULL, 'phar-generic.delete', 'Delete Generic', 0, 181, 4, 1, 0),
(214, NULL, NULL, 'phar-generic.status_toggle', 'Generic Status', 0, 181, 5, 1, 0),
(215, NULL, NULL, 'phar-type.create', 'Add New Type', 0, 182, 1, 0, 0),
(216, NULL, NULL, 'phar-type.index', 'Manage Type', 0, 182, 2, 0, 1),
(217, NULL, NULL, 'phar-type.edit', 'Edit Type', 0, 182, 3, 1, 0),
(218, NULL, NULL, 'phar-type.delete', 'Delete Type', 0, 182, 4, 1, 0),
(219, NULL, NULL, 'phar-type.status_toggle', 'Type Status', 0, 182, 5, 1, 0),
(220, NULL, NULL, 'phar-banner.create', 'Add New Banner', 0, 183, 1, 0, 0),
(221, NULL, NULL, 'phar-banner.index', 'Manage Banner', 0, 183, 2, 0, 1),
(222, NULL, NULL, 'phar-banner.edit', 'Edit Banner', 0, 183, 3, 1, 0),
(223, NULL, NULL, 'phar-banner.delete', 'Delete Banner', 0, 183, 4, 1, 0),
(224, NULL, NULL, 'phar-slider.create', 'Add New Slider', 0, 184, 1, 0, 0),
(225, NULL, NULL, 'phar-slider.index', 'Manage Slider', 0, 184, 2, 0, 1),
(226, NULL, NULL, 'phar-slider.edit', 'Edit Slider', 0, 184, 3, 1, 0),
(227, NULL, NULL, 'phar-slider.delete', 'Delete Slider', 0, 184, 4, 1, 0),
(228, NULL, NULL, 'home-slider.status_toggle', 'Slider Status', 0, 184, 5, 1, 0),
(229, NULL, NULL, NULL, 'Report Management', 1, 0, 11, 0, 0),
(230, NULL, NULL, 'admin.report.nany', 'Nany Service Report', 0, 229, 1, 0, 0),
(231, NULL, NULL, 'admin.report.nany_package', 'Nany Package Wise Report', 0, 229, 2, 0, 0),
(232, NULL, NULL, 'admin.report.care_giver', 'Care Giver Service Report', 0, 229, 3, 0, 0),
(233, NULL, NULL, 'admin.report.care_giver_package', 'Care Giver Package Wise Report', 0, 229, 4, 0, 0),
(234, NULL, NULL, 'admin.report.nurse', 'Nurse Service Report', 0, 229, 5, 0, 0),
(235, NULL, NULL, 'admin.report.nurse_package', 'Nurse Package Wise Report', 0, 229, 6, 0, 0),
(236, NULL, NULL, 'admin.report.therapist', 'Therapy Service Report', 0, 229, 7, 0, 0),
(237, NULL, NULL, 'admin.report.therapist_package', 'Therapy Package Wise Report', 0, 229, 8, 0, 0),
(238, NULL, NULL, 'admin.report.diagnostic', 'Diagnostic Service Report', 0, 229, 9, 0, 0),
(239, NULL, NULL, 'admin.report.diagnostic_package', 'Diagnostic Package Wise Report', 0, 229, 10, 0, 0),
(240, NULL, NULL, 'admin.report.hospital', 'Hospital Service Report', 0, 229, 11, 0, 0),
(241, NULL, NULL, 'admin.report.hospital_package', 'Hospital Package Wise Report', 0, 229, 12, 0, 0),
(242, NULL, NULL, 'admin.report.e_clinic', 'E-clinic Service Report', 0, 229, 13, 0, 0),
(243, NULL, NULL, 'admin.report.e_clinic_package', 'E-clinic Package Wise Report', 0, 229, 14, 0, 0),
(244, NULL, NULL, NULL, 'Role Management', 1, 0, 12, 0, 0),
(245, NULL, NULL, 'admin.role.create', 'Add New Role', 0, 244, 1, 0, 0),
(246, NULL, NULL, 'admin.role.index', 'Manage Role', 0, 244, 2, 0, 1),
(247, NULL, NULL, 'admin.role.edit', 'Edit Role', 0, 244, 3, 1, 0),
(248, NULL, NULL, 'admin.role.delete', 'Delete Role', 0, 244, 4, 1, 0),
(249, NULL, NULL, 'admin.role.status_toggle', 'Role Status', 0, 244, 5, 1, 0),
(250, NULL, NULL, 'admin.role.permission', 'Role Permission', 0, 244, 6, 1, 0),
(251, NULL, NULL, NULL, 'User Management', 1, 0, 13, 0, 0),
(252, NULL, NULL, NULL, 'Admin User', 0, 251, 1, 0, 0),
(253, NULL, NULL, NULL, 'Customer', 0, 251, 2, 0, 0),
(254, NULL, NULL, NULL, 'Doctor', 0, 251, 3, 0, 0),
(255, NULL, NULL, NULL, 'Nurse', 0, 251, 4, 0, 0),
(256, NULL, NULL, NULL, 'Nany', 0, 251, 5, 0, 0),
(257, NULL, NULL, NULL, 'Care Giver', 0, 251, 6, 0, 0),
(258, NULL, NULL, NULL, 'Vendor', 0, 251, 7, 0, 0),
(259, NULL, NULL, NULL, 'Driver', 0, 251, 8, 0, 0),
(260, NULL, NULL, NULL, 'Physiotherapist', 0, 251, 9, 0, 0),
(261, NULL, NULL, NULL, 'Hospital', 0, 251, 10, 0, 0),
(262, NULL, NULL, NULL, 'E-clinic', 0, 251, 11, 0, 0),
(263, NULL, NULL, NULL, 'Diagnostic', 0, 251, 12, 0, 0),
(264, NULL, NULL, 'admin.user.create', 'Add New Admin User', 0, 252, 1, 0, 0),
(265, NULL, NULL, 'admin.user.index', 'All Admin User', 0, 252, 2, 0, 1),
(266, NULL, NULL, 'admin.user.edit', 'Edit Admin User', 0, 252, 3, 1, 0),
(267, NULL, NULL, 'admin.user.delete', 'Delete Admin User', 0, 252, 4, 1, 0),
(268, NULL, NULL, 'admin.user.change_password', 'Change Admin User Password', 0, 252, 5, 1, 0),
(269, NULL, NULL, 'admin.customer_user.create', 'Add New Customer', 0, 253, 1, 0, 0),
(270, NULL, NULL, 'admin.customer_user.list', 'All Customer', 0, 253, 2, 0, 1),
(271, NULL, NULL, 'admin.customer_user.edit', 'Edit Customer', 0, 253, 3, 1, 0),
(272, NULL, NULL, 'admin.customer_user.delete', 'Delete Customer', 0, 253, 4, 1, 0),
(273, NULL, NULL, 'admin.doctor.create', 'Add New Doctor', 0, 254, 1, 0, 0),
(274, NULL, NULL, 'admin.doctor.index', 'All Doctor', 0, 254, 2, 0, 1),
(275, NULL, NULL, 'admin.doctor.edit', 'Edit Doctor', 0, 254, 3, 1, 0),
(276, NULL, NULL, 'admin.doctor.delete', 'Delete Doctor', 0, 254, 4, 1, 0),
(277, NULL, NULL, 'admin.doctor.change_password', 'Doctor Change Password', 0, 254, 5, 1, 0),
(278, NULL, NULL, 'admin.nurse.create', 'Add New Nurse', 0, 255, 1, 0, 0),
(279, NULL, NULL, 'admin.nurse.index', 'All Nurse', 0, 255, 2, 0, 1),
(280, NULL, NULL, 'admin.nurse.edit', 'Edit Nurse', 0, 255, 3, 1, 0),
(281, NULL, NULL, 'admin.nurse.delete', 'Delete Nurse', 0, 255, 4, 1, 0),
(282, NULL, NULL, 'admin.nurse.change_password', 'Nurse Change Password', 0, 255, 5, 1, 0),
(283, NULL, NULL, 'admin.nany.create', 'Add New Nany', 0, 256, 1, 0, 0),
(284, NULL, NULL, 'admin.nany.index', 'All Nany', 0, 256, 2, 0, 1),
(285, NULL, NULL, 'admin.nany.edit', 'Edit Nany', 0, 256, 3, 1, 0),
(286, NULL, NULL, 'admin.nany.delete', 'Delete Nany', 0, 256, 4, 1, 0),
(287, NULL, NULL, 'admin.nany.change_password', 'Nany Change Password', 0, 256, 5, 1, 0),
(288, NULL, NULL, 'admin.care_giver.create', 'Add New Care Giver', 0, 257, 1, 0, 0),
(289, NULL, NULL, 'admin.care_giver.index', 'All Care Giver', 0, 257, 2, 0, 1),
(290, NULL, NULL, 'admin.care-giver.edit', 'Edit Care Giver', 0, 257, 3, 1, 0),
(291, NULL, NULL, 'admin.care_giver.delete', 'Delete Care Giver', 0, 257, 4, 1, 0),
(292, NULL, NULL, 'admin.care_giver.change_password', 'Care Giver Change Password', 0, 257, 5, 1, 0),
(293, NULL, NULL, 'admin.vendor_user.create', 'Add New Vendor', 0, 258, 1, 0, 0),
(294, NULL, NULL, 'admin.vendor_user.list', 'All Vendor', 0, 258, 2, 0, 1),
(295, NULL, NULL, 'admin.vendor_user.edit', 'Edit Vendor', 0, 258, 3, 1, 0),
(296, NULL, NULL, 'admin.vendor_user.delete', 'Delete Vendor', 0, 258, 4, 1, 0),
(297, NULL, NULL, 'admin.ambulance.create', 'Add New Driver', 0, 259, 1, 0, 0),
(298, NULL, NULL, 'admin.ambulance.index', 'All Driver', 0, 259, 2, 0, 1),
(299, NULL, NULL, 'admin.ambulance.edit', 'Edit Driver', 0, 259, 3, 1, 0),
(300, NULL, NULL, 'admin.ambulance.delete', 'Delete Driver', 0, 259, 4, 1, 0),
(301, NULL, NULL, 'admin.ambulance.change_password', 'Driver Change Password', 0, 259, 5, 1, 0),
(302, NULL, NULL, 'admin.ambulance.booking.status_toggle', 'Driver Status', 0, 259, 6, 1, 0),
(303, NULL, NULL, 'admin.therapy.create', 'Add New Therapist', 0, 260, 1, 0, 0),
(304, NULL, NULL, 'admin.therapy.index', 'All Therapist', 0, 260, 2, 0, 1),
(305, NULL, NULL, 'admin.therapy.edit', 'Edit Therapist', 0, 260, 3, 1, 0),
(306, NULL, NULL, 'admin.therapy.delete', 'Delete Therapist', 0, 260, 4, 1, 0),
(307, NULL, NULL, 'admin.therapy.change_password', 'Therapist Change Password', 0, 260, 5, 1, 0),
(308, NULL, NULL, 'admin.therapy.status_toggle', 'Therapist Status', 0, 260, 6, 1, 0),
(309, NULL, NULL, 'admin.hospital.create', 'Add New Hospital', 0, 261, 1, 0, 0),
(310, NULL, NULL, 'admin.hospital.index', 'All Hospital', 0, 261, 2, 0, 1),
(311, NULL, NULL, 'admin.hospital.edit', 'Edit Hospital', 0, 261, 3, 1, 0),
(312, NULL, NULL, 'admin.hospital.delete', 'Delete Hospital', 0, 261, 4, 1, 0),
(313, NULL, NULL, 'admin.hospital.change_password', 'Hospital Change Password', 0, 261, 5, 1, 0),
(314, NULL, NULL, 'admin.e_clinic.create', 'Add New E-clinic', 0, 262, 1, 0, 0),
(315, NULL, NULL, 'admin.e_clinic.index', 'All E-clinic', 0, 262, 2, 0, 1),
(316, NULL, NULL, 'admin.e_clinic.edit', 'Edit E-clinic', 0, 262, 3, 1, 0),
(317, NULL, NULL, 'admin.e_clinic.delete', 'Delete E-clinic', 0, 262, 4, 1, 0),
(318, NULL, NULL, 'admin.e_clinic.change_password', 'E-clinic Change Password', 0, 262, 5, 1, 0),
(319, NULL, NULL, 'admin.lab.create', 'Add New Diagnostic', 0, 263, 1, 0, 0),
(320, NULL, NULL, 'admin.lab.index', 'All Diagnostic', 0, 263, 2, 0, 1),
(321, NULL, NULL, 'admin.lab.edit', 'Edit Diagnostic', 0, 263, 3, 1, 0),
(322, NULL, NULL, 'admin.lab.delete', 'Delete Diagnostic', 0, 263, 4, 1, 0),
(323, NULL, NULL, 'admin.lab.change_password', 'Diagnostic Change Password', 0, 263, 5, 1, 0),
(324, NULL, NULL, NULL, 'Site Settings', 1, 0, 14, 0, 0),
(325, NULL, NULL, 'backend.setting', 'About Of Company', 0, 324, 1, 0, 0),
(326, NULL, NULL, '', 'Page Category', 0, 324, 2, 0, 0),
(327, NULL, NULL, NULL, 'Page', 0, 324, 3, 0, 0),
(328, NULL, NULL, 'backend.footer_pages', 'Footer Columns', 0, 324, 4, 0, 0),
(329, NULL, NULL, 'admin.page_category.create', 'Add New Page Category', 0, 326, 1, 0, 0),
(330, NULL, NULL, 'admin.page_category.index', 'Manage Page Category', 0, 326, 2, 0, 1),
(331, NULL, NULL, 'admin.page_category.edit', 'Edit Page Category', 0, 326, 3, 1, 0),
(332, NULL, NULL, 'admin.page_category.delete', 'Delete Page Category', 0, 326, 4, 1, 0),
(333, NULL, NULL, 'admin.page_category.status_toggle', 'Page Category Status', 0, 326, 5, 1, 0),
(334, NULL, NULL, 'all-pages.create', 'Add New Page', 0, 327, 1, 0, 0),
(335, NULL, NULL, 'all-pages.index', 'Manage Page', 0, 327, 2, 0, 1),
(336, NULL, NULL, 'all-pages.edit', 'Edit Page', 0, 327, 3, 1, 0),
(337, NULL, NULL, 'page.delete', 'Delete Page', 0, 327, 4, 1, 0),
(338, NULL, NULL, 'page.status_toggle', 'Page Status', 0, 327, 5, 1, 0),
(339, NULL, NULL, 'admin.customer_user.change_password', 'Customer Change Password', 0, 253, 5, 1, 0),
(340, NULL, NULL, 'admin.vendor_user.change_password', 'Vendor Change Password', 0, 258, 5, 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `related_courses`
--

INSERT INTO `related_courses` (`id`, `course_id`, `relatedcourse_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, 7, 1, '2024-01-09 23:22:29', '2024-01-09 23:22:29'),
(3, 10, 6, 1, '2024-01-09 23:22:29', '2024-01-09 23:22:29'),
(6, 9, 8, 1, '2024-01-09 23:56:05', '2024-01-09 23:56:05'),
(7, 9, 7, 1, '2024-01-09 23:56:05', '2024-01-09 23:56:05'),
(8, 9, 4, 1, '2024-01-09 23:56:05', '2024-01-09 23:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext DEFAULT NULL,
  `ratting` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `course_id`, `comment`, `ratting`, `status`, `created_at`, `updated_at`) VALUES
(1, 182, 10, 'goog', 5, NULL, '2024-01-10 00:41:48', '2024-01-10 00:41:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `web_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `company_name`, `company_slogan`, `favicon`, `header_image`, `footer_image`, `address_title1`, `address_title2`, `address1`, `address2`, `email1`, `email2`, `phone1`, `phone2`, `license_no`, `facebook`, `twitter`, `instagram`, `youtube`, `right_text`, `design_by_text`, `design_link_text`, `created_at`, `updated_at`, `payment_title`, `payment_image`, `web_title`) VALUES
(4, 'Navieasoft Limited', NULL, '1702442449_favicon.PNG', '1702440395_header-logo.png', '1702442449_footer-logo.PNG', 'fdhgd', 'dgfsgsdfg', 'dhaka', 'dhaka', 'fdhfd@gmail.com', 'dfgsdfg@gmail.com', '01858509214', '01858509214', '283870', 'https://www.youtube.com', 'https://cxvgbfgchnfg', 'https://fghbjty', 'https://vxdhbf', 'fghfdh', NULL, NULL, '2023-12-12 04:15:57', '2024-01-09 05:42:34', 'fdgfdh', '1702376157_payment_image.webp', 'Navieasoft');

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
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blog_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `course_id` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`, `blog_id`, `course_id`) VALUES
(1, 'sdfdsf', 'blog', 1, '2024-01-02 23:08:13', '2024-01-02 23:08:13', NULL, 27),
(2, 'rer', 'blog', 1, '2024-01-02 23:08:13', '2024-01-02 23:08:13', NULL, 27),
(3, 'erer', 'blog', 1, '2024-01-02 23:08:13', '2024-01-02 23:08:13', NULL, 27),
(4, 'trt', 'blog', 1, '2024-01-02 23:08:13', '2024-01-02 23:08:13', NULL, 27),
(5, 'image', 'blog', 1, '2024-01-09 04:23:13', '2024-01-09 04:23:13', 28, NULL),
(6, 'blog', 'blog', 1, '2024-01-09 04:23:13', '2024-01-09 04:23:13', 28, NULL),
(7, 'image', 'blog', 1, '2024-01-09 04:24:25', '2024-01-09 04:24:25', 29, NULL),
(8, 'blog', 'blog', 1, '2024-01-09 04:24:25', '2024-01-09 04:24:25', 29, NULL),
(9, 'navieasoft', 'blog', 1, '2024-01-09 04:24:25', '2024-01-09 04:24:25', 29, NULL),
(10, 'blog', 'blog', 1, '2024-01-09 04:25:19', '2024-01-09 04:25:19', 30, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `comment`, `star`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Razib Ahmed', 'Teacher, Navieasoft LTD', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</span><br></p>', '5', '1703928462_review_image.png', 1, '2023-12-30 03:25:15', '2023-12-30 03:27:42'),
(2, 'Asadusszaman Khan', 'Laravel Developer', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,</span><br></p>', '4', '1703928583_review_image.png', 1, '2023-12-30 03:29:43', '2023-12-30 03:29:43'),
(3, 'Mitul Afnan', 'Student', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</span><br></p>', '3', '1703928663_review_image.png', 1, '2023-12-30 03:31:03', '2023-12-30 03:31:03'),
(4, 'Lutfor Rahman', 'Laravel Developer', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,</span><br></p>', '2', '1703928715_review_image.jpg', 1, '2023-12-30 03:31:55', '2023-12-30 03:31:55'),
(5, 'Moti Khondokar', 'Student', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span><br></p>', '1', '1703928780_review_image.jpg', 1, '2023-12-30 03:33:00', '2023-12-30 03:33:00');

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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `institution` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
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
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT 0,
  `google_id` varchar(200) DEFAULT NULL,
  `facebook_id` varchar(200) DEFAULT NULL,
  `is_super` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `email_verified_at`, `type`, `institution`, `designation`, `description`, `status`, `password`, `mobile`, `address`, `remember_token`, `created_at`, `updated_at`, `shop_name`, `about`, `nid`, `hospital_name`, `speciality`, `experience`, `department`, `bmdc_number`, `nurse_licence_number`, `shop_address`, `trade_licence_number`, `driving_licence_number`, `manufacturer`, `user_code`, `image`, `change_token`, `change_date`, `forget_token`, `forget_date`, `dob`, `gender`, `age`, `google_id`, `facebook_id`, `is_super`) VALUES
(1, 'Admin', '1', 'admin@gmail.com', NULL, 0, NULL, NULL, NULL, 1, '$2y$10$tJCN5uVOYonKK8tSaEdDw.m/wcyZbVmJfihhSmZJC5QnC1G5FEGQO', '01911111111', 'Dhaka', NULL, '2023-10-10 21:55:32', '2023-10-10 21:55:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1),
(173, 'H M Mainuddin Ahammed FCMA', NULL, 'ahammed@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course teaches you&nbsp;<span style=\"font-weight: bolder;\">how to interpret the Trial Balance accounts using the accounting rules</span>&nbsp;that are applied at all levels of Accountancy. You will understand the&nbsp;<span style=\"font-weight: bolder;\">importance of needing Financial Statements</span>&nbsp;to make business decisions. You will learn how to create -</p><ul style=\"padding-left: 2rem; color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><li dir=\"ltr\"><p dir=\"ltr\"><span style=\"font-weight: bolder;\">a Statement of profit &amp; loss and other Comprehensive Income</span></p></li><li dir=\"ltr\"><p dir=\"ltr\"><span style=\"font-weight: bolder;\">&nbsp;a Statement of Financial Position</span></p></li><li dir=\"ltr\"><p dir=\"ltr\"><span style=\"font-weight: bolder;\">a Cash Flow Statement.&nbsp;</span></p></li></ul><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><span style=\"font-weight: bolder;\">This course is suited for anyone who does not have a background in accounting but wants to learn the most important skills for applying accounting knowledge and information at any level (basic to advanced) for financial statements.&nbsp;</span>But Basic Accounting Knowledge is preferred. We will teach everything from the basics of accounting to preparing financial statements.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">So, this course has been designed for: ‘students of finance and accounts professions, financial analysts, start-up founders, managers, accountants, bankers, income tax practitioners, consultants, entrepreneurs, and non-finance professionals.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">After completing this course, learners would be able to prepare a complete set of accounts i.e.,&nbsp;<span style=\"font-weight: bolder;\">Income Statement, Balance Sheet, and Cash Flows Statement.</span>&nbsp;However, learners would have to practice again and again so that they can apply to their respective organizations.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">I sincerely hope that this training can pave the way for your future career. Thank you.</p>', 1, '$2y$12$nvBStEUFbbaXQSTs3uKAH.rMrIgHVGSpkXmw2Et5FIWeWsuWHUTKy', '01858509214', 'dhaka', NULL, '2023-12-19 00:29:49', '2024-01-04 21:32:13', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12142254391703402082_caruser.png', NULL, NULL, NULL, NULL, '2001-01-05', '0', 0, NULL, NULL, 0),
(174, 'Arif Khan', NULL, 'arif@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">In today’s global competitive environment; organizations survive by leveraging their often complex supply chains to create value for the customers.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Organizations must be able to&nbsp;<span style=\"font-weight: bolder;\">supply</span>&nbsp;the appropriate goods and&nbsp;<span style=\"font-weight: bolder;\">services</span>&nbsp;to the right clients at the right time, price, and location. Failure to do so may have serious consequences for the company\'s bottom line.</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><span style=\"font-weight: bolder;\">Supply Chain Management (SCM)</span>&nbsp;is the design, planning, execution, control, and monitoring of supply chain activities to create<span style=\"font-weight: bolder;\">&nbsp;net value, build a competitive infrastructure, leveraging worldwide logistics, synchronize supply with demand, and measure performance locally and globally.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course is designed and articulated to sharpen learners\' knowledge and skills in&nbsp;<span style=\"font-weight: bolder;\">operating supply chain activities efficiently and successfully.</span>&nbsp;Learning the process and procedure of supply chain&nbsp;<span style=\"font-weight: bolder;\">basics, tools, techniques, challenges/ risk factors and solutions, and success issues and staying informed</span>&nbsp;can help you succeed in your supply chain operation.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, '$2y$12$TiIBcLCYRlL4tV/GMgu6d.E4OA1Y2O230qE8CZcbFv.QSrclS8Jma', '01858509214', 'dhaka', NULL, '2023-12-24 01:13:00', '2024-01-04 21:30:38', NULL, NULL, 'sdfsd4534', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10724276541703402033_caruser.png', NULL, NULL, NULL, NULL, '2001-07-05', '0', 0, NULL, NULL, 0),
(175, 'Rubaiyat Shaimom Chowdhury', NULL, 'chowdhury@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course is perfect for you if you are someone who&nbsp;<span style=\"font-weight: bolder;\">wants to start investing in the stock market.&nbsp;</span>There are many misconceptions or myths surrounding stock market investment. In this course, such myths are debunked so that you can start your investment journey with the right information and correct mind setup.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">The course includes&nbsp;<span style=\"font-weight: bolder;\">understanding the stock market&nbsp;</span>and how it works, different types of stocks and stock market terminology, fundamental analysis techniques to evaluate stocks, risk management, the process of opening a brokerage account and making your first trade, and how to create your stock portfolio.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">By the end of the course, participants will have a solid understanding of the stock market and be able to make informed investment decisions&nbsp;about<span style=\"font-weight: bolder;\">&nbsp;buying, holding, or selling a stock.</span></p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">So without any further ado, enroll in the course right now!</p>', 1, '$2y$12$jzA3rBO9YET2V10.b7k5Q.2hf3Nm6hCcbTnNqNsAzHhvayVIt8sRu', '01858509214', 'dhaka', NULL, '2023-12-24 01:15:44', '2024-01-04 21:29:30', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9000576711704425369_caruser.png', NULL, NULL, NULL, NULL, '2024-01-02', '0', 0, NULL, NULL, 0),
(176, 'Lamia Rahman', NULL, 'lamia@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">The Fast Track Spoken English &amp; Fluency course is designed for learners who wish to improve their English speaking skills for effective communication in various social and professional settings.&nbsp;<span style=\"font-weight: bolder;\">This course is ideal for non-native English speakers at different</span>&nbsp;<span style=\"font-weight: bolder;\">proficiency levels, including beginners, intermediate, and advanced learners.</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Throughout the course, learners will focus on developing their speaking skills through a comprehensive curriculum that covers essential aspects of spoken English. The course will focus on&nbsp;<span style=\"font-weight: bolder;\">improving pronunciation, intonation, fluency, vocabulary, and grammar while also building confidence and reducing language barriers.</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">The course will be conducted in&nbsp;an<span style=\"font-weight: bolder;\">&nbsp;interactive and communicative manner</span>, with an emphasis on real-life scenarios and the practical application of language skills. Learners will engage in various speaking activities to enhance their speaking abilities in different contexts.</p>', 1, '$2y$12$bv.3d3/0ADiLhzDViPoNhOKUA1DW.obP1cCy79arAzn5jISumJ7nC', '01858509214', 'dhaka', NULL, '2023-12-24 01:17:04', '2024-01-04 21:28:14', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4290328171704425294_caruser.png', NULL, NULL, NULL, NULL, '2010-09-05', '1', 0, NULL, NULL, 0),
(178, 'Eftykhar Rahman', NULL, 'rahman@gmail.com', NULL, 3, 'Rm group limit', 'Managing Director', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Welcome to the Full Stack Web Development in MERN Stack Live Batch, instructed by the expert web developer, Eftykhar Rahman! Are you ready to embark on an&nbsp;</span><br></p>', 1, '$2y$12$u7gOVkAS6OSuuVx6Q09.Y.FnppcCbGXE8wJJ6ToCpKLz1LosnDP0m', '01858509214', 'dhaka', NULL, '2023-12-25 05:13:41', '2024-01-09 04:18:55', NULL, NULL, 'dfsg4353', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9671108511704795492_caruser.png', NULL, NULL, NULL, NULL, '2023-12-19', '0', 0, NULL, NULL, 0),
(180, 'Kalam', NULL, 'usesdfasr@gmail.com', NULL, 4, 'Rm group limit', 'Managing Director', '<span style=\"color: rgb(108, 117, 125); font-family: &quot;Open Sans&quot;; font-size: 20px;\">Eftykhar Rahman is a full-stack web developer who is involved with coding and web development since 2018. Currently, working as a freelance developer. He holds a bachelor\'s degree in Computer Science &amp; Engineering and has over 4+ years of developing scalable software infrastructure across multiple domains which include health, e-commerce, and businesses. Along with being a businessperson, he always had a passion for teaching and his goal is to pass on his knowledge to his students and empower them to achieve their goals in the IT sector.</span>', 1, '$2y$12$/2aGc5Ood1crGgU0Tx8Fe.kLrvR/LFX3OyNAI/SwgcPM.1wdrzM/q', '01858509214', 'dhaka', NULL, '2023-12-28 02:44:26', '2023-12-28 02:44:26', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4430742591703753066_image.png', NULL, NULL, NULL, NULL, '2023-12-04', '0', 0, NULL, NULL, 0),
(182, 'shohag', NULL, 'student@gmail.com', NULL, 1, '', '', '<p>rdtguyh nrtyrt</p>', 1, '$2y$12$m45SOl/Dz/uioFAQH2cVuuooEvxcsH5KJSWz0bPMczWhN4UG//zuO', '01858509214', 'dhaka', '56yeOzc4xgMj1eepCs6IGhXqYrCJzKTdJRFLncixwfY19YOhODOD9htgQ7ua', '2024-01-02 00:20:36', '2024-01-08 04:32:10', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1704709930_user_image.png', '7rm6iq', '2024-01-02 08:32:09', NULL, NULL, '2024-01-12', '0', 0, NULL, NULL, 0),
(183, 'Muhammad J. Munir', NULL, 'muhammad@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">To carry out a business meeting successfully, there must be perfect coordination. This means there should be no wastage and that all of the insightful ideas from the attendees should be considered.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">People conduct many business meetings these days both online and offline. One has to be familiar with some&nbsp;<span style=\"font-weight: bolder;\">fundamental techniques</span>&nbsp;that can be used both&nbsp;<span style=\"font-weight: bolder;\">online and offline</span>&nbsp;in order to conduct a successful meeting.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">So now I\'m going to start my course, which will cover a lot of ground in managing business meetings effectively. Here, I\'ll go through a number of meeting etiquette basics with you. An important part of making effective meetings is to know your attendees.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">To conduct a professional business meeting, it is highly advantageous to be aware of each&nbsp;<span style=\"font-weight: bolder;\">person\'s qualities, attributes, and traits.</span>&nbsp;The course\'s final but standout component is its list of&nbsp;<span style=\"font-weight: bolder;\">10 tips</span>&nbsp;for conducting productive business meetings. Experts have verified the suggestions throughout the world.&nbsp;</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">By doing this, you can make the most of a business meeting. So good luck for the time being. I\'ll see you in the lesson videos. Thanks a lot.</p>', 1, '$2y$12$keBPG4cRZ7mto6wZYzVNjuOvqnNDq34PQY0EL/XDy/p8qAxlpwUaq', '01858509214', 'dhaka', NULL, '2024-01-04 21:33:59', '2024-01-04 21:33:59', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3371077431704425639_image.jpg', NULL, NULL, NULL, NULL, '2024-01-08', '0', 0, NULL, NULL, 0),
(184, 'Amir Hamza', NULL, 'hamza@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course will serve the purpose of teachers\' training. The&nbsp;course typically focuses on preparing individuals to become effective educators while also providing them with the skills and knowledge to train and support other teachers. These courses vary widely in content, duration, and delivery methods, but they commonly cover several key areas.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course is about different kinds of games and activities which can possibly be implemented offline and online, in classrooms in different virtual mediums like Zoom/meet/teams/skype.</p><p dir=\"ltr\" style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><span style=\"font-weight: bolder;\">The Games are explained in a way so that would be used for both virtual and physical mediums.&nbsp;</span></p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">These games not only give energy to the participants but also help to break the ice and most importantly sometimes these games help to unwrap new content into participants and also lesson delivery.&nbsp;<br>Some of the activities also help to know each other and team building.&nbsp;<br>Basically, this training will be a great tool for the existing trainers who are going to conduct sessions over virtual mediums and also the upcoming trainers who want to maximize their skill in the training sector before coming to this sector.&nbsp;</p>', 1, '$2y$12$Rf3b7SaJZOwi3x9m4cJn4u/SIgnPeZhTsJub2Jod6y3Y0djhehQVK', '01858509214', 'dhaka', 'r2DRRc5MGNNmpeSVFudFnFNGH1XGh9IU3eHzwYuWAAylQVtAwtpFqeJTbDf4', '2024-01-04 21:35:45', '2024-01-04 21:35:45', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2594029671704425745_image.png', NULL, NULL, NULL, NULL, '2024-01-10', '0', 0, NULL, NULL, 0),
(185, 'Tanvir Anjum', NULL, 'tanvir@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p><span style=\"font-weight: bolder; color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Did You Know?</span><br style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Every year, thousands of individuals in Bangladesh and around the world take the Graduate Record Examination (GRE) as a crucial step in their educational journey. In Bangladesh alone, a growing number of aspiring students and professionals are sitting for the GRE to pursue higher education opportunities globally. Worldwide, the GRE is a widely recognized and accepted assessment for graduate-level admissions, opening doors to a multitude of academic and career possibilities.</span><br style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">So, are you ready to excel in the Graduate Record Examination (GRE) and unlock unparalleled opportunities for your academic and professional success? Join our Comprehensive GRE Prep course, expertly curated and instructed by the seasoned professional Tanvir Anjum.&nbsp;</span><br></p>', 1, '$2y$12$q0EnX8VeLGewY1rnRIuI2eoBSWpM/6qQ85/nsudR6am/zEHrT4ZPK', '01858509214', 'dhaka', NULL, '2024-01-04 22:26:36', '2024-01-04 22:26:36', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16234940981704428796_image.png', NULL, NULL, NULL, NULL, '2024-01-22', '0', 0, NULL, NULL, 0),
(186, 'Zawad Hasan Adib', NULL, 'zawad@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">It is not bad to have the achievement of doing an MBA from IBA in your list of achievements after graduation. You can grab the golden opportunity to work in the world\'s leading organizations, and take many steps forward in your career if you complete your post-graduation from IBA. We have brought the course “English for IBA-MBA Admission Preparation” to fulfil your dream of doing an MBA in IBA.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course is designed by analyzing the question pattern of IBA of universities for those who want to \'prepare\' for the day or evening program of IBA-MBA of DU, JU or other universities at the post-graduation or post-graduation level.</p>', 1, '$2y$12$HDc0a0FS4iM1ywf6lrTPQu4ggmwvIo.r9GY8s.WDPUL8z3kz8A0zu', '01858509214', 'dhaka', NULL, '2024-01-04 22:28:13', '2024-01-04 22:28:13', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10702669811704428893_image.png', NULL, NULL, NULL, NULL, '2024-01-14', '0', 0, NULL, NULL, 0),
(187, 'akash Ghosh', NULL, 'Akash@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Ready to take your career to new heights? Dive into the world of digital marketing with our cutting-edge course, designed to catapult you into a lucrative and dynamic industry where innovation knows no bounds.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Our comprehensive digital marketing course is not just an educational program; it\'s a gateway to an exciting and ever-growing industry that powers the online presence of businesses, fuels e-commerce, and shapes the future of marketing.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">This course is designed to empower you with a diverse skill set that\'s in high demand across industries. From mastering the art of Search Engine Optimization (SEO) to becoming an expert in social media marketing, pay-per-click (PPC) advertising, and content creation, you\'ll acquire the tools and knowledge to navigate the digital landscape with confidence.</p>', 1, '$2y$12$qKRNY/LILVVQFEReUWqqzOcoalsOjXOwBB1Aa4jpY.WHE5JBN/.Ke', '01858509214', 'dhaka', NULL, '2024-01-04 22:34:49', '2024-01-04 22:34:49', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9187668751704429289_image.png', NULL, NULL, NULL, NULL, '2024-01-15', '0', 0, NULL, NULL, 0),
(188, 'Shah Paran', NULL, 'Paran@gmail.com', NULL, 2, 'Rm group limit', 'Managing Director', '<p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Are you ready to embark on a journey that will transform your career and open doors to unparalleled success in the digital age? Introducing our cutting-edge \"Technology in Leadership\" course – the ultimate pathway to lucrative opportunities and impactful leadership in today\'s rapidly evolving tech landscape.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">In this dynamic course, you\'ll master the essential skills modern leaders need to thrive in technology-driven environments. From strategic thinking to data-driven decision-making, from innovation management to cybersecurity awareness – our comprehensive curriculum empowers you to lead with confidence and authority.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Step into a world where your leadership prowess intersects seamlessly with technological innovation. Our \"Technology in Leadership\" course empowers you to commandeer the helm of success, guiding your organization to new heights and propelling your career to lucrative horizons.</p><p style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Don\'t miss out on this transformative opportunity. Enroll today and become the tech-savvy leader that every organization dreams of having at the helm. Your journey to a lucrative future starts here.</p>', 1, '$2y$12$n4xNqNkPPyMP.7aKZ1eu3e8hEH6q7iytjlGtHzqZGOU/b//ew33Cy', '01858509214', 'dhaka', NULL, '2024-01-04 22:37:54', '2024-01-04 22:37:54', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2670415951704429474_image.png', NULL, NULL, NULL, NULL, '2024-01-22', '0', 0, NULL, NULL, 0),
(189, 'Emran', NULL, 'emran@gmail.com', NULL, 3, 'Rm group limit', 'Managing Director', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Welcome to the Full Stack Web Development in MERN Stack Live Batch, instructed by the expert web developer, Eftykhar Rahman! Are you ready to embark on an&nbsp;</span><br></p>', 1, '$2y$12$6aooHvRzsQ2z1dRgZam2p.zapoWM96M5TXUztC/E2IM/f9V7.i/1e', '01858509214', 'dhaka', NULL, '2024-01-05 07:18:10', '2024-01-09 04:18:37', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1993832421704795482_caruser.png', NULL, NULL, NULL, NULL, '2024-01-24', '0', 0, NULL, NULL, 0),
(190, 'Masud Khan', NULL, 'masud@gmail.com', NULL, 2, 'Navieasoft', 'Managing Director', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop</span><br></p>', 1, '$2y$12$BCoqevurr7fPb3KFbeLry.6WFv1dkjYgo8aX5fg3fKdS6ZP7ApRk6', '01858509214', 'dhaka', NULL, '2024-01-09 04:50:27', '2024-01-09 04:50:27', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9826717591704797427_image.jpg', NULL, NULL, NULL, NULL, '2024-01-15', '0', 0, NULL, NULL, 0),
(191, 'Syed Ferhat Anwar', NULL, 'syed@gmail.com', NULL, 2, 'Navieasoft', 'Former Director, IBA,', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop</span><br></p>', 1, '$2y$12$X9DZDD1ZYKNqn7kqx64AlO8BoExRBA/t6VpEt2qZOooYgplAfQiC.', '01858509214', 'dhaka', NULL, '2024-01-09 04:51:56', '2024-01-09 04:51:56', NULL, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1840759751704797516_image.png', NULL, NULL, NULL, NULL, '2024-01-14', '0', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE IF NOT EXISTS `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) UNSIGNED NOT NULL DEFAULT 0,
  `event_id` bigint(255) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `contact_type` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `user_id`, `event_id`, `name`, `mobile`, `email`, `type`, `contact_type`, `organization`, `date`, `details`, `created_at`, `updated_at`) VALUES
(2, 0, 0, 'shohag', '01858509214', 'test2@gmail.com', 'instructor', NULL, 'dfsgd', '2023-12-26T13:12', 'gfh ftg', '2023-12-23 01:12:11', '2023-12-23 01:12:11'),
(3, 0, 0, 'shohag', '01858509214', 'user@gmail.com', 'instructor', NULL, 'dfsgd', '2023-12-26T13:24', 'frgsfd rtdghd', '2023-12-23 01:24:29', '2023-12-23 01:24:29'),
(4, 0, 0, 'gfdht', '01858509214', 'fgjf@gmail.com', 'student', NULL, 'dfsgd', '2023-12-27T09:13', 'frrgsrtgy', '2023-12-25 21:13:11', '2023-12-25 21:13:11'),
(6, 0, 0, 'shohag', '01858509214', 'navihhhhhhfeapc@gmail.com', 'student', 'contact', 'fghh', '2024-01-23T09:58', 'gfdhfh', '2023-12-31 21:58:13', '2023-12-31 21:58:13'),
(7, 182, 1, NULL, NULL, NULL, NULL, 'event', NULL, NULL, 'good ss ss', '2024-01-10 00:44:48', '2024-01-10 01:22:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_models`
--

INSERT INTO `visitor_models` (`id`, `ip_address`, `visit_time`, `created_at`, `updated_at`) VALUES
(1, '::1', '2024-01-09 05:20:39pm', '2024-01-09 11:20:39', '2024-01-09 11:20:39'),
(2, '::1', '2024-01-09 05:40:11pm', '2024-01-09 11:40:11', '2024-01-09 11:40:11'),
(3, '::1', '2024-01-09 05:42:40pm', '2024-01-09 11:42:40', '2024-01-09 11:42:40'),
(4, '::1', '2024-01-10 10:25:00am', '2024-01-10 04:25:00', '2024-01-10 04:25:00'),
(5, '::1', '2024-01-10 10:26:18am', '2024-01-10 04:26:18', '2024-01-10 04:26:18'),
(6, '::1', '2024-01-10 10:27:00am', '2024-01-10 04:27:00', '2024-01-10 04:27:00'),
(7, '::1', '2024-01-10 10:29:02am', '2024-01-10 04:29:02', '2024-01-10 04:29:02'),
(8, '::1', '2024-01-10 10:31:39am', '2024-01-10 04:31:39', '2024-01-10 04:31:39'),
(9, '::1', '2024-01-10 10:35:22am', '2024-01-10 04:35:22', '2024-01-10 04:35:22'),
(10, '::1', '2024-01-10 10:40:24am', '2024-01-10 04:40:24', '2024-01-10 04:40:24'),
(11, '::1', '2024-01-10 11:00:07am', '2024-01-10 05:00:07', '2024-01-10 05:00:07'),
(12, '::1', '2024-01-10 11:12:05am', '2024-01-10 05:12:05', '2024-01-10 05:12:05'),
(13, '::1', '2024-01-10 11:19:35am', '2024-01-10 05:19:35', '2024-01-10 05:19:35'),
(14, '::1', '2024-01-10 11:22:53am', '2024-01-10 05:22:53', '2024-01-10 05:22:53'),
(15, '::1', '2024-01-10 12:40:07pm', '2024-01-10 06:40:07', '2024-01-10 06:40:07'),
(16, '::1', '2024-01-10 12:42:26pm', '2024-01-10 06:42:26', '2024-01-10 06:42:26'),
(17, '::1', '2024-01-10 01:14:43pm', '2024-01-10 07:14:43', '2024-01-10 07:14:43'),
(18, '::1', '2024-01-10 01:26:40pm', '2024-01-10 07:26:40', '2024-01-10 07:26:40'),
(19, '::1', '2024-01-10 01:45:48pm', '2024-01-10 07:45:48', '2024-01-10 07:45:48'),
(20, '::1', '2024-01-10 02:44:25pm', '2024-01-10 08:44:25', '2024-01-10 08:44:25'),
(21, '::1', '2024-01-10 02:44:27pm', '2024-01-10 08:44:27', '2024-01-10 08:44:27'),
(22, '::1', '2024-01-10 02:46:28pm', '2024-01-10 08:46:28', '2024-01-10 08:46:28');

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
