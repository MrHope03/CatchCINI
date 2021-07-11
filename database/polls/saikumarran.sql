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
-- Dumping data for table `saikumarran`
--

INSERT INTO `saikumarran` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(1, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'Who is your favorite D&D member in the stranger things?', 'Eleven', 65, 'Will Byers', 32, 'Mike Wheeler', 85, 'Lucas Sinclair', 95, 'Max', 127, 'Dustin Henderson', 27, 6, 431, '2ixaict7', '2021-07-10'),
(2, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'Who is your favorite duo in Stranger things?', 'Steve & Dustin', 69, 'Robin & Steve', 96, 'Max & Eleven', 52, 'Max & Mike', 36, NULL, NULL, NULL, NULL, 4, 253, '1q4z99ih', '2021-07-10'),
(3, 'SAIKUMARRAN', 'S K', 'saikumarran@gmail.com', 7639662657, 'A must watch movie', 'Jagame thandiram', 36, 'Batman: dark knight', 63, 'Spiderman Homecoming', 126, 'KGF', 196, 'Master', 85, 'Premam', 165, 6, 671, '1kcmmdyv', '2021-07-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saikumarran`
--
ALTER TABLE `saikumarran`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saikumarran`
--
ALTER TABLE `saikumarran`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
