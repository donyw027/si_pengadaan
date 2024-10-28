-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 08:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengadaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id` int(11) NOT NULL,
  `request_id` varchar(16) NOT NULL,
  `tgl_note` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `user_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `id` int(11) NOT NULL,
  `no_coa` varchar(10) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `decision_log`
--

CREATE TABLE `decision_log` (
  `id` int(11) NOT NULL,
  `request_id` varchar(16) NOT NULL,
  `status` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_s`
--

CREATE TABLE `log_s` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `aksi` text NOT NULL,
  `aktor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` int(11) NOT NULL,
  `request_id` varchar(16) NOT NULL,
  `tgl_pengadaan` varchar(10) NOT NULL,
  `status_pengadaan` varchar(25) NOT NULL,
  `tgl_diterima` varchar(20) DEFAULT NULL,
  `penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_item`
--

CREATE TABLE `pengadaan_item` (
  `id` int(11) NOT NULL,
  `pengadaan_id` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `nama_item` text NOT NULL,
  `spesifikasi` text NOT NULL,
  `qty` int(11) NOT NULL,
  `aktual_harga` int(11) NOT NULL,
  `sub_aktual_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `request_id` varchar(16) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `total_estimasi_harga` int(11) DEFAULT NULL,
  `user_request` varchar(30) DEFAULT NULL,
  `konfirmasi_penerimaan` varchar(15) DEFAULT NULL,
  `diterima_by` varchar(30) DEFAULT NULL,
  `pengaduan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_item`
--

CREATE TABLE `request_item` (
  `id` int(11) NOT NULL,
  `request_id` varchar(16) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `nama_item` text NOT NULL,
  `spesifikasi` text NOT NULL,
  `qty` int(11) NOT NULL,
  `estimasi_harga` int(11) NOT NULL,
  `sub_estimasi_harga` int(11) DEFAULT NULL,
  `alasan_permintaan` text DEFAULT NULL,
  `ref_item` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('admin','yys','tu','kepsek') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `mail_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`, `mail_user`) VALUES
(14, 'doni', 'doni', '', 'yys', 'admin', '$2y$10$TLWyJK2HZOvzuf6DFTqXce4Gim6MgwGpjCsd61QDUHsauXm8a87Sq', 1686095893, 'user.png', 1, NULL),
(39, 'Khatarina Suyatmi', 'tk1', 'tk1', 'tk1', 'tu', '$2y$10$TYr3k0V3xKQX.cWyvqesmuLj.s6B.SZYIwF7PczkJDoQp6Lg3W8mm', 1728742639, 'user.png', 1, 'doniwicaksono27@gmail.com'),
(40, 'Regina Septia', 'tk2', 'tk2', 'tk2', 'tu', '$2y$10$.D/erge40gIvRMaVtTSqOuzS3gs4Wz0IeoG9NDUTTSxCOyMqP1l6m', 1728742654, 'user.png', 1, NULL),
(41, 'Nastim', 'sd1', 'sd1', 'sd1', 'tu', '$2y$10$Gn4ImQfRljoofDspib7P0OuRwYoc7HgOhqoA1LtPxZdbYejtRfS.W', 1728742675, 'user.png', 1, NULL),
(42, 'Marcelina Madia', 'sd2', 'sd2', 'sd2', 'tu', '$2y$10$q85I8YDqfDQLGNJdsDBQSOCsLVhsGxY9qL3Ric206VVLdlqVesOPi', 1728742687, 'user.png', 1, NULL),
(43, 'Marselina Agnes', 'smp1', 'smp1', 'smp1', 'tu', '$2y$10$lcv6zP11kmCthSs2cp2mIOoX8rghxsNWc8yzgbGpxbB7IC3X2s2SO', 1728742701, 'user.png', 1, NULL),
(44, 'Theresia Sulistiowati', 'smp2', 'smp2', 'smp2', 'tu', '$2y$10$Ge6QVx86jFsmveB9KVpUEuJPuT/oo2lsKoYJJwxoJXJF6PLIjE/9C', 1728742719, 'user.png', 1, NULL),
(45, 'Kunto Wibowo', 'sma1', 'sma1', 'sma1', 'tu', '$2y$10$h7wsWL5STEYRqhRkDv3d1.JfNH8flC1wQMLVqeZ1qGzVrz511FqA.', 1728742739, 'user.png', 1, NULL),
(46, 'Rosdiana Dince', 'sma2', 'sma2', 'sma2', 'tu', '$2y$10$t0Z6eNO/MHAEgL16MBhiq.xMPwl2ImetKhCfoxA7unvjLLMu1uv26', 1728742755, 'user.png', 1, NULL),
(47, 'Enny Kosidin', 'yys', 'yys', 'yys', 'yys', '$2y$10$oeSrntV9fSVsInNQnZtjS.3QUcHlPvIu/zg7Z7oglGUJL/K2lOvvC', 1728742769, 'user.png', 1, 'donydonny4@gmail.com'),
(48, 'Setyo', 'kepsek', 'kepsek', 'tk1', 'kepsek', '$2y$10$og5R6Szt4hhVYYY4ReCEgeQkTpKMhnrtKcsXoaR7bi763jwoy94Q2', 1728798611, 'user.png', 1, NULL),
(49, 'kepsek', 'kepseksd1', 'kepsek', 'sd1', 'kepsek', '$2y$10$Zsl.6dbQzxfgfi0KZBKCruRzKYx64wcDu6yRVOiI5nasdcukiDtt2', 1729402855, 'user.png', 1, NULL),
(50, 'Andrianus Bayu', 'bayu', 'IT', 'yys', 'admin', '$2y$10$LU4Oq6T54j3loHt3pvz59OQAdgSsU3P8EeFr8rzfZ0rAq6kwwUCeS', 1729408512, 'user.png', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decision_log`
--
ALTER TABLE `decision_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_s`
--
ALTER TABLE `log_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengadaan_item`
--
ALTER TABLE `pengadaan_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_item`
--
ALTER TABLE `request_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coa`
--
ALTER TABLE `coa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `decision_log`
--
ALTER TABLE `decision_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_s`
--
ALTER TABLE `log_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengadaan_item`
--
ALTER TABLE `pengadaan_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_item`
--
ALTER TABLE `request_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
