-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 07:05 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwd_uas_2441919003`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` int NOT NULL,
  `nama_jenis` varchar(80) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `nama_jenis`, `created_at`) VALUES
(2, 'Coffee', '2025-12-10 06:35:48'),
(3, 'Pastry', '2025-12-14 16:55:24'),
(4, 'Milkshake', '2025-12-14 16:55:39'),
(5, 'Mocktail', '2025-12-14 16:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `lyn`
--

CREATE TABLE `lyn` (
  `id_layanan` int NOT NULL,
  `id_user` int NOT NULL,
  `keluhan` text,
  `saran` text,
  `kritik` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lyn`
--

INSERT INTO `lyn` (`id_layanan`, `id_user`, `keluhan`, `saran`, `kritik`, `created_at`) VALUES
(1, 4, 'asdasdad', '', '', '2025-12-07 16:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `id_jenis_produk` int DEFAULT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `desksingkat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto_produk` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_produk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_jenis_produk`, `nama_produk`, `desksingkat`, `foto_produk`, `tgl_produk`) VALUES
(6, 2, 'Latte', 'Smooth and Calm', '693eea3661a70_Latte.jpg', '2025-12-15 00:47:50'),
(7, 2, 'Cappuccino', 'Equilibrio Numero Uno', '693eeb882b3a7_cappuccino.jpg', '2025-12-15 00:53:28'),
(8, 3, 'Butter Croissant', 'Flaky and Buttery', '693eed2d84ae7_croissant.jpg', '2025-12-15 01:00:29'),
(9, 3, 'Cinnamon Roll', 'Spiced and Creamy', '693eed66db4bb_cinnamon roll.jpg', '2025-12-15 01:01:26'),
(10, 3, 'Mini Apple Crumble Pie', 'Warm and Comforting', '693eedab6540a_mini apple crumble pie.jpg', '2025-12-15 01:02:35'),
(11, 3, 'Quiche Lorraine', 'Savory and Rich ', '693eedd8abf09_Quiche Lorraine.jpg', '2025-12-15 01:03:20'),
(12, 4, 'Vanilla Milkshake', 'Thick and Creamy', '693eeeee90e8d_vanilla milkshake.jpg', '2025-12-15 01:07:58'),
(13, 4, 'Salted Caramel Espresso', 'Sweet and Salty', '693eef1d793ce_Milkshake Salted Caramel Espresso.jpg', '2025-12-15 01:08:45'),
(14, 4, 'Matcha White Chocolate', 'Earthy and Smooth', '693eef498e985_Milkshake Matcha White Chocolate.jpg', '2025-12-15 01:09:29'),
(15, 4, 'Strawberry Cheesecake', 'Tart and Decadent', '693eefb60cb63_strawberry cheesecake.jpg', '2025-12-15 01:11:18'),
(16, 5, 'Lychee Raspberry Fizz', 'Sweet and Sparkling', '693ef088e4d44_rasberry fizz.jpg', '2025-12-15 01:14:48'),
(17, 5, 'Tropical Sunset', 'Fruity and Layered', '693ef0b280626_Tropical Sunset.jpg', '2025-12-15 01:15:30'),
(18, 5, 'Ginger Mint Cooler', 'Spicy and Zesty', '693ef0e18dbe7_Ginger Mint Cooler.jpg', '2025-12-15 01:16:17'),
(19, 5, 'Blue Ocean Lemonade', 'Tangy and Cool', '693ef10cbfd0e_Blue Ocean Lemonade.jpg', '2025-12-15 01:19:43'),
(20, 2, 'Americano', 'Classic but Powerfull', '693f0824894a8_americano.jpg', '2025-12-15 02:56:09'),
(21, 2, 'Espresso', 'Pure and Bold', '693f089b5a817_espresso.jpg', '2025-12-15 02:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PASSWORD` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `email`, `PASSWORD`, `nama_lengkap`, `created_at`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$aKBbGRmE0dqe1EZbnBuBkeIJvPpbVHy0UhjZ4l/A5wW.35ZpwW/A2', 'Hizbullah', '2025-12-10 05:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_layanan`
--

CREATE TABLE `user_layanan` (
  `id_user` int NOT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `layanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_layanan`
--

INSERT INTO `user_layanan` (`id_user`, `nama`, `email`, `layanan`) VALUES
(4, 'Hizbullah', 'Hizbullah@gmail.com', 'layanan kami');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indexes for table `lyn`
--
ALTER TABLE `lyn`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_layanan`
--
ALTER TABLE `user_layanan`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lyn`
--
ALTER TABLE `lyn`
  MODIFY `id_layanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_layanan`
--
ALTER TABLE `user_layanan`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
