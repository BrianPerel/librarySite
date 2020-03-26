<!DOCTYPE html>

<html>
	<head>
		<title>Home | HWL</title>
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
				<a href="signIn.php">Sign-in</a>
				<a href="signUp.php">Sign-up</a>
				<a href="advSearch.php">Search</a>
				<a href="#BodyText">About</a>
				<a href="#contact">Contact Us</a>
				<a href="https://www.framingham.edu/" target="_blank">myFramingham.edu</a>
			</div>
			
			<?php 
				session_start(); # need session to save item_name to session in order to pass it into another file

				$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');

				if(isset($_GET['send2'])) {
					$post = $_GET['send2'];
					$SearchLetter = $post;
				}						
				
				else {
					$SearchLetter = $_GET['by'];
				}
				$sql = $con -> query("SELECT * FROM items WHERE Item_Name LIKE '" . $SearchLetter . "%'");				
			    $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
				
				echo '<h2 align=center>Search results ' . sizeof($results) . ' of ' . sizeof($results) . '  for: \'' . $SearchLetter . '\' </h2>';
				
				if(sizeof($results) == 0) {
					echo '<center>No items match your search</center><div style="margin-bottom: 24%"></div>';
				}
				
				else {
					echo "<table align='center' width='50%' height='120%' border=solid black 1px>";
					for($i = 0; $i < sizeof($results); $i++) {
						echo'<tr><td>' . 'Title: ' . $results[$i]['Item_Name'] . '</td></tr>';
						echo'<tr><td>' . 'Author: ' . $results[$i]['Author'] . '</td></tr>';
						echo'<tr><td>' . 'ISBN: ' . $results[$i]['ISBN'] . '</td></tr>';
						echo'<tr><td>' . 'Item: ' . $results[$i]['Item_Type'] . '</td></tr>';
						echo'<tr><td>' . 'Publication info: ' . $results[$i]['Publication_Info'] . '</td></tr>';
						echo'<tr><td>' . 'Year released: ' . $results[$i]['Year_of_Release'] . '</td></tr>';
						echo'<tr><td>' . 'General Audience: ' . $results[$i]['General_Audience'] . '</td></tr>';
						echo'<tr><td>' . 'Summary: ' . $results[$i]['Summary'] . '</td></tr>';
						echo'<tr><td>' . 'Col No: ' . $results[$i]['Col_No'] . '</td></tr>';
						echo'<tr><td>' . 'Status: ' . $results[$i]['Status'] . '</td></tr>';
						}		
					echo '</table><br>';

					$_SESSION['checkout2'] = $results[0]['Item_Name'];
					$_SESSION['searchLetter'] = substr($results[0]['Item_Name'], 0, 1);
				}
			?>
			
			<form action='checkoutLetter.php' method='post'>
			<center><button style='margin-right: 1%' name='checkout2' <?php if(sizeof($results) == 0) {echo 'disabled';} else { if($results[0]['Status'] == 'Out') {echo 'disabled';}} ?>
			>Checkout item</button>
			</form> 
			
			<button name='request' type="button" <?php if(sizeof($results) == 0) {echo 'disabled';} ?> style='margin-bottom: 5%'>Request item</button></center>
			
			<div class="footer">
				<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
			</div>
	
		</body>
	</head>
</html>