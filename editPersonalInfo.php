<!--
Purpose of webpage: display edit account form 
-->

<?php
	include("body.htm");
	echo '<title>Edit Account | HWL</title>';
	echo '<meta http-equiv="refresh" content="120; url=logout.php">';
	echo '<script>window.addEventListener(onload, switchNav())</script>';
	
	# display error message if nothing was filled out 
	if(isset($_GET['$changeErr'])) {
		echo $_GET['$err'];
	}
?>

<center><h3>Edit My Personal Information: <br> (leave field blank if you don't want to change it)</h3>

<form class="example" action="editAccount.php" method="post" style="max-width:350px; border: solid black 0.5px" enctype="multipart/form-data">
	<div class='move'>
		<br><input type="text" name="password" placeholder="New Password..." size="30" pattern=".{8,}" autocomplete='off' autofocus></input><br><br><br>
		<input type="text" name="email" placeholder="New Email..." size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocomplete='off'></input><br><br><br>
		<input type="text" name="phone_number" placeholder="New Phone Number..." pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" size="30" autocomplete='off' maxlength='12'></input><br><br><br>
		
		<br><label>Upload Profile Picture&nbsp;</label><br><br>
		<input style='margin-left: 25%' type="file" name="photo" autocomplete='off'></input><br><br>
	</div>
	<input type="submit" value="Change"/><br><br>
</form>

<?php if(isset($_GET['changed'])) echo '<div id="logout">' . $_GET['changed'] . ' </div>';
	echo '<script>window.addEventListener(onload, myFunction())</script>';
	echo '</center>';
include("footer.htm");?>