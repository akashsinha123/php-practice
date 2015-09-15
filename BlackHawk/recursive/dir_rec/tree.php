<?php 

function Dir_tree($dir) {
	$dh = scandir($dir);
	$markup = "";
	foreach ($dh as $key) {
		if ($key != "." && $key != "..") {
			if (is_dir($key)) {
				$markup .= '<li>'. $key .'</li>';
				Dir_tree($key);
			}else {
				$markup .= '<li>'. $key .'</li>';
			}
		}
	}
	return '<ul>'. $markup.'</ul>';

}

 ?>
 