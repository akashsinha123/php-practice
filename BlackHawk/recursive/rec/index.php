<?php 

require 'tree.php';

$tree = array(
		"core" => array(
			"init.php"
			),
		"classes" => array(
			"User.php",
			"Hash.php",
			"Session.php"
			),
		"functions" => array(
			"security.php"
			),
		"template" => array(
			"index.template.php",
			"includes" => array(
					"header.template.php",
					"footer.template.php"
				)
			),
		"index.php",
		"login.php",
		"register.php"
	);

echo treeOut($tree);

 ?>