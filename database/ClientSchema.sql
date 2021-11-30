-- library inventory site database
-- site name: 'www.HWL.com' 
-- database name: 'library'

-- Create user and grant all priviledges to this user
CREATE USER IF NOT EXISTS 'newuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost' IDENTIFIED BY 'password';

-- Create database 'library' and select the database for use 
CREATE DATABASE library;
USE library;


--
-- Table: 'admin'
--
CREATE TABLE `adminaccount` (
`userID` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'User ID #', 
`username` VARCHAR(30) NOT NULL,
`email` VARCHAR(30) NOT NULL,
`password` VARCHAR(30) NOT NULL,
`fullName` VARCHAR(30) NOT NULL,
`phoneNumber` VARCHAR(12) NOT NULL,
`messages` INT(30),
`admin_Profile_Photo` TEXT,
PRIMARY KEY (userID)
);


--
-- Table: 'items'
--
CREATE TABLE `items` (
`itemID` INT(10) NOT NULL AUTO_INCREMENT,
`Item_Name` VARCHAR(50) NOT NULL,
`Author` VARCHAR(30),
`ISBN` VARCHAR(20),
`Publication_Info` VARCHAR(120),
`Year_of_Release` INT(4),
`General_Audience` VARCHAR(30), 
`Summary` VARCHAR(255), 
`Item_Type` VARCHAR(30),
`Col_No` VARCHAR(30),
`Status` VARCHAR(30),
`Location` VARCHAR(30), 
`Price` decimal(10, 2),
`Requested` VARCHAR(20), 
`photo` TEXT,
PRIMARY KEY(itemID)
);


--
-- Table: 'userAccount'
-- 
CREATE TABLE `useraccounts` (
`userID` INT(10) NOT NULL AUTO_INCREMENT,
`username` VARCHAR(30) NOT NULL,
`email` VARCHAR(30) NOT NULL,
`password` VARCHAR(30) NOT NULL,
`full_Name` VARCHAR(30) NOT NULL,
`phone_Number` VARCHAR(12) NOT NULL,
`items_Out` INT(10) NOT NULL,
`items_Requested` INT(10) NOT NULL,
`messages` INT(10) NOT NULL,
`fines_fees` decimal(10, 2) NOT NULL, 
`profile_Photo` TEXT,
PRIMARY KEY (userID) 
);


--
-- Table: `itemsreq`
--
CREATE TABLE `itemsreq` (
`itemID` INT(10) NOT NULL AUTO_INCREMENT,
`item_Name` VARCHAR(50),
`requester` VARCHAR(30),
PRIMARY KEY (itemID)
);


--
-- Table: 'itemsout'
--
CREATE TABLE `itemsout` (
`itemID` INT(10) NOT NULL AUTO_INCREMENT,
`item_Name` VARCHAR(50),
`item_Holder` VARCHAR(30),
`checkout_Date` VARCHAR(10), 
`days_Out` INT(14),
`due_Date` VARCHAR(10), 
`renewed` VARCHAR(10),
PRIMARY KEY (itemID)
);
