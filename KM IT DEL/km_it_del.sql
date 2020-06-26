-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 05:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `km_it_del`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `role`) VALUES
('Admin', 'admin', 'administrator'),
('Joshua123', '123', 'kadep');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nim_anggota` varchar(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `prodi_anggota` varchar(100) NOT NULL,
  `angkatan_anggota` varchar(100) NOT NULL,
  `departemen_anggota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nim_anggota`, `nama_anggota`, `prodi_anggota`, `angkatan_anggota`, `departemen_anggota`) VALUES
('asd', 'asd', 'S1 IF', '2019', 'DEPKOMINFO');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kadep`
--

CREATE TABLE `detail_kadep` (
  `nim` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_kadep` varchar(100) NOT NULL,
  `prodi_kadep` varchar(100) NOT NULL,
  `angkatan_kadep` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `masa_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kadep`
--

INSERT INTO `detail_kadep` (`nim`, `username`, `nama_kadep`, `prodi_kadep`, `angkatan_kadep`, `departemen`, `masa_jabatan`) VALUES
('11319001', 'Daud123', 'Daud Manurung', 'D3 TI', '2019', 'DEPSENBUD', '2020/2021'),
('11319029', 'Joshua123', 'Joshua Pangaribuan', 'D3 TI', '2019', 'DEPKOMINFO', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_transaksi` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `pengeluaran` varchar(100) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_transaksi`, `deskripsi`, `pengeluaran`, `waktu_transaksi`) VALUES
('5ef536ae5ea9c', 'Welcoming Party', '100000', '2020-06-25 23:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `uang_kas`
--

CREATE TABLE `uang_kas` (
  `id_transaksi` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `total_pembayaran` varchar(100) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `sisa` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uang_kas`
--

INSERT INTO `uang_kas` (`id_transaksi`, `deskripsi`, `prodi`, `total_pembayaran`, `pembayaran`, `sisa`, `status`, `waktu_transaksi`) VALUES
('5ef52bbb8c2ed', 'Uang Kas', 'D3 TI', '800000', '300000', '500000', 'Belum Lunas', '2020-06-25 22:56:59'),
('5ef56bc4b1797', 'Uang Kas', 'BEM', '200000', '200000', '0', 'Belum Lunas', '2020-06-26 03:30:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim_anggota`);

--
-- Indexes for table `detail_kadep`
--
ALTER TABLE `detail_kadep`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
