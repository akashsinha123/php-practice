<?php
$dir = "images/aaa.php";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh))){
      echo $file . "<br>";
    }
    closedir($dh);
  }
}else{
	echo $dir;
}

?>