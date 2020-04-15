<?php 
	session_start(); # need session to save item_name to session in order to pass it into another file
	include("body.htm");
	echo '<title>Home | HWL</title>';
	$_SESSION['A_Zitem_name'] = '';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');

	# when user check an item out, letterCheckout.php calls the file again and places item with appropriate letter into $SearchLetter 
	if(isset($_GET['send1'])) {
		$post = $_GET['send1'];
		$SearchLetter = $post; 
		$_GET['by'] = $post; 
		echo '<br><center><p style="color: green">' . $_SESSION['username'] . ' has checked out this item</p></center>';
	}
	
	if(isset($_GET['send2'])) {
		$post = $_GET['send2'];
		$SearchLetter = $post; 
		$_GET['by'] = $post; 
		echo '<br><center><p style="color: green">' . $_SESSION['username'] . ' has requested this item</p></center>';
	}
	
	if(isset($_GET['send3'])) {
		$err = $_GET['send3'];
		echo '<center>' . $err . '</center>';
		
		$SearchLetter = $_SESSION['searchLetter']; 
		$_GET['by'] = $SearchLetter; 
	}
	
	# search by letter (A-Z option)
	if($_GET['by'] == 'A-Z') {	 			
		$SearchLetter = 'A-Z';
		$sql = $con -> query("SELECT * FROM items");				
		$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
		echo '<h2 align=center>Search results ' . sizeof($results) . '  for: \'' . $SearchLetter . '\' </h2>';
							
		if(sizeof($results) == 0) {
			echo '<center>No items match your search</center><div style="margin-bottom: 20%"></div>';
		}
		
		else if(sizeof($results) > 0) {
			for($i = 0; $i < sizeof($results); $i++) {
				$_SESSION['A_Zitem_name'] = $results[$i]['Item_Name'];
				$num = $i + 1;
				echo '<center><p style="margin-right: 45%">Item #' . $num . '</p></center>';
				
				echo "<table align='center' width='50%' height='120%' border=solid black 1px>";
				echo'<tr><td>' . 'Title: <u><a href="itemSearch.php">' . $results[$i]['Item_Name'] . '</a></u></td></tr>';
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
				echo'<tr><td>' . 'Status: ' . $results[$i]['Status'] . '<br>' . '</td></tr>';
				echo '</table><br>';							
			}						
		}						
	}
	
	# search by letter (not A-Z option)
	else { 
		$SearchLetter = $_GET['by'];
	
		$sql = $con -> query("SELECT * FROM items WHERE Item_Name LIKE '" . $SearchLetter . "%'");				
		$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
		# in $results '[0]' accesses the first result of fetchAll() 
		
		if(sizeof($results) > 0) {
			$photo = $results[0]['photo'];
		}
	
		echo '<h2 align=center>Search results ' . sizeof($results) . '  for: \'' . $SearchLetter . '\' </h2>';
	}
?>
		
<center><img src="<?php echo $photo; ?>" <?php if(sizeof($results) == 0) { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/></center>
		
<?php
	if(sizeof($results) == 0) {
		echo '<center>No items match your search</center><div style="margin-bottom: 22%"></div>';
	}
	
	else if(sizeof($results) > 0) {
		for($i = 0; $i < sizeof($results); $i++) {
			$num = $i + 1;
			echo '<center><p style="margin-right: 45%">Item #' . $num . '</p></center>';
			
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
			echo'<tr><td>' . 'Status: ' . $results[$i]['Status'] . '<br>' . '</td></tr>';
			echo '</table><br>';
		}		

		$_SESSION['checkout2'] = $results[0]['Item_Name'];
		$_SESSION['searchLetter'] = substr($results[0]['Item_Name'], 0, 1);
	}
	
?>

	<form action='letterCheckout.php' method='post'>
		<center><input style='margin-right: 1%' name="checkout2" type="submit" value='Checkout item' <?php if(sizeof($results) == 0 || $results[0]['Status'] == 'Out' && $_GET['by'] != 'A-Z') {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input>
	</form> 

	<form action='letterCheckout.php' method='post' style='display: inline'>
		<input type="submit" name="request" value='Request Item' <?php if(sizeof($results) == 0 && $_GET['by'] != 'A-Z') {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input></center>
	</form> 

	<?php 
		if(sizeof($results) > 1) {
			echo '<br><br><div class="backTop"><center><a href="#top">Back to top</a> &#x2191;</center></div>';
		} 
		
		include("footer.htm");
	?>