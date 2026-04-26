-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2023 at 01:20 PM
-- Server version: 5.7.43
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u23s1017_ibau`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `uid` char(36) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `display_id` varchar(100) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `uri` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`uid`, `company_name`, `display_id`, `address`, `uri`) VALUES
('aaa393bc-222e-333f-4449-88888888ab0c', 'My Names', 'MYNA', '400 Melbourne Street Melbourne VIC 3048', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Contact/Customer/aaa393bc-222e-333f-4449-88888888ab0c'),
('aaa393bc-3355-4552-8559-d9a777777bd8', 'Your name', 'YONA7250', '401 Melbourne Street Melbourne VIC 3048', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Contact/Customer/aaa393bc-3355-4552-8559-d9a777777bd8'),
('bcf66666-52c2-4361-8f68-d9a777777bd8', 'You're name', 'REME5067', '402 Melbourne Street Melbourne VIC 3048', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Contact/Customer/bcf66666-52c2-4361-8f68-d9a777777bd8'),
('e44444a7-b125-832d-4527-5678b6035402', 'They're name', 'RENAME', '403 Melbourne Street Melbourne VIC 3048', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Contact/Customer/e44444a7-b125-832d-4527-5678b6035402'),

-- --------------------------------------------------------

--
-- Table structure for table `forget_pass_token`
--

CREATE TABLE `forget_pass_token` (
  `user_id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `is_valid` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `uid` char(36) NOT NULL,
  `number` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `barcode` varchar(15) DEFAULT NULL,
  `bale_qty` int(2) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty_available` int(4) DEFAULT NULL,
  `weight` decimal(5,2) NOT NULL,
  `bin_loc` varchar(50) DEFAULT NULL,
  `photo_uri` varchar(200) DEFAULT NULL,
  `uri` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` 
(`uid`, `number`, `name`, `barcode`, `bale_qty`, `price`, `qty_available`, `weight`, `bin_loc`, `photo_uri`, `uri`) VALUES
('289q32ce-87af-4849-a50c-5678b6035402', '23-8945', 'Latex Coir CCar&Surf 45x75cm', '9313248383844', 4, 18.95, NULL, 8.50, 'New', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Inventory/Item/289q32ce-87af-4849-a50c-5678b6035402/Photo', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Inventory/Item/289q32ce-87af-4849-a50c-5678b6035402'),
('bcf66666-52dd-4a45-b189-ccc18e3c00ff', '23-8134', 'Latex, Cat & New Car 45x75', '9318135084421', 4, 18.95, 237, 8.50, 'Wk5Sep', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Inventory/Item/bcf66666-52dd-4a45-b189-ccc18e3c00ff/Photo', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Inventory/Item/bcf66666-52dd-4a45-b189-ccc18e3c00ff'),
('aaa393bc-be0f-4c2f-8391-d4cfe823849f', '23-8385', 'Latex Coir, Birbs frogs 50x80 ', '9318132548737', 4, 22.50, 108, 8.90, 'D71', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Inventory/Item/aaa393bc-be0f-4c2f-8391-d4cfe823849f/Photo', 'https://arl2.api.myob.com/accountright/5678b608-aaaf-4fff-8eec-ccc18e3c00ff/Inventory/Item/aaa393bc-be0f-4c2f-8391-d4cfe823849f'),

-- --------------------------------------------------------

--
-- Table structure for table `item_orders`
--

CREATE TABLE `item_orders` (
  `uid` int(10) NOT NULL,
  `item_uid` char(36) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(3,2) NOT NULL,
  `disc` int(2) NOT NULL,
  `subtotal` decimal(4,2) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `uid` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `shiptoaddress` varchar(100) NOT NULL,
  `customer_uid` char(36) NOT NULL,
  `memo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'admin@gmail.com', '$2y$10$gO3MUQjXoCaPqP7UQXQxu.YXYsb6.OjkQH7NIR.Beg74uaeMiGKtG', 1, '2023-04-23 23:02:16', '2023-08-28 02:26:48'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forget_pass_token`
--
ALTER TABLE `forget_pass_token`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `item_orders`
--
ALTER TABLE `item_orders`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_orders`
--
ALTER TABLE `item_orders`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
