-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 06:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cccdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressId` varchar(225) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `AddressLine` text NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `AnswerId` varchar(225) NOT NULL,
  `TestId` varchar(225) NOT NULL,
  `QuestionId` varchar(225) NOT NULL,
  `Answer` varchar(50) NOT NULL,
  `SecondaryAnswer` varchar(500) DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`AnswerId`, `TestId`, `QuestionId`, `Answer`, `SecondaryAnswer`, `CreateDate`, `CreateUserId`, `ModifyDate`, `ModifyUserId`, `StatusId`) VALUES
('c9cc7074-775d-11ea-850d-48f17f8d4d88', 'c9cbba65-775d-11ea-850d-48f17f8d4d88', 'xxx-Cough', 'yes', 'for past 2 days', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', 1),
('c9ccad66-775d-11ea-850d-48f17f8d4d88', 'c9cbba65-775d-11ea-850d-48f17f8d4d88', 'xxx-Fever', 'yes', 'It feels hot', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', 1),
('c9cced19-775d-11ea-850d-48f17f8d4d88', 'c9cbba65-775d-11ea-850d-48f17f8d4d88', 'xxx-Pregnancy ', 'no', '', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', 1),
('c9cd26f5-775d-11ea-850d-48f17f8d4d88', 'c9cbba65-775d-11ea-850d-48f17f8d4d88', 'xxx-Sleep', 'no', '', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', '2020-04-05 18:52:08', '230d45fc-773e-11ea-850d-48f17f8d4d88', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `HospitalId` varchar(225) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactPerson` varchar(50) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `PostCode` varchar(10) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospitalization`
--

CREATE TABLE `hospitalization` (
  `HospitalId` varchar(225) NOT NULL,
  `UserProfileId` varchar(225) NOT NULL,
  `AdmissionDate` datetime NOT NULL,
  `HospitalRecordNumber` varchar(25) DEFAULT NULL,
  `TreatedInICU` tinyint(1) NOT NULL,
  `RecievedVantilation` tinyint(1) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `OrganizationId` varchar(225) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactPerson` varchar(225) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `PostCode` varchar(10) DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preexistingcondition`
--

CREATE TABLE `preexistingcondition` (
  `ConditionId` varchar(225) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionId` varchar(225) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `SecondaryQuestion` varchar(500) NOT NULL,
  `Option1` varchar(100) DEFAULT NULL,
  `Option2` varchar(100) DEFAULT NULL,
  `Option3` varchar(100) DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionId`, `Name`, `Question`, `SecondaryQuestion`, `Option1`, `Option2`, `Option3`, `CreateDate`, `CreateUserId`, `ModifyDate`, `ModifyUserId`, `StatusId`) VALUES
('xxx-Cough', 'Cough', 'Do you Cough?', 'For how long now?', 'since today', 'for past 2 days', 'more than 3 days now', '2020-04-04 09:58:15', '681cc293-7646-11ea-b995-48f17f8d4d88\r\n', '2020-04-04 09:58:15', '681cc293-7646-11ea-b995-48f17f8d4d78\r\n', 1),
('xxx-Fever', 'Fever', 'Do you have Fever?', 'What is your temperature measurements?', 'I feels normal', 'It feels hot', 'Very hot', '2020-04-04 09:30:47', '681cc293-7646-11ea-b995-48f17f8d4d88\r\n', '2020-04-04 09:30:47', '681cc293-7646-11ea-b995-48f17f8d4d78\r\n', 1),
('xxx-Pregnancy ', 'Pregnancy ', 'Are you pregnant?', 'How long have you been pregnant?', 'less than a month', 'less than 6 months', 'Above 7 months', '2020-04-04 09:30:47', '681cc293-7646-11ea-b995-48f17f8d4d88\r\n', '2020-04-04 09:30:47', '681cc293-7646-11ea-b995-48f17f8d4d88\r\n', 1),
('xxx-Sleep', 'Trouble sleeping', 'Do you struggle to sleep?', 'How long have you been struggling with sleep?', 'Only last night', '2 to 4 nights ', 'More than 4 nights', '2020-04-04 09:30:47', '681cc293-7646-11ea-b995-48f17f8d4d88\r\n', '2020-04-04 09:30:47', '681cc293-7646-11ea-b995-48f17f8d4d88\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riskcountry`
--

