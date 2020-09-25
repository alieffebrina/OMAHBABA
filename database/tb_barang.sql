-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 12:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_posomahbaba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `fotobarang` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `barcode` int(11) NOT NULL,
  `expaid` date NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `ukuran` varchar(30) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `stokmin` int(11) NOT NULL,
  `hargabeli` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tglupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `fotobarang`, `barang`, `barcode`, `expaid`, `id_gudang`, `id_cabang`, `id_satuan`, `id_kategori`, `id_warna`, `ukuran`, `merk`, `stok`, `stokmin`, `hargabeli`, `id_user`, `tglupdate`) VALUES
(8, 'smk1-1.png', 'Sabun Colek', 20201, '2020-09-25', 3, 2, 23, 5, 2, '26', 'Wings Surya', 2000, 10, 3000000, 1, '2020-09-25'),
(9, 'smk1-1.png', 'Sabun Colek', 20120, '2020-09-25', 3, 2, 21, 5, 1, '500', 'Wings Surya', 10, 10, 2000000, 1, '2020-09-25'),
(10, 'smk1-1.png', 'Sabun Colek', 1000, '2020-09-25', 3, 2, 23, 5, 1, '26', 'Wings Surya', 200, 6, 5000000, 1, '2020-09-25'),
(12, '4x6 red.jpg', 'mita', 2010, '2020-09-26', 3, 2, 23, 6, 2, '500', 'winsfood', 200, 6, 3000000, 1, '2020-09-25'),
(14, '4x6 red.jpg', 'Sabun Colek', 20201, '2020-09-25', 3, 2, 21, 5, 1, '26', 'Wings Surya', 10, 1, 5000, 1, '2020-09-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
