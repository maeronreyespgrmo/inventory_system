-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `Availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `Availability`) VALUES
(15, 'Shovel', 'Food_Category_150.png', 'Yes'),
(16, 'Hammer', 'Food_Category_353.webp', 'Yes'),
(17, 'Screw Drivers', 'Food_Category_109.jpg', 'Yes'),
(18, 'Gloves', 'Food_Category_1.png', 'Yes'),
(19, 'Door Knob', 'Food_Category_714.png', 'Yes'),
(20, 'Tape Measure', 'Food_Category_800.png', 'Yes'),
(21, 'Saw', 'Food_Category_158.jpg', 'Yes'),
(22, 'Pliers', 'Food_Category_816.png', 'Yes'),
(23, 'Electric Drill', 'Food_Category_758.jpg', 'Yes'),
(24, 'Wrench', 'Food_Category_862.png', 'Yes'),
(25, 'Hand Sealer', 'Food_Category_625.jpg', 'Yes'),
(26, 'Padlock', 'Food_Category_162.jpg', 'Yes'),
(27, 'Ropes', 'Food_Category_867.jpg', 'Yes'),
(28, 'Wheelers', 'Food_Category_459.jpg', 'Yes'),
(29, 'Hard hat', 'Food_Category_236.png', 'Yes'),
(30, 'Rake', 'Food_Category_613.jpg', 'Yes'),
(31, 'Paint', 'Food_Category_202.png', 'Yes'),
(32, 'Brush', 'Food_Category_228.png', 'Yes'),
(33, 'Glue', 'Food_Category_837.jpg', 'Yes'),
(34, 'Lighbulb', 'Food_Category_358.png', 'Yes'),
(35, 'Sealant', 'Food_Category_202.jpg', 'Yes'),
(36, 'Tile Grout', 'Food_Category_802.jpg', 'Yes'),
(37, 'Lumber', 'Food_Category_432.png', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `contact`, `username`, `password`) VALUES
(26, 'princess', 'princess@gmail.com', '09491044420', 'princess yu', '21232f297a57a5a743894a0e4a801fc3'),
(64, '', 'p@gmail.com', '298329389', 'princess', '5f4dcc3b5aa765d61d8327deb882cf99'),
(71, '', 'chan@gmail.com', '19019302930', 'chan', 'd9e1592f563335a7429c8b9445a3c4a8'),
(72, '', 'chris@gmail.com', '102901920192', 'chris', 'f6fdffe48c908deb0f4c3bd36c032e72'),
(73, '', 'newad@gmail.com', '2763276372', 'new', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `availability` varchar(10) NOT NULL,
  `pmethod` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `availability`, `pmethod`) VALUES
(115, 'Square Digging Shovel', '100', 250.00, 'Food-Name-2668.png', 15, 'Yes', ''),
(116, 'Pointed Digging Shovel', '100', 200.00, 'Food-Name-5405.png', 15, 'Yes', ''),
(117, 'Round Digging Shovel', '200', 250.00, 'Food-Name-1193.png', 15, 'Yes', ''),
(118, 'Edging Shovel', '100', 350.00, 'Food-Name-2051.png', 15, 'Yes', ''),
(119, 'Trench Shovel', '120', 350.00, 'Food-Name-4944.png', 15, 'Yes', ''),
(120, 'Mini or Handheld Shovel', '100', 300.00, 'Food-Name-4998.png', 15, 'Yes', ''),
(121, 'Post-Hole Shovel', '100', 250.00, 'Food-Name-4493.png', 15, 'Yes', ''),
(122, ' Scoop or Snow Shovel', '200', 350.00, 'Food-Name-7442.png', 15, 'Yes', ''),
(123, 'Tree Planting Shovel', '99', 200.00, 'Food-Name-3915.png', 15, 'Yes', ''),
(124, ' Flat Shovel', '90', 250.00, 'Food-Name-1412.png', 15, 'Yes', ''),
(125, 'Power Shovel', '80', 200.00, 'Food-Name-4260.png', 15, 'Yes', ''),
(126, 'Folding Shovel', '80', 300.00, 'Food-Name-1375.png', 15, 'Yes', ''),
(127, 'Claw and Framing Hammers', '200', 150.00, 'Food-Name-8887.jpg', 16, 'Yes', ''),
(128, 'Ball Peen Hammer', '100', 200.00, 'Food-Name-706.jpg', 16, 'Yes', ''),
(129, 'Dead Blow Hammer', '250', 200.00, 'Food-Name-8834.jpg', 16, 'Yes', ''),
(130, 'Engineering and Drilling Hammers', '200', 250.00, 'Food-Name-2021.jpg', 16, 'Yes', ''),
(131, 'Mallets', '240', 200.00, 'Food-Name-3955.jpg', 16, 'Yes', ''),
(132, 'Chipping and Riveting Hammers', '150', 200.00, 'Food-Name-9362.jpg', 16, 'Yes', ''),
(133, 'Sledge Hammer ', '50', 300.00, 'Food-Name-6286.jpg', 16, 'Yes', ''),
(134, 'Soft-Face, Split-Head Hammers', '200', 300.00, 'Food-Name-814.jpg', 16, 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `town` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `st` varchar(50) NOT NULL,
  `hnum` int(10) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `confirmation` varchar(50) NOT NULL,
  `riderName` varchar(100) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `order_time` datetime DEFAULT NULL,
  `del_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_username`, `firstname`, `lastname`, `email`, `town`, `brgy`, `st`, `hnum`, `total_price`, `status`, `confirmation`, `riderName`, `payment`, `paymentMethod`, `order_time`, `del_time`) VALUES
(27, 'princess yu', 'Princess', 'admin', 'princess@gmail.com', 'Kalayaan', 'Brgy. San Antonio', 'General Luna Street', 233, 70, 'Cancelled', '', '', '', 'COD', '2023-11-11 17:18:54', '2023-11-19 17:36:30'),
(28, 'princess yu', 'akskans', 'kanskans', 'aksma@gmail.com', 'Lumban', 'Brgy. Salac', 'Magano Street', 222, 70, 'Delivered', 'Order Received', '', '', 'COD', '2023-11-20 21:04:31', '2023-11-30 11:00:56'),
(29, 'princess yu', 'dsdsd', 'sdsd', 'princess@gmail.com', 'Lumban', 'Brgy. Bagong Silang', 'Bonifacio Street', 2121, 2300, 'Delivered', 'Order Received', '', '', 'COD', '2023-11-30 14:54:32', '2023-11-30 14:55:06'),
(30, 'new', 'ahjs', 'asasadwd', 'newad@gmail.com', 'losbanios', 'wewe', 'sasa', 4008, 450, 'To Process', '', '', '', 'GCash', '2023-12-04 10:29:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(30) NOT NULL,
  `order_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `food_title` varchar(50) NOT NULL,
  `food_price` decimal(10,2) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `food_id`, `food_title`, `food_price`, `qty`, `total_price`) VALUES
