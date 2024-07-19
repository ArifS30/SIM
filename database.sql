-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 11:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsertifikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sertifikasi`
--

CREATE TABLE `jenis_sertifikasi` (
  `Kode` varchar(255) NOT NULL,
  `Sertifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_sertifikasi`
--

INSERT INTO `jenis_sertifikasi` (`Kode`, `Sertifikasi`) VALUES
('215', 'Pengajuan tertutup'),
('S001', 'Sertifikasi1'),
('S002', 'Sertifikasi2');

-- --------------------------------------------------------

--
-- Table structure for table `logtw`
--

CREATE TABLE `logtw` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `User` varchar(200) DEFAULT NULL,
  `IpAddress` varchar(200) DEFAULT NULL,
  `Information` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logtw`
--

INSERT INTO `logtw` (`id`, `Time`, `User`, `IpAddress`, `Information`) VALUES
(1, '2024-03-28 04:01:37', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'admin login sukses'),
(2, '2024-03-28 04:02:40', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update setting'),
(3, '2024-03-28 04:03:00', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update setting'),
(4, '2024-03-28 04:03:36', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into jenis_sertifikasi'),
(5, '2024-03-28 04:03:48', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into jenis_sertifikasi'),
(6, '2024-03-28 04:04:31', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update mahasiswa'),
(7, '2024-03-28 04:05:17', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into sertifikasi'),
(8, '2024-03-28 04:05:41', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into sertifikasi'),
(9, '2024-03-28 04:06:38', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'logout'),
(10, '2024-04-15 07:56:02', 'admin', '::1/Nikol', 'admin login sukses'),
(11, '2024-04-22 03:20:54', 'admin', '::1/Nikol', 'admin login sukses'),
(12, '2024-04-22 03:21:24', 'admin', '::1/Nikol', 'insert into jenis_sertifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Program_Studi` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Program_Studi`, `Foto`) VALUES
('001', 'Contoh 1', 'PS01', 'bacdffff56a88bd32991f5a7e4f72cc5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `Kode` varchar(255) NOT NULL,
  `Program_Studi` varchar(255) NOT NULL,
  `Kaprodi` varchar(255) NOT NULL,
  `NIDN_Kaprodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`Kode`, `Program_Studi`, `Kaprodi`, `NIDN_Kaprodi`) VALUES
('PS01', 'Teknik Informatika', 'Gunawan, S.T., M.Kom.', '0404027604'),
('PS02', 'Sistem Informasi', 'Abdul Manaf, Phd.', '002');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `id` int(11) NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `Kode` varchar(255) NOT NULL,
  `Tanggal_Daftar` date NOT NULL,
  `Tanggal_Ujian` decimal(10,0) NOT NULL,
  `Hasil_Ujian` varchar(255) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sertifikasi`
--

INSERT INTO `sertifikasi` (`id`, `NIM`, `Kode`, `Tanggal_Daftar`, `Tanggal_Ujian`, `Hasil_Ujian`, `Keterangan`) VALUES
(1, '001', 'S001', '2024-03-27', 2024, '-', '-\r\n'),
(2, '001', 'S002', '2024-03-27', 2024, '-', '-\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `ID` int(11) NOT NULL DEFAULT 0,
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Telepon` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`ID`, `Nama`, `Alamat`, `Telepon`, `Email`, `Logo`) VALUES
(1, 'SIM Sertifikasi', '<font face=\"Verdana\" size=\"1\" color=\"black\">Jl. PH.H. Mustofa No.68, Cikutra, Bandung</font>\r\n', '+62 22 7275489', 'info@usbypkp.ac.id', 'dbfde0605b856e4e6621b834511f7ca1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tw_hak_akses`
--

CREATE TABLE `tw_hak_akses` (
  `id` int(11) NOT NULL,
  `tabel` varchar(250) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `listData` char(1) DEFAULT NULL,
  `viewData` char(1) DEFAULT NULL,
  `insertData` char(1) DEFAULT NULL,
  `editData` char(1) DEFAULT NULL,
  `deleteData` char(1) DEFAULT NULL,
  `detailData` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tw_hak_akses`
--

INSERT INTO `tw_hak_akses` (`id`, `tabel`, `user`, `listData`, `viewData`, `insertData`, `editData`, `deleteData`, `detailData`) VALUES
(1, 'jenis_sertifikasi', 'admin', '1', '1', '1', '1', '1', '1'),
(2, 'logtw', 'admin', '1', '1', '1', '1', '1', '1'),
(3, 'mahasiswa', 'admin', '1', '1', '1', '1', '1', '1'),
(4, 'program_studi', 'admin', '1', '1', '1', '1', '1', '1'),
(5, 'sertifikasi', 'admin', '1', '1', '1', '1', '1', '1'),
(6, 'setting', 'admin', '1', '1', '1', '1', '1', '1'),
(7, 'user', 'admin', '1', '1', '1', '1', '1', '1'),
(8, 'mahasiswa/sertifikasi', 'admin', '1', '1', '1', '1', '1', '1'),
(9, 'program_studi/mahasiswa', 'admin', '1', '1', '1', '1', '1', '1'),
(10, 'Manage_User_Access', 'admin', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tw_tabel`
--

CREATE TABLE `tw_tabel` (
  `tabel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tw_tabel`
--

INSERT INTO `tw_tabel` (`tabel`) VALUES
('jenis_sertifikasi'),
('logtw'),
('mahasiswa'),
('mahasiswa/sertifikasi'),
('Manage_User_Access'),
('program_studi'),
('program_studi/mahasiswa'),
('sertifikasi'),
('setting'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(200) NOT NULL DEFAULT '',
  `Password` varchar(100) DEFAULT NULL,
  `Active` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `Active`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_sertifikasi`
--
ALTER TABLE `jenis_sertifikasi`
  ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `logtw`
--
ALTER TABLE `logtw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tw_hak_akses`
--
ALTER TABLE `tw_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tw_tabel`
--
ALTER TABLE `tw_tabel`
  ADD PRIMARY KEY (`tabel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logtw`
--
ALTER TABLE `logtw`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tw_hak_akses`
--
ALTER TABLE `tw_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
