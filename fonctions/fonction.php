<?php

function somme(&$x, &$y){

	if( is_numeric($x) && is_numeric($y) ){
		echo $x+$y;
		echo "<br>";
	}
}


function somme2($x, $y, ...$z){

	if( is_numeric($x) && is_numeric($y) ){
		$total = 0;
		foreach ($z as $value) {
			$total += $value;
		}
		return $x+$y+$total." toto";
	}
}

echo somme2(10, 20);
echo "<br>";
echo somme2(100, 20, 5);
echo "<br>";
echo somme2(100, 20, 5, 12);
echo "<br>";
echo somme2(100, 20, 5, 12, 50, 17, 8, 2);
