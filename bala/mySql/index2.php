<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

    try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests "); 
            $stmt->execute(); 
            $data = $stmt->fetchAll();
            foreach ($data as $post) {
                echo "<tr><td>{$post['id']}</td><td>{$post['firstname']}</td><td>{$post['lastname']}</td></tr>";
            }


        } catch(Exception $e) {
            echo "nop";
        }



$conn = null;
echo "</table>";
?>