<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select users.id, projects.project_id, projects.project_name from (users left join user_project_relation on users.id = user_project_relation.user_id) left join projects on user_project_relation.project_id = projects.project_id WHERE users.id = :id";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


    $answers_array = array();
    while($row = $stmt->fetchAll()) {
        foreach ($row as $key => $value) {
            $temp_array = array();
            $temp_array['project_id'] = $value['project_id'];
            $temp_array['user_id'] = $value["id"];
            $temp_array['project_name'] = $value['project_name'];
            
            array_push($answers_array,$temp_array);
        }
        
    }

    echo json_encode(array('records'=>$answers_array));


  };

}




 ?>