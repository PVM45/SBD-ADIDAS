-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 06:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test5`
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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Man', NULL, NULL),
(2, 'woman', NULL, NULL),
(3, 'Kids', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoris_subkategoris`
--

CREATE TABLE `kategoris_subkategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `subkategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris_subkategoris`
--

INSERT INTO `kategoris_subkategoris` (`id`, `produk_id`, `kategori_id`, `subkategori_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, NULL, NULL),
(2, 5, 1, 3, NULL, NULL),
(3, 6, 2, 1, NULL, NULL),
(4, 7, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_belanjas`
--

CREATE TABLE `keranjang_belanjas` (
  `id_keranjang` varchar(255) NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `total_harga` double NOT NULL,
  `aksi` enum('checkout','hapus') NOT NULL,
  `kuantitas_beli` int(11) NOT NULL,
  `harga` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2022_04_10_064037_create_roles_table', 1),
(6, '2022_05_12_091946_create_kategoris_table', 1),
(7, '2022_05_12_092052_create_subkategoris_table', 1),
(8, '2023_05_02_031118_create_produks_table', 1),
(9, '2023_05_02_033346_create_pembayarans_table', 1),
(10, '2023_05_02_034023_create_review_produks_table', 1),
(11, '2023_05_02_035429_create_wishlists_table', 1),
(12, '2023_05_02_035505_create_keranjang_belanjas_table', 1),
(13, '2023_05_02_041029_create_pesanans_table', 1),
(14, '2023_05_12_095344_create_kategoris_subkategoris', 1);

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
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `kode_pembayaran` varchar(255) NOT NULL,
  `jumlah_pembayaran` double(8,2) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status` enum('belum_dibayar','sudah_dibayar') NOT NULL DEFAULT 'belum_dibayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id_pesanan` varchar(255) NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `total_pembayaran` double NOT NULL,
  `status_pesanan` enum('terkonfirmasi','belum_terkonfirmassi') NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `id_subkategori` bigint(20) UNSIGNED NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `varian_warna` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `status_produk` enum('tersedia','habis') NOT NULL,
  `harga_produk` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `id_kategori`, `id_subkategori`, `deskripsi_produk`, `gambar_produk`, `varian_warna`, `ukuran`, `stok`, `status_produk`, `harga_produk`, `created_at`, `updated_at`) VALUES
(4, 'Sepatu Pria', 1, 1, 'Man Sepatu', 'tes1', 'Hitam', '42', 16, 'tersedia', 120000.00, NULL, NULL),
(5, 'Sepatu Pria', 1, 1, 'Man Sepatu', 'tes2', 'Putih', '42', 51, 'tersedia', 132500.00, NULL, NULL),
(6, 'Sepatu Cewe', 2, 1, 'Woman Sepatu', 'tes3', 'Merah', '43', 14, 'tersedia', 190000.00, NULL, NULL),
(7, 'Sepatu Cewe', 2, 1, 'Woman sepatu', 'tes4', 'pink', '41', 51, 'tersedia', 1000088.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review_produks`
--

CREATE TABLE `review_produks` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `isi_ulasan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subkategoris`
--

CREATE TABLE `subkategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_subkategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkategoris`
--

INSERT INTO `subkategoris` (`id`, `nama_subkategori`, `created_at`, `updated_at`) VALUES
(1, 'sepatu', NULL, NULL),
(2, 'pakaian', NULL, NULL),
(3, 'sports', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `alamat`, `nomor_telepon`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mr. Admin', 'admin@gmail.com', 'kabanjahe', '08121234567', NULL, '$2y$10$V..M2QFLeMb2xodIT2Mvje.RtAPhLavS1tEye75QrgP.nizDm8Uz6', NULL, NULL, NULL),
(2, 2, 'Mr. Author', 'author@gmail.com', 'kabanjahe', '08121234567', NULL, '$2y$10$8u9Q69WvMdktYzB.4Ez6Xuv1SXe/jZq63YbJG5ast0aMUgk47Kb6e', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id_wishlist` varchar(255) NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `aksi` enum('beli','hapus') NOT NULL DEFAULT 'beli',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris_subkategoris`
--
ALTER TABLE `kategoris_subkategoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoris_subkategoris_produk_foreign` (`produk_id`),
  ADD KEY `kategoris_subkategoris_kategori_foreign` (`kategori_id`),
  ADD KEY `kategoris_subkategoris_subkategori_foreign` (`subkategori_id`);

--
-- Indexes for table `keranjang_belanjas`
--
ALTER TABLE `keranjang_belanjas`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `keranjang_belanjas_id_produk_foreign` (`id_produk`);

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
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pesanans_id_produk_foreign` (`id_produk`),
  ADD KEY `pesanans_id_user_foreign` (`id_user`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_id_kategori_foreign` (`id_kategori`),
  ADD KEY `produks_id_subkategori_foreign` (`id_subkategori`);

--
-- Indexes for table `review_produks`
--
ALTER TABLE `review_produks`
  ADD KEY `review_produks_id_produk_foreign` (`id_produk`),
  ADD KEY `review_produks_id_user_foreign` (`id_user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkategoris`
--
ALTER TABLE `subkategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `wishlists_id_produk_foreign` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoris_subkategoris`
--
ALTER TABLE `kategoris_subkategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subkategoris`
--
ALTER TABLE `subkategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoris_subkategoris`
--
ALTER TABLE `kategoris_subkategoris`
  ADD CONSTRAINT `kategoris_subkategoris_kategori_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategoris_subkategoris_produk_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategoris_subkategoris_subkategori_foreign` FOREIGN KEY (`subkategori_id`) REFERENCES `subkategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang_belanjas`
--
ALTER TABLE `keranjang_belanjas`
  ADD CONSTRAINT `keranjang_belanjas_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produks_id_subkategori_foreign` FOREIGN KEY (`id_subkategori`) REFERENCES `subkategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review_produks`
--
ALTER TABLE `review_produks`
  ADD CONSTRAINT `review_produks_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_produks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
