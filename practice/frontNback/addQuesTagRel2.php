<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$langId = $_POST['id'];
$que_id = $_POST['que_id'];
$sess_id = $_SESSION['id'];



if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (! empty($langId)) {
      foreach ($langId as $entry) {
		  if ($sess_id == $session_id) {

		            $sqlCommand = "INSERT INTO `question_lang_relation`(`ques_id`, `lang_id`) VALUES (:ques_id,:lang_id)";
		            $stmt = $conn->prepare($sqlCommand);

		            
		            $stmt->bindParam(':ques_id', $que_id, PDO::PARAM_STR);
		            $stmt->bindParam(':lang_id', $entry, PDO::PARAM_STR);

		            $stmt->execute() or die(mysql_error());

		    $outp = $stmt->rowCount() . " records UPDATED successfully";
		    
		    echo($outp);

		  };
		}
	}

}




 ?>