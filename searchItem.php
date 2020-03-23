<!DOCTYPE html>
<html>
	<head>
		<title>Search | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/main.css">
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
			$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[item_name]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			
			echo '<h2 align=center>Search results ' . sizeof($results) . ' of ' . sizeof($results) . '  for: \'' . $_POST['item_name'] . '\' </h2>';
			
			if(sizeof($results) == 0) {
				echo '<center>No items match your search</center><div style="margin-bottom: 24%"></div>';
			}
			
			else {
				echo "<table align='center' width='50%' height='120%' border=solid black 1px>";
				for($i = 0; $i < sizeof($results); $i++) {
					echo'<tr><td>' . 'Title: ' . $results[$i]['Item_Name'] . '</td></tr>';
					echo'<tr><td>' . 'ISBN: ' . $results[$i]['Author'] . '</td></tr>';
					echo'<tr><td>' . 'Author: ' . $results[$i]['ISBN'] . '</td></tr>';
					echo'<tr><td>' . 'Item: ' . $results[$i]['Item_Type'] . '</td></tr>';
					echo'<tr><td>' . 'Publication info: ' . $results[$i]['Publication_Info'] . '</td></tr>';
					echo'<tr><td>' . 'Year released: ' . $results[$i]['Year_of_Release'] . '</td></tr>';
					echo'<tr><td>' . 'General Audience: ' . $results[$i]['General_Audience'] . '</td></tr>';
					echo'<tr><td>' . 'Summary: ' . $results[$i]['Summary'] . '</td></tr>';
					echo'<tr><td>' . 'Col No: ' . $results[$i]['Col_No'] . '</td></tr>';
					echo'<tr><td>' . 'Status: ' . $results[$i]['Status'] . '</td></tr>';
					}		
				echo '</table><br>';
			}
		?>
		
		<!-- <form action='' method='post'> -->
			<center><button style='margin-right: 1%' name='checkout'>Checkout item</button>
			<button name='request'>Request item</button></center>
		<!-- </form> -->
		
		<div style='margin-bottom: 10%'></div>

		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>