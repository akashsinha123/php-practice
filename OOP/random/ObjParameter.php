<?php 

interface Shape {
	public function getArea();
}

class Rect implements Shape
{
	public $width;
	public $height;

	public function __construct($width, $height)
	{
		$this->width = $width;
		$this->height = $height;
	}

	public function getArea()
	{
		return $this->width*$this->height;
	}
}

class Circle implements Shape
{
	public $radius;

	public function __construct($radius)
	{
		$this->radius = $radius;
	}

	public function getArea()
	{
		return $this->radius*$this->radius*3.14159;
	}
}

class Parentss 
{
	public function  __construct()
	{
		echo "hahahaha";
	}
}

class Childss extends Parentss
{
	public function error_handling($number){
		if ($number < 10) {
			echo "Well Done";
		}else {
			throw new Exception('You shall not PAaassssss!!!', 1000);
		}
		
	}
}

class Excep 
{
	 private $message;

	 public function __construct($msg)
	 {
	 	$this->message = $msg;
	 }

	 public function getMessage()
	 {
	 	return $this->message;
	 }
}

class LazyInit
{
	protected $_prop;
	function getProperty()
	{
		if (is_null($this->_prop)) {
			$this->_prop = 'init';
		}
		return $this->_prop;
	}
}




 ?>