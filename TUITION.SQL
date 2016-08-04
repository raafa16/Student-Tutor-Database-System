-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2014 at 03:46 PM
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
-- Table structure for table `degree`
--

CREATE TABLE IF NOT EXISTS `degree` (
`ID` int(10) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `Degree_name` varchar(100) NOT NULL,
  `Pass_year` int(10) NOT NULL,
  `Institution` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`ID`, `User_ID`, `Degree_name`, `Pass_year`, `Institution`) VALUES
(1, 1, 'Undergraduate', 1992, 'IBA'),
(2, 1, 'Graduate', 1996, 'NSU'),
(3, 2, 'Undergraduate', 1996, 'IBA'),
(4, 3, 'Masters', 1998, 'DU');

-- --------------------------------------------------------

--
-- Table structure for table `region_covered_teacher`
--

CREATE TABLE IF NOT EXISTS `region_covered_teacher` (
`ID` int(10) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `Regions` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `region_covered_teacher`
--

INSERT INTO `region_covered_teacher` (`ID`, `User_ID`, `Regions`) VALUES
(1, 1, 'Dhanmondi'),
(2, 1, 'Farmgate'),
(3, 1, 'Mohammadpur'),
(4, 2, 'Dhanmondi'),
(5, 2, 'Farmgate'),
(6, 2, 'Mohammadpur'),
(7, 3, 'Dhanmondi');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`User_ID` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `Gender` enum('F','M') NOT NULL,
  `Birthdate` date NOT NULL,
  `Age` int(10) NOT NULL,
  `Phone_number` varchar(50) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Curriculum` varchar(100) NOT NULL,
  `Days_per_week` int(10) NOT NULL,
  `Salary_per_subject` double(10,2) NOT NULL,
  `Salary_type` enum('monthly','daily') NOT NULL,
  `School_name` varchar(100) NOT NULL,
  `Class` varchar(100) NOT NULL,
  `Preferred_gender` enum('F','M') NOT NULL,
  `Preferred_institution` varchar(100) NOT NULL,
  `About` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`User_ID`, `Username`, `First_name`, `Last_name`, `Gender`, `Birthdate`, `Age`, `Phone_number`, `Region`, `Address`, `Curriculum`, `Days_per_week`, `Salary_per_subject`, `Salary_type`, `School_name`, `Class`, `Preferred_gender`, `Preferred_institution`, `About`) VALUES
(1, 'a', 'a', 'a', 'M', '2014-12-24', 3, '3', 'Dhanmondi', 'a', 'Cambridge', 4, 4.00, 'daily', 'a', 'Class six', 'F', 'AIUB', 'a'),
(2, 't', 't', 't', 'M', '2014-12-04', 21, '01670135748', 'Lalmatia', 't', 'Edexcel', 6, 6.00, 'daily', 't', 'A-level', 'F', 'NSU', 't');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `User_ID`, `Type`) VALUES
(1, 1, 'Physics'),
(2, 1, 'Chemistry'),
(3, 1, 'Math'),
(4, 1, 'Biology'),
(5, 1, 'Science'),
(6, 1, 'Economics'),
(7, 1, 'Accounting'),
(8, 2, 'Math'),
(9, 2, 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
`ID` int(10) NOT NULL,
  `User_ID_ST` int(10) NOT NULL,
  `User_ID_T` int(10) NOT NULL,
  `Date` date NOT NULL,
  `q1_yes` int(100) NOT NULL,
  `q1_no` int(100) NOT NULL,
  `q2_yes` int(100) NOT NULL,
  `q2_no` int(100) NOT NULL,
  `q3_yes` int(100) NOT NULL,
  `q3_no` int(100) NOT NULL,
  `Rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`User_ID` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `Gender` enum('F','M') NOT NULL,
  `Birthdate` date NOT NULL,
  `Age` int(10) NOT NULL,
  `Phone_number` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Curriculum` varchar(100) NOT NULL,
  `Days_per_week` int(10) NOT NULL,
  `Salary_per_subject` double(10,2) NOT NULL,
  `Salary_type` enum('daily','monthly') NOT NULL,
  `About` text,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`User_ID`, `Username`, `First_name`, `Last_name`, `Gender`, `Birthdate`, `Age`, `Phone_number`, `Address`, `Curriculum`, `Days_per_week`, `Salary_per_subject`, `Salary_type`, `About`, `Rating`) VALUES
(1, 'v', 'v', 'v', 'F', '2014-12-19', 5, '5', 'v', 'Cambridge', 5, 5.00, 'daily', 'v', 0),
(2, 'b', 'b', 'b', 'M', '2014-12-24', 7, '7', 'b', 'National Curriculum', 7, 7.00, 'daily', 'b', 0),
(3, 'm', 'm', 'm', 'F', '2014-12-31', 9, '9', 'm', 'National Curriculum', 6, 6.00, 'monthly', '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student_track`
--

CREATE TABLE IF NOT EXISTS `teacher_student_track` (
`ID` int(10) NOT NULL,
  `User_ID_ST` int(10) NOT NULL,
  `User_ID_T` int(10) NOT NULL,
  `S_name` varchar(100) NOT NULL,
  `T_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `negotiated_salary` double(10,2) NOT NULL,
  `salary_type` enum('daily','monthly') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teacher_student_track`
--

INSERT INTO `teacher_student_track` (`ID`, `User_ID_ST`, `User_ID_T`, `S_name`, `T_name`, `start_date`, `end_date`, `negotiated_salary`, `salary_type`) VALUES
(1, 1, 1, 'a', 'v', '2014-12-17', '2014-12-31', 10.00, 'daily'),
(2, 2, 1, 't', 'v', '2014-12-04', '2015-02-13', 20.00, 'daily');

-- --------------------------------------------------------

--
-- Table structure for table `t_subjects`
--

CREATE TABLE IF NOT EXISTS `t_subjects` (
`ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `t_subjects`
--

INSERT INTO `t_subjects` (`ID`, `User_ID`, `Type`) VALUES
(1, 1, 'chemistry'),
(2, 1, 'biology'),
(3, 1, 'economics'),
(4, 1, 'accounting'),
(5, 2, 'physics'),
(6, 2, 'math'),
(7, 2, 'science'),
(8, 3, 'chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `users_student`
--

CREATE TABLE IF NOT EXISTS `users_student` (
`ID` int(20) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Title` varchar(65) NOT NULL,
  `Username` varchar(65) NOT NULL,
  `Password` varchar(65) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_student`
--

INSERT INTO `users_student` (`ID`, `User_ID`, `Title`, `Username`, `Password`) VALUES
(1, 1, 'Student', 'a', 'a'),
(2, 2, 'Student', 't', 't');

-- --------------------------------------------------------

--
-- Table structure for table `users_teacher`
--

CREATE TABLE IF NOT EXISTS `users_teacher` (
`ID` int(20) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `Title` varchar(65) NOT NULL,
  `Username` varchar(56) NOT NULL,
  `Password` varchar(65) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_teacher`
--

INSERT INTO `users_teacher` (`ID`, `User_ID`, `Title`, `Username`, `Password`) VALUES
(1, 1, 'Teacher', 'v', 'v'),
(2, 2, 'Teacher', 'b', 'b'),
(3, 3, 'Teacher', 'm', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `region_covered_teacher`
--
ALTER TABLE `region_covered_teacher`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID_ST` (`User_ID_ST`), ADD KEY `User_ID_T` (`User_ID_T`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `teacher_student_track`
--
ALTER TABLE `teacher_student_track`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID_ST` (`User_ID_ST`), ADD KEY `User_ID_T` (`User_ID_T`);

--
-- Indexes for table `t_subjects`
--
ALTER TABLE `t_subjects`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users_student`
--
ALTER TABLE `users_student`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users_teacher`
--
ALTER TABLE `users_teacher`
 ADD PRIMARY KEY (`ID`), ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `region_covered_teacher`
--
ALTER TABLE `region_covered_teacher`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `User_ID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `User_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teacher_student_track`
--
ALTER TABLE `teacher_student_track`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_subjects`
--
ALTER TABLE `t_subjects`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users_student`
--
ALTER TABLE `users_student`
MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_teacher`
--
ALTER TABLE `users_teacher`
MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `degree`
--
ALTER TABLE `degree`
ADD CONSTRAINT `degree_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `teacher` (`User_ID`);

--
-- Constraints for table `region_covered_teacher`
--
ALTER TABLE `region_covered_teacher`
ADD CONSTRAINT `region_covered_teacher_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `teacher` (`User_ID`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `student` (`User_ID`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`User_ID_ST`) REFERENCES `student` (`User_ID`),
ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`User_ID_T`) REFERENCES `teacher` (`User_ID`);

--
-- Constraints for table `teacher_student_track`
--
ALTER TABLE `teacher_student_track`
ADD CONSTRAINT `teacher_student_track_ibfk_1` FOREIGN KEY (`User_ID_ST`) REFERENCES `student` (`User_ID`),
ADD CONSTRAINT `teacher_student_track_ibfk_2` FOREIGN KEY (`User_ID_T`) REFERENCES `teacher` (`User_ID`);

--
-- Constraints for table `t_subjects`
--
ALTER TABLE `t_subjects`
ADD CONSTRAINT `t_subjects_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `teacher` (`User_ID`);

--
-- Constraints for table `users_student`
--
ALTER TABLE `users_student`
ADD CONSTRAINT `users_student_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `student` (`User_ID`);

--
-- Constraints for table `users_teacher`
--
ALTER TABLE `users_teacher`
ADD CONSTRAINT `users_teacher_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `teacher` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
