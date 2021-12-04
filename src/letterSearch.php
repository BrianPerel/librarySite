<!-- 
Purpose of webpage: receive letter request, display result of letter chosen 
-->

<?php 
	session_start(); # need session to save item_name to session in order to pass it into another file
	include("../includes/body.htm");
	echo '<title>Letter Search | HWL</title>';
	require("../includes/connect_db.php");
	
	define("ITEMS_CAP", "4.50"); # create constant to hold max number of items a single user can checkout or request (3 items)
	
	# if regular user is logged in switch nav links 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
		# get and store number of items checked out 
		$sql = $con -> query("SELECT items_out FROM user_accounts WHERE username = '$_SESSION[username]'");	
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['num'] = $results['items_out'];
		
		$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");	
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['numReq'] = $results['items_requested'];
	}
	
	# if admin user is logged in switch nav links 
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']) {
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
	}

	# when user checks an item out, letterSearchCheckout.php calls the file again and places item with appropriate letter into $SearchLetter 
	if(isset($_GET['send1'])) {
		$_GET['by'] = $SearchLetter = $_GET['send1']; 
		echo "<br><center><p style='color: green'>$_SESSION[username] has checked out this item</p></center>";
	}
	
	if(isset($_GET['send2'])) {
		$_GET['by'] = $SearchLetter = $_GET['send2']; 
		echo "<br><center><p style='color: green'>$_SESSION[username] has requested this item</p></center>";
	}
	
	if(isset($_GET['send3'])) {
		echo "<center>$_GET[send3]</center>";
		$_GET['by'] = $SearchLetter = $_SESSION['searchLetter']; 
	}
	
	# save sent letter into variable 
	$SearchLetter = $_GET['by'];

	# select item from db that matches letter chosen
	$sql = $con -> query("SELECT * FROM items WHERE item_name LIKE '" . $SearchLetter . "%'");				
	$results = $sql -> fetch(PDO::FETCH_ASSOC);
	$results2 = $sql -> rowCount(PDO::FETCH_ASSOC);
		
	# if no items match search 
	if($results2 == 0) {
		$item_photo = null;
		echo "<h2 align=center>Search results 0 for: '$SearchLetter'</h2>";
		$results = array();
	}
		
	# if search item found in db 
	else if(!empty($results)) {
		$item_photo = $results['item_photo'];
		echo "<h2 align=center>Search results 1 for: '$SearchLetter'</h2>";
	}
?>
		
<div class="row">
	<div class="col-sm-12">
		<img src="<?=$item_photo?>" <?php if(empty($results)) { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/>
	</div>
</div>
		
<?php
	if(empty($results)) {
		echo '<center>No items match your search</center><div style="margin-bottom: 22%"></div>';
	}
	
	else if(!empty($results)) {
		echo '<center><p style="margin-right: 45%">Item #1</p></center>';
		
		echo '<table align="center" width="50%" height="120%" border=solid black 1px style="background-color: #DCDCDC">';
		echo "<tr><td>Title: $results[item_name]</td></tr>";
		echo "<tr><td>Author: $results[author]</td></tr>";
		echo "<tr><td>ISBN: $results[ISBN]</td></tr>";
		echo "<tr><td>Item: $results[item_type]</td></tr>";
		echo "<tr><td>Publication info: $results[publication_info]</td></tr>";
		echo "<tr><td>Year released: $results[year_of_release]</td></tr>";
		echo "<tr><td>General Audience: $results[general_audience]</td></tr>";
		echo "<tr><td>Summary: $results[summary]</td></tr>";
		echo "<tr><td>Col No: $results[col_no]</td></tr>";
		echo "<tr><td>Price: $$results[price]</td></tr>";
		echo "<tr><td>Location: $results[location]</td></tr>";
		echo "<tr><td>Requested: $results[requested]</td></tr>";
		echo "<tr><td>Status: $results[status]</td></tr>";
		echo '</table><br>';
			
		# save current item being looked up into variable 
		$_SESSION['checkout2'] = $results['item_name'];
		
		# save first letter of current item being looked up into variable 
		$_SESSION['searchLetter'] = substr($results['item_name'], 0, 1);
		
		# get requested yes or no status from current item being looked up 
		$sql = $con -> query("SELECT requested FROM items WHERE item_name = '$_SESSION[checkout2]'");
		$results3 = $sql -> fetch(PDO::FETCH_ASSOC);
	}
?>

<!-- checkout and request buttons --> 
<form class="form" action='letterSearchCheckout.php' method='post'>
	<center><input class="form" style='margin-right: 1%' name="checkout2" type="submit" value='Checkout item' <?php if(empty($results) || $results['status'] == 'Out' && $_GET['by'] != 'A-Z' || (isset($_SESSION['num']) && $_SESSION['num'] >= ITEMS_CAP)) {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input>
	<input class="form" type="submit" name="request" value='Request Item' <?php if(empty($results) && $_GET['by'] != 'A-Z' || $results3['requested'] == 'Yes' || (isset($_SESSION['num']) && $_SESSION['numReq'] >= ITEMS_CAP)) {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input></center>
</form> 

<?php include("../includes/footer2.htm")?>