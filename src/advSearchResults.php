<!--
Purpose of webpage: display results of advSearch.php form query
-->

<?php
	session_start();
	include("../includes/body.htm");
	echo '<title>Advanced Search | HWL</title>';
	require("../includes/connect_db.php");

	# if regular user is logged-in switch nav links
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';

		# get and store number of items out of current user
		$sql = $con -> query("SELECT items_out FROM user_accounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['num'] = $results['items_out'];

		$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['numReq'] = $results['items_requested'];
	}

	if(empty($_POST['Title']) && empty($_POST['ISBN']) && empty($_POST['author'])) {
		$emptyMessage = '<p style="color: red">No information has been entered, please fill out a field</p>';
		header("Location: advSearch.php?emp=$emptyMessage");
	}

	# if admin user is logged-in switch nav links
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}

	# receive message 1 from checkout.php and print the message
	if(isset($_GET['send1'])) {
		$post = $_GET['send1'];
		$_POST['item_name'] = $post;
		echo "<br><center><p style='color: green'>$_SESSION[username] has checked out this item</p></center>";
	}

	# receive message 2 from checkout.php and print the message
	if(isset($_GET['send2'])) {
		$post = $_GET['send2'];
		$_POST['item_name'] = $post;
		echo "<br><center><p style='color: green'>$_SESSION[username] has requested this item</p></center>";
	}

	# receive message 3 from checkout.php and print the message. Get the record info on item name matched
	if(isset($_GET['send3'])) {
		$err = $_GET['send3'];
		echo "<center>$err</center>";
		$_POST['Title'] = $_SESSION['checkout2'];
		$sql = $con -> query("SELECT * FROM items WHERE item_name = '$_POST[Title]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
	}
	else {
		$sql = $con -> query("SELECT * FROM items WHERE item_name = '$_POST[Title]' OR ISBN = '$_POST[ISBN]' OR author ='$_POST[Author]'
		AND (year_of_release >= '$_POST[yearFrom]' AND year_of_release <= '$_POST[yearTo]') AND item_type = '$_POST[format]'
		AND Location = '$_POST[location]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$results2 = $sql -> rowCount(PDO::FETCH_ASSOC);
	}

	# if num of rows matched is 0, then no results
	if($results2 == 0) {
		echo '<h2 align=center>Advanced search results: 0</h2>';
		echo '<center>No items match your search</center>';
		echo '<div style="margin-bottom: 20%"></div>';
		$item_photo = null;
		$results = array();
	}

	# if 1 row match, then 1 result
	else if($results2 == 1) {
		echo '<h2 align=center>Advanced search results: 1</h2>';
		$item_photo = $results['item_photo'];
	}
?>

<img src="<?=$item_photo; ?>" <?php if(empty($results)) { echo 'style="display: none"';} ?> width='250' height='230' alt='profile picture'/>

<?php
	# display item data table
	if(!empty($results)) {
		echo '<p style="margin-right: 45%">Item #1</p>';
		echo '<table align="center" width="50%" height="120%" border="solid black 1px" style="background-color: #DCDCDC">';
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

		$_SESSION['checkout2'] = $results['item_name'];
		$_SESSION['pageSentFrom'] = 'advSearch';
	}
?>

<!-- check out and request buttons -->
<form action='checkout.php' method='post'>
	<input style='margin-right: 1%' name='checkout2' type="submit" value="Checkout Item" <?php if(empty($results) || $results['status'] == 'Out' || (isset($_SESSION['num']) && $_SESSION['num'] >= 3)) {echo 'disabled';} else if(($results2) > 1) {echo 'hidden';} ?>></input>
	<input name='request' type="submit" value="Request Item" <?php if(empty($results) || (isset($_SESSION['num']) && $_SESSION['numReq'] >= 3)) {echo 'disabled';} else if(($results2) > 1) {echo 'hidden';}?>></input>
</form>

<?php echo '<div style="margin-top: 2%"></div>'; include("../includes/footer2.htm")?>