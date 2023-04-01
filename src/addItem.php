<!--
Purpose of webpage: Process filled out add item page received from adminOperations.php; check if account
with that information already exists (prevent duplicate account creation), upload file given to imagebb
for image storage using curl cmd if user attached image, else chose default. Insert all post data
along with image into new record in items table and return message to adminOperations.php
-->

<?php
	require_once("../includes/connect_db.php");

	$sql = $con -> query("SELECT * FROM items WHERE item_name = '$_REQUEST[item_name]'");
	$results = $sql -> fetchAll(PDO::FETCH_ASSOC);
	$item = $_REQUEST['item_name'];

	if(!empty($results)) {
		$message = "<p style='color: red'>Could not add the item as it already exists in our database</p>";
	}
	else {
		# if size of photo upload file is 0, then this indicates that user didn't upload anything. So upload default image
		if($_FILES['bookPhoto']['size'] == 0) {
			$imgLink = "../images/default-book-picture.png";
		}
		else {
			# upload photo to db user account. Curl allows us to send requests to a server
			$img = $_FILES['bookPhoto']; # access file uploaded to submitted form
			$filename = $img['tmp_name']; # access $img object attribute need variable name used
			$openimg = fopen($filename, "r"); # open file in read mode
			$data = fread($openimg, filesize($filename)); # read content of file and its size to variable data
			$pvars = array("image" => base64_encode($data)); #this array is the POST data for the curl / base64 encoding lets you read data like image pixels correctly across the server without corruption of data
			$icurl = curl_init(); # begin curl cmd

			# using imagebb API key
			curl_setopt($icurl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=94d704f859c00d48f65cb46a87875a09'); # use api to store image on imagebb site
			curl_setopt($icurl, CURLOPT_HEADER, false);
			curl_setopt($icurl, CURLOPT_POST, true);
			curl_setopt($icurl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($icurl, CURLOPT_POSTFIELDS, $pvars);
			$upload = curl_exec($icurl); # execute curl cmd
			curl_close($icurl); # close curl cmd
			$imgJSON = json_decode($upload);
			$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload
		}

		# final step, insert all post data along with image
		$sql = $con -> query("INSERT INTO items (item_name, author, ISBN, publication_info, year_of_release, general_audience, summary, item_type, col_no, status, location, price, requested, item_photo)
		VALUES ('$_REQUEST[item_name]', '$_REQUEST[author]', '$_REQUEST[ISBN]', '$_REQUEST[pub_info]', '$_REQUEST[year_released]', '$_REQUEST[gen_aud]', '$_REQUEST[summary]', '$_REQUEST[item_type]',
		'$_REQUEST[col_no]', 'Available', 'Framingham State University', '$_REQUEST[price]', 'No', '$imgLink')");

		$message = "<p>Item '$item' Added Successfully</p>"; # create successful db insertion message
	}

	header("Location: adminOperations.php?addMessage=$message"); # return to original page with message
?>