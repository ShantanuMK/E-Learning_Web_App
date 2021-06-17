-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 04:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `eid` bigint(255) NOT NULL,
  `subid` bigint(255) DEFAULT NULL,
  `ename` varchar(1000) DEFAULT NULL,
  `udate` timestamp NULL DEFAULT current_timestamp(),
  `edate` date DEFAULT NULL,
  `etime` time DEFAULT NULL,
  `eetime` time DEFAULT NULL,
  `eduration` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`eid`, `subid`, `ename`, `udate`, `edate`, `etime`, `eetime`, `eduration`) VALUES
(1, 2, 'Exam1', '2020-06-27 10:18:23', '2020-07-01', NULL, NULL, NULL),
(2, 2, 'Exam2', '2020-06-27 10:24:16', '2020-06-28', NULL, NULL, NULL),
(3, 2, 'Exam3', '2020-06-27 10:27:12', '2020-06-30', '00:00:00', NULL, NULL),
(4, 1, 'Exam1', '2020-06-30 06:50:25', '2020-06-30', '16:20:00', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `examgiven`
--

CREATE TABLE `examgiven` (
  `eid` bigint(255) DEFAULT NULL,
  `sid` bigint(255) DEFAULT NULL,
  `edate` date NOT NULL DEFAULT current_timestamp(),
  `emarks` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examgiven`
--

INSERT INTO `examgiven` (`eid`, `sid`, `edate`, `emarks`) VALUES
(4, 6, '2020-06-30', 0),
(4, 6, '2020-06-30', 0),
(3, 6, '2020-06-30', 2),
(3, 6, '2020-06-30', 2),
(3, 12, '2020-06-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `examq`
--

CREATE TABLE `examq` (
  `eid` bigint(255) DEFAULT NULL,
  `eqn` int(100) DEFAULT NULL,
  `eq` longtext DEFAULT NULL,
  `ea` varchar(1000) DEFAULT NULL,
  `eb` varchar(1000) DEFAULT NULL,
  `ec` varchar(1000) DEFAULT NULL,
  `ed` varchar(1000) DEFAULT NULL,
  `ecorrect` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examq`
--

INSERT INTO `examq` (`eid`, `eqn`, `eq`, `ea`, `eb`, `ec`, `ed`, `ecorrect`) VALUES
(3, 1, 'python?', 'macchine lerning', 'rnn', '3', 'programming language', 'd'),
(3, 2, 'linux?', 'language', 'ml', 'lstm', 'os', 'd'),
(4, 1, 'What is server?', 'net provider', 'storage device', 'ram', 'all', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` bigint(255) NOT NULL,
  `school_name` text DEFAULT NULL,
  `school_email` varchar(100) DEFAULT NULL,
  `school_password` varchar(100) DEFAULT NULL,
  `school_number` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `school_email`, `school_password`, `school_number`) VALUES
(1, 'dems', 'dems@gmail.com', 'demsdems', 9090909090);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` bigint(255) NOT NULL,
  `ssrno` int(10) DEFAULT NULL,
  `sname` text DEFAULT NULL,
  `sstd` tinyint(1) DEFAULT NULL,
  `sdiv` text DEFAULT NULL,
  `sloginid` varchar(100) DEFAULT NULL,
  `spassword` varchar(100) DEFAULT NULL,
  `semail` varchar(1000) DEFAULT NULL,
  `smnum` bigint(10) DEFAULT NULL,
  `school_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `ssrno`, `sname`, `sstd`, `sdiv`, `sloginid`, `spassword`, `semail`, `smnum`, `school_id`) VALUES
(3, 1, 'sam', 3, 'A', 'sam12', 'sam12', 'student@gmail.com', 9999999999, 1),
(4, 2, 'bruce', 3, 'A', 'bruce12', 'bruce12', 'student@gmail.com', 8888888888, 1),
(5, 21, 'shantanu', 3, 'A', 'shantanu21', 'shantanu21', 'student@gmail.com', 9898989898, 1),
(6, 12, 'Tony stark', 4, 'A', 'tony-stark', 'tony', 'tony@gmail.com', 7898789878, 1),
(8, 14, 'chris', 4, 'B', 'chris', 'chris', 'student@gmail.com', 1254789865, 1),
(9, 12, 'pepper', 4, 'B', 'pepper', 'pepper', 'student@gmail.com', 1245789865, 1),
(12, 19, 'batman', 4, 'A', 'batman', 'batman', 'batman@gmail.com', 9090909090, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stufiles`
--

CREATE TABLE `stufiles` (
  `sid` bigint(255) DEFAULT NULL,
  `fid` bigint(255) DEFAULT NULL,
  `sfilename` varchar(50) DEFAULT NULL,
  `subdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stufiles`
--

INSERT INTO `stufiles` (`sid`, `fid`, `sfilename`, `subdate`) VALUES
(0, 0, NULL, '2020-06-23'),
(6, 3, 'stu_6file_3.pdf', '2020-06-23'),
(6, 4, 'stu_6_file_4.pdf', '2020-06-25'),
(6, 14, 'stu_6_file_14.pdf', '2020-06-26'),
(6, 16, 'stu_6_file_16.pdf', '2020-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `subfiles`
--

CREATE TABLE `subfiles` (
  `fid` bigint(255) NOT NULL,
  `subid` bigint(255) DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `ftname` varchar(100) DEFAULT NULL,
  `ftype` int(1) DEFAULT NULL,
  `pdate` date NOT NULL DEFAULT current_timestamp(),
  `sdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subfiles`
--

INSERT INTO `subfiles` (`fid`, `subid`, `filename`, `ftname`, `ftype`, `pdate`, `sdate`) VALUES
(1, 2, 'file_1.pdf', 'A1', 1, '2020-06-21', '0000-00-00'),
(2, 0, NULL, NULL, 0, '2020-06-21', NULL),
(3, 2, 'file_3.pdf', 'a4', 1, '2020-06-21', '2020-06-26'),
(4, 2, 'file_4.pdf', 'a4', 1, '2020-06-21', '2020-06-26'),
(5, 2, 'sm_5.pdf', '1st lesson', 2, '2020-06-21', NULL),
(6, 2, 'sm_6.pdf', '1st lesson', 2, '2020-06-21', NULL),
(7, 2, 'sm_7.pdf', '1st lesson', 2, '2020-06-21', NULL),
(8, 2, 'sm_8.pdf', '1st lesson', 2, '2020-06-21', NULL),
(9, 2, 'sm_9.pdf', '1st lesson', 2, '2020-06-21', NULL),
(10, 2, 'sm_10.pdf', '1st lesson', 2, '2020-06-21', NULL),
(11, 2, 'sm_11.pdf', '2nd', 2, '2020-06-21', NULL),
(12, 2, 'sm_12.pdf', '2nd', 2, '2020-06-21', NULL),
(13, 2, 'sm_13.pdf', '2nd', 2, '2020-06-21', NULL),
(14, 2, 'file_14.pdf', 'Assignment12', 1, '2020-06-26', '2020-06-30'),
(15, 2, 'file_15.pdf', 'Assignment 10', 1, '2020-06-27', '2020-06-28'),
(16, 2, 'file_16.pdf', 'Science', 1, '2020-06-27', '2020-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subid` bigint(255) NOT NULL,
  `subname` varchar(100) DEFAULT NULL,
  `substd` int(10) DEFAULT NULL,
  `subdiv` text DEFAULT NULL,
  `tid` bigint(255) DEFAULT NULL,
  `school_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subid`, `subname`, `substd`, `subdiv`, `tid`, `school_id`) VALUES
(1, 'shan', 4, 'A', 1, 1),
(2, 'Shantanu', 4, 'A', 1, 1),
(6, 'neha', 4, 'A', 4, 1),
(8, 'science', 4, 'A', 1, 1),
(9, 'maths2', 4, 'A', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subvideo`
--

CREATE TABLE `subvideo` (
  `subid` bigint(255) DEFAULT NULL,
  `svid` bigint(255) DEFAULT NULL,
  `svame` varchar(100) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `udate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` bigint(255) NOT NULL,
  `tname` text DEFAULT NULL,
  `temail` varchar(100) DEFAULT NULL,
  `tpassword` varchar(100) DEFAULT NULL,
  `tmobile` bigint(10) DEFAULT NULL,
  `school_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `tname`, `temail`, `tpassword`, `tmobile`, `school_id`) VALUES
(1, 'varpe', 'varpe', 'varpe', 9090909090, 1),
(2, 'dixit', 'dixit', 'dixit', 9090909090, 1),
(3, 'mahajan', 'mahajan', 'mahajan', 9090909090, 1),
(4, 'karpe', 'karpe', 'karpe', 9090909090, 1),
(5, 'gosh', 'gosh', 'gosh', 9878987098, 2),
(6, 'puja', 'puja', 'puja', 9878987098, 2),
(7, 'sujata', 'sujata', 'sujata', 9878987098, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subfiles`
--
ALTER TABLE `subfiles`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `eid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subfiles`
--
ALTER TABLE `subfiles`
  MODIFY `fid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
