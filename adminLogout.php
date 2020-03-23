<?php 
	$LoggedOut = urlencode('<br><p>Logged out successfully</p>');
	header("Location: adminLogin.php?out=" . $LoggedOut);
	die;
?>