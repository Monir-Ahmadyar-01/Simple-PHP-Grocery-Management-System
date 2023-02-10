-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 05:49 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ap_inventry`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_account`
--

CREATE TABLE `company_account` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `agent_name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `buy_amount` float NOT NULL,
  `received` float NOT NULL,
  `date_sh` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `company_account`
--

INSERT INTO `company_account` (`id`, `bill_no`, `company_name`, `agent_name`, `buy_amount`, `received`, `date_sh`) VALUES
(9, '1212', 'sony', 'ahmad', 0, 850, '09/07/1399'),
(10, '1212', 'sony', 'ahmad', 200, 0, '09/07/1399');

-- --------------------------------------------------------

--
-- Table structure for table `item_expenses`
--

CREATE TABLE `item_expenses` (
  `id` int(11) NOT NULL,
  `code` int(10) NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price1` float NOT NULL,
  `date_sh` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `item_expenses`
--

INSERT INTO `item_expenses` (`id`, `code`, `description`, `amount`, `price1`, `date_sh`, `status`) VALUES
(1, 1, '                                                                                                                                                مصرف نان صبح 3 دانه برگر                                                                                                                                          ', 10, 50, '28/07/1399', 'true'),
(2, 2, 'برداشت روف خان ', 1, 500, '28/06/1399', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `item_store`
--

CREATE TABLE `item_store` (
  `id` int(11) NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `mount` float NOT NULL,
  `buy_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `date` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `item_store`
--

INSERT INTO `item_store` (`id`, `barcode`, `name`, `mount`, `buy_price`, `sell_price`, `date`) VALUES
(12, '2406805', 'camera 3 MP Indoor', 102, 120, 130, '09/07/1399');

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `id` int(11) NOT NULL,
  `licence` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `mac` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`id`, `licence`, `mac`, `status`) VALUES
(1, '121233', 'F0-1F-AF-3A-FE-28', 'used'),
(2, '223345', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `new_company`
--

CREATE TABLE `new_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `date_sh` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `new_company`
--

INSERT INTO `new_company` (`id`, `company_name`, `description`, `phone_number`, `email`, `address`, `date_sh`) VALUES
(4, 'sony', '---', '---', '--', '---', '09/07/1399');

-- --------------------------------------------------------

--
-- Table structure for table `plus_item`
--

CREATE TABLE `plus_item` (
  `id` int(11) NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `mount` float NOT NULL,
  `buy_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `date` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `plus_item`
--

INSERT INTO `plus_item` (`id`, `barcode`, `name`, `mount`, `buy_price`, `sell_price`, `date`) VALUES
(1, '4607006670129', 'evica', 100, 120, 200, '28/06/1399'),
(2, '4607006670129', 'evica', 100, 125, 210, '28/06/1399'),
(3, '4607006670129', 'evica', 1, 100, 200, '28/06/1399'),
(4, '4607006670129', 'evica', 2, 80, 0, '28/06/1399'),
(5, '8699525043948', 'pandev', 100, 120, 140, '28/07/1399'),
(6, '8699525014115', 'motis', 100, 80, 120, '28/06/1399'),
(7, '8904184702328', 'maidprost', 50, 40, 80, '28/06/1399'),
(8, '8699525014115', 'motis', 40, 105, 150, '28/06/1399'),
(9, '8699525014115', 'motis', 1, 100, 0, '28/06/1399'),
(10, '4607006670129', 'evica', 1, 90, 0, '28/06/1400'),
(11, '8699525043948', 'pandev', 50, 150, 180, '28/07/1399'),
(12, '8904030852221', 'dexamethasone', 100, 10, 30, '29/06/1399'),
(13, '6923723120012', 'br reader', 100, 100, 150, '31/06/1399'),
(14, '1212', 'ah', 10, 10, 15, '09/07/1399'),
(15, '23467', 'aa', 100, 120, 150, '09/07/1399'),
(16, '1212', 'ah', 10, 120, 130, '09/07/1399'),
(17, '8904030852221', 'dexamethasone', 50, 40, 60, '09/07/1399'),
(18, '8699525014115', 'motis', 1, 35, 0, '09/07/1399'),
(19, '4545', 'camera 3 MP Indoor', 100, 15, 30, '09/07/1399'),
(20, '2406808', 'Cam 329 HD 4 MP', 100, 50, 51, '09/07/1399'),
(21, '2406808', 'Cam 329 HD 4 MP', 2, 51, 0, '09/07/1399'),
(22, '4545', 'camera 3 MP Indoor', 2, 51, 0, '09/07/1399'),
(23, '2406805', 'camera 3 MP Indoor', 10, 120, 130, '09/07/1399'),
(24, '2406805', 'camera 3 MP Indoor', 2, 130, 0, '09/07/1399'),
(25, '2406805', 'camera 3 MP Indoor', 2, 120, 0, '09/07/1399');

-- --------------------------------------------------------

--
-- Table structure for table `stored_item`
--

CREATE TABLE `stored_item` (
  `id` int(11) NOT NULL,
  `from_detail` text COLLATE utf8mb4_persian_ci NOT NULL,
  `to_detail` text COLLATE utf8mb4_persian_ci NOT NULL,
  `invoice_detail` text COLLATE utf8mb4_persian_ci NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `item_name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `mount` float NOT NULL,
  `sell_price` float NOT NULL,
  `date` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `authority` int(5) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`, `authority`, `image`) VALUES
(12, 'admin', 'YWRtaW4=', 'Doctor', 'Nemat', 100, ''),
(13, 'khwaja', 'cmF3b2YxMjM=', 'khwaja', 'rawof', 50, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_account`
--
ALTER TABLE `company_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_expenses`
--
ALTER TABLE `item_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_store`
--
ALTER TABLE `item_store`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- Indexes for table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_company`
--
ALTER TABLE `new_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plus_item`
--
ALTER TABLE `plus_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stored_item`
--
ALTER TABLE `stored_item`
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
-- AUTO_INCREMENT for table `company_account`
--
ALTER TABLE `company_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item_expenses`
--
ALTER TABLE `item_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item_store`
--
ALTER TABLE `item_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `licence`
--
ALTER TABLE `licence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_company`
--
ALTER TABLE `new_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plus_item`
--
ALTER TABLE `plus_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stored_item`
--
ALTER TABLE `stored_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
