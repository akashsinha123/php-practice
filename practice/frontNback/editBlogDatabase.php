<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

$name = $_POST['name'];
$id = $_POST['id'];
$description = $_POST['description'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand =   "UPDATE `blogs` SET `blog_name`=:name,`blog_description`=:description WHERE id = :id";

    $stmt = $conn->prepare($sqlCommand);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);

    $stmt->execute() or die(mysql_error());

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    echo($outp);

  };

}