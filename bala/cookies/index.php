<?php 

$cookie_name = 'user';
$cookie_value = 'Akash Sinha';
setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
$cookie_name2 = 'name';
$cookie_value2 = 'Bicku Sinha';
setcookie($cookie_name2, $cookie_value2, time() + (86400*30), "/");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>
 	<?php 
 		if (!isset($_COOKIE[$cookie_name])) {
 			echo "Cookie named '". $cookie_name . "' is not set!";
 		} else {
 			echo "Cookie '". $cookie_name . "' is set!<br />";
 			echo "Value is: ". $_COOKIE[$cookie_name];
 		}
 		if (!isset($_COOKIE[$cookie_name2])) {
 			echo "Cookie named '". $cookie_name2 . "' is not set!";
 		} else {
 			echo "Cookie '". $cookie_name2 . "' is set!<br />";
 			echo "Value is: ". $_COOKIE[$cookie_name2];
 		}
 		if (count($_COOKIE) > 0) {
 			echo "Cookies ate enabled";
 		} else {
 			echo "Cookies are disabled.";
 		}
 	 ?>
 </body>
 </html>