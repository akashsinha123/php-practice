<?php

	require_once("ParentChild.php");
	
	$obj_parentchild = new ParentChild();	
	
	$obj_parentchild->db_host="localhost";
	$obj_parentchild->db_user="root";
	$obj_parentchild->db_pass="";
	$obj_parentchild->db_database="test"; 	
	
	if(!$obj_parentchild->db_connect()) {
		echo "<h1>Sorry! Could not connect to the database server.</h1>";	
		exit();	
	}
	
	$obj_parentchild->db_table="parentchild";	
	$obj_parentchild->item_identifier_field_name="ID";
	$obj_parentchild->parent_identifier_field_name="Parent_ID";
	$obj_parentchild->item_list_field_name="Name"; 
	
	$obj_parentchild->extra_condition="";
	$obj_parentchild->order_by_phrase=" ORDER BY `ID` ";
	
	$obj_parentchild->level_identifier="  ";
	$obj_parentchild->item_pointer="|-";
	
		
	
	
	$root_item_id=0;
	$all_childs=$obj_parentchild->getAllChilds($root_item_id); 
	
	echo "<pre>";
	foreach($all_childs as $chld) {
		echo $chld[$obj_parentchild->item_list_field_name]."<br />";
	}
	
	
	
	echo "<p><b>Example : the full path for element q : </b></p>";
	$item_id=15; 
	$item_path_array=$obj_parentchild->getItemPath($item_id); 
	foreach ($item_path_array as $val) { echo $val['Name']."->"; }
	
	$obj_parentchild->db_disconnect();
	

?>

<?php 



?>