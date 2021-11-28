-- library inventory site database
-- site name: 'www.HWL.com' 
-- database name: 'librarySite'

-- Create database 'librarysite' and select the database for use 
CREATE DATABASE librarysite;
USE librarysite;
CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';

-- Table structure for table 'admin'
CREATE TABLE `adminaccount` (
`userID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User ID #', 
`username` varchar(30) NOT NULL,
`email` varchar(30) NOT NULL,
`password` varchar(30) NOT NULL,
`fullName` varchar(30) NOT NULL,
`phoneNumber` varchar(12) NOT NULL,
`messages` int(30),
`admin_Profile_Photo` text,
PRIMARY KEY (userID)
);

-- Table structure for table 'items'
CREATE TABLE `items` (
`itemID` int(10) NOT NULL AUTO_INCREMENT,
`Item_Name` varchar(50) NOT NULL,
`Author` varchar(30),
`ISBN` varchar(20),
`Publication_Info` varchar(120),
`Year_of_Release` int(4),
`General_Audience` varchar(30), 
`Summary` varchar(255), 
`Item_Type` varchar(30),
`Col_No` varchar(30),
`Status` varchar(30),
`Location` varchar(30), 
`Price` decimal(10, 2),
`Requested` varchar(20), 
`photo` text,
PRIMARY KEY(itemID)
);

-- Table structure for table 'userAccount' 
CREATE TABLE `useraccounts` (
`userID` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(30) NOT NULL,
`email` varchar(30) NOT NULL,
`password` varchar(30) NOT NULL,
`full_Name` varchar(30) NOT NULL,
`phone_Number` varchar(12) NOT NULL,
`items_Out` int(10) NOT NULL,
`items_Requested` int(10) NOT NULL,
`messages` int(10) NOT NULL,
`fines_fees` decimal(10, 2) NOT NULL, 
`profile_Photo` text,
PRIMARY KEY (userID) 
);

-- Table structure for `itemsreq`
CREATE TABLE `itemsreq` (
`itemID` int(10) NOT NULL AUTO_INCREMENT,
`item_Name` varchar(50),
`requester` varchar(30),
PRIMARY KEY (itemID)
);

-- Table structure for 'itemsout'
CREATE TABLE `itemsout` (
`itemID` int(10) NOT NULL AUTO_INCREMENT,
`item_Name` varchar(50),
`item_Holder` varchar(30),
`checkout_Date` varchar(10), 
`days_Out` int(14),
`due_Date` varchar(10), 
`renewed` varchar(10),
PRIMARY KEY (itemID)
);
