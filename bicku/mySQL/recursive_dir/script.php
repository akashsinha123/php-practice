<?php 

	function dir_list($dir_recurse_depth = 0, $dir_list_root = '.') {

		$dir_iter = new RecursiveDirectoryIterator(
			$dir_list_root,
			RecursiveDirectoryIterator::SKIP_DOTS);
		$iter = new RecursiveIteratorIterator(
			$dir_iter,
			RecursiveIteratorIterator::SELF_FIRST,
			RecursiveIteratorIterator::CATCH_GET_CHILD
			);

		$iter->setMaxDepth($dir_recurse_depth);
		$path = array($dir_list_root);
		foreach ($iter as $path => $dir) {
			if ($dir_recurse_depth == 0 && $dir->isDir()) $path .= "/";
				$paths[] = substr($path,2);
		}
		return $paths;
	}

	// $path = dir_list();
	// $path_1 = dir_list(1);
	// $parent_path = dir_list(0,"../");
	// $parent_path_1 = dir_list(1,"../");
	// $parent_path_2 = dir_list(2,"../");
	//use print_r($path) to print the desired result;

 ?>
 