<?php 
	session_start();
	session_destroy();
	$_SESSION['adminloggedin'] = false;
	
	if(isset($_GET['expire'])) {
		$expireMessage = urlencode('<br><p style="text-align: center; color: red">Session has expired for Idling too long, please sign in again</p>');
		header("Location: adminLogin.php?expire=" . $expireMessage);
	}
		
	else {
		$LoggedOut = urlencode('<br><p style="color: green">Logged out successfully</p>');
		header("Location: adminLogin.php?out=" . $LoggedOut);
	}
?>