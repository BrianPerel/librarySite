<!DOCTYPE html>

<html>
	<head>
		<title>Registration Completed | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/a.css">
		<link rel="stylesheet" href="images/favimages.css">	
	</head>
	
	<body>
		<center><div class="class1">
			<h2>Henry Whittemore Library</h2>
			<a href="index.php"><img src="images/1.jpg" alt="Smiley face" width="100px" height="70px" style="padding-top: 1%"></img></a>
			<h2>Inventory Management System</h2><br><br>
		</div>

		<div class="class2">
			<a href="index.php">Home</a>
			<a href="signIn.php">Sign-in</a>
			<a href="signUp.php">Sign-up</a>
			<a href="advSearch.php">Search</a>
			<a href="#BodyText">About</a>
			<a href="#contact">Contact Us</a>
			<a href="https://www.framingham.edu/" target="_blank">myFramingham.edu</a>
		</div>
		
		<?php 
			# below we create a PHP Data Object, $con gets the object values 
			$con = new PDO('mysql:host=localhost:3306;dbname=librarysite;charset=utf8mb4','root');
			# search check: if any existing records match info recieved from signUp form, assign response to variable 
			# '->' is an object feature, $con is object data type  
			$insert_check = $con -> query("SELECT * FROM useraccounts WHERE username = '$_POST[username]' OR email = '$_POST[email]' 
			OR password = '$_POST[password]' OR full_Name = '$_POST[fname]' OR phone_Number = '$_POST[pNum]'");
	
			/* split username taken from received form, scan through username and make sure every letter is alphabetic. 
			This is checked by ctype_alpha(). if not jump back to sign up page with error message */
			$username = str_split($_POST['username']); # use str_split() to split the post variable into char array
			for($i = 0; $i < sizeof($username); $i++) {
				if(ctype_alpha($username[$i]) == false) {
					$err1 = urlencode('<br><p style="color: red">Error Creating the Account! Answers provided are incorrect.</p>');
					header("Location: signUp.php?signUpError2=" . $err1);
					die; # terminate code (stop)
				}
			}
			
			# perform same above check on name input tag 
			$fname = str_split($_POST['fname']); # store size of fname in variable 
			for($i = 0; $i < sizeof($fname); $i++) {
				if(ctype_alpha($fname[$i]) == false) {
					$err1 = urlencode('<br><p style="color: red">Error Creating the Account! Answers provided are incorrect.</p>');
					header("Location: signUp.php?signUpError2=" . $err1);
					die;
				}
			}
	
			# full name requires 1 space (between first and last name), break at first occurence of space since we only need to find 1 space 
			$space = 0;
			for($i = 0; $i < sizeof($fname); $i++) {
				if(ctype_space($fname[$i]) == true) { # ctype_space() checks for whitespace 
					$space++;
					break;
				}
			}
			
			$_SESSION['space'] = $space;
			if($space == 0) {
				$err1 = urlencode('<br><p style="color: red">Error Creating the Account! Answers provided are incorrect.</p>');
				header("Location: signUp.php?signUpError2=" . $err1);
				die;
			}
		
			# if no accounts in db match info entered in sign up form 
			if($insert_check -> rowcount() > 0) {
				$err2 = urlencode('<br><p style="color: red">Error Creating the Account! An account with that information already exists</p>');
				header("Location: signUp.php?signUpError=" . $err2);
				die;
			}
			# insert data into table if no errors found and info doens't already exist in db 
			else {
				/* $_FILES can be thought of as a special type of $_POST (can only exist with enctype="multipart/formdata attribute").
				When you upload a file with enctype set, it is stored as a tmp file on the server
				until we go to another page*/
				$img = $_FILES['InternPhoto'];
				$filename = $img['tmp_name'];
				
				if($filename == '') {
					if(isset($_POST['g-recaptcha-response'])) $captcha=$_POST['g-recaptcha-response'];

					if(!$captcha){
						$err2 = '<p style="color: red">Please check the the captcha form.</p>';
						header('Location: signUp.php?err2=' . $err2);
						die;
					}
					
					$sql = $con -> query("INSERT INTO useraccounts (username, email, password, full_Name, phone_Number, items_Out, items_Requested, messages, profile_Photo) 
					VALUES ('$_POST[username]', '$_POST[email]', '$_POST[password]', '$_POST[fname]', '$_POST[pNum]', '0', '0', '0', '')");
				} else {
					# upload photo to db user account. Curl allows us to send requests to a server 
					try {
						$img = $_FILES['InternPhoto']; # access file uploaded to submitted form 
						$filename = $img['tmp_name'];
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
						$upload = curl_exec($icurl);
						curl_close($icurl); # close curl cmd 
						$imgJSON = json_decode($upload);
						$imgLink = $imgJSON -> data -> display_url;	# create variable with url from imagebb upload 			
					}
					catch(Exception $e) {
						echo $e -> getMessage();		
					}
					
					$sql = $con -> query("INSERT INTO useraccounts (username, email, password, full_Name, phone_Number, items_Out, items_Requested, messages, profile_Photo) 
					VALUES ('$_POST[username]', '$_POST[email]', '$_POST[password]', '$_POST[fname]', '$_POST[pNum]', '0', '0', '0', '$imgLink')");
				}
			}
		?>
		
		<center><h4 style='margin-bottom: 31%'>Thank you for joining our online library community. Enjoy access to thousands of movies, books, cd's, and ebook's.<br><br>
		<a href='signIn.php' ><u>Sign in here</u></a></h4></center>
		
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
		
	</body>
</html>