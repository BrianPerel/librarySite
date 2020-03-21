<!DOCTYPE html>
<html>
<head>
</head>

<body>
			
	<h2 align=center>The Search Query <?php echo $_POST['item_name'];?> Resulted In:</h2>

	<?php
		session_start();
	    $con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	    $sql = $con -> query("SELECT * FROM items WHERE Item_Name = '$_POST[item_name]'");
		$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
		
		echo "<table align='center' width='150%' height='120%'>";
		
		for($i=0; $i<sizeof($results); $i++) {
			echo'<tr>';
				echo'<td>' . 'Book Name: ' . $results[$i]['Item_Name'] . '</td>';
			echo'</tr>';
			
			echo'<tr>';
				echo'<td>' . 'ISBN: ' . $results[$i]['ISBN'] . '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo'<td>' . 'Author: ' . $results[$i]['Author'] . '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo'<td>' . 'Item: ' . $results[$i]['Item_Type'] . '</td>';
			echo '</tr>';
			}
		echo"</table>";

	?>
</body>

</html>