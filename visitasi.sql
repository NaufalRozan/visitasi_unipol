-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 26, 2025 at 05:15 AM
-- Server version: 8.0.35
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitasi_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `akreditasi`
--

CREATE TABLE `akreditasi` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_unit_id` bigint UNSIGNED NOT NULL,
  `nama_akreditasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT 'tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akreditasi`
--

INSERT INTO `akreditasi` (`id`, `sub_unit_id`, `nama_akreditasi`, `status`) VALUES
(40, 1, 'LAM INFOKOM 2.0', 'aktif'),
(41, 1, 'LAM2024', 'tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` bigint UNSIGNED NOT NULL,
  `substandar_id` bigint UNSIGNED NOT NULL,
  `no_urut` int NOT NULL,
  `nama_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `substandar_id`, `no_urut`, `nama_detail`) VALUES
(39, 53, 1, 'SK Rektor'),
(40, 53, 2, 'Sk Senat'),
(41, 53, 3, 'Hasil Musyawarah Pemangku Kepentingan'),
(42, 53, 4, 'Dokumen Kajian Awal'),
(43, 53, 5, 'Matriks Keselarasan VMTS'),
(44, 54, 1, 'Implementasi VMTS dalam Kurikulum'),
(45, 54, 2, 'Integrasi Misi dalam Penelitian'),
(46, 55, 1, 'Laporan Evaluasi Pencapaian'),
(47, 56, 1, 'Dokumen Hasil Analisis Risiko'),
(48, 57, 1, 'Revisi dan Pembaruan VMTS');

-- --------------------------------------------------------

--
-- Table structure for table `detail_item`
--

CREATE TABLE `detail_item` (
  `id` bigint UNSIGNED NOT NULL,
  `detail_id` bigint UNSIGNED NOT NULL,
  `no_urut` int NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_item`
--

INSERT INTO `detail_item` (`id`, `detail_id`, `no_urut`, `deskripsi`, `lokasi`, `tipe`, `file_path`) VALUES
(52, 39, 1, 'Surat Keputusan Rektor tentang pengesahan VMTS', 'storage/documents/Uxf0Tp7hrEpSbaRtjfZsVuDnIeZadf7H0NmKrFwj.pdf', 'Document', NULL),
(53, 40, 1, 'Surat Keputusan Senat sebagai bukti persetujuan VMTS', 'storage/documents/PXTVxZrre0XKDmjEUIKEguZ9cq5jHopAjLSfEyUH.pdf', 'Document', NULL),
(54, 41, 1, 'Dokumen hasil diskusi dengan pemangku kepentingan internal dan eksternal', 'storage/documents/0arDPVHWNalaqr7YqidU5BvlOxKZRuHUcupsqum1.png', 'Image', NULL),
(55, 42, 1, 'Video Kajian Awal', 'storage/documents/O7fKOD7fQfkP8zHjcEpIkulnL4SlRZL92PE99CMI.mp4', 'Video', NULL),
(56, 43, 1, 'Dokumen Matriks Keslarasan VMTS', 'storage/documents/Wc1CmkDivQqE0y0iK5zMERG11ELL3jx3qqhOMvqW.pdf', 'Document', NULL),
(61, 39, 2, 'Penetapan SK Rektor', 'storage/documents/rLmlvmyurP2Sb7e4ScwxJI1liKpy8kKiPsFJv7oJ.pdf', 'Document', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8eEQ62MPVNjI8ZqhqzzUhusLKQaO14xTbGzTCnif', 13, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOUN2TkNVSmdTWUg2OVRRaGlDaThpUktKeUxtOURySkpCNWU0djRCSyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3NlYXJjaC1maWxlP3E9ZG9rdW1lbiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7czoxMToic3ViX3VuaXRfaWQiO3M6MToiMSI7fQ==', 1752221554);

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id` bigint UNSIGNED NOT NULL,
  `akreditasi_id` bigint UNSIGNED NOT NULL,
  `no_urut` int NOT NULL,
  `nama_standar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id`, `akreditasi_id`, `no_urut`, `nama_standar`) VALUES
(59, 40, 1, 'VMTS'),
(60, 40, 2, 'Sumber Daya Manusia'),
(61, 40, 3, 'Pendidikan'),
(62, 40, 4, 'Penelitian'),
(63, 40, 5, 'Pengabdian');

-- --------------------------------------------------------

--
-- Table structure for table `substandar`
--

CREATE TABLE `substandar` (
  `id` bigint UNSIGNED NOT NULL,
  `standar_id` bigint UNSIGNED NOT NULL,
  `no_urut` int NOT NULL,
  `nama_substandar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `substandar`
--

INSERT INTO `substandar` (`id`, `standar_id`, `no_urut`, `nama_substandar`) VALUES
(53, 59, 1, 'Penetapan'),
(54, 59, 2, 'Pelaksanaan'),
(55, 59, 3, 'Evaluasi'),
(56, 59, 4, 'Pengendalian'),
(57, 59, 5, 'Peningkatan');

-- --------------------------------------------------------

--
-- Table structure for table `sub_units`
--

CREATE TABLE `sub_units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `nama_sub_unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_prodi` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_units`
--

INSERT INTO `sub_units` (`id`, `unit_id`, `nama_sub_unit`, `is_prodi`) VALUES
(1, 1, 'Teknologi Informasi', 0),
(2, 1, 'Teknik Mesin', 0),
(3, 1, 'Teknik Sipil', 0),
(9, 4, 'Akuntansi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_fakultas` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `nama_unit`, `is_fakultas`) VALUES
(1, 'Teknik', 0),
(4, 'Ekonomi dan Bisnis', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(13, 'Admin Universitas', 'admin_univ@umy.ac.id', '$2y$12$RWc4QBO/n6l.QWIdjctLre8GN0vwtv3JcAV2pQVce7Fme3NEh/5/C', 'Universitas'),
(17, 'Akun Demo - Fakultas', 'demo@demo.com', '$2y$12$DBHHW9po/irmNVGkJcpzSO3tInxFgC8s5W4T9CNLf.yw0Gw2lAI9m', 'Fakultas');

-- --------------------------------------------------------

--
-- Table structure for table `users_sub_unit`
--

CREATE TABLE `users_sub_unit` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sub_unit_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_sub_unit`
--

INSERT INTO `users_sub_unit` (`id`, `user_id`, `sub_unit_id`) VALUES
(84, 13, 1),
(2, 13, 2),
(3, 13, 3),
(86, 13, 9),
(80, 17, 1),
(82, 17, 2),
(83, 17, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditasi`
--
ALTER TABLE `akreditasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`sub_unit_id`);

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
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `substandar_id` (`substandar_id`);

--
-- Indexes for table `detail_item`
--
ALTER TABLE `detail_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_id` (`detail_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akreditasi_id` (`akreditasi_id`);

--
-- Indexes for table `substandar`
--
ALTER TABLE `substandar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standar_id` (`standar_id`);

--
-- Indexes for table `sub_units`
--
ALTER TABLE `sub_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`unit_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sub_unit`
--
ALTER TABLE `users_sub_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`sub_unit_id`),
  ADD KEY `prodi_id` (`sub_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akreditasi`
--
ALTER TABLE `akreditasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `detail_item`
--
ALTER TABLE `detail_item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sub_units`
--
ALTER TABLE `sub_units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_sub_unit`
--
ALTER TABLE `users_sub_unit`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akreditasi`
--
ALTER TABLE `akreditasi`
  ADD CONSTRAINT `akreditasi_ibfk_1` FOREIGN KEY (`sub_unit_id`) REFERENCES `sub_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`substandar_id`) REFERENCES `substandar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_item`
--
ALTER TABLE `detail_item`
  ADD CONSTRAINT `detail_item_ibfk_1` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `standar`
--
ALTER TABLE `standar`
  ADD CONSTRAINT `standar_ibfk_1` FOREIGN KEY (`akreditasi_id`) REFERENCES `akreditasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `substandar`
--
ALTER TABLE `substandar`
  ADD CONSTRAINT `substandar_ibfk_1` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_units`
--
ALTER TABLE `sub_units`
  ADD CONSTRAINT `sub_units_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_sub_unit`
--
ALTER TABLE `users_sub_unit`
  ADD CONSTRAINT `users_sub_unit_ibfk_1` FOREIGN KEY (`sub_unit_id`) REFERENCES `sub_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_sub_unit_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