(34, 27, 67, 'Philip Screw Driver', 70.00, 1, 70.00),
(35, 28, 67, 'Philip Screw Driver', 70.00, 1, 70.00),
(36, 29, 115, 'Square Digging Shovel', 250.00, 1, 250.00),
(37, 29, 116, 'Pointed Digging Shovel', 200.00, 1, 200.00),
(38, 29, 117, 'Round Digging Shovel', 250.00, 1, 250.00),
(39, 29, 118, 'Edging Shovel', 350.00, 1, 350.00),
(40, 29, 119, 'Trench Shovel', 350.00, 1, 350.00),
(41, 29, 120, 'Mini or Handheld Shovel', 300.00, 1, 300.00),
(42, 29, 121, 'Post-Hole Shovel', 250.00, 1, 250.00),
(43, 29, 122, ' Scoop or Snow Shovel', 350.00, 1, 350.00),
(44, 30, 115, 'Square Digging Shovel', 250.00, 1, 250.00),
(45, 30, 116, 'Pointed Digging Shovel', 200.00, 1, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` int(30) NOT NULL,
  `riderName` varchar(100) NOT NULL,
  `riderUsername` varchar(100) NOT NULL,
  `riderEmail` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `riderPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `riderName`, `riderUsername`, `riderEmail`, `contact`, `riderPassword`) VALUES
(7, 'Contractor', 'Contractor 1', 'Contractor@gmail.com', '2938293283', '26744aa9d6c04c246957fb97d987546c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminUsername` varchar(100) NOT NULL,
  `adminContact` text NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `adminName`, `adminUsername`, `adminContact`, `adminEmail`, `adminPassword`) VALUES
(7, 'Princess', 'Admin Princess', '83748374837487', 'adminPrincess@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`riderEmail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
