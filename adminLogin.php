<?php 
	session_start();
	include("body.htm");
	echo '<title>Admin Login | HWL</title>';
	echo '<center><h3>Admin Account Login:</h3><br>';
	echo '<body onload="myFunction()">';

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

	# print invalid login message upon failed login 
	if(isset($_GET['invalid'])){
		echo '<center>' . $_GET['invalid'] . '</center>';
	}
	
	if(isset($_GET['out'])){
		echo '<script>function myFunction() { setTimeout(function(){ document.getElementById("logout").style.display = "none"; }, 1000); } </script>';
		echo '<center><div id="logout">' . $_GET['out']. ' </div></center>';
	}
	
	if(isset($_GET['expire'])) {
		echo $_GET['expire'];
	}
	
	echo '<div style="margin-top: 14.5%"></div>';
	include("footer.htm");
?> 