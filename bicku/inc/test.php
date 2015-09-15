<?php 
	// $name = 'Akash';
	// $age = 23;

	// function pp($value){
	// 	echo "<pre>";
	// 	print_r($value);
	// 	echo "</pre>";
	// };

	// $greeting = sprintf("my name is %s and I am %d years old.", $name, $age);

	// echo $greeting;
	// echo "<br />";
	// echo "<br />";

	// list($greet, $name, $old) = sscanf("Hi my name, is Akash and I'm 23 years old.", "%s %[^,], %d");

	// echo $greet . "<br />";
	// echo $name . "<br />";
	// echo $old . "<br />";


	// function say_hi($name = "Abhi"){
	// 	return "Hi, there $name.";
	// };

	// echo say_hi("Akash");

	// $arr = ["Akash", "GAdha", "Mounica", "Bicku"];

	// pp($arr);

	// echo "<br />";
	// echo "<br />";

	// function array_pluck($name, $array){
	// 	$arrr = [];
	// 	foreach ($array as $key) {
	// 		$arrr[]	= $key[$name];
	// 	}
	// 	return $arrr;
	// }
	
	// $people = array(
	// 		array('name' => 'Akash', 'age' => 23, 'Occupation' => 'Web Developer'),
	// 		array('name' => 'Mounica', 'age' => 22, 'Occupation' => 'Chem Developer'),
	// 		array('name' => 'Shuhendu', 'age' => 23, 'Occupation' => 'IAS')
	// 	);

	// pp(array_pluck('name', $people));
	// echo "<br />";
	// pp(array_pluck('age', $people));

	$post = [
				"Name" 					=> "Akash",
				"Title" 				=> "My Awesome Post",
				"Body"					=> "Here is the body",
				"Published_date"		=> "17-6-2015"
	];


	extract($post);

	echo $Name;

?>

















