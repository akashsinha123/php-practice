<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
	<?php 

		$cars = [
			['Volvo', 22, 18],
			['BMW', 15, 13],
			['Saab', 5, 2],
			['Land Rover', 17, 15]
		];

		foreach ($cars as $key => $item) {
			echo "<p><b>Row number: $key</b></p>";
			echo "<ul>";
			foreach ($item as $key => $value) {
				echo "<li>".$value."</li>";
			}
			echo "</ul>";
		}

	 ?>

</body>
</html>