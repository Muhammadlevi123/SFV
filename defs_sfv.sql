-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2024 at 09:23 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defs_sfv`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `pj` varchar(255) NOT NULL,
  `kerjasama` varchar(255) NOT NULL,
  `maps` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status_sfv` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `pj`, `kerjasama`, `maps`, `email`, `alamat`, `nama_unit`, `img`, `status_sfv`, `created_at`, `updated_at`) VALUES
(1, 'Balai Perikanan Banyuwangi', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d180812.41898712955!2d114.43366959763246!3d-8.07307000180313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd147309c687add%3A0x33cc6589a9d1938d!2sBangsring%20Underwater!5e0!3m2!1sen!2sid!4v1705390451232!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'sfvbangsring@email.com', 'Jl. Raya Banyuwangi Situbondo, Bangsring, Kabupaten Banyuwangi, Jawa Timur', 'Bangsring', 'assets/img/sfv/DJI_0169.JPG', 'DESA', '2024-01-16 07:36:58', '2024-01-16 07:36:58'),
(2, 'Balai Perikanan dan Kelautan Gondol', 'Balai Sidoarjo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4636357003023!2d114.71170017546753!3d-8.155954281706494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd19a0bea979001%3A0x52984b01d69679cd!2sBalai%20Besar%20Riset%20Budidaya%20Laut%20dan%20Penyuluhan%20Perikanan!5e0!3m2!1sen!2sid!4v1705392491981!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'uptgondol@email.com', 'Jl. Singaraja - Gilimanuk, Banjar Dinas Gondol, Penyabangan, Gerokgak, Penyabangan, Kec. Gerokgak, Kabupaten Buleleng, Bali 81155', 'UPT Gondol', 'assets/img/sfv/DSC07158.JPG', 'UPT', '2024-01-16 08:09:17', '2024-01-16 08:09:17'),
(3, '-', 'E-Fishery, Pemda Ciamis', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63337.487944567576!2d108.3097967201398!3d-7.172956453844068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f4396b64e7f3d%3A0x94b9597c1b6e0643!2sKawali%2C%20Ciamis%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1705564119376!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'kawali@email.com', 'Desa Kawali, Kab. Ciamis, Provinsi Jawa Barat', 'Kawali', 'assets/img/sfv/IMG03645.JPG', 'DESA', '2024-01-18 07:52:27', '2024-01-18 07:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `t_aset`
--

CREATE TABLE `t_aset` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `luas_aset` int(11) NOT NULL,
  `penggunaan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_aset`
--

INSERT INTO `t_aset` (`id`, `id_unit`, `nama_aset`, `luas_aset`, `penggunaan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 1, 'tanah kolam 2ha', 20000, 12450, 2023, '2024-01-16 07:58:28', '2024-01-16 07:58:28'),
(2, 1, 'tanah perkantoran 1ha', 10000, 7000, 2023, '2024-01-16 07:59:01', '2024-01-16 07:59:01'),
(3, 2, 'tanah seluruhan 10ha', 100000, 70000, 2023, '2024-01-16 08:10:01', '2024-01-16 08:10:01'),
(4, 3, 'Sawah 25ha', 250000, 250000, 2023, '2024-01-18 07:55:53', '2024-01-18 07:55:53'),
(5, 3, 'Minapadi 0,2ha', 2000, 1800, 2023, '2024-01-18 07:55:53', '2024-01-18 07:55:53'),
(6, 3, 'Budidaya (Kolam) 4ha', 40000, 37000, 2023, '2024-01-18 07:55:53', '2024-01-18 07:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `t_kunjungan`
--

CREATE TABLE `t_kunjungan` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_kunjungan`
--

INSERT INTO `t_kunjungan` (`id`, `id_unit`, `kategori`, `jumlah`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 1, 'magang', 4, 2023, '2024-01-16 07:59:24', '2024-01-16 07:59:24'),
(2, 1, 'kunjungan', 130, 2022, '2024-01-16 07:59:43', '2024-01-16 07:59:43'),
(3, 1, 'praktikum', 12, 2023, '2024-01-16 08:00:18', '2024-01-16 08:00:18'),
(4, 2, 'pelatihan', 143, 2023, '2024-01-16 08:10:36', '2024-01-16 08:10:36'),
(5, 2, 'kunjungan', 232, 2023, '2024-01-16 08:10:36', '2024-01-16 08:10:36'),
(6, 3, 'kunjungan', 243, 2022, '2024-01-18 08:07:23', '2024-01-18 08:07:23'),
(7, 3, 'kunjungan', 277, 2023, '2024-01-18 08:07:23', '2024-01-18 08:07:23'),
(8, 1, 'magang', 12, 2022, '2024-01-23 07:08:02', '2024-01-23 07:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `t_pnbp`
--

CREATE TABLE `t_pnbp` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `realisasi` int(11) NOT NULL,
  `pnbp` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_pnbp`
--

INSERT INTO `t_pnbp` (`id`, `id_unit`, `anggaran`, `realisasi`, `pnbp`, `bulan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 1, 500000000, 123000000, 36000000, 1, 2023, '2024-01-16 08:01:49', '2024-01-16 08:01:49'),
(2, 1, 450000000, 431000000, 410000000, 12, 2022, '2024-01-16 08:01:49', '2024-01-16 08:01:49'),
(3, 2, 500000000, 437000000, 450000000, 12, 2023, '2024-01-16 08:11:14', '2024-01-16 08:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `t_produksi`
--

CREATE TABLE `t_produksi` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `target_produksi` int(11) NOT NULL,
  `capaian_produksi` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `pagu` int(11) NOT NULL,
  `biaya_produksi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_produksi`
--

INSERT INTO `t_produksi` (`id`, `id_unit`, `produk`, `target_produksi`, `capaian_produksi`, `tahun`, `pagu`, `biaya_produksi`, `created_at`, `updated_at`) VALUES
(1, 1, 'kerang', 2000000, 2100000, 2023, 150000000, 138000000, '2024-01-16 08:06:15', '2024-01-16 08:06:15'),
(2, 1, 'lobster', 3000000, 2970000, 2023, 80000000, 81000000, '2024-01-16 08:06:15', '2024-01-16 08:06:15'),
(3, 1, 'lobster', 2500000, 2700000, 2022, 75000000, 72000000, '2024-01-16 08:07:05', '2024-01-16 08:07:05'),
(4, 2, 'udang vename', 3000000, 3250000, 2023, 260000000, 259000000, '2024-01-16 08:12:18', '2024-01-16 08:12:18'),
(5, 3, 'Ikan Nilem', 100000, 73000, 2023, 20000000, 21000000, '2024-01-18 08:13:38', '2024-01-18 08:13:38'),
(6, 3, 'Nila dan Gurame', 20000000, 22000000, 2023, 32000000, 31500000, '2024-01-18 08:16:11', '2024-01-18 08:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `cretaed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `id_unit`, `username`, `password`, `email`, `nama`, `role`, `cretaed_at`, `updated_at`) VALUES
(1, 1, 'sfv.bangsring', '$2a$12$eR/5zAmEmYFuUM2BRBPILuleHjSrImzarvEiPAHcrSjOic7/Mc7AS', 'bangsring@email.com', 'operator bangsring', 'operator', '2024-07-16 07:58:38', '2024-01-17 01:49:50'),
(2, 2, 'sfv.gondol', '$2y$10$taOTjBL7B.D.WOvsskOKQeQOOgHeEQp79LbHpNZWnHAxhY1oxKIZy', 'gondol@email.com', 'operator gondol', 'operator', '2024-01-17 01:49:50', '2024-01-17 01:49:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kunjungan`
--
ALTER TABLE `t_kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pnbp`
--
ALTER TABLE `t_pnbp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_kunjungan`
--
ALTER TABLE `t_kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_pnbp`
--
ALTER TABLE `t_pnbp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
