<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$max_id = $_POST['max_Id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {

   $sqlCommandTwo = "INSERT INTO `user_question_relation`(`user_id`,`que_id`) VALUES (:id,:max_id)";
            $stmtt = $conn->prepare($sqlCommandTwo);

            
            $stmtt->bindParam(':max_id', $max_id, PDO::PARAM_STR);
            $stmtt->bindParam(':id', $id, PDO::PARAM_STR);

            $stmtt->execute() or die(mysql_error());

    $outp = $stmtt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>