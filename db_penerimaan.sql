-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2026 at 06:44 AM
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
-- Database: `db_penerimaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_penerimaan`
--

CREATE TABLE `tbl_jenis_penerimaan` (
  `id` int(11) NOT NULL,
  `kd_penerimaan` varchar(50) DEFAULT NULL,
  `subakun_pendapatan` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `akun_harta` varchar(50) DEFAULT NULL,
  `akun_pendapatan` varchar(50) DEFAULT NULL,
  `akun_pendapatan_apbs` varchar(50) DEFAULT NULL,
  `akun_pendapatan_terikat` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_penerimaan`
--

INSERT INTO `tbl_jenis_penerimaan` (`id`, `kd_penerimaan`, `subakun_pendapatan`, `nama`, `akun_harta`, `akun_pendapatan`, `akun_pendapatan_apbs`, `akun_pendapatan_terikat`, `keterangan`, `status`, `date_created`, `date_modified`) VALUES
(1, '22', '222', '222', '22', '222', '222', '222', 'aktif', 'aktif', '2026-03-26 12:44:14', '2026-03-26 12:44:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis_penerimaan`
--
ALTER TABLE `tbl_jenis_penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_penerimaan` (`kd_penerimaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis_penerimaan`
--
ALTER TABLE `tbl_jenis_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
