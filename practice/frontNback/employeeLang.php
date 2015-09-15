<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select users.id, language_id, lang_name from (users left join user_language_relation on users.id = user_language_relation.user_id) left join language on user_language_relation.language_id = language.lang_id";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $answers_array = array();
    while($row = $stmt->fetchAll()) {
        foreach ($row as $key => $value) {
            $temp_array = array();
            $temp_array['language_id'] = $value['language_id'];
            $temp_array['user_id'] = $value["id"];
            $temp_array['lang_name'] = $value['lang_name'];
            
            array_push($answers_array,$temp_array);
        }
        
    }

    echo json_encode(array('records'=>$answers_array));

  };

}




 ?>