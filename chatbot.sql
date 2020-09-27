-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 10:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `templateid` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('postback','web_url') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'postback',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nodeid` bigint(20) UNSIGNED DEFAULT NULL,
  `resource` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `buttons`
--

INSERT INTO `buttons` (`id`, `templateid`, `type`, `title`, `nodeid`, `resource`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(7, 15, 'web_url', 'VISIT WEBSITE', NULL, 'https://laravel.io/forum/10-02-2016-laravel-blade-unable-to-pass-parameter-in-partials', 1, 1, '2020-09-27 12:13:07', '2020-09-27 12:13:07'),
(8, 15, 'postback', 'Show Contact Details', 35, NULL, 1, 1, '2020-09-27 12:13:07', '2020-09-27 12:13:07'),
(9, 16, 'web_url', 'VISIT WEBSITE', NULL, 'https://laravel.io/forum/10-02-2016-laravel-blade-unable-to-pass-parameter-in-partials', 1, 1, '2020-09-27 12:17:49', '2020-09-27 12:17:49'),
(10, 16, 'postback', 'Order This One', 37, NULL, 1, 1, '2020-09-27 12:17:49', '2020-09-27 12:17:49'),
(11, 17, 'postback', 'Reservation', 36, NULL, 1, 1, '2020-09-27 12:20:25', '2020-09-27 12:20:25'),
(12, 17, 'postback', 'Show me menu', 38, NULL, 1, 1, '2020-09-27 12:20:25', '2020-09-27 12:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `buttontemplates`
--

CREATE TABLE `buttontemplates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `templateid` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `buttontemplates`
--

