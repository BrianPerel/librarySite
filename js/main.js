/* --  Functions for index page -- */

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

/* ------------------------------- */