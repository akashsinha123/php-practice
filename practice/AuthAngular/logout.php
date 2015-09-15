<?php 
session_start();
require_once 'connection.php';


$email = 'sakash674@gmail.com';
$password = password_hash("admin", PASSWORD_DEFAULT);
$created_at = DateTime::RFC822;
$updated_at = DateTime::RFC822;



if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  
    echo("Logged out successfully");

};




 ?>