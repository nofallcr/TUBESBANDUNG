-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 03:45 AM
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
-- Database: `db_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `email_pemesan` varchar(100) DEFAULT NULL,
  `telepon_pemesan` varchar(20) DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT 1,
  `paket_wisata` varchar(100) DEFAULT NULL,
  `lokasi_wisata` varchar(100) DEFAULT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `status` enum('pending','paid','cancelled') DEFAULT 'pending',
  `tanggal_transaksi` datetime DEFAULT current_timestamp(),
  `tanggal_bayar` datetime DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_pemesan`, `email_pemesan`, `telepon_pemesan`, `jumlah_tiket`, `paket_wisata`, `lokasi_wisata`, `total_bayar`, `metode_pembayaran`, `status`, `tanggal_transaksi`, `tanggal_bayar`, `catatan`) VALUES
(1, 'FARELKUN', 'fARELyAMO@gmail.com', '08657456578', 3, 'Braga - Kenangan Lama', 'Kota Bandung', 315000.00, 'ewallet', 'pending', '2025-12-04 08:56:36', NULL, NULL),
(2, 'sdfghj', 'sdfghj@G', '098765', 1, 'Asia Africa - Keliling Dunia', 'Kota Bandung', 150000.00, 'ewallet', 'pending', '2025-12-04 09:08:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`) VALUES
(1, 'as', 'Aa@gmail', '$2y$10$sxYaCxTIexQWTNrH4Oe5AuBqV0Q9c5EEgH8Mkrw.Jih1q7Jy0GTMK', '2025-12-04 02:39:39'),
(2, 'farelhia', 'ahah@gmail', '$2y$10$EqB/iorF1DK/vs0W35c/Bu5kyAlH4fFs/ivJlO43Sk3FQFNCAJpBa', '2025-12-04 02:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
