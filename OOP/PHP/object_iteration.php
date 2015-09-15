<?php 

//all visible properties can be iterated.

class Test
{
	public $first_name = "Akash";
	public $last_name = "Sinha";

	public $name = "Bicku";

	public $place = "Bangalore";

	private $number = "9936487887";

	function iterate()
	{
		echo "Test::iterate:<br />";
		foreach ($this as $key => $value) {
			print "$key => $value<br />";
		}
	}

}


$test = new Test();

foreach ($test as $key => $value) {
	print "$key => $value <br />";
}

echo "<br />";

$test->iterate();	
















 ?>