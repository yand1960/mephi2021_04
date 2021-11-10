
<?php

header('charset=utf-8');
mb_internal_encoding("UTF-8");
//В PHP сессию надо стартовать
session_start();

$response = [];

if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];

    foreach($_SESSION["products"] as $product_id => $product) {
        $response[$product_id]["name"] = $product["name"];
        $response[$product_id]["quantity"] = $cart[$product_id];
    }
    
} // TODO else case

echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>
