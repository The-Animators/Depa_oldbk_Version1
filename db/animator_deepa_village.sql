-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2020 at 03:09 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animator_deepa_village`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'deepa@123', 0, 0, 0, NULL, '2017-10-12 13:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

DROP TABLE IF EXISTS `master_admin`;
CREATE TABLE `master_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` text,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`id`, `full_name`, `username`, `email`, `password`, `activated`, `added_on`) VALUES
(1, 'S M Arshad', 'admin', 'admin@demo.com', '$2a$08$vbw/3RIRrx3qVTiVGAk19.2nR3W5DuHB0zTK27B1Mx0K0ZoHEXoNS', 1, '2017-11-04 11:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `master_bloodgroup`
--

DROP TABLE IF EXISTS `master_bloodgroup`;
CREATE TABLE `master_bloodgroup` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bloodgroup`
--

INSERT INTO `master_bloodgroup` (`id`, `bloodgroup`, `deleted`) VALUES
(1, 'A+', 1),
(2, 'A-', 0),
(3, 'B+', 0),
(4, 'B-', 0),
(5, 'O+', 0),
(6, 'O-', 0),
(7, 'AB+', 0),
(8, 'AB-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_education`
--

DROP TABLE IF EXISTS `master_education`;
CREATE TABLE `master_education` (
  `id` int(11) NOT NULL,
  `education` varchar(55) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_education`
--

INSERT INTO `master_education` (`id`, `education`, `deleted`) VALUES
(1, '5th Std.', 1),
(2, 'B.com', 0),
(3, 'H.S.C.', 1),
(4, 'Electric Engg.', 0),
(5, 'B.A.', 0),
(6, 'F.Y.J.C.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_log`
--

DROP TABLE IF EXISTS `master_log`;
CREATE TABLE `master_log` (
  `log_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(55) NOT NULL,
  `logintype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_log`
--

INSERT INTO `master_log` (`log_id`, `userid`, `login_time`, `ip`, `logintype`) VALUES
(1, 1, '2020-03-13 12:26:28', '::1', 'admin'),
(2, 1, '2020-03-13 12:43:33', '::1', 'admin'),
(3, 1, '2020-03-13 13:10:53', '::1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_relation`
--

DROP TABLE IF EXISTS `master_relation`;
CREATE TABLE `master_relation` (
  `id` int(11) NOT NULL,
  `relation` varchar(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_bloodgroup`
--
ALTER TABLE `master_bloodgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_education`
--
ALTER TABLE `master_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_log`
--
ALTER TABLE `master_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `master_relation`
--
ALTER TABLE `master_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_bloodgroup`
--
ALTER TABLE `master_bloodgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_education`
--
ALTER TABLE `master_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_log`
--
ALTER TABLE `master_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_relation`
--
ALTER TABLE `master_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
