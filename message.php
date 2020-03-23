<?php 
	$LoggedOut = urlencode('<br><p>Logged out successfully</p>');
	header("Location: adminLogin.php?Message=" . $LoggedOut);
	die;
?>