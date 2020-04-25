<?php
	include("body.htm");
	echo '<title>Sign in | HWL</title>';
	echo '<meta http-equiv="refresh" content="120; url=expireSession.php">';
	session_start();
	
	echo '<script>window.addEventListener(onload, switchNav())</script>';
?>

<center><h3>Edit My Personal Information: <br> (leave field blank if you don't want to change it)</h3>

<form class="example" action="editAccount.php" method="post" style="max-width:350px; border: solid black 0.5px">
	<div class='move'>
		<br><input type="text" name="password" placeholder="New Password..." size="30" autocomplete='off'></input><br><br><br>
		<input type="text" name="email" placeholder="New Email..." size="30" autocomplete='off'></input><br><br><br>
		<input type="text" name="phone_number" placeholder="New Phone Number..." size="30" autocomplete='off' maxlength='12'></input><br><br><br>
		
		<br><label>Upload Profile Picture&nbsp;</label><br><br>
		<input style='margin-left: 25%' type = "file" name="photo" autocomplete='off'></input><br><br><br>
	</div>
	<input type="submit" value="Change"><br><br>
</form>

<?php 
	if(isset($_GET['changed'])) {
		echo '<div id="logout">' . $_GET['changed'] . ' </div>';
	}
?>
</center>
<?php 
	include("footer.htm");
?>