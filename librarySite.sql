-- library inventory site database
-- site name: 'www.HWL.com' 
-- database name: 'librarySite'

-- Create database 'librarysite' and select the database for use 
CREATE DATABASE librarysite;
USE librarysite;

-- Table structure for table 'admin'
CREATE TABLE `admin` (
`username` varchar(30) NOT NULL,
`email` varchar(30) NOT NULL,
`password` varchar(30) NOT NULL,
`fullName` varchar(30) NOT NULL,
`phoneNumber` varchar(12) NOT NULL,
`messages` int(30),
`admin_Profile_Photo` text, 
PRIMARY KEY (username)
);

-- Dumping data for table 'admin'
INSERT INTO `admin` (`username`, `email`, `password`, `fullName`, `phoneNumber`, `messages`, `admin_Profile_Photo`) VALUES 
('Mr. X', 'mrx@yahoo.com', 'Boss11', 'Brian Perel', '456-234-7686', '0', NULL);

-- Table structure for table 'items'
CREATE TABLE `items` (
`Item_Name` varchar(50) NOT NULL,
`Author` varchar(30),
`ISBN` int(18),
`Publication_Info` varchar(120),
`Year_of_Release` int(4),
`General_Audience` varchar(30), 
`Summary` varchar(255), 
`Item_Type` varchar(30),
`Col_No` varchar(30),
`Status` varchar(30),
`Location` varchar(30), 
`Price` decimal(10, 2),
`photo` text,
PRIMARY KEY(Item_Name)
);

-- Dumping data for table 'items'
INSERT INTO `items` (`Item_Name`, `Author`, `ISBN`, `Publication_Info`, `Year_of_Release`, `General_Audience`, `Summary`, `Item_Type`, `Col_No`, `Status`, `Location`, `Price`, `photo`) VALUES
('The Art of Being a Ninja', 'Brian Perel', 13212124, 'Hollywood, California : Paramount Home Entertainment', '2020', 'adult', 'The Art of Being a Ninja is a documentary film about how to become a ninja', 'Blu-ray', 'J796.815 B', 'Available', 'Framingham State University', '34.50', NULL),
('Aikido', 'John Smith', 34534534, 'Hollywood, California : Universal Studios Entertainment', '2010', 'adult', 'Aikido is a movie about the way of aikido practitioners and there lives', 'Movie', 'Z271.154 A', 'Available', 'Framingham State University', '12.80', NULL),
('Calisthenics Beasts', 'Jason Armstrong', 567565543, '[Old Saybrook, Ct.] : Tantor Media, Inc.', '2008', 'young-adult', 'Calisthenics Beasts is an ebook broken up into multiple sections by muscle groups', 'ebook', 'D938.121 C', 'Available', 'Framingham State University', '3.12', NULL),
('Wild Hunt', 'Jeff Taylor', 234234231, 'The Illustrated Publishers : Stonehill', '2004', 'adult', 'Hear the time-honored stories of a man on the hunt', 'Audio-book', 'R459.232 U', 'Available', 'Framingham State University', '14.50', NULL),
('Learn Russian - Русский язык', 'Dmitri Raslov', 678567453, 'The Russian Printing House : Hammerhead', '2017', 'adult', 'Learn to speak and read the Russian language like a pro. Как быстро выучить русский язык: Выучить русский не трудно, если у вас будет новый подход, и не «потеряетесь» в сложной грамматике. Используйте естественное и интуитивное обучения, чтобы быстро овладеть основами языка!', 'book', 'Q456.234 R', 'Available', 'Framingham State University', '20.50', NULL),
('No Excuses - The Power of self discipline', 'Brian Perel', 789849567, 'Classic Publishers : Ace', '2018', 'young-adult', 'Learn how to be self disciplined in life', 'book', 'A789.567 C', 'Available', 'Framingham State University', '18.75', NULL),
('Business Data Networks & Security', 'Julia Smith', 234456454, 'Prentice Hall', '2016', 'adult', 'Book on networking security covering packets, sockets, ip, protocols, network classes, and ftp', 'ebook', 'E657.435 T', 'Available', 'Framingham State University', '120.00', NULL),
('Rock Climber Pro 2', 'Abraham Grocer', 636845653, 'The Publishing Company', '2017', 'kids', 'A movie about rock climbing for kids', 'Movie', 'Q456.345 S', 'Available', 'Framingham State University', '8.50', NULL
);

-- Table structure for 'itemsout'
CREATE TABLE `itemsout` (
`item_Name` varchar(50) NOT NULL,
`item_Holder` varchar(30),
`checkout_Date` varchar(10), 
`days_Out` int(14),
`due_Date` varchar(10), 
`renewed` varchar(10),
PRIMARY KEY (item_Name)
);


-- Table structure for table 'userAccount' 
CREATE TABLE `useraccounts` (
`username` varchar(30) NOT NULL,
`email` varchar(30) NOT NULL,
`password` varchar(30) NOT NULL,
`full_Name` varchar(30) NOT NULL,
`phone_Number` varchar(12) NOT NULL,
`items_Out` int(10) NOT NULL,
`items_Requested` int(10) NOT NULL,
`requested_itemName` varchar(50), 
`messages` int(10) NOT NULL,
`fines_fees` decimal(10, 2) NOT NULL, 
`profile_Photo` text,
PRIMARY KEY (username)
);

-- Dumping data for table 'useraccounts'
INSERT INTO `useraccounts` (`username`, `email`, `password`, `full_Name`, `phone_Number`, `items_Out`, `items_Requested`, `requested_itemName`, `messages`, `fines_fees`, `profile_Photo`) VALUES
('bperel', 'brianperel@comcast.net', 'Toyota1999', 'Brian Perel', '508-215-7296', '0', '0', NULL, '0', '0.00', NULL);