<!--
Purpose of webpage: display edit account form
-->

<?php
	include("../includes/body.htm");
	echo '<title>Edit Account | HWL</title>';
	echo '<meta http-equiv="refresh" content="120; url=logout.php">';
	echo '<script>window.addEventListener(onload, switchNav())</script>';

	# display error message if nothing was filled out
	if(isset($_GET['$changeErr'])) {
		echo "<br>$_GET[$err]";
	}
?>

<center><h3>Edit My Personal Information: <br> (leave field blank if you don't want to change it)</h3><br>

<form class="form" action="editAccount.php" method="post" style="border: solid black 0.5px; width: 60%; padding: 3%; background-color: #DCDCDC" enctype="multipart/form-data">
	<label>New Password</label>
	<input class="form-control" type="text" name="password" placeholder="New Password..." size="30" autocomplete='off' autofocus></input><br><br>
	<label>New Email</label>
	<input class="form-control" type="text" name="email" placeholder="New Email..." size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocomplete='off'></input><br><br>
	<label>New Phone Number</label>
	<input class="form-control" type="text" name="phone_number" placeholder="New Phone Number..." pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" size="30" autocomplete='off' maxlength='12'></input><br><br>
	<label>Upload Profile Picture&nbsp;</label><br>
	<input class="form-control" type="file" name="photo" autocomplete='off' style="padding-bottom: 5%" id="chose"></input><br>
	<input class="btn btn-primary" type="submit" value="Change"/><br><br>
</form>

<?php
	if(isset($_GET['changed'])) {
		echo "<br><div id='logout'>$_GET[changed]</div>";
	}

	echo '<script>window.addEventListener(onload, hideLogoutMessage())</script></center>';
	include("../includes/footer2.htm");
?>