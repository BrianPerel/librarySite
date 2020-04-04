<!DOCTYPE html>

<html>
	<head>
		<title>Admin Account | HWL</title>
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
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			if(isset($_POST['deleteItem'])) {
				echo '<center><h3>Delete item from library database</h3>';
				
				echo "<form action='completeDeletion.php' action='POST'>";
				echo '<br>Name of item to be deleted: <input name="item_name" type="text" required></input>'; 
				echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
				echo "</form></center>";
				
			#   return to admin page 	
			#	echo '<div style="margin-top: 22%"></div><br><a href="myAdminAccount.php"><u>Return To Admin Page</u></a></center>';
			}
			if(isset($_POST['addItem'])) {
				echo '<center><h3>Add item to library database</h3>';
				
				echo "<form action='addCompletion.php' action='POST' style='border solid'>";
				echo '<label>Item Name: </label><br>';
				echo '<input name="item_name" type="text" required></input><br><br>';
				
				echo '<label>Author: </label><br>';
				echo '<input name="author" type="text" required></input><br><br>'; 
				
				echo '<label>Publication Information: </label><br>';
				echo '<input name="pub_info" type="text" required></input><br><br>'; 
				
				echo '<label>Year Released: </label><br>';
				echo '<input name="year_released" type="text" required></input><br><br>'; 
				
				echo '<label>General Audience: </label><br>';
				echo '<input name="gen_aud" type="text" required></input><br><br>'; 
							
				echo '<label>Summary: </label><br>';
				echo '<input name="summary" type="text" required></input><br><br>'; 
				
				echo '<label>Type of Item: </label><br>';
				echo '<input name="item_type" type="text" required></input><br><br>'; 
				
				echo '<label>Col. Number: </label><br>';
				echo '<input name="col_no" type="text" required></input><br><br>'; 
				
				echo '<label>Price: </label><br>';
				echo '<input name="price" type="text" required></input><br><br>'; 

				echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
				echo "</form></center>";
			}
			
			if(isset($_GET['delMessage'])) {
				echo '<center><h3>Delete item from library database</h3>';
				
				echo "<form action='completeDeletion.php' action='POST'>";
				echo '<br>Name of item to be deleted: <input name="item_name" type="text" required></input>'; 
				echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
				echo "</form>";
				
				echo $_GET['delMessage'] . '</center>';
			}
			
			if(isset($_GET['addMessage'])) {
				echo '<center><h3>Add item to library database</h3>';
				
				echo "<form action='addCompletion.php' action='POST'>";
				echo '<br>Item Name: <input name="item_name" type="text" required></input>';
				echo '<br>Author: <input name="author" type="text" required></input>'; 
				echo '<br>ISBN: <input name="ISBN" type="text" required></input>'; 
				echo '<br>Publication Information: <input name="pub_info" type="text" required></input>'; 
				echo '<br>Year Released: <input name="year_released" type="text" required></input>'; 
				echo '<br>General Audience: <input name="gen_aud" type="text" required></input>'; 
				echo '<br>Summary: <input name="summary" type="text" required></input>'; 
				echo '<br>Type of Item: <input name="item_type" type="text" required></input>'; 
				echo '<br>Col. Number: <input name="col_no" type="text" required></input>'; 
				echo '<br>Price: <input name="price" type="text" required></input>'; 

				echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
				echo "</form>";
				
				echo $_GET['addMessage'] . '</center>';
			}
		?>				

		<div style='margin-bottom: 28%'></div>
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>