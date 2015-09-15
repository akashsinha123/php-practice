<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$comment = $_POST['comment'];
$blog_id = $_POST['blog_id'];
$user_id = $_POST['user_id'];
$created = $_POST['created'];
$user_name = $_POST['user_name'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
            $sqlCommand = "INSERT INTO `comments`(`comment`, `user_id`, `blog_id`, `created`, `user_name`) VALUES (:comment,:user_id,:blog_id,:created,:user_name)";


            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':blog_id', $blog_id, PDO::PARAM_STR);
            $stmt->bindParam(':created', $created, PDO::PARAM_STR);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
 

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>