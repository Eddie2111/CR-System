-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 08:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crs`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `invoice` int(12) NOT NULL,
  `reason` varchar(120) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `name`, `email`, `invoice`, `reason`, `message`) VALUES
(1, 'test1', 'test4@testmail.com', 2147483647, 'test 1', 'test'),
(2, 'Mohammad Siam', 'test4@testmail.com', 2147483647, 'tello', 'hello 101'),
(3, 'tast name1', 'test2@testmail.com', 1321312312, 'Beer', 'Hello, I would like to purchase some of your finest beer please');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `nid` int(15) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `license_number` varchar(12) NOT NULL,
  `billing_address` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`nid`, `name`, `phone`, `email`, `gender`, `license_number`, `billing_address`, `password`) VALUES
(5465668, 'Mohammad Siam', '01754626262', 'mohammadsiam205@gmail.com', 'Male', '1215485', 'basabo', '123456'),
(12345687, 'test name', '01754578260', 'test.deploy@online.com', 'male', '1234567', 'abc/123', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@crs.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `res_id` int(100) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_method` text NOT NULL,
  `overtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`res_id`, `total_amount`, `payment_method`, `overtime`) VALUES
(546566810, 87000, 'cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(100) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `timeframe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `reg_no`, `nid`, `start_date`, `timeframe`) VALUES
(546566810, 10, 5465668, '2022-01-10', 29);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `reg_no` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `insurance` int(11) NOT NULL,
  `rent` int(100) NOT NULL,
  `state` text NOT NULL,
  `model` text NOT NULL,
  `year` varchar(4) NOT NULL,
  `colour` varchar(30) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext DEFAULT NULL,
  `res_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`reg_no`, `vehicle_id`, `mileage`, `insurance`, `rent`, `state`, `model`, `year`, `colour`, `fuel_type`, `description`, `image`, `res_id`) VALUES
(10, 56, 60000, 1500, 3000, 'Perfectly Functional', 'Toyota Camry', '2019', 'White', 'Octane', 'Great car for a long drive', 'uploads/1641481170.jpeg', 546566810),
(11, 57, 56000, 1000, 2000, 'Perfectly Functional', 'Toyota Axio', '2015', 'White', 'Octane', 'Great car to drive in Dhaka', 'uploads/1641482212.jpeg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`nid`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `license_number` (`license_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`reg_no`),
  ADD UNIQUE KEY `vehicle_id` (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
