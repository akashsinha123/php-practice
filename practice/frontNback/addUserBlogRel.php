<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
            $sqlCommand = "SELECT MAX(`id`) FROM `blogs`";
            $stmt = $conn->prepare($sqlCommand);


            $stmt->execute() or die(mysql_error());

            while($row = $stmt->fetchAll()) {
		      foreach ($row as $key => $value) {
		        	$maxId = $value["MAX(`id`)"];
		        }
		    }

   $sqlCommandTwo = "INSERT INTO `user_blog_relation`(`user_id`,`blog_id`) VALUES (:id,:maxId)";
            $stmtt = $conn->prepare($sqlCommandTwo);

            
            $stmtt->bindParam(':maxId', $maxId, PDO::PARAM_STR);
            $stmtt->bindParam(':id', $id, PDO::PARAM_STR);

            $stmtt->execute() or die(mysql_error());

    $outp = $stmtt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>