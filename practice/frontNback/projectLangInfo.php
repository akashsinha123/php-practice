<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];
$id = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select language.lang_id, language.lang_desc, language.lang_name from (projects left join lang_project_relation on projects.project_id = lang_project_relation.project_id) left join language on lang_project_relation
.lang_id = language.lang_id WHERE projects.project_id = :id;";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["lang_id"] . '",';
            $outp .= '"name":"'. $value["lang_name"]     . '",';
            $outp .= '"desc":"'. $value["lang_desc"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>