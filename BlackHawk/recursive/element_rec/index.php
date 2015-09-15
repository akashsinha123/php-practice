<?php 

	$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );


	function show_all_elements($arr) {
		for ($i=0; $i < count($arr); $i++) { 
			$element = $arr[$i];
			if(gettype($element) == 'array') {
				show_all_elements($element);
			} else {
				echo $element . "<br />";
			}
		}
	}

	show_all_elements($cars);

 ?>