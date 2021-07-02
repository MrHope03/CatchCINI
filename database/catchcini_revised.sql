-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 05:38 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catchcini`
--

-- --------------------------------------------------------

--
-- Table structure for table `nitish`
--

CREATE TABLE `nitish` (
  `sno` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'NITISH',
  `last_name` varchar(50) NOT NULL DEFAULT 'K S',
  `mail` varchar(50) NOT NULL DEFAULT 'nitish@gmail.com',
  `phone_no` bigint(20) NOT NULL DEFAULT 7200838025,
  `question` varchar(200) DEFAULT NULL,
  `option_1` varchar(100) DEFAULT NULL,
  `count_1` varchar(100) DEFAULT NULL,
  `option_2` varchar(100) DEFAULT NULL,
  `count_2` varchar(100) DEFAULT NULL,
  `option_3` varchar(100) DEFAULT NULL,
  `count_3` varchar(100) DEFAULT NULL,
  `option_4` varchar(100) DEFAULT NULL,
  `count_4` varchar(100) DEFAULT NULL,
  `option_5` varchar(100) DEFAULT NULL,
  `count_5` varchar(100) DEFAULT NULL,
  `option_6` varchar(100) DEFAULT NULL,
  `count_6` varchar(100) DEFAULT NULL,
  `total_options` int(10) NOT NULL,
  `total_count` int(10) DEFAULT NULL,
  `ref` varchar(20) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nitish`
--

