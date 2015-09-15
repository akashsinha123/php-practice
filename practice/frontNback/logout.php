<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    
    $_SESSION['id'] = "";
    session_unset();
    session_destroy();
    $outp = "Successfully Logged Out";
    echo($outp);

  };

}




 ?>