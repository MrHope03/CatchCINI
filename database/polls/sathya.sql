-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 01:19 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
-- Dumping data for table `sathya`
--

INSERT INTO `sathya` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(1, 'SATHYA', 'NARAAYANAA S', 'sathya.naraayanaa.001@gmail.com', 9445446158, 'Who do you think happened in the ending of Interstellar?', 'He never actually got out of the tesseract alive and never got to meet his daughter again', 63, 'He actually got out of the tesseract and reach out to Dr.Brand and they signal to the stations', 96, 'He is the one who created the tesseract in which he caught himself into hence being in a loop.', 188, NULL, NULL, NULL, NULL, NULL, NULL, 3, 347, '2lend3c2', '2021-07-10'),
(2, 'SATHYA', 'NARAAYANAA S', 'sathya.naraayanaa.001@gmail.com', 9445446158, 'All the pixar films take place in one universe.\r\nAgree?', 'Yes', 265, 'No', 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 330, '1k5ptjwl', '2021-07-10'),
(3, 'SATHYA', 'NARAAYANAA S', 'sathya.naraayanaa.001@gmail.com', 9445446158, 'Recent Blockbusters', 'Jagame thandiram', 62, 'KGF', 36, 'Master', 93, NULL, NULL, NULL, NULL, NULL, NULL, 3, 191, '29bnz6l7', '2021-07-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sathya`
--
ALTER TABLE `sathya`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sathya`
--
ALTER TABLE `sathya`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
