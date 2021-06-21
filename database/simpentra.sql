-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 02:15 PM
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
-- Table structure for table `all_kegiatan_pencacah`
--

CREATE TABLE `all_kegiatan_pencacah` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `id_pengawas` varchar(18) NOT NULL DEFAULT '0',
  `id_mitra` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_kegiatan_pencacah`
--

INSERT INTO `all_kegiatan_pencacah` (`id`, `kegiatan_id`, `id_pengawas`, `id_mitra`) VALUES
(192, 55, '123456789101112134', 2147483649),
(193, 55, '2147483651', 2147483650);

-- --------------------------------------------------------

--
-- Table structure for table `all_kegiatan_pengawas`
--

CREATE TABLE `all_kegiatan_pengawas` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `id_pengawas` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_kegiatan_pengawas`
--

INSERT INTO `all_kegiatan_pengawas` (`id`, `kegiatan_id`, `id_pengawas`) VALUES
(83, 55, '123456789101112136'),
(87, 55, '2147483651');

-- --------------------------------------------------------

--
-- Table structure for table `all_penilaian`
--

CREATE TABLE `all_penilaian` (
  `id` int(11) NOT NULL,
  `all_kegiatan_pencacah_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` int(1) NOT NULL,
  `t_bobot` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_penilaian`
--

INSERT INTO `all_penilaian` (`id`, `all_kegiatan_pencacah_id`, `kriteria_id`, `nilai`, `t_bobot`) VALUES
(401, 192, 1, 3, 0.14289682539683),
(402, 192, 2, 5, 0.19289682539683),
(403, 192, 3, 4, 0),
(404, 192, 4, 5, 0.084563492063492),
(405, 192, 5, 3, 0),
(406, 192, 6, 4, 0),
(407, 192, 7, 3, 0),
(408, 192, 8, 4, 0),
(409, 192, 9, 5, 0.021111111111111),
(410, 192, 10, 5, 0.033611111111111),
(411, 193, 1, 2, 0),
(412, 193, 2, 4, 0),
(413, 193, 3, 5, 0.10956349206349),
(414, 193, 4, 3, 0),
(415, 193, 5, 4, 0.064563492063492),
(416, 193, 6, 5, 0.047896825396825),
(417, 193, 7, 5, 0.29289682539683),
(418, 193, 8, 5, 0.01),
(419, 193, 9, 3, 0),
(420, 193, 10, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `start` varchar(32) NOT NULL,
  `finish` varchar(32) NOT NULL,
  `k_pengawas` int(11) NOT NULL,
  `k_pencacah` int(11) NOT NULL,
  `jenis_kegiatan` int(1) NOT NULL,
  `seksi_id` int(1) NOT NULL DEFAULT 0,
  `ob` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `start`, `finish`, `k_pengawas`, `k_pencacah`, `jenis_kegiatan`, `seksi_id`, `ob`) VALUES
(55, 'Survei1', '1624053600', '1624572000', 2, 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `prioritas` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `prioritas`, `nama`, `bobot`) VALUES
(1, 3, 'Kualitas Isian', 0.14289682539683),
(2, 2, 'Kuantitas', 0.19289682539683),
(3, 4, 'Ketepatan Waktu', 0.10956349206349),
(4, 5, 'Kepatuhan SOP', 0.084563492063492),
(5, 6, 'Penguasaan Kondef', 0.064563492063492),
(6, 7, 'Kerapian Tulisan', 0.047896825396825),
(7, 1, 'Kejujuran', 0.29289682539683),
(8, 10, 'Inisiatif Kerja', 0.01),
(9, 9, 'Loyalitas', 0.021111111111111),
(10, 8, 'Perilaku', 0.033611111111111);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` bigint(20) NOT NULL,
  `nama_lengkap` varchar(32) NOT NULL,
  `nama_panggilan` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `no_tsel` varchar(13) NOT NULL,
  `pekerjaan_utama` varchar(32) NOT NULL,
  `kompetensi` varchar(32) NOT NULL,
  `bahasa` varchar(32) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_lengkap`, `nama_panggilan`, `email`, `alamat`, `no_hp`, `no_wa`, `no_tsel`, `pekerjaan_utama`, `kompetensi`, `bahasa`, `is_active`) VALUES
(2147483649, 'Abdul Hadi', 'Abdul Hadi', 'Abdulhadiprudent@gmail.com', 'Jl Tidar  RT 001 RW 012 Link. Karang Baru Karangrejo Sumbersari', '', '085815085444', '081235098908', 'Agen asuransi', 'Bahasa Indonesia, Bahasa Madura', 'Cervic amplifier audio', 1),
(2147483650, 'Ipung Purwanto', 'Ipung', 'ipunggooo777@gmail.com', ' Rt 002 rw 001 Pucuan Sidomulyo Semboro', '', '085204974862', '085204974862', 'Pedagang Padi', 'Bahasa Indonesia, Bahasa Madura,', '-', 1),
(2147483651, 'ZAINUL MU\'IZ', 'Mu\'iz', 'zainmuiz13@gmail.com', ' RT.002 RW.019 Sumberejo Umbulsari Umbulsari', '', '082333817353', '082333817353', 'Guru swasta', 'Bahasa Indonesia, Bahasa Madura,', 'Olahraga', 1),
(2147483652, 'Yusmianto', 'Yusmianto', 'yusmiantooke24091980@gmail.com', ' RT 001 RW 012 Dusun Banjarejo Tengah Sumberagung Sumberbaru', '', '085807153534', '082143674754', 'Wiraswasta', 'Bahasa Indonesia', '-', 1),
(2147483653, 'MOH SOELEH HUDIN', 'SOELEHUDIN', 'shudin584@gmail.com', 'Jl. Pahlawan KlayuMayang RT 001 RW 012 Klayu MAYANG MAYANG', '', '081358511214', '081358511214', 'Petani', 'Bahasa Indonesia', '\"Tidak Ada\"', 1),
(2147483654, 'Rudihartono', 'Rudi', 'baratanton354@gmail.com', 'Jln Arjuna no 7 RT 002 RW 011 DSN KRAJAN Kencong Kencong', '', '082330429633', '082330429633', 'Warung nasgor', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483655, 'Andi eko wahyudi', 'Andi', 'andiekowy@gmail.com', 'Dusun krajan Rt 006 rw 003  Krajan Sidodadi Tempurejo', '', '082234360985', '082234360985', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483656, 'Prayugo purwantoro', 'Prayugo', 'prayugopurwantoro@gmail.com', 'Dusun pasar sumberjambe RT 001 RW 005 Dusun pasar Sumberjambe Sumberjambe', '', '085204874794', '085204874794', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Madura', 'Tidak ada', 1),
(2147483657, 'NURUL HAMZAH HABIBI HALIK', 'NURUL ', 'nurulhamzah44@gmail.com', 'Jl.PP Nurul Ali RT 003 RW 013 Dusun Sumberbulus 2 SUMBERBULUS LEDOKOMBO', '', '081334214170', '081334214170', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Madura', '-', 1),
(2147483658, 'Murtadho', 'Tado', 'murtadho167@gmail.com', ' RT 001 RW 010 Dusun Sumbergebang Langkap Bangsalsari', '', '081216254043', '081216254043', 'Operator Desa', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483659, 'IMAM SUJASWANTO', 'JASWAN', 'imamsujaswanto@gmail.com', 'Jl. Umbulsari RT 004 RW 002 Dusun Krajan I Karangduren Balung', '', '085210472411', '085210472411', 'Guru Kelas SD', 'Bahasa Indonesia, Bahasa Madura,', 'Teknik administrasi, pengolahan ', 1),
(2147483660, 'Abdul Aziz', 'Aziz', 'abdulaziz18081982@gmail.com', 'Jl.Suprayitno Rt 002 Rw 002 Tegalbago Arjasa Arjasa', '', '082132250845', '082132250845', 'Petani padi', 'Bahasa Indonesia, Bahasa Madura', 'Tidak ada', 1),
(2147483661, 'SIGIT TRI NUGROHO', 'SIGIT', 'sigit.uzumaki@gmail.com', 'JL. KH. ABDURRACHMAN NO. 108 RT 003 / RW 004 KRAJAN TEMPUREJO TEMPUREJO', '', '082245282699', '082245282699', 'PETANI & JASA REPARASI PC / LAPT', 'Bahasa Indonesia, Bahasa Madura,', 'AHLI SERVICE PC / LAPTOP (HARDWA', 1),
(2147483662, 'Leni Fitriah', 'Leni', 'Lennyceniz@gmail.com', 'Jl. Khi Hajar Dewan Toro RT 004 RW 007 Jatian Sumber Pinang Pakusari', '', '082333256600', '082333256600', 'Tidak ada', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483663, 'Aris Kurniawan', 'Aris', 'azkapropolis@gmail.com', ' RT.011/RW.003 Krajan 1 Glagahwero Kalisat', '', '082337926156', '082337926156', 'Jasa Bekam', 'Bahasa Indonesia, Bahasa Madura,', 'Ahli Terapi Bekam', 1),
(2147483664, 'EKA AGUSTIN D T', 'EKA', 'ekaagustin150885@gmail.com', 'Tidak ada RT 004 RW 001 Paci Gelang Sumberbaru', '', '082257584300', '082257584300', 'BPD', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483665, 'Nurhayati', 'Nur', 'nh031078@gmail.com', ' RT 003 RW 003 JATISONGO TEGALWANGI Umbulsari', '', '081234827787', '081234827787', 'Tidak ada', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483666, 'Anang Sugiyono SM', 'Anang', 'anangibrahimovic@gmail.com', 'Jalan Kamboja No.59  RT 001 RW 004 Tanggul Kulon Dusun Krajan Tanggul Kulon Tanggul', '', '085204216693', '085204216693', 'Jasa Pengiriman paket PT.HERONA ', 'Bahasa Indonesia, Bahasa Madura,', '-', 1),
(2147483667, 'Akip purwatiningsih', 'Akip', 'akippurwatiningsih1206@gmail.com', 'Jl Slamet Riyadi RT 03 RW 09 Pakem Wringintelu Puger', '', '082335351776', '082335351776', 'Mengurus rumah tangga', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483668, 'Akip purwatiningsih', 'Akip', 'akippurwatiningsih1206@gmail.com', 'Jl Slamet Riyadi RT 03 RW 09 Pakem Wringintelu Puger', '', '082335351776', '082335351776', 'Mengurus rumah tangga', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483669, 'Ika. Setiyaningsih', 'Ika', 'ika.setiyaningsih89@gmail.com', 'Jln ngatmorejo  RT 002 RW 012  Mandaran Puger wetan Puger', '', '085258832841', '085258832841', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483670, 'Imron fauzi', 'Fauzi', 'fauzigilang3277@gmail.com', 'Jln.cendrawasih no.28 Rt 003 Rw 008 Dusun karanganyar Desa Karangrejo Gumukmas', '', '082234176481', '082234176481', 'Tidak ada', 'Bahasa Indonesia, Bahasa Madura,', 'Pembuat layang sowangan', 1),
(2147483671, 'Dinie Prathivi Maharani', 'Dinie', 'rivanie13@gmail.com', 'Jl.Banyuwangi Gg. Timur Kecamatan No. 32 Desa Sumberjati Kec. Silo Kab. Jember RT 001 RW 008 Krajan Sumberjati Silo', '', '085608437040', '082334861761', 'Ibu Rumah Tangga', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483672, 'Nur Holis', 'Nur', 'yuliantin1708@gmail.com', ' Rt 051 Rw 13  Dusun utara Pontang Ambulu', '', '082336982518', '082336982518', 'Petani', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483673, 'Ronny Irawadi', 'Ronny', 'transiqma@gmail.com', 'Jl. Banyuwangi Gg Kecamatan Silo No. 32 RT 001 RW 008 Krajan Sumberjati Silo', '', '081234781717', '081234781717', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Madura,', 'Menguasai komputer', 1),
(2147483674, 'Juria Ekasari', 'Juria', 'juriaeka33@gmail.com', 'Jl Arwana GG Pande Besi No 25 RT 002 RW 006 Lingkungan Gebang Waru Kebonagung Kaliwates', '', '085232180050', '085232180050', 'Tidak ada', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483675, 'Koyyumah', 'Koyyum', 'koyyumahferisa@gmail.com', 'Jln.letjen sutoyo  RT 003 RW 034 Linkungan kebon indah Tegal besar Kaliwates', '', '089655211867', '081331298515', 'Tidak ada', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483676, 'ISA BELLA FIRDAUS ANDINIWATI', 'Bella', 'bellaahza@gmail.com', 'Jln.diponegoro RT 001 RW 008 Dusun Krajan tengah Balung kulon Balung', '', '085231092756', '085231092756', 'Guru SD', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483677, 'Moh. Lukmannul Hakim', 'Lukman', 'lukmanarleng94@gmail.com', ' RT 001 RW 027 Lengkong Wonosari Puger', '', '082332046657', '082332046657', 'Petani', 'Bahasa Jawa', 'Bercocok Tanam', 1),
(2147483678, 'Muhamad sunaryo', 'Naryo', 'syahrulsyahrullah092@gmail.com', 'Jln Raja Wali No.60 RT 001 RW 001 Krajan Kemuningsarilor Panti', '', '085103626259', '085103626259', 'Petani padi', 'Bahasa Indonesia, Bahasa Madura', 'Tidak ada', 1),
(2147483679, 'Putri Anggun Puspita', 'Anggun', 'wiwikimroani@gmail.com', ' RT 003 RW 013 KRAJAN KIDUL SUMBEREJO AMBULU', '', '082234645073', '082234645073', 'Menjaga toko milik sendiri', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483680, 'Arik Juhairiyah', 'Arik', 'arik.incess82@gmail.com', ' RT 003 RW 003 Krajan Timur Sukowono Sukowono', '', '085232655493', '085232655493', 'Tidak ada', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483681, 'Mamik setyowati', 'Mamik', 'mamiksetyowati5@gmail.com', ' Rt 001 rw 008  Tamanrejo Tamansari Wuluhan', '', '082301655880', '082301655880', 'Tdk ada', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483682, 'Sayono', 'Yono', 'sayonouye83@gmail.com', 'Jl.merapi  Rt.001 rw 008 Krajan Kalisat Kalisat', '', '085258802726', '085258802726', 'Dagang alat alat tulis', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak', 1),
(2147483683, 'SYAIFULLOH', 'SYAIFUL', 'ayahcakep110106@gmail.com', ' RT 002 RW 005 Dusun : Gumuk Bago Desa : Nogosari Kecamatan : Rambipuji', '', '082302097438', '082302097438', 'Jualan Mie Ayam', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483684, 'MUJI SHOLEH', 'MUJI', 'farzidjbr@gmail.com', ' RT 023 RW 004 DUSUN GUMUK SARI NOGOSARI RAMBIPUJI', '', '081231836493', '081231836493', 'Petani padi', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483685, 'Moh homson', 'Homson', 'muhammadhomson5612@gmail.com', ' RT 002 RW 028 Dusun Dukuh Dukuhdempok Wuluhan', '', '085230847508', '085230847508', 'Guru swasta', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483686, 'Samsul gufron', 'Samsul', 'ludrugasik999@gmail.com', 'Jl.kartini 36 Rt 002 rw001 Krajan barat Jelbuk Jelbuk', '', '085204934863', '085204934863', 'Petani', 'Bahasa Indonesia, Bahasa Madura', 'Tidak ada', 1),
(2147483687, 'MUJI SHOLEH', 'MUJI', 'farzidjbr@gmail.com', ' RT 023 RW 004 GUMUKSARI NOGOSARI RAMBIPUJI', '', '081231836493', '081231836493', 'Petani padi', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483688, 'Susyanto', 'Sus', 'susyantohabibi@gmail.com', ' Rt 001 rw 014 Dusun mujan Klungkung Sukorambi', '', '081230197966', '081230197966', 'PSM,LPM', 'Bahasa Indonesia, Bahasa Madura,', 'Ahli bangunan', 1),
(2147483689, 'Anisa Amalia', 'Anis', 'kioswahyu18@gmail.com', ' RT 001 RW 011 Dusun Jatilawang Tegalwangi Umbulsari', '', '085236317908', '085236317908', 'Pedagang', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483690, 'SRI YANTI NINGSIH', 'YANTI', 'sriyantiningsih0812@gmail.com', 'Jl. Mangun Sarkoro 26B RT 003 RW 018 KRAJAN Desa : RAMBIPUJI RAMBIPUJI', '', '082233190939', '082233190939', 'Tidak ada', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483691, 'Zainuri arifin', 'Zainuri', 'pak.zenbps@gmail.com', 'Jln pantai paseban RT 001 RW 007 Balekambang Paseban Kencong', '', '082232232542', '082232232542', 'Petani', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483692, 'Susyanto', 'Sus', 'susyantohabibi@gmail.com', ' Rt 001 Rw 014 Dusun Mujan Klungkung Sukorambi', '', '081230197966', '081230197966', 'PSM , LPM', 'Bahasa Indonesia, Bahasa Madura,', 'Ahli bangunan', 1),
(2147483693, 'MOCH SHOBRI', 'Sobri', 'aliSobri78@gmail.com', 'Jln gayasari  RT O1 RW 05 GAYASAN A JENGGAWAH JENGGAWAH', '', '081230344364', '081230344364', 'Wiraswasta', 'Bahasa Indonesia', 'Ahli dalam elektronik', 1),
(2147483694, 'ABDUL JALIEL', 'JALIL', 'abdjaliel9@gmail.com', ' RT 003 RW 003 TEGALAN LANGKAP BANGSALSARI', '', '082301528845', '082301528845', 'PEKERJA HARIAN LEPAS', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483695, 'Junaedi', 'Jun', 'junpuji60@gmail.com', 'Jl.RA.Kartini no 11 RT 001 Dusun Krajan Desa Ambulu Kecamatan Ambulu RT 001 RW 005 Krajan Ambulu Ambulu', '', '085746382765', '082140227890', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483696, 'Dian yudianti', 'Dian', 'dianyudianto99@gmail.com', ' Rt 003 Rw 019 Dusun jatiagung Gumukmas Gumukmas', '', '082337340055', '082337340055', 'Bengkel', 'Bahasa Indonesia, Bahasa Jawa', 'las body ', 1),
(2147483697, 'Ahmad Hardiansyah', 'Dian', 'tehpucuk1308@gmail.com', ' RT 002 RW 006 Maduran Tutul Balung', '', '082257844724', '082257844724', 'Pedagang', 'Bahasa Indonesia, Bahasa Madura,', 'Pengrajin tasbih', 1),
(2147483698, 'Lestari Budi Hartono', 'Arib', 'khalfaniraygans418@gmail.com', 'Jln stasiun No.17 RT 003 RW 003 Krajan Sumberlesung Ledokombo', '', '085259183962', '085259183962', 'Petani', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483699, 'Agus risdianto', 'Gusris', 'agusrisdianto71@gmail.com', 'Jln. Diponegoro VI/no.1 jember RT 001 RW 017 Kampung tengah Kepatihan Kaliwates', '', '085704984532', '082257089578', 'Tidak ada', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483700, 'MUHYIT ARDIYANTO', 'MUHYIT', 'muhyitardiyanto@gmail.com', 'JLN PAHLAWAN BURA RT 002 RW 001 PRASIAN JATIAN PAKUSARI', '', '081230349321', '081230349321', 'PETANI PADI', 'Bahasa Indonesia, Bahasa Madura', '_', 1),
(2147483701, 'Nunik Tri Sulistyowati', 'Nunik', 'nunikts89@gmail.com', ' RT 002 RW 011 Dusun Krajan III Keting Jombang', '', '082337344482', '082337344482', '-', 'Bahasa Indonesia, Lainnya', '-', 1),
(2147483702, 'Sanijo', 'Jo', 'sanijo030371@gmail.com', ' rt 002 rw 006 Karang sirih Suco mumbulsari', '', '085331467796', '085331467796', 'Wiraswasta', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483703, 'MAT ALWI', 'ALWI', 'alwi04051971@gmail.com', 'Jl. Mr Wahid RT 002 RW 010 Besuk WIROWONGSO AJUNG', '', '085236548088', '085236548088', 'JASA TAMBAL BAN', 'Bahasa Indonesia, Bahasa Madura,', 'Ukir ban', 1),
(2147483704, 'M RIKWANTO', 'Rikwan', 'rikwanto1206@gmail.com', 'dusun Krajan rt 004 rw 002 RT 004 RW 002 krajan glundengan wuluhan', '', '081358830627', '081358830627', 'karyawan honorer', 'Bahasa Indonesia, Bahasa Jawa', 'tidak ada', 1),
(2147483705, 'Marta Kristanto Hadi putro', 'Marta', 'martahadiputro@gmail.com', ' RT 002 RW 020 dusun manggungan Karangbayat Sumberbaru', '', '081357293811', '081357293811', 'Tidak ada', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483706, 'Eka Andry Dewa Wiyana', 'Andry', 'ekaandrydewa@gmail.com', 'Jln semangka no 1 baratan patrang RT 004 RW 004 Glisat Baratan Patrang', '', '081336583313', '081336583313', 'Wirausaha', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483707, 'Ach. Fawaid', 'Fawaid', 'blacksniper7677@gmail.com', ' RT 002 RW 002 Dusun Taman Burnih Pringgondani Sumberjambe', '', '082331004559', '082331004559', 'Tidak ada', 'Bahasa Indonesia, Bahasa Inggris', 'Mengoperasikan notebook ', 1),
(2147483708, 'NGATINI', 'TITIN', 'ngatini.utwuluhan@gmail.com', ' RT 001 RW 019 Gedangan Pugerkulon Puger', '', '082232830012', '082232830012', 'Guru', 'Bahasa Indonesia', 'Ahli merias pengantin', 1),
(2147483709, 'AGUS MUHAMMAD HADI', 'HADI', 'agusmhadi15@gmail.com', 'JL RASAMALA 2 NO 11 RT 01 RW 06  KRAJAN BARATAN PATRANG', '', '082331120525', '082331120525', 'SELES FREELAND', 'Bahasa Jawa', 'INSTALATIR LISTRIK', 1),
(2147483710, 'GUNTORO', 'GUN', 'sinyoguntoro@gmail.com', ' RT 001 RW022 Dusun Jatiagung GUMUKMAS GUMUKMAS', '', '082335347100', '082335347100', 'Petani padi dan jagung', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483711, 'KUSNUL KHOTIMAH', 'KUSNUL', 'kkusnuk241@gmail.com', ' RT 002 RW 016 DUSUN KRAJAN 2 KASIYAN TIMUR PUGER', '', '085258488431', '085258488431', 'Guru', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483712, 'Yuni Nur Samiati', 'Yuni', 'yuni37674@gmail.com', 'Jl.Kh.Akmad Dahlan RT O01 RW 009 Dusun Glagasan Petung Bangsalsari', '', '085334477006', '085334477006', 'Tidak ada', 'Bahasa Jawa', 'Tidak ada', 1),
(2147483713, 'MUZAMMIL', 'Jamil', 'zammil1171@gmail.com', ' RT 001 RW 005 DUSUN GAYASAN A JENGGAWAH JENGGAWAH', '', '085336382910', '085336382910', 'SERVIS DINAMO', 'Bahasa Indonesia, Bahasa Madura,', 'Ahli memperbaiki dinamo', 1),
(2147483714, 'Hermanto', 'Hermanto', 'hadiehermansyah@gmail.com', 'Jl. Tidar RT 001 RW 014 Lingkungan Pelindu Kelurahan Karangrejo Kecamatan Sumbersari', '', '081232394729', '081232394729', 'Petani', 'Bahasa Indonesia, Bahasa Madura,', 'Tidak ada', 1),
(2147483715, 'Strisno', 'Tris', 'sutrisnotresno16@gmail.com', 'Nogosari RT 16 RW 21 Gumuk gebang Nogosari Rambipuji', '', '085230474261', '085230474261', 'Tukang listrik', 'Bahasa Indonesia, Bahasa Madura,', 'Instalasi listrik', 1),
(2147483716, 'BUDI UTOMO', 'Budi', 'budyfafis@gmail.com', ' RT 002 RW 012 KEDUNGLANGKAP KRATON KENCONG', '', '082141052102', '082141052102', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Jawa', 'Tidak ada', 1),
(2147483717, 'Sri Hartatik', 'Sri', 'srimanis101189@gmail.com', ' RT 004 RW 006 Krajan Mumbulsari Mumbulsari', '', '082323579647', '082323579647', 'Pedagang', 'Bahasa Indonesia, Bahasa Madura', 'Tidak ada', 1),
(2147483718, 'Sri Hartatik', 'Sri', 'srimanis101189@gmail.com', ' RT 004 RW 006 Krajan Mumbulsari Mumbulsari', '', '082323579647', '082323579647', 'Pedagang', 'Bahasa Indonesia, Bahasa Madura', 'Tidak ada', 1),
(2147483719, 'MUZAMMIL', 'Jamil', 'zammil1171@gmail.com', ' RT 001 RW 005 DUSUN GAYASAN A JENGGAWAH JENGGAWAH', '', '085336382910', '085336382910', 'SERVIS DINAMO', 'Bahasa Indonesia, Bahasa Madura,', 'Ahli memperbaiki dinamo', 1),
(2147483720, 'Sanijo', 'Jo', 'sanijo030371@gmail.com', ' rt 002 rw 006 Karang sirih Suco Mumbulsari', '', '085331467796', '085331467796', 'Wiraswasta', 'Bahasa Indonesia', 'Tidak ada', 1),
(2147483721, 'Putri Anggun Puspita', 'Anggun', 'wiwikimroani@gmail.com', ' RT 003 RW 013 Krajan Kidul Sumberejo Ambulu', '', '082234645073', '082234645073', 'Penjaga toko', 'Bahasa Indonesia', 'Tidak Ada', 1),
(2147483722, 'Junaedi', 'P doni', 'bapakjunaidi825@gmail.com', 'Dusun Krajan timur,desa sucopangepok RT 003 RW 015 Krajan timur Sucopangepok Jelbuk', '', '085257007523', '085257007523', 'Wiraswasta', 'Bahasa Indonesia, Bahasa Madura', 'Biro jasa kependudukan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` char(18) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `jabatan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `email`, `jabatan`) VALUES
('123456789101112134', 'Tama', 'sny998@yahoo.com', 'Staf Fungsi Produksi'),
('123456789101112136', 'Sonny', 'sny171@yahoo.com', 'Staf Fungsi Distribusi');

-- --------------------------------------------------------

--
-- Table structure for table `seksi`
--

CREATE TABLE `seksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL
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
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `prioritas` int(11) NOT NULL,
  `nilai` int(1) NOT NULL,
  `deskripsi` varchar(32) NOT NULL,
  `bobot` double NOT NULL,
  `konversi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`prioritas`, `nilai`, `deskripsi`, `bobot`, `konversi`) VALUES
(5, 1, 'Kurang baik', 0.04, 50),
(4, 2, 'Cukup baik', 0.09, 60),
(3, 3, 'Baik', 0.15666666666667, 70),
(2, 4, 'Sangat baik', 0.25666666666667, 80),
(1, 5, 'Sangat baik sekali', 0.45666666666667, 90);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `image` varchar(32) NOT NULL DEFAULT 'default.jpg',
  `password` varchar(128) NOT NULL DEFAULT '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO',
  `role_id` int(1) NOT NULL,
  `seksi_id` int(1) NOT NULL DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `date_created` int(11) NOT NULL,
  `token` varchar(128) DEFAULT NULL,
  `date_created_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `image`, `password`, `role_id`, `seksi_id`, `is_active`, `date_created`, `token`, `date_created_token`) VALUES
