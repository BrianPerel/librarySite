<!DOCTYPE html>
<html>
	<head>
		<title>Search | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/a.css">
		
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
			session_start(); # need session to save item_name to session in order to pass it into another file 
						
			# isset() sees if get variable exists, can be used only on get and session variables  
			if(isset($_GET['send1'])){
				$post = $_GET['send1'];
				$_POST['item_name'] = $post;
				echo '<br><center><p style="color: green">' . $_SESSION['username'] . ' has checked out this item</p></center>';
			}	
			
			if(isset($_GET['send2'])){
				$post = $_GET['send2'];
				$_POST['item_name'] = $post;
				echo '<br><center><p style="color: green">' . $_SESSION['username'] . ' has requested this item</p></center>';
			}	

			if(isset($_GET['send3'])) {
				$err = $_GET['send3'];
				echo '<center>' . $err . '</center>';
				
				$_POST['item_name'] = $_SESSION['checkout2']; 
			}		
			
			/*
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			$sql = $con -> query("SELECT * FROM items");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			$titleSearch = explode("", $_POST['item_name'])
			
			for($i = 0; $i < sizeof($results); $i++) {
				$score = 0;
				$compareTitle = explode("", $results[$i]['item_name']);
				for($j = 0; $j < sizeof($compareTitle); $j++) {
					if($compareTitle[$j] == $titleSearch)
				}
			}
			*/
			
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[item_name]'");
			$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
			
			if(sizeof($results) == 0) {
				$photo = '';
			}
			
			else {
				$photo = $results[0]['photo'];
			}
			
			echo '<h2 align=center>Search results ' . sizeof($results) . '  for: \'' . $_POST['item_name'] . '\' </h2>';
		?>
			
		<br><center><img src="<?php echo $photo; ?>" <?php if($photo == '') { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/></center>
			
		<?php 
			if(sizeof($results)== 0) {
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
				
				$_SESSION['checkout2'] = $results[0]['Item_Name'];
			}
			
			if(sizeof($results) == 0) {
				echo '<div style="margin-bottom: 21%"></div>';
			}
		?>
	
		<form action='checkout.php' method='post'>
			<center><input style='margin-right: 1%' name='checkout2' type="submit" value="Checkout Item" <?php if(sizeof($results) == 0) {echo 'disabled';} else { if($results[0]['Status'] == 'Out') {echo 'disabled';}} ?>></input>
		</form>
	
		<form action='checkout.php' method='post' style='display: inline'>
			<input name='request' type="submit" value="Request Item" <?php if(sizeof($results) == 0) {echo 'disabled';}?>></input></center>
		</form>
		
		<div style='margin-bottom: 4%'></div>

		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
	</body>
</html>