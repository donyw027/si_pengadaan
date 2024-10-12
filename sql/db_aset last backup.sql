-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 12:16 AM
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
  `jumlah_unit` int(11) NOT NULL,
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
(5, 'Tetap', 'TP LINK WIFI', 1, 'Tp Link', '2023-11-01', 'Baik', 'Kantor Yayasan Diannanda', 'Ruang Server', 'Elektronik', 'Ruang Server doni'),
(6, 'Tetap', 'AC', 30, 'Daikin', '2023-11-02', 'Baik', 'SMA Kristoforus 1', 'Ruang Kelas', 'Gedung', 'AC'),
(7, 'Tetap', 'Motor', 2, 'Supra', '2023-11-08', 'Baik', 'SMP Kristoforus 1', 'Ruang Sarpras', 'Kendaraan roda 2', 'Ada'),
(8, 'Tetap', 'TP LINK WIFI', 11, 'Huawei', '2023-11-01', 'Baik', 'Kantor Yayasan Diannanda', 'Ruang Server', 'Elektronik', 'Ruang Server doni'),
(9, 'ehhehe1', 'eheheh2', 103, 'Daikin', '2023-11-25', 'Baik1', 'R Kategorial', 'Ruang Guru', 'Alat Musik', 'mobilheheh1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposal`
--

CREATE TABLE `tb_disposal` (
  `id` int(11) NOT NULL,
  `tgl_disposal` varchar(15) NOT NULL,
  `jenis_aset` varchar(20) NOT NULL,
  `nama_aset` varchar(20) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `no_seri` varchar(20) DEFAULT NULL,
  `lokasi` varchar(30) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_disposal`
--

INSERT INTO `tb_disposal` (`id`, `tgl_disposal`, `jenis_aset`, `nama_aset`, `jumlah_unit`, `merk`, `no_seri`, `lokasi`, `ruang`, `kategori`, `keterangan`) VALUES
(5, '2023-11-30', 'Tetap', 'TP Link', 5, 'Tp Link', '98DSJIAOAD', 'TK Kristoforus 2', 'Ruang TU', 'Perlengkapan', 'Lengkap\r\n'),
(6, '2023-12-02', 'Tetap', 'Meja', 2, 'Asus', '-', 'Rumah 45', 'Ruang Lab', 'Elektronik', 'Rusak'),
(7, '2023-11-30', 'Tetap', 'TP Link WIfi', 55, 'Tp Link', '98DSJIAOAD', 'TK Kristoforus 2', 'Ruang TU', 'Perlengkapan', 'Lengkap\r\n'),
(8, '2023-12-02', 'Tetap', 'Meja', 27, 'Asus', '-', 'Kantor Yayasan Diannanda', 'Ruang Lab', 'Elektronik', 'Rusak'),
(9, '2023-11-11', 'tesedit', 'disposaledit', 191, 'Supra', '2qrwqe21', 'Kantor Yayasan Diannanda', 'Ruang Sarpras', 'Kendaraan roda 2', '111');

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
(2, 'Perlengkapan'),
(4, 'Furniture'),
(5, 'Kendaraan roda 2'),
(6, 'Kendaraan Roda 4'),
(7, 'Tanah'),
(8, 'Gedung'),
(9, 'Alat Musik');

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
(1, 'TK Kristoforus 1'),
(3, 'TK Kristoforus 2'),
(4, 'SD Kristoforus 1'),
(5, 'SD Kristoforus 2'),
(6, 'SMP Kristoforus 1'),
(7, 'SMP Kristoforus 2'),
(8, 'SMA Kristoforus 1'),
(9, 'SMA Kristoforus 2'),
(10, 'R Kategorial'),
(11, 'Kantor Yayasan Diannanda'),
(12, 'Rumah 45');

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
(2, 'Asus'),
(4, 'Tp Link'),
(5, 'Logitech'),
(6, 'Supra');

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
(3, 'Ruang Pendidikan'),
(4, 'Ruang Marketing'),
(5, 'Ruang Sekretariat'),
(6, 'Ruang Sarpras'),
(7, 'Ruang Keuangan'),
(8, 'Ruang SDM'),
(9, 'Ruang Kepala Sekolah'),
(10, 'Ruang Kelas'),
(11, 'Ruang Lab'),
(12, 'Ruang Guru'),
(13, 'Ruang TU'),
(14, 'Ruang Server');

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
(14, 'doni', 'doni', 'IT', '-', 'admin', '$2y$10$TLWyJK2HZOvzuf6DFTqXce4Gim6MgwGpjCsd61QDUHsauXm8a87Sq', 1686095893, 'user.png', 1),
(37, 'maytha', 'mayta', 'Staff Sarpras', '-', 'admin', '$2y$10$.nZXe.Zg17.oGWXqZTIV8.Cso22xyJFO0PEUgu/lyY/wJAtkO8oH2', 1698891730, 'user.png', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_disposal`
--
ALTER TABLE `tb_disposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
