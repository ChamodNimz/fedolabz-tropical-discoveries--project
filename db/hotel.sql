-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 09:30 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelCode` varchar(50) NOT NULL,
  `hotelName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelCode`, `hotelName`) VALUES
('taj', 'Taj Samudra'),
('hilt', 'Hilton'),
('galad', 'Galadari'),
('shang', 'Shangrilla'),
('kings', 'kingsbury');

-- --------------------------------------------------------

--
-- Table structure for table `mealplan`
--

CREATE TABLE `mealplan` (
  `ID` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealplan`
--

INSERT INTO `mealplan` (`ID`, `plan`) VALUES
(1, 'Buffey'),
(2, 'Take Out'),
(3, 'Room Delivery'),
(4, 'Dining Tables'),
(5, 'Kottu'),
(6, 'Fried Rice'),
(7, 'sasd');

-- --------------------------------------------------------

--
-- Table structure for table `receivedfrom`
--

CREATE TABLE `receivedfrom` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receivedfrom`
--

INSERT INTO `receivedfrom` (`ID`, `name`) VALUES
(1, 'Jhon Snow\r\n'),
(2, 'Tony Stark'),
(3, 'Stannis Baratheon'),
(4, 'Arya Stark\r\n'),
(5, 'Catlyn'),
(6, 'Sansa Stark\r\n'),
(7, 'Chamod'),
(8, 'asdsd');

-- --------------------------------------------------------

--
-- Table structure for table `roomcatagory`
--

CREATE TABLE `roomcatagory` (
  `ID` int(11) NOT NULL,
  `catagory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomcatagory`
--

INSERT INTO `roomcatagory` (`ID`, `catagory`) VALUES
(1, 'single'),
(2, 'Double'),
(3, 'Family'),
(4, 'ass'),
(5, 'asdsda');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(70) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
(1, 'sean', '$2y$10$30i8fG47feAb.U46pYfhE.k0bYBRCqG6di5gYKNer22pKjwIK9UH2', 'admin'),
(2, 'user', '$2y$10$f65S0hhU7JNmqE7QWeAmH.qIllUyfJlDGcaQPkLaIuDZOfGNT3VCi', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `voucherh`
--

CREATE TABLE `voucherh` (
  `ID_H` int(11) NOT NULL,
  `voucherNo` varchar(50) NOT NULL,
  `voucherDate` varchar(30) NOT NULL,
  `hotelName` varchar(100) NOT NULL,
  `typeName` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `AmendCount` int(11) NOT NULL,
  `conformationCode` varchar(100) NOT NULL,
  `receivedFrom` varchar(100) NOT NULL,
  `guestName` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `roomCategory` varchar(100) NOT NULL,
  `mealPlan` varchar(50) NOT NULL,
  `arrivalDate` varchar(50) NOT NULL,
  `departureDate` varchar(50) NOT NULL,
  `roomsCount` varchar(20) NOT NULL,
  `nightCount` varchar(20) NOT NULL,
  `single` varchar(20) NOT NULL,
  `double` varchar(20) NOT NULL,
  `triple` varchar(20) NOT NULL,
  `user` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `extra` varchar(300) NOT NULL,
  `req` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucherh`
--

INSERT INTO `voucherh` (`ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `typeName`, `status`, `AmendCount`, `conformationCode`, `receivedFrom`, `guestName`, `nationality`, `roomCategory`, `mealPlan`, `arrivalDate`, `departureDate`, `roomsCount`, `nightCount`, `single`, `double`, `triple`, `user`, `time`, `rate`, `extra`, `req`) VALUES
(5, 'galad-September-1', '2018-09-12', 'Galadari', 'Mr', 'done', 0, 'n/a', 'Jhon Snow\r\n', 'Demon', 'Single', 'single', 'Buffey', '09/03/2018', '09/18/2018', '1', '2', '2', '3', '1', 'Array', '14:28', '3000', '', ''),
(6, 'galad-September-2', '2018-09-13', 'Galadari', 'Mr', 'amended', 1, 'N/A', 'Stannis Baratheon', 'Chamod', 'Single', 'single', 'Take Out', '09/17/2018', '09/17/2018', '1', '2', '1', '2', '2', 'sean', '15:13', '1234', 'nothing mate but winter is comming', 'nothing for now mate'),
(7, 'hilt-September-1', '2018-09-13', 'Hilton', 'Dr', 'confirmed', 1, '12222', 'Stannis Baratheon', 'asdas', 'Single', 'Family', 'Take Out', '09/10/2018', '08/27/2018', '3', '5', '1', '1', '1', 'sean', '12:04', '5000', 'sdsdf', 'sdfsdfsdfd'),
(8, 'taj-September-4', '2018-09-13', 'Taj Samudra', 'Mr', 'amended', 1, 'N/A', 'Tony Stark', 'Abby', 'Double', 'Double', 'Dining Tables', '09/10/2018', '09/15/2018', '1', '4', '2', '3', '4', 'sean', '12:04', '12344', 'sdasd', 'Changed'),
(9, 'galad-September-3', '2018-09-13', 'Galadari', 'Miss', 'cancelled', 0, 'n/a', 'Stannis Baratheon', 'asadf', 'Triple', 'Family', 'Buffey', '09/24/2018', '09/26/2018', '1', '2', '3', '2', '2', 'sean', '12:04', '123', 'qweqwe', 'qwewqe'),
(10, 'galad-September-4', '2018-09-13', 'Galadari', 'Dr', 'amended', 1, 'N/A', 'Stannis Baratheon', 'aasdas', 'Family', 'Double', 'Take Out', '09/17/2018', '09/24/2018', '2', '2', '3', '4', '1', 'user', '15:31', '123', 'dasdasd', 'nothing yet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelCode`);

--
-- Indexes for table `mealplan`
--
ALTER TABLE `mealplan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `receivedfrom`
--
ALTER TABLE `receivedfrom`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roomcatagory`
--
ALTER TABLE `roomcatagory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucherh`
--
ALTER TABLE `voucherh`
  ADD PRIMARY KEY (`ID_H`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mealplan`
--
ALTER TABLE `mealplan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `receivedfrom`
--
ALTER TABLE `receivedfrom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roomcatagory`
--
ALTER TABLE `roomcatagory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
