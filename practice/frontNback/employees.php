<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "SELECT id, role, designation, extension, name, mobile, emergency_contact_no, Gender, blood_group, present_address, permanent_address, city, zipCode, email, dof_certificate FROM users";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $answers_array = array();
    while($row = $stmt->fetchAll()) {
        foreach ($row as $key => $value) {
            $temp_array = array();
            $temp_array['id'] = $value['id'];
            $temp_array['mobile'] = $value["mobile"];
            $temp_array['gender'] = $value['Gender'];
            $temp_array['permanent_address'] = $value['permanent_address'];
            $temp_array['blood_group'] = $value['blood_group'];
            $temp_array['address'] = $value['present_address'];
            $temp_array['dob'] = $value['dof_certificate'];
            $temp_array['city'] = $value['city'];
            $temp_array['zipCode'] = $value["zipCode"];
            $temp_array['email'] = $value['email'];
            $temp_array['emergency_contact_no'] = $value['emergency_contact_no'];
            $temp_array['name'] = $value['name'];
            $temp_array['role'] = $value['role'];
            $temp_array['designation'] = $value['designation'];
            $temp_array['extension'] = $value['extension'];
            
            array_push($answers_array,$temp_array);
        }
        
    }

    echo json_encode(array('records'=>$answers_array));


  };

}

// ORDER BY name

 ?>