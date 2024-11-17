-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 09:55 AM
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
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `grand_total` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `fullname`, `email`, `tel`, `grand_total`) VALUES
(1, '2024-09-10 22:43:09', 'Kanison', '36189@bpk.ac.th', '0957393428', 4246.00),
(2, '2024-09-10 23:02:49', 'Kanison', '36189@bpk.ac.th', '0957393428', 4246.00),
(3, '2024-09-10 23:09:09', 'Kanison Sakthong', '36189@bpk.ac.th', '0957393428', 2148.00),
(4, '2024-09-11 03:18:09', 'Kanison Sakthong', '36189@bpk.ac.th', '0957393428', 2048.00),
(5, '2024-09-11 06:19:09', 'Kanison Sakthong', '36189@bpk.ac.th', '0957393428', 6220.00),
(6, '2024-09-11 09:03:09', 'Kanison Sakthong', '36189@bpk.ac.th', '0957393428', 3097.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `product_name`, `price`, `quantity`, `total`) VALUES
(2, 1, 'Test', 999.00, 4, 3996.00),
(2, 2, 'Test2', 50.00, 5, 250.00),
(3, 1, 'Test', 999.00, 1, 1000.00),
(3, 2, 'Test2', 50.00, 3, 53.00),
(3, 3, 'Tlomp', 999.00, 1, 1000.00),
(4, 1, 'Test', 999.00, 2, 1001.00),
(4, 2, 'Test2', 50.00, 1, 51.00),
(5, 2, 'Test2', 50.00, 1, 50.00),
(5, 5, 'Cat', 1234.00, 5, 6170.00),
(6, 1, 'Test', 999.00, 3, 2997.00),
(6, 8, 'Cat', 100.00, 1, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `profile_image` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `profile_image`, `detail`) VALUES
(1, 'Test', 999.00, 'cat.jpg', 'Text'),
(2, 'Test2', 50.00, 'Png.png', 'Text'),
(5, 'Cat', 1234.00, 'images.jpg', ':>'),
(6, 'sumo', 246.00, 'e77e37dc4498568c50f4f2609d47665b.png', 'just for sale'),
(7, 'Cat?', 987.00, 'screaming-cat.jpg', 'meow!!!'),
(8, 'Cat', 100.00, 'fat-cat.jpg', 'cat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'Test', '1234', 'Test'),
(8, 'Test', '00000', 'Kanison Sakthong'),
(9, 'Kanison', '1234', 'Kanison Sakthong'),
(10, 'Text user', '123456789', 'Admin'),
(11, 'tawan', '1010', 'wongwarit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
