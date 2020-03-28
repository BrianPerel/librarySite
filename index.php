<!DOCTYPE html>

<html>
	<head>
		<title>Home | HWL</title>
		<meta name="author" content="Brian Perel">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<script type = "text/javascript">
		    function startTimer() {
				setInterval(displayNextImage, 4000);
            }
			function displayNextImage() {
				x = (x === images.length - 1) ? 0 : x + 1; // if index 'x' is equal to length of array then set index to value 0, else increment (go to next image)
				document.getElementById("switch").src = images[x]; // get element by id 'switch' and switch the image with new one 
			}

			var images = [], x = -1;
            images[0] = "icons/inside.jpg";
            images[1] = "icons/4.jpg";
			images[2] = "icons/fsu.jpg";
		</script>
		
		<STYLE>A {text-decoration: none; color: black}</STYLE> <!-- needed to remove link underlines --> 

	</head>
	
	<body onload="startTimer()">
		<center><div class="class1">
			<h2>Henry Whittemore Library</h2>
			<a href="index.php"><img src="icons/1.jpg" alt="Smiley face" width="100px" height="70px" style="padding-top: 1%"></img></a>
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
		</center>
		
		<div class="class3">		
			<center><form class="example" action="searchItem.php" method = "post" style="margin:auto;max-width:400px">
				<input type="text" placeholder="Search the library's catalog..." name="item_name" required style='height: 39px'></input>
				<button type="submit" class="fa fa-search"></button>
			</form></center>
			
			<?php session_start(); $set = range('A', 'Z'); $_SESSION['set'] = '' ?> 
			
			<br><br><center>Search by letter: <a href='letterFind.php?by=A'>A</a> | <a href='letterFind.php?by=B'>B</a> | <a href='letterFind.php?by=C'>C</a> | <a href='letterFind.php?by=D'>D</a>
			| <a href='letterFind.php?by=E'>E</a> | <a href='letterFind.php?by=F'>F</a> | <a href='letterFind.php?by=G'>G</a>
			| <a href='letterFind.php?by=H'>H</a> | <a href='letterFind.php?by=I'>I</a> | <a href='letterFind.php?by=J'>J</a> 
			| <a href='letterFind.php?by=K'>K</a> | <a href='letterFind.php?by=L'>L</a> | <a href='letterFind.php?by=M'>M</a> 
			| <a href='letterFind.php?by=N'>N</a> | <a href='letterFind.php?by=O'>O</a> | <a href='letterFind.php?by=P'>P</a> 
			| <a href='letterFind.php?by=Q'>Q</a> | <a href='letterFind.php?by=R'>R</a> | <a href='letterFind.php?by=S'>S</a>
			| <a href='letterFind.php?by=T'>T</a> | <a href='letterFind.php?by=U'>U</a> | <a href='letterFind.php?by=V'>V</a>
			| <a href='letterFind.php?by=W'>W</a> | <a href='letterFind.php?by=X'>X</a> | <a href='letterFind.php?by=Y'>Y</a>
			| <a href='letterFind.php?by=Z'>Z</a> | <a href='letterFind.php?by=A-Z'>A-Z</a></center>		
			
			<p id="BodyText"><br>Welcome to FSU's library portal. Sign up to create an account or sign in to get to<br> your existing account. Search the library's inventory to
			find what your looking for.<br> Our inventory contains books, movies,  ebooks, and video games. Once the item <br>is found, you can check it out.
			If returning the item, check it back into the system.<br><br> The Henry Whitemore Library is FSU's library built in 1969. It's a 7 story building<br> containing a print shop, copy center,
			classrooms, communication arts<br> and music departments, study rooms, public use computers, and the<br> IT center. Come and enjoy a quite place to study or work with friends.<br>
			At the library enjoy art history of the library, college, and McAuliffe center.</p>
			
			<br><br><img src="icons/2.png" id="pic1" width="150px" height="150px" style='margin-left: 10%'></img>
			<img src="icons/3.jpg" id="pic1" width="150px" height="150px"></img>
			
			<center><img src='icons/fsu.jpg' id='switch' height='600px' width='900px' style='margin-top: 8%; border: solid black'></img></center>
			
			<center><p id="contact"><br>Location: 100 State Street Framingham, MA 01701. We are located just off of Route 9 and about 1.5 miles from Mass Pike exit 12.
			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone: (111) - 222 - 3344<br>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hours: Sunday 1PM - 1AM
			<br>&nbsp;&nbsp;&nbsp;Monday 7:30AM - 1AM
			<br>&nbsp;&nbsp;&nbsp;Tuesday 7:30AM - 1AM
			<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wednesday 7:30AM - 1AM
			<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thursday 7:30AM - 1AM
			<br>&nbsp;Friday 7:30AM - 5PM
			<br>Saturday 9AM - 5PM</p>
			
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2951.0640653227806!2d-71.4352319!3d42.2984984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e389a9351c81eb%3A0xe6ea3c8be37e9068!2sHenry%20Whittemore%20Library!5e0!3m2!1sen!2sus!4v1583264360102!5m2!1sen!2sus" frameborder="0" style="border:0;" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			<img src="icons/5.jpg" height="300" width="400"></img></center>
		</div>
		
		<br><br><center><p>Follow Us:</p>
		<a href="https://www.facebook.com/whittemorelib/" class="fa fa-facebook" target="_blank"></a>
		<a style="margin-left: 0.5%" href="https://www.instagram.com/framinghamstateu/" class="fa fa-instagram" target="_blank"></a>
		<a style="margin-left: 0.5%" href="https://twitter.com/whittemorelib?lang=en" class="fa fa-twitter" target="_blank"></a>
		<a style="margin-left: 0.5%" href="https://www.pinterest.com/pin/243616661067870491/" class="fa fa-pinterest" target="_blank"></a></center><br><br>
		
		<div class="backTop">
			<center><a href="#top">Back to top</a> &#x2191;</center>
		</div>
		
		<button style='float: right; width: 7%; height: 30px'><a href='adminLogin.php' id='admin'>Admin Login</a></button>
				
		<div class="footer">
			<p>By: Brian Perel &copy; <script type="text/javascript">var current_year = new Date(); document.write(current_year.getFullYear());</script></p>
		</div>
		
	</body>
</html>