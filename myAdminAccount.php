<?php 
	session_start();
	include("body.htm");
	echo '<title>Admin Account | HWL</title>';
	echo '<meta http-equiv="refresh" content="90; url=logoutAdmin.php?expire">';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');

	if($_SESSION['adminloggedin'] == true) {
		$sql = $con -> query("SELECT * FROM adminaccount WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$adminPhoto = $results['admin_Profile_Photo'];
	}
	
	else if($_SESSION['adminloggedin'] == false) {
		$sql = $con -> query("SELECT * FROM adminaccount WHERE username = '$_POST[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$adminPhoto = $results['admin_Profile_Photo'];
		
		if($results['username'] == $_POST['username'] && $results['password'] == $_POST['password']) {
			$_SESSION['adminloggedin'] = true;
			$_SESSION['username'] = $_POST['username'];
		}
	}
?>
		
<br><center><img src="<?php echo $adminPhoto; ?>" <?php if($adminPhoto == '') { echo 'style="display: none"'; }?> width='130' height='190' alt='profile picture'/></center>
	
<?php 
	if($_SESSION['adminloggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
		echo '<div style="text-align: center">';
			echo '<br>Login successful<br> Welcome back, ' . $results['fullName'] . '<br>';
			echo 'Administrator<br>';
			echo 'Email: ' . $results['email'];
			echo '<br><a href="logoutAdmin.php">(log out)</a><br><br>';
			echo '<form action="adminOperations.php" method="post">';
			echo '<button style="margin: 1%" name="deleteItem">Delete Item</button>';
			echo '<button style="margin: 1%" name="addItem">Add Item</button>';
			echo '</form>';
		echo '</div>';
	}
	
	# re-direct back to sign in page 
	else if($_SESSION['adminloggedin'] == false) {
		$invalidLogin = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
		header("location: adminLogin.php?message1=" . $invalidLogin);
	}
	
	echo "<div style='margin-bottom: 6.5%'></div>";
	include("footer.htm");
?>