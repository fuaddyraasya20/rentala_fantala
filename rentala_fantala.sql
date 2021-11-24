-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 08:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentala_fantala`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_data` int(5) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_data`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Deka Fantala');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `no_plat` varchar(10) NOT NULL,
  `jenis_kendaraan` enum('Motor','Mobil') NOT NULL,
  `merk` text NOT NULL,
  `tahun` year(4) NOT NULL,
  `harga_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`no_plat`, `jenis_kendaraan`, `merk`, `tahun`, `harga_sewa`) VALUES
('BA 0001 RI', 'Motor', 'Mio', 2015, 50000),
('BA 0002 RI', 'Mobil', 'Avanza', 2015, 250000),
('BA 0003 RI', 'Mobil', 'Fortuner', 2019, 350000),
('BA 0004 RI', 'Motor', 'Beat', 2017, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjam`
--

CREATE TABLE `tb_peminjam` (
  `id_data` int(11) NOT NULL,
  `nama_p` text NOT NULL,
  `no_hp` bigint(12) NOT NULL,
  `identitas` enum('KTP','KTM') NOT NULL,
  `no_identitas` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjam`
--

INSERT INTO `tb_peminjam` (`id_data`, `nama_p`, `no_hp`, `identitas`, `no_identitas`) VALUES
(1, 'Deka Fantala', 82388379283, 'KTM', 17101152610312),
(2, 'Udin Sunguik', 82323232323, 'KTM', 17101152610000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_data` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `nama_p` text NOT NULL,
  `no_hp` bigint(12) NOT NULL,
  `identitas` enum('KTP','KTM') NOT NULL,
  `no_identitas` bigint(16) NOT NULL,
  `no_plat` varchar(10) NOT NULL,
  `jenis_kendaraan` enum('Mobil','Motor') NOT NULL,
  `merk` text NOT NULL,
  `tahun` year(4) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `stat` enum('Selesai','Belum Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_data`, `tgl_pinjam`, `tgl_kembali`, `nama_p`, `no_hp`, `identitas`, `no_identitas`, `no_plat`, `jenis_kendaraan`, `merk`, `tahun`, `harga_sewa`, `stat`) VALUES
(1, '2021-07-01', '2021-07-05', 'Deka Fantala', 82388379283, 'KTM', 17101152610312, 'BA 0001 RI', 'Motor', 'Mio', 2015, 50000, 'Belum Selesai'),
(2, '2021-07-05', '2021-07-10', 'Deka Fantala', 82388379283, 'KTM', 17101152610312, 'BA 0001 RI', 'Motor', 'Mio', 2015, 50000, 'Belum Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indexes for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_data` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
