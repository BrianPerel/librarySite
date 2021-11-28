<?php 
	$con = "";

	try {
		$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	} 
	catch(PDOException $e) {
		echo 'Error message: ' .$e -> getMessage();
	}
?>