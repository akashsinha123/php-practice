<?php

$config = array(
			'username' => 'root',
			'password' => '',
			'database' => 'fulltext'
		);


$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['username'], $config['password']);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sqlCommand = "SELECT * FROM pages";

$stmt = $conn->prepare($sqlCommand);
$stmt->execute() or die(mysql_error());
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);



$outp = "";
while($row = $stmt->fetchAll()) {
	foreach ($row as $key => $value) {
		if ($outp != "") {$outp .= ",";}
		    $outp .= '{"id":"'  . $value["id"] . '",';
		    $outp .= '"title":"'   . $value["page_title"]        . '",';
		    $outp .= '"body":"'. $value["page_body"]     . '"}'; 
		}
}
$outp ='{"records":['.$outp.']}';
echo($outp);
?>