-- library inventory site database
-- site name: 'www.HWL.com' 
-- database name: 'librarySite'


-- Table structure for table 'userAccount' 
CREATE TABLE `useraccounts` (`username` varchar(255),
`email` varchar(255),
`password` varchar(255),
`full_Name` varchar(255),
`phone_Number` varchar(255),
`items_Out` int(11),
`items_Requested` int(11),
`messages` int(11));



-- Dumping data for table 'useraccounts'
INSERT INTO `useraccounts` (`username`, `email`, `password`, `full_Name`, `phone_Number`, `items_Out`, `items_Requested`, `messages`) VALUES
('bperel', 'brianperel@comcast.net', 'Toyota1999', 'Brian Perel', '508-215-7296', '3', '1', '1');


-- Table structure for table 'admin'
CREATE TABLE `admin` (`username` varchar(255),
`email` varchar(255),
`password` varchar(255),
`fullName` varchar(255),
`phoneNumber` varchar(255));


-- Dumping data for table 'admin'
INSERT INTO `admin` (`username`, `email`, `password`, `fullName`, `phoneNumber`) VALUES 
('Mr. X', 'mrx@yahoo.com', 'Boss11', 'Tony Rastafar', '456-234-7686');


-- Table structure for table 'items'
CREATE TABLE `items` (`Item_Name` varchar(255),
`Author` varchar(255),
`ISBN` int(15),
`Publication_Info` varchar(255),
`Year_of_Release` varchar(255),
`General_Audience` varchar(255), 
`Summary` varchar(255), 
`Item_Type` varchar(255),
`Col_No` varchar(255),
`Status` varchar(255));


-- Dumping data for table 'items'
INSERT INTO `items` (`Item_Name`, `Author`, `ISBN`, `Publication_Info`, `Year_of_Release`, `General_Audience`, `Summary`, `Item_Type`, `Col_No`, `Status`) VALUES
('The Art of Being a Ninja', 'Brian Perel', 13212124, 'Hollywood, California : Paramount Home Entertainment', '2020', 'adult', 'The Art of Being a Ninja is a documentary film about how to become a ninja', 'Blu-ray', 'J796.815 B', 'Available'),
('Aikido', 'John Smith', 34534534, 'Hollywood, California : Universal Studios Entertainment', '2010', 'adult', 'Aikido is a book about the way of aikido practitioners and there lives', 'Movie', 'Z271.154 A', 'Available'),
('Calisthenics Beasts', 'Jason Armstrong', 567565543, '[Old Saybrook, Ct.] : Tantor Media, Inc.', '2008', 'young-adult', 'Calisthenics Beasts is an ebook broken up into multiple sections by muscle groups', 'ebook', 'D938.121 C', 'Available');