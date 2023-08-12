-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 08:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dormdiscover`
--

-- --------------------------------------------------------

--
-- Table structure for table `arearnc`
--

CREATE TABLE `arearnc` (
  `areaId` int(10) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `areaCode` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arearnc`
--

INSERT INTO `arearnc` (`areaId`, `area_name`, `areaCode`) VALUES
(1, 'Harmu', NULL),
(2, 'Argora', NULL),
(3, 'Lalpur', NULL),
(4, 'Katatoli', NULL),
(5, 'Ratu', NULL),
(6, 'Simaliya', NULL),
(7, 'Kathal More', NULL),
(88, 'ormanjhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `comment_desc` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_desc`, `user_id`, `room_id`, `time_stamp`) VALUES
(1, 'very Good House', 1, 1, '2023-07-27 03:23:21'),
(2, 'fjshgvds', 1, 1, '2023-07-27 03:23:41'),
(45, 'jhdgjhv', 2, 1, '2023-07-27 08:00:17'),
(46, 'Very Good', 1, 2, '2023-07-28 07:42:54'),
(47, 'sssasas', 1, 2, '2023-07-28 07:44:21'),
(48, 'sssasas', 1, 2, '2023-07-28 07:45:38'),
(49, 'hjfbfdf', 1, 2, '2023-07-28 07:45:48'),
(50, 'hjfbfdf', 1, 2, '2023-07-28 07:45:55'),
(58, 'bukjhjkhljk', 1, 1, '2023-07-29 09:39:33'),
(59, 'sass', 1, 1, '2023-07-29 11:27:40'),
(60, 'sass', 1, 1, '2023-07-29 11:28:34'),
(61, 'sass', 1, 1, '2023-07-29 11:28:40'),
(62, 'Goof', 1, 1, '2023-07-29 11:29:54'),
(63, 'sasa', 1, 1, '2023-07-29 11:32:02'),
(68, 'dhshdhl', 1, 8, '2023-07-30 08:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `confirmbooking`
--

CREATE TABLE `confirmbooking` (
  `Booking_id` int(11) NOT NULL,
  `tenant_name` varchar(50) NOT NULL,
  `tenant_contact` int(11) NOT NULL,
  `room_address` text NOT NULL,
  `room_price` int(11) NOT NULL,
  `host_id` int(11) NOT NULL,
  `tenant_user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `fav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fav_id`, `user_id`, `room_id`) VALUES
(9, 2, 1),
(10, 2, 2),
(11, 2, 8),
(32, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `areaId` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `singleRoom` varchar(5) NOT NULL,
  `attach_bathroom` varchar(5) NOT NULL,
  `room_available` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `address`, `areaId`, `price`, `user_id`, `singleRoom`, `attach_bathroom`, `room_available`) VALUES
(1, 'Haji Hussaini Chowk', 1, 700, 1, 'true', 'true', 'true'),
(2, 'Haji Hussaini Chowk', 1, 700, 2, 'false', 'false', 'true'),
(3, 'Ashok Nagar', 2, 800, 3, 'true', 'false', 'false'),
(4, 'Haji Hussaini Chowk 2', 1, 900, 3, 'true', 'true', 'true'),
(5, 'Haji Hussaini Chowk 3', 1, 750, 3, 'false', 'false', 'false'),
(6, 'Haji Hussaini Chowk 4', 1, 763, 2, 'true', 'true', 'false'),
(7, 'Haji Hussaini Chowk 5', 1, 890, 2, 'false', 'false', 'false'),
(8, 'Haji Hussaini Chowk 6', 1, 787, 3, 'false', 'true', 'true'),
(9, 'kishore ganj', 3, 900, 5, 'false', 'false', 'true'),
(10, 'katatoli', 4, 800, 1, 'true', 'false', 'true'),
(15, 'Ashok Nagar', 2, 930, 2, 'false', 'false', 'false'),
(21, 'Circular Road', 3, 1234, 2, 'false', 'false', 'true'),
(22, 'Circular Road Nucleus Mall', 3, 544, 1, 'true', 'false', 'true'),
(25, 'Ashok Nagar Rd No 3', 2, 7896, 1, 'true', 'false', 'true'),
(26, 'Circular Road Road No 5', 3, 1212, 1, 'true', 'false', 'true'),
(27, 'Circular Road Road No 5 SBI', 2, 50020, 1, 'true', 'false', 'true'),
(28, 'Kadru', 2, 5454, 3, 'true', 'false', 'false'),
(29, 'Bahu Bazar', 4, 5466, 3, 'true', 'false', 'true'),
(30, 'Bhatta Mohalla', 1, 7895, 1, 'true', 'false', 'true'),
(31, 'bardawan compound', 3, 4000, 1, 'false', 'false', 'true'),
(32, '46674', 4, 700, 1, 'true', 'false', 'true'),
(33, 'ranchi', 1, 800, 1, 'true', 'false', 'true'),
(34, 'Haji Chowk', 5, 3000, 1, 'false', 'true', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `contact`, `username`, `password`) VALUES
(1, 'aman', '8789926600', 'aman12', '1234'),
(2, 'Raj Kumar', '87965', 'raj123', '1234'),
(3, 'aman', '9656', 'aman09', '1234'),
(5, 'aman', '1234', 'mdamanansari702@gmail.com', '789'),
(8, 'rahul', '23456', 'rahul456', '123'),
(9, 'aman', '1234', 'aman', '1234'),
(10, 'aman', '1234', 'aman789', '123'),
(11, 'aman', '1234', 'mdamanansari702@gmail.com56', '12345'),
(12, 'aman', '1234', 'mdamanansari702@gmail', '789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arearnc`
--
ALTER TABLE `arearnc`
  ADD PRIMARY KEY (`areaId`),
  ADD UNIQUE KEY `area_name` (`area_name`);
ALTER TABLE `arearnc` ADD FULLTEXT KEY `area_name_2` (`area_name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `confirmbooking`
--
ALTER TABLE `confirmbooking`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);
ALTER TABLE `rooms` ADD FULLTEXT KEY `address` (`address`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arearnc`
--
ALTER TABLE `arearnc`
  MODIFY `areaId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `confirmbooking`
--
ALTER TABLE `confirmbooking`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
