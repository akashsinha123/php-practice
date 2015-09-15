<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];
$password = $_POST['password'];
$id = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "SELECT `password` FROM `login` WHERE user_id = :id";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  


      while($row = $stmt->fetchAll()) {
     	 foreach ($row as $key => $value) {
      		  	$oldpassword = $value["password"];
    	    }
    	}

    	if ($oldpassword == $password) {
    		echo "true";
    	}else{
    		echo "false";
    	}


  };

}




 ?>