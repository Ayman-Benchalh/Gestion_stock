-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 04:08 PM
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
-- Database: `gestionstock2`
--

-- --------------------------------------------------------

--
-- Table structure for table `achats`
--

CREATE TABLE `achats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_fournisseur` bigint(20) UNSIGNED NOT NULL,
  `id_produit` bigint(20) UNSIGNED NOT NULL,
  `Quantite_Achat` int(11) NOT NULL,
  `Prix_Achat` int(11) NOT NULL,
  `validation_Achat` tinyint(1) NOT NULL,
  `facture_imprimé` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achats`
--

INSERT INTO `achats` (`id`, `id_fournisseur`, `id_produit`, `Quantite_Achat`, `Prix_Achat`, `validation_Achat`, `facture_imprimé`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 10, 75000, 0, 0, '2024-05-15 21:16:00', '2024-05-15 21:16:00'),
(2, 1, 4, 10, 75000, 1, 1, '2024-05-15 21:26:51', '2024-05-15 21:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_Complet` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `Montant` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom_Complet`, `Adresse`, `email`, `telephone`, `Montant`, `created_at`, `updated_at`) VALUES
(1, 'iskiles', '52121 Effertz Estates Apt. 042\nNew Jonathon, OH 41279-2433', 'ursula14@hotmail.com', '+1-737-498-4854', 1000, '2024-05-15 11:37:14', '2024-05-15 18:44:49'),
(2, 'sokon', '857 Stehr Square Apt. 505\nEast Natalia, FL 69175-2904', 'iwolff@yahoo.com', '+1 (628) 264-5504', 0, '2024-05-15 11:37:14', '2024-05-15 11:37:14'),
(3, 'dorothea.spencer', '6349 Pink Mission\nEast Felixmouth, OH 95565', 'luther.hettinger@yahoo.com', '402-745-1321', 0, '2024-05-15 11:37:14', '2024-05-15 11:37:14'),
(4, 'moshe25', '92205 Schuster Isle Apt. 747\nAdalineland, OH 66111', 'yadira.bergnaum@cronin.com', '+1-815-378-8490', 0, '2024-05-15 11:37:14', '2024-05-15 11:37:14'),
(5, 'champlin.jerel', '4267 Alia Ferry\nNorth Graceborough, UT 84487', 'declan46@lueilwitz.net', '1-731-220-9975', 0, '2024-05-15 11:37:14', '2024-05-15 11:37:14'),
(6, 'cletus82', '556 Jacobs Falls Suite 818\nMossiemouth, WY 49977', 'akemmer@sporer.net', '281-434-6015', 0, '2024-05-15 11:38:37', '2024-05-15 11:38:37');

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
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_Complet` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `Montant` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom_Complet`, `Adresse`, `email`, `telephone`, `Montant`, `created_at`, `updated_at`) VALUES
(1, 'hkuhic', '9999 Bruen Corner Suite 427\nWest Gunner, IA 92263-8088', 'dubuque.lesley@yahoo.com', '+1 (341) 944-0907', 0, '2024-05-15 11:37:14', '2024-05-15 21:27:00'),
(2, 'catherine.donnelly', '5606 Konopelski Islands Apt. 097\nSouth Lyda, FL 10152-5643', 'zola.maggio@bosco.com', '1-541-662-0666', 0, '2024-05-15 11:37:14', '2024-05-15 11:37:14'),
(3, 'pagac.dedrick', '2417 Cleora Pines\nRatkeberg, CT 64998-6142', 'marisa.schaden@hotmail.com', '601.564.8305', 0, '2024-05-15 11:38:37', '2024-05-15 11:38:37'),
(4, 'sabryna36', '903 Raquel Coves Apt. 157\nLake Mckenna, PA 21283-4863', 'frankie.leuschke@friesen.com', '(303) 785-3620', 0, '2024-05-15 11:38:37', '2024-05-15 11:38:37'),
(5, 'bcassin', '73333 Ariane Roads Apt. 500\nLeschfurt, SD 88692', 'velma09@lang.biz', '651.867.9333', 0, '2024-05-15 11:38:37', '2024-05-15 11:38:37'),
(6, 'uolson', '3961 Daniela Mountain Apt. 852\nCiarafurt, AK 99720-1787', 'doyle.mylene@hotmail.com', '1-515-899-9425', 0, '2024-05-15 11:38:37', '2024-05-15 11:38:37'),
(7, 'gstoltenberg', '5869 Otis Prairie\nClaudiaside, TN 29089-2964', 'marvin.mccullough@lueilwitz.com', '248-373-6912', 0, '2024-05-15 11:38:37', '2024-05-15 11:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `history__ventes`
--

CREATE TABLE `history__ventes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `id_produit` bigint(20) UNSIGNED NOT NULL,
  `Quantite_vente` int(11) NOT NULL,
  `Prix_Vente` int(11) NOT NULL,
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_11_121348_create_clients_table', 1),
(5, '2024_04_11_122954_create_fournisseurs_table', 1),
(6, '2024_04_11_124744_create_produits_table', 1),
(7, '2024_04_11_141130_create_payment__clients_table', 1),
(8, '2024_04_11_144858_create_payment_fournissers_table', 1),
(9, '2024_04_11_191526_create_ventes_table', 1),
(10, '2024_04_11_191953_create_achats_table', 1),
(11, '2024_04_20_184718_create_history__ventes_table', 1),
(12, '2024_05_09_075023_create_personal_access_tokens_table', 1);

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
-- Table structure for table `payment_fournissers`
--

