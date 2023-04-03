<!--
Purpose of webpage: receive checkout request from letterSearch.php page, perform checkout item operation
-->

<?php
	session_start();
	require_once("connect_db.php");

	if($_SESSION['loggedin'] && $_POST['checkout2']) {
		# update status of item we're checking out
		$sql = $con -> query("UPDATE items SET status = 'Out' WHERE item_name = '$_SESSION[checkout2]'");
		# PDO query statement
		$sql = $con -> query("SELECT items_out FROM user_accounts WHERE username = '$_SESSION[username]'");
		# PDO fetch statement ($items_requested is an object)
		$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
		# Access $items_out object 'items_out' attribute and assign to a regular variable
		$out = $items_Out1['items_out'] + 1;
		$sql = $con -> query("UPDATE user_accounts SET items_out = '$out' WHERE username = '$_SESSION[username]'");
		date_default_timezone_set("America/New_York");
		$date = date("m/d/YY");
		$due_date = date("m/d/YY", strtotime('+7 days'));
		$sql = $con -> query("INSERT INTO items_out (item_name, item_holder, checkout_date, days_out, due_date, renewed) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]', '$date', '0', '$due_date', 'No')");
		header("Location: letterSearch.php?send1=$_SESSION[searchLetter]");
	}
	elseif($_SESSION['loggedin'] && $_POST['request']) {
		# PDO query statement
		$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");
		# PDO fetch statement ($items_requested is an object)
		$items_requested = $sql -> fetch(PDO::FETCH_ASSOC);
		# Access $items_requested object 'items_requested' attribute and assign to a regular variable
		$requests = $items_requested['items_requested'] + 1;
		$sql = $con -> query("UPDATE user_accounts SET items_requested = '$requests' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("INSERT INTO items_requested (item_name, requester) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]')");
		$sql = $con -> query("UPDATE items SET requested = 'Yes' WHERE item_name = '$_SESSION[checkout2]'");
		header("Location: letterSearch.php?send2=$_SESSION[searchLetter]");
	}
	else {
		$error = "<p style='color: red'>Please sign into your account to check out or request items</p>";
		header("Location: letterSearch.php?send3=$error");
	}
?>