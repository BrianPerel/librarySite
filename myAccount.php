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
		$_SESSION['items_requested'] = $results['items_Requested'];
		echo '<div style="text-align: center">
			<br>Login successful. Welcome back, ' . $results['full_Name'] . '<br>
			Email: ' . $results['email'] .
			'<br>Checkouts: <a href="viewCheckouts.php">(' . $results['items_Out'] . ')</a><br>
			Requests: <a href="viewRequests.php">(' . $results['items_Requested'] . ')</a><br>
			<a href="logout.php">(log out)</a>
		</div>';	
		
		if($results['items_Out'] > 0) {
			# update days out on every login 
			$sql = $con -> query("SELECT checkout_Date FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
			$date = $sql -> fetch(PDO::FETCH_ASSOC);
			$date_out = $date['checkout_Date']; 
			$day_out = $date_out[3] . $date_out[4]; 
			$current_date = date("d"); 
			$days_out = (int) $current_date - (int) $day_out; 
			$days_Out = strval($days_out);
			$sql = $con -> query("UPDATE itemsout SET days_Out = '$days_Out' WHERE item_Holder = '$_SESSION[username]'");
		}

		#	echo 'Messages: <a href="#a">(' . $results['messages'] . ')</a><br>';
	}
	
	else if($_SESSION['loggedin'] == false) {
		if($results['username'] == $_POST['username'] && $results['password'] == $_POST['password']) {
			echo '<div style="text-align: center">
				<br>Login successful. Welcome back, ' . $results['full_Name'] . '<br>
				Email: ' . $results['email'] .
				'<br>Checkouts: <a href="viewCheckouts.php">(' . $results['items_Out'] . ')</a><br>
				Requests: <a href="#a">(' . $results['items_Requested'] . ')</a><br>
				<a href="logout.php">(log out)</a>
			</div>';	
		}
		#	echo 'Messages: <a href="#a">(' . $results['messages'] . ')</a><br>';
		
		else {
			# re-direct back to sign in page 
			$Message = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
			header("location: signIn.php?invalidLogin=".$Message);
		}
	}
	
	echo "<div style='margin-bottom: 6%'></div>
	<form action='editPersonalInfo.php' method='post'>
	<button style='float: right; height: 35px'>Edit Personal Information</button><br>
	</form>"; 
	include("footer.htm");
?>