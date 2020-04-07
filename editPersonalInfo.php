<!DOCTYPE html>

<html>
	<head>
		<title>Sign in | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/a.css">
		<link rel="stylesheet" href="images/favicon.css">
	</head>
	
	<body onload='myFunction()'>
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
		
		<center><h3>Edit My Personal Information: <br> (leave field blank if you don't want to change it)</h3>

				<form class="example" action="editAccount.php" method="post" style="max-width:350px; border: solid black 0.5px">
					<div class='move'>
						<br><input type="text" name="password" placeholder="New Password..." size="30" autocomplete='off'></input><br><br><br>
						<input type="text" name="email" placeholder="New Email..." size="30" autocomplete='off'></input><br><br><br>
						<input type="text" name="phone_number" placeholder="Phone Number..." size="30" autocomplete='off' maxlength='12'></input><br><br><br>
						
						<br><label>Upload Profile Picture&nbsp;</label><br><br>
						<input style='margin-left: 25%' type = "file" name="photo" autocomplete='off'></input><br><br><br>
					</div>
					<input type="submit" value="change"><br><br>
				</form>
				
				<?php 
					if(isset($_GET['changed'])) {
						echo '<script>function myFunction() { setTimeout(function(){ document.getElementById("logout").style.display = "none"; }, 1000); } </script>';
						echo '<div id="logout">' . $_GET['changed'] . ' </div>';
					}
				?>
		</center>
				
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	
	</body>
</html>