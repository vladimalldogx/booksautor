-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 11:11 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` tinyint(4) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department` varchar(255) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Admin = 1, User = 0',
  `entrydate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `firstname`, `lastname`, `department`, `emailid`, `password`, `status`, `entrydate`) VALUES
(1, 'admin', 'admin', '', 'admin@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', b'1', '2022-11-03 07:09:50'),
(2, 'test', 'test', 'Account', 'test@mail.com', '97dfebf4098c0f5c16bca61e2b76c373', b'0', '2023-07-12 20:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_leave_details`
--

CREATE TABLE `user_leave_details` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `leave_category` varchar(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `time_period` varchar(20) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-pending, 1-Approved, 2-Rejected',
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tour_details`
--

CREATE TABLE `user_tour_details` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `tour_category` varchar(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `tour_date` date DEFAULT NULL,
  `time_period` varchar(20) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-Pending, 1-Approved, 2-Rejected',
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_work_report`
--

CREATE TABLE `user_work_report` (
  `id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `booktitle` varchar(500) NOT NULL,
  `booksold` varchar(500) NOT NULL,
  `bookprice` varchar(500) NOT NULL,
  `directsales` varchar(500) NOT NULL,
  `indirectsales` varchar(500) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_work_report`
--

INSERT INTO `user_work_report` (`id`, `user_id`, `date`, `booktitle`, `booksold`, `bookprice`, `directsales`, `indirectsales`, `entry_date`) VALUES
(1, 2, '2023-07-14', '11111111', '111111111111111111', '1111111111111', '111111111111', '1111111111111', '2023-07-12 20:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_leave_details`
--
ALTER TABLE `user_leave_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tour_details`
--
ALTER TABLE `user_tour_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_work_report`
--
ALTER TABLE `user_work_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_leave_details`
--
ALTER TABLE `user_leave_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tour_details`
--
ALTER TABLE `user_tour_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_work_report`
--
ALTER TABLE `user_work_report`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
