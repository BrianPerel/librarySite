<?php 
	session_start(); # need session to save item_name to session in order to pass it into another file
	include("body.htm");
	echo '<title>Letter Search | HWL</title>';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");	
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['num'] = $results['items_Out'];
	}
	
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true) { 
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
	}

	# when user check an item out, letterCheckout.php calls the file again and places item with appropriate letter into $SearchLetter 
	if(isset($_GET['send1'])) {
		$post = $_GET['send1'];
		$_GET['by'] = $SearchLetter = $post; 
		echo '<br><center><p style="color: green">' . $_SESSION['username'] . ' has checked out this item</p></center>';
	}
	
	if(isset($_GET['send2'])) {
		$post = $_GET['send2'];
		$_GET['by'] = $SearchLetter = $post; 
		echo '<br><center><p style="color: green">' . $_SESSION['username'] . ' has requested this item</p></center>';
	}
	
	if(isset($_GET['send3'])) {
		echo '<center>' . $_GET['send3'] . '</center>';
		$_GET['by'] = $SearchLetter = $_SESSION['searchLetter']; 
	}
	
	$SearchLetter = $_GET['by'];

	$sql = $con -> query("SELECT * FROM items WHERE Item_Name LIKE '" . $SearchLetter . "%'");				
	$results = $sql -> fetch(PDO::FETCH_ASSOC);
	$results2 = $sql -> rowCount(PDO::FETCH_ASSOC);
		
	if($results2 == 0) {
		$photo = null;
		echo '<h2 align=center>Search results 0 for: \'' . $SearchLetter . '\' </h2>';
		$results = array();
	}
		
	else if(sizeof($results) > 0) {
		$photo = $results['photo'];
		echo '<h2 align=center>Search results 1 for: \'' . $SearchLetter . '\' </h2>';
	}
?>
		
<center><img src="<?php echo $photo; ?>" <?php if(sizeof($results) == 0) { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/></center>
		
<?php
	if(sizeof($results) == 0) {
		echo '<center>No items match your search</center><div style="margin-bottom: 22%"></div>';
	}
	
	else if(sizeof($results) > 0) {
		echo '<center><p style="margin-right: 45%">Item #1</p></center>';
		
		echo '<table align="center" width="50%" height="120%" border=solid black 1px>';
		echo'<tr><td>' . 'Title: ' . $results['Item_Name'] . '</td></tr>';
		echo'<tr><td>' . 'Author: ' . $results['Author'] . '</td></tr>';
		echo'<tr><td>' . 'ISBN: ' . $results['ISBN'] . '</td></tr>';
		echo'<tr><td>' . 'Item: ' . $results['Item_Type'] . '</td></tr>';
		echo'<tr><td>' . 'Publication info: ' . $results['Publication_Info'] . '</td></tr>';
		echo'<tr><td>' . 'Year released: ' . $results['Year_of_Release'] . '</td></tr>';
		echo'<tr><td>' . 'General Audience: ' . $results['General_Audience'] . '</td></tr>';
		echo'<tr><td>' . 'Summary: ' . $results['Summary'] . '</td></tr>';
		echo'<tr><td>' . 'Col No: ' . $results['Col_No'] . '</td></tr>';
		echo'<tr><td>' . 'Price: $' . $results['Price'] . '</td></tr>';
		echo'<tr><td>' . 'Location: ' . $results['Location'] . '</td></tr>';
		echo'<tr><td>' . 'Requested: ' . $results['Requested'] . '</td></tr>';
		echo'<tr><td>' . 'Status: ' . $results['Status'] . '<br></td></tr>';
		echo '</table><br>';
			
		$_SESSION['checkout2'] = $results['Item_Name'];
		$_SESSION['searchLetter'] = substr($results['Item_Name'], 0, 1);
		
		$sql = $con -> query("SELECT Requested FROM items WHERE Item_Name = '$_SESSION[checkout2]'");
		$results3 = $sql -> fetch(PDO::FETCH_ASSOC);
	}
?>

<form action='letterCheckout.php' method='post'>
	<center><input style='margin-right: 1%' name="checkout2" type="submit" value='Checkout item' <?php if(sizeof($results) == 0 || $results['Status'] == 'Out' && $_GET['by'] != 'A-Z' || (isset($_SESSION['num']) && $_SESSION['num'] >= 3)) {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input>
</form> 

<form action='letterCheckout.php' method='post' style='display: inline'>
	<input type="submit" name="request" value='Request Item' <?php if(sizeof($results) == 0 && $_GET['by'] != 'A-Z' || $results3['Requested'] == 'Yes') {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input></center>
</form> 

<?php include("footer.htm");?>