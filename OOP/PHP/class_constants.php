<?php 

// constants are declared without the "$" keyword;
// the value assigned to them should not be a variable, mathamatical expression of a claa to any function;
//interfaces can also have constants;
// constants are also accessed by the keyword self::CONSTANT;

class MyClass
{
	const CONSTANT = "Akash is not sure if he likes Mounica or not, but he's sure she'll reject him.";

	public function getConst()
	{
		return self::CONSTANT;
	}
}

echo MyClass::CONSTANT . "<br />";

$c = new MyClass();

echo $c->getConst();


 ?>