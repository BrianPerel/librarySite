<?php 
	$LoggedOut = urlencode('<br><p style="color: green">Logged out successfully</p>');
	header("Location: signIn.php?out=" . $LoggedOut);
	die;
?>