-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2018 at 05:40 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hotelCode` varchar(50) NOT NULL,
  `hotelName` varchar(100) NOT NULL,
  PRIMARY KEY (`hotelCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelCode`, `hotelName`) VALUES
('taj', 'Taj Samudra'),
('hilt', 'Hilton'),
('galad', 'Galadari'),
('shang', 'Shangrilla'),
('sadds', 'asds'),
('123', 'sfdfds');

-- --------------------------------------------------------

--
-- Table structure for table `mealplan`
--

DROP TABLE IF EXISTS `mealplan`;
CREATE TABLE IF NOT EXISTS `mealplan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealplan`
--

INSERT INTO `mealplan` (`ID`, `plan`) VALUES
(1, 'Buffey'),
(2, 'Take Out'),
(3, 'Room Delivery'),
(4, 'Dining Tables'),
(5, 'Kottu'),
(6, 'Fried Rice');

-- --------------------------------------------------------

--
-- Table structure for table `nationalty`
--

DROP TABLE IF EXISTS `nationalty`;
CREATE TABLE IF NOT EXISTS `nationalty` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receivedfrom`
--

DROP TABLE IF EXISTS `receivedfrom`;
CREATE TABLE IF NOT EXISTS `receivedfrom` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
(7, 'Chamod');

-- --------------------------------------------------------

--
-- Table structure for table `roomcatagory`
--

DROP TABLE IF EXISTS `roomcatagory`;
CREATE TABLE IF NOT EXISTS `roomcatagory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `catagory` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomcatagory`
--

INSERT INTO `roomcatagory` (`ID`, `catagory`) VALUES
(1, 'single'),
(2, 'Double'),
(3, 'Family'),
(4, 'ass');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'covabunga', '$2y$10$30i8fG47feAb.U46pYfhE.k0bYBRCqG6di5gYKNer22pKjwIK9UH2');

-- --------------------------------------------------------

--
-- Table structure for table `voucherd`
--

DROP TABLE IF EXISTS `voucherd`;
CREATE TABLE IF NOT EXISTS `voucherd` (
  `ID_D` int(11) NOT NULL AUTO_INCREMENT,
  `ID_H` varchar(50) NOT NULL,
  `voucherNo` varchar(50) NOT NULL,
  `roomType` varchar(50) NOT NULL,
  `roomCatagory` varchar(100) NOT NULL,
  `mealPlan` varchar(100) NOT NULL,
  `checkIn` varchar(30) NOT NULL,
  `checkOut` varchar(30) NOT NULL,
  `roomCount` varchar(20) NOT NULL,
  `rate` int(50) NOT NULL,
  `night` int(50) NOT NULL,
  PRIMARY KEY (`ID_D`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucherd`
--

INSERT INTO `voucherd` (`ID_D`, `ID_H`, `voucherNo`, `roomType`, `roomCatagory`, `mealPlan`, `checkIn`, `checkOut`, `roomCount`, `rate`, `night`) VALUES
(49, '1', 'shang-September-1', 'Single', 'single', 'Buffey', '09/10/2018', '09/26/2018', '1 ', 0, 0),
(50, '1', 'shang-September-1', 'Single', 'single', 'Buffey', '09/18/2018', '09/29/2018', '1 ', 0, 0),
(51, '2', 'shang-September-2', 'Single', 'single', 'Buffey', '09/17/2018', '09/21/2018', '1 ', 0, 0),
(52, '2', 'shang-September-2', 'Single', 'single', 'Buffey', '09/19/2018', '09/22/2018', '1 ', 0, 0),
(53, '2', 'shang-September-2', 'Single', 'single', 'Buffey', '', '', '1 ', 0, 0),
(54, '2', 'shang-September-2', 'Single', 'single', 'Buffey', '09/25/2018', '09/27/2018', '1 ', 0, 0),
(55, '3', '', 'Single', 'single', 'Buffey', '09/24/2018', '09/24/2018', '1 ', 0, 0),
(56, '3', '', 'Single', 'single', 'Buffey', '09/16/2018', '09/16/2018', '1 ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voucherh`
--

DROP TABLE IF EXISTS `voucherh`;
CREATE TABLE IF NOT EXISTS `voucherh` (
  `ID_H` varchar(50) NOT NULL,
  `voucherNo` varchar(50) NOT NULL,
  `voucherDate` varchar(30) NOT NULL,
  `hotelName` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `AmendCount` int(11) NOT NULL,
  `conformationCode` varchar(100) NOT NULL,
  `receivedFrom` varchar(100) NOT NULL,
  `receivedCode` varchar(50) NOT NULL,
  `nationalty` varchar(50) NOT NULL,
  `extra` varchar(200) NOT NULL,
  `specialRequests` varchar(200) NOT NULL,
  `guestTitle` varchar(20) NOT NULL,
  `guestName` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_H`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucherh`
--

INSERT INTO `voucherh` (`ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `type`, `status`, `AmendCount`, `conformationCode`, `receivedFrom`, `receivedCode`, `nationalty`, `extra`, `specialRequests`, `guestTitle`, `guestName`) VALUES
('1', 'shang-September-1', '2018-09-08', 'Shangrilla', 'Single', 'pending', 0, '1234', 'Tony Stark', '', '', '', '', '', ''),
('2', 'shang-September-2', '2018-09-08', 'Shangrilla', 'Single', 'pending', 0, '1234', 'Tony Stark', '', '', '', '', '', ''),
('3', '', '2018-09-16', '', 'Single', 'pending', 0, '1234', 'Jhon Snow\r\n', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
