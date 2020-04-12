<?php 
	session_start();
	include("body.htm");
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
	$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'"); # retrieve current number of items out 
	$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC); # fetch and assign value to variable 
	$out = $items_Out1['items_Out'];
	$out--;
	
	$sql = $con -> query("UPDATE useraccounts SET items_Out = '$out' WHERE username = '$_SESSION[username]'");
	
	$sql = $con -> query("SELECT item_Name FROM itemsout WHERE item_Holder = '$_SESSION[username]'"); # retrieve current number of items out 
	$items = $sql -> fetch(PDO::FETCH_ASSOC); # fetch and assign value to variable 
	$item_name = $items['item_Name'];
	$sql = $con -> query("UPDATE items SET Status = 'Available' WHERE Item_Name = '$item_name'"); # item becomes available 
	$sql = $con -> query("DELETE FROM itemsout WHERE Item_Name = '$item_name'"); # item becomes available 
	echo '<center><h2>Return processed, thank you.</h2></center>';
	echo '<div style="margin-bottom: 32%"></div>';
	include("footer.htm");
?>