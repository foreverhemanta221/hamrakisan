-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 07:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamrakisan`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nep_landmark` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_city` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `landmark`, `nep_landmark`, `street`, `city`, `nep_city`, `provience`, `district`, `created_at`, `updated_at`) VALUES
(1, 'Blanditiis voluptate', NULL, NULL, 'tokha', 'हेमन्त फार्म', '3', '35', '2019-03-31 11:42:07', '2019-06-01 02:37:20'),
(2, 'Corrupti irure ulla', NULL, NULL, 'Aliquid nihil volupt', NULL, '3', '35', '2019-04-02 00:18:54', '2019-04-02 00:18:54'),
(3, NULL, NULL, NULL, 'nuxu@mailinator.com', NULL, '4', '23', '2019-04-06 03:33:50', '2019-04-06 03:33:50'),
(4, NULL, NULL, NULL, 'munysax@mailinator.net', NULL, '5', '15', '2019-04-06 03:36:09', '2019-04-06 03:36:09'),
(5, NULL, NULL, NULL, 'wexisukeqo@mailinator.net', NULL, '5', '62', '2019-04-07 23:10:05', '2019-04-07 23:10:05'),
(6, NULL, NULL, NULL, 'nanu@mailinator.net', NULL, '7', '32', '2019-04-07 23:33:38', '2019-04-07 23:33:38'),
(7, NULL, NULL, NULL, 'nanu@mailinator.net', NULL, '7', '32', '2019-04-07 23:34:11', '2019-04-07 23:34:11'),
(8, 'Officia sequi nihil', NULL, NULL, 'Id voluptatum volup', 'हेमन्त फार्म', '7', '1', '2019-04-08 02:32:59', '2019-04-08 02:32:59'),
(9, NULL, NULL, NULL, 'piwu@mailinator.com', NULL, '4', '34', '2019-04-09 05:57:36', '2019-04-09 05:57:36'),
(10, NULL, NULL, NULL, 'sicajinem@mailinator.net', NULL, '5', '62', '2019-04-10 00:39:19', '2019-04-10 00:39:19'),
(11, 'Non officia tenetur', NULL, NULL, 'Cupidatat eos dolor', NULL, '3', '62', '2019-04-10 02:10:26', '2019-04-10 02:10:26'),
(12, 'Ea proident autem a', NULL, NULL, 'Provident qui cupid', NULL, '6', '35', '2019-04-10 02:12:42', '2019-04-10 02:12:42'),
(13, 'Ea proident autem a', NULL, NULL, 'Provident qui cupid', NULL, '3', '36', '2019-04-10 02:15:50', '2019-04-10 02:15:50'),
(14, 'Hic vitae voluptatib', NULL, NULL, 'Non perferendis eaqu', NULL, '3', '38', '2019-04-10 02:17:19', '2019-04-10 02:17:19'),
(15, 'Explicabo Provident', NULL, NULL, 'Est et cupidatat qui', NULL, '7', '36', '2019-04-10 02:17:45', '2019-04-10 02:17:45'),
(16, 'Explicabo Provident', NULL, NULL, 'Est et cupidatat qui', NULL, '7', '1', '2019-04-10 02:18:06', '2019-04-10 02:18:06'),
(17, 'Non natus voluptates', NULL, NULL, 'Minima sint aut volu', NULL, '6', '6', '2019-04-10 03:49:58', '2019-04-10 03:49:58'),
(18, 'Non natus voluptates', NULL, NULL, 'Minima sint aut volu', NULL, '6', '14', '2019-04-10 03:50:43', '2019-04-10 03:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nep_description` text COLLATE utf8mb4_unicode_ci,
  `button` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nep_button` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `nep_title`, `description`, `nep_description`, `button`, `nep_button`, `url`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'Big Steps For Small Farmer', NULL, NULL, NULL, 'Click Here', NULL, '/about_us', 29, '2019-04-02 01:51:25', '2019-04-02 01:51:25'),
(2, 'This is just testing', NULL, NULL, NULL, 'Click here', NULL, NULL, 30, '2019-04-02 02:04:02', '2019-04-02 02:04:02'),
(3, 'This is another testing', NULL, NULL, NULL, 'Click here', NULL, NULL, 31, '2019-04-02 02:04:24', '2019-04-02 02:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_title` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `nep_description` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `nep_title`, `slug`, `description`, `nep_description`, `icon`, `color`, `image_id`, `priority`, `featured`, `status`, `seo_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Fish Farming', NULL, 'fish_farming', '<p>माछा पालन माछा पालन&nbsp; माछा पालन&nbsp;</p>', NULL, NULL, NULL, 53, NULL, 1, NULL, NULL, NULL, NULL, '2019-03-31 11:22:39', '2019-05-10 10:38:56'),
(2, NULL, 'Vegetable', 'तरकारी  खेती', 'vegetable', 'fv', '<p>तरकारी खेती तरकारी खेती&nbsp;</p>', 'fa fa-', '#20910e', 52, NULL, 1, NULL, NULL, NULL, NULL, '2019-04-03 01:20:31', '2019-04-29 05:55:34'),
(3, NULL, 'Fruit Farming', 'फलफुल खेती', 'fruit_farming', 'fruits', '<p>फलफुल खेती फलफुल खेती&nbsp; फलफुल खेती&nbsp;&nbsp;</p>', 'fa fa-', '#20910e', 54, NULL, 1, NULL, NULL, NULL, NULL, '2019-04-04 05:26:41', '2019-04-29 05:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_people`
--

