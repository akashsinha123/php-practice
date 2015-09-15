<?php 


//  the __construct() function is called whenever there is any instantiation;
// is a child class do not defines a construct function then maybe the parent class construct function
//will be inherited(if the parent construct is not private);
// when a method is overridden the same no. of parameters has to be defined.. the only exception is __construct() function.
class ParentC
{
	public function __construct()			// if private or protected an error is thrown on line 20;
	{
		print "ParentC<br />";
	}

	function __destruct()
	{
		print "Dead, Bitch!!!";
	}
}

class Child extends ParentC
{
	function __construct()
	{
		parentC::__construct();
		print "first Child<br />";
	}
}

class AnotherChild extends ParentC
{

}

$obj = new ParentC();
$aaa = new Child();
$boo = new AnotherChild();

// the destruct function will be called as soon as there are no other references to a particular object.

//Like constructors, parent destructors will not be called implicitly by the engine. In order to run a parent
//destructor, one would have to explicitly call parent::__destruct() in the destructor body. Also like constructors,
//a child class may inherit the parent's destructor if it does not implement one itself.


 ?>