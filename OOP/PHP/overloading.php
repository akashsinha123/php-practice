<?php 

// overloading is used to access properties and methods that are inaccessible. trough magic methods like __set() and __get();
// read later-> isset() and inset();
class Test
{
	private $name;
	private $height = "5.5";

	public function __set($name, $value)
	{
		if ($name == "full_name") {
			$this->name = $value;
		}
		else{
			throw new Exception("Can only set full_name property.");
		}
	}

	public function __get($name)
	{
		if ($name == 'height') {
			return $this->height;
		}
		else{
			throw new Exception("Can only get height property.");
		}
	}

	public function getHeight()
	{
		echo  $this->height;
	}

	public function getName()
	{
		echo $this->name;
	}
}

$test = new Test();	

try {
	$test->full_name	 = "Akash Sinha";
} catch (Exception $e) {
	echo $e->getMessage();
}

try {
	echo $test->__get("height") . "<br />";
} catch (Exception $e) {
	echo $e->getMessage();
}

$test->getName() . "<br />";

$test->getHeight();


 ?>