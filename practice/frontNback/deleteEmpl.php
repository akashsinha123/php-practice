<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$emplId = $_POST['emplId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
        
            $sqlCommand = "DELETE FROM `users` WHERE id = :id";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':id', $emplId, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
        
    

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>