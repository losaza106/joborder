-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 01:31 AM
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
('TEMP010'),
('TEMP011'),
('TEMP012'),
('TEMP013');

-- --------------------------------------------------------

--
-- Table structure for table `working_record`
--

CREATE TABLE `working_record` (
  `id_w_record` int(11) NOT NULL,
  `no_id` varchar(10) NOT NULL,
  `tool_type` int(11) NOT NULL,
  `tool_type_other` varchar(80) NOT NULL,
  `wt_new` varchar(1) NOT NULL,
  `wt_replace` varchar(1) NOT NULL,
  `wt_other` varchar(1) NOT NULL,
  `wt_modify` varchar(1) NOT NULL,
  `wt_sample` varchar(1) NOT NULL,
  `wt_sample_form` varchar(80) NOT NULL,
  `wt_other_form` varchar(80) NOT NULL,
  `wt_repair` varchar(1) NOT NULL,
  `wt_pd` varchar(1) NOT NULL,
  `wt_pd_form` varchar(80) NOT NULL,
  `tool_name` varchar(80) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `part_id` text NOT NULL,
  `part_name` text NOT NULL,
  `date_working_1` varchar(100) NOT NULL,
  `from_working_1` varchar(100) NOT NULL,
  `to_working_1` varchar(100) NOT NULL,
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
  `Remark_1` varchar(20) NOT NULL,
  `date_working_2` varchar(20) NOT NULL,
  `from_working_2` varchar(20) NOT NULL,
  `to_working_2` varchar(20) NOT NULL,
  `CNC_Milling_2` varchar(20) NOT NULL,
  `E_D_M_2` varchar(20) NOT NULL,
  `Drilling_2` varchar(20) NOT NULL,
  `Grinding_2` varchar(20) NOT NULL,
  `Lathe_2` varchar(20) NOT NULL,
  `Milling_2` varchar(20) NOT NULL,
  `Other_2` varchar(20) NOT NULL,
  `W_T_1_2` varchar(20) NOT NULL,
  `O_T_1_2` varchar(20) NOT NULL,
  `W_T_2_2` varchar(20) NOT NULL,
  `O_T_2_2` varchar(20) NOT NULL,
  `W_T_3_2` varchar(20) NOT NULL,
  `O_T_3_2` varchar(20) NOT NULL,
  `W_T_4_2` varchar(20) NOT NULL,
  `O_T_4_2` varchar(20) NOT NULL,
  `W_T_5_2` varchar(20) NOT NULL,
  `O_T_5_2` varchar(20) NOT NULL,
  `W_T_6_2` varchar(20) NOT NULL,
  `O_T_6_2` varchar(20) NOT NULL,
  `W_T_7_2` varchar(20) NOT NULL,
  `O_T_7_2` varchar(20) NOT NULL,
  `Remark_2` varchar(20) NOT NULL,
  `date_working_3` varchar(20) NOT NULL,
  `from_working_3` varchar(20) NOT NULL,
  `to_working_3` varchar(20) NOT NULL,
  `CNC_Milling_3` varchar(20) NOT NULL,
  `E_D_M_3` varchar(20) NOT NULL,
  `Drilling_3` varchar(20) NOT NULL,
  `Grinding_3` varchar(20) NOT NULL,
  `Lathe_3` varchar(20) NOT NULL,
  `Milling_3` varchar(20) NOT NULL,
  `Other_3` varchar(20) NOT NULL,
  `W_T_1_3` varchar(20) NOT NULL,
  `O_T_1_3` varchar(20) NOT NULL,
  `W_T_2_3` varchar(20) NOT NULL,
  `O_T_2_3` varchar(20) NOT NULL,
  `W_T_3_3` varchar(20) NOT NULL,
  `O_T_3_3` varchar(20) NOT NULL,
  `W_T_4_3` varchar(20) NOT NULL,
  `O_T_4_3` varchar(20) NOT NULL,
  `W_T_5_3` varchar(20) NOT NULL,
  `O_T_5_3` varchar(20) NOT NULL,
  `W_T_6_3` varchar(20) NOT NULL,
  `O_T_6_3` varchar(20) NOT NULL,
  `W_T_7_3` varchar(20) NOT NULL,
  `O_T_7_3` varchar(20) NOT NULL,
  `Remark_3` varchar(20) NOT NULL,
  `date_working_4` varchar(20) NOT NULL,
  `from_working_4` varchar(20) NOT NULL,
  `to_working_4` varchar(20) NOT NULL,
  `CNC_Milling_4` varchar(20) NOT NULL,
  `E_D_M_4` varchar(20) NOT NULL,
  `Drilling_4` varchar(20) NOT NULL,
  `Grinding_4` varchar(20) NOT NULL,
  `Lathe_4` varchar(20) NOT NULL,
  `Milling_4` varchar(20) NOT NULL,
  `Other_4` varchar(20) NOT NULL,
  `W_T_1_4` varchar(20) NOT NULL,
  `O_T_1_4` varchar(20) NOT NULL,
  `W_T_2_4` varchar(20) NOT NULL,
  `O_T_2_4` varchar(20) NOT NULL,
  `W_T_3_4` varchar(20) NOT NULL,
  `O_T_3_4` varchar(20) NOT NULL,
  `W_T_4_4` varchar(20) NOT NULL,
  `O_T_4_4` varchar(20) NOT NULL,
  `W_T_5_4` varchar(20) NOT NULL,
  `O_T_5_4` varchar(20) NOT NULL,
  `W_T_6_4` varchar(20) NOT NULL,
  `O_T_6_4` text NOT NULL,
  `W_T_7_4` varchar(20) NOT NULL,
  `O_T_7_4` varchar(20) NOT NULL,
  `Remark_4` varchar(20) NOT NULL,
  `date_working_5` varchar(20) NOT NULL,
  `from_working_5` varchar(20) NOT NULL,
  `to_working_5` varchar(20) NOT NULL,
  `CNC_Milling_5` varchar(20) NOT NULL,
  `E_D_M_5` varchar(20) NOT NULL,
  `Drilling_5` varchar(20) NOT NULL,
  `Grinding_5` varchar(20) NOT NULL,
  `Lathe_5` varchar(20) NOT NULL,
  `Milling_5` varchar(20) NOT NULL,
  `Other_5` varchar(20) NOT NULL,
  `W_T_1_5` varchar(20) NOT NULL,
  `O_T_1_5` varchar(20) NOT NULL,
  `W_T_2_5` varchar(20) NOT NULL,
  `O_T_2_5` varchar(20) NOT NULL,
  `W_T_3_5` varchar(20) NOT NULL,
  `O_T_3_5` varchar(20) NOT NULL,
  `W_T_4_5` varchar(20) NOT NULL,
  `O_T_4_5` varchar(20) NOT NULL,
  `W_T_5_5` varchar(20) NOT NULL,
  `O_T_5_5` varchar(20) NOT NULL,
  `W_T_6_5` varchar(20) NOT NULL,
  `O_T_6_5` varchar(20) NOT NULL,
  `W_T_7_5` varchar(20) NOT NULL,
  `O_T_7_5` varchar(20) NOT NULL,
  `Remark_5` varchar(20) NOT NULL,
  `date_working_6` varchar(20) NOT NULL,
  `from_working_6` varchar(20) NOT NULL,
  `to_working_6` varchar(20) NOT NULL,
  `CNC_Milling_6` varchar(20) NOT NULL,
  `E_D_M_6` varchar(20) NOT NULL,
  `Drilling_6` varchar(20) NOT NULL,
  `Grinding_6` varchar(20) NOT NULL,
  `Lathe_6` varchar(20) NOT NULL,
  `Milling_6` varchar(20) NOT NULL,
  `Other_6` varchar(20) NOT NULL,
  `W_T_1_6` varchar(20) NOT NULL,
  `O_T_1_6` varchar(20) NOT NULL,
  `W_T_2_6` varchar(20) NOT NULL,
  `O_T_2_6` varchar(20) NOT NULL,
  `W_T_3_6` varchar(20) NOT NULL,
  `O_T_3_6` varchar(20) NOT NULL,
  `W_T_4_6` varchar(20) NOT NULL,
  `O_T_4_6` varchar(20) NOT NULL,
  `W_T_5_6` varchar(20) NOT NULL,
  `O_T_5_6` varchar(20) NOT NULL,
  `W_T_6_6` varchar(20) NOT NULL,
  `O_T_6_6` varchar(20) NOT NULL,
  `W_T_7_6` varchar(20) NOT NULL,
  `O_T_7_6` varchar(20) NOT NULL,
  `Remark_6` varchar(20) NOT NULL,
  `date_working_7` varchar(20) NOT NULL,
  `from_working_7` varchar(20) NOT NULL,
  `to_working_7` varchar(20) NOT NULL,
  `CNC_Milling_7` varchar(20) NOT NULL,
  `E_D_M_7` varchar(20) NOT NULL,
  `Drilling_7` varchar(20) NOT NULL,
  `Grinding_7` varchar(20) NOT NULL,
  `Lathe_7` varchar(20) NOT NULL,
  `Milling_7` varchar(20) NOT NULL,
  `Other_7` varchar(20) NOT NULL,
  `W_T_1_7` varchar(20) NOT NULL,
  `O_T_1_7` varchar(20) NOT NULL,
  `W_T_2_7` varchar(20) NOT NULL,
  `O_T_2_7` varchar(20) NOT NULL,
  `W_T_3_7` varchar(20) NOT NULL,
  `O_T_3_7` varchar(20) NOT NULL,
  `W_T_4_7` varchar(20) NOT NULL,
  `O_T_4_7` varchar(20) NOT NULL,
  `W_T_5_7` varchar(20) NOT NULL,
  `O_T_5_7` varchar(20) NOT NULL,
  `W_T_6_7` varchar(20) NOT NULL,
  `O_T_6_7` varchar(20) NOT NULL,
  `W_T_7_7` varchar(20) NOT NULL,
  `O_T_7_7` varchar(20) NOT NULL,
  `Remark_7` varchar(20) NOT NULL,
  `date_working_8` varchar(20) NOT NULL,
  `from_working_8` varchar(20) NOT NULL,
  `to_working_8` varchar(20) NOT NULL,
  `CNC_Milling_8` varchar(20) NOT NULL,
  `E_D_M_8` varchar(20) NOT NULL,
  `Drilling_8` varchar(20) NOT NULL,
  `Grinding_8` varchar(20) NOT NULL,
  `Lathe_8` varchar(20) NOT NULL,
  `Milling_8` varchar(20) NOT NULL,
  `Other_8` varchar(20) NOT NULL,
  `W_T_1_8` varchar(20) NOT NULL,
  `O_T_1_8` varchar(20) NOT NULL,
  `W_T_2_8` varchar(20) NOT NULL,
  `O_T_2_8` varchar(20) NOT NULL,
  `W_T_3_8` varchar(20) NOT NULL,
  `O_T_3_8` varchar(20) NOT NULL,
  `W_T_4_8` varchar(20) NOT NULL,
  `O_T_4_8` varchar(20) NOT NULL,
  `W_T_5_8` varchar(20) NOT NULL,
  `O_T_5_8` varchar(20) NOT NULL,
  `W_T_6_8` varchar(20) NOT NULL,
  `O_T_6_8` varchar(20) NOT NULL,
  `W_T_7_8` varchar(20) NOT NULL,
  `O_T_7_8` varchar(20) NOT NULL,
  `Remark_8` varchar(20) NOT NULL,
  `date_working_9` varchar(20) NOT NULL,
  `from_working_9` varchar(20) NOT NULL,
  `to_working_9` varchar(20) NOT NULL,
  `CNC_Milling_9` varchar(20) NOT NULL,
  `E_D_M_9` varchar(20) NOT NULL,
  `Drilling_9` varchar(20) NOT NULL,
  `Grinding_9` varchar(20) NOT NULL,
  `Lathe_9` varchar(20) NOT NULL,
  `Milling_9` varchar(20) NOT NULL,
  `Other_9` varchar(20) NOT NULL,
  `W_T_1_9` varchar(20) NOT NULL,
  `O_T_1_9` varchar(20) NOT NULL,
  `W_T_2_9` varchar(20) NOT NULL,
  `O_T_2_9` varchar(20) NOT NULL,
  `W_T_3_9` varchar(20) NOT NULL,
  `O_T_3_9` varchar(20) NOT NULL,
  `W_T_4_9` varchar(20) NOT NULL,
  `O_T_4_9` varchar(20) NOT NULL,
  `W_T_5_9` varchar(20) NOT NULL,
  `O_T_5_9` varchar(20) NOT NULL,
  `W_T_6_9` varchar(20) NOT NULL,
  `O_T_6_9` varchar(20) NOT NULL,
  `W_T_7_9` varchar(20) NOT NULL,
  `O_T_7_9` varchar(20) NOT NULL,
  `Remark_9` varchar(20) NOT NULL,
  `date_working_10` varchar(20) NOT NULL,
  `from_working_10` varchar(20) NOT NULL,
  `to_working_10` varchar(20) NOT NULL,
  `CNC_Milling_10` varchar(20) NOT NULL,
  `E_D_M_10` varchar(20) NOT NULL,
  `Drilling_10` varchar(20) NOT NULL,
  `Grinding_10` varchar(20) NOT NULL,
  `Lathe_10` varchar(20) NOT NULL,
  `Milling_10` varchar(20) NOT NULL,
  `Other_10` varchar(20) NOT NULL,
  `W_T_1_10` varchar(20) NOT NULL,
  `O_T_1_10` varchar(20) NOT NULL,
  `W_T_2_10` varchar(20) NOT NULL,
  `O_T_2_10` varchar(20) NOT NULL,
  `W_T_3_10` varchar(20) NOT NULL,
  `O_T_3_10` varchar(20) NOT NULL,
  `W_T_4_10` varchar(20) NOT NULL,
  `O_T_4_10` varchar(20) NOT NULL,
  `W_T_5_10` varchar(20) NOT NULL,
  `O_T_5_10` varchar(20) NOT NULL,
  `W_T_6_10` varchar(20) NOT NULL,
  `O_T_6_10` varchar(20) NOT NULL,
  `W_T_7_10` varchar(20) NOT NULL,
  `O_T_7_10` varchar(20) NOT NULL,
  `Remark_10` varchar(20) NOT NULL,
  `date_working_11` varchar(20) NOT NULL,
  `from_working_11` varchar(20) NOT NULL,
  `to_working_11` varchar(20) NOT NULL,
  `CNC_Milling_11` varchar(20) NOT NULL,
  `E_D_M_11` varchar(20) NOT NULL,
  `Drilling_11` varchar(20) NOT NULL,
  `Grinding_11` varchar(20) NOT NULL,
  `Lathe_11` varchar(20) NOT NULL,
  `Milling_11` varchar(20) NOT NULL,
  `Other_11` varchar(20) NOT NULL,
  `W_T_1_11` varchar(20) NOT NULL,
  `O_T_1_11` varchar(20) NOT NULL,
  `W_T_2_11` varchar(20) NOT NULL,
  `O_T_2_11` varchar(20) NOT NULL,
  `W_T_3_11` varchar(20) NOT NULL,
  `O_T_3_11` varchar(20) NOT NULL,
  `W_T_4_11` varchar(20) NOT NULL,
  `O_T_4_11` varchar(20) NOT NULL,
  `W_T_5_11` varchar(20) NOT NULL,
  `O_T_5_11` varchar(20) NOT NULL,
  `W_T_6_11` varchar(20) NOT NULL,
  `O_T_6_11` varchar(20) NOT NULL,
  `W_T_7_11` varchar(20) NOT NULL,
  `O_T_7_11` varchar(20) NOT NULL,
  `Remark_11` varchar(20) NOT NULL,
  `date_working_12` varchar(20) NOT NULL,
  `from_working_12` varchar(20) NOT NULL,
  `to_working_12` varchar(20) NOT NULL,
  `CNC_Milling_12` varchar(20) NOT NULL,
  `E_D_M_12` varchar(20) NOT NULL,
  `Drilling_12` varchar(20) NOT NULL,
  `Grinding_12` varchar(20) NOT NULL,
  `Lathe_12` varchar(20) NOT NULL,
  `Milling_12` varchar(20) NOT NULL,
  `Other_12` varchar(20) NOT NULL,
  `W_T_1_12` varchar(20) NOT NULL,
  `O_T_1_12` varchar(20) NOT NULL,
  `W_T_2_12` varchar(20) NOT NULL,
  `O_T_2_12` varchar(20) NOT NULL,
  `W_T_3_12` varchar(20) NOT NULL,
  `O_T_3_12` varchar(20) NOT NULL,
  `W_T_4_12` varchar(20) NOT NULL,
  `O_T_4_12` varchar(20) NOT NULL,
  `W_T_5_12` varchar(20) NOT NULL,
  `O_T_5_12` varchar(20) NOT NULL,
  `W_T_6_12` varchar(20) NOT NULL,
  `O_T_6_12` varchar(20) NOT NULL,
  `W_T_7_12` varchar(20) NOT NULL,
  `O_T_7_12` varchar(20) NOT NULL,
  `Remark_12` varchar(20) NOT NULL
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

--
-- AUTO_INCREMENT for table `working_record`
--
ALTER TABLE `working_record`
  MODIFY `id_w_record` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
