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
        foreach ($langId as $entry) {
            $sqlCommand = "INSERT INTO `lang_project_relation`(`project_id`,`lang_id`) VALUES (:id,:lang_id)";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':lang_id', $entry, PDO::PARAM_STR);
            $stmt->bindParam(':id', $proj_id, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
        }
    }

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>