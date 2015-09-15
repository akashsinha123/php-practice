<?php 


class User {

	public $name;
	public $email;
	
	

	public function __construct($name, $email) {
		$this->name = $name;
		$this->email = $email;
	}

	public function getType() {
		return $this->type;
	}


}

class Admin extends User {

	public $permission_level;
	public $type = "Admin";
	public function __construct($name, $email, $permission_level) {
		parent::__construct($name, $email);
		$this->permission_level = $permission_level;
	}

	public function getType() {
		return 'Hello from '. parent::getType();
	}

}


class Member extends User {

	public $date_added;
	public $type = "Member";
	public function __construct($name, $email, $date_added) {
		parent::__construct($name, $email);
		$this->date_added = $date_added;
	}


}

 ?>














