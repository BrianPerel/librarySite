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
			<a href="search.php">Search</a>
			<a href="#about">About</a>
			<a href="https://www.framingham.edu/" target="_blank">myFramingham.edu</a>
		</div>
		</center>
	
		<h2 align=center>Search results for: '<?php echo $_POST['item_name'];?>'</h2>

		<?php
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[item_name]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			
			if(sizeof($results) == 0) {
				echo '<center>No items match your search</center><div style="margin-bottom: 24%"></div>';
			}
			
			else {
				echo "<table align='center' width='50%' height='120%' border=solid black 1px>";
				for($i = 0; $i < sizeof($results); $i++) {
					echo'<tr>';
						echo'<td>' . 'Book Name: ' . $results[$i]['Item_Name'] . '</td>';
					echo'</tr>';
					
					echo'<tr>';
						echo'<td>' . 'ISBN: ' . $results[$i]['Author'] . '</td>';
					echo '</tr>';
					
					echo '<tr>';
						echo'<td>' . 'Author: ' . $results[$i]['ISBN'] . '</td>';
					echo '</tr>';
					
					echo '<tr>';
						echo'<td>' . 'Item: ' . $results[$i]['Item_Type'] . '</td>';
					echo '</tr>';
					
					echo '<tr>';
						echo'<td>' . 'Publication info: ' . $results[$i]['Publication_Info'] . '</td>';
					echo '</tr>';
					
					echo '<tr>';
						echo'<td>' . 'Year released: ' . $results[$i]['Year_of_Release'] . '</td>';
					echo '</tr>';
					
					echo '<tr>';
						echo'<td>' . 'General Audience: ' . $results[$i]['General_Audience'] . '</td>';
					echo '</tr>';
					
					echo '<tr>';
						echo'<td>' . 'Summary: ' . $results[$i]['Summary'] . '</td>';
					echo '</tr>';
					}
				echo"</table><br><div style='margin-bottom: 15%'></div>";
			}
		?>
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>