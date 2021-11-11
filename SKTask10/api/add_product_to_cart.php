<?php

// в php сессию надо стартовать
session_start();

$id = $_REQUEST["id"];
$qty = $_REQUEST["qty"];

$cart = [];
// тут мы проверяем, не хранится ли какакя-то старая корзина пользователя
// если да, то прочитать ее
if (isset($_SESSION["cart"]))
    $cart = $_SESSION["cart"];

// тут мы добавляем к корзине новый товар
$cart[] = [$id, $qty];
// сохраняем новую корзину в сессии на сервере
$_SESSION["cart"] = $cart;

echo(json_encode($cart));