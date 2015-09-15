<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$id = $_POST['id'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select seq_no, blog_name, blog_description from (users left join user_blog_relation on users.id = user_blog_relation.user_id) left join blogs on user_blog_relation.blog_id = blogs.id WHERE users.id = :id;";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute(array(':id'=>$id)) or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["seq_no"] . '",';
            $outp .= '"name":"'  . $value["blog_name"] . '",';
            $outp .= '"description":"'. $value["blog_description"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}




 ?>