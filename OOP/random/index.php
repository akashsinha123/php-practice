<?php 

require 'ObjParameter.php';

// function getPrice(Shape $shape)
// {
// 	return $shape->getArea() * 0.25;
// }

// $rect = new Rect(5,7);

// echo getPrice($rect) . "<br />";

// $circle = new Circle(5);

// echo getPrice($circle) . "<br />";

// echo $circle->getArea();

// $me = new Childss();
// echo "<br />";
// try {
// 	$me->error_handling(51);
// } catch (Exception $e) {
// 	echo $e->getMessage();
// }

// echo "<br />I passed";

$lazy = new LazyInit();

$lazy->getProperty();



 ?>