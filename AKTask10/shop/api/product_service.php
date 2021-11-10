<?php

header("Content-Type: application/json; charset=UTF-8");
include("../../shop_params.php");


$conn = mysqli_connect(SERVER_URL, DB_USER, DB_PWD, DB_NAME);



$sql = "SELECT * FROM products";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_execute($stmt);
$cursor = mysqli_stmt_get_result($stmt);
$products = mysqli_fetch_all($cursor);

echo(json_encode($products, JSON_UNESCAPED_UNICODE));

mysqli_close($conn);

session_start();


if  (!isset($_SESSION["cart"])) {
    $carts = [];
    foreach($products as $product) {
        $carts[$product[0]] = 0;
    }
    $_SESSION["cart"] = $carts;
}

if  (!isset($_SESSION["products"])) {
    $products_map = [];
    foreach($products as $product) {
        $products_map[$product[0]]["name"] = $product[1];
        $products_map[$product[0]]["price"] = $product[2];
        $products_map[$product[0]]["quantity"] = $product[3];
    }
    $_SESSION["products"] = $products_map;
}
?>