-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 02:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqueId` int(11) NOT NULL,
  `expiryDate` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`id`, `uniqueId`, `expiryDate`, `amount`, `customer_id`, `created_at`, `updated_at`, `used`) VALUES
(1, 52938475, 1708729500, 5, 1, NULL, '2023-04-05 00:09:24', 1),
(2, 87215934, 1703214000, 10, 1, NULL, '2023-04-05 01:28:33', 1),
(3, 13468297, 1696100400, 2, 1, NULL, '2023-04-08 02:41:57', 1),
(4, 90816542, 1684995300, 8, 1, NULL, NULL, 0),
(5, 61729408, 1680092700, 6, 1, NULL, NULL, 0),
(6, 45298316, 1672972800, 4, 1, NULL, NULL, 0),
(7, 35850854, 1712430965, 13, 1, '2023-04-08 01:16:05', '2023-04-08 01:16:05', 0),
(8, 24643766, 1712436218, 11, 1, '2023-04-08 02:43:38', '2023-04-08 02:43:38', 0),
(11, 40913047, 1712520463, 13, 1, '2023-04-09 02:07:43', '2023-04-09 02:07:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_subscriber` tinyint(1) NOT NULL DEFAULT 0,
  `fullName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `creditCardNo` bigint(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `is_subscriber`, `fullName`, `address`, `creditCardNo`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Saman Pordanesh', 'Somewhere on this beautiful planet, under a tree', 12341234, NULL, NULL),
(2, 5, 1, 'Hasan Kachal', 'IH, 2500 University, GR', 1234876512348765, '2023-04-06 05:10:14', '2023-04-10 01:45:42'),
(9, 13, 0, 'jack', 'jack avenue', 1111222233334444, '2023-04-13 06:49:17', '2023-04-13 06:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `customer_movie`
--

CREATE TABLE `customer_movie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 2),
(12, '2019_08_19_000000_create_failed_jobs_table', 3),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(14, '2023_03_27_155927_create_movies_table', 5),
(15, '2023_03_23_172144_create_starring_table', 6),
(17, '2023_03_23_202327_create_theaters_table', 7),
(19, '2023_03_23_210411_create_show_times_table', 9),
(20, '2023_03_23_202627_create_newsletters_table', 10),
(21, '2023_03_23_211057_create_theater_show_time_table', 11),
(22, '2023_03_25_164938_create_customers_table', 12),
(23, '2023_03_25_164943_create_admins_table', 13),
(24, '2023_03_25_165642_create_subscribers_table', 14),
(25, '2023_03_25_170901_create_customer_movie_table', 15),
(26, '2023_03_25_171716_create_subscriber_favorite_movie', 16),
(28, '2023_03_23_202451_create_tickets_table', 17),
(29, '2023_03_23_202552_create_cupons_table', 18),
(30, '2014_10_12_200000_add_two_factor_columns_to_users_table', 19),
(31, '2023_03_27_164858_create_sessions_table', 19),
(32, '2023_04_01_174901_create_reservations_table', 20),
(33, '2023_03_23_202417_create_seats_table', 21),
(34, '2023_04_04_014228_add_used_to_coupons_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `releaseYear` int(11) NOT NULL,
  `startDate` int(11) NOT NULL,
  `endDate` int(11) NOT NULL,
  `director` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `studio` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `created_at`, `updated_at`, `title`, `releaseYear`, `startDate`, `endDate`, `director`, `writer`, `studio`, `price`, `rating`, `length`) VALUES
