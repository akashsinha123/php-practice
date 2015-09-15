<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	echo "Post";

}

if ($_SERVER["REQUEST_METHOD"] == "GET")
{

	echo "get";

}
if ($_SERVER["REQUEST_METHOD"] == "PUT")
{

	echo "Put";

}
if ($_SERVER["REQUEST_METHOD"] == "DELETE")
{

	echo "Delete";

}



 ?>