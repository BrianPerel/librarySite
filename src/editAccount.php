<!-- 
Purpose of webpage: edit user's account info received from form page
-->

<?php 
	session_start();
	require("../includes/connect_db.php");
	echo '<script>window.addEventListener(onload, switchNav())</script>';
	
	# do a db search to check: if any existing records match info recieved from signUp form, assign response to variable 
	$insert_check = $con -> query("SELECT * FROM user_accounts WHERE email = '$_POST[email]' 
	OR password = '$_POST[password]' OR phone_number = '$_POST[phone_number]'");	

	# if duplicate account found, return error 
	if($insert_check -> rowcount() > 0) {
		$err = urlencode('<br><p style="color: red">Error Creating the Account! An account with that information already exists</p>');
		header("Location: editPersonalInfo.php?changeErr=$err");
		die;
	}
	
	# if password field is not empty do this 
	if(!empty($_POST['password'])) {
		$sql = $con -> query("UPDATE user_accounts SET password='$_POST[password]' WHERE username = '$_SESSION[username]'");
	}
	
	# if email field is not empty do this 
	if(!empty($_POST['email'])) {
		$sql = $con -> query("UPDATE user_accounts SET email='$_POST[email]' WHERE username = '$_SESSION[username]'");
	}
	
	# if phone number field is not empty do this 
	if(!empty($_POST['phone_number'])) {
		$sql = $con -> query("UPDATE user_accounts SET phone_number='$_POST[phone_number]' WHERE username = '$_SESSION[username]'");
	}
		
	# if photo field is not empty do this 
	if($_FILES['photo']['size'] > 0) {
		$img = $_FILES['photo']; # access file uploaded to submitted form 
		$filename = $img['tmp_name']; # access $img object attribute need variable name used 
		$openimg = fopen($filename, "r"); # open file in read mode 
		$data = fread($openimg, filesize($filename)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data));
		$icurl = curl_init(); # begin curl cmd 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
		curl_setopt($icurl, CURLOPT_HEADER, false);
		curl_setopt($icurl, CURLOPT_POST, true);
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars);
		$upload = curl_exec($icurl);
		curl_close($icurl); # close curl cmd 
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 	
		
		$sql = $con -> query("UPDATE user_accounts SET user_photo = '$imgLink' WHERE username = '$_SESSION[username]'");
	}
	
	# if all fields were empty send message back that no info was given 
	if(empty($_POST['password']) && empty($_POST['email']) && empty($_POST['phone_number']) && $_FILES['photo']['size'] <= 0) {
		$message = urlencode("<p style='color: red'>No information was given to change, please enter new information</p>");
		header("Location: editPersonalInfo.php?changed=$message");
	} else {
		# success message return 
		$message = urlencode("<p>Your account information has been updated</p>");
		header("Location: editPersonalInfo.php?changed=$message");
	}
?>