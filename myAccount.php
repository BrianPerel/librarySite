<!DOCTYPE html>

<html>
	<head>
		<title>My Account | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="icons/favicon.css">
	</head>
	
	<body>
		<center><div class="class1">
			<h2>Henry Whittemore Library</h2>
			<a href="index.htm"><img src="icons/1.jpg" alt="Smiley face" width="100px" height="70px" style="padding-top: 1%"></img></a>
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
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_POST[username]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			
			if($results[0]['username'] == $_POST['username'] && $results[0]['password'] == $_POST['password']) {
				echo '<div style="text-align: center">';
					echo '<br>Login successful. Welcome back, ' . $results[0]['full_Name'] . '<br>';
					echo 'Email: ' . $results[0]['email'];
					echo '<br>Checkouts: (0)<br>';
					echo 'Requests: (0)<br>';
					echo 'Messages: (0)<br>';
					echo '<a href="message2.php">(log out)</a>';
				print '</div>';
			}
			else {
				# re-direct back to sign in page 
				$Message = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
				header("location: signIn.php?InvalidCredentials=".$Message);
				die; 
			}
		?>
		<div style='margin-bottom: 35%'></div>
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>