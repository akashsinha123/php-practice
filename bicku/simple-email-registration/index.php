<!-- This is my controller;-->
<?php 

require 'functions.php';

if ( $_SERVER['REQUEST_METHOD'] == "POST") {
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);

	if ( empty($name) || empty($email) || !valid_email($email)) {
		$status = 'Please provde a name and valid email address.';
	} else {
		add_registration_user($name, $email);
		$status = "Thank you for registering. Your information has been added to our mailing list.";
	}
	
}


require 'index.tmpl.php';


 ?>