<!DOCTYPE html>

<html>
	<head>
		<title>Advanced Search | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/a.css">
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
		</center>
		
		<?php
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[Title]' OR ISBN = '$_POST[ISBN]' OR Author ='$_POST[Author]'
			OR (Year_of_Release >= '$_POST[yearFrom]' AND Year_of_Release <= '$_POST[yearTo]') OR Item_Type = '$_POST[format]' 
			OR Location = '$_POST[location]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			
			echo '<h2 align=center>Search results ' . sizeof($results) . '</h2>';
			
			if(sizeof($results) < 0) {
				echo '<center>No items match your search</center><div style="margin-bottom: 24%"></div>';
			}
			
			else {
				for($i = 0; $i < sizeof($results); $i++) {
					$num = $i + 1;
					echo '<p style="margin-left: 25%">Item #' . $num . '</p>';
					
					echo "<table align='center' width='50%' height='120%' border=solid black 1px>";
					echo'<tr><td>' . 'Title: ' . $results[$i]['Item_Name'] . '</td></tr>';
					echo'<tr><td>' . 'Author: ' . $results[$i]['Author'] . '</td></tr>';
					echo'<tr><td>' . 'ISBN: ' . $results[$i]['ISBN'] . '</td></tr>';
					echo'<tr><td>' . 'Item: ' . $results[$i]['Item_Type'] . '</td></tr>';
					echo'<tr><td>' . 'Publication info: ' . $results[$i]['Publication_Info'] . '</td></tr>';
					echo'<tr><td>' . 'Year released: ' . $results[$i]['Year_of_Release'] . '</td></tr>';
					echo'<tr><td>' . 'General Audience: ' . $results[$i]['General_Audience'] . '</td></tr>';
					echo'<tr><td>' . 'Summary: ' . $results[$i]['Summary'] . '</td></tr>';
					echo'<tr><td>' . 'Col No: ' . $results[$i]['Col_No'] . '</td></tr>';
					echo'<tr><td>' . 'Price: $' . $results[$i]['Price'] . '</td></tr>';
					echo'<tr><td>' . 'Location: ' . $results[$i]['Location'] . '</td></tr>';
					echo'<tr><td>' . 'Status: ' . $results[$i]['Status'] . '</td></tr>';
					echo '</table><br>';
				}						
			}
		?>
		
		<div style="margin-top: 5%"></div>
		
		<div class="backTop">
			<center><a href="#top">Back to top</a> &#x2191;</center>
		</div>
		
				
		<div class="footer">
			<p>&copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script> - By: Brian Perel</p>
		</div>
		
	</body>
</html>