CREATE TABLE `payment_fournissers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_Fournisseur` bigint(20) UNSIGNED NOT NULL,
  `Montant_Pay` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_fournissers`
--

INSERT INTO `payment_fournissers` (`id`, `id_Fournisseur`, `Montant_Pay`, `created_at`, `updated_at`) VALUES
(1, 1, 75000, '2024-05-15 21:27:00', '2024-05-15 21:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment__clients`
--

CREATE TABLE `payment__clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_Client` bigint(20) UNSIGNED NOT NULL,
  `Montant_Pay` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment__clients`
--

INSERT INTO `payment__clients` (`id`, `id_Client`, `Montant_Pay`, `created_at`, `updated_at`) VALUES
(1, 1, 500, '2024-05-15 18:44:49', '2024-05-15 18:44:49');

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
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_Prod` varchar(255) NOT NULL,
  `Designation_Prod` varchar(255) NOT NULL,
  `Quantité` varchar(255) NOT NULL,
  `Catégorie` varchar(255) NOT NULL,
  `Prix` varchar(255) NOT NULL,
  `Nom_Fournisseur` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `Nom_Prod`, `Designation_Prod`, `Quantité`, `Catégorie`, `Prix`, `Nom_Fournisseur`, `created_at`, `updated_at`) VALUES
