<?php 

// scope resolution operator allows access to static, constants and overridden(caling any parents method) properties and methods of a class;
// while accessing static, constants and overridden(caling any parents method) properties and methods from within the class use the "self" keyword.
// while accessing static, constants and overridden(caling any parents method) properties and methods from outside the class use the "classname::property".


//from outside the class definition, you'll also see different ways to instantiate an object.

class Outside
{
	const NAME = "Akash";
}

echo Outside::NAME;

$myclass = new Outside();

echo $myclass::NAME;


$weird = 'Outside';

echo $weird::NAME;



//from inside the class definition

class Inside
{
	const NAME = "Bicku";
	public static $name = "Bicku";


	static function boo()
	{
		echo self::$name . "<br />";
	}
}

Inside::boo();

$inside = new Inside();

$inside::boo();





 ?>