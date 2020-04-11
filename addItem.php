<?php
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_REQUEST[item_name]'");
	$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	$item = $_REQUEST['item_name'];
	
	if(sizeof($results) != 0) {
		$message = '<p style="color: red">Item \'' . $item . '\' With The Same Name Already Exists In Database, Could Not Add</p>';
	}
	
	else {
		$sql = $con -> query("INSERT INTO items (Item_Name, Author, ISBN, Publication_Info, Year_of_Release, General_Audience, Summary, Item_Type, Col_No, Status, Location, Price, photo) 
		VALUES ('$_REQUEST[item_name]', '$_REQUEST[author]', '$_REQUEST[ISBN]', '$_REQUEST[pub_info]', '$_REQUEST[year_released]', '$_REQUEST[gen_aud]', '$_REQUEST[summary]', '$_REQUEST[item_type]', '$_REQUEST[col_no]', 'Available', 'Framingham State University', '$_REQUEST[price]', '')");

		$message = '<p>Item \'' . $item . '\' Added Successfully</p>';
	}
	
	/*
	$Item = json_encode(array(
	"Item_Name" => $_REQUEST['item_name'],
	"Author" => $_REQUEST['author']
	));
	
	$sql = $con -> query("INSERT INTO special (field2) VALUES ('$Item')");
	$sql = $con -> query("SELECT * FROM special WHERE field2 = '$Item'");
	$json = $sql -> fetch(PDO::FETCH_ASSOC);
	echo json_encode($json['field2']);
	echo json_encode($json['field2']) -> Item_Name;
	*/
	header('Location: adminOperations.php?addMessage=' . $message);
?>