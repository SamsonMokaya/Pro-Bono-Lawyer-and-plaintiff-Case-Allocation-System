-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2022 at 12:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `law`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignedcases`
--

CREATE TABLE `assignedcases` (
  `id` int(255) NOT NULL,
  `civilianid` int(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lawyerid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignedcases`
--

INSERT INTO `assignedcases` (`id`, `civilianid`, `casetype`, `casecategory`, `status`, `lawyerid`) VALUES
(1, 5, 'family', 'Divorce', 'starting', 6);

-- --------------------------------------------------------

--
-- Table structure for table `CaseCategories`
--

CREATE TABLE `CaseCategories` (
  `ID` int(100) NOT NULL,
  `Case_Category` varchar(100) NOT NULL,
  `CaseType` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CaseCategories`
--

INSERT INTO `CaseCategories` (`ID`, `Case_Category`, `CaseType`) VALUES
(1, 'DIVORCE', 1),
(2, 'INJURIES', 3),
(3, 'ROBBERY', 2),
(4, 'MISCONDUCT', 2),
(5, 'FRAUD', 2),
(6, 'BREACH OF CONTRACT', 3),
(7, 'COMPLAINT', 3),
(8, 'ADOPTION', 1),
(9, 'PROTECTION ORDERS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `caseid` int(11) NOT NULL,
  `civilianid` int(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_deleted` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`caseid`, `civilianid`, `casetype`, `casecategory`, `date`, `status`, `is_deleted`) VALUES
(2, 5, 'family', 'Divorce', '2020-04-16', 'starting', 0);

-- --------------------------------------------------------

--
-- Table structure for table `CaseTypes`
--

