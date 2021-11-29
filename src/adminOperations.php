<!-- Purpose of webpage: display and perform administrative operations which are adding and deleting items from db -->

<?php 
	include("../includes/body.htm");
	echo '<title>Admin Operation | HWL</title>';
	echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
?>

<!-- Ajax Script = used to drop items from db without reloading page, dynamically --> 
<script>
function post() {
	var request = new XMLHttpRequest(); // create XMLHttpRequest object 
	request.open("POST", "deleteItem.php", true); // open deleteItem.php with post action and asynchronous request mode 
	
	// function to print response if readyState (4 = request finished and response is ready), status (200 = OK)
	request.onreadystatechange = function() { 
		if(this.readyState === 4 && this.status === 200) {
			document.write(this.responseText);
		}
	};
	
	request.send(new FormData(document.getElementById("myForm"))); // create form data object and send ajax request  
}

// check if enter key is hit call post() above. This allows user to either hit enter or click submit   
function memSort(e) {
	var key = e.keyCode || e.which;
	if(key == 13) {
		post();
	}
}
</script>
<div style="overflow-y: auto;">
<?php
	# use Ajax to post form data to php file deleteItem, to delete an item from database. If delete option is clicked from myAdminAccount.php go here 
	if(isset($_POST['deleteItem']) || isset($_GET['delMessage'])) { ?>
		<h3>Delete item from library database</h3>
		<form id="myForm" autocomplete="off" style='background-color: #DCDCDC'>
		Name of item to be deleted: <input autofocus required name="name" type="text" size="40" placeholder="Item Name" id="name" onkeypress='memSort(event)'></input>
		&nbsp;&nbsp;<button type="button" onclick="post()">Submit</button>		<!-- NEED TO CLICK ENTER BUTTON WITH MOUSE --> 
		</form>

		<?php if(isset($_GET['delMessage'])) { echo $_GET['delMessage']; }
		echo "<div style='margin-bottom: 22%'></div>";
	}
	
	# if add item option is chosen from myAdminAccount.php go here 
	if(isset($_POST['addItem'])) {
		echo '<center><h3>Add item to library database</h3>';
		
		echo "<form action='addItem.php' action='POST' style='border: solid 0.1px; margin: 1% 35% 1% 35%; padding: 2% 0% 2% 0%; background-color: #DCDCDC' autocomplete='off'>";
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
			echo '<textarea name="summary" type="text" placeholder="Summary" rows="3" cols="30" required></textarea><br><br>'; 
			
			echo '<label>Item Type: </label><br>';
			echo '<input name="item_type" type="text" placeholder="Item Type" required></input><br><br>'; 
			
			echo '<label>Col. Number: </label><br>';
			echo '<input name="col_no" type="text" placeholder="Col. Number" required></input><br><br>'; 
			
			echo '<label>Price: </label><br>';
			echo '<input name="price" type="text" placeholder="Price ($)" required></input><br><br>'; 
			
			echo '<br><label style="margin-left: 5%">Profile Picture (Optional):&nbsp;</label>';
			echo '<input type = "file" name="bookPhoto" autocomplete="off" style="margin-left: 25%"><br><br><br>';

			echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
		echo "</form>";		
	}	
	
	# if add message recieved from addItem.php go here 
	if(isset($_GET['addMessage'])) {
		echo '<center><h3>Add item to library database</h3>';
		
		echo "<form action='addItem.php' action='POST' style='border: solid 0.1px; margin: 1% 35% 1% 35%; padding: 2% 0% 2% 0%; background-color: #DCDCDC' autocomplete='off'>";
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
			echo '<textarea name="summary" type="text" placeholder="Summary" rows="3" cols="30" required></textarea><br><br>'; 
			
			echo '<label>Item Type: </label><br>';
			echo '<input name="item_type" type="text" placeholder="Item Type" required></input><br><br>'; 
			
			echo '<label>Col. Number: </label><br>';
			echo '<input name="col_no" type="text" placeholder="Col. Number" required></input><br><br>'; 
			
			echo '<label>Price: </label><br>';
			echo '<input name="price" type="text" placeholder="Price ($)" required></input><br><br>'; 
			
			echo '<br><label style="margin-left: 5%">Profile Picture (Optional):&nbsp;</label>';
			echo '<input type = "file" name="bookPhoto" autocomplete="off" style="margin-left: 25%"><br><br><br>';

			echo '&nbsp;&nbsp;<button type="submit">Submit</button>';
		echo "</form>";
		
		echo $_GET['addMessage'];
	}
	
	include("../includes/footer2.htm");
?>				
</div>