<?php 
	session_start();
	include("body.htm");
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	$sql = $con -> query("UPDATE items SET Status = 'Available' WHERE Item_Name = '$_SESSION[checkout2]'"); # item becomes available 
	$sql = $con -> query("SELECT items_Out FROM useraccounts WHERE username = '$_SESSION[username]'"); # retrieve current number of items out 
	$items_Out1 = $sql -> fetch(PDO::FETCH_ASSOC); # fetch and assign value to variable 
	$out = $items_Out1['items_Out'];
	$out--;
	$sql = $con -> query("UPDATE useraccounts SET items_Out = '$out' WHERE username = '$_SESSION[username]'");
	echo '<center><h2>Return processed, thank you.</h2></center>';
	echo '<div style="margin-bottom: 33%"></div>';
	include("footer.htm");
?>