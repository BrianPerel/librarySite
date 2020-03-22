<!DOCTYPE html>

<html>
	<head>
		<title>Login | HWL</title>
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
			<a href="search.php">Search</a>
			<a href="#about">About</a>
			<a href="https://www.framingham.edu/" target="_blank">myFramingham.edu</a>
		</div>
		</center>
	
		<?php 
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			$sql = $con -> query("SELECT * FROM useraccounts WHERE username = '$_POST[username]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			
			if($results[0]['username'] == $_POST['username'] && $results[0]['password'] == $_POST['password']) {
				echo '<br><center>Login successful</center>';
			}
			
			else {
				echo '<br><center>Sorry, the information you submitted was invalid. Please try again</center>';
			}
		?>
		<div style='margin-bottom: 35%'></div>
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>