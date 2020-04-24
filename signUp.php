<!--
Purpose of program: 
prompt user to fill out sign up form, once filled out send the data form
to addUser.php so that it can be added to the library database.
-->

<?php 
	include("body.htm");
	echo '<title>Sign up | HWL</title>';
	echo '<div class="create"><center>';
	echo '<h3>Create your account</h3>';
	echo '<p>Join the network</p>';
	
	echo '<form style="border: solid 0.1px; margin: 1% 30% 1% 30%; padding: 2% 0% 2% 0%" action="addUser.php" method="POST" enctype="multipart/form-data" autocomplete="off">';
	
		echo '<label>Username:</label><br>';
		echo '<input autofocus type="text" name="username" placeholder="Username" size="32" required></input><br><br>';
		
		echo '<label>Email:</label><br>';
		echo '<input type="email" name="email" placeholder="name@domain.com" size="32" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></input><br><br>';
		
		echo '<label>Password: (8 Characters)</label><br>';
		echo '<input type="text" name="password" placeholder="Password" size="32" pattern=".{8,}" required></input><br><br>';
		
		echo '<label>Full Name: (example: John Doe)</label><br>';
		echo '<input type="text" name="fname" placeholder="Full Name" size="32" pattern="^(\w\w+)\s(\w+)$" required></input><br><br>';
		
		echo '<label>Phone Number:</label><br>';
		echo "<input type='tel' name='pNum' placeholder='111-222-3333' size='32' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' maxlength='12' required></input><br><br><br>";
		
		echo '<label style="margin-left: 10%">Profile Picture (Optional):&nbsp;</label>';
		echo '<input type = "file" name="InternPhoto" autocomplete="off"><br>';
		
		echo '<br><p>By creating an account, you agree to the terms of service</p>';
		
		echo '<label for="terms">Agree to terms: </label>';
		echo' <input type="checkbox" name="terms" value="terms" required><br><br>';
		
		echo '<div class="g-recaptcha" data-sitekey="6LflseQUAAAAAPX0WpXXBIO-rZ_zPwkvrXenB4gr"></div><br>';
		
		echo '<input type="submit">';

	echo '</form></center>';
	echo '</div>';
	
	# print invalid login message upon failed login
	if(isset($_GET['signUpError'])) {
		echo '<center>' . $_GET['signUpError'] . '</center>';
	}

	include("footer.htm");
?> 