<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		Name: <input type="text" name="fname">
		<input type="submit" valur="Submit">
	</form>

	
	<?php 

	$students = array(

			array("id"=> 1, "Name"=>"Akash", "CourseId"=>"J_101"),
			array("id"=> 2, "Name"=>"Sunil", "CourseId"=>"C_101"),
			array("id"=> 3, "Name"=>"Divya", "CourseId"=>"J_101"),
			array("id"=> 4, "Name"=>"Maneesh", "CourseId"=>"FE_101"),
			array("id"=> 5, "Name"=>"Farhan", "CourseId"=>"AE_101"),
		);

	$course = array(
			array("id"=> "J_101", "Name"=>"Java"),
			array("id"=> "C_101", "Name"=>"C"),
			array("id"=> "AE_101", "Name"=>"Introduction to Aerospace Engineering"),
			array("id"=> "FE_101", "Name"=>"Fluid Machenics"),
			array("id"=> "ME_101", "Name"=>"Structures"),
		);


	if ($_SERVER['REQUEST_METHOD'] == POST) {
		$name = $_POST['fname'];
		$id = "";
		global $name;

		$list = array();

		foreach ($course as $key) {
			if ($name == $key["Name"]){
				$id = $key["id"];
			}
		}

		foreach ($students as $student) {
			if ($student["CourseId"] == $id) {
				$list[] = $student['Name'];
			}
		}
		

	}


	print_r($list);
	echo "<br />";
	echo count($list);







	// if ($_SERVER['REQUEST_METHOD'] == POST) {
	// 	$name = $_POST['fname'];

	// 	global $name;

	// 	$list = array();

	// 	foreach ($course as $key) {
	// 		if ($name == $key["Name"]) {
	// 			foreach ($students as $student) {
	// 				if ($key["id"] == $student["CourseId"]) {
	// 					$list[] = $student;
	// 				}
	// 			}
	// 		}
	// 	}

	// }

	// echo $name;

	// print_r($list);
	// echo "<br />";
	// echo count($list);

	

	 ?>
	
</body>
</html>