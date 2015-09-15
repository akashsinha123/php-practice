<?php 

$config = array(
      'username' => 'root',
      'password' => '',
      'database' => 'connectMantra'
    );


$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['username'], $config['password']);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 ?>