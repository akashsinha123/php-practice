<?php 

	$dir  = $_POST["name"];
	echo "$dir";
	mkdir($dir, 777);

	header("location: dir.php");

 ?>