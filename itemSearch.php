<?php
	session_start(); # need session to save item_name to session in order to pass it into another file 
	include("body.htm");
	echo '<title>Search | HWL</title>';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');

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
		$sql = $con -> query("SELECT * FROM itemsout");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_POST['item_name'] = $results['item_Name']; 
	}
	
	if(isset($_GET['check_items_requested'])) {
		$sql = $con -> query("SELECT requested_itemName FROM useraccounts WHERE username = '$_SESSION[username]'");
		$results = $sql -> fetch(PDO::FETCH_ASSOC);
		$_POST['item_name'] = $results['requested_itemName']; 
		$_SESSION['flag'] = true;
	}
	
	/*	if($_SESSION['A_Zitem_name'] != '') {
		$_POST['item_name'] = $_SESSION['A_Zitem_name'];
	}*/
	
	$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[item_name]'");
	$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	
	if(sizeof($results) > 0) {
		$photo = $results[0]['photo'];
	}
	
	echo '<h2 align=center>Search results ' . sizeof($results) . '  for: \'' . $_POST['item_name'] . '\' </h2>';
?>
	
<br><center><img src="<?php echo $photo; ?>" <?php if(sizeof($results) == 0) { echo 'style="display: none"'; }?> width='250' height='230' alt='profile picture'/></center>
	
<?php 
	if(sizeof($results)== 0) {
		echo '<center>No items match your search</center><div style="margin-bottom: 24%"></div>';
	}
	
	if(isset($_GET['check_items_out'])) {
		for($i = 0; $i < sizeof($results); $i++) {
			$num = $i + 1;
			echo '<p style="margin-left: 25%">Item #' . $num . '</p>';
			
			echo '<table align="center" width="50%" height="120%" border=solid black 1px>';
			echo '<tr><td>' . 'Title: ' . $results[$i]['Item_Name'] . '</td></tr>';
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
			echo '</table><br><br>';
			
			$sql = $con -> query("SELECT * FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
			$results2 = $sql -> fetchAll(PDO::FETCH_ASSOC);
			echo '<table align="center" width="50%" height="120%" border=solid black 1px>';
			echo '<tr><td>Date checked-out: ' . $results2[$i]['checkout_Date'] . '</td></tr>';
			echo '<tr><td>Days item has been out: ' . $results2[$i]['days_Out'] . '</td></tr>';
			echo '<tr><td>Due date: ' . $results2[$i]['due_Date'] . '</td></tr>';
			echo '<tr><td>Renewed: ' . $results2[$i]['renewed'] . '</td></tr>';
			echo '</table><br>';
		}		
	}
	
	else if(sizeof($results) > 0) {
		for($i = 0; $i < sizeof($results); $i++) {
			$num = $i + 1;
			echo '<p style="margin-left: 25%">Item #' . $num . '</p>';
			
			echo '<table align="center" width="50%" height="120%" border=solid black 1px>';
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
	<center><input style='margin-right: 1%' name='checkout2' type="submit" value="Checkout Item" <?php if(sizeof($results) == 0) {echo 'disabled';} else if(isset($_GET['check_items_out'])) {echo 'hidden';} else if($results[0]['Status'] == 'Out') {echo 'disabled';} ?>></input>
</form>

<form action='checkout.php' method='post' style='display: inline'>
	<input name='request' type="submit" value="Request Item" <?php if(sizeof($results) == 0) {echo 'disabled';} else if(isset($_GET['check_items_out']) || isset($_GET['check_items_requested'])) {echo 'hidden';}?>></input>	
</form>

<?php
	if(isset($_GET['check_items_requested'])) {
		echo '<form action="cancelRequest.php" method="post" style="display: inline">';
			echo "<input name='cancel' type='submit' value='Cancel Request'></input></center>";
		echo '</form>';
	}

	if(isset($_GET['check_items_out'])) {
		echo "<form action='check-in.php' method='post'>";
			echo "<center><input name='checkIn' type='submit' value='Check-in Item' style='display: inline; margin-right: 1.5%'></input>";
			
			$sql = $con -> query("SELECT renewed FROM itemsout WHERE item_Holder = '$_SESSION[username]'");
			$item = $sql -> fetch(PDO::FETCH_ASSOC); 
			$renewed = $item['renewed'];
			if($renewed == "No") {
				echo "<input name='renew' type='submit' value='Renew Item' style='display: inline'></input><center>";
			}
		echo "</form>";
	}
?>

<div style='margin-bottom: 4%'></div>

<?php
	include("footer.htm");
?>