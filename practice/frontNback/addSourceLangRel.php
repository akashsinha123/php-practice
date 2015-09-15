<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$langId = $_POST['langId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
            $sqlCommand = "SELECT MAX(`source_id`) FROM `source`";
            $stmt = $conn->prepare($sqlCommand);


            $stmt->execute() or die(mysql_error());

            while($row = $stmt->fetchAll()) {
		      foreach ($row as $key => $value) {
		        	$maxId = $value["MAX(`source_id`)"];
		        }
		    }

   $sqlCommandTwo = "INSERT INTO `language_source_relation`(`lang_id`,`source_id`) VALUES (:langId,:maxId)";
            $stmtt = $conn->prepare($sqlCommandTwo);

            
            $stmtt->bindParam(':maxId', $maxId, PDO::PARAM_STR);
            $stmtt->bindParam(':langId', $langId, PDO::PARAM_STR);

            $stmtt->execute() or die(mysql_error());

    $outp = $stmtt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>