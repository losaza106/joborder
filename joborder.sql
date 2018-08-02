-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 06:25 PM
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
('001', '2018-07-01', '2018-07-19', 'QRO309-DD GEAR TRAY,MAGNETIC BALLAST 26W.,QRO309-DD LEFT REFL.', 'SSS1081-S1,SSS1081-E1,SSS1081-A2', 'ToolName', 'Assets', 6, 'asdasdasdasd', 'Y', '', 'Y', '', 'Y', 'fsdfsdf', 'Y', 'Y', 'teadasd', 'asdasd', 'estimated ', 'Ds work ทดสอบไทย', '1__1666923246.jpg,2__967848191.jpg', 'Remark', 3, 'coverfire__310011072.png', 4, 6, '769655811971552863', 1, 2, 'rytet', 1),
('003', '2018-07-14', '2018-07-21', 'FL_#4 BRACKET 25*50*L710,QRO309-DD LEFT REFL.', 'TA1081-2,SSS1081-A2', 'test1', 'test', 3, '', '', 'Y', '', 'Y', '', '', '', '', '', '', 'esssaa', 'Desssccc', '', 'testtssatast', 3, '', 4, 6, '1645537802957981642', 5, 2, '', 0),
('005', '2018-08-01', '2018-08-04', 'SDFF,test2', 'TEMP015,ssSSAA', 'ToolName', 'asdas', 3, '', 'Y', '', '', '', '', '', 'Y', '', '', '', 'ssss', 'asss', '', 'sssd', 4, '', 3, 6, '10263644262039459343', 2, 1, '', 0),
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
(6, '002', 'asdsad', '2018-07-14', 3, 4, 0, ''),
(7, '001', '8989', '2018-07-22', 3, 4, 0, ''),
(8, '005', 'อะไรเนี่ย', '2018-08-04', 4, 3, 1, '');

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
('TEMP015');

-- --------------------------------------------------------

--
-- Table structure for table `working_record`
--

