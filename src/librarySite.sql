-- library inventory site database
-- site name: 'www.HWL.com' 
-- database name: 'librarySite'

-- Create database 'librarysite' and select the database for use 
CREATE DATABASE librarysite;
USE librarysite;

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

-- Dumping data for table 'admin'
INSERT INTO `adminaccount` (`username`, `email`, `password`, `fullName`, `phoneNumber`, `messages`, `admin_Profile_Photo`) VALUES 
('Mr. X', 'mrx@yahoo.com', 'Boss11', 'Brian Perel', '456-234-7686', '0', '../images/admin.png');

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

-- Dumping data for table 'items'
INSERT INTO `items` (`Item_Name`, `Author`, `ISBN`, `Publication_Info`, `Year_of_Release`, `General_Audience`, `Summary`, `Item_Type`, `Col_No`, `Status`, `Location`, `Price`, `Requested`, `photo`) VALUES
('The Art of Being a Ninja', 'Brian Perel', '132-12-12478-32-5', 'Hollywood, California : Paramount Home Entertainment', '2020', 'adult', 'The Art of Being a Ninja is a documentary film about how to become a ninja', 'Blu-ray', 'J796.815 B', 'Available', 'Framingham State University', '34.50', 'No', '../images/Ninja.jpg'),
('Aikido', 'John Smith', '345-34-5346-56-8', 'Hollywood, California : Universal Studios Entertainment', '2010', 'adult', 'Aikido is a movie about the way of aikido practitioners and there lives', 'DVD', 'Z271.154 A', 'Available', 'Framingham State University', '12.80', 'No', '../images/Aikido.jpg'),
('Calisthenics Beasts', 'Jason Armstrong', '567-56-55431-23-1', '[Old Saybrook, Ct.] : Tantor Media, Inc.', '2008', 'young-adult', 'Calisthenics Beasts is an ebook broken up into multiple sections by muscle groups', 'ebook', 'D938.121 C', 'Available', 'Framingham State University', '3.12', 'No', '../images/Calisthenics.jpg'),
('Wild Hunt', 'Jeff Taylor', '234-23-42310-02-4', 'The Illustrated Publishers : Stonehill', '2004', 'adult', 'Hear the time-honored stories of a man on the hunt', 'Audio-book', 'R459.232 U', 'Available', 'Framingham State University', '14.50', 'No', '../images/Wild_Hunt.jpg'),
('Learn Russian - Русский язык', 'Dmitri Raslov', '678567453', 'The Russian Printing House : Hammerhead', '2017', 'adult', 'Learn to speak and read the Russian language like a pro. Как быстро выучить русский язык: Выучить русский не трудно, если у вас будет новый подход, и не «потеряетесь» в сложной грамматике. Используйте естественное и интуитивное обучения, чтобы быстро овладеть основами языка!', 'book', 'Q456.234 R', 'Available', 'Framingham State University', '20.50', 'No', '../images/learnRussian.jpg'),
('No Excuses - The Power of self discipline', 'Brian Perel', '789-84-95671-23-6', 'Classic Publishers : Ace', '2018', 'young-adult', 'Learn how to be self disciplined in life', 'book', 'A789.567 C', 'Available', 'Framingham State University', '18.75', 'No', '../images/No_Excuses.jpg'),
('Business Data Networks & Security', 'Julia Smith', '234-45-64544-77-3', 'Prentice Hall', '2016', 'adult', 'Book on networking security covering packets, sockets, ip, protocols, network classes, and ftp', 'ebook', 'E657.435 T', 'Available', 'Framingham State University', '120.00', 'No', '../images/Business.jpg'),
('Rock Climber Pro 2', 'Abraham Grocer', '636-84-56531-23-1', 'The Publishing Company', '2017', 'kids', 'A movie about rock climbing for kids', 'DVD', 'Q456.345 S', 'Available', 'Framingham State University', '8.50', 'No', '../images/Rock_Climbing1.jpg'),
('Quiet Mind', 'Susan Piver', '978-92-95055-02-5', 'Shambhala Publications Inc.', '2008', 'adult', 'This book bringts together some of the country\'s most beloved meditation teachers. Each contributer presents a short written teaching along with an audio recording of a guided practice.', 'ebook', 'A231.234 B', 'Available', 'Framingham State University', '14.00', 'No', '../images/QuietMind.jpg'),
('Internet & World Wide Web', 'Paul Deitel', '435-23-43534-45-9', 'Prentice Hall/Deitel publications', '2008', 'adult', 'Learn all there is to web development', 'textbook', 'E768.5 L', 'Available', 'Framingham State University', '97.00', 'No', '../images/WWW.jpg'),
('Operating System Concepts', 'Abraham Silberschatz', '123-67-56755-45-2', 'John Wiley & Sons, Inc.', '2013', 'adult', 'Learn all there is to know about operating systems', 'textbook', 'R123.1 R', 'Available', 'Framingham State University', '120.00', 'No', '../images/OSI.jpg'),
('Draw 50 Animals', 'Lee J. Ames', '654-33-67876-56-9', 'Bantam Doubleday Dell Publishing Group Inc.', '1974', 'kids', 'Step by step guides on how to draw 50 different animals', 'ebbok', 'M436.0 E', 'Available', 'Framingham State University', '12.50', 'No', '../images/animals.jpg'),
('Eating the Alphabet: Fruits & Vegetables from A to Z', 'Lois Ehlert', '657-45-34533-23-5', 'HMH Books for Young Readers', '1993', 'kids', 'Fruits & Vegetables from A to Z', 'DVD', 'E234.1 A', 'Available', 'Framingham State University', '10.00', 'No', '../images/fruits.jpg'),
('Unstoppable Confidence', 'Kent Sayre', '456-45-23454-12-3', 'McGraw-Hill Education', '2008', 'adult', 'How to use the power of NLP to be more dynamic and successful', 'book', 'W657.4 B', 'Available', 'Framingham State University', '17.00', 'No', '../images/confidence.jpg'),
('Python Programming', 'Mark Lutz', '234-65-45645-34-8', 'O\'Reilly & Associates, Inc.', '1996', 'adult', 'A nutshell handbook on Python, an exciting object-oriented scripting language', 'textbook', 'T456.6 E', 'Available', 'Framingham State University', '44.95', 'No', '../images/python.jpg'),
('Guiness World Records 2020', 'Guinness World Records', '657-56-43564-34-2', 'Guinness World Records', '2020', 'adult', 'Fully revised and updated, the record-breaking compendium of superlatives is back and bursting with facts, figures and incredible stories – each one selected to inspire you to learn about the fascinating world we live in… and to break records of your own', 'ebook', 'S213.132 C', 'Available', 'Framingham State University', '16.46', 'No', '../images/records.jfif'),
('Far Cry 5', 'Ubisoft', '657-56-56456-45-4', 'Ubisoft', '2018', 'adult', 'Far Cry 5 is a 2018 first-person shooter game developed by Ubisoft Montreal and Ubisoft Toronto and published by Ubisoft. It is the standalone successor to the 2014\'s Far Cry 4, and the fifth main installment in the Far Cry series. The game takes place in Hope County, a fictional region of Montana, United States', 'video-game', 'T657.342 B', 'Available', 'Framingham State University', '14.99', 'No', '../images/fc5.jpg'),
('Splinter Cell Blacklist', 'Ubisoft', '768-67-45645-34-6', 'Ubisoft', '2013', 'adult', 'Tom Clancy\'s Splinter Cell: Blacklist is an action-adventure stealth video game developed by Ubisoft Toronto and published by Ubisoft. The seventh installment of the Tom Clancy\'s Splinter Cell series, it is the sequel of Splinter Cell: Conviction', 'video-game', 'E657.345 Y', 'Available', 'Framingham State University', '19.99', 'No', '../images/sp.jfif'),
('HTML, CSS, and JavaScript', 'Julie C. Meloni', '678-12-56745-67-3', 'Pearson Education', '2015', 'adult', 'In just a short time, you can learn how to use HTML, CSS, and JavaScript together to design, create, and maintain world-class websites', 'textbook', 'Y567.435 V', 'Available', 'Framingham State University', '39.99', 'No', '../images/html.jpg'),
('Java in easy steps', 'Mike McGrath', '789-67-45643-12-1', 'In Easy Steps', '2017', 'all ages', 'Learn Java programming in simple steps', 'ebook', 'E567.456 O', 'Available', 'Framingham State University', '15.99', 'No', '../images/Java.jpg'),
('Zombieland', 'Ruben Fleischer', '678-56-34545-23-4', 'Columbia Pictures', '2009', 'adult', 'After a virus turns most people into zombies, the world\'s surviving humans remain locked in an ongoing battle against the hungry undead. Four survivors -- Tallahassee (Woody Harrelson) and his cohorts Columbus (Jesse Eisenberg), Wichita (Emma Stone) and Little Rock (Abigail Breslin) -- abide by a list of survival rules and zombie-killing strategies as they make their way toward a rumored safe haven in Los Angeles.', 'blu-ray', 'A657.456 C', 'Available', 'Framingham State University', '5.99', 'No', '../images/z.jpg'),
('Monsters University', 'Dan Scanlon', '435-67-45665-12-9', 'Pixar Animation Studios', '2013', 'kids', 'Ever since he was a kid monster, Mike Wazowski (Billy Crystal) has dreamed of becoming a Scarer. To make his dream a reality, he enrolls at Monsters University. During his first semester, he meets Sulley (John Goodman), a natural-born Scarer. Sulley and Mike engage in a fierce rivalry that ultimately gets them both kicked out of MU\'s elite Scare Program. To make things right, Mike and Sulley -- along with a bunch of misfit monsters -- will have to learn to work together.', 'blu-ray', 'R657.345 D', 'Available', 'Framingham State University', '5.99', 'No', '../images/mu.png'),
('King Kong', 'Peter Jackson', '234-78-65743-78-3', 'Universal Studios', '2005', 'adult', 'Peter Jackson\'s expansive remake of the 1933 classic follows director Carl Denham (Jack Black) and his crew on a journey from New York City to the ominous Skull Island to film a new movie. Accompanying him are playwright Jack Driscoll (Adrien Brody) and actress Ann Darrow (Naomi Watts), who is whisked away by the monstrous ape, Kong, after they reach the island. The crew encounters dinosaurs and other creatures as they race to rescue Ann, while the actress forms a bond with her simian captor.', 'DVD', 'U657.234 H', 'Available', 'Framingham State University', '5.99', 'No', '../images/kk.jpg'),
('Yes Man', 'Peyton Reed', '657-45-23445-21-5', 'Warner Bros. Pictures', '2008', 'all ages', 'Carl Allen (Jim Carrey) is stuck in a rut with his negative ways. Then he goes to a self-help seminar and learns to unleash the power of yes. Living in the affirmative leads him to all sorts of amazing and transforming experiences; he gets a job promotion, and even finds a new romance. But Carl finds that too much of anything, even positive thinking, is not necessarily a good thing.', 'blu-ray', 'I456.234 Z', 'Available', 'Framingham State University', '5.99', 'No', '../images/yes.jpg'
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

-- Dumping data for table `itemsout` 
INSERT INTO `itemsout` (`item_Name`, `item_Holder`, `checkout_Date`, `days_Out`, `due_Date`, `renewed`) VALUES 
('Calisthenics Beasts', 'user1', '05/01/20', NULL, '05/08/20', 'No');

-- Table structure for `itemsreq`
CREATE TABLE `itemsreq` (
`itemID` int(10) NOT NULL AUTO_INCREMENT,
`item_Name` varchar(50),
`requester` varchar(30),
PRIMARY KEY (itemID)
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

-- Dumping data for table 'useraccounts'
INSERT INTO `useraccounts` (`username`, `email`, `password`, `full_Name`, `phone_Number`, `items_Out`, `items_Requested`, `messages`, `fines_fees`, `profile_Photo`) VALUES
('user1', 'user1@yahoo.com', 'user1', 'Brad Pitt', '768-324-4564', '1', '0', '0', '0.00', '../images/Pitt.jpg');