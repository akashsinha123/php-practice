<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$proj_id = $_POST['id'];
$langId = $_POST['lang_id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    if (! empty($langId)) {
            $sqlCommand = "DELETE FROM `lang_project_relation` WHERE lang_id = :lang_id and project_id = :id";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':lang_id', $langId, PDO::PARAM_STR);
            $stmt->bindParam(':id', $proj_id, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
    }

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>