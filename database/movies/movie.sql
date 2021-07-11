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
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `sno` int(10) NOT NULL,
  `movie_name` varchar(30) NOT NULL,
  `year` int(10) NOT NULL,
  `star_rating` decimal(10,2) NOT NULL,
  `total_votes` int(10) NOT NULL,
  `story` longtext NOT NULL,
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
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`sno`, `movie_name`, `year`, `star_rating`, `total_votes`, `story`, `cast_01`, `char_01`, `cast_02`, `char_02`, `cast_03`, `char_03`, `crew_01`, `crew_02`, `crew_03`, `trailer`, `home_poster`, `main_poster`, `movie_ref`) VALUES
(1, 'JAGAME THANDIRAM', 2021, '4.83', 50, 'A nomadic gangster finds himself caught between good and evil in a fight for a place to call home. Starring Dhanush, Aishwarya Lekshmi and James Cosmo.', 'DHANUSH', 'SURULI', 'AISHWARYA', 'ATTILA', 'BABA BHASKAR', 'THEERTHAMALAI', 'KARTHICK SUBBARAJ', 'SANTHOSH NARAYANAN', 'SASHIKANTH', 'https://www.youtube.com/embed/zheMCw4J-jI', 'home-poster/jagame_thandiram.gif', 'main-poster/JT-poster.jpg', '5s5sdeu8'),
(2, 'MASTER', 2020, '4.50', 100, 'JD, an alcoholic professor, is enrolled to teach at a juvenile facility, unbeknownst to him. He soon clashes with a ruthless gangster, who uses the children as scapegoats for his crimes.', 'VIJAY', 'JOHN DURAIRAJ (JB)', 'MALAVIKA', 'CHARU', 'VIJAY SETHUPATHI', 'BHAVANI', 'LOKESH KANAGARAJ', 'ANIRUDH RAVICHANDAR', 'XAVIAR', 'https://www.youtube.com/embed/1_iUFT3nWHk', 'home-poster/master-icon.jpg', 'main-poster/master.jpg', '8rf5ri6l'),
(3, 'KGF CHAPTER 1', 2019, '4.95', 150, 'Rocky, a young man, seeks power and wealth in order to fulfil a promise to his dying mother. His quest takes him to Mumbai, where he gets involved with the notorious gold mafia', 'YASH', 'ROCKY BHAI', 'SHINIDHI SHETTY', 'REENA', 'RAMACHANDRA RAJU', 'GARUDA', 'PRASHANTH NEEL', 'RAVI BASRUR', 'KARTHIK GOWDA', 'https://www.youtube.com/embed/E0aPg9S1OcA', 'home-poster/kgf-chapter-2-icon.jpg', 'main-poster/kgf-chapter-2.jpg', '6ish58dc'),
(4, 'PREMAM', 2015, '4.50', 59, 'While George\'s first love turns out to be a disappointment, Malar, a college lecturer, rekindles his love interest. His romantic journey takes him through several stages, helping him find his purpose.', 'NIVIN PAULY', 'GEORGE DAVID', 'SAI PALLAVI', 'MALAR', 'MADONA SEBASTIAN', 'CELINE GEORGE', 'ALPHONSE PUTHREN', 'RAJESH MURUGESAN', 'ANWAR RASHEED', 'https://www.youtube.com/embed/pbgvTikmIMk', 'home-poster/premam-icon.jpg', 'main-poster/premam-long.jpg', '4j58ikfg'),
(5, 'BATMAN: DARK KNIGHT', 2008, '4.00', 269, 'After Gordon, Dent and Batman begin an assault on Gotham\'s organised crime, the mobs hire the Joker, a psychopathic criminal mastermind who offers to kill Batman and bring the city to its knees.', 'CHRISTIAN BALE', 'BRUCE WAYNE', 'HEATH LEDGER', 'JOKER', 'AARON ECKHART', 'HARVEY DENT', 'CHRISTOPHER NOLAN', 'DAVID S. GOYER', 'EMMA THOMAS', 'https://www.youtube.com/embed/_PZpmTj1Q8Q', 'home-poster/batman-icon.jpg', 'main-poster/dark-knight-joker-batman.jpg', '8ujj558y'),
(6, 'SPIDERMAN HOMECOMING', 2017, '3.50', 526, 'Peter Parker tries to stop the Vulture from selling weapons made with advanced Chitauri technology while trying to balance his life as an ordinary high school student.', 'TOM HOLLAND', 'PETER PARKER', 'MICHEAL KEATON', 'ADRIAN TOOMES', 'ROBERT DOWNEY', 'TONY STARK', 'JON WATTS', 'MICHEAL GIACCHINO', 'KEVIN FEIGE', 'https://www.youtube.com/embed/U0D3AOldjMU', 'home-poster/spidey-icon.jpg', 'main-poster/spidey-wide.jpg', '1fh8p0dh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ref` (`movie_ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
