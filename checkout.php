<?php 
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	$sql = $con -> query("UPDATE items SET Status='Out' WHERE Item_Name = 'Aikido'");
	header('Location: searchItem.php?send=' . 'Aikido');
	die;
?>