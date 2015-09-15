<?php 

$age = 25;
$saved =& $age;
	
	function foo($name, $surname){
		// if ($name == "Akash") {
		// 	echo "Hello, $name $surname How you doing?<br />" ;
		// } else{
		// 	echo "Hello, $name $surname<br />";
		// }

		// switch ($name) {
		// 	case 'Akash':
		// 		echo "Hello, $name $surname How you doing?<br />" ;
		// 		break;
			
		// 	default:
		// 		echo "Hello, $name $surname<br />";
		// 		break;
		// }
		// global $age;
		// echo $age;
	}

	// foo("Akash", "Sinha");

	// function poo(&$age){ // here by using &$age we are not passing in the value but a reference to that value.. or in other words we are passing the box which contains the value $age containing any value, in this case 15;
	// 	$age = 15;
	// }

	// echo $age . "<br />";
	// poo($age);
	// echo $age . "<br />";
	// $age = 5;
	// echo $age . "<br />";
	// echo $saved . "<br />";

	class Person
	{
		var $name = "Bicku";
		var $surname = "";
		var $age = "";
		const specis = "Human";
		public static $color = "Dusky";

		public function __construct($name, $surname, $age){
			$this->name = $name;
			$this->surname = $surname;
			$this->age = $age;
			echo "I am Parent, MF!<br />";
		}

		public function SayHello(){
			echo $this->name . " " . $this->surname . " age " . $this->age . " " . self::$color  ."<br />";
		}

		public static function statFunc(){
			echo "I'm a static function<br />";
		}

		public function __destruct(){
			echo "<br />I'm dead MF!";
		}


	}

	class Akash extends Person
	{
		public function __construct($name, $surname, $age){
			echo $this->name;
			parent::__construct($name, $surname, $age);
			echo $this->name;
			echo "I am Child, MF!<br />";
		}
	}

	$person = new Akash("Akash", "Sinha", 23);
	$person->statFunc();




































 ?>