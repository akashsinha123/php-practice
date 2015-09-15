<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
            $sqlCommand = "INSERT INTO `language`(`lang_name`,`lang_desc`) VALUES (:name,:descrip)";

            $stmt = $conn->prepare($sqlCommand);

            
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':descrip', $desc, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
 

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}




 ?>