<?php 
	
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		setcookie('fontSize', (int) $_POST['font-size'], time() + 60*2);
	}

	if( isset($_POST['font-size']) ){
		$font_size = $_POST['font-size'];
	}elseif (isset($_COOKIE['fontSize'])) {
		$font_size = $_COOKIE['fontSize'];
	}else {
		$font_size = 16;
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<style>
		
		body{
			font-size: <?php echo htmlspecialchars($font_size) . "px;"; ?>;
		}

		li{
			list-style: none;
		}
		ul, li {
			margin: 0;
			padding: 0;
		}
 	</style>
 </head>
 <body>
 	
	<form action="" method="post">
		
		<li><label for="font-size">Your Preferred Font Size?</label><br />
			<select name="font-size" id="font-size">
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="30">30</option>
				<option value="40">40</option>
			</select>
		</li>
		<li>
			<input type="submit" name="submit" value="Submit">
		</li>

	</form>

	<h2>My Page</h2>
	<p>Indian hockey team might have defeated France in the first practice match but chief coach Paul van Ass feels Saturday’s clash in the Hockey World League Semi-Final will be a real test for the side and they need to not only get the penalty corners but also convert them.
 	Indian hockey team might have defeated France in the first practice match but chief coach Paul van Ass feels Saturday’s clash in the Hockey World League Semi-Final will be a real test for the side and they need to not only get the penalty corners but also convert them.
 Indian hockey team might have defeated France in the first practice match but chief coach Paul van Ass feels Saturday’s clash in the Hockey World League Semi-Final will be a real test for the side and they need to not only get the penalty corners but also convert them.</p>

 </body>
 </html>