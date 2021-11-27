# librarySite
A simulation of a public library website system 
A dynamic database-driven client-server web site to maintain persistent information on the Web

-Sign up / sign in, Search for an item (book, dvd, blue-ray, ebook, video game, cd), Request it, if not available, Check out or return item, 
Option to check item return dates and extend it, edit personal account information
-Admin has rights to add, update, or remove items from db in case an item is bought or sold  

Using xampp local web server solution stack package<br> 
-with Apache HTTP server and mysql dbms service


Languages/tools used:<br>
(-- client side --)<br>
HTML5, CSS3, Javascript, Ajax, Curl, JSON    

(-- server side --) 
MySQL database (sql), PHP 

Services: imagebb (for external image storage), Google Maps API, Google recaptcha API 


Purpose of project: to learn and exercise client and server side programming 

If starting fresh (no db): 1. create new db in phpmyadmin, import sql file into phpmyadmin
(click on newly created db, click import tab, upload file), need to configure xampp file to
your IP to allow google's recaptcha tool to function on site 
 
To run php files in the browser we will use xampp apache as the server host,
place all src files into C:/xampp/htdocs folder
type http://localhost/(the name of folder in C:/xampp/htdocs/)/index.php
