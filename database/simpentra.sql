-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 06:27 PM
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
  `id_mitra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_kegiatan`
--

INSERT INTO `all_kegiatan` (`id`, `kegiatan_id`, `id_mitra`) VALUES
(60, 23, 1002),
(62, 23, 1004),
(63, 23, 1003),
(65, 26, 1005),
(66, 26, 1004),
(67, 26, 1003);

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
(24, 23, 3),
(26, 24, 3),
(28, 26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `all_penilaian`
--

CREATE TABLE `all_penilaian` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_penilaian`
--

INSERT INTO `all_penilaian` (`id`, `kegiatan_id`, `id_mitra`, `kriteria_id`, `nilai`) VALUES
(130, 23, 1002, 8, 5),
(131, 23, 1002, 7, 4),
(132, 26, 1004, 8, 5),
(133, 26, 1004, 7, 4),
(134, 26, 1003, 1, 3),
(135, 23, 1003, 1, 3),
(136, 23, 1003, 3, 5),
(137, 23, 1003, 2, 3),
(138, 23, 1002, 1, 4),
(139, 23, 1002, 2, 5),
(140, 23, 1002, 3, 4),
(141, 23, 1002, 4, 5),
(142, 23, 1002, 5, 4),
(143, 23, 1002, 6, 3),
(144, 23, 1002, 9, 3),
(145, 23, 1002, 10, 4);

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
  `jenis_kegiatan` int(11) NOT NULL,
  `seksi_id` int(1) NOT NULL DEFAULT 0,
  `ob` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `start`, `finish`, `k_pengawas`, `k_pencacah`, `jenis_kegiatan`, `seksi_id`, `ob`) VALUES
(23, 'Survei1', 1617141600, 1619733600, 2, 4, 1, 0, 1),
(26, 'Survei2', 1619733600, 1620338400, 2, 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bobot` int(3) NOT NULL,
  `type` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `type`) VALUES
