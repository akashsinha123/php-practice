<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

$name = $_POST['name'];
$number1 = $_POST['number'];
$emergencyNumber = $_POST['emergencyNumber'];
$birthday = $_POST['birthday'];
$bloodGroup = $_POST['bloodGroup'];
$presentAddress = $_POST['presentAddress'];
$designation = $_POST['designation'];
$permanentAddress = $_POST['permanentAddress'];
$id = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand =   "UPDATE `users` SET `name`=:name, `designation`=:designation, `dof_certificate`=:birthday,`blood_group`=:bloodGroup,`permanent_address`=:permanentAddress,`present_address`=:presentAddress,`mobile`=:number1,`emergency_contact_no`=:emergencyNumber WHERE id = :id";

    $stmt = $conn->prepare($sqlCommand);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':designation', $designation, PDO::PARAM_STR);
    $stmt->bindParam(':number1', $number1, PDO::PARAM_STR);
    $stmt->bindParam(':emergencyNumber', $emergencyNumber, PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $stmt->bindParam(':bloodGroup', $bloodGroup, PDO::PARAM_STR);
    $stmt->bindParam(':presentAddress', $presentAddress, PDO::PARAM_STR);
    $stmt->bindParam(':permanentAddress', $permanentAddress, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);

    $stmt->execute() or die(mysql_error());

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    echo($outp);

  };

}




 ?>