<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($session_id == $sess_id) {
	echo "true";
}else{
	echo "false";
}






 ?>