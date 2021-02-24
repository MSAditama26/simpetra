-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 07:49 AM
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
-- Database: `simpentra`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_kegiatan`
--

CREATE TABLE `all_kegiatan` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `ID_mitra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_kegiatan`
--

INSERT INTO `all_kegiatan` (`id`, `kegiatan_id`, `ID_mitra`) VALUES
(29, 9, 1001),
(30, 9, 1002),
(31, 3, 1001),
(32, 3, 1002),
(33, 3, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `all_kegiatan_pengawas`
--

CREATE TABLE `all_kegiatan_pengawas` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `id_pengawas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_kegiatan_pengawas`
--

INSERT INTO `all_kegiatan_pengawas` (`id`, `kegiatan_id`, `id_pengawas`) VALUES
(16, 9, 14),
(17, 9, 3),
(18, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `all_penilaian`
--

CREATE TABLE `all_penilaian` (
  `id` int(11) NOT NULL,
  `pengawas_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `ID_mitra` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_penilaian`
--

INSERT INTO `all_penilaian` (`id`, `pengawas_id`, `kegiatan_id`, `ID_mitra`, `kriteria_id`, `nilai`) VALUES
(27, 3, 3, 1001, 1, 2),
(28, 3, 3, 1001, 2, 4),
(29, 3, 3, 1001, 3, 1),
(30, 3, 9, 1001, 1, 2),
(31, 3, 9, 1001, 2, 4),
(32, 3, 9, 1001, 3, 3),
(33, 3, 9, 1002, 1, 5),
(34, 3, 9, 1002, 2, 4),
(35, 3, 9, 1002, 3, 3),
(36, 14, 9, 1001, 1, 5),
(37, 14, 9, 1001, 2, 3),
(38, 14, 9, 1001, 3, 4),
(39, 14, 9, 1002, 1, 2),
(40, 14, 9, 1002, 2, 5),
(41, 14, 9, 1002, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `start` int(11) NOT NULL,
  `finish` int(11) NOT NULL,
  `k_pengawas` int(11) NOT NULL,
  `k_pencacah` int(11) NOT NULL,
  `jenis_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `start`, `finish`, `k_pengawas`, `k_pencacah`, `jenis_kegiatan`) VALUES
