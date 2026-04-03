-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2026 at 12:09 PM
-- Server version: 11.4.10-MariaDB-cll-lve-log
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reguldim_regularneed`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `target_audience` varchar(191) DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `coins_per_view_subscriber` int(11) NOT NULL DEFAULT 0,
  `coins_per_click_subscriber` int(11) NOT NULL DEFAULT 0,
  `coins_per_view_non_subscriber` int(11) NOT NULL DEFAULT 0,
  `coins_per_click_non_subscriber` int(11) NOT NULL DEFAULT 0,
  `max_coins_per_user` int(11) DEFAULT NULL,
  `total_coins_budget` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `image`, `link`, `target_audience`, `position`, `start_date`, `end_date`, `status`, `is_featured`, `coins_per_view_subscriber`, `coins_per_click_subscriber`, `coins_per_view_non_subscriber`, `coins_per_click_non_subscriber`, `max_coins_per_user`, `total_coins_budget`, `created_at`, `updated_at`) VALUES
(1, 'Ads', NULL, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.fiverr.com%2Fazfar123%2Fedit-your-products-pictures-for-amazon-ali-baba-and-daraz&psig=AOvVaw04WB2dRBG9f-b9aixRCvoH&ust=1760643588029000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCLjmqNH6ppADFQAAAAAdAAAAABAE', 'https://shop.adnancse.top/', 'all', 'top', '2025-10-15 23:39:02', '2025-10-16 23:39:02', 'active', 0, 0, 0, 0, 0, NULL, NULL, '2025-10-15 23:40:44', '2025-10-15 23:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `link_url` varchar(191) DEFAULT NULL,
  `target_audience` varchar(191) DEFAULT NULL,
  `position` varchar(191) NOT NULL DEFAULT 'homepage',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'inactive',
  `views_count` int(11) NOT NULL DEFAULT 0,
  `clicks_count` int(11) NOT NULL DEFAULT 0,
  `budget` decimal(10,2) DEFAULT NULL,
  `cost_per_click` decimal(8,4) NOT NULL DEFAULT 0.0000,
  `cost_per_view` decimal(8,4) NOT NULL DEFAULT 0.0000,
  `ad_type` varchar(191) NOT NULL DEFAULT 'banner',
  `priority` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `coins_per_view` int(11) NOT NULL DEFAULT 0,
  `coins_per_click` int(11) NOT NULL DEFAULT 0,
  `max_coins_per_user` int(11) DEFAULT NULL,
  `total_coins_budget` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_clicks`
--

CREATE TABLE `advertisement_clicks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `session_id` varchar(191) DEFAULT NULL,
  `page_url` varchar(191) DEFAULT NULL,
  `referrer_url` varchar(191) DEFAULT NULL,
  `clicked_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_views`
--

CREATE TABLE `advertisement_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `session_id` varchar(191) DEFAULT NULL,
  `page_url` varchar(191) DEFAULT NULL,
  `referrer_url` varchar(191) DEFAULT NULL,
  `viewed_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_rewards`
--

CREATE TABLE `ad_rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `coins` int(11) NOT NULL DEFAULT 0,
  `action_type` varchar(191) NOT NULL DEFAULT 'view',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_views`
--

CREATE TABLE `ad_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `points_earned` int(11) NOT NULL DEFAULT 0,
  `ad_name` varchar(191) NOT NULL,
  `photo` longtext NOT NULL,
  `description` longtext NOT NULL,
  `link_url` longtext NOT NULL,
  `target_audience` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `start_date` varchar(191) NOT NULL,
  `end_date` varchar(191) NOT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'inactive',
  `views_count` int(11) NOT NULL DEFAULT 0,
  `clicks_count` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `photo` longtext DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `url`, `title`, `slug`, `photo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, NULL, NULL, 'Banner', 'banner-2601203512-233', 'backend/img/banners/1768901613_696f4bed77746.jpg', NULL, 'active', '2025-11-17 19:27:05', '2026-01-20 14:35:12'),
