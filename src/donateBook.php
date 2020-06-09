<?php 
	include("../includes/body.htm");
		echo "<form action='uploadBook.php' method='POST'>";
		echo "<h4>Thank you for choosing to donate a book to our library system. By donating you are expanding our database within our community.<br> Below you can upload your book.</h4>";
		echo "<br><br><label><button>Click Here To Upload The Book For Donation</button><br>";
		echo "<input type='file' name='photo' autocomplete='off' style='padding-bottom: 4%' class='chose'></input></label><br>";
		echo "<div style='margin-bottom: 20%'></div>";
		echo "</form>";
	include("../includes/footer.htm");
?>

	