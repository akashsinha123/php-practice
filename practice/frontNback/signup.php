<?php 

require_once 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
		// new data
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email_id'];

$check_email = explode("@", $email);
$email_check = $check_email[1];
	if ( $email_check == "mantralabsglobal.com") {

		$sqlCommand = "SELECT id FROM `users` WHERE email = :email";
	    $stmt = $conn->prepare($sqlCommand);
	    $stmt->execute(array(':email'=>$email)) or die(mysql_error());
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	    $outp = "";
	    while($row = $stmt->fetchAll()) {
	      foreach ($row as $key => $value) {
	      	$user_id = $value['id'];
	        if ($outp != "") {$outp .= ",";}
	            $outp .= '{"id":"'  . $value["id"] . '",';
	        }
	    }

				// query
		$sql = "SELECT username FROM login WHERE username = :username";
	    $q = $conn->prepare($sql);
	    $q->execute(array(':username'=>$username)) or die(mysql_error());
	  	$result = $q->setFetchMode(PDO::FETCH_ASSOC);

		if($row = $q->fetchAll()) {
		   	$outp = "username already exists";
		   	$outp ='{"records":['.$outp.']}';
			echo($outp);
		}else{
		    $sql = "INSERT INTO login (username,password,name,email, user_id) VALUES (:username,:password,:name, :email, :user_id)";
			$stmt = $conn->prepare($sql);
		    $stmt->execute(array(':password'=>$password,
							  ':name'=>$name,
							  ':email'=>$email,
							  ':user_id'=>$user_id,
			                  ':username'=>$username)) or die(mysql_error());
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		    $outp .= '"message":"'. "You've Successfully Signed up"     . '"}';

			$outp ='{"records":['.$outp.']}';
			echo($outp);
		}
	}else{
		$outp = "Please enter mantralabs email_id";
		echo($outp);
	}


}




 ?>