<?php

	header("Content-Type: application/json; text/html; charset=UTF-8");
	$conn = mysqli_connect("localhost:3306","root","","tc");

	if (isset($_REQUEST["filter"]))
		$filter = $_REQUEST["filter"];
	else
		$filter="";
	$filter .= "%";

	$sql = "SELECT * from courses where Name like ? ";
	$stmt = mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_param($stmt,"s",$filter);
	mysqli_stmt_execute($stmt); 
	$cursor = mysqli_stmt_get_result($stmt); 
	$courses = mysqli_fetch_all($cursor);

	//var_dump($courses);
	echo(json_encode($courses, JSON_UNESCAPED_UNICODE)); 

	mysqli_close($conn);

?>