CREATE TABLE `contact_people` (
  `id` int(10) UNSIGNED NOT NULL,
  `listing_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_post` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_people`
--

INSERT INTO `contact_people` (`id`, `listing_id`, `name`, `nep_name`, `post`, `nep_post`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'पशुपती ज्ञवाली', 'test', 'संचालक', '1234567', 'foreverhemanta221@gmail.com', NULL, NULL, NULL, '2019-05-30 01:48:59', '2019-05-30 02:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `provience_id` int(10) UNSIGNED NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farm_products`
--

CREATE TABLE `farm_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `farm_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measure_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nep_measure_unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `nep_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farm_products`
--

INSERT INTO `farm_products` (`id`, `farm_id`, `name`, `nep_name`, `minimum_quantity`, `measure_unit`, `nep_measure_unit`, `price`, `image_id`, `description`, `nep_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Tomato', 'टमाटर', '10', 'kg', NULL, 30, 55, '<p>This is pure pahari tamatar .&nbsp;</p>', '<p>यो विशुद्द लेकाली टमाटर हो</p>', '2019-04-04 11:35:51', '2019-05-10 13:28:11', NULL),
(2, 1, 'Potato', NULL, '10', 'kg', NULL, 400, 56, '<p style=\"text-align: justify;\">The&nbsp;potato&nbsp;is a starchy, tuberous crop from the perennial nightshade&nbsp;Solanum tuberosum. In many contexts,&nbsp;potato&nbsp;refers to the edible tuber, but it can also refer to the plant itself. Common or slang terms include tater,&nbsp;tattie&nbsp;and spud</p>', NULL, '2019-04-04 11:38:19', '2019-05-10 12:51:39', NULL),
(3, 1, 'Quyn Romero', NULL, '908', 'Id quas in reiciendi', NULL, 100, 93, 'Maxime exercitatione', NULL, '2019-06-02 00:06:02', '2019-06-02 00:06:02', NULL),
(4, 1, 'Golveda', 'गोलभेडा', '100', 'kg', NULL, 5000, 94, 'This is just test', NULL, '2019-06-02 00:08:41', '2019-06-02 05:12:20', '10:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `farm_product_books`
--

CREATE TABLE `farm_product_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farm_product_books`
--

INSERT INTO `farm_product_books` (`id`, `product_id`, `name`, `email`, `phone`, `province`, `district`, `city`, `s_address`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hemanta Rijal', 'foreverhemanta221@gmail.com', '1234567', '5', '62', 'Devdaha', 'shitalnagar', '10', 'this is just test', '2019-05-25 01:54:50', '2019-05-25 01:54:50'),
(2, 2, 'Hemanta Rijal', 'foreverhemanta221@gmail.com', '1234567', '5', '62', 'Devdaha', 'shitalnagar', '10', 'this is just test', '2019-05-25 02:29:36', '2019-05-25 02:29:36'),
(3, 1, 'Hemanta Rijal', 'foreverhemanta221@gmail.com', '1234567', '5', '62', 'Devdaha', 'shitalnagar', '10', 'this is just test', '2019-05-25 02:29:54', '2019-05-25 02:29:54'),
(4, 1, 'Hemanta', 'asoftplus@gmail.com', '1234567', '3', '12', '123', 'test', '10', 'test', '2019-05-31 05:35:39', '2019-05-31 05:35:39'),
(5, 2, 'sabyk@mailinator.net', 'xibej@mailinator.net', 'wiko@mailinator.net', '4', '73', 'fugopepu@mailinator.net', 'nafucizuc@mailinator.com', '774', 'Odio accusamus quis', '2019-05-31 05:46:36', '2019-05-31 05:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `farm_stories`
--

CREATE TABLE `farm_stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_title` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `nep_description` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `image_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farm_stories`
--

INSERT INTO `farm_stories` (`id`, `title`, `nep_title`, `description`, `nep_description`, `video`, `image_id`, `created_at`, `updated_at`) VALUES
(2, 'कतार छाडेर आएका २४ बर्षे युवा, लोकल कुखुरापालनमा जम्दै- पुग्यो करोडमा लगानी | Local Hen Farming', NULL, NULL, NULL, '<iframe width=\"960\" height=\"650\" src=\"https://www.youtube.com/embed/0l8-8aIVUJg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 49, '2019-04-03 13:00:08', '2019-04-03 13:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mimetype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `hash`, `filename`, `path`, `extension`, `mimetype`, `width`, `height`, `size`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'fish-1734910_960_720.jpg', NULL, 'image-78958a1d5d3a8580.jpg', 'backend/uploads/images/image-78958a1d5d3a8580.jpg', 'jpg', 'image/jpeg', '960', '633', NULL, 1, '2019-03-31 11:22:39', '2019-03-31 11:22:39'),
(2, 'orchard-1872997_960_720.jpg', NULL, 'image-3851cf9660c1588d.jpg', 'backend/uploads/images/image-3851cf9660c1588d.jpg', 'jpg', 'image/jpeg', '960', '640', NULL, 1, '2019-03-31 11:42:07', '2019-03-31 11:42:07'),
(3, 'fish-1734910_960_720.jpg', NULL, 'image-17684f5abcd72df0.jpg', 'backend/uploads/images/image-17684f5abcd72df0.jpg', 'jpg', 'image/jpeg', '960', '633', NULL, 1, '2019-03-31 11:42:08', '2019-03-31 11:42:08'),
(4, 'food-3340732_960_720.jpg', NULL, 'image-043fc881d175dca9.jpg', 'backend/uploads/images/image-043fc881d175dca9.jpg', 'jpg', 'image/jpeg', '960', '635', NULL, 1, '2019-03-31 11:42:08', '2019-03-31 11:42:08'),
(5, 'orchard-1872997_960_720.jpg', NULL, 'image-031c7872c3b986b6.jpg', 'backend/uploads/images/image-031c7872c3b986b6.jpg', 'jpg', 'image/jpeg', '960', '640', NULL, 1, '2019-03-31 11:42:08', '2019-03-31 11:42:08'),
(6, 'pipes.jpg', NULL, 'image-955d7427235a6574.jpg', 'backend/uploads/images/image-955d7427235a6574.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-01 08:06:45', '2019-04-01 08:06:45'),
(7, 'pipes.jpg', NULL, 'image-8406cb0c18f42a18.jpg', 'backend/uploads/images/image-8406cb0c18f42a18.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-01 08:08:19', '2019-04-01 08:08:19'),
(8, 'pipes2.jpg', NULL, 'image-41edc8c1b61927f5.jpg', 'backend/uploads/images/image-41edc8c1b61927f5.jpg', 'jpg', 'image/jpeg', '400', '400', NULL, 1, '2019-04-01 10:48:27', '2019-04-01 10:48:27'),
(9, 'hamra-kisan.png', NULL, 'image-78260d70444bd64d.png', 'backend/uploads/images/image-78260d70444bd64d.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 10:51:17', '2019-04-01 10:51:17'),
(10, 'hamra-kisan.png', NULL, 'image-67bb0ab518ee170e.png', 'backend/uploads/images/image-67bb0ab518ee170e.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 10:51:35', '2019-04-01 10:51:35'),
(11, 'hamra-kisan.png', NULL, 'image-450ca8d1eb421c2f.png', 'backend/uploads/images/image-450ca8d1eb421c2f.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 10:53:59', '2019-04-01 10:53:59'),
(12, 'hamra-kisan.png', NULL, 'image-66fd6ab1fbd63ffd.png', 'backend/uploads/images/image-66fd6ab1fbd63ffd.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 10:57:37', '2019-04-01 10:57:37'),
(13, 'hamra-kisan.png', NULL, 'image-3c5ff45d280d1337.png', 'backend/uploads/images/image-3c5ff45d280d1337.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 10:58:01', '2019-04-01 10:58:01'),
(14, 'hamra-kisan.png', NULL, 'image-6d32f518d345bcd2.png', 'backend/uploads/images/image-6d32f518d345bcd2.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 10:58:09', '2019-04-01 10:58:09'),
(15, 'hamra-kisan.png', NULL, 'image-bfa0b26fd73379bc.png', 'backend/uploads/images/image-bfa0b26fd73379bc.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 10:59:41', '2019-04-01 10:59:41'),
(16, 'hamra-kisan.png', NULL, 'image-9f8b236d6bb7313a.png', 'backend/uploads/images/image-9f8b236d6bb7313a.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 11:00:17', '2019-04-01 11:00:17'),
(17, 'hamra-kisan.png', NULL, 'image-faf2166b83c60a43.png', 'backend/uploads/images/image-faf2166b83c60a43.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 11:00:44', '2019-04-01 11:00:44'),
(18, 'hamra-kisan.png', NULL, 'image-6084fb0fabc4cabc.png', 'backend/uploads/images/image-6084fb0fabc4cabc.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 11:01:28', '2019-04-01 11:01:28'),
(19, 'hamra-kisan.png', NULL, 'image-748616ee83eb3f45.png', 'backend/uploads/images/image-748616ee83eb3f45.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 11:01:34', '2019-04-01 11:01:34'),
(20, 'hamra-kisan.png', NULL, 'image-55440499c1b6fca1.png', 'backend/uploads/images/image-55440499c1b6fca1.png', 'png', 'image/png', '1920', '1080', NULL, 1, '2019-04-01 11:01:41', '2019-04-01 11:01:41'),
(21, 'pipes2.jpg', NULL, 'image-ac3662dd21a94e22.jpg', 'backend/uploads/images/image-ac3662dd21a94e22.jpg', 'jpg', 'image/jpeg', '400', '400', NULL, 1, '2019-04-01 11:56:46', '2019-04-01 11:56:46'),
(22, 'pipes.jpg', NULL, 'image-c00301d9419f2552.jpg', 'backend/uploads/images/image-c00301d9419f2552.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-01 21:21:57', '2019-04-01 21:21:57'),
(23, '55869419_417533965726793_297261622928343040_n.jpg', NULL, 'image-2d350c2c5e74dcf5.jpg', 'backend/uploads/images/image-2d350c2c5e74dcf5.jpg', 'jpg', 'image/jpeg', '960', '720', NULL, 1, '2019-04-02 00:18:56', '2019-04-02 00:18:56'),
(24, '55869419_417533965726793_297261622928343040_n.jpg', NULL, 'image-83b32cac97acd956.jpg', 'backend/uploads/images/image-83b32cac97acd956.jpg', 'jpg', 'image/jpeg', '960', '720', NULL, 1, '2019-04-02 00:18:57', '2019-04-02 00:18:57'),
(25, '56173309_412708999291004_4746450895196127232_n.jpg', NULL, 'image-9dbbf27a140a159e.jpg', 'backend/uploads/images/image-9dbbf27a140a159e.jpg', 'jpg', 'image/jpeg', '816', '460', NULL, 1, '2019-04-02 00:18:57', '2019-04-02 00:18:57'),
(26, '56381579_681031349033014_8645080443072282624_n.jpg', NULL, 'image-7d9124500d496038.jpg', 'backend/uploads/images/image-7d9124500d496038.jpg', 'jpg', 'image/jpeg', '960', '720', NULL, 1, '2019-04-02 00:18:57', '2019-04-02 00:18:57'),
(27, '56560660_376082306319684_5757018977247166464_n.jpg', NULL, 'image-7723f4a7656f5502.jpg', 'backend/uploads/images/image-7723f4a7656f5502.jpg', 'jpg', 'image/jpeg', '960', '720', NULL, 1, '2019-04-02 00:18:58', '2019-04-02 00:18:58'),
(28, 'fb5.jpg', NULL, 'image-8326fbe5457a2af1.jpg', 'backend/uploads/images/image-8326fbe5457a2af1.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-02 01:14:51', '2019-04-02 01:14:51'),
(29, 'fb5.jpg', NULL, 'image-82e218d6c91967c5.jpg', 'backend/uploads/images/image-82e218d6c91967c5.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-02 01:51:25', '2019-04-02 01:51:25'),
(30, 'fb1.jpg', NULL, 'image-b35bc41685319ea8.jpg', 'backend/uploads/images/image-b35bc41685319ea8.jpg', 'jpg', 'image/jpeg', '960', '499', NULL, 1, '2019-04-02 02:04:02', '2019-04-02 02:04:02'),
(31, 'fb2.jpg', NULL, 'image-19ff38d05b4b07a4.jpg', 'backend/uploads/images/image-19ff38d05b4b07a4.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-02 02:04:24', '2019-04-02 02:04:24'),
(32, '52161648_781575165540688_6677734144442630144_n.jpg', NULL, 'image-bfd4ac07d0e8c4df.jpg', 'backend/uploads/images/image-bfd4ac07d0e8c4df.jpg', 'jpg', 'image/jpeg', '816', '612', NULL, 1, '2019-04-03 00:06:26', '2019-04-03 00:06:26'),
(33, 'pipes.jpg', NULL, 'image-c45fa74a5dcb751e.jpg', 'backend/uploads/images/image-c45fa74a5dcb751e.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:14:55', '2019-04-03 00:14:55'),
(34, 'pipes.jpg', NULL, 'image-54ab97fc44116a6a.jpg', 'backend/uploads/images/image-54ab97fc44116a6a.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:15:25', '2019-04-03 00:15:25'),
(35, 'pipes.jpg', NULL, 'image-0f706b1599b4f952.jpg', 'backend/uploads/images/image-0f706b1599b4f952.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:15:47', '2019-04-03 00:15:47'),
(36, 'pipes.jpg', NULL, 'image-bc8ab0d5075bb602.jpg', 'backend/uploads/images/image-bc8ab0d5075bb602.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:16:16', '2019-04-03 00:16:16'),
(37, 'pipes.jpg', NULL, 'image-1cde88a11b6c5e2a.jpg', 'backend/uploads/images/image-1cde88a11b6c5e2a.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:16:41', '2019-04-03 00:16:41'),
(38, 'pipes.jpg', NULL, 'image-f8057a12e5dcdb26.jpg', 'backend/uploads/images/image-f8057a12e5dcdb26.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:17:09', '2019-04-03 00:17:09'),
(39, 'pipes.jpg', NULL, 'image-03dcce8c4bf4b686.jpg', 'backend/uploads/images/image-03dcce8c4bf4b686.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:18:41', '2019-04-03 00:18:41'),
(40, 'pipes.jpg', NULL, 'image-0c8843f96de7296e.jpg', 'backend/uploads/images/image-0c8843f96de7296e.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:22:06', '2019-04-03 00:22:06'),
(41, 'pipes.jpg', NULL, 'image-de176388ab4bc1e3.jpg', 'backend/uploads/images/image-de176388ab4bc1e3.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:22:07', '2019-04-03 00:22:07'),
(42, 'pipes2.jpg', NULL, 'image-6121e07936d10aed.jpg', 'backend/uploads/images/image-6121e07936d10aed.jpg', 'jpg', 'image/jpeg', '400', '400', NULL, 1, '2019-04-03 00:22:07', '2019-04-03 00:22:07'),
(43, 'pipes.jpg', NULL, 'image-9a405e67cfb3768c.jpg', 'backend/uploads/images/image-9a405e67cfb3768c.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:23:41', '2019-04-03 00:23:41'),
(44, 'pipes.jpg', NULL, 'image-0386a471c043b166.jpg', 'backend/uploads/images/image-0386a471c043b166.jpg', 'jpg', 'image/jpeg', '2048', '1536', NULL, 1, '2019-04-03 00:23:42', '2019-04-03 00:23:42'),
(45, 'pipes2.jpg', NULL, 'image-2bf5aaafd65a9133.jpg', 'backend/uploads/images/image-2bf5aaafd65a9133.jpg', 'jpg', 'image/jpeg', '400', '400', NULL, 1, '2019-04-03 00:23:42', '2019-04-03 00:23:42'),
(46, 'sunil.jpg', NULL, 'image-fa8afb7250fa4eec.jpg', 'backend/uploads/images/image-fa8afb7250fa4eec.jpg', 'jpg', 'image/jpeg', '720', '1280', NULL, 2, '2019-04-03 00:51:25', '2019-04-03 00:51:25'),
(47, 'nepal-village.jpg', NULL, 'image-d16e45232de7ad31.jpg', 'backend/uploads/images/image-d16e45232de7ad31.jpg', 'jpg', 'image/jpeg', '1920', '1080', NULL, 1, '2019-04-03 01:20:02', '2019-04-03 01:20:02'),
(48, 'fb2.jpg', NULL, 'image-a10d042a69e1d547.jpg', 'backend/uploads/images/image-a10d042a69e1d547.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-03 01:20:31', '2019-04-03 01:20:31'),
(49, 'Capture.JPG', NULL, 'image-dcff7de5682809f6.JPG', 'backend/uploads/images/image-dcff7de5682809f6.JPG', 'JPG', 'image/jpeg', '1364', '643', NULL, 1, '2019-04-03 13:00:08', '2019-04-03 13:00:08'),
(50, 'fish.png', NULL, 'image-1d0828848dc9f5b9.png', 'backend/uploads/images/image-1d0828848dc9f5b9.png', 'png', 'image/png', '256', '256', NULL, 1, '2019-04-04 04:57:16', '2019-04-04 04:57:16'),
(51, 'vegetable.png', NULL, 'image-f88bf23bcae4472e.png', 'backend/uploads/images/image-f88bf23bcae4472e.png', 'png', 'image/png', '296', '171', NULL, 1, '2019-04-04 04:58:20', '2019-04-04 04:58:20'),
(52, 'vegetable-icon-png-0.png', NULL, 'image-7c093b4d544ed5d2.png', 'backend/uploads/images/image-7c093b4d544ed5d2.png', 'png', 'image/png', '1000', '500', NULL, 1, '2019-04-04 04:59:28', '2019-04-04 04:59:28'),
(53, 'Untitled-1.png', NULL, 'image-b08d837d0fa173e7.png', 'backend/uploads/images/image-b08d837d0fa173e7.png', 'png', 'image/png', '80', '80', NULL, 1, '2019-04-04 05:11:43', '2019-04-04 05:11:43'),
(54, 'fruits.png', NULL, 'image-6eff1eeb3088198c.png', 'backend/uploads/images/image-6eff1eeb3088198c.png', 'png', 'image/png', '100', '100', NULL, 1, '2019-04-04 05:26:41', '2019-04-04 05:26:41'),
(55, 'AN313-Tomatoes-732x549-Thumb.jpg', NULL, 'image-f39bf4200ec2cc99.jpg', 'backend/uploads/images/image-f39bf4200ec2cc99.jpg', 'jpg', 'image/jpeg', '732', '549', NULL, 1, '2019-04-04 11:35:51', '2019-04-04 11:35:51'),
(56, 'potatoes-411975_1280-1200x800.jpg', NULL, 'image-0277ac8711989b0c.jpg', 'backend/uploads/images/image-0277ac8711989b0c.jpg', 'jpg', 'image/jpeg', '1200', '800', NULL, 1, '2019-04-04 11:38:19', '2019-04-04 11:38:19'),
(57, 'fb2.jpg', NULL, 'image-238393e0d280f86e.jpg', 'backend/uploads/images/image-238393e0d280f86e.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:12:23', '2019-04-08 02:12:23'),
(58, 'fb5.jpg', NULL, 'image-9e613672d78953d2.jpg', 'backend/uploads/images/image-9e613672d78953d2.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:12:24', '2019-04-08 02:12:24'),
(59, 'fb2.jpg', NULL, 'image-b7c96f36cc004f52.jpg', 'backend/uploads/images/image-b7c96f36cc004f52.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:12:39', '2019-04-08 02:12:39'),
(60, 'fb5.jpg', NULL, 'image-5443359dcffd240d.jpg', 'backend/uploads/images/image-5443359dcffd240d.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:12:40', '2019-04-08 02:12:40'),
(61, 'fb2.jpg', NULL, 'image-b65344e8f33a11fe.jpg', 'backend/uploads/images/image-b65344e8f33a11fe.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:13:35', '2019-04-08 02:13:35'),
(62, 'fb5.jpg', NULL, 'image-bd56a26c3dcef598.jpg', 'backend/uploads/images/image-bd56a26c3dcef598.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:13:36', '2019-04-08 02:13:36'),
(63, 'fb2.jpg', NULL, 'image-de27eee70f55e866.jpg', 'backend/uploads/images/image-de27eee70f55e866.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:13:51', '2019-04-08 02:13:51'),
(64, 'fb5.jpg', NULL, 'image-3a446a4829e63a0b.jpg', 'backend/uploads/images/image-3a446a4829e63a0b.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:13:53', '2019-04-08 02:13:53'),
(65, 'fb2.jpg', NULL, 'image-0d45b4923192bceb.jpg', 'backend/uploads/images/image-0d45b4923192bceb.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:14:14', '2019-04-08 02:14:14'),
(66, 'fb5.jpg', NULL, 'image-3a1821655e6cd10b.jpg', 'backend/uploads/images/image-3a1821655e6cd10b.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:14:15', '2019-04-08 02:14:15'),
(67, 'fb2.jpg', NULL, 'image-c2286e8c90f640dd.jpg', 'backend/uploads/images/image-c2286e8c90f640dd.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:22:08', '2019-04-08 02:22:08'),
(68, 'fb5.jpg', NULL, 'image-16308a56b376221d.jpg', 'backend/uploads/images/image-16308a56b376221d.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:22:09', '2019-04-08 02:22:09'),
(69, 'fb2.jpg', NULL, 'image-d531aaa00f9eee59.jpg', 'backend/uploads/images/image-d531aaa00f9eee59.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:26:13', '2019-04-08 02:26:13'),
(70, 'fb5.jpg', NULL, 'image-4a50a8db18d6796c.jpg', 'backend/uploads/images/image-4a50a8db18d6796c.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:26:14', '2019-04-08 02:26:14'),
(71, 'fb2.jpg', NULL, 'image-481ab14f91a37475.jpg', 'backend/uploads/images/image-481ab14f91a37475.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:28:03', '2019-04-08 02:28:03'),
(72, 'fb5.jpg', NULL, 'image-e42cf97c32084ed0.jpg', 'backend/uploads/images/image-e42cf97c32084ed0.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:28:04', '2019-04-08 02:28:04'),
(73, 'fb2.jpg', NULL, 'image-0ea3bdc86a96e38e.jpg', 'backend/uploads/images/image-0ea3bdc86a96e38e.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:29:44', '2019-04-08 02:29:44'),
(74, 'fb5.jpg', NULL, 'image-933402cd8e309dd8.jpg', 'backend/uploads/images/image-933402cd8e309dd8.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:29:45', '2019-04-08 02:29:45'),
(75, 'Capture.JPG', NULL, 'image-194c4e98e8d3428c.JPG', 'backend/uploads/images/image-194c4e98e8d3428c.JPG', 'JPG', 'image/jpeg', '1359', '623', NULL, 1, '2019-04-08 02:32:59', '2019-04-08 02:32:59'),
(76, 'fb1.jpg', NULL, 'image-2127ea4eeb1f16d5.jpg', 'backend/uploads/images/image-2127ea4eeb1f16d5.jpg', 'jpg', 'image/jpeg', '960', '499', NULL, 1, '2019-04-08 02:32:59', '2019-04-08 02:32:59'),
(77, 'fb5.jpg', NULL, 'image-dbb56dd8afc9afd0.jpg', 'backend/uploads/images/image-dbb56dd8afc9afd0.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:33:00', '2019-04-08 02:33:00'),
(78, 'Capture.JPG', NULL, 'image-4260e9359aedca02.JPG', 'backend/uploads/images/image-4260e9359aedca02.JPG', 'JPG', 'image/jpeg', '1359', '623', NULL, 1, '2019-04-08 02:33:18', '2019-04-08 02:33:18'),
(79, 'fb1.jpg', NULL, 'image-df61e39a6388689e.jpg', 'backend/uploads/images/image-df61e39a6388689e.jpg', 'jpg', 'image/jpeg', '960', '499', NULL, 1, '2019-04-08 02:33:18', '2019-04-08 02:33:18'),
(80, 'fb5.jpg', NULL, 'image-15d93e13d1e17464.jpg', 'backend/uploads/images/image-15d93e13d1e17464.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:33:19', '2019-04-08 02:33:19'),
(81, 'fb2.jpg', NULL, 'image-115c780c0ece80a5.jpg', 'backend/uploads/images/image-115c780c0ece80a5.jpg', 'jpg', 'image/jpeg', '5184', '2256', NULL, 1, '2019-04-08 02:34:08', '2019-04-08 02:34:08'),
(82, 'fb5.jpg', NULL, 'image-27e0aa53dbfc6942.jpg', 'backend/uploads/images/image-27e0aa53dbfc6942.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 02:34:09', '2019-04-08 02:34:09'),
(83, 'fb1.jpg', NULL, 'image-cedd391de6a12819.jpg', 'backend/uploads/images/image-cedd391de6a12819.jpg', 'jpg', 'image/jpeg', '960', '499', NULL, 1, '2019-04-08 03:00:56', '2019-04-08 03:00:56'),
(84, 'fb5.jpg', NULL, 'image-8027e0a83814a59e.jpg', 'backend/uploads/images/image-8027e0a83814a59e.jpg', 'jpg', 'image/jpeg', '4824', '2388', NULL, 1, '2019-04-08 03:00:57', '2019-04-08 03:00:57'),
(85, '52161648_781575165540688_6677734144442630144_n.jpg', NULL, 'image-be5c10f8787f9c21.jpg', 'backend/uploads/images/image-be5c10f8787f9c21.jpg', 'jpg', 'image/jpeg', '816', '612', NULL, 1, '2019-04-08 05:03:06', '2019-04-08 05:03:06'),
(86, '52161648_781575165540688_6677734144442630144_n.jpg', NULL, 'image-dc9404574287d112.jpg', 'backend/uploads/images/image-dc9404574287d112.jpg', 'jpg', 'image/jpeg', '816', '612', NULL, 1, '2019-04-08 05:03:06', '2019-04-08 05:03:06'),
(87, 'l.jpg', NULL, 'image-b9e8ab86146a3dcc.jpg', 'backend/uploads/images/image-b9e8ab86146a3dcc.jpg', 'jpg', 'image/jpeg', '600', '385', NULL, 1, '2019-04-08 05:03:06', '2019-04-08 05:03:06'),
(88, 'fb1.jpg', NULL, 'image-06921d4971176f5e.jpg', 'backend/uploads/images/image-06921d4971176f5e.jpg', 'jpg', 'image/jpeg', '960', '499', NULL, 14, '2019-04-09 06:06:33', '2019-04-09 06:06:33'),
(89, 'team-6.jpg', NULL, 'image-b98848c3e13919a3.jpg', 'backend/uploads/images/image-b98848c3e13919a3.jpg', 'jpg', 'image/jpeg', '762', '774', NULL, 15, '2019-04-13 01:08:45', '2019-04-13 01:08:45'),
(90, 'vision.png', NULL, 'image-27654358c311247b.png', 'backend/uploads/images/image-27654358c311247b.png', 'png', 'image/png', '1767', '1080', NULL, 1, '2019-05-08 06:59:01', '2019-05-08 06:59:01'),
(91, 'vision.png', NULL, 'image-3ad159bbff2eaf2a.png', 'backend/uploads/images/image-3ad159bbff2eaf2a.png', 'png', 'image/png', '1767', '1080', NULL, 1, '2019-05-08 06:59:20', '2019-05-08 06:59:20'),
(92, 'FB_IMG_1425084245836.jpg', NULL, 'image-2124023f535cbe1f.jpg', 'backend/uploads/images/image-2124023f535cbe1f.jpg', 'jpg', 'image/jpeg', '720', '540', NULL, 3, '2019-05-29 03:31:46', '2019-05-29 03:31:46'),
(93, 'email.png', NULL, 'image-f41abe643458c8ea.png', 'backend/uploads/images/image-f41abe643458c8ea.png', 'png', 'image/png', '512', '512', NULL, 3, '2019-06-02 00:06:02', '2019-06-02 00:06:02'),
(94, 'email.png', NULL, 'image-ef33d97c1545a3e4.png', 'backend/uploads/images/image-ef33d97c1545a3e4.png', 'png', 'image/png', '512', '512', NULL, 3, '2019-06-02 00:08:41', '2019-06-02 00:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_about` mediumtext COLLATE utf8mb4_unicode_ci,
  `strat_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` mediumtext COLLATE utf8mb4_unicode_ci,
  `nep_services` text COLLATE utf8mb4_unicode_ci,
  `address` int(10) UNSIGNED DEFAULT NULL,
  `logo_image` int(10) UNSIGNED DEFAULT NULL,
  `feature_image` int(10) UNSIGNED DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `name`, `nep_name`, `slug`, `about`, `nep_about`, `strat_year`, `services`, `nep_services`, `address`, `logo_image`, `feature_image`, `color`, `view`, `featured`, `status`, `phone`, `mobile`, `email`, `address_id`, `website`, `facebook`, `twitter`, `instagram`, `youtube`, `seo_title`, `meta_description`, `meta_keywords`, `extra`, `created_at`, `updated_at`) VALUES
(1, 3, 'Himalaya Organic Farm Nepa', 'हिमालय अर्गानिक फार्म नेपाल नेपाल', 'himalaya_organic_farm_nepa', '<p style=\"text-align: justify;\"><strong>Welcome to Agriculture in Nepal</strong><br />Organic farm Nepal&nbsp;is a model organic farms practice sustainable&nbsp;agriculture in Nepal, utilizing the modern techniques of&nbsp;farming in Nepal&nbsp;and produces verity of organic foods. We never use chemical fertilizer and pesticides, birds and animals are feeding grains, grass and grazing on natural pasture.<br />Nepal is an agriculture biased country main source of food, income and employments for the majority are agriculture about 88% populations live in rural areas and depend on agriculture for livelihood.&nbsp;Natural farm Nepal&nbsp;was established with the objective to protect the production capacity of soil and ecosystem of the planet. Our mission is to minimize the negative impact on environment, economically empowering the society and grows healthy foods through the bio-dynamic philosophy.<br />Agriculture farm Nepal&nbsp;provides&nbsp;farming internship opportunities&nbsp;with animals, fish, poultry and cash crops farm, if you are interested to know about organic farming training and techniques, get involve in&nbsp;Agriculture volunteer&nbsp;in&nbsp;organic farm Nepal. Sustainable agriculture is the production of food and fiber, it address many environmental, social concerns and animal welfare.</p>', 'नेपालमा कृषिमा स्वागत छ | जैविक खेती नेपाल एक आदर्श कार्बनिक खेती नेपालमा स्थायी कृषि अभ्यास गर्दछ, नेपालका खेतीको आधुनिक प्रविधि प्रयोग गरी जैविक खाद्य पदार्थको प्रमाण बनाउँछ। हामी रासायनिक उर्वरक र कीटनाशकहरू कहिल्यै प्रयोग गर्दैनौं, चराहरू र जनावरहरूले प्राकृतिक चारामा अनाज, घाँस र चर्को खाना खाँदैछन्।नेपाल एक कृषि क्षेत्रगत पक्षी हो जुन भोजन, आय र बहुमतका लागि मुख्य स्रोत हो जुन 88% जनसंख्या ग्रामीण क्षेत्रमा रहन र जीवनशैलीको लागि कृषिमा निर्भर रहेको छ। प्राकृतिक खेती नेपाल को उद्देश्य को साथ माटो को उत्पादन क्षमता र ग्रह को पारिस्थितिकी तंत्र को रक्षा को लागि स्थापित भएको थियो। हाम्रो मिशनले आर्थिक रूपमा नकारात्मक प्रभावलाई कम पार्ने, आर्थिक रूपमा आर्थिक सशक्तिकरण र जैव-गतिशील दर्शनको माध्यमबाट स्वस्थ भोजन बढ्छ।कृषि खेती नेपालले जनावर, माछा, कुखुरा र नगद फसल खेतीको साथ खेती इन्टर्नशिप अवसर प्रदान गर्दछ, यदि तपाई जैविक खेती प्रशिक्षण र प्रविधि बारे जान्न चाहानुहुन्छ भने नेपालका जैविक खेतीमा स्वयंसेवक कृषिमा सामेल हुनुहोस्। सतत कृषि खाद्य र फाइबरको उत्पादन हो, यसले धेरै पर्यावरण, सामाजिक चिन्ता र पशु कल्याणलाई सम्बोधन गर्दछ।', NULL, '<ul>\r\n<li>Bee Farm</li>\r\n<li>Peer Farm</li>\r\n<li>Orange Farm</li>\r\n<li>Tea Farm</li>\r\n</ul>', '<p>जैविक खेती नेपाल एक आदर्श कार्बनिक खेती नेपालमा स्थायी कृषि अभ्यास गर्दछ, नेपालका खेतीको आधुनिक प्रविधि प्रयोग गरी जैविक खाद्य पदार्थको प्रमाण बनाउँछ। हामी रासायनिक उर्वरक र कीटनाशकहरू कहिल्यै प्रयोग गर्दैनौं, चराहरू र जनावरहरूले प्राकृतिक चारामा अनाज, घाँस र चर्को खाना खाँदैछन्।<br /><br /></p>', NULL, NULL, NULL, '#20910e', NULL, 1, 0, '9867032092', 'Molestiae in ducimus', 'info@webrootnepal.com', 1, 'https://www.nyqoci.us', 'Laborum quos dicta d', 'Veniam molestias cu', 'Quia aliquid aut con', 'Sequi aut dolore rer', NULL, NULL, NULL, NULL, '2019-03-31 11:42:08', '2019-06-02 05:28:52'),
(2, 1, 'Temporibus et impedi', NULL, 'temporibus_et_impedi', '<p>test</p>', NULL, NULL, '<p>test</p>', NULL, NULL, NULL, 23, '#aN', NULL, 1, 0, '+814-83-6583084', 'Eligendi sed exercit', 'boty@mailinator.com', 2, 'https://www.nej.us', 'Dolorum ducimus qui', 'Ipsum molestias in', 'Velit sed eligendi e', 'Consectetur aliquid', NULL, NULL, NULL, NULL, '2019-04-02 00:18:56', '2019-04-02 00:18:56'),
(3, 10, 'guqelom@mailinator.com', NULL, 'guqelom-at-mailinatorcom', 'A aliquid commodi do', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-06 03:36:09', '2019-04-06 03:36:09'),
(4, 11, 'miwix@mailinator.net', NULL, 'miwix-at-mailinatornet', 'Eaque mollitia eum f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-07 23:10:05', '2019-04-07 23:10:05'),
(5, 12, 'hoxyga@mailinator.com', NULL, 'hoxyga-at-mailinatorcom', 'Optio anim voluptat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-07 23:33:38', '2019-04-07 23:33:38'),
(6, 13, 'hoxyga@mailinator.com', NULL, 'hoxyga-at-mailinatorcom', 'Optio anim voluptat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-07 23:34:11', '2019-04-07 23:34:11'),
(7, 1, 'Beatae ad incididunt', 'हेमन्त फार्म', 'beatae_ad_incididunt', '<p>test</p>', '<p>हेमन्त फार्महेमन्त फार्महेमन्त फार्महेमन्त फार्महेमन्त फार्महेमन्त फार्महेमन्त फार्महेमन्त फार्महेमन्त फार्म</p>', NULL, '<p>rests</p>', '<ul>\r\n<li>हेमन्त फार्म</li>\r\n<li>हेमन्त फार्म</li>\r\n<li>हेमन्त फार्म</li>\r\n</ul>', NULL, NULL, 75, '#aN', NULL, 1, 0, '+364-31-8606826', 'Dolorem est id sit', 'tofihovod@mailinator.net', 8, 'https://www.letame.cm', 'Quam minus voluptate', 'Esse harum modi lau', 'Quo consequatur illu', 'Autem corporis repre', NULL, NULL, NULL, NULL, '2019-04-08 02:32:59', '2019-04-08 02:32:59'),
(8, 1, 'Beatae ad incididunt', NULL, 'beatae_ad_incididunt', '<p>test</p>', NULL, NULL, '<p>rests</p>', NULL, NULL, NULL, 78, '#aN', NULL, 1, 0, '+364-31-8606826', 'Dolorem est id sit', 'tofihovod@mailinator.net', 8, 'https://www.letame.cm', 'Quam minus voluptate', 'Esse harum modi lau', 'Quo consequatur illu', 'Autem corporis repre', NULL, NULL, NULL, NULL, '2019-04-08 02:33:18', '2019-04-08 02:33:18'),
(9, 14, 'hemanta poltry farm', NULL, 'hemanta-poltry-farm', 'Quae quia qui nesciu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-09 05:57:36', '2019-04-09 05:57:36'),
(10, 15, 'Lacy Jennings', NULL, 'hemanta-farm', 'this is just test', NULL, NULL, 'this is another test tttt gggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+859-52-6411269', NULL, 'rozevyco@mailinator.com', 18, NULL, 'Tenetur alias ipsum', 'Reiciendis nemo sed', 'Architecto illum ha', 'Sit saepe odio optio', NULL, NULL, NULL, NULL, '2019-04-10 00:39:19', '2019-04-10 06:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `listing_category`
--

CREATE TABLE `listing_category` (
  `listing_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_category`
--

INSERT INTO `listing_category` (`listing_id`, `category_id`) VALUES
(2, 1),
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(10, 3),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `listing_image`
--

CREATE TABLE `listing_image` (
  `listing_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_image`
--

INSERT INTO `listing_image` (`listing_id`, `image_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(9, 91);

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `listing_id` int(10) UNSIGNED NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_09_074247_create_roles_table', 1),
(4, '2019_02_09_074314_create_images_table', 1),
(5, '2019_02_09_085219_create_tags_table', 1),
(6, '2019_02_09_085922_create_categories_table', 1),
(7, '2019_02_09_102819_create_addresses_table', 1),
(8, '2019_02_09_103729_create_listings_table', 1),
(9, '2019_02_09_104008_create_contact_people_table', 1),
(10, '2019_02_09_104243_create_maps_table', 1),
(11, '2019_02_09_143602_create_reviews_table', 1),
(12, '2019_02_13_192243_create_proviences_table', 1),
(13, '2019_02_13_192321_create_districts_table', 1),
(14, '2019_02_19_114033_create_listing_category_table', 1),
(15, '2019_02_20_095253_create_listing_image_table', 1),
(16, '2019_03_07_033321_create_farm_products_table', 1),
(17, '2019_03_21_100911_create_product_categories_table', 1),
(18, '2019_03_21_100934_create_products_table', 1),
(19, '2019_03_23_175533_create_product_category_table', 1),
(20, '2019_03_26_161753_create_banners_table', 1),
(21, '2019_04_01_161935_create_product_image_table', 2),
(22, '2019_04_03_153536_create_farm_stories_table', 3),
(26, '2019_04_08_071235_create_vendors_table', 4),
(27, '2019_04_08_071355_create_vendor_image_table', 4),
(29, '2019_05_25_054829_create_farm_product_books_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `measure_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `nep_description` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `measure_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_info` text COLLATE utf8mb4_unicode_ci,
  `nep_other_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `nep_name`, `slug`, `vendor_id`, `description`, `nep_description`, `price`, `image_id`, `measure_unit`, `other_info`, `nep_other_info`, `created_at`, `updated_at`) VALUES
(1, 'Drip Irrigation Pipes', 'ड्रिप सिंचाई पाइप', 'drip_irrigation_pipes', 0, '<p>erdfd</p>', '<p>पेशेवरको हाम्रो योग्य टीम को कौशल को समर्थन, हामी एक विस्तृत श्रृंखला को 16mm को पेशकश मा साधन हो</p>', 2000, 43, 'role', '{\"diameter\":\"3.6mm\",\"test\":\"test-value\"}', '{\"\\u0935\\u094d\\u092f\\u093e\\u0938\":\"3.66 \\u092e\\u093f\\u0932\\u093f\\u092e\\u093f\\u091f\\u0930\",\"\\u092a\\u0930\\u0940\\u0915\\u094d\\u0937\\u0923\":\"\\u092a\\u0930\\u0940\\u0915\\u094d\\u0937\\u0923\"}', '2019-04-03 00:23:41', '2019-05-15 02:23:08'),
(2, 'Expedita amet ut as', NULL, 'expedita_amet_ut_as', 1, '<p>test</p>', NULL, 981, 85, 'Officia aute vero re', '{\"Quaerat et reiciendi\":\"Optio molestiae acc\"}', NULL, '2019-04-08 05:03:06', '2019-04-08 05:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nep_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `nep_description` text COLLATE utf8mb4_unicode_ci,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `nep_title`, `slug`, `description`, `nep_description`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'Pipes', 'पाइप', 'pipes', 'tete', 'पाइप  पाइप', 6, '2019-04-01 08:06:45', '2019-05-14 11:16:11'),
(2, 'machine', 'यन्त्र', 'machine', 'machine', 'यन्त्र  यन्त्र  यन्त्र', 47, '2019-04-03 01:20:02', '2019-05-14 11:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_id`, `image_id`) VALUES
(2, 86),
(2, 87);

-- --------------------------------------------------------

--
-- Table structure for table `proviences`
--

CREATE TABLE `proviences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `listing_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `address`, `phone_no`, `image_id`, `isVerified`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin@admin.com', '$2y$10$hdXlsl1V8vqIBQl.IIeW5e6WXzcYHpD6sjRj0BbiL3MD1GVgaO4bW', 1, 'kathmandu', '9867032092', NULL, 1, NULL, 'q9EoYD3rq75MISUuVSgAkMrIxCpBxvcCyn1jQCP6NJGwteTfO5EL8KbQOiLA', '2019-03-30 11:54:18', '2019-03-30 11:54:18'),
(2, 'Hemanta RIjal', 'foreverhemanta22111@gmail.com', '$2y$10$UcIROEe2WMwA3nW4UD6k6.gWcqM4Ggko8dor5ypQ7qjKnTihwT.Zi', 3, 'Test', '0909977', 46, 0, NULL, 'ZNSr3sJZ1OUbKXqlQ8x3sOSp4NdCEA2Q6mGufn1f9RF4n2cnackTh3LX6jRj', '2019-04-03 00:49:09', '2019-04-03 00:51:25'),
(3, 'hematna rijal', 'foreverhemanta221@gmail.com', '$2y$10$ThXEAp1XfFHIcXZpBUftu.TIr6SxmWcaa0pNJF7xQnfZ4E/kcnV3.', 3, 'Butwal', '9867032092', 92, 1, NULL, NULL, '2019-04-03 02:09:49', '2019-05-29 03:31:46'),
(5, 'admin', 'admin@webrootnepal.com', '$2y$10$uDqnvg2YaUjPP5BJougQR.a1CYA9ssHycPRQKilfh9rQG2iLCvVD.', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-03 03:59:00', '2019-04-03 03:59:00'),
(6, 'suhutare@mailinator.net', 'remiraq@mailinator.com', 'ZereusfS', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-06 03:24:11', '2019-04-06 03:24:11'),
(7, 'rahyg@mailinator.net', 'buseq@mailinator.net', '2DgU4hpE', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-06 03:25:19', '2019-04-06 03:25:19'),
(8, 'lako@mailinator.net', 'nihu@mailinator.net', '6yDbQ9x1', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-06 03:32:34', '2019-04-06 03:32:34'),
(9, 'nijuto@mailinator.com', 'dinujikuj@mailinator.com', 'SS7tXoTU', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-06 03:33:50', '2019-04-06 03:33:50'),
(10, 'wigec@mailinator.com', 'qihoreker@mailinator.net', 'CEjrDI0m', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-06 03:36:09', '2019-04-06 03:36:09'),
(11, 'sufegomyk@mailinator.net', 'foreverhemanta222222222221@gmail.com', 'fJURIDL8', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-07 23:10:04', '2019-04-07 23:10:04'),
(12, 'xymupeqohi@mailinator.com', 'foreverhemanta221111@ddgmail.com', 'AKXcUQdG', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-07 23:33:38', '2019-04-07 23:33:38'),
(13, 'xymupeqohi@mailinator.com', 'foreverhemanta2211111@gdmail.com', 'Tbq040LD', 3, NULL, NULL, NULL, 0, NULL, NULL, '2019-04-07 23:34:11', '2019-04-07 23:34:11'),
(14, 'xiwyqex@mailinator.net', 'foreverhemanta221111@1gmail.com', '$2y$10$n9iqfhOM4S1iuIJ/myqCreucB5nxpJsBOp1Mgcddej/0iZk9bERRe', 3, 'Devdaha 5 shitalnagar', '9867032092', 88, 0, NULL, NULL, '2019-04-09 05:57:36', '2019-04-09 06:06:33'),
(15, 'mylo@mailinator.com', 'foreverhemantta221@gmail.com', '$2y$10$C8u1jaEEZuh2ylZ.ZR1w6eqPcbDHhTW2nxzGf.ah6vmwGXVXVth3K', 3, 'test', '9867032092', 89, 0, NULL, 'MB5MiY9kDha0xz404MHuAnSK0UoD0CpKiOsO4wkTezUqafpmndwq8S0DBzah', '2019-04-10 00:39:19', '2019-04-13 01:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `email`, `cp_name`, `cp_phone`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Et repudiandae natus', 'Devdaha', 'sykujub@mailinator.net', 'Camilla Rose', '+464-23-7025388', 'Dolore distinctio P', '2019-04-08 03:00:56', '2019-04-08 03:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_image`
--

CREATE TABLE `vendor_image` (
  `vendor_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_image`
--

INSERT INTO `vendor_image` (`vendor_id`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 83, NULL, NULL),
(1, 84, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_image_id_foreign` (`image_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_image_id_foreign` (`image_id`);

--
-- Indexes for table `contact_people`
--
ALTER TABLE `contact_people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_people_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_provience_id_foreign` (`provience_id`);

--
-- Indexes for table `farm_products`
--
ALTER TABLE `farm_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_products_farm_id_foreign` (`farm_id`),
  ADD KEY `farm_products_image_id_foreign` (`image_id`);

--
-- Indexes for table `farm_product_books`
--
ALTER TABLE `farm_product_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_product_books_product_id_foreign` (`product_id`);

--
-- Indexes for table `farm_stories`
--
ALTER TABLE `farm_stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_stories_image_id_foreign` (`image_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_user_id_foreign` (`user_id`),
  ADD KEY `listings_address_foreign` (`address`),
  ADD KEY `listings_logo_image_foreign` (`logo_image`),
  ADD KEY `listings_feature_image_foreign` (`feature_image`),
  ADD KEY `listings_address_id_foreign` (`address_id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maps_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_id_foreign` (`image_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_image_id_foreign` (`image_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_image_id_foreign` (`image_id`);

--
-- Indexes for table `proviences`
--
ALTER TABLE `proviences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_people`
--
ALTER TABLE `contact_people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm_products`
--
ALTER TABLE `farm_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farm_product_books`
--
ALTER TABLE `farm_product_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farm_stories`
--
ALTER TABLE `farm_stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proviences`
--
ALTER TABLE `proviences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `contact_people`
--
ALTER TABLE `contact_people`
  ADD CONSTRAINT `contact_people_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_provience_id_foreign` FOREIGN KEY (`provience_id`) REFERENCES `proviences` (`id`);

--
-- Constraints for table `farm_products`
--
ALTER TABLE `farm_products`
  ADD CONSTRAINT `farm_products_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `farm_products_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `farm_product_books`
--
ALTER TABLE `farm_product_books`
  ADD CONSTRAINT `farm_product_books_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `farm_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `farm_stories`
--
ALTER TABLE `farm_stories`
  ADD CONSTRAINT `farm_stories_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_address_foreign` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `listings_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `listings_feature_image_foreign` FOREIGN KEY (`feature_image`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `listings_logo_image_foreign` FOREIGN KEY (`logo_image`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `maps_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
