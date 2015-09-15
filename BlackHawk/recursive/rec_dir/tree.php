<?php 

function Dir_tree($dir) {
	if ($dh = opendir($dir)){
		$markup = "";
		while (($file = readdir($dh))){
			if (is_dir($file)) {
				$markup .= '<li>'. $file . Dir_tree($file) .'</li>';
			}else {
				$markup .= '<li>'. $file .'</li>';
			}
	    }
	    closedir($dh);
	  }
	
	return '<ul>'. $markup.'</ul>';

}

 ?>
 