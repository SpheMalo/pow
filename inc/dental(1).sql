-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2016 at 03:22 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`id` int(11) NOT NULL,
  `bookingDate` int(11) NOT NULL,
  `bookingTime` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `idNumber` int(11) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '1',
  `empType` int(11) NOT NULL,
  `banking` text COLLATE utf8_unicode_ci NOT NULL,
  `physical` text COLLATE utf8_unicode_ci NOT NULL,
  `postal` text COLLATE utf8_unicode_ci NOT NULL,
  `cell` int(10) NOT NULL,
  `tell` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `title`, `name`, `surname`, `username`, `password`, `idNumber`, `gender`, `empType`, `banking`, `physical`, `postal`, `cell`, `tell`, `email`) VALUES
(1, 1, 'Malesela', 'Ramphele', 'bam1234', '$2y$10$sQZABf/TQOCE3GpbBTLv0e4y1zAk8Sx56wPShzYJ8PBVQu0lSX306', 0, 1, 1, '', '', '', 0, 0, ''),
(2, 1, 'Test', 'Test', 'Tes2596', '$2y$10$Z.AMWmUMviRmRYAcho3Z5OANoxyl6vornloUs4mU8E/snnxN7whky', 0, 1, 3, '', '', '', 0, 0, ''),
(3, 1, 'Matome', 'Ramp', 'Mat3913', '$2y$10$QlDBuZhKrpuJdkkw8Ccoc.qtuSeqtDQHDQHpUX09HNhITo7hnBsv2', 0, 1, 4, '', '', '', 0, 0, ''),
(4, 1, 'Matome', 'Ramp', 'Mat5542', '$2y$10$WUmPq5T9xSP3lQ.XhyKE3ecqDOWPxOYUAZA4LwW69Si75Jxu3FR5m', 0, 1, 4, '', '', '', 0, 0, ''),
(5, 1, 'Test', 'Test', 'Tes3316', '$2y$10$uIxp5R.cdUcfBRkr/SwXYuXVLQ5oz7P6k/wHJfmkpzyjjfC/P/WXq', 0, 1, 3, '', '', '', 0, 0, ''),
(6, 1, 'vdf', 'esfsg', 'vdf8767', '$2y$10$2ZRXmFYT1XOZBpqLaP/QvOr6LjoS.wvQaHmrpubkOhjxVlij3QD7C', 0, 1, 4, '', '', '', 0, 0, ''),
(7, 2, 'Some', 'Sum', 'Som3341', '$2y$10$94CH5IWz4P8SBjHjZniCM.wp3t0ghhOz/ubiIkQxraWNJGgwxaGNO', 12345678, 2, 4, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 1234567, 12345678, 'r@yahoo.com'),
(8, 2, 'Ahuh', 'Ahuh', 'Ahu6756', '$2y$10$X5EKB7OoPsoRVujLmwTxeu1Z9GI9OClhW18naN4ngXiwxXJA2RC2y', 1234567, 2, 3, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 12345678, 12345678, 'r@yahoo.com'),
(9, 3, 'Again', 'Again', 'Aga5728', '$2y$10$3q4yYF6V4BE6fkV3f4wFFuI2l8M55cyCX2M8T7KVC2gJACo9jPesm', 12345678, 1, 4, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 12345678, 12345678, 'r@yahoo.com'),
(10, 2, 'Again', 'Ahuh', 'Aga2218', '$2y$10$k2p/BGyCJ2WYzA7PSF7GTeqLLhkAzj93G3uwZ7WUkn0XIdRr7DAJq', 1123456543, 2, 4, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 123455432, 234565432, 'r@yahoo.com'),
(11, 1, 'Yeah', 'Yup', 'Yea6931', '$2y$10$bjKDvJYniyX/zGWJmZpOWOj8HEO1zxNJIXrlBFJszppelIW6JekJy', 1234567234, 1, 3, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 1234567654, 2147483647, 'r@yahoo.com'),
(12, 4, 'Malesela', 'Ramphele', 'Mal8721', '$2y$10$aazpDajv6fkeZLIzXYdyIuZLpefg58W3qwyy5xxSiObx6nMbZV3w2', 2147483647, 1, 2, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 823307218, 152988038, 'ramphele@yahoo.com'),
(13, 1, 'Malesela', 'Siba', 'Mal5184', '$2y$10$s.Zss5hIFsh7O1AKd8GyIuECCGZMKCGFaPApP5OM6/Pn.DSJy85Rq', 1234567234, 1, 3, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 1234567654, 2147483647, 'r@yahoo.com'),
(14, 2, 'Yeah', 'Again', 'Yea8286', '$2y$10$OSmjHwT0uk2fy5lG9MBJwujL3n/FkORuD9sSAylk4sBZyGkXS3HAm', 12345678, 2, 4, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 12345678, 123456789, 'r@yahoo.com'),
(15, 1, 'Malesela', 'Ramphele', 'Mal9413', '$2y$10$i7mQerPEXJEkmpNDJLNLYu8mILMxFWylQp/Ab1ajHaptleocPAggO', 1234567234, 1, 4, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 823307218, 152988038, 'r@yahoo.com'),
(16, 1, 'Malesela', 'sadfg', 'Mal2160', '$2y$10$3rkafTI5.BJ3jxoqE0C8fe/zNVbD3BkbNLaTGUSjeErjLWUH4MVNi', 2147483647, 1, 2, 'enter employees banking details', 'enter employees banking details', 'enter employees banking details', 2147483647, 2147483647, 'r@yahoo.com'),
(17, 1, 'Dithipa', 'Mahlatji', 'Dit6493', '$2y$10$Kxs7R5Y1frchqzQS0MVblegrxaRet85T2ieKka4imYIQu3PLIwRbS', 2147483647, 1, 3, '4078080733, ABSA, Branch code 0028', '175 General De La Rey street, Bendor, Polokwane 0700', 'P.O.Box 4050, Polokwane 0699', 760397316, 152988038, 'mahlatji.d@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employeetype`
--

CREATE TABLE IF NOT EXISTS `employeetype` (
`id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employeetype`
--

INSERT INTO `employeetype` (`id`, `description`) VALUES
(1, 'Manager'),
(2, 'Doctor'),
(3, 'Assistant'),
(4, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
`id` int(11) NOT NULL,
  `description` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `description`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `description`) VALUES
(1, 'Thembisa - Practicee A'),
(2, 'Thembisa - Practicee B');

-- --------------------------------------------------------

--
-- Table structure for table `medicalaid`
--

CREATE TABLE IF NOT EXISTS `medicalaid` (
`id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tell` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `physical` text COLLATE utf8_unicode_ci NOT NULL,
  `postal` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicalaid`
--

INSERT INTO `medicalaid` (`id`, `name`, `email`, `tell`, `fax`, `physical`, `postal`) VALUES
(1, 'GEMS', 'claims@gems.co.za', 152988023, 152988038, 'enter physical address', 'enter postal details'),
(2, 'Bonitas', 'claims@bonitas.co.za', 152988023, 152988038, 'enter physical address', 'enter postal details');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `orderDate` date NOT NULL,
  `statusID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `amount`, `orderDate`, `statusID`) VALUES
(1, 2305, '2016-03-15', 1),
(2, 4305, '2016-04-15', 1),
(3, 1005, '2016-05-15', 1),
(4, 4005, '2016-06-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
`id` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `genderID` int(11) NOT NULL,
  `identity` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `cell` int(11) NOT NULL,
  `tell` int(11) NOT NULL,
  `physical` int(11) NOT NULL,
  `postal` int(11) NOT NULL,
  `email` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `titleID`, `name`, `surname`, `genderID`, `identity`, `cell`, `tell`, `physical`, `postal`, `email`) VALUES
(1, 1, 'Malesela', 'Ramphele', 1, '9211305265088', 823307218, 152988038, 0, 0, 0),
(2, 1, 'Dithipa', 'Mahlatji', 1, '9611305265088', 760397316, 152988038, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentTypeID` int(11) NOT NULL,
  `invoiceLineID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `date`, `paymentTypeID`, `invoiceLineID`) VALUES
(1, 220.5, '2016-07-10 00:00:00', 2, 1),
(2, 2200.5, '2016-07-11 00:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype`
--

CREATE TABLE IF NOT EXISTS `paymenttype` (
`id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procedure`
--

CREATE TABLE IF NOT EXISTS `procedure` (
`id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `proceduretypeID` int(11) NOT NULL,
  `fav` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `procedure`
--

INSERT INTO `procedure` (`id`, `description`, `code`, `price`, `proceduretypeID`, `fav`) VALUES
(1, 'Suture - minor', '8192', 150, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proceduretype`
--

CREATE TABLE IF NOT EXISTS `proceduretype` (
`id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fav` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proceduretype`
--

INSERT INTO `proceduretype` (`id`, `description`, `code`, `fav`) VALUES
(1, 'impacted teeth', 'K01.1', 0),
(2, 'caries of dentine', 'K02.1', 0),
(3, 'other dental caries', 'K02.8', 0),
(4, 'dental caries; unspecified', 'K02.9', 0),
(5, 'deposits [accretions] on teeth', 'K03.6', 0),
(6, 'dental examination', 'Z01.2', 0),
(7, 'other specified prophylactic measures', 'Z29.8', 0),
(8, 'fitting and adjustment of dental prosthetic device', 'Z46.3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `size` int(11) NOT NULL,
  `critical` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `stockID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `size`, `critical`, `quantity`, `typeID`, `stockID`) VALUES
(1, 'tramacet', 'for hard pain relief', 260, 320, 3, 6, 1, NULL),
(2, 'panado', 'for pain relief', 60, 50, 5, 20, 1, NULL),
(3, 'domorol', 'for mild pain relief', 120, 150, 3, 10, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE IF NOT EXISTS `producttype` (
`id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `fav` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `description`, `fav`) VALUES
(1, 'painkiller', 0),
(2, 'antibiotics', 0),
(3, 'sedative', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `description`) VALUES
(1, 'Manager'),
(2, 'Doctor'),
(3, 'Assisstant'),
(4, 'Secretary'),
(5, 'active'),
(6, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `physical` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `bankName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branchName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `branchCode` int(11) NOT NULL,
  `accountNumber` int(11) NOT NULL,
  `reff` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `contactPerson`, `physical`, `email`, `tel`, `fax`, `status`, `bankName`, `branchName`, `branchCode`, `accountNumber`, `reff`) VALUES
(1, 'ABC Pharmacuticals', 'William De Wenter', '1234 Something Ave, Pretoria 0021', 'in@some.com', 1111111111, 1111111111, 1, 'ABSA', 'Pretoria', 111111, 1111111111, 'd+m dental');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
`id` int(11) NOT NULL,
  `description` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `description`) VALUES
(1, 'Mr'),
(2, 'Ms'),
(3, 'Mrs'),
(4, 'Doc'),
(5, 'Prof');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeetype`
--
ALTER TABLE `employeetype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalaid`
--
ALTER TABLE `medicalaid`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
 ADD PRIMARY KEY (`id`), ADD KEY `patientFK` (`titleID`), ADD KEY `patientFK1` (`genderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenttype`
--
ALTER TABLE `paymenttype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedure`
--
ALTER TABLE `procedure`
 ADD PRIMARY KEY (`id`), ADD KEY `procedure_fk1` (`proceduretypeID`);

--
-- Indexes for table `proceduretype`
--
ALTER TABLE `proceduretype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`), ADD KEY `prod_fk1` (`typeID`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medicalaid`
--
ALTER TABLE `medicalaid`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymenttype`
--
ALTER TABLE `paymenttype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `procedure`
--
ALTER TABLE `procedure`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proceduretype`
--
ALTER TABLE `proceduretype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
ADD CONSTRAINT `patientFK` FOREIGN KEY (`titleID`) REFERENCES `title` (`id`),
ADD CONSTRAINT `patientFK1` FOREIGN KEY (`genderID`) REFERENCES `gender` (`id`);

--
-- Constraints for table `procedure`
--
ALTER TABLE `procedure`
ADD CONSTRAINT `procedure_fk1` FOREIGN KEY (`proceduretypeID`) REFERENCES `proceduretype` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `prod_fk1` FOREIGN KEY (`typeID`) REFERENCES `producttype` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
