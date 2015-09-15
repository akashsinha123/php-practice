<?php 
/**
 * MySQL database; only one connection is allowed;
 */
class Database
{
	private $_connection;
	// Store the single instance.
	private static $_instance;

	/**
	 *Get an instance of the Database. 
	 *@return Object Database
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct()
	{
		try {
			$this->_connection = new PDO('mysql:host=localhost;dbname=practice', 'root', '');
			$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	/**
	 * Empty clone magic method to prevent duplication.
	 */
	private function __clone()
	{

	}

	//get the MySQL connection
	public function getConnection()
	{
		return $this->_connection;
	}
	
}
















