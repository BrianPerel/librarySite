<!-- 
Purpose of webpage: receive request from adminLogin.php, update variable values, if login successful display mini menu 
--> 

<?php 
	session_start();
	include("../includes/body.htm");
	echo '<title>Admin Account | HWL</title>';
	echo '<meta http-equiv="refresh" content="90; url=logoutAdmin.php?expire">';
	require("../includes/connect_db.php");

	if($_SESSION['adminloggedin']) {
		$sql = $con -> query("SELECT * FROM adminaccount WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$adminPhoto = $results['admin_photo'];
	}
	
	else if(!$_SESSION['adminloggedin']) {
		$sql = $con -> query("SELECT * FROM adminaccount WHERE username = '$_POST[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$adminPhoto = $results['admin_photo'];
		
		if($results['username'] == $_POST['username'] && $results['password'] == $_POST['password']) {
			$_SESSION['adminloggedin'] = true;
			$_SESSION['username'] = $_POST['username'];
		}
	}
	
	echo '<h3>Administrator</h3>';
?>
		
<br><img src="<?=$adminPhoto?>" <?php if(empty($adminPhoto)) { echo 'style="display: none"'; }?> width='130' height='190' alt='profile picture'/>
	
<?php 
	# re-direct back to sign in page 
	if(!$_SESSION['adminloggedin']) {
		$invalidLogin = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
		header("location: adminLogin.php?message1=$invalidLogin");
	}

	else if($_SESSION['adminloggedin']) {
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
		echo '<div style="text-align: center">';
			echo "<br>Login successful<br> Welcome back, $results[fullName]<br>";
			echo "Email: $results[email]";
			echo "<br><a href='logoutAdmin.php'>(log out)</a><br><br>";
			echo "<form action='adminOperations.php' method='post'>";
			echo "<button style='margin: 1%' name='deleteItem'>Delete Item</button>";
			echo '<button style="margin: 1%" name="addItem">Add Item</button>';
			echo '</form>';
		echo '</div>';
	}
		
	echo "<div style='margin-bottom: 6.5%'></div>";
	include("../includes/footer.htm");
?>