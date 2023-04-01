# library website

## Project Description
* A dynamic database-driven client-server web application designed to simulate a public website library system.

* The webapp allows users to sign up or sign in, search for items such as books, DVDs, Blu-rays, e-book, video game, CDs), request items,
check out or return items, and check item return dates and extend it, edit personal account information
* The admin has special privileges to add, update, or remove items from the database in case an item is bought or sold. This feature ensures that the database is always up-to-date and accurate

- We are giong to use XAMPP local web server solution stack package with Apache HTTP server and MySQL DBMS service

## Technologies used:

Client-side:
* HTML
* CSS
* Javascript
* Ajax
* Curl
* JSON

Server-side:
* MySQL database (SQL)
* PHP

External services:
* Imagebb (for external image storage)
* Google Maps API for displaying maps
* Google recaptcha API for security and SPAM protection

## Purpose of project
* To learn and exercise client and server side programming. The project provides hands-on experience with web development, database management, and API integration

## Getting started
If starting fresh without a database, follow these steps:

1. create a new database in phpmyadmin (http://localhost/phpmyadmin/) by importing the database/ClientSchema.sql file
2. import database/ClientData.sql file into phpmyadmin (click on the newly created db, click import tab, upload file)
3. configure the XAMPP config file to your IP to allow google's recaptcha tool to function on the site

To run the webapp in the browser, follow these steps:

1. place all project folders/files into C:/xampp/htdocs folder
2. open XAMPP control panel and launch both apache and mysql
3. open a web browser and type 'http://localhost/(the name of folder in C:/xampp/htdocs/)/index.php' to access the main project page in your web browser

For example:

	http://localhost/test/index.php

NOTE: If you use an adblocker extension in your web browser it may cause errors when rendering the google maps portion of the page
