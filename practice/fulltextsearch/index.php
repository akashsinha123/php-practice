<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');
$search_output = "";

$config = array(
			'username' => 'root',
			'password' => '',
			'database' => 'fulltext'
		);



// $sqlCommand = "CREATE TABLE pages (
// 				id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
// 				page_title VARCHAR(255),
// 				page_body TEXT,
// 				page_views INT NOT NULL default '0',
// 				FULLTEXT (page_title,page_body)
// 			) ENGINE=MyISAM";
// $conn->exec($sqlCommand);
// echo "Success creating Pages table<br />";

// $sqlCommand = "CREATE TABLE blog (
// 				id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
// 				blog_title VARCHAR(255),
// 				blog_body TEXT,
// 				blog_views INT NOT NULL default '0',
// 				FULLTEXT (blog_title,blog_body)
// 			) ENGINE=MyISAM";
// $conn->exec($sqlCommand);
// echo "Success creating Blog table<br />";

// $sqlCommand = "INSERT INTO pages (page_title,page_body) VALUES
//               ('PHP Random Number','Learn to generate a random number using PHP blah blah blah'),
//               ('Javascript Clock','Build a Javascript digital clock in this tutorial blah blah blah'),
//               ('Flash Gallery','Use Actionscript to build a Flash Photo gallery blah blah blah'),
//               ('XML RSS FEED','Learn to assemble XML RSS Feeds for your website blah blah blah'),
//               ('CSS Shadows','Learn text and container shadow techniques using CSS blah blah blah'),
//               ('HTML5 Canvas Tag','Learn how to animate the HTML5 Canvas tag using blah blah blah'),
// 	      ('PHP Calculator','Learn to build a working calculator using PHP and blah blah blah'),
//               ('Flash Website','Learn to create a full flash website template blah blah blah')";

// $conn->exec($sqlCommand);
// echo "Success populating the pages table with data<br />";

// $sqlCommand = "INSERT INTO blog (blog_title,blog_body) VALUES
//               ('Trip to Disney World','Disney world would have been fun if I were 10 blah blah blah'),
//               ('Refrigeration School','I graduated school finally after blah blah blah'),
//               ('Big Giant Doodoo','In the bathroom today I made the biggest doodoo blah blah blah'),
//               ('New Pet Bird','Today I got a new bird that repeats everything blah blah blah'),
//               ('Pet Bird Died','My cat ate my bird today so as punishment I blah blah blah')";

// $conn->exec($sqlCommand);
// echo "Success populating the blog table with data<br />";

if(isset($_POST['searchquery']) && $_POST['searchquery'] != ""){
	$searchquery = preg_replace('#[^a-z 0-9?!]#i', '', $_POST['searchquery']);
	if($_POST['filter1'] == "Whole Site"){
		$sqlCommand = "(SELECT id, page_title AS title FROM pages WHERE page_title 
			LIKE '%$searchquery%' OR page_body LIKE '%$searchquery%') UNION 
			(SELECT id, blog_title AS title FROM blog WHERE blog_title LIKE '%$searchquery%' OR blog_body 
				LIKE '%$searchquery%')";
	} else if($_POST['filter1'] == "Pages"){
		$sqlCommand = "SELECT id, page_title AS title FROM pages WHERE page_title LIKE '%$searchquery%' 
		OR page_body LIKE '%$searchquery%'";
	} else if($_POST['filter1'] == "Blog"){
		$sqlCommand = "SELECT id, blog_title AS title FROM blog WHERE blog_title LIKE '%$searchquery%' 
		OR blog_body LIKE '%$searchquery%'";

	}
    try {
		$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['username'], $config['password']);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(Exception $e) {
		echo "Shit just got real<br />";
	}

	$stmt = $conn->prepare($sqlCommand);
	$stmt->execute() or die(mysql_error());
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$count = $stmt->rowCount();
	if($count > 0){
		$search_output .= "<hr />{$count} results for <strong>$searchquery</strong><hr />$sqlCommand<hr />";
		while($row = $stmt->fetchAll()){
			foreach ($row as $key => $value) {
				// extract($value);
				// $id = $id;
				// $title = $title;
				$id = $value['id'];
				$title = $value['title'];
				$search_output .= "Item ID: $id - $title<br />";
			}
                }
	} else {
		$search_output = "<hr />0 results for <strong>$searchquery</strong><hr />$sqlCommand";
	}
}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>

 	<h2>Search the Exercise Tables:</h2>
 	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		Search For: <input type="text" name="searchquery" size="80" maxlength="88">
		<input type="submit" name="myBtn">
		<br /><br />
		Within:
		<select name="filter1">
			<option value="Whole Site">Whole Site</option>
			<option value="Pages">Pages</option>
			<option value="Blog">Blog</option>
		</select>
 	</form>

 	<div>
 		<?php echo $search_output; ?>
 	</div>
 	
 </body>
 </html>