<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<?php
		session_start();
		$con = new PDO('mysql:host = localhost:3306;dbname = librarySite;charset = utf8mb4', 'root');
		$Item_Name = 'The Art of Being a Ninja';
		$sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$Item_Name'");
		try {
			$result = $sql -> fetchAll(PDO::FETCH_ASSOC);
		}
		catch(Exception $e) {
			echo $e -> getMessage();
		}
		
	/*	echo '<table>';
		echo '<tr><td><h3>' . $Item_Name . '</h3></td></tr>';
		echo '<tr><td>' . $results[$i] . '</td></tr>';
		echo '</table>'; */
		
	/*	if ($results == 0) {
			echo 'Item not found';
		}*/
	?>
</body>

</html>