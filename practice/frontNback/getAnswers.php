<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$que_id = $_POST['que_id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {

        $sqlCommand = "SELECT * FROM answers WHERE ques_id = :que_id";
    
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':que_id'=>$que_id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    $answers_array = array();
    while($row = $stmt->fetchAll()) {
        foreach ($row as $key => $value) {
            $temp_array = array();
            /*if ($outp != "") {$outp .= ",";}
                $outp .= '{"id":"'  . $value["id"] . '",';
                $outp .= '"answer":"'  . htmlspecialchars_decode($value["answer"]) . '",';
                $outp .= '"user_id":"'  . $value["user_id"] . '",';
                $outp .= '"que_id":"'  . $value["ques_id"] . '",';
                $outp .= '"user_name":"'  . $value["user_name"] . '",';
                $outp .= '"created":"'  . $value["created"] . '",';
                $outp .= '"answer_desc":"'. $value["answer_desc"]     . '"}';
            }*/
            $temp_array['id'] = $value['id'];
            $temp_array['answer'] = $value["answer"];
            $temp_array['user_id'] = $value['user_id'];
            $temp_array['que_id'] = $value['ques_id'];
            $temp_array['user_name'] = $value['user_name'];
            $temp_array['created'] = $value['created'];
            $temp_array['answer_desc'] = $value['answer_desc'];
            array_push($answers_array,$temp_array);
        }
        
    }
    //$outp ='{"records":['.$outp.']}';

    echo json_encode(array('records'=>$answers_array));

  };

}




 ?>