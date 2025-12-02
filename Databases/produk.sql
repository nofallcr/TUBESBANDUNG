  -- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2025 at 03:59 PM
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
-- Database: `produk`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_produk`
--

CREATE TABLE `daftar_produk` (
  `id` int(100) NOT NULL,
  `randomid` int(100) NOT NULL,
  `nama_tempat` varchar(75) NOT NULL,
  `jenis_paket` varchar(75) NOT NULL,
  `rating` double NOT NULL,
  `harga_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_produk`
--

INSERT INTO `daftar_produk` (`id`, `randomid`, `nama_tempat`, `jenis_paket`, `rating`, `harga_paket`) VALUES
(5, 1, 'Trip Alam', 'Paket Trip', 4.7, 300000),
(6, 31, 'Trip Sejarah', 'Paket Trip', 4.5, 150000),
(1, 74, 'Braga', 'Paket Harian', 4.5, 105000),
(2, 990000, 'Asia Africa', 'Paket Harian', 4.8, 150000),
(3, 990001, 'Dusun Bambu', 'Paket Keluarga', 4.7, 1900000),
(4, 990002, 'Kampung Cai Ranca Upas', 'Paket Keluarga', 4.7, 2200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_produk`
--
ALTER TABLE `daftar_produk`
  ADD PRIMARY KEY (`randomid`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`,`randomid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_produk`
--
ALTER TABLE `daftar_produk`
  MODIFY `randomid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
