<?php 
	include("body.htm");
	echo '<title>Home | HWL</title>';
	echo '<body onload="startTimer()">';
	session_start();
	
	# if regular user account is logged in switch nav links 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}
	
	# if admin user account is logged in switch admin nav links 
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true) { 
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
	}
	
	# we want to logout the user after they have closed the website, so we track inactivity on the website 
	define("TIME_INACTIVE", 1800); // 30 mins = 1800 secs. Created a constant variable 
	if(!isset($_SESSION['timeout'])) {
		$_SESSION['timeout'] = time() + TIME_INACTIVE; 
	} else {
		$session_life = time() - $_SESSION['timeout'];
	}
	
	if(isset($session_life) && $session_life > TIME_INACTIVE) { 
		session_destroy(); 
		session_start();     
	}

	$_SESSION['timeout'] = time();
?>
<div class="class3">	
	<div class="row">
		<div class="col-sm-12">
			<form class="example" action="itemSearch.php" method="post" style="margin:auto;max-width:395px">
				<input class="form-control" autofocus type="text" placeholder="Search the library's catalog..." name="item_name" autocomplete='off' required style="float: left"></input>
				<button type="submit" class="btn btn-default" style="padding: 1.5% 0% 1.5% 0%; border-radius: 0%"><span class="glyphicon glyphicon-search"></span> Search</button>
			</form>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12 justify-content-center">
			<div style="margin: 0% 3% 0% 3%">
			<br><br>Search by letter: <a href='letterFind.php?by=A'>A</a> | <a href='letterFind.php?by=B'>B</a> | <a href='letterFind.php?by=C'>C</a> | <a href='letterFind.php?by=D'>D</a>
			| <a href='letterFind.php?by=E'>E</a> | <a href='letterFind.php?by=F'>F</a> | <a href='letterFind.php?by=G'>G</a>
			| <a href='letterFind.php?by=H'>H</a> | <a href='letterFind.php?by=I'>I</a> | <a href='letterFind.php?by=J'>J</a> 
			| <a href='letterFind.php?by=K'>K</a> | <a href='letterFind.php?by=L'>L</a> | <a href='letterFind.php?by=M'>M</a> 
			| <a href='letterFind.php?by=N'>N</a> | <a href='letterFind.php?by=O'>O</a> | <a href='letterFind.php?by=P'>P</a> 
			| <a href='letterFind.php?by=Q'>Q</a> | <a href='letterFind.php?by=R'>R</a> | <a href='letterFind.php?by=S'>S</a>
			| <a href='letterFind.php?by=T'>T</a> | <a href='letterFind.php?by=U'>U</a> | <a href='letterFind.php?by=V'>V</a>
			| <a href='letterFind.php?by=W'>W</a> | <a href='letterFind.php?by=X'>X</a> | <a href='letterFind.php?by=Y'>Y</a>
			| <a href='letterFind.php?by=Z'>Z</a>
			</div>
		</div>
	</div>

	<div class="row" id="BodyText">
		<div class="col-sm-7">
			<p><br>Welcome to FSU's library portal. Sign up to create an account or sign in to get to<br> your existing account. Search the library's inventory to
			find what your looking for.<br> Our inventory contains books, movies,  ebooks, and video games. Once the item <br>is found, you can check it out.
			If returning the item, check it back into the system.<br><br> The Henry Whitemore Library is FSU's library built in 1969. It's a 7 story building<br> containing a print shop, copy center,
			classrooms, communication arts<br> and music departments, study rooms, public use computers, and the<br> IT center. Come and enjoy a quite place to study or work with friends.<br>
			At the library enjoy art history of the library, college, and McAuliffe center.</p>
		</div>
	
		<div class="col-sm-5">
			<img src="images/6.jpg" id="pic1" width="150px" height="150px" style='float: right'>
			<img src="images/2.png" id="pic1" width="150px" height="150px" style='display: inline; float: right' id='picRight'><br>
		</div>
	</div>
	
	<!--id='switch'-->
	<div class="row">
		<div class="col-sm-8">
			<img src='images/fsu.jpg' class="img-thumbnail" width='650px' height='600px'/><br><br>
		</div>
		
		<div class="col-sm-3">
			<iframe class="img-thumbnail" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2951.0640653227806!2d-71.4352319!3d42.2984984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e389a9351c81eb%3A0xe6ea3c8be37e9068!2sHenry%20Whittemore%20Library!5e0!3m2!1sen!2sus!4v1583264360102!5m2!1sen!2sus" frameborder="0" style="border:0;" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			<img class="img-thumbnail" src="images/5.jpg" width="400" height="300"></img>
		</div>
	</div>
	
	<div class="row"> 
		<div class="col-sm-12">
			<br><br><br><br><p id="contact2"><b>Location:</b> 100 State Street Framingham, MA 01701</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<p><b>Phone:</b> (111) - 222 - 3344</p>
		</div>
	</div>
		
	<div class="container"><center>
		<table class="table table-bordered table-secondary">
			<thead>
				<tr>
					<th>Day</th>
					<th>Hours</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Sunday</td>
					<td>1PM - 1AM</td>
				</tr>
				<tr>
					<td>Monday</td>
					<td>7:30AM - 5PM</td>
				</tr> 
				<tr>
					<td>Tuesday</td>
					<td>7:30AM - 1AM</td>
				</tr>
				<tr>
					<td>Wednesday</td>
					<td>7:30AM - 1AM</td>
				</tr>
				<tr>
					<td>Thursday</td>
					<td>7:30AM - 1AM</td>
				</tr>
				<tr>
					<td>Friday</td>
					<td>7:30AM - 5PM</td>
				</tr>
				<tr>
					<td>Saturday</td>
					<td>9AM - 5PM</td>
				</tr>
			</tbody>
		</table></center>
	</div>
	
</div>

	<div class="row">
		<div class="col-sm-12">
			<br><br><p>Follow Us:</p>
		</div>
	</div>
	
	<a class="fa fa-facebook" href="https://www.facebook.com/whittemorelib/" target="_blank"></a>
	<a class="fa fa-instagram" style="padding-right: 3%" href="https://www.instagram.com/framinghamstateu/" target="_blank"></a>
	<a class="fa fa-twitter" style="padding-left: 1%" href="https://twitter.com/whittemorelib?lang=en" target="_blank"></a>
	<a class="fa fa-pinterest" style="padding-left: 1%" href="https://www.pinterest.com/pin/243616661067870491/" target="_blank"></a>

	<div class="row">
		<div class="col-sm-12"><br><a href="#top">Back to top</a> &#x2191;</div>
		<div class="col-sm-12"><button type="button" style='float: right; padding: 0.5% 0.5% 0.5% 0.5%; margin-right: 0.1%'><a href='adminLogin.php'>Admin Login</a></button></div>
	</div>
		
<?php include("footer.htm"); ?>