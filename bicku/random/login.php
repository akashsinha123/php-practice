<?php 

session_start();
	
	include "config.php";
	include "functions.php";
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
	};

	if(validate_user_creds($username, $password)){
		$_SESSION['username'] = $username;
		header("Location: admin.php");
	} else{
		$stat = "incorrect username and password";
	}

	// if (isset($_POST['loginform'])) {
	// 	echo "posted";
	// }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="login.php" method="post">
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<input type="submit" name="loginform" value="Login" id="login">
			</li>
		</ul>
	</form>

	<?php 

	if ( isset($stat) ){
		echo $stat;
	}


	 ?>
	
</body>
</html>