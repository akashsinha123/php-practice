<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
            $sqlCommand = "SELECT MAX(`id`) FROM `questions`";
            $stmt = $conn->prepare($sqlCommand);


            $stmt->execute() or die(mysql_error());

            while($row = $stmt->fetchAll()) {
		      foreach ($row as $key => $value) {
		        	$maxId = $value["MAX(`id`)"];
		        }
		    }

    
    echo($maxId);

  };

}




 ?>