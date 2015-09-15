<?php 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $sqlCommand = "SELECT * FROM users";

  $stmt = $conn->prepare($sqlCommand);
  $stmt->execute() or die(mysql_error());
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $outp = "";
  while($row = $stmt->fetchAll()) {
    foreach ($row as $key => $value) {
      if ($outp != "") {$outp .= ",";}
          $outp .= '{"id":"'  . $value["id"] . '",';
          $outp .= '"name":"'. $value["name"]     . '"}'; 
      }
  }
  $outp ='{"records":['.$outp.']}';
  echo($outp);

}


 . $_POST['username'] . " and password =" . $_POST['password']

 ?>