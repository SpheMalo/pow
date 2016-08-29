-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 29, 2016 at 08:54 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DENTAL`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACCESS_LEVEL`
--

CREATE TABLE `ACCESS_LEVEL` (
  `Access_Level_ID` int(11) NOT NULL,
  `Access_Level_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AUDIT_LOG`
--

CREATE TABLE `AUDIT_LOG` (
  `Audit_Log_ID` int(11) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  `Audit_Log_Date` date NOT NULL,
  `Audit_Log_Time` time NOT NULL,
  `Audit_Log_Process` varchar(35) NOT NULL,
  `Audit_Log_Old` varchar(35) NOT NULL,
  `Audit_Log_New` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `BOOKING_TYPE`
--

CREATE TABLE `BOOKING_TYPE` (
  `Booking_Type_ID` int(11) NOT NULL,
  `Booking_Type_Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CITY`
--

CREATE TABLE `CITY` (
  `City_ID` int(11) NOT NULL,
  `City_Name` varchar(35) NOT NULL,
  `Country_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CONSULTATION`
--

CREATE TABLE `CONSULTATION` (
  `Consultation_ID` int(11) NOT NULL,
  `Consultation_Notes` varchar(100) NOT NULL,
  `Consultation_Status` varchar(10) NOT NULL,
  `Booking_Type_ID` int(11) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  `Timeslot_ID` int(11) NOT NULL,
  `Practice_Location_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Schedule_ID` int(11) NOT NULL,
  `Employee_Type_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `COUNTRY`
--

CREATE TABLE `COUNTRY` (
  `Country_ID` int(11) NOT NULL,
  `Country_Name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `Employee_ID` int(11) NOT NULL,
  `Employee_Name` varchar(35) NOT NULL,
  `Employee_Surname` varchar(35) NOT NULL,
  `Employee_ID_Number` varchar(13) NOT NULL,
  `Employee_Username` varchar(7) NOT NULL,
  `Employee_Password` varchar(7) NOT NULL,
  `Employee_Cellphone` varchar(10) NOT NULL,
  `Employee_Email_Address` varchar(50) NOT NULL,
  `Employee_Status` varchar(10) NOT NULL,
  `Employee_Type_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE_ACCESS`
--

CREATE TABLE `EMPLOYEE_ACCESS` (
  `Access_Level_ID` int(11) NOT NULL,
  `Employee_Type_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE_TYPE`
--

CREATE TABLE `EMPLOYEE_TYPE` (
  `Employee_Type_ID` int(11) NOT NULL,
  `Employee_Type_Description` varchar(50) NOT NULL,
  `Employee_Type_Duties` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `GENDER`
--

CREATE TABLE `GENDER` (
  `Gender_ID` int(11) NOT NULL,
  `Gender_Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ILLNESS_HISTORY`
--

CREATE TABLE `ILLNESS_HISTORY` (
  `Illness_History_ID` int(11) NOT NULL,
  `Illness_History_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MEDICAL_AID`
--

CREATE TABLE `MEDICAL_AID` (
  `Medical_Aid_ID` int(11) NOT NULL,
  `Medical_Aid_Name` varchar(35) NOT NULL,
  `Medical_Aid_Physical_Address` varchar(255) NOT NULL,
  `Medical_Aid_Postal_Address` varchar(255) NOT NULL,
  `Medical_Aid_Telephone` varchar(10) NOT NULL,
  `Medical_Aid_Fax` varchar(10) NOT NULL,
  `Medical_Aid_Email_Address` int(255) NOT NULL,
  `Medical_Aid_Type_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MEDICAL_AID_TYPE`
--

CREATE TABLE `MEDICAL_AID_TYPE` (
  `Medical_Aid_Type_ID` int(11) NOT NULL,
  `Medical_Aid_Type_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MEMBER_TYPE`
--

CREATE TABLE `MEMBER_TYPE` (
  `Member_Type_ID` int(11) NOT NULL,
  `Member_Type_Name` varchar(35) NOT NULL,
  `Member_Type_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `Order_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Order_Number` varchar(5) NOT NULL,
  `Order_Date` date NOT NULL,
  `Order_Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PATIENT_ILLNESS_HISTORY`
--

CREATE TABLE `PATIENT_ILLNESS_HISTORY` (
  `Patient_Illness_History_ID` int(11) NOT NULL,
  `Illness_History_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PATIENT_TYPE`
--

CREATE TABLE `PATIENT_TYPE` (
  `Patient_Type_ID` int(11) NOT NULL,
  `Patient_Type_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PAYMENT_TYPE`
--

CREATE TABLE `PAYMENT_TYPE` (
  `Patient_Type_ID` int(11) NOT NULL,
  `Patient_Type_Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PHYSICAL_ADDRESS`
--

CREATE TABLE `PHYSICAL_ADDRESS` (
  `Physical_Address_ID` int(11) NOT NULL,
  `Physical_Address_House_Number` int(11) NOT NULL,
  `Physical_Address_Street_Name` varchar(50) NOT NULL,
  `Physical_Address_Surburb` varchar(50) NOT NULL,
  `Physical_Address_Area_Code` int(11) NOT NULL,
  `City_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `POSTAL_ADDRESS`
--

CREATE TABLE `POSTAL_ADDRESS` (
  `Postal_Address_ID` int(11) NOT NULL,
  `Postal_Address_Number` int(11) NOT NULL,
  `Postal_Address_Area` varchar(10) NOT NULL,
  `Postal_Address_Area_Code` int(11) NOT NULL,
  `City_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PRACTICE_LOCATION`
--

CREATE TABLE `PRACTICE_LOCATION` (
  `Practice_Location_ID` int(11) NOT NULL,
  `Practice_Location_Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PROCEDURE_TYPE`
--

CREATE TABLE `PROCEDURE_TYPE` (
  `Procedure_Type_ID` int(11) NOT NULL,
  `Procedure_Type_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_TYPE`
--

CREATE TABLE `PRODUCT_TYPE` (
  `Product_Type_ID` int(11) NOT NULL,
  `Product_Type_Name` varchar(35) NOT NULL,
  `Product_Type_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PROVINCE`
--

CREATE TABLE `PROVINCE` (
  `Province_ID` int(11) NOT NULL,
  `Province_Name` varchar(10) NOT NULL,
  `Country_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SCHEDULE`
--

CREATE TABLE `SCHEDULE` (
  `Schedule_ID` int(11) NOT NULL,
  `Schedule_Date` date NOT NULL,
  `Available_Time_Slot` int(11) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  `Timeslot_ID` int(11) NOT NULL,
  `Practice_Location_ID` int(11) NOT NULL,
  `Employee_Type_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STOCK`
--

CREATE TABLE `STOCK` (
  `Stock_ID` int(11) NOT NULL,
  `Stock_Unit_Volume` int(11) NOT NULL,
  `Stock_Recieved` int(11) NOT NULL,
  `Stock_Ordered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STOCK_ORDER`
--

CREATE TABLE `STOCK_ORDER` (
  `Stock_Order_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Stock_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SUPPLIER`
--

CREATE TABLE `SUPPLIER` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(35) NOT NULL,
  `Contact_Person_Name` varchar(35) NOT NULL,
  `Supplier_Email_Address` varchar(50) NOT NULL,
  `Supplier_Telephone` varchar(10) NOT NULL,
  `Supplier_Fax` varchar(10) NOT NULL,
  `Supplier_Physical_Address` varchar(255) NOT NULL,
  `Supplier_Status` varchar(10) NOT NULL,
  `Supplier_Bank_Name` varchar(255) NOT NULL,
  `Supplier_Bank_Branch_Name` varchar(35) NOT NULL,
  `Supplier_Bank_Branch_Code` varchar(6) NOT NULL,
  `Supplier_Account_Number` varchar(15) NOT NULL,
  `Supplier_Bank_Reference` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TIMESLOT`
--

CREATE TABLE `TIMESLOT` (
  `Timeslot_ID` int(11) NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TITLE`
--

CREATE TABLE `TITLE` (
  `Title_ID` int(11) NOT NULL,
  `Title_Name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCESS_LEVEL`
--
ALTER TABLE `ACCESS_LEVEL`
  ADD PRIMARY KEY (`Access_Level_ID`);

--
-- Indexes for table `AUDIT_LOG`
--
ALTER TABLE `AUDIT_LOG`
  ADD PRIMARY KEY (`Audit_Log_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `BOOKING_TYPE`
--
ALTER TABLE `BOOKING_TYPE`
  ADD PRIMARY KEY (`Booking_Type_ID`);

--
-- Indexes for table `CITY`
--
ALTER TABLE `CITY`
  ADD PRIMARY KEY (`City_ID`),
  ADD KEY `Country_ID` (`Country_ID`);

--
-- Indexes for table `CONSULTATION`
--
ALTER TABLE `CONSULTATION`
  ADD PRIMARY KEY (`Consultation_ID`),
  ADD KEY `Booking_Type_ID` (`Booking_Type_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `Practice_Location_ID` (`Practice_Location_ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`),
  ADD KEY `Employee_Type_ID` (`Employee_Type_ID`),
  ADD KEY `Timeslot_ID` (`Timeslot_ID`);

--
-- Indexes for table `COUNTRY`
--
ALTER TABLE `COUNTRY`
  ADD PRIMARY KEY (`Country_ID`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `Employee_Type_ID` (`Employee_Type_ID`);

--
-- Indexes for table `EMPLOYEE_ACCESS`
--
ALTER TABLE `EMPLOYEE_ACCESS`
  ADD KEY `Employee_Type_ID` (`Employee_Type_ID`),
  ADD KEY `Access_Level_ID` (`Access_Level_ID`);

--
-- Indexes for table `EMPLOYEE_TYPE`
--
ALTER TABLE `EMPLOYEE_TYPE`
  ADD PRIMARY KEY (`Employee_Type_ID`);

--
-- Indexes for table `GENDER`
--
ALTER TABLE `GENDER`
  ADD PRIMARY KEY (`Gender_ID`);

--
-- Indexes for table `ILLNESS_HISTORY`
--
ALTER TABLE `ILLNESS_HISTORY`
  ADD PRIMARY KEY (`Illness_History_ID`);

--
-- Indexes for table `MEDICAL_AID`
--
ALTER TABLE `MEDICAL_AID`
  ADD PRIMARY KEY (`Medical_Aid_ID`),
  ADD KEY `Medical_Aid_Type_ID` (`Medical_Aid_Type_ID`);

--
-- Indexes for table `MEDICAL_AID_TYPE`
--
ALTER TABLE `MEDICAL_AID_TYPE`
  ADD PRIMARY KEY (`Medical_Aid_Type_ID`);

--
-- Indexes for table `MEMBER_TYPE`
--
ALTER TABLE `MEMBER_TYPE`
  ADD PRIMARY KEY (`Member_Type_ID`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Supplier_ID` (`Supplier_ID`);

--
-- Indexes for table `PATIENT_ILLNESS_HISTORY`
--
ALTER TABLE `PATIENT_ILLNESS_HISTORY`
  ADD PRIMARY KEY (`Patient_Illness_History_ID`),
  ADD KEY `Illness_History_ID` (`Illness_History_ID`);

--
-- Indexes for table `PATIENT_TYPE`
--
ALTER TABLE `PATIENT_TYPE`
  ADD PRIMARY KEY (`Patient_Type_ID`);

--
-- Indexes for table `PAYMENT_TYPE`
--
ALTER TABLE `PAYMENT_TYPE`
  ADD PRIMARY KEY (`Patient_Type_ID`);

--
-- Indexes for table `PHYSICAL_ADDRESS`
--
ALTER TABLE `PHYSICAL_ADDRESS`
  ADD PRIMARY KEY (`Physical_Address_ID`),
  ADD KEY `City_ID` (`City_ID`);

--
-- Indexes for table `POSTAL_ADDRESS`
--
ALTER TABLE `POSTAL_ADDRESS`
  ADD PRIMARY KEY (`Postal_Address_ID`),
  ADD KEY `City_ID` (`City_ID`);

--
-- Indexes for table `PRACTICE_LOCATION`
--
ALTER TABLE `PRACTICE_LOCATION`
  ADD PRIMARY KEY (`Practice_Location_ID`);

--
-- Indexes for table `PROCEDURE_TYPE`
--
ALTER TABLE `PROCEDURE_TYPE`
  ADD PRIMARY KEY (`Procedure_Type_ID`);

--
-- Indexes for table `PRODUCT_TYPE`
--
ALTER TABLE `PRODUCT_TYPE`
  ADD PRIMARY KEY (`Product_Type_ID`);

--
-- Indexes for table `PROVINCE`
--
ALTER TABLE `PROVINCE`
  ADD PRIMARY KEY (`Province_ID`),
  ADD KEY `Country_ID` (`Country_ID`);

--
-- Indexes for table `SCHEDULE`
--
ALTER TABLE `SCHEDULE`
  ADD PRIMARY KEY (`Schedule_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `Time_Slot_ID` (`Timeslot_ID`),
  ADD KEY `Employee_Type_ID` (`Employee_Type_ID`),
  ADD KEY `Practice_Location_ID` (`Practice_Location_ID`);

--
-- Indexes for table `STOCK`
--
ALTER TABLE `STOCK`
  ADD PRIMARY KEY (`Stock_ID`);

--
-- Indexes for table `STOCK_ORDER`
--
ALTER TABLE `STOCK_ORDER`
  ADD PRIMARY KEY (`Stock_Order_ID`),
  ADD KEY `Supplier_ID` (`Supplier_ID`),
  ADD KEY `Stock_ID` (`Stock_ID`);

--
-- Indexes for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `TIMESLOT`
--
ALTER TABLE `TIMESLOT`
  ADD PRIMARY KEY (`Timeslot_ID`);

--
-- Indexes for table `TITLE`
--
ALTER TABLE `TITLE`
  ADD PRIMARY KEY (`Title_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACCESS_LEVEL`
--
ALTER TABLE `ACCESS_LEVEL`
  MODIFY `Access_Level_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AUDIT_LOG`
--
ALTER TABLE `AUDIT_LOG`
  MODIFY `Audit_Log_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `BOOKING_TYPE`
--
ALTER TABLE `BOOKING_TYPE`
  MODIFY `Booking_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `CITY`
--
ALTER TABLE `CITY`
  MODIFY `City_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `CONSULTATION`
--
ALTER TABLE `CONSULTATION`
  MODIFY `Consultation_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `COUNTRY`
--
ALTER TABLE `COUNTRY`
  MODIFY `Country_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `EMPLOYEE_TYPE`
--
ALTER TABLE `EMPLOYEE_TYPE`
  MODIFY `Employee_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `GENDER`
--
ALTER TABLE `GENDER`
  MODIFY `Gender_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ILLNESS_HISTORY`
--
ALTER TABLE `ILLNESS_HISTORY`
  MODIFY `Illness_History_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MEDICAL_AID`
--
ALTER TABLE `MEDICAL_AID`
  MODIFY `Medical_Aid_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MEDICAL_AID_TYPE`
--
ALTER TABLE `MEDICAL_AID_TYPE`
  MODIFY `Medical_Aid_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MEMBER_TYPE`
--
ALTER TABLE `MEMBER_TYPE`
  MODIFY `Member_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ORDERS`
--
ALTER TABLE `ORDERS`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PATIENT_ILLNESS_HISTORY`
--
ALTER TABLE `PATIENT_ILLNESS_HISTORY`
  MODIFY `Patient_Illness_History_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PATIENT_TYPE`
--
ALTER TABLE `PATIENT_TYPE`
  MODIFY `Patient_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PAYMENT_TYPE`
--
ALTER TABLE `PAYMENT_TYPE`
  MODIFY `Patient_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PHYSICAL_ADDRESS`
--
ALTER TABLE `PHYSICAL_ADDRESS`
  MODIFY `Physical_Address_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `POSTAL_ADDRESS`
--
ALTER TABLE `POSTAL_ADDRESS`
  MODIFY `Postal_Address_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PRACTICE_LOCATION`
--
ALTER TABLE `PRACTICE_LOCATION`
  MODIFY `Practice_Location_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PROCEDURE_TYPE`
--
ALTER TABLE `PROCEDURE_TYPE`
  MODIFY `Procedure_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PRODUCT_TYPE`
--
ALTER TABLE `PRODUCT_TYPE`
  MODIFY `Product_Type_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PROVINCE`
--
ALTER TABLE `PROVINCE`
  MODIFY `Province_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SCHEDULE`
--
ALTER TABLE `SCHEDULE`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `STOCK`
--
ALTER TABLE `STOCK`
  MODIFY `Stock_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `STOCK_ORDER`
--
ALTER TABLE `STOCK_ORDER`
  MODIFY `Stock_Order_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TIMESLOT`
--
ALTER TABLE `TIMESLOT`
  MODIFY `Timeslot_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TITLE`
--
ALTER TABLE `TITLE`
  MODIFY `Title_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AUDIT_LOG`
--
ALTER TABLE `AUDIT_LOG`
  ADD CONSTRAINT `AUDIT_LOG_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `EMPLOYEE` (`Employee_ID`);

--
-- Constraints for table `CITY`
--
ALTER TABLE `CITY`
  ADD CONSTRAINT `CITY_ibfk_1` FOREIGN KEY (`Country_ID`) REFERENCES `COUNTRY` (`Country_ID`);

--
-- Constraints for table `CONSULTATION`
--
ALTER TABLE `CONSULTATION`
  ADD CONSTRAINT `CONSULTATION_ibfk_1` FOREIGN KEY (`Booking_Type_ID`) REFERENCES `BOOKING_TYPE` (`Booking_Type_ID`),
  ADD CONSTRAINT `CONSULTATION_ibfk_2` FOREIGN KEY (`Employee_ID`) REFERENCES `EMPLOYEE` (`Employee_ID`),
  ADD CONSTRAINT `CONSULTATION_ibfk_3` FOREIGN KEY (`Practice_Location_ID`) REFERENCES `PRACTICE_LOCATION` (`Practice_Location_ID`),
  ADD CONSTRAINT `CONSULTATION_ibfk_4` FOREIGN KEY (`Practice_Location_ID`) REFERENCES `PRACTICE_LOCATION` (`Practice_Location_ID`),
  ADD CONSTRAINT `CONSULTATION_ibfk_5` FOREIGN KEY (`Schedule_ID`) REFERENCES `SCHEDULE` (`Schedule_ID`),
  ADD CONSTRAINT `CONSULTATION_ibfk_6` FOREIGN KEY (`Employee_Type_ID`) REFERENCES `EMPLOYEE_TYPE` (`Employee_Type_ID`),
  ADD CONSTRAINT `CONSULTATION_ibfk_7` FOREIGN KEY (`Timeslot_ID`) REFERENCES `TIMESLOT` (`Timeslot_ID`);

--
-- Constraints for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD CONSTRAINT `EMPLOYEE_ibfk_1` FOREIGN KEY (`Employee_Type_ID`) REFERENCES `EMPLOYEE_TYPE` (`Employee_Type_ID`);

--
-- Constraints for table `EMPLOYEE_ACCESS`
--
ALTER TABLE `EMPLOYEE_ACCESS`
  ADD CONSTRAINT `EMPLOYEE_ACCESS_ibfk_1` FOREIGN KEY (`Employee_Type_ID`) REFERENCES `EMPLOYEE_TYPE` (`Employee_Type_ID`),
  ADD CONSTRAINT `EMPLOYEE_ACCESS_ibfk_2` FOREIGN KEY (`Access_Level_ID`) REFERENCES `ACCESS_LEVEL` (`Access_Level_ID`);

--
-- Constraints for table `MEDICAL_AID`
--
ALTER TABLE `MEDICAL_AID`
  ADD CONSTRAINT `MEDICAL_AID_ibfk_1` FOREIGN KEY (`Medical_Aid_Type_ID`) REFERENCES `MEDICAL_AID_TYPE` (`Medical_Aid_Type_ID`);

--
-- Constraints for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD CONSTRAINT `ORDERS_ibfk_1` FOREIGN KEY (`Supplier_ID`) REFERENCES `SUPPLIER` (`Supplier_ID`);

--
-- Constraints for table `PATIENT_ILLNESS_HISTORY`
--
ALTER TABLE `PATIENT_ILLNESS_HISTORY`
  ADD CONSTRAINT `PATIENT_ILLNESS_HISTORY_ibfk_1` FOREIGN KEY (`Illness_History_ID`) REFERENCES `ILLNESS_HISTORY` (`Illness_History_ID`);

--
-- Constraints for table `PHYSICAL_ADDRESS`
--
ALTER TABLE `PHYSICAL_ADDRESS`
  ADD CONSTRAINT `PHYSICAL_ADDRESS_ibfk_1` FOREIGN KEY (`City_ID`) REFERENCES `CITY` (`City_ID`);

--
-- Constraints for table `POSTAL_ADDRESS`
--
ALTER TABLE `POSTAL_ADDRESS`
  ADD CONSTRAINT `POSTAL_ADDRESS_ibfk_1` FOREIGN KEY (`City_ID`) REFERENCES `CITY` (`City_ID`);

--
-- Constraints for table `PROVINCE`
--
ALTER TABLE `PROVINCE`
  ADD CONSTRAINT `PROVINCE_ibfk_1` FOREIGN KEY (`Country_ID`) REFERENCES `COUNTRY` (`Country_ID`);

--
-- Constraints for table `SCHEDULE`
--
ALTER TABLE `SCHEDULE`
  ADD CONSTRAINT `SCHEDULE_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `EMPLOYEE` (`Employee_ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_2` FOREIGN KEY (`Timeslot_ID`) REFERENCES `TIMESLOT` (`Timeslot_ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_3` FOREIGN KEY (`Employee_Type_ID`) REFERENCES `EMPLOYEE_TYPE` (`Employee_Type_ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_4` FOREIGN KEY (`Practice_Location_ID`) REFERENCES `PRACTICE_LOCATION` (`Practice_Location_ID`);

--
-- Constraints for table `STOCK_ORDER`
--
ALTER TABLE `STOCK_ORDER`
  ADD CONSTRAINT `STOCK_ORDER_ibfk_1` FOREIGN KEY (`Supplier_ID`) REFERENCES `SUPPLIER` (`Supplier_ID`),
  ADD CONSTRAINT `STOCK_ORDER_ibfk_2` FOREIGN KEY (`Stock_ID`) REFERENCES `STOCK` (`Stock_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;