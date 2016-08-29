-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2016 at 01:03 PM
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
-- Table structure for table `access_level`
--

CREATE TABLE IF NOT EXISTS `access_level` (
`id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `description`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `address_postal`
--

CREATE TABLE IF NOT EXISTS `address_postal` (
`id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suburb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `box` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` int(11) NOT NULL,
  `cityID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address_postal`
--

INSERT INTO `address_postal` (`id`, `number`, `street`, `suburb`, `box`, `postal_code`, `cityID`) VALUES
(1, 1135, 'Francis Baard', 'Hatfield', '', 28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `address_pyhsical`
--

CREATE TABLE IF NOT EXISTS `address_pyhsical` (
`id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `suburb` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area_code` int(11) NOT NULL,
  `cityID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address_pyhsical`
--

INSERT INTO `address_pyhsical` (`id`, `number`, `street`, `suburb`, `area_code`, `cityID`) VALUES
(1, 1135, 'Francis Baard', 'Hatfield', 28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE IF NOT EXISTS `audit_log` (
`id` int(11) NOT NULL,
  `trans_date` datetime NOT NULL,
  `trans_time` datetime NOT NULL,
  `process` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `v_old` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_new` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL,
  `description` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `provinceID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `description`, `provinceID`) VALUES
(1, 'polokwane', 1),
(2, 'tzaneen', 1),
(3, 'pretoria', 2),
(4, 'johannesburg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
`id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `booking_typeID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`id` int(11) NOT NULL,
  `description` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `description`) VALUES
(1, 'South Africa');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(11) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` int(13) NOT NULL,
  `username` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address_postalID` int(11) NOT NULL,
  `address_physicalID` int(11) NOT NULL,
  `genderID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `surname`, `id_number`, `username`, `password`, `cellphone`, `email`, `status`, `address_postalID`, `address_physicalID`, `genderID`, `titleID`, `employee_typeID`) VALUES
(1, 'Malesela', 'Ramphele', 2147483647, 'bam1234', '$2y$10$lCDonWcPwK7sd9e/59ueV.jQ3kq/nHOE03Cpt7Ubrx4B1MAq3/BH6', 761921351, 'ramphele@yahoo.com', 'active', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_access`
--

CREATE TABLE IF NOT EXISTS `employee_access` (
  `access_levelID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_access`
--

INSERT INTO `employee_access` (`access_levelID`, `employee_typeID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
`id` int(11) NOT NULL,
  `description` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `description`) VALUES
