<!-- Purpose of webpage: receive delete item request from adminOperations.php, select item from db and delete the item -->

<?php	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = htmlspecialchars(trim($_POST["name"]));    
	} 
	
	echo $name; /* DO NOT REMOVE THIS */ 

	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$name'");
	$results = $sql -> fetchall(PDO::FETCH_ASSOC);

	if(sizeof($results) == 0) {
		$message = '<p style="color: red">Item \'' . $name . '\' Not Found In Database, Could Not Drop</p>';
	} else {
		$sql = $con -> query("DELETE FROM items WHERE Item_Name = '$name'");
		$message = '<p>Item \'' . $name . '\' Dropped Successfully</p>';
	}
	
	# jump to page with message 
	header('Location: adminOperations.php?delMessage=' . $message);
?>