(1, NULL, NULL, 'Attack on titan', 2020, 1680146585, 1691156585, 'Jinsu Atakabi', 'Kwack Hitso', 'Npanima', 13, 8, 186),
(2, NULL, NULL, 'Arrival ', 2017, 1680146585, 1680158585, 'Stanly Cubric', 'Catrin Zetajones ', 'Marvel', 11, 8, 186),
(3, NULL, NULL, 'Avatar', 2022, 1680146585, 1680266585, 'James Cameron', 'The same James Cameron', 'Paramond ', 16, 1, 333),
(4, '2023-04-12 01:09:16', '2023-04-12 01:09:16', 'Super Mario Bros', 2023, 1681171200, 1682467200, 'Jack Smith', 'John Smith', 'Nintendo', 12, 7, 92),
(6, '2023-04-13 06:51:50', '2023-04-13 06:51:50', 'Air', 2023, 1680998400, 1682812800, 'Ben Affleck', 'Alex Convery', 'Warner Bros. Pictures, Metro-Goldwyn-Mayer', 9, 5, 92);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `releaseDate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `content`, `releaseDate`, `created_at`, `updated_at`) VALUES
(1, '\"Marvel Announces New Movie Releases for Phase Four\"', 'Marvel Studios has announced new movie releases for Phase Four, including \"Black Panther: Wakanda Forever,\" \"The Marvels,\" and \"Ant-Man and The Wasp: Quantumania.\" The studio also released a sizzle reel teasing upcoming films, including \"Guardians of the Galaxy Vol. 3\" and \"Fantastic Four.\"', 1681067046, NULL, NULL),
(2, 'Cannes Film Festival Returns with Star-Studded Lineup', 'The Cannes Film Festival has returned after being canceled last year due to the pandemic. The festival features a star-studded lineup of films, including the premiere of Wes Anderson\'s \"The French Dispatch\" and the Palme d\'Or-winning \"Titane.\" The festival also features a jury headed by director Spike Lee.', 1686359039, NULL, NULL),
(3, '\"Netflix Dominates Emmy Nominations with Record-Breaking 44 Nods\"', 'Streaming giant Netflix has dominated the Emmy nominations with a record-breaking 44 nods, including nods for shows like \"The Crown,\" \"Stranger Things,\" and \"The Queen\'s Gambit.\" The company\'s success highlights the continued shift towards streaming services in the entertainment industry.', 1678413839, NULL, NULL),
(4, ' \"Tom Cruise Returns to the Big Screen in \'Top Gun: Maverick\'\"', 'Tom Cruise is set to return to the big screen in \"Top Gun: Maverick,\" the long-awaited sequel to the 1986 hit \"Top Gun.\" The film follows Maverick, now a flight instructor, as he trains a new generation of pilots. The film features a mix of practical and CGI effects to create some of the most realistic flight sequences ever seen on screen.', 1678413839, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_time_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `show_time_id`, `seat_id`, `created_at`, `updated_at`) VALUES
(16, 1, 1, '2023-04-09 07:36:12', '2023-04-09 07:36:12'),
(20, 6, 10, '2023-04-13 06:52:38', '2023-04-13 06:52:38'),
(21, 11, 25, '2023-04-13 06:52:54', '2023-04-13 06:52:54'),
(22, 8, 13, '2023-04-13 06:53:04', '2023-04-13 06:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seatId` varchar(255) NOT NULL,
  `available` tinyint(1) DEFAULT NULL,
  `accessible` tinyint(1) DEFAULT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seatId`, `available`, `accessible`, `theater_id`, `created_at`, `updated_at`) VALUES
(1, 'A1', NULL, NULL, 1, NULL, NULL),
(2, 'A2', NULL, NULL, 1, NULL, NULL),
(3, 'A3', NULL, NULL, 1, NULL, NULL),
(4, 'A4', NULL, NULL, 1, NULL, NULL),
(5, 'A5', NULL, NULL, 1, NULL, NULL),
(6, 'A1', NULL, NULL, 2, NULL, NULL),
(7, 'A2', NULL, NULL, 2, NULL, NULL),
(8, 'B1', NULL, NULL, 2, NULL, NULL),
(9, 'B2', NULL, NULL, 2, NULL, NULL),
(10, 'A1', NULL, NULL, 3, NULL, NULL),
(11, 'B1', NULL, NULL, 3, NULL, NULL),
(12, 'C1', NULL, NULL, 3, NULL, NULL),
(13, 'A-1', NULL, NULL, 4, NULL, NULL),
(14, 'A-2', NULL, NULL, 4, NULL, NULL),
(15, 'A-3', NULL, NULL, 4, NULL, NULL),
(16, 'A-4', NULL, NULL, 4, NULL, NULL),
(17, 'Alpha-1', NULL, NULL, 5, NULL, NULL),
(18, 'Alpha-2', NULL, NULL, 5, NULL, NULL),
(19, 'Beta-1', NULL, NULL, 5, NULL, NULL),
(20, 'Beta-2', NULL, NULL, 5, NULL, NULL),
(21, 'G1', NULL, NULL, 6, NULL, NULL),
(22, 'G2', NULL, NULL, 6, NULL, NULL),
(23, 'G-3', NULL, NULL, 6, NULL, NULL),
(24, 'G-4', NULL, NULL, 6, NULL, NULL),
(25, 'G-5', NULL, NULL, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rcDfGUNYJwODI6mtPmbcmzc1khU5DdiH8JeyAHDa', 11, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTTZvd1RDNU9GWkJpWFdHRGh3Tmk1QktPNDQ5UkViVjJGUDFKdmY1ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo3NToiaHR0cDovL2xvY2FsaG9zdC9wcm9qZWN0cy9PbmxpbmUtQ2luZW1hL09ubGluZS1DaW5lbWEvcHVibGljL2FkbWluLXNhbGVzTW9uIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7czo4OiJpc19hZG1pbiI7YjoxO30=', 1681347197);

-- --------------------------------------------------------

--
-- Table structure for table `show_times`
--

CREATE TABLE `show_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showTime` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_times`
--

