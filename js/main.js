/* --  Function for index page image rotation -- */

function startTimer() {
	setInterval(displayNextImage, 4000);
}
function displayNextImage() {
	x = (x === images.length - 1) ? 0 : x + 1; // if index 'x' is equal to length of array then set index to value 0, else increment (go to next image)
	document.getElementById("switch").src = images[x]; // get element by id 'switch' and switch the image with new one 
}

var images = [], x = -1;
images[0] = "images/inside.jpg";
images[1] = "images/4.jpg";
images[2] = "images/fsu.jpg";

/* ---------------------------------------------- */

function myFunction() { 
	setTimeout(function(){
		document.getElementById("logout").style.display = "none"; 
	}, 1000);
}

/* -- Function for switching regular user navbar links -- */

function switchNav() {
	var parent = document.getElementById("parent"); 
	var child1 = document.getElementById("child1"); 
	var child2 = document.getElementById("child2"); 
	parent.removeChild(child2);
	parent.removeChild(child1);
			
	var a = document.createElement('a');
	a.href = 'signIn.php';
	a.title = "My Account";
	a.appendChild(document.createTextNode("My Account"));
			
	parent.insertBefore(a, child3);
}

function switchNavAdmin() {
	var parent = document.getElementById("parent"); 
	var child1 = document.getElementById("child1"); 
	var child2 = document.getElementById("child2"); 
	parent.removeChild(child2);
	parent.removeChild(child1);
			
	var a = document.createElement('a');
	a.href = 'adminLogin.php';
	a.title = "My Account";
	a.appendChild(document.createTextNode("My Account"));
			
	parent.insertBefore(a, child3);
}