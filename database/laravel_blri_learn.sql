-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2023 at 01:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blri_learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans_sheets`
--

CREATE TABLE `ans_sheets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'user',
  `course_id` bigint UNSIGNED NOT NULL COMMENT 'teacher',
  `mark` int NOT NULL DEFAULT '0',
  `times` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ans_sheets`
--

INSERT INTO `ans_sheets` (`id`, `user_id`, `course_id`, `mark`, `times`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 0, 1, '2023-02-08 05:58:38', '2023-02-08 05:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `cer_signatures`
--

CREATE TABLE `cer_signatures` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cer_signatures`
--

INSERT INTO `cer_signatures` (`id`, `name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, '(ড. নাসরিন সুলতানা)', 'পরিচালক (গবেষণা)', 'signatureccb6a30a9d.png', '2022-09-16 17:02:55', '2022-09-16 17:02:55'),
(2, '(ড. এস এম জাহাঙ্গীর হোসেন)', 'মহাপরিচালক', 'signaturef35dea361c59a5ea19e3.jpg', '2022-09-16 17:03:24', '2022-09-16 17:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `course_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'প্রথম অধ্যায়ঃ  মাংস উৎপাদনকারী গরুর জাত সমুহ', '2022-10-13 15:26:36', '2022-10-13 15:26:36'),
(2, 1, 'দ্বিতীয় অধ্যায়ঃ গরু হৃষ্টপুষ্টকরণে বাসস্থান ব্যবস্থাপনা', '2022-10-13 15:39:42', '2022-10-13 15:39:42'),
(3, 1, 'তৃতীয় অধ্যায়ঃ  ১০/১০০ টি হৃষ্টপুষ্টকরণ গরুর খামার পরিকল্পনা', '2022-10-13 15:43:52', '2022-10-13 15:43:52'),
(4, 1, 'চতুর্থ অধ্যায়ঃ হৃষ্টপুষ্টকরণে খাদ্য উপাদানসমূহ ও উহার শ্রেণী বিন্যাস', '2022-10-13 15:46:12', '2022-10-13 15:46:12'),
(5, 1, 'পঞ্চমঅধ্যায়ঃ উন্নত জাতের ঘাস পরিচিতি, চাষ পদ্ধতি', '2022-10-13 15:48:07', '2022-10-13 15:48:07'),
(6, 1, 'ষষ্ঠ অধ্যায়ঃ উন্নত জাতের ঘাস প্রক্রিয়াকরণ, সংরক্ষণ, ব্যবহার', '2022-10-13 15:51:14', '2022-10-13 15:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `completed_courses`
--

CREATE TABLE `completed_courses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'student',
  `course_id` bigint UNSIGNED NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_cat_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_level` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=running,1=complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `course_cat_id`, `name`, `skill_level`, `language`, `image`, `video_des`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'মাংস উৎপাদনকারী গরুর জাত সমুহ', 'Junior', 'Bangle', 'course289902.jpg', NULL, '<p>এটা একটি বিশেষ গোষ্ঠি, যার সদস্যরা একই চারিত্রিক বৈশিষ্টের অধিকারী এবং ঐ চারিত্রিক বৈশিষ্ট গুলো বংশ পরম্পরায় ধারাবাহিক ভাবে সন্তান সন্ততিতে সমভাবে বিদ্যমান। চারিত্রিক বৈশিষ্ট গুলো, যেমনঃ আকার-আকৃতি, গায়ের রং, দুধ উৎপাদন ক্ষমতা, দুধের গুণাগুণ, প্রজনন ক্ষমতা, কাজ করার ক্ষমতা, রোগ প্রতিরোধ ক্ষমতা, পরিবেশ অভিযোজন, স্বভাব-প্রকৃতি, খাদ্যাভাস ইত্যাদি।</p>', 1, '2022-10-13 15:26:10', '2022-10-13 15:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `course_cats`
--

CREATE TABLE `course_cats` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_cats`
--

INSERT INTO `course_cats` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'মাংস উৎপাদনকারী গরুর জাত', 'course_catfbdc9a9c3e.png', '2022-10-13 15:21:08', '2022-10-13 15:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrolls`
--

CREATE TABLE `course_enrolls` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'student',
  `course_id` bigint UNSIGNED NOT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_enrolls`
--

INSERT INTO `course_enrolls` (`id`, `user_id`, `course_id`, `lecture_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, '2023-02-08 05:56:58', '2023-02-08 05:57:36'),
(2, 4, 1, 2, 1, '2023-02-08 05:56:58', '2023-02-08 05:57:50'),
(3, 4, 1, 3, 0, '2023-02-08 05:56:58', '2023-02-08 05:56:58'),
(4, 4, 1, 4, 0, '2023-02-08 05:56:58', '2023-02-08 05:56:58'),
(5, 4, 1, 5, 0, '2023-02-08 05:56:58', '2023-02-08 05:56:58'),
(6, 4, 1, 6, 0, '2023-02-08 05:56:58', '2023-02-08 05:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `course_reviews`
--

CREATE TABLE `course_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `division_id` bigint UNSIGNED NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `url` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', 23.4682747, 91.1788135, 'www.comilla.gov.bd', NULL, NULL),
(2, 1, 'Feni', 'ফেনী', 23.023231, 91.3840844, 'www.feni.gov.bd', NULL, NULL),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 'www.brahmanbaria.gov.bd', NULL, NULL),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', 22.65561018, 92.17541121, 'www.rangamati.gov.bd', NULL, NULL),
(5, 1, 'Noakhali', 'নোয়াখালী', 22.869563, 91.099398, 'www.noakhali.gov.bd', NULL, NULL),
(6, 1, 'Chandpur', 'চাঁদপুর', 23.2332585, 90.6712912, 'www.chandpur.gov.bd', NULL, NULL),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', 22.942477, 90.841184, 'www.lakshmipur.gov.bd', NULL, NULL),
(8, 1, 'Chattogram', 'চট্টগ্রাম', 22.335109, 91.834073, 'www.chittagong.gov.bd', NULL, NULL),
(9, 1, 'Coxsbazar', 'কক্সবাজার', 21.44315751, 91.97381741, 'www.coxsbazar.gov.bd', NULL, NULL),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', 23.119285, 91.984663, 'www.khagrachhari.gov.bd', NULL, NULL),
(11, 1, 'Bandarban', 'বান্দরবান', 22.1953275, 92.2183773, 'www.bandarban.gov.bd', NULL, NULL),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 'www.sirajganj.gov.bd', NULL, NULL),
(13, 2, 'Pabna', 'পাবনা', 23.998524, 89.233645, 'www.pabna.gov.bd', NULL, NULL),
(14, 2, 'Bogura', 'বগুড়া', 24.8465228, 89.377755, 'www.bogra.gov.bd', NULL, NULL),
(15, 2, 'Rajshahi', 'রাজশাহী', 24.37230298, 88.56307623, 'www.rajshahi.gov.bd', NULL, NULL),
(16, 2, 'Natore', 'নাটোর', 24.420556, 89.000282, 'www.natore.gov.bd', NULL, NULL),
(17, 2, 'Joypurhat', 'জয়পুরহাট', 25.09636876, 89.0400428, 'www.joypurhat.gov.bd', NULL, NULL),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', 24.5965034, 88.2775122, 'www.chapainawabganj.gov.bd', NULL, NULL),
(19, 2, 'Naogaon', 'নওগাঁ', 24.83256191, 88.92485205, 'www.naogaon.gov.bd', NULL, NULL),
(20, 3, 'Jashore', 'যশোর', 23.16643, 89.2081126, 'www.jessore.gov.bd', NULL, NULL),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', NULL, NULL),
(22, 3, 'Meherpur', 'মেহেরপুর', 23.762213, 88.631821, 'www.meherpur.gov.bd', NULL, NULL),
(23, 3, 'Narail', 'নড়াইল', 23.172534, 89.512672, 'www.narail.gov.bd', NULL, NULL),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 'www.chuadanga.gov.bd', NULL, NULL),
(25, 3, 'Kushtia', 'কুষ্টিয়া', 23.901258, 89.120482, 'www.kushtia.gov.bd', NULL, NULL),
(26, 3, 'Magura', 'মাগুরা', 23.487337, 89.419956, 'www.magura.gov.bd', NULL, NULL),
(27, 3, 'Khulna', 'খুলনা', 22.815774, 89.568679, 'www.khulna.gov.bd', NULL, NULL),
(28, 3, 'Bagerhat', 'বাগেরহাট', 22.651568, 89.785938, 'www.bagerhat.gov.bd', NULL, NULL),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', 23.5448176, 89.1539213, 'www.jhenaidah.gov.bd', NULL, NULL),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', NULL, NULL),
(31, 4, 'Patuakhali', 'পটুয়াখালী', 22.3596316, 90.3298712, 'www.patuakhali.gov.bd', NULL, NULL),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', NULL, NULL),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', NULL, NULL),
(34, 4, 'Bhola', 'ভোলা', 22.685923, 90.648179, 'www.bhola.gov.bd', NULL, NULL),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', NULL, NULL),
(36, 5, 'Sylhet', 'সিলেট', 24.8897956, 91.8697894, 'www.sylhet.gov.bd', NULL, NULL),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', 24.482934, 91.777417, 'www.moulvibazar.gov.bd', NULL, NULL),
(38, 5, 'Habiganj', 'হবিগঞ্জ', 24.374945, 91.41553, 'www.habiganj.gov.bd', NULL, NULL),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 'www.sunamganj.gov.bd', NULL, NULL),
(40, 6, 'Narsingdi', 'নরসিংদী', 23.932233, 90.71541, 'www.narsingdi.gov.bd', NULL, NULL),
(41, 6, 'Gazipur', 'গাজীপুর', 24.0022858, 90.4264283, 'www.gazipur.gov.bd', NULL, NULL),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', NULL, NULL),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', 23.63366, 90.496482, 'www.narayanganj.gov.bd', NULL, NULL),
(44, 6, 'Tangail', 'টাঙ্গাইল', 24.26361358, 89.91794786, 'www.tangail.gov.bd', NULL, NULL),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', 24.444937, 90.776575, 'www.kishoreganj.gov.bd', NULL, NULL),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', NULL, NULL),
(47, 6, 'Dhaka', 'ঢাকা', 23.7115253, 90.4111451, 'www.dhaka.gov.bd', NULL, NULL),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', NULL, NULL),
(49, 6, 'Rajbari', 'রাজবাড়ী', 23.7574305, 89.6444665, 'www.rajbari.gov.bd', NULL, NULL),
(50, 6, 'Madaripur', 'মাদারীপুর', 23.164102, 90.1896805, 'www.madaripur.gov.bd', NULL, NULL),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 'www.gopalganj.gov.bd', NULL, NULL),
(52, 6, 'Faridpur', 'ফরিদপুর', 23.6070822, 89.8429406, 'www.faridpur.gov.bd', NULL, NULL),
(53, 7, 'Panchagarh', 'পঞ্চগড়', 26.3411, 88.5541606, 'www.panchagarh.gov.bd', NULL, NULL),
(54, 7, 'Dinajpur', 'দিনাজপুর', 25.6217061, 88.6354504, 'www.dinajpur.gov.bd', NULL, NULL),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', NULL, NULL),
(56, 7, 'Nilphamari', 'নীলফামারী', 25.931794, 88.856006, 'www.nilphamari.gov.bd', NULL, NULL),
(57, 7, 'Gaibandha', 'গাইবান্ধা', 25.328751, 89.528088, 'www.gaibandha.gov.bd', NULL, NULL),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 'www.thakurgaon.gov.bd', NULL, NULL),
(59, 7, 'Rangpur', 'রংপুর', 25.7558096, 89.244462, 'www.rangpur.gov.bd', NULL, NULL),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', 25.805445, 89.636174, 'www.kurigram.gov.bd', NULL, NULL),
(61, 8, 'Sherpur', 'শেরপুর', 25.0204933, 90.0152966, 'www.sherpur.gov.bd', NULL, NULL),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', 24.746567, 90.4072093, 'www.mymensingh.gov.bd', NULL, NULL),
(63, 8, 'Jamalpur', 'জামালপুর', 24.937533, 89.937775, 'www.jamalpur.gov.bd', NULL, NULL),
(64, 8, 'Netrokona', 'নেত্রকোণা', 24.870955, 90.727887, 'www.netrokona.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', NULL, NULL),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', NULL, NULL),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', NULL, NULL),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', NULL, NULL),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', NULL, NULL),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', NULL, NULL),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `logo_header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navbar_header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_bg` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_text` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submit_btn` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_btn` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `user_id`, `logo_header`, `navbar_header`, `sidebar`, `background`, `tbl`, `tbl_bg`, `tbl_text`, `submit_btn`, `create_btn`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-22 12:39:56', '2022-06-22 12:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `chapter_id` bigint UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=text',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `user_id`, `course_id`, `chapter_id`, `type`, `name`, `text`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'জাত বলতে কি বুঝি?', '<p>জাতঃ এটা একটি বিশেষ গোষ্ঠি, যার সদস্যরা একই চারিত্রিক বৈশিষ্টের অধিকারী এবং ঐ চারিত্রিক বৈশিষ্ট গুলো বংশ পরম্পরায় ধারাবাহিক ভাবে সন্তান সন্ততিতে সমভাবে বিদ্যমান। চারিত্রিক বৈশিষ্ট গুলো, যেমনঃ আকার-আকৃতি, গায়ের রং, দুধ উৎপাদন ক্ষমতা, দুধের গুণাগুণ, প্রজনন ক্ষমতা, কাজ করার ক্ষমতা, রোগ প্রতিরোধ ক্ষমতা, পরিবেশ অভিযোজন, স্বভাব-প্রকৃতি, খাদ্যাভাস ইত্যাদি।</p>\r\n\r\n<p>বাংলাদেশে মাংস উৎপাদনকারী<strong> </strong>গরুর নির্দিষ্ট কোন জাত নাই, সাধারনত আমাদের দেশী গরু ও কিছু সংকর জাতের গরু মাংস উৎপাদনের জন্য&nbsp; ব্যবহার হয়ে থাকে। বাংলাদেশে বিদ্যমান গরুর জাত সমুহঃ</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:97.38%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:20px; vertical-align:top; width:50%\">\r\n			<p>দেশী জাতের গরু</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:20px; vertical-align:top; width:49%\">\r\n			<p>সংকর জাতের গরু</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:77px; vertical-align:top; width:50%\">\r\n			<ol>\r\n				<li>রেড চিটাগাং ক্যাটেল (আরসিসি)</li>\r\n				<li>পাবনা গরু/বিএলআরআই ক্যাটেল ব্রিড-১</li>\r\n				<li>মুন্সীগঞ্জ গরু</li>\r\n				<li>নর্থ-বেঙ্গল গ্রে</li>\r\n				<li>নন-ড্রেসক্রিপ্ট জাত</li>\r\n			</ol>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:77px; vertical-align:top; width:49%\">\r\n			<ol>\r\n				<li>ব্রাহমা &times; দেশী</li>\r\n				<li>হলষ্টিন-ফ্রিজিয়ান &times; দেশী</li>\r\n				<li>জার্সি &times; দেশী</li>\r\n				<li>শাহীওয়াল &times; দেশী</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>দেশী জাতের গরুর গুনাগুণঃ</strong></p>\r\n\r\n<ol>\r\n	<li>রোগবালাই কম হয়ে থাকে</li>\r\n	<li>দেশের প্রচলিত অবহাওয়ায় মানানসই</li>\r\n	<li>অনিয়মিত পুষ্টি ব্যবস্থাপনায়ও টিকে থাকতে পারে</li>\r\n	<li>নিয়মিত বাচ্চা দিয়ে থাকে</li>\r\n	<li>স্বল্প জায়গায় ও কম খরচে পালন করা যায়</li>\r\n</ol>\r\n\r\n<p><strong>পাবনা গরু/বিএলআরআই ক্যাটেল ব্রিড-১:&nbsp;</strong></p>\r\n\r\n<p>সাধারনত সিরাজগঞ্জের শাহজাদপুর এবং পাবনার বেড়া, সাথিয়া ও সদর উপজেলাতে পাওয়া যায়। বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট (বিএলআরআই) ১৯৯০ সালে পাবনা ও সিরাজগঞ্জ জেলা থেকে দেশী জাতের গরু (পাবনা জাত) সংগ্রহ করে এবং পরবর্তীতে উহাদের মধ্যে বংশ পরম্পরায় নির্বাচিত প্রজনন কার্যক্রম বাস্তবায়নের মাধ্যমে বিসিবি-১ জাতটি উদ্ভাবিত হয়েছে। এই জাতের গাভী গুলো সাধারনত লাল বর্ণের হয়ে থাকে। তবে সাদাটে এবং বাদামী বর্ণের গাভীও দেখা যায়। প্রাপ্ত বয়স্ক ষাঁড় গুলো গাঢ় লাল বর্নের হয় এবং উহাদের গলায় কালচে আভা থাকে। এই জাতের গরু চোখের পাপড়ি, নাক, শিং, ক্ষুর, এবং লেজের গোছা কাল বর্নের হয়ে থাকে। প্রাপ্ত বয়স্ক ষাঁড়ের ওজন ৪০০-৫০০ কেজি এবং প্রাপ্ত বয়স্ক গাভীর ওজন ২৫০-৩০০ কেজি।</p>\r\n\r\n<p><strong>অর্থনৈতিক গুরুত্বঃ</strong></p>\r\n\r\n<p>১. পারিবারিক ও ক্ষূদ্র খামারী পর্যায়ে দুধ ও মাংস উৎপাদনের জন্য উপযোগী</p>\r\n\r\n<p>২. ষাড় হৃষ্টপুষ্টকরণের করণের জন্য উপযোগী</p>\r\n\r\n<p>৩. দুই বছরে ৩৫৫ কেজি দৈহিক ওজন লাভ করে</p>\r\n\r\n<p>৪. গড় দুধ উৎপাদনকাল ২৬০ দিন</p>\r\n\r\n<p>৫. প্রতি দুধ উৎপাদনকালে গড় দুধ উৎপাদন ১২০০ কেজি</p>\r\n\r\n<p>৬. দৈনিক গড় দুধ উৎপাদন ৪.৫ কেজি</p>\r\n\r\n<p>৭. রোগ প্রতিরোধ ক্ষমতা বেশি</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>রেড চিটাগাং ক্যাটেল (আরসিসি) জাতঃ&nbsp;</strong></p>\r\n\r\n<p>সাধারনত বৃহত্তর চট্রগ্রাম এলাকাতে পাওয়া যায়। বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট ২০০২ সাল থেকে রেডচিটাগাং ক্যাটেল (আরসিসি) জাত সংরক্ষণ এবং বংশ পরম্পরায় নির্বাচিত প্রজননের মাধ্যমে আরসিসি জাত এর উন্নয়ন করা হয়েছে। এই জাতের গরু গায়ের লোম, চোখের পাপড়ি, নাক, শিং, ক্ষুর, লেজ এবং প্রজননাংগের বাহিরের অংশ লাল বর্নের হয়ে থাকে। প্রাপ্ত বয়স্ক ষাঁড়ের ওজন ৩০০-৩৫০ কেজি এবং প্রাপ্ত বয়স্ক গাভীর ওজন ১৬০-১৮০ কেজি।</p>\r\n\r\n<p><strong>অর্থনৈতিক গুরুত্বঃ</strong></p>\r\n\r\n<p>১. পারিবারিক ও ক্ষূদ্র খামারী পর্যায়ে দুধ উৎপাদনের জন্য উপযোগী</p>\r\n\r\n<p>২. ষাড় হৃষ্টপুষ্টকরণের করণের জন্য উপযোগী</p>\r\n\r\n<p>৩. এই জাতের গাভী প্রতি বছরে একটি করে বাচ্চা দেয়</p>\r\n\r\n<p>৪. দৈনিক গড় দুধ উৎপাদন ৩.৫ কেজি</p>\r\n\r\n<p>৫. গড় দুধ উৎপাদনকাল ২৪০ দিন</p>\r\n\r\n<p>৬. প্রতি দুধ উৎপাদনকালে গড় দুধ উৎপাদন ৮৫০ কেজি</p>\r\n\r\n<p>৭. রোগ প্রতিরোধ ক্ষমতা বেশি</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>মুন্সীগঞ্জ গরুঃ</strong></p>\r\n\r\n<p>পদ্মা নদীর অববাহিকায় বিশেষ করে মুন্সিগঞ্জ জেলা এবং এর সংলগ্ন জেলাতে পাওয়া যায়। এই জাতের গরুর গায়ের লোম, চোখের পাপড়ি, লেজের গোছা হালকা ঘিয়া হতে হালকা সাদা বর্নের হয় এবং নাক, শিং, ক্ষুর, এবং প্রজননাংগের বাহিরের অংশ হালকা লাল বর্নের হয়ে থাকে। প্রাপ্ত বয়স্ক ষাঁড়ের গলা থেকে কুজ পর্যন্ত লালচে আভা থাকে। প্রাপ্ত বয়স্ক ষাঁড়ের ওজন ৩০০-৪০০ কেজি এবং প্রাপ্ত বয়স্ক গাভীর ওজন ২০০-২৫০ কেজি।</p>\r\n\r\n<p><strong>অর্থনৈতিক গুরুত্বঃ</strong></p>\r\n\r\n<p>১. পারিবারিক ও ক্ষূদ্র খামারী পর্যায়ে দুধ ও মাংস উৎপাদনের জন্য উপযোগী</p>\r\n\r\n<p>২. ষাড় হৃষ্টপুষ্টকরণের করণের জন্য উপযোগী এবং কোরবানীতে অধিক মূল্যে বিক্রয় হয়</p>\r\n\r\n<p>৩. গাভীগুলোর দৈনিক গড় দুধ উৎপাদন ৪.৫ থেকে ৫.৫ কেজি</p>\r\n\r\n<p>৪. প্রতি দুধ উৎপাদনকালে দুধ উৎপাদন ক্ষমতা ১০০০-১২০০ লিটার</p>\r\n\r\n<p>৫. এই জাতের গাভী ১২-১৩ মাস অন্তর একটি করে বাচ্চা দেয়</p>\r\n\r\n<p>৬. রোগ প্রতিরোধ ক্ষমতা বেশি</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>নর্থ-বেঙ্গল গ্রে গরুঃ</strong></p>\r\n\r\n<p>বাংলাদেশের উত্তারাঞ্চলের রাজশাহী ও রংপুর বিভাগের বিভিন্ন জেলাতে পাওয়া যায়। ভূমিহীন, ক্ষুদ্র কৃষক শ্রেণী ও দরিদ্র জনগোষ্ঠি এই জাতটি বেশি পালন করে। এই জাতের গরুর গায়ের লোম ধুসর থেকে সাদাটে বর্নের হয়ে থাকে। তবে হালকা ছাই বর্নের গরুও পাওয়া যায়। এই জাতের গরু চোখের পাপড়ি, নাক, শিং, ক্ষুর, এবং লেজের গোছা কাল বর্নের হয়ে থাকে। প্রাপ্ত বয়স্ক ষাঁড়ের গলা থেকে কুজ পর্যন্ত এবং কিছু ক্ষেত্রে মেরুদন্ড বরাবর কালচে আভা থাকে। প্রাপ্ত বয়স্ক ষাঁড়ের ওজন ৩০০-৩৫০ কেজি এবং প্রাপ্ত বয়স্ক গাভীর ওজন ২০০-২৫০ কেজি।</p>\r\n\r\n<p><strong>অর্থনৈতিক গুরুত্বঃ</strong></p>\r\n\r\n<p>১. পারিবারিক ও ক্ষূদ্র খামারী পর্যায়ে দুধ ও মাংস উৎপাদনের জন্য উপযোগী।</p>\r\n\r\n<p>২. গাভীগুলোর দৈনিক ২.০ থেকে ৫.০ কেজি পর্যন্ত দুধ দিয়ে থাকে।</p>\r\n\r\n<p>৩. ষাড় হৃষ্টপুষ্টকরণের করণের জন্য উপযোগী।</p>\r\n\r\n<p>৪. রোগ প্রতিরোধ ক্ষমতা বেশি</p>\r\n\r\n<p><br />\r\n<strong>ব্রাহমা সংকরঃ</strong></p>\r\n\r\n<p>এই গরুর উৎস দেশ ইন্ডিয়া হলেও বর্তমানে আমাদের দেশে যে ব্রাহমা পাওয়া যায় এটা মূলত &#39;আমেরিকান ব্রাহমা ব্রীডারস এসোসিয়েশন&#39; কর্তৃক উদ্ভাবিত ইন্ডিয়ান কয়েকটি গরুর একটি সম্মিলিত রূপ। এটা মাংসের জন্য নতুন জাতের একটি গরু আমাদের দেশীও আবহাওয়ায় পালন উপযোগী। ব্রাহমা গরু গায়ের লোম সাধারনত হালকা ধুসর, লাল ও কাল বর্নের হয়ে থাকে। এই জাতের গরু চোখের পাপড়ি, নাক, শিং, ক্ষুর, এবং লেজের গোছা কাল বর্নের হয়ে থাকে। প্রাপ্ত বয়স্ক ষাঁড়ের গলা থেকে কুজ পর্যন্ত, পিছনের অংশে এবং কিছু ক্ষেত্রে মেরুদন্ড বরাবর কালচে আভা থাকে। প্রাপ্ত বয়স্ক বিশুদ্ধ জাতের ষাঁড়ের ওজন ৭০০-১০০০ কেজি এবং গাভীর ওজন ৪৫০-৬০০ কেজি।</p>\r\n\r\n<p><strong>অর্থনৈতিক গুরুত্বঃ</strong></p>\r\n\r\n<p>১. মাংস উৎপাদনের জন্য উপযোগী।</p>\r\n\r\n<p>২. রোগ প্রতিরোধ ক্ষমতা বেশি</p>\r\n\r\n<p>৩. দেশীও আবহাওয়ায় পালন উপযোগী</p>\r\n\r\n<p>৪. দৈহিক ওজন অনুসারে দুধ উৎপাদন কম</p>\r\n\r\n<p>৫. দেশীও আবহাওয়ায় পালন উপযোগী</p>\r\n\r\n<p><strong>হলষ্টিন ফ্রিজিয়ান সংকরঃ</strong></p>\r\n\r\n<p>এই জাতের উৎপত্তি নেদারল্যান্ডে, তবে পৃথিবীর বিভিন্ন দেশে পাওয়া যায়। সাধারনত মিশ্রত সাদা ও কাল বর্ণের হয়ে থাকে। বাংলাদেশের সংকর জাতের গাভীর দুধ উৎপাদন বৃদ্ধির লক্ষ্যে এই জাতের ষাঁড়ের বীজ গাভীর কৃত্রিম প্রজননে ব্যবহার হয়। কৃত্রিম প্রজননের মাধ্যমে জন্ম নেয়া ষাড় বাছুর গুলো মাংস উৎপাদনের জন্য ব্যবহার হয়। তবে তাদের মাংস ও হাড়ের অনুপাত আমাদের দেশীও ও অন্যান্য মাংসল জাতের গরু অপেক্ষা কম। প্রাপ্ত বয়স্ক বিশুদ্ধ জাতের ষাঁড়ের ওজন ১০০০-১২০০ কেজি এবং গাভীর ওজন ৬৮০-৮০০ কেজি।</p>\r\n\r\n<p>অর্থনৈতিক গুরুত্বঃ</p>\r\n\r\n<p>১. ষাড় বাছুর গুলো মাংস উৎপাদনের জন্য ব্যবহার হয়</p>\r\n\r\n<p>২. দুধ উৎপাদনে জন্য উপযোগী</p>\r\n\r\n<p>৩. দুধ উৎপাদনকাল ৩০৫ দিন</p>\r\n\r\n<p>৪. দুধ উৎপাদনকালে গড় দুধ উৎপাদন ১০০০০ কেজি</p>\r\n\r\n<p>৫. দৈনিক গড় দুধ উৎপাদন প্রায় ৩২ কেজি</p>\r\n\r\n<p>৬. সংকরায়নের মাত্রা ৫০% দেশীও আবহাওয়ায় পালন উপযোগী</p>\r\n\r\n<p><br />\r\n<strong>শাহীওয়াল সংকরঃ</strong></p>\r\n\r\n<p>এই জাতের উৎপত্তি পাকিস্তানে। পাকিস্তানের শাহীওয়াল জেলার নাম অনুসারে এই গরুর নামকরণ করা হয়েছে। গাভী গুলো সাধারনত লাল বর্ণের হয়ে থাকে। প্রাপ্ত বয়স্ক ষাঁড় গুলো গাঢ় লাল বর্নের হয় এবং উহাদের গলায় এবং দেহের পিছনের অংশে কালচে আভা থাকে। আমাদের দেশের প্রজনন নীতিমালা অনুযায়ী দেশী জাতের গাভীর দুধ ও মাংসের উৎপাদন বৃদ্ধির লক্ষ্যে এই জাতের ষাঁড়ের বীজ গাভীর কৃত্রিম প্রজননে ব্যবহার হয়। এই জাতের গরু আমাদের দেশীও আবহাওয়ায় পালন উপযোগী। প্রাপ্ত বয়স্ক বিশুদ্ধ জাতের ষাঁড়ের গড় ওজন ৫০০ কেজি এবং গাভীর গড় ওজন ৪২৫ কেজি।</p>\r\n\r\n<p><strong>অর্থনৈতিক গুরুত্বঃ</strong></p>\r\n\r\n<p>১. পারিবারিক ও ক্ষূদ্র খামারী পর্যায়ে দুধ ও মাংস উৎপাদনে জন্য উপযোগী</p>\r\n\r\n<p>২. দুধ উৎপাদনকাল ৩০৫ দিন</p>\r\n\r\n<p>৩. দুধ উৎপাদনকালে গড় দুধ উৎপাদন ২৫০০ কেজি</p>\r\n\r\n<p>৪. দৈনিক গড় দুধ উৎপাদন প্রায় ৮ কেজি</p>\r\n\r\n<p>৫. দেশীও আবহাওয়ায় পালন উপযোগী</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>একটি আদর্শ মাংস উৎপাদনকারী গবাদি পশুর কিছু সাধারণ বৈশিষ্ট্য নিম্নে উল্লেখ করা হলোঃ</strong></p>\r\n\r\n<p>১. গবাদি পশুর শরীর হবে আট-শাট ও প্রশস্থ।</p>\r\n\r\n<p>২. শরীরের গঠন হবে চৌকোণাকৃতি।</p>\r\n\r\n<p>৩. লয়ন (কটি) হবে প্রশস্থ, দৃঢ় ও সোজা।</p>\r\n\r\n<p>৪. রাম্প হবে পূর্ণ, মাংসল ও গোলাকৃতি।</p>\r\n\r\n<p>৫. বুক হবে প্রশস্থ।</p>\r\n\r\n<p>৬. পাজরগুলো প্রশস্থ ও দৃঢ়।</p>\r\n\r\n<p>৭. পা খাট, মজবুত ও আয়তাকারে স্থাপিত।</p>\r\n\r\n<p>৮. গলা খাট ও পুরু।</p>\r\n\r\n<p>৯. নাসারন্ধ হবে প্রশস্থ।</p>\r\n\r\n<p>১০. মুখ গহবর বড়।</p>\r\n\r\n<p>১১. চক্ষু উজ্জ্বল ও বড় হবে।</p>\r\n\r\n<p>১২. মাথা খাট ও প্রশস্থ হবে।</p>\r\n\r\n<p>১৩. সর্বোপরি গবাদি পশুটি হবে মাংস সমৃদ্ধ।</p>\r\n\r\n<p><strong>গরু হৃষ্টপুষ্টকরণের বিবেচ্য বিষয়:</strong></p>\r\n\r\n<ol>\r\n	<li>খামারী পর্যায়ে বিদ্যমান গরু পালন পদ্ধতি</li>\r\n	<li>গরুর বাজার চাহিদা</li>\r\n	<li>খাদ্যের প্রাপ্যতা ও গুনগতমান</li>\r\n	<li>আবহাওয়া ও জলবায়ু</li>\r\n	<li>জাতের প্রাপ্যতা ও বাজার মূল্য</li>\r\n	<li>মাংশের গুনাগুন</li>\r\n	<li>রোগ প্রতিরোধ ক্ষমতা</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>হৃষ্টপুষ্টকরণের গরু নির্বাচনের বৈশিষ্ট্য:</strong></p>\r\n\r\n<p>হৃষ্টপুষ্টকরণ প্রক্রিয়ায় পশুর বয়স একটি গুরুত্বপূর্ণ বিষয়। এ প্রক্রিয়ায় সাধারণত ২ বছর হতে ৫ বছরের গরু নির্বাচন করা যেতে পারে। দৈহিক গঠন বয়সের তুলনায় অধিক গুরুত্বপূর্ণ। বাংলাদেশে প্রাপ্ত গরুগুলো অঞ্চলভেদে গঠনাকৃতিতে এবং উৎপাদন ক্ষমতা ভিন্ন। একই পুষ্টি মাত্রায় এবং খাদ্য পদ্ধতিতে বিভিন্ন প্রকার গরুর দৈহিক ওজন বৃদ্ধির মাত্রা ভিন্নতর। এজন্য সব প্রকার গরুকে উন্নত পুষ্টি এবং খাদ্য পদ্ধতি ব্যবহার করলেও লাভজনক হারে দৈহিক ওজন বৃদ্ধি হয় না। এজন্য নিম্নলিখিত বিষয়গুলো ব্যবহার করে হৃষ্টপুষ্টকরণের জন্য গরু নির্বাচন করা জরুরী।</p>\r\n\r\n<ul>\r\n	<li>দৈহিক আকার বর্গরূপে হবে।</li>\r\n	<li>গায়ের চামড়া ঢিলা, শরীরের হাড়গুলো আনুপাতিকহারে মোটা, মাথাটা চাওড়া, ঘাড় চওড়া এবং খাটো।</li>\r\n	<li>পা গুলো খাটো এবং সোজাসুজিভাবে শরীরের সহিত যুক্ত।</li>\r\n	<li>পিছনের অংশ ও পিঠ চওড়া এবং লোম খাটো ও মিলানো।</li>\r\n	<li>গরু অপুষ্ট এবং দূর্বল কিন্তু রোগা নয়। শারিরীক অবস্থার মান (Body condition score) ৫ এর মধ্যে ২-৩ হওয়া।</li>\r\n	<li>গভীর ও প্রশস্ত পাজর।</li>\r\n	<li>পেট পাজরের সাথে সমামত্মরালভাবে থাকে।</li>\r\n	<li>পাজরের হাড় গুলো চওড়া হবে।</li>\r\n	<li>যথাসম্ভব কম দামে ক্রয় করতে হবে।</li>\r\n	<li>কাজের অযোগ্য হালের বলদও কম দামে ক্রয় করা যেতে পারে</li>\r\n	<li>রোগাক্রান্ত গরু-বাছুর একদম কম দামেও ক্রয় করা উচিত হবে না</li>\r\n	<li>এঁড়ে বাছুর হতে হবে</li>\r\n	<li>দেশী গরুর চেয়ে সংকর জাতের গরুর দৈহিক বৃদ্ধি বেশি হয়</li>\r\n</ul>\r\n\r\n<p>বাংলাদেশে ছোট ও মাঝারি আকৃতির দেশি গরুর চাহিদা বেশি কারণ কোরবানির সময় এসব গরু জনসংখ্যায় অধিক মধ্যবিত্ত ও নিম্নমধ্যবিত্ত ব্যাক্তিবর্গের&nbsp; ক্রয়ক্ষমতার মধ্যে থাকে আর অধিক ওজনের সংকর জাতের গরু গুটিকয়েক উচ্চবিত্ত বাক্তিরা কিনে থাকে। এছাড়াও দৈনন্দিন গো-মাংসের চাহিদাতেও দেশি গরু সকল শ্রেণির মানুষের পছন্দ। গবেষণা প্রাপ্ত ফলাফলে দেখা যায় খাদ্যকে মাংসে রূপান্তরের অনুপাত (FCR), সংকর জাতের অধিক ওজনের গরু থেকে কম ওজনের দেশি গরুতে কম। তবে অধিক FCR থাকা সত্তেও সংকর জাতের গরু দ্রুত বর্ধনশীল যা সঠিক পুষ্টির প্রাপ্তিতে দ্রুতসময়ে মাংসের যোগান দিতে সক্ষম।</p>', NULL, '2022-10-13 15:37:15', '2022-10-13 15:37:15');
INSERT INTO `lectures` (`id`, `user_id`, `course_id`, `chapter_id`, `type`, `name`, `text`, `time`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 2, 1, 'গরুর বাসস্থান বলতে কি বুঝি?', '<p><strong>গরুর বাসস্থানঃ</strong></p>\r\n\r\n<p>বিভিন্ন প্রকার প্রাকৃতিক দূর্যোগ রৌদ্র, বৃষ্টিপাত, বন্যপ্রাণী, পোকা মাকড়, চোর, অত্যধিক গরম, অত্যধিক ঠান্ডা প্রভৃতি হইতে পশুকে রক্ষার জন্য এবং পশুর খাদ্য গ্রহণ, বিশ্রাম ও ঘুমানোর জন্য যে গৃহ নির্মাণ করা হয় তাহাকে পশুর বাসস্থান বলে। সাধারণত গরু হৃষ্টপুষ্টকরণ খামারে গাভীও পালন করা হয় তাই গরুর বাসস্থানের র্বণনাতে ষাঁড় ও গাভী উভয়রেই বিবেচনা করা হয়েছে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>বাসস্থানের প্রয়োজনীয়তাঃ</strong></p>\r\n\r\n<p>১)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; রোদ, বৃষ্টি, ঝড়, শীত ও নানা প্রাকৃতিক প্রতিকূল অবস্থা থেকে গরুকে রক্ষার জন্য।</p>\r\n\r\n<p>২)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; পোকামাকড় ও ক্ষতিকর বন্যপ্রাণীর আক্রমন থেকে প্রাণীকে বাঁচানোর জন্য।</p>\r\n\r\n<p>৩)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; সু-শৃংখলভাবে খাদ্য ব্যবস্থাপনা, শ্রম ব্যবস্থাপনা, পরিস্কার-পরিচ্ছন্নতা ও স্বাস্থ্য ব্যবস্থাপনা নিশ্চিত করার জন্য।</p>\r\n\r\n<p>৪)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; গোবর ও খাদ্য পরিশিষ্ট সংগ্রহ ও ব্যবহার সঠিকভাবে করার জন্য।</p>\r\n\r\n<p>৫)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; সবগুলো গরুকে একবারে পরিদর্শন করা যায়।</p>\r\n\r\n<p>৬)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; প্রয়োজনে পৃথকভাবে প্রাণীর সেবা করা যায়।</p>\r\n\r\n<p>৭)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; অসুস্থ্য গরুকে দ্রুত চিহ্নিতকরণ ও পৃথক করা যায়।</p>\r\n\r\n<p>৮)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; গরুকে সহজে নিয়ন্ত্রণ করা যায়।</p>\r\n\r\n<p>৯)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; উন্নত আরামপ্রদ অবস্থা প্রদানের জন্য</p>\r\n\r\n<p>১০)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; উন্নততর ব্যবস্থাপনা এবং যত্ন</p>\r\n\r\n<p>১১)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; সরবরাহকৃত খাদ্যের মান উন্নয়ন</p>\r\n\r\n<p>১২)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; উন্নত সেবা প্রদান</p>\r\n\r\n<p>১৩)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; উন্নত গ্রুমিং ব্যবস্থা</p>\r\n\r\n<p>১৪)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; আধুনিক প্রজনন</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>নিন্ম লিখিত প্রয়োজন গুলির প্রতি লক্ষ্য রাখিয়া গরুর ঘর তৈরি করা উচিত:-</strong></p>\r\n\r\n<p>১.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; স্বাস্থ্য এবং পশুর আরাম</p>\r\n\r\n<p>২.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; শ্রমের দক্ষতা, সুবিধাজনক শ্রমের প্রাপ্যতা এবং দ্রব্যাদির ব্যবহার</p>\r\n\r\n<p>৩.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; উপযুক্ত স্বাস্থ্যগত নিয়মাবলী সম্পন্ন- যেমন</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; ক. জায়গা</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;খ. আলো</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;গ. বায়ু চলাচল</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;ঘ. পশুর ও পরিচারকের স্বাস্থ্য</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;ঙ. নিষ্কাশন&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ৪. শ্রমের দক্ষ্যতা, সুবিধাজনক শ্রম এবং দ্রব্যাদির ব্যবহার</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ৫. পশুর চিকিৎসা এবং অন্যান্য ব্যবস্থাপনার জন্য সহজ প্রবেশ্যতা থাকিতে হইবে</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>বাসস্থান নির্মানের বিবেচ্য বিষয়ঃ</strong></p>\r\n\r\n<p><strong>ক) স্থান নির্বাচনঃ</strong></p>\r\n\r\n<ul>\r\n	<li>শুষ্ক ও উচ্চ ভূমি</li>\r\n	<li>প্রধান রাস্তা থেকে দূরে কিন্তু যোগাযোগে সুবিধা, যাতে করে খামার উৎপাদিত পণ্য সহজেই বাজার জাত করা যায়</li>\r\n	<li>কোলাহল এবং জনবসতি হতে দূরে</li>\r\n	<li>ভাল পানি নিষ্কাষন ব্যবস্থা থাকতে হবে</li>\r\n	<li>পানি ও বিদ্যুৎ সরবরাহ</li>\r\n	<li>ভবিষ্যতে খামার স&curren;প্রসারণ করা যাবে এমন সুযোগথাকতে হবে</li>\r\n	<li>খামারের চারপাশে গাছপালা থাকা দরকার যাতে করে, ঝড়ের সময় বাতাস প্রতিরোধ করতে পারে</li>\r\n	<li>আগুন নিরোধক ব্যবস্থা</li>\r\n</ul>\r\n\r\n<p><strong>খ) ঘর নির্বাচনঃ</strong></p>\r\n\r\n<ul>\r\n	<li>ঘর পূর্ব-পশ্বিম মূখী হওয়া উত্তম। এতে করে ঘরে কিছুটা ঠান্ডাবস্থা বিরাজ করে।</li>\r\n	<li>ঘরের মধ্যে পর্যাপ্ত আলো ও বায়ু চলাচলের ব্যবস্থা থাকতে হবে</li>\r\n	<li>ঘরের মল-মূত্র ও অন্যান্য আর্বজনা যাতে সহজেই পরিস্কার করা যায় সে দিকে খেয়াল রেখে ঘর তৈরী করতে হবে</li>\r\n	<li>ঘরের মেঝ ড্রেনের দিকে ঢালু থাকবে এবং অমসৃন হতে হবে যাবে গরু বা মানুষ চলাচলের সময় পিছলে না যায়</li>\r\n</ul>\r\n\r\n<p><strong>ঘর নির্মাণ কৌশলঃ </strong></p>\r\n\r\n<p>আমাদের দেশে ক্ষুদ্র খামারীরা সাধারনত ২/৩ টি গরু নিয়ে খামার করে থাকে এর জন্য অধিক টাকা খরচ করে&nbsp; ঘর করার প্রয়োজন পড়েনা। তবে বেশি সংখ্যায় অর্থ্যাৎ বাণিজ্যিক ভাবে গরু পালন করলে অবশ্য অবশ্যই বিজ্ঞান সম্মত, স্বা&macr;হ্যকর ও আধুনিক&nbsp; ঘর তৈরী করার দরকার পড়ে। নিচের ছবিতে ৪০ টি গরুর জন্য দুই সারীর একটি ঘর তৈরীর পরিকল্পনা করে দেওয়া হল। এই জাতীয় ঘরে দুই সারিতে ২০ টি করে মোট ৪০ টি গরু থাকতে পারবে। গরুগুলো ঘরের ভিতরের দিকে মুখ করে থাকবে। প্রতিটি গরুর দাড়ানোর জায়গা (স্টল) হবে ৫.৫ ফুট লম্বা ও ৩.৫ ফুট চরড়া এবং প্রতিটি ষাঁড় গরুকে স্টিলের পাইপ দিয়ে পৃথক রাখতে হবে। গরুর সন্মুখে ২.৫ ফুট চওড়া একটি চাড়ি এবং পিছনে ১ ফুট চওড়া একটি ড্রেন বা নালা থাকবে। ঘরের মাঝখানে থাকবে ৬ ফুট চওড়া একটি রাস্তা যার উপর দিয়ে খাদ্য পরিবহন করা হবে। গরুর সংখ্যা আরও বাড়ালে শুধু দৈর্ঘ্য বরাবর প্রতি জোড়া গরুর জন্য ৩.৫ ফুট করে এই ঘর বাড়ালেই চলবে। প্রস্থ বরাবর ঘর বাড়ানোর দরকার হবেনা।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:1px solid black; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"39\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:1px solid black; vertical-align:top; width:575px\">\r\n			<p>পশু চলাচলের পথ (উত্তর) ৬ ফুট</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:none; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"39\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; vertical-align:top; width:575px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:none; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:43px\">\r\n			<p>ড্রেন&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ১ ফুট</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:46px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>৫.৫ ফুট</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:46px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>৩.৫ ফুট</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:1px solid black; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:none; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"39\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; vertical-align:top; width:575px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:none; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"39\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; vertical-align:top; width:575px\">\r\n			<p>স্টল</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:none; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"39\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; vertical-align:top; width:575px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:none; vertical-align:top; width:40px\">\r\n			<p>৫.৫ ফুট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:38px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:38px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:30px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:1px solid black; vertical-align:top; width:27px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:1px solid black; border-right:none; border-top:none; vertical-align:top; width:40px\">\r\n			<p>৩.৫ ফুট</p>\r\n			</td>\r\n			<td colspan=\"39\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; vertical-align:top; width:575px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:none; border-top:none; height:4px; vertical-align:top; width:40px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"39\" style=\"border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; height:4px; vertical-align:top; width:575px\">\r\n			<p>চারি&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ২.৫ ফুট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:4px; vertical-align:top; width:26px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:40px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:38px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:6px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:21px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:4px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:22px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:3px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:23px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:2px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:24px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:2px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:25px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:1px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:26px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:0px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:25px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:1px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:24px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:3px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:40px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:3px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:24px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:2px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:25px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:1px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:37px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:9px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:20px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:5px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:21px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:5px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:22px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:4px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:23px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:3px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:24px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:2px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:25px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:1px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:26px\">&nbsp;</td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; width:26px\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;চিত্রঃ ৪০ টি গরুর জন্য ঘরের পরিকল্পনা।</p>\r\n\r\n<p>গরুর ঘর প্রধানত দুই প্রকারের, যথা (১) বাধা ঘর (২) উদাম ঘর, গাভী উভয় প্রকার ঘরে পালন করা গেলেও ষাঁড় এর জন্য বাধা ঘর ব্যবহার করা হয়। কারণ উদাম ঘরে ষাঁড় মারামারি করে আহত হবার সম্ভাবনা থাকে। এছাড়া অধিক ওজনের ষাঁড় বা গাভীর বিশ্রামের জায়গায় রাবারের প্যাড ব্যবহার করা হয়। প্রতিটি গরুর জন্য পর্যাপ্ত পানি পানের অবকাঠামোগত সুবিধা থাকতে হবে যা খাবারের চারির সাথে সংযুক্ত ভাবে অথবা পৃথক ভাবে ব্যাবস্থা করতে হবে।</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>দুই সারি বিশিষ্ট বহির্মুখী বাধা ঘর</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>দুই সারি বিশিষ্ট অর্ন্তমুখী বাধা ঘর</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>১.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>খাদ্য সরবরাহ পথ - ৪.৫ ফুট</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>২.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>চাড়ি&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ২.৫ ফুট</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>৩.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>পশু দাঁড়াইবার স্থান &ndash; ৫.৫ ফুট</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>৪.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>নর্দমা&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ১ ফুট</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>৫.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>পশু চলাচলের পথ - ৮ ফুট</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>৬.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>নর্দমা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>৭.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>পশু দাঁড়াইবার স্থান</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>৮.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>চাড়ি</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:198px\">\r\n			<p>৯.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:425px\">\r\n			<p>খাদ্য সরবরাহ পথ</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:642px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>বর্হিমুখ গোশালার সুবিধা</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:406px\">\r\n			<p>বর্হিমুখ গোশালার আসুবিধা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>১.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:406px\">\r\n			<p>১. গোবর ও আবজন পরিস্কারের জন্য অধিকতর উপযোগী।</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>২.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:406px\">\r\n			<p>২. দুগ্ধ দোহন সুবিধা।</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>৩.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:406px\">\r\n			<p>৩. সকল গাভীর পশ্চাদভাগ দেখা সহজতর।</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>৪.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:406px\">\r\n			<p>একবারে সকল গাভীকে পরিদর্শন করা যায়।</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>৫.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:406px\">\r\n			<p>ঘরের দেওয়াল সহজে পরিস্কার বাখা যায়।</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>৬.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:406px\">\r\n			<p>একইপথে গরু ঘরে ও বাহিরে আসাযাওয়া করিতে পারে।</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>অর্ন্তমুখী গোশালার সুবিধা</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:387px\">\r\n			<p>অর্ন্তমুখী গোশালার অসুবিধা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>১.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:387px\">\r\n			<p>১. খাদ্যদ্রব্যাাদি সরবরাহ সহজতর।</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>২.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:387px\">\r\n			<p>২. দোহনের সমায় প্রয়োজনাতিরিক্ত আলো পাইবার সম্ভাবনা।</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:236px\">\r\n			<p>৩.</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:387px\">\r\n			<p>জায়গা কম প্রয়োজন।</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>দেশী গবাদী পশুর জন্য নির্মিত উচ্চতা মেঝে&nbsp; হইতে ৮-৯ ফুট হইলে চলে, কিন্তু গ্রীষ্ম প্রধান দেশে ১০-১২ ফুট হওয়া ভাল। দুই সারি বিশিষ্ট ঘর ৩৪-৩৬ ফুট চওড়া হওয়া ভাল। গরুর ঘরের জন্য সূর্যের আলো স্যাঁতসেঁতে জায়গাকে শুল্ক করে এবং রোগ জীবানু ধ্বংস করে। গ্রীষ্ম প্রধান দেশে গবাদি পশুর ঘরে দেওয়াল না থাকাই উত্তম।</p>\r\n\r\n<p><strong>বাছুরের বাসস্থানঃ</strong> বাছুরের জন্য উপযুক্ত বাসস্থান প্রয়োজন কারণ বাছুরই গো-সম্পদ বৃদ্ধির একমাত্র উপায়। স্বাস্থ্যসম্মত বাসস্থান বাছুরকে রোগমুক্ত রাখার প্রধান সহায়ক। বাছুরকে রোগমুক্ত রাখার জন্য পৃথক পৃথক রাখতে হবে এবং ইহার ফলে প্রতিটি বাছুরের রক্ষণাবেক্ষণ সহজতর হয়। অনেক বাছুর একসাথে থাকলে দূর্বল বাছুরগুলো সবল বাছুরদের সাথে প্রতিদ্বন্দিতা করে বেশী খাবার খেতে পারে না এবং আরও দূর্বল হয়ে পড়ে। বাছুরের ঘরের মেঝে কিছুটা ঢালু এবং শুকনো ও পরিষ্কার পরিচ্ছন্ন হওয়া উচিত। বাস্থানে আলো বাতাস সরাসরি প্রবেশের ব্যবস্থা থাকা উচিত। গ্রীষ্মকালে প্রচন্ড গরম ও শীতকালের প্রচন্ড ঠান্ডা দ্বারা বাছুরগুলো ক্ষতিগ্রস্থ না হয়। ঘরের মেঝেতে শুকনো খড় বা ছালার বস্তা বিছিয়ে দিতে হবে। গ্রামীণ পর্যায়ে বাঁশ কাঠের সাহায্যে অতি সহজেই ঘর নির্মাণ করা সম্ভব। ঘরে খাদ্য ও পরিষ্কার পানি সরবরাহ করার জন্য পাত্র রাখতে হবে।</p>\r\n\r\n<p>বয়স্ক বাছুর ও দুগ্ধ বিহীন গাভীর জন্য অবাধ ঘর পদ্ধতি (Loose housing system) সুবিধাজনক। এই ধরনের বয়সের ৫ হইতে ১০ টা বাছুরকে এক ঘরে রাখা যাইতে পারে। ষাঁড় ভিন্ন ভিন্ন ঘরে রাখা যায়।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>উদাম ঘরের সুবিধাঃ </strong></p>\r\n\r\n<p>ক) নির্মাণ খরচ কম এবং কম শ্রমিক প্রয়োজন।</p>\r\n\r\n<p>খ) লালন পালনে খুবই সুবিধা।</p>\r\n\r\n<p>গ) ওলান ও পায়ে আঘাত পাওয়ার সম্ভাবনা কম।</p>\r\n\r\n<p>ঘ) গরুগুলি নিজের ইচ্ছামত ঘুরাফিরা করিতে পারে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>উদাম ঘরের অসুবিধাঃ </strong></p>\r\n\r\n<p>ক) দুর্বল গরু সবল গরুর সঙ্গে প্রতিযোগিতা করিয়া খাইতে পারে না, ফলে আরও দূর্বল হইয়া পড়ে।</p>\r\n\r\n<p>খ) মারামারি করার সম্ভাবনা বেশী।</p>\r\n\r\n<p>গ) পরিদর্শন বা পরীক্ষা করা অসুবিধাজনক।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>বাঁধা ঘর পদ্ধতির সুবিধাঃ </strong></p>\r\n\r\n<p>ক) গাভীগুলি পরিদর্শন বা পরীক্ষা করা খুবই সুবিধাজনক।</p>\r\n\r\n<p>খ) বিছানার জন্য কম খরচ হয়।</p>\r\n\r\n<p>গ) একই ঘরে গাভী দোহন করা যায়।</p>\r\n\r\n<p>ঘ) চিকিৎসা ও কৃএিম প্রজননের জন্য সুবিধাজনক।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>বাঁধা ঘর পদ্ধতির অসুবিধাঃ </strong></p>\r\n\r\n<p>ক) নির্মান খরচ বেশী এবং বেশী শ্রমিক প্রয়োজন।</p>\r\n\r\n<p>খ) স্বেচ্ছায় ঘুরাফিরা করিতে পারে না।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>বিভিন্ন বয়স লিঙ্গ ও উৎপাদন অবস্থায় উদাম ঘররে জন্য মেঝের জায়গার পরিমাপ (বর্গ ফুট) :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse; width:600px\">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:12px; vertical-align:top; width:109px\">\r\n			<p>পশুর প্রকার</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:12px; vertical-align:top; width:310px\">\r\n			<p>মেঝের জায়গা/পশু (বর্গ ফুট)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:12px; vertical-align:top; width:181px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:163px\">\r\n			<p>বাধা জায়গা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:147px\">\r\n			<p>খোলা জায়গা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:181px\">\r\n			<p>চাড়ির দের্ঘ্য/ পশু (inches)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:7px; vertical-align:top; width:109px\">\r\n			<p>গরু</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:7px; vertical-align:top; width:163px\">\r\n			<p>২০-৩০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:7px; vertical-align:top; width:147px\">\r\n			<p>৮০-১০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:7px; vertical-align:top; width:181px\">\r\n			<p>২০-২৪</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:109px\">\r\n			<p>মহিষ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:163px\">\r\n			<p>২৫-৩৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:147px\">\r\n			<p>৮০-১০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:181px\">\r\n			<p>২৪-৩০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:109px\">\r\n			<p>বাছুর</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:163px\">\r\n			<p>১৫-২০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:147px\">\r\n			<p>৫০-৬০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:181px\">\r\n			<p>১৫-২০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:9px; vertical-align:top; width:109px\">\r\n			<p>গর্ভবতী গাভী</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:9px; vertical-align:top; width:163px\">\r\n			<p>১০০-১২০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:9px; vertical-align:top; width:147px\">\r\n			<p>১৮০-২০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:9px; vertical-align:top; width:181px\">\r\n			<p>২৪-৩০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:109px\">\r\n			<p>ষাড়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:163px\">\r\n			<p>১২০-১৪০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:147px\">\r\n			<p>২০০-২৫০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:5px; vertical-align:top; width:181px\">\r\n			<p>২৪-৩০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>খামার স্থাপনে অন্যান্য প্রয়োজনীয় স্থাপনা</p>\r\n\r\n<p>১.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; অফিস/তথ্য সংরক্ষণ স্থান</p>\r\n\r\n<p>২.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; দানাদার খাদ্য ও খামার যন্ত্রপাতির গুদাম</p>\r\n\r\n<p>৩.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ডেইরী ফার্মে প্রসুতি ঘর (Maternity barm)</p>\r\n\r\n<p>৪.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; অসুস্থ গরুর ঘর (Isolation shed)</p>\r\n\r\n<p>৫.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; খড়/হে সংরক্ষণ গুদাম</p>\r\n\r\n<p>৬.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; সাইলো পিট</p>\r\n\r\n<p>৭.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ম্যানিয়ুর পিট</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>বর্তমানে উন্নত দেশে গরুর খামার ব্যবস্থাপনা যান্ত্রিকীকরণ করা হচ্ছে, যেখানে রোবটিক্স টেকনোলজি ব্যবহার করে গরুর বাসস্থান, খাদ্য ব্যবস্থাপনা, পরিষ্কার পরিচ্ছন্নতা, ঘ্যাঁসের মাঠে (Pasture) গরু পর্যবেক্ষণ, দুধ দহন, ব্যাম, গ্রুমিং, ফিজিওলজিক্যাল অবস্থা নির্ণয়, চিহ্নিত করণ ইত্যাদি অনেক সহজতর হয়েছে। এই যান্ত্রিকীকরণে অনেক বিনিয়গ প্রয়োজন যা বৃহৎ খামার ব্যবস্থাপনার জন্য এবং সুদূরপ্রসারী খামার পরিচালনার জন্য লাভজনক, কিন্তু ক্ষুদ্র খামার ব্যবস্থাপনার জন্য লাভজনক নয়।</p>', NULL, '2022-10-13 15:43:10', '2022-10-13 15:43:10');
INSERT INTO `lectures` (`id`, `user_id`, `course_id`, `chapter_id`, `type`, `name`, `text`, `time`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 3, 1, 'গরু হৃষ্টপুষ্টকরণ প্রকল্প স্থাপনের ক্ষেত্রে বিবেচ্য বিষয সমূহঃ', '<p><strong>গরু হৃষ্টপুষ্টকরণ প্রকল্প স্থাপনের ক্ষেত্রে বিবেচ্য বিষয সমূহঃ</strong></p>\r\n\r\n<p>১। প্রকল্প এমন স্থানে অবস্থিত হবে যেখানে প্রাণিখাদ্যসহ প্রয়োজনীয় কাচামাল সহজেই সংগ্রহ করা যায় এবং খামারে উৎপাদিত পণ্য সহজেই বাজারজাত করা যায়।</p>\r\n\r\n<p>২। খামারের আকার</p>\r\n\r\n<p>৩। উন্নত জাত, সঠিক বয়সের গরু নির্বাচন ও গরুকে কৃমিমুক্তকরণ</p>\r\n\r\n<p>৪। প্রযুক্তি</p>\r\n\r\n<p>৫। উৎপাদন উপকরণ</p>\r\n\r\n<p>৬। জমি ও দালানকোঠা</p>\r\n\r\n<p>৭। বর্জ্য ব্যবস্থাপনা</p>\r\n\r\n<p>৮। টিকা ও প্রাথমিক চিকিৎসা</p>\r\n\r\n<p>৯। বাজারজাতকরণ</p>\r\n\r\n<p>উপরোক্ত বিষয়াবলীর প্রতি গুরুত্ব দিয়ে গরু মোটাতাজাকরণ প্রকল্প তৈরী করা উচিৎ।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>নিন্মে ১০০টি হৃষ্টপুষ্টকরণ প্রকল্পের প্রকল্প দলিলে যে সমস্ত বিষয় গুলো সন্নিবেশিত করা দরকার তা বর্ণনা করা হলো।</strong></p>\r\n\r\n<p>১।জমি ও দালানের আনুমানিক ব্যয়ঃ</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:67px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:204px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:84px\">\r\n			<p>আয়তন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:120px\">\r\n			<p>টাকা/বিঘা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:156px\">\r\n			<p>মোট টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>জমি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>১.৫ বিঘা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>৩,০০,০০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>৪,৫০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>গরুর ঘর/শেড (কাচা পাকা)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>৩৬০ ব.মি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>২০০০.০০/ব.মি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>৭,২০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>৩</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>অফিস ও স্টোর</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>২৫ ব.মি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>২৫০০.০০/ব.মি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>৬২,৫০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>৪</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>আইসোলেশন শেড</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>১টি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>২০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>কাটাতারের বেড়া</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>১৫,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>৬</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>শ্রমিক শেড</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>২০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>৭</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>খাবার প্রক্রিয়াজাত করণের ঘর</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>১০ ঘন মি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>১০০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>১০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:67px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:84px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:120px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>১২,৯৭,৫০০.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>২। যন্ত্রপাতি এবং উপযোগ</strong></p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:78px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:189px\">\r\n			<p>যন্ত্রপাতির বিবরণ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:83px\">\r\n			<p>সংখ্যা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:119px\">\r\n			<p>হার (টাকায়)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:154px\">\r\n			<p>মোট টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>পাম্প (৩ এইচি, পি)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>৩০,০০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>১০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>টিউবওয়েল</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>১৫,০০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>৭,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>৩</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>বৈদ্যুতিক সংযোগ, মিটার প্রভৃতি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>২০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>৪</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>লোহার বালতি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>২০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>১,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>প্লাস্টিকের বালতি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>১৫০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>৭৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>৬</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>মগ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>২০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>১০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>৭</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>প্লাস্টিকের গামলা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>১০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>১৫০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>১৫০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>৮</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>ব্যালেন্স</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>১৫০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>১৫০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>৯</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>কোদাল, কাচি, টুকরী, ড্রাম প্রঃ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>৫,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>১০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>ভ্যাকসিন ও চিকিৎসা ব্যয়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>২৫,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>১১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>অপ্রত্যাশিত ব্যয়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>৫,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:189px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:83px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:119px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:154px\">\r\n			<p>৭৬,৮৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>৩। হৃষ্টপুষ্টকরণের জন্য গরু, খাদ্য ও অন্যান্য কাচামাল (প্রতি ব্যাচে)</strong></p>\r\n\r\n<p>ক) ১০০ টি গরু প্রতিটি ৪০,০০০.০০ হিঃ&nbsp;&nbsp;&nbsp; = ৪০,০০,০০০.০০</p>\r\n\r\n<p>খ) দানাদার খাদ্যঃ (প্রতি ব্যাচ)</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:79px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:102px\">\r\n			<p>উপকরণ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:162px\">\r\n			<p>পরিমান</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:118px\">\r\n			<p>দাম/কেজি (টাকা)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:170px\">\r\n			<p>মোট টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:102px\">\r\n			<p>গমের ভূষি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n			<p>২৪০০ কেজি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:118px\">\r\n			<p>২২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>৫২,৮০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:102px\">\r\n			<p>চালের কুড়া&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n			<p>৬০০০ কেজি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:118px\">\r\n			<p>২০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>১২০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>৩</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:102px\">\r\n			<p>সয়াবিন মিল</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n			<p>১৮০০ কেজি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:118px\">\r\n			<p>৩৮</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>৬৮,৪০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>৪</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:102px\">\r\n			<p>চিটাগুড়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n			<p>২০০০ কেজি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:118px\">\r\n			<p>১৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>৩০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:102px\">\r\n			<p>ডিসিপি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n			<p>২০০ কেজি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:118px\">\r\n			<p>৯০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>১৮,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>৬</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:102px\">\r\n			<p>লবন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n			<p>২০০ কেজি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:118px\">\r\n			<p>২০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>৪০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>৭</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:102px\">\r\n			<p>ইউরিয়া</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n			<p>৬০০ কেজি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:118px\">\r\n			<p>১৬</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>৯৬০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:461px\">\r\n			<p>দানাদার খাবার খাতে মোট খরচ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>৩০২,৮০০.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<p><strong>গ) আশ জাতীয় খাদ্য</strong></p>\r\n\r\n<p>১০০ টি গরুর জন্য প্রতিদিন ৫ কেজি হিঃ (১০০ x ৫ x ১২০) = ৬০,০০০ কেজি</p>\r\n\r\n<p>প্রতি কেজি ৩.০০ টাকা হিঃ = ১,৮০,০০০.০০ টাকা</p>\r\n\r\n<p>সব মিলিয়ে কাচামাল খাতে খরচঃ</p>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:35px\">\r\n			<p>ক)</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:293px\">\r\n			<p>গরু বাবদ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; =</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:183px\">\r\n			<p>৪০,০০,০০০.০০ টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:35px\">\r\n			<p>খ)</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:293px\">\r\n			<p>দানাদার খাদ্য&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; =</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:183px\">\r\n			<p>৩০২,৮০০.০০ টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:35px\">\r\n			<p>গ)</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:293px\">\r\n			<p>আশ জাতীয় খাদ্য&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; =</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:183px\">\r\n			<p>১,৮০,০০০.০০ টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:35px\">\r\n			<p>ঘ)</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:293px\">\r\n			<p>অন্যান্য ব্যয়&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; =&nbsp;</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:183px\">\r\n			<p>১০,০০০.০০ টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:35px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:293px\">\r\n			<p>মোট&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; =</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:183px\">\r\n			<p>৪৪,৯২,৮০০ টাকা</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৪। জনশক্তি (বার্ষিক)</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; যথাযথভাবে পরিচালনার জন্য নি&aelig;লিখিত কর্মীদের স্থায়ী ও অস্থায়ী ভিত্তিতে নিয়োগ করতে হবে।</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:5.95in\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:79px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:136px\">\r\n			<p>পদবী</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:76px\">\r\n			<p>সংখ্যা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:142px\">\r\n			<p>মাসিক বেতন টাকায়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:139px\">\r\n			<p>মোট টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px\">\r\n			<p>ম্যানেজার</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:76px\">\r\n			<p>১ জন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:142px\">\r\n			<p>১৫,০০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:139px\">\r\n			<p>১৮০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px\">\r\n			<p>দক্ষ শ্রমিক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:76px\">\r\n			<p>৫ জন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:142px\">\r\n			<p>১০,০০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:139px\">\r\n			<p>৬৬০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>৩</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px\">\r\n			<p>আধা দক্ষ শ্রমিক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:76px\">\r\n			<p>৩ জন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:142px\">\r\n			<p>৮০০০.০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:139px\">\r\n			<p>২৮৮,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:79px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:353px\">\r\n			<p>মোট&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:139px\">\r\n			<p>১১,২৮,০০০.০০ টাকা</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৫। অন্যান্য বার্ষিক ব্যয়</strong></p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:480px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:151px\">\r\n			<p>মোট</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:310px\">\r\n			<p>১. বিদ্যুৎ খরচ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:151px\">\r\n			<p>২০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:310px\">\r\n			<p>২. ভূমি কর</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:151px\">\r\n			<p>৫,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:310px\">\r\n			<p>৩. রক্ষণাবেক্ষণ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:151px\">\r\n			<p>১৫,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:310px\">\r\n			<p>৪. অবচয়: (শেড, দালান কোঠা এবং অন্যান্য অবকাঠামো)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>২ %</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:151px\">\r\n			<p>১৬,৯৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:310px\">\r\n			<p>৫. অবচয়: যন্ত্রপাতি/আসবাব</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>১০%</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:151px\">\r\n			<p>১৩,৭৮৫.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:310px\">\r\n			<p>৬. অন্যান্য অপ্রত্যাশিত ব্যয়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:170px\">\r\n			<p>থোক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:151px\">\r\n			<p>৫,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:480px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:151px\">\r\n			<p>৭৫,৭৩৫.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>৫। উৎপাদন প্রক্রিয়া</strong></p>\r\n\r\n<p>২৪ থেকে ৩০ মাস বয়সের ষাড় এ প্রকল্পে ক্রয় করা হবে। প্রতিদিন ৬০০-৮০০ গ্রাম ওজন বৃদ্ধি পায এমন পরিকল্পনা করে ব্যস্থনাপনা করতে হবে।</p>\r\n\r\n<p><strong>৬। আর্থিক বিশ্লেষণ</strong></p>\r\n\r\n<p>৬.১. স্থায়ী বিনিয়োগ</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:91px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:264px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:276px\">\r\n			<p>টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>জমি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৪৫০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>দালান কোঠা ও অন্যান্য অবকাঠামো</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৮৪৭,৫০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>৩</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>যন্ত্রপাতি এবং উপযোগ ও আসবাবপত্র</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৭৬,৮৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:355px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>১,৩৭৪,৩৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৬.২. কর্যকরী মুলধন</strong></p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:91px\">\r\n			<p>&nbsp;ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:264px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:276px\">\r\n			<p>টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>কাচামাল/ অন্যান্য (এক ব্যাচের জন্য)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৪৪,৯২,৮০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>চার মাসের মজুরী ও বেতন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৩৫৬,০০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>৩</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>অন্যান্য নগদ খরচ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>২০,০০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৪৮,৬৮,৮০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৬.৩. মোট প্রকল্প ব্যয়&nbsp;</strong></p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:91px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:264px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:276px\">\r\n			<p>টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>স্থায়ী ব্যয়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>১৩,৭৪,৩৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>কর্যকরী মুলধন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>১২,৯৭,৫০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>২৬,৭১,৮৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৬.৪. মোট উৎপাদন খরচ (বার্ষিক)&nbsp;&nbsp;</strong></p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:91px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:264px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:276px\">\r\n			<p>টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>কাচামাল/ অন্যান্য</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>১৩,৪৭৮,৪০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>মজুরী ও বেতন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>১১,২৮,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>অন্যান্য নগদ খরচ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৯৬,৮৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>১,৪৭,০৩,২৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৬.৫. বিক্রয় মূল্য (১০০% উৎপাদন ক্ষমতা ব্যবহার)&nbsp;</strong>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:91px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:276px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:264px\">\r\n			<p>টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>গবাদি পশু ৩০০ টি, প্রতিটি ৮০,০০০.০০ হিঃ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>২,৪০,০০,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>গোবর বিক্রয়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>৪৩৮,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>২,৪৪,৩৮,০০০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>বিপনন ব্যয় ১.৫%</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>৩,৬৬,৫৭০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>নীট বিক্রয় মূল্য</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>২,৪০,৭১,৪৩০.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৬.৬.&nbsp; লাভ লোকসান বিশ্লেষণ&nbsp;&nbsp;&nbsp;</strong></p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:631px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:91px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:264px\">\r\n			<p>খাত</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:276px\">\r\n			<p>টাকা</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>বিক্রয় মূল্য</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>২,৪০,৭১,৪৩০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>বাদ উৎপাদন খরচ&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>১,৪৭,০৩,২৫০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>মোট মুনাফা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৯৩,৬৮,১৮০.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>বাদ ঋণের টাকা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৮৫,০১৮.০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:91px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:264px\">\r\n			<p>নীট মুনাফা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:276px\">\r\n			<p>৯২,৮৩,১৬২.০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>৭.০. উপসংহার</strong></p>\r\n\r\n<p>উপরে বর্ণিত বিশ্লেষণ সমূহ এটাই প্রমান করে যে, এ ধরনের একটি গরু মোটাতাজাকরণ প্রকল্পে বিনিয়োগ প্রস্তাবনা আর্থ-সামাজিক দিক থেকে লাভ জনক এবং ব্যক্তির মুনাফার পাশাপাশি সামাজিক মুনাফাও কম নয়।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>১০টি গরু হৃষ্টপুষ্টকরণ খামার পরিকল্পনা</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>১০০ টি গরুর খামার পরিকল্পনার মত ১০টি গরুর খামার পরিকল্পনা এত জটিল নয়। তবে উদ্দেশ্য যেহেতু লাভবান হওয়া সেহেতু সঠিক ব্যবস্থাপনা অতীব জরুরী।</p>\r\n\r\n<p>১। মূলধন খাতে ব্যয়</p>\r\n\r\n<p>ক) বাসস্থান ও যন্ত্রপাতি</p>\r\n\r\n<p>চলতি খাতে ব্যয়ঃ</p>\r\n\r\n<p>(১) ১০ টি ষাঁড় বাছুর ক্রয় বাবদ প্রতিটি ৪০,০০০.০০ টাকা হিঃ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = ৪,০০,০০০.০০ টাকা</p>\r\n\r\n<p>(২) ৪ মাসের খাদ্য খরচ বাবদ প্রতিটির জন্য দৈনিক ৬৫ টাকা হিঃ (৬৫x১২০x১০)&nbsp;&nbsp; = ৭৮,০০০.০০ টাকা</p>\r\n\r\n<p>(৩) ভ্যাকসিন ও ঔষধ বাবদ খরচ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp; ৫,০০০.০০ টাকা</p>\r\n\r\n<p>(৪) শ্রমিক বাবদ খরচ (১০,০০০x৩ জন)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = ৩০,০০০.০০ টাকা</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; মোট খরচ&nbsp;&nbsp;&nbsp; = ৫,১৩,০০০.০০ টাকা</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>আয়:</p>\r\n\r\n<p>(১) প্রতিটি গরু ৮০,০০০.০০ টাকা হিঃ ১০ টি গরুর মূল্য&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = ৮০০,০০০.০০ টাকা</p>\r\n\r\n<p>(২) প্রতিটি গরু প্রতিদিন ১২ কেজি গোবর উৎপাদন হিঃ (১২০*১২*১০)&nbsp; = ১৪,৪০০.০০&nbsp; টাকা</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; মোট আয়&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = ৮১৪,৪০০.০০ টাকা</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>মোট আয় = ৮১৪,৪০০.০০ - ৫,১৩,০০০.০০ টাকা = ৩০১,৪০০.০০টাকা</p>\r\n\r\n<p>সুতরাং প্রতিটি গরু থেকে লাভ প্রায় = ৩০,১৪০.০০ টাকা</p>\r\n\r\n<p>একই পদ্ধতি অনুসরণ করে ১০, ২০, কিংবা ৫০ টি গরু মোটাতাজাকরণ প্রকল্প দলিল তৈরী করা যাবে।&nbsp;&nbsp;&nbsp;</p>', NULL, '2022-10-13 15:45:45', '2022-10-13 15:45:45');
INSERT INTO `lectures` (`id`, `user_id`, `course_id`, `chapter_id`, `type`, `name`, `text`, `time`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 4, 1, 'হৃষ্টপুষ্টকরণে খাদ্য উপাদানসমূহ ও উহার শ্রেণী বিন্যাস', '<p>পশুসম্পদ শিল্পের জন্য প্রয়োজনীয় কাঁচামালের শতকরা ৬৫-৭০ ভাগ খরচ হয় মানসম্পন্ন খাদ্যের যোগান দিতে। বাকী অংশ বাসস্থান, চিকিৎসা ইত্যাদির জন্য ব্যয় হয়। অতএব লাভজনকভাবে খামার ব্যবসা করার জন্য সাশ্রয়ী মূল্যে গবাদিপশুর জন্য সুষম খাদ্য সরবরাহ করা একান্ত জরুরী।|</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>খাদ্যের শ্রেণীবিভাগ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; তরল (পানি)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; কঠিন&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>মোটা গোখাদ্য&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *দানাদার&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **খাদ্য অনুসঙ্গ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Roughage)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Concentrate)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Feed additives)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>শুকনা মোটা গোখাদ্য&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; রশালো মোটা গোখাদ্য</p>\r\n\r\n<p>(খড়, নাড়া, হে ইত্যাদি)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (কাটা ঘাস, সাইলেজ, গাছের পাতা ইত্যাদি)&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>*দানাদার (Concentrate)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>*দানাদার (প্রাণীজ উৎসঃ মাছের গুড়া ইত্যাদি)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (উদ্ভিজ্জ উৎসঃ ভূট্টা ভাঙ্গা, তেলের খৈল ইত্যাদি)&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>**খাদ্য অনুসঙ্গ (Feed additives)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ভিটামিন&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; খনিজ উপাদান&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; এন্টিবায়োটিক&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;হরমোন</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>পুষ্টি উপাদান সমূহের প্রয়োজনীয়তা</strong></p>\r\n\r\n<ul>\r\n	<li>পশুর দেহ গঠন ও দেহ রক্ষার জন্য</li>\r\n	<li>দৈহিক ওজন বৃদ্ধির জন্য</li>\r\n	<li>দেহের তাপমাএা নিয়ন্ত্রনসহ শরীরবৃত্তীয় সকল কার্যাবলীর জন্য।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>হৃষ্টপুষ্টকরণে গরুর খাদ্য উপাদানসমূহ</strong></p>\r\n\r\n<p>ক)বিভিন্ন ধরণের খড়সমূহ- ধানের খড়, গমের খড়, মেইজ (ভূট্টা) স্টোভার, ওট ঘাসের খড়, সয়াবিন খড়, ইউএমএস, ইউরিয়া প্রক্রিয়াজাত খড়, ইক্ষুর ডগা ইত্যাদি।</p>\r\n\r\n<p>খ)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; বিভিন্ন ধরণের ঘাসসমূহ-</p>\r\n\r\n<ul>\r\n	<li>বহুবর্ষজীবি ঘাস-নেপিয়ার, পারা, এন্ড্রোপোগন, পাচপালুম, প্লিকাটুলাম, স্পে&shy;ন্ডিডা, রোজী, গিনি, সেতারিয়া, সিগনাল, বাকশা ইত্যাদি।</li>\r\n	<li>একবর্ষজীবি ঘাস-ভূট্টার কচি গাছ, ভূট্টার সাইলেজ, যোয়ার ঘাস ও সাইলেজ, ওট ঘাস ইত্যাদি।</li>\r\n	<li>ডালজাতীয় ঘাসসমূহ- মাসকালাই,খেসারী, কাউপি, ধইঞ্চা, ইপিল ইপিল, অরহর, মটর ইত্যাদি।</li>\r\n</ul>\r\n\r\n<p>গ)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; দানাদার খাদ্য-</p>\r\n\r\n<ul>\r\n	<li>শর্করা জাতীয়-গম ভাঙ্গা, ভূট্টা ভাঙ্গা, চাল ভাঙ্গা, গমের ভূষি, চালের কুড়া, ছোলার ভুষি, খেসারী ভূষি, মসুরের ভূষি, মোলাসেস ইত্যাদি।</li>\r\n	<li>আমিষ জাতীয়- তিলের খৈল, সরিষার খৈল, সয়াবিন মিল, মাছের গুড়া ইত্যাদি।</li>\r\n</ul>\r\n\r\n<p><strong>খাদ্য উপাদান প্রাপ্তির ভিত্তিতে গরু </strong><strong>হৃষ্টপুষ্টকরণে</strong><strong>র </strong><strong>জন্য রেশন ফর্মুলেশন</strong></p>\r\n\r\n<ol>\r\n	<li><strong>খাদ্য তৈরীকরণ প্রক্রিয়ায় প্রাথমিক বিবেচ্য বিষয়সমূহ </strong><strong>নিম্নরূপ</strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>কি প্রকার প্রানীর জন্য খাদ্য তৈরী করতে হবে</li>\r\n	<li>প্রানীর স্বাস্থ্যগত অবস্থা, উৎপাদনের পর্যায়, দৈহিকওজন</li>\r\n	<li>নির্দ্দিষ্ট প্রকার প্রানীর জন্য কতটুকু শুস্কপদার্থ, শক্তি বা আমিষ প্রয়োজন</li>\r\n	<li>সারাবছরে প্রাপ্ত খাদ্যসমূহ এবং তাদের পুষ্টিউপাদানের মাত্রা</li>\r\n	<li>খাদ্যখরচ</li>\r\n	<li>খামারগুরু মোবাইল অ্যাপ থেকে সহজ ও সাবলীল নির্দেশনা পাওয়া যাবে</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>সুষম খাদ্য তৈরীর আরো কিছু করনীয়</strong>/<strong>বিবেচ্য বিষয়</strong>:</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>খাদ্যউপাদাননির্বাচন- খামারী প্রথমেই ঠিক করে নিবেন যে তিনি কোন কোন উপাদান তার প্রানীর রেশনে ব্যবহার করবেন। (খামারগুরু মোবাইল অ্যাপ এ দেয়া রেশন ক্যালকুলেটর ব্যবহার করা যাবে)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>নির্বাচিত খাদ্য উপাদানে আঁশজাতীয় খাবারের মধ্যে কি পরিমান খড় বা শুকনা আঁশালো খাবার আছে আর কি পরিমান সবুজ ঘাস/সাইলেজ বার সালো আঁশজাতীয় খাবার আছে।</li>\r\n	<li>দানাদার মিশ্রন তৈরীর জন্য যে খাদ্যোপাদান নির্বাচন করা হয়েছে তার মধ্যে শর্করা, আমিষ এবং খনিজসমৃদ্ধ খাদ্যোপাদান আছে কিনা।</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>গরু </strong><strong>হৃষ্টপুষ্টকরণে</strong> <strong>দু</strong>&rsquo;<strong>ধরনের খাদ্যের সমন্বয়ে রেশণ তৈরী করা হয়</strong><strong>।</strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>আঁশজাতীয়ঃশুধু খড়, ইউএমএস বা ইউরিয়া ও চিটা/নালীগুড় দ্বারা প্রক্রিয়াজাত কৃত খড়, সবুজ ঘাস ইত্যাদি।</li>\r\n	<li>দানাদারঃখৈল, ভূষী, চালেরকুড়া, খুদ, শুটকীমাছ, ঝিনুকের গুড়া, লবন ইত্যাদি।</li>\r\n</ul>\r\n\r\n<p>একজন খামারী তার এলাকায় সহজেপ্রাপ্য খাদ্যউপাদান দ্বারা রশদ প্রস্তুত করে খাওয়াতে পারেন। তবে খেয়াল রাখতে হবে রশদ টি যেন অর্থনৈতিকভাবে লাভজনক হয়।&nbsp; (সকল খাদ্য উৎপাদন প্রক্রিয়া খামারগুরু মোবাইল অ্যাপ এ দেয়া আছে )</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ক</strong>. <strong>আঁশ জাতীয় খাদ্যঃ</strong></p>\r\n\r\n<ul>\r\n	<li>শুধু খড় হলেতা কেটে টুকরো করে বা পানিতে ভিজিয়ে খাওয়াতে হবে।</li>\r\n	<li>বড় আকারের সবুজঘাস যেমন নেপিয়ার, ভূট্টা, জাম্বু ইত্যাদি ঘাস ও টুকরো করে কেটে দিতে হবে।রাস্তার পাশ, জমি বা কাদা-পানি পূর্নস্থান হতে কেটে আনা ঘাস ভালকরে পানিতে ধুয়ে সরবরাহ করতে হবে, কারন এসব ঘাসে কৃমির ডিম/লার্ভা থাকার সম্ভাবনা আছে।</li>\r\n	<li>কোন খামারী সবুজ ঘাস খাওয়াতে চাইলে প্রতি ১০০কেজি কাঁচাঘাসের সাথে ৩কেজি চিটাগুড় মিশিয়ে তা গরুকে খাওয়াতে পারেন।এক্ষেত্রে গরুকে পর্যাপ্ত পরিমানে কাঁচাঘাসও সরবরাহ করতে হবে।</li>\r\n	<li>খাওয়ানোর পরিমানঃ গরুকে তার ইচ্ছা অণুযায়ী, অর্থাৎ গরু যে পরিমান খেতে পারে সে পরিমান খড়/ইউএমএস/ঘাস সরবরাহ করতে হবে।</li>\r\n	<li>একবারে বেশি পরিমানে না দিয়ে অল্প করে বারেবারে দেওয়া ভাল।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>খ</strong>.<strong>দানাদারমিশ্রণঃ</strong></p>\r\n\r\n<p>খামারীদের সুবিধার জন্য নীচের সারনীতে কয়েকটি দানাদার মিশ্রণ তৈরীর বিভিন্ন উপাদান পরিমানসহ উল্লেখ করা হল।নিম্নের ছক অণুযায়ী খামারীগণ বিভিন্ন পরিমান দানাদার মিশ্রণ তৈরী করে নিতে পারবেন।</p>\r\n\r\n<ul>\r\n	<li>খাওয়ানোর পরিমানঃ গরুকে তার দেহের ওজন অণুপাতে দানাদারখাদ্য সরবরাহ করতে হবে। নীচের দানাদারমিশ্রণের যেকোন একটি গরুর ওজনের শতকরা ১.০-১.৫ ভাগ পরিমান সরবরাহ করলেই চলবে, তবে খামারী সর্বোচ্চ দৈহিক ওজনের শতকরা ১.৫ ভাগ পর্যন্ত সরবরাহ করতে পারবেন। অর্থাৎ, একটি গরুর দৈহিক ওজন ১০০কেজি হলে তাকে সর্বোচ্চ দুই কেজি পর্যন্ত দানাদার মিশ্রণটি খাওয়ানো লাভজনক হবে</li>\r\n	<li>নির্ভুল পরিমান পাওয়া যাবে খামারগুরু মোবাইল অ্যাপ এর খাবার ক্যালকুলেটর এ)</li>\r\n	<li>খাওয়ানোর সময়ঃ দানাদার মিশ্রণটি একবারে নাখাইয়ে দুই ভাগেভাগ করে সকালে এবং বিকালে খাওয়াতে হবে।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>গ. </strong><strong>পানিঃ </strong>গরুকে র্যাপ্ত পরিমানে পরিস্কার খাবার পানি সরবরাহ করতে হবে।</p>\r\n\r\n<p><strong>সারণীঃ মোটাতাজাকরণের জন্য সুষম দানাদার&nbsp; খাদ্য মিশ্রণ </strong>(<strong>কেজি</strong>)</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:17px; vertical-align:top; width:204px\">\r\n			<p><strong>উপাদান</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; vertical-align:top; width:96px\">\r\n			<p>মিশ্রন-১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; vertical-align:top; width:96px\">\r\n			<p>মিশ্রন-২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; vertical-align:top; width:96px\">\r\n			<p>মিশ্রন-৩</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; vertical-align:top; width:96px\">\r\n			<p>মিশ্রন-৪</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>গম ভূঁষি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>-</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>চালের কুঁড়া</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>গম ভাঙ্গা</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>খেসারীর র্ভুঁষি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৫</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>তিলের / সরিষার / নারিকেলের খৈল</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৯</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>সয়াবিন মিল</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৮</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১২</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১২</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>ডিসিপি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>ভিটামিন-মিনারেল প্রিমিক্স</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>লবন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>মোট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>বিপাকীয় শক্তি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৪৬৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৪৭৯</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৪৪৫</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৪৫৩</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>প্রোটিন (%)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৮</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৮</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৮</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>১৮</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:204px\">\r\n			<p>দাম(টাকা/কেজি)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৯</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>৩০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:96px\">\r\n			<p>২৮</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, '2022-10-13 15:47:20', '2022-10-13 15:47:20'),
(5, 1, 1, 5, 1, 'উন্নত জাতের ঘাস পরিচিতি, চাষ পদ্ধতি', '<p><strong>কেন ঘাস চাষ করবেন?</strong></p>\r\n\r\n<ul>\r\n	<li>অধিক মাংস</li>\r\n	<li>অধিক দুধ</li>\r\n	<li>অধিক লাভ</li>\r\n	<li>স্বাস্থ্যসম্মত খামার সুষ্ঠভাবে পরিচালনার জন্য&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>বছর ব্যাপী ঘাস সরবরাহ দুইভাবে করা যায়</strong></p>\r\n\r\n<ul>\r\n	<li>সারা বছর ঘাসের উৎপাদন নিশ্চিত করা</li>\r\n	<li>যে মৌসুমে অধিক ঘাস উৎপাদিত হয় তখন উদ্বৃত্ত ঘাসের সংরক্ষণ</li>\r\n</ul>\r\n\r\n<p><strong>গরুর জন্য উপযোগী ঘাস সমূহ</strong></p>\r\n\r\n<p>১.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; উচ্চ ফলনশীল বহুবর্ষজীবি ঘাস</p>\r\n\r\n<p>পারা, গিনি, সিগনাল, জাম্বু, জার্মান, এন্ড্রোপোগন, স্পেনডিডা, রোজী</p>\r\n\r\n<p>২.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; উচ্চ ফলনশীল বর্ষজীবি ঘাস</p>\r\n\r\n<p>ওটস, ভূট্টা, ট্রিটিক্যালি</p>\r\n\r\n<p>৩.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; মৌসুমী ডাল/লিগুম জাতীয় ঘাস</p>\r\n\r\n<p>মাসকালাই, খেসারী, অরহর, ধৈঞ্চা, কাউপি</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ঘাসের (নেপিয়ার) উৎপাদন খরচ (বিঘা/বছর)</strong></p>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse; width:502px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:21px; vertical-align:top; width:74px\">\r\n			<p>ক্রমিক নং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:21px; vertical-align:top; width:108px\">\r\n			<p>বিষয়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:21px; vertical-align:top; width:112px\">\r\n			<p>ইউনিট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:21px; vertical-align:top; width:109px\">\r\n			<p>খরচ/ইউনিট (টাকা)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:21px; vertical-align:top; width:99px\">\r\n			<p>মোট খরচ (টাকা)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:74px\">\r\n			<p>১.</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:108px\">\r\n			<p>বীজ/কাটিং</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:112px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:109px\">\r\n			<p>-</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:99px\">\r\n			<p>-</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:74px\">\r\n			<p>২.</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:108px\">\r\n			<p>জমি চাষ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:112px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:109px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:99px\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"3\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:74px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:108px\">\r\n			<p>(১) চাষ/জ্বালানী</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:112px\">\r\n			<p>৬</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:109px\">\r\n			<p>৩৯০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:99px\">\r\n			<p>৩১২০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:108px\">\r\n			<p>(২) শ্রমিক</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:112px\">\r\n			<p>৪</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:109px\">\r\n			<p>২০০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:99px\">\r\n			<p>১৬০০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:108px\">\r\n			<p>(৩) গোবর সার</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:112px\">\r\n			<p>৪ ট্রলি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:109px\">\r\n			<p>২০০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:99px\">\r\n			<p>১৬০০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"3\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:74px\">\r\n			<p>৩.</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:108px\">\r\n			<p>রাসায়নিক সার</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:112px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:109px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:99px\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:108px\">\r\n			<p>(১) ইউরিয়া</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:112px\">\r\n			<p>৪০ কেজি/কাট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:109px\">\r\n			<p>১৬</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:99px\">\r\n			<p>৫১২০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:108px\">\r\n			<p>(২) ড্যাপ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:112px\">\r\n			<p>২৫ কেজি/কাট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:109px\">\r\n			<p>২৬</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:99px\">\r\n			<p>৫,২০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:74px\">\r\n			<p>৪.</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:108px\">\r\n			<p>সেচ প্রদান</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:112px\">\r\n			<p>৩ বার/কাট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:109px\">\r\n			<p>৩০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:99px\">\r\n			<p>৭,২০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:74px\">\r\n			<p>৫.</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:108px\">\r\n			<p>আগাছা পরিস্কার</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:112px\">\r\n			<p>৫ জন শ্রমিক/কাট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:109px\">\r\n			<p>৪০০</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:99px\">\r\n			<p>১৬,০০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>নেপিয়ার ঘাস উৎপাদনে আয় (বছর/বিঘা)</strong></p>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:18px; vertical-align:top; width:67px\">\r\n			<p>ক্রমিক নং</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:18px; vertical-align:top; width:144px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p>বিষয়</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:18px; vertical-align:top; width:294px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:13px; vertical-align:top; width:144px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:13px; vertical-align:top; width:150px\">\r\n			<p>মোট/বছর</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:67px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:144px\">\r\n			<p>নেপিয়ার উৎপাদন (বিঘা জমি)</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:144px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:15px; vertical-align:top; width:150px\">\r\n			<p>৩২,০০০ আটি/ ৪৮ মে.টন</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:67px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:144px\">&nbsp;</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:144px\">\r\n			<p>প্রতি কাট</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:150px\">\r\n			<p>১২৮,০০০</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:67px\">\r\n			<p>১.</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:144px\">\r\n			<p>আটি/কেজি ঘাস বিক্রি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:144px\">\r\n			<p>৪০০০ আটি বা ৮ মে. টন</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:150px\">\r\n			<p>৬০০০০</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>বিএলআরআই এ বিদ্যমান ঘাসের বিভিন্ন জাতসমূহ</strong></p>\r\n\r\n<p>বিএলআরআই কর্তৃক উন্নীত তিনটি নেপিয়ার জাতের চাষাবাদ কৌশল নিন্মে বর্ণনা করা হল।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>বিএলআরআই নেপিয়ার ঘাসের চাষ পদ্ধতি জমি প্রস্তুতকালীন প্রতি হেক্টর জমিতে ৩০০-৫০০ মণ গোবর, ৫০ কিলো ইউরিয়া, ৭০ কিলো টিএসপি ও ৩০ কিলো এমপি সার প্রয়োগ করে ভালভাবে মাটির সহিত মিশিয়ে দিয়ে মাটি ঝুর ঝুরে করতে হবে। অঞ্চল ভেদে সারের পরিমাণের ভিন্নতা রয়েছে। উপরে বর্ণিত সারের মাত্রা দোআঁশ মাটির জন্য প্রযোজ্য হবে। লাল এবং বেলে মাটিতে চাষের সময় ইউরিয়ার পরিমাণ হেক্টর প্রতি ৭৫-১০০ কিলোতে বৃদ্ধি করতে হবে। ঘাস লাগানোর ৩০ দিন পর হেক্টর প্রতি ৫০ কিলো ইউরিয়া এবং প্রতি কাটিং পর একই হারে ইউরিয়া সার প্রয়োগ করতে হবে। যে সমস্ত খামারীগণ গবাদিপশু বা পোল্ট্রি খামারের বর্জ্য পানি জমা করতে পারেন, তাঁরা উক্ত বর্জ্য পানি নেপিয়ারের দু&lsquo;টো লাইনের মাঝে পাম্প করতে পারেন। বর্জ্য পানি দেয়ার পর মাটি দিয়ে ঢেকে দিতে হবে।</p>\r\n\r\n<p>আমাদের দেশে বন্যা প্রবণ এলাকা বাদে সারা বছরই নেপিয়ার চাষ করা যায়। মার্চ হতে অক্টোবর মাসে নেপিয়ার দ্রুত বৃদ্ধি পায়, শীত শুরু হওয়ার সাথে সাথে নেপিয়ারের বৃদ্ধি হ্রাস পায়। এজন্য নেপিয়ার ঘাসের কাটিং করার উপযুক্ত সময় হচ্ছে অক্টোবর হতে ডিসেম্বর মাস পর্যন্ত। বন্যামুক্ত এলাকায় জমি প্রস্তুত ও চাষাবাদ করার উপযুক্ত সময় হচ্ছে ডিসেম্বর হতে ফেব্রুয়ারী মাস। এ সময়ে জমি আগাছা মুক্ত করা সহজ। জমি তৈরীর জন্য প্রয়োজনে পানি সেচের ব্যবস্থা করা যেতে পারে। ঘাস লাগানোর পর বৃষ্টি না হলে ২/১ টি সেচ দেয়া যেতে পারে। বৃষ্টি শুরু হওয়ার পর ঘাসে তেমন কোন সেচ প্রয়োজন নেই।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>কাটিং ব্যবহারে নেপিয়ার চাষ</strong></p>\r\n\r\n<p>নেপিয়ার গাছের পরিপক্ক কান্ডের তিনটি গিরা রেখে একটি কাটিং করতে হবে। ধারালো ছুরি/দা দিয়ে কান্ড কেটে কেটে কাটিং তেরী করতে হবে। জমি তৈরীর পর সোজা লাইন করে ৬০ সে মি পর পর কাটিং লাগাতে হবে। কাটিং এর দু&lsquo;টো গিরা মাটির নীচে এবং একটি গিরা মাটির উপরে থাকবে, এবং মাটির সাথে ৩০০ হেলানো অবস্থায় (অর্থাৎ মাটি হতে সর্বোচ্চ দু&lsquo;আঙ্গুল হেলানো) কাটিং মাটিতে বসাতে হবে। দু&lsquo;টো লাইনের মাঝে সর্বোচ্চ দুরত্ব ৯০ সেমি বা ৩ ফুট রেখে পরবর্তী লাইনে কাটিং লাগাতে হবে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সিডলিং বা চারা ব্যবহার করে নেপিয়ার চাষ</strong></p>\r\n\r\n<p>&lsquo;সিডলিং&rsquo; ব্যবহারে নেপিয়ার চাষ সবচেয়ে উত্তম পদ্ধতি। এ পদ্ধতিতে চাষকৃত ঘাস দ্রুত বৃদ্ধি পায় ও বংশ বৃদ্ধি ঘটায়। সিডলিং ব্যবহারে চাষ পদ্ধতিতে নীচের পদক্ষেপগুলো অনুসরণীয়</p>\r\n\r\n<ol>\r\n	<li>মাটির উপরে ২-৩ সেমি রেখে নেপিয়ার ঘাস কাটুন</li>\r\n	<li>পুরো নেপিয়ারের গুচ্ছটি ৪-৫ সেমি মাটির নীচ হতে তুলুন</li>\r\n	<li>গুচ্ছ হতে প্রতিটি &lsquo;সিডলিং&rsquo;বা চারা পৃথক করুন</li>\r\n	<li>সিডলিং এর গোড়ায় বিদ্যমান মূলগুলো ৫ সেমি এর বেশী হলে ছেঁটে ফেলুন</li>\r\n	<li>কাটিং পদ্ধতির নিয়মে লাইন করে চারাগুলো মাটির গর্তে বসিয়ে মাটি চেপে দিন।</li>\r\n	<li>কিন্তু উপরের অংশে কোন মাটি দিবেন না।</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>নেপিয়ার (হাইব্রিড) ঘাসের চাষ প্রণালী</strong></p>\r\n\r\n<p>কাটিং এর সংখ্যা: বিঘা প্রতি ৩৩০০ টি কাটিং/মোথা।&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>কাটিং লাগানোর দূরত্ব: লাইন - লাইনঃ ৭০ সে. মি.; কাটিং- কাটিংঃ ৩৫ সে. মি&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>সার প্রয়োগ: গোবর/জৈব সার ২-৩ মে: টন/ বিঘা</p>\r\n\r\n<p>জমি তৈরীর সময়: ইউরিয়া-টিএসপি-এমপি- ৭:৯:৪ কেজি প্রতি বিঘা&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>ঘাস লাগানোর ১ মাস পর: ইউরিয়া ৬-১০ কেজি প্রতি বিঘা&nbsp;</p>\r\n\r\n<p>প্রতি কাটিং পর পর: ইউরিয়া ৬ -১০ কেজি প্রতি বিঘা।&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>সেচ: খরা মৌসুমে ১৫-২০ দিন পর পর।&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>ঘাস কাটার সময়: ৩০-৩৫ দিন পর পর- গ্রীষ্মকাল।</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ৪৫-৫০ দিন পর পর- শীতকালে (সেচ সুবিধা সাপেক্ষে)</p>\r\n\r\n<p>বছরে কতবার কাটা যায়ঃ ৫-৬বার &ndash;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ১ম বছর, ৭-৮ বার-২য়, ৩য় ও ৪র্থ বছর।&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>\r\n\r\n<p><strong>কাটিং/বীজ লাগানোর পদ্ধতি</strong></p>\r\n\r\n<p>বহুবর্ষী ঘাস, একবার লাগালে ৭-৮ বছর পর্যন্ত ঘাস উৎপন্ন হয়। এ ঘাসকে জলজ ঘাস বলা যায়। কারণ ইহা পানি প্রিয় ও স্যাঁতস্যাঁতে জমিতে ভাল জন্মে। তবে শুষ্ক জমিতেও পারা ঘাস উৎপন্ন করা সম্ভব। এক্ষেত্রে ফলন কিছুটা কমে যাবে। বছরের যে কোন সময় চাষ করা যায়, তবে উত্তম সময় হচ্ছে ফাল্গুন থেকে আষাঢ় মাস। সীমিত লবনাক্ত এলাকা বা পাহাড়ী ঢালেও ঘাসটি জন্মে।</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:156px\">\r\n			<p>চাষ পদ্ধতি</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:176px\">\r\n			<p>সার প্রয়োগ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:73px\">\r\n			<p>সেচ</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:78px\">\r\n			<p>ঘাস কাটার সময়</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:101px\">\r\n			<p>কাটিং সংখ্যা/বৎসর</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:75px\">\r\n			<p>ঘাস উৎপাদন</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:156px\">\r\n			<p>প্রচলিত পদ্ধতিতে জমি চাষ দিতে হবে। হেঃ প্রতি ২৮-৩০ হাজার কাটিং প্রয়োজন। লাইন থেকে লাইন ও কাটিং থেকে কাটিং এর দূরত্ব যথাক্রমে ৭০ সে.মি এবং ৩৫ সে.মি.।</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:176px\">\r\n			<p>জমি প্রস্তুত কালীন হেঃ প্রতি ইউরিয়া ৫০ কেজি, টিএসপি ৭০ কেজি ও এমপি ৩০ কেজি। ঘাস লাগানোর ১ মাস পর হেঃ প্রতি ৫০ কেজি ইউরিয়া।</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:73px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:78px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:101px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:75px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ভূট্টা</strong></p>\r\n\r\n<p>ভূট্টা একটি বর্ষজীবি অর্থকরী শস্য। ভূট্টার কচি সবুজ ঘাস গবাদিপশুর জন্য যেমন পুষ্টিকর ও উপাদেয় খাদ্য, ঠিক তেমনি এর দানা মানুষের জন্য বিভিন্ন ধরণের সুস্বাদু খাবার তৈরীতে ব্যবহৃত হয়। ভূট্টার জাতসমূহের মধ্যে বর্ণালী, শুভ্রা, খইভূট্টা, মোহর, বারি ভূট্টা ৫, বারি ভূট্টা ৬, প্যাসিফিক ১১, বারি হাইব্রিড ভূট্টা এবং হাইব্রিড ভূট্টা, কোয়ালিটি প্রোটিন মেইজ অন্যতম। বাংলাদেশে রবি (নভেম্বর-ফেব্রুয়ারী) ও খরিপ (মার্চ-অক্টোবর) উভয় মৌসুমেই ভূট্টা চাষ করা হয়। পানি নিষ্কাশনের সুযোগসহ দোআঁশ অথবা এঁটেল দোআঁশ মাটিতে ভূট্টা উৎপাদন করা যায়। পরিমাণ মত সার প্রয়োগ করা হলে বেলে দোআঁশ মাটিতেও ভূট্টা উৎপাদন সম্ভব।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ভূট্ট্রা ঘাসের চাষ প্রণালী</strong></p>\r\n\r\n<p>ভূট্টা সাধারনত উচু, জলাবদ্ধতামুক্ত, বেলে-দোআশ মাটিতে ভালো হয়। বীজ বপনের পূর্বে জমিকে ৩-৪ বার চাষ দিয়ে ঝুরঝুর করতে হবে।</p>\r\n\r\n<p>বীজের পরিমাণ:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ৩-৩.৫ কেজি</p>\r\n\r\n<p>বপন পদ্ধতি:&nbsp; ছিটিয়ে বা সরিতে লাগানো যায়, সারি- সারির দুরত্ব ৬০-৭০ সেমি;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; চারা-চারার দুরত্ব ২০-২৫ সেমি</p>\r\n\r\n<p>সার প্রয়োগ:&nbsp;&nbsp;&nbsp; গোবর/জৈব সার ২-৩ মে:টন /বিঘা।</p>\r\n\r\n<p>জমি তৈরির সময়:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ১৩ কেজি টিএসপি; ৬ কেজি জিপসাম, এবং ১মাস ও ২মাস সময়ে</p>\r\n\r\n<p>আগাছা পরিস্কার করে ১৬ কেজি ইউরিয়া সার দিতে হবে।</p>\r\n\r\n<p>সেচ:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ১ মাস ও ২ মাস সময়ে সেচ দিতে হবে</p>\r\n\r\n<p>ঘাস কাটা:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ৩-৪ মাস বয়সে</p>', NULL, '2022-10-13 15:50:51', '2022-10-13 15:50:51');
INSERT INTO `lectures` (`id`, `user_id`, `course_id`, `chapter_id`, `type`, `name`, `text`, `time`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 6, 1, 'জাতের ঘাস প্রক্রিয়াকরণ, সংরক্ষণ, ব্যবহার', '<p>সাধারণভাবে বায়ুরোধক&nbsp; অবহাওয়ায় সংরক্ষিত সবুজ ঘাসকে সাইলেজ বলা হয়ে থাকে। অথবা সাইলেজ হলো গাজনকৃত সবুজ ঘাস। উচ্চ আর্দ্রতাযুক্ত সবুজ ঘাসকে বায়ূহীন পরিবেশে সংরক্ষণ করা হয়। এই প্রক্রিয়াজাত ফডারকে সাইলেজ বলে। বায়ূহীন পরিবেশে পর্যাপ্ত আর্দ্রতাযুক্ত (৬০-৬৫%) ফরেজ বা সবুজ ঘাসকে সংরক্ষ্ণ করলে এতে কিছূ রাসায়নিক পরিবর্তন ঘটে এবং এই প্রক্রিয়া বা পরিবর্তন ঘটানোর প্রক্রিয়াকে এনসাইলিং বলে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>সাইলেজ তৈরির প্রধান উদ্দেশ্য হলো, যে মৌসুমে সবুজ ঘাসের আধিক্য থাকে, সে মৌসুমে সাইলেজ প্রস্তুত করা এবং সবুজ ঘাসের অভাবের সময় গবাদি পশুকে তার&nbsp; সরবরাহ নিশ্চিত করা ।&nbsp; এতে কাঁচা ঘাসের অপচয় কম হয় এবং উহার সঠিক ব্যবহার নিশ্চিত করা যায়।&nbsp; সাইলেজ তৈরীর মূলনীতি হলো, যখন উদ্ভিদ কোষ অক্সিজেন (O2) বিহীন অবস্থায় ফারমেন্টটেটেট হয়, তখন ল্যাকটিক এসিড উংপন্ন তৈরী হয়ে থাকে এবং এই ল্যাকটিক এসিড সবুজ ঘাস সংরক্ষণে সহায়তা করে থাকে।&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>মাটির গর্ত পদ্ধতি</strong></p>\r\n\r\n<p>এই পদ্ধতি অনুসরণ করে খামারীরা অতি সহজেই সাইলেজ তৈরী করতে পাারেন । এই পদ্ধতিতে প্রচলিত ফডার ছাড়াও অপ্রচলিত ফডার যেমন মেইজ স্ট্রভার এমনকি প্রাকিতিক সবুজ ঘাস প্রভৃতিকে সাইলেজ হিসেবে সংরক্ষণ করা যায়। এখানে আরও উলে&shy;খ্য যে, আমাদের দেশে বর্ষা মৌসুমে যে পর্যাপ্ত সবুজ ঘাস পাওয়া যায় তা এ পদ্ধতি অনুসরণ করে সাইলেজ করা যায়।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>মাটির গর্ত তৈরী&nbsp; </strong></p>\r\n\r\n<p>&nbsp;একশত ঘনফুট (১০০)&nbsp; একটি মাটির গর্তে ২.৫০-৩.০০ টন সবুজ ঘাস সংরক্ষণ করা যায়। সাইলেজের গর্তটি উঁচু জায়গায় হতে হবে, যাতে গর্তের মধ্যে পানি ঢুকতে না পারে। গর্তের গভীরতা ৩ ফুট, প্রস্থের তলায় ৩ ফুট, মাঝে ৮ ফুট ও উপরে ১০ ফুট হতে হবে। গর্তের দৈর্ঘ্য সাধারনতঃ সবুজ ঘাসের পরিমানের উপর নির্ভর করে থাকে। গর্তের তলার চার কোণা পাতিলের মত সমভাবে বক্র থাকলে ঘাস চাপানো সহজ হবে। মাটির গর্তে ঘাস সাজানোর সময়&nbsp; সাইলোর চারিদিকে পলিথিন মুড়ে অথবা সাইলোর নীচে এবং চারিদিকে খড় দিয়ে মাটি ঢেকে তার উপর স্তরে স্তরে ঘাস সাজিয়ে&nbsp; &ldquo;সাইলেজ&rdquo; করলে ঘাস নিশ্চিন্তে অনেক দিন রাখা যায়। নি&aelig;ে ২০ ফুট লম্বা একটি মাটির গর্তের&nbsp; সাইলো নমুনা দেখানো হলো।</p>\r\n\r\n<p><strong>সাইলেজ তৈরীর পদ্ধতি</strong></p>\r\n\r\n<p>যে ঘাসের সাইলেজ প্রস্তুত করা হবে তা প্রথমে টুকরা টুকরা কেটে নিতে হবে। সাইলোতে ঘাস দেওয়ার পূর্বে&nbsp; তলায় পলিথিন অথবা পুরু করে খড় বিছাতে হবে।&nbsp; টুকরা টুকরা করা সবুজ ঘাস সাইলো পিটের মধ্যে স্তরে স্তরে সাজাত হবে যেন ভিতরে বাতাস না থাকে। ফডার যত বেশী চাপাইয়া মাটির গর্তে রাখা যাবে সাইলেজ তত বেশী উন্নত মানের হবে। সাইলেজ মোলাসেস সহ অথবা মোলসেস ছাড়াও করা যেতে পারে। মোলাসেস ব্যবহার করলে, সুবজ ঘাসের শতকরা ৩-৪ ভাগ চিটাগুড় মেপে একটি চাড়িতে নিতে হবে। তারপর ঘন চিটাগুড়ের মধ্যে ১:১ অথবা ৪:৩ পরিমাণে পানি মিশালে ইহা ঘাসের উপর ছিটানোর উপযোগী হবে। ঝরনা বা হাত দ্বারা ছিটিয়ে এ মিশ্রণ ঘাসে সমভাবে মিশানো যাবে। প্রতি পরতে ৩০০ কেজি ঘাসের পরতে পূর্বের হিসেবে ৯ থেকে ১২ কেজি চিটাগুড় ও ৯ থেকে ১২ কেজি পানিতে মিশিয়ে উক্ত মিশ্রণ ঝরনা বা হাত দিয়ে সমভাবে ছিটিয়ে দিতে হবে। সবুজ ঘাসের সাথে শুকনো খড় ব্যবহার করলে এক স্তর কাচা ঘাস এবং এক স্তর খড় দিতে হবে। উপরের নিয়মে প্রতি ৩০০ সবুজ ঘাসের সাথে ১৫ কেজি খড় দিতে হবে এবং ঘাস সাজানোর পর মোলাসের দিতে হবে। খড়ের মধ্যে কোন মোলাসেস বা চিটাগুড় দিতে হবে না। যতটা সম্ভব ভালভাবে পা দিয়ে পাড়িয়ে ভাল ভাবে আট সাট করে ভিতরের বাতাস বের করে দিতে হবে। সবুজ ঘাস যত এঁটে সাজানো যাবে সাইলেজ তত সুন্দর হবে। সাইলো ভর্তি করে মাটির উপরে ৪-৫ ফুট পর্যন্ত ঘাস সাজাতে হবে। সব শেষে পলিথিন দিয়ে ঢেকে দিতে হবে। পলিথিন দিয়ে ঢাকার পর ৩-৪ ইঞ্চি পুরু করে মাটি দিতে হবে যাতে বাতাসে উড়ে না যায় বা অন্য কোন পশু দ্বারা ক্ষতিগ্রস্ত না হয়। এখানে উল্লেখ্য যে, সাইলো গর্ত একদিনেই সাজানো ভাল। তবে একদিনে বৃষ্টি অথবা অন্য কোন কারণে সাজানো সম্ভব না হলে প্রতিদিন অল্প অল্প করেও কয়েকদিন ব্যাপী সাজিয়ে সাইলেজ তৈরী করা যায়।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>সাইলেজ তৈরীর সময় যে বিষয় খেয়াল রাখা উচিত</p>\r\n\r\n<p>১। সাইলেজ তৈরীর জন্য ঘাসে অবশ্যই ৩০-৩৫ শতাংশ শুস্কপদার্থ (ড্রাইমেটার) থাকা প্রয়োজন ।</p>\r\n\r\n<p>২। নীচু জায়গায় সাইলো করা যাবে না ।</p>\r\n\r\n<p>৩। উপরের পলিথিন সুন্দরভাবে এঁটে দিতে হবে যাতে কোন পানি &ldquo;সাইলেজ&rdquo; এর ভিতরে প্রবেশ না করে।</p>\r\n\r\n<p>৪। চিটাগুড় পাতলা হলে পরিমাণ বাড়িয়ে পানি কম করে মিশাতে হবে অর্থাৎ এমনভাবে দ্রবণ তৈরী করতে হবে যাতে</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; আঠার মত ঘাসের গায়ে লেগে থাকে।</p>\r\n\r\n<p>৫। ঘাস এবং খড় এমনভাবে সাজাতে হবে যাতে ফাঁকা জায়গাগুলো যথাসম্ভব বন্ধ হয়ে যায়। বিশেষ করে, সাইলোর</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; কোনাগুলো এবং পাশসমূহ পা দিয়ে পাড়িয়ে ঘাস সাজাতে হবে ।</p>\r\n\r\n<p>৬। গরু বাছুর, শেয়াল যাতে উপরের পলিথিন নষ্ট না করে সেদিকে খেয়াল করতে হবে ।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>প্রয়োজনে সাইলেজ এডিটিভ বা প্রিজারভেটিভ সংযোজন</strong></p>\r\n\r\n<p>(১)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; পুষ্টি উপাদান সংমিশ্রণ</p>\r\n\r\n<p>(২)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; গাঁজনযোগ্য শর্করা</p>\r\n\r\n<p>(৩)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; জৈব এসিড</p>\r\n\r\n<p>(৪)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; অনাকাঙ্খিত মোল্ড বা ব্যাকটেরিয়া প্রতিরোধী দ্রব্য</p>\r\n\r\n<p>(৫)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; সরাসরি বা আংশিক অ∙িজেন হ্রাস</p>\r\n\r\n<p>(৬)&nbsp;&nbsp;&nbsp;&nbsp; সাইলেজের আদ্রতা হ্রাস</p>\r\n\r\n<p>(৭)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; নাইট্রোজেনের পরিমান বৃদ্ধি ও</p>\r\n\r\n<p>(৮)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; গলিত বা পদার্থ হিসেবে যে এসিড বেলিয়ে যায় তার সংমিশ্রণ&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>কয়টি সাইলেজ এডিটিভ বা প্রিজারভেটিভের নাম</strong></p>\r\n\r\n<p>১। নালীগুড়ঃ ৩-৪ % হারে</p>\r\n\r\n<p>২। ইউরিয়াঃ ০.৫% হারে</p>\r\n\r\n<p>৩। লাইমস্টোনঃ ০.৫-১% হারে</p>\r\n\r\n<p>৪। জৈব এসিডঃ ১% হারে</p>\r\n\r\n<p>৫। ব্যাটেরিয়াল কালচারঃ প্রয়োজন মত&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সাইলেজের উপকারিতাঃ</strong></p>\r\n\r\n<p>১। ঘাসের সাইলেজে ৮৫ % পুষ্টি পাওয়া যায়</p>\r\n\r\n<p>২। এখানে ঘাসের সমস্ত অংশই সংরক্ষণ করা যায়</p>\r\n\r\n<p>৩। বর্ষা মৌসুমে কাচা ঘাস সংরক্ষণ বরা কঠিন কিন্তু সাইলেজ সহজেই করা সম্ভব</p>\r\n\r\n<p>৪। সাইলেজ অত্যন্ত সুস্বাদু ও ল্যাকটিক এসিড খাদ্য</p>\r\n\r\n<p>৫। এটা আমিষ ও ভিটামিনের উৎস</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ভাল সাইলেজের বৈশিষ্ট্য</strong></p>\r\n\r\n<p>১। সাইলেজের রং হলুদাভ সবুজ</p>\r\n\r\n<p>২। গন্ধ- আচারের ন্যায় অনেক সুগন্ধ</p>\r\n\r\n<p>৩। পিএইচ ৩.৫-৪.৫</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সাইলেজ খাওয়ানো</strong></p>\r\n\r\n<p>গবেষণায় দেখা গেছে যে, ১০০ কেজি ওজনের একটি ষাঁড় দৈনিক গড়ে তার দৈহিক ওজনের ১.৯২ হারে সাইলেজ শুষ্কপদার্থ গ্রহণ করে থাকে। দুধাল গাভী প্রতিদিন কি পরিমান দুধ উংপাদন করে তার উপর ভিত্তি করে সাইলেজ সরবরাহ করতে হয়। গবেষণায় কোন কোন বিজ্ঞানী দেখে ছেন যে, যেখানে সাইলেজ কে একক রাফেজ হিসেবে ব্যবহৃত, সেখানে একটি গাভী প্রতি ৫০ কেজি দৈহিক ওজনের জন্য ৩ কেজি পরিমান সাইলেজ গ্রহণ করে থাকে। সাইলেজ এর সংগে কাচা ঘাস অথবা শুকনা খড়ও একত্রে গবাদি পশুকে খাওয়ানো যেতে পারে। সাধারণ নিয়মে দুই ভাগ সাইলেজ এর সাথে এক ভাগ কাচা ঘাস ও এক ভাগ খড় মিশিয়ে খাওয়ানো যেতে পারে।&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সাইলেজ কি?</strong></p>\r\n\r\n<p>সাইলেজ একটি ইংরেজী শব্দ যার দ্বারা সবুজ ঘাসের পুষ্টিমান অক্ষুন্ন রেখে একটি নির্দিষ্ট অ&curren;&oslash;তায় বা ক্ষারত্বে ঘাস সংরক্ষণ করাকে বোঝায়। সাইলেজ করতে সাইলো ও প্রিজারভেটিভ দরকার হয়। পৃথিবীর বিভিন্ন দেশে বিভিন্ন প্রকারের পাকা সাইলোর ব্যবহার হয়ে থাকে যা অধিক ব্যয়বহুল। বাংলাদেশ প্রাণীসম্পদ গবেষণা ইনস্টিটিউট স্বল্প ব্যয়ে মাটির গর্তে সবুজ ঘাস সংরক্ষণ পদ্ধতি উদ্ভাবন করেছে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সাইলেজ তৈরি পদ্ধতি:</strong></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li>সবুজ ঘাসের শতকরা ৩-৪ ভাগ নিয়ে সমপরিমান বা ৩ঃ৪ অনুপাত পানির সাথে মিশিয়ে দ্রবন তৈরি করতে হবে।</li>\r\n	<li>সাইলোর তলায় ও চতুর্পাশে পরিথিন বা খড়ের পুরু আস্তরন দিতে হবে।</li>\r\n	<li>পরতে পরতে সবুজ ঘাস সাজাতে হবে এবং প্রতি পরতে ৩০০ কেজি সবুজ ঘাস ও ১৫ কেজি শুকনা খড় দিতে হবে।</li>\r\n	<li>প্রতি ৩০০ কেজি ঘাসের পরতের উপর ৩০০ কেজির জন্য প্রয়োজনীয় পরিমান চিটাগুর ও পানির দ্রবন ছিটিয়ে দিতে হবে।</li>\r\n	<li>এভাবে সাইলো ভর্তি করে মাটির উপরে ৪-৫ ফুট পর্যন্ত ঘাস সাজাতে হবে।</li>\r\n	<li>মাটির গর্তে এমনভাবে ঘাস আঁটাতে হবে যেন ভিতরে কোনো বাতাস অবশিষ্ট না থাকে।</li>\r\n	<li>ঘাস সাজানো শেষ হলে খড় দ্বারা পুরু করে আস্তরন দিয়ে পলিথিন দিয়ে সম্পুর্ণ সাইলো ঢেকে দিতে হবে।</li>\r\n	<li>সবশেষে ৩-৪ ইঞ্চি পুরু করে মাটি দিতে হবে।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>মাটির গর্ত:</strong></p>\r\n\r\n<p>একশ সিএফটি মাটির গর্তে ২.৫-৩ টন ঘাস সংরক্ষণ করা যায়। গর্তটি হতে হবে উঁচু জায়গায়। গর্তের পরিমাপ হবে; উপরে ১০ ফুট, প্রস্থের তলায় ৩ ফুট, মাঝে ৮ ফুট ও গভীরতা ৩ ফুট। গর্তটির তলা পাতিলের মতো সমভাবে বক্র হলে ঘাস চাপাতে সুবিধা হবে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সাবধানতা:</strong></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li>নীচু জায়গায় সাইলো করা যাবে না।</li>\r\n	<li>চিটাগুর ও পানির মিশ্রন এসনভাবে তৈরি করতে হবে যেন আঠার মতো ঘাসের গায়ে লেগে থাকে।</li>\r\n	<li>ঘাস যথাসম্ভব এটেঁ সাজাতে হবে এবং গর্ত পলিথিন দিয়ে এমনভাবে বদ্ধ করতে হবে যেন বাতাস বা বৃষ্টির পানি না ঢুকে।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>গরু হৃষ্টপুষ্টকরণে উন্নত প্রযুক্তির ব্যবহার ও সাবধানতা (ইউএমএস, ইউটিএস, হে)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>উন্নত প্রযুক্তির ব্যবহার:</strong></p>\r\n\r\n<p>বাংলাদেশ প্রাণীসম্পদ গবেষণা ইনস্টিটিউট অধিক মাংস উৎপাদন করার বৈজ্ঞানিক পদ্ধতিও উদ্ভাবন করেছে। অধিক মাংস উৎপাদন করার জন্য বাংলাদেশে লভ্য গরুর জাতগুলো হচ্ছে পাবনা, আরসিসি, নর্থ বেঙ্গল গ্রে ও মুন্সিগঞ্জ। এছাড়া সংকরিত উন্নত প্রজাতির গরু ব্যবহার করেও কাঙ্খিত লক্ষ্য অর্জন সম্ভব। আর অধিক মাংস উৎপাদন করার জন্য উন্নত প্রযুক্তিগুলো ব্যবহারের লক্ষ্য হচ্ছে উন্নত পুষ্টি তথা খাদ্য যথাযথভাবে সরবরাহ করে স্বল্প সময়ে ষাড়ের সর্বোচ্চ বৃদ্ধি ঘটানো। বিভিন্ন উপায়ে যা অর্জন সম্ভব। এ পর্যায়ে আমরা ইউ এস এস, ইউ টি এস, হে বা সাইলেজ পদ্ধতি ব্যবহার করে কিভাবে গরু মোটাতাজাকরণের মাধ্যমে অধিক মাংস উৎপাদন করা যায় সে সম্বন্ধে আলোচনা করবো।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>গরু হৃষ্টপুষ্টকরণেইউ এস এস বা ইউ টি এস প্রযুক্তির ব্যবহার:</strong></p>\r\n\r\n<p>বাংলাদেশের সর্বত্র গো-খাদ্য হিসেবে সহজলভ্য একটি খাদ্য হচ্ছে খড়। অধিকাংশ কৃষক গো-খাদ্য সরবরাহের জন্য শুধুমাত্র খড়ের উপর নির্ভরশীল। আর এই খড়ের পুষ্টিমান খুবই নিম্মমানের যার মাধ্যমে গরুর সর্বোচ্চ বা আশানুরুপ দৈহিক বৃদ্ধি অর্জন সম্ভব নয়। তবে আশার কথা হচ্ছে অত্যন্ত সহজ পদ্ধতি অনুসরণের মাধ্যমে খড়ের পুষ্টিমান বৃদ্ধি করা সম্ভব যা গরু মোটাতাজাকরণে অত্যন্ত সহায়ক। বাংলাদেশ প্রাণীসম্পদ গবেষণা ইনস্টিটিউট ১৯৯২ সাল হতে দীর্ঘ গবেষণা ও খামারী পর্যায়ে যাচাই-বাছাইয়ের মাধ্যমে ইউ এস এস প্রযুক্তিটি উদ্ভাবন করেছে। ইউ এস এস হচ্ছে খড়, ইউরিয়া ও চিটাগুর বা মোলাসেস এর একটি আনুপাতিক খাদ্য মিশ্রন।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ইউ এস এস কিভাবে তৈরি করতে হয়:</strong></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li>ইউ এস এস তৈরির প্রথম শর্ত হচ্ছে খাদ্য মিশ্রনে খড়, চিটাগুর বা মোলাসেস ও ইউরিয়া এর অনুপাত সর্বদা ঠিক রাখা।</li>\r\n	<li>ইউ এস এস, খাদ্য মিশ্রনের খাদ্য উপাদানগুলোর অনুপাত হচ্ছে ৮২ঃ১৫ঃ৩। অর্থাৎ, ১০০ কেজি শুকনা খড়ের সাথে ১৪-২১ কেজি মোলাসেস ও ৩ কেজি ইউরিয়া মেশাতে হবে।</li>\r\n	<li>প্রথমে ওজনকৃত মোলাসেস ও ইউরিয়া প্রয়োজনমতো পরিস্কার পানিতে (১০০ কেজি খড়ের জন্য ৪০-৬০লিটার) মেশাতে হবে।</li>\r\n	<li>পানিতে মিশ্রিত মোলাসেস ও ইউরিয়ার দ্রবনটি ঝরনা বা হাত দিয়ে ছিটিয়ে সমস্ত খড়ের সাথে সমভাবে মিশিয়ে নিতে হবে।</li>\r\n	<li>খড়ের সাথে মোলাসেস ও ইউরিয়ার দ্রবন মেশানোর ক্ষেত্রে পরিস্কার মেঝে বা পলিথিন ব্যবহার করতে হবে।</li>\r\n	<li>তৈরিকৃত ইউ এস এস বানানোর পর থেকে তিনদিনের মধ্যে গরুকে সরবরাহ করতে হবে।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সাবধানতা</strong></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li>তৈরিকৃত ইউ এস এস বানানোর তিনদিন পর গরুকে সরবরাহ করা উচিৎ নয়।</li>\r\n	<li>মিশ্রনের অনুপাত সর্বদা সঠিক রাখতে হবে।</li>\r\n	<li>কোন অবস্থাতেই ইউরিয়ার মাত্রা বাড়ানো যাবে না।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সবুজ ঘাস সংরক্ষণ পদ্ধতি:</strong></p>\r\n\r\n<p>বাংলাদেশে বর্ষা মৌসুমে বিভিন্ন প্রজাতির প্রচুর ঘাস পাওয়া যায় কিন্তু শুস্ক মৌসুমে সবুজ ঘাসের মারাত্বক অভাব পরিলক্ষিত হয়। বিধায়, গো-খাদ্যের বছরব্যাপী সমুন্নত সরবরাহ নিশ্চিত করার জন্য সবুজ ঘাস সংরক্ষণ করা একান্ত প্রয়োজন। এ পর্যায়ে আমরা কিভাবে হে বা সাইলেজ পদ্ধতিতে ঘাস সংরক্ষণ করা যায় সে বিষয়ে আলোকপাত করবো।</p>\r\n\r\n<p><strong>হে পদ্ধতিতে ঘাস সংরক্ষণ:</strong></p>\r\n\r\n<p>রোদে শুকানো শুস্ক ঘাসকে &lsquo;হে&rsquo; বলে। সবুজ ঘাসকে রোদে শুকিয়ে সংরক্ষণ করার পদ্ধতিকে &lsquo;হে&rsquo; পদ্ধতি বলে। এই প্রক্রিয়ায় ঘাস রোদে শুকিয়ে ঘাসে বিদ্যমান জলীয় অংশ ১৫-১৮ ভাগের নিচে নামিয়ে আনা হয়।</p>\r\n\r\n<p><strong>হেঃ</strong></p>\r\n\r\n<p>পশু খাদ্য সংরক্ষণের উপায় হিসেবে হে তৈরীকরণ একটি উৎকৃষ্টতম পন্থা। অতি প্রাচীনকাল থেকে পশু খাদ্য হিসেবে &ldquo;হে&rdquo; বিভিন্ন দেশে ব্যবহৃত হয়ে আসছে।</p>\r\n\r\n<p>সাধারণভাবে &lsquo;হে&rsquo; বলতে শুকনা ঘাস বা সীমজাতীয় শুকনা ঘাসকে বুঝায় যার মধ্যে সর্বচ্চো শতকরা ২০ ভাগ কিংবা তার চেয়ে কম পানি থাকে এবং যার মধ্যে শুষ্ক পর্দাথের পরিমাণ (উৎু সধঃঃবৎ) শতকরা ৮৫ থেকে ৯০ ভাগ পর্যন্ত থাকে। উন্নত মানের &lsquo;হে&rsquo; দেখতে সবুজ রং রঙের, পাতাযুক্ত, সহজেই হজমযোগ্য এবং যে কোন ধরনের ছত্রাক আক্রান্ত থেকে মুক্ত থাকবে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>উন্নত মানের &lsquo;হে&rsquo; তৈরীর শর্তাবলীঃ</strong></p>\r\n\r\n<p>(১)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ভাল গুণাগন সম্পন্ন &lsquo;হে&rsquo; অবশ্যই অধিক পাতাযুক্ত হবে।</p>\r\n\r\n<p>(২)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ভাল মানের &lsquo;হে&rsquo; তে অবশ্যই অধিক পাতাযুক্ত থাকবে। &lsquo;হে&rsquo; অধিক পাতাযুক্ত হলে উহার খাদ্যমান অধিক হবে। পাতায় সাধারণতঃ অধিক পরিমানে প্রোটিন, ভিটামিন এবং খনিজ পদার্থ বিদ্যমান থাকে। বিধায়, &lsquo;হে&rsquo; তৈরীর সময় অধিক পাতা ঝড়ে গেলে &lsquo;হে&rsquo; এর গুণগতমান নষ্ঠ হয়ে যায়।</p>\r\n\r\n<p>(৩)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lsquo;হে&rsquo; তৈরীর জন্য ঘাস অবশ্যই ফুল ধরার সময় কাটতে হবে, যাতে অধিক পরিমান পুষ্টি উপাদান &lsquo;হে&rsquo; এর মধ্যে ধরে রাখা সম্ভব হয়। ফল ধরার সময় ঘাস কর্তন করলে &ldquo;হে&rdquo; এর পুষ্টিমান অনেকটা ফলের দানার মধ্যে চলে যায় এবং ফলে উহার পুষ্টিমান কমে যায়।</p>\r\n\r\n<p>(৪)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lsquo;হে&rsquo; এর রং সবুজ থাকবে যাতে &lsquo;হে&rsquo; এর পাতায় অধিক হারে কেরোটিনের পরিমান বিদ্যমান থাকে।</p>\r\n\r\n<p>(৫)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lsquo;হে&rsquo; অবশ্যই নরম ও সহজেই হজমযোগ্য হতে হবে।</p>\r\n\r\n<p>(৬)&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;হে&rdquo; তে অন্য কোন অর্বজনা কিংবা ছত্রাক মুক্ত হতে হবে।</p>\r\n\r\n<p>(৭)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;হে&rdquo; অবশ্যই আগাছা মুক্ত এবং অন্যান্য ময়লা মুক্ত হতে হবে।</p>\r\n\r\n<p>(৮)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lsquo;হে&rsquo; এর নিজস্ব এ্যারোমেটিক এবং সুগন্ধ হতে হবে।</p>\r\n\r\n<p>(৯)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lsquo;হে&rsquo; এমনভাবে তৈরী করতে হবে যাতে তৈরীকৃত &lsquo;হে&rsquo; এর মধ্যে শতকরা ১৫ ভাগ কিংবা তার চেয়ে কম পরিমান পানি থাকবে। সাধারণতঃ ফসলের পুষ্টিমানের উপর &ldquo;হে&rdquo; এর পুষ্টিমান নির্ভর করে। তবে দেখা যায় যে, &lsquo;হে&rsquo; এর মধ্যে সাধারণতঃ শতকরা ২৫ থেকে ৩০ ভাগ আঁশ এবং ৪৫-৬০ ভাগ শুষ্ক থাকে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&ldquo;হে&rdquo; এর প্রকার ভেদঃ</strong></p>\r\n\r\n<p>শীমজাতীয় &lsquo;হে&rsquo;: খেসারী, মাটিকালাই, কাউপি, প্রবৃতি শুকিয়ে যে হে তৈরী করা হয়, তাকে শীমজাতীয় (লেগুম) হে বলে। শীমজাতীয় &lsquo;হে&rsquo; এর মধ্যে অধিক পরিমান আমিষ, ভিটামিন এমন কি ভিটামিন ডি এর পরিমাণ বেশী থাকে। তাছাড়া এ জাতীয় হে এর মধ্যে ক্যালসিয়ামের আধিক্য থাকে এবং ইহা গবাদিপশুর জন্য অত্যন্ত সুস্বাদু। ক্যালসিয়াম, ভিটামিন ডি এবং ভিটামিন এ এর অধিক্য ছাড়াও শীমজাতীয় &lsquo;হে&rsquo; এর মধ্যে ভিটামিন ই এর পরিমাণও বেশী থাকে।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>সংরক্ষণঃ</strong></p>\r\n\r\n<p>&lsquo;হে&rsquo; প্রস্তুত করার পর শুকনা জায়গায় পালা দিয়ে সংরক্ষণ করা যায়। অথবা ঘরের মধ্যেও হে সংরক্ষণ করা যেতে পারে। &lsquo;হে&rsquo; কে পালা দিয়ে সংরক্ষণ করলে, ছায়াযুক্ত স্থানে নির্বাচন পূর্বক পালা দিতে হবে।</p>\r\n\r\n<p><strong>মোটাতাজকরণের খাদ্য ফরমুলা:</strong></p>\r\n\r\n<p>১.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ইউ এস এস যথেচ্ছ পরিমান + দানাদার মিশ্রন (দৈহিক ওজনের শতকরা ০.৮ - ১.০০ ভাগ)</p>\r\n\r\n<p>২.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ইউ টি এস + চিটাগুড় (৩-৪ %) + দানাদার মিশ্রন (দৈহিক ওজনের শতকরা ০.৮ - ১.০০ ভাগ)</p>\r\n\r\n<p>৩.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; সাইলেজ/হে যথেচ্ছ পরিমান + দানাদার মিশ্রন (দৈহিক ওজনের শতকরা ০.৮ - ১.০০ ভাগ)</p>', NULL, '2022-10-13 15:52:48', '2022-10-13 15:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_texts`
--

CREATE TABLE `lecture_texts` (
  `id` bigint UNSIGNED NOT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_07_06_024417_create_layouts_table', 1),
(6, '2021_07_21_163323_create_visitor_infos_table', 1),
(7, '2021_07_21_201306_create_permission_tables', 1),
(8, '2021_11_30_095405_create_course_cats_table', 1),
(9, '2021_12_30_095405_create_courses_table', 1),
(10, '2021_12_30_201541_create_chapters_table', 1),
(11, '2021_12_30_202607_create_lectures_table', 1),
(12, '2022_01_04_090659_create_course_reviews_table', 1),
(13, '2022_01_17_212107_create_sliders_table', 1),
(14, '2022_02_16_104243_create_course_enrolls_table', 1),
(15, '2022_02_19_214256_create_completed_courses_table', 1),
(16, '2022_03_01_202732_create_quizzes_table', 1),
(17, '2022_03_06_225327_create_quiz_options_table', 1),
(18, '2022_03_07_163401_create_ans_sheets_table', 1),
(19, '2022_06_21_103000_create_lecture_texts_table', 1),
(20, '2022_06_22_134829_create_divisions_table', 1),
(21, '2022_06_22_135742_create_districts_table', 1),
(25, '2022_09_16_221611_create_cer_signatures_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rowshanjamil@gmail.com', 'yQzHRODjgQacW3ft7CEC63nM4G82a9DhFNyJDypD', '2022-08-14 16:20:15'),
('rowshanjamil@gmail.com', 'UzkojgaHG1ZTFJ1Y3RQxCH5ba1zHP2jdTRzdrf4w', '2022-08-15 03:57:10'),
('user@shafi95.com', 'AXoruLHyGSuGcaQvZ9Nm6Em1JeKriR1UnObVnDoh', '2022-08-31 05:50:52'),
('rowshanjamil@gmail.com', 'WuHXsyv32YmNvYDWIf6lBSkHaojGfCBzTsED6uUb', '2022-08-31 05:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module`, `name`, `guard_name`, `removable`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'access-dashboard', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(2, 'dashboard', 'dashboard-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(3, 'user', 'user-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(4, 'user', 'user-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(5, 'user', 'user-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(6, 'user', 'user-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(7, 'user', 'user-impersonate', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(8, 'user', 'user-access-dashboard', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(9, 'activity', 'activity-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(10, 'activity', 'activity-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(11, 'activity', 'activity-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(12, 'activity', 'activity-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(13, 'permission', 'permission-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(14, 'permission', 'permission-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(15, 'permission', 'permission-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(16, 'permission', 'permission-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(17, 'permission', 'permission-change', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(18, 'role', 'role-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(19, 'role', 'role-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(20, 'role', 'role-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(21, 'role', 'role-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(22, 'role', 'role-change', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(23, 'backup', 'backup-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(24, 'backup', 'backup-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(25, 'visitor', 'visitor-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(26, 'visitor', 'visitor-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(27, 'setting', 'setting-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(28, 'setting', 'language-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(29, 'slider', 'slider-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(30, 'slider', 'slider-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(31, 'slider', 'slider-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(32, 'slider', 'slider-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(33, 'course-cat', 'course-cat-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(34, 'course-cat', 'course-cat-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(35, 'course-cat', 'course-cat-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(36, 'course-cat', 'course-cat-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(37, 'course', 'course-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(38, 'course', 'course-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(39, 'course', 'course-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(40, 'course', 'course-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(41, 'lecture', 'lecture-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(42, 'lecture', 'lecture-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(43, 'lecture', 'lecture-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(44, 'lecture', 'lecture-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(45, 'chapter', 'chapter-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(46, 'chapter', 'chapter-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(47, 'chapter', 'chapter-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(48, 'chapter', 'chapter-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(49, 'quiz', 'quiz-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(50, 'quiz', 'quiz-add', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(51, 'quiz', 'quiz-edit', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(52, 'quiz', 'quiz-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(53, 'student-history', 'student-history-manage', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(54, 'student-history', 'student-history-show', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(55, 'student-history', 'student-history-delete', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'teacher',
  `course_id` bigint UNSIGNED NOT NULL,
  `ques` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `user_id`, `course_id`, `ques`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'জাত কাকে বলে?', '2022-10-13 15:38:52', '2022-10-13 15:38:52'),
(2, 1, 1, 'দেশী জাতের গরুর গুনাগুণ কি কি?', '2022-10-14 08:32:46', '2022-10-14 08:32:46'),
(3, 1, 1, 'বাংলাদেশে বিদ্যমান দেশী জাতের গরু কি কি?', '2022-10-14 08:34:50', '2022-10-14 08:34:50'),
(4, 1, 1, 'একটি আদর্শ মাংস উৎপাদনকারী গবাদি পশুর কিছু সাধারণ বৈশিষ্ট্য কি কি?', '2022-10-14 08:37:02', '2022-10-14 08:37:02'),
(5, 1, 1, 'বাসস্থানের প্রয়োজনীয়তা কি?', '2022-10-14 08:39:27', '2022-10-14 08:39:27'),
(8, 1, 1, 'বাসস্থান নির্মানের বিবেচ্য বিষয় সমূহ কি কি?', '2022-10-14 08:41:44', '2022-10-14 08:41:44'),
(9, 1, 1, 'দুই সারি বিশিষ্ট বাসস্থান সঠিক পরিমাপ কি?', '2022-10-14 08:42:39', '2022-10-14 08:42:39'),
(10, 1, 1, 'বিভিন্ন বয়স লিংগ ও উৎপাদন অবস্থায় খোলা ঘরের মেঝের জায়গার সঠিক পরিমাপ (বর্গফুট)?', '2022-10-14 08:43:43', '2022-10-14 08:43:43'),
(11, 1, 1, 'গরুর খামার পরিকল্পনায় ১ টি গরু /প্রতিটি গরুর দাম কত ধরা হয়?', '2022-10-14 08:45:11', '2022-10-14 08:45:11'),
(12, 1, 1, 'গরুর খামার পরিকল্পনায় ১ টি গরুর জন্য প্রতিদিন কত কেজি হিসবেে আশ জাতীয় খাদ্য ব্যবহার করা হয়?', '2022-10-14 08:46:30', '2022-10-14 08:46:30'),
(13, 1, 1, 'গরুর খামার পরিকল্পনায় বার্ষিক  জনশক্তিতে কত টাকা খরচ করা হয়?', '2022-10-14 08:47:30', '2022-10-14 08:47:30'),
(14, 1, 1, 'গরুর খামার পরিকল্পনায় নীট মুনাফা কত টাকা হতে পারে?', '2022-10-14 08:48:42', '2022-10-14 08:48:42'),
(15, 1, 1, 'গরুর খামরে পুষ্টি উপাদান সমূহের প্রয়োজনীয়তা কি কি?', '2022-10-14 08:50:11', '2022-10-14 08:50:11'),
(16, 1, 1, 'হৃষ্টপুষ্টকরণে গরুর খাদ্য উপাদানসমূহে বিভিন্ন ধরণের ঘাসসমূহ কি কি?', '2022-10-14 08:51:05', '2022-10-14 08:51:05'),
(17, 1, 1, 'খাদ্য তরৈীকরণ প্রক্রয়িায় প্রাথমকি ববিচ্যে বষিয়সমূহ কি কি?', '2022-10-14 08:51:51', '2022-10-14 08:51:51'),
(18, 1, 1, 'মোটাতাজাকরণরে জন্য সুষম দানাদার খাদ্য মশ্রিণরে উপাদানসমূহ কি কি?', '2022-10-14 08:52:52', '2022-10-14 08:52:52'),
(19, 1, 1, 'গরুর জন্য উপযোগী ঘাস সমূহ কি কি?', '2022-10-14 08:54:22', '2022-10-14 08:54:22'),
(20, 1, 1, 'কাটিং ব্যবহার করে নেপিয়ার চাষ পদ্ধতি হলো-', '2022-10-14 08:55:18', '2022-10-14 08:55:18'),
(21, 1, 1, 'পারা ঘাস চাষ পদ্ধতি হলো', '2022-10-14 08:56:08', '2022-10-14 08:56:08'),
(22, 1, 1, 'ভূট্টা ঘাস চাষ পদ্ধতি হলো', '2022-10-14 08:57:00', '2022-10-14 08:57:00'),
(24, 1, 1, 'সাইলেজ বলতে কি বুঝি?', '2022-10-14 10:55:06', '2022-10-14 10:55:06'),
(26, 1, 1, 'সাইলজে তরৈীর প্রক্রয়িা হলো', '2022-10-14 10:58:35', '2022-10-14 10:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL COMMENT 'teacher',
  `option` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`id`, `quiz_id`, `option`, `correct`, `created_at`, `updated_at`) VALUES
(2, 1, 'একটি বিশেষ গোষ্ঠি, যার সদস্যরা একই চারিত্রিক বৈশিষ্টের অধিকারী এবং ঐ চারিত্রিক বৈশিষ্ট গুলো বংশ পরম্পরায় ধারাবাহিক ভাবে সন্তান সন্ততিতে সমভাবে বিদ্যমান।', 0, '2022-10-14 08:31:33', '2022-10-14 08:31:33'),
(3, 1, 'একটি বিশেষ গোষ্ঠি, যার সদস্যরা ভিন্ন ভিন্ন চারিত্রিক বৈশিষ্টের অধিকারী এবং ঐ চারিত্রিক বৈশিষ্ট গুলো বংশ পরম্পরায় ধারাবাহিক ভাবে সন্তান সন্ততিতে সমভাবে বিদ্যমান।', 0, '2022-10-14 08:31:48', '2022-10-14 08:31:48'),
(4, 1, 'একটি বিশেষ গোষ্ঠি, যার সদস্যরা ভিন্ন ভিন্ন চারিত্রিক বৈশিষ্টের অধিকারী এবং ঐ চারিত্রিক বৈশিষ্ট গুলো বংশ পরম্পরায় ধারাবাহিক ভাবে সন্তান সন্ততিতে সমভাবে বিদ্যমান নয়।', 0, '2022-10-14 08:32:04', '2022-10-14 08:32:04'),
(5, 1, 'একটি বিশেষ গোষ্ঠি, যার সদস্যরা একই চারিত্রিক বৈশিষ্টের অধিকারী এবং ঐ চারিত্রিক বৈশিষ্ট গুলো বংশ পরম্পরায় ধারাবাহিক ভাবে সন্তান সন্ততিতে সমভাবে বিদ্যমান নয়।', 0, '2022-10-14 08:32:27', '2022-10-14 08:32:27'),
(6, 2, 'রোগবালাই বেশী হয়ে থাকে', 0, '2022-10-14 08:33:26', '2022-10-14 08:33:26'),
(7, 2, 'দেশের প্রচলিত অবহাওয়ায় মানানসই নয়', 0, '2022-10-14 08:33:37', '2022-10-14 08:33:37'),
(8, 2, 'অনিয়মিত পুষ্টি ব্যবস্থাপনায়ও টিকে থাকতে পারে না', 0, '2022-10-14 08:33:48', '2022-10-14 08:33:48'),
(9, 2, 'নিয়মিত বাচ্চা দিয়ে থাকে ও কম খরচে পালন করা যায়', 0, '2022-10-14 08:33:57', '2022-10-14 08:33:57'),
(10, 3, 'পাবনা গরু/বিএলআরআই ক্যাটেল ব্রিড-১', 0, '2022-10-14 08:35:08', '2022-10-14 08:35:08'),
(11, 3, 'মুন্সীগঞ্জ গরু', 0, '2022-10-14 08:35:18', '2022-10-14 08:35:18'),
(12, 3, 'নর্থ-বেঙ্গল গ্রে', 0, '2022-10-14 08:35:28', '2022-10-14 08:35:28'),
(13, 3, 'শাহীওয়াল × দেশী', 0, '2022-10-14 08:35:37', '2022-10-14 08:35:37'),
(14, 4, 'রাম্প হবে পূর্ণ, মাংসল ও গোলাকৃতি।', 0, '2022-10-14 08:37:11', '2022-10-14 08:37:11'),
(15, 4, 'বুক হবে প্রশস্থ।', 0, '2022-10-14 08:37:20', '2022-10-14 08:37:20'),
(16, 4, 'পাজরগুলো প্রশস্থ ও দৃঢ়।', 0, '2022-10-14 08:37:28', '2022-10-14 08:37:28'),
(17, 4, 'পা খাট, মজবুত ও আয়তাকারে স্থাপিত।', 0, '2022-10-14 08:37:36', '2022-10-14 08:37:36'),
(18, 5, 'রোদ, বৃষ্টি, ঝড়, শীত ও নানা প্রাকৃতিক প্রতিক’ল অবস্থা থেকে গরুকে রক্ষার জন্য।', 0, '2022-10-14 08:39:44', '2022-10-14 08:39:44'),
(19, 5, 'পোকামাকড় ও ক্ষতিকর বন্যপ্রাণীর আক্রমন থেকে প্রাণীকে বাঁচানোর জন্য।', 0, '2022-10-14 08:39:52', '2022-10-14 08:39:52'),
(21, 5, 'সু-শৃংখলভাবে খাদ্য ব্যবস্থাপনা, শ্রম ব্যবস্থাপনা, পরিস্কার-পরিচ্ছন্নতা ও স্বাস্থ্য ব্যবস্থাপনা অনিশ্চিত করার জন্য।', 0, '2022-10-14 08:41:22', '2022-10-14 08:41:22'),
(22, 5, 'গোবর ও খাদ্য পরিশিষ্ট সংগ্রহ ও ব্যবহার সঠিকভাবে না করার জন্য।', 0, '2022-10-14 08:41:31', '2022-10-14 08:41:31'),
(23, 8, 'প্রধান রাস্তা থেকে দূরে কিন্তু যোগাযোগে সুবিধা, যাতে করে খামার উৎপাদিত পণ্য সহজেই বাজার জাত করা যায়', 0, '2022-10-14 08:41:57', '2022-10-14 08:41:57'),
(24, 8, 'কোলাহল এবং জনবসতি হতে দূরে', 0, '2022-10-14 08:42:05', '2022-10-14 08:42:05'),
(25, 8, 'ভাল পানি নিষ্কাষন ব্যবস্থা থাকতে হবে', 0, '2022-10-14 08:42:15', '2022-10-14 08:42:15'),
(26, 8, 'খামারের চারপাশে গাছপালা থাকা দরকার যাতে করে, ঝড়ের সময় বাতাস প্রতিরোধ করতে পারে', 0, '2022-10-14 08:42:23', '2022-10-14 08:42:23'),
(27, 9, 'খাদ্য সরবরাহ পথ - ৪.৫ ফুট', 0, '2022-10-14 08:42:52', '2022-10-14 08:42:52'),
(28, 9, 'চাড়ি                - ২.৫ ফুট', 0, '2022-10-14 08:43:00', '2022-10-14 08:43:00'),
(29, 9, 'পশু দাঁড়াইবার স্থান – ৫.৫ ফুট নর্দমা  - ১ ফুট', 0, '2022-10-14 08:43:09', '2022-10-14 08:43:09'),
(30, 9, 'পশু চলাচলের পথ - ৮ ফুট', 0, '2022-10-14 08:43:21', '2022-10-14 08:43:21'),
(31, 10, 'গরু   ৮০-১০০ (বর্গ ফুট)', 0, '2022-10-14 08:43:52', '2022-10-14 08:43:52'),
(32, 10, 'বাছুর  ৫০-৬০  (বর্গ ফুট)', 0, '2022-10-14 08:44:02', '2022-10-14 08:44:02'),
(33, 10, 'গর্ভবতী গাভী  ১৮০-২০০  (বর্গ ফুট)', 0, '2022-10-14 08:44:11', '2022-10-14 08:44:11'),
(34, 10, 'ষাড়	২০০-২৫০   (বর্গ ফুট)', 0, '2022-10-14 08:44:21', '2022-10-14 08:44:21'),
(35, 11, '৪০,০০০.০০ হিসবেে', 0, '2022-10-14 08:45:20', '2022-10-14 08:45:20'),
(36, 11, '৩০,০০০.০০ হিসবেে', 0, '2022-10-14 08:45:49', '2022-10-14 08:45:49'),
(37, 11, '২০,০০০.০০ হিসবেে', 0, '2022-10-14 08:46:08', '2022-10-14 08:46:08'),
(38, 11, '১০,০০০.০০ হিসবেে', 0, '2022-10-14 08:46:19', '2022-10-14 08:46:19'),
(39, 12, '১টি গরুর জন্য প্রতিদিন ৫ কেজি হিসবেে', 0, '2022-10-14 08:46:40', '2022-10-14 08:46:40'),
(40, 12, '১টি গরুর জন্য প্রতিদিন ৪ কেজি হিসবেে', 0, '2022-10-14 08:46:59', '2022-10-14 08:46:59'),
(41, 12, '১টি গরুর জন্য প্রতিদিন ৩ কেজি হিসবেে', 0, '2022-10-14 08:47:09', '2022-10-14 08:47:09'),
(42, 12, '১টি গরুর জন্য প্রতিদিন ২ কেজি হিসবেে', 0, '2022-10-14 08:47:18', '2022-10-14 08:47:18'),
(43, 13, 'প্রায়  ১১,২৮,০০০.০০ টাকা', 0, '2022-10-14 08:47:40', '2022-10-14 08:47:40'),
(44, 13, 'প্রায়  ১১,২০০০০.০০ টাকা', 0, '2022-10-14 08:47:49', '2022-10-14 08:47:49'),
(45, 13, 'প্রায়  ১১,০০,০০০.০০ টাকা', 0, '2022-10-14 08:47:58', '2022-10-14 08:47:58'),
(46, 13, 'প্রায়  ১১,১০,০০০.০০ টাকা', 0, '2022-10-14 08:48:08', '2022-10-14 08:48:08'),
(47, 14, 'প্রায়  ৯২,৮৩,১৬২.০০', 0, '2022-10-14 08:48:51', '2022-10-14 08:48:51'),
(48, 14, 'প্রায়  ৯২,৮৩,০০০.০০', 0, '2022-10-14 08:49:00', '2022-10-14 08:49:00'),
(49, 14, 'প্রায় ৯২,০০,১৬২.০০', 0, '2022-10-14 08:49:09', '2022-10-14 08:49:09'),
(50, 14, 'প্রায় ৯২,০০,০০০.০০', 0, '2022-10-14 08:49:17', '2022-10-14 08:49:17'),
(51, 15, 'পশুর দেহ গঠন ও দেহ রক্ষার জন্য', 0, '2022-10-14 08:50:19', '2022-10-14 08:50:19'),
(52, 15, 'দৈহিক ওজন বৃদ্ধির জন্য', 0, '2022-10-14 08:50:28', '2022-10-14 08:50:28'),
(53, 15, 'দেহের তাপমাএা নিয়ন্ত্রন জন্য নয়', 0, '2022-10-14 08:50:36', '2022-10-14 08:50:36'),
(54, 15, 'দেহের শরীরবৃত্তীয় সকল কার্যাবলীর জন্য নয়', 0, '2022-10-14 08:50:45', '2022-10-14 08:50:45'),
(55, 16, 'বহুবর্ষজীবি ঘাস-নেপিয়ার, পারা, এন্ড্রোপোগন, পাচপালুম, স্পে­ন্ডিডা, রোজী, গিনি, সেতারিয়া, সিগনাল, বাকশা ইত্যাদি।', 0, '2022-10-14 08:51:14', '2022-10-14 08:51:14'),
(56, 16, 'একবর্ষজীবি ঘাস-ভূট্টার কচি গাছ, ভূট্টার সাইলেজ, ধইঞ্চা , সাইলেজ ও মটর ইত্যাদি।', 0, '2022-10-14 08:51:24', '2022-10-14 08:51:24'),
(57, 16, 'ডালজাতীয় ঘাসসমূহ- মাসকালাই,খেসারী, কাউপি, ইপিল ইপিল, অরহর, যোয়ার ঘাস, ওট ঘাস ইত্যাদি।', 0, '2022-10-14 08:51:32', '2022-10-14 08:51:32'),
(58, 17, 'কি প্রকার প্রানীর জন্য খাদ্য তরৈী করতে হবে', 0, '2022-10-14 08:52:05', '2022-10-14 08:52:05'),
(59, 17, 'প্রানীর স্বাস্থ্যগত অবস্থা, উৎপাদনরে র্পযায়, দহৈকি ওজন', 0, '2022-10-14 08:52:14', '2022-10-14 08:52:14'),
(60, 17, 'নর্দ্দিষ্টি প্রকার প্রানীর জন্য কতটুকু শুস্কপর্দাথ, শক্তি বা আমষি প্রয়োজন', 0, '2022-10-14 08:52:22', '2022-10-14 08:52:22'),
(61, 17, 'সারাবছরে প্রাপ্ত খাদ্যসমূহ এবং তাদরে পুষ্টউিপাদানরে মাত্রা', 0, '2022-10-14 08:52:33', '2022-10-14 08:52:33'),
(62, 18, 'গম ভূঁষি, চালের কুঁড়া, গম ভাঙ্গা, খেসারীর র্ভুঁষি', 0, '2022-10-14 08:53:06', '2022-10-14 08:53:06'),
(63, 18, 'তিলের / সরিষার / নারিকেলের খৈল, সয়াবিন মিল', 0, '2022-10-14 08:53:14', '2022-10-14 08:53:14'),
(64, 18, 'ডিসিপি', 0, '2022-10-14 08:53:23', '2022-10-14 08:53:23'),
(65, 18, 'ভিটামিন-মিনারেল প্রিমিক্স', 0, '2022-10-14 08:53:32', '2022-10-14 08:53:32'),
(66, 19, 'উচ্চ ফলনশীল বহুবর্ষজীবি ঘাস- পারা, গিনি, সিগনাল, জাম্বু, জার্মান, এন্ড্রোপোগন, স্পে-নডিডা, রোজী', 0, '2022-10-14 08:54:31', '2022-10-14 08:54:31'),
(67, 19, 'উচ্চ ফলনশীল বর্ষজীবি ঘাস- ওটস, ভূট্টা, ট্রিটিক্যালি', 0, '2022-10-14 08:54:40', '2022-10-14 08:54:40'),
(68, 19, 'মৌসুমী ডাল/লিগুম জাতীয় ঘাস- মাসকালাই, খেসারী, অরহর, ধৈঞ্চা, কাউপি', 0, '2022-10-14 08:54:51', '2022-10-14 08:54:51'),
(69, 20, 'নেপিয়ার গাছের পরিপক্ক কান্ডের তিনটি গিরা রেখে একটি কাটিং করতে হবে।', 0, '2022-10-14 08:55:27', '2022-10-14 08:55:27'),
(70, 20, 'ধারালো ছুরি/দা দিয়ে কান্ড কেটে কেটে কাটিং তেরী করতে হবে।', 0, '2022-10-14 08:55:37', '2022-10-14 08:55:37'),
(71, 20, 'জমি তৈরীর পর সোজা লাইন করে ৬০ সে মি পর পর কাটিং লাগাতে হবে।', 0, '2022-10-14 08:55:47', '2022-10-14 08:55:47'),
(72, 20, 'কাটিং এর দু‘টো গিরা মাটির নীচে এবং একটি গিরা মাটির উপরে থাকবে, এবং মাটির সাথে ৩০০ হেলানো অবস্থায় (অর্থাৎ মাটি হতে সর্বোচ্চ দু‘আঙ্গুল হেলানো) কাটিং মাটিতে বসাতে হবে।', 0, '2022-10-14 08:55:57', '2022-10-14 08:55:57'),
(73, 21, 'বহুবর্ষী ঘাস, একবার লাগালে ৭-৮ বছর পর্যন্ত ঘাস উৎপন্ন হয়।', 0, '2022-10-14 08:56:16', '2022-10-14 08:56:16'),
(74, 21, 'এ ঘাসকে জলজ ঘাস বলা যায়।', 0, '2022-10-14 08:56:26', '2022-10-14 08:56:26'),
(75, 21, 'বছরের যে কোন সময় চাষ করা যায়, তবে উত্তম সময় হচ্ছে ফাল্গুন থেকে আষাঢ় মাস।', 0, '2022-10-14 08:56:34', '2022-10-14 08:56:34'),
(76, 21, 'সীমিত লবনাক্ত এলাকা বা পাহাড়ী ঢালেও ঘাসটি জন্মে।', 0, '2022-10-14 08:56:44', '2022-10-14 08:56:44'),
(77, 22, 'ভূট্টা সাধারনত উচু, জলাবদ্ধতামুক্ত, বেলে-দোআশ মাটিতে ভালো হয়। বীজ বপনের পূর্বে জমিকে ৩-৪ বার চাষ দিয়ে ঝুরঝুর করতে হবে।', 0, '2022-10-14 08:57:33', '2022-10-14 08:57:33'),
(78, 22, 'বীজের পরিমাণ :  ৩-৩.৫ কেজি', 0, '2022-10-14 08:58:03', '2022-10-14 08:58:03'),
(79, 22, 'বপন পদ্ধতি     : ছিটিয়ে বা সরিতে লাগানো যায়, সারি- সারির দুরত্ব ৬০-৭০ সেমি; চারা-চারার দুরত্ব ২০-২৫ সেমি', 0, '2022-10-14 08:58:12', '2022-10-14 08:58:12'),
(80, 22, 'সার প্রয়োগ      : গোবর/জৈব সার ২-৩ মে:টন /বিঘা।', 0, '2022-10-14 08:58:23', '2022-10-14 08:58:23'),
(81, 24, 'উচ্চ আর্দ্রতাযুক্ত সবুজ ঘাসকে বায়ূহীন পরিবেশে সংরক্ষণ করা', 0, '2022-10-14 10:55:33', '2022-10-14 10:55:33'),
(82, 24, 'আর্দ্রতা হবে (৭০-৮০%)', 0, '2022-10-14 10:55:42', '2022-10-14 10:55:42'),
(83, 24, 'এতে উদ্ভিদ কোষ অক্সিজেন (ঙ২) বিহীন অবস্থায় ফারমেন্টটেট হয়', 0, '2022-10-14 10:56:22', '2022-10-14 10:56:22'),
(84, 24, 'ল্যাকটিক এসিড সবুজ ঘাস সংরক্ষণে সহায়তা করে থাকে', 0, '2022-10-14 10:56:30', '2022-10-14 10:56:30'),
(85, 26, 'একশত ঘনফুট (১০০)  একটি মাটির গর্তে ২.৫০-৩.০০ টন সবুজ ঘাস সংরক্ষণ করা যায়', 0, '2022-10-14 10:58:53', '2022-10-14 10:58:53'),
(86, 26, 'গর্তের গভীরতা ৩ ফুট, প্রস্থের তলায় ৩ ফুট, মাঝে ৮ ফুট ও উপরে ১০ ফুট হতে হবে।', 0, '2022-10-14 10:59:04', '2022-10-14 10:59:04'),
(87, 26, 'মাটির গর্তে ঘাস সাজানোর সময়  সাইলোর চারিদিকে পলিথিন মুড়ে দতিে হবে', 0, '2022-10-14 10:59:14', '2022-10-14 10:59:14'),
(88, 26, 'এর পর ঘাস স্তরে স্তরে সাজিয়ে দতিে হবে', 0, '2022-10-14 10:59:37', '2022-10-14 10:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `removable`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17'),
(2, 'teacher', 'web', 0, '2022-08-01 13:18:17', '2022-08-01 13:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `text`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট', 'অনলাইন লার্নিং প্লাটফর্ম', NULL, 'slider1037.jpg', 1, '2022-06-22 12:39:56', '2022-08-01 11:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=No login,1=Admin,2=User',
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_o_b` date DEFAULT NULL,
  `profession` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `name_b` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `permission`, `phone`, `d_o_b`, `profession`, `gender`, `name_b`, `name_cer`, `fa_name`, `mo_name`, `nid`, `text`, `address`, `blood`, `district_id`, `email_verified_at`, `password`, `remember_token`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shafiul Hasan', 'admin@shafi95.com', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$QKhnqLsLAU2YZhDZKAckNOyCJSeTrTa6etJ.0zYfet.vAkS4tY2r2', NULL, NULL, '2022-06-22 12:39:56', '2022-06-22 12:39:56', NULL),
(2, 'Developer', 'user@shafi95.com', '2', NULL, '2022-09-13', NULL, 1, 'Test', 'Test', 'Test', 'Test', '1026642957', 'adsf', NULL, NULL, NULL, NULL, '$2y$10$Z9qcAYEn16VIxUhxyl.qJuG6krYXdi2oXGfG6oHSPHOrIQJoKcXSO', NULL, NULL, '2022-06-22 12:39:56', '2022-09-25 17:26:41', NULL),
(3, 'R Jamil', 'rowshanjamil@gmail.com', '2', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', NULL, '$2y$10$cUfe8v2VWg.DrAsh22VMbeUX8GNQqMBTIve2gPPP6sAU7RCLHAZgO', 'DF4v3lP1YTILxh9x61JsTAN3vUOdrr', NULL, '2022-08-04 05:22:27', '2022-08-04 05:22:27', NULL),
(4, 'Shafi', 'shafi@gmail.com', '2', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8', NULL, '$2y$10$LVm2tgJHYTpIsqdoMbPj7OYFEoNuWRoILhzYuRqu0MwB96cHxqAzu', 'MTRR1DEGj8EIPntZFW0RXyJ6Uy3c6w', NULL, '2023-02-08 05:55:48', '2023-02-08 05:55:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_infos`
--

CREATE TABLE `visitor_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_infos`
--

INSERT INTO `visitor_infos` (`id`, `ip`, `iso_code`, `country`, `city`, `state_name`, `postal_code`, `lat`, `lon`, `currency`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.0', 'US', 'United States', 'New Haven', 'Connecticut', '06510', '41.31', '-72.92', 'USD', '2022-10-13 15:17:10', '2022-10-13 15:17:10'),
(2, '103.88.140.109', 'BD', 'Bangladesh', 'Dhaka', 'Dhaka Division', '1000', '23.7257', '90.4026', 'BDT', '2022-10-14 22:06:44', '2022-10-14 22:06:44'),
(3, '35.225.190.252', 'US', 'United States', 'Council Bluffs', 'Iowa', '', '41.2619', '-95.8608', 'USD', '2022-10-15 02:08:04', '2022-10-15 02:08:04'),
(4, '35.90.1.145', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 11:27:00', '2022-10-15 11:27:00'),
(5, '34.219.88.228', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 12:12:02', '2022-10-15 12:12:02'),
(6, '35.163.241.144', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 12:12:03', '2022-10-15 12:12:03'),
(7, '34.213.96.199', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 12:16:54', '2022-10-15 12:16:54'),
(8, '35.91.229.15', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 13:25:12', '2022-10-15 13:25:12'),
(9, '34.221.178.191', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 14:32:31', '2022-10-15 14:32:31'),
(10, '66.249.72.248', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2022-10-15 15:00:34', '2022-10-15 15:00:34'),
(11, '34.211.55.255', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 15:41:18', '2022-10-15 15:41:18'),
(12, '66.249.72.250', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2022-10-15 16:08:49', '2022-10-15 16:08:49'),
(13, '54.185.84.209', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 18:02:11', '2022-10-15 18:02:11'),
(14, '35.90.37.20', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 19:14:21', '2022-10-15 19:14:21'),
(15, '35.91.87.55', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 20:20:59', '2022-10-15 20:20:59'),
(16, '54.202.92.65', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 21:20:37', '2022-10-15 21:20:37'),
(17, '81.214.131.2', 'TR', 'Turkey', 'Istanbul', 'Istanbul', '34096', '41.0145', '28.9533', 'TRY', '2022-10-15 22:03:19', '2022-10-15 22:03:19'),
(18, '54.149.104.216', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 22:44:00', '2022-10-15 22:44:00'),
(19, '54.202.207.131', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-15 23:59:02', '2022-10-15 23:59:02'),
(20, '18.236.186.180', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 01:08:13', '2022-10-16 01:08:13'),
(21, '52.43.199.213', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 01:53:45', '2022-10-16 01:53:45'),
(22, '35.188.219.168', 'US', 'United States', 'Council Bluffs', 'Iowa', '', '41.2619', '-95.8608', 'USD', '2022-10-16 02:11:00', '2022-10-16 02:11:00'),
(23, '52.38.197.83', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 03:20:21', '2022-10-16 03:20:21'),
(24, '163.116.136.254', 'US', 'United States', 'Ashburn', 'Virginia', '20149', '39.0469', '-77.4903', 'USD', '2022-10-16 03:29:18', '2022-10-16 03:29:18'),
(25, '54.184.160.82', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 04:23:13', '2022-10-16 04:23:13'),
(26, '130.255.166.97', 'SE', 'Sweden', 'Stockholm', 'Stockholm County', '100 05', '59.3293', '18.0686', 'SEK', '2022-10-16 05:07:03', '2022-10-16 05:07:03'),
(27, '130.255.166.115', 'SE', 'Sweden', 'Stockholm', 'Stockholm County', '100 05', '59.3293', '18.0686', 'SEK', '2022-10-16 05:07:04', '2022-10-16 05:07:04'),
(28, '130.255.166.79', 'SE', 'Sweden', 'Stockholm', 'Stockholm County', '100 05', '59.3293', '18.0686', 'SEK', '2022-10-16 05:07:04', '2022-10-16 05:07:04'),
(29, '52.27.225.117', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 06:41:30', '2022-10-16 06:41:30'),
(30, '104.254.92.198', 'CA', 'Canada', 'Toronto', 'Ontario', 'M5A', '43.6447', '-79.3841', 'CAD', '2022-10-16 06:47:40', '2022-10-16 06:47:40'),
(31, '34.221.33.65', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 08:04:13', '2022-10-16 08:04:13'),
(32, '35.166.65.194', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 09:21:46', '2022-10-16 09:21:46'),
(33, '52.12.9.223', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 10:27:26', '2022-10-16 10:27:26'),
(34, '34.222.35.36', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 10:56:35', '2022-10-16 10:56:35'),
(35, '35.91.220.177', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 12:20:20', '2022-10-16 12:20:20'),
(36, '54.203.203.38', 'US', 'United States', 'Portland', 'Oregon', '97207', '45.5235', '-122.676', 'USD', '2022-10-16 14:24:45', '2022-10-16 14:24:45'),
(37, '66.249.77.75', 'US', 'United States', 'Mountain View', 'California', '94043', '37.422', '-122.084', 'USD', '2022-10-16 21:10:56', '2022-10-16 21:10:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans_sheets`
--
ALTER TABLE `ans_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ans_sheets_user_id_foreign` (`user_id`),
  ADD KEY `ans_sheets_course_id_foreign` (`course_id`);

--
-- Indexes for table `cer_signatures`
--
ALTER TABLE `cer_signatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_course_id_foreign` (`course_id`);

--
-- Indexes for table `completed_courses`
--
ALTER TABLE `completed_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `completed_courses_user_id_foreign` (`user_id`),
  ADD KEY `completed_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_foreign` (`user_id`),
  ADD KEY `courses_course_cat_id_foreign` (`course_cat_id`);

--
-- Indexes for table `course_cats`
--
ALTER TABLE `course_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_enrolls`
--
ALTER TABLE `course_enrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_enrolls_user_id_foreign` (`user_id`),
  ADD KEY `course_enrolls_course_id_foreign` (`course_id`),
  ADD KEY `course_enrolls_lecture_id_foreign` (`lecture_id`);

--
-- Indexes for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_reviews_course_id_foreign` (`course_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layouts_user_id_foreign` (`user_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lectures_user_id_foreign` (`user_id`),
  ADD KEY `lectures_course_id_foreign` (`course_id`),
  ADD KEY `lectures_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `lecture_texts`
--
ALTER TABLE `lecture_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecture_texts_lecture_id_foreign` (`lecture_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_user_id_foreign` (`user_id`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`);

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_options_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans_sheets`
--
ALTER TABLE `ans_sheets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cer_signatures`
--
ALTER TABLE `cer_signatures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `completed_courses`
--
ALTER TABLE `completed_courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_cats`
--
ALTER TABLE `course_cats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_enrolls`
--
ALTER TABLE `course_enrolls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lecture_texts`
--
ALTER TABLE `lecture_texts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ans_sheets`
--
ALTER TABLE `ans_sheets`
  ADD CONSTRAINT `ans_sheets_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ans_sheets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `completed_courses`
--
ALTER TABLE `completed_courses`
  ADD CONSTRAINT `completed_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `completed_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_course_cat_id_foreign` FOREIGN KEY (`course_cat_id`) REFERENCES `course_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_enrolls`
--
ALTER TABLE `course_enrolls`
  ADD CONSTRAINT `course_enrolls_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_enrolls_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_enrolls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD CONSTRAINT `course_reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layouts`
--
ALTER TABLE `layouts`
  ADD CONSTRAINT `layouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lectures_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lectures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecture_texts`
--
ALTER TABLE `lecture_texts`
  ADD CONSTRAINT `lecture_texts_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD CONSTRAINT `quiz_options_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
