<?php 
	
	$user = 'root';
	$pass = '';
	$db = 'testdb';

	$db = new mysqli('localhost', $user, $pass) or die('Unable to connect');

	echo "Finally MySQL!!!";

 ?>