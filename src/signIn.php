<!-- 
Purpose of program: prompt user to sign into there account 
-->

<?php 
	session_start();
	include("../includes/body.htm");
	echo '<title>Sign in | HWL</title>';
	echo '<center><h3>My Account Login:</h3><br>';
?>
	
<form class="form" action="myAccount.php" method="post" style="border: solid black 1px; padding: 3%; width: 55%; background-color: #DCDCDC" autocomplete="off">
	<label>Username:</label><br>
	<input class="form-control" autofocus type="text" name="username" placeholder="Username" autocomplete="off" size="30" required></input><br>
	<label>Password:</label><br>
	<input class="form-control" class="key" type="password" id="pass" name="password" placeholder="Password" autocomplete="off" size="30" required></input><br>
	<!-- An element (checkbox) to toggle between password visibility -->
	<input type="checkbox" onclick="showPassword()">&nbsp;Show Password</input><br><br>
	<br><input type="submit" class="btn btn-primary">
</form>

<?php 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
		header('Location: myAccount.php');
		die;
	}	

	$_SESSION['loggedin'] = false;
	
	if(isset($_GET['out'])) {
		echo '<script>window.addEventListener(onload, myFunction())</script>';
		echo "<div id='logout'>$_GET[out]</div></center>";
	} 
	
	if(isset($_GET['message'])) {
		echo $_GET['message'];
	}	
	
	echo '<div style="margin-top: 13%"></div>';
	include("../includes/footer.htm");
?> 