(1, 'tiyo', 'rouge  n 13', '3', '', '150', NULL, '2024-05-15 18:37:11', '2024-05-15 18:37:11'),
(2, 'XIAOMI REDMI NOTE 13', '8Go + 256Go - 32MP selfie - Palm Green + Cadeau ENCO BUDS2', '4', '', '75500', 'catherine.donnelly', '2024-05-15 18:38:11', '2024-05-15 21:23:03'),
(3, 'iphone pro max', '6.67\"- 6GB+128GB – ICE BLUE', '45', '', '1000', NULL, '2024-05-15 21:21:52', '2024-05-15 21:21:52'),
(4, 'Samsung Galaxy A04', '6.67\"- 6GB+128GB – ICE BLUE', '17', 'electri', '7500', 'hkuhic', '2024-05-15 21:25:46', '2024-05-15 21:26:51');

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
('7v4PN6qTQpCBqfFPSXd5fdzJSVyjCs1VZSLSePG3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo3OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL0Fqb3V0ZVByb2R1aXRBbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiaEs3c2ZpN0lIOHFwTEhUa2Fqdmk4TlVENUh6eTdOSmlqNE5oSndCWCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjc6ImlkX1VzZXIiO2k6MTtzOjExOiJOb21fQ29tcGxldCI7czoxMzoiYXltYW5iZW5jaGFsaCI7czo1OiJlbWFpbCI7czoyNToiYXltYW5iZW5jaGFsaDUzQGdtYWlsLmNvbSI7fQ==', 1715812097),
('DyqP9VIxAyCAfqrmxaJQ8ZUeWm4ZVFgdswUchs10', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmhRTHdzRzR2Q1lNTngzZ1ZKSTFzOWlrbVlpNnlLZ25tRXJ1VGFWYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1715975874),
('n9GUFJWx18tdrg82APi0D0QESrCQ4jl72Z7ORqev', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo3OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL0Rhc2hCb3JkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjBTcVFLVjBsZ1pEOThva0pGUVRrTE1JUXRBbUZxdkRtN0E5WDhsUWciO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJpZF9Vc2VyIjtpOjE7czoxMToiTm9tX0NvbXBsZXQiO3M6MTM6ImF5bWFuYmVuY2hhbGgiO3M6NToiZW1haWwiO3M6MjU6ImF5bWFuYmVuY2hhbGg1M0BnbWFpbC5jb20iO30=', 1716041038);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_Complet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Nom_commercial` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Nom_Complet`, `email`, `Nom_commercial`, `Telephone`, `Adresse`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aymanbenchalh', 'aymanbenchalh53@gmail.com', '', '', '', '2024-05-15 11:46:57', '$2y$12$QnP8NLx99nCW31ueEHeRR.LPX8f.ZWYJ0Gd19gEJWs4EYcBnamSMu', NULL, '2024-05-15 11:46:16', '2024-05-15 11:46:57'),
(2, 'pomica10', 'pomica1011@facais.com', '', '', '', '2024-05-15 18:27:03', '$2y$12$Prt7mM1IiUbt5xv66xnodO2f/OElkRWhqMR437sVWRs1MzQ46cE.y', NULL, '2024-05-15 18:26:08', '2024-05-15 18:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `ventes`
--

CREATE TABLE `ventes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `id_produit` bigint(20) UNSIGNED NOT NULL,
  `Quantite_vente` int(11) NOT NULL,
  `Prix_Vente` int(11) NOT NULL,
  `validation_Vente` tinyint(1) NOT NULL,
  `facture_imprimé` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ventes`
--

INSERT INTO `ventes` (`id`, `id_client`, `id_produit`, `Quantite_vente`, `Prix_Vente`, `validation_Vente`, `facture_imprimé`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 7500, 0, 0, '2024-05-15 21:10:31', '2024-05-15 21:10:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achats_id_fournisseur_foreign` (`id_fournisseur`),
  ADD KEY `achats_id_produit_foreign` (`id_produit`);

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fournisseurs_email_unique` (`email`);

--
-- Indexes for table `history__ventes`
--
ALTER TABLE `history__ventes`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_fournissers`
--
ALTER TABLE `payment_fournissers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_fournissers_id_fournisseur_foreign` (`id_Fournisseur`);

--
-- Indexes for table `payment__clients`
--
ALTER TABLE `payment__clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment__clients_id_client_foreign` (`id_Client`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
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
-- Indexes for table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventes_id_client_foreign` (`id_client`),
  ADD KEY `ventes_id_produit_foreign` (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achats`
--
ALTER TABLE `achats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history__ventes`
--
ALTER TABLE `history__ventes`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_fournissers`
--
ALTER TABLE `payment_fournissers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment__clients`
--
ALTER TABLE `payment__clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `achats_id_fournisseur_foreign` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `achats_id_produit_foreign` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Constraints for table `payment_fournissers`
--
ALTER TABLE `payment_fournissers`
  ADD CONSTRAINT `payment_fournissers_id_fournisseur_foreign` FOREIGN KEY (`id_Fournisseur`) REFERENCES `fournisseurs` (`id`);

--
-- Constraints for table `payment__clients`
--
ALTER TABLE `payment__clients`
  ADD CONSTRAINT `payment__clients_id_client_foreign` FOREIGN KEY (`id_Client`) REFERENCES `clients` (`id`);

--
-- Constraints for table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `ventes_id_produit_foreign` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
