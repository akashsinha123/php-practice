<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];
$password = $_POST['password'];
$id = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "UPDATE `login` SET `password`= :password WHERE user_id = :id";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id,
                           ':password'=>$password )) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  


    $outp = $stmt->rowCount() . " records UPDATED successfully";
    echo($outp);

  };

}




 ?>