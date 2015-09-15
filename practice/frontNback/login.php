<?php
session_start();


require_once 'connection.php';

$_SESSION['id'] = rand()*rand();

$username = $_POST['username'];
$password = $_POST['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "SELECT * FROM login WHERE username = :username and password = :password";
    $q = $conn->prepare($sql);
    $q->execute(array(':password'=>$password,
                      ':username'=>$username)) or die(mysql_error());
  $result = $q->setFetchMode(PDO::FETCH_ASSOC);

  $outp = "";
  if($row = $q->fetchAll()) {
    foreach ($row as $key => $value) {
          $outp .= '{"sessionId":"'  . $_SESSION["id"] . '",';
          $outp .= '"name":"'. $value["name"]     . '",';
          $outp .= '"id":"'. $value["user_id"]     . '",';
          $outp .= '"username":"'. $value["username"]     . '"}'; 
      }
      $outp ='{"records":['.$outp.']}';
      echo($outp);
  }else{
    die(mysql_error());
  }
  
}



?>