# SQL-Front 5.1  (Build 4.16)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: UniversityHousing
# ------------------------------------------------------
# Server version 5.0.51b-community-nt-log

DROP DATABASE IF EXISTS `UniversityHousing`;
CREATE DATABASE `UniversityHousing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `UniversityHousing`;

#
# Source for table users
#

DROP TABLE IF EXISTS `Students`;
CREATE TABLE `Students` (
  `ID` VARCHAR(8) NOT NULL,
  `Password` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`ID`)
);

DROP TABLE IF EXISTS `Administrators`;
CREATE TABLE `Administrators` (
  `EmployeeID` VARCHAR(8) NOT NULL,
  `Password` VARCHAR(25) NOT NULL,
  `StreetName` VARCHAR(45) NULL,
  `City` VARCHAR(15) NULL,
  `Province` VARCHAR(2) NULL,
  `PostalCode` VARCHAR(6) NULL,
  `Fname` VARCHAR(20) NOT NULL,
  `Lname` VARCHAR(20) NOT NULL,
  `Building_Name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  FOREIGN KEY (`Building_Name`) REFERENCES `Buildings`(`Building_Name`)
);

DROP TABLE IF EXISTS `Mental Health Advisors`;
CREATE TABLE `Mental Health Advisors` (
  `EmployeeID` VARCHAR(8) NOT NULL,
  `Password` VARCHAR(25) NOT NULL,
  `StreetName` VARCHAR(45) NULL,
  `City` VARCHAR(15) NULL,
  `Province` VARCHAR(2) NULL,
  `PostalCode` VARCHAR(6) NULL,
  `Fname` VARCHAR(20) NOT NULL,
  `Lname` VARCHAR(20) NOT NULL,
  `Building_Name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  FOREIGN KEY (`Building_Name`) REFERENCES `Buildings`(`Building_Name`)
);

DROP TABLE IF EXISTS `Appointments`;
CREATE TABLE `Appointments` (
  `Advisor_ID` VARCHAR(8) NOT NULL,
  `Appointment_ID` INT NOT NULL AUTO_INCREMENT,
  `Date` VARCHAR(10) NOT NULL,
  `Time` VARCHAR(17) NOT NULL,
  `Student_ID` VARCHAR(8) NULL,
  PRIMARY KEY (`Appointment_ID`),
  FOREIGN KEY (`Advisor_ID`) REFERENCES `Mental Health Advisors`(`EmployeeID`),
  FOREIGN KEY (`Student_ID`) REFERENCES `Students`(`ID`)
);

DROP TABLE IF EXISTS `Applications`;
CREATE TABLE `Applications` (
  `StudentID` VARCHAR(8) NOT NULL,
  `Year_of_Study` INT NOT NULL,
  `Postal_Code` VARCHAR(6) NOT NULL,
  `Province` VARCHAR(2) NOT NULL,
  `Country` VARCHAR(20) NOT NULL,
  `StreetName` VARCHAR(45) NOT NULL,
  `City` VARCHAR(15) NOT NULL,
  `Fname` VARCHAR(20) NOT NULL,
  `Minit` VARCHAR(1) NOT NULL,
  `Lname` VARCHAR(20) NOT NULL,
  `Status` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`StudentID`)
);

DROP TABLE IF EXISTS `Parking Lots`;
CREATE TABLE `Parking Lots` (
  `LotNumber` INT NOT NULL,
  `Number_of_Spots` INT NOT NULL,
  `Building_Name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`LotNumber`),
  FOREIGN KEY (`Building_Name`) REFERENCES `Buildings`(`Building_Name`)
);

DROP TABLE IF EXISTS `Parking Spots`;
CREATE TABLE `Parking Spots` (
  `Spot_Number` INT NOT NULL,
  `Lot_Number` INT NOT NULL,
  PRIMARY KEY (`Spot_Number`)
  FOREIGN KEY ('Lot_Number') REFERENCES 'Parking Lots' ('LotNumber')
);

