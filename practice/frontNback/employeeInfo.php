<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "SELECT id, name, designation, extension, dof_certificate,city, zipCode, email, blood_group, present_address, permanent_address, mobile, emergency_contact_no FROM users WHERE id = :id";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["id"] . '",';
            $outp .= '"name":"'  . $value["name"] . '",';
            $outp .= '"email":"'  . $value["email"] . '",';
            $outp .= '"zipCode":"'  . $value["zipCode"] . '",';
            $outp .= '"city":"'  . $value["city"] . '",';
            $outp .= '"dof_certificate":"'  . $value["dof_certificate"] . '",';
            $outp .= '"blood_group":"'  . $value["blood_group"] . '",';
            $outp .= '"present_address":"'  . $value["present_address"] . '",';
            $outp .= '"permanent_address":"'  . $value["permanent_address"] . '",';
            $outp .= '"mobile":"'  . $value["mobile"] . '",';
            $outp .= '"extension":"'  . $value["extension"] . '",';
            $outp .= '"designation":"'  . $value["designation"] . '",';
            $outp .= '"emergency_contact_no":"'. $value["emergency_contact_no"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>