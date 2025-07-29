-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2025 at 02:34 PM
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kaziarifurrahman80@gmail.com', '$2y$10$NEODCkfh48zVlbC2dt3S6ex3J1Rlmh34WUeVMOx32Sq2Lwzg73zja', '2025-07-26 09:03:13');

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
(14, 'Pumpkin seeds', '<div>Did you know Pumpkin seeds make you feel fuller and boost your immunity?<br><br>This seeds also contain \"Tryptophan\" that can promote better sleep quality.<br><br>Pumpkin seeds contain phytosterols too , which can promote bone formation and reduce the risk of osteoporosis!</div>', '1753772128.jpg', '2025-07-29 00:55:28', '2025-07-29 06:31:34'),
(15, 'Protein from veggies', '<div>Is it really possible for vegetarians to meet their protein requirement?<br><br>Yes with balanced and planed diet.<br>Aim for:<br>• 0.8–1.0 g of protein per kg of body weight for most adults<br>• 1.2–2.0 g/kg for athletes, elderly, or during muscle building</div>', '1753772155.jpg', '2025-07-29 00:55:55', '2025-07-29 06:31:21'),
(16, 'Summer fact', 'In this summer- this fruit will quench your thirst, regulate body temp and keep you energetic during heat . It’s already available and will cost you 10 taka per seed !', '1753772353.jpg', '2025-07-29 00:59:13', '2025-07-29 00:59:13'),
(17, 'Daily protein requirement', '<div>Meet your daily protein requirement -<br>• 0.8–1.0 g of protein per kg of body weight for most adults<br>• 1.2–2.0 g/kg for athletes, elderly, or during muscle building</div>', '1753772423.jpg', '2025-07-29 01:00:23', '2025-07-29 06:30:56'),
(18, 'Citrus fruits on empty stomach', '<div>In empty stomach, high acidity of citrus fruits can irritate the stomach lining, potentially leading to acid reflux, heartburn, or indigestion, especially .<br>I would recommend to consume citrus fruits as part of a meal or after a light breakfast, allowing the stomach to be partially filled with food.</div>', '1753772460.jpg', '2025-07-29 01:01:00', '2025-07-29 06:30:43'),
(19, 'Sprouts are healthy', '<div>Health Benefits of 🌱 sprouts:<br>✅ Rich in Antioxidants<br>✅ Digestive Aid<br>✅ Supports Immunity<br>✅ May Help Control Blood sugar<br>✅ Low in Calories<br><br>• Add them to salads, sandwiches, wraps, or stir-fries.<br>• Soak seeds well and rinse frequently if growing at home.<br>• Steam or sauté lightly for safety and flavor See less</div>', '1753772491.jpg', '2025-07-29 01:01:31', '2025-07-29 06:30:27'),
(20, '🫖✨ Happy International Tea Day! ✨🍃', '<div>☕️Milk tea can be a healthy choice, especially when enjoyed in moderation and without excessive added sugar.<br><br>☕️Green tea is packed with catechins (like EGCG), and black tea is rich in theaflavins—both support heart health, fight inflammation, and protect your cells from damage.<br><br>☕️Moderate caffeine and L-theanine in tea can boost mental clarity, focus, and even fat oxidation a lil.<br><br>Few tips from Nutri Nish 👩🏻‍⚕️<br>✅Choose high-quality loose-leaf teas or well-sourced bags.<br>✅ For a calming effect, opt for herbal teas in the evening.<br>✅ Choose unsweetened milk tea or use natural sweeteners in moderation (try lemon, mint, or a splash of honey instead)🍋‍🟩<br>✅ Consider milk alternatives like almond or soy milk if you are lactose intolerant.<br><br>Raise your cup to health and harmony on #InternationalTeaDay!</div>', '1753772527.jpg', '2025-07-29 01:02:07', '2025-07-29 06:30:16'),
(21, 'Eid-ul-Adha Mubarak 2025', '<div>Nutrition tip for the muslims -<br>In this holy week of Eid ul Adha don’t go on a carnivore diet (eating pattern that involves consuming only animal products)<br><br>❌not focusing on plant-based foods including fruits, vegetables, grains, legumes, and nuts can lead to - Nutrient Deficiencies, Heart Health Concerns, Gut Health Issues ,Kidney Strain etc.<br><br>- Don\'t cook meat in high heat. Slow cook or stir fry or grill lean cuts or steam.<br>- Use vinegar, lemon juice to marinate<br>- Pair with healthy sides, fiber and salads</div>', '1753772557.jpg', '2025-07-29 01:02:37', '2025-07-29 06:29:44'),
(22, 'Jackfruit season is here!', '<div>Jackfruit contains various antioxidants, such as carotenoids and flavonoids, which can help fight inflammation and protect against oxidative stress. Btw what is oxidative stress?<br><br>Oxidative stress is an imbalance of free radicals and antioxidants in your body that leads to cell damage.</div>', '1753772584.jpg', '2025-07-29 01:03:04', '2025-07-29 03:10:20'),
(24, 'Nutritious food for lactating mothers!', '<div>🟠Lean meats (chicken, beef), oily fish with skin, eggs, dairy products (yogurt, cheese), beans, lentils and nuts.</div><div>🟠Olive oil, coconut oil, nuts and seeds (peanut, almonds, walnuts, chia seeds)</div><div>🟠 leafy greens , carrots, sweet potatoes, pumpkin, cucumber, beans, chickpeas</div><div>🟠Oats, brown rice, barley, whole wheat roti, pasta, and cereals.</div><div><br>Foods to Limit or Avoid:<br>⭕ Highly Processed Foods: Fast food, sugary breakfast cereals, and excessive amounts of processed snacks.<br>⭕ Excessive Caffeine: Limit intake to around 300 mg per day.<br>⭕ Foods that May Cause Gas or Bloating in Baby: Broccoli, cabbage, beans (if your baby reacts).<br>⭕ Foods High in Mercury: Limit consumption of sea food</div>', '1753780115.jpg', '2025-07-29 03:08:35', '2025-07-29 03:08:35');

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
(1, 'Kazi Arifur Rahman', 'kaziarifurrahman80@gmail.com', 'admin', NULL, '$2y$10$SpUN8/.bJN1v3G1cGpX6oez5OADia9AOUyAPJDY0yYYoj5abo3yYW', 'WBXiHFkYXX4QUrW4TwCXstLas8aJYwwa1GO84L90iXEd9VHrXV13Gme63Dj0', '2025-07-16 21:51:53', '2025-07-16 22:21:10'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
