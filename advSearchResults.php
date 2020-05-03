<?php
	session_start();
	include("body.htm");
	echo '<title>Advanced Search | HWL</title>';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");	
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['num'] = $results['items_Out'];
	}
	
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
		$_POST['Title'] = $_SESSION['checkout2']; 
		$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[Title]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
	}		
	
	if(!(isset($_GET['send3']))) {
		$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[Title]' OR ISBN = '$_POST[ISBN]' OR Author ='$_POST[Author]'
		OR (Year_of_Release >= '$_POST[yearFrom]' AND Year_of_Release <= '$_POST[yearTo]') OR Item_Type = '$_POST[format]' 
		OR Location = '$_POST[location]'");
		$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	}
	
	echo '<h2 align=center>Advanced search results: ' . sizeof($results) . '</h2>';

	if(sizeof($results) == 0) {
		echo '<center>No items match your search</center>';
		echo '<div style="margin-bottom: 20%"></div>';
	}
	
	else if(sizeof($results) == 1) {
		$photo = $results[0]['photo']; 
	}
?>
	
<br><center><img src="<?php echo $photo; ?>" <?php if(sizeof($results) > 1 || sizeof($results) == 0) { echo 'style="display: none"';} ?> width='250' height='230' alt='profile picture'/></center>
			
<?php
	if(sizeof($results) > 0) {				
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
		$_SESSION['pageSentFrom'] = 'advSearch';		
	}
?>
	
<form action='checkout.php' method='post'>
<center><input style='margin-right: 1%' name='checkout2' type="submit" value="Checkout Item" <?php if(sizeof($results) == 0 || $results[0]['Status'] == 'Out' || (isset($_SESSION['num']) && $_SESSION['num'] >= 3)) {echo 'disabled';} else if(sizeof($results) > 1) {echo 'hidden';} ?>></input>
</form>

<form action='checkout.php' method='post' style='display: inline'>
<input name='request' type="submit" value="Request Item" <?php if(sizeof($results) == 0) {echo 'disabled';} else if(sizeof($results) > 1) {echo 'hidden';}?>></input></center>
</form>
	
<?php
	echo '<div style="margin-top: 5%"></div>';
	if(sizeof($results) > 1) {
		echo '<div class="backTop"><center><a href="#top">Back to top</a> &#x2191;</center></div>';
	}
	include("footer.htm");
?>	