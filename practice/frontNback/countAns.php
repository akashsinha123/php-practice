<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
            $sqlCommand = "SELECT COUNT(ques_id) count, question FROM (questions INNER JOIN `answers` on questions.id = answers.ques_id) GROUP BY ques_id HAVING count > 0";

            $stmt = $conn->prepare($sqlCommand);

            $stmt->execute() or die(mysql_error());
 

    $answers_array = array();
    while($row = $stmt->fetchAll()) {
        foreach ($row as $key => $value) {
            $temp_array = array();
            $temp_array['count'] = $value['count'];
            $temp_array['question'] = $value["question"];
            array_push($answers_array,$temp_array);
        }
        
    }

    echo json_encode(array('records'=>$answers_array));

  };

}




 ?>