-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2013 at 12:39 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nitt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attend` varchar(6) NOT NULL,
  `uid` int(9) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `did` int(4) NOT NULL,
  `takingClass` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attend`, `uid`, `sid`, `date`, `did`, `takingClass`) VALUES
('Ap', 205112073, 'CA-721', '0000-00-00', 100, 1),
('Ap', 205112070, 'CA-721', '0000-00-00', 100, 1),
('pr', 205112073, 'CA-721', '0000-00-00', 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `uname` varchar(30) NOT NULL DEFAULT '0',
  `uid` int(9) NOT NULL DEFAULT '0',
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`uname`, `uid`, `email`, `website`, `message`) VALUES
('Birendra Kumar', 205112070, 'jksdhfjkds@nitt.c', '8723468273@nitt.edu', 'wewqreqw'),
('ytfy', 205112070, 'yftyf@gmai.com', '2334234@nitt.edu', 'yutyiy');

-- --------------------------------------------------------

--
-- Table structure for table `dpart`
--

CREATE TABLE IF NOT EXISTS `dpart` (
  `did` int(4) NOT NULL DEFAULT '0',
  `dname` varchar(25) NOT NULL DEFAULT '0',
  `dhodid` int(4) NOT NULL,
  PRIMARY KEY (`did`,`dhodid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpart`
--

INSERT INTO `dpart` (`did`, `dname`, `dhodid`) VALUES
(100, 'Computer Application', 111);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `uid` int(9) NOT NULL DEFAULT '0',
  `sid` varchar(6) NOT NULL DEFAULT '0',
  `examname` varchar(4) NOT NULL,
  `mark` decimal(5,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`uid`, `sid`, `examname`, `mark`) VALUES
(205112070, 'CA-721', 'ct_1', 20),
(205112070, 'CA-721', 'ct_1', 20),
(205112073, 'CA-721', 'ct_1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `newsupdate`
--

CREATE TABLE IF NOT EXISTS `newsupdate` (
  `did` int(4) NOT NULL,
  `news` longtext NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsupdate`
--

INSERT INTO `newsupdate` (`did`, `news`, `semester`) VALUES
(101, 'dsfsdf', 2),
(100, 'fsdfsdgsdfsd', 2),
(100, 'Date:22-10-2015;time:9:20AM\r\n---------------------------\r\nthere you have no class for operating System\r\n              \r\n                  by: Janet MaM.', 3),
(100, 'fsdghd idfhgiusd dfukgh i', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `did` int(4) NOT NULL DEFAULT '0',
  `semester` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`did`, `semester`) VALUES
(100, 1),
(100, 2),
(100, 3),
(100, 4),
(100, 5),
(100, 6);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `uid` int(9) NOT NULL DEFAULT '0',
  `stname` varchar(30) NOT NULL DEFAULT '0',
  `did` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`uid`, `stname`, `did`) VALUES
(102, 'Sumit Kumar', 100),
(121, 'Rupam Kumar', 100);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `uid` int(9) NOT NULL DEFAULT '0',
  `sname` varchar(30) NOT NULL DEFAULT '0',
  `did` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`uid`, `sname`, `did`) VALUES
(205112070, 'Birendra Kumar', 100);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sid` varchar(6) NOT NULL DEFAULT '0',
  `uid` int(9) NOT NULL DEFAULT '0',
  `subname` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `uid` int(9) NOT NULL DEFAULT '0',
  `tname` varchar(30) NOT NULL DEFAULT '0',
  `did` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`uid`, `tname`, `did`) VALUES
(111, 'Dr. S. Nickolas', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(9) NOT NULL DEFAULT '0',
  `passward` varchar(10) NOT NULL DEFAULT '0',
  `did` int(4) NOT NULL DEFAULT '0',
  `uname` varchar(30) NOT NULL DEFAULT '0',
  `logged` int(11) DEFAULT '0',
  `profile` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`passward`,`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `passward`, `did`, `uname`, `logged`, `profile`) VALUES
(102, 'staff102', 100, 'Sumit Kumar', 0, 'staff'),
(111, 'hod', 100, 'Dr. S. Nickolas', 0, 'teacher'),
(204112034, 'Nitt102', 102, 'Dinesh Kumar', 0, 'student'),
(205112070, 'Nitt100', 100, 'Birendra Kumar', 0, 'student'),
(210112068, 'Nitt101', 101, 'Rakesh Prasad', 0, 'student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
