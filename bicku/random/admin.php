<?php 
session_start();

include 'functions.php';

	if (!is_logged_in()) {
 		header("Location: login.php");
		die();
	 } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
</head>
<body>

	<h1>welcome <?php echo $_SESSION['username'] ?> </h1>
	<a href="logout.php"><input type="button" value="Logout" onclick="myFunc()"></a>

	
</body>
</html>