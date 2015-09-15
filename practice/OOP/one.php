<?php 

require 'one_class.php';


$user1 = new Member('Akash', 'sakash674@gmail.com', 'Mar 17');

echo $user1->getType();

echo "<br /><br />";

$user1 = new Admin('Akash', 'sakash674@gmail.com', 4);

echo $user1->getType();