INSERT INTO `nitish` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(14, 'NITISH', 'K S', 'nitish@gmail.com', 7200838025, 'Sample Question 04', 'a', '20', 'b', '16', 'c', '24', 'd', '30', 'e', '8', 'f', '2', 6, 100, '2bghvleu', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `sno` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `option_1` varchar(100) DEFAULT NULL,
  `count_1` int(10) DEFAULT NULL,
  `option_2` varchar(100) DEFAULT NULL,
  `count_2` int(10) DEFAULT NULL,
  `option_3` varchar(100) DEFAULT NULL,
  `count_3` int(10) DEFAULT NULL,
  `option_4` varchar(100) DEFAULT NULL,
  `count_4` int(10) DEFAULT NULL,
  `option_5` varchar(100) DEFAULT NULL,
  `count_5` int(10) DEFAULT NULL,
  `option_6` varchar(100) DEFAULT NULL,
  `count_6` int(10) DEFAULT NULL,
  `total_options` int(10) NOT NULL,
  `total_count` int(10) DEFAULT NULL,
  `ref` varchar(20) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`sno`, `username`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(7, 'test', 9876543210, 'Sample question 01', 'a', 15, 'b', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 22, '2e6i7ck0', '2021-06-30'),
(8, 'sathya', 9445446158, 'Sample Question 02', 'a', 8, 'b', 15, 'c', 20, 'd', 7, NULL, NULL, NULL, NULL, 4, 50, '1ipakhdr', '2021-06-30'),
(10, 'nitish', 7200838025, 'Sample Question 04', 'a', 20, 'b', 16, 'c', 24, 'd', 30, 'e', 8, 'f', 2, 6, 100, '2bghvleu', '2021-06-30'),
(13, 'saikumarran', 7639662657, 'Who is your fav Loki character?', 'Loki', NULL, 'Mobius', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2bpv8mxi', '2021-07-01'),
(14, 'saikumarran', 7639662657, 'Who is your Loki', 'Thor', NULL, 'Iron Man', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '1w9ww5ko', '2021-07-01'),
(15, 'saikumarran', 7639662657, 'Who is your naruto', 'Naruto', NULL, 'Sasuke', NULL, 'Jiraiya', NULL, 'Itachi', NULL, 'Pain', NULL, 'Hashirama', NULL, 6, NULL, '1to0pob5', '2021-07-01'),
(16, 'saikumarran', 7639662657, 'Hola there', 'Hola amigo', NULL, 'hola senorita', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2a702p68', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `saikumarran`
--

CREATE TABLE `saikumarran` (
  `sno` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'SAIKUMARRAN',
  `last_name` varchar(50) NOT NULL DEFAULT 'S K',
  `mail` varchar(50) NOT NULL DEFAULT 'saikumarran@gmail.com',
  `phone_no` bigint(20) NOT NULL DEFAULT 7639662657,
  `question` varchar(200) DEFAULT NULL,
  `option_1` varchar(100) DEFAULT NULL,
  `count_1` varchar(100) DEFAULT NULL,
  `option_2` varchar(100) DEFAULT NULL,
  `count_2` varchar(100) DEFAULT NULL,
  `option_3` varchar(100) DEFAULT NULL,
  `count_3` varchar(100) DEFAULT NULL,
  `option_4` varchar(100) DEFAULT NULL,
  `count_4` varchar(100) DEFAULT NULL,
  `option_5` varchar(100) DEFAULT NULL,
  `count_5` varchar(100) DEFAULT NULL,
  `option_6` varchar(100) DEFAULT NULL,
  `count_6` varchar(100) DEFAULT NULL,
  `total_options` int(10) NOT NULL,
  `total_count` int(10) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saikumarran`
--

INSERT INTO `saikumarran` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(4, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'Who is your fav Loki character?', 'Loki', NULL, 'Mobius', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2bpv8mxi', '2021-07-01'),
(2521, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'Who is your Loki', 'Thor', NULL, 'Iron Man', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '1w9ww5ko', '2021-07-01'),
(2522, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'Who is your naruto', 'Naruto', NULL, 'Sasuke', NULL, 'Jiraiya', NULL, 'Itachi', NULL, 'Pain', NULL, 'Hashirama', NULL, 6, 0, '1to0pob5', '2021-07-01'),
(2523, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'Hello there!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '21inic8v', '2021-07-01'),
(2524, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'Hola there', 'Hola amigo', NULL, 'hola senorita', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2a702p68', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `sathya`
--

CREATE TABLE `sathya` (
  `sno` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'SATHYA',
  `last_name` varchar(50) NOT NULL DEFAULT 'NARAAYANAA S',
  `mail` varchar(50) NOT NULL DEFAULT 'sathya.naraayanaa.001@gmail.com',
  `phone_no` bigint(20) NOT NULL DEFAULT 9445446158,
  `question` varchar(200) DEFAULT NULL,
  `option_1` varchar(100) DEFAULT NULL,
  `count_1` int(10) DEFAULT NULL,
  `option_2` varchar(100) DEFAULT NULL,
  `count_b` int(10) DEFAULT NULL,
  `option_3` varchar(100) DEFAULT NULL,
  `count_3` varchar(100) DEFAULT NULL,
  `option_4` varchar(100) DEFAULT NULL,
  `count_4` varchar(100) DEFAULT NULL,
  `option_5` varchar(100) DEFAULT NULL,
  `count_5` varchar(100) DEFAULT NULL,
  `option_6` varchar(100) DEFAULT NULL,
  `count_6` varchar(100) DEFAULT NULL,
  `total_options` int(10) NOT NULL,
  `total_count` int(10) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sathya`
--

INSERT INTO `sathya` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_b`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(1, 'SATHYA', 'NARAAYANAA S', 'sathya.naraayanaa.001@gmail.com', 9445446158, 'Sample Question 02', 'a', 8, 'b', 15, 'c', '20', 'd', '7', NULL, NULL, NULL, NULL, 4, 50, '1ipakhdr', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `sno` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'TEST',
  `last_name` varchar(50) NOT NULL DEFAULT 'CHECK CHECK',
  `mail` varchar(50) NOT NULL DEFAULT 'test123@gmail.com',
  `phone_no` bigint(20) NOT NULL DEFAULT 9876543210,
  `question` varchar(200) DEFAULT NULL,
  `option_1` varchar(100) DEFAULT NULL,
  `count_1` int(10) DEFAULT NULL,
  `option_2` varchar(100) DEFAULT NULL,
  `count_2` int(10) DEFAULT NULL,
  `option_3` varchar(100) DEFAULT NULL,
  `count_3` int(10) DEFAULT NULL,
  `option_4` varchar(100) DEFAULT NULL,
  `count_4` int(10) DEFAULT NULL,
  `option_5` varchar(100) DEFAULT NULL,
  `count_5` int(10) DEFAULT NULL,
  `option_6` varchar(100) DEFAULT NULL,
  `count_6` int(10) DEFAULT NULL,
  `total_options` int(10) NOT NULL,
  `total_count` int(10) DEFAULT NULL,
  `ref` varchar(20) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(8, 'TEST', 'CHECK CHECK', 'test123@gmail.com', 9876543210, 'sample question 01', 'a', 15, 'b', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 22, '2e6i7ck0', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `mail`, `username`, `phone_no`, `password`, `reg_date`) VALUES
(1, 'SATHYA', 'NARAAYANAA S', 'sathya.naraayanaa.001@gmail.com', 'sathya', 9445446158, 'sathya123', '2021-06-27'),
(4, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 'saikumarran', 7639662657, 'sai', '2021-06-29'),
(5, 'NITISH', 'K S', 'nitish@gmail.com', 'nitish', 7200838025, 'nitish123', '2021-06-29'),
(7, 'TEST', 'CHECK CHECK', 'test123@gmail.com', 'test', 9876543210, 'test123', '2021-06-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nitish`
--
ALTER TABLE `nitish`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `saikumarran`
--
ALTER TABLE `saikumarran`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `sathya`
--
ALTER TABLE `sathya`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nitish`
--
ALTER TABLE `nitish`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `saikumarran`
--
ALTER TABLE `saikumarran`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2525;

--
-- AUTO_INCREMENT for table `sathya`
--
ALTER TABLE `sathya`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
