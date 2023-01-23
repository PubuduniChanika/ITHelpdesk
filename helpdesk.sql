-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 08:20 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignedsc`
--

CREATE TABLE `assignedsc` (
  `rno` varchar(255) NOT NULL,
  `service_company` text NOT NULL,
  `acc_no` text NOT NULL,
  `amount` float NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `no` int(11) NOT NULL,
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`no`, `branch`) VALUES
(1, 'Admin'),
(2, 'Development'),
(3, 'Planning'),
(4, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `deleteddevices`
--

CREATE TABLE `deleteddevices` (
  `rno` varchar(200) NOT NULL,
  `sn` varchar(200) NOT NULL,
  `pdate` text NOT NULL,
  `branch` text NOT NULL,
  `status` text NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `rno` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` text NOT NULL,
  `sn` text NOT NULL,
  `type` text NOT NULL,
  `brand` text NOT NULL,
  `model` text NOT NULL,
  `pdate` date NOT NULL,
  `edate` date NOT NULL,
  `seller` text NOT NULL,
  `branch` text NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`rno`, `timestamp`, `status`, `sn`, `type`, `brand`, `model`, `pdate`, `edate`, `seller`, `branch`, `review`) VALUES
('R1', '2022-12-09 06:00:15', 'In Use', '111111', 'CPU', 'HP', '', '0000-00-00', '0000-00-00', '', 'Admin', 'Saman'),
('R2', '2022-11-27 10:59:28', 'In Use', '222222', 'Monitor', 'ewis', '', '0000-00-00', '0000-00-00', '', 'Admin', 'Kamal'),
('R3', '2022-11-27 11:12:01', 'In Use', '333333', 'Printer', 'Acer', '', '0000-00-00', '0000-00-00', '', 'Planning', 'Gayani'),
('R4', '2022-11-27 11:13:34', 'In Use', '444444', 'Monitor', 'ewis', '', '0000-00-00', '0000-00-00', '', 'Planning', 'Heshani'),
('R5', '2022-12-09 05:57:19', 'In Use', '555555', 'CPU', 'HP', '', '0000-00-00', '0000-00-00', '', 'Planning', ''),
('R6', '2022-12-09 05:59:48', 'In Use', '666666', 'Printer', 'Acer', '', '0000-00-00', '0000-00-00', '', 'Admin', ''),
('R7', '2023-01-23 05:48:59', '', '777777', 'Monitor', '', '', '0000-00-00', '0000-00-00', '', 'Planning', '');

-- --------------------------------------------------------

--
-- Table structure for table `devicetype`
--

CREATE TABLE `devicetype` (
  `no` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devicetype`
--

INSERT INTO `devicetype` (`no`, `type`) VALUES
(1, 'CPU'),
(2, 'Monitor'),
(4, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `service_company`
--

CREATE TABLE `service_company` (
  `service_company` text NOT NULL,
  `bank` text NOT NULL,
  `acc_no` text NOT NULL,
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trouble`
--

CREATE TABLE `trouble` (
  `rno` int(255) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `branch` text NOT NULL,
  `sn` varchar(255) NOT NULL,
  `dcat` text NOT NULL,
  `trouble` text NOT NULL,
  `pn` text NOT NULL,
  `date` datetime NOT NULL,
  `assignee` text NOT NULL,
  `status` text NOT NULL,
  `review` text NOT NULL,
  `s` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trouble`
--

INSERT INTO `trouble` (`rno`, `name`, `designation`, `branch`, `sn`, `dcat`, `trouble`, `pn`, `date`, `assignee`, `status`, `review`, `s`) VALUES
(1, 'Saman', 'Directer', 'Development', '111111', 'CPU', 'Power issue', '', '2022-11-27 16:07:11', 'itm1', 'Assigned', '', ''),
(2, 'Kamal', 'Assistant Secretary', 'Admin', '222222', 'Monitor', 'Does not turn on', '', '2022-11-27 16:07:58', 'itm1', 'Cannot Repair', '', ''),
(3, 'Gayani', 'Trainee', 'Planning', '333333', 'Printer', 'Power issue', '', '2022-11-27 16:09:26', 'itm2', 'Done!!!', '', ''),
(4, 'Heshani', 'Senior Assistant Secretary', 'Planning', '444444', 'Monitor', 'Cannot get printouts', '', '2022-11-27 16:10:23', 'itm1', 'Done!!!', '', ''),
(5, 'Gaya', 'Senior Assistant Secretary', 'Planning', '777777', 'Monitor', 'Power issue', '', '2023-01-23 11:00:36', 'itmember1', 'Cannot Repair', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` text NOT NULL,
  `ulevel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Timestamp`, `name`, `designation`, `uname`, `pwd`, `ulevel`) VALUES
('2022-12-17 15:47:00', 'accounts', '', 'accounts', 'accounts', 'Accounts'),
('2022-12-17 15:49:17', 'itdirector', '', 'itdirector', 'itdirector', 'IT-Director'),
('2022-12-17 15:50:23', 'itincharge', '', 'itincharge', 'itincharge', 'IT-Incharge'),
('2022-12-17 15:53:08', 'itmember1', '', 'itmember1', 'itmember1', 'IT-Member'),
('2022-12-17 15:54:01', 'itmember2', '', 'itmember2', 'itmember2', 'IT-Member'),
('2022-12-17 15:54:52', 'supply', '', 'supply', 'supply', 'Supply');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedsc`
--
ALTER TABLE `assignedsc`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `trouble`
--
ALTER TABLE `trouble`
  ADD PRIMARY KEY (`rno`),
  ADD KEY `assignee` (`assignee`(768));

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uname`),
  ADD KEY `name` (`name`(768));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
