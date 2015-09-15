<?php 
	
	$students = array(

			array("id"=> 1, "Name"=>"Akash", "CourseId"=>"J_101"),
			array("id"=> 2, "Name"=>"Sunil", "CourseId"=>"C_101"),
			array("id"=> 3, "Name"=>"Divya", "CourseId"=>"J_101"),
			array("id"=> 4, "Name"=>"Maneesh", "CourseId"=>"FE_101"),
			array("id"=> 5, "Name"=>"Farhan", "CourseId"=>"AE_101"),
			array("id"=> 1, "Name"=>"Akash", "CourseId"=>"J_101"),
			array("id"=> 2, "Name"=>"Sunil", "CourseId"=>"C_101"),
			array("id"=> 3, "Name"=>"Divya", "CourseId"=>"J_101"),
			array("id"=> 4, "Name"=>"Maneesh", "CourseId"=>"FE_101"),
			array("id"=> 5, "Name"=>"Farhan", "CourseId"=>"AE_101"),
			array("id"=> 1, "Name"=>"Akash", "CourseId"=>"J_101"),
			array("id"=> 2, "Name"=>"Sunil", "CourseId"=>"C_101"),
			array("id"=> 3, "Name"=>"Divya", "CourseId"=>"J_101"),
			array("id"=> 4, "Name"=>"Maneesh", "CourseId"=>"FE_101"),
			array("id"=> 5, "Name"=>"Farhan", "CourseId"=>"AE_101"),
			array("id"=> 1, "Name"=>"Akash", "CourseId"=>"J_101"),
			array("id"=> 2, "Name"=>"Sunil", "CourseId"=>"C_101"),
			array("id"=> 3, "Name"=>"Divya", "CourseId"=>"J_101"),
			array("id"=> 4, "Name"=>"Maneesh", "CourseId"=>"FE_101"),
			array("id"=> 5, "Name"=>"Farhan", "CourseId"=>"AE_101"),
			array("id"=> 1, "Name"=>"Akash", "CourseId"=>"J_101"),
			array("id"=> 2, "Name"=>"Sunil", "CourseId"=>"C_101"),
			array("id"=> 3, "Name"=>"Divya", "CourseId"=>"J_101"),
			array("id"=> 4, "Name"=>"Maneesh", "CourseId"=>"FE_101"),
			array("id"=> 5, "Name"=>"Farhan", "CourseId"=>"AE_101"),
			array("id"=> 1, "Name"=>"Akash", "CourseId"=>"J_101"),
			array("id"=> 2, "Name"=>"Sunil", "CourseId"=>"C_101"),
			array("id"=> 3, "Name"=>"Divya", "CourseId"=>"J_101"),
			array("id"=> 4, "Name"=>"Maneesh", "CourseId"=>"FE_101"),
			array("id"=> 5, "Name"=>"Farhan", "CourseId"=>"AE_101"),
		);

	foreach ($students as $k => $v) {
			$b[] = ($v["Name"]);
		}

		$dyn_table = "<table border=\"1\" cellpadding=\"10\">";


		$i = 0;
		foreach ($students as $student) {
			$name = $student["Name"];
			if ($i%3 == 0) {
				$dyn_table .= "<tr><td>" . $name . "</td>";
			} else {
				$dyn_table .= "<td>" . $name . "</td>";
			}

			
			$i++;
		}

		$dyn_table .= "</tr></table>";


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	
 	<?php echo $dyn_table; ?>
	
 </body>
 </html>