<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sug_id = $_POST['sug_id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {

        $sqlCommand = "SELECT sugComments.user_id, sugComments.sug_comment, sugComments.sug_id, sugComments.sug_created, sugComments.user_name, users.extension FROM sugComments INNER JOIN `users` on sugComments.user_id = users.id WHERE sug_id = :sug_id";

    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':sug_id'=>$sug_id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["user_id"] . '",';
            $outp .= '"comment":"'. $value["sug_comment"]     . '",';
            $outp .= '"sug_id":"'. $value["sug_id"]     . '",';
            $outp .= '"created":"'. $value["sug_created"]     . '",';
            $outp .= '"extension":"'. $value["extension"]     . '",';
            $outp .= '"user_name":"'. $value["user_name"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>