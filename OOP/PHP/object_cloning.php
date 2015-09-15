<?php 

//an object copy is created by using the clone keyword which calls the object's __clone() method.
// An object's clone method canot be called directly.
// If the __clone() method is defined and the coling is done then the __clone() method of the new object will be called.

class SubObject
{
	static $instances = 0;
	public $instance;

	public function __construct()
	{
		$this->instance = ++self::$instances;
	}

	public function __clone()
	{
		$this->instance = ++self::$instances;
	}
}

class MyCloneable
{
	public $object1;
	public $object2;

	function __clone()
	{
		$this->object1 = clone $this->object1;
	}
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

print("Original Object:<br />");
print_r($obj);
echo "<br />";
print("Cloned Object:<br /");
print_r($obj2);








 ?>