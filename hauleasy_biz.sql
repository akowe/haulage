-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2021 at 12:45 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hauleasy_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address_from` varchar(100) NOT NULL,
  `address_to` varchar(100) NOT NULL,
  `location_from` varchar(100) NOT NULL,
  `location_to` varchar(100) NOT NULL,
  `landmark_from` varchar(100) NOT NULL,
  `landmark_to` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `email`, `fname`, `lname`, `phone`, `address_from`, `address_to`, `location_from`, `location_to`, `landmark_from`, `landmark_to`, `vehicle_type`, `description`, `weight`, `category`, `image`, `status`, `date`) VALUES
(1, 'estherakowe@yahoo.com', 'Esther', 'Eze', '0703314156', '44 igodo road Magboro, off lagos-ibadan express', '99 opebi ikeja', 'Select Here', 'Select Here', 'Punch news paper', 'Cakes and Cream', 'Truck', 'test run', '10kg', 'Perishable', 'd8208584012e089da03872e1d542b7c7.png', 'Pending', '2021-04-18 07:37:38'),
(2, 'estherakowe@yahoo.com', 'Esther', 'Eze', '0703314156', '44 igodo road Magboro, off lagos-ibadan express', '99 opebi ikeja', 'Select Here', 'Select Here', 'Punch news paper', 'Cakes and Cream', 'Van', 'just', '50kg', 'Non-perishable', '406287829910f9cec81e14e04f057a9d.png', 'Pending', '2021-04-18 07:55:53'),
(3, 'estherakowe@yahoo.com', 'Esther', 'Eze', '0703314156', '99 opebi', '15 Maryland', 'Lagos', 'Ondo', 'Cakes and Cream', 'Wema Bank', 'Van', 'Meat', '50kg', 'Perishable', '1ff3a8b06602af653c3f2c9d0af092bc.png', 'Pending', '2021-04-19 01:14:57'),
(4, 'esther.akowe@livestock247.com', 'omonego', 'Eze', '0703314156', '124 VGC Ajah', '24 Ring Road, Ibadan ', 'Lagos', 'Oyo', 'After Mega Plaza', 'Zenith Bank', 'Truck', 'Glass Cups', '10kg', 'Fragile', '31eee0731e66d87141fd3e6373175843.jpg', 'Pending', '2021-04-21 16:43:21'),
(5, 'estherakowe@yahoo.com', 'Esther', 'Eze', '0703314156', '44 igodo road Magboro, off lagos-ibadan express', '24 Ring Road, Ibadan ', 'Lagos', 'Ondo', 'Punch news paper', 'Wema Bank', 'Truck', 'chairs', '50kg', 'Non-perishable', '3619a43e4f6cfb7c3a8c9530c3642dce.jpeg', 'Pending', '2021-04-21 22:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `location_from`
--

CREATE TABLE `location_from` (
  `id` int(11) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_from`
--

INSERT INTO `location_from` (`id`, `state`) VALUES
(1, 'Lagos'),
(2, 'Abuja'),
(3, 'Port Harcourt'),
(4, 'Ondo');

-- --------------------------------------------------------

--
-- Table structure for table `location_to`
--

CREATE TABLE `location_to` (
  `state` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_to`
--

INSERT INTO `location_to` (`state`, `id`) VALUES
('Ondo', 1),
('Oyo', 2),
('Kaduna', 3),
('Calabar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `key` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address_from` varchar(100) NOT NULL,
  `address_to` varchar(100) NOT NULL,
  `location_from` varchar(100) NOT NULL,
  `location_to` varchar(100) NOT NULL,
  `landmark_from` varchar(100) NOT NULL,
  `landmark_to` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `invoice_status` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `email`, `fname`, `lname`, `phone`, `address_from`, `address_to`, `location_from`, `location_to`, `landmark_from`, `landmark_to`, `vehicle_type`, `description`, `weight`, `category`, `invoice_id`, `amount`, `vat`, `total`, `invoice_status`, `date`) VALUES
(1, 'esther.akowe@livestock247.com', 'omonego', 'Eze', '', '124 VGC Ajah', '24 Ring Road, Ibadan', 'Lagos', 'Oyo', '', '', 'Truck', 'Glass Cups', '10kg', 'Fragile', '4', '10000', '750', '10750', 'Paid', '2021-04-21 21:44:15'),
(2, 'estherakowe@yahoo.com', 'Esther', 'Eze', '', '44 igodo road Magboro, off lagos-ibadan express', '99 opebi ikeja', 'Select Here', 'Select Here', '', '', 'Truck', 'test run', '10kg', 'Perishable', '1', '25000', '1875', '26875', 'Paid', '2021-04-21 22:05:46'),
(3, 'estherakowe@yahoo.com', 'Esther', 'Eze', '', '44 igodo road Magboro, off lagos-ibadan express', '24 Ring Road, Ibadan', 'Lagos', 'Ondo', 'Punch news paper', 'Wema Bank', 'Truck', 'chairs', '50kg', 'Non-perishable', '5', '500', '37', '537', 'Unpaid', '2021-04-21 22:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `reg_type` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reset_password` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `reg_type`, `user_type`, `password`, `reset_password`, `code`, `active`, `date`) VALUES
(2, 'Esther', 'Eze', 'estherakowe@yahoo.com', '0703314156', '99 opebi road ikeja lagos', 'Shipper', 'user', '827ccb0eea8a706c4c34a16891f84e7b', '', 'ISqPBa2sOyJ6', 'verified', '2021-04-17 20:38:36'),
(4, 'admin', 'admin', 'info@hauleasy.biz', '08100000000', '14A Oba Elegushi Road, Ikoyi Lagos, Nigeria.', 'admin', 'admin', '8b8d3a18b8f14a0509b62be22b215dad', '', 'yNv7CeigmGPK', 'verified', '2021-04-18 08:40:30'),
(7, 'omonego', 'Eze', 'esther.akowe@livestock247.com', '0703314156', NULL, 'Corporate', 'user', '827ccb0eea8a706c4c34a16891f84e7b', '', '4shI1SJ2nKry', 'verified', '2021-04-19 13:03:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD UNIQUE KEY `id` (`id`,`email`) USING BTREE;

--
-- Indexes for table `location_from`
--
ALTER TABLE `location_from`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_to`
--
ALTER TABLE `location_to`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD UNIQUE KEY `id` (`id`,`email`,`invoice_id`) USING BTREE;

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `location_from`
--
ALTER TABLE `location_from`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location_to`
--
ALTER TABLE `location_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
