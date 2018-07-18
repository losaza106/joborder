-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 12:50 AM
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
  `no_id` varchar(11) NOT NULL,
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
  `status` int(11) NOT NULL,
  `session_id` varchar(80) NOT NULL,
  `approved_order` int(11) NOT NULL,
  `approved_received` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status_renew` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mainjob`
--

INSERT INTO `mainjob` (`no_id`, `request_date`, `due_date`, `part_name`, `part_id`, `tool_name`, `asset_id`, `tool_type`, `tool_type_other`, `wt_new`, `wt_replace`, `wt_other`, `wt_modify`, `wt_sample`, `wt_sample_form`, `wt_repair`, `wt_pd`, `other_wt_form`, `wt_pd_form`, `estimated`, `detail_work`, `detail_file`, `remark`, `received`, `attachedfile`, `request_by`, `status`, `session_id`, `approved_order`, `approved_received`, `comment`, `status_renew`) VALUES
('001', '2018-07-01', '2018-07-19', 'QRO309-DD GEAR TRAY,MAGNETIC BALLAST 26W.,QRO309-DD LEFT REFL.', 'SSS1081-S1,SSS1081-E1,SSS1081-A2', 'ToolName', 'Assets', 6, 'asdasdasdasd', 'Y', '', 'Y', '', 'Y', 'fsdfsdf', 'Y', 'Y', 'teadasd', 'asdasd', 'estimated ', 'Ds work', '1__1666923246.jpg,2__967848191.jpg', 'Remark', 3, 'coverfire__310011072.png', 4, 6, '769655811971552863', 1, 2, 'rytet', 1),
('002', '2018-07-01', '2018-07-14', 'test', 'test', 'aaas', 'ssss', 6, 'ssssss', '', 'Y', '', '', 'Y', 'test', '', '', '', '', 'testss', 'work', '', 'test', 3, '', 4, 6, '21193672361880955076', 0, 0, '', 1),
('003', '2018-07-14', '2018-07-21', 'FL_#4 BRACKET 25*50*L710,QRO309-DD LEFT REFL.', 'TA1081-2,SSS1081-A2', 'test1', 'test', 3, '', '', 'Y', '', 'Y', '', '', '', '', '', '', 'esssaa', 'Desssccc', '', 'testtssatast', 3, '', 4, 6, '1645537802957981642', 5, 2, '', 0),
('TEMP004', '2018-07-14', '2018-07-21', 'dasdasd', 'asdas', 'asdsadsa', 'asd', 2, '', '', '', 'Y', '', '', '', '', '', 'asdasd', '', 'asdasd', 'asdasdasd', '', 'asdasd', 4, '', 3, 4, '1850906761356916025', 2, 0, '', 0);

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
  `fullname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `MGR1` varchar(19) NOT NULL,
  `MGR2` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `position`, `email`, `fullname`, `department`, `MGR1`, `MGR2`) VALUES
(1, 'aa', '1234', 'ITMGR', 'watchnung001@gmail.com', 'Atichart Sathusen', 'IT', '', ''),
(2, 'jh', '1234', 'PDMGR', 'poiuytrewqq1064@gmail.com', 'Jan Holldorff', 'PD', '', ''),
(3, 'ss', '1234', 'PD', 'poiuytrewqq1063@gmail.com', 'Stephen Dunk', 'PD', 'jh', ''),
(4, 'SSGR', '1234', 'IT', 'poiuytrewqq106@gmail.com', 'John Doe', 'IT', 'aa', 'sd'),
(5, 'sd', '1234', 'ITMGR', 'poiuytrewqq1062@gmail.com', 'Starduct Drink', 'IT', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `renew_detail`
--

CREATE TABLE `renew_detail` (
  `id_renew` int(11) NOT NULL,
  `no_id` varchar(20) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `request_by` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remark_reject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `renew_detail`
--

INSERT INTO `renew_detail` (`id_renew`, `no_id`, `remark`, `due_date`, `request_by`, `approved_by`, `status`, `remark_reject`) VALUES
(5, '001', 'dede', '2018-07-19', 3, 4, 1, 'sadasdas'),
(6, '002', 'asdsad', '2018-07-14', 3, 0, 0, ''),
(7, '001', '8989', '2018-07-22', 3, 0, 0, '');

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
('TEMP010');

-- --------------------------------------------------------

--
-- Table structure for table `working_record`
--

CREATE TABLE `working_record` (
  `id_w_record` varchar(30) NOT NULL,
  `no_id` varchar(10) NOT NULL,
  `tool_type` int(11) NOT NULL,
  `tool_type_other` varchar(80) NOT NULL,
  `wt_new` int(11) NOT NULL,
  `wt_replace` int(11) NOT NULL,
  `wt_other` int(11) NOT NULL,
  `wt_modify` int(11) NOT NULL,
  `wt_sample` int(11) NOT NULL,
  `wt_sample_form` varchar(80) NOT NULL,
  `wt_other_form` varchar(80) NOT NULL,
  `wt_repair` int(11) NOT NULL,
  `wt_pd` int(11) NOT NULL,
  `wt_pd_form` varchar(80) NOT NULL,
  `tool_name` varchar(80) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `part_id` text NOT NULL,
  `part_name` text NOT NULL,
  `date_working_1` date NOT NULL,
  `from_working_1` date NOT NULL,
  `to_working_1` date NOT NULL,
  `CNC_Milling_1` varchar(50) NOT NULL,
  `E_D_M_1` varchar(50) NOT NULL,
  `Drilling_1` varchar(50) NOT NULL,
  `Grinding_1` varchar(50) NOT NULL,
  `Lathe_1` varchar(50) NOT NULL,
  `Milling_1` varchar(50) NOT NULL,
  `Other_1` varchar(50) NOT NULL,
  `W_T_1_1` varchar(20) NOT NULL,
  `O_T_1_1` varchar(20) NOT NULL,
  `W_T_2_1` varchar(20) NOT NULL,
  `O_T_2_1` varchar(20) NOT NULL,
  `W_T_3_1` varchar(20) NOT NULL,
  `O_T_3_1` varchar(20) NOT NULL,
  `W_T_4_1` varchar(20) NOT NULL,
  `O_T_4_1` varchar(20) NOT NULL,
  `W_T_5_1` varchar(20) NOT NULL,
  `O_T_5_1` varchar(20) NOT NULL,
  `W_T_6_1` varchar(20) NOT NULL,
  `O_T_6_1` varchar(20) NOT NULL,
  `W_T_7_1` varchar(20) NOT NULL,
  `O_T_7_1` varchar(20) NOT NULL,
  `date_working_2` varchar(20) NOT NULL,
  `from_working_2` varchar(20) NOT NULL,
  `to_working_2` varchar(20) NOT NULL,
  `CNC_Milling_2` varchar(20) NOT NULL,
  `E_D_M_2` varchar(20) NOT NULL,
  `Drilling_2` varchar(20) NOT NULL,
  `Grinding_2` varchar(20) NOT NULL,
  `Lathe_2` varchar(20) NOT NULL,
  `Milling_2` varchar(20) NOT NULL,
  `Other_2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mainjob`
--
ALTER TABLE `mainjob`
  ADD PRIMARY KEY (`no_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `renew_detail`
--
ALTER TABLE `renew_detail`
  ADD PRIMARY KEY (`id_renew`);

--
-- Indexes for table `temp_part`
--
ALTER TABLE `temp_part`
  ADD PRIMARY KEY (`temp_part`);

--
-- Indexes for table `working_record`
--
ALTER TABLE `working_record`
  ADD PRIMARY KEY (`id_w_record`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `renew_detail`
--
ALTER TABLE `renew_detail`
  MODIFY `id_renew` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
