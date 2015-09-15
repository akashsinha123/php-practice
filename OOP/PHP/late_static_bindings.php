<?php 

// if not instantiated, the "self" keyword refers to the highest(parent) class in the inheritance.

class Person
{
	static protected $stmt = "Hi there, wassap?";

	static public function getStmt()
	{
		//return self::$stmt;			// to deal with the below problem we use "static" keyword instead of "self".
		return static::$stmt;
	}
}

class Akash extends Person
{
	static protected $stmt = "Hi I'm Akash and I love chicken.";
}


echo Akash::getStmt() . "<br />"; //expected output is "Hi I'm Akash and I love chicken.". but its not the output. The output is "Hi there, wassap?".






 ?>