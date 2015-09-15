<?php 

$search_output = "";

$config = array(
			'username' => 'root',
			'password' => '',
			'database' => 'test2'
		);

 try {
	$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['username'], $config['password']);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(Exception $e) {
	echo "Shit just got real<br />";
};

// $sqlCommand = "CREATE TABLE IF NOT EXISTS `parentchild` (
//   `ID` bigint(20) NOT NULL AUTO_INCREMENT,
//   `Parent_ID` bigint(20) NOT NULL,
//   `Name` varchar(250) DEFAULT NULL,
//   PRIMARY KEY (`ID`)
// ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31";

// $conn->exec($sqlCommand);

// $sqlCommand = "INSERT INTO `parentchild` (`ID`, `Parent_ID`, `Name`) VALUES
// (1, 0, 'level1'),
// (2, 0, 'level2'),
// (3, 1, 'level3'),
// (4, 1, 'level4'),
// (5, 3, 'level5'),
// (6, 3, 'level6'),
// (7, 5, 'level7'),
// (8, 5, 'level8'),
// (9, 6, 'level9'),
// (10, 6, 'level10'),
// (11, 7, 'level11'),
// (12, 7, 'level12'),
// (13, 8, 'level13'),
// (14, 8, 'level14'),
// (15, 11, 'level15'),
// (16, 11, 'level16'),
// (17, 12, 'level17'),
// (18, 12, 'level18'),
// (19, 4, 'level19'),
// (20, 4, 'level20'),
// (21, 19, 'level21'),
// (22, 19, 'level22'),
// (23, 22, 'level23'),
// (24, 22, 'level24'),
// (25, 2, 'level25'),
// (26, 2, 'level26'),
// (27, 25, 'level27'),
// (28, 25, 'level28'),
// (29, 26, 'level29'),
// (30, 26, 'level30');";

// $conn->exec($sqlCommand);

$db_table="parentchild";	
$item_identifier_field_name="ID";
$parent_identifier_field_name="Parent_ID";
$item_list_field_name="Name"; 

$extra_condition=""; //if required 
$order_by_phrase=" ORDER BY `ID` ";

$level_identifier="  ";
$item_pointer="|-";

$root_item_id=0;

$all_childs = array();
	
$item_path = array();


function getAllChilds($Parent_ID = 0, $level_identifier="", $start=true) {
	$extra_condition=""; //if required 
	$order_by_phrase=" ORDER BY `ID` ";
	$immediate_childs=getImmediateChilds($Parent_ID,  $extra_condition, $order_by_phrase);
	if(count($immediate_childs)) {
		foreach($immediate_childs as $chld) {
			$chld[$item_list_field_name]=$level_identifier.$item_pointer.$chld[$item_list_field_name];
			array_push($all_childs,$chld);
			$getAllChilds($chld[$item_identifier_field_name], ($level_identifier.$level_identifier), false);
		}
	}
	if($start) {
		return $all_childs; 
	}
}

function getImmediateChilds($parent_identifier_field_value, $extra_condition="", $order_by_phrase="") {

	$config = array(
			'username' => 'root',
			'password' => '',
			'database' => 'test2'
		);
		try {
		$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['username'], $config['password']);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(Exception $e) {
		echo "Shit just got real<br />";
	}
	$db_table="parentchild";	
	$item_identifier_field_name="ID";
	$parent_identifier_field_name="Parent_ID";
	$sql="SELECT * FROM `".$db_table."` WHERE `".$parent_identifier_field_name."`='".$parent_identifier_field_value."' ".$extra_condition." ".$order_by_phrase;
		// $res=mysql_query($sql);
		// $childs=array();
		// while($val=mysql_fetch_assoc($res)) {
		// 	array_push($childs,$val);
		// }
		// return $childs;	

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	while($row = $stmt->fetchAll()){
			//print_r($row);
			echo "<br /><br />";
			foreach ($row as $key => $value) {
				array_push($childs,$value);
			}
		}
		return $childs;

}

function getItemPath($item_id,$start=true){ //returns the total path of a given item/node(the list of elements starting from the top level root node to the given item/node)
	
	if($item_id != 0) {
		$sql="SELECT * FROM `".$db_table."` WHERE `".$item_identifier_field_name."`='".$item_id."' ";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$itemdata = $stmt->fetchAll();

		// while($itemdata = $stmt->fetchAll()){
		// 	//print_r($row);
		// 	echo "<br /><br />";
		// 	foreach ($row as $key => $value) {
		// 		array_push($childs,$value);
		// 	}
		// }
		array_push($item_path,$itemdata); 
	
		if($itemdata[$parent_identifier_field_name]!=0) {
			$item_path=$getItemPath($itemdata[$parent_identifier_field_name],false);
		} 
		if ($start) {
			$item_path=array_reverse($item_path);
		}
	}
	return $item_path;
	
}




$all_childs=getAllChilds($root_item_id);
print_r($all_childs); 
echo "<pre>";
foreach($all_childs as $chld) {
	echo $chld[$obj_parentchild->item_list_field_name]."<br />";
}



$stmt = $conn->prepare($sqlCommand);
$stmt->execute() or die(mysql_error());



?>