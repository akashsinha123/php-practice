<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

// try {
// 	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 	// $sql = "CREATE TABLE myGuests (
// 	// 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// 	// 	firstname VARCHAR(30) NOT NULL,
// 	// 	lastname VARCHAR(30) NOT NULL,
// 	// 	email VARCHAR(50),
// 	// 	reg_date TIMESTAMP
// 	// 	)";
// 	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//     VALUES ('Akash', 'Sinha', 'akash@example.com')";
// 		$conn->exec($sql);
// 		$last_id = $conn->lastInsertId();
// 		echo "New record created successfully. Last inserted ID is: " . $last_id;
// 	} catch(PDOException $e){
// 		echo $sql . "<br />" . $e->getMessage();
// 	}

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // begin the transaction
//     $conn->beginTransaction();
//     // our SQL statememtns
//     $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
//     VALUES ('John', 'Doe', 'john@example.com')");
//     $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
//     VALUES ('Mary', 'Moe', 'mary@example.com')");
//     $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
//     VALUES ('Julie', 'Dooley', 'julie@example.com')");

//     // commit the transaction
//     $conn->commit();
//     echo "New records created successfully";
//     }
// catch(PDOException $e)
//     {
//     // roll back the transaction if something failed
//     $conn->rollback();
//     echo "Error: " . $e->getMessage();
//     }

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) 
//     	VALUES (:firstname, :lastname, :email)");
//     $stmt->bindParam(':firstname', $firstname);
//     $stmt->bindParam(':lastname', $lastname);
//     $stmt->bindParam(':email', $email);

//     $firstname = "Bicku";
//     $lastname = "Sinha";
//     $email = "sakash674@gmail.com";
//     $stmt->execute();

//     $firstname = "Bicku";
//     $lastname = "Sinha";
//     $email = "sakash674@gmail.com";
//     $stmt->execute();

//     $firstname = "Bicku";
//     $lastname = "Sinha";
//     $email = "sakash674@gmail.com";
//     $stmt->execute();

//     echo "New records created successfully";
//     }
// catch(PDOException $e)
//     {
//     // roll back the transaction if something failed
//     $conn->rollback();
//     echo "Error: " . $e->getMessage();
//     }


// 	$conn = null;

//  ?>

<?php
// echo "<table style='border: solid 1px black;'>";
// echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

// class TableRows extends RecursiveIteratorIterator { 
//     function __construct($it) { 
//         parent::__construct($it, self::LEAVES_ONLY); 
//     }

//     function current() {
//         return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
//     }

//     function beginChildren() { 
//         echo "<tr>"; 
//     } 

//     function endChildren() { 
//         echo "</tr>" . "\n";
//     } 
// } 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE MyGuests SET lastname='Doe' WHERE id=2"); 
    $stmt->execute();
    echo $stmt->rowCount() ."Row updated successfully";
    // set the resulting array to associative
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
    //     echo $v;
    // }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
//echo "</table>";
?>