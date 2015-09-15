<?php 

define("EXEC") or die("You do not have access to this file");
require_once LIB_ROOT . 'database' . DS . 'mysql.php';

class Logic
{
	public $db = null;

	public function __construct(){
		$config = new Config();
		$this->db = new MySQLAdaptor();
		$this->db->Connect($config->Host, $config->Username, $config->Password, "youtube");
	}

	public function get($property, $object = false){

		if (property_exists($this, $property)) {
			return $this->$property;
		}

		if ($object) {
			if (property_exists($object, $property)) {
				return $object->$property;
			}
			if (property_exists($this, $object)) {
				if (property_exists($this->$object, $property)) {
					return $this->$object->$property;
				}
			}
		}
		return false;
	}

}

 ?>