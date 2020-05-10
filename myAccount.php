<?php
	session_start();
	include('body.htm');
	echo '<title>My Account | HWL</title>';
	echo '<meta http-equiv="refresh" content="90; url=logout.php?expire">';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');	
			
	if($_SESSION['loggedin'] == true) {
		$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$profilePhoto = $results['profile_Photo'];
		$_SESSION['outCheck'] = $results['items_Out'];
		$_SESSION['requested'] = $results['items_Requested']; 
	}
	
	else if($_SESSION['loggedin'] == false) {
		$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_POST[username]'");
		$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
		
		# need loop to check sign in info sent compared to every useraccount row until match is found 
		for($i = 0; $i < sizeof($results); $i++) {
			if($results[$i]['username'] == $_POST['username'] && $results[$i]['password'] == $_POST['password']) {
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $_POST['username'];
				$profilePhoto = $results[$i]['profile_Photo'];
				$_SESSION['outCheck'] = $results[$i]['items_Out'];
				$_SESSION['requested'] = $results[$i]['items_Requested'];
				break;
			}
		}
	}
?> 

<br><img src="<?php echo $profilePhoto; ?>" <?php if($profilePhoto == NULL) { echo 'style="display: none"'; }?> width='200' height='220' alt='profile picture'/>

<?php 
	if($_SESSION['loggedin'] == true) { 
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	
		# enter condition if user has more than 1 item out 
		if($_SESSION['outCheck'] > 0) {
			// get the number of items out 
			$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");
			$res = $sql -> fetch(PDO::FETCH_ASSOC); 

			// get the smallest ID num 
			$sth = $con -> prepare("SELECT min(itemID) FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
			$sth -> execute();
			$smallest = $sth -> fetchColumn();
			
			for($i = 0; $i < $res['items_Out']; $i++) {		
				# update days out on every login 
				date_default_timezone_set('America/New_York'); 
				$sql = $con -> query("SELECT checkout_Date FROM itemsout WHERE item_Holder = '$_SESSION[username]' && itemID = '$smallest'");
				$date = $sql -> fetch(PDO::FETCH_ASSOC); 
				$date_out = $date['checkout_Date']; 
				$day_out = $date_out[3] . $date_out[4]; 
				$current_date = date("d");				
				$day_out = intval($day_out);
				$current_date = intval($current_date); 
				$days_out = $current_date - $day_out;  
				$days_Out = strval($days_out); 
				$sql = $con -> query("UPDATE itemsout SET days_Out = '$days_Out' WHERE item_Holder = '$_SESSION[username]' && itemID = '$smallest'");
				# get full due and current dates 
				$sql = $con -> query("SELECT due_Date FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
				$Due = $sql -> fetch(PDO::FETCH_ASSOC);
				$date_due = $Due['due_Date'];
				$currentDate = date('m/d/Y'); 
			
				if($currentDate > $date_due) {				
					$sql = $con -> query("SELECT fines_fees FROM useraccounts WHERE username = '$_SESSION[username]'");
					$fees = $sql -> fetch(PDO::FETCH_ASSOC);
					$fee = $fees['fines_fees'];
					if($fee == 4.50) {
						$fee += 0;
					} else {
						$fee += 4.50;
					}
					$sql = $con -> query("UPDATE useraccounts SET fines_fees = '$fee' WHERE username = '$_SESSION[username]'");
				}
				
				$smallest++;
			}
		}
					
		$_SESSION['items_out'] = $_SESSION['outCheck'];
		$_SESSION['items_requested'] = $_SESSION['requested'];
		
		$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		echo '<div style="text-align: center">
			<br>Login successful<br> Welcome back, ' . $results['full_Name'] . '<br><br>
			Email: ' . $results['email'] . 
			'<br>Checkouts: <a href="viewCheckouts.php">(' . $results['items_Out'] . ')</a><br>
			Requests: <a href="viewRequests.php">(' . $results['items_Requested'] . ')</a><br>
			Fines/Fees: $' . $results['fines_fees']. '
			<br><a href="logout.php">(log out)</a>
		</div>';	
			
		echo "<div style='margin-bottom: 2%'></div>
		<form action='editPersonalInfo.php' method='post'>
			<button style='float: right; height: 35px'>Edit Personal Information</button><br>
		</form>"; 
	}
	
	# re-direct back to sign in page 
	else if($_SESSION['loggedin'] == false) {
		$invalidLogin = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
		header("location: signIn.php?message=" . $invalidLogin);
	}
	
	include("footer.htm");
?>