(1, 'male'),
(2, 'female'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `illness_history`
--

CREATE TABLE IF NOT EXISTS `illness_history` (
`id` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
`id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `patientID` int(11) NOT NULL,
  `consultationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `line_invoice`
--

CREATE TABLE IF NOT EXISTS `line_invoice` (
  `product_quantity` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `procedureID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `line_prescription`
--

CREATE TABLE IF NOT EXISTS `line_prescription` (
  `dosage` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `restrictions` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `chronic` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `patientID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `prescriptionID` int(11) NOT NULL,
  `consultationID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `booking_typeID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_aid`
--

CREATE TABLE IF NOT EXISTS `medical_aid` (
`id` int(11) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `address_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_physical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medical_aid`
--

INSERT INTO `medical_aid` (`id`, `name`, `address_postal`, `address_physical`, `telephone`, `fax`, `email`) VALUES
(1, 'Bonitas', 'some postal address', 'some physical address', 123456789, 123456789, 'something@bonitas.co.za'),
(2, 'GEMS', 'some postal address', 'some physical address', 123456789, 123456789, 'something@gems.co.za'),
(3, 'Discovery', 'some postal address', 'some physical address', 123456789, 123456789, 'something@discovery.co.za'),
(4, 'Palmed', 'some postal address', 'some physical address', 123456789, 123456789, 'something@palmed.co.za'),
(5, 'Medshield', 'some postal address', 'some physical address', 123456789, 123456789, 'something@medshield.co.za');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `number` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `supplierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
`id` int(11) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` int(11) NOT NULL,
  `dob` date NOT NULL,
  `telephone` int(11) NOT NULL,
  `cellphone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `file_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `medical_aidID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `genderID` int(11) NOT NULL,
  `address_postalID` int(11) NOT NULL,
  `address_physicalID` int(11) NOT NULL,
  `medical_aid_typeID` int(11) NOT NULL,
  `member_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_illness_history`
--

CREATE TABLE IF NOT EXISTS `patient_illness_history` (
  `illness_historyID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `payment_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `practice_location`
--

CREATE TABLE IF NOT EXISTS `practice_location` (
`id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `practice_location`
--

INSERT INTO `practice_location` (`id`, `description`) VALUES
(1, 'Location A'),
(2, 'Location B');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
`id` int(11) NOT NULL,
  `dosage` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `validity` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `patientID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `booking_typeID` int(11) NOT NULL,
  `consultationID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL,
  `employee_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_procedure`
--

CREATE TABLE IF NOT EXISTS `price_procedure` (
  `procedureID` int(11) NOT NULL,
  `medical_aidID` int(11) NOT NULL,
  `medical_aid_typeID` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_product`
--

CREATE TABLE IF NOT EXISTS `price_product` (
  `productID` int(11) NOT NULL,
  `medical_aidID` int(11) NOT NULL,
  `medical_aid_typeID` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procedure`
--

CREATE TABLE IF NOT EXISTS `procedure` (
`id` int(11) NOT NULL,
  `description` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `price` double NOT NULL,
  `favorite` int(11) NOT NULL,
  `procedure_typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `number` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `critical_value` int(11) NOT NULL,
  `favorite` tinyint(4) NOT NULL,
  `product_typeID` int(11) NOT NULL,
  `stockID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
`id` int(11) NOT NULL,
  `description` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `countryID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `description`, `countryID`) VALUES
(1, 'Limpopo', 1),
(2, 'Gauteng', 1),
(3, 'KwaZulu Natal', 1),
(4, 'Freestate', 1),
(5, 'Mpumalanga', 1),
(6, 'North West', 1),
(7, 'Northern Cape', 1),
(8, 'Eastern Cape', 1),
(9, 'Western Cape', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`id` int(11) NOT NULL,
  `available_date` datetime NOT NULL,
  `available` tinyint(1) NOT NULL,
  `timeslotID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `practice_locationID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `available_date`, `available`, `timeslotID`, `employeeID`, `practice_locationID`) VALUES
(1, '2016-08-25 00:00:00', 1, 1, 1, 1),
(2, '2016-08-25 00:00:00', 1, 2, 1, 1),
(3, '2016-08-25 00:00:00', 1, 3, 1, 1),
(4, '2016-08-25 00:00:00', 1, 4, 1, 1),
(5, '2016-08-25 00:00:00', 1, 5, 1, 1),
(6, '2016-08-25 00:00:00', 1, 6, 1, 1),
(7, '2016-08-25 00:00:00', 1, 7, 1, 1),
(8, '2016-08-25 00:00:00', 1, 8, 1, 1),
(9, '2016-08-26 00:00:00', 1, 2, 1, 1),
(10, '2016-08-26 00:00:00', 1, 3, 1, 1),
(11, '2016-08-26 00:00:00', 1, 4, 1, 1),
(12, '2016-08-26 00:00:00', 1, 5, 1, 1),
(13, '2016-08-26 00:00:00', 1, 6, 1, 1),
(14, '2016-08-26 00:00:00', 1, 7, 1, 1),
(15, '2016-08-26 00:00:00', 1, 8, 1, 1),
(16, '2016-08-27 00:00:00', 1, 2, 1, 1),
(17, '2016-08-27 00:00:00', 1, 3, 1, 1),
(18, '2016-08-27 00:00:00', 1, 4, 1, 1),
(19, '2016-08-27 00:00:00', 1, 5, 1, 1),
(20, '2016-08-27 00:00:00', 1, 6, 1, 1),
(21, '2016-08-27 00:00:00', 1, 7, 1, 1),
(22, '2016-08-27 00:00:00', 1, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`id` int(11) NOT NULL,
  `unit_volume` int(11) NOT NULL,
  `ordered` int(11) NOT NULL,
  `recieved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_order`
--

CREATE TABLE IF NOT EXISTS `stock_order` (
  `orderID` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_writeoff`
--

CREATE TABLE IF NOT EXISTS `stock_writeoff` (
`id` int(11) NOT NULL,
  `writeoff_date` date NOT NULL,
  `reason` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(11) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `address_physical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `branch_number` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `bank_reference` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE IF NOT EXISTS `timeslot` (
`id` int(11) NOT NULL,
  `description` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `description`) VALUES
(1, '08h00'),
(2, '09h00'),
(3, '10h00'),
(4, '11h00'),
(5, '12h00'),
(6, '13h00'),
(7, '14h00'),
(8, '15h00'),
(9, '16h00'),
(10, '17h00');

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
(1, 'mr.'),
(2, 'ms.'),
(3, 'mrs.'),
(4, 'dr.'),
(5, 'prof.');

-- --------------------------------------------------------

--
-- Table structure for table `type_booking`
--

CREATE TABLE IF NOT EXISTS `type_booking` (
`id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_booking`
--

INSERT INTO `type_booking` (`id`, `description`) VALUES
(1, 'phone-in'),
(2, 'walk-in'),
(3, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `type_employee`
--

CREATE TABLE IF NOT EXISTS `type_employee` (
`id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `duties` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_employee`
--

INSERT INTO `type_employee` (`id`, `description`, `duties`) VALUES
(1, 'manager', 'to be added later'),
(2, 'dentist', 'to be added later'),
(3, 'dentist assistant', 'to be added later'),
(4, 'secretary', 'to be added later');

-- --------------------------------------------------------

--
-- Table structure for table `type_medical_aid`
--

CREATE TABLE IF NOT EXISTS `type_medical_aid` (
`id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medical_aidID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_medical_aid`
--

INSERT INTO `type_medical_aid` (`id`, `description`, `medical_aidID`) VALUES
(1, 'Bonitas type 1', 1),
(2, 'Bonitas type 2', 1),
(3, 'Bonitas type 3', 1),
(4, 'GEMS type 1', 2),
(5, 'GEMS type 2', 2),
(6, 'GEMS type 3', 2),
(7, 'Discovery type 1', 3),
(8, 'Discovery type 2', 3),
(9, 'Discovery type 3', 3),
(10, 'Palmed type 1', 4),
(11, 'Palmed type 2', 4),
(12, 'Palmed type 3', 4),
(13, 'Medshield type 1', 5),
(14, 'Medshield type 2', 5),
(15, 'Medshield type 3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `type_member`
--

CREATE TABLE IF NOT EXISTS `type_member` (
`id` int(11) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_patient`
--

CREATE TABLE IF NOT EXISTS `type_patient` (
`id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_patient`
--

INSERT INTO `type_patient` (`id`, `description`) VALUES
(1, 'main'),
(2, 'dependant');

-- --------------------------------------------------------

--
-- Table structure for table `type_payment`
--

CREATE TABLE IF NOT EXISTS `type_payment` (
`id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_procedure`
--

CREATE TABLE IF NOT EXISTS `type_procedure` (
`id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE IF NOT EXISTS `type_product` (
`id` int(11) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_postal`
--
ALTER TABLE `address_postal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_pyhsical`
--
ALTER TABLE `address_pyhsical`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `illness_history`
--
ALTER TABLE `illness_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_aid`
--
ALTER TABLE `medical_aid`
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
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice_location`
--
ALTER TABLE `practice_location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedure`
--
ALTER TABLE `procedure`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_writeoff`
--
ALTER TABLE `stock_writeoff`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_booking`
--
ALTER TABLE `type_booking`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_employee`
--
ALTER TABLE `type_employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_medical_aid`
--
ALTER TABLE `type_medical_aid`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_member`
--
ALTER TABLE `type_member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_patient`
--
ALTER TABLE `type_patient`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_payment`
--
ALTER TABLE `type_payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_procedure`
--
ALTER TABLE `type_procedure`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `address_postal`
--
ALTER TABLE `address_postal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `address_pyhsical`
--
ALTER TABLE `address_pyhsical`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `illness_history`
--
ALTER TABLE `illness_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_aid`
--
ALTER TABLE `medical_aid`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `practice_location`
--
ALTER TABLE `practice_location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `procedure`
--
ALTER TABLE `procedure`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_writeoff`
--
ALTER TABLE `stock_writeoff`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type_booking`
--
ALTER TABLE `type_booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `type_employee`
--
ALTER TABLE `type_employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_medical_aid`
--
ALTER TABLE `type_medical_aid`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `type_member`
--
ALTER TABLE `type_member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_patient`
--
ALTER TABLE `type_patient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type_payment`
--
ALTER TABLE `type_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_procedure`
--
ALTER TABLE `type_procedure`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
