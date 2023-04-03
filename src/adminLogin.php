<!--
Purpose of webpage: login page for administrator.
-->

<?php
	session_start();
	include_once("../includes/body.htm");
	echo '<title>Admin Login | HWL</title>';
	echo '<center><h3>Admin Account Login:</h3><br>';

	# if regular user goes to log in as an admin, logout the regular user so that they can login as an admin
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
		session_destroy();
		session_start();
	}
?>

<form class="form" action="myAdminAccount.php" method="post" style="border: solid black 1px; width: 50%; padding: 3%; background-color: #DCDCDC" autocomplete="off">
	<label>Username:</label>
	<input class="form-control" autofocus type="text" name="username" placeholder="Username" size="30" required></input><br>
	<label>Password:</label>
	<input class="form-control" class="key" name="password" placeholder="Password" id="pass" type="password" size="30" required></input><br>
	<!-- An element (checkbox) to toggle between password visibility -->
	<input type="checkbox" onclick="togglePasswordVisibility()">&nbsp;Show Password</input><br><br>
	<br><input class="btn btn-primary" type="submit">
</form></center>

<?php
	# if admin is logged-in, jump to admin account page
	if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']) {
		header('Location: myAdminAccount.php');
		die;
	}

	# if this point is reached, then adminloggedin session variable hasn't been created so create it here
	$_SESSION['adminloggedin'] = false;

	# successful logout message
	if(isset($_GET['out'])) {
		echo '<script>window.addEventListener(onload, hideLogoutMessage())</script>';
		echo "<center><div id='logout'>$_GET[out]</div></center>";
	}

	# incorrect account credentials given
	if(isset($_GET['message1'])) {
		echo "<center>$_GET[message1]</center>";
	}

	echo '<div style="margin-top: 14.5%"></div>';
	include_once("../includes/footer.htm");
?>