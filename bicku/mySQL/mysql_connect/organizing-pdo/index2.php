<?php namespace Blog\DB;
require 'functions.php';

$conn = connect($config);

if($conn) {
	$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
	$row = query("SELECT * FROM users WHERE id = :id", 
			array('id' => $id),
			$conn)[0];
}


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>

 	<?php if ($row) : ?>
 	<h1><?php echo $row['name'];?>'s Profile</h1>
 	<?php else: ?>
	<h1>No User</h1>
 	<?php endif; ?>
 </body>
 </html>