(8, NULL, NULL, 'Banner 2', 'banner-2-2601201259-905', 'backend/img/banners/1768903979_696f552bd562d.jpg', NULL, 'active', '2025-11-28 18:54:18', '2026-01-20 15:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Dove', 'dove', 'active', '2025-11-28 19:30:42', '2025-11-28 19:30:42'),
(16, 'SkinnO', 'skinno', 'active', '2025-11-28 19:30:54', '2025-11-28 19:30:54'),
(17, 'Vaseline', 'vaseline', 'active', '2025-11-28 19:31:24', '2025-11-28 19:31:24'),
(18, 'Meril', 'meril', 'active', '2025-11-28 19:31:43', '2025-11-28 19:31:43'),
(19, 'Vaseline', 'vaseline-2511283332-392', 'active', '2025-11-28 19:33:32', '2025-11-28 19:33:32'),
(20, 'Sakura', 'sakura', 'active', '2025-11-28 19:33:43', '2025-11-28 19:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` enum('new','progress','delivered','cancel') NOT NULL DEFAULT 'new',
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `order_id`, `user_id`, `price`, `status`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(21, 33, NULL, 1, 225.00, 'new', 1, 225.00, '2025-12-02 19:04:57', '2025-12-02 19:04:57'),
(36, 24, NULL, 10, 650.00, 'new', 3, 1950.00, '2026-01-26 14:21:00', '2026-01-26 14:26:26'),
(38, 24, NULL, 10, 650.00, 'new', 1, 650.00, '2026-01-27 12:19:38', '2026-01-27 12:21:40'),
(40, 24, NULL, 12, 650.00, 'new', 1, 650.00, '2026-01-29 14:28:02', '2026-01-29 14:28:02'),
(41, 24, NULL, 9, 650.00, 'new', 2, 1300.00, '2026-01-30 10:02:46', '2026-01-30 10:58:59'),
(42, 24, 36, 11, 650.00, 'new', 5, 3250.00, '2026-01-30 18:33:36', '2026-03-26 17:48:38'),
(47, 32, NULL, 13, 315.00, 'new', 1, 350.00, '2026-02-23 11:28:58', '2026-02-23 11:28:58'),
(48, 24, 36, 11, 357.50, 'new', 1, 650.00, '2026-02-24 11:58:34', '2026-03-26 17:48:38'),
(49, 24, 36, 11, 357.50, 'new', 1, 650.00, '2026-02-24 13:24:04', '2026-03-26 17:48:38'),
(50, 24, 36, 11, 357.50, 'new', 1, 650.00, '2026-02-24 14:10:06', '2026-03-26 17:48:38'),
(51, 24, 36, 11, 357.50, 'new', 1, 650.00, '2026-02-24 14:20:00', '2026-03-26 17:48:38'),
(55, 37, NULL, 7, 1100.00, 'new', 1, 1100.00, '2026-03-09 10:26:37', '2026-03-09 10:26:37'),
(56, 32, NULL, NULL, 315.00, 'new', 1, 315.00, '2026-03-26 22:58:35', '2026-03-26 22:58:35'),
(57, 24, NULL, NULL, 357.50, 'new', 2, 715.00, '2026-03-28 07:18:53', '2026-03-28 07:18:53'),
(58, 24, 37, NULL, 357.50, 'new', 1, 357.50, '2026-03-28 07:30:58', '2026-03-28 07:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `summary` text DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `photo`, `is_parent`, `parent_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Makeup', 'makeup', NULL, 'backend/img/category/1764356623_6929f20fa5d61.png', 1, NULL, NULL, 'active', '2025-11-28 19:03:43', '2025-11-28 19:03:43'),
(9, 'Skin', 'skin', NULL, 'backend/img/category/1764356765_6929f29d186e3.png', 1, NULL, NULL, 'active', '2025-11-28 19:06:05', '2025-11-28 19:06:05'),
(10, 'Hair', 'hair', NULL, 'backend/img/category/1764357155_6929f42352a28.png', 1, NULL, NULL, 'active', '2025-11-28 19:12:35', '2025-11-28 19:12:35'),
(11, 'Personal Care', 'personal-care', NULL, 'backend/img/category/1764357895_6929f707a81f3.png', 1, NULL, NULL, 'active', '2025-11-28 19:19:36', '2025-11-28 19:24:55'),
(12, 'Jewellery', 'jewellery', NULL, 'backend/img/category/1764357916_6929f71c4db5b.png', 1, NULL, NULL, 'active', '2025-11-28 19:25:16', '2025-11-28 19:25:16'),
(13, 'Mom & Baby', 'mom-baby', NULL, 'backend/img/category/1764358217_6929f84977a87.png', 1, NULL, NULL, 'active', '2025-11-28 19:30:17', '2025-11-28 19:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `coin_transactions`
--

CREATE TABLE `coin_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `reference_type` varchar(191) DEFAULT NULL,
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `balance_after` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `type` enum('fixed','percent') NOT NULL DEFAULT 'fixed',
  `value` decimal(20,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `monthly_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `coins_per_ad_view` int(11) NOT NULL DEFAULT 0,
  `ad_view_points_multiplier` int(11) NOT NULL DEFAULT 1,
  `referral_points_multiplier` int(11) NOT NULL DEFAULT 1,
  `benefits` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `price`, `monthly_price`, `coins_per_ad_view`, `ad_view_points_multiplier`, `referral_points_multiplier`, `benefits`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 0.00, 0.00, 0, 5, 1, 'Basic plan with 5 coins per ad view', '2025-10-08 09:52:05', '2025-10-08 09:52:05'),
(2, 'Premium', 0.00, 499.00, 0, 10, 2, 'Premium plan with 10 coins per ad view', '2025-10-08 09:52:05', '2025-10-08 09:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `subject` text NOT NULL,
  `email` varchar(191) NOT NULL,
  `photo` longtext DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `message` longtext NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `subject`, `email`, `photo`, `phone`, `message`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 'Shayne Baxley', 'mehekemart.com', 'contact@domainsubmit.pro', NULL, '6322839227', 'Hello,\r\n\r\nAdd mehekemart.com web site to Google Search Index in order to have it displayed in Web Search Results.\r\n\r\nRegister mehekemart.com at https://searchregister.org', '2025-11-17 19:34:41', '2025-11-17 18:43:53', '2025-11-17 19:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_07_10_021010_create_brands_table', 1),
(6, '2020_07_10_025334_create_banners_table', 1),
(7, '2020_07_10_112147_create_categories_table', 1),
(8, '2020_07_11_063857_create_products_table', 1),
(9, '2020_07_12_073132_create_post_categories_table', 1),
(10, '2020_07_12_073701_create_post_tags_table', 1),
(11, '2020_07_12_083638_create_posts_table', 1),
(12, '2020_07_13_151329_create_messages_table', 1),
(13, '2020_07_14_023748_create_shippings_table', 1),
(14, '2020_07_15_054356_create_orders_table', 1),
(15, '2020_07_15_102626_create_carts_table', 1),
(16, '2020_07_16_041623_create_notifications_table', 1),
(17, '2020_07_16_053240_create_coupons_table', 1),
(18, '2020_07_23_143757_create_wishlists_table', 1),
(19, '2020_07_24_074930_create_product_reviews_table', 1),
(20, '2020_07_24_131727_create_post_comments_table', 1),
(21, '2020_08_01_143408_create_settings_table', 1),
(22, '2023_06_21_164432_create_jobs_table', 1),
(23, '2025_08_11_043459_create_advertisements_table', 1),
(24, '2025_08_11_043513_create_advertisement_views_table', 1),
(25, '2025_08_11_043524_create_advertisement_clicks_table', 1),
(26, '2025_08_11_050100_create_coin_transactions_table', 1),
(27, '2025_08_11_050200_add_coin_rewards_to_advertisements_table', 1),
(28, '2025_08_11_060000_create_subscriptions_table', 1),
(29, '2025_08_11_084329_create_memberships_table', 1),
(30, '2025_08_11_084417_create_user_memberships_table', 1),
(31, '2025_08_11_084429_create_referrals_table', 1),
(32, '2025_08_11_084528_create_transactions_table', 1),
(33, '2025_08_11_085258_create_ad_views_table', 1),
(34, '2025_08_11_103151_create_ads_table', 1),
(35, '2025_08_12_071406_create_ad_rewards_table', 1),
(36, '2025_08_13_101948_create_subscription_plans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0f9ad91a-f588-4ffc-8745-40f28712213e', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"https:\\/\\/regularneed.com\\/product-detail\\/skino-onion-hair-oil-with-onion-blackseed-hair-regrowth-oil\",\"fas\":\"fa-star\"}', NULL, '2026-01-26 14:36:13', '2026-01-26 14:36:13'),
('10544735-213f-417f-bf78-7735cd93fa16', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/19\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 23:34:50', '2026-01-25 23:34:50'),
('110a2c51-508a-44bc-915b-85744644b714', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/mehekemart.com\\/admin\\/order\\/8\",\"fas\":\"fa-file-alt\"}', '2025-11-30 16:58:30', '2025-11-28 20:33:09', '2025-11-30 16:58:30'),
('122781cb-4366-44b9-a474-9af11816aadf', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/23\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-13 21:20:03', '2026-02-13 21:20:03'),
('140f5b99-8703-4d0e-949d-b5f1c91b6158', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/14\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 21:19:36', '2026-01-25 21:19:36'),
('1978f6ca-a73d-4bff-852a-3fc43cbf2d1e', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/mehekemart.com\\/admin\\/order\\/3\",\"fas\":\"fa-file-alt\"}', '2025-11-30 17:05:24', '2025-11-27 17:39:20', '2025-11-30 17:05:24'),
('19d19dc5-df58-4fa4-b699-161b30997af8', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/www.regularneed.com\\/admin\\/order\\/9\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-20 00:01:40', '2026-01-20 00:01:40'),
('1f0aa7b3-0bab-4131-854a-81a729819f52', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"https:\\/\\/www.regularneed.com\\/product-detail\\/skino-onion-hair-oil-with-onion-blackseed-hair-regrowth-oil\",\"fas\":\"fa-star\"}', NULL, '2026-01-20 00:24:08', '2026-01-20 00:24:08'),
('21b6bdf5-de43-4aa3-9ef3-b6c79c719d30', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/mehekemart.com\\/admin\\/order\\/7\",\"fas\":\"fa-file-alt\"}', '2025-11-30 17:01:26', '2025-11-28 20:19:54', '2025-11-30 17:01:26'),
('239614b2-b886-4d23-8208-ad2127c847b7', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/31\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-24 13:24:29', '2026-02-24 13:24:29'),
('2c2f799f-aa41-4b06-8271-06b3984523b4', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/18\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 23:24:55', '2026-01-25 23:24:55'),
('3757c82b-ac71-414a-9a44-01995337b463', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/mehekemart.com\\/admin\\/order\\/4\",\"fas\":\"fa-file-alt\"}', '2025-11-30 17:01:36', '2025-11-28 18:12:18', '2025-11-30 17:01:36'),
('4428708a-7d82-4f5f-9a67-8b91ec9185a5', 'App\\Notifications\\StatusNotification', 'App\\User', 7, '{\"title\":\"New Product Rating!\",\"actionURL\":\"https:\\/\\/www.regularneed.com\\/product-detail\\/skino-onion-hair-oil-with-onion-blackseed-hair-regrowth-oil\",\"fas\":\"fa-star\"}', '2026-01-20 11:02:07', '2026-01-20 00:24:08', '2026-01-20 11:02:07'),
('54241f29-896e-4f99-962c-5bc83a97a41d', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/30\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-24 11:59:50', '2026-02-24 11:59:50'),
('5446d524-e80b-4b93-9ef3-26930f5d2f3e', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/mehekemart.com\\/admin\\/order\\/2\",\"fas\":\"fa-file-alt\"}', '2025-11-25 17:24:44', '2025-11-25 16:57:50', '2025-11-25 17:24:44'),
('592706d6-5fbd-4657-b72d-5c67fcaeadcc', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/11\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-24 21:36:36', '2026-01-24 21:36:36'),
('6c1cd589-e1ba-4852-a1f6-6ee711a15231', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/1\",\"fas\":\"fa-file-alt\"}', '2025-11-17 15:13:28', '2025-11-01 05:21:12', '2025-11-17 15:13:28'),
('6ce86240-8f89-403c-b4c8-4e54907d696a', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/33\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-24 14:20:20', '2026-02-24 14:20:20'),
('76046d9b-a53c-4351-8425-a75731921abf', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/dev.regularneed.com\\/admin\\/order\\/37\",\"fas\":\"fa-file-alt\"}', NULL, '2026-03-28 07:31:12', '2026-03-28 07:31:12'),
('77235c75-7395-4e96-bb29-a1100d5e5453', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/32\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-24 14:10:47', '2026-02-24 14:10:47'),
('84126e60-a70f-4b61-b642-4c459dfa4408', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/www.regularneed.com\\/admin\\/order\\/10\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-20 00:19:33', '2026-01-20 00:19:33'),
('853af7c1-0e90-4d39-bbf7-ad117a3cd0e4', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/29\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-24 11:56:54', '2026-02-24 11:56:54'),
('9540efcf-94cd-4eff-997c-62e6dfed1498', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/24\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-23 10:41:09', '2026-02-23 10:41:09'),
('9816a6e0-35a2-4491-9c9d-57d6717190ec', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/15\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 22:15:55', '2026-01-25 22:15:55'),
('9e36c9be-fec2-4f5e-8526-3561e001b8f5', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/13\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 21:05:16', '2026-01-25 21:05:16'),
('af68ffa2-2be2-464b-a806-cb88d00f3625', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/28\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-23 11:20:49', '2026-02-23 11:20:49'),
('be4cd82a-7791-49d6-b62d-b2740badacbd', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/mehekemart.com\\/admin\\/order\\/5\",\"fas\":\"fa-file-alt\"}', '2025-11-28 19:59:16', '2025-11-28 18:16:16', '2025-11-28 19:59:16'),
('c728a417-b28d-43e8-b1b9-667024e07a2d', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/27\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-23 11:18:34', '2026-02-23 11:18:34'),
('d8220a0f-babf-4e45-8368-8a5bc00c35b8', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/20\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 23:48:14', '2026-01-25 23:48:14'),
('dfb380d6-0489-48c8-a3e8-bd9ecb62f672', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/17\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 23:08:10', '2026-01-25 23:08:10'),
('e7c4dc26-8412-45f1-b6ea-692f9dded469', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/36\",\"fas\":\"fa-file-alt\"}', NULL, '2026-03-26 17:48:38', '2026-03-26 17:48:38'),
('eb179d4c-9c0f-4328-b062-6535c06666a3', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/www.regularneed.com\\/admin\\/order\\/25\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-23 10:43:16', '2026-02-23 10:43:16'),
('eb9feecf-7c31-425d-b5e0-18229d5504ac', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/mehekemart.com\\/admin\\/order\\/6\",\"fas\":\"fa-file-alt\"}', '2025-11-28 18:50:45', '2025-11-28 18:16:26', '2025-11-28 18:50:45'),
('ee694ef4-b659-4be5-a64e-832feece5e0e', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/16\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 22:20:05', '2026-01-25 22:20:05'),
('ee77827b-df6c-4012-bc83-305f5d3127b9', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/22\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-27 12:21:40', '2026-01-27 12:21:40'),
('ef27e025-1789-4439-bde0-364b9bb6b4be', 'App\\Notifications\\StatusNotification', 'App\\User', 7, '{\"title\":\"New Product Rating!\",\"actionURL\":\"https:\\/\\/regularneed.com\\/product-detail\\/skino-onion-hair-oil-with-onion-blackseed-hair-regrowth-oil\",\"fas\":\"fa-star\"}', '2026-01-28 21:05:49', '2026-01-26 14:36:13', '2026-01-28 21:05:49'),
('f0d298f6-4480-4930-b78c-d28a9a799a4b', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/26\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-23 10:57:16', '2026-02-23 10:57:16'),
('f17e744d-2afb-4235-b760-6523ff904491', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/34\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-25 10:56:54', '2026-02-25 10:56:54'),
('f4071dc4-a803-48a0-920e-db9794151db4', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/35\",\"fas\":\"fa-file-alt\"}', NULL, '2026-02-28 11:34:00', '2026-02-28 11:34:00'),
('f8d4ce5e-f870-485c-82ad-d50488de4110', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/12\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-25 20:59:45', '2026-01-25 20:59:45'),
('fe0f54f5-b3af-4287-9aa1-5b10aef483f3', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"https:\\/\\/regularneed.com\\/admin\\/order\\/21\",\"fas\":\"fa-file-alt\"}', NULL, '2026-01-26 14:26:26', '2026-01-26 14:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referral_id` int(11) DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL,
  `shipping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` enum('cod','paypal') NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `status` enum('new','process','delivered','cancel') NOT NULL DEFAULT 'new',
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `post_code` varchar(191) DEFAULT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `points_earned` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `referral_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `status`, `first_name`, `last_name`, `email`, `phone`, `country`, `post_code`, `address1`, `address2`, `points_earned`, `created_at`, `updated_at`) VALUES
(36, 'ORD-PNB18V2W1V', 11, NULL, 5850.00, NULL, NULL, 5850.00, 9, 'cod', 'unpaid', 'new', 'johurul', 'islam', 'johurul.sec@gmail.com', '01646829987', 'BD', '1215', 'Nakhalpara, Tejgaon Industrial area', NULL, 0, '2026-03-26 17:48:38', '2026-03-26 17:48:38'),
(37, 'ORD-0QR77RT6TW', NULL, NULL, 357.50, 3, NULL, 487.50, 1, 'cod', 'unpaid', 'new', 'johurul', 'islam', 'johurul.sec@gmail.com', '01646829987', 'BD', '1215', 'Nakhalpara, Tejgaon Industrial area', NULL, 0, '2026-03-28 07:31:12', '2026-03-28 07:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `summary` text NOT NULL,
  `description` longtext DEFAULT NULL,
  `quote` text DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `tags` varchar(191) DEFAULT NULL,
  `post_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `summary`, `description`, `quote`, `photo`, `tags`, `post_cat_id`, `post_tag_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cosmetics products', 'cosmetics-products', 'A short overview of popular cosmetics products in 2025', 'Detailed description of cosmetics products including skincare, makeup, and haircare.', 'Beauty begins the moment you decide to be yourself', 'https://images.unsplash.com/photo-1598528738936-c50861cc75a9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXR5JTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D', 'cosmetics', 1, NULL, 1, 'active', '2025-11-17 13:55:05', '2025-11-17 13:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cosmetics', 'cosmetics', 'active', '2025-11-17 13:52:21', '2025-11-17 13:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `replied_comment` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cosmetics', 'cosmetics', 'active', '2025-11-17 13:52:07', '2025-11-17 13:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `summary` text NOT NULL,
  `description` longtext DEFAULT NULL,
  `photo` text NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `size` varchar(191) DEFAULT 'M',
  `condition` enum('default','new','hot') NOT NULL DEFAULT 'default',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `photo`, `stock`, `size`, `condition`, `status`, `price`, `discount`, `is_featured`, `cat_id`, `child_cat_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(10, 'Cosrx Advanced Snail 92 All In One Cream - 100g Jar.    SKU: 8809416470016', 'cosrx-advanced-snail-92-all-in-one-cream-100g-cosrx-advanced-snail-92-all-in-one-cream-100g', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ১০০ গ্রাম (100g)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> সব ধরনের ত্বকের জন্য উপযোগী (বিশেষ করে ড্যামেজড ও ড্রাই স্কিন)।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> ৯২% স্নেইল সিক্রিশন ফিল্ট্রেট (Snail Secretion Filtrate)।</li>\r\n    <li><strong>মূল কাজ:</strong> ত্বক মেরামত (Repair), হাইড্রেটিং এবং অ্যান্টি-এজিং।</li>\r\n    <li><strong>বিশেষত্ব:</strong> এটি আঠালো নয় (Non-greasy) এবং ত্বকের ইলাস্টিসিটি বৃদ্ধি করে।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p>কোরিয়ান স্কিন কেয়ারের একটি লিজেন্ডারি পণ্য হলো <strong>Cosrx Advanced Snail 92 All In One Cream</strong>। এতে রয়েছে ৯২% বিশুদ্ধ স্নেইল মিউসিন (Snail Mucin), যা ত্বকের ভেতরের আদ্রতা ধরে রাখে এবং ড্যামেজ হয়ে যাওয়া ত্বককে দ্রুত মেরামত করতে সাহায্য করে। এটি একটি জেল-টাইপ ক্রিম যা ত্বকে খুব সহজেই মিশে যায়।</p>\r\n\r\n    <h4>মূল উপকারিতাসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>স্কিন রিপেয়ার:</strong> ব্রণের দাগ, লালচে ভাব (Redness) এবং সেনসিটিভ ত্বকের জ্বালাপোড়া কমিয়ে ত্বককে সুস্থ করে তোলে।</li>\r\n        <li><strong>গভীর হাইড্রেশন:</strong> এটি সারাদিন ত্বকে পানির অভাব পূরণ করে এবং ত্বককে রাখে নরম ও তুলতুলে।</li>\r\n        <li><strong>অ্যান্টি-এজিং:</strong> ত্বকের ফাইন লাইনস এবং বলিরেখা দূর করে ত্বককে টানটান ও তরুণ দেখায়।</li>\r\n        <li><strong>তৈলাক্ত ভাবহীন:</strong> এটি জেল বেসড হওয়ায় মুখে কোনো আঠালো ভাব বা ভারী অনুভূতি দেয় না।</li>\r\n        <li><strong>ন্যাচারাল গ্লো:</strong> নিয়মিত ব্যবহারে ত্বকের টেক্সচার উন্নত হয় এবং একটি হেলদি গ্লো ফিরে আসে।</li>\r\n    </ul>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন:</h4>\r\n    <ol>\r\n        <li>মুখ ভালোভাবে পরিষ্কার করার পর টোনার বা এসেন্স ব্যবহার করুন।</li>\r\n        <li>পরিমাণমতো ক্রিম নিয়ে পুরো মুখে আলতো করে লাগিয়ে নিন (চোখের চারপাশ এড়িয়ে)।</li>\r\n        <li>আঙুলের ডগা দিয়ে হালকা ট্যাপ (Tap) করুন যাতে ক্রিমটি ত্বকের গভীরে শোষিত হয়।</li>\r\n        <li>দিনের বেলা ব্যবহারের পর অবশ্যই সানস্ক্রিন ব্যবহার করবেন।</li>\r\n    </ol>\r\n\r\n    <p><em>বিশেষ দ্রষ্টব্য: এটি স্নেইল মিউসিন এসেন্সের সাথে ব্যবহার করলে আরও দ্রুত এবং কার্যকর ফলাফল পাওয়া যায়।</em></p>\r\n</div>', 'backend/img/product/1764358998_6929fb56d87bb.png', 3, '', 'new', 'active', 1680.00, 0.00, 1, 9, NULL, NULL, '2025-11-28 19:43:18', '2026-03-12 13:40:56'),
(11, 'The Face Shop Rice Water Bright Foaming Cleanser 150 ml.     SKU: 8809949485716', 'rice-water-bright-cleansing-foam-100ml', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ১৫০ মিলি (150ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> সব ধরনের ত্বকের জন্য উপযোগী (All Skin Types)।</li>\r\n    <li><strong>মূল কাজ:</strong> উজ্জ্বলতা বৃদ্ধি, মেকআপ রিমুভিং এবং ডিপ ক্লিনজিং।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> চালের পানি (Rice Water) এবং রাইস ব্র্যান অয়েল (Rice Bran Oil)।</li>\r\n    <li><strong>বিশেষত্ব:</strong> এটি ত্বককে ফর্সা ও সতেজ দেখায় এবং কোনো রুক্ষতা ছাড়াই পরিষ্কার করে।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p>কোরিয়ান স্কিন কেয়ারের জনপ্রিয় এবং ক্লাসিক একটি পণ্য হলো <strong>The Face Shop Rice Water Bright Foaming Cleanser</strong>। এটি একটি অত্যন্ত ক্রিমি ফর্মিং ক্লিনজার যা ত্বকের মরা কোষ এবং মেকআপের অবশিষ্টাংশ দূর করে ত্বককে মুহূর্তেই উজ্জ্বল এবং মসৃণ করে তোলে।</p>\r\n\r\n    <h4>মূল উপকারিতাসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>উজ্জ্বলতা বৃদ্ধি:</strong> চালের পানিতে রয়েছে প্রাকৃতিক ভিটামিন এ, বি এবং ই যা ত্বকের কালো ভাব দূর করে এবং গ্লো বাড়ায়।</li>\r\n        <li><strong>ডিপ ক্লিনজিং:</strong> এটি ত্বকের লোমকূপের ভেতরে জমে থাকা ধুলাবালি এবং মেকআপ খুব সহজে পরিষ্কার করে।</li>\r\n        <li><strong>হাইড্রেটিং ইফেক্ট:</strong> রাইস ব্র্যান অয়েল ব্যবহারের ফলে মুখ ধোয়ার পর ত্বক টানটান বা শুষ্ক অনুভব হয় না, বরং নরম থাকে।</li>\r\n        <li><strong>ক্রিমি টেক্সচার:</strong> এর ফোম অত্যন্ত ঘন এবং কোমল, যা সেনসিটিভ ত্বকের জন্য অত্যন্ত আরামদায়ক।</li>\r\n    </ul>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন:</h4>\r\n    <ol>\r\n        <li>হাতের তালুতে সামান্য পরিমাণ ক্লিনজার নিন।</li>\r\n        <li>অল্প পানি মিশিয়ে ঘন ফেনা (Foam) তৈরি করুন।</li>\r\n        <li>পুরো মুখে চক্রাকারে ম্যাসাজ করুন যাতে ময়লা ও তেল পরিষ্কার হয়ে যায়।</li>\r\n        <li>সবশেষে হালকা গরম বা সাধারণ পানি দিয়ে মুখ ধুয়ে ফেলুন।</li>\r\n    </ol>\r\n\r\n    <p><em>নোট: সেরা ফলাফলের জন্য এই ক্লিনজারটি ব্যবহারের পর একটি ভালো ময়েশ্চারাইজার ব্যবহার করুন। এটি ডাবল ক্লিনজিং এর সেকেন্ড স্টেপ হিসেবে দারুণ কাজ করে।</em></p>\r\n</div>', 'backend/img/product/1764359472_6929fd30989aa.png', 93, '', 'default', 'active', 1050.00, 0.00, 1, 11, NULL, NULL, '2025-11-28 19:51:12', '2026-03-12 13:11:09'),
(12, 'AXIS-Y Dark Spot Correcting Glow Serum – 50ml.    SKU: 8809634610034', 'axis-y-dark-spot-correcting-glow-serum-50ml', '<section style=\"font-family:Arial, sans-serif; line-height:1.7; color:#333;\">\r\n\r\n<h1 style=\"font-size:28px; font-weight:700; margin-bottom:15px;\">\r\nAxis-Y Dark Spot Correcting Glow Serum – Dark Spot ও Pigmentation দূর করে উজ্জ্বল ত্বক\r\n</h1>\r\n\r\n<p style=\"font-size:16px;\">\r\n<strong>Axis-Y Dark Spot Correcting Glow Serum</strong> হলো কোরিয়ান স্কিনকেয়ারের একটি জনপ্রিয় সিরাম যা ত্বকের \r\n<strong>ডার্ক স্পট, ব্রণর দাগ এবং হাইপারপিগমেন্টেশন</strong> কমাতে সাহায্য করে। \r\nএটি ত্বকের ভেতর থেকে স্কিনকে ব্রাইট, হাইড্রেটেড এবং ন্যাচারাল গ্লোইং করে তোলে।\r\n</p>\r\n\r\n<p style=\"font-size:16px;\">\r\nআপনার ত্বকে যদি ব্রণের দাগ, সান স্পট বা অসমান স্কিন টোন থাকে, তাহলে এই সিরামটি আপনার জন্য একটি \r\n<strong>পারফেক্ট স্কিনকেয়ার সলিউশন</strong> হতে পারে।\r\n</p>\r\n</ul>\r\n\r\n</section>', '<section style=\"font-family:Arial, sans-serif; line-height:1.7; color:#333;\">\r\n\r\n\r\n\r\n<h2 style=\"margin-top:20px; font-size:22px;\">🌿 Axis-Y Dark Spot Correcting Glow Serum কেন ব্যবহার করবেন?</h2>\r\n\r\n<ul style=\"padding-left:20px; font-size:16px;\">\r\n<li>ডার্ক স্পট ও পিগমেন্টেশন কমাতে সাহায্য করে</li>\r\n<li>স্কিন টোন ব্রাইট ও ইভেন করে</li>\r\n<li>ব্রণের দাগ হালকা করতে সাহায্য করে</li>\r\n<li>স্কিনকে গভীরভাবে হাইড্রেট করে</li>\r\n<li>হালকা ও দ্রুত শোষণযোগ্য ফর্মুলা</li>\r\n<li>সব ধরনের ত্বকের জন্য উপযোগী</li>\r\n</ul>\r\n\r\n<h2 style=\"margin-top:20px; font-size:22px;\">✨ Axis-Y Serum এর মূল উপকারিতা</h2>\r\n\r\n<ul style=\"padding-left:20px; font-size:16px;\">\r\n<li>Hyperpigmentation কমাতে সাহায্য করে</li>\r\n<li>Skin Brightening effect দেয়</li>\r\n<li>Natural Glow বাড়ায়</li>\r\n<li>Skin Texture Smooth করে</li>\r\n<li>Long term ব্যবহারে স্কিন আরও ক্লিয়ার হয়</li>\r\n</ul>\r\n\r\n<h2 style=\"margin-top:20px; font-size:22px;\">📌 ব্যবহারের নিয়ম</h2>\r\n\r\n<p style=\"font-size:16px;\">\r\n১-২ ফোঁটা সিরাম মুখে বা ডার্ক স্পটের জায়গায় লাগান।  \r\nতারপর হালকা ভাবে ম্যাসাজ করুন যাতে সিরামটি ত্বকে ভালোভাবে শোষিত হয়।  \r\nসকাল ও রাতে নিয়মিত ব্যবহার করলে ভালো ফল পাওয়া যায়।\r\n</p>\r\n\r\n<h2 style=\"margin-top:20px; font-size:22px;\">💎 কারা ব্যবহার করতে পারবেন?</h2>\r\n\r\n<ul style=\"padding-left:20px; font-size:16px;\">\r\n<li>যাদের মুখে ব্রণের দাগ রয়েছে</li>\r\n<li>যাদের ত্বকে ডার্ক স্পট বা পিগমেন্টেশন আছে</li>\r\n<li>যারা স্কিন ব্রাইট করতে চান</li>\r\n<li>যারা কোরিয়ান স্কিনকেয়ার পণ্য ব্যবহার করতে পছন্দ করেন</li>\r\n</ul>\r\n\r\n<h2 style=\"margin-top:20px; font-size:22px;\">🛒 কেন আমাদের থেকে কিনবেন?</h2>\r\n\r\n<ul style=\"padding-left:20px; font-size:16px;\">\r\n<li>১০০% অরিজিনাল কোরিয়ান প্রোডাক্ট</li>\r\n<li>বাংলাদেশে দ্রুত ডেলিভারি</li>\r\n<li>ক্যাশ অন ডেলিভারি সুবিধা</li>\r\n<li>বিশ্বাসযোগ্য E-commerce সার্ভিস</li>\r\n</ul>\r\n\r\n</section>', 'backend/img/product/1764359872_6929fec08855f.png', 18, '', 'hot', 'active', 1350.00, 0.00, 1, 9, NULL, NULL, '2025-11-28 19:57:52', '2026-03-12 12:26:08'),
(13, 'Beaute Glutathione Brightening Tone Up Cream 45 ml.     SKU: 8809715721574', 'beaute-melasma-x-glutathione-brightening-tone-up-cream-45ml', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ৪৫ মিলি (45ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> সব ধরনের ত্বকের জন্য উপযোগী (All Skin Types)।</li>\r\n    <li><strong>মূল কাজ:</strong> ইনস্ট্যান্ট ব্রাইটেনিং, স্কিন টোন ইভেন করা এবং হাইড্রেটিং।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> গ্লুটাথিয়ন (Glutathione) এবং নিয়াসিনামাইড (Niacinamide)।</li>\r\n    <li><strong>বিশেষত্ব:</strong> এটি ন্যাচারাল মেকআপ লুক দেয় এবং ত্বককে উজ্জ্বল রাখে।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p>ত্বককে তৎক্ষণাৎ উজ্জ্বল এবং লাবণ্যময় করে তুলতে <strong>Beaute Glutathione Brightening Tone Up Cream</strong> একটি জাদুকরী পণ্য। এটি ব্যবহারের সাথে সাথেই ত্বকে একটি ন্যাচারাল গ্লো নিয়ে আসে এবং নিয়মিত ব্যবহারে ত্বকের কালো দাগ ও পিগমেন্টেশন কমাতে সাহায্য করে।</p>\r\n\r\n    <h4>মূল উপকারিতাসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>ইনস্ট্যান্ট টোন-আপ:</strong> এটি লাগানোর সাথে সাথে ত্বকের রং এক শেড উজ্জ্বল দেখায় এবং মেকআপ ছাড়াই একটি ফ্রেশ লুক দেয়।</li>\r\n        <li><strong>গ্লুটাথিয়ন পাওয়ার:</strong> এতে থাকা গ্লুটাথিয়ন ত্বকের মেলানিন উৎপাদন কমিয়ে ভেতর থেকে ত্বক ফর্সা করতে সাহায্য করে।</li>\r\n        <li><strong>ডার্ক স্পট কারেকশন:</strong> নিয়াসিনামাইড এবং বিভিন্ন ভিটামিন ত্বকের রোদে পোড়া দাগ ও ব্রণের দাগ দূর করে।</li>\r\n        <li><strong>লাইটওয়েট ফর্মুলা:</strong> এটি আঠালো নয় এবং ত্বকের সাথে খুব দ্রুত মিশে যায়, যা সারাদিন আরামদায়ক অনুভূতি দেয়।</li>\r\n        <li><strong>ময়েশ্চারাইজিং:</strong> ত্বককে হাইড্রেটেড রাখে এবং ড্রাইনেস দূর করে।</li>\r\n    </ul>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন:</h4>\r\n    <ol>\r\n        <li>মুখ ভালোভাবে পরিষ্কার করে টোনার বা সিরাম ব্যবহার করুন।</li>\r\n        <li>পরিমাণমতো টোন-আপ ক্রিম নিয়ে সারা মুখে ছোট ছোট ফোঁটায় লাগিয়ে নিন।</li>\r\n        <li>আঙুলের ডগা দিয়ে আলতোভাবে ব্লেন্ড করুন যতক্ষণ না এটি ত্বকের সাথে মিশে যাচ্ছে।</li>\r\n        <li>এটি ডে-ক্রিম হিসেবে বা মেকআপের বেজ হিসেবেও ব্যবহার করা যায়।</li>\r\n    </ol>\r\n\r\n    <p><em>টিপস: ভালো ফলাফলের জন্য এটি দিনের বেলায় সানস্ক্রিনের নিচে বা সরাসরি ব্যবহার করতে পারেন।</em></p>\r\n</div>', 'backend/img/product/1764519364_692c6dc441d7c.png', 14, '', 'hot', 'active', 850.00, 0.00, 1, 9, NULL, NULL, '2025-11-30 16:16:04', '2026-03-12 13:07:27'),
(14, 'COSRX Salicylic Acid Daily Gentle Cleanser 50ml.    SKU: 8809598453661', 'cosrx-salicylic-acid-daily-gentle-cleanser-50ml', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ৫০ মিলি (50ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> তৈলাক্ত এবং ব্রণপ্রবণ (Oily & Acne-prone) ত্বকের জন্য সেরা।</li>\r\n    <li><strong>মূল কাজ:</strong> ব্রণ কমানো, পোরস পরিষ্কার করা এবং ব্ল্যাকহেডস দূর করা।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> ০.৫% স্যালিসাইলিক অ্যাসিড (BHA) এবং বোটানিক্যাল ইনগ্রেডিয়েন্টস।</li>\r\n    <li><strong>বিশেষত্ব:</strong> ত্বককে অতিরিক্ত শুষ্ক না করেই ব্রণের জীবাণু ধ্বংস করে।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p>ব্রণ এবং অতিরিক্ত তৈলাক্ত ত্বকের সমস্যা থেকে মুক্তি পেতে <strong>Cosrx Salicylic Acid Daily Gentle Cleanser</strong> একটি অত্যন্ত কার্যকর ফেসওয়াশ। এটি বিশেষভাবে তৈরি করা হয়েছে যাতে ত্বকের গভীরে গিয়ে ময়লা, অতিরিক্ত তেল এবং সিবাম দূর করতে পারে।</p>\r\n\r\n    <h4>মূল উপকারিতাসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>ব্রণ প্রতিরোধ:</strong> এতে থাকা ০.৫% স্যালিসাইলিক অ্যাসিড ব্রণের জীবাণু ধ্বংস করে এবং নতুন ব্রণ হওয়া রোধ করে।</li>\r\n        <li><strong>পোরস ক্লিনজিং:</strong> এটি লোমকূপের ভেতরে জমে থাকা ব্ল্যাকহেডস এবং হোয়াইটহেডস পরিষ্কার করে ত্বককে মসৃণ করে।</li>\r\n        <li><strong>সিবাম কন্ট্রোল:</strong> এটি ত্বকের অতিরিক্ত তেল নিয়ন্ত্রণ করে মুখকে সারাদিন সতেজ রাখে।</li>\r\n        <li><strong>বোটানিক্যাল ফর্মুলা:</strong> এতে রয়েছে ভেষজ উপাদান যা ত্বককে শান্ত রাখে এবং প্রদাহ বা লালচে ভাব কমায়।</li>\r\n    </ul>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন:</h4>\r\n    <ol>\r\n        <li>হালকা পানি দিয়ে মুখ ভিজিয়ে নিন।</li>\r\n        <li>অল্প পরিমাণ ক্লিনজার হাতে নিয়ে ফেনা তৈরি করুন।</li>\r\n        <li>বিশেষ করে ব্রণের জায়গা এবং টি-জোনে (কপাল, নাক ও থুতনি) আলতোভাবে ম্যাসাজ করুন।</li>\r\n        <li>কুসুম গরম বা সাধারণ পানি দিয়ে মুখ ধুয়ে ফেলুন।</li>\r\n    </ol>\r\n\r\n    <p><em>নোট: এটি একটি এক্সফোলিয়েটিং ক্লিনজার, তাই ব্যবহারের পর ভালো মানের ময়েশ্চারাইজার এবং দিনে সানস্ক্রিন ব্যবহার করা জরুরি।</em></p>\r\n</div>', 'backend/img/product/1764519785_692c6f69da834.png', 3, '', 'hot', 'active', 680.00, 0.00, 1, 9, NULL, NULL, '2025-11-30 16:23:05', '2026-03-12 12:58:54'),
(15, 'COSRX Low Ph Good Morning Gel Cleanser 50ml.SKU: 8809598451766', 'cosrx-low-ph-good-morning-gel-cleanser-50ml', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ৫০ মিলি (50ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> সকল ধরনের ত্বকের জন্য উপযোগী (বিশেষ করে সেনসিটিভ স্কিন)।</li>\r\n    <li><strong>পিএইচ লেভেল:</strong> ৫.৩০ – ৬.৩০ (ত্বকের প্রাকৃতিক পিএইচ-এর কাছাকাছি)।</li>\r\n    <li><strong>মূল উপকারিতা:</strong> গভীর পরিষ্কার, অয়েল কন্ট্রোল এবং হাইড্রেটিং ফিনিশ।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> টি-ট্রি অয়েল (Tea Tree Oil) এবং ন্যাচারাল বিএইচএ (BHA)।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p>আপনার ত্বককে সতেজ এবং স্বাস্থ্যোজ্জ্বল রাখতে <strong>COSRX Low pH Good Morning Gel Cleanser</strong> একটি অনন্য সমাধান। এটি একটি মৃদু জেল ক্লিনজার যা ত্বকের প্রাকৃতিক তেল বজায় রেখে গভীর থেকে ময়লা এবং মেকআপ দূর করে।</p>\r\n\r\n    <h4>কেন এটি ব্যবহার করবেন?</h4>\r\n    <ul>\r\n        <li><strong>লো পিএইচ (Low pH):</strong> এটি ত্বকের প্রাকৃতিক প্রোটেক্টিভ ব্যারিয়ার ঠিক রাখে, ফলে মুখ ধোয়ার পর ত্বক শুষ্ক হয়ে যায় না।</li>\r\n        <li><strong>অয়েল কন্ট্রোল:</strong> এতে থাকা টি-ট্রি অয়েল ত্বকের অতিরিক্ত তেল নিয়ন্ত্রণ করে এবং পোরস পরিষ্কার রাখতে সাহায্য করে।</li>\r\n        <li><strong>এক্সফোলিয়েশন:</strong> ন্যাচারাল বিএইচএ উপাদান ত্বকের মৃত কোষ দূর করে ত্বককে মসৃণ করে তোলে।</li>\r\n        <li><strong>আরামদায়ক অনুভূতি:</strong> এতে কোনো ক্ষতিকারক কেমিক্যাল নেই, যা সেনসিটিভ ত্বকের জ্বালাপোড়া কমায়।</li>\r\n    </ul>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন:</h4>\r\n    <ol>\r\n        <li>মুখ পানি দিয়ে হালকা ভিজিয়ে নিন।</li>\r\n        <li>সামান্য পরিমাণ জেল হাতে নিয়ে ফেনা তৈরি করুন।</li>\r\n        <li>পুরো মুখে চক্রাকারে (Circular motion) ম্যাসাজ করুন।</li>\r\n        <li>হালকা পানি দিয়ে মুখ ভালোভাবে ধুয়ে ফেলুন।</li>\r\n    </ol>\r\n\r\n    <p><em>সেরা ফলাফলের জন্য প্রতিদিন সকালে এবং রাতে ব্যবহারের পরামর্শ দেওয়া হলো।</em></p>\r\n</div>', 'backend/img/product/1764520041_692c706964eb6.png', 15, '', 'hot', 'active', 650.00, 0.00, 1, 9, NULL, NULL, '2025-11-30 16:27:21', '2026-03-12 12:46:39'),
(16, 'Vaseline Intensive Care Vitamin B3 Body Oil', 'vaseline-intensive-care-vitamin-b3-body-oil', '<p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: medium;\">▶️ Order Now &amp; Get The Delivery🚗Within 3 Working Days.</p><p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: medium;\">▶️100% Authentic Prodcut or get refund (Easy Return Policy).</p><p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: medium;\">▶️ 100% Authentic Product.</p>', '<p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: medium;\">The&nbsp;<span style=\"font-weight: bolder;\">Vaseline Intensive Care Vitamin B3 Body Oil</span>&nbsp;is a nourishing and fast-absorbing body oil designed to deeply moisturize and revitalize your skin. Enriched with Vitamin B3, it helps to even out skin tone and improve the skin’s natural barrier, leaving your skin feeling soft, smooth, and radiant. This lightweight formula absorbs quickly without feeling greasy, making it perfect for daily use to keep your skin hydrated and glowing.</p><h4 style=\"color: rgb(85, 85, 85); margin-bottom: 0.5em; text-rendering: optimizespeed; width: 1050px; font-size: 1.125em; font-family: Lato, sans-serif; font-weight: 700;\">Key Features:</h4><ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: medium;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Vitamin B3 Enriched:</span>&nbsp;Helps improve skin tone and texture, promoting a radiant, even complexion.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Deep Moisturization:</span>&nbsp;Provides intense hydration, leaving skin feeling soft and supple.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Lightweight &amp; Non-Greasy:</span>&nbsp;Absorbs quickly into the skin without leaving an oily residue.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Suitable for All Skin Types:</span>&nbsp;Gentle enough for dry, sensitive, and normal skin types.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Restores Skin Barrier:</span>&nbsp;Strengthens the skin’s natural moisture barrier for long-lasting hydration.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Daily Use Formula:</span>&nbsp;Ideal for everyday application, helping maintain smooth and nourished skin.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Dermatologically Tested:</span>&nbsp;Safe for sensitive skin and formulated to minimize irritation.</li></ul><h4 style=\"color: rgb(85, 85, 85); margin-bottom: 0.5em; text-rendering: optimizespeed; width: 1050px; font-size: 1.125em; font-family: Lato, sans-serif; font-weight: 700;\">How to Use:</h4><ol style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: medium;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Apply Generously:</span>&nbsp;After showering, massage the body oil onto damp skin to lock in moisture.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Use Daily:</span>&nbsp;For best results, use daily, focusing on dry areas like elbows, knees, and heels.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\"><span style=\"font-weight: bolder;\">Reapply as Needed:</span>&nbsp;Reapply throughout the day to keep your skin soft and hydrated.</li></ol><p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: medium;\">The&nbsp;<span style=\"font-weight: bolder;\">Vaseline Intensive Care Vitamin B3 Body Oil</span>&nbsp;is an essential addition to your skincare routine, providing deep moisture and skin tone improvement with the power of Vitamin B3. Perfect for daily use, it leaves your skin feeling smooth, hydrated, and beautifully radiant all day long.</p>', 'backend/img/product/1764520387_692c71c37821c.png', 0, '', 'hot', 'active', 950.00, 10.00, 1, 11, NULL, NULL, '2025-11-30 16:33:07', '2026-01-20 14:42:08'),
(17, 'BIOAQUA Nenhong Pink Cherry Cream- 30ml', 'bioaqua-nenhong-pink-cherry-cream-30ml', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; overflow: hidden; column-count: 2; column-gap: 32px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\"><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">Product Type: Lip &amp; Body Whitening Cream</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">Brand: Bioaqua</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">Net Weight: 30g</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">Use: Lip &amp; Body</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">Shelf Life; 3 Years</li><li data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i1.68bb7d64YSzMYh\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">Ingredient: Mineral Oil, Styrene/Butadiene Copolymer, Isostearic Acid, Isopropyl Myristate</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 10px; padding: 0px; list-style-position: initial; list-style-image: initial; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><li style=\"margin: 0px; padding: 0px;\">Product Type: Lip &amp; Body Whitening Cream</li><li style=\"margin: 0px; padding: 0px;\">Brand: Bioaqua</li><li style=\"margin: 0px; padding: 0px;\">Net Weight: 30g</li><li style=\"margin: 0px; padding: 0px;\">Use: Lip &amp; Body</li><li style=\"margin: 0px; padding: 0px;\">Shelf Life; 3 Years</li><li data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i2.68bb7d64YSzMYh\" style=\"margin: 0px; padding: 0px;\">Ingredient: Mineral Oil, Styrene/Butadiene Copolymer, Isostearic Acid, Isopropyl Myristate</li></ul>', 'backend/img/product/1764520600_692c7298ea2c5.png', 0, '', 'hot', 'active', 300.00, 10.00, 1, 11, NULL, NULL, '2025-11-30 16:36:40', '2026-01-20 14:41:54'),
(18, 'Dr.Althea 345 Relief Cream 50 ml.    SKU: 8809447256221', 'fairy-scrub-gluta-soap', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ৫০ মিলি (50ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> সব ধরনের ত্বক (বিশেষ করে একনি-প্রোন এবং সেনসিটিভ স্কিন)।</li>\r\n    <li><strong>মূল কাজ:</strong> দাগ দূর করা (Post-acne marks), স্কিন ব্যারিয়ার মেরামত এবং লালচে ভাব কমানো।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> নিয়াসিনামাইড, প্যানথেনল এবং ওপাঙ্কিয়া ফিকাস-ইন্ডিকা স্টেম এক্সট্র্যাক্ট।</li>\r\n    <li><strong>বিশেষত্ব:</strong> এটি একটি লাইটওয়েট জেল-ক্রিম যা ত্বকের জ্বালাপোড়া শান্ত করে।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p><strong>Dr. Althea 345 Relief Cream</strong> একটি অত্যন্ত কার্যকরী রিজেনারেটিং জেল-ক্রিম, যা বিশেষভাবে তৈরি করা হয়েছে ত্বকের জেদি দাগ দূর করতে এবং ক্ষতিগ্রস্ত স্কিন ব্যারিয়ার মেরামত করতে। এর নাম \'345\' দেওয়ার কারণ হলো এটি প্রধান ৩টি উপাদান দিয়ে তৈরি, ৪টি প্রধান কাজ করে এবং ৫টি অর্গানিক উপাদান সমৃদ্ধ।</p>\r\n\r\n    <h4>মূল উপকারিতাসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>দাগ দূরীকরণ:</strong> ব্রণের পরবর্তী লালচে বা কালো দাগ (Post-inflammatory hyperpigmentation) দ্রুত হালকা করতে সাহায্য করে।</li>\r\n        <li><strong>স্কিন ব্যারিয়ার রিপেয়ার:</strong> প্যানথেনল এবং সিরামাইড ত্বককে ভেতর থেকে মজবুত করে এবং বাইরের দূষণ থেকে রক্ষা করে।</li>\r\n        <li><strong>সুদিং ইফেক্ট:</strong> সেনসিটিভ ত্বকের চুলকানি, জ্বালাপোড়া এবং লালচে ভাব (Redness) তাৎক্ষণিকভাবে কমিয়ে আনে।</li>\r\n        <li><strong>তৈলাক্ত ভাবহীন হাইড্রেশন:</strong> জেল টেক্সচার হওয়ার কারণে এটি খুব দ্রুত ত্বকে মিশে যায় এবং কোনো প্রকার আঠালো ভাব ছাড়াই ত্বককে ময়েশ্চারাইজড রাখে।</li>\r\n    </ul>\r\n\r\n    <h4>কেন এটি আপনার জন্য সেরা?</h4>\r\n    <p>এটি শুধুমাত্র একটি ময়েশ্চারাইজার নয়, বরং একটি ট্রিটমেন্ট ক্রিম। এতে থাকা নিয়াসিনামাইড ত্বকের রং উজ্জ্বল করে এবং পোরস সঙ্কুচিত করতে সাহায্য করে। শুষ্ক, তৈলাক্ত কিংবা কম্বিনেশন—সব ধরনের ত্বকেই এটি দারুণ মানিয়ে যায়।</p>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন:</h4>\r\n    <ol>\r\n        <li>মুখ ভালোভাবে পরিষ্কার করে টোনার বা সিরাম ব্যবহার করুন।</li>\r\n        <li>পরিমাণমতো ক্রিম নিয়ে সারা মুখে সমানভাবে লাগিয়ে নিন।</li>\r\n        <li>হালকা হাতে ম্যাসাজ করুন যাতে এটি ত্বকের সাথে পুরোপুরি মিশে যায়।</li>\r\n        <li>ভালো ফলাফলের জন্য সকালে এবং রাতে নিয়মিত ব্যবহার করুন।</li>\r\n    </ol>\r\n\r\n    <p><em>টিপস: রোদে পোড়া ত্বকে বা ব্রণের জ্বালাপোড়া কমাতে এটি একটি জাদুকরী সমাধান হিসেবে কাজ করে।</em></p>\r\n</div>', 'backend/img/category/1773312029_69b2981d52baa.jpg', 1, '', 'hot', 'active', 2250.00, 0.00, 0, 9, NULL, NULL, '2025-11-30 16:39:59', '2026-03-12 14:40:29'),
(19, 'Aceso Body Lotion | Aceso হোয়াইটেনিং বডি লোশন', 'aceso-body-lotion-aceso-hozaitening-bdi-losn', '<ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em; color: rgb(119, 119, 119); font-family: sans-serif; font-size: medium;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">ত্বককে নরম, মসৃণ এবং আর্দ্র রাখে</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">নিয়মিত ব্যবহারে ত্বকের উজ্জ্বলতা বৃদ্ধি করে</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">কালো দাগ, রোদে পোড়া ভাব এবং হাইপারপিগমেন্টেশন কমায়</li></ul>', '<p style=\"margin-bottom: 1.3em; color: rgb(119, 119, 119); font-family: sans-serif; font-size: medium;\"><span style=\"font-weight: bolder;\">Aceso Whitening Body Lotion</span></p><ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em; color: rgb(119, 119, 119); font-family: sans-serif; font-size: medium;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Product type: Body Lotion</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Brand: Aceso</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Reduces dark spots, sun tan, and hyperpigmentation</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Keeps the skin soft, smooth, and moisturized</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Enhances skin radiance with regular use</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Helps maintain a youthful, glowing complexion</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Improves texture and elasticity of the skin</li></ul>', 'backend/img/product/1764521029_692c744567b1c.png', 0, '', 'default', 'active', 400.00, 10.00, 1, 11, NULL, NULL, '2025-11-30 16:43:49', '2026-01-20 14:41:14'),
(20, 'SKINO STRAWBERRY SCENTED SHOWER GEL 220ML', 'skino-strawberry-scented-shower-gel-220ml', '<p><span style=\"font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\">The body wash contains the scent of fresh strawberries, which creates a pleasant aroma and enhances your shower experience.</span></p>', '<p><span style=\"font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\">The composition includes a combination of natural extracts and moisturizing chemicals that work together to soften and nourish the skin thoroughly. It contains no silicones, parabens, or mineral oils. The gel-based solution is soft and non-drying, making it ideal for all skin types.</span></p>', 'backend/img/product/1764521300_692c755438bb9.png', 0, '', 'new', 'active', 250.00, 10.00, 1, 11, NULL, NULL, '2025-11-30 16:48:20', '2026-01-20 14:40:55'),
(21, 'SKINO SOFT CARE HYDRATING BODY LOTION 200ML', 'skino-soft-care-hydrating-body-lotion-200ml', '<p><span style=\"font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\">Soft Care Hydrating Body Lotion provides deep moisture while softening skin. Its lightweight formula absorbs quickly, making skin smooth, nourished, and softer. It is perfect for daily use, suits all skin types, and keeps skin soft and healthy.</span></p>', '<p>SKINO SOFT CARE HYDRATING BODY LOTION 200ML</p>', 'backend/img/product/1764521477_692c7605f32bf.png', 0, '', 'default', 'active', 350.00, 10.00, 0, 11, NULL, 16, '2025-11-30 16:51:17', '2026-01-20 14:40:10'),
(22, 'Lemonvate Cream 30 gm', 'lemonvate-cream-30-gm', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><span style=\"margin: 0px; padding: 0px;\">Product details of Lemonvate Cream 30 gm</span></p><p data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i0.661b2312Az63Tx\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><span style=\"margin: 0px; padding: 0px;\">Lemonvate Dryness Skin Lighteners Moisturizes and nourish skin while evening out skin tone, restoring clarity and radiance. Softens and smoothes skin. Recommendation: This gel cream reduces dark spots and helps fight pigmentation, smoothing and rejuvenating an even skin tone</span></p>', '<p><br class=\"Apple-interchange-newline\"><span style=\"color: rgb(33, 33, 33); font-family: Roboto-Medium; text-wrap-mode: nowrap;\">Specifications of Lemonvate Cream 30 gm</span></p>', 'backend/img/product/1764521642_692c76aae680f.png', 0, '', 'default', 'active', 450.00, 10.00, 0, 11, NULL, NULL, '2025-11-30 16:54:02', '2026-01-20 14:39:52'),
(23, 'skin\'O Keratin Smooth Repair Shampoo - 200 ml', 'skino-keratin-smooth-repair-shampoo-200-ml', '<p><span style=\"font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\">skinO Keratin Smooth Repair Shampoo thoroughly cleanses from roots to ends. It detangles, leaving hair smooth and soft. Suitable for all hair types, it is particularly beneficial for damaged hair.</span></p>', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">Benefit:</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; display: block;\"></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px;\">- Repairs damaged hair </span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; display: block;\"></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px;\">- Strengthens hair </span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; display: block;\"></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px;\">- Makes hair smooth and soft</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; display: block;\"></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">How to use:</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; display: block;\"></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i2.54aa6394N5b0Xa\" style=\"margin: 0px; padding: 0px;\">Apply shampoo to wet hair and gently massage to create a lather. Then rinse your hair thoroughly with water to clean it. Use conditioner after every shampoo to reduce hair roughness and achieve smooth hair. </span></p>', 'backend/img/product/1764521905_692c77b14af64.png', 0, '', 'default', 'active', 350.00, 10.00, 0, 11, NULL, 16, '2025-11-30 16:58:25', '2026-01-20 14:39:32'),
(24, 'Hairdressing Wand – সাদা চুল ঢাকার হেয়ার কভারিং স্টিক', 'skino-onion-hair-oil-with-onion-blackseed-hair-regrowth-oil', '<p><font color=\"#49454f\" face=\"Montserrat\"><span style=\"font-size: 14px;\">মাত্র কয়েক সেকেন্ডে সাদা ও পাকা চুল ঢাকার সহজ ও ঝামেলাহীন সমাধান। অফিস, ফরমাল ও দৈনন্দিন ব্যবহারের জন্য উপযোগী।</span></font></p>', '<p><br class=\"Apple-interchange-newline\"><span style=\"color: rgb(73, 69, 79); font-family: Montserrat; font-size: 14px;\">Hairdressing Wand হলো একটি আধুনিক ও ব্যবহার-সহজ হেয়ার কভারিং স্টিক, যা খুব দ্রুত সাদা বা পাকা চুল ঢেকে দেয়। কোনো ধরনের মিক্সিং, ডাই বা দীর্ঘ সময় অপেক্ষার প্রয়োজন নেই। সরাসরি চুলে লাগালেই প্রাকৃতিক রঙের মতো দেখায়।\r\n\r\nএই হেয়ারড্রেসিং ওয়ান্ডটি বিশেষভাবে তৈরি করা হয়েছে হেয়ারলাইন, রুটস, সাইড বার্ন ও ছড়িয়ে থাকা সাদা চুল ঢাকার জন্য। কমপ্যাক্ট ও হালকা হওয়ায় সহজেই ব্যাগে বহন করা যায়। অফিস, মিটিং, পার্টি কিংবা যেকোনো ফরমাল অনুষ্ঠানে যাওয়ার আগে এটি আপনার আত্মবিশ্বাস বাড়াবে।\r\n\r\nপুরুষ ও মহিলা উভয়ের জন্যই এটি নিরাপদ এবং নিয়মিত ব্যবহার উপযোগী।\r\n\r\n⭐ Key Features (মূল বৈশিষ্ট্য)\r\n\r\n✔ মাত্র কয়েক সেকেন্ডে সাদা চুল ঢেকে দেয়\r\n\r\n✔ কোনো মিক্সিং বা ডাই করার ঝামেলা নেই\r\n\r\n✔ প্রাকৃতিক ও স্মার্ট লুক প্রদান করে\r\n\r\n✔ অফিস ও ফরমাল ব্যবহারের জন্য উপযোগী\r\n\r\n✔ ছোট ও কমপ্যাক্ট – সহজে বহনযোগ্য\r\n\r\n✔ পুরুষ ও মহিলা উভয়ের জন্য উপযোগী\r\n\r\n🧴 How to Use (ব্যবহার পদ্ধতি)\r\n\r\nঢাকনা খুলুন\r\n\r\nসাদা বা পাকা চুলের উপর হালকা ভাবে লাগান\r\n\r\nপ্রয়োজন অনুযায়ী সমানভাবে ব্যবহার করুন\r\n\r\nকয়েক সেকেন্ড অপেক্ষা করুন – প্রস্তুত!\r\n\r\n📦 Product Details (পণ্যের তথ্য)\r\n\r\nProduct Type: Hair Covering Stick\r\n\r\nNet Weight: 20g\r\n\r\nSuitable For: Men & Women\r\n\r\nUsage Area: Hairline, Roots, Side Hair\r\n\r\nColor: Natural Hair Shade\r\n\r\n⚠️ Caution (সতর্কতা)\r\n\r\nচোখে লাগানো থেকে বিরত থাকুন\r\nশিশুদের নাগালের বাইরে রাখুন\r\nব্যবহারের পর ঢাকনা ভালোভাবে বন্ধ করুনhairdressing wand, hair covering stick, সাদা চুল ঢাকার স্টিক, hair color stick, grey hair solution, instant hair cover.</span></p>', 'backend/img/category/1768903212_696f522c5fe13.jpg', 45, '', 'default', 'active', 650.00, 45.00, 0, 10, NULL, NULL, '2025-11-30 17:20:33', '2026-02-20 14:46:56'),
(25, 'essence I love Extreme Crazy Volume maskara', 'essence-i-love-extreme-crazy-volume-maskara', '<p><span style=\"color: rgb(107, 114, 128); font-family: Montserrat; font-size: medium;\">Extreme volume just got crazy! the sister to i love extreme mascara, this crazy volume mascara with a unique elastomer brush provides intense, defined volume! opthalmologically tested.</span></p>', '<p style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding: 0px; margin-right: 0px; margin-bottom: 1.3em; margin-left: 0px; font-family: Montserrat; color: rgb(107, 114, 128); font-size: medium;\">Extreme volume just got crazy! the sister to i love extreme mascara, this crazy volume mascara with a unique elastomer brush provides intense, defined volume! opthalmologically tested.</p><p style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding: 0px; margin-right: 0px; margin-bottom: 1.3em; margin-left: 0px; font-family: Montserrat; color: rgb(107, 114, 128); font-size: medium;\"><span style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding: 0px; margin: 0px; font-weight: 600 !important;\">How to use:</span><br style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding: 0px; margin: 0px;\">starting at the base of the lash line, wiggle wand back and forth, adding as many coats as you like until desired length and volume is achieved.</p>', 'backend/img/product/1764608460_692dc9ccc993b.png', 0, '', 'default', 'active', 650.00, 10.00, 0, 8, NULL, NULL, '2025-12-01 17:01:00', '2026-01-20 14:39:13'),
(26, 'TUTU TIME Sweet Dream Makeup Palette', 'tutu-time-sweet-dream-makeup-palette', '<ul data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i1.532b5fbaN65SNj\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 16px; padding: 0px; list-style-position: initial; list-style-image: initial; overflow: hidden; column-count: 2; column-gap: 32px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><li data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i2.532b5fbaN65SNj\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Palette Includes: Eyeshadows, lipsticks, eyebrow powders, blushers, highlighters, and a built-in mirror</span></div></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i0.532b5fbaN65SNj\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Finish: Matte, shimmer, and satin</span></div></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Packaging: Compact and travel-friendly design</span></div></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Skin Type: Suitable for all skin types</span></div></li></ul>', '<p><br></p>', 'backend/img/product/1764610077_692dd01d79657.png', 0, '', 'default', 'active', 399.00, 10.00, 0, 8, NULL, NULL, '2025-12-01 17:27:57', '2026-01-20 14:38:58'),
(27, 'Ponds Perfect Radiance BB Translucent Powder', 'ponds-perfect-radiance-bb-translucent-powder', '<h2 style=\"color: rgb(85, 85, 85); margin-bottom: 0.5em; text-rendering: optimizespeed; width: 1140px; line-height: 1.3; font-size: 1.6em; font-family: Lato, sans-serif; font-weight: 700;\"><span style=\"font-weight: bolder;\">Ponds BB Translucent Powder:</span></h2><p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif;\">Ponds perfect radiance bb translucent powder can brighten the skin and avoid the skin getting greasy. When you have MAGIC POWDER BB, it is not a dream to create a translucent skin with a healthy glow in summer.</p>', '<p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif;\"><span style=\"font-weight: bolder;\">Product Features:</span></p><ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">It is waterproof that can oil-control in effect. At the same time, it can boost skin luster and provide sun protection to the skin all the time.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Thin texture reduces the burden to the skin.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">With a light floral scent, it brings you a comfortable makeup feeling all day long.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Made in Thailand</li></ul><p style=\"margin-bottom: 1.3em; color: rgb(74, 74, 74); font-family: Lato, sans-serif;\"><span style=\"font-weight: bolder;\">General Information:</span>&nbsp;This website is operating by&nbsp;<a href=\"http://www.easydhakabd.com/\" target=\"_blank\" rel=\"noopener\" style=\"touch-action: manipulation; color: rgb(51, 72, 98);\">Easy Dhaka</a>&nbsp;They are the authorised distributor for&nbsp;<a href=\"https://focallurebangladesh.com/focallure-bangladesh/\" target=\"_blank\" rel=\"noopener\" style=\"touch-action: manipulation; color: rgb(51, 72, 98);\">Focallure</a>&nbsp;and PinkFlash Cosmetics. Focallure Bangladesh accepts all type of Electronic Payment. We also accept Cash On Delivery System.</p>', 'backend/img/product/1764610195_692dd093c11f4.png', 0, '', 'new', 'active', 350.00, 10.00, 0, 8, NULL, NULL, '2025-12-01 17:29:55', '2026-01-20 14:38:43'),
(28, 'VASLINE Lip Therapy Rosy Lips with Rose & Almond Oil 20g/ 0.70 oz.', 'vasline-lip-therapy-rosy-lips-with-rose-almond-oil-20g-070-oz', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 10px; padding: 0px; list-style-position: initial; list-style-image: initial; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(15, 17, 17); font-size: 10.5pt;\">Our stylish, functional Lip Therapy tins with their original retro look are perfect to help keep lips healthy and protected from the elements.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(15, 17, 17); font-size: 10.5pt;\">The actual product may be different than product image</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(15, 17, 17); font-size: 10.5pt;\">Made in Norway</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(15, 17, 17); font-size: 10.5pt;\">Lip Therapy with Rose and Almond Oil 20g</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(15, 17, 17); font-size: 10.5pt;\">Gently tints and cares for lips</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i0.7612397caAXA6O\" style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(15, 17, 17); font-size: 10.5pt;\">Rosy Lips brings out the natural rosy tones in your lips by soothing and gently tinting.</span></div></li></ul>', NULL, 'backend/img/product/1764610294_692dd0f6467f7.png', 0, '', 'new', 'active', 350.00, 10.00, 0, 11, NULL, 19, '2025-12-01 17:31:34', '2026-01-20 14:38:29');
INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `photo`, `stock`, `size`, `condition`, `status`, `price`, `discount`, `is_featured`, `cat_id`, `child_cat_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(29, 'Transparent Lipstick Jelly Flower Moisturizing Lipstick Color Changing Lip Balm Lip Care Lipstick', 'transparent-lipstick-jelly-flower-moisturizing-lipstick-color-changing-lip-balm-lip-care-lipstick', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; overflow: hidden; column-count: 2; column-gap: 32px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\"><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">【Color-changing】 The color of this Flower Jelly Lipstick changes according to the body temperature and the pH of the lips. Everyone has their own special color.</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">【Natural Ingredients】The Lipstick is a blend of Beeswax, Vitamin E and Oils that are genuinely beneficial to your lips. Together, these ingredients lock in the moisture and create beautifully hydrated lips.</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">【Benefits】:The flower jelly lip balm can give enough moisture to lips, prevent chapped lips, lighten lip lines, healthy and safe, and the color is not easy to fade.</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">【Occasion】The product contains: 6pcs Flower Jelly Lipstick, which can be used every moment. Suitable for professional and home use, perfect for wedding, bridal, party dates.</li><li data-spm-anchor-id=\"a1zawk.page_product_publish.0.i61.143277091fVRO2\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\">【Cruelty-free cosmetics】100% cruelty-free, we\'re proud to say we have never &amp; will never test on animals. We also make it a point to work with cruelty-free third-party vendors.</li><li data-spm-anchor-id=\"a1zawk.page_product_publish.0.i61.143277091fVRO2\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><p data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i1.7e2b5b9a4JifNv\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Transparent Lipstick Jelly Flower</p></li></ul>', NULL, 'backend/img/product/1764610406_692dd166b2eb2.png', 0, '', 'hot', 'active', 350.00, 10.00, 1, 11, NULL, NULL, '2025-12-01 17:33:26', '2026-01-20 14:38:12'),
(30, 'IGOODCO Fashion 5 In 1 Makeup Book Palette', 'igoodco-fashion-5-in-1-makeup-book-palette', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 16px; padding: 0px; list-style-position: initial; list-style-image: initial; overflow: hidden; column-count: 2; column-gap: 32px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">5-in-1 Complete Palette – Includes eyeshadow, blush, contour, highlighter, and lip colors for a full-face makeup look.</span></div></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Highly Pigmented Shades – Rich color payoff with minimal application.</span></div></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Smooth &amp; Blendable Formula – Effortlessly blends for a flawless finish.</span></div></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Compact &amp; Travel-Friendly – Book-style packaging makes it easy to carry anywhere.</span></div></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; list-style: none; word-break: break-word; break-inside: avoid;\"><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">Versatile Looks – Create natural, bold, or dramatic makeup styles.</span></div></li></ul>', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 11pt;\">Elevate your beauty routine with the IGOODCO Fashion 5-in-1 Makeup Book Palette, a complete all-in-one makeup set designed for effortless glam. This versatile palette features eyeshadows, blush, contour, highlighter, and lip colors, making it the perfect solution for both everyday looks and special occasions. Whether you\'re at home or on the go, this compact and travel-friendly \"makeup book\" ensures you have all your essentials in one place.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\"><br style=\"margin: 0px; padding: 0px;\"><br style=\"margin: 0px; padding: 0px;\"><br style=\"margin: 0px; padding: 0px;\"><br style=\"margin: 0px; padding: 0px;\"></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(34, 34, 34); font-size: 10.5pt;\">Key Features :</span></p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 10px; padding: 0px; list-style-position: initial; list-style-image: initial; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">5-in-1 Complete Palette – Includes eyeshadow, blush, contour, highlighter, and lip colors for a full-face makeup look.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Highly Pigmented Shades – Rich color payoff with minimal application.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Smooth &amp; Blendable Formula – Effortlessly blends for a flawless finish.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Compact &amp; Travel-Friendly – Book-style packaging makes it easy to carry anywhere.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Versatile Looks – Create natural, bold, or dramatic makeup styles.</span></div></li></ul><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; display: block;\"></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; white-space-collapse: break-spaces; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(34, 34, 34); font-size: 10.5pt;\">How to Use :</span></p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 10px; padding: 0px; list-style-position: initial; list-style-image: initial; font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px; white-space-collapse: break-spaces;\"><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Eyeshadow: Apply shades to enhance and define your eyes.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Contour &amp; Blush: Add definition and a natural flush to your face.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Highlight: Illuminate your features for a radiant glow.</span></div></li><li style=\"margin: 0px; padding: 0px;\"><div data-spm-anchor-id=\"a2a0e.pdp_revamp.product_detail.i2.4e137c9a7xvPli\" style=\"margin: 0px; padding: 0px; line-height: 1.7;\"><span style=\"margin: 0px; padding: 0px; color: rgb(34, 34, 34); font-size: 10.5pt;\">Lip Colors: Complete your look with the perfect lip shade.</span></div></li></ul>', 'backend/img/product/1764610530_692dd1e223b6f.png', 0, '', 'hot', 'active', 1050.00, 10.00, 1, 8, NULL, NULL, '2025-12-01 17:35:30', '2026-01-20 14:37:56'),
(31, 'Saffron Goat Milk Soap', 'saffron-goat-milk-soap', '<p><span style=\"font-family: Roboto, -apple-system, &quot;system-ui&quot;, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px; white-space-collapse: break-spaces;\">Enjoy butter-soft glowing skin• Experience a burst of whiteningpH balance-No harmful chemicalsZafran Honey Brightenign Soap - 100gm• Active Agents:Zafran, Honey, Snail Powder, Butanediol, Silk Protein Powder, Giga White Powder Etc.The best way to cherish your bright skin and glowing skin.• If you want to brighten and whiten your skin naturally, you need to cleanse your skin every day and give it something that contains all the vitamins and minerals your skin needs. So Zafran Whitening Soap will be the best choice for you. Because it will deep clean your skin as well as fight the daily dullness of the skin. And the zafran, honey, and other effective ingredients in this soap will give your skin radiance and glow without any side effects, brightens up the skin, helps remove acne and acne scars from the skin, moisturizes the skin deeply, removes aging from the skin.• How to use:Zafran Whitening Honey Soap is made with all-natural ingredients so it can be safely used on any part of the body. Use this soap all over your body while bathing. And you can wash with it whenever you wash your face, hands, and feet. It is best to use this soap 2/3 times a day to keep the face skin beautiful and fresh.</span></p>', NULL, 'backend/img/product/1764610685_692dd27d186be.png', 0, '', 'default', 'active', 250.00, 10.00, 0, 11, NULL, NULL, '2025-12-01 17:38:05', '2026-01-20 14:37:41'),
(32, 'GMEELAN Orange Exfoliating Gel – উজ্জ্বল ত্বকের ম্যাজিক', 'kakashow-water-glow-foundation-stick', 'GMEELAN Orange Exfoliating Gel কিনুন সাশ্রয়ী মূল্যে। এটি আপনার ত্বকের মরা চামড়া দূর করে ত্বককে করবে দাগহীন ও ফর্সা।', 'আপনার ত্বকের মরা চামড়া দূর করে তৎক্ষণাৎ উজ্জ্বলতা ফিরিয়ে আনতে ব্যবহার করুন GMEELAN Orange Exfoliating Gel। এটি বিশেষ ব্লেন্ডেড ফর্মুলায় তৈরি, যা কোনো ইরিটেশন ছাড়াই ত্বককে করে তোলে মসৃণ এবং সতেজ।\r\n\r\nমূল বৈশিষ্ট্যসমূহ:\r\nDeep Exfoliation: ত্বকের মৃত কোষ এবং ময়লা নিমিষেই পরিষ্কার করে।\r\n\r\nBrightening Effect: কমলার নির্যাস থাকায় এটি ত্বককে ভেতর থেকে উজ্জ্বল (Whitening) করতে সাহায্য করে।\r\n\r\nMoisturizing: ব্যবহারের পর ত্বক রুক্ষ হয় না, বরং আর্দ্রতা বজায় থাকে।\r\n\r\nGentle Formula: সব ধরনের ত্বকের (All Skin Types) জন্য উপযোগী।\r\n\r\nকিভাবে ব্যবহার করবেন:\r\n১. মুখ বা শরীরের কাঙ্ক্ষিত স্থানটি পরিষ্কার করে শুকিয়ে নিন।\r\n২. পর্যাপ্ত পরিমাণ জেল নিয়ে বৃত্তাকার মোশনে (Circular Motion) ১-২ মিনিট ম্যাসাজ করুন।\r\n৩. মরা চামড়া উঠে এলে হালকা গরম পানি দিয়ে ধুয়ে ফেলুন।\r\n৪. ভালো ফলাফলের জন্য সপ্তাহে ২-৩ বার ব্যবহার করুন।', 'backend/img/category/1771577800_699821c821ab9.jpg', 89, '', 'hot', 'active', 350.00, 10.00, 0, 9, NULL, NULL, '2025-12-01 17:40:01', '2026-02-20 13:56:40'),
(33, 'Beauty Glazed 24H Pure Kajal Liner', 'beauty-glazed-24h-pure-kajal-liner', '<p><span style=\"color: rgb(226, 229, 233); font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"> 𝐁𝐞𝐚𝐮𝐭𝐲 𝐆𝐥𝐚𝐳𝐞𝐝 24H Kajol, Liner যা আপনারা কাজল ও আইলাইনার দুইভাবেই ব্যবহার করতে পারবেন| একদম resonable price </span></p>', '<div dir=\"auto\" style=\"font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(226, 229, 233); font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; overflow-wrap: break-word; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; padding-inline: 0px; margin-inline: 1px; padding-bottom: 0px; margin-bottom: 0px; margin-top: 0px; padding-top: 0px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🖤\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9f/2/16/1f5a4.png\" style=\"border: 0px; border-start-start-radius: 0px; border-end-end-radius: 0px; border-start-end-radius: 0px; border-end-start-radius: 0px; object-fit: fill;\"></span> Define and enhance your eyes effortlessly. </div><div dir=\"auto\" style=\"font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(226, 229, 233); font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; overflow-wrap: break-word; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; padding-inline: 0px; margin-inline: 1px; padding-bottom: 0px; margin-bottom: 0px; margin-top: 0px; padding-top: 0px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🖤\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9f/2/16/1f5a4.png\" style=\"border: 0px; border-start-start-radius: 0px; border-end-end-radius: 0px; border-start-end-radius: 0px; border-end-start-radius: 0px; object-fit: fill;\"></span> Super dark black in shade.</div><div dir=\"auto\" style=\"font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(226, 229, 233); font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; overflow-wrap: break-word; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; padding-inline: 0px; margin-inline: 1px; padding-bottom: 0px; margin-bottom: 0px; margin-top: 0px; padding-top: 0px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🖤\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9f/2/16/1f5a4.png\" style=\"border: 0px; border-start-start-radius: 0px; border-end-end-radius: 0px; border-start-end-radius: 0px; border-end-start-radius: 0px; object-fit: fill;\"></span> Smooth &amp; creamy texture.</div><div dir=\"auto\" style=\"font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(226, 229, 233); font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; overflow-wrap: break-word; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; padding-inline: 0px; margin-inline: 1px; padding-bottom: 0px; margin-bottom: 0px; margin-top: 0px; padding-top: 0px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🖤\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9f/2/16/1f5a4.png\" style=\"border: 0px; border-start-start-radius: 0px; border-end-end-radius: 0px; border-start-end-radius: 0px; border-end-start-radius: 0px; object-fit: fill;\"></span> Gives pigmented lines in one stroke.</div><div dir=\"auto\" style=\"font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(226, 229, 233); font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; overflow-wrap: break-word; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; padding-inline: 0px; margin-inline: 1px; padding-bottom: 0px; margin-bottom: 0px; margin-top: 0px; padding-top: 0px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🖤\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9f/2/16/1f5a4.png\" style=\"border: 0px; border-start-start-radius: 0px; border-end-end-radius: 0px; border-start-end-radius: 0px; border-end-start-radius: 0px; object-fit: fill;\"></span> Water proof &amp; transfer proof formula.</div><div dir=\"auto\" style=\"font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(226, 229, 233); font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; overflow-wrap: break-word; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; padding-inline: 0px; margin-inline: 1px; padding-bottom: 0px; margin-bottom: 0px; margin-top: 0px; padding-top: 0px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🖤\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9f/2/16/1f5a4.png\" style=\"border: 0px; border-start-start-radius: 0px; border-end-end-radius: 0px; border-start-end-radius: 0px; border-end-start-radius: 0px; object-fit: fill;\"></span> Stay for a long time . </div><div dir=\"auto\" style=\"font-family: system-ui, -apple-system, &quot;system-ui&quot;, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(226, 229, 233); font-size: 15px; white-space-collapse: preserve; background-color: rgb(37, 39, 40);\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\" style=\"text-align: inherit; overflow-wrap: break-word; display: inline-flex; vertical-align: middle; width: 16px; height: 16px; padding-inline: 0px; margin-inline: 1px; padding-bottom: 0px; margin-bottom: 0px; margin-top: 0px; padding-top: 0px; font-family: inherit;\"><img height=\"16\" width=\"16\" class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" alt=\"🖤\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9f/2/16/1f5a4.png\" style=\"border: 0px; border-start-start-radius: 0px; border-end-end-radius: 0px; border-start-end-radius: 0px; border-end-start-radius: 0px; object-fit: fill;\"></span> Safe for your eyes</div>', 'backend/img/product/1764610954_692dd38ac69bb.png', 0, '', 'hot', 'active', 250.00, 10.00, 0, 8, NULL, NULL, '2025-12-01 17:42:34', '2026-01-20 14:37:09'),
(34, 'Gadget', 'gadget', '<p>&nbsp;<span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg j</span></p>', '<p>&nbsp;<span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp; &nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">jglikdgjlkd jgdlkjglkdjg jgldjglkjdhig gjdljglkdfjg gjjkfj&nbsp;&nbsp;</span></p>', 'backend/img/product/1770629455_6989a94f36af6.png', 0, 'S', 'new', 'active', 549.00, 30.00, 0, 13, NULL, 15, '2026-02-09 14:30:55', '2026-03-05 12:54:03'),
(35, 'Cosrx Salicylic Acid Daily Gentle Cleanser - 150 ml.    SKU: 8809416471112', 'instant-hair-colors-stick', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ১৫০ মিলি (150ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> তৈলাক্ত এবং ব্রণপ্রবণ (Oily & Acne-prone) ত্বকের জন্য সেরা।</li>\r\n    <li><strong>মূল কাজ:</strong> ব্রণ কমানো, পোরস পরিষ্কার করা এবং ব্ল্যাকহেডস দূর করা।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> ০.৫% স্যালিসাইলিক অ্যাসিড (BHA) এবং বোটানিক্যাল ইনগ্রেডিয়েন্টস।</li>\r\n    <li><strong>বিশেষত্ব:</strong> ত্বককে অতিরিক্ত শুষ্ক না করেই ব্রণের জীবাণু ধ্বংস করে।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p>ব্রণ এবং অতিরিক্ত তৈলাক্ত ত্বকের সমস্যা থেকে মুক্তি পেতে <strong>Cosrx Salicylic Acid Daily Gentle Cleanser</strong> একটি অত্যন্ত কার্যকর ফেসওয়াশ। এটি বিশেষভাবে তৈরি করা হয়েছে যাতে ত্বকের গভীরে গিয়ে ময়লা, অতিরিক্ত তেল এবং সিবাম দূর করতে পারে।</p>\r\n\r\n    <h4>মূল উপকারিতাসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>ব্রণ প্রতিরোধ:</strong> এতে থাকা ০.৫% স্যালিসাইলিক অ্যাসিড ব্রণের জীবাণু ধ্বংস করে এবং নতুন ব্রণ হওয়া রোধ করে।</li>\r\n        <li><strong>পোরস ক্লিনজিং:</strong> এটি লোমকূপের ভেতরে জমে থাকা ব্ল্যাকহেডস এবং হোয়াইটহেডস পরিষ্কার করে ত্বককে মসৃণ করে।</li>\r\n        <li><strong>সিবাম কন্ট্রোল:</strong> এটি ত্বকের অতিরিক্ত তেল নিয়ন্ত্রণ করে মুখকে সারাদিন সতেজ রাখে।</li>\r\n        <li><strong>বোটানিক্যাল ফর্মুলা:</strong> এতে রয়েছে ভেষজ উপাদান যা ত্বককে শান্ত রাখে এবং প্রদাহ বা লালচে ভাব কমায়।</li>\r\n    </ul>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন:</h4>\r\n    <ol>\r\n        <li>হালকা পানি দিয়ে মুখ ভিজিয়ে নিন।</li>\r\n        <li>অল্প পরিমাণ ক্লিনজার হাতে নিয়ে ফেনা তৈরি করুন।</li>\r\n        <li>বিশেষ করে ব্রণের জায়গা এবং টি-জোনে (কপাল, নাক ও থুতনি) আলতোভাবে ম্যাসাজ করুন।</li>\r\n        <li>কুসুম গরম বা সাধারণ পানি দিয়ে মুখ ধুয়ে ফেলুন।</li>\r\n    </ol>\r\n\r\n    <p><em>নোট: এটি একটি এক্সফোলিয়েটিং ক্লিনজার, তাই ব্যবহারের পর ভালো মানের ময়েশ্চারাইজার এবং দিনে সানস্ক্রিন ব্যবহার করা জরুরি।</em></p>\r\n</div>', 'backend/img/category/1772700485_69a9434533048.png', 5, '', 'new', 'active', 1100.00, 0.00, 0, 9, NULL, 17, '2026-02-09 14:34:59', '2026-03-12 12:59:08'),
(36, 'Celimax The Vita-A Retinal Shot Tightening Booster 15 ml.    SKU: 8809700320812', 'zoo-son-whitening-freckle-cream-mechta-oo-kalce-dag-duur-kre-twk-ujjwl-krar-krim-20-gram', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ১৫ মিলি (15ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> সব ধরনের ত্বকের জন্য (বিশেষ করে যাদের পোরস বড় এবং রিঙ্কেল আছে)।</li>\r\n    <li><strong>মূল কাজ:</strong> পোরস টাইট করা, বলিরেখা দূর করা এবং স্কিন টেক্সচার উন্নত করা।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> রেটিনাল (Retinal) এবং কোলাজেন বুস্টার।</li>\r\n    <li><strong>বিশেষত্ব:</strong> সাধারণ রেটিনলের চেয়ে এটি দ্রুত কাজ করে এবং ত্বকের ইলাস্টিসিটি বাড়ায়।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিস্তারিত বিবরণ:</h3>\r\n    <p>ত্বককে টানটান এবং পুনরুজ্জীবিত করতে <strong>Celimax The Vita-A Retinal Shot Tightening Booster</strong> একটি শক্তিশালী অ্যান্টি-এজিং সলিউশন। এতে থাকা রেটিনাল (Retinal) উপাদানটি সাধারণ রেটিনলের চেয়ে অনেক দ্রুত ত্বকের গভীরে গিয়ে কাজ করে, যা বড় হয়ে যাওয়া পোরস সংকুচিত করতে এবং ত্বকের ঝুলে যাওয়া রোধ করতে কার্যকর।</p>\r\n\r\n    <h4>মূল উপকারিতাসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>পোরস টাইটনিং:</strong> এটি ঝুলে যাওয়া লোমকূপ বা পোরসকে ভেতর থেকে টাইট করে ত্বককে মসৃণ দেখায়।</li>\r\n        <li><strong>অ্যাডভান্সড রেটিনাল:</strong> ভিটামিন এ-এর এই উন্নত সংস্করণটি ত্বকের কোষ পুনর্গঠন ত্বরান্বিত করে এবং কোলাজেন উৎপাদন বাড়ায়।</li>\r\n        <li><strong>রিঙ্কেল কেয়ার:</strong> চোখের কোণে বা কপালে পড়া সূক্ষ্ম রেখা (Fine lines) এবং বলিরেখা দূর করতে সাহায্য করে।</li>\r\n        <li><strong>স্মুথ টেক্সচার:</strong> নিয়মিত ব্যবহারে খসখসে ভাব দূর হয়ে ত্বক হয়ে ওঠে কাঁচের মতো স্বচ্ছ ও উজ্জ্বল।</li>\r\n    </ul>\r\n\r\n    <h4>কিভাবে ব্যবহার করবেন (সতর্কতা সহ):</h4>\r\n    <ol>\r\n        <li><strong>শুধুমাত্র রাতে ব্যবহার করুন:</strong> মুখ ধোয়ার পর সামান্য পরিমাণ (মটর দানার মতো) বুস্টার ক্রিম মুখে লাগান।</li>\r\n        <li><strong>শুরু করার নিয়ম:</strong> প্রথম দুই সপ্তাহ সপ্তাহে ২-৩ দিন ব্যবহার করুন যাতে ত্বক মানিয়ে নিতে পারে। এরপর ধীরে ধীরে নিয়মিত ব্যবহার শুরু করুন।</li>\r\n        <li><strong>ময়েশ্চারাইজার:</strong> এটি ব্যবহারের পর অবশ্যই একটি ভালো হাইড্রেটিং ময়েশ্চারাইজার লাগাবেন।</li>\r\n        <li><strong>দিনের বেলা সতর্কতা:</strong> রাতে এটি ব্যবহার করলে পরের দিন অবশ্যই **সানস্ক্রিন** ব্যবহার করতে হবে, কারণ রেটিনাল ত্বককে রোদের প্রতি সংবেদনশীল করে তোলে।</li>\r\n    </ol>\r\n\r\n    <p><em>নোট: গর্ভবতী বা স্তন্যদানকারী মায়েদের এই পণ্যটি ব্যবহার করার আগে চিকিৎসকের পরামর্শ নেওয়া উচিত।</em></p>\r\n</div>', 'backend/img/category/1773310076_69b2907c3b192.jpg', 0, '', 'hot', 'active', 1580.00, 0.00, 1, 9, NULL, NULL, '2026-02-20 14:36:09', '2026-03-12 14:07:56'),
(37, 'COSRX Low Ph Good Morning Gel Cleanser 150ml. sku: 8809416470511', 'cosrx-low-ph-good-morning-gel-cleanser-150ml-sku-8809416470511', '<ul>\r\n    <li><strong>পরিমাণ:</strong> ১৫০ মিলি (150ml)</li>\r\n    <li><strong>ত্বকের ধরন:</strong> সকল ধরনের ত্বকের জন্য উপযোগী (বিশেষ করে সেনসিটিভ স্কিন)।</li>\r\n    <li><strong>পিএইচ লেভেল:</strong> ৫.৩০ – ৬.৩০ (ত্বকের প্রাকৃতিক পিএইচ-এর কাছাকাছি)।</li>\r\n    <li><strong>মূল উপকারিতা:</strong> গভীর পরিষ্কার, অয়েল কন্ট্রোল এবং হাইড্রেটিং ফিনিশ।</li>\r\n    <li><strong>প্রধান উপাদান:</strong> টি-ট্রি অয়েল (Tea Tree Oil) এবং ন্যাচারাল বিএইচএ (BHA)।</li>\r\n</ul>', '<div class=\"product-description\">\r\n    <h3>পণ্যর বিবরণ:</h3>\r\n    <p>আপনার দিন শুরু করুন ত্বকের জন্য সবচেয়ে নিরাপদ এবং কোমল ক্লিনজার দিয়ে। <strong>COSRX Low pH Good Morning Gel Cleanser</strong> বিশেষভাবে তৈরি করা হয়েছে ত্বকের ন্যাচারাল পিএইচ (pH) লেভেল বজায় রাখার জন্য। এটি ত্বককে অতিরিক্ত শুষ্ক না করেই ভেতর থেকে পরিষ্কার করে।</p>\r\n\r\n    <h4>মূল বৈশিষ্ট্যসমূহ:</h4>\r\n    <ul>\r\n        <li><strong>Low pH Level:</strong> ত্বকের প্রাকৃতিক সুরক্ষা স্তর (Barrier) নষ্ট না করে গভীর থেকে ময়লা পরিষ্কার করে।</li>\r\n        <li><strong>Tea Tree Oil:</strong> ত্বকের তৈলাক্ত ভাব নিয়ন্ত্রণ করে এবং পোরস সঙ্কুচিত করতে সাহায্য করে।</li>\r\n        <li><strong>Natural BHA:</strong> ত্বকের মৃত কোষ দূর করে এবং স্কিন টেক্সচার উন্নত করে।</li>\r\n        <li><strong>Gentle & Hydrating:</strong> ফেসওয়াশ করার পর ত্বক টানটান বা রুক্ষ হয়ে যায় না, বরং সতেজ থাকে।</li>\r\n    </ul>\r\n\r\n    <h4>ব্যবহার বিধি (How to Use):</h4>\r\n    <ol>\r\n        <li>প্রথমে হাত এবং মুখ হালকা পানি দিয়ে ভিজিয়ে নিন।</li>\r\n        <li>পরিমাণমতো জেল হাতে নিয়ে ফেনা তৈরি করুন।</li>\r\n        <li>পুরো মুখে আলতোভাবে ম্যাসাজ করুন।</li>\r\n        <li>সবশেষে হালকা গরম পানি বা সাধারণ পানি দিয়ে মুখ ধুয়ে ফেলুন।</li>\r\n    </ol>\r\n\r\n    <blockquote>\r\n        <em>সকাল এবং রাত—উভয় সময়ে ব্যবহারের জন্য এটি একটি আদর্শ ক্লিনজার। সেনসিটিভ স্কিনের জন্য এটি অত্যন্ত কার্যকরী।</em>\r\n    </blockquote>\r\n</div>', 'backend/img/product/1772691496_69a9202812592.png', 19, '', 'hot', 'active', 1100.00, 0.00, 0, 9, NULL, NULL, '2026-03-05 11:18:16', '2026-03-12 12:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 0,
  `review` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `rate`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 24, 5, 'খুবই ভাল একটি product, যা ব্যবহারে কোন চুলকানি বা কোন সাইড এফেক্ট নেই।', 'active', '2026-01-20 00:24:08', '2026-01-20 00:24:08'),
(2, 10, 24, 5, 'আমি সম্প্রতি Hairdressing Wand ব্যবহার করেছি এবং এটি সত্যিই আমার সাদা চুল ঢাকার জন্য একটি দারুণ সমাধান। এটি ব্যবহার করা খুবই সহজ—শুকনো চুলে হালকা করে প্রয়োগ করে ৫ সেকেন্ড অপেক্ষা করে আঙুল বা ছোট ব্রাশ দিয়ে ব্লেন্ড করতে হয়। এর ফলাফল ন্যাচারাল ফিনিশ, যা আসল চুলের সঙ্গে মিশে যায় এবং কোনো কৃত্রিম কালো ভাব আনে না। এটি ওয়াটারপ্রুফ ও লং-লাস্টিং, ঘাম বা হালকা বৃষ্টিতে মুছে যায় না, তবে শ্যাম্পু করলে পরিষ্কার হয়ে যায়। একটি স্টিক প্রায় ১ মাস ব্যবহার করা যায়, যা সাশ্রয়ী। এটি পোর্টেবল, তাই যেকোনো সময়, যেকোনো জায়গায় ব্যবহারযোগ্য। অফিস, ইভেন্ট বা ফটোশুটের জন্য এটি আদর্শ পণ্য।', 'active', '2026-01-26 14:36:13', '2026-01-26 14:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referrer_id` bigint(20) UNSIGNED NOT NULL,
  `referred_id` bigint(20) UNSIGNED NOT NULL,
  `referral_code` varchar(191) NOT NULL,
  `has_purchased` tinyint(1) NOT NULL DEFAULT 0,
  `points_earned` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `short_des` text NOT NULL,
  `logo` longtext NOT NULL,
  `photo` longtext NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `short_des`, `logo`, `photo`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Regular-Need', 'Your trusted online store for beauty, personal care, mom &amp; baby essentials, skin care, hair care, and jewellery. We believe everyone deserves access to high-quality products at fair prices, delivered right to their doorstep anywhere in Bangladesh. \r\nRegular-Need\r\n\r\nWhat We Offer\r\n\r\nA wide range of carefully selected products including makeup, skincare, hair care, personal care, mom &amp; baby items, and jewellery — all in one place. \r\nRegular-Need\r\n\r\nCompetitive pricing with frequent offers and discounts, helping you shop smart without compromising on quality. \r\nRegular-Need\r\n\r\nConvenient payment and delivery options — including Cash on Delivery, secure online payment, and reliable shipping across Bangladesh. \r\nRegular-Need\r\n\r\nCustomer-first service: easy order tracking, 24/7 support, and a 15-day return policy to make sure you’re satisfied with your purchase. \r\nRegular-Need\r\n\r\nOur Mission\r\n\r\nAt Regular-Need, our mission is to simplify online shopping for all Bangladeshis — whether you live in Dhaka or outside. We want to make beauty and personal care products accessible, affordable, and reliable, so that shopping online becomes easy and stress-free.\r\n\r\nWhy Choose Regular-Need\r\n\r\nDiverse Selection: From everyday essentials to specialized skincare and hair care — find it all under one roof.\r\n\r\nAffordable &amp; Honest Pricing: No inflated costs, just fair prices and honest deals.\r\n\r\nConvenience &amp; Trust: Simple checkout, secure payment, doorstep delivery, and flexible return policy.\r\n\r\nCustomer Satisfaction: We value your feedback and strive to provide a smooth, trustworthy shopping experience.\r\n\r\nThank you for choosing Regular-Need — we’re excited to be part of your daily care and beauty journey.', 'Sale Cosmetic products online with secure payments and easy order management.', 'uploads/settings/1768849813_696e81956ce61.jpg', 'uploads/settings/1768849734_696e814693563.png', 'Dhaka,Bangladesh', '+8801972-300310', 'support@regularneed.com', NULL, '2026-01-24 21:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `type`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Inside Dhaka', 70.00, 'active', '2025-11-28 18:34:53', '2025-11-28 18:34:53'),
(3, 'Outside Dhaka', 130.00, 'active', '2025-11-28 18:35:11', '2026-02-01 05:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('active','expired','cancelled') NOT NULL DEFAULT 'active',
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NOT NULL,
  `auto_renew` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `duration_days` int(11) NOT NULL DEFAULT 0,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `name`, `price`, `duration_days`, `features`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', 0.00, 0, '[\"Basic Access\", \"Limited Support\"]', '2025-10-08 09:52:05', '2025-10-08 09:52:05'),
(2, 'Basic Plan', 499.00, 30, '[\"Ad-Free Experience\", \"Priority Support\"]', '2025-10-08 09:52:05', '2025-10-08 09:52:05'),
(3, 'Standard Plan', 999.00, 30, '[\"Ad-Free Experience\", \"Premium Support\", \"Extra Storage\"]', '2025-10-08 09:52:05', '2025-10-08 09:52:05'),
(4, 'Premium Plan', 1999.00, 30, '[\"All Features\", \"24/7 Support\", \"Exclusive Content\"]', '2025-10-08 09:52:05', '2025-10-08 09:52:05'),
(5, 'Annual Plan', 19999.00, 365, '[\"All Features\", \"24/7 Support\", \"Exclusive Content\", \"Discounted Price\"]', '2025-10-08 09:52:05', '2025-10-08 09:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('ad_view','referral','purchase','membership') NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `provider` varchar(191) DEFAULT NULL,
  `provider_id` varchar(191) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `points_balance` int(11) NOT NULL DEFAULT 0,
  `referral_code` varchar(191) DEFAULT NULL,
  `coins` int(11) NOT NULL DEFAULT 0,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `role`, `provider`, `provider_id`, `status`, `points_balance`, `referral_code`, `coins`, `is_subscribed`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$5Nz4k1BzBoUPWajtzouGe.gWNfiZWFRKel6fould1zWm55oWFWzPq', 'https://raw.githubusercontent.com/ripohassan/portfolio/refs/heads/master/mehek-emart.png', 'admin', NULL, NULL, 'active', 0, NULL, 0, 0, 'Sn9GljVwxIbFcf2Zz653cwVXcRKIwwgfvXKzYYr5zmTBcZ636BgitBeNl3eA', NULL, '2025-11-17 16:22:20'),
(7, 'Admin', 'ashique.prodhan999@gmail.com', NULL, '$2y$10$5Nz4k1BzBoUPWajtzouGe.gWNfiZWFRKel6fould1zWm55oWFWzPq', 'https://raw.githubusercontent.com/ripohassan/portfolio/refs/heads/master/mehek-emart.png', 'admin', NULL, NULL, 'active', 0, NULL, 0, 0, 'IhSohDOckwor8dDErZ8ftZWoNuBQgwEQ3lfeHqdBmZoIl2RzDhiFmSNaK7HZ', NULL, '2025-11-17 16:22:20'),
(8, 'rasida begum', 'rashidabegum6508@gmail.com', NULL, '$2y$10$eoKHdLWrRCo2pw4V2rGr.eEF.udb2qRYDdOGB8OaCxTSryEQjb5cS', NULL, 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-01-19 23:56:22', '2026-01-19 23:56:22'),
(9, 'ashique', 'ashiquerrahman111@gmail.com', NULL, '$2y$10$pKAh35lvqz95G7DJr5xG4.DeDqC6SCBsOtB0X669YmuppCsoOtZdO', NULL, 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-01-24 21:33:10', '2026-01-24 21:33:10'),
(10, 'Mk', 'mkzannaty@gmail.com', NULL, '$2y$10$exeG0RtOkrVP09pH3Pnk...gKKYgYNR3g23P7AIMuw4KxRgLaPFdi', NULL, 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-01-26 14:19:20', '2026-01-26 14:19:20'),
(11, 'huiyhui', 'johurul.sec@gmail.com', NULL, '$2y$10$5E3pMHQYRzdu4cS73U0yre4YI5YEOZLvFosPus/ragHD5KijV2c3C', NULL, 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-01-27 17:45:06', '2026-01-27 17:45:06'),
(12, 'Mia Welch', 'himyho@mailinator.com', NULL, '$2y$10$a00UqCQBJHHJYeG6SJr2LuA2OHItxJs4KQHuqACMfyv5iiImrhW2.', NULL, 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-01-29 14:25:57', '2026-01-29 14:25:57'),
(13, 'avaakter', 'avaakter544@gmail.com', NULL, '$2y$10$nzp4aGo6lXl2mhx75W07.ejpcQzjgepoU1.M8lhF1Cer3er6ih2N.', NULL, 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-02-23 10:38:46', '2026-02-23 10:38:46'),
(14, 'Ashique', 'ashique', NULL, '$2y$10$Nmp7eM0N7EBPGqYd8MrVJ.7xRM9vR.1gYTizaLEntaXaHKmfEMRtu', NULL, 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-02-23 23:17:19', '2026-02-23 23:17:19'),
(15, 'Vin Tempest', 'viintempest@gmail.com', NULL, '$2y$10$RYByUg7Fn3y.Yrn3VTLRRO2ErUz2JVZIM0DrUL7QK6Bhz3L/Wub4i', 'backend/img/profile/1771935121_699d95919c6fd.', 'user', NULL, NULL, 'active', 0, NULL, 0, 0, NULL, '2026-02-24 17:01:11', '2026-02-24 17:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_memberships`
--

CREATE TABLE `user_memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `cart_id`, `user_id`, `price`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(4, 31, NULL, NULL, 225.00, 1, 225.00, '2026-01-09 12:25:54', '2026-01-09 12:30:32'),
(5, 24, NULL, 8, 650.00, 1, 650.00, '2026-01-30 11:16:38', '2026-01-30 11:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advertisements_slug_unique` (`slug`);

--
-- Indexes for table `advertisement_clicks`
--
ALTER TABLE `advertisement_clicks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisement_clicks_advertisement_id_foreign` (`advertisement_id`),
  ADD KEY `advertisement_clicks_user_id_foreign` (`user_id`);

--
-- Indexes for table `advertisement_views`
--
ALTER TABLE `advertisement_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisement_views_advertisement_id_foreign` (`advertisement_id`),
  ADD KEY `advertisement_views_user_id_foreign` (`user_id`);

--
-- Indexes for table `ad_rewards`
--
ALTER TABLE `ad_rewards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad_rewards_ad_id_user_id_action_type_unique` (`ad_id`,`user_id`,`action_type`),
  ADD KEY `ad_rewards_user_id_foreign` (`user_id`);

--
-- Indexes for table `ad_views`
--
ALTER TABLE `ad_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_added_by_foreign` (`added_by`);

--
-- Indexes for table `coin_transactions`
--
ALTER TABLE `coin_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coin_transactions_user_id_type_index` (`user_id`,`type`),
  ADD KEY `coin_transactions_reference_type_reference_id_index` (`reference_type`,`reference_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  ADD KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  ADD KEY `posts_added_by_foreign` (`added_by`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tags_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_child_cat_id_foreign` (`child_cat_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_referrer_id_foreign` (`referrer_id`),
  ADD KEY `referrals_referred_id_foreign` (`referred_id`),
  ADD KEY `referrals_referral_code_index` (`referral_code`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_status_index` (`user_id`,`status`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_plans_name_unique` (`name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_referral_code_unique` (`referral_code`);

--
-- Indexes for table `user_memberships`
--
ALTER TABLE `user_memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_memberships_user_id_foreign` (`user_id`),
  ADD KEY `user_memberships_membership_id_foreign` (`membership_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_cart_id_foreign` (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisement_clicks`
--
ALTER TABLE `advertisement_clicks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisement_views`
--
ALTER TABLE `advertisement_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_rewards`
--
ALTER TABLE `ad_rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_views`
--
ALTER TABLE `ad_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coin_transactions`
--
ALTER TABLE `coin_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_memberships`
--
ALTER TABLE `user_memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement_clicks`
--
ALTER TABLE `advertisement_clicks`
  ADD CONSTRAINT `advertisement_clicks_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisement_clicks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advertisement_views`
--
ALTER TABLE `advertisement_views`
  ADD CONSTRAINT `advertisement_views_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisement_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ad_rewards`
--
ALTER TABLE `ad_rewards`
  ADD CONSTRAINT `ad_rewards_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ad_rewards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `coin_transactions`
--
ALTER TABLE `coin_transactions`
  ADD CONSTRAINT `coin_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_cat_id_foreign` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_tag_id_foreign` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tags` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_child_cat_id_foreign` FOREIGN KEY (`child_cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_referred_id_foreign` FOREIGN KEY (`referred_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `referrals_referrer_id_foreign` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_memberships`
--
ALTER TABLE `user_memberships`
  ADD CONSTRAINT `user_memberships_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
