<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$answerrrr = $_POST['answer'];
$answer = htmlentities($answerrrr);
$desc = $_POST['desc'];
$ques_id = $_POST['que_id'];
$user_id = $_POST['user_id'];
$created = $_POST['created'];
$user_name = $_POST['user_name'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
            $sqlCommand = "INSERT INTO `answers`(`answer`, `user_id`, `ques_id`, `created`, `user_name`, `answer_desc`) VALUES (:answer,:user_id,:ques_id,:created,:user_name,:answer_desc)";


            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':ques_id', $ques_id, PDO::PARAM_STR);
            $stmt->bindParam(':created', $created, PDO::PARAM_STR);
            $stmt->bindParam(':answer_desc', $desc, PDO::PARAM_STR);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
 

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>