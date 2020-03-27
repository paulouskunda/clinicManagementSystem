-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 09:23 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `activelog`
--

CREATE TABLE `activelog` (
  `id` int(11) NOT NULL,
  `pUniqueID` varchar(50) NOT NULL,
  `coID` varchar(50) DEFAULT NULL,
  `nurseID` varchar(50) NOT NULL,
  `pharmacistID` varchar(50) DEFAULT NULL,
  `cpDate` date NOT NULL,
  `cpTimeStarted` varchar(50) NOT NULL,
  `cpTimeEnded` varchar(50) DEFAULT NULL,
  `pFeelings` text,
  `coFinding` text,
  `activeStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `diseaserecord`
--

CREATE TABLE `diseaserecord` (
  `id` int(11) NOT NULL,
  `diseaseName` varchar(100) NOT NULL,
  `pID` varchar(50) NOT NULL,
  `coID` varchar(50) NOT NULL,
  `aID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseaserecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `drugName` varchar(50) NOT NULL,
  `unitsAvaliable` int(11) NOT NULL,
  `addBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drugsprescription`
--

CREATE TABLE `drugsprescription` (
  `id` int(11) NOT NULL,
  `aId` int(11) NOT NULL,
  `drugName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labtech`
--

CREATE TABLE `labtech` (
  `id` int(11) NOT NULL,
  `pUniqueID` varchar(50) NOT NULL,
  `coID` varchar(50) NOT NULL,
  `aID` varchar(50) NOT NULL,
  `labTechID` varchar(50) DEFAULT NULL,
  `labResults` text,
  `timeSentToLab` varchar(20) NOT NULL,
  `timeSentBack` varchar(20) DEFAULT NULL,
  `dateSent` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `nrc` varchar(20) DEFAULT NULL,
  `phoneNumber` varchar(25) DEFAULT NULL,
  `physicalAddress` varchar(100) NOT NULL,
  `nextToKin` varchar(50) DEFAULT NULL,
  `uniqueID` varchar(60) NOT NULL,
  `dateRegistered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `staffNumber` varchar(50) NOT NULL,
  `staffAddress` varchar(50) NOT NULL,
  `staffTitle` varchar(25) NOT NULL,
  `staffEmail` varchar(50) NOT NULL,
  `nrc` varchar(20) DEFAULT NULL,
  `staffDOB` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `isDefaultChanged` tinyint(1) NOT NULL,
  `dateRegistered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activelog`
--
ALTER TABLE `activelog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseaserecord`
--
ALTER TABLE `diseaserecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugsprescription`
--
ALTER TABLE `drugsprescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labtech`
--
ALTER TABLE `labtech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activelog`
--
ALTER TABLE `activelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diseaserecord`
--
ALTER TABLE `diseaserecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drugsprescription`
--
ALTER TABLE `drugsprescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `labtech`
--
ALTER TABLE `labtech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
