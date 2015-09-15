<?php 

$myArray = array(
		'Homepage',
		'Register',
		'About' => array(
			'The Team',
			'Our Story'
		),
		'Contact' => array(
			'Locations',
			'Support'
		)
	);

	class HookRecursiveIteratorIterator extends 
	RecursiveIteratorIterator
	{
		public function beginChildren()
		{
			echo "<ul>\n";
		}

		public function endChildren()
		{
			echo "</ul></li>\n";
		}
	}


$it = new HookRecursiveIteratorIterator(new RecursiveArrayIterator($myArray), RecursiveIteratorIterator::SELF_FIRST);

echo "<ul>\n";
foreach ($it as $key => $value) {
	if ($it->hasChildren()) {
		echo "<li>{$key}\n";
		continue;
	}

	echo "<li>{$value}</li>\n";
}
echo "</ul\n";



 ?>