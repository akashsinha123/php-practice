<?php 

define("EXEC") or die("You do not have access to this file");

class Database
{

	private $Database = null;
	private $Host = null;
	private $Username = null;
	private $Password = null;

	//Tester properties

	private $IsConnected = false;
	private $Resource = null;
	private $DatabaseOpen = false;


	public function __construct($database = false){

	}

	public function Connect($host, $username, $password, $database = false){
		$this->Resource = mysql_connect($host, $username, $password);

		if ($this->Resource) {
			$this->IsConnected = true;

			if ($database) {
				$this->SelectDB($database);
			}
			return true;
		}
		return false;
	}

	public function SelectDB($database){
		if (!$this->Database) {
			$this->Database = $database;
			if (mysql_select_db($this->database)) {
				$this->DatabaseOpen = true;
			}
			return true;
		}
		return false;
	}
}


 ?>