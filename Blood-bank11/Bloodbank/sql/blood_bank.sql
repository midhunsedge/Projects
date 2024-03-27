-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 04:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `bank_id` int(10) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `logid` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`bank_id`, `bank_name`, `address`, `phone`, `email`, `logid`) VALUES
(1, 'doctor 1', '2', 'spec updated', 'email@gmail.com', 1),
(7, 'kollam ESI blood bank', 'kollam', '8956895688', 'klm@gmail.com', 22);

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `stock_id` int(10) NOT NULL,
  `b_type` varchar(30) NOT NULL,
  `b_section` text NOT NULL,
  `b_unit` varchar(30) NOT NULL,
  `bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`stock_id`, `b_type`, `b_section`, `b_unit`, `bank`) VALUES
(1, '0+', '2', '25', 0),
(3, 'B+', '2', '10', 0),
(4, 'B-', '2', '30', 0),
(5, 'B-', '8', '30', 0),
(6, 'B+', '8', '3', 0),
(7, 'O-', '16', '40', 0),
(8, 'gfdg', '0', ' ', 22),
(9, 'fdgf', '0', ' ', 22),
(10, 'nhgfh', 'ghf', 'eeee', 22);

-- --------------------------------------------------------

--
-- Table structure for table `branch_transfor`
--

CREATE TABLE `branch_transfor` (
  `transfor_id` int(11) NOT NULL,
  `requested_branch` int(11) NOT NULL,
  `request_branch` int(11) NOT NULL,
  `blood_type` varchar(60) NOT NULL,
  `section` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `request_date` date NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch_transfor`
--

INSERT INTO `branch_transfor` (`transfor_id`, `requested_branch`, `request_branch`, `blood_type`, `section`, `unit`, `request_date`, `status`) VALUES
(1, 1, 22, 'gfd', 'fdf', 'fdf', '2023-06-12', 'Accepted'),
(2, 22, 1, 'df', 'sdfsd', 'fsdfg', '2023-06-17', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `donar_accept`
--

CREATE TABLE `donar_accept` (
  `accept_id` int(11) NOT NULL,
  `d_request_id` int(11) NOT NULL,
  `logid` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donar_accept`
--

INSERT INTO `donar_accept` (`accept_id`, `d_request_id`, `logid`, `status`) VALUES
(1, 10, 4, 'Accept'),
(2, 14, 27, 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `health_tips`
--

CREATE TABLE `health_tips` (
  `tip_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `message` text NOT NULL,
  `tip_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `health_tips`
--

INSERT INTO `health_tips` (`tip_id`, `staff_id`, `message`, `tip_date`) VALUES
(8, 26, 'hcgfhfg	', '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `request_donation`
--

CREATE TABLE `request_donation` (
  `d_request_id` int(25) NOT NULL,
  `blood_type` varchar(100) NOT NULL,
  `units` varchar(255) NOT NULL,
  `request_date` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_donation`
--

INSERT INTO `request_donation` (`d_request_id`, `blood_type`, `units`, `request_date`, `status`, `bank_id`) VALUES
(1, '2', 'kns', '0000-00-00', '908765655', 0),
(10, 'O+ve', '2 bottile', '2023-06-11', 'Waiting', 22),
(11, 'cfsdf', 'fdgdf', '2023-06-17', 'Waiting', 22),
(12, 'fsdfds', 'fdsgsdf', '2023-06-17', 'Waiting', 22),
(13, 'fsdfds', 'fdsgsdf', '2023-06-17', 'Waiting', 22),
(14, 'dfgdfg', 'gfgdfghdfgh', '2023-06-17', 'Waiting', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood_request`
--

CREATE TABLE `tbl_blood_request` (
  `request_id` int(11) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `request_date` date NOT NULL,
  `unit` varchar(60) NOT NULL,
  `logid` int(11) DEFAULT NULL,
  `hospital_details` text DEFAULT NULL,
  `patient_details` text NOT NULL,
  `status` varchar(50) NOT NULL COMMENT '1-waiting,2-collected,3-donate',
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_blood_request`
--

INSERT INTO `tbl_blood_request` (`request_id`, `blood_type`, `request_date`, `unit`, `logid`, `hospital_details`, `patient_details`, `status`, `bank_id`) VALUES
(2, 'gdgfd', '2023-06-17', 'gsdgsd', 21, 'gfdg', 'gfdg', '3', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `comp_id` int(25) NOT NULL,
  `logid` int(25) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`comp_id`, `logid`, `subject`, `message`, `reply`) VALUES
(1, 21, 'fdfsd', 'gfddfgf', ' hgf'),
(2, 21, 'dsfasdf', 'dfsfsdfd', ' hgfhfh'),
(3, 27, 'bvgf', 'bgfh', ' ghfdghfh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL COMMENT '1-admin, 2-user, 3-health advicer,4-bank'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1),
(2, 'bank', 'bank', 4),
(3, 'staff', 'staff', 3),
(4, 'user', 'user', 2),
(21, 'sarath', 'sarath123', 2),
(22, 'klm@gmail.com', 'kollam', 4),
(26, 'ammu@gmail.com', '895623', 3),
(27, 'arya', 'arya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(25) NOT NULL,
  `logid` int(25) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_phone` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `logid`, `staff_name`, `staff_phone`, `staff_email`, `designation`, `status`, `staff_photo`) VALUES
(1, 2, 'asms', 'kollam', '904356789', '', '', ''),
(6, 26, 'ammu', '8956235689', 'ammu@gmail.com', 'advisor', 'Active', '02.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_register`
--

CREATE TABLE `tbl_user_register` (
  `reg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `b_group` varchar(12) NOT NULL,
  `age` int(11) NOT NULL,
  `ph` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `district` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user_register`
--

INSERT INTO `tbl_user_register` (`reg_id`, `user_id`, `f_name`, `l_name`, `address`, `b_group`, `age`, `ph`, `email`, `gender`, `user_role`, `district`, `status`) VALUES
(1, 4, 'arathy', 'vani', 'test address', 'O+', 25, '85', 'arathy@gmail.com', '0', 'receiver', 'doner', 0),
(12, 21, 'sarath', 'kumar', 'test address', 'O-', 25, '8956238956', 'sarath@gmail.com', '0', 'receiver', 'Thiruvanant', 0),
(13, 27, 'arya', 'sdfs', 'dfgdffg', 'AB+', 45, '8678879809', 'arya@gmail.com', 'F', 'doner', 'Kollam', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `branch_transfor`
--
ALTER TABLE `branch_transfor`
  ADD PRIMARY KEY (`transfor_id`);

--
-- Indexes for table `donar_accept`
--
ALTER TABLE `donar_accept`
  ADD PRIMARY KEY (`accept_id`);

--
-- Indexes for table `health_tips`
--
ALTER TABLE `health_tips`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indexes for table `request_donation`
--
ALTER TABLE `request_donation`
  ADD PRIMARY KEY (`d_request_id`);

--
-- Indexes for table `tbl_blood_request`
--
ALTER TABLE `tbl_blood_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `bank_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blood_stock`
--
ALTER TABLE `blood_stock`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `branch_transfor`
--
ALTER TABLE `branch_transfor`
  MODIFY `transfor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donar_accept`
--
ALTER TABLE `donar_accept`
  MODIFY `accept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `health_tips`
--
ALTER TABLE `health_tips`
  MODIFY `tip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request_donation`
--
ALTER TABLE `request_donation`
  MODIFY `d_request_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_blood_request`
--
ALTER TABLE `tbl_blood_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `comp_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
