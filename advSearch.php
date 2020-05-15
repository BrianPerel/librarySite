<!--
Purpose of webpage: perform an advanced search of library database 
-->

<?php 
	session_start();
	include("body.htm");
	echo '<title>Advanced Search | HWL</title>';
	
	# if regular user is logged in switch nav links 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}
	
	# if admin user is logged in switch nav links 
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true) { 
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
	}
?>

<center><h3>Advanced Search</h3>
	<form class="example" action="advSearchResults.php" method="post" style="max-width:350px; border: solid black 0.5px; background-color: #DCDCDC" autocomplete='off'>
		<div class='move'>
			<br><input autofocus type="text" name="Title" placeholder="Enter Title..." size="30" required></input><br><br><br>
			<input type="text" name="ISBN" placeholder="Enter ISBN Number..." size="30" required></input><br><br><br>
			<input type="text" name="Author" placeholder="Enter Author's Name..." size="30" required></input><br><br><br><br>
			Year from:<input type="number" name="yearFrom" value='1900' min="1900" max="2020" style="margin-left: 2%"></input><br><br>	
			Year to:<input type="number" name="yearTo" value='2020' min="1900" max="2020" style="margin-left: 2%"></input>
		</div>
		
		<label required>Format:</label>
		  <select name="format">
			<option value="any">Any</option>
			<option value="book">book</option>
			<option value="ebook">ebook</option>
			<option value="cd">dvd</option>
			<option value="cd">blu-ray</option>
			<option value="cd">cd</option>
		</select><br><br>
		  
		<label required>Location:</label>
		<select name="location">
		   <option value="any">All</option>
		   <option value="f">Framingham</option>
		   <option value="n">Natick</option>
		   <option value="n2">Newton</option>
		   <option value="a">Ashland</option>
		</select><br><br><br>
		<input type="submit"><br><br>
	</form>
</center>

<?php include("footer.htm");?>