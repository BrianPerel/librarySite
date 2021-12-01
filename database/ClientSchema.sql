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
`publication_info` VARCHAR(120),
`year_of_release` INT(4),
`general_audience` VARCHAR(30), 
`summary` VARCHAR(255), 
`item_type` VARCHAR(30),
`col_no` VARCHAR(30),
`status` VARCHAR(30),
`location` VARCHAR(30), 
`price` decimal(10, 2),
`requested` VARCHAR(20), 
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
`phone_number` VARCHAR(12) NOT NULL,
`items_out` INT(10) NOT NULL,
`items_requested` INT(10) NOT NULL,
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
