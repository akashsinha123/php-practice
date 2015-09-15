<?php 

class Database {

}

new Database();

class House {
	public $home_color = 'white';
	public $rooms = 3;

	public function __construct($home_color){
		$this->home_color = $home_color;
	}

	public function add_room() {
		$this->rooms++;
	}
}

$house = new House('red');
echo $house->home_color;

 ?>