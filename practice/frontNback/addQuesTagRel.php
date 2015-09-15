<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$langId = $_POST['id'];
$max_Id = $_POST['max_Id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    if (! empty($langId)) {
      foreach ($langId as $entry) {
        $sqlCommandTwo = "INSERT INTO `question_lang_relation`(`lang_id`,`ques_id`) VALUES (:id,:max_Id)";
            $stmtt = $conn->prepare($sqlCommandTwo);

            $stmtt->bindParam(':max_Id', $max_Id, PDO::PARAM_STR);
            $stmtt->bindParam(':id', $entry, PDO::PARAM_STR);

            $stmtt->execute() or die(mysql_error());
      }
    }

    $outp = $stmtt->rowCount() . " records UPDATED successfully";
    
    echo($outp);

  };

}





 ?>