<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "SELECT project_id, project_name, project_description FROM projects";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["project_id"] . '",';
            $outp .= '"name":"'. $value["project_name"]     . '",';
            $outp .= '"desc":"'. $value["project_description"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>