<?php 

function factorial($n){
	$result = $n;
	if ($result <= 1) {
		return 1;
	}
	for ($i=$n; $i > 1; $i--) { 
		$result *= ($i-1);
		
	}
	return $result;
}

function recursive($n){
	if ($n <=1) {
		return 1;
	}
	return $n * recursive($n - 1);
}


function fibonacci($x) {
	if ($x <= 2) {
		return 1;
	}
	$result = 1;
	$previous = 1;

	for ($i=$x; $i >2 ; $i--) { 
		$result = $result + $previous;
		$previous = $result - $previous;
	}
	return $result;
}

function recur_Fib($x) {
	if ($x <= 2) {
		return 1;
	}

	return (recur_Fib($x-2) + recur_Fib($x-1));
}


function gcd($x, $y) {
	while ($y != 0) {
		$temp = $y;
		$y = $x % $y;
		$x = $temp;
	}

	return $x;
}

function recur_Gcd($x, $y){
	if ($y == 0) {
		return $x;
	}

	return recur_Gcd($y, $x % $y);
}


echo factorial(10)."<br />";
echo recursive(10)."<br />";
echo fibonacci(12)."<br />";
echo recur_Fib(12)."<br />";
echo gcd(24,36)."<br />";
echo recur_Gcd(24,36);


 ?>