-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 11:28 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'Farel123', 'adminganteng', 'Farel Yamotaro Hia'),
(3, 'Naufal', 'adminganteng', 'Naufal'),
(5, 'Albariqi', 'adminganteng', 'Albariqi'),
(7, 'Cinta', 'adminganteng', 'Cinta'),
(9, 'fira', 'adminganteng', 'fira'),
(11, 'vascha', 'adminganteng', 'vascha');

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
(2, 'sdfghj', 'sdfghj@G', '098765', 1, 'Asia Africa - Keliling Dunia', 'Kota Bandung', 150000.00, 'ewallet', 'pending', '2025-12-04 09:08:25', NULL, NULL),
(3, 'Naufal', 'farel123@gmail.com', '9876543212', 2, 'Kampung Cai Ranca Upas', 'Ciwidey', 4400000.00, 'transfer', 'pending', '2025-12-04 09:59:15', NULL, NULL),
(4, 'Farel', 'marunoyumitgc@gmail.com', '09867543', 4, 'Trip Alam', 'Area Alam', 1200000.00, 'ewallet', 'pending', '2025-12-04 12:18:05', NULL, NULL),
(5, 'gvwjgc', 'marunoyumitgc@gmail.com', '089765432', 7, 'Braga - Kenangan Lama', 'Kota Bandung', 735000.00, 'ewallet', 'pending', '2025-12-04 12:41:46', NULL, NULL),
(6, 'Farel', 'Marunoyumitg@gmail.com', '09867544232', 9, 'Trip Sejarah', 'Kawasan Sejarah', 1350000.00, 'ewallet', 'pending', '2025-12-04 12:47:33', NULL, NULL),
(7, 'farel', 'marunoyumitgc@gmail.com', '098765432145', 5, 'Trip Sejarah', 'Kawasan Sejarah', 750000.00, 'transfer', 'pending', '2025-12-04 12:48:33', NULL, NULL),
(8, 'farel', 'marunoyumitgc@gmail.com', '09876543256', 8, 'Trip Sejarah', 'Kawasan Sejarah', 1200000.00, 'ewallet', 'pending', '2025-12-04 12:52:10', NULL, NULL),
(9, 'fuhyuh', 'farel@gmail.com', '747928290`1', 6, 'Trip Alam', 'Area Alam', 1800000.00, 'transfer', 'pending', '2025-12-04 15:08:09', NULL, NULL),
(10, 'fuhyuh', 'farel@gmail.com', '0854321678', 1, 'Asia Africa - Keliling Dunia', 'Kota Bandung', 150000.00, 'transfer', 'pending', '2025-12-04 15:18:12', NULL, NULL);

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
(2, 'farelhia', 'ahah@gmail', '$2y$10$EqB/iorF1DK/vs0W35c/Bu5kyAlH4fFs/ivJlO43Sk3FQFNCAJpBa', '2025-12-04 02:40:15'),
(3, 'farel', 'marunoyumitgc@gmail.com', '$2y$10$FVO6B4Xjh/.p7AiRE9iy4e0mv.pl4uBDtyz2POFiNEgK4prDSiaRK', '2025-12-04 02:52:32'),
(4, 'fuhyuh', 'farel@gmail.com', '$2y$10$mxE2WV/tAegDT7QonSfiG.vBnxjVWp8XIg2khDKkmhYGx1BBu1Yq2', '2025-12-04 08:07:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