(1, 'Kualitas Isian', 80, 'max'),
(2, 'Kuantitas', 80, 'max'),
(3, 'Ketepatan Waktu', 80, 'max'),
(4, 'Kepatuhan SOP', 75, 'max'),
(5, 'Penguasaan Kondef', 75, 'max'),
(6, 'Kerapian Tulisan', 70, 'max'),
(7, 'Kejujuran', 60, 'max'),
(8, 'Inisiatif Kerja', 60, 'max'),
(9, 'Loyalitas', 60, 'max'),
(10, 'Perilaku', 60, 'max');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` varchar(120) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `nama_panggilan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `no_wa` varchar(128) NOT NULL,
  `no_tsel` varchar(128) NOT NULL,
  `pekerjaan_utama` varchar(128) NOT NULL,
  `kompetensi` varchar(128) NOT NULL,
  `bahasa` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_lengkap`, `nama_panggilan`, `email`, `alamat`, `no_hp`, `no_wa`, `no_tsel`, `pekerjaan_utama`, `kompetensi`, `bahasa`, `is_active`) VALUES
('1001', 'mitra1', 'mitra1', 'mitra1@gmail.com', 'wlejj', '1234', '1234', '1234', 'qwsqq', 'qSQD', 'Indonesia', 1),
('1002', 'mitra2', 'mitra2', 'mitra2@gmail.com', 'kjeekj', '123456', '123456', '1234567', 'Kuli', 'tidak ada', 'Jawa', 0),
('1003', 'mitra3', 'mtr3', 'mitra3@gmail.com', 'kner', '123456', '123456', '123456', 'jfnnff', 'kkdkf', 'Indonesia', 1),
('1004', 'mitra4', 'mitr4', 'mitra4@gmail.com', 'sdff', '1234', '1234', '1234', 'kdlmlmf', 'fwjhfkw', 'Madura', 1),
('1005', 'mitra5', 'mitra5', 'mitra5@gmail.com', 'asdsd', '12345', '12345', '123456', 'kdlmlmf', 'dfef', 'Indonesia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `email`, `jabatan`) VALUES
('123421', 'Sonny', 'sny171@yahoo.com', 'Seksi Statistik Produksi'),
('123459', 'Aditama', 'sny998@yahoo.com', 'Seksi Statistik Distribusi');

-- --------------------------------------------------------

--
-- Table structure for table `seksi`
--

CREATE TABLE `seksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seksi`
--

INSERT INTO `seksi` (`id`, `nama`) VALUES
(1, 'Produksi'),
(2, 'Sosial'),
(3, 'Distribusi'),
(4, 'Nerwilis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO',
  `role_id` int(1) NOT NULL,
  `seksi_id` int(11) NOT NULL DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `seksi_id`, `is_active`, `date_created`) VALUES
(3, 'pegawai1', 'pegawai1@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 4, 0, 1, 1611110043),
(5, 'superadmin', 'superadmin@gmail.com', 'default1.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 1, 0, 1, 1611115520),
(6, 'admin produksi', 'admin_produksi@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 2, 1, 1, 1611285346),
(10, 'operator produksi', 'operator_produksi@gmail.com', 'default.jpg', '$2y$10$n29GI32gleFClX42/UO/DuQERQ4/kLOP4Y2XVgt3RbaP97A6iqHPe', 3, 1, 1, 1611285346),
(21, 'mitra1', 'mitra1@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 0, 1, 1613971427),
(22, 'mitra2', 'mitra2@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 0, 1, 1613971457),
(23, 'mitra3', 'mitra3@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 0, 1, 1613971484),
(24, 'seksi2', 'seksi2@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 3, 0, 1, 1614237370),
(26, 'operator sosial', 'operator_sosial@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 3, 2, 1, 1616562229),
(27, 'operator distribusi', 'operator_distribusi@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 3, 3, 1, 1616562286),
(28, 'operator nerwilis', 'operator_nerwilis@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 3, 4, 1, 1616562325),
(29, 'admin sosial', 'admin_sosial@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 2, 2, 1, 1616562428),
(30, 'admin distribusi', 'admin_distribusi@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 2, 3, 1, 1616562463),
(31, 'admin nerwilis', 'admin_nerwilis@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 2, 4, 1, 1616562492),
(32, 'mitra4', 'mitra4@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 0, 1, 1617443495),
(33, 'mitra5', 'mitra5@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 0, 1, 1617445262);

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
(14, 2, 2),
(19, 4, 3),
(20, 4, 4),
(23, 2, 1),
(24, 5, 4),
(36, 3, 2),
(38, 6, 1003),
(45, 2, 8),
(46, 3, 8),
(47, 1, 2),
(48, 1, 1),
(49, 1, 4),
(50, 1, 5),
(51, 1, 7),
(52, 2, 4),
(53, 2, 5),
(54, 3, 4),
(55, 3, 5),
(56, 1, 8);

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
(7, 'Menu'),
(8, 'Ranking');

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
(3, 'Operator Seksi'),
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
(14, 3, 'Isi Penilaian', 'penilaian', 'fas fa-fw fa-pencil-alt', 1),
(15, 4, 'Cetak Hasil Penilaian', 'penilaian/pilihkegiatan', 'fas fa-fw fa-file-pdf', 1),
(16, 5, 'Arsip', 'penilaian/arsip', 'fas fa-fw fa-archive', 1),
(20, 2, 'Sensus', 'kegiatan/sensus', 'fas fa-fw fa-book', 1),
(25, 6, 'All User', 'admin/alluser', 'fas fa-fw fa-user', 1),
(26, 1, 'Data Pegawai', 'master/pegawai', 'fas fa-fw fa-user-tie', 1),
(27, 8, 'Ranking mitra', 'ranking', 'fas fa-fw fa-graduation-cap', 1),
(28, 8, 'Data Kriteria', 'ranking/kriteria', 'fas fa-fw fa-key', 1),
(29, 8, 'Penghitungan', 'ranking/pilih_kegiatan', 'fas fa-fw fa-pen', 1);

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
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `all_kegiatan_pengawas`
--
ALTER TABLE `all_kegiatan_pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `all_penilaian`
--
ALTER TABLE `all_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
