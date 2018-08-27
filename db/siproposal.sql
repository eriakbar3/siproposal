-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 11:16 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siproposal`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_proposal`
--

CREATE TABLE `file_proposal` (
  `id_file_proposal` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_proposal`
--

INSERT INTO `file_proposal` (`id_file_proposal`, `id_proposal`, `file`) VALUES
(5, 8, 'Proposal_Penelitian_8.docx');

-- --------------------------------------------------------

--
-- Table structure for table `kepakaran`
--

CREATE TABLE `kepakaran` (
  `id_kepakaran` int(11) NOT NULL,
  `nama_kepakaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepakaran`
--

INSERT INTO `kepakaran` (`id_kepakaran`, `nama_kepakaran`) VALUES
(3, 'Pakar  Tesis'),
(5, 'Pakar Skripsi');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `id_penugasan` int(11) NOT NULL,
  `id_reviewer` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `status_penugasan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_penugasan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `id_rppi_penelitian` int(11) NOT NULL,
  `id_rppi_pengembangan` int(11) NOT NULL,
  `nama_penginput_data` varchar(100) NOT NULL,
  `nama_pelaksana_data` varchar(100) NOT NULL,
  `judul_proposal` varchar(200) NOT NULL,
  `ringkasan_proposal` text NOT NULL,
  `status_proposal` varchar(100) NOT NULL,
  `status_penugasan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_submit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `id_satker`, `id_rppi_penelitian`, `id_rppi_pengembangan`, `nama_penginput_data`, `nama_pelaksana_data`, `judul_proposal`, `ringkasan_proposal`, `status_proposal`, `status_penugasan`, `status`, `tgl_submit`) VALUES
(8, 3, 4, 5, 'lkasdlk', 'lkmaklsdm', 'lkmasdlk', 'jkansd', 'process', '0', 0, '2018-07-05 16:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_review`
--

CREATE TABLE `proposal_review` (
  `id_proposal_review` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_review` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `id_reviewer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kepakaran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`id_reviewer`, `id_user`, `id_kepakaran`, `nama`, `nama_instansi`, `alamat`, `no_telp`, `email`) VALUES
(1, 12, 3, 'lkasd', 'lkmasd', 'lkmaskld', '9012039', 'kmklasm@lkasd.com'),
(2, 13, 3, 'kasmd', 'lkmklad', 'lkmalksdm', '1923', 'asdas@lkasd.com'),
(3, 14, 3, 'lkasmd', 'lkmaksd', 'lkmalskd', '9012093', 'a@lkasd.com'),
(4, 15, 5, 'Hariyo', 'Poltek', 'Jl. Arjosari', '0868712983', 'hariyo@gma.com'),
(5, 16, 5, 'Mustofa', 'Unisma', 'Jl. Surabaya', '098908912', 'mustofa@gma.com');

-- --------------------------------------------------------

--
-- Table structure for table `rppi_penelitian`
--

CREATE TABLE `rppi_penelitian` (
  `id_rppi_penelitian` int(11) NOT NULL,
  `nama_rppi_penelitian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rppi_penelitian`
--

INSERT INTO `rppi_penelitian` (`id_rppi_penelitian`, `nama_rppi_penelitian`) VALUES
(2, 'Kegiatan Penelitian Udang'),
(4, 'Kegiatan Penelitian Hutan');

-- --------------------------------------------------------

--
-- Table structure for table `rppi_pengembangan`
--

CREATE TABLE `rppi_pengembangan` (
  `id_rppi_pengembangan` int(11) NOT NULL,
  `nama_rppi_pengembangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rppi_pengembangan`
--

INSERT INTO `rppi_pengembangan` (`id_rppi_pengembangan`, `nama_rppi_pengembangan`) VALUES
(3, 'Kegiatan Pengembangan Udang'),
(5, 'Kegiatan Pengembangan Hutan');

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id_satker` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id_satker`, `id_user`, `nama`, `nama_instansi`, `alamat`, `email`, `penanggung_jawab`) VALUES
(2, 7, 'Mahmudi', 'UM', 'Jl Semarang', 'um@ac.id', 'Pak Subyakto'),
(3, 8, 'Bahrul', 'UB', 'Jl. Gondokwaru Utara', 'ub@ac.id', 'Pak Rosyidin Nidhom'),
(4, 9, 'Gunawan', 'UIN', 'Jl. Gajayan', 'uin@ac.id', 'Pak Sulyono'),
(6, 18, 'Wahyudi', 'ITN', 'Jl. Borobudur', 'wahyudi@gmail.com', 'Pak Imam Supali');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `confirmation_code` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `confirmation_code`, `status`, `tgl_daftar`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', 1, '0000-00-00 00:00:00'),
(7, 'um', '0dd00e33b6fc67b811ebe3177217d6c0', 'satker', '', 0, '2018-07-05 09:36:02'),
(8, 'ub', '1c78b486fa89d4f71edbbd0d53d214dc', 'satker', '', 0, '2018-07-05 09:36:56'),
(9, 'uin', 'f19e4a94fc1ab1e08e16d2530e1f0b17', 'satker', '', 0, '2018-07-05 14:29:39'),
(11, 'lasd', '24e8b52b71f2046cdba9bbbf660477d0', 'reviewer', '', 0, '2018-07-05 14:57:38'),
(15, 'haryo', 'ce0e369a4c03ded7e143b9dbce069cc7', 'reviewer', '', 0, '2018-07-05 15:11:06'),
(16, 'mustofa', 'e0449718f922b3ab6be915681a17fca8', 'reviewer', '', 0, '2018-07-05 15:11:37'),
(17, 'wahyudi', 'c6b5cef6327916d6260a80de98184581', 'satker', '', 0, '2018-07-05 15:22:39'),
(18, 'itn', 'fff0e5fc42e03ea2f8c3f122ed33def4', 'satker', '', 0, '2018-07-05 15:23:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_proposal`
--
ALTER TABLE `file_proposal`
  ADD PRIMARY KEY (`id_file_proposal`);

--
-- Indexes for table `kepakaran`
--
ALTER TABLE `kepakaran`
  ADD PRIMARY KEY (`id_kepakaran`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `proposal_review`
--
ALTER TABLE `proposal_review`
  ADD PRIMARY KEY (`id_proposal_review`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`id_reviewer`);

--
-- Indexes for table `rppi_penelitian`
--
ALTER TABLE `rppi_penelitian`
  ADD PRIMARY KEY (`id_rppi_penelitian`);

--
-- Indexes for table `rppi_pengembangan`
--
ALTER TABLE `rppi_pengembangan`
  ADD PRIMARY KEY (`id_rppi_pengembangan`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_proposal`
--
ALTER TABLE `file_proposal`
  MODIFY `id_file_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kepakaran`
--
ALTER TABLE `kepakaran`
  MODIFY `id_kepakaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `proposal_review`
--
ALTER TABLE `proposal_review`
  MODIFY `id_proposal_review` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `id_reviewer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rppi_penelitian`
--
ALTER TABLE `rppi_penelitian`
  MODIFY `id_rppi_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rppi_pengembangan`
--
ALTER TABLE `rppi_pengembangan`
  MODIFY `id_rppi_pengembangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
