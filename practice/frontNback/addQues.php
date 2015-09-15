<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$question = $_POST['question'];
$created = $_POST['created'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
            $sqlCommand = "INSERT INTO `questions`(`question`,`ques_created`) VALUES (:question,:ques_created)";
            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':question', $question, PDO::PARAM_STR);
            $stmt->bindParam(':ques_created', $created, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>