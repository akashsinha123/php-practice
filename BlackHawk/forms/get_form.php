<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	

	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	Name: <input type="text" name="name"><br />
	E-mail: <input type="text" name="email"><br />
	<input type="submit" value='Submit'>
	</form>
	
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == GET) { ?>
		<pre>
			<?php print_r($_GET); ?>
		</pre>

	<?php
		}
	 ?>


</body>
</html>