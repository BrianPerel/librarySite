<!-- Purpose of webpage: receive request from myAccount.php and navigate user to appropriate page --> 

<?php 
	session_start();
	$_SESSION['items_out'] == 0 ? header("Location: myAccount.php") : header("Location: itemSearch.php?check_items_out");
?>