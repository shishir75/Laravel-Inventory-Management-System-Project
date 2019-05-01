-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 06:20 PM
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
-- Database: `laravel_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanced__salaries`
--

CREATE TABLE `advanced__salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advanced_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advanced__salaries`
--

INSERT INTO `advanced__salaries` (`id`, `employee_id`, `month`, `year`, `advanced_salary`, `created_at`, `updated_at`) VALUES
(1, 1, 'march', '2019', '30000', '2019-04-22 11:04:16', '2019-04-22 11:04:16'),
(2, 2, 'february', '2019', '40000', '2019-04-22 12:08:40', '2019-04-22 12:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `attendance` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `attendance`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-04-24', 'april', '2019', '2019-04-24 11:35:52', '2019-04-24 12:16:05'),
(2, 2, 0, '2019-04-24', 'april', '2019', '2019-04-24 11:35:52', '2019-04-25 15:58:05'),
(3, 3, 1, '2019-04-24', 'april', '2019', '2019-04-24 11:35:52', '2019-04-25 15:58:05'),
(10, 1, 1, '2019-04-25', 'april', '2019', '2019-04-25 16:38:57', '2019-04-25 16:38:57'),
(11, 2, 0, '2019-04-25', 'april', '2019', '2019-04-25 16:38:57', '2019-04-25 16:38:57'),
(12, 3, 1, '2019-04-25', 'april', '2019', '2019-04-25 16:38:57', '2019-04-25 16:38:57'),
(13, 1, 1, '2019-04-26', 'april', '2019', '2019-04-26 16:34:29', '2019-04-26 16:34:29'),
(14, 2, 0, '2019-04-26', 'april', '2019', '2019-04-26 16:34:29', '2019-04-26 16:34:29'),
(15, 3, 1, '2019-04-26', 'april', '2019', '2019-04-26 16:34:29', '2019-04-26 16:34:29'),
(16, 1, 1, '2019-04-27', 'april', '2019', '2019-04-27 07:45:36', '2019-04-27 07:45:36'),
(17, 2, 0, '2019-04-27', 'april', '2019', '2019-04-27 07:45:36', '2019-04-27 07:45:36'),
(18, 3, 1, '2019-04-27', 'april', '2019', '2019-04-27 07:45:36', '2019-04-27 07:45:36'),
(19, 1, 1, '2019-05-01', 'may', '2019', '2019-05-01 16:12:42', '2019-05-01 16:12:42'),
(20, 2, 1, '2019-05-01', 'may', '2019', '2019-05-01 16:12:42', '2019-05-01 16:12:42'),
(21, 3, 1, '2019-05-01', 'may', '2019', '2019-05-01 16:12:42', '2019-05-01 16:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'men', '2019-04-23 07:35:13', '2019-04-23 10:29:32'),
(2, 'Women', 'women', '2019-04-23 10:04:27', '2019-04-23 10:29:46'),
(3, 'Child', 'child', '2019-04-23 10:04:40', '2019-04-23 10:29:58'),
(4, 'Food', 'food', '2019-04-23 10:30:15', '2019-04-23 10:30:15'),
(5, 'Cloths', 'cloths', '2019-04-23 10:30:28', '2019-04-23 10:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `city`, `shop_name`, `photo`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `created_at`, `updated_at`) VALUES
(1, 'Rimon Rana', 'rimon@gmail.com', '14777777555', 'MBH', 'Savar', 'RR Shop', 'rimon-rana-2019-04-22-5cbd5c64c0468.jpg', 'Rimon Rana', 'RR-12345678901', 'DBBL', 'Savar', '2019-04-22 00:17:08', '2019-04-22 00:17:08'),
(2, 'Shishir Sarder', 'shishir.srdr16@gmail.com', '1723795078', 'RTH', 'Savar', 'SS Shop', 'shishir-sarder-2019-04-27-5cc40f314d36a.JPG', 'Shishir Sarder', 'SS-1234567890', 'DBBL', 'Savar', '2019-04-27 08:13:39', '2019-04-27 08:13:39'),
(3, 'Jarin Tasnim Ritu', 'jarinritu9@gmail.com', '1303224466', 'Room# 731, Fazilatunnesa Hall, Jahangirnagar University', 'Savar', 'JR Shop', 'jarin-tasnim-ritu-2019-04-28-5cc5b0c3751ea.png', 'Jarin Tasnim Ritu', 'JR-53454356346451', 'DBBL', 'Savar', '2019-04-28 13:55:16', '2019-04-28 13:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `city`, `experience`, `photo`, `nid_no`, `salary`, `vacation`, `created_at`, `updated_at`) VALUES
(1, 'Shishir Sarder', 'shishir.srdr16@gmail.com', '1723795071', 'RTH, 503', 'Savar', '2', 'shishir-sarder-2019-04-21-5cbcdb0b7ffb4.JPG', '1993491778481', '30000', 'No', '2019-04-21 11:37:13', '2019-04-21 15:05:17'),
(2, 'Jarin Tasnim Ritu', 'jarinritu9@gmail.com', '01841795078', 'FZ, JU', 'Savar', '2', 'jarin-tasnim-ritu-2019-04-21-5cbcdb26e344f.jpg', '199649177841122280', '35000', 'Yes', '2019-04-21 11:52:29', '2019-04-21 15:05:43'),
(3, 'Kawsar Ahmed', 'kawsar@gmail.com', '014856663253', 'RTH, 503', 'Savar', '2', 'kawsar-ahmed-2019-04-22-5cbe197b6ac9a.jpg', '199649177841122280', '25000', '20', '2019-04-22 13:43:55', '2019-04-22 13:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `amount`, `month`, `year`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Buy a Book', 220.00, 'April', '2019', '2019-04-23', '2019-04-23 12:59:29', '2019-04-23 12:59:29'),
(2, 'Buy a Pendrive', 500.00, 'April', '2019', '2019-04-23', '2019-04-23 13:43:24', '2019-04-23 13:43:24'),
(4, 'Rikhsha Vara', 15.00, 'April', '2019', '2019-04-24', '2019-04-23 20:33:56', '2019-04-23 20:33:56'),
(5, 'Breakfast', 30.00, 'April', '2019', '2019-04-24', '2019-04-23 20:50:58', '2019-04-23 20:50:58'),
(6, 'Bus Vara', 10.00, 'April', '2019', '2019-04-24', '2019-04-23 20:51:35', '2019-04-23 20:57:39'),
(7, 'Lunch', 1545.00, 'April', '2018', '2019-04-24', '2018-04-24 07:32:33', '2019-04-24 07:32:33'),
(8, 'Pizza', 309.00, 'April', '2019', '2019-04-29', '2019-04-29 17:15:10', '2019-04-29 17:15:10'),
(9, 'Others', 100.00, 'April', '2019', '2019-04-29', '2019-04-29 17:15:24', '2019-04-29 17:15:24'),
(10, 'Total', 400.00, 'April', '2019', '2019-04-30', '2019-04-30 17:41:48', '2019-04-30 17:41:48'),
(11, 'Lunch', 30.00, 'May', '2019', '2019-05-01', '2019-05-01 08:53:03', '2019-05-01 08:53:03'),
(12, 'Diner', 30.00, 'May', '2019', '2019-05-01', '2019-05-01 15:58:42', '2019-05-01 15:58:42');

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
(3, '2019_04_20_180941_create_employees_table', 1),
(4, '2019_04_21_211351_create_customers_table', 2),
(5, '2019_04_21_212214_create_customers_table', 3),
(6, '2019_04_22_060343_create_suppliers_table', 4),
(7, '2019_04_22_093444_create_salaries_table', 5),
(8, '2019_04_22_162015_create_advanced__salaries_table', 6),
(9, '2019_04_22_183251_create_salaries_table', 7),
(10, '2019_04_23_131117_create_categories_table', 8),
(11, '2019_04_23_135321_create_products_table', 9),
(12, '2019_04_23_181555_create_expenses_table', 10),
(13, '2019_04_23_185416_create_expenses_table', 11),
(14, '2019_04_24_144756_create_attendances_table', 12),
(18, '2019_04_25_224956_create_settings_table', 13),
(19, '2019_04_27_221009_create_orders_table', 13),
(20, '2019_04_27_221136_create_order_details_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` int(11) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `vat` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `payment_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` double(8,2) DEFAULT NULL,
  `due` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(1, 2, '2019-04-27', 'approved', 5, 1610.00, 338.10, 1948.10, 'HandCash', 1500.00, 448.10, '2018-04-27 17:36:20', '2019-04-28 10:21:26'),
(2, 1, '2019-04-27', 'approved', 1, 500.00, 105.00, 605.00, 'HandCash', 605.00, 0.00, '2019-04-27 17:41:57', '2019-04-28 10:32:57'),
(4, 2, '2019-04-27', 'pending', 2, 110.00, 23.10, 133.10, 'Cheque', 100.00, 33.00, '2019-04-27 17:49:18', '2019-04-27 17:49:18'),
(5, 2, '2019-04-27', 'pending', 2, 555.00, 116.55, 671.55, 'Cheque', 600.00, 71.00, '2019-04-27 17:50:14', '2019-04-27 17:50:14'),
(6, 2, '2019-04-28', 'approved', 2, 1000.00, 231.00, 1231.00, 'HandCash', 1000.00, 231.00, '2019-04-28 15:44:29', '2019-04-28 15:50:04'),
(7, 1, '2019-04-28', 'pending', 1, 600.00, 126.00, 726.00, 'Cheque', 700.00, 26.00, '2019-04-28 15:48:43', '2019-04-28 15:48:43'),
(8, 2, '2019-04-29', 'approved', 3, 710.00, 149.10, 859.10, 'HandCash', 800.00, 59.10, '2019-04-29 16:50:32', '2019-04-29 16:51:12'),
(9, 3, '2019-04-29', 'approved', 2, 555.00, 116.55, 671.55, 'Cheque', 500.00, 171.55, '2019-04-29 17:45:24', '2019-04-29 17:46:39'),
(13, 3, '2019-04-30', 'pending', 2, 110.00, 23.10, 133.10, 'Cheque', 100.00, 33.10, '2019-04-30 16:07:29', '2019-04-30 16:07:29'),
(15, 1, '2019-04-30', 'pending', 2, 655.00, 137.55, 792.55, 'Cheque', 500.00, 292.55, '2019-04-30 16:14:46', '2019-04-30 16:14:46'),
(19, 2, '2019-04-30', 'pending', 3, 1700.00, 357.00, 2057.00, 'HandCash', 2000.00, 57.00, '2019-04-30 16:55:13', '2019-04-30 16:55:13'),
(20, 3, '2019-04-30', 'approved', 4, 1210.00, 254.10, 1464.10, 'Cheque', 1000.00, 464.10, '2019-04-30 17:22:26', '2019-04-30 17:22:37'),
(21, 2, '2019-05-01', 'approved', 11, 3130.00, 657.30, 3787.30, 'HandCash', 3500.00, 287.30, '2019-04-30 18:02:20', '2019-04-30 18:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_cost` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unit_cost`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 55.00, 133.10, '2019-04-27 17:36:20', '2019-04-27 17:36:20'),
(2, 1, 2, 3, 500.00, 1815.00, '2019-04-27 17:36:20', '2019-04-27 17:36:20'),
(3, 2, 2, 1, 500.00, 605.00, '2019-04-27 17:41:57', '2019-04-27 17:41:57'),
(5, 4, 1, 2, 55.00, 133.10, '2019-04-27 17:49:18', '2019-04-27 17:49:18'),
(6, 5, 1, 1, 55.00, 66.55, '2019-04-27 17:50:14', '2019-04-27 17:50:14'),
(7, 5, 2, 1, 500.00, 605.00, '2019-04-27 17:50:14', '2019-04-27 17:50:14'),
(8, 6, 3, 1, 600.00, 726.00, '2019-04-28 15:44:29', '2019-04-28 15:44:29'),
(9, 6, 2, 1, 500.00, 605.00, '2019-04-28 15:44:29', '2019-04-28 15:44:29'),
(10, 7, 3, 1, 600.00, 726.00, '2019-04-28 15:48:43', '2019-04-28 15:48:43'),
(11, 8, 1, 2, 55.00, 133.10, '2019-04-29 16:50:32', '2019-04-29 16:50:32'),
(12, 8, 3, 1, 600.00, 726.00, '2019-04-29 16:50:32', '2019-04-29 16:50:32'),
(13, 9, 2, 1, 500.00, 605.00, '2019-04-29 17:45:24', '2019-04-29 17:45:24'),
(14, 9, 1, 1, 55.00, 66.55, '2019-04-29 17:45:25', '2019-04-29 17:45:25'),
(23, 13, 1, 2, 55.00, 133.10, '2019-04-30 16:07:29', '2019-04-30 16:07:29'),
(26, 15, 1, 1, 55.00, 66.55, '2019-04-30 16:14:47', '2019-04-30 16:14:47'),
(27, 15, 3, 1, 600.00, 726.00, '2019-04-30 16:14:47', '2019-04-30 16:14:47'),
(35, 19, 2, 1, 500.00, 605.00, '2019-04-30 16:55:13', '2019-04-30 16:55:13'),
(36, 19, 3, 2, 600.00, 1452.00, '2019-04-30 16:55:13', '2019-04-30 16:55:13'),
(37, 20, 3, 1, 600.00, 726.00, '2019-04-30 17:22:26', '2019-04-30 17:22:26'),
(38, 20, 2, 1, 500.00, 605.00, '2019-04-30 17:22:26', '2019-04-30 17:22:26'),
(39, 20, 1, 2, 55.00, 133.10, '2019-04-30 17:22:26', '2019-04-30 17:22:26'),
(40, 21, 2, 2, 500.00, 1210.00, '2019-04-30 18:02:20', '2019-04-30 18:02:20'),
(41, 21, 3, 3, 600.00, 2178.00, '2019-04-30 18:02:20', '2019-04-30 18:02:20'),
(42, 21, 1, 6, 55.00, 399.30, '2019-04-30 18:02:20', '2019-04-30 18:02:20');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `garage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `buying_price` double(8,2) NOT NULL,
  `selling_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `supplier_id`, `code`, `garage`, `route`, `image`, `buying_date`, `expire_date`, `buying_price`, `selling_price`, `created_at`, `updated_at`) VALUES
(1, 'Rice', 4, 2, 'F-01', 'B', 'D', 'rice-2019-04-23-5cbf3ddde4a0e.jpg', '2019-04-23 00:00:00', '2019-05-01 00:00:00', 52.00, 55.00, '2019-04-23 10:31:25', '2019-04-23 11:50:23'),
(2, 'Mens Polo Shirt', 1, 1, 'M-01', 'C', 'D', 'shirt-2019-04-23-5cbf40bc6a22d.jpg', '2019-04-23 00:00:00', '2019-04-29 00:00:00', 450.00, 500.00, '2019-04-23 10:43:40', '2019-04-27 08:51:15'),
(3, 'Pizza', 4, 1, 'F-02', 'A', 'B', 'pizza-2019-04-28-5cc5b1bd0cd75.jpg', '2019-04-28 00:00:00', '2022-04-28 00:00:00', 500.00, 600.00, '2019-04-28 13:59:25', '2019-04-28 13:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'abc',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'xyz',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'abcd@gmail.com',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'savar',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bangladesh',
  `zip_code` int(11) NOT NULL DEFAULT '1000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `address`, `email`, `phone`, `mobile`, `logo`, `city`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'BD Lab IT', '5th Floor, Mofiz Plaza, Beside City Center', 'info@bdlabit.com', '2456358', '1744681133', 'bd-lab-it-2019-04-27-5cc492d9e5bfc.JPG', 'savar', 'Bangladesh', 1340, NULL, '2019-04-27 17:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `city`, `type`, `photo`, `shop_name`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `created_at`, `updated_at`) VALUES
(1, 'Maruf Hosen', 'maruf1@gmail.com', '017253456211', 'RTH, 5031', 'Savar', '1', 'maruf-hosen1-2019-04-22-5cbd867344a53.jpg', 'MH Shop', 'Maruf Hosen', 'MH-5345435634645', 'DBBL', 'Savar', '2019-04-22 00:42:12', '2019-04-23 10:50:28'),
(2, 'Kawsar Ahmed', 'kawsar@gmail.com', '01723795078', 'RTH, 503', 'Savar', '2', 'kawsar-ahmed-2019-04-23-5cbf383a9dc17.jpg', 'KA Shop', 'Kawsar Ahmed', 'KA-5345435634645', 'DBBL', 'Savar', '2019-04-23 10:07:23', '2019-04-23 10:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shishir Sarder', 'shishir.srdr16@gmail.com', NULL, '$2y$10$gOeBQff1H2BRRKiXZbgFX.7585tREzRw2buKfE/SOftUqlPBfO2Q6', NULL, '2019-04-21 07:31:45', '2019-04-21 07:31:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanced__salaries`
--
ALTER TABLE `advanced__salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advanced__salaries`
--
ALTER TABLE `advanced__salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
