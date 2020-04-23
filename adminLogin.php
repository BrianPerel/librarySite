<?php 
	session_start();
	include("body.htm");
	echo '<title>Admin Login | HWL</title>';
	echo '<center><h3>Admin Account Login:</h3><br>';

	echo '<form action="myAdminAccount.php" method="post" style="border: solid black 1px; width: 20%; padding: 1%" autocomplete="off">';
		echo '<label>Username:</label><br>';
		echo '<input autofocus type="text" name="username" placeholder="Username" size="30" required></input><br><br>';
		echo '<label>Password:</label><br>';
		echo '<input class="key" name="password" placeholder="Password" type="text" size="30" required></input><br>';
		echo '<br><input type="submit">';
	echo '</form></center>';	

	if(isset($_SESSION['adminloggedin'])) {
		if($_SESSION['adminloggedin'] == true) {
			header('Location: myAdminAccount.php');
			die;
		}
	}	
	
	$_SESSION['adminloggedin'] = false;
	
	if(isset($_GET['out'])){
		echo '<script>window.addEventListener(onload, myFunction())</script>';
		echo '<center><div id="logout">' . $_GET['out']. ' </div></center>';
	}
	
	if(isset($_GET['message1'])) {
		echo '<center>' . $_GET["message1"] . '</center>';
	}
	
	echo '<div style="margin-top: 14.5%"></div>';
	include("footer.htm");
?> 