<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select language.lang_id, lang_name, question_lang_relation.ques_id from (questions left join question_lang_relation on questions.id = question_lang_relation.ques_id) left join language on question_lang_relation.lang_id = language.lang_id";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"lang_name":"'  . $value["lang_name"] . '",';
            $outp .= '"ques_id":"'  . $value["ques_id"] . '",';
            $outp .= '"lang_id":"'. $value["lang_id"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}