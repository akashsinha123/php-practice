<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$source_id = $_POST['source_id'];
$langId = $_POST['langId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    if (! empty($source_id)) {
            $sqlCommand = "DELETE FROM `language_source_relation` WHERE lang_id = :lang_id and source_id = :id";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':lang_id', $langId, PDO::PARAM_STR);
            $stmt->bindParam(':id', $source_id, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
        
    }

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>