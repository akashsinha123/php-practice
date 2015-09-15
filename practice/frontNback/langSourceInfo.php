<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select language.lang_id, source.source_id, seq_no, source_name, source_address from (language left join language_source_relation on language.lang_id = language_source_relation.lang_id) left join source on language_source_relation.source_id = source.source_id WHERE language.lang_id = :id;";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["lang_id"] . '",';
            $outp .= '"seq_no":"'  . $value["seq_no"] . '",';
            $outp .= '"source_id":"'  . $value["source_id"] . '",';
            $outp .= '"address":"'  . $value["source_address"] . '",';
            $outp .= '"name":"'. $value["source_name"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>