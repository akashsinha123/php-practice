<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$blog_id = $_POST['blog_id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {

        $sqlCommand = "SELECT comments.user_id, comments.comment, comments.blog_id, comments.created, comments.user_name, users.extension FROM comments INNER JOIN `users` on comments.user_id = users.id WHERE blog_id = :blog_id";
        
    
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':blog_id'=>$blog_id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["user_id"] . '",';
            $outp .= '"comment":"'. $value["comment"]     . '",';
            $outp .= '"blog_id":"'. $value["blog_id"]     . '",';
            $outp .= '"created":"'. $value["created"]     . '",';
            $outp .= '"extension":"'. $value["extension"]     . '",';
            $outp .= '"user_name":"'. $value["user_name"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>