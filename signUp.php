<!DOCTYPE html>

<html>
	<head>
		<title>Sign up | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon/">	
		
		<!-- MAIN CSS --> 
		<link rel="stylesheet" href="css/a.css">
		
		<!-- MAIN JS --> 
		<script src="js/main.js"></script>
		
		<!-- GOOGLE RECAPTCHA TOOL JS --> 
		<script src="https://www.google.com/recaptcha/api.js"></script>
		
		<!-- SEARCH ICON --> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		
		<div class="create">
		<h3>Create your account</h3>
		<p>Join the network</p>
		
		<!-- name attribute of form tag contains user input value from the post -->
		<form style="border: solid 0.1px; margin: 1% 30% 1% 30%; padding: 2% 0% 2% 0%" action="signedUp.php" method="POST" enctype="multipart/form-data" autocomplete="off">
		
			<label>Username:</label><br>
			<input autofocus type="text" name="username" placeholder="Username" size="30" required></input><br><br>
			
			<label>Email:</label><br>
			<input type="email" name="email" placeholder="Email@email.com" size="30" required></input><br><br>
			
			<label>Password:</label><br>
			<input type="text" name="password" placeholder="Password" size="30" pattern=".{8,}" required></input><br><br>
			
			<label>Full Name:</label><br>
			<input type="text" name="fname" placeholder="Full Name" size="30" pattern="^(\w\w+)\s(\w+)$" required></input><br><br>
			
			<label>Phone Number:</label><br>
			<input type="tel" name="pNum" placeholder="111-222-3333" size="30" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength='12' required></input><br><br><br>
			
			<label style='margin-left: 10%'>Profile Picture (Optional):&nbsp;</label>
			<input type = "file" name="InternPhoto" autocomplete='off'><br>	
			
			<br><p>By creating an account, you agree to the terms of service</p>
			
			<label for="terms">Agree to terms: </label>
			<input type="checkbox" name="terms" value="terms" required><br><br>
			
			<div class="g-recaptcha" data-sitekey="6LflseQUAAAAAPX0WpXXBIO-rZ_zPwkvrXenB4gr"></div><br>
			
			<input type="submit">

		</form>
		
		<?php 
			session_start();
			# print invalid login message upon failed login, isset() checks if a certain variable exists (get or session) 
			
			# if empty field found 
			if(isset($_GET['signUpError'])){
				echo $_GET['signUpError'];
			}			
			
			# if format of field entered incorrectly 
			if(isset($_GET['signUpError2'])){
				echo $_GET['signUpError2'];
			}		
			
			# unchecked recaptcha tool error message
			if(isset($_GET['err2'])) {
				echo $_GET['err2'];
			}
		?> 
		</div>
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
		
	</body>
</html>