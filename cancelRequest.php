<?php 
	session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');

	if($_SESSION['loggedin'] == true && isset($_POST['cancel'])) {
		if($_POST['cancel']) { 
			$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
			$items_Requested = $sql -> fetch(PDO::FETCH_ASSOC);
			$requests = $items_Requested['items_Requested'];
			$requests--;
			$sql = $con -> query("UPDATE useraccounts SET items_Requested = '$requests' WHERE username = '$_SESSION[username]'");
			$sql = $con -> query("UPDATE items SET Requested = 'No' WHERE Item_Name = '$_SESSION[checkout2]'");
			$sql = $con -> query("DELETE FROM itemsreq WHERE requester = '$_SESSION[username]' AND Item_Name = '$_SESSION[checkout2]'");
			header('Location: myAccount.php');
		}
	}

	else if($_SESSION['loggedin'] == true && isset($_POST['next'])) {
		if($_POST['next']) {
			$_SESSION['requestViewNext'] = 'req';
			header("Location: viewNextPage.php");
		}
	}
	
	else if($_SESSION['loggedin'] == true && isset($_POST['previous'])) {
		if($_POST['previous']) {
			$_SESSION['requestViewPrevious'] = 'req1';
			header("Location: viewPreviousPage.php");
		}
	}
	
	else if($_SESSION['loggedin'] == true && isset($_POST['checkout2'])) {
		header("Location: checkout.php");
	}
?>