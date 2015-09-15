<?php 	
class ParentChild {	
	var $db_host;
	var $db_user;
	var $db_pass;
	var $db_database;
	var $db_table; 
	
	
	var $item_identifier_field_name;  
	var $parent_identifier_field_name; 
	var $item_list_field_name; 
	var $extra_condition="";  
	var $order_by_phrase="";  
	
	
	
	
	var $level_identifier = "  ";  
	var $item_pointer = "|-"; 
	
	
	
	var $all_childs = array(); 
	
	var $item_path = array(); 
	
	public function getAllChilds($Parent_ID, $level_identifier="", $start=true) { 
		$immediate_childs=$this->getImmediateChilds($Parent_ID,  $this->extra_condition, $this->order_by_phrase);
		if(count($immediate_childs)) {
			foreach($immediate_childs as $chld) {
				$chld[$this->item_list_field_name]=$level_identifier.$this->item_pointer.$chld[$this->item_list_field_name];
				array_push($this->all_childs,$chld);
				$this->getAllChilds($chld[$this->item_identifier_field_name], ($level_identifier.$this->level_identifier), false);
			}
		}
		if($start) {
			return $this->all_childs; 
		}
	} 
	
	private function getImmediateChilds($parent_identifier_field_value, $extra_condition="", $order_by_phrase="") { // get only the direct/immediate childs under a parent 
		$sql="SELECT * FROM `".$this->db_table."` WHERE `".$this->parent_identifier_field_name."`='".$parent_identifier_field_value."' ".$extra_condition." ".$order_by_phrase;
		$res=mysql_query($sql);
		$childs=array();
		while($val=mysql_fetch_assoc($res)) {
			array_push($childs,$val);
		}
		return $childs;	
	}
	
	public function getItemPath($item_id,$start=true){ 
		
		if($item_id != 0) {
			$sql="SELECT * FROM `".$this->db_table."` WHERE `".$this->item_identifier_field_name."`='".$item_id."' ";
			$res=mysql_query($sql);
			$itemdata=mysql_fetch_assoc($res);
			array_push($this->item_path,$itemdata); 
		
			if($itemdata[$this->parent_identifier_field_name]!=0) {
				$this->item_path=$this->getItemPath($itemdata[$this->parent_identifier_field_name],false);
			} 
			if ($start) {
				$this->item_path=array_reverse($this->item_path);
			}
		}
		return $this->item_path;
		
	}
	
	public function db_connect(){
		$conn = mysql_connect($this->db_host, $this->db_user, $this->db_pass); 
		if($conn) {
			mysql_select_db($this->db_database, $conn);
		} 
		return $conn;
	}
	
	public function db_disconnect(){
		mysql_close();
	}
} 
?>