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
			array("id"=> "J_101", "Name"=>"Java", "age"=>10),
			array("id"=> "C_101", "Name"=>"C", "age"=>4),
			array("id"=> "AE_101", "Name"=>"Introduction to Aerospace Engineering", "age"=>32),
			array("id"=> "FE_101", "Name"=>"Fluid Machenics", "age"=>15),
			array("id"=> "ME_101", "Name"=>"Structures", "age"=>9),
		);

	
	 ?>

	<pre> <?php print_r($course) ?> </pre>

	<?php array_multisort($course) ?>
	
	<pre> <?php print_r($course) ?> </pre>


	<?php 

	// if ($_SERVER['REQUEST_METHOD'] == POST) {
	// 	$name = $_POST['fname'];


	// }

	 ?>

	<?php 

	function val_sort($array, $key){
		foreach ($array as $k => $v) {
			$b[] = strtolower($v[$key]);
		}

		print_r($b);

		asort($b);

		echo "<br />";

		print_r($b);

		foreach ($b as $k => $v) {
			$c[] = $array[$k];
		}

		return $c;
	}

	$sorted = val_sort($course, "age");

	 ?>

	 <pre> <?php print_r($sorted) ?> </pre>

	
</body>
</html>