(45, 'superadmin@gmail.com', 'logo_msa1.png', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 1, 0, 1, 1621989189, NULL, NULL),
(49, 'sny171@yahoo.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 3, 1, 1, 1623314315, NULL, NULL),
(61, 'sny171@yahoo.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 4, 0, 1, 1623851136, NULL, NULL),
(62, 'Abdulhadiprudent@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 0, 1, 1623928692, NULL, NULL),
(63, 'ipunggooo777@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 5, 0, 1, 1623928767, NULL, NULL),
(64, 'zainmuiz13@gmail.com', 'default.jpg', '$2y$10$LbxrTcSA4dSZlSnoPWUUoeb7b6xBZD.tE/fsBxydlgn.q6aqV18nO', 4, 0, 1, 1623928949, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
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
(45, 2, 8),
(46, 3, 8),
(48, 1, 1),
(51, 1, 7),
(52, 2, 4),
(53, 2, 5),
(54, 3, 4),
(55, 3, 5),
(57, 1, 18),
(63, 2, 19),
(64, 3, 19),
(65, 4, 19),
(66, 5, 19),
(68, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(32) NOT NULL
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
(8, 'Ranking'),
(19, 'Timeline');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
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
  `title` varchar(32) NOT NULL,
  `url` varchar(64) NOT NULL,
  `icon` varchar(32) NOT NULL,
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
(27, 8, 'Ranking Mitra', 'ranking/pilih_kegiatan_nilai_akhir', 'fas fa-fw fa-graduation-cap', 1),
(28, 8, 'Data Kriteria', 'ranking/kriteria', 'fas fa-fw fa-key', 1),
(29, 8, 'Penghitungan', 'ranking/pilih_kegiatan', 'fas fa-fw fa-pen', 1),
(32, 19, 'Jadwal', 'timeline/index', 'fas fa-fw fa-calendar-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_kegiatan_pencacah`
--
ALTER TABLE `all_kegiatan_pencacah`
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
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`nilai`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_kegiatan_pencacah`
--
ALTER TABLE `all_kegiatan_pencacah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `all_kegiatan_pengawas`
--
ALTER TABLE `all_kegiatan_pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `all_penilaian`
--
ALTER TABLE `all_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483723;

--
-- AUTO_INCREMENT for table `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
