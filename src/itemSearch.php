<!--
Purpose of webpage: recieve request from index.php and display item information for info entered in search box on index.php
-->

<?php
	session_start(); # need session to save item_name to session in order to pass it into another file
	include_once("../includes/body.htm");
	echo '<title>Search | HWL</title>';
	require_once("connect_db.php");

	define("ITEMS_CAP", "4.50"); # create constant to hold max number of items a single user can checkout or request (3 items)

	$_SESSION['pageSentFrom'] = null;

	if(isset($_SESSION['requestViewNext'])) {
		$_SESSION['requestViewNext'] = null;
	}

	elseif(isset($_SESSION['requestViewPrevious'])) {
		$_SESSION['requestViewPrevious'] = null;
	}

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
		$sql = $con -> query("SELECT items_out FROM user_accounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['num'] = $results['items_out'];

		$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['numReq'] = $results['items_requested'];
	}

	elseif(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}

	# isset() sees if get variable exists, can be used only on get and session variables
	if(isset($_GET['send1'])) {
		$_POST['item_name'] = $_GET['send1'];
		echo "<br><center><p style='color: green'>$_SESSION[username] has checked out this item</p></center>";
	}

	if(isset($_GET['send2'])) {
		$_POST['item_name'] = $_GET['send2'];
		echo "<br><center><p style='color: green'>$_SESSION[username] has requested this item</p></center>";
	}

	if(isset($_GET['send3'])) {
		$err = $_GET['send3'];
		echo "<center>$err</center>";
		$_POST['item_name'] = $_SESSION['checkout2'];
	}

	if(isset($_GET['check_items_out'])) {
		$sth = $con -> prepare("SELECT min(item_id) FROM items_out WHERE item_holder = '$_SESSION[username]'");
		$sth -> execute();
		$smallest = $sth -> fetchColumn();
		$_SESSION['smallest'] = $smallest;
		$_SESSION['smallestNum'] = $smallest;
		$_SESSION['var'] = 0;

		$sth = $con -> prepare("SELECT max(item_id) FROM items_out WHERE item_holder = '$_SESSION[username]'");
		$sth -> execute();
		$_SESSION['largestNum'] = $sth -> fetchColumn();

		$sql = $con -> query("SELECT * FROM items_out WHERE item_holder = '$_SESSION[username]' AND item_id = '$_SESSION[smallest]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_POST['item_name'] = $results['item_name'];
	}

	if(isset($_GET['check_items_requested'])) {
		$sth = $con -> prepare("SELECT min(item_id) FROM items_requested WHERE requester = '$_SESSION[username]'");
		$sth -> execute();
		$smallest = $sth -> fetchColumn();
		$_SESSION['smallestReq'] = $smallest;
		$_SESSION['smallestNumReq'] = $smallest;
		$_SESSION['varR'] = 0;

		$sth = $con -> prepare("SELECT max(item_id) FROM items_requested WHERE requester = '$_SESSION[username]'");
		$sth -> execute();
		$_SESSION['largestNumReq'] = $sth -> fetchColumn();

		$sql = $con -> query("SELECT item_name FROM items_requested WHERE requester = '$_SESSION[username]' AND item_id = '$_SESSION[smallestReq]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_POST['item_name'] = $results['item_name'];
	}

	$sql = $con -> query("SELECT * FROM items WHERE item_name LIKE '%$_POST[item_name]%'");
	$results = $sql -> fetch(PDO::FETCH_ASSOC);
	$results2 = $sql -> rowCount(PDO::FETCH_ASSOC);

	if($results2 == 0) {
		$item_photo = null;
		echo "<h2 align=center>Search results 0 for: '$_POST[item_name]'</h2>";
		$results = array();
	}

	if(!(isset($_GET['check_items_out'])) && !(isset($_GET['check_items_requested'])) && $results2 != 0) {
		echo "<h2 align=center>Search results 1 for: '$_POST[item_name]' </h2>";
		$item_photo = $results['item_photo'];
	}

	elseif(!empty($results)) {
		$item_photo = $results['item_photo'];
	}

	if(isset($_GET['check_items_out']) || isset($_GET['check_items_requested'])) {
		echo "<h2 align=center>'$_POST[item_name]'</h2>";
	}

?>

<div class="row">
	<div class="col-sm-12">
		<br><img src="<?=$item_photo?>" <?php if(empty($results)) { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/>
	</div>
</div>

<?php
	$_SESSION['res'] = 'No';

	if(empty($results)) {
		echo '<center>No items match your search</center><div style="margin-bottom: 24%"></div>';
	}

	function displayTable() {
		global $results;

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
		echo '</table><br><br>';
	}

	if(isset($_GET['check_items_out'])) {
		$_SESSION['itemN'] = 1;
		echo '<p style="margin-right: 45%">Item #' . $_SESSION['itemN'] . '</p>';
		displayTable();
		$sql = $con -> query("SELECT * FROM items_out WHERE item_holder = '$_SESSION[username]' AND item_id = '$smallest'");
		$results2 = $sql -> fetch(PDO::FETCH_ASSOC);
		echo '<table align="center" width="50%" height="120%" border=solid black 1px style="background-color: #DCDCDC">';
		echo '<tr><td>Date checked-out: ' . $results2['checkout_date'] . '</td></tr>';
		echo '<tr><td>Days item has been out: ' . $results2['days_out'] . '</td></tr>';
		echo '<tr><td>Due date: ' . $results2['due_date'] . '</td></tr>';
		echo "<tr><td>Renewed: $results2[renewed]</td></tr>";
		echo '</table><br>';

		$_SESSION['checkout2'] = $results['item_name'];
		$sql = $con -> query("SELECT requested FROM items WHERE item_name = '$_SESSION[checkout2]'");
		$results3 = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['res'] = $results3['requested'];
	}

	elseif(isset($_GET['check_items_requested'])) {
		$_SESSION['itemN'] = 1;
		echo "<p style='margin-right: 45%'>Item #$_SESSION[itemN]</p>";
		displayTable();
		$_SESSION['checkout2'] = $results['item_name'];
		$sql = $con -> query("SELECT requested FROM items WHERE item_name = '$_SESSION[checkout2]'");
		$results3 = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['res'] = $results3['requested'];
		$_SESSION['bool'] = true;
	}

	elseif(!empty($results)) {
		echo '<p style="margin-right: 45%">Item #1</p>';
		displayTable();
		$_SESSION['checkout2'] = $results['item_name'];
	}

	if(empty($results)) {
		echo '<div style="margin-bottom: 21%"></div>';
	}
?>

<form action='checkout.php' method='post'>
	<center><input class="form" style='margin-right: 1%' name='checkout2' type="submit" value="Checkout Item" <?php if(empty($results) || (isset($_SESSION['num']) && $_SESSION['num'] >= ITEMS_CAP) && !(isset($_GET['check_items_out']))) {echo 'disabled';} elseif (isset($_GET['check_items_out'])) {echo 'hidden';} elseif($results['status'] == 'Out') {echo 'disabled';} ?>></input>
	<input class="form" name='request' type="submit" value="Request Item" <?php if(isset($_GET['check_items_out']) || isset($_GET['check_items_requested'])) {echo 'hidden';} elseif (empty($results) || $_SESSION['res'] == 'Yes' || (isset($_SESSION['num']) && $_SESSION['numReq'] >= ITEMS_CAP)) {echo 'disabled';} ?>></input>
</form>

<?php
	if(isset($_GET['check_items_requested'])) {
		echo '<form action="cancelRequest.php" method="post" style="display: inline">';
			echo "<input name='cancel' type='submit' value='Cancel Request' style='display: inline; margin-left: 1%; margin-right: 1.5%'></input>";

			$sql = $con -> query("SELECT items_requested FROM user_accounts WHERE username = '$_SESSION[username]'");
			$item = $sql -> fetch(PDO::FETCH_ASSOC);

			if($item['items_requested'] > 1) {
				echo "<input name='next' type='submit' value='Next Page' style='display: inline'></input>";
			}
		echo '</form>';
	}

	if(isset($_GET['check_items_out'])) {
		echo "<form action='check-in.php' method='post'>";
			echo "<input name='checkIn' type='submit' value='Check-in Item' style='display: inline; margin-right: 1.5%'></input>";

			$sql = $con -> query("SELECT renewed FROM items_out WHERE item_holder = '$_SESSION[username]'");
			$item = $sql -> fetch(PDO::FETCH_ASSOC);

			if($item['renewed'] == "No") {
				echo "<input name='renew' type='submit' value='Renew Item' style='display: inline; margin-right: 1.5%'></input>";
			}

			$sql = $con -> query("SELECT items_out FROM user_accounts WHERE username = '$_SESSION[username]'");
			$item = $sql -> fetch(PDO::FETCH_ASSOC);

			if($item['items_out'] > 1) {
				echo "<input name='next' type='submit' value='Next Page' style='display: inline'></input>";
			}
		echo "</form>";
	}
	echo '</center>';
	include_once("../includes/footer2.htm");
?>