INSERT INTO `buttontemplates` (`id`, `templateid`, `message`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(11, 15, 'We will be more than glad to serve you.', 1, 1, '2020-09-27 12:13:07', '2020-09-27 12:13:07'),
(12, 17, 'We are ready to serve you. Please let us know how can we assist?', 1, 1, '2020-09-27 12:20:25', '2020-09-27 12:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `chatbots`
--

CREATE TABLE `chatbots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accesstoken` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageid` bigint(20) UNSIGNED DEFAULT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `chatbots`
--

INSERT INTO `chatbots` (`id`, `name`, `accesstoken`, `pageid`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(7, 'APSS Web Studio', 'EAAILHSBzbqsBAKqrYQTUOgeMd39IDAJmomwhSP6YuYj1toamwUWZBoAJM2t6uZCyfIUFklG7YosYXJ0ZA18HoGwQK457axEZA9PWPI7VCmk6NRoSgeYZAw0NPJBNFFjQtSU6JFCDcdRcUgR4OZBMQBMQBY8LhitnY6asovt5TeJIajvWKSZBWCV', 7, 1, 1, '2020-09-27 11:38:46', '2020-09-27 11:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediaid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image_url`, `mediaid`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(1, 'http://localhost/messenger/public/gallery/1601151217.jpg', '627206554825019', 1, 1, '2020-09-26 14:13:39', '2020-09-26 14:13:39'),
(2, 'http://localhost/messenger/public/gallery/1601151371.jpg', '1571540486341371', 1, 1, '2020-09-26 14:16:13', '2020-09-26 14:16:13'),
(3, 'http://localhost/messenger/public/gallery/1601151572.jpg', '2760548637556045', 1, 1, '2020-09-26 14:19:34', '2020-09-26 14:19:34'),
(4, 'http://localhost/messenger/public/gallery/1601151625.jpg', '1274088469600496', 1, 1, '2020-09-26 14:20:27', '2020-09-26 14:20:27'),
(5, 'http://localhost/messenger/public/gallery/1601151682.jpg', '388369588843612', 1, 1, '2020-09-26 14:21:24', '2020-09-26 14:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `generictemplates`
--

CREATE TABLE `generictemplates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `templateid` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `listeners`
--

CREATE TABLE `listeners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listener` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nodeid` bigint(20) UNSIGNED NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listeners`
--

INSERT INTO `listeners` (`id`, `listener`, `nodeid`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(12, 'Hi', 41, 1, 1, '2020-09-27 12:22:34', '2020-09-27 12:22:34'),
(13, ' Hello', 41, 1, 1, '2020-09-27 12:22:34', '2020-09-27 12:22:34'),
(14, ' Excuse me', 41, 1, 1, '2020-09-27 12:22:34', '2020-09-27 12:22:34'),
(15, ' Salam', 41, 1, 1, '2020-09-27 12:22:34', '2020-09-27 12:22:34'),
(16, ' You there', 41, 1, 1, '2020-09-27 12:22:34', '2020-09-27 12:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaid` bigint(20) UNSIGNED NOT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachmentid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mediatemplates`
--

CREATE TABLE `mediatemplates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `templateid` bigint(20) UNSIGNED NOT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mediatemplates`
--

INSERT INTO `mediatemplates` (`id`, `templateid`, `type`, `media`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(2, 16, 'image', '627206554825019', 1, 1, '2020-09-27 12:17:49', '2020-09-27 12:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_09_14_165049_create_nodetypes_table', 2),
(4, '2020_09_14_164318_create_nodes_table', 3),
(5, '2020_09_14_170946_create_textresponses_table', 4),
(6, '2020_09_15_082644_create_chatbots_table', 5),
(7, '2020_09_15_115446_create_templates_table', 6),
(8, '2020_09_15_121111_create_buttontemplates_table', 7),
(9, '2020_09_15_121503_create_buttons_table', 8),
(10, '2020_09_15_122030_create_generictemplates_table', 9),
(11, '2020_09_15_150848_create_media_table', 10),
(12, '2020_09_16_094847_create_social_facebook_accounts_table', 11),
(13, '2020_09_26_183435_create_galleries_table', 12),
(14, '2020_09_26_223442_create_pages_table', 13),
(15, '2020_09_27_103100_create_listeners_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `nodeid` bigint(20) UNSIGNED NOT NULL,
  `chatbotid` bigint(20) UNSIGNED DEFAULT NULL,
  `nodename` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nodetypeid` bigint(20) UNSIGNED NOT NULL,
  `nextaction` bigint(20) UNSIGNED DEFAULT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`nodeid`, `chatbotid`, `nodename`, `nodetypeid`, `nextaction`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(35, 7, 'Contact Details', 1, NULL, 1, 1, '2020-09-27 12:10:56', '2020-09-27 12:10:56'),
(36, 7, 'Booking', 2, NULL, 1, 1, '2020-09-27 12:13:07', '2020-09-27 12:13:07'),
(37, 7, 'Order received', 1, NULL, 1, 1, '2020-09-27 12:14:56', '2020-09-27 12:14:56'),
(38, 7, 'Super Set Menu', 3, NULL, 1, 1, '2020-09-27 12:17:49', '2020-09-27 12:17:49'),
(39, 7, 'How Can We Help', 2, NULL, 1, 1, '2020-09-27 12:20:25', '2020-09-27 12:20:25'),
(40, 7, 'Welcome', 1, 39, 1, 1, '2020-09-27 12:21:34', '2020-09-27 12:21:34'),
(41, 7, 'Default listener', 5, 40, 1, 1, '2020-09-27 12:22:34', '2020-09-27 12:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `nodetypes`
--

CREATE TABLE `nodetypes` (
  `nodetypeid` bigint(20) UNSIGNED NOT NULL,
  `nodetype` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nodetypes`
--

INSERT INTO `nodetypes` (`nodetypeid`, `nodetype`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(1, 'text', 1, 1, '2020-09-14 11:03:57', '2020-09-14 11:03:57'),
(2, 'buttons', 1, 1, '2020-09-14 11:03:57', '2020-09-14 11:03:57'),
(3, 'media', 1, 1, '2020-09-26 18:07:02', '2020-09-26 18:07:13'),
(4, 'generic', 1, 1, '2020-09-26 18:07:26', '2020-09-26 18:07:20'),
(5, 'listener', 1, 1, '2020-09-27 10:36:26', '2020-09-27 10:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageaccid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `category`, `pagename`, `pageaccid`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(2, 'Restaurant', 'My Own Chatbot', '100227131815541', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(3, 'Education', 'CSE 534', '100544945084559', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(4, 'Restaurant', 'DearBot', '101114898406077', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(5, 'Restaurant', 'My Own Restaurant', '101184915050198', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(6, 'Community', 'ভাই বেরাদর\'স ফটোগ্রাফি', '190588161103136', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(7, 'Computers & Internet Website', 'AAPSS Web Studio', '223598157820622', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(8, 'Education', 'CSE 327', '497644827429334', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(9, 'Bengali/Bangladeshi Restaurant', 'Cafe 360', '603247533171978', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(10, 'Clothing (Brand)', 'Sweety\'s Collection', '807746766043565', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(11, 'Coffee Shop', 'Cafe 360, Shyamoli Square', '1570744936284248', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13'),
(12, 'Caterer', '360 Catering- Cater to Your Taste', '1804886766257843', 1, 1, '2020-09-26 17:10:13', '2020-09-26 17:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `social_facebook_accounts`
--

CREATE TABLE `social_facebook_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `social_facebook_accounts`
--

INSERT INTO `social_facebook_accounts` (`user_id`, `provider_user_id`, `name`, `access_token`, `provider`, `created_at`, `updated_at`) VALUES
(1, '1468378073345679', NULL, NULL, 'facebook', '2020-09-25 10:39:18', '2020-09-25 10:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nodeid` bigint(20) UNSIGNED NOT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `nodeid`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(15, 36, 1, 1, '2020-09-27 12:13:07', '2020-09-27 12:13:07'),
(16, 38, 1, 1, '2020-09-27 12:17:49', '2020-09-27 12:17:49'),
(17, 39, 1, 1, '2020-09-27 12:20:25', '2020-09-27 12:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `textresponses`
--

CREATE TABLE `textresponses` (
  `textresponseid` bigint(20) UNSIGNED NOT NULL,
  `nodeid` bigint(20) UNSIGNED NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `createdby` bigint(20) UNSIGNED NOT NULL,
  `updatedby` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `textresponses`
--

INSERT INTO `textresponses` (`textresponseid`, `nodeid`, `message`, `mid`, `reply`, `createdby`, `updatedby`, `created_at`, `updated_at`) VALUES
(7, 35, 'House: 249/250, Road: 03, Block: Dho, Section: 12', '', '0', 1, 1, '2020-09-27 12:10:56', '2020-09-27 12:10:56'),
(8, 37, 'Thanks for your order. We will contact you soon', '', '0', 1, 1, '2020-09-27 12:14:56', '2020-09-27 12:14:56'),
(9, 40, 'Welcome to PizzaVizza!', '', '0', 1, 1, '2020-09-27 12:21:34', '2020-09-27 12:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sirajum Monir Parvez', 'viparvez@gmail.com', NULL, '$2y$10$xdzofYC6g5Asg7CRrE03k.mgMej6gQF1ji6i0xFNBpCsY5pMo0482', NULL, '2020-09-12 23:53:55', '2020-09-12 23:53:55'),
(2, 'Syed Shahir Ahmed Rakin', 'rakin.ahmed2000@gmail.com', NULL, '$2b$10$z8skbzC8fBRmPVzEwveBUeKMnlpt8y3xNvSH5LDMHQ/GPrpteraU6', NULL, '2020-09-16 05:04:56', '2020-09-16 05:04:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `buttons_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `buttons_updatedby_foreign` (`updatedby`) USING BTREE,
  ADD KEY `templateid` (`templateid`),
  ADD KEY `nodid` (`nodeid`);

--
-- Indexes for table `buttontemplates`
--
ALTER TABLE `buttontemplates`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `buttontemplates_templateid_foreign` (`templateid`) USING BTREE,
  ADD KEY `buttontemplates_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `buttontemplates_updatedby_foreign` (`updatedby`) USING BTREE;

--
-- Indexes for table `chatbots`
--
ALTER TABLE `chatbots`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `chatbots_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `chatbots_updatedby_foreign` (`updatedby`) USING BTREE,
  ADD KEY `chatbot_pageid` (`pageid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_createdby_foreign` (`createdby`),
  ADD KEY `galleries_updatedby_foreign` (`updatedby`);

--
-- Indexes for table `generictemplates`
--
ALTER TABLE `generictemplates`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `generictemplates_templateid_foreign` (`templateid`) USING BTREE,
  ADD KEY `generictemplates_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `generictemplates_updatedby_foreign` (`updatedby`) USING BTREE;

--
-- Indexes for table `listeners`
--
ALTER TABLE `listeners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listeners_nodeid_foreign` (`nodeid`),
  ADD KEY `listeners_createdby_foreign` (`createdby`),
  ADD KEY `listeners_updatedby_foreign` (`updatedby`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaid`) USING BTREE,
  ADD KEY `media_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `media_updatedby_foreign` (`updatedby`) USING BTREE;

--
-- Indexes for table `mediatemplates`
--
ALTER TABLE `mediatemplates`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `mediatemplates_templateid_foreign` (`templateid`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`nodeid`) USING BTREE,
  ADD KEY `nodes_nodetypeid_foreign` (`nodetypeid`) USING BTREE,
  ADD KEY `nodes_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `nodes_updatedby_foreign` (`updatedby`) USING BTREE,
  ADD KEY `exec_nextaction_nodes` (`nextaction`) USING BTREE,
  ADD KEY `chatbotid_nodeid` (`chatbotid`) USING BTREE;

--
-- Indexes for table `nodetypes`
--
ALTER TABLE `nodetypes`
  ADD PRIMARY KEY (`nodetypeid`) USING BTREE,
  ADD KEY `nodetypes_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `nodetypes_updatedby_foreign` (`updatedby`) USING BTREE;

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_createdby_foreign` (`createdby`),
  ADD KEY `pages_updatedby_foreign` (`updatedby`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `templates_nodeid_foreign` (`nodeid`) USING BTREE,
  ADD KEY `templates_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `templates_updatedby_foreign` (`updatedby`) USING BTREE;

--
-- Indexes for table `textresponses`
--
ALTER TABLE `textresponses`
  ADD PRIMARY KEY (`textresponseid`) USING BTREE,
  ADD KEY `textresponses_createdby_foreign` (`createdby`) USING BTREE,
  ADD KEY `textresponses_updatedby_foreign` (`updatedby`) USING BTREE,
  ADD KEY `nodeid` (`nodeid`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buttontemplates`
--
ALTER TABLE `buttontemplates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chatbots`
--
ALTER TABLE `chatbots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `generictemplates`
--
ALTER TABLE `generictemplates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listeners`
--
ALTER TABLE `listeners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mediatemplates`
--
ALTER TABLE `mediatemplates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `nodeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `nodetypes`
--
ALTER TABLE `nodetypes`
  MODIFY `nodetypeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `textresponses`
--
ALTER TABLE `textresponses`
  MODIFY `textresponseid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buttons`
--
ALTER TABLE `buttons`
  ADD CONSTRAINT `btn_templateid` FOREIGN KEY (`templateid`) REFERENCES `templates` (`id`),
  ADD CONSTRAINT `buttons_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buttons_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tonodeidaction` FOREIGN KEY (`nodeid`) REFERENCES `nodes` (`nodeid`);

--
-- Constraints for table `buttontemplates`
--
ALTER TABLE `buttontemplates`
  ADD CONSTRAINT `buttontemplates_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buttontemplates_templateid_foreign` FOREIGN KEY (`templateid`) REFERENCES `templates` (`id`),
  ADD CONSTRAINT `buttontemplates_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `chatbots`
--
ALTER TABLE `chatbots`
  ADD CONSTRAINT `chatbot_pageid` FOREIGN KEY (`pageid`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `chatbots_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chatbots_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `galleries_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `generictemplates`
--
ALTER TABLE `generictemplates`
  ADD CONSTRAINT `generictemplates_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `generictemplates_templateid_foreign` FOREIGN KEY (`templateid`) REFERENCES `templates` (`id`),
  ADD CONSTRAINT `generictemplates_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `listeners`
--
ALTER TABLE `listeners`
  ADD CONSTRAINT `listeners_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `listeners_nodeid_foreign` FOREIGN KEY (`nodeid`) REFERENCES `nodes` (`nodeid`),
  ADD CONSTRAINT `listeners_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `media_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `mediatemplates`
--
ALTER TABLE `mediatemplates`
  ADD CONSTRAINT `mediatemplates_templateid_foreign` FOREIGN KEY (`templateid`) REFERENCES `templates` (`id`);

--
-- Constraints for table `nodes`
--
ALTER TABLE `nodes`
  ADD CONSTRAINT `chatbotid_nodeid` FOREIGN KEY (`chatbotid`) REFERENCES `chatbots` (`id`),
  ADD CONSTRAINT `exec_nextaction_nodes` FOREIGN KEY (`nextaction`) REFERENCES `nodes` (`nodeid`),
  ADD CONSTRAINT `nodes_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nodes_nodetypeid_foreign` FOREIGN KEY (`nodetypeid`) REFERENCES `nodetypes` (`nodetypeid`),
  ADD CONSTRAINT `nodes_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `nodetypes`
--
ALTER TABLE `nodetypes`
  ADD CONSTRAINT `nodetypes_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nodetypes_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pages_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `templates_nodeid_foreign` FOREIGN KEY (`nodeid`) REFERENCES `nodes` (`nodeid`),
  ADD CONSTRAINT `templates_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);

--
-- Constraints for table `textresponses`
--
ALTER TABLE `textresponses`
  ADD CONSTRAINT `response_nodeid` FOREIGN KEY (`nodeid`) REFERENCES `nodes` (`nodeid`),
  ADD CONSTRAINT `textresponses_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `textresponses_updatedby_foreign` FOREIGN KEY (`updatedby`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
