<?php 
	$LoggedOut = urlencode('<br><p>Logged out successfully</p>');
	header("Location: signIn.php?Message=" . $LoggedOut);
	die;
?>