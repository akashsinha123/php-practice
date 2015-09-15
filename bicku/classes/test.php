<?php 

class MyClass {
	public $prop1 = "I'm a class property!";

	public function setProp($val) {
		$this->prop1 = $val;
	}

	public function __construct(){
		echo 'The class "', __CLASS__, '" was initiated!<br />';
	}

	public function __destruct(){
		echo 'The class "', __CLASS__, '" was destroyed!<br />';
	}

	public function __toString(){
		return "Yaaa huuuu";
	}
}

$obj = new MyClass;

echo "<br />";

echo $obj;

echo "<br />";

var_dump($obj);

echo "<br />";

echo $obj->prop1;
echo "<br />";

$obj->setProp("hahahahahha");
echo $obj->prop1;

echo "<br />";

unset($obj);


 ?>