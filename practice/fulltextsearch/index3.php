<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');
$search_output = "";

$config = array(
			'username' => 'root',
			'password' => '',
			'database' => 'fulltext'
		);

try {
	$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['username'], $config['password']);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(Exception $e) {
	echo "Shit just got real<br />";
}

	

$sqlCommand = "SELECT * FROM pages";




	$stmt = $conn->prepare($sqlCommand);
	$stmt->execute() or die(mysql_error());

	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$count = $stmt->rowCount();
	
		
		while($row = $stmt->fetchAll()){
			print_r($row);
			echo "<br /><br />";
			foreach ($row as $key => $value) {
				// extract($value);
				// $id = $id;
				// $title = $title;
				// $id = $value['id'];
				// $title = $value['title'];
				// $search_output .= "Item ID: $id - $title<br />";
				echo "<br /><br />";
				print_r($value);
			}
		}
		echo "<br /><br />";


	$sql="SELECT * FROM pages";
		$res=mysql_query($sql);
		$childs=array();
		while($val=mysql_fetch_assoc($res)) {
			array_push($childs,$val);
			foreach ($val as $key => $value) {
				print_r($value);
			}
		}
		print_r($childs);	

 ?>
