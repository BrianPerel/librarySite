<?php 
session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
if($_SESSION['loggedin'] == true && $_POST['cancel']) {
		$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
		# PDO fetch statement ($items_Requested is an object)
		$items_Requested = $sql -> fetch(PDO::FETCH_ASSOC);
		# Access $items_Requested object 'items_Requested' attribute and assign to a regular variable 
		$requests = $items_Requested['items_Requested'];
		$requests--;
		$sql = $con -> query("UPDATE useraccounts SET items_Requested = '$requests' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("UPDATE useraccounts SET requested_itemName = '' WHERE username = '$_SESSION[username]'");
		header('Location: myAccount.php');
}
?>