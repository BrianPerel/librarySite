<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_REQUEST[item_name]'");
	$results = $sql -> fetchall(PDO::FETCH_ASSOC);
	$item = $_REQUEST['item_name'];
	
	echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';

	if(sizeof($results) == 0) {
		$message = '<p style="color: red">Item \'' . $item . '\' Not Found In Database, Could Not Drop</p>';
	}
	
	else {
		$sql = $con -> query("DELETE FROM items WHERE Item_Name = '$_REQUEST[item_name]'");
		$message = '<p>Item \'' . $item . '\' Dropped Successfully</p>';
	}
	
	header('Location: adminOperations.php?delMessage=' . $message);
?>