<?php 

$to = $_POST['gmail'];

$email = 'sakash674@gmail.com';

$subject = "Reset password";

$link = "sdjhvbhbsdbvbsdfvnbmbndfsmvbsjkbvjdbsfbvmdf";

$body = <<<EMAIL
Click the below link to reset your password
$link

EMAIL;

$header = "From: $email";

if ($_POST) {
	if ($to != "") {
		mail($to, $subject, $body, $header);
		echo "Sent";
	}
}

 ?>