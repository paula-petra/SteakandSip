-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 05:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steakrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `no_ofGuests` varchar(50) NOT NULL,
  `occasion` varchar(100) NOT NULL,
  `special_requests` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com', 'Nice Food', 'The food was tasty!'),
(2, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com', 'Nice Food', 'The food was tasty!'),
(3, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com', 'Nice Food', 'The food was tasty!'),
(4, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com', 'Nice Food', 'The food was tasty!');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `fullName`, `email`) VALUES
(8, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(9, 'Paula2', 'paulapetra'),
(11, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(12, '', ''),
(13, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(14, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(15, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(16, 'gyu y9o', 'j iyoi i'),
(17, 'Paula', 'paulapetra444i@gmail.com'),
(18, 'ppp', 'paulapetra111i@gmail.com'),
(19, 'Paula2', 'paulapetra'),
(20, 'Paula2', 'paulapetra'),
(21, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(22, 'Paula2', 'paulapetrai@gmail.com'),
(23, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(24, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(25, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(26, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(27, 'Paula-Petra Ikechukwu', 'paulapetrai@gmail.com'),
(28, 'Paula', 'paulapetra444i@gmail.com'),
(29, ';lkmgp', 'j iyoi i');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phoneNo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
