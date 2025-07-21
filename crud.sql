-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 07:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_15_181051_create_posts_table', 1),
(6, '2025_07_17_031842_add_role_to_users_table', 2);

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
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kazi Iftakher Rahman', 'Learning Laravel', '1752673391.jpg', '2025-07-16 04:11:05', '2025-07-16 07:43:11'),
(2, 'Mortzz', 'Landing page design', '1752673426.png', '2025-07-16 04:21:12', '2025-07-16 22:56:46'),
(3, 'AnimalCare', 'E-commerce website', '1752690763.png', '2025-07-16 04:33:41', '2025-07-16 22:56:58'),
(5, 'GymTuna', 'Wordpress site', '1752674285.png', '2025-07-16 07:53:14', '2025-07-16 07:58:05'),
(7, 'Lazer Wave', 'Event organizing', '1752674037.jpg', '2025-07-16 07:53:57', '2025-07-16 22:56:14'),
(8, 'Kazi Iftakher Rahman', 'CSE from NSU', '1752674220.jpg', '2025-07-16 07:57:00', '2025-07-16 22:57:17'),
(9, 'Mr. Diy', 'Malaysia', '1752674246.jpg', '2025-07-16 07:57:26', '2025-07-16 07:57:26'),
(12, 'CR7', 'Siuuuuuuu', '1752727641.jpg', '2025-07-16 22:47:21', '2025-07-16 22:51:06'),
(14, 'OMM?', 'Client', '1752993580.png', '2025-07-20 00:39:40', '2025-07-21 11:30:43'),
(16, 'NutriByte', 'Heard of DASH DIET? A dietary plan focused on reducing blood pressure. So how to do it?? Emphasis on Fruits, Vegetables, and Whole Grains. These foods are rich in potassium, magnesium, and fiber, which are beneficial for blood pressure. Low-Fat or Fat-Free Dairy- Dairy products, especially low-fat or fat-free options, are good sources of calcium and protein. Lean Protein- Fish, poultry, beans, and nuts are included as healthy protein sources. Limited Sodium- The standard DASH diet limits sodium intake to 2,300 mg per day, and a lower sodium version restricts it to 1,500 mg. Reduced Saturated Fat and Sugar- Fatty meats, full-fat dairy, and sweets are limited to help control cholesterol and blood sugar.', '1753083407.jpg', '2025-07-21 01:36:47', '2025-07-21 01:37:22'),
(19, 'New', 'Teset', '1753109113.jpg', '2025-07-21 08:45:13', '2025-07-21 08:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'observer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kazi Arifur Rahman', 'kaziarifurrahman80@gmail.com', 'admin', NULL, '$2y$10$SpUN8/.bJN1v3G1cGpX6oez5OADia9AOUyAPJDY0yYYoj5abo3yYW', 'VrJfF5HvwvwQXf1AtQ3th9XkHI13PoUYSBfEcJyYf3Rjdzl45zlLVmo10Iac', '2025-07-16 21:51:53', '2025-07-16 22:21:10'),
(2, 'user100', 'user@email.com', 'observer', NULL, '$2y$10$036GywRzYHCMVFdvUuMHsexfNG0xOpGm8btK0yimQX8W4gBI9AWYu', NULL, '2025-07-16 21:53:03', '2025-07-16 21:53:03'),
(3, 'testUser', 'testUser@gmail.com', 'observer', NULL, '$2y$10$b8teOAavCDJ8mnfr52grGupvMPoedx3okCD5y.ly6tQ8McYjMKmHK', NULL, '2025-07-21 08:30:37', '2025-07-21 08:30:37'),
(4, 'test3', 'test3@gmail.com', 'observer', NULL, '$2y$10$ufJcEsCObbSPNX1NogeFuOgghb3rQYA3mg8lIceCoPb/MqPxUi6de', NULL, '2025-07-21 08:38:15', '2025-07-21 08:38:15');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
