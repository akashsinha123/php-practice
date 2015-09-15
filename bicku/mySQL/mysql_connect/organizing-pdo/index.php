<?php namespace Blog\DB;

require 'functions.php';

$conn = connect($config);

if ($conn) {
	$users = get('users', $conn);
	
} else {
	die('Could not connect to the DB.');
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>

	<?php 
		if ($users) {
			foreach ($users as $user) {
				echo "<li>{$user['name']}</li>";
			}
		} else {
			echo "no rows found.";
		}
	 ?>
 	
 </body>
 </html>