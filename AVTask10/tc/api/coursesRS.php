<?php

header("Content-Type: application/json; charset=UTF-8");

include("../../inc/parameters.php");

//С точки зрения безопасности это ужас:
$conn = mysqli_connect(DB_URL,DB_USER,DB_PWD,"tc");

if (isset($_REQUEST["filter"]))
	$filter = $_REQUEST["filter"];
else
	$filter = "";
$filter .= "%";

$sql = "SELECT * FROM courses WHERE Name LIKE ? ";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt, "s", $filter);
mysqli_stmt_execute($stmt);
$cursor =  mysqli_stmt_get_result($stmt);
$courses = mysqli_fetch_all($cursor);

//var_dump($courses);
echo(json_encode($courses, JSON_UNESCAPED_UNICODE));

mysqli_close($conn);

?>
	