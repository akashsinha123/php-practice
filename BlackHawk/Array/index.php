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




 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	
	<pre>
		
		<?php 
			print_r($b);
		 ?>
	</pre>

 </body>
 </html>