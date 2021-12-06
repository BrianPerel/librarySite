<?php 
	include("../includes/body.htm");
	echo '<title>Home | HWL</title>';
	echo '<body onload="startTimer()">';
	session_start();
	
	# if regular user account is logged in switch nav links 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}
	
	# if admin user account is logged in switch admin nav links 
	else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']) { 
		echo '<script>window.addEventListener(onload, switchNavAdmin())</script>';
	}
	
	# we want to logout the user after they have closed the website, so we track inactivity on the website 
	define("TIME_INACTIVE", 1800); // 30 mins = 1800 secs. Created a constant variable 
	if(!isset($_SESSION['timeout'])) {
		$_SESSION['timeout'] = time() + TIME_INACTIVE; 
	}
	else {
		$session_life = time() - $_SESSION['timeout'];
	}
	
	if(isset($session_life) && $session_life > TIME_INACTIVE) { 
		session_destroy(); 
		session_start();     
	}

	$_SESSION['timeout'] = time();
?>

<div class="class3">	
	<section>
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
				<br><br>Search by letter: <a href='letterSearch.php?by=A'>A</a> | <a href='letterSearch.php?by=B'>B</a> | <a href='letterSearch.php?by=C'>C</a> | <a href='letterSearch.php?by=D'>D</a>
				| <a href='letterSearch.php?by=E'>E</a> | <a href='letterSearch.php?by=F'>F</a> | <a href='letterSearch.php?by=G'>G</a>
				| <a href='letterSearch.php?by=H'>H</a> | <a href='letterSearch.php?by=I'>I</a> | <a href='letterSearch.php?by=J'>J</a> 
				| <a href='letterSearch.php?by=K'>K</a> | <a href='letterSearch.php?by=L'>L</a> | <a href='letterSearch.php?by=M'>M</a> 
				| <a href='letterSearch.php?by=N'>N</a> | <a href='letterSearch.php?by=O'>O</a> | <a href='letterSearch.php?by=P'>P</a> 
				| <a href='letterSearch.php?by=Q'>Q</a> | <a href='letterSearch.php?by=R'>R</a> | <a href='letterSearch.php?by=S'>S</a>
				| <a href='letterSearch.php?by=T'>T</a> | <a href='letterSearch.php?by=U'>U</a> | <a href='letterSearch.php?by=V'>V</a>
				| <a href='letterSearch.php?by=W'>W</a> | <a href='letterSearch.php?by=X'>X</a> | <a href='letterSearch.php?by=Y'>Y</a>
				| <a href='letterSearch.php?by=Z'>Z</a>
				</div>
			</div>
		</div>
	</section> 

	<section>
		<div class="row" id="BodyText">
			<div class="col-sm-7">
				<p><br>Welcome to FSU's library portal. Sign up to create an account or sign in to get to<br> your existing account. Search the library's inventory to
				find what your looking for.<br> Our inventory contains books, movies,  ebooks, and video games. Once the item <br>is found, you can check it out.
				If returning the item, check it back into the system.<br><br> The Henry Whitemore Library is FSU's library built in 1969. It's a 7 story building<br> containing a print shop, copy center,
				classrooms, communication arts<br> and music departments, study rooms, public use computers, and the<br> IT center. Come and enjoy a quite place to study or work with friends.<br>
				At the library enjoy art history of the library, college, and McAuliffe center.</p>
			</div>
		
			<div class="col-sm-5">
				<img src="../images/6.jpg" id="pic1" width="150px" height="150px" style='float: right' alt='6.jpg'></img>
				<img src="../images/2.png" id="pic1" width="150px" height="150px" style='display: inline; float: right' id='picRight' alt='2.png'></img><br>
			</div>
		</div>
	</section> 
	
	<section >
		<div class="row">
			<div class="col-sm-8">
				<img id='switch' src='../images/fsu.jpg' class="img-thumbnail" width='650px' height='600px' alt='FSU-MainPicture' /><br><br>
			</div>
			
			<div class="col-sm-3">
				<iframe class="img-thumbnail" title="google-maps" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2951.0640653227806!2d-71.4352319!3d42.2984984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e389a9351c81eb%3A0xe6ea3c8be37e9068!2sHenry%20Whittemore%20Library!5e0!3m2!1sen!2sus!4v1583264360102!5m2!1sen!2sus" style="border:0" width="100%" height="100%"></iframe>
				<img class="img-thumbnail" src="../images/5.jpg" width="400" height="300" alt="FSULibrary-front></img>
			</div>
		</div>
	</section>
		
	<section>
		<div class="container" id="contact"><center>
			<table class="table table-bordered table-secondary" description="library-hours">			
			<tr>
				<th>Location</th>
				<th>Phone</th>
			</tr>
			<tr>
				<th>100 State Street Framingham, MA 01701</th>
				<th>(111) - 222 - 3344</th>
			</tr>
			</table>
		</center></div>
			
		<div class="container"><center>
			<table class="table table-bordered table-secondary" description="library-hours">			
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
	</section>
	
</div>

	<section>
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
			<div class="col-sm-12"><br><a href="#top">Back to top &#x2191;</a></div>
			<div class="col-sm-12"><a href='adminLogin.php'><button type="button" style='float: right; padding: 0.5% 0.5% 0.5% 0.5%; margin-right: 0.1%'>Admin Login</button></a></div>
		</div>
	</section>
		
<?php include("../includes/footer2.htm"); ?>