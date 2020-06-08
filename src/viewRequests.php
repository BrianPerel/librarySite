<!-- Purpose of webpage: recieve request from myAccount.php and navigate to appropriate page -->

<?php 
	session_start();
	if($_SESSION['items_requested'] == 0) header("Location: myAccount.php");
	else header("Location: itemSearch.php?check_items_requested");
?>