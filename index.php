<?php 
	include("body.htm");
	echo '<title>Home | HWL</title>';
	echo '<body onload="startTimer()">';
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		echo '<script>window.addEventListener(onload, switchNav())</script>';
	}
?>

<div class="class3">		
	<center><form class="example" action="itemSearch.php" method = "post" style="margin:auto;max-width:375px">
		<input autofocus type="text" placeholder="Search the library's catalog..." name="item_name" autocomplete='off' required style='width: 300px; height: 38.2px'></input>
		<button type="submit" class="fa fa-search"></button>
	</form></center>
				
	<br><br><center>Search by letter: <a href='letterFind.php?by=A'>A</a> | <a href='letterFind.php?by=B'>B</a> | <a href='letterFind.php?by=C'>C</a> | <a href='letterFind.php?by=D'>D</a>
	| <a href='letterFind.php?by=E'>E</a> | <a href='letterFind.php?by=F'>F</a> | <a href='letterFind.php?by=G'>G</a>
	| <a href='letterFind.php?by=H'>H</a> | <a href='letterFind.php?by=I'>I</a> | <a href='letterFind.php?by=J'>J</a> 
	| <a href='letterFind.php?by=K'>K</a> | <a href='letterFind.php?by=L'>L</a> | <a href='letterFind.php?by=M'>M</a> 
	| <a href='letterFind.php?by=N'>N</a> | <a href='letterFind.php?by=O'>O</a> | <a href='letterFind.php?by=P'>P</a> 
	| <a href='letterFind.php?by=Q'>Q</a> | <a href='letterFind.php?by=R'>R</a> | <a href='letterFind.php?by=S'>S</a>
	| <a href='letterFind.php?by=T'>T</a> | <a href='letterFind.php?by=U'>U</a> | <a href='letterFind.php?by=V'>V</a>
	| <a href='letterFind.php?by=W'>W</a> | <a href='letterFind.php?by=X'>X</a> | <a href='letterFind.php?by=Y'>Y</a>
	| <a href='letterFind.php?by=Z'>Z</a></center>		
	
	<p id="BodyText"><br>Welcome to FSU's library portal. Sign up to create an account or sign in to get to<br> your existing account. Search the library's inventory to
	find what your looking for.<br> Our inventory contains books, movies,  ebooks, and video games. Once the item <br>is found, you can check it out.
	If returning the item, check it back into the system.<br><br> The Henry Whitemore Library is FSU's library built in 1969. It's a 7 story building<br> containing a print shop, copy center,
	classrooms, communication arts<br> and music departments, study rooms, public use computers, and the<br> IT center. Come and enjoy a quite place to study or work with friends.<br>
	At the library enjoy art history of the library, college, and McAuliffe center.</p>
	
	<br><br><img src="images/2.png" id="pic1" width="150px" height="150px" style='margin-left: 10%'></img>
	<img src="images/3.jpg" id="pic1" width="150px" height="150px"></img>
	
	<center><img src='images/fsu.jpg' id='switch' height='600px' width='900px' style='margin-top: 8%; border: solid black'></img></center>
	
	<center><p id="contact"><br><b>Location:</b> 100 State Street Framingham, MA 01701. We are located just off of Route 9 and about 1.5 miles from Mass Pike exit 12.
	<br><br><b>Phone:</b> (111) - 222 - 3344<br>
	<br><b>Hours:</b><br>
	<br>Sunday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1PM - 1AM
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7:30AM - 1AM
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tuesday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7:30AM - 1AM
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wednesday&nbsp;&nbsp;&nbsp;&nbsp;7:30AM - 1AM
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thursday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7:30AM - 1AM
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Friday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7:30AM - 5PM
	<br>Saturday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9AM - 5PM<br><br><br></p> 
				
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2951.0640653227806!2d-71.4352319!3d42.2984984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e389a9351c81eb%3A0xe6ea3c8be37e9068!2sHenry%20Whittemore%20Library!5e0!3m2!1sen!2sus!4v1583264360102!5m2!1sen!2sus" frameborder="0" style="border:0;" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	<img src="images/5.jpg" height="300" width="400"></img></center>
</div>

<br><br><center><p>Follow Us:</p>
<a href="https://www.facebook.com/whittemorelib/" class="fa fa-facebook" target="_blank"></a>
<a style="margin-left: 0.5%" href="https://www.instagram.com/framinghamstateu/" class="fa fa-instagram" target="_blank"></a>
<a style="margin-left: 0.5%" href="https://twitter.com/whittemorelib?lang=en" class="fa fa-twitter" target="_blank"></a>
<a style="margin-left: 0.5%" href="https://www.pinterest.com/pin/243616661067870491/" class="fa fa-pinterest" target="_blank"></a></center><br><br>

<div class="backTop"><center><a href="#top">Back to top</a> &#x2191;</center></div>
<button type="button" style='float: right; padding: 0.5% 0.5% 0.5% 0.5%; font-size: 14px'><a href='AdminLogin.php'>Admin Login</a></button>
	
<?php
	include("footer.htm");
?>