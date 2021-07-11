-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 01:40 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `sno` int(10) NOT NULL,
  `movie_ref` varchar(20) NOT NULL,
  `root` mediumtext DEFAULT NULL,
  `replies` longtext DEFAULT NULL,
  `replies_user` text DEFAULT NULL,
  `total_replies` int(10) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `star_rating` int(10) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `com_ref` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `comments`
--
DELIMITER $$
CREATE TRIGGER `upd` AFTER INSERT ON `comments` FOR EACH ROW UPDATE movie SET `star_rating` = (`star_rating`*`total_votes` + NEW.star_rating)/(`total_votes` + 1), `total_votes` = `total_votes` + 1 where `movie_ref`=NEW.movie_ref
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `com_ref` (`com_ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
