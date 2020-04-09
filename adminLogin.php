<!DOCTYPE html>

<html>
	<head>
		<title>Admin Login | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/a.css">
		<link rel="stylesheet" href="images/favicon.css">
	</head>
	
	<body onload="myFunction()">
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
		
		<h3>Admin Account Login:</h3><br>
		
		<form action='myAdminAccount.php' method='post' style='border: solid black 1px; width: 20%; padding: 1%' autocomplete="off">
			<label>Username:</label><br>
			<input type="text" name="username" placeholder="Username" size="30" required></input><br><br>
			
			<label>Password:</label><br> 
			<input class='key' name="password" placeholder="Password" type="text" size="30" required></input><br>
			
			<br><input type="submit">
		</form>		
			
		<?php 
			# print invalid login message upon failed login 
			if(isset($_GET['invalid'])){
				echo $_GET['invalid'];
			}
			
			if(isset($_GET['out'])){
				echo '<script>function myFunction() { setTimeout(function(){ document.getElementById("logout").style.display = "none"; }, 1000); } </script>';
				echo '<div id="logout">' . $_GET['out']. ' </div>';
				echo '<div style="margin-top: 0%"></div>';
			}
			
			echo '<div style="margin-top: 14.5%"></div>';
			
			# use cookie delete statement to erase cookies, so that site won't autofill input info 
		?> 
		
		
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	
	</body>
</html>