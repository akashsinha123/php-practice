<?php 

//static methods and properties can be accessed without instantiating the class.

class A
{
	static public $name = "Akash";
}

$a = new A();
echo $a::$name;


// we canot use the "$this" keyword inside a static method.
//coz "$this" is defined only when a class is instantiated.
//


 ?>