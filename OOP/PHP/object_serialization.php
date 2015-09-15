<?php 

// before going to object serialization lets look at the serialize function.

$animals = array("Cat", "Dog", "Mouse", "Tiger");

echo "<pre>";

print_r($animals);

$ser = serialize($animals); // converting the array to a string.

echo "<br />";

print_r($ser);

$ser = unserialize($ser);	// converting the string back to the array.

echo "<br />";

print_r($ser);

// Now Object serialization.

// using serialize to save an object will save all the variables, but no methods, only the name of the class.

// while unserializing an object the class file must be included i.e the class must be defined. Also an object of that class must be persent.

// autoloader can also be used. 

class A
{
	public $one = 1;

	public function showOne()
	{
		echo $this->one;
	}
}

$a = new A();

echo "<br />";
var_dump($a);

$s = serialize($a);

echo "<br />";
print_r($s);

echo "<br />";

$k = unserialize($s);

print_r($k);

$k->showOne();

 ?>