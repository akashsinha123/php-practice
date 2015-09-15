<?php 

require 'file.php';

// echo File::exists('sample.php')? 'it does' : 'it does not';

//echo File::size('file.php');

// echo File::name('file.php');
// echo "<br />";
// echo File::extension('file.php');

// echo file::delete('sample.php');

//echo File::last_updated('file.php');

// echo File::get('sample.txt', "A default value");

// echo File::put('sample.txt', "A new value" . PHP_EOL);
// echo "<br />";
// echo File::get('sample.txt', "A default value");

// echo File::put('sample.txt', "A different new value" . PHP_EOL, true);
// echo "<br />";
// echo File::get('sample.txt', "A default value");

echo File::truncate('sample.txt');
echo File::get('sample.txt', "A default value");


 ?>