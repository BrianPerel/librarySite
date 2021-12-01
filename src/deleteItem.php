<!-- 
Purpose of webpage: receive delete item request from adminOperations.php, select item from db and delete the item
-->

<?php	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = htmlspecialchars(trim($_POST["name"]));
	}    
	
	echo $name; /* DO NOT REMOVE THIS */ 

	require("../includes/connect_db.php");
	$sql = $con -> query("SELECT * FROM items WHERE item_name = '$name'");
	$results = $sql -> fetchall(PDO::FETCH_ASSOC);

	if(empty($results)) {
		$message = "<p style='color: red'>Item \'$name\' Not Found In Database, Could Not Drop</p>";
	} else {
		$sql = $con -> query("DELETE FROM items WHERE item_name = '$name'");
		$message = "<p>Item \'$name\' dropped successfully</p>";
	}
	
	# jump to page with message 
	header("Location: adminOperations.php?delMessage=$message");
?>