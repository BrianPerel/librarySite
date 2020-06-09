<!-- Purpose of webpage: recieve letter request, display result of letter chosen -->

<?php 
	session_start(); # need session to save item_name to session in order to pass it into another file
	include("../includes/body.htm");
	echo '<title>Letter Search | HWL</title>';
	require("../includes/connect_db.php");
	
	define("ITEMS_CAP", "4.50"); # create constant to hold max number of items a single user can checkout or request (3 items)
	
	# if regular user is logged in switch nav links 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
		# get and store number of items checked out 
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");	
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['num'] = $results['items_Out'];
		
		$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");	
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['numReq'] = $results['items_Requested'];
	}
	
	# if admin user is logged in switch nav links 
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true) 
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';

	# when user checks an item out, letterCheckout.php calls the file again and places item with appropriate letter into $SearchLetter 
	if(isset($_GET['send1'])) {
		$post = $_GET['send1'];
		$_GET['by'] = $SearchLetter = $post; 
		echo "<br><center><p style='color: green'>$_SESSION[username]has checked out this item</p></center>";
	}
	
	if(isset($_GET['send2'])) {
		$post = $_GET['send2'];
		$_GET['by'] = $SearchLetter = $post; 
		echo "<br><center><p style='color: green'>$_SESSION[username]has requested this item</p></center>";
	}
	
	if(isset($_GET['send3'])) {
		echo "<center>$_GET[send3]</center>";
		$_GET['by'] = $SearchLetter = $_SESSION['searchLetter']; 
	}
	
	# save sent letter into variable 
	$SearchLetter = $_GET['by'];

	# select item from db that matches letter chosen 
	$sql = $con -> query("SELECT * FROM items WHERE Item_Name LIKE '" . $SearchLetter . "%'");				
	$results = $sql -> fetch(PDO::FETCH_ASSOC);
	$results2 = $sql -> rowCount(PDO::FETCH_ASSOC);
		
	# if no items match search 
	if($results2 == 0) {
		$photo = null;
		echo "<h2 align=center>Search results 0 for: '$SearchLetter'</h2>";
		$results = array();
	}
		
	# if search item found in db 
	else if(sizeof($results) > 0) {
		$photo = $results['photo'];
		echo "<h2 align=center>Search results 1 for: '$SearchLetter'</h2>";
	}
?>
		
<div class="row">
	<div class="col-sm-12">
		<img src="<?=$photo?>" <?php if(sizeof($results) == 0) { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/>
	</div>
</div>
		
<?php
	if(sizeof($results) == 0) 
		echo '<center>No items match your search</center><div style="margin-bottom: 22%"></div>';
	
	else if(sizeof($results) > 0) {
		echo '<center><p style="margin-right: 45%">Item #1</p></center>';
		
		echo '<table align="center" width="50%" height="120%" border=solid black 1px style="background-color: #DCDCDC">';
		echo "<tr><td>Title: $results[Item_Name]</td></tr>";
		echo "<tr><td>Author: $results[Author]</td></tr>";
		echo "<tr><td>ISBN: $results[ISBN]</td></tr>";
		echo "<tr><td>Item: $results[Item_Type]</td></tr>";
		echo "<tr><td>Publication info: $results[Publication_Info]</td></tr>";
		echo "<tr><td>Year released: $results[Year_of_Release]</td></tr>";
		echo "<tr><td>General Audience: $results[General_Audience]</td></tr>";
		echo "<tr><td>Summary: $results[Summary]</td></tr>";
		echo "<tr><td>Col No: $results[Col_No]</td></tr>";
		echo "<tr><td>Price: $$results[Price]</td></tr>";
		echo "<tr><td>Location: $results[Location]</td></tr>";
		echo "<tr><td>Requested: $results[Requested]</td></tr>";
		echo "<tr><td>Status: $results[Status]</td></tr>";
		echo '</table><br>';
			
		# save current item being looked up into variable 
		$_SESSION['checkout2'] = $results['Item_Name'];
		
		# save first letter of current item being looked up into variable 
		$_SESSION['searchLetter'] = substr($results['Item_Name'], 0, 1);
		
		# get requested yes or no status from current item being looked up 
		$sql = $con -> query("SELECT Requested FROM items WHERE Item_Name = '$_SESSION[checkout2]'");
		$results3 = $sql -> fetch(PDO::FETCH_ASSOC);
	}
?>

<!-- checkout and request buttons --> 
<form class="form" action='letterCheckout.php' method='post'>
	<center><input class="form" style='margin-right: 1%' name="checkout2" type="submit" value='Checkout item' <?php if(sizeof($results) == 0 || $results['Status'] == 'Out' && $_GET['by'] != 'A-Z' || (isset($_SESSION['num']) && $_SESSION['num'] >= ITEMS_CAP)) {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input>
	<input class="form" type="submit" name="request" value='Request Item' <?php if(sizeof($results) == 0 && $_GET['by'] != 'A-Z' || $results3['Requested'] == 'Yes' || (isset($_SESSION['num']) && $_SESSION['numReq'] >= ITEMS_CAP)) {echo 'disabled';} else if($_GET['by'] == 'A-Z') { echo 'hidden';}?>></input></center>
</form> 

<?php include("../includes/footer2.htm")?>