<?php 
	session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	header('Location: searchItem.php?send=' . $_SESSION['checkout']);
	
	if($_SESSION['loggedin'] == true && $_POST['checkout2']) {
		$sql = $con -> query("UPDATE items SET Status='Out' WHERE Item_Name = '$_SESSION[checkout2]'");
		$items_out = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");
		$items_Out++;
		$sql = $con -> query("UPDATE useraccounts SET items_Out = $items_Out WHERE username = '$_SESSION[username]'");
		header('Location: searchItem.php?send1=' . $_SESSION['checkout2']);
		die;
	}
	
	else if($_SESSION['loggedin'] == true && $_POST['request']) {
		$items_out = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
		$items_Requested++;
		$sql = $con -> query("UPDATE useraccounts SET items_Requested = $items_Requested WHERE username = '$_SESSION[username]'");
		header('Location: searchItem.php?send2=' . $_SESSION['checkout2']);
		die;
	}
	
	else {
		$error = '<p style="color: red">Please sign into your account to check out and request items</p>';
		header('Location: searchItem.php?send3=' . $error);
	}
?>