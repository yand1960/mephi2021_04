<?php

header("Content-Type: application/json; charset=UTF-8");

include("../../shop_params.php");



$conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);

$sql = "SELECT * FROM products";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_execute($stmt); 
$cursor = mysqli_stmt_get_result($stmt); 
$products = mysqli_fetch_all($cursor);

//var_dump($courses);
echo(json_encode($products, JSON_UNESCAPED_UNICODE));

mysqli_close($conn);

?>