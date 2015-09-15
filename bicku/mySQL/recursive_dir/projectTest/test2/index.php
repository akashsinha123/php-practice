<?php 

// class Collection implements \Iterator 
// {
// 	protected $data;

// 	public function __construct(array $data)
// 	{
// 		$this->data = data;
// 	}

// 	public function current()
// 	{
// 		return current($this->data);
// 	}

// 	public function next()
// 	{
// 		return next($this->data);
// 	}

// 	public function key()
// 	{
// 		return key($this->data);
// 	}

// 	public function rewind()
// 	{
// 		return reset($this->data);
// 	}

// 	public function valid()
// 	{
// 		return key($this->) !==null;
// 	}
// }

 ?>
<?php 

$data = array(
	'title'		=>'my title',
	'posts'		=> array(
		array(
			'title'		=>'my Inner Title.',
			'email'		=> 'JohnDoe@dv.com'
		),
		array(
			'title'		=> 'my second inner title.',
			'email' 	=> 'aaabbbb@bbbaaa.com'
		)
	)
);

foreach ($data as $key => $value) {
	echo $key . " =>" . $value;
}
echo "<br />";
echo "<br />";
echo "<br />";
foreach (new RecursiveArrayIterator($data) as $key => $value) {
	echo $key . " => " . $value . "\n";
}
echo "<br />";
echo "<br />";
echo "<br />";


$rec_Data = new RecursiveArrayIterator($data);

foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($data), 0) as $key => $value) {
	echo $key . " => " . $value . "<br />";
}

echo "<br />";
echo "<br />";
echo "<br />";

foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($data), 1) as $key => $value) {
	echo $key . " => " . $value . "<br />";
}

echo "<br />";
echo "<br />";
echo "<br />";

foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($data), 2) as $key => $value) {
	echo $key . " => " . $value . "<br />";
}

echo "<br />";
echo "<br />";
echo "<br />";

foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($data), 16) as $key => $value) {
	echo $key . " => " . $value . "<br />";
}

echo "<br />";
echo "<br />";
echo "<br />";


 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>

 	<pre>
 		<?php 
 			print_r($data);
 		 ?>
 	</pre>
	<br /><br /><br />
 	<pre>
 		<?php 
 			//print_r($rec_Data);
 		 ?>
 	</pre>
 	
 </body>
 </html>








































