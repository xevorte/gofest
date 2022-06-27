-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 12:18 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofest`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `travel_packages_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `travel_packages_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 1, 'assets/gallery/gJIszu0Ubpj5CUFjFjD7PIYuMHyE1ILmyuUVHSTI.jpg', '2021-11-06 01:00:04', '2021-11-06 01:00:04'),
(4, 1, 'assets/gallery/1WcJh7gpkGvpGfpZKXLHborudmOUDniQfyK0lPG1.jpg', '2021-11-06 01:00:37', '2021-11-06 01:00:37'),
(5, 1, 'assets/gallery/F03uJXYQfnyuKpsR3k1YQyFOGnJw9gR0Y8jYn19j.jpg', '2021-11-06 01:00:49', '2021-11-06 01:03:48'),
(6, 1, 'assets/gallery/shVb0MpkHf0ygIIgFmT0HDmv6LIOsMiTFxjSFOOp.jpg', '2021-11-06 01:01:07', '2021-11-06 01:01:07'),
(7, 1, 'assets/gallery/p79Rh6LmdQsHmpkF3uTyaPACLsxPfwDpyMahmCNp.jpg', '2021-11-06 01:01:17', '2021-11-06 01:40:37'),
(8, 7, 'assets/gallery/OSlW9TTW5ngmATMIWIYqMkzz4kHRjJXLi3uURCP5.jpg', '2021-12-13 08:46:39', '2021-12-13 08:46:39'),
(9, 7, 'assets/gallery/mhzr8xUyrxNp6gtIdZx0tm7hZRQIZ0xCn0ZV3StK.jpg', '2021-12-13 08:48:11', '2021-12-13 08:48:11'),
(10, 6, 'assets/gallery/PWysCNSih1ihrI51Db12G1cZRZkhgv4kAXByAlPK.jpg', '2021-12-13 09:12:04', '2021-12-13 09:12:04'),
(11, 2, 'assets/gallery/lRqJ1aQKErYZItflxoc7mtwqxs4kiQlIk3HlDpuX.jpg', '2021-12-13 09:15:20', '2021-12-13 09:15:20'),
(12, 3, 'assets/gallery/hoB6l4T1pcbVQG7o1uFxYySrulODBN3S9tVaFXGa.jpg', '2021-12-13 09:17:48', '2021-12-13 09:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_24_084352_create_testimonials_table', 1),
(5, '2021_10_25_052231_create_travel_packages_table', 1),
(6, '2021_10_25_154329_create_galleries_table', 2),
(7, '2021_10_26_114852_add_roles_field_to_users_table', 3),
(12, '2021_11_04_112858_create_transactions_table', 4),
(13, '2021_12_06_155412_create_transportations_table', 5),
(14, '2021_12_09_125359_create_transaction_transportations_table', 6),
(15, '2021_10_25_154329_create_payments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_travel_packages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_transportations_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `users_id`, `transaction_travel_packages_id`, `transaction_transportations_id`, `image`, `name`, `type`, `created_at`, `updated_at`) VALUES
(6, 14, 24, NULL, 'assets/payment/XXPldEgeUnFCuqe9TWfQfHqDLnCleFRmBNEuShZV.png', 'BCA', 'Bank Transfer', '2021-12-17 06:00:57', '2021-12-17 06:00:57'),
(9, 14, NULL, 3, 'assets/payment/OLmswDDkILf8dCa4O8CUFfU2NCd7Yky9ZB2q7VmW.png', 'BNI', 'Bank Transfer', '2021-12-17 12:36:06', '2021-12-17 12:36:06'),
(10, 16, 37, NULL, 'assets/payment/HftFU3miLUCGArE8Et8sk1jmmSYiwDdjuWINHp1O.png', 'BCA', 'Bank Transfer', '2022-02-17 21:21:02', '2022-02-17 21:21:02'),
(11, 16, NULL, 6, 'assets/payment/Rjh3qoXzZ3BusarYpva9ooNh9GcZ5wwFxJ40DsK2.png', 'BRI', 'Bank Transfer', '2022-02-17 21:29:06', '2022-02-17 21:29:06'),
(12, 17, 39, NULL, 'assets/payment/q6j33W5s9veI1AtpOIP2ZXmxoTG97PiK9Wf5DNv5.jpg', 'BRI', 'Bank Transfer', '2022-02-18 00:33:43', '2022-02-18 00:33:43'),
(13, 17, NULL, 7, 'assets/payment/UecnZlKFO3D7y2Zwu7zJqAA0nFR5Me0oDuwlP2NL.jpg', 'Mandiri', 'Bank Transfer', '2022-02-18 00:38:39', '2022-02-18 00:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `travel_packages_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `travel_packages_id`, `title`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Eum necessitatibus distinctio doloribus asperiores.', 'Qui accusantium ut est consequatur expedita eum. Ullam accusantium eligendi porro error. Officiis eos molestias voluptate est.', 4, '2021-10-25 04:13:50', '2021-10-25 04:13:50'),
(2, 3, 2, 'Dolor blanditiis optio et.', 'Labore et vitae eos ipsum et maiores perspiciatis. Necessitatibus veniam placeat totam. Et culpa ut deserunt sint totam ea.', 4, '2021-10-25 04:13:50', '2021-10-25 04:13:50'),
(3, 4, 6, 'Et repellendus inventore sint.', 'Ab similique modi non eligendi possimus dolore. Ab ratione deleniti eum repudiandae.', 4, '2021-10-25 04:13:50', '2021-10-25 04:13:50'),
(4, 3, 1, 'Cum blanditiis eos consequatur nostrum.', 'Consequatur neque voluptas sequi. Incidunt dignissimos est quisquam illum qui. Libero occaecati qui est et repellat.', 5, '2021-10-25 04:13:50', '2021-10-25 04:13:50'),
(5, 2, 3, 'Hotel awikwok nich', 'Dolorem quis unde neque unde et voluptas. Aperiam est et laborum omnis maiores. Quo omnis ipsa velit est sequi in nihil consequuntur.', 3, '2021-10-25 04:13:50', '2021-11-03 01:15:05'),
(13, 12, 2, 'Mari Menginap Disini Gan!', 'sdadasdfsdfhsakghsdkghskaghkdsghskghskghoorohrqohroqhhkdshfkshdksdhfkshfohewruhfwofhwofhsjfkshdfkshfkasfhasfhoefowhfhwfdfshskdfhdaskfsafshfkdhksafdlasfhdksfhaskfhas', 4, '2021-11-03 04:54:54', '2021-11-03 04:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `travel_packages_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `rooms` int(11) NOT NULL,
  `guests` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `type_room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `travel_packages_id`, `users_id`, `transaction_code`, `name`, `email`, `phone_number`, `check_in`, `check_out`, `rooms`, `guests`, `duration`, `type_room`, `transaction_total`, `transaction_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(22, 1, 14, 'GF2139', 'Irham Shidiq', 'birhamshidiq@gmail.com', '6281310481842', '2021-11-19', '2021-11-22', 1, 2, 3, 'Suite Room', 184, 'SUCCESSFUL', '2021-12-24 08:21:02', '2021-11-18 04:34:30', '2021-12-24 08:21:02'),
(23, 2, 14, 'GF0146', 'Harold', 'hrld@gmail.com', '1453524323232', '2021-11-18', '2021-11-20', 1, 1, 2, 'Standard Room', 197, 'FAILED', '2021-12-17 08:16:41', '2021-11-18 04:38:30', '2021-12-17 08:16:41'),
(24, 1, 14, 'GF4552', 'dasasd', 'dsadas@fafa.com', '156332432', '2021-11-19', '2021-11-20', 1, 1, 1, 'Standard Room', 185, 'FAILED', NULL, '2021-11-18 06:07:59', '2021-12-17 12:39:14'),
(33, 3, 14, 'GF3052', 'John Doe', 'john@example.com', '6321231312', '2021-12-20', '2021-12-21', 1, 1, 1, 'Standard Room', 116, 'FAILED', NULL, '2021-12-17 01:11:43', '2022-02-17 21:16:04'),
(35, 2, 14, 'GF1549', 'John Doe', 'user@gmail.com', '4242332', '2021-12-19', '2021-12-20', 1, 1, 1, 'Standard Room', 116, 'PENDING', NULL, '2021-12-17 12:14:04', '2021-12-17 12:14:04'),
(36, 7, 14, 'GF4185', 'John Doe', 'john@example.com', '879', '2021-12-20', '2021-12-23', 2, 4, 3, 'Standard Room', 136, 'PENDING', '2021-12-17 17:00:18', '2021-12-17 16:50:23', '2021-12-17 17:00:18'),
(37, 2, 16, 'GF4738', 'FutureMedia', 'das@fdssf', '5233231213', '2022-02-19', '2022-02-21', 1, 2, 2, 'Deluxe Room', 139, 'SUCCESSFUL', NULL, '2022-02-17 21:19:40', '2022-02-17 21:30:26'),
(38, 7, 16, 'GF1293', 'FutureMedia', 'birhamshidiq@gmail.com', '312123213', '2022-02-19', '2022-02-20', 1, 1, 1, 'Suite Room', 61, 'FAILED', '2022-02-17 21:33:52', '2022-02-17 21:32:08', '2022-02-17 21:33:52'),
(39, 7, 17, 'GF9777', 'John Doe', 'user@gmail.com', '1234567', '2022-02-19', '2022-02-21', 2, 2, 2, 'Deluxe Room', 123, 'SUCCESSFUL', NULL, '2022-02-18 00:32:02', '2022-02-18 00:44:42'),
(40, 6, 17, 'GF1338', 'FutureMedia', 'user1@gmail.com', '565657', '2022-02-19', '2022-02-22', 2, 2, 3, 'Standard Room', 306, 'PENDING', NULL, '2022-02-18 00:41:13', '2022-02-18 00:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_transportations`
--

CREATE TABLE `transaction_transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transportations_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guests` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_transportations`
--

INSERT INTO `transaction_transportations` (`id`, `transportations_id`, `users_id`, `transaction_code`, `name`, `email`, `phone_number`, `from`, `to`, `guests`, `departure_date`, `departure_time`, `class`, `transaction_total`, `transaction_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 5, 14, 'GF7139', 'xcxzdas', 'das@fdssf', '31', 'Jakarta', 'Bandung', 1, '2021-12-19', '13:00:00', 'Economy', 73, 'SUCCESSFUL', '2022-02-17 21:31:05', '2021-12-17 12:26:27', '2022-02-17 21:31:05'),
(6, 6, 16, 'GF8480', 'Media Verse', 'john@example.com', '1234567', 'Jakarta', 'Bandung', 2, '2022-02-19', '09:30:00', 'Economy', 143, 'WAITING', NULL, '2022-02-17 21:27:54', '2022-02-17 21:29:07'),
(7, 4, 17, 'GF8934', 'John Doe', 'user@gmail.com', '22312131213232', 'Bandung', 'Jakarta', 2, '2022-02-19', '13:00:00', 'Economy', 143, 'WAITING', NULL, '2022-02-18 00:36:54', '2022-02-18 00:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transportations`
--

INSERT INTO `transportations` (`id`, `image`, `company_name`, `slug`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'assets/gallery/zCEgwPSHbW9MZ0vy8kAfmFBOAyYO1r1oTlbmX4Zu.jpg', 'Citilink', 'citilink', 'Flights', 'Unavailable', '2021-12-06 10:50:31', '2021-12-08 09:26:51'),
(4, 'assets/gallery/qRgr0ul4jy0grOEbPHOFLxCKUX0Us9hawC6TRPUT.jpg', 'Malabar', 'malabar', 'Trains', 'Available', '2021-12-08 09:13:56', '2021-12-08 09:13:56'),
(5, 'assets/gallery/Uhy8J4dJMlNDoI4JVBVJBEZb7tofflngK7o2d8Zl.jpg', 'Lion Air', 'lion-air', 'Flights', 'Available', '2021-12-08 09:14:44', '2021-12-08 09:14:44'),
(6, 'assets/gallery/Ah07ilEBDFMxO9r0r9glcFE65rWacmlhAOWTF8n9.jpg', 'Jackal Holidays', 'jackal-holidays', 'Bus', 'Available', '2021-12-08 09:20:35', '2021-12-08 09:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `travel_packages`
--

CREATE TABLE `travel_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` float NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant` int(11) NOT NULL DEFAULT 0,
  `wifi` int(11) NOT NULL DEFAULT 0,
  `elevator` int(11) NOT NULL DEFAULT 0,
  `breakfast` int(11) NOT NULL DEFAULT 0,
  `parking` int(11) NOT NULL DEFAULT 0,
  `laundry` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_packages`
--

INSERT INTO `travel_packages` (`id`, `title`, `slug`, `description`, `rating`, `city`, `area`, `country`, `type`, `price`, `restaurant`, `wifi`, `elevator`, `breakfast`, `parking`, `laundry`, `created_at`, `updated_at`) VALUES
(1, 'APA Hotel Shinjuku Kabukicho Tower', 'apa-hotel-shinjuku-kabukicho-tower', 'Travel is the movement of people between distant geographical locations. Travel can be done by foot, bicycle, automobile, train, boat, bus, airplane, ship or other means, with or without luggage, and can be one way or round trip. Travel can also include r', 4.5, 'Shinjuku', 'Tokyo', 'Japanese', 'Hotels', '90', 1, 1, 1, 0, 1, 1, '2021-10-25 11:27:00', '2021-11-06 02:16:39'),
(2, 'Sakura Hostel Asakusa', 'sakura-hostel-asakusa', 'Travel is the movement of people between distant geographical locations. Travel can be done by foot, bicycle, automobile, train, boat, bus, airplane, ship or other means, with or without luggage, and can be one way or round trip. Travel can also include', 4.2, 'Asakusa', 'Tokyo', 'Japanese', 'Hostels', '80', 0, 1, 1, 0, 1, 0, '2021-10-25 14:12:00', '2021-11-06 02:17:20'),
(3, 'Eatone Residences', 'eatone-residences', 'Travel is the movement of people between distant geographical locations. Travel can be done by foot, bicycle, automobile, train, boat, bus, airplane, ship or other means, with or without luggage, and can be one way or round trip. Travel can also include', 3.6, 'Wan Chai Gap Road', 'Wan Chai', 'Hong Kong', 'Apartments', '80', 0, 1, 1, 0, 1, 1, NULL, '2021-11-06 02:17:36'),
(6, 'Platzl Hotel', 'platzl-hotel', 'Hotel yang sangat cocok untuk anda berlibur di German bersama keluarga maupun teman', 4.3, 'Sparkassenstrasse', 'Munich', 'Germany', 'Hotels', '96', 1, 1, 1, 0, 1, 0, '2021-11-02 22:49:19', '2021-11-06 02:17:46'),
(7, 'Batavia Apartments', 'batavia-apartments', 'big apartment. wifi was a on a good connection. breakfast was nice. has a very nice view from window. very comfortable.', 4.1, 'Tanah Abang', 'Jakarta Pusat', 'Indonesia', 'Apartments', '42', 1, 1, 1, 0, 1, 1, '2021-12-13 08:44:59', '2021-12-13 08:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `job`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Andreanne O\'Hara', 'kertzmann.allan@example.org', 'Telephone Station Installer and Repairer', NULL, '2021-10-25 04:13:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SXCuOf1gMa', '2021-10-25 04:13:50', '2021-10-25 04:13:50', 'USER'),
(2, 'Nash Boehm', 'alejandra87@example.com', 'Computer Specialist', NULL, '2021-10-25 04:13:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ghs3YadMgb', '2021-10-25 04:13:50', '2021-10-25 04:13:50', 'USER'),
(3, 'Dr. Sydney Schinner Sr.', 'wcasper@example.net', 'Crossing Guard', NULL, '2021-10-25 04:13:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7BvP1eZZ9N', '2021-10-25 04:13:50', '2021-10-25 04:13:50', 'USER'),
(4, 'Mrs. Emie Herman Sr.', 'johns.ana@example.net', 'Floor Finisher', NULL, '2021-10-25 04:13:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fi7OIYsZF0', '2021-10-25 04:13:50', '2021-10-25 04:13:50', 'USER'),
(5, 'Tyrel Leannon', 'xhyatt@example.org', 'Market Research Analyst', NULL, '2021-10-25 04:13:50', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ReELUAz8I5', '2021-10-25 04:13:50', '2021-10-25 04:13:50', 'USER'),
(12, 'Admin', 'admin@gmail.com', 'Developer', 'assets/user_image/rk6v7egPNLrelsXZwMmIKQcIqpq32C6KbMiDdQpM.jpg', '2021-10-26 08:02:41', '$2y$10$frCGyYdp1cmMuSfl8HD/UOkQC3nwe5lYSmUXmmPOJOaSAqP0U4fei', 'zTIg95A9EXaZ3fMzpcBoAIFdW8EUUYWBheq3Boop3xQ6f2p7DxNewsSo3kee', '2021-10-26 08:02:22', '2022-06-27 04:10:09', 'ADMIN'),
(14, 'User Website', 'user@gmail.com', 'Freelancer', 'assets/user_image/SIzd4Z34vN7A3fR8wCoO5ZIxtADqcyNZggqn5aNt.jpg', '2021-10-27 07:00:37', '$2y$10$bIOdXjkx5pGfDO96h99hs.utmuVgMjZX1jWjrFki94mm.s9YyHM1u', 'B7sBjk9nkGYIRuMcNbHTbxWqpR0YLUk0E7Faoz6U4idR3mY42zcOUHm7j2NN', '2021-10-27 07:00:15', '2022-06-27 04:42:10', 'USER'),
(16, 'userbaru', 'user1@gmail.com', 'Developer', NULL, NULL, '$2y$10$hs2BX5mCMG8znwQu6Pw6qOVe.Xuwbx1bBH9sHFTBDE/AJwuVKPtsK', NULL, '2022-02-17 21:11:14', '2022-02-17 21:11:14', 'USER'),
(17, 'User Terbaru', 'user2@gmail.com', 'Developer', NULL, NULL, '$2y$10$UfVbHkS0ffqpVynH/CnLW.NBiy5QFXVlFaegTubUm9otbXzs5KaCG', NULL, '2022-02-18 00:22:22', '2022-02-18 00:22:22', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `GALLERY TRAVEL PACKAGE ID BELONGS TO` (`travel_packages_id`) USING BTREE;

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PAYMENT USER ID BELONGS TO` (`users_id`) USING BTREE,
  ADD KEY `PAYMENT TRANSACTION TRAVEL PACKAGE ID BELONGS TO` (`transaction_travel_packages_id`) USING BTREE,
  ADD KEY `PAYMENT TRANSACTION TRANSPORTATION ID BELONGS TO` (`transaction_transportations_id`) USING BTREE;

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TESTIMONIAL TRAVEL PACKAGE ID BELONGS TO` (`travel_packages_id`),
  ADD KEY `TESTIMONIAL USER ID BELONGS TO` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TRANSACTION TRAVEL PACKAGE TRAVEL PACKAGE ID BELONGS TO` (`travel_packages_id`),
  ADD KEY `TRANSACTION TRAVEL PACKAGE USER ID BELONGS TO` (`users_id`);

--
-- Indexes for table `transaction_transportations`
--
ALTER TABLE `transaction_transportations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TESTIMONIAL TRANSPORTATION TRANSPORTATION ID BELONGS TO` (`transportations_id`),
  ADD KEY `TESTIMONIAL TRANSPORTATION USER ID BELONGS TO` (`users_id`);

--
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_packages`
--
ALTER TABLE `travel_packages`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transaction_transportations`
--
ALTER TABLE `transaction_transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `travel_packages`
--
ALTER TABLE `travel_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `BELONGS TO` FOREIGN KEY (`travel_packages_id`) REFERENCES `travel_packages` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `PAYMENT TRANSACTION_TRANSPORTATION ID BELONGS TO` FOREIGN KEY (`transaction_transportations_id`) REFERENCES `transaction_transportations` (`id`),
  ADD CONSTRAINT `PAYMENT TRANSACTION_TRAVEL PACKAGE ID BELONGS TO` FOREIGN KEY (`transaction_travel_packages_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `PAYMENT USER_ID BELONGS TO` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `TESTIMONIAL TRAVEL PACKAGE ID BELONGS TO` FOREIGN KEY (`travel_packages_id`) REFERENCES `travel_packages` (`id`),
  ADD CONSTRAINT `TESTIMONIAL USER ID BELONGS TO` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `TRANSACTION TRAVEL PACKAGE TRAVEL PACKAGE ID BELONGS TO` FOREIGN KEY (`travel_packages_id`) REFERENCES `travel_packages` (`id`),
  ADD CONSTRAINT `TRANSACTION TRAVEL PACKAGE USER ID BELONGS TO` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_transportations`
--
ALTER TABLE `transaction_transportations`
  ADD CONSTRAINT `TESTIMONIAL TRANSPORTATION TRANSPORTATION ID BELONGS TO` FOREIGN KEY (`transportations_id`) REFERENCES `transportations` (`id`),
  ADD CONSTRAINT `TESTIMONIAL TRANSPORTATION USER ID BELONGS TO` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
