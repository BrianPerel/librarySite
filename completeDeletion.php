<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	echo $_POST['item_name'];
//	$sql = $con -> query("DELETE FROM items WHERE Item_Name = '$_POST[iteName]'");
	echo 'Dropped';
?>