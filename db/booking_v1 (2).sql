-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 01:43 PM
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
-- Database: `booking_v1`
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
  `blocking_slot_doctor` int(4) NOT NULL,
  `blocking_slot_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-Date Wise,1-Permanent'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blocking_slot`
--

INSERT INTO `tbl_blocking_slot` (`blocking_slot_id`, `blocking_slot_date`, `blocking_slot_time`, `blocking_slot_status`, `blocking_slot_clinic`, `blocking_slot_doctor`, `blocking_slot_type`) VALUES
(1, '2020-12-25', '10:15:00', 7, 1, 1, 0),
(2, '2020-12-25', '10:20:00', 7, 1, 1, 0),
(3, '0000-00-00', '11:00:00', 7, 1, 1, 1),
(4, '0000-00-00', '11:05:00', 7, 1, 1, 1),
(5, '0000-00-00', '11:10:00', 7, 1, 1, 1),
(6, '0000-00-00', '11:15:00', 7, 1, 1, 1),
(7, '0000-00-00', '11:20:00', 7, 1, 1, 1),
(8, '0000-00-00', '11:25:00', 7, 1, 1, 1),
(9, '0000-00-00', '11:30:00', 7, 1, 1, 1),
(10, '0000-00-00', '11:35:00', 7, 1, 1, 1),
(11, '0000-00-00', '11:40:00', 7, 1, 1, 1),
(12, '0000-00-00', '11:45:00', 7, 1, 1, 1),
(13, '0000-00-00', '11:50:00', 7, 1, 1, 1),
(14, '0000-00-00', '11:55:00', 7, 1, 1, 1),
(15, '0000-00-00', '15:00:00', 7, 2, 1, 1),
(16, '0000-00-00', '15:05:00', 7, 2, 1, 1),
(17, '0000-00-00', '15:10:00', 7, 2, 1, 1),
(18, '0000-00-00', '15:15:00', 7, 2, 1, 1),
(19, '0000-00-00', '15:20:00', 7, 2, 1, 1),
(20, '0000-00-00', '15:25:00', 7, 2, 1, 1),
(21, '0000-00-00', '15:30:00', 7, 2, 1, 1),
(22, '0000-00-00', '15:35:00', 7, 2, 1, 1),
(23, '0000-00-00', '15:40:00', 7, 2, 1, 1),
(24, '0000-00-00', '15:45:00', 7, 2, 1, 1),
(25, '0000-00-00', '15:50:00', 7, 2, 1, 1),
(26, '0000-00-00', '15:55:00', 7, 2, 1, 1);

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
  `booking_status` tinyint(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table booking_v1.tbl_booking: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `booking_v1`.`tbl_booking`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_slot`
--

CREATE TABLE `tbl_booking_slot` (
  `booking_slot_id` int(11) NOT NULL,
  `booking_slot_booking` int(11) NOT NULL,
  `booking_slot_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking_slot`
--

INSERT INTO `tbl_booking_slot` (`booking_slot_id`, `booking_slot_booking`, `booking_slot_time`) VALUES
(1, 1, '09:05:00'),
(2, 2, '09:20:00'),
(3, 2, '09:25:00'),
(4, 3, '09:45:00'),
(14, 21, '05:30:00'),
(16, 23, '05:30:00'),
(17, 23, '05:30:00'),
(18, 24, '05:30:00'),
(19, 24, '05:30:00'),
(20, 25, '05:30:00'),
(21, 25, '05:30:00'),
(22, 35, '10:20:00'),
(23, 35, '10:25:00'),
(24, 36, '10:05:00'),
(25, 36, '10:10:00'),
(26, 37, '10:05:00'),
(27, 37, '10:10:00'),
(28, 38, '10:00:00'),
(29, 38, '10:05:00'),
(30, 39, '09:50:00'),
(31, 39, '09:55:00'),
(32, 40, '10:20:00'),
(33, 40, '10:25:00'),
(34, 41, '10:20:00'),
(35, 41, '10:25:00'),
(36, 42, '09:40:00'),
(37, 42, '09:45:00'),
(38, 43, '09:45:00'),
(39, 43, '09:50:00'),
(40, 44, '09:55:00'),
(41, 44, '10:00:00'),
(42, 45, '10:05:00'),
(43, 45, '10:10:00'),
(44, 46, '09:40:00'),
(45, 46, '09:45:00'),
(46, 47, '09:00:00'),
(47, 47, '09:05:00'),
(48, 48, '09:50:00'),
(49, 48, '09:55:00'),
(50, 49, '10:00:00'),
(51, 49, '10:05:00'),
(52, 50, '10:10:00'),
(53, 50, '10:15:00'),
(54, 51, '09:25:00'),
(55, 51, '09:30:00'),
(56, 52, '10:05:00'),
(57, 52, '10:10:00'),
(58, 53, '10:20:00'),
(59, 53, '10:25:00'),
(60, 54, '10:05:00'),
(61, 54, '10:10:00'),
(62, 55, '10:05:00'),
(63, 55, '10:10:00'),
(64, 56, '10:20:00'),
(65, 56, '10:25:00'),
(66, 57, '10:20:00'),
(67, 57, '10:25:00'),
(68, 58, '10:00:00'),
(69, 58, '10:05:00'),
(70, 59, '10:05:00'),
(71, 59, '10:10:00'),
(72, 60, '09:55:00'),
(73, 60, '10:00:00'),
(74, 61, '09:55:00'),
(75, 61, '10:00:00'),
(76, 62, '09:00:00'),
(77, 62, '09:05:00');

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
  `clinic_inserted_by` int(6) NOT NULL,
  `clinic_inserted_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `clinic_modified_by` int(6) NOT NULL,
  `clinic_modified_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `clinic_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clinic`
--

INSERT INTO `tbl_clinic` (`clinic_id`, `clinic_user`, `clinic_name`, `clinic_location`, `clinic_phone`, `clinic_email`, `clinic_inserted_by`, `clinic_inserted_date`, `clinic_modified_by`, `clinic_modified_date`, `clinic_status`) VALUES
(1, 12, 'abcd', 'dfgt', 234234324, 'rtrtrt@mail.com', 0, '2021-02-02 06:16:20', 0, '2021-02-02 06:16:20', 1),
(2, 0, 'Alshifa', 'Kuttippala', 2147483647, 'alshifa@gmail.com', 0, '2021-02-02 06:16:20', 0, '2021-02-02 06:16:20', 1),
(3, 0, 'Almas', 'kottakkal', 2147483647, 'almas@gmail.com', 0, '2021-02-02 06:16:20', 0, '2021-02-02 06:16:20', 1),
(4, 0, '', '', 123456789, '', 0, '2021-02-02 06:16:20', 0, '2021-02-02 06:16:20', 1),
(5, 0, 'Tharayil', 'Tharayil', 2147483647, 'aslam@gmail.com', 0, '2021-02-02 06:16:20', 0, '2021-02-02 06:16:20', 1),
(6, 13, '', 'tirur', 1234567890, 'test@mail.com', 11, '2021-02-01 19:53:26', 11, '2021-02-01 19:53:26', 1),
(7, 14, 'Clinc_x', 'tirur', 1234567890, 'test@mail.com', 11, '2021-02-01 19:56:11', 11, '2021-02-01 19:56:11', 1),
(8, 15, 'Clinic_a', 'tirur', 1234569870, 'clinica@mail.com', 11, '2021-02-01 19:58:19', 11, '2021-02-01 19:58:19', 1),
(9, 16, 'Clinic_b', 'tirur', 2147483647, 'clinic_b@mail.com', 11, '2021-02-01 20:12:20', 11, '2021-02-01 20:12:20', 1);

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
  `schedule_break_from` time NOT NULL,
  `schedule_break_to` time NOT NULL,
  `schedule_closing_day` tinyint(2) NOT NULL DEFAULT 0,
  `schedule_closing_hour` time NOT NULL,
  `schedule_status` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clinic_schedule`
--

INSERT INTO `tbl_clinic_schedule` (`schedule_id`, `schedule_clinic`, `schedule_day`, `schedule_from`, `schedule_to`, `schedule_break_from`, `schedule_break_to`, `schedule_closing_day`, `schedule_closing_hour`, `schedule_status`) VALUES
(7, 1, 1, '09:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '00:00:00', 1),
(2, 1, 2, '09:00:00', '17:00:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(3, 1, 3, '09:00:00', '17:00:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(4, 1, 4, '09:00:00', '17:00:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(5, 1, 5, '09:00:00', '17:00:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(6, 1, 6, '09:00:00', '17:00:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(1, 1, 0, '09:00:00', '17:00:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(8, 0, 0, '01:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(9, 0, 1, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(10, 0, 2, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(11, 0, 3, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(12, 0, 4, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(13, 0, 5, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(14, 0, 6, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(15, 0, 0, '01:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(16, 0, 1, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(17, 0, 2, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(18, 0, 3, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(19, 0, 4, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(20, 0, 5, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(21, 0, 6, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(22, 8, 0, '01:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(23, 8, 1, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(24, 8, 2, '09:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 1),
(25, 8, 3, '01:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(26, 8, 4, '01:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(27, 8, 5, '01:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(28, 8, 6, '01:30:00', '01:30:00', '00:00:00', '00:00:00', 0, '00:00:00', 0),
(29, 9, 0, '01:45:00', '01:45:00', '12:00:00', '01:00:00', 0, '00:00:00', 0),
(30, 9, 1, '09:00:00', '05:00:00', '12:00:00', '01:00:00', 0, '00:00:00', 1),
(31, 9, 2, '09:00:00', '05:00:00', '12:00:00', '01:00:00', 0, '00:00:00', 1),
(32, 9, 3, '01:45:00', '01:45:00', '12:00:00', '01:00:00', 0, '00:00:00', 0),
(33, 9, 4, '10:00:00', '03:00:00', '12:00:00', '01:00:00', 0, '00:00:00', 1),
(34, 9, 5, '01:45:00', '01:45:00', '12:00:00', '01:00:00', 0, '00:00:00', 0),
(35, 9, 6, '01:45:00', '01:45:00', '12:00:00', '01:00:00', 0, '00:00:00', 0);

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

--
-- Dumping data for table `tbl_diagnose`
--

INSERT INTO `tbl_diagnose` (`diagnose_id`, `diagnose_name`, `diagnose_slot_duration`, `diagnose_status`) VALUES
(1, 'thalavedhana', 5, 1),
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
(1, 2, 'Dr. Aslam', 'Dr', 0, '0000-00-00 00:00:00', 0, '2020-12-19 11:25:33', 1),
(2, 4, 'Dr. Noushid', 'Dr', 0, '0000-00-00 00:00:00', 0, '2020-12-25 11:54:59', 1),
(3, 5, 'Dr. Muhaimin', 'Dr', 0, '0000-00-00 00:00:00', 0, '2020-12-26 09:28:54', 1);

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

--
-- Dumping data for table `tbl_doctor_clinic`
--

INSERT INTO `tbl_doctor_clinic` (`doctor_clinic_id`, `doctor_clinic_clinic`, `doctor_clinic_doctor`, `doctor_clinic_day`, `doctor_clinic_from`, `doctor_clinic_to`, `doctor_clinic_status`) VALUES
(1, 2, 1, 4, '09:00:00', '10:30:00', 1),
(2, 1, 2, 4, '09:00:00', '17:00:00', 1),
(3, 5, 3, 0, '09:00:00', '17:00:00', 1),
(4, 2, 1, 0, '09:00:00', '17:00:00', 1),
(5, 1, 1, 0, '09:00:00', '17:00:00', 1),
(6, 1, 1, 1, '09:00:00', '10:30:00', 1),
(7, 1, 1, 2, '09:00:00', '10:30:00', 1),
(8, 1, 1, 3, '09:00:00', '10:30:00', 1),
(9, 1, 1, 4, '09:00:00', '10:30:00', 1),
(10, 1, 1, 5, '09:00:00', '10:30:00', 1),
(11, 1, 1, 6, '09:00:00', '10:30:00', 1),
(12, 1, 1, 0, '06:15:00', '06:15:00', 0),
(13, 1, 1, 1, '06:15:00', '06:15:00', 0),
(14, 1, 1, 2, '06:15:00', '06:15:00', 0),
(15, 1, 1, 3, '06:15:00', '06:15:00', 0),
(16, 1, 1, 4, '06:15:00', '06:15:00', 0),
(17, 1, 1, 5, '06:15:00', '06:15:00', 0),
(18, 1, 1, 6, '06:15:00', '06:15:00', 0),
(19, 2, 1, 0, '06:15:00', '06:15:00', 0),
(20, 2, 1, 1, '06:15:00', '06:15:00', 0),
(21, 2, 1, 2, '06:15:00', '06:15:00', 0),
(22, 2, 1, 3, '06:15:00', '06:15:00', 0),
(23, 2, 1, 4, '06:15:00', '06:15:00', 0),
(24, 2, 1, 5, '06:15:00', '06:15:00', 0),
(25, 2, 1, 6, '06:15:00', '06:15:00', 0);

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
  `patient_place` varchar(120) NOT NULL,
  `patient_insert_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `patient_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `patient_refer_user`, `patient_name`, `patient_address`, `patient_age`, `patient_dob`, `patient_gender`, `patient_mobile`, `patient_place`, `patient_insert_datetime`, `patient_status`) VALUES
(1, 0, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(2, 0, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(3, 0, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(4, 0, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(5, 0, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(6, 0, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(7, 0, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(8, 3, 'Mohamed Afsal', 'Pallippatttu thuoomban-H', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(9, 3, 'Raseel', 'Chettiyamkinar', '0.00', '2020-12-25', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(10, 3, '', '', '0.00', '0000-00-00', 0, 0, '', '2021-01-20 05:10:22', 0),
(11, 3, 'Arjun', 'Puthiyangadi', '0.00', '2020-12-26', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(12, 9, 'Adiyy', 'Cherichi', '0.00', '2020-12-26', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(13, 9, 'Adiyy', 'Cherichi', '0.00', '2020-12-26', 0, 2147483647, '', '2021-01-20 05:10:22', 0),
(14, 9, 'Raseel', NULL, '0.00', '0000-00-00', 1, 8606058897, '', '2021-01-20 05:10:22', 1),
(15, 9, 'Afsal', NULL, '0.00', '1995-10-10', 1, 8606058897, '', '2021-01-20 05:10:22', 1),
(16, 9, 'muha', NULL, '0.00', '1970-01-01', 1, 88555, '', '2021-01-20 05:10:22', 1),
(17, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(18, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(19, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(20, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(21, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(22, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(23, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(24, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(25, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(26, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(27, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(28, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(29, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(30, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(31, 9, 'arun', NULL, '0.00', '1970-01-01', 1, 8458458888, '', '2021-01-20 05:10:22', 1),
(32, 9, 'anu', 'pppppppppppp', '0.00', '1970-01-01', 1, 7894555555, 'kkkkkkkkkk', '2021-01-20 05:11:36', 1);

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
(2, 'Pending', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-warning\'>Pending</button>', '2020-12-21 09:39:50'),
(3, 'Delete', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-danger\'>Delete</button>', '2020-12-21 09:39:50'),
(4, 'Drop', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-danger\'>Drop</button>', '2020-12-21 09:41:53'),
(5, 'Confirmed', NULL, '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-danger\'>Drop</button>', '2020-12-21 09:41:53'),
(6, 'Postponed', 'Task Postponed to ', '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-warning\'>Postponed</button>', '2020-12-29 10:43:07'),
(7, 'Block', 'Task Bloked', '<button type=\'button\' style=\'margin-top:-5px; margin-bottom:-5px;\' class=\'btn btn-xs btn-danger\'>Block</button>', '2020-12-29 10:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(6) NOT NULL,
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
(1, 'Afsal', 'afsal', 'Tirur', NULL, 4, 0, 'e807f1fcf82d132f9bb018ca6738a19f', 'afsalpt373@gmail.com', '7994226327', '', 0, '0000-00-00 00:00:00', 0, '2020-12-23 10:28:48', 1),
(2, 'Afsal', 'raseel', 'Tirur', NULL, 4, 0, 'e807f1fcf82d132f9bb018ca6738a19f', '', '7000000000', '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 05:16:35', 1),
(3, 'Arjun', 'arjun', 'Tirur', NULL, 4, 0, 'e807f1fcf82d132f9bb018ca6738a19f', '', '1234564890', '', 0, '0000-00-00 00:00:00', 0, '2020-12-24 05:18:15', 1),
(4, 'Noushid', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-25 11:54:59', 1),
(5, 'Muhaimin', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-26 09:28:54', 1),
(6, 'Muhaimin', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-26 09:29:06', 1),
(7, 'Muhaimin', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-26 09:29:10', 1),
(8, 'Muhaimin', '', '', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, '2020-12-26 09:29:10', 1),
(9, 'Adiyy', 'adiyy', 'Kottakkal', NULL, 4, 0, '25d55ad283aa400af464c76d713c07ad', '', '9746314313', '', 0, '0000-00-00 00:00:00', 0, '2020-12-26 16:56:52', 1),
(10, 'Mohammed Afsal PT', 'afsalpt', 'Thalakkadathur', NULL, 4, 0, 'e807f1fcf82d132f9bb018ca6738a19f', 'afsalpt373@gmail.com', '9020373111', '', 0, '0000-00-00 00:00:00', 0, '2020-12-31 05:25:50', 1),
(11, 'Admin', 'Admin', 'Tirur', NULL, 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 'afsalpt373@gmail.com', '7994226327', '', 0, '0000-00-00 00:00:00', 0, '2020-12-23 10:28:48', 1),
(12, 'ABCD', 'abcd', 'Tirur', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', 'afsalpt373@gmail.com', '7994226327', '', 0, '0000-00-00 00:00:00', 0, '2020-12-23 10:28:48', 1),
(13, '', 'clinic_x', 'tirur', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', 'test@mail.com', '1234567890', '', 11, '2021-02-02 01:23:26', 11, '2021-02-01 19:53:26', 1),
(14, 'Clinc_x', 'clinic_x1', 'tirur', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', 'test@mail.com', '1234567890', '', 11, '2021-02-02 01:26:11', 11, '2021-02-01 19:56:11', 1),
(15, 'Clinic_a', 'clinic_a', 'tirur', NULL, 2, 0, 'e10adc3949ba59abbe56e057f20f883e', 'clinica@mail.com', '1234569870', '', 11, '2021-02-02 01:28:19', 11, '2021-02-01 19:58:19', 1),
(16, 'Clinic_b', 'clinic_b', 'tirur', NULL, 2, 0, 'eb89f40da6a539dd1b1776e522459763', 'clinic_b@mail.com', '7412589630', '', 11, '2021-02-02 01:42:20', 11, '2021-02-01 20:12:20', 1);

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
(2, 'Clinic Admin', '1', 1),
(3, 'Doctor', '', 1),
(4, 'Subscriber', '', 1);

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
  MODIFY `blocking_slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_booking_slot`
--
ALTER TABLE `tbl_booking_slot`
  MODIFY `booking_slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  MODIFY `clinic_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_clinic_schedule`
--
ALTER TABLE `tbl_clinic_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `doctor_clinic_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
