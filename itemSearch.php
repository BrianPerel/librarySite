<?php
	session_start(); # need session to save item_name to session in order to pass it into another file 
	include("body.htm");
	echo '<title>Search | HWL</title>';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
	if(isset($_SESSION['requestViewNext'])) {
		$_SESSION['requestViewNext'] = null;
	}
	
	else if(isset($_SESSION['requestViewPrevious'])) {
		$_SESSION['requestViewPrevious'] = null;
	}
	
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");	
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['num'] = $results['items_Out'];
	}
	
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true) { 
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
	}

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
	
	if(isset($_GET['check_items_out'])) {
		$sth = $con->prepare("SELECT min(itemID) FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
		$sth -> execute();
		$smallest = $sth -> fetchColumn();
		$_SESSION['smallest'] = $smallest; 
		$_SESSION['smallestNum'] = $smallest; 
		$_SESSION['var'] = 0;
		
		$sth = $con -> prepare("SELECT max(itemID) FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
		$sth -> execute();
		$largest = $sth -> fetchColumn();
		$_SESSION['largestNum'] = $largest; 
		
		$sql = $con -> query("SELECT * FROM itemsout WHERE item_Holder = '$_SESSION[username]' AND itemID = '$_SESSION[smallest]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_POST['item_name'] = $results['item_Name']; 
	}
	
	if(isset($_GET['check_items_requested'])) {
		$sth = $con -> prepare("SELECT min(itemID) FROM itemsreq WHERE requester = '$_SESSION[username]'");
		$sth -> execute();
		$smallest = $sth -> fetchColumn();
		$_SESSION['smallestReq'] = $smallest; 
		$_SESSION['smallestNumReq'] = $smallest; 
		$_SESSION['varR'] = 0;
		
		$sth = $con -> prepare("SELECT max(itemID) FROM itemsreq WHERE requester = '$_SESSION[username]'");
		$sth -> execute();
		$largest = $sth -> fetchColumn();
		$_SESSION['largestNumReq'] = $largest; 
		
		$sql = $con -> query("SELECT item_Name FROM itemsreq WHERE requester = '$_SESSION[username]' AND itemID = '$_SESSION[smallestReq]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_POST['item_name'] = $results['item_Name']; 
	}
	
	$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[item_name]'");
	$results = $sql -> fetch(PDO::FETCH_ASSOC);
	
	if(sizeof($results) > 0) {
		$photo = $results['photo'];
	}

	if(isset($_GET['check_items_out']) || isset($_GET['check_items_requested'])) {
		echo '<h2 align=center>' . $_POST['item_name'] . '</h2>';
	}

	else {
		echo '<h2 align=center>Search results 1 for: \'' . $_POST['item_name'] . '\' </h2>';
	}
?>
	
<br><center><img src="<?php echo $photo; ?>" <?php if(sizeof($results) == 0) { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/></center>
	
<?php 
	$_SESSION['res'] = 'No';

	if(sizeof($results) == 0) {
		echo '<center>No items match your search</center><div style="margin-bottom: 24%"></div>';
	}
	
	function displayTable() {
		global $results;
		
		echo '<table align="center" width="50%" height="120%" border=solid black 1px>';
		echo '<tr><td>' . 'Title: ' . $results['Item_Name'] . '</td></tr>';
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
		echo'<tr><td>' . 'Status: ' . $results['Status'] . '</td></tr>';
		echo '</table><br><br>';
	}
	
	if(isset($_GET['check_items_out'])) {
		$_SESSION['itemN'] = 1;
		echo '<p style="margin-left: 25%">Item #' . $_SESSION['itemN'] . '</p>';
		displayTable();
		$sql = $con -> query("SELECT * FROM itemsout WHERE item_Holder = '$_SESSION[username]' AND itemID = '$smallest'");
		$results2 = $sql -> fetch(PDO::FETCH_ASSOC);
		echo '<table align="center" width="50%" height="120%" border=solid black 1px>';
		echo '<tr><td>Date checked-out: ' . $results2['checkout_Date'] . '</td></tr>'; 
		echo '<tr><td>Days item has been out: ' . $results2['days_Out'] . '</td></tr>';
		echo '<tr><td>Due date: ' . $results2['due_Date'] . '</td></tr>';
		echo '<tr><td>Renewed: ' . $results2['renewed'] . '</td></tr>';
		echo '</table><br>';
		
		$_SESSION['checkout2'] = $results['Item_Name'];
		$sql = $con -> query("SELECT Requested FROM items WHERE Item_Name = '$_SESSION[checkout2]'");
		$results3 = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['res'] = $results3['Requested'];
	}		
	
	else if(isset($_GET['check_items_requested'])) {
		$_SESSION['itemN'] = 1;
		echo '<p style="margin-left: 25%">Item #1</p>';
		displayTable();
		$_SESSION['checkout2'] = $results['Item_Name'];
		$sql = $con -> query("SELECT Requested FROM items WHERE Item_Name = '$_SESSION[checkout2]'");
		$results3 = $sql -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['res'] = $results3['Requested'];
	}		
	
	else {
		echo '<p style="margin-left: 25%">Item #1</p>';
		displayTable();
		$_SESSION['checkout2'] = $results['Item_Name'];
	}
	
	if(sizeof($results) == 0) {
		echo '<div style="margin-bottom: 21%"></div>';
	}
?>

<form action='checkout.php' method='post'>
	<center><input style='margin-right: 1%' name='checkout2' type="submit" value="Checkout Item" <?php if(sizeof($results) == 0 || (isset($_SESSION['num']) && $_SESSION['num'] >= 3) && !(isset($_GET['check_items_out']))) {echo 'disabled';} else if(isset($_GET['check_items_out'])) {echo 'hidden';} else if($results['Status'] == 'Out') {echo 'disabled';} ?>></input>
</form>

<form action='checkout.php' method='post' style='display: inline'>
	<input name='request' type="submit" value="Request Item" <?php if(sizeof($results) == 0 || $_SESSION['res'] == 'Yes') {echo 'disabled';} else if(isset($_GET['check_items_out']) || isset($_GET['check_items_requested'])) {echo 'hidden';}?>></input>	
</form>

<?php
	if(isset($_GET['check_items_requested'])) {
		echo '<form action="cancelRequest.php" method="post" style="display: inline">';
			echo "<input name='cancel' type='submit' value='Cancel Request' style='display: inline; margin-left: 1%; margin-right: 1.5%'></input>";
			
			$sql = $con -> query("SELECT items_Requested FROM useraccounts WHERE username = '$_SESSION[username]'");
			$item = $sql -> fetch(PDO::FETCH_ASSOC); 
			if($item['items_Requested'] > 1) {
				echo "<input name='next' type='submit' value='Next Page' style='display: inline'></input>";
			}
		echo '</form>';
	}

	if(isset($_GET['check_items_out'])) {
		echo "<form action='check-in.php' method='post'>";
			echo "<input name='checkIn' type='submit' value='Check-in Item' style='display: inline; margin-right: 1.5%'></input>";
			
			$sql = $con -> query("SELECT renewed FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
			$item = $sql -> fetch(PDO::FETCH_ASSOC); 
			$renewed = $item['renewed'];
			if($renewed == "No") {
				echo "<input name='renew' type='submit' value='Renew Item' style='display: inline; margin-right: 1.5%'></input>";
			}
			
			$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'");
			$item = $sql -> fetch(PDO::FETCH_ASSOC); 
			if($item['items_Out'] > 1) {
				echo "<input name='next' type='submit' value='Next Page' style='display: inline'></input>";
			}
		echo "</form>";
	}
	echo '</center>';
	echo '<div style="margin-bottom: 4%"></div>';
	include("footer.htm");
?>