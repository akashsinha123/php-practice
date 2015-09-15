<?php 
session_start();


session_destroy();

$SESSION = [];
//delete the cookie. ;
header("Location: login.php");
 ?>