<?php 
echo "In php each variable contains an object reference (each variable holds a copy of object identifier
	which points to the same object) rather than a copy of the entire object.<br />";

// when we say object is passed by reference it means using "&" symbol.
// think of an identifier as a reference to a reference.

// a variable that is assigned an object is object variable.
//an object variable doesnt contain the object itself but an object identifier.

//** when different variables or arguments passed are assigned an object they hold a copy of the identifier, which points to the same object.

class A
{
	public $foo = 1;
}

$a = new A;

$b = $a; // $a and $b are copies of same identifier.

$b->foo = 2;

echo $a->foo . "<br />";

$c = new A; //$c also holds a copy of the same identifier as $a and $b;

echo $c->foo . "<br />";

$d = &$c;

$d->foo = 2;

echo $c->foo . "<br />";

$e = new A;

function foo($obj)
{
	$obj->foo = 2;
}

foo($e);

echo $e->foo . "<br />";