<?php 

	// setcookie("fontSize", 25, time() + 30);

	setcookie('pref[fontSize]', 25);
	setcookie('pref[Name]', "Akash");
	setcookie('pref[Like]', "Mounica");

	echo $_COOKIE["pref[fontSize]"];

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Cookie</title>
 	<style>
		body{
			font-size: <?php echo $_COOKIE['pref[fontSize]']; ?>;
		}
 	</style>
 </head>
 <body>

 	<p>jsdvf jsdcvj dsfjsdhcvhjdwjdvjcjdwvhjc dwcvjewdv u</p>
 	
 	<?php 

 	if (isset($_COOKIE['pref'])) {
 		foreach ($_COOKIE['pref'] as $key => $value) {
 			echo '<li>' . htmlspecialchars($key) . ": " . htmlspecialchars($value);
 		}
 	}
 		
 	 ?>


 </body>
 </html>