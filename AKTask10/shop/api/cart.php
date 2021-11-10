
<?php

header('charset=utf-8');
mb_internal_encoding("UTF-8");
session_start();

$response = [];

if (isset($_SESSION["cart"]) && isset($_SESSION["products"])) {
    $cart = $_SESSION["cart"];
    $products = $_SESSION["products"];

    foreach($products as $product_id => $product) {
        $response[$product_id]["name"] = $product["name"];
        $response[$product_id]["quantity"] = $cart[$product_id];
        $response[$product_id]["price"] = $product["price"];
    }
    
} 

echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>
