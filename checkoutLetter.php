<?php 
	session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	$sql = $con -> query("UPDATE items SET Status='Out' WHERE Item_Name = '$_SESSION[name]'");
	header('Location: letterFind.php?send2=' . $_SESSION['name']);
	die;
?>