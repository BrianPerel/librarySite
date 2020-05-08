<?php 
	session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
	if($_SESSION['loggedin'] == true && $_POST['checkout2']) {
		# update status of item we're checking out 
		$sql = $con -> query("UPDATE items SET Status='Out' WHERE Item_Name = '$_SESSION[checkout2]'");
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");
		$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
		$out = $items_Out1['items_Out'];
		$out++;
		$sql = $con -> query("UPDATE useraccounts SET items_Out = '$out' WHERE username = '$_SESSION[username]'");
		date_default_timezone_set('America/New_York'); 
		$date = date("m/d/Y"); 
		$due_Date = date("m/d/Y", strtotime('+7 days'));
		$sql = $con -> query("INSERT INTO itemsout (item_Name, item_Holder, checkout_Date, days_Out, due_Date, renewed) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]', '$date', '0', '$due_Date', 'No')");

		# boolean session variable to mark if we have or haven't cancelled our item request 
		if($_SESSION['flag'] == true) {
			$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
			$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
			$requests = $items_Out1['items_Requested'];
			$requests--;		
			
			if($requests > 0) {
				$sql = $con -> query("UPDATE useraccounts SET items_Requested = '$requests' WHERE username = '$_SESSION[username]'");
			}
		}
		header('Location: itemSearch.php?send1=' . $_SESSION['checkout2']);
	}
	
	else if($_SESSION['loggedin'] == true && $_POST['checkout2'] && $_SESSION['pageSentFrom'] == 'advSearch') {
		# update status of item we're checking out 
		$sql = $con -> query("UPDATE items SET Status='Out' WHERE Item_Name = '$_SESSION[checkout2]'");
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");
		$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
		$out = $items_Out1['items_Out'];
		$out++;
		$sql = $con -> query("UPDATE useraccounts SET items_Out = '$out' WHERE username = '$_SESSION[username]'");
		date_default_timezone_set('America/New_York'); 
		$date = date("m/d/Y"); 
		$due_Date = Date("m/d/Y", strtotime('+7 days'));
		$sql = $con -> query("INSERT INTO itemsout (item_Name, item_Holder, checkout_Date, days_Out, due_Date, renewed) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]', '$date', '0', '$due_Date', 'No')");
		header('Location: advSearch.php?send1=' . $_SESSION['checkout2']);
	}
	
	else if($_SESSION['loggedin'] == true && $_POST['request']) {
		$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
		$items_Requested = $sql -> fetch(PDO::FETCH_ASSOC);
		$requests = $items_Requested['items_Requested'];
		$requests++;
		$sql = $con -> query("UPDATE useraccounts SET items_Requested = '$requests' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("UPDATE useraccounts SET requested_itemName = '$_SESSION[checkout2]' WHERE username = '$_SESSION[username]'");
		header('Location: itemSearch.php?send2=' . $_SESSION['checkout2']);
	}
	
	else if($_SESSION['loggedin'] == true && $_POST['request'] && $_SESSION['pageSentFrom'] == 'advSearch') {
		$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
		$items_Requested = $sql -> fetch(PDO::FETCH_ASSOC);
		$requests = $items_Requested['items_Requested'];
		$requests++;
		$sql = $con -> query("UPDATE useraccounts SET items_Requested = '$requests' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("UPDATE useraccounts SET requested_itemName = '$_SESSION[checkout2]' WHERE username = '$_SESSION[username]'");
		header('Location: advSearchItem.php?send2=' . $_SESSION['checkout2']);
	}
	
	else if($_SESSION['loggedin'] == false && $_SESSION['pageSentFrom'] == 'advSearch') {
		$error = '<p style="color: red">Please sign into your account to check out and request items</p>';
		header('Location: itemSearch.php?send3=' . $error);
	}
	
	else {
		$error = '<p style="color: red">Please sign into your account to check out and request items</p>';
		header('Location: itemSearch.php?send3=' . $error);
	}
?>