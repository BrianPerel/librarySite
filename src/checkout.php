<!-- 
Purpose of webpage: receive checkout request and perform checkout operation. Service checkout requests from adv page, letter search page, and item search page 
-->

<?php 
	session_start();
	require("../includes/connect_db.php");
	
	if($_SESSION['loggedin'] && $_POST['checkout2'] && $_SESSION['pageSentFrom'] == 'advSearch') { 
		# update status of item we're checking out 
		$sql = $con -> query("UPDATE items SET status = 'Out' WHERE item_name = '$_SESSION[checkout2]'");
		$sql = $con -> query("SELECT items_out FROM user_accounts WHERE username = '$_SESSION[username]'");
		$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
		$out = $items_Out1['items_out'] + 1;
		$sql = $con -> query("UPDATE user_accounts SET items_out = '$out' WHERE username = '$_SESSION[username]'");
		date_default_timezone_set('America/New_York'); 
		$date = date("m/d/Y"); 
		$due_date = Date("m/d/Y", strtotime('+7 days'));
		$sql = $con -> query("INSERT INTO items_out (item_name, item_holder, checkout_date, days_out, due_date, renewed) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]', '$date', '0', '$due_date', 'No')");
		header("Location: itemSearch.php?send1=$_SESSION[checkout2]");
	}
	
	else if($_SESSION['loggedin'] && $_POST['checkout2']) { 
		if(isset($_SESSION['bool'])) {
			# decrement number of requests 
			$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'"); # select number of request in useraccount 
			$items_requested = $sql -> fetch(PDO::FETCH_ASSOC);
			$requests = $items_requested['items_requested'] - 1;
			$sql = $con -> query("UPDATE user_accounts SET items_requested = '$requests' WHERE username = '$_SESSION[username]'"); # update number of items requested in useraccount
			
			$sql = $con -> query("UPDATE items SET requested = 'No' WHERE item_name = '$_SESSION[checkout2]'"); # update status to available of item of which request was cancelled 
			$sql = $con -> query("DELETE FROM items_requested WHERE requester = '$_SESSION[username]' AND item_name = '$_SESSION[checkout2]'"); # delete item from item request table 
		}
		
		# update status of item we're checking out 
		$sql = $con -> query("UPDATE items SET status = 'Out' WHERE item_name = '$_SESSION[checkout2]'");
		$sql = $con -> query("SELECT items_out FROM user_accounts WHERE username = '$_SESSION[username]'");
		$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
		$out = $items_Out1['items_out'] + 1;
		$sql = $con -> query("UPDATE user_accounts SET items_out = '$out' WHERE username = '$_SESSION[username]'");
		date_default_timezone_set('America/New_York'); 
		$date = date("m/d/Y"); 
		$due_date = date("m/d/Y", strtotime('+7 days'));
		$sql = $con -> query("INSERT INTO items_out (item_name, item_holder, checkout_date, days_out, due_date, renewed) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]', '$date', '0', '$due_date', 'No')");

		# boolean session variable to mark if we have or haven't cancelled our item request 
		if($_SESSION['flag']) {
			$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");
			$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC);
			$requests = $items_Out1['items_requested'] - 1;
			
			if($requests > 0) {
				$sql = $con -> query("UPDATE user_accounts SET items_requested = '$requests' WHERE username = '$_SESSION[username]'");
			}
		}
		header("Location: itemSearch.php?send1=$_SESSION[checkout2]");
	}
	
	else if($_SESSION['loggedin'] && $_POST['request'] && $_SESSION['pageSentFrom'] == 'advSearch') {  
		$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");
		$items_requested = $sql -> fetch(PDO::FETCH_ASSOC);
		$requests = $items_requested['items_requested'] + 1;
		$sql = $con -> query("UPDATE user_accounts SET items_requested = '$requests' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("UPDATE items SET requested = 'Yes' WHERE item_name = '$_SESSION[checkout2]'"); # update status to available of item of which request was cancelled 
		$sql = $con -> query("INSERT INTO items_requested (item_name, requester) VALUES ('$_SESSION[checkout2]', '$_SESSION[username]')");
		header("Location: itemSearch.php?send2=$_SESSION[checkout2]");
	}
	
	else if($_SESSION['loggedin'] && $_POST['request']) { 
		$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");
		$items_requested = $sql -> fetch(PDO::FETCH_ASSOC);
		$requests = $items_requested['items_requested'] + 1;
		$sql = $con -> query("UPDATE user_accounts SET items_requested = '$requests' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("UPDATE user_accounts SET requested_itemName = '$_SESSION[checkout2]' WHERE username = '$_SESSION[username]'");
		header("Location: itemSearch.php?send2=$_SESSION[checkout2]");
	}
	
	else if(!$_SESSION['loggedin'] && $_SESSION['pageSentFrom'] == 'advSearch') {
		$error = '<p style="color: red">Please sign into your account to check out and request items</p>';
		header("Location: itemSearch.php?send3=$error");
	}
	
	else {
		$error = '<p style="color: red">Please sign into your account to check out and request items</p>';
		header("Location: itemSearch.php?send3=$error");
	}
?>