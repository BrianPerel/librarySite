// Array of images for index page image rotation
const images = [
	"../images/inside.jpg",
	"../images/4.jpg",
	"../images/lib1.jpg",
	"../images/inside2.jpg"];

var currentIndex = -1;

// Function to start the image rotation timer
function startTimer() {
	setInterval(displayNextImage, 4000);
}

// Function to display the next image
function displayNextImage() {
	currentIndex  = (currentIndex === images.length - 1) ? 0 : currentIndex + 1; // if index 'x' is equal to length of array then set index to value 0, else increment (go to next image)
	document.getElementById("switch").src = images[currentIndex ]; // get element by id 'switch' and switch the image with new one
}

// Function for hiding successful logout after a few seconds
function hideLogoutMessage() {
	setTimeout(function() {
		document.getElementById("logout").style.display = "none";
	}, 1500);
}

// Function for switching regular user navbar links
function switchNav() {
	const parent = document.getElementById("parent");
	parent.removeChild(document.getElementById("child1"));
	parent.removeChild(document.getElementById("child2"));

	const a = document.createElement('a');
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

// Function to switch navbar links for regular and admin users
function switchNav() {
	const parent = document.getElementById("parent");
	parent.removeChild(document.getElementById("child1"));
	parent.removeChild(document.getElementById("child2"));

	const a = document.createElement('a');
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

// Alert box for fines message on my account page
function alertFinesMessage() {
	alert("Please pay all fines at the library.");
}

// Show password visiblity function
function togglePasswordVisibility() {
	const passwordInput = document.getElementById("pass");
	passwordInput.type === "password" ? passwordInput.type = "text" : passwordInput.type = "password";
}

function getYear() {
	new Date().getFullYear();
}
