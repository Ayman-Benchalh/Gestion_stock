-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 02:29 PM
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
-- Database: `gestionstock`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'ayman', 'amical andalouse sud n 529 tiflet', 'aymanbenchalh53@gmail.com', '+212710317523', 0, '2024-04-28 17:21:36', '2024-04-28 23:51:05'),
(2, 'champlin.jarrett', '47124 Orn Garden\nFritschton, DC 56464', 'cpacocha@schaefer.com', '1-612-231-8119', 3147, '2024-04-28 19:16:54', '2024-04-29 00:16:40'),
(3, 'marlen09', '7584 Larson Locks\nSouth Lylatown, NJ 10114-2915', 'daisy.bernier@hane.com', '(347) 641-1133', 11809, '2024-04-28 19:16:54', '2024-04-29 00:21:52'),
(4, 'keshawn93', '584 Christ Lodge Apt. 413\nHowardville, NH 96685', 'maverick.windler@schmidt.com', '+1.361.718.2548', 0, '2024-04-28 19:16:54', '2024-04-28 23:00:49'),
(5, 'pacocha.antonio', '48079 Lillian Station\nNorth Rolando, CT 43167-6091', 'jhaley@herman.com', '+15048094570', 0, '2024-04-28 19:16:54', '2024-04-28 23:45:43'),
(6, 'beatty.orlo', '7232 Amir Fort\nChandlerhaven, LA 54233', 'walker.winifred@kozey.com', '+1-651-418-3481', 0, '2024-04-28 19:16:54', '2024-04-28 19:16:54');

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
(2, 'Hilda Cummerata', '6676 Eleanore Mountains\nBauchberg, MS 13187', 'aron.steuber@example.org', '+14237846332', 0, '2024-04-28 18:20:11', '2024-04-28 18:20:11'),
(3, 'Florine Boyle', '6169 Abshire Knolls\nSvenview, LA 22043', 'leo.barton@example.com', '757.428.2355', 0, '2024-04-28 18:20:11', '2024-04-28 18:20:11'),
(4, 'Mr. Mason Schimmel', '8357 Vincent Freeway Apt. 466\nWest Aileenhaven, TN 23506-2962', 'hugh.erdman@example.org', '+18208282704', 0, '2024-04-28 18:20:11', '2024-04-28 18:20:11'),
(5, 'Hailey Steuber III', '4824 Donnie Branch\nSchinnertown, RI 56344', 'toy.ethelyn@example.org', '520.595.9516', 0, '2024-04-28 18:20:11', '2024-04-28 18:20:11'),
(6, 'Miss Carlie Muller DVM', '7288 Kirlin Turnpike\nSouth David, GA 28430-9577', 'rosalia.ondricka@example.com', '(503) 560-9663', 0, '2024-04-28 18:20:11', '2024-04-28 18:20:11');

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

--
-- Dumping data for table `history__ventes`
--

INSERT INTO `history__ventes` (`id`, `id_client`, `id_produit`, `Quantite_vente`, `Prix_Vente`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2049, '2024-04-28 18:48:40', '2024-04-28 18:48:40'),
(2, 1, 2, 1, 1143, '2024-04-28 18:49:15', '2024-04-28 18:49:15'),
(3, 2, 1, 1, 2049, '2024-04-28 19:18:38', '2024-04-28 19:18:38'),
(4, 1, 3, 1, 931, '2024-04-28 19:26:48', '2024-04-28 19:26:48'),
(5, 1, 4, 1, 899, '2024-04-28 22:43:48', '2024-04-28 22:43:48'),
(6, 1, 6, 2, 2998, '2024-04-28 22:43:59', '2024-04-28 22:43:59'),
(7, 3, 1, 1, 2049, '2024-04-28 22:50:08', '2024-04-28 22:50:08'),
(8, 3, 4, 2, 1798, '2024-04-28 22:50:25', '2024-04-28 22:50:25'),
(9, 4, 2, 1, 1143, '2024-04-28 23:00:41', '2024-04-28 23:00:41'),
(10, 5, 1, 1, 2049, '2024-04-28 23:02:30', '2024-04-28 23:02:30'),
(11, 5, 3, 1, 931, '2024-04-28 23:03:58', '2024-04-28 23:03:58'),
(12, 5, 5, 1, 14975, '2024-04-28 23:40:02', '2024-04-28 23:40:02'),
(13, 1, 1, 1, 2049, '2024-04-28 23:50:10', '2024-04-28 23:50:10'),
(14, 1, 2, 1, 1143, '2024-04-28 23:50:58', '2024-04-28 23:50:58'),
(15, 2, 1, 1, 2049, '2024-04-29 00:03:48', '2024-04-29 00:03:48'),
(16, 2, 1, 1, 2049, '2024-04-29 00:06:27', '2024-04-29 00:06:27'),
(17, 2, 1, 2, 4098, '2024-04-29 00:09:08', '2024-04-29 00:09:08'),
(18, 2, 1, 2, 4098, '2024-04-29 00:13:10', '2024-04-29 00:13:10'),
(19, 2, 1, 2, 4098, '2024-04-29 00:15:28', '2024-04-29 00:15:28'),
(20, 3, 1, 2, 4098, '2024-04-29 00:18:20', '2024-04-29 00:18:20'),
(21, 3, 3, 2, 1862, '2024-04-29 00:18:35', '2024-04-29 00:18:35'),
(22, 3, 4, 1, 899, '2024-04-29 00:19:08', '2024-04-29 00:19:08'),
(23, 3, 5, 2, 29950, '2024-04-29 00:20:54', '2024-04-29 00:20:54');

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
(11, '2024_04_20_184718_create_history__ventes_table', 1);

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
(10, 2, 1000, '2024-04-29 00:15:52', '2024-04-29 00:16:40'),
(11, 3, 20000, '2024-04-29 00:19:49', '2024-04-29 00:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_Prod` varchar(255) NOT NULL,
  `Designation_Prod` varchar(255) NOT NULL,
  `Quantité` varchar(255) NOT NULL,
  `Prix` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `Nom_Prod`, `Designation_Prod`, `Quantité`, `Prix`, `created_at`, `updated_at`) VALUES
