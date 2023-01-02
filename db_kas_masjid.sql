-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 02:22 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kas_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Imam', NULL, NULL),
(2, 'Muazin', NULL, NULL),
(3, 'Khatib', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `kode_jabatan` varchar(45) NOT NULL,
  `nama_jabatan` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'KT01', 'Ketua', NULL, NULL),
(2, 'WKT01', 'Wakil Ketua', '2022-11-20 22:42:31', '2022-11-20 22:42:31'),
(3, 'SK01', 'Sekertaris', '2022-11-20 22:43:52', '2022-11-20 22:43:52'),
(4, 'BD01', 'Bendahara', '2022-11-20 22:44:07', '2022-11-20 22:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `kas_keluar`
--

CREATE TABLE `kas_keluar` (
  `id` int(11) NOT NULL,
  `kode_kas` varchar(45) NOT NULL,
  `sumber` varchar(45) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kas_keluar`
--

INSERT INTO `kas_keluar` (`id`, `kode_kas`, `sumber`, `keterangan`, `tanggal`, `pengeluaran`, `created_at`, `updated_at`) VALUES
(1, 'KSK01', 'beli kue', 'beli kue untuk panitia', '2022-11-23', 200000, NULL, NULL),
(2, 'KSK02', 'Pembelian Batu', 'untuk pembelian Batu', '2022-11-23', 1000000, '2022-11-23 00:11:52', '2022-11-23 00:17:39'),
(4, 'KSK05', 'uang Makan', 'untuk makan pekerja bangunan masjid', '2022-11-25', 200000, '2022-11-24 23:56:54', NULL),
(6, 'KSK3', 'Pembelian Batu', 'beli batu', '2022-12-15', 1000000, '2022-12-14 13:43:14', NULL),
(7, 'KSK04', 'Pembelian Kue dan Makanan', 'beli kue', '2022-08-15', 200000, '2022-12-14 13:44:51', NULL),
(8, 'KSK06', 'Hidayat', 'bayar uang lampu', '2022-01-15', 1000000, '2022-12-14 13:45:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

CREATE TABLE `kas_masuk` (
  `id` int(11) NOT NULL,
  `kode_kas` varchar(45) NOT NULL,
  `sumber` varchar(45) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `Pemasukan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kas_masuk`
--

INSERT INTO `kas_masuk` (`id`, `kode_kas`, `sumber`, `keterangan`, `tanggal`, `Pemasukan`, `created_at`, `updated_at`) VALUES
(1, 'KSM01', 'Hamba Allah', 'infak', '2022-11-23', 25000000, NULL, '2022-11-22 21:15:06'),
(2, 'KSM02', 'Hidayat', 'sedekah', '2022-11-23', 1000000, '2022-11-22 20:59:10', '2022-11-22 21:25:16'),
(4, 'KSM05', 'Hidayat', 'Sodakoh', '2022-11-26', 1000000, '2022-11-24 23:55:37', '2022-12-04 02:03:46'),
(7, 'KSM03', 'Ridwan', 'infak', '2022-12-15', 1000000, '2022-12-14 12:21:39', NULL),
(8, 'KSM04', 'Hidayat', 'infak', '2022-12-15', 500000, '2022-12-14 12:28:48', NULL),
(9, 'KSM06', 'Hidayat', 'infak', '2022-01-15', 1000000, '2022-12-14 12:30:02', NULL),
(10, 'KSM7', 'Ridwan', 'infak', '2022-06-15', 1000000, '2022-12-14 13:06:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul_kegiatan` varchar(45) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `ket` text DEFAULT NULL,
  `foto` varchar(45) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul_kegiatan`, `tgl_kegiatan`, `ket`, `foto`, `petugas_id`, `created_at`, `updated_at`) VALUES
(20, 'Hari Raya Idul Fitri', '2022-05-03', 'Selamat Hari Raya Idul Fitri Mohon Maaf Lahir Batin', 'foto-Hari Raya Idul Fitri.jpg', 22, '2022-12-13 02:08:18', NULL),
(21, 'Hari Raya Idul Adha', '2022-07-09', 'Selamat Hari Raya Idul Adha', 'foto-Hari Raya Idul Adha.jpg', 22, '2022-12-13 02:08:59', NULL),
(22, 'Buka Puasa Bersama di bulan Romadhon', '2022-04-03', 'Selamat Berbuka Puasa di masjid Kubah Mas', 'foto-Buka Puasa Bersama di bulan Romadhon.jpg', 23, '2022-12-13 02:10:25', NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_08_020442_create_staff_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ryan123@gmail.com', '$2y$10$MWq/ewfb3sKZ.6I1oJswkeJrxfWLLT7gOyoeiTbRvILpB8nLzE7gi', '2022-12-04 23:25:41'),
('aldyprayogo53@gmail.com', '$2y$10$AjjOXL53vr8sfcmSR7mmLepaGwahHEQG8hqJoW36DbJAy9m.PkNny', '2022-12-05 03:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `kode_petugas` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tmp_lahir` varchar(45) NOT NULL,
  `tgl_lahir` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `no_hp` char(15) DEFAULT NULL,
  `status` enum('Menikah','Belum Menikah') NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `kode_petugas`, `nama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `gender`, `no_hp`, `status`, `foto`, `jabatan_id`, `created_at`, `updated_at`) VALUES
(22, 'KT1', 'Daffa', 'Jakarta', '1998-06-13', 'Depok,Sawangan TImur', 'L', NULL, 'Belum Menikah', 'foto-Daffa.jpg', 1, '2022-12-13 01:53:21', NULL),
(23, 'SK1', 'Herlan Jayadi', 'Lombok', '1999-06-13', 'Mandalika Timur', 'L', NULL, 'Belum Menikah', 'foto-Herlan Jayadi.jpg', 3, '2022-12-13 01:55:09', NULL),
(24, 'WK1', 'Ahmad', 'Bogor', '2000-06-13', 'Jakarta Barat', 'L', NULL, 'Belum Menikah', 'foto-Ahmad.jpg', 2, '2022-12-13 01:57:06', NULL),
(25, 'BD1', 'Aldy Prayogo', 'Pontianak', '2000-08-21', 'Desa Sungai Bulan,Kec.Sungai Raya,Kab.Kubu Raya, Kalimantan Barat', 'L', NULL, 'Belum Menikah', 'foto-Aldy Prayogo.jpg', 4, '2022-12-13 01:59:48', NULL),
(26, 'SK2', 'Zam zami', 'Malang', '2000-07-13', 'Malang Jawa Timur', 'L', NULL, 'Belum Menikah', 'foto-Zam zami.jpg', 3, '2022-12-13 02:01:28', NULL),
(28, 'BD2', 'Putri', 'Jakarta', '1998-01-07', 'Karawang Timur', 'P', NULL, 'Menikah', 'foto-Putri.jpg', 4, '2022-12-15 04:46:23', NULL),
(29, 'BD3', 'Mohammad Ismail', 'Depok', '2022-12-30', 'sfdadxasdxxxxx', 'L', NULL, 'Menikah', '', 4, '2022-12-15 04:50:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas_jumaat`
--

CREATE TABLE `petugas_jumaat` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `bagian_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas_jumaat`
--

INSERT INTO `petugas_jumaat` (`id`, `tgl`, `petugas_id`, `bagian_id`, `created_at`, `updated_at`) VALUES
(6, '2022-12-16', 22, 1, '2022-12-13 02:04:00', NULL),
(7, '2022-12-16', 23, 2, '2022-12-13 02:04:18', NULL),
(8, '2022-12-16', 24, 3, '2022-12-13 02:04:38', NULL),
(9, '2022-12-23', 22, 2, '2022-12-13 02:04:56', NULL),
(10, '2022-12-23', 26, 1, '2022-12-13 02:05:12', NULL),
(11, '2022-12-23', 25, 3, '2022-12-13 02:05:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas','anggota') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anggota',
  `isactive` tinyint(1) NOT NULL DEFAULT 0,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `isactive`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aldy Prayogo', 'aldyprayogo53@gmail.com', NULL, '$2y$10$NVSVELTqpHDqyysI0gHm4.fY5E1qHfTPkL6Q80e7z1ZXV606U2Pse', 'admin', 1, 'aldy.jpg', NULL, '2022-11-27 09:09:31', '2022-11-27 09:09:31'),
(2, 'indah', 'indahpermatasari@gmail.com', NULL, '$2y$10$rOmDCWPnFcRmBO673/CoTeF3G6NP0pdVz6xfN9cYRD5GS4ODc/dQi', 'anggota', 1, 'indah.jpg', NULL, '2022-11-28 02:39:32', '2022-11-28 02:39:32'),
(3, 'Bandi', 'bandi@gmail.com', NULL, '$2y$10$3TpJFhXqVBM/wn6IQ93eguDtfFYzmpNCmDLrK9y3E/DHPmtOFO/nm', 'anggota', 1, NULL, NULL, '2022-11-28 02:57:06', '2022-11-28 02:57:06'),
(5, 'deden', 'deden@gmail.com', NULL, '$2y$10$E1wYIcOQxLPjtE3U5PyeLOQJT/mumtzICZwuef9dH8C.Mdc80f9G6', 'petugas', 1, NULL, NULL, '2022-11-28 03:11:24', '2022-11-28 03:11:24'),
(10, 'gilos', 'gilos@gmail.com', NULL, '$2y$10$EGBxieoEtH61Q9VSHr8mAevZNtWUMjsL1qd36tcQD2IH9vGVjLlf6', 'anggota', 1, 'foto-gilos.jpg', NULL, '2022-12-05 03:37:15', NULL),
(12, 'Nur Rohmah', 'nur@gmail.com', NULL, '$2y$10$808C63K8LOvB6EP8tq1QGuPkB.xRhC7L0qenLfeGbNaS05RejhcHq', 'petugas', 1, NULL, NULL, '2022-12-05 06:02:22', '2022-12-05 06:02:22'),
(13, 'Rendi Pangalila', 'randipangalila@gmail.com', NULL, '$2y$10$6zpF8.3juI7yUlRRw1DScOY2uOvIAKoKlWKo7AGz11TdO6VMj.0Iu', 'anggota', 1, NULL, NULL, '2022-12-13 20:45:01', '2022-12-13 20:45:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jabatan_UNIQUE` (`kode_jabatan`);

--
-- Indexes for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kas_UNIQUE` (`kode_kas`);

--
-- Indexes for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kas_UNIQUE` (`kode_kas`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kegiatan_petugas1_idx` (`petugas_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_petugas_UNIQUE` (`kode_petugas`),
  ADD KEY `fk_petugas_jabatan1_idx` (`jabatan_id`);

--
-- Indexes for table `petugas_jumaat`
--
ALTER TABLE `petugas_jumaat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_petugas_jumaat_petugas1_idx` (`petugas_id`),
  ADD KEY `fk_petugas_jumaat_bagian1_idx` (`bagian_id`);

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
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `petugas_jumaat`
--
ALTER TABLE `petugas_jumaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_petugas1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `fk_petugas_jabatan1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `petugas_jumaat`
--
ALTER TABLE `petugas_jumaat`
  ADD CONSTRAINT `fk_petugas_jumaat_bagian1` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_petugas_jumaat_petugas1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
