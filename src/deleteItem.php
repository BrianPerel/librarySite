<!--
Purpose of webpage: receive delete item request from adminOperations.php, select item from db and delete the item
-->

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = htmlspecialchars(trim($_POST["name"]));
	}

	echo $name; /* DO NOT REMOVE THIS */

	require_once("connect_db.php");
	$sql = $con -> query("SELECT * FROM items WHERE item_name = '$name'");
	$results = $sql -> fetchall(PDO::FETCH_ASSOC);

	if(empty($name)) {
		$message = "<p style='color: red'>Please enter an item name</p>";
	}
	elseif(empty($results)) {
		$message = "<p style='color: red'>Item '$name' Not Found In Database, Could Not Delete</p>";
	}
	else {
		$sql = $con -> query("DELETE FROM items WHERE item_name = '$name'");
		$message = "<p>Item '$name' has been successfully deleted from our library database</p>";
	}

	# jump to page with message
	header("Location: adminOperations.php?delMessage=$message");
?>