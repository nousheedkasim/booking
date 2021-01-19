-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 11:12 AM
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
-- Database: `temp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blocking_slot`
--

CREATE TABLE `tbl_blocking_slot` (
  `blocking_slot_id` int(11) NOT NULL,
  `blocking_slot_date` date NOT NULL,
  `blocking_slot_time` time NOT NULL,
  `blocking_slot_status` tinyint(1) NOT NULL DEFAULT 7,
  `blocking_slot_clinic` int(4) NOT NULL,
  `blocking_slot_doctor` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_tocken` varchar(10) NOT NULL,
  `booking_patient` int(6) NOT NULL,
  `booking_diagnosis` int(6) NOT NULL,
  `booking_clinic` int(4) NOT NULL,
  `booking_doctor` int(4) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_insert_datetime` datetime NOT NULL,
  `booking_modified_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_slot`
--

CREATE TABLE `tbl_booking_slot` (
  `booking_slot_id` int(11) NOT NULL,
  `booking_slot_booking` int(11) NOT NULL,
  `booking_slot_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic`
--

CREATE TABLE `tbl_clinic` (
  `clinic_id` tinyint(4) NOT NULL,
  `clinic_user` int(4) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `clinic_location` varchar(50) NOT NULL,
  `clinic_phone` int(15) NOT NULL,
  `clinic_email` varchar(100) NOT NULL,
  `clinic_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic_schedule`
--

CREATE TABLE `tbl_clinic_schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_clinic` int(6) NOT NULL,
  `schedule_day` tinyint(1) NOT NULL,
  `schedule_from` time NOT NULL,
  `schedule_to` time NOT NULL,
  `schedule_closing_day` tinyint(2) NOT NULL DEFAULT 0,
  `schedule_closing_hour` time NOT NULL,
  `schedule_status` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnose`
--

CREATE TABLE `tbl_diagnose` (
  `diagnose_id` int(6) NOT NULL,
  `diagnose_name` varchar(50) NOT NULL,
  `diagnose_slot_duration` tinyint(4) NOT NULL,
  `diagnose_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_clinic`
--

CREATE TABLE `tbl_doctor_clinic` (
  `doctor_clinic_id` int(6) NOT NULL,
  `doctor_clinic_clinic` tinyint(4) NOT NULL,
  `doctor_clinic_doctor` int(4) NOT NULL,
  `doctor_clinic_day` tinyint(4) NOT NULL,
  `doctor_clinic_from` time NOT NULL,
  `doctor_clinic_to` time NOT NULL,
  `doctor_clinic_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(6) NOT NULL,
  `patient_refer_user` int(4) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `patient_address` varchar(256) DEFAULT NULL,
  `patient_age` decimal(3,2) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_gender` tinyint(1) NOT NULL,
  `patient_mobile` bigint(10) NOT NULL,
  `patient_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blocking_slot`
--
ALTER TABLE `tbl_blocking_slot`
  ADD PRIMARY KEY (`blocking_slot_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_patient` (`booking_patient`),
  ADD KEY `booking_clinic` (`booking_clinic`),
  ADD KEY `booking_doctor` (`booking_doctor`),
  ADD KEY `booking_status` (`booking_status`),
  ADD KEY `booking_diagnosis` (`booking_diagnosis`);

--
-- Indexes for table `tbl_booking_slot`
--
ALTER TABLE `tbl_booking_slot`
  ADD PRIMARY KEY (`booking_slot_id`);

--
-- Indexes for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `tbl_clinic_schedule`
--
ALTER TABLE `tbl_clinic_schedule`
  ADD PRIMARY KEY (`schedule_id`);

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
-- AUTO_INCREMENT for table `tbl_blocking_slot`
--
ALTER TABLE `tbl_blocking_slot`
  MODIFY `blocking_slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_booking_slot`
--
ALTER TABLE `tbl_booking_slot`
  MODIFY `booking_slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  MODIFY `clinic_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_clinic_schedule`
--
ALTER TABLE `tbl_clinic_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_diagnose`
--
ALTER TABLE `tbl_diagnose`
  MODIFY `diagnose_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_doctor_clinic`
--
ALTER TABLE `tbl_doctor_clinic`
  MODIFY `doctor_clinic_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
