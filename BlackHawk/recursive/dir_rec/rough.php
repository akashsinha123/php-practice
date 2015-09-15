<?php 

$dir = "../";
$dh = scandir($dir);
// $dh = scandir($dir);
// function Dir_tree($dir) {
// 	$dh = scandir($dir);
// 	$markup = "";
// 	foreach ($dh as $key) {
// 		if (is_dir($key)) {
// 			Dir_tree($key);
// 		} else {
// 			$markup .= '<li>'. $key .'</li>';
// 		}
// 	}
// 	return '<ul>'. $markup.'</ul>';

// }

// echo Dir_tree($dir);

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>

 	<pre>
 		
 		<?php 
 			print_r($dh)
 		 ?>
 	</pre>
 	
 </body>
 </html>