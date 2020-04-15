<?php 
	session_start();
	include("body.htm");
	echo '<title>Admin Account | HWL</title>';
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	if(isset($_POST['deleteItem'])) {
		echo '<center><h3>Delete item from library database</h3>';
		
		echo "<form action='deleteItem.php' action='POST' style='border: solid 0.1px; margin: 1% 25% 1% 25%; padding: 2% 0% 2% 0%' autocomplete='off'>";
			echo 'Name of item to be deleted: <input name="item_name" type="text" size="40" placeholder="Item Name" autofocus required></input>'; 
			echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
		echo "</form>";
		
		echo "<div style='margin-bottom: 18%'></div>";
		
		echo '<br><button type="button" style="padding: 0.5% 0.5% 0.5% 0.5%; font-size: 14px"><a href="myAdminAccount.php">Return to Account Page</a></button></center>';

	}
	if(isset($_POST['addItem'])) {
		echo '<center><h3>Add item to library database</h3>';
		
		echo "<form action='addItem.php' action='POST' style='border: solid 0.1px; margin: 1% 35% 1% 35%; padding: 2% 0% 2% 0%' autocomplete='off'>";
			echo '<label>Item Name: </label><br>';
			echo '<input name="item_name" type="text" placeholder="Item Name" autofocus required></input><br><br>';
			
			echo '<label>Author: </label><br>';
			echo '<input name="author" type="text" placeholder="Author" required></input><br><br>'; 
			
			echo '<label>ISBN: </label><br>';
			echo '<input name="ISBN" type="number" placeholder="ISBN" required></input><br><br>'; 
			
			echo '<label>Publication Information: </label><br>';
			echo '<input name="pub_info" type="text" placeholder="Pub. Info" required></input><br><br>'; 
			
			echo '<label>Year Released: </label><br>';
			echo '<input name="year_released" type="number" placeholder="Year Released" required></input><br><br>'; 
			
			echo '<label>General Audience: </label><br>';
			echo '<input name="gen_aud" type="text" placeholder="Gen. Audience" required></input><br><br>'; 
						
			echo '<label>Summary: </label><br>';
			echo '<input name="summary" type="text" placeholder="Summary" required></input><br><br>'; 
			
			echo '<label>Item Type: </label><br>';
			echo '<input name="item_type" type="text" placeholder="Item Type" required></input><br><br>'; 
			
			echo '<label>Col. Number: </label><br>';
			echo '<input name="col_no" type="text" placeholder="Col. Number" required></input><br><br>'; 
			
			echo '<label>Price: </label><br>';
			echo '<input name="price" type="text" placeholder="Price ($)" required></input><br><br>'; 

			echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
		echo "</form>";
		
		echo '<br><button type="button" style="padding: 0.5% 0.5% 0.5% 0.5%; font-size: 14px"><a href="myAdminAccount.php">Return to Account Page</a></button></center>';
	}
	
	if(isset($_GET['delMessage'])) {
		echo '<center><h3>Delete item from library database</h3>';
		
		echo "<form action='deleteItem.php' action='POST' style='border: solid 0.1px; margin: 1% 25% 1% 25%; padding: 2% 0% 2% 0%' autocomplete='off'>";
			echo 'Name of item to be deleted: <input name="item_name" type="text" size="40" placeholder="Item Name" autofocus required></input>'; 
			echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
		echo "</form>";
		
		echo $_GET['delMessage'];
		
		echo "<div style='margin-bottom: 16%'></div>";
		
		echo '<br><button type="button" style="padding: 0.5% 0.5% 0.5% 0.5%; font-size: 14px"><a href="myAdminAccount.php">Return to Account Page</a></button></center>';
	}
	
	if(isset($_GET['addMessage'])) {
		echo '<center><h3>Add item to library database</h3>';
		
		echo "<form action='addItem.php' action='POST' style='border: solid 0.1px; margin: 1% 35% 1% 35%; padding: 2% 0% 2% 0%' autocomplete='off'>";
			echo '<label>Item Name: </label><br>';
			echo '<input name="item_name" type="text" placeholder="Item Name" autofocus required></input><br><br>';
			
			echo '<label>Author: </label><br>';
			echo '<input name="author" type="text" placeholder="Author" required></input><br><br>'; 
			
			echo '<label>ISBN: </label><br>';
			echo '<input name="ISBN" type="number" placeholder="ISBN" required></input><br><br>'; 
			
			echo '<label>Publication Information: </label><br>';
			echo '<input name="pub_info" type="text" placeholder="Pub. Info" required></input><br><br>'; 
			
			echo '<label>Year Released: </label><br>';
			echo '<input name="year_released" type="number" placeholder="Year Released" required></input><br><br>'; 
			
			echo '<label>General Audience: </label><br>';
			echo '<input name="gen_aud" type="text" placeholder="Gen. Audience" required></input><br><br>'; 
						
			echo '<label>Summary: </label><br>';
			echo '<input name="summary" type="text" placeholder="Summary" required></input><br><br>'; 
			
			echo '<label>Item Type: </label><br>';
			echo '<input name="item_type" type="text" placeholder="Item Type" required></input><br><br>'; 
			
			echo '<label>Col. Number: </label><br>';
			echo '<input name="col_no" type="text" placeholder="Col. Number" required></input><br><br>'; 
			
			echo '<label>Price: </label><br>';
			echo '<input name="price" type="text" placeholder="Price ($)" required></input><br><br>'; 

			echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
		echo "</form>";
		
		echo $_GET['addMessage'];
		
		echo '<br><button type="button" style="padding: 0.5% 0.5% 0.5% 0.5%; font-size: 14px"><a href="myAdminAccount.php">Return to Account Page</a></button></center>';
		
	}
	
	include("footer.htm");
?>				