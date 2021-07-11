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
-- Table structure for table `popcorncrunchers`
--

CREATE TABLE `popcorncrunchers` (
  `sno` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'Hacky',
  `last_name` varchar(50) NOT NULL DEFAULT 'Boyz',
  `mail` varchar(50) NOT NULL DEFAULT 'popcorncrunchers@gmail.com',
  `phone_no` bigint(20) NOT NULL DEFAULT 9734093368,
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
-- Dumping data for table `popcorncrunchers`
--

INSERT INTO `popcorncrunchers` (`sno`, `first_name`, `last_name`, `mail`, `phone_no`, `question`, `option_1`, `count_1`, `option_2`, `count_2`, `option_3`, `count_3`, `option_4`, `count_4`, `option_5`, `count_5`, `option_6`, `count_6`, `total_options`, `total_count`, `ref`, `reg_date`) VALUES
(1, 'Hacky', 'Boyz', 'popcorncrunchers@gmail.com', 9734093368, 'Created your first poll??', 'YES', 85, 'NO... Gonna Create One Soon', 115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 200, '25sd3spd', '2021-07-10'),
(2, 'Hacky', 'Boyz', 'popcorncrunchers@gmail.com', 9734093368, 'Have You Watched these recent Movies/Series?', 'Jagame Thandiram', 84, 'Loki', 92, 'Haseen Dillruba', 45, 'Army of the dead', 152, 'A Quiet Place II', 65, NULL, NULL, 5, 438, '2mpfwf3e', '2021-07-10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