(1, 'XIAOMI REDMI NOTE 13', '6.67\"- 6GB+128GB – ICE BLUE', '20', '2049', '2024-04-28 17:23:21', '2024-04-28 17:23:21'),
(2, 'Samsung Galaxy A04', '6.5\" - 4GB RAM + 64GB ROM - 50MP - Black', '15', '1143', '2024-04-28 17:24:29', '2024-04-28 17:24:29'),
(3, 'Infinix Smart 8', '4+4 GB RAM + 64 GB ROM - Gold', '30', '931', '2024-04-28 17:25:03', '2024-04-28 17:25:03'),
(4, 'Itel A70', '8GB (3+5GB) + 64GB, HD+, 13MP, 6.6”, 5000mAh, Type C, Brilliant Gold', '5', '899', '2024-04-28 17:26:26', '2024-04-28 17:26:26'),
(5, 'iPhone 15 Pro', 'Max 256GB Titane Naturel 6,7\" Bouton Action A17 Pro 8GB RAM iOS 17', '10', '14975', '2024-04-28 17:27:27', '2024-04-28 17:27:27'),
(6, 'Samsung Galaxy M13', '6.6\" - 4GB RAM + 128GB ROM – 50Mpx – Light Blue', '20', '1499', '2024-04-28 17:28:13', '2024-04-28 17:28:13');

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
('IM1mBM7t7rLRXwcNUGui8AJUpcTkkaufsquM9xkQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWXMxNlF1cFpkcmtjcFRCTnJEZWVHUFR4NWxtV3FIMDlYdHRZRHQxZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9QYXlfY2xpZW50LzM/X3Rva2VuPVlzMTZRdXBaZHJrY3BUQk5yRGVlR1BUeDVsbVdxSDA5WHR0WUR0MWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NzoiaWRfVXNlciI7aToxO3M6MTE6Ik5vbV9Db21wbGV0IjtzOjEzOiJheW1hbmJlbmNoYWxoIjtzOjU6ImVtYWlsIjtzOjI1OiJheW1hbmJlbmNoYWxoNTNAZ21haWwuY29tIjt9', 1714353713);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_Complet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Nom_Complet`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aymanbenchalh', 'aymanbenchalh53@gmail.com', '2024-04-28 17:14:42', '$2y$12$uwpxFOLsHBDAc4pJ4fszoeZnnB/rc7FvAiK9LfPtx86ZVLGmH7x.e', NULL, '2024-04-28 17:13:50', '2024-04-28 17:14:42');

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
(19, 2, 1, 1, 2049, 1, 1, '2024-04-29 00:15:28', '2024-04-29 00:16:40'),
(20, 3, 1, 2, 4098, 1, 1, '2024-04-29 00:18:20', '2024-04-29 00:21:52'),
(21, 3, 3, 2, 1862, 1, 1, '2024-04-29 00:18:35', '2024-04-29 00:21:52'),
(22, 3, 4, 1, 899, 1, 1, '2024-04-29 00:19:08', '2024-04-29 00:21:52'),
(23, 3, 5, 2, 29950, 1, 1, '2024-04-29 00:20:54', '2024-04-29 00:21:52');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history__ventes`
--
ALTER TABLE `history__ventes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_fournissers`
--
ALTER TABLE `payment_fournissers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment__clients`
--
ALTER TABLE `payment__clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
