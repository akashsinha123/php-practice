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
(select language_id from (users left join user_language_relation on users.id = user_language_relation.user_id) left join language on user_language_relation.language_id = language.lang_id WHERE users.id = :id) ORDER BY `language`.`lang_name` ASC";
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