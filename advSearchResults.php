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
	
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true) { 
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
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
		AND (Year_of_Release >= '$_POST[yearFrom]' AND Year_of_Release <= '$_POST[yearTo]') AND Item_Type = '$_POST[format]' 
		AND Location = '$_POST[location]' LIMIT 1");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
	}
	
	echo '<h2 align=center>Advanced search results: 1</h2>';
	
	echo sizeof($results);

	if(sizeof($results) == 0) {
		echo '<center>No items match your search</center>';
		echo '<div style="margin-bottom: 20%"></div>';
	}
	
	else if(sizeof($results) == 1) {
		$photo = $results['photo']; 
	}
?>
	
<br><center><img src="<?php echo $photo; ?>" <?php if(sizeof($results) > 1 || sizeof($results) == 0) { echo 'style="display: none"';} ?> width='250' height='230' alt='profile picture'/></center>
			
<?php
	if(sizeof($results) > 0) {				
		echo '<p style="margin-left: 25%">Item #1</p>';
		echo "<table align='center' width='50%' height='120%' border=solid black 1px>";
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
		echo'<tr><td>' . 'Status: ' . $results['Status'] . '</td></tr>';
		echo '</table><br>';
		
		$_SESSION['checkout2'] = $results['Item_Name'];	
		$_SESSION['pageSentFrom'] = 'advSearch';		
	}
?>
	
<form action='checkout.php' method='post'>
<center><input style='margin-right: 1%' name='checkout2' type="submit" value="Checkout Item" <?php if(sizeof($results) == 0 || $results['Status'] == 'Out' || (isset($_SESSION['num']) && $_SESSION['num'] >= 3)) {echo 'disabled';} else if(sizeof($results) > 1) {echo 'hidden';} ?>></input>
</form>

<form action='checkout.php' method='post' style='display: inline'>
<input name='request' type="submit" value="Request Item" <?php if(sizeof($results) == 0) {echo 'disabled';} else if(sizeof($results) > 1) {echo 'hidden';}?>></input></center>
</form>
	
<?php echo '<div style="margin-top: 5%"></div>'; 
include("footer.htm");?>	