<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$projId = $_POST['projId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    if (! empty($projId)) {
        foreach ($projId as $entry) {
            $sqlCommand = "INSERT INTO `user_project_relation`(`user_id`,`project_id`) VALUES (:id,:projId)";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':projId', $entry, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
        }
    }

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>