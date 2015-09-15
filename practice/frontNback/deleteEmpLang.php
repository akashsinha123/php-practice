<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$langId = $_POST['langId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
            $sqlCommand = "DELETE FROM `user_language_relation` WHERE language_id = :lang_id and user_id = :id";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':lang_id', $langId, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
 

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>