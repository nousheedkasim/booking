-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 05:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_patient` int(4) NOT NULL,
  `booking_diagnosis` smallint(6) NOT NULL,
  `booking_clinic` int(4) NOT NULL,
  `booking_doctor` int(4) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_insert_datetime` datetime NOT NULL,
  `booking_modified_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_status` tinyint(2) NOT NULL COMMENT '2-Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic`
--

CREATE TABLE `tbl_clinic` (
  `clinic_id` tinyint(4) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `clinic_location` varchar(50) NOT NULL,
  `clinic_phone` int(15) NOT NULL,
  `clinic_email` varchar(100) NOT NULL,
  `clinick_working_days` varchar(13) NOT NULL DEFAULT '1,1,1,1,1,1,0',
  `clinic_working_from` time NOT NULL,
  `clinic_working_to` time NOT NULL,
  `clinic_working_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clinic`
--

INSERT INTO `tbl_clinic` (`clinic_id`, `clinic_name`, `clinic_location`, `clinic_phone`, `clinic_email`, `clinick_working_days`, `clinic_working_from`, `clinic_working_to`, `clinic_working_status`) VALUES
(1, 'abcd', 'dfgt', 234234324, 'rtrtrt@mail.com', '1,1,1,1,1,1,0', '00:00:45', '00:00:00', 1),
(2, 'Alshifa', 'Kuttippala', 2147483647, 'alshifa@gmail.com', '1,1,1,1,1,1,0', '09:00:00', '07:00:00', 1),
(3, 'Almas', 'kottakkal', 2147483647, 'almas@gmail.com', '1,1,1,1,1,1,0', '09:00:00', '12:45:00', 1),
(4, '', '', 123456789, '', '1,1,1,1,1,1,0', '00:00:00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnose`
--

CREATE TABLE `tbl_diagnose` (
  `diagnose_id` smallint(6) NOT NULL,
  `diagnose_name` varchar(50) NOT NULL,
  `diagnose_slot_duration` tinyint(4) NOT NULL,
  `diagnose_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diagnose`
--

INSERT INTO `tbl_diagnose` (`diagnose_id`, `diagnose_name`, `diagnose_slot_duration`, `diagnose_status`) VALUES
(1, 'thalavedhana', 10, 1),
(2, 'Fever', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_id` smallint(4) NOT NULL,
  `doctor_user` int(4) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `doctor_desig` varchar(15) NOT NULL,
  `doctor_created_by` int(4) NOT NULL,
  `doctor_created_datetime` datetime NOT NULL,
  `doctor_modified_by` int(4) NOT NULL,
  `doctor_modified_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `doctor_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `doctor_user`, `doctor_name`, `doctor_desig`, `doctor_created_by`, `doctor_created_datetime`, `doctor_modified_by`, `doctor_modified_datetime`, `doctor_status`) VALUES
(1, 2, 'Aslam', 'Doctor', 0, '0000-00-00 00:00:00', 0, '2020-12-19 11:25:33', 1),
(2, 3, 'Noushid', 'Dr', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:21:23', 1),
(3, 10, 'Muhaimin', 'dr', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:36:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_clinic`
--

CREATE TABLE `tbl_doctor_clinic` (
  `doctor_clinic_id` smallint(6) NOT NULL,
  `doctor_clinic_doctor` int(4) NOT NULL,
  `doctor_clinic_clinic` tinyint(4) NOT NULL,
  `doctor_clinic_from` time NOT NULL,
  `doctor_clinic_to` time NOT NULL,
  `doctor_clinic_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor_clinic`
--

INSERT INTO `tbl_doctor_clinic` (`doctor_clinic_id`, `doctor_clinic_doctor`, `doctor_clinic_clinic`, `doctor_clinic_from`, `doctor_clinic_to`, `doctor_clinic_status`) VALUES
(1, 1, 1, '07:00:00', '10:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(4) NOT NULL,
  `patient_user` int(4) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `patient_age` int(3) NOT NULL,
  `patient_gender` tinyint(1) NOT NULL,
  `patient_mobile` int(10) NOT NULL,
  `patient_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `patient_user`, `patient_name`, `patient_age`, `patient_gender`, `patient_mobile`, `patient_status`) VALUES
(1, 0, 'Arun', 10, 1, 30659875, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` tinyint(2) NOT NULL,
  `status_title` varchar(15) DEFAULT NULL,
  `status_description` varchar(50) DEFAULT NULL,
  `status_template` varchar(200) NOT NULL,
  `status_inserted_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_title`, `status_description`, `status_template`, `status_inserted_date`) VALUES
(1, 'Active', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-success\'>Active</button>', '2020-12-21 09:36:41'),
(2, 'Pending', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-info\'>Pending</button>', '2020-12-21 09:39:50'),
(3, 'Delete', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-warning\'>Delete</button>', '2020-12-21 09:39:50'),
(4, 'Drop', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-danger\'>Drop</button>', '2020-12-21 09:41:53'),
(5, 'Confirmed', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-danger\'>Drop</button>', '2020-12-21 09:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_login_id` varchar(25) NOT NULL,
  `user_location` varchar(75) NOT NULL,
  `user_code` varchar(10) DEFAULT NULL,
  `user_type` tinyint(2) NOT NULL,
  `user_branch` tinyint(4) NOT NULL,
  `user_password` varchar(512) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_mobile` varchar(15) DEFAULT NULL,
  `user_privilege` varchar(500) NOT NULL,
  `user_inserted_by` tinyint(4) NOT NULL,
  `user_inserted_date` datetime NOT NULL,
  `user_modified_by` tinyint(4) NOT NULL,
  `user_modified_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_login_id`, `user_location`, `user_code`, `user_type`, `user_branch`, `user_password`, `user_email`, `user_mobile`, `user_privilege`, `user_inserted_by`, `user_inserted_date`, `user_modified_by`, `user_modified_date`, `user_status`) VALUES
(1, 'Admin', '', '', 'A1', 1, 1, 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '8606058897', '1', 0, '0000-00-00 00:00:00', 0, '2020-12-17 18:21:39', 1),
(2, 'Aslam', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-19 11:25:33', 1),
(3, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:21:23', 1),
(4, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:21:31', 1),
(5, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:21:35', 1),
(6, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:21:35', 1),
(7, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:22:02', 1),
(8, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:22:20', 1),
(9, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:32:59', 1),
(10, 'Muhaimin', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 06:36:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type_id` tinyint(4) NOT NULL,
  `user_type_role` varchar(75) NOT NULL,
  `user_type_permission` varchar(200) NOT NULL,
  `user_type_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `user_type_role`, `user_type_permission`, `user_type_status`) VALUES
(1, 'Admin', '1', 1),
(2, 'Doctor', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `tbl_diagnose`
--
ALTER TABLE `tbl_diagnose`
  ADD PRIMARY KEY (`diagnose_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `doctor_status` (`doctor_status`);

--
-- Indexes for table `tbl_doctor_clinic`
--
ALTER TABLE `tbl_doctor_clinic`
  ADD PRIMARY KEY (`doctor_clinic_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type`,`user_branch`,`user_inserted_by`,`user_modified_by`,`user_status`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`),
  ADD KEY `user_type_status` (`user_type_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  MODIFY `clinic_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_diagnose`
--
ALTER TABLE `tbl_diagnose`
  MODIFY `diagnose_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_doctor_clinic`
--
ALTER TABLE `tbl_doctor_clinic`
  MODIFY `doctor_clinic_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
