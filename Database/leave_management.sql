-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2019 at 01:30 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `c_id` smallint(6) NOT NULL,
  `c_name` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`c_id`, `c_name`) VALUES
(1, 'CSE_B(17-21)'),
(2, 'CSE_A(17-21)');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` tinyint(4) NOT NULL,
  `dname` varchar(128) NOT NULL,
  `dhod` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dname`, `dhod`) VALUES
(1, 'Computer Science & Engineering', 'Prof. Fr. Dr. A.K. George'),
(2, 'Civil Engineering', 'Prof. DR. JOSE P. THERATTIL'),
(3, 'Electronics & Communication Engineering', 'Prof. DR. JOSE P. THERATTIL'),
(4, 'Electrical & Electronics Engineering', 'Prof. DR. JARIN T'),
(5, 'Mechanical Engineering', 'Prof. Dr. Biju P. L'),
(6, 'Mechatronics', 'update'),
(7, 'Basic Science & Humanities', 'Prof. FR JOHN THARAYIL');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `user_id` int(15) NOT NULL,
  `stf_name` varchar(63) NOT NULL,
  `d_id` tinyint(4) NOT NULL,
  `c_id` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`user_id`, `stf_name`, `d_id`, `c_id`) VALUES
(22712030, 'Namitha T N', 1, 2),
(22712031, 'Unnikrishnan P', 1, 2),
(22712079, 'Shaiju Paul', 1, 1),
(22712080, 'Swapna B Sasi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(15) NOT NULL,
  `s_name` varchar(55) NOT NULL,
  `d_id` tinyint(6) NOT NULL,
  `c_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `s_name`, `d_id`, `c_id`) VALUES
(11712030, 'ABC', 1, 2),
(11712079, 'Rashi M', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Student_ldb`
--

CREATE TABLE `Student_ldb` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `d_no` int(16) NOT NULL,
  `l_date` date NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student_ldb`
--

INSERT INTO `Student_ldb` (`ts`, `l_id`, `u_id`, `d_no`, `l_date`, `reason`, `status`) VALUES
('2019-09-09 06:41:30', 14, 11712079, 5, '2019-09-10', 'fever', 'PENDING'),
('2019-09-09 06:41:52', 15, 11712030, 2, '2019-09-20', 'fevers', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `usertype` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `usertype`) VALUES
(11712030, '11712030', 4),
(11712079, '11712079', 4),
(22712030, '22712030', 3),
(22712031, '22712031', 3),
(22712079, '22712079', 3),
(22712080, '22712080', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(2) NOT NULL,
  `usertype` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `usertype`) VALUES
(3, 'Faculty'),
(2, 'HOD'),
(1, 'Principal'),
(4, 'Students');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dname` (`dname`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `student_ibfk_3` (`d_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `Student_ldb`
--
ALTER TABLE `Student_ldb`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `usertype` (`usertype`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usertype` (`usertype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `c_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Student_ldb`
--
ALTER TABLE `Student_ldb`
  MODIFY `l_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `class` (`c_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`d_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`d_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `Student_ldb`
--
ALTER TABLE `Student_ldb`
  ADD CONSTRAINT `Student_ldb_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `usertype` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
