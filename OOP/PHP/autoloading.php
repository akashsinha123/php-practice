<?php 
//reduces the pain of including numerous files;

// If the __autoload() function is defined tehn when any class of interface is called without
//defining,  it automatically includes the class.

//defining an __autoload() function;

function __autoload($class_name)
{
	//include $class_name . ".php";
	echo "hahahha";
}

// so the kind of classes I can defind and expect the autoloader to include are those whose 
//names are named after their file names;

// __autoload() function is executed whenever any undefined class or interface is called;



$jsv = new skndbv();


 ?>