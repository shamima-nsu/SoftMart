-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2016 at 03:41 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `userId`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 56, 'Could you please provide more details? I''m trying to create comment section and getting this error while using Ajax in Laravel 5 framework. Though I''ve tried different solutions, I couldn''t figure the problem out. So, any opinion would be greatly appreciated.\r\n\r\nThe input fields are as follows:  Thanks (while using Ajax in Laravel 5)\r\n\r\nup vote\r\n0\r\ndown vote\r\nfavorite\r\nI''m trying to create comment section and getting this error while using Ajax in Laravel 5 framework. Though I''ve tried different solutions, I couldn''t figure the problem out. So, any opinion would be greatly appreciated.\r\n\r\nThe input fields are as follows:\r\n\r\nKnow someone who can answer? Share a link to this question via email, Google+, Twitter, or Facebook.', '2015-08-19 04:18:34', '2015-08-19 05:24:37'),
(2, 2, 56, 'Could you please provide info about budget? Thanks', '2015-08-26 08:31:36', '2015-08-26 11:35:35'),
(3, 2, 64, 'ok :)', '2015-09-18 00:30:30', '2015-09-18 00:30:30'),
(11, 17, 56, 'egnr sfg', '2015-09-28 12:55:25', '2015-09-28 12:55:25'),
(12, 3, 64, 'f,dg zfgh szfidhg', '2015-09-29 00:39:12', '2015-09-29 00:39:12'),
(14, 23, 56, 'more details plz..', '2015-09-29 23:09:52', '2015-09-29 23:09:52'),
(17, 23, 64, 'updated', '2015-09-29 23:49:55', '2015-09-29 23:49:55'),
(18, 28, 64, 'jlo;;', '2015-11-06 09:39:44', '2015-11-06 09:39:44'),
(19, 2, 64, 'tfgn ihln', '2015-11-06 09:40:36', '2015-11-06 09:40:36'),
(20, 23, 64, ':)', '2015-11-24 01:23:49', '2015-11-24 01:23:49'),
(21, 21, 56, 'More details please', '2015-11-27 07:29:52', '2015-11-27 07:29:52'),
(22, 21, 64, 'Updated :)', '2015-11-27 07:32:42', '2015-11-27 07:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contactNo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `websiteUrl` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `confirmCode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `name`, `address`, `email`, `contactNo`, `country`, `websiteUrl`, `confirmCode`, `created_at`, `updated_at`) VALUES
(1, 'Atomix', 'Bashundhara', '', '1234567', 'Bangladesh', 'http://www.atomixsystem.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Atomix System', 'Bashundhara, Dhaka', 'support@atomixsystem.com', '123456789', 'Bangladesh', 'http://www.atomixsystem.com', '', '2015-08-17 04:26:19', '2015-08-17 04:26:19'),
(3, 'Dream71', 'Bashundhara, Dhaka', 'info@dream71.com', '9876543', 'Bangladesh', 'http://dream71.com', '', '2015-08-17 04:58:59', '2015-08-17 04:58:59'),
(6, 'AplombTech', 'Bashundhara, Dhaka 1229', 'info@app.com', '12345678', 'Bangladesh', 'http://aplombtechbd.com', '', '2015-08-19 04:36:47', '2015-08-19 04:36:47'),
(8, 'Aplomb Tech', 'Bashundhara, Dhaka - 1229', 'info@aplombtech.com', '1234566', 'Bangladesh', 'http://aplombtechbd.com/', '', '2015-08-26 23:50:52', '2015-09-09 03:44:29'),
(9, 'ABCD company', 'Bashundhara, Dhaka 1229', 'brishti293@yahoo.com', '+88 0123456789', 'Bangladesh', 'http://www.abcd.com', '', '2015-09-02 00:24:24', '2015-09-02 00:24:24'),
(14, 'adc', 'House: 13, Road: 5, Nikunja-2, Dhaka 1229', 'golamsarwar020@gmail.com', '1234', 'Bangladesh', 'http://www.asd.com', '', '2015-09-27 04:43:45', '2015-09-27 04:43:45'),
(15, 'abc', 'fhm fdnfnmf', 'brishti293@yahoo.com', '12345', 'Bangladesh', 'http://abc.com', '', '2015-11-09 12:28:32', '2015-11-09 12:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(100) NOT NULL,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `postId` int(100) DEFAULT NULL,
  `quotationId` int(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `postId`, `quotationId`, `created_at`, `updated_at`) VALUES
(3, '482_report1_final2.pdf', NULL, 37, '2015-09-14 00:34:19', '2015-09-14 00:34:19'),
(4, 'UML.pdf', NULL, 38, '2015-09-14 02:52:19', '2015-09-14 02:52:19'),
(5, 'UML.pdf', 17, NULL, '2015-09-14 02:59:19', '2015-09-14 02:59:19'),
(6, 'Requirements.docx', 19, NULL, '2015-09-14 03:06:06', '2015-09-14 03:06:06'),
(7, '482_report1_final2.pdf', 20, NULL, '2015-09-18 01:39:12', '2015-09-18 01:39:12'),
(8, '482_report1_final2.pdf', 21, NULL, '2015-09-18 01:40:16', '2015-09-18 01:40:16'),
(9, 'cse326_sp15_midterm_sol.pdf', NULL, 39, '2015-09-18 02:48:16', '2015-09-18 02:48:16'),
(10, 'Requirements.pdf', 22, NULL, '2015-09-22 09:06:46', '2015-09-22 09:06:46'),
(11, 'Requirements.pdf', 23, NULL, '2015-09-24 00:54:28', '2015-09-24 00:54:28'),
(12, 'Report 4.docx', NULL, 47, '2015-09-25 08:42:31', '2015-09-25 08:42:31'),
(13, 'Advising.pdf', NULL, 53, '2015-09-28 13:45:54', '2015-09-28 13:45:54'),
(14, 'Practice questions_2_minimizeDFA.pdf', 25, NULL, '2015-09-29 01:08:40', '2015-09-29 01:08:40'),
(15, 'Installation Guide.pdf', NULL, 54, '2015-09-29 12:37:43', '2015-09-29 12:37:43'),
(16, 'Student--New-Email-Form.pdf', NULL, 55, '2015-09-29 12:40:26', '2015-09-29 12:40:26'),
(17, 'primary.pdf', 27, NULL, '2015-09-29 23:16:58', '2015-09-29 23:16:58'),
(18, '482_report1_final2.pdf', 28, NULL, '2015-09-30 01:14:40', '2015-09-30 01:14:40'),
(19, 'cse326_sp15_midterm_sol.pdf', NULL, 56, '2015-09-30 01:17:25', '2015-09-30 01:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL,
  `receiver` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `receiver`, `sender`, `content`, `seen`, `created_at`, `updated_at`) VALUES
(1, 64, 56, 'hi', 1, '2015-09-20 18:00:00', '2015-09-21 23:25:08'),
(2, 64, 65, 'abfvsdn safvdn bh szvkn fb afsh bs,nfg svnb svnb szfsf shgdnd ghagh', 1, '2015-09-18 18:00:00', '2015-09-21 23:25:08'),
(3, 65, 64, 'hello :)', 1, '2015-09-21 23:01:43', '2015-09-21 23:20:50'),
(4, 56, 64, 'hi :)', 1, '2015-09-21 23:02:18', '2015-09-22 03:07:04'),
(5, 65, 64, 'project details pls', 1, '2015-09-22 01:09:09', '2015-09-22 01:11:39'),
(6, 56, 64, 'bfsg adsigdjh. sfhvdlhm sghldfmj szgfmj szdgd sfgis afsbg h', 1, '2015-09-22 02:56:36', '2015-09-22 03:07:04'),
(16, 64, 56, 'ok', 1, '2015-09-25 08:36:13', '2015-09-25 09:05:01'),
(18, 65, 64, 'efkeg wqfnegm afFGGM Aidfa ggojafS fnwgmadaf', 1, '2015-09-27 06:34:32', '2015-09-29 00:45:18'),
(20, 65, 64, 'ok', 1, '2015-09-27 06:36:39', '2015-09-29 00:45:18'),
(21, 65, 64, 'wqbfg gi FGPWG WFNSNndgf', 1, '2015-09-27 06:39:33', '2015-09-29 00:45:18'),
(24, 64, 65, 'ok :)', 1, '2015-09-29 05:35:36', '2015-12-01 00:55:51'),
(25, 64, 65, 'fn aflsjg asdajifh dsjfdg fh', 1, '2015-09-29 23:12:49', '2015-11-08 23:55:02'),
(26, 64, 65, 'ok', 1, '2015-09-30 01:19:09', '2015-11-08 23:55:02'),
(27, 68, 1, 'dhaka uni', 0, '2015-10-29 08:25:09', '2015-10-29 08:25:09'),
(28, 68, 1, 'jvds', 0, '2015-10-29 08:25:31', '2015-10-29 08:25:31'),
(29, 65, 64, 'nfkdfb vkfbn', 0, '2015-11-08 23:55:31', '2015-11-08 23:55:31'),
(30, 65, 64, 'ifngas afisaafa afnasf', 0, '2015-11-22 08:06:12', '2015-11-22 08:06:12'),
(31, 65, 64, 'igiuh', 0, '2015-11-24 01:25:12', '2015-11-24 01:25:12'),
(32, 64, 56, 'if you are interested, then send me an email', 0, '2015-11-29 13:48:31', '2015-12-01 03:06:16'),
(33, 56, 64, 'More details please', 0, '2015-11-30 01:59:17', '2015-11-30 01:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_24_064055_create_posts_table', 1),
('2015_07_24_064210_create_quotations_table', 1),
('2015_07_24_070617_create_company_details_table', 1),
('2015_07_24_070701_create_user_role_table', 1),
('2015_07_24_070822_create_software_categories_table', 1),
('2015_07_24_083614_create_comments_table', 1),
('2015_07_24_085214_create_review_table', 1),
('2015_07_24_085248_create_likes_table', 1),
('2015_07_24_085321_create_messages_table', 1),
('2015_07_24_085411_create_software_category_table', 1),
('2015_07_24_085556_create_msg_delete_history', 1),
('2015_07_24_105739_create_ratings_table', 1),
('2015_07_27_030632_create_notifications_table', 1),
('2015_08_10_102654_create_skills_table', 2),
('2015_08_10_102955_create_skills_and_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL,
  `receiverId` int(11) NOT NULL,
  `reviewRequestId` int(11) DEFAULT NULL,
  `ReviewId` int(11) DEFAULT NULL,
  `quotationId` int(11) DEFAULT NULL,
  `commentId` int(11) DEFAULT NULL,
  `senderId` int(11) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `receiverId`, `reviewRequestId`, `ReviewId`, `quotationId`, `commentId`, `senderId`, `seen`, `created_at`, `updated_at`) VALUES
(1, 64, NULL, NULL, NULL, NULL, 56, 1, '2015-09-20 18:00:00', '2015-09-28 13:01:42'),
(2, 64, NULL, NULL, NULL, 10, 56, 1, '2015-09-28 12:40:47', '2015-09-28 13:01:41'),
(3, 64, NULL, NULL, NULL, 11, 56, 1, '2015-09-28 12:55:25', '2015-09-28 13:01:41'),
(4, 64, 2, NULL, NULL, NULL, 56, 1, '2015-09-28 12:56:45', '2015-09-28 13:01:41'),
(6, 64, NULL, NULL, 53, NULL, 56, 1, '2015-09-28 13:46:00', '2015-09-28 13:46:24'),
(7, 64, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-28 23:46:49', '2015-09-28 23:50:44'),
(9, 64, NULL, NULL, NULL, 13, 66, 1, '2015-09-29 01:21:01', '2015-09-29 01:22:30'),
(10, 64, NULL, NULL, 54, NULL, 56, 1, '2015-09-29 12:37:49', '2015-09-29 13:23:03'),
(11, 64, NULL, NULL, 55, NULL, 56, 1, '2015-09-29 12:40:30', '2015-09-29 13:23:03'),
(12, 64, NULL, NULL, NULL, 14, 56, 1, '2015-09-29 23:09:52', '2015-12-01 02:12:25'),
(13, 64, NULL, NULL, NULL, 15, 65, 1, '2015-09-29 23:14:04', '2015-09-30 01:11:38'),
(14, 64, NULL, NULL, NULL, 16, 64, 1, '2015-09-29 23:49:18', '2015-09-30 01:11:38'),
(15, 64, NULL, NULL, NULL, 17, 64, 0, '2015-09-29 23:49:55', '2015-12-01 02:37:48'),
(16, 65, NULL, NULL, 56, NULL, 56, 1, '2015-09-30 01:17:31', '2015-09-30 01:17:37'),
(17, 65, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-30 01:18:43', '2015-09-30 01:18:54'),
(18, 65, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-30 01:18:44', '2015-09-30 01:18:54'),
(19, 65, NULL, NULL, NULL, NULL, NULL, 1, '2015-09-30 01:18:46', '2015-09-30 01:18:54'),
(20, 65, NULL, NULL, NULL, 18, 64, 1, '2015-11-06 09:39:44', '2015-11-30 02:42:40'),
(21, 64, NULL, NULL, NULL, 21, 56, 0, '2015-11-27 07:29:52', '2015-12-01 02:37:48'),
(22, 65, 2, NULL, NULL, NULL, 56, 1, '2015-11-30 02:42:20', '2015-11-30 02:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(100) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, '', 'cfbef4aaeeb2133c15d2660bd0c00dc9', '2015-09-26 08:04:23', '2015-09-26 08:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `pending_requests`
--

CREATE TABLE IF NOT EXISTS `pending_requests` (
  `id` int(100) NOT NULL,
  `userId` int(200) NOT NULL,
  `userRoleId` int(100) DEFAULT NULL,
  `postId` int(100) DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skill` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pending_requests`
--

INSERT INTO `pending_requests` (`id`, `userId`, `userRoleId`, `postId`, `category`, `skill`, `seen`, `created_at`, `updated_at`) VALUES
(79, 64, 5, NULL, NULL, NULL, 0, '2015-12-14 08:29:45', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `pics`
--

CREATE TABLE IF NOT EXISTS `pics` (
  `id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pics`
--

INSERT INTO `pics` (`id`, `userId`, `name`, `created_at`, `updated_at`) VALUES
(9, 64, '64_11913058_1143489965665958_1098994936_n.jpg', '2015-09-29 04:40:14', '2015-09-29 04:40:14'),
(10, 64, '64_maxresdefault.jpg', '2015-09-29 04:46:46', '2015-09-29 04:46:46'),
(13, 64, '64_setsuk5lejrs.png', '2015-09-29 23:48:09', '2015-09-29 23:48:09'),
(14, 64, '64_11329764_10204188297260040_1485605767288852717_n.jpg', '2015-09-29 23:48:58', '2015-09-29 23:48:58'),
(15, 64, '64_11913058_1143489965665958_1098994936_n.jpg', '2015-09-30 01:04:14', '2015-09-30 01:04:14'),
(16, 64, '64_11329764_10204188297260040_1485605767288852717_n.jpg', '2015-09-30 01:04:38', '2015-09-30 01:04:38'),
(17, 64, '64_4462_1066470674399_968491_n.jpg', '2015-10-29 07:03:28', '2015-10-29 07:03:28'),
(18, 64, '64_8123-794644-20101216113704.jpg', '2015-10-29 07:03:47', '2015-10-29 07:03:47'),
(19, 64, '64_64_11329764_10204188297260040_1485605767288852717_n.jpg', '2015-10-29 07:05:35', '2015-10-29 07:05:35'),
(20, 64, '64_3312_1059260654153_7496321_n.jpg', '2015-11-08 10:28:31', '2015-11-08 10:28:31'),
(21, 64, '64_29888_1057196962562_2180527_n.jpg', '2015-11-08 10:28:55', '2015-11-08 10:28:55'),
(22, 64, '64_165409_10152772715605226_1463087222_n.jpg', '2015-11-08 10:29:09', '2015-11-08 10:29:09'),
(23, 64, '64_64_64_11329764_10204188297260040_1485605767288852717_n.jpg', '2015-11-08 10:37:35', '2015-11-08 10:37:35'),
(24, 64, '64_123024.jpg', '2015-11-24 01:26:17', '2015-11-24 01:26:17'),
(25, 64, '64_3788_10151295419782027_421460588_n.jpg', '2015-11-24 01:26:36', '2015-11-24 01:26:36'),
(26, 64, '64_superthumb.jpg', '2015-11-27 07:25:36', '2015-11-27 07:25:36'),
(27, 64, '64_82117_510798455614712_400160021_n.jpg', '2015-11-27 07:26:23', '2015-11-27 07:26:23'),
(28, 64, '64_971618_270639609741085_710873831_n.jpg', '2015-11-27 07:32:21', '2015-11-27 07:32:21'),
(29, 64, '64_11329764_10204188297260040_1485605767288852717_n.jpg', '2015-11-30 05:14:07', '2015-11-30 05:14:07'),
(30, 64, '64_64_165409_10152772715605226_1463087222_n.jpg', '2015-11-30 23:46:25', '2015-11-30 23:46:25'),
(31, 64, '64_64_971618_270639609741085_710873831_n.jpg', '2015-12-01 00:39:39', '2015-12-01 00:39:39'),
(32, 64, '64_64_8123-794644-20101216113704.jpg', '2015-12-01 01:47:35', '2015-12-01 01:47:35'),
(33, 64, '64_11329764_10204188297260040_1485605767288852717_n.jpg', '2015-12-01 02:40:33', '2015-12-01 02:40:33'),
(34, 64, '64_56_karlene-quigley-large.jpg', '2015-12-01 02:44:54', '2015-12-01 02:44:54'),
(35, 64, '64_11329764_10204188297260040_1485605767288852717_n.jpg', '2015-12-01 02:46:30', '2015-12-01 02:46:30'),
(36, 56, '56_1375017_536209386459075_1849753861_n.jpg', '2015-12-12 08:47:00', '2015-12-12 08:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `duration` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `categoryId` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userId`, `title`, `description`, `deadline`, `duration`, `status`, `categoryId`, `created_at`, `updated_at`) VALUES
(1, 65, 'Converting PSD template to customizable Wordpress theme', 'Using a provided PSD template, we would like this to be converted into a customizable and flexible Wordpress template. The flexbility will be in allowing the user to customize the template to their needs in order to develop the website', '2015-09-25', '', 1, 2, '2015-08-17 18:00:00', '2015-09-18 05:56:09'),
(2, 64, 'Optubook: Usertesting database and test tool', 'We need full development according to the attached specs. HTML/CSS and My/SQL development of relatively simple online database, with some conditions, some validation, simple userinterface and 2-3 dynamic pages.', '2015-10-31', '6 months', 1, 2, '2015-08-09 18:00:00', '2015-09-18 05:56:09'),
(3, 65, 'Online chess room', 'Hi, I am looking for a game developer, for developing an online/virtual chess room for coaching. There will be a chess board, moves recorder and a one-to-many chat facility (real human; not computer), as in an online chess school. Take care! Thanks!', '2015-09-30', '', 1, 4, '2015-08-10 18:00:00', '2015-09-18 05:54:38'),
(9, 65, 'Migrate Wordpress & Drupal site from hosting account to VPS', 'We need to migrate our sites from our hosting account to a VPS. We need a network administrator who can complete this job for us, and make sure everything is working fine on the new location. You need significant experience in server administration, but you also need experience from working with drupal and wordpress platforms. Project plan 1. Set up VPS environment and install required software. We need the recommended settings to operate with current traffic and activity level. 2. move all files and databases to new server (8 GB & 5 MySQL databases) 3. Change ip references and make sure SSL certificates are installed properly and performance level is top notch. 4. Set up backup facility 5. Set live site in maintenance mode, migrate most recent db and change DNS. The current hosting account is home to: 1 mulitisite Wordpress network 1 drupal site 1 standalone php application', '2015-08-26', '6 months', 1, 11, '2015-08-24 21:53:42', '2015-09-18 05:56:09'),
(14, 64, 'HR management', 'Now we finally have our view that brings all of the parts we created together. You can go ahead and play around with the application. All the parts should fit together nicely and creating and deleting comments should be done without a page refresh.', '2015-11-01', '5 months', 0, 2, '2015-08-25 04:09:52', '2015-09-18 05:56:09'),
(16, 65, 'Chatting Application', 'gaKcvhn CLhLZKCn \r\nsfvj;dvm c;zj.vm ', '2015-09-14', '7 months', 1, 3, '2015-08-25 04:19:32', '2015-09-18 05:54:37'),
(17, 64, 'Web Design plus Logo', 'Create a Logo, re-design a website, incorporate E-mail and make it dynamic/responsive. Must be able to accomplish all details of the website to make it fully functional. Expertise in Adobe illustrator and Photoshop is a desirable.\r\n \r\n Freelancers from Bangladesh are also encouraged to apply.', '2015-10-31', '4 months', 1, 2, '2015-09-14 01:59:24', '2015-09-20 23:16:03'),
(19, 64, 'Android Wrapper Around Payment API', 'We are using the ADVAM WebBank Direct POST API Service V2.1 (http://www.advam.com/directpost.html) from within a mobile app to take payment. Relevant details of this API are shown in the attached document. \r\n \r\n We require a wrapper around this API to be created for the Android platform along with a basic test app to be developed.\r\n \r\n No serverside development is required as part of this project, just Android.\r\n \r\n If this project is successful we''ll be creating another one for the equivalent wrapper to be created in Objective-C, though this will be a separate project.\r\n \r\n Please see the attached for full details', '2015-10-31', '4 months', 1, 3, '2015-09-14 03:06:06', '2015-09-20 22:37:34'),
(21, 64, 'Music Technology Social Media Contributer', 'Being able to define your own validation methods allows you to validate pretty much anything that you can think of. Using this plugin, you can very quickly add validation to a form. However, let me remind you that this validation happens only on the client side. While JavaScript validation is useful because of its responsiveness, if there is a JavaScript error, the browser could ignore the remaining validation and submit the form to the server. So my final word of advice would be to validate the data again on the server side.', '2015-09-30', '5 months', 1, 10, '2015-09-18 01:40:16', '2015-09-25 09:07:27'),
(23, 64, 'Open Market Place for Software projects', 'It is expected to create a dynamic website where industry owners can post their requirements for a particular software ( with details ) and suppliers will be able to submit their quotations in reference to that post. The main goal is, the industry owners can get their desired software within their desired quotations, and also the suppliers will get software projects to work on which will improve their business.', '2015-09-30', '3 months', 1, 2, '2015-09-24 00:54:28', '2015-12-01 01:17:24'),
(27, 65, 'Match 3 game for kids', 'aflh AFLdhn AOfsdjg dhsgjfjh fjsjgdf hsdhgfhln abds gdfhfjh dghfnj.g', '2015-10-31', '4 months', 1, 4, '2015-09-29 23:16:58', '2015-09-29 23:16:58'),
(28, 65, 'Click to Edit with AngularJS', 'uasdgnfh zsgjldfhm fojgmdfh. sojdrr fsglfnhf.g', '2015-12-31', '4 months', 1, 2, '2015-09-30 01:14:40', '2015-09-30 01:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE IF NOT EXISTS `quotations` (
  `id` int(10) unsigned NOT NULL,
  `postId` int(10) unsigned NOT NULL DEFAULT '0',
  `vendorId` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text COLLATE utf8_unicode_ci,
  `price` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `postId`, `vendorId`, `content`, `price`, `created_at`, `updated_at`) VALUES
(13, 14, 56, 'hcfnm hvfnz.xm CM>\r\ncn.,vn j/\r\nd;j.fdksbf ', '80000 BDT', '2015-08-27 00:56:57', '2015-08-27 00:56:57'),
(17, 15, 56, 'bfxngvmkh', '60K', '2015-08-27 02:11:34', '2015-08-27 02:11:34'),
(25, 16, 56, 'fnsdg vnxd.b', '70K', '2015-08-27 02:51:08', '2015-08-27 02:51:08'),
(31, 1, 56, 'agdfjgjk;jhugf', '60K', '2015-09-13 23:46:13', '2015-09-13 23:46:13'),
(38, 3, 56, 'asfn d gsgndfh sfndh f', '70K', '2015-09-14 02:52:19', '2015-09-14 02:52:19'),
(39, 2, 56, 'I would like to offer you my deep knowledge of server hardware and software, which allows me to fine-tune servers according to their roles, and my ability to anticipate and solve problems in shortest time possible. ', '70K', '2015-09-18 02:48:16', '2015-09-18 02:48:16'),
(47, 23, 56, 'adnk ddmb fgndoimd dindf gd', '70K', '2015-09-25 08:42:31', '2015-09-25 08:42:31'),
(51, 17, 56, 'asd nlgnf dgfnb sfg', '70K', '2015-09-28 12:53:33', '2015-09-28 12:53:33'),
(53, 24, 56, 'kc safsdn sfsdng', '70K', '2015-09-28 13:45:53', '2015-09-28 13:45:53'),
(54, 21, 56, 'vfas AFNSG AHSIihsd sfbs', '65K', '2015-09-29 12:37:43', '2015-09-29 12:37:43'),
(55, 19, 56, 'vkb vbsdgs aUfiandg saugdh dsdsa', '65K', '2015-09-29 12:40:26', '2015-09-29 12:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) unsigned NOT NULL,
  `giver` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `giver`, `receiver`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 64, 56, 'Thank you so much! It was a pleasure working with Ronald. Not only did he fulfill the assignment, he went above and beyond to anticipate my needs.\r\n \r\n Great Contractor! Would hire again if ever needed.', 4, '2015-08-31 18:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `review_requests`
--

CREATE TABLE IF NOT EXISTS `review_requests` (
  `id` int(200) NOT NULL,
  `senderId` int(200) NOT NULL,
  `receiverId` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review_requests`
--

INSERT INTO `review_requests` (`id`, `senderId`, `receiverId`, `created_at`, `updated_at`) VALUES
(1, 56, 65, '2015-09-17 10:40:02', '0000-00-00 00:00:00'),
(2, 56, 65, '2015-11-30 02:42:20', '2015-11-30 02:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `created_at`, `updated_at`) VALUES
(1, 'Java', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'PHP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'WordPress', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ASP.net', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Unity 3D', '2015-08-10 18:00:00', '0000-00-00 00:00:00'),
(6, 'Android', '2015-08-10 18:00:00', '0000-00-00 00:00:00'),
(7, 'C#', '2015-08-24 22:07:32', '2015-08-24 22:07:32'),
(10, 'MySQL', '2015-08-26 05:55:28', '2015-08-26 05:55:28'),
(11, 'JQuery', '2015-09-04 04:22:10', '2015-09-04 04:22:10'),
(12, 'Ajax', '2015-09-04 04:22:16', '2015-09-04 04:22:16'),
(14, 'Adobe Illustrator', '2015-09-14 02:02:21', '2015-09-14 02:02:21'),
(16, 'SEO', '2015-09-18 01:41:05', '2015-09-18 01:41:05'),
(18, 'Laravel 5', '2015-09-24 00:55:18', '2015-09-24 00:55:18'),
(19, 'iOS', '2015-09-29 11:02:04', '2015-09-29 11:02:04'),
(20, 'Python', '2015-09-30 01:18:43', '2015-09-30 01:18:43'),
(21, 'AngularJS', '2015-09-30 01:18:46', '2015-09-30 01:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `skillsandposts`
--

CREATE TABLE IF NOT EXISTS `skillsandposts` (
  `id` int(10) unsigned NOT NULL,
  `postId` int(11) NOT NULL,
  `skillId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skillsandposts`
--

INSERT INTO `skillsandposts` (`id`, `postId`, `skillId`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 3, 5, '2015-08-10 18:00:00', '0000-00-00 00:00:00'),
(8, 3, 6, '2015-08-10 18:00:00', '0000-00-00 00:00:00'),
(9, 2, 2, '2015-08-10 18:00:00', '2015-08-10 18:00:00'),
(17, 9, 7, '2015-08-24 22:07:32', '2015-08-24 22:07:32'),
(29, 14, 2, '2015-08-25 04:09:52', '2015-08-25 04:09:52'),
(30, 14, 3, '2015-08-25 04:09:52', '2015-08-25 04:09:52'),
(33, 16, 6, '2015-08-25 04:19:32', '2015-08-25 04:19:32'),
(34, 16, 7, '2015-08-25 04:19:32', '2015-08-25 04:19:32'),
(35, 17, 2, '2015-09-14 01:59:24', '2015-09-14 01:59:24'),
(36, 17, 14, '2015-09-14 02:02:21', '2015-09-14 02:02:21'),
(37, 19, 6, '2015-09-14 03:06:06', '2015-09-14 03:06:06'),
(38, 19, 1, '2015-09-14 03:06:06', '2015-09-14 03:06:06'),
(39, 21, 16, '2015-09-18 01:41:05', '2015-09-18 01:41:05'),
(41, 23, 12, '2015-09-24 00:54:28', '2015-09-24 00:54:28'),
(42, 23, 11, '2015-09-24 00:54:28', '2015-09-24 00:54:28'),
(43, 23, 10, '2015-09-24 00:54:28', '2015-09-24 00:54:28'),
(44, 23, 2, '2015-09-24 00:54:28', '2015-09-24 00:54:28'),
(45, 23, 18, '2015-09-24 00:55:18', '2015-09-24 00:55:18'),
(46, 26, 6, '2015-09-29 01:20:11', '2015-09-29 01:20:11'),
(47, 27, 6, '2015-09-29 23:16:58', '2015-09-29 23:16:58'),
(48, 27, 19, '2015-09-29 23:16:58', '2015-09-29 23:16:58'),
(49, 27, 20, '2015-09-30 01:18:43', '2015-09-30 01:18:43'),
(50, 28, 21, '2015-09-30 01:18:46', '2015-09-30 01:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `software_categories`
--

CREATE TABLE IF NOT EXISTS `software_categories` (
  `id` int(10) unsigned NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `software_categories`
--

INSERT INTO `software_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Web Applications', '2015-08-04 00:12:26', '2015-08-04 00:12:26'),
(3, 'Mobile Apps', '2015-08-05 05:54:24', '2015-08-05 05:54:24'),
(4, 'Games', '2015-08-07 01:06:54', '2015-08-07 01:06:54'),
(10, 'Sales and Marketing', '2015-09-29 10:59:01', '2015-09-29 10:59:01'),
(11, 'IT and Networking', '2015-09-29 10:58:50', '2015-09-29 10:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `confirmCode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Company_approve_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userRoleId` int(10) unsigned NOT NULL DEFAULT '0',
  `companyId` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prof_pic` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirmCode`, `Company_approve_code`, `verified`, `approved`, `country`, `userRoleId`, `companyId`, `description`, `phone`, `prof_pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Software Market', 'software2market@gmail.com', '$2y$10$wLKovN3jmN2aWVXeEz.y9O68UM6wWIl0oXCR96QdLxVuE6WxWPj/O', '', '', 1, 1, '', 1, 1, NULL, NULL, NULL, '7pARbNQzKt9LjXJT8Agd5PwocztqsLpEJBCDA1Ufn77t7Gb4dRYswIQ87jvn', '2015-08-04 00:06:32', '2015-12-12 07:52:43'),
(53, 'Admin2', 'brishti293@gmail.com', '$2y$10$eiFUOBbXmmlXInJo65/0Xukqt8k1bqSbZvX2kS4UcQCM705N0Cbfe', '5791edbca70974ddf2134e2b8c718ad1', '', 1, 1, '', 2, 0, NULL, '0123456789', NULL, 'KuCX81fUK6jonFYwCtPf2oEpqey7rqZD0t7QigcvWYwS06wP54zCDjTGYpSR', '2015-08-05 03:35:12', '2015-11-09 12:38:45'),
(56, 'Supplier1', 'pinky_nsu08@yahoo.com', '$2y$10$X/2QN.qQzBYC0BkhcpZpKemuqlhPsYzSR/4HmhRyofbrQaze9iS1C', '7dbbff34513e5365238c6f1994bb3a3b', '', 1, 1, '', 4, 8, 'I''m a Network Administrator in one of Argentina biggest ISPs, with +8 years working in IT and Networking and a broad experience & knowledge on Local and Metropolitan Area Networks  - Layer 1 over Copper, Fiber, Air: Ethernet, GPON/GEPON, WDM, Airmax - Protocols and IP Services: VLANs, Link Aggregation, Spanning Tree, ACLs, VPN, OSPF, BGP - Networking Equipment: MikroTik, Ubiquiti, Cisco, HP, Dell, DrayTek, SMC, Zyxel - Certified Mikrotik MTCNA, MTCTCE, MTCRE  I participated on projects designing and building large metropolitan networks for data, voice, and video surveillance. - Certified Bosch Professional BVMS CCTV 102, CCTV 101 - Great knowledge of video surveillance systems Genetec, Digifort and Milestone.', '017177889934', NULL, 'Gyp8XJpV3pUB7fhxGt4ZsQqtoMTgZmyiwx8lHP8zcnTOmJhdNH2qAaAs4hYl', '2015-08-06 03:15:26', '2015-12-12 09:51:24'),
(64, 'Shamima Yasmin', 'brishti293@yahoo.com', '$2y$10$1s9xmjfR/Sc0JL2ZIJcwQutzrSD1Lu0dfSk.14AG6hHJlHrliSoHq', 'cd4594f30ff03e4c3c9611db1b9afed5', '', 1, 1, '', 3, 2, NULL, '01913456789', NULL, 'Fz9FxhHhlNZoQDm8SHgsaF77ECffuy6gXbZb1nELsBFC8m1QmBC1KAjITHaX', '2015-08-17 00:15:28', '2015-11-30 04:45:24'),
(65, 'Owner new', 'testid4944@gmail.com', '$2y$10$JUYlH1Fh0rUty.Sh8Y2vuuVQvINTybkJAyhj6aowtt1zPWV8zzhpG', 'e1701eaf5d03f578714c16c649fe5b17', '', 1, 1, '', 3, 3, NULL, '+88 0171 24567', NULL, 'dwphlbahrkJZnBfQ1PmtTcru30oDURNhUOCLQISfQtrPKFJxB2v1SQZVuLF3', '2015-08-17 04:38:10', '2015-11-30 05:12:59'),
(68, 'acd', 'abc@r.c', '$2y$10$xN6Y90pdOEViVkKeKV3WCuGkAi0lGW1LXne/ttgawBxQ1bwbk7oma', '1ebe36bea4534257c58bba5f42840433', '', 1, 1, '', 3, 0, NULL, NULL, NULL, NULL, '2015-09-25 13:19:18', '2015-09-25 13:19:18'),
(71, 'Shamima Yasmin', 'abcd@gmail.com', '$2y$10$hM3FN2NHLvFsdoWY0KcAsuxId7OXZbiFortFoLzpgj4RYyV.g/Vvu', '50a06c47f992c14d5ab03dbd63b42cc4', '', 1, 1, '', 2, 0, NULL, NULL, NULL, NULL, '2015-11-09 12:36:48', '2015-11-09 12:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(10) unsigned NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Owner', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Supplier', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Both', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pending_requests`
--
ALTER TABLE `pending_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_requests`
--
ALTER TABLE `review_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skillsandposts`
--
ALTER TABLE `skillsandposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`postId`,`skillId`,`created_at`,`updated_at`),
  ADD KEY `id_2` (`id`,`postId`,`skillId`,`created_at`,`updated_at`);

--
-- Indexes for table `software_categories`
--
ALTER TABLE `software_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pending_requests`
--
ALTER TABLE `pending_requests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `pics`
--
ALTER TABLE `pics`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `review_requests`
--
ALTER TABLE `review_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `skillsandposts`
--
ALTER TABLE `skillsandposts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `software_categories`
--
ALTER TABLE `software_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
