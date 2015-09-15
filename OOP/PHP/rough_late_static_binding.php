<?php 


class Person
{
	static protected $stmt = "Naval works at Mantralab";

	static public function getStmt()
	{
		//return self::$stmt; // check for confirmation.
		return static::$stmt;
	}
}

$a = new Person();
class ChildP extends Person
{
	static protected $stmt = "Akash works at Mantralab";
}

$b = new ChildP();
echo ChildP::getStmt();



 ?>