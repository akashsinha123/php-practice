<?php 



$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('.', RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);

echo "<ul>\n";
foreach ($it as $key => $value) {
	if ($it->hasChildren()) {
		echo "<li>{$key}\n";
		continue;
	}

	echo "<li>{$value}</li>\n";
}
echo "</ul\n";
echo "<br />";
echo "<br />";

// array_map('unlink', iterator_to_array($it));

 ?>