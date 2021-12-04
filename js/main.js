/* --  Function for index page image rotation -- */
var images = new Array();
var x = -1;

images[0] = "images/inside.jpg";
images[1] = "images/4.jpg";
images[2] = "images/lib1.jpg";
images[3] = "images/inside2.jpg";

function startTimer() {
	setInterval(displayNextImage, 4000);
}

function displayNextImage() {
	x = (x === images.length - 1) ? 0 : x + 1; // if index 'x' is equal to length of array then set index to value 0, else increment (go to next image)
	document.getElementById("switch").src = images[x]; // get element by id 'switch' and switch the image with new one 
}

/* -- Function for hiding successful logout after a few seconds -- */
function myFunction() { 
	setTimeout(function(){
		document.getElementById("logout").style.display = "none"; 
	}, 1500);
}

/* -- Function for switching regular user navbar links -- */
function switchNav() {
	var parent = document.getElementById("parent"); 
	parent.removeChild(document.getElementById("child1"));
	parent.removeChild(document.getElementById("child2"));
			
	var a = document.createElement('a');
	a.href = 'signIn.php';
	a.title = "My Account";
	a.appendChild(document.createTextNode("My Account"));
	parent.insertBefore(a, child3);	
	
	document.getElementById("home").style.padding = "0% 2.5% 0% 0%";
	document.getElementById("child3").style.padding = "0% 0% 0% 2.5%";
	document.getElementById("about").style.padding = "0% 0% 0% 2.5%";
	document.getElementById("contact2").style.padding = "0% 0% 0% 2.5%";
	document.getElementById("fsu").style.padding = "0.6% 0% 0.6% 2.5%";
}

/* -- Function for switching admin user navbar links -- */ 
function switchNavAdmin() {
	var parent = document.getElementById("parent"); 
	parent.removeChild(document.getElementById("child1"));
	parent.removeChild(document.getElementById("child2"));
			
	var a = document.createElement('a');
	a.href = 'adminLogin.php';
	a.title = "My Account";
	a.appendChild(document.createTextNode("My Account"));
	parent.insertBefore(a, child3);
	
	document.getElementById("home").style.padding = "0% 2.5% 0% 0%";
	document.getElementById("child3").style.padding = "0% 0% 0% 2.5%";
	document.getElementById("about").style.padding = "0% 0% 0% 2.5%";
	document.getElementById("contact2").style.padding = "0% 0% 0% 2.5%";
	document.getElementById("fsu").style.padding = "0.6% 0% 0.6% 2.5%";
}

/* -- alert box for fines message on my account page -- */ 
function alert1() {
	alert("Please pay all fines at the library.");
}

/* -- show password visiblity function -- */
function showPassword() {
  var x = document.getElementById("pass");
  x.type === "password" ? x.type = "text" : x.type = "password";
}
