<?php 
	

	function set_count($file_name = 'counter.txt') {
		if(file_exists($file_name)) {
			//read the value
			// $handler = fopen($file_name, 'r');
			// $count = (int)fread($handler, 20) + 1;
			// $handler = fopen($file_name, 'w');
		
			// fwrite($handler, $count);
			// fclose($handler);

			$count = (int) file_get_contents($file_name) + 1;
			file_put_contents($file_name, $count);
			

		} else {
			// create it
			$handler = fopen($file_name, 'w+');
			// set a default value of 1;
			$count = 1;
			fwrite($handler, $count);
			fclose($handler);

		}
		return $count;
	}

$count = set_count();


require 'index.tmpl.php';

 ?>