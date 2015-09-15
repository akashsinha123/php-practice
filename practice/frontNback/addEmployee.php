<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

$name = $_POST['name'];
$employeeId = $_POST['employeeId'];
$number1 = $_POST['number'];
$emergencyNumber = $_POST['emergencyNumber'];
$birthday = $_POST['birthday'];
$birthdayOrig = $_POST['birthdayOrig'];
$bloodGroup = $_POST['bloodGroup'];
$gender = $_POST['gender'];
$presentAddress = $_POST['presentAddress'];
$permanentAddress = $_POST['permanentAddress'];
$correspondenceAddress = $_POST['correspondenceAddress'];
$pan_no = $_POST['pan_no'];
$city = $_POST['city'];
$zipCode = $_POST['zipCode'];
$email = $_POST['email'];
$F_H_name = $_POST['F_H_name'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "INSERT INTO `users`(`employee_id`, `name`, `dof_certificate`, `dof_original`, `blood_group`, `pan_no`, `father's/husband's_name`, `permanent_address`, `present_address`, `correspondence_address`, `mobile`, `emergency_contact_no`, `Gender`, `email`, `city`, `zipCode`) VALUES (:emp_id, :name, :dof_certificate, :dof_original, :blood_group, :pan_no, :F_H_name, :permanent_address, :present_address, :correspondence_address, :mobile, :emergency_contact_no, :Gender, :email, :city, :zipCode)";

        


    $stmt = $conn->prepare($sqlCommand);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':mobile', $number1, PDO::PARAM_STR);
    $stmt->bindParam(':emergency_contact_no', $emergencyNumber, PDO::PARAM_STR);
    $stmt->bindParam(':dof_certificate', $birthday, PDO::PARAM_STR);
    $stmt->bindParam(':blood_group', $bloodGroup, PDO::PARAM_STR);
    $stmt->bindParam(':present_address', $presentAddress, PDO::PARAM_STR);
    $stmt->bindParam(':permanent_address', $permanentAddress, PDO::PARAM_STR);
    $stmt->bindParam(':emp_id', $employeeId, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':city', $city, PDO::PARAM_STR);
    $stmt->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
    $stmt->bindParam(':dof_original', $birthdayOrig, PDO::PARAM_STR);
    $stmt->bindParam(':pan_no', $pan_no, PDO::PARAM_STR);
    $stmt->bindParam(':F_H_name', $F_H_name, PDO::PARAM_STR);
    $stmt->bindParam(':correspondence_address', $correspondenceAddress, PDO::PARAM_STR);
    $stmt->bindParam(':Gender', $gender, PDO::PARAM_STR);

    $stmt->execute() or die(mysql_error());

    $outp = $stmt->rowCount() . " records UPDATED successfully";
    echo($outp);

  };

}




 ?>