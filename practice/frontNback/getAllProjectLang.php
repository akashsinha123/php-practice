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
        $sqlCommand = "SELECT * FROM language";
    } else{
        $sqlCommand = "SELECT * FROM language where lang_id NOT IN
(select language.lang_id from (projects left join lang_project_relation on projects.project_id = lang_project_relation.project_id) left join language on lang_project_relation.lang_id = language.lang_id WHERE projects.project_id = :id);";
    };

    
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["lang_id"] . '",';
            $outp .= '"name":"'. $value["lang_name"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>