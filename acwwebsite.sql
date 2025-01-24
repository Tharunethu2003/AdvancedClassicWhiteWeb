-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acwwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `dermatologist_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `customer_name`, `phone_num`, `date`, `time`, `dermatologist_id`, `created_at`, `updated_at`) VALUES
(1, 'T. H. S. Tharunethu De Silva', '0772174723', '2025-01-23', '11.30', 1, '2025-01-23 18:03:18', '2025-01-23 18:03:18'),
(2, 'T. H. S. Tharunethu De Silva', '0772174723', '2025-01-15', '12:00 PM', 1, '2025-01-23 18:05:40', '2025-01-23 18:05:40'),
(3, 'dazai osamu', '0123456789', '1989-03-23', '01:00 PM', 2, '2025-01-23 21:11:04', '2025-01-23 21:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:3;', 1737708552),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1737708552;', 1737708552);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dermatologists`
--

CREATE TABLE `dermatologists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dermatologists`
--

INSERT INTO `dermatologists` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Cuddy', 'cuddy@example.com', '$2y$12$HFl0LF1u7EmxgoclpwLiIOVSIRWTlqYwTthjTIbuKjusVe8GRx/qO', '2025-01-24 02:28:14', '2025-01-24 02:28:14'),
(2, 'Dr. House', 'house@example.com', '$2y$12$2kwoqP0rup7iqy0jRUZbQ.JWnVbWpk643Ud1/eFzmg3lYSaIN5Yaa', '2025-01-24 02:28:15', '2025-01-24 02:28:15'),
(3, 'Dr. Wilson', 'wilson@example.com', '$2y$12$A/E1rvIke27THXk0L.HmX.XPSujWhjYsRBr7WTdvbHykKJUQjjT3.', '2025-01-24 02:28:15', '2025-01-24 02:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `derm_appointments`
--

CREATE TABLE `derm_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2024_12_07_051438_create_dermatologists_table', 1),
(17, '2024_12_19_005357_create_reviews_table', 3),
(18, '2024_12_19_010520_create_reviews_table', 4),
(19, '2024_12_19_010648_create_reviews_table', 5),
(22, '2024_12_19_100847_create_appointments_table', 8),
(23, '2025_01_08_213044_drop_dermatologists_table', 9),
(33, '0001_01_01_000000_create_users_table', 10),
(34, '0001_01_01_000001_create_cache_table', 10),
(35, '0001_01_01_000002_create_jobs_table', 10),
(36, '2024_11_10_113456_add_two_factor_columns_to_users_table', 10),
(37, '2024_11_10_113534_create_personal_access_tokens_table', 10),
(38, '2024_11_10_115138_create_admins_table', 10),
(39, '2024_11_17_133847_create_contact_table', 10),
(40, '2024_12_07_051445_create_derm_appointments_table', 11),
(41, '2024_12_18_150936_add_role_to_users_table', 11),
(42, '2024_12_18_152605_create_roles_table', 11),
(43, '2024_12_18_152651_create_role_user_table', 11),
(44, '2024_12_18_161124_create_products_table', 11),
(45, '2024_12_18_161249_add_deleted_at_to_products_table', 11),
(46, '2024_12_18_161833_add_slug_to_products_table', 11),
(47, '2024_12_19_001912_create_carts_table', 11),
(48, '2024_12_19_010715_create_reviews_table', 11),
(49, '2024_12_19_082230_create_orders_table', 11),
(50, '2025_01_23_140950_create_recommendations_table', 12),
(51, '2025_01_23_152232_create_user_results_table', 12),
(52, '2025_01_23_153331_create_user_routines_table', 13),
(53, '2025_01_23_154155_create_user_results_table', 14),
(54, '2025_01_23_154356_create_user_results_table', 15),
(55, '2025_01_23_155750_create_routines_table', 16),
(56, '2025_01_23_230135_create_appointments_table', 17),
(57, '2025_01_23_232258_create_appointments_table', 18),
(58, '2025_01_24_020439_create_dermatologists_table', 19),
(59, '2025_01_24_063924_add_is_admin_to_users_table', 20),
(60, '2025_01_24_075325_create_dermatologists_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `address`, `city`, `zipcode`, `phone`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'T. H. S. Tharunethu De Silva', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '0772174723', 7340.00, 'pending', '2025-01-08 22:49:08', '2025-01-08 22:49:08'),
(2, 0, 'kei', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '8082486', 2070.00, 'pending', '2025-01-09 00:26:49', '2025-01-09 00:26:49'),
(3, 0, 'kei', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '8082486', 1380.00, 'pending', '2025-01-09 01:13:30', '2025-01-09 01:13:30'),
(4, 0, 'dazai osamu', 'tokyo', 'shibuya', '1299', '1234567882', 2760.00, 'pending', '2025-01-09 17:33:54', '2025-01-09 17:33:54'),
(5, 0, 'ranpo edogawa', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '1234567890', 3450.00, 'pending', '2025-01-09 23:22:21', '2025-01-09 23:22:21'),
(6, 0, 'sadiha', 'digana, pallekale', 'kandy', '2345', '1234567890', 2070.00, 'pending', '2025-01-09 23:28:01', '2025-01-09 23:28:01'),
(7, 0, 'senali', 'digana, pallekale', 'kandy', '2345', '1234567890', 0.00, 'pending', '2025-01-09 23:33:39', '2025-01-09 23:33:39'),
(8, 0, 'senali', 'digana, pallekale', 'kandy', '2345', '1234567890', 0.00, 'pending', '2025-01-09 23:36:03', '2025-01-09 23:36:03'),
(9, 0, 'shiyan', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '0772174723', 2070.00, 'pending', '2025-01-09 23:39:10', '2025-01-09 23:39:10'),
(10, 0, 'krishnika', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '8082486', 2070.00, 'pending', '2025-01-09 23:44:59', '2025-01-09 23:44:59'),
(11, 0, 'krishnika', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '8082486', 3450.00, 'pending', '2025-01-10 00:32:18', '2025-01-10 00:32:18'),
(12, 0, 'krishnika', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '8082486', 0.00, 'pending', '2025-01-10 00:34:35', '2025-01-10 00:34:35'),
(13, 0, 'satoru', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'italy', '12999', '0123456789', 2340.00, 'pending', '2025-01-15 03:34:59', '2025-01-15 03:34:59'),
(14, 0, 'T. H. S. Tharunethu De Silva', '17/44, Summer City 2, Temple rd, Kengalla Kandy', 'kandy', '20000', '0772174723', 2760.00, 'pending', '2025-01-23 08:21:16', '2025-01-23 08:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sun Cream', NULL, 2100.00, 'product-images/01JH3ZMWWXXFH3R2MR7552KMT7.png', 'sun and stuff', '2025-01-08 16:43:03', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(2, 'Night time Body Lotion', NULL, 2300.00, 'product-images/01JH3ZP005X0SMR6G5BGT7K0J9.png', 'lotion', '2025-01-08 16:43:39', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(3, 'Daytime Body Lotion', NULL, 2150.00, 'product-images/01JH3ZPRF8Q03WKDVSYW7N7NG8.png', 'day', '2025-01-08 16:44:04', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(4, 'Brightening Day Cream', NULL, 2300.00, 'product-images/01JH3ZQMQMJAXRWQK29M983YWK.png', 'day cream', '2025-01-08 16:44:33', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(5, 'Brightening Night Cream', NULL, 2400.00, 'product-images/01JH3ZRMRAKY531RDD16GC8M26.png', 'night cream', '2025-01-08 16:45:06', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(6, 'Rejuvenating Night-time Body Lotion', 'rejuvenating-night-time-body-lotion', 690.00, 'images/prd1.jpg', 'A rejuvenating night-time body lotion to nourish your skin.', '2025-01-08 22:16:11', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(7, 'Sandalwood Day & Night Cream', 'sandalwood-day-night-cream', 690.00, 'images/prd2.jpg', 'A day & night cream with sandalwood to keep your skin glowing.', '2025-01-08 22:16:11', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(8, 'Rejuvenating Day Cream', 'rejuvenating-day-cream', 690.00, 'images/prd3.jpg', 'A rejuvenating day cream that helps to brighten and smooth the skin.', '2025-01-08 22:16:11', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(9, 'Brightening Day Cream', 'brightening-day-cream', 690.00, 'images/prd4.jpg', 'A brightening day cream that helps even skin tone and reduces dark spots.', '2025-01-08 22:16:11', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(10, 'Anti-acne Cream', 'anti-acne-cream', 690.00, 'images/prd5.jpg', 'A cream to help reduce acne and prevent future breakouts.', '2025-01-08 22:16:11', '2025-01-08 22:19:31', '2025-01-08 22:19:31'),
(11, 'Walnut & Coffee Facial Scrub', 'walnut-coffee-facial-scrub', 690.00, 'images/prd6.jpg', 'A facial scrub with walnut and coffee to exfoliate and refresh your skin.', '2025-01-08 22:16:11', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(12, 'Nourishing Lip Balm', 'nourishing-lip-balm', 490.00, 'images/prd7.jpg', 'A nourishing lip balm that keeps your lips soft and hydrated.', '2025-01-08 22:16:11', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(13, 'Hydrating Face Mask', 'hydrating-face-mask', 990.00, 'images/prd8.jpg', 'A hydrating face mask to restore moisture and smooth your skin.', '2025-01-08 22:16:11', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(14, 'Soothing Aloe Vera Gel', 'soothing-aloe-vera-gel', 450.00, 'images/prd9.jpg', 'A soothing aloe vera gel for calming irritated skin and sunburns.', '2025-01-08 22:16:11', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(15, 'Lavender & Honey Body Scrub', 'lavender-honey-body-scrub', 850.00, 'images/prd10.jpg', 'A lavender & honey body scrub to exfoliate and moisturize your skin.', '2025-01-08 22:16:11', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(16, 'Cleansing Micellar Water', 'cleansing-micellar-water', 650.00, 'images/prd11.jpg', 'A gentle cleansing micellar water to remove makeup and impurities.', '2025-01-08 22:16:11', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(17, 'Aloe Vera Face Gel', 'aloe-vera-face-gel', 499.00, 'images/prd12.jpg', 'A soothing aloe vera face gel to calm and hydrate your skin.', '2025-01-08 22:16:12', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(18, 'Rose & Aloe Vera Body Lotion', 'rose-aloe-vera-body-lotion', 750.00, 'images/prd13.jpg', 'A body lotion with rose and aloe vera to nourish and smooth your skin.', '2025-01-08 22:16:12', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(19, 'Luxury Face Cream', 'luxury-face-cream', 1100.00, 'images/prd14.jpg', 'A luxury face cream for a radiant, youthful complexion.', '2025-01-08 22:16:12', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(20, 'Exfoliating Sugar Scrub', 'exfoliating-sugar-scrub', 900.00, 'images/prd15.jpg', 'An exfoliating sugar scrub that removes dead skin cells and smooths the skin.', '2025-01-08 22:16:12', '2025-01-08 22:20:01', '2025-01-08 22:20:01'),
(21, 'Refreshing Face Mist', 'refreshing-face-mist', 550.00, 'images/prd16.jpg', 'A refreshing face mist to hydrate and invigorate your skin.', '2025-01-08 22:16:12', '2025-01-08 22:20:08', '2025-01-08 22:20:08'),
(22, 'Brightening Night Cream', NULL, 2400.00, 'product-images/01JH4K3T9STYSQ52G97Y05GRM7.png', 'night', '2025-01-08 22:23:15', '2025-01-08 22:35:10', '2025-01-08 22:35:10'),
(23, 'Sun Cream', NULL, 2400.00, 'product-images/01JH4K4MTGDJ0XSJ25VAYFG27P.png', 'sun', '2025-01-08 22:23:42', '2025-01-08 22:35:28', '2025-01-08 22:35:28'),
(24, 'Rejuvenating Night-time Body Lotion', 'rejuvenating-night-time-body-lotion', 690.00, 'images/prd1.jpg', 'A rejuvenating night-time body lotion to nourish your skin.', '2025-01-08 22:33:55', '2025-01-08 22:33:55', NULL),
(25, 'Sandalwood Day & Night Cream', 'sandalwood-day-night-cream', 690.00, 'images/prd2.jpg', 'A day & night cream with sandalwood to keep your skin glowing.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(26, 'Rejuvenating Day Cream', 'rejuvenating-day-cream', 690.00, 'images/prd3.jpg', 'A rejuvenating day cream that helps to brighten and smooth the skin.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(27, 'Brightening Day Cream', 'brightening-day-cream', 690.00, 'images/prd4.jpg', 'A brightening day cream that helps even skin tone and reduces dark spots.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(28, 'Anti-acne Cream', 'anti-acne-cream', 690.00, 'images/prd5.jpg', 'A cream to help reduce acne and prevent future breakouts.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(29, 'Walnut & Coffee Facial Scrub', 'walnut-coffee-facial-scrub', 690.00, 'images/prd6.jpg', 'A facial scrub with walnut and coffee to exfoliate and refresh your skin.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(30, 'Nourishing Lip Balm', 'nourishing-lip-balm', 490.00, 'images/prd7.jpg', 'A nourishing lip balm that keeps your lips soft and hydrated.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(31, 'Hydrating Face Mask', 'hydrating-face-mask', 990.00, 'images/prd8.jpg', 'A hydrating face mask to restore moisture and smooth your skin.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(32, 'Soothing Aloe Vera Gel', 'soothing-aloe-vera-gel', 450.00, 'images/prd9.jpg', 'A soothing aloe vera gel for calming irritated skin and sunburns.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(33, 'Lavender & Honey Body Scrub', 'lavender-honey-body-scrub', 850.00, 'images/prd10.jpg', 'A lavender & honey body scrub to exfoliate and moisturize your skin.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(34, 'Cleansing Micellar Water', 'cleansing-micellar-water', 650.00, 'images/prd11.jpg', 'A gentle cleansing micellar water to remove makeup and impurities.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(35, 'Aloe Vera Face Gel', 'aloe-vera-face-gel', 499.00, 'images/prd12.jpg', 'A soothing aloe vera face gel to calm and hydrate your skin.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(36, 'Rose & Aloe Vera Body Lotion', 'rose-aloe-vera-body-lotion', 750.00, 'images/prd13.jpg', 'A body lotion with rose and aloe vera to nourish and smooth your skin.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(37, 'Luxury Face Cream', 'luxury-face-cream', 1100.00, 'images/prd14.jpg', 'A luxury face cream for a radiant, youthful complexion.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(38, 'Exfoliating Sugar Scrub', 'exfoliating-sugar-scrub', 900.00, 'images/prd15.jpg', 'An exfoliating sugar scrub that removes dead skin cells and smooths the skin.', '2025-01-08 22:33:56', '2025-01-08 22:33:56', NULL),
(39, 'Refreshing Face Mist', 'refreshing-face-mist', 550.00, 'images/prd16.jpg', 'A refreshing face mist to hydrate and invigorate your skin.', '2025-01-08 22:33:57', '2025-01-08 22:33:57', NULL),
(40, 'Sun Cream', NULL, 2400.00, 'product-images/01JH4M0G2MYXYY6MZVZ4Z5HMHS.png', 'sun cream', '2025-01-08 22:38:55', '2025-01-08 23:01:31', '2025-01-08 23:01:31'),
(41, 'Sun Cream', NULL, 2400.00, 'product-images/01JH4N8BHHP1PE6H8F9KZSPJD4.png', 'dun dun dunn', '2025-01-08 23:00:41', '2025-01-08 23:01:39', '2025-01-08 23:01:39'),
(42, 'Sun Cream', NULL, 2400.00, 'product-images/01JH4NKDV8FXREW6X0BVS2CSKG.png', 'sun', '2025-01-08 23:06:44', '2025-01-08 23:06:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `content`, `rating`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'noice', 4, NULL, '2025-01-08 16:42:11', '2025-01-08 16:42:11'),
(2, 2, 'a great product', 4, NULL, '2025-01-09 04:30:10', '2025-01-09 04:30:10'),
(3, 2, 'great product!', 4, NULL, '2025-01-09 23:51:47', '2025-01-09 23:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3QFGFYJd7Sr8pMGyLijJj3ou3ty57fsg08FBR8hs', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zdGF0aXN0aWNzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjJSUGtNNVQ2Vm1Ca1BFcFROYmVCa1JGMGpLNjQ1NE5JbEg5OXhNWmwiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRmLy9yNTdzdTEuWnZaQWJWQ2pqWFFPOGZobzM3QzY0am1QbVFHR0tmUTBORDdyQ0dWNTZnSyI7fQ==', 1737708545),
('C3tn4ZUTlPjKgneAiARF2IBFGuQxGjzaSMti1OmZ', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo4OntzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3F1aXovcmVzdWx0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJWWnA4bUpOMTVmbVJKZk1WT3liSUdwYkpBRG4xajJnMm9ISElXWDJiIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkMHdSaE16OVk5SThtRXFPM00wMVNPZU5EelUxOXMxS2MwVWJLMDM3STFrZEhEZWRaekQxNHUiO3M6MTI6InF1aXpfYW5zd2VycyI7YToxNTp7aTowO3M6ODoiRHJ5IFNraW4iO2k6MTtzOjg6IldyaW5rbGVzIjtpOjI7czo4OiJDbGVhbnNlciI7aTozO3M6MzoiWWVzIjtpOjQ7czo1OiJPZnRlbiI7aTo1O3M6MTU6Ik1vZGVyYXRlbHkgT2lseSI7aTo2O3M6NzoiTWluaW1hbCI7aTo3O3M6MzoiWWVzIjtpOjg7czozOiJZZXMiO2k6OTtzOjQ6IkZhaXIiO2k6MTA7czoyOiJObyI7aToxMTtzOjg6IkNoZW1pY2FsIjtpOjEyO3M6MTQ6IlZlcnkgU2Vuc2l0aXZlIjtpOjEzO3M6MTA6IkZyZXF1ZW50bHkiO2k6MTQ7czozOiJZZXMiO31zOjQ6ImNhcnQiO2E6NDp7czowOiIiO2E6Mzp7czo0OiJuYW1lIjtzOjQyOiJSYWRpYW50ICYgUHJvdGVjdGl2ZSBCcmlnaHRlbmluZyBEYXkgQ3JlYW0iO3M6NToicHJpY2UiO3M6NDoiMjgwMCI7czo4OiJxdWFudGl0eSI7aToxMjt9aToyNTthOjM6e3M6NDoibmFtZSI7czoyODoiU2FuZGFsd29vZCBEYXkgJiBOaWdodCBDcmVhbSI7czo1OiJwcmljZSI7czo2OiI2OTAuMDAiO3M6ODoicXVhbnRpdHkiO2k6MTt9aToyNDthOjM6e3M6NDoibmFtZSI7czozNToiUmVqdXZlbmF0aW5nIE5pZ2h0LXRpbWUgQm9keSBMb3Rpb24iO3M6NToicHJpY2UiO3M6NjoiNjkwLjAwIjtzOjg6InF1YW50aXR5IjtpOjE7fWk6MjY7YTozOntzOjQ6Im5hbWUiO3M6MjI6IlJlanV2ZW5hdGluZyBEYXkgQ3JlYW0iO3M6NToicHJpY2UiO3M6NjoiNjkwLjAwIjtzOjg6InF1YW50aXR5IjtpOjE7fX19', 1737709884);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role`, `is_admin`) VALUES
(1, 'satoru', 'satoru@gmail.com', NULL, '$2y$12$qy86H6N9/24EHP9o6S2t6OaiC1SXC97oor/V3zX0Sleob6DTc9/Tm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-08 16:36:25', '2025-01-08 16:36:25', 'user', 0),
(2, 'danny', 'motta@gmail.com', NULL, '$2y$12$pfXACU7IKmZuV5ptrKYvFO8A372P7XFKx1wpeaAoJORp8o4Px7uCm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 00:27:41', '2025-01-09 00:27:41', 'user', 0),
(3, 'Admin', 'admin@example.com', NULL, '$2y$12$f//r57su1.ZvZAbVCjjXQO8fho37C64jmPmQGGKfQ0ND7rCGV56gK', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-24 01:13:31', '2025-01-24 01:13:31', 'admin', 0),
(5, 'Odysseus', 'ody@gmail.com', NULL, '$2y$12$0wRhMz9Y9I8mEqO3M01SOeNDzU19s1Kc0UbK037I1kdHDedZzD14u', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-24 03:17:09', '2025-01-24 03:17:09', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_results`
--

CREATE TABLE `user_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_results`
--

INSERT INTO `user_results` (`id`, `user_id`, `result`, `created_at`, `updated_at`) VALUES
(1, 2, '85%', '2025-01-23 10:19:30', '2025-01-23 10:19:30'),
(2, 2, '85%', '2025-01-23 10:20:16', '2025-01-23 10:20:16'),
(3, 2, '85%', '2025-01-23 10:21:26', '2025-01-23 10:21:26'),
(4, 2, '85%', '2025-01-23 10:21:50', '2025-01-23 10:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_result_products`
--

CREATE TABLE `user_result_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_result_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_routines`
--

CREATE TABLE `user_routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `dermatologists`
--
ALTER TABLE `dermatologists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dermatologists_email_unique` (`email`);

--
-- Indexes for table `derm_appointments`
--
ALTER TABLE `derm_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_results`
--
ALTER TABLE `user_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_results_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_result_products`
--
ALTER TABLE `user_result_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_result_products_user_result_id_foreign` (`user_result_id`),
  ADD KEY `user_result_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `user_routines`
--
ALTER TABLE `user_routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_routines_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dermatologists`
--
ALTER TABLE `dermatologists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `derm_appointments`
--
ALTER TABLE `derm_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_results`
--
ALTER TABLE `user_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_result_products`
--
ALTER TABLE `user_result_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_routines`
--
ALTER TABLE `user_routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_results`
--
ALTER TABLE `user_results`
  ADD CONSTRAINT `user_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_result_products`
--
ALTER TABLE `user_result_products`
  ADD CONSTRAINT `user_result_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_result_products_user_result_id_foreign` FOREIGN KEY (`user_result_id`) REFERENCES `user_results` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_routines`
--
ALTER TABLE `user_routines`
  ADD CONSTRAINT `user_routines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
