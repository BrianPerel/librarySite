<!DOCTYPE html>

<html>
	<head>
		<title>My Account | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/a.css">
		<link rel="stylesheet" href="images/favicon.css">
	</head>
	
	<body>
		<center><div class="class1">
			<h2>Henry Whittemore Library</h2>
			<a href="index.php"><img src="images/1.jpg" alt="Smiley face" width="100px" height="90px" style="padding-top: 1%"></img></a>
			<h2>Inventory Management System</h2><br><br>
		</div>

		<div class="class2">
			<a href="index.php">Home</a>
			<a href="signIn.php">Sign-in</a>
			<a href="signUp.php">Sign-up</a>
			<a href="advSearch.php">Search</a>
			<a href="#BodyText">About</a>
			<a href="#contact">Contact Us</a>
			<a href="https://www.framingham.edu/" target="_blank">myFramingham.edu</a>
		</div>
		</center>
		
		<?php
			session_start();
			
	/*		if(isset($_SESSION['loggedin'])) {
				$_POST['username'] = $_SESSION['username']; 
			}*/
			
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_POST[username]'");
			$results = $sql -> fetch(PDO::FETCH_ASSOC);
			$profilePhoto = $results['profile_Photo'];
		?>

		<br><center><img src="<?php echo $profilePhoto; ?>" <?php if($profilePhoto == '') { echo 'style="display: none"'; }?> width='200' height='200' alt='profile picture'/></center>

		<?php 			
			if($results['username'] == $_POST['username'] && $results['password'] == $_POST['password']) {
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $_POST['username'];
				
				echo '<div style="text-align: center">';
					echo '<br>Login successful. Welcome back, ' . $results['full_Name'] . '<br>';
					echo 'Email: ' . $results['email'];
					echo '<br>Checkouts: <a href="#">(' . $results['items_Out'] . ')</a><br>';
					echo 'Requests: <a href="#a">(' . $results['items_Requested'] . ')</a><br>';
					echo 'Messages: <a href="#a">(' . $results['messages'] . ')</a><br>';
					echo '<a href="logout.php">(log out)</a>';
				echo '</div>';	
			}
			else {
				# re-direct back to sign in page 
				$Message = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
				header("location: signIn.php?invalidLogin=".$Message);
				die; 
			}
		?>
		

		<div style='margin-bottom: 2%'></div>
		
		<form action='editPersonalInfo.php' method='post'>
			<button style='float: right; height: 35px'>Edit Personal Information</button><br>
		</form> 
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>