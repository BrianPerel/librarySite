<!-- Purpose of webpage: recieve request to login from signIn.php, if user entered information matches username and password proceed,
check number of days all items in user's checkout queue have been out, update fines if needed, display mini menu for user -->

<?php
	session_start();
	include('includes/body.htm');
	echo '<title>My Account | HWL</title>';
	echo '<meta http-equiv="refresh" content="120; url=logout.php?expire">';
	require("includes/connect_db.php");
			
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

<h2>My Account</h2>

<div class="row">
	<div class="col-sm-12">
		<br><img src="<?=$profilePhoto?>" <?php if($profilePhoto == NULL) { echo 'style="display: none"'; }?> width='200' height='220' alt='profile picture'/>
	</div>
</div>

<?php 

	define("FINE", "4.50"); # create constant to hold fine amount 
	
	# re-direct back to sign in page 
	if($_SESSION['loggedin'] == false) {
		$invalidLogin = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
		header("location: signIn.php?message=" . $invalidLogin);
	}
	
	else if($_SESSION['loggedin'] == true) { 
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
					if($fee == FINE) {
						$fee += 0;
					} else {
						$fee += FINE;
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
?>
		
		<div class="row"><div class="col-sm-12"><br><p>Login successful<br><?php echo "Welcome back, $results[full_Name] <br>Email: $results[email]"?></div></div> 
		<div class="row"><div class="col-sm-12"><a href="viewCheckouts.php"><?php echo "Checkouts: ($results[items_Out])"?></a></div></div>
		<div class="row"><div class="col-sm-12"><a href="viewRequests.php"><?php echo "Requests: ($results[items_Requested])"?></a></div></div>
		<div class="row"><div class="col-sm-12"><a href="#" onclick="alert1()"><?php echo "Fines/Fees: $$results[fines_fees]"?></a></div></div>
		<div class="row"><div class="col-sm-12"><a href="logout.php">(log out)</a></p></div></div>
			
<?php 
		echo "<form action='editPersonalInfo.php' method='post'>";
		echo "<button style='float: right; height: 8%'>Edit Personal Information</button><br><br>";
		echo "</form>"; 
	}	
	
	include("includes/footer2.htm");
?>