<!--
Purpose of webpage: to perform an advanced search of the library database
-->

<?php
	session_start();
	include_once("../includes/body.htm");
	echo '<title>Advanced Search | HWL</title>';

	# if regular user is logged in switch nav links
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}

	# if admin user is logged in switch nav links
	elseif(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}

	if(isset($_GET['emp'])) {
		echo $_GET['emp'];
	}
?>

<h3>Advanced Search</h3><br>
<center><form class="form justify-content-center" class="example" action="advSearchResults.php" method="post" style="border: solid black 0.5px; width: 60%; padding: 3%; background-color: #DCDCDC" autocomplete='off'>
		<label>Title:</label>
		<input class="form-control" autofocus type="text" name="Title" placeholder="Enter Title..." size="30"></input><br><br>
		<label>ISBN:</label>
		<input class="form-control" type="text" name="ISBN" placeholder="Enter ISBN Number..." size="30"></input><br><br>
		<label>Author:</label>
		<input class="form-control" type="text" name="Author" placeholder="Enter Author's Name..." size="30"></input><br><br>
		Year from:<input class="form-control" type="number" name="yearFrom" value='1900' min="1900" max="2020"></input><br><br>
		Year to:<input class="form-control" type="number" name="yearTo" value='2020' min="1900" max="2020"></input>

	<br><br><label required>Format:</label>
	  <select name="format" class="form-control">
		<option value="any">Any</option>
		<option value="book">book</option>
		<option value="ebook">ebook</option>
		<option value="cd">dvd</option>
		<option value="cd">blu-ray</option>
		<option value="cd">cd</option>
	</select><br><br>

	<label required>Location:</label>
	<select name="location" class="form-control">
	   <option value="any">All</option>
	   <option value="f">Framingham</option>
	   <option value="n">Natick</option>
	   <option value="n2">Newton</option>
	   <option value="a">Ashland</option>
	</select><br><br><br>
	<input class="btn btn-primary" type="submit"><br>
</form></center>

<?php include_once("../includes/footer2.htm")?>