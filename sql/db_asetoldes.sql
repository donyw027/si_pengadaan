-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 02:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id` int(11) NOT NULL,
  `jenis_aset` varchar(20) NOT NULL,
  `nama_aset` varchar(30) NOT NULL,
  `jumlah_unit` varchar(5) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `tgl_perolehan` varchar(15) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`id`, `jenis_aset`, `nama_aset`, `jumlah_unit`, `merk`, `tgl_perolehan`, `kondisi`, `lokasi`, `ruang`, `kategori`, `keterangan`) VALUES
(2, 's', 'ac', '1', 'Daikin', '19-09-2000', 'baik', 'SMP 2', 'kategorial', 'Elektronik', 'yahahah'),
(3, 's', 'ac', '1', 'Daikin', '19-09-2000', 'baik', 'smp 3', 'kategorial', 'Elektronik', 'yahahah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposal`
--

CREATE TABLE `tb_disposal` (
  `id` int(11) NOT NULL,
  `tgl_disposal` varchar(15) NOT NULL,
  `jenis_aset` varchar(20) NOT NULL,
  `nama_aset` varchar(20) NOT NULL,
  `jumlah_unit` varchar(5) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `no_seri` varchar(20) DEFAULT NULL,
  `lokasi` varchar(30) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`) VALUES
(1, 'Elektronik'),
(2, 'Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id`, `lokasi`) VALUES
(1, 'SMP 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merk`
--

CREATE TABLE `tb_merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_merk`
--

INSERT INTO `tb_merk` (`id`, `merk`) VALUES
(1, 'Daikin'),
(2, 'Daikin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` int(11) NOT NULL,
  `ruang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `ruang`) VALUES
(1, '7D');

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
  `role` enum('admin','keuangan','marketing','pendidikan','sarpras','sdm','sekretariat','yayasan','akunting') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(14, 'doni', 'doni', 'IT', '-', 'admin', '$2y$10$TLWyJK2HZOvzuf6DFTqXce4Gim6MgwGpjCsd61QDUHsauXm8a87Sq', 1686095893, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_disposal`
--
ALTER TABLE `tb_disposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
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
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_disposal`
--
ALTER TABLE `tb_disposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
