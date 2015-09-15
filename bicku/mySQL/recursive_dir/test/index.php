<?php 

function Dir_tree($base_dir) {
	echo $base_dir."<br>";
	$markup = "";
	$dh = scandir($base_dir);
	foreach ($dh as $key) {
		if ($key != "." && $key != "..") {
			$dir = $base_dir.DIRECTORY_SEPARATOR.$key;
			if (is_dir($dir)) {
				$markup .= '<li>'. $key .'</li>';
				Dir_tree($dir);
			}else {
				$markup .= '<li>'. $key .'</li>';
			}
		}
	}
	return '<ul>'. $markup.'</ul>';

}

echo Dir_tree('../../');