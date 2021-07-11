-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 04:46 PM
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
CREATE DATABASE IF NOT EXISTS `catchcini` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catchcini`;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
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
-- Triggers `polls`
--
DELIMITER $$
CREATE TRIGGER `polls_update` AFTER UPDATE ON `polls` FOR EACH ROW BEGIN

UPDATE `nitish` SET `question` = NEW.question, `option_1` = NEW.option_1, `count_1` = NEW.count_1, `option_2` = NEW.option_2, `count_2` = NEW.count_2,`option_3` = NEW.option_3, `count_3` = NEW.count_3,`option_4` = NEW.option_4, `count_4` = NEW.count_4,`option_5` = NEW.option_5, `count_5` = NEW.count_5,`option_6` = NEW.option_6, `count_6` = NEW.count_6, `total_options` = NEW.total_options, `total_count` = NEW.total_count, `ref` = NEW.ref 
WHERE `ref` = OLD.ref;
UPDATE `sathya` SET `question` = NEW.question, `option_1` = NEW.option_1, `count_1` = NEW.count_1, `option_2` = NEW.option_2, `count_2` = NEW.count_2,`option_3` = NEW.option_3, `count_3` = NEW.count_3,`option_4` = NEW.option_4, `count_4` = NEW.count_4,`option_5` = NEW.option_5, `count_5` = NEW.count_5,`option_6` = NEW.option_6, `count_6` = NEW.count_6, `total_options` = NEW.total_options, `total_count` = NEW.total_count, `ref` = NEW.ref
WHERE `ref` = OLD.ref;

UPDATE `saikumarran` SET `question` = NEW.question, `option_1` = NEW.option_1, `count_1` = NEW.count_1, `option_2` = NEW.option_2, `count_2` = NEW.count_2,`option_3` = NEW.option_3, `count_3` = NEW.count_3,`option_4` = NEW.option_4, `count_4` = NEW.count_4,`option_5` = NEW.option_5, `count_5` = NEW.count_5,`option_6` = NEW.option_6, `count_6` = NEW.count_6, `total_options` = NEW.total_options, `total_count` = NEW.total_count, `ref` = NEW.ref
WHERE `ref` = OLD.ref;

UPDATE `popcorncrunchers` SET `question` = NEW.question, `option_1` = NEW.option_1, `count_1` = NEW.count_1, `option_2` = NEW.option_2, `count_2` = NEW.count_2,`option_3` = NEW.option_3, `count_3` = NEW.count_3,`option_4` = NEW.option_4, `count_4` = NEW.count_4,`option_5` = NEW.option_5, `count_5` = NEW.count_5,`option_6` = NEW.option_6, `count_6` = NEW.count_6, `total_options` = NEW.total_options, `total_count` = NEW.total_count, `ref` = NEW.ref
WHERE `ref` = OLD.ref;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
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
-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `sno` int(10) NOT NULL,
  `movie_name` varchar(30) NOT NULL,
  `year` int(10) NOT NULL,
  `star_rating` decimal(10,2) NOT NULL,
  `total_votes` int(10) NOT NULL,
  `story` varchar(1000) NOT NULL,
  `cast_01` varchar(30) NOT NULL,
  `char_01` varchar(30) NOT NULL,
  `cast_02` varchar(30) NOT NULL,
  `char_02` varchar(30) NOT NULL,
  `cast_03` varchar(30) NOT NULL,
  `char_03` varchar(30) NOT NULL,
  `crew_01` varchar(30) NOT NULL,
  `crew_02` varchar(30) NOT NULL,
  `crew_03` varchar(30) NOT NULL,
  `trailer` varchar(500) NOT NULL,
  `home_poster` varchar(500) NOT NULL,
  `main_poster` varchar(500) NOT NULL,
  `movie_ref` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`movie_ref`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
