<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th, td {
		padding: 5px;
	}
	</style>
</head>
<body>
<table>
	<tr>
		<td>Filter Name</td>
		<td>Filter ID</td>
	</tr>
	<?php 
		foreach (filter_list() as $id => $filter) {
			echo '<tr><td>'. $filter . '</td><td>'. filter_id($filter) . '</td><tr>';
		}
	 ?>
</table>


	 <?php 

	 $str = "<h1>Good day</h1>";
	 $newstr = filter_var($str, FILTER_SANITIZE_STRING);
	 echo $newstr;
	 echo $str;
	  ?>
	  <?php 
	  $email = "sakash674@gmail.com";
	  $email = filter_var($email, FILTER_SANITIZE_STRING);

	  if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	  	echo "done";
	  } else {
	  	echo "not done";
	  }

	   ?>
	
</body>
</html>