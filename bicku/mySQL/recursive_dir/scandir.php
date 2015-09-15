<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ScanDir</title>
</head>
<body>

	<?php 
	$forbiddenChars = array(".", "..", "_");
	$dir = scandir("test");

	foreach ($dir as $key) {
		if ($key != "." && $key != "..") {
			//echo $key . "<br />";
			echo "<article>";
			include "test/$key";
			echo "</article>";
		}
		
	}
	// foreach ($dir as $key) {
	// 	if (!in_array($key, $forbiddenChars)) {
	// 		echo "<article>";
	// 		include("$key");
	// 		echo "</article>";
	// 	}
		
	// }

	 ?>



</body>
</html>