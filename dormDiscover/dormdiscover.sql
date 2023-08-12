-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 09:07 AM
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
  `room_id` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_desc`, `user_id`, `room_id`, `time_stamp`) VALUES
(72, 'ddddd', 1, 'EpicOa8v', '2023-08-09 09:56:42'),
(73, 'as', 1, 'QRl4pRDc', '2023-08-09 10:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `confirmbooking`
--

CREATE TABLE `confirmbooking` (
  `Booking_id` int(11) NOT NULL,
  `tenant_user_id` int(11) NOT NULL,
  `tenant_name` varchar(50) NOT NULL,
  `tenant_contact` int(11) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `room_address` text NOT NULL,
  `room_price` int(11) NOT NULL,
  `host_id` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `fav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` varchar(50) NOT NULL,
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
('EpicOa8v', 'Haji Hussaini Chowk', 1, 5000, 1, 'true', 'false', 'true'),
('QRl4pRDc', 'Bypass Road', 1, 3000, 1, 'true', 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `contact`, `username`, `password`) VALUES
(15, 'Aman Ansari', '8877225568', 'aman12', '$2y$10$D4inyuYsTcgT3AF8Fl.zGecCQvI1qQsRhTo.KFpWTuH7US/48NEkW');

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
ALTER TABLE `arearnc` ADD FULLTEXT KEY `area_name_3` (`area_name`);

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
ALTER TABLE `rooms` ADD FULLTEXT KEY `address_2` (`address`);

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
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `confirmbooking`
--
ALTER TABLE `confirmbooking`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