CREATE TABLE `working_record` (
  `id_w_record` int(11) NOT NULL,
  `no_id` varchar(20) NOT NULL,
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
  `Remark_12` varchar(20) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `working_record`
--

INSERT INTO `working_record` (`id_w_record`, `no_id`, `tool_type`, `tool_type_other`, `wt_new`, `wt_replace`, `wt_other`, `wt_modify`, `wt_sample`, `wt_sample_form`, `wt_other_form`, `wt_repair`, `wt_pd`, `wt_pd_form`, `tool_name`, `asset_id`, `part_id`, `part_name`, `date_working_1`, `from_working_1`, `to_working_1`, `CNC_Milling_1`, `E_D_M_1`, `Drilling_1`, `Grinding_1`, `Lathe_1`, `Milling_1`, `Other_1`, `W_T_1_1`, `O_T_1_1`, `W_T_2_1`, `O_T_2_1`, `W_T_3_1`, `O_T_3_1`, `W_T_4_1`, `O_T_4_1`, `W_T_5_1`, `O_T_5_1`, `W_T_6_1`, `O_T_6_1`, `W_T_7_1`, `O_T_7_1`, `Remark_1`, `date_working_2`, `from_working_2`, `to_working_2`, `CNC_Milling_2`, `E_D_M_2`, `Drilling_2`, `Grinding_2`, `Lathe_2`, `Milling_2`, `Other_2`, `W_T_1_2`, `O_T_1_2`, `W_T_2_2`, `O_T_2_2`, `W_T_3_2`, `O_T_3_2`, `W_T_4_2`, `O_T_4_2`, `W_T_5_2`, `O_T_5_2`, `W_T_6_2`, `O_T_6_2`, `W_T_7_2`, `O_T_7_2`, `Remark_2`, `date_working_3`, `from_working_3`, `to_working_3`, `CNC_Milling_3`, `E_D_M_3`, `Drilling_3`, `Grinding_3`, `Lathe_3`, `Milling_3`, `Other_3`, `W_T_1_3`, `O_T_1_3`, `W_T_2_3`, `O_T_2_3`, `W_T_3_3`, `O_T_3_3`, `W_T_4_3`, `O_T_4_3`, `W_T_5_3`, `O_T_5_3`, `W_T_6_3`, `O_T_6_3`, `W_T_7_3`, `O_T_7_3`, `Remark_3`, `date_working_4`, `from_working_4`, `to_working_4`, `CNC_Milling_4`, `E_D_M_4`, `Drilling_4`, `Grinding_4`, `Lathe_4`, `Milling_4`, `Other_4`, `W_T_1_4`, `O_T_1_4`, `W_T_2_4`, `O_T_2_4`, `W_T_3_4`, `O_T_3_4`, `W_T_4_4`, `O_T_4_4`, `W_T_5_4`, `O_T_5_4`, `W_T_6_4`, `O_T_6_4`, `W_T_7_4`, `O_T_7_4`, `Remark_4`, `date_working_5`, `from_working_5`, `to_working_5`, `CNC_Milling_5`, `E_D_M_5`, `Drilling_5`, `Grinding_5`, `Lathe_5`, `Milling_5`, `Other_5`, `W_T_1_5`, `O_T_1_5`, `W_T_2_5`, `O_T_2_5`, `W_T_3_5`, `O_T_3_5`, `W_T_4_5`, `O_T_4_5`, `W_T_5_5`, `O_T_5_5`, `W_T_6_5`, `O_T_6_5`, `W_T_7_5`, `O_T_7_5`, `Remark_5`, `date_working_6`, `from_working_6`, `to_working_6`, `CNC_Milling_6`, `E_D_M_6`, `Drilling_6`, `Grinding_6`, `Lathe_6`, `Milling_6`, `Other_6`, `W_T_1_6`, `O_T_1_6`, `W_T_2_6`, `O_T_2_6`, `W_T_3_6`, `O_T_3_6`, `W_T_4_6`, `O_T_4_6`, `W_T_5_6`, `O_T_5_6`, `W_T_6_6`, `O_T_6_6`, `W_T_7_6`, `O_T_7_6`, `Remark_6`, `date_working_7`, `from_working_7`, `to_working_7`, `CNC_Milling_7`, `E_D_M_7`, `Drilling_7`, `Grinding_7`, `Lathe_7`, `Milling_7`, `Other_7`, `W_T_1_7`, `O_T_1_7`, `W_T_2_7`, `O_T_2_7`, `W_T_3_7`, `O_T_3_7`, `W_T_4_7`, `O_T_4_7`, `W_T_5_7`, `O_T_5_7`, `W_T_6_7`, `O_T_6_7`, `W_T_7_7`, `O_T_7_7`, `Remark_7`, `date_working_8`, `from_working_8`, `to_working_8`, `CNC_Milling_8`, `E_D_M_8`, `Drilling_8`, `Grinding_8`, `Lathe_8`, `Milling_8`, `Other_8`, `W_T_1_8`, `O_T_1_8`, `W_T_2_8`, `O_T_2_8`, `W_T_3_8`, `O_T_3_8`, `W_T_4_8`, `O_T_4_8`, `W_T_5_8`, `O_T_5_8`, `W_T_6_8`, `O_T_6_8`, `W_T_7_8`, `O_T_7_8`, `Remark_8`, `date_working_9`, `from_working_9`, `to_working_9`, `CNC_Milling_9`, `E_D_M_9`, `Drilling_9`, `Grinding_9`, `Lathe_9`, `Milling_9`, `Other_9`, `W_T_1_9`, `O_T_1_9`, `W_T_2_9`, `O_T_2_9`, `W_T_3_9`, `O_T_3_9`, `W_T_4_9`, `O_T_4_9`, `W_T_5_9`, `O_T_5_9`, `W_T_6_9`, `O_T_6_9`, `W_T_7_9`, `O_T_7_9`, `Remark_9`, `date_working_10`, `from_working_10`, `to_working_10`, `CNC_Milling_10`, `E_D_M_10`, `Drilling_10`, `Grinding_10`, `Lathe_10`, `Milling_10`, `Other_10`, `W_T_1_10`, `O_T_1_10`, `W_T_2_10`, `O_T_2_10`, `W_T_3_10`, `O_T_3_10`, `W_T_4_10`, `O_T_4_10`, `W_T_5_10`, `O_T_5_10`, `W_T_6_10`, `O_T_6_10`, `W_T_7_10`, `O_T_7_10`, `Remark_10`, `date_working_11`, `from_working_11`, `to_working_11`, `CNC_Milling_11`, `E_D_M_11`, `Drilling_11`, `Grinding_11`, `Lathe_11`, `Milling_11`, `Other_11`, `W_T_1_11`, `O_T_1_11`, `W_T_2_11`, `O_T_2_11`, `W_T_3_11`, `O_T_3_11`, `W_T_4_11`, `O_T_4_11`, `W_T_5_11`, `O_T_5_11`, `W_T_6_11`, `O_T_6_11`, `W_T_7_11`, `O_T_7_11`, `Remark_11`, `date_working_12`, `from_working_12`, `to_working_12`, `CNC_Milling_12`, `E_D_M_12`, `Drilling_12`, `Grinding_12`, `Lathe_12`, `Milling_12`, `Other_12`, `W_T_1_12`, `O_T_1_12`, `W_T_2_12`, `O_T_2_12`, `W_T_3_12`, `O_T_3_12`, `W_T_4_12`, `O_T_4_12`, `W_T_5_12`, `O_T_5_12`, `W_T_6_12`, `O_T_6_12`, `W_T_7_12`, `O_T_7_12`, `Remark_12`, `create_by`) VALUES
(1, 'WORK18080000', 2, '', '', 'Y', '', '', '', '', '', 'Y', '', '', 'ToolName', 'asd', 'aas,', 'ttt,', '2018-08-26', '2018-08-09', '2018-08-02', 'asdas', 'das', 'da', 'sd', 'as', 'dasdasdas', 'asdasd', 'zx', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(2, 'WORK18080001', 2, '', '', 'Y', '', '', '', '', '', '', '', '', 'asdasdas', 'dasd', 'asd,', 'asd,', '', '', '2018-08-01', 'asda', '', 'as', '', 'd', 'a', 'asdsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asd', 'as', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'das', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(3, '005', 3, '', 'Y', '', '', '', '', '', '', 'Y', '', '', 'ToolName', 'asdas', 'TEMP015,ssSSAA,', 'SDFF,test2,', '2018-08-10', '2018-08-30', '2018-08-23', 'asd', 'asd', 'asdas', 'as', 'dasdasd', 'as', 'asdasd', 'zx', 'd', 'asd', '', '', '', 'asd', 'asd', '', '', '', '', 'adw', 'asd', 'xzx', '', '', '', '', '', '', '', 'd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(4, '005', 3, '', 'Y', '', '', '', '', '', '', 'Y', '', '', 'ToolName', 'asdas', 'TEMP015,ssSSAA,', 'SDFF,test2,', '2018-08-09', '2018-08-30', '2018-08-09', 'asd', 'asdasdasd', 'asd', 'asd', 'dasasd', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(5, '001', 6, 'asdasdasdasd', 'Y', '', 'Y', '', 'Y', 'fsdfsdf', 'teadasd', 'Y', 'Y', 'asdasd', 'ToolName', 'Assets', 'SSS1081-S1,SSS1081-E1,SSS1081-A2,', 'QRO309-DD GEAR TRAY,MAGNETIC BALLAST 26W.,QRO309-DD LEFT REFL.,', '2018-08-03', '2018-08-16', '2018-08-21', 'dasasd', 'as', 'dasd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'as', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'das', '', '', 'as', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3),
(6, '001', 6, 'asdasdasdasd', 'Y', '', 'Y', '', 'Y', 'fsdfsdf', 'teadasd', 'Y', '', 'asdasd', 'ToolName', 'Assets', 'SSS1081-S1,SSS1081-E1,SSS1081-A2,', 'QRO309-DD GEAR TRAY,MAGNETIC BALLAST 26W.,QRO309-DD LEFT REFL.,', '2018-08-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asdd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asd', '', '', 'sad', '', '', 'as', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3);

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
  MODIFY `id_renew` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `working_record`
--
ALTER TABLE `working_record`
  MODIFY `id_w_record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
