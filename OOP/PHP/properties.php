<?php 

// "->" is called Object Operator.
// "::" is called Scope Resolution Operator.

class A
{
	public static $property = "Akash";

	public static function boo()
	{
		return self::$property;
	}
}

echo A::boo();

class B
{
	public $property = "Bicku";

	public function boo()
	{
		return $this->property;
	}
}

$b = new B();

echo $b->boo();

class C
{
	public static $prop = "Bala";

	public function coo()
	{
		return self::$prop;
	}
}

$c = new C();

echo $c->coo();


//The below code given an error. "$this" is active when the object is instantiated;

// class D
// {
// 	public $prop = "Bicku";

// 	public static function doo()
// 	{
// 		return $this->prop;
// 	}
// }

// $d = new D();

// echo D::doo();










 ?>