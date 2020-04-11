<?php
	session_start();
	include("body.htm");
	echo '<title>My Account | HWL</title>';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');	
			
	if($_SESSION['loggedin'] == true) {
		$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$profilePhoto = $results['profile_Photo'];
	}
	
	else if($_SESSION['loggedin'] == false) {
		$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_POST[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$profilePhoto = $results['profile_Photo'];
		
		if($results['username'] == $_POST['username'] && $results['password'] == $_POST['password']) {
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $_POST['username'];
		}
	}
?>

<br><center><img src="<?php echo $profilePhoto; ?>" <?php if($profilePhoto == '') { echo 'style="display: none"'; }?> width='200' height='200' alt='profile picture'/></center>

<?php 
	if($_SESSION['loggedin'] == true) {
			$_SESSION['items_out'] = $results['items_Out'];
			echo '<div style="text-align: center">';
				echo '<br>Login successful. Welcome back, ' . $results['full_Name'] . '<br>';
				echo 'Email: ' . $results['email'];
				echo '<br>Checkouts: <a href="viewCheckouts.php">(' . $results['items_Out'] . ')</a><br>';
				echo 'Requests: <a href="#a">(' . $results['items_Requested'] . ')</a><br>';
				#	echo 'Messages: <a href="#a">(' . $results['messages'] . ')</a><br>';
				echo '<a href="logout.php">(log out)</a>';
			echo '</div>';	
	}
	
	else if($_SESSION['loggedin'] == false) {
		if($results['username'] == $_POST['username'] && $results['password'] == $_POST['password']) {
			echo '<div style="text-align: center">';
				echo '<br>Login successful. Welcome back, ' . $results['full_Name'] . '<br>';
				echo 'Email: ' . $results['email'];
				echo '<br>Checkouts: <a href="viewCheckouts.php">(' . $results['items_Out'] . ')</a><br>';
				echo 'Requests: <a href="#a">(' . $results['items_Requested'] . ')</a><br>';
				#	echo 'Messages: <a href="#a">(' . $results['messages'] . ')</a><br>';
				echo '<a href="logout.php">(log out)</a>';
			echo '</div>';	
		}
		
		else {
			# re-direct back to sign in page 
			$Message = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
			header("location: signIn.php?invalidLogin=".$Message);
		}
	}
	
	echo "<div style='margin-bottom: 6%'></div>";
	
	echo "<form action='editPersonalInfo.php' method='post'>";
	echo "<button style='float: right; height: 35px'>Edit Personal Information</button><br>";
	echo "</form>"; 
	include("footer.htm");
?>