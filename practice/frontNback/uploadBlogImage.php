<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$data = $_POST['dataURL'];
$name = $_POST['extention'];
$blogId = $_POST['blogId'];
$sess_id = $_SESSION['id'];





if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
      list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			$data = base64_decode($data);

			$extensionArray = explode(".", $name);

			$extension = $extensionArray[1];

			$path = 'blogsImages/' . $blogId . '.' . $extension ;

			file_put_contents($path, $data);

			$sqlCommand = "UPDATE `blogs` SET `extension` = :extension WHERE id = :blogId";

            $stmt = $conn->prepare($sqlCommand);

            $stmt->bindParam(':extension', $extension, PDO::PARAM_STR);
    		$stmt->bindParam(':blogId', $blogId, PDO::PARAM_STR);

            $stmt->execute() or die(mysql_error());
 

            $outp = $stmt->rowCount() . " records UPDATED successfully";
    
    echo($path);
  };

}




 ?>