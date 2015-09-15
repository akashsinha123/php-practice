<?php 

require 'config.php';

//old way & bad way;
# mysql_connect('localhost', 'username', 'password');

//Temporary
$id = 3;
$letter = 'A%';

try {
	$conn = new PDO('mysql:host=localhost;dbname=practice', $config['DB_USERNAME'], $config['DB_PASSWORD']);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/* Anti-pattern for selection data based on ID dynamically */
	# use $conn->query() method when you hardcode the value "ex id" or the entire string as in the below code. else use prepare statements;
	//$results = $conn->query('SELECT * FROM users WHERE id = 3');
	//$results = $conn->query('SELECT * FROM users WHERE id = ' . $conn->quote($id) );
	// foreach ($results as $row) {
	// 	print_r($row);
	// }

	//$stmt = $conn->prepare('SELECT * FROM users WHERE name LIKE :letter');
	$stmt = $conn->prepare('INSERT INTO users(name) VALUES(:name)');
	//$stmt->setFetchMode(PDO::FETCH_OBJ);
	// $stmt->execute(array(
	// 		'id' => $id
	// 	));

	$stmt->bindParam(':name', $name, PDO::PARAM_STR);

	$users = ['Ajay', 'Alok', 'Ravi'];

	foreach ($users as $name) {
		$stmt->execute();
	}

	// $name = "Ismail";
	// $stmt->execute();

	// $name = "Lokesh";
	// $stmt->execute();

	// $name = "Maneesh";
	// $stmt->execute();

	// $stmt->bindParam(':letter', $letter, PDO::PARAM_STR);
	// $stmt->execute();

	//$result = $stmt->fetchAll();
	//print_r($result);

	// while($row = $stmt->fetch()) {
	// 	print_r($row);
	// }


} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

 ?>