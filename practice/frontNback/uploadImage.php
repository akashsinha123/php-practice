<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$data = $_POST['dataURL'];
$name = $_POST['extention'];
$userId = $_POST['userId'];
$sess_id = $_SESSION['id'];





if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
      list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			$data = base64_decode($data);

			$extensionArray = explode(".", $name);

			$extension = $extensionArray[1];

			$path = 'images/' . $userId . '.' . $extension ; 

			file_put_contents($path, $data);

			$sqlCommand = "UPDATE `users` SET `extension` = :extension WHERE id = :userId";

            $stmt = $conn->prepare($sqlCommand);

            $stmt->bindParam(':extension', $extension, PDO::PARAM_STR);
    		$stmt->bindParam(':userId', $userId, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
 

            $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($path);
  };

}




 ?>