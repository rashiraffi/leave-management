-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2019 at 11:42 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

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
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(2) NOT NULL,
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
('2019-08-01 16:45:23', 8, 11712079, 2, '2019-08-02', 'Fever', 'PENDING'),
('2019-08-01 16:50:02', 9, 100, 5, '2019-08-02', 'Internship', 'PENDING'),
('2019-08-01 17:33:10', 10, 100, 1, '2019-09-01', 'Fever', 'PENDING'),
('2019-08-01 17:36:25', 11, 100, 2, '2019-08-31', 'Duty Leave', 'PENDING'),
('2019-08-01 17:36:54', 12, 100, 2, '2019-08-16', 'Fever', 'PENDING'),
('2019-08-01 17:53:34', 13, 11712079, 2, '2019-09-05', 'Workshop', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `userid` int(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `usertype` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `password`, `usertype`) VALUES
(1, 11712079, '11712079', 4),
(2, 100, '100', 4);

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
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dname` (`dname`);

--
-- Indexes for table `Student_ldb`
--
ALTER TABLE `Student_ldb`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Student_ldb`
--
ALTER TABLE `Student_ldb`
  MODIFY `l_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
