<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$length = $_POST['length'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    if ($length == 0) {
        $sqlCommand = "SELECT * FROM projects";
    } else{
        $sqlCommand = "SELECT * FROM projects where project_id NOT IN
(select projects.project_id from (users left join user_project_relation on users.id = user_project_relation.user_id) left join projects on user_project_relation.project_id = projects.project_id WHERE users.id = :id) ORDER BY `projects`.`project_name` ASC";
    };

    
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["project_id"] . '",';
            $outp .= '"description":"'  . $value["project_description"] . '",';
            $outp .= '"name":"'. $value["project_name"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>