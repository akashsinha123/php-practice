<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<?php 
		

		if ($results) {
			foreach ($results as $row) {
				// echo $value->name . "<br />";
				echo $row->name . "<br />";
			}
		} else {
			echo "No rows returned.";
		}

		echo "<br />";
		echo "<br />";

		if ($res) {
			foreach ($res as $row) {
				// echo $value->name . "<br />";
				echo $row->number . "<br />";
			}
		} else {
			echo "No rows returned.";
		}
	 ?>
	
</body>
</html>