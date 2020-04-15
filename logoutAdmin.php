<?php 
	session_start();
	session_destroy();
	$_SESSION['adminloggedin'] = false;
	$LoggedOut = urlencode('<br><p style="color: green">Logged out successfully</p>');
	header("Location: adminLogin.php?out=" . $LoggedOut);
?>