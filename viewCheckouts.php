<?php 
	session_start();
	if($_SESSION['items_out'] == 0) header("Location: myAccount.php");
	else header("Location: itemSearch.php?check_items_out");
?>