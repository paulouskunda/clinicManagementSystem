-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 08:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

--
-- Dumping data for table `activelog`
--

INSERT INTO `activelog` (`id`, `pUniqueID`, `coID`, `nurseID`, `pharmacistID`, `cpDate`, `cpTimeStarted`, `cpTimeEnded`, `pFeelings`, `coFinding`, `activeStatus`) VALUES
(5, 'P001', 'CO002', 'N001', NULL, '2020-04-02', '07:59:30am', NULL, 'N/A', 'N/A', 'done');

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

INSERT INTO `diseaserecord` (`id`, `diseaseName`, `pID`, `coID`, `aID`) VALUES
(1, 'What sickness', 'P001', 'CO002', '1'),
(2, 'Flu', 'P004', 'CO002', '3'),
(3, 'Love Birds', 'P003', 'CO002', '2');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `drugName` varchar(256) NOT NULL,
  `addBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `drugName`, `addBy`) VALUES
(1, 'Panado', 'admin'),
(2, 'Cafino', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `drugsprescription`
--

CREATE TABLE `drugsprescription` (
  `id` int(11) NOT NULL,
  `aId` int(11) NOT NULL,
  `drugName` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugsprescription`
--

INSERT INTO `drugsprescription` (`id`, `aId`, `drugName`, `status`) VALUES
(1, 1, 'Paracitamo\r\nCaffino\r\n', 'done'),
(2, 3, 'Cafino\r\n', 'done'),
(3, 2, 'Cafino\r\n', 'done');

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

INSERT INTO `labtech` (`id`, `pUniqueID`, `coID`, `aID`, `labTechID`, `labResults`, `timeSentToLab`, `timeSentBack`, `dateSent`, `status`) VALUES
(1, 'P001', 'CO002', '1', 'LT005', 'After the test we found some samples of what what ', '09:25:55am', '09:26:37am', '0000-00-00', 'Done'),
(2, 'P003', 'CO002', '2', 'LT005', 'Some issues just like babe', '09:39:43pm', '09:50:51pm', '0000-00-00', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
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

INSERT INTO `patients` (`id`, `fullname`, `dob`, `age`, `gender`, `nrc`, `phoneNumber`, `physicalAddress`, `nextToKin`, `uniqueID`, `dateRegistered`) VALUES
(1, 'Another  NasiBoom Smalls', '1993-05-13', 27, 'Female', '89213/10/1', '972157418', '2001:0DB8:0000:0000:0000:0000:3680:8D58', 'Che Gelo', 'P001', '0000-00-00 00:00:00'),
(2, 'Another  NasiBoom Smalls', '1993-05-13', 27, 'Male', '89213/11/1', '972157418', '2001:0DB8:0000:0000:0000:0000:3680:8D58', 'Che Gelo', 'P002', '0000-00-00 00:00:00'),
(3, 'NEW DUDE GUY', '1999-06-16', 21, 'Male', '123423/12/12', '0972131212', 'New Drugs', 'nEW GEKOI', 'P003', '2020-03-27 21:03:12'),
(4, 'Phar DUDEDDFGH VBN ', '1990-12-12', 30, 'Male', '123466/12/10', '0972131212', 'SQ', 'nEW GEKOIASZ', 'P004', '2020-03-27 21:04:00'),
(5, 'Flow Bee', '2020-01-01', 0, 'Male', '13366/12/12', '0979981212', 'SQ', 'Zimbo', 'P005', '2020-04-02 07:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE `ref` (
  `id` int(11) NOT NULL,
  `pID` varchar(50) NOT NULL,
  `aID` varchar(50) NOT NULL,
  `dateSent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `diseaseName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref`
--

INSERT INTO `ref` (`id`, `pID`, `aID`, `dateSent`, `diseaseName`) VALUES
(1, '', '', '2020-04-02 07:24:50', 'dadadadadada'),
(2, 'P005', '4', '2020-04-02 07:34:34', 'Super Weak'),
(3, 'P005', '4', '2020-04-02 07:53:52', 'Super Weak'),
(4, 'P001', '5', '2020-04-02 07:59:53', 'IDK SHIT');

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

INSERT INTO `staff` (`id`, `staffName`, `staffNumber`, `staffAddress`, `staffTitle`, `staffEmail`, `nrc`, `staffDOB`, `password`, `isDefaultChanged`, `dateRegistered`) VALUES
(1, 'Another  Boo Nyirenda', 'N001', 'Ku Mulenga', 'Nurse', 'kundapaulous@gmail.com', '231231/21/1', '2000-01-03', '1234', 0, '0000-00-00 00:00:00'),
(2, 'Zulu Boo Smalls', 'CO002', 'Ku Mulenga', 'Clinic Officer', 'kundapaulous@gmail.com', '481971/61/1', '2005-06-12', '1234', 0, '2020-03-25 14:58:56'),
(3, 'Phar Drugs', 'PH003', 'New Drugs', 'Pharmacist', 'new@GMAIL.COM', '123466/12/12', '1990-10-30', '1234', 0, '2020-03-27 09:20:30'),
(4, 'Lab Tester', 'PH004', 'New Drugs', 'Pharmacist', 'new@GMAIL.COM', '123466/12/12', '1997-05-12', '1234', 0, '2020-03-27 09:21:13'),
(5, 'Lab Tester', 'LT005', 'New Drugs', 'Lab Tech', 'new@GMAIL.COM', '123466/12/12', '1997-05-12', '1234', 0, '2020-03-27 09:23:47');

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
-- Indexes for table `ref`
--
ALTER TABLE `ref`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diseaserecord`
--
ALTER TABLE `diseaserecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drugsprescription`
--
ALTER TABLE `drugsprescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `labtech`
--
ALTER TABLE `labtech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
