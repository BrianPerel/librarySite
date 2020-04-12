<?php 
	session_start();
	include("body.htm");
	if($_SESSION['items_requested'] == 0) {
			header("Location: myAccount.php");
	}
	
	else {
		header("Location: itemSearch.php?check_items_requested");
	}
	include("footer.htm");
?>