DROP TABLE IF EXISTS `Parks In`;
CREATE TABLE `Parks In` (
  `Spot_Number` INT NOT NULL,
  `Lot_Number` INT NOT NULL,
  `StudentID` VARCHAR(8) NOT NULL,
  FOREIGN KEY ('Spot_Number') REFERENCES 'Parking Spots' ('Spot_Number')
  FOREIGN KEY ('Lot_Number') REFERENCES 'Parking Lots' ('LotNumber')
  FOREIGN KEY ('StudentID') REFERENCES 'Applications' ('StudentID')
);

DROP TABLE IF EXISTS `Buildings`;
CREATE TABLE `Buildings` (
  `Building_Name` VARCHAR(30) NOT NULL,
  `StreetName` VARCHAR(45) NOT NULL,
  `Postal_Code` VARCHAR(6) NOT NULL,
  `Number_of_Rooms` INT NOT NULL,
  `Advisor_ID` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`Building_Name`)
);

DROP TABLE IF EXISTS `Building Amenities`;
CREATE TABLE `Building Amenities` (
  `Building_Name` VARCHAR(30) NOT NULL,
  `Amenity_Name` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`Building_Name`, `Amenity_Name`)
);

DROP TABLE IF EXISTS `Rooms`;
CREATE TABLE `Rooms` (
  `Room#` VARCHAR(4) NOT NULL,
  `Building_Name` VARCHAR(30) NOT NULL,
  `Rent_per_Sem` INT NOT NULL,
  `#bathrooms` INT NOT NULL,
  `#bedrooms` INT NOT NULL,
  PRIMARY KEY (`Room#`, `Building_Name`)
);

DROP TABLE IF EXISTS `Lives In`;
CREATE TABLE `Lives In` (
  `StudentID` VARCHAR(8) NOT NULL,
  `Room#` VARCHAR(4) NOT NULL,
  `Building_Name` VARCHAR(30) NOT NULL,
  FOREIGN KEY (`StudentID`) REFERENCES `Students`(`ID`),
  FOREIGN KEY (`Building_Name`) REFERENCES `Buildings`(`Building_Name`),
  FOREIGN KEY (`Room#`) REFERENCES `Rooms`(`Room#`)
);

INSERT INTO `Applications` (`StudentID`, `Year_of_Study`, `Postal_Code`, `Province`, `Country`, `StreetName`, `City`, `Fname`, `Minit`, `Lname`, `Status`) 
VALUES ('30127869', '3', 'h5u7h3', 'AB', 'Canada', 'Centre Street', 'Calgary', 'Isaiah', 'M', 'Lemieux', 'Submitted Pending Approval');

INSERT INTO `Students` (`ID`, `Password`) VALUES ('30127869', 'password1');
INSERT INTO `Students` (`ID`, `Password`) VALUES ('30113011', 'cpsc471');
INSERT INTO `Students` (`ID`, `Password`) VALUES ('30128947', 'hello_world');
INSERT INTO `Students` (`ID`, `Password`) VALUES ('30248893', 'databaseproject');

INSERT INTO `Administrators` (`EmployeeID`, `Password`, `StreetName`, `City`, `Province`, `PostalCode`, `Fname`, `Lname`, `Building_Name`)
VALUES ('12345678', 'AdminPassword$', '14th Avenue', 'Calgary', 'AB', 't8g3s9', 'Darcie', 'Bellows', 'Glacier Hall');
INSERT INTO `Administrators` (`EmployeeID`, `Password`, `StreetName`, `City`, `Province`, `PostalCode`, `Fname`, `Lname`, `Building_Name`)
VALUES ('88298291', '909pizza!', '10th Street', 'Calgary', 'AB', 't9h1s0', 'John', 'Smith', 'Cascade Hall');

INSERT INTO `Mental Health Advisors` (`EmployeeID`, `Password`, `StreetName`, `City`, `Province`, `PostalCode`, `Fname`, `Lname`, `Building_Name`)
VALUES ('77733322', '*blue_sky', 'Southland Drive', 'Calgary', 'AB', 't2j9a5', 'Stacy', 'Hart', 'Glacier Hall');
INSERT INTO `Mental Health Advisors` (`EmployeeID`, `Password`, `StreetName`, `City`, `Province`, `PostalCode`, `Fname`, `Lname`, `Building_Name`)
VALUES ('00013084', 'checkers2022', 'Banff Trail', 'Calgary', 'AB', 't0b9d6', 'Jerome', 'McGrovven', 'Cascade Hall');

INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('77733322', '15/12/2022', '10:00AM - 11:00AM');
INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('77733322', '15/12/2022', '12:00PM - 1:00PM');
INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('77733322', '16/12/2022', '9:00AM - 10:00AM');
INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('77733322', '16/12/2022', '10:00AM - 11:00AM');
INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('00013084', '17/12/2022', '2:00PM - 3:00PM');
INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('00013084', '17/12/2022', '3:00PM - 4:00PM');
INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('00013084', '19/12/2022', '10:00AM - 11:00AM');
INSERT INTO `Appointments` (`Advisor_ID`, `Date`, `Time`) VALUES ('00013084', '19/12/2022', '12:00PM - 1:00PM');

INSERT INTO `Parking Lots` (`LotNumber`, `Number_of_Spots`, `Building_Name`) VALUES ('28', '135', 'Glacier Hall');
INSERT INTO `Parking Lots` (`LotNumber`, `Number_of_Spots`, `Building_Name`) VALUES ('13', '25', 'Glacier Hall');
INSERT INTO `Parking Lots` (`LotNumber`, `Number_of_Spots`, `Building_Name`) VALUES ('9', '34', 'Cascade Hall');
INSERT INTO `Parking Lots` (`LotNumber`, `Number_of_Spots`, `Building_Name`) VALUES ('12', '55', 'Cascade Hall');

INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('1', '28');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('2', '28');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('3', '28');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('1', '13');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('2', '13');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('3', '13');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('1', '9');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('2', '9');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('3', '9');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('1', '12');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('2', '12');
INSERT INTO `Parking Spots` (`Spot_Number`, `Lot_Number`) VALUES ('3', '12');


INSERT INTO `Buildings` (`Building_Name`, `StreetName`, `Postal_Code`, `Number_of_Rooms`, `Advisor_ID`)
VALUES ('Glacier Hall', '24th Avenue', 't2n4v5', '75', '77733322');
INSERT INTO `Buildings` (`Building_Name`, `StreetName`, `Postal_Code`, `Number_of_Rooms`, `Advisor_ID`)
VALUES ('Cascade Hall', '24th Avenue', 't2n4v5', '155', '00013084');

INSERT INTO `Building Amenities` (`Building_Name`, `Amenity_Name`) VALUES ('Glacier Hall', '24 Hour Gym');
INSERT INTO `Building Amenities` (`Building_Name`, `Amenity_Name`) VALUES ('Glacier Hall', 'Hot Tub');
INSERT INTO `Building Amenities` (`Building_Name`, `Amenity_Name`) VALUES ('Glacier Hall', 'Laundry Room');
INSERT INTO `Building Amenities` (`Building_Name`, `Amenity_Name`) VALUES ('Cascade Hall', 'Laundry Room');
INSERT INTO `Building Amenities` (`Building_Name`, `Amenity_Name`) VALUES ('Cascade Hall', 'Coffee Bar');
INSERT INTO `Building Amenities` (`Building_Name`, `Amenity_Name`) VALUES ('Cascade Hall', 'Bike Locking System');

INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('100', 'Cascade Hall', '9015', '2', '2');
INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('101', 'Glacier Hall', '10000', '1', '1');
INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('103', 'Cascade Hall', '10000', '1', '1');
INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('100', 'Glacier Hall', '9015', '2', '2');
INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('103', 'Glacier Hall', '8575', '2', '4');
INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('104', 'Glacier Hall', '8700', '1', '2');
INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('101', 'Cascade Hall', '8575', '2', '4');
INSERT INTO `Rooms` (`Room#`, `Building_Name`, `Rent_per_sem`, `#bathrooms`, `#bedrooms`) VALUES ('102', 'Cascade Hall', '8700', '1', '2');


UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
