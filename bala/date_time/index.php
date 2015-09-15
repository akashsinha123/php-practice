<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<?php 
		echo date_default_timezone_get();
		echo "Today is: ".date("Y/m/d")."<br />";
		echo "Today is: ".date("d.m.Y")."<br />";
		echo "Today is: ".date("Y-m-d")."<br />";
		echo "Today is: ".date("l")."<br />";

		echo "The time is : ".date("h:i:sa")."<br />";

		$startdate = strtotime("Saturday");
		$enddate = strtotime("+6 weeks", $startdate);

		while ($startdate < $enddate) {
			echo date("M d", $startdate),"<br />";
			$startdate = strtotime("+1 week", $startdate);
		}


	 ?>
	
</body>
</html>