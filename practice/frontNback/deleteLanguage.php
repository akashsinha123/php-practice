<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
        
            $sqlCommand = "DELETE FROM `language` WHERE lang_id = :id";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
        
    

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>