INSERT INTO `show_times` (`id`, `showTime`, `created_at`, `updated_at`) VALUES
(1, 1688726025, NULL, NULL),
(2, 1688991250, NULL, NULL),
(3, 1689431660, NULL, NULL),
(4, 1689826960, NULL, NULL),
(5, 1690190340, NULL, NULL),
(6, 1690623380, NULL, NULL),
(7, 1691006730, NULL, NULL),
(8, 1691420925, NULL, NULL),
(9, 1691790570, NULL, NULL),
(10, 1692212715, NULL, NULL),
(11, 1692582345, NULL, NULL),
(12, 1692985885, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `starring`
--

CREATE TABLE `starring` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `starring`
--

INSERT INTO `starring` (`id`, `name`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 'Shinsu Jwa', 1, NULL, NULL),
(2, 'Harki Chitikama', 1, NULL, NULL),
(3, 'Whashi Shka', 1, NULL, NULL),
(4, 'Nakaro Natakami', 1, NULL, NULL),
(5, 'Shingeki no Kojin', 1, NULL, NULL),
(6, 'James Bond', 2, NULL, NULL),
(7, 'Sofia Jonson', 2, NULL, NULL),
(8, 'Josh Wilson', 2, NULL, NULL),
(9, 'Ania Samawati', 2, NULL, NULL),
(10, 'Asghar Taraghe', 2, NULL, NULL),
(11, 'Sam Worthington', 3, NULL, NULL),
(12, 'Jake Sully', 3, NULL, NULL),
(13, 'Zoe Saldaña', 3, NULL, NULL),
(14, 'Kate Winslet', 3, NULL, NULL),
(15, 'Stephen Lang', 3, NULL, NULL),
(21, 'Chris Pratt', 4, '2023-04-12 01:09:16', '2023-04-12 01:09:16'),
(22, ' Anya Taylor', 4, '2023-04-12 01:09:16', '2023-04-12 01:09:16'),
(23, ' JoyCharlie Day', 4, '2023-04-12 01:09:16', '2023-04-12 01:09:16'),
(29, 'Ben Affleck', 6, '2023-04-13 06:51:50', '2023-04-13 06:51:50'),
(30, ' Matt Damon', 6, '2023-04-13 06:51:50', '2023-04-13 06:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `subscriptionEndDate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `customer_id`, `subscriptionEndDate`, `created_at`, `updated_at`) VALUES
(4, 2, 1710983039, NULL, NULL),
(5, 1, 1712607024, '2023-04-10 02:10:24', '2023-04-10 02:10:24'),
(6, 1, 1712607038, '2023-04-10 02:10:38', '2023-04-10 02:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_favorite_movies`
--

CREATE TABLE `subscriber_favorite_movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriber_favorite_movies`
--

INSERT INTO `subscriber_favorite_movies` (`id`, `subscriber_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(2, 5, 3, '2023-04-09 01:18:57', '2023-04-09 01:18:57'),
(5, 5, 1, '2023-04-10 01:39:33', '2023-04-10 01:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Cineplex Odeon Eau Claire Market Cinemas', '200 Barclay Parade SW, Calgary, AB T2P 4R5', NULL, NULL),
(2, 'Scotiabank Theatre Chinook', '6455 Macleod Trail SW, Calgary, AB T2H 0K4', NULL, NULL),
(3, 'Canyon Meadows Cinemas', '13226 Macleod Trail SE, Calgary, AB T2J 7E5', NULL, NULL),
(4, 'Landmark Cinemas 16 Country Hills ', '388 Country Hills Blvd NE, Calgary, AB T3K 5J6', NULL, NULL),
(5, 'Plaza Theatre', '1133 Kensington Rd NW, Calgary, AB T2N 3P4', NULL, NULL),
(6, 'Globe Cinema ', '617 8 Ave SW, Calgary, AB T2P 1H1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theater_show_time`
--

CREATE TABLE `theater_show_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `show_time_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theater_show_time`
--

INSERT INTO `theater_show_time` (`id`, `theater_id`, `show_time_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 1, NULL, NULL),
(3, 2, 3, 1, NULL, NULL),
(4, 2, 4, 1, NULL, NULL),
(5, 3, 5, 2, NULL, NULL),
(6, 3, 6, 2, NULL, NULL),
(7, 4, 7, 2, NULL, NULL),
(8, 4, 8, 2, NULL, NULL),
(9, 5, 9, 3, NULL, NULL),
(10, 5, 10, 3, NULL, NULL),
(11, 6, 11, 3, NULL, NULL),
(12, 6, 12, 3, NULL, NULL),
(13, 6, 10, 4, NULL, NULL),
(14, 6, 11, 4, NULL, NULL),
(15, 6, 12, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticketId` int(11) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `show_time_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `purchaseTime` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `assignedEmail` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticketId`, `customer_id`, `movie_id`, `show_time_id`, `seat_id`, `purchaseTime`, `price`, `assignedEmail`, `status`, `created_at`, `updated_at`) VALUES
(1, 56247775, 1, 1, 1, 3, 1680731752, 13, 'myhomeqrc@gmail.com', 'cancelled', '2023-04-06 03:55:52', '2023-04-08 01:12:52'),
(3, 63535260, 1, 1, 2, 5, 1680900127, 11, 'myhomeqrc@gmail.com', 'cancelled', '2023-04-08 02:42:07', '2023-04-08 02:43:38'),
(8, 64780149, 1, 1, 1, 5, 1680984419, 13, 'myhomeqrc@gmail.com', 'cancelled', '2023-04-09 02:06:59', '2023-04-09 02:07:43'),
(14, 39286638, 5, 1, 1, 1, 1681004172, 13, 'Hasan@yahoo.com', 'purchased', '2023-04-09 07:36:12', '2023-04-09 07:36:12'),
(18, 78985583, 13, 2, 6, 10, 1681347158, 11, 'jack@jack.ca', 'purchased', '2023-04-13 06:52:38', '2023-04-13 06:52:38'),
(19, 68036405, 13, 4, 11, 25, 1681347174, 12, 'jack@jack.ca', 'purchased', '2023-04-13 06:52:54', '2023-04-13 06:52:54'),
(20, 74058042, 13, 2, 8, 13, 1681347184, 11, 'jack@jack.ca', 'purchased', '2023-04-13 06:53:04', '2023-04-13 06:53:04');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sina', 'myhomeqrc@gmail.com', NULL, '$2y$10$jIvK6geTn0XsHXXH70zQuuWaebIE4MeX9whuQiJBvCq/GnvO9UBiC', NULL, NULL, NULL, 'p7ORVqPDgBXUOmT7OrPn353z3j9rAQGyihRBP4xGcJRSDVah0BGdAqNuGl1K', '2023-03-30 07:50:33', '2023-03-30 07:50:33'),
(5, 'Hasan Kachal', 'Hasan@yahoo.com', NULL, '$2y$10$VcDrI52MgCgoH273aP/Wou8TRN7YNT8iwRqacIC8rJX7ewzylTGFa', NULL, NULL, NULL, NULL, '2023-04-06 05:10:14', '2023-04-06 05:10:14'),
(11, 'Admin', 'Admin@admin.com', NULL, '$2y$10$zXT4Nd9uWGVFm3Qo72E9kO.VFOmR1/bljs.yrf6ElXN.cCiWOEvc6', NULL, NULL, NULL, NULL, '2023-04-11 19:17:59', '2023-04-11 19:17:59'),
(13, 'jack', 'jack@jack.ca', NULL, '$2y$10$H9893ITaE/ztCh/HcjUdH.hPWD/fw3iFEfdtfkjyJBZQX2OclMpk2', NULL, NULL, NULL, NULL, '2023-04-13 06:49:17', '2023-04-13 06:49:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cupons_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_movie`
--
ALTER TABLE `customer_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_movie_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_movie_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_show_time_id_foreign` (`show_time_id`),
  ADD KEY `reservations_seat_id_foreign` (`seat_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_theater_id_foreign` (`theater_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `show_times`
--
ALTER TABLE `show_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starring`
--
ALTER TABLE `starring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `starring_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `subscriber_favorite_movies`
--
ALTER TABLE `subscriber_favorite_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriber_favorite_movies_movie_id_foreign` (`movie_id`),
  ADD KEY `subscriber_favorite_movies_subscriber_id_foreign` (`subscriber_id`);

--
-- Indexes for table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater_show_time`
--
ALTER TABLE `theater_show_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theater_show_time_theater_id_foreign` (`theater_id`),
  ADD KEY `theater_show_time_show_time_id_foreign` (`show_time_id`),
  ADD KEY `theater_show_time_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticketid_unique` (`ticketId`),
  ADD KEY `tickets_seat_id_foreign` (`seat_id`),
  ADD KEY `tickets_movie_id_foreign` (`movie_id`),
  ADD KEY `tickets_show_time_id_foreign` (`show_time_id`),
  ADD KEY `tickets_customer_id_foreign` (`customer_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_movie`
--
ALTER TABLE `customer_movie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `show_times`
--
ALTER TABLE `show_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `starring`
--
ALTER TABLE `starring`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriber_favorite_movies`
--
ALTER TABLE `subscriber_favorite_movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theater_show_time`
--
ALTER TABLE `theater_show_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cupons`
--
ALTER TABLE `cupons`
  ADD CONSTRAINT `cupons_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_movie`
--
ALTER TABLE `customer_movie`
  ADD CONSTRAINT `customer_movie_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_movie_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_show_time_id_foreign` FOREIGN KEY (`show_time_id`) REFERENCES `show_times` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `starring`
--
ALTER TABLE `starring`
  ADD CONSTRAINT `starring_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriber_favorite_movies`
--
ALTER TABLE `subscriber_favorite_movies`
  ADD CONSTRAINT `subscriber_favorite_movies_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriber_favorite_movies_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theater_show_time`
--
ALTER TABLE `theater_show_time`
  ADD CONSTRAINT `theater_show_time_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theater_show_time_show_time_id_foreign` FOREIGN KEY (`show_time_id`) REFERENCES `show_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theater_show_time_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_show_time_id_foreign` FOREIGN KEY (`show_time_id`) REFERENCES `show_times` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
