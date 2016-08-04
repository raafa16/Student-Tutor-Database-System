-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2014 at 03:42 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tuition`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
`ID` int(10) NOT NULL,
  `User_ID_ST` int(10) NOT NULL,
  `User_ID_T` int(10) NOT NULL,
  `Date` date NOT NULL,
  `q1_yes_no` enum('Yes','No') CHARACTER SET utf8 NOT NULL,
  `q2_yes_no` enum('Yes','No') CHARACTER SET utf8 NOT NULL,
  `q3_yes_no` enum('Yes','No') CHARACTER SET utf8 NOT NULL,
  `q4_yes_no` enum('Yes','No') NOT NULL,
  `Comments` text NOT NULL,
  `Rating` int(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`ID`, `User_ID_ST`, `User_ID_T`, `Date`, `q1_yes_no`, `q2_yes_no`, `q3_yes_no`, `q4_yes_no`, `Comments`, `Rating`) VALUES
(1, 1, 1, '2014-12-11', 'Yes', 'No', 'Yes', 'No', 'v', 3),
(2, 2, 1, '2014-12-11', 'No', 'No', 'No', 'No', 'why why why', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID_ST` (`User_ID_ST`), ADD KEY `User_ID_T` (`User_ID_T`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`User_ID_ST`) REFERENCES `student` (`User_ID`),
ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`User_ID_T`) REFERENCES `teacher` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
