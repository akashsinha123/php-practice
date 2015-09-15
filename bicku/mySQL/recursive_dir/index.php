<?php include_once "script.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<h2>Testing and Debugging Dashboard</h2>
	<h4><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><?php echo basename(__FILE__); ?></a></h4>
	<h3>dir_list($dir_recurse_depth = 0, $dir_list_root = '.')</h3>
	<ol class="mono-space">
	    <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?debug-action=current_dir';?>">Run</a> - List Current Directory - dir_list()</li>
	    <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?debug-action=current_dir_1';?>">Run</a> - List Current Directory + Children(1) - dir_list(1)</li>
	    <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?debug-action=parent_dir';?>">Run</a> - List Parent Directory  + Children(0) - dir_list(0, "../")</li>
	    <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?debug-action=parent_dir_1';?>">Run</a> - List Parent Directory + Children(1) - dir_list(1, "../")</li>
	    <li><a href="<?php echo $_SERVER['PHP_SELF'] . '?debug-action=parent_dir_2';?>">Run</a> - List Parent Directory + Children(2) - dir_list(2, "../")</li>
	</ol>
	<hr />

	<pre>
	<?php 
		if ( !isset($_GET["debug-action"]) ){
	    $get_action = "";
		}else{
		    $get_action = $_GET["debug-action"];
		}
		echo basename(__FILE__) . "\n";
		echo "PHP vresion: " . phpversion() . "\n";
		echo "debug-action=" . $get_action . "\n";

		switch($get_action){
		    case 'current_dir':
		        echo "File list: " . print_r(dir_list(), true);
		    break;
		    case 'current_dir_1':
		        echo "File list: " . print_r(dir_list(1), true);
		    break;
		    case 'parent_dir':
		        echo "File list : " . print_r(dir_list(0, "../"), true);
		    break;
		    case 'parent_dir_1':
		        echo "File list: " . print_r(dir_list(1, "../"), true);
		    break;
		    case 'parent_dir_2':
		        echo "File list: " . print_r(dir_list(2, "../"), true);
		    break;
		}

	 ?>
	 </pre>
	
</body>
</html>