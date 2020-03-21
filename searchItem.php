<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<?php
		$con = new PDO('mysql:host = localhost:3306;dbname = librarySite;charset = utf8mb4', 'admin', 'Password');
		$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$Item_Name'");
		$results = $sql -> fetchAll(PDO::FETCH_ASSOC); 
		echo '<table>';
		echo '<tr><td><h3>' . $CompanyName . '</h3></td></tr>';
		echo '<tr><td>' . $results[$i] . '</td></tr>';
		echo '</table>';
	?>
</body>

</html>