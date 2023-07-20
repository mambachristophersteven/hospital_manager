-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 06:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `gps_address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `spouse_name` varchar(255) NOT NULL,
  `spouse_telephone` varchar(255) NOT NULL,
  `date_of_employment` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `admin_id_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `age`, `gender`, `marital_status`, `image`, `date_of_birth`, `address`, `gps_address`, `landmark`, `hometown`, `telephone1`, `telephone2`, `religion`, `spouse_name`, `spouse_telephone`, `date_of_employment`, `position`, `added_by`, `email`, `username`, `password`, `date_added`, `admin_id_code`) VALUES
(1, 'Christopher', 'Steven', '22', 'Male', 'Single', '../adminimages/admin.jpg', '2023-12-09', 'Kasoa', '', 'Amalena', 'Jamestown', '0592106300', '', 'Christian', '', '', '2023-05-24', 'Developer', 'Christopher Steven', 'astevoo24@gmail.com', 'mambalev', '245678', '2023-05-24', 'SA/AD/23/0001'),
(2, 'Christopher Steven', 'Nunoo', '44', 'Male', 'Single', '../adminimages/admin.jpg', '0000-00-00', 'Kasoa', '', 'Palace', 'Jamestown', '0244556699', '', 'Christian', '', '', '2023-05-10', 'Receptionist', 'Christopher Steven', 'astevoo24@gmail.com', 'godsnake', '447722', '2023-05-26', 'SA/AD/23/0002');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gps_address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `spouse_firstname` varchar(255) NOT NULL,
  `spouse_lastname` varchar(255) NOT NULL,
  `spouse_telephone` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date_of_employment` date NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `lastname`, `othername`, `age`, `gender`, `address`, `gps_address`, `landmark`, `hometown`, `telephone1`, `telephone2`, `religion`, `marital_status`, `spouse_firstname`, `spouse_lastname`, `spouse_telephone`, `department`, `date_of_employment`, `date_of_birth`, `image`, `date_added`, `email`, `username`, `password`, `position`, `added_by`) VALUES
(1, 'Christopher', 'Nunoo', 'Solomon', '21', 'Male', 'Tettegu', 'None', 'Palace', 'Jamestown', '0592106300', 'None', 'Christian', 'Single', 'None', 'None', 'None', 'Dental', '2023-05-25', '2023-05-25', '../adminimages/admin.jpg', '2023-05-26', 'chrisolomon0@gmail.com', 'jurmangandr', '774433', 'Doctor', 'Christopher Steven'),
(2, 'Elizabeth', 'Kunguson', 'Elsie', '28', 'Female', 'Spintex', 'None', 'Palace', 'Ho', '0592106300', 'None', 'Christian', 'Single', 'None', 'None', 'None', 'Gynae', '2023-05-25', '2023-05-25', '../adminimages/lizzy.jpg', '2023-05-25', 'lizzy@gmail.com', 'lizzy', '123456', 'Doctor', 'Christopher Steven');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `gps_address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `spouse_firstname` varchar(255) NOT NULL,
  `spouse_lastname` varchar(255) NOT NULL,
  `spouse_telephone` varchar(255) NOT NULL,
  `date_of_employment` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `firstname`, `lastname`, `othername`, `age`, `gender`, `marital_status`, `image`, `date_of_birth`, `address`, `gps_address`, `landmark`, `hometown`, `telephone1`, `telephone2`, `religion`, `spouse_firstname`, `spouse_lastname`, `spouse_telephone`, `date_of_employment`, `added_by`, `email`, `date_added`) VALUES
(1, 'Jemimah', 'Ninson', 'Ako', '21', 'Female', 'Single', '../nursesimages/lizzy.jpg', '2023-05-25', 'Teshie', 'None', 'Palace', 'Osu', '0592106300', 'None', 'Christian', 'None', 'None', 'None', '2023-05-25', 'Christopher Steven', 'jemimah464@icloud.com', '2023-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `gps_address` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `date_of_admission` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `patient_complaints` varchar(255) NOT NULL,
  `doctor_diagnosis` varchar(255) NOT NULL,
  `doctor_prescription` varchar(255) NOT NULL,
  `next_appointment_date` date NOT NULL,
  `doctor_recommendation` varchar(255) NOT NULL,
  `doctor_patient_complaints` varchar(500) NOT NULL,
  `diagnosed_by` varchar(255) NOT NULL,
  `diagnosis_date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `othername`, `age`, `gender`, `date_of_birth`, `address`, `gps_address`, `telephone1`, `telephone2`, `date_of_admission`, `added_by`, `date_added`, `patient_id`, `patient_complaints`, `doctor_diagnosis`, `doctor_prescription`, `next_appointment_date`, `doctor_recommendation`, `doctor_patient_complaints`, `diagnosed_by`, `diagnosis_date_added`) VALUES
(1, 'Emmanuel', 'Agyekum', '', '56', 'Male', '2023-05-26', 'Tettegu', 'None', '0592106300', 'None', '2023-05-26', 'Christopher Steven', '2023-05-27', 'SA/PA/23/0001', 'feverish, vomiting\r\n\r\n', 'cholera', 'paracetamol and gebedol', '2023-06-10', 'drink clean water and ear more fruits', 'feverish, vomiting, headache', 'Elizabeth Kunguson', '2023-05-28'),
(3, 'Rod', 'Smith', '', '34', 'Male', '2023-05-04', 'Tettegu', 'None', '0592106300', 'None', '2023-05-28', 'Christopher Steven Nunoo', '2023-05-28', '111', 'headache', '', '', '0000-00-00', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
