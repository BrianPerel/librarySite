<!DOCTYPE html>

<html>
	<head>
		<title>Admin Account | HWL</title>
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
			<a href="index.php"><img src="icons/1.jpg" alt="Smiley face" width="100px" height="70px" style="padding-top: 1%"></img></a>
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
			$sql = $con -> query("SELECT * FROM admin WHERE username = '$_POST[username]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			$adminPhoto = $results[0]['admin_Profile_Photo'];
		?>
				
		<br><center><img src="<?php echo $adminPhoto; ?>" <?php if($adminPhoto == '') { echo 'style="display: none"'; }?> width='130' height='190' alt='profile picture'/></center>
			
		<?php 
			if($results[0]['username'] == $_POST['username'] && $results[0]['password'] == $_POST['password']) {
				echo '<div style="text-align: center">';
					echo '<br>Login successful. Welcome back, ' . $results[0]['fullName'] . '<br>';
					echo 'Administrator<br>';
					echo 'Email: ' . $results[0]['email'];
					echo '<br>Messages: (0)<br>';
					echo '<a href="adminLogout.php">(log out)</a><br><br>';
					echo '<form action="adminOperations.php" method="post">';
					echo '<button style="margin: 1%" name="deleteItem">Delete Item</button>';
					echo '<button style="margin: 1%" name="updateItem">Update Item</button>';
					echo '<button style="margin: 1%" name="addItem">Add Item</button>';
					echo '</form>';

				echo '</div>';
			}
			else {
				# re-direct back to sign in page 
				$invalidLogin = urlencode('<br><p style="color: red">Sorry, the information you submitted was invalid. Please try again</p>');
				header("location: adminLogin.php?invalid=" . $invalidLogin);
				die; 
			}
		?>
		<div style='margin-bottom: 24%'></div>
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>