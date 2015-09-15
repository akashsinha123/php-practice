<?php 
session_start();
require_once 'connection.php';


$session_id = $_POST['sessionId'];
$sess_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($sess_id == $session_id) {
    $sqlCommand = "select users.id, blogs.extension, blog_id,blog_name, blog_description, blogs.created, users.name from (blogs left join user_blog_relation on blogs.id = user_blog_relation.blog_id) left join users on user_blog_relation.user_id = users.id ORDER BY blog_id DESC";
    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute() or die(mysql_error());
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $outp = "";
    while($row = $stmt->fetchAll()) {
      foreach ($row as $key => $value) {
        if ($outp != "") {$outp .= ",";}
            $outp .= '{"id":"'  . $value["id"] . '",';
            $outp .= '"name":"'  . $value["name"] . '",';
            $outp .= '"blog_id":"'  . $value["blog_id"] . '",';
            $outp .= '"blog_name":"'  . $value["blog_name"] . '",';
            $outp .= '"blog_created":"'  . $value["created"] . '",';
            $outp .= '"extension":"'  . $value["extension"] . '",';
            $outp .= '"description":"'. $value["blog_description"]     . '"}';
        }
    }
    $outp ='{"records":['.$outp.']}';
    echo($outp);

  };

}


 ?>