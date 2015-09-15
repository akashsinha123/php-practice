<?php
	
abstract class Address implements Model
{
	//declaring constants
	const ADDRESS_TYPE_RESIDENCE =1;
	const ADDRESS_TYPE_BUSINESS = 2;
	const ADDRESS_TYPE_PARK = 3;

	//Address types
	public static $valid_address_types = array(
		Address::ADDRESS_TYPE_RESIDENCE => 'Residence',
		Address::ADDRESS_TYPE_BUSINESS => 'Business',
		Address::ADDRESS_TYPE_PARK => 'Park'
	);

	// Street address.
	public $street_address_1;
	public $street_address_2;

	// Name of the City.
	public $city_name;

	// Name of the subdivison.
	public $subdivision_name;

	//P Postal code.
	protected $_postal_code;

	// Name of the Country.
	public $country_name;

	//Primary key opf an Address.
	protected $_address_id = "837246";

	//Address type id.
	protected $_address_type_id;

	//when the record was created and last updated.
	protected $_time_created;
	protected $_time_updated;

	/**
	 * Post clone behavior.
	 */
	function __clone()
	{
		$this->_time_created = date("d-m-Y");
		$this->_time_updated = NULL;	
	}

	/**
	 *Constructor 
	 *@param array $data Optional array of property key and value.
	 */
	function __construct($data = array())
	{
		$this->_init();
		$this->_time_created = date("d-m-Y");

		//Ensure if the Address properties can be populated.
		if (!is_array($data)) {
			trigger_error('Unable to construct address with a ' . $name);
		}

		//If there is atlest one element in the $data array then populate the Address with it.

		if (count($data) > 0) {
			foreach ($data as $key => $value) {
				// Special case for protected properties.
				if (in_array($key, array(
					'time_created',
					'time_updated'
					))) {
					$key = '_' . $key;
				}
				$this->$key = $value;
			}
		}
	}

	/**
	 * Magic __get().
	 * @param string name.
	 * @return mixed.
	 */
	function __get($name)
	{
		// Postal code lookup if unset.
		if (!$this->_postal_code) {
			$this->_postal_code = $this->_postal_code_guess();
		}

		// Attempt to return a protected property by name.
		$protected_property_name = '_' . $name;
		if (property_exists($this, $protected_property_name)) {
			return $this->$protected_property_name;
		}

		// Unable to access the property by $name. Trigger error.
		trigger_error("Undefined property via __get: " . $name);
		return NULL;
	}

	/**
	 *Magic __set(). 
	 *@param string $name
	 *@param mixed $value.
	 */
	function __set($name, $value)
	{
		
		//Allow naything to set the postal_code.
		if ('postal_code' == $name) {
			$this->$name = $value;
			return; 
		}

		//Unable to access teh property $name; trigger error
		trigger_error("Undefined or unallowed property via __set(): " . $name);
	}

	/**
	 * Magic __toString.
	 *@return string.
	 */
	function __toString()
	{
		return $this->display();
	}

	/**
	 * Force the child/extended classes to define/implement _init() function.
	 */
	// abstract protected function _init();

	/**
	 * Guess the postal code give the subdivision and city name.
	 * @todo Replace with a database lookup.
	 * @return string.
	 */
	protected function _postal_code_guess()
	{
		$db = Database::getInstance();
		$conn = $db->getConnection();

		$stmt = $conn->prepare('SELECT postal_code FROM users WHERE expiry = 234 and id = 1');
		$result = $stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		return $user['postal_code'];
		
	}

	public function display()
	{
		$output = '';

		// Street address.
		$output .= $this->street_address_1;
		if ($this->street_address_2) {
			$output .= '<br />' . $this->street_address_2;
		}

		//City and subdivison.
		$output .= '<br />' . $this->city_name . ', ' . $this->subdivision_name;

		// postalcode.
		$output .= '<br />' . $this->postal_code;

		// Country
		$output .= '<br />' . $this->country_name;


		return $output;
	}

	public static function isValidAddressTypeId($address_type_id)
	{
		return array_key_exists($address_type_id, self::$valid_address_types);
	}

	/**
	 *If valid, set the address_type_id. 
	 *@param int $address_type_id.
	 */
	protected function _setAddressTypeId($address_type_id)
	{
		if (self::isValidAddressTypeId($address_type_id)) {
			$this->_address_type_id = $address_type_id;
		}
	}

	// /**
	//  * Load an Address
	//  *@param int $address_id.
	//  */
	// final public static function load($address_id)
	// {
	// 	// $db = Database::getInstance();
	// 	// $conn = $db->getConnection();

	// 	// $stmt = $conn->prepare('SELECT * FROM users WHERE id = "');
	// 	// $stmt->setFetchMode(PDO::FETCH_ASSOC);
	// 	// $result = $stmt->execute();
	// 	// if ($user = $stmt->fetch()) {
	// 	// 	//return self::getInstance($user['id'], $user);
	// 	// }
		
	// }

	// /**
	//  *Given an address_type_id, return an instance of that subclass. 
	//  *@param int $address_type_id
	//  *@param array $data
	//  *@return Address subclass
	//  */
	// // final public static function getInstance($address_type_id, $data = array())
	// // {
	// // 	$class_name = 'Address' . self::$valid_address_types[$address_type_id];
	// // 	return new $class_name($data);
	// // }

	/**
	 * Save an Address
	 */
	final public function save()
	{

	}
	
}
















































