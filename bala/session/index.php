<?php 
session_start();

$_SESSION['username'] = "Akash Sinha";
$_SESSION['password'] = "Mantra";

session_unset();
session_destroy();
 ?>