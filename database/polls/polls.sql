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
(1, 'Popcorncrunchers', 9734093368, 'Created your first poll??', 'YES', 85, 'NO... Gonna Create One Soon', 115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 200, '25sd3spd', '2021-07-10'),
(2, 'Popcorncrunchers', 9734093368, 'Have You Watched these recent Movies/Series?', 'Jagame Thandiram', 84, 'Loki', 92, 'Haseen Dillruba', 45, 'Army of the dead', 152, 'A Quiet Place II', 65, NULL, NULL, 5, 438, '2mpfwf3e', '2021-07-10'),
(3, 'nitish', 7200838025, 'Valimai Update?', 'Varuma', 254, 'Varada', 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 339, '2kd428dd', '2021-07-10'),
(4, 'nitish', 7200838025, 'Who would be the villain in the series LOKI?', 'Ravonna Renslayer', 125, 'Kang The conqueror', 69, 'Another Loki itself', 36, NULL, NULL, NULL, NULL, NULL, NULL, 3, 230, '29kk4hwc', '2021-07-10'),
(5, 'saikumarran', 7639662657, 'Who is your favorite D&D member in the stranger things?', 'Eleven', 65, 'Will Byers', 32, 'Mike Wheeler', 85, 'Lucas Sinclair', 95, 'Max', 127, 'Dustin Henderson', 27, 6, 431, '2ixaict7', '2021-07-10'),
(6, 'saikumarran', 7639662657, 'Who is your favorite duo in Stranger things?', 'Steve & Dustin', 69, 'Robin & Steve', 96, 'Max & Eleven', 52, 'Max & Mike', 36, NULL, NULL, NULL, NULL, 4, 253, '1q4z99ih', '2021-07-10'),
(7, 'sathya', 9445446158, 'Who do you think happened in the ending of Interstellar?', 'He never actually got out of the tesseract alive and never got to meet his daughter again', 63, 'He actually got out of the tesseract and reach out to Dr.Brand and they signal to the stations', 96, 'He is the one who created the tesseract in which he caught himself into hence being in a loop.', 188, NULL, NULL, NULL, NULL, NULL, NULL, 3, 347, '2lend3c2', '2021-07-10'),
(9, 'sathya', 9445446158, 'All the pixar films take place in one universe.\r\nAgree?', 'Yes', 265, 'No', 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 330, '1k5ptjwl', '2021-07-10'),
(10, 'sathya', 9445446158, 'Recent Blockbusters', 'Jagame thandiram', 62, 'KGF', 36, 'Master', 93, NULL, NULL, NULL, NULL, NULL, NULL, 3, 191, '29bnz6l7', '2021-07-11'),
(11, 'nitish', 7200838025, 'Best action movie', 'Jagame thandiram', 92, 'Batman: dark knight', 36, 'Spiderman Homecoming', 36, 'KGF', 32, NULL, NULL, NULL, NULL, 4, 196, '28tnrdud', '2021-07-11'),
(12, 'saikumarran', 7639662657, 'A must watch movie', 'Jagame thandiram', 36, 'Batman: dark knight', 63, 'Spiderman Homecoming', 126, 'KGF', 196, 'Master', 85, 'Premam', 165, 6, 671, '1kcmmdyv', '2021-07-11');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `question` (`question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
