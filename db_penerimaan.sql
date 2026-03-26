-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2026 at 06:07 AM
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
-- Table structure for table `tb_penerimaan`
--

CREATE TABLE `tb_penerimaan` (
  `id` int(11) NOT NULL,
  `kode_penerimaan` varchar(50) DEFAULT NULL,
  `sub_akun` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `akun_harta` varchar(50) DEFAULT NULL,
  `akun_pendapatan` varchar(50) DEFAULT NULL,
  `akun_apbs` varchar(50) DEFAULT NULL,
  `terikat` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penerimaan`
--

INSERT INTO `tb_penerimaan` (`id`, `kode_penerimaan`, `sub_akun`, `nama`, `akun_harta`, `akun_pendapatan`, `akun_apbs`, `terikat`, `keterangan`, `status`) VALUES
(1, '22', '222', '222', '22', '222', '222', '222', 'aktif', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_penerimaan` (`kode_penerimaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
