<!-- Purpose of webpage: receive request from myAccount.php and navigate to appropriate page -->

<?php 
	session_start();
	$_SESSION['items_requested'] == 0 ? header("Location: myAccount.php") : header("Location: itemSearch.php?check_items_requested");                
?>