-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 12:54 PM
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
-- Database: `tdws`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `ID` int(11) NOT NULL,
  `CS_User` varchar(100) NOT NULL,
  `DateOfBooking` date NOT NULL,
  `BookingNo` varchar(100) NOT NULL,
  `POL` varchar(100) NOT NULL,
  `POD` varchar(100) NOT NULL,
  `ETD` varchar(100) NOT NULL,
  `VesselName` varchar(100) NOT NULL,
  `ContainerCount` int(11) NOT NULL,
  `ContainerType` varchar(100) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `SalesPerson` varchar(100) NOT NULL,
  `NVO_SL` varchar(100) NOT NULL,
  `BookingValidTill` date NOT NULL,
  `EmptyPickedupDate` date NOT NULL,
  `SI_CutOffDate` date NOT NULL,
  `Doc_CutOffDate` date NOT NULL,
  `GateOpenDate` date NOT NULL,
  `GateClosingDate` date NOT NULL,
  `GateInDate` date NOT NULL,
  `Remarks` text NOT NULL,
  `Department` varchar(100) NOT NULL,
  `InvoiceReceivedDate` datetime NOT NULL,
  `InvoiceSentDate` datetime NOT NULL,
  `InvoiceAging` int(50) NOT NULL,
  `PaymentDate` datetime NOT NULL,
  `BLstatus` varchar(50) NOT NULL,
  `BLdate` datetime NOT NULL,
  `BLaging` int(100) NOT NULL,
  `DraftStatus` varchar(100) NOT NULL,
  `ContainerStatus` varchar(100) NOT NULL,
  `RatesValidTill` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`ID`, `CS_User`, `DateOfBooking`, `BookingNo`, `POL`, `POD`, `ETD`, `VesselName`, `ContainerCount`, `ContainerType`, `CustomerName`, `SalesPerson`, `NVO_SL`, `BookingValidTill`, `EmptyPickedupDate`, `SI_CutOffDate`, `Doc_CutOffDate`, `GateOpenDate`, `GateClosingDate`, `GateInDate`, `Remarks`, `Department`, `InvoiceReceivedDate`, `InvoiceSentDate`, `InvoiceAging`, `PaymentDate`, `BLstatus`, `BLdate`, `BLaging`, `DraftStatus`, `ContainerStatus`, `RatesValidTill`) VALUES
(1, 'asdf', '2022-03-09', '123', 'tesghbjp', 'test', 'testtest', 'stest', 22, 'test', 'test', 'test', 'test', '2022-03-09', '2022-03-23', '2022-03-03', '2022-03-09', '2022-03-31', '2022-03-03', '2022-03-24', 'good', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00'),
(2, 'ma', '2022-03-17', '456', '3213', '321', '321', '21', 321, '21', '21', '21', '21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '81', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00'),
(3, 'ma', '0000-00-00', '789', '3213', '321', '321', '21', 321, '21', '21', '21', '21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '81', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00'),
(4, 'ma', '0000-00-00', '101', '3213', '321', '321', '21', 321, '21', '21', '21', '21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '81', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00'),
(5, 'ma', '0000-00-00', '111', '3213', '321', '321', '21', 321, '21', '21', '21', '21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '81', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00'),
(6, 'ma', '0000-00-00', '122', '3213', '321', '321', '21', 321, '21', '21', '21', '21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '81', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_person` int(100) NOT NULL,
  `shipper/forwarder` varchar(100) NOT NULL,
  `shipper_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `important_bookings`
--

CREATE TABLE `important_bookings` (
  `ID` int(11) NOT NULL,
  `FieldName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `important_bookings`
--

INSERT INTO `important_bookings` (`ID`, `FieldName`) VALUES
(1, 'DateOfBooking'),
(2, 'BookingNo'),
(3, 'CustomerName'),
(4, 'SalesPerson'),
(5, 'BookingValidTill'),
(6, 'GateOpenDate');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `important_bookings`
--
ALTER TABLE `important_bookings`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `important_bookings`
--
ALTER TABLE `important_bookings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
