-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 03:54 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joborder`
--

-- --------------------------------------------------------

--
-- Table structure for table `mainjob`
--

CREATE TABLE `mainjob` (
  `no_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `due_date` date NOT NULL,
  `part_name` text NOT NULL,
  `part_id` text NOT NULL,
  `tool_name` varchar(80) NOT NULL,
  `asset_id` varchar(80) NOT NULL,
  `tool_type` tinyint(1) NOT NULL,
  `tool_type_other` varchar(80) NOT NULL,
  `wt_new` varchar(1) NOT NULL,
  `wt_replace` varchar(1) NOT NULL,
  `wt_other` varchar(1) NOT NULL,
  `wt_modify` varchar(1) NOT NULL,
  `wt_sample` varchar(1) NOT NULL,
  `wt_sample_form` varchar(80) NOT NULL,
  `wt_repair` varchar(1) NOT NULL,
  `wt_pd` varchar(1) NOT NULL,
  `other_wt_form` varchar(80) NOT NULL,
  `wt_pd_form` varchar(80) NOT NULL,
  `estimated` varchar(80) NOT NULL,
  `detail_work` varchar(255) NOT NULL,
  `detail_file` text NOT NULL,
  `remark` text NOT NULL,
  `received` int(11) NOT NULL,
  `attachedfile` text NOT NULL,
  `request_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `position`, `email`, `fullname`) VALUES
(1, 'aa', '1234', 'ITMGR', 'user1@local.com', 'Atichart Sathusen'),
(2, 'jh', '1234', 'PDMGR', 'user3@local.com', 'Jan Holldorff');

-- --------------------------------------------------------

--
-- Table structure for table `temp_part`
--

CREATE TABLE `temp_part` (
  `temp_part` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_part`
--

INSERT INTO `temp_part` (`temp_part`) VALUES
('TEMP001'),
('TEMP002'),
('TEMP003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mainjob`
--
ALTER TABLE `mainjob`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `temp_part`
--
ALTER TABLE `temp_part`
  ADD PRIMARY KEY (`temp_part`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mainjob`
--
ALTER TABLE `mainjob`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
