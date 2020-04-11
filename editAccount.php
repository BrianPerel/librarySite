<?php 
	session_start();
	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
	
	if($_POST['password'] != '') {
		$sql = $con -> query("UPDATE useraccounts SET password='$_POST[password]' WHERE username = '$_SESSION[username]'");
	}
	
	if($_POST['email'] != '') {
		$sql = $con -> query("UPDATE useraccounts SET email='$_POST[email]' WHERE username = '$_SESSION[username]'");
	}
	
	if($_POST['phone_number'] != '') {
		$sql = $con -> query("UPDATE useraccounts SET phone_Number='$_POST[phone_number]' WHERE username = '$_SESSION[username]'");
	}
	
	if($_POST['photo'] != '') {
		try {
			$image = 'images/' . $_POST['photo'];
			
			$openimg = fopen($image, "r"); # open file in read mode 
			$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
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
		}
		catch(Exception $e) {
			echo $e -> getMessage();		
		}
		
		$sql = $con -> query("UPDATE useraccounts SET profile_Photo = '$imgLink' WHERE username = '$_SESSION[username]'");
	}
	
	$message = urlencode("<p>Your account information has been updated</p>");
	header("Location: editPersonalInfo.php?changed=" . $message);
?>