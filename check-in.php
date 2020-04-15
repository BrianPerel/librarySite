<?php 
	session_start();
	include("body.htm");
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
	if(isset($_POST['checkIn'])) {
		$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'"); # retrieve current number of items out 
		$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC); 
		$out = $items_Out1['items_Out'];
		$out--;
		
		$sql = $con -> query("UPDATE useraccounts SET items_Out = '$out' WHERE username = '$_SESSION[username]'");
		$sql = $con -> query("SELECT item_Name FROM itemsout WHERE item_Holder = '$_SESSION[username]'"); # retrieve current number of items out 
		$items = $sql -> fetch(PDO::FETCH_ASSOC);
		$item_name = $items['item_Name'];
		$sql = $con -> query("UPDATE items SET Status = 'Available' WHERE Item_Name = '$item_name'"); # item becomes available 
		$sql = $con -> query("DELETE FROM itemsout WHERE Item_Name = '$item_name'"); # item becomes available 
		echo '<center><h2>Return processed, thank you.</h2></center>';
	}
	
	else {
		$sql = $con -> query("UPDATE itemsout SET renewed = 'Yes' WHERE item_Name = '$_SESSION[checkout2]'"); 
		$sql = $con -> query("SELECT due_Date FROM itemsout WHERE item_Name = '$_SESSION[checkout2]'");
		$item = $sql -> fetch(PDO::FETCH_ASSOC); 
		$due = $item['due_Date'];
		$due_day = ((int) ($due[3] . $due[4])) + 7; 
		$due_day = substr($due, 0, 3) . $due_day . substr($due, 5, 9);
		echo '<center><h2>Item renewed, new due date: ' . $due_day . '</h2></center>';
		$sql = $con -> query("UPDATE itemsout SET due_Date = '$due_day' WHERE item_Name = '$_SESSION[checkout2]'"); 
	}
	
	echo '<div style="margin-bottom: 32%"></div>';
	include("footer.htm");
?>