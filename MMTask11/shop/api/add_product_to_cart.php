<?php

// В PHP сессию надо стартовать
session_start();

header("Content-Type: application/json; charset=UTF-8");

$id = $_REQUEST["id"];
$qty = $_REQUEST["qty"];

$cart = [];
//Не хранится ли в сессии корзина? Если да, прочитать ее
if (isset($_SESSION["cart"]))
    $cart = $_SESSION["cart"];

//Добавляем к корзине новый товар
$cart[] = [$id, $qty];
//Сохраняем корзину в сессии
$_SESSION["cart"] = $cart;

echo(json_encode($cart));

