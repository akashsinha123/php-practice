<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select users.id, que_id, question, ques_created, users.name from (questions left join user_question_relation on questions.id = user_question_relation.que_id) left join users on user_question_relation.user_id = users.id ORDER BY que_id DESC";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["id"] . '",';
            $outp .= '"name":"'  . $value["name"] . '",';
            $outp .= '"que_id":"'  . $value["que_id"] . '",';
            $outp .= '"question":"'  . $value["question"] . '",';
            $outp .= '"ques_created":"'. $value["ques_created"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}


 ?>