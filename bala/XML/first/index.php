<?php 
// libxml_use_internal_errors(true);


// // $xml = simplexml_load_file("note.xml");
// $xml = simplexml_load_file("books.xml");

// if ($xml === false) {
// 	echo "Failed loading XML: ";
// 	foreach (libxml_get_errors() as $error) {
// 		echo "<br />", $error->message;
// 	}
// } else {
// 		// foreach ($xml as $key => $value) {
// 		// 	echo "<b>{$key}</b><br />";
// 		// 	foreach ($value as $v) {
// 		// 		echo $v . "<br />";
// 		// 	}
// 			foreach ($xml->children() as $books) {
// 				echo $books->title . ", ";
// 				echo $books->author . ", ";
// 				echo $books->year . ", ";
// 				echo $books->price . "<br />";
// 			}
		
// 		// echo $xml->to . "<br />";
// 		// echo $xml->from . "<br />";
// 		// echo $xml->heading . "<br />";
// 		// echo $xml->body . "<br />";
// 	}

// 	echo "<br />";

// 	echo $xml->book[0]->title . "<br />";
// 	echo $xml->book[1]->title . "<br />";


 ?>

 <?php
// Initialize the XML parser
$parser=xml_parser_create();

// Function to use at the start of an element
function start($parser,$element_name,$element_attrs) {
  switch($element_name) {
    case "NOTE":
    echo "-- Note --<br>";
    break;
    case "TO":
    echo "To: ";
    break;
    case "FROM":
    echo "From: ";
    break;
    case "HEADING":
    echo "Heading: ";
    break;
    case "BODY":
    echo "Message: ";
  }
}

// Function to use at the end of an element
function stop($parser,$element_name) {
  echo "<br>";
}

// Function to use when finding character data
function char($parser,$data) {
  echo $data;
}

// Specify element handler
xml_set_element_handler($parser,"start","stop");

// Specify data handler
xml_set_character_data_handler($parser,"char");

// Open XML file
$fp=fopen("note.xml","r");

// Read data
while ($data=fread($fp,4096)) {
  xml_parse($parser,$data,feof($fp)) or 
  die (sprintf("XML Error: %s at line %d", 
  xml_error_string(xml_get_error_code($parser)),
  xml_get_current_line_number($parser)));
}

// Free the XML parser
xml_parser_free($parser);
?>