CREATE TABLE `CaseTypes` (
  `ID` int(100) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CaseTypes`
--

INSERT INTO `CaseTypes` (`ID`, `Type`) VALUES
(1, 'FAMILY'),
(2, 'CRIMINAL'),
(3, 'CIVIL');

-- --------------------------------------------------------

--
-- Table structure for table `civilian_biodata`
--

CREATE TABLE `civilian_biodata` (
  `userid` int(255) NOT NULL,
  `nationalid` varchar(255) NOT NULL,
  `passportnumber` varchar(255) DEFAULT NULL,
  `criminalrecord` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `civilian_biodata`
--

INSERT INTO `civilian_biodata` (`userid`, `nationalid`, `passportnumber`, `criminalrecord`, `status`) VALUES
(0, '36924374', '', '2', 'pro-bono'),
(0, '36924374', '', '2', 'paying'),
(5, '36924374', '', '2', 'paying');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_biodata`
--

CREATE TABLE `lawyer_biodata` (
  `userid` int(255) NOT NULL,
  `successfulcases` varchar(255) NOT NULL,
  `failedcases` varchar(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_biodata`
--

INSERT INTO `lawyer_biodata` (`userid`, `successfulcases`, `failedcases`, `casetype`, `casecategory`) VALUES
(6, '65', '21', 'family', 'Divorce');

-- --------------------------------------------------------

--
-- Table structure for table `pendingcases`
--

CREATE TABLE `pendingcases` (
  `id` int(255) NOT NULL,
  `civilianid` int(255) NOT NULL,
  `casetype` int(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lawyerid` int(255) NOT NULL,
  `Approval` varchar(100) NOT NULL DEFAULT 'Pending',
  `is_deleted` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendingcases`
--

INSERT INTO `pendingcases` (`id`, `civilianid`, `casetype`, `casecategory`, `status`, `lawyerid`, `Approval`, `is_deleted`) VALUES
(22, 41, 1, 'DIVORCE', 'Starting', 44, 'Pending', 1),
(23, 41, 2, 'MISCONDUCT', 'Starting', 39, 'Pending', 0),
(24, 45, 3, 'INJURIES', 'Starting', 44, 'Finished', 0),
(25, 45, 3, 'BREACH', 'Starting', 44, 'Taken', 1),
(26, 45, 2, 'FRAUD', 'Ongoing', 44, 'Finished', 1),
(27, 41, 2, 'FRAUD', 'Ongoing', 42, 'Pending', 1),
(28, 41, 2, 'MISCONDUCT', 'Starting', 44, 'Taken', 1),
(29, 41, 2, 'MISCONDUCT', 'Starting', 44, 'Taken', 1),
(30, 45, 3, 'COMPLAINT', 'Ongoing', 44, 'Taken', 0),
(31, 46, 2, 'MISCONDUCT', 'Ongoing', 42, 'Taken', 0),
(32, 45, 1, 'PROTECTION', 'Starting', 42, 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ratings`
--

CREATE TABLE `Ratings` (
  `ID` int(100) NOT NULL,
  `LawyerId` int(100) NOT NULL,
  `Rating` int(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `Comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Ratings`
--

INSERT INTO `Ratings` (`ID`, `LawyerId`, `Rating`, `datetime`, `Comments`) VALUES
(4, 0, 0, '0000-00-00 00:00:00', 's');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `ID` int(11) NOT NULL,
  `User` varchar(11) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`ID`, `User`, `Role`) VALUES
(1, 'Admin', 1),
(2, 'Lawyer', 2),
(3, 'Plaintiff', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Criminal_Record` int(11) NOT NULL,
  `Succesful_Cases` int(11) NOT NULL DEFAULT 0,
  `Failed_Cases` int(100) NOT NULL DEFAULT 0,
  `profile_pic` varchar(100) NOT NULL DEFAULT '0',
  `Description` varchar(500) NOT NULL DEFAULT '0',
  `role` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `First_Name`, `Last_Name`, `Email`, `password`, `Criminal_Record`, `Succesful_Cases`, `Failed_Cases`, `profile_pic`, `Description`, `role`) VALUES
(39, 'Denton', 'Ford', 'tikoxur@mailinator.com', 'Pa$$w0rd!', 0, 6, 3, 'assets/images/team4.jpg', 'A lawyer (also called attorney, counsel, or counselor) is a licensed professional who advises and represents others in legal matters. Today\'s lawyer can be young or old, male or female. Nearly one-third of all lawyers are under thirty-five years old.', 2),
(41, 'Kimberley', 'Fisher', 'sam@gmail.com', 'Mokaya234', 0, 0, 0, 'assets/images/team4.jpg', '0', 3),
(42, 'Ayanna', 'Dickson', 'rosuzulytu@mailinator.com', 'Pa$$w0rd!', 0, 2, 0, 'assets/images/team4.jpg', 'A lawyer (also called attorney, counsel, or counselor) is a licensed professional who advises and represents others in legal matters. Today\'s lawyer can be young or old, male or female. Nearly one-third of all lawyers are under thirty-five years old.', 2),
(43, 'Miriam', 'Love', 'dugu@mailinator.com', 'Pa$$w0rd!', 0, 3, 0, 'assets/images/team4.jpg', 'A lawyer (also called attorney, counsel, or counselor) is a licensed professional who advises and represents others in legal matters. Today\'s lawyer can be young or old, male or female. Nearly one-third of all lawyers are under thirty-five years old.', 2),
(44, 'samsoni', 'mokaya', 'mokaya@gmail.com', 'Mokaya234', 0, 6, 0, 'assets/images/team4.jpg', 'I am the best lawyer', 2),
(45, 'Robert', 'Mokaya', 'robert@gmail.com', 'Mokaya234', 0, 0, 0, 'assets/images/team4.jpg', '0', 3),
(46, 'Solomon', 'Ongera', 'solomon@gmail.com', 'Mokaya234', 0, 0, 0, '', '0', 1),
(47, 'cl', 'cl', 'cl@gmail.com', 'Mokaya234', 0, 0, 0, '0', '0', 2),
(48, 'johny', 'sins', 'john@gmail.com', 'Mokaya234', 0, 0, 0, 'team1.jpg', 'Yoh bro', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedcases`
--
ALTER TABLE `assignedcases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CaseCategories`
--
ALTER TABLE `CaseCategories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Case Type` (`CaseType`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`caseid`);

--
-- Indexes for table `CaseTypes`
--
ALTER TABLE `CaseTypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pendingcases`
--
ALTER TABLE `pendingcases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `casetype` (`casetype`);

--
-- Indexes for table `Ratings`
--
ALTER TABLE `Ratings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignedcases`
--
ALTER TABLE `assignedcases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CaseCategories`
--
ALTER TABLE `CaseCategories`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `caseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CaseTypes`
--
ALTER TABLE `CaseTypes`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendingcases`
--
ALTER TABLE `pendingcases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Ratings`
--
ALTER TABLE `Ratings`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CaseCategories`
--
ALTER TABLE `CaseCategories`
  ADD CONSTRAINT `CaseCategories_ibfk_1` FOREIGN KEY (`CaseType`) REFERENCES `CaseTypes` (`ID`);

--
-- Constraints for table `pendingcases`
--
ALTER TABLE `pendingcases`
  ADD CONSTRAINT `pendingcases_ibfk_1` FOREIGN KEY (`casetype`) REFERENCES `CaseTypes` (`ID`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `Roles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
