<?php 

//function myFunc(MyClass $myclass){};
//if class or interface is defined as type hinting then any children of them is also allowed.

class MyClass
{
	public function test(OtherClass $otherclass) // the parameter is an object of type OtherClass.
	{
		echo $otherclass->var;
	}

	public function test_array(array $input_array)
	{
		print_r($input_array);
	}
}




 ?>