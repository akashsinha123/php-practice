<?php 

define("EXEC") or die("You do not have access to this file");
require_once LIB_ROOT . 'database' . DS . 'database.php';



class MySQLAdaptor extends Database
{
	public function __construct($database = false){
		parent::__construct($database);
	}
}

 ?>