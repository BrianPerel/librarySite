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
			<a href="index.htm"><img src="icons/1.jpg" alt="Smiley face" width="100px" height="70px" style="padding-top: 1%"></img></a>
			<h2>Inventory Management System</h2><br><br>
		</div>

		<div class="class2">
			<a href="index.php">Home</a>
			<a href="#about">Sign-in</a>
			<a href="SignUp.php">Sign-up</a>
			<a href="advSearch.php">Search</a>
			<a href="#BodyText">About</a>
			<a href="#contact">Contact Us</a>
			<a href="https://www.framingham.edu/" target="_blank">myFramingham.edu</a>
		</div>
		</center>
		
		<center><h3>Advanced Search</h3>
		
		<div class="class3">
			<form class="example" action="/action_page.php" style="margin:auto;max-width:350px">
				<input type="text" name="Title" placeholder="Enter Title..." size="30" autocomplete='off' required></input><br><br><br>
				<input type="text" name="ISBN" placeholder="Enter ISBN Number..." size="30" autocomplete='off' required></input><br><br><br>
				<input type="text" name="Author" placeholder="Enter Author's Name..." size="30" autocomplete='off' required></input><br><br><br>
				
				<label for="cars">Format:</label>
				  <select name="format">
					<option value="volvo">Any</option>
					<option value="saab">Saab</option>
					<option value="fiat">Fiat</option>
					<option value="audi">Audi</option>
				</select><br><br>
				  
				<label for="cars">Location:</label>
				<select name="location">
				   <option value="volvo">Any</option>
				   <option value="saab">Saab</option>
				   <option value="fiat">Fiat</option>
				   <option value="audi">Audi</option>
				</select><br><br>
				<input type="submit">
			</form></center>

			
		</div>
		
		<div style="margin-top: 20%"></div>
				
		<div class="footer">
			<p>&copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script> - By: Brian Perel</p>
		</div>
		
	</body>
</html>