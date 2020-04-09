<?php 
    // urlencode encodes a url or sections of it to prevent corruption of url data keeping the url in the format the browser can read it correctly / need to decode upon using in a link
	$LoggedOut = urlencode('<br><p style="color: green">Logged out successfully</p>');
	header("Location: adminLogin.php?out=" . $LoggedOut);
	die;
?>