<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$name = $_POST['name'];
$created = $_POST['created'];
$description = $_POST['description'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
            $sqlCommand = "INSERT INTO `blogs`(`blog_name`,`blog_description`, created) VALUES (:name,:description, :created)";
            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':created', $created, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>