(1, 'sensus1', 1609974000, 1610751600, 10, 1000, 2),
(2, 'sensus2', 1609455600, 1612047600, 11, 111, 2),
(3, 'sensus3', 1612998000, 1614380400, 123, 3333, 2),
(6, 'survei1', 1610578800, 1611961200, 102, 3, 1),
(7, 'survei2', 1611270000, 1611788400, 10, 100, 1),
(8, 'survei3', 1611961200, 1612047600, 12, 122, 1),
(9, 'survei4', 1609455600, 1614380400, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`) VALUES
(1, 'Kecepatan', 0.4),
(2, 'Ketepatan', 0.1),
(3, 'Kualitas', 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `ID_mitra` varchar(128) DEFAULT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `nama_panggilan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_hp` varchar(128) NOT NULL,
  `no_wa` varchar(128) NOT NULL,
  `no_tsel` varchar(128) NOT NULL,
  `pekerjaan_utama` varchar(128) DEFAULT NULL,
  `kompetensi` varchar(128) DEFAULT NULL,
  `bahasa` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `ID_mitra`, `nama_lengkap`, `nama_panggilan`, `email`, `alamat`, `no_hp`, `no_wa`, `no_tsel`, `pekerjaan_utama`, `kompetensi`, `bahasa`, `is_active`) VALUES
(14, '1001', 'mitra1', 'mitra1', 'mitra1@gmail.com', 'QASAQWQD', '1234', '1234', '1234', 'qwsqq', 'qSQD', 'Indonesia', 1),
(15, '1002', 'mitra2', 'mitra2', 'mitra2@gmail.com', 'QASAQWQD', '123456', '123456', '123456', 'Kuli', 'tidak ada', 'Jawa', 1),
(16, '1003', 'mitra3', 'iki mitra3', 'mitra3@gmail.com', 'sdff', '123456', '123456', '123456', 'jfnnff', 'kkdkf', 'Madura', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO',
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'pengawas1', 'pengawas1@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 4, 1, 1611110043),
(5, 'superadmin1', 'superadmin1@gmail.com', 'default1.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 1, 1, 1611115520),
(6, 'adminseksi1', 'adminseksi1@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 2, 1, 1611285346),
(10, 'seksi', 'seksi1@gmail.com', 'default.jpg', '$2y$10$n29GI32gleFClX42/UO/DuQERQ4/kLOP4Y2XVgt3RbaP97A6iqHPe', 3, 1, 1611285346),
(14, 'pengawas2', 'pengawas2@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 4, 1, 1611110043),
(21, 'mitra1', 'mitra1@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 1, 1613971427),
(22, 'mitra2', 'mitra2@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 1, 1613971457),
(23, 'mitra3', 'mitra3@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 1, 1613971484);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(11, 1, 6),
(12, 1, 7),
(14, 2, 2),
(16, 2, 4),
(17, 2, 5),
(19, 4, 3),
(20, 4, 4),
(21, 4, 5),
(23, 2, 1),
(24, 5, 4),
(27, 3, 3),
(28, 3, 4),
(29, 3, 5),
(31, 1, 2),
(33, 1, 4),
(34, 1, 5),
(35, 3, 1),
(36, 3, 2),
(37, 1, 1),
(38, 6, 1003),
(39, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Master'),
(2, 'Kegiatan'),
(3, 'Penilaian'),
(4, 'Hasil Penilaian'),
(5, 'History Penilaian'),
(6, 'Admin'),
(7, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin Seksi'),
(3, 'Seksi'),
(4, 'Pengawas'),
(5, 'Mitra');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 6, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(4, 7, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 7, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 6, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 1, 'Data Mitra', 'master/mitra', 'fas fa-fw fa-user', 1),
(13, 2, 'Survei', 'kegiatan/survei', 'fas fa-fw fa-book', 1),
(14, 3, 'Isi Penilaian', 'penilaian/isi', 'fas fa-fw fa-pencil-alt', 1),
(15, 4, 'Cetak Hasil Penilaian', 'penilaian/hasil', 'fas fa-fw fa-file-pdf', 1),
(16, 5, 'Arsip', 'penilaian/arsip', 'fas fa-fw fa-archive', 1),
(20, 2, 'Sensus', 'kegiatan/sensus', 'fas fa-fw fa-book', 1),
(23, 1, 'Data Kriteria', 'master/kriteria', 'fas fa-fw fa-key', 1),
(25, 6, 'All User', 'admin/alluser', 'fas fa-fw fa-user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'atama26.at@gmail.com', 'Wf/QlYQDgmwNMIQtErfc3lF1XFKujvoJAnZW2XCwzv4=', 1611301667),
(4, 'atama26.at@gmail.com', 'hK8Beenhxhcr5jo/MrzaJIwfb9BL64jKqUWx+NoOQGw=', 1611559633),
(5, 'atama26.at@gmail.com', 'I8+e39kbuYerN+zHUjyo4pmAbAm76iaBmwRHVANGWlw=', 1611559656),
(6, 'kucingbahintalo42@gmail.com', 'oG1tvjY5a0REX7erqH31QjEtldX9w5MsbOMG+gzv8JE=', 1611559743),
(7, 'atama26.at@gmail.com', 'L3kp2Wel+10VaSoDONyKrUpkjim0uho+q/hojrHwVDA=', 1611559861),
(8, 'superadmin1@gmail.com', 'ElsMnKqZ8QiG04QiGv3AX7jpM+obXwDTrC9iAU2Vrxg=', 1611650168);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_kegiatan`
--
ALTER TABLE `all_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_kegiatan_pengawas`
--
ALTER TABLE `all_kegiatan_pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_penilaian`
--
ALTER TABLE `all_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_mitra` (`ID_mitra`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_kegiatan`
--
ALTER TABLE `all_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `all_kegiatan_pengawas`
--
ALTER TABLE `all_kegiatan_pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `all_penilaian`
--
ALTER TABLE `all_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
