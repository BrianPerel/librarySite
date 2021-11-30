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
-- Table: 'admin_accounts'
--
CREATE TABLE `admin_accounts` (
`user_id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'User ID #', 
`username` VARCHAR(30) NOT NULL,
`email` VARCHAR(30) NOT NULL,
`password` VARCHAR(30) NOT NULL,
`full_name` VARCHAR(30) NOT NULL,
`phone_number` VARCHAR(12) NOT NULL,
`messages` INT(30),
`admin_photo` TEXT,
PRIMARY KEY (user_id)
);


--
-- Table: 'items'
--
CREATE TABLE `items` (
`item_id` INT(10) NOT NULL AUTO_INCREMENT,
`item_name` VARCHAR(50) NOT NULL,
`author` VARCHAR(30),
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
`item_photo` TEXT,
PRIMARY KEY(item_id)
);


--
-- Table: 'user_accounts'
-- 
CREATE TABLE `user_accounts` (
`user_id` INT(10) NOT NULL AUTO_INCREMENT,
`username` VARCHAR(30) NOT NULL,
`email` VARCHAR(30) NOT NULL,
`password` VARCHAR(30) NOT NULL,
`full_name` VARCHAR(30) NOT NULL,
`phone_Number` VARCHAR(12) NOT NULL,
`items_Out` INT(10) NOT NULL,
`items_Requested` INT(10) NOT NULL,
`messages` INT(10) NOT NULL,
`fines_fees` decimal(10, 2) NOT NULL, 
`user_photo` TEXT,
PRIMARY KEY (user_id) 
);


--
-- Table: `items_requested`
--
CREATE TABLE `items_requested` (
`item_id` INT(10) NOT NULL AUTO_INCREMENT,
`item_name` VARCHAR(50),
`requester` VARCHAR(30),
PRIMARY KEY (item_id)
);


--
-- Table: 'items_out'
--
CREATE TABLE `items_out` (
`item_id` INT(10) NOT NULL AUTO_INCREMENT,
`item_name` VARCHAR(50),
`item_holder` VARCHAR(30),
`checkout_date` VARCHAR(10), 
`days_out` INT(14),
`due_date` VARCHAR(10), 
`renewed` VARCHAR(10),
PRIMARY KEY (item_id)
);
