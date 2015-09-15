<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$answ_id = $_POST['answ_id'];
$usersStr = implode(',', $answ_id);
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {

        $sqlCommand = "SELECT answerComments.id, answerComments.user_id, answerComments.comment, answerComments.answer_id, answerComments.created, answerComments.user_name, users.extension FROM answerComments INNER JOIN `users` on answerComments.user_id = users.id WHERE answer_id IN ({$usersStr})";
    
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


    $answers_array = array();
    while($row = $stmt->fetchAll()) {
        foreach ($row as $key => $value) {
            $temp_array = array();
            $temp_array['id'] = $value['id'];
            $temp_array['comment'] = $value["comment"];
            $temp_array['user_id'] = $value['user_id'];
            $temp_array['answer_id'] = $value['answer_id'];
            $temp_array['user_name'] = $value['user_name'];
            $temp_array['extension'] = $value['extension'];
            $temp_array['created'] = $value['created'];
            array_push($answers_array,$temp_array);
        }
        
    }

    echo json_encode(array('records'=>$answers_array));

  };

}




 ?>