<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<form action="create.php" method="post">
		Enter the name of the folder: <input type="text" name="name">
		<input type="submit" value="Create">
	</form>


	<?php 

	$path = ".";
	$dir = opendir($path) or die("Unable to open the directory.");

	while ($file = readdir($dir)) {
		if ($file == "." || $file == ".." || $file == "create.php" || $file == "delete.php" || $file == "dir.php"
		|| $file == "greeting.php" || $file == "index.php" || $file == "random.txt" || $file == "scandir" 
		|| $file == "scandir.php" || $file == "script.php" || $file == "test" || $file == "del.png" || $file == ".DS_Store") {
			continue;
		}
		echo "<a href='$file'>$file</a><a href='delete.php?dir=$file'><img src='del.png' alt='delete'></a><br />";
		
	}

	closedir($dir);
	echo "<br />";

	//$fold = scandir(".");

	// foreach ($fold as $key) {
	// 	if ($key != "." && $key != "..") {
	// 		echo $key . "<br />";
			
	// 	}
		
	// }

	 ?>

	 
	
</body>
</html>