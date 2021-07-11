-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 01:18 PM
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
-- Dumping data for table `nitish`
--

INSERT INTO `nitish` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(1, 'NITISH', 'K S', 'nitish@gmail.com', 7200838025, 'Valimai Update?', 'Varuma', 254, 'Varada', 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 339, '2kd428dd', '2021-07-10'),
(2, 'NITISH', 'K S', 'nitish@gmail.com', 7200838025, 'Who would be the villain in the series LOKI?', 'Ravonna Renslayer', 125, 'Kang The conqueror', 69, 'Another Loki itself', 36, NULL, NULL, NULL, NULL, NULL, NULL, 3, 230, '29kk4hwc', '2021-07-10'),
(3, 'NITISH', 'K S', 'nitish@gmail.com', 7200838025, 'Best action movie', 'Jagame thandiram', 92, 'Batman: dark knight', 36, 'Spiderman Homecoming', 36, 'KGF', 32, NULL, NULL, NULL, NULL, 4, 196, '28tnrdud', '2021-07-11');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nitish`
--
ALTER TABLE `nitish`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
