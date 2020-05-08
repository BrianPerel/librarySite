<!--
Purpose of program:
Prompt user to sign into there account
-->

<?php 
	session_start();
	include("body.htm");
	echo '<title>Sign in | HWL</title>';
	echo '<center><h3>My Account Login:</h3><br>';
	
	echo '<form action="myAccount.php" method="post" style="border: solid black 1px; width: 20%; padding: 1%" autocomplete="off">';
		echo '<label>Username:</label><br>';
		echo '<input autofocus type="text" name="username" placeholder="Username" size="30" required></input><br><br>';
		echo '<label>Password:</label><br>';
		echo '<input class="key" type="text" name="password" placeholder="Password" size="30" required></input><br>';
		echo '<br><input type="submit">';
	echo '</form>';

	if(isset($_SESSION['loggedin'])) {
		if($_SESSION['loggedin'] == true) {
			header('Location: myAccount.php');
			die;
		}
	}	

	$_SESSION['loggedin'] = false;
	
	if(isset($_GET['out'])) {
		echo '<script>window.addEventListener(onload, myFunction())</script>';
		echo '<div id="logout">' . $_GET['out'] . ' </div></center>';
	} 
	
	if(isset($_GET['message'])) {
		echo $_GET['message'];
	}
	
	echo '<div style="margin-top: 14%"></div>';
	include("footer.htm");
?> 