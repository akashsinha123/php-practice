<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select users.id, sug_id,sug_name, sug_desc, sug_created, users.name from (suggestions left join user_suggestion_relation on suggestions.id = user_suggestion_relation.sug_id) left join users on user_suggestion_relation.user_id = users.id ORDER BY sug_id DESC";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["id"] . '",';
            $outp .= '"name":"'  . $value["name"] . '",';
            $outp .= '"sug_id":"'  . $value["sug_id"] . '",';
            $outp .= '"sug_name":"'  . $value["sug_name"] . '",';
            $outp .= '"sug_created":"'  . $value["sug_created"] . '",';
            $outp .= '"description":"'. $value["sug_desc"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}


 ?>