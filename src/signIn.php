<!-- Purpose of program: prompt user to sign into there account -->

<?php 
	session_start();
	include("../includes/body.htm");
	echo '<title>Sign in | HWL</title>';
	echo '<center><h3>My Account Login:</h3><br>';
?>
	
<center><form class="form" action="myAccount.php" method="post" style="border: solid black 1px; padding: 3%; width: 55%; background-color: #DCDCDC" autocomplete="off">
	<label>Username:</label><br>
	<input class="form-control" autofocus type="text" name="username" placeholder="Username" size="30" required></input><br>
	<label>Password:</label><br>
	<input class="form-control" class="key" type="password" name="password" placeholder="Password" size="30" required></input>
	<br><input type="submit" class="btn btn-primary">
</form></center>

<?php 
	if(isset($_SESSION['loggedin'])) {
		if($_SESSION['loggedin'] == true) {
			header('Location: myAccount.php');
			die;
		}
	}	

	$_SESSION['loggedin'] = false;
	
	if(isset($_GET['out'])) {
		echo '<script>window.addEventListener(onload, myFunction())</script>';
		echo "<div id='logout'>$_GET[out]</div></center>";
	} 
	
	if(isset($_GET['message'])) 
		echo $_GET['message'];
	
	echo '<div style="margin-top: 13%"></div>';
	include("../includes/footer.htm");
?> 