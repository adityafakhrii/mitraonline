-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 01:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `qty` double NOT NULL,
  `status` enum('keranjang','dipesan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanans`
--

INSERT INTO `detail_pesanans` (`id`, `id_pesanan`, `id_produk`, `id_user`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 6, 4, 'dipesan', '2021-07-14 07:11:54', '2021-07-14 07:12:07'),
(2, 2, 6, 6, 3, 'dipesan', '2021-07-14 07:31:54', '2021-07-14 07:32:09'),
(3, 3, 4, 6, 5, 'dipesan', '2021-07-14 07:36:30', '2021-07-14 07:56:52'),
(4, 3, 1, 6, 6, 'dipesan', '2021-07-14 07:50:40', '2021-07-14 07:56:52'),
(5, 5, 1, 6, 1, 'dipesan', '2021-07-14 10:52:14', '2021-07-14 21:52:17'),
(11, 4, 1, 4, 15, 'dipesan', '2021-07-14 11:18:04', '2021-07-14 21:25:29'),
(13, 6, 6, 7, 3, 'dipesan', '2021-07-15 06:36:34', '2021-07-15 06:39:40'),
(20, 9, 8, 8, 2, 'dipesan', '2021-07-17 07:22:29', '2021-07-17 07:25:30'),
(21, 9, 7, 8, 1, 'dipesan', '2021-07-17 07:22:59', '2021-07-17 07:25:30'),
(22, 10, 8, 8, 1, 'dipesan', '2021-07-17 07:37:29', '2021-07-17 07:37:38'),
(23, 11, 7, 8, 3, 'dipesan', '2021-07-17 07:44:08', '2021-07-17 07:44:17');

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
(2, '2021_06_08_154953_create_produks_table', 1),
(3, '2021_06_10_162947_create_pesanans_table', 1),
(4, '2021_06_10_172844_create_detail_pesanans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tgl` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum_dibayar','dibayar','dikirim','selesai','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `kode_pesanan`, `id_user`, `tgl`, `resi`, `total_harga`, `ongkir`, `catatan`, `status`, `bukti`, `created_at`, `updated_at`) VALUES
(1, 'JRSY-GlajGW', 6, '14-07-2021', 'JD520070092619521', 400000, 20000, NULL, 'selesai', '/bukti_transfer/Virtual Background Webinar CCCCreation.png', '2021-07-14 07:12:07', '2021-07-14 07:32:21'),
(2, 'JRSY-aacdpn', 6, '14-07-2021', NULL, 4500000, 20000, NULL, 'dibatalkan', '/bukti_transfer/Virtual Background Webinar CCCCreation.png', '2021-07-14 07:32:09', '2021-07-17 07:39:45'),
(3, 'JRSY-Djwr6g', 6, '14-07-2021', '520070009269521', 1525000, 20000, 'hamdeh', 'dikirim', '/bukti_transfer/BG CONTEN CREATOR.png', '2021-07-14 07:56:52', '2021-07-14 08:54:54'),
(4, 'JRSY-lD04r7', 4, '15-07-2021', NULL, 2250000, 20000, 'Okee yg cepet kirimnya', 'dibatalkan', NULL, '2021-07-14 21:25:29', '2021-07-14 21:47:21'),
(5, 'JRSY-BqynlF', 6, '15-07-2021', NULL, 150000, 20000, NULL, 'belum_dibayar', NULL, '2021-07-14 21:52:17', '2021-07-14 21:52:17'),
(6, 'JRSY-Ei7zlR', 7, '15-07-2021', 'JD520070092619521', 4500000, 20000, 'asjajadjad', 'selesai', '/bukti_transfer/21640844_1294246080697435_487802334670130102_o.jpg', '2021-07-15 06:39:40', '2021-07-15 07:29:19'),
(9, 'JRSY-ZGFXAK', 8, '17-07-2021', '520070009269521', 340000, 20000, 'Yang cepat kirimnya', 'selesai', '/bukti_transfer/Logo-Widyatama-Universitas-Widyatama-PNG.png', '2021-07-17 07:25:30', '2021-07-17 07:36:57'),
(10, 'JRSY-ZYLA3M', 8, '17-07-2021', NULL, 85000, 20000, NULL, 'dibatalkan', NULL, '2021-07-17 07:37:38', '2021-07-17 07:38:00'),
(11, 'JRSY-jIbwkt', 8, '17-07-2021', NULL, 510000, 20000, NULL, 'dibayar', '/bukti_transfer/Post di IG Story.jpeg', '2021-07-17 07:44:17', '2021-07-17 12:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Tersedia','Habis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `harga`, `deskripsi`, `status`, `stok`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Chelsea Home 2021/2022 - Player Issue', 150000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Tersedia', 99, '/img/chelsea.jpg', '2021-06-10 10:34:00', '2021-06-10 10:34:00'),
(3, 'Juventus Home 2021/2022 - Original', 100000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Tersedia', 55, '/img/juve.jpg', '2021-06-10 10:34:49', '2021-06-10 10:34:49'),
(4, 'AC Milan Home 2021/2022 - Player Issue', 125000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Tersedia', 66, '/img/milan.jpg', '2021-06-10 10:35:09', '2021-06-10 10:35:09'),
(5, 'Dortmund Home 2021/2022 - Fans Issue', 150000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Habis', 0, '/img/dortmund.jpg', '2021-06-10 10:35:29', '2021-06-10 10:35:29'),
(6, 'Real Madrid Home 2021/2022 - Original', 1500000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Tersedia', 5, '/img/madrid.jpg', '2021-06-10 10:35:54', '2021-06-10 10:35:54'),
(7, 'Bayern Munchen Away 2021/2022 - Player Issue', 170000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Tersedia', 11, '/img/munchen.jpg', '2021-06-10 10:37:35', '2021-06-10 10:37:35'),
(8, 'Arsenal Away 2021/2022 - Fans Issue', 85000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Tersedia', 900, '/img/ars.jpg', '2021-06-10 10:38:11', '2021-06-10 10:38:11'),
(9, 'Manchester City Home 2021/2022  - Grade Ori', 120000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed labore quae, expedita perferendis optio autem natus cum sint? Nisi ea maxime hic ut sunt fugiat sit nulla eligendi et. Ad.', 'Tersedia', 8, '/img/1662997033.jpg', '2021-07-14 06:22:29', '2021-07-14 06:22:29'),
(12, 'Kaos Hijau', 120000, 'kopjsoigfroigniob', 'Tersedia', 90, '/img/Free-T-shirt-Mockup-Front.jpg', '2021-07-17 07:31:06', '2021-07-17 07:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `foto`, `nama`, `username`, `email`, `no_hp`, `kode_pos`, `alamat`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, '/profil_user/WhatsApp Image 2021-07-11 at 23.20.50.jpeg', 'Aditya Fakhri Riansyah', 'morata7', 'adityafakhri03@gmail.com', '089111331241', 43122, 'Villa Adiprima Blok C6 No.17', 'user', '$2y$10$Clr3UcmtjdPy4VcWwzp1cuv3GM7NU6G9YPokNdmTetzlOyqlbecZG', NULL, '2021-07-11 21:06:44', '2021-07-14 21:00:09'),
(5, '/profil_user/admin.png', 'Admin Utama', 'adminutama', 'adminutama@gmail.com', '0899991118', 43192, 'Sukaraja, Sukabumi, Jawa Barat', 'admin', '$2y$10$N9W4u6sCxd2hq9qtQ2DI0e/TgXP3yWkT7OfOuIOqEPnqt/7qv6qBO', NULL, '2021-07-14 00:28:00', '2021-07-14 00:28:00'),
(6, '/profil_user/WhatsApp Image 2021-07-11 at 23.20.50.jpeg', 'Timo Werner', 'timowerner', 'timowerner@gmail.com', '088154473901', 43321, 'London, England', 'user', '$2y$10$WOa3z7M17Nn2RlKzezFliO/qnSco7ZpmQ57KeyW.H7QqCwyRSkmPW', NULL, '2021-07-14 06:24:06', '2021-07-14 06:24:06'),
(7, '/profil_user/WhatsApp_Image_2021-07-11_at_23.20.50-removebg-preview.png', 'Aditya Fakhri', 'adityaa', 'aditya@utama.ac.id', '0896414384734', 43192, 'Bandung', 'user', '$2y$10$hkSmeGUdnnhK1.YNMlVrk.xH/3FS00mThKzqoymXXpnm4Kh2/C0Rm', NULL, '2021-07-15 06:35:56', '2021-07-15 06:38:25'),
(8, '/profil_user/IGFEED11_02.jpg', 'Aditya Fakhri', 'fakhriii', 'user@gmail.com', '089666543312', 43192, 'Bandung', 'user', '$2y$10$LUhs2jPd1N8/OcInt/LkHeptD0H6YLjf0lCFMx97hXJtYj9YPC00q', NULL, '2021-07-17 06:34:26', '2021-07-17 07:24:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanans_id_produk_foreign` (`id_produk`),
  ADD KEY `detail_pesanans_id_user_foreign` (`id_user`),
  ADD KEY `detail_pesanans_id_pesanan_foreign` (`id_pesanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_id_user_foreign` (`id_user`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD CONSTRAINT `detail_pesanans_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanans` (`id`),
  ADD CONSTRAINT `detail_pesanans_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`),
  ADD CONSTRAINT `detail_pesanans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