CREATE TABLE `riskcountry` (
  `CountryId` varchar(225) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `RiskLevel` varchar(15) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `StatusId` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `IsActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TestId` varchar(225) NOT NULL,
  `UserProfileId` varchar(225) NOT NULL,
  `AddressId` varchar(50) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TestId`, `UserProfileId`, `AddressId`, `CreateDate`, `CreateUserId`, `ModifyDate`, `ModifyUserId`, `StatusId`) VALUES
('c9cbba65-775d-11ea-850d-48f17f8d4d88', '230d45fc-773e-11ea-850d-48f17f8d4d88', '', '2020-04-05 18:52:08', '', '2020-04-05 18:52:08', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `travelhistory`
--

CREATE TABLE `travelhistory` (
  `Id` varchar(225) NOT NULL,
  `CountryId` varchar(225) NOT NULL,
  `UserProfileId` varchar(225) NOT NULL,
  `TravelDate` datetime NOT NULL,
  `ReturnDate` datetime NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `underlyingcondition`
--

CREATE TABLE `underlyingcondition` (
  `Id` varchar(225) NOT NULL,
  `ConditionId` int(11) NOT NULL,
  `UserProfileId` varchar(225) NOT NULL,
  `DiagnosedDate` date DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `UserProfileId` varchar(225) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Age` int(5) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` varchar(5) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(5) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `PostCode` int(10) DEFAULT NULL,
  `ParentFirstName` varchar(50) DEFAULT NULL,
  `ParentSurname` varchar(50) DEFAULT NULL,
  `RoleId` int(11) NOT NULL,
  `OrganizationId` varchar(225) DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateUserId` varchar(225) NOT NULL,
  `ModifyDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifyUserId` varchar(225) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`UserProfileId`, `FirstName`, `Surname`, `Age`, `DOB`, `Sex`, `ContactNumber`, `Email`, `Password`, `Address`, `City`, `Province`, `PostCode`, `ParentFirstName`, `ParentSurname`, `RoleId`, `OrganizationId`, `CreateDate`, `CreateUserId`, `ModifyDate`, `ModifyUserId`, `StatusId`) VALUES
('230d45fc-773e-11ea-850d-48f17f8d4d88', 'Test user', 'user', 0, '1989-12-31', '', '9898832133', 'admin@ccc.com', '1234', NULL, '', '', NULL, NULL, NULL, 0, NULL, '2020-04-05 15:05:34', 'sys', '2020-04-05 15:05:34', '', 1),
('e92c44a6-7726-11ea-850d-48f17f8d4d88', 'Ndumiso', 'Mthembu', 0, '1989-12-31', '', '0842529472', 'ndu@mail.com', '1993', NULL, '', '', NULL, NULL, NULL, 0, NULL, '2020-04-05 12:19:19', 'sys', '2020-04-05 12:19:19', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressId`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`AnswerId`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`HospitalId`);

--
-- Indexes for table `hospitalization`
--
ALTER TABLE `hospitalization`
  ADD PRIMARY KEY (`HospitalId`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`OrganizationId`);

--
-- Indexes for table `preexistingcondition`
--
ALTER TABLE `preexistingcondition`
  ADD PRIMARY KEY (`ConditionId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionId`);

--
-- Indexes for table `riskcountry`
--
ALTER TABLE `riskcountry`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TestId`);

--
-- Indexes for table `travelhistory`
--
ALTER TABLE `travelhistory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `underlyingcondition`
--
ALTER TABLE `underlyingcondition`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`UserProfileId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
