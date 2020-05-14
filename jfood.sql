-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 09:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `customerName`, `email`, `address`, `phoneNumber`, `image`) VALUES
(6, 'muhammad.adisat', '$2y$10$NXlEhn4ZerBzElaCwz641utQ/KY..gQZNBUbSEgqB7dxMwqt7lCNu', 'Muhammad Adisatriyo Pratama', 'arierio1210@gmail.com', 'Griya Kencana Jln Merdeka barat Am/20, Kel. Mekarjaya, Kec Sukmajaya, Depok 2 tengah', '081297449833', ''),
(7, 'admin', '$2y$10$9aCo3UlNzkzYjBjau0/7gOk0tNEm8D0T9Dr.ee0nhj18B7ImmuSQy', 'admin', 'admin', 'admin', 'admin', ''),
(8, 'customer', '$2y$10$1xCK.KrW3LpO5J4uOrX9OOGdDPIJiUIg50nw2al9bWefmEpNIOQKO', 'customer', 'customer', 'customer', 'customer', '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `category` varchar(16) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `seller` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `category`, `price`, `seller`, `image`) VALUES
(1, 'Roti Tawar', 'Bakery', 5000, 'Seller 1', '5eb3e56b1747a.jpg'),
(2, 'Kue Warung', 'Bakery', 20000, 'Mas Roy', 'kue.jpg'),
(3, 'Bakwan', 'Snacks', 4000, 'Mas Roy', 'bakwan.jpg'),
(4, 'Tahu', 'Snacks', 4000, 'Mas Roy', 'tahu.jpg'),
(5, 'Cireng', 'Snacks', 5000, 'Mas Roy', 'cireng.jpg'),
(6, 'Americano', 'Beverages', 50000, 'Mas Roy', 'americano.jpg'),
(7, 'Sushi', 'Japanese', 65000, 'Sushi Master', 'sushi.jpg'),
(8, 'Kerang Rebus', 'Seafood', 5000, 'Mas Roy', 'kerangijo.jpg'),
(9, 'Chicken Wings', 'Western', 100000, 'Mbak Wingstop', 'wingstop.jpg'),
(10, 'Burger', 'Western', 50000, 'Mas Roy', 'burger.jpg'),
(12, 'Salad', 'Western', 50000, 'Mas Roy', 'salad.jpg'),
(14, 'Nasi Uduk', 'Meal', 10000, 'Mas Roy', 'nasiuduk.jpg'),
(23, 'Steak', 'Western', 100000, 'Chef Arnold', 'steak.jpg'),
(25, 'Spaghetti', 'Meal', 45000, 'Mas Roy', 'spaghetti.jpg'),
(26, 'Doughnut', 'Snack', 15000, 'Seller 2', '5eb3de2be8620.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `sellerName` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
