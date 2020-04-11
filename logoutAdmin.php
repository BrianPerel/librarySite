<?php 
	session_start();
	session_destroy();
	$LoggedOut = urlencode('<br><p style="color: green">Logged out successfully</p>');
	header("Location: adminLogin.php?out=" . $LoggedOut);
?>