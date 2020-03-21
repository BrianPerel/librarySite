-- library inventory site database
-- site name: 'www.HWL.com' 
-- database name: 'librarySite'

-- Table structure for table 'userAccount' 
CREATE TABLE `userAccount` (`username` varchar(50),
`email` varchar(50),
`password` varchar(50),
`full_Name` varchar(50),
`phone_Number` varchar(50));

-- Table structure for table 'admin'
CREATE TABLE `admin` (`username` varchar(50),
`email` varchar(50),
`password` varchar(50),
`fullName` varchar(50),
`phoneNumber` varchar(50));

-- Table structure for table 'items'
CREATE TABLE `items` (`Item_Name` varchar(50),
`ISBN` int(11),
`Author` varchar(50),
`Item_Type` varchar(50));

-- Dumping data for table 'items'
INSERT INTO `items` (`Item_Name`, `ISBN`, `Author`, `Item_Type`) VALUES
('The Art of Being a Ninja', 13212124, 'Brian Perel', 'Book'),
('Aikido', 34534534, 'John Smith', 'Movie'),
('Calisthenics Beasts', 567565543, 'Jason Armstrong', 'Movie');