<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP</title>
</head>
<body>

	<p>hi I was just &lt;div&gt; thinking about u</p>
	<p>hi I was just <?php  echo htmlspecialchars('<div>'); ?> thinking about u</p>
	<?php 

		if (isset($_GET['id'])) {
			echo htmlspecialchars($_GET['id']);
		}else{
			echo "Is not set! I'm redirecting you to spomeother place.";
		};
		echo "<br /";
		echo "<br /";
		echo "<br /";
	 ?>
		<br />
		<br />

		<a href="about.php?name=Akash&job=I_Dont_Know">About</a>
		
		<form action="" method="post">
			<ul>
				<li>
					<label for="name">Name: </label>
					<input type="text" name="name" id="name"><br />
				</li>
				<li>
					<label for="email">Email: </label>
					<input type="text" name="email" id="email"><br />
				</li>
				<li>
					<label for="message">Message: </label>
					<textarea name="message" id="message"></textarea>
				</li>
				<li>
					<input type="submit" value="Go!">
				</li>
			</ul>
		</form>

		<?php 

			echo $_SERVER['REQUEST_METHOD'] . "<br />";

			if (!empty($_POST)) {
				print_r($_POST);
			}

			echo "<br />";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ( mail('sakash674@gmail.com', 'sakash674@gmail.com', $_POST['message'])) {
					$status = "Thanks for your mail.";
				}
			}


			if (isset($status)) {
				echo $status;
			}else{
				echo "shit just got real";
			};
		 ?>
	



</body>
</html>