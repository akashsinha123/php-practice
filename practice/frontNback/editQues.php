<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];
$question = $_POST['question'];
$id = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand =   "UPDATE `questions` SET `question`=:question WHERE id = :id";
    $stmt = $conn->prepare($sqlCommand);

    
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':question', $question, PDO::PARAM_STR);

    $stmt->execute() or die(mysql_error());

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    echo($outp);

  };

}