<?php 

$int = 122;
$min = 1;
$max = 200;

if (filter_var($int, FILTER_VALIDATE_INT, array('options' => array("min_range"=>$min, "max_range"=>$max))) === false) {
	echo "nop";
} else {
	echo "expression<br/>";
}
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
	echo "nop<br />";
} else {
	echo "yep<br />";
}

$url = "http://www.w3schools.com/php/showphp.asp?filename=demo_filter_adv3";
if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
	echo "$url yep<br />";
} else {
	echo "$url nop<br />";
}
$str = "<h1>Hello WorldÆØÅ!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo $newstr;
 ?>