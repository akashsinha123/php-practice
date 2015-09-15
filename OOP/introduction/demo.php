<?php 

/**
 * Define autoloader
 *@param string $class_name.
 */
function __autoload($class_name)
{
	include 'class.' . $class_name . '.php';
}

echo '<h2>Instantiating AddressResidence</h2>';
$address_residence = new AddressResidence();


echo '<h2>Setting properties...</h2>';
$address_residence->street_address_1 = '444 random street';
$address_residence->street_address_2 = '888 random street';
$address_residence->city_name = "Bangalore";
$address_residence->subdivision_name = 'State';
$address_residence->country_name = 'India';

echo $address_residence;

echo '<pre>' . var_export($address_residence, TRUE) . '</pre>';


echo '<h2>Testing Address __construct with an array</h2>';
$address_business = new AddressBusiness(array(
	'street_address_1' 	=> '123 new Colony',
	'street_address_2' 	=> 'T.C.Palem',
	'city_name' 		=> 'Vizag',
	'subdivision_name'	=> 'Region',
	'country_name'		=> 'India'
));
echo $address_business;
echo '<pre>' . var_export($address_business, TRUE) . '</pre>';


echo '<h2>Instantiating AddressPark</h2>';
$address_park = new AddressPark(array(
	'street_address_1' 	=> '283 Missing Circle',
	'street_address_2' 	=> 'Found It',
	'city_name' 		=> 'Visakhapatnam',
	'subdivision_name'  => 'Territory',
	'country_name'		=> 'Australia'
));

echo $address_park;
echo '<pre>' . var_export($address_park, TRUE) . '</pre>';

echo '<h2>Cloning AddressPark</h2>';
$address_park_clone = clone $address_park;
echo '<pre>' . var_export($address_park_clone, TRUE) . '</pre>';
echo '$address_park_clone is ' . ($address_park == $address_park_clone ? ' ' : 'not ') . 'a copy of $address_park.';

echo '<h2>Copying AddressBusiness reference</h2>';
$address_business_copy = $address_business;
echo '$address_business_copy is ' . ($address_business === $address_business_copy ? ' ' : 'not ') . 'a copy of $address_business.';

echo '<h2>Setting address_business_copy as a new AddressPark</h2>';
$address_business = new AddressPark();
echo '$address_business_copy is ' . ($address_business === $address_business_copy ? ' ' : 'not ') . 'a copy of $address_business.';

echo '<br />$address_business is class ' . get_class($address_business) . '.';
echo '<br />$address_business_copy is ' . ($address_business_copy instanceof AddressBusiness ? ' ' : 'not ') . 'an AddressBusiness';


echo '<h2>Testing typecasting to an object</h2>';
$test_object = (object) array(
	'hello' 	=> 'world',
	'nested' 	=> array('key' => 'value', 'inner' => array('grand_child' => 'Akash')),
);
echo '<pre>' . var_export($test_object, TRUE) . '</pre>';

echo '<h2>Testing typecasting to an object Again</h2>';
$test_object_two = (object) 12345;
echo '<pre>' . var_export($test_object_two, TRUE) . '</pre>';

// echo '<h2>Loading from database</h2>';
// $address_db = Address::load(1);
// echo '<pre>' . var_export($address_db, TRUE) . '</pre>';





 ?>

























