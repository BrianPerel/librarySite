<?php 

	$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');

	# Upload image for pre-set user account 'bperel'
	try {
		$image = 'images/Pitt.jpg';
		
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
	
	$sql = $con -> query("UPDATE useraccounts SET profile_Photo = '$imgLink' WHERE username = 'user1'");
	
	
	
	# Upload image for pre-set admin user 'Mr. X'
	try {
		$image = 'images/admin.png';
		
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE admin SET admin_Profile_Photo = '$imgLink' WHERE username = 'Mr. X'");

	
	# Upload image for item 
	try {
		$image = 'images/learnRussian.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'Learn Russian - Русский язык'");
	
	# Upload image for item 
	try {
		$image = 'images/Aikido.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'Aikido'");
	
	# Upload image for item 
	try {
		$image = 'images/Business.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'Business Data Networks & Security'");
	
	# Upload image for item 
	try {
		$image = 'images/Ninja.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'The Art of Being a Ninja'");
	
	# Upload image for item 
	try {
		$image = 'images/No_Excuses.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'No Excuses - The Power of self discipline'");
	
	# Upload image for item 
	try {
		$image = 'images/Rock_Climbing1.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'Rock Climber Pro 2'");
	
	# Upload image for item 
	try {
		$image = 'images/Rock_Climbing2.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'Rock Climbing'");
	
	# Upload image for item 
	try {
		$image = 'images/Wild_Hunt.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'Wild Hunt'");
	
	# Upload image for item 
	try {
		$image = 'images/Calisthenics.jpg';
		$openimg = fopen($image, "r"); # open file in read mode 
		$data = fread($openimg, filesize($image)); # read content of file and its size to variable data 
		$pvars = array("image" => base64_encode($data)); # proper encoding type for sending image 
		$icurl = curl_init(); # begin curl session 

		# using imagebb API key 
		curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site 
	
		curl_setopt($icurl, CURLOPT_HEADER, false); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POST, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true); # set an option for a cURL transfer
		curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars); # set an option for a cURL transfer
		$upload = curl_exec($icurl); # execute curl 
		curl_close($icurl); # close curl session 
		
		$imgJSON = json_decode($upload);
		$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
	}
	catch(Exception $e) {
		echo $e -> getMessage();		
	}
	
	$sql = $con -> query("UPDATE items SET photo = '$imgLink' WHERE Item_Name = 'Calisthenics Beasts'");
	
	
	echo 'Images uploaded successfully';
?>

