-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 08:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('jack484', '484jack1'),
('Nancy727', '727nancy8');

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `Bus_Id` int(11) NOT NULL,
  `No_of_seats` int(11) DEFAULT NULL,
  `Route_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `route_info`
--

CREATE TABLE `route_info` (
  `Route_Id` int(11) NOT NULL,
  `Source` varchar(20) DEFAULT NULL,
  `Destination` varchar(20) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_info`
--

CREATE TABLE `time_info` (
  `Time_Id` int(11) NOT NULL,
  `Bus_Id` int(11) DEFAULT NULL,
  `Date` varchar(25) DEFAULT NULL,
  `Time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traveller_info`
--

CREATE TABLE `traveller_info` (
  `Travel_Id` int(11) NOT NULL,
  `Username` varchar(25) DEFAULT NULL,
  `source` varchar(15) DEFAULT NULL,
  `destination` varchar(15) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL,
  `date` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(15) NOT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `RePassword` varchar(15) DEFAULT NULL,
  `Contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`Bus_Id`),
  ADD KEY `Route_Id` (`Route_Id`);

--
-- Indexes for table `route_info`
--
ALTER TABLE `route_info`
  ADD PRIMARY KEY (`Route_Id`);

--
-- Indexes for table `time_info`
--
ALTER TABLE `time_info`
  ADD PRIMARY KEY (`Time_Id`),
  ADD KEY `Bus_Id` (`Bus_Id`);

--
-- Indexes for table `traveller_info`
--
ALTER TABLE `traveller_info`
  ADD PRIMARY KEY (`Travel_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `Bus_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route_info`
--
ALTER TABLE `route_info`
  MODIFY `Route_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_info`
--
ALTER TABLE `time_info`
  MODIFY `Time_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `traveller_info`
--
ALTER TABLE `traveller_info`
  MODIFY `Travel_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD CONSTRAINT `bus_info_ibfk_1` FOREIGN KEY (`Route_Id`) REFERENCES `route_info` (`Route_Id`);

--
-- Constraints for table `time_info`
--
ALTER TABLE `time_info`
  ADD CONSTRAINT `time_info_ibfk_1` FOREIGN KEY (`Bus_Id`) REFERENCES `bus_info` (`Bus_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
