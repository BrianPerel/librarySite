<!-- Purpose of webpage: recieve checkout request from letterFind.php page, perform checkout item operation --> 

<?php 
	session_start();
	require("../includes/connect_db.php");
	
	if($_SESSION['loggedin'] == true && $_POST['checkout2']) {
		# update status of item we're checking out 
		$sql = $con -> query("UPDATE items SET Status='Out' WHERE Item_Name = '$_SESSION[checkout2]'");
		# PDO query statement 
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");
		# PDO fetch statement ($items_Requested is an object)
		$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
		# Access $items_Out object 'items_Out' attribute and assign to a regular variable 
		$out = $items_Out1['items_Out'];
		$out++;
		$sql = $con -> query("UPDATE useraccounts SET items_Out = '$out' WHERE username = '$_SESSION[username]'");
		date_default_timezone_set("America/New_York");
		$date = date("m/d/Y"); 
		$due_Date = date("m/d/Y", strtotime('+7 days'));
		$sql = $con -> query("INSERT INTO itemsout (item_Name, item_Holder, checkout_Date, days_Out, due_Date, renewed) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]', '$date', '0', '$due_Date', 'No')");
		header('Location: letterFind.php?send1=' . $_SESSION['searchLetter']);
	} else if($_SESSION['loggedin'] == true && $_POST['request']) {
		# PDO query statement 
		$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
		# PDO fetch statement ($items_Requested is an object)
		$items_Requested = $sql -> fetch(PDO::FETCH_ASSOC);
		# Access $items_Requested object 'items_Requested' attribute and assign to a regular variable 
		$requests = $items_Requested['items_Requested'];
		$requests++;
		$sql = $con -> query("UPDATE useraccounts SET items_Requested = '$requests' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("INSERT INTO itemsreq (item_Name, requester) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]')");
		$sql = $con -> query("UPDATE items SET Requested = 'Yes' WHERE Item_Name = '$_SESSION[checkout2]'");
		header('Location: letterFind.php?send2=' . $_SESSION['searchLetter']);
	} else {
		$error = '<p style="color: red">Please sign into your account to check out or request items</p>';
		header('Location: letterFind.php?send3=' . $error);
	}	
?>