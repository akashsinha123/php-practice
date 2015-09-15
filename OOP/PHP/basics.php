<?php 

// $this is called pseudo-variable...
// $this is a reference to the calling object...
// $this will not work untill there is an instantiation... self is used instead...

class BasicClass 
{
	function foo()
	{
		if (isset($this)) {
			echo '$this is defined (';
			echo get_class($this);
			echo ")<br />";
		} else {
			echo "\$this is not defined.<br />";
		}
	}
}

class B
{
	function boo()
	{
		A::foo();
	}
}

$a = new BasicClass();
$a->foo();

A::foo();

$b = new B();

$b->boo();

B::boo();


?>