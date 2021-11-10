<?php

include "repository.php";

function plus($x, $y) {
	$result = $x + $y;
	add_calc($x,$y,"plus",$result);
	return $result;
}

function minus($x, $y) {
	$result = $x - $y;
	add_calc($x,$y,"minus",$result);
	return $result;
}

//echo(plus(11,12));
//echo(minus(22,12));
