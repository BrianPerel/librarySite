<!DOCTYPE html>

<html>
	<head>
		<title>Advanced Search | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		
		<center><h3>Advanced Search</h3>
		
		<div class="class3">
			<form class="example" action="" method="post" style="max-width:350px; border: solid black 0.5px">
				<div class='move'>
					<form action='' method='POST'>
					<br><input type="text" name="Title" placeholder="Enter Title..." size="30" autocomplete='off' required></input><br><br><br>
					<input type="text" name="ISBN" placeholder="Enter ISBN Number..." size="30" autocomplete='off' required></input><br><br><br>
					<input type="text" name="Author" placeholder="Enter Author's Name..." size="30" autocomplete='off' required></input><br><br><br><br>
					Year from:<input type="number" name="trip-start" value='1900' min="1900" max="2020"><br><br>	
					Year to:<input type="number" name="trip-start" value='2020' min="1900" max="2020">
				</div>
				
						<br><br><label for="cars" required>Format:</label>
						  <select name="format">
							<option value="any">Any</option>
							<option value="book">book</option>
							<option value="ebook">ebook</option>
							<option value="cd">dvd</option>
							<option value="cd">blu-ray</option>
							<option value="cd">cd</option>
						</select><br><br>
						  
						<label for="cars" required>Location:</label>
						<select name="location">
						   <option value="any">All</option>
						   <option value="f">Framingham</option>
						   <option value="n">Natick</option>
						   <option value="n2">Newton</option>
						   <option value="a">Ashland</option>
						</select><br><br>
						<input type="submit"><br><br>
					</form>
		</div></center>
		
		<div style="margin-top: 5%"></div>
				
		<div class="footer">
			<p>&copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script> - By: Brian Perel</p>
		</div>
		
	</body>
</html>