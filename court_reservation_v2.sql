-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 04:48 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `court_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Birthdate` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `LastName`, `FirstName`, `MiddleName`, `Email`, `Birthdate`, `Gender`, `Type`, `Status`, `Username`, `Password`) VALUES
(1, 'Salvador', 'Janella Maxine', 'Desiderio', 'salvadorjanella@gmail.com', '1998-03-30', 'Female', 'User', 'Active', 'janella', 'janella09'),
(2, 'Robado', 'John Ellee', 'Dela Cruz', 'bachrobado@gmail.com', '1998-08-01', 'Male', 'Admin', 'Active', 'ellee', 'ellee09'),
(4, 'Andres', 'Sofia Louise', 'Alejandre', 'sofiaandres@gmail.com', '1998-08-24', 'Female', 'User', 'Active', 'sofia', 'sofia09'),
(6, 'Pasuelo', 'John Matthew', 'Arenga', 'pasuelo_john.matthew@gmail.com', '1997-10-13', 'Male', 'User', 'Active', 'matthew', 'matthew09'),
(9, 'Jardiolin', 'Aivi Mae', 'Diaz', 'aivi_jardiolin@gmail.com', '1996-07-04', 'Female', 'User', 'Active', 'aivi', 'aivi09'),
(10, 'Eregia', 'Rodolfo', 'Castante', 'rodolfo_eregia@gmail.com', '1988-03-23', 'Male', 'Admin', 'Inactive', 'rod', 'rod123');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `CourtID` int(11) NOT NULL,
  `CourtName` varchar(100) NOT NULL,
  `CourtType` varchar(50) NOT NULL,
  `CourtStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`CourtID`, `CourtName`, `CourtType`, `CourtStatus`) VALUES
(1, 'Ellee', 'Basketball', 'Open'),
(2, 'Paul', 'Volleyball', 'Open'),
(4, 'JM', 'Lawn Tennis', 'Open'),
(5, 'Katrina', 'Badminton', 'Open'),
(6, 'Rother', 'Basketball', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `NewsID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` longtext NOT NULL,
  `Status` varchar(50) NOT NULL,
  `PostedBy` varchar(100) NOT NULL,
  `DatePosted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `Title`, `Content`, `Status`, `PostedBy`, `DatePosted`) VALUES
(1, 'All Courts are closed', 'All courts are closed due to bad weather, please comeback when the typhoon is out of the Philippine Territory', 'Active', 'John Ellee Robado', '2018-10-09 14:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(11) NOT NULL,
  `CourtID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `ReserveCourtName` varchar(100) NOT NULL,
  `ReserveCourtType` varchar(50) NOT NULL,
  `ReserveName` varchar(100) NOT NULL,
  `ReserveStatus` varchar(100) NOT NULL,
  `ReserveTime` varchar(50) NOT NULL,
  `ReserveDate` varchar(50) NOT NULL,
  `Date_Of_Reservation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `CourtID`, `ID`, `ReserveCourtName`, `ReserveCourtType`, `ReserveName`, `ReserveStatus`, `ReserveTime`, `ReserveDate`, `Date_Of_Reservation`) VALUES
(1, 1, 4, 'Ellee', 'Basketball', 'Sofia Louise Andres', 'Approved', '08:00', '2018-10-08', '2018-10-08 13:07:47'),
(3, 1, 1, 'Ellee', 'Basketball', 'Janella Maxine Salvador', 'Pending', '10:00', '2018-10-09', '2018-10-08 13:16:47'),
(4, 1, 4, 'Ellee', 'Basketball', 'Sofia Louise Andres', 'Rejected', '', '', '2018-10-09 09:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleID` int(11) NOT NULL,
  `CourtID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `CourName` varchar(100) NOT NULL,
  `CourtType` varchar(100) NOT NULL,
  `Time` varchar(10) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `address`, `email`, `phoneNumber`, `username`, `password`) VALUES
(1, 'Egida', 'Ariane', 'Tigbauan, Iloilo', 'ariane_egida@gmail.com', '09233435455657', 'ariane', '103773dc2be89763989e8991d477364d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`CourtID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `CourtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
