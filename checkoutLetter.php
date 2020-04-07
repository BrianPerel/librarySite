<?php 
	session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
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
		header('Location: letterFind.php?send1=' . $_SESSION['searchLetter']);
	}
	
	else if($_SESSION['loggedin'] == true && $_POST['request']) {
		# PDO query statement 
		$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
		# PDO fetch statement ($items_Requested is an object)
		$items_Requested = $sql -> fetch(PDO::FETCH_ASSOC);
		# Access $items_Requested object 'items_Requested' attribute and assign to a regular variable 
		$requests = $items_Requested['items_Requested'];
		$requests++;
		$sql = $con -> query("UPDATE useraccounts SET items_Requested = '$requests' WHERE username = '$_SESSION[username]'");
		header('Location: letterFind.php?send2=' . $_SESSION['searchLetter']);
	}
	
	else {
		$error = '<p style="color: red">Please sign into your account to check out or request items</p>';
		header('Location: letterFind.php?send3